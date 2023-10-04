-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-09-2023 a las 00:44:16
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_parqueDiversiones`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categorias`
--

CREATE TABLE `Categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Categorias`
--

INSERT INTO `Categorias` (`id_categoria`, `nombre_categoria`, `descripcion`) VALUES
(1, 'Acuáticos', 'Parque de agua'),
(2, 'Safari', 'Recorrido por la jungla'),
(3, 'Eléctricos', 'Juegos simuladores'),
(4, 'Niños', 'Shows infantiles'),
(5, 'Adrenalina', 'Juegos de altura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Juegos`
--

CREATE TABLE `Juegos` (
  `id_juego` int(11) NOT NULL,
  `nombre_juego` varchar(45) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `Juegos`
--

INSERT INTO `Juegos` (`id_juego`, `nombre_juego`, `id_categoria`) VALUES
(1, 'Toboganes', 1),
(2, 'Desorbitado', 5),
(3, 'Zoo', 2),
(4, 'Simuladores', 3),
(5, 'Show Nemo', 4),
(6, 'Montaña Rusa', 5),
(7, 'Autitos Chocadores', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `Juegos`
--
ALTER TABLE `Juegos`
  ADD PRIMARY KEY (`id_juego`),
  ADD KEY `fk_Juegos_Categorias` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Categorias`
--
ALTER TABLE `Categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `Juegos`
--
ALTER TABLE `Juegos`
  MODIFY `id_juego` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Juegos`
--
ALTER TABLE `Juegos`
  ADD CONSTRAINT `fk_Juegos_Categorias` FOREIGN KEY (`id_categoria`) REFERENCES `Categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
