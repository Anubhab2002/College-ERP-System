-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 06:16 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college-erp-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_name` varchar(150) NOT NULL,
  `admin_password` varchar(150) NOT NULL,
  `admin_email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_ID`, `admin_name`, `admin_password`, `admin_email`) VALUES
(1, 'Admin', 'admin@123', 'admin@iitkgp.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `appliedleave`
--

CREATE TABLE `appliedleave` (
  `leave_ID` int(11) NOT NULL,
  `prof_ID` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `course_ID` varchar(5) NOT NULL,
  `student_ID` varchar(5) NOT NULL,
  `days_present` int(11) NOT NULL,
  `days_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`course_ID`, `student_ID`, `days_present`, `days_total`) VALUES
('CS002', 'St003', 75, 100);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_ID` varchar(5) NOT NULL,
  `course_name` varchar(150) NOT NULL,
  `course_details` varchar(150) NOT NULL,
  `dept_ID` varchar(5) NOT NULL,
  `prof_ID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_ID`, `course_name`, `course_details`, `dept_ID`, `prof_ID`) VALUES
('CE001', 'Introduction to Civil Engineering', 'This course provides an overview of civil engineering concepts, including structures and materials.', 'CE', 'PK_CE'),
('CE002', 'Structural Analysis', 'This course covers the principles of structural analysis, including trusses and beams.', 'CE', 'VB_CE'),
('CE003', 'Transportation Engineering', 'This course covers the principles of transportation engineering, including traffic flow and network analysis.', 'CE', 'VB_CE'),
('CH001', 'Chemical Principles', 'This course covers the principles of chemistry, including atomic structure and chemical bonding.', 'CH', 'RS_CH'),
('CH002', 'Organic Chemistry', 'This course covers the principles of organic chemistry, including nomenclature and reaction mechanisms.', 'CH', 'RS_CH'),
('CH003', 'Physical Chemistry', 'This course covers advanced topics in physical chemistry, including quantum mechanics and thermodynamics.', 'CH', 'SK_CH'),
('CS001', 'Introduction to Computer Science', 'This course provides an overview of fundamental concepts in computer science.', 'CS', 'AC_CS'),
('CS002', 'Data Structures and Algorithms', 'This course covers advanced data structures and algorithms, including graph algorithms and dynamic programming.', 'CS', 'MK_CS'),
('CS003', 'Database Systems', 'This course covers advanced topics in database systems, including SQL and NoSQL databases.', 'CS', 'PK_CS'),
('CS004', 'Artificial Intelligence', 'This course covers advanced topics in artificial intelligence, including machine learning and natural language processing.', 'CS', 'SM_CS'),
('EC001', 'Introduction to Electronics', 'This course covers basic electronic components and circuits.', 'EC', 'MK_EC'),
('EC002', 'Digital Electronics', 'This course covers advanced topics in digital electronics and logic design.', 'EC', 'AS_EC'),
('EC003', 'Microelectronics', 'This course covers the principles of microelectronics and integrated circuits.', 'EC', 'AS_EC'),
('EE001', 'Introduction to Electrical Engineering', 'This course provides an overview of electrical circuits and systems.', 'EE', 'GK_EE'),
('EE002', 'Circuits and Electronics', 'This course covers advanced topics in electrical circuits and electronics.', 'EE', 'MS_EE'),
('EE003', 'Electromagnetic Fields and Waves', 'This course covers the principles of electromagnetic fields and waves.', 'EE', 'RK_EE'),
('MA001', 'Calculus I', 'This course covers the basics of calculus, including limits, derivatives, and integrals.', 'MA', 'NS_MA'),
('MA002', 'Calculus II', 'This course covers advanced topics in calculus, including multivariable calculus and differential equations.', 'MA', 'RS_MA'),
('MA003', 'Linear Algebra', 'This course covers the principles of linear algebra, including matrices and linear transformations.', 'MA', 'SK_MA'),
('MA004', 'Probability and Statistics', 'This course covers the principles of probability and statistics', 'MA', 'VS_MA'),
('MA092', 'Measure theory', 'This is a pure maths course on Lebesgue Measure', 'MA', 'RS_MA'),
('MA262', 'Real Analysis', 'This is a pure maths course on Real Analysis', 'MA', 'RS_MA'),
('MA874', 'Mathematical Modelling', 'Course on modelling of biological, physical and chemical systems', 'MA', 'SK_MA'),
('ME001', 'Mechanics', 'This course covers the principles of mechanics, including kinematics and dynamics.', 'ME', 'PK_ME'),
('ME002', 'Thermodynamics', 'This course covers the principles of thermodynamics and energy systems.', 'ME', 'PS_ME'),
('ME003', 'Fluid Mechanics', 'This course covers the principles of fluid mechanics and fluid dynamics.', 'ME', 'PS_ME');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_name` varchar(150) NOT NULL,
  `dept_ID` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_name`, `dept_ID`) VALUES
('Civil Engineering', 'CE'),
('Chemical Engineering', 'CH'),
('Computer Science and Engineering', 'CS'),
('Electronics and Communication Engineering', 'EC'),
('Electrical Engineering', 'EE'),
('Mathematics', 'MA'),
('Mechanical Engineering', 'ME');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `course_ID` varchar(5) NOT NULL,
  `student_ID` varchar(5) NOT NULL,
  `grades` int(11) DEFAULT NULL,
  `doe` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`course_ID`, `student_ID`, `grades`, `doe`, `status`) VALUES
('CS001', 'St004', 8, '2023-04-09', 'Approved'),
('CS002', 'St003', 6, '2023-04-08', 'Approved'),
('CS004', 'St003', NULL, '2023-04-09', 'Pending'),
('MA001', 'St003', 6, '2023-04-08', 'Denied');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_ID` int(11) NOT NULL,
  `course_ID` varchar(5) NOT NULL,
  `exam_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_ID`, `course_ID`, `exam_date`) VALUES
