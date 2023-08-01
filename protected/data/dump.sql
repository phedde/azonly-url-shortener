-- MySQL dump 10.13  Distrib 8.0.23, for Linux (x86_64)
--
-- Host: localhost    Database: short
-- ------------------------------------------------------
-- Server version	8.0.23-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `sl_request_count`
--

DROP TABLE IF EXISTS `sl_request_count`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sl_request_count` (
  `day` date NOT NULL,
  `ip` varchar(64) NOT NULL,
  `total` int unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`day`,`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_request_count`
--

LOCK TABLES `sl_request_count` WRITE;
/*!40000 ALTER TABLE `sl_request_count` DISABLE KEYS */;
/*!40000 ALTER TABLE `sl_request_count` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sl_url`
--

DROP TABLE IF EXISTS `sl_url`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sl_url` (
  `UrlID` bigint unsigned NOT NULL AUTO_INCREMENT,
  `UrlShort` varchar(12) DEFAULT NULL,
  `Added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Hits` int unsigned NOT NULL DEFAULT '0',
  `Url` mediumtext,
  `Md5Url` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`UrlID`),
  KEY `ix_urlshort` (`UrlShort`),
  KEY `ix_hits` (`Hits`),
  KEY `ix_added` (`Added`),
  KEY `ix_md5url` (`Md5Url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sl_url`
--

LOCK TABLES `sl_url` WRITE;
/*!40000 ALTER TABLE `sl_url` DISABLE KEYS */;
INSERT INTO `sl_url` VALUES (1,'b','2019-05-25 11:04:39',1,'http://google.com','c7b920f57e553df2bb68272f61570210');
/*!40000 ALTER TABLE `sl_url` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-24  5:19:36
