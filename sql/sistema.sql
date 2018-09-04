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
-- Table structure for table `cancelacion`
--

DROP TABLE IF EXISTS `cancelacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cancelacion` (
  `idcancelacion` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(1500) NOT NULL,
  `fecha_cancelacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idlayout` int(11) NOT NULL,
  PRIMARY KEY (`idcancelacion`),
  KEY `idlayout_idx` (`idlayout`),
  CONSTRAINT `idlayout` FOREIGN KEY (`idlayout`) REFERENCES `layout` (`id_layout`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cancelacion`
--

LOCK TABLES `cancelacion` WRITE;
/*!40000 ALTER TABLE `cancelacion` DISABLE KEYS */;
INSERT INTO `cancelacion` VALUES (21,'El municipio canceló','2018-08-29 13:51:10',14),(22,'El beneficiario canceló','2018-08-29 13:53:59',5),(23,'El beneficiario canceló','2018-08-29 13:54:08',13),(24,'El beneficiario canceló','2018-08-30 16:54:18',9),(25,'El beneficiario canceló','2018-09-03 11:23:54',66);
/*!40000 ALTER TABLE `cancelacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checklist`
--

DROP TABLE IF EXISTS `checklist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `checklist` (
  `idcheck` int(11) NOT NULL AUTO_INCREMENT,
  `ife` int(11) DEFAULT '0',
  `curp` int(11) DEFAULT '0',
  `comprobante_domicilio` int(11) DEFAULT '0',
  `posesion_terreno` int(11) DEFAULT '0',
  `id_layout` int(11) NOT NULL,
  `acta_nacimiento` int(11) DEFAULT '0',
  PRIMARY KEY (`idcheck`),
  UNIQUE KEY `id_layout_UNIQUE` (`id_layout`),
  KEY `id_layout_idx` (`id_layout`),
  CONSTRAINT `id_layout` FOREIGN KEY (`id_layout`) REFERENCES `layout` (`id_layout`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checklist`
--

LOCK TABLES `checklist` WRITE;
/*!40000 ALTER TABLE `checklist` DISABLE KEYS */;
INSERT INTO `checklist` VALUES (16,1,1,1,0,17,0),(17,1,0,0,0,22,0),(18,1,1,0,0,74,0);
/*!40000 ALTER TABLE `checklist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `documento` longtext NOT NULL,
  `id_layout` int(11) NOT NULL,
  `alias` varchar(45) NOT NULL,
  PRIMARY KEY (`iddocumento`),
  KEY `fk_documento_layout1_idx` (`id_layout`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (16,'archivos/files/MAMA360117HPLNLN06.pdf',18,'Curp'),(18,'archivos/files/rosa sainos mendez.pdf',17,'IFE / INE'),(19,'archivos/files/alejandro guzman mendez.pdf',17,'CURP'),(20,'archivos/files/gregorio sanchez bautista.pdf',17,'Comprobande de domicilio'),(21,'archivos/files/fernandina gomez sainos.pdf',17,'Acta de nacimiento'),(22,'archivos/files/esther guzman cano.pdf',17,'Comprobante de posesión'),(23,'archivos/files/alejandro guzman mendez.pdf',22,'IFE / INE'),(24,'archivos/files/leodegaria cano gutierrez.pdf',74,'CURP');
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Aguascalientes'),(2,'Baja California'),(3,'Baja California Sur'),(4,'Campeche'),(5,'Ciudad de México'),(6,'Chihuahua'),(7,'Chiapas'),(8,'Coahuila'),(9,'Colima'),(10,'Durango'),(11,'Guanajuato'),(12,'Guerrero'),(13,'Hidalgo'),(14,'Jalisco'),(15,'México'),(16,'Michoacán'),(17,'Morelos'),(18,'Nayarit'),(19,'Nuevo León'),(20,'Oaxaca'),(21,'Puebla'),(22,'Querétaro'),(23,'Quintana Roo'),(24,'San Luis Potosí'),(25,'Sinaloa'),(26,'Sonora'),(27,'Tabasco'),(28,'Tamaulipas'),(29,'Tlaxcala'),(30,'Veracruz'),(31,'Yucatán'),(32,'Zacatecas');
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
  `fecha_apartado` date DEFAULT NULL,
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido_paterno` varchar(100) NOT NULL,
  `apellido_materno` varchar(100) NOT NULL,
  `nombre_completo` varchar(350) NOT NULL,
  `genero` varchar(10) NOT NULL,
  `estado_civil` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `rfc` varchar(13) NOT NULL,
  `ingreso` varchar(100) NOT NULL,
  `antiguedad` varchar(10) DEFAULT NULL,
  `ocupacion` varchar(100) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `solucion` varchar(45) NOT NULL,
  `subsidio` varchar(45) NOT NULL,
  `credito` varchar(45) NOT NULL,
  `enganche_efectivo` varchar(45) DEFAULT NULL,
  `enganche_especie` varchar(150) DEFAULT NULL,
  `otros_apoyos` varchar(45) DEFAULT NULL,
  `modalidad` varchar(45) NOT NULL,
  `cuv` varchar(35) DEFAULT NULL,
  `puntaje` varchar(10) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `codigo_postal` int(5) NOT NULL,
  `localidad` varchar(250) NOT NULL,
  `colonia` varchar(500) NOT NULL,
  `domicilio_beneficiario` varchar(450) DEFAULT NULL,
  `tipo_asentamiento` varchar(45) NOT NULL,
  `coordenadas` varchar(225) NOT NULL,
  `latitud` varchar(100) NOT NULL,
  `longitud` varchar(100) NOT NULL,
  `domicilio_terreno` varchar(450) NOT NULL,
  `pcu` varchar(5) NOT NULL,
  `estado_contrato` varchar(45) NOT NULL DEFAULT 'activo',
  `zona` varchar(415) DEFAULT NULL,
  PRIMARY KEY (`id_layout`),
  KEY `fk_layout_proyecto_idx` (`id_proyecto`),
  KEY `fk_layout_estado1_idx` (`id_estado`),
  KEY `fk_layout_municipio1_idx` (`id_municipio`),
  CONSTRAINT `fk_layout_estado1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`idestado`),
  CONSTRAINT `fk_layout_municipio1` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`idmunicipio`),
  CONSTRAINT `fk_layout_proyecto` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`idproyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout`
--

LOCK TABLES `layout` WRITE;
/*!40000 ALTER TABLE `layout` DISABLE KEYS */;
INSERT INTO `layout` VALUES (2,5,'APARTADO','2018-08-31','VEDR940504MVZLZB01','Rubi Aracely','Velazquez','Diaz','Rubi Aracely Velazquez Diaz','Femenino','Soltero','1994-05-04','VEDR940504','8500','1','Ingeniero','2291396118','115,022.50','30,500','75,00','5,000','Material','5,400','Mejoramiento','512488632','805',21,50,72010,'Coronango','Misiones de San Francisco','lagunas 5','U2','19.2666524 -98.555624','19.2666524','-98.555624','lagunas 5','U2','activo',NULL),(3,6,'Solicitante',NULL,'LOPF980122HPBPRL01','Fulanito','Lopez','Perez','Fulanito Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Material','9,000','Mejoramiento','897981','500',21,3,72566,'Acatlán','Nueva colonia','calle 4 sur','U2','19.63358 -98.5632110','19.63358','-98.5632110','calle 6 sur','U2','sustituido',NULL),(4,6,'Solicitante',NULL,'LOPF980122HPBPRL02','Fulanito','Lopez','Perez','Fulanito Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Material','9,000','Mejoramiento','897981','500',21,3,72566,'Acatlán','Nueva colonia','calle 4 sur','U2','19.63358 -98.5632110','19.63358','-98.5632110','calle 6 sur','U2','sustituido',NULL),(5,6,'Solicitante',NULL,'LOPF980122HPBPRL03','Fulanito2','Lopez','Perez','Fulanito2 Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Material','9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 --98.5632110','19.63358','--98.5632110','calle 6 sur','U2','cancelado',NULL),(6,6,'Solicitante',NULL,'LOPF980122HPBPRL04','Fulanito3','Lopez','Perez','Fulanito3 Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Material','9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 -98622254','19.63358','-98622254','calle 6 sur','U2','sustituido',NULL),(7,6,'APARTADO','2018-08-24','LOPF980122HPBPRL05','Fulanito','Lopez','Perez','Fulanito Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000',NULL,'9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 --98.5632110','19.63358','--98.5632110','calle 6 sur','U2','activo',NULL),(8,6,'APARTADO','2018-09-21','LOPF980122HPBPRL06','Fulanito2','Lopez','Perez','Fulanito2 Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000',NULL,'9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 -9862254','19.63358','-9862254','calle 6 sur','U2','sustituido',NULL),(9,6,'APARTADO','2018-09-28','LOPF980122HPBPRL07','Fulanito2','Lopez','Perez','Fulanito2 Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000',NULL,'9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 -9862254','19.63358','-9862254','calle 6 sur','U2','cancelado',NULL),(10,6,'APARTADO','2018-07-10','LOPF980122HPBPRL08','Fulanito12','Lopez','Perez','Fulanito12 Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000',NULL,'9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 --98.5632110','19.63358','--98.5632110','calle 6 sur','U2','activo',NULL),(11,6,'Solicitante',NULL,'LOPF980122HPBPRL09','Fulanito13','Lopez','Perez','Fulanito13 Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Efectivo','9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 --98622254','19.63358','--98622254','calle 6 sur','U2','sustituido',NULL),(12,6,'APARTADO','2018-08-19','LOPF980122HPBPRL10','usuario sustituido','Lopez','Perez','usuario sustituido Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Efectivo','9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 --98.5632110','19.63358','--98.5632110','calle 6 sur','U2','activo',NULL),(13,6,'Solicitante',NULL,'LOPF980122HPBPRL11','sustituyento a fulanito 13','Lopez','Perez','sustituyento a fulanito 13 Lopez Perez','Masculino','Casado','1998-01-22','LOPF980122','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Efectivo','9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 -98','19.63358','-98','calle 6 sur','U2','cancelado',NULL),(14,8,'APARTADO','2018-09-26','asd','asd','ads','ad','asd ads ad','Masculino','Separado','1993-08-19','asd','25','1','asd','231','sad','sd','sad','asd','Material','ads','Autoproduccion','12323','1',3,20,1,'ATLIXCO','sad','sd','U2','12 -13','12','-13','sad','U2','cancelado',NULL),(15,8,'APARTADO','2018-09-02','samj420918hpblrn12','Juan','Martinez','Salas','Juan Martinez Salas','Masculino','Separado','1942-09-18','samj420918','4600','1','trabajador','2254873','75000','40000','35000','10000','Material','10000','Ampliacion','1185462','230',21,22,71200,'ATZALA','Unidad ','calle 32 pte','U1','19.6485233 -98.654427','19.6485233','-98.654427','calle 36 pte','U3','sustituido',NULL),(16,8,'Solicitante',NULL,'samj420918hpblrn13','Jose','Martinez','Salas','Jose Martinez Salas','Masculino','Separado','1942-09-18','samj420918','4600','1','trabajador','2254873','75000','40000','35000','10000','Array','10000','Ampliacion','1185462','230',21,22,71200,'ATZALA','Unidad ','calle 32 pte','U1','19.6485233 --98.654427','19.6485233','--98.654427','calle 36 pte','U3','sustituido',NULL),(17,8,'EN EJECUCION',NULL,'samj420918hpblrn14','Javier','Martinez','Salas','Javier Martinez Salas','Masculino','Separado','1942-09-18','samj420918','4600','1','trabajador','2254873','75000','40000','35000','10000','Pendiente','10000','Ampliacion','1185462','230',21,22,71200,'ATZALA','Unidad ','calle 32 pte','U1','19.6485233 ---98.654427','19.6485233','---98.654427','calle 36 pte','U3','sustituido',NULL),(18,10,'APARTADO','2018-08-05','VEDR940504MVZLZB15','Julio','Romero','Lopez','Julio Romero Lopez','Masculino','Soltero','1994-05-04','VEDR940504','8,000','3','Trabajador','55587468','150,000','6,00','50,545','54564','Material, Efectivo','548844','Ampliacion','185587623','805',21,189,71555,'TOCHTEPEC','colonia nueva','sdsdsdsd','U2','10.1234567 -98.1234567','10.1234567','-98.1234567','terreno','U2','sustituido',NULL),(19,6,'EN EJECUCION',NULL,'fhhfhfhf123123213','sustituido','perez','martines','sustituido perez martines','Masculino','Casado','1998-01-22','fhhfhfhf12','8000','5','Trabajador','2422280911','70,000','30,500','14,000','3000','Pendiente','9,000','Mejoramiento','897981','500',21,3,72566,'ACATLAN','Nueva colonia','calle 4 sur','U2','19.63358 --9862254','19.63358','--9862254','calle 6 sur','U2','activo',NULL),(20,6,'Solicitante',NULL,'asdddddddddddddddd','asdsd','asdsad','asdsad','asdsd asdsad asdsad','Femenino','Soltero','2018-06-04','asdddddddd','213213','1','132313','1231311228','232323','123','1231','13213','Efectivo','123','Mejoramiento','123','12323',14,10,12321,'AJALPAN','132323','213213','Pueblo','1232132132 -2132132132','1232132132','-2132132132','123213','U3','activo','Rural'),(21,10,'Solicitante',NULL,'qweqwewqewqewqewqe','wewqe','qwewqe','qweqwe','wewqe qwewqe qweqwe','Femenino','Separado','2018-05-15','qweqwewqew','123213','1','123213132','1234567890','12323','1233','232323','123213213','Material','213123','Mejoramiento','123213','13213',14,16,21321,'AQUIXTLA','12323213','12321323','colonia','1232311111 -1232131111','1232311111','-1232131111','2132323','U3','activo','Rural'),(22,10,'Solicitante',NULL,'23213213213213232','asdsad','asd','123','asdsad asd 123','Masculino','Unión libre','2018-08-08','2321321321','5000','1','12321323','2132132132','13213213213','123123','123231','123213','Mano de obra','123213213','Autoproduccion','12323','132323',5,9,12323,'AHUEHUETITLA','123232','12323','colonia','1321323232 -1322333213','1321323232','-1322333213','21323213231','U2','activo','Rural'),(23,10,'Solicitante',NULL,'2321321321321323','asdsad','asd','123','asdsad asd 123','Masculino','Unión libre','2018-08-08','2321321321','7000','1','12321323','2132132132','13213213213','123123','123231','123213','Mano de obra','123213213','Autoproduccion','12323','132323',5,9,12323,'AHUEHUETITLA','123232','12323','colonia','1321323232 -1322333213','1321323232','-1322333213','21323213231','U2','activo','Rural'),(24,10,'Solicitante',NULL,'232132132132132','asdsad','asd','123','asdsad asd 123','Masculino','Unión libre','2018-08-08','2321321321','7000','1','12321323','2132132132','13213213213','123123','123231','123213','Mano de obra','123213213','Autoproduccion','12323','132323',5,9,12323,'AHUEHUETITLA','123232','12323','colonia','1321323232 -1322333213','1321323232','-1322333213','21323213231','U2','activo','Rural'),(25,10,'Solicitante',NULL,'23213213213213','asdsad','asd','123','asdsad asd 123','Masculino','Unión libre','2018-08-08','2321321321','7,000','1','12321323','2132132132','13213213213','123123','123231','123213','Mano de obra','123213213','Autoproduccion','12323','132323',5,9,12323,'AHUEHUETITLA','123232','12323','colonia','1321323232 -1322333213','1321323232','-1322333213','21323213231','U2','activo','Rural'),(26,10,'EN EJECUCION',NULL,'232132132132132321','asdsad','asd','123','asdsad asd 123','Masculino','Unión libre','2018-08-08','2321321321','7,000','1','12321323','2132132132','13213213213','123123','123231','123213','Mano de obra','123213213','Autoproduccion','12323','132323',5,9,12323,'AHUEHUETITLA','123232','12323','colonia','1321323232 -1322333213','1321323232','-1322333213','21323213231','U2','activo','Rural'),(45,11,'Solicitante',NULL,'DATA961023HPLMLL02','asd','asdsa','asda','asd asdsa asda','Femenino','Soltero','2018-09-17','DATA961023','7,889','1','123213132','2132132323','123','12323','123213','12323','Material,Efectivo','3213232','Autoproduccion','23232323213213213','12323',12,14,12323,'AMIXTLAN','1232323','1232323','colonia','19.6485233 -98.446772','19.6485233','-98.446772','12323213','U2','sustituido','Rural'),(66,11,'Solicitante',NULL,'DATA961023HPLMLL02','asd','asdsa','asda','asd asdsa asda','Femenino','Soltero','2018-09-17','DATA961023','7,889','1','123213132','2132132323','123','12323','123213','12323','Pendiente','3213232','Autoproduccion','23232323213213213','12323',12,14,12323,'AMIXTLAN','1232323','1232323','colonia','19.6485233 --98.446772','19.6485233','--98.446772','12323213','U2','cancelado','Rural'),(67,10,'Solicitante',NULL,'VEDR940504MVZLZB15','Julio','Romero','Lopez','Julio Romero Lopez','Masculino','Soltero','1994-05-04','VEDR940504','8,000','3','Trabajador','55587468','150,000','6,00','50,545','54564','Material, Efectivo','548844','Ampliacion','185587623','805',21,189,71555,'TOCHTEPEC','colonia nueva','sdsdsdsd','U2','10.1234567 --98.1234567','10.1234567','--98.1234567','terreno','U2','activo',''),(68,11,'EN EJECUCION',NULL,'DATA961023HPLMLL02','prueba','1','septiembre','prueba 1 septiembre','Femenino','Soltero','2018-09-17','DATA961023','7,889','1','123213132','2132132323','123','12323','123213','12323','Pendiente','3213232','Autoproduccion','123','787',12,14,12312,'AMIXTLAN','1232323','1232323','colonia','19.6485233 --98.446772','19.6485233','--98.446772','12323213','U2','activo','Rural'),(69,11,'Solicitante',NULL,'VEDR940504MVZLZB01','Prueba','FEcha','nacimiento','Prueba FEcha nacimiento','Femenino','Casado','1994-05-04','VEDR940504','89789','1','asdsad','8789789789','878979','897897','897897','89789789','Material, Efectivo','77897897','Mejoramiento','89789789789789','878',21,5,74365,'ACTEOPAN','asdad','asdasd','Pueblo','8789789789 8978978978','8789789789','-8978978978','hfhytujfk','U1','sustituido','Rural'),(70,11,'Solicitante',NULL,'VEDR940504MVZLZB01','Prueba','FEcha','nacimiento','Prueba FEcha nacimiento','Femenino','Casado','1994-05-04','VEDR940504','8791','897897','897','897','897','897','897','897','Mano de obra, Material','89','Mejoramiento','897987','878',21,1,87897,'ACAJETE','sda','asdsadasd','colonia','7897897897 8978978978','7897897897','-8978978978','hfhytujfk','U1','activo','Urbana'),(71,11,'Solicitante',NULL,'VEDR940504HVZLZB01','Prueba','genero','desde curp','Prueba genero desde curp','Masculino','Casado','1994-05-04','VEDR940504','8791','897897','897','897','897','897','897','897','Mano de obra, Material','89','Mejoramiento','897987','878',21,1,87897,'ACAJETE','sda','asdsadasd','colonia','7897897897 8978978978','7897897897','-8978978978','hfhytujfk','U1','activo','Urbana'),(72,8,'EN EJECUCION',NULL,'samj420918hpblrn14','Daniel','Martinez','Salas','Daniel Martinez Salas','Masculino','Separado','1942-09-18','samj420918','4600','1','trabajador','2254873','75000','40000','35000','10000','Pendiente','10000','Ampliacion','1185462','230',21,22,71200,'ATZALA','Unidad ','calle 32 pte','U1','19.6485233 ---98.654427','19.6485233','----98.654427','calle 36 pte','U3','activo',''),(73,10,'Solicitante',NULL,'RASA780209HPBMNL03','Alberto','Ramirez','Sanchez','Alberto Ramirez Sanchez','Masculino','Casado','1978-02-09','RASA780209','6,900','1','Vendedor','2254875524','120000','20000','56000','5000','Mano de obra','95000','Autoproduccion','1845226475215','802',21,34,75468,'CHIAUTLA','SAN DIEGO ACAPULCO','C. FRANCISCO I. MADERO 5, SAN DIEGO ACAPULCO, ATLIXCO, PUEBLA, C.P. 74365.','colonia','18.8765667 -98.446772','18.8765667','--98.446772','C. FRANCISCO I. MADERO S/N, SAN DIEFGO ACAPULCO, CP. 74365, ATLIXCO, PUEBLA','U3','activo','Urbana'),(74,10,'Solicitante',NULL,'VEDR940504MVZLZB01','Juan','Martinz','Perez','Juan Martinz Perez','Femenino','Soltero','1994-05-04','VEDR940504','11,000','1','Trabajador','2291396118','1200000','120000','15000','185000','Mano de obra, Material, Efectivo','15000','Autoproduccion','1824511816','252',21,12,55055,'ALJOJUCA','Misiones de San Francisco','asadsddd','colonia','19.4444444 -98.055555','19.4444444','--98.055555','fsdf6644s','U2','activo','Urbana'),(75,11,'Solicitante',NULL,'VEDR950504HVZLZB01','Prueba','FEcha','nacimiento','Prueba FEcha nacimiento','Masculino','Casado','1995-05-04','VEDR950504','89789','1','asdsad','8789789789','878979','897897','897897','89789789','Material, Efectivo','77897897','Mejoramiento','89789789789789','878',21,5,74365,'ACTEOPAN','asdad','asdasd','Pueblo','8789789789 -8978978978','8789789789','--8978978978','hfhytujfk','U1','activo','Rural');
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
) ENGINE=InnoDB AUTO_INCREMENT=218 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'ACAJETE'),(2,'ACATENO'),(3,'ACATLAN'),(4,'ACATZINGO'),(5,'ACTEOPAN'),(6,'AHUACATLAN'),(7,'AHUATLAN'),(8,'AHUAZOTEPEC'),(9,'AHUEHUETITLA'),(10,'AJALPAN'),(11,'ALBINO ZERTUCHE'),(12,'ALJOJUCA'),(13,'ALTEPEXI'),(14,'AMIXTLAN'),(15,'AMOZOC'),(16,'AQUIXTLA'),(17,'ATEMPAN'),(18,'ATEXCAL'),(19,'ATLEQUIZAYAN'),(20,'ATLIXCO'),(21,'ATOYATEMPAN'),(22,'ATZALA'),(23,'ATZITZIHUACAN'),(24,'ATZITZINTLA'),(25,'AXUTLA'),(26,'AYOTOXCO DE GUERRERO'),(27,'CALPAN'),(28,'CALTEPEC'),(29,'CAMOCUAUTLA'),(30,'CAXHUACAN'),(31,'CAÑADA MORELOS'),(32,'CHALCHICOMULA DE SESMA'),(33,'CHAPULCO'),(34,'CHIAUTLA'),(35,'CHIAUTZINGO'),(36,'CHICHIQUILA'),(37,'CHICONCUAUTLA'),(38,'CHIETLA'),(39,'CHIGMECATITLAN'),(40,'CHIGNAHUAPAN'),(41,'CHIGNAUTLA'),(42,'CHILA'),(43,'CHILA DE LA SAL'),(44,'CHILCHOTLA'),(45,'CHINANTLA'),(46,'COATEPEC'),(47,'COATZINGO'),(48,'COHETZALA'),(49,'COHUECAN'),(50,'CORONANGO'),(51,'COXCATLAN'),(52,'COYOMEAPAN'),(53,'COYOTEPEC'),(54,'CUAPIAXTLA DE MADERO'),(55,'CUAUTEMPAN'),(56,'CUAUTINCHAN'),(57,'CUAUTLANCINGO'),(58,'CUAYUCA DE ANDRADE'),(59,'CUETZALAN DEL PROGRESO'),(60,'CUYOACO'),(61,'DOMINGO ARENAS'),(62,'ELOXOCHITLAN'),(63,'EPATLAN'),(64,'ESPERANZA'),(65,'FRANCISCO Z. MENA'),(66,'GENERAL FELIPE ANGELES'),(67,'GUADALUPE'),(68,'GUADALUPE VICTORIA'),(69,'HERMENEGILDO GALEANA'),(70,'HONEY'),(71,'HUAQUECHULA'),(72,'HUATLATLAUCA'),(73,'HUAUCHINANGO'),(74,'HUEHUETLA'),(75,'HUEHUETLAN EL CHICO'),(76,'HUEHUETLAN EL GRANDE (SANTO DOMINGO)'),(77,'HUEJOTZINGO'),(78,'HUEYAPAN'),(79,'HUEYTAMALCO'),(80,'HUEYTLALPAN'),(81,'HUITZILAN DE SERDAN'),(82,'HUITZILTEPEC'),(83,'IXCAMILPA DE GUERRERO'),(84,'IXCAQUIXTLA'),(85,'IXTACAMAXTITLAN'),(86,'IXTEPEC'),(87,'IZUCAR DE MATAMOROS'),(88,'JALPAN'),(89,'JOLALPAN'),(90,'JONOTLA'),(91,'JOPALA'),(92,'JUAN C. BONILLA'),(93,'JUAN GALINDO'),(94,'JUAN N. MENDEZ'),(95,'LA MAGDALENA TLATLAUQUITEPEC'),(96,'LAFRAGUA (SALTILLO)'),(97,'LIBRES'),(98,'LOS REYES DE JUAREZ'),(99,'MAZAPILTEPEC DE JUAREZ'),(100,'MIXTLA'),(101,'MOLCAXAC'),(102,'NAUPAN'),(103,'NAUZONTLA'),(104,'NEALTICAN'),(105,'NICOLAS BRAVO'),(106,'NOPALUCAN'),(107,'OCOTEPEC'),(108,'OCOYUCAN'),(109,'OLINTLA'),(110,'ORIENTAL'),(111,'PAHUATLAN'),(112,'PALMAR DE BRAVO'),(113,'PANTEPEC'),(114,'PETLALCINGO'),(115,'PIAXTLA'),(116,'PUEBLA'),(117,'QUECHOLAC'),(118,'QUIMIXTLAN'),(119,'RAFAEL LARA GRAJALES'),(120,'SAN ANDRES CHOLULA'),(121,'SAN ANTONIO CAÑADA'),(122,'SAN DIEGO LA MESA TOCHIMILTZINGO'),(123,'SAN FELIPE TEOTLALCINGO'),(124,'SAN FELIPE TEPATLAN'),(125,'SAN GABRIEL CHILAC'),(126,'SAN GREGORIO ATZOMPA'),(127,'SAN JERONIMO TECUANIPAN'),(128,'SAN JERONIMO XAYACATLAN'),(129,'SAN JOSE CHIAPA'),(130,'SAN JOSE MIAHUATLAN'),(131,'SAN JUAN ATENCO'),(132,'SAN JUAN ATZOMPA'),(133,'SAN MARTIN TEXMELUCAN'),(134,'SAN MARTIN TOTOLTEPEC'),(135,'SAN MATIAS TLALANCALECA'),(136,'SAN MIGUEL IXITLAN'),(137,'SAN MIGUEL XOXTLA'),(138,'SAN NICOLAS BUENOS AIRES'),(139,'SAN NICOLAS DE LOS RANCHOS'),(140,'SAN PABLO ANICANO'),(141,'SAN PEDRO CHOLULA'),(142,'SAN PEDRO YELOIXTLAHUACA'),(143,'SAN SALVADOR EL SECO'),(144,'SAN SALVADOR EL VERDE'),(145,'SAN SALVADOR HUIXCOLOTLA'),(146,'SAN SEBASTIAN TLACOTEPEC'),(147,'SANTA CATARINA TLALTEMPAN'),(148,'SANTA INES AHUATEMPAN'),(149,'SANTA ISABEL CHOLULA'),(150,'SANTIAGO MIAHUATLAN'),(151,'SANTO TOMAS HUEYOTLIPAN'),(152,'SOLTEPEC'),(153,'TECALI DE HERRERA'),(154,'TECAMACHALCO'),(155,'TECOMATLAN'),(156,'TEHUACAN'),(157,'TEHUITZINGO'),(158,'TENAMPULCO'),(159,'TEOPANTLAN'),(160,'TEOTLALCO'),(161,'TEPANCO DE LOPEZ'),(162,'TEPANGO DE RODRIGUEZ'),(163,'TEPATLAXCO DE HIDALGO'),(164,'TEPEACA'),(165,'TEPEMAXALCO'),(166,'TEPEOJUMA'),(167,'TEPETZINTLA'),(168,'TEPEXCO'),(169,'TEPEXI DE RODRIGUEZ'),(170,'TEPEYAHUALCO'),(171,'TEPEYAHUALCO DE CUAUHTEMOC'),(172,'TETELA DE OCAMPO'),(173,'TETELES DE AVILA CASTILLO'),(174,'TEZIUTLAN'),(175,'TIANGUISMANALCO'),(176,'TILAPA'),(177,'TLACHICHUCA'),(178,'TLACOTEPEC DE BENITO JUAREZ'),(179,'TLACUILOTEPEC'),(180,'TLAHUAPAN'),(181,'TLALTENANGO'),(182,'TLANEPANTLA'),(183,'TLAOLA'),(184,'TLAPACOYA'),(185,'TLAPANALA'),(186,'TLATLAUQUITEPEC'),(187,'TLAXCO'),(188,'TOCHIMILCO'),(189,'TOCHTEPEC'),(190,'TOTOLTEPEC DE GUERRERO'),(191,'TULCINGO'),(192,'TUZAMAPAN DE GALEANA'),(193,'TZICATLACOYAN'),(194,'VENUSTIANO CARRANZA'),(195,'VICENTE GUERRERO'),(196,'XAYACATLAN DE BRAVO'),(197,'XICOTEPEC'),(198,'XICOTLAN'),(199,'XIUTETELCO'),(200,'XOCHIAPULCO'),(201,'XOCHILTEPEC'),(202,'XOCHITLAN DE VICENTE SUAREZ'),(203,'XOCHITLAN TODOS SANTOS'),(204,'YAONAHUAC'),(205,'YEHUALTEPEC'),(206,'ZACAPALA'),(207,'ZACAPOAXTLA'),(208,'ZACATLAN'),(209,'ZAPOTITLAN'),(210,'ZAPOTITLAN DE MENDEZ'),(211,'ZARAGOZA'),(212,'ZAUTLA'),(213,'ZIHUATEUTLA'),(214,'ZINACATEPEC'),(215,'ZONGOZOTLA'),(216,'ZOQUIAPAN'),(217,'ZOQUITLAN');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (5,'Acateno (89)',2,89,'2018-08-27 10:39:59'),(6,'	Acatlan (52)',3,52,'2018-08-27 16:38:12'),(8,'ATZALA (170)',22,170,'2018-08-29 12:56:03'),(9,'AHUACATLAN (36)',6,36,'2018-08-30 12:30:32'),(10,'CHIAUTLA (50)',34,50,'2018-08-30 16:21:47'),(11,'AHUEHUETITLA (25)',9,25,'2018-08-31 15:50:20'),(12,'ATLIXCO (52)',20,52,'2018-09-03 11:01:52'),(13,'AXUTLA (60)',25,60,'2018-09-04 09:42:34');
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sustitucion`
--

DROP TABLE IF EXISTS `sustitucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `sustitucion` (
  `idsustitucion` int(11) NOT NULL AUTO_INCREMENT,
  `motivo` varchar(450) NOT NULL,
  `fecha_sustitucion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_layout` int(11) NOT NULL,
  PRIMARY KEY (`idsustitucion`),
  KEY `fk_sustitucion_layout1_idx` (`id_layout`),
  CONSTRAINT `fk_sustitucion_layout1` FOREIGN KEY (`id_layout`) REFERENCES `layout` (`id_layout`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sustitucion`
--

LOCK TABLES `sustitucion` WRITE;
/*!40000 ALTER TABLE `sustitucion` DISABLE KEYS */;
INSERT INTO `sustitucion` VALUES (1,'ok','2018-08-29 11:39:02',5),(2,'prueba','2018-08-29 11:42:35',11),(3,'Terreno no valido','2018-08-30 13:20:05',15),(4,'el usuario ya no vive en méxico','2018-08-30 14:06:33',16),(5,'por pruebas','2018-08-30 16:58:00',8),(6,'ya tiene subsidio','2018-09-03 11:18:25',18),(7,'Por pruebas','2018-09-03 15:54:21',17),(8,'Terreno no valido','2018-09-04 12:01:36',69);
/*!40000 ALTER TABLE `sustitucion` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
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

-- Dump completed on 2018-09-04 14:10:41
