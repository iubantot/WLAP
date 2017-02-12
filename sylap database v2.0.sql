-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2017 at 02:44 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sylap`
--

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE IF NOT EXISTS `file` (
  `FileID` int(11) NOT NULL,
  `FileType` varchar(50) NOT NULL,
  `FileName` varchar(50) NOT NULL,
  `FileSize` int(10) NOT NULL,
  `FileClass` varchar(45) NOT NULL,
  `DateUpload` date NOT NULL,
  `TimeUpload` time NOT NULL,
  `Week_num_for_WLAP` int(10) NOT NULL,
  `CourseCode` varchar(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`FileID`, `FileType`, `FileName`, `FileSize`, `FileClass`, `DateUpload`, `TimeUpload`, `Week_num_for_WLAP`, `CourseCode`, `UserID`) VALUES
(1, 'pdf', 'CPE 232 syllabus', 16, 'Syllabus', '2017-02-01', '10:06:30', 0, 'CPE 232', 1),
(2, 'pdf', 'CPE 501 syllabus', 16, 'Syllabus', '2017-01-26', '07:00:00', 0, 'CPE 501', 1),
(3, 'pdf', 'CPE 401 Syllabus', 16, 'Syllabus', '2017-02-04', '08:30:29', 0, 'CPE 501', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`FileID`),
  ADD KEY `CourseID` (`CourseCode`),
  ADD KEY `CourseCode` (`CourseCode`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `FileID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_course_fk` FOREIGN KEY (`CourseCode`) REFERENCES `course` (`CourseCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `file_user_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
