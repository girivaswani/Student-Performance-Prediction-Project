-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2021 at 02:26 PM
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
  `User` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`User`, `Password`) VALUES
('Girish', 'Girish'),
('Nishikant', 'Nishikant');

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
('D12B', 'CMPN'),
('D17B', 'CMPN');

-- --------------------------------------------------------

--
-- Table structure for table `relation`
--

CREATE TABLE `relation` (
  `Id` int NOT NULL,
  `teacher_id` int NOT NULL,
  `class_name` varchar(5) NOT NULL,
  `subject_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `relation`
--

INSERT INTO `relation` (`Id`, `teacher_id`, `class_name`, `subject_id`) VALUES
(1, 2, 'D12B', 5),
(2, 3, 'D12B', 1),
(3, 4, 'D12B', 3),
(4, 5, 'D12B', 2),
(5, 6, 'D12B', 4),
(6, 1, 'D17B', 6),
(7, 7, 'D17B', 9),
(8, 3, 'D17B', 7),
(9, 2, 'D17B', 8);

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
  `Higher` varchar(5) DEFAULT NULL,
  `Goout` int DEFAULT NULL,
  `Dalc` int DEFAULT NULL,
  `Walc` int DEFAULT NULL,
  `Health` int DEFAULT NULL,
  `Absences` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Student_Id`, `Name`, `Email`, `Password`, `Class`, `Roll_No`, `Gender`, `Locality`, `Family_Size`, `Pstatus`, `Medu`, `Fedu`, `Mjob`, `Fjob`, `Reason`, `Guardian`, `Traveltime`, `Studytime`, `Failures`, `Extrasup`, `Famsup`, `Activities`, `Internet`, `Relationship`, `Famrel`, `Freetime`, `Higher`, `Goout`, `Dalc`, `Walc`, `Health`, `Absences`) VALUES
