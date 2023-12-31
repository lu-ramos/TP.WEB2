<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';
require_once './helpers/auth.helper.php';
require_once './app/views/index.view.php';

class AuthController{

    private $model;
    private $view;

    public function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin() {
        $this->view->showLogin();
    }

    public function auth(){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if (empty($usuario) || empty($password)) {
            $this->view->showLogin('Faltan completar datos');
            return;
        }

        $user = $this->model->getByUser($usuario);

        if($user && password_verify($password, $user->password)){  

            // 
            AuthHelper::login($user);
            header('Location: ' . BASE_URL);

        }
        else {
            $this->view->showWrongPassword('Usuario inválido');
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: ' . BASE_URL);
    }
}

?>