<?php
require_once './app/models/game.model.php';
require_once './app/views/game.view.php';
require_once './app/views/admin.view.php';
class GameController{

    private $model;
    private $model_categorias;
    private $view;

    function __construct(){ 
        AuthHelper::verify();
        $this->model = new GameModel();
        $this->model_categorias = new CategoryModel();
        $this->view = new GameView();

    }

    public function showGames(){
        // obtiene los juegos con nombres de categoría y lista de categorias
        $gamesWithCategories = $this->model->getGamesWithCategoryNames();
        $listaCategorias = $this->model_categorias->getAllCategories();

        // los muestra a la vista
        $this->view->showGames($gamesWithCategories, $listaCategorias);
    }

    public function showGameDetails($gameId){
        // obtiene los detalles del juego con la descripción de la categoría
        $gameDetails = $this->model->getGameDetails($gameId);
        
        // Muestra los detalles del juego en la vista
        $this->view->showGameDetails($gameDetails);
    }


    public function removeGame($id) {
        $this->model->deleteGame($id);
        header('Location: ' . BASE_URL);
    }



    public function showEditGameForm($id) {
        // ACA SE LLAMA AL MODEL Y SE TRAE TODA LA DATA DEL JUEGO CON $id (PASADO EN PARAMETRO)
       $gameDetails = $this-> model->getGameDetails($id);
        // ACA SE PASA A LA VIEW LOS DATOS TRAIDOS DESLDE EL MODEL (DEL JUEGO) Y SE MUESTRA EL FORMULARIO
        $this->view->showEditGameForm($id);
    }

    public function modifyGame($id){
        // AuthHelper::verify();


        // var_dump($_POST);
        $name = $_POST['nombre_juego']; //obtengo los juegos
        echo $name;
        echo $id;
        // if ($_POST == null) return;
        
        // $name = $_POST['nombre_juego']; //obtengo los juegos
        // $detalle = $_POST['detalle_juego'];
        // $alturaMinima = $_POST['altura_minima'];
        // $id_categoria = $_POST['id_categoria'];

        

        // // $id_juego = $_POST['id_juego'];

        // if (empty($name) || empty($detalle) || empty($alturaMinima) || empty($id_categoria)) {
        //     // $this->view->showError("Debe completar todos los campos");
        //     return;
        // }

        
        // $id = $this->model->updateGame($name, $detalle, $alturaMinima, $id_categoria, $id_juego);
      
        // if ($id) {
        //     $controller = new GameController();
        //     $controller->showGames();
        //    // header('Location: ' . BASE_URL);
        // } else {
        //     // $this->view->showError("Error al insertar el juego");
        // }
    }
        


}

