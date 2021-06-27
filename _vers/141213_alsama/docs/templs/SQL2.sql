-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 27-11-2013 a las 16:52:05
-- Versión del servidor: 5.0.27
-- Versión de PHP: 5.2.1
-- 
-- Base de datos: `colegio`
-- 
CREATE DATABASE `colegio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `colegio`;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alumnos`
-- 

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL auto_increment,
  `nif` char(15) NOT NULL default '',
  `nombre` char(50) default NULL,
  `apellidos` char(50) default NULL,
  `direccion` char(50) default NULL,
  `telefono` char(15) default NULL,
  `provincia` char(15) default NULL,
  `nacionalidad` char(15) default NULL,
  `sexo` enum('F','M') default NULL,
  `fecha_nac` date default NULL,
  `id_curso` tinyint(4) NOT NULL default '0',
  `id_especialidad` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id_alumno`),
  UNIQUE KEY `nif` (`nif`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Volcar la base de datos para la tabla `alumnos`
-- 

INSERT INTO `alumnos` (`id_alumno`, `nif`, `nombre`, `apellidos`, `direccion`, `telefono`, `provincia`, `nacionalidad`, `sexo`, `fecha_nac`, `id_curso`, `id_especialidad`) VALUES 
(1, '23547890', 'Rafael', 'Toscano Lozano', 'C/ Fuencarral, 24.', '958.89.54.23', 'Granada', 'Española', 'M', '1985-02-05', 1, 1),
(2, '35679309A', 'Jennifer', 'Romero Lara', 'Avda. Montoto, 54.', NULL, 'Sevilla', 'Española', 'F', NULL, 1, 1),
(3, '54769812', 'Silvia', 'Espigares Prados', 'Avda. Pulianas, 34.', '958.76.67.98', 'Granada', 'Española', 'F', '0000-00-00', 1, 1),
(4, '89654678N', 'Roberto', 'Muñoz Montaño', 'C/ Las Torres, 71.', NULL, 'Córdoba', 'Española', 'M', '1981-07-04', 2, 2),
(5, '56985432K', 'Emilio', 'Barrionuevo López', 'Avda. Pulianas, 56.', NULL, 'Huelva', 'Española', 'M', NULL, 2, 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `clases`
-- 

CREATE TABLE `clases` (
  `id_clase` tinyint(4) NOT NULL auto_increment,
  `id_curso` tinyint(4) NOT NULL default '0',
  `id_modulo` tinyint(4) NOT NULL default '0',
  `id_profesor` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id_clase`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `clases`
-- 

INSERT INTO `clases` (`id_clase`, `id_curso`, `id_modulo`, `id_profesor`) VALUES 
(1, 1, 1, 2),
(2, 1, 2, 1),
(3, 1, 3, 2),
(4, 2, 4, 1),
(5, 2, 5, 1),
(6, 2, 6, 2);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `cursos`
-- 

CREATE TABLE `cursos` (
  `id_curso` tinyint(4) NOT NULL auto_increment,
  `curso` enum('1','2') default NULL,
  `letra` enum('A','B','C','D') default NULL,
  PRIMARY KEY  (`id_curso`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `cursos`
-- 

INSERT INTO `cursos` (`id_curso`, `curso`, `letra`) VALUES 
(1, '1', 'A'),
(2, '1', 'B');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `especialidades`
-- 

CREATE TABLE `especialidades` (
  `id_especialidad` tinyint(4) NOT NULL auto_increment,
  `especialidad` char(50) default NULL,
  PRIMARY KEY  (`id_especialidad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `especialidades`
-- 

INSERT INTO `especialidades` (`id_especialidad`, `especialidad`) VALUES 
(1, 'Técnico Medio en Comercio'),
(2, 'Técnico Medio en Gestión Administrativa');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `modulos`
-- 

CREATE TABLE `modulos` (
  `id_modulo` tinyint(4) NOT NULL auto_increment,
  `id_especialidad` tinyint(4) NOT NULL default '0',
  `modulo` char(50) default NULL,
  PRIMARY KEY  (`id_modulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- 
-- Volcar la base de datos para la tabla `modulos`
-- 


-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `notas`
-- 

CREATE TABLE `notas` (
  `id_alumno` char(15) NOT NULL default '',
  `id_modulo` tinyint(4) NOT NULL default '0',
  `n1` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  `r1` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  `n2` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  `r2` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  `n3` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  `r3` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  `ordinaria` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  `extraordinaria` enum('-','1','2','3','4','5','6','7','8','9','10') default '-',
  PRIMARY KEY  (`id_alumno`,`id_modulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- 
-- Volcar la base de datos para la tabla `notas`
-- 

INSERT INTO `notas` (`id_alumno`, `id_modulo`, `n1`, `r1`, `n2`, `r2`, `n3`, `r3`, `ordinaria`, `extraordinaria`) VALUES 
('23547890', 1, '5', '-', '6', '-', '7', '-', '6', '-'),
('23547890', 2, '3', '6', '7', '-', '5', '-', '6', '-'),
('23547890', 3, '6', '-', '7', '-', '5', '-', '6', '-'),
('35679309A', 1, '2', '5', '2', '5', '4', '2', '-', '5'),
('35679309A', 2, '4', '5', '3', '5', '2', '3', '-', '5'),
('35679309A', 3, '6', '-', '7', '-', '8', '-', '7', '-'),
('54769812', 1, '8', '-', '6', '-', '10', '-', '8', '-'),
('54769812', 2, '4', '7', '5', '-', '2', '9', '7', '-'),
('54769812', 3, '5', '-', '5', '-', '4', '4', '-', '5'),
('89654678N', 4, '7', '-', '7', '-', '7', '-', '7', '-'),
('89654678N', 5, '6', '-', '6', '-', '6', '-', '6', '-'),
('89654678N', 6, '8', '-', '8', '-', '8', '-', '8', '-'),
('56985432K', 4, '4', '7', '1', '3', '4', '4', '-', '8'),
('56985432K', 5, '2', '5', '5', '-', '5', '-', '5', '-'),
('56985432K', 6, '6', '-', '8', '-', '10', '-', '8', '-');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `profesores`
-- 

CREATE TABLE `profesores` (
  `id_profesor` tinyint(4) NOT NULL auto_increment,
  `nif` char(15) NOT NULL default '',
  `apellidos` char(50) default NULL,
  `nombre` char(50) default NULL,
  `telefono` char(15) default NULL,
  PRIMARY KEY  (`id_profesor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- 
-- Volcar la base de datos para la tabla `profesores`
-- 

