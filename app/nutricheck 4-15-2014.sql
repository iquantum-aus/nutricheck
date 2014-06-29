-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2014 at 12:16 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nutricheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=136 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 268),
(2, 1, NULL, NULL, 'AnalysisResults', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Answers', 14, 27),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 1, NULL, NULL, 'Choices', 28, 39),
(15, 14, NULL, NULL, 'index', 29, 30),
(16, 14, NULL, NULL, 'view', 31, 32),
(17, 14, NULL, NULL, 'add', 33, 34),
(18, 14, NULL, NULL, 'edit', 35, 36),
(19, 14, NULL, NULL, 'delete', 37, 38),
(20, 1, NULL, NULL, 'Contents', 40, 51),
(21, 20, NULL, NULL, 'index', 41, 42),
(22, 20, NULL, NULL, 'view', 43, 44),
(23, 20, NULL, NULL, 'add', 45, 46),
(24, 20, NULL, NULL, 'edit', 47, 48),
(25, 20, NULL, NULL, 'delete', 49, 50),
(26, 1, NULL, NULL, 'Factors', 52, 63),
(27, 26, NULL, NULL, 'index', 53, 54),
(28, 26, NULL, NULL, 'view', 55, 56),
(29, 26, NULL, NULL, 'add', 57, 58),
(30, 26, NULL, NULL, 'edit', 59, 60),
(31, 26, NULL, NULL, 'delete', 61, 62),
(32, 1, NULL, NULL, 'Groups', 64, 75),
(33, 32, NULL, NULL, 'index', 65, 66),
(34, 32, NULL, NULL, 'view', 67, 68),
(35, 32, NULL, NULL, 'add', 69, 70),
(36, 32, NULL, NULL, 'edit', 71, 72),
(37, 32, NULL, NULL, 'delete', 73, 74),
(38, 1, NULL, NULL, 'Histories', 76, 87),
(39, 38, NULL, NULL, 'index', 77, 78),
(40, 38, NULL, NULL, 'view', 79, 80),
(41, 38, NULL, NULL, 'add', 81, 82),
(42, 38, NULL, NULL, 'edit', 83, 84),
(43, 38, NULL, NULL, 'delete', 85, 86),
(44, 1, NULL, NULL, 'NutritionalGuides', 88, 99),
(45, 44, NULL, NULL, 'index', 89, 90),
(46, 44, NULL, NULL, 'view', 91, 92),
(47, 44, NULL, NULL, 'add', 93, 94),
(48, 44, NULL, NULL, 'edit', 95, 96),
(49, 44, NULL, NULL, 'delete', 97, 98),
(50, 1, NULL, NULL, 'Pages', 100, 103),
(51, 50, NULL, NULL, 'display', 101, 102),
(52, 1, NULL, NULL, 'PerformedChecks', 104, 115),
(53, 52, NULL, NULL, 'index', 105, 106),
(54, 52, NULL, NULL, 'view', 107, 108),
(55, 52, NULL, NULL, 'add', 109, 110),
(56, 52, NULL, NULL, 'edit', 111, 112),
(57, 52, NULL, NULL, 'delete', 113, 114),
(58, 1, NULL, NULL, 'Questions', 116, 129),
(59, 58, NULL, NULL, 'index', 117, 118),
(60, 58, NULL, NULL, 'nutrient_check', 119, 120),
(61, 58, NULL, NULL, 'view', 121, 122),
(62, 58, NULL, NULL, 'add', 123, 124),
(63, 58, NULL, NULL, 'edit', 125, 126),
(64, 58, NULL, NULL, 'delete', 127, 128),
(65, 1, NULL, NULL, 'UserAccessLogs', 130, 141),
(66, 65, NULL, NULL, 'index', 131, 132),
(67, 65, NULL, NULL, 'view', 133, 134),
(68, 65, NULL, NULL, 'add', 135, 136),
(69, 65, NULL, NULL, 'edit', 137, 138),
(70, 65, NULL, NULL, 'delete', 139, 140),
(71, 1, NULL, NULL, 'UserProfiles', 142, 153),
(72, 71, NULL, NULL, 'index', 143, 144),
(73, 71, NULL, NULL, 'view', 145, 146),
(74, 71, NULL, NULL, 'add', 147, 148),
(75, 71, NULL, NULL, 'edit', 149, 150),
(76, 71, NULL, NULL, 'delete', 151, 152),
(77, 1, NULL, NULL, 'users', 154, 171),
(78, 77, NULL, NULL, 'index', 155, 156),
(79, 77, NULL, NULL, 'view', 157, 158),
(80, 77, NULL, NULL, 'add', 159, 160),
(81, 77, NULL, NULL, 'edit', 161, 162),
(82, 77, NULL, NULL, 'delete', 163, 164),
(83, 77, NULL, NULL, 'login', 165, 166),
(84, 77, NULL, NULL, 'logout', 167, 168),
(85, 1, NULL, NULL, 'Vitamins', 172, 183),
(86, 85, NULL, NULL, 'index', 173, 174),
(87, 85, NULL, NULL, 'view', 175, 176),
(88, 85, NULL, NULL, 'add', 177, 178),
(89, 85, NULL, NULL, 'edit', 179, 180),
(90, 85, NULL, NULL, 'delete', 181, 182),
(91, 1, NULL, NULL, 'AclManagement', 184, 225),
(92, 91, NULL, NULL, 'Groups', 185, 196),
(93, 92, NULL, NULL, 'index', 186, 187),
(94, 92, NULL, NULL, 'view', 188, 189),
(95, 92, NULL, NULL, 'add', 190, 191),
(96, 92, NULL, NULL, 'edit', 192, 193),
(97, 92, NULL, NULL, 'delete', 194, 195),
(98, 91, NULL, NULL, 'UserPermissions', 197, 206),
(99, 98, NULL, NULL, 'index', 198, 199),
(100, 98, NULL, NULL, 'sync', 200, 201),
(101, 98, NULL, NULL, 'edit', 202, 203),
(102, 98, NULL, NULL, 'toggle', 204, 205),
(103, 91, NULL, NULL, 'users', 207, 224),
(104, 103, NULL, NULL, 'index', 208, 209),
(105, 103, NULL, NULL, 'view', 210, 211),
(106, 103, NULL, NULL, 'add', 212, 213),
(107, 103, NULL, NULL, 'edit', 214, 215),
(108, 103, NULL, NULL, 'delete', 216, 217),
(109, 103, NULL, NULL, 'login', 218, 219),
(110, 103, NULL, NULL, 'logout', 220, 221),
(111, 77, NULL, NULL, 'dashboard', 169, 170),
(112, 103, NULL, NULL, 'dashboard', 222, 223),
(113, 1, NULL, NULL, 'FactorsQuestions', 226, 243),
(114, 113, NULL, NULL, 'index', 227, 228),
(115, 113, NULL, NULL, 'view', 229, 230),
(116, 113, NULL, NULL, 'add', 231, 232),
(117, 113, NULL, NULL, 'edit', 233, 234),
(118, 113, NULL, NULL, 'delete', 235, 236),
(120, 113, NULL, NULL, 'question_edit', 237, 238),
(121, 113, NULL, NULL, 'question_add', 239, 240),
(122, 113, NULL, NULL, 'nutrient_check', 241, 242),
(123, 1, NULL, NULL, 'Widgets', 244, 255),
(124, 123, NULL, NULL, 'index', 245, 246),
(125, 123, NULL, NULL, 'view', 247, 248),
(126, 123, NULL, NULL, 'add', 249, 250),
(127, 123, NULL, NULL, 'edit', 251, 252),
(128, 123, NULL, NULL, 'delete', 253, 254),
(129, 8, NULL, NULL, 'report', 25, 26),
(130, 1, NULL, NULL, 'Templates', 256, 267),
(131, 130, NULL, NULL, 'index', 257, 258),
(132, 130, NULL, NULL, 'view', 259, 260),
(133, 130, NULL, NULL, 'add', 261, 262),
(134, 130, NULL, NULL, 'edit', 263, 264),
(135, 130, NULL, NULL, 'delete', 265, 266);

-- --------------------------------------------------------

--
-- Table structure for table `analysis_results`
--

CREATE TABLE IF NOT EXISTS `analysis_results` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `factors_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `score` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `questions_id` bigint(20) NOT NULL,
  `factors_id` bigint(20) DEFAULT NULL,
  `choice_id` bigint(20) DEFAULT NULL,
  `rank` int(5) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `user_id`, `questions_id`, `factors_id`, `choice_id`, `rank`, `answer`, `created`, `modified`, `status`) VALUES
(1, 1, 1, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(2, 1, 2, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(3, 1, 3, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(4, 1, 4, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(5, 1, 5, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(6, 1, 6, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(7, 1, 7, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(8, 1, 8, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(9, 1, 9, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(10, 1, 10, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(11, 1, 11, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(12, 1, 12, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(13, 1, 13, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(14, 1, 14, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(15, 1, 15, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(16, 1, 16, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(17, 1, 17, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(18, 1, 18, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(19, 1, 19, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(20, 1, 20, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(21, 1, 21, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(22, 1, 22, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(23, 1, 23, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(24, 1, 24, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(25, 1, 25, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(26, 1, 26, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(27, 1, 27, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(28, 1, 28, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(29, 1, 29, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(30, 1, 30, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(31, 1, 31, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(32, 1, 32, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(33, 1, 33, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(34, 1, 34, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(35, 1, 35, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(36, 1, 36, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(37, 1, 37, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(38, 1, 38, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(39, 1, 39, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(40, 1, 40, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(41, 1, 41, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(42, 1, 42, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(43, 1, 43, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(44, 1, 44, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(45, 1, 45, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(46, 1, 46, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(47, 1, 47, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(48, 1, 48, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(49, 1, 49, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(50, 1, 50, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(51, 1, 51, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(52, 1, 52, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(53, 1, 53, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(54, 1, 54, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(55, 1, 55, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(56, 1, 56, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(57, 1, 57, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(58, 1, 58, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(59, 1, 59, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(60, 1, 60, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(61, 1, 61, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(62, 1, 62, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(63, 1, 63, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(64, 1, 64, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(65, 1, 65, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(66, 1, 66, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(67, 1, 67, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(68, 1, 68, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(69, 1, 69, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(70, 1, 70, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(71, 1, 71, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(72, 1, 72, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(73, 1, 73, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(74, 1, 74, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(75, 1, 75, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(76, 1, 76, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(77, 1, 77, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(78, 1, 78, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(79, 1, 79, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(80, 1, 80, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(81, 1, 81, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(82, 1, 82, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(83, 1, 83, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(84, 1, 84, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(85, 1, 85, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(86, 1, 86, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(87, 1, 87, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(88, 1, 88, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(89, 1, 89, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(90, 1, 90, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(91, 1, 91, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(92, 1, 92, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(93, 1, 93, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(94, 1, 94, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(95, 1, 95, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(96, 1, 96, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(97, 1, 97, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(98, 1, 98, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(99, 1, 99, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(100, 1, 100, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(101, 1, 101, NULL, NULL, 1, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(102, 1, 102, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(103, 1, 103, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(104, 1, 104, NULL, NULL, 2, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(105, 1, 105, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(106, 1, 106, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(107, 1, 107, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(108, 1, 108, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(109, 1, 109, NULL, NULL, 3, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1),
(110, 1, 110, NULL, NULL, 4, NULL, '2014-04-15 23:21:30', '2014-04-15 23:21:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, 'Group', 1, NULL, 1, 4),
(2, NULL, 'Group', 2, NULL, 5, 6),
(3, 1, 'User', 1, NULL, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 1, 1, '1', '1', '1', '1'),
(2, 2, 7, '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `choices`
--

CREATE TABLE IF NOT EXISTS `choices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `questions_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

CREATE TABLE IF NOT EXISTS `factors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'creator id',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`id`, `name`, `description`, `user_id`, `created`, `modified`, `status`) VALUES
(1, 'Allergy', 'Allergy', 1, '2013-12-23 09:44:20', '2014-04-11 18:31:24', 1),
(2, 'Hypoglyc.', 'Hypoglyc.', 1, '2013-12-23 09:45:09', '2013-12-23 09:45:09', 1),
(3, 'Digestion', 'Digestion', 1, '2013-12-23 09:45:58', '2013-12-23 09:45:58', 1),
(4, 'B. Flora', 'B. Flora', 1, '2013-12-23 09:46:10', '2013-12-23 09:46:10', 1),
(5, 'Vit A', 'Vit A', 1, '2013-12-23 10:00:09', '2013-12-23 10:00:09', 1),
(6, 'Vit. B1', 'Vit. B1', 1, '2013-12-23 10:00:19', '2013-12-23 10:00:19', 1),
(7, 'Vit. B2', 'Vit. B2', 1, '2013-12-23 10:01:36', '2013-12-23 10:01:36', 1),
(8, 'Vit. B3', 'Vit. B3', 1, '2013-12-23 10:01:49', '2013-12-23 10:01:49', 1),
(9, 'Vit. B5', 'Vit. B5', 1, '2013-12-23 10:02:02', '2013-12-23 10:02:02', 1),
(10, 'Vit. B6', 'Vit. B6', 1, '2013-12-23 10:03:14', '2013-12-23 10:03:14', 1),
(11, 'Vit. B12', 'Vit. B12', 1, '2013-12-23 10:03:24', '2013-12-23 10:03:24', 1),
(12, 'Vit. C', 'Vit. C', 1, '2013-12-23 10:03:37', '2013-12-23 10:03:37', 1),
(13, 'Vit. D', 'Vit. D', 1, '2013-12-23 10:03:47', '2013-12-23 10:03:47', 1),
(14, 'Vit. E', 'Vit. E', 1, '2013-12-23 10:03:55', '2013-12-23 10:03:55', 1),
(15, 'Vit. K', 'Vit. K', 1, '2013-12-23 12:09:35', '2013-12-23 12:09:35', 1),
(16, 'Magnesium', 'Magnesium', 1, '2013-12-23 12:09:46', '2013-12-23 12:09:46', 1),
(17, 'Calcium', 'Calcium', 1, '2013-12-23 12:09:56', '2013-12-23 12:09:56', 1),
(18, 'Zinc', 'Zinc', 1, '2013-12-23 12:10:09', '2013-12-23 12:10:09', 1),
(19, 'Protein', 'Protein', 1, '2013-12-23 12:10:15', '2013-12-23 12:10:15', 1),
(20, 'Iron', 'Iron', 1, '2013-12-23 12:10:23', '2013-12-23 12:10:23', 1),
(21, 'EFA''s', 'EFA''s', 1, '2013-12-23 12:10:31', '2013-12-23 12:10:31', 1),
(22, 'Folate', 'Folate', 1, '2013-12-23 12:10:40', '2013-12-23 12:10:40', 1),
(23, 'Dopamine', 'Dopamine', 1, '2013-12-23 12:10:53', '2013-12-23 12:10:53', 1),
(24, 'Serotonin', 'Serotonin', 1, '2013-12-23 12:11:05', '2013-12-23 12:11:05', 1),
(25, 'Endorphin', 'Endorphin', 1, '2013-12-23 12:11:15', '2013-12-23 12:11:15', 1),
(26, 'A/Choline', 'A/Choline', 1, '2013-12-23 12:11:23', '2013-12-23 12:11:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `factors_questions`
--

CREATE TABLE IF NOT EXISTS `factors_questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `factors_id` int(20) DEFAULT NULL,
  `questions_id` int(20) DEFAULT NULL,
  `multiplier` int(5) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1144 ;

--
-- Dumping data for table `factors_questions`
--

INSERT INTO `factors_questions` (`id`, `factors_id`, `questions_id`, `multiplier`, `created`, `modified`, `status`) VALUES
(1, 1, 5, 2, NULL, NULL, 1),
(2, 1, 6, 2, NULL, NULL, 1),
(3, 1, 8, 3, NULL, NULL, 1),
(4, 1, 9, 3, NULL, NULL, 1),
(5, 1, 19, 3, NULL, NULL, 1),
(6, 1, 24, 2, NULL, NULL, 1),
(7, 1, 31, 2, NULL, NULL, 1),
(8, 1, 32, 2, NULL, NULL, 1),
(9, 1, 38, 1, NULL, NULL, 1),
(10, 1, 41, 2, NULL, NULL, 1),
(11, 1, 45, 1, NULL, NULL, 1),
(12, 1, 46, 1, NULL, NULL, 1),
(13, 1, 74, 2, NULL, NULL, 1),
(14, 1, 75, 1, NULL, NULL, 1),
(15, 1, 87, 2, NULL, NULL, 1),
(16, 1, 90, 2, NULL, NULL, 1),
(17, 1, 91, 1, NULL, NULL, 1),
(18, 1, 93, 3, NULL, NULL, 1),
(19, 1, 94, 2, NULL, NULL, 1),
(20, 1, 96, 2, NULL, NULL, 1),
(21, 1, 101, 2, NULL, NULL, 1),
(22, 1, 106, 1, NULL, NULL, 1),
(23, 1, 107, 1, NULL, NULL, 1),
(24, 1, 108, 2, NULL, NULL, 1),
(25, 1, 110, 2, NULL, NULL, 1),
(26, 2, 15, 2, NULL, NULL, 1),
(27, 2, 31, 3, NULL, NULL, 1),
(28, 2, 32, 2, NULL, NULL, 1),
(29, 2, 37, 2, NULL, NULL, 1),
(30, 2, 38, 2, NULL, NULL, 1),
(31, 2, 40, 1, NULL, NULL, 1),
(32, 2, 42, 2, NULL, NULL, 1),
(33, 2, 50, 2, NULL, NULL, 1),
(34, 2, 74, 3, NULL, NULL, 1),
(35, 2, 75, 3, NULL, NULL, 1),
(36, 2, 76, 3, NULL, NULL, 1),
(37, 2, 77, 3, NULL, NULL, 1),
(38, 2, 78, 2, NULL, NULL, 1),
(39, 2, 79, 2, NULL, NULL, 1),
(40, 2, 80, 3, NULL, NULL, 1),
(41, 2, 81, 2, NULL, NULL, 1),
(42, 2, 82, 2, NULL, NULL, 1),
(43, 2, 83, 2, NULL, NULL, 1),
(44, 2, 84, 2, NULL, NULL, 1),
(45, 2, 85, 3, NULL, NULL, 1),
(46, 2, 86, 2, NULL, NULL, 1),
(47, 2, 87, 3, NULL, NULL, 1),
(48, 2, 88, 2, NULL, NULL, 1),
(49, 2, 89, 2, NULL, NULL, 1),
(50, 2, 90, 2, NULL, NULL, 1),
(51, 2, 91, 2, NULL, NULL, 1),
(52, 2, 92, 3, NULL, NULL, 1),
(53, 2, 93, 2, NULL, NULL, 1),
(54, 2, 94, 2, NULL, NULL, 1),
(55, 2, 95, 2, NULL, NULL, 1),
(56, 2, 96, 2, NULL, NULL, 1),
(57, 2, 97, 2, NULL, NULL, 1),
(58, 2, 98, 3, NULL, NULL, 1),
(59, 2, 99, 3, NULL, NULL, 1),
(60, 2, 100, 3, NULL, NULL, 1),
(61, 2, 101, 2, NULL, NULL, 1),
(62, 2, 102, 2, NULL, NULL, 1),
(63, 2, 103, 2, NULL, NULL, 1),
(64, 2, 104, 1, NULL, NULL, 1),
(65, 2, 105, 1, NULL, NULL, 1),
(66, 2, 106, 2, NULL, NULL, 1),
(67, 2, 107, 1, NULL, NULL, 1),
(68, 2, 108, 2, NULL, NULL, 1),
(69, 3, 5, 1, NULL, NULL, 1),
(70, 3, 6, 3, NULL, NULL, 1),
(71, 3, 9, 2, NULL, NULL, 1),
(72, 3, 24, 1, NULL, NULL, 1),
(73, 3, 53, 1, NULL, NULL, 1),
(74, 3, 54, 1, NULL, NULL, 1),
(75, 3, 56, 2, NULL, NULL, 1),
(76, 3, 61, 1, NULL, NULL, 1),
(77, 3, 75, 2, NULL, NULL, 1),
(78, 3, 76, 1, NULL, NULL, 1),
(79, 3, 85, 1, NULL, NULL, 1),
(80, 3, 88, 1, NULL, NULL, 1),
(81, 3, 89, 1, NULL, NULL, 1),
(82, 3, 107, 2, NULL, NULL, 1),
(83, 4, 5, 2, NULL, NULL, 1),
(84, 4, 6, 2, NULL, NULL, 1),
(85, 4, 7, 1, NULL, NULL, 1),
(86, 4, 9, 1, NULL, NULL, 1),
(87, 4, 10, 1, NULL, NULL, 1),
(88, 4, 11, 3, NULL, NULL, 1),
(89, 4, 37, 1, NULL, NULL, 1),
(90, 4, 46, 3, NULL, NULL, 1),
(91, 4, 61, 2, NULL, NULL, 1),
(92, 4, 62, 3, NULL, NULL, 1),
(93, 4, 87, 2, NULL, NULL, 1),
(94, 4, 93, 1, NULL, NULL, 1),
(95, 4, 110, 1, NULL, NULL, 1),
(96, 5, 3, 3, NULL, NULL, 1),
(97, 5, 4, 1, NULL, NULL, 1),
(98, 5, 9, 1, NULL, NULL, 1),
(99, 5, 19, 1, NULL, NULL, 1),
(100, 5, 20, 1, NULL, NULL, 1),
(101, 5, 61, 1, NULL, NULL, 1),
(102, 5, 62, 1, NULL, NULL, 1),
(103, 5, 64, 2, NULL, NULL, 1),
(104, 5, 66, 2, NULL, NULL, 1),
(105, 5, 67, 2, NULL, NULL, 1),
(106, 5, 109, 1, NULL, NULL, 1),
(107, 6, 13, 1, NULL, NULL, 1),
(108, 6, 14, 2, NULL, NULL, 1),
(109, 6, 15, 2, NULL, NULL, 1),
(110, 6, 16, 2, NULL, NULL, 1),
(111, 6, 23, 2, NULL, NULL, 1),
(112, 6, 32, 1, NULL, NULL, 1),
(113, 6, 41, 1, NULL, NULL, 1),
(114, 6, 45, 1, NULL, NULL, 1),
(115, 6, 47, 1, NULL, NULL, 1),
(116, 6, 52, 1, NULL, NULL, 1),
(117, 7, 1, 1, NULL, NULL, 1),
(118, 7, 17, 2, NULL, NULL, 1),
(119, 7, 18, 2, NULL, NULL, 1),
(120, 7, 19, 2, NULL, NULL, 1),
(121, 7, 20, 2, NULL, NULL, 1),
(122, 7, 21, 2, NULL, NULL, 1),
(123, 7, 22, 1, NULL, NULL, 1),
(124, 8, 5, 2, NULL, NULL, 1),
(125, 8, 6, 1, NULL, NULL, 1),
(126, 8, 10, 1, NULL, NULL, 1),
(127, 8, 14, 1, NULL, NULL, 1),
(128, 8, 17, 1, NULL, NULL, 1),
(129, 8, 18, 1, NULL, NULL, 1),
(130, 8, 32, 1, NULL, NULL, 1),
(131, 8, 35, 2, NULL, NULL, 1),
(132, 8, 36, 1, NULL, NULL, 1),
(133, 8, 37, 2, NULL, NULL, 1),
(134, 8, 38, 2, NULL, NULL, 1),
(135, 8, 39, 3, NULL, NULL, 1),
(136, 8, 40, 1, NULL, NULL, 1),
(137, 8, 41, 1, NULL, NULL, 1),
(138, 8, 77, 1, NULL, NULL, 1),
(139, 8, 81, 2, NULL, NULL, 1),
(140, 8, 83, 3, NULL, NULL, 1),
(141, 8, 86, 2, NULL, NULL, 1),
(142, 8, 91, 2, NULL, NULL, 1),
(143, 8, 96, 1, NULL, NULL, 1),
(144, 8, 110, 1, NULL, NULL, 1),
(145, 9, 25, 1, NULL, NULL, 1),
(146, 9, 42, 2, NULL, NULL, 1),
(147, 9, 43, 2, NULL, NULL, 1),
(148, 9, 44, 1, NULL, NULL, 1),
(149, 9, 45, 2, NULL, NULL, 1),
(150, 9, 46, 1, NULL, NULL, 1),
(151, 9, 74, 1, NULL, NULL, 1),
(152, 9, 88, 2, NULL, NULL, 1),
(153, 9, 91, 1, NULL, NULL, 1),
(154, 10, 8, 1, NULL, NULL, 1),
(155, 10, 15, 2, NULL, NULL, 1),
(156, 10, 16, 1, NULL, NULL, 1),
(157, 10, 18, 1, NULL, NULL, 1),
(158, 10, 21, 1, NULL, NULL, 1),
(159, 10, 22, 2, NULL, NULL, 1),
(160, 10, 23, 2, NULL, NULL, 1),
(161, 10, 24, 1, NULL, NULL, 1),
(162, 10, 25, 2, NULL, NULL, 1),
(163, 10, 26, 2, NULL, NULL, 1),
(164, 10, 27, 1, NULL, NULL, 1),
(165, 10, 28, 1, NULL, NULL, 1),
(166, 10, 29, 3, NULL, NULL, 1),
(167, 10, 30, 3, NULL, NULL, 1),
(168, 10, 31, 2, NULL, NULL, 1),
(169, 10, 32, 2, NULL, NULL, 1),
(170, 10, 33, 1, NULL, NULL, 1),
(171, 10, 34, 1, NULL, NULL, 1),
(172, 10, 35, 2, NULL, NULL, 1),
(173, 10, 36, 2, NULL, NULL, 1),
(174, 10, 40, 2, NULL, NULL, 1),
(175, 10, 41, 1, NULL, NULL, 1),
(176, 10, 43, 1, NULL, NULL, 1),
(177, 10, 50, 1, NULL, NULL, 1),
(178, 10, 56, 1, NULL, NULL, 1),
(179, 10, 57, 1, NULL, NULL, 1),
(180, 10, 59, 1, NULL, NULL, 1),
(181, 10, 78, 1, NULL, NULL, 1),
(182, 10, 80, 2, NULL, NULL, 1),
(183, 10, 81, 1, NULL, NULL, 1),
(184, 10, 82, 2, NULL, NULL, 1),
(185, 10, 84, 2, NULL, NULL, 1),
(186, 10, 86, 1, NULL, NULL, 1),
(187, 10, 92, 1, NULL, NULL, 1),
(188, 10, 96, 2, NULL, NULL, 1),
(189, 10, 110, 2, NULL, NULL, 1),
(190, 11, 37, 1, NULL, NULL, 1),
(191, 11, 44, 1, NULL, NULL, 1),
(192, 11, 45, 1, NULL, NULL, 1),
(193, 11, 47, 2, NULL, NULL, 1),
(194, 11, 48, 1, NULL, NULL, 1),
(195, 11, 49, 2, NULL, NULL, 1),
(196, 11, 50, 1, NULL, NULL, 1),
(197, 12, 8, 2, NULL, NULL, 1),
(198, 12, 9, 2, NULL, NULL, 1),
(199, 12, 10, 2, NULL, NULL, 1),
(200, 12, 11, 1, NULL, NULL, 1),
(201, 12, 12, 3, NULL, NULL, 1),
(202, 12, 13, 2, NULL, NULL, 1),
(203, 12, 42, 1, NULL, NULL, 1),
(204, 12, 54, 1, NULL, NULL, 1),
(205, 12, 57, 1, NULL, NULL, 1),
(206, 12, 62, 1, NULL, NULL, 1),
(207, 12, 101, 1, NULL, NULL, 1),
(208, 12, 104, 1, NULL, NULL, 1),
(209, 12, 105, 1, NULL, NULL, 1),
(210, 13, 19, 1, NULL, NULL, 1),
(211, 13, 20, 1, NULL, NULL, 1),
(212, 13, 101, 1, NULL, NULL, 1),
(213, 13, 102, 1, NULL, NULL, 1),
(214, 13, 103, 1, NULL, NULL, 1),
(215, 13, 109, 2, NULL, NULL, 1),
(216, 14, 13, 2, NULL, NULL, 1),
(217, 14, 43, 1, NULL, NULL, 1),
(218, 14, 51, 1, NULL, NULL, 1),
(219, 14, 62, 2, NULL, NULL, 1),
(220, 14, 63, 2, NULL, NULL, 1),
(221, 14, 65, 1, NULL, NULL, 1),
(222, 14, 66, 1, NULL, NULL, 1),
(223, 14, 68, 1, NULL, NULL, 1),
(224, 14, 69, 3, NULL, NULL, 1),
(225, 14, 70, 3, NULL, NULL, 1),
(226, 14, 71, 3, NULL, NULL, 1),
(227, 14, 72, 2, NULL, NULL, 1),
(228, 14, 73, 2, NULL, NULL, 1),
(229, 14, 104, 1, NULL, NULL, 1),
(230, 14, 105, 2, NULL, NULL, 1),
(231, 15, 5, 1, NULL, NULL, 1),
(232, 15, 6, 1, NULL, NULL, 1),
(233, 15, 10, 1, NULL, NULL, 1),
(234, 15, 11, 2, NULL, NULL, 1),
(235, 15, 46, 1, NULL, NULL, 1),
(236, 15, 93, 1, NULL, NULL, 1),
(237, 16, 15, 3, NULL, NULL, 1),
(238, 16, 36, 2, NULL, NULL, 1),
(239, 16, 44, 1, NULL, NULL, 1),
(240, 16, 46, 2, NULL, NULL, 1),
(241, 16, 48, 2, NULL, NULL, 1),
(242, 16, 51, 2, NULL, NULL, 1),
(243, 16, 52, 3, NULL, NULL, 1),
(244, 16, 71, 1, NULL, NULL, 1),
(245, 16, 80, 2, NULL, NULL, 1),
(246, 16, 82, 2, NULL, NULL, 1),
(247, 16, 84, 1, NULL, NULL, 1),
(248, 16, 87, 2, NULL, NULL, 1),
(249, 16, 101, 2, NULL, NULL, 1),
(250, 16, 102, 2, NULL, NULL, 1),
(251, 16, 103, 2, NULL, NULL, 1),
(252, 16, 106, 1, NULL, NULL, 1),
(253, 17, 12, 2, NULL, NULL, 1),
(254, 17, 15, 1, NULL, NULL, 1),
(255, 17, 44, 2, NULL, NULL, 1),
(256, 17, 51, 3, NULL, NULL, 1),
(257, 17, 52, 1, NULL, NULL, 1),
(258, 17, 58, 1, NULL, NULL, 1),
(259, 17, 93, 2, NULL, NULL, 1),
(260, 17, 106, 1, NULL, NULL, 1),
(261, 18, 1, 2, NULL, NULL, 1),
(263, 18, 3, 1, NULL, NULL, 1),
(264, 18, 4, 1, NULL, NULL, 1),
(268, 18, 8, 2, NULL, NULL, 1),
(313, 18, 53, 3, NULL, NULL, 1),
(314, 18, 54, 3, NULL, NULL, 1),
(315, 18, 55, 3, NULL, NULL, 1),
(316, 18, 56, 2, NULL, NULL, 1),
(317, 18, 57, 1, NULL, NULL, 1),
(318, 18, 58, 2, NULL, NULL, 1),
(319, 18, 59, 2, NULL, NULL, 1),
(320, 18, 60, 2, NULL, NULL, 1),
(321, 18, 61, 2, NULL, NULL, 1),
(322, 18, 62, 2, NULL, NULL, 1),
(371, 19, 1, 3, NULL, NULL, 1),
(372, 19, 2, 2, NULL, NULL, 1),
(420, 19, 50, 2, NULL, NULL, 1),
(423, 19, 53, 1, NULL, NULL, 1),
(424, 19, 54, 2, NULL, NULL, 1),
(425, 19, 55, 1, NULL, NULL, 1),
(426, 19, 56, 3, NULL, NULL, 1),
(427, 19, 57, 2, NULL, NULL, 1),
(428, 19, 58, 2, NULL, NULL, 1),
(429, 19, 59, 1, NULL, NULL, 1),
(434, 19, 64, 1, NULL, NULL, 1),
(444, 19, 74, 3, NULL, NULL, 1),
(459, 19, 89, 1, NULL, NULL, 1),
(460, 19, 90, 3, NULL, NULL, 1),
(461, 19, 91, 1, NULL, NULL, 1),
(468, 19, 98, 1, NULL, NULL, 1),
(470, 19, 100, 1, NULL, NULL, 1),
(475, 19, 105, 2, NULL, NULL, 1),
(498, 20, 18, 1, NULL, NULL, 1),
(505, 20, 25, 1, NULL, NULL, 1),
(517, 20, 37, 1, NULL, NULL, 1),
(520, 20, 40, 1, NULL, NULL, 1),
(523, 20, 43, 2, NULL, NULL, 1),
(530, 20, 50, 1, NULL, NULL, 1),
(535, 20, 55, 1, NULL, NULL, 1),
(547, 20, 67, 1, NULL, NULL, 1),
(554, 20, 74, 2, NULL, NULL, 1),
(584, 20, 104, 2, NULL, NULL, 1),
(594, 21, 4, 2, NULL, NULL, 1),
(602, 21, 12, 1, NULL, NULL, 1),
(611, 21, 21, 3, NULL, NULL, 1),
(612, 21, 22, 1, NULL, NULL, 1),
(614, 21, 24, 2, NULL, NULL, 1),
(617, 21, 27, 2, NULL, NULL, 1),
(636, 21, 46, 2, NULL, NULL, 1),
(647, 21, 57, 2, NULL, NULL, 1),
(653, 21, 63, 3, NULL, NULL, 1),
(655, 21, 65, 2, NULL, NULL, 1),
(656, 21, 66, 1, NULL, NULL, 1),
(657, 21, 67, 3, NULL, NULL, 1),
(661, 21, 71, 1, NULL, NULL, 1),
(662, 21, 72, 1, NULL, NULL, 1),
(663, 21, 73, 1, NULL, NULL, 1),
(701, 22, 14, 1, NULL, NULL, 1),
(702, 22, 18, 1, NULL, NULL, 1),
(703, 22, 50, 2, NULL, NULL, 1),
(728, 23, 25, 1, NULL, NULL, 1),
(736, 23, 33, 2, NULL, NULL, 1),
(743, 23, 40, 2, NULL, NULL, 1),
(746, 23, 43, 2, NULL, NULL, 1),
(783, 23, 80, 1, NULL, NULL, 1),
(784, 23, 81, 1, NULL, NULL, 1),
(791, 23, 88, 1, NULL, NULL, 1),
(796, 23, 93, 1, NULL, NULL, 1),
(800, 23, 97, 2, NULL, NULL, 1),
(803, 23, 100, 1, NULL, NULL, 1),
(808, 23, 105, 2, NULL, NULL, 1),
(809, 23, 106, 2, NULL, NULL, 1),
(810, 23, 107, 1, NULL, NULL, 1),
(811, 23, 108, 1, NULL, NULL, 1),
(842, 24, 29, 1, NULL, NULL, 1),
(843, 24, 30, 1, NULL, NULL, 1),
(844, 24, 31, 1, NULL, NULL, 1),
(848, 24, 35, 1, NULL, NULL, 1),
(849, 24, 36, 2, NULL, NULL, 1),
(855, 24, 42, 1, NULL, NULL, 1),
(889, 24, 76, 1, NULL, NULL, 1),
(891, 24, 78, 1, NULL, NULL, 1),
(892, 24, 79, 1, NULL, NULL, 1),
(895, 24, 82, 1, NULL, NULL, 1),
(897, 24, 84, 1, NULL, NULL, 1),
(900, 24, 87, 1, NULL, NULL, 1),
(905, 24, 92, 3, NULL, NULL, 1),
(958, 25, 35, 2, NULL, NULL, 1),
(962, 25, 39, 2, NULL, NULL, 1),
(963, 25, 40, 3, NULL, NULL, 1),
(964, 25, 41, 3, NULL, NULL, 1),
(970, 25, 47, 1, NULL, NULL, 1),
(971, 25, 48, 1, NULL, NULL, 1),
(975, 25, 52, 2, NULL, NULL, 1),
(999, 25, 76, 2, NULL, NULL, 1),
(1000, 25, 77, 1, NULL, NULL, 1),
(1001, 25, 78, 2, NULL, NULL, 1),
(1002, 25, 79, 2, NULL, NULL, 1),
(1003, 25, 80, 2, NULL, NULL, 1),
(1004, 25, 81, 3, NULL, NULL, 1),
(1006, 25, 83, 1, NULL, NULL, 1),
(1009, 25, 86, 2, NULL, NULL, 1),
(1018, 25, 95, 3, NULL, NULL, 1),
(1020, 25, 97, 1, NULL, NULL, 1),
(1070, 26, 37, 2, NULL, NULL, 1),
(1071, 26, 38, 2, NULL, NULL, 1),
(1079, 26, 46, 2, NULL, NULL, 1),
(1080, 26, 47, 1, NULL, NULL, 1),
(1083, 26, 50, 2, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Admin', '2014-04-03 03:24:48', '2014-04-03 03:24:48'),
(2, 'Member', '2014-04-03 03:25:04', '2014-04-03 03:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE IF NOT EXISTS `histories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `diagnostics` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `nutritional_guides`
--

CREATE TABLE IF NOT EXISTS `nutritional_guides` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'creator id',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `performed_checks`
--

CREATE TABLE IF NOT EXISTS `performed_checks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `question` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `user_id`, `question`, `created`, `modified`, `status`) VALUES
(1, 1, 'Does your hair tend to fall out or break easily?', '2013-12-21 15:17:03', '2014-04-11 18:27:34', 1),
(2, 1, 'Have you been on a strict weight loss diet in the last 2 years?', '2013-12-21 15:17:29', '2013-12-21 15:17:29', 1),
(3, 1, 'Is your vision at dusk or at nighttime poorer now than before?', '2013-12-21 15:18:35', '2013-12-21 15:18:35', 1),
(4, 1, 'Is the skin on the back of your arms rough, thickened or scaly?', '2013-12-21 15:19:10', '2013-12-21 15:19:10', 1),
(5, 1, 'Do you suffer from flatulence?', '2013-12-21 15:19:33', '2013-12-21 15:19:33', 1),
(6, 1, 'Do you suffer from abdominal bloating especially after eating?', '2013-12-21 15:22:02', '2013-12-21 15:22:02', 1),
(7, 1, 'Do you have bad breath or a bad taste in the mouth especially on wakening?', '2013-12-21 15:22:40', '2013-12-21 15:22:40', 1),
(8, 1, 'Do you suffer from frequent coughs or colds?', '2013-12-21 15:22:59', '2013-12-21 15:22:59', 1),
(9, 1, 'Do you have chronic or recurrent sinus congestion or catarrh?', '2013-12-21 15:23:59', '2013-12-21 15:23:59', 1),
(10, 1, 'Do you get sore red gums or gums that bleed easily on brushing your teeth?', '2013-12-21 15:24:44', '2013-12-21 15:24:44', 1),
(11, 1, 'Do you find that you you bruise easily?', '2013-12-21 15:25:17', '2013-12-21 15:25:17', 1),
(12, 1, 'Do you suffer from excessive dental plaque and/or caries?', '2013-12-21 15:25:54', '2013-12-21 15:25:54', 1),
(13, 1, 'Do you get muscle tenderness or weakness in your legs?', '2013-12-21 15:27:04', '2013-12-21 15:27:04', 1),
(14, 1, 'Do you get a burning feeling in your tongue or lips?', '2013-12-21 15:27:23', '2013-12-21 15:27:23', 1),
(15, 1, 'Do you get palpitations, racing heartbeat or irregular heartbeat?', '2013-12-21 15:27:53', '2013-12-21 15:27:53', 1),
(16, 1, 'Do you get numbness or tingling sensations in your hands or feet?', '2013-12-21 15:29:59', '2013-12-21 15:29:59', 1),
(17, 1, 'Is your tongue sensitive to hot drinks or sore?', '2013-12-21 15:30:32', '2013-12-21 15:30:32', 1),
(18, 1, 'Do you get cracks or soreness in the corner of your mouth?', '2013-12-21 15:30:56', '2013-12-21 15:30:56', 1),
(19, 1, 'Do you get soreness, burning or gritty feelings in your eye?', '2013-12-21 15:31:58', '2013-12-21 15:31:58', 1),
(20, 1, 'Are you sensitive to bright lights?', '2013-12-21 15:32:24', '2013-12-21 15:32:24', 1),
(21, 1, 'Do you have a tendency to dandruff or excessive oily skin?', '2013-12-23 01:47:35', '2013-12-23 01:47:35', 1),
(22, 1, 'Do you get a reddish coloration around your nose and ears?', '2013-12-23 01:50:45', '2013-12-23 01:50:45', 1),
(23, 1, 'Do you drink more than 2 glasses or alcohol per day average?', '2013-12-23 01:51:17', '2013-12-23 01:51:17', 1),
(24, 1, 'Do you have a tendency towards eczema or other skin rashes?', '2013-12-23 01:51:45', '2013-12-23 01:51:45', 1),
(25, 1, 'Do you get dizzy or lightheaded on standing up?', '2013-12-23 01:52:27', '2013-12-23 01:52:27', 1),
(26, 1, 'Do you get swollen feet or do your shoes feel tight when you are on your feet  for a long time?', '2013-12-23 01:58:07', '2013-12-23 01:58:07', 1),
(27, 1, 'Do you tend to have cold fingers or toes especially at night?', '2013-12-23 02:19:53', '2013-12-23 02:19:53', 1),
(28, 1, 'Do your finger joints or toes feel stiff or sore on awakening?', '2013-12-23 02:22:13', '2013-12-23 02:22:13', 1),
(29, 1, 'Do yo find you don''t dream or dream infrequently?', '2013-12-23 02:22:54', '2013-12-23 02:22:54', 1),
(30, 1, 'Do you find it difficult to remember your dreams?', '2013-12-23 02:23:49', '2013-12-23 02:23:49', 1),
(31, 1, 'Do you crave sweet or sugary foods?', '2013-12-23 02:36:16', '2013-12-23 02:36:16', 1),
(32, 1, 'Do you eat white bread, pasta, sugar or white rice almost daily?', '2013-12-23 02:39:28', '2013-12-23 02:39:28', 1),
(33, 1, 'Do you sunburn easily?', '2013-12-23 02:40:11', '2013-12-23 02:40:11', 1),
(34, 1, 'Do you react to Monosodium Glutamate - that is, do you react to chinese food?', '2013-12-23 02:40:46', '2013-12-23 02:40:46', 1),
(35, 1, 'Do you tend to be easily excited or irritated?', '2013-12-23 02:41:03', '2013-12-23 02:41:03', 1),
(36, 1, 'Do you have trouble getting to sleep or suffer from restless sleep?', '2013-12-23 02:42:30', '2013-12-23 02:42:30', 1),
(37, 1, 'Do you find that your ability to concentrate is impaired?', '2013-12-23 02:46:28', '2013-12-23 02:46:28', 1),
(38, 1, 'Do you have trouble making decissions?', '2013-12-23 02:46:44', '2013-12-23 02:46:44', 1),
(39, 1, 'Do you often feel stressed or under strain?', '2013-12-23 02:47:04', '2013-12-23 02:47:04', 1),
(40, 1, 'Do you have a tendency to be moody or easily depressed?', '2013-12-23 02:47:56', '2013-12-23 02:47:56', 1),
(41, 1, 'Do you tend to suffer from episodic anxiety or panic attacks?', '2013-12-23 02:48:29', '2013-12-23 02:48:29', 1),
(42, 1, 'Do you feel tired on wakening in the morning?', '2013-12-23 02:48:58', '2013-12-23 02:48:58', 1),
(43, 1, 'Do you frequently feel excessively tired or exhausted?', '2013-12-23 02:49:26', '2013-12-23 02:49:26', 1),
(44, 1, 'Do you tend to get a dull ache in the small of the back?', '2013-12-23 02:49:52', '2013-12-23 02:49:52', 1),
(45, 1, 'Do you suffer from a burning sensation in the feet?', '2013-12-23 02:50:23', '2013-12-23 03:05:54', 1),
(46, 1, 'Do you suffer from constipation?', '2013-12-23 02:50:54', '2013-12-23 02:50:54', 1),
(47, 1, 'Do you find that your co-coordination has diminished?', '2013-12-23 02:51:24', '2013-12-23 02:51:24', 1),
(48, 1, 'Do you get a low back ache especially on getting up in the morning?', '2013-12-23 02:51:54', '2013-12-23 02:51:54', 1),
(49, 1, 'Do you get an ''electric shock'' type of sensation on bending your neck quickly?', '2013-12-23 02:52:40', '2013-12-23 02:52:40', 1),
(50, 1, 'Has your memory deteriorated?', '2013-12-23 02:52:56', '2013-12-23 02:52:56', 1),
(51, 1, 'Do you suffer from muscle twitching or cramping?', '2013-12-23 02:53:27', '2013-12-23 02:53:27', 1),
(52, 1, 'Ar you sensitive to loud sounds?', '2013-12-23 02:53:39', '2013-12-23 02:53:39', 1),
(53, 1, 'Do you find that your food tends to be tasteless?', '2013-12-23 02:53:57', '2013-12-23 02:53:57', 1),
(54, 1, 'Do you find that your cuts and sores tend to heal slowly?', '2013-12-23 02:54:26', '2013-12-23 02:54:26', 1),
(55, 1, 'Do you have white spots or streaks in your fingernails?', '2013-12-23 02:54:51', '2013-12-23 02:54:51', 1),
(56, 1, 'Do you have horizontal grooves in your fingernails?', '2013-12-23 02:58:22', '2013-12-23 04:06:38', 1),
(57, 1, 'Are your nails brittle or breaking easily?', '2013-12-23 02:58:36', '2013-12-23 04:06:50', 1),
(58, 1, 'Are your nails soft and papery?', '2013-12-23 02:59:14', '2013-12-23 04:07:00', 1),
(59, 1, 'Do you have stretch marks on your hips, stomach or buttocks?', '2013-12-23 03:00:48', '2013-12-23 04:07:09', 1),
(60, 1, 'Did you suffer from growing pains in the legs during your early teenage years?', '2013-12-23 03:01:20', '2013-12-23 04:07:25', 1),
(61, 1, 'Did you suffer from acne during your adolescence?', '2013-12-23 03:02:50', '2013-12-23 04:07:52', 1),
(62, 1, 'Did you suffer from acne after adolescence?', '2013-12-23 04:08:21', '2013-12-23 04:08:21', 1),
(63, 1, 'Do you suffer from dry or flakey skin?', '2013-12-23 04:08:52', '2013-12-23 04:08:52', 1),
(64, 1, 'Do your nails easily split or peel back?', '2013-12-23 04:09:21', '2013-12-23 04:09:21', 1),
(65, 1, 'Do you get irritation or itching inside your ears?', '2013-12-23 04:09:38', '2013-12-23 04:09:38', 1),
(66, 1, 'Does the skin on your face or upper chest feel dry or lumpy?', '2013-12-23 04:10:07', '2013-12-23 04:10:07', 1),
(67, 1, 'Is your hair dull or lusterless?', '2013-12-23 04:10:30', '2013-12-23 04:10:30', 1),
(68, 1, 'Is the skin on your heels thickened?', '2013-12-23 04:10:47', '2013-12-23 04:10:47', 1),
(69, 1, 'Is the skin on your heels cracked and/or painful?', '2013-12-23 04:29:32', '2013-12-23 04:29:32', 1),
(70, 1, 'Do you find you cannot fully straighten the 4th and 5th fingers of your hand?', '2013-12-23 04:31:54', '2013-12-23 04:31:54', 1),
(71, 1, 'Do you get pain or soreness in the muscles with walking?', '2013-12-23 04:32:46', '2013-12-23 04:32:46', 1),
(72, 1, 'Is the skin of your feet or toes pale and cold?', '2013-12-23 04:33:51', '2013-12-23 04:33:51', 1),
(73, 1, 'Are the nails of your toes thickened or deformed?', '2013-12-23 04:34:11', '2013-12-23 04:34:11', 1),
(74, 1, 'Do you find that you tire easily?', '2013-12-23 04:34:26', '2013-12-23 04:34:26', 1),
(75, 1, 'Do you get hungry between meals or at night?', '2013-12-23 04:34:50', '2013-12-23 04:34:50', 1),
(76, 1, 'Do you wake after a few hours sleep?', '2013-12-23 04:35:19', '2013-12-23 04:35:19', 1),
(77, 1, 'Do you feel scared for now obvious reason?', '2013-12-23 04:35:34', '2013-12-23 04:35:34', 1),
(78, 1, 'Do you frequently worry about things?', '2013-12-23 04:36:01', '2013-12-23 04:36:01', 1),
(79, 1, 'Do you get bouts of feeling insecure?', '2013-12-23 04:36:21', '2013-12-23 04:36:21', 1),
(80, 1, 'Do your feelings fluctuate quickly?', '2013-12-23 04:36:35', '2013-12-23 04:36:59', 1),
(81, 1, 'Do you tend to cry or feel like crying easily?', '2013-12-23 04:37:23', '2013-12-23 04:37:23', 1),
(82, 1, 'Do you have bouts of unreasonable anger or behavior?', '2013-12-23 04:38:32', '2013-12-23 04:38:32', 1),
(83, 1, 'Do you tend to magnify insignificant events?', '2013-12-23 04:48:17', '2013-12-23 04:48:17', 1),
(84, 1, 'Do you drink more than 2 cups of coffee or cola drinks per day?', '2013-12-23 04:56:10', '2013-12-23 04:56:10', 1),
(85, 1, 'Do you crave candy soft drinks or coffee between meals, or during the afternoon?', '2013-12-23 04:56:42', '2013-12-23 04:56:42', 1),
(86, 1, 'Do you find yourself unable to perform well under pressure?', '2013-12-23 04:57:10', '2013-12-23 04:57:10', 1),
(87, 1, 'Do you suffer from headaches?', '2013-12-23 04:57:23', '2013-12-23 04:57:23', 1),
(88, 1, 'Do you feel sleepy during the day?', '2013-12-23 04:57:40', '2013-12-23 04:57:40', 1),
(89, 1, 'Do you feel drowsy or sleepy after meals?', '2013-12-23 04:58:00', '2013-12-23 04:58:00', 1),
(90, 1, 'Do you have periods of low energy?', '2013-12-23 04:58:16', '2013-12-23 04:58:16', 1),
(91, 1, 'Do you have to push yourself to get things done?', '2013-12-23 04:58:39', '2013-12-23 04:58:39', 1),
(92, 1, 'Do you eat when nervous or tired?', '2013-12-23 04:58:50', '2013-12-23 04:58:50', 1),
(93, 1, 'Do you get stomach cramps or nervous stomach?', '2013-12-23 05:00:33', '2013-12-23 05:00:33', 1),
(94, 1, 'Do you find that eating gives you relief from tiredness?', '2013-12-23 05:01:08', '2013-12-23 05:01:08', 1),
(95, 1, 'Do you have suicidal thoughts or feelings?', '2013-12-23 05:01:25', '2013-12-23 05:01:25', 1),
(96, 1, 'Do you have feelings of hopelessness?', '2013-12-23 05:24:29', '2013-12-23 05:24:29', 1),
(97, 1, 'Do you get bad dreams nightmare or restless sleep?', '2013-12-23 05:24:49', '2013-12-23 05:24:49', 1),
(98, 1, 'Do you get irritable before meals?', '2013-12-23 05:25:04', '2013-12-23 05:25:04', 1),
(99, 1, 'Do you get shakey inside when hungry or after meals?', '2013-12-23 05:25:36', '2013-12-23 05:25:36', 1),
(100, 1, 'Do you feel faint or lightheaded if meals are delayed or missed?', '2013-12-23 05:26:07', '2013-12-23 05:26:07', 1),
(101, 1, 'Do you get generalised muscle aches and pains?', '2013-12-23 05:27:05', '2013-12-23 05:27:05', 1),
(102, 1, 'Do you suffer from pain in the neck and shoulder muscles?', '2013-12-23 05:28:40', '2013-12-23 05:28:40', 1),
(103, 1, 'Do you get blurred vision especially if tired or hungry?', '2013-12-23 05:29:42', '2013-12-23 05:29:42', 1),
(104, 1, 'Do you get short of breath on exertion?', '2013-12-23 05:30:49', '2013-12-23 05:30:49', 1),
(105, 1, 'Do you have a reduced sex drive?', '2013-12-23 05:31:12', '2013-12-23 05:31:12', 1),
(106, 1, 'Do you sweat excessively?', '2013-12-23 09:32:06', '2013-12-23 09:32:06', 1),
(107, 1, 'Do you find it difficult to maintain an ideal weight?', '2013-12-23 09:32:25', '2013-12-23 09:32:25', 1),
(108, 1, 'Do you have an excessive thirst or frequent urination?', '2013-12-23 09:32:47', '2013-12-23 09:32:47', 1),
(109, 1, 'Do you get sore aching eyes with intensive use?', '2013-12-23 09:33:11', '2013-12-23 09:33:11', 1),
(110, 1, 'Do you tend to get episodes of fluid retention?', '2013-12-23 09:33:27', '2013-12-23 09:33:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` tinytext COLLATE utf8_unicode_ci COMMENT 'full url to avatar image file',
  `language` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `username`, `name`, `password`, `email`, `avatar`, `language`, `timezone`, `key`, `status`, `created`, `modified`, `last_login`) VALUES
(1, 1, NULL, 'Glenn Salvosa', 'e9bc16ed001ad294aa1d4b917233518121120419', 'gd.salvosa@gmail.com', NULL, NULL, NULL, NULL, 1, '2014-04-03 03:26:46', '2014-04-11 20:25:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_vitamins`
--

CREATE TABLE IF NOT EXISTS `users_vitamins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `vitamins_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_access_logs`
--

CREATE TABLE IF NOT EXISTS `user_access_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `middle_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(150) NOT NULL,
  `nationality` varchar(60) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `vitamins`
--

CREATE TABLE IF NOT EXISTS `vitamins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `vitamin_name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `benefits` text NOT NULL,
  `origin_country` bigint(5) NOT NULL,
  `manufacturer` varchar(180) NOT NULL,
  `distributor` int(180) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE IF NOT EXISTS `widgets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `template_id` bigint(20) DEFAULT NULL,
  `hosted_url` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
