-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2022 at 04:45 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

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

CREATE TABLE `foracademicyear` (
  `code` varchar(50) NOT NULL,
  `yearFrom` year(4) NOT NULL,
  `yearTo` year(4) NOT NULL,
  `Semester` varchar(50) NOT NULL
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

CREATE TABLE `forprogram` (
  `pCode` varchar(50) NOT NULL,
  `pDescription` text NOT NULL
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

CREATE TABLE `forstudents` (
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
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forstudents`
--

INSERT INTO `forstudents` (`studNum`, `id`, `fullName`, `lastName`, `firstName`, `middleName`, `Section`, `Address`, `Gender`, `progCode`, `ayCode`, `status`) VALUES
('2018-00154-BN-0', '1', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'DCET', '2021, 2022 ', 'Enrolled'),
('2019-00001-BN-0', '2', '', 'bolbol', 'kil', 'ua', '1', 'Muntinlupa', 'Female', 'BSA', '2019, 2020', 'Enrolled'),
('2019-00002-BN-0', '3', '', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSA', '2021, 2022 ', 'Enrolled'),
('2019-00003-BN-0', '4', '', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSA', '2019, 2020', 'Enrolled'),
('2019-00004-BN-0', '5', '', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSEDEN', '2021, 2022 ', 'Enrolled'),
('2019-00021-BN-0', '6', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSIT', '2021, 2022 ', 'Enrolled'),
('2019-00026-BN-0', '7', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 'BSEDSS', '2021, 2022 ', 'Enrolled');

-- --------------------------------------------------------

--
-- Table structure for table `forthesanctions`
--

CREATE TABLE `forthesanctions` (
  `s_id` int(11) NOT NULL,
  `Sanctions` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forthesanctions`
--

INSERT INTO `forthesanctions` (`s_id`, `Sanctions`) VALUES
(1, 'Cleaning');

-- --------------------------------------------------------

--
-- Table structure for table `fortheviolations`
--

CREATE TABLE `fortheviolations` (
  `v_code` int(11) NOT NULL,
  `Violations` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fortheviolations`
--

INSERT INTO `fortheviolations` (`v_code`, `Violations`) VALUES
(1, 'Bullying');

-- --------------------------------------------------------

--
-- Table structure for table `forviolationentries`
--

CREATE TABLE `forviolationentries` (
  `entry_id` int(11) NOT NULL,
  `studNum` varchar(255) NOT NULL,
  `fullName` text NOT NULL,
  `pCode` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Violations` int(11) NOT NULL,
  `Sanctions` int(11) NOT NULL,
  `Date` date NOT NULL,
  `code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forviolationentries`
--

INSERT INTO `forviolationentries` (`entry_id`, `studNum`, `fullName`, `pCode`, `Section`, `Violations`, `Sanctions`, `Date`, `code`) VALUES
(1, '2018-00154-BN-0', 'Full, Name', 'BSIT', '1', 1, 1, '2022-02-02', '2021, 2022 ');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studNum` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foracademicyear`
--
ALTER TABLE `foracademicyear`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `forprogram`
--
ALTER TABLE `forprogram`
  ADD PRIMARY KEY (`pCode`);

--
-- Indexes for table `forstudents`
--
ALTER TABLE `forstudents`
  ADD PRIMARY KEY (`studNum`),
  ADD KEY `prog_code_forpro` (`progCode`),
  ADD KEY `ay_code_foray` (`ayCode`);

--
-- Indexes for table `forthesanctions`
--
ALTER TABLE `forthesanctions`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `fortheviolations`
--
ALTER TABLE `fortheviolations`
  ADD PRIMARY KEY (`v_code`);

--
-- Indexes for table `forviolationentries`
--
ALTER TABLE `forviolationentries`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `studnum_forstud` (`studNum`),
  ADD KEY `ay_code_foracad` (`code`),
  ADD KEY `prog_code` (`pCode`),
  ADD KEY `violation_forthevio` (`Violations`),
  ADD KEY `sanction_forthesanc` (`Sanctions`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forthesanctions`
--
ALTER TABLE `forthesanctions`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fortheviolations`
--
ALTER TABLE `fortheviolations`
  MODIFY `v_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `forviolationentries`
--
ALTER TABLE `forviolationentries`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
