<?php 
namespace app\services;

/**
* 
*/
class Autoloader
{
	private $fileExtention = '.php';

	public function loadClass($className)
	{
		var_dump($className);
		$fileName = str_replace(['app\\', '\\'], [\app\base\App::call()->config['root_dir'], DIRECTORY_SEPARATOR], $className);
		$fileName .= $this->fileExtention;


		if (file_exists($fileName)) {
			include $fileName;
		}
	}
}