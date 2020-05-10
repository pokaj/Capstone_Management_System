-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 10, 2020 at 07:37 PM
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
(1, 'Humanities\r\n& Social Sciences', 10),
(2, 'Business\r\nAdministration', 10),
(3, 'Computer Science &\r\nInformation Systems', 10),
(4, 'Engineering', 10);

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
(7, 3, 'Web Development', 0),
(8, 3, 'Mobile App Development', 0),
(10, 3, 'Software Engineering', 0),
(13, 1, 'Novels & African history.', 0),
(14, 2, NULL, 0),
(15, 3, NULL, 0),
(16, 1, 'African Cultural Integration', 0);

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
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_Id` int(11) NOT NULL,
  `faculty_Id` int(11) NOT NULL,
  `student_Id` int(11) NOT NULL,
  `date` date NOT NULL,
  `comments` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `mt_nextDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_user_id` int(11) NOT NULL,
  `student_Id` int(11) DEFAULT NULL,
  `student_yeargroup` int(5) DEFAULT NULL,
  `student_major` int(11) DEFAULT NULL,
  `interests` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_user_id`, `student_Id`, `student_yeargroup`, `student_major`, `interests`) VALUES
(9, 12345678, 2020, 1, 'Financial Modeling'),
(11, 87654321, 2020, 3, 'Debates & charity'),
(12, 12321456, 2020, 3, 'Cyber-security'),
(17, 98798654, 2020, 1, 'Law'),
(18, 65748376, 2020, 3, 'Programming'),
(19, 23412678, 2020, 1, NULL),
(20, 98786756, 2020, 3, NULL),
(21, 78654675, 2020, 1, NULL),
(22, 98765678, 2020, 2, NULL),
(23, 34541687, 2020, 3, NULL),
(24, 98097687, 2020, 2, NULL),
(25, 76543987, 2020, 1, NULL),
(26, 32129874, 2020, 1, NULL),
(27, 76879845, 2020, 1, NULL),
(28, 12132123, 2020, 1, NULL),
(29, 98987678, 2020, 3, NULL),
(30, 54656432, 2020, 1, NULL),
(31, 65786543, 2020, 1, NULL),
(32, 98976543, 2020, 3, NULL),
(33, 98989898, 2020, 3, NULL),
(34, 87678908, 2020, 3, NULL),
(35, 12121212, 2020, 2, NULL),
(36, 34343434, 2020, 1, NULL),
(37, 56565656, 2020, 3, NULL),
(38, 78787878, 2020, 3, NULL),
(39, 90909090, 2020, 3, NULL),
(40, 19191919, 2020, 3, NULL),
(41, 18181818, 2020, 3, NULL),
(42, 17171717, 2020, 2, NULL),
(43, 16161616, 2020, 2, NULL),
(44, 14141414, 2020, 2, NULL),
(45, 13131313, 2020, 1, NULL),
(46, 87934721, 2020, 5, NULL),
(47, 19283746, 2020, 3, NULL),
(48, 65748392, 2020, 6, NULL),
(49, 92839183, 2020, 2, NULL),
(50, 87658794, 2020, 1, NULL),
(51, 12321465, 2020, 2, NULL),
(52, 98789654, 2020, 3, NULL),
(53, 76459823, 2020, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('Male','Female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` enum('faculty','student','supervisor') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `first_name`, `last_name`, `gender`, `username`, `email`, `phone`, `category`, `user_role`, `image`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Doris', 'Afriyie', 'Female', 'Dorie', 'dorie@gmail.com', '0244156830', 'faculty', 1, '3.jpg', NULL, '$2y$10$TLIAuR1RAudXoeoDsOq1zeU4eAVelCL.7pMBAwQW5UU7EVpSqozlu', NULL, '2020-03-14 13:05:11', '2020-03-14 13:05:11'),
(7, 'David', 'Sampah', NULL, 'David', 'david.sampah@gmail.com', '0203045812', 'faculty', 2, '14.jpg', NULL, '$2y$10$E.SgUqhYT444MeAcNqrUxe.Qmq4gsfOt.HRZraNh6fqIUsSScNEfW', NULL, '2020-05-01 18:58:20', '2020-05-01 18:58:20'),
(8, 'David', 'Ebo', NULL, 'Ebo', 'david.ebo@gmail.com', '0203045812', 'faculty', 2, '7.png', NULL, '$2y$10$eCi2aYtyP5kuQVqjakHnI.VFR/C0MAtwmTXnhGQ4pldgZGJi7UpXa', NULL, '2020-05-01 19:58:28', '2020-05-01 19:58:28'),
(9, 'Janet', 'Fuah', 'Female', 'Janet', 'janet.fuah@gmail.com', '0204061176', 'student', 3, '3.jpg', NULL, '$2y$10$Yqo7ewS/xOa/k9gFkcOYseU3IWi2xav4sjGoxxpgH168VTWsDH9rW', NULL, '2020-05-01 20:13:00', '2020-05-01 20:13:00'),
(10, 'Ayorkor', 'Korsah', NULL, 'Korsah', 'ayorkor.korsah@gmail.com', '0203045812', 'faculty', 2, '3.jpg', NULL, '$2y$10$DEukNLhRSMltoGAzVMt3qeT30ZpAOmp76CcRygyu2j7fQVbXnTG/i', NULL, '2020-05-01 20:37:47', '2020-05-01 20:37:47'),
(11, 'Munira', 'Adam', 'Female', 'Munira', 'munira.adam@gmail.com', '0550993433', 'student', 3, '12.jpg', NULL, '$2y$10$XGoAF4KOWJC6LXmI0WRvNe3tOL3G0IWHlVptb1bT4FJFG2os0iO/.', NULL, '2020-05-01 20:54:44', '2020-05-01 20:54:44'),
(12, 'Kwaku', 'Boohene', 'Male', 'Kwaku', 'kwaku.boohene@gmail.com', '0203045812', 'student', 3, '9.jpg', NULL, '$2y$10$r/39tTPce8ISyvI3Se/O2u/CBpQE9kr2LY6hTJlsaj5T0derkGYX6', NULL, '2020-05-01 21:04:00', '2020-05-01 21:04:00'),
(13, 'Oduro', 'Frimpong', NULL, 'Frimpong', 'oduro.frimpong@gmail.com', '0203045812', 'faculty', 2, '10.png', NULL, '$2y$10$7hPgmnPskyctPshNpClYQ.WrhAhFutgqSggTmnGxTV9dIvEluM4M2', NULL, '2020-05-02 23:23:10', '2020-05-02 23:23:10'),
(14, 'Edgar', 'Cooke', NULL, 'Cooke', 'edgar.cooke@gmail.com', NULL, 'faculty', 2, NULL, NULL, '$2y$10$S2Bq3w4qH0ZEJtWlmzfgPO8uZVzq.rB9pD7DRDp/5cbQfSTf9a17a', NULL, '2020-05-03 08:10:05', '2020-05-03 08:10:05'),
(15, 'Ato', 'Yawson', NULL, 'Ato', 'ato.yawson@gmail.com', NULL, 'faculty', 2, NULL, NULL, '$2y$10$wkwp7vomYTs6ymhQQ.o1WucIP7/6wqHUok8PWMNKmet/LYv/Gf2uW', NULL, '2020-05-03 08:25:59', '2020-05-03 08:25:59'),
(16, 'Esi', 'Ansah', NULL, 'Esi', 'esi.ansah@gmail.com', '0203045812', 'faculty', 2, '7.png', NULL, '$2y$10$e3qdbIYsd25ryLtBgUYQ1OsWllXIuIIF30X8xytg1CqJGwk1WUGf.', NULL, '2020-05-03 08:45:16', '2020-05-03 08:45:16'),
(17, 'Kwabena', 'Boateng', 'Male', 'Kobby', 'kwabena.boateng@gmail.com', '0203045810', 'student', 3, '9.jpg', NULL, '$2y$10$67WY.sjFQ6Nem4Xf2o6F.OLuZbVyBb1dSsOye5NuVZZAt1rB8CGjm', NULL, '2020-05-03 10:08:54', '2020-05-03 10:08:54'),
(18, 'Papa', 'Darfoor', 'Male', 'Papa', 'papa.darfoor@gmail.com', '0203045812', 'student', 3, '5.png', NULL, '$2y$10$9XJKCpcqS1oUzfct49yGdezEDUMMSWJtYfuNhJpeHUBtk.BW8iTUG', NULL, '2020-05-03 10:11:42', '2020-05-03 10:11:42'),
(19, 'Cecil', 'Hudson', 'Male', 'Hudson', 'cecil.hudson@gmail.com', '0203045812', 'student', 3, '14.jpg', NULL, '$2y$10$EdBSaNqoW0lQmJ8H4cfXx.xRZA7g1xDEjKuFQ6aji5g8gdpOjtgG.', NULL, '2020-05-10 15:52:41', '2020-05-10 15:52:41'),
(20, 'Akosua', 'Kissiedu', 'Female', 'Akosua', 'akosua.kissiedu@gmail.com', '0203045812', 'student', 3, '9.jpg', NULL, '$2y$10$NIWzjT/VeJD.6G79o6V.KO6cwrOWP5P2We0aa/jV5xpF.3oMoQ2S6', NULL, '2020-05-10 15:56:42', '2020-05-10 15:56:42'),
(21, 'Ama', 'Ayenor', 'Female', 'Ayenor', 'ama.ayenor@gmail.com', '0203045812', 'student', 3, '3.jpg', NULL, '$2y$10$G.4OFEib0qcJnvIO02b72uAArYptaQGtzV6TqOKyisG0FB9cCnOAy', NULL, '2020-05-10 15:58:00', '2020-05-10 15:58:00'),
(22, 'Samuel', 'Atule', 'Male', 'Atule', 'samuel.atule@gmail.com', '0203045812', 'student', 3, '13.jpg', NULL, '$2y$10$eZqmGCjyyfdt3MxrHYl4yuWRgiapn0xstEjJdqFjKnhtXPi7Nmnky', NULL, '2020-05-10 15:59:22', '2020-05-10 15:59:22'),
(23, 'Derrick', 'Bansah', 'Male', 'Bansah', 'derrick.bansah@gmail.com', '0203045812', 'student', 3, '2.jpg', NULL, '$2y$10$SQfET2IbGdpiXRoOU1R5ie0wsTaFbTyK2LNYSuu8Axq1qHZMLETiC', NULL, '2020-05-10 16:00:33', '2020-05-10 16:00:33'),
(24, 'Maame', 'Osei', 'Female', 'MYO', 'maameyaa.osei@gmail.com', '0203045812', 'student', 3, '3.jpg', NULL, '$2y$10$u5HQrWXEm49lh0qijGh4Oe0KS4rwpGEt.9vdoRdrtrifL33vKd74O', NULL, '2020-05-10 16:03:49', '2020-05-10 16:03:49'),
(25, 'Joel', 'Bortey', 'Male', 'Joey', 'joel.bortey@gmail.com', '0203045812', 'student', 3, '1.jpg', NULL, '$2y$10$44cZxGMQQzqYqwL0Yt54gO9wzWC6tGVvGT/H7d00QWdsNNKsSc8Py', NULL, '2020-05-10 16:04:48', '2020-05-10 16:04:48'),
(26, 'Christopher', 'Obiorah', 'Male', 'Obiorah', 'chris.obi@gmail.com', '0203045812', 'student', 3, '15.jpg', NULL, '$2y$10$30FpHv1nPkjzJ7HZB8p3b.MGCsOPB4w6TVnozC.RbADea4//7Mk.C', NULL, '2020-05-10 16:05:52', '2020-05-10 16:05:52'),
(27, 'Constance', 'Azong', 'Female', 'Constrance', 'constance.azong@gmail.com', '0203045812', 'student', 3, '7.png', NULL, '$2y$10$p1XJvRSxHINIXS2DY4pFG.xm4UBWh6S9yyclYXJ3w/tlDwdhacIiK', NULL, '2020-05-10 16:06:39', '2020-05-10 16:06:39'),
(28, 'Francis', 'Acquah', 'Male', 'Francis', 'francis.acquah@gmail.com', '0203045812', 'student', 3, '8.jpg', NULL, '$2y$10$7jF8zyUDC2y0hor885ZXeOYO60bVMs7axwiat9UnI6M9WBH6BD65m', NULL, '2020-05-10 16:09:33', '2020-05-10 16:09:33'),
(29, 'Jesse', 'Ayenor', 'Male', 'Jesse', 'jesse.ayenor@gmail.com', '0203045812', 'student', 3, '1.jpg', NULL, '$2y$10$NRCrX/sPZ8vqVfGoZ5KPx.jKEw9eH4Cm4K43Dsj4U/sya2YIk1pKa', NULL, '2020-05-10 16:10:33', '2020-05-10 16:10:33'),
(30, 'Keshia', 'Benson', 'Female', 'Keshia', 'keshia.benson@gmail.com', '0203045812', 'student', 3, '13.jpg', NULL, '$2y$10$n7FHvb6NZHkL9SDJE1fUxusJyj.N49JTPv2nB59ZW9FwdU4RSMbDO', NULL, '2020-05-10 16:11:20', '2020-05-10 16:11:20'),
(31, 'Kobby', 'Gyekye', 'Male', 'Gyekye', 'kobby.gyekye@gmail.com', '0203045812', 'student', 3, '11.jpg', NULL, '$2y$10$NTTLQixGluVu217YlOxp1OGmmxLH39ggR2xsDh36AxfylXYPzCiBO', NULL, '2020-05-10 16:12:10', '2020-05-10 16:12:10'),
(32, 'Kofi', 'Boamah', 'Male', 'Boamah', 'kofi.boamah@gmail.com', '0203045812', 'student', 3, '13.jpg', NULL, '$2y$10$0FnH9bJuEhHHBCVfV91jRO6KR7q4h79GgL.pUrT0NNj7UApuR2hYS', NULL, '2020-05-10 16:12:51', '2020-05-10 16:12:51'),
(33, 'kofi', 'Amoaten', 'Male', 'Amoaten', 'kofi.amoaten@gmail.com', '0203045812', 'student', 3, '9.jpg', NULL, '$2y$10$eKXR8Je7XrBSgUj0hslLkOZ2K2iTZxF2/pTCpiqYgY0Tmklpj5PFu', NULL, '2020-05-10 16:13:28', '2020-05-10 16:13:28'),
(34, 'Grace', 'Laeticia', 'Female', 'Laeticia', 'grace.Laeticia@gmail.com', '0203045812', 'student', 3, '3.jpg', NULL, '$2y$10$eD8heRbj60g1dtkk.JEbveQ4f7/fXQy1Kg5S7KdSyMhbm4SYXXmJe', NULL, '2020-05-10 16:15:14', '2020-05-10 16:15:14'),
(35, 'Ayinawo', 'Tanko', 'Female', 'Ayinawo', 'ayinawo.tanko@gmail.com', '0203045812', 'student', 3, '5.png', NULL, '$2y$10$SQdFQiutCakAE8dbf3WCLOh8vQR0Iwb9JtPZ40tL5go7EIgnqwHki', NULL, '2020-05-10 16:16:02', '2020-05-10 16:16:02'),
(36, 'Naa', 'Lamle', 'Female', 'Lamle', 'naa.lamle@gmail.com', '0203045812', 'student', 3, '5.png', NULL, '$2y$10$ToGZNAPm9pubjwA5rQWjtO9/ujGPxd.HqaPkTlIc.ak5pcTHDDPbq', NULL, '2020-05-10 16:17:57', '2020-05-10 16:17:57'),
(37, 'Nicholas', 'Quansah', 'Female', 'Quansah', 'nicholas.quansah@gmail.com', '0203045812', 'student', 3, '11.jpg', NULL, '$2y$10$IxkgycmvYOk6iy.j4.8NtevX/qM/nE5xmlNcIDjIy3MNj2BkRvWri', NULL, '2020-05-10 16:18:49', '2020-05-10 16:18:49'),
(38, 'Eugene', 'Parker', 'Male', 'Parker', 'eugene.parker@gmail.com', '0203045812', 'student', 3, '14.jpg', NULL, '$2y$10$IaGS0HBVLA376xJbPR71W.bdQi9v2yc0YLOxSkE4GO5PQ4ZjJ8aWO', NULL, '2020-05-10 16:19:41', '2020-05-10 16:19:41'),
(39, 'Samuel', 'Himbson', 'Male', 'Himbson', 'samuel.himbson@gmail.com', '0203045812', 'student', 3, '6.png', NULL, '$2y$10$80.GFZ./.SRQx4ldgiA2a.w5singCkorRtTI1Xky3B.d3pKFjmpiy', NULL, '2020-05-10 16:20:48', '2020-05-10 16:20:48'),
(40, 'William', 'Obese', 'Male', 'Obese', 'william.obese@gmail.com', '0203045812', 'student', 3, '5.png', NULL, '$2y$10$cMfDtGC6XD1e3OwPffJ08.dofgMhKuYycycMmATKdvv41k1SI7T6q', NULL, '2020-05-10 16:21:37', '2020-05-10 16:21:37'),
(41, 'Carl', 'Ayarna', 'Male', 'Carl', 'carl.ayarna@gmail.com', '0203045812', 'student', 3, '8.jpg', NULL, '$2y$10$Qeej8IbzBkhT9pf2DP/gQuu0sdaoeGW0ZyvEGkL2NPp3Uyeb4FKrG', NULL, '2020-05-10 16:22:19', '2020-05-10 16:22:19'),
(42, 'Zoe', 'Tagboto', 'Female', 'Zoe', 'zoe.tagboto@gmail.com', '0203045812', 'student', 3, '3.jpg', NULL, '$2y$10$UMjoTdUn7LXTUqfQb4Td8ehVBfQsApgtD4eHQkTk66wYR2KglEnqW', NULL, '2020-05-10 16:23:08', '2020-05-10 16:23:08'),
(43, 'Selorm', 'Sapati', 'Male', 'Sapati', 'selorm.sapati@gmail.com', '0203045812', 'student', 3, '14.jpg', NULL, '$2y$10$tpStrs1or1IipUE5M22JYOX0YXv1AzyFZhs7FKb5tzaazUHqX8aFO', NULL, '2020-05-10 16:24:08', '2020-05-10 16:24:08'),
(44, 'Daniel', 'Olukoya', 'Male', 'Oluks', 'daniel.olukoya@gmail.com', '0203045812', 'student', 3, '7.png', NULL, '$2y$10$UFvrUkGG1NGsrEv5UpSccelV.NSAobqcf.XkYCjhKeMG.rzvKsj1q', NULL, '2020-05-10 16:25:24', '2020-05-10 16:25:24'),
(45, 'Vera', 'Djanie', 'Female', 'Vera', 'vera.djanie@gmail.com', '0203045812', 'student', 3, '3.jpg', NULL, '$2y$10$qMFpjvSRhqut6xlk8/jqxuEXgdDljWNSxVBQO6ildoUI3TTW.ZcSK', NULL, '2020-05-10 16:26:24', '2020-05-10 16:26:24'),
(46, 'Gloria', 'Bio', 'Female', 'Bio', 'gloria.bio@gmail.com', '0203045812', 'student', 3, '8.jpg', NULL, '$2y$10$MZ0vCRwQKSXczB4XReM.P.UEmjiapAxIaVrUmUJad9.W5mzCTrF5S', NULL, '2020-05-10 16:27:15', '2020-05-10 16:27:15'),
(47, 'Fidel', 'Boamah', 'Male', 'Fidel', 'fidel.boamah@gmail.com', '0203045812', 'student', 3, '2.jpg', NULL, '$2y$10$ath5NTtskf2pgEipC3Ppw.AOtXclHJ3oGpO7Wgu0Awyj3.mxpmFEa', NULL, '2020-05-10 16:33:25', '2020-05-10 16:33:25'),
(48, 'Ewuradwo', 'Dadzie', 'Female', 'Ewuradzoa', 'ewuradwoa.dadzie@gmail.com', '0203045812', 'student', 3, '13.jpg', NULL, '$2y$10$NFMn7GR1hxWNRgkr5gnqf.nnZJ8xQEhSaT4XVrUj7.zVxJ3i7r.le', NULL, '2020-05-10 16:36:22', '2020-05-10 16:36:22'),
(49, 'Kingsley', 'Besidone', 'Male', 'Besidone', 'kingsley.besidone@gmail.com', '0203045812', 'student', 3, '11.jpg', NULL, '$2y$10$xYwWXGqGLYcH3X5Eu/bCXuxyv.tMNTTDe5H/0CxaOaInMiYxxMCSO', NULL, '2020-05-10 17:23:27', '2020-05-10 17:23:27'),
(50, 'Carol', 'Hammah', 'Female', 'Hammah', 'carol.hammah@gmail.com', '0203045812', 'student', 3, '14.jpg', NULL, '$2y$10$.GJGZ5YUUV63VFAAWxukBeJk38pxrBUVT5yydo.V7zS7UuPG9r5W2', NULL, '2020-05-10 17:24:19', '2020-05-10 17:24:19'),
(51, 'Sasha', 'Ofori', 'Female', 'Sasha', 'sasha.ofori@gmail.com', '0203045812', 'student', 3, '8.jpg', NULL, '$2y$10$Lyb6GlqCUaJKgJ.DnKd.PeyY2c4mFfpBfCiIcMUHA85yTruV51nyG', NULL, '2020-05-10 17:31:33', '2020-05-10 17:31:33'),
(52, 'Richelle', 'Yirenkye', 'Female', 'Richelle', 'richelle.yirenkye@gmail.com', '0203045812', 'student', 3, '3.jpg', NULL, '$2y$10$alMaSUCjY7wg8j/UYhlaXOFrcyRtxbIzy0T1YP9VLyIvAmOtG.YDe', NULL, '2020-05-10 17:33:36', '2020-05-10 17:33:36'),
(53, 'Akua', 'Sereboo', 'Female', 'Sereboo', 'akua.sereboo@gmail.com', '0203045812', 'student', 3, '14.jpg', NULL, '$2y$10$y7t74.LWCgGoV5JYAelTweoAGo8UJiFqbtlxtDXZ59XZhnGvtAnr2', NULL, '2020-05-10 17:34:51', '2020-05-10 17:34:51');

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
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_Id`),
  ADD KEY `faculty_Id` (`faculty_Id`),
  ADD KEY `student_Id` (`student_Id`);

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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `mt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`faculty_Id`) REFERENCES `users` (`userId`),
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`student_Id`) REFERENCES `users` (`userId`);

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
