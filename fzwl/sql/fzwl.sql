/*
Navicat MySQL Data Transfer

Source Server         : wamp
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : fzwl

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-05-30 07:52:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bill
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `remark` varchar(300) DEFAULT '""',
  `add_time` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bill_no` (`bill_no`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bill
-- ----------------------------

-- ----------------------------
-- Table structure for bill_detail
-- ----------------------------
DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE `bill_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bill_no` int(11) NOT NULL,
  `arrive_address` varchar(300) NOT NULL,
  `arrive_time` bigint(13) NOT NULL,
  `remark` varchar(300) DEFAULT '""',
  `sort` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bill_detail
-- ----------------------------
