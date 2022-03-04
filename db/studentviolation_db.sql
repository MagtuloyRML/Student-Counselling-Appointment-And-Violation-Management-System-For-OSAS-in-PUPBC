-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 04, 2022 at 04:28 AM
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
  `code` varchar(50) NOT NULL,
  `yearFrom` year NOT NULL,
  `yearTo` year NOT NULL,
  `Semester` varchar(50) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foracademicyear`
--

INSERT INTO `foracademicyear` (`code`, `yearFrom`, `yearTo`, `Semester`) VALUES
('2014 - 2015, 2nd', 2014, 2015, '2nd'),
('2014 - 2015, 1st', 2014, 2015, '1st'),
('2013 - 2014, 2nd', 2013, 2014, '2nd'),
('2013 - 2014, 1st', 2013, 2014, '1st'),
('2012 - 2013 , 2nd', 2012, 2013, '2nd'),
('2012 - 2013, 1st', 2012, 2013, '1st'),
('2011 - 2012, 2nd', 2011, 2012, '2nd'),
('2011  - 2012, 1st', 2011, 2012, '1st'),
('2010 - 2011, 2nd', 2010, 2011, '2nd'),
('2010 - 2011, 1st', 2010, 2011, '1st'),
('2015 - 2016, 1st', 2015, 2016, '1st'),
('2015 - 2016, 2nd', 2015, 2016, '2nd'),
('2016 - 2017, 1st', 2016, 2017, '1st'),
('2016 - 2017, 2nd', 2016, 2017, '2nd'),
('2017 - 2018, 1st', 2017, 2018, '1st'),
('2018 - 2019, 1st', 2018, 2019, '1st'),
('2017 - 2018, 2nd', 2017, 2018, '2nd'),
('2018 - 2019, 2nd', 2018, 2019, '2nd'),
('2019 - 2020, 1st', 2019, 2020, '1st'),
('2019 - 2020, 2nd', 2019, 2020, '2nd'),
('2020 - 2021, 1st', 2020, 2021, '1st'),
('2020 - 2021, 2nd', 2020, 2021, '2nd'),
('2021 - 2022, 1st', 2021, 2022, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `forprogram`
--

DROP TABLE IF EXISTS `forprogram`;
CREATE TABLE IF NOT EXISTS `forprogram` (
  `pID` int NOT NULL AUTO_INCREMENT,
  `pCode` varchar(255) NOT NULL,
  `pDescription` varchar(255) NOT NULL,
  PRIMARY KEY (`pID`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forprogram`
--

INSERT INTO `forprogram` (`pID`, `pCode`, `pDescription`) VALUES
(25, 'BSESS', 'Bachelor of Secondary Education major in Major Studies'),
(24, 'BSEE', 'Bachelor of Secondary Education major in English'),
(23, 'BSBA-HRDM', 'Bachelor of Science in Business Administration major in Human Resource Management Development'),
(22, 'BSIE', 'Bachelor of Science in Industrial EngineeringÂ '),
(20, 'BSIT', 'Bachelor of Science in Information Technology'),
(18, 'BEE', 'Bachelor of Elementary Education'),
(19, 'BSA', 'Bachelor of Science in Accountancy'),
(21, 'BSCoE', 'Bachelor of Science in Computer Engineering'),
(26, 'DCET', 'Diploma in Computer Engineering Technology'),
(27, 'DICT', 'Diploma in Information Communication Technology');

-- --------------------------------------------------------

--
-- Table structure for table `forstudents`
--

