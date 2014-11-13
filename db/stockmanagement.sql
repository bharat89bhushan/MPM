-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2014 at 09:26 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `stockmanagement`
--
CREATE DATABASE IF NOT EXISTS `stockmanagement` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stockmanagement`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items` (
`id` int(10) NOT NULL,
  `code` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `type_id` int(2) NOT NULL,
  `is_manufactured` int(2) NOT NULL DEFAULT '0',
  `org_id` int(2) NOT NULL DEFAULT '0',
  `unit_type` int(2) NOT NULL DEFAULT '0',
  `created_by` int(2) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `code`, `name`, `type_id`, `is_manufactured`, `org_id`, `unit_type`, `created_by`, `date`) VALUES
(15, 'T-001', 'Thread_Grey', 1, 0, 0, 2, 0, '2014-10-26 15:54:32'),
(16, 'T-002', 'Thread_Black', 1, 0, 0, 2, 0, '2014-10-26 15:55:09'),
(17, 'L-001', 'Laces_Black', 2, 1, 0, 1, 0, '2014-10-26 15:55:42'),
(18, 'A001', 'Shoes Black', 2, 1, 0, 1, 0, '2014-10-26 17:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `items_composition_details`
--

CREATE TABLE IF NOT EXISTS `items_composition_details` (
`icd_id` int(11) NOT NULL,
  `comp_id` int(11) NOT NULL,
  `Item_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_composition_details`
--

INSERT INTO `items_composition_details` (`icd_id`, `comp_id`, `Item_id`, `value`) VALUES
(4, 17, 16, 2.0000),
(5, 17, 15, 1.0000),
(6, 18, 17, 2.0000);

-- --------------------------------------------------------

--
-- Table structure for table `stock_details`
--

CREATE TABLE IF NOT EXISTS `stock_details` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `value` decimal(10,4) NOT NULL DEFAULT '0.0000'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_details`
--

INSERT INTO `stock_details` (`id`, `item_id`, `value`) VALUES
(11, 15, 4.0000),
(12, 16, 6.0000),
(13, 17, 14.0000),
(14, 18, 6.0000);

-- --------------------------------------------------------

--
-- Table structure for table `stock_trans_details`
--

CREATE TABLE IF NOT EXISTS `stock_trans_details` (
`id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `qty` decimal(10,4) NOT NULL,
  `trans_type` int(1) NOT NULL,
  `date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `value` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(2, 'bharat', 'bharat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items_composition_details`
--
ALTER TABLE `items_composition_details`
 ADD PRIMARY KEY (`icd_id`);

--
-- Indexes for table `stock_details`
--
ALTER TABLE `stock_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_trans_details`
--
ALTER TABLE `stock_trans_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `items_composition_details`
--
ALTER TABLE `items_composition_details`
MODIFY `icd_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stock_details`
--
ALTER TABLE `stock_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `stock_trans_details`
--
ALTER TABLE `stock_trans_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
