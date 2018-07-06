-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 06, 2018 at 11:48 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointments`
--

-- --------------------------------------------------------

--
-- Table structure for table `apt`
--

DROP TABLE IF EXISTS `apt`;
CREATE TABLE IF NOT EXISTS `apt` (
  `sn` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `descr` text NOT NULL,
  `dated` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL,
  PRIMARY KEY (`sn`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apt2`
--

DROP TABLE IF EXISTS `apt2`;
CREATE TABLE IF NOT EXISTS `apt2` (
  `snoo` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `us1` varchar(255) NOT NULL,
  `us2` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `descr` text NOT NULL,
  `dated` date NOT NULL,
  `s_time` time NOT NULL,
  `e_time` time NOT NULL,
  PRIMARY KEY (`snoo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notif`
--

DROP TABLE IF EXISTS `notif`;
CREATE TABLE IF NOT EXISTS `notif` (
  `cn` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `usn` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `aor` tinyint(4) NOT NULL,
  PRIMARY KEY (`cn`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
