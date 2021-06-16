-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2020 a las 00:55:21
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `did`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(14) DEFAULT NULL,
  `distribuidor` enum('fcomunicaciones','comuniquemonos','otro') NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `estado` enum('activo','suspendido','inactivo') NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nombre`, `telefono`, `distribuidor`, `email`, `estado`, `fecha_creacion`, `fecha_modificacion`) VALUES
(14, 'jessica leonel', '3213399290', 'comuniquemonos', 'jeyaleonel@gmail.com', 'inactivo', '2019-11-22 22:29:07', '2020-10-10 16:12:46'),
(15, 'danelly diaz', '3156193745', 'fcomunicaciones', 'julian@datacobro.com', 'activo', '2019-11-22 22:29:33', '2020-10-04 00:53:04'),
(17, 'Natalia Rozo', '3202666155', 'comuniquemonos', 'natalia12@gmail.com', 'inactivo', '2019-12-02 15:49:05', '2020-10-10 15:51:48'),
(18, 'Caterine', '3163694465', 'comuniquemonos', 'caterine22@gmail.com', 'inactivo', '2019-12-03 14:22:19', '2019-12-26 23:06:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `did_cliente`
--

CREATE TABLE `did_cliente` (
  `id_did_cliente` int(10) UNSIGNED NOT NULL,
  `id_cliente` int(10) UNSIGNED NOT NULL,
  `id_did` int(10) UNSIGNED NOT NULL,
  `maxcall` int(11) NOT NULL,
  `ip_conexion_cliente` varchar(80) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `did_cliente`
--

INSERT INTO `did_cliente` (`id_did_cliente`, `id_cliente`, `id_did`, `maxcall`, `ip_conexion_cliente`, `fecha_creacion`, `fecha_modificacion`) VALUES
(40, 15, 23, 3, NULL, '2020-10-10 20:06:08', '0000-00-00 00:00:00'),
(41, 15, 32, 5, NULL, '2020-10-10 20:06:44', '0000-00-00 00:00:00'),
(42, 15, 30, 5, NULL, '2020-10-10 20:07:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `no_did`
--

CREATE TABLE `no_did` (
  `id_did` int(10) UNSIGNED NOT NULL,
  `numero` varchar(14) NOT NULL,
  `estado` enum('activo','libre','suspendido') NOT NULL,
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `no_did`
--

INSERT INTO `no_did` (`id_did`, `numero`, `estado`, `id_proveedor`, `fecha_creacion`, `fecha_modificacion`) VALUES
(23, '2771207', 'activo', 19, '2019-11-22 22:23:09', '2020-10-10 20:06:08'),
(26, '7945555', 'libre', 18, '2019-11-22 22:27:16', '2020-10-10 15:51:48'),
(27, '7941222', 'libre', 18, '2019-11-22 22:27:31', '2020-10-13 18:49:06'),
(30, '2771215', 'activo', 18, '2019-11-25 16:54:34', '2020-10-10 20:07:10'),
(32, '3013938760', 'activo', 20, '2019-12-02 22:49:38', '2020-10-10 20:06:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `canales` int(11) NOT NULL,
  `ubicacion` varchar(80) NOT NULL,
  `datos_configuracion` text NOT NULL,
  `estado` enum('activo','inactivo') DEFAULT 'activo',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_modificacion` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `canales`, `ubicacion`, `datos_configuracion`, `estado`, `fecha_creacion`, `fecha_modificacion`) VALUES
(18, 'ssc', 45, 'sip.icomunicate.com', 'proveedor de prueba para did', 'activo', '2019-11-22 22:22:09', '0000-00-00 00:00:00'),
(19, 'claro', 30, '192.168.28.145', 'proveedor de prueba para plataforma did', 'activo', '2019-11-22 22:22:41', '0000-00-00 00:00:00'),
(20, 'net2phone', 34, 'xxx.xxx.xxx.xx2', '32424242424', 'activo', '2019-12-02 22:48:26', '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Indices de la tabla `did_cliente`
--
ALTER TABLE `did_cliente`
  ADD PRIMARY KEY (`id_did_cliente`),
  ADD KEY `id_did_cliente` (`id_did_cliente`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_did` (`id_did`);

--
-- Indices de la tabla `no_did`
--
ALTER TABLE `no_did`
  ADD PRIMARY KEY (`id_did`),
  ADD KEY `id_did` (`id_did`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `did_cliente`
--
ALTER TABLE `did_cliente`
  MODIFY `id_did_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `no_did`
--
ALTER TABLE `no_did`
  MODIFY `id_did` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `did_cliente`
--
ALTER TABLE `did_cliente`
  ADD CONSTRAINT `did_cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `did_cliente_ibfk_2` FOREIGN KEY (`id_did`) REFERENCES `no_did` (`id_did`) ON UPDATE NO ACTION;

--
-- Filtros para la tabla `no_did`
--
ALTER TABLE `no_did`
  ADD CONSTRAINT `no_did_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
