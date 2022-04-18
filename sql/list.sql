-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 18, 2022 at 12:25 AM
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
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `listID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `private` tinyint(1) NOT NULL DEFAULT 1,
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `exp_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`listID`),
  ADD KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `listID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
