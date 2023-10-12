<?php

class GameModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_parqueDiversiones;charset=utf8', 'root', '');
    }

    public function getGamesWithCategoryNames()
    {
        $query = $this->db->prepare('SELECT juegos.*, categorias.nombre_categoria 
                                    FROM juegos 
                                    JOIN categorias ON juegos.id_categoria = categorias.id_categoria');
        $query->execute();

        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }


    public function getGameDetails($gameId){
        $query = $this->db->prepare('SELECT juegos.*, categorias.descripcion AS categoria_descripcion
                                    FROM juegos
                                    JOIN categorias ON juegos.id_categoria = categorias.id_categoria
                                    WHERE juegos.id_juego = ?');
        $query->execute([$gameId]);
        
        $gameDetails = $query->fetch(PDO::FETCH_OBJ);
        return $gameDetails;
    }

    public function insertGame($game){
        $query = $this->db->prepare('INSERT INTO juegos(game) VALUES(?)');
        $query->execute([$game]);

        return $this->db->lastInsertId();
    }

    public function deleteGame($id){
        $query = $this->db->prepare('DELETE FROM juegos WHERE id = ?');
        $query->execute([$id]);
    
    }

    public function updateGame ($id) {    
        $query = $this->db->prepare('UPDATE juegos SET `nombre_juego`= ?, WHERE id = ?');
        $query->execute([$id]);
    }

}
