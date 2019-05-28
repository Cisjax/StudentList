<?php

namespace app\core;

use app\libs\Dev;

class View
{
    public $path;
    public $route;
    public $layout = ['header', 'footer', 'header_guest'];

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /**
     * @param $active
     * @param $title
     * @param array $vars
     * @param string $role
     */
    public function render($active, $title, $vars = [], $role = 'guest')
    {
        extract($vars);
        $path = 'app/views/';

        if (file_exists($path . $this->path . '.php')) {
            if ($role == 'guest') {
                require_once 'app/views/layouts/' . $this->layout[2] . '.php';
            } else {

                require_once 'app/views/layouts/' . $this->layout[0] . '.php';
            }
            require_once $path . $this->path . '.php';
            require_once 'app/views/layouts/' . $this->layout[1] . '.php';

        } else {
            echo 'Вид не найден ' . $this->path;
        }

    }

    public static function errorCode($code)
    {
        http_response_code($code);
        $path = 'app/views/errors/';
        if (file_exists($path)) {
            require_once $path . $code . '.php';
        }
        exit();
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
        exit();
    }
}