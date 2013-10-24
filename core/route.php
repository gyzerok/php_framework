<?php

class Route {

    public static function start()
    {
        $controller_name = 'Welcome';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ( ! empty($routes[1]))
            $controller_name = $routes[1];

        if ( ! empty($routes[2]))
            $action_name = $routes[2];

        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;

        $controller = new $controller_name;
        $action = $action_name;

        if ( ! method_exists($controller, $action))
            throw new Exception('Unknown action!');

        $controller->before();
        $controller->$action();
        $controller->after();
    }
}