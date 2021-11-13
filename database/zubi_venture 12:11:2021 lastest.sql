-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 13, 2021 at 03:26 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zubi_venture`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `a_id` int(11) NOT NULL,
  `a_name` text NOT NULL,
  `a_username` text NOT NULL,
  `a_password` text NOT NULL,
  `role` int(11) NOT NULL,
  `a_phone` text DEFAULT NULL,
  `a_image` varchar(760) NOT NULL DEFAULT 'avatar.webp',
  `a_status` int(11) NOT NULL,
  `a_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_name`, `a_username`, `a_password`, `role`, `a_phone`, `a_image`, `a_status`, `a_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '9023112671', 'avatar.png', 1, '2021-10-21 00:14:43'),
(3, 'test_worker_ed', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 2, '09023112671', 'avatar.webp', 1, '2021-11-01 10:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `route_name` varchar(760) NOT NULL,
  `category_name` text NOT NULL,
  `icon_name` text DEFAULT NULL,
  `mini_desc` text NOT NULL,
  `main_image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `route_name`, `category_name`, `icon_name`, `mini_desc`, `main_image`, `status`, `date`) VALUES
(1, 'furnitures', 'Furnitures', 'ri-bookmark-3-line', 'furnitures descriptions', '1634779586.jpeg', 1, '2021-10-21 23:01:23'),
(2, 'land-and-housing', 'Land & Housing', 'ri-home-smile-fill', 'land and housing', '1634857508.png', 1, '2021-10-21 23:05:23'),
(3, 'electronics', 'Electronics', 'ri-macbook-fill', 'electronics', '1634857634.png', 1, '2021-10-21 23:07:14'),
(4, 'food-stock', 'Food Stock', 'ri-capsule-fill', 'food stuff', '1634858506.png', 1, '2021-10-21 23:21:46'),
(5, 'safelock', 'SafeLock', 'ri-rotate-lock-fill', 'safe lock', '1634858685.png', 1, '2021-10-21 23:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `investors`
--

CREATE TABLE `investors` (
  `i_id` int(11) NOT NULL,
  `a_id` int(11) NOT NULL DEFAULT 1,
  `i_name` text NOT NULL,
  `i_email` varchar(760) NOT NULL,
  `i_password` text NOT NULL,
  `i_phone` text NOT NULL,
  `i_status` int(11) NOT NULL DEFAULT 1,
  `code` text NOT NULL,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investors`
--

INSERT INTO `investors` (`i_id`, `a_id`, `i_name`, `i_email`, `i_password`, `i_phone`, `i_status`, `code`, `date_updated`, `date_created`) VALUES
(2, 1, 'Favour Micheal', 'favour@gmail.com', '0f86dd5c3bfd87ef6cdb2d7d9b575dd38efdde08', '09052468082', 1, '1635827941', '2021-11-02 04:39:01', '2021-11-02 04:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `investors_packages_linker`
--

CREATE TABLE `investors_packages_linker` (
  `ip_id` int(11) NOT NULL,
  `i_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `duration_count` int(11) NOT NULL,
  `tnx_ref` text NOT NULL,
  `duration_paid` int(11) NOT NULL DEFAULT 0,
  `currency` varchar(760) NOT NULL DEFAULT 'NGN',
  `amount_to_pay` text NOT NULL,
  `last_four_card_numb` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `reusable` text DEFAULT NULL,
  `auth_code` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investors_packages_linker`
--

INSERT INTO `investors_packages_linker` (`ip_id`, `i_id`, `p_id`, `duration_count`, `tnx_ref`, `duration_paid`, `currency`, `amount_to_pay`, `last_four_card_numb`, `email`, `reusable`, `auth_code`, `status`, `date_updated`, `date_created`) VALUES
(2, 2, 16, 90, '1636765592-59', 1, 'NGN', '200', '4081', 'favour@gmail.com', '1', 'AUTH_p602w31vxp', 1, '2021-11-13 01:20:21', '2021-11-13 01:06:33'),
(3, 2, 16, 90, '1636765817-71', 2, 'NGN', '200', '4081', 'favour@gmail.com', '1', 'AUTH_1q4gytfpmo', 1, '2021-11-13 01:49:20', '2021-11-13 01:10:18'),
(4, 2, 16, 90, '1636766154-45', 1, 'NGN', '200', '4081', 'favour@gmail.com', '1', 'AUTH_25r8ihl64p', 3, '2021-11-13 02:22:50', '2021-11-13 01:15:55');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `p_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `p_name` text NOT NULL,
  `p_route_name` text NOT NULL,
  `p_desc` longblob NOT NULL,
  `p_image` text NOT NULL,
  `duration` int(11) NOT NULL COMMENT 'in days',
  `amount_type` int(11) NOT NULL DEFAULT 1,
  `amount_one` int(11) NOT NULL,
  `amount_two` int(11) NOT NULL,
  `currency` varchar(7600) NOT NULL DEFAULT 'NGN',
  `status` int(1) NOT NULL DEFAULT 1,
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`p_id`, `c_id`, `p_name`, `p_route_name`, `p_desc`, `p_image`, `duration`, `amount_type`, `amount_one`, `amount_two`, `currency`, `status`, `date_updated`, `date_created`) VALUES
(16, 4, 'Beverages', 'beverages', 0x42657665726167657320697320617765736f6d652069206775657373, '1635581754.jpeg', 90, 1, 200, 0, 'NGN', 1, '2021-10-30 09:27:50', '2021-10-30 08:15:54');

-- --------------------------------------------------------

--
-- Table structure for table `package_other_images`
--

CREATE TABLE `package_other_images` (
  `po_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `images` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `date_` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package_other_images`
--

INSERT INTO `package_other_images` (`po_id`, `p_id`, `images`, `status`, `date_`) VALUES
(1, 16, '1635581754.jpeg', 1, '2021-10-30 08:15:54'),
(2, 16, '1635586034.jpeg', 1, '2021-10-30 09:27:14'),
(3, 16, '1635586070.png', 1, '2021-10-30 09:27:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `route_name` (`route_name`);

--
-- Indexes for table `investors`
--
ALTER TABLE `investors`
  ADD PRIMARY KEY (`i_id`),
  ADD UNIQUE KEY `i_email` (`i_email`);

--
-- Indexes for table `investors_packages_linker`
--
ALTER TABLE `investors_packages_linker`
  ADD PRIMARY KEY (`ip_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `package_other_images`
--
ALTER TABLE `package_other_images`
  ADD PRIMARY KEY (`po_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `investors`
--
ALTER TABLE `investors`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `investors_packages_linker`
--
ALTER TABLE `investors_packages_linker`
  MODIFY `ip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `package_other_images`
--
ALTER TABLE `package_other_images`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
