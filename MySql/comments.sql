-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2017 a las 16:37:05
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda_online`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_comments` int(10) NOT NULL,
  `date_comments` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `comment` text COLLATE utf8_spanish_ci NOT NULL,
  `id_publication` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_comments`, `date_comments`, `user_name`, `comment`, `id_publication`) VALUES
(1, '2017-03-14 13:32:21', 'augusto', 'Aguante Oesterheld, mi vieja y Perón, carajo.', 6),
(2, '2017-03-14 13:36:41', 'malvado', 'Hoy reventamos cheers, manga de gatos', 6),
(3, '2017-03-14 13:39:53', 'ruben', 'Salen rolitas', 11),
(14, '2017-03-14 16:22:26', 'augusto', 'Se viene alto evento locutaaaaaa', 6),
(16, '2017-03-14 16:27:03', 'augusto', 'Estos de sambara son altos gatos', 7),
(19, '2017-03-14 18:41:28', 'augusto', 'Abdala ahja zamalÃ¡', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comments`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comments` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
