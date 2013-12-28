-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2013 at 01:47 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `acos`
--

INSERT INTO `acos` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 168),
(2, 1, NULL, NULL, 'AnalysisResults', 2, 13),
(3, 2, NULL, NULL, 'index', 3, 4),
(4, 2, NULL, NULL, 'view', 5, 6),
(5, 2, NULL, NULL, 'add', 7, 8),
(6, 2, NULL, NULL, 'edit', 9, 10),
(7, 2, NULL, NULL, 'delete', 11, 12),
(8, 1, NULL, NULL, 'Answers', 14, 25),
(9, 8, NULL, NULL, 'index', 15, 16),
(10, 8, NULL, NULL, 'view', 17, 18),
(11, 8, NULL, NULL, 'add', 19, 20),
(12, 8, NULL, NULL, 'edit', 21, 22),
(13, 8, NULL, NULL, 'delete', 23, 24),
(14, 1, NULL, NULL, 'Choices', 26, 37),
(15, 14, NULL, NULL, 'index', 27, 28),
(16, 14, NULL, NULL, 'view', 29, 30),
(17, 14, NULL, NULL, 'add', 31, 32),
(18, 14, NULL, NULL, 'edit', 33, 34),
(19, 14, NULL, NULL, 'delete', 35, 36),
(20, 1, NULL, NULL, 'Contents', 38, 49),
(21, 20, NULL, NULL, 'index', 39, 40),
(22, 20, NULL, NULL, 'view', 41, 42),
(23, 20, NULL, NULL, 'add', 43, 44),
(24, 20, NULL, NULL, 'edit', 45, 46),
(25, 20, NULL, NULL, 'delete', 47, 48),
(26, 1, NULL, NULL, 'Factors', 50, 61),
(27, 26, NULL, NULL, 'index', 51, 52),
(28, 26, NULL, NULL, 'view', 53, 54),
(29, 26, NULL, NULL, 'add', 55, 56),
(30, 26, NULL, NULL, 'edit', 57, 58),
(31, 26, NULL, NULL, 'delete', 59, 60),
(32, 1, NULL, NULL, 'Histories', 62, 73),
(33, 32, NULL, NULL, 'index', 63, 64),
(34, 32, NULL, NULL, 'view', 65, 66),
(35, 32, NULL, NULL, 'add', 67, 68),
(36, 32, NULL, NULL, 'edit', 69, 70),
(37, 32, NULL, NULL, 'delete', 71, 72),
(38, 1, NULL, NULL, 'NutritionalGuides', 74, 85),
(39, 38, NULL, NULL, 'index', 75, 76),
(40, 38, NULL, NULL, 'view', 77, 78),
(41, 38, NULL, NULL, 'add', 79, 80),
(42, 38, NULL, NULL, 'edit', 81, 82),
(43, 38, NULL, NULL, 'delete', 83, 84),
(44, 1, NULL, NULL, 'Pages', 86, 89),
(45, 44, NULL, NULL, 'display', 87, 88),
(46, 1, NULL, NULL, 'Questions', 90, 101),
(47, 46, NULL, NULL, 'index', 91, 92),
(48, 46, NULL, NULL, 'view', 93, 94),
(49, 46, NULL, NULL, 'add', 95, 96),
(50, 46, NULL, NULL, 'edit', 97, 98),
(51, 46, NULL, NULL, 'delete', 99, 100),
(52, 1, NULL, NULL, 'UserAccessLogs', 102, 113),
(53, 52, NULL, NULL, 'index', 103, 104),
(54, 52, NULL, NULL, 'view', 105, 106),
(55, 52, NULL, NULL, 'add', 107, 108),
(56, 52, NULL, NULL, 'edit', 109, 110),
(57, 52, NULL, NULL, 'delete', 111, 112),
(58, 1, NULL, NULL, 'UserGroups', 114, 125),
(59, 58, NULL, NULL, 'index', 115, 116),
(60, 58, NULL, NULL, 'view', 117, 118),
(61, 58, NULL, NULL, 'add', 119, 120),
(62, 58, NULL, NULL, 'edit', 121, 122),
(63, 58, NULL, NULL, 'delete', 123, 124),
(64, 1, NULL, NULL, 'UserProfiles', 126, 137),
(65, 64, NULL, NULL, 'index', 127, 128),
(66, 64, NULL, NULL, 'view', 129, 130),
(67, 64, NULL, NULL, 'add', 131, 132),
(68, 64, NULL, NULL, 'edit', 133, 134),
(69, 64, NULL, NULL, 'delete', 135, 136),
(70, 1, NULL, NULL, 'Users', 138, 153),
(71, 70, NULL, NULL, 'index', 139, 140),
(72, 70, NULL, NULL, 'view', 141, 142),
(73, 70, NULL, NULL, 'add', 143, 144),
(74, 70, NULL, NULL, 'edit', 145, 146),
(75, 70, NULL, NULL, 'delete', 147, 148),
(76, 70, NULL, NULL, 'login', 149, 150),
(77, 70, NULL, NULL, 'logout', 151, 152),
(78, 1, NULL, NULL, 'Vitamins', 154, 165),
(79, 78, NULL, NULL, 'index', 155, 156),
(80, 78, NULL, NULL, 'view', 157, 158),
(81, 78, NULL, NULL, 'add', 159, 160),
(82, 78, NULL, NULL, 'edit', 161, 162),
(83, 78, NULL, NULL, 'delete', 163, 164),
(84, 1, NULL, NULL, 'AclExtras', 166, 167);

