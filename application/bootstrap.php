<?php

spl_autoload_register(
    function ($class_name) {
        $class_path = strtolower(str_replace('_', DIRECTORY_SEPARATOR, $class_name));
        if (file_exists(APPPATH.'classes/'.$class_path.EXT))
            include APPPATH.'classes/'.$class_path.EXT;
        elseif (file_exists(COREPATH.$class_path.EXT))
            include COREPATH.$class_path.EXT;
        else
            die('Class '.$class_name.' not found!');
            //throw new Exception('Class '.$class_name.' not found!');
    }
);

Route::start();