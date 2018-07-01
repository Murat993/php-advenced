<?php
namespace app\services\renderers;

use app\interfaces\IRenderer;

class TemplateRenderer implements IRenderer
{
    public function render($template, $params)
    {
        ob_start();
        extract($params);
        $templatePath = \app\base\App::call()->config['templates_dir'] . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}