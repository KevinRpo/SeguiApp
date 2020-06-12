-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 05-04-2020 a las 17:02:50
-- Versión del servidor: 8.0.18
-- Versión de PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguiapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_administrador`
--

DROP TABLE IF EXISTS `tbl_administrador`;
CREATE TABLE IF NOT EXISTS `tbl_administrador` (
  `identificacion` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombres_admin` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`identificacion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_administrador`
--

INSERT INTO `tbl_administrador` (`identificacion`, `nombres_admin`, `apellidos`, `email`, `telefono`, `rol`) VALUES
('1152227037', 'kevin', 'restrepo martinez', 'kevinrestrepo18@gmial.com', '123', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_aprendiz`
--

DROP TABLE IF EXISTS `tbl_aprendiz`;
CREATE TABLE IF NOT EXISTS `tbl_aprendiz` (
  `id_a` varchar(10) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `numero_ficha` varchar(10) DEFAULT NULL,
  `NIT` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`id_a`),
  KEY `NIT` (`NIT`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_aprendiz`
--

INSERT INTO `tbl_aprendiz` (`id_a`, `nombres`, `apellidos`, `email`, `telefono`, `rol`, `numero_ficha`, `NIT`, `estatus`) VALUES
('123456', 'jorman', 'valencia ortiz', 'jorman@jorman.com', '123', 'aprendiz', '123456', '1234', 1),
('12345', 'pablo', 'perez londoño', 'pablo@pablo.com', '123456', 'aprendiz', '123456', '123456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_asignar_aprendiz`
--

DROP TABLE IF EXISTS `tbl_asignar_aprendiz`;
CREATE TABLE IF NOT EXISTS `tbl_asignar_aprendiz` (
  `id_asignar` int(11) NOT NULL AUTO_INCREMENT,
  `id_aprendiz` varchar(10) NOT NULL,
  `nombre_aprendiz` varchar(50) NOT NULL,
  `apellidos_aprendiz` varchar(40) NOT NULL,
  `ficha_aprendiz` int(10) NOT NULL,
  `direccion_empresa_aprendiz` varchar(50) NOT NULL,
  `id_instructor` varchar(10) NOT NULL,
  `nombre_instructor` varchar(20) NOT NULL,
  `apellidos_instructor` varchar(40) NOT NULL,
  `telefono_instructor` varchar(15) NOT NULL,
  `correo_instructor` varchar(70) NOT NULL,
  `identificacion` varchar(10) NOT NULL,
  PRIMARY KEY (`id_asignar`),
  UNIQUE KEY `correo_instructor` (`correo_instructor`),
  UNIQUE KEY `id_instructor_2` (`correo_instructor`),
  KEY `identificacion` (`identificacion`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_asignar_aprendiz`
--

INSERT INTO `tbl_asignar_aprendiz` (`id_asignar`, `id_aprendiz`, `nombre_aprendiz`, `apellidos_aprendiz`, `ficha_aprendiz`, `direccion_empresa_aprendiz`, `id_instructor`, `nombre_instructor`, `apellidos_instructor`, `telefono_instructor`, `correo_instructor`, `identificacion`) VALUES
(1, '123456', 'Jorman', 'Valencia Ortiz', 1830104, 'Carrera 67 1sur 92, Mallorca, Medellín, Antioquia', '123456789', 'Edwin', 'Patiño', '3005677448', 'edwin@edwin.com', '1152227037'),
(2, '12345', 'Alejandro', 'Ospina Quintero', 12345, 'Calle 100 9a-45, Bogotá', '123456789', 'Edilfredo', 'Pineda Florez', '3105433850', 'edilfredo9@gmail.com', '1152227037');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bitacora`
--

DROP TABLE IF EXISTS `tbl_bitacora`;
CREATE TABLE IF NOT EXISTS `tbl_bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_a` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_a` (`id_a`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_bitacora`
--

INSERT INTO `tbl_bitacora` (`id`, `nombre`, `tipo`, `fecha`, `id_a`) VALUES
(39, 'for_software1.pdf', 'application/pdf', '2020-03-23', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_citacion`
--

DROP TABLE IF EXISTS `tbl_citacion`;
CREATE TABLE IF NOT EXISTS `tbl_citacion` (
  `id_citacion` int(10) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `id_a` varchar(10) DEFAULT NULL,
  `mensaje` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `correo_jefe` varchar(50) NOT NULL,
  `id_instructor` varchar(10) DEFAULT NULL,
  `leido` int(1) NOT NULL,
  PRIMARY KEY (`id_citacion`),
  KEY `id_instructor` (`id_instructor`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_citacion`
--

INSERT INTO `tbl_citacion` (`id_citacion`, `fecha`, `hora`, `id_a`, `mensaje`, `correo_jefe`, `id_instructor`, `leido`) VALUES
(33, '2020-03-16', '02:00:00', '123456', 'Mensaje de prueba de Edilfredo', '', '1234560', 0),
(57, '2020-05-14', '10:30:00', '123456', 'Mensaje de prueba', 'kevinrestrepo18@gmail.com', '123456789', 0),
(58, '2020-02-12', '10:30:00', '123456', 'Estar al pendiente.', 'kevinrestrepo18@gmail.com', '123456789', 0),
(56, '2020-04-15', '10:30:00', '12345', 'Mensaje', 'kevinrestrepo18@gmail.com', '123456789', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

DROP TABLE IF EXISTS `tbl_empresa`;
CREATE TABLE IF NOT EXISTS `tbl_empresa` (
  `NIT` varchar(15) NOT NULL,
  `nombre` varchar(25) DEFAULT NULL,
  `direccion` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo_jefe` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre_jefe` varchar(75) DEFAULT NULL,
  `id_a` varchar(10) NOT NULL,
  PRIMARY KEY (`NIT`),
  KEY `id_a` (`id_a`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`NIT`, `nombre`, `direccion`, `telefono`, `correo_jefe`, `nombre_jefe`, `id_a`) VALUES
('1234', 'Codiscos', 'Carrera 67 1sur 92, Mallorca, Medellín, Antioquia', '1234567890', 'codiscos@codiscos.com', 'Jorge Lezcano', '123456'),
('123456', 'TATA', 'Calle 100 9a-45, Bogotá', '621 2432', 'tata@tata.com', 'Daniel Atehortua', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_informe`
--

DROP TABLE IF EXISTS `tbl_informe`;
CREATE TABLE IF NOT EXISTS `tbl_informe` (
  `id_informe` int(11) NOT NULL AUTO_INCREMENT,
  `id_instructor` varchar(10) DEFAULT NULL,
  `id_a` int(10) NOT NULL,
  `archivo` varchar(255) DEFAULT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_informe`),
  KEY `id_instructor` (`id_instructor`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_informe`
--

INSERT INTO `tbl_informe` (`id_informe`, `id_instructor`, `id_a`, `archivo`, `fecha`, `tipo`) VALUES
(3, '123456789', 123456, 'for_software1.pdf', '2020-03-23', 'application/pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_instructor`
--

DROP TABLE IF EXISTS `tbl_instructor`;
CREATE TABLE IF NOT EXISTS `tbl_instructor` (
  `id_instructor` varchar(10) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `programa` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `Identificacion` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_instructor`),
  KEY `Identificacion` (`Identificacion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_instructor`
--

INSERT INTO `tbl_instructor` (`id_instructor`, `nombres`, `apellidos`, `email`, `telefono`, `programa`, `rol`, `Identificacion`) VALUES
('123456789', 'Edwin', 'Patiño', 'edwin123@gmail.com', '1234567', 'ADSI', 'instructor', NULL),
('1234560', 'Edilfredo', 'Pineda Florez', 'edilfredo9@gmail.com', '12345678', 'ADSI', 'instructor', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mensaje`
--

DROP TABLE IF EXISTS `tbl_mensaje`;
CREATE TABLE IF NOT EXISTS `tbl_mensaje` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `id_instructor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `leido` int(1) NOT NULL,
  `id_aprendiz` int(11) NOT NULL,
  PRIMARY KEY (`id_mensaje`),
  KEY `id_aprendiz` (`id_aprendiz`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_mensaje`
--

INSERT INTO `tbl_mensaje` (`id_mensaje`, `id_instructor`, `fecha`, `mensaje`, `leido`, `id_aprendiz`) VALUES
(1, 123456789, '2020-03-27', 'Mensaje de prueba Nº2', 0, 123456);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_registros`
--

DROP TABLE IF EXISTS `tbl_registros`;
CREATE TABLE IF NOT EXISTS `tbl_registros` (
  `id` varchar(10) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `clave` varchar(255) DEFAULT NULL,
  `confirmarClave` varchar(235) DEFAULT NULL,
  `estatus` int(1) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=123457 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tbl_registros`
--

INSERT INTO `tbl_registros` (`id`, `nombre`, `apellidos`, `email`, `telefono`, `rol`, `token`, `clave`, `confirmarClave`, `estatus`, `fecha`) VALUES
('1152227037', 'Kevin', 'Restrepo Martinez', 'kevinrestrepo18@gmail.com', '3003548770', 'administrador', '', '$2y$04$6JKYafkIF1Hoikpfy5PD/OTgSRHEvddqGy3nFYxyhYkuHIDSeBs26', '$2y$04$AYluKDxawgNnnzX.puxklu2Znx4r51uTETyUjwvD.aPxGDiRIW0yC', 1, '2020-04-04'),
('123456', 'Jorman', 'Valencia Ortiz', 'jorman@jorman.com', '12345678', 'aprendiz', '', '$2y$04$FriT7hISOnqlkx3D1mN31.MgFN9P.eCoSKnsYpgOgHZsJY37loHvu', '$2y$04$l/aOkf9kVhhYhLwDcdwMBu69CIEpQu0CjpYEXGd1D8efF8J7qMvXW', 1, '2020-04-04'),
('123456789', 'Edwin', 'Patiño Gomez', 'edwin@edwin.com', '987654321', 'instructor', '', '$2y$04$C.tzWeq1XzTIoOojOevG0.SOZ6l1OaUtKrzu3C4rgaYNEDtGUzorC', '$2y$04$rPaahCP0pHHKuKmWtnRnb.lUrsNPqYDqESKTxW26tNB4x1WRYSC9q', 1, '2020-04-04');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
