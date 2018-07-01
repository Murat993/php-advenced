<?php 
use \app\interfaces\IRenderer;
/**
* 
*/
class TwigRenderer implements IRenderer;
{
	protected $templateDir;
	protected = $templater;

	public function __construct()
	{
		$this->templateDir = ROOT_DIR . '/template/twig';
		$loader = new \TWig_Loader_FileSistem($this->templateDir);
		$this->templater = new \Twig_Environment($loader);
	}

	public function render($template, $params)
	{
		$template = "{$template}.twig";
		$template = $this->templater->loadTemplate($template);
		return $template->render($params);

	}
}