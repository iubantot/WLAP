-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2017 at 05:41 PM
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
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseCode` varchar(45) NOT NULL,
  `CourseOrder` int(11) NOT NULL,
  `CourseName` varchar(145) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseCode`, `CourseOrder`, `CourseName`) VALUES
('CE 001', 1, 'Statics of Rigid Bodies'),
('CE 002', 2, 'Dynamics of Rigid Bodies'),
('CE 003A', 3, 'Mechanics of Deformable Bodies'),
('CHEM 002', 4, 'Environmental Engineering'),
('COE 001', 5, 'Engineering Orientation'),
('COE 002A', 6, 'Introduction to Intellectual Property'),
('CPE 001', 7, 'Computer Fundamentals'),
('CPE 003', 8, 'Computer-Aided Drafting'),
('CPE 004', 9, 'Logic Circuits and Switching Theory'),
('CPE 005', 10, 'Computer System Organization with Assembly Language'),
('CPE 006', 11, 'Microprocessor Systems'),
('CPE 131', 12, 'Principles of Embedded Systems'),
('CPE 132', 13, 'Systems Architecture for Embedded Systems'),
('CPE 143', 14, 'Design of Embedded Systems'),
('CPE 201', 15, 'Computer Systems Administration and Troubleshooting'),
('CPE 231', 16, 'Systems Administration Fundamentals'),
('CPE 232', 17, 'Manage Enterprise Servers'),
('CPE 243', 18, 'Enterprise Security'),
('CPE 301', 19, 'Database Management Systems 1'),
('CPE 302', 20, 'Computer Networks 1'),
('CPE 303', 21, 'Database Management Systems 2'),
('CPE 304', 22, 'Computer Engineering Drafting and Design'),
('CPE 331', 23, 'Principles of Robotics'),
('CPE 332', 24, 'Programming Robots'),
('CPE 343', 25, 'Robot Design'),
('CPE 401', 26, 'Computer Networks 2'),
('CPE 402', 27, 'Advanced Logic Circuits'),
('CPE 404', 28, 'Computer Networks 3'),
('CPE 411', 29, 'System Analysis Design'),
('CPE 500', 30, 'On-the-Job Training'),
('CPE 501', 31, 'Computer Network Design'),
('CPE 502', 32, 'Plant Visits and Seminars for CPE'),
('CPE 503', 33, 'Design Project 1'),
('CPE 504', 34, 'Computer Systems Architecture'),
('CPE 505', 35, 'Engineering Ethics and Computer Laws'),
('CPE 506', 36, 'Software Engineering'),
('CPE 507', 37, 'Operating Systems'),
('CPE 508', 38, 'Design Project 2'),
('CS 100A', 39, 'Fundamentals of Programming and Algorithm'),
('CS 201A', 40, 'Data Structures and Algorithms Analysis'),
('ECE 001', 41, 'Electronics Devices and Circuits'),
('ECE 004', 42, 'Principles of Communications'),
('ECE 006', 43, 'Feedback and Control Systems'),
('ECE 401', 44, 'Signals, Spectra, Signal Processing'),
('ECE 402', 45, 'Electronic Circuit Analysis and Design'),
('ECE 504A', 46, 'Data Communications'),
('EE 002', 47, 'Electrical Circuits 1'),
('EE 003', 48, 'Electrical Circuits 2'),
('HUM 003', 49, 'Ethics'),
('IE 001', 50, 'Engineering Management'),
('IE 002', 51, 'Safety Management'),
('IE 004', 52, 'Engineering Entrepreneurship'),
('ITE 003A', 53, 'Object-Oriented Programming'),
('MATH 010', 54, 'Differential Equations'),
('MATH 011', 55, 'Advanced Engineering Mathematics'),
('ME 005', 56, 'Engineering Economy'),
('PHYS 002', 57, 'Calculus-Based Physics 2'),
('SOCSC 004', 58, 'General Psychology'),
('SOCSC 005', 59, 'Life and Works of Rizal');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

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
(8, 'upload_pic/thumbnail_1486812563.jpg'),
(9, 'upload_pic/thumbnail_1487763609.jpg'),
(10, 'upload_pic/thumbnail_1488211215.jpg');

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
  `ImageName` varchar(100) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `TypeofUserNum` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `LastName`, `FirstName`, `MiddleName`, `ContactNum`, `Email`, `ImageName`, `Username`, `Password`, `TypeofUserNum`) VALUES
(1, 'Hular', 'Lord James', 'Tan', '09753181657', 'hularlordjames@yahoo.com', 'upload_pic/thumbnail_1488211639.jpg', 'ljthular', 'hular', 1),
(2, 'Venal', 'Ma.Cecilia', 'A', '09217189010', 'ceciliavenal@yahoo.com', '', 'mcvenal', 'venal', 2),
(3, 'Alzona', 'Allysa Marie', 'O', '09061690218', 'allysaalzona@gmail.com', 'upload_pic/thumbnail_1488212295.jpg', 'amoalzona', 'Alzona', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CourseCode`),
  ADD UNIQUE KEY `CourseOrder` (`CourseOrder`);

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
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CourseOrder` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
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
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
