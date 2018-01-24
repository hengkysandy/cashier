-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.58-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for cashier
CREATE DATABASE IF NOT EXISTS `cashier` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cashier`;

-- Dumping structure for table cashier.item
CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table cashier.item: ~0 rows (approximately)
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
REPLACE INTO `item` (`id`, `name`, `price`, `stock`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'itemtest01', 5000, 50, NULL, '2018-01-09 21:56:50', '2018-01-09 22:08:39', NULL),
	(2, 'itemtest02', 20000, 5, 'active', '2018-01-09 22:08:32', '2018-01-09 22:08:32', NULL);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;

-- Dumping structure for table cashier.role
CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table cashier.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
REPLACE INTO `role` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Manager', '2017-12-01 18:29:26', '0000-00-00 00:00:00', NULL),
	(2, 'Staff', '2017-12-01 18:29:31', '0000-00-00 00:00:00', NULL);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;

-- Dumping structure for table cashier.employee
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `emp_to_role` (`role_id`),
  CONSTRAINT `emp_to_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table cashier.employee: ~0 rows (approximately)
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
REPLACE INTO `employee` (`id`, `role_id`, `email`, `name`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 'fidelson.tanzil@yahoo.com', 'admin', 'admin', 'active', '2018-01-09 21:56:50', NULL, NULL),
	(2, 2, 'staff@yahoo.com', 'staff', 'staff', 'active', '2018-01-09 22:08:11', '2018-01-09 22:08:11', NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;

-- Dumping structure for table cashier.room
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table cashier.room: ~0 rows (approximately)
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
REPLACE INTO `room` (`id`, `name`, `price`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Room01', 100000, 'Room', '2018-01-09 22:02:46', '2018-01-09 22:02:46', NULL),
	(2, 'Hall01', 0, 'Hall', '2018-01-09 22:02:54', '2018-01-09 22:02:54', NULL),
	(3, 'Hall02', NULL, 'Hall', '2018-01-09 22:06:23', '2018-01-09 22:06:23', NULL),
	(4, 'Hall03', NULL, 'Hall', '2018-01-09 22:07:03', '2018-01-09 22:07:03', NULL),
	(5, 'Hall05', NULL, 'Hall', '2018-01-09 22:07:44', '2018-01-09 22:07:44', NULL);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;

-- Dumping structure for table cashier.transaction
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) DEFAULT NULL,
  `room_price` float DEFAULT NULL,
  `employee_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_phone` varchar(255) DEFAULT NULL,
  `booking_hour` int(11) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tr_to_emp` (`employee_id`),
  KEY `tr_to_room` (`room_id`),
  CONSTRAINT `tr_to_emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tr_to_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cashier.transaction: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;

-- Dumping structure for table cashier.transaction_detail
CREATE TABLE IF NOT EXISTS `transaction_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaction` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `other_item_name` varchar(255) DEFAULT NULL,
  `other_item_price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tr_dt_to_item` (`item_id`),
  KEY `tr_dt_to_tr` (`id_transaction`),
  CONSTRAINT `tr_dt_to_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tr_dt_to_tr` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table cashier.transaction_detail: ~0 rows (approximately)
/*!40000 ALTER TABLE `transaction_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaction_detail` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
