-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2022 at 05:58 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo_project_php_crud`
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
(1, 'democon3232@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'demouser', 1, 'A');

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
(1, 'manoj singh', '09760894418', '20', 'democon3232@gmail.com', 0, '2022-06-02 05:35:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_adminmaster`
--
ALTER TABLE `tbl_adminmaster`
  ADD PRIMARY KEY (`intAdminID`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_adminmaster`
--
ALTER TABLE `tbl_adminmaster`
  MODIFY `intAdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
