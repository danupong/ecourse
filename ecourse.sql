/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50616
Source Host           : localhost:3306
Source Database       : ecourse

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-10-08 04:34:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `web_category`
-- ----------------------------
DROP TABLE IF EXISTS `web_category`;
CREATE TABLE `web_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_category
-- ----------------------------
INSERT INTO `web_category` VALUES ('1', 'Mathematics', null, '2015-10-07 20:52:46', '2015-10-07 20:52:46');
INSERT INTO `web_category` VALUES ('2', 'Humanities', null, '2015-10-07 20:52:46', '2015-10-07 20:52:46');
INSERT INTO `web_category` VALUES ('3', 'Science', null, '2015-10-07 20:52:46', '2015-10-07 20:52:46');
INSERT INTO `web_category` VALUES ('4', 'Social Science', null, '2015-10-07 20:52:46', '2015-10-07 20:52:46');
INSERT INTO `web_category` VALUES ('5', 'Liberal Arts', null, '2015-10-07 20:52:46', '2015-10-07 20:52:46');

-- ----------------------------
-- Table structure for `web_course`
-- ----------------------------
DROP TABLE IF EXISTS `web_course`;
CREATE TABLE `web_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `description` text,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `num_std` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_course
-- ----------------------------
INSERT INTO `web_course` VALUES ('1', '3', '3', 'somchai kondee', 'Chemistry', 'Description Chemistry', '2015-10-16 12:00:00', '2015-10-19 12:00:00', '1', '2015-10-08 00:06:48', '2015-10-08 00:08:15');
INSERT INTO `web_course` VALUES ('2', '3', '2', 'somchai kondee', 'Thailand Language', 'Description Thailand Language', '2015-10-05 12:00:00', '2015-10-27 12:00:00', '1', '2015-10-08 00:09:28', '2015-10-08 04:25:29');
INSERT INTO `web_course` VALUES ('3', '4', '1', 'savitree pimpaga', 'Statistics', 'Description Statistics', '2015-10-01 12:00:00', '2015-10-30 12:00:00', '1', '2015-10-08 00:14:49', '2015-10-08 04:22:56');

-- ----------------------------
-- Table structure for `web_member`
-- ----------------------------
DROP TABLE IF EXISTS `web_member`;
CREATE TABLE `web_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(150) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `firstname` varchar(250) DEFAULT NULL,
  `lastname` varchar(250) DEFAULT NULL,
  `nickname` varchar(150) DEFAULT NULL,
  `type` enum('instructor','student') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of web_member
-- ----------------------------
INSERT INTO `web_member` VALUES ('1', 'student01', 'a091c81f47b65c076231e035c7de1c58', 'danupong', 'jumparee', 'nut', 'student', '2015-10-08 15:40:18', '2015-10-08 15:40:18');
INSERT INTO `web_member` VALUES ('2', 'student02', 'a091c81f47b65c076231e035c7de1c58', 'nuttapon', 'tongdee', 'pon', 'student', '2015-10-07 23:42:50', '2015-10-07 23:42:50');
INSERT INTO `web_member` VALUES ('3', 'instructor01', 'c1187388bca5b41b34d56a39edc5bde7', 'somchai', 'kondee', 'chai', 'instructor', '2015-10-07 23:54:55', '2015-10-07 23:54:55');
INSERT INTO `web_member` VALUES ('4', 'instructor02', 'c1187388bca5b41b34d56a39edc5bde7', 'savitree', 'pimpaga', 'nan', 'instructor', '2015-10-08 00:10:57', '2015-10-08 00:10:57');
