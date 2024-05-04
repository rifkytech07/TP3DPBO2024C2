/*
Navicat MySQL Data Transfer

Source Server         : koneksi02
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_dpr

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2024-05-03 19:41:53
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `anggota`
-- ----------------------------
DROP TABLE IF EXISTS `anggota`;
CREATE TABLE `anggota` (
  `id_anggota` int(10) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(90) DEFAULT NULL,
  `id_fraksi` int(10) DEFAULT NULL,
  `id_dapil` int(10) DEFAULT NULL,
  PRIMARY KEY (`id_anggota`),
  KEY `id_fraksi` (`id_fraksi`),
  KEY `id_dapil` (`id_dapil`),
  CONSTRAINT `anggota_ibfk_1` FOREIGN KEY (`id_fraksi`) REFERENCES `fraksi` (`id_fraksi`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `anggota_ibfk_2` FOREIGN KEY (`id_dapil`) REFERENCES `dapil` (`id_dapil`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of anggota
-- ----------------------------
INSERT INTO `anggota` VALUES ('1', 'Albert', '3', '1');

-- ----------------------------
-- Table structure for `dapil`
-- ----------------------------
DROP TABLE IF EXISTS `dapil`;
CREATE TABLE `dapil` (
  `id_dapil` int(10) NOT NULL AUTO_INCREMENT,
  `asal_dapil` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_dapil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of dapil
-- ----------------------------
INSERT INTO `dapil` VALUES ('1', 'DKI JAKARTA');
INSERT INTO `dapil` VALUES ('2', 'JAWA BARAT');
INSERT INTO `dapil` VALUES ('3', 'BANTEN');
INSERT INTO `dapil` VALUES ('4', 'SUMATRA BARAT');

-- ----------------------------
-- Table structure for `fraksi`
-- ----------------------------
DROP TABLE IF EXISTS `fraksi`;
CREATE TABLE `fraksi` (
  `id_fraksi` int(10) NOT NULL AUTO_INCREMENT,
  `nama_fraksi` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id_fraksi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of fraksi
-- ----------------------------
INSERT INTO `fraksi` VALUES ('1', 'PDIP');
INSERT INTO `fraksi` VALUES ('2', 'Gerindra');
INSERT INTO `fraksi` VALUES ('3', 'Demokrat');
