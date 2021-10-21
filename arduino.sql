-- phpMyAdmin SQL Dump
-- version 4.4.15.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 03, 2016 at 10:22 AM
-- Server version: 5.5.44-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arduino`
--

-- --------------------------------------------------------

--
-- Table structure for table `kinisi`
--

CREATE TABLE IF NOT EXISTS `kinisi` (
  `uid` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `eidos` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `xrhstes`
--

CREATE TABLE IF NOT EXISTS `xrhstes` (
  `uid` text NOT NULL,
  `name` text NOT NULL,
  `last` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xrhstes`
--

INSERT INTO `xrhstes` (`uid`, `name`, `last`) VALUES
('71A7AED5', 'Θανάσης', 'Παυλής'),
('C9B3BE92', 'Ιωάννα', 'Κοπανάρη'),
('49F235AC', 'Θοδωρής', 'Μιχαλόπουλος'),
('A9CC33AC', 'Δημήτρης', 'Σκούτας'),
('FDA3EB75', 'Νίκος', 'Αρχοντός'),
('691CEC75', 'Γεωργία', 'Παπαδοπούλου'),
('3DA2F5A5', 'Χριστίνα', 'Καπουτζάκη'),
('B979F8A5', 'Γιάννης', 'Αναστασόπουλος'),
('C097EC75', 'Αντώνης', 'Πιπερίδης'),
('6C96F4A5', 'Ελένη', 'Σουτζούκου'),
('793D1330', 'Νικολέτα', 'Σταθεροπούλου');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
