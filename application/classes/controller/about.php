<?php

class About extends Controller {

    public function action_index()
    {
        $this->view->display('about.tpl');
    }
}