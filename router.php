<?php

require_once './app/controllers/juego.controller.php';
require_once './app/controllers/categoria.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'index'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listarJuegos        ->   juegosController->showJuegos();
// listarCategorias    ->   categoriaController->showCategoria();

//login     ->  authContoller->showLogin();
// logout   -> authContoller->logout();
// auth     ->  authContoller->auth();

$params = explode('/', $action);

switch ($params[0]) { 
    case 'listarJuegos':
        $controller = new JuegosController();
        $controller->showJuegos();
    break;
    case 'listarCategorias':
        $controller = new categoriaController();
        $controller->showCategoria();
    break;



    case 'login':
        $controller = new AuthController();
        $controller->showLogin(); 
        break;
    case 'auth':
        $controller = new AuthController();
        $controller->auth();
        break;
    case 'logout':
        $controller = new AuthController();
        $controller->logout();
        break;
}


