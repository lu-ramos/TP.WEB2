<?php

require_once './app/controllers/game.controller.php';
require_once './app/controllers/category.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/index.controller.php';
require_once './app/controllers/auth.controller.php';
require_once './app/controllers/admin.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listarJuegos'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

//index    ->  IndexController-> showIndex();
// listarJuegos        ->   GameController->showGames();
// detalleJuego        ->   GameController->showGameDetails();
// listarCategorias    ->   CategoryController->showCategory();
// juegosCategoria     ->   CategoryController->showGamesByCategory();
// login     ->  AuthContoller->showLogin();
// logout   ->  AuthContoller->logout();
// auth     ->  AuthContoller->auth();
// error    ->  Error->showError();


$params = explode('/', $action);

switch ($params[0]) { 
    case 'index':
        $controller = new IndexController();
        $controller->showIndex();
    break;
    case 'listarJuegos':
        $controller = new GameController();
        $controller->showGames();
    break;
    case 'detalleJuego':
        $controller = new GameController();
        $controller->showGameDetails($params[1]);
    break;
    case 'listarCategorias':
        $controller = new CategoryController();
        $controller->showCategory();
    break;
    case 'juegosCategoria':
        $controller = new CategoryController();
        $controller->showGamesByCategory($params[1]);
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
    case 'agregarJuego':
        $controller = new AdminController();
        $controller->addGame();
    break;
    case 'eliminarJuego':
        $controller = new AdminController();
        $controller->removeGame($params[1]);
    break;
    case 'modificarJuego':
        $controller = new AdminController();
        $controller->modifyGame($params[1]);
    break;

    // case 'error':
    //     $controller = new Error(); 
    //     $controller->showError();
    // break;
}


