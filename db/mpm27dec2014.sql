-- MySQL dump 10.13  Distrib 5.5.40, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: mpm
-- ------------------------------------------------------
-- Server version	5.5.40-0ubuntu0.14.04.1

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
-- Table structure for table `article_details`
--

DROP TABLE IF EXISTS `article_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_details`
--

LOCK TABLES `article_details` WRITE;
/*!40000 ALTER TABLE `article_details` DISABLE KEYS */;
INSERT INTO `article_details` VALUES (1,1,1),(4,1,2),(8,2,1),(9,2,2),(10,3,3),(11,3,4);
/*!40000 ALTER TABLE `article_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_process_details`
--

DROP TABLE IF EXISTS `article_process_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_process_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_detail_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_process_details`
--

LOCK TABLES `article_process_details` WRITE;
/*!40000 ALTER TABLE `article_process_details` DISABLE KEYS */;
INSERT INTO `article_process_details` VALUES (1,1,1,1.3000),(3,1,2,2.0000),(4,4,3,5.0000),(5,8,1,0.5000),(7,9,2,1.0000),(8,10,5,1.0000),(9,11,4,2.0000);
/*!40000 ALTER TABLE `article_process_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'Ferari 36','F36','2014-12-16'),(2,'Swed 1','SWD1','2014-12-20'),(3,'Laniyard','LANYRD','2014-12-21');
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_item_subtypes`
--

DROP TABLE IF EXISTS `config_item_subtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_item_subtypes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_item_subtypes`
--

LOCK TABLES `config_item_subtypes` WRITE;
/*!40000 ALTER TABLE `config_item_subtypes` DISABLE KEYS */;
/*!40000 ALTER TABLE `config_item_subtypes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_item_types`
--

LOCK TABLES `config_item_types` WRITE;
/*!40000 ALTER TABLE `config_item_types` DISABLE KEYS */;
INSERT INTO `config_item_types` VALUES (1,'Cloth','Basic material required for manufacturing'),(2,'Accessories','Items produced to get re-use for manufacturing'),(3,'Thread','Final completed product, Ready to Go'),(4,'Ink',NULL),(5,'Strip',NULL);
/*!40000 ALTER TABLE `config_item_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_process`
--

DROP TABLE IF EXISTS `config_process`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `descp` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_process`
--

LOCK TABLES `config_process` WRITE;
/*!40000 ALTER TABLE `config_process` DISABLE KEYS */;
INSERT INTO `config_process` VALUES (1,'cutting',NULL,NULL),(2,'stiching',NULL,NULL),(3,'printing',NULL,'2014-12-21'),(4,'fusion',NULL,'2014-12-21');
/*!40000 ALTER TABLE `config_process` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_prop_type_values`
--

DROP TABLE IF EXISTS `config_prop_type_values`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_prop_type_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prop_type_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_prop_type_values`
--

LOCK TABLES `config_prop_type_values` WRITE;
/*!40000 ALTER TABLE `config_prop_type_values` DISABLE KEYS */;
INSERT INTO `config_prop_type_values` VALUES (1,1,'Check',''),(2,1,'Dark Grey',''),(3,1,'Zebra',''),(4,2,'5-9',''),(5,2,'9-11','');
/*!40000 ALTER TABLE `config_prop_type_values` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_prop_types`
--

DROP TABLE IF EXISTS `config_prop_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_prop_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_prop_types`
--

LOCK TABLES `config_prop_types` WRITE;
/*!40000 ALTER TABLE `config_prop_types` DISABLE KEYS */;
INSERT INTO `config_prop_types` VALUES (1,'Colour','item colour'),(2,'Size','item size');
/*!40000 ALTER TABLE `config_prop_types` ENABLE KEYS */;
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
-- Table structure for table `item_properties`
--

