-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2016 at 06:11 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `adroha`
--

-- --------------------------------------------------------

--
-- Table structure for table `customercare`
--

CREATE TABLE IF NOT EXISTS `customercare` (
  `complain_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `email_id` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `contact_no` int(15) NOT NULL,
  `msg` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  PRIMARY KEY (`complain_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `customercare`
--

INSERT INTO `customercare` (`complain_id`, `username`, `email_id`, `contact_no`, `msg`) VALUES
(1, 'user', 'user@gmail.com', 433536478, 'Something');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE IF NOT EXISTS `donations` (
  `donation_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`donation_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`donation_id`, `user_id`, `project_id`, `amount`, `time`) VALUES
(1, 4, 8, 1000, '2016-01-24 16:28:44'),
(14, 4, 6, 7, '2016-01-24 21:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `maker` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_collected` int(11) DEFAULT NULL,
  `time_limit` date NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `title`, `maker`, `amount`, `amount_collected`, `time_limit`) VALUES
(1, 'Project Utsaah', 'Somaiya Social Cell', 450000, 5500, '2016-03-31'),
(6, 'GajaMitra', 'Team Gajamitra', 1500000, 133, '2016-03-31'),
(7, 'Hitch Tag', 'Akshay Sonandkar', 150000, 8000, '2016-03-31'),
(8, 'Project Bhog', 'Enactus NMIMS', 20000, 3010, '2016-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `contact_no` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `email_id` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `user_type` int(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `contact_no`, `email_id`, `user_type`) VALUES
(1, 'Abhinav Rai', 'a', '8743960158', 'raiabhinavrai1994@gmail.com', 1),
(2, 'Akash Gautam', 'Akash', '8743960158', 'abc@xyz.com', 0),
(3, 'admin', 'admin', '1234567890', 'admin@gmail.com', 1),
(4, 'user', 'user', '9876543210', 'user@gmail.com', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
