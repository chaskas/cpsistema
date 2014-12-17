-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-12-2014 a las 01:50:38
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `tipicp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `idCategorias` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre_Categoria` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Orden` int(10) DEFAULT NULL,
  `Publicado` tinyint(1) DEFAULT '1',
  `Borrado` tinyint(1) DEFAULT '0',
  `Creado` datetime DEFAULT CURRENT_TIMESTAMP,
  `Actualizado` datetime DEFAULT NULL,
  `Categorias_Parent_id` int(10) DEFAULT '0',
  PRIMARY KEY (`idCategorias`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`idCategorias`, `Nombre_Categoria`, `Orden`, `Publicado`, `Borrado`, `Creado`, `Actualizado`, `Categorias_Parent_id`) VALUES
(3, 'padrisimo2', NULL, 1, 0, '2014-12-01 00:00:00', '2014-12-16 03:33:18', 4),
(4, 'madrisima25', NULL, 0, 0, '2014-12-10 09:03:38', '2014-12-16 03:17:30', 3),
(5, 'sdfsdf', 0, 0, 0, '2014-12-10 09:09:00', '2014-12-16 03:17:30', 6),
(6, 'hola', 0, 1, 0, '2014-12-11 22:27:14', '2014-12-16 03:17:30', 3),
(7, 'sadasdasd', NULL, 1, 0, '2014-12-15 05:12:01', '2014-12-16 03:17:48', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE IF NOT EXISTS `comuna` (
  `idComuna` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre_Comuna` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Provincia_id` int(10) NOT NULL,
  PRIMARY KEY (`idComuna`),
  KEY `fk_Comuna_Provincia1_idx` (`Provincia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=346 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `idContactos` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Clave Primaria Tabla Contactos',
  `Mensaje` text COLLATE utf8_spanish_ci COMMENT 'Contenido dek Mensaje',
  `Asunto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL COMMENT 'Asunto del Mensaje',
  `Leido` tinyint(1) DEFAULT NULL COMMENT 'Estado del Mensaje : No Leido, Leido',
  `Fecha` datetime DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha del Mensaje',
  `cruge_user_Prov_id` int(11) NOT NULL COMMENT 'Id de usuario proveedor, Clave Foranea Tabla cruge_user',
  `cruge_user_Empr_id` int(11) NOT NULL COMMENT 'Id de Usuario Empresa Clave Foranea Tabla cruge_user',
  PRIMARY KEY (`idContactos`),
  KEY `fk_Contactos_cruge_user1_idx` (`cruge_user_Prov_id`),
  KEY `fk_Contactos_cruge_user2_idx` (`cruge_user_Empr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE IF NOT EXISTS `cotizacion` (
  `idCotizacion` int(10) NOT NULL AUTO_INCREMENT,
  `FechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaRevalidacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaVenc` datetime DEFAULT NULL,
  `cruge_user_Prov_ id` int(11) NOT NULL,
  `cruge_user_Empr_ id` int(11) NOT NULL,
  PRIMARY KEY (`idCotizacion`),
  KEY `fk_Cotizacion_cruge_user1_idx` (`cruge_user_Empr_ id`),
  KEY `fk_Cotizacion_cruge_user2_idx` (`cruge_user_Prov_ id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authassignment`
--

CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authassignment`
--

INSERT INTO `cruge_authassignment` (`userid`, `bizrule`, `data`, `itemname`) VALUES
(1, NULL, 'N;', 'Administrador'),
(2, NULL, 'N;', 'invitados'),
(18, NULL, 'N;', 'Administrador'),
(19, NULL, 'N;', 'Registrado'),
(20, NULL, 'N;', 'Registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitem`
--

CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_fieldsadminupdate', 0, '', NULL, 'N;'),
('action_ui_rbacajaxassignment', 0, '', NULL, 'N;'),
('action_ui_rbacajaxsetchilditem', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemchilditems', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemcreate', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemdelete', 0, '', NULL, 'N;'),
('action_ui_rbacauthitemupdate', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_rbaclistroles', 0, '', NULL, 'N;'),
('action_ui_rbacusersassignments', 0, '', NULL, 'N;'),
('action_ui_sessionadmin', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('Administrador', 2, '', '', 'N;'),
('Bronce', 2, 'Proveedor Con Pack Bronce', '', 'N;'),
('cms', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'D:\\xampp1.8.3\\htdocs\\yiicmsapp\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;'),
('Gratis', 2, 'Proveedor sin Plan', '', 'N;'),
('invitados', 2, 'rol para no registrados', '', 'N;'),
('manage', 0, '', NULL, 'N;'),
('Oro', 2, 'Proveedor Con Pack Oro', '', 'N;'),
('Plata', 2, 'Proveedor Con Pack Plata', '', 'N;'),
('Registrado', 2, 'Usuario registrado', '', 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitemchild`
--

INSERT INTO `cruge_authitemchild` (`parent`, `child`) VALUES
('invitados', 'action_site_error'),
('Oro', 'action_site_error'),
('invitados', 'action_site_index'),
('Oro', 'action_site_index'),
('invitados', 'action_site_login'),
('Oro', 'action_site_login'),
('invitados', 'action_site_logout'),
('Oro', 'action_site_logout'),
('invitados', 'controller_site'),
('Oro', 'controller_site');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_field`
--

CREATE TABLE IF NOT EXISTS `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_field`
--

INSERT INTO `cruge_field` (`idfield`, `fieldname`, `longname`, `position`, `required`, `fieldtype`, `fieldsize`, `maxlength`, `showinreports`, `useregexp`, `useregexpmsg`, `predetvalue`) VALUES
(1, 'tipoUsuario', 'Tipo', 0, 1, 3, 20, 45, 0, '', '', 0x312c5265676973747261646f0d0a322c50726f766565646f7220476f6c640d0a332c50726f766565646f722053696c76650d0a342c50726f766565646f722046726565);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_fieldvalue`
--

INSERT INTO `cruge_fieldvalue` (`idfieldvalue`, `iduser`, `idfield`, `value`) VALUES
(1, 20, 1, 0x30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_session`
--

CREATE TABLE IF NOT EXISTS `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=151 ;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1416478678, 1416480478, 0, '::1', 1, 1416478678, 1416479866, '::1'),
(2, 1, 1416479889, 1416481689, 0, '::1', 1, 1416479889, 1416479909, '::1'),
(3, 1, 1416479926, 1416481726, 0, '::1', 1, 1416479926, NULL, NULL),
(4, 1, 1416482461, 1416484261, 0, '::1', 1, 1416482461, 1416482787, '::1'),
(5, 1, 1416482789, 1416484589, 0, '::1', 1, 1416482789, NULL, NULL),
(6, 1, 1416485875, 1416487675, 0, '::1', 1, 1416485875, 1416486542, '::1'),
(7, 1, 1416486544, 1416488344, 0, '::1', 1, 1416486544, NULL, NULL),
(8, 1, 1416492079, 1416493879, 0, '::1', 1, 1416492079, NULL, NULL),
(9, 1, 1416792863, 1416794663, 0, '::1', 1, 1416792863, 1416792869, '::1'),
(10, 1, 1416809383, 1416811183, 0, '::1', 1, 1416809383, 1416809425, '::1'),
(11, 1, 1416811670, 1416813470, 1, '::1', 1, 1416811670, NULL, NULL),
(12, 1, 1416814321, 1416816121, 0, '::1', 1, 1416814321, 1416815523, '::1'),
(13, 1, 1416815525, 1416817325, 0, '::1', 1, 1416815525, 1416815554, '::1'),
(14, 1, 1416815566, 1416817366, 0, '::1', 1, 1416815566, NULL, NULL),
(15, 1, 1416818900, 1416820700, 0, '::1', 2, 1416819635, NULL, NULL),
(16, 1, 1416820732, 1416822532, 1, '::1', 1, 1416820732, NULL, NULL),
(17, 1, 1417067343, 1417069143, 0, '::1', 1, 1417067343, NULL, NULL),
(18, 1, 1417073330, 1417075130, 0, '::1', 1, 1417073330, NULL, NULL),
(19, 1, 1417091432, 1417093232, 1, '::1', 1, 1417091432, NULL, NULL),
(20, 1, 1417681899, 1417683699, 0, '::1', 1, 1417681899, NULL, NULL),
(21, 1, 1417693246, 1417695046, 0, '::1', 2, 1417693478, NULL, NULL),
(22, 1, 1417697103, 1417698903, 0, '::1', 2, 1417697885, NULL, NULL),
(23, 1, 1417710488, 1417712288, 0, '::1', 1, 1417710488, NULL, NULL),
(24, 1, 1417727907, 1417729707, 0, '::1', 2, 1417727914, NULL, NULL),
(25, 1, 1417730543, 1417732343, 0, '::1', 1, 1417730543, NULL, NULL),
(26, 1, 1417732861, 1417734661, 0, '::1', 1, 1417732861, 1417733617, '::1'),
(27, 1, 1417733619, 1417735419, 0, '::1', 1, 1417733619, 1417733634, '::1'),
(28, 18, 1417733641, 1417735441, 0, '::1', 3, 1417734052, NULL, NULL),
(29, 18, 1417735501, 1417737301, 1, '::1', 1, 1417735501, NULL, NULL),
(30, 1, 1417736279, 1417738079, 0, '::1', 1, 1417736279, NULL, NULL),
(31, 1, 1417743832, 1417745632, 1, '::1', 1, 1417743832, NULL, NULL),
(32, 1, 1417746168, 1417747968, 1, '::1', 2, 1417746408, NULL, NULL),
(33, 1, 1417748231, 1417750031, 0, '::1', 3, 1417749241, NULL, NULL),
(34, 18, 1417748242, 1417750042, 0, '::1', 1, 1417748242, 1417749238, '::1'),
(35, 18, 1417749331, 1417751131, 0, '::1', 2, 1417750044, 1417750044, '::1'),
(36, 18, 1417750098, 1417751898, 0, '::1', 1, 1417750098, NULL, NULL),
(37, 1, 1417753240, 1417755040, 0, '::1', 1, 1417753240, NULL, NULL),
(38, 18, 1417755676, 1417757476, 1, '::1', 1, 1417755676, NULL, NULL),
(39, 1, 1417756959, 1417758759, 0, '::1', 1, 1417756959, 1417758257, '::1'),
(40, 18, 1417758277, 1417760077, 0, '::1', 2, 1417759636, 1417759658, '::1'),
(41, 1, 1417759665, 1417761465, 0, '::1', 1, 1417759665, 1417759740, '::1'),
(42, 18, 1417759748, 1417761548, 0, '::1', 1, 1417759748, NULL, NULL),
(43, 18, 1417762306, 1417764106, 0, '::1', 1, 1417762306, NULL, NULL),
(44, 18, 1417764761, 1417766561, 0, '::1', 1, 1417764761, NULL, NULL),
(45, 18, 1417767717, 1417769517, 0, '::1', 1, 1417767717, NULL, NULL),
(46, 18, 1417769763, 1417771563, 0, '::1', 1, 1417769763, 1417770158, '::1'),
(47, 1, 1417770176, 1417771976, 0, '::1', 1, 1417770176, 1417770257, '::1'),
(48, 18, 1417770262, 1417772062, 0, '::1', 1, 1417770262, NULL, NULL),
(49, 18, 1417786851, 1417788651, 0, '::1', 1, 1417786851, NULL, NULL),
(50, 18, 1417792065, 1417793865, 0, '::1', 1, 1417792065, NULL, NULL),
(51, 18, 1417795041, 1417796841, 0, '::1', 4, 1417796470, NULL, NULL),
(52, 18, 1417797655, 1417799455, 0, '::1', 1, 1417797655, NULL, NULL),
(53, 18, 1417803981, 1417805781, 0, '::1', 1, 1417803981, NULL, NULL),
(54, 18, 1417986796, 1417988596, 0, '::1', 1, 1417986796, NULL, NULL),
(55, 18, 1418006484, 1418008284, 0, '::1', 1, 1418006484, NULL, NULL),
(56, 18, 1418009666, 1418011466, 0, '::1', 1, 1418009666, NULL, NULL),
(57, 18, 1418011471, 1418013271, 0, '::1', 3, 1418011693, NULL, NULL),
(58, 18, 1418014382, 1418016182, 0, '::1', 2, 1418015898, NULL, NULL),
(59, 18, 1418016531, 1418018331, 0, '::1', 1, 1418016531, NULL, NULL),
(60, 18, 1418018440, 1418020240, 0, '::1', 1, 1418018440, NULL, NULL),
(61, 18, 1418020437, 1418022237, 0, '::1', 1, 1418020437, NULL, NULL),
(62, 18, 1418022251, 1418024051, 0, '::1', 1, 1418022251, NULL, NULL),
(63, 1, 1418024225, 1418026025, 0, '::1', 1, 1418024225, 1418024295, '::1'),
(64, 18, 1418024380, 1418026180, 0, '::1', 1, 1418024380, NULL, NULL),
(65, 18, 1418028013, 1418029813, 0, '::1', 1, 1418028013, NULL, NULL),
(66, 18, 1418177363, 1418179163, 0, '::1', 1, 1418177363, NULL, NULL),
(67, 18, 1418182597, 1418184397, 0, '::1', 1, 1418182597, NULL, NULL),
(68, 18, 1418196610, 1418198410, 0, '::1', 1, 1418196610, NULL, NULL),
(69, 18, 1418198454, 1418200254, 0, '::1', 1, 1418198454, NULL, NULL),
(70, 18, 1418200487, 1418202287, 0, '::1', 1, 1418200487, NULL, NULL),
(71, 18, 1418202687, 1418204487, 0, '::1', 1, 1418202687, NULL, NULL),
(72, 18, 1418204532, 1418206332, 0, '::1', 1, 1418204532, NULL, NULL),
(73, 18, 1418206529, 1418208329, 0, '::1', 1, 1418206529, NULL, NULL),
(74, 18, 1418208371, 1418210171, 0, '::1', 1, 1418208371, NULL, NULL),
(75, 18, 1418210790, 1418212590, 0, '::1', 2, 1418211020, NULL, NULL),
(76, 18, 1418212597, 1418214397, 0, '::1', 1, 1418212597, NULL, NULL),
(77, 18, 1418214812, 1418216612, 0, '::1', 2, 1418214813, NULL, NULL),
(78, 18, 1418217153, 1418218953, 0, '::1', 1, 1418217153, NULL, NULL),
(79, 18, 1418220022, 1418221822, 0, '::1', 1, 1418220022, NULL, NULL),
(80, 18, 1418223314, 1418225114, 1, '::1', 2, 1418223315, NULL, NULL),
(81, 18, 1418228435, 1418230235, 0, '::1', 1, 1418228435, NULL, NULL),
(82, 18, 1418239252, 1418241052, 1, '::1', 1, 1418239252, NULL, NULL),
(83, 18, 1418273222, 1418275022, 0, '::1', 1, 1418273222, NULL, NULL),
(84, 18, 1418275675, 1418277475, 0, '::1', 1, 1418275675, NULL, NULL),
(85, 18, 1418278688, 1418280488, 0, '::1', 1, 1418278688, NULL, NULL),
(86, 18, 1418282709, 1418284509, 0, '::1', 1, 1418282709, NULL, NULL),
(87, 18, 1418288801, 1418290601, 0, '::1', 1, 1418288801, NULL, NULL),
(88, 18, 1418297988, 1418299788, 0, '::1', 1, 1418297988, NULL, NULL),
(89, 18, 1418326610, 1418328410, 0, '::1', 1, 1418326610, NULL, NULL),
(90, 18, 1418332481, 1418334281, 0, '::1', 1, 1418332481, NULL, NULL),
(91, 18, 1418335710, 1418337510, 0, '::1', 1, 1418335710, NULL, NULL),
(92, 18, 1418337645, 1418339445, 0, '::1', 1, 1418337645, NULL, NULL),
(93, 18, 1418339456, 1418341256, 0, '::1', 1, 1418339456, NULL, NULL),
(94, 18, 1418346482, 1418348282, 0, '::1', 1, 1418346482, NULL, NULL),
(95, 18, 1418348344, 1418350144, 0, '::1', 1, 1418348344, NULL, NULL),
(96, 18, 1418351585, 1418353385, 0, '::1', 2, 1418351617, NULL, NULL),
(97, 18, 1418353461, 1418355261, 0, '::1', 1, 1418353461, NULL, NULL),
(98, 18, 1418359604, 1418361404, 0, '::1', 1, 1418359604, NULL, NULL),
(99, 18, 1418361684, 1418363484, 0, '::1', 1, 1418361684, NULL, NULL),
(100, 18, 1418364219, 1418366019, 0, '::1', 1, 1418364219, NULL, NULL),
(101, 18, 1418366252, 1418368052, 0, '::1', 1, 1418366252, NULL, NULL),
(102, 18, 1418368108, 1418369908, 0, '::1', 1, 1418368108, NULL, NULL),
(103, 18, 1418370520, 1418372320, 0, '::1', 1, 1418370520, NULL, NULL),
(104, 18, 1418372628, 1418374428, 0, '::1', 1, 1418372628, NULL, NULL),
(105, 18, 1418374542, 1418376342, 0, '::1', 2, 1418374658, NULL, NULL),
(106, 18, 1418384239, 1418386039, 0, '::1', 1, 1418384239, NULL, NULL),
(107, 18, 1418386064, 1418387864, 0, '::1', 1, 1418386064, NULL, NULL),
(108, 18, 1418407008, 1418408808, 0, '::1', 1, 1418407008, NULL, NULL),
(109, 18, 1418413003, 1418414803, 0, '::1', 1, 1418413003, NULL, NULL),
(110, 18, 1418415233, 1418417033, 0, '::1', 1, 1418415233, NULL, NULL),
(111, 18, 1418417112, 1418418912, 0, '::1', 1, 1418417112, NULL, NULL),
(112, 18, 1418418918, 1418420718, 0, '::1', 1, 1418418918, NULL, NULL),
(113, 18, 1418422760, 1418424560, 0, '::1', 2, 1418423581, NULL, NULL),
(114, 18, 1418425456, 1418427256, 0, '::1', 1, 1418425456, NULL, NULL),
(115, 18, 1418427332, 1418429132, 0, '::1', 2, 1418427737, NULL, NULL),
(116, 18, 1418436074, 1418437874, 0, '::1', 1, 1418436074, NULL, NULL),
(117, 18, 1418438012, 1418439812, 0, '::1', 1, 1418438012, NULL, NULL),
(118, 18, 1418444694, 1418446494, 0, '::1', 1, 1418444694, NULL, NULL),
(119, 18, 1418448078, 1418449878, 0, '::1', 1, 1418448078, NULL, NULL),
(120, 18, 1418452556, 1418454356, 0, '::1', 1, 1418452556, NULL, NULL),
(121, 18, 1418454522, 1418456322, 0, '::1', 1, 1418454522, NULL, NULL),
(122, 18, 1418456827, 1418458627, 0, '::1', 1, 1418456827, NULL, NULL),
(123, 18, 1418458735, 1418460535, 0, '::1', 1, 1418458735, NULL, NULL),
(124, 18, 1418460815, 1418462615, 0, '::1', 1, 1418460815, NULL, NULL),
(125, 18, 1418463425, 1418465225, 0, '::1', 1, 1418463425, NULL, NULL),
(126, 18, 1418465356, 1418467156, 0, '::1', 1, 1418465356, NULL, NULL),
(127, 18, 1418467409, 1418469209, 0, '::1', 1, 1418467409, NULL, NULL),
(128, 18, 1418469273, 1418471073, 0, '::1', 1, 1418469273, NULL, NULL),
(129, 18, 1418471113, 1418472913, 0, '::1', 1, 1418471113, NULL, NULL),
(130, 18, 1418473578, 1418475378, 0, '::1', 1, 1418473578, NULL, NULL),
(131, 18, 1418476296, 1418478096, 0, '::1', 1, 1418476296, NULL, NULL),
(132, 18, 1418529379, 1418531179, 0, '::1', 1, 1418529379, NULL, NULL),
(133, 18, 1418531525, 1418533325, 0, '::1', 1, 1418531525, NULL, NULL),
(134, 18, 1418534755, 1418536555, 0, '::1', 1, 1418534755, NULL, NULL),
(135, 18, 1418607324, 1418610924, 0, '::1', 1, 1418607324, NULL, NULL),
(136, 18, 1418681201, 1418684801, 0, '::1', 1, 1418681201, NULL, NULL),
(137, 18, 1418692482, 1418696082, 0, '::1', 1, 1418692482, NULL, NULL),
(138, 18, 1418699837, 1418703437, 0, '::1', 1, 1418699837, NULL, NULL),
(139, 18, 1418704769, 1418708369, 0, '::1', 1, 1418704769, NULL, NULL),
(140, 18, 1418708523, 1418712123, 0, '::1', 1, 1418708523, NULL, NULL),
(141, 18, 1418712256, 1418715856, 0, '::1', 1, 1418712256, NULL, NULL),
(142, 18, 1418715882, 1418719482, 0, '::1', 1, 1418715882, NULL, NULL),
(143, 18, 1418720774, 1418724374, 0, '::1', 2, 1418723516, NULL, NULL),
(144, 18, 1418724991, 1418728591, 0, '::1', 1, 1418724991, NULL, NULL),
(145, 18, 1418733117, 1418736717, 0, '::1', 1, 1418733117, NULL, NULL),
(146, 18, 1418746282, 1418749882, 0, '::1', 1, 1418746282, NULL, NULL),
(147, 18, 1418750167, 1418753767, 0, '::1', 1, 1418750167, NULL, NULL),
(148, 18, 1418754798, 1418758398, 0, '::1', 1, 1418754798, NULL, NULL),
(149, 18, 1418758982, 1418762582, 0, '::1', 1, 1418758982, NULL, NULL),
(150, 18, 1418763604, 1418767204, 1, '::1', 1, 1418763604, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_system`
--

CREATE TABLE IF NOT EXISTS `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 60, 10, 1, -1, -1, 0, 0, 0, 0, '', 1, 'Registrado', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_user`
--

CREATE TABLE IF NOT EXISTS `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1418024225, 'webmaster', 'contacto@centralproveedores.cl', '71154121', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'nopassword', NULL, 1, 0, 0),
(18, 1417733533, NULL, 1418763604, 'admin', 'cafuentealbam@gmail.com', '71154121', 'ed30f99432fd28135834d01f4887db69', 1, 0, 0),
(19, 1417749471, NULL, NULL, 'registrado', 'registrado@cp.cl', '71154121', '7d0dfd6a1b3f8cf310464553e52cc8e8', 1, 0, 0),
(20, 1417798934, NULL, NULL, 'freeprov', 'test@test.cl', '987654321', 'fd2863deea5397a4f913623230f884ea', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadooc`
--

CREATE TABLE IF NOT EXISTS `estadooc` (
  `idEstadoOC` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre_Estado` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idEstadoOC`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `estadooc`
--

INSERT INTO `estadooc` (`idEstadoOC`, `Nombre_Estado`) VALUES
(1, 'Pendiente'),
(2, 'En Proceso'),
(3, 'Despachada'),
(4, 'Anulada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadostock`
--

CREATE TABLE IF NOT EXISTS `estadostock` (
  `idEstadoStock` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre_Estado` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Publicado` tinyint(1) NOT NULL DEFAULT '1',
  `Borrado` tinyint(1) unsigned zerofill NOT NULL DEFAULT '0',
  `Creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Actualizado` datetime DEFAULT NULL,
  PRIMARY KEY (`idEstadoStock`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estadostock`
--

INSERT INTO `estadostock` (`idEstadoStock`, `Nombre_Estado`, `Publicado`, `Borrado`, `Creado`, `Actualizado`) VALUES
(1, 'En Stock', 1, 0, '2014-12-03 00:00:00', NULL),
(2, 'Agotado', 1, 0, '2014-12-03 10:47:22', NULL),
(3, 'A Pedido', 1, 0, '2014-12-03 10:47:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacionpr`
--

CREATE TABLE IF NOT EXISTS `evaluacionpr` (
  `idEvaluacionPr` int(10) NOT NULL AUTO_INCREMENT,
  `TiempoRespuesta` tinyint(2) NOT NULL DEFAULT '0',
  `TiempoEnvio` tinyint(2) NOT NULL DEFAULT '0',
  `CalidadProd` tinyint(2) NOT NULL DEFAULT '0',
  `TiempoFact` tinyint(2) NOT NULL DEFAULT '0',
  `Comentario` text COLLATE utf8_spanish_ci,
  `Respuesta` text COLLATE utf8_spanish_ci,
  `OrdenCompra_id` int(10) NOT NULL,
  PRIMARY KEY (`idEvaluacionPr`),
  KEY `fk_EvaluacionPr_OrdenCompra1_idx` (`OrdenCompra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgenprod`
--

CREATE TABLE IF NOT EXISTS `imgenprod` (
  `idImgP` int(10) NOT NULL AUTO_INCREMENT,
  `Ruta` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Orden` int(10) NOT NULL DEFAULT '1',
  `Productos_id` int(10) NOT NULL,
  PRIMARY KEY (`idImgP`),
  KEY `fk_ImgP_Productos_idx` (`Productos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infodespacho`
--

CREATE TABLE IF NOT EXISTS `infodespacho` (
  `idInfoDespacho` int(10) NOT NULL AUTO_INCREMENT,
  `Primer_Nombre` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Apellido` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CodPostal` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Fono` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Comuna_id` int(10) NOT NULL,
  `cruge_user_Empr_id` int(11) NOT NULL,
  PRIMARY KEY (`idInfoDespacho`),
  KEY `fk_InfoDespacho_cruge_user1_idx` (`cruge_user_Empr_id`),
  KEY `fk_InfoDespacho_Comuna1_idx` (`Comuna_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcionespago`
--

CREATE TABLE IF NOT EXISTS `opcionespago` (
  `idOpcionesPago` int(10) NOT NULL AUTO_INCREMENT,
  `OpcionesPago_Nomb` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `OpcionesPago_Desc` text COLLATE utf8_spanish_ci COMMENT 'Descripción del medio de pago',
  `Publicado` tinyint(1) NOT NULL DEFAULT '1',
  `Borrado` tinyint(1) NOT NULL DEFAULT '0',
  `Creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Actualizado` datetime DEFAULT NULL,
  PRIMARY KEY (`idOpcionesPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordencompra`
--

CREATE TABLE IF NOT EXISTS `ordencompra` (
  `idOrdenCompra` int(10) NOT NULL AUTO_INCREMENT,
  `FechaCreacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Estado_Facturacion` tinyint(1) NOT NULL DEFAULT '0',
  `Numero_Factura` int(10) DEFAULT NULL,
  `Estado_Pago` tinyint(1) NOT NULL DEFAULT '0',
  `OpcionesPago_id` int(10) NOT NULL,
  `cruge_user_Prov_id` int(11) NOT NULL,
  `cruge_user_Empr_id` int(11) NOT NULL,
  `EstadoOC_id` int(10) NOT NULL DEFAULT '1',
  `InfoDespacho_id` int(10) NOT NULL,
  PRIMARY KEY (`idOrdenCompra`),
  KEY `fk_OrdenCompra_cruge_user1_idx` (`cruge_user_Empr_id`),
  KEY `fk_OrdenCompra_EstadoOC1_idx` (`EstadoOC_id`),
  KEY `fk_OrdenCompra_OpcionesPago1_idx` (`OpcionesPago_id`),
  KEY `fk_OrdenCompra_cruge_user1_idx1` (`cruge_user_Prov_id`),
  KEY `fk_OrdenCompra_InfoDespacho1_idx` (`InfoDespacho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordencompra_has_productos`
--

CREATE TABLE IF NOT EXISTS `ordencompra_has_productos` (
  `OrdenCompra_id` int(10) NOT NULL,
  `Productos_id` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL DEFAULT '1',
  `PrecioUnitario` int(10) DEFAULT NULL,
  `TiempoDespacho` int(10) DEFAULT NULL,
  `TipoDescId` int(10) DEFAULT NULL,
  PRIMARY KEY (`OrdenCompra_id`,`Productos_id`),
  KEY `fk_OrdenCompra_has_Productos_Productos1_idx` (`Productos_id`),
  KEY `fk_OrdenCompra_has_Productos_OrdenCompra1_idx` (`OrdenCompra_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preciohist`
--

CREATE TABLE IF NOT EXISTS `preciohist` (
  `idPrecioHist` int(10) NOT NULL AUTO_INCREMENT,
  `FechaIni` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaFin` datetime DEFAULT NULL,
  `Precio` int(10) NOT NULL,
  `CantMin` int(10) NOT NULL DEFAULT '1',
  `CantMax` int(10) NOT NULL DEFAULT '0',
  `Productos_id` int(10) NOT NULL,
  `TipoDesc_id` int(10) NOT NULL,
  PRIMARY KEY (`idPrecioHist`),
  KEY `fk_PrecioHist_Productos2_idx` (`Productos_id`),
  KEY `fk_PrecioHist_TipoDesc1_idx` (`TipoDesc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preciosdesc`
--

CREATE TABLE IF NOT EXISTS `preciosdesc` (
  `idPreciosDesc` int(10) NOT NULL AUTO_INCREMENT,
  `FechaIni` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `FechaFin` datetime DEFAULT NULL,
  `CantMin` int(10) NOT NULL DEFAULT '1',
  `CantMax` int(10) NOT NULL DEFAULT '0',
  `Precio` int(10) NOT NULL,
  `Productos_id` int(10) NOT NULL,
  `TipoDesc_id` int(10) NOT NULL,
  PRIMARY KEY (`idPreciosDesc`),
  KEY `fk_PreciosDesc_Productos1_idx` (`Productos_id`),
  KEY `fk_PreciosDesc_TipoDesc1_idx` (`TipoDesc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `idProductos` int(10) NOT NULL AUTO_INCREMENT,
  `Codigo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre_Producto` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci,
  `Marca` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Modelo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `CodModelo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Tamano` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Capacidad` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `TiempoDespacho` int(10) NOT NULL DEFAULT '1',
  `Stock` int(10) DEFAULT '1',
  `URLCatalogo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `PrecioNormal` int(10) NOT NULL,
  `PedMin` int(10) NOT NULL DEFAULT '1',
  `Visitado` int(10) NOT NULL DEFAULT '0',
  `Publicado` tinyint(1) NOT NULL DEFAULT '0',
  `Borrado` tinyint(1) NOT NULL DEFAULT '0',
  `Creado` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Actualizado` datetime DEFAULT NULL,
  `EstadoStock_id` int(10) NOT NULL,
  `cruge_user_Prov_id` int(11) NOT NULL COMMENT 'Id Usuario Proveedor, FK Tabla cruge_user',
  `Categorias_id` int(10) NOT NULL,
  PRIMARY KEY (`idProductos`),
  KEY `fk_Productos_EstadoStock1_idx` (`EstadoStock_id`),
  KEY `fk_Productos_cruge_user1_idx` (`cruge_user_Prov_id`),
  KEY `fk_Productos_Categorias1_idx` (`Categorias_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProductos`, `Codigo`, `Nombre_Producto`, `Descripcion`, `Marca`, `Modelo`, `CodModelo`, `Tamano`, `Capacidad`, `TiempoDespacho`, `Stock`, `URLCatalogo`, `PrecioNormal`, `PedMin`, `Visitado`, `Publicado`, `Borrado`, `Creado`, `Actualizado`, `EstadoStock_id`, `cruge_user_Prov_id`, `Categorias_id`) VALUES
(1, '1123', 'producto', 'descrpicion', 'chancho', '13231', '493216546', 'grande', '10 litros', 20, 10, '', 20000, 1, 0, 1, 0, '2014-12-16 02:45:53', '2014-12-16 15:08:02', 1, 18, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_cotizacion`
--

CREATE TABLE IF NOT EXISTS `productos_has_cotizacion` (
  `Productos_id` int(10) NOT NULL,
  `Cotizacion_id` int(10) NOT NULL,
  `Cantidad` int(10) NOT NULL DEFAULT '1',
  `PrecioUnitario` int(10) NOT NULL,
  `TiempoDesp` int(10) NOT NULL,
  PRIMARY KEY (`Productos_id`,`Cotizacion_id`),
  KEY `fk_Productos_has_Cotizacion_Cotizacion1_idx` (`Cotizacion_id`),
  KEY `fk_Productos_has_Cotizacion_Productos1_idx` (`Productos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `idProvincia` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre Provincia` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Region_id` int(10) NOT NULL,
  PRIMARY KEY (`idProvincia`),
  KEY `fk_Provincia_Region1_idx` (`Region_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `Nombre Provincia`, `Region_id`) VALUES
(1, 'Arica', 1),
(2, 'Parinacota', 1),
(3, 'Iquique', 2),
(4, 'El Tamarugal', 2),
(5, 'Antofagasta', 3),
(6, 'El Loa', 3),
(7, 'Tocopilla', 3),
(8, 'Chañaral', 4),
(9, 'Copiapó', 4),
(10, 'Huasco', 4),
(11, 'Choapa', 5),
(12, 'Elqui', 5),
(13, 'Limarí', 5),
(14, 'Isla de Pascua', 6),
(15, 'Los Andes', 6),
(16, 'Petorca', 6),
(17, 'Quillota', 6),
(18, 'San Antonio', 6),
(19, 'San Felipe de Aconcagua', 6),
(20, 'Valparaiso', 6),
(21, 'Chacabuco', 7),
(22, 'Cordillera', 7),
(23, 'Maipo', 7),
(24, 'Melipilla', 7),
(25, 'Santiago', 7),
(26, 'Talagante', 7),
(27, 'Cachapoal', 8),
(28, 'Cardenal Caro', 8),
(29, 'Colchagua', 8),
(30, 'Cauquenes', 9),
(31, 'Curicó', 9),
(32, 'Linares', 9),
(33, 'Talca', 9),
(34, 'Arauco', 10),
(35, 'Bio Bío', 10),
(36, 'Concepción', 10),
(37, 'Ñuble', 10),
(38, 'Cautín', 11),
(39, 'Malleco', 11),
(40, 'Valdivia', 12),
(41, 'Ranco', 12),
(42, 'Chiloé', 13),
(43, 'Llanquihue', 13),
(44, 'Osorno', 13),
(45, 'Palena', 13),
(46, 'Aisén', 14),
(47, 'Capitán Prat', 14),
(48, 'Coihaique', 14),
(49, 'General Carrera', 14),
(50, 'Antártica Chilena', 15),
(51, 'Magallanes', 15),
(52, 'Tierra del Fuego', 15),
(53, 'Última Esperanza', 15);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `idRegion` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre_Region` varchar(64) COLLATE utf8_spanish_ci NOT NULL,
  `Ordinal` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idRegion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`idRegion`, `Nombre_Region`, `Ordinal`) VALUES
(1, 'Arica y Parinacota', 'XV'),
(2, 'Tarapaca', 'I'),
(3, 'Antofagasta', 'II'),
(4, 'Atacama', 'III'),
(5, 'Coquimbo', 'IV'),
(6, 'Valparaiso', 'V'),
(7, 'Metropolitana de Santiago', 'RM'),
(8, 'Libertador General Bernardo OHiggins', 'VI'),
(9, 'Maule', 'VII'),
(10, 'Biobío', 'VIII'),
(11, 'La Araucanía', 'IX'),
(12, 'Los Ríos', 'XIV'),
(13, 'Los Lagos', 'X'),
(14, 'Aisén del General Carlos Ibáñez del Campo', 'XI'),
(15, 'Magallanes y de la Antártica Chilena', 'XII');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodesc`
--

CREATE TABLE IF NOT EXISTS `tipodesc` (
  `idTipoDesc` int(10) NOT NULL AUTO_INCREMENT,
  `Nombre_Tipo_Descuento` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `Publicado` tinyint(1) NOT NULL DEFAULT '1',
  `Borrado` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idTipoDesc`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipodesc`
--

INSERT INTO `tipodesc` (`idTipoDesc`, `Nombre_Tipo_Descuento`, `Publicado`, `Borrado`) VALUES
(1, '', 1, 0),
(2, '', 1, 0),
(3, '', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `yiilog`
--

CREATE TABLE IF NOT EXISTS `yiilog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `category` varchar(128) COLLATE utf8_spanish_ci DEFAULT NULL,
  `logtime` int(11) DEFAULT NULL,
  `message` text COLLATE utf8_spanish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `yiilog`
--

INSERT INTO `yiilog` (`id`, `level`, `category`, `logtime`, `message`) VALUES
(1, 'error', 'system.db.CDbCommand', 1418204293, 'CDbCommand::execute() failed: SQLSTATE[42S02]: Base table or view not found: 1146 Table ''tipicp.yiilog'' doesn''t exist. The SQL statement executed was: DELETE FROM `YiiLog` WHERE 0=1.\nin D:\\xampp1.8.3\\htdocs\\yiicmsapp\\index.php (12)'),
(2, 'error', 'exception.CHttpException.404', 1418699794, 'exception ''CHttpException'' with message ''El sistema no ha podido encontrar la acción "index" solicitada.'' in D:\\xampp1.8.3\\htdocs\\yiicmsapp\\framework\\web\\CController.php:483\nStack trace:\n#0 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\framework\\web\\CController.php(270): CController->missingAction('''')\n#1 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\framework\\web\\CWebApplication.php(282): CController->run('''')\n#2 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\framework\\web\\CWebApplication.php(141): CWebApplication->runController(''cruge'')\n#3 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\framework\\base\\CApplication.php(180): CWebApplication->processRequest()\n#4 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\protected\\components\\WebApplicationEndBehavior.php(25): CApplication->run()\n#5 [internal function]: WebApplicationEndBehavior->runEnd(''frontend'')\n#6 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\framework\\base\\CComponent.php(261): call_user_func_array(Array, Array)\n#7 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\index.php(12): CComponent->__call(''runEnd'', Array)\n#8 D:\\xampp1.8.3\\htdocs\\yiicmsapp\\index.php(12): CWebApplication->runEnd(''frontend'')\n#9 {main}\nREQUEST_URI=/yiicmsapp/index.php?r=cruge\n---');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `fk_Comuna_Provincia1` FOREIGN KEY (`Provincia_id`) REFERENCES `provincia` (`idProvincia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `fk_Contactos_cruge_user1` FOREIGN KEY (`cruge_user_Prov_id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Contactos_cruge_user2` FOREIGN KEY (`cruge_user_Empr_id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizacion`
--
ALTER TABLE `cotizacion`
  ADD CONSTRAINT `fk_Cotizacion_cruge_user1` FOREIGN KEY (`cruge_user_Empr_ id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Cotizacion_cruge_user2` FOREIGN KEY (`cruge_user_Prov_ id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authassignment`
--
ALTER TABLE `cruge_authassignment`
  ADD CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
  ADD CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evaluacionpr`
--
ALTER TABLE `evaluacionpr`
  ADD CONSTRAINT `fk_EvaluacionPr_OrdenCompra1` FOREIGN KEY (`OrdenCompra_id`) REFERENCES `ordencompra` (`idOrdenCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `imgenprod`
--
ALTER TABLE `imgenprod`
  ADD CONSTRAINT `fk_ImgP_Productos2` FOREIGN KEY (`Productos_id`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ordencompra`
--
ALTER TABLE `ordencompra`
  ADD CONSTRAINT `fk_OrdenCompra_cruge_user1` FOREIGN KEY (`cruge_user_Prov_id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrdenCompra_cruge_user10` FOREIGN KEY (`cruge_user_Empr_id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrdenCompra_EstadoOC1` FOREIGN KEY (`EstadoOC_id`) REFERENCES `estadooc` (`idEstadoOC`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrdenCompra_InfoDespacho1` FOREIGN KEY (`InfoDespacho_id`) REFERENCES `infodespacho` (`idInfoDespacho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrdenCompra_OpcionesPago1` FOREIGN KEY (`OpcionesPago_id`) REFERENCES `opcionespago` (`idOpcionesPago`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ordencompra_has_productos`
--
ALTER TABLE `ordencompra_has_productos`
  ADD CONSTRAINT `fk_OrdenCompra_has_Productos_OrdenCompra1` FOREIGN KEY (`OrdenCompra_id`) REFERENCES `ordencompra` (`idOrdenCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_OrdenCompra_has_Productos_Productos1` FOREIGN KEY (`Productos_id`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preciohist`
--
ALTER TABLE `preciohist`
  ADD CONSTRAINT `fk_PrecioHist_Productos2` FOREIGN KEY (`Productos_id`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PrecioHist_TipoDesc1` FOREIGN KEY (`TipoDesc_id`) REFERENCES `tipodesc` (`idTipoDesc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `preciosdesc`
--
ALTER TABLE `preciosdesc`
  ADD CONSTRAINT `fk_PreciosDesc_Productos1` FOREIGN KEY (`Productos_id`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PreciosDesc_TipoDesc1` FOREIGN KEY (`TipoDesc_id`) REFERENCES `tipodesc` (`idTipoDesc`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Categorias1` FOREIGN KEY (`Categorias_id`) REFERENCES `categorias` (`idCategorias`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_cruge_user1` FOREIGN KEY (`cruge_user_Prov_id`) REFERENCES `cruge_user` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_EstadoStock1` FOREIGN KEY (`EstadoStock_id`) REFERENCES `estadostock` (`idEstadoStock`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_cotizacion`
--
ALTER TABLE `productos_has_cotizacion`
  ADD CONSTRAINT `fk_Productos_has_Cotizacion_Cotizacion1` FOREIGN KEY (`Cotizacion_id`) REFERENCES `cotizacion` (`idCotizacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_has_Cotizacion_Productos1` FOREIGN KEY (`Productos_id`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `fk_Provincia_Region1` FOREIGN KEY (`Region_id`) REFERENCES `region` (`idRegion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
