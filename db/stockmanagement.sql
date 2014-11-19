-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: stockmanagement
-- ------------------------------------------------------
-- Server version	5.5.38-0ubuntu0.14.04.1

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (0,NULL,'Self'),(1,NULL,'Others');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_item_types`
--

DROP TABLE IF EXISTS `config_item_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_item_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_item_types`
--

LOCK TABLES `config_item_types` WRITE;
/*!40000 ALTER TABLE `config_item_types` DISABLE KEYS */;
INSERT INTO `config_item_types` VALUES (1,'Raw','Basic material required for manufacturing'),(2,'Semi','Items produced to get re-use for manufacturing'),(3,'Final','Final completed product, Ready to Go');
/*!40000 ALTER TABLE `config_item_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_units`
--

DROP TABLE IF EXISTS `config_units`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sign` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_units`
--

LOCK TABLES `config_units` WRITE;
/*!40000 ALTER TABLE `config_units` DISABLE KEYS */;
INSERT INTO `config_units` VALUES (1,'Peice','pc'),(2,'Meter','m'),(3,'Gram','g'),(4,'Pair','prs');
/*!40000 ALTER TABLE `config_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type_id` int(2) NOT NULL,
  `is_manufactured` int(2) NOT NULL DEFAULT '0',
  `org_id` int(2) NOT NULL DEFAULT '0',
  `unit_type` int(2) NOT NULL DEFAULT '0',
  `created_by` int(2) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (21,'UPR_CML_1','upper camel 1',2,1,0,1,2,'2014-11-09 12:01:56'),(22,'CLTH_CML_1','cloth camel 1',1,0,0,2,2,'2014-11-09 12:02:19'),(23,'CUT_CML_1','cutting camel 1',2,1,0,1,2,'2014-11-09 12:04:00'),(24,'FRI_21','Ferari-21',3,1,0,4,0,'2014-11-16 06:11:22'),(25,'CUT_FRI_21','cutting ferari 21',2,1,0,4,0,'2014-11-16 06:12:48'),(26,'CLTH_CHK_21','cloth check 21',1,0,0,2,0,'2014-11-16 06:14:31'),(27,'ELT_1','Eyelet_1',1,0,0,1,0,'2014-11-16 06:25:36'),(28,'T-003','Thread_Grey',1,0,0,2,2,'2014-11-16 10:16:41');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items_composition_details`
--

