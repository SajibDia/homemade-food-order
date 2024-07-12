-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2023 at 10:58 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homefood`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `phone` smallint(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `email`, `subject`, `phone`, `message`) VALUES
(1, 'xyz@gmail.com', 'mango', 32767, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`id`, `user_id`, `address`, `zip_code`, `area`) VALUES
(1, 6, '19 panthapath', '1214', 'Dhanmondi'),
(2, 8, '4/2 isdair', '1421', 'isdair'),
(3, 11, 'cgfhfg', '1420', 'ikhgjhj'),
(4, 13, 'test 2 add', 'test 2 zip', 'test 2 ar');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` date NOT NULL,
  `shop_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `payable_amount` bigint(20) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `user_id`, `order_date`, `shop_id`, `item_id`, `item_quantity`, `payable_amount`, `status`) VALUES
(29, 12, '2023-10-26', 23, 16, 1, 100, 'pending'),
(30, 12, '2023-10-26', 23, 15, 1, 110, 'pending'),
(31, 12, '2023-10-26', 22, 20, 1, 160, 'pending'),
(46, 24, '2023-10-26', 23, 17, 1, 32, 'pending'),
(47, 24, '2023-10-26', 23, 17, 1, 32, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order_details`
--

CREATE TABLE `customer_order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `unit_price` mediumint(9) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_order_details`
--

INSERT INTO `customer_order_details` (`id`, `order_id`, `item_id`, `unit_price`, `quantity`) VALUES
(1, 1, 3, 899, 1),
(2, 2, 3, 599, 1),
(3, 2, 3, 599, 1),
(4, 2, 3, 599, 1),
(5, 2, 3, 599, 1),
(6, 3, 2, 857, 1),
(7, 4, 5, 550, 1),
(8, 2, 3, 599, 1),
(9, 2, 3, 599, 1),
(10, 2, 3, 599, 1),
(11, 2, 3, 599, 1),
(12, 2, 3, 599, 1),
(13, 2, 3, 599, 1),
(14, 2, 3, 599, 1),
(15, 2, 3, 599, 1),
(16, 2, 3, 599, 1),
(17, 2, 3, 599, 1),
(18, 2, 3, 599, 1),
(19, 2, 3, 599, 1),
(20, 5, 3, 899, 1),
(21, 5, 3, 899, 1),
(22, 5, 3, 899, 1),
(23, 5, 3, 899, 1),
(24, 5, 3, 899, 1),
(25, 5, 3, 899, 1),
(26, 5, 3, 899, 1),
(27, 5, 3, 899, 1),
(28, 6, 5, 550, 100),
(29, 7, 3, 899, 20),
(30, 7, 3, 899, 20),
(31, 7, 3, 899, 20),
(32, 7, 3, 899, 20),
(33, 7, 3, 899, 20),
(34, 7, 3, 899, 20),
(35, 8, 3, 599, 1),
(36, 6, 5, 550, 100),
(37, 6, 5, 550, 100),
(38, 9, 3, 599, 10),
(39, 10, 2, 450, 1),
(40, 10, 3, 899, 1),
(41, 11, 2, 857, 1),
(42, 12, 3, 899, 1),
(43, 11, 2, 857, 1),
(44, 13, 1, 259, 1),
(45, 14, 2, 650, 5),
(46, 15, 3, 450, 1),
(47, 16, 1, 459, 1),
(48, 17, 5, 250, 2),
(49, 19, 2, 450, 1),
(50, 19, 2, 450, 1),
(51, 20, 2, 450, 1),
(52, 20, 1, 259, 1),
(53, 21, 14, 120, 5),
(54, 0, 2, 650, 1),
(55, 0, 0, 0, 0),
(56, 0, 3, 450, 1),
(57, 0, 14, 89, 1),
(58, 0, 8, 55, 1);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man`
--

CREATE TABLE `delivery_man` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_man_info`
--

CREATE TABLE `delivery_man_info` (
  `id` int(11) NOT NULL,
  `delivery_man_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `salary` int(50) NOT NULL,
  `is_booked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_man_info`
--

INSERT INTO `delivery_man_info` (`id`, `delivery_man_id`, `address`, `salary`, `is_booked`) VALUES
(1, 7, 'Jigatola', 2500, 0),
(2, 9, 'dhanmondi', 100, 0),
(3, 10, 'JIgatola', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_order`
--

CREATE TABLE `delivery_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `delivery_man_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivery_order`
--

INSERT INTO `delivery_order` (`id`, `order_id`, `delivery_man_id`) VALUES
(1, 1, 7),
(2, 2, 7),
(3, 4, 9),
(4, 18, 7),
(5, 31, 7);

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `medium_price` mediumint(9) NOT NULL,
  `family_price` mediumint(9) NOT NULL,
  `xl_price` mediumint(9) NOT NULL,
  `description` varchar(255) NOT NULL,
  `item_image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `item_name`, `medium_price`, `family_price`, `xl_price`, `description`, `item_image`, `user_id`) VALUES
