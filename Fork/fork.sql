-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2013 at 09:33 AM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fork`
--
--CREATE DATABASE IF NOT EXISTS `fork` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
--USE `fork`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `hash` char(5) COLLATE utf8_bin NOT NULL,
  `gender` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `stsrc` int(11) NOT NULL,
  `userchange` varchar(50) COLLATE utf8_bin NOT NULL,
  `datechange` datetime NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`,`email`,`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `hash`, `gender`, `age`, `location_id`, `stsrc`, `userchange`, `datechange`) VALUES
(1, 'hackedhacker', 'hacked@hacker.com', '463487fd707ac502d5ee2451435c856c', 'sl834', 0, 99, 1, 1, 'APPLICATION_CREATOR', '2013-12-08 17:40:51');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
