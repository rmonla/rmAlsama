-- phpMyAdmin SQL Dump
-- version 2.6.3-pl1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: May 13, 2006 at 12:09 PM
-- Server version: 4.0.25
-- PHP Version: 4.4.0
-- 
-- Database: `colegio`
-- 
CREATE DATABASE `colegio`;
USE colegio;

-- --------------------------------------------------------

-- 
-- Table structure for table `alumnos`
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
) TYPE=MyISAM AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `alumnos`
-- 

INSERT INTO `alumnos` VALUES (1, '23547890', 'Rafael', 'Toscano Lozano', 'C/ Fuencarral, 24.', '958.89.54.23', 'Granada', 'Española', 'M', '1985-02-05', 1, 1);
INSERT INTO `alumnos` VALUES (2, '35679309A', 'Jennifer', 'Romero Lara', 'Avda. Montoto, 54.', NULL, 'Sevilla', 'Española', 'F', NULL, 1, 1);
INSERT INTO `alumnos` VALUES (3, '54769812', 'Silvia', 'Espigares Prados', 'Avda. Pulianas, 34.', '958.76.67.98', 'Granada', 'Española', 'F', '0000-00-00', 1, 1);
INSERT INTO `alumnos` VALUES (4, '89654678N', 'Roberto', 'Muñoz Montaño', 'C/ Las Torres, 71.', NULL, 'Córdoba', 'Española', 'M', '1981-07-04', 2, 2);
INSERT INTO `alumnos` VALUES (5, '56985432K', 'Emilio', 'Barrionuevo López', 'Avda. Pulianas, 56.', NULL, 'Huelva', 'Española', 'M', NULL, 2, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `clases`
-- 

CREATE TABLE `clases` (
  `id_clase` tinyint(4) NOT NULL auto_increment,
  `id_curso` tinyint(4) NOT NULL default '0',
  `id_modulo` tinyint(4) NOT NULL default '0',
  `id_profesor` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id_clase`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `clases`
-- 

INSERT INTO `clases` VALUES (1, 1, 1, 2);
INSERT INTO `clases` VALUES (2, 1, 2, 1);
INSERT INTO `clases` VALUES (3, 1, 3, 2);
INSERT INTO `clases` VALUES (4, 2, 4, 1);
INSERT INTO `clases` VALUES (5, 2, 5, 1);
INSERT INTO `clases` VALUES (6, 2, 6, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `cursos`
-- 

CREATE TABLE `cursos` (
  `id_curso` tinyint(4) NOT NULL auto_increment,
  `curso` enum('1','2') default NULL,
  `letra` enum('A','B','C','D') default NULL,
  PRIMARY KEY  (`id_curso`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `cursos`
-- 

INSERT INTO `cursos` VALUES (1, '1', 'A');
INSERT INTO `cursos` VALUES (2, '1', 'B');

-- --------------------------------------------------------

-- 
-- Table structure for table `especialidades`
-- 

CREATE TABLE `especialidades` (
  `id_especialidad` tinyint(4) NOT NULL auto_increment,
  `especialidad` char(50) default NULL,
  PRIMARY KEY  (`id_especialidad`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `especialidades`
-- 

INSERT INTO `especialidades` VALUES (1, 'Técnico Medio en Comercio');
INSERT INTO `especialidades` VALUES (2, 'Técnico Medio en Gestión Administrativa');

-- --------------------------------------------------------

-- 
-- Table structure for table `modulos`
-- 

CREATE TABLE `modulos` (
  `id_modulo` tinyint(4) NOT NULL auto_increment,
  `id_especialidad` tinyint(4) NOT NULL default '0',
  `modulo` char(50) default NULL,
  PRIMARY KEY  (`id_modulo`)
) TYPE=MyISAM AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `modulos`
-- 

INSERT INTO `modulos` VALUES (1, 1, 'Informática');
INSERT INTO `modulos` VALUES (2, 1, 'Formación y orientación laboral');
INSERT INTO `modulos` VALUES (3, 1, 'Sectores Productivos de Andalucía');
INSERT INTO `modulos` VALUES (4, 2, 'Aplicaciones Informáticas');
INSERT INTO `modulos` VALUES (5, 2, 'Contabilidad');
INSERT INTO `modulos` VALUES (6, 2, 'Formación y orientación laboral');

-- --------------------------------------------------------

-- 
-- Table structure for table `notas`
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
) TYPE=MyISAM;

-- 
-- Dumping data for table `notas`
-- 

INSERT INTO `notas` VALUES ('23547890', 1, '5', '-', '6', '-', '7', '-', '6', '-');
INSERT INTO `notas` VALUES ('23547890', 2, '3', '6', '7', '-', '5', '-', '6', '-');
INSERT INTO `notas` VALUES ('23547890', 3, '6', '-', '7', '-', '5', '-', '6', '-');
INSERT INTO `notas` VALUES ('35679309A', 1, '2', '5', '2', '5', '4', '2', '-', '5');
INSERT INTO `notas` VALUES ('35679309A', 2, '4', '5', '3', '5', '2', '3', '-', '5');
INSERT INTO `notas` VALUES ('35679309A', 3, '6', '-', '7', '-', '8', '-', '7', '-');
INSERT INTO `notas` VALUES ('54769812', 1, '8', '-', '6', '-', '10', '-', '8', '-');
INSERT INTO `notas` VALUES ('54769812', 2, '4', '7', '5', '-', '2', '9', '7', '-');
INSERT INTO `notas` VALUES ('54769812', 3, '5', '-', '5', '-', '4', '4', '-', '5');
INSERT INTO `notas` VALUES ('89654678N', 4, '7', '-', '7', '-', '7', '-', '7', '-');
INSERT INTO `notas` VALUES ('89654678N', 5, '6', '-', '6', '-', '6', '-', '6', '-');
INSERT INTO `notas` VALUES ('89654678N', 6, '8', '-', '8', '-', '8', '-', '8', '-');
INSERT INTO `notas` VALUES ('56985432K', 4, '4', '7', '1', '3', '4', '4', '-', '8');
INSERT INTO `notas` VALUES ('56985432K', 5, '2', '5', '5', '-', '5', '-', '5', '-');
INSERT INTO `notas` VALUES ('56985432K', 6, '6', '-', '8', '-', '10', '-', '8', '-');

-- --------------------------------------------------------

-- 
-- Table structure for table `profesores`
-- 

CREATE TABLE `profesores` (
  `id_profesor` tinyint(4) NOT NULL auto_increment,
  `nif` char(15) NOT NULL default '',
  `apellidos` char(50) default NULL,
  `nombre` char(50) default NULL,
  `telefono` char(15) default NULL,
  PRIMARY KEY  (`id_profesor`)
) TYPE=MyISAM AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `profesores`
-- 

INSERT INTO `profesores` VALUES (1, '34765432B', 'García López', 'Rosa', NULL);
INSERT INTO `profesores` VALUES (2, '56789687L', 'González Atello', 'Rafael', '955.45.67.87');
