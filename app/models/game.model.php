<?php

class GameModel
{

    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=db_parqueDiversiones;charset=utf8', 'root', '');
    }

    function getGamesWithCategoryNames()
    {
        $query = $this->db->prepare('SELECT juegos.*, categorias.nombre_categoria 
                                    FROM juegos 
                                    JOIN categorias ON juegos.id_categoria = categorias.id_categoria');
        $query->execute();

        $games = $query->fetchAll(PDO::FETCH_OBJ);
        return $games;
    }


    function getGameDetails($gameId){
        $query = $this->db->prepare('SELECT juegos.*, categorias.descripcion AS categoria_descripcion
                                    FROM juegos
                                    JOIN categorias ON juegos.id_categoria = categorias.id_categoria
                                    WHERE juegos.id_juego = ?');
        $query->execute([$gameId]);
        
        $gameDetails = $query->fetch(PDO::FETCH_OBJ);
        return $gameDetails;
    }

}
