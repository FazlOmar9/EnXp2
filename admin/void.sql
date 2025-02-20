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

CREATE DATABASE IF NOT EXISTS `void`;
USE `void`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `void`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutuser`
--

CREATE TABLE `aboutuser` (
  `sno` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `part2` varchar(50) NOT NULL,
  `salary` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `aboutuser`
--

INSERT INTO `aboutuser` (`sno`, `name`, `part2`, `salary`) VALUES
(1, 'Nar', 'uto', 1000),
(2, 'Valen', 'tina', 5000),
(3, 'Berna', 'dette', 3000),
(4, 'Aless', 'andro', 4000),
(5, 'Bin', 'od', 9000),
(6, 'Surya', 'narayan', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `cookie`
--

CREATE TABLE `cookie` (
  `sno` int NOT NULL,
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `cookie`
--

INSERT INTO `cookie` (`sno`, `id`) VALUES
(1, 'erF1gPd71et6V');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `sno` int NOT NULL,
  `trap` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `rating` float NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`sno`, `trap`, `name`, `price`, `rating`, `category`) VALUES
(1, 0, 'Table Lamp', 800, 4.2, 'Home Decor'),
(2, 0, 'Ergonomic Gaming Chair', 9000, 4.8, 'Furniture'),
(3, 0, 'Laptop Stand', 200, 2.4, 'Electronics'),
(4, 0, 'Bluetooth Speaker', 5000, 3.8, 'Electronics'),
(5, 0, 'Bookshelf', 4000, 1.1, 'Furniture'),
(6, 0, 'Wall Clock', 400, 3.3, 'Home Decor'),
(7, 0, 'Electric kettle', 1200, 3.7, 'Kitchen'),
(8, 0, 'Yoga Mat', 80, 0.9, 'Sports'),
(9, 0, 'Casual Sneakers', 12000, 0.5, 'Fashion');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `sno` int NOT NULL,
  `trap` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`sno`, `trap`, `price`) VALUES
(1, 21, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutuser`
--
ALTER TABLE `aboutuser`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `cookie`
--
ALTER TABLE `cookie`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutuser`
--
ALTER TABLE `aboutuser`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cookie`
--
ALTER TABLE `cookie`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `sno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
