-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 07:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_school`
--
CREATE DATABASE IF NOT EXISTS `online_school` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `online_school`;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `gradeID` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`gradeID`, `subject`, `grade`, `studentID`) VALUES
(22, 'programming', 10, 12),
(23, 'english', 10, 12),
(24, 'discrete mathematics', 8, 12),
(25, 'linear algebra', 6, 12),
(26, 'office apps', 10, 12),
(27, 'test', 5, 16);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `username`, `password`, `email`) VALUES
(12, 'nikolatech', '$2y$10$MFbYiOMTwXYfNo8VzocQYeTclh44QSmgPgW9/egPE1nJag9JUw0b2', 'nikola@mail.com'),
(13, 'ilija.rakic', '$2y$10$RP/e2th1ZPdNqEHOGvWlquyqTlBrVtJCcEBSCyfZKFQiJAFiglzJW', 'ilija.rakic@mail.com'),
(14, 'rado_kayan', '$2y$10$79INRDcVqD81ignQ24.iseu0u9nI3ovsQGnvRaAKalTkZtD8j1JP.', 'rado_kayan@email.com'),
(15, 'djdespot', '$2y$10$hJefgthEzWWjJb41zJ5/luHaLqIOMz63B41RBpZfSyFbBDDp.Tvqu', 'djdespot@workmail.com'),
(16, 'testUser', '$2y$10$e4NGYaVQRlk.psMIfezA7ubqTTRvqyXh8wiFsCnR3GBn0677DtV/u', 'testEmail@mail.com'),
(17, 'cico_lazarevic', '$2y$10$cSzl4RJa2oczF2E4vdbquOUXTAeIfBMBmg.4Hu7l/I0HuNg6d1sKG', 'cicko@mail.com'),
(18, 'spongebob', '$2y$10$ukzTTW0xcnhBxDhxOvw8juuy0JkZcUeCwOECfqmJMmxP4M3MTxfma', 'ssp@mail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
