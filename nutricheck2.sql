/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50536
Source Host           : localhost:3306
Source Database       : nutricheck

Target Server Type    : MYSQL
Target Server Version : 50536
File Encoding         : 65001

Date: 2014-09-03 09:40:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for acos
-- ----------------------------
DROP TABLE IF EXISTS `acos`;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=259 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of acos
-- ----------------------------
INSERT INTO `acos` VALUES ('1', null, null, null, 'controllers', '1', '474');
INSERT INTO `acos` VALUES ('2', '1', null, null, 'AnalysisResults', '2', '13');
INSERT INTO `acos` VALUES ('3', '2', null, null, 'index', '3', '4');
INSERT INTO `acos` VALUES ('4', '2', null, null, 'view', '5', '6');
INSERT INTO `acos` VALUES ('5', '2', null, null, 'add', '7', '8');
INSERT INTO `acos` VALUES ('6', '2', null, null, 'edit', '9', '10');
INSERT INTO `acos` VALUES ('7', '2', null, null, 'delete', '11', '12');
INSERT INTO `acos` VALUES ('8', '1', null, null, 'Answers', '14', '31');
INSERT INTO `acos` VALUES ('9', '8', null, null, 'index', '15', '16');
INSERT INTO `acos` VALUES ('10', '8', null, null, 'view', '17', '18');
INSERT INTO `acos` VALUES ('11', '8', null, null, 'add', '19', '20');
INSERT INTO `acos` VALUES ('12', '8', null, null, 'edit', '21', '22');
INSERT INTO `acos` VALUES ('13', '8', null, null, 'delete', '23', '24');
INSERT INTO `acos` VALUES ('14', '8', null, null, 'report', '25', '26');
INSERT INTO `acos` VALUES ('15', '8', null, null, 'load_date_report', '27', '28');
INSERT INTO `acos` VALUES ('16', '1', null, null, 'BaseNutrients', '32', '43');
INSERT INTO `acos` VALUES ('17', '16', null, null, 'index', '33', '34');
INSERT INTO `acos` VALUES ('18', '16', null, null, 'view', '35', '36');
INSERT INTO `acos` VALUES ('19', '16', null, null, 'add', '37', '38');
INSERT INTO `acos` VALUES ('20', '16', null, null, 'edit', '39', '40');
INSERT INTO `acos` VALUES ('21', '16', null, null, 'delete', '41', '42');
INSERT INTO `acos` VALUES ('22', '1', null, null, 'Choices', '44', '55');
INSERT INTO `acos` VALUES ('23', '22', null, null, 'index', '45', '46');
INSERT INTO `acos` VALUES ('24', '22', null, null, 'view', '47', '48');
INSERT INTO `acos` VALUES ('25', '22', null, null, 'add', '49', '50');
INSERT INTO `acos` VALUES ('26', '22', null, null, 'edit', '51', '52');
INSERT INTO `acos` VALUES ('27', '22', null, null, 'delete', '53', '54');
INSERT INTO `acos` VALUES ('28', '1', null, null, 'Contents', '56', '67');
INSERT INTO `acos` VALUES ('29', '28', null, null, 'index', '57', '58');
INSERT INTO `acos` VALUES ('30', '28', null, null, 'view', '59', '60');
INSERT INTO `acos` VALUES ('31', '28', null, null, 'add', '61', '62');
INSERT INTO `acos` VALUES ('32', '28', null, null, 'edit', '63', '64');
INSERT INTO `acos` VALUES ('33', '28', null, null, 'delete', '65', '66');
INSERT INTO `acos` VALUES ('34', '1', null, null, 'Factors', '68', '79');
INSERT INTO `acos` VALUES ('35', '34', null, null, 'index', '69', '70');
INSERT INTO `acos` VALUES ('36', '34', null, null, 'view', '71', '72');
INSERT INTO `acos` VALUES ('37', '34', null, null, 'add', '73', '74');
INSERT INTO `acos` VALUES ('38', '34', null, null, 'edit', '75', '76');
INSERT INTO `acos` VALUES ('39', '34', null, null, 'delete', '77', '78');
INSERT INTO `acos` VALUES ('40', '1', null, null, 'FactorsQuestions', '80', '97');
INSERT INTO `acos` VALUES ('41', '40', null, null, 'index', '81', '82');
INSERT INTO `acos` VALUES ('42', '40', null, null, 'view', '83', '84');
INSERT INTO `acos` VALUES ('43', '40', null, null, 'add', '85', '86');
INSERT INTO `acos` VALUES ('44', '40', null, null, 'question_add', '87', '88');
INSERT INTO `acos` VALUES ('45', '40', null, null, 'edit', '89', '90');
INSERT INTO `acos` VALUES ('46', '40', null, null, 'question_edit', '91', '92');
INSERT INTO `acos` VALUES ('47', '40', null, null, 'delete', '93', '94');
INSERT INTO `acos` VALUES ('48', '40', null, null, 'nutrient_check', '95', '96');
INSERT INTO `acos` VALUES ('55', '1', null, null, 'Histories', '98', '109');
INSERT INTO `acos` VALUES ('56', '55', null, null, 'index', '99', '100');
INSERT INTO `acos` VALUES ('57', '55', null, null, 'view', '101', '102');
INSERT INTO `acos` VALUES ('58', '55', null, null, 'add', '103', '104');
INSERT INTO `acos` VALUES ('59', '55', null, null, 'edit', '105', '106');
INSERT INTO `acos` VALUES ('60', '55', null, null, 'delete', '107', '108');
INSERT INTO `acos` VALUES ('61', '1', null, null, 'NutritionalGuides', '110', '123');
INSERT INTO `acos` VALUES ('62', '61', null, null, 'index', '111', '112');
INSERT INTO `acos` VALUES ('63', '61', null, null, 'view', '113', '114');
INSERT INTO `acos` VALUES ('64', '61', null, null, 'add', '115', '116');
INSERT INTO `acos` VALUES ('65', '61', null, null, 'edit', '117', '118');
INSERT INTO `acos` VALUES ('66', '61', null, null, 'delete', '119', '120');
INSERT INTO `acos` VALUES ('67', '1', null, null, 'Pages', '124', '127');
INSERT INTO `acos` VALUES ('68', '67', null, null, 'display', '125', '126');
INSERT INTO `acos` VALUES ('69', '1', null, null, 'PerformedChecks', '128', '143');
INSERT INTO `acos` VALUES ('70', '69', null, null, 'index', '129', '130');
INSERT INTO `acos` VALUES ('71', '69', null, null, 'view', '131', '132');
INSERT INTO `acos` VALUES ('72', '69', null, null, 'add', '133', '134');
INSERT INTO `acos` VALUES ('73', '69', null, null, 'edit', '135', '136');
INSERT INTO `acos` VALUES ('74', '69', null, null, 'delete', '137', '138');
INSERT INTO `acos` VALUES ('75', '1', null, null, 'Prescriptions', '144', '155');
INSERT INTO `acos` VALUES ('76', '75', null, null, 'index', '145', '146');
INSERT INTO `acos` VALUES ('77', '75', null, null, 'view', '147', '148');
INSERT INTO `acos` VALUES ('78', '75', null, null, 'add', '149', '150');
INSERT INTO `acos` VALUES ('79', '75', null, null, 'edit', '151', '152');
INSERT INTO `acos` VALUES ('80', '75', null, null, 'delete', '153', '154');
INSERT INTO `acos` VALUES ('81', '1', null, null, 'Qgroups', '156', '177');
INSERT INTO `acos` VALUES ('82', '81', null, null, 'index', '157', '158');
INSERT INTO `acos` VALUES ('83', '81', null, null, 'view', '159', '160');
INSERT INTO `acos` VALUES ('84', '81', null, null, 'add', '161', '162');
INSERT INTO `acos` VALUES ('85', '81', null, null, 'edit', '163', '164');
INSERT INTO `acos` VALUES ('86', '81', null, null, 'delete', '165', '166');
INSERT INTO `acos` VALUES ('87', '81', null, null, 'save_group_assoc', '167', '168');
INSERT INTO `acos` VALUES ('88', '81', null, null, 'ajax_update', '169', '170');
INSERT INTO `acos` VALUES ('89', '81', null, null, 'ajax_create', '171', '172');
INSERT INTO `acos` VALUES ('90', '81', null, null, 'load_questions', '173', '174');
INSERT INTO `acos` VALUES ('91', '1', null, null, 'Questions', '178', '207');
INSERT INTO `acos` VALUES ('92', '91', null, null, 'index', '179', '180');
INSERT INTO `acos` VALUES ('93', '91', null, null, 'view', '181', '182');
INSERT INTO `acos` VALUES ('94', '91', null, null, 'add', '183', '184');
INSERT INTO `acos` VALUES ('95', '91', null, null, 'edit', '185', '186');
INSERT INTO `acos` VALUES ('96', '91', null, null, 'delete', '187', '188');
INSERT INTO `acos` VALUES ('97', '91', null, null, 'nutrient_check', '189', '190');
INSERT INTO `acos` VALUES ('98', '91', null, null, 'remote_nutrient_check', '191', '192');
INSERT INTO `acos` VALUES ('99', '91', null, null, 'save_remote_nutrient_check', '193', '194');
INSERT INTO `acos` VALUES ('100', '91', null, null, 'qgroup_cart', '195', '196');
INSERT INTO `acos` VALUES ('101', '91', null, null, 'qgroup_cart_remove', '197', '198');
INSERT INTO `acos` VALUES ('102', '91', null, null, 'array_delete', '199', '200');
INSERT INTO `acos` VALUES ('103', '1', null, null, 'TempAnswers', '208', '219');
INSERT INTO `acos` VALUES ('104', '103', null, null, 'index', '209', '210');
INSERT INTO `acos` VALUES ('105', '103', null, null, 'view', '211', '212');
INSERT INTO `acos` VALUES ('106', '103', null, null, 'add', '213', '214');
INSERT INTO `acos` VALUES ('107', '103', null, null, 'edit', '215', '216');
INSERT INTO `acos` VALUES ('108', '103', null, null, 'delete', '217', '218');
INSERT INTO `acos` VALUES ('109', '1', null, null, 'Templates', '220', '231');
INSERT INTO `acos` VALUES ('110', '109', null, null, 'index', '221', '222');
INSERT INTO `acos` VALUES ('111', '109', null, null, 'view', '223', '224');
INSERT INTO `acos` VALUES ('112', '109', null, null, 'add', '225', '226');
INSERT INTO `acos` VALUES ('113', '109', null, null, 'edit', '227', '228');
INSERT INTO `acos` VALUES ('114', '109', null, null, 'delete', '229', '230');
INSERT INTO `acos` VALUES ('115', '1', null, null, 'UserAccessLogs', '232', '243');
INSERT INTO `acos` VALUES ('116', '115', null, null, 'index', '233', '234');
INSERT INTO `acos` VALUES ('117', '115', null, null, 'view', '235', '236');
INSERT INTO `acos` VALUES ('118', '115', null, null, 'add', '237', '238');
INSERT INTO `acos` VALUES ('119', '115', null, null, 'edit', '239', '240');
INSERT INTO `acos` VALUES ('120', '115', null, null, 'delete', '241', '242');
INSERT INTO `acos` VALUES ('121', '1', null, null, 'UserProfiles', '244', '255');
INSERT INTO `acos` VALUES ('122', '121', null, null, 'index', '245', '246');
INSERT INTO `acos` VALUES ('123', '121', null, null, 'view', '247', '248');
INSERT INTO `acos` VALUES ('124', '121', null, null, 'add', '249', '250');
INSERT INTO `acos` VALUES ('125', '121', null, null, 'edit', '251', '252');
INSERT INTO `acos` VALUES ('126', '121', null, null, 'delete', '253', '254');
INSERT INTO `acos` VALUES ('138', '1', null, null, 'Vitamins', '256', '267');
INSERT INTO `acos` VALUES ('139', '138', null, null, 'index', '257', '258');
INSERT INTO `acos` VALUES ('140', '138', null, null, 'view', '259', '260');
INSERT INTO `acos` VALUES ('141', '138', null, null, 'add', '261', '262');
INSERT INTO `acos` VALUES ('142', '138', null, null, 'edit', '263', '264');
INSERT INTO `acos` VALUES ('143', '138', null, null, 'delete', '265', '266');
INSERT INTO `acos` VALUES ('144', '1', null, null, 'Widgets', '268', '279');
INSERT INTO `acos` VALUES ('145', '144', null, null, 'index', '269', '270');
INSERT INTO `acos` VALUES ('146', '144', null, null, 'view', '271', '272');
INSERT INTO `acos` VALUES ('147', '144', null, null, 'add', '273', '274');
INSERT INTO `acos` VALUES ('148', '144', null, null, 'edit', '275', '276');
INSERT INTO `acos` VALUES ('149', '144', null, null, 'delete', '277', '278');
INSERT INTO `acos` VALUES ('150', '1', null, null, 'AclManagement', '280', '345');
INSERT INTO `acos` VALUES ('151', '150', null, null, 'Groups', '281', '292');
INSERT INTO `acos` VALUES ('152', '151', null, null, 'index', '282', '283');
INSERT INTO `acos` VALUES ('153', '151', null, null, 'view', '284', '285');
INSERT INTO `acos` VALUES ('154', '151', null, null, 'add', '286', '287');
INSERT INTO `acos` VALUES ('155', '151', null, null, 'edit', '288', '289');
INSERT INTO `acos` VALUES ('156', '151', null, null, 'delete', '290', '291');
INSERT INTO `acos` VALUES ('157', '150', null, null, 'UserPermissions', '293', '302');
INSERT INTO `acos` VALUES ('158', '157', null, null, 'index', '294', '295');
INSERT INTO `acos` VALUES ('159', '157', null, null, 'sync', '296', '297');
INSERT INTO `acos` VALUES ('160', '157', null, null, 'edit', '298', '299');
INSERT INTO `acos` VALUES ('161', '157', null, null, 'toggle', '300', '301');
INSERT INTO `acos` VALUES ('162', '150', null, null, 'Users', '303', '344');
INSERT INTO `acos` VALUES ('163', '162', null, null, 'index', '304', '305');
INSERT INTO `acos` VALUES ('164', '162', null, null, 'view', '306', '307');
INSERT INTO `acos` VALUES ('167', '162', null, null, 'delete', '308', '309');
INSERT INTO `acos` VALUES ('170', '162', null, null, 'dashboard', '310', '311');
INSERT INTO `acos` VALUES ('171', '162', null, null, 'nutricheck_activity', '312', '313');
INSERT INTO `acos` VALUES ('172', '162', null, null, 'remote_register', '314', '315');
INSERT INTO `acos` VALUES ('173', '1', null, null, 'NutritionalGuideTypes', '346', '357');
INSERT INTO `acos` VALUES ('174', '173', null, null, 'index', '347', '348');
INSERT INTO `acos` VALUES ('175', '173', null, null, 'view', '349', '350');
INSERT INTO `acos` VALUES ('176', '173', null, null, 'add', '351', '352');
INSERT INTO `acos` VALUES ('177', '173', null, null, 'edit', '353', '354');
INSERT INTO `acos` VALUES ('178', '173', null, null, 'delete', '355', '356');
INSERT INTO `acos` VALUES ('179', '81', null, null, 'load_preview', '175', '176');
INSERT INTO `acos` VALUES ('180', '91', null, null, 'deactivate_user_answer', '201', '202');
INSERT INTO `acos` VALUES ('181', '91', null, null, 'activate_user_answer', '203', '204');
INSERT INTO `acos` VALUES ('182', '1', null, null, 'UserGroups', '358', '369');
INSERT INTO `acos` VALUES ('183', '182', null, null, 'index', '359', '360');
INSERT INTO `acos` VALUES ('184', '182', null, null, 'view', '361', '362');
INSERT INTO `acos` VALUES ('185', '182', null, null, 'add', '363', '364');
INSERT INTO `acos` VALUES ('186', '182', null, null, 'edit', '365', '366');
INSERT INTO `acos` VALUES ('187', '182', null, null, 'delete', '367', '368');
INSERT INTO `acos` VALUES ('188', '8', null, null, 'report_print', '29', '30');
INSERT INTO `acos` VALUES ('189', '1', null, null, 'Videos', '370', '381');
INSERT INTO `acos` VALUES ('190', '189', null, null, 'index', '371', '372');
INSERT INTO `acos` VALUES ('191', '189', null, null, 'view', '373', '374');
INSERT INTO `acos` VALUES ('192', '189', null, null, 'add', '375', '376');
INSERT INTO `acos` VALUES ('193', '189', null, null, 'edit', '377', '378');
INSERT INTO `acos` VALUES ('194', '189', null, null, 'delete', '379', '380');
INSERT INTO `acos` VALUES ('195', '162', null, null, 'login', '316', '317');
INSERT INTO `acos` VALUES ('196', '162', null, null, 'logout', '318', '319');
INSERT INTO `acos` VALUES ('197', '162', null, null, 'add', '320', '321');
INSERT INTO `acos` VALUES ('198', '162', null, null, 'is_authorized_action', '322', '323');
INSERT INTO `acos` VALUES ('199', '162', null, null, 'edit', '324', '325');
INSERT INTO `acos` VALUES ('200', '162', null, null, 'toggle', '326', '327');
INSERT INTO `acos` VALUES ('201', '162', null, null, 'toggle_can_answer', '328', '329');
INSERT INTO `acos` VALUES ('202', '162', null, null, 'register', '330', '331');
INSERT INTO `acos` VALUES ('203', '162', null, null, 'confirm_register', '332', '333');
INSERT INTO `acos` VALUES ('204', '162', null, null, 'forgot_password', '334', '335');
INSERT INTO `acos` VALUES ('205', '162', null, null, 'activate_password', '336', '337');
INSERT INTO `acos` VALUES ('206', '162', null, null, 'edit_profile', '338', '339');
INSERT INTO `acos` VALUES ('207', '162', null, null, 'confirm_email_update', '340', '341');
INSERT INTO `acos` VALUES ('208', '1', null, null, 'Groups', '382', '393');
INSERT INTO `acos` VALUES ('209', '208', null, null, 'index', '383', '384');
INSERT INTO `acos` VALUES ('210', '208', null, null, 'view', '385', '386');
INSERT INTO `acos` VALUES ('211', '208', null, null, 'add', '387', '388');
INSERT INTO `acos` VALUES ('212', '208', null, null, 'edit', '389', '390');
INSERT INTO `acos` VALUES ('213', '208', null, null, 'delete', '391', '392');
INSERT INTO `acos` VALUES ('214', '61', null, null, 'data', '121', '122');
INSERT INTO `acos` VALUES ('215', '1', null, null, 'Users', '394', '435');
INSERT INTO `acos` VALUES ('216', '215', null, null, 'login', '395', '396');
INSERT INTO `acos` VALUES ('217', '215', null, null, 'logout', '397', '398');
INSERT INTO `acos` VALUES ('218', '215', null, null, 'index', '399', '400');
INSERT INTO `acos` VALUES ('219', '215', null, null, 'view', '401', '402');
INSERT INTO `acos` VALUES ('220', '215', null, null, 'add', '403', '404');
INSERT INTO `acos` VALUES ('221', '215', null, null, 'is_authorized_action', '405', '406');
INSERT INTO `acos` VALUES ('222', '215', null, null, 'edit', '407', '408');
INSERT INTO `acos` VALUES ('223', '215', null, null, 'delete', '409', '410');
INSERT INTO `acos` VALUES ('224', '215', null, null, 'toggle', '411', '412');
INSERT INTO `acos` VALUES ('225', '215', null, null, 'toggle_can_answer', '413', '414');
INSERT INTO `acos` VALUES ('226', '215', null, null, 'register', '415', '416');
INSERT INTO `acos` VALUES ('227', '215', null, null, 'confirm_register', '417', '418');
INSERT INTO `acos` VALUES ('228', '215', null, null, 'forgot_password', '419', '420');
INSERT INTO `acos` VALUES ('229', '215', null, null, 'activate_password', '421', '422');
INSERT INTO `acos` VALUES ('230', '215', null, null, 'edit_profile', '423', '424');
INSERT INTO `acos` VALUES ('231', '215', null, null, 'confirm_email_update', '425', '426');
INSERT INTO `acos` VALUES ('232', '215', null, null, 'dashboard', '427', '428');
INSERT INTO `acos` VALUES ('233', '215', null, null, 'nutricheck_activity', '429', '430');
INSERT INTO `acos` VALUES ('234', '215', null, null, 'remote_register', '431', '432');
INSERT INTO `acos` VALUES ('235', '215', null, null, 'check_email_existence', '433', '434');
INSERT INTO `acos` VALUES ('236', '162', null, null, 'check_email_existence', '342', '343');
INSERT INTO `acos` VALUES ('237', '1', null, null, 'FactorTypes', '436', '447');
INSERT INTO `acos` VALUES ('238', '237', null, null, 'index', '437', '438');
INSERT INTO `acos` VALUES ('239', '237', null, null, 'view', '439', '440');
INSERT INTO `acos` VALUES ('240', '237', null, null, 'add', '441', '442');
INSERT INTO `acos` VALUES ('241', '237', null, null, 'edit', '443', '444');
INSERT INTO `acos` VALUES ('242', '237', null, null, 'delete', '445', '446');
INSERT INTO `acos` VALUES ('243', '1', null, null, 'PageAccessFlags', '448', '459');
INSERT INTO `acos` VALUES ('244', '243', null, null, 'index', '449', '450');
INSERT INTO `acos` VALUES ('245', '243', null, null, 'view', '451', '452');
INSERT INTO `acos` VALUES ('246', '243', null, null, 'add', '453', '454');
INSERT INTO `acos` VALUES ('247', '243', null, null, 'edit', '455', '456');
INSERT INTO `acos` VALUES ('248', '243', null, null, 'delete', '457', '458');
INSERT INTO `acos` VALUES ('249', '91', null, null, 'print_question_list', '205', '206');
INSERT INTO `acos` VALUES ('250', '69', null, null, 'performed_checks', '139', '140');
INSERT INTO `acos` VALUES ('251', '1', null, null, 'Core', '460', '461');
INSERT INTO `acos` VALUES ('252', '69', null, null, 'send', '141', '142');
INSERT INTO `acos` VALUES ('253', '1', null, null, 'SelectedAnswerLogs', '462', '473');
INSERT INTO `acos` VALUES ('254', '253', null, null, 'index', '463', '464');
INSERT INTO `acos` VALUES ('255', '253', null, null, 'view', '465', '466');
INSERT INTO `acos` VALUES ('256', '253', null, null, 'add', '467', '468');
INSERT INTO `acos` VALUES ('257', '253', null, null, 'edit', '469', '470');
INSERT INTO `acos` VALUES ('258', '253', null, null, 'delete', '471', '472');

