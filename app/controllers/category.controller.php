<?php
require_once './app/models/category.model.php';
require_once './app/views/category.view.php';

class CategoryController{

    private $model;
    private $view;

    function __construct(){
        AuthHelper::verify();
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

        $nombre_categoria = $_POST['nombre_categoria']; //obtengo los juegos
        $descripcion = $_POST['descripcion']; //obtengo los juegos


        // if (empty($nombre_categoria) && empty($descripcion)) {
        //    $this->viewAdmin->showError("Debe completar todos los campos");
        //     return;
        // }


        $id = $this->model->insertCategory($nombre_categoria, $descripcion);
        if ($id) {
            $this->view->showSuccess("Creado con exito");
        } else {
            //$this->view->showError("Error al insertar la categoria");
        }
        
    }

    public function removeCategory($id_categoria) {
        $this->model->deleteCategory($id_categoria);
        header('Location: ' . BASE_URL);
    }

    public function modifyCategory($id) {
        $this->model->updateCategory ($id);
        header('Location: ' . BASE_URL);
    }

}

