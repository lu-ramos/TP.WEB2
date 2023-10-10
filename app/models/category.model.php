<?php

class CategoryModel {

    private $db;

    function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;dbname=db_parqueDiversiones;charset=utf8','root','');
    }

    function getCategory(){
        $query = $this->db->prepare('SELECT * FROM Categoria');
        $query->execute();
        
        $category = $query->fetchAll(PDO::FETCH_OBJ);
        return $category;
    }

    function getGamesByCategory($categoryId){
        $query = $this->db->prepare('SELECT * FROM juegos WHERE id_categoria = ?');
        
        $query->execute([$categoryId]);
        
        $categoryGames = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoryGames;
    }

}

?>