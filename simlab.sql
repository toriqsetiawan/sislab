-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 25, 2013 at 07:46 PM
-- Server version: 5.5.29
-- PHP Version: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `name`, `email`, `address`, `phone`) VALUES
(1, 'adminer', '1f3870be274f6c49b3e31a0c6728957f', 'toriq bagus', 'toriqbagus@gmail.com', 'Jl.Margo Mulyo Gg.Sidorame No.10 A', '085755228747');

-- --------------------------------------------------------

--
-- Table structure for table `asisten`
--

CREATE TABLE `asisten` (
  `asisten_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `grade` int(4) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`asisten_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `asisten`
--

INSERT INTO `asisten` (`asisten_id`, `username`, `password`, `name`, `grade`, `email`, `address`, `phone`) VALUES
(1, 'toriq', 'c21f969b5f03d33d43e04f8f136e7682', 'toriq bagus', 2011, 'toriqbagus@gmail.com', 'Jl.Margo Mulyo Gg.Sidorame No.10 A', '085755228747'),
(4, 'yusuf', 'c21f969b5f03d33d43e04f8f136e7682', 'm yusuf fachroni', 2011, 'yusuf@gmail.com', 'Jl.Margo Mulyo Gg.Sidorame No.10 A', '085755228741'),
(5, 'oryza', 'c21f969b5f03d33d43e04f8f136e7682', 'oryza yopi', 2011, 'oryza@gmail.com', 'perum. bumi asri', '085123123456');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('851aae1cdc5b7bd0c5c257f1ad27955a', '::1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.57 Safari/537.36', 1387996957, 'a:9:{s:9:"user_data";s:0:"";s:5:"token";s:32:"0f27821e26845224f3c63355636a96c9";s:2:"id";s:1:"1";s:8:"username";s:7:"adminer";s:8:"password";s:32:"1f3870be274f6c49b3e31a0c6728957f";s:4:"name";s:11:"toriq bagus";s:7:"picture";s:1:"1";s:9:"validated";b:1;s:3:"msg";s:0:"";}');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  PRIMARY KEY (`dosen_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`dosen_id`, `username`, `password`, `name`, `email`, `address`, `phone`) VALUES
(3, 'hariadi', '2185910ba743fe9e6734ad017067af0e', 'hariadi', 'hariadi@gmail.com', 'tlogomas malang', '085123123456'),
(4, 'ali', '86318e52f5ed4801abe1d13d509443de', 'ali sofyan kholimi', 'ali@umm.ac.id', 'batu kota', '085123123456');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(2) NOT NULL,
  `name_start` time NOT NULL,
  `name_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `name_start`, `name_end`) VALUES
(1, '07:00:00', '07:50:00'),
(2, '07:50:00', '08:40:00'),
(3, '08:40:00', '09:30:00'),
(4, '09:30:00', '10:20:00'),
(5, '10:20:00', '11:10:00'),
(6, '12:10:00', '13:00:00'),
(7, '13:00:00', '13:50:00'),
(8, '13:50:00', '14:40:00'),
(9, '15:15:00', '16:05:00'),
(10, '16:05:00', '16:55:00'),
(11, '16:55:00', '17:45:00'),
(12, '18:15:00', '19:05:00'),
(13, '19:05:00', '19:55:00'),
(14, '19:55:00', '20:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE `mk` (
  `mk_id` int(4) NOT NULL AUTO_INCREMENT,
  `dosen_id` int(4) NOT NULL,
  `asisten_id` varchar(7) NOT NULL,
  `name` varchar(30) NOT NULL,
  `class` char(1) NOT NULL,
  `semester` int(1) NOT NULL,
  PRIMARY KEY (`mk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `sch_id` int(4) NOT NULL AUTO_INCREMENT,
  `day` char(6) NOT NULL,
  `dosen_id` int(4) NOT NULL,
  `asisten_id` varchar(7) NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `lab_id` int(1) NOT NULL,
  PRIMARY KEY (`sch_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`sch_id`, `day`, `dosen_id`, `asisten_id`, `start`, `end`, `lab_id`) VALUES
(2, '', 0, '', '00:00:00', '00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `temp_asisten`
--

CREATE TABLE `temp_asisten` (
  `temp_id` int(4) NOT NULL,
  UNIQUE KEY `temp_id` (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_asisten`
--

INSERT INTO `temp_asisten` (`temp_id`) VALUES
(2),
(3),
(6);

-- --------------------------------------------------------

--
-- Table structure for table `temp_dosen`
--

CREATE TABLE `temp_dosen` (
  `temp_id` int(4) NOT NULL,
  UNIQUE KEY `temp_id` (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_dosen`
--

INSERT INTO `temp_dosen` (`temp_id`) VALUES
(2),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `temp_lesson`
--

CREATE TABLE `temp_lesson` (
  `temp_id` int(4) NOT NULL,
  UNIQUE KEY `temp_id` (`temp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `testimony`
--

CREATE TABLE `testimony` (
  `testimony_id` int(4) NOT NULL,
  `username` varchar(30) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` int(4) NOT NULL,
  `day` char(6) NOT NULL,
  `mk_id` int(4) NOT NULL,
  `start_lesson` time NOT NULL,
  `end_lesson` time NOT NULL,
  PRIMARY KEY (`time_id`),
  UNIQUE KEY `mk_id` (`mk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `day`, `mk_id`, `start_lesson`, `end_lesson`) VALUES
(1, 'senin', 1, '07:00:00', '08:40:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
