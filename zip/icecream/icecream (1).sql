-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2024 at 06:03 PM
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
-- Database: `icecream`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(255) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'icecream'),
(12, 'milkshakes'),
(13, 'cookies'),
(16, 'cake');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_no.` int(255) NOT NULL,
  `client_role` varchar(11) NOT NULL DEFAULT 'user',
  `email` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `password` varchar(78) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_no.`, `client_role`, `email`, `fullname`, `password`) VALUES
(1, 'user', 'hoho@gmail.com', 'hoho', 'hoho'),
(2, 'user', 'haha@gmail.com', 'haha', 'haha'),
(3, 'user', 'ha@gmail.com', 'ha', 'ha'),
(4, 'user', 'haha@gmail.com', 'haha', 'haha'),
(6, 'user', 'haha@gmail.com', 'haha', 'xdcfvgbhnj'),
(8, 'user', 'hey@gmail.com', 'hey', 'hey'),
(9, 'admin', 'admin@gmail.com', 'admin', 'admin'),
(10, 'user', 'hola@gmail.com', 'hola', '1234'),
(11, 'user', 'hola@gmail.com', 'hola', '1234'),
(12, 'user', 'hola@gmail.com', 'hola', '1234'),
(13, 'user', 'hey@gmail.com', 'hey', 'hey'),
(14, 'user', 'haha@gmail.com', 'haha', 'haha'),
(15, 'user', 'haha@gmail.com', 'haha', 'haha'),
(16, 'user', 'hooha@gmail.com', 'hooha', 'hooha');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(62) NOT NULL,
  `product_price` varchar(30) NOT NULL,
  `product_description` varchar(300) NOT NULL,
  `category_id` varchar(30) NOT NULL,
  `product_image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_price`, `product_description`, `category_id`, `product_image`) VALUES
(3, 'icecream1', '895623', 'Ice cream is a frozen dessert beloved for its creamy texture and sweet, indulgent flavor. Made from a base of milk, cream, and sugar, itâ€™s often flavored with ingredients like vanilla, chocolate, fruit, or nuts. Whether enjoyed in a cone, a cup, or as a topping, ice cream is a delightful treat tha', ' 1', '416792280704ice4.png'),
(4, 'icecream2', '45', 'Ice cream is a frozen dessert beloved for its creamy texture and sweet, indulgent flavor. Made from a base of milk, cream, and sugar, itâ€™s often flavored with ingredients like vanilla, chocolate, fruit, or nuts. Whether enjoyed in a cone, a cup, or as a topping, ice cream is a delightful treat tha', ' 13', '115720719616ice3.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_no.`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_no.` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
