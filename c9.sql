-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2018 at 11:41 AM
-- Server version: 5.5.54-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `c9`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `descript` text NOT NULL,
  `image_path` varchar(500) NOT NULL,
  `PDF` varchar(500) NOT NULL,
  `created` datetime NOT NULL,
  `modified_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `descript`, `image_path`, `PDF`, `created`, `modified_time`) VALUES
(2, 'Wind Turbine Mark 2', '4444', 'A more advanced Version of the original!', 'Larger-Hydro.JPG', 'sheet.pdf', '2017-05-03 10:24:04', '2017-05-03 09:24:40'),
(3, 'Solar Panels', '55555', 'Solar panels good in Spain, not so in the UK!', 'sell_solar.jpg', 'solar_info.png', '2017-05-03 10:25:00', '2017-05-03 09:25:39'),
(4, 'Large Scale Hydro', '9999', 'Large Scale Hydro', 'Larger-Hydro.JPG', 'testPDF.pdf', '2017-05-19 10:03:46', '2017-05-19 10:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(45) NOT NULL AUTO_INCREMENT,
  `First` varchar(45) NOT NULL,
  `Last` varchar(45) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Postcode` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Type` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `First`, `Last`, `Email`, `Postcode`, `Address`, `Password`, `Type`) VALUES
(1, 'Admin', 'Admin', 'Admin@Lidiflu.com', 'Admin', 'Admin', 'Admin', 'Admin'),
(2, 'Test', 'User', 'user@gmail.com', 'G82 X5K', '28 west king street', 'User123', 'User'),
(3, 'Dave', 'Ball', 'dave.mike.ball@gmail.com', 'g5 8eb', 'flat 9, 8 riverview place', 'pass', 'User');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
