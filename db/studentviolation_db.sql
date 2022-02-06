-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2022 at 12:54 PM
-- Server version: 8.0.21
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentviolation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `foracademicyear`
--

DROP TABLE IF EXISTS `foracademicyear`;
CREATE TABLE IF NOT EXISTS `foracademicyear` (
  `ayCode` varchar(50) NOT NULL,
  `yearFrom` year NOT NULL,
  `yearTo` year NOT NULL,
  `Semester` varchar(50) NOT NULL,
  PRIMARY KEY (`ayCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foracademicyear`
--

INSERT INTO `foracademicyear` (`ayCode`, `yearFrom`, `yearTo`, `Semester`) VALUES
('2018 - 2019 ', 2018, 2019, '1st'),
('2019, 2020 ', 2019, 2020, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `foraycode`
--

DROP TABLE IF EXISTS `foraycode`;
CREATE TABLE IF NOT EXISTS `foraycode` (
  `ID` varchar(50) NOT NULL,
  `Status` varchar(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forprogram`
--

DROP TABLE IF EXISTS `forprogram`;
CREATE TABLE IF NOT EXISTS `forprogram` (
  `pID` int NOT NULL AUTO_INCREMENT,
  `progCode` varchar(50) NOT NULL,
  `progDescription` text NOT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forprogram`
--

INSERT INTO `forprogram` (`pID`, `progCode`, `progDescription`) VALUES
(9, 'BSIT', 'Bachelor of Science in Information Technology '),
(3, 'BSA', 'Bachelors of Science in Accounting'),
(5, 'DICT', 'Diploma in Information Communication Technology'),
(6, 'DCET', 'Diploma in Computer Engineering Technology'),
(7, 'BSEDEN', 'Bachelor of Secondary Education major in English'),
(8, 'BSEDSS', 'Bachelor of Secondary Education major in Social Studies');

-- --------------------------------------------------------

--
-- Table structure for table `forstudents`
--

DROP TABLE IF EXISTS `forstudents`;
CREATE TABLE IF NOT EXISTS `forstudents` (
  `studNum` varchar(50) NOT NULL,
  `lastName` text NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Gender` text NOT NULL,
  `progCode` varchar(50) NOT NULL,
  PRIMARY KEY (`studNum`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forstudents`
--

INSERT INTO `forstudents` (`studNum`, `lastName`, `firstName`, `middleName`, `Section`, `Address`, `Gender`, `progCode`) VALUES
('2018-155-BN-0', 'bol', 'Jan', 'dem', '3', 'dito', 'Male', 'BSL'),
('2018-156-BN-0', 'kill', 'lia', 'zol', '7', 'dito', 'Male', 'BSIT'),
('2018-154-BN-0', 'baljan', 'PJ', 'yeah', '2', 'Mount Apo', 'Female', 'BSC'),
('2018-150-BN-0', 'Lizano', 'Paulo', 'John', '1', 'San Antonio South', 'Male', 'BSIT'),
('2018-153-BN-0', 'pacheca', 'brian', 'deym', '4', 'munti', 'Male', 'BSIT'),
('2018-152-BN-0', 'guieb', 'andrei', 'lod', '3', 'Mount Apo', 'Male', 'BSL'),
('2018-158-BN-0', 'Magtuloy', 'Ermil', 'Bro', '8', 'Jail', 'Male', 'BSIT'),
('2018-159-BN-0', 'Lizano', 'Rozell', 'Mayrena', '10', 'bahay', 'Female', 'BSC'),
('2018-00000-BN-0', 'Sample', 'Sample Change', 'Sample', '1', 'Sample with Barangay City Municipality and Country ', 'Male', 'BSIT');

-- --------------------------------------------------------

--
-- Table structure for table `forthesanctions`
--

DROP TABLE IF EXISTS `forthesanctions`;
CREATE TABLE IF NOT EXISTS `forthesanctions` (
  `Sanctions` varchar(500) NOT NULL,
  PRIMARY KEY (`Sanctions`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forthesanctions`
--

INSERT INTO `forthesanctions` (`Sanctions`) VALUES
('Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `fortheviolations`
--

DROP TABLE IF EXISTS `fortheviolations`;
CREATE TABLE IF NOT EXISTS `fortheviolations` (
  `Violations` text NOT NULL,
  PRIMARY KEY (`Violations`(150))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fortheviolations`
--

INSERT INTO `fortheviolations` (`Violations`) VALUES
('Bullying');

-- --------------------------------------------------------

--
-- Table structure for table `forviolationentries`
--

DROP TABLE IF EXISTS `forviolationentries`;
CREATE TABLE IF NOT EXISTS `forviolationentries` (
  `studNum` int NOT NULL,
  `firstName` text NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Violations` text NOT NULL,
  `Sanctions` text NOT NULL,
  `Date` date NOT NULL,
  `ayCode` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
