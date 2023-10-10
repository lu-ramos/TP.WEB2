<?php

class UserModel {

    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;dbname=db_parqueDiversiones;charset=utf8', 'root', '');
    }

    public function getUser($usuario){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE usuario = ? ');
        $query->execute([$usuario]);

        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

    public function addUser(){
        $query = $db->prepare('INSERT INTO usuarios (usuario, password) VALUES (? , ?)');
        $query->execute([$usuario,$password]);
    }

}

?>