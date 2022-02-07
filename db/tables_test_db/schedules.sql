-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 07, 2022 at 05:00 AM
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
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `email_add` varchar(255) NOT NULL,
  `start_app` datetime NOT NULL,
  `end_app` datetime NOT NULL,
  `start_app_date` date NOT NULL,
  `end_app_date` date NOT NULL,
  `start_app_time` time NOT NULL,
  `end_app_time` time NOT NULL,
  `stat` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
