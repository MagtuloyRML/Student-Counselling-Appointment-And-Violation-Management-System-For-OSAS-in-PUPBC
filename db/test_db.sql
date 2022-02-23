-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 23, 2022 at 08:17 AM
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
-- Table structure for table `accountstatus`
--

DROP TABLE IF EXISTS `accountstatus`;
CREATE TABLE IF NOT EXISTS `accountstatus` (
  `AccountStatusID` int NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(50) NOT NULL,
  PRIMARY KEY (`AccountStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountstatus`
--

INSERT INTO `accountstatus` (`AccountStatusID`, `StatusDescription`) VALUES
(1, 'Active'),
(2, 'Unactive');

-- --------------------------------------------------------

--
-- Table structure for table `adminaccountinfo`
--

DROP TABLE IF EXISTS `adminaccountinfo`;
CREATE TABLE IF NOT EXISTS `adminaccountinfo` (
  `AdminAccountID` int NOT NULL AUTO_INCREMENT,
  `AdminFirstName` varchar(255) NOT NULL,
  `AdminMiddleName` varchar(255) DEFAULT NULL,
  `AdminLastName` varchar(255) NOT NULL,
  `AdminSufifx` varchar(15) DEFAULT NULL,
  `AdminUserRoleID` int NOT NULL,
  `AdminContactNo` varchar(11) NOT NULL,
  `AdminUsername` varchar(255) NOT NULL,
  `AdminPassword` varchar(32) NOT NULL,
  `AdminEmailAdd` varchar(255) NOT NULL,
  `AdminAddress` text NOT NULL,
  `GenderID` int NOT NULL,
  `AccountStatusID` int NOT NULL,
  PRIMARY KEY (`AdminAccountID`),
  KEY `adminUserRole_adminInfo` (`AdminUserRoleID`),
  KEY `genderRole_adminInfo` (`GenderID`),
  KEY `accountstat_adminInfo` (`AccountStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminaccountinfo`
--

INSERT INTO `adminaccountinfo` (`AdminAccountID`, `AdminFirstName`, `AdminMiddleName`, `AdminLastName`, `AdminSufifx`, `AdminUserRoleID`, `AdminContactNo`, `AdminUsername`, `AdminPassword`, `AdminEmailAdd`, `AdminAddress`, `GenderID`, `AccountStatusID`) VALUES
(1, 'Joseph', 'Blakis', 'kolorpul', '', 1, '09010102030', 'Sample', 'memapig009', 'Sample@gmail.com', 'Sample Address', 1, 1),
(2, 'Juana Miguels', 'Mendezs', 'De la Cruzs', '', 1, '09080706051', 'dcjuana1234', 'admin123', 'dcjuan@gmail.com', 'Sample address Binan, Lagunas', 1, 1),
(3, 'Deigo', 'Mendez', 'De la Cruz', '', 1, '09080706050', 'Sample', 'rioPdjZsQS', 'dcjuan@gmail.com', 'qweqwe', 2, 1),
(4, 'Juan', 'qewqwe', 'De la Cruz', '', 1, '09080706050', 'admin', 'oxiNsOy08h', 'dcjuan@gmail.com', 'Sample address', 2, 1),
(5, 'Brian', 'Buendia', 'Pachecas', 'S', 2, '12345678910', 'admin', 'AdVoJclw7G', 'brianpacheca123@gmail.com', 'Munti', 1, 1),
(6, 'Brian', 'Buendia', 'Pacheca', '', 1, '09123123123', 'admin', 'admin1234', 'brianpacheca123@gmail.com', 'Munti', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminnotification`
--

DROP TABLE IF EXISTS `adminnotification`;
CREATE TABLE IF NOT EXISTS `adminnotification` (
  `AdminNotification` int NOT NULL AUTO_INCREMENT,
  `AdminAccountID` int NOT NULL,
  `NotificationTitle` varchar(255) NOT NULL,
  `NotificationMessage` text NOT NULL,
  `AdminNotificationStatusID` int NOT NULL,
  `DateTimeStamp` datetime NOT NULL,
  PRIMARY KEY (`AdminNotification`),
  KEY `adminNotif_adminAcc` (`AdminAccountID`),
  KEY `adminNotif_Status` (`AdminNotificationStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminnotification`
--

INSERT INTO `adminnotification` (`AdminNotification`, `AdminAccountID`, `NotificationTitle`, `NotificationMessage`, `AdminNotificationStatusID`, `DateTimeStamp`) VALUES
(1, 1, 'Request Appointment', 'memaadasdasdasd', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `adminprofilepictureinfo`
--

DROP TABLE IF EXISTS `adminprofilepictureinfo`;
CREATE TABLE IF NOT EXISTS `adminprofilepictureinfo` (
  `AdminProfilePictureID` int NOT NULL AUTO_INCREMENT,
  `AdminAccountID` int NOT NULL,
  `PictureFilename` varchar(255) NOT NULL,
  `UploadDate` datetime NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`AdminProfilePictureID`),
  KEY `appInfo_Admin` (`AdminAccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminprofilepictureinfo`
--

INSERT INTO `adminprofilepictureinfo` (`AdminProfilePictureID`, `AdminAccountID`, `PictureFilename`, `UploadDate`, `UsedStatus`) VALUES
(1, 1, 'default_user.jpg', '2022-02-07 06:05:52', 0),
(2, 1, 'pbcscvs1202202091644412996.jpg', '2022-02-09 13:23:16', 0),
(3, 1, 'pbcscvs1202202091644413268.jpg', '2022-02-09 13:27:48', 0),
(4, 1, 'pbcscvs1202202101644452348.jpg', '2022-02-10 00:19:08', 0),
(5, 2, 'default_user.jpg', '2022-02-11 11:55:21', 0),
(6, 3, 'default_user.jpg', '2022-02-15 05:09:23', 1),
(7, 1, 'pbcscvs1202202151644914554.jpg', '2022-02-15 08:42:34', 0),
(8, 1, 'pbcscvs1202202151644914567.jpg', '2022-02-15 08:42:47', 0),
(9, 1, 'pbcscvs1202202151644914573.jpg', '2022-02-15 08:42:53', 0),
(10, 1, 'pbcscvs1202202151644914581.jpg', '2022-02-15 08:43:01', 0),
(11, 1, 'pbcscvs1202202151644914597.jpg', '2022-02-15 08:43:17', 0),
(12, 4, 'default_user.jpg', '2022-02-15 09:08:22', 1),
(13, 2, 'pbcscvs2202202181645178671.jpg', '2022-02-18 11:04:31', 0),
(14, 2, 'pbcscvs2202202181645178680.jpg', '2022-02-18 11:04:40', 0),
(15, 2, 'pbcscvs2202202181645178731.jpg', '2022-02-18 11:05:31', 0),
(16, 2, 'pbcscvs2202202181645178742.jpg', '2022-02-18 11:05:42', 0),
(17, 5, 'default_user.jpg', '2022-02-18 11:26:24', 1),
(18, 2, 'pbcscvs2202202191645240078.jpg', '2022-02-19 04:07:58', 0),
(19, 2, 'pbcscvs2202202191645240136.jpg', '2022-02-19 04:08:56', 0),
(20, 2, 'pbcscvs2202202191645240144.jpg', '2022-02-19 04:09:04', 1),
(21, 1, 'pbcscvs1202202191645240168.jpg', '2022-02-19 04:09:28', 0),
(22, 1, 'pbcscvs1202202191645240198.jpg', '2022-02-19 04:09:58', 0),
(23, 6, 'default_user.jpg', '2022-02-20 03:34:22', 1),
(24, 1, 'pbcscvs1202202231645588047.jpg', '2022-02-23 03:47:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminuserrole`
--

DROP TABLE IF EXISTS `adminuserrole`;
CREATE TABLE IF NOT EXISTS `adminuserrole` (
  `AdminUserRoleID` int NOT NULL AUTO_INCREMENT,
  `AdminUserRole` varchar(255) NOT NULL,
  `AdminPageStudentCounceling` int NOT NULL,
  `AdminPageViolation` int NOT NULL,
  `AdminMaintenance` int NOT NULL,
  `StatusID` int NOT NULL,
  PRIMARY KEY (`AdminUserRoleID`),
  KEY `accountStatus_rolestats` (`StatusID`),
  KEY `studCounceling_status` (`AdminPageStudentCounceling`),
  KEY `studViolation_status` (`AdminPageViolation`),
  KEY `sysMain_status` (`AdminMaintenance`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuserrole`
--

INSERT INTO `adminuserrole` (`AdminUserRoleID`, `AdminUserRole`, `AdminPageStudentCounceling`, `AdminPageViolation`, `AdminMaintenance`, `StatusID`) VALUES
(1, 'ADMINISTRATOR', 1, 1, 1, 1),
(2, 'GUIDANCE COUNCELOR', 1, 2, 2, 1),
(3, 'GUARD', 2, 1, 2, 1),
(4, 'PROFESSOR', 1, 2, 2, 1),
(5, 'LADY GUARD', 2, 1, 2, 1),
(6, 'CASHIER', 2, 1, 2, 1),
(7, 'JANITOR', 2, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `avail_sched`
--

DROP TABLE IF EXISTS `avail_sched`;
CREATE TABLE IF NOT EXISTS `avail_sched` (
  `avail_id` int NOT NULL AUTO_INCREMENT,
  `meta_field` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`avail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `avail_sched`
--

INSERT INTO `avail_sched` (`avail_id`, `meta_field`, `start_date`, `end_date`, `start_time`, `end_time`) VALUES
(1, '1', '2022-02-13', '2022-02-19', '07:00:00', '18:00:00'),
(2, '2', '2022-02-19', '2022-02-20', '08:00:00', '09:00:00'),
(3, '3', '2022-02-27', '2022-03-05', '07:00:00', '18:00:00'),
(4, '4', '2022-03-06', '2022-03-12', '07:00:00', '18:00:00'),
(5, '6', '2022-01-01', '2023-01-01', '00:00:00', '23:00:00');

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
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ClientAccountID`),
  KEY `gender_role` (`ClientGenderID`),
  KEY `user_role` (`RoleID`)
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientaccountinfo`
--

INSERT INTO `clientaccountinfo` (`ClientAccountID`, `ClientFirstName`, `ClientMiddleName`, `ClientLastName`, `ClientSuffix`, `ClientStudentNo`, `RoleID`, `ClientBDay`, `ClientAddress`, `ClientContactNo`, `ClientGuardian`, `ClientGuardianNo`, `ClientEmailAdd`, `ClientPassword`, `ClientGenderID`, `code`) VALUES
(34, 'Ernesto', '', 'Ramos', '', '2019-00001-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'mema@gamil.com', 'paramore222', 1, '730126'),
(45, 'Juans', 'Mendezs', 'De la Cruzs', 's', '2010-00002-BN-0', 1, '2000-01-10', 'Sample address Binan, Lagunas', '09090909091', 'Sample Guardians', '09080706051', 'juans@gmail.com', 'mema1234', 1, '187789'),
(46, 'Josefine', 'Donato', 'Cortez', 'Jr.', '2014-00005-BN-0', 1, '1999-02-13', 'Sample address Binan, Laguna', '09080706050', 'Ermaculit Cortez', '09080706050', 'jc@gmail.com', 'memapig009', 2, NULL),
(70, 'Josefine', 'Donato', 'Cortez', 'Jr.', '2014-00005-BN-0', 1, '1999-02-13', 'Sample address Binan, Laguna', '09080706050', 'Ermaculit Cortez', '09080706050', 'jc@gmail.com', 'memapig009', 2, NULL),
(89, 'Ernesto', '', 'Ramos', '', '2019-00001-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'mema@gamil.com', 'paramore222', 1, '730126'),
(90, 'Juan', 'Mendez', 'De la Cruz', '', '2010-00001-BN-0', 1, '2000-01-08', 'Sample address Binan, Laguna', '09090909090', 'Sample Guardian', '09080706050', 'juan@gmail.com', 'mema1234', 1, NULL),
(91, 'Brian', '', 'Pacheca', '', '2018-01154-BN-0', 1, '2022-02-22', 'asdasd', '09123456789', 'Mother', '09123456789', 'brianpacheca123@gmail.com', 'client123', 1, '212906');

-- --------------------------------------------------------

--
-- Table structure for table `clientnotification`
--

DROP TABLE IF EXISTS `clientnotification`;
CREATE TABLE IF NOT EXISTS `clientnotification` (
  `ClientNotification` int NOT NULL AUTO_INCREMENT,
  `ClientAccountID` int NOT NULL,
  `NotificationTitle` varchar(255) NOT NULL,
  `NotificationMessage` text NOT NULL,
  `ClientNotificationStatusID` int NOT NULL,
  `DateTimeStamp` datetime NOT NULL,
  PRIMARY KEY (`ClientNotification`),
  KEY `clientNotif_clientAcc` (`ClientAccountID`),
  KEY `clientNotif_Status` (`ClientNotificationStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clientnotification`
--

INSERT INTO `clientnotification` (`ClientNotification`, `ClientAccountID`, `NotificationTitle`, `NotificationMessage`, `ClientNotificationStatusID`, `DateTimeStamp`) VALUES
(1, 34, 'Bibili ng Suka', 'Bibili ako ng suka sabi ni mama, nang makakita ng magandang chix', 2, '2022-02-22 08:25:31'),
(2, 34, 'Bibili ng Suka', 'Bibili ako ng suka sabi ni mama, nang makakita ng magandang chix', 2, '2022-02-22 08:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `clientprofilepictureinfo`
--

DROP TABLE IF EXISTS `clientprofilepictureinfo`;
CREATE TABLE IF NOT EXISTS `clientprofilepictureinfo` (
  `ClientProfilePictureID` int NOT NULL AUTO_INCREMENT,
  `ClientAccountID` int NOT NULL,
  `PictureFilename` varchar(255) NOT NULL,
  `UploadDate` datetime NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`ClientProfilePictureID`),
  KEY `cppInfo_Client` (`ClientAccountID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

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
(20, 45, '2010-00001-BN-0202202081644312551.jpg', '2022-02-08 09:29:11', 0),
(21, 34, '2019-00001-BN-0202202091644398074.jpg', '2022-02-09 09:14:34', 0),
(22, 46, 'default_user.jpg', '2022-02-09 09:31:47', 0),
(24, 46, '2014-00005-BN-0202202091644448697.jpg', '2022-02-09 23:18:17', 0),
(25, 46, '2014-00005-BN-0202202101644493032.jpg', '2022-02-10 11:37:12', 0),
(26, 46, '2014-00005-BN-0202202151644893964.jpg', '2022-02-15 02:59:24', 0),
(27, 46, '2014-00005-BN-0202202151644893983.jpg', '2022-02-15 02:59:43', 0),
(28, 46, '2014-00005-BN-0202202151644894223.jpg', '2022-02-15 03:03:43', 0),
(29, 46, '2014-00005-BN-0202202151644894230.jpg', '2022-02-15 03:03:50', 0),
(30, 46, '2014-00005-BN-0202202151644901624.jpg', '2022-02-15 05:07:04', 0),
(31, 46, '2014-00005-BN-0202202151644901633.jpg', '2022-02-15 05:07:13', 0),
(32, 46, '2014-00005-BN-0202202151644901642.jpg', '2022-02-15 05:07:22', 0),
(33, 46, '2014-00005-BN-0202202151644901663.jpg', '2022-02-15 05:07:43', 1),
(34, 45, '2010-00001-BN-0202202181645180651.jpg', '2022-02-18 11:37:31', 1),
(35, 34, '2019-00001-BN-0202202201645323811.jpg', '2022-02-20 03:23:31', 0),
(36, 91, 'default_user.jpg', '2022-02-20 13:38:31', 1),
(37, 92, 'default_user.jpg', '2022-02-21 14:18:22', 1),
(38, 34, '2019-00001-BN-0202202231645595175.jpg', '2022-02-23 05:46:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forevaluation`
--

DROP TABLE IF EXISTS `forevaluation`;
CREATE TABLE IF NOT EXISTS `forevaluation` (
  `eval_id` int NOT NULL AUTO_INCREMENT,
  `evaluator_id` int NOT NULL,
  `appointment_id` int NOT NULL,
  `evaluation` text NOT NULL,
  `recommendation` text NOT NULL,
  PRIMARY KEY (`eval_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `forevaluation`
--

INSERT INTO `forevaluation` (`eval_id`, `evaluator_id`, `appointment_id`, `evaluation`, `recommendation`) VALUES
(1, 6, 60, 'test', 'test'),
(2, 6, 61, 'test', 'test'),
(3, 6, 61, 'test', 'test');

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
-- Table structure for table `notificationstatus`
--

DROP TABLE IF EXISTS `notificationstatus`;
CREATE TABLE IF NOT EXISTS `notificationstatus` (
  `NotificationStatusID` int NOT NULL AUTO_INCREMENT,
  `NotificationStatusDescription` varchar(50) NOT NULL,
  PRIMARY KEY (`NotificationStatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notificationstatus`
--

INSERT INTO `notificationstatus` (`NotificationStatusID`, `NotificationStatusDescription`) VALUES
(1, 'READ'),
(2, 'UNREAD');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
CREATE TABLE IF NOT EXISTS `schedules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `anonymity` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `client_id` int NOT NULL,
  `start_app` datetime NOT NULL,
  `end_app` datetime NOT NULL,
  `stat` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `reason` text,
  `cancel_id` int DEFAULT NULL,
  `cancel_reason` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `anonymity`, `title`, `email_add`, `client_id`, `start_app`, `end_app`, `stat`, `remarks`, `reason`, `cancel_id`, `cancel_reason`) VALUES
(59, 'Yes', '', 'mema@gamil.com', 34, '2022-02-20 09:00:00', '2022-02-20 10:00:00', 'Done', '2', '', 0, NULL),
(60, 'Yes', '', 'brianpacheca123@gmail.com', 34, '2022-02-22 22:00:00', '2022-02-22 23:00:00', 'Done', '1', 'Ikaw', 6, 'Conflicting schedule'),
(61, 'No', '', 'mema@gamil.com', 34, '2022-02-21 18:00:00', '2022-02-21 19:00:00', 'Evaluated', '6', 'Nothing', NULL, NULL),
(62, 'Yes', '', 'mema@gamil.com', 34, '2022-03-01 10:00:00', '2022-03-01 11:00:00', 'Pending', '3', 'Ikaw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuscontent`
--

DROP TABLE IF EXISTS `statuscontent`;
CREATE TABLE IF NOT EXISTS `statuscontent` (
  `StatusID` int NOT NULL AUTO_INCREMENT,
  `StatusDescription` varchar(20) NOT NULL,
  PRIMARY KEY (`StatusID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuscontent`
--

INSERT INTO `statuscontent` (`StatusID`, `StatusDescription`) VALUES
(1, 'ACTIVATE'),
(2, 'DEACTIVATE');

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
  ADD CONSTRAINT `accountstat_adminInfo` FOREIGN KEY (`AccountStatusID`) REFERENCES `accountstatus` (`AccountStatusID`),
  ADD CONSTRAINT `adminUserRole_adminInfo` FOREIGN KEY (`AdminUserRoleID`) REFERENCES `adminuserrole` (`AdminUserRoleID`),
  ADD CONSTRAINT `genderRole_adminInfo` FOREIGN KEY (`GenderID`) REFERENCES `genderrole` (`GenderID`);

--
-- Constraints for table `adminnotification`
--
ALTER TABLE `adminnotification`
  ADD CONSTRAINT `adminNotif_adminAcc` FOREIGN KEY (`AdminAccountID`) REFERENCES `adminaccountinfo` (`AdminAccountID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `adminNotif_Status` FOREIGN KEY (`AdminNotificationStatusID`) REFERENCES `notificationstatus` (`NotificationStatusID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `adminprofilepictureinfo`
--
ALTER TABLE `adminprofilepictureinfo`
  ADD CONSTRAINT `appInfo_Admin` FOREIGN KEY (`AdminAccountID`) REFERENCES `adminaccountinfo` (`AdminAccountID`);

--
-- Constraints for table `adminuserrole`
--
ALTER TABLE `adminuserrole`
  ADD CONSTRAINT `accountStatus_rolestats` FOREIGN KEY (`StatusID`) REFERENCES `accountstatus` (`AccountStatusID`),
  ADD CONSTRAINT `studCounceling_status` FOREIGN KEY (`AdminPageStudentCounceling`) REFERENCES `statuscontent` (`StatusID`),
  ADD CONSTRAINT `studViolation_status` FOREIGN KEY (`AdminPageViolation`) REFERENCES `statuscontent` (`StatusID`),
  ADD CONSTRAINT `sysMain_status` FOREIGN KEY (`AdminMaintenance`) REFERENCES `statuscontent` (`StatusID`);

--
-- Constraints for table `clientnotification`
--
ALTER TABLE `clientnotification`
  ADD CONSTRAINT `clientNotif_clientAcc` FOREIGN KEY (`ClientAccountID`) REFERENCES `clientaccountinfo` (`ClientAccountID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `clientNotif_Status` FOREIGN KEY (`ClientNotificationStatusID`) REFERENCES `notificationstatus` (`NotificationStatusID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
