-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `article_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `article_details`;
CREATE TABLE IF NOT EXISTS `article_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `article_group_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `article_group_details`;
CREATE TABLE IF NOT EXISTS `article_group_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_group_id` int(11) NOT NULL,
  `process_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `article_groups`
-- -------------------------------------------
DROP TABLE IF EXISTS `article_groups`;
CREATE TABLE IF NOT EXISTS `article_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `article_process_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `article_process_details`;
CREATE TABLE IF NOT EXISTS `article_process_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_detail_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `article_properties`
-- -------------------------------------------
DROP TABLE IF EXISTS `article_properties`;
CREATE TABLE IF NOT EXISTS `article_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `prop_val_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `articles`
-- -------------------------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_item_types`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_item_types`;
CREATE TABLE IF NOT EXISTS `config_item_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_master`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_master`;
CREATE TABLE IF NOT EXISTS `config_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `descp` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_plan_status`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_plan_status`;
CREATE TABLE IF NOT EXISTS `config_plan_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_process`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_process`;
CREATE TABLE IF NOT EXISTS `config_process` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `descp` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_prop_type_values`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_prop_type_values`;
CREATE TABLE IF NOT EXISTS `config_prop_type_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prop_type_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_prop_types`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_prop_types`;
CREATE TABLE IF NOT EXISTS `config_prop_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_quality_types`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_quality_types`;
CREATE TABLE IF NOT EXISTS `config_quality_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `descp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_unit_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_unit_details`;
CREATE TABLE IF NOT EXISTS `config_unit_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `sub_unit_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `config_units`
-- -------------------------------------------
DROP TABLE IF EXISTS `config_units`;
CREATE TABLE IF NOT EXISTS `config_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `sign` varchar(5) NOT NULL,
  `master_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `godown_stocks`
-- -------------------------------------------
DROP TABLE IF EXISTS `godown_stocks`;
CREATE TABLE IF NOT EXISTS `godown_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  `unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `item_properties`
-- -------------------------------------------
DROP TABLE IF EXISTS `item_properties`;
CREATE TABLE IF NOT EXISTS `item_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `prop_val_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `items`
-- -------------------------------------------
DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type_id` int(2) NOT NULL,
  `unit_type` int(2) NOT NULL DEFAULT '0',
  `created_by` int(2) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `parties`
-- -------------------------------------------
DROP TABLE IF EXISTS `parties`;
CREATE TABLE IF NOT EXISTS `parties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `party_item_stock`
-- -------------------------------------------
DROP TABLE IF EXISTS `party_item_stock`;
CREATE TABLE IF NOT EXISTS `party_item_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `party_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `production_plan_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `production_plan_details`;
CREATE TABLE IF NOT EXISTS `production_plan_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `production_plan_id` int(11) NOT NULL,
  `article_detail_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `updated` datetime DEFAULT NULL,
  `party_id` int(11) NOT NULL DEFAULT '0',
  `val` decimal(10,4) NOT NULL DEFAULT '0.0000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `production_plan_final_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `production_plan_final_details`;
CREATE TABLE IF NOT EXISTS `production_plan_final_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `production_plans`
-- -------------------------------------------
DROP TABLE IF EXISTS `production_plans`;
CREATE TABLE IF NOT EXISTS `production_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL,
  `status` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `qty` decimal(10,4) NOT NULL DEFAULT '0.0000',
  `packed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `purchase_order_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `purchase_order_details`;
CREATE TABLE IF NOT EXISTS `purchase_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `purchase_order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `purchase_orders`
-- -------------------------------------------
DROP TABLE IF EXISTS `purchase_orders`;
CREATE TABLE IF NOT EXISTS `purchase_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `party_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `sales_order_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `sales_order_details`;
CREATE TABLE IF NOT EXISTS `sales_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `godown_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `sales_orders`
-- -------------------------------------------
DROP TABLE IF EXISTS `sales_orders`;
CREATE TABLE IF NOT EXISTS `sales_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `party_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `stock_trans_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `stock_trans_details`;
CREATE TABLE IF NOT EXISTS `stock_trans_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  `trans_type` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `production_plan_detail_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `transfer_order_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `transfer_order_details`;
CREATE TABLE IF NOT EXISTS `transfer_order_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `transfer_orders`
-- -------------------------------------------
DROP TABLE IF EXISTS `transfer_orders`;
CREATE TABLE IF NOT EXISTS `transfer_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `party_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE DATA article_details
-- -------------------------------------------
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('38','17','1');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('39','17','2');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('40','17','5');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('41','17','6');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('42','18','1');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('43','18','2');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('44','18','5');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('45','19','1');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('46','19','2');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('47','19','5');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('48','19','6');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('49','20','2');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('50','20','5');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('51','20','6');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('52','20','1');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('53','21','1');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('54','21','2');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('55','21','5');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('56','22','1');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('57','22','2');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('58','22','5');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('59','22','6');



