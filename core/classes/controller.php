<?php

abstract class Controller {

    /* @var Request resuest */
    protected $request;

    /* @var Response response */
    protected $response;

    /* @var View view */
    protected $view;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->response = new Response();
        $this->view = new View;
    }

    public function before()
    {

    }

    public function action_index()
    {

    }

    public function after()
    {
        $this->response->body($this->view->render());
    }

    public function execute()
    {
        $this->before();

        $action = 'action_'.$this->request->action();

        if ( ! method_exists($this, $action))
            throw new Exception('Unknown action!');

        $this->{$action}();

        $this->after();

        return $this->response;
    }
}