DROP TABLE IF EXISTS `descargar_index`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `descargar_index` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(50) NOT NULL,
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `disponible` smallint(1) NOT NULL DEFAULT '4',
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

