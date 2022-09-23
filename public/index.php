<?php
session_start();

require __DIR__ . '/../vendor/autoload.php';

require(__DIR__ . '/../routes.php');
require(__DIR__ . '/../helpers.php');

$router = new App\Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$match = $router->match();
if($match){
    if(is_array($match['action'])){
        $class = $match['action'][0];
        $controller = new $class();
        $method = $match['action'][1];
        $controller->$method();
    } else {
        call_user_func($match['action']);
    }
}
