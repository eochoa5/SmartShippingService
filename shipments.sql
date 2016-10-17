-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2016 at 12:42 AM
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
-- Table structure for table `shipments`
--

CREATE TABLE `shipments` (
  `id` int(11) NOT NULL,
  `shipmentID` varchar(50) NOT NULL,
  `first` varchar(30) NOT NULL,
  `last` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `deliveryType` varchar(100) NOT NULL,
  `weight` varchar(30) NOT NULL,
  `insurance` varchar(3) NOT NULL,
  `delivered` varchar(3) NOT NULL,
  `delay` int(11) NOT NULL,
  `address` varchar(120) NOT NULL,
  `destAddress` varchar(120) NOT NULL,
  `shipDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deliveryDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `curLoc` varchar(120) NOT NULL,
  `summary` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipments`
--

INSERT INTO `shipments` (`id`, `shipmentID`, `first`, `last`, `email`, `phone`, `deliveryType`, `weight`, `insurance`, `delivered`, `delay`, `address`, `destAddress`, `shipDate`, `deliveryDate`, `curLoc`, `summary`) VALUES
(1, 'test123', 'edwin', 'ochoa', 'edwin@gmail.com', '3231234567', '7 day ground economy', '420 lbs', 'no', 'no', 0, '5154 State University Dr, Los Angeles, CA 90032', 'Harvard University, Cambridge, MA 02138', '2016-10-17 09:06:00', '2016-10-24 07:00:00', 'University Ave, Waukee, IA 50263', 'total: 25 USD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shipments`
--
ALTER TABLE `shipments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `shipmentID` (`shipmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shipments`
--
ALTER TABLE `shipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
