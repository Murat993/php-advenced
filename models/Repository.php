<?php
namespace app\models;
use app\services\Db; 
/**
* 
*/
abstract class Repository
{
	public function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return static::getDb()->queryOne($sql, [':id' => $id], static::getEntityClass());
    }

	public function getAll()
	{
		$tableName = static::getTableName();
		$sql = "SELECT * FROM {$tableName}";
		return static::getDb()->queryAll($sql, [], static::getEntityClass());
	}

	public function delete(DataEntity $entity)
	{
		$tableName = static::getTableName();
		$sql = "DELETE FROM {$tableName} WHERE id = :id";
		return static::getDb()->execute($sql, [':id' => $entity->id]);
	}

	private function insert(DataEntity $entity)
	{
		$params = [];
		$columns = [];
		foreach ($entity as $key => $value) {
			if ($key == 'db') {
				continue;
			}
			$params[":$key"] = $value;
			$columns[] = $key;
		}

		$columns = implode(", ", $columns);
		$placeholders = implode(", ", array_keys($params));


		$tableName = static::getTableName();
		$sql = "INSERT INTO {$tableName} ({$columns}) VALUES ({$placeholders})";
		return static::getDb()->execute($sql, $params);
	}

	private function update(DataEntity $entity)
	{
		$params = [];
		$columns = [];
		foreach ($entity as $key => $value) {
			if ($key == 'db') {
				continue;
			}
			$params[":$key"] = $value;
			if (!next($this)) {
				$paramKey .=  $key . " = " . ":$key"; 
			} else{
				if ($key == 'id') {
					continue;
				}
				$paramKey .=  $key . " = " . ":$key" . ", " ; 
			}
		};
         
		$tableName = static::getTableName();
		$sql = "UPDATE {$tableName} SET {$paramKey} WHERE id = :id";
		return static::getDb()->execute($sql, $params);
	}

	public function save(DataEntity $entity)
	{
		if (isset($entity->id)) {
			return $this->update();
		} else{
			return $this->insert();
		}
	}

	public static function getDb()
	{
		return \app\base\App::call()->db;
	}

	abstract static public function getTableName();

	abstract static public function getEntityClass();
}