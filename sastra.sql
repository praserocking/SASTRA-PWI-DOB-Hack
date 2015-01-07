-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 29, 2013 at 02:14 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sastra`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `number` varchar(9) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `year` varchar(15) DEFAULT NULL,
  `course` varchar(40) DEFAULT NULL,
  `dob` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`number`, `name`, `year`, `course`, `dob`) VALUES
('115015123', ' Shenbaga Prasanna, S \r\n      ', ' V Semester', ' B.Tech.Information Technology \r\n       ', '1994-03-09'),
('115009154', ' Shyam, R \r\n                  ', ' V Semester', ' B.Tech.Mechanical Engineering \r\n       ', '1994-07-03'),
('115003194', ' Soma Sundaram, M \r\n          ', ' V Semester', ' B.Tech.Computer Science & Engineering \r', '1994-01-23'),
('114015103', ' Saranya, S \r\n                ', ' VII Semester', ' B.Tech.Information Technology \r\n       ', '1993-03-25'),
('114015113', ' Suganya, A \r\n                ', ' VII Semester', ' B.Tech.Information Technology \r\n       ', '1993-01-02'),
('115009063', ' Harish Pranauv, N \r\n         ', ' V Semester', ' B.Tech.Mechanical Engineering \r\n       ', '1994-02-23'),
('115015001', ' Abarna, N \r\n                 ', ' V Semester', ' B.Tech.Information Technology \r\n       ', '1993-11-09');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
