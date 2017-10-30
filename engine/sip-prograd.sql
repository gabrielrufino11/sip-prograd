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

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `protocolo`
-- ----------------------------

CREATE TABLE `protocolo` (
  `id_Protocolo` int(11) NOT NULL,
  `remetente_Protocolo` varchar(100) NOT NULL,
  `id_TipoDocumento` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `descricaoTeor_Protocolo` varchar(1000) NOT NULL,
  `dtEnvio_Protocolo` date NOT NULL,
  `dtRecebimento_Protocolo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `protocolo`
-- ----------------------------
BEGIN;
INSERT INTO `protocolo` VALUES ('1', '', '0', '', 'Sintegra 2016', '0000-00-00', '0000-00-00');
COMMIT;

-- ----------------------------
--  Table structure for `tipodocumento`
-- ----------------------------

CREATE TABLE `tipodocumento` (
  `id_TipoDocumento` int(11) NOT NULL,
  `nome_TipoDocumento` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `tipodocumento`
-- ----------------------------
BEGIN;
INSERT INTO `tipodocumento` VALUES ('1', 'Ofício');
COMMIT;

-- ----------------------------
--  Table structure for `usuario`
-- ----------------------------

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `nome_Usuario` varchar(100) NOT NULL,
  `senha_Usuario` varchar(40) NOT NULL,
  `status_Usuario` int(1) NOT NULL,
  `permissao_Usuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `usuario`
-- ----------------------------
BEGIN;
INSERT INTO `usuario` VALUES ('1', 'DAP', '1234', '1', '1'), ('2', 'DAA', '1234', '1', '1'), ('3', 'DMAA', '1234', '1', '1'), ('4', 'DDLA', '1234', '1', '1'), ('5', 'DERD', '1234', '1', '1'), ('6', 'Pró-Reitor', '1234', '1', '1'), ('7', 'Secretaria', '1234', '1', '1'), ('8', 'COPESE', '1234', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `reuniao`
-- ----------------------------

CREATE TABLE `reuniao` (
  `id_Reuniao` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `dt_Reuniao` date NOT NULL,
  `hora_Reuniao` time NOT NULL,
  `local_Reuniao` varchar(100) NOT NULL,
  `pauta_Reuniao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `protocolo`
--
ALTER TABLE `protocolo`
  ADD PRIMARY KEY (`id_Protocolo`);

--
-- Indexes for table `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`id_TipoDocumento`);
  
--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`);
  
--
-- Indexes for table `reuniao`
--
ALTER TABLE `reuniao`
  ADD PRIMARY KEY (`id_Reuniao`);
  
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `protocolo`
--
ALTER TABLE `protocolo`
  MODIFY `id_Protocolo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `id_TipoDocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
--  
-- AUTO_INCREMENT for table `reuniao`
--
ALTER TABLE `reuniao`
  MODIFY `id_Reuniao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
