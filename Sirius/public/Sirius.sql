-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2021 at 10:41 PM
-- Server version: 8.0.23-0ubuntu0.20.04.1
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Sirius`
--

-- --------------------------------------------------------

--
-- Table structure for table `ScheduleList`
--

CREATE TABLE `ScheduleList` (
  `id` int NOT NULL,
  `onYear` int NOT NULL,
  `onDay` int NOT NULL,
  `onMonth` int NOT NULL,
  `onTitle` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ScheduleList`
--

INSERT INTO `ScheduleList` (`id`, `onYear`, `onDay`, `onMonth`, `onTitle`, `first_name`, `last_name`, `email`, `phone`) VALUES
(1, 2021, 6, 5, '900-930', '', '', '', ''),
(2, 2021, 7, 5, '900-930', '', '', '', ''),
(3, 2021, 8, 5, '900-930', '', '', '', ''),
(4, 2021, 6, 5, '1300-1330', 'h', 'h', 'dkganev@gmail.com', 'cvv'),
(5, 2021, 7, 5, '1300-1330', 'h', 'h', 'dkganev@gmail.com', 'cvv'),
(6, 2021, 6, 5, '1200-1230', 'vv', 'vv', 'vv@ff.gg', 'vv'),
(7, 2021, 6, 5, '1100-1130', 'dd', 'dd', 'd@dd.dd', 'frf'),
(8, 2021, 6, 5, '1000-1030', 'vv', 'vv', 'vv@ff.gg', 'vv'),
(9, 2021, 1, 7, '1000-1030', 'test', 'xxx', 'd@dd.dd', 'xx'),
(10, 2021, 15, 7, '1100-1130', 'test', 'xxx', 'd@dd.dd', 'xx'),
(11, 2021, 7, 5, '1400-1430', 'ff', 'ff', 'd@dd.dd', 'dd'),
(12, 2021, 13, 5, '1200-1230', 'gg', 'gg', 'gg@ff.hgh', 'ff'),
(13, 2021, 6, 5, '1500-1530', 'ff', 'ff', 'vv@ff.gg', 'ff'),
(14, 2021, 13, 5, '1400-1430', 'gg', 'gg', 'gg@ff.hgh', 'g'),
(15, 2021, 20, 5, '1500-1530', 'ghh', 'hh', 'gg@ff.hgh', 'gg'),
(16, 2021, 6, 5, '1400-1430', 'cc', 'cc', 'gg@ff.hgh', 'gg'),
(17, 2021, 6, 5, '1700-1730', 'dd', 'dd', 'd@dd.dd', 'dd'),
(18, 2021, 11, 6, '1200-1230', 'dd', 'dd', 'd@dd.dd', 'dd'),
(19, 2021, 11, 6, '1230-13:00', 'gg', 'gg', 'gg@ff.hgh', 'gg'),
(20, 2021, 6, 5, '1730-18:00', 'gg', 'gg', 'gg@ff.hgh', 'g');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ScheduleList`
--
ALTER TABLE `ScheduleList`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `ScheduleList`
--
ALTER TABLE `ScheduleList`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
