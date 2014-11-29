CREATE TABLE `prospecta_concrecion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prospecto` int(11) NOT NULL,  
  `vendedor` int(11) NOT NULL,
  `edicion` int(11) NOT NULL DEFAULT 0,
  `anuncio` int(3) NOT NULL DEFAULT 0,
  `pagado` int(1) NOT NULL DEFAULT 0,
  `fecha` DATE NOT NULL,
  `createtime` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
