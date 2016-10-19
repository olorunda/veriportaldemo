-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2016 at 12:40 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicantanswers`
--

DROP TABLE IF EXISTS `applicantanswers`;
CREATE TABLE IF NOT EXISTS `applicantanswers` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `selectedoption` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applicantanswers`
--

INSERT INTO `applicantanswers` (`id`, `user_id`, `question_id`, `selectedoption`, `created_at`, `updated_at`) VALUES
(1, 8, 2, 2, '2016-09-14 11:55:12', '2016-09-14 12:13:02'),
(2, 8, 6, 2, '2016-09-14 11:55:13', '2016-09-14 12:13:22'),
(3, 8, 4, 4, '2016-09-14 11:55:14', '2016-09-14 12:13:03'),
(4, 8, 5, 3, '2016-09-14 11:55:15', '2016-09-14 12:13:03'),
(5, 8, 8, 1, '2016-09-14 11:55:16', '2016-09-14 12:13:23'),
(6, 8, 1, 2, '2016-09-14 12:13:01', '2016-09-14 12:13:01'),
(8, 8, 3, 1, '2016-09-14 12:13:02', '2016-09-14 12:13:02'),
(12, 8, 7, 2, '2016-09-14 12:13:23', '2016-09-14 12:13:23'),
(14, 8, 9, 1, '2016-09-14 12:13:23', '2016-09-14 12:13:23'),
(15, 8, 10, 3, '2016-09-14 12:13:24', '2016-09-14 12:13:24'),
(16, 8, 11, 2, '2016-09-14 12:13:41', '2016-09-14 12:13:41'),
(17, 8, 12, 1, '2016-09-14 12:13:42', '2016-09-14 12:13:42'),
(18, 8, 13, 2, '2016-09-14 12:13:42', '2016-09-14 12:13:42'),
(19, 8, 14, 4, '2016-09-14 12:13:43', '2016-09-14 12:13:43'),
(20, 8, 15, 1, '2016-09-14 12:13:43', '2016-09-14 12:13:43'),
(21, 8, 16, 1, '2016-09-14 12:13:56', '2016-09-14 12:13:56'),
(22, 8, 17, 2, '2016-09-14 12:13:56', '2016-09-14 12:13:56'),
(23, 8, 18, 1, '2016-09-14 12:13:57', '2016-09-14 12:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `available_jobs`
--

DROP TABLE IF EXISTS `available_jobs`;
CREATE TABLE IF NOT EXISTS `available_jobs` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ref_no` varchar(10) NOT NULL,
  `position` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_jobs`
--

INSERT INTO `available_jobs` (`id`, `ref_no`, `position`, `qualification`, `created_at`, `updated_at`, `description`, `type`) VALUES
(4, 'T:ENG-1', 'Petroleum Engineer', 'B.Sc. Petroleum Engineering', '2016-08-29 11:03:56', '2016-08-29 11:03:56', '  B.Sc. Petroleum Engineering: Applicant must poseese', 1),
(5, 'rf_09', 'some position', 'some qual', '2016-08-29 15:48:03', '2016-08-29 15:48:03', '  some qual', 1),
(6, 'T:ENG-1', 'Petroleum Engineer', 'BSc., Petroleum Engineering', '2016-08-30 04:39:02', '2016-08-30 04:39:02', '', 1),
(7, 'tgrgfx', 'fdzswfw', 'fesfre', '2016-09-01 10:27:33', '2016-09-01 10:27:33', '', 2),
(8, 'EXP:ENG-1', 'Petroleum Engineering', 'sjdhbdbsjdhbfsdfsds', '2016-09-01 10:30:47', '2016-09-01 10:30:47', '', 2),
(9, 'wertyui', 'ertyu', 'swedrftghy', '2016-09-01 10:31:15', '2016-09-01 10:31:15', '', 2),
(10, 'deji', 'ijjjj', 'qwertyuiopoiuytrewqw', '2016-09-01 10:32:23', '2016-09-01 10:32:23', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_ref` bigint(20) UNSIGNED NOT NULL,
  `street` text NOT NULL,
  `city` varchar(100) NOT NULL,
  `lga` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  `state_origin` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_ref`, `street`, `city`, `lga`, `state`, `state_origin`, `created_at`, `updated_at`) VALUES
(1, 1, 'saliu muniru', 'yusdbuf', 'dusyfudy', 'Edo', 'Ogun', '2016-09-01 10:34:50', '2016-09-01 10:34:50'),
(2, 1, 'saliu muniru', 'yusdbuf', 'dusyfudy', 'Edo', 'Ogun', '2016-09-01 11:17:09', '2016-09-01 11:17:09'),
(3, 1, 'saliu muniru', 'yusdbuf', 'dusyfudy', 'Edo', 'Ogun', '2016-09-01 11:23:57', '2016-09-01 11:23:57'),
(4, 1, 'qwerfgh', 'yhgvhyg', 'vctyrctgf', 'Imo', 'Cross River', '2016-09-01 11:25:17', '2016-09-01 11:25:17'),
(5, 1, 'tobolesquee road, give me', 'Asguard', 'Nyitm', 'Bauchi', 'Kogi', '2016-09-01 16:19:01', '2016-09-01 16:19:01'),
(6, 2, 'grjhfeuew', 'edfefefefe', 'defefefejfeje', 'Abia', 'Abia', '2016-09-03 05:20:06', '2016-09-03 05:20:06'),
(7, 3, 'kfferfgj', 'fugferjfe', 'rfjkgrhgrjh', 'Akwa Ibom', 'Akwa Ibom', '2016-09-05 07:55:18', '2016-09-05 07:55:18'),
(8, 4, 'zhsjhdkdkdfkd', 'lagos', 'ikeja', 'Lagos', 'Abia', '2016-09-05 10:11:22', '2016-09-05 10:11:22'),
(9, 6, 'jdhfdsfjseh', 'ufdjyfdjdrfh', 'jsfhedferjfhe', 'Adamawa', 'Abia', '2016-09-05 23:08:53', '2016-09-06 05:26:03'),
(10, 7, 'yjhthgjjhg', 'rfgbgnhk,', 'edfgbgnh', 'Ebonyi', 'Bauchi', '2016-09-07 12:59:30', '2016-09-10 20:52:49'),
(11, 8, 'yereywuey', 'yetgereg', 'yjgreg', 'Abia', 'FCT', '2016-09-14 09:37:12', '2016-09-14 09:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `corrects`
--

DROP TABLE IF EXISTS `corrects`;
CREATE TABLE IF NOT EXISTS `corrects` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `correctoption` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fix` varchar(44) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `corrects`
--

INSERT INTO `corrects` (`id`, `correctoption`, `question_id`, `created_at`, `updated_at`, `fix`) VALUES
(1, '1', 1, '2016-09-14 10:45:52', '2016-09-14 10:45:52', ''),
(2, '4', 2, '2016-09-14 10:45:52', '2016-09-14 10:45:52', ''),
(3, '1', 3, '2016-09-14 10:45:53', '2016-09-14 10:45:53', ''),
(4, '2', 4, '2016-09-14 10:45:53', '2016-09-14 10:45:53', ''),
(5, '3', 5, '2016-09-14 10:45:53', '2016-09-14 10:45:53', ''),
(6, '3', 6, '2016-09-14 10:45:53', '2016-09-14 10:45:53', ''),
(7, '4', 7, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(8, '3', 8, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(9, '2', 9, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(10, '2', 10, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(11, '3', 11, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(12, '8', 12, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(13, '3', 13, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(14, '1', 14, '2016-09-14 10:45:54', '2016-09-14 10:45:54', ''),
(15, '3', 15, '2016-09-14 10:45:55', '2016-09-14 10:45:55', ''),
(16, '1', 16, '2016-09-14 10:45:55', '2016-09-14 10:45:55', ''),
(17, '2', 17, '2016-09-14 10:45:55', '2016-09-14 10:45:55', ''),
(18, '4', 18, '2016-09-14 10:45:55', '2016-09-14 10:45:55', '');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

DROP TABLE IF EXISTS `documents`;
CREATE TABLE IF NOT EXISTS `documents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_ref` bigint(20) NOT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ref` (`user_ref`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_ref`, `document`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adedeji1060889226.pdf', '2016-09-01 15:39:11', '2016-09-01 15:39:11'),
(2, 1, 'Adedeji1168373177.pdf', '2016-09-01 15:39:11', '2016-09-01 15:39:11'),
(3, 1, 'Adedeji1163512840.pdf', '2016-09-01 15:39:11', '2016-09-01 15:39:11'),
(4, 1, 'Adedeji842693467.pdf', '2016-09-01 16:20:12', '2016-09-01 16:20:12'),
(5, 1, 'Adedeji807261236.pdf', '2016-09-01 16:20:12', '2016-09-01 16:20:12'),
(6, 1, 'Adedeji649393024.pdf', '2016-09-01 16:20:12', '2016-09-01 16:20:12'),
(7, 2, 'olorunda583685714.docx', '2016-09-03 05:20:45', '2016-09-03 05:20:45'),
(8, 2, 'olorunda480728184.docx', '2016-09-03 05:20:45', '2016-09-03 05:20:45'),
(9, 2, 'olorunda181131048.docx', '2016-09-03 05:20:45', '2016-09-03 05:20:45'),
(10, 2, 'olorunda711278847.docx', '2016-09-03 05:20:45', '2016-09-03 05:20:45'),
(11, 2, 'olorunda578194646.docx', '2016-09-03 05:22:33', '2016-09-03 05:22:33'),
(12, 2, 'olorunda870000401.docx', '2016-09-03 05:22:33', '2016-09-03 05:22:33'),
(13, 2, 'olorunda744336562.docx', '2016-09-03 05:22:33', '2016-09-03 05:22:33'),
(14, 2, 'olorunda477240614.docx', '2016-09-03 05:22:33', '2016-09-03 05:22:33'),
(15, 2, 'olorunda674807765.docx', '2016-09-03 06:25:40', '2016-09-03 06:25:40'),
(16, 2, 'olorunda231107190.docx', '2016-09-03 06:25:40', '2016-09-03 06:25:40'),
(17, 2, 'olorunda1086712088.docx', '2016-09-03 06:25:40', '2016-09-03 06:25:40'),
(18, 2, 'olorunda487777528.docx', '2016-09-03 06:27:07', '2016-09-03 06:27:07'),
(19, 2, 'olorunda683563793.docx', '2016-09-03 06:27:07', '2016-09-03 06:27:07'),
(20, 2, 'olorunda957560678.docx', '2016-09-03 06:27:07', '2016-09-03 06:27:07'),
(21, 2, 'olorunda714358297.docx', '2016-09-03 07:38:38', '2016-09-03 07:38:38'),
(22, 2, 'olorunda400959287.docx', '2016-09-03 07:38:38', '2016-09-03 07:38:38'),
(23, 2, 'olorunda1022377545.docx', '2016-09-03 07:38:38', '2016-09-03 07:38:38'),
(24, 3, 'some124958904.docx', '2016-09-05 07:57:49', '2016-09-05 07:57:49'),
(25, 3, 'some1161175425.docx', '2016-09-05 07:57:49', '2016-09-05 07:57:49'),
(26, 3, 'some113012120.docx', '2016-09-05 07:57:49', '2016-09-05 07:57:49'),
(27, 4, 'SANI855975916.docx', '2016-09-05 10:29:42', '2016-09-05 10:29:42'),
(28, 4, 'SANI13505059.docx', '2016-09-05 10:29:42', '2016-09-05 10:29:42'),
(29, 4, 'SANI486367660.docx', '2016-09-05 10:29:42', '2016-09-05 10:29:42'),
(30, 6, 'feufe393761536.pdf', '2016-09-05 23:31:50', '2016-09-05 23:31:50'),
(31, 6, 'feufe1187629018.pdf', '2016-09-05 23:31:50', '2016-09-05 23:31:50'),
(32, 6, 'feufe945947811.pdf', '2016-09-05 23:32:19', '2016-09-05 23:32:19'),
(33, 6, 'feufe987242128.docx', '2016-09-05 23:32:19', '2016-09-05 23:32:19'),
(34, 6, 'feufe910255867.pdf', '2016-09-05 23:32:19', '2016-09-05 23:32:19'),
(35, 6, 'feufe478131057.pdf', '2016-09-05 23:32:19', '2016-09-05 23:32:19'),
(36, 6, 'feufe315959035.pdf', '2016-09-05 23:33:45', '2016-09-05 23:33:45'),
(37, 6, 'feufe172634733.pdf', '2016-09-05 23:33:45', '2016-09-05 23:33:45'),
(38, 6, 'feufe336068217.pdf', '2016-09-05 23:33:45', '2016-09-05 23:33:45'),
(39, 6, 'feufe274961532.pdf', '2016-09-05 23:33:45', '2016-09-05 23:33:45'),
(40, 6, 'feufe130004751.pdf', '2016-09-05 23:33:45', '2016-09-05 23:33:45'),
(41, 6, 'feufe343451478.docx', '2016-09-06 05:27:14', '2016-09-06 05:27:14'),
(42, 6, 'feufe186918931.docx', '2016-09-06 05:27:14', '2016-09-06 05:27:14'),
(43, 6, 'feufe202390387.docx', '2016-09-06 05:27:14', '2016-09-06 05:27:14'),
(44, 6, 'feufe805999774.docx', '2016-09-06 05:27:14', '2016-09-06 05:27:14'),
(45, 7, 'tdftt76615242.pdf', '2016-09-07 13:05:51', '2016-09-07 13:05:51'),
(46, 7, 'tdftt735728941.pdf', '2016-09-07 13:05:51', '2016-09-07 13:05:51'),
(47, 7, 'tdftt298855099.pdf', '2016-09-07 13:05:51', '2016-09-07 13:05:51'),
(48, 7, 'tdftt834790781.pdf', '2016-09-07 13:05:51', '2016-09-07 13:05:51'),
(49, 7, 'tdftt192818119.pdf', '2016-09-07 14:09:08', '2016-09-07 14:09:08'),
(50, 7, 'tdftt712429003.pdf', '2016-09-07 14:09:08', '2016-09-07 14:09:08'),
(51, 7, 'tdftt570588774.pdf', '2016-09-07 14:09:08', '2016-09-07 14:09:08'),
(52, 7, 'tdftt22112680.pdf', '2016-09-10 20:53:50', '2016-09-10 20:53:50'),
(53, 7, 'tdftt664753174.pdf', '2016-09-10 20:53:50', '2016-09-10 20:53:50'),
(54, 7, 'tdftt179943790.pdf', '2016-09-10 20:53:50', '2016-09-10 20:53:50'),
(55, 8, 'some name843287096.pdf', '2016-09-14 09:38:02', '2016-09-14 09:38:02'),
(56, 8, 'some name568028749.pdf', '2016-09-14 09:38:02', '2016-09-14 09:38:02'),
(57, 8, 'some name1015662117.pdf', '2016-09-14 09:38:02', '2016-09-14 09:38:02');

-- --------------------------------------------------------

--
-- Table structure for table `durations`
--

DROP TABLE IF EXISTS `durations`;
CREATE TABLE IF NOT EXISTS `durations` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `time` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `durations`
--

INSERT INTO `durations` (`id`, `time`) VALUES
(1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `experienced_hire`
--

DROP TABLE IF EXISTS `experienced_hire`;
CREATE TABLE IF NOT EXISTS `experienced_hire` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(10) NOT NULL,
  `position` varchar(100) NOT NULL,
  `qualification` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `graduate_trainee`
--

DROP TABLE IF EXISTS `graduate_trainee`;
CREATE TABLE IF NOT EXISTS `graduate_trainee` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(10) NOT NULL,
  `position` varchar(50) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

DROP TABLE IF EXISTS `institutions`;
CREATE TABLE IF NOT EXISTS `institutions` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_ref` bigint(20) UNSIGNED NOT NULL,
  `iname` varchar(200) NOT NULL,
  `sname` varchar(200) NOT NULL,
  `pname` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL,
  `degree` varchar(100) DEFAULT NULL,
  `grade` varchar(50) DEFAULT NULL,
  `istart_date` date DEFAULT NULL,
  `iend_date` date DEFAULT NULL,
  `sstart_date` date DEFAULT NULL,
  `send_date` date DEFAULT NULL,
  `pstart_date` date DEFAULT NULL,
  `pend_date` date DEFAULT NULL,
  `ifile` varchar(200) DEFAULT NULL,
  `sfile` varchar(200) DEFAULT NULL,
  `pfile` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sdegree` varchar(10) NOT NULL,
  `country` char(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_ref` (`user_ref`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `user_ref`, `iname`, `sname`, `pname`, `course`, `degree`, `grade`, `istart_date`, `iend_date`, `sstart_date`, `send_date`, `pstart_date`, `pend_date`, `ifile`, `sfile`, `pfile`, `created_at`, `updated_at`, `sdegree`, `country`) VALUES
(21, 3, 'jfhgdfjkgdh', 'edjhedfjkfhwej', '', 'djhdffjdfhdrfj', 'bsc', '1', '1980-02-01', '1980-01-01', '1980-01-01', '1980-01-01', NULL, NULL, NULL, NULL, NULL, '2016-09-05 07:55:49', '2016-09-05 07:57:49', 'waec', ''),
(22, 3, 'hgjuhgjdferjh', 'edjhedfjkfhwej', '', 'ujkyhjk', 'bsc', '1', '1980-01-01', '1980-01-01', '1980-01-01', '1980-01-01', NULL, NULL, NULL, NULL, NULL, '2016-09-05 07:56:05', '2016-09-05 07:57:49', 'waec', ''),
(33, 6, 'jmjvgdghdsg', '', '', 'kjyfdrj', 'bsc', '2', '1980-01-01', '1980-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2016-09-06 05:27:54', '2016-09-06 05:27:54', '', ''),
(34, 7, 'Osun State University', 'ggfjyhmh', '', 'Computer Science', 'bsc', '1', '1980-01-01', '1980-01-01', '1988-01-02', '1980-01-01', NULL, NULL, NULL, NULL, NULL, '2016-09-07 13:00:26', '2016-09-10 20:53:50', 'waec', 'Algeria'),
(35, 8, 'hjgfhgre', 'yeureyru', '', 'jrhrejhe', 'bsc', '1', '1980-02-01', '1980-01-01', '1980-01-01', '1980-01-01', NULL, NULL, NULL, NULL, NULL, '2016-09-14 09:37:39', '2016-09-14 09:38:02', 'waec', '');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `option1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option3` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option4` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `correctoption` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `question_id` (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `option1`, `option2`, `option3`, `option4`, `updated_at`, `created_at`, `correctoption`) VALUES
(33, 38, 'the study of science', 'the study of life', 'the study of electronics', 'the life of pi', '2016-09-14 07:43:33', '2016-09-14 07:43:33', 1),
(34, 1, ' how long would it be before all the pills had been taken? 3 hours b. 2.5 hours c.1 hour d. 1.5 hours d"', '3 hours', '4 hours', '1 hour', '2016-09-14 11:45:52', '2016-09-14 11:45:52', 2),
(35, 2, '34', '54', '43', '49', '2016-09-14 11:45:52', '2016-09-14 11:45:52', 41),
(36, 3, '3 hours', '13 hours', '12 hours', '1 hour', '2016-09-14 11:45:53', '2016-09-14 11:45:53', 10),
(37, 4, '70', '25', '15', '10', '2016-09-14 11:45:53', '2016-09-14 11:45:53', 2),
(38, 5, ' where there was an oil heater', ' an oil lamp and a candle', ' which would you light first?', 'Oil heater', '2016-09-14 11:45:53', '2016-09-14 11:45:53', 0),
(39, 6, '19', '20', '36', 'Impossible to determine', '2016-09-14 11:45:53', '2016-09-14 11:45:53', 3),
(40, 7, '7', '8', '12', '9', '2016-09-14 11:45:53', '2016-09-14 11:45:53', 4),
(41, 8, '20', '15', '10', '12', '2016-09-14 11:45:54', '2016-09-14 11:45:54', 3),
(42, 9, 'Adroit', 'Skillful', 'Exert', 'Expert', '2016-09-14 11:45:54', '2016-09-14 11:45:54', 2),
(43, 10, '3623', '3236', '3632', '3263', '2016-09-14 11:45:54', '2016-09-14 11:45:54', 2),
(44, 11, '800', '1800', '900', '200', '2016-09-14 11:45:54', '2016-09-14 11:45:54', 3),
(45, 12, ' what is the average number of apples he sells each day?', '5', '3', '6', '2016-09-14 11:45:54', '2016-09-14 11:45:54', 8),
(46, 13, '70km/hr', '120km/hr', '60km/hr', '50km/hr', '2016-09-14 11:45:54', '2016-09-14 11:45:54', 3),
(47, 14, 'Sally', 'Jodie', 'None of the above', 'Betty', '2016-09-14 11:45:54', '2016-09-14 11:45:54', 1),
(48, 15, 'Same meaning', 'Different meanings', 'opposite meanings', 'none of the above', '2016-09-14 11:45:55', '2016-09-14 11:45:55', 3),
(49, 16, ' what is the cubic metres this container would hold?"', '250 Cubic metres', '125 Cubic metres', '10 Cubic metres', '2016-09-14 11:45:55', '2016-09-14 11:45:55', 15),
(50, 17, 'Distinct', 'Vague', 'Exacting', 'Fussy', '2016-09-14 11:45:55', '2016-09-14 11:45:55', 2),
(51, 18, 'Sky', 'Fly', 'Boat', 'Air', '2016-09-14 11:45:55', '2016-09-14 11:45:55', 4);

-- --------------------------------------------------------

--
-- Table structure for table `panelmembers`
--

DROP TABLE IF EXISTS `panelmembers`;
CREATE TABLE IF NOT EXISTS `panelmembers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panelmembers`
--

INSERT INTO `panelmembers` (`id`, `f_name`, `l_name`, `email`, `photo`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Adedeji', 'Adeloye', 'adeloyedeji@gmail.com', '1471958985.png', '$2y$10$6T0vQLT7I0Poh6uNWuOLFeI3Dc3K8AG3ULt2NZodysNxUluCihqNC', '2016-09-15 15:17:14', '2016-09-15 15:17:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professional_quals`
--

DROP TABLE IF EXISTS `professional_quals`;
CREATE TABLE IF NOT EXISTS `professional_quals` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_ref` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professional_quals`
--

INSERT INTO `professional_quals` (`id`, `user_ref`, `name`, `position`, `created_at`, `updated_at`) VALUES
(1, 1, 'stjrgzdhrgr', 'rtshdgrh', '2016-09-01 16:04:56', '2016-09-01 16:04:56'),
(2, 2, 'frgfger', 'hrfergerjtrt', '2016-09-03 05:20:56', '2016-09-03 05:20:56'),
(3, 6, ',jmjkghuui', 'gui', '2016-09-05 23:34:05', '2016-09-05 23:34:05'),
(4, 7, 'susxy', 'uyqwu', '2016-09-07 14:09:15', '2016-09-07 14:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications_required`
--

DROP TABLE IF EXISTS `qualifications_required`;
CREATE TABLE IF NOT EXISTS `qualifications_required` (
  `id` int(11) NOT NULL,
  `ref_no` varchar(10) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `content` (`content`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `content`) VALUES
(18, ''),
(6, 'A boy is 4 years old and his sister is three times as old as he is. When the boy is 12 years old how old will his sister be? '),
(4, 'Divide 30 by half and add ten. What do you get? '),
(7, 'farmer had 17 sheep. All but 9 died. How many live sheep were left?'),
(3, 'I went to bed at eight 8 ''clock in the evening and wound up my clock and set the alarm to sound at nine 9 ''clock in the morning. How many hours sleep would I get before being awoken by the alarm?'),
(1, 'If a doctor gives you 3 pills and tells you to take one pill every half hour'),
(12, 'If Bob sold 15 apples in a working week'),
(13, 'If it takes 2 hours to drive to City A and the city is 120km away what speed was the vehicle travelling at?'),
(14, 'If Sally sells more tickets than Betty and Betty sells more tickets than Jodie who sells the most if we compare Sally and Jodie?'),
(5, 'If you had only one match and entered a COLD and DARK room'),
(16, 'If you have a cube which is 5m x 5m x 5m'),
(9, 'Inept is the opposite of'),
(11, 'John likes 400 but not 300; he likes 100 but not 99; he likes 2500 but not 2400. Which does he like?'),
(17, 'The word PARTICULAR is the opposite of:'),
(15, 'The words '),
(8, 'What number is one half of one quarter of one tenth of 800?'),
(2, 'Which number should come next? 144 121 100 81 64 ?                                                                                                                                                                                                             '),
(10, 'Which one of the five choices makes the best comparison? LIVED is to DEVIL as 6323 is to:');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `ref_num` char(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `name`, `ref_num`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Adeloye Adedeji', 'DPR/2016/LAG/105', 3, '2016-09-15 23:15:18', '2016-09-15 23:15:18'),
(2, 'Adeloye Adedeji', 'DPR/2016/LAG/105', 2, '2016-09-15 23:16:25', '2016-09-15 23:16:25'),
(3, 'Adeloye Adedeji', 'DPR/2016/LAG/105', 4, '2016-09-15 23:20:07', '2016-09-15 23:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

DROP TABLE IF EXISTS `referees`;
CREATE TABLE IF NOT EXISTS `referees` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_ref` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `organization` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referees`
--

INSERT INTO `referees` (`id`, `user_ref`, `name`, `organization`, `position`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 2, 'fgrgryuuqw', 'uqwefeg', 'uwegeeregu', 'weufegfefu@gg.com', '46846784674', '2016-09-03 05:21:15', '2016-09-03 05:21:15'),
(2, 4, 'jhjuhu', 'gtg', 'hhyyyuh', 'nhjj@people.com', '08062274498', '2016-09-05 10:31:47', '2016-09-05 10:31:47'),
(3, 8, 'hjhjg', 'yy', 'yyhy', 'yhgnb@gfhghj.com', '00000000000', '2016-09-14 09:38:23', '2016-09-14 09:38:23');

-- --------------------------------------------------------

--
-- Table structure for table `relevant_exp`
--

DROP TABLE IF EXISTS `relevant_exp`;
CREATE TABLE IF NOT EXISTS `relevant_exp` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_ref` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `starts`
--

DROP TABLE IF EXISTS `starts`;
CREATE TABLE IF NOT EXISTS `starts` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `user_id` int(6) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `starts`
--

INSERT INTO `starts` (`id`, `user_id`, `type`, `created_at`, `updated_at`) VALUES
(32, 8, 1, '2016-09-14 12:53:21', '2016-09-14 11:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int(1) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dob` date NOT NULL,
  `age` int(2) NOT NULL,
  `sex` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `image` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `maiden_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `complete` int(1) NOT NULL DEFAULT '0',
  `pos_id` int(2) NOT NULL,
  `approved` int(1) NOT NULL DEFAULT '0',
  `region` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `center` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `appstart` int(1) NOT NULL DEFAULT '0',
  `progress` int(1) NOT NULL DEFAULT '1',
  `job_id` int(2) NOT NULL,
  `ref_num` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `jobcat` int(1) NOT NULL,
  `state_of_origin` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `textscore` int(2) NOT NULL,
  `sort` int(1) NOT NULL DEFAULT '0',
  `degree` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `altregion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `altcenter` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `exam_init` int(3) NOT NULL,
  `textcomplete` int(1) NOT NULL DEFAULT '0',
  `complete2` int(1) NOT NULL DEFAULT '0',
  `online` int(1) NOT NULL DEFAULT '0',
  `locked` int(1) NOT NULL DEFAULT '0',
  `logintime` datetime NOT NULL,
  `submissiontime` datetime NOT NULL,
  `time` int(3) NOT NULL,
  `rated` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `dob`, `age`, `sex`, `phone_num`, `marital_status`, `image`, `f_name`, `l_name`, `m_name`, `maiden_name`, `complete`, `pos_id`, `approved`, `region`, `center`, `appstart`, `progress`, `job_id`, `ref_num`, `jobcat`, `state_of_origin`, `textscore`, `sort`, `degree`, `altregion`, `altcenter`, `exam_init`, `textcomplete`, `complete2`, `online`, `locked`, `logintime`, `submissiontime`, `time`, `rated`) VALUES
(1, 1, 'adeloyedeji@gmail.com', '$2y$10$mxkoUCFI32VeheqEopMN8.qG/ARsCRZSOlnQ0sFXxaxjuE08JxZ5u', 'OWAAeBUsNPlCgXYCmoKf6RjjnEpjI8PQcF6q6UQoKigeIENBJZwI7hdIFOEx', '2016-09-01 10:16:37', '2016-09-14 11:43:47', '1995-10-16', 21, 'M', '08107654663', 'single', '1472750298.jpg', 'Adedeji', 'Adeloye', 'Ijesha', 'NOT APPLICABLE', 1, 4, 0, 'Lagos', 'unilag', 1, 5, 0, 'DPR/2016/LAG/107', 1, 'Kogi', 66, 0, 'BSC', '', '', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 1, 'olorundaolaoluwa@gmail.com', '$2y$10$ohtRKwitBSgpi.MinhO7huonJEwQlITVJeigyuPHMee.YguXqD2bG', 'jx1G9LwqHDPOv3iAVhYmnQj8QvqT5lytKy7A6dXgGPYZdofbYu5IgqF7N7Co', '2016-09-03 05:18:10', '2016-09-03 09:33:16', '1993-03-04', 23, 'M', '07036725298', 'married', '1472883597.jpg', 'olorunda', 'olaoluwa', 'Olamide', 'NOT APPLICABLE', 1, 6, 0, 'Portharcourt', 'center1', 1, 5, 0, 'DPR/2016/POR/102', 1, 'Abia', 100, 0, 'HND', '', '', 0, 0, 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 0, 'email@mail.com', '$2y$10$yYegeubZ9P2G2tMME5Gvd.BSOWA4vMAcrMR/lIrBpuMRu1VHkpLau', 'tY8ZhzbbY887XYX7rBXBSA1why3dB59dkjNIKwUd21YEfkdO3NKMH8Anx0e6', '2016-09-05 07:45:16', '2016-09-14 08:45:23', '1994-01-01', 22, 'M', '07036725298', 'single', '1473065685.jpg', 'Segun', 'Adelowo', 'Eze', 'NOT APPLICABLE', 1, 6, 2, 'Abuja', 'center1', 1, 5, 0, 'DPR/2016/ABU/103', 1, 'Akwa Ibom', 90, 1, 'BSC', '', '', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 60, 0),
(4, 0, 'aisha@snapnet.com.ng', '$2y$10$PzY32sxEW2MFGR7/h.pWeeytqrLSZXHDgSs.629x5knG6SaFlGxsa', 'LsN0P7qQ8ETihGgZUf5aTIL54sfKabNBFzD6W1PzqRWsg3Nb54OaU9Mcau7y', '2016-09-05 09:49:35', '2016-09-14 08:44:39', '1988-03-01', 28, 'F', '08066666666', 'single', '1473073799.jpg', 'SANI', 'Adija', 'nana', 'Audu', 1, 6, 2, 'Portharcourt', 'center1', 1, 5, 0, 'DPR/2016/POR/104', 1, 'Abia', 70, 1, 'BSC', '', '', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 45, 0),
(5, 0, 'efuie@gg.com', '$2y$10$a92MWSp7EhQG8AUUe8BBgevnJ0ntlLFX59k5DBgVxfDDijLZxllSW', 'jH27mwG6jN3ojhtcajriNQKrE8VlMml22e4bW3W2SUsp9O5rIoTIlVyApTuc', '2016-09-05 15:04:37', '2016-09-15 23:20:07', '1995-09-12', 0, '', '07036725298', 'single', '1476543433.png', 'ooieiiei', 'difeeiu', '', '', 0, 0, 0, '', '', 0, 1, 0, 'DPR/2016/LAG/105', 0, 'Kwara', 0, 0, 'HND', '', '', 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1),
(6, 0, 'g@g.com', '$2y$10$f59NnFHvKgb6KUcs3i4TNu1oSMNcVcRptjoG5aIDcz9URaZxR2S0K', '4OvetUw4G9TZAJ9k9s4xI6yIsdoinrBJscSqNMvXlMoaZFoOQLZCLa8XdeWc', '2016-09-05 22:57:43', '2016-09-14 09:33:01', '1994-01-01', 22, 'M', '07036725298', 'married', '1473143156.jpg', 'feufe', 'uidreyfu', 'jdfjsdjsdfh', 'NOT APPLICABLE', 1, 4, 2, 'Abuja', 'center1', 1, 5, 0, 'DPR/2016/ABJ/106', 1, 'Osun', 62, 1, 'bsc', 'Portharcourt', 'center1', 1, 0, 0, 0, 0, '2016-09-14 10:33:00', '2016-09-14 10:04:19', 0, 0),
(7, 1, 'o@jj.com', '$2y$10$06J1DHsSD.3Hui.MZ2xyw.q6nx5H2/n/J04I8u5/KJtyPMBtr/w7.', 'mQfaoYXwwx8cE2xvaIRW0Cl2Wfl3WuQTeMw7bNDDkwBDHwCITTabCMRI5qhS', '2016-09-07 12:58:40', '2016-09-14 12:09:31', '1994-03-02', 22, 'M', '07033445553', 'single', '1473544353.png', 'tdftt', 'tyguhjikl', 'cjkdfhsdjfkshd', 'NOT APPLICABLE', 1, 4, 0, 'Abuja', 'center1', 1, 5, 0, 'DPR/2016/ABJ/107', 1, 'Kogi', 20, 1, '', 'Lagos', 'unilag', 0, 0, 1, 0, 0, '2016-09-14 13:09:31', '0000-00-00 00:00:00', 0, 0),
(8, 0, 'adeee@gmail.com', '$2y$10$8EpB3mZFQuTVjhJ8ubjMhujAJ6PVqlumZKDEqdkWe0KVjoS21og6e', 'MMEQa1ugwIQdSBhwY1JrQJyWHKVwS9foNGn4lCUGVR4XzG79B62rob9VB3sv', '2016-09-14 09:35:48', '2016-09-14 12:15:09', '1994-01-01', 22, 'M', '07036725298', 'single', '1473849432.png', 'some name', 'somelast', 'Adeleye', 'NOT APPLICABLE', 1, 4, 0, 'Portharcourt', 'center1', 1, 5, 0, 'DPR/2016/POR/108', 1, 'Lagos', 4, 0, 'bsc', 'Lagos', 'unilag', 1, 0, 1, 0, 0, '2016-09-14 13:15:09', '2016-09-14 13:13:55', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
