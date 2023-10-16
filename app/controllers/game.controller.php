<?php
require_once './app/models/game.model.php';
require_once './app/views/game.view.php';
require_once './app/views/admin.view.php';
class GameController{

    private $model;
    private $view;

    function __construct(){ 
        // AuthHelper::verify();
        $this->model = new GameModel();
        $this->view = new GameView();

    }


    public function showGames(){
        // obtiene los juegos con nombres de categoría
        $gamesWithCategories = $this->model->getGamesWithCategoryNames();
        
        // los muestra a la vista
        $this->view->showGames($gamesWithCategories);
    }

    public function showGameDetails($gameId){
        // obtiene los detalles del juego con la descripción de la categoría
        $gameDetails = $this->model->getGameDetails($gameId);
        
        // Muestra los detalles del juego en la vista
        $this->view->showGameDetails($gameDetails);
    }


    public function addGame() {

        $name = $_POST['nombre_juego']; //obtengo los juegos
        $detalle = $_POST['detalle_juego'];
        $alturaMinima = $_POST['altura_juego'];
        $id_categoria = $_POST['id_categoria'];
  
        if (empty($name) || empty($detalle) || empty($alturaMinima) || empty($id_categoria)) {
            // $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertGame($name, $detalle, $alturaMinima, $id_categoria);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            // $this->view->showError("Error al insertar el juego");
        }


    }

    public function removeGame($id) {
        $this->model->deleteGame($id);
        header('Location: ' . BASE_URL);
    }

    public function modifyGame($id) {
        $this->model->updateGame ($id);
        header('Location: ' . BASE_URL);
    }


}

