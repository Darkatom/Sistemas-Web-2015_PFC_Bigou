
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2015 a las 23:28:19
-- Versión del servidor: 10.0.20-MariaDB
-- Versión de PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `u623652398_bigou`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action` enum('register','logged_in','logout','new_photo','new_album','delete_photo','delete_album','change_password','deleted_account') COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=184 ;

--
-- Volcado de datos para la tabla `action`
--

INSERT INTO `action` (`id`, `nick`, `email`, `ip`, `action`, `date`) VALUES
(55, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'new_photo', '2015-11-25 19:25:56'),
(54, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'new_album', '2015-11-25 19:25:56'),
(53, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'register', '2015-11-25 19:25:56'),
(52, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'register', '2015-11-25 19:24:42'),
(51, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'register', '2015-11-25 19:23:08'),
(50, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'register', '2015-11-25 19:21:57'),
(49, 'SoyElRoot', 'root@email.sy', '255.255.255.255', 'new_album', '2015-11-25 19:18:43'),
(48, 'SoyElRoot', 'root@email.sy', '255.255.255.255', 'new_album', '2015-11-25 19:17:15'),
(47, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 18:58:28'),
(46, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'register', '2015-11-25 18:58:28'),
(45, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'register', '2015-11-25 18:55:48'),
(44, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 18:53:17'),
(43, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'register', '2015-11-25 18:53:17'),
(56, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'register', '2015-11-25 19:30:03'),
(57, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'new_album', '2015-11-25 19:30:03'),
(58, 'eXhiZeRaENKntaDoRa', 'exhizera@enkntadora.mgc', '81.36.105.203', 'new_photo', '2015-11-25 19:30:03'),
(59, 'sertarako', 'n@hi_duzu.la', '81.36.105.203', 'register', '2015-11-25 19:34:18'),
(60, 'sertarako', 'n@hi_duzu.la', '81.36.105.203', 'new_album', '2015-11-25 19:34:18'),
(61, 'sertarako', 'n@hi_duzu.la', '81.36.105.203', 'new_photo', '2015-11-25 19:34:18'),
(62, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:47:05'),
(63, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:47:11'),
(64, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:47:17'),
(65, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:48:15'),
(66, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:48:35'),
(67, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:50:18'),
(68, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:50:26'),
(69, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:52:24'),
(70, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:52:42'),
(71, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:53:35'),
(72, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 20:54:07'),
(73, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 21:00:29'),
(74, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 21:04:50'),
(75, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 21:06:48'),
(76, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 21:09:04'),
(77, 'Darkatom', 'Array', '81.36.105.203', 'logged_in', '2015-11-25 21:09:57'),
(78, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-25 21:19:50'),
(79, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-25 21:20:10'),
(80, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-25 21:20:19'),
(81, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:23:41'),
(82, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:23:41'),
(83, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:24:56'),
(84, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:24:56'),
(85, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:28:43'),
(86, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:28:43'),
(87, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:34:54'),
(88, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:34:54'),
(89, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:35:30'),
(90, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:35:30'),
(91, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:35:34'),
(92, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:35:34'),
(93, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:52:18'),
(94, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:52:18'),
(95, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:52:28'),
(96, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:52:28'),
(97, '', '', '81.36.105.203', 'new_photo', '2015-11-25 21:52:28'),
(98, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:54:11'),
(99, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:54:11'),
(100, '', '', '81.36.105.203', 'new_photo', '2015-11-25 21:54:11'),
(101, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:55:53'),
(102, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:55:53'),
(103, '', '', '81.36.105.203', 'new_photo', '2015-11-25 21:56:00'),
(104, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-25 21:56:27'),
(105, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:56:34'),
(106, '', '', '81.36.105.203', 'new_album', '2015-11-25 21:56:34'),
(107, '', '', '81.36.105.203', 'new_photo', '2015-11-25 21:56:34'),
(108, '', '', '81.36.105.203', 'new_album', '2015-11-25 22:00:28'),
(109, '', '', '81.36.105.203', 'new_album', '2015-11-25 22:00:28'),
(110, '', '', '81.36.105.203', 'new_photo', '2015-11-25 22:00:28'),
(111, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-25 22:00:43'),
(112, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-25 22:02:36'),
(113, '', '', '81.36.105.203', 'new_album', '2015-11-25 22:02:44'),
(114, '', '', '81.36.105.203', 'new_album', '2015-11-25 22:02:44'),
(115, '', '', '81.36.105.203', 'new_photo', '2015-11-25 22:02:44'),
(116, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:04:16'),
(117, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:04:16'),
(118, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:04:16'),
(119, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:27:03'),
(120, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:27:03'),
(121, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:27:03'),
(122, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:27:34'),
(123, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:27:34'),
(124, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:27:34'),
(125, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:28:36'),
(126, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:28:36'),
(127, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:28:36'),
(128, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:32:17'),
(129, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:32:17'),
(130, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:32:17'),
(131, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:34:07'),
(132, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:34:07'),
(133, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:34:07'),
(134, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:35:21'),
(135, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:35:21'),
(136, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:35:21'),
(137, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:35:59'),
(138, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:35:59'),
(139, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:35:59'),
(140, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:36:09'),
(141, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:36:09'),
(142, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:36:09'),
(143, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:37:37'),
(144, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:37:37'),
(145, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:37:37'),
(146, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:38:05'),
(147, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_album', '2015-11-25 22:38:05'),
(148, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'new_photo', '2015-11-25 22:38:05'),
(149, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 17:30:15'),
(150, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:04:25'),
(151, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:05:59'),
(152, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:06:03'),
(153, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:06:06'),
(154, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:06:09'),
(155, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:06:29'),
(156, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:33:04'),
(157, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', 'logged_in', '2015-11-26 18:33:08'),
(158, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 18:50:26'),
(159, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 19:31:28'),
(160, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 19:32:25'),
(161, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 19:52:29'),
(162, 'hellraiser', 'What@ever.se', '62.99.97.73', 'register', '2015-11-30 20:13:12'),
(163, 'hellraiser', 'What@ever.se', '62.99.97.73', 'logged_in', '2015-11-30 20:13:46'),
(164, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 20:14:03'),
(165, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 20:17:17'),
(166, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 20:26:58'),
(167, 'hellraiser', 'What@ever.se', '81.32.232.60', 'logged_in', '2015-11-30 20:44:56'),
(168, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 21:18:33'),
(169, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 21:20:00'),
(170, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 21:20:00'),
(171, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_photo', '2015-11-30 21:20:00'),
(172, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 21:28:51'),
(173, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 21:34:13'),
(174, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'logged_in', '2015-11-30 22:09:36'),
(175, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:10:30'),
(176, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:11:16'),
(177, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:11:47'),
(178, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:50:41'),
(179, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:54:58'),
(180, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:56:15'),
(181, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:57:05'),
(182, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:57:16'),
(183, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', 'new_album', '2015-11-30 22:58:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `access` enum('public','limited','private') COLLATE utf8_unicode_ci NOT NULL,
  `cover` varchar(500) COLLATE utf8_unicode_ci DEFAULT 'data/user.png',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=67 ;

--
-- Volcado de datos para la tabla `album`
--

INSERT INTO `album` (`id`, `nick`, `creation_date`, `name`, `access`, `cover`) VALUES
(5, 'sertarako', '2015-11-25 19:34:18', 'Fotos de Perfil', 'public', 'data/user.png'),
(4, 'eXhiZeRaENKntaDoRa', '2015-11-25 19:30:03', 'Fotos de Perfil', 'public', ''),
(62, 'Darkatom', '2015-11-30 22:54:58', 'Animals', 'private', 'data/user.png'),
(61, 'Darkatom', '2015-11-30 22:50:41', 'Anime Grrls', 'limited', 'data/user.png'),
(60, 'Darkatom', '2015-11-30 22:11:47', 'Dummy', 'private', 'data/user.png'),
(59, 'Darkatom', '2015-11-30 22:11:16', 'adad', 'private', 'data/user.png'),
(63, 'Darkatom', '2015-11-30 22:56:15', 'Try 3', 'private', 'data/user.png'),
(64, 'Darkatom', '2015-11-30 22:57:05', 'Try 4', 'private', 'data/user.png'),
(65, 'Darkatom', '2015-11-30 22:57:16', 'Try 5', 'private', 'data/user.png'),
(66, 'Darkatom', '2015-11-30 22:58:37', 'Try 7', 'private', 'data/user.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `connection`
--

CREATE TABLE IF NOT EXISTS `connection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44 ;

