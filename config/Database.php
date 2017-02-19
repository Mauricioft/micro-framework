<?php

class Database
{

	//nombre base de datos
	private static $dbname = "bd_carga_masiva_pd";
	//nombre servidor
	private static $host = "localhost";
	//nombre usuarios base de datos
	private static  $user = "postgres";
	//password usuario
	private static  $pass = 'mariadianayo91';
	//puerto postgreSql
	private static $port = 5432;
	private static $dbh;

	private function __constructor(){}

	// creamos la conexión a la base de datos prueba
	private static function connection()
	{
		try {
	        self::$dbh = new PDO("pgsql:host=".self::$host."; port=".self::$port."; dbname=".self::$dbname."; user=".self::$user."; password=".self::$pass."");
	        return self::$dbh;
	    } catch(PDOException $e) {
	        error_log($e->getMessage()); 
	    }
	}

	public static function query($sql, $type_fetch, $params = [])
	{
		try
 		{
			$statement = static::connection()->prepare($sql);
			$statement->execute($params);
			if($type_fetch == 0){
				$result = $statement->fetch(PDO::FETCH_ASSOC);
			}elseif($type_fetch == 1){
				$result = $statement->fetch(PDO::FETCH_BOTH);
			}
			static::close_con();
		} catch(PDOException $e) {
		 	error_log($e->getMessage());   
		}
		return $result;
	}


	//función para cerrar una conexión pdo
	private static function close_con() 
	{
    	return self::$dbh = null; 
	}
}