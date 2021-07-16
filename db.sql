-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2021 at 05:20 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`adminid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin2820');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `userid` int NOT NULL,
  `item_no` int NOT NULL,
  `item` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`userid`, `item_no`, `item`, `quantity`, `price`) VALUES
(11, 6, 'Fish Finger', 1, '90.00');

-- --------------------------------------------------------

--
-- Table structure for table `dispmenu`
--

DROP TABLE IF EXISTS `dispmenu`;
CREATE TABLE IF NOT EXISTS `dispmenu` (
  `item_no` int NOT NULL AUTO_INCREMENT,
  `item` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_no`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dispmenu`
--

INSERT INTO `dispmenu` (`item_no`, `item`, `price`) VALUES
(11, 'Chicken Makhani', '130.00'),
(12, 'Chicken Kheema', '120.00'),
(13, 'Chicken Briyani', '180.00'),
(14, 'Mutton Briyani', '200.00'),
(15, 'Butter Naan', '40.00'),
(16, 'Butter Roti', '30.00'),
(17, 'Goli Soda', '20.00'),
(18, 'Jigarthanda', '25.00'),
(10, 'Butter Chicken', '120.00'),
(9, 'Kadai Chicken', '110.00'),
(8, 'Chicken Tikka', '150.00'),
(7, 'Dragon Chicken', '120.00'),
(6, 'Fish Finger', '90.00'),
(2, 'Chicken Corn Soup', '60.00'),
(3, 'Chicken Hot Soup', '40.00'),
(4, 'Chicken Manchow Soup', '50.00'),
(1, 'Chicken Soup', '50.00'),
(5, 'Chicken Wings', '100.00'),
(19, 'Gulab Jamun Icecream', '60.00'),
(20, 'Lime Soda', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `item_no` int NOT NULL AUTO_INCREMENT,
  `item` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`item_no`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`item_no`, `item`, `price`) VALUES
(1, 'Chicken Soup', '50.00'),
(2, 'Chicken Corn Soup', '60.00'),
(3, 'Chicken Hot Soup', '40.00'),
(4, 'Chicken Manchow Soup', '50.00'),
(5, 'Chicken Wings', '100.00'),
(6, 'Fish Finger', '90.00'),
(7, 'Dragon Chicken', '120.00'),
(8, 'Chicken Tikka', '150.00'),
(9, 'Kadai Chicken', '110.00'),
(10, 'Butter Chicken', '120.00'),
(11, 'Chicken Makhani', '130.00'),
(12, 'Chicken Kheema', '120.00'),
(13, 'Chicken Briyani', '180.00'),
(14, 'Mutton Briyani', '200.00'),
(15, 'Butter Naan', '40.00'),
(16, 'Butter Roti', '30.00'),
(17, 'Goli Soda', '20.00'),
(18, 'Jigarthanda', '25.00'),
(19, 'Gulab Jamun Icecream', '60.00'),
(20, 'Lime Soda', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `userid` int NOT NULL,
  `item_no` int NOT NULL,
  `item` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userid` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`) VALUES
(1, 'swathi', 'swathiii'),
(2, 'prithvi', 'prithvii'),
(3, 'sruthi', 'sruthiii'),
(4, 'prithvi', 'prithvip'),
(5, 'akshara', 'vikashak'),
(6, 'kannan', 'kannan28'),
(7, 'raash', 'raashiii'),
(8, 'abiraami', 'abiraami'),
(9, 'user', 'swathiii'),
(10, 'kiara', 'kiaraaaa'),
(11, 'shara', 'vikashhh');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
