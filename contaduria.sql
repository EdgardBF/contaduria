-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-05-2017 a las 16:34:52
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `contaduria`
--
CREATE DATABASE IF NOT EXISTS `contaduria` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `contaduria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descanso_semanal`
--

CREATE TABLE `descanso_semanal` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_empleado` int(11) UNSIGNED NOT NULL,
  `salario` decimal(10,2) NOT NULL,
  `dias_trabajados` int(2) NOT NULL,
  `salario_dia` int(11) NOT NULL,
  `salario_dia_descanso` decimal(10,2) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `descanso_semanal`
--

INSERT INTO `descanso_semanal` (`id`, `id_empleado`, `salario`, `dias_trabajados`, `salario_dia`, `salario_dia_descanso`, `total`) VALUES
(1, 1, '30.00', 1, 1, '1.50', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`) VALUES
(1, 'Edgard Barrera');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descanso_semanal`
--
ALTER TABLE `descanso_semanal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descanso_semanal`
--
ALTER TABLE `descanso_semanal`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descanso_semanal`
--
ALTER TABLE `descanso_semanal`
  ADD CONSTRAINT `descanso_semanal_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
