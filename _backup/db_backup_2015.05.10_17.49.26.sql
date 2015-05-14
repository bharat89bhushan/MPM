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
-- TABLE DATA article_details
-- -------------------------------------------
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('1','1','1');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('2','1','2');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('3','1','3');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('4','1','4');
INSERT INTO `article_details` (`id`,`article_id`,`process_id`) VALUES
('5','1','5');



-- -------------------------------------------
-- TABLE DATA article_group_details
-- -------------------------------------------
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('1','1','1');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('2','1','2');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('3','1','3');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('4','1','4');
INSERT INTO `article_group_details` (`id`,`article_group_id`,`process_id`) VALUES
('5','1','5');



-- -------------------------------------------
-- TABLE DATA article_groups
-- -------------------------------------------
INSERT INTO `article_groups` (`id`,`name`) VALUES
('1','B-2');



-- -------------------------------------------
-- TABLE DATA article_process_details
-- -------------------------------------------
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('1','1','1','0.5000');
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('2','4','2','0.2000');
INSERT INTO `article_process_details` (`id`,`article_detail_id`,`item_id`,`qty`) VALUES
('3','5','3','1.0000');



-- -------------------------------------------
-- TABLE DATA article_properties
-- -------------------------------------------
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('1','1','1');
INSERT INTO `article_properties` (`id`,`article_id`,`prop_val_id`) VALUES
('2','1','3');



-- -------------------------------------------
-- TABLE DATA articles
-- -------------------------------------------
INSERT INTO `articles` (`id`,`name`,`code`,`date`,`unit_id`,`calc_per_qty`,`pack_unit_id`,`pack_qty`,`article_group_id`) VALUES
('1','B-2','B-2_BLACK_4*7','2015-05-09 17:15:18','2','100','3','42.0000','1');



