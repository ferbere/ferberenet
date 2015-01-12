-- MySQL dump 10.13  Distrib 5.1.44, for apple-darwin8.11.1 (i386)
--
-- Host: localhost    Database: groundcontrol
-- ------------------------------------------------------
-- Server version	5.1.44

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
-- Table structure for table `agenda_coordina`
--

DROP TABLE IF EXISTS `agenda_coordina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda_coordina` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `coordinador_id` int(5) NOT NULL,
  `dia_id` int(5) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda_coordina`
--

LOCK TABLES `agenda_coordina` WRITE;
/*!40000 ALTER TABLE `agenda_coordina` DISABLE KEYS */;
INSERT INTO `agenda_coordina` VALUES (1,8,1),(2,17,1),(3,25,1),(4,5,2),(5,2,2),(6,26,2),(7,12,3),(8,27,3),(9,28,3),(10,17,4),(11,29,4);
/*!40000 ALTER TABLE `agenda_coordina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda_dia`
--

DROP TABLE IF EXISTS `agenda_dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda_dia` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `congreso` smallint(2) NOT NULL DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda_dia`
--

LOCK TABLES `agenda_dia` WRITE;
/*!40000 ALTER TABLE `agenda_dia` DISABLE KEYS */;
INSERT INTO `agenda_dia` VALUES (1,'Miércoles 18 de julio de 2015',1),(2,'Jueves 19 de julio de 2015',1),(3,'Viernes 20 de julio de 2012',1),(4,'Sábado 21 de julio de 2012',1),(5,'Domingo 22 de julio de 2012',1),(6,'Martes 17 de julio de 2012',2);
/*!40000 ALTER TABLE `agenda_dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda_imparte`
--

DROP TABLE IF EXISTS `agenda_imparte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda_imparte` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `perfil` varchar(250) NOT NULL DEFAULT '',
  `curri` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda_imparte`
--

LOCK TABLES `agenda_imparte` WRITE;
/*!40000 ALTER TABLE `agenda_imparte` DISABLE KEYS */;
/*!40000 ALTER TABLE `agenda_imparte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `agenda_programa`
--

DROP TABLE IF EXISTS `agenda_programa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `agenda_programa` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL DEFAULT '',
  `subtitulo` varchar(250) NOT NULL DEFAULT '',
  `categoria` int(2) NOT NULL DEFAULT '0',
  `imparte` int(3) NOT NULL DEFAULT '0',
  `dirigido` int(2) NOT NULL DEFAULT '0',
  `descripcion` text NOT NULL,
  `lugar` int(2) NOT NULL DEFAULT '0',
  `dia` date NOT NULL DEFAULT '0000-00-00',
  `hora_i` time NOT NULL DEFAULT '00:00:00',
  `hora_t` time NOT NULL DEFAULT '00:00:00',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `agenda_programa`
--

LOCK TABLES `agenda_programa` WRITE;
/*!40000 ALTER TABLE `agenda_programa` DISABLE KEYS */;
INSERT INTO `agenda_programa` VALUES (1,'Entrega de distinciones','',0,0,0,'',0,'0000-00-00','14:00:00','14:45:00');
/*!40000 ALTER TABLE `agenda_programa` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-30 13:13:21
