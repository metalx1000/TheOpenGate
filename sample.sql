-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 08, 2015 at 01:50 PM
-- Server version: 5.5.40-36.1
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `metalx_shopping`
--

-- --------------------------------------------------------

--
-- Table structure for table `cookbook`
--

CREATE TABLE IF NOT EXISTS `cookbook` (
  `id` int(11) NOT NULL,
  `pid` text NOT NULL,
  `title` text NOT NULL,
  `prep_time` text NOT NULL,
  `cook_time` text NOT NULL,
  `total_time` text NOT NULL,
  `yield` text NOT NULL,
  `description` text NOT NULL,
  `ingredients` text NOT NULL,
  `instructions` text NOT NULL,
  `comments` text NOT NULL,
  `category` text NOT NULL,
  `source` text NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cookbook`
--

INSERT INTO `cookbook` (`id`, `pid`, `title`, `prep_time`, `cook_time`, `total_time`, `yield`, `description`, `ingredients`, `instructions`, `comments`, `category`, `source`, `tags`) VALUES
(4, 'iZepe5Uj', 'bob', 'test', 'new', '', '', '          ', '          ', '          ', '          ', '', '', ''),
(6, 'LrIUSOuw', 'test', '', '', '', '', '          ', '          ', '          ', '          ', '', '', ''),
(15, 'qnl5js9c', 'Meal time', '10', '20', '30', '50', 'it is good', 'meat, sauce, beef', '', '', 'dinner', 'a friend', 'Yum, Good, love this');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `store` char(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `item` char(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`store`, `item`) VALUES
('PUBLIX', ' BANANAS'),
('JENN', ' CALL ABOUT FINGER PRINTING'),
('PUBLIX', ' EGGS'),
('PUBLIX', ' GRITS'),
('PUBLIX', ' ROTISSERIE CHICKEN'),
('JENN', ' WATER STRAWBERRIES'),
('PUBLIX', ' MILK'),
('JENN', ' ORGANIZE BATHROOM DRAWERS'),
('JENN', ' GET BIRTHDAY GIFT FOR SHANINE');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL,
  `product` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `store` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sale` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product`, `store`, `price`, `date`, `user`, `sale`) VALUES
(1, NULL, 'Publix', NULL, NULL, NULL, NULL),
(2, NULL, 'Target', NULL, NULL, NULL, NULL),
(3, NULL, 'Walmart', NULL, NULL, NULL, NULL),
(4, NULL, 'CVS', NULL, NULL, NULL, NULL),
(5, NULL, 'Walgreens', NULL, NULL, NULL, NULL),
(6, '1 Gallon of Milk', NULL, NULL, NULL, NULL, NULL),
(7, 'undefined', NULL, NULL, NULL, NULL, NULL),
(8, 'undefined', NULL, NULL, NULL, NULL, NULL),
(9, 'undefined', NULL, NULL, NULL, NULL, NULL),
(10, 'undefined', NULL, NULL, NULL, NULL, NULL),
(11, 'undefined', NULL, NULL, NULL, NULL, NULL),
(12, 'undefined', NULL, NULL, NULL, NULL, NULL),
(13, 'milk', NULL, NULL, NULL, NULL, NULL),
(14, '1 Gallon of Milk', NULL, NULL, NULL, NULL, NULL),
(15, 'milk', NULL, NULL, NULL, NULL, NULL),
(16, 'Cheese', NULL, NULL, NULL, NULL, NULL),
(17, NULL, 'Publix', NULL, NULL, NULL, NULL),
(18, 'Can food', NULL, NULL, NULL, NULL, NULL),
(19, 'cheese', 'Publix', '5.99', '03/25/2013', '98.208.225.213', 'Sale Price'),
(20, 'Cheese', 'Target', '3.99', '03/25/2013', '98.208.225.213', 'Regular Price'),
(21, '1 Gallon of Milk', 'Publix', '4.99', '03/25/2013', '98.208.225.213', 'Regular Price'),
(22, 'Cheese', 'Target', '2.99', '03/25/2013', '98.208.225.213', 'Regular Price'),
(23, NULL, '', NULL, NULL, NULL, NULL),
(24, '1 Gallon of Milk', 'Publix', '3.99', '03/25/2013', '98.208.225.213', 'Regular Price'),
(25, '1 Gallon of Milk', 'Target', '2.33', '03/25/2013', '208.54.85.246', 'Regular Price'),
(26, '1 Gallon of Milk', 'Publix', '3.99', '03/25/2013', '208.54.85.246', 'Regular Price');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE IF NOT EXISTS `stores` (
  `store` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cookbook`
--
ALTER TABLE `cookbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cookbook`
--
ALTER TABLE `cookbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