(1, 'Girish Vaswani', '2018.girish.vaswani@ves.ac.in', 'Girish@123', 'D12B', 65, 'male', 'urban', '3', 'T', 4, 4, 'At Home', 'Other', 'reputaion', 'Other', 4, 3, 0, 'yes', '1', 'yes', 'yes', 'no', 5, 3, 'no', 2, 1, 1, 5, 0),
(2, 'Chetan Urkude', '2018.chetan.urkude@ves.ac.in', 'Chetan@123', 'D12B', 63, 'male', 'urban', '4', 'T', 4, 4, 'At Home', 'Other', 'reputaion', 'Other', 4, 4, 0, 'yes', '1', 'yes', 'yes', 'no', 5, 3, 'no', 1, 1, 1, 5, 0),
(3, 'Nishikant Patil', '2018.nishikant.patil@ves.ac.in', 'Nishikant', 'D12B', 46, 'male', 'urban', '4', 'T', 4, 4, 'At Home', 'Other', 'home', 'Other', 1, 1, 0, 'yes', '1', 'yes', 'yes', 'no', 5, 1, 'yes', 1, 1, 1, 4, 0),
(4, 'Aashish Vaswani', '2018.aashish.vaswani@ves.ac.in', 'Aashish', 'D12B', 64, 'male', 'rural', '4', 'T', 3, 4, 'At Home', 'Other', 'reputaion', 'Other', 4, 3, 2, 'no', '1', 'yes', 'yes', 'no', 4, 3, 'no', 2, 1, 1, 4, 2),
(5, 'Shubham Singh', '2017.shubham.singh@ves.ac.in', 'Shubham', 'D17B', 59, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Deepika ', '2017.deepika@ves.ac.in', 'Deepika', 'D17B', 1, 'female', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Parthesh Pawar', '2018.parthesh.pawar@ves.ac.in', 'Parthesh', 'D12B', 45, 'male', 'rural', '4', 'T', 4, 4, 'Teacher', 'Other', 'course', 'Other', 3, 3, 0, 'no', '1', 'yes', 'yes', 'yes', 4, 2, 'yes', 3, 2, 2, 4, 5),
(8, 'Kunal Kotkar', '2018.kunal.kotkar@ves.ac.in', 'Kunal', 'D12B', 30, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Sahil Lotya', '2018.sahil.lotya@ves.ac.in', 'Sahil', 'D12B', 33, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Ayush Wadhwa', '2018.ayush.wadhwa@ves.ac.in', 'Ayush', 'D12B', 69, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Anmol Devnani', '2018.anmol.devnani@ves.ac.in', 'Anmol', 'D12B', 15, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Laveen Dawani', '2018.laveen.dawani@ves.ac.in', 'Laveen', 'D12B', 9, 'male', 'rural', '7', 'T', 3, 4, 'At Home', 'Other', 'course', 'Other', 3, 3, 2, 'no', '1', 'yes', 'yes', 'no', 3, 2, 'yes', 3, 1, 1, 4, 5);

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
  `Pred_Mark` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stu_marks`
--

INSERT INTO `stu_marks` (`ID`, `Student_Id`, `Subject_id`, `Tut_Subject`, `Marks1`, `Marks2`, `Pred_Mark`) VALUES
(1, 1, 5, 'no', 12, 1, '[\'F\']'),
(2, 1, 1, 'yes', 13, 14, '[\'A\']'),
(3, 1, 3, 'no', 14, 12, '[\'A\']'),
(4, 1, 2, 'yes', 17, 19, '[\'O\']'),
(5, 1, 4, 'no', 13, 11, '[\'B\']'),
(6, 2, 5, 'no', 6, 6, '[\'F\']'),
(7, 2, 1, 'yes', 14, 16, '[\'O\']'),
(8, 2, 3, 'no', 10, 12, '[\'A\']'),
(9, 2, 2, 'yes', 17, 19, '[\'O\']'),
(10, 2, 4, 'no', 5, 5, '[\'F\']'),
(11, 3, 5, NULL, NULL, NULL, NULL),
(12, 3, 1, NULL, NULL, NULL, NULL),
(13, 3, 3, NULL, NULL, NULL, NULL),
(14, 3, 2, NULL, NULL, NULL, NULL),
(15, 3, 4, NULL, NULL, NULL, NULL),
(16, 4, 5, 'yes', 14, 18, '[\'O\']'),
(17, 4, 1, 'yes', 10, 12, '[\'A\']'),
(18, 4, 3, 'no', 8, 6, '[\'F\']'),
(19, 4, 2, 'yes', 17, 16, '[\'O\']'),
(20, 4, 4, 'no', 7, 12, '[\'A\']'),
(21, 5, 6, NULL, NULL, NULL, NULL),
(22, 5, 9, NULL, NULL, NULL, NULL),
(23, 5, 7, NULL, NULL, NULL, NULL),
(24, 5, 8, NULL, NULL, NULL, NULL),
(25, 6, 6, NULL, NULL, NULL, NULL),
(26, 6, 9, NULL, NULL, NULL, NULL),
(27, 6, 7, NULL, NULL, NULL, NULL),
(28, 6, 8, NULL, NULL, NULL, NULL),
(29, 7, 5, 'yes', 8, 10, '[\'B\']'),
(30, 7, 1, 'yes', 17, 19, '[\'O\']'),
(31, 7, 3, 'yes', 12, 14, '[\'A\']'),
(32, 7, 2, 'yes', 10, 15, '[\'A\']'),
(33, 7, 4, 'no', 16, 18, '[\'O\']'),
(34, 8, 5, NULL, NULL, NULL, NULL),
(35, 8, 1, NULL, NULL, NULL, NULL),
(36, 8, 3, NULL, NULL, NULL, NULL),
(37, 8, 2, NULL, NULL, NULL, NULL),
(38, 8, 4, NULL, NULL, NULL, NULL),
(39, 9, 5, NULL, NULL, NULL, NULL),
(40, 9, 1, NULL, NULL, NULL, NULL),
(41, 9, 3, NULL, NULL, NULL, NULL),
(42, 9, 2, NULL, NULL, NULL, NULL),
(43, 9, 4, NULL, NULL, NULL, NULL),
(44, 10, 5, NULL, NULL, NULL, NULL),
(45, 10, 1, NULL, NULL, NULL, NULL),
(46, 10, 3, NULL, NULL, NULL, NULL),
(47, 10, 2, NULL, NULL, NULL, NULL),
(48, 10, 4, NULL, NULL, NULL, NULL),
(49, 11, 5, NULL, NULL, NULL, NULL),
(50, 11, 1, NULL, NULL, NULL, NULL),
(51, 11, 3, NULL, NULL, NULL, NULL),
(52, 11, 2, NULL, NULL, NULL, NULL),
(53, 11, 4, NULL, NULL, NULL, NULL),
(54, 12, 5, 'yes', 18, 19, '[\'O\']'),
(55, 12, 1, 'no', 8, 5, '[\'F\']'),
(56, 12, 3, 'no', 14, 12, '[\'A\']'),
(57, 12, 2, 'yes', 10, 15, '[\'A\']'),
(58, 12, 4, 'yes', 16, 18, '[\'O\']');

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
(1, 'ML'),
(2, 'DWM'),
(3, 'SE'),
(4, 'SPCC'),
(5, 'CSS'),
(6, 'CC'),
(7, 'HMI'),
(8, 'DC'),
(9, 'NLP');

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
(1, 'Richard Joseph', 'richard.joseph@ves.ac.in', 'Richard'),
(2, 'Richa Sharma', 'richa.sharma@ves.ac.in', 'Richa'),
(3, 'Indu Dokare', 'indu.dokare@ves.ac.in', 'Indu'),
(4, 'Prena Solanke', 'prena.solanke@ves.ac.in', 'Prena'),
(5, 'Priya R L', 'priya.rl@ves.ac.in', 'Priya'),
(6, 'Rupali Hande', 'rupali.hande@ves.ac.in', 'Rupali'),
(7, 'Kajal Jewani', 'kajal.jewani@ves.ac.in', 'Kajal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_name`);

--
-- Indexes for table `relation`
--
ALTER TABLE `relation`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Class_Constraint` (`class_name`),
  ADD KEY `Subject_Constraint` (`subject_id`),
  ADD KEY `Teacher_Constraint` (`teacher_id`);

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
-- AUTO_INCREMENT for table `relation`
--
ALTER TABLE `relation`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Student_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stu_marks`
--
ALTER TABLE `stu_marks`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `Teacher_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
