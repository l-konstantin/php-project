<?php

namespace App;

class Loader
{
    protected $routes;
    protected $class;

    public function __construct() 
    {
        $this->routes = explode('/', $_SERVER['REQUEST_URI']);
    }

    public function loadClass()
    {
        if (empty($this->routes[3])) {
            $className = 'Main';
        } else {
            $className = ucfirst($this->routes[3]);
        }
        $finalClassName = '\\App\\Controllers\\'.$className;
        $this->class = new $finalClassName;
    }

    public function fireMethod()
    {
        if (empty($this->routes[4])) {
            $method = 'index';
        } else {
            $method = ucfirst($this->routes[4]);
        }
        $this->class->$method();
    }
}