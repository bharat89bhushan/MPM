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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_item_subtypes`
--

LOCK TABLES `config_item_subtypes` WRITE;
/*!40000 ALTER TABLE `config_item_subtypes` DISABLE KEYS */;
INSERT INTO `config_item_subtypes` VALUES (1,1,'Cloth',NULL),(2,1,'Accesories',NULL),(3,2,'Upper',NULL),(4,2,'Mold',NULL),(5,3,'Shoe',NULL),(6,2,'Cutting',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_properties`
--

LOCK TABLES `item_properties` WRITE;
/*!40000 ALTER TABLE `item_properties` DISABLE KEYS */;
INSERT INTO `item_properties` VALUES (31,74,1),(33,74,2),(34,74,4),(36,73,3),(37,75,4),(38,75,1),(39,76,4),(40,76,1),(41,77,1),(42,78,4),(43,78,1),(44,79,2),(45,80,5),(46,80,2);
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
  `is_manufactured` int(2) NOT NULL DEFAULT '0',
  `org_id` int(2) NOT NULL DEFAULT '0',
  `unit_type` int(2) NOT NULL DEFAULT '0',
  `created_by` int(2) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (73,'RAW_ACCESORIES_BLACK_STICKER','Black Sticker',2,0,0,1,2,'2014-12-12 16:58:03'),(74,'SEMI_UPPER_FERARI21','Ferari21',3,1,0,1,2,'2014-12-12 17:59:03'),(75,'SEMI_MOLD_BASE','Base',4,0,0,1,2,'2014-12-12 18:59:02'),(76,'FINAL_SHOE_FERARI21','Ferari21',5,1,0,1,2,'2014-12-12 18:59:56'),(77,'RAW_CLOTH_MATTY','Matty',1,0,0,2,2,'2014-12-13 10:25:00'),(78,'SEMI_UPPER_HERO-4','Hero-4',3,1,0,4,2,'2014-12-13 10:25:46'),(79,'RAW_CLOTH_GREEN_CHECK','Green Check',1,0,0,2,2,'2014-12-13 10:50:35'),(80,'SEMI_UPPER_HERO-1','Hero-1',3,1,0,4,2,'2014-12-13 10:56:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items_composition_details`
--

LOCK TABLES `items_composition_details` WRITE;
/*!40000 ALTER TABLE `items_composition_details` DISABLE KEYS */;
INSERT INTO `items_composition_details` VALUES (22,74,73,2.0000),(23,76,74,2.0000),(24,76,75,2.0000),(25,78,77,0.5000),(26,78,73,2.0000),(27,80,79,0.5000),(28,80,77,0.4000);
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
  `value` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `req_qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_item_stock_relations`
--

LOCK TABLES `plan_item_stock_relations` WRITE;
/*!40000 ALTER TABLE `plan_item_stock_relations` DISABLE KEYS */;
INSERT INTO `plan_item_stock_relations` VALUES (64,48,76,10.0000,100.0000),(65,48,74,0.0000,200.0000),(66,48,73,10.0000,200.0000),(67,48,75,0.0000,200.0000),(68,49,76,0.0000,50.0000),(69,49,74,25.0000,75.0000),(70,49,73,0.0000,0.0000),(71,49,75,0.0000,100.0000),(72,50,76,0.0000,100.0000),(73,50,74,100.0000,100.0000),(74,50,73,0.0000,0.0000),(75,50,75,0.0000,200.0000),(76,51,76,1.0000,0.0000),(77,51,74,0.0000,0.0000),(78,51,73,0.0000,0.0000),(79,51,75,0.0000,0.0000),(80,52,76,0.0000,500.0000),(81,52,74,200.0000,800.0000),(82,52,73,0.0000,1600.0000),(83,52,75,500.0000,500.0000),(84,53,78,0.0000,100.0000),(85,53,77,0.0000,50.0000),(86,53,73,100.0000,100.0000),(87,54,78,0.0000,300.0000),(88,54,77,0.0000,150.0000),(89,54,73,0.0000,600.0000),(90,55,80,5.0000,15.0000),(91,55,79,2.5000,5.0000),(92,55,77,3.0000,3.0000);
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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_plans`
--

LOCK TABLES `production_plans` WRITE;
/*!40000 ALTER TABLE `production_plans` DISABLE KEYS */;
INSERT INTO `production_plans` VALUES (48,76,100.0000,1),(49,76,50.0000,1),(50,76,100.0000,1),(51,76,1.0000,1),(52,76,500.0000,1),(53,78,100.0000,1),(54,78,300.0000,1),(55,80,20.0000,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_details`
--

LOCK TABLES `stock_details` WRITE;
/*!40000 ALTER TABLE `stock_details` DISABLE KEYS */;
INSERT INTO `stock_details` VALUES (69,73,606.0000),(70,74,325.0000),(71,75,1098.0000),(72,76,11.0000),(73,77,13.0000),(74,78,0.0000),(75,79,12.5000),(76,80,5.0000);
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
) ENGINE=InnoDB AUTO_INCREMENT=186 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_trans_details`
--

LOCK TABLES `stock_trans_details` WRITE;
/*!40000 ALTER TABLE `stock_trans_details` DISABLE KEYS */;
INSERT INTO `stock_trans_details` VALUES (152,73,100.0000,1,'2014-12-12 19:13:59',2,100),(153,74,20.0000,1,'2014-12-12 19:15:38',2,20),(154,73,40.0000,0,'2014-12-12 19:15:38',2,60),(155,75,30.0000,1,'2014-12-12 19:16:32',2,30),(156,76,10.0000,1,'2014-12-12 19:17:28',2,10),(157,74,20.0000,0,'2014-12-12 19:17:28',2,0),(158,75,20.0000,0,'2014-12-12 19:17:28',2,10),(159,73,40.0000,1,'2014-12-12 19:38:14',2,100),(160,75,90.0000,1,'2014-12-12 19:38:23',2,100),(161,74,25.0000,1,'2014-12-12 19:39:35',2,25),(162,73,50.0000,0,'2014-12-12 19:39:35',2,50),(163,73,100.0000,1,'2014-12-12 19:42:23',2,150),(164,74,50.0000,1,'2014-12-12 19:42:48',2,75),(165,73,100.0000,0,'2014-12-12 19:42:48',2,50),(166,73,50.0000,1,'2014-12-12 19:43:30',2,100),(167,74,50.0000,1,'2014-12-12 19:44:08',2,125),(168,73,100.0000,0,'2014-12-12 19:44:08',2,0),(169,73,10.0000,1,'2014-12-12 19:47:27',2,10),(170,74,1.0000,1,'2014-12-12 19:47:58',2,126),(171,73,2.0000,0,'2014-12-12 19:47:58',2,8),(172,74,1.0000,1,'2014-12-12 19:48:25',2,127),(173,73,2.0000,0,'2014-12-12 19:48:25',2,6),(174,76,1.0000,1,'2014-12-12 19:48:57',2,11),(175,74,2.0000,0,'2014-12-12 19:48:57',2,125),(176,75,2.0000,0,'2014-12-12 19:48:57',2,98),(177,73,1000.0000,1,'2014-12-13 04:24:22',2,1006),(178,75,1000.0000,1,'2014-12-13 04:26:07',2,1098),(179,74,200.0000,1,'2014-12-13 04:26:42',2,325),(180,73,400.0000,0,'2014-12-13 04:26:42',2,606),(181,77,15.0000,1,'2014-12-13 10:27:58',2,15),(182,79,15.0000,1,'2014-12-13 10:59:19',2,15),(183,80,5.0000,1,'2014-12-13 11:03:44',2,5),(184,79,2.5000,0,'2014-12-13 11:03:44',2,13),(185,77,2.0000,0,'2014-12-13 11:03:44',2,13);
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

-- Dump completed on 2014-12-15 14:05:17
