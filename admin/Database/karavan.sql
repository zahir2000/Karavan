-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 09:37 PM
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `name`, `status`) VALUES
(1, 'Main', 'Active'),
(2, 'Salad', 'Active'),
(3, 'Dessert', 'Active');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitem`
--

INSERT INTO `menuitem` (`MenuItemID`, `name`, `image`, `price`, `discount`, `description`, `status`, `category`) VALUES
(1, 'Somsa', 'somsa.jpg', 24, '0.50', 'Meat, Chicken, Potatoes', 'Inactive', 'Main');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
