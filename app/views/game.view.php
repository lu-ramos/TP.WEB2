<?php

class GameView
{

    public function showGames($games)
    {
        echo '<ul>';
        foreach ($games as $game) {
            echo '<li>' . $game->nombre_juego . ' - Categoría: ' . $game->nombre_categoria . '</li>';
        }
        echo '</ul>';
    }


    public function showGameDetails($gameDetails)
    {
        echo '<h1>' . $gameDetails->nombre_juego . '</h1>';
        echo '<p>ID: ' . $gameDetails->id_juego . '</p>';
        echo '<p>Descripción:' . $gameDetails->categoria_descripcion . '</p>';
        
    }
}
