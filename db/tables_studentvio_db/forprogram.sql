-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2022 at 09:46 AM
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
(1, 'BSIT', 'Bachelor of Science in Information Technology'),
(2, 'BSA\r\n', 'Bachelor of Science in Accounting\r\n'),
(3, 'BSEDSS\r\n', 'Bachelor of Secondary Education major in Social Studies\r\n'),
(4, 'DCET\r\n', 'Diploma in Computer Engineering Technology\r\n'),
(5, 'DICT', 'Diploma in Information Technology\r\n'),
(6, 'BSEDEN\r\n', 'Bachelor of Secondary Education major in English\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forprogram`
--
ALTER TABLE `forprogram`
  ADD PRIMARY KEY (`pID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forprogram`
--
ALTER TABLE `forprogram`
  MODIFY `pID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
