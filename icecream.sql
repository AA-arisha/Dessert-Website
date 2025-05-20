-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2024 at 09:26 AM
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
  `client_id` int(255) NOT NULL,
  `client_role` varchar(11) NOT NULL DEFAULT 'user',
  `email` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `password` varchar(78) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_role`, `email`, `fullname`, `password`) VALUES
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
(16, 'user', 'hooha@gmail.com', 'hooha', 'hooha'),
(17, 'user', 'hola@gmail.com', 'hola', 'hola');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `client_id` int(255) NOT NULL,
  `order_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `client_id`, `order_status`) VALUES
(24, 17, 'cancelled'),
(25, 1, 'Pending'),
(26, 1, 'On the way'),
(27, 1, 'pending'),
(28, 1, 'Delivered'),
(29, 17, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_products_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `order_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `order_products`
--

INSERT INTO `order_products` (`order_products_id`, `product_id`, `quantity`, `order_id`) VALUES
(24, 5, 3, 24),
(27, 5, 3, 25),
(28, 8, 4, 25),
(29, 6, 1, 25),
(30, 5, 3, 26),
(31, 8, 4, 26),
(32, 6, 1, 26),
(33, 5, 3, 28),
(34, 3, 3, 28),
(35, 9, 6, 28),
(36, 3, 3, 29);

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
(3, 'Icecream1', '400', 'Ice cream is a frozen dessert beloved for its creamy texture and sweet, indulgent flavor. Made from a base of milk, cream, and sugar, itâ€™s often flavored with ingredients like vanilla, chocolate, fruit, or nuts. Whether enjoyed in a cone, a cup, or as a topping, ice cream is a delightful treat tha', ' 1', '416792280704ice4.png'),
(4, 'Icecream2', '45', 'Ice cream is a frozen dessert beloved for its creamy texture and sweet, indulgent flavor. Made from a base of milk, cream, and sugar, itâ€™s often flavored with ingredients like vanilla, chocolate, fruit, or nuts. Whether enjoyed in a cone, a cup, or as a topping, ice cream is a delightful treat tha', ' 13', '115720719616ice3.png'),
(5, 'Shake', '678', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores non officia deserunt, eius voluptate consequatur iusto ipsa repudiandae enim recusandae odio culpa? Nihil quam repellat aperiam pariatur? Reiciendis, illo eius?', ' ', '40881507379ice5.png'),
(6, 'shake', '678', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores non officia deserunt, eius voluptate consequatur iusto ipsa repudiandae enim recusandae odio culpa? Nihil quam repellat aperiam pariatur? Reiciendis, illo eius?', ' ', '783328083754ice5.png'),
(7, 'shake', '678', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores non officia deserunt, eius voluptate consequatur iusto ipsa repudiandae enim recusandae odio culpa? Nihil quam repellat aperiam pariatur? Reiciendis, illo eius?', ' 12', '7858607780ice5.png'),
(8, 'shake', '234', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores non officia deserunt, eius voluptate consequatur iusto ipsa repudiandae enim recusandae odio culpa? Nihil quam repellat aperiam pariatur? Reiciendis, illo eius?', ' 12', '933847026295shake1.png'),
(9, 'Chocolate latte', '78', 'Ice cream is a frozen dessert beloved for its creamy texture and sweet, indulgent flavor. Made from a base of milk, cream, and sugar, itâ€™s often flavored with ingredients like vanilla, chocolate, fruit, or nuts. Whether enjoyed in a cone, a cup, or as a topping, ice cream is a delightful treat tha', ' 12', '831634855357shake4.png');

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE `quantities` (
  `serial_number` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`serial_number`, `product_id`, `quantity`) VALUES
(1, 3, '3');

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
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`serial_number`);

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
  MODIFY `client_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_products`
--
ALTER TABLE `order_products`
  MODIFY `order_products_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `quantities`
--
ALTER TABLE `quantities`
  MODIFY `serial_number` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
