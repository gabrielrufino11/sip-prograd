/*
 Navicat Premium Data Transfer

 Source Server         : sistema_prograd
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : sistema_prograd

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 09/12/2016 08:38:42 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `protocolo`
-- ----------------------------
DROP TABLE IF EXISTS `protocolo`;
CREATE TABLE `protocolo` (
  `id_Protocolo` int(11) NOT NULL AUTO_INCREMENT,
  `remetente_Protocolo` varchar(100) NOT NULL,
  `id_TipoDocumento` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `descricaoTeor_Protocolo` varchar(1000) NOT NULL,
  `dtEnvio_Protocolo` date NOT NULL,
  `dtRecebimento_Protocolo` date DEFAULT NULL,
  PRIMARY KEY (`id_Protocolo`),
  KEY `FK_tipodocumento` (`id_TipoDocumento`),
  KEY `FK_usuario` (`id_Usuario`),
  CONSTRAINT `FK_tipodocumento` FOREIGN KEY (`id_TipoDocumento`) REFERENCES `tipodocumento` (`id_TipoDocumento`) ON UPDATE CASCADE,
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `protocolo`
-- ----------------------------
BEGIN;
INSERT INTO `protocolo` VALUES ('1', '', '0', '', 'Sintegra 2016', '0000-00-00', '0000-00-00');
COMMIT;

-- ----------------------------
--  Table structure for `tipodocumento`
-- ----------------------------
DROP TABLE IF EXISTS `tipodocumento`;
CREATE TABLE `tipodocumento` (
  `id_TipoDocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nome_TipoDocumento` varchar(200) NOT NULL,
  PRIMARY KEY (`id_TipoDocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tipodocumento`
-- ----------------------------
BEGIN;
INSERT INTO `tipodocumento` VALUES ('1', 'Ofício');
COMMIT;

-- ----------------------------
--  Table structure for `usuario`
-- ----------------------------
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome_Usuario` varchar(100) NOT NULL,
  `senha_Usuario` varchar(40) NOT NULL,
  `status_Usuario` int(1) NOT NULL,
  `permissao_Usuario` int(1) NOT NULL,
  PRIMARY KEY (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `usuario`
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES ('1', 'DAP', '1234', '1', '1'), ('2', 'DAA', '1234', '1', '1'), ('3', 'DMAA', '1234', '1', '1'), ('4', 'DDLA', '1234', '1', '1'), ('5', 'DERD', '1234', '1', '1'), ('6', 'Pró-Reitor', '1234', '1', '1'), ('7', 'Secretaria', '1234', '1', '1'), ('8', 'COPESE', '1234', '1', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;

-- ----------------------------
--  Table structure for `reuniao`
-- ----------------------------
DROP TABLE IF EXISTS `reuniao`;
CREATE TABLE `reuniao` (
  `id_Reuniao` int(11) NOT NULL AUTO_INCREMENT,
  `id_Usuario` int(11) NOT NULL,
  `dt_Reuniao` date NOT NULL,
  `hora_Reuniao` time NOT NULL,
  `local_Reuniao` varchar(100) NOT NULL,
  `pauta_Reuniao` varchar(200) NOT NULL,
  PRIMARY KEY (`id_Reuniao`),
  KEY `FK_usuario` (`id_Usuario`),
  CONSTRAINT `FK_usuario` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
