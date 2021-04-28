-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 11:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karavan`
--
CREATE DATABASE IF NOT EXISTS `karavan` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `karavan`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `businesshours`
--

CREATE TABLE IF NOT EXISTS `businesshours` (
  `BusinessHoursID` varchar(256) NOT NULL,
  `Hours` varchar(256) NOT NULL,
  PRIMARY KEY (`BusinessHoursID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `businesshours`
--

INSERT INTO `businesshours` (`BusinessHoursID`, `Hours`) VALUES
('MondayFriday', '10:00 AM - 21:00 PM'),
('SatSun', '11:00 AM - 21:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  `categoryOrder` int(2) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `name`, `status`, `categoryOrder`) VALUES
(1, 'Main', 'Active', 3),
(2, 'Salad', 'Active', 1),
(3, 'Dessert', 'Active', 4),
(4, 'Soups', 'Active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `hotmenu`
--

CREATE TABLE IF NOT EXISTS `hotmenu` (
  `HotMenuID` int(11) NOT NULL AUTO_INCREMENT,
  `MenuItemID` int(11) NOT NULL,
  `Hearts` int(11) NOT NULL,
  PRIMARY KEY (`HotMenuID`),
  KEY `MenuItemID` (`MenuItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotmenu`
--

INSERT INTO `hotmenu` (`HotMenuID`, `MenuItemID`, `Hearts`) VALUES
(12, 19, 4),
(13, 20, 4),
(15, 16, 4);

-- --------------------------------------------------------

--
-- Table structure for table `menuitem`
--

CREATE TABLE IF NOT EXISTS `menuitem` (
  `MenuItemID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `image` varchar(512) NOT NULL,
  `price` float NOT NULL,
  `discount` decimal(5,2) NOT NULL,
  `description` varchar(512) NOT NULL,
  `status` varchar(64) NOT NULL,
  `category` varchar(256) NOT NULL,
  PRIMARY KEY (`MenuItemID`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`MenuItemID`, `name`, `image`, `price`, `discount`, `description`, `status`, `category`) VALUES
(1, 'Somsa (5ps)', 'somsa_new.jpg', 22.9, '0.80', 'Meat, Chicken, Potatoes', 'Active', 'Dessert'),
(16, 'Plov', 'plov-white.png', 15, '0.00', 'Rice, Beef', 'Active', 'Main'),
(19, 'Olivie', 'olivie.jpg', 12.5, '0.00', 'Chicken', 'Active', 'Salad'),
(20, 'Pentuza', 'pentuza.jpg', 12.5, '0.00', 'Noodles, Carrot, Cucumber', 'Active', 'Salad'),
(22, 'Borsh', 'borsh.png', 12.5, '0.00', 'Cabbage', 'Active', 'Soups');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hotmenu`
--
ALTER TABLE `hotmenu`
  ADD CONSTRAINT `hotmenu_ibfk_1` FOREIGN KEY (`MenuItemID`) REFERENCES `menuitem` (`MenuItemID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
