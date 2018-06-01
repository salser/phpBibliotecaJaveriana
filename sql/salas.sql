/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : inn

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-06-01 15:44:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for salas
-- ----------------------------
DROP TABLE IF EXISTS `salas`;
CREATE TABLE `salas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salas
-- ----------------------------
INSERT INTO `salas` VALUES ('1', 'Sala A');
INSERT INTO `salas` VALUES ('2', 'Sala B');
INSERT INTO `salas` VALUES ('3', 'Sala C');

-- ----------------------------
-- Table structure for salas_solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `salas_solicitudes`;
CREATE TABLE `salas_solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salaid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `dia` int(11) DEFAULT NULL,
  `hora` int(11) DEFAULT NULL,
  `aprobado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salas_solicitudes
-- ----------------------------
INSERT INTO `salas_solicitudes` VALUES ('13', '2', '1', '20', '0', '1');
INSERT INTO `salas_solicitudes` VALUES ('17', '1', '1', '1', '19', '1');
INSERT INTO `salas_solicitudes` VALUES ('18', '2', '1', '1', '0', '1');
INSERT INTO `salas_solicitudes` VALUES ('19', '1', '1', '1', '0', '1');
INSERT INTO `salas_solicitudes` VALUES ('20', '1', '1', '1', '0', '1');
INSERT INTO `salas_solicitudes` VALUES ('21', '1', '1', '1', '18', '0');