-- -------------------------------------------
-- TABLE DATA article_group_details
-- -------------------------------------------
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('4','4','1');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('5','4','2');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('6','4','5');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('7','4','6');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('8','5','1');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('9','5','2');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('10','5','5');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('11','6','1');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('12','6','2');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('13','6','5');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('14','6','6');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('15','7','2');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('16','7','5');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('17','7','6');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('18','8','1');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('19','8','2');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('20','8','5');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('21','8','6');



-- -------------------------------------------
-- TABLE DATA article_groups
-- -------------------------------------------
INSERT INTO `article_groups` (`id`,`name`) VALUES
('4','Hero-04');
INSERT INTO `article_groups` (`id`,`name`) VALUES
('5','Ferari-04');
INSERT INTO `article_groups` (`id`,`name`) VALUES
('6','A-02');
INSERT INTO `article_groups` (`id`,`name`) VALUES
('7','Z-2');
INSERT INTO `article_groups` (`id`,`name`) VALUES
('8','501');



-- -------------------------------------------
-- TABLE DATA article_process_details
-- -------------------------------------------
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('21','52','22','0.0500');
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('22','50','23','0.0200');
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('23','49','21','1.0000');
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('24','53','19','0.0200');
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('25','38','19','0.2000');
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('26','53','22','0.0400');



-- -------------------------------------------
-- TABLE DATA article_properties
-- -------------------------------------------
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('40','17','25');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('41','18','32');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('42','18','13');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('43','19','25');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('44','19','11');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('45','20','25');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('46','21','13');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('47','22','19');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('48','22','39');



-- -------------------------------------------
-- TABLE DATA articles
-- -------------------------------------------
INSERT INTO `articles` (`id`,`name`,`code`,`date`,`unit_id`,`calc_per_qty`,`pack_unit_id`,`pack_qty`,`article_group_id`) VALUES
('17','Hero-04','HERO-04_BROWN','2015-03-06 19:27:12','4','10','6','24.0000','4');
INSERT INTO `articles` (`id`,`name`,`code`,`date`,`unit_id`,`calc_per_qty`,`pack_unit_id`,`pack_qty`,`article_group_id`) VALUES
('18','Ferari-04','FERARI-04_GREEN_6*9','2015-03-06 19:37:27','4','12','6','26.0000','5');
INSERT INTO `articles` (`id`,`name`,`code`,`date`,`unit_id`,`calc_per_qty`,`pack_unit_id`,`pack_qty`,`article_group_id`) VALUES
('19','A-02','A-02_BROWN_4*5','2015-03-07 06:31:10','4','10','6','26.0000','6');
INSERT INTO `articles` (`id`,`name`,`code`,`date`,`unit_id`,`calc_per_qty`,`pack_unit_id`,`pack_qty`,`article_group_id`) VALUES
('20','Z-2','Z-2_BROWN','2015-04-08 09:12:07','4','100','6','42.0000','7');
INSERT INTO `articles` (`id`,`name`,`code`,`date`,`unit_id`,`calc_per_qty`,`pack_unit_id`,`pack_qty`,`article_group_id`) VALUES
('21','Ferari-04','FERARI-04_6*9','2015-04-12 14:25:34','4','50','6','24.0000','5');
INSERT INTO `articles` (`id`,`name`,`code`,`date`,`unit_id`,`calc_per_qty`,`pack_unit_id`,`pack_qty`,`article_group_id`) VALUES
('22','501','501_5*10_TEN','2015-05-03 10:47:25','4','100','6','60.0000','8');



