/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : inn

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-05-31 21:24:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for equipos
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of equipos
-- ----------------------------
INSERT INTO `equipos` VALUES ('1', 'Razer Blade ', '2', 'razerblade.jpg');
INSERT INTO `equipos` VALUES ('2', 'NVIDIA GTX 1080', '0', 'gtx1080.jpg');
INSERT INTO `equipos` VALUES ('3', 'AMD Radeon RX480', '2', 'rx480.jpg');

-- ----------------------------
-- Table structure for equipos_solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `equipos_solicitudes`;
CREATE TABLE `equipos_solicitudes` (
  `equipo_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `aprobado` int(11) DEFAULT NULL,
  PRIMARY KEY (`equipo_id`,`usuario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of equipos_solicitudes
-- ----------------------------
INSERT INTO `equipos_solicitudes` VALUES ('1', '0', null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(64) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_2` (`id`),
  UNIQUE KEY `id_3` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Jose', '123456', 'joserafaeldn@gmail.com', '2');
