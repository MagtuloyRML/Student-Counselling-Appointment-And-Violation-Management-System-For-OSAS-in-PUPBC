-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 06, 2022 at 03:56 AM
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
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminaccountinfo`
--

DROP TABLE IF EXISTS `adminaccountinfo`;
CREATE TABLE IF NOT EXISTS `adminaccountinfo` (
  `AdminAccountID` int NOT NULL AUTO_INCREMENT,
  `AdminFirstName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminMiddleName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `AdminLastName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminSufifx` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `RoleID` int NOT NULL,
  `AdminContactNo` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminUsername` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminPassword` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminEmailAdd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AdminAddress` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`AdminAccountID`),
  KEY `admin_user_role` (`RoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminaccountinfo`
--

INSERT INTO `adminaccountinfo` (`AdminAccountID`, `AdminFirstName`, `AdminMiddleName`, `AdminLastName`, `AdminSufifx`, `RoleID`, `AdminContactNo`, `AdminUsername`, `AdminPassword`, `AdminEmailAdd`, `AdminAddress`) VALUES
(1, 'Sample', 'Sample', 'Sample', '', 2, 'Sample', 'Sample', 'paramore123', 'Sample', 'Sample Addres');

-- --------------------------------------------------------

--
-- Table structure for table `clientaccountinfo`
--

DROP TABLE IF EXISTS `clientaccountinfo`;
CREATE TABLE IF NOT EXISTS `clientaccountinfo` (
  `ClientAccountID` int NOT NULL AUTO_INCREMENT,
  `ClientFirstName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientMiddleName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ClientLastName` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientSuffix` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `ClientStudentNo` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `RoleID` int NOT NULL,
  `ClientBDay` date NOT NULL,
  `ClientAddress` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientContactNo` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientGuardian` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientGuardianNo` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientEmailAdd` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientPassword` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ClientGenderID` int NOT NULL,
  PRIMARY KEY (`ClientAccountID`),
  KEY `gender_role` (`ClientGenderID`),
  KEY `user_role` (`RoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientaccountinfo`
--

INSERT INTO `clientaccountinfo` (`ClientAccountID`, `ClientFirstName`, `ClientMiddleName`, `ClientLastName`, `ClientSuffix`, `ClientStudentNo`, `RoleID`, `ClientBDay`, `ClientAddress`, `ClientContactNo`, `ClientGuardian`, `ClientGuardianNo`, `ClientEmailAdd`, `ClientPassword`, `ClientGenderID`) VALUES
(1, 'Sample', 'Sample', 'Sample', '', 'Sample', 1, '1999-01-01', 'Sample address', 'sample', 'sample', 'sample', 'sample', 'sample', 1),
(2, 'Sample1', 'Sample1', 'Sample1', '', 'sample1', 1, '2022-01-20', 'Sample address1', 'sample1', 'sample1', 'sample1', 'ermilmagtuloy', 'paramore', 1),
(32, 'Deigo', '', 'Malsamal', '', '2018-00003-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Berta', '09090909090', 'dMamal@gmail.com', 'paramore123', 1),
(34, 'Ernesto', '', 'Ramos', '', '2019-00001-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'mema@gamil.com', 'paramore222', 1),
(35, 'Remy', '', 'Daldalso', '', '2019-00111-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'remd@gmail.com', 'paramore123', 2),
(36, 'Sinangdomeng', '', 'Bigas', '', '2017-00154-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'bgas@gmail.com', 'paramore123', 1),
(37, 'Juana', 'Sample', 'De la Cruz', '', '2018-00008-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Berta', '09090909090', 'juana@gmail.com', 'paramore123', 2),
(38, 'Juanita', '', 'Valdez', '', '2016-00154-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'juanita@gmail.com', 'paramore123', 1),
(39, 'Joselito', '', 'Mercado', '', '2020-00001-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'jm@gmail.com', 'paramore123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genderrole`
--

DROP TABLE IF EXISTS `genderrole`;
CREATE TABLE IF NOT EXISTS `genderrole` (
  `GenderID` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`GenderID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genderrole`
--

INSERT INTO `genderrole` (`GenderID`, `Description`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `start_app` datetime NOT NULL,
  `end_app` datetime NOT NULL,
  `stat` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `email_add`, `start_app`, `end_app`, `stat`, `remarks`) VALUES
(1, 'Meet with Me', '', '2021-11-27 08:00:00', '2021-11-27 09:00:00', '', ''),
(2, '', '', '2021-12-01 23:00:00', '2021-12-01 23:30:00', '', ''),
(3, 'Meeting with Bri', '', '2021-12-02 12:00:00', '2021-12-02 13:00:00', '', ''),
(4, 'Meeting with Bri Again', '', '2021-12-05 22:00:00', '2021-12-05 23:00:00', 'Confirmed', ''),
(5, 'Meeting with Bri Again 2', '', '2021-12-06 08:00:00', '2021-12-06 09:00:00', 'Confirmed', ''),
(6, 'Meet', '', '2021-12-06 10:30:00', '2021-12-06 11:30:00', 'Cancelled', ''),
(7, 'Bri', 'brianpacheca123@gmail.com', '2021-12-06 02:00:00', '2021-12-06 03:00:00', 'Confirmed', ''),
(8, 'Josh', 'brianpacheca123@gmail.com', '2021-12-06 04:00:00', '2021-12-06 05:00:00', 'Confirmed', ''),
(9, 'Josh', 'brianpacheca123@gmail.com', '2021-12-06 04:00:00', '2021-12-06 05:00:00', 'Cancelled', ''),
(10, 'Josh', 'brianpacheca123@gmail.com', '2021-12-06 04:00:00', '2021-12-06 05:00:00', 'Cancelled', ''),
(11, 'Josh', 'brianpacheca123@gmail.com', '2021-12-06 04:00:00', '2021-12-06 05:00:00', 'Cancelled', ''),
(12, 'Paulo', 'brianpacheca123@gmail.com', '2021-12-07 22:07:00', '2021-12-07 23:07:00', 'Confirmed', ''),
(13, 'Marvin', 'brianpacheca123@gmail.com', '2021-12-07 22:09:00', '2021-12-07 22:09:00', 'Cancelled', ''),
(14, '', '', '2021-12-09 20:56:00', '2021-12-09 21:56:00', 'Confirmed', ' '),
(15, 'Ermil', '', '2021-12-10 17:00:00', '2021-12-10 18:00:00', 'Cancelled', ' '),
(16, 'Ermil', 'dalmerer09@gmail.com', '2021-12-09 17:42:00', '2021-12-09 18:42:00', 'Confirmed', ' '),
(17, 'Ermil', 'dalmerer09@gmail.com', '2021-12-10 20:28:00', '2021-12-10 21:28:00', 'Confirmed', ' '),
(18, 'jghfhjtgfhgf', 'dalmerer09@gmail.com', '2022-02-11 14:44:00', '0000-00-00 00:00:00', 'Pending', ' '),
(19, '', '', '2022-02-11 14:00:00', '2022-02-11 16:00:00', 'Pending', ' ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

DROP TABLE IF EXISTS `tbl_admins`;
CREATE TABLE IF NOT EXISTS `tbl_admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
CREATE TABLE IF NOT EXISTS `tbl_clients` (
  `stud_id` int NOT NULL AUTO_INCREMENT,
  `stud_num` varchar(255) NOT NULL,
  `stud_pass` varchar(255) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_contact` varchar(255) NOT NULL,
  `stud_guardian` varchar(255) NOT NULL,
  `guardian_contact` varchar(255) NOT NULL,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`stud_id`, `stud_num`, `stud_pass`, `stud_name`, `stud_email`, `stud_contact`, `stud_guardian`, `guardian_contact`) VALUES
(1, 'sample', 'paramore', 'ermil', 'ermil', '09090909', 'quardian', '09090909');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

DROP TABLE IF EXISTS `userrole`;
CREATE TABLE IF NOT EXISTS `userrole` (
  `RoleID` int NOT NULL AUTO_INCREMENT,
  `Description` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ForPage` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`RoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`RoleID`, `Description`, `ForPage`) VALUES
(1, 'Student', 'Client'),
(2, 'Administrator', 'Administrator');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adminaccountinfo`
--
ALTER TABLE `adminaccountinfo`
  ADD CONSTRAINT `admin_user_role` FOREIGN KEY (`RoleID`) REFERENCES `userrole` (`RoleID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `clientaccountinfo`
--
ALTER TABLE `clientaccountinfo`
  ADD CONSTRAINT `gender_role` FOREIGN KEY (`ClientGenderID`) REFERENCES `genderrole` (`GenderID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_role` FOREIGN KEY (`RoleID`) REFERENCES `userrole` (`RoleID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