-- -------------------------------------------
-- TABLE DATA config_item_types
-- -------------------------------------------
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('1','Cloth','Basic material required for manufacturing');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('2','Accessories','Items produced to get re-use for manufacturing');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('3','Thread','Final completed product, Ready to Go');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('6','Compound','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('7','Raxin','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('8','Skin Fit','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('9','UPPER','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('10','Boxes','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('11','Camical','Pu Camical');



-- -------------------------------------------
-- TABLE DATA config_master
-- -------------------------------------------
INSERT INTO `config_master` (`id`,`name`,`descp`) VALUES
('1','Item','');
INSERT INTO `config_master` (`id`,`name`,`descp`) VALUES
('2','Article','');
INSERT INTO `config_master` (`id`,`name`,`descp`) VALUES
('3','Godown','');



-- -------------------------------------------
-- TABLE DATA config_plan_status
-- -------------------------------------------
INSERT INTO `config_plan_status` (`id`,`name`) VALUES
('0','Completed');
INSERT INTO `config_plan_status` (`id`,`name`) VALUES
('1','In Progress');



-- -------------------------------------------
-- TABLE DATA config_process
-- -------------------------------------------
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('1','cutting','','0000-00-00');
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('2','stiching','','0000-00-00');
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('5','Molding','','2015-01-19');
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('6','Inner Packing','','2015-01-19');



-- -------------------------------------------
-- TABLE DATA config_prop_type_values
-- -------------------------------------------
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('2','1','Dark Grey','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('6','3','Triangle','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('9','2','11*13','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('10','2','1*3','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('11','2','4*5','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('13','2','6*9','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('14','1','Black','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('15','1','White','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('16','1','Blue','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('17','2','4*7','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('18','2','4*8','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('19','2','5*10','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('20','2','8*10','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('21','2','4*9','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('22','2','5*8','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('23','2','6*8','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('24','2','6*10','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('25','1','BROWN','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('26','1','CHERRY','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('27','1','RED','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('28','1','PURPAL','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('29','1','PINK','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('30','1','BLACK','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('31','1','YELLOW','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('32','1','GREEN','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('33','1','CRM/BRN','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('34','1','PINK/PURPAL','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('35','1','ORANGE/RED','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('36','1','P.GREEN','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('37','1','N.BLUE','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('38','1','GOLDEN','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('39','1','TEN','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('40','1','MOUSE','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('41','1','BLACK/GREEN','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('42','1','BLUE/GREY','');



-- -------------------------------------------
-- TABLE DATA config_prop_types
-- -------------------------------------------
INSERT INTO `config_prop_types` (`id`,`name`,`desc`) VALUES
('1','Colour','item colour');
INSERT INTO `config_prop_types` (`id`,`name`,`desc`) VALUES
('2','Size','item size');
INSERT INTO `config_prop_types` (`id`,`name`,`desc`) VALUES
('3','Shape','');



-- -------------------------------------------
-- TABLE DATA config_quality_types
-- -------------------------------------------
INSERT INTO `config_quality_types` (`id`,`code`,`name`,`descp`) VALUES
('1','A','Fresh','');
INSERT INTO `config_quality_types` (`id`,`code`,`name`,`descp`) VALUES
('2','B','Semi','');



-- -------------------------------------------
-- TABLE DATA config_unit_details
-- -------------------------------------------
INSERT INTO `config_unit_details` (`id`,`unit_id`,`sub_unit_id`,`qty`) VALUES
('2','6','4','24.0000');



-- -------------------------------------------
-- TABLE DATA config_units
-- -------------------------------------------
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('1','Peice','pc','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('2','Meter','m','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('3','Gram','g','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('4','Pair','prs','2');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('5','Litre','l','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('6','Carten','Cr','3');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('7','PAIR','Prs.','1');



-- -------------------------------------------
-- TABLE DATA godown_stocks
-- -------------------------------------------
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('17','17','1','3.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('18','17','1','3.0000','4');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('19','17','2','0.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('20','17','2','18.0000','4');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('21','18','1','4.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('22','18','1','0.0000','4');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('23','18','2','1.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('24','18','2','0.0000','4');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('25','19','1','3.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('26','19','1','3.0000','4');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('27','19','2','0.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('28','19','2','0.0000','4');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('29','20','1','5.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('30','20','1','0.0000','4');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('31','20','2','0.0000','6');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('32','20','2','12.0000','4');



-- -------------------------------------------
-- TABLE DATA item_properties
-- -------------------------------------------
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('18','19','14');
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('22','21','25');
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('23','20','6');
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('25','22','25');



-- -------------------------------------------
-- TABLE DATA items
-- -------------------------------------------
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('19','CLOTH_SLIK','Slik','1','2','2','2015-03-08 17:22:16','154.0000');
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('20','ACCESSORIES_STICKER','Sticker','2','1','2','2015-04-07 18:50:02','122.0000');
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('21','UPPER_Z-2','Z-2','9','7','2','2015-04-08 09:08:58','350.0000');
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('22','RAXIN_2MM_BROWN','2mm','7','2','2','2015-04-08 09:09:38','380.0000');
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('23','CAMICAL_PU_CAMICAL','Pu Camical','11','5','2','2015-04-08 09:31:05','492.2000');



-- -------------------------------------------
-- TABLE DATA parties
-- -------------------------------------------
INSERT INTO `parties` (`id`,`code`,`name`) VALUES
('9','Vk_Fab','Vikash Fabricator');
INSERT INTO `parties` (`id`,`code`,`name`) VALUES
('10','Pur_Ajay','Purchaser Ajay');
INSERT INTO `parties` (`id`,`code`,`name`) VALUES
('11','Laminatior','K.B. Polymers');
INSERT INTO `parties` (`id`,`code`,`name`) VALUES
('12','Fabrictior','Shri Krishna');
INSERT INTO `parties` (`id`,`code`,`name`) VALUES
('13','','Amrit ');
INSERT INTO `parties` (`id`,`code`,`name`) VALUES
('14','','Goyel Footwear');



-- -------------------------------------------
-- TABLE DATA party_item_stock
-- -------------------------------------------
INSERT INTO `party_item_stock` (`id`,`item_id`,`party_id`,`qty`) VALUES
('1','19','9','8.0000');
INSERT INTO `party_item_stock` (`id`,`item_id`,`party_id`,`qty`) VALUES
('2','22','12','100.0000');
INSERT INTO `party_item_stock` (`id`,`item_id`,`party_id`,`qty`) VALUES
('3','21','12','50.0000');



-- -------------------------------------------
-- TABLE DATA production_plan_details
-- -------------------------------------------
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('1','1','39','2015-04-12 11:22:45','0','2015-04-12 11:42:01','9','90.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('2','1','38','2015-04-12 11:42:23','0','2015-04-12 11:42:34','0','100.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('4','2','45','2015-04-14 17:24:22','0','2015-04-14 17:25:38','0','50.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('5','2','46','2015-04-14 17:26:12','1','','9','0.0000');



-- -------------------------------------------
-- TABLE DATA production_plan_final_details
-- -------------------------------------------
INSERT INTO `production_plan_final_details` (`id`,`plan_id`,`quality_id`,`qty`,`date`) VALUES
('1','3','1','300.0000','2015-04-14 18:02:25');
INSERT INTO `production_plan_final_details` (`id`,`plan_id`,`quality_id`,`qty`,`date`) VALUES
('2','3','2','21.0000','2015-04-14 18:02:25');



-- -------------------------------------------
-- TABLE DATA production_plans
-- -------------------------------------------
INSERT INTO `production_plans` (`id`,`article_id`,`value`,`status`,`date`,`qty`,`packed`) VALUES
('1','17','100.0000','1','2015-04-12 11:22:33','0.0000','0');
INSERT INTO `production_plans` (`id`,`article_id`,`value`,`status`,`date`,`qty`,`packed`) VALUES
('2','19','140.0000','1','2015-04-12 18:03:10','0.0000','0');
INSERT INTO `production_plans` (`id`,`article_id`,`value`,`status`,`date`,`qty`,`packed`) VALUES
('3','20','321.0000','0','2015-04-14 17:46:13','0.0000','0');



-- -------------------------------------------
-- TABLE DATA purchase_order_details
-- -------------------------------------------
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('7','5','19','50.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('8','6','19','20.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('9','7','22','500.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('10','8','21','400.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('11','9','23','500.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('12','10','20','22.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('13','10','19','100.0000');



-- -------------------------------------------
-- TABLE DATA purchase_orders
-- -------------------------------------------
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('5','10','2015-03-08 17:25:39');
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('6','9','2015-04-05 07:11:56');
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('7','11','2015-04-08 09:14:14');
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('8','12','2015-04-08 09:14:59');
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('9','13','2015-04-08 09:31:24');
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('10','11','2015-05-01 15:05:23');



-- -------------------------------------------
-- TABLE DATA sales_order_details
-- -------------------------------------------
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('1','1','18','10.0000');
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('2','1','17','2.0000');
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('3','2','17','2.0000');
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('4','2','21','2.0000');
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('5','2','25','1.0000');
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('6','2','29','4.0000');



-- -------------------------------------------
-- TABLE DATA sales_orders
-- -------------------------------------------
INSERT INTO `sales_orders` (`id`,`party_id`,`date`) VALUES
('1','9','2015-03-07 13:14:28');
INSERT INTO `sales_orders` (`id`,`party_id`,`date`) VALUES
('2','14','2015-04-08 09:43:39');



-- -------------------------------------------
-- TABLE DATA stock_trans_details
-- -------------------------------------------
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('9','3','10.0000','0','2014-12-20 07:13:14','8');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('10','3','45.0000','0','2014-12-18 17:53:40','6');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('11','1','11.7000','0','2014-12-18 17:56:23','5');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('12','2','18.0000','0','2014-12-18 17:56:23','5');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('13','1','5.0000','0','2014-12-20 12:16:51','9');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('14','2','10.0000','0','2014-12-20 12:19:20','10');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('15','5','100.0000','0','2014-12-21 12:07:20','11');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('16','4','200.0000','0','2014-12-21 12:07:47','12');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('17','5','100.0000','0','2014-12-26 14:30:13','13');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('18','1','2.6000','0','2014-12-29 10:02:52','17');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('19','2','4.0000','0','2014-12-29 10:02:52','17');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('20','1','20.0000','0','2015-01-10 15:24:22','21');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('21','12','50.0000','0','2015-01-17 12:32:57','23');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('22','6','30.0000','0','2015-01-17 12:32:58','23');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('23','11','1.0000','0','2015-01-17 12:41:43','24');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('24','12','100.0000','0','2015-01-17 13:39:57','25');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('25','11','100.0000','0','2015-01-19 17:19:19','26');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('26','2','90.0000','0','2015-01-26 11:54:40','28');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('27','1','40.5000','0','2015-01-26 11:54:40','28');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('28','14','9.0000','0','2015-02-26 18:15:23','30');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('29','1','26.0000','0','2015-02-28 10:51:55','1');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('30','2','20.8000','0','2015-02-28 10:51:55','1');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('31','3','4.8000','0','2015-02-28 10:56:45','2');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('32','4','30.0000','0','2015-02-28 11:59:20','4');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('33','4','50.0000','0','2015-02-28 12:05:18','3');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('34','5','10.0000','0','2015-02-28 12:29:22','5');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('35','6','5.0500','0','2015-02-28 12:34:25','6');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('36','7','192.0000','0','2015-02-28 12:35:40','7');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('37','8','1.8000','0','2015-02-28 12:36:23','8');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('38','9','54.0000','0','2015-03-03 10:22:55','9');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('39','17','0.7200','0','2015-03-03 10:33:42','11');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('40','18','3.3600','0','2015-03-03 10:34:20','12');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('41','10','54.0000','0','2015-03-03 10:41:41','13');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('42','17','0.9000','0','2015-03-03 10:42:00','15');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('43','18','3.6000','0','2015-03-03 10:42:09','16');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('44','22','20.0000','0','2015-04-08 09:36:21','19');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('45','23','7.8000','0','2015-04-08 09:37:21','21');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('46','19','18.0000','0','2015-04-12 11:42:01','1');



-- -------------------------------------------
-- TABLE DATA transfer_order_details
-- -------------------------------------------
INSERT INTO `transfer_order_details` (`id`,`transfer_id`,`item_id`,`qty`) VALUES
('2','2','22','100.0000');
INSERT INTO `transfer_order_details` (`id`,`transfer_id`,`item_id`,`qty`) VALUES
('3','2','21','50.0000');
INSERT INTO `transfer_order_details` (`id`,`transfer_id`,`item_id`,`qty`) VALUES
('4','1','19','26.0000');



-- -------------------------------------------
-- TABLE DATA transfer_orders
-- -------------------------------------------
INSERT INTO `transfer_orders` (`id`,`party_id`,`date`) VALUES
('1','9','2015-03-08 17:26:56');
INSERT INTO `transfer_orders` (`id`,`party_id`,`date`) VALUES
('2','12','2015-04-08 18:11:49');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
