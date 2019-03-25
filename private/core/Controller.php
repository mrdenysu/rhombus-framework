<?php

namespace RhombusFramework\Core;


abstract class Controller
{
    protected $params, $get, $post, $view, $model;

    public function __construct($params)
    {
        $this->post = $_POST;
        $this->get = $_GET;
        $this->params = $params;
        $this->view = new View($this->params);
        $this->model = $this->loadModel($this->params['controller'].'Model'); // Personal class model | startup if it exists
    }

    public function loadModel($name) {
        $path = 'RhombusFramework\models\\'.ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }

}