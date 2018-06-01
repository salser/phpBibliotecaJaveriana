/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : inn

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-06-01 17:09:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for libros
-- ----------------------------
DROP TABLE IF EXISTS `libros`;
CREATE TABLE `libros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) DEFAULT NULL,
  `autor` varchar(150) DEFAULT NULL,
  `edicion` varchar(150) DEFAULT NULL,
  `editorial` varchar(150) DEFAULT NULL,
  `paginas` varchar(150) DEFAULT NULL,
  `isbn` varchar(150) DEFAULT NULL,
  `copias` int(11) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of libros
-- ----------------------------
INSERT INTO `libros` VALUES ('1', 'Harry Potter y la piedra filosofal', 'JK Rowling', '1', 'HP', '352', '31872312-312321-', '50', 'harrypotter.jpg');

-- ----------------------------
-- Table structure for libros_solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `libros_solicitudes`;
CREATE TABLE `libros_solicitudes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `libroid` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `fechainicio` varchar(255) DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `reportecada` int(11) DEFAULT NULL,
  `aprobado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of libros_solicitudes
-- ----------------------------
INSERT INTO `libros_solicitudes` VALUES ('4', '1', '1', '2018-06-01', '0', '0', '1');
INSERT INTO `libros_solicitudes` VALUES ('5', '1', '1', '2018-06-01', '0', '0', '1');
INSERT INTO `libros_solicitudes` VALUES ('6', '1', '1', '2018-06-01', '0', '0', '1');
INSERT INTO `libros_solicitudes` VALUES ('7', '1', '1', '2018-06-01', '0', '0', '1');
