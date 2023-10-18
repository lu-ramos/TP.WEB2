<?php
require_once 'config.php';

class ModelDB {
    protected $db;

    function __construct() {
        $this->db = new PDO('mysql:host=' . DB_HOST . ';charset=utf8', DB_USER, DB_PASSWORD);
        $this->deploy();
    }

    function deploy() {
        // Chequear si la base de datos "db_parquediversiones" existe
        $query = $this->db->query('SHOW DATABASES LIKE "db_parquediversiones"');
        $databaseExists = $query->rowCount() > 0;

        if (!$databaseExists) {
            // Si la base de datos no existe, créala
            $this->db->exec('CREATE DATABASE db_parquediversiones');
        }

        // Seleccionar la base de datos "db_parquediversiones"
        $this->db->exec('USE db_parquediversiones');

        // Creación de las tablas "categorias", "juegos", y "usuarios"
        $this->db->exec('
            CREATE TABLE IF NOT EXISTS `categorias` (
                `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
                `nombre_categoria` varchar(45) NOT NULL,
                `descripcion` varchar(45) NOT NULL,
                PRIMARY KEY (`id_categoria`)
            )
        ');

        $this->db->exec('
            CREATE TABLE IF NOT EXISTS `juegos` (
                `id_juego` int(11) NOT NULL AUTO_INCREMENT,
                `nombre_juego` varchar(45) NOT NULL,
                `detalle_juego` varchar(200) NOT NULL,
                `altura_minima` float NOT NULL,
                `id_categoria` int(11) NOT NULL,
                PRIMARY KEY (`id_juego`),
                KEY `fk_Juegos_Categorias` (`id_categoria`),
                CONSTRAINT `fk_Juegos_Categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`)
            )
        ');

        $this->db->exec('
            CREATE TABLE IF NOT EXISTS `usuarios` (
                `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
                `usuario` varchar(45) NOT NULL,
                `password` varchar(200) NOT NULL,
                PRIMARY KEY (`id_usuario`)
            )
        ');
        
        // Insertar datos en la tabla "usuarios" solo si no existen registros
        $query = $this->db->query('SELECT * FROM `usuarios`');
        if ($query->rowCount() == 0) {
            $password = 'admin'; // Cambia esto por la contraseña deseada
            $passwordEncriptada = password_hash($password, PASSWORD_DEFAULT);
            $this->db->exec('
                INSERT INTO `usuarios` (`usuario`, `password`) VALUES
                ("webadmin", "$2y$10$6k9jZ0LQGsQFAuGwyB/y1esKRUXa5Ukes5jZIA75T7SU35jZvb/7W"),
                ("admin", "' . $passwordEncriptada . '")
            ');
        }
    }
}

