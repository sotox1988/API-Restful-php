
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2017 a las 02:09:02
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u574742746_wstes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dev_age_use`
--

CREATE TABLE IF NOT EXISTS `dev_age_use` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `dev_age_use`
--

INSERT INTO `dev_age_use` (`id`, `email`, `password`) VALUES
(1, 'matias.sotomayor@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'matias.sotomayor2@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(3, 'mati@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(4, 'matias.stomayor@gmail.con', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(5, 'toto3@gmail.com', 'fb148a0fd2a7ebe42dd6bcc75cbb1ebc96a2a09f'),
(6, 'toto5@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964'),
(7, 'yoyo12@gmail.con', '4978eb4e5c4c976a29ff9e2dcebd4220815d8fb1'),
(8, 'pili@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(9, '1@gmail.com', '81fe8bfe87576c3ecb22426f8e57847382917acf'),
(10, 'pepe@gmai.com', '8cb2237d0679ca88db6464eac60da96345513964');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
