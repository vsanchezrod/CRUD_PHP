-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2018 a las 21:38:35
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
(22, 'Lolo', '123', 'lolo@lolo.es', 34, '1980-04-05', 'Calle Plata', 28963, 'Madrid', 'Hombre'),
(23, 'Josefa', '123', 'josefa@lolo.es', 54, '1955-01-12', 'Calle PHP TE ODIO', 28933, 'Lleida', 'Hombre'),
(24, 'Sergio', 'lala', 'cachoguapo@loco.es', 26, '2000-05-25', 'Calle de la locura', 28965, 'Burgos', 'Hombre'),
(25, ' Sergio', 'asdadsad', 'Sergio@sdsd.es', 23, '1985-12-02', 'Orusco', 28989, 'Las Palmas', 'Hombre'),
(26, ' V', '123', 'q@q', 34, '1956-12-02', 'adsada', 2895, 'Ãlava', 'Mujer');

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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
