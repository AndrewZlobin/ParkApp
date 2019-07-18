<?php
//require_once __DIR__ . '/../source/Controllers/IndexController.php';
//require_once __DIR__ . '/../source/Core/Router.php';
require_once __DIR__ . '/../vendor/autoload.php';
use Andrew\ParkApp\Core\Router;


$uri = $_SERVER['REQUEST_URI'];
//var_dump($uri);

Router::run();