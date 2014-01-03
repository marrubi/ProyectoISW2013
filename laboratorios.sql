-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-01-2014 a las 00:52:31
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `laboratorios`
--
CREATE DATABASE IF NOT EXISTS `laboratorios` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `laboratorios`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `ip_address` varchar(45) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `user_agent` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('aadfab4d55f379acfcef84fe3790268e', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36', 1388721052, 'a:1:{s:9:"user_data";s:0:"";}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-administrador`
--

CREATE TABLE IF NOT EXISTS `tb-administrador` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `rut` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `rut` (`rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tb-administrador`
--

INSERT INTO `tb-administrador` (`id_admin`, `rut`, `nombre`, `apellido`, `password`) VALUES
(3, 9874623, 'José', 'Pekerman', 'jose_pek_&18'),
(4, 10856372, 'Gerardo', 'Martino', 'ger_martin19_/(x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-alumno`
--

CREATE TABLE IF NOT EXISTS `tb-alumno` (
  `id_alum` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pase` int(11) DEFAULT NULL COMMENT 'optativo, será útil cuando se use una pistola de códigos de barra',
  `rut` int(11) NOT NULL,
  `carrera_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_alum`),
  UNIQUE KEY `rut` (`rut`),
  KEY `carrera-fk` (`carrera_fk`),
  KEY `carrera_fk` (`carrera_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de alumnos' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tb-alumno`
--

INSERT INTO `tb-alumno` (`id_alum`, `nombre`, `pase`, `rut`, `carrera_fk`) VALUES
(1, 'Airton Senna', NULL, 12384569, 1),
(2, 'Michael Schumacher', 238458, 19345829, 1),
(3, 'Marco Arratia', 123542, 16932631, 2),
(4, 'perico', 334342, 11111111, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-alumno-asignatura`
--

CREATE TABLE IF NOT EXISTS `tb-alumno-asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_fk` int(11) NOT NULL,
  `asignatura_fk` int(11) NOT NULL,
  `semestre` enum('I','II') COLLATE utf8_spanish_ci NOT NULL,
  `anio` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno-fk` (`alumno_fk`),
  KEY `asignatura-fk` (`asignatura_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de alumnos en secciones de asignaturas' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-alumno-asignatura`
--

INSERT INTO `tb-alumno-asignatura` (`id`, `alumno_fk`, `asignatura_fk`, `semestre`, `anio`) VALUES
(1, 1, 2, 'I', 2014),
(2, 2, 2, 'I', 2014);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-alumno-equipo`
--

CREATE TABLE IF NOT EXISTS `tb-alumno-equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno-fk` int(11) NOT NULL,
  `equipo_fk` int(11) NOT NULL,
  `fecha_entrada` datetime NOT NULL,
  `fecha_salida` datetime DEFAULT NULL,
  `rut_responsable_ing` int(11) NOT NULL,
  `rut_responsable_sal` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno-fk` (`alumno-fk`),
  KEY `equipo-fk` (`equipo_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de ingreso/salida de alumnos' AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `tb-alumno-equipo`
--

INSERT INTO `tb-alumno-equipo` (`id`, `alumno-fk`, `equipo_fk`, `fecha_entrada`, `fecha_salida`, `rut_responsable_ing`, `rut_responsable_sal`) VALUES
(3, 3, 20, '2013-12-27 01:21:55', '2013-12-27 12:57:54', 0, 0),
(4, 3, 23, '2013-12-27 12:57:29', '2013-12-27 12:57:59', 0, 0),
(5, 1, 19, '2013-12-27 13:04:53', '2013-12-27 13:05:00', 0, 0),
(6, 1, 24, '2013-12-27 13:10:59', '2013-12-27 13:12:04', 0, 0),
(7, 3, 23, '2013-12-27 13:26:42', '2013-12-27 13:26:49', 0, 0),
(8, 4, 19, '2013-12-27 13:56:33', '2013-12-27 13:56:44', 0, 0),
(9, 3, 17, '2013-12-28 20:43:16', '2013-12-28 20:43:37', 0, 0),
(10, 3, 24, '2013-12-28 22:51:30', '2013-12-28 23:24:17', 0, 0),
(11, 2, 18, '2013-12-28 23:07:17', '2014-01-02 15:41:06', 0, 0),
(12, 3, 19, '2013-12-29 00:21:56', '2013-12-29 00:22:49', 0, 0),
(13, 3, 23, '2014-01-02 15:09:33', '2014-01-02 15:09:39', 0, 0),
(14, 3, 18, '2014-01-02 15:49:46', '2014-01-02 15:51:39', 0, 0),
(15, 1, 18, '2014-01-02 15:50:42', '2014-01-02 16:24:19', 0, 0),
(16, 3, 17, '2014-01-02 15:59:57', '2014-01-02 16:21:26', 0, 0),
(17, 2, 23, '2014-01-02 16:05:22', '2014-01-02 16:24:30', 0, 0),
(18, 4, 19, '2014-01-02 16:10:22', '2014-01-02 16:16:16', 0, 0),
(19, 4, 24, '2014-01-02 16:16:53', '2014-01-02 16:24:37', 0, 0),
(20, 3, 21, '2014-01-02 16:22:12', '2014-01-02 16:23:51', 0, 0),
(21, 3, 18, '2014-01-02 16:33:23', '2014-01-02 16:37:55', 0, 0),
(22, 3, 18, '2014-01-02 16:38:23', '2014-01-02 16:38:29', 0, 0),
(23, 3, 17, '2014-01-02 16:39:55', '2014-01-02 16:40:12', 0, 0),
(24, 3, 18, '2014-01-02 16:40:32', '2014-01-02 16:40:41', 0, 0),
(25, 3, 24, '2014-01-02 16:40:54', '2014-01-02 16:41:07', 0, 0),
(26, 3, 24, '2014-01-02 21:02:17', '2014-01-02 21:02:45', 8975653, 8975653);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-asignatura`
--

CREATE TABLE IF NOT EXISTS `tb-asignatura` (
  `id_asig` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_asignatura` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `seccion` int(11) NOT NULL,
  PRIMARY KEY (`id_asig`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de asignaturas por seccion' AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `tb-asignatura`
--

INSERT INTO `tb-asignatura` (`id_asig`, `nombre_asignatura`, `codigo`, `seccion`) VALUES
(1, 'Análisis de Algoritmos', 'INF-648', 1),
(2, 'Arquitectura de Computadores', 'INF-605', 1),
(3, 'Auditoría de Sistemas', 'INF-658', 1),
(4, 'Bases de Datos', NULL, 1),
(5, 'Ciencias de la Computación', NULL, 1),
(6, 'Computación Paralela', NULL, 1),
(7, 'Desempeño de Sistemas Computacionales', NULL, 1),
(8, 'Estructuras de Datos', NULL, 1),
(9, 'Estructuras Discretas', NULL, 1),
(10, 'Gestión de Personal Informático', NULL, 1),
(11, 'Gestión de Proyectos Informáticos', NULL, 1),
(12, 'Gestión Informática', NULL, 1),
(13, 'Gestión Financiera de TI', NULL, 1),
(14, 'Informática Industrial', NULL, 1),
(15, 'Ingeniería de Software', NULL, 1),
(16, 'Lenguajes de Programación', NULL, 1),
(17, 'Programación', NULL, 1),
(18, 'Optimización de Sistemas', NULL, 1),
(19, 'Organización de Computadores', NULL, 1),
(20, 'Sistemas de Información', NULL, 1),
(21, 'Sistemas Distribuidos', NULL, 1),
(22, 'Sistemas Integrados de Información', NULL, 1),
(23, 'Sistemas Operativos', NULL, 1),
(24, 'Taller de SIA', NULL, 1),
(25, 'Tecnología de Equipos', NULL, 1),
(26, 'Teoría de Autómatas', NULL, 1),
(27, 'Electivo de Formación Especializada', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-carrera`
--

CREATE TABLE IF NOT EXISTS `tb-carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` int(11) NOT NULL COMMENT 'corresponde al codigo de carrera',
  PRIMARY KEY (`id_carrera`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla almacena las carreras que tienen acceso a los labs' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-carrera`
--

INSERT INTO `tb-carrera` (`id_carrera`, `nombre_carrera`, `codigo`) VALUES
(1, 'Ingeniería en Informática', 21030),
(2, 'Ingeniería Civil en Computación Mención Informática', 21041);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-equipo`
--

CREATE TABLE IF NOT EXISTS `tb-equipo` (
  `id_eq` int(11) NOT NULL AUTO_INCREMENT,
  `serie` int(11) NOT NULL,
  `laboratorio_fk` int(11) NOT NULL,
  `estado-fk` int(11) NOT NULL,
  `uso-fk` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  `referencia` int(2) NOT NULL,
  PRIMARY KEY (`id_eq`),
  KEY `estado-fk` (`estado-fk`),
  KEY `laboratorio-fk` (`laboratorio_fk`),
  KEY `uso-fk` (`uso-fk`),
  KEY `laboratorio-fk_2` (`laboratorio_fk`),
  KEY `estado-fk_2` (`estado-fk`),
  KEY `uso-fk_2` (`uso-fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='inventario de equipo con datos de estado y uso actual' AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `tb-equipo`
--

INSERT INTO `tb-equipo` (`id_eq`, `serie`, `laboratorio_fk`, `estado-fk`, `uso-fk`, `descripcion`, `referencia`) VALUES
(1, 495573, 6, 1, 1, 'Pantalla: Samsung\r\nCPU: Intel Core i7\r\nSistema Operativo: Windows 7 Professional Edition', 4),
(2, 543468, 6, 1, 1, 'Pantalla: Samsung\r\nCPU: Intel Core i7\r\nSistema Operativo: Windows 7 Professional', 5),
(3, 467357, 6, 1, 1, 'Pantalla: Samsung\r\nProcesador: Intel Core i7\r\nSistema Operativo: Microsoft Windows 7 Professional Edition\r\nDisco Duro: 500GB\r\nMemoria RAM: 8GB', 1),
(4, 685684, 6, 1, 1, NULL, 2),
(5, 636472, 6, 1, 1, NULL, 3),
(6, 333556, 6, 1, 1, NULL, 6),
(7, 348272, 6, 1, 1, NULL, 7),
(8, 764859, 6, 1, 1, NULL, 8),
(9, 348882, 6, 1, 1, NULL, 9),
(10, 768599, 6, 1, 1, NULL, 10),
(11, 348231, 6, 1, 1, NULL, 11),
(12, 768453, 6, 1, 1, NULL, 12),
(13, 348344, 6, 1, 1, NULL, 13),
(14, 768987, 6, 1, 1, NULL, 14),
(15, 787272, 6, 1, 1, NULL, 15),
(16, 548556, 6, 1, 1, NULL, 16),
(17, 677563, 1, 1, 1, NULL, 1),
(18, 678463, 1, 1, 1, NULL, 2),
(19, 678464, 1, 1, 1, NULL, 3),
(20, 678465, 1, 1, 1, NULL, 4),
(21, 678466, 1, 1, 1, NULL, 5),
(22, 678467, 1, 1, 1, NULL, 6),
(23, 543563, 2, 1, 1, NULL, 1),
(24, 453123, 2, 1, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-estado`
--

CREATE TABLE IF NOT EXISTS `tb-estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='indica estados de los equipos (habilitado, no habilitado, re' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-estado`
--

INSERT INTO `tb-estado` (`id_estado`, `nombre`) VALUES
(1, 'habilitado'),
(2, 'no disponible (en uso)');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-func-obs-equipo`
--

CREATE TABLE IF NOT EXISTS `tb-func-obs-equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `funcionario-fk` int(11) NOT NULL,
  `equipo-fk` int(11) NOT NULL,
  `detalle` text COLLATE utf8_spanish_ci,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-funcionario`
--

CREATE TABLE IF NOT EXISTS `tb-funcionario` (
  `id_funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rut` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE KEY `rut` (`rut`),
  KEY `id_funcionario` (`id_funcionario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tb-funcionario`
--

INSERT INTO `tb-funcionario` (`id_funcionario`, `nombre`, `apellido`, `rut`, `password`, `direccion`) VALUES
(1, 'Juan', 'López', 8975653, 'juanlop12', 'Pasaje Lo Curro #365, La Reina'),
(2, 'Lauraro', 'Rodríguez', 9867531, 'lau_rod75', 'Calle Los Naranjos #5784, Peñalolen'),
(3, 'Cristóbal', 'Martínez', 10643287, 'cris_56_martX', 'Avenida Providencia #1847, Departamento #304, Providencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-hab-inhab-inventario`
--

CREATE TABLE IF NOT EXISTS `tb-hab-inhab-inventario` (
  `id_registro` int(11) NOT NULL AUTO_INCREMENT,
  `herramienta_fk` int(11) NOT NULL,
  `rut_responsable` int(11) NOT NULL,
  `habilitacion` int(11) NOT NULL,
  `fecha_habilitacion` datetime DEFAULT NULL,
  `fecha_inhabilitacion` datetime DEFAULT NULL,
  `motivo_habilitacion` text COLLATE utf8_spanish_ci,
  `motivo_inhabilitacion` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id_registro`),
  KEY `herramienta_fk` (`herramienta_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tb-hab-inhab-inventario`
--

INSERT INTO `tb-hab-inhab-inventario` (`id_registro`, `herramienta_fk`, `rut_responsable`, `habilitacion`, `fecha_habilitacion`, `fecha_inhabilitacion`, `motivo_habilitacion`, `motivo_inhabilitacion`) VALUES
(4, 4, 8975653, 2, NULL, '2014-01-02 20:53:19', NULL, 'Pantalla quebrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-herramienta`
--

CREATE TABLE IF NOT EXISTS `tb-herramienta` (
  `id_herramienta` int(11) NOT NULL AUTO_INCREMENT,
  `n_inventario` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'solo si existe',
  `modelo` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `marca` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `comentario` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_fk` int(11) NOT NULL,
  `uso_fk` int(11) NOT NULL,
  `habilitado` int(11) NOT NULL DEFAULT '1',
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_herramienta`),
  KEY `tipo-fk` (`tipo_fk`),
  KEY `uso-fk` (`uso_fk`),
  KEY `estado-fk` (`habilitado`),
  KEY `tipo_fk` (`tipo_fk`),
  KEY `uso_fk` (`uso_fk`),
  KEY `estado_fk` (`habilitado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='detall de cada herramenta en inventario' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tb-herramienta`
--

INSERT INTO `tb-herramienta` (`id_herramienta`, `n_inventario`, `modelo`, `marca`, `comentario`, `tipo_fk`, `uso_fk`, `habilitado`, `eliminado`) VALUES
(1, '345227', 'th-45', NULL, NULL, 2, 1, 1, 0),
(2, '344728', 'vx-tex4500', 'Sony', NULL, 1, 1, 1, 0),
(3, '543242', 'Pavilion DV6', 'HP', NULL, 3, 1, 1, 0),
(4, '456321', 'NPC20130L', 'Samsung', NULL, 3, 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-impresiones`
--

CREATE TABLE IF NOT EXISTS `tb-impresiones` (
  `id_imp` int(11) NOT NULL AUTO_INCREMENT,
  `alumno_fk` int(11) NOT NULL,
  `n_hojas` int(11) NOT NULL,
  `tipo_fk` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time NOT NULL,
  `rut_responsable_imp` int(11) NOT NULL,
  PRIMARY KEY (`id_imp`),
  KEY `alumno-fk` (`alumno_fk`),
  KEY `tipo-fk` (`tipo_fk`),
  KEY `alumno_fk` (`alumno_fk`),
  KEY `tipo_fk` (`tipo_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de impresiones de los alumnos' AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `tb-impresiones`
--

INSERT INTO `tb-impresiones` (`id_imp`, `alumno_fk`, `n_hojas`, `tipo_fk`, `fecha`, `hora`, `rut_responsable_imp`) VALUES
(1, 1, 25, 2, '2013-11-20', '00:05:18', 0),
(2, 1, 2, 2, '2013-11-22', '12:15:00', 0),
(3, 2, 5, 1, '2013-12-16', '12:30:00', 0),
(4, 2, 10, 1, '2013-12-15', '13:30:00', 0),
(5, 3, 4, 1, '2013-12-13', '12:45:00', 0),
(6, 3, 6, 2, '2013-12-17', '16:28:03', 0),
(7, 3, 10, 1, '2013-12-17', '16:34:52', 0),
(8, 3, 5, 2, '2013-12-17', '23:58:59', 0),
(9, 3, 5, 2, '2013-12-18', '13:27:30', 0),
(10, 3, 5, 1, '2013-12-27', '13:16:13', 0),
(11, 3, 5, 2, '2013-12-27', '13:50:22', 0),
(12, 3, 5, 1, '2013-12-27', '22:43:35', 0),
(13, 3, 10, 2, '2013-12-28', '21:29:38', 0),
(14, 3, 15, 2, '2013-12-28', '22:06:21', 0),
(15, 3, 15, 2, '2013-12-28', '22:08:30', 0),
(16, 3, 25, 2, '2013-12-28', '22:08:53', 0),
(18, 3, 30, 2, '2014-01-01', '14:08:54', 0),
(19, 3, 25, 2, '2014-01-01', '14:42:18', 0),
(20, 3, 30, 2, '2014-01-01', '14:42:56', 0),
(21, 3, 20, 2, '2014-01-01', '14:43:33', 0),
(22, 3, 11, 2, '2014-01-01', '14:45:04', 0),
(23, 3, 15, 1, '2014-01-01', '14:45:25', 0),
(24, 3, 23, 1, '2014-01-01', '15:58:12', 0),
(25, 3, 23, 1, '2014-01-01', '15:58:14', 0),
(26, 3, 23, 1, '2014-01-01', '15:58:32', 0),
(27, 3, 24, 2, '2014-01-01', '16:04:19', 0),
(28, 3, 23, 1, '2014-01-01', '16:09:29', 0),
(29, 3, 23, 1, '2014-01-01', '16:09:43', 0),
(30, 3, 2477, 1, '2014-01-01', '16:10:05', 0),
(31, 3, 2500, 1, '2014-01-01', '16:33:41', 0),
(32, 3, 15, 1, '2014-01-02', '21:05:04', 8975653),
(33, 3, 13, 2, '2014-01-02', '21:05:53', 8975653),
(34, 3, 11, 2, '2014-01-02', '21:06:15', 8975653);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-impresora`
--

CREATE TABLE IF NOT EXISTS `tb-impresora` (
  `id_imp` int(11) NOT NULL AUTO_INCREMENT,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `serie` int(11) NOT NULL,
  `max_hojas` int(11) DEFAULT NULL,
  `caracteristicas` text COLLATE utf8_spanish_ci,
  `fecha_import` datetime NOT NULL,
  `estado_imp` tinyint(4) NOT NULL DEFAULT '0',
  `fecha_baja` datetime DEFAULT NULL,
  PRIMARY KEY (`id_imp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb-impresora`
--

INSERT INTO `tb-impresora` (`id_imp`, `marca`, `modelo`, `serie`, `max_hojas`, `caracteristicas`, `fecha_import`, `estado_imp`, `fecha_baja`) VALUES
(1, 'HP', 'Laserjet P2030', 432542, 2461, 'Imprime hojas tamaño A4, A3, Oficio, Sobre, etc.\r\nContiene 4 tóners, los cuales rinden 2500 impresiones.\r\nAl final de las impresiones, se debe cambiar tóner. ', '2013-12-18 13:30:00', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-laboratorio`
--

CREATE TABLE IF NOT EXISTS `tb-laboratorio` (
  `id_lab` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_lab`),
  KEY `estado` (`estado`),
  KEY `id_lab` (`id_lab`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla indica los laboratorios existentes' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tb-laboratorio`
--

INSERT INTO `tb-laboratorio` (`id_lab`, `nombre`, `estado`) VALUES
(1, 'Laboratorio 1', 1),
(2, 'Laboratorio 2', 1),
(3, 'Laboratorio 3', 0),
(4, 'Laboratorio 4', 0),
(5, 'Laboratorio 5', 0),
(6, 'Laboratorio 6', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-observaciones`
--

CREATE TABLE IF NOT EXISTS `tb-observaciones` (
  `id_ob` int(11) NOT NULL AUTO_INCREMENT,
  `alumno-fk` int(11) NOT NULL,
  `detalle` varchar(1500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_ob`),
  KEY `alumno-fk` (`alumno-fk`),
  KEY `alumno-fk_2` (`alumno-fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registra observaciones de alumnos (ingresadas por administra' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb-observaciones`
--

INSERT INTO `tb-observaciones` (`id_ob`, `alumno-fk`, `detalle`, `fecha`) VALUES
(1, 2, 'segunda oportunidad que se encuentra a alumno comiendo en laboratorio', '2013-12-20 16:04:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-periodo`
--

CREATE TABLE IF NOT EXISTS `tb-periodo` (
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  `inicio` time NOT NULL,
  `fin` time NOT NULL,
  `num-per` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_per`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tb-periodo`
--

INSERT INTO `tb-periodo` (`id_per`, `inicio`, `fin`, `num-per`) VALUES
(1, '08:15:00', '09:35:00', 'I'),
(2, '09:45:00', '11:05:00', 'II'),
(3, '11:15:00', '12:35:00', 'III'),
(4, '12:45:00', '14:05:00', 'IV'),
(5, '14:15:00', '15:35:00', 'V'),
(6, '15:45:00', '17:05:00', 'VI'),
(7, '17:15:00', '18:35:00', 'VII'),
(8, '19:00:00', '20:30:00', 'VIII');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-profesor`
--

CREATE TABLE IF NOT EXISTS `tb-profesor` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rut` int(11) NOT NULL,
  PRIMARY KEY (`id_profesor`),
  UNIQUE KEY `rut` (`rut`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de profesores' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tb-profesor`
--

INSERT INTO `tb-profesor` (`id_profesor`, `nombre`, `rut`) VALUES
(1, 'Benjamin Vicuña Mackenna', 9875632),
(2, 'José Joaquín Prieto', 9826453),
(3, 'Juan Manuel Lira López', 9765471),
(4, 'José Luis Méndez Rodríguez', 9675378),
(5, 'Manuel Marcelo Jaramillo Cox', 9756342),
(6, 'Sebastian Rodríguez Mora', 10758371);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-profesor-asignatura`
--

CREATE TABLE IF NOT EXISTS `tb-profesor-asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profesor_fk` int(11) NOT NULL,
  `asignatura_fk` int(11) NOT NULL,
  `fecha_asignacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `profesor_fk` (`profesor_fk`),
  KEY `asignatura_fk` (`asignatura_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-profesor-asignatura`
--

INSERT INTO `tb-profesor-asignatura` (`id`, `profesor_fk`, `asignatura_fk`, `fecha_asignacion`) VALUES
(1, 3, 13, '2013-12-17 22:30:09'),
(2, 2, 9, '2013-12-17 22:30:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-profesor-herramienta`
--

CREATE TABLE IF NOT EXISTS `tb-profesor-herramienta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academico_fk` int(11) NOT NULL,
  `herramienta_fk` int(11) NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `fecha_devolucion` datetime DEFAULT NULL,
  `estado_solicitud` tinyint(1) NOT NULL DEFAULT '0',
  `rut_responsable_prestamo` int(11) DEFAULT NULL,
  `rut_responsable_devolucion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `academico_fk` (`academico_fk`),
  KEY `herramienta_fk` (`herramienta_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `tb-profesor-herramienta`
--

INSERT INTO `tb-profesor-herramienta` (`id`, `academico_fk`, `herramienta_fk`, `fecha_solicitud`, `fecha_devolucion`, `estado_solicitud`, `rut_responsable_prestamo`, `rut_responsable_devolucion`) VALUES
(1, 1, 1, '2014-01-23 16:58:00', '2014-01-02 17:18:00', 0, NULL, NULL),
(3, 1, 4, '2014-01-02 17:06:13', '2014-01-17 17:44:17', 0, NULL, NULL),
(4, 1, 1, '2014-01-02 17:11:06', '2014-01-22 17:44:22', 0, NULL, NULL),
(5, 1, 3, '2014-01-02 17:31:54', '2014-01-21 17:44:21', 0, NULL, NULL),
(6, 1, 4, '2014-01-02 17:32:50', '2014-01-20 17:44:20', 0, NULL, NULL),
(7, 1, 2, '2014-01-02 17:41:33', '2014-01-20 17:44:20', 0, NULL, NULL),
(8, 1, 4, '2014-01-02 17:49:14', '2014-01-24 17:49:24', 0, NULL, NULL),
(9, 1, 1, '2014-01-02 21:25:24', '2014-01-11 21:31:11', 0, 8975653, 8975653),
(10, 1, 2, '2014-01-02 21:28:56', '0000-00-00 00:00:00', 0, 8975653, 8975653);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-reserva`
--

CREATE TABLE IF NOT EXISTS `tb-reserva` (
  `id_res` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_dest` date NOT NULL,
  `academico_fk` int(11) NOT NULL,
  `periodo_fk` int(11) NOT NULL,
  `fecha_sol` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `asignatura_fk` int(11) NOT NULL,
  `lab_fk` int(10) unsigned NOT NULL,
  `eliminado` tinyint(1) NOT NULL DEFAULT '0',
  `rut_responsable_agr` int(11) DEFAULT NULL,
  `rut_responsable_ed` int(11) DEFAULT NULL,
  `rut_responsable_eli` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_res`),
  KEY `academico-fk` (`academico_fk`,`periodo_fk`),
  KEY `academico-fk_2` (`academico_fk`,`periodo_fk`),
  KEY `periodo-fk` (`periodo_fk`),
  KEY `asignatura-fk` (`asignatura_fk`),
  KEY `laboratorio-fk` (`lab_fk`),
  KEY `laboratorio-fk_2` (`lab_fk`),
  KEY `lab-fk` (`lab_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=47 ;

--
-- Volcado de datos para la tabla `tb-reserva`
--

INSERT INTO `tb-reserva` (`id_res`, `fecha_dest`, `academico_fk`, `periodo_fk`, `fecha_sol`, `asignatura_fk`, `lab_fk`, `eliminado`, `rut_responsable_agr`, `rut_responsable_ed`, `rut_responsable_eli`) VALUES
(22, '2013-12-30', 6, 6, '2013-12-29 01:28:18', 14, 5, 0, NULL, 0, NULL),
(23, '2013-12-31', 2, 5, '2013-12-29 01:42:08', 17, 5, 0, NULL, 0, NULL),
(25, '2014-01-23', 3, 5, '2014-01-02 15:31:00', 5, 5, 1, NULL, 0, NULL),
(26, '2014-01-23', 1, 6, '2014-01-03 00:17:33', 16, 5, 1, NULL, 0, NULL),
(30, '2014-01-23', 1, 5, '2014-01-02 15:38:28', 18, 5, 0, NULL, 0, NULL),
(31, '2014-01-23', 6, 6, '2014-01-03 00:17:01', 1, 4, 1, NULL, 8975653, NULL),
(32, '2014-01-22', 1, 5, '2014-01-03 00:19:32', 15, 4, 1, NULL, 0, 8975653),
(33, '2014-01-22', 1, 6, '2014-01-02 16:12:09', 1, 5, 1, NULL, 0, NULL),
(34, '2014-01-22', 1, 6, '2014-01-02 16:12:08', 18, 5, 1, NULL, 0, NULL),
(46, '2014-01-24', 1, 3, '2014-01-03 00:17:50', 6, 3, 1, 8975653, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-software`
--

CREATE TABLE IF NOT EXISTS `tb-software` (
  `id_soft` int(11) NOT NULL AUTO_INCREMENT,
  `equipo-fk` int(11) NOT NULL,
  `detalle` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `licencia` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_soft`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='software instalado en equipos' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb-software`
--

INSERT INTO `tb-software` (`id_soft`, `equipo-fk`, `detalle`, `licencia`) VALUES
(1, 1, 'windows 7 x64, ubuntu 12.04', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-tipoherramienta`
--

CREATE TABLE IF NOT EXISTS `tb-tipoherramienta` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='indica categorias de herramientas' AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tb-tipoherramienta`
--

INSERT INTO `tb-tipoherramienta` (`id_tipo`, `nombre`) VALUES
(1, 'Proyector'),
(2, 'Pinza'),
(3, 'Notebook'),
(4, 'Atornillador'),
(5, 'Martillo'),
(6, 'Alicate');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-tipohoja`
--

CREATE TABLE IF NOT EXISTS `tb-tipohoja` (
  `id_tipohoja` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ancho` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'indicar tipo de medida',
  `alto` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'indicar tipo de medida',
  PRIMARY KEY (`id_tipohoja`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='almacena datos de hojas que se usan en lab' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tb-tipohoja`
--

INSERT INTO `tb-tipohoja` (`id_tipohoja`, `nombre_tipo`, `ancho`, `alto`) VALUES
(1, 'Oficio', '21.59', '34'),
(2, 'Carta', '21.59', '27.94'),
(3, 'Otro tipo', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-uso`
--

CREATE TABLE IF NOT EXISTS `tb-uso` (
  `id_uso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_uso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='indica uso (disponible, no disponible (en uso))' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-uso`
--

INSERT INTO `tb-uso` (`id_uso`, `nombre`) VALUES
(1, 'disponible'),
(2, 'no disponible');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb-alumno`
--
ALTER TABLE `tb-alumno`
  ADD CONSTRAINT `fk_carr_alum` FOREIGN KEY (`carrera_fk`) REFERENCES `tb-carrera` (`id_carrera`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-alumno-asignatura`
--
ALTER TABLE `tb-alumno-asignatura`
  ADD CONSTRAINT `fk_al_asig-al` FOREIGN KEY (`alumno_fk`) REFERENCES `tb-alumno` (`id_alum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asig_al-asig` FOREIGN KEY (`asignatura_fk`) REFERENCES `tb-asignatura` (`id_asig`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-alumno-equipo`
--
ALTER TABLE `tb-alumno-equipo`
  ADD CONSTRAINT `fk_al_al-eq` FOREIGN KEY (`alumno-fk`) REFERENCES `tb-alumno` (`id_alum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_eq_al-eq` FOREIGN KEY (`equipo_fk`) REFERENCES `tb-equipo` (`id_eq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-equipo`
--
ALTER TABLE `tb-equipo`
  ADD CONSTRAINT `fk_est_eq` FOREIGN KEY (`estado-fk`) REFERENCES `tb-estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_uso_eq` FOREIGN KEY (`uso-fk`) REFERENCES `tb-uso` (`id_uso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-hab-inhab-inventario`
--
ALTER TABLE `tb-hab-inhab-inventario`
  ADD CONSTRAINT `fk_herr_habinhab` FOREIGN KEY (`herramienta_fk`) REFERENCES `tb-herramienta` (`id_herramienta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-herramienta`
--
ALTER TABLE `tb-herramienta`
  ADD CONSTRAINT `fk_tipoherr_herr` FOREIGN KEY (`tipo_fk`) REFERENCES `tb-tipoherramienta` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-impresiones`
--
ALTER TABLE `tb-impresiones`
  ADD CONSTRAINT `fk-id-alum-imp` FOREIGN KEY (`alumno_fk`) REFERENCES `tb-alumno` (`id_alum`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-tipohoja-imp` FOREIGN KEY (`tipo_fk`) REFERENCES `tb-tipohoja` (`id_tipohoja`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-observaciones`
--
ALTER TABLE `tb-observaciones`
  ADD CONSTRAINT `fk-alum-lab` FOREIGN KEY (`alumno-fk`) REFERENCES `tb-alumno` (`id_alum`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-profesor-asignatura`
--
ALTER TABLE `tb-profesor-asignatura`
  ADD CONSTRAINT `fk_asig_prof-asig` FOREIGN KEY (`asignatura_fk`) REFERENCES `tb-asignatura` (`id_asig`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prof_prof-asig` FOREIGN KEY (`profesor_fk`) REFERENCES `tb-profesor` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-profesor-herramienta`
--
ALTER TABLE `tb-profesor-herramienta`
  ADD CONSTRAINT `fk_herr_herr_prof` FOREIGN KEY (`herramienta_fk`) REFERENCES `tb-herramienta` (`id_herramienta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prof_herr_prof` FOREIGN KEY (`academico_fk`) REFERENCES `tb-profesor` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tb-reserva`
--
ALTER TABLE `tb-reserva`
  ADD CONSTRAINT `fk_acad_res` FOREIGN KEY (`academico_fk`) REFERENCES `tb-profesor` (`id_profesor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asig_res` FOREIGN KEY (`asignatura_fk`) REFERENCES `tb-asignatura` (`id_asig`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_lab_res` FOREIGN KEY (`lab_fk`) REFERENCES `tb-laboratorio` (`id_lab`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_per_res` FOREIGN KEY (`periodo_fk`) REFERENCES `tb-periodo` (`id_per`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
