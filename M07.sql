-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-04-2018 a las 18:21:27
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `M07`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Contrasena` varchar(8) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Edad` int(11) DEFAULT NULL,
  `FechaNacimiento` date DEFAULT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `CodigoPostal` int(11) DEFAULT NULL,
  `Provincia` varchar(30) DEFAULT NULL,
  `Genero` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id`, `Nombre`, `Contrasena`, `Email`, `Edad`, `FechaNacimiento`, `Direccion`, `CodigoPostal`, `Provincia`, `Genero`) VALUES
(23, 'Josefa', 'eufmtrks', 'josefa@ilerna.es', 54, '1955-01-12', 'Calle Serrano', 52001, 'Ciudad Real', 'Mujer'),
(24, 'Sergio', 'lala', 'sergio@php.es', 26, '1989-05-25', 'Calle Princesa', 28965, 'Burgos', 'Hombre'),
(25, 'Juan', 'uwjcvm56', 'juan@yahoo.es', 33, '1985-12-02', 'Calle Viena', 28989, 'Las Palmas', 'Hombre'),
(26, ' Virginia', '12345678', 'vir@query.es', 62, '1956-12-02', 'Calle Ãvila', 15236, 'Cuenca', 'Mujer'),
(28, 'Jose Manoli', 'zxcz', 'manoli@asdad', 68, '1950-04-05', 'Calle Legazpi', 32965, 'CÃ¡diz', 'Mujer'),
(31, 'Lolo ', '789456', 'lolo@lolo.es', 38, '1980-02-08', 'Calle Javascript', 8963, 'Barcelona', 'Hombre'),
(32, 'Vero', 'orlfk783', 'vero@ilerna.es', 45, '1973-04-05', 'Calle Silvela', 28963, 'Lugo', 'Mujer'),
(33, 'Carlos', 'qwefgh78', 'carlos@lopez.es', 33, '1985-12-01', 'Calle Argentina', 15489, 'Huesca', 'Hombre'),
(34, 'Paco', 'cghj78qw', 'paco@ibm.es', 48, '1990-12-02', 'Calle Velazquez', 28935, 'Madrid', 'Hombre'),
(43, ' Sergio ', 'asdadsad', 'Sergio@sdsd.es', 23, '1985-12-02', 'Avenida Madrid', 35697, 'Asturias', 'Hombre'),
(44, 'Lola', '123', 'lola@lolo1.es', 34, '1980-04-05', 'Calle del Carmen', 4968, 'Alicante', 'Mujer');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
