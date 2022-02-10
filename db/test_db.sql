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
  `AdminContactNo` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
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
(1, 'Joseph', 'Blakis', 'kolorpul', '', 2, '09010102030', 'Sample', 'memapig009', 'Sample@gmail.com', 'Sample Addres');

-- --------------------------------------------------------

--
-- Table structure for table `adminprofilepictureinfo`
--

DROP TABLE IF EXISTS `adminprofilepictureinfo`;
CREATE TABLE IF NOT EXISTS `adminprofilepictureinfo` (
  `AdminProfilePictureID` int NOT NULL AUTO_INCREMENT,
  `AdminAccountID` int NOT NULL,
  `PictureFilename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UploadDate` datetime NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`AdminProfilePictureID`),
  KEY `appInfo_Admin` (`AdminAccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminprofilepictureinfo`
--

INSERT INTO `adminprofilepictureinfo` (`AdminProfilePictureID`, `AdminAccountID`, `PictureFilename`, `UploadDate`, `UsedStatus`) VALUES
(1, 1, 'default_user.jpg', '2022-02-07 06:05:52', 0),
(2, 1, 'pbcscvs1202202091644412996.jpg', '2022-02-09 13:23:16', 0),
(3, 1, 'pbcscvs1202202091644413268.jpg', '2022-02-09 13:27:48', 0),
(4, 1, 'pbcscvs1202202101644452348.jpg', '2022-02-10 00:19:08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `avail_sched`
--

DROP TABLE IF EXISTS `avail_sched`;
CREATE TABLE IF NOT EXISTS `avail_sched` (
  `meta_field` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `avail_sched`
--

INSERT INTO `avail_sched` (`meta_field`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
('first', '2022-02-06', '2022-02-17', '07:00:00', '18:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientaccountinfo`
--

INSERT INTO `clientaccountinfo` (`ClientAccountID`, `ClientFirstName`, `ClientMiddleName`, `ClientLastName`, `ClientSuffix`, `ClientStudentNo`, `RoleID`, `ClientBDay`, `ClientAddress`, `ClientContactNo`, `ClientGuardian`, `ClientGuardianNo`, `ClientEmailAdd`, `ClientPassword`, `ClientGenderID`) VALUES
(34, 'Ernesto', '', 'Ramos', '', '2019-00001-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'mema@gamil.com', 'paramore222', 1),
(45, 'Juan', 'Mendez', 'De la Cruz', '', '2010-00001-BN-0', 1, '2000-01-08', 'Sample address Binan, Laguna', '09090909090', 'Sample Guardian', '09080706050', 'juan@gmail.com', 'mema1234', 1),
(46, 'Josefine', 'Donato', 'Cortez', 'Jr.', '2014-00005-BN-0', 1, '1999-02-13', 'Sample address Binan, Laguna', '09080706050', 'Ermaculit Cortez', '09080706050', 'jc@gmail.com', 'memapig009', 2);

-- --------------------------------------------------------

--
-- Table structure for table `clientprofilepictureinfo`
--

DROP TABLE IF EXISTS `clientprofilepictureinfo`;
CREATE TABLE IF NOT EXISTS `clientprofilepictureinfo` (
  `ClientProfilePictureID` int NOT NULL AUTO_INCREMENT,
  `ClientAccountID` int NOT NULL,
  `PictureFilename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UploadDate` datetime NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`ClientProfilePictureID`),
  KEY `cppInfo_Client` (`ClientAccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientprofilepictureinfo`
--

INSERT INTO `clientprofilepictureinfo` (`ClientProfilePictureID`, `ClientAccountID`, `PictureFilename`, `UploadDate`, `UsedStatus`) VALUES
(4, 34, '2019-00001-BN-0202202071644213952.jpg', '2022-02-07 06:05:52', 0),
(6, 34, '2019-00001-BN-0202202071644234645.jpg', '2022-02-07 11:50:45', 0),
(7, 34, '2019-00001-BN-0202202071644234663.jpg', '2022-02-07 11:51:03', 0),
(8, 34, '2019-00001-BN-0202202071644240068.jpg', '2022-02-07 13:21:08', 0),
(9, 34, '2019-00001-BN-0202202071644240847.jpg', '2022-02-07 13:34:07', 0),
(10, 34, '2019-00001-BN-0202202071644241168.jpg', '2022-02-07 13:39:28', 0),
(11, 34, '2019-00001-BN-0202202071644242322.jpg', '2022-02-07 13:58:42', 0),
(12, 34, '2019-00001-BN-0202202071644242382.jpg', '2022-02-07 13:59:42', 0),
(13, 34, '2019-00001-BN-0202202071644242461.jpg', '2022-02-07 14:01:01', 0),
(14, 34, '2019-00001-BN-0202202071644243420.jpg', '2022-02-07 14:17:00', 0),
(17, 45, 'default_user.jpg', '2022-02-08 08:36:22', 0),
(18, 45, '2010-00001-BN-0202202081644309514.jpg', '2022-02-08 08:38:34', 0),
(19, 45, '2010-00001-BN-0202202081644312537.jpg', '2022-02-08 09:28:57', 0),
(20, 45, '2010-00001-BN-0202202081644312551.jpg', '2022-02-08 09:29:11', 1),
(21, 34, '2019-00001-BN-0202202091644398074.jpg', '2022-02-09 09:14:34', 1),
(22, 46, 'default_user.jpg', '2022-02-09 09:31:47', 0),
(24, 46, '2014-00005-BN-0202202091644448697.jpg', '2022-02-09 23:18:17', 1);

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
  `start_app_date` date NOT NULL,
  `end_app_date` date NOT NULL,
  `start_app_time` time NOT NULL,
  `end_app_time` time NOT NULL,
  `stat` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `title`, `email_add`, `start_app`, `end_app`, `start_app_date`, `end_app_date`, `start_app_time`, `end_app_time`, `stat`, `remarks`) VALUES
(15, 'Ermil', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-10', '0000-00-00', '00:00:00', '18:00:00', 'Cancelled', ' '),
(16, 'Ermil', 'dalmerer09@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-09', '0000-00-00', '00:00:00', '18:42:00', 'Confirmed', ' '),
(17, 'Ermil', 'dalmerer09@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2021-12-10', '0000-00-00', '00:00:00', '21:28:00', 'Confirmed', ' '),
(18, 'jghfhjtgfhgf', 'dalmerer09@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-11', '0000-00-00', '00:00:00', '00:00:00', 'Confirmed', ' '),
(19, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-11', '0000-00-00', '00:00:00', '16:00:00', 'Pending', ' '),
(21, '', 'brianpacheca123@gmail.com', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-07', '2022-02-07', '09:33:00', '10:33:00', 'Pending', ' '),
(23, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-08', '2022-02-08', '10:00:00', '11:00:00', 'Pending', ' '),
(24, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-07', '2022-02-07', '09:00:00', '10:00:00', 'Pending', ' '),
(25, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-07', '2022-02-07', '11:00:00', '12:00:00', 'Pending', ' '),
(26, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-07', '2022-02-07', '10:49:00', '11:49:00', 'Pending', ' '),
(27, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1970-01-01', '1970-01-01', '12:00:00', '13:00:00', 'Pending', ' '),
(28, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-09', '2022-02-09', '11:00:00', '12:00:00', 'Pending', ' '),
(29, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-08', '2022-02-08', '13:00:00', '14:00:00', 'Pending', ' '),
(30, '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-06', '2022-02-06', '13:00:00', '14:00:00', 'Pending', ' '),
(31, 'Brian', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2022-02-08', '2022-02-08', '10:00:00', '11:00:00', '', ''),
(32, '', '', '2022-02-10 13:00:00', '2022-02-10 14:00:00', '2022-02-10', '2022-02-10', '13:00:00', '14:00:00', 'Pending', ' ');

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
-- Constraints for table `adminprofilepictureinfo`
--
ALTER TABLE `adminprofilepictureinfo`
  ADD CONSTRAINT `appInfo_Admin` FOREIGN KEY (`AdminAccountID`) REFERENCES `adminaccountinfo` (`AdminAccountID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `clientaccountinfo`
--
ALTER TABLE `clientaccountinfo`
  ADD CONSTRAINT `gender_role` FOREIGN KEY (`ClientGenderID`) REFERENCES `genderrole` (`GenderID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_role` FOREIGN KEY (`RoleID`) REFERENCES `userrole` (`RoleID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `clientprofilepictureinfo`
--
ALTER TABLE `clientprofilepictureinfo`
  ADD CONSTRAINT `cppInfo_Client` FOREIGN KEY (`ClientAccountID`) REFERENCES `clientaccountinfo` (`ClientAccountID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