DROP TABLE IF EXISTS `forstudents`;
CREATE TABLE IF NOT EXISTS `forstudents` (
  `studNum` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `fullName` varchar(250) DEFAULT NULL,
  `lastName` text NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Gender` text NOT NULL,
  `progCode` int NOT NULL,
  `ayCode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`studNum`),
  KEY `pID_forpro` (`progCode`),
  KEY `ay_code_foray` (`ayCode`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forstudents`
--

INSERT INTO `forstudents` (`studNum`, `id`, `fullName`, `lastName`, `firstName`, `middleName`, `Section`, `Address`, `Gender`, `progCode`, `ayCode`, `status`) VALUES
('2018-00123-BN-0', 41, 'Satsatin, John Dexter', 'Satsatin', 'John', 'Dexter', '1', 'Binan, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00420-BN-0', 40, 'Fernandez, Charmaigne  None', 'Fernandez', 'Charmaigne ', 'None', '1', 'Binan, Laguna', 'Female', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00009-BN-0', 39, 'Amatorio, Rodelio None', 'Amatorio', 'Rodelio', 'None', '2', 'Binan, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00111-BN-0', 37, 'Perez, Cartney None', 'Perez', 'Cartney', 'None', '1', 'Binan, Laguna', 'Female', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00026-BN-0', 38, 'Magsombol, Antonitte  None', 'Magsombol', 'Antonitte ', 'None', '1', 'Sta. Rosa, Laguna', 'Female', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00155-BN-0', 35, 'Caguicla, John  Lawrence', 'Caguicla', 'John ', 'Lawrence', '1', 'Sta. Rosa, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00456-BN-0', 36, 'Macayan, Armel None', 'Macayan', 'Armel', 'None', '1', 'San Pedro, Laguna', 'Male', 27, '2019 - 2020, 2nd', 'Enrolled'),
('2018-00149-BN-0', 30, 'Almazan, Mark Marvin None', 'Almazan', 'Mark Marvin', 'None', '1', 'Sta. Rosa, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00134-BN-0', 31, 'Casbadillo, Ralph Matthew  None', 'Casbadillo', 'Ralph Matthew ', 'None', '1', 'Binan, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-01322-BN-0', 32, 'Alingasa , Sean Erik', 'Alingasa ', 'Sean', 'Erik', '1', 'Manila', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2019-00514-BN-0', 33, 'Catalan, Therrence None', 'Catalan', 'Therrence', 'None', '1', 'Binan, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00322-BN-0', 34, 'Llobrera, John  Christopher', 'Llobrera', 'John ', 'Christopher', '1', 'San Pedro, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00150-BN-0', 29, 'Lizano , John Paulo None', 'Lizano ', 'John Paulo', 'None', '1', 'Binan, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00412-BN-0', 28, 'Guieb, Andrei Raphael Mendiola', 'Guieb', 'Andrei Raphael', 'Mendiola', '1', 'San Pedro, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00154-BN-0', 26, 'Pacheca, Brian Joshua Buendia ', 'Pacheca', 'Brian Joshua', 'Buendia ', '1', 'Muntinlupa City', 'Male', 20, '2021 - 2022, 1st', 'Enrolled'),
('2018-00079-BN-0', 27, 'Magtuloy, Ermil None', 'Magtuloy', 'Ermil', 'None', '1', 'Binan, Laguna', 'Male', 20, '2021 - 2022, 1st', 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `forthesanctions`
--

DROP TABLE IF EXISTS `forthesanctions`;
CREATE TABLE IF NOT EXISTS `forthesanctions` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `Sanctions` varchar(500) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forthesanctions`
--

INSERT INTO `forthesanctions` (`s_id`, `Sanctions`) VALUES
(35, 'Letter of advice from GCTSO and Contact Parents / Guardian'),
(28, '3 day suspension'),
(29, 'Submit Student information to the GCTSO'),
(36, 'Refer to the Student Disciplinary Board'),
(23, 'Secure a Students Entry Slip'),
(27, '2 day suspension'),
(26, '1 day suspension'),
(25, 'Warning Slip and Contact Parents / Guardian'),
(31, '6 hours community service'),
(32, 'Warning'),
(33, '16 hour student assistant service for 7 school days'),
(34, 'Notarization of Affidavit of Loss');

-- --------------------------------------------------------

--
-- Table structure for table `fortheviolations`
--

DROP TABLE IF EXISTS `fortheviolations`;
CREATE TABLE IF NOT EXISTS `fortheviolations` (
  `v_code` int NOT NULL AUTO_INCREMENT,
  `Violations` varchar(500) NOT NULL,
  PRIMARY KEY (`v_code`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fortheviolations`
--

INSERT INTO `fortheviolations` (`v_code`, `Violations`) VALUES
(4, 'No ID'),
(5, 'Not Wearing ID Inside the Campus'),
(6, 'Loss of ID'),
(7, 'Loss of Registration Card'),
(8, 'Loss of Library ID'),
(9, 'Using non-validated ID'),
(10, 'Using fake ID'),
(12, 'Using other students ID'),
(13, 'Lending an ID');

-- --------------------------------------------------------

--
-- Table structure for table `forviolationentries`
--

DROP TABLE IF EXISTS `forviolationentries`;
CREATE TABLE IF NOT EXISTS `forviolationentries` (
  `entry_id` int NOT NULL AUTO_INCREMENT,
  `studNum` varchar(255) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `pCode` int NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Violations` int NOT NULL,
  `Sanctions` int NOT NULL,
  `Date` date NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `studnum_forstud` (`studNum`),
  KEY `ay_code_foracad` (`code`),
  KEY `violation_forthevio` (`Violations`),
  KEY `sanction_forthesanc` (`Sanctions`),
  KEY `pID_forprogram` (`pCode`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `studNum` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
