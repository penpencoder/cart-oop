-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 11, 2019 at 01:08 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `sku` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `size` varchar(25) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image`, `sku`, `name`, `color`, `size`, `price`) VALUES
(1, '', '123', 'Mackbook Pro 15', 'Space Gray', '15\"', 100000),
(2, '', '124', 'Dell XPS 15', 'Gray', '15\"', 70000),
(4, '', 'Asus', 'Asus ROG Laptop', 'Black, Red', '17\"', 50000),
(6, '', 'Microsoft', 'Surface Laptop', 'Red Velvet', '13\"', 45000),
(7, '', 'Acer', 'Acer Helios 500', 'Black, Red', '15\"', 45000),
(8, '', 'Acer', 'Acer Predator', 'White, Blue', '15', 60000),
(12, '', 'Lenovo', 'Lenovo X1 Carbon', 'Matte Black', '15\"', 46000),
(13, '', 'Lenovo', 'Lenovo ThinkPad Pro', 'Matte Black', '14\"', 36000),
(16, '', '129', 'tesdting', 'Matte Black', '14\"', 12004),
(19, 'logo.jpeg', 'testing', 'Lenovo X1 Carbon', 'Matte Black', '14\"', 46000),
(21, 'logo2.png', 'testing', 'fasdf', 'asdf', 'asdf', 12223);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
