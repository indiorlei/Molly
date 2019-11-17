/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE ``molly``;
-- CREATE SCHEMA `molly` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE ``molly``;


DROP TABLE IF EXISTS `admin_usuario`;
CREATE TABLE `admin_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`id`));

LOCK TABLES `admin_usuario` WRITE;
/*!40000 ALTER TABLE `admin_usuario` DISABLE KEYS */;

INSERT INTO `admin_usuario` (`id`, `usuario`, `senha`)
VALUES (1,'admin', md5('12345'));

/*!40000 ALTER TABLE `admin_usuario` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `bauletos`;
CREATE TABLE `bauletos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `modelo` VARCHAR(200) NULL,
  `volume` INT NULL,
  `altura` INT NULL,
  `largura` INT NULL,
  `profundidade` INT NULL,
  PRIMARY KEY (`id`));


DROP TABLE IF EXISTS `motofretistas`;
CREATE TABLE `motofretistas` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `cpf` VARCHAR(14) NULL,
  `placa` VARCHAR(10) NULL,
  `bauleto` INT NULL,
  PRIMARY KEY (`id`));


DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `sobrenome` VARCHAR(200) NULL,
  `senha` VARCHAR(32) NOT NULL,
  `email` VARCHAR(200) NOT NULL,
  `cpf` VARCHAR(14) NOT NULL,
  `endereco` VARCHAR(200) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC));


DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(200) NULL,
  `tipo` INT NULL DEFAULT 0 COMMENT '0 = Fechado;\n1 = Aberto;',
  PRIMARY KEY (`id`));

INSERT INTO `status`
    (`id`, `nome`, `tipo`)
VALUES
    (1,'Solicitando Motofretista', 1),
    (2,'Cancelado', 0),
    (3,'Não há Motofretista disponível', 0),
    (4,'Motofretista em trânsito', 1),
    (5,'Coleta realizada', 1),
    (6,'Entrega concluída', 0),
    (7,'Endereço não encontrado', 0);


DROP TABLE IF EXISTS `pedidos`;
CREATE TABLE `pedidos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `status` INT NULL,
  `codRastreio` VARCHAR(45) NULL,
  `id_cliente` INT NOT NULL,
  `id_motofretista` INT NULL,
  `tamanhoBauleto` INT NULL,
  `enderecoRetirada` VARCHAR(200) NULL,
  `enderecoDestino` VARCHAR(200) NULL,
  `tipoEntrega` INT NOT NULL DEFAULT 0 COMMENT '0 = Documento;\n1 = Pacote;',
  `obs` VARCHAR(1000) NULL,
  `dataCriacao` DATETIME NULL,
  `dataModificacao` DATETIME NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `codRastreio_UNIQUE` (`codRastreio` ASC));


/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
