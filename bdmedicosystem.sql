-- MySQL dump 10.16  Distrib 10.1.38-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: bdmedicosystem
-- ------------------------------------------------------
-- Server version	10.1.38-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblgenero`
--

DROP TABLE IF EXISTS `tblgenero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblgenero` (
  `idgenero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idgenero`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblgenero`
--

LOCK TABLES `tblgenero` WRITE;
/*!40000 ALTER TABLE `tblgenero` DISABLE KEYS */;
INSERT INTO `tblgenero` VALUES (1,'Masculino');
/*!40000 ALTER TABLE `tblgenero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblhistorial`
--

DROP TABLE IF EXISTS `tblhistorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblhistorial` (
  `idhistoria` int(11) NOT NULL AUTO_INCREMENT,
  `paciente` int(11) NOT NULL,
  `medico` int(11) NOT NULL,
  `observacion` text NOT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idhistoria`),
  KEY `paciente` (`paciente`),
  KEY `medico` (`medico`),
  CONSTRAINT `tblhistorial_ibfk_1` FOREIGN KEY (`paciente`) REFERENCES `tblpacientes` (`numerodocumento`),
  CONSTRAINT `tblhistorial_ibfk_2` FOREIGN KEY (`medico`) REFERENCES `tblmedicos` (`numerodocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblhistorial`
--

LOCK TABLES `tblhistorial` WRITE;
/*!40000 ALTER TABLE `tblhistorial` DISABLE KEYS */;
INSERT INTO `tblhistorial` VALUES (14,1020392960,1020075808,'Prueba de guardado 2','2020-03-05');
/*!40000 ALTER TABLE `tblhistorial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblmedicos`
--

DROP TABLE IF EXISTS `tblmedicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblmedicos` (
  `numerodocumento` int(11) NOT NULL,
  `tipodoc` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`numerodocumento`),
  KEY `tipodoc` (`tipodoc`),
  CONSTRAINT `tblmedicos_ibfk_1` FOREIGN KEY (`tipodoc`) REFERENCES `tbltipodocumento` (`idtipodoc`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblmedicos`
--

LOCK TABLES `tblmedicos` WRITE;
/*!40000 ALTER TABLE `tblmedicos` DISABLE KEYS */;
INSERT INTO `tblmedicos` VALUES (1000758088,1,'Jack'),(1020075808,1,'Louis');
/*!40000 ALTER TABLE `tblmedicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblpacientes`
--

DROP TABLE IF EXISTS `tblpacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tblpacientes` (
  `numerodocumento` int(11) NOT NULL,
  `tipodoc` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `genero` int(11) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  PRIMARY KEY (`numerodocumento`),
  KEY `tipodoc` (`tipodoc`),
  KEY `genero` (`genero`),
  CONSTRAINT `tblpacientes_ibfk_1` FOREIGN KEY (`tipodoc`) REFERENCES `tbltipodocumento` (`idtipodoc`),
  CONSTRAINT `tblpacientes_ibfk_2` FOREIGN KEY (`genero`) REFERENCES `tblgenero` (`idgenero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblpacientes`
--

LOCK TABLES `tblpacientes` WRITE;
/*!40000 ALTER TABLE `tblpacientes` DISABLE KEYS */;
INSERT INTO `tblpacientes` VALUES (1000758088,1,'Lida','Londoño',1,29),(1020300480,1,'Juan Jose','Arias',1,17),(1020392960,1,'Kevin','Arias',1,18);
/*!40000 ALTER TABLE `tblpacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbltipodocumento`
--

DROP TABLE IF EXISTS `tbltipodocumento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbltipodocumento` (
  `idtipodoc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`idtipodoc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbltipodocumento`
--

LOCK TABLES `tbltipodocumento` WRITE;
/*!40000 ALTER TABLE `tbltipodocumento` DISABLE KEYS */;
INSERT INTO `tbltipodocumento` VALUES (1,'Cedula');
/*!40000 ALTER TABLE `tbltipodocumento` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-05 18:59:48
