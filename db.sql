-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2022 at 06:23 PM
-- Server version: 8.0.28-0ubuntu0.20.04.3
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scandiweb-test`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog_product`
--

CREATE TABLE `catalog_product` (
  `id` int NOT NULL,
  `product_name` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Product Name',
  `product_price` decimal(20,6) DEFAULT NULL COMMENT 'Product Price',
  `product_sku` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Product Sku',
  `product_type` int DEFAULT NULL COMMENT 'Product Type 0=>DVD 1=>Book 2=>Furniture',
  `product_attribute_value` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Product Attribute Value'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog_product`
--
ALTER TABLE `catalog_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_sku` (`product_sku`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catalog_product`
--
ALTER TABLE `catalog_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
