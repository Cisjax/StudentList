<?php

namespace app\core;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    public function render($title, $vars = []){
        extract($vars);
        $path = 'app/views/';
        if (file_exists($path . $this->path . '.php')){
            ob_start();
            require_once $path . $this->path . '.php';
            $content = ob_get_contents();
            require_once 'app/views/layouts/' . $this->layout . '.php';
        }else{
            echo 'Вид не найден ' . $this->path;
        }

    }

    public static function errorCode($code){
        http_response_code($code);
        $path = 'app/views/errors/';
        if (file_exists($path)) {
            require_once $path . $code . '.php';
        }
        exit();
    }

    public function redirect($url){
        header('Location: ' . $url);
        exit();
    }
}