-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-01-2018 a las 10:45:24
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.6.32

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'General'),
(2, 'Grados'),
(3, 'Laboral '),
(4, 'Otros');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `hilo`
--

INSERT INTO `hilo` (`id`, `creador`, `titulo`, `texto`, `fecha`, `categoria`) VALUES
(9, 4, 'Es mi primerito Hilo', '<p><img alt="" src="http://i.stack.imgur.com/e8nZC.gif" style="height:360px; width:365px" /></p>', '2018-01-09 08:20:54', 1),
(10, 3, 'GII', '<p><img alt="" src="http://i52.tinypic.com/2mniyvk.jpg" style="height:338px; width:364px" /></p>', '2018-01-09 08:32:20', 2),
(11, 3, 'La pagina del futuro', '<p><img alt="" src="http://www.gomezortiz.com/wp-content/uploads/2015/03/homer.gif" style="height:320px; width:500px" /></p>', '2018-01-09 08:34:53', 4),
(12, 5, 'Pon un gif y te vas', '<p><img alt="" src="http://i.imgur.com/HtaBUrK.gif" style="height:281px; width:500px" /></p>', '2018-01-09 08:47:44', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id`, `hilo`, `usuario`, `texto`, `fecha`) VALUES
(18, 9, 3, '<p>Pole</p>\r\n', '2018-01-09 08:29:42'),
(19, 10, 5, '<p>Pole</p>\r\n', '2018-01-09 08:40:42'),
(21, 12, 3, '<p><img alt="" src="https://media.giphy.com/media/qu5ZCwLdk7gLS/giphy.gif" style="height:240px; width:360px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '2018-01-09 09:11:35'),
(22, 12, 3, '<p><img alt="" src="http://i50.tinypic.com/1zv2ux0.jpg" style="height:288px; width:360px" /></p>\r\n', '2018-01-09 09:12:27'),
(24, 11, 3, '<p><img alt="" src="http://img.imgur.com/QehvX54.gif" style="height:240px; width:320px" /></p>\r\n', '2018-01-09 09:40:23'),
(25, 10, 3, '<p><img alt="" src="http://www.vistoenforocoches.com/wp-content/uploads/2013/01/wqJ6s.gif" style="height:175px; width:320px" /></p>\r\n', '2018-01-09 09:49:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `avatar` varchar(500) COLLATE latin1_spanish_ci DEFAULT 'user-icon1.jpg',
  `correo` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `estado` text COLLATE latin1_spanish_ci,
  `nreportes` int(11) NOT NULL DEFAULT '0',
  `reportado` tinyint(1) NOT NULL DEFAULT '0',
  `fechaCreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`,`correo`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `usuario_2` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `avatar`, `correo`, `estado`, `nreportes`, `reportado`, `fechaCreacion`) VALUES
(1, 'pericoeldeprueba', '12345678', 'descarga.png', 'gfd', 'Soy el administrador todopoderoso de esta web', 0, 0, '2017-12-19 11:26:56'),
(3, 'admin', '12345678', 'descarga5.png', 'ForoESI@gmail.com', 'El mejor admin', 0, 0, '2018-01-04 16:13:48'),
(4, 'Fran', '12345678', '5a8b20b5cf3fac721ac47477b1bdec9f1.jpg', 'erFran@xeresano.com', '0', 0, 0, '2018-01-09 08:17:43'),
(5, 'PericoDelosPalotes', 'caca', '0e447bcb092088c8bd09584b2c2dd833.gif', 'perico@gmail.com', '0', 0, 0, '2018-01-09 08:39:03'),
(6, 'homer', '123456', 'user-icon1.jpg', 'homer@hotmail.es', '0', 0, 0, '2018-01-09 09:13:48'),
(7, 'zombicat 5.0', '12345', 'user-icon1.jpg', 'zombiflow@hotmail.com', '0', 0, 0, '2018-01-09 09:16:26'),
(8, 'langostino', 'langostino', '0e447bcb092088c8bd09584b2c2dd8331.gif', 'langostino@mcbimbo.com', '0', 0, 0, '2018-01-09 09:31:30');

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
