<?php

spl_autoload_register(
    function ($class) {
        if (file_exists(APPPATH.'classes/'.$class.EXT))
            include APPPATH.'classes/'.$class.EXT;
        elseif (file_exists(COREPATH.$class.EXT))
            include COREPATH.$class.EXT;
        else
            throw new Exception('Class '.$class.' not found!');
    }
);

Route::start();