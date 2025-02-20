-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 14, 2024 at 03:34 PM
-- Server version: 8.0.36
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `item`;
USE `item`;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `item`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `sno` int NOT NULL,
  `tablename` varchar(20) NOT NULL,
  `col1` varchar(20) NOT NULL,
  `col2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`sno`, `tablename`, `col1`, `col2`) VALUES
(1, 'aboutuser', 'name', 'part2'),
(2, 'cutefox', 'name', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `sno` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `col1` varchar(20) NOT NULL,
  `col2` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`sno`, `name`, `col1`, `col2`) VALUES
(1, 'Table Lamp', 'Home Decor', '4.2'),
(2, 'Ergonomic Gaming Chair', 'Furniture', '4.8'),
(3, 'Laptop Stand', 'Electronics', '2.4'),
(4, 'Bluetooth Speaker', 'Electronics', '3.8'),
(5, 'Bookshelf', 'Furniture', '1.1'),
(6, 'Wall Clock', 'Home Decor', '3.3'),
(7, 'Electric kettle', 'Kitchen', '3.7'),
(8, 'Yoga Mat', 'Sports', '0.9'),
(9, 'Casual Sneakers', 'Fashion', '0.5'),
(478, 'aboutuser', 'name', 'part2'),
(569, 'cutefox', 'name', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=570;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
