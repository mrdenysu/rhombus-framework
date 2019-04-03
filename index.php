<?php

spl_autoload_register(function ($class_name) {
    $s = [
        '\\',
        'RhombusFramework'
    ];
    $r = [
        '/',
        'application'
    ];
    $class_file = str_replace($s, $r, $class_name) . '.php';
    if (file_exists($class_file)){
        include_once $class_file;
    } else {
        exit("Critical error! '$class_name' class '$class_file' file not found.");
    }
});

use RhombusFramework\Core\Router;

$app = new Router();

$app->run();