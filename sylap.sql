-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2017 at 02:20 PM
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
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `AccountID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `TypeofUserNum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`AccountID`, `Username`, `Password`, `TypeofUserNum`) VALUES
(1, 'ljthular', 'hular', 1),
(3, 'mcvenal', 'venal', 2);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseCode` varchar(45) NOT NULL,
  `CourseName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseCode`, `CourseName`) VALUES
('CPE 232', 'Manage Enterprise Servers'),
('CPE 501', 'Computer Network Design');

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
  `TimeUpload` varchar(45) NOT NULL,
  `Week_num_for_WLAP` int(10) NOT NULL,
  `CourseCode` varchar(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`FileID`, `FileType`, `FileName`, `FileSize`, `FileClass`, `DateUpload`, `TimeUpload`, `Week_num_for_WLAP`, `CourseCode`, `UserID`) VALUES
(1, 'pdf', 'CPE 232 syllabus', 16, 'Syllabus', '2017-02-01', '10:06am', 0, 'CPE 232', 1),
(2, 'pdf', 'CPE 501 syllabus', 16, 'Syllabus', '2017-01-26', '07:00pm', 0, 'CPE 501', 1),
(3, 'pdf', 'CPE 401 Syllabus', 16, 'Syllabus', '2017-02-04', '08:30pm', 0, 'CPE 501', 1);

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE IF NOT EXISTS `remarks` (
  `RemarkID` int(11) NOT NULL,
  `Remarks` text NOT NULL,
  `Date_Added` varchar(45) NOT NULL,
  `Time_Added` varchar(45) NOT NULL,
  `FileID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `ScheduleID` int(11) NOT NULL,
  `ScheduleDay` varchar(45) NOT NULL,
  `ScheduleTimeIN` varchar(10) NOT NULL,
  `ScheduleTimeOUT` varchar(10) NOT NULL,
  `Section` varchar(9) NOT NULL,
  `Room` varchar(7) NOT NULL,
  `CourseCode` varchar(11) NOT NULL,
  `UserID` int(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`ScheduleID`, `ScheduleDay`, `ScheduleTimeIN`, `ScheduleTimeOUT`, `Section`, `Room`, `CourseCode`, `UserID`) VALUES
(1, 'Wednesday', '1:30 pm', '3:30 pm', 'CPE42FC1', 'Q-5202', 'CPE 232', 1),
(2, 'Thursday', '4:30 pm', '7:30 pm', 'CPE42FC1', 'Q-5202', 'CPE 232', 1),
(3, 'Tuesday', '4:30 pm', '6:30 pm', 'CPE51FC1', 'Q-5204', 'CPE 501', 1),
(4, 'Friday', '1:30 pm', '4:30 pm', 'CPE51FC1', 'Q-5204', 'CPE 501', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type_of_user`
--

CREATE TABLE IF NOT EXISTS `type_of_user` (
  `TypeofUserNum` int(11) NOT NULL,
  `TypeofUser` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_of_user`
--

INSERT INTO `type_of_user` (`TypeofUserNum`, `TypeofUser`) VALUES
(1, 'Faculty Instructor/Professor'),
(2, 'Department Chairman');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `imageID` int(11) NOT NULL,
  `imagename` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`imageID`, `imagename`) VALUES
(1, 'upload_pic/thumbnail_1485669827.jpg'),
(2, 'upload_pic/thumbnail_1485669846.jpg'),
(3, 'upload_pic/thumbnail_1485829994.jpg'),
(4, 'upload_pic/thumbnail_1485831187.jpg'),
(5, 'upload_pic/thumbnail_1485831200.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `MiddleName` varchar(50) NOT NULL,
  `ContactNum` varchar(12) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `AccountID` int(11) NOT NULL,
  `ImageName` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `LastName`, `FirstName`, `MiddleName`, `ContactNum`, `Email`, `AccountID`, `ImageName`) VALUES
(1, 'Hular', 'Lord James', 'Tan', '09753181657', 'hularlordjames@yahoo.com', 1, ''),
(2, 'Venal', 'Ma.Cecilia', '', '', '', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`AccountID`),
  ADD KEY `TypeofUserNum` (`TypeofUserNum`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseCode`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`FileID`),
  ADD KEY `CourseID` (`CourseCode`),
  ADD KEY `CourseCode` (`CourseCode`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`RemarkID`),
  ADD KEY `FileID` (`FileID`),
  ADD KEY `FileID_2` (`FileID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`ScheduleID`),
  ADD KEY `CourseID` (`CourseCode`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `type_of_user`
--
ALTER TABLE `type_of_user`
  ADD PRIMARY KEY (`TypeofUserNum`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`imageID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `AccountID` (`AccountID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `AccountID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `FileID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `RemarkID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `ScheduleID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `type_of_user`
--
ALTER TABLE `type_of_user`
  MODIFY `TypeofUserNum` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_type_of_user_fk` FOREIGN KEY (`TypeofUserNum`) REFERENCES `type_of_user` (`TypeofUserNum`);

--
-- Constraints for table `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `file_course_fk` FOREIGN KEY (`CourseCode`) REFERENCES `course` (`CourseCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `file_user_fk` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `remarks`
--
ALTER TABLE `remarks`
  ADD CONSTRAINT `remarks_file_id` FOREIGN KEY (`FileID`) REFERENCES `file` (`FileID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_course` FOREIGN KEY (`CourseCode`) REFERENCES `course` (`CourseCode`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `schedule_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `User_Account_fk` FOREIGN KEY (`AccountID`) REFERENCES `account` (`AccountID`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
