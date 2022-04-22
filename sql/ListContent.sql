-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 21, 2022 at 11:56 PM
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
  `Item` varchar(60) DEFAULT NULL,
  `checked` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ListContent`
--

INSERT INTO `ListContent` (`listID`, `Item`, `checked`) VALUES
(1, 'Wedding Cake', 0),
(1, 'Wedding dress', 0),
(1, ' Wedding Planner', 0),
(1, 'Hire Caterer', 0),
(1, 'Hire Vendors', 0),
(2, 'Complete assignment', 0),
(2, 'Go to gym', 0),
(2, 'Prepare dinner', 0),
(2, 'study for test', 0),
(3, 'Milk', 0),
(3, 'Chicken drumsticks ', 0),
(3, 'veggies', 0),
(3, 'Pasta', 0),
(3, 'Bread', 0),
(4, 'Spiderman', 0),
(4, 'NBA2K', 0),
(4, 'Assasin''s Creed', 0),
(5, 'Go to school', 0),
(5, 'Nothing', 0),
(5, 'Watch Tv', 0),
(6, 'Study Math', 0),
(6, 'Study computer science', 0),
(6, 'workout', 0),
(7, 'boat', 0),
(7, 'house', 0),
(7, 'car', 0),
(8, 'new phone', 0),
(8, 'new watch', 0),
(8, 'new laptop', 0),
(4, 'Spiderman', 0),
(4, 'NBA2K', 0),
(4, 'Assasin''s Creed', 0),
(5, 'Go to school', 0),
(5, 'Nothing', 0),
(5, 'Watch Tv', 0),
(6, 'Study Math', 0),
(6, 'Study computer science', 0),
(6, 'workout', 0),
(7, 'boat', 0),
(7, 'house', 0),
(7, 'car', 0),
(8, 'new phone', 0),
(8, 'new watch', 0),
(8, 'new laptop', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ListContent`
--
ALTER TABLE `ListContent`
  ADD KEY `listID` (`listID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ListContent`
--
ALTER TABLE `ListContent`
  ADD CONSTRAINT `ListContent_ibfk_2` FOREIGN KEY (`listID`) REFERENCES `list` (`listID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
