-- MySQL dump 10.13  Distrib 5.1.44, for apple-darwin8.11.1 (i386)
--
-- Host: localhost    Database: ferberenet
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
) ENGINE=MyISAM AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gadgets_botones_admin`
--

LOCK TABLES `gadgets_botones_admin` WRITE;
/*!40000 ALTER TABLE `gadgets_botones_admin` DISABLE KEYS */;
INSERT INTO `gadgets_botones_admin` VALUES (1,'Art&iacute;culo nuevo','new','png','if_articulos.php',2,2,1),(2,'Editar art&iacute;culo','fa-pencil-square-o','png','bus_articulos.php',2,2,1),(3,'Categor&iacute;a nueva','new','png','if_categoria.php',2,2,1),(4,'Agregar gadget','gadget','png','if_gadgets.php',1,2,1),(5,'Editar gadget','fa-pencil-square-o','png','bus_gadgets.php',1,2,1),(6,'Nueva informaci&oacute;n','new','png','if_corporativa.php',4,2,1),(7,'Editar informaci&oacute;n','fa-pencil-square-o','png','bus_corporativa.php',4,2,1),(8,'Agregar foto','camara','png','if_fotos.php',5,2,1),(9,'Administrar fotos','photo','png','bus_fotos.php',5,2,1),(10,'Editar categor&iacute;a','fa-pencil-square-o','png','bus_categoria.php',2,2,1),(11,'Agregar bot?n Admin','work','png','if_botones_admin.php',1,2,1),(12,'Agregar a cat&aacute;logo','new','png','if_catalogo.php',8,2,1),(13,'Editar cat&aacute;logo','fa-pencil-square-o','png','bus_catalogo.php',8,2,1),(14,'Nueva categorÃ­a','new','png','if_categoria.php',8,2,1),(15,'Editar categorÃ­a','fa-pencil-square-o','png','bus_categoria.php',8,2,1),(16,'Editar Bot?n Admin','fa-pencil-square-o','png','bus_botones_admin.php',1,2,1),(17,'Agregar submn&uacute;','new','png','if_submenu.php',1,2,1),(18,'Editar submn&uacute;','fa-pencil-square-o','png','bus_submenu.php',1,2,1),(19,'Agregar banner','new','png','if_banner.php',9,2,1),(20,'Editar banner','fa-pencil-square-o','png','bus_banner.php',9,2,1),(21,'Nuevo','new','png','if_proyectos.php',10,2,1),(22,'Editar proyecto','fa-pencil-square-o','png','bus_proyectos.php',10,2,1),(23,'Agregar usuario','new','png','if_autor.php',3,2,1),(24,'Modificar usuario','fa-pencil-square-o','png','bus_user.php',3,5,1),(25,'Revisar mensajes','camara','png','bus_mensajes.php',6,2,1),(26,'Revisar visitantes','camara','png','contador.php',7,2,1),(27,'Agregar Resaque','resaque','png','if_resaque.php',2,2,0),(28,'chas','none','png','if_corporativa_a.php',4,2,1),(29,'chas2','none','png','ip_corporativa_a.php',4,2,1),(31,'Agregar bot&oacute;n men&uacute;','boton','png','if_botones.php',1,2,1),(32,'Modifica articulo','none','png','if_articulos_a.php',2,2,1),(33,'Modifica categoria','none','png','if_categoria_a.php',2,2,1),(34,'Editar resaque','fa-pencil-square-o','png','bus_resaque.php',2,2,0),(35,'Editar resaque2','none','png','if_resaque_a.php',2,2,0),(36,'Editar user','none','png','if_autor_a.php',3,2,1),(37,'Editar foto','none','png','if_fotos_a.php',5,2,1),(38,'Revisar mensajes2','none','png','mensaje.php',6,2,1),(39,'borra articulo','none','png','borra.php',2,2,1),(40,'Modifica categoria catalogo','none','png','if_categoria_a.php',8,2,1),(41,'Modifica catalogo','none','png','if_catalogo_a.php',8,2,1),(42,'modificar banner','none','png','if_banner_a.php',9,2,1),(43,'Maqueta','new','png','if_maqueta.php',9,2,1),(44,'Editar maqueta','fa-pencil-square-o','png','bus_maqueta.php',9,2,1),(45,'Modificar maqueta','none','png','if_maqueta_a.php',9,2,1),(46,'Modificar proyectos','none','png','if_proyectos_a.php',10,2,1),(47,'Agregar publicaci?n','new','png','if_publicaciones.php',11,2,1),(48,'Editar publicaciones','fa-pencil-square-o','png','bus_publicaciones.php',11,2,1),(49,'Modificar publicaciones','none','png','if_publicaciones_a.php',11,2,1),(50,'Noticia nueva','new','png','if_noticias.php',12,2,1),(51,'Editar noticia','fa-pencil-square-o','png','bus_noticias.php',12,2,1),(52,'Modificar noticia','none','png','if_noticias_a.php',12,2,1),(53,'Agregar testimonio','new','png','if_testimonios.php',13,2,1),(54,'Editar testimonio','fa-pencil-square-o','png','bus_testimonios.php',13,2,1),(55,'Modificar testimonio','none','png','if_testimonios_a.php',13,2,1),(56,'configuracion','new','png','if_configura_a.php',14,2,1),(57,'Crear hoja de estilo','new','png','if_templates.php',14,2,1),(58,'templates INVI','none','png','if_templates_a.php',14,2,1),(59,'Editar hoja de estilo','fa-pencil-square-o','png','bus_templates.php',14,2,1),(60,'Modificar bot&oacute;n men&uacute;','fa-pencil-square-o','png','bus_botones.php',1,2,1),(61,'botones admin INV','none','png','if_botones_admin_a.php',1,2,1),(62,'Agregar evento','new','png','if_evento.php',15,2,1),(63,'Editar evento','fa-pencil-square-o','png','bus_evento.php',15,2,1),(64,'evento INVI','none','png','if_evento_a.php',15,2,1),(65,'Agregar ponente','new','png','if_imparte.php',15,2,1),(66,'Editar ponente','fa-pencil-square-o','png','bus_imparte.php',15,2,1),(67,'ponente INVI','none','png','if_imparte_a.php',15,2,1),(68,'Agregar documento','new','png','if_descargar.php',16,2,1),(69,'Editar descarga','fa-pencil-square-o','png','bus_descargar.php',16,2,1),(70,'descarga INVI','none','png','if_descargar_a.php',16,2,1),(71,'Agregar video','new','png','if_video.php',17,2,1),(72,'Editar video','fa-pencil-square-o','png','bus_video.php',17,2,1),(73,'Editar video INVI','none','png','if_video_a.php',17,2,1),(74,'Editar boton INVI','none','png','if_botones_a.php',1,2,1),(75,'editar gadget INVI','none','png','if_gadgets_a.php',1,2,1),(76,'Agregar liga','new','png','if_ligas.php',18,2,1),(77,'Editar ligas','fa-pencil-square-o','png','bus_ligas.php',18,2,1),(78,'Editar ligas INVI','none','png','if_ligas_a.php',18,2,1),(79,'Agrega patrocinador','new','png','if_patrocinador.php',19,2,1),(80,'Editar Patrocinador','fa-pencil-square-o','png','bus_patrocinador.php',19,2,1),(81,'Editar Patrocinador INVI','none','png','if_patrocinador_a.php',19,2,1),(83,'Agregar/ editar coordinador','fa-pencil-square-o','png','bus_coordina.php',15,2,1),(84,'Editar coordina INVI','none','png','if_coordina.php',15,2,1),(85,'Agrega d','new','png','if_dia.php',15,2,1),(86,'Edita d','fa-pencil-square-o','png','bus_dia.php',15,2,1),(87,'Edita d?a INVI','none','png','if_dia_a.php',15,2,1),(88,'Agregar ruta','new','png','if_ruta.php',4,2,1),(89,'Editar ruta','fa-pencil-square-o','png','bus_ruta.php',4,2,1),(90,'Editar ruta INVI','none','png','if_ruta_a.php',4,2,1),(91,'Agregar resaque','new','png','if_resaque.php',4,2,1),(92,'Editar resaque','fa-pencil-square-o','png','bus_resaque.php',4,2,1),(93,'Editar resaque INVI','none','png','if_resaque_a.php',4,2,1),(94,'Movimientos','new','png','registro.php',20,3,1),(128,'Edita FAQ','fa-pencil-square-o','png','bus_faq.php',22,1,1),(127,'Agrega FAQ','new','png','if_faq.php',22,1,1),(97,'Respaldo DB','new','png','exe_respaldo.php',14,1,1),(123,'Agrega categoria','new','png','if_categoria.php',5,1,1),(99,'Agregar edici?n','new','png','if_ediciones.php',2,2,0),(100,'Editar edici?n','fa-pencil-square-o','png','bus_ediciones.php',2,2,0),(101,'Edta ediciones INVI','none','png','if_ediciones_a.php',2,2,0),(102,'Agrega foto edici?n','new','png','if_fotoedicion.php',2,2,0),(103,'Edita fotoedicion','fa-pencil-square-o','png','bus_fotoedicion.php',2,2,0),(104,'Edita fotoedicion INVI','none','png','if_fotoedicion_a.php',2,2,0),(105,'Redactar mail masivo','fa-pencil-square-o','png','if_massive_mail.php',6,2,1),(106,'Edita mail masivo','fa-pencil-square-o','png','bus_massive_mail.php',6,2,1),(107,'Crea grupo env','new','png','if_massive_grupo.php',6,2,1),(108,'Edita grupo env','fa-pencil-square-o','png','bus_massive_grupo.php',6,2,1),(109,'Edita grupo env?o INVI','none','png','if_massive_grupo_a.php',6,2,1),(110,'Editar mail masivo INVI','none','png','if_massive_mail_a.php',6,2,1),(111,'enviado','none','png','enviado.php',6,2,1),(112,'EXE mail INVI','none','png','exe_massive_mail.php',6,2,1),(113,'Agrega contacto','new','png','if_massive_directorio.php',6,2,1),(114,'Editar contacto','fa-pencil-square-o','png','bus_massive_directorio.php',6,2,1),(115,'Editar contacto INVI','none','png','if_massive_directorio_a.php',6,2,1),(116,'PDF','new','png','pdf.php',6,2,1),(117,'Agrega contenido idioma','new','png','if_content.php',21,1,1),(118,'Editar contenido idioma','fa-pencil-square-o','png','bus_content.php',21,1,1),(119,'Editar idioma INVI','none','png','if_content_a.php',21,1,1),(120,'Agregar idioma','new','png','if_language.php',21,1,1),(121,'Editar idioma','fa-pencil-square-o','png','bus_language.php',21,1,1),(122,'Editar idioma INVI','none','png','if_language_a.php',21,1,1),(124,'Edita categoria','fa-pencil-square-o','png','bus_categoria.php',5,1,1),(125,'Edita catetgoria INVI','none','png','if_categoria_a.php',5,1,1),(126,'Clientes registrados','boton','png','bus_directorio.php',20,3,1),(129,'Edita FAQ INVI','none','png','if_faq_a.php',22,1,1),(130,'TEST','boton','png','ip_registro_a.php',15,1,1),(131,'Agrega categoria','new','png','if_categoria.php',22,1,1),(132,'Edita categoria','fa-pencil-square-o','png','bus_categoria.php',22,1,1),(133,'Edita categoria INVI','none','png','if_categoria_a.php',22,1,1),(134,'Clientes registrados INVO','none','png','if_directorio_a.php',20,1,1),(145,'TEST','new','png','test.php',8,1,0),(144,'Asigna piezas al INVI','none','png','bus_asigna.php',8,1,1),(138,'Agregar movimiento','new','png','if_registro.php',20,3,1),(139,'Edita registro INVI','none','png','if_registro_a.php',20,2,1),(140,'Agrega etiqueta','new','png','if_label.php',8,2,1),(141,'Edita etiqueta','fa-pencil-square-o','png','bus_label.php',8,2,1),(142,'Edita etiqueta INVI','none','png','if_label_a.php',8,2,1),(143,'Asigna piezas catalogo INVI','none','png','scroll_tool.php',8,2,1);
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
  `alias` varchar(50) NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gadgets_index`
