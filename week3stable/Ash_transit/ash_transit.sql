-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2014 at 11:40 AM
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
-- Table structure for table `expectedduration`
--

CREATE TABLE IF NOT EXISTS `expectedduration` (
  `eid` int(11) NOT NULL AUTO_INCREMENT,
  `transit_location` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL,
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `expectedduration`
--

INSERT INTO `expectedduration` (`eid`, `transit_location`, `duration`) VALUES
(1, 'Christ the King-37', 5),
(2, '37-Accra Mall', 5),
(3, 'Accra Mall-Legon', 5),
(4, 'Legon-Atomic Round About', 5),
(5, 'Atomic Round About-Kwabenya', 5),
(6, 'Kwabenya-Abom Junction', 5),
(7, 'Abom Juction-Comet', 5),
(8, 'Comet-Berekuso', 5),
(9, 'Berekuso-Ashesi', 5);

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
  `name` varchar(100) NOT NULL,
  `departureTime` time NOT NULL,
  `currentTransitLocation` varchar(250) NOT NULL,
  `nextTransitLocation` varchar(250) NOT NULL,
  `lastBusStopTime` time NOT NULL,
  `nextBusStopTime` time NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tripdetails`
--

INSERT INTO `tripdetails` (`tid`, `name`, `departureTime`, `currentTransitLocation`, `nextTransitLocation`, `lastBusStopTime`, `nextBusStopTime`, `date`) VALUES
(1, 'Ashesi-Ctk', '08:00:00', 'spanner', 'atomic', '08:30:00', '08:50:00', '2014-11-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `ash_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`ash_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ash_id`, `name`, `password`, `phone_no`, `role`) VALUES
(1, 'Anna Reimah', '1111', '0541111111', 'Passenger'),
(2, 'Nina Pearls', '2222', '0542222222', 'Conductor');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
