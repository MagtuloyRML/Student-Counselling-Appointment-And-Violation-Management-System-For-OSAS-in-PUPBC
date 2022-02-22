-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2022 at 08:22 AM
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
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountstatus`
--

CREATE TABLE `accountstatus` (
  `AccountStatusID` int(11) NOT NULL,
  `StatusDescription` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `adminaccountinfo` (
  `AdminAccountID` int(11) NOT NULL,
  `AdminFirstName` varchar(255) NOT NULL,
  `AdminMiddleName` varchar(255) DEFAULT NULL,
  `AdminLastName` varchar(255) NOT NULL,
  `AdminSufifx` varchar(15) DEFAULT NULL,
  `AdminUserRoleID` int(11) NOT NULL,
  `AdminContactNo` varchar(11) NOT NULL,
  `AdminUsername` varchar(255) NOT NULL,
  `AdminPassword` varchar(32) NOT NULL,
  `AdminEmailAdd` varchar(255) NOT NULL,
  `AdminAddress` text NOT NULL,
  `GenderID` int(11) NOT NULL,
  `AccountStatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `adminnotification` (
  `AdminNotification` int(11) NOT NULL,
  `AdminAccountID` int(11) NOT NULL,
  `NotificationTitle` varchar(255) NOT NULL,
  `NotificationMessage` text NOT NULL,
  `AdminNotificationStatusID` int(11) NOT NULL,
  `DateTimeStamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminnotification`
--

INSERT INTO `adminnotification` (`AdminNotification`, `AdminAccountID`, `NotificationTitle`, `NotificationMessage`, `AdminNotificationStatusID`, `DateTimeStamp`) VALUES
(1, 1, 'Request Appointment', 'memaadasdasdasd', 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `adminprofilepictureinfo`
--

CREATE TABLE `adminprofilepictureinfo` (
  `AdminProfilePictureID` int(11) NOT NULL,
  `AdminAccountID` int(11) NOT NULL,
  `PictureFilename` varchar(255) NOT NULL,
  `UploadDate` datetime NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(22, 1, 'pbcscvs1202202191645240198.jpg', '2022-02-19 04:09:58', 1),
(23, 6, 'default_user.jpg', '2022-02-20 03:34:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `adminuserrole`
--

CREATE TABLE `adminuserrole` (
  `AdminUserRoleID` int(11) NOT NULL,
  `AdminUserRole` varchar(255) NOT NULL,
  `AdminPageStudentCounceling` int(11) NOT NULL,
  `AdminPageViolation` int(11) NOT NULL,
  `AdminMaintenance` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminuserrole`
--

INSERT INTO `adminuserrole` (`AdminUserRoleID`, `AdminUserRole`, `AdminPageStudentCounceling`, `AdminPageViolation`, `AdminMaintenance`, `StatusID`) VALUES
(1, 'ADMINISTRATOR', 1, 1, 1, 1),
(2, 'GUIDANCE COUNCELOR', 1, 2, 2, 1),
(3, 'GUARD', 2, 1, 2, 1),
(4, 'PROF', 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `avail_sched`
--

CREATE TABLE `avail_sched` (
  `avail_id` int(11) NOT NULL,
  `meta_field` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `clientaccountinfo` (
  `ClientAccountID` int(11) NOT NULL,
  `ClientFirstName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ClientMiddleName` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ClientLastName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ClientSuffix` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `ClientStudentNo` varchar(15) CHARACTER SET latin1 NOT NULL,
  `RoleID` int(11) NOT NULL,
  `ClientBDay` date NOT NULL,
  `ClientAddress` text CHARACTER SET latin1 NOT NULL,
  `ClientContactNo` varchar(25) CHARACTER SET latin1 NOT NULL,
  `ClientGuardian` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ClientGuardianNo` varchar(25) CHARACTER SET latin1 NOT NULL,
  `ClientEmailAdd` varchar(255) CHARACTER SET latin1 NOT NULL,
  `ClientPassword` varchar(32) CHARACTER SET latin1 NOT NULL,
  `ClientGenderID` int(11) NOT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientaccountinfo`
--

INSERT INTO `clientaccountinfo` (`ClientAccountID`, `ClientFirstName`, `ClientMiddleName`, `ClientLastName`, `ClientSuffix`, `ClientStudentNo`, `RoleID`, `ClientBDay`, `ClientAddress`, `ClientContactNo`, `ClientGuardian`, `ClientGuardianNo`, `ClientEmailAdd`, `ClientPassword`, `ClientGenderID`, `code`) VALUES
(34, 'Ernesto', '', 'Ramos', '', '2019-00001-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'mema@gamil.com', 'paramore222', 1, NULL),
(45, 'Juans', 'Mendezs', 'De la Cruzs', 's', '2010-00002-BN-0', 1, '2000-01-10', 'Sample address Binan, Lagunas', '09090909091', 'Sample Guardians', '09080706051', 'juans@gmail.com', 'mema1234', 1, NULL),
(46, 'Josefine', 'Donato', 'Cortez', 'Jr.', '2014-00005-BN-0', 1, '1999-02-13', 'Sample address Binan, Laguna', '09080706050', 'Ermaculit Cortez', '09080706050', 'jc@gmail.com', 'memapig009', 2, NULL),
(70, 'Josefine', 'Donato', 'Cortez', 'Jr.', '2014-00005-BN-0', 1, '1999-02-13', 'Sample address Binan, Laguna', '09080706050', 'Ermaculit Cortez', '09080706050', 'jc@gmail.com', 'memapig009', 2, NULL),
(89, 'Ernesto', '', 'Ramos', '', '2019-00001-BN-0', 1, '2022-01-01', 'Sample address', '09090909090', 'Sample Guardian', '09090909090', 'mema@gamil.com', 'paramore222', 1, NULL),
(90, 'Juan', 'Mendez', 'De la Cruz', '', '2010-00001-BN-0', 1, '2000-01-08', 'Sample address Binan, Laguna', '09090909090', 'Sample Guardian', '09080706050', 'juan@gmail.com', 'mema1234', 1, NULL),
(91, 'Brian', '', 'Pacheca', '', '2018-01154-BN-0', 1, '2022-02-22', 'asdasd', '09123456789', 'Mother', '09123456789', 'brianpacheca123@gmail.com', 'client123', 1, '212906');

-- --------------------------------------------------------

--
-- Table structure for table `clientnotification`
--

CREATE TABLE `clientnotification` (
  `ClientNotification` int(11) NOT NULL,
  `ClientAccountID` int(11) NOT NULL,
  `NotificationTitle` varchar(255) NOT NULL,
  `NotificationMessage` text NOT NULL,
  `ClientNotificationStatusID` int(11) NOT NULL,
  `DateTimeStamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `clientprofilepictureinfo` (
  `ClientProfilePictureID` int(11) NOT NULL,
  `ClientAccountID` int(11) NOT NULL,
  `PictureFilename` varchar(255) NOT NULL,
  `UploadDate` datetime NOT NULL,
  `UsedStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(35, 34, '2019-00001-BN-0202202201645323811.jpg', '2022-02-20 03:23:31', 1),
(36, 91, 'default_user.jpg', '2022-02-20 13:38:31', 1),
(37, 92, 'default_user.jpg', '2022-02-21 14:18:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forevaluation`
--

CREATE TABLE `forevaluation` (
  `eval_id` int(11) NOT NULL,
  `evaluator_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL,
  `evaluation` text NOT NULL,
  `recommendation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `genderrole` (
  `GenderID` int(11) NOT NULL,
  `Description` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

CREATE TABLE `notificationstatus` (
  `NotificationStatusID` int(11) NOT NULL,
  `NotificationStatusDescription` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `anonymity` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `client_id` int(11) NOT NULL,
  `start_app` datetime NOT NULL,
  `end_app` datetime NOT NULL,
  `stat` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `reason` text DEFAULT NULL,
  `cancel_id` int(11) DEFAULT NULL,
  `cancel_reason` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `anonymity`, `title`, `email_add`, `client_id`, `start_app`, `end_app`, `stat`, `remarks`, `reason`, `cancel_id`, `cancel_reason`) VALUES
(59, 'Yes', '', 'mema@gamil.com', 34, '2022-02-20 09:00:00', '2022-02-20 10:00:00', 'Done', '2', '', 0, NULL),
(60, 'Yes', '', 'brianpacheca123@gmail.com', 34, '2022-02-22 22:00:00', '2022-02-22 23:00:00', 'Confirmed', '1', 'Ikaw', 6, 'Conflicting schedule'),
(61, 'No', '', 'mema@gamil.com', 34, '2022-02-21 18:00:00', '2022-02-21 19:00:00', 'Evaluated', '6', 'Nothing', NULL, NULL),
(62, 'Yes', '', 'mema@gamil.com', 34, '2022-03-01 10:00:00', '2022-03-01 11:00:00', 'Pending', '3', 'Ikaw', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `statuscontent`
--

CREATE TABLE `statuscontent` (
  `StatusID` int(11) NOT NULL,
  `StatusDescription` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `tbl_admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_clients`
--

CREATE TABLE `tbl_clients` (
  `stud_id` int(11) NOT NULL,
  `stud_num` varchar(255) NOT NULL,
  `stud_pass` varchar(255) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `stud_email` varchar(255) NOT NULL,
  `stud_contact` varchar(255) NOT NULL,
  `stud_guardian` varchar(255) NOT NULL,
  `guardian_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_clients`
--

INSERT INTO `tbl_clients` (`stud_id`, `stud_num`, `stud_pass`, `stud_name`, `stud_email`, `stud_contact`, `stud_guardian`, `guardian_contact`) VALUES
(1, 'sample', 'paramore', 'ermil', 'ermil', '09090909', 'quardian', '09090909');

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `RoleID` int(11) NOT NULL,
  `Description` varchar(25) CHARACTER SET latin1 NOT NULL,
  `ForPage` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`RoleID`, `Description`, `ForPage`) VALUES
(1, 'Student', 'Client'),
(2, 'Administrator', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountstatus`
--
ALTER TABLE `accountstatus`
  ADD PRIMARY KEY (`AccountStatusID`);

--
-- Indexes for table `adminaccountinfo`
--
ALTER TABLE `adminaccountinfo`
  ADD PRIMARY KEY (`AdminAccountID`),
  ADD KEY `adminUserRole_adminInfo` (`AdminUserRoleID`),
  ADD KEY `genderRole_adminInfo` (`GenderID`),
  ADD KEY `accountstat_adminInfo` (`AccountStatusID`);

--
-- Indexes for table `adminnotification`
--
ALTER TABLE `adminnotification`
  ADD PRIMARY KEY (`AdminNotification`),
  ADD KEY `adminNotif_adminAcc` (`AdminAccountID`),
  ADD KEY `adminNotif_Status` (`AdminNotificationStatusID`);

--
-- Indexes for table `adminprofilepictureinfo`
--
ALTER TABLE `adminprofilepictureinfo`
  ADD PRIMARY KEY (`AdminProfilePictureID`),
  ADD KEY `appInfo_Admin` (`AdminAccountID`);

--
-- Indexes for table `adminuserrole`
--
ALTER TABLE `adminuserrole`
  ADD PRIMARY KEY (`AdminUserRoleID`),
  ADD KEY `accountStatus_rolestats` (`StatusID`),
  ADD KEY `studCounceling_status` (`AdminPageStudentCounceling`),
  ADD KEY `studViolation_status` (`AdminPageViolation`),
  ADD KEY `sysMain_status` (`AdminMaintenance`);

--
-- Indexes for table `avail_sched`
--
ALTER TABLE `avail_sched`
  ADD PRIMARY KEY (`avail_id`);

--
-- Indexes for table `clientaccountinfo`
--
ALTER TABLE `clientaccountinfo`
  ADD PRIMARY KEY (`ClientAccountID`),
  ADD KEY `gender_role` (`ClientGenderID`),
  ADD KEY `user_role` (`RoleID`);

--
-- Indexes for table `clientnotification`
--
ALTER TABLE `clientnotification`
  ADD PRIMARY KEY (`ClientNotification`),
  ADD KEY `clientNotif_clientAcc` (`ClientAccountID`),
  ADD KEY `clientNotif_Status` (`ClientNotificationStatusID`);

--
-- Indexes for table `clientprofilepictureinfo`
--
ALTER TABLE `clientprofilepictureinfo`
  ADD PRIMARY KEY (`ClientProfilePictureID`),
  ADD KEY `cppInfo_Client` (`ClientAccountID`);

--
-- Indexes for table `forevaluation`
--
ALTER TABLE `forevaluation`
  ADD PRIMARY KEY (`eval_id`);

--
-- Indexes for table `genderrole`
--
ALTER TABLE `genderrole`
  ADD PRIMARY KEY (`GenderID`);

--
-- Indexes for table `notificationstatus`
--
ALTER TABLE `notificationstatus`
  ADD PRIMARY KEY (`NotificationStatusID`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuscontent`
--
ALTER TABLE `statuscontent`
  ADD PRIMARY KEY (`StatusID`);

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountstatus`
--
ALTER TABLE `accountstatus`
  MODIFY `AccountStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminaccountinfo`
--
ALTER TABLE `adminaccountinfo`
  MODIFY `AdminAccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `adminnotification`
--
ALTER TABLE `adminnotification`
  MODIFY `AdminNotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminprofilepictureinfo`
--
ALTER TABLE `adminprofilepictureinfo`
  MODIFY `AdminProfilePictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `adminuserrole`
--
ALTER TABLE `adminuserrole`
  MODIFY `AdminUserRoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `avail_sched`
--
ALTER TABLE `avail_sched`
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clientaccountinfo`
--
ALTER TABLE `clientaccountinfo`
  MODIFY `ClientAccountID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `clientnotification`
--
ALTER TABLE `clientnotification`
  MODIFY `ClientNotification` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clientprofilepictureinfo`
--
ALTER TABLE `clientprofilepictureinfo`
  MODIFY `ClientProfilePictureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `forevaluation`
--
ALTER TABLE `forevaluation`
  MODIFY `eval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genderrole`
--
ALTER TABLE `genderrole`
  MODIFY `GenderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notificationstatus`
--
ALTER TABLE `notificationstatus`
  MODIFY `NotificationStatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `statuscontent`
--
ALTER TABLE `statuscontent`
  MODIFY `StatusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_clients`
--
ALTER TABLE `tbl_clients`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
