-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2018 at 06:07 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cashier`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `role_id`, `email`, `name`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'manager1@gmail.com', 'manager1', '123123', 'active', '2017-12-01 11:30:04', '0000-00-00 00:00:00', NULL),
(2, 2, 'staff1@gmail.com', 'staff1', '123123', 'active', '2017-12-01 11:30:20', '0000-00-00 00:00:00', NULL),
(3, 2, 'staff2@gmail.com', 'staff2', '123123', 'active', '2017-12-01 11:30:32', '0000-00-00 00:00:00', NULL),
(4, 2, 'newStaff@gmail.com', 'newStaff', '123123', 'active', '2017-12-01 19:37:30', '2017-12-01 19:37:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id`, `name`, `price`, `stock`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'beer', 50000, 12, 'active', '2017-12-01 11:31:36', '2018-01-05 17:01:53', NULL),
(2, 'botol aqua', 4000, 48, 'active', '2017-12-01 11:31:53', '2017-12-26 04:25:49', NULL),
(3, 'teh kotak', 5000, 60, 'active', '2017-12-01 11:32:31', '0000-00-00 00:00:00', NULL),
(4, 'nasi padang', 15000, 10, 'active', '2017-12-01 11:32:54', '2018-01-05 17:01:53', NULL),
(5, 'item1', 5000, 88, 'active', '2017-12-01 19:42:51', '2017-12-01 19:42:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Manager', '2017-12-01 11:29:26', '0000-00-00 00:00:00', NULL),
(2, 'Staff', '2017-12-01 11:29:31', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `name`, `price`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Room601', 50000, 'Room', '2017-12-01 11:33:31', '0000-00-00 00:00:00', NULL),
(2, 'Room602', 60000, 'Room', '2017-12-01 11:33:42', '0000-00-00 00:00:00', NULL),
(3, 'Room603', 50000, 'Room', '2017-12-01 11:33:51', '0000-00-00 00:00:00', NULL),
(4, 'Room604', 60000, 'Room', '2017-12-01 11:34:02', '0000-00-00 00:00:00', NULL),
(5, 'Room605', 70000, 'Room', '2017-12-01 11:34:11', '0000-00-00 00:00:00', NULL),
(6, 'Hall701', NULL, 'Hall', '2017-12-01 11:34:25', '0000-00-00 00:00:00', NULL),
(7, 'Hall702', NULL, 'Hall', '2017-12-01 11:34:30', '0000-00-00 00:00:00', NULL),
(8, 'Hall703', NULL, 'Hall', '2017-12-01 11:34:40', '0000-00-00 00:00:00', NULL),
(9, 'Hall704', NULL, 'Hall', '2017-12-01 11:34:46', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
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
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `room_id`, `room_price`, `employee_id`, `customer_name`, `customer_phone`, `booking_hour`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 50000, 1, 'Mario', '081237182372', 8, '2017-12-26 02:00:00', '2017-12-26 10:00:00', 'Finalize', '2017-12-16 01:45:11', '2017-12-26 04:25:34', NULL),
(4, 1, 50000, 1, 'Hengky', '081237182372', 2, '2017-12-16 05:00:00', '2017-12-16 07:00:00', 'On Going', '2017-12-16 01:53:49', '2017-12-16 01:53:49', NULL),
(5, 2, 60000, 1, 'Tedy', '081201239321', 2, '2017-12-16 01:00:00', '2017-12-16 03:00:00', 'On Going', '2017-12-16 01:54:34', '2017-12-16 01:54:34', NULL),
(7, 1, 50000, 1, 'Hengaaa', '081201239321', 1, '2017-12-17 17:00:00', '2017-12-17 19:00:00', 'On Going', '2017-12-16 15:52:54', '2017-12-16 15:52:54', NULL),
(8, 1, 50000, 1, 'Fenky', '081201239321', 1, '2017-12-17 19:00:00', '2017-12-17 20:00:00', 'On Going', '2017-12-17 18:58:39', '2017-12-17 18:58:39', NULL),
(9, 1, 50000, 1, 'Tedy Junaidi', '081201239321', 2, '2017-12-18 18:00:00', '2017-12-18 20:00:00', 'On Going', '2017-12-18 17:39:22', '2017-12-18 17:39:22', NULL),
(13, 2, 60000, 1, 'Mario', '081237182372', 4, NULL, NULL, 'On Going', '2017-12-26 02:39:55', '2017-12-26 02:39:55', NULL),
(16, 1, 50000, 1, 'Cindy', '081237182372', 4, NULL, NULL, 'On Going', '2017-12-26 04:37:26', '2017-12-26 04:37:26', NULL),
(17, 1, 50000, 1, 'Mario', '081237182372', 2, NULL, NULL, 'Finalize', '2018-01-05 17:00:03', '2018-01-05 17:01:36', NULL),
(18, 2, 60000, 1, 'Mario', '081237182372', 2, NULL, NULL, 'Finalize', '2018-01-05 17:00:34', '2018-01-05 17:04:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id` int(11) NOT NULL,
  `id_transaction` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `item_price` float DEFAULT NULL,
  `other_item_name` varchar(255) DEFAULT NULL,
  `other_item_price` float DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `id_transaction`, `item_id`, `item_price`, `other_item_name`, `other_item_price`, `quantity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 3, 1, 50000, NULL, NULL, 5, '2017-12-16 01:45:11', '2017-12-16 01:45:11', NULL),
(8, 3, NULL, NULL, 'Es Teh', 2000, 10, '2017-12-16 01:45:11', '2017-12-16 01:45:11', NULL),
(9, 4, 2, 4000, NULL, NULL, 2, '2017-12-16 01:53:49', '2017-12-16 01:53:49', NULL),
(10, 5, 4, 15000, NULL, NULL, 3, '2017-12-16 01:54:34', '2017-12-16 01:54:34', NULL),
(11, 7, 1, 50000, NULL, NULL, 5, '2017-12-16 15:52:54', '2017-12-16 15:52:54', NULL),
(12, 7, NULL, NULL, 'Wine', 100000, 5, '2017-12-16 15:52:54', '2017-12-16 15:52:54', NULL),
(13, 8, 3, 5000, NULL, NULL, 5, '2017-12-17 18:58:39', '2017-12-17 18:58:39', NULL),
(14, 9, 1, 50000, NULL, NULL, 5, '2017-12-18 17:39:22', '2017-12-18 17:39:22', NULL),
(15, 13, 1, 50000, NULL, NULL, NULL, '2017-12-26 02:39:55', '2017-12-26 02:39:55', NULL),
(16, 3, 4, 15000, NULL, NULL, 1, '2017-12-26 03:09:39', '2017-12-26 03:09:39', NULL),
(18, 3, 2, 4000, NULL, NULL, 2, '2017-12-26 04:25:49', '2017-12-26 04:25:49', NULL),
(19, 16, 1, 50000, NULL, NULL, 1, '2017-12-26 04:37:26', '2017-12-26 04:37:26', NULL),
(20, 17, 1, 50000, NULL, NULL, 4, '2018-01-05 17:00:03', '2018-01-05 17:00:03', NULL),
(21, 17, 4, 15000, NULL, NULL, 2, '2018-01-05 17:00:18', '2018-01-05 17:00:18', NULL),
(22, 18, 1, 50000, NULL, NULL, 1, '2018-01-05 17:00:46', '2018-01-05 17:00:46', NULL),
(23, 17, 1, 50000, NULL, NULL, 1, '2018-01-05 17:01:53', '2018-01-05 17:01:53', NULL),
(24, 17, 4, 15000, NULL, NULL, 2, '2018-01-05 17:01:53', '2018-01-05 17:01:53', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emp_to_role` (`role_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tr_to_emp` (`employee_id`),
  ADD KEY `tr_to_room` (`room_id`);

--
-- Indexes for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tr_dt_to_item` (`item_id`),
  ADD KEY `tr_dt_to_tr` (`id_transaction`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `emp_to_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `tr_to_emp` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tr_to_room` FOREIGN KEY (`room_id`) REFERENCES `room` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD CONSTRAINT `tr_dt_to_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tr_dt_to_tr` FOREIGN KEY (`id_transaction`) REFERENCES `transaction` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