-- --------------------------------------------------------

--
-- Table structure for table `analysis_results`
--

CREATE TABLE IF NOT EXISTS `analysis_results` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `factors_id` bigint(20) NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `score` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `analysis_results`
--


-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) NOT NULL,
  `questions_id` bigint(20) NOT NULL,
  `performed_checks_id` bigint(20) NOT NULL,
  `choice_id` bigint(20) DEFAULT NULL,
  `rank` int(5) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `answers`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `aros`
--

INSERT INTO `aros` (`id`, `parent_id`, `model`, `foreign_key`, `alias`, `lft`, `rght`) VALUES
(1, NULL, NULL, NULL, 'controllers', 1, 2),
(2, NULL, 'UserGroup', 1, NULL, 3, 6),
(3, 2, 'User', 1, NULL, 4, 5);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `aros_acos`
--

INSERT INTO `aros_acos` (`id`, `aro_id`, `aco_id`, `_create`, `_read`, `_update`, `_delete`) VALUES
(1, 2, 1, '1', '1', '1', '1');

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

--
-- Dumping data for table `choices`
--


-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE IF NOT EXISTS `contents` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `contents`
--


-- --------------------------------------------------------

--
-- Table structure for table `factors`
--

CREATE TABLE IF NOT EXISTS `factors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `users_id` bigint(20) NOT NULL COMMENT 'creator id',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `factors`
--

INSERT INTO `factors` (`id`, `name`, `description`, `users_id`, `created`, `modified`, `status`) VALUES
(1, 'Allergy', 'Allergy', 1, '2013-12-23 09:44:20', '2013-12-23 09:44:20', 1),
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
-- Table structure for table `histories`
--

CREATE TABLE IF NOT EXISTS `histories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) NOT NULL,
  `diagnostics` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `histories`
--


-- --------------------------------------------------------

--
-- Table structure for table `nutritional_guides`
--

CREATE TABLE IF NOT EXISTS `nutritional_guides` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `users_id` bigint(20) NOT NULL COMMENT 'creator id',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nutritional_guides`
--


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

--
-- Dumping data for table `performed_checks`
--


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) NOT NULL,
  `question` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=111 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `users_id`, `question`, `created`, `modified`, `status`) VALUES
(1, 1, 'Does your hair tend to fall out or break easily?', '2013-12-21 15:17:03', '2013-12-21 15:17:03', 1),
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
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `user_groups_id` int(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `user_groups_id`, `created`, `modified`, `status`) VALUES
(1, 'glennsalvosa', '7e4a4b6c0e6824e3d6a3108793946e989cbd6d3e', 'gd.salvosa@gmail.com', 1, '2013-12-23 09:48:24', '2013-12-23 09:48:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_vitamins`
--

CREATE TABLE IF NOT EXISTS `users_vitamins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) NOT NULL,
  `vitamins_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users_vitamins`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_access_logs`
--

CREATE TABLE IF NOT EXISTS `user_access_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user_access_logs`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `name`, `created`, `modified`, `status`) VALUES
(1, 'Administrator', '2013-12-23 09:47:48', '2013-12-23 09:47:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) NOT NULL,
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

--
-- Dumping data for table `user_profiles`
--


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

--
-- Dumping data for table `vitamins`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