-- ----------------------------
-- Table structure for analysis_results
-- ----------------------------
DROP TABLE IF EXISTS `analysis_results`;
CREATE TABLE `analysis_results` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `factors_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `score` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of analysis_results
-- ----------------------------

-- ----------------------------
-- Table structure for answers
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `link` text NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `factor_id` bigint(20) DEFAULT NULL,
  `choice_id` bigint(20) DEFAULT NULL,
  `rank` int(5) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of answers
-- ----------------------------
INSERT INTO `answers` VALUES ('1', '16', '127.0.0.1', '', '1', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('2', '16', '127.0.0.1', '', '2', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('3', '16', '127.0.0.1', '', '3', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('4', '16', '127.0.0.1', '', '4', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('5', '16', '127.0.0.1', '', '5', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('6', '16', '127.0.0.1', '', '6', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('7', '16', '127.0.0.1', '', '7', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('8', '16', '127.0.0.1', '', '8', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('9', '16', '127.0.0.1', '', '9', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('10', '16', '127.0.0.1', '', '10', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('11', '16', '127.0.0.1', '', '11', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('12', '16', '127.0.0.1', '', '12', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('13', '16', '127.0.0.1', '', '13', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('14', '16', '127.0.0.1', '', '14', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('15', '16', '127.0.0.1', '', '15', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('16', '16', '127.0.0.1', '', '16', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('17', '16', '127.0.0.1', '', '17', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('18', '16', '127.0.0.1', '', '18', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('19', '16', '127.0.0.1', '', '19', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('20', '16', '127.0.0.1', '', '20', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('21', '16', '127.0.0.1', '', '21', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('22', '16', '127.0.0.1', '', '22', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('23', '16', '127.0.0.1', '', '23', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('24', '16', '127.0.0.1', '', '24', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('25', '16', '127.0.0.1', '', '25', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('26', '16', '127.0.0.1', '', '26', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('27', '16', '127.0.0.1', '', '27', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('28', '16', '127.0.0.1', '', '28', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('29', '16', '127.0.0.1', '', '29', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('30', '16', '127.0.0.1', '', '30', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('31', '16', '127.0.0.1', '', '31', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('32', '16', '127.0.0.1', '', '32', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('33', '16', '127.0.0.1', '', '33', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('34', '16', '127.0.0.1', '', '34', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('35', '16', '127.0.0.1', '', '35', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('36', '16', '127.0.0.1', '', '36', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('37', '16', '127.0.0.1', '', '37', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('38', '16', '127.0.0.1', '', '38', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('39', '16', '127.0.0.1', '', '39', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('40', '16', '127.0.0.1', '', '40', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('41', '16', '127.0.0.1', '', '41', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('42', '16', '127.0.0.1', '', '42', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('43', '16', '127.0.0.1', '', '43', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('44', '16', '127.0.0.1', '', '44', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('45', '16', '127.0.0.1', '', '45', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('46', '16', '127.0.0.1', '', '46', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('47', '16', '127.0.0.1', '', '47', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('48', '16', '127.0.0.1', '', '48', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('49', '16', '127.0.0.1', '', '49', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('50', '16', '127.0.0.1', '', '50', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('51', '16', '127.0.0.1', '', '51', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('52', '16', '127.0.0.1', '', '52', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('53', '16', '127.0.0.1', '', '53', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('54', '16', '127.0.0.1', '', '54', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('55', '16', '127.0.0.1', '', '55', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('56', '16', '127.0.0.1', '', '56', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('57', '16', '127.0.0.1', '', '57', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('58', '16', '127.0.0.1', '', '58', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('59', '16', '127.0.0.1', '', '59', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('60', '16', '127.0.0.1', '', '60', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('61', '16', '127.0.0.1', '', '61', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('62', '16', '127.0.0.1', '', '62', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('63', '16', '127.0.0.1', '', '63', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('64', '16', '127.0.0.1', '', '64', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('65', '16', '127.0.0.1', '', '65', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('66', '16', '127.0.0.1', '', '66', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('67', '16', '127.0.0.1', '', '67', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('68', '16', '127.0.0.1', '', '68', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('69', '16', '127.0.0.1', '', '69', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('70', '16', '127.0.0.1', '', '70', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('71', '16', '127.0.0.1', '', '71', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('72', '16', '127.0.0.1', '', '72', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('73', '16', '127.0.0.1', '', '73', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('74', '16', '127.0.0.1', '', '74', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('75', '16', '127.0.0.1', '', '75', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('76', '16', '127.0.0.1', '', '76', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('77', '16', '127.0.0.1', '', '77', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('78', '16', '127.0.0.1', '', '78', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('79', '16', '127.0.0.1', '', '79', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('80', '16', '127.0.0.1', '', '80', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('81', '16', '127.0.0.1', '', '81', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('82', '16', '127.0.0.1', '', '82', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('83', '16', '127.0.0.1', '', '83', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('84', '16', '127.0.0.1', '', '84', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('85', '16', '127.0.0.1', '', '85', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('86', '16', '127.0.0.1', '', '86', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('87', '16', '127.0.0.1', '', '87', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('88', '16', '127.0.0.1', '', '88', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('89', '16', '127.0.0.1', '', '89', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('90', '16', '127.0.0.1', '', '90', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('91', '16', '127.0.0.1', '', '91', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('92', '16', '127.0.0.1', '', '92', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('93', '16', '127.0.0.1', '', '93', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('94', '16', '127.0.0.1', '', '94', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('95', '16', '127.0.0.1', '', '95', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('96', '16', '127.0.0.1', '', '96', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('97', '16', '127.0.0.1', '', '97', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('98', '16', '127.0.0.1', '', '98', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('99', '16', '127.0.0.1', '', '99', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('100', '16', '127.0.0.1', '', '100', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('101', '16', '127.0.0.1', '', '101', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('102', '16', '127.0.0.1', '', '102', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('103', '16', '127.0.0.1', '', '103', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('104', '16', '127.0.0.1', '', '104', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('105', '16', '127.0.0.1', '', '105', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('106', '16', '127.0.0.1', '', '106', null, null, '3', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('107', '16', '127.0.0.1', '', '107', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('108', '16', '127.0.0.1', '', '108', null, null, '2', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('109', '16', '127.0.0.1', '', '109', null, null, '1', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('110', '16', '127.0.0.1', '', '110', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('111', '16', '127.0.0.1', '', '111', null, null, '0', null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');
INSERT INTO `answers` VALUES ('112', '16', '127.0.0.1', '', '112', null, null, null, null, '2014-09-01 04:07:01', '2014-09-01 04:07:01', '1');

-- ----------------------------
-- Table structure for aros
-- ----------------------------
DROP TABLE IF EXISTS `aros`;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aros
-- ----------------------------
INSERT INTO `aros` VALUES ('1', null, 'Group', '1', null, '1', '8');
INSERT INTO `aros` VALUES ('2', null, 'Group', '2', null, '9', '30');
INSERT INTO `aros` VALUES ('3', null, 'Group', '3', null, '31', '90');
INSERT INTO `aros` VALUES ('4', '1', 'User', '1', null, '2', '3');
INSERT INTO `aros` VALUES ('5', '3', 'User', '2', null, '32', '33');
INSERT INTO `aros` VALUES ('6', '2', 'User', '3', null, '10', '11');
INSERT INTO `aros` VALUES ('7', '2', 'User', '5', null, '12', '13');
INSERT INTO `aros` VALUES ('8', '2', 'User', '6', null, '14', '15');
INSERT INTO `aros` VALUES ('9', '3', 'User', '7', null, '34', '35');
INSERT INTO `aros` VALUES ('10', '3', 'User', '8', null, '36', '37');
INSERT INTO `aros` VALUES ('11', '2', 'User', '9', null, '16', '17');
INSERT INTO `aros` VALUES ('12', '3', 'User', '10', null, '38', '39');
INSERT INTO `aros` VALUES ('13', '3', 'User', '13', null, '40', '41');
INSERT INTO `aros` VALUES ('14', '3', 'User', '14', null, '42', '43');
INSERT INTO `aros` VALUES ('16', '3', 'User', '16', null, '44', '45');
INSERT INTO `aros` VALUES ('17', '3', 'User', '17', null, '46', '47');
INSERT INTO `aros` VALUES ('18', '3', 'User', '18', null, '48', '49');
INSERT INTO `aros` VALUES ('20', '2', 'User', '20', null, '18', '19');
INSERT INTO `aros` VALUES ('21', '3', 'User', '21', null, '50', '51');
INSERT INTO `aros` VALUES ('23', '3', 'User', '23', null, '52', '53');
INSERT INTO `aros` VALUES ('24', '3', 'User', '24', null, '54', '55');
INSERT INTO `aros` VALUES ('25', '3', 'User', '25', null, '56', '57');
INSERT INTO `aros` VALUES ('26', '3', 'User', '26', null, '58', '59');
INSERT INTO `aros` VALUES ('27', '2', 'User', '27', null, '20', '21');
INSERT INTO `aros` VALUES ('29', '1', 'User', '29', null, '4', '5');
INSERT INTO `aros` VALUES ('30', '3', 'User', '30', null, '60', '61');
INSERT INTO `aros` VALUES ('32', '2', 'User', '32', null, '22', '23');
INSERT INTO `aros` VALUES ('34', '3', 'User', '34', null, '62', '63');
INSERT INTO `aros` VALUES ('35', '3', 'User', '35', null, '64', '65');
INSERT INTO `aros` VALUES ('36', '3', 'User', '36', null, '66', '67');
INSERT INTO `aros` VALUES ('37', '2', 'User', '37', null, '24', '25');
INSERT INTO `aros` VALUES ('38', '2', 'User', '38', null, '26', '27');
INSERT INTO `aros` VALUES ('39', '3', 'User', '39', null, '68', '69');
INSERT INTO `aros` VALUES ('42', '3', 'User', '42', null, '70', '71');
INSERT INTO `aros` VALUES ('43', '3', 'User', '43', null, '72', '73');
INSERT INTO `aros` VALUES ('44', '3', 'User', '44', null, '74', '75');
INSERT INTO `aros` VALUES ('45', '3', 'User', '45', null, '76', '77');
INSERT INTO `aros` VALUES ('46', '3', 'User', '46', null, '78', '79');
INSERT INTO `aros` VALUES ('47', '2', 'User', '47', null, '28', '29');
INSERT INTO `aros` VALUES ('48', '1', 'User', '48', null, '6', '7');
INSERT INTO `aros` VALUES ('49', null, 'User', '15', null, '91', '92');
INSERT INTO `aros` VALUES ('50', '3', 'User', '49', null, '80', '81');
INSERT INTO `aros` VALUES ('51', '3', 'User', '50', null, '82', '83');
INSERT INTO `aros` VALUES ('52', '3', 'User', '51', null, '84', '85');
INSERT INTO `aros` VALUES ('53', '3', 'User', '52', null, '86', '87');
INSERT INTO `aros` VALUES ('54', '3', 'User', '59', null, '88', '89');

-- ----------------------------
-- Table structure for aros_acos
-- ----------------------------
DROP TABLE IF EXISTS `aros_acos`;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of aros_acos
-- ----------------------------
INSERT INTO `aros_acos` VALUES ('1', '1', '1', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('2', '3', '82', '0', '0', '0', '0');
INSERT INTO `aros_acos` VALUES ('3', '3', '84', '0', '0', '0', '0');
INSERT INTO `aros_acos` VALUES ('4', '3', '83', '0', '0', '0', '0');
INSERT INTO `aros_acos` VALUES ('5', '2', '82', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('6', '2', '83', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('7', '2', '84', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('12', '2', '163', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('14', '2', '164', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('16', '2', '167', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('17', '2', '62', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('18', '3', '62', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('19', '2', '63', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('20', '3', '63', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('21', '3', '65', '0', '0', '0', '0');
INSERT INTO `aros_acos` VALUES ('22', '2', '65', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('23', '2', '64', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('24', '2', '174', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('25', '2', '175', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('26', '2', '176', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('27', '2', '177', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('28', '2', '178', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('29', '2', '188', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('30', '2', '190', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('31', '2', '191', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('32', '2', '192', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('33', '2', '193', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('34', '2', '194', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('35', '2', '199', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('36', '2', '197', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('37', '2', '214', '1', '1', '1', '1');
INSERT INTO `aros_acos` VALUES ('38', '3', '214', '1', '1', '1', '1');

-- ----------------------------
-- Table structure for base_nutrients
-- ----------------------------
DROP TABLE IF EXISTS `base_nutrients`;
CREATE TABLE `base_nutrients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `base_nutrient_formula` text NOT NULL,
  `daily_dosage` int(10) NOT NULL,
  `maximum_dosage` int(10) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of base_nutrients
-- ----------------------------
INSERT INTO `base_nutrients` VALUES ('1', 'Vitamin A* (IU)\r\n', '750', '2500', '2014-05-21 05:36:00', '2014-05-21 05:36:00', '0');
INSERT INTO `base_nutrients` VALUES ('2', 'B-Carotene* (IU)', '750', '2500', '2014-05-21 05:36:17', '2014-05-21 05:36:17', '0');
INSERT INTO `base_nutrients` VALUES ('3', 'Thiamin (B1) ~ mg', '5', '200', '2014-05-21 05:36:35', '2014-05-21 05:36:35', '0');
INSERT INTO `base_nutrients` VALUES ('4', 'Riboflavin-5-phosphate (B2) ~ mg\r\n', '5', '400', '2014-05-21 05:41:22', '2014-05-21 05:41:22', '0');
INSERT INTO `base_nutrients` VALUES ('5', 'Niacin (B3) ~ mg', '5', '100', '2014-05-21 05:42:32', '2014-05-21 05:42:32', '0');
INSERT INTO `base_nutrients` VALUES ('6', 'Niacinamide (B3) ~ mg', '10', '200', '2014-05-21 05:42:57', '2014-05-21 05:42:57', '0');
INSERT INTO `base_nutrients` VALUES ('7', 'Pyridoxal-5-phosphate (B6) ~ mg', '15', '50', '2014-05-21 05:43:24', '2014-05-21 05:43:24', '0');
INSERT INTO `base_nutrients` VALUES ('8', 'Folic Acid ~ ugm', '400', '5000', '2014-05-21 05:43:57', '2014-05-21 05:43:57', '0');
INSERT INTO `base_nutrients` VALUES ('9', 'Vitamin B12 ~ ugm', '50', '1000', '2014-05-21 05:44:14', '2014-05-21 05:44:14', '0');
INSERT INTO `base_nutrients` VALUES ('10', 'Pantothenic Acid (B5) ~ mg', '25', '1000', '2014-05-21 05:44:40', '2014-05-21 05:44:40', '0');
INSERT INTO `base_nutrients` VALUES ('11', 'Biotin ~ mg', '100', '3000', '2014-05-21 05:44:55', '2014-05-21 05:44:55', '0');
INSERT INTO `base_nutrients` VALUES ('12', 'Choline ~ mg', '50', '500', '2014-05-21 05:45:16', '2014-05-21 05:45:16', '0');
INSERT INTO `base_nutrients` VALUES ('13', 'Vitamin C (mg)', '100', '4000', '2014-05-21 05:45:45', '2014-05-21 05:45:45', '0');
INSERT INTO `base_nutrients` VALUES ('14', 'Vitamin D* (IU)', '400', '2000', '2014-05-21 05:46:21', '2014-05-21 05:46:21', '0');
INSERT INTO `base_nutrients` VALUES ('15', 'Vitamin E mixed tocopherols (IU)', '100', '1000', '2014-05-21 05:47:13', '2014-05-21 05:47:13', '0');
INSERT INTO `base_nutrients` VALUES ('16', 'Vitamin K-2* ~ ugm', '10', '200', '2014-05-21 05:47:27', '2014-05-21 05:47:27', '0');
INSERT INTO `base_nutrients` VALUES ('17', 'Acetyl-carnitine ~ mg', '100', '500', '2014-05-21 06:04:42', '2014-05-21 06:04:42', '0');
INSERT INTO `base_nutrients` VALUES ('18', 'Coenzyme Q10 ~ mg', '30', '0', '2014-05-21 06:05:16', '2014-05-21 06:05:16', '0');
INSERT INTO `base_nutrients` VALUES ('19', 'Lipoic Acid ~ mg', '100', '500', '2014-05-21 06:05:33', '2014-05-21 06:05:33', '0');
INSERT INTO `base_nutrients` VALUES ('20', 'EFA: omega-3-EFAs ~ mg', '500', '3000', '2014-05-21 06:35:12', '2014-05-21 06:35:12', '0');
INSERT INTO `base_nutrients` VALUES ('21', 'Calcium ~ mg', '400', '1500', '2014-05-21 06:35:56', '2014-05-21 06:35:56', '0');
INSERT INTO `base_nutrients` VALUES ('22', 'Magnesium ~ mg', '200', '800', '2014-05-21 06:36:14', '2014-05-21 06:36:14', '0');
INSERT INTO `base_nutrients` VALUES ('23', 'Zinc* ~ mg', '5', '45', '2014-05-21 06:36:33', '2014-05-21 06:36:33', '0');
INSERT INTO `base_nutrients` VALUES ('24', 'Iron ~ mg', '5', '50', '2014-05-21 06:44:09', '2014-05-21 06:44:09', '0');
INSERT INTO `base_nutrients` VALUES ('25', 'Selenium ~ ugm', '50', '200', '2014-05-21 06:44:32', '2014-05-21 06:44:32', '0');
INSERT INTO `base_nutrients` VALUES ('26', 'Copper ~ mg', '1', '5', '2014-05-21 06:54:57', '2014-05-21 06:54:57', '0');
INSERT INTO `base_nutrients` VALUES ('27', 'Manganese ~ mg', '1', '5', '2014-05-21 06:55:09', '2014-05-21 06:55:09', '0');
INSERT INTO `base_nutrients` VALUES ('28', 'Boron* ~ mg', '1', '5', '2014-05-21 06:55:22', '2014-05-21 06:55:22', '0');
INSERT INTO `base_nutrients` VALUES ('29', 'Molybdenum* ~ mg', '1', '5', '2014-05-21 06:55:37', '2014-05-21 06:55:37', '0');

-- ----------------------------
-- Table structure for choices
-- ----------------------------
DROP TABLE IF EXISTS `choices`;
CREATE TABLE `choices` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `questions_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of choices
-- ----------------------------

-- ----------------------------
-- Table structure for contents
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contents
-- ----------------------------

-- ----------------------------
-- Table structure for factors
-- ----------------------------
DROP TABLE IF EXISTS `factors`;
CREATE TABLE `factors` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'creator id',
  `factor_type_id` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=522 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of factors
-- ----------------------------
INSERT INTO `factors` VALUES ('1', 'Allergy', 'Allergy', '1', '1', '2013-12-23 09:44:20', '2014-08-20 01:44:44', '1');
INSERT INTO `factors` VALUES ('2', 'Glucose Regulation', 'Hypoglyc.', '1', '1', '2013-12-23 09:45:09', '2014-08-22 04:12:10', '1');
INSERT INTO `factors` VALUES ('3', 'Digestion', 'Digestion', '1', '1', '2013-12-23 09:45:58', '2014-08-22 03:29:15', '1');
INSERT INTO `factors` VALUES ('4', 'GIT â€“ Disbiosis', 'B. Flora', '1', '1', '2013-12-23 09:46:10', '2014-08-22 04:13:11', '1');
INSERT INTO `factors` VALUES ('5', 'Vit A', 'Vit A', '1', '2', '2013-12-23 10:00:09', '2014-08-22 03:29:48', '1');
INSERT INTO `factors` VALUES ('6', 'Vit. B1', 'Vit. B1', '1', '2', '2013-12-23 10:00:19', '2014-08-22 03:29:56', '1');
INSERT INTO `factors` VALUES ('7', 'Vit. B2', 'Vit. B2', '1', '2', '2013-12-23 10:01:36', '2014-08-22 03:30:02', '1');
INSERT INTO `factors` VALUES ('8', 'Vit. B3', 'Vit. B3', '1', '2', '2013-12-23 10:01:49', '2014-08-22 03:31:04', '1');
INSERT INTO `factors` VALUES ('9', 'Vit. B5', 'Vit. B5', '1', '2', '2013-12-23 10:02:02', '2014-08-22 03:31:09', '1');
INSERT INTO `factors` VALUES ('10', 'Vit. B6', 'Vit. B6', '1', '2', '2013-12-23 10:03:14', '2014-08-22 03:31:14', '1');
INSERT INTO `factors` VALUES ('11', 'Vit. B12', 'Vit. B12', '1', '2', '2013-12-23 10:03:24', '2014-08-22 03:59:28', '1');
INSERT INTO `factors` VALUES ('12', 'Vit. C', 'Vit. C', '1', '2', '2013-12-23 10:03:37', '2014-08-22 03:59:31', '1');
INSERT INTO `factors` VALUES ('13', 'Vit. D', 'Vit. D', '1', '2', '2013-12-23 10:03:47', '2014-08-22 03:59:34', '1');
INSERT INTO `factors` VALUES ('14', 'Vit. E', 'Vit. E', '1', '2', '2013-12-23 10:03:55', '2014-08-22 03:59:43', '1');
INSERT INTO `factors` VALUES ('15', 'Vit. K', 'Vit. K', '1', '2', '2013-12-23 12:09:35', '2014-08-22 03:59:47', '1');
INSERT INTO `factors` VALUES ('16', 'Magnesium', 'Magnesium', '1', '2', '2013-12-23 12:09:46', '2014-08-22 03:59:50', '1');
INSERT INTO `factors` VALUES ('17', 'Calcium', 'Calcium', '1', '2', '2013-12-23 12:09:56', '2014-08-22 03:59:53', '1');
INSERT INTO `factors` VALUES ('18', 'Zinc', 'Zinc', '1', '2', '2013-12-23 12:10:09', '2014-08-22 03:59:56', '1');
INSERT INTO `factors` VALUES ('19', 'Protein', 'Protein', '1', '2', '2013-12-23 12:10:15', '2014-08-22 04:00:00', '1');
INSERT INTO `factors` VALUES ('20', 'Iron', 'Iron', '1', '2', '2013-12-23 12:10:23', '2014-08-22 04:00:04', '1');
INSERT INTO `factors` VALUES ('21', 'EFA\'s', 'EFA\'s', '1', '2', '2013-12-23 12:10:31', '2014-08-22 04:06:11', '1');
INSERT INTO `factors` VALUES ('22', 'Folate', 'Folate', '1', '2', '2013-12-23 12:10:40', '2014-08-22 04:06:36', '1');
INSERT INTO `factors` VALUES ('23', 'Dopamine', 'Dopamine', '1', '3', '2013-12-23 12:10:53', '2014-08-22 04:05:55', '1');
INSERT INTO `factors` VALUES ('24', 'Serotonin', 'Serotonin', '1', '3', '2013-12-23 12:11:05', '2014-08-22 04:05:59', '1');
INSERT INTO `factors` VALUES ('25', 'Endorphin', 'Endorphin', '1', '3', '2013-12-23 12:11:15', '2014-08-22 04:06:02', '1');
INSERT INTO `factors` VALUES ('26', 'A/Choline', 'A/Choline', '1', '3', '2013-12-23 12:11:23', '2014-08-22 04:06:05', '1');

-- ----------------------------
-- Table structure for factors_questions
-- ----------------------------
DROP TABLE IF EXISTS `factors_questions`;
CREATE TABLE `factors_questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `factor_id` int(20) DEFAULT NULL,
  `question_id` int(20) DEFAULT NULL,
  `multiplier` int(5) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1085 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of factors_questions
