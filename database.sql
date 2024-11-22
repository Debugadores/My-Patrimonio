-- MariaDB dump 10.19-11.1.3-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mypatrimonio
-- ------------------------------------------------------
-- Server version	11.1.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `empresas`
--

DROP TABLE IF EXISTS `empresas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresas` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `RazaoSocial` varchar(75) DEFAULT NULL,
  `NomeFantasia` varchar(50) DEFAULT NULL,
  `CNPJ` varchar(18) DEFAULT NULL,
  `IE` varchar(14) DEFAULT NULL,
  `InscricaoMunicipal` varchar(14) DEFAULT NULL,
  `Endereco` varchar(75) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Bairro` varchar(35) DEFAULT NULL,
  `Cidade` varchar(50) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL,
  `CEP` varchar(10) DEFAULT NULL,
  `Telefone1` varchar(14) DEFAULT NULL,
  `Telefone2` varchar(14) DEFAULT NULL,
  `Email` varchar(75) DEFAULT NULL,
  `DataCadastro` date DEFAULT NULL,
  `Status` varchar(8) DEFAULT NULL,
  `Complemento` varchar(50) DEFAULT NULL,
  `Ativo` int(11) DEFAULT 1,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresas`
--

LOCK TABLES `empresas` WRITE;
/*!40000 ALTER TABLE `empresas` DISABLE KEYS */;
INSERT INTO `empresas` VALUES
(1,'VISUAL SOFTWARE LTDA','VISUAL SOFTWARE','04.717.891/0001-52','9046011101',NULL,'AV TARUMA','1833','CENTRO','QUEDAS DO IGUAÇU','PR','85.460-000','(46)3532-2005',NULL,'LUCAS@VISUALSOFTWARE.INF.BR','2007-03-29','ATIVA','SL 201',1);
/*!40000 ALTER TABLE `empresas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `genero` varchar(10) DEFAULT NULL,
  `status` varchar(10) DEFAULT 'Ativo',
  `created_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Rafael Zenruths','Zenruths','rafaelzenruths@gmail.com','$2y$10$rtmVrli5uYfn9wnsMuN.jO.qiuwCPl9w8zK/T4YlmYqop5QneVity','47999112233','Masculino','Ativo','2024-02-18 23:27:06'),
(5,'Edson Pillareck','Didi','pillareck@live.com','$2y$10$BvIyHIcK7GaeMhmul3JXD.dsrKDFxMEcXIw2ksvFEhcmCOr4trqd2','46999111111','Masculino','Ativo','2024-11-18 13:44:52'),
(12,'Wesley Martins','Wesley','wmartinsdecampos@gmail.com','$2y$10$UxkOQCb5R8WgjAKwIL6g5.MdurRnMlXnE3ewBEH8AH17d425Pabuq','46999182706','Masculino','Ativo','2024-11-18 23:12:46'),
(14,'sadasd','sdaasd','dds@dasd.com','$2y$10$a4/6pfY90WFj67qSzFBwR.59QmXHxinhL3L/p1PZqB8Sfgc64SOs6','46999111111','Masculino','Ativo','2024-11-19 08:51:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios_perfil`
--

DROP TABLE IF EXISTS `usuarios_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios_perfil` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `CodigoUsuario` int(11) NOT NULL,
  `NomeUsuario` varchar(50) NOT NULL,
  `Img_Perfil` longtext DEFAULT NULL,
  `DataCadastro` date DEFAULT NULL,
  `Telefone` varchar(20) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `RG` varchar(20) DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `DataNascimento` date DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  UNIQUE KEY `CodigoUsuario` (`CodigoUsuario`,`NomeUsuario`),
  KEY `NomeUsuario` (`NomeUsuario`),
  CONSTRAINT `usuarios_perfil_ibfk_1` FOREIGN KEY (`CodigoUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `usuarios_perfil_ibfk_2` FOREIGN KEY (`NomeUsuario`) REFERENCES `users` (`usuario`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_perfil`
--

LOCK TABLES `usuarios_perfil` WRITE;
/*!40000 ALTER TABLE `usuarios_perfil` DISABLE KEYS */;
INSERT INTO `usuarios_perfil` VALUES
(1,1,'Zenruths',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(2,5,'Didi',NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuarios_perfil` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-19 18:00:07
