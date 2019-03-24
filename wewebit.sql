-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2019 at 09:59 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `cart_alias`, `product_id`, `quantity`, `status`, `date_created`) VALUES
(7, 1, 'zpZNZkm80A', 2, 1, 2, 1553344377),
(6, 1, 'zpZNZkm80A', 1, 1, 2, 1553344335),
(8, 1, 'zpZNZkm80A', 2, 1, 2, 1553344495),
(9, 1, '5EKiOzpnTs', 2, 1, 2, 1553393545),
(10, 1, '5EKiOzpnTs', 2, 1, 2, 1553393554),
(11, 1, 'A9y9hdvZVF', 2, 1, 2, 1553393633),
(12, 1, 'A9y9hdvZVF', 2, 1, 2, 1553393641),
(13, 1, '8cGNTbKxwt', 2, 1, 2, 1553393955),
(14, 1, '8cGNTbKxwt', 1, 1, 2, 1553393958),
(15, 1, 'ESmyv3fnTL', 2, 1, 2, 1553394038),
(16, 1, 'ESmyv3fnTL', 1, 1, 2, 1553394042),
(17, 1, 'xqUf4E9dbw', 2, 1, 2, 1553394087),
(18, 1, 'xqUf4E9dbw', 1, 1, 2, 1553394091),
(19, 1, 'TX2QSrbaeA', 2, 1, 2, 1553394190),
(20, 1, 'rudfsJ2bKq', 1, 1, 2, 1553394507),
(21, 1, 'rudfsJ2bKq', 2, 1, 2, 1553394511),
(22, 1, 'aFiam3y1Oa', 2, 12, 2, 1553394536),
(23, 1, 'aFiam3y1Oa', 1, 1, 2, 1553394543);

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `cart_alias`, `total_amount`, `user_id`, `username`, `user_email`, `user_phone`, `user_address`, `date_created`) VALUES
(1, 'zpZNZkm80A', 3434, 1, 'Alaa', 'alaa.jaradeh@gmail.com', '0799204541', 'Amman', 123),
(2, 'zpZNZkm80A2', 3434, 1, 'Alaa', 'admin@gmail.com', '0799204541', 'Amman', 123),
(3, 'zpZNZkm80A', 3434, 1, 'Alaa Jaradeh', 'alaa.jaradeh@gmail.com', '0799204541', 'Amman - Jordan', 1553393508),
(4, '5EKiOzpnTs', 1508, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553393566),
(5, 'A9y9hdvZVF', 1508, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553393936),
(6, '8cGNTbKxwt', 2680, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553393968),
(7, 'ESmyv3fnTL', 2680, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553394075),
(8, 'xqUf4E9dbw', 2680, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553394099),
(9, 'TX2QSrbaeA', 754, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553394484),
(10, 'rudfsJ2bKq', 2680, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553394519),
(11, 'aFiam3y1Oa', 2680, 1, 'Alaa Jaradeh', 'info@alaajaradeh.com', '0799204541', 'Amman - Jordan', 1553419986);

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
(1, 'Alienware laptop', '1553308376_s0tIhddgXDqpUZt4Y9G32tzspYFxcQTF.jpg', 3, 'B350', 1660),
(2, 'Apple iphone X', '1553308440_rwm64oym5DFS7E1WEwVNxqhhdQrdn9la.png', 11, 'A125', 650);

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `path`, `auth_key`, `password_hash`, `pass`, `password_reset_token`, `email`, `phone`, `status`, `login_status`, `admin`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin1', '1.jpg', '', '$2y$13$88ZSgb0kLQOuRPWmJ/v5.uTadXQ8OAXsX6tpXxOXACEJCxgrt537y', 'admin1', NULL, 'admin@kidzmenia.com', '', 10, 1, 20, 20, 1493417801, 0),
(9, 'alaa.jaradeh', '', '1HbFG9VeAIqRc3MFtcPRkzgSn4QpymFC', '$2y$13$rKrDVvXJ0NjA4etLyoHpueEwDoTdjgisdnFrcJTtrJdhkMUGwYROO', 'alaa.jaradeh', NULL, 'alaa.jaradeh@gmail.com', '', 10, 1, 10, 10, 1503428920, 1503428920),
(10, 'test', 'None', 'IRjSuYx0iXf4yxpSLGVxduEIuIOKE2i5', '$2y$13$SFNdRnxPJV.z7/i996PjK.8X9pu2rhNFFFh8QkEZIHeGmuV.LhTPi', 'jaradea', NULL, 'alaa.jaradeha@gmail.com', '', 10, 1, 10, 10, 1533673701, 1533673701),
(11, 'test2', 'None', 'WNPCxDerXnzu5qQFFfOqmXcsCdqbRdnC', '$2y$13$RjaQcXwn96dxpsuxPOkWx.Dq5.lF2mhklV5N1WEmWzb6aplw00OGe', 'jaradea', NULL, 'alaa.jaradeh2@gmail.com', '', 10, 1, 20, 10, 1533673712, 1533673712),
(12, 'admin2', 'None', 'f1TBUDOKTDLmGA9U6dKAy-Y3Bm29guOk', '$2y$13$CH1Jamx6nskXH6DUuOGsj.InU9Fhros9OEFvLR19NzbXUIy5NjGGm', 'admin2', NULL, 'admin2@gmail.com', '0799204541', 10, 1, 20, 10, 1553388364, 1553388364);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
