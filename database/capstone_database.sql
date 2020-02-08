-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2020 at 03:28 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `capstone_table` 
--
use Capstone_Database;

CREATE TABLE `capstone_table` (
  `cp_supervisor` int(11) NOT NULL,
  `cp_student` int(11) NOT NULL,
  `cp_project` int(11) NOT NULL,
  `cp_startdate` date NOT NULL,
  `cp_enddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dp_id` int(11) NOT NULL,
  `dp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `ft_person` int(11) NOT NULL,
  `ft_dept` int(11) NOT NULL,
  `ft_interest` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `mj_id` int(11) NOT NULL,
  `mj_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `mt_id` int(11) NOT NULL,
  `mt_project` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

-- CREATE TABLE `person` (
--   `ps_id` int(11) NOT NULL,
--   `ps_fname` varchar(50) NOT NULL,
--   `ps_lname` varchar(50) NOT NULL,
--   `ps_gender` enum('Male','Female') NOT NULL,
--   `ps_email` varchar(70) NOT NULL,
--   `ps_pnumber` varchar(20) NOT NULL,
--   `ps_pd` varchar(150) NOT NULL,
--   `ps_cat` enum('student','faculty','coordinator') NOT NULL,
--   `ps_role` int(11) NOT NULL
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- -- --------------------------------------------------------

--
-- Table structure for table `person_meeting`
--

CREATE TABLE `person_meeting` (
  `mt_id` int(11) NOT NULL,
  `mt_date` date NOT NULL,
  `mt_venue` varchar(50) NOT NULL,
  `mt_agenda` text NOT NULL,
  `mt_challenges` text NOT NULL,
  `mt_sumofprogress` text NOT NULL,
  `mt_objperiod` text NOT NULL,
  `mt_objnext` text NOT NULL,
  `mt_nextdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `pj_id` int(11) NOT NULL,
  `pj_user` int(11) NOT NULL,
  `pj_year` date NOT NULL,
  `pj_title` varchar(150) NOT NULL,
  `pj_desc` text NOT NULL,
  `pj_type` enum('thesis','applied','entrepreneurship') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `st_id` varchar(10) NOT NULL,
  `st_user` int(11) NOT NULL,
  `st_yeargroup` int(4) NOT NULL,
  `st_major` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capstone_table`
--
ALTER TABLE `capstone_table`
  ADD KEY `cp_project` (`cp_project`),
  ADD KEY `cp_student` (`cp_student`),
  ADD KEY `cp_supervisor` (`cp_supervisor`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dp_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD KEY `ft_person` (`ft_person`),
  ADD KEY `ft_dept` (`ft_dept`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`mj_id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `mt_project` (`mt_project`);

--
-- Indexes for table `person`
--
-- ALTER TABLE `person`
--   ADD PRIMARY KEY (`ps_id`),
--   ADD UNIQUE KEY `ps_email` (`ps_email`);

--
-- Indexes for table `person_meeting`
--
ALTER TABLE `person_meeting`
  ADD KEY `mt_id` (`mt_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`pj_id`),
  ADD KEY `pj_user` (`pj_user`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `st_user` (`st_user`),
  ADD KEY `st_major` (`st_major`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `mj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- -- AUTO_INCREMENT for table `person`
-- --
-- ALTER TABLE `person`
--   MODIFY `ps_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `pj_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capstone_table`
--
ALTER TABLE `capstone_table`
  ADD CONSTRAINT `capstone_table_ibfk_1` FOREIGN KEY (`cp_project`) REFERENCES `project` (`pj_id`),
  ADD CONSTRAINT `capstone_table_ibfk_2` FOREIGN KEY (`cp_student`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `capstone_table_ibfk_3` FOREIGN KEY (`cp_supervisor`) REFERENCES `users` (`userId`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`ft_user`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`ft_dept`) REFERENCES `department` (`dp_id`);

--
-- Constraints for table `meeting`
--
ALTER TABLE `meeting`
  ADD CONSTRAINT `meeting_ibfk_1` FOREIGN KEY (`mt_project`) REFERENCES `project` (`pj_id`);

--
-- Constraints for table `person_meeting`
--
ALTER TABLE `person_meeting`
  ADD CONSTRAINT `person_meeting_ibfk_1` FOREIGN KEY (`mt_id`) REFERENCES `meeting` (`mt_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`pj_user`) REFERENCES `users` (`userId`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`st_user`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`st_major`) REFERENCES `major` (`mj_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
