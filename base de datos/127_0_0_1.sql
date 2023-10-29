-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 01:30:48
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_emoji`
--
CREATE DATABASE IF NOT EXISTS `proyecto_emoji` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `proyecto_emoji`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` tinyint(4) NOT NULL,
  `descripMarca` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`idMarca`, `descripMarca`) VALUES
(1, 'Andina'),
(2, 'Doble Anis'),
(3, 'Aguila'),
(4, 'Aguila ligth'),
(5, 'Poker'),
(6, 'Club Colombia'),
(7, 'Costeña'),
(8, 'Heinekken'),
(9, 'Corona'),
(10, 'Ron'),
(11, 'Black/White'),
(12, 'Smirnoff'),
(13, 'Whisky'),
(14, 'Tekila'),
(15, 'Gatorade'),
(16, 'Bretaña'),
(17, 'Agua'),
(18, 'Jugo Hit'),
(19, 'Gaseosa'),
(20, 'Red Bull'),
(21, 'Speed'),
(22, 'Cigarrillos'),
(23, 'Detodito'),
(24, 'Chicharron'),
(25, 'Cheetos'),
(26, 'Mani'),
(27, 'Gomas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `idMovimiento` int(11) NOT NULL,
  `fechaMovimiento` datetime NOT NULL DEFAULT current_timestamp(),
  `idProducto` tinyint(4) NOT NULL,
  `tipoMovimiento` tinyint(4) NOT NULL COMMENT '1=Entrada, 2=Salida',
  `cantMovimiento` smallint(10) NOT NULL,
  `idAdmin` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`idMovimiento`, `fechaMovimiento`, `idProducto`, `tipoMovimiento`, `cantMovimiento`, `idAdmin`) VALUES
(1, '2023-08-26 11:20:26', 1, 1, 21, 100),
(2, '2023-08-26 11:21:10', 1, 2, 645, 100),
(3, '2023-09-03 15:03:05', 1, 2, 10, 100),
(4, '2023-09-03 19:52:25', 1, 1, 10, 100),
(5, '2023-09-09 11:02:00', 5, 2, 5, 100),
(7, '2023-09-09 11:09:07', 5, 1, 5, 100),
(8, '2023-09-09 11:09:26', 5, 2, 2, 100),
(9, '2023-09-09 11:10:27', 5, 1, 6, 100),
(10, '2023-09-09 11:10:46', 5, 2, 3, 100),
(11, '2023-09-09 11:11:23', 1, 2, 2, 100),
(12, '2023-09-09 11:13:03', 4, 2, 2, 100),
(13, '2023-09-09 11:13:18', 1, 1, 40, 100),
(14, '2023-09-09 11:13:37', 1, 2, 10, 100),
(15, '2023-09-09 11:13:59', 1, 2, 40, 100),
(18, '2023-09-09 11:16:42', 4, 2, 3, 100),
(19, '2023-09-09 11:17:31', 4, 1, 3, 100),
(20, '2023-09-09 11:17:48', 4, 1, 3, 100),
(22, '2023-10-02 16:11:27', 1, 1, 21, 200),
(23, '2023-10-02 16:14:31', 6, 1, 1, 200),
(24, '2023-10-02 16:15:20', 5, 1, 20, 200),
(26, '2023-10-17 16:40:37', 4, 1, 6, 200),
(27, '2023-10-17 16:41:08', 6, 2, 6, 200),
(28, '2023-10-17 18:08:54', 4, 1, -1, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentacion`
--

CREATE TABLE `presentacion` (
  `idPresentacion` int(11) NOT NULL,
  `descPresentacion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `presentacion`
--

INSERT INTO `presentacion` (`idPresentacion`, `descPresentacion`) VALUES
(1, 'Unidad'),
(2, 'Canastas'),
(3, 'Cajas'),
(4, 'Sixpak'),
(5, 'Botella'),
(6, 'Lata'),
(7, 'Media');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` tinyint(4) NOT NULL,
  `nomProducto` varchar(20) NOT NULL,
  `idMarca` tinyint(4) NOT NULL,
  `idPresentacion` int(11) NOT NULL,
  `preProducto` int(11) NOT NULL,
  `stockProducto` smallint(6) NOT NULL COMMENT 'Cantidad de articulos que hay en e inventario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `nomProducto`, `idMarca`, `idPresentacion`, `preProducto`, `stockProducto`) VALUES
(1, 'Cerveza', 1, 2, 40000, 21),
(4, 'Aguardiente', 2, 3, 15000, 11),
(5, 'Aguardiente', 2, 1, 22000, 20),
(6, 'NUEVO PRODUCTO', 1, 1, 500000, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idAdmin` bigint(10) NOT NULL,
  `usuaAdmin` varchar(30) NOT NULL,
  `passAdmin` varchar(100) NOT NULL,
  `correoAdmin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idAdmin`, `usuaAdmin`, `passAdmin`, `correoAdmin`) VALUES
(100, 'laura', '123', 'laura@yahoo,com'),
(200, 'carol', '1234', 'carol@gmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`idMovimiento`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idAdmin` (`idAdmin`);

--
-- Indices de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  ADD PRIMARY KEY (`idPresentacion`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idMarca` (`idMarca`),
  ADD KEY `idPresentacion` (`idPresentacion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idAdmin`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `idMovimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `presentacion`
--
ALTER TABLE `presentacion`
  MODIFY `idPresentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `movimientos_ibfk_2` FOREIGN KEY (`idAdmin`) REFERENCES `usuario` (`idAdmin`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`idPresentacion`) REFERENCES `presentacion` (`idPresentacion`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
