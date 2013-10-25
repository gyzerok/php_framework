<?php

$application = '../application';

$core = '../core';

$vendor = '../vendor';

define('EXT', '.php');

define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

if ( ! is_dir($application) AND is_dir(DOCROOT.$application))
    $application = DOCROOT.$application;

if ( ! is_dir($core) AND is_dir(DOCROOT.$core))
    $core = DOCROOT.$core;

if ( ! is_dir($vendor) AND is_dir(DOCROOT.$vendor))
    $vendor = DOCROOT.$vendor;

define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('COREPATH', realpath($core).DIRECTORY_SEPARATOR);
define('VDRPATH', realpath($vendor).DIRECTORY_SEPARATOR);


include APPPATH.'bootstrap'.EXT;

if (PHP_SAPI != 'cli')
{
    $request = new Request;

    echo $request->dispatch()->execute()->body();
}