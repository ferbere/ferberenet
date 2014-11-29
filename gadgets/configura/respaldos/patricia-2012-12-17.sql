-- MySQL dump 10.13  Distrib 5.5.9, for osx10.6 (i386)
--
-- Host: localhost    Database: patricia
-- ------------------------------------------------------
-- Server version	5.5.9

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
-- Table structure for table `articulos_categoria`
--

DROP TABLE IF EXISTS `articulos_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_categoria` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(10) NOT NULL DEFAULT '',
  `belong` int(3) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_categoria`
--

LOCK TABLES `articulos_categoria` WRITE;
/*!40000 ALTER TABLE `articulos_categoria` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos_ediciones`
--

DROP TABLE IF EXISTS `articulos_ediciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_ediciones` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `imagen` varchar(10) NOT NULL,
  `ruta` varchar(159) NOT NULL,
  `liberada` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_ediciones`
--

LOCK TABLES `articulos_ediciones` WRITE;
/*!40000 ALTER TABLE `articulos_ediciones` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos_ediciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos_fotoedicion`
--

DROP TABLE IF EXISTS `articulos_fotoedicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_fotoedicion` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(50) NOT NULL,
  `paginas` varchar(50) DEFAULT NULL,
  `edicion` int(3) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=566 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_fotoedicion`
--

LOCK TABLES `articulos_fotoedicion` WRITE;
/*!40000 ALTER TABLE `articulos_fotoedicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos_fotoedicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos_index`
--

DROP TABLE IF EXISTS `articulos_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_index` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `categoria` smallint(2) NOT NULL DEFAULT '0',
  `titulo` varchar(50) NOT NULL DEFAULT '',
  `subtitulo` varchar(50) NOT NULL DEFAULT '',
  `edicion` int(5) NOT NULL DEFAULT '0',
  `contenido` text NOT NULL,
  `publicado` smallint(1) NOT NULL DEFAULT '0',
  `autor` int(5) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(20) NOT NULL DEFAULT '',
  KEY `id` (`id`),
  FULLTEXT KEY `titulo` (`titulo`,`subtitulo`,`contenido`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_index`
--

LOCK TABLES `articulos_index` WRITE;
/*!40000 ALTER TABLE `articulos_index` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articulos_resaque`
--

DROP TABLE IF EXISTS `articulos_resaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articulos_resaque` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `vincula` int(3) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articulos_resaque`
--

LOCK TABLES `articulos_resaque` WRITE;
/*!40000 ALTER TABLE `articulos_resaque` DISABLE KEYS */;
/*!40000 ALTER TABLE `articulos_resaque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners_dir`
--

DROP TABLE IF EXISTS `banners_dir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners_dir` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(10) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners_dir`
--

LOCK TABLES `banners_dir` WRITE;
/*!40000 ALTER TABLE `banners_dir` DISABLE KEYS */;
INSERT INTO `banners_dir` VALUES (0,'Central',''),(1,'Izq. Superior',''),(2,'Der. Superior',''),(3,'Izq. Inferior',''),(4,'Der. Inferior',''),(5,'Inferior',''),(7,'Superior',''),(6,'Ninguno','');
/*!40000 ALTER TABLE `banners_dir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners_ext`
--

DROP TABLE IF EXISTS `banners_ext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners_ext` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners_ext`
--

LOCK TABLES `banners_ext` WRITE;
/*!40000 ALTER TABLE `banners_ext` DISABLE KEYS */;
INSERT INTO `banners_ext` VALUES (1,'jpg'),(2,'swf'),(3,'gif');
/*!40000 ALTER TABLE `banners_ext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners_index`
--

DROP TABLE IF EXISTS `banners_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners_index` (
  `id` bigint(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(50) DEFAULT NULL,
  `ext` smallint(1) NOT NULL DEFAULT '1',
  `visible` smallint(1) NOT NULL DEFAULT '0',
  `nombre` varchar(250) NOT NULL,
  `contenido` text,
  `orden` int(2) NOT NULL DEFAULT '0',
  `banner` smallint(2) NOT NULL DEFAULT '6',
  `publicacion` smallint(1) NOT NULL DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners_index`
--

LOCK TABLES `banners_index` WRITE;
/*!40000 ALTER TABLE `banners_index` DISABLE KEYS */;
INSERT INTO `banners_index` VALUES (1,'sietemilagros',1,1,'Siete milagros','',1,0,0),(2,'cumulodeplegarias',1,1,'Cúmulo de plegarias','',2,0,1),(3,'plegariaparados',1,1,'Plegaria para dos','',0,0,1);
/*!40000 ALTER TABLE `banners_index` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_categoria`
--

LOCK TABLES `catalogo_categoria` WRITE;
/*!40000 ALTER TABLE `catalogo_categoria` DISABLE KEYS */;
INSERT INTO `catalogo_categoria` VALUES (1,'obra','',0,0),(2,'grabado','',0,0),(3,'ilustraciones','',0,0),(4,'tazas','',0,0);
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
-- Table structure for table `catalogo_ext`
--

