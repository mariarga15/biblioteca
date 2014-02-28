-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-02-2014 a las 16:21:16
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE IF NOT EXISTS `autor` (
  `IdAutor` int(11) NOT NULL AUTO_INCREMENT,
  `NombreAutor` varchar(50) NOT NULL,
  PRIMARY KEY (`IdAutor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`IdAutor`, `NombreAutor`) VALUES
(1, 'Pablo '),
(25, 'Jose Manuel Gil'),
(27, 'Ibán Yarza'),
(28, 'Eckhart Tolle'),
(29, 'Suzanne Powell'),
(30, 'J.M. Mulet'),
(31, 'Elvira Menéndez'),
(32, 'Disney');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `NombreCategoria` varchar(60) NOT NULL,
  PRIMARY KEY (`IdCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NombreCategoria`) VALUES
(1, 'Novela'),
(9, 'Cocina'),
(10, 'Guía'),
(11, 'Alimentacion'),
(12, 'Infantil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE IF NOT EXISTS `imagen` (
  `IdImagen` int(11) NOT NULL AUTO_INCREMENT,
  `Ruta` longtext NOT NULL,
  PRIMARY KEY (`IdImagen`),
  KEY `IdImagen` (`IdImagen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`IdImagen`, `Ruta`) VALUES
(2, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(3, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 10.24.00.pn'),
(4, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 10.24.00.pn'),
(5, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(6, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(7, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(8, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 10.24.00.pn'),
(9, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 10.24.00.pn'),
(10, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 10.24.00.pn'),
(11, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(12, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(13, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 10.24.00.pn'),
(14, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(15, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(16, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(17, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(18, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 10.24.00.pn'),
(19, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(20, 'C:fakepathCaptura de pantalla 2014-02-25 a la(s) 09.50.20.pn'),
(22, ''),
(23, ''),
(24, 'Array'),
(25, 'Array'),
(26, 'Captura de pantalla 2014-02-25 a la(s) 09.50.20.png'),
(27, 'Captura de pantalla 2014-02-25 a la(s) 09.50.20.png'),
(28, 'Captura de pantalla 2014-02-25 a la(s) 09.50.20.png'),
(29, '../images/Captura de pantalla 2014-02-25 a la(s) 09.50.20.png'),
(30, '../images/Captura de pantalla 2014-02-25 a la(s) 09.50.20.png'),
(31, 'Captura de pantalla 2014-02-25 a la(s) 09.50.20.png'),
(41, '41WK2JnfzfL._SY445_.jpg'),
(42, '51bMI3aEaBL._SX342_.jpg'),
(43, '51sa+lStXzL._SY445_.jpg'),
(44, '51kH8hdGNIL._SY445_.jpg'),
(45, '41xY3Heh8UL._SY445_.jpg'),
(46, '41xRqxmrHwL._SY445_.jpg'),
(47, '51XcX54KR8L._SY445_.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE IF NOT EXISTS `libro` (
  `IdLibro` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(60) NOT NULL,
  `IdAutor` int(11) NOT NULL,
  `IdCategoria` int(11) NOT NULL,
  `Descripcion` varchar(400) NOT NULL,
  `IdImagen` int(11) NOT NULL,
  PRIMARY KEY (`IdLibro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`IdLibro`, `Titulo`, `IdAutor`, `IdCategoria`, `Descripcion`, `IdImagen`) VALUES
(16, 'El viaje de Luis', 25, 1, 'La historia real de un milagro explicado por la ciencia.\nCuando hablamos de viajes de una vez pensamos en lugares remotos, en paisajes por descubrir, en emociones intensas.', 41),
(17, 'Pan casero', 27, 9, 'Recetas, Técnicas y Trucos para hacer pan casero . Pan en casa de manera sencilla.', 42),
(18, 'El poder del ahora', 1, 10, 'Quizás solamente una vez cada diez años o incluso una ves cada generación, surge un libro como el poder del ahora. Hay en él una energía vital que casi se puede sentir cuando uno lo toma en sus manos.', 43),
(19, 'Alimentación consistente', 29, 11, 'Con su estilo claro y desenfadado, SUZANNE POWELL nos introduce en el mundo de la alimentación, consiente, mostrándonos lo que conviene comer y lo que debemos evitar.', 44),
(20, 'Comer sin miedo', 30, 11, 'Era mejor la comida de antes que la de ahora? Es más sano comer ecológico? Estamos comiendo mucha química?', 45),
(21, 'El corazón del océano ', 31, 1, 'Para frenar el mestizaje entre las filas españolas que conquistan el nuevo mundo, la corona de castilla enviada a America.', 46),
(22, 'Frozen', 32, 12, 'Libro con juegos y actividades.', 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `NombreUsuario` varchar(70) NOT NULL,
  `Contrasena` varchar(70) NOT NULL,
  PRIMARY KEY (`IdUsuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `NombreUsuario`, `Contrasena`) VALUES
(1, 'marceg', 'mariela');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
