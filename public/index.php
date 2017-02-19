<?php

chdir( dirname(__DIR__) );
 
if (!define('SYS_PATH', 'config/')) { echo 'Not defined SYS_PATH'; }
if (!define('APP_PATH', 'app/')) { echo 'Not defined APP_PATH'; }
if (!define('FULL_PATH', dirname(__FILE__))) { echo 'Not defined FULL_PATH'; }
if (!define('VIEW_PATH', 'resources/')) { echo 'Not defined VIEW_PATH'; } 

require SYS_PATH."Init.php";

$app = new App;