-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2020 at 09:08 PM
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
-- Database: `leave_application_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `leave_application`
--

CREATE TABLE `leave_application` (
  `refNo` int(15) NOT NULL,
  `staff_id` int(15) NOT NULL,
  `dateOfApplication` date NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `duration` int(5) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `leave_code` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leave_application`
--

INSERT INTO `leave_application` (`refNo`, `staff_id`, `dateOfApplication`, `startDate`, `endDate`, `duration`, `reason`, `leave_code`, `status`) VALUES
(1, 100, '2020-02-07', '2020-02-06', '2020-02-07', 2, 'Sick. Flu.', 'Medical Leave', 'Approved'),
(2, 100, '2020-02-07', '2020-02-14', '2020-02-14', 1, 'Valentine\'s Day', 'Paid Leave', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `staff_id` int(15) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(30) NOT NULL,
  `authority` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`staff_id`, `password`, `email`, `authority`) VALUES
(100, 'e21247929ba77af976c695f5c7fda3348c1442efe7badd32ad2e400ff5133dabcf20dbae148b59fe3b1c9b66d80d9da5fe8f80ca2ce43518837dcda4895332cd', '100@las.com', '0'),
(900, '90757e8856342da9ab505c454a778d20429f318742cfa8da57fc763fe6e87da86a881f097836ad0e981a56c332571f81f72204362a7ab333f8b794435eff6a01', '900@las.com', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `leave_application`
--
ALTER TABLE `leave_application`
  ADD PRIMARY KEY (`refNo`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `leave_application`
--
ALTER TABLE `leave_application`
  MODIFY `refNo` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
