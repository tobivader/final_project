-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 17, 2022 at 12:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chigoziemuonagolu`
--

-- --------------------------------------------------------

--
-- Table structure for table `ListContent`
--

CREATE TABLE IF NOT EXISTS `ListContent` (
  `listID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `Item` varchar(60) DEFAULT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ListContent`
--

INSERT INTO `ListContent` (`listID`, `userID`, `Item`, `checked`) VALUES
(1, 1, 'Wedding Cake', 0),
(1, 1, 'Wedding dress', 0),
(1, 1, ' Wedding Planner', 0),
(1, 1, 'Hire Caterer', 0),
(1, 1, 'Hire Vendors', 0),
(2, 1, 'Complete assignment', 0),
(2, 1, 'Go to gym', 0),
(2, 1, 'Prepare dinner', 0),
(2, 1, 'study for test', 0),
(3, 1, 'Milk', 0),
(3, 1, 'Chicken drumsticks ', 0),
(3, 1, 'veggies', 0),
(3, 1, 'Pasta', 0),
(3, 1, 'Bread', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ListContent`
--
ALTER TABLE `ListContent`
  ADD KEY `userID` (`userID`),
  ADD KEY `listID` (`listID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ListContent`
--
ALTER TABLE `ListContent`
  ADD CONSTRAINT `ListContent_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `Users` (`userID`),
  ADD CONSTRAINT `ListContent_ibfk_2` FOREIGN KEY (`listID`) REFERENCES `list` (`listID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
