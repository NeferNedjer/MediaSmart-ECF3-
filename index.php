<?php
session_start();


//AUTOLOAD DEPENDENCIES
require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';

//INITIALISATION OF ALTOROUTER
$router = new AltoRouter();
$router->setBasePath('/mediasmart');

