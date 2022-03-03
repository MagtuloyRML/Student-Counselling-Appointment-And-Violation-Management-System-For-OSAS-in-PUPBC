-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2022 at 09:42 AM
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
(' - , ', 0000, 0000, ''),
('2002 - 2003, 2nd', 2002, 2003, '2nd'),
('2018', 2018, 2019, '1st'),
('2019, 2020', 2019, 2020, '1st'),
('2020 - 2021, 1st', 2020, 2021, '1st'),
('2020 - 2026, 1st', 2020, 2026, '1st'),
('2021 - 2022, 2nd', 2021, 2022, '2nd'),
('2021, 2022 ', 2021, 2022, '1st'),
('2022, 2023 ', 2022, 2023, '1st'),
('2022, 2023 - 1st', 2022, 2023, '1st'),
('2022, 2023 - 2nd', 2022, 2023, '2nd'),
('2023 - 2024, 1st', 2023, 2024, '1st');

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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forprogram`
--

INSERT INTO `forprogram` (`pID`, `pCode`, `pDescription`) VALUES
(1, 'BSA-1', 'asdasdasda'),
(2, 'BSA\r\n', 'Bachelor of Science in Accounting\r\n'),
(3, 'BSEDSS\r\n', 'Bachelor of Secondary Education major in Social Studies\r\n'),
(4, 'DCET\r\n', 'Diploma in Computer Engineering Technology\r\n'),
(5, 'DICT', 'Diploma in Information Technology\r\n'),
(6, 'BSEDEN\r\n', 'Bachelor of Secondary Education major in English\r\n'),
(7, 'BSIT', 'sasasa'),
(8, 'adasdasda', 'dasdasdasda'),
(9, 'BSEDEN', 'Bachelor of Secondary Education major in English'),
(10, 'BSEDSS', 'Bachelor of Secondary Education major in Social Studies'),
(11, 'BSBSBSBS', 'adasdasdasdasdasda'),
(12, 'asdasdasd', 'dasdasdasa');

-- --------------------------------------------------------

--
-- Table structure for table `forstudents`
--

DROP TABLE IF EXISTS `forstudents`;
CREATE TABLE IF NOT EXISTS `forstudents` (
  `studNum` varchar(255) NOT NULL,
  `id` int NOT NULL,
  `fullName` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forstudents`
--

