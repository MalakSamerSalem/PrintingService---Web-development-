-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2025 at 08:59 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearpr1_printingservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cusID` int(11) NOT NULL,
  `cusName` varchar(20) NOT NULL,
  `cusEmail` varchar(30) NOT NULL,
  `cusPhNum` int(11) NOT NULL,
  `cusAddress` varchar(30) NOT NULL,
  `cusPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `customer`:
--

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cusID`, `cusName`, `cusEmail`, `cusPhNum`, `cusAddress`, `cusPassword`) VALUES
(1, 'malak', 'malak@gmail.com', 0, '', '123'),
(2, 'Nour', 'Nour@gmail.com', 0, '', '456'),
(3, 'Ammera', 'Ammera@gmail.com', 0, '', '789'),
(4, 'sara', 'sara@gmail.com', 0, '', '000');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `cusID` int(11) NOT NULL,
  `thefd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `feedback`:
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ordID` int(11) NOT NULL,
  `proOpID` int(11) NOT NULL,
  `cusID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cusImg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `orders`:
--   `proOpID`
--       `productoptions` -> `proOpID`
--   `cusID`
--       `customer` -> `cusID`
--

-- --------------------------------------------------------

--
-- Table structure for table `productoptions`
--

CREATE TABLE `productoptions` (
  `proOpID` int(11) NOT NULL,
  `proID` int(11) NOT NULL,
  `proSize` varchar(20) DEFAULT NULL,
  `proColor` varchar(50) NOT NULL,
  `proPrice` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `productoptions`:
--   `proID`
--       `products` -> `proID`
--

--
-- Dumping data for table `productoptions`
--

INSERT INTO `productoptions` (`proOpID`, `proID`, `proSize`, `proColor`, `proPrice`) VALUES
(1, 1, 'A5', 'Colored', 6),
(2, 1, 'A4', 'Colored', 6),
(3, 1, 'A3', 'Colored', 6),
(4, 1, 'A5', 'No-color', 3),
(5, 1, 'A4', 'No-color', 3),
(6, 1, 'A3', 'No-color', 3),
(7, 2, 'L', 'No-color', 8),
(8, 2, 'M', 'No-color', 8),
(9, 2, 'S', 'No-color', 8),
(10, 2, 'L', 'Colored', 13),
(11, 2, 'M', 'Colored', 13),
(12, 2, 'S', 'Colored', 13),
(13, 3, '', 'Colored', 7),
(14, 3, '', 'No-color', 4),
(15, 4, '', 'Colored', 5),
(16, 4, '', 'No-color', 3),
(17, 5, '', 'Colored', 21),
(18, 5, '', 'No-color', 16),
(19, 6, '', 'Colored', 2),
(20, 6, '', 'No-color', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `proID` int(11) NOT NULL,
  `proName` varchar(20) NOT NULL,
  `proImg` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- RELATIONSHIPS FOR TABLE `products`:
--

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`proID`, `proName`, `proImg`) VALUES
(1, 'Paper', 'Assets\\image\\papers.png'),
(2, 'T-Shirt', 'Assets\\image\\Tshirt.png'),
(3, 'Mug', 'Assets\\image\\Mug.png'),
(4, 'Hat', 'Assets\\image\\Hat.png'),
(5, 'Bag', 'Assets\\image\\Bag.png'),
(6, 'Sticker', 'Assets\\image\\Sticker.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cusID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `cusID` (`cusID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ordID`),
  ADD KEY `proOpID` (`proOpID`,`cusID`),
  ADD KEY `cusID` (`cusID`);

--
-- Indexes for table `productoptions`
--
ALTER TABLE `productoptions`
  ADD PRIMARY KEY (`proOpID`),
  ADD KEY `proID` (`proID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`proID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `productoptions`
--
ALTER TABLE `productoptions`
  MODIFY `proOpID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `proID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`proOpID`) REFERENCES `productoptions` (`proOpID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cusID`) REFERENCES `customer` (`cusID`);

--
-- Constraints for table `productoptions`
--
ALTER TABLE `productoptions`
  ADD CONSTRAINT `productoptions_ibfk_1` FOREIGN KEY (`proID`) REFERENCES `products` (`proID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