(1, 'MA001', '2023-05-01'),
(2, 'CS002', '2023-03-28'),
(3, 'CS002', '2023-03-28'),
(4, 'CS002', '2023-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_ID` int(11) NOT NULL,
  `person_ID` varchar(5) NOT NULL,
  `feedback_details` varchar(150) NOT NULL,
  `feedback_to` varchar(150) NOT NULL,
  `feedback_reply` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_ID`, `person_ID`, `feedback_details`, `feedback_to`, `feedback_reply`) VALUES
(3, 'MK_CS', 'I love this college', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaveapp`
--

CREATE TABLE `leaveapp` (
  `leave_ID` int(11) NOT NULL,
  `prof_ID` varchar(5) NOT NULL,
  `status` varchar(100) NOT NULL,
  `reason` varchar(150) NOT NULL,
  `days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaveapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--

CREATE TABLE `professor` (
  `prof_ID` varchar(5) NOT NULL,
  `dept_ID` varchar(5) NOT NULL,
  `prof_name` varchar(150) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Table containing information about professors';

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`prof_ID`, `dept_ID`, `prof_name`, `password`) VALUES
('AC_CS', 'CS', 'Arun Chauhan', 'pass'),
('AD_CS', 'CS', 'Anish Dey', 'pass'),
('AS_CS', 'CS', 'Arijit Singh', 'tuvYUK57Ps'),
('AS_EC', 'EC', 'Anjali Singh', ''),
('GK_EE', 'EE', 'Gaurav Kumar', ''),
('MK_CS', 'CS', 'Manish Kumar', 'abc'),
('MK_EC', 'EC', 'Manoj Kumar', ''),
('MS_EE', 'EE', 'Mukesh Sharma', ''),
('NS_MA', 'MA', 'Neha Sharma', 'pass'),
('PK_CE', 'CE', 'Pankaj Kumar', ''),
('PK_CS', 'CS', 'Poonam Kashyap', ''),
('PK_ME', 'ME', 'Preeti Kumari', ''),
('PS_ME', 'ME', 'Prakash Singh', ''),
('RD_CS', 'CS', 'Rohan Das', ''),
('RK_EE', 'EE', 'Ravi Kumar', ''),
('RS_CH', 'CH', 'Rohit Singh', ''),
('RS_MA', 'MA', 'Rahul Sharma', ''),
('SK_CH', 'CH', 'Sangeeta Kumari', ''),
('SK_MA', 'MA', 'Sushant Kumar', ''),
('SM_CS', 'CS', 'Shalini Mishra', ''),
('SS_EE', 'EE', 'Smita Singh', ''),
('VB_CE', 'CE', 'Vikas Bhati', ''),
('VS_MA', 'MA', 'Vivek Singh', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_ID` varchar(5) NOT NULL,
  `dept_ID` varchar(5) NOT NULL,
  `student_name` varchar(150) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL DEFAULT current_timestamp(),
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_ID`, `dept_ID`, `student_name`, `dob`, `doj`, `password`) VALUES
('St002', 'MA', 'Anubhab Mandal', '2008-06-15', '2023-04-07', ''),
('St003', 'MA', 'Rounak Das', '2001-01-30', '2023-04-07', 'pass'),
('St004', 'CS', 'Anubhab M', '2002-09-16', '2023-04-09', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `appliedleave`
--
ALTER TABLE `appliedleave`
  ADD PRIMARY KEY (`leave_ID`),
  ADD KEY `fk11` (`prof_ID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`course_ID`,`student_ID`),
  ADD KEY `fk_8` (`student_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_ID`),
  ADD KEY `fk2` (`dept_ID`),
  ADD KEY `fk3` (`prof_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_ID`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`course_ID`,`student_ID`),
  ADD KEY `fk_5` (`student_ID`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_ID`),
  ADD KEY `fk13` (`course_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_ID`);

--
-- Indexes for table `leaveapp`
--
ALTER TABLE `leaveapp`
  ADD PRIMARY KEY (`leave_ID`),
  ADD KEY `fk12` (`prof_ID`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`prof_ID`),
  ADD KEY `fk1` (`dept_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_ID`),
  ADD KEY `fk_6` (`dept_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appliedleave`
--
ALTER TABLE `appliedleave`
  MODIFY `leave_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `leaveapp`
--
ALTER TABLE `leaveapp`
  MODIFY `leave_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appliedleave`
--
ALTER TABLE `appliedleave`
  ADD CONSTRAINT `fk11` FOREIGN KEY (`prof_ID`) REFERENCES `professor` (`prof_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_8` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_9` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`dept_ID`) REFERENCES `department` (`dept_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk3` FOREIGN KEY (`prof_ID`) REFERENCES `professor` (`prof_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `fk_4` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_5` FOREIGN KEY (`student_ID`) REFERENCES `student` (`student_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `fk13` FOREIGN KEY (`course_ID`) REFERENCES `course` (`course_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `leaveapp`
--
ALTER TABLE `leaveapp`
  ADD CONSTRAINT `fk12` FOREIGN KEY (`prof_ID`) REFERENCES `professor` (`prof_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`dept_ID`) REFERENCES `department` (`dept_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_6` FOREIGN KEY (`dept_ID`) REFERENCES `department` (`dept_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
