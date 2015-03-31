-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 31, 2015 at 12:26 AM
-- Server version: 5.5.41-cll-lve
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gtpcom_cake`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name_category`) VALUES
(1, 'ACTIVEWEAR'),
(2, 'DRESS'),
(3, 'SWEATS');

-- --------------------------------------------------------

--
-- Table structure for table `order_temp`
--

CREATE TABLE IF NOT EXISTS `order_temp` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_product` int(20) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `order_temp`
--

INSERT INTO `order_temp` (`id`, `id_product`, `qty`, `session_id`) VALUES
(1, 3, '1', 'un3lrjf8ck8kboj76hub9vt7h0'),
(2, 2, '1', 'un3lrjf8ck8kboj76hub9vt7h0'),
(7, 2, '2', '1tnisp76kcamct2s87hq7d4hb0'),
(8, 4, '6', '0mp07nj78tq6om1441p5iku1t5'),
(13, 2, '2', 'tojqq0e5g8bo381dgqp0g5fdt2'),
(14, 1, '1', 'tojqq0e5g8bo381dgqp0g5fdt2'),
(15, 4, '1', 'tojqq0e5g8bo381dgqp0g5fdt2'),
(16, 1, '5', 'j8j6urtq2uq47fips1ud42v606'),
(17, 1, '1', '6matlun9qcqoslpurdnmmobev2'),
(18, 3, '3', 's911j5n7ilatm61pvp1bn2cfo0'),
(19, 3, '1', 'qpt6e24fdf5q1fcnojh7us4ub0'),
(20, 4, '1', 'qpt6e24fdf5q1fcnojh7us4ub0'),
(21, 4, '5', 'dd7khbv0go3k9u1h0p02dnagp6');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_cat` int(5) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_cat`, `product_name`, `cost`, `filename`) VALUES
(1, 2, 'PINK DRESS', '145', 'items/1.jpg'),
(2, 3, 'LIME SWEAT', '123', 'items/119918.jpg'),
(3, 1, 'ACTIVE WHITE', '324', 'items/32.jpg'),
(4, 2, 'LONG DRESS', '245', 'items/5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_member` int(20) NOT NULL,
  `id_product` int(20) NOT NULL,
  `qty` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `id_member`, `id_product`, `qty`) VALUES
(1, 1, 4, '1'),
(2, 1, 1, '5'),
(3, 1, 4, '5'),
(4, 1, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(20) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `role`, `modified`) VALUES
(1, 'Wahyu', 'Kodar', 'wahyukodar@gmail.com', 'wahyu', '6f77940664ae17095f1962b3d39c5ee92f4826cc', 'admin', '2015-01-17 22:31:03'),
(3, 'Zainal', 'Arifin', 'zainal@gmail.com', 'zainal', 'c198f9fc83c8fbef1434eaab1d664902c5388c47', 'member', '2015-01-18 00:33:07');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
