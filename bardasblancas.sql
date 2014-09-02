-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-08-2014 a las 21:10:05
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bardasblancas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `Rol` tinyint(2) unsigned NOT NULL,
  `nombreUsuario` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombreUsuario` (`nombreUsuario`(7))
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `Rol`, `nombreUsuario`, `clave`, `token`, `fecha`) VALUES
(1, 'Celeste', 'Serpa', 1, 'cele', 'cele', 'e14d6e804998b3c9c10ee71344689ab2', '2010-08-31 19:03:03'),
(2, 'Leandro Jose', 'Rebolloso', 1, 'leo', 'leo', 'f4a2204081289b963db963586284e615', '2010-08-31 19:03:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `escuela` varchar(255) NOT NULL,
  `curso` int(20) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `nombrePadre` varchar(255) NOT NULL,
  `cuilPadre` varchar(255) NOT NULL,
  `MarcaNetbook` int(11) NOT NULL,
  `numSerie` int(11) NOT NULL,
  `prestado` int(11) NOT NULL,
  `cargador` varchar(255) NOT NULL,
  `bateria` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcar la base de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `cuil`, `direccion`, `escuela`, `curso`, `turno`, `nombrePadre`, `cuilPadre`, `MarcaNetbook`, `numSerie`, `prestado`, `cargador`, `bateria`) VALUES
(2, 'Leandro Jose', '20-30965061-2', 'pedro vargas 124', '4-169', 4, '2', 'loco varela', '20-585214-3', 1, 99988890, 1, '', ''),
(3, 'Juan Perez', '20-35254125-2', 'ramon 14', '4-169', 3, '2', 'no se', '20.36547896-0', 3, 34421456, 1, '', ''),
(4, 'Pedro Jaite', '20-32456789-0', 'gil 154', '4-169', 1, '1', 'Martin Jaite', '20-12345678-9', 6, 34421454, 1, '', ''),
(5, 'Juan De Los Palotes', '20-32345334-0', 'martinez  125', '4-169', 4, '2', 'Pedro De Los Palotes', '20-16543324-3', 4, 987654321, 1, '', ''),
(7, 'Probando Lopez', '20-33333333-7', 'Las Aucas 125', '4-169', 5, '1', 'Gerardo Lopez', '27-22222222-6', 0, 0, 1, '', ''),
(10, 'Chino Maidana', '20-55555555-5', '', '', 5, '', 'Gerardo Maidana', '27-11111111-9', 3, 963258741, 0, '', ''),
(9, 'Turno Ramirez', '27-44444444-8', 'Libertad 879', '4-169', 5, '2', 'Andres Ramirez', '20-22222222-6', 0, 0, 1, '', ''),
(11, 'Robertito Gomez Bolaños', '27-55555555-6', '', '', 1, '', 'Don Roberto Gomez Bolaños', '20-2222222-3', 6, 12345678, 1, '', ''),
(12, 'Robertito Gomez Bolaños', '27-55555555-6', 'algo 124', '4-589', 3, 'Mañana', 'Don Roberto Gomez Bolaños', '20-2222222-3', 3, 12345678, 1, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(2555) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`) VALUES
(1, '1'),
(3, '2'),
(4, '3'),
(5, '4'),
(6, '5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadostecnico`
--

CREATE TABLE IF NOT EXISTS `estadostecnico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `estadostecnico`
--

INSERT INTO `estadostecnico` (`id`, `nombre`) VALUES
(1, 'S.Tecnico-Escuela'),
(2, 'S.Tecnico-Enviado'),
(3, 'S.Tecnico-Reparado'),
(4, 'S.Tecnico-Fuera De Garantia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `marca`
--

INSERT INTO `marca` (`id`, `nombre`) VALUES
(1, 'Lenovo'),
(3, 'Bangho'),
(4, 'Exo'),
(5, 'Noblex'),
(6, 'Positivo BGH'),
(7, 'Coradir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE IF NOT EXISTS `modulo` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `nombreObjeto` varchar(50) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `esHoja` char(1) NOT NULL,
  `esAutonomo` char(1) NOT NULL,
  `ModuloPadre` int(5) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nombre` (`nombre`(7)),
  KEY `ModuloPadre` (`ModuloPadre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id`, `nombre`, `nombreObjeto`, `descripcion`, `esHoja`, `esAutonomo`, `ModuloPadre`) VALUES
(1, 'administradores', 'administrador', 'Administradores', 's', 's', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `netbook`
--

CREATE TABLE IF NOT EXISTS `netbook` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numSerie` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `MarcaNetbook` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `netbook`
--

INSERT INTO `netbook` (`id`, `numSerie`, `curso`, `MarcaNetbook`, `estado`) VALUES
(5, '321654987', 'Uso Escolar', 3, 1),
(2, '111111111', 'Uso Escolar', 4, 1),
(3, '222222222', 'Uso Escolar', 1, 0),
(6, '666666666', 'Uso Escolar', 6, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE IF NOT EXISTS `prestamo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `numSerie` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `fechaDesde` date NOT NULL,
  `fechaHasta` date NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `prestamo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE IF NOT EXISTS `tecnico` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombreAlumno` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `cuil` varchar(255) NOT NULL,
  `numeroSerie` int(11) NOT NULL,
  `marca` varchar(255) NOT NULL,
  `problema` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `idreclamo` int(11) NOT NULL,
  `estado` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`id`, `nombreAlumno`, `curso`, `cuil`, `numeroSerie`, `marca`, `problema`, `fecha`, `idreclamo`, `estado`) VALUES
(9, 'Pedro Jaite', '1', '20-32456789-0', 34421454, 'Positivo BGH', 'pantalla rota', '2014-08-13 21:19:23', 6254814, '2'),
(8, 'Juan Perez', '1', '20-35254125-2', 34421456, 'Bangho', 'pantalla rota', '2014-08-06 20:11:23', 6254814, '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `nombre`) VALUES
(1, 'Mañana'),
(2, 'Tarde');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
