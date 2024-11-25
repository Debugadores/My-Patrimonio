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
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `Codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `DataCadastro` date DEFAULT NULL,
  `Status` varchar(10) DEFAULT NULL,
  `NomeCliente` varchar(100) DEFAULT NULL,
  `RazãoSocial` varchar(100) DEFAULT NULL,
  `CNPJ` varchar(19) DEFAULT NULL,
  `IE` varchar(20) DEFAULT NULL,
  `CPF` varchar(14) DEFAULT NULL,
  `RG` varchar(20) DEFAULT NULL,
  `Tipo` varchar(1) DEFAULT NULL,
  `DataNascimento` date DEFAULT NULL,
  `Genero` varchar(50) DEFAULT NULL,
  `Logradouro` varchar(100) DEFAULT NULL,
  `Numero` varchar(10) DEFAULT NULL,
  `Bairro` varchar(50) DEFAULT NULL,
  `Cidade` varchar(150) DEFAULT NULL,
  `CEP` varchar(15) DEFAULT NULL,
  `UF` varchar(15) DEFAULT NULL,
  `Complemento` varchar(300) DEFAULT NULL,
  `Email` varchar(300) DEFAULT NULL,
  `Telefone` varchar(15) DEFAULT NULL,
  `Ativo` varchar(1) DEFAULT NULL,
  `FisicaJuridica` varchar(1) DEFAULT NULL,
  `NomeResponsavel` varchar(100) DEFAULT NULL,
  `CPF_Responsavel` varchar(14) DEFAULT NULL,
  `RG_Responsavel` varchar(20) DEFAULT NULL,
  `TelefoneResponsavel` varchar(15) DEFAULT NULL,
  `LimiteCredito` varchar(6) DEFAULT NULL,
  `DataAlteracao` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UserExclusao` varchar(50) DEFAULT NULL,
  `DataHoraExclusao` datetime DEFAULT NULL,
  `UsuarioExclusao` varchar(50) DEFAULT NULL,
  `MotivoExclusao` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Tipo` (`Tipo`),
  KEY `Status` (`Status`),
  KEY `NomeCliente` (`NomeCliente`),
  KEY `RazãoSocial` (`RazãoSocial`),
  KEY `CNPJ` (`CNPJ`),
  KEY `CPF` (`CPF`),
  KEY `Ativo` (`Ativo`),
  KEY `FisicaJuridica` (`FisicaJuridica`),
  KEY `DataAlteracao` (`DataAlteracao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `Codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(100) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Senha` varchar(255) NOT NULL,
  `Email` varchar(70) NOT NULL,
  `Status` varchar(10) DEFAULT 'Ativo',
  `DataHoraCriacao` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`Codigo`),
  KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES
(1,'Rafael Zenruths','Zenruths','$2y$10$XyDXuseuzeuDm1s.aY/sJ.r3GFStJ3Lfa4Zq0qkkUVYQJFd8jgIXu','rafaelzenruths@gmail.com','Ativo','2024-11-25 11:34:33'),
(2,'Edson Pillareck','Didi','$2y$10$u.OBBV76MLWRbm5iXimAU.QswpTt2z.Lm./Eg7CXPNmWwvXRxUJ6K','pillareck@live.com','Ativo','2024-11-25 11:45:20');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
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
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios_perfil`
--

LOCK TABLES `usuarios_perfil` WRITE;
/*!40000 ALTER TABLE `usuarios_perfil` DISABLE KEYS */;
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

-- Dump completed on 2024-11-25 11:50:50
