-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-12-2013 a las 01:21:55
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tb-administrador`
--

INSERT INTO `tb-administrador` (`id_admin`, `rut`, `nombre`, `apellido`, `password`) VALUES
(4, 10856372, 'Gerardo', 'Martino', 'ger_martin19_/(x'),
(3, 9874623, 'José', 'Pekerman', 'jose_pek_&18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-alumno`
--

CREATE TABLE IF NOT EXISTS `tb-alumno` (
  `id_alum` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `pase` int(11) DEFAULT NULL COMMENT 'optativo, será útil cuando se use una pistola de códigos de barra',
  `rut` int(11) NOT NULL,
  `carrera-fk` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_alum`),
  KEY `carrera-fk` (`carrera-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de alumnos' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-alumno`
--

INSERT INTO `tb-alumno` (`id_alum`, `nombre`, `apellido`, `pase`, `rut`, `carrera-fk`, `password`) VALUES
(1, 'Airton', 'Senna', NULL, 12384569, 1, 'airton65'),
(2, 'Michael ', 'Schumacher', 238458, 19345829, 1, 'schumacher73_x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-alumno-asignatura`
--

CREATE TABLE IF NOT EXISTS `tb-alumno-asignatura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno-fk` int(11) NOT NULL,
  `asignatura-fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno-fk` (`alumno-fk`),
  KEY `asignatura-fk` (`asignatura-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de alumnos en secciones de asignaturas' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-alumno-asignatura`
--

INSERT INTO `tb-alumno-asignatura` (`id`, `alumno-fk`, `asignatura-fk`) VALUES
(1, 1, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-alumno-equipo`
--

CREATE TABLE IF NOT EXISTS `tb-alumno-equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno-fk` int(11) NOT NULL,
  `equipo-fk` int(11) NOT NULL,
  `dia_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `dia_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno-fk` (`alumno-fk`),
  KEY `equipo-fk` (`equipo-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de ingreso/salida de alumnos' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-alumno-equipo`
--

INSERT INTO `tb-alumno-equipo` (`id`, `alumno-fk`, `equipo-fk`, `dia_entrada`, `hora_entrada`, `dia_salida`, `hora_salida`) VALUES
(1, 1, 1, '2013-11-19', '12:15:00', '2013-11-19', '12:30:00'),
(2, 1, 1, '2013-11-20', '10:00:00', '2013-11-20', '14:12:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-asignatura`
--

CREATE TABLE IF NOT EXISTS `tb-asignatura` (
  `id_asig` int(11) NOT NULL AUTO_INCREMENT,
  `profesor` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `seccion` int(11) NOT NULL,
  PRIMARY KEY (`id_asig`),
  KEY `profesor` (`profesor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de asignaturas por seccion' AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tb-asignatura`
--

INSERT INTO `tb-asignatura` (`id_asig`, `profesor`, `nombre`, `codigo`, `seccion`) VALUES
(1, 1, 'Estructura de Datos', 'INF-230', 2),
(2, 2, 'Estructura de Datos', 'INF-230', 1),
(3, 1, 'Tecnología de Equipos', 'INF-312', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-carrera`
--

CREATE TABLE IF NOT EXISTS `tb-carrera` (
  `id_carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` int(11) NOT NULL COMMENT 'corresponde al codigo de carrera',
  PRIMARY KEY (`id_carrera`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla almacena las carreras que tienen acceso a los labs' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-carrera`
--

INSERT INTO `tb-carrera` (`id_carrera`, `nombre`, `codigo`) VALUES
(1, 'Ingeniería en Informática', 21030),
(2, 'Ingeniería Civil en Computación Mención Informática', 21041);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-equipo`
--

CREATE TABLE IF NOT EXISTS `tb-equipo` (
  `id_eq` int(11) NOT NULL AUTO_INCREMENT,
  `serie` int(11) NOT NULL,
  `laboratorio-fk` int(11) NOT NULL,
  `estado-fk` int(11) NOT NULL,
  `uso-fk` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id_eq`),
  KEY `estado-fk` (`estado-fk`),
  KEY `laboratorio-fk` (`laboratorio-fk`),
  KEY `uso-fk` (`uso-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='inventario de equipo con datos de estado y uso actual' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-equipo`
--

INSERT INTO `tb-equipo` (`id_eq`, `serie`, `laboratorio-fk`, `estado-fk`, `uso-fk`, `descripcion`) VALUES
(1, 495573, 6, 1, 1, 'Pantalla: Samsung\r\nCPU: Intel Core i7\r\nSistema Operativo: Windows 7 Professional Edition'),
(2, 543468, 6, 2, 1, 'Pantalla: Samsung\r\nCPU: Intel Core i7\r\nSistema Operativo: Windows 7 Professional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-estado`
--

CREATE TABLE IF NOT EXISTS `tb-estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='indica estados de los equipos (habilitado, no habilitado, re' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-estado`
--

INSERT INTO `tb-estado` (`id_estado`, `nombre`) VALUES
(1, 'habilitado'),
(2, 'no disponible (en uso)');

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
  PRIMARY KEY (`id_funcionario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tb-funcionario`
--

INSERT INTO `tb-funcionario` (`id_funcionario`, `nombre`, `apellido`, `rut`, `password`) VALUES
(1, 'Juan', 'López', 8975653, 'juanlop12'),
(2, 'Lauraro', 'Rodríguez', 9867531, 'lau_rod75'),
(3, 'Cristóbal', 'Martínez', 10643287, 'cris_56_martX');

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
  `tipo-fk` int(11) NOT NULL,
  `laboratorio-fk` int(11) NOT NULL,
  `uso-fk` int(11) NOT NULL,
  `estado-fk` int(11) NOT NULL,
  PRIMARY KEY (`id_herramienta`),
  KEY `tipo-fk` (`tipo-fk`),
  KEY `laboratorio-fk` (`laboratorio-fk`),
  KEY `uso-fk` (`uso-fk`),
  KEY `estado-fk` (`estado-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='detall de cada herramenta en inventario' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-herramienta`
--

INSERT INTO `tb-herramienta` (`id_herramienta`, `n_inventario`, `modelo`, `marca`, `comentario`, `tipo-fk`, `laboratorio-fk`, `uso-fk`, `estado-fk`) VALUES
(1, '345227', 'th-45', NULL, NULL, 2, 8, 1, 1),
(2, '344728', 'vx-tex4500', 'sony', NULL, 1, 6, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-impresiones`
--

CREATE TABLE IF NOT EXISTS `tb-impresiones` (
  `id_imp` int(11) NOT NULL AUTO_INCREMENT,
  `alumno-fk` int(11) NOT NULL,
  `n_hojas` int(11) NOT NULL,
  `tipo-fk` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`id_imp`),
  KEY `alumno-fk` (`alumno-fk`),
  KEY `tipo-fk` (`tipo-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de impresiones de los alumnos' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-impresiones`
--

INSERT INTO `tb-impresiones` (`id_imp`, `alumno-fk`, `n_hojas`, `tipo-fk`, `fecha`, `hora`) VALUES
(1, 1, 25, 2, '2013-11-20', '00:05:18'),
(2, 1, 2, 2, '2013-11-22', '12:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-laboratorio`
--

CREATE TABLE IF NOT EXISTS `tb-laboratorio` (
  `id_lab` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_lab`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla indica los laboratorios existentes' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tb-laboratorio`
--

INSERT INTO `tb-laboratorio` (`id_lab`, `nombre`, `estado`) VALUES
(1, 'Laboratorio 1', 1),
(2, 'Laboratorio 2', 0),
(3, 'Laboratorio 3', 0),
(4, 'Laboratorio 4', 0),
(5, 'Laboratorio 5', 0),
(6, 'Laboratorio 6', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-observacion-equipo`
--

CREATE TABLE IF NOT EXISTS `tb-observacion-equipo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alumno-fk` int(11) NOT NULL,
  `equipo-fk` int(11) NOT NULL,
  `detalle` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno-fk` (`alumno-fk`),
  KEY `equipo-fk` (`equipo-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registra observaciones de equipos (ingresadas por alumnos)' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-observacion-equipo`
--

INSERT INTO `tb-observacion-equipo` (`id`, `alumno-fk`, `equipo-fk`, `detalle`) VALUES
(1, 1, 1, 'tecla alt-gr suelta'),
(2, 2, 1, 'tapa de puertos usb suelta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-observaciones`
--

CREATE TABLE IF NOT EXISTS `tb-observaciones` (
  `id_ob` int(11) NOT NULL AUTO_INCREMENT,
  `alumno-fk` int(11) NOT NULL,
  `detalle` varchar(1500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_ob`),
  KEY `alumno-fk` (`alumno-fk`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registra observaciones de alumnos (ingresadas por administra' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tb-observaciones`
--

INSERT INTO `tb-observaciones` (`id_ob`, `alumno-fk`, `detalle`) VALUES
(1, 2, 'segunda oportunidad que se encuentra a alumno comiendo en laboratorio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-profesor`
--

CREATE TABLE IF NOT EXISTS `tb-profesor` (
  `id_profesor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rut` int(11) NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='registro de profesores' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-profesor`
--

INSERT INTO `tb-profesor` (`id_profesor`, `nombre`, `rut`, `password`) VALUES
(1, 'Benjamin Vicuña Mackenna', 9875632, 'benja_987'),
(2, 'José Joaquín Prieto', 9826453, 'jose_982');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='software instalado en equipos' AUTO_INCREMENT=2 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='indica categorias de herramientas' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-tipoherramienta`
--

INSERT INTO `tb-tipoherramienta` (`id_tipo`, `nombre`) VALUES
(1, 'datashow'),
(2, 'pinza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-tipohoja`
--

CREATE TABLE IF NOT EXISTS `tb-tipohoja` (
  `id_tipohoja` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ancho` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'indicar tipo de medida',
  `alto` varchar(10) COLLATE utf8_spanish_ci NOT NULL COMMENT 'indicar tipo de medida',
  PRIMARY KEY (`id_tipohoja`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='almacena datos de hojas que se usan en lab' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-tipohoja`
--

INSERT INTO `tb-tipohoja` (`id_tipohoja`, `nombre`, `ancho`, `alto`) VALUES
(1, 'oficio', '21.59', '34'),
(2, 'carta', '21.59', '27.94');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb-uso`
--

CREATE TABLE IF NOT EXISTS `tb-uso` (
  `id_uso` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_uso`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='indica uso (disponible, no disponible (en uso))' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tb-uso`
--

INSERT INTO `tb-uso` (`id_uso`, `nombre`) VALUES
(1, 'disponible'),
(2, 'no disponible');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
