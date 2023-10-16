<?php

class AuthHelper {

    public static function init(){
        if(session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    // public function login($username, $password) {
    //     if ($this->userModel->isValidUser($username, $password)) {
    //         $_SESSION['username'] = $username;
    //         header('Location: index.php');
    //     }
    // }

    public static function login($user) {
        AuthHelper::init();
        $_SESSION['id_usuario'] = $user->id_usuario;
        $_SESSION['usuario'] = $user->usuario;
        $_SESSION['password'] = $user->password;

        // echo '<h1>' .$_SESSION['usuario'] . '</h1>' ;

    }

    // public static function logout(){
    //     AuthHelper::init();
    //     session_destroy();
    // }

    public static function verify(){
        AuthHelper::init();
        if(!isset($_SESSION['id_usuario'])){
            header('Location: '. BASE_URL. 'login');
            die();
        }
    }

}

?>