<?php
session_start();


//AUTOLOAD DEPENDENCIES
require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';

//INITIALISATION OF ALTOROUTER
$router = new AltoRouter();
$router->setBasePath('/mediasmart');

/*----------USER----------*/

$router->map('GET|POST', 'login', 'ControllerUser#login', 'login');
$router->map('GET|POST', 'ControllerUser#register', 'register');