INSERT INTO `forstudents` (`studNum`, `id`, `fullName`, `lastName`, `firstName`, `middleName`, `Section`, `Address`, `Gender`, `progCode`, `ayCode`, `status`) VALUES
('2018-00069-BN-0', 23, 'Sample, Sample Change Samplezczxcz', 'Sample', 'Sample Change', 'Samplezczxcz', '1', 'Sample with Barangay City Municipality and Country ', 'Male', 7, '2022, 2023 - 2nd', 'Enrolled'),
('2018-00154-BN-0', 1, 'PACHECa, BRIAN JOSHUA BUENDIA', 'PACHECa', 'BRIAN JOSHUA', 'BUENDIA', '2', 'J.REYES STREET', 'Male', 3, '2022, 2023 - 1st', 'Deleted'),
('2018-00572-BN-3', 26, 'Samplekjkkuku, Sample Change qeqqweqw', 'Samplekjkkuku', 'Sample Change', 'qeqqweqw', '1', 'Sample with Barangay City Municipality and Country ', 'Male', 7, '2022, 2023 - 2nd', 'Enrolled'),
('2018-03371-BN-2', 25, 'Samplesfsfd, Sample Chazxczxczxnge Samplejkjkhj', 'Samplesfsfd', 'Sample Chazxczxczxnge', 'Samplejkjkhj', '1', 'Sample with Barangay City Municipality and Country ', 'Male', 7, '2022, 2023 - 2nd', 'Enrolled'),
('2018-11170-BN-0', 24, 'Samplesfsdf, Sadasdasda Sampleadad', 'Samplesfsdf', 'Sadasdasda', 'Sampleadad', '1', 'Sample with Barangay City Municipality and Country ', 'Male', 7, '2022, 2023 - 2nd', 'Enrolled'),
('2019-00001-BN-0', 2, 'bolbol as, kils uas', 'bolbol as', 'kils', 'uas', '1', 'Muntianlupa', 'Female', 2, '2022, 2023 - 1st', 'Enrolled'),
('2019-00002-BN-0', 3, 'CA, BRIAN JOSHUA BUENDIA', 'CA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 4, '2022, 2023 - 1st', 'Enrolled'),
('2019-00003-BN-0', 4, 'ECA, BRIAN JOSHUA BUENDIA', 'ECA', 'BRIAN JOSHUA', 'BUENDIA', '2', 'J.REYES STREET', 'Male', 5, '2021, 2022 ', 'Enrolled'),
('2019-00004-BN-0', 5, 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '3', 'J.REYES STREET', 'Male', 2, '2021, 2022 ', 'Enrolled'),
('2019-00021-BN-0', 18, 'Samplekjkkuku, Sample Change qeqqweqw', '17', 'Samplesfsfd, Sample Chazxczxczxnge Samplejkjkhj', '16', 'Samplesfsdf, Sadasdasda Sampleadad', '15', 'Sample, Sample Change Samplezczxcz', 7, 'Samplekjkkuku, Sample Change qeqqweqw', 'Enrolled'),
('2019-00026-BN-0', 4, 'Samplekjkkuku, Sample Change qeqqweqw', '8', 'Samplekjkkuku, Sample Change qeqqweqw', '7', 'PACHECA, BRIAN JOSHUA ', 'PACHECA', 'BRIAN JOSHUA', 7, '1', 'Enrolled'),
('2019-00060-BN-0', 2, 'Samplesfsdf, Sadasdasda Sampleadad', '10', 'Dela Cruz, Juan None', 'Dela Cruz', 'Juan', 'None', '1', 7, 'Male', 'Enrolled'),
('2019-00070-BN-0', 1, 'Sample, Sample Change Samplezczxcz', '11', 'Dela Cruz, Juanito None', 'Dela Cruz', 'Juanito', 'None', '1', 7, 'Male', 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `forthesanctions`
--

DROP TABLE IF EXISTS `forthesanctions`;
CREATE TABLE IF NOT EXISTS `forthesanctions` (
  `s_id` int NOT NULL AUTO_INCREMENT,
  `Sanctions` varchar(500) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forthesanctions`
--

INSERT INTO `forthesanctions` (`s_id`, `Sanctions`) VALUES
(1, 'Cleaning'),
(2, 'Suspension'),
(4, 'Cleaning 3 days'),
(5, 'Kickout');

-- --------------------------------------------------------

--
-- Table structure for table `fortheviolations`
--

DROP TABLE IF EXISTS `fortheviolations`;
CREATE TABLE IF NOT EXISTS `fortheviolations` (
  `v_code` int NOT NULL AUTO_INCREMENT,
  `Violations` varchar(500) NOT NULL,
  PRIMARY KEY (`v_code`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fortheviolations`
--

INSERT INTO `fortheviolations` (`v_code`, `Violations`) VALUES
(1, 'Bullying'),
(2, 'Harassment'),
(7, 'Cheating'),
(14, 'Cutting');

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forviolationentries`
--

INSERT INTO `forviolationentries` (`entry_id`, `studNum`, `fullName`, `pCode`, `Section`, `Violations`, `Sanctions`, `Date`, `code`) VALUES
(1, '2018-00154-BN-0', 'Full, Name', 1, '1', 1, 1, '2022-02-02', '2021, 2022 '),
(2, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 2, '1', 1, 1, '2022-02-14', '2021, 2022 '),
(3, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 3, '1', 1, 1, '2022-02-14', '2021, 2022 '),
(4, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 4, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(5, '2019-00021-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 5, '1', 1, 1, '2022-02-07', '2021, 2022 '),
(6, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 6, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(7, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 3, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(8, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 2, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(9, '2019-00002-BN-0', '', 1, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(10, '2019-00002-BN-0', '', 1, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(11, '2019-00001-BN-0', '', 1, '1', 1, 1, '2022-02-08', '2019, 2020'),
(12, '2019-00001-BN-0', '', 1, '1', 1, 1, '2022-02-08', '2019, 2020'),
(13, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 2, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(14, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 3, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(15, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 4, '1', 1, 1, '2022-02-08', '2021, 2022 '),
(16, '2019-00002-BN-0', '', 5, '1', 1, 1, '2022-02-12', '2021, 2022 '),
(17, '2019-00003-BN-0', '', 3, '1', 1, 2, '2022-02-14', '2019, 2020'),
(18, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 6, '1', 1, 1, '2022-02-15', '2021, 2022 '),
(19, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 6, '1', 2, 1, '2022-02-16', '2021, 2022 '),
(20, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 6, '1', 1, 2, '2022-02-14', '2021, 2022 '),
(21, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 6, '1', 2, 2, '2022-02-21', '2021, 2022 '),
(22, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 6, '1', 1, 1, '2022-02-18', '2021, 2022 '),
(23, '2018-00154-BN-0', 'PACHECA sa, BRIAN JOSHUA BUENDIA', 6, '2', 2, 2, '2022-02-09', '2022, 2023 - 1st'),
(24, '2019-00001-BN-0', 'bolbol as, kils uas', 2, '1', 2, 2, '2022-02-25', '2018'),
(25, '2018-00154-BN-0', 'PACHECA sa, BRIAN JOSHUA BUENDIA', 6, '2', 1, 2, '2022-02-28', '2022, 2023 - 1st'),
(26, '2018-00154-BN-0', 'PACHECA sa, BRIAN JOSHUA BUENDIA', 6, '2', 1, 1, '2022-02-24', '2022, 2023 - 1st'),
(27, '2018-00154-BN-0', 'PACHECa, BRIAN JOSHUA BUENDIA', 3, '2', 1, 4, '2022-02-24', '2022, 2023 - 1st'),
(28, '2018-00154-BN-0', 'PACHECa, BRIAN JOSHUA BUENDIA', 3, '2', 1, 2, '2022-02-28', '2022, 2023 - 1st'),
(29, '2018-00154-BN-0', 'PACHECa, BRIAN JOSHUA BUENDIA', 3, '2', 7, 1, '2022-03-01', '2022, 2023 - 1st'),
(30, '2018-00154-BN-0', 'PACHECa, BRIAN JOSHUA BUENDIA', 3, '2', 2, 4, '2022-03-02', '2022, 2023 - 1st');

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
  ADD CONSTRAINT `pID_forpro` FOREIGN KEY (`progCode`) REFERENCES `forprogram` (`pID`);

--
-- Constraints for table `forviolationentries`
--
ALTER TABLE `forviolationentries`
  ADD CONSTRAINT `ay_code_foracad` FOREIGN KEY (`code`) REFERENCES `foracademicyear` (`code`),
  ADD CONSTRAINT `pID_forprogram` FOREIGN KEY (`pCode`) REFERENCES `forprogram` (`pID`),
  ADD CONSTRAINT `sanction_forthesanc` FOREIGN KEY (`Sanctions`) REFERENCES `forthesanctions` (`s_id`),
  ADD CONSTRAINT `studnum_forstud` FOREIGN KEY (`studNum`) REFERENCES `forstudents` (`studNum`),
  ADD CONSTRAINT `violation_forthevio` FOREIGN KEY (`Violations`) REFERENCES `fortheviolations` (`v_code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
