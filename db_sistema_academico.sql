-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-05-2023 a las 04:56:12
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_sistema_academico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `idDocente` int(10) NOT NULL,
  `nombre` char(75) NOT NULL,
  `direccion` char(100) NOT NULL,
  `telefono` char(10) NOT NULL,
  `dui` char(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`idDocente`, `nombre`, `direccion`, `telefono`, `dui`) VALUES
(2, 'Jose Valerio Argueta', 'San Salvador', '2626-7878', '21478563-9'),
(3, 'Carlos Eduardo Castro', 'San Miguel', '2626-4510', '25143675-9'),
(4, 'Adina Cruz', 'Sonsonate', '4512-9563', '21536478-9'),
(5, 'Ludwin Alvarez', 'La Union', '1234-5478', '16347869-9'),
(6, 'Mercedes del Carmen', 'Morazan', '2626-4545', '12345678-9'),
(7, 'Erlinton Isaac Alvarez', 'Usulutan', '4512-6231', '25413687-9');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`idDocente`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `idDocente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
