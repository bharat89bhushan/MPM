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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_details`
--

LOCK TABLES `article_details` WRITE;
/*!40000 ALTER TABLE `article_details` DISABLE KEYS */;
INSERT INTO `article_details` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,2,1),(7,2,2),(8,2,3),(9,2,4),(10,2,5);
/*!40000 ALTER TABLE `article_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_group_details`
--

DROP TABLE IF EXISTS `article_group_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_group_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_group_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_group_details`
--

LOCK TABLES `article_group_details` WRITE;
/*!40000 ALTER TABLE `article_group_details` DISABLE KEYS */;
INSERT INTO `article_group_details` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5);
/*!40000 ALTER TABLE `article_group_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_groups`
--

DROP TABLE IF EXISTS `article_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_groups`
--

LOCK TABLES `article_groups` WRITE;
/*!40000 ALTER TABLE `article_groups` DISABLE KEYS */;
INSERT INTO `article_groups` VALUES (1,'B-2');
/*!40000 ALTER TABLE `article_groups` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_process_details`
--

LOCK TABLES `article_process_details` WRITE;
/*!40000 ALTER TABLE `article_process_details` DISABLE KEYS */;
INSERT INTO `article_process_details` VALUES (1,1,1,0.5000),(2,4,2,0.2000),(3,5,3,1.0000);
/*!40000 ALTER TABLE `article_process_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `article_properties`
--

DROP TABLE IF EXISTS `article_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `prop_val_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article_properties`
--

LOCK TABLES `article_properties` WRITE;
/*!40000 ALTER TABLE `article_properties` DISABLE KEYS */;
INSERT INTO `article_properties` VALUES (1,1,1),(2,1,3),(3,2,4),(4,2,2);
/*!40000 ALTER TABLE `article_properties` ENABLE KEYS */;
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
  `date` datetime NOT NULL,
  `unit_id` int(11) NOT NULL DEFAULT '0',
  `calc_per_qty` int(11) NOT NULL DEFAULT '0',
  `pack_unit_id` int(11) NOT NULL DEFAULT '0',
  `pack_qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `article_group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES (1,'B-2','B-2_BLACK_4*7','2015-05-09 17:15:18',2,100,3,42.0000,1),(2,'B-2','B-2_5*8_BROWN','2015-05-14 18:00:32',2,10,3,22.0000,1);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
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
INSERT INTO `config_item_types` VALUES (2,'rexin',''),(3,'chemical',''),(4,'packing-accs',''),(5,'upper','');
/*!40000 ALTER TABLE `config_item_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_master`
--

DROP TABLE IF EXISTS `config_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `descp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_master`
--

LOCK TABLES `config_master` WRITE;
/*!40000 ALTER TABLE `config_master` DISABLE KEYS */;
INSERT INTO `config_master` VALUES (1,'Item',''),(2,'Article',''),(3,'Godown','');
/*!40000 ALTER TABLE `config_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_party_type`
--

DROP TABLE IF EXISTS `config_party_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_party_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_party_type`
--

LOCK TABLES `config_party_type` WRITE;
/*!40000 ALTER TABLE `config_party_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `config_party_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_party_types`
--

DROP TABLE IF EXISTS `config_party_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_party_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_party_types`
--

LOCK TABLES `config_party_types` WRITE;
/*!40000 ALTER TABLE `config_party_types` DISABLE KEYS */;
INSERT INTO `config_party_types` VALUES (1,'Vender'),(2,'Fabricator');
/*!40000 ALTER TABLE `config_party_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_plan_status`
--

DROP TABLE IF EXISTS `config_plan_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_plan_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_plan_status`
--

LOCK TABLES `config_plan_status` WRITE;
/*!40000 ALTER TABLE `config_plan_status` DISABLE KEYS */;
INSERT INTO `config_plan_status` VALUES (1,'In-Progress'),(2,'Complete');
/*!40000 ALTER TABLE `config_plan_status` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_process`
--

LOCK TABLES `config_process` WRITE;
/*!40000 ALTER TABLE `config_process` DISABLE KEYS */;
INSERT INTO `config_process` VALUES (1,'cutting','','2015-05-09'),(2,'printing','','2015-05-09'),(3,'stiching','','2015-05-09'),(4,'molding','','2015-05-09'),(5,'packing','','2015-05-09');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_prop_type_values`
--

LOCK TABLES `config_prop_type_values` WRITE;
/*!40000 ALTER TABLE `config_prop_type_values` DISABLE KEYS */;
INSERT INTO `config_prop_type_values` VALUES (1,1,'black',''),(2,1,'brown',''),(3,2,'4*7',''),(4,2,'5*8','');
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
INSERT INTO `config_prop_types` VALUES (1,'colour',''),(2,'size','');
/*!40000 ALTER TABLE `config_prop_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_quality_types`
--

DROP TABLE IF EXISTS `config_quality_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_quality_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `descp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_quality_types`
--

