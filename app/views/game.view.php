<?php

class GameView {

    public function showGames($games) {
        require_once './templates/gamesList.phtml';
    }
    // VERIFICAR CON EL GAMELIST SI FUNCIONA!

    public function showGameDetails($gameDetails) {
        // echo '<h1>' . $gameDetails->nombre_juego . '</h1>';
        // echo '<p>ID: ' . $gameDetails->id_juego . '</p>';
        // echo '<p>Descripción:' . $gameDetails->categoria_descripcion . '</p>';
        require_once './templates/gamesList.phtml';
    }
}
