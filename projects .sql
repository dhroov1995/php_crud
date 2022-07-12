-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2022 at 06:00 AM
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
(1, 'ajay@gmail.com ', 'admin', '25d55ad283aa400af464c76d713c07ad', 'demouser', 1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `product_id`, `user_id`) VALUES
(1, '0001', 1),
(2, '1', 1);

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
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(50) NOT NULL,
  `product_quantity` int(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_status` enum('success','failed','pending') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `product_name`, `product_price`, `product_quantity`, `user_id`, `order_status`) VALUES
(1, 'tv-sm', 5000, 1, 1, 'success'),
(2, '', 0, 0, 0, 'success'),
(3, '', 0, 0, 0, 'success'),
(4, '', 0, 0, 0, 'success'),
(5, '', 0, 0, 0, 'success'),
(6, '', 0, 0, 0, 'success');

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
  `product_price` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_image`, `product_category`, `product_code`, `product_name`, `product_colour`, `product_price`, `created_at`) VALUES
(1, 'images/istockphoto-898449896-1024x1024.jpg', '2', 'sbtv22', 'tv-sm', 'black', '5000', '2022-06-21 15:04:56'),
(2, 'images/download.jpg', '1', '2222', 'bike-h', 'blue', '12000', '2022-06-21 15:05:06'),
(3, 'images/tv.jpg', '2', 'jdsvsv', 'tv-old', 'brown', '2000', '2022-06-21 16:26:54'),
(4, 'images/product-500x500.jpeg', '1', 'new222', 'bike', 'red', '8000', '2022-06-22 22:08:40'),
(5, 'images/tv.jpg', '2', 'ss25', 'tv', 'brown', '5000', '2022-06-22 22:30:51'),
(38, 'images/628e65258c534a60ff59a30890ca63f5.jpg', '1', 'sbgf', 'bike22', 'red', '5000', '2022-07-02 16:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration`
--

CREATE TABLE `tbl_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_registration`
--

INSERT INTO `tbl_registration` (`id`, `name`, `email`, `number`, `password`) VALUES
(1, 'ajay', 'as@gmail.com', '11223344', '123456'),
(2, 'ram', '123@gmail.com', '123252', '112233'),
(14, 'mohan', 'mohan@gmail.com', '141414141', '112233'),
(15, 'dhroov', 'abc@gmail.com', '622222', '112233'),
(16, 'dhroov', 'abc@gmail.com', '622222', '112233'),
(17, 'akhil', 'ak@gmail.com', '14523652', 'test1234');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `order_id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`order_id`, `fname`, `email`, `number`, `state`, `city`, `address`, `created_at`) VALUES
(1, 'rajat', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 17:31:32'),
(2, 'rajat', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 17:31:44'),
(3, 'rajat', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 17:32:09'),
(4, 'harshcvdvs', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 17:46:03'),
(5, 'harshcvdvs', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 17:56:35'),
(6, 'harshcvdvs', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 17:58:21'),
(7, 'harshcvdvs', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 19:09:59'),
(8, 'harshcvdvs', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 19:35:35'),
(9, 'harsh mmmm', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 19:35:52'),
(10, 'harsh mmmm', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 19:37:15'),
(11, 'harsh mmmm', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 19:39:00'),
(12, 'harsh mmmm', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 19:39:04'),
(13, 'harsh mmmm', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 19:39:53'),
(14, 'harsh mmmm', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 20:19:54'),
(15, 'harsh mmmm', 'as@gmail.com', '6', 'Uttarakhand', 'Dehradun', 'jkfkldghjrio', '2022-07-11 20:21:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminmaster`
--
ALTER TABLE `tbl_adminmaster`
  ADD PRIMARY KEY (`intAdminID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminmaster`
--
ALTER TABLE `tbl_adminmaster`
  MODIFY `intAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_registration`
--
ALTER TABLE `tbl_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
