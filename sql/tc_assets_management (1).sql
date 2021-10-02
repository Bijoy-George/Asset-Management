-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2021 at 04:29 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tc_assets_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `am_asset_staff`
--

CREATE TABLE `am_asset_staff` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `number_assign_product` int(11) NOT NULL,
  `assign_asset_total_amount` double DEFAULT NULL,
  `total_stock_assign` double DEFAULT NULL,
  `no_of_product_sell` int(11) DEFAULT NULL,
  `cash_received` double DEFAULT NULL,
  `buyer_name` varchar(100) DEFAULT NULL,
  `total_cash_of_product_sell` double DEFAULT NULL,
  `sell_product_total` decimal(10,0) DEFAULT NULL,
  `selling_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `am_products`
--

CREATE TABLE `am_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `product_remaining` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `categories` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `no_of_product` int(11) DEFAULT NULL,
  `total_stock_price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `am_users`
--

CREATE TABLE `am_users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `role` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `am_asset_staff`
--
ALTER TABLE `am_asset_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `am_products`
--
ALTER TABLE `am_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `am_users`
--
ALTER TABLE `am_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `am_asset_staff`
--
ALTER TABLE `am_asset_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `am_products`
--
ALTER TABLE `am_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `am_users`
--
ALTER TABLE `am_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
