<?php

require_once './app/controllers/game.controller.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listarJuegos'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// listarJuegos        ->   GameController->showGames();
// detalleJuego        ->   GameController->showGameDetails();
// listarCategorias    ->   CategoryController->showCategory();
// juegosCategoria     ->   CategoryController->showGamesByCategory();

// login     ->  authContoller->showLogin();
// logout   -> authContoller->logout();
// auth     ->  authContoller->auth();

$params = explode('/', $action);

switch ($params[0]) { 
    case 'listarJuegos':
        $controller = new GameController();
        $controller->showGames();
        break;
    case 'detalleJuego';
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
}


