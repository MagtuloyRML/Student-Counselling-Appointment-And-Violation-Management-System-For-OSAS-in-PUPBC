-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2022 at 08:21 AM
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
('2021, 2022 ', 2021, 2022, '1st'),
('2022, 2023 ', 2022, 2023, '1st'),
('2022, 2023 - 1st', 2022, 2023, '1st'),
('2022, 2023 - 2nd', 2022, 2023, '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `forprogram`
--

CREATE TABLE `forprogram` (
  `pID` int(11) NOT NULL,
  `pCode` varchar(255) NOT NULL,
  `pDescription` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forprogram`
--

INSERT INTO `forprogram` (`pID`, `pCode`, `pDescription`) VALUES
(1, 'BSA-2', ''),
(2, 'BSA\r\n', 'Bachelor of Science in Accounting\r\n'),
(3, 'BSEDSS\r\n', 'Bachelor of Secondary Education major in Social Studies\r\n'),
(4, 'DCET\r\n', 'Diploma in Computer Engineering Technology\r\n'),
(5, 'DICT', 'Diploma in Information Technology\r\n'),
(6, 'BSEDEN\r\n', 'Bachelor of Secondary Education major in English\r\n'),
(7, 'BSITsasa', 'sasasa');

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
  `progCode` int(11) NOT NULL,
  `ayCode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forstudents`
--

INSERT INTO `forstudents` (`studNum`, `id`, `fullName`, `lastName`, `firstName`, `middleName`, `Section`, `Address`, `Gender`, `progCode`, `ayCode`, `status`) VALUES
('2018-00154-BN-0', '1', 'PACHECA sa, BRIAN JOSHUA BUENDIA', 'PACHECA sa', 'BRIAN JOSHUA', 'BUENDIA', '2', 'J.REYES STREET', 'Male', 6, '2022, 2023 - 1st', 'Enrolled'),
('2019-00001-BN-0', '2', 'bolbol as, kils uas', 'bolbol as', 'kils', 'uas', '1', 'Muntianlupa', 'Female', 2, '2018', 'Enrolled'),
('2019-00002-BN-0', '3', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 4, '2018', 'Enrolled'),
('2019-00003-BN-0', '4', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '2', 'J.REYES STREET', 'Male', 5, '2021, 2022 ', 'Enrolled'),
('2019-00004-BN-0', '5', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '2', 'J.REYES STREET', 'Male', 6, '2021, 2022 ', 'Enrolled'),
('2019-00021-BN-0', '6', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 3, '2021, 2022 ', 'Enrolled'),
('2019-00026-BN-0', '7', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 2, '2021, 2022 ', 'Enrolled'),
('2019-00502-BN-0', '8', 'PACHECA, BRIAN JOSHUA BUENDIA', 'PACHECA', 'BRIAN JOSHUA', 'BUENDIA', '1', 'J.REYES STREET', 'Male', 2, '2022, 2023 - 2nd', 'Enrolled');

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
(1, 'Cleaning'),
(2, 'Suspension');

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
(1, 'Bullying'),
(2, 'Harassment');

-- --------------------------------------------------------

--
-- Table structure for table `forviolationentries`
--

CREATE TABLE `forviolationentries` (
  `entry_id` int(11) NOT NULL,
  `studNum` varchar(255) NOT NULL,
  `fullName` varchar(250) NOT NULL,
  `pCode` int(11) NOT NULL,
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
(23, '2018-00154-BN-0', 'PACHECA, BRIAN JOSHUA BUENDIA', 6, '1', 2, 1, '2022-02-09', '2021, 2022 '),
(24, '2019-00001-BN-0', 'bolbol a, kils uas', 2, '1', 2, 2, '2022-02-25', '2019, 2020');

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
  ADD PRIMARY KEY (`pID`);

--
-- Indexes for table `forstudents`
--
ALTER TABLE `forstudents`
  ADD PRIMARY KEY (`studNum`),
  ADD KEY `pID_forpro` (`progCode`),
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
  ADD KEY `violation_forthevio` (`Violations`),
  ADD KEY `sanction_forthesanc` (`Sanctions`),
  ADD KEY `pID_forprogram` (`pCode`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forprogram`
--
ALTER TABLE `forprogram`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `forthesanctions`
--
ALTER TABLE `forthesanctions`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fortheviolations`
--
ALTER TABLE `fortheviolations`
  MODIFY `v_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `forviolationentries`
--
ALTER TABLE `forviolationentries`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
