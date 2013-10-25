<?php

class Request {

    private $controller;
    private $action;

    public function controller($controller = NULL)
    {
        if ($controller) $this->controller = $controller;

        return $this->controller;
    }

    public function action($action = NULL)
    {
        if ($action) $this->action = $action;

        return $this->action;
    }

    public function dispatch()
    {
        Route::parse($this);

        $controller_name = 'Controller_'.$this->controller;

        return new $controller_name($this);
    }
}