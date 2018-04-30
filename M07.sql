-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-04-2018 a las 23:09:00
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
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`Id`, `Nombre`) VALUES
(1, 'Álava'),
(2, 'Albacete'),
(3, 'Alicante'),
(4, 'Almería'),
(5, 'Asturias'),
(6, 'Ávila'),
(7, 'Badajoz'),
(8, 'Barcelona'),
(9, 'Burgos'),
(10, 'Cáceres'),
(11, 'Cádiz'),
(12, 'Cantabria'),
(13, 'Castellón'),
(14, 'Ceuta'),
(15, 'Ciudad Real'),
(16, 'Córdoba'),
(17, 'La Coruña'),
(18, 'Cuenca'),
(19, 'Gerona'),
(20, 'Granada'),
(21, 'Guadalajara'),
(22, 'Guipúzcoa'),
(23, 'Huelva'),
(24, 'Huesca'),
(25, 'Islas Baleares'),
(26, 'Jaén'),
(27, 'León'),
(28, 'Lérida'),
(29, 'Lugo'),
(30, 'Madrid'),
(31, 'Málaga'),
(32, 'Melilla'),
(33, 'Murcia'),
(34, 'Navarra'),
(35, 'Orense'),
(36, 'Palencia'),
(37, 'Las Palmas'),
(38, 'Pontevedra'),
(39, 'La Rioja'),
(40, 'Salamanca'),
(41, 'Segovia'),
(42, 'Sevilla'),
(43, 'Soria'),
(44, 'Tarragona'),
(45, 'Santa Cruz de Tenerife'),
(46, 'Teruel'),
(47, 'Toledo'),
(48, 'Valencia'),
(49, 'Valladolid'),
(50, 'Vizcaya'),
(51, 'Zamora'),
(52, 'Zaragoza'),
(61, 'La Comarca'),
(62, 'EspacioSideral'),
(63, 'Narnia'),
(64, 'Rivendell');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registroEntrada`
--

CREATE TABLE `registroEntrada` (
  `Id` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registroEntrada`
--

INSERT INTO `registroEntrada` (`Id`, `IdUsuario`, `Fecha`) VALUES
(6, 24, '2018-04-30 09:21:21'),
(7, 31, '2018-04-30 15:36:27'),
(8, 68, '2018-04-30 16:09:55'),
(9, 99, '2018-04-30 21:02:59'),
(11, 24, '2018-04-30 21:07:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) DEFAULT NULL,
  `Contrasena` varchar(8) NOT NULL,
  `Email` varchar(30) NOT NULL,
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
(24, 'Sergio', 'lala', 'sergio@php.es', 26, '1989-05-25', 'Calle Princesa', 28964, 'Burgos', 'Hombre'),
(25, 'Juan', 'uwjcvm56', 'juan@yahoo.es', 32, '1985-12-02', 'Calle Viena', 28985, 'Las Palmas', 'Hombre'),
(26, ' Virginia', '12345678', 'vir@query.es', 65, '1956-12-02', 'Calle Ávila', 15236, 'Cuenca', 'Mujer'),
(28, 'Jose Manoli', 'zxcz', 'manoli@asdad', 68, '1950-04-05', 'Calle Legazpi', 32965, 'Cádiz', 'Mujer'),
(31, 'Lolo ', '789456', 'lolo@lolo.es', 38, '1980-02-08', 'Calle Javascript', 8563, 'Barcelona', 'Hombre'),
(32, 'Vero', 'orlfk783', 'vero@ilerna.es', 45, '1973-04-05', 'Calle Silvela', 28963, 'Lugo', 'Mujer'),
(33, 'Carlos', 'qwefgh78', 'carlos@lopez.es', 33, '1985-12-01', 'Calle Argentina', 15489, 'Huesca', 'Hombre'),
(34, 'Paco', 'cghj78qw', 'paco@ibm.es', 48, '1990-12-02', 'Calle Velazquez', 28935, 'Madrid', 'Hombre'),
(45, 'Pepa', 'gomez123', 'pepa@gomez.php.es', 37, '1980-12-02', 'Avenida de la Onu', 28964, 'Madrid', 'Mujer'),
(46, 'Margarita', 'saladty', 'margarita@ibm.es', 20, '1996-06-15', 'Calle J', 17857, 'Guipúzcoa', 'Mujer'),
(47, 'Sara', 'sara12', 'sara12@gmail.com', 20, '1998-02-01', 'Calle Zulema', 1235, 'Alava', 'Mujer'),
(48, 'Pepito', '1234', 'pepito@gmail.com', 23, '1995-05-03', 'Plaza España', 8962, 'Barcelona', 'Hombre'),
(49, 'Bango', '1234', 'bango@hotmail.com', 5, '2013-06-05', 'Calle Orusco', 51000, 'Zamora', 'Hombre'),
(50, 'Fernando', '8907', 'fer@fer.es', 50, '1968-10-13', 'Plaza de la Onu', 6587, 'Granada', 'Hombre'),
(60, 'Lara', 'lara', 'lara@telefonica.es', 30, '1988-10-14', 'Calle Carlos III', 8654, 'Barcelona', 'Mujer'),
(62, 'Leo', '12345', 'usuarioleo@ilerna.es', 0, '1998-07-08', '', 0, 'Huesca', 'Hombre'),
(67, 'admin', 'admin', 'adminVir@admin.com', 32, '1986-01-14', 'C/ Admin de BBDD', 28706, 'Madrid', 'Mujer'),
(68, 'Virginia Sánchez', 'vir2', 'vir2@query.es', 0, '1983-12-05', 'Nave B', 0, 'Islas Baleares', 'Mujer'),
(97, 'Luis', 'luisinfo', 'informatico@empresa.es', 50, '1968-01-01', 'Polígono A', 7985, 'Gerona', 'Hombre'),
(98, 'Bango', 'bango123', 'bango@perro.es', 5, '2012-05-06', 'Calle del Pez', 5698, 'Asturias', 'Hombre'),
(99, 'Alonso', 'ferrari', 'alonso@ferrari.es', 38, '1980-02-04', 'Avenida de la Velocidad', 3659, 'La Coruña', 'Hombre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `registroEntrada`
--
ALTER TABLE `registroEntrada`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `foreign_key1` (`IdUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD UNIQUE KEY `uc_emailduplicado` (`Email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `registroEntrada`
--
ALTER TABLE `registroEntrada`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `registroEntrada`
--
ALTER TABLE `registroEntrada`
  ADD CONSTRAINT `foreign_key1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
