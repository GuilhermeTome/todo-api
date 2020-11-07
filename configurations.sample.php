<?php

define('DEFAULT_CONTROLLER', 'ErrorController');
define('DEFAULT_ACTION', 'index');

define('DS', DIRECTORY_SEPARATOR);

define('PATH_ROOT', __DIR__ . DS);
define('PATH_PUBLIC', PATH_ROOT . 'public' . DS);
define('PATH_RESOURCE', PATH_ROOT . 'resource' . DS);
define('PATH_PUBLIC_STORAGE', PATH_ROOT . 'public' . DS . 'storage' . DS);
define('PATH_PRIVATE_STORAGE', PATH_ROOT . 'storage' . DS);
define('PATH_CACHE', PATH_ROOT . 'cache' . DS);

define('DISPLAY_ERRORS', false);
