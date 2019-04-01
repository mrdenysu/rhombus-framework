<?php

namespace RhombusFramework\Core;


class View
{
    public $params, $path, $layout = 'default';

    public function __construct($params)
    {
        $this->params = $params;
        if (!$this->isAccess()) {$this->error(403);}
        $this->path = $params['controller'].'/'.$params['action'];
    }

    public function render($title, $vars = []) {
        extract($vars);
        $path = 'private/view/'.$this->path.'.php';
        if (file_exists($path)) {
            ob_start();
            require $path;
            $content = ob_get_clean();
            require 'private/view/template/'.$this->layout.'.php';
        }
    }

    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function json($array) {
        exit(json_encode($array));
    }

    public function redirect($url) {
        header('location: '.$url);
        exit;
    }

    final public function error($error_code = 404,$error_text = null){
        http_response_code($error_code);
        $path = 'private/view/template/errors/'.$error_code.'.php';
        if (file_exists($path)) {
            require $path;
        }
        exit($error_text);
    }

    private function isAccess(){
        $access = $this->params['access'];

        if (!$_SESSION['userId']) {
            $userAccess = 1;
        } else if ($_SESSION['userId'] !== null) {
            $userAccess = 2;
        } else if ($_SESSION['admin'] == true) {
            $userAccess = 3;
        }

        if ($access == 0) {
            return true;
        } else if ($access == $userAccess) {
            return true;
        } else {
            return false;
        }
    }
}