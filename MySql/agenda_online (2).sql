-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-03-2017 a las 21:56:52
-- Versión del servidor: 5.7.17-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.2

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interested`
--

CREATE TABLE `interested` (
  `id_interested` int(10) NOT NULL,
  `id_publication` int(10) NOT NULL,
  `user_name` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de interesados en un evento';

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
('kansdka', 'nasdk', 'augusto', 1, 'sndak', 'tuben', '2017-03-03 21:09:48', '0101-01-01 02:20:00', '0202-02-02 21:21:00', 'rock', NULL),
('kansdka', 'nasdk', 'augusto', 2, 'sndak', 'tuben', '2017-03-03 21:11:57', '0101-01-01 02:20:00', '0202-02-02 21:21:00', 'rock', NULL),
('kansdka', 'nasdk', 'augusto', 3, 'sndak', 'holas', '2017-03-03 21:12:18', '0101-01-01 02:20:00', '0202-02-02 21:21:00', 'rock', NULL),
('as', 'asd', 'augusto', 4, 'askdnka', 'holas', '2017-03-03 21:35:21', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'rock', NULL),
('as', 'asd', 'augusto', 5, 'askdnka', 'holas', '2017-03-03 21:35:31', '2017-01-01 00:00:00', '2017-01-01 00:00:00', 'rock', NULL);

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
('augusto', 'augusto', 'urga', b'0', b'0', 'augusto@urga.com', NULL, NULL, '2017-03-03 14:57:20', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('bloqueado', 'nestor', 'bloqueqdo', b'1', b'0', 'nestor@bloqueado.com', NULL, NULL, '2017-03-03 14:18:47', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('nd', 'nd', 'nd', b'0', b'0', 'nd@nd.com', NULL, NULL, '2017-03-02 00:38:08', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('PEPITO', 'pepito', 'juarez', b'0', b'0', 'pepito@juarez.com', NULL, NULL, '2017-03-03 15:06:39', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('resto', 'resto', 'bar', b'0', b'0', 'resto@bar.com', NULL, NULL, '2017-03-03 15:17:08', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('ruben', 'ruben', 'dario', b'0', b'0', 'ruben@dario.com', NULL, NULL, '2017-03-03 15:13:25', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('sarapa', 'nelson', 'bloqueado', b'0', b'0', 'nelson@bloqueado.com', NULL, NULL, '2017-03-03 14:52:57', 'caf1a3dfb505ffed0d024130f58c5cfa'),
('tomas', 'tomas', 'ponzone', b'0', b'0', 'tomas@ponzone.com', NULL, NULL, '2017-03-03 15:24:08', 'caf1a3dfb505ffed0d024130f58c5cfa');

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
-- AUTO_INCREMENT de la tabla `interested`
--
ALTER TABLE `interested`
  MODIFY `id_interested` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publication` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