-- -------------------------------------------
-- TABLE DATA config_item_types
-- -------------------------------------------
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('2','rexin','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('3','chemical','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('4','packing-accs','');
INSERT INTO `config_item_types` (`id`,`name`,`desc`) VALUES
('5','upper','');



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
-- TABLE DATA config_party_types
-- -------------------------------------------
INSERT INTO `config_party_types` (`id`,`name`) VALUES
('1','Vender');
INSERT INTO `config_party_types` (`id`,`name`) VALUES
('2','Fabricator');



-- -------------------------------------------
-- TABLE DATA config_plan_status
-- -------------------------------------------
INSERT INTO `config_plan_status` (`id`,`name`) VALUES
('0','Complete');
INSERT INTO `config_plan_status` (`id`,`name`) VALUES
('1','In-Progress');



-- -------------------------------------------
-- TABLE DATA config_process
-- -------------------------------------------
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('1','cutting','','2015-05-09');
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('2','printing','','2015-05-09');
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('3','stiching','','2015-05-09');
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('4','molding','','2015-05-09');
INSERT INTO `config_process` (`id`,`name`,`descp`,`date`) VALUES
('5','packing','','2015-05-09');



-- -------------------------------------------
-- TABLE DATA config_prop_type_values
-- -------------------------------------------
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('1','1','black','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('2','1','brown','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('3','2','4*7','');
INSERT INTO `config_prop_type_values` (`id`,`prop_type_id`,`name`,`desc`) VALUES
('4','2','5*8','');



-- -------------------------------------------
-- TABLE DATA config_prop_types
-- -------------------------------------------
INSERT INTO `config_prop_types` (`id`,`name`,`desc`) VALUES
('1','colour','');
INSERT INTO `config_prop_types` (`id`,`name`,`desc`) VALUES
('2','size','');



-- -------------------------------------------
-- TABLE DATA config_quality_types
-- -------------------------------------------
INSERT INTO `config_quality_types` (`id`,`code`,`name`,`descp`) VALUES
('1','A','fresh','');
INSERT INTO `config_quality_types` (`id`,`code`,`name`,`descp`) VALUES
('2','B','semi','');



-- -------------------------------------------
-- TABLE DATA config_unit_details
-- -------------------------------------------
INSERT INTO `config_unit_details` (`id`,`unit_id`,`sub_unit_id`,`qty`) VALUES
('1','3','2','24.0000');



-- -------------------------------------------
-- TABLE DATA config_units
-- -------------------------------------------
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('1','metre','m','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('2','pair','pr','2');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('3','carten','cr','3');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('4','kilogram','kg','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('5','gram','g','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('6','piece','pc','1');
INSERT INTO `config_units` (`id`,`name`,`sign`,`master_id`) VALUES
('7','pair','pr','1');



-- -------------------------------------------
-- TABLE DATA godown_stocks
-- -------------------------------------------
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('1','1','1','2.0000','3');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('2','1','1','0.0000','2');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('3','1','2','1.0000','3');
INSERT INTO `godown_stocks` (`id`,`article_id`,`quality_id`,`qty`,`unit_id`) VALUES
('4','1','2','8.0000','2');



-- -------------------------------------------
-- TABLE DATA item_properties
-- -------------------------------------------
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('1','1','2');
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('2','2','1');
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('3','4','3');
INSERT INTO `item_properties` (`id`,`item_id`,`prop_val_id`) VALUES
('4','4','1');



-- -------------------------------------------
-- TABLE DATA items
-- -------------------------------------------
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('1','REXIN_1.8','1.8','2','1','2','2015-05-09 17:04:56','599.5000');
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('2','CHEMICAL_PU','pu','3','4','2','2015-05-09 17:21:59','200.0000');
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('3','PACKING-ACCS_BOX','box','4','6','2','2015-05-09 17:25:45','740.0000');
INSERT INTO `items` (`id`,`code`,`name`,`type_id`,`unit_type`,`created_by`,`date`,`qty`) VALUES
('4','UPPER_B2','b2','5','7','2','2015-05-09 17:29:19','400.0000');



-- -------------------------------------------
-- TABLE DATA parties
-- -------------------------------------------
INSERT INTO `parties` (`id`,`code`,`name`,`type_id`) VALUES
('1','fabricator','babu lal','2');
INSERT INTO `parties` (`id`,`code`,`name`,`type_id`) VALUES
('2','stichter','sumit','2');
INSERT INTO `parties` (`id`,`code`,`name`,`type_id`) VALUES
('3','printer','gajinder','2');
INSERT INTO `parties` (`id`,`code`,`name`,`type_id`) VALUES
('4','cutter','shyam','2');
INSERT INTO `parties` (`id`,`code`,`name`,`type_id`) VALUES
('5','purchaser','arun','2');
INSERT INTO `parties` (`id`,`code`,`name`,`type_id`) VALUES
('6','molder','upender','2');
INSERT INTO `parties` (`id`,`code`,`name`,`type_id`) VALUES
('7','nBabu','babu lal','2');



-- -------------------------------------------
-- TABLE DATA party_item_stock
-- -------------------------------------------
INSERT INTO `party_item_stock` (`id`,`item_id`,`party_id`,`qty`) VALUES
('1','1','4','45.0000');
INSERT INTO `party_item_stock` (`id`,`item_id`,`party_id`,`qty`) VALUES
('2','2','6','146.0000');
INSERT INTO `party_item_stock` (`id`,`item_id`,`party_id`,`qty`) VALUES
('3','1','2','0.0000');



-- -------------------------------------------
-- TABLE DATA production_plan_details
-- -------------------------------------------
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('1','1','1','2015-05-09 17:32:13','0','2015-05-09 17:37:44','4','310.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('2','1','2','2015-05-09 17:38:19','0','2015-05-09 17:38:43','3','300.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('3','1','3','2015-05-09 17:39:04','0','2015-05-09 17:39:26','2','280.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('4','1','4','2015-05-09 17:40:04','0','2015-05-09 17:41:17','6','270.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('5','1','5','2015-05-09 17:42:13','0','2015-05-09 17:42:59','0','260.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('6','2','1','2015-05-10 14:34:28','0','2015-05-10 16:31:18','2','1.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('7','2','2','2015-05-10 16:01:38','1','','0','0.0000');
INSERT INTO `production_plan_details` (`id`,`production_plan_id`,`article_detail_id`,`date`,`status`,`updated`,`party_id`,`val`) VALUES
('8','2','5','2015-05-10 16:01:57','1','','0','0.0000');



-- -------------------------------------------
-- TABLE DATA production_plan_final_details
-- -------------------------------------------
INSERT INTO `production_plan_final_details` (`id`,`plan_id`,`quality_id`,`qty`,`date`) VALUES
('1','1','1','218.0000','2015-05-09 17:53:17');
INSERT INTO `production_plan_final_details` (`id`,`plan_id`,`quality_id`,`qty`,`date`) VALUES
('2','1','2','42.0000','2015-05-09 17:53:17');



-- -------------------------------------------
-- TABLE DATA production_plans
-- -------------------------------------------
INSERT INTO `production_plans` (`id`,`article_id`,`value`,`status`,`date`,`qty`,`packed`) VALUES
('1','1','300.0000','0','2015-05-09 17:31:29','0.0000','1');
INSERT INTO `production_plans` (`id`,`article_id`,`value`,`status`,`date`,`qty`,`packed`) VALUES
('2','1','2.0000','1','2015-05-10 14:33:31','0.0000','0');



-- -------------------------------------------
-- TABLE DATA purchase_order_details
-- -------------------------------------------
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('1','1','1','50.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('2','2','4','400.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('3','3','1','250.0000');
INSERT INTO `purchase_order_details` (`id`,`purchase_order_id`,`item_id`,`qty`) VALUES
('4','3','2','200.0000');



-- -------------------------------------------
-- TABLE DATA purchase_orders
-- -------------------------------------------
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('1','5','2015-05-09 17:11:53');
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('2','1','2015-05-09 17:29:41');
INSERT INTO `purchase_orders` (`id`,`party_id`,`date`) VALUES
('3','1','2015-05-10 13:48:04');



-- -------------------------------------------
-- TABLE DATA sales_order_details
-- -------------------------------------------
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('3','1','1','1.0000');
INSERT INTO `sales_order_details` (`id`,`order_id`,`godown_id`,`qty`) VALUES
('4','2','1','2.0000');



-- -------------------------------------------
-- TABLE DATA sales_orders
-- -------------------------------------------
INSERT INTO `sales_orders` (`id`,`party_id`,`date`) VALUES
('1','1','2015-05-09 17:58:56');
INSERT INTO `sales_orders` (`id`,`party_id`,`date`) VALUES
('2','2','2015-05-10 13:58:45');



-- -------------------------------------------
-- TABLE DATA stock_trans_details
-- -------------------------------------------
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('1','1','155.0000','0','2015-05-09 17:37:44','1');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('2','2','54.0000','0','2015-05-09 17:41:17','4');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('3','3','260.0000','0','2015-05-09 17:42:59','5');
INSERT INTO `stock_trans_details` (`id`,`item_id`,`qty`,`trans_type`,`date`,`production_plan_detail_id`) VALUES
('4','1','0.5000','0','2015-05-10 16:31:18','6');



-- -------------------------------------------
-- TABLE DATA transfer_order_details
-- -------------------------------------------
INSERT INTO `transfer_order_details` (`id`,`transfer_id`,`item_id`,`qty`) VALUES
('1','1','1','200.0000');
INSERT INTO `transfer_order_details` (`id`,`transfer_id`,`item_id`,`qty`) VALUES
('2','2','2','200.0000');
INSERT INTO `transfer_order_details` (`id`,`transfer_id`,`item_id`,`qty`) VALUES
('3','3','1','0.5000');



-- -------------------------------------------
-- TABLE DATA transfer_orders
-- -------------------------------------------
INSERT INTO `transfer_orders` (`id`,`party_id`,`date`) VALUES
('1','4','2015-05-09 17:37:10');
INSERT INTO `transfer_orders` (`id`,`party_id`,`date`) VALUES
('2','6','2015-05-09 17:40:36');
INSERT INTO `transfer_orders` (`id`,`party_id`,`date`) VALUES
('3','2','2015-05-10 16:26:38');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
