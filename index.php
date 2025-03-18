<?php
session_start();


//AUTOLOAD DEPENDENCIES
require_once './vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';


//INITIALISATION OF ALTOROUTER
$router = new AltoRouter();

// $router->setBasePath('/mediasmart');
 


/*----------MEDIA----------*/

$router->map('GET', '/', 'ControllerMedia#home', 'home');

$router->map('GET', '/media/read/[i:id]', 'ControllerMedia#read', 'readMedia');

$router->map('GET', '/media/author/[i:id]', 'ControllerMedia#author', 'authorMedia');

$router->map('GET', '/media/category/[i:id]', 'ControllerMedia#category', 'categoryMedia');

$router->map('GET', '/media/subcategory/[i:id]', 'ControllerMedia#subcategory', 'subcategoryMedia');

$router->map('GET|POST', '/media-create', 'ControllerMedia#create', 'createMedia');

$router->map('GET|POST', '/searchAuthor', 'ControllerAuthor#searchAuthor', 'searchAuthor');

$router->map('POST', '/media/delete', 'ControllerMedia#delete', 'deleteMedia');

$router->map('GET|POST', '/updateMedia', 'ControllerMedia#updateMedia', 'updateMedia');

$router->map('GET|POST', '/modifMedia/[i:id_media]', 'ControllerMedia#modifMedia', 'modif-media');

$router->map('GET', '/404', 'ControllerMedia#notfound', 'notfound');

$router->map('GET', '/detailMedia/[i:id_media]', 'ControllerMedia#getMedia', 'getMedia');

$router->map('POST', '/searchMediaHomepage', 'ControllerMedia#searchMediaHomepage', 'search-media-homepage');

/*----------USER----------*/


$router->map('GET|POST', '/login', 'ControllerUser#login', 'login');

$router->map('GET|POST', '/register', 'ControllerUser#register', 'register');

$router->map('GET', '/logout', 'ControllerUser#logout', 'logout');

$router->map('POST', '/verify-token', 'ControllerUser#verify', 'verify-token');

$router->map('GET', '/resend-token', 'ControllerUser#resend', 'resend-token');

$router->map('GET|POST', '/dashboardUser/[i:id_user]', 'ControllerUser#dashboardUser', 'dashboard-user');

$router->map('GET|POST', '/resaUser', 'ControllerUser#resaUser', 'resaUser');

/*----------EMPLOYEE----------*/

$router->map('GET|POST', '/createEmployee', 'ControllerEmployee#create', 'create-employee');

$router->map('GET|POST', '/loginEmployee', 'ControllerEmployee#loginEmployee', 'login-employee');

$router->map('GET|POST', '/dashboardEmployee/[i:id_user]', 'ControllerEmployee#dashboardEmployee', 'dashboard-employee');

$router->map('GET', '/getUser/[i:id]' ,'ControllerEmployee#getUser', 'getUser' );

$router->map('GET|POST', '/modifUser/[i:id_user]', 'ControllerUser#modifUser', 'modif-user');

$router->map('GET|POST', '/update','ControllerUser#update', 'update-user' );

$router->map('GET|POST', '/delete', 'ControllerUser#delete', 'delete-user');

$router->map('GET|POST', '/dashboardMedia/[i:id_media]', 'ControllerEmployee#dashboardMedia', 'dashboard-media');

$router->map('GET|POST', '/searchMedia', 'ControllerMedia#searchMedia', 'search-media');

$router->map('GET|POST', '/searchEmployee', 'ControllerEmployee#searchEmployee', 'search-Employee');

$router->map('GET|POST', '/actionMedia', 'ControllerMedia#actionMedia', 'actionMedia');

$router->map('POST', '/createCategory', 'ControllerMedia#createCategory', 'create-category');

$router->map('POST', '/createSubCategory', 'ControllerMedia#createSubCategory', 'create-subcategory');

$router->map('GET', '/getCategory', 'ControllerMedia#getCategory', 'getCategory');

$match = $router->match();

// var_dump($router);

if(is_array($match)){
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if(is_callable(array($obj, $action))){
        call_user_func_array(array($obj, $action), $match['params']);
    }

}

