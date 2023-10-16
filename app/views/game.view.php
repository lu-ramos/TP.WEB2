<?php

class GameView {

    public function showGames($games) {
      //  var_dump($games);
        require_once './templates/gamesList.phtml';
    }
    // VERIFICAR CON EL GAMELIST SI FUNCIONA!

    public function showGameDetails($gameDetails) {

        require_once './templates/game.phtml';
    }
 
}
