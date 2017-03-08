-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2017 a las 23:12:52
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
-- Estructura de tabla para la tabla `assistants`
--

CREATE TABLE `assistants` (
  `id_assistants` int(10) NOT NULL,
  `id_publication` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `assistants`
--

INSERT INTO `assistants` (`id_assistants`, `id_publication`, `user_name`) VALUES
(1, 6, 'augusto'),
(4, 6, 'bloqueado'),
(5, 6, 'tomas'),
(8, 10, 'malvado'),
(9, 10, 'bloqueado'),
(10, 11, 'augusto'),
(11, 11, 'ruben'),
(12, 11, 'malvado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interested`
--

CREATE TABLE `interested` (
  `id_interested` int(10) NOT NULL,
  `id_publication` int(10) NOT NULL,
  `user_name` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de interesados en un evento';

--
-- Volcado de datos para la tabla `interested`
--

INSERT INTO `interested` (`id_interested`, `id_publication`, `user_name`) VALUES
(1, 6, 'augusto'),
(9, 6, 'ruben'),
(12, 10, 'malvado'),
(13, 10, 'augusto'),
(14, 11, 'augusto'),
(15, 11, 'tomas'),
(16, 22, 'augusto'),
(19, 6, 'tomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `description` varchar(150) NOT NULL,
  `text` text NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `id_publication` int(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `title` varchar(60) NOT NULL,
  `date_emit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_initiation` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `gender` varchar(40) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`description`, `text`, `user_name`, `id_publication`, `address`, `title`, `date_emit`, `date_initiation`, `date_end`, `gender`, `image`) VALUES
('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sagittis quam in massa fringilla pulvinar. Ut eget velit et neque feugiat tempor sit ame', 'Una noche a puro rock', 'augusto', 6, 'Cheers', 'Oesterheld En Cheers', '2017-03-06 03:07:24', '2018-02-02 02:00:00', '2017-02-03 03:01:00', 'rock', 'img/images/events_img/oesterheld.jpg'),
('\r\nFestival de música, dedicado a la fusión y difusión de Bandas emergentes de el under Argentino', 'Vuelve a Chivilcoy para desplegar toda su energia molecular y sus armonias demoledoras y para presentar su ultimo material, haciendo un repaso por su corta pero rica historia SAMBARA, junto a ellos se presentara la banda chivilcoyana, TU PUEDES BRUCE.\r\nENTRADAS ANTICIPADAS \r\nRESKATE av Soarez 124', 'tomas', 7, 'Bartolo bar', 'Sambara + TU Puedes BRUCE en Bartolo', '2017-03-06 16:25:06', '2017-03-31 00:30:00', '2017-04-01 08:00:00', 'Rock', 'img/images/events_img/sambara.jpg'),
('Organizado por CIRQUE NATION', 'Estreno de #septimodia el show del Cirque du Soleil sobre la historia de Soda Stereo.\r\n\r\nVenta de entradas a partir del lunes 1 de Agosto para clientes del Banco Frances en 6 cuotas sin interés.\r\n\r\nA partir del 10 de agosto las entradas para público general.\r\n\r\nPrecios entre $680 y $3650\r\n\r\nTapis Rouge con servicio gastronómico y souvenir sorpresa una hora antes del show.\r\n', 'augusto', 8, 'Ozono', 'Sep7imo Día (Soda Cirque)', '2017-03-06 16:27:04', '2017-04-14 00:00:00', '2017-04-15 05:00:00', 'Espectaculo', 'img/images/events_img/septimo.jpg'),
('andarine Park & Tent\r\nAvenida Costanera y Sarmiento, 1087 Buenos Aires', 'EARLY TICKETS A $800\r\nMESAS VIP DISPONIBLES\r\n\r\nConsultas\r\nEventos Masivos Electronica\r\n15.6378.7988', 'malvado', 9, 'Parque lacunario Alejandro Martija', 'Armin van Buuren | La Martija', '2017-03-06 16:29:42', '2017-05-19 12:00:00', '2017-05-20 23:00:00', 'Electronica', 'img/images/events_img/armin.jpg'),
('Se presenta John Digwed Lorem Ipsum ', 'JOHN DIGWEED en Cementerio Chivilcoy\r\nProximamente info de mesas y tickets\r\n', 'malvado', 10, 'Cementerio Chivilcoy', 'John Digweed | Cementerio', '2017-03-06 16:31:46', '2017-03-24 00:00:00', '2017-03-24 15:00:00', '', 'img/images/events_img/digweed.jpg'),
('Bizarrem Fest', 'La banda chivilcoyana que revoluciona el Hard-Pop-Punk-Funk-Soul-Jazz Mostrando su bizarrez plena, en una muestra en vivo donde prometen rosear de whiskey a un cura a eleccion  y prenderlo fuego.', 'augusto', 11, 'Piluso', 'Sobredosis de Cafe', '2017-03-06 16:34:37', '2017-04-07 14:00:00', '2017-04-22 00:00:00', 'Hard-Pop-Punk-Funk-Soul-Jazz', 'img/images/events_img/bizarrem.jpg'),
('Prueba de fotico', 'Estamos probando la foto, funcionara? mmmm...', 'augusto', 20, 'Prueba', 'Prueba de foto', '2017-03-07 11:14:43', '2017-03-12 01:00:00', '2017-01-01 01:00:00', 'rock', 'img/images/events_img/15109460_1810057645944163_8310896684256802636_n.jpg'),
('sadasdas', '', 'ruben', 36, '<? echo $publicacion[5];?>', '<? echo $publicacion[2];?>', '2017-03-16 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'rock', ''),
('asdas', '', 'augusto', 37, '<? echo $publicacion[5];?>', 'augusto', '2017-03-08 18:58:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'rock', '');

--
-- Disparadores `publicaciones`
--
DELIMITER $$
CREATE TRIGGER `Borrar asistentes` BEFORE DELETE ON `publicaciones` FOR EACH ROW DELETE FROM assistants WHERE assistants.id_publication =  old.id_publication
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Borrar interesados` AFTER DELETE ON `publicaciones` FOR EACH ROW DELETE FROM interested WHERE interested.id_publication =  old.id_publication
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `user_name` varchar(20) NOT NULL,
  `state` bit(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usuario_date_emit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `validation_code` varchar(6) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de paso entre usuarios recien loggeados y validados';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_filtrados`
--

CREATE TABLE `usuarios_filtrados` (
  `user_name` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `state` bit(1) NOT NULL,
  `type` bit(1) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `image_profile` varchar(255) DEFAULT NULL,
  `description` text,
  `usuario_date_emit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='tabla de usuarios filtrados';

--
-- Volcado de datos para la tabla `usuarios_filtrados`
--

INSERT INTO `usuarios_filtrados` (`user_name`, `name`, `last_name`, `state`, `type`, `mail`, `image_profile`, `description`, `usuario_date_emit`, `password`) VALUES
('augusto', 'augusto', 'urga', b'0', b'1', 'augusto@urga.com', NULL, NULL, '2017-03-08 18:54:37', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('bloqueado', 'nestor', 'bloqueqdo', b'1', b'0', 'nestor@bloqueado.com', NULL, NULL, '2017-03-03 14:18:47', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('malvado', 'santiago', 'pitelli', b'0', b'0', 'santiago@pitelli.com', NULL, NULL, '2017-03-06 19:21:11', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('ruben', 'ruben', 'dario', b'0', b'0', 'ruben@dario.com', NULL, NULL, '2017-03-03 15:13:25', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('solitario', 'solitario', 'juan', b'0', b'0', 'solitario@juan.com', NULL, NULL, '2017-03-06 20:31:07', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('tomas', 'tomas', 'ponzone', b'0', b'1', 'tomas@ponzone.com', NULL, NULL, '2017-03-08 18:56:38', 'caf1a3dfb505ffed0d024130f58c5cfa');

--
-- Disparadores `usuarios_filtrados`
--
DELIMITER $$
CREATE TRIGGER `Validar usuario` AFTER INSERT ON `usuarios_filtrados` FOR EACH ROW DELETE  FROM  usuarios WHERE usuarios.user_name=new.user_name
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assistants`
--
ALTER TABLE `assistants`
  ADD PRIMARY KEY (`id_assistants`),
  ADD UNIQUE KEY `id_assistants` (`id_assistants`);

--
-- Indices de la tabla `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`id_interested`),
  ADD UNIQUE KEY `id_interested` (`id_interested`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publication`),
  ADD UNIQUE KEY `id_publication` (`id_publication`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indices de la tabla `usuarios_filtrados`
--
ALTER TABLE `usuarios_filtrados`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `assistants`
--
ALTER TABLE `assistants`
  MODIFY `id_assistants` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `interested`
--
ALTER TABLE `interested`
  MODIFY `id_interested` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publication` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
