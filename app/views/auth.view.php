<?php

class AuthView {

    public function showLogin($error = null){
        require './templates/login.phtml';
    }

    public function showWrongPassword(){
        require './templates/error.phtml';
    }

    public function accessUser($usuario,$password){ 
        if($usuario && $password == ($usuario->password)){
            echo "Acceso exitoso";
        }
        else{
            echo "Acceso denegado";
        }
    }
}

?>