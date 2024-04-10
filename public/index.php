<?php
require_once '../controller/WeatherController.php';


$route = $_GET['route'] ?? 'index';

switch ($route){
    case 'weather':
        $controller = new WeatherController();
        $controller->index();
        break;
    default:
        $controller = new WeatherController();
        $controller->foo();
}