LOCK TABLES `config_quality_types` WRITE;
/*!40000 ALTER TABLE `config_quality_types` DISABLE KEYS */;
INSERT INTO `config_quality_types` VALUES (1,'A','fresh',''),(2,'B','semi','');
/*!40000 ALTER TABLE `config_quality_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_unit_details`
--

DROP TABLE IF EXISTS `config_unit_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_unit_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `sub_unit_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_unit_details`
--

LOCK TABLES `config_unit_details` WRITE;
/*!40000 ALTER TABLE `config_unit_details` DISABLE KEYS */;
INSERT INTO `config_unit_details` VALUES (1,3,2,24.0000);
/*!40000 ALTER TABLE `config_unit_details` ENABLE KEYS */;
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
  `master_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_units`
--

LOCK TABLES `config_units` WRITE;
/*!40000 ALTER TABLE `config_units` DISABLE KEYS */;
INSERT INTO `config_units` VALUES (1,'metre','m',1),(2,'pair','pr',2),(3,'carten','cr',3),(4,'kilogram','kg',1),(5,'gram','g',1),(6,'piece','pc',1),(7,'pair','pr',1),(8,'NCarten','nCr',3);
/*!40000 ALTER TABLE `config_units` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `godown_stocks`
--

DROP TABLE IF EXISTS `godown_stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `godown_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `godown_stocks`
--

LOCK TABLES `godown_stocks` WRITE;
/*!40000 ALTER TABLE `godown_stocks` DISABLE KEYS */;
INSERT INTO `godown_stocks` VALUES (1,1,1,2.0000,3),(2,1,1,0.0000,2),(3,1,2,1.0000,3),(4,1,2,8.0000,2);
/*!40000 ALTER TABLE `godown_stocks` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_properties`
--

LOCK TABLES `item_properties` WRITE;
/*!40000 ALTER TABLE `item_properties` DISABLE KEYS */;
INSERT INTO `item_properties` VALUES (1,1,2),(2,2,1),(3,4,3),(4,4,1),(5,5,1),(6,5,4);
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
  `code` varchar(50) NOT NULL,
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
INSERT INTO `items` VALUES (1,'REXIN_1.8','1.8',2,1,2,'2015-05-09 17:04:56',699.5000),(2,'CHEMICAL_PU','pu',3,4,2,'2015-05-09 17:21:59',200.0000),(3,'PACKING-ACCS_BOX','box',4,6,2,'2015-05-09 17:25:45',740.0000),(4,'UPPER_B2','b2',5,7,2,'2015-05-09 17:29:19',400.0000),(5,'PACKING-ACCS_2MM_BLACK_5*8','2mm',4,1,2,'2015-05-14 18:01:32',6.0000);
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
  `type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parties`
--

