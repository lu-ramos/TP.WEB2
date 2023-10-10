<?php

class CategoryModel {

    private $db;

    function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;dbname=db_parqueDiversiones;charset=utf8','root','');
    }

    function getCategory(){
        $query = $this->db->prepare('SELECT * FROM Categorias');
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

    public function insertCategory ($game){
        $query = $this->db->prepare('INSERT INTO juegos (titulo) VALUES(?)');
        $query->execute([$game]);

        return $this->db->lastInsertId();
    }

    public function deleteCategory ($id){
        $query = $this->db->prepare('DELETE FROM juegos WHERE id = ?');
        $query->execute([$id]);
    
    }

    public function updateCategory ($id) {    
        $query = $this->db->prepare('UPDATE categorias SET  nombre_categoria = ?, WHERE id = ?');
        $query->execute([$id]);
    }

}

?>