-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2025 a las 19:54:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `ISBN` char(13) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `url_imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`ISBN`, `titulo`, `autor`, `genero`, `url_imagen`) VALUES
('9562391443', 'No pidas sardina ', 'Andreu Martín, Jaume Ribera', 'Misterio', 'SARDINAS.jpg'),
('9780307476463', '1Q84', 'Haruki Murakami', 'Comedia', '1Q84.jpg'),
('9780374346676', 'Cartas de amor a los muertos', 'Emma Watson', 'Romance', 'CARTAS.jpg'),
('9780439064873', 'Harry Potter y la cámara secreta', 'J.K. Rowling', 'Fantasía', 'HP-CS.jpg'),
('9780439139601', 'Harry Potter y el cáliz de fuego', 'J.K. Rowling', 'Fantasía', 'HP-CF.jpg'),
('9780439554930', 'Harry Potter y la piedra filosofal', 'J.K. Rowling', 'Fantasía', 'HP-PF.jpg'),
('9780786961089', 'Las dos espadas', 'R.A. Salvatore', 'Fantasía', 'D&D-2.jpg'),
('9788408254159', 'Culpa mía', 'Mercedes Ron', 'Romance', 'CM.jpg'),
('9788408269825', 'Culpa tuya', 'Mercedes Ron', 'Romance', 'CT.jpg'),
('9788408270777', 'Culpa nuestra', 'Mercedes Ron', 'Romance', 'CN.jpg'),
('9788416327393', 'A través de mi ventana', 'Ariana Godoy', 'Romance', 'ATV.jpg'),
('9788418050022', 'Invisible', 'Eloy Moreno', 'Drama', 'INV.jpg'),
('9788418050350', 'Redes', 'Eloy Moreno', 'Drama', 'redes.jpg'),
('9788419260543', 'Viento Y Verdad', 'Brandon Sanderson', 'Fantasía/Aventura', 'vientoyverdad.jpg'),
('9788466333384', 'Mentes poderosas', 'Alexandra Bracken', 'Ciencia Ficción', 'MP-1.jpg'),
('9788466334206', 'Nunca olvidan', 'Alexandra Bracken', 'Ciencia Ficción', 'MP-2.jpg'),
('9788467052930', 'Como dejar de fumar', 'Rhea Sivi, Geoffrey Molloy', 'Manual', 'FUMAR.jpg'),
('9788491747659', 'Naruto Shinppuden', 'Masashi Kishimoto', 'Manga', 'NARUTO.jpg'),
('9788496204165', 'Fahrenheit 451', 'Ray Bradbury', 'Ciencia Ficción', 'FA-451.jpg'),
('9788497593123', '1984', 'George Orwell', 'Ciencia Ficción', '1984.jpg'),
('9788550301433', 'Guía para mancos', 'Riot Games', 'Manual', 'RIOT.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `ISBN` char(13) NOT NULL,
  `fecha_desde` date NOT NULL,
  `fecha_hasta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `id_usuario`, `ISBN`, `fecha_desde`, `fecha_hasta`) VALUES
(14, 11, '9788408269825', '2025-01-17', '2025-01-31'),
(16, 10, '9788408269825', '2025-01-17', '2025-03-29'),
(17, 11, '9780439064873', '2025-01-17', '2025-02-06'),
(18, 10, '9788496204165', '2025-01-17', '2025-03-06'),
(19, 11, '9780439139601', '2025-01-17', '2025-01-31'),
(20, 11, '9788408270777', '2025-01-17', '2025-02-01'),
(21, 10, '9780439139601', '2025-01-17', '2025-01-31'),
(22, 10, '9780439139601', '2025-01-17', '2025-02-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido1` varchar(50) NOT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `rol` enum('A','U') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido1`, `apellido2`, `rol`, `email`, `pass`) VALUES
(10, 'user', '', '', 'U', 'pepe@ribera.com', '$2y$10$iHgujJAhE4wDIg7mokX4medRsrM0BZ4mbs23kvlPbu0Knkn.yLrga'),
(11, 'admin', '', '', 'A', 'admin@gmail.com', '$2y$10$H5YBwV7b9pKmsru1.WsUcegy8/p3pqixFXZZT4ls7sSvEGjTNOFFS'),
(17, 'Maria', 'Perez', '', 'U', 'Maria@ribera.com', '$2y$10$iHgujJAhE4wDIg7mokX4medRsrM0BZ4mbs23kvlPbu0Knkn.yLrga');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`ISBN`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `ISBN` (`ISBN`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`ISBN`) REFERENCES `libros` (`ISBN`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
