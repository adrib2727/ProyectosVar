-- MySQL dump 10.17  Distrib 10.3.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: discografica
-- ------------------------------------------------------
-- Server version	10.3.22-MariaDB-1ubuntu1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `discografica`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `discografica` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `discografica`;

--
-- Table structure for table `companias`
--

DROP TABLE IF EXISTS `companias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companias` (
  `id_compania` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_compania`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companias`
--

LOCK TABLES `companias` WRITE;
/*!40000 ALTER TABLE `companias` DISABLE KEYS */;
INSERT INTO `companias` VALUES (1,'RCA Records','Londres'),(2,'Columbia Records','Los Angeles'),(3,'MCA Records','Nueva York'),(4,'PolyGram','Manchester'),(5,'Epic Records','San Francisco'),(6,'PolyGram','Manchester'),(7,'Epic Records','San Francisco'),(8,'EXO','Seul'),(9,'Island Records','Hawaii'),(10,'WEA','Miami');
/*!40000 ALTER TABLE `companias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formatos`
--

DROP TABLE IF EXISTS `formatos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formatos` (
  `id_formato` int(10) NOT NULL,
  `tipo_formato` varchar(30) NOT NULL,
  PRIMARY KEY (`id_formato`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formatos`
--

LOCK TABLES `formatos` WRITE;
/*!40000 ALTER TABLE `formatos` DISABLE KEYS */;
INSERT INTO `formatos` VALUES (1,'MP3'),(2,'CD'),(3,'WAV');
/*!40000 ALTER TABLE `formatos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grabaciones`
--

DROP TABLE IF EXISTS `grabaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grabaciones` (
  `id_grabacion` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `id_temas_fk` int(10) NOT NULL,
  `id_compania_fk` int(10) NOT NULL,
  `id_formato_fk` int(10) NOT NULL,
  `id_interprete_fk` int(10) NOT NULL,
  PRIMARY KEY (`id_grabacion`),
  KEY `fk_temas` (`id_temas_fk`),
  KEY `fk_companias` (`id_compania_fk`),
  KEY `fk_formatos` (`id_formato_fk`),
  KEY `fk_interpretes` (`id_interprete_fk`),
  CONSTRAINT `fk_companias` FOREIGN KEY (`id_compania_fk`) REFERENCES `companias` (`id_compania`),
  CONSTRAINT `fk_formatos` FOREIGN KEY (`id_formato_fk`) REFERENCES `formatos` (`id_formato`),
  CONSTRAINT `fk_interpretes` FOREIGN KEY (`id_interprete_fk`) REFERENCES `interpretes` (`id_interprete`),
  CONSTRAINT `fk_temas` FOREIGN KEY (`id_temas_fk`) REFERENCES `temas` (`id_temas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grabaciones`
--

LOCK TABLES `grabaciones` WRITE;
/*!40000 ALTER TABLE `grabaciones` DISABLE KEYS */;
INSERT INTO `grabaciones` VALUES (1,'Grabacion1','Rock','Bueno',1,4,1,1),(2,'Grabacion2','Rock','Malo',1,4,2,3),(3,'Grabacion3','Piano','Regular',5,8,3,5),(4,'Grabacion4','Rock','Bueno',7,5,1,7),(5,'Grabacion5','Piano','Malo',9,1,2,5),(6,'Grabacion6','Blues','Malo',6,7,1,6),(7,'Grabacion7','Rock','Bueno',3,4,2,11),(8,'Grabacion8','Heavy','Regular',8,1,3,8),(9,'Grabacion9','Blues','Regular',6,5,2,6),(10,'Grabacion10','Indie','Bueno',11,2,2,12),(11,'Grabacion11','Indie','Regular',11,2,1,12),(12,'Grabacion12','Thrash','Malo',10,5,3,10),(13,'Grabacion13','Rock','Bueno',3,8,3,1),(14,'Grabacion14','Thrash','Regular',8,4,2,2),(15,'Grabacion15','Clasica','Malo',9,9,3,9);
/*!40000 ALTER TABLE `grabaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `interpretes`
--

DROP TABLE IF EXISTS `interpretes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `interpretes` (
  `id_interprete` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_interprete`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interpretes`
--

LOCK TABLES `interpretes` WRITE;
/*!40000 ALTER TABLE `interpretes` DISABLE KEYS */;
INSERT INTO `interpretes` VALUES (1,'Angus Young','Grabaciones de guitarra solista, estilo Hard Rock'),(2,'Kirk Hammett','Grabaciones de guitarra solista, estilo Heavy'),(3,'Malcolm Young','Grabaciones de guitarra ritmica, estilo Hard Rock'),(4,'Alex Van Halen','Grabaciones de bateria, estilo Heavy'),(5,'Frederic Chopin','Grabaciones de piano, estilo Piano'),(6,'Chuck Berry','Grabaciones de guitarra, estilo Blues'),(7,'Flea','Grabaciones de bajo eléctrico, estilo Indie'),(8,'James Hetfield','Grabaciones de vocalista, estilo Thrash'),(9,'Beethoven','Grabaciones de piano, estolo Clasica'),(10,'David Lee','Grabaciones de vocalista, estilo Heavy'),(11,'Phil Rudd','Grabaciones de batería, estilo Rock'),(12,'Pucho','Grabaciones de vocalista, estilo Indie');
/*!40000 ALTER TABLE `interpretes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seguridad`
--

DROP TABLE IF EXISTS `seguridad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seguridad` (
  `id_seguridad` int(10) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  PRIMARY KEY (`id_seguridad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seguridad`
--

LOCK TABLES `seguridad` WRITE;
/*!40000 ALTER TABLE `seguridad` DISABLE KEYS */;
INSERT INTO `seguridad` VALUES (1,'adri1','1234');
/*!40000 ALTER TABLE `seguridad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temas`
--

DROP TABLE IF EXISTS `temas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temas` (
  `id_temas` int(10) NOT NULL,
  `nombre_tema` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_temas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temas`
--

LOCK TABLES `temas` WRITE;
/*!40000 ALTER TABLE `temas` DISABLE KEYS */;
INSERT INTO `temas` VALUES (1,'Highway to Hell','Tema del album \'Highway to Hell\''),(2,'Nothing Else Matters','Tema del album \'Metallica\''),(3,'Thunderstruck','Tema del album \'The Razors Edge\''),(4,'Jump','Tema del album \'1984\''),(5,'Nocturno','Tema de la pieza \'Op.9\''),(6,'Johnny B Goode','Tema del album \'Berry Is On Top\''),(7,'Can\'t Stop','Tema del album \'Can\'t Stop\''),(8,'Seek and Destroy','Tema del album \'Kill \'em All'),(9,'Pieza Nº3','Tema de la \'Orquesta Nº9 de Beethoven\''),(10,'Hot for Teacher','Tema del album \'1984\''),(11,'Copenhague','Tema del Album \'Un Día en el Mundo\'');
/*!40000 ALTER TABLE `temas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-12-06 19:08:14
