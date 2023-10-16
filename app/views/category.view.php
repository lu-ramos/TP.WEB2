<?php

class CategoryView {

    public function showCategory($category) {
        // echo '<ul>';
        // foreach ($category as $category) {
        //     echo '<li>' . $category->nombre_categoria . '</li>';
        // }
        // echo '</ul>';
        require './templates/categoryList.phtml';
    }

    public function showGamesByCategory($categoryGames) {
    //     echo '<h1>Juegos por Categoría</h1>';
    //     echo '<ul>';
    //     foreach ($categoryGames as $game) {
    //         echo '<li>' . $game->nombre_juego . '</li>';
    //     }
    //     echo '</ul>';
    // require './templates/categoryList.phtml';
    }
}
