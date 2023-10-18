<?php

class AuthView {

    public function showLogin($error = null){
        require './templates/login.phtml';
    }

    public function showWrongPassword(){
        require './templates/error.phtml';
    }
}

?>