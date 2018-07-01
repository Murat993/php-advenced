<?php
/**
 * Created by PhpStorm.
 * User: poluyanov
 * Date: 08.12.2017
 * Time: 13:41
 */

namespace app\helpers;


class Url
{

    public function generate($controller = null, $action = null, $params = [])
    {
        $paramsPieces = [];
        $requestString = "";

        if($controller){
           $requestString .= $controller; 
        }
        if($action){
            $requestString .= "/" . $action;
        }
        foreach ($params as $key => $val){
            $paramsPieces[] = "{$key}={$val}";
        }

        $pars = implode("&", $paramsPieces);
        return "/{$requestString}/?{$pars}";
    }

}