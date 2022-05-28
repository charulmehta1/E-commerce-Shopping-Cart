-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 09:37 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `price`, `name`, `image_name`) VALUES
(1, 36000, 'Cannon EOS', 'img/6.jpg'),
(2, 40000, 'Nikon EOS', 'img/2.jpg'),
(3, 50000, 'Sony DSLR', 'img/3.jpg'),
(4, 50000, 'Olympus DSLR', 'img/4.jpg'),
(5, 13000, 'Titan Model #301', 'img/18.jpg'),
(6, 3000, 'Titan Model #201', 'img/19.jpg'),
(7, 8000, 'HMT Milan\r\n                        ', 'img/20.jpg'),
(8, 18000, 'Faber Luba #111', 'img/21.jpg'),
(9, 800, 'H&W', 'img/22.jpg'),
(10, 1000, 'Luis Phil', 'img/23.jpg'),
(11, 1500, 'John Zok', 'img/24.jpg'),
(12, 1300, 'Jhalsani', 'img/25.jpg'),
(13, 1500, 'Lp', 'img/shirts2.jpg'),
(14, 1000, 'Jeans', 'img/528.jpeg'),
(15, 4000, 'Shoes', 'img/brown-shoes-1150071_1920.jpg'),
(26, 6132, 'dsd', 'img/0.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `paymentdetails`
--

CREATE TABLE `paymentdetails` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `item_id` varchar(255) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL,
  `payment_status` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paymentdetails`
--

INSERT INTO `paymentdetails` (`id`, `payment_id`, `item_id`, `Amount`, `payment_status`, `user_id`) VALUES
(1, '38502760d2684263b50064a413bafa80', '1, 2', 76000, 'Confirmed', 21),
(2, '09f9191962af48cab30ca5438901d065', '2, 3, 4', 140000, 'pending', 22),
(3, 'a84d3dc6330749218bb4327659107487', '2, 3, 4', 140000, 'pending', 22),
(4, 'cc8910995d934f7c8248ddf2f709b1a3', '3, 4', 100000, 'pending', 22),
(5, '0490af65c27f4b939456db8743a7281f', '3, 4', 100000, 'pending', 22);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `contact` text NOT NULL,
  `city` text NOT NULL,
  `address` text NOT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `contact`, `city`, `address`, `group_id`) VALUES
(3, 'naman Singhvi', 'singhvinaman@gmail.com', 'f0872309f6129c3d4b908d57f8168041', '9509513689', 'udaipur', 'ghjvjh', 2),
(4, 'Chinmay Dhing', 'chinmaydhi123@gmail.com', '178504824f88f81e61e3846336215879', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(6, 'Amit', 'abc@gmail.com', 'chinmay@123', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 1),
(7, 'hhhh', 'abcd@gmail.com', '25d55ad283aa400af464c76d713c07ad', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(8, 'qqqqqq', 'qqqq@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(9, 'test', 'test@gmail.com', '2b7efbfc24540b11b3642ef09a382f6e', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(10, 'Anju', 'anju@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(11, 'asdfg', 'abcdfg@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(12, 'Chinmay Dhing', 'chinmayyydhi123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(13, 'Amitt', 'amitt@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(14, 'namann', 'namann@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(15, 'assdfg', 'ab@gmail.com', '25f9e794323b453885f5181f1b624d0b', '7610850721', 'Udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(16, 'chinmay', 'chii@gmail.com', 'dd4b21e9ef71e1291183a46b913ae6f2', '7658998542', 'udaipur', '4,Shastri circle behind post office udaipur, Same', 2),
(22, 'jinal bhardwaj', 'jinal@gmail.com', '74e9bfab3b2449b7cf4865fe00c43f5d', '9024325584', 'udaipur', '1323425', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users_items`
--

CREATE TABLE `users_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_items`
--

INSERT INTO `users_items` (`id`, `item_id`, `user_id`, `status`) VALUES
(125, 1, 15, 'Confirmed'),
(126, 1, 15, 'Confirmed'),
(127, 1, 15, 'Added to cart'),
(128, 1, 6, 'Confirmed'),
(129, 1, 17, 'Confirmed'),
(130, 1, 17, 'Confirmed'),
(131, 2, 19, 'Confirmed'),
(132, 3, 19, 'Confirmed'),
(134, 5, 21, 'Confirmed'),
(136, 4, 21, 'Confirmed'),
(137, 2, 21, 'Confirmed'),
(138, 1, 21, 'Confirmed'),
(139, 2, 21, 'Confirmed'),
(140, 1, 21, 'Confirmed'),
(142, 3, 22, 'Added to cart'),
(143, 4, 22, 'Added to cart');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `Title`) VALUES
(1, 'Admin'),
(2, 'US\\ser');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_items`
--
ALTER TABLE `users_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `paymentdetails`
--
ALTER TABLE `paymentdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_items`
--
ALTER TABLE `users_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
