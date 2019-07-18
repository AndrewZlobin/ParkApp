<?php

namespace Andrew\ParkApp\Core;

class Router
{
    public static function run()
    {
        $controller = 'Index'; // имя класса
        $action = 'index'; //имя метода
        $params = null;
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if (!empty($routes[1])){
            //имя контроллера
            $controller = $routes[1];
        }
        if(!empty($routes[2])){
            //имя метода
            $action = $routes[2];
        }
        if(!empty($routes[3])){
            //параметры
            $params = $routes[3];
        }
//        $controller = ucfirst(strtolower($controller)) . 'Controller';
        $controller = 'Andrew\ParkApp\Controllers\\' . ucfirst(strtolower($controller)) . 'Controller';
        $action = strtolower($action) . 'Action';
        if(!class_exists($controller)){
            echo "Класс не найден";
            return;
        }
        if(!method_exists($controller, $action)){
            echo "Метод не найден";
            return;
        }
        $controller = new $controller();
        $controller->$action($params);

//        var_dump($controller);
    }

}