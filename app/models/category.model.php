<?php

class CategoryModel {

    private $db;

    public function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;dbname=db_parqueDiversiones;charset=utf8','root','');
    }

    public function getAllCategories() {
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
        
        $categories = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categories;
    }

    public function getCategory($categoryId){


        $query = $this->db->prepare('SELECT * FROM juegos WHERE id_categoria = ?');
        
        //$query = $this->db->prepare('SELECT Categorias.id_categoria, Categorias.nombre_categoria, Categorias.descripcion AS descripcion_categoria, juegos.id_juego, juegos.nombre_juego, juegos.detalle_juego, juegos.altura_minima AS descripcion_juego
        //FROM Categorias
        //INNER JOIN juegos ON categorias.id_categoria = juegos.id_categoria
        //WHERE categorias.id_categoria = ?');

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