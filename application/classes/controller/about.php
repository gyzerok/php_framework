<?php

class Controller_About extends Controller {

    public function action_index()
    {
        $this->view->display('about.tpl');
    }
}