DROP TABLE IF EXISTS `catalogo_ext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalogo_ext` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL DEFAULT '',
  `descripcion` varchar(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_ext`
--

LOCK TABLES `catalogo_ext` WRITE;
/*!40000 ALTER TABLE `catalogo_ext` DISABLE KEYS */;
INSERT INTO `catalogo_ext` VALUES (0,'ninguno','sin formato'),(1,'jpg','fotos'),(2,'png','fotos'),(3,'swf','flash'),(4,'mov','video'),(5,'avi','video');
/*!40000 ALTER TABLE `catalogo_ext` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `catalogo_index`
--

LOCK TABLES `catalogo_index` WRITE;
/*!40000 ALTER TABLE `catalogo_index` DISABLE KEYS */;
INSERT INTO `catalogo_index` VALUES (1,'Mi niña de ojos abiertos','<p>&Oacute;leo sobre tela</p>','mininadeojosabiertos','',1,1,1,0,0.00,'120 cm x 100 cm',1,0.00),(2,'Plegaria para dos','<p>&Oacute;leo sobre tela</p>','plegariaparados','',1,1,1,0,52000.00,'100 cm x 120 cm',2,0.00),(5,'Malabarista en busca<br> de tres deseos','<p>Acr&iacute;lico sobre papel.</p>','malabaristaenbuscadetresdeseos','',3,0,1,0,0.00,'40 cm x 30 cm',2,0.00),(6,'Cúmulo de plegarias','<p>&Oacute;leo sobre tela</p>','cumulodeplegarias','',1,1,1,0,0.00,'110 cm x 120 cm',3,0.00),(4,'El hombre que quiere ser pájaro','<p>Acr&iacute;lico sobre papel</p>','elhombrequequiereserpajaro','',3,1,1,0,5000.00,'40 cm x 30 cm',1,0.00),(7,'La niña de mí','<p>&Oacute;leo sobre tela</p>','laninademi','',1,1,1,0,0.00,'110 cm x 120 cm',4,0.00),(8,'La visita','<p>&Oacute;leo sobre tela</p>','lavisita','',1,1,1,0,0.00,'60 cm x 80 cm',5,0.00),(9,'Cuando me voy','<p>&Oacute;leo sobre tela</p>','cuandomevoy','',1,1,1,0,0.00,'110 cm x 120 cm',6,0.00),(10,'Siete milagros','<p>&Oacute;leo sobre tela</p>','sietemilagros','',1,1,1,0,0.00,'100 cm x 120 cm',7,0.00),(11,'El mensajero','<p>&Oacute;leo sobre tela</p>','elmensajero','',1,1,1,0,0.00,'60 cm x 40 cm',8,0.00),(12,'El don de la tapa','<p>&Oacute;leo sobre tela</p>','eldondelatapa','',1,1,1,0,0.00,'100 cm x 80 cm',9,0.00),(13,'Ego','<p>&Oacute;leo sobre tela</p>','ego','',1,1,1,0,0.00,'110 cm x 120 cm',10,0.00),(14,'Lado derecho','<p>&Oacute;leo sobre tela</p>','ladoderecho','',1,1,1,0,0.00,'60 cm x 40 cm',11,0.00),(15,'De la serie Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo01','',3,1,1,0,0.00,'28 cm x 21 cm',3,0.00),(16,'De la serie Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo02','',3,1,1,0,0.00,'28 cm x 21 cm',4,0.00),(17,'Las hermanas','<p>Acr&iacute;lico sobre papel</p>','lashermanas','',3,1,1,0,0.00,'',5,0.00),(18,'Lunas niñas','<p>Acr&iacute;lico sobre papel</p>','lunasninas','',3,1,1,0,0.00,'',6,0.00),(19,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo03','',3,1,1,0,0.00,'28 cm x 21 cm',7,0.00),(20,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo04','',3,1,1,0,0.00,'28 cm x 21 cm',8,0.00),(21,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo05','',3,1,1,0,0.00,'28 cm x 21 cm',9,0.00),(22,'De la serie: Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo06','',3,1,1,0,0.00,'21 cm x 28 cm',10,0.00),(23,'De la serie: Lecciones de vuelo','<p>Acuarela y collage sobre papel</p>','leccionesdevuelo07','',3,1,1,0,0.00,'21 cm x 28 cm',11,0.00),(24,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo08','',3,1,1,0,0.00,'28 cm x 21 cm',12,0.00),(25,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo09','',3,1,1,0,0.00,'28 cm x 21 cm',13,0.00),(26,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo10','',3,1,1,0,0.00,'28 cm x 21 cm',14,0.00),(27,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo11','',3,1,1,0,0.00,'28 cm x 21 cm',15,0.00),(28,'De la serie: Lecciones de vuelo','Acuarela y collage sobre papel','leccionesdevuelo12','',3,1,1,0,0.00,'28 cm x 21 cm',16,0.00),(29,'Taza \"Lecciones de vuelo\"','<p>De la serie Lecciones de vuelo, realizada en el oto&ntilde;o de 2012. Algunas de estas piezas formaron parte de la exposici&oacute;n <em>La elocuencia del arte</em>, en la Galer&iacute;a Adriana Vald&eacute;s. El dise&ntilde;o de la taza corresponde al sitio web 2013.</p>','domi1','Con impresión de acuarela',4,1,1,0,150.00,'12oz',1,0.00);
/*!40000 ALTER TABLE `catalogo_index` ENABLE KEYS */;
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

--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `contenido` text NOT NULL,
  `autor` varchar(100) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'<p>&nbsp;Justicia es el h&aacute;bito de dar a cada quien lo suyo.</p>','Ulpiano'),(2,'Nada hay mÃ¡s injusto que buscar premio en la justicia.','Marco Tulio CicerÃ³n'),(3,'El derecho, si no sirve para hacer la vida mÃ¡s amable, no sirve de nada.','Carlos SaÃºl Menem'),(4,'Quien tiene el derecho de criticar debe tener el corazÃ³n para ayudar.','Abraham Lincoln'),(5,'Ganamos justicia mÃ¡s rÃ¡pidamente, si hacemos justicia a la parte contraria.','Mahatma Gandhi');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coment`
--

DROP TABLE IF EXISTS `coment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL DEFAULT '',
  `remite` varchar(150) NOT NULL DEFAULT '',
  `correo` varchar(50) NOT NULL DEFAULT '',
  `comentario` text,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `relativo` int(11) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coment`
--

LOCK TABLES `coment` WRITE;
/*!40000 ALTER TABLE `coment` DISABLE KEYS */;
INSERT INTO `coment` VALUES (1,'Algo estÃ¡ pasando...','Alicia','','que mis mensajes no aparecen, TRABAJEEEEN!!!','2010-12-03 08:40:26',2);
/*!40000 ALTER TABLE `coment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprar_directorio`
--

DROP TABLE IF EXISTS `comprar_directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprar_directorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) NOT NULL DEFAULT '',
  `passwd` varchar(128) DEFAULT NULL,
  `name` varchar(250) NOT NULL DEFAULT '',
  `address` varchar(250) NOT NULL DEFAULT '',
  `city` varchar(150) NOT NULL DEFAULT '',
  `state` varchar(150) NOT NULL DEFAULT '',
  `country` varchar(20) DEFAULT NULL,
  `zip` varchar(10) NOT NULL DEFAULT '',
  `mail` varchar(35) NOT NULL DEFAULT '',
  `phone` varchar(30) NOT NULL DEFAULT '',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activated` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprar_directorio`
--

LOCK TABLES `comprar_directorio` WRITE;
/*!40000 ALTER TABLE `comprar_directorio` DISABLE KEYS */;
INSERT INTO `comprar_directorio` VALUES (0,'none',NULL,'ninguno','','','',NULL,'','','','2012-11-28 18:26:53',0),(1,'alicia','','Alicia Normanda Lindá','Revolución 199','Santa Anita, Tlaq.,','Jalisco','México','45600','normanda.alicia@gmail.com','10 86 2136','2012-11-08 18:01:21',1),(2,'ferbere','6654ffd4afc21be41bd0aa110eecdb27','Ramsés Figueroa','Revolución 199','Santa Anita, Tlaq.,','Jalisco','México','45600','saargo@gmail.com','10 86 2136','2012-11-08 20:03:55',1),(3,'oliver','acae273a5a5c88b46b36d65a25f5f435','Oliver Palurdo','Revolución 199','Santa Anita, Tlaq.,','Jalisco','México','45600','oliver@ferbere.com','10 86 2136','2012-11-08 20:06:42',1);
/*!40000 ALTER TABLE `comprar_directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprar_index`
--

DROP TABLE IF EXISTS `comprar_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprar_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) NOT NULL,
  `suma` decimal(19,2) NOT NULL DEFAULT '0.00',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `catalogo` int(3) NOT NULL,
  `precio` decimal(19,2) NOT NULL DEFAULT '0.00',
  `desde` date NOT NULL,
  `hasta` date NOT NULL,
  `cliente` int(11) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprar_index`
--

LOCK TABLES `comprar_index` WRITE;
/*!40000 ALTER TABLE `comprar_index` DISABLE KEYS */;
INSERT INTO `comprar_index` VALUES (1,'ferbere',2610.00,'2012-11-29 01:16:42',3,290.00,'2013-01-05','2013-01-14',3),(2,'ferbere',540.00,'2012-11-29 01:52:47',2,270.00,'2013-02-12','2013-02-14',2),(3,'alicia',2960.00,'2012-11-29 01:54:31',1,185.00,'2012-05-01','2012-05-17',1),(4,'claire',3780.00,'2012-11-29 01:57:09',2,270.00,'2012-11-01','2012-11-15',3),(5,'alicia',2430.00,'2012-11-29 16:05:37',2,270.00,'2013-01-05','2013-01-14',3),(6,'claire',2960.00,'2012-11-29 16:06:15',1,185.00,'2012-05-01','2012-05-17',2),(7,'claire',2800.00,'2012-11-29 16:06:48',2,175.00,'2012-05-01','2012-05-17',3),(8,'claire',8388.33,'2012-11-29 16:07:15',1,280.00,'2013-03-15','2013-04-14',1),(9,'claire',35693.13,'2012-11-29 16:07:35',3,195.00,'2012-05-01','2012-10-31',3),(10,'claire',270.00,'2012-11-29 16:07:54',2,270.00,'2012-12-21','2012-12-20',1);
/*!40000 ALTER TABLE `comprar_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `congreso_coordina`
--

DROP TABLE IF EXISTS `congreso_coordina`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `congreso_coordina` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `coordinador_id` int(5) NOT NULL,
  `dia_id` int(5) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `congreso_coordina`
--

LOCK TABLES `congreso_coordina` WRITE;
/*!40000 ALTER TABLE `congreso_coordina` DISABLE KEYS */;
INSERT INTO `congreso_coordina` VALUES (1,8,1),(2,17,1),(3,25,1),(4,5,2),(5,2,2),(6,26,2),(7,12,3),(8,27,3),(9,28,3),(10,17,4),(11,29,4);
/*!40000 ALTER TABLE `congreso_coordina` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `congreso_dia`
--

DROP TABLE IF EXISTS `congreso_dia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `congreso_dia` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `congreso` smallint(2) NOT NULL DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `congreso_dia`
--

LOCK TABLES `congreso_dia` WRITE;
/*!40000 ALTER TABLE `congreso_dia` DISABLE KEYS */;
INSERT INTO `congreso_dia` VALUES (1,'Miércoles 18 de julio de 2012',1),(2,'Jueves 19 de julio de 2012',1),(3,'Viernes 20 de julio de 2012',1),(4,'Sábado 21 de julio de 2012',1),(5,'Domingo 22 de julio de 2012',1),(6,'Martes 17 de julio de 2012',2);
/*!40000 ALTER TABLE `congreso_dia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `congreso_imparte`
--

DROP TABLE IF EXISTS `congreso_imparte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `congreso_imparte` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `imparte` varchar(250) NOT NULL DEFAULT '',
  `perfil` varchar(250) NOT NULL DEFAULT '',
  `curri` text NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `congreso_imparte`
--

LOCK TABLES `congreso_imparte` WRITE;
/*!40000 ALTER TABLE `congreso_imparte` DISABLE KEYS */;
INSERT INTO `congreso_imparte` VALUES (1,'Dr. Salvador Bueno Valenzuela','','Tesorero de la Academia Mexicana de Neurología'),(2,'Dr. Carlos Cuevas','','Presidente de la Academia Mexicana de Neurología'),(3,'Dr. Ulises Aguilar Baturoni','','Fisiologia y doctorado de Fisiologia  H. Syracussa New York Jefe de Neurofisiologia Hospital Juarez 2000 jefe de unidad de fisiologia UNAM. '),(4,'Dr. Francisco Javier Puerta Cuestas','','Neurofisiólogo y Somnólogo. Jefe del Servicio de Neurofisolofìa y de la Unidad de sueño Hospital la Ribera Valencia España. Ex presidente de la Sociedad Española de Sueño.'),(5,'Dra. Guadalupe Bonilla Mejía','','Neurologa IMSS centro medico nacional Neurofisiologia. Unidad Universitaria de Neurofisiologia H. Juarez 2000 Felow sueño Hospital la Ribera, Valencia España'),(6,'Dr. Juan Castrejón Chávez','','Neurólogo IMSS Centro Médico Nacional Neurofisiología. INNN Manuel velasco Suarez. Felos sueño Hospital la Ribera valencia Espana.'),(7,'Dr. Federico Micheli','','Neurólogo, Argentina'),(8,'Dra. Marisela Concepción Parra Bernal','','Neuróloga-Gerontóloga, Presidenta de ANNIMSS. México'),(9,'Dr. Bernardo Ng','','Psiquiatra. Tijuana, BC, México'),(10,'Dr. Francisco Javier Puertas, Dr. Juan Castrejón y Dra. Guadalupe Bonilla','',''),(11,'Dr. Victor M. Rivera-Olmos','','Neurólgo, profesor titular de Neurología, Baylor College of Medicine Maxine Mesinger Multiple Sclerosis Clinic, The Methodist Hospital, Houston, Texas, USA'),(12,'Dr. Miguel Ángel Macías Islas','','Profesor titular del departamento de Neurociencias, Centro Universitario de Ciencias de la Salud, Universidad de Guadalajara. Jefe del Departamento de Neurología, Hospital de Especialidades, Centro Médico Nacional de Occidente IMSS, Guadalajara, Jalisco.'),(13,'Dra. Adriana Horta','','IMSS, México'),(14,'Dr. Victor Rivera y Dr. Leonardo Llamas L.','',''),(21,'Dr. Antonio Rizzoli Córdoba ','','HIM'),(15,'Dra. Karina Vélez','','Neurólogoa IMSS. México'),(16,'Dr. Jaime Ruíz Chávez ','',''),(17,'Dra. Edith Alva Moncayo','','Neuróloga pediatra, H. La Raza IMSS, Secretaria de ANNIMSS. México'),(18,'Dra. María Castro Tarín  ','',''),(19,'Dra. Eunice López Correa ','',''),(20,'Dra. Guadalupe González de la Rosa','',''),(22,'Dr. David King-Stephens','Neurólogo, epileptólogo de los  E.U.','Escuela de Medicina, Universidad LaSalle, México. Internado en Medicina Interna en la Universidad de Yale, EUA (1998-1990).<br>\r\nResidencia en Neurología en la Universidad de Columbia, NY, EUA (1990-1993).<br>\r\nSubespecialidad en Epilepsia, Universidad de Yale, EUA (1993-1996).<br>\r\nDirector de neurofisiología, Co-director Servicio de Eplipsia, California Pacific Medical Center, San Francisco, CA, EUA (1999-presente).<br>\r\nPubliaciones: Neurology, Epilepsia, Epilepsia Research.'),(23,'Dr. Héctor González Usigli','','Subespecialidad en Trastornos del Movimiento desde Julio de 2011, en el departamento de Neurología de la Universidad de Cincinnati<br>\r\n\r\nResidencia en Neurología en el Hospital de Especialidades, Centro Médico Nacional de Occidente, IMSS, Universidad de Guadalajara.<br>\r\n\r\nEstudios de Medicina en la Universidad de Guadalajara, Centro Universitario de Ciencias de la Salud (1992.1998)'),(24,'Por confirmar (EU)','',''),(25,'Dr. Mario Mireles R.','',''),(26,'Dr. Francisco Javier Jiménez Gil','',''),(27,'Dr. Juan Lozano Zárate','',''),(28,'Dr. Roberto Partida Medina','',''),(29,'Dr. Leonardo Eleazar Cruz Alcalá','',''),(30,'Dra. Ingrid Eloísa Estrada Bellmann','','');
/*!40000 ALTER TABLE `congreso_imparte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `congreso_programa`
--

DROP TABLE IF EXISTS `congreso_programa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `congreso_programa` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `tema` varchar(250) NOT NULL,
  `subtema` varchar(250) NOT NULL DEFAULT '',
  `tipo` int(2) NOT NULL DEFAULT '0',
  `imparte` int(3) NOT NULL DEFAULT '0',
  `dirigido` int(2) NOT NULL DEFAULT '0',
  `descripcion` text NOT NULL,
  `lugar` int(2) NOT NULL DEFAULT '0',
  `hora_i` time NOT NULL DEFAULT '00:00:00',
  `hora_t` time NOT NULL DEFAULT '00:00:00',
  `dia` smallint(2) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `congreso_programa`
--

LOCK TABLES `congreso_programa` WRITE;
/*!40000 ALTER TABLE `congreso_programa` DISABLE KEYS */;
INSERT INTO `congreso_programa` VALUES (1,'Inscripción y Registro','',1,0,0,'',0,'12:30:00','20:00:00',1),(2,'Pósters y Trabajos Libres','',2,1,0,'',0,'17:00:00','19:00:00',1),(3,'Inauguración','',1,0,0,'A cargo del Dr. Carlos Cuevas Presidente de la Academia Mexicana de Neurología.<br> Cena de Bienvenida.<br><br>\r\nInvitada especial Fundadora de la ANNIMSS<br> \r\nDra. Teresita Corona Vázquez. Directora de Instituto Nacional de Neurologia y Neurocirugía\r\n',0,'20:00:00','23:00:00',1),(4,'Ontogénesis y fisiología del sueño','',0,3,0,'',0,'08:00:00','08:40:00',2),(5,'Narcolepsia','',0,4,0,'',0,'08:40:00','09:40:00',2),(6,'Parasomnias','',0,5,0,'',0,'09:40:00','10:00:00',2),(7,'Síndrome de piernas inquietas y movimientos periódicos de piernas','',0,4,0,'',0,'10:30:00','11:30:00',2),(8,'Trastornos del sueño en Parkinson y Demencia','',0,6,0,'',0,'11:30:00','12:00:00',2),(9,'Actualidades del tratamiento de Enfermedad de Parkinson','',0,7,0,'',0,'12:00:00','13:00:00',2),(10,'Demencia y Parkinson','',0,2,0,'',0,'13:00:00','13:30:00',2),(11,'Simposio: Demencia de Alzheimer','',0,8,0,'',0,'14:00:00','14:30:00',2),(12,'Simposio: Actualidades del manejo de Alzheimer','',0,9,0,'',0,'14:30:00','15:00:00',2),(13,'Sesión de Casos Clínicos del Trastornos del Sueño','',0,10,0,'',0,'15:00:00','16:00:00',2),(14,'Rifa','',1,0,0,'',0,'16:00:00','17:00:00',2),(15,'Simposio: Actividades en tratamiento de la Esclerosis Múltiple ','',0,11,0,'',0,'08:00:00','09:00:00',3),(16,'Cognición y hallazgos neurofisiológicos en Esclerosis Múltiple','',0,12,0,'',0,'09:00:00','09:30:00',3),(38,'Simposio: Más allá de las manifestaciones motoras de la Enfermedad de Parkinson','',0,23,0,'',0,'11:00:00','11:40:00',3),(18,'Casos clínicos en Esclerosis Múltiple','',0,14,0,'',0,'09:30:00','10:30:00',3),(19,'Receso','',1,1,0,'',0,'10:30:00','11:00:00',3),(20,'Casos clínicos en Enfermedad Parkinson','',0,7,0,'',0,'11:40:00','12:40:00',3),(21,'Receso','',1,1,0,'',0,'12:40:00','13:00:00',3),(22,'Tratamiento profiláctico de la Migraña. Experiencia en Mexico','',0,15,0,'',0,'14:00:00','14:40:00',3),(23,'Rifa','',1,1,0,'',0,'14:40:00','15:00:00',3),(24,'Tiempo libre','',1,1,0,'',0,'15:00:00','20:00:00',3),(25,'Cena y entrega de reconocimientos','',1,1,0,'',0,'20:30:00','23:00:00',3),(26,'Simposio: Controversias en la aplicación de Inmunoglobulinas en Patologia Neurológica','',0,16,0,'',0,'08:00:00','09:00:00',4),(27,'Instrumento diagnóstico de los problemas del desarrollo infantil en México y Encuesta sobre las escalas de evaluación del desarrollo del niño a los asistentes.','',0,21,0,'',0,'09:00:00','09:40:00',4),(28,'Avances sobre tratamiento de Síndrome Epilépticos Catastróficos con los nuevos antiepilépticos Vs convencionales','',0,17,0,'',0,'09:40:00','10:10:00',4),(29,'Receso','',1,1,0,'',0,'11:10:00','11:40:00',4),(30,'TDAH  Avances en fisiopatología y aplicación en terapia farmacológica','',0,18,0,'',0,'11:40:00','12:20:00',4),(31,'Comorbilidades de TDAH en la paciente pediátrica','',0,19,0,'',0,'12:20:00','13:00:00',4),(32,'Tratamiento alternativo en TDAH en niños ','',0,20,0,'',0,'13:00:00','13:40:00',4),(33,'Comida de clausura y premiaciones','',1,1,0,'',0,'14:00:00','17:00:00',4),(34,'Salida','',1,0,0,'',0,'08:00:00','12:00:00',5),(35,'Receso','',1,0,0,'',0,'10:00:00','10:30:00',2),(36,'Receso','',1,0,0,'',0,'13:30:00','14:00:00',2),(37,'Simposio: Avances en el tratamiento de la epilepsia evidencias Vs. experiencias','',0,22,0,'',0,'10:10:00','11:10:00',4),(39,'Simposio: \"Diagnóstico de la Enfermedad de Pompe\" (comida)','',0,24,0,'',0,'13:00:00','14:00:00',3),(40,'Rifa','',1,0,0,'',0,'13:40:00','14:00:00',4),(41,'Incripciones (gratuitas)','',1,0,0,'',0,'08:00:00','09:00:00',6),(42,'Mitos y realidades en Epilepsia','',0,17,0,'',0,'09:00:00','10:00:00',6),(43,'Diagnóstico y tratamiento de Cefaleas','',0,1,0,'',0,'10:00:00','11:00:00',6),(44,'Trastornos de Déficit de Atención en Niños y Adolescentes','',0,17,0,'',0,'11:00:00','11:30:00',6),(45,'Trastornos de Déficit de Atención en Adultos','',0,8,0,'',0,'11:30:00','12:00:00',6),(46,'Mesa Redonda','',1,0,0,'',0,'12:00:00','12:30:00',6),(47,'Receso','',1,0,0,'',0,'12:30:00','13:00:00',6),(48,'Falla de memoria y demencias','',0,8,0,'',0,'13:00:00','14:00:00',6),(49,'Enfermedad de Parkinson, Diagnóstico y tratamiento','',0,30,0,'',0,'14:00:00','15:00:00',6);
/*!40000 ALTER TABLE `congreso_programa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contador`
--

DROP TABLE IF EXISTS `contador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) DEFAULT NULL,
  `hora` varchar(8) DEFAULT NULL,
  `fecha` varchar(20) DEFAULT NULL,
  `segundos` varchar(30) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=228 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contador`
--

LOCK TABLES `contador` WRITE;
/*!40000 ALTER TABLE `contador` DISABLE KEYS */;
INSERT INTO `contador` VALUES (209,'','12:05:38','Fri 16 Nov 2012','1353045938'),(210,'::1','12:07:00','Fri 16 Nov 2012','1353046020'),(211,'::1','06:07:49','Fri 16 Nov 2012','1353067669'),(212,'::1','07:08:52','Fri 16 Nov 2012','1353071332'),(213,'::1','09:07:15','Fri 16 Nov 2012','1353078435'),(214,'::1','01:25:59','Tue 20 Nov 2012','1353439559'),(215,'::1','02:27:10','Tue 20 Nov 2012','1353443230'),(216,'::1','04:23:18','Tue 20 Nov 2012','1353450198'),(217,'::1','10:06:00','Tue 20 Nov 2012','1353470760'),(218,'::1','05:58:14','Mon 26 Nov 2012','1353974294'),(219,'::1','07:33:00','Mon 26 Nov 2012','1353979980'),(220,'::1','12:20:49','Tue 27 Nov 2012','1354040449'),(221,'::1','01:21:21','Tue 27 Nov 2012','1354044081'),(222,'::1','02:21:27','Tue 27 Nov 2012','1354047687'),(223,'::1','03:45:26','Tue 27 Nov 2012','1354052726'),(224,'::1','04:55:27','Tue 27 Nov 2012','1354056927'),(225,'::1','11:56:30','Wed 28 Nov 2012','1354125390'),(226,'::1','07:09:36','Wed 28 Nov 2012','1354151376'),(227,'::1','09:42:03','Thu 29 Nov 2012','1354203723');
/*!40000 ALTER TABLE `contador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corporativa_index`
--

DROP TABLE IF EXISTS `corporativa_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corporativa_index` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(60) NOT NULL DEFAULT '',
  `subtitulo` varchar(50) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `banner` smallint(6) NOT NULL DEFAULT '0',
  `publicado` smallint(1) NOT NULL DEFAULT '0',
  `autor` int(5) NOT NULL DEFAULT '0',
  `ruta` smallint(2) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(50) NOT NULL DEFAULT '',
  `orden` int(2) NOT NULL DEFAULT '0',
  `sistemas2` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corporativa_index`
--

LOCK TABLES `corporativa_index` WRITE;
/*!40000 ALTER TABLE `corporativa_index` DISABLE KEYS */;
INSERT INTO `corporativa_index` VALUES (1,'Currículum','','<h4>Nacida en Guadalajara, México, 1977</h4>\r\n<li>Licenciatura en Artes Visuales en la Universidad de Guadalajara.</li><br>\r\n<li>Ha expuesto Individualmente en la Casa Museo López Portillo,  Centro Cultural Casa Vallarta, en la Casa de Ensueños Art Gallery, en la Galería Ruiz Rojo, Galería Millán en Puerto Vallarta, en la estación Juárez del Tren Eléctrico Urbano, y en el Centro Metropolitano del Adulto Mayor.</li>',0,1,1,4,'2011-03-19 03:18:36','',1,0),(2,'Curri2','jardin','<li> Patricia ha expuesto colectivamente   en La Habana —galería Wilfredo Lamm—, en las ciudades de Tepic, Chihuahua y Los Cabos, B.C.S. y Miami, Florida.</li><br>\r\n<li>En Guadalajara ha estado presente en las galerías: Jorge Martínez, Centro de Arte Moderno, Museo de las Ciudades Hermanas,  Liberarte 2001 y 2002, Galería de Arte Moderno, Panteón de Belén, Galería Chucho Reyes, en el Guadalajara World Trade Center, Museo Trompo Mágico, Museo del Periodismo, en el Espacio del Arte de Televisa Guadalajara y en el CRIT Occidente.</li>\r\n',0,1,1,4,'2011-03-19 03:16:41','',2,0),(3,'curri 3','','<li>Incluida en el libro La pintura jalisciense del siglo XXI, en el libro 101 pintores, 101 poetas.</li><br>\r\n<li>Incluída en el Índice de artístas plásticos en Jalisco (tomo III)  Ha sido seleccionada para el XVI.</li><br>\r\n<li>obtuvo mención honorífica en el XVIII Catálogo de ilustradores infantiles y juveniles 2008, CONACULTA.</li><br>\r\n<li>Ilustró el libro El guardíán de los sueños de la escritora Rossana Curiel Defossé, ed. CONACULTA.</li><br>',0,1,1,4,'2011-07-04 22:06:54','',3,0),(4,'Domicilio','domicilio','<p><br /> <big>Contacto: </big>patricia@patriciagarcia.com.mx<br /> <big>Ubicaci&oacute;n: </big>Santa Anita, Jalisco, M&eacute;xico</p>',0,1,1,0,'0000-00-00 00:00:00','',0,0),(10,'Galería Adriana Valdés','','<p>Aurelio L. Gallardo #215,<br /> Col. Ladr&oacute;n de Guevara<br /> Guadalajara, M&eacute;xico.</p>',4,1,1,0,'2011-07-22 17:22:49','',2,0),(5,'Factor Arte Galería','distribuidores','<p>Av. Rub&eacute;n Dar&iacute;o #4455<br /> Col. Providencia.<br /> Guadalajara, M&eacute;xico</p>',0,0,1,0,'0000-00-00 00:00:00','',2,0),(6,'Tetra Gallery','distribuidor','5975, Sunset Drive (SW 72 ST)<br>\r\nMiami, FL, USA',4,1,1,0,'2011-03-19 03:14:04','',1,0),(7,'Su mensaje...','sumensaje','<p>Su mensaje se ha enviado exitosamente.<br><br>\r\nEn breve nos pondremos en contacto con usted</p>\r\n<p>Muchas gracias.</p>',0,1,1,0,'0000-00-00 00:00:00','',0,0),(8,'Página en construcción','','<p>Todavía estamos construyendo esta página.</p>',1,1,1,0,'0000-00-00 00:00:00','',0,0),(9,'Curri4','','<li>Seleccionada para participar dentro de la Muestra Internacional de Ilustradores Infantiles Sueños de papel organizada por el Museo Interactivo Trompo mágico y el Museo de Arte de Zapopan.</li><br>\r\n<li>Participó en la exposición 50 ideas, 50 motivos, 50 artistas, organizada por Televisa Guadalajara, con motivo de su 50 aniversario.</li>',0,1,1,4,'2011-07-05 13:23:12','',4,0);
/*!40000 ALTER TABLE `corporativa_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corporativa_resaque`
--

DROP TABLE IF EXISTS `corporativa_resaque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corporativa_resaque` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `vincula` int(3) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corporativa_resaque`
--

LOCK TABLES `corporativa_resaque` WRITE;
/*!40000 ALTER TABLE `corporativa_resaque` DISABLE KEYS */;
/*!40000 ALTER TABLE `corporativa_resaque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `corporativa_rutas`
--

DROP TABLE IF EXISTS `corporativa_rutas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `corporativa_rutas` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `corporativa_rutas`
--

LOCK TABLES `corporativa_rutas` WRITE;
/*!40000 ALTER TABLE `corporativa_rutas` DISABLE KEYS */;
INSERT INTO `corporativa_rutas` VALUES (0,'ninguno');
/*!40000 ALTER TABLE `corporativa_rutas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `descargar_index`
--

DROP TABLE IF EXISTS `descargar_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `descargar_index` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `disponible` smallint(1) NOT NULL DEFAULT '4',
  `ext` varchar(5) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `descargar_index`
--

LOCK TABLES `descargar_index` WRITE;
/*!40000 ALTER TABLE `descargar_index` DISABLE KEYS */;
INSERT INTO `descargar_index` VALUES (1,'Junio 2010',1,3,'pdf');
/*!40000 ALTER TABLE `descargar_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `directorio`
--

DROP TABLE IF EXISTS `directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `directorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL DEFAULT '',
  `apellidos` varchar(250) DEFAULT NULL,
  `grupo` int(11) NOT NULL DEFAULT '0',
  `imagen` varchar(10) NOT NULL DEFAULT '',
  `tratamiento` varchar(50) NOT NULL DEFAULT '',
  `apodo` varchar(50) NOT NULL DEFAULT '',
  `empresa` varchar(150) NOT NULL DEFAULT '',
  `cargo` varchar(150) NOT NULL DEFAULT '',
  `telefono_tr1` varchar(30) NOT NULL DEFAULT '',
  `telefono_tr2` varchar(30) NOT NULL DEFAULT '',
  `telefono_pa1` varchar(30) NOT NULL DEFAULT '',
  `telefono_pa2` varchar(30) NOT NULL DEFAULT '',
  `fax_tr` varchar(30) NOT NULL DEFAULT '',
  `fax_pa` varchar(30) NOT NULL DEFAULT '',
  `celular1` varchar(30) NOT NULL DEFAULT '',
  `celular2` varchar(30) NOT NULL DEFAULT '',
  `buscapersonas` varchar(80) NOT NULL DEFAULT '',
  `mail` varchar(50) NOT NULL DEFAULT '',
  `mail2` varchar(50) NOT NULL DEFAULT '',
  `msn` varchar(50) NOT NULL DEFAULT '',
  `google_talk` varchar(50) NOT NULL DEFAULT '',
  `skype` varchar(50) NOT NULL DEFAULT '',
  `facebook` varchar(50) NOT NULL DEFAULT '',
  `twitter` varchar(50) NOT NULL DEFAULT '',
  `direccion_tr` varchar(250) NOT NULL DEFAULT '',
  `ciudad_tr` varchar(150) NOT NULL DEFAULT '',
  `estado_tr` varchar(50) NOT NULL DEFAULT '',
  `cp_tr` varchar(10) NOT NULL DEFAULT '',
  `pais_tr` varchar(30) NOT NULL DEFAULT '',
  `direccion_tr2` varchar(250) NOT NULL DEFAULT '',
  `ciudad_tr2` varchar(150) NOT NULL DEFAULT '',
  `estado_tr2` varchar(50) NOT NULL DEFAULT '',
  `cp_tr2` varchar(10) NOT NULL DEFAULT '',
  `pais_tr2` varchar(30) NOT NULL DEFAULT '',
  `direccion_pa` varchar(250) NOT NULL DEFAULT '',
  `ciudad_pa` varchar(150) NOT NULL DEFAULT '',
  `estado_pa` varchar(50) NOT NULL DEFAULT '',
  `cp_pa` varchar(10) NOT NULL DEFAULT '',
  `pais_pa` varchar(30) NOT NULL DEFAULT '',
  `cumpleanos` date DEFAULT NULL,
  `web` varchar(50) NOT NULL DEFAULT '',
  `aniversario` date DEFAULT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT NULL,
  `notas` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `directorio`
--

LOCK TABLES `directorio` WRITE;
/*!40000 ALTER TABLE `directorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categoria`
--

DROP TABLE IF EXISTS `faq_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_categoria` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(10) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categoria`
--

LOCK TABLES `faq_categoria` WRITE;
/*!40000 ALTER TABLE `faq_categoria` DISABLE KEYS */;
INSERT INTO `faq_categoria` VALUES (0,'Ninguna',''),(1,'General',''),(2,'Unusual','');
/*!40000 ALTER TABLE `faq_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_index`
--

DROP TABLE IF EXISTS `faq_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_index` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(250) NOT NULL,
  `pregunta` text NOT NULL,
  `respuesta` text NOT NULL,
  `frecuencia` int(11) NOT NULL,
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `categoria` int(3) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_index`
--

LOCK TABLES `faq_index` WRITE;
/*!40000 ALTER TABLE `faq_index` DISABLE KEYS */;
INSERT INTO `faq_index` VALUES (1,'First','<p>Tell me about yourself?</p>','<p>This question or something similar usually starts every interview.  Your answer should be well-rehearsed, confidently delivered and last between 3-5 minutes.  It should also:<br />Focus on the areas of most relevance to the job in question<br />Include some impressive achievements e.g. improvements made<br />Convey your enthusiasm for the job<br />Avoid personal or irrelevant information e.g. your children, un-related jobs</p>',0,1,1),(2,'Second','<p>What are your key skills/strengths?</p>','<p>Focus on what you know they are looking for, even if it has been a smaller part of what you have been doing to date.  The job advert or person specification form will give you the information you need about their requirements.</p>',0,1,1),(3,'Third','<p>What are your weaknesses?</p>','<p>Choose a weakness that: Doesn\'t matter for the job e.g. languages for a UK firm.  Is a positive e.g. \"I like to make things happen and get frustrated if too long is spent sitting around discussing it without action\" <br />Used to be a weakness but which you have improved upon e.g. presentations</p>',0,1,1),(7,'Fourth','<p>Why did you leave your last job?</p>','<p>Your answer should be positive and upbeat even if the circumstances were difficult.  If you were made redundant, depersonalise it by talking about company restructuring rather than your individual circumstance.  Never criticise a previous employer no matter how tempting.</p>',0,1,2),(8,'Fitfh','<p>Why do you want this job?</p>','<p>Your answer should reinforce why you are such a good fit for the job and then convey your enthusiasm for the role e.g.</p>\r\n<p>Good match between your skills and their requirements<br />Interested in the product/market/sector<br />Company\'s excellent reputation, exciting challenge etc.<br />Do not say (even if it\'s true) that you just need a job, or you want it because it\'s local.</p>\r\n<p>&nbsp;</p>',0,1,2),(9,'Sixth','<p>Tell me about a difficult scenario at work and how you dealt with it</p>','<p>They are testing how you cope under pressure as well as your problem-solving and communication skills.  Good examples are where you:</p>\r\n<p>Helped resolve or improve a difficult situation<br />Were resilient in adverse conditions<br />Showed emotional intelligence and cool-headedness<br />Avoid any examples which still feel sensitive, because in a high-pressure interview situation, old emotions can easily resurface and throw you off balance.</p>\r\n<p>&nbsp;</p>',0,1,2),(10,'Seventh','<p>Tell me about an achievement of which you are proud?</p>','<p>Choose work-related examples that shows a tangible benefit to the business.   Personal achievements should only be included if they are very impressive or prestigous. More experienced candidates looking for a specific roles eg Sales Director Jobs should focus on closely related areas eg driving an increase in sales or building a successful sales team</p>',0,1,1);
/*!40000 ALTER TABLE `faq_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_categoria`
--

DROP TABLE IF EXISTS `fotos_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_categoria` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(30) DEFAULT NULL,
  `belong` smallint(2) NOT NULL DEFAULT '0',
  `subelong` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_categoria`
--

LOCK TABLES `fotos_categoria` WRITE;
/*!40000 ALTER TABLE `fotos_categoria` DISABLE KEYS */;
INSERT INTO `fotos_categoria` VALUES (1,'Index','',0,0),(2,'BlueCrab Ville vista','landscapes',0,0),(3,'BlueCrab Ville sala','living room',0,0),(4,'BlueCrab Ville terraza','veranda',0,0),(5,'BlueCrab Ville cocina','kitchen',0,0),(6,'BlueCrab Ville ba?os','toilettes',0,0),(7,'BlueCrab Ville recamaras','bedrooms',0,0),(8,'RedCrab Ville vista','landscapes',0,0),(9,'RedCrab Ville sala','living room',0,0),(10,'RedCrab Ville terraza','veranda',0,0),(11,'RedCrab Ville cocina','kitchen',0,0),(12,'RedCrab Ville ba?os','toilettes',0,0),(13,'RedCrab Ville recamaras','bedrooms',0,0),(14,'GreenCrab Ville vista','landscapes',0,0),(15,'GreenCrab Ville sala','living room',0,0),(16,'GreenCrab Ville terraza','veranda',0,0),(17,'GreenCrab Ville cocina','kitchen',0,0),(18,'GreenCrab Ville ba?os','toilettes',0,0),(19,'GreenCrab Ville recamaras','bedrooms',0,0),(20,'Sayulita vista','Sayulita',0,0),(21,'Sayulita whereto','where to',0,0),(22,'Sayulita village','village',0,0),(23,'Sayulita services','services',0,0),(24,'Golf Courses','golf',0,0),(25,'Airport','Airport',0,0),(26,'Activities','activities',0,0),(27,'Sayulita around','close around',0,0),(28,'hosting','',0,0);
/*!40000 ALTER TABLE `fotos_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_dimensiones`
--

DROP TABLE IF EXISTS `fotos_dimensiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_dimensiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `precio` decimal(19,2) NOT NULL DEFAULT '0.00',
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `vincula` int(11) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_dimensiones`
--

LOCK TABLES `fotos_dimensiones` WRITE;
/*!40000 ALTER TABLE `fotos_dimensiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `fotos_dimensiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_ext`
--

DROP TABLE IF EXISTS `fotos_ext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_ext` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL DEFAULT '',
  `descripcion` varchar(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_ext`
--

LOCK TABLES `fotos_ext` WRITE;
/*!40000 ALTER TABLE `fotos_ext` DISABLE KEYS */;
INSERT INTO `fotos_ext` VALUES (7,'ninguno','sin formato'),(1,'jpg','fotos'),(2,'png','fotos'),(3,'swf','flash'),(4,'mov','video'),(5,'avi','video');
/*!40000 ALTER TABLE `fotos_ext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fotos_index`
--

DROP TABLE IF EXISTS `fotos_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fotos_index` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `descripcion` text,
  `imagen` varchar(100) NOT NULL DEFAULT 'sin_titulo',
  `subnombre` varchar(100) DEFAULT NULL,
  `categoria` int(3) NOT NULL DEFAULT '0',
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `ext` smallint(2) NOT NULL DEFAULT '0',
  `bolean` smallint(1) NOT NULL DEFAULT '0',
  `orden` int(3) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fotos_index`
--

LOCK TABLES `fotos_index` WRITE;
/*!40000 ALTER TABLE `fotos_index` DISABLE KEYS */;
INSERT INTO `fotos_index` VALUES (1,'The most astonishing view!','','pajarodefuego01','',1,1,1,0,1),(2,'Sunset','<p>Before to having a beer or a dinner at downtown, to staring at the sea for a while is always reloading.</p>\r\n<p>Calappa &middot; Sayulita, Villas</p>','index6','',1,1,1,0,3),(100,'A beautiful place from the air, on the ground and underwater','<p>Wouldn\'t you love to be in the pool right now?</p>','pajarodefuego02','',1,1,1,0,9),(3,'Staring at the sight from a very cool sofa','','index7','',1,1,1,0,4),(4,'Comfortable beds','','index1','',1,1,1,0,5),(5,'Beautyful villes','','index2','',1,1,1,0,6),(6,'A shinning and wide kitchen','','index3','',1,1,1,0,7),(7,'A magic place at day or night','','index4','',1,1,1,0,8),(8,'An awsome view in the back','<p>Having an orange juice while stare at the unique landscape</p>','bluecrab_vista02','',2,1,1,0,0),(9,'Just for standing there','<p>...for a while, in the morning and only think; or neither that so.</p>','bluecrab_vista04','',2,1,1,0,0),(10,'At Calappa\'s proa','<p>Just as a movie scene, there&acute;s a place where to stand and watch to the ocean.</p>','bluecrab_vista06','',2,1,1,0,0),(11,'A spacious living room','<p>for spending great times with friends or family!</p>','bluecrab_sala01','',3,1,1,0,1),(12,'Lightful furnitured','','bluecrab_sala02','',3,1,1,0,2),(13,'A private pool!','<p>For keeping an eye on kids or just for having a full quiet time.</p>','bluecrab_terraza06','',4,1,1,0,0),(14,'Full equipped kitchen','<p>You get the <em>cuisine</em>, the kitchen is ready!</p>','bluecrab_cocina02','',5,1,1,0,0),(15,'Impeccable toilettes','<p>For feeling just in home</p>','bluecrab_banos01','',6,1,1,0,0),(16,'Principal bedroom','<p>There is a king size bed.</p>','bluecrab_recamaras04','',7,1,1,0,0),(17,'A twin beds bedroom','<p>With its own bathroom</p>','bluecrab_recamaras01','',7,1,1,0,0),(18,'An eye on everything','<p>Landscapes, children in the private pool. Everything within visual range of 360 degrees.</p>','bluecrab_vista05','',2,1,1,0,0),(19,'','','bluecrab_sala03','',3,1,1,0,3),(20,'','','bluecrab_terraza03','',4,1,1,0,0),(21,'','','bluecrab_terraza02','',4,1,1,0,0),(22,'','','bluecrab_terraza05','',4,1,1,0,0),(23,'','','redcrab_terraza01','',10,1,1,0,0),(24,'','','redcrab_terraza02','',10,1,1,0,0),(25,'','','redcrab_cocina01','',11,1,1,0,0),(26,'','','redcrab_cocina02','',11,1,1,0,0),(27,'','','redcrab_cocina04','',11,1,1,0,0),(28,'','','redcrab_cocina03','',11,1,1,0,0),(29,'','','redcrab_bano01','',12,1,1,0,0),(30,'','','redcrab_bano02','',12,1,1,0,0),(31,'','','redcrab_bano03','',12,1,1,0,0),(32,'','','redcrab_bano04','',12,1,1,0,0),(33,'',NULL,'redcrab_recamaras01',NULL,13,1,1,0,0),(34,'',NULL,'redcrab_recamaras02',NULL,13,1,1,0,0),(35,'',NULL,'redcrab_recamaras03',NULL,13,1,1,0,0),(36,'',NULL,'redcrab_recamaras04',NULL,13,1,1,0,0),(37,'',NULL,'redcrab_sala01',NULL,9,1,1,0,0),(38,'',NULL,'redcrab_sala02',NULL,9,1,1,0,0),(39,'',NULL,'redcrab_sala03',NULL,9,1,1,0,0),(40,'Mmmmh!!!','','sayulita_calappa09','',8,1,1,0,2),(41,'',NULL,'greencrab_sala01',NULL,15,1,1,0,0),(42,'',NULL,'greencrab_sala02',NULL,15,1,1,0,0),(43,'',NULL,'greencrab_sala03',NULL,15,1,1,0,0),(44,'',NULL,'greencrab_sala04',NULL,15,1,1,0,0),(45,'',NULL,'greencrab_sala05',NULL,15,1,1,0,0),(46,'',NULL,'greencrab_sala06',NULL,15,1,1,0,0),(47,'','','greencrab_terraza01','',16,1,1,0,0),(48,'','','greencrab_terraza02','',16,1,1,0,0),(49,'','','greencrab_terraza03','',16,1,1,0,0),(50,'','','greencrab_terraza04','',16,1,1,0,0),(51,'','','greencrab_terraza05','',16,1,1,0,0),(52,'','','greencrab_terraza06','',16,1,1,0,0),(53,'','','greencrab_cocina01','',17,1,1,0,0),(54,'','','greencrab_cocina02','',17,1,1,0,0),(55,'','','greencrab_cocina03','',17,1,1,0,0),(56,'','','greencrab_bano01','',18,1,1,0,0),(57,'','','greencrab_bano02','',18,1,1,0,0),(58,'','','greencrab_bano03','',18,1,1,0,0),(59,'','','greencrab_bano04','',18,1,1,0,0),(60,'','','greencrab_comedor01','',15,1,1,0,0),(61,'',NULL,'greencrab_recamaras01',NULL,19,1,1,0,0),(62,'',NULL,'greencrab_recamaras02',NULL,19,1,1,0,0),(63,'',NULL,'greencrab_recamaras03',NULL,19,1,1,0,0),(64,'',NULL,'greencrab_recamaras04',NULL,19,1,1,0,0),(65,'',NULL,'greencrab_recamaras05',NULL,19,1,1,0,0),(66,'',NULL,'greencrab_recamaras06',NULL,19,1,1,0,0),(67,'',NULL,'greencrab_recamaras07',NULL,19,1,1,0,0),(68,'',NULL,'greencrab_recamaras08',NULL,19,1,1,0,0),(69,'',NULL,'greencrab_recamaras09',NULL,19,1,1,0,0),(76,'','','sayulita_whereto02','',21,1,1,0,0),(71,'','','sayulita_beach00','',20,1,1,0,0),(72,'','','sayulita_beach01','',20,1,1,0,0),(73,'','','sayulita_beach03',NULL,20,1,1,0,0),(74,'','','sayulita_beach04',NULL,20,1,1,0,0),(75,'','','sayulita_beach05',NULL,20,1,1,0,0),(77,'','','sayulita_whereto01','',21,1,1,0,0),(78,'','','sayulita_whereto03','',21,1,1,0,0),(79,'','','sayulita_downtown01',NULL,22,1,1,0,0),(80,'','','sayulita_downtown02',NULL,22,1,1,0,0),(81,'','','sayulita_downtown03',NULL,22,1,1,0,0),(82,'','','sayulita_downtown04',NULL,22,1,1,0,0),(83,'','','sayulita_downtown05',NULL,22,1,1,0,0),(84,'','','sayulita_services01',NULL,23,1,1,0,0),(85,'','','sayulita_services02',NULL,23,1,1,0,0),(86,'','','sayulita_services03',NULL,23,1,1,0,0),(87,'','','greencrab_vista01','',14,1,1,0,0),(88,'Vista Vallarta Jack Nicklaus','<p>The Jack Nicklaus designed venue of the 2002 PGA World Cup, opened in April 2001.</p>\r\n<p>Distance from Sayulita: 42.8 km 43 mins</p>','JackNicklaus','http://goo.gl/maps/PH6pR',24,1,1,0,1),(89,'Vista Vallarta Tom Weiskopf','<p>The Tom Weiskopf designed venue of the 2002 PGA World Cup, opened in November 2001.<br />Distance from Sayulita:&nbsp;42.8 km 43 mins</p>','tomweiskopf','http://goo.gl/maps/Sa7PC',24,1,1,0,2),(90,'Paradise Village Golf Course ','<p>El Tigre.- Designed by Robert Von Hagge, with special features like 5 to 6 tees per hole and extra wide fairways.<br />Distance from Sayulita:&nbsp;31.7 km 30 mins</p>','golfcourseeltigre','http://goo.gl/maps/i6ux6',24,1,1,0,3),(91,'Flamingos Golf Course','<p>This established golf course in Puerto Vallarta continues to be a popular choice.<br />Distance from Sayulita:&nbsp;26 km 24 mins</p>','flamingosgolfcourse','http://goo.gl/maps/96mvE',24,1,1,0,4),(92,'Marina Vallarta Golf Club','<p>A Joe Finger designed course, located in the prestigious Marina Vallarta area.<br />Distance from Sayulita:&nbsp;39.9 34 mins</p>','marinavallarta','http://goo.gl/maps/e3gUL',24,1,1,0,5),(93,'Mayan Resorts Golf Nuevo Vallarta','<p>Located on a spectacular piece of oceanfront, and designed by famed architect Jim Lipe, the 7,000 yard par 71, sits between the Sierra Madre Mountains and the blue Pacific Ocean.</p>','mayanresorts','',24,0,1,0,0),(94,'Four Seasons Golf Course Punta Mita','<p>Designed by Jack Nicklas, with a unique 194 yard, par 3 water hazard: the Pacific Ocean.<br />Distance from Sayulita:&nbsp;19.1 37 mins</p>','puntamita','http://goo.gl/maps/9po9D',24,1,1,0,6),(95,'International Airport Puerto Vallarta, Jalisco','<p>Distance from Sayulita: 38.2 km 36 mins</p>','airportpv','http://goo.gl/maps/xqLlp',25,1,1,0,0),(96,'Islas marietas','','islasmarietas','http://www.exploravallarta.com/tours-snorkel-islas-marietas.php',26,1,1,0,0),(97,'San Sebasti?n del Oeste','','sansebastiandeloeste','http://www.exploravallarta.com/san-sebastian-del-oeste.php',26,1,1,0,0),(98,'Vallarta Adventures','<p>Vallarta Adventures is Puerto Vallarta and Nuevo Vallarta\'s premier tour and activity operator. They offer a wide selection of adventure-based tours and excursions with things to do for people of all ages - from zip lines to swimming with dolphins, whale watching to snorkeling, scuba diving to an award winning dinner show.</p>','vallartaadventures','https://www.vallarta-adventures.com',26,1,1,0,0),(99,'Dolphin Discovery','<p>Dolphin Discovery Vallarta is located inside Aquaventuras Park Vallarta, one of the most amazing Vallarta tourist attractions and a favorite among locals and visitors. Nuevo Vallarta, where Aquaventuras Park is located, is just a few minutes away from Puerto Vallarta.</p>\r\n<p>32,9 km 31 minutos (From Sayulita).</p>','dolphindiscovery','http://www.dolphindiscovery.com',26,1,1,0,0),(101,'There are many places over here to discover','','ocean','',27,1,1,0,0),(102,'Places of interest you may find','<p>click on the image to enlarge. You see Calappa destinations very close to, you\'ll want to visit during your stay.</p>','map','',27,1,1,0,0),(103,'A lovely lobby','','lobby1','',28,1,1,0,0),(104,'','','calappa-sayulita1','',1,1,1,0,2),(105,'There is the pool','','sayulita_calappa08','',8,1,1,0,1),(106,'Beautiful and spacious','','sayulita_calappa14','',3,1,1,0,4),(107,'The dining room','<p>in the mirror.</p>','sayulita_calappa73','',9,1,1,0,0),(108,'There is a garden in the backyard,','<p>before from the ocean</p>','sayulita_calappa18','',3,1,1,0,5);
/*!40000 ALTER TABLE `fotos_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gadgets_botones`
--

DROP TABLE IF EXISTS `gadgets_botones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gadgets_botones` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL DEFAULT '',
  `posicion` int(1) NOT NULL DEFAULT '0',
  `imagen` varchar(20) NOT NULL DEFAULT '',
  `ruta` text NOT NULL,
  `ext` smallint(2) NOT NULL DEFAULT '0',
  `submenu` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gadgets_botones`
--

LOCK TABLES `gadgets_botones` WRITE;
/*!40000 ALTER TABLE `gadgets_botones` DISABLE KEYS */;
INSERT INTO `gadgets_botones` VALUES (1,'inicio',4,'inicio','/patricia',2,0),(2,'obra',4,'obra','obra.php',2,0),(3,'ilustraciones',4,'ilustraciones','ilustraciones.php',2,0),(4,'Currículum',4,'curriculum','curriculum.php',2,0);
/*!40000 ALTER TABLE `gadgets_botones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gadgets_botones_admin`
--

DROP TABLE IF EXISTS `gadgets_botones_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gadgets_botones_admin` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `boton` varchar(50) DEFAULT NULL,
  `imagen` varchar(20) NOT NULL DEFAULT '',
  `ext` char(3) NOT NULL DEFAULT '',
  `ruta` varchar(100) NOT NULL,
  `gadget` smallint(2) NOT NULL DEFAULT '0',
  `privilegios` smallint(1) DEFAULT '2',
  `visible` smallint(1) NOT NULL DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=140 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gadgets_botones_admin`
--

LOCK TABLES `gadgets_botones_admin` WRITE;
/*!40000 ALTER TABLE `gadgets_botones_admin` DISABLE KEYS */;
INSERT INTO `gadgets_botones_admin` VALUES (1,'Art&iacute;culo nuevo','new','png','if_articulos.php',2,2,1),(2,'Editar art&iacute;culo','edit','png','bus_articulos.php',2,2,1),(3,'Categor&iacute;a nueva','new','png','if_categoria.php',2,2,1),(4,'Agregar gadget','gadget','png','if_gadgets.php',1,2,1),(5,'Editar gadget','edit','png','bus_gadgets.php',1,2,1),(6,'Nueva informaci&oacute;n','new','png','if_corporativa.php',4,2,1),(7,'Editar informaci&oacute;n','edit','png','bus_corporativa.php',4,2,1),(8,'Agregar foto','camara','png','if_fotos.php',5,2,1),(9,'Administrar fotos','photo','png','bus_fotos.php',5,2,1),(10,'Editar categor&iacute;a','edit','png','bus_categoria.php',2,2,1),(11,'Agregar bot?n Admin','work','png','if_botones_admin.php',1,2,1),(12,'Agregar a cat&aacute;logo','new','png','if_catalogo.php',8,2,1),(13,'Editar cat&aacute;logo','edit','png','bus_catalogo.php',8,2,1),(14,'Nueva categoría','new','png','if_categoria.php',8,2,1),(15,'Editar categoría','edit','png','bus_categoria.php',8,2,1),(16,'Editar Bot?n Admin','edit','png','bus_botones_admin.php',1,2,1),(17,'Agregar submn&uacute;','new','png','if_submenu.php',1,2,1),(18,'Editar submn&uacute;','edit','png','bus_submenu.php',1,2,1),(19,'Agregar banner','new','png','if_banner.php',9,2,1),(20,'Editar banner','edit','png','bus_banner.php',9,2,1),(21,'Nuevo','new','png','if_proyectos.php',10,2,1),(22,'Editar proyecto','edit','png','bus_proyectos.php',10,2,1),(23,'Agregar usuario','new','png','if_autor.php',3,2,1),(24,'Modificar usuario','edit','png','bus_user.php',3,5,1),(25,'Revisar mensajes','camara','png','bus_mensajes.php',6,2,1),(26,'Revisar visitantes','camara','png','contador.php',7,2,1),(27,'Agregar Resaque','resaque','png','if_resaque.php',2,2,0),(28,'chas','none','png','if_corporativa_a.php',4,2,1),(29,'chas2','none','png','ip_corporativa_a.php',4,2,1),(31,'Agregar bot&oacute;n men&uacute;','boton','png','if_botones.php',1,2,1),(32,'Modifica articulo','none','png','if_articulos_a.php',2,2,1),(33,'Modifica categoria','none','png','if_categoria_a.php',2,2,1),(34,'Editar resaque','edit','png','bus_resaque.php',2,2,0),(35,'Editar resaque2','none','png','if_resaque_a.php',2,2,0),(36,'Editar user','none','png','if_autor_a.php',3,2,1),(37,'Editar foto','none','png','if_fotos_a.php',5,2,1),(38,'Revisar mensajes2','none','png','mensaje.php',6,2,1),(39,'borra articulo','none','png','borra.php',2,2,1),(40,'Modifica categoria catalogo','none','png','if_categoria_a.php',8,2,1),(41,'Modifica catalogo','none','png','if_catalogo_a.php',8,2,1),(42,'modificar banner','none','png','if_banner_a.php',9,2,1),(43,'Maqueta','new','png','if_maqueta.php',9,2,1),(44,'Editar maqueta','edit','png','bus_maqueta.php',9,2,1),(45,'Modificar maqueta','none','png','if_maqueta_a.php',9,2,1),(46,'Modificar proyectos','none','png','if_proyectos_a.php',10,2,1),(47,'Agregar publicaci?n','new','png','if_publicaciones.php',11,2,1),(48,'Editar publicaciones','edit','png','bus_publicaciones.php',11,2,1),(49,'Modificar publicaciones','none','png','if_publicaciones_a.php',11,2,1),(50,'Noticia nueva','new','png','if_noticias.php',12,2,1),(51,'Editar noticia','edit','png','bus_noticias.php',12,2,1),(52,'Modificar noticia','none','png','if_noticias_a.php',12,2,1),(53,'Agregar testimonio','new','png','if_testimonios.php',13,2,1),(54,'Editar testimonio','edit','png','bus_testimonios.php',13,2,1),(55,'Modificar testimonio','none','png','if_testimonios_a.php',13,2,1),(56,'configuracion','new','png','if_configura_a.php',14,2,1),(57,'Crear hoja de estilo','new','png','if_templates.php',14,2,1),(58,'templates INVI','none','png','if_templates_a.php',14,2,1),(59,'Editar hoja de estilo','edit','png','bus_templates.php',14,2,1),(60,'Modificar bot&oacute;n men&uacute;','edit','png','bus_botones.php',1,2,1),(61,'botones admin INV','none','png','if_botones_admin_a.php',1,2,1),(62,'Agregar evento','new','png','if_evento.php',15,2,1),(63,'Editar evento','edit','png','bus_evento.php',15,2,1),(64,'evento INVI','none','png','if_evento_a.php',15,2,1),(65,'Agregar ponente','new','png','if_imparte.php',15,2,1),(66,'Editar ponente','edit','png','bus_imparte.php',15,2,1),(67,'ponente INVI','none','png','if_imparte_a.php',15,2,1),(68,'Agregar documento','new','png','if_descargar.php',16,2,1),(69,'Editar descarga','edit','png','bus_descargar.php',16,2,1),(70,'descarga INVI','none','png','if_descargar_a.php',16,2,1),(71,'Agregar video','new','png','if_video.php',17,2,1),(72,'Editar video','edit','png','bus_video.php',17,2,1),(73,'Editar video INVI','none','png','if_video_a.php',17,2,1),(74,'Editar boton INVI','none','png','if_botones_a.php',1,2,1),(75,'editar gadget INVI','none','png','if_gadgets_a.php',1,2,1),(76,'Agregar liga','new','png','if_ligas.php',18,2,1),(77,'Editar ligas','edit','png','bus_ligas.php',18,2,1),(78,'Editar ligas INVI','none','png','if_ligas_a.php',18,2,1),(79,'Agrega patrocinador','new','png','if_patrocinador.php',19,2,1),(80,'Editar Patrocinador','edit','png','bus_patrocinador.php',19,2,1),(81,'Editar Patrocinador INVI','none','png','if_patrocinador_a.php',19,2,1),(83,'Agregar/ editar coordinador','edit','png','bus_coordina.php',15,2,1),(84,'Editar coordina INVI','none','png','if_coordina.php',15,2,1),(85,'Agrega d','new','png','if_dia.php',15,2,1),(86,'Edita d','edit','png','bus_dia.php',15,2,1),(87,'Edita d?a INVI','none','png','if_dia_a.php',15,2,1),(88,'Agregar ruta','new','png','if_ruta.php',4,2,1),(89,'Editar ruta','edit','png','bus_ruta.php',4,2,1),(90,'Editar ruta INVI','none','png','if_ruta_a.php',4,2,1),(91,'Agregar resaque','new','png','if_resaque.php',4,2,1),(92,'Editar resaque','edit','png','bus_resaque.php',4,2,1),(93,'Editar resaque INVI','none','png','if_resaque_a.php',4,2,1),(94,'Movimientos','new','png','registro.php',20,3,1),(128,'Edita FAQ','edit','png','bus_faq.php',22,1,1),(127,'Agrega FAQ','new','png','if_faq.php',22,1,1),(97,'Respaldo DB','new','png','exe_respaldo.php',14,1,1),(123,'Agrega categoria','new','png','if_categoria.php',5,1,1),(99,'Agregar edici?n','new','png','if_ediciones.php',2,2,1),(100,'Editar edici?n','edit','png','bus_ediciones.php',2,2,1),(101,'Edta ediciones INVI','none','png','if_ediciones_a.php',2,2,1),(102,'Agrega foto edici?n','new','png','if_fotoedicion.php',2,2,1),(103,'Edita fotoedicion','edit','png','bus_fotoedicion.php',2,2,1),(104,'Edita fotoedicion INVI','none','png','if_fotoedicion_a.php',2,2,1),(105,'Redactar mail masivo','edit','png','if_massive_mail.php',6,2,1),(106,'Edita mail masivo','edit','png','bus_massive_mail.php',6,2,1),(107,'Crea grupo env','new','png','if_massive_grupo.php',6,2,1),(108,'Edita grupo env','edit','png','bus_massive_grupo.php',6,2,1),(109,'Edita grupo env?o INVI','none','png','if_massive_grupo_a.php',6,2,1),(110,'Editar mail masivo INVI','none','png','if_massive_mail_a.php',6,2,1),(111,'enviado','none','png','enviado.php',6,2,1),(112,'EXE mail INVI','none','png','exe_massive_mail.php',6,2,1),(113,'Agrega contacto','new','png','if_massive_directorio.php',6,2,1),(114,'Editar contacto','edit','png','bus_massive_directorio.php',6,2,1),(115,'Editar contacto INVI','none','png','if_massive_directorio_a.php',6,2,1),(116,'PDF','new','png','pdf.php',6,2,1),(117,'Agrega contenido idioma','new','png','if_content.php',21,1,1),(118,'Editar contenido idioma','edit','png','bus_content.php',21,1,1),(119,'Editar idioma INVI','none','png','if_content_a.php',21,1,1),(120,'Agregar idioma','new','png','if_language.php',21,1,1),(121,'Editar idioma','edit','png','bus_language.php',21,1,1),(122,'Editar idioma INVI','none','png','if_language_a.php',21,1,1),(124,'Edita categoria','edit','png','bus_categoria.php',5,1,1),(125,'Edita catetgoria INVI','none','png','if_categoria_a.php',5,1,1),(126,'Clientes registrados','boton','png','bus_directorio.php',20,3,1),(129,'Edita FAQ INVI','none','png','if_faq_a.php',22,1,1),(130,'TEST','boton','png','ip_registro_a.php',15,1,1),(131,'Agrega categoria','new','png','if_categoria.php',22,1,1),(132,'Edita categoria','edit','png','bus_categoria.php',22,1,1),(133,'Edita categoria INVI','none','png','if_categoria_a.php',22,1,1),(134,'Clientes registrados INVO','none','png','if_directorio_a.php',20,1,1),(135,'Agrega temporada','new','png','if_temporadas.php',8,1,0),(136,'Edita temporadas','edit','png','bus_temporadas.php',8,1,0),(137,'Edita temproada INVI','none','png','if_temporadas_a.php',8,1,1),(138,'Agregar movimiento','new','png','if_registro.php',20,3,1),(139,'Edita registro INVI','none','png','if_registro_a.php',20,2,1);
/*!40000 ALTER TABLE `gadgets_botones_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gadgets_index`
--

DROP TABLE IF EXISTS `gadgets_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gadgets_index` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `gadget` varchar(20) NOT NULL DEFAULT '',
  `ruta` varchar(50) NOT NULL DEFAULT '',
  `visible` smallint(1) NOT NULL DEFAULT '0',
  `privilegios` smallint(1) NOT NULL DEFAULT '1',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gadgets_index`
--

LOCK TABLES `gadgets_index` WRITE;
/*!40000 ALTER TABLE `gadgets_index` DISABLE KEYS */;
INSERT INTO `gadgets_index` VALUES (1,'gadgets','if_gadgets.php',1,1),(2,'articulos','if_articulos.php',1,2),(3,'usuario','if_autor.php',1,5),(4,'corporativa','if_corporativa.php',1,2),(5,'fotos','if_fotos.php',1,2),(6,'mensajes','bus_mensajes.php',1,5),(7,'contador','contador.php',1,2),(8,'catalogo','if_catalogo.php',1,2),(9,'banners','if_banner.php',1,2),(10,'proyectos','if_proyectos.php',1,2),(11,'publicaciones','if_publicaciones.php',1,2),(12,'noticias','if_noticias.php',1,2),(13,'testimonios','if_testimonios.php',1,2),(14,'configura','if_configura_a.php',1,1),(15,'congreso','if_evento.php',1,2),(16,'descargar','if_descargar.php',1,2),(17,'video','if_video.php',1,2),(18,'ligas','if_ligas.php',1,2),(19,'patrocinador','if_patrocinador.php',1,2),(20,'comprar','registro.php',1,5),(21,'language','if_language.php',1,1),(22,'faq','if_faq.php',0,1);
/*!40000 ALTER TABLE `gadgets_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gadgets_posicion`
--

DROP TABLE IF EXISTS `gadgets_posicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gadgets_posicion` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(10) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gadgets_posicion`
--

LOCK TABLES `gadgets_posicion` WRITE;
/*!40000 ALTER TABLE `gadgets_posicion` DISABLE KEYS */;
INSERT INTO `gadgets_posicion` VALUES (0,'Ninguno',''),(1,'Central',''),(2,'Izq. Superior',''),(3,'Der. Superior',''),(4,'Izq. Inferior',''),(5,'Der. Inferior',''),(6,'Inferior',''),(7,'Superior','');
/*!40000 ALTER TABLE `gadgets_posicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_ext`
--

DROP TABLE IF EXISTS `general_ext`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_ext` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL,
  `descripcion` varchar(20) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_ext`
--

LOCK TABLES `general_ext` WRITE;
/*!40000 ALTER TABLE `general_ext` DISABLE KEYS */;
INSERT INTO `general_ext` VALUES (0,'ninguno','sin formato'),(1,'jpg','fotos'),(2,'png','fotos'),(3,'swf','flash'),(4,'mov','video'),(5,'avi','video');
/*!40000 ALTER TABLE `general_ext` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `general_visible`
--

DROP TABLE IF EXISTS `general_visible`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `general_visible` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(5) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_visible`
--

LOCK TABLES `general_visible` WRITE;
/*!40000 ALTER TABLE `general_visible` DISABLE KEYS */;
INSERT INTO `general_visible` VALUES (0,'No'),(1,'Si');
/*!40000 ALTER TABLE `general_visible` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_content`
--

DROP TABLE IF EXISTS `language_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `subtitulo` varchar(50) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `idioma` int(5) NOT NULL,
  `vinculo` int(11) NOT NULL,
  `contenido` text,
  `visible` smallint(1) NOT NULL DEFAULT '0',
  `secc_vincula` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_content`
--

LOCK TABLES `language_content` WRITE;
/*!40000 ALTER TABLE `language_content` DISABLE KEYS */;
INSERT INTO `language_content` VALUES (1,'Calappa','Sayulita · Villas','','',2,1,'<p>Es un conjunto de tres villas de lujo, ubicadas dentro del exclusivo condominio P&aacute;jaro de Fuego*, en Sayulita, Nayarit. Cada una de ellas est&aacute; equipada con aire acondicionado, televisi&oacute;n de pantalla plana en la sala de estar y en cada habitaci&oacute;n, lavavajillas, lavadora, calentador de agua, en fin. Habr&iacute;a que dar click a los botones correspondientes a las villas, para ver en lo particular qu&eacute; ofrece cada una.</p>\r\n<p>El condominio est&aacute; a menos de diez minutos de la playa, caminando; a veinte, en coche, del Aeropuerto Internacional de Puerto Vallarta; y muy pr&oacute;ximo a m&aacute;s de cinco campos de golf e innumerables restaurantes y boutiques. D&eacute; un paseo por las p&aacute;ginas de nuestro sitio, empiece ahora mismo a descubrir la Riviera Nayarit.</p>\r\n<p>&nbsp;</p>',1,''),(2,'','','En donde','fork',2,14,'',1,'gadgets_botones'),(3,'','','Pueblo','village',2,15,'',1,'gadgets_botones'),(4,'','','Servicios','wash',2,16,'',1,'gadgets_botones'),(5,'','','Me gusta','f',2,5,'',1,'gadgets_botones'),(6,'','','Danos un +','g+',2,6,'',1,'gadgets_botones'),(7,'','','Pinea algo','p',2,7,'',1,'gadgets_botones'),(8,'','','Inicio','',2,1,'',1,'gadgets_botones'),(9,'','','Villa BlueCrab','',2,2,'',1,'gadgets_botones'),(10,'','','Villa RedCrab','',2,3,'',1,'gadgets_botones'),(11,'','','Villa GreenCrab','',2,4,'',1,'gadgets_botones'),(12,'','','Disponibilidad','availability',2,11,'',1,'gadgets_botones'),(13,'','','Sayulita','palm',2,8,'',1,'gadgets_botones'),(14,'','','Alrededor','around',2,10,'',1,'gadgets_botones'),(15,'','','Campos de Golf','golf',2,17,'',1,'gadgets_botones'),(16,'','','Aeropuerto','plane',2,18,'',1,'gadgets_botones'),(17,'','','Actividades','dolphin',2,19,'',1,'gadgets_botones'),(18,'','','Contacto','contat',2,9,'',1,'gadgets_botones'),(19,'','','español','es',2,12,'',1,'gadgets_botones'),(20,'','','english','us',2,13,'',1,'gadgets_botones'),(21,'Acerca de Calappa','','','logo',2,5,'<p>Es una voz con que se distingue a un g&eacute;nero de cangrego, pertenecientes a la familia Calappidae, de donde deriva el Cangrejo Real. En la antig&uuml;edad se le relacionaba con la permanencia y la dureza, por asociaci&oacute;n con su caparaz&oacute;n. Puede ser un s&iacute;mbolo de evasi&oacute;n y contemplaci&oacute;n &mdash;locuci&oacute;n espa&ntilde;ola de: pensando en la inmortalidad del cangrejo&mdash;.</p>\r\n<p>En filosof&iacute;a, la inmortalidad del cangrejo se basa en que el cangrejo no tiene conciencia de s&iacute; mismo, y por lo tanto, tampoco tiene conciencia de que su existencia acabar&aacute;. Desde su punto de vista, y a todo efecto pr&aacute;ctico para &eacute;l mismo, el cangrejo es inmortal. Por ello, en la antig&uuml;edad, tanto al cangrejo como al escarabajo se les utiliz&oacute; para representar la inmortalidad.</p>\r\n<p>En ese sentido evasivo, hemos pensado en utilizar al cangrejo. Y concretamente a ese cangrejo rojo, que parece un ba&ntilde;ista saj&oacute;n que ha estado mucho tiempo expuesto al sol.<br />Un ba&ntilde;ista de ojos azules: un gringo. Y la idea es que, sin decirlo, el cliente se sienta invitado por alguien parecido a &eacute;l, que lo mira a los ojos sin parpadear.</p>\r\n<p>&nbsp;</p>',1,'corporativa_index'),(22,'','','Sesión','',2,20,'',1,'gadgets_botones'),(23,'','','Alojamiento','hosting',2,21,'',1,'gadgets_botones'),(24,'','','Testimonios','pen',2,22,'',1,'gadgets_botones'),(25,'','','Preguntas frecuentes','faq',2,23,'',1,'gadgets_botones');
/*!40000 ALTER TABLE `language_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_index`
--

DROP TABLE IF EXISTS `language_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_index` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_index`
--

LOCK TABLES `language_index` WRITE;
/*!40000 ALTER TABLE `language_index` DISABLE KEYS */;
INSERT INTO `language_index` VALUES (1,'english',''),(2,'español','');
/*!40000 ALTER TABLE `language_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ligas_index`
--

DROP TABLE IF EXISTS `ligas_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ligas_index` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `ruta` varchar(150) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `localidad` int(2) NOT NULL DEFAULT '0',
  `imagen` varchar(30) DEFAULT NULL,
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `orden` smallint(2) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ligas_index`
--

LOCK TABLES `ligas_index` WRITE;
/*!40000 ALTER TABLE `ligas_index` DISABLE KEYS */;
INSERT INTO `ligas_index` VALUES (1,'Academia Mexicana de Neurología, A. C.','http://www.neurologia.org.mx','Es un órgano colegiado que agrupa a más de 1,000 Neurólogos nacionales y extranjeros.					',0,'amn.jpg',1,NULL);
/*!40000 ALTER TABLE `ligas_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_index`
--

DROP TABLE IF EXISTS `mails_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `dirigido` varchar(120) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '0',
  `titulo` varchar(255) NOT NULL DEFAULT '',
  `mensaje` text,
  `tiempo` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replies` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `mensaje_id` (`replies`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_index`
--

LOCK TABLES `mails_index` WRITE;
/*!40000 ALTER TABLE `mails_index` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_confirmacion`
--

DROP TABLE IF EXISTS `mails_massive_confirmacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_confirmacion` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_confirmacion`
--

LOCK TABLES `mails_massive_confirmacion` WRITE;
/*!40000 ALTER TABLE `mails_massive_confirmacion` DISABLE KEYS */;
INSERT INTO `mails_massive_confirmacion` VALUES (0,'sin confirmar'),(1,'confirmado'),(2,'no va');
/*!40000 ALTER TABLE `mails_massive_confirmacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_directorio`
--

DROP TABLE IF EXISTS `mails_massive_directorio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_directorio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `grupo` smallint(1) NOT NULL DEFAULT '1',
  `telefono_celular` varchar(20) DEFAULT NULL,
  `telefono_particular` varchar(20) DEFAULT NULL,
  `telefono_trabajo` varchar(20) DEFAULT NULL,
  `invitacion` smallint(1) NOT NULL DEFAULT '1',
  `confirmacion` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_directorio`
--

LOCK TABLES `mails_massive_directorio` WRITE;
/*!40000 ALTER TABLE `mails_massive_directorio` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails_massive_directorio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_directorio_invi`
--

DROP TABLE IF EXISTS `mails_massive_directorio_invi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_directorio_invi` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_directorio_invi`
--

LOCK TABLES `mails_massive_directorio_invi` WRITE;
/*!40000 ALTER TABLE `mails_massive_directorio_invi` DISABLE KEYS */;
INSERT INTO `mails_massive_directorio_invi` VALUES (1,'Sólo mail'),(2,'Con estac.'),(3,'Sin estac.');
/*!40000 ALTER TABLE `mails_massive_directorio_invi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_enviados`
--

DROP TABLE IF EXISTS `mails_massive_enviados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_enviados` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(2) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_enviados`
--

LOCK TABLES `mails_massive_enviados` WRITE;
/*!40000 ALTER TABLE `mails_massive_enviados` DISABLE KEYS */;
INSERT INTO `mails_massive_enviados` VALUES (0,'No'),(1,'Si');
/*!40000 ALTER TABLE `mails_massive_enviados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_grupo`
--

DROP TABLE IF EXISTS `mails_massive_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text,
  `imagen` varchar(50) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_grupo`
--

LOCK TABLES `mails_massive_grupo` WRITE;
/*!40000 ALTER TABLE `mails_massive_grupo` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails_massive_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_mensajes`
--

DROP TABLE IF EXISTS `mails_massive_mensajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_mensajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(150) NOT NULL,
  `mensaje` text,
  `grupo` smallint(2) NOT NULL DEFAULT '1',
  `enviado` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_mensajes`
--

LOCK TABLES `mails_massive_mensajes` WRITE;
/*!40000 ALTER TABLE `mails_massive_mensajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails_massive_mensajes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_phone`
--

DROP TABLE IF EXISTS `mails_massive_phone`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_phone` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `numero` varchar(20) NOT NULL,
  `vincula` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_phone`
--

LOCK TABLES `mails_massive_phone` WRITE;
/*!40000 ALTER TABLE `mails_massive_phone` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails_massive_phone` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails_massive_relacion`
--

DROP TABLE IF EXISTS `mails_massive_relacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails_massive_relacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mensaje_id` int(11) NOT NULL,
  `directorio_id` int(11) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails_massive_relacion`
--

LOCK TABLES `mails_massive_relacion` WRITE;
/*!40000 ALTER TABLE `mails_massive_relacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `mails_massive_relacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticias_index`
--

DROP TABLE IF EXISTS `noticias_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticias_index` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '',
  `subtitulo` varchar(50) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `banner` smallint(6) NOT NULL DEFAULT '0',
  `publicado` smallint(1) NOT NULL DEFAULT '0',
  `autor` int(5) NOT NULL DEFAULT '0',
  `ruta` smallint(2) NOT NULL DEFAULT '0',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `imagen` varchar(50) NOT NULL DEFAULT '',
  `orden` int(2) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticias_index`
--

LOCK TABLES `noticias_index` WRITE;
/*!40000 ALTER TABLE `noticias_index` DISABLE KEYS */;
INSERT INTO `noticias_index` VALUES (1,'Presentación del libro: Recuerdos Circulares','Ficción-Novela','<p>El d&iacute;a veintiocho de octubre de 2012, a las veinte treinta horas, se presentar&aacute; la primera novela de Olga Diaque, en la Fundaci&oacute;n &Aacute;lvarez del Castillo.</p>',0,1,0,0,'2012-09-27 02:18:49','recuerdoscirculares',0);
/*!40000 ALTER TABLE `noticias_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patrocinador_index`
--

DROP TABLE IF EXISTS `patrocinador_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patrocinador_index` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `ruta` varchar(150) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `localidad` int(2) NOT NULL DEFAULT '0',
  `imagen` varchar(30) DEFAULT NULL,
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `orden` smallint(2) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patrocinador_index`
--

LOCK TABLES `patrocinador_index` WRITE;
/*!40000 ALTER TABLE `patrocinador_index` DISABLE KEYS */;
INSERT INTO `patrocinador_index` VALUES (1,'Novartis','http://www.novartis.com.mx/10ybrand/NOVARTIS_WEB_2009/Soft_Templates/index.html','																		',0,'novartis.jpg',1,1),(2,'Probiomed','http://www.probiomed.com.mx/info.php?Lang=es','										',0,'probiomed.jpg',1,2),(3,'GENZYME','http://www.genzyme.com.mx/corp/mxgenz/gzla_p_ci_mx.asp','										',0,'genzyme.jpg',1,5),(4,'Boehringer','http://www.boehringer-ingelheim.com.mx/','										',0,'boehringer.jpg',1,4),(5,'UCB','http://www.ucb.com/worldwide/mexico','															',0,'ucb.jpg',1,3),(6,'Psicopharma','http://www.lokarri.com.mx/portfolio/laboratorios-psicopharma/','										',0,'psicopharma.jpg',1,7),(7,'Behring','http://www.cslbehring.com.mx/homepage','										',0,'behring.jpg',1,6),(8,'Merz Pharma','http://www.merz.com.mx/','										',0,'merz.jpg',0,NULL),(9,'ABBOTT','http://www.abbott.com/global/url/content/en_US/10.40.270:270/general_content/Global_Location_Profile_0055.htm','										',0,'abbott.jpg',1,8),(10,'Lundbeck','http://www.lundbeck.com/mx','															',0,'lundbeck.jpg',1,9),(11,'Comercializadora Electromed','http://www.annimss.org','					',0,'electromed.jpg',1,10),(12,'Cenarem','http://cenarem.com.mx/','					',0,'cenarem.jpg',1,11);
/*!40000 ALTER TABLE `patrocinador_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_index`
--

DROP TABLE IF EXISTS `personal_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_index` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `cargo` varchar(50) NOT NULL DEFAULT '',
  `contacto` varchar(50) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `imagen` varchar(10) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_index`
--

LOCK TABLES `personal_index` WRITE;
/*!40000 ALTER TABLE `personal_index` DISABLE KEYS */;
INSERT INTO `personal_index` VALUES (1,'Dr. David Chung Arceo','Director General','direccion@ortobiologicos.org','','david'),(2,'Dr. Agnet Adeim To','Responsable Sanitario','agnet@otobiologicos.org','',''),(3,'Agnet Adeim Ot','responsable de Calidad','agnet@otobiologicos.org','',''),(4,'Agnet Adeim Ot','Subdirector MÃ©dico','agnet@otobiologicos.org','',''),(5,'Agnet Adeim Ot','Director de Operaciones','agnet@otobiologicos.org','',''),(6,'Agnet Adeim Ot','Equipo de procuraciÃ³n','agnet@otobiologicos.org','',''),(7,'Agnet Adeim Ot','Proceso','agnet@otobiologicos.org','',''),(8,'Agnet Adeim Ot','Acondicionamiento','agnet@otobiologicos.org','',''),(9,'Juan Pedro','Vendedor de Pitayas','pitaya@ortobiologicos.org','','');
/*!40000 ALTER TABLE `personal_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posicion_banner`
--

DROP TABLE IF EXISTS `posicion_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posicion_banner` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(10) NOT NULL DEFAULT '',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posicion_banner`
--

LOCK TABLES `posicion_banner` WRITE;
/*!40000 ALTER TABLE `posicion_banner` DISABLE KEYS */;
INSERT INTO `posicion_banner` VALUES (1,'cabezal'),(2,'bann1'),(3,'bann2'),(4,'bann3'),(5,'bann4'),(6,'footer'),(7,'pestana');
/*!40000 ALTER TABLE `posicion_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyectos_index`
--

DROP TABLE IF EXISTS `proyectos_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyectos_index` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '',
  `contenido` text,
  `cliente` varchar(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `proyecto` varchar(50) DEFAULT NULL,
  `publicado` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyectos_index`
--

LOCK TABLES `proyectos_index` WRITE;
/*!40000 ALTER TABLE `proyectos_index` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyectos_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicaciones_index`
--

DROP TABLE IF EXISTS `publicaciones_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicaciones_index` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '',
  `genero` varchar(50) NOT NULL DEFAULT '',
  `editor` varchar(250) NOT NULL DEFAULT '',
  `ext` varchar(50) NOT NULL DEFAULT '',
  `year` int(4) NOT NULL DEFAULT '0',
  `imagen` varchar(20) DEFAULT NULL,
  `contenido` text,
  `publicado` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicaciones_index`
--

LOCK TABLES `publicaciones_index` WRITE;
/*!40000 ALTER TABLE `publicaciones_index` DISABLE KEYS */;
INSERT INTO `publicaciones_index` VALUES (1,'Adán y Eva','Ficción','SOGEM, escuela de escritores','43',2007,'caleidoscopio','',1),(2,'El gallo se mata la primera noche','Obra de teatro, ficción','SOGEM, escuela de escritores','50',2008,'elgallosemata','',1);
/*!40000 ALTER TABLE `publicaciones_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `submenu`
--

DROP TABLE IF EXISTS `submenu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `submenu` (
  `id` bigint(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `vin` int(3) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `submenu`
--

LOCK TABLES `submenu` WRITE;
/*!40000 ALTER TABLE `submenu` DISABLE KEYS */;
/*!40000 ALTER TABLE `submenu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_general`
--

DROP TABLE IF EXISTS `template_general`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_general` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) DEFAULT NULL,
  `subtitulo` varchar(50) DEFAULT NULL,
  `correo1` varchar(20) DEFAULT NULL,
  `correo2` varchar(20) DEFAULT NULL,
  `correo3` varchar(20) DEFAULT NULL,
  `metatags` text,
  `dia` time DEFAULT NULL,
  `noche` time DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_general`
--

LOCK TABLES `template_general` WRITE;
/*!40000 ALTER TABLE `template_general` DISABLE KEYS */;
INSERT INTO `template_general` VALUES (1,'Patricia García','Pintora · ilustradora','patricia@patriciagar','','','','00:00:00','00:00:00');
/*!40000 ALTER TABLE `template_general` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `template_index`
--

DROP TABLE IF EXISTS `template_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template_index` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `css` varchar(50) NOT NULL,
  `title` varchar(150) NOT NULL DEFAULT '',
  `header` varchar(150) NOT NULL DEFAULT '',
  `navbar` varchar(150) NOT NULL DEFAULT '',
  `logo` varchar(150) NOT NULL DEFAULT '',
  `tit_maincontent` varchar(150) DEFAULT NULL,
  `maincontent` varchar(150) DEFAULT NULL,
  `main_object` varchar(150) DEFAULT NULL,
  `detail` varchar(150) DEFAULT NULL,
  `footer` varchar(150) NOT NULL DEFAULT '',
  `pagina` varchar(20) NOT NULL DEFAULT 'default',
  `bann1` varchar(150) DEFAULT NULL,
  `bann2` varchar(150) DEFAULT NULL,
  `bann3` varchar(150) DEFAULT NULL,
  `bann4` varchar(150) DEFAULT NULL,
  `bann0` varchar(150) DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template_index`
--

LOCK TABLES `template_index` WRITE;
/*!40000 ALTER TABLE `template_index` DISABLE KEYS */;
INSERT INTO `template_index` VALUES (1,'general.css','style/titulo_index.php','','style/nav.php','banners/logo.php','','','banners/bann0_index.php','banners/bann1_index.php','','index','','','','banners/bann4_index.php',''),(5,'style_contacto.css','style/titulo_index.php','style/header_index.php','style/navbar.php','banners/logo.php','','banners/bann0_contacto.php','','banners/detail.php','','contact','banners/bann1_index.php','','','banners/bann4_contacto.php',''),(8,'style_admin.css','Panel de control','style/header.php','style/botones_admin.php','','panel_de_control','contained.php','','style/botones_aux.php','style/footer.php','default',NULL,NULL,NULL,NULL,NULL),(9,'style_admin.css','Panel de control','style/header.php','style/botones_admin.php','','panel_de_control','panel.php',NULL,'style/botones_aux.php','style/footer.php','default',NULL,NULL,NULL,NULL,NULL),(16,'style_obra.css','style/titulo_index.php','','style/nav.php','banners/logo.php','','','banners/bann0_obra.php','banners/bann1_obra.php','','obra','','','','banners/bann4_obra.php',''),(17,'style_ilustraciones.css','style/titulo_index.php','','style/nav.php','banners/logo.php','','','banners/bann0_obra.php','banners/bann1_obra.php','','ilustraciones','','','','banners/bann4_obra.php',''),(22,'style_curriculum.css','style/titulo_index.php','','style/nav.php','banners/logo.php','','','banners/bann0_curri.php','banners/bann1_index.php','','curriculum','','','','banners/bann4_index.php',''),(28,'style_tienda.css','style/titulo_tienda.php','','style/nav.php','banners/logo.php','','','banners/bann0_tienda.php','','','tienda','banners/bann1_tienda.php','','','','');
/*!40000 ALTER TABLE `template_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonios_index`
--

DROP TABLE IF EXISTS `testimonios_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonios_index` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL DEFAULT '',
  `contenido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `orden` int(2) NOT NULL DEFAULT '0',
  `imagen` varchar(50) DEFAULT NULL,
  `visible` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonios_index`
--

LOCK TABLES `testimonios_index` WRITE;
/*!40000 ALTER TABLE `testimonios_index` DISABLE KEYS */;
INSERT INTO `testimonios_index` VALUES (1,'Fornido González de la O','<p>Se denomina Testimonio flaviano (en lat&iacute;n Testimonium flavianum) a los p&aacute;rrafos 63 y 64 del cap&iacute;tulo XVIII del libro Antig&uuml;edades jud&iacute;as (Antiquitates Iudaicae) escrito por el historiador jud&iacute;o Flavio Josefo, en los que se menciona a Jes&uacute;s de Nazaret. Las Antig&uuml;edades jud&iacute;as son una cr&oacute;nica escrita hacia el a&ntilde;o 93 d.C., que narra la historia del pueblo jud&iacute;o de una manera razonablemente completa. Los intereses de Flavio Josefo &mdash;entre ellos ganar la simpat&iacute;a de Roma hacia los jud&iacute;os&mdash; lo llevan, sin embargo, a minimizar las noticias que pudieran resultar conflictivas. Josefo no menciona a los l&iacute;deres del peque&ntilde;o grupo de cristianos (Pedro y Pablo) ni a Mar&iacute;a (la madre de Jes&uacute;s).&nbsp;</p>','2011-05-28 03:12:21',0,'nelson',1),(2,'Una maravilla de producto','<p>Cada vez que lo uso, me dan ganas de comprar unos veinte m&aacute;s. &iexcl;Qu&eacute; maravilla! Siiiiiiii</p>','2011-05-30 18:34:19',0,'phil',0),(3,'Señora Josefina','<p>Del verbo testimoniar: (conjugar) testimonio es: 1&ordf; persona singular (yo) presente indicativo testimoni&oacute; es: 3&ordf; persona singular (&eacute;l/ella/usted) pret&eacute;rito indicativo  Diccionario de la lengua espa&ntilde;ola &copy; 2005 Espasa-Calpe: testimonio  m. Declaraci&oacute;n en que se afirma o asegura alguna cosa: el testimonio de la acusada no convenci&oacute; al jurado. Prueba, justificaci&oacute;n y comprobaci&oacute;n de la certeza o existencia de una cosa: con este libro quiere dar testimonio de la presencia de Dios en su vida. Documento autorizado por notario en que se da fe de un hecho.  Diccionario de la lengua espa&ntilde;ola &copy; 2005 Espasa-Calpe: testimoniar conjugar &rArr;  tr. Servir</p>','2012-07-07 16:28:18',0,'josefina',1);
/*!40000 ALTER TABLE `testimonios_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_index`
--

DROP TABLE IF EXISTS `usuario_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(128) NOT NULL DEFAULT '',
  `passwd` varchar(128) DEFAULT NULL,
  `nombre` varchar(250) NOT NULL DEFAULT '',
  `imagen` varchar(10) NOT NULL DEFAULT '',
  `nombramiento` varchar(50) NOT NULL DEFAULT '',
  `perfil` text NOT NULL,
  `maill` varchar(35) NOT NULL DEFAULT '',
  `telefono` varchar(30) NOT NULL DEFAULT '',
  `celular` varchar(30) NOT NULL DEFAULT '',
  `domicilio` varchar(250) NOT NULL DEFAULT '',
  `poblacion` varchar(150) NOT NULL DEFAULT '',
  `colaborador` smallint(2) NOT NULL DEFAULT '0',
  `privilegios` smallint(2) NOT NULL DEFAULT '5',
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updatetime` timestamp NULL DEFAULT NULL,
  `cp` int(8) DEFAULT NULL,
  `pais` varchar(20) DEFAULT NULL,
  `rfc` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_index`
--

LOCK TABLES `usuario_index` WRITE;
/*!40000 ALTER TABLE `usuario_index` DISABLE KEYS */;
INSERT INTO `usuario_index` VALUES (1,'ferbere','b66a5c2600e9f61e6163bb1051457946','RamsesFigueroa','HellboGDL','webmaster','','ramses@ferbere.com','10·86·2136','11·32·3773','Revolución casi 200','Santa Anita, jalisco',0,1,NULL,NULL,NULL,NULL,NULL),(2,'alicia','e94ef563867e9c9df3fcc999bdb045f5','Alicia Normanda Lindà','','','','','','','','',0,2,'2012-11-28 01:54:03',NULL,NULL,NULL,NULL),(3,'claire','182e500f562c7b95a2ae0b4dd9f47bb2','Claire','','','','','','','','',0,3,'2012-11-29 01:22:24',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuario_index` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_privilegios`
--

DROP TABLE IF EXISTS `usuario_privilegios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_privilegios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_privilegios`
--

LOCK TABLES `usuario_privilegios` WRITE;
/*!40000 ALTER TABLE `usuario_privilegios` DISABLE KEYS */;
INSERT INTO `usuario_privilegios` VALUES (1,'ferbere'),(2,'admin'),(3,'directivo'),(4,'funcionario'),(5,'asociado');
/*!40000 ALTER TABLE `usuario_privilegios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video_index`
--

DROP TABLE IF EXISTS `video_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) DEFAULT NULL,
  `fecha` varchar(150) DEFAULT NULL,
  `liga` varchar(250) DEFAULT NULL,
  `descripcion` text,
  `visible` smallint(1) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video_index`
--

LOCK TABLES `video_index` WRITE;
/*!40000 ALTER TABLE `video_index` DISABLE KEYS */;
INSERT INTO `video_index` VALUES (1,'Niños con TDAH (Padres y Profesores)','Lunes 18 de junio, 2012','http://www.youtube.com/embed/cdlG2VNgTCk','',1),(2,'Enfermedad neurológica por alteración de neurotransmisores','Lunes 18 de junio, 2012','http://www.youtube.com/embed/bICj4qfDAaA','',0),(3,'Enfermedad con importancia en su diagnóstico precoz','Lunes 18 de junio, 2012','http://www.youtube.com/embed/5FQ9GZnZB64','',1),(4,'Enfermedad neurologica subdiagnosticada','Lunes 18 de junio, 2012','http://www.youtube.com/embed/wz3vrdlrLOg','',1);
/*!40000 ALTER TABLE `video_index` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-12-17 19:30:43
