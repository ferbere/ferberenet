-- MySQL dump 10.11
--
-- Host: localhost    Database: orto
-- ------------------------------------------------------
-- Server version	5.0.41

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
-- Table structure for table `noticias`
--

DROP TABLE IF EXISTS `noticias`;
CREATE TABLE `noticias` (
  `id` bigint(7) NOT NULL auto_increment,
  `titulo` varchar(50) NOT NULL default '',
  `subtitulo` varchar(50) NOT NULL default '',
  `contenido` text NOT NULL,
  `banner` smallint(6) NOT NULL default '0',
  `publicado` smallint(1) NOT NULL default '0',
  `autor` int(5) NOT NULL default '0',
  `ruta` smallint(2) NOT NULL default '0',
  `fecha` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `imagen` varchar(50) NOT NULL default '',
  `orden` int(2) NOT NULL default '0',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticias`
--

LOCK TABLES `noticias` WRITE;
/*!40000 ALTER TABLE `noticias` DISABLE KEYS */;
INSERT INTO `noticias` VALUES (1,'Feliz año nuevo','anonuevo','<p>Feliz a&ntilde;o nuevo para todos. Esta secci&oacute;n todav&iacute;a la estamos construyendo; pero ya va quedando. Vuelvan por aqu&iacute; pronto, para enterarse de lo nuevo en la agenda del Instituto Mexicano de Biotecnolog&iacute;a.</p>',3,1,4,7,'2010-12-10 20:04:24','',0);
/*!40000 ALTER TABLE `noticias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-05-28  2:10:51
