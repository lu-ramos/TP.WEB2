<?php
require_once './app/views/admin.view.php';
require_once './helpers/auth.helper.php';
require_once './app/models/game.model.php';

class AdminController {
    private $view;
    private $model;
    

    public function __construct() {
        AuthHelper::verify();
        $this->model = new GameModel();
        $this->view = new AdminView();   
    } 
    
    public function addGame() {

        $name = $_POST['nombre_juego']; //obtengo los juegos
        $detalle = $_POST['detalle_juego'];
        $alturaMinima = $_POST['altura_juego'];
        $id_categoria = $_POST['id_categoria'];
  
        if (empty($name) || empty($detalle) || empty($alturaMinima) || empty($id_categoria)) {
            // $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->insertGame($name, $detalle, $alturaMinima, $id_categoria);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            // $this->view->showError("Error al insertar el juego");
        }
    }

    public function removeGame($id) {
        $id = $this->model->deleteGame($id);
        header('Location: ' . BASE_URL);
    }

    public function modifyGame($id_juego){
        AuthHelper::verify();
        $name = $_POST['nombre']; //obtengo los juegos
        $detalle = $_POST['detalle'];
        $alturaMinima = $_POST['altura'];
        $id_categoria = $_POST['id'];
  
        if (empty($name) || empty($detalle) || empty($alturaMinima) || empty($id_categoria)) {
            // $this->view->showError("Debe completar todos los campos");
            return;
        }

        $id = $this->model->updateGame($name, $detalle, $alturaMinima, $id_categoria, $id_juego);
        if ($id) {
            header('Location: ' . BASE_URL);
        } else {
            // $this->view->showError("Error al insertar el juego");
        }

    }
}