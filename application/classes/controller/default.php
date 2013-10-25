<?php

class Controller_Default extends Controller {

    public function action_index()
    {
        $news = Model::factory('News')->find_all();

        $this->view->assign('news', $news);

        $this->view->display('index.tpl');
    }

    public function action_add()
    {
        Model::factory('News')->values($_POST)->save();

        $this->view->display('success.tpl');
    }
}