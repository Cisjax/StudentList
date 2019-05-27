<?php

namespace app\core;



class Controller
{
    public $route;
    public $view;
    public $modelName;
    public $model;

    public function __construct($route)
    {
        $this->route = $route;
        $this->modelName = ucfirst($route['controller']);
        $this->modelName = 'app\models\\' . $this->modelName;
        $this->model = new $this->modelName;
        $this->view = new View($route);
    }
}