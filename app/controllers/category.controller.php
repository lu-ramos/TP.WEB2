<?php
require_once './app/models/category.model.php';
require_once './app/views/category.view.php';

class CategoryController{

    private $model;
    private $view;

    function __construct(){ 
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function showCategory(){    

        // obtiene los juegos del modelo
        $category = $this->model->getCategory();
        
        // los muestra a la vista
        $this->view->showCategory($category);
    }

    public function showGamesByCategory($categoryId){
        // obtiene los juegos que pertenecen a la categoría seleccionada
        $categoryGames = $this->model->getGamesByCategory($categoryId);
        
        // Muestra los juegos en la vista correspondiente
        $this->view->showGamesByCategory($categoryGames);
    }

}

?>