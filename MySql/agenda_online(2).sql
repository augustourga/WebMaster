-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2017 at 04:51 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistants`
--

CREATE TABLE `assistants` (
  `id_assistants` int(10) NOT NULL,
  `id_publication` int(10) NOT NULL,
  `user_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `interested`
--

CREATE TABLE `interested` (
  `id_interested` int(10) NOT NULL,
  `id_publication` int(10) NOT NULL,
  `user_name` varchar(29) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabla de interesados en un evento';

-- --------------------------------------------------------

--
-- Table structure for table `publicaciones`
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

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Table structure for table `usuarios_filtrados`
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
-- Dumping data for table `usuarios_filtrados`
--

INSERT INTO `usuarios_filtrados` (`user_name`, `name`, `last_name`, `state`, `type`, `mail`, `image_profile`, `description`, `usuario_date_emit`, `password`) VALUES
('augusto', 'augusto', 'urga', b'0', b'0', 'asda@sad.com', '', '', '2017-02-11 20:47:39', '321'),
('bloqueado', 'nelson', 'bergoglio', b'1', b'1', 'nelson@papa.com', NULL, NULL, '2017-02-16 19:25:31', '321'),
('roberto', 'roberto', 'flores', b'1', b'1', 'asd@sad.com', NULL, NULL, '2017-02-24 19:45:49', '321');

--
-- Triggers `usuarios_filtrados`
--
DELIMITER $$
CREATE TRIGGER `Validar usuario` AFTER INSERT ON `usuarios_filtrados` FOR EACH ROW DELETE  FROM  usuarios WHERE usuarios.user_name=new.user_name
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `interested`
--
ALTER TABLE `interested`
  ADD PRIMARY KEY (`id_interested`),
  ADD UNIQUE KEY `id_interested` (`id_interested`);

--
-- Indexes for table `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_publication`),
  ADD UNIQUE KEY `id_publication` (`id_publication`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `usuarios_filtrados`
--
ALTER TABLE `usuarios_filtrados`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `interested`
--
ALTER TABLE `interested`
  MODIFY `id_interested` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `publicaciones`
--
ALTER TABLE `publicaciones`
  MODIFY `id_publication` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
