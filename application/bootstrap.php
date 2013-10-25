<?php

spl_autoload_register(
    function ($class_name) {

        $class_path = strtolower(str_replace('_', DIRECTORY_SEPARATOR, $class_name));

        if (file_exists(APPPATH.'classes/'.$class_path.EXT))
            return include APPPATH.'classes/'.$class_path.EXT;

        if (file_exists(COREPATH.'classes/'.$class_path.EXT))
            return include COREPATH.'classes/'.$class_path.EXT;
    }
);