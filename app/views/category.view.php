<?php

class CategoryView {

    public function showCategory($categoryGames) {
        require './templates/category.phtml';
    }

    
    public function showCategories($categories) {
        require './templates/categoryList.phtml';
    }

    public function showSuccess($categories) {
        require './templates/succescat.phtml';
    }

}
