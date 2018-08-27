-- MySQL dump 10.13  Distrib 8.0.12, for Win64 (x86_64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `check`
--

DROP TABLE IF EXISTS `check`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `check` (
  `idcheck` int(11) NOT NULL AUTO_INCREMENT,
  `ife` int(11) DEFAULT NULL,
  `curp` int(11) DEFAULT NULL,
  `comprobante_domicilio` int(11) DEFAULT NULL,
  `posesion_terreno` int(11) DEFAULT NULL,
  `id_layout` int(11) NOT NULL,
  PRIMARY KEY (`idcheck`),
  KEY `id_layout_idx` (`id_layout`),
  CONSTRAINT `id_layout` FOREIGN KEY (`id_layout`) REFERENCES `layout` (`id_layout`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `check`
--

LOCK TABLES `check` WRITE;
/*!40000 ALTER TABLE `check` DISABLE KEYS */;
/*!40000 ALTER TABLE `check` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `estado` (
  `idestado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idestado`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Aguascalientes'),(2,'	Baja California'),(3,'	Baja California Sur'),(4,'	Campeche'),(5,'	Ciudad de México'),(6,'	Chihuahua'),(7,'	Chiapas'),(8,'	Coahuila'),(9,'	Colima'),(10,'	Durango'),(11,'	Guanajuato'),(12,'	Guerrero'),(13,'	Hidalgo'),(14,'	Jalisco'),(15,'	México'),(16,'	Michoacán'),(17,'	Morelos'),(18,'	Nayarit'),(19,'	Nuevo León'),(20,'	Oaxaca'),(21,'	Puebla'),(22,'	Querétaro'),(23,'	Quintana Roo'),(24,'	San Luis Potosí'),(25,'	Sinaloa'),(26,'	Sonora'),(27,'	Tabasco'),(28,'	Tamaulipas'),(29,'	Tlaxcala'),(30,'	Veracruz'),(31,'	Yucatán'),(32,'	Zacatecas');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout`
--

DROP TABLE IF EXISTS `layout`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `layout` (
  `id_layout` int(11) NOT NULL AUTO_INCREMENT,
  `id_proyecto` int(11) NOT NULL,
  `estatus` varchar(150) NOT NULL DEFAULT 'Solicitante',
  `fecha_apartado` date NOT NULL,
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `nombre_completo` varchar(350) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `estado_civil` varchar(45) NOT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `rfc` varchar(13) NOT NULL,
  `ingreso` int(11) NOT NULL,
  `antiguedad` int(11) DEFAULT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `solucion` varchar(45) NOT NULL,
  `subsidio` varchar(45) NOT NULL,
  `credito` varchar(45) NOT NULL,
  `enganche_efectivo` varchar(45) NOT NULL,
  `enganche_especie` varchar(45) DEFAULT NULL,
  `otros_apoyos` varchar(45) NOT NULL,
  `modalidad` varchar(45) NOT NULL,
  `cuv` int(20) NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `Localidad` varchar(250) NOT NULL,
  `colonia` varchar(250) NOT NULL,
  `domicilio_beneficiario` varchar(450) DEFAULT NULL,
  `tipo_asentamiento` varchar(45) NOT NULL,
  `coordenadas` varchar(225) NOT NULL,
  `latitud` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL,
  `domicilio_terreno` varchar(450) NOT NULL,
  `pcu` varchar(5) NOT NULL,
  PRIMARY KEY (`id_layout`),
  KEY `fk_layout_proyecto_idx` (`id_proyecto`),
  KEY `fk_layout_estado1_idx` (`id_estado`),
  KEY `fk_layout_municipio1_idx` (`id_municipio`),
  CONSTRAINT `fk_layout_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`idestado`),
  CONSTRAINT `fk_layout_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`idmunicipio`),
  CONSTRAINT `fk_layout_proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`idproyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout`
--

LOCK TABLES `layout` WRITE;
/*!40000 ALTER TABLE `layout` DISABLE KEYS */;
/*!40000 ALTER TABLE `layout` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `municipio` (
  `idmunicipio` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(405) NOT NULL,
  PRIMARY KEY (`idmunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Acajete'),(2,'Acateno'),(3,'	Acatlán'),(4,'	Acatzingo'),(5,'	Acteopan'),(6,'	Ahuacatlán'),(7,'	Ahuatlán'),(8,'	Ahuazotepec'),(9,'	Ahuehuetitla'),(10,'	Ajalpan'),(11,'	Albino Zertuche '),(12,'	Aljojuca '),(13,'	Altepexi '),(14,'	Amixtlán '),(15,'	Amozoc '),(16,'	Aquixtla'),(17,'	Atempan'),(18,'	Atexcal'),(19,'	Atlequizayan'),(20,'	Atlixco'),(21,'	Atoyatempan '),(22,'	Atzala'),(23,'	Atzitzihuacán'),(24,'	Atzitzintla'),(25,'	Axutla'),(26,'	Ayotoxco de Guerrero'),(27,'	Calpan'),(28,'	Caltepec'),(29,'	Camocuautla'),(30,'	Cañada Morelos '),(31,'	Caxhuacan'),(32,'	Chalchicomula de Sesma'),(33,'	Chapulco'),(34,'	Chiautla'),(35,'	Chiautzingo'),(36,'	Chichiquila'),(37,'	Chiconcuautla'),(38,'	Chietla'),(39,'	Chigmecatitlán'),(40,'	Chignahuapan'),(41,'	Chignautla'),(42,'	Chila'),(43,'	Chila de la Sal'),(44,'	Chilchotla'),(45,'	Chinantla'),(46,'	Coatepec'),(47,'	Coatzingo'),(48,'	Cohetzala'),(49,'	Cohuecan'),(50,'	Coronango'),(51,'Coxcatlán'),(52,'Coyomeapan'),(53,'Coyotepec'),(54,'Cuapiaxtla de Madero'),(55,'Cuautempan'),(56,'Cuautinchán'),(57,'Cuautlancingo'),(58,'Cuayuca de Andrade'),(59,'Cuetzalan del Progreso'),(60,'Cuyoaco'),(61,'Domingo Arenas'),(62,'Eloxochitlán'),(63,'Epatlán'),(64,'Esperanza'),(65,'Francisco Z. Mena'),(66,'General Felipe Ángeles'),(67,'Guadalupe'),(68,'Guadalupe Victoria'),(69,'Hermenegildo Galeana'),(70,'Honey'),(71,'Huaquechula'),(72,'Huatlatlauca'),(73,'Huauchinango'),(74,'Huehuetla'),(75,'Huehuetlán el Chico'),(76,'Huehuetlán el Grande (Santo Domingo)'),(77,'Huejotzingo'),(78,'Hueyapan'),(79,'Hueytamalco'),(80,'Hueytlalpan'),(81,'Huitzilan de Serdán'),(82,'Huitziltepec'),(83,'Ixcamilpa de Guerrero'),(84,'Ixcaquixtla'),(85,'Ixtacamaxtitlán'),(86,'Ixtepec'),(87,'Izúcar de Matamoros'),(88,'Jalpan'),(89,'Jolalpan'),(90,'Jonotla'),(91,'Jopala'),(92,'Juan C. Bonilla'),(93,'Juan Galindo'),(94,'Juan N. Méndez'),(95,'La Magdalena Tlatlauquitepec'),(96,'Lafragua (Saltillo)'),(97,'Libres'),(98,'Los Reyes de Juárez'),(99,'Mazapiltepec de Juárez'),(100,'Mixtla'),(101,'Molcaxac '),(102,'Naupan'),(103,'Nauzontla'),(104,'Nealtican'),(105,'Nicolás Bravo'),(106,'Nopalucan'),(107,'Ocotepec'),(108,'Ocoyucan'),(109,'Olintla'),(110,'Oriental'),(111,'Pahuatlán'),(112,'Palmar de Bravo'),(113,'Pantepec'),(114,'Petlalcingo'),(115,'Piaxtla'),(116,'Puebla'),(117,'Quecholac'),(118,'Quimixtlán'),(119,'Rafael Lara Grajales'),(120,'San Andrés Cholula'),(121,'San Antonio Cañada'),(122,'San Diego la Mesa Tochimiltzingo'),(123,'San Felipe Teotlalcingo'),(124,'San Felipe Tepatlán'),(125,'San Gabriel Chilac'),(126,'San Gregorio Atzompa'),(127,'San Jerónimo Tecuanipan'),(128,'San Jerónimo Xayacatlán'),(129,'San José Chiapa'),(130,'San José Miahuatlán'),(131,'San Juan Atenco'),(132,'San Juan Atzompa'),(133,'San Martín Texmelucan'),(134,'San Martín Totoltepec'),(135,'San Matías Tlalancaleca'),(136,'San Miguel Ixitlán'),(137,'San Miguel Xoxtla'),(138,'San Nicolás Buenos Aires'),(139,'San Nicolás de los Ranchos'),(140,'San Pablo Anicano'),(141,'San Pedro Cholula'),(142,'San Pedro Yeloixtlahuaca'),(143,'San Salvador el Seco'),(144,'San Salvador el Verde'),(145,'San Salvador Huixcolotla'),(146,'San Sebastián Tlacotepec'),(147,'Santa Catarina Tlaltempan'),(148,'Santa Inés Ahuatempan'),(149,'Santa Isabel Cholula'),(150,'Santiago Miahuatlán'),(151,'Santo Tomás Hueyotlipan'),(152,'Soltepec'),(153,'Tecali de Herrera'),(154,'Tecamachalco'),(155,'Tecomatlán'),(156,'Tehuacán'),(157,'Tehuitzingo'),(158,'Tenampulco'),(159,'Teopantlán'),(160,'Teotlalco'),(161,'Tepanco de López'),(162,'Tepango de Rodríguez'),(163,'Tepatlaxco de Hidalgo'),(164,'Tepeaca'),(165,'Tepemaxalco'),(166,'Tepeojuma'),(167,'Tepetzintla'),(168,'Tepexco'),(169,'Tepexi de Rodríguez'),(170,'Tepeyahualco'),(171,'Tepeyahualco de Cuauhtémoc'),(172,'Tetela de Ocampo'),(173,'Teteles de Avila Castillo'),(174,'Teziutlán'),(175,'Tianguismanalco'),(176,'Tilapa'),(177,'Tlachichuca'),(178,'Tlacotepec de Benito Juárez'),(179,'Tlacuilotepec'),(180,'Tlahuapan'),(181,'Tlaltenango'),(182,'Tlanepantla'),(183,'Tlaola'),(184,'Tlapacoya'),(185,'Tlapanalá'),(186,'Tlatlauquitepec'),(187,'Tlaxco'),(188,'Tochimilco'),(189,'Tochtepec'),(190,'Totoltepec de Guerrero'),(191,'Tulcingo'),(192,'Tuzamapan de Galeana'),(193,'Tzicatlacoyan'),(194,'Venustiano Carranza'),(195,'Vicente Guerrero'),(196,'Xayacatlán de Bravo'),(197,'Xicotepec'),(198,'Xicotlán'),(199,'Xiutetelco'),(200,'Xochiapulco'),(201,'Xochiltepec'),(202,'Xochitlán de Vicente Suárez'),(203,'Xochitlán Todos Santos'),(204,'Yaonáhuac'),(205,'Yehualtepec'),(206,'Zacapala'),(207,'Zacapoaxtla'),(208,'Zacatlán'),(209,'Zapotitlán'),(210,'Zapotitlán de Méndez'),(211,'Zaragoza'),(212,'Zautla'),(213,'Zihuateutla'),(214,'Zinacatepec'),(215,'Zongozotla'),(216,'Zoquiapan'),(217,'Zoquitlán');
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `proyecto` (
  `idproyecto` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(250) NOT NULL,
  `localidad` int(11) NOT NULL,
  `no_beneficiarios` int(11) NOT NULL,
  `fecha_alta` datetime NOT NULL,
  PRIMARY KEY (`idproyecto`),
  KEY `localidad_idx` (`localidad`),
  CONSTRAINT `localidad` FOREIGN KEY (`localidad`) REFERENCES `municipio` (`idmunicipio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (1,'Primer proyecto',50,20,'2018-08-23 13:17:36'),(2,'Segundo proyecto',25,25,'2018-08-23 13:17:36');
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `rol` varchar(45) NOT NULL,
  PRIMARY KEY (`idusuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin','123','administrador');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-27  9:20:09
