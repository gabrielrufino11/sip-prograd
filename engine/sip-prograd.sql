/*
 Navicat Premium Data Transfer

 Source Server         : sip-prograd
 Source Server Type    : MySQL
 Source Server Version : 50505
 Source Host           : localhost
 Source Database       : sip-prograd

 Target Server Type    : MySQL
 Target Server Version : 50505
 File Encoding         : utf-8

 Date: 09/12/2016 08:38:42 AM
*/

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
  PRIMARY KEY (`id_Protocolo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
  `id_Reuniao` int(11) NOT NULL,
  PRIMARY KEY (`id_Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `usuario`
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES ('1', 'DAP', '1234', '1', '1', '');
INSERT INTO `usuario` VALUES ('2', 'DAA', '1234', '1', '1', '');
INSERT INTO `usuario` VALUES ('3', 'DMAA', '1234', '1', '1', '');
INSERT INTO `usuario` VALUES ('4', 'DDLA', '1234', '1', '1', '');
INSERT INTO `usuario` VALUES ('5', 'DERD', '1234', '1', '1', '');
INSERT INTO `usuario` VALUES ('6', 'Pró-Reitor', '1234', '1', '1', '');
INSERT INTO `usuario` VALUES ('7', 'Secretaria', '1234', '1', '1', '');
INSERT INTO `usuario` VALUES ('8', 'COPESE', '1234', '1', '1', '');
COMMIT;

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
  PRIMARY KEY (`id_Reuniao`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
