-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2014 at 11:42 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ash_transit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingdetails`
--

CREATE TABLE IF NOT EXISTS `bookingdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `ash_id` varchar(100) NOT NULL,
  `phone` int(12) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `t_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `bookingdetails`
--

INSERT INTO `bookingdetails` (`id`, `name`, `ash_id`, `phone`, `t_name`, `destination`, `t_date`) VALUES
(1, '', '5678', 0, 'Christ the King-Ashesi', 'Legon', '2014-11-29'),
(2, 'kunle', '99', 8099, 'CTK-Ashesi', 'Legon', '2014-12-12'),
(3, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(4, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(5, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(6, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(7, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(8, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(9, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(10, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(11, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(12, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(13, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(14, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(15, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(16, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(17, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(18, 'test', '1111', 4252, 'ctk', 'legon', '0000-00-00'),
(19, 'test', '1234', 4252, 'ctk', 'legon', '0000-00-00'),
(20, 'test', '1234', 4252, 'ctk', 'legon', '2014-12-13'),
(21, 'test', '1234', 4252, 'ctk', 'legon', '2014-12-13'),
(22, 'Anna Reimah', '1234', 541111111, 'Christ the King-Ashesi', 'mall', '2014-11-17'),
(23, 'Anna Reimah', '1234', 541111111, 'Christ the King-Ashesi', 'ctk', '2014-11-17'),
(24, 'Anna Reimah', '1234', 541111111, 'Christ the King-Ashesi', 'comet', '2014-11-17'),
(25, 'Nina Pearls', '5678', 542222222, 'Christ the King-Ashesi', 'mall', '2014-11-17'),
(26, 'Anna Reimah', '1234', 541111111, 'Christ the King-Ashesi', 'legon', '2014-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `expecteddurationafternoon`
--

CREATE TABLE IF NOT EXISTS `expecteddurationafternoon` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `transitlocation` varchar(250) NOT NULL,
  `duration` int(100) NOT NULL,
  `set_time` time NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `expecteddurationafternoon`
--

INSERT INTO `expecteddurationafternoon` (`eid`, `transitlocation`, `duration`, `set_time`) VALUES
(1, 'Ashesi-Berekuso', 5, '00:00:00'),
(2, 'Berekuso-Comet', 5, '00:00:00'),
(3, 'Comet-Abom Junction', 5, '00:00:00'),
(4, 'Abom Junction-Kwabenya', 5, '00:00:00'),
(5, 'Kwabenya-Atomic Round About', 5, '00:00:00'),
(6, 'Atomic Round About-Legon', 5, '00:00:00'),
(7, 'Legon-Accra Mall', 5, '00:00:00'),
(8, 'Accra Mall-37', 5, '00:00:00'),
(9, '37-Christ the King', 5, '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `expecteddurationmorning`
--

CREATE TABLE IF NOT EXISTS `expecteddurationmorning` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `transit_location` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  `setTime` time NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `expecteddurationmorning`
--

INSERT INTO `expecteddurationmorning` (`eid`, `transit_location`, `duration`, `setTime`) VALUES
(1, 'Christ the King-37', 5, '06:30:00'),
(2, '37-Accra Mall', 5, '06:40:00'),
(3, 'Accra Mall-Legon', 5, '06:50:00'),
(4, 'Legon-Atomic Round About', 5, '07:00:00'),
(5, 'Atomic Round About-Kwabenya', 5, '07:10:00'),
(6, 'Kwabenya-Abom Junction', 5, '07:20:00'),
(7, 'Abom Juction-Comet', 5, '07:30:00'),
(8, 'Comet-Berekuso', 5, '07:40:00'),
(9, 'Berekuso-Ashesi', 5, '07:50:00');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `lid` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`lid`, `location`) VALUES
(1, 'Christ the King'),
(2, '37'),
(3, 'Accra Mall'),
(4, 'Legon'),
(5, 'Atomic Round About'),
(8, 'Kwabenya'),
(9, 'Abom Junction'),
(10, 'Comet'),
(11, 'Berekuso'),
(12, 'Ashesi University');

-- --------------------------------------------------------

--
-- Table structure for table `tripdetails`
--

CREATE TABLE IF NOT EXISTS `tripdetails` (
  `tid` int(11) NOT NULL AUTO_INCREMENT,
  `t_name` varchar(100) NOT NULL,
  `setDepartureTime` time NOT NULL,
  `t_date` date NOT NULL,
  `busCapcity` int(11) NOT NULL,
  `adminCapacity` int(11) NOT NULL,
  `avaliableSeats` int(11) NOT NULL,
  `numPeopleReserved` int(11) NOT NULL,
  `currentlocation` varchar(250) NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tripdetails`
--

INSERT INTO `tripdetails` (`tid`, `t_name`, `setDepartureTime`, `t_date`, `busCapcity`, `adminCapacity`, `avaliableSeats`, `numPeopleReserved`, `currentlocation`) VALUES
(1, 'Christ the King-Ashesi', '11:47:44', '2014-11-17', 30, 29, 25, 4, 'University Avenue, Ghana'),
(2, 'Ashesi-Christ the King', '17:37:43', '2014-11-29', 30, 30, 5, 25, 'ashesi'),
(3, '', '01:10:20', '0000-00-00', 0, 0, 0, 0, 'ashesi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `ash_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `phone_no`, `role`, `ash_id`) VALUES
(1, 'Anna Reimah', '1111', '0541111111', 'Passenger', 1234),
(2, 'Nina Pearls', '2222', '0542222222', 'Conductor', 5678);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
