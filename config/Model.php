<?php

class Model
{
	protected $table;
	protected $primaryKey = 'id';

	public static function find($id)
	{
		$model = new static();
		$sql = sprintf('select * from public.%s where  %s = :id;', $model->table, $model->primaryKey);
		$params = ['id' => $id];
		$result = Database::query($sql, 0, $params);

		foreach ($result as $key => $value) {
			$model->$key = $value;
		}

		return $model;
	}
}