<?php

class CategoryView {

    public function showCategory($categoryGames) {
        require './templates/category.phtml';
    }

    
    public function showCategories($categories) {
        require './templates/categoryList.phtml';
    }


}
