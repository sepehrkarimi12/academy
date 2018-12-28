-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2018 at 09:22 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computereducation`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8_persian_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1543139533),
('m130524_201442_init', 1543139560);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `cname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `tid` int(11) DEFAULT NULL,
  `startdate` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `enddate` varchar(50) COLLATE utf8_persian_ci NOT NULL,
  `starttime` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `endtime` varchar(5) COLLATE utf8_persian_ci NOT NULL,
  `capacity` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `cname`, `tid`, `startdate`, `enddate`, `starttime`, `endtime`, `capacity`, `cost`) VALUES
(4, 'شبکه کامپیوتری', 2, '1397/09/20', '1397/11/10', '7:30', '12:00', 30, 500000),
(5, 'برنامه نویسی پی اچ پی', 3, '1397/09/15', '1397/09/22', '11:25', '14:25', 50, 450000),
(6, 'وب', 2, '1397/10/01', '1397/10/27', '12:30', '13:30', 60, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `pdate` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `sid`, `cid`, `cost`, `pdate`) VALUES
(3, 2, 4, 20000, '1397/10/07 12:10:55'),
(4, 2, 4, 470000, '1397/10/07 12:10:12'),
(5, 2, 4, 10000, '1397/10/07 12:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_register`
--

CREATE TABLE `tbl_register` (
  `id` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `rdate` varchar(50) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_register`
--

INSERT INTO `tbl_register` (`id`, `sid`, `cid`, `rdate`) VALUES
(2, 2, 4, '1397/09/13 11:09:55'),
(3, 2, 5, '1397/09/23 20:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `birthday` int(11) NOT NULL,
  `birthplace` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `certificate` enum('کمتر از سیکل','سیکل','دیپلم','فوق دیپلم','لیسانس','فوق لیسانس','دکتری','فوق دکتری','بیشتر از دکتری') COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `cellphone` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`id`, `fname`, `lname`, `birthday`, `birthplace`, `certificate`, `phone`, `cellphone`, `address`) VALUES
(2, 'سپهر', 'کریمی', 1377, 'قزوین', 'لیسانس', '02164545864', '09122993445', 'پارک پلیس'),
(3, 'علی', 'خاندوزی', 1380, 'گرگان', 'کمتر از سیکل', '09216544454', '09215448748', 'حکیمیه');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `lname` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `workfield` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `experience` varchar(2) COLLATE utf8_persian_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `cellphone` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `address` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`id`, `fname`, `lname`, `workfield`, `experience`, `phone`, `cellphone`, `address`) VALUES
(2, 'علی', 'رضایی', 'امنیت', '2', '77041164', '09122993445', 'تهرانپارس'),
(3, 'محمد امین', 'برنجی', 'گرافیک', '5', '02155632145', '09126378542', 'میدان امام حسین');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'kprNwq5v6qdNwonXMhCt6EGAapyTNtyr', '$2y$13$Gu4rJJta4zEqLVXSeWJPYuB3KkR5VvYqX2Y0ydvqqsRT1HPcdbgGW', NULL, 'admin@gmail.com', 10, 1543139767, 1543139767);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_register`
--
ALTER TABLE `tbl_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `tbl_teacher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `tbl_payment_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `tbl_student` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_payment_ibfk_2` FOREIGN KEY (`cid`) REFERENCES `tbl_course` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_register`
--
ALTER TABLE `tbl_register`
  ADD CONSTRAINT `tbl_register_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `tbl_course` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_register_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `tbl_student` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
