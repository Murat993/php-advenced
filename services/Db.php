<?php
namespace app\services;

use app\traits\TSingleton;
/**
* 
*/
class Db
{
	public function __construct($driver, $host, $login, $password, $database, $charset)
    {
        $this->config['driver'] = $driver;
        $this->config['host'] = $host;
        $this->config['login'] = $login;
        $this->config['password'] = $password;
        $this->config['database'] = $database;
        $this->config['charset'] = $charset;
    }

	private $conn;

	private $config = [
		'driver' => 'mysql',
		'host' => 'localhost',
		'login' => 'root',
		'password' => '',
		'database' => 'phpshop',
		'charset' => 'UTF8'
	];

	private function prepareDsnString()
	{
		return sprintf('%s:host=%s;dbname=%s;charset=%s',
			$this->config['driver'],
			$this->config['host'],
			$this->config['database'],
			$this->config['charset']
		);
	}

	private function getConection()
	{
		if (is_null($this->conn)) {
			$this->conn = new \PDO($this->prepareDsnString(),
			$this->config['login'], 
			$this->config['password']
		);

		$this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
		$this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
		
	}
		return $this->conn;
	}

	private function query($sql, $params = [])
	 {
		$PDOStatement = $this->getConection()->prepare($sql);
		$PDOStatement->execute($params);
		return $PDOStatement;
	}



	public function execute($sql, $params = [])
	{
		$this->query($sql, $params);
		return true;
	}


	public function queryOne($sql, $params = [], $class = null)
	{
		return $this->queryAll($sql, $params, $class)[0];
	}

	public function queryAll($sql, $params = [], $class = null)
    {
        $smtp = $this->query($sql, $params);
        if($class){
            $smtp->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $class);
        }
        return $smtp->fetchAll();
    }
	
}