--

LOCK TABLES `gadgets_index` WRITE;
/*!40000 ALTER TABLE `gadgets_index` DISABLE KEYS */;
INSERT INTO `gadgets_index` VALUES (1,'gadgets','if_gadgets.php',1,1,'gadgets'),(2,'articulos','if_articulos.php',1,2,'blog'),(3,'usuario','if_autor.php',1,5,'usuario'),(4,'corporativa','if_corporativa.php',1,2,'corporativa'),(5,'fotos','if_fotos.php',1,2,'fotografia'),(6,'mensajes','bus_mensajes.php',1,5,'mensajes'),(7,'contador','contador.php',1,2,'contador'),(8,'catalogo','if_catalogo.php',1,2,'catalogo'),(9,'banners','if_banner.php',1,2,'banners'),(10,'proyectos','if_proyectos.php',1,2,'proyectos'),(11,'publicaciones','if_publicaciones.php',1,2,'publicaciones'),(12,'noticias','if_noticias.php',1,2,'boletines'),(13,'testimonios','if_testimonios.php',1,2,'testimonios'),(14,'configura','if_configura_a.php',1,1,'plantillas'),(15,'congreso','if_evento.php',1,2,'agenda'),(16,'descargar','if_descargar.php',1,2,'descargas'),(17,'video','if_video.php',1,2,'videos'),(18,'ligas','if_ligas.php',1,2,'ligas'),(19,'patrocinador','if_patrocinador.php',1,2,'patrocinadores'),(20,'comprar','registro.php',1,5,'comprar'),(21,'language','if_language.php',1,1,'idioma'),(22,'faq','if_faq.php',0,1,'faq'),(23,'hotel','if_habitacion.php',0,1,'hotel'),(24,'homeopop','if_medicamento.php',0,1,'homeopop'),(25,'genealogia','if_registro.php',0,1,'genealogia'),(27,'citas','if_citas.php',0,1,'citas'),(28,'consulta','if_consulta.php',1,1,'consulta'),(29,'menus','if_botones.php',1,1,'menus'),(30,'eventos','if_eventos.php',1,1,'eventos'),(31,'respaldo','bus_respaldo.php',1,2,'respaldar'),(32,'qr','if_qr.php',1,2,'qr'),(33,'quiz','if_quiz.php',1,1,'quiz'),(34,'social','bus_contenidos.php',1,1,'social');
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gadgets_posicion`
--

LOCK TABLES `gadgets_posicion` WRITE;
/*!40000 ALTER TABLE `gadgets_posicion` DISABLE KEYS */;
INSERT INTO `gadgets_posicion` VALUES (8,'Ninguno',''),(1,'Central',''),(2,'Izq. Superior',''),(3,'Der. Superior',''),(4,'Izq. Inferior',''),(5,'Der. Inferior',''),(6,'Inferior',''),(7,'Superior','');
/*!40000 ALTER TABLE `gadgets_posicion` ENABLE KEYS */;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `general_visible`
--

LOCK TABLES `general_visible` WRITE;
/*!40000 ALTER TABLE `general_visible` DISABLE KEYS */;
INSERT INTO `general_visible` VALUES (2,'No'),(1,'Si');
/*!40000 ALTER TABLE `general_visible` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-19 13:28:30
