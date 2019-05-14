-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2019 at 09:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vinra`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `author` varchar(30) NOT NULL,
  `publisher_name` varchar(30) NOT NULL,
  `isbn` int(11) NOT NULL,
  `poster` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL,
  `book_desc` varchar(1500) NOT NULL,
  `published_date` varchar(11) NOT NULL,
  `sample_pdf_book` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `pdf_book` varchar(50) NOT NULL,
  `no_of_pages` int(11) NOT NULL,
  PRIMARY KEY (`book_id`),
  UNIQUE KEY `isbn` (`isbn`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `author`, `publisher_name`, `isbn`, `poster`, `category_id`, `book_desc`, `published_date`, `sample_pdf_book`, `price`, `pdf_book`, `no_of_pages`) VALUES
(1, 'iRobot', 'someone', 'annonymous', 12345, '5ca40808c52f70e05f59d731f7a6c95c.jpg', 6, 'why up dude', '2019-05-01', 'Clean_Code.pdf', 400000, 'outliers-the_story_of_success.pdf', 2300);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(30) NOT NULL,
  `parent_category` int(11) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `parent_category`) VALUES
(1, 'Science', 0),
(2, 'Computer', 0),
(3, 'Physics', 1),
(4, 'Chemistry', 1),
(5, 'Biology', 1),
(6, 'Zoology', 1),
(7, 'Economics', 0),
(8, 'Arts', 0),
(9, 'Animation', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_isbn` int(11) NOT NULL,
  `user_mobile_no` varchar(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `time_of_payment` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `book_isbn`, `user_mobile_no`, `amount`, `time_of_payment`) VALUES
(1, 98765, '8743960158', 9898, '2019-04-28 12:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

DROP TABLE IF EXISTS `queries`;
CREATE TABLE IF NOT EXISTS `queries` (
  `query_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `email_id` varchar(30) NOT NULL,
  `msg` varchar(200) NOT NULL,
  PRIMARY KEY (`query_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `contact_no` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `email_id` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `contact_no`, `email_id`, `user_type`) VALUES
(1, 'Abhinav Rai', 'abhinav', '8743960158', 'raiabhinavrai1994@gmail.com', 1),
(2, 'Akash Gautam', 'Akash', '8743960158', 'abc@xyz.com', 0),
(3, 'admin', 'admin', '1234567890', 'admin@gmail.com', 1),
(4, 'user', 'user', '9876543210', 'user@gmail.com', 0),
(7, 'verma', 'qwerty', '9233333333', 'verma@gmail.com', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
