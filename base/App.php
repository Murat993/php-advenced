<?php
namespace app\base;
include "../traits/TSingleton.php";
/**
* 
*/
class App
{
	use \app\traits\TSingleton;

	public $config;
	public $components;
	
	 public static function call()
    {
        return static::getInstance();
    }

	public function run()
	{
		$this->config = include "../config/main.php";
		$this->autoloadRegister(); 
		$this->components = new Storage();
		$this->mainController->runAction();
	}

	private function autoloadRegister() 
	{
		require "../services/Autoloader.php";
		require "../vendor/autoload.php";
		spl_autoload_register([new \app\services\Autoloader(), 'loadClass']);
	}


	public function createComponent($name)
	{
		if (isset($this->config['components'][$name])) {
			$params = $this->config['components'][$name];
			$className = $params['class'];
			if (class_exists($className)) {
				unset($params['class']);
				$reflection  = new \ReflectionClass($className);
				return $reflection->newInstanceArgs($params);
			}
			
		}
		return null;
	}

	public function __get($name)
	{
		return $this->components->get($name);
	}

}

