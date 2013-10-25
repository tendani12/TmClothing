-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2013 at 08:04 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_log_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `last_log_date`) VALUES
(1, 'mpho', 'mpho123', '2013-09-23'),
(2, 'tendani', 'nema079', '2013-09-23');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(16) NOT NULL,
  `details` text NOT NULL,
  `category` varchar(16) NOT NULL,
  `subcategory` varchar(16) NOT NULL,
  `date_added` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `price`, `details`, `category`, `subcategory`, `date_added`) VALUES
(8, 'kk', '50', 'fdgvbcvfxdzssz', 'Clothing', 'Hats', '2013-10-17'),
(9, 'choene', '50', 'dtnjdbfhjdefbjbdhweg', 'Clothing', 'Shirts', '2013-10-18'),
(10, 'Ball', '95', 'Ayoba', 'Electronics', 'Shirts', '2013-10-18'),
(11, 'xolani', '20', 'hat hat hat', 'Clothing', 'Hats', '2013-10-18'),
(14, 'porince', '50', 'hhjhhghg', 'Clothing', 'Hats', '2013-10-24');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id-array` varchar(255) NOT NULL,
  `payer_email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `payment_date` varchar(255) NOT NULL,
  `mc_gross` varchar(255) NOT NULL,
  `payment_currency` varchar(255) NOT NULL,
  `txn_id` varchar(255) NOT NULL,
  `receiver_email` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `txn_type` varchar(255) NOT NULL,
  `payer_status` varchar(255) NOT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_status` varchar(255) NOT NULL,
  `verify_sign` varchar(255) NOT NULL,
  `lol` int(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Name` varchar(50) NOT NULL,
  `Surname` varchar(50) NOT NULL,
  `E_mail` varchar(50) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Name`, `Surname`, `E_mail`, `Contact`, `Address`) VALUES
('tgtgtg', 'rrge', 'rrgrg', 0, ''),
('tgtgtg', 'rrge', 'rrgrg', 0, ''),
('Tendani', 'nemas', 'fggh', 737206509, ''),
('tgtgtg', 'rrge', 'rrgrg', 0, ''),
('tgtgtg', 'rrge', 'rrgrg', 0, 'rgregr'),
('tgtgtg', 'rrge', 'rrgrg', 0, 'rgregr'),
('tgtgtg', 'rrge', 'rrgrg', 0, 'rgregr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
