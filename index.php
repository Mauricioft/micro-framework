<?php

chdir( dirname(__DIR__) );
 
if (!define('SYS_PATH', 'config/')) { echo 'Not defined SYS_PATH'; }
if (!define('APP_PATH', 'app/')) { echo 'Not defined APP_PATH'; }
if (!define('FULL_PATH', dirname(__FILE__))) { echo 'Not defined FULL_PATH'; }
if (!define('VIEW_PATH', dirname(__FILE__).'/resources/')) { echo 'Not defined VIEW_PATH'; }

require SYS_PATH."Router.php";
require APP_PATH."http/routes.php";
require SYS_PATH."Response.php";

$url = $_GET['url'];

try{
	$action = Router::getAction($url);
	$controllerName = $action['controller'];
	$method = $action['method'];

	require APP_PATH.'http/controllers/'.$controllerName.'.php';

	$controller = new $controllerName();
	$controller->$method();
}
catch(Exception $e)
{
	echo $e->getMessage();
}