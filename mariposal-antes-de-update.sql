-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-04-2015 a las 22:49:14
-- Versión del servidor: 5.5.36
-- Versión de PHP: 5.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mariposal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familymembers`
--

CREATE TABLE IF NOT EXISTS `familymembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `edad` int(11) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `parentesco` int(11) NOT NULL,
  `estado-civil` int(11) NOT NULL,
  `ocupacion` varchar(50) NOT NULL,
  `lugar-trabajo` varchar(250) NOT NULL,
  `tel` int(11) NOT NULL,
  `salario-bruto` int(11) NOT NULL,
  `salario-neto` int(11) NOT NULL,
  `is-ccss` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `estado-civil` int(11) NOT NULL,
  `tel-habitacion` varchar(12) NOT NULL,
  `tel-trabajo` varchar(12) NOT NULL,
  `tel-cel` varchar(12) NOT NULL,
  `direccion` mediumtext NOT NULL,
  `ocupacion` varchar(60) NOT NULL,
  `trabajo` varchar(120) NOT NULL,
  `programa-obtar` int(11) NOT NULL,
  `is-ahorro` tinyint(1) NOT NULL,
  `is-bono-59` tinyint(1) NOT NULL,
  `is-discapacitado` tinyint(1) NOT NULL,
  `discapacidad-details` mediumtext NOT NULL,
  `observaciones` mediumtext NOT NULL,
  `elaborado-por` varchar(50) NOT NULL,
  `ingreso` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`id`, `name`, `cedula`, `edad`, `estado-civil`, `tel-habitacion`, `tel-trabajo`, `tel-cel`, `direccion`, `ocupacion`, `trabajo`, `programa-obtar`, `is-ahorro`, `is-bono-59`, `is-discapacitado`, `discapacidad-details`, `observaciones`, `elaborado-por`, `ingreso`) VALUES
(1, 'amem', '13231', 12, 2, '12321312', '12313', '131231', 'zapote', 'Trabajador indipendiente', 'trabajito', 1, 1, 1, 1, 'Hijo con silla de ruedas', 'Lo hice yo', 'MArco chacon', '2015-04-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created`, `modified`) VALUES
(2, 'admin', '1af1231af045ed6', '2015-04-21 07:10:18', '2015-04-22 04:09:12');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
