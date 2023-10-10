<?php
require_once './app/models/game.model.php';
require_once './app/views/game.view.php';

class GameController{

    private $model;
    private $view;

    function __construct(){ 
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

}

?>