(15, 'Rice-Beef', 70, 90, 100, 'Steamed rice pairs perfectly with salmon, chicken, steak, chili, and breakfast meats. We also make it for all kinds of sushi! Below we\'ve rounded up 21 of our favorite recipes we enjoy with rice so you know exactly what to make with white rice for your ne', 'image.png', 23),
(16, 'Fish with Rice', 80, 100, 100, 'It became popular as an aquarium fish because of its hardiness and pleasant coloration: its coloration varies from creamy-white to yellowish in the wild to white, creamy-yellow, or orange in aquarium-bred individuals.', 'fish.png', 23),
(17, 'Fresh Bread', 10, 12, 15, 'most homemade breads are likely healthier than store-bought breads, which are often high in sugar and preservatives. One benefit of making your own bread is that you can control the ingredients.', 'bread.jpg', 23),
(18, 'Kacchi Biriyani', 125, 180, 200, 'Kacchi Mutton Biryani is a delicious rice dish where tender goat or lamb meat pieces are marinated with lots of fried onions, whole spices, fresh herbs and yoghurt.', 'kacchi.png', 22),
(19, 'Rice-Meat with Veggies', 130, 180, 200, 'As long as you cook the meat thoroughly (i.e. if it reaches a safe temperature), most pathogens should be dead and it doesn\'t matter in which order you put the vegetables and the meat in.', 'food.png', 22),
(20, 'Fishy Rice', 100, 140, 150, 'The rich, fatty salmon is tempered by the comfortingly bland white rice, the latter absorbing what the former renders in excess.', 'fish-item.png', 22),
(21, 'Hot Bread', 30, 35, 35, 'The first bread was made in Neolithic times, nearly 12,000 years ago, probably of coarsely crushed grain mixed with water, with the resulting dough probably laid on heated stones and baked by covering with hot ashes.', 'new-item.png', 22);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reviews` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `item_id`, `user_id`, `reviews`) VALUES
(1, 2, 11, 'Very good Products');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_address` varchar(500) DEFAULT NULL,
  `user_zip` varchar(10) DEFAULT NULL,
  `user_area` varchar(55) DEFAULT NULL,
  `shop_name` varchar(55) DEFAULT NULL,
  `nid_number` varchar(15) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT 'uploads/default-profile-picture.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `full_name`, `email`, `phone_number`, `password`, `user_role`, `user_address`, `user_zip`, `user_area`, `shop_name`, `nid_number`, `profile_image`) VALUES
(1, 'admin', 'admin@admin.com', '01523598741', 'admin123', 'admin', 'Dolphin Goli', '1205', 'Tejgoan, Dhaka', 'Admin', '', 'uploads/male-chef.png'),
(7, 'delivery man One', 'd@gmail.com', '01781258213', '123456789', 'delivery_man', NULL, NULL, '', '', '', NULL),
(12, 'Sajib Rahman', 'sajib@rahman.com', '01778493541', '12345678', 'customer', 'Dolphin Goli', '1205', 'Dhanmondi, Dhaka', '', '', 'uploads/seller1.png'),
(18, 'Sajib Rahman', 's@f.com', '01778493541', '123456789', 'seller', 'Dolphin Goli', '1122', 'test Ar', 'Shop Hoff', '9198563241578', 'uploads/comment-1.jpg'),
(20, 'Refi Haq', 'req@shop.com', '01478547854', '123456789', 'seller', 'Ujjjd', '7845', 'Dhaka', 'ReQ', '1478523698547', 'uploads/male-chef.png'),
(21, 'Customer Name', 'customer@gmail.com', '98745632145', '12345678', 'customer', 'Dolphin Goli', '1205', 'Tejgoan, Dhaka', NULL, NULL, ''),
(22, 'Shop Hoff', 'shophoff@gmail.com', '01778493541', '12345678', 'seller', 'Rahi Road - 5, ST', '9874', 'Melbo, UK', 'Shop Hoff', '9874563214569', 'uploads/logo.jpg'),
(23, 'Imran Ahmed', 'khawbazar@hotmail.com', '01695694583', '12345678', 'seller', 'House - 5, Shoytaner Goli, Road- 4', '6969', 'Savar, Dhaka', 'Khaw Bazar', '9874563214569', 'uploads/sajib2 - Copy.jpeg'),
(24, 'fazlay', 'fazlay@gmail.comm', '12345678910', '12345678', 'customer', '55dflknaf', '888', 'dhaka', NULL, NULL, 'uploads/Secretary-Blinkens-Official-Department-Photo.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop` (`shop_id`),
  ADD KEY `item` (`item_id`),
  ADD KEY `user` (`user_id`);

--
-- Indexes for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_man_info`
--
ALTER TABLE `delivery_man_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_order`
--
ALTER TABLE `delivery_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test` (`user_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_address`
--
ALTER TABLE `customer_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `customer_order_details`
--
ALTER TABLE `customer_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `delivery_man`
--
ALTER TABLE `delivery_man`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `delivery_man_info`
--
ALTER TABLE `delivery_man_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `delivery_order`
--
ALTER TABLE `delivery_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD CONSTRAINT `item` FOREIGN KEY (`item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shop` FOREIGN KEY (`shop_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `Test` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
