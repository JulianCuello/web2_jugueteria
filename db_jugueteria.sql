-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2024 a las 15:43:53
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_jugueteria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juguete`
--

CREATE TABLE `juguete` (
  `id_juguete` int(45) NOT NULL,
  `nombreProducto` varchar(45) NOT NULL,
  `precio` int(45) NOT NULL,
  `material` varchar(45) NOT NULL,
  `id_marca` int(45) NOT NULL,
  `codigo` int(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `juguete`
--

INSERT INTO `juguete` (`id_juguete`, `nombreProducto`, `precio`, `material`, `id_marca`, `codigo`) VALUES
(1, 'autos chiquitos', 4500, 'plastico', 1, 24141),
(2, 'cocina', 10500, 'acero', 2, 95124),
(3, 'dinosaurios', 7100, 'goma', 3, 451275),
(4, 'mario', 6000, 'plastico', 4, 68541);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `id_marca` int(45) NOT NULL,
  `origen` varchar(45) NOT NULL,
  `img` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`id_marca`, `origen`, `img`) VALUES
(1, 'china', 'img/autos'),
(2, 'argentina', 'img/cocina'),
(3, 'francia', 'img/dinosaurios'),
(4, 'brasil', 'img/mario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `juguete`
--
ALTER TABLE `juguete`
  ADD PRIMARY KEY (`id_juguete`),
  ADD KEY `fk_marca` (`id_marca`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `juguete`
--
ALTER TABLE `juguete`
  MODIFY `id_juguete` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `id_marca` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `juguete`
--
ALTER TABLE `juguete`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
