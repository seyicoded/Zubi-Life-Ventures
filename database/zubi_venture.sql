-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2021 at 08:50 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `a_phone` text,
  `a_image` varchar(760) NOT NULL DEFAULT 'avatar.webp',
  `a_status` int(11) NOT NULL,
  `a_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`a_id`, `a_name`, `a_username`, `a_password`, `role`, `a_phone`, `a_image`, `a_status`, `a_date`) VALUES
(1, 'admin', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, '9023112671', 'avatar.png', 1, '2021-10-21 00:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `route_name` varchar(760) NOT NULL,
  `category_name` text NOT NULL,
  `icon_name` text,
  `mini_desc` text NOT NULL,
  `main_image` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
