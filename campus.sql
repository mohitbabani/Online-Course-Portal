-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 18, 2019 at 10:01 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admina`
--

CREATE TABLE `admina` (
  `user_id` varchar(255) DEFAULT NULL,
  `passworde` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admina`
--

INSERT INTO `admina` (`user_id`, `passworde`) VALUES
('root', 'negi'),
('root', 'negi'),
('admin', 'nith@123');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `course_id` varchar(20) DEFAULT NULL,
  `assignment_id` varchar(20) NOT NULL,
  `details` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`course_id`, `assignment_id`, `details`) VALUES
('csd312', '1', 'asd'),
('ds', '2', 'wer');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `dept_id` varchar(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `sem` varchar(20) DEFAULT NULL,
  `teacher` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`dept_id`, `course_id`, `course_name`, `sem`, `teacher`) VALUES
('CSE', 'csd311', 'MAS', '5th', 'CS212'),
('CSE', 'csd312', 'ADA', '5th', 'fac2'),
('CSE', 'ds', 'adfds', '5th', 'fac2'),
('CE', 'Test', 'Testing', '7th', 'CS212');

-- --------------------------------------------------------

--
-- Table structure for table `courseenroll`
--

CREATE TABLE `courseenroll` (
  `reg` varchar(20) NOT NULL,
  `cour` varchar(20) NOT NULL,
  `status` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courseenroll`
--

INSERT INTO `courseenroll` (`reg`, `cour`, `status`) VALUES
('175002', 'csd311', '1'),
('175002', 'csd312', '1'),
('17519', 'csd311', '1'),
('17519', 'csd312', '1'),
('17560', 'csd311', '1'),
('17560', 'csd312', '1'),
('17560', 'ds', '1'),
('17586', 'csd311', '1'),
('17586', 'csd312', '1'),
('17586', 'ds', '0'),
('908', 'csd311', '0'),
('908', 'csd312', '0'),
('908', 'ds', '0'),
('test', 'Test', '1'),
('test3', 'csd311', '0'),
('test3', 'csd312', '0'),
('test3', 'ds', '0'),
('tests', 'csd311', '1'),
('tests', 'csd312', '1');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` varchar(20) NOT NULL,
  `dept_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`) VALUES
('CE', 'CIVIL'),
('CSE', 'COMPUTER SCIENCE'),
('ECE', 'ELECRONICS'),
('EEE', 'ELECTRICAL'),
('Test', 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `given`
--

CREATE TABLE `given` (
  `reg` varchar(20) NOT NULL,
  `assignment_id` varchar(20) NOT NULL,
  `statu` varchar(20) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `given`
--

INSERT INTO `given` (`reg`, `assignment_id`, `statu`, `file_name`) VALUES
('908', '1', '1', 'asd.php'),
('908', '2', '1', 'edit');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `passwords` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `fname`, `designation`, `dept`, `passwords`) VALUES
('CS212', 'XYZ', 'DEAN', 'CSE', 'nith@123'),
('fac2', 'unknown', 'vice dean', 'CSE', 'nith@123');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `cursem` varchar(20) NOT NULL DEFAULT 'NULL',
  `createion_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`cursem`, `createion_date`) VALUES
('3rd', '2019-11-12 02:24:18'),
('5th', '2019-11-12 02:23:58'),
('7th', '2019-11-12 22:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll` varchar(20) NOT NULL,
  `passwords` varchar(20) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `year_enrolled` varchar(20) NOT NULL,
  `dept_id` varchar(20) NOT NULL,
  `verify` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `passwords`, `fname`, `gender`, `year_enrolled`, `dept_id`, `verify`) VALUES
('17500', 'nith@123', 'ASD', 'MALE', '2017', 'CSE', '1'),
('175002', 'nith@123', 'UNKNOWN XYZ', 'MALE', '2017', 'CSE', '1'),
('17518', 'nith@123', 'Harshit', 'MALE', '2017', 'CSE', '1'),
('17519', 'nith@123', 'Arvind negi', 'MALE', '2017', 'CSE', '1'),
('17544', 'nith@123', 'Arvind singh', 'MALE', '2017', 'CSE', '1'),
('17560', 'NITH@123', 'ASHISH', 'MALE', '2017', 'CSE', '1'),
('17586', '123', 'XYZE', 'MALE', '2017', 'CSE', '1'),
('17590', 'nith@123', 'dinesh', 'MALE', '2017', 'CSE', '1'),
('908', 'nith@123', 'exw', 'MALE', '2017', 'CSE', '1'),
('test', 'nith@123', 'Tester', 'MALE', '2017', 'CSE', '1'),
('test3', 'nith@123', 'final', 'MALE', '2017', 'CSE', '1'),
('tests', 'nith@123', 'test2', 'MALE', '2017', 'CSE', '1');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `reg` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`reg`, `status`) VALUES
('17519', '1'),
('17590', '1'),
('17518', '1'),
('17544', '1'),
('17500', '1'),
('175002', '1'),
('test', '1'),
('tests', '1'),
('17560', '1'),
('17586', '1'),
('test3', '1'),
('908', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `dept_id` (`dept_id`),
  ADD KEY `sem` (`sem`),
  ADD KEY `teacher` (`teacher`);

--
-- Indexes for table `courseenroll`
--
ALTER TABLE `courseenroll`
  ADD PRIMARY KEY (`reg`,`cour`),
  ADD KEY `cour` (`cour`),
  ADD KEY `reg` (`reg`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `given`
--
ALTER TABLE `given`
  ADD PRIMARY KEY (`reg`,`assignment_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `dept` (`dept`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`cursem`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD KEY `reg` (`reg`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `assignment_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`sem`) REFERENCES `semester` (`cursem`),
  ADD CONSTRAINT `course_ibfk_5` FOREIGN KEY (`teacher`) REFERENCES `instructor` (`instructor_id`),
  ADD CONSTRAINT `course_ibfk_6` FOREIGN KEY (`teacher`) REFERENCES `instructor` (`instructor_id`),
  ADD CONSTRAINT `course_ibfk_7` FOREIGN KEY (`teacher`) REFERENCES `instructor` (`instructor_id`),
  ADD CONSTRAINT `course_ibfk_8` FOREIGN KEY (`teacher`) REFERENCES `instructor` (`instructor_id`);

--
-- Constraints for table `courseenroll`
--
ALTER TABLE `courseenroll`
  ADD CONSTRAINT `courseenroll_ibfk_1` FOREIGN KEY (`cour`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `courseenroll_ibfk_2` FOREIGN KEY (`reg`) REFERENCES `student` (`roll`);

--
-- Constraints for table `given`
--
ALTER TABLE `given`
  ADD CONSTRAINT `given_ibfk_1` FOREIGN KEY (`reg`) REFERENCES `student` (`roll`),
  ADD CONSTRAINT `given_ibfk_2` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`assignment_id`);

--
-- Constraints for table `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`dept`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);

--
-- Constraints for table `verify`
--
ALTER TABLE `verify`
  ADD CONSTRAINT `verify_ibfk_1` FOREIGN KEY (`reg`) REFERENCES `student` (`roll`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
