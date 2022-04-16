-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 16, 2022 at 09:43 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tobiakinnola`
--

-- --------------------------------------------------------

--
-- Table structure for table `list2`
--

CREATE TABLE IF NOT EXISTS `list2` (
  `listID` int(11) NOT NULL,
  `title` text NOT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 1,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `items` text DEFAULT NULL,
  `exp_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list2`
--

INSERT INTO `list2` (`listID`, `title`, `checked`, `items`, `exp_date`) VALUES
(1, 'e2ffewf', 1, NULL, '2022-04-16'),
(2, 'efe', 0, NULL, '2022-04-16'),
(3, 'khcjgggk', 0, NULL, '2022-04-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list2`
--
ALTER TABLE `list2`
  ADD PRIMARY KEY (`listID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list2`
--
ALTER TABLE `list2`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
