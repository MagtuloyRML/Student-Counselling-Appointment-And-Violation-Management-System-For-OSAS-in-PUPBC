-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 10, 2022 at 09:09 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foracademicyear`
--

INSERT INTO `foracademicyear` (`code`, `yearFrom`, `yearTo`, `Semester`) VALUES
('2018', 2018, 2019, '1st'),
('2019, 2020', 2019, 2020, '1st'),
('2021, 2022 ', 2021, 2022, '1st');

-- --------------------------------------------------------

--
-- Table structure for table `forprogram`
--

DROP TABLE IF EXISTS `forprogram`;
CREATE TABLE IF NOT EXISTS `forprogram` (
  `pCode` varchar(50) NOT NULL,
  `pDescription` text NOT NULL,
  PRIMARY KEY (`pCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forprogram`
--

INSERT INTO `forprogram` (`pCode`, `pDescription`) VALUES
('BSA', 'Bachelors of Science in Accounting'),
('BSEDEN', 'Bachelor of Secondary Education major in English'),
('BSEDSS', 'Bachelor of Secondary Education major in Social Studies'),
('BSIT', 'Bachelor of Science in Information Technology'),
('DCET', 'Diploma in Computer Engineering Technology'),
('DICT', 'Diploma in Information Communication Technology');

-- --------------------------------------------------------

--
-- Table structure for table `forstudents`
--

DROP TABLE IF EXISTS `forstudents`;
CREATE TABLE IF NOT EXISTS `forstudents` (
  `studNum` varchar(255) NOT NULL,
  `id` varchar(255) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `lastName` text NOT NULL,
  `firstName` text NOT NULL,
  `middleName` text NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Gender` text NOT NULL,
  `progCode` varchar(50) NOT NULL,
  `ayCode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`studNum`),
  KEY `prog_code_forpro` (`progCode`),
  KEY `ay_code_foray` (`ayCode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forstudents`
--

INSERT INTO `forstudents` (`studNum`, `id`, `fullName`, `lastName`, `firstName`, `middleName`, `Section`, `Address`, `Gender`, `progCode`, `ayCode`, `status`) VALUES
('2018-00154-BN-0', '1', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'DCET', '2021, 2022 ', 'Enrolled'),
('2019-00001-BN-0', '2', '', 'bolbol', 'kil', 'ua', '1', 'Muntinlupa', 'Female', 'BSA', '2019, 2020', 'Enrolled'),
('2019-00002-BN-0', '3', '', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSA', '2021, 2022 ', 'Enrolled'),
('2019-00003-BN-0', '4', '', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSA', '2019, 2020', 'Disabled'),
('2019-00004-BN-0', '5', '', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSEDEN', '2021, 2022 ', 'Enrolled'),
('2019-00021-BN-0', '6', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSIT', '2021, 2022 ', 'Enrolled'),
('2019-00026-BN-0', '7', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSEDSS', '2021, 2022 ', 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `forthesanctions`
--

DROP TABLE IF EXISTS `forthesanctions`;
CREATE TABLE IF NOT EXISTS `forthesanctions` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `Sanctions` varchar(500) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forthesanctions`
--

INSERT INTO `forthesanctions` (`s_id`, `Sanctions`) VALUES
(1, 'Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `fortheviolations`
--

DROP TABLE IF EXISTS `fortheviolations`;
CREATE TABLE IF NOT EXISTS `fortheviolations` (
  `v_code` int NOT NULL AUTO_INCREMENT,
  `Violations` varchar(500) NOT NULL,
  PRIMARY KEY (`v_code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fortheviolations`
--

INSERT INTO `fortheviolations` (`v_code`, `Violations`) VALUES
(1, 'Bullying');

-- --------------------------------------------------------

--
-- Table structure for table `forviolationentries`
--

DROP TABLE IF EXISTS `forviolationentries`;
CREATE TABLE IF NOT EXISTS `forviolationentries` (
  `entry_id` int NOT NULL AUTO_INCREMENT,
  `studNum` varchar(255) NOT NULL,
  `fullName` text NOT NULL,
  `pCode` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Violations` int NOT NULL,
  `Sanctions` int NOT NULL,
  `Date` date NOT NULL,
  `code` varchar(50) NOT NULL,
  PRIMARY KEY (`entry_id`),
  KEY `studnum_forstud` (`studNum`),
  KEY `ay_code_foracad` (`code`),
  KEY `prog_code` (`pCode`),
  KEY `violation_forthevio` (`Violations`),
  KEY `sanction_forthesanc` (`Sanctions`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forviolationentries`
--

INSERT INTO `forviolationentries` (`entry_id`, `studNum`, `fullName`, `pCode`, `Section`, `Violations`, `Sanctions`, `Date`, `code`) VALUES
(1, '2018-00154-BN-0', 'Full, Name', 'BSIT', '1', 1, 1, '2022-02-02', '2021, 2022 ');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `forstudents`
--
ALTER TABLE `forstudents`
  ADD CONSTRAINT `ay_code_foray` FOREIGN KEY (`ayCode`) REFERENCES `foracademicyear` (`code`),
  ADD CONSTRAINT `prog_code_forpro` FOREIGN KEY (`progCode`) REFERENCES `forprogram` (`pCode`);

--
-- Constraints for table `forviolationentries`
--
ALTER TABLE `forviolationentries`
  ADD CONSTRAINT `ay_code_foracad` FOREIGN KEY (`code`) REFERENCES `foracademicyear` (`code`),
  ADD CONSTRAINT `prog_code` FOREIGN KEY (`pCode`) REFERENCES `forprogram` (`pCode`),
  ADD CONSTRAINT `sanction_forthesanc` FOREIGN KEY (`Sanctions`) REFERENCES `forthesanctions` (`s_id`),
  ADD CONSTRAINT `studnum_forstud` FOREIGN KEY (`studNum`) REFERENCES `forstudents` (`studNum`),
  ADD CONSTRAINT `violation_forthevio` FOREIGN KEY (`Violations`) REFERENCES `fortheviolations` (`v_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
