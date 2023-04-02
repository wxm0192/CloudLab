-- MySQL dump 10.14  Distrib 5.5.68-MariaDB, for Linux (x86_64)
--
-- Host: 10.102.161.40    Database: shiyan
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `Lab01`
--

DROP TABLE IF EXISTS `Lab01`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Lab01` (
  `lab_id` int NOT NULL,
  `lab_category` int NOT NULL,
  `image` varchar(30) NOT NULL,
  `tag` varchar(30) NOT NULL,
  `level` int NOT NULL,
  `session_limit` int NOT NULL,
  `time_limit` int NOT NULL,
  `lab_type` varchar(30) NOT NULL,
  `lab_desc` varchar(100) DEFAULT NULL,
  `author_id` int DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `online_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`lab_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Lab`
--

LOCK TABLES `Lab` WRITE;
/*!40000 ALTER TABLE `Lab` DISABLE KEYS */;
INSERT INTO `Lab` VALUES 
(1,1,'my_web_ssh','22.1.31',0,10,30,'docker',NULL,1,NULL,'2022-12-01 00:00:00'),
(2,1,'my_web_ssh','22.1.31',0,10,30,'docker',NULL,1,NULL,'2022-12-01 00:00:00'),
(31,31,'lab_redis','22.1.31',0,10,30,'docker',NULL,31,NULL,'2022-12-01 00:00:00'),
(35,2,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','NFS Lab',2,'Liang Lei','2022-12-27 09:49:02'),
(41,41,'lab_redis','1108',0,10,30,'docker',NULL,41,NULL,'2022-12-01 00:00:00');
/*!40000 ALTER TABLE `Lab` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-22 11:04:25
