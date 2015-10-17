-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2015 at 05:32 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackfest`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `concept_name` varchar(200) NOT NULL,
  `branch` varchar(3) NOT NULL,
  `sem` int(1) NOT NULL,
  `unit` int(1) NOT NULL,
  `reference` text NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `video` varchar(100) NOT NULL,
  `verified` int(1) NOT NULL,
  `rating` int(2) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`bid`),
  KEY `foreg` (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bid`, `concept_name`, `branch`, `sem`, `unit`, `reference`, `content`, `image`, `video`, `verified`, `rating`, `subject`, `uid`) VALUES
(1, 'Flip Flop', 'cse', 3, 4, 'R D Sudhaker Samuel - Page 250', 'FLIP FLOP are Logic Devices', '', '', 1, 3, 'Logic Design', 2);

-- --------------------------------------------------------

--
-- Table structure for table `infrastructure`
--

CREATE TABLE IF NOT EXISTS `infrastructure` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(1) NOT NULL,
  `location` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` varchar(200) NOT NULL,
  `cap_unit` int(11) NOT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE IF NOT EXISTS `lecturers` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `branch` varchar(3) NOT NULL,
  `sem` int(1) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `time` varchar(200) NOT NULL,
  `rating` int(2) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `iverified` int(1) NOT NULL,
  `cookie` text NOT NULL,
  `salt` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `contact`, `iverified`, `cookie`, `salt`) VALUES
(1, 'test', 'test', 'test', 'test@test.com', 12345, 1, '12345abcde', ''),
(2, 'admin', 'cda9cb16e07059072a043fff00de82c7a4d3ca64', 'Admin', 'admin@admin.com', 12345, 1, 'GVgSWxvLvI', '123abc'),
(4, 'kedhar', 'ec72188feae11473989d00fe02a949ad35aca0dd', 'kedhar', '12345', 12345, 0, 'JXWN1lQgw3', '6NI5DD');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
