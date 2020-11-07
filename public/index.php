<?php
session_start();

// calling composer autoloader and routes methods to be loaded and processed
require_once '../vendor/autoload.php';
require_once '../configurations.php';
require_once '../src/Core/General.php';

/* Load external routes file */
require_once PATH_ROUTE . 'MainRoutes.php';

header("Access-Control-Allow-Origin: *");

Pecee\SimpleRouter\SimpleRouter::start();
