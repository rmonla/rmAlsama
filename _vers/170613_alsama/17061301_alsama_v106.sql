-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-06-2017 a las 11:02:49
-- Versión del servidor: 5.5.55-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alsama_v106`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curalunots`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `curalunots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcuralu` int(11) NOT NULL,
  `idnott` int(11) NOT NULL,
  `fnot` date NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `curalunots`
--

INSERT INTO `curalunots` (`id`, `idcuralu`, `idnott`, `fnot`, `obs`) VALUES
(1, 1, 2, '1970-01-01', 'Le fue bien'),
(2, 3, 1, '1969-12-31', ''),
(4, 4, 1, '2014-10-17', ''),
(5, 5, 1, '1969-12-31', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curalus`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `curalus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcur` int(11) NOT NULL,
  `idper` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `curalus`
--

INSERT INTO `curalus` (`id`, `idcur`, `idper`) VALUES
(1, 2, 15),
(2, 7, 1),
(3, 7, 43),
(4, 7, 5),
(5, 7, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curdocs`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `curdocs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcur` int(11) NOT NULL,
  `idper` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `curdocs`
--

INSERT INTO `curdocs` (`id`, `idcur`, `idper`) VALUES
(3, 7, 35),
(2, 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curs`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `curs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cur` varchar(60) NOT NULL,
  `plan` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `curs`
--

INSERT INTO `curs` (`id`, `cur`, `plan`) VALUES
(2, '2Â° AÃ±o', 'Plan_2014_2A.pdf'),
(3, '3Â° AÃ±o', 'Plan_2014_3A.pdf'),
(4, '4Â° AÃ±o', 'Plan_2014_4A.pdf'),
(5, '5Â° AÃ±o', 'Plan_2014_5A.pdf'),
(7, '1Â° AÃ±o', 'Plan_2014_1A.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curtems`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `curtems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idcur` int(11) NOT NULL,
  `ftem` date NOT NULL,
  `curtem` text NOT NULL,
  `est` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `curtems`
--

INSERT INTO `curtems` (`id`, `idcur`, `ftem`, `curtem`, `est`) VALUES
(1, 7, '1970-01-01', 'Tema NÂ° 1 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A odio quae temporibus consequuntur, repellendus rem illum officia tempora omnis nisi, facilis eum, animi veritatis ex sit. Asperiores debitis cumque id. ', 'Terminado'),
(2, 7, '1970-01-01', 'Tema NÂ° 2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. A odio quae temporibus consequuntur, repellendus rem illum officia tempora omnis nisi, facilis eum, animi veritatis ex sit. Asperiores debitis cumque id.', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcs`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `funcs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `func` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `funcs`
--

INSERT INTO `funcs` (`id`, `func`) VALUES
(1, 'Alumnos'),
(2, 'Docente'),
(3, 'Tutor'),
(4, 'Adminitrativo'),
(5, 'dfeferf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notts`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `notts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nott` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `notts`
--

INSERT INTO `notts` (`id`, `nott`) VALUES
(1, 'Aprobado'),
(2, 'Recupera'),
(3, 'No Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfuncs`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `perfuncs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idper` int(11) NOT NULL,
  `idfunc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pers`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 13-06-2017 a las 13:39:14
--

CREATE TABLE IF NOT EXISTS `pers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ape` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `doct` varchar(5) NOT NULL,
  `docn` varchar(11) NOT NULL,
  `fnac` date NOT NULL,
  `domi` varchar(70) NOT NULL,
  `telf` varchar(30) NOT NULL,
  `telc` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fb` varchar(60) NOT NULL,
  `obs` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Volcado de datos para la tabla `pers`
--

INSERT INTO `pers` (`id`, `ape`, `nom`, `doct`, `docn`, `fnac`, `domi`, `telf`, `telc`, `email`, `fb`, `obs`) VALUES
(1, 'MONLA', 'Ricardo', 'DNI', '25.550.903', '1977-04-06', 'Casa de 1235', 'w238472947 242704', '203948204 485', 'sdoisfj@gmail.om', '', ''),
(3, 'LOPEZ', 'Ricardo', 'DNI', '12345678', '2005-01-01', 'Csa 45, B| Hospital', 'tf2222222222222222', 'tc3333333333333333', 'em444444444444444', 'fb5555555555555555', ''),
(5, 'ARMADA', 'Miguel Angel', 'DNI', '18.207.368', '1900-01-00', ', , , , , , , ', '0380 - 154557698', '0380 - 154557698', 'marmada@unlar.edu.ar', '', ''),
(6, 'CAMARGO', 'Marcelo', 'DNI', '14.729.630', '1900-01-00', ', , , , , , , ', '0380 - 465859', '0380 - 465859', 'mcamargo100@gmail.com', '', ''),
(7, 'COLOMBO', 'Juan Carlos', 'DNI', '5.396.271', '1900-01-00', ', , , , , , , ', '0381 - 154989648', '0381 - 154989648', 'iconerjcc@arnet.com.ar', '', ''),
(8, 'LOZDAN', 'Manuel Claudio', 'DNI', '23.016.464', '1973-02-20', ', , , , , , , ', '0380 - 154527631', '0380 - 154527631', 'utnlozdan@yahoo.com.ar', '', ''),
(9, 'MALDONADO', 'Ricardo FabiÃ¡n', 'DNI', '21.567.153', '1970-03-28', ', , , , , , , ', '0380 - 154510283', '0380 - 154510283', 'rfmaldonado@gmail.com', '', ''),
(10, 'MARINELLI', 'Humberto Ernesto', 'DNI', '11.859.253', '1955-08-07', ', , , , , , , ', '0380 - 154686420', '0380 - 154686420', 'hmarinelli.utn@gmail.com', '', ''),
(11, 'ORTEGA', 'Jorge Lauro', 'LE', '7.843.512', '1949-12-24', ', , , , , , , ', '0380 - 4462866', '0380 - 4462866', 'utnlrjortega@yahoo.com', '', ''),
(12, 'PEROSIO', 'Angel Leonardo', 'DNI', '17.983.280', '1970-01-01', ', , , , , , , ', '0380 - 154682995', '0380 - 154682995', 'leonardoperosio@gmail.com', '', ''),
(13, 'SANGUEDOLCE', 'JosÃ© NicolÃ¡s', 'DNI', '21.357.543', '1969-12-07', ', , , , , , , ', '0380 - 154551741', '0380 - 154551741', 'josesanguedolce@yahoo.com.ar', '', ''),
(14, 'GASPANELLO AFUR', 'Juan JosÃ©', 'DNI', '34.061.507', '1970-01-01', ', , , , , , , ', '0380 - 154447001', '0380 - 154447001', 'juangaspanello@hotmail.com', '', ''),
(15, 'MORALES', 'Marcelo Alejandro', 'DNI', '33.061.557', '1900-01-00', ', , , , , , , ', '0380 - 154404952', '0380 - 154404952', 'morales.marcelo@hotmail.com', '', ''),
(16, 'MERCADO', 'Manuel Eduardo', 'DNI', '13.694.507', '1960-01-14', ', , , , , , , ', '0380 - 154686029', '0380 - 154686029', 'mmercadoutnlr@yahoo.com.ar', '', ''),
(17, 'NIETO', 'Diana Elizabeth', 'DNI', '17.037.630', '1964-10-10', 'R. Fournier Esq. Los Olmos, , , , Capital, La Rioja, , ', '0380 4435116 - 154440874', '0380 4435116 - 154440874', 'arqdech64@hotmail.com', '', ''),
(18, 'NIETO', 'JosÃ© NicolÃ¡s', 'DNI', '17.129.120', '1964-10-28', ', , , , , , , ', '3804 - 154675226', '3804 - 154675226', 'jossennieto@hotmail.com', '', ''),
(19, 'PAEZ', 'Juan Ismael', 'DNI', '17.333.114', '1964-07-16', ', , , , , , , ', '0380 - 154593203', '0380 - 154593203', 'juanismaelpaez@yahoo.com.ar', '', ''),
(20, 'PEÃ‘A POLLASTRI', 'HÃ©ctor JoaquÃ­n', 'DNI', '16.868.909', '1964-05-19', 'Reconquista, 5, , Vargas, Capital, La Rioja, , ', '0380 4432823 - 154391977', '0380 4432823 - 154391977', 'hpollastri@gmail.com', '', ''),
(21, 'MALDONADO', 'NoemÃ­ Graciela', 'DNI', '11.846.724', '1970-01-01', 'Olegario Andrade, 56 , 5519, , Glleï¿½, Mendoza, , ', '0261 4321223 - 15244551', '0261 4321223 - 15244551', 'mgm@frm.utn.edu.ar', '', ''),
(22, 'CAMPRA', 'RaÃ¹l Juan', 'DNI', '7.976.005', '1970-01-01', 'Romagaza , 665, , , , , , ', '0351 4603533 - 155986028', '0351 4603533 - 155986028', 'campras@yahoo.com', '', ''),
(23, 'TREVIÃ‘O', 'Antonio JosÃ©', 'DNI', '8.645.226', '1970-01-01', 'Fragueiru , 2386 , , , , CÃ³rdoba, , ', '0351 4715041 - 155332186', '0351 4715041 - 155332186', 'atrevino@electronica.frc.utn.edu.ar', '', ''),
(24, 'TORNELLO', 'Miguel Eduardo', 'DNI', '11.329.243', '1970-01-01', 'Lamadrid, 1376 (5519), , , GuaimallÃ©n, Mendoza, , ', '0261 4319064 - 156565576', '0261 4319064 - 156565576', 'mtornello@frm.utn.edu.ar', '', ''),
(25, 'GARCIA GEI', 'Daniel Alberto', 'DNI', '8.456.633', '1970-01-01', 'Juan B. Justo, 57 , , , Godoy Cruz, Mendoza, Argentina, ', '0261 4181102', '0261 4181102', 'dgarciagei@gmail.com', '', ''),
(26, 'BORETTO', 'NÃ©stor E.', 'DNI', '6.895.349', '0000-00-00', 'San Juan, 646, , , Godoy Cruz, Mendoza, , ', '0261 4523250', '0261 4523250', 'nbaretto@gmail.com', '', ''),
(27, 'MATTOLINI', 'MiguÃ©l Angel', 'DNI', '8.149.620', '1970-01-01', 'El Cuyano, 3204 , , , Luzuriaga , Mendoza, , ', '0261 4978058', '0261 4978058', 'mattolinimiguel@speedy.com.ar', '', ''),
(28, 'GONZALEZ', 'Adolfo Florentino', 'LE', '8.146.845', '1970-01-01', 'Blanco Escalada, 2428 (5547), , , Godoy Cruz, Mendoza, , ', '0261 4273602 - 156259725', '0261 4273602 - 156259725', 'adolfgon@speedy.com.ar', '', ''),
(29, 'BARTOLOMEO', 'Mario Victorio', 'DNI', '10.564.866', '1970-01-01', 'Obispo Salguero, 783, Piso NÂº 14, , , , , ', '0351 4698114 - 156686498', '0351 4698114 - 156686498', 'mbartolomeo21@gmail.com', '', ''),
(30, 'BORELLO', 'Roberto Rene', 'DNI', '13.426.338', '1970-01-01', 'Duarte Quiroz, 4254, Block NÂº4, Piso NÂº 3, , , , , ', '0351 4841098 - 156546235', '0351 4841098 - 156546235', 'robertoborello@hotmail.com', '', ''),
(31, 'QUINTERO', 'ClÃ¡udia NoemÃ­', 'DNI', '17.408.402', '1965-02-25', ', , Casa NÂº 25, JardÃ­n EspaÃ±ol, Capital, La Rioja, , ', '0380 - 154662347', '0380 - 154662347', 'ingclaudiaquintero@yahoo.com.a', '', ''),
(32, 'FARIAS TORRES', 'Eduardo AdriÃ¡n', 'DNI', '17.408.266', '1965-02-02', 'Santa FÃ©, 298, , , , La Rioja, Argentina, ', '0380 4427197 - 154662571', '0380 4427197 - 154662571', 'ing.afarias10@yahoo.com.ar', '', ''),
(35, 'MACCHI', 'Carlos Jorge', 'DNI', '14.862.179', '1962-06-05', 'Curuzu CuatiÃ¡, 4411, , , Capital, La Rioja, , ', '0380 4451832 - 154350045', '0380 4451832 - 154350045', 'carlosjmacchi2011@gmail.com', '', ''),
(36, 'ESCUDERO', 'Jorge RubÃ©n', 'DNI', '20.253.755', '1968-07-01', '29 de Octubre, 58, , Vargas, Capital, La Rioja, Argentina, ', '0380 4464940 - 154549966', '0380 4464940 - 154549966', 'mashaescu@gmail.com', '', ''),
(38, 'PARCO PARISI', 'Enzo JosÃ© NicolÃ¡s', 'DNI', '27.052.086', '1979-01-01', 'Corrientes, 712, , Centro, Capital, La Rioja, , ', '0380 4421638 - 154559407', '0380 4421638 - 154559407', 'enzoparcoparisi@yahoo.com.ar', '', ''),
(39, 'DIAZ', 'RaÃºl NicolÃ¡s', 'DNI', '13.694.214', '1959-07-05', 'Alberdi Esq. Avellaneda, 201 , , Centro, Capital, La Rioja, Argentina,', '0380 4435658 - 154539359', '0380 4435658 - 154539359', 'rauldiaz2006@hotmail.com', '', ''),
(40, 'TORRES', 'Pablo Francisco', 'DNI', '17.245.762', '1964-12-02', ', , Casa 29, Manzana 763, Mis MontaÃ±as, Capital, La Rioja, , ', '0380 4490240 - 154402354', '0380 4490240 - 154402354', 'ingpablotorres@yahoo.com.ar', '', ''),
(42, 'SIMONE', 'Dante Agustin', 'DNI', '12.851.151', '1959-03-11', 'Rosa Santirso, 617, , 25 de Mayo, , , , ', '0380 4433715 - 154687516', '0380 4433715 - 154687516', 'dsimone@aa2000.com.ar', '', ''),
(43, 'KOBER', 'Adela Elizabeth', 'DNI', '30.311.006', '1900-01-00', ', , , , , , , ', '0380 - 154526028', '0380 - 154526028', 'ing.kober@gmail.com', '', ''),
(44, 'PEÃ‘ALOZA', 'Oscar Angel', 'DNI', '13.682.635', '1959-09-25', ', , , , , , , ', '0380 - 154675904', '0380 - 154675904', 'opaloza@yahoo.com.ar', '', ''),
(47, 'CARRIZO', 'RamÃ³n De La Cruz', 'DNI', '14.005.254', '1960-12-09', ', , , , , , , ', '0380 4454055 - 154599969', '0380 4454055 - 154599969', 'rccarrizo@unlar.edu.ar', '', ''),
(48, 'LOPEZ', 'Alberto Daniel', 'DNI', '17.037.381', '1964-07-30', ', , , , , , , ', '0380 - 154524000 ', '0380 - 154524000 ', 'al.lo@hotmail.es', '', ''),
(49, 'STRAFFEZA ARNEDO', 'Felix Manuel', 'DNI', '24.579.456', '1975-07-13', 'Justo JosÃ© de Urquiza, 751, , Centro, Capital, La Rioja, , ', '0380 4426455 - 154350477', '0380 4426455 - 154350477', 'fmstrafeza@yahoo.com.ar', '', ''),
(50, 'TOLEDO MERCADO', 'Mariel Luciana', 'DNI', '31.430.460', '0000-00-00', 'ChaÃ±ar; planta Baja Dpto. 1, 2761, , Cooperativa Canal 9, la Rioja, L', '380 468 0539', '380 468 0539', 'lucianatolmer@hotmail.com', '', ''),
(52, 'VARGAS', 'Enzo', 'DNI', '24.360.933', '0000-00-00', 'Santa Cruz, 569, , San MartÃ­n, Capital, La Rioja, Argentina, 5300', '3804258813', '3804258813', 'licvargas@yahoo.com.ar', '', ''),
(53, 'GALLARDO', 'Oscar Francisco', 'DNI', '20.543.070', '0000-00-00', 'Av. Alem, 2492, Sub secreatario AcadÃ©mico, Av. Alem, Capital, La Rioj', '3804228474', '3804228474', 'ingofgallardo@gmail.com', '', ''),
(54, 'TORRES', 'GermÃ¡n NicolÃ¡s', 'DNI', '24.102.366', '0000-00-00', 'Av. Santa Rosa, 14, , Urbano #3, Capital, La Rioja, Argentina, 5300', '3804615817', '3804615817', 'ggerman1975@hotmail.com', '', ''),
(55, 'aTIMOFIEU', 'AndrÃ©s', 'DNI', '27075204', '1979-06-02', 'jjj', '0380 442059 - 445879', '0380 - 154254899', 'timo@yahoo.com', 'rmonla', 'sdljhdhwkjhdiwhonla,c dlhwld sdcijwlfkjsedd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertuts`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 12-06-2017 a las 21:55:40
--

CREATE TABLE IF NOT EXISTS `pertuts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpera` int(11) NOT NULL,
  `idpert` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `pertuts`
--

INSERT INTO `pertuts` (`id`, `idpera`, `idpert`) VALUES
(1, 1, 28),
(2, 1, 22),
(3, 43, 53);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usrs`
--
-- Creación: 12-06-2017 a las 21:55:40
-- Última actualización: 13-06-2017 a las 13:17:10
--

CREATE TABLE IF NOT EXISTS `usrs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(20) NOT NULL,
  `idper` int(11) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `perf` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usrs`
--

INSERT INTO `usrs` (`id`, `usr`, `idper`, `pass`, `perf`) VALUES
(2, 'rmonla', 1, '1e04426a0d725e36b07b3e80bdce591b', 1),
(3, 'profesor', 3, '', 2),
(4, 'director', 29, '', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
