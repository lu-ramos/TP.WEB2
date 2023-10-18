<?php

class GameView {

    public function showGames($games, $listaCategorias) {
        
        require_once './templates/gamesList.phtml';
    }
    // VERIFICAR CON EL GAMELIST SI FUNCIONA!

    public function showGameDetails($gameDetails) {

        require_once './templates/game.phtml';
    }

    public function showEditGameForm($id) {

        require_once './templates/editGameForm.phtml';
    }
 
}
