<?php
require_once './app/models/category.model.php';
require_once './app/views/category.view.php';

class CategoryController{

    private $model;
    private $view;

    function __construct(){
        // AuthHelper::verify();
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function getAllCategories(){    

        // obtiene los juegos del modelo
        $categories = $this->model->getAllCategories();
        
        // los muestra a la vista
        $this->view->showCategories($categories);
    }

    public function getCategory($categoryId){
        // obtiene los juegos que pertenecen a la categoría seleccionada
        $categoryGames = $this->model->getCategory($categoryId);

        // Muestra los juegos en la vista correspondiente
        $this->view->showCategory($categoryGames);
    }

    public function addCategory() {

        $category = $_POST['category']; //obtengo los juegos
  
        if (empty($category)) {
           // $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertCategory($category);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            //$this->view->showError("Error al insertar la categoria");
        }
    }

    public function removecategory ($id) {
        $this->model->deleteCategory ($id);
        header('Location: ' . BASE_URL);
    }

    public function modifyCategory($id) {
        $this->model->updateCategory ($id);
        header('Location: ' . BASE_URL);
    }

}

