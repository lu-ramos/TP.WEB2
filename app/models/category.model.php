<?php

class CategoryModel {

    private $db;

    public function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;dbname=db_parqueDiversiones;charset=utf8','root','');
    }

    public function getCategory(){
        $query = $this->db->prepare('SELECT * FROM Categorias');
        $query->execute();
        
        $category = $query->fetchAll(PDO::FETCH_OBJ);
        return $category;
    }

    public function getGamesByCategory($categoryId){
        $query = $this->db->prepare('SELECT * FROM juegos WHERE id_categoria = ?');
        
        $query->execute([$categoryId]);
        
        $categoryGames = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoryGames;
    }

    public function insertCategory ($category){
        $query = $this->db->prepare('INSERT INTO categorias(category) VALUES(?)');
        $query->execute([$category]);

        return $this->db->lastInsertId();
    }

    public function deleteCategory ($id){
        $query = $this->db->prepare('DELETE FROM categorias WHERE id = ?');
        $query->execute([$id]);
    
    }

    public function updateCategory ($id) {    
        $query = $this->db->prepare('UPDATE categorias SET nombre_categoria = ?, WHERE id = ?');
        $query->execute([$id]);
    }

}

?>