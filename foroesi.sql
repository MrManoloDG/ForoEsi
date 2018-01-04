-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-01-2018 a las 23:39:51
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `foroesi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'General'),
(2, 'Grados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hilo`
--

CREATE TABLE IF NOT EXISTS `hilo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creador` int(11) NOT NULL,
  `titulo` varchar(300) COLLATE latin1_spanish_ci NOT NULL,
  `texto` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoria` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `creador` (`creador`),
  KEY `categoria` (`categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `hilo`
--

INSERT INTO `hilo` (`id`, `creador`, `titulo`, `texto`, `fecha`, `categoria`) VALUES
(1, 1, 'Dani es marica y me tira ficha +TemaSerio', 'sadkaflsdnawiasjjasjcas', '2017-12-19 11:27:53', 1),
(4, 3, 'Titulo', 'asdada', '2018-01-04 23:35:25', 1),
(5, 3, 'Hola', 'Hola', '2018-01-04 23:36:59', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE IF NOT EXISTS `respuesta` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `hilo` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  `texto` text COLLATE latin1_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `hilo` (`hilo`,`usuario`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `hilo`, `usuario`, `texto`, `fecha`) VALUES
(1, 1, 2, 'ESO es mentira so marrana', '2018-01-04 21:56:47'),
(2, 1, 3, 'REPORT', '2018-01-04 21:56:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `avatar` text COLLATE latin1_spanish_ci,
  `correo` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `estado` text COLLATE latin1_spanish_ci,
  `nreportes` int(11) NOT NULL DEFAULT '0',
  `reportado` tinyint(1) NOT NULL DEFAULT '0',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`,`correo`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario_2` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `avatar`, `correo`, `estado`, `nreportes`, `reportado`, `fechaCreacion`) VALUES
(1, 'pericoeldeprueba', '12345678', 'descarga.png', 'gfd', 'Soy el administrador todopoderoso de esta web', 0, 0, '2017-12-19 11:26:56'),
(2, 'PEPE', 'pepe19', NULL, 'pep@gmail.com', NULL, 0, 0, '2018-01-02 18:30:02'),
(3, 'admin', '12345678', 'descarga5.png', 'ForoESI@gmail.com', 'Admin normalito', 0, 0, '2018-01-04 16:13:48');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hilo`
--
ALTER TABLE `hilo`
  ADD CONSTRAINT `hilo_ibfk_1` FOREIGN KEY (`creador`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hilo_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`hilo`) REFERENCES `hilo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
