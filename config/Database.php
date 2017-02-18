A<?php

class Database
{

	private function __constructor(){}

	public static function query($sql, $params = [])
	{
		$statement = static::connection()->prepare($sql);
		$statement->execute($params);
		return $result = $statement->fetch();
	}

	private static function connection()
	{
		return new PDO('postgres:host=localhost;bd_carga_masiva_pd', 'root', '');
	}
}