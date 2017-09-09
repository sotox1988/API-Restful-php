
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2017 a las 02:09:09
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: ``
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dev_age_dev`
--

CREATE TABLE IF NOT EXISTS `dev_age_dev` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `dni` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `especialidad` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `dev_age_dev`
--

INSERT INTO `dev_age_dev` (`id`, `dni`, `nombre`, `apellidos`, `email`, `especialidad`) VALUES
(1, '1234', 'Mati', 'Soto', 'mati@gmail.com', 'Java'),
(2, '17845', 'Matías ????', 'Miel', 'maty@gmail.com', 'C#'),
(3, '1234567', 'Gogo', 'Dancer', 'gogo@gmail.com', 'Php'),
(4, '1234678', 'Pipi', 'Pipita', 'pipi@gmail.com', 'Reposteria'),
(5, '777', 'Jonny', 'Bravo', 'mov@gmaul.com', 'Citt');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