--
-- Volcado de datos para la tabla `connection`
--

INSERT INTO `connection` (`id`, `nick`, `email`, `ip`, `date`) VALUES
(1, 'Darkatom', '', '81.36.105.203', '2015-11-25 18:43:00'),
(2, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:47:05'),
(3, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:47:11'),
(4, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:47:17'),
(5, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:48:15'),
(6, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:48:35'),
(7, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:50:18'),
(8, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:50:26'),
(9, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:52:24'),
(10, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:52:42'),
(11, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:53:35'),
(12, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 20:54:07'),
(13, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 21:00:29'),
(14, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 21:04:50'),
(15, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 21:06:48'),
(16, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 21:09:04'),
(17, 'Darkatom', 'Array', '81.36.105.203', '2015-11-25 21:09:57'),
(18, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-25 21:19:50'),
(19, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-25 21:20:10'),
(20, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-25 21:20:19'),
(21, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-25 21:56:27'),
(22, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-25 22:00:43'),
(23, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-25 22:02:36'),
(24, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 17:30:15'),
(25, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:04:25'),
(26, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:05:59'),
(27, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:06:03'),
(28, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:06:06'),
(29, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:06:09'),
(30, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:06:29'),
(31, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:33:04'),
(32, 'Darkatom', 'darkatomish@gmail.com', '81.36.105.203', '2015-11-26 18:33:08'),
(33, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 18:50:26'),
(34, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 19:31:28'),
(35, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 19:32:25'),
(36, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 19:52:29'),
(37, 'hellraiser', 'What@ever.se', '62.99.97.73', '2015-11-30 20:13:46'),
(38, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 20:14:03'),
(39, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 20:17:17'),
(40, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 20:26:58'),
(41, 'hellraiser', 'What@ever.se', '81.32.232.60', '2015-11-30 20:44:56'),
(42, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 21:34:13'),
(43, 'Darkatom', 'darkatomish@gmail.com', '2.139.30.201', '2015-11-30 22:09:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `album` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `photo`
--

INSERT INTO `photo` (`id`, `nick`, `path`, `album`, `update_date`) VALUES
(26, 'Darkatom', 'data/Darkatom/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Anime Girl', '2015-11-25 22:37:37'),
(10, 'sertarako', 'data/sertarako/a4dvXpZ_460s_v1.jpg', 'Fotos de Perfil', '2015-11-25 19:34:18'),
(9, 'eXhiZeRaENKntaDoRa', 'data/eXhiZeRaENKntaDoRa/29le7ub.jpg', 'Fotos de Perfil', '2015-11-25 19:30:03'),
(7, 'Darkatom', 'data/Darkatom/atom_black.png', 'Fotos de Perfil', '2015-11-25 18:58:28'),
(27, 'Darkatom', 'data/Darkatom/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Anime Girl', '2015-11-25 22:38:05'),
(25, 'Darkatom', 'data/Darkatom/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Anime Girl', '2015-11-25 22:36:09'),
(24, 'Darkatom', 'data/Darkatom/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Anime Girl', '2015-11-25 22:35:59'),
(23, 'Darkatom', 'data/Darkatom/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Anime Girl', '2015-11-25 22:35:21'),
(22, 'Darkatom', 'data/Darkatom/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Anime Girl', '2015-11-25 22:34:07'),
(21, 'Darkatom', '/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Anime Girl', '2015-11-25 22:32:17'),
(28, 'Darkatom', 'data/Darkatom/^CA97A40E4523082484A4F22904BDC0FE149548B54260895C2E^pimgpsh_fullsize_distr.jpg', 'Dummy', '2015-11-30 21:20:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('partner','admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'partner',
  `accepted` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` enum('female','male') COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`nick`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`nick`, `password`, `email`, `role`, `accepted`, `register_date`, `name`, `surname`, `age`, `gender`, `avatar`) VALUES
('sertarako', '294adb3ebaa9b6e4d4add8dd2e9f846a4a8b04065d16dbeb6e5db851792fca25', 'n@hi_duzu.la', 'partner', 'no', '2015-11-25 19:34:18', 'Bego', 'MDMM', 18, 'female', 'data/sertarako/a4dvXpZ_460s_v1.jpg'),
('Darkatom', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'darkatomish@gmail.com', 'partner', 'no', '2015-11-25 18:58:28', 'Olatz', 'Castano', 21, 'female', 'data/Darkatom/atom_black.png'),
('eXhiZeRaENKntaDoRa', 'e3b0c44298fc1c149afbf4c8996fb92427ae41e4649b934ca495991b7852b855', 'exhizera@enkntadora.mgc', 'partner', 'no', '2015-11-25 19:30:03', 'Lola', 'Bartolo', 18, 'female', 'data/eXhiZeRaENKntaDoRa/29le7ub.jpg'),
('hellraiser', '85738f8f9a7f1b04b5329c590ebcb9e425925c6d0984089c43a022de4f19c281', 'What@ever.se', 'partner', 'no', '2015-11-30 20:13:12', 'Jose', 'Ángel ', 23, 'male', 'data/user.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
