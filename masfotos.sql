CREATE TABLE `catalogo_masfotos` (
  `id` bigint(7) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL DEFAULT '',
  `descripcion` text,
  `imagen` varchar(100) DEFAULT NULL,
  `visible` smallint(1) NOT NULL DEFAULT '1',
  `vincula` int(11) NOT NULL,
  `orden` int(3) NOT NULL DEFAULT '0',
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
