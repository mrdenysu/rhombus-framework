<?php

namespace RhombusFramework\Core;

class Router
{
    protected $params, $routes, $url;

    public function __construct()
    {
        session_start();
        $routes_settings_file = 'private/settings/routes.php';
        if (file_exists($routes_settings_file)) {
            $routes = require ($routes_settings_file);
            foreach ($routes as $key => $val) {
                $this->routeAdd($key, $val);
            }
        } else {
            View::error(500,"Не удается загрузить системные маршруты!");
        }
        $this->url = trim($_SERVER['REQUEST_URI'], '/');
    }

    public function run(){
        $route = $this->routeCheck();
        $path = 'RhombusFramework\Controllers\\'.ucfirst($this->params['controller']).'Controller';
        $action = $this->params['action'].'Action';
        if ($route and class_exists($path) and method_exists($path, $action)){
            $controller = new $path($this->params);
            $controller->$action();
        } else {
            View::error(404);
        }
    }

    public function routeAdd($route, $params) {
        $this->routes['#^'.$route.'$#'] = $params;
    }

    public function routeCheck(){
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $this->url, $matches)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }
}