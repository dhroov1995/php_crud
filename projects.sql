-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2022 at 06:33 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminmaster`
--

CREATE TABLE `tbl_adminmaster` (
  `intAdminID` int(11) NOT NULL,
  `vchEmail` varchar(255) NOT NULL,
  `vchUserName` varchar(255) NOT NULL,
  `vchPassword` varchar(255) NOT NULL,
  `vchName` varchar(255) NOT NULL,
  `user_type` int(5) NOT NULL DEFAULT 1 COMMENT 'admin=1,vender=2,user=5',
  `enumStatus` enum('A','D') NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminmaster`
--

INSERT INTO `tbl_adminmaster` (`intAdminID`, `vchEmail`, `vchUserName`, `vchPassword`, `vchName`, `user_type`, `enumStatus`) VALUES
(1, 'ajay@gmail.com ', 'admin', 'efa545d71e354efbfa6cbe8bbae9ed67', 'demouser', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `category_image`, `category_name`) VALUES
(1, 'images/51OCZXJQ3mL._AC_UL320_.jpg', 'bike'),
(2, 'images/tv.jpg', 'tv');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `deleted_status` tinyint(5) NOT NULL DEFAULT 0,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `full_name`, `mobile_no`, `age`, `email_address`, `deleted_status`, `created_date`) VALUES
(1, 'manoj singh', '09760894418', '20', 'democon3232@gmail.com', 0, '2022-06-02 05:35:55'),
(2, 'ajay', '7895825143', '20', 'ajay@gmail.com', 0, '2022-06-02 07:14:55'),
(3, 'neeraj', '7895825143', '21', 'neeraj@gmail.com', 0, '2022-06-02 07:19:50'),
(4, 'ajay', '7895825143', '20', 'ajay@gmail.com', 0, '2022-06-11 05:55:39'),
(5, 'neeraj', '7895825143', '21', 'neeraj@gmail.com', 0, '2022-06-17 06:52:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_category` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_colour` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_image`, `product_category`, `product_code`, `product_name`, `product_colour`, `created_at`) VALUES
(31, 'images/istockphoto-898449896-1024x1024.jpg', '2', 'sbtv22', 'tv-sm', 'black', '2022-06-21 15:04:56'),
(32, 'images/download.jpg', '1', '2222', 'bike-h', 'blue', '2022-06-21 15:05:06'),
(33, 'images/tv.jpg', '2', 'jdsvsv', 'tv-old', 'brown', '2022-06-21 16:26:54'),
(34, 'images/product-500x500.jpeg', '1', 'new222', 'bike', 'red', '2022-06-22 22:08:40'),
(35, 'images/tv.jpg', '2', 'ss25', 'tv-sm', 'black', '2022-06-22 22:30:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminmaster`
--
ALTER TABLE `tbl_adminmaster`
  ADD PRIMARY KEY (`intAdminID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminmaster`
--
ALTER TABLE `tbl_adminmaster`
  MODIFY `intAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
