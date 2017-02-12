-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2017 at 12:59 PM
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
  `CourseName` varchar(145) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseCode`, `CourseName`) VALUES
('CE 001', 'Statics of Rigid Bodies'),
('CE 002', 'Dynamics of Rigid Bodies'),
('CE 003A', 'Mechanics of Deformable Bodies'),
('CHEM 002', 'Environmental Engineering'),
('COE 001', 'Engineering Orientation'),
('COE 002A', 'Introduction to Intellectual Property'),
('CPE 001', 'Computer Fundamentals'),
('CPE 003', 'Computer-Aided Drafting'),
('CPE 004', 'Logic Circuits and Switching Theory'),
('CPE 005', 'Computer System Organization with Assembly Language'),
('CPE 006', 'Microprocessor Systems'),
('CPE 131', 'Principles of Embedded Systems'),
('CPE 132', 'Systems Architecture for Embedded Systems'),
('CPE 143', 'Design of Embedded Systems'),
('CPE 201', 'Computer Systems Administration and Troubleshooting'),
('CPE 231', 'Systems Administration Fundamentals'),
('CPE 232', 'Manage Enterprise Servers'),
('CPE 243', 'Enterprise Security'),
('CPE 301', 'Database Management Systems 1'),
('CPE 302', 'Computer Networks 1'),
('CPE 303', 'Database Management Systems 2'),
('CPE 304', 'Computer Engineering Drafting and Design'),
('CPE 331', 'Principles of Robotics'),
('CPE 332', 'Programming Robots'),
('CPE 343', 'Robot Design'),
('CPE 401', 'Computer Networks 2'),
('CPE 402', 'Advanced Logic Circuits'),
('CPE 404', 'Computer Networks 3'),
('CPE 411', 'System Analysis Design'),
('CPE 500', 'On-the-Job Training'),
('CPE 501', 'Computer Network Design'),
('CPE 502', 'Plant Visits and Seminars for CPE'),
('CPE 503', 'Design Project 1'),
('CPE 504', 'Computer Systems Architecture'),
('CPE 505', 'Engineering Ethics and Computer Laws'),
('CPE 506', 'Software Engineering'),
('CPE 507', 'Operating Systems'),
('CPE 508', 'Design Project 2'),
('CS 100A', 'Fundamentals of Programming and Algorithm'),
('CS 201A', 'Data Structures and Algorithms Analysis'),
('ECE 001', 'Electronics Devices and Circuits'),
('ECE 004', 'Principles of Communications'),
('ECE 006', 'Feedback and Control Systems'),
('ECE 401', 'Signals, Spectra, Signal Processing'),
('ECE 402', 'Electronic Circuit Analysis and Design'),
('ECE 504A', 'Data Communications'),
('EE 002', 'Electrical Circuits 1'),
('EE 003', 'Electrical Circuits 2'),
('HUM 003', 'Ethics'),
('IE 001', 'Engineering Management'),
('IE 002', 'Safety Management'),
('IE 004', 'Engineering Entrepreneurship'),
('ITE 003A', 'Object-Oriented Programming'),
('MATH 010', 'Differential Equations'),
('MATH 011', 'Advanced Engineering Mathematics'),
('ME 005', 'Engineering Economy'),
('PHYS 002', 'Calculus-Based Physics 2'),
('SOCSC 004', 'General Psychology'),
('SOCSC 005', 'Life and Works of Rizal');

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
  `Status` varchar(15) NOT NULL,
  `CourseCode` varchar(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`FileID`, `FileType`, `FileName`, `FileSize`, `FileClass`, `DateUpload`, `TimeUpload`, `Week_num_for_WLAP`, `Status`, `CourseCode`, `UserID`) VALUES
(1, 'pdf', 'CPE 232 syllabus', 16, 'Syllabus', '2017-02-01', '10:06am', 0, 'Approved', 'CPE 232', 1),
(2, 'pdf', 'CPE 501 syllabus', 16, 'Syllabus', '2017-01-26', '07:00pm', 0, 'Approved', 'CPE 501', 1),
(3, 'pdf', 'CPE 401 Syllabus', 16, 'Syllabus', '2017-02-04', '08:30pm', 0, 'Approved', 'CPE 501', 1),
(4, 'pdf', 'Week 1', 16, 'WLAP', '2017-02-12', '12:06 PM', 1, 'Rejected', 'CPE 501', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
  `imageID` int(11) NOT NULL,
  `imageName` varchar(100) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(4, 'Friday', '1:30 pm', '4:30 pm', 'CPE51FC1', 'Q-5204', 'CPE 501', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`imageID`, `imagename`) VALUES
(1, 'upload_pic/thumbnail_1485669827.jpg'),
(2, 'upload_pic/thumbnail_1485669846.jpg'),
(3, 'upload_pic/thumbnail_1485829994.jpg'),
(4, 'upload_pic/thumbnail_1485831187.jpg'),
(5, 'upload_pic/thumbnail_1485831200.jpg'),
(6, 'upload_pic/thumbnail_1486812437.jpg'),
(7, 'upload_pic/thumbnail_1486812546.jpg'),
(8, 'upload_pic/thumbnail_1486812563.jpg');

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
(2, 'Venal', 'Ma.Cecilia', 'A', '09217189010', 'ceciliavenal@yahoo.com', 3, '');

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
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `userID_2` (`userID`);

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
  MODIFY `FileID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
