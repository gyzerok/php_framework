<?php

$application = '../application';

$core = '../core';

define('EXT', '.php');

define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

if ( ! is_dir($application) AND is_dir(DOCROOT.$application))
    $application = DOCROOT.$application;

if ( ! is_dir($core) AND is_dir(DOCROOT.$core))
    $core = DOCROOT.$core;

define('APPPATH', realpath($application).DIRECTORY_SEPARATOR);
define('COREPATH', realpath($core).DIRECTORY_SEPARATOR);


require_once(APPPATH.'bootstrap'.EXT);