DROP TABLE IF EXISTS `items_composition_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `items_composition_details` (
  `icd_id` int(11) NOT NULL AUTO_INCREMENT,
  `comp_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL,
  PRIMARY KEY (`icd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_composition_details`
--

LOCK TABLES `items_composition_details` WRITE;
/*!40000 ALTER TABLE `items_composition_details` DISABLE KEYS */;
INSERT INTO `items_composition_details` VALUES (8,23,22,5.0000),(9,21,23,3.0000),(10,25,26,0.5000),(11,25,22,0.7000),(12,24,25,1.0000),(13,24,27,24.0000);
/*!40000 ALTER TABLE `items_composition_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_item_stock_relations`
--

DROP TABLE IF EXISTS `plan_item_stock_relations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_item_stock_relations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_item_stock_relations`
--

LOCK TABLES `plan_item_stock_relations` WRITE;
/*!40000 ALTER TABLE `plan_item_stock_relations` DISABLE KEYS */;
INSERT INTO `plan_item_stock_relations` VALUES (11,5,23,0.0000),(12,5,21,2.0000),(14,6,25,200.0000),(15,6,24,100.0000),(16,7,25,105.0000),(17,7,24,105.0000),(18,8,25,880.0000),(19,8,24,220.0000);
/*!40000 ALTER TABLE `plan_item_stock_relations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `production_plans`
--

DROP TABLE IF EXISTS `production_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `production_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_plans`
--

LOCK TABLES `production_plans` WRITE;
/*!40000 ALTER TABLE `production_plans` DISABLE KEYS */;
INSERT INTO `production_plans` VALUES (5,21,100.0000,1),(6,24,100.0000,1),(7,24,200.0000,1),(8,24,150.0000,1);
/*!40000 ALTER TABLE `production_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_details`
--

DROP TABLE IF EXISTS `stock_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_details`
--

LOCK TABLES `stock_details` WRITE;
/*!40000 ALTER TABLE `stock_details` DISABLE KEYS */;
INSERT INTO `stock_details` VALUES (17,21,9.0000),(18,22,60.0000),(19,23,24.0000),(20,24,125.0000),(21,25,75.0000),(22,26,50.0000),(23,27,0.0000),(24,28,0.0000);
/*!40000 ALTER TABLE `stock_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_trans_details`
--

DROP TABLE IF EXISTS `stock_trans_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_trans_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  `trans_type` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `value` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_trans_details`
--

LOCK TABLES `stock_trans_details` WRITE;
/*!40000 ALTER TABLE `stock_trans_details` DISABLE KEYS */;
INSERT INTO `stock_trans_details` VALUES (39,22,100.0000,1,'2014-11-09 12:05:05',2,100),(42,23,10.0000,1,'2014-11-09 12:18:48',2,20),(43,22,50.0000,0,'2014-11-09 12:18:48',2,0),(44,22,100.0000,1,'2014-11-09 12:19:07',2,100),(45,23,1.0000,1,'2014-11-10 16:39:31',2,21),(46,22,5.0000,0,'2014-11-10 16:39:31',2,95),(47,21,1.0000,1,'2014-11-10 16:40:11',2,1),(48,23,3.0000,0,'2014-11-10 16:40:11',2,18),(49,21,6.0000,1,'2014-11-10 16:41:17',2,7),(50,23,18.0000,0,'2014-11-10 16:41:17',2,0),(51,23,10.0000,1,'2014-11-11 17:09:53',2,10),(52,22,50.0000,0,'2014-11-11 17:09:53',2,45),(53,21,1.0000,1,'2014-11-11 17:57:53',2,8),(54,23,3.0000,0,'2014-11-11 17:57:53',2,10),(55,23,3.0000,1,'2014-11-12 16:15:42',2,13),(56,23,3.0000,1,'2014-11-12 16:16:24',2,16),(57,23,3.0000,1,'2014-11-12 16:19:44',2,19),(58,23,0.0000,1,'2014-11-12 16:39:24',2,19),(59,22,100.0000,1,'2014-11-12 16:45:48',2,100),(60,23,1.0000,1,'2014-11-12 16:46:06',2,20),(61,23,1.0000,1,'2014-11-12 16:46:27',2,21),(62,23,0.0000,1,'2014-11-12 16:46:34',2,21),(63,23,1.0000,1,'2014-11-12 16:47:04',2,22),(64,23,1.0000,1,'2014-11-12 16:47:48',2,23),(65,23,1.0000,1,'2014-11-12 16:48:10',2,24),(66,23,1.0000,1,'2014-11-12 16:52:48',2,25),(67,22,5.0000,0,'2014-11-12 16:52:48',2,70),(68,23,2.0000,1,'2014-11-12 17:16:13',2,27),(69,22,10.0000,0,'2014-11-12 17:16:13',2,60),(70,21,1.0000,1,'2014-11-12 17:17:39',2,9),(71,23,3.0000,0,'2014-11-12 17:17:39',2,24),(72,27,2000.0000,1,'2014-11-16 06:31:10',2,2000),(73,26,150.0000,1,'2014-11-16 06:31:45',2,150),(74,22,140.0000,1,'2014-11-16 06:34:49',2,200),(75,25,100.0000,1,'2014-11-16 06:57:47',2,100),(76,26,50.0000,0,'2014-11-16 06:57:47',2,100),(77,22,70.0000,0,'2014-11-16 06:57:47',2,130),(78,24,5.0000,1,'2014-11-16 09:52:54',2,5),(79,25,5.0000,0,'2014-11-16 09:52:55',2,95),(80,27,120.0000,0,'2014-11-16 09:52:55',2,1880),(81,24,50.0000,1,'2014-11-16 09:54:02',2,55),(82,25,50.0000,0,'2014-11-16 09:54:02',2,45),(83,27,1200.0000,0,'2014-11-16 09:54:02',2,680),(84,25,100.0000,1,'2014-11-16 13:20:30',2,145),(85,26,50.0000,0,'2014-11-16 13:20:30',2,50),(86,22,70.0000,0,'2014-11-16 13:20:30',2,60),(87,27,1000.0000,1,'2014-11-16 13:26:52',2,1680),(88,24,50.0000,1,'2014-11-16 13:27:44',2,105),(89,25,50.0000,0,'2014-11-16 13:27:44',2,95),(90,27,1200.0000,0,'2014-11-16 13:27:44',2,480),(91,24,20.0000,1,'2014-11-17 09:08:49',2,125),(92,25,20.0000,0,'2014-11-17 09:08:49',2,75),(93,27,480.0000,0,'2014-11-17 09:08:49',2,0);
/*!40000 ALTER TABLE `stock_trans_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'bharat','bharat');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-19 16:49:50
