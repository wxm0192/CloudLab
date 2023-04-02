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

LOCK TABLES `Lab01` WRITE;
/*!40000 ALTER TABLE `Lab` DISABLE KEYS */;
INSERT INTO `Lab01` VALUES 
(1,1,'my_web_ssh','22.1.31',0,10,30,'docker','Linux环境第一个C程序',1,NULL,'2022-12-01 00:00:00'),
(2,1,'my_web_ssh','22.1.31',0,10,30,'docker','Linux自由实验',1,NULL,'2022-12-01 00:00:00'),
(3,1,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','NFS 实现文件共享',2,'Liang Lei','2022-12-27 09:49:02'),
(4,1,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','iSCSI实现外部存储',2,'Liang Lei','2022-12-27 09:49:02'),
(5,1,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','全功能虚机自由实验',2,'Liang Lei','2022-12-27 09:49:02'),
(21,2,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','KVM资源管理',2,'Liang Lei','2022-12-27 09:49:02'),
(22,2,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','OVS集群实现分布式网络',2,'Liang Lei','2022-12-27 09:49:02'),
(23,2,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','OCFS2实现CAS共享文件系统',2,'Liang Lei','2022-12-27 09:49:02'),
(24,2,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','Ceph实现分布式存储',2,'Liang Lei','2022-12-27 09:49:02'),
(31,3,'lab_redis','22.1.31',0,10,30,'docker','JAVA调用Redis',31,NULL,'2022-12-01 00:00:00'),
(32,3,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','MySQL初体验',2,'Liang Lei','2022-12-27 09:49:02'),
(33,3,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','Kafka基本操作',2,'Liang Lei','2022-12-27 09:49:02'),
(34,3,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','Hadoop基本操作',2,'Liang Lei','2022-12-27 09:49:02'),
(35,3,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','搭建自己的第一个个人网站',2,'Liang Lei','2022-12-27 09:49:02'),
(41,4,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','绿洲平台演示',2,'Liang Lei','2022-12-27 09:49:02'),
(42,4,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','紫光云芯片设计平台演示',2,'Liang Lei','2022-12-27 09:49:02'),
(43,4,'m-8vbe58az41qxqfzwm6yh','1',1,10,30,'vm','RPA（业务过程机器人）演示',2,'Liang Lei','2022-12-27 09:49:02');
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
