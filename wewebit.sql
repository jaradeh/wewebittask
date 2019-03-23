-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 23, 2019 at 01:22 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wewebit`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_category`
--

DROP TABLE IF EXISTS `assigned_category`;
CREATE TABLE IF NOT EXISTS `assigned_category` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `product_id` int(25) NOT NULL,
  `category_id` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_category`
--

INSERT INTO `assigned_category` (`id`, `product_id`, `category_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `user_id` int(25) NOT NULL,
  `cart_alias` varchar(255) NOT NULL,
  `product_id` int(25) NOT NULL,
  `quantity` int(25) NOT NULL,
  `status` int(25) NOT NULL,
  `date_created` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `cart_alias`, `product_id`, `quantity`, `status`, `date_created`) VALUES
(7, 1, 'zpZNZkm80A', 2, 1, 1, 1553344377),
(6, 1, 'zpZNZkm80A', 1, 1, 1, 1553344335),
(8, 1, 'zpZNZkm80A', 2, 1, 1, 1553344495);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Technology'),
(2, 'Hardware'),
(3, 'Food'),
(4, 'Phones');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1459754785),
('m130524_201442_init', 1459754789);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `cart_alias` varchar(255) CHARACTER SET utf8 NOT NULL,
  `total_amount` int(25) NOT NULL,
  `user_id` int(25) NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_created` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `store_quantity` int(25) NOT NULL DEFAULT '1',
  `sku` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `price` int(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `store_quantity`, `sku`, `price`) VALUES
(1, 'Alienware laptop', '1553308376_s0tIhddgXDqpUZt4Y9G32tzspYFxcQTF.jpg', 12, 'B350', 1660),
(2, 'Apple iphone X', '1553308440_rwm64oym5DFS7E1WEwVNxqhhdQrdn9la.png', 25, 'A125', 650);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `login_status` int(1) NOT NULL DEFAULT '1',
  `admin` int(1) NOT NULL DEFAULT '2',
  `role` int(25) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `path`, `auth_key`, `password_hash`, `pass`, `password_reset_token`, `email`, `phone`, `status`, `login_status`, `admin`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin1', '1.jpg', '', '$2y$13$88ZSgb0kLQOuRPWmJ/v5.uTadXQ8OAXsX6tpXxOXACEJCxgrt537y', 'admin1', NULL, 'admin@kidzmenia.com', '', 10, 1, 20, 20, 1493417801, 0),
(9, 'alaa.jaradeh', '', '1HbFG9VeAIqRc3MFtcPRkzgSn4QpymFC', '$2y$13$rKrDVvXJ0NjA4etLyoHpueEwDoTdjgisdnFrcJTtrJdhkMUGwYROO', 'alaa.jaradeh', NULL, 'alaa.jaradeh@gmail.com', '', 10, 1, 10, 10, 1503428920, 1503428920),
(10, 'test', 'None', 'IRjSuYx0iXf4yxpSLGVxduEIuIOKE2i5', '$2y$13$SFNdRnxPJV.z7/i996PjK.8X9pu2rhNFFFh8QkEZIHeGmuV.LhTPi', 'jaradea', NULL, 'alaa.jaradeha@gmail.com', '', 10, 1, 10, 10, 1533673701, 1533673701),
(11, 'test2', 'None', 'WNPCxDerXnzu5qQFFfOqmXcsCdqbRdnC', '$2y$13$RjaQcXwn96dxpsuxPOkWx.Dq5.lF2mhklV5N1WEmWzb6aplw00OGe', 'jaradea', NULL, 'alaa.jaradeh2@gmail.com', '', 10, 1, 20, 10, 1533673712, 1533673712);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
