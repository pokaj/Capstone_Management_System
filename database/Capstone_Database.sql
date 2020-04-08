-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 08, 2020 at 12:26 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Capstone_Database`
--

-- --------------------------------------------------------

--
-- Table structure for table `capstone_table`
--

CREATE TABLE `capstone_table` (
  `cp_supervisor` int(11) NOT NULL,
  `cp_student` int(11) NOT NULL,
  `cp_project` int(11) NOT NULL,
  `cp_startdate` date DEFAULT NULL,
  `cp_enddate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `capstone_table`
--

INSERT INTO `capstone_table` (`cp_supervisor`, `cp_student`, `cp_project`, `cp_startdate`, `cp_enddate`) VALUES
(12, 13, 3, '2020-04-07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_Id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `student_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_Id`, `department_name`, `student_limit`) VALUES
(1, 'Humanities\r\n& Social Sciences', 12),
(2, 'Business\r\nAdministration', 12),
(3, 'Computer Science &\r\nInformation Systems', 12),
(4, 'Engineering', 12);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_Id` int(11) NOT NULL,
  `faculty_dept` int(11) DEFAULT NULL,
  `faculty_interests` text DEFAULT NULL,
  `number_of_students` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_Id`, `faculty_dept`, `faculty_interests`, `number_of_students`) VALUES
(1, 1, NULL, NULL),
(5, NULL, NULL, NULL),
(6, NULL, NULL, NULL),
(9, NULL, NULL, NULL),
(11, 1, NULL, 0),
(12, 1, NULL, 0),
(14, 2, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty_student`
--

CREATE TABLE `faculty_student` (
  `student_Id` int(11) NOT NULL,
  `faculty_Id` int(11) NOT NULL,
  `project_Id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty_student`
--

INSERT INTO `faculty_student` (`student_Id`, `faculty_Id`, `project_Id`, `status`) VALUES
(13, 12, 3, 'matched'),
(13, 12, 3, 'matched'),
(13, 12, 3, 'matched');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_Id` int(11) NOT NULL,
  `major_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_Id`, `major_name`) VALUES
