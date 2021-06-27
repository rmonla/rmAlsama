-- phpMyAdmin SQL Dump
-- version 2.9.2
-- http://www.phpmyadmin.net
-- 
-- Servidor: localhost
-- Tiempo de generación: 22-10-2010 a las 09:50:12
-- Versión del servidor: 5.0.27
-- Versión de PHP: 5.2.1
-- 
-- Base de datos: `registro`
-- 

-- --------------------------------------------------------

DROP DATABASE IF EXISTS registro;

CREATE DATABASE registro DEFAULT CHARACTER SET latin1 COLLATE latin1_bin;
USE registro;

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `alumno`
-- 

CREATE TABLE `alumno` (
  `cod_alumno` int(15) unsigned zerofill NOT NULL,
  `nombre_alum` varchar(100) NOT NULL,
  `apellido_alum` varchar(100) NOT NULL,
  `direccion_alum` varchar(255) NOT NULL,
  `telefono_alum` varchar(25) NOT NULL,
  `sexo_alum` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `cod_seccion` int(5) unsigned NOT NULL,
  PRIMARY KEY  (`cod_alumno`),
  KEY `cod_seccion` (`cod_seccion`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `alumno`
-- 

INSERT INTO `alumno` VALUES (000000000000001, 'Nahum', 'Sanchez', 'Colonia Sanchez', '74552100', 'Masculino', 'nahum.2007@hotmail.com', 'nahum', 1);
INSERT INTO `alumno` VALUES (000000000000002, 'Denny', 'Perez', 'askjdfñlkjs', '2938049284', 'Femenino', '28349032840', 'denny', 1);
INSERT INTO `alumno` VALUES (000000000000003, 'Marta', 'Guardado', 'lkadjsflkj', '8294850', 'Femenino', '0943850948', 'marta', 1);
INSERT INTO `alumno` VALUES (000000000000004, 'Tirsa', 'Martinez', 'kaljsdlkfj', '204985209', 'Femenino', '294085098ipofjd', 'tirsa', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `carrera`
-- 

CREATE TABLE `carrera` (
  `cod_carrera` int(5) unsigned NOT NULL auto_increment,
  `nombre_carrera` varchar(100) NOT NULL,
  `cod_periodo` int(5) unsigned NOT NULL,
  PRIMARY KEY  (`cod_carrera`),
  KEY `cod_periodo` (`cod_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `carrera`
-- 

INSERT INTO `carrera` VALUES (1, 'Bachillerato Tecnico Vocacional Comercial Opcion Contador', 1);
INSERT INTO `carrera` VALUES (2, 'Bachillerato Tecnico Vocacional Comercial opcion Mecanica Automotriz', 1);
INSERT INTO `carrera` VALUES (3, 'Bachillerato General', 1);
INSERT INTO `carrera` VALUES (4, 'Bachillerato Tecnico Comercial Opcion Secretaria', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `docente`
-- 

CREATE TABLE `docente` (
  `cod_docente` int(5) unsigned NOT NULL auto_increment,
  `nombre_doc` varchar(100) NOT NULL,
  `apellido_doc` varchar(100) NOT NULL,
  `direccion_doc` varchar(255) NOT NULL,
  `telefono_doc` varchar(25) NOT NULL,
  `sexo_doc` varchar(25) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  PRIMARY KEY  (`cod_docente`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `docente`
-- 

INSERT INTO `docente` VALUES (1, 'Danilo', 'Lopez', 'San Salvador', '7455-2102', 'Masculino', 'csafasdfñaslkdf', 'danilo');
INSERT INTO `docente` VALUES (2, 'Rosa', 'Caceres', 'Usulutan', '24809248', 'Femenino', 'asdjflaksjlkf', 'rosa');
INSERT INTO `docente` VALUES (3, 'Keiry', 'Bermudez', 'Usulutan', '209284092', 'Masculino', 'askljfdlkj', 'keiry');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `docente_mat`
-- 

CREATE TABLE `docente_mat` (
  `cod_doc_mat` int(5) NOT NULL auto_increment,
  `cod_docente` int(5) NOT NULL,
  `cod_materia` int(5) NOT NULL,
  PRIMARY KEY  (`cod_doc_mat`),
  KEY `cod_docente` (`cod_docente`),
  KEY `cod_materia` (`cod_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `docente_mat`
-- 

INSERT INTO `docente_mat` VALUES (1, 1, 1);
INSERT INTO `docente_mat` VALUES (2, 3, 2);
INSERT INTO `docente_mat` VALUES (3, 1, 3);
INSERT INTO `docente_mat` VALUES (4, 3, 7);
INSERT INTO `docente_mat` VALUES (5, 2, 10);
INSERT INTO `docente_mat` VALUES (6, 1, 15);
INSERT INTO `docente_mat` VALUES (7, 3, 16);
INSERT INTO `docente_mat` VALUES (8, 2, 17);
INSERT INTO `docente_mat` VALUES (9, 1, 4);
INSERT INTO `docente_mat` VALUES (10, 1, 5);
INSERT INTO `docente_mat` VALUES (11, 1, 6);
INSERT INTO `docente_mat` VALUES (12, 3, 14);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `grado`
-- 

CREATE TABLE `grado` (
  `cod_grado` int(5) unsigned NOT NULL auto_increment,
  `nombre_grado` varchar(100) NOT NULL,
  `cod_carrera` int(5) unsigned NOT NULL,
  PRIMARY KEY  (`cod_grado`),
  KEY `cod_carrera` (`cod_carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- 
-- Volcar la base de datos para la tabla `grado`
-- 

INSERT INTO `grado` VALUES (1, 'Primero', 1);
INSERT INTO `grado` VALUES (2, 'Segundo', 4);
INSERT INTO `grado` VALUES (3, 'Segundo', 1);
INSERT INTO `grado` VALUES (4, 'Tercero', 1);
INSERT INTO `grado` VALUES (5, 'Tercero', 4);
INSERT INTO `grado` VALUES (6, 'Primero', 4);
INSERT INTO `grado` VALUES (7, 'Primero', 2);
INSERT INTO `grado` VALUES (8, 'Segundo', 2);
INSERT INTO `grado` VALUES (9, 'Tercero', 2);
INSERT INTO `grado` VALUES (10, 'Primero', 3);
INSERT INTO `grado` VALUES (11, 'Segundo', 3);
INSERT INTO `grado` VALUES (12, 'Septimo', 1);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `materia`
-- 

CREATE TABLE `materia` (
  `cod_materia` int(5) unsigned NOT NULL auto_increment,
  `nombre_materia` varchar(100) NOT NULL,
  `cod_grado` int(5) unsigned NOT NULL,
  PRIMARY KEY  (`cod_materia`),
  KEY `cod_grado` (`cod_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

-- 
-- Volcar la base de datos para la tabla `materia`
-- 

INSERT INTO `materia` VALUES (1, 'Tecnologia I', 1);
INSERT INTO `materia` VALUES (2, 'Seminario', 1);
INSERT INTO `materia` VALUES (3, 'Lenguaje y Literatura', 1);
INSERT INTO `materia` VALUES (4, 'Ciencias Naturales', 1);
INSERT INTO `materia` VALUES (5, 'Ciencias Sociales', 1);
INSERT INTO `materia` VALUES (6, 'Matematica', 1);
INSERT INTO `materia` VALUES (7, 'Ciencias Naturales', 3);
INSERT INTO `materia` VALUES (8, 'Ciencias Sociales', 3);
INSERT INTO `materia` VALUES (9, 'Informatica', 1);
INSERT INTO `materia` VALUES (10, 'Informatica', 3);
INSERT INTO `materia` VALUES (11, 'Practica', 3);
INSERT INTO `materia` VALUES (12, 'Seminario', 3);
INSERT INTO `materia` VALUES (13, 'Tecnologia I', 3);
INSERT INTO `materia` VALUES (14, 'Mecanografia', 1);
INSERT INTO `materia` VALUES (15, 'Tecnologia Contable', 4);
INSERT INTO `materia` VALUES (16, 'Trabajo de Graduacion', 4);
INSERT INTO `materia` VALUES (17, 'Tecnologia de la Empresa Privada', 4);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `nota`
-- 

CREATE TABLE `nota` (
  `cod_nota` int(5) unsigned NOT NULL auto_increment,
  `nota_1` varchar(12) NOT NULL,
  `nota_2` varchar(12) NOT NULL,
  `nota_3` varchar(12) NOT NULL,
  `cod_alumno` int(15) unsigned zerofill NOT NULL,
  `cod_materia` int(5) unsigned NOT NULL,
  PRIMARY KEY  (`cod_nota`),
  KEY `cod_alumno` (`cod_alumno`),
  KEY `cod_materia` (`cod_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- 
-- Volcar la base de datos para la tabla `nota`
-- 

INSERT INTO `nota` VALUES (1, '9.45', '7.5', '10', 000000000000001, 1);
INSERT INTO `nota` VALUES (2, '10', '10', '10', 000000000000002, 1);
INSERT INTO `nota` VALUES (3, '7', '7', '8', 000000000000003, 1);
INSERT INTO `nota` VALUES (4, '7', '6', '10', 000000000000004, 1);
INSERT INTO `nota` VALUES (5, '10', '10', '10', 000000000000001, 2);
INSERT INTO `nota` VALUES (6, '10', '10', '10', 000000000000002, 2);
INSERT INTO `nota` VALUES (7, '10', '8', '7', 000000000000001, 3);
INSERT INTO `nota` VALUES (8, '8.78', '9.5', '10', 000000000000004, 3);
INSERT INTO `nota` VALUES (9, '10', '10', '10', 000000000000002, 3);
INSERT INTO `nota` VALUES (10, '10', '10', '6', 000000000000003, 3);
INSERT INTO `nota` VALUES (11, '10', '10', '10', 000000000000001, 4);
INSERT INTO `nota` VALUES (12, '10', '10', '10', 000000000000002, 4);
INSERT INTO `nota` VALUES (13, '9', '9', '9', 000000000000003, 4);
INSERT INTO `nota` VALUES (14, '10', '7', '8', 000000000000004, 4);
INSERT INTO `nota` VALUES (15, '10', '10', '10', 000000000000001, 5);
INSERT INTO `nota` VALUES (16, '10', '8', '10', 000000000000002, 5);
INSERT INTO `nota` VALUES (17, '8.6', '9.5', '1', 000000000000003, 5);
INSERT INTO `nota` VALUES (18, '8.8', '9.4', '8', 000000000000004, 5);
INSERT INTO `nota` VALUES (19, '10', '10', '10', 000000000000001, 2);
INSERT INTO `nota` VALUES (20, '10', '10', '10', 000000000000001, 2);
INSERT INTO `nota` VALUES (21, '10', '8', '9', 000000000000001, 14);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `noticias`
-- 

CREATE TABLE `noticias` (
  `cod_noticia` int(5) unsigned NOT NULL auto_increment,
  `titulo` varchar(100) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `fecha_realizacion` varchar(15) NOT NULL,
  `imagen_noticia` varchar(100) NOT NULL,
  PRIMARY KEY  (`cod_noticia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Volcar la base de datos para la tabla `noticias`
-- 

INSERT INTO `noticias` VALUES (1, 'Partido Institucional', 'universidad don bosco', '12-10-10', 'Desert.jpg');
INSERT INTO `noticias` VALUES (2, 'Torneo de Basket', 'en el campo deportivo de la UNIVO', '12-12-12', 'Jellyfish.jpg');
INSERT INTO `noticias` VALUES (3, '15 de Septiembre', 'Recorrido en todo el Canton San Antonio Silva', '15-10-10', 'Lighthouse.jpg');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `periodo`
-- 

CREATE TABLE `periodo` (
  `cod_periodo` int(5) unsigned NOT NULL auto_increment,
  `nombre_periodo` varchar(100) NOT NULL,
  `duracion` varchar(100) NOT NULL,
  `estado_periodo` varchar(25) NOT NULL,
  PRIMARY KEY  (`cod_periodo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Volcar la base de datos para la tabla `periodo`
-- 

INSERT INTO `periodo` VALUES (1, 'Periodo 1', '3 Meses', 'Activo');

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `responsable`
-- 

CREATE TABLE `responsable` (
  `cod_resp` int(5) unsigned NOT NULL auto_increment,
  `nombre_resp` varchar(100) NOT NULL,
  `apellido_resp` varchar(100) NOT NULL,
  `direccion_resp` tinytext NOT NULL,
  `telefono_resp` varchar(25) NOT NULL,
  `sexo_resp` varchar(25) NOT NULL,
  `cod_alumno` int(15) unsigned zerofill NOT NULL,
  PRIMARY KEY  (`cod_resp`),
  KEY `cod_alumno` (`cod_alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Volcar la base de datos para la tabla `responsable`
-- 

INSERT INTO `responsable` VALUES (1, 'Maria', 'De Sanchez', 'Colonia Sanchez', '74552101', 'Femenino', 000000000000001);
INSERT INTO `responsable` VALUES (2, 'Dolores', 'Hernandez', 'asdfjksla', '347509348', 'Femenino', 000000000000002);
INSERT INTO `responsable` VALUES (3, 'Mari', 'Guardado', 'asjdflkjas', '2048950', 'Femenino', 000000000000003);
INSERT INTO `responsable` VALUES (4, 'Tirsa', 'Martinez', 'ajsdlfkjañl', '4320985092', 'Femenino', 000000000000004);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `seccion`
-- 

CREATE TABLE `seccion` (
  `cod_seccion` int(5) unsigned NOT NULL auto_increment,
  `nombre_seccion` varchar(100) NOT NULL,
  `cod_grado` int(5) unsigned NOT NULL,
  PRIMARY KEY  (`cod_seccion`),
  KEY `cod_grado` (`cod_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- 
-- Volcar la base de datos para la tabla `seccion`
-- 

INSERT INTO `seccion` VALUES (1, 'A', 1);
INSERT INTO `seccion` VALUES (2, 'B', 1);
INSERT INTO `seccion` VALUES (3, 'A', 3);
INSERT INTO `seccion` VALUES (4, 'B', 3);
INSERT INTO `seccion` VALUES (5, 'A', 7);
INSERT INTO `seccion` VALUES (6, 'B', 8);
INSERT INTO `seccion` VALUES (7, 'B', 7);
INSERT INTO `seccion` VALUES (8, 'A', 8);

-- --------------------------------------------------------

-- 
-- Estructura de tabla para la tabla `usuario`
-- 

CREATE TABLE `usuario` (
  `usuario` varchar(100) NOT NULL,
  `password` tinytext NOT NULL,
  `nivel` int(2) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  PRIMARY KEY  (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- 
-- Volcar la base de datos para la tabla `usuario`
-- 

INSERT INTO `usuario` VALUES ('admin', 'admin', 0, 'asd.jpg', 'Nahum Alexander Sanchez Cruz');
INSERT INTO `usuario` VALUES ('danilo', 'danilo', 5, 'Desert.jpg', 'Danilo Lopez');
INSERT INTO `usuario` VALUES ('denny', 'denny', 3, 'Koala.jpg', 'Denny Perez');
INSERT INTO `usuario` VALUES ('keiry', 'keiry', 5, 'Hydrangeas.jpg', 'Keiry Bermudez');
INSERT INTO `usuario` VALUES ('marta', 'marta', 3, 'Tulips.jpg', 'Marta Guardado');
INSERT INTO `usuario` VALUES ('nahum', 'denny', 3, 'Chrysanthemum.jpg', 'Nahum Sanchez');
INSERT INTO `usuario` VALUES ('rosa', 'caceres', 5, 'Desert.jpg', 'Rosa Caceres');
INSERT INTO `usuario` VALUES ('tirsa', 'tirsa', 3, 'Penguins.jpg', 'Tirsa Martinez');
