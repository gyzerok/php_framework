<?php

class Controller_Welcome extends Controller {

    public function action_index()
    {
        $this->view->assign('name', 'Vasya');

        $this->view->display('index.tpl');
    }
}