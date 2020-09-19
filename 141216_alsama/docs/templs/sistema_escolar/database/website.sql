-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-10-2013 a las 20:46:44
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.4-14+deb7u4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `website`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nacimiento` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `nro_documento` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `email` varchar(35) NOT NULL,
  `especialidad` varchar(35) NOT NULL,
  `nro_rand` varchar(40) NOT NULL,
  `nro_curso` int(30) NOT NULL,
  `telefono` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `ciudad`, `nro_documento`, `sexo`, `email`, `especialidad`, `nro_rand`, `nro_curso`, `telefono`) VALUES
(8, 'Victor', 'Molina', '11/3/1995', 'Juan XXIII 423', 'Maq Savio', '38454566', 'M', 'victorgustavomolina@gmail.com', 'Informatica', '1234', 74, '111564695548'),
(9, 'jose', 'acevedo', '30/10/1995', 'ewdsfs', 'Escobar', '38623568', 'M', 'jose@hotmail.com', 'Informatica', '1234', 74, '56789'),
(10, 'Rolando', 'Romero', '10/3/1994', 'corrientes 680', 'máquinista savio', '38454185', 'M', 'rolando@hotmail.com', 'Informatica', '1130726236', 74, '1130726236');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clave_admin`
--

CREATE TABLE IF NOT EXISTS `clave_admin` (
  `usuario` varchar(35) NOT NULL,
  `clave` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clave_admin`
--

INSERT INTO `clave_admin` (`usuario`, `clave`) VALUES
('root', 'bbtres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `comentario` varchar(300) NOT NULL,
  `fecha` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `nombre`, `email`, `comentario`, `fecha`) VALUES
(1, 'Victor', 'victor@loquesea.com', 'hola a todos :)', ''),
(2, 'jose', 'el-loco-@hotmail.com', 'esta muy buena jaja\r\n', ''),
(3, 'victor', 'victorgustavomolina@gmail.com', 'ahora le agregue fecha a los comentariops', '26-08-2013 06:48:30'),
(4, 'rolando', 'rolandocabj@hotmail.com', 'cosas de tiempo', '27-08-2013 17:31:50'),
(5, 'Alexa Hofmarks', 'alexhofmarks2008@hotmail.com', 'EY ! Donde le doy el Mg? xD', '28-08-2013 22:40:24'),
(6, 'Victor', 'victorgustavomolina@gmail.com', 'esperame que le agrego uno', '29-08-2013 09:53:59'),
(7, 'leo', 'o5iosanchez-@hotmail.com', 'pobre victoor con estos bol.. fue a para ', '04-09-2013 16:10:51'),
(8, 'Victor', 'victorgustavomolina@gmail.com', 'pobree de mii ', '05-09-2013 12:58:08'),
(9, 'victor', 'victorgustavomolina@gmail.com', 'exporte la base de datos y el sitio completo a otro server mucho mejor', '16-09-2013 09:23:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(255) NOT NULL AUTO_INCREMENT,
  `curso` int(2) NOT NULL,
  `especialidad` varchar(35) NOT NULL,
  `id_preceptor` int(2) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `curso`, `especialidad`, `id_preceptor`) VALUES
(7, 74, 'Informatica', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nacimiento` varchar(15) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `nro_documento` varchar(30) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `nro_rand` varchar(30) NOT NULL,
  `telefono` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `docente`
--

INSERT INTO `docente` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `direccion`, `ciudad`, `nro_documento`, `sexo`, `email`, `nro_rand`, `telefono`) VALUES
(1, 'Jose', 'Rodriguez', '8/2/1970', 'Mendoza 245', 'Escobar', '23983877', 'M', 'jrodriguez@yahoo.com', 'profe2', '3484498296'),
(2, 'Mariana', 'Peralta', '1/1/2013', 'kjflkdgjlk', 'fdjkglkfdjglk', '9999', 'F', 'jhfjsdhfkdjs', '1234', 'rr387892798'),
(3, 'Juan', 'Gonzalez', '11/3/1995', 'Juan XXIII 423', 'maq savio', '38454566', 'M', 'jgonzalez@gmail.com', '1234', '32423423'),
(4, 'Manuel', 'Alvarez', '12/10/1970', 'Hipolito Yrigoyen 45', 'Escobar', '20674436', 'M', 'alvarez@hotmail.com', '1234', '345345345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `curso_id` varchar(2) NOT NULL,
  `esp_id` varchar(2) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `cmod` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
