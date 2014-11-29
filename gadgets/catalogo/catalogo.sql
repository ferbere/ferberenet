-- MySQL dump 10.13  Distrib 5.1.44, for apple-darwin8.11.1 (i386)
--
-- Host: localhost    Database: patricia
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
-- Table structure for table `catalogo_asigna`
--

DROP TABLE IF EXISTS `catalogo_asigna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_asigna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` int(5) NOT NULL,
  `pieza` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_asigna`
--

LOCK TABLES `catalogo_asigna` WRITE;
/*!40000 ALTER TABLE `catalogo_asigna` DISABLE KEYS */;
INSERT INTO `catalogo_asigna` VALUES (1,1,1),(2,1,4),(3,1,14),(4,1,11),(9,2,26),(6,2,5),(7,2,9),(8,2,8),(10,2,2),(11,2,4),(12,2,10);
/*!40000 ALTER TABLE `catalogo_asigna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_categoria`
--

DROP TABLE IF EXISTS `catalogo_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_categoria` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(30) DEFAULT NULL,
  `belong` smallint(2) NOT NULL DEFAULT '0',
  `subelong` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_categoria`
--

LOCK TABLES `catalogo_categoria` WRITE;
/*!40000 ALTER TABLE `catalogo_categoria` DISABLE KEYS */;
INSERT INTO `catalogo_categoria` VALUES (1,'obra','',0,0),(2,'grabado','',0,0),(3,'ilustraciones','',0,0);
/*!40000 ALTER TABLE `catalogo_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_dimensiones`
--

DROP TABLE IF EXISTS `catalogo_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_dimensiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `precio` decimal(19,2) NOT NULL DEFAULT '0.00',
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `vincula` int(11) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_dimensiones`
--

LOCK TABLES `catalogo_dimensiones` WRITE;
/*!40000 ALTER TABLE `catalogo_dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `catalogo_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_index`
--

DROP TABLE IF EXISTS `catalogo_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_index` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `descripcion` text,
  `imagen` varchar(100) NOT NULL DEFAULT 'sin_titulo',
  `subnombre` varchar(100) DEFAULT NULL,
  `categoria` int(3) NOT NULL DEFAULT '0',
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `ext` smallint(2) NOT NULL DEFAULT '0',
  `bolean` smallint(1) NOT NULL DEFAULT '0',
  `precio` decimal(19,2) NOT NULL DEFAULT '0.00',
  `dimensiones` varchar(150) DEFAULT NULL,
  `orden` int(8) NOT NULL DEFAULT '0',
  `precio_alta2` decimal(19,2) NOT NULL DEFAULT '0.00',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_index`
--

LOCK TABLES `catalogo_index` WRITE;
/*!40000 ALTER TABLE `catalogo_index` DISABLE KEYS */;
INSERT INTO `catalogo_index` VALUES (1,'Mi niña de ojos abiertos','<p>&Oacute;leo sobre tela</p>','mininadeojosabiertos.jpg','',1,1,1,0,'0.00','120 cm x 100 cm',1,'0.00'),(2,'Plegaria para dos','<p>&Oacute;leo sobre tela</p>','plegariaparados.jpg','',1,1,1,0,'52000.00','100 cm x 120 cm',2,'0.00'),(5,'Malabarista en busca<br> de tres deseos','<p>Acr&iacute;lico sobre papel.</p>','malabaristaenbuscadetresdeseos.jpg','',3,0,1,0,'0.00','40 cm x 30 cm',2,'0.00'),(6,'Cúmulo de plegarias','<p>&Oacute;leo sobre tela</p>','cumulodeplegarias.jpg','',1,1,1,0,'0.00','110 cm x 120 cm',3,'0.00'),(4,'El hombre que <br>quiere ser pájaro','<p>Acr&iacute;lico sobre papel</p>','elhombrequequiereserpajaro.jpg','',3,1,1,0,'5000.00','40 cm x 30 cm',1,'0.00'),(7,'La niña de mí','<p>&Oacute;leo sobre tela</p>','laninademi.jpg','',1,1,1,0,'0.00','110 cm x 120 cm',4,'0.00'),(8,'La visita','<p>&Oacute;leo sobre tela</p>','lavisita.jpg','',1,1,1,0,'0.00','60 cm x 80 cm',5,'0.00'),(9,'Cuando me voy','<p>&Oacute;leo sobre tela</p>','cuandomevoy.jpg','',1,1,1,0,'0.00','110 cm x 120 cm',6,'0.00'),(10,'Siete milagros','<p>&Oacute;leo sobre tela</p>','sietemilagros.jpg','',1,1,1,0,'0.00','100 cm x 120 cm',7,'0.00'),(11,'El mensajero','<p>&Oacute;leo sobre tela</p>','elmensajero.jpg','',1,1,1,0,'0.00','60 cm x 40 cm',8,'0.00'),(12,'El don de la tapa','<p>&Oacute;leo sobre tela</p>','eldondelatapa.jpg','',1,1,1,0,'0.00','100 cm x 80 cm',9,'0.00'),(13,'Ego','<p>&Oacute;leo sobre tela</p>','ego.jpg','',1,1,1,0,'0.00','110 cm x 120 cm',10,'0.00'),(14,'Lado derecho','<p>&Oacute;leo sobre tela</p>','ladoderecho.jpg','',1,1,1,0,'0.00','60 cm x 40 cm',11,'0.00'),(15,'De la serie:<br> Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo01.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',3,'0.00'),(16,'De la serie:<br> Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo02.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',4,'0.00'),(17,'Las hermanas','<p>Acr&iacute;lico sobre papel</p>','lashermanas.jpg','',3,1,1,0,'0.00','',5,'0.00'),(18,'Lunas niñas','<p>Acr&iacute;lico sobre papel</p>','lunasninas.jpg','',3,1,1,0,'0.00','',6,'0.00'),(19,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo03.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',7,'0.00'),(20,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo04.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',8,'0.00'),(21,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo05.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',9,'0.00'),(22,'De la serie:<br> Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo06.jpg','',3,1,1,0,'0.00','21 cm x 28 cm',10,'0.00'),(23,'De la serie:<br> Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo07.jpg','',3,1,1,0,'0.00','21 cm x 28 cm',11,'0.00'),(24,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo08.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',12,'0.00'),(25,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo09.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',13,'0.00'),(26,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo10.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',14,'0.00'),(27,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo11.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',15,'0.00'),(28,'De la serie:<br> Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo12.jpg','',3,1,1,0,'0.00','28 cm x 21 cm',16,'0.00');
/*!40000 ALTER TABLE `catalogo_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_label`
--

DROP TABLE IF EXISTS `catalogo_label`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_label` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_label`
--

LOCK TABLES `catalogo_label` WRITE;
/*!40000 ALTER TABLE `catalogo_label` DISABLE KEYS */;
INSERT INTO `catalogo_label` VALUES (1,'Rolando',''),(2,'Adriana','');
/*!40000 ALTER TABLE `catalogo_label` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `catalogo_temporadas`
--

DROP TABLE IF EXISTS `catalogo_temporadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_temporadas` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_temporadas`
--

LOCK TABLES `catalogo_temporadas` WRITE;
/*!40000 ALTER TABLE `catalogo_temporadas` DISABLE KEYS */;
INSERT INTO `catalogo_temporadas` VALUES (1,'baja','2012-05-01','2012-10-31'),(2,'alta','2012-11-01','2012-12-20'),(3,'altisima','2012-12-21','2013-01-04'),(4,'alta2','2013-01-05','2013-04-30');
/*!40000 ALTER TABLE `catalogo_temporadas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-07-27 23:23:31
