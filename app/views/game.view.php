<?php

class GameView {

    public function showGames($games, $listaCategorias) {
        
        require_once './templates/gamesList.phtml';
    }

    public function showGameDetails($gameDetails) {

        require_once './templates/game.phtml';
    }

    public function showEditGameForm($id, $gameDetails) {

        require_once './templates/editGameForm.phtml';
    }
 
}
