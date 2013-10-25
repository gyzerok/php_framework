<?php

class Route {

    public static function parse(Request $request)
    {
        $controller_name = 'Default';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if ( ! empty($routes[1]))
            $controller_name = $routes[1];

        if ( ! empty($routes[2]))
            $action_name = $routes[2];

        $request->controller($controller_name);
        $request->action($action_name);
    }
}