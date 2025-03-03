<?php
session_start();


//AUTOLOAD DEPENDENCIES
require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';


//INITIALISATION OF ALTOROUTER
$router = new AltoRouter();

/*----------MEDIA----------*/

$router->map('GET', '/', 'ControllerMedia#home', 'home');

$router->map('GET', '/media/read/[i:id]', 'ControllerMedia#read', 'readMedia');

$router->map('GET', '/media/author/[i:id]', 'ControllerMedia#author', 'authorMedia');

$router->map('GET', '/media/category/[i:id]', 'ControllerMedia#category', 'categoryMedia');

$router->map('GET', '/media/subcategory/[i:id]', 'ControllerMedia#subcategory', 'subcategoryMedia');

$router->map('GET|POST', '/media-create', 'ControllerMedia#create', 'createMedia');

$router->map('POST', '/media/delete', 'ControllerMedia#delete', 'deleteMedia');

$router->map('GET|POST', '/media/update/[i:id]', 'ControllerMedia#update', 'updateMedia');

$router->map('GET', '/404', 'ControllerMedia#notfound', 'notfound');

/*----------USER----------*/


$router->map('GET|POST', '/login', 'ControllerUser#login', 'login');

$router->map('GET|POST', '/register', 'ControllerUser#register', 'register');

$router->map('GET', '/logout', 'ControllerUser#logout', 'logout');

$router->map('POST', '/verify-token', 'ControllerUser#verify', 'verify-token');

$router->map('GET', '/resend-token', 'ControllerUser#resend', 'resend-token');

/*----------EMPLOYEE----------*/

$router->map('GET|POST', '/createEmployee', 'ControllerEmployee#create', 'create-employee');

$router->map('GET|POST', '/loginEmployee', 'ControllerEmployee#loginEmployee', 'login-employee');

$router->map('GET', '/dashboardEmployee', 'Controller#Employee', 'dashboard-employee');

$match = $router->match();

// var_dump($router);

if(is_array($match)){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
    }

}

