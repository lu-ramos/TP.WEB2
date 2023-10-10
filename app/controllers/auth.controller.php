<?php
require_once './app/models/user.model.php';
require_once './app/views/auth.view.php';

class AuthController {

    private $model;
    private $view;

    function __construct(){
        $this->model = new UserModel();
        $this->view = new AuthView();
    }

    public function showLogin(){
        $this->view->showLogin();
    }

    public function auth(){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if(empty($usuario) || empty($password)){
            $this->view->showLogin('Faltan completar datos');
            return;
        }
       
        $user = $this->model->getUser($usuario);
        if($user && password_verify($password, $user->password)){
            AuthHelper::login($user);
            header('Location: '. BASE_URL);
        }
        else{
            $this->view->showLogin('Usuario inválido');
        }
    }

    public function logout(){
        AuthHelper::logout();
        header('Location: '. BASE_URL);
    }


}

?>