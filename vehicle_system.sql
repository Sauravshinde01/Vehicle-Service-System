-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 11:17 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicle_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill_tab`
--

DROP TABLE IF EXISTS `bill_tab`;
CREATE TABLE `bill_tab` (
  `bill_id` int(11) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `license_number` bigint(14) NOT NULL,
  `date` date NOT NULL,
  `total_cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_tab`
--

INSERT INTO `bill_tab` (`bill_id`, `cust_email`, `license_number`, `date`, `total_cost`) VALUES
(1, 'relativity@gmail.com', 567651666520, '2021-07-07', 250),
(2, 'greatlife@gmail.com', 567651666520, '2021-07-07', 900);

-- --------------------------------------------------------

--
-- Table structure for table `login_tab`
--

DROP TABLE IF EXISTS `login_tab`;
CREATE TABLE `login_tab` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login_tab`
--

INSERT INTO `login_tab` (`email`, `password`) VALUES
('greatlife@gmail.com', 'greatlife'),
('relativity@gmail.com', 'relativity');

-- --------------------------------------------------------

--
-- Table structure for table `registration_tab`
--

DROP TABLE IF EXISTS `registration_tab`;
CREATE TABLE `registration_tab` (
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `confirm_password` varchar(50) NOT NULL,
  `mobile_number` int(10) NOT NULL,
  `vehicle_type` enum('2 Wheeler','4 Wheeler') NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `document_upload` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_tab`
--

INSERT INTO `registration_tab` (`first_name`, `last_name`, `email`, `password`, `confirm_password`, `mobile_number`, `vehicle_type`, `vehicle_number`, `document_upload`) VALUES
('Great ', 'Life', 'greatlife@gmail.com', 'greatlife', 'greatlife', 2147483647, '4 Wheeler', 'MH15Z5768', 'Customer panel.jpeg'),
('Albert', 'Einstein', 'relativity@gmail.com', 'relativity', 'relativity', 1234567890, '4 Wheeler', 'MH15Q5760', 'system architecture.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `bill_id` int(11) NOT NULL,
  `service` text NOT NULL,
  `cost` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`bill_id`, `service`, `cost`) VALUES
(1, 'periodic service', 250),
(2, 'periodic service', 500),
(2, 'accidental repair', 400);

-- --------------------------------------------------------

--
-- Table structure for table `shop_details`
--

DROP TABLE IF EXISTS `shop_details`;
CREATE TABLE `shop_details` (
  `working_hours` int(20) NOT NULL,
  `opening_time` varchar(12) NOT NULL,
  `closing_time` varchar(12) NOT NULL,
  `license_number` bigint(20) NOT NULL,
  `holiday` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `services_in_day` int(20) NOT NULL,
  `max_time_to_service` enum('1','2','3','4','5') NOT NULL,
  `vehicle_type` enum('2 Wheeler','4 Wheeler') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_details`
--

INSERT INTO `shop_details` (`working_hours`, `opening_time`, `closing_time`, `license_number`, `holiday`, `services_in_day`, `max_time_to_service`, `vehicle_type`) VALUES
(9, '10:00', '18:00', 78945612312, 'Tuesday', 25, '3', '4 Wheeler'),
(8, '12:00', '8:00', 567651666520, 'Tuesday', 15, '2', '4 Wheeler'),
(8, '12:00', '8:00', 963852741531, 'Wednesday', 20, '3', '4 Wheeler');

-- --------------------------------------------------------

--
-- Table structure for table `shop_login`
--

DROP TABLE IF EXISTS `shop_login`;
CREATE TABLE `shop_login` (
  `email` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_login`
--

INSERT INTO `shop_login` (`email`, `password`) VALUES
('bob@gmail.com', '12345'),
('mario@yahoo.com', 'mario'),
('wills@gmail.com', 'wills');

-- --------------------------------------------------------

--
-- Table structure for table `shop_reg`
--

DROP TABLE IF EXISTS `shop_reg`;
CREATE TABLE `shop_reg` (
  `full_name` text NOT NULL,
  `mobile_number` bigint(10) NOT NULL,
  `aadhar_number` bigint(12) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` enum('female','male','other') NOT NULL,
  `owner_state` text NOT NULL,
  `owner_city` text NOT NULL,
  `owner_address` varchar(50) NOT NULL,
  `owner_pincode` int(6) NOT NULL,
  `shop_name` varchar(20) NOT NULL,
  `license_number` bigint(14) NOT NULL,
  `shop_address` varchar(50) NOT NULL,
  `ownership` enum('self owned','rented') NOT NULL,
  `shop_state` varchar(20) NOT NULL,
  `shop_city` varchar(10) NOT NULL,
  `shop_pincode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_reg`
--

INSERT INTO `shop_reg` (`full_name`, `mobile_number`, `aadhar_number`, `email`, `password`, `birthdate`, `gender`, `owner_state`, `owner_city`, `owner_address`, `owner_pincode`, `shop_name`, `license_number`, `shop_address`, `ownership`, `shop_state`, `shop_city`, `shop_pincode`) VALUES
('Bob', 7875346948, 159753147963, 'bob@gmail.com', '12345', '1997-10-01', 'female', 'Delhi', 'Noida', 'Noida', 422105, 'Bob service center', 78945612312, 'Noida', 'rented', 'Delhi', 'Noida', 422105),
('Mario SpeedWagon', 5425656328, 686413311202, 'mario@yahoo.com', 'mario', '2010-06-16', 'male', 'Goa ', 'Panaji', '34, Asher Estate, Goa', 542630, 'Marios Station', 567651666520, 'Marios Station, Goa', 'self owned', 'Goa ', 'Panaji', 542630),
('Will', 7894561230, 741852963012, 'wills@gmail.com', 'wills', '2013-11-14', 'male', 'Maharashtra', 'Nashik', '3, Space, Nashik', 422101, 'Wills Service Statio', 963852741531, 'Wills Service Station, Nashik', 'rented', 'Maharashtra', 'Nashik', 422101);

-- --------------------------------------------------------

--
-- Table structure for table `slot_tab`
--

DROP TABLE IF EXISTS `slot_tab`;
CREATE TABLE `slot_tab` (
  `start_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NULL DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `license_number` bigint(14) NOT NULL,
  `status` text NOT NULL,
  `vehicle_type` enum('2 Wheeler','4 Wheeler') NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slot_tab`
--

INSERT INTO `slot_tab` (`start_time`, `end_time`, `email`, `license_number`, `status`, `vehicle_type`, `id`) VALUES
('2021-06-28 14:53:05', '2021-07-01 10:30:00', 'relativity@gmail.com', 567651666520, 'COMPLETE', '2 Wheeler', 1),
('2021-07-07 03:37:53', '2021-07-09 05:30:00', 'relativity@gmail.com', 567651666520, 'PENDING', '2 Wheeler', 2),
('2021-07-06 18:39:35', '2021-07-09 06:30:00', 'greatlife@gmail.com', 567651666520, 'COMPLETE', '4 Wheeler', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill_tab`
--
ALTER TABLE `bill_tab`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `login_tab`
--
ALTER TABLE `login_tab`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `registration_tab`
--
ALTER TABLE `registration_tab`
  ADD PRIMARY KEY (`email`,`mobile_number`,`vehicle_number`);

--
-- Indexes for table `shop_details`
--
ALTER TABLE `shop_details`
  ADD UNIQUE KEY `license` (`license_number`);

--
-- Indexes for table `shop_login`
--
ALTER TABLE `shop_login`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `shop_reg`
--
ALTER TABLE `shop_reg`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `key` (`license_number`);

--
-- Indexes for table `slot_tab`
--
ALTER TABLE `slot_tab`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill_tab`
--
ALTER TABLE `bill_tab`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `slot_tab`
--
ALTER TABLE `slot_tab`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