DROP TABLE IF EXISTS `item_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `prop_val_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_properties`
--

LOCK TABLES `item_properties` WRITE;
/*!40000 ALTER TABLE `item_properties` DISABLE KEYS */;
INSERT INTO `item_properties` VALUES (31,74,1),(33,74,2),(34,74,4),(36,73,3),(37,75,4),(38,75,1),(39,76,4),(40,76,1),(41,77,1),(42,78,4),(43,78,1),(44,79,2),(45,80,5),(46,80,2),(47,1,5),(48,1,1),(49,3,2);
/*!40000 ALTER TABLE `item_properties` ENABLE KEYS */;
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
  `unit_type` int(2) NOT NULL DEFAULT '0',
  `created_by` int(2) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'CLOTH_BLACK_CHECK','Black Check',1,2,2,'2014-12-15 17:01:01',200.0000),(2,'SEMI_STICKER','Sticker',2,1,2,'2014-12-17 09:38:19',200.0000),(3,'THREAD_COTTON','Cotton',3,2,2,'2014-12-18 10:48:50',200.0000),(4,'STRIP_POLYESTER12','Polyester12',5,2,2,'2014-12-21 11:58:31',10.0000),(5,'INK_INKTECH_RED','InkTech Red',4,3,2,'2014-12-21 11:59:05',100.0000);
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parties`
--

DROP TABLE IF EXISTS `parties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parties`
--

LOCK TABLES `parties` WRITE;
/*!40000 ALTER TABLE `parties` DISABLE KEYS */;
INSERT INTO `parties` VALUES (1,'AL','Aluwalias'),(2,'RPM','Rupam');
/*!40000 ALTER TABLE `parties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `party_item_stock`
--

DROP TABLE IF EXISTS `party_item_stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `party_item_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `party_item_stock`
--

LOCK TABLES `party_item_stock` WRITE;
/*!40000 ALTER TABLE `party_item_stock` DISABLE KEYS */;
INSERT INTO `party_item_stock` VALUES (1,1,1,25.0000),(2,1,2,5.0000),(3,0,1,0.0000),(5,5,1,100.0000);
/*!40000 ALTER TABLE `party_item_stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `production_plan_details`
--

DROP TABLE IF EXISTS `production_plan_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `production_plan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `production_plan_id` int(11) NOT NULL,
  `article_detail_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `party_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_plan_details`
--

LOCK TABLES `production_plan_details` WRITE;
/*!40000 ALTER TABLE `production_plan_details` DISABLE KEYS */;
INSERT INTO `production_plan_details` VALUES (5,1,1,'2014-12-17 08:45:46',0,'2014-12-18 17:56:23',0),(6,1,4,'2014-12-17 17:21:11',0,'2014-12-18 17:53:40',0),(8,2,4,'2014-12-18 10:45:31',0,'2014-12-20 07:13:14',0),(9,3,8,'2014-12-20 12:14:37',0,'2014-12-20 12:16:51',0),(10,3,9,'2014-12-20 12:17:54',0,'2014-12-20 12:19:19',0),(11,4,10,'2014-12-21 12:03:55',0,'2014-12-21 12:07:20',0),(12,4,11,'2014-12-21 12:06:03',0,'2014-12-21 12:07:47',0),(14,1,1,'2014-12-26 10:25:26',1,NULL,1);
/*!40000 ALTER TABLE `production_plan_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `production_plans`
--

DROP TABLE IF EXISTS `production_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `production_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_plans`
--

LOCK TABLES `production_plans` WRITE;
/*!40000 ALTER TABLE `production_plans` DISABLE KEYS */;
INSERT INTO `production_plans` VALUES (1,1,9.0000,1,'2014-12-16 18:04:34'),(2,1,2.0000,1,'2014-12-18 10:45:25'),(3,2,10.0000,1,'2014-12-20 12:14:19'),(4,3,100.0000,1,'2014-12-21 12:03:40');
/*!40000 ALTER TABLE `production_plans` ENABLE KEYS */;
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
  `production_plan_detail_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_trans_details`
--

LOCK TABLES `stock_trans_details` WRITE;
/*!40000 ALTER TABLE `stock_trans_details` DISABLE KEYS */;
INSERT INTO `stock_trans_details` VALUES (9,3,10.0000,0,'2014-12-20 07:13:14',8),(10,3,45.0000,0,'2014-12-18 17:53:40',6),(11,1,11.7000,0,'2014-12-18 17:56:23',5),(12,2,18.0000,0,'2014-12-18 17:56:23',5),(13,1,5.0000,0,'2014-12-20 12:16:51',9),(14,2,10.0000,0,'2014-12-20 12:19:20',10),(15,5,100.0000,0,'2014-12-21 12:07:20',11),(16,4,200.0000,0,'2014-12-21 12:07:47',12),(17,5,100.0000,0,'2014-12-26 14:30:13',13);
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

-- Dump completed on 2014-12-27  9:15:39