LOCK TABLES `parties` WRITE;
/*!40000 ALTER TABLE `parties` DISABLE KEYS */;
INSERT INTO `parties` VALUES (1,'fabricator','babu lal',2),(2,'stichter','sumit',2),(3,'printer','gajinder',2),(4,'cutter','shyam',2),(5,'purchaser','arun',2),(6,'molder','upender',2),(7,'nBabu','babu lal',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `party_item_stock`
--

LOCK TABLES `party_item_stock` WRITE;
/*!40000 ALTER TABLE `party_item_stock` DISABLE KEYS */;
INSERT INTO `party_item_stock` VALUES (1,1,4,45.0000),(2,2,6,146.0000),(3,1,2,0.0000);
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
  `val` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_plan_details`
--

LOCK TABLES `production_plan_details` WRITE;
/*!40000 ALTER TABLE `production_plan_details` DISABLE KEYS */;
INSERT INTO `production_plan_details` VALUES (1,1,1,'2015-05-09 17:32:13',0,'2015-05-09 17:37:44',4,310.0000),(2,1,2,'2015-05-09 17:38:19',0,'2015-05-09 17:38:43',3,300.0000),(3,1,3,'2015-05-09 17:39:04',0,'2015-05-09 17:39:26',2,280.0000),(4,1,4,'2015-05-09 17:40:04',0,'2015-05-09 17:41:17',6,270.0000),(5,1,5,'2015-05-09 17:42:13',0,'2015-05-09 17:42:59',0,260.0000),(6,2,1,'2015-05-10 14:34:28',0,'2015-05-10 16:31:18',2,1.0000),(7,2,2,'2015-05-10 16:01:38',1,'2015-05-12 12:06:31',0,0.0000),(8,2,5,'2015-05-10 16:01:57',1,'0000-00-00 00:00:00',0,0.0000);
/*!40000 ALTER TABLE `production_plan_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `production_plan_final_details`
--

DROP TABLE IF EXISTS `production_plan_final_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `production_plan_final_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_plan_final_details`
--

LOCK TABLES `production_plan_final_details` WRITE;
/*!40000 ALTER TABLE `production_plan_final_details` DISABLE KEYS */;
INSERT INTO `production_plan_final_details` VALUES (1,1,1,218.0000,'2015-05-09 17:53:17'),(2,1,2,42.0000,'2015-05-09 17:53:17');
/*!40000 ALTER TABLE `production_plan_final_details` ENABLE KEYS */;
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
  `qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `packed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `production_plans`
--

LOCK TABLES `production_plans` WRITE;
/*!40000 ALTER TABLE `production_plans` DISABLE KEYS */;
INSERT INTO `production_plans` VALUES (1,1,300.0000,0,'2015-05-09 17:31:29',0.0000,1),(2,1,2.0000,1,'2015-05-10 14:33:31',0.0000,0);
/*!40000 ALTER TABLE `production_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_order_details`
--

DROP TABLE IF EXISTS `purchase_order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_order_details`
--

LOCK TABLES `purchase_order_details` WRITE;
/*!40000 ALTER TABLE `purchase_order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_orders`
--

DROP TABLE IF EXISTS `purchase_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `party_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_orders`
--

LOCK TABLES `purchase_orders` WRITE;
/*!40000 ALTER TABLE `purchase_orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase_orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_order_details`
--

DROP TABLE IF EXISTS `sales_order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `godown_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_order_details`
--

LOCK TABLES `sales_order_details` WRITE;
/*!40000 ALTER TABLE `sales_order_details` DISABLE KEYS */;
INSERT INTO `sales_order_details` VALUES (3,1,1,1.0000),(4,2,1,2.0000);
/*!40000 ALTER TABLE `sales_order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales_orders`
--

DROP TABLE IF EXISTS `sales_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `party_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales_orders`
--

LOCK TABLES `sales_orders` WRITE;
/*!40000 ALTER TABLE `sales_orders` DISABLE KEYS */;
INSERT INTO `sales_orders` VALUES (1,1,'2015-05-09 17:58:56'),(2,2,'2015-05-10 13:58:45');
/*!40000 ALTER TABLE `sales_orders` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_trans_details`
--

LOCK TABLES `stock_trans_details` WRITE;
/*!40000 ALTER TABLE `stock_trans_details` DISABLE KEYS */;
INSERT INTO `stock_trans_details` VALUES (1,1,155.0000,0,'2015-05-09 17:37:44',1),(2,2,54.0000,0,'2015-05-09 17:41:17',4),(3,3,260.0000,0,'2015-05-09 17:42:59',5),(4,1,0.5000,0,'2015-05-10 16:31:18',6);
/*!40000 ALTER TABLE `stock_trans_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sys_details`
--

DROP TABLE IF EXISTS `sys_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sys_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mac` varchar(200) NOT NULL,
  `os` varchar(10) NOT NULL,
  `block` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sys_details`
--

LOCK TABLES `sys_details` WRITE;
/*!40000 ALTER TABLE `sys_details` DISABLE KEYS */;
INSERT INTO `sys_details` VALUES (1,'9b5e376a952872074bf8c64184c3b9f3','linux',0);
/*!40000 ALTER TABLE `sys_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_order_details`
--

DROP TABLE IF EXISTS `transfer_order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_order_details`
--

LOCK TABLES `transfer_order_details` WRITE;
/*!40000 ALTER TABLE `transfer_order_details` DISABLE KEYS */;
INSERT INTO `transfer_order_details` VALUES (1,1,1,200.0000),(2,2,2,200.0000),(3,3,1,0.5000);
/*!40000 ALTER TABLE `transfer_order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer_orders`
--

DROP TABLE IF EXISTS `transfer_orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `party_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer_orders`
--

LOCK TABLES `transfer_orders` WRITE;
/*!40000 ALTER TABLE `transfer_orders` DISABLE KEYS */;
INSERT INTO `transfer_orders` VALUES (1,4,'2015-05-09 17:37:10'),(2,6,'2015-05-09 17:40:36'),(3,2,'2015-05-10 16:26:38');
/*!40000 ALTER TABLE `transfer_orders` ENABLE KEYS */;
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
INSERT INTO `users` VALUES (2,'bharat','dfb57b2e5f36c1f893dbc12dd66897d4');
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

-- Dump completed on 2015-06-06  7:10:26
