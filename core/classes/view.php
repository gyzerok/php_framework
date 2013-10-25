<?php

class View {

    private $smarty;
    private $template;

    public function __construct()
    {
        require_once VDRPATH.'smarty'.DIRECTORY_SEPARATOR.'Smarty.class.php';

        $this->smarty = new Smarty;

        $this->smarty->setTemplateDir(APPPATH.'views');
        $this->smarty->setCompileDir(APPPATH.'cache'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'compile'.DIRECTORY_SEPARATOR);
        $this->smarty->setCacheDir(APPPATH.'cache'.DIRECTORY_SEPARATOR);
        $this->smarty->setConfigDir(APPPATH.'cache'.DIRECTORY_SEPARATOR.'smarty'.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR);
    }

    public function assign($key, $value = NULL)
    {
        if (is_array($key))
            $this->smarty->assign($key);
        else
            $this->smarty->assign($key, $value);
    }

    public function display($template)
    {
        $this->template = $template;
    }

    public function render()
    {
        return $this->smarty->fetch($this->template);
    }

}