(1, 'BSc. Business Administration'),
(2, 'BSc. Computer Science'),
(3, 'BSc. Management Information Systems'),
(4, 'BSc. Computer Engineering\r\n'),
(5, 'BSc. Electrical & Electronic Engineering\r\n'),
(6, 'BSc. Mechanical Engineering\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `mt_id` int(11) NOT NULL,
  `mt_date` datetime NOT NULL,
  `mt_project` int(11) NOT NULL,
  `mt_supervisor` int(11) NOT NULL,
  `mt_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`mt_id`, `mt_date`, `mt_project`, `mt_supervisor`, `mt_student`) VALUES
(1, '2020-04-07 22:05:20', 3, 12, 13),
(2, '2020-04-07 22:09:57', 3, 12, 13);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_08_190708_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2936f3f1-5a24-4f70-845b-a9bf81f28f3d', 'App\\Notifications\\AppliedForProject', 'App\\User', 1, '{\"appliedTime\":\"2020-03-21T15:54:43.381424Z\"}', NULL, '2020-03-21 15:54:43', '2020-03-21 15:54:43'),
('9d87e01f-7db0-4e46-a5c1-cab336252aa9', 'App\\Notifications\\AppliedForProject', 'App\\User', 1, '{\"appliedTime\":\"2020-03-22T08:46:01.606888Z\"}', NULL, '2020-03-22 08:46:01', '2020-03-22 08:46:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pending_request`
--

CREATE TABLE `pending_request` (
  `faculty_Id` int(11) NOT NULL,
  `student_Id` int(11) NOT NULL,
  `project_Id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `person_meeting`
--

CREATE TABLE `person_meeting` (
  `mt_id` int(11) NOT NULL,
  `mt_date` date NOT NULL,
  `mt_objective` text NOT NULL,
  `mt_challenges` text NOT NULL,
  `mt_sumofprogress` text NOT NULL,
  `mt_objnxtperiod` text NOT NULL,
  `mt_nextDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person_meeting`
--

INSERT INTO `person_meeting` (`mt_id`, `mt_date`, `mt_objective`, `mt_challenges`, `mt_sumofprogress`, `mt_objnxtperiod`, `mt_nextDate`) VALUES
(2, '2020-04-07', 'skfskdnfksn', 'nkdsfnksdnfkn', 'ndsknfsdkfnk', 'knskfgnk', '2020-04-16');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_Id` int(11) NOT NULL,
  `project_user` int(11) NOT NULL,
  `project_date` datetime NOT NULL,
  `project_title` text NOT NULL,
  `project_field` text NOT NULL,
  `project_type` enum('uncertain','applied','thesis','entrepreneurship') NOT NULL,
  `project_desc` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_Id`, `project_user`, `project_date`, `project_title`, `project_field`, `project_type`, `project_desc`, `status`) VALUES
(3, 13, '2020-04-07 22:02:25', 'philip', 'philip', 'uncertain', 'philip', 'taken');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_user_id` int(11) NOT NULL,
  `student_Id` int(11) DEFAULT NULL,
  `student_yeargroup` int(5) DEFAULT NULL,
  `student_major` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_user_id`, `student_Id`, `student_yeargroup`, `student_major`) VALUES
(4, NULL, NULL, NULL),
(7, NULL, NULL, NULL),
(8, NULL, NULL, NULL),
(10, NULL, NULL, NULL),
(13, 524323, 2020, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(20) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('faculty','student','supervisor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `first_name`, `last_name`, `gender`, `username`, `email`, `phone`, `category`, `user_role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Philip', 'Owusu-Afriyie', 'Male', 'Philip', 'philip.afriyie@ashesi.edu.gh', '0203045812', 'faculty', 2, NULL, '$2y$10$GzIafqdsCvXqo26IVDI1ZOccDMkgF6PsYf/jb9M1.Vkg1iR3G4p9q', NULL, '2020-03-14 12:51:23', '2020-03-21 18:54:25'),
(4, 'Janet', 'Fuah', 'Female', 'Janet', 'jfuah@gmail.com', '0204061176', 'student', 3, NULL, '$2y$10$jlG/V32cS7LzmAL6bCCiXuMfDKtWJur4gZpJMI7N7r.nFPGNDOhku', NULL, '2020-03-14 13:02:55', '2020-03-14 13:02:55'),
(5, 'Yvette', 'Afriyie', 'Female', 'Yvette', 'yvette@gmail.com', '0203045812', 'faculty', 2, NULL, '$2y$10$dkIv4rN413jofXat8IHAheCqVuTQSL2coqFSkDfgx8KcblwDhni/6', NULL, '2020-03-14 13:04:38', '2020-03-14 13:04:38'),
(6, 'Doris', 'Afriyie', 'Female', 'Dorie', 'dorie@gmail.com', '0244156830', 'faculty', 1, NULL, '$2y$10$5Ga0Pf0.4L9UV8bWNssQWuScJjxt3stopYSZeSoYolYJInTPewVDK', NULL, '2020-03-14 13:05:11', '2020-03-14 13:05:11'),
(7, 'Munira', 'Adam', 'Female', 'Muni', 'muni@gmail.com', '0550993433', 'student', 3, NULL, '$2y$10$sYE73p2IMH5WebTeKgNCXOY4flsfx6mzonOWMyrXk2Q4antRry.VS', NULL, '2020-03-14 13:06:24', '2020-03-14 13:06:24'),
(8, 'kwaku', 'Boohene', 'Male', 'Kwaku', 'kwaku@gmail.com', '0552520588', 'student', 3, NULL, '$2y$10$a4tTLQewFF3Gz8X2K2ud..9v7zprJspamMRgPnNzUGW38G9zZyyoq', NULL, '2020-03-14 13:07:11', '2020-03-14 13:07:11'),
(9, 'Yvonne', 'Afriyie', 'Female', 'Yvonne', 'yvonne@gmail.com', '0244156830', 'faculty', 2, NULL, '$2y$10$174PU0Ml6ZI8ZDXahwRexes.qiwofPj3Q1O0FhaH4VZiXNEUSfvfy', NULL, '2020-03-15 12:51:06', '2020-03-15 12:51:06'),
(10, 'Kojo', 'Owusu', 'Male', 'kojo', 'kojo@gmail.com', '1234567890', 'student', 3, NULL, '$2y$10$csuO2nwAfk8ptUIa2xZ/A.UyBDZFVhzHN8LbanVxP0Mv6EtFANQgG', NULL, '2020-03-22 08:45:47', '2020-03-22 08:45:47'),
(11, 'helllp', 'hello', NULL, 'here', 'hello@gmail.com', NULL, 'faculty', 2, NULL, '$2y$10$1AwdzCFwTDusf9H6Lq9pIevd0jmSgVCHoztGM3SWCepy.cbVDt9Qi', NULL, '2020-04-07 20:13:55', '2020-04-07 20:13:55'),
(12, 'him', 'gi', NULL, 'him', 'him@gmail.com', '0203040591', 'faculty', 2, NULL, '$2y$10$CNAS12hYHfhlbB05iWlAK.junLRj1.8cfTWX05K9u4gffIRQe4U9S', NULL, '2020-04-07 20:42:19', '2020-04-07 20:42:19'),
(13, 'patrick', 'patrick', 'Male', 'patrick', 'patrick@gmail.com', '342342', 'student', 3, NULL, '$2y$10$GARpirD/lZ1i27gOP036XOuyMde.5cjRX6G5zutnAQg4EShh3lqra', NULL, '2020-04-07 20:42:46', '2020-04-07 20:42:46'),
(14, 'babe', 'baeb', NULL, 'babe', 'babe@gmail.com', NULL, 'faculty', 2, NULL, '$2y$10$n1skTCI9EIzsQdst6dbD..EUAK088v6tFg2eJovgr.NJ9USnXM.aW', NULL, '2020-04-07 22:11:42', '2020-04-07 22:11:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `capstone_table`
--
ALTER TABLE `capstone_table`
  ADD KEY `cp_supervisor` (`cp_supervisor`),
  ADD KEY `cp_student` (`cp_student`),
  ADD KEY `cp_project` (`cp_project`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_Id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD KEY `faculty_Id` (`faculty_Id`),
  ADD KEY `faculty_dept` (`faculty_dept`);

--
-- Indexes for table `faculty_student`
--
ALTER TABLE `faculty_student`
  ADD KEY `faculty_Id` (`faculty_Id`),
  ADD KEY `student_Id` (`student_Id`),
  ADD KEY `project_Id` (`project_Id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_Id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`mt_id`),
  ADD KEY `mt_project` (`mt_project`),
  ADD KEY `mt_student` (`mt_student`),
  ADD KEY `mt_supervisor` (`mt_supervisor`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pending_request`
--
ALTER TABLE `pending_request`
  ADD KEY `faculty_Id` (`faculty_Id`),
  ADD KEY `project_Id` (`project_Id`),
  ADD KEY `student_Id` (`student_Id`);

--
-- Indexes for table `person_meeting`
--
ALTER TABLE `person_meeting`
  ADD KEY `mt_id` (`mt_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_Id`),
  ADD KEY `project_user` (`project_user`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD UNIQUE KEY `student_Id` (`student_Id`),
  ADD KEY `student_user_id` (`student_user_id`),
  ADD KEY `student_major` (`student_major`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capstone_table`
--
ALTER TABLE `capstone_table`
  ADD CONSTRAINT `capstone_table_ibfk_1` FOREIGN KEY (`cp_project`) REFERENCES `project` (`project_Id`),
  ADD CONSTRAINT `capstone_table_ibfk_2` FOREIGN KEY (`cp_student`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `capstone_table_ibfk_3` FOREIGN KEY (`cp_supervisor`) REFERENCES `users` (`userId`);

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `faculty_ibfk_1` FOREIGN KEY (`faculty_Id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `faculty_ibfk_2` FOREIGN KEY (`faculty_dept`) REFERENCES `department` (`department_Id`);

--
-- Constraints for table `faculty_student`
--
ALTER TABLE `faculty_student`
  ADD CONSTRAINT `faculty_student_ibfk_1` FOREIGN KEY (`faculty_Id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `faculty_student_ibfk_2` FOREIGN KEY (`project_Id`) REFERENCES `project` (`project_Id`),
  ADD CONSTRAINT `faculty_student_ibfk_3` FOREIGN KEY (`student_Id`) REFERENCES `users` (`userId`);

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`mt_project`) REFERENCES `project` (`project_Id`),
  ADD CONSTRAINT `meetings_ibfk_2` FOREIGN KEY (`mt_student`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `meetings_ibfk_3` FOREIGN KEY (`mt_supervisor`) REFERENCES `users` (`userId`);

--
-- Constraints for table `pending_request`
--
ALTER TABLE `pending_request`
  ADD CONSTRAINT `pending_request_ibfk_1` FOREIGN KEY (`faculty_Id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `pending_request_ibfk_2` FOREIGN KEY (`project_Id`) REFERENCES `project` (`project_Id`),
  ADD CONSTRAINT `pending_request_ibfk_3` FOREIGN KEY (`student_Id`) REFERENCES `users` (`userId`);

--
-- Constraints for table `person_meeting`
--
ALTER TABLE `person_meeting`
  ADD CONSTRAINT `person_meeting_ibfk_1` FOREIGN KEY (`mt_id`) REFERENCES `meetings` (`mt_id`);

--
-- Constraints for table `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `project_ibfk_1` FOREIGN KEY (`project_user`) REFERENCES `users` (`userId`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`student_user_id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`student_major`) REFERENCES `major` (`major_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
