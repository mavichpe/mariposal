-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-02-2021 a las 22:48:44
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mariposal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `date` date NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `title`, `price`, `date`, `category_id`) VALUES
(1, 'Actividad un', 1500, '2021-02-14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities_members`
--

CREATE TABLE `activities_members` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `is-pay` tinyint(1) NOT NULL,
  `monto` int(11) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `activities_members`
--

INSERT INTO `activities_members` (`id`, `member_id`, `activity_id`, `is-pay`, `monto`, `created`) VALUES
(3, 1, 1, 1, 1500, '2021-02-14 21:48:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Carne Asada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familymembers`
--

CREATE TABLE `familymembers` (
  `id` int(11) NOT NULL,
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
  `is-ccss` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `familymembers`
--

INSERT INTO `familymembers` (`id`, `member_id`, `name`, `edad`, `cedula`, `parentesco`, `estado-civil`, `ocupacion`, `lugar-trabajo`, `tel`, `salario-bruto`, `salario-neto`, `is-ccss`) VALUES
(1, 1, 'PEdro', 1, '1', 0, 0, '11', '111', 1111, 1111, 1111, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `carnet-cd` varchar(50) DEFAULT NULL,
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
  `ingreso` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`id`, `name`, `carnet-cd`, `cedula`, `edad`, `estado-civil`, `tel-habitacion`, `tel-trabajo`, `tel-cel`, `direccion`, `ocupacion`, `trabajo`, `programa-obtar`, `is-ahorro`, `is-bono-59`, `is-discapacitado`, `discapacidad-details`, `observaciones`, `elaborado-por`, `ingreso`) VALUES
(1, 'amem', '1010', '13231', 12, 2, '12321312', '12313', '131231', 'zapote', 'Trabajador indipendiente', 'trabajito', 1, 1, 1, 1, 'Hijo con silla de ruedas', 'Lo hice yo', 'MArco chacon', '2015-04-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `created`, `modified`) VALUES
(3, 'Marco', 'admin', '$2a$10$XucY6o.Ob5/ZzMGOw1YWG.7cQTThlOFstDmrQJ.bkqfNXHdXvSmFG', '2021-02-14 21:27:51', '2021-02-14 20:59:38');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `activities_members`
--
ALTER TABLE `activities_members`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `familymembers`
--
ALTER TABLE `familymembers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `activities_members`
--
ALTER TABLE `activities_members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `familymembers`
--
ALTER TABLE `familymembers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