-- ----------------------------
INSERT INTO `factors_questions` VALUES ('1', '1', '5', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('2', '1', '6', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('3', '1', '8', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('4', '1', '9', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('5', '1', '19', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('6', '1', '24', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('7', '1', '31', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('8', '1', '32', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('9', '1', '38', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('10', '1', '41', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('11', '1', '45', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('12', '1', '46', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('13', '1', '74', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('14', '1', '75', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('15', '1', '87', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('16', '1', '90', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('17', '1', '91', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('18', '1', '93', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('19', '1', '94', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('20', '1', '96', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('21', '1', '101', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('22', '1', '106', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('23', '1', '107', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('24', '1', '108', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('25', '1', '110', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('26', '2', '15', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('27', '2', '31', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('28', '2', '32', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('29', '2', '37', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('30', '2', '38', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('31', '2', '40', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('32', '2', '42', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('33', '2', '50', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('34', '2', '74', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('35', '2', '75', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('36', '2', '76', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('37', '2', '77', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('38', '2', '78', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('39', '2', '79', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('40', '2', '80', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('41', '2', '81', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('42', '2', '82', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('43', '2', '83', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('44', '2', '84', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('45', '2', '85', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('46', '2', '86', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('47', '2', '87', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('48', '2', '88', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('49', '2', '89', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('50', '2', '90', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('51', '2', '91', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('52', '2', '92', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('53', '2', '93', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('54', '2', '94', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('55', '2', '95', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('56', '2', '96', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('57', '2', '97', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('58', '2', '98', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('59', '2', '99', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('60', '2', '100', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('61', '2', '101', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('62', '2', '102', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('63', '2', '103', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('64', '2', '104', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('65', '2', '105', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('66', '2', '106', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('67', '2', '107', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('68', '2', '108', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('69', '3', '5', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('70', '3', '6', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('71', '3', '9', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('72', '3', '24', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('73', '3', '53', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('74', '3', '54', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('75', '3', '56', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('76', '3', '61', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('77', '3', '75', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('78', '3', '76', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('79', '3', '85', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('80', '3', '88', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('81', '3', '89', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('82', '3', '107', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('83', '4', '5', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('84', '4', '6', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('85', '4', '7', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('86', '4', '9', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('87', '4', '10', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('88', '4', '11', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('89', '4', '37', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('90', '4', '46', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('91', '4', '61', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('92', '4', '62', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('93', '4', '87', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('94', '4', '93', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('95', '4', '110', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('96', '5', '3', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('97', '5', '4', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('98', '5', '9', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('99', '5', '19', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('100', '5', '20', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('101', '5', '61', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('102', '5', '62', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('103', '5', '64', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('104', '5', '66', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('105', '5', '67', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('106', '5', '109', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('107', '6', '13', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('108', '6', '14', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('109', '6', '15', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('110', '6', '16', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('111', '6', '23', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('112', '6', '32', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('113', '6', '41', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('114', '6', '45', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('115', '6', '47', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('116', '6', '52', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('117', '7', '1', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('118', '7', '17', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('119', '7', '18', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('120', '7', '19', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('121', '7', '20', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('122', '7', '21', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('123', '7', '22', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('124', '8', '5', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('125', '8', '6', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('126', '8', '10', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('127', '8', '14', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('128', '8', '17', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('129', '8', '18', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('130', '8', '32', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('131', '8', '35', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('132', '8', '36', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('133', '8', '37', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('134', '8', '38', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('135', '8', '39', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('136', '8', '40', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('137', '8', '41', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('138', '8', '77', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('139', '8', '81', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('140', '8', '83', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('141', '8', '86', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('142', '8', '91', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('143', '8', '96', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('144', '8', '110', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('145', '9', '25', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('146', '9', '42', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('147', '9', '43', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('148', '9', '44', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('149', '9', '45', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('150', '9', '46', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('151', '9', '74', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('152', '9', '88', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('153', '9', '91', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('154', '10', '8', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('155', '10', '15', '1', null, '2014-07-05 02:13:41', '1');
INSERT INTO `factors_questions` VALUES ('156', '10', '16', '2', null, '2014-07-05 02:13:52', '1');
INSERT INTO `factors_questions` VALUES ('157', '10', '18', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('158', '10', '21', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('159', '10', '22', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('160', '10', '23', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('161', '10', '24', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('162', '10', '25', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('163', '10', '26', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('164', '10', '27', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('165', '10', '28', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('166', '10', '29', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('167', '10', '30', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('168', '10', '31', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('169', '10', '32', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('170', '10', '33', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('171', '10', '34', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('172', '10', '35', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('173', '10', '36', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('174', '10', '40', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('175', '10', '41', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('176', '10', '43', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('177', '10', '50', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('178', '10', '56', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('179', '10', '57', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('180', '10', '59', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('181', '10', '78', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('182', '10', '80', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('183', '10', '81', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('184', '10', '82', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('185', '10', '84', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('186', '10', '86', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('187', '10', '92', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('188', '10', '96', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('189', '10', '110', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('190', '11', '37', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('191', '11', '44', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('192', '11', '45', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('193', '11', '47', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('194', '11', '48', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('195', '11', '49', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('196', '11', '50', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('197', '12', '8', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('198', '12', '9', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('199', '12', '10', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('200', '12', '11', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('201', '12', '12', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('202', '12', '13', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('203', '12', '42', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('204', '12', '54', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('205', '12', '57', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('206', '12', '62', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('207', '12', '101', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('208', '12', '104', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('209', '12', '105', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('210', '13', '19', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('211', '13', '20', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('212', '13', '101', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('213', '13', '102', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('214', '13', '103', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('215', '13', '109', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('216', '14', '13', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('217', '14', '43', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('218', '14', '51', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('219', '14', '62', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('220', '14', '63', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('221', '14', '65', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('222', '14', '66', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('223', '14', '68', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('224', '14', '69', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('225', '14', '70', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('226', '14', '71', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('227', '14', '72', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('228', '14', '73', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('229', '14', '104', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('230', '14', '105', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('231', '15', '5', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('232', '15', '6', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('233', '15', '10', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('234', '15', '11', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('235', '15', '46', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('236', '15', '93', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('237', '16', '15', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('238', '16', '36', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('239', '16', '44', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('240', '16', '46', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('241', '16', '48', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('242', '16', '51', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('243', '16', '52', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('244', '16', '71', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('245', '16', '80', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('246', '16', '82', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('247', '16', '84', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('248', '16', '87', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('249', '16', '101', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('250', '16', '102', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('251', '16', '103', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('252', '16', '106', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('253', '17', '12', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('254', '17', '15', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('255', '17', '44', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('256', '17', '51', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('257', '17', '52', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('258', '17', '58', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('259', '17', '93', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('260', '17', '106', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('261', '18', '1', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('263', '18', '3', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('264', '18', '4', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('268', '18', '8', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('313', '18', '53', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('314', '18', '54', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('315', '18', '55', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('316', '18', '56', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('317', '18', '57', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('318', '18', '58', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('319', '18', '59', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('320', '18', '60', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('321', '18', '61', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('322', '18', '62', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('371', '19', '1', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('372', '19', '2', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('420', '19', '50', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('423', '19', '53', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('424', '19', '54', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('425', '19', '55', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('426', '19', '56', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('427', '19', '57', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('428', '19', '58', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('429', '19', '59', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('434', '19', '64', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('444', '19', '74', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('459', '19', '89', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('460', '19', '90', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('461', '19', '91', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('468', '19', '98', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('470', '19', '100', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('475', '19', '105', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('498', '20', '18', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('505', '20', '25', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('517', '20', '37', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('520', '20', '40', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('523', '20', '43', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('530', '20', '50', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('535', '20', '55', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('547', '20', '67', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('554', '20', '74', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('584', '20', '104', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('594', '21', '4', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('602', '21', '12', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('611', '21', '21', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('612', '21', '22', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('614', '21', '24', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('617', '21', '27', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('636', '21', '46', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('647', '21', '57', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('653', '21', '63', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('655', '21', '65', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('656', '21', '66', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('657', '21', '67', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('661', '21', '71', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('662', '21', '72', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('663', '21', '73', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('701', '22', '14', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('702', '22', '18', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('703', '22', '50', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('728', '23', '25', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('736', '23', '33', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('743', '23', '40', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('746', '23', '43', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('783', '23', '80', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('784', '23', '81', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('791', '23', '88', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('796', '23', '93', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('800', '23', '97', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('803', '23', '100', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('808', '23', '105', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('809', '23', '106', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('810', '23', '107', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('811', '23', '108', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('842', '24', '29', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('843', '24', '30', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('844', '24', '31', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('848', '24', '35', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('849', '24', '36', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('855', '24', '42', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('889', '24', '76', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('891', '24', '78', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('892', '24', '79', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('895', '24', '82', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('897', '24', '84', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('900', '24', '87', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('905', '24', '92', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('958', '25', '35', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('962', '25', '39', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('963', '25', '40', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('964', '25', '41', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('970', '25', '47', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('971', '25', '48', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('975', '25', '52', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('999', '25', '76', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1000', '25', '77', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1001', '25', '78', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1002', '25', '79', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1003', '25', '80', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1004', '25', '81', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1006', '25', '83', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1009', '25', '86', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1018', '25', '95', '3', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1020', '25', '97', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1070', '26', '37', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1071', '26', '38', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1079', '26', '46', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1080', '26', '47', '1', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1083', '26', '50', '2', null, null, '1');
INSERT INTO `factors_questions` VALUES ('1084', '3', '7', '2', '2014-07-05 01:51:27', '2014-07-05 01:51:27', '1');

-- ----------------------------
-- Table structure for factor_types
-- ----------------------------
DROP TABLE IF EXISTS `factor_types`;
CREATE TABLE `factor_types` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of factor_types
-- ----------------------------
INSERT INTO `factor_types` VALUES ('1', 'Functional', '2014-08-20 01:38:21', '2014-08-20 01:38:21', '1');
INSERT INTO `factor_types` VALUES ('2', 'Nutrient', '2014-08-20 01:38:38', '2014-08-20 01:38:38', '1');
INSERT INTO `factor_types` VALUES ('3', 'Neurotransmitter', '2014-08-20 01:38:57', '2014-08-20 01:38:57', '1');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'Admin', '2014-06-02 11:31:53', '2014-06-02 11:31:53');
INSERT INTO `groups` VALUES ('2', 'Client', '2014-06-02 11:32:03', '2014-06-02 11:32:03');
INSERT INTO `groups` VALUES ('3', 'Member', '2014-06-02 11:32:12', '2014-06-02 11:32:12');

-- ----------------------------
-- Table structure for histories
-- ----------------------------
DROP TABLE IF EXISTS `histories`;
CREATE TABLE `histories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `diagnostics` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of histories
-- ----------------------------

-- ----------------------------
-- Table structure for nutritional_guides
-- ----------------------------
DROP TABLE IF EXISTS `nutritional_guides`;
CREATE TABLE `nutritional_guides` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `user_id` bigint(20) NOT NULL COMMENT 'creator id',
  `factor_id` bigint(20) DEFAULT NULL,
  `nutritional_guide_type_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nutritional_guides
-- ----------------------------
INSERT INTO `nutritional_guides` VALUES ('1', 'The B Complex Vitamins', '<p>THE B-COMPLEX VITAMIN FAMILY<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nTHIAMINE (B1)</p>\r\n\r\n<p>Deficiency of Thiamine may be associated with the following clinical signs and symptoms:<br />\r\nApathy, confusion, emotional lability, depression, fatigue, insomnia, irritability, nervousness, headache, memory-loss, muscle weakness, increased pain-sensitivity, numbness/burning in the hands or feet, increased sound-sensitivity, indigestion, loss of appetite, constipation, sluggish metabolism, palpitations, shortness of breath and heart-failure.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire 1 mg/ day : Increased need with high sugar/alcohol intake.</p>\r\n\r\n<p>Natural Sources:<br />\r\nWheat germ, rice bran, yeast, bran, lean pork, liver, poultry, egg-yolk, fish, legumes such as dried-beans and peas.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\n100 - 200 mg per day : Injections may be required if problems with impaired digestion or intestinal absorption are present.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nAnaphylactic shock has occurred with injections. Dizziness, palpitations, flushing, itching, hives and angio-oedema have all been reported after high-dose thiamine treatment.</p>\r\n\r\n<p><br />\r\nRIBOFLAVIN (B2)</p>\r\n\r\n<p>Deficiency of riboflavin may be associated with the following clinical symptoms and signs:<br />\r\nInsomnia, dizziness and depression, light-sensitivity, red-itchy-burning eyes, blurred vision, cataracts, magenta-hued tongue, cheilosis (Cracks/soreness in corners of mouth), oily/scaly skin (especially around mouth and nose), dyssebacea (whiteheads and and blackheads), acne, excessive hair loss.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire 1 mg/day : A higher dose may be required if Vit B6 is being taken in high doses.</p>\r\n\r\n<p>Natural Sources:<br />\r\nMilk, cheese, liver, organ meats, yeast, lean meat and breads.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nUp to 500 mg/day have been prescribed without side effects.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nThere are no known toxicity effects.</p>\r\n\r\n<p><br />\r\nNIACIN AND NIACINAMIDE (B3)</p>\r\n\r\n<p>Deficiency of Vit B3 has been associated with the following clinical symptoms and signs:<br />\r\nFearful feelings, anxiety, excessive worry, suspiciousness, feelings of gloom, depression, fatigue, irritability, insomnia, muscle tension/soreness, headaches, anorexia/nausea, abdominal discomfort/pain, flatulence/wind, bloating, halitosis, diarrhoea, muscle weakness, burning sensation in tongue &amp; limbs, sensory dysperception, dementia, cognitive disorders, strawberry-tip tongue, white-coated tongue, mid-line cracks in tongue, dental-indentations at tongue margins, sore mouth, swollen/painful gums, dermatitis (localised scaly pigmented rash).</p>\r\n\r\n<p>Some patients with schizophrenia respond well to Niacin therapy.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire up to 20 mg/day : Stress increases requirements.</p>\r\n\r\n<p>Natural Sources:<br />\r\nLean meats, poultry, fish, peanuts, brewer&#39;s yeast, liver and wheat germ.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\n100 - 10,000 mg used in schizophrenia and also to lower cholesterol.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nFlushing-burning sensation (Niacin), mental-confusion, depression, elevated uric acid, liver-damage, photodermatitis.</p>\r\n\r\n<p><br />\r\nPYRIDOXINE (B6)</p>\r\n\r\n<p>Pyridoxine deficiency has been associated with the following clinical signs and symptoms:<br />\r\nNervousness, agitation, anxiety, emotional-upset, mood swings. Irritability, insomnia, depression, fatigue, poor dream-recall fluid-retention, premenstrual-tension, low blood sugar, low blood pressure, dizziness, acne (espec. post-adolescence), facial oiliness dandruff, hair-loss, cheilosis (cracks in mouth corners) sore tongue, anorexia and nausea, anaemia, numbness/tingling in hands/feet, impaired wound healing, arithitis (espec. in finger/toe joints).</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire up to 2 mg/day : increased with pregnancy, ageing, illness, stress and hormone therapy. Increased requirement with isoniazid and other drugs.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nMeats (espec organ meats), fish, whole wheat, breads, soybean, avocados, peanuts, walnuts, fresh fruit (especially bananas).</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\n100 to 1000 mg/day : toxicity reactions above 2000 mg/day.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nSensory neuropathy (numbness in hands/feet).</p>\r\n\r\n<p><br />\r\nPANTOTHENIC ACID (Calcium Pantothenate - B5)</p>\r\n\r\n<p>The following signs and symptoms have been associated with a deficiency of Pantothenic Acid:<br />\r\nFatigue, exhaustion, depression, adrenal-exhaustion, anorexia, nausea/vomiting, abdominal bloating/discomfort, constipation burning feet, numbness/tingling in hands/feet, aching mid-back, impaired coordination, low blood pressure, Low blood sugar, recurrent infection, excessive hair-loss.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire up to 20 mg/day : Increased with pregnancy, stress, allergy and chronic illness.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nEggs, kidney, salmon, sardines, liver, yeast and natural foods.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\n500 to 2000 mg/day.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNo known toxicity effects.</p>\r\n\r\n<p><br />\r\nCOBALAMIN (B12)</p>\r\n\r\n<p>Deficiency of Vit B12 is associated with the following signs and symptoms:<br />\r\nImpaired memory, poor concentration, impaired learning, fatique, depression, mood swings, mental illness leading to hallucinations, confusion, paranoia, pyschosis, dizziness, numbness/tingling in hands/feet, unsteady gait and/or balance, red-sore-smooth tongue, poor digestion, abdominal discomfort.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire approximately 3-4 micrograms daily.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nLiver, kidney, muscle-meats, poultry, fish, eggs, dairy produce.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nHydroxycobalamin 1000 micrograms by injection 1-2 times/ week. &nbsp;Up to 5000 ugm every 2 days in Chronic Fatigue Syndrome.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNo toxicity reactions known.</p>\r\n\r\n<p><br />\r\nFOLIC ACID (Folacin Folate)</p>\r\n\r\n<p>Folic acid deficiency has been associated with following signs and symptoms:<br />\r\nMental sluggishness, poor memory and concentration, apathy, fatique, depression, paranoid-thinking, cheilosis, sore-red tongue, anorexia, poor digestion, constipation, shortness of breath, irritability, insomnia, restless legs.</p>\r\n\r\n<p>Folic acid deficiency in pregnancy is associated with foetal neural tube defects (Spina Bifida).</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire 40 micrograms/day : Up to 5mg in pregnancy and lactation.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nLeafy green vegetables.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\n2 to 20 mg daily.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nOverexcitability leading to excess euphoria (mania), increased mental instability, irritability, restless sleep, vivid dreaming, abdominal distension, anorexia, flatulence, nausea, malaise.</p>\r\n\r\n<p>NOTE: high dose supplement may worsen epilepsy control.</p>\r\n\r\n<p><br />\r\nCHOLINE</p>\r\n\r\n<p>The following signs and symptoms have been associated with a deficiency of choline:<br />\r\nPoor fat digestion, nausea/squeamish with fatty-foods, gallstones gastric ulcers, fatty infiltration of liver (kidney and Liver damage in rats), impaired memory and concentration, high blood pressure.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\n1 Tblspn lecithin : &nbsp;Also requires methionine, B12 and Folate.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nLecithin, egg yolk, brewer&#39;s yeast, fish, soybeans, peanuts, beef liver and wheat germ.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nUp to 10 - 16 g/day : to treat Tardive Dyskinesia and Alzheimer&#39;s disease - phosphotidyl-choline is preferable.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNo toxicity reactions known.</p>\r\n\r\n<p><br />\r\nINOSITOL</p>\r\n\r\n<p>A deficiency of Inositol has been associated with the following signs and symptoms:<br />\r\nExcessive hair loss, constipation, eczema, high-cholesterol. Diabetics lose inositol in the urine leading to the peripheral nerve damage of diabetes: Inositol supplements prevent this.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\n500 mg/day.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nLecithin, beef, brain, heart, wheat germ, Bulgar rice, brown rice molasses, brewer&#39;s yeast, nuts, citrus fruit.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nUp to 3 g daily.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNo known toxic reactions.</p>\r\n\r\n<p><br />\r\nBIOTIN</p>\r\n\r\n<p>Biotin deficiency has been associated with the following signs and symptoms:<br />\r\nDrowsiness, lassitude, apathy, depression, anorexia, nausea, muscle pains, excessive sensitivity to touch, skin rash (flaking, itchless, grey-toned skin), anaemia, high cholestrol, hair-loss, pale-smooth tongue.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRequire approximately 300 ugm/day. &nbsp;Supplementation is usually unnecessary unless eating raw egg white which contains the protein Avidin which destroys biotin.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nEgg yolk, organ meats, yeast, legumes and nuts.</p>\r\n\r\n<p>Signs of toxicity:<br />\r\nNo known toxic reactions.</p>\r\n\r\n<p><br />\r\nPABA (Para-Aminobenzoic Acid)</p>\r\n\r\n<p>There are no definitive signs and symptoms associated with a deficiency of PABA:<br />\r\nPABA may be useful as a sunscreen. May possibly be of benefit in prolonging life. It may reverse greying of hair.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nUnknown.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nLiver, yeast, wheat germ, molasses.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\n2 g/day may be useful in treating problem schizophrenics.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nCan cause rashes and hives.</p>\r\n', '3', '4', '1', '2014-07-10 04:28:02', '2014-07-15 09:59:47', '1');
INSERT INTO `nutritional_guides` VALUES ('2', 'VITAMIN C(ASCORBIC ACID)/BIOFLAVONOIDS ', '<p>VITAMIN C(ASCORBIC ACID)/BIOFLAVONOIDS&nbsp;<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nVITAMIN C (ASCORBIC ACID)</p>\r\n\r\n<p>The following symptoms and signs have been associated with a deficiency of Ascorbic Acid (Vit C):</p>\r\n\r\n<p>Acute Scurvy:<br />\r\nSallow or muddy complexion, loss of vigor, lassitude, easily tired, impaired exercise tolerance, breathlessness, loss of appetite, anaemia, easy bruising, fleeting pains in joints and limbs (especially in legs).&nbsp;</p>\r\n\r\n<p>Chronic Scurvy:<br />\r\nSore gums, congested and spongey gums, bleeding gums, spontaneous bleeding, petechiae and ecchymoses in skin, haemorrhages around hair follicles (especially on thighs), bruised and swollen eyelids, blood in urine.</p>\r\n\r\n<p>Severe Late-stage Scurvy:<br />\r\nDingy and brown complexion, spongey and bleeding gums, pyorrhoea, halitosis, loss of teeth, atrophy and dissolution of jawbone, severe weakness, palpitations and dyspnoea with mild exertion, poor wound healing, skin atrophy, dissolution of old wounds, brittle bones, osteopenia, impaired immunity: severe infections, pneumonia and sudden collapse and death, mental symptoms(at all stages), fatique, listlessness, lassitude, confusion, depression, facial expression usually haggard, frowning and &#39;pained&#39;, with careworn knitted brow. &nbsp;</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\n1000 to 2000 mg daily (RDA: 30-40 mg/day). &nbsp;If a smoker - minimum of 2 g (2000 mg) daily.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nCitrus fruit, green vegetables, tomatoes, berries, peppers, cauliflower, broccoli, parsley.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nAcute viral illness (colds, flu etc) - up to 16 gm/day. &nbsp;Sudden stress (infections, wounds, burns etc) - up to 16 gm/day. &nbsp;Higher doses up to &#39;bowel tolerance&#39; may be used by practitioners.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nBowel irritability with flatulence and diarrhoea, increased urinary oxalate excretion with loin pain and kidney-stone formation, possible increased aluminium absorption, sudden stoppage of Vit C supplements may cause rebound scurvy.&nbsp;</p>\r\n\r\n<p><br />\r\nBIOFLAVONOIDS (VITAMIN P COMPLEX)</p>\r\n\r\n<p>Deficiency of Bioflavonoids may be associated with the following clinical signs and symptoms:<br />\r\nNo specific deficiency symptoms or signs have been noted. &nbsp;Easy bruising may be a possible indication.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nCitrus fruit, apricots, cherries, grapes, green peppers, tomato, papaya, cantaloupe, broccoli.</p>\r\n\r\n<p>Therapeutic Usage:<br />\r\nBioflavonoids have been found to act as potent anti-oxidants, anti-inflammatory agents, and modulators of prostaglandin metabolism. &nbsp;As such, they are therapeutically useful for: &nbsp;Swelling, bruising and pain with trauma, symptoms related to varicose veins and haemorrhoids, inflammatory conditions such as arthritis and asthma, recurrent nosebleeds, bleeding gums and easy bruising, menorrhagia, and threatened miscarriage.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNausea, itching and rash in flavone-sensitive persons.</p>\r\n', '3', '12', '1', '2014-07-10 05:57:35', '2014-07-15 10:00:08', '1');
INSERT INTO `nutritional_guides` VALUES ('3', 'THE FAT SOLUBLE VITAMINS', '<p>THE FAT SOLUBLE VITAMINS<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nVITAMIN A</p>\r\n\r\n<p>The following symptoms and signs have been associated with a deficiency of Retinol (Vitamin A):<br />\r\nImpaired night-vision, aching and tired and burning eyes, inflamed eyelids, painful eyes, xeropthalmia, headaches, sinus congestion, recurrent URTI and flu-like illness, dry and flaky skin, lumpy skin(toad skin), acne-type skin lesions, dull and lustreless hair, ridged nails, peeling nails, impaired libido, breast soreness.&nbsp;<br />\r\nMental changes: Insomnia, fatigue, depression, neuralgia in limbs.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nRequire 4000-5000 IU/day. &nbsp;Supplements of 10,000 IU daily in fish liver oil are usually well-tolerated by adults.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nAnimal forms: Cod-liver oil, liver, kidney, egg yolk, butter milk, cheese.<br />\r\nPlant forms (beta-carotene): Leafy green and red vegetables, carrots, sweet-potato, squash and yellow fruits.&nbsp;</p>\r\n\r\n<p>Therapeutic dosage:<br />\r\n25,000 to 100,000 IU /day : NOTE - this is a potentially toxic dose range. Liver toxicity indices must be closely monitored.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nCerebral symptoms: Irritability, insomnia, fatigue, depression, headache, intra-cranial pressure feeling. &nbsp;Gastro-intestinal symptoms: Anorexia, nausea, abdominal pains, tender liver, enlarged liver, jaundice, weight-loss, oedema.&nbsp;</p>\r\n\r\n<p>Skin symptoms: Dry skin, cracked and flaky skin, cracked lips, hair loss, yellowed skin.&nbsp;</p>\r\n\r\n<p>Bone symptoms: Irregular bone thickening, tender and aching bones, osteopenia, spontaneous fractures.&nbsp;</p>\r\n\r\n<p>Miscellaneous: Muscle and joint aches and pains, sore eyes, eye haemorrhage, night sweats, irregular periods.&nbsp;</p>\r\n\r\n<p>NOTE: Excessive Vitamin A is a potent teratogen (causes foetal damage).&nbsp;</p>\r\n\r\n<p><br />\r\nVITAMIN D</p>\r\n\r\n<p>The following symptoms and signs have been associated with a deficiency of Vitamin D:&nbsp;<br />\r\nBurning mouth and throat, scalp sweating (esp. at night), insomnia myopia, aching and sore eyes, muscle pain, muscle cramps, bone pain, deformed bone growth, easy fractures, nervousness anxiety, restlessness, hypothyroidism(underactive thyroid).&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nRequire approximately 400 I.U. /day. &nbsp;In winter: 1 tspn of cod liver oil is beneficial.&nbsp;</p>\r\n\r\n<p>NOTE: Vitamin D is highly toxic in high dosage.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nCod liver oil, dairy food, skin synthesis with sun exposure.&nbsp;</p>\r\n\r\n<p>Therapeutic dosage:&nbsp;<br />\r\n1500 to 2500 IU/day from fish liver oil.&nbsp;</p>\r\n\r\n<p>NOTE: Calcium and phosphorus must also be supplied AND patient monitored for toxicity symptoms.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nHeadache, frequent urination, kidney damage,anorexia, nausea, vomiting, diarrhoea, muscular weakness, muscle pain, calcification of soft tissues.&nbsp;</p>\r\n\r\n<p><br />\r\nVITAMIN E</p>\r\n\r\n<p>The following signs and symptoms have been associated with a deficiency of Vitamin E:<br />\r\nImpaired circulation, cold and pale peripheries, disturbed nail growth, hyperkeratosis of heels, muscle soreness with exercise, tender calf muscles, muscle weakness, muscle wasting, fatigue, restless sleep, insomnia, dizziness, impaired balance, gait disturbance (ataxia), premenstrual syndrome (PMT), breast soreness, menopause symptoms, loss of libido, impotence. &nbsp;Increased tissue damage: premature ageing, cataracts, retinal degeneration, haemolytic anaemia, thrombocytosis. Increased risk of arteriosclerosis, heart disease and stroke, liver damage (cirrhosis), and senile dementia.</p>\r\n\r\n<p>Supplemental dosage:&nbsp;<br />\r\nRDA is nominally 15 IU/day. &nbsp;For optimum tissue protection, at least 200 - 800 IU/day is recommended for adults.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:&nbsp;<br />\r\nWheat germ, vegetable oils (only if cold-pressed), green-leafy vegetables, whole-grain cereals, nuts and seeds, egg-yolk, meats (especially organ meats such as liver). &nbsp;NOTE: the requirement for Vitamin E increases with oil intake.&nbsp;</p>\r\n\r\n<p>Therapeutic dosage:&nbsp;<br />\r\n500 to 2000 IU for adults.&nbsp;</p>\r\n\r\n<p>Symptoms of Toxicity:<br />\r\nDizziness, headache, muscle weakness, raised blood pressure, immune system suppression at very high intake.&nbsp;</p>\r\n\r\n<p><br />\r\nVITAMIN K&nbsp;</p>\r\n\r\n<p>The following signs and symptoms have been associated with a deficiency of Vitamin K:&nbsp;<br />\r\nIncreased bleeding tendency and easy bruising. &nbsp;Recent research suggests impaired blood sugar control may occur with inadequate Vitamin K.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:&nbsp;<br />\r\nTheoretically unnecessary as Vitamin K is produced in intestine by the friendly flora. &nbsp;May be required if bowel flora is heavily disturbed (dysbiosis) or if alcohol intake is high.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nNormal intestinal bacterial flora, leafy-green vegetables, tomatoes, pork liver, lean meat, peas, carrots, soybeans, potatoes.</p>\r\n\r\n<p>Therapeutic dosage:<br />\r\n200 to 1600 micrograms.&nbsp;</p>\r\n\r\n<p>Symptoms of Toxicity:&nbsp;<br />\r\nMay cause haemolytic anaemia and jaundice.</p>\r\n', '3', '0', '1', '2014-07-10 05:58:10', '2014-07-10 06:11:00', '1');
INSERT INTO `nutritional_guides` VALUES ('4', 'THE MACRO MINERALS', '<p>THE MACRO MINERALS<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nCALCIUM (Ca)</p>\r\n\r\n<p>Symptoms and signs associated with Deficiency:&nbsp;<br />\r\nIrritability, anxiety, agitation, insomnia, poor memory, dizziness, palpitations, numbness, muscle-twitching, muscle cramps, convulsions, mental confusion, osteoporosis, rickets, tooth-decay and loss.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nRequire 800 - 1000 mg/day of elemental calcium. &nbsp;1500mg/day required in pregnancy and breastfeeding.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nMilk, other dairy foods, seeds (sesame, sunflower), soymilk, almonds, chickpea, carob, yeast, sardines, scallops, oysters, egg, parsley, broccoli, silverbeet, bone meal, mineral water, dolomite.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nAnorexia, ataxia, depression, calcium deposits in tissues.&nbsp;</p>\r\n\r\n<p><br />\r\nMAGNESIUM (Mg)</p>\r\n\r\n<p>Symptoms and Signs Associated with Deficiency:&nbsp;<br />\r\nIrritability, anxiety, agitation, restlessness, insomnia, noise intolerance, hyperactivity, confusion, dizziness, palpitations, heart arrythmia, high blood pressure, poor circulation with cold hands and feet, muscle twitching and cramps, tremors, muscle soreness, headache, anorexia, fatigue, depression.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nRequire 300 - 450 mg/day of magnesium. &nbsp;600 - 800 mg/day of magnesium may be given as a supplement. &nbsp;Should always be balanced with Calcium.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nWhole grains, legumes, milk, soymilk, almonds, cashews, seeds, green vegetables, and seafood.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNausea, diarrhoea, drowsiness, lethargy, sluggishness, bradycardia, low blood pressure, confusion and coma.&nbsp;</p>\r\n\r\n<p><br />\r\nSODIUM (Na)</p>\r\n\r\n<p>Signs and symptoms associated with deficiency:&nbsp;<br />\r\nLassitude, muscle weakness, hot-weather fatigue, dizziness, low blood pressure, weak thready pulse, anorexia, abdominal cramps, nausea and vomiting, flatulence, headache, impaired memory, confusion, convulsions.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nGenerally unnecessary except in cases of adrenal gland insufficiency, severe hypoglycaemia, sunstroke, exercise dehydration, or in cases of extreme perspiration. &nbsp;Also useful in Chronic Fatigue Syndrome. &nbsp;NB: in QLD summers, &nbsp;may need added salt or salt tablets.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nTable salt, sea salt, rock salt, ham, bacon, cheese, sausages, dried fish, dried seafood, meats, poultry, butter, nuts.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nAnorexia, irritability, tension, confusion, fluid-retention, high blood pressure, excessive thirst and drinking, frequent urination, renal failure, premenstrual tension symptoms.&nbsp;</p>\r\n\r\n<p><br />\r\nPOTASSIUM (K)</p>\r\n\r\n<p>Signs and symptoms Associated with Deficiency:&nbsp;<br />\r\nFatigue, anorexia, constipation, muscle weakness, muscle cramps, slow, palpitations, heart arrythmias, agitation, nervousness, depression.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nUse salt substitutes or fruit and vegetable juice daily. &nbsp;Magnesium-Potassium Aspartate supplements often useful.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nFruits, vegetables, fruit juices, vegetable soups.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nLack of appetite, apathy, muscle-fatigue, mental confusion and slurred speech.&nbsp;</p>\r\n\r\n<p><br />\r\nSULFUR (S)</p>\r\n\r\n<p>Signs and Symptoms Associated with Deficiency:&nbsp;<br />\r\nPossibly sluggishness and fatigue.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nGenerally unnecessary in the form of elemental sulphur. &nbsp;In the Western world, chronic toxication by environmental pollutants may reduce sulphate-conjugation pathways in the liver. Supplementation with sulphated amino acids may be very beneficial in these situations.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nHigh protein foods: Meat, fish, eggs, poultry, legumes, nuts, cabbage, Brussel sprouts, asparagus, onions, garlic and chives.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nAnorexia, nausea and vomiting, diarrhoea and abdominal cramps.&nbsp;</p>\r\n', '3', '0', '1', '2014-07-10 05:58:44', '2014-07-10 06:11:29', '1');
INSERT INTO `nutritional_guides` VALUES ('5', 'THE TRACE MINERALS', '<p>THE TRACE MINERALS<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nCOPPER (Cu)</p>\r\n\r\n<p>Copper deficiency has been associated with the following symptoms and signs:<br />\r\nAnaemia, alopecia, generalised weakness, fatigue, depression, skin rash, recurrent infection, diarrhoea, high cholestrol emphysema, osteopenia, myocardial degeneration.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:&nbsp;<br />\r\n1-2mg daily: Usually unnecessary as found in water supplies. &nbsp;Supplementation may be required if taking high dose supplements of zinc, calcium or iron.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:&nbsp;<br />\r\nLiver, prawns, crab, lobster, oysters, brown rice, wheat germ and bran, cauliflower, green peas and beans, kale, mushroom, soybean, yeast, pecans, walnuts, seeds, chocolate, molasses, coffee, tea, gelatin.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nBrain stimulation: insomnia, racing mind, irritability, anger, aggressiveness, alienation, paranoia, depression, hyperactivity and autism in children, brittle hair, premenstrual tension, muscle and joint pain.&nbsp;</p>\r\n\r\n<p><br />\r\nZINC (Zn)</p>\r\n\r\n<p>Zinc deficiency has been associated with the following symptoms and signs:<br />\r\nAcne, anorexia, loss of taste, eczema, glucose intolerance, diabetes, apathy, fatigue, depression, hyperactivity in children, impaired protein synthesis: hair loss, poor wound healing, skin stretch marks, soft or brittle nails, growing pains, recurrent infections, white-spots in nails, growth impairment: shortened stature, delayed sexual maturity, impotence, irregular menstruation.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\n10 - 30 mg daily. &nbsp;NOTE: prolonged high dose use may cause copper and iron deficiency.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nOysters, fish (sardines, herring), meat, liver, milk, seeds, wheat germ, onions, mushrooms, yeast, whole grains, nuts, peas, carrots, vegetables.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNausea, vomiting, diarrhoea, drowsiness, increased sweating, alcohol intolerance. &nbsp;May induce copper and/or iron deficiency. &nbsp; May induce seizures in people with epilepsy.&nbsp;</p>\r\n\r\n<p><br />\r\nIRON (Fe)</p>\r\n\r\n<p>Iron deficiency has been associated with the following symptoms and signs:&nbsp;<br />\r\nTiredness, easy fatigue, weakness, impaired memory, poor concentration, impaired cognitive ability, poor learning, depression, anaemia, dizziness, shortness of breath, cardiac failure, brittle nails, lustreless nails, flattened or spoon-shaped nails, hair loss, dfficulty in swallowing.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:&nbsp;<br />\r\n325 mg of iron sulfate or gluconate 1-3 times daily.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nMeats, liver and organ meats, eggs, leafy green vegetables.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nLiver damage, induced vitamin C deficiency, bronzing of skin, anorexia, dizziness, headache, constipation, excessive iron storage can cause cirrhosis, diabetes and accelerate the development of arteriosclerosis, arthritis and Altzheimer&#39;s.&nbsp;</p>\r\n\r\n<p><br />\r\nMANGANESE (Mn)</p>\r\n\r\n<p>Manganese deficiency has been associated with the following symptoms and signs:<br />\r\nPoor bone growth: osteoporosis, bone fragility, slow growth of hair and nails, reddening of hair, dermatitis, weight loss, very low cholesterol and diabetes.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\nUsually 1 to 2 mg/day. &nbsp;For Tardive Dyskinesia - 30 to 60 mg daily may be useful.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nLeafy green vegetables, peas, beans, whole grains, nuts, coffee and tea.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNeurological: Apathy, depression, weakness, disturbed sleep, episodic insanity, violence, Parkinsonism with muscular rigidity, monotonal voice and masklike face, anorexia, impotence.</p>\r\n\r\n<p><br />\r\nCHROMIUM (Cr)</p>\r\n\r\n<p>Chromium deficiency has been associated with the following symptoms and signs:<br />\r\nMature-onset diabetes, high cholesterol levels, impaired growth, anxiety and fatigue.</p>\r\n\r\n<p>Supplemental dosage:<br />\r\n50-100 micrograms two to three times daily.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nBrewer&#39;s yeast, mushrooms, black pepper, wholegrain wheat and bread, beetroot, liver, beef, beer.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nDermatitis, stomach ulcers, liver damage, kidney damage.&nbsp;</p>\r\n\r\n<p><br />\r\nSELENIUM (Sn)</p>\r\n\r\n<p>Selenium deficiency has been associated with the following symptoms and signs:<br />\r\nHigh cholesterol levels, poor pancreatic enzyme production, impaired liver function, recurrent infections, male sterility. &nbsp;Recent evidence suggests that selenium deficiency increases the risk of cancer and arteriosclerosis.&nbsp;</p>\r\n\r\n<p>Supplemental dosage:<br />\r\n50 - 200 micrograms per day. &nbsp;NOTE: selenium is TOXIC in high dosage.&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nTuna, herring, liver, eggs, bran, yeast, wheat germ, garlic, onion, broccoli, cabbage, tomatoes.&nbsp;</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nHair loss, brittle nails, yellowish skin, pallor, skin eruptions, lassitude, fatigue, arthritis, muscle pains, diabetes, liver damage, kidney damage, immune system depression, anorexia, abdominal discomfort and pain, garlic-breath odor, metallic taste in mouth, muscle paralysis, coma and death.&nbsp;</p>\r\n', '3', '0', '1', '2014-07-10 05:59:21', '2014-07-10 06:12:06', '1');
INSERT INTO `nutritional_guides` VALUES ('6', 'THE NEUROTRANSMITTERS', '<p>THE NEUROTRANSMITTERS&nbsp;<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nSEROTONIN</p>\r\n\r\n<p>Serotonin is a major neurotransmitter of the CNS. It is synthesised from the essential amino acid Tryptophan via a 2-step enzyme pathway and the rate-controlling co-enzyme for this pathway is Vit B6 (pyridoxal-5-phosphate). Synthesis of serotonin by serotonergic nerve cells is dependent on adequate CNS levels of L-tryptophan and Vit B6 and is also affected by inadequate tissue levels of magnesium and zinc. Tryptophan uptake into the CNS tissue is, in turn, dependent on &nbsp;a) dietary tryptophan intake &nbsp;b) concomitant dietary intake of neutral amino acids and &nbsp;c) concomitant dietary intake of carbohydrates. Thus, CNS uptake of tryptophan can be inhibited by foods that are high in protein (contain competing neutral amino-acids) and low in carbohydrate. Conversely, tryptophan uptake can be enhanced by consumption of a high-carbohydrate meal. As CNS synthesis of serotonin is directly dependent on tissue levels of L-tryptophan, dietary meal composition and L-tryptophan supplementation can exert a direct and substantial impact on brain serotonin levels.</p>\r\n\r\n<p>The following symptoms and signs have been associated with a deficiency of Serotonin:<br />\r\nSugar or starch-craving, insomnia (difficulty getting to sleep), non-refreshing sleep, irritability, aggressive behaviour, anxiety or nerviness, obsessiveness or excess worrying, Obsessive-Compulsive Disorder, unipolar Depression, possibly Schizophreniform Disorder. Increased pain sensitivity has been reported with serotonin depletion due to lowering of the spinal-cord and thalamic pain threshold.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nL-tryptophan 100mg to 300mg daily&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nSoy protein, brown rice, cottage cheese, fish, beef, liver, lamb, peanuts, pumpkin, sesame seeds and lentils.&nbsp;</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nL-tryptophan 250mg to 3000mg per day - preferably on an empty stomach with a high-carbohydrate snack or drink. Doses can be spread over the day, with a larger fraction given at night. To enhance conversion to serotonin, Vit B6 and magnesium plus additional Vit B3 should also be administered.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nSide-effects may occur in patients who are deficient in Vit B6, B3 and Magnesium and, especially, dopamine. Common side-effects noted are: lightheadedness, dizziness, spaciness, excessive drowsiness, sleepiness, occasional agitation. Tryptophan supplementation may aggravate bronchial asthma, high blood pressure and bladder contractility. It should be used with great caution in patients with cancer, diabetes, SLE and during pregnancy. L-tryptophan supplements were recently withdrawn due to the occurrence of fatal Eosinophilic Myalgia, which has now been conclusively shown to be due to a contaminant introduced during the manufacturing process, and only affecting one manufacturer, and NOT due to Tryptophan itself. Tryptophan should be used with great caution in patients on MAO inhibitor drugs or the new antidepressant SSRI drugs, such as Prozac.</p>\r\n\r\n<p><br />\r\nDOPAMINE</p>\r\n\r\n<p>Dopamine is a major neurotransmitter, being synthesised by the dopaminergic neurones of the brain and spinal cord and also specific nerve cells of the enteric plexus. It is synthesised from the amino-acid L-tyrosine and the rate-controlling co-enzymes for this pathway are Vit B6, magnesium and zinc. Dopamine is further converted to noradrenalin and adrenalin in specific neuronal cells and the adrenal medulla cells. Dopamine synthesis can enhanced by increasing brain tissue levels of Vit B6, zinc and magnesium AND supplementation with L-tyrosine but this will only occur if the dopminergic neurones are physiologicaly active, hence, exercise or mental arousal is also required. Brain tyrosine uptake is inhibited competition from other neutral amino-acids (similarly to L-tryptophan) and is thus enhanced by concomitant feeding of a high-carbohydrate snack or drink. Dopamine and its related catecholamines generally have a stimulatory activity on the brain and cardiovascular system, whilst in the gastrointestinal system they generally induce inhibition.</p>\r\n\r\n<p>Deficiency of Dopamine may be associated with the following clinical signs and symptoms:<br />\r\nLethargy, tiredness, excessive drowsiness or sleepiness, apathy, depression, bowel irritability, lowered pain threshold with increased pain sensitivity, motor retardation, tremor, Parkinson&#39;s Disease, Unipolar Depression.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nRed meat, fish, cheese, liver, lamb, soy protein extracts, yeast,</p>\r\n\r\n<p>Therapeutic Usage:<br />\r\nL-tyrosine 500mg to 3000mg daily - preferably given throughout the morning, on an empty stomach with a high-carbohydrate snack or drink.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nTyrosine can induce toxic effects at doses above 2000mg per day. The common side-effects noted are constipation and agitation, whereas toxic effects are blistering and ulceration of peripheral digits and suppression of growth. Tyrosine supplements are contraindicated in patients on MAO inhibitor drugs.</p>\r\n\r\n<p><br />\r\nENDORPHINS</p>\r\n\r\n<p>The endorphins are a heterogenous group of oligopeptides which stimulate the opioid receptors of neuronal cells, inducing pain relief, mood elevation, stress-relief, optimism and euphoria. The major endorphins are dynorphin, B-endorphin, met-enkephalin and leu-enkephalin and are secreted in response to sympathetic nervous system stimuli, pain stimuli and substance P release. They are deactivated by the enzymes carboxypeptidase A and enkephalinase. Brain levels of endorphins have been found to be depleted in depressive states, chronic stress conditions and chronic pain syndromes. Tissue endorphin activity can be enhanced by supplementation with dl-phenylalanine (DLPA), a combination of isomers of the essential amino-acid phenylalanine, which has been shown to actively inhibit the activity of the endorphin-degrading enzymes and thus faciltate prolonged endorphin effects. DLPA does not interfere with the transmission of normal pain impulses, so the normal defence mechanism of the body is not compromised. Only the pain-relieving mechanism is enhanced.</p>\r\n\r\n<p>The following symptoms and signs have been associated with a deficiency of Endorphins:<br />\r\nIncreased pain sensitivity, Chronic Pain Syndromes, pessimistic outlook, fear, gloominess and depression.</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nRecommended Phenylalanine intake is approximately 16mg/kg bodyweight - equivalent to 1200 - 2200mg daily&nbsp;</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\nAll first-class proteins (about 73mg per gram) - fish, meat, poultry, cottage cheese, soybean, almonds, Brazil nuts, pecan nuts, pumpkin and sesame seeds, legumes.</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nIn chronic pain states- 750mg 3 times a day, about 30-40 min before meals. This dose can be doubled after 3 weeks if no pain relief occurs.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nNo specific toxic effects have been noted but DLPA should be used with caution in patients with hypertension, Bipolar Depression and mania.&nbsp;</p>\r\n\r\n<p><br />\r\nACETYLCHOLINE</p>\r\n\r\n<p>Acetylcholine is the most widespread neurotransmitter chemical in the brain and body and is required for normal central and peripheral nerve function. It is synthesised by the acetylation of the chemical choline in a reaction catalysed by choline acetyltransferase and requires abundant tissue levels of acetyl-CoA. Supplementation with choline or phosphatidylcholine has been shown to substantially increase brain levels of these chemicals with enhanced synthesis of the neurotransmitter, acetylcholine.</p>\r\n\r\n<p>The following symptoms and signs have been associated with a deficiency of Acetylcholine &amp; choline:<br />\r\nShort-term memory loss, impaired concentration and learning, impaired comprehension, decline in cognitive function, emotional instability, susceptibility to stress, impaired bowel function with constipation, impaired digestion, fat intolerance, gastric ulcer and dyspepsia, dysautonomia, depression, dementia, Alzheimer&#39;s disease, Mania.&nbsp;</p>\r\n\r\n<p>Supplemental Dosage:<br />\r\nCholine is synthesised in the body and is also derived from foods - no known recommended intake.</p>\r\n\r\n<p>Rich Natural Sources:<br />\r\negg yolk, fish, soy lecithin, legumes, grains</p>\r\n\r\n<p>Therapeutic Dosage:<br />\r\nPhosphatidylcholine concentrate 1200mg caps - dose: 2-3 capsules twice a day.</p>\r\n\r\n<p>Signs of Toxicity:<br />\r\nCommonest side-effects are: nausea, increased bowel irritability, diarrhoea and lightheadedness. May increase blood pressure and bronchial airways contraction, use with caution in patients with hypertension and asthma.&nbsp;</p>\r\n', '3', '0', '1', '2014-07-10 06:05:59', '2014-07-10 06:12:38', '1');
INSERT INTO `nutritional_guides` VALUES ('7', 'Allergy', '<p>ALLERGY</p>\r\n\r\n<p>Many people with health problems are sensitive to commonly-eaten foods. &nbsp;These include dairy foods, yeast-containing foods, wheat and other grains, and a variety of chemical substances which &nbsp;occur naturally in fruits and vegetables.&nbsp;</p>\r\n\r\n<p>The reactions to these foods may be due to an immune system reaction or to a biological chemical effect. &nbsp;They can, however, profoundly affect a person&#39;s health and may produce a wide variety of symptoms.</p>\r\n\r\n<p>A carefully managed low-allergy and/or low-chemical diet is required in the treatment of people with food allergy or in chemical sensitivity problems.</p>\r\n\r\n<p>If a food sensitivity/allergy problem is indicated by Nutricheck&#39;s &nbsp;analysis, a four-week trial of a low-allergy diet may be beneficial in relieving these allergy/sensitivity problems.</p>\r\n\r\n<p>A low-allergy diet is included in the Nutricheck program for your reference and is best supervised by your health practitioner.</p>\r\n', '3', '0', '2', '2014-07-10 06:06:31', '2014-07-10 06:14:52', '1');
INSERT INTO `nutritional_guides` VALUES ('8', 'SUGAR METABOLISM', '<p>SUGAR METABOLISM</p>\r\n\r\n<p><br />\r\nMany people appear to be sensitive to refined and simple sugars in their diets. &nbsp;Consumption of sugars by these people may cause the blood sugar level to rise and fall too rapidly. This condition is called FUNCTIONAL HYPOGLYCAEMIA and often produces symptoms of tiredness, fatigue, mood swings, anxiety, panic symptoms and irritability.</p>\r\n\r\n<p>This condition is not a disease in itself, but, usually indicates a disturbance in the sugar control mechanism. &nbsp;This disturbance may be triggered by many factors, such as stress, adrenal exhaustion, food allergy reactions, hormonal imbalance, high sugar intake and impaired digestion.</p>\r\n\r\n<p>It should respond to the Optimal Health Diet and to supplements of digestive enzymes. &nbsp;If, however, food sensitivity reactions are apparent or suspected, then the Low-Allergy Diet should be used.</p>\r\n\r\n<p>FUNCTIONAL HYPOGLYCAEMIA can be confirmed by a 5-hr Glucose Tolerance Test. &nbsp;Consult your health care practitioner for this test.</p>\r\n', '3', '0', '2', '2014-07-10 06:07:10', '2014-07-10 06:13:50', '1');
INSERT INTO `nutritional_guides` VALUES ('9', 'Digestive Function', '<p>DIGESTION</p>\r\n\r\n<p>A Significant number of people have an impaired secretion of hydrochloric acid in the stomach after eating. &nbsp;This most commonly occurs in those who have a chronic illness or multiple food and chemical sensitivity reactions, or with advancing age.</p>\r\n\r\n<p>It results in improper food digestion, especially of protein foods, and leads to a gradual lack of protein which, in turn, causes chronic tiredness and fatique. &nbsp;Also, a high level of small protein fragments is produced in the intestine and this can cause immune system reactions and can interfere with nervous system function.</p>\r\n\r\n<p>If you have poor hydrochloric acid secretion, as indicated by your NUTRICHECK analysis, consult your health practitioner about supplements of hydrochloric acid and pancreatic enzymes.</p>\r\n', '3', '0', '2', '2014-07-10 06:07:38', '2014-07-10 06:15:13', '1');
INSERT INTO `nutritional_guides` VALUES ('10', 'Bowel Flora', '<p>BOWEL FLORA</p>\r\n\r\n<p><br />\r\nThe healthy intestine of humans normally contains large numbers of bacteria and fungi. &nbsp;Over 100 types of organisms are found in the intestine and many of these are capable of producing a variety of toxic chemicals which can irritate the bowel and adversely affect the function of organs such as the liver, the nervous system and the immune system. &nbsp;Ideally, the activity and growth of these toxigenic organisms are controlled and neutralised by other bacterial organisms which are more friendly and often are even positively beneficial. &nbsp;The two most common friendly bacteria are called LACTOBACILLUS and BIFIDOBACTERIA.</p>\r\n\r\n<p>The presence of a large population of friendly bacteria in the intestine (over 90%), appears to be essential for good health. &nbsp;These bacteria have been shown to benefit your body in many ways. &nbsp;They improve immune system function, hormone balance, food absorption and bowel function. &nbsp;They also reduce the levels of cholesterol, cancer-causing chemicals and the toxin-producing organisms. &nbsp;They protect the bowel lining and enhance the liver&#39;s detoxification ability.</p>\r\n\r\n<p>An excessive growth of toxigenic organisms in the intestine occurs when the population of friendly bacteria is decreased. &nbsp;This condition is called BOWEL TOXICITY or BOWEL DYSBIOSIS and often plays a major role in the development of chronic ill-health.</p>\r\n\r\n<p>If you have a BOWEL TOXICITY problem you should consult your health practitioner to discuss the best method of correcting the imbalance in the bowel flora.</p>\r\n', '3', '0', '2', '2014-07-10 06:15:42', '2014-07-10 06:15:42', '1');
INSERT INTO `nutritional_guides` VALUES ('11', 'The Low Allergy Diet', '<p>THE LOW ALLERGY DIET<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nThis diet may be suitable for people with a HIGH ALLERGY score on the Nutricheck analysis. Check with your health practitioner.&nbsp;</p>\r\n\r\n<p>DIET RULES:&nbsp;<br />\r\nYou need to adhere closely to these rules to maintain a good nutritional status as this is a very restricted diet.</p>\r\n\r\n<p>1.. You must eat 3 MEALS A DAY ... *** NO SKIPPING MEALS ***&nbsp;<br />\r\n2.. Each meal must be BALANCED ... with PROTEIN/FIBRE/STARCH/FRUIT.&nbsp;<br />\r\n3.. Try to eat SEAFOOD at least once a day.&nbsp;<br />\r\n4.. Avoid common ALLERGY-CAUSING foods: MILK / GRAINS / YEAST.&nbsp;<br />\r\n5.. Avoid processed foods which contain preservatives and chemicals.&nbsp;</p>\r\n\r\n<p>HIGH PROTEIN FOODS:&nbsp;<br />\r\n(% protein = grams of protein/100 gm of food)<br />\r\nEGGS: Approx. 17.5% : (one 45gm egg = 8gm protein).&nbsp;<br />\r\nSEAFOOD: 16 - 20 % : average 18%.<br />\r\nPOULTRY: 23 - 27 % : average 25%.<br />\r\nLEAN MEAT: 27 - 33 % : average 30%.<br />\r\nNUTS: 16 - 19 % : average 17% (cashews and almonds only).<br />\r\nBEANS: Average only 8% when cooked.</p>\r\n\r\n<p>Ideal Body Weight:<br />\r\nYour protein requirement depends on your &#39;Ideal Bodyweight (IBW)&#39; and an &#39;Exercise Factor (EF)&#39; related to your exercise level. &nbsp;<br />\r\nNo exercise - EF = 1;&nbsp;<br />\r\nLight exercise - EF = 1.2;&nbsp;<br />\r\nModerate exercise: EF = 1.4; and&nbsp;<br />\r\nHeavy exercise - EF = 1.6.</p>\r\n\r\n<p>To calculate your daily protein requirement:<br />\r\nMultiply Ideal Bodyweight (IBW) X 0.9 X Exercise Factor (EF). &nbsp;Example: A 64 kg woman doing 3 aerobic classes a week would have a protein requirement = 64 X 0.9 X 1.2 = 69 gm/day = 23 gm/per meal.</p>\r\n\r\n<p>To calculate the serving size for each food:&nbsp;<br />\r\nMultiply the protein needed per meal X 100, and divide by the % protein of that food. &nbsp;Example: For a meal of salmon (seafood), the serving size = (23 gm X 100) / 18 = 128 gm of salmon.&nbsp;</p>\r\n\r\n<p>HIGH FIBRE FOODS:&nbsp;<br />\r\nThink of vegetables only here. Not because they are the only foods which have fibre, but because they are highly packed with nutrients(vitamins and minerals). You should try to eat approximately 150gm per meal.&nbsp;</p>\r\n\r\n<p>VEGETABLES:&nbsp;<br />\r\nUse 5-6 varieties per meal. Choose from the following: &nbsp;Cauliflower, broccoli, cabbage, brussel sprouts, celery, lettuce, carrots, parsnip, turnip, choko, onion, green beans, mushrooms, raw beetroot, radish, avocado, mungbean sprouts, and tomato(in small amounts).&nbsp;</p>\r\n\r\n<p>The following vegetables may cause reactions in chemically sensitivity people: Cucumber, pumpkin, zucchini, squash, scallopini, dill pickle, spinach, silverbeet, aubergine, capsicum, tomato and alfalfa sprouts. &nbsp;These are best avoided in the early days of this diet.</p>\r\n\r\n<p>HIGH STARCH FOODS:&nbsp;<br />\r\nMany of these foods are also high in fibre. &nbsp;You should try to eat about 100 - 150 gm of these per meal.&nbsp;</p>\r\n\r\n<p>GRAINS/CEREALS:&nbsp;<br />\r\nRice, rice-noodles, rice-crackers, rice-flour. &nbsp;</p>\r\n\r\n<p>OTHER STARCHES:&nbsp;<br />\r\nSago, tapioca, buckwheat and buckwheat flour.&nbsp;</p>\r\n\r\n<p>LEGUMES:<br />\r\nSplitpeas, lentils, chickpeas, soybean and other dried beans, soy flour, and yellow-pea flour.&nbsp;</p>\r\n\r\n<p>VEGETABLES:&nbsp;<br />\r\nSweet-potato, potato, peas and butternut-pumpkin.&nbsp;</p>\r\n\r\n<p>FRUITS:<br />\r\nTry to eat 100 - 150 gm of fruit after each meal. Select from apple, pear, pawpaw, kiwi-fruit, banana, mango, and custard-apple.</p>\r\n\r\n<p>The following fruits frequently cause chemical reactions: &nbsp;Peaches, apricots, plums, cherries, watermelon and other melons, citrus fruit, grapes, berries, pineapple and many dried fruits.&nbsp;</p>\r\n\r\n<p>DRINKS: &nbsp;<br />\r\nYou should drink about 2 litres of fluid a day (8-10 cups).&nbsp;<br />\r\nWATER : &nbsp;Soda/mineral and tap water (tap water should be filtered), flavoured with lemon, 100% fruit-juice or Angostura bitters.&nbsp;<br />\r\nTEAS: &nbsp;Herbal and low-tannin teas are usually OK : Check for chemicals. Ordinary tea is usually OK if weak and black.&nbsp;<br />\r\nCOFFEE: &nbsp;Steam-decaffeinated coffee may be OK, but should preferably be filtered. Instant coffees often contain added chemicals.&nbsp;<br />\r\nALCOHOL: Scotch (12-yr-old), cointreau, gin and vodka may be OK. &nbsp;Red wine MAY be tolerated by some people. &nbsp;Beer, wine, rum and brandy often trigger reactions.&nbsp;</p>\r\n\r\n<p>HERBS AND SPICES:&nbsp;<br />\r\nThese are generally tolerated in small amounts. &nbsp;AVOID paprika though chilli may be OK in small amounts.</p>\r\n\r\n<p>FLAVOURINGS:&nbsp;<br />\r\nOnion, garlic and ginger are usually OK.&nbsp;<br />\r\nTOMATO PASTE: This must be yeast free and may be OK in small amounts. &nbsp;&nbsp;<br />\r\nTAMARI(wheat-free): Use this instead of soy sauce.&nbsp;<br />\r\nDASHI: Use this instead of stockcubes. It must be yeast-free.<br />\r\nTAMARIND OR LEMON: Use instead of vinegar.White vinegar may be OK.&nbsp;<br />\r\nSALAD DRESSINGS: Use oil and lemon or white vinegar.&nbsp;</p>\r\n\r\n<p><br />\r\nAVOID THE FOLLOWING FOODS&nbsp;</p>\r\n\r\n<p>GRAINS:<br />\r\nALL grains except rice (especially WHOLEGRAINS), wheat, rye, corn, oats, barley, semolina and millet, breads, pasta, biscuits, muesli and most breakfast cereals.&nbsp;</p>\r\n\r\n<p>MILK PRODUCTS:<br />\r\nMilk, cream, cheeses, yoghurts and milk-solids *** Pure butter mixed with olive/canola oil may be OK ***&nbsp;</p>\r\n\r\n<p>YEAST:&nbsp;<br />\r\nBreads, biscuits, wine, beer, stockcubes, thick sauces, vegemite/marmite, gravox, vinegar, soy-sauce, miso, most &nbsp;processed foods and dried fruit, and ALL fermented foods.&nbsp;</p>\r\n\r\n<p>SUGARS:&nbsp;<br />\r\nTable-sugar, honey, lactose, milks, citrus fruit-juices, cakes, biscuits, sweets, ice-cream, and chocolate (Pure-sugar, maple-sugar, honey and rice-sugar may be tolerated in small amounts).</p>\r\n\r\n<p>PROCESSED FOODS:&nbsp;<br />\r\nPreservatives and artificial colours:<br />\r\nAVOID all CHEMICALS as much as possible. &nbsp;These include: Insecticides, solvents, perfumes, petrochemicals, paints, varnishes etc.</p>\r\n\r\n<p><br />\r\nALTERNATIVE FLOURS</p>\r\n\r\n<p>These are: Rice flour, yellow-pea flour(besan), soy flour, buckwheat flour, potato flour, lentil flour, tapioca flour, and arrowroot. &nbsp;A mix of these flours can be used to make pancakes, pikelets, scones, biscuits and, (for really good cooks) even damper.&nbsp;</p>\r\n\r\n<p>PANCAKE RECIPE: This can be used as a bread replacement.&nbsp;</p>\r\n\r\n<p>Flour mix: Rice - 2 Tblsp, potato - 2t, besan - 1t, buckwheat/Soy- 1t.<br />\r\nAdd pectin - 2 tsp, baking powder - 1 tsp, 1 egg, melted butter, and pureed fruit.&nbsp;<br />\r\nBlend with water to a thin batter and fry as pancakes or pikelets.&nbsp;</p>\r\n\r\n<p><br />\r\nMEAL PLANNING FOR A LOW-ALLERGY DIET</p>\r\n\r\n<p>You should plan your meals in advance as it is difficult to organise a low-allergy meal on the spur-of-the-moment.&nbsp;</p>\r\n\r\n<p>BREAKFAST:&nbsp;</p>\r\n\r\n<p>1.. Try a peasoup made with meatbones and added vegetables. &nbsp;Serve with rice.<br />\r\n2.. Meat stew or casserole served with rice.<br />\r\n3.. Bubble and Squeak: Vegetables and chicken fried with egg (useful for leftovers).&nbsp;<br />\r\n4.. Meat rissoles or fishcakes made with potato and vegetables.&nbsp;</p>\r\n\r\n<p>LUNCH:</p>\r\n\r\n<p>1.. Chicken and salad with rice or potato. Use a salad dressing or egg-yolk/oil mayonnaise.&nbsp;<br />\r\n2.. Meat rissoles or fishcakes made with potato and served with a rice salad.<br />\r\n3.. Chicken and pork satays served with rice and a salad.&nbsp;</p>\r\n\r\n<p>DINNER:&nbsp;</p>\r\n\r\n<p>1.. Seafood or poultry.&nbsp;<br />\r\n2.. Serve with vegetables and starches.&nbsp;</p>\r\n\r\n<p><br />\r\nNOTE 1: If you are allergic to any of the foods listed as OK, then these foods must ALSO be avoided. Please check with your health care practitioner.&nbsp;</p>\r\n\r\n<p>NOTE 2: &nbsp;If you break the diet &nbsp;... ENJOY it ! &nbsp; DO NOT agonise over it or make yourself feel guilty. &nbsp;DO OBSERVE, however, whether or not any reactions occur.&nbsp;</p>\r\n', '3', '0', '3', '2014-07-10 07:29:01', '2014-07-10 07:29:01', '1');
INSERT INTO `nutritional_guides` VALUES ('12', 'Food Challenge Testing', '<p>FOOD CHALLENGE TESTING<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nA food challenge test, done at home, can be used to determine if a food sensitivity problem is present and is responsible for your ill-health. &nbsp;The two main methods of performing a food challenge test are:&nbsp;</p>\r\n\r\n<p>METHOD 1:<br />\r\nAbstain from the suspect food group for a period of 5-7 days, then eat a moderately large amount (approximately 100gm) of the suspect food and note whether or not any symptoms develop. &nbsp;Any ill-health symptom should be recorded and is regarded as a possible positive reaction.&nbsp;</p>\r\n\r\n<p>Again abstain from the suspected food(s) for another 5-7 days and then repeat the food challenge. &nbsp;A sensitivity reaction to that food(s) is present if the same or similar symptoms recur.&nbsp;</p>\r\n\r\n<p>METHOD 2:&nbsp;<br />\r\nAbstain from the suspect food group for a period of 5-7 days, then eat a moderate amount (approximately 50-100gm) of the suspect food each day for 3 consecutive days. &nbsp;Note any symptoms that develop.</p>\r\n\r\n<p>Again, abstain from that food(s) for 5-7 days and then repeat the food challenge. &nbsp;A sensitivity reaction to that food(s) is present if the same or similar symptoms recur.&nbsp;</p>\r\n\r\n<p>The second method is a more reliable way of identifying a food sensitivity problem, although it does take longer to do.&nbsp;</p>\r\n\r\n<p>Many people who are intolerant of one or more specific foods may also show a reaction to other related foods. &nbsp;For example, if you react to wheat you may also react to RYE, CORN and/or OATS. &nbsp;So, avoiding wheat may not improve your symptoms if you continue to eat these other grains.</p>\r\n\r\n<p>If you are sensitive to several foods, then all these foods need to be excluded before a challenge test is done. &nbsp;For example, if you are reacting to wheat, milk and yeast (the 3 most common food reactions), then these must be excluded before you can start challenge testing. &nbsp;If this situation is suspected, then a low-allergy diet offers the best chance of success. A balanced low-allergy diet is available from the Nutricheck program and should be supervised by your health care practitioner.&nbsp;</p>\r\n', '3', '0', '3', '2014-07-10 07:30:03', '2014-07-10 07:30:03', '1');
INSERT INTO `nutritional_guides` VALUES ('13', 'Dietary Hints for Food Allergy Patients', '<p>DIETARY HINTS FOR FOOD ALLERGY PATIENTS<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nPeople allergic to WHEAT, will also usually react to other grains, except possibly RICE. &nbsp;So, most other grains need to be avoided before attempting a challenge test. &nbsp;These include RYE, CORN, OATS, BARLEY, SEMOLINA and MILLET.&nbsp;</p>\r\n\r\n<p>ALTERNATIVE FLOURS are available in most Health Food shops as substitutes for wheat flour. &nbsp;These include:&nbsp;<br />\r\n.Arrowroot - used in place of cornflour.&nbsp;<br />\r\n.Rice Flour - used for thickening soups and stews and for making rissoles, fishcakes etc.<br />\r\n.Yellow-pea Flour - when mixed with rice flour is useful for coating foods prior to frying. &nbsp;This is also nice in a batter.&nbsp;<br />\r\n.Potato Flour - used for thickening soups and stews instead of cornflour and also used for binding rissoles and fishcakes.&nbsp;<br />\r\n.Buckwheat can also be used, usually mixed with rice flour and potato flour. &nbsp;It does make nice pancakes and pikelets.&nbsp;</p>\r\n\r\n<p>RICE CRACKERS RICE-CAKES and RICE-NOODLES make reasonable substitutes for bread and pasta and even, RICE BREADS are now available in Health Food shops.&nbsp;</p>\r\n\r\n<p>Most oriental sauces, which contain MSG generally appear to be well tolerated. &nbsp;However, wheat-free Soy Sauce and Tamari are usually a safer option than the regular variety.&nbsp;</p>\r\n\r\n<p>SOY-MILK may usually be used by people who are sensitive to dairy foods. &nbsp;These days, however, many children often appear to also be allergic to SOY products.&nbsp;</p>\r\n\r\n<p>Many SOY products also often contain YEAST, so if a yeast sensitivity is present these foods must be avoided. &nbsp;</p>\r\n\r\n<p>Usually EQUAL can be used as a sweetener BUT some people do react to this sweetener. &nbsp;SPLENDA is probably a safer choice.&nbsp;</p>\r\n\r\n<p>Many people appear to react adversely to fruits. Usually, these people are reacting to salicylates and benzoates which occur naturally in many fruits. Fruits which most commonly trigger these sensitivty reactions are CITRUS, STONEFRUITS, BERRIES, MELONS. &nbsp;However, some people also react to banana, grapes, pineapple and mango. &nbsp;Fruits such as APPLE, PEAR, NASHI, PAWPAW, SUGAR BANANA and KIWI FRUIT are usually better tolerated.&nbsp;</p>\r\n\r\n<p>HERBS, SPICES and LEMON-JUICE can be used to provide variety in taste. &nbsp;Oriental and asian recipes also provide this variety.&nbsp;</p>\r\n', '3', '0', '3', '2014-07-10 07:31:37', '2014-07-10 07:31:37', '1');
INSERT INTO `nutritional_guides` VALUES ('14', 'The Optimal Health Diet', '<p>THE OPTIMAL HEALTH DIET<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p><br />\r\nThis diet is suitable for people who are problem free and in good health. It may not be suitable for those with FOOD ALLERGY, CHEMICAL SENSITIVITY or other chronic disorders. &nbsp;Check with your health practitioner.&nbsp;</p>\r\n\r\n<p>BREAKFAST:</p>\r\n\r\n<p>Fruit juice and mineral water: no added sugar or preservatives.&nbsp;<br />\r\nChopped fresh fruit: Use a variety - apple, pawpaw, melon, citrus.&nbsp;<br />\r\nMuesli: Raw with nuts, coconut and dried fruit - no sugar.&nbsp;<br />\r\nYoghurt: Acidophilus - Add your own fruit to this for flavour.&nbsp;<br />\r\n(Use the yoghurt with your muesli rather than milk).&nbsp;<br />\r\nLecithin granules: 1-2 tablespoons.&nbsp;</p>\r\n\r\n<p><br />\r\nLUNCH:</p>\r\n\r\n<p>Protein: Seafood, egg or poultry - about 90-120 gm (3-4 oz).&nbsp;<br />\r\nSalad: Grated carrot, raw beetroot and apple, served with lettuce&nbsp;<br />\r\ntomato, celery, avocado, mungbean sprouts, cucumber and capsicum&nbsp;<br />\r\n(Use as large a variety as possible).&nbsp;<br />\r\nSalad dressing: Olive oil, cider vinegar and herbs.&nbsp;<br />\r\nBread: 1-2 slices: Wholemeal, multi-grain or rye sourdough.&nbsp;</p>\r\n\r\n<p><br />\r\nDINNER:</p>\r\n\r\n<p>Protein: Seafood, poultry or lean meat - 90-120 gm (3-4 oz).&nbsp;<br />\r\nLiver is highly recommended once a week.&nbsp;<br />\r\nStarchy foods: Rice, corn, pasta, potato, sweet-potato, butternut&nbsp;<br />\r\npumpkin, splitpeas, greenpeas, chickpeas, and lentils(100-150gm).<br />\r\nHigh fibre foods: Cauliflower, broccoli, cabbage, Brussel sprouts,&nbsp;<br />\r\nonion, leeks, zucchini, button-squash, pumpkin, carrot, parsnip,&nbsp;<br />\r\nturnip, celery, greenbeans, spinach, choko, capsicum, beetroot&nbsp;<br />\r\n(Use a wide variety - approximately 150gm or 4-5 oz).&nbsp;<br />\r\nFruit: use as a dessert - 100-150gm. &nbsp;Can be served with yoghurt.&nbsp;</p>\r\n\r\n<p><br />\r\nDRINKS: Drink at least 1-2 L/day (4 - 8 glasses).&nbsp;</p>\r\n\r\n<p>Mineral water: The level of calcium and magnesium should be higher than sodium (read the label). &nbsp;Flavour with pure 100% juice, lemon or Angostura bitters.&nbsp;</p>\r\n\r\n<p>Tap water: Always filter to remove chlorine and toxic metals such as copper, lead and aluminium.&nbsp;</p>\r\n\r\n<p>Herbal teas: These can be very healthy.&nbsp;</p>\r\n\r\n<p>Coffee substitutes: These are usually are caffeine-free. &nbsp;Decaffeinated coffee: Steam decaffeinated coffees are preferred. &nbsp;Coffee and Tea: These are probably OK if less than 3 cups/day.&nbsp;</p>\r\n\r\n<p>Alcohol: Wines and liquors are more suitable than beer (Max.Limit: 3 glasses/day for men or 2 glasses/day for women).&nbsp;</p>\r\n\r\n<p><br />\r\nLIMITED INTAKE:</p>\r\n\r\n<p>The intake of these foods should be minimised.&nbsp;</p>\r\n\r\n<p>Animal fats: Remove visible fat from meat and poultry before cooking, or buy low-fat or fat-trimmed meats.</p>\r\n\r\n<p>Milk: This has a high animal fat content. Skim milk is preferable. &nbsp;Cultured low-fat milk products such as yoghurt and soft cheeses are best and are good protein sources (cottage and ricotta). &nbsp; NOTE: Many people do not thrive on dairy foods.&nbsp;</p>\r\n\r\n<p>Margarine: This contains trans-fatty acids and should be avoided. &nbsp;Pure butter blended with olive or canola oil is best.&nbsp;</p>\r\n\r\n<p>Sugars: Refined and simple sugars are best minimised. Use these in small amounts only. Sugars are found in table sugar, jams, cakes biscuits, icecream, sweets, chocolate and breakfast cereals. &nbsp;Honey, maple-syrup, rice-syrup are palm-sugar are preferable.</p>\r\n\r\n<p>Artificial sweeteners may be OK but may cause reactions in some people if their intake is high. Long-term effects of these are unknown.</p>\r\n\r\n<p>Processed foods: These are any foods in a tin or packet. Usually they contain preservatives, colouring agents and other synthetic chemicals. &nbsp;As a general rule, AVOID these food products. &nbsp;Refined flour products (white flour, cakes, biscuits etc..) are best kept to a minimum. &nbsp;Use wholegrain products instead.&nbsp;</p>\r\n\r\n<p><br />\r\nIf you do not thrive on this diet, consult your health practitioner to check for digestive problems and food sensitivity reactions.</p>\r\n', '3', '0', '3', '2014-07-10 07:32:28', '2014-07-10 07:32:28', '1');
INSERT INTO `nutritional_guides` VALUES ('15', 'Wheatfree Meals', '<p>WHEATFREE MEALS<br />\r\nUSE ONLY UNDER THE GUIDANCE OF A HEALTH PRACTITIONER</p>\r\n\r\n<p>ALTERNATIVE MEALS FOR THE WHEAT INTOLERANT</p>\r\n\r\n<p>BREAKFAST:<br />\r\nOption 1:<br />\r\nBrown Rice - store pre-cooked rice and chicken in fridge.&nbsp;<br />\r\nChicken - heat rice/chicken in pan with olive oil.&nbsp;<br />\r\nEggs - beat eggs and fold into rice/chicken mix.&nbsp;<br />\r\nBubble and Squeak - Mash left-over vegetables together and heat in pan with olive oil.&nbsp;</p>\r\n\r\n<p>Option 2:&nbsp;<br />\r\nFish -grilled Or fried.&nbsp;<br />\r\nBubble and Squeak - mix with mashed/grated potato and fry.&nbsp;<br />\r\nTomato Saute - saute onions with mushrooms and zucchini in olive oil and serve over fish/bubble-squeak.&nbsp;<br />\r\nA small amount of fruit may be eaten after breakfast.&nbsp;</p>\r\n\r\n<p>LUNCH:<br />\r\nSeafood or Poultry (tinned or fresh) is preferred.&nbsp;<br />\r\nSalad - use a wide variety of salad vegetables.&nbsp;<br />\r\nSalad dressings - olive oil mixed with vinegar and herbs.&nbsp;<br />\r\nPLUS Rice, beans &nbsp;lentils &nbsp;splitpeas or chickpeas. These may be added to the salad or eaten in a thick soup.&nbsp;<br />\r\nA small amount of fruit may be eaten after lunch.&nbsp;</p>\r\n\r\n<p>DINNER:<br />\r\nProtein (3-4 oz - Seafood, poultry, lean meat/liver(1 per week) OR beans and pulses (6-8oz) &nbsp;<br />\r\nPLUS vegetables (steamed or stir-fried):&nbsp;</p>\r\n\r\n<p>Group 1:&nbsp;<br />\r\nChoose 4 of these: &nbsp;Cauliflower, broccoli, cabbage, greenbeans, peas, zucchini, buttonsquash, choko, spinach, celery, onions, shallots.&nbsp;</p>\r\n\r\n<p>Group 2:&nbsp;<br />\r\nChoose 2 of these: &nbsp;Pumpkin, yellow sweet potato, carrot, turnip, parsnip, beetroot, tomato, capsicum, eggplant, tomato, capsicum, eggplant, potato.</p>\r\n', '3', '0', '3', '2014-07-10 07:33:04', '2014-07-10 07:33:04', '1');

-- ----------------------------
-- Table structure for nutritional_guide_types
-- ----------------------------
DROP TABLE IF EXISTS `nutritional_guide_types`;
CREATE TABLE `nutritional_guide_types` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nutritional_guide_types
-- ----------------------------
INSERT INTO `nutritional_guide_types` VALUES ('1', '3', 'Symptom Guides', '2014-07-09 10:50:19', '2014-07-09 10:50:19', '1');
INSERT INTO `nutritional_guide_types` VALUES ('2', '3', 'Functional Guides', '2014-07-09 10:50:36', '2014-07-09 10:50:36', '1');
INSERT INTO `nutritional_guide_types` VALUES ('3', '3', 'Dietary Advice', '2014-07-09 10:50:48', '2014-07-09 10:50:48', '1');
INSERT INTO `nutritional_guide_types` VALUES ('4', '3', 'Functional', '2014-08-19 08:14:14', '2014-08-19 08:14:14', '1');
INSERT INTO `nutritional_guide_types` VALUES ('5', '3', 'Nutrient', '2014-08-19 08:14:31', '2014-08-19 08:14:31', '1');
INSERT INTO `nutritional_guide_types` VALUES ('6', '3', 'Neurotransmitter', '2014-08-19 08:16:25', '2014-08-19 08:16:25', '1');

-- ----------------------------
-- Table structure for page_access_flags
-- ----------------------------
DROP TABLE IF EXISTS `page_access_flags`;
CREATE TABLE `page_access_flags` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(50) DEFAULT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of page_access_flags
-- ----------------------------
INSERT INTO `page_access_flags` VALUES ('1', 'acl_management', 'users', 'dashboard', '3', '2', '2014-08-20 05:22:42', '2014-08-20 05:22:42', '1');
INSERT INTO `page_access_flags` VALUES ('2', 'acl_management', 'users', 'dashboard', '3', '2', '2014-08-20 05:27:35', '2014-08-20 05:27:35', '1');
INSERT INTO `page_access_flags` VALUES ('3', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 03:47:49', '2014-08-28 03:47:49', '1');
INSERT INTO `page_access_flags` VALUES ('4', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 03:48:55', '2014-08-28 03:48:55', '1');
INSERT INTO `page_access_flags` VALUES ('5', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 03:49:23', '2014-08-28 03:49:23', '1');
INSERT INTO `page_access_flags` VALUES ('6', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 03:49:48', '2014-08-28 03:49:48', '1');
INSERT INTO `page_access_flags` VALUES ('7', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 04:14:08', '2014-08-28 04:14:08', '1');
INSERT INTO `page_access_flags` VALUES ('8', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 04:21:21', '2014-08-28 04:21:21', '1');
INSERT INTO `page_access_flags` VALUES ('9', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 04:33:03', '2014-08-28 04:33:03', '1');
INSERT INTO `page_access_flags` VALUES ('10', 'acl_management', 'users', 'logout', '21', '3', '2014-08-28 04:33:37', '2014-08-28 04:33:37', '1');
INSERT INTO `page_access_flags` VALUES ('11', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 04:33:47', '2014-08-28 04:33:47', '1');
INSERT INTO `page_access_flags` VALUES ('12', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 04:34:08', '2014-08-28 04:34:08', '1');
INSERT INTO `page_access_flags` VALUES ('13', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 04:38:26', '2014-08-28 04:38:26', '1');
INSERT INTO `page_access_flags` VALUES ('14', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 04:41:20', '2014-08-28 04:41:20', '1');
INSERT INTO `page_access_flags` VALUES ('15', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 04:49:43', '2014-08-28 04:49:43', '1');
INSERT INTO `page_access_flags` VALUES ('16', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 04:49:43', '2014-08-28 04:49:43', '1');
INSERT INTO `page_access_flags` VALUES ('17', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 04:49:53', '2014-08-28 04:49:53', '1');
INSERT INTO `page_access_flags` VALUES ('18', 'acl_management', 'users', 'edit_profile', '21', '3', '2014-08-28 04:50:10', '2014-08-28 04:50:10', '1');
INSERT INTO `page_access_flags` VALUES ('19', 'acl_management', 'users', 'logout', '21', '3', '2014-08-28 05:02:00', '2014-08-28 05:02:00', '1');
INSERT INTO `page_access_flags` VALUES ('20', 'acl_management', 'users', 'dashboard', '49', '3', '2014-08-28 06:08:06', '2014-08-28 06:08:06', '1');
INSERT INTO `page_access_flags` VALUES ('21', null, 'questions', 'nutrient_check', '49', '3', '2014-08-28 06:08:16', '2014-08-28 06:08:16', '1');
INSERT INTO `page_access_flags` VALUES ('22', null, 'performed_checks', 'performed_checks', '49', '3', '2014-08-28 06:09:19', '2014-08-28 06:09:19', '1');
INSERT INTO `page_access_flags` VALUES ('23', null, 'performed_checks', 'performed_checks', '49', '3', '2014-08-28 06:10:45', '2014-08-28 06:10:45', '1');
INSERT INTO `page_access_flags` VALUES ('24', 'acl_management', 'users', 'dashboard', '49', '3', '2014-08-28 06:18:57', '2014-08-28 06:18:57', '1');
INSERT INTO `page_access_flags` VALUES ('25', null, 'questions', 'nutrient_check', '49', '3', '2014-08-28 06:19:06', '2014-08-28 06:19:06', '1');
INSERT INTO `page_access_flags` VALUES ('26', null, 'questions', 'nutrient_check', '49', '3', '2014-08-28 06:23:20', '2014-08-28 06:23:20', '1');
INSERT INTO `page_access_flags` VALUES ('27', 'acl_management', 'users', 'logout', '49', '3', '2014-08-28 06:24:40', '2014-08-28 06:24:40', '1');
INSERT INTO `page_access_flags` VALUES ('28', 'acl_management', 'users', 'dashboard', '49', '3', '2014-08-28 07:06:52', '2014-08-28 07:06:52', '1');
INSERT INTO `page_access_flags` VALUES ('29', null, 'questions', 'nutrient_check', '49', '3', '2014-08-28 07:06:58', '2014-08-28 07:06:58', '1');
INSERT INTO `page_access_flags` VALUES ('30', null, 'questions', 'nutrient_check', '49', '3', '2014-08-28 07:07:12', '2014-08-28 07:07:12', '1');
INSERT INTO `page_access_flags` VALUES ('31', 'acl_management', 'users', 'logout', '49', '3', '2014-08-28 07:07:19', '2014-08-28 07:07:19', '1');
INSERT INTO `page_access_flags` VALUES ('32', 'acl_management', 'users', 'logout', '49', '3', '2014-08-28 07:18:54', '2014-08-28 07:18:54', '1');
INSERT INTO `page_access_flags` VALUES ('33', 'acl_management', 'users', 'dashboard', '49', '3', '2014-08-28 07:32:08', '2014-08-28 07:32:08', '1');
INSERT INTO `page_access_flags` VALUES ('34', null, 'questions', 'nutrient_check', '49', '3', '2014-08-28 07:32:18', '2014-08-28 07:32:18', '1');
INSERT INTO `page_access_flags` VALUES ('35', 'acl_management', 'users', 'logout', '49', '3', '2014-08-28 07:32:32', '2014-08-28 07:32:32', '1');
INSERT INTO `page_access_flags` VALUES ('36', 'acl_management', 'users', 'dashboard', '50', '3', '2014-08-28 07:39:34', '2014-08-28 07:39:34', '1');
INSERT INTO `page_access_flags` VALUES ('37', null, 'questions', 'nutrient_check', '50', '3', '2014-08-28 07:39:45', '2014-08-28 07:39:45', '1');
INSERT INTO `page_access_flags` VALUES ('38', null, 'questions', 'nutrient_check', '50', '3', '2014-08-28 07:41:36', '2014-08-28 07:41:36', '1');
INSERT INTO `page_access_flags` VALUES ('39', 'acl_management', 'users', 'logout', '50', '3', '2014-08-28 07:42:10', '2014-08-28 07:42:10', '1');
INSERT INTO `page_access_flags` VALUES ('40', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 07:42:20', '2014-08-28 07:42:20', '1');
INSERT INTO `page_access_flags` VALUES ('41', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 07:42:27', '2014-08-28 07:42:27', '1');
INSERT INTO `page_access_flags` VALUES ('42', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 07:42:27', '2014-08-28 07:42:27', '1');
INSERT INTO `page_access_flags` VALUES ('43', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 07:43:05', '2014-08-28 07:43:05', '1');
INSERT INTO `page_access_flags` VALUES ('44', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 07:43:05', '2014-08-28 07:43:05', '1');
INSERT INTO `page_access_flags` VALUES ('45', 'acl_management', 'users', 'edit_profile', '21', '3', '2014-08-28 07:43:17', '2014-08-28 07:43:17', '1');
INSERT INTO `page_access_flags` VALUES ('46', 'acl_management', 'users', 'logout', '21', '3', '2014-08-28 07:43:20', '2014-08-28 07:43:20', '1');
INSERT INTO `page_access_flags` VALUES ('47', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 07:44:38', '2014-08-28 07:44:38', '1');
INSERT INTO `page_access_flags` VALUES ('48', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 07:44:53', '2014-08-28 07:44:53', '1');
INSERT INTO `page_access_flags` VALUES ('49', null, 'questions', 'nutrient_check', '21', '3', '2014-08-28 07:47:49', '2014-08-28 07:47:49', '1');
INSERT INTO `page_access_flags` VALUES ('50', 'acl_management', 'users', 'dashboard', '21', '3', '2014-08-28 07:47:50', '2014-08-28 07:47:50', '1');
INSERT INTO `page_access_flags` VALUES ('51', null, 'performed_checks', 'performed_checks', '21', '3', '2014-08-28 07:47:56', '2014-08-28 07:47:56', '1');
INSERT INTO `page_access_flags` VALUES ('52', 'acl_management', 'users', 'logout', '21', '3', '2014-08-28 07:48:48', '2014-08-28 07:48:48', '1');
INSERT INTO `page_access_flags` VALUES ('53', 'acl_management', 'users', 'dashboard', '50', '3', '2014-08-28 07:51:51', '2014-08-28 07:51:51', '1');
INSERT INTO `page_access_flags` VALUES ('54', null, 'questions', 'nutrient_check', '50', '3', '2014-08-28 07:51:57', '2014-08-28 07:51:57', '1');
INSERT INTO `page_access_flags` VALUES ('55', null, 'questions', 'nutrient_check', '50', '3', '2014-08-28 07:52:07', '2014-08-28 07:52:07', '1');
INSERT INTO `page_access_flags` VALUES ('56', null, 'questions', 'nutrient_check', '50', '3', '2014-08-28 07:52:24', '2014-08-28 07:52:24', '1');
INSERT INTO `page_access_flags` VALUES ('57', 'acl_management', 'users', 'dashboard', '50', '3', '2014-08-28 07:52:25', '2014-08-28 07:52:25', '1');
INSERT INTO `page_access_flags` VALUES ('58', null, 'performed_checks', 'performed_checks', '50', '3', '2014-08-28 07:52:33', '2014-08-28 07:52:33', '1');
INSERT INTO `page_access_flags` VALUES ('59', 'acl_management', 'users', 'logout', '50', '3', '2014-08-28 07:52:40', '2014-08-28 07:52:40', '1');
INSERT INTO `page_access_flags` VALUES ('60', 'acl_management', 'users', 'dashboard', '52', '3', '2014-08-28 07:58:09', '2014-08-28 07:58:09', '1');
INSERT INTO `page_access_flags` VALUES ('61', null, 'questions', 'nutrient_check', '52', '3', '2014-08-28 07:58:33', '2014-08-28 07:58:33', '1');
INSERT INTO `page_access_flags` VALUES ('62', null, 'questions', 'nutrient_check', '52', '3', '2014-08-28 07:58:40', '2014-08-28 07:58:40', '1');
INSERT INTO `page_access_flags` VALUES ('63', null, 'performed_checks', 'performed_checks', '52', '3', '2014-08-28 07:59:24', '2014-08-28 07:59:24', '1');
INSERT INTO `page_access_flags` VALUES ('64', null, 'questions', 'nutrient_check', '52', '3', '2014-08-28 07:59:38', '2014-08-28 07:59:38', '1');
INSERT INTO `page_access_flags` VALUES ('65', 'acl_management', 'users', 'dashboard', '52', '3', '2014-08-28 07:59:39', '2014-08-28 07:59:39', '1');
INSERT INTO `page_access_flags` VALUES ('66', null, 'performed_checks', 'performed_checks', '52', '3', '2014-08-28 07:59:56', '2014-08-28 07:59:56', '1');
INSERT INTO `page_access_flags` VALUES ('67', null, 'questions', 'nutrient_check', '52', '3', '2014-08-28 08:01:11', '2014-08-28 08:01:11', '1');
INSERT INTO `page_access_flags` VALUES ('68', 'acl_management', 'users', 'dashboard', '52', '3', '2014-08-28 08:01:11', '2014-08-28 08:01:11', '1');
INSERT INTO `page_access_flags` VALUES ('69', 'acl_management', 'users', 'logout', '52', '3', '2014-08-28 08:01:28', '2014-08-28 08:01:28', '1');
INSERT INTO `page_access_flags` VALUES ('70', 'acl_management', 'users', 'dashboard', '52', '3', '2014-08-28 08:04:38', '2014-08-28 08:04:38', '1');
INSERT INTO `page_access_flags` VALUES ('71', null, 'questions', 'nutrient_check', '52', '3', '2014-08-28 08:04:51', '2014-08-28 08:04:51', '1');
INSERT INTO `page_access_flags` VALUES ('72', null, 'questions', 'nutrient_check', '52', '3', '2014-08-28 08:04:59', '2014-08-28 08:04:59', '1');
INSERT INTO `page_access_flags` VALUES ('73', null, 'questions', 'nutrient_check', '52', '3', '2014-08-28 08:06:29', '2014-08-28 08:06:29', '1');
INSERT INTO `page_access_flags` VALUES ('74', 'acl_management', 'users', 'dashboard', '52', '3', '2014-08-28 08:06:30', '2014-08-28 08:06:30', '1');
INSERT INTO `page_access_flags` VALUES ('75', null, 'performed_checks', 'performed_checks', '52', '3', '2014-08-28 08:06:44', '2014-08-28 08:06:44', '1');
INSERT INTO `page_access_flags` VALUES ('76', 'acl_management', 'users', 'logout', '52', '3', '2014-08-28 08:06:46', '2014-08-28 08:06:46', '1');
INSERT INTO `page_access_flags` VALUES ('77', 'acl_management', 'users', 'dashboard', '54', '3', '2014-08-28 08:28:49', '2014-08-28 08:28:49', '1');
INSERT INTO `page_access_flags` VALUES ('78', null, 'questions', 'nutrient_check', '54', '3', '2014-08-28 08:29:03', '2014-08-28 08:29:03', '1');
INSERT INTO `page_access_flags` VALUES ('79', null, 'performed_checks', 'performed_checks', '54', '3', '2014-08-28 08:29:23', '2014-08-28 08:29:23', '1');
INSERT INTO `page_access_flags` VALUES ('80', null, 'questions', 'nutrient_check', '54', '3', '2014-08-28 08:33:26', '2014-08-28 08:33:26', '1');
INSERT INTO `page_access_flags` VALUES ('81', null, 'questions', 'nutrient_check', '54', '3', '2014-08-28 08:33:39', '2014-08-28 08:33:39', '1');
INSERT INTO `page_access_flags` VALUES ('82', null, 'questions', 'nutrient_check', '54', '3', '2014-08-28 08:33:45', '2014-08-28 08:33:45', '1');
INSERT INTO `page_access_flags` VALUES ('83', 'acl_management', 'users', 'dashboard', '54', '3', '2014-08-28 08:33:45', '2014-08-28 08:33:45', '1');
INSERT INTO `page_access_flags` VALUES ('84', 'acl_management', 'users', 'logout', '54', '3', '2014-08-28 08:33:53', '2014-08-28 08:33:53', '1');
INSERT INTO `page_access_flags` VALUES ('85', null, 'qgroups', 'load_questions', '51', '3', '2014-08-29 01:03:23', '2014-08-29 01:03:23', '1');
INSERT INTO `page_access_flags` VALUES ('86', null, 'css', 'iframe-layout.css', '51', '3', '2014-08-29 01:03:25', '2014-08-29 01:03:25', '1');
INSERT INTO `page_access_flags` VALUES ('87', 'acl_management', 'users', 'logout', '51', '3', '2014-08-29 01:03:34', '2014-08-29 01:03:34', '1');

-- ----------------------------
-- Table structure for performed_checks
-- ----------------------------
DROP TABLE IF EXISTS `performed_checks`;
CREATE TABLE `performed_checks` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `isComplete` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `url` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of performed_checks
-- ----------------------------
INSERT INTO `performed_checks` VALUES ('1', '2014-08-28', '1', '50', '2014-08-28 07:39:45', '2014-08-28 07:39:45', '1', null);
INSERT INTO `performed_checks` VALUES ('2', '2014-08-28', '1', '21', '2014-08-28 07:44:53', '2014-08-28 07:44:53', '1', null);
INSERT INTO `performed_checks` VALUES ('3', '2014-08-28', '1', '52', '2014-08-28 07:58:33', '2014-08-28 07:58:33', '1', null);
INSERT INTO `performed_checks` VALUES ('4', '2014-08-28', '1', '52', '2014-08-28 08:04:51', '2014-08-28 08:04:51', '1', null);
INSERT INTO `performed_checks` VALUES ('5', '2014-08-28', '0', '21', '2014-08-28 08:09:14', '2014-08-28 08:09:14', '1', null);
INSERT INTO `performed_checks` VALUES ('6', '2014-08-28', '1', '54', '2014-08-28 08:21:40', '2014-08-28 08:21:40', '1', null);
INSERT INTO `performed_checks` VALUES ('7', '2014-08-29', '0', '1', '2014-08-29 05:55:50', '2014-08-29 05:55:50', '1', null);
INSERT INTO `performed_checks` VALUES ('8', '2014-08-29', '1', '16', '2014-08-29 06:47:00', '2014-08-29 06:47:00', '1', null);
INSERT INTO `performed_checks` VALUES ('9', '2014-09-01', '1', '16', '2014-09-01 02:34:36', '2014-09-01 02:34:36', '1', null);
INSERT INTO `performed_checks` VALUES ('10', '2014-09-01', '1', '16', '2014-09-01 02:47:55', '2014-09-01 02:47:55', '1', null);
INSERT INTO `performed_checks` VALUES ('11', '2014-09-01', '1', '16', '2014-09-01 02:53:06', '2014-09-01 02:53:06', '1', null);
INSERT INTO `performed_checks` VALUES ('12', '2014-09-01', '1', '16', '2014-09-01 02:53:54', '2014-09-01 02:53:54', '1', null);
INSERT INTO `performed_checks` VALUES ('13', '2014-09-01', '1', '16', '2014-09-01 02:57:33', '2014-09-01 02:57:33', '1', null);
INSERT INTO `performed_checks` VALUES ('14', '2014-09-01', '1', '16', '2014-09-01 03:13:07', '2014-09-01 03:13:07', '1', null);
INSERT INTO `performed_checks` VALUES ('15', '2014-09-01', '1', '16', '2014-09-01 03:24:29', '2014-09-01 03:24:29', '1', null);
INSERT INTO `performed_checks` VALUES ('16', '2014-09-01', '1', '16', '2014-09-01 03:24:40', '2014-09-01 03:24:40', '1', null);
INSERT INTO `performed_checks` VALUES ('17', '2014-09-01', '1', '16', '2014-09-01 03:25:02', '2014-09-01 03:25:02', '1', null);
INSERT INTO `performed_checks` VALUES ('18', '2014-09-01', '1', '16', '2014-09-01 03:25:53', '2014-09-01 03:25:53', '1', null);
INSERT INTO `performed_checks` VALUES ('19', '2014-09-01', '0', '16', '2014-09-01 05:29:39', '2014-09-01 05:29:39', '1', null);
INSERT INTO `performed_checks` VALUES ('20', '2014-09-01', '0', '17', '2014-09-01 08:34:30', '2014-09-01 08:34:30', '1', null);
INSERT INTO `performed_checks` VALUES ('21', '2014-09-03', '0', '1', '2014-09-03 01:33:33', '2014-09-03 01:33:33', '1', 'http://nutricheck.crazykiddo.net/questions/nutrient_check');
INSERT INTO `performed_checks` VALUES ('22', '2014-09-03', '0', '1', '2014-09-03 01:34:27', '2014-09-03 01:34:27', '1', 'http://nutricheck.crazykiddo.net/questions/nutrient_check');
INSERT INTO `performed_checks` VALUES ('23', '2014-09-03', '0', '1', '2014-09-03 01:37:23', '2014-09-03 01:37:23', '1', 'http://nutricheck.crazykiddo.net/questions/nutrient_check');
INSERT INTO `performed_checks` VALUES ('24', '2014-09-03', '0', '1', '2014-09-03 01:37:37', '2014-09-03 01:37:37', '1', 'http://nutricheck.crazykiddo.net/questions/nutrient_check');
INSERT INTO `performed_checks` VALUES ('25', '2014-09-03', '0', '1', '2014-09-03 01:37:44', '2014-09-03 01:37:44', '1', 'http://nutricheck.crazykiddo.net/questions/nutrient_check');
INSERT INTO `performed_checks` VALUES ('26', '2014-09-03', '0', '1', '2014-09-03 01:38:34', '2014-09-03 01:38:34', '1', 'http://nutricheck.crazykiddo.net/questions/nutrient_check');

-- ----------------------------
-- Table structure for prescriptions
-- ----------------------------
DROP TABLE IF EXISTS `prescriptions`;
CREATE TABLE `prescriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `factor_id` bigint(20) DEFAULT NULL,
  `functional_disturbance` text,
  `1_20` int(10) DEFAULT '0',
  `21_40` int(10) DEFAULT '0',
  `41_60` int(10) DEFAULT '0',
  `61_80` int(10) DEFAULT '0',
  `81_100` int(10) DEFAULT '0',
  `maximum_dosage` int(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prescriptions
-- ----------------------------
INSERT INTO `prescriptions` VALUES ('1', '1', 'Vit C ~ mg', null, null, '500', '750', '1000', null, '2014-05-21 03:21:50', '2014-07-22 05:05:44', '1');
INSERT INTO `prescriptions` VALUES ('2', '1', 'Niacin ~ mg', null, null, '5', '10', '15', null, '2014-05-21 03:22:10', '2014-05-21 08:23:41', '1');
INSERT INTO `prescriptions` VALUES ('3', '1', 'Mixed tocopherols ~ IU', '100', '150', '200', '250', '300', null, '2014-05-21 03:22:49', '2014-05-21 08:23:37', '1');
INSERT INTO `prescriptions` VALUES ('4', '1', 'omega-3-EFAs ~ mg', null, null, '500', '1000', '1500', null, '2014-05-21 03:25:11', '2014-05-21 08:23:32', '1');
INSERT INTO `prescriptions` VALUES ('5', '1', 'Quercetin ~ mg', null, null, '250', '500', '1000', null, '2014-05-21 03:25:50', '2014-05-21 08:23:27', '1');
INSERT INTO `prescriptions` VALUES ('6', '1', 'Bromelain ~ mg', null, null, '200', '400', '600', null, '2014-05-21 03:27:55', '2014-05-21 08:23:22', '1');
INSERT INTO `prescriptions` VALUES ('7', '2', 'Vit C ~ mg', '100', '250', '500', '750', '1000', null, '2014-05-21 03:28:53', '2014-05-21 08:27:56', '1');
INSERT INTO `prescriptions` VALUES ('8', '2', 'Pyridoxal-5-phosphate ~ mg', null, null, '5', '10', '15', null, '2014-05-21 03:30:22', '2014-05-21 08:27:51', '1');
INSERT INTO `prescriptions` VALUES ('9', '2', 'Riboflavin-5-phosphate ~ mg', null, null, '4', '6', '8', null, '2014-05-21 03:30:51', '2014-05-21 08:27:46', '1');
INSERT INTO `prescriptions` VALUES ('10', '2', 'Zinc ~ mg', null, null, '5', '10', '15', null, '2014-05-21 03:32:31', '2014-05-21 08:27:41', '1');
INSERT INTO `prescriptions` VALUES ('11', '2', 'Chromium ~ ugm', '100', '100', '200', '300', '400', null, '2014-05-21 03:33:04', '2014-05-21 08:27:35', '1');
INSERT INTO `prescriptions` VALUES ('12', '2', 'Vanadium ~ ugm', null, null, '25', '50', '75', null, '2014-05-21 03:33:21', '2014-05-21 08:27:30', '1');
INSERT INTO `prescriptions` VALUES ('13', '2', 'Boron* ~ mg', '1', '1', '2', '2', '3', null, '2014-05-21 03:33:42', '2014-05-21 08:27:25', '1');
INSERT INTO `prescriptions` VALUES ('14', '2', 'Molybdenum* ~ mg', '1', '2', '3', '4', '5', null, '2014-05-21 03:34:08', '2014-05-21 08:27:20', '1');
INSERT INTO `prescriptions` VALUES ('15', '2', 'Manganese ~ mg', '1', '2', '3', '4', '5', null, '2014-05-21 03:34:38', '2014-05-21 08:27:14', '1');
INSERT INTO `prescriptions` VALUES ('16', '2', 'Iodine* ~ ugm', '25', '50', '75', '100', '125', null, '2014-05-21 03:35:20', '2014-05-21 08:27:09', '1');
INSERT INTO `prescriptions` VALUES ('17', '2', 'Biotin ~ mg', '100', '150', '200', '250', '300', null, '2014-05-21 03:35:42', '2014-05-21 08:27:05', '1');
INSERT INTO `prescriptions` VALUES ('18', '2', 'omega-3-EFAs ~ mg', '250', '500', '750', '1000', '1500', null, '2014-05-21 03:38:53', '2014-05-21 08:27:00', '1');
INSERT INTO `prescriptions` VALUES ('19', '3', 'Betaine HCl ~ mg', null, '500', '500', '750', '1000', null, '2014-05-21 03:43:44', '2014-05-21 08:28:43', '1');
INSERT INTO `prescriptions` VALUES ('20', '3', 'Pepsin ~ mg', null, '10', '20', '30', '40', null, '2014-05-21 03:44:12', '2014-05-21 08:28:48', '1');
INSERT INTO `prescriptions` VALUES ('21', '3', 'Pancreatic enzymes', null, null, '500', '750', '1000', null, '2014-05-21 03:44:47', '2014-05-21 08:28:52', '1');
INSERT INTO `prescriptions` VALUES ('22', '4', 'Probiotic (multibacterial) cap', null, null, '2', '2', '2', null, '2014-05-21 03:45:27', '2014-05-21 08:44:02', '1');
INSERT INTO `prescriptions` VALUES ('23', '4', 'Oregon Grape root extract ~ mg', null, null, '200', '400', '400', null, '2014-05-21 03:56:00', '2014-05-21 08:44:07', '1');
INSERT INTO `prescriptions` VALUES ('24', '4', 'Grapefruit seed extract ~ mg', null, null, '75', '150', '150', null, '2014-05-21 03:56:58', '2014-05-21 08:46:52', '1');
INSERT INTO `prescriptions` VALUES ('25', '4', 'Undecenoic acid ~ mg', null, null, '50', '100', '150', null, '2014-05-21 03:57:14', '2014-05-21 08:46:57', '1');
INSERT INTO `prescriptions` VALUES ('26', '5', 'Vitamin A* (IU)', '750', '1000', '1250', '1500', '2000', '2500', '2014-05-21 03:57:50', '2014-05-21 08:48:59', '1');
INSERT INTO `prescriptions` VALUES ('27', null, 'B-Carotene* (IU)\r\n', '750', '1000', '1250', '1500', '2000', '2500', '2014-05-21 03:58:11', '2014-05-21 03:58:11', '1');
INSERT INTO `prescriptions` VALUES ('28', '6', 'Thiamin (B1) ~ mg', '5', '10', '15', '20', '25', '200', '2014-05-21 03:58:43', '2014-05-21 08:49:59', '1');
INSERT INTO `prescriptions` VALUES ('29', '7', 'Riboflavin-5-phosphate (B2) ~ mg', '5', '10', '15', '20', '25', '400', '2014-05-21 03:59:06', '2014-05-21 08:50:05', '1');
INSERT INTO `prescriptions` VALUES ('30', '8', 'Niacin (B3) ~ mg', '5', '10', '15', '20', '25', '100', '2014-05-21 03:59:37', '2014-05-21 08:50:10', '1');
INSERT INTO `prescriptions` VALUES ('31', '8', 'Niacinamide (B3) ~ mg', '10', '15', '30', '50', '75', '200', '2014-05-21 04:01:25', '2014-05-21 08:50:46', '1');
INSERT INTO `prescriptions` VALUES ('32', '10', 'Pyridoxal-5-phosphate (B6) ~ mg', '10', '20', '30', '40', '50', '50', '2014-05-21 04:01:50', '2014-05-21 08:50:25', '1');
INSERT INTO `prescriptions` VALUES ('33', '22', 'Folic Acid ~ ugm', '400', '600', '700', '800', '1000', '5000', '2014-05-21 04:02:12', '2014-05-22 05:16:41', '1');
INSERT INTO `prescriptions` VALUES ('34', '11', 'Vitamin B12 ~ ugm', '50', '75', '100', '125', '150', '500', '2014-05-21 04:02:34', '2014-05-21 08:51:11', '1');
INSERT INTO `prescriptions` VALUES ('35', '9', 'Pantothenic Acid (B5) ~ mg', '25', '50', '75', '100', '150', '1000', '2014-05-21 04:02:55', '2014-05-21 08:51:16', '1');
INSERT INTO `prescriptions` VALUES ('36', '12', 'Vitamin C (mg)', '100', '150', '300', '500', '1000', '4000', '2014-05-21 04:12:47', '2014-05-21 08:53:01', '1');
INSERT INTO `prescriptions` VALUES ('37', '13', 'Vitamin D* (IU)', '400', '600', '800', '1000', '2000', '2000', '2014-05-21 04:13:08', '2014-05-21 08:53:07', '1');
INSERT INTO `prescriptions` VALUES ('38', '14', 'Vitamin E mixed tocopherols (IU)', '100', '150', '250', '500', '800', '1000', '2014-05-21 04:13:53', '2014-05-21 08:53:15', '1');
INSERT INTO `prescriptions` VALUES ('39', '15', 'Vitamin K-2* ~ ugm', '10', '25', '50', '75', '100', '200', '2014-05-21 04:17:43', '2014-05-21 08:53:22', '1');
INSERT INTO `prescriptions` VALUES ('40', '17', 'Calcium ~ mg', '500', '750', '1000', '1250', '1500', '1500', '2014-05-21 04:18:36', '2014-05-21 08:53:28', '1');
INSERT INTO `prescriptions` VALUES ('41', '16', 'Magnesium ~ mg', '200', '300', '400', '500', '600', '800', '2014-05-21 04:20:30', '2014-05-21 08:55:54', '1');
INSERT INTO `prescriptions` VALUES ('42', '18', 'Zinc* ~ mg', '5', '10', '15', '20', '30', '45', '2014-05-21 04:21:07', '2014-05-21 08:56:03', '1');
INSERT INTO `prescriptions` VALUES ('43', '20', 'Iron ~ mg', '5', '10', '15', '20', '30', '50', '2014-05-21 04:21:26', '2014-05-21 08:56:08', '1');
INSERT INTO `prescriptions` VALUES ('44', '21', 'EFA: omega-3-EFAs ~ mg', '500', '500', '1000', '1500', '2000', '3000', '2014-05-21 04:21:45', '2014-05-21 08:56:22', '1');
INSERT INTO `prescriptions` VALUES ('45', '23', 'L-Tyrosine ~ mg', null, null, '400', '600', '800', null, '2014-05-21 04:26:11', '2014-05-21 08:56:55', '1');
INSERT INTO `prescriptions` VALUES ('46', '23', 'Pyridoxal-5-phosphate (B6) ~ mg', null, null, '15', '30', '45', null, '2014-05-21 04:26:39', '2014-05-21 08:57:00', '1');
INSERT INTO `prescriptions` VALUES ('47', '23', 'Vitamin C (mg)', null, null, '100', '250', '500', null, '2014-05-21 04:27:00', '2014-05-21 08:57:05', '1');
INSERT INTO `prescriptions` VALUES ('48', '23', 'Zinc* ~ mg', null, null, '5', '10', '15', null, '2014-05-21 04:27:30', '2014-05-21 08:57:15', '1');
INSERT INTO `prescriptions` VALUES ('49', '23', 'Magnesium ~ mg', null, null, '200', '300', '400', null, '2014-05-21 04:27:51', '2014-05-21 08:57:22', '1');
INSERT INTO `prescriptions` VALUES ('50', '24', 'Hydroxytryptophan ~ mg', null, null, '50', '100', '150', null, '2014-05-21 04:28:21', '2014-05-21 08:58:42', '1');
INSERT INTO `prescriptions` VALUES ('51', '24', 'Pyridoxal-5-phosphate (B6) ~ mg', null, null, '15', '30', '45', null, '2014-05-21 04:28:43', '2014-05-21 08:58:36', '1');
INSERT INTO `prescriptions` VALUES ('52', '24', 'Vitamin C (mg)', null, null, '100', '250', '500', null, '2014-05-21 04:29:12', '2014-05-21 08:58:31', '1');
INSERT INTO `prescriptions` VALUES ('53', '24', 'Zinc* ~ mg', null, null, '5', '10', '15', null, '2014-05-21 04:29:34', '2014-05-21 08:58:27', '1');
INSERT INTO `prescriptions` VALUES ('54', '24', 'Magnesium ~ mg', null, null, '200', '300', '400', null, '2014-05-21 04:30:01', '2014-05-21 08:58:21', '1');
INSERT INTO `prescriptions` VALUES ('55', '25', 'D-Phenylalanine ~ mg', null, null, '400', '600', '800', null, '2014-05-21 04:52:51', '2014-05-21 09:01:34', '1');
INSERT INTO `prescriptions` VALUES ('56', '26', 'Choline ~ mg', '50', '75', '150', '300', '450', null, '2014-05-21 05:04:51', '2014-05-21 09:02:12', '1');
INSERT INTO `prescriptions` VALUES ('57', '26', 'Phospholipid complex ~ mg', null, null, '500', '1000', '1500', null, '2014-05-21 05:08:49', '2014-05-21 09:02:08', '1');
INSERT INTO `prescriptions` VALUES ('58', '26', 'Citicoline ~ mg', null, null, null, '750', '1500', null, '2014-05-21 05:10:00', '2014-05-21 09:02:03', '1');

-- ----------------------------
-- Table structure for qgroups
-- ----------------------------
DROP TABLE IF EXISTS `qgroups`;
CREATE TABLE `qgroups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of qgroups
-- ----------------------------
INSERT INTO `qgroups` VALUES ('1', 'Test1234', '3', '2014-05-14 09:33:20', '2014-05-20 05:36:47', '1');
INSERT INTO `qgroups` VALUES ('2', 'asdf asdf 1234', '3', '2014-05-15 11:22:23', '2014-05-19 03:57:06', '1');
INSERT INTO `qgroups` VALUES ('3', 'asdfasdfadsf', '3', '2014-05-15 11:28:27', '2014-05-20 06:58:52', '1');
INSERT INTO `qgroups` VALUES ('4', 'greg', null, '2014-05-27 06:55:52', '2014-05-27 06:55:52', '1');
INSERT INTO `qgroups` VALUES ('5', 'All Question Set', null, '2014-05-28 04:58:18', '2014-05-28 04:58:18', '1');
INSERT INTO `qgroups` VALUES ('6', 'Test per client', '3', '2014-06-10 10:58:07', '2014-06-10 10:58:07', '1');
INSERT INTO `qgroups` VALUES ('7', 'test widget 1', '20', '2014-07-23 21:41:48', '2014-07-23 21:41:48', '1');
INSERT INTO `qgroups` VALUES ('8', 'Test Widgets 2', '20', '2014-07-24 02:35:42', '2014-07-24 02:35:42', '1');

-- ----------------------------
-- Table structure for questions
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `question` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of questions
-- ----------------------------
INSERT INTO `questions` VALUES ('1', '1', 'Have you tried to lose weight by strict dieting within the last 2-3 years?', '2013-12-21 15:17:03', '2014-07-04 08:42:04', '1');
INSERT INTO `questions` VALUES ('2', '1', 'Have you notice that your hair is breaking or falling out more than before?', '2013-12-21 15:17:29', '2014-07-04 08:42:25', '1');
INSERT INTO `questions` VALUES ('3', '1', 'Has your eyesight at dusk or at night-time become poorer now than before?', '2013-12-21 15:18:35', '2014-07-04 08:42:41', '1');
INSERT INTO `questions` VALUES ('4', '1', 'Does the skin on the back of your arms feel thickened, scaly or rough?', '2013-12-21 15:19:10', '2014-07-04 08:42:51', '1');
INSERT INTO `questions` VALUES ('5', '1', 'Do you get frequent indigestion or heartburn?', '2013-12-21 15:19:33', '2014-07-04 08:44:47', '1');
INSERT INTO `questions` VALUES ('6', '1', 'Do you experience abdominal bloating or flatulence especially after eating?', '2013-12-21 15:22:02', '2014-07-04 08:45:01', '1');
INSERT INTO `questions` VALUES ('7', '1', 'Do you have bad breath or a bad taste in the mouth especially on wakening?', '2013-12-21 15:22:40', '2014-07-04 08:45:19', '1');
INSERT INTO `questions` VALUES ('8', '1', 'Do you get more than 1 flu-type  cold or cough per year?', '2013-12-21 15:22:59', '2014-07-04 08:45:37', '1');
INSERT INTO `questions` VALUES ('9', '1', 'Do you get recurrent or chronic sinus congestion or nasal catarrh?', '2013-12-21 15:23:59', '2014-07-04 08:46:13', '1');
INSERT INTO `questions` VALUES ('10', '1', 'Do your gums get sore or bleed on brushing your teeth?', '2013-12-21 15:24:44', '2014-07-04 08:46:41', '1');
INSERT INTO `questions` VALUES ('11', '1', 'Do you find that you you bruise easily?', '2013-12-21 15:25:17', '2013-12-21 15:25:17', '1');
INSERT INTO `questions` VALUES ('12', '1', 'Do you get excessive dental plaque and/or frequent dental decay?', '2013-12-21 15:25:54', '2014-07-04 08:47:12', '1');
INSERT INTO `questions` VALUES ('13', '1', 'Do your leg muscles feel sore or tender on standing?', '2013-12-21 15:27:04', '2014-07-04 08:47:49', '1');
INSERT INTO `questions` VALUES ('14', '1', 'Do you get a burning feeling in your tongue or lips?', '2013-12-21 15:27:23', '2013-12-21 15:27:23', '1');
INSERT INTO `questions` VALUES ('15', '1', 'Do you get palpitations, racing heartbeat or irregular heartbeat?', '2013-12-21 15:27:53', '2013-12-21 15:27:53', '1');
INSERT INTO `questions` VALUES ('16', '1', 'Do you notice numbness or tingling sensations in your hands or feet?', '2013-12-21 15:29:59', '2014-07-04 08:48:05', '1');
INSERT INTO `questions` VALUES ('17', '1', 'Is your tongue sensitive to hot drinks or sore?', '2013-12-21 15:30:32', '2013-12-21 15:30:32', '1');
INSERT INTO `questions` VALUES ('18', '1', 'Have you noticed irritation, soreness or even cracks in the corner of your mouth?', '2013-12-21 15:30:56', '2014-07-04 08:48:26', '1');
INSERT INTO `questions` VALUES ('19', '1', 'Do you eyes sometimes feel sore, burn or gritty ?', '2013-12-21 15:31:58', '2014-07-04 08:48:44', '1');
INSERT INTO `questions` VALUES ('20', '1', 'Are your eyes sensitive to bright lights?', '2013-12-21 15:32:24', '2014-07-04 08:48:57', '1');
INSERT INTO `questions` VALUES ('21', '1', 'Do you have a very oily skin or a tendency to get dandruff ?', '2013-12-23 01:47:35', '2014-07-04 08:50:13', '1');
INSERT INTO `questions` VALUES ('22', '1', 'Have you ever had a reddish discoloration or rash around your nose and ears?', '2013-12-23 01:50:45', '2014-07-04 08:50:10', '1');
INSERT INTO `questions` VALUES ('23', '1', 'Do you drink more than 2 glasses or alcohol per day average?', '2013-12-23 01:51:17', '2013-12-23 01:51:17', '1');
INSERT INTO `questions` VALUES ('24', '1', 'Do you have a tendency towards eczema or other skin rashes?', '2013-12-23 01:51:45', '2013-12-23 01:51:45', '1');
INSERT INTO `questions` VALUES ('25', '1', 'Do you get dizzy or lightheaded, particularly when you stand up quickly?', '2013-12-23 01:52:27', '2014-07-04 09:16:27', '1');
INSERT INTO `questions` VALUES ('26', '1', 'Do you get swollen feet or  your shoes are tight after prolonged standing or sitting?', '2013-12-23 01:58:07', '2014-07-04 09:22:16', '1');
INSERT INTO `questions` VALUES ('27', '1', 'Do you generally have cold fingers or toes,  especially at night?', '2013-12-23 02:19:53', '2014-07-04 08:50:45', '1');
INSERT INTO `questions` VALUES ('28', '1', 'Do your finger joints or toes feel stiff or sore on awakening?', '2013-12-23 02:22:13', '2013-12-23 02:22:13', '1');
INSERT INTO `questions` VALUES ('29', '1', 'Do you find you don\'t dream or only dream infrequently?', '2013-12-23 02:22:54', '2014-07-04 08:50:55', '1');
INSERT INTO `questions` VALUES ('30', '1', 'Do you find you cannot remember your dreams on wakening?', '2013-12-23 02:23:49', '2014-07-04 08:52:07', '1');
INSERT INTO `questions` VALUES ('31', '1', 'Do you get cravings for sweet or sugary foods?', '2013-12-23 02:36:16', '2014-07-04 08:51:12', '1');
INSERT INTO `questions` VALUES ('32', '1', 'Do you eat white bread, pasta, sugar or white rice almost daily?', '2013-12-23 02:39:28', '2013-12-23 02:39:28', '1');
INSERT INTO `questions` VALUES ('33', '1', 'Do you sunburn easily?', '2013-12-23 02:40:11', '2013-12-23 02:40:11', '1');
INSERT INTO `questions` VALUES ('34', '1', 'Do you react to Monosodium Glutamate - that is, do you react to chinese food?', '2013-12-23 02:40:46', '2013-12-23 02:40:46', '1');
INSERT INTO `questions` VALUES ('35', '1', 'Do you tend to be easily excited or irritated?', '2013-12-23 02:41:03', '2013-12-23 02:41:03', '1');
INSERT INTO `questions` VALUES ('36', '1', 'Do you have trouble getting to sleep or suffer from restless sleep?', '2013-12-23 02:42:30', '2013-12-23 02:42:30', '1');
INSERT INTO `questions` VALUES ('37', '1', 'Do you find that your ability to concentrate is impaired?', '2013-12-23 02:46:28', '2013-12-23 02:46:28', '1');
INSERT INTO `questions` VALUES ('38', '1', 'Do you find that making decisions is more difficult than before?', '2013-12-23 02:46:44', '2014-07-04 08:52:42', '1');
INSERT INTO `questions` VALUES ('39', '1', 'Do you often feel stressed or under strain?', '2013-12-23 02:47:04', '2013-12-23 02:47:04', '1');
INSERT INTO `questions` VALUES ('40', '1', 'Do you have a tendency to be moody or easily depressed?', '2013-12-23 02:47:56', '2013-12-23 02:47:56', '1');
INSERT INTO `questions` VALUES ('41', '1', 'Do you tend to experience episodic anxiety or panic attacks for no obvious reason?', '2013-12-23 02:48:29', '2014-07-04 08:53:04', '1');
INSERT INTO `questions` VALUES ('42', '1', 'Do you feel tired on wakening in the morning?', '2013-12-23 02:48:58', '2013-12-23 02:48:58', '1');
INSERT INTO `questions` VALUES ('43', '1', 'Do you often feel excessively tired or exhausted?', '2013-12-23 02:49:26', '2014-07-04 08:53:19', '1');
INSERT INTO `questions` VALUES ('44', '1', 'Do you tend to get a dull ache in the small of the back?', '2013-12-23 02:49:52', '2013-12-23 02:49:52', '1');
INSERT INTO `questions` VALUES ('45', '1', 'Do you get burning sensations in the feet, particularly under the foot?', '2013-12-23 02:50:23', '2014-07-04 08:53:31', '1');
INSERT INTO `questions` VALUES ('46', '1', 'Do you get constipation or have difficulty evacuating a bowel action?', '2013-12-23 02:50:54', '2014-07-04 08:53:43', '1');
INSERT INTO `questions` VALUES ('47', '1', 'Do you find that your co-coordination has diminished?', '2013-12-23 02:51:24', '2013-12-23 02:51:24', '1');
INSERT INTO `questions` VALUES ('48', '1', 'Do you get a low back ache especially on getting up in the morning?', '2013-12-23 02:51:54', '2013-12-23 02:51:54', '1');
INSERT INTO `questions` VALUES ('49', '1', 'Do you get an \'electric shock\' type of sensation on bending your neck quickly?', '2013-12-23 02:52:40', '2013-12-23 02:52:40', '1');
INSERT INTO `questions` VALUES ('50', '1', 'Has your memory deteriorated in recent years?', '2013-12-23 02:52:56', '2014-07-04 08:53:58', '1');
INSERT INTO `questions` VALUES ('51', '1', 'Do you ever get muscle twitching or muscle cramp?', '2013-12-23 02:53:27', '2014-07-04 08:54:27', '1');
INSERT INTO `questions` VALUES ('52', '1', 'Do you find that loud sounds are somewhat annoying or startling? ', '2013-12-23 02:53:39', '2014-07-04 08:54:36', '1');
INSERT INTO `questions` VALUES ('53', '1', 'Do you find that your food tends to be tasteless?', '2013-12-23 02:53:57', '2013-12-23 02:53:57', '1');
INSERT INTO `questions` VALUES ('54', '1', 'Do you find that your cuts and sores tend to heal slowly?', '2013-12-23 02:54:26', '2013-12-23 02:54:26', '1');
INSERT INTO `questions` VALUES ('55', '1', 'Do you have white spots or streaks in your fingernails?', '2013-12-23 02:54:51', '2013-12-23 02:54:51', '1');
INSERT INTO `questions` VALUES ('56', '1', 'Do you have horizontal grooves in your fingernails?', '2013-12-23 02:58:22', '2013-12-23 04:06:38', '1');
INSERT INTO `questions` VALUES ('57', '1', 'Are your nails brittle or breaking easily?', '2013-12-23 02:58:36', '2013-12-23 04:06:50', '1');
INSERT INTO `questions` VALUES ('58', '1', 'Are your nails soft and papery?', '2013-12-23 02:59:14', '2013-12-23 04:07:00', '1');
INSERT INTO `questions` VALUES ('59', '1', 'Do you have stretch marks on your hips, stomach or buttocks?', '2013-12-23 03:00:48', '2013-12-23 04:07:09', '1');
INSERT INTO `questions` VALUES ('60', '1', 'Did you get growing pains in the legs during your early teenage years?', '2013-12-23 03:01:20', '2014-07-04 09:27:03', '1');
INSERT INTO `questions` VALUES ('61', '1', 'Did you suffer from acne during your adolescence?', '2013-12-23 03:02:50', '2013-12-23 04:07:52', '1');
INSERT INTO `questions` VALUES ('62', '1', 'Did you suffer from acne after adolescence?', '2013-12-23 04:08:21', '2013-12-23 04:08:21', '1');
INSERT INTO `questions` VALUES ('63', '1', 'Is your skin generally dry and somewhat flaking?', '2013-12-23 04:08:52', '2014-07-04 09:25:45', '1');
INSERT INTO `questions` VALUES ('64', '1', 'Do your nails easily split or peel back?', '2013-12-23 04:09:21', '2013-12-23 04:09:21', '1');
INSERT INTO `questions` VALUES ('65', '1', 'Do you get irritation or itching inside your ears?', '2013-12-23 04:09:38', '2013-12-23 04:09:38', '1');
INSERT INTO `questions` VALUES ('66', '1', 'Does the skin on your face or upper chest feel dry or lumpy?', '2013-12-23 04:10:07', '2013-12-23 04:10:07', '1');
INSERT INTO `questions` VALUES ('67', '1', 'Is your hair limp, dull or lusterless?', '2013-12-23 04:10:30', '2014-07-04 09:28:09', '1');
INSERT INTO `questions` VALUES ('68', '1', 'Is the skin on your heels thickened?', '2013-12-23 04:10:47', '2013-12-23 04:10:47', '1');
INSERT INTO `questions` VALUES ('69', '1', 'Is the skin on your heels cracked and/or painful?', '2013-12-23 04:29:32', '2013-12-23 04:29:32', '1');
INSERT INTO `questions` VALUES ('70', '1', 'Do you find you cannot fully straighten the 4th and 5th fingers of your hand?', '2013-12-23 04:31:54', '2013-12-23 04:31:54', '1');
INSERT INTO `questions` VALUES ('71', '1', 'Do you get pain or soreness in the muscles after physical activity?', '2013-12-23 04:32:46', '2014-07-04 09:28:26', '1');
INSERT INTO `questions` VALUES ('72', '1', 'Is the skin of your feet or toes pale and cold?', '2013-12-23 04:33:51', '2013-12-23 04:33:51', '1');
INSERT INTO `questions` VALUES ('73', '1', 'Are the nails of your toes thickened or deformed?', '2013-12-23 04:34:11', '2013-12-23 04:34:11', '1');
INSERT INTO `questions` VALUES ('74', '1', 'Do you find that you tire easily with only mild activity?', '2013-12-23 04:34:26', '2014-07-04 09:29:04', '1');
INSERT INTO `questions` VALUES ('75', '1', 'Do you get unduly hungry between meals or during the night?', '2013-12-23 04:34:50', '2014-07-04 09:29:19', '1');
INSERT INTO `questions` VALUES ('76', '1', 'Do you wake after a few hours sleep?', '2013-12-23 04:35:19', '2013-12-23 04:35:19', '1');
INSERT INTO `questions` VALUES ('77', '1', 'Do you often feel apprehensive or scared for no obvious reason?', '2013-12-23 04:35:34', '2014-07-04 09:30:24', '1');
INSERT INTO `questions` VALUES ('78', '1', 'Do you frequently worry about things or feel anxious?', '2013-12-23 04:36:01', '2014-07-04 09:30:43', '1');
INSERT INTO `questions` VALUES ('79', '1', 'Do you get bouts of feeling insecure?', '2013-12-23 04:36:21', '2013-12-23 04:36:21', '1');
INSERT INTO `questions` VALUES ('80', '1', 'Do your feelings fluctuate quickly?', '2013-12-23 04:36:35', '2013-12-23 04:36:59', '1');
INSERT INTO `questions` VALUES ('81', '1', 'Do you tend to cry or feel like crying easily?', '2013-12-23 04:37:23', '2013-12-23 04:37:23', '1');
INSERT INTO `questions` VALUES ('82', '1', 'Do you have bouts of unreasonable anger or behavior?', '2013-12-23 04:38:32', '2013-12-23 04:38:32', '1');
INSERT INTO `questions` VALUES ('83', '1', 'Do you tend to magnify insignificant events?', '2013-12-23 04:48:17', '2013-12-23 04:48:17', '1');
INSERT INTO `questions` VALUES ('84', '1', 'Do you drink more than 2 cups of coffee or cola drinks per day?', '2013-12-23 04:56:10', '2013-12-23 04:56:10', '1');
INSERT INTO `questions` VALUES ('85', '1', 'Do you crave candy soft drinks or coffee between meals, or during the afternoon?', '2013-12-23 04:56:42', '2013-12-23 04:56:42', '1');
INSERT INTO `questions` VALUES ('86', '1', 'Do you find yourself unable to perform well under pressure?', '2013-12-23 04:57:10', '2013-12-23 04:57:10', '1');
INSERT INTO `questions` VALUES ('87', '1', 'Do you experience frequent headaches?', '2013-12-23 04:57:23', '2014-07-04 09:35:00', '1');
INSERT INTO `questions` VALUES ('88', '1', 'Do you often feel sleepy during the day?', '2013-12-23 04:57:40', '2014-07-04 09:35:20', '1');
INSERT INTO `questions` VALUES ('89', '1', 'Do you often feel drowsy or sleepy after meals?', '2013-12-23 04:58:00', '2014-07-04 09:35:39', '1');
INSERT INTO `questions` VALUES ('90', '1', 'Do you have periods of low energy?', '2013-12-23 04:58:16', '2013-12-23 04:58:16', '1');
INSERT INTO `questions` VALUES ('91', '1', 'Do you have to push yourself to get things done?', '2013-12-23 04:58:39', '2013-12-23 04:58:39', '1');
INSERT INTO `questions` VALUES ('92', '1', 'Do you eat when nervous or tired?', '2013-12-23 04:58:50', '2013-12-23 04:58:50', '1');
INSERT INTO `questions` VALUES ('93', '1', 'Do you get stomach cramps or nervous stomach, particularly with delayed meals?', '2013-12-23 05:00:33', '2014-07-04 09:35:54', '1');
INSERT INTO `questions` VALUES ('94', '1', 'Do you find that eating gives you relief from tiredness?', '2013-12-23 05:01:08', '2013-12-23 05:01:08', '1');
INSERT INTO `questions` VALUES ('95', '1', 'Do you have suicidal thoughts or feelings?', '2013-12-23 05:01:25', '2013-12-23 05:01:25', '1');
INSERT INTO `questions` VALUES ('96', '1', 'Do you have feelings of hopelessness?', '2013-12-23 05:24:29', '2013-12-23 05:24:29', '1');
INSERT INTO `questions` VALUES ('97', '1', 'Do you get bad dreams, nightmares or experience restless sleep?', '2013-12-23 05:24:49', '2014-07-04 09:36:07', '1');
INSERT INTO `questions` VALUES ('98', '1', 'Do you get irritable before meals or if a meal is delayed?', '2013-12-23 05:25:04', '2014-07-04 09:36:23', '1');
INSERT INTO `questions` VALUES ('99', '1', 'Do you get shakey inside when hungry or after meals?', '2013-12-23 05:25:36', '2013-12-23 05:25:36', '1');
INSERT INTO `questions` VALUES ('100', '1', 'Do you feel faint or lightheaded if meals are delayed or missed?', '2013-12-23 05:26:07', '2013-12-23 05:26:07', '1');
INSERT INTO `questions` VALUES ('101', '1', 'Do you get generalised muscle aches and pains?', '2013-12-23 05:27:05', '2013-12-23 05:27:05', '1');
INSERT INTO `questions` VALUES ('102', '1', 'Do you suffer from pain in the neck and shoulder muscles?', '2013-12-23 05:28:40', '2013-12-23 05:28:40', '1');
INSERT INTO `questions` VALUES ('103', '1', 'Do you get blurred vision, particularly when tired or hungry?', '2013-12-23 05:29:42', '2014-07-04 09:37:09', '1');
INSERT INTO `questions` VALUES ('104', '1', 'Do you get short of breath on exertion with even mild exertion?', '2013-12-23 05:30:49', '2014-07-04 09:37:25', '1');
INSERT INTO `questions` VALUES ('105', '1', 'Has your sex drive diminished significantly in the past few years?', '2013-12-23 05:31:12', '2014-07-04 09:37:40', '1');
INSERT INTO `questions` VALUES ('106', '1', 'Do you sweat excessively?', '2013-12-23 09:32:06', '2013-12-23 09:32:06', '1');
INSERT INTO `questions` VALUES ('107', '1', 'Do you find it difficult to maintain an ideal weight?', '2013-12-23 09:32:25', '2013-12-23 09:32:25', '1');
INSERT INTO `questions` VALUES ('108', '1', 'Do you have an excessive thirst or frequent urination?', '2013-12-23 09:32:47', '2013-12-23 09:32:47', '1');
INSERT INTO `questions` VALUES ('109', '1', 'Do you get sore aching eyes with intensive use?', '2013-12-23 09:33:11', '2013-12-23 09:33:11', '1');
INSERT INTO `questions` VALUES ('110', '1', 'Do you tend to get episodes of fluid retention?', '2013-12-23 09:33:27', '2013-12-23 09:33:27', '1');
INSERT INTO `questions` VALUES ('111', '1', 'Do you have dark circles under the eyes or puffiness around eyes?', '2014-07-04 09:38:49', '2014-07-04 09:39:07', '1');
INSERT INTO `questions` VALUES ('112', '1', 'Do you experience a queasy or sick feeling after eating fatty foods?', '2014-07-04 09:39:37', '2014-07-04 09:39:37', '1');
INSERT INTO `questions` VALUES ('113', '1', 'Do you get skin itchiness without rash or obvious cause?', '2014-07-04 09:39:50', '2014-07-04 09:39:50', '1');
INSERT INTO `questions` VALUES ('114', '1', 'Do you get redness and slight burning sensation over the nose or cheeks?', '2014-07-04 09:40:08', '2014-07-04 09:40:08', '1');
INSERT INTO `questions` VALUES ('115', '1', 'Are you becoming more sensitive or reactive to coffee and chemical fumes?', '2014-07-04 09:40:21', '2014-07-04 09:40:21', '1');

-- ----------------------------
-- Table structure for questions_qgroups
-- ----------------------------
DROP TABLE IF EXISTS `questions_qgroups`;
CREATE TABLE `questions_qgroups` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `qgroup_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=264 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of questions_qgroups
-- ----------------------------
INSERT INTO `questions_qgroups` VALUES ('5', '2', '2');
INSERT INTO `questions_qgroups` VALUES ('6', '4', '2');
INSERT INTO `questions_qgroups` VALUES ('7', '1', '2');
INSERT INTO `questions_qgroups` VALUES ('8', '3', '2');
INSERT INTO `questions_qgroups` VALUES ('9', '5', '2');
INSERT INTO `questions_qgroups` VALUES ('10', '8', '2');
INSERT INTO `questions_qgroups` VALUES ('11', '10', '2');
INSERT INTO `questions_qgroups` VALUES ('12', '11', '2');
INSERT INTO `questions_qgroups` VALUES ('13', '15', '2');
INSERT INTO `questions_qgroups` VALUES ('14', '16', '2');
INSERT INTO `questions_qgroups` VALUES ('15', '19', '2');
INSERT INTO `questions_qgroups` VALUES ('16', '20', '2');
INSERT INTO `questions_qgroups` VALUES ('17', '1', '3');
INSERT INTO `questions_qgroups` VALUES ('18', '2', '3');
INSERT INTO `questions_qgroups` VALUES ('20', '5', '3');
INSERT INTO `questions_qgroups` VALUES ('21', '6', '3');
INSERT INTO `questions_qgroups` VALUES ('22', '11', '3');
INSERT INTO `questions_qgroups` VALUES ('23', '13', '3');
INSERT INTO `questions_qgroups` VALUES ('241', '107', '1');
INSERT INTO `questions_qgroups` VALUES ('245', '1', '1');
INSERT INTO `questions_qgroups` VALUES ('246', '6', '1');
INSERT INTO `questions_qgroups` VALUES ('247', '3', '4');
INSERT INTO `questions_qgroups` VALUES ('248', '4', '4');
INSERT INTO `questions_qgroups` VALUES ('249', '7', '4');
INSERT INTO `questions_qgroups` VALUES ('250', '8', '4');
INSERT INTO `questions_qgroups` VALUES ('251', '103', '4');
INSERT INTO `questions_qgroups` VALUES ('252', '0', '5');
INSERT INTO `questions_qgroups` VALUES ('253', '2', '6');
INSERT INTO `questions_qgroups` VALUES ('254', '7', '6');
INSERT INTO `questions_qgroups` VALUES ('255', '10', '6');
INSERT INTO `questions_qgroups` VALUES ('256', '1', '7');
INSERT INTO `questions_qgroups` VALUES ('257', '3', '7');
INSERT INTO `questions_qgroups` VALUES ('258', '4', '7');
INSERT INTO `questions_qgroups` VALUES ('259', '6', '7');
INSERT INTO `questions_qgroups` VALUES ('260', '2', '8');
INSERT INTO `questions_qgroups` VALUES ('261', '5', '8');
INSERT INTO `questions_qgroups` VALUES ('262', '10', '8');
INSERT INTO `questions_qgroups` VALUES ('263', '12', '8');

-- ----------------------------
-- Table structure for selected_answer_logs
-- ----------------------------
DROP TABLE IF EXISTS `selected_answer_logs`;
CREATE TABLE `selected_answer_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `choice_value` int(20) DEFAULT NULL,
  `question_id` bigint(20) DEFAULT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `performed_time` int(20) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=260 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of selected_answer_logs
-- ----------------------------
INSERT INTO `selected_answer_logs` VALUES ('253', '0', '1', '16', '1409558828', '2014-09-01 08:08:14', '2014-09-01 08:08:14', '1');
INSERT INTO `selected_answer_logs` VALUES ('254', '1', '2', '16', '1409558828', '2014-09-01 08:08:15', '2014-09-01 08:08:15', '1');
INSERT INTO `selected_answer_logs` VALUES ('255', '3', '3', '16', '1409558828', '2014-09-01 08:08:16', '2014-09-01 08:08:16', '1');
INSERT INTO `selected_answer_logs` VALUES ('256', '1', '10', '16', '1409559153', '2014-09-01 08:12:38', '2014-09-01 08:12:38', '1');
INSERT INTO `selected_answer_logs` VALUES ('257', '0', '1', '1', '1409708067', '2014-09-03 01:34:49', '2014-09-03 01:34:49', '1');
INSERT INTO `selected_answer_logs` VALUES ('258', '1', '5', '1', '1409708067', '2014-09-03 01:34:51', '2014-09-03 01:34:51', '1');
INSERT INTO `selected_answer_logs` VALUES ('259', '0', '2', '1', '1409708243', '2014-09-03 01:37:27', '2014-09-03 01:37:27', '1');

-- ----------------------------
-- Table structure for selected_factor_logs
-- ----------------------------
DROP TABLE IF EXISTS `selected_factor_logs`;
CREATE TABLE `selected_factor_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `factor_id` bigint(20) NOT NULL,
  `created` date NOT NULL,
  `modified` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of selected_factor_logs
-- ----------------------------
INSERT INTO `selected_factor_logs` VALUES ('1', '12', '6', '2014-09-01', '1409557647', '1');
INSERT INTO `selected_factor_logs` VALUES ('2', '0', '0', '0000-00-00', '0', '1');
INSERT INTO `selected_factor_logs` VALUES ('27', '16', '6', '2014-09-01', '1409561773', '1');

-- ----------------------------
-- Table structure for templates
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of templates
-- ----------------------------

-- ----------------------------
-- Table structure for temp_answers
-- ----------------------------
DROP TABLE IF EXISTS `temp_answers`;
CREATE TABLE `temp_answers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(20) NOT NULL,
  `link` text NOT NULL,
  `question_id` bigint(20) NOT NULL,
  `factors_id` bigint(20) DEFAULT NULL,
  `choice_id` bigint(20) DEFAULT NULL,
  `rank` int(5) DEFAULT NULL,
  `answer` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=555 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of temp_answers
-- ----------------------------
INSERT INTO `temp_answers` VALUES ('111', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '1', null, null, '1', null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('112', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '2', null, null, '2', null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('113', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '3', null, null, '3', null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('114', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '4', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('115', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '5', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('116', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '6', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('117', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '7', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('118', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '8', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('119', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '9', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('120', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '10', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('121', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '11', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('122', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '12', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('123', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '13', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('124', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '14', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('125', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '15', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('126', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '16', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('127', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '17', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('128', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '18', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('129', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '19', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('130', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '20', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('131', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '21', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('132', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '22', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('133', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '23', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('134', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '24', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('135', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '25', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('136', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '26', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('137', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '27', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('138', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '28', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('139', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '29', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('140', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '30', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('141', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '31', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('142', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '32', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('143', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '33', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('144', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '34', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('145', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '35', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('146', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '36', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('147', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '37', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('148', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '38', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('149', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '39', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('150', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '40', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('151', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '41', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('152', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '42', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('153', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '43', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('154', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '44', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('155', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '45', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('156', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '46', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('157', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '47', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('158', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '48', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('159', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '49', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('160', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '50', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('161', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '51', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('162', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '52', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('163', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '53', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('164', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '54', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('165', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '55', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('166', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '56', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('167', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '57', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('168', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '58', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('169', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '59', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('170', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '60', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('171', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '61', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('172', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '62', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('173', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '63', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('174', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '64', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('175', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '65', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('176', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '66', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('177', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '67', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('178', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '68', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('179', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '69', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('180', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '70', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('181', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '71', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('182', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '72', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('183', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '73', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('184', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '74', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('185', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '75', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('186', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '76', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('187', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '77', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('188', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '78', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('189', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '79', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('190', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '80', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('191', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '81', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('192', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '82', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('193', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '83', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('194', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '84', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('195', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '85', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('196', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '86', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('197', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '87', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('198', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '88', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('199', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '89', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('200', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '90', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('201', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '91', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('202', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '92', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('203', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '93', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('204', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '94', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('205', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '95', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('206', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '96', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('207', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '97', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('208', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '98', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('209', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '99', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('210', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '100', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('211', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '101', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('212', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '102', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('213', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '103', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('214', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '104', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('215', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '105', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('216', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '106', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('217', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '107', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('218', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '108', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('219', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '109', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('220', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '110', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('221', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '0', null, null, null, null, '2014-05-08 08:14:10', '2014-05-08 08:14:10', '1');
INSERT INTO `temp_answers` VALUES ('222', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '1', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('223', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '2', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('224', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '3', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('225', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '4', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('226', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '5', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('227', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '6', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('228', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '7', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('229', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '8', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('230', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '9', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('231', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '10', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('232', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '11', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('233', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '12', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('234', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '13', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('235', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '14', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('236', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '15', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('237', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '16', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('238', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '17', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('239', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '18', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('240', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '19', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('241', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '20', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('242', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '21', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('243', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '22', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('244', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '23', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('245', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '24', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('246', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '25', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('247', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '26', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('248', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '27', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('249', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '28', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('250', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '29', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('251', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '30', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('252', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '31', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('253', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '32', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('254', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '33', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('255', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '34', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('256', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '35', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('257', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '36', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('258', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '37', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('259', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '38', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('260', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '39', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('261', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '40', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('262', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '41', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('263', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '42', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('264', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '43', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('265', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '44', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('266', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '45', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('267', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '46', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('268', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '47', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('269', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '48', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('270', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '49', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('271', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '50', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('272', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '51', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('273', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '52', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('274', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '53', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('275', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '54', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('276', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '55', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('277', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '56', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('278', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '57', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('279', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '58', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('280', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '59', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('281', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '60', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('282', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '61', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('283', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '62', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('284', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '63', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('285', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '64', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('286', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '65', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('287', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '66', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('288', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '67', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('289', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '68', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('290', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '69', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('291', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '70', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('292', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '71', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('293', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '72', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('294', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '73', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('295', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '74', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('296', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '75', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('297', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '76', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('298', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '77', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('299', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '78', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('300', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '79', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('301', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '80', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('302', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '81', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('303', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '82', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('304', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '83', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('305', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '84', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('306', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '85', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('307', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '86', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('308', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '87', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('309', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '88', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('310', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '89', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('311', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '90', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('312', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '91', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('313', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '92', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('314', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '93', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('315', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '94', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('316', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '95', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('317', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '96', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('318', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '97', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('319', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '98', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('320', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '99', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('321', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '100', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('322', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '101', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('323', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '102', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('324', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '103', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('325', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '104', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('326', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '105', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('327', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '106', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('328', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '107', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('329', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '108', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('330', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '109', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('331', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '110', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('332', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '0', null, null, null, null, '2014-05-08 08:52:52', '2014-05-08 08:52:52', '1');
INSERT INTO `temp_answers` VALUES ('333', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '1', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('334', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '2', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('335', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '3', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('336', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '4', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('337', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '5', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('338', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '6', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('339', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '7', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('340', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '8', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('341', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '9', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('342', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '10', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('343', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '11', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('344', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '12', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('345', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '13', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('346', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '14', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('347', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '15', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('348', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '16', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('349', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '17', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('350', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '18', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('351', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '19', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('352', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '20', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('353', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '21', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('354', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '22', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('355', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '23', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('356', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '24', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('357', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '25', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('358', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '26', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('359', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '27', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('360', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '28', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('361', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '29', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('362', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '30', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('363', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '31', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('364', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '32', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('365', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '33', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('366', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '34', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('367', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '35', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('368', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '36', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('369', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '37', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('370', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '38', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('371', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '39', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('372', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '40', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('373', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '41', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('374', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '42', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('375', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '43', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('376', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '44', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('377', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '45', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('378', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '46', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('379', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '47', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('380', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '48', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('381', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '49', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('382', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '50', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('383', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '51', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('384', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '52', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('385', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '53', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('386', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '54', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('387', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '55', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('388', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '56', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('389', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '57', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('390', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '58', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('391', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '59', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('392', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '60', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('393', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '61', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('394', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '62', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('395', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '63', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('396', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '64', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('397', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '65', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('398', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '66', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('399', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '67', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('400', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '68', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('401', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '69', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('402', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '70', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('403', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '71', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('404', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '72', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('405', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '73', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('406', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '74', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('407', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '75', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('408', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '76', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('409', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '77', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('410', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '78', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('411', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '79', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('412', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '80', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('413', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '81', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('414', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '82', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('415', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '83', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('416', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '84', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('417', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '85', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('418', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '86', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('419', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '87', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('420', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '88', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('421', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '89', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('422', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '90', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('423', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '91', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('424', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '92', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('425', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '93', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('426', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '94', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('427', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '95', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('428', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '96', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('429', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '97', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('430', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '98', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('431', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '99', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('432', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '100', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('433', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '101', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('434', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '102', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('435', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '103', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('436', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '104', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('437', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '105', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('438', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '106', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('439', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '107', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('440', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '108', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('441', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '109', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('442', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '110', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('443', '127.0.0.1', 'http://localnutricheck.com/questions/remote_nutrient_check', '0', null, null, null, null, '2014-05-09 02:08:10', '2014-05-09 02:08:10', '1');
INSERT INTO `temp_answers` VALUES ('444', '127.0.0.1', 'http://localpropertybutler.com/test.html', '1', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('445', '127.0.0.1', 'http://localpropertybutler.com/test.html', '2', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('446', '127.0.0.1', 'http://localpropertybutler.com/test.html', '3', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('447', '127.0.0.1', 'http://localpropertybutler.com/test.html', '4', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('448', '127.0.0.1', 'http://localpropertybutler.com/test.html', '5', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('449', '127.0.0.1', 'http://localpropertybutler.com/test.html', '6', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('450', '127.0.0.1', 'http://localpropertybutler.com/test.html', '7', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('451', '127.0.0.1', 'http://localpropertybutler.com/test.html', '8', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('452', '127.0.0.1', 'http://localpropertybutler.com/test.html', '9', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('453', '127.0.0.1', 'http://localpropertybutler.com/test.html', '10', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('454', '127.0.0.1', 'http://localpropertybutler.com/test.html', '11', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('455', '127.0.0.1', 'http://localpropertybutler.com/test.html', '12', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('456', '127.0.0.1', 'http://localpropertybutler.com/test.html', '13', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('457', '127.0.0.1', 'http://localpropertybutler.com/test.html', '14', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('458', '127.0.0.1', 'http://localpropertybutler.com/test.html', '15', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('459', '127.0.0.1', 'http://localpropertybutler.com/test.html', '16', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('460', '127.0.0.1', 'http://localpropertybutler.com/test.html', '17', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('461', '127.0.0.1', 'http://localpropertybutler.com/test.html', '18', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('462', '127.0.0.1', 'http://localpropertybutler.com/test.html', '19', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('463', '127.0.0.1', 'http://localpropertybutler.com/test.html', '20', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('464', '127.0.0.1', 'http://localpropertybutler.com/test.html', '21', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('465', '127.0.0.1', 'http://localpropertybutler.com/test.html', '22', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('466', '127.0.0.1', 'http://localpropertybutler.com/test.html', '23', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('467', '127.0.0.1', 'http://localpropertybutler.com/test.html', '24', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('468', '127.0.0.1', 'http://localpropertybutler.com/test.html', '25', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('469', '127.0.0.1', 'http://localpropertybutler.com/test.html', '26', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('470', '127.0.0.1', 'http://localpropertybutler.com/test.html', '27', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('471', '127.0.0.1', 'http://localpropertybutler.com/test.html', '28', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('472', '127.0.0.1', 'http://localpropertybutler.com/test.html', '29', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('473', '127.0.0.1', 'http://localpropertybutler.com/test.html', '30', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('474', '127.0.0.1', 'http://localpropertybutler.com/test.html', '31', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('475', '127.0.0.1', 'http://localpropertybutler.com/test.html', '32', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('476', '127.0.0.1', 'http://localpropertybutler.com/test.html', '33', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('477', '127.0.0.1', 'http://localpropertybutler.com/test.html', '34', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('478', '127.0.0.1', 'http://localpropertybutler.com/test.html', '35', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('479', '127.0.0.1', 'http://localpropertybutler.com/test.html', '36', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('480', '127.0.0.1', 'http://localpropertybutler.com/test.html', '37', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('481', '127.0.0.1', 'http://localpropertybutler.com/test.html', '38', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('482', '127.0.0.1', 'http://localpropertybutler.com/test.html', '39', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('483', '127.0.0.1', 'http://localpropertybutler.com/test.html', '40', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('484', '127.0.0.1', 'http://localpropertybutler.com/test.html', '41', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('485', '127.0.0.1', 'http://localpropertybutler.com/test.html', '42', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('486', '127.0.0.1', 'http://localpropertybutler.com/test.html', '43', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('487', '127.0.0.1', 'http://localpropertybutler.com/test.html', '44', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('488', '127.0.0.1', 'http://localpropertybutler.com/test.html', '45', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('489', '127.0.0.1', 'http://localpropertybutler.com/test.html', '46', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('490', '127.0.0.1', 'http://localpropertybutler.com/test.html', '47', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('491', '127.0.0.1', 'http://localpropertybutler.com/test.html', '48', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('492', '127.0.0.1', 'http://localpropertybutler.com/test.html', '49', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('493', '127.0.0.1', 'http://localpropertybutler.com/test.html', '50', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('494', '127.0.0.1', 'http://localpropertybutler.com/test.html', '51', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('495', '127.0.0.1', 'http://localpropertybutler.com/test.html', '52', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('496', '127.0.0.1', 'http://localpropertybutler.com/test.html', '53', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('497', '127.0.0.1', 'http://localpropertybutler.com/test.html', '54', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('498', '127.0.0.1', 'http://localpropertybutler.com/test.html', '55', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('499', '127.0.0.1', 'http://localpropertybutler.com/test.html', '56', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('500', '127.0.0.1', 'http://localpropertybutler.com/test.html', '57', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('501', '127.0.0.1', 'http://localpropertybutler.com/test.html', '58', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('502', '127.0.0.1', 'http://localpropertybutler.com/test.html', '59', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('503', '127.0.0.1', 'http://localpropertybutler.com/test.html', '60', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('504', '127.0.0.1', 'http://localpropertybutler.com/test.html', '61', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('505', '127.0.0.1', 'http://localpropertybutler.com/test.html', '62', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('506', '127.0.0.1', 'http://localpropertybutler.com/test.html', '63', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('507', '127.0.0.1', 'http://localpropertybutler.com/test.html', '64', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('508', '127.0.0.1', 'http://localpropertybutler.com/test.html', '65', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('509', '127.0.0.1', 'http://localpropertybutler.com/test.html', '66', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('510', '127.0.0.1', 'http://localpropertybutler.com/test.html', '67', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('511', '127.0.0.1', 'http://localpropertybutler.com/test.html', '68', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('512', '127.0.0.1', 'http://localpropertybutler.com/test.html', '69', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('513', '127.0.0.1', 'http://localpropertybutler.com/test.html', '70', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('514', '127.0.0.1', 'http://localpropertybutler.com/test.html', '71', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('515', '127.0.0.1', 'http://localpropertybutler.com/test.html', '72', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('516', '127.0.0.1', 'http://localpropertybutler.com/test.html', '73', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('517', '127.0.0.1', 'http://localpropertybutler.com/test.html', '74', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('518', '127.0.0.1', 'http://localpropertybutler.com/test.html', '75', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('519', '127.0.0.1', 'http://localpropertybutler.com/test.html', '76', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('520', '127.0.0.1', 'http://localpropertybutler.com/test.html', '77', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('521', '127.0.0.1', 'http://localpropertybutler.com/test.html', '78', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('522', '127.0.0.1', 'http://localpropertybutler.com/test.html', '79', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('523', '127.0.0.1', 'http://localpropertybutler.com/test.html', '80', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('524', '127.0.0.1', 'http://localpropertybutler.com/test.html', '81', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('525', '127.0.0.1', 'http://localpropertybutler.com/test.html', '82', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('526', '127.0.0.1', 'http://localpropertybutler.com/test.html', '83', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('527', '127.0.0.1', 'http://localpropertybutler.com/test.html', '84', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('528', '127.0.0.1', 'http://localpropertybutler.com/test.html', '85', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('529', '127.0.0.1', 'http://localpropertybutler.com/test.html', '86', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('530', '127.0.0.1', 'http://localpropertybutler.com/test.html', '87', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('531', '127.0.0.1', 'http://localpropertybutler.com/test.html', '88', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('532', '127.0.0.1', 'http://localpropertybutler.com/test.html', '89', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('533', '127.0.0.1', 'http://localpropertybutler.com/test.html', '90', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('534', '127.0.0.1', 'http://localpropertybutler.com/test.html', '91', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('535', '127.0.0.1', 'http://localpropertybutler.com/test.html', '92', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('536', '127.0.0.1', 'http://localpropertybutler.com/test.html', '93', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('537', '127.0.0.1', 'http://localpropertybutler.com/test.html', '94', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('538', '127.0.0.1', 'http://localpropertybutler.com/test.html', '95', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('539', '127.0.0.1', 'http://localpropertybutler.com/test.html', '96', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('540', '127.0.0.1', 'http://localpropertybutler.com/test.html', '97', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('541', '127.0.0.1', 'http://localpropertybutler.com/test.html', '98', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('542', '127.0.0.1', 'http://localpropertybutler.com/test.html', '99', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('543', '127.0.0.1', 'http://localpropertybutler.com/test.html', '100', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('544', '127.0.0.1', 'http://localpropertybutler.com/test.html', '101', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('545', '127.0.0.1', 'http://localpropertybutler.com/test.html', '102', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('546', '127.0.0.1', 'http://localpropertybutler.com/test.html', '103', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('547', '127.0.0.1', 'http://localpropertybutler.com/test.html', '104', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('548', '127.0.0.1', 'http://localpropertybutler.com/test.html', '105', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('549', '127.0.0.1', 'http://localpropertybutler.com/test.html', '106', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('550', '127.0.0.1', 'http://localpropertybutler.com/test.html', '107', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('551', '127.0.0.1', 'http://localpropertybutler.com/test.html', '108', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('552', '127.0.0.1', 'http://localpropertybutler.com/test.html', '109', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('553', '127.0.0.1', 'http://localpropertybutler.com/test.html', '110', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');
INSERT INTO `temp_answers` VALUES ('554', '127.0.0.1', 'http://localpropertybutler.com/test.html', '0', null, null, null, null, '2014-05-09 07:07:32', '2014-05-09 07:07:32', '1');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `hash_value` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` tinytext COLLATE utf8_unicode_ci COMMENT 'full url to avatar image file',
  `language` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `can_answer` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '1', null, null, null, null, 'Admin', '79b436d9673e7da2242a9998fb72d50d0451c1fa', 'admin@admin.com', null, null, null, null, '1', '1', '2014-06-02 11:34:14', '2014-06-02 11:34:14', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('2', '3', null, null, null, null, 'Member', 'd9f981656fa2ebeb5594e74d079367ace8620286', 'member@member.com', null, null, null, null, '0', '1', '2014-06-02 11:34:49', '2014-08-07 02:12:31', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('3', '2', null, null, null, null, 'Client', 'c3e82dba7423583a4dcadca596ab06effb004720', 'client@client.com', null, null, null, null, '1', '1', '2014-06-02 11:35:13', '2014-07-10 04:19:36', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('15', '0', null, null, null, null, null, null, '', null, null, null, null, '0', '0', '2014-08-07 08:10:17', '2014-08-07 08:10:17', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('16', '3', '3', 'ff40ef679c9789244c155016d81b1b2ebb60c7e1', null, null, null, 'e9bc16ed001ad294aa1d4b917233518121120419', 'gd_salvosa@yahoo.com', null, null, null, null, '0', '1', '2014-06-27 05:01:29', '2014-08-08 00:26:20', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('17', '3', '3', '2a6e5499682f28ade1bbd2555cab8ee31cb94e57', null, null, null, '1ba9654d252e6887b332be473e63f6beff74ed4e', 'mark.t@iquantum.com.au', null, null, null, null, '0', '1', '2014-07-03 09:41:09', '2014-07-05 03:43:03', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('18', '3', '3', 'ac9ac0ba65a82a5ad85ce5239b5280bbfb511a0c', null, null, null, 'd60db4a3be80cb8d2cf710354afffb68a12cb7f1', 'rob@iquantum.com.au', null, null, null, null, '0', '1', '2014-07-04 07:21:19', '2014-08-08 03:04:22', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('20', '2', null, '1bfc3ff839ea3dfa4ab3e1ad0e6c41f84c06616b', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'apolinaria.cabral@gmail.com', null, null, null, null, '1', '1', '2014-07-05 03:27:45', '2014-07-23 21:00:58', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('21', '3', '20', '02fdb74bdeca1a81ecbdab49a7e04639afd55453', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'apoldapple@gmail.com', null, null, null, null, '0', '1', '2014-07-05 03:32:47', '2014-08-28 07:47:50', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('23', '3', '3', 'a650ce5802f158d2134d60871e57433be87fa32c', null, null, null, 'a4477c5053c37c7d43798af945e465a6ba004084', 'ljh@kj.com', null, null, null, null, '1', '1', '2014-07-22 16:21:05', '2014-07-22 16:21:05', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('24', '3', '3', '2e69f78c7c8dbada4999d27515e2470e5a58b142', null, null, null, 'c929d37e9a95d7a9a35a5f955a4d911cdc6ab530', 'lkjh@asdadkjhf.com', null, null, null, null, '1', '1', '2014-07-22 16:36:47', '2014-07-22 16:36:47', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('25', '3', '3', '7868925fcbe8425901c701113ee1f9f687ae6d3c', null, null, null, '19dff93393121d13c5fb2c5a4c7b883edada0ce9', 'adfgafd@ada.com', null, null, null, null, '1', '1', '2014-07-22 16:40:15', '2014-07-22 16:40:15', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('26', '3', '3', '54f1329a670616c588de923214bcb63f76232edc', null, null, null, '9541993b6b1444ed5cc7d899b4390a91e92cb2e5', 'ytuytiuyt@adg.com', null, null, null, null, '1', '1', '2014-07-22 16:41:19', '2014-07-22 16:41:19', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('27', '2', null, 'c178de826011fd7db87ad66f5eebfdf420ad28d8', null, null, null, 'efe9a1e5adce75365a4a6f235670fdd5591e4fae', 'test01@yahoo.com', null, null, null, null, '1', '0', '2014-07-23 02:22:57', '2014-07-23 02:22:57', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('29', '1', null, '8fa5656173d36659c6725aaefa8ff42a0a40e5e8', null, null, null, 'cb065ac2bb00f50addf566970e82cf8ebedec15f', 'test@yahoo.com', null, null, null, null, '1', '0', '2014-07-25 02:34:38', '2014-07-25 02:34:38', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('30', '3', null, '99323a34e9c50b87f65707eb3c291f1014eace5b', null, null, null, '3bcaba34417467ae9fa9e2f4265a57b442afb8dc', 'test@test.com', null, null, null, null, '1', '1', '2014-07-25 02:57:46', '2014-07-25 02:57:46', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('32', '2', null, '7927ba3a13a70ed6e39201429b099ca0e57c2359', null, null, null, 'ed95299f53d5e2d112b2ad44c2270c33f090c991', 'karen@nutritionmedicine.org', null, null, null, null, '1', '1', '2014-07-28 04:59:18', '2014-07-28 05:41:42', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('34', '3', '32', '05d935f2038961f671a4e24ccaf7dc65b81463f2', null, null, null, '58b6a445778c57a687a5dc4de5ee299f8e59ef17', 'mlallensack@fspgroup.com.au', null, null, null, null, '0', '1', '2014-07-28 05:16:57', '2014-07-28 05:42:25', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('35', '3', '3', '7ce62018e96a04a7f12a56b7caebb72965a32356', null, null, null, 'b3e1ab70dc46e3ee36d28c082bb10b7fc79431d4', 'gkodi@gmail.com', null, null, null, null, '1', '1', '2014-07-28 07:26:11', '2014-07-28 07:26:11', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('36', '3', '3', '3a4c1c849d5336b6edfe0978a133b994b14dbcd6', null, null, null, '9d03cc466c0384a3541750c1e1819e21570be5be', 'gkodikara@gmail.com', null, null, null, null, '1', '1', '2014-07-28 07:26:36', '2014-07-28 07:26:36', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('37', '2', null, 'be5c3a09db68c3fa2ce7d34676dc7346e7f58d3c', null, null, null, '7cb196e309ddd20a77da9151a6124463eae77084', 'anne.donesa@aol.com', null, null, null, null, '1', '1', '2014-07-28 17:13:35', '2014-07-28 17:13:35', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('38', '2', null, '283e620905be0b2bfe875217a59e09c3321a6b03', null, null, null, '2975f78de7ba966957bac3061db30ae9ddda3399', 'anne.donesa@gmail.com', null, null, null, null, '1', '1', '2014-07-28 17:24:32', '2014-07-28 17:24:32', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('39', '3', '32', '72696b29aa0557bd60f4d897f4a27485449d0c6a', null, null, null, 'e10d8e6c563b85e26af3e2f81bd6e40aa146a8fe', 'julie@nutritionmedicine.org', null, null, null, null, '1', '1', '2014-07-29 00:43:53', '2014-08-27 04:34:11', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('42', '3', '3', '25a55dc3775649ffc8a89d824d859cb62bbe5126', null, null, null, '214196dc0d44226b0e9226f02dc565fa06b30c9d', 'greg@iquantum.com.au', null, null, null, null, '1', '1', '2014-07-29 08:24:44', '2014-07-29 08:24:44', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('43', '3', '3', '8b4f1af40f4b7f0c77e66cb6ad43e02db0768762', null, null, null, 'fb87adae413d3f1320aee123b7a3f1e0263c90e7', 'maree@elkarim.com', null, null, null, null, '1', '0', '2014-07-29 08:34:32', '2014-07-29 08:34:32', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('44', '3', '20', '87c58a06070cb1b92988d8c33641240c32023cf7', null, null, null, '1c8e91ef6739fe31ca6a93fe7e224c4d9e380817', 'testmember.iquantum@gmail.com', null, null, null, null, '1', '1', '2014-07-29 18:27:42', '2014-07-29 18:27:42', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('45', '3', '20', '0689e9883531f6d374b8d4ed4da984bc31bcc3cc', null, null, null, '4a9cf68b9cda47bfa91a7326c3d5ff7dfad1270d', 'mirien0317@yahoo.com', null, null, null, null, '1', '1', '2014-07-29 18:50:33', '2014-07-29 18:50:33', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('46', '3', null, 'c2263e071513c2f7de2963251f6d28bb64baec05', null, null, null, '7a8aeb5da697ace0bc9f05f7a6fb682a7db211b8', 'dr@dr.com', null, null, null, null, '1', '1', '2014-08-04 08:41:29', '2014-08-04 08:41:29', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('47', '2', null, '382f51e4d3b721fc1658450ae35b824dce2fe385', null, null, null, '66bfa3f8e8aa0c4973f93b061753b8f225b48a80', 'dasd@sdas.com', null, null, null, null, '1', '1', '2014-08-04 08:42:06', '2014-08-04 08:42:06', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('48', '1', null, '4b742c5762ec3c0f28f713a02a5cfb2199a3f41f', null, null, null, 'a78822eeca63e860f968e3345262de0bd95a0db9', '123qwq@gmail.com', null, null, null, null, '1', '0', '2014-08-04 08:43:20', '2014-08-04 08:43:20', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('49', '3', '20', '957cbaafaf598e7c0c64c261b50e93fb0635adf8', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'pdoc.qadelivery@gmail.com', null, null, null, null, '1', '1', '2014-08-07 08:34:44', '2014-08-28 06:07:50', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('50', '3', '20', '0e5b841bdf10afc81b652b63b37a66a7e14c8f27', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'pdoc.qadelivery2@gmail.com', null, null, null, null, '0', '1', '2014-08-07 08:42:44', '2014-08-28 07:52:24', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('51', '3', '3', 'e23425e21a24b2b5e10d7e4e62b6902a78c1dd7d', null, null, null, 'e9bc16ed001ad294aa1d4b917233518121120419', 'gd.salvosa@gmail.com', null, null, null, null, '1', '1', '2014-08-07 08:47:18', '2014-08-07 08:49:57', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('52', '3', '20', 'd7f36b0effe0c36d1e9c0e77b703e06d339dd35d', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'pdoc.qadelivery3@gmail.com', null, null, null, null, '0', '1', '2014-08-07 08:56:39', '2014-08-28 08:06:30', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('53', '3', '3', '71df7f5af49569c83e63575d940056916270773f', null, null, null, 'db4becc53ec2e32b1af2c361255a72a8a81b0cb0', 'drmel@nutritionmedicine.org', null, null, null, null, '0', '1', '2014-08-16 06:52:44', '2014-08-16 07:09:06', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('54', '3', '20', '11d564c8b688f321f1462b51051e97ef88d254f3', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'iquantum.manila1@gmail.com', null, null, null, null, '0', '1', '2014-08-26 04:40:42', '2014-08-28 08:33:45', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('55', '3', '20', '6c2bf3a6eeb2bbb906ef5c46a3ef649496363411', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'iquantum.manila2@gmail.com', null, null, null, null, '1', '1', '2014-08-26 08:46:15', '2014-08-26 09:07:54', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('56', '2', null, '865eae74e961a7cc6f545072e4063c4628f2d67f', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'iquantum.manila3@gmail.com', null, null, null, null, '1', '1', '2014-08-26 08:48:47', '2014-08-26 09:08:18', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('57', '3', null, '03a33911730f3b78796a5697dccdc69dfc68b0bc', null, null, null, '3c1a3a2704aff760b65211050065c84190986250', 'iquantum.manila4@gmail.com', null, null, null, null, '1', '1', '2014-08-26 08:49:42', '2014-08-26 09:08:24', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('58', '3', '3', '873c99e542321f44f8264e8192ba2cc3bbd267f5', null, null, null, '1be90fa0a5b709f8d84c1ace3fa4255b93bd87fc', 'crystalresort@hotmail.com', null, null, null, null, '1', '1', '2014-08-27 04:37:26', '2014-08-27 04:37:26', '0000-00-00 00:00:00');
INSERT INTO `users` VALUES ('59', '3', null, 'ed86c66428bc02a35cf2f8134dbc8d5a', null, null, 'tamahome fushigi', '3c1a3a2704aff760b65211050065c84190986250', 'iquantum.manila1@yahoo.com.ph', null, null, null, null, '0', '0', '2014-08-28 09:16:40', '2014-08-28 09:16:40', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for users_vitamins
-- ----------------------------
DROP TABLE IF EXISTS `users_vitamins`;
CREATE TABLE `users_vitamins` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `vitamins_id` bigint(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users_vitamins
-- ----------------------------

-- ----------------------------
-- Table structure for user_access_logs
-- ----------------------------
DROP TABLE IF EXISTS `user_access_logs`;
CREATE TABLE `user_access_logs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_access_logs
-- ----------------------------

-- ----------------------------
-- Table structure for user_profiles
-- ----------------------------
DROP TABLE IF EXISTS `user_profiles`;
CREATE TABLE `user_profiles` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `middle_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(60) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` text,
  `contact` varchar(100) DEFAULT NULL,
  `company` varchar(150) DEFAULT NULL,
  `nationality` varchar(60) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `age` int(5) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_profiles
-- ----------------------------
INSERT INTO `user_profiles` VALUES ('1', '16', 'Testname', 'Testmiddle', 'Testlast', '2014-06-17', '123456790', 'test 1234', null, 'Filipino', '', '12', 'male', '2014-06-27 05:01:30', '2014-07-09 04:57:55', '0');
INSERT INTO `user_profiles` VALUES ('7', '15', 'Glenn', 'Denila', 'Salvosa', '2014-06-27', '3043 Loro St. Rhoda Subd.', '', null, 'Filipino', '4030', '24', 'female', '2014-06-27 06:46:54', '2014-07-09 04:58:41', '0');
INSERT INTO `user_profiles` VALUES ('8', '17', 'Mark', 'H', 'Thompson', null, 'Somewhere, Somehow', null, null, 'Ozzy', '3000', '29', 'male', '2014-07-03 09:41:09', '2014-07-03 09:41:09', '0');
INSERT INTO `user_profiles` VALUES ('9', '0', 'Tambolistah', 'Drummer', 'Boy', '2014-06-27', 'New Delhi', null, null, 'Indian', '', null, 'male', '2014-07-03 13:52:55', '2014-07-03 13:52:55', '0');
INSERT INTO `user_profiles` VALUES ('10', '18', 'Ian', 'Robert ', 'Lawson', null, '2a Hinton Road, Glen Huntly, Vic', null, null, 'Australian', '3163', '53', 'male', '2014-07-04 07:21:20', '2014-07-04 07:21:20', '0');
INSERT INTO `user_profiles` VALUES ('11', '19', 'Apulen', 'Ocampo', 'Cabral', null, '1234 Itchy', null, null, 'Indian', '4030', '23', 'male', '2014-07-05 03:20:49', '2014-07-05 03:20:49', '0');
INSERT INTO `user_profiles` VALUES ('12', '20', 'Apulen', 'Ocampo', 'Cabral', null, '1234 Itchy', null, null, 'Filipino', '1234', '23', 'female', '2014-07-05 03:27:46', '2014-07-05 03:27:46', '0');
INSERT INTO `user_profiles` VALUES ('13', '21', 'PatientApul', 'DeOcamps', 'Diokno', null, '1234 Itchy', null, null, 'Filipino', '1234', '20', 'female', '2014-07-05 03:32:47', '2014-07-05 03:32:47', '0');
INSERT INTO `user_profiles` VALUES ('14', '22', 'Harry', 'Evans', 'Potter', null, 'Little Whinging', null, null, 'British', '4304', '24', 'male', '2014-07-05 07:17:00', '2014-07-05 07:17:00', '0');
INSERT INTO `user_profiles` VALUES ('15', '23', 'gd.salvosa@gmail.com', 'gd.salvosa@gmail.com', 'gd.salvosa@gmail.com', null, 'gd.salvosa@gmail.com', null, null, 'gd.salvosa@gmail.com', 'gd.salvosa', '0', '', '2014-07-08 07:04:14', '2014-07-08 07:04:14', '0');
INSERT INTO `user_profiles` VALUES ('16', '0', 'Glenn', 'Denila', 'Salvosa', '2014-01-18', '', null, null, '', '', '24', '', '2014-07-09 08:56:03', '2014-07-09 08:56:03', '0');
INSERT INTO `user_profiles` VALUES ('17', '0', 'Glenn', 'Denila', 'Salvosa', '2014-01-18', '', null, null, '', '', '24', '', '2014-07-09 08:56:40', '2014-07-09 08:56:40', '0');
INSERT INTO `user_profiles` VALUES ('18', '0', 'Glenn', 'Denila', 'Salvosa', '2014-01-18', '', null, null, '', '', '24', '', '2014-07-09 08:57:43', '2014-07-09 08:57:43', '0');
INSERT INTO `user_profiles` VALUES ('19', '3', 'Glenn', 'Denila', 'Salvosa', '2014-01-18', '', '123456', null, '', '', '24', '', '2014-07-09 08:59:02', '2014-07-10 04:19:36', '0');
INSERT INTO `user_profiles` VALUES ('20', '33', 'Maree', null, 'Lallensack', '2014-07-28', '', '0738796555', null, '', null, '60', 'female', '2014-07-28 05:09:49', '2014-07-28 05:09:49', '0');
INSERT INTO `user_profiles` VALUES ('21', '34', 'Maree', null, 'Lallensack', '2014-07-28', '', '0417662674', null, '', null, '60', 'female', '2014-07-28 05:16:59', '2014-07-28 05:22:03', '0');
INSERT INTO `user_profiles` VALUES ('22', '35', 'Test User', null, 'Test', '2014-07-28', 'qpiawdlknawdawdlknawdl', '2340928340', null, 'Red', null, '24', 'male', '2014-07-28 07:26:13', '2014-07-28 07:26:13', '0');
INSERT INTO `user_profiles` VALUES ('23', '36', 'Gregory', null, 'Kodikara', '2014-07-28', 'Flat 501, Manhattan Building', '224234', null, 'brown', null, '3', 'male', '2014-07-28 07:26:37', '2014-07-28 07:26:37', '0');
INSERT INTO `user_profiles` VALUES ('24', '41', 'Tambolistah', null, 'Tambolero', '1990-01-18', 'iQuantum Australia', '1234567890', null, null, null, '30', 'male', '2014-07-29 07:55:28', '2014-07-29 08:04:07', '0');
INSERT INTO `user_profiles` VALUES ('25', '42', 'Greg', null, 'Kodikara', '2014-07-05', 'iQuantum Australia', '123456890', null, null, null, '123456', 'male', '2014-07-29 08:24:46', '2014-07-29 08:24:46', '0');
INSERT INTO `user_profiles` VALUES ('26', '43', 'Maree', null, 'Elkarim', '2014-07-29', 'Nutircheck', '1234567890', null, null, null, '1234567890', '', '2014-07-29 08:34:35', '2014-07-29 08:34:35', '0');
INSERT INTO `user_profiles` VALUES ('27', '2', 'Shaq', null, 'Chave ', '1989-12-21', null, '0450734588 ', null, null, null, '24', 'female', '2014-08-07 02:12:13', '2014-08-07 02:12:31', '0');
INSERT INTO `user_profiles` VALUES ('28', '51', 'Watashiwa', null, 'Anata', '2014-01-18', '1233 sdfgsdsfg', '1234567890-', null, 'Filipino', '1234', '12', 'male', '2014-08-07 08:47:20', '2014-08-07 08:49:57', '0');
INSERT INTO `user_profiles` VALUES ('29', '53', 'Mel', null, 'Sydney-Smith', '1946-10-08', '961 Blunder Road, Doolandella', '0407495870', null, 'Australian', '4077', '68', 'male', '2014-08-16 06:52:47', '2014-08-16 06:54:08', '0');
INSERT INTO `user_profiles` VALUES ('30', '3', null, null, null, null, null, null, null, null, null, null, null, '2014-08-16 06:53:53', '2014-08-16 06:53:53', '0');
INSERT INTO `user_profiles` VALUES ('31', '54', 'juan', null, 'karlos', '2001-02-13', 'cebu', '0', null, 'filipino', '3453', '13', 'male', '2014-08-26 04:40:44', '2014-08-26 04:40:44', '0');
INSERT INTO `user_profiles` VALUES ('32', '55', 'juander', null, 'noypi', '2010-08-01', '5656', '0', '', 'fil', '5656', '8', 'male', '2014-08-26 08:46:17', '2014-08-26 09:07:54', '0');
INSERT INTO `user_profiles` VALUES ('33', '56', 'neneng', null, 'mansanas', null, '0', '0', '0', null, '0', null, 'female', '2014-08-26 08:48:48', '2014-08-26 09:08:18', '0');
INSERT INTO `user_profiles` VALUES ('34', '57', 'neneng', null, 'B', null, '0', '000', '0', null, '00', null, 'female', '2014-08-26 08:49:44', '2014-08-26 09:08:24', '0');
INSERT INTO `user_profiles` VALUES ('35', '58', 'Julie', null, 'Donnachie', null, '', '', null, '', '', null, 'female', '2014-08-27 04:37:26', '2014-08-27 04:37:26', '0');
INSERT INTO `user_profiles` VALUES ('36', '49', 'pdoc', null, 'qadelivery', null, '0', '0', '0', null, '0', null, 'female', '2014-08-28 06:07:50', '2014-08-28 06:07:50', '0');
INSERT INTO `user_profiles` VALUES ('37', '50', 'pdoc', null, '2', null, '0', '0', '0', null, '0', null, 'female', '2014-08-28 07:36:39', '2014-08-28 07:39:17', '0');
INSERT INTO `user_profiles` VALUES ('38', '52', 'pdoc', null, '3', null, '0', '000', '00', null, '0', null, 'female', '2014-08-28 07:55:28', '2014-08-28 07:55:28', '0');
INSERT INTO `user_profiles` VALUES ('39', '52', 'pdoc', null, '3', null, '0', '000', '00', null, '0', null, 'female', '2014-08-28 07:57:46', '2014-08-28 07:57:46', '0');
INSERT INTO `user_profiles` VALUES ('40', '59', 'tamahome', null, 'fushigi', '2010-08-01', '0', '0', null, '0', '0', '0', 'male', '2014-08-28 09:16:42', '2014-08-28 09:16:42', '0');

-- ----------------------------
-- Table structure for videos
-- ----------------------------
DROP TABLE IF EXISTS `videos`;
CREATE TABLE `videos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` int(10) DEFAULT NULL,
  `video_link` text,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of videos
-- ----------------------------
INSERT INTO `videos` VALUES ('1', '2', '', '2014-07-21 04:00:13', '2014-08-04 10:00:13', '1');
INSERT INTO `videos` VALUES ('2', '2', '<iframe width=\"500\" height=\"281\" src=\"//player.vimeo.com/video/76843270\" frameborder=\"0\" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', '2014-07-21 04:07:26', '2014-07-21 04:41:32', '1');
INSERT INTO `videos` VALUES ('3', '3', '<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/uwH-6RB7PgM\" frameborder=\"0\" allowfullscreen></iframe>', '2014-07-21 04:08:52', '2014-07-21 04:44:54', '1');

-- ----------------------------
-- Table structure for vitamins
-- ----------------------------
DROP TABLE IF EXISTS `vitamins`;
CREATE TABLE `vitamins` (
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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vitamins
-- ----------------------------

-- ----------------------------
-- Table structure for widgets
-- ----------------------------
DROP TABLE IF EXISTS `widgets`;
CREATE TABLE `widgets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `template_id` bigint(20) DEFAULT NULL,
  `hosted_url` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of widgets
-- ----------------------------
