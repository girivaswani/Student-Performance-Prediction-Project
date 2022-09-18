-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 01:41 PM
-- Server version: 8.0.19
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Admin_id` int NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_name` varchar(5) NOT NULL,
  `branch` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_name`, `branch`) VALUES
('D11A', 'EXTC'),
('D12A', 'CMPN'),
('D12B', 'CMPN'),
('D14', 'ETRX'),
('D15', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `teacher_id` int NOT NULL,
  `class_name` varchar(5) NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`teacher_id`, `class_name`, `subject_id`) VALUES
(1, 'D12A', 1),
(2, 'D12B', 2),
(6, 'D14', 3),
(5, 'D15', 4),
(4, 'D11A', 5),
(2, 'D12A', 3),
(5, 'D12B', 5),
(4, 'D12B', 4);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Student_Id` int NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Class` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Roll_No` int NOT NULL,
  `Gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Locality` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Family_Size` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Pstatus` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Medu` int DEFAULT NULL,
  `Fedu` int DEFAULT NULL,
  `Mjob` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Fjob` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Reason` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Guardian` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Traveltime` int DEFAULT NULL,
  `Studytime` int DEFAULT NULL,
  `Failures` int DEFAULT NULL,
  `Extrasup` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Famsup` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Activities` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Internet` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Relationship` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Famrel` int DEFAULT NULL,
  `Freetime` int DEFAULT NULL,
  `Goout` int DEFAULT NULL,
  `Dalc` int DEFAULT NULL,
  `Walc` int DEFAULT NULL,
  `Health` int DEFAULT NULL,
  `Absences` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_Id`, `Name`, `Email`, `Password`, `Class`, `Roll_No`, `Gender`, `Locality`, `Family_Size`, `Pstatus`, `Medu`, `Fedu`, `Mjob`, `Fjob`, `Reason`, `Guardian`, `Traveltime`, `Studytime`, `Failures`, `Extrasup`, `Famsup`, `Activities`, `Internet`, `Relationship`, `Famrel`, `Freetime`, `Goout`, `Dalc`, `Walc`, `Health`, `Absences`) VALUES
(1, 'Girish Vaswani', '2018.girish.vaswani@ves.ac.in', 'Girish', 'D12B', 65, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Chetan Urkude', '2018.chetan.urkude@ves.ac.in', 'Chetan', 'D12A', 63, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Nishikant Patil', '2018.nishikant.patil@ves.ac.in', 'Nishikant', 'D11A', 46, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Aashish Vaswani', '2018.aashish.vaswani@ves.ac.in', 'Aashish', 'D15', 64, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Karan Sachdev', '2018.karan.sachdev@ves.ac.in', 'Karan', 'D14', 50, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Neeraj Ochani', '2018.neeraj.ochani@ves.ac.in', 'Neeraj', 'D12B', 45, 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stu_marks`
--

CREATE TABLE `stu_marks` (
  `ID` int NOT NULL,
  `Student_Id` int NOT NULL,
  `Subject_id` int NOT NULL,
  `Tut_Subject` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Marks1` int DEFAULT NULL,
  `Marks2` int DEFAULT NULL,
  `Pred_Mark` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stu_marks`
--

INSERT INTO `stu_marks` (`ID`, `Student_Id`, `Subject_id`, `Tut_Subject`, `Marks1`, `Marks2`, `Pred_Mark`) VALUES
(1, 1, 2, 'yes', 12, 12, NULL),
(2, 1, 5, 'yes', 14, 14, NULL),
(3, 1, 4, 'yes', 12, 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int NOT NULL,
  `subject_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`) VALUES
(1, 'Python'),
(2, 'Java'),
(3, 'AOA'),
(4, 'SPA'),
(5, 'Microprocessor');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `Teacher_id` int NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`Teacher_id`, `Name`, `Email`, `Password`) VALUES
(1, 'Richa Sharma', 'richa.sharma@ves.ac.in', 'RIcha'),
(2, 'Mansi Talreja', 'mansi.talreja@ves.ac.in', 'Mansi'),
(4, 'Richard Joseph', 'richard.joseph@ves.ac.in', 'Richard'),
(5, 'Kajal Jewani', 'kajal.jewani@ves.ac.in', 'Kajal'),
(6, 'Lifna C S', 'lifna.cs@ves.ac.in', 'Lifna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_name`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD KEY `Teacher_Constraint` (`teacher_id`),
  ADD KEY `Subject_Constraint` (`subject_id`),
  ADD KEY `Class_Constraint` (`class_name`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Student_Id`),
  ADD KEY `Class_Constraint_1` (`Class`);

--
-- Indexes for table `stu_marks`
--
ALTER TABLE `stu_marks`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `stu_marks_ibfk_1` (`Student_Id`),
  ADD KEY `subject_constraint_1` (`Subject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`Teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Admin_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stu_marks`
--
ALTER TABLE `stu_marks`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `relation`
--
ALTER TABLE `relation`
  ADD CONSTRAINT `Class_Constraint` FOREIGN KEY (`class_name`) REFERENCES `class` (`class_name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Subject_Constraint` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Teacher_Constraint` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`Teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `Class_Constraint_1` FOREIGN KEY (`Class`) REFERENCES `class` (`class_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stu_marks`
--
ALTER TABLE `stu_marks`
  ADD CONSTRAINT `stu_marks_ibfk_1` FOREIGN KEY (`Student_Id`) REFERENCES `student` (`Student_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `subject_constraint_1` FOREIGN KEY (`Subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
