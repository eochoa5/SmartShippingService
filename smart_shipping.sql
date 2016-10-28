-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2016 at 06:26 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_shipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shipmentID` varchar(50) NOT NULL,
  `notified` varchar(3) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `first`, `last`, `email`, `shipmentID`, `notified`) VALUES
(1, 'edwin', 'ochoa', 'edwin@gmail.com', 'test123', 'NO'),
(10, 'donald', 'trump', 'donald@gmail.com', 'test5', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `pickups`
--

CREATE TABLE `pickups` (
  `id` int(11) NOT NULL,
  `pickupID` varchar(50) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `type` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `time` varchar(30) NOT NULL,
  `deliveryType` varchar(100) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `insurance` varchar(3) NOT NULL,
  `pickedUp` varchar(3) NOT NULL,
  `address` varchar(120) NOT NULL,
  `destAddress` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `retailers`
--

CREATE TABLE `retailers` (
  `id` int(11) NOT NULL,
  `first` varchar(200) DEFAULT NULL,
  `last` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `plan` varchar(45) NOT NULL,
  `companyName` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `shipmentID` varchar(50) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `deliveryType` enum('7 day ground economy shipping','Next day air expedited shipping','2 day air expedited shipping','4 day ground shipping','International air economy shipping','International air expedited 2 day shippin','International air 4 day shipping') NOT NULL,
  `weight` varchar(30) NOT NULL,
  `insurance` varchar(3) NOT NULL,
  `delivered` varchar(3) NOT NULL,
  `delay` int(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `destAddress` varchar(120) NOT NULL,
  `shipDate` date NOT NULL,
  `deliveryDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `curLoc` varchar(120) NOT NULL,
  `summary` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `shipmentID`, `first`, `last`, `email`, `phone`, `deliveryType`, `weight`, `insurance`, `delivered`, `delay`, `address`, `destAddress`, `shipDate`, `deliveryDate`, `curLoc`, `summary`) VALUES
(1, 'test123', 'edwin', 'ochoa', 'edwin@gmail.com', '3231234567', '4 day ground shipping', '420 lbs', 'no', 'YES', 0, '5154 State University Dr, Los Angeles, CA 90032', 'Harvard University, Cambridge, MA 02138', '2016-10-23', '2016-10-24 07:00:00', 'Missouri', 'Contents: Nike Shoes total: 25 USD'),
(2, 'test5', 'donald', 'trump', 'donald@gmail.com', '911', '4 day ground shipping', '69', 'no', 'YES', 2, 'CSULA', 'Mexico city', '2016-10-25', '0000-00-00 00:00:00', 'Las vegas', 'contents: sweatpants. total: 30 USD');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shipmentID` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(6) NOT NULL DEFAULT 'open'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `address` varchar(120) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `sign_up_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first`, `last`, `email`, `password`, `address`, `phone`, `sign_up_date`) VALUES
(27, 'Edwin', 'Ochoa', 'a@gmail.com', '$2y$09$vRZCosDZmP27YDqZ02WEs.oT6RS6.EIKPNCAYpYNCMI22T2WFrize', 'abc, United States of America, CA, 90047', '910', '2016-10-16 05:13:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipmentID` (`shipmentID`);

--
-- Indexes for table `pickups`
--
ALTER TABLE `pickups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pickupID` (`pickupID`);

--
-- Indexes for table `retailers`
--
ALTER TABLE `retailers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipmentID` (`shipmentID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipmentID` (`shipmentID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `pickups`
--
ALTER TABLE `pickups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `retailers`
--
ALTER TABLE `retailers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
