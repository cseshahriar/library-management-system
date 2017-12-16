-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2017 at 08:35 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarysys`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '1',
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `role_id`, `name`, `gender`, `username`, `email`, `password`, `phone`, `image`, `address`, `joined_at`, `active`) VALUES
(1, 1, 'Md. Shahriar Hosen', 'Male', 'admin', 'admin@lms.com', '21232f297a57a5a743894a0e4a801fc3', '01710835453', 'user.png', 'dhaka', '2017-12-15 08:36:10', 1),
(6, 1, 'salpin', 'Male', 'salpin', 'salpin@mail.com', 'bc0c61bc9cb001a3c7a19c643f5837a8', '1234567890', 'admin-151333909060286.png', '', '2017-12-15 11:58:10', 1),
(7, 1, 'Shahriar alam', 'Female', 'cseshahriar', 'shahriar@mail.com', 'b921530e7e31b066f9d6aa4c8e49e0a6', '01710835657', 'admin-151333928356972.png', 'mirpur', '2017-12-15 12:01:23', 0),
(8, 1, 'dolpin', 'Male', 'dolpin', 'dolpin@gmail.com', 'bb62e2cb4b7eb11df6d9c58f255ff3c5', '23456789', 'admin-151336436096771.png', 'Dhaka', '2017-12-15 18:59:20', 1),
(9, 1, 'ms', 'Male', 'sm', 'sm@mail.com', 'ed79acb0cd3d7f8320c53c7798335ef0', '34567890', 'admin-151336473560844.png', 'Dhaka', '2017-12-15 19:05:35', 1),
(10, 1, 'nc', 'Male', 'nc', 'nc@mail.com', '1e7342845e24eb3b5b3554490da1c128', '234567890', 'admin-151336504895269.png', 'Dhaka', '2017-12-15 19:10:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_date` date NOT NULL,
  `edition` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `pages` int(11) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `submit_date` date NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_return`
--

CREATE TABLE `book_return` (
  `id` int(11) NOT NULL,
  `issue_id` int(11) NOT NULL,
  `submited_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fine` float NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `book_type`
--

CREATE TABLE `book_type` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `class_name`, `active`) VALUES
(1, 'SSC', 1),
(2, 'HSC', 1),
(3, 'Degree', 1),
(4, 'Honours', 1),
(5, 'BSC', 1),
(6, 'Masters ', 1),
(7, 'MSC', 1),
(8, 'Teacher', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_name`, `active`) VALUES
(1, 'Science ', 1),
(2, 'Business Studies', 1),
(3, 'Humanities Department', 1),
(4, 'Bangla', 1),
(5, 'English', 1),
(6, 'Arabic', 1),
(7, 'Sanskrity', 1),
(8, 'History', 1),
(9, 'Islamic History &\r\nCulture', 1),
(10, 'Philosophy', 1),
(11, 'Islamic\r\nStudies', 1),
(12, 'Political\r\nScience', 1),
(13, 'Sociology', 1),
(14, 'Social Work', 1),
(15, 'Economics', 1),
(16, 'Anthropology', 1),
(17, 'Library & Information\r\nScience', 1),
(18, 'Home\r\nEconomics', 1),
(19, 'Physics', 1),
(20, 'Chemistry', 1),
(21, 'Bio-Chemistry', 1),
(22, 'Botany', 1),
(23, 'Zoology', 1),
(24, 'Soil Science', 1),
(25, 'Statistics', 1),
(26, 'Environmental\r\nScience', 1),
(27, 'Geography\r\nand Environment', 1),
(28, 'Psychology', 1),
(29, 'Marketing', 1),
(30, 'Finance', 1),
(31, 'Accounting', 1),
(32, 'Management', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(15) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `active`) VALUES
(1, 'Teacher', 1),
(2, 'Student', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `class_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `roll` int(11) NOT NULL,
  `designation` varchar(50) NOT NULL COMMENT 'for teachers',
  `address` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `gender`, `phone`, `username`, `email`, `password`, `class_id`, `dept_id`, `roll`, `designation`, `address`, `image`, `joined_at`, `active`) VALUES
(10, 1, 'Teacher', 'Male', '14234256372', 'teacher', 'teacher@gmail.com', '8d788385431273d11e8b43bb78f3aa41', 8, 1, 0, 'Instructor', 'Dhaka', 'admin-151340956920748.png', '2017-12-16 07:32:49', 0),
(11, 2, 'student', 'Male', '92389300', 'student', 'student@gmail.com', 'cd73502828457d15655bbd7a63fb0bc8', 5, 1, 747847, '', 'Dhaka', 'admin-151340968362100.png', '2017-12-16 07:34:43', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `book_return`
--
ALTER TABLE `book_return`
  ADD PRIMARY KEY (`id`),
  ADD KEY `issue_id` (`issue_id`);

--
-- Indexes for table `book_type`
--
ALTER TABLE `book_type`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_return`
--
ALTER TABLE `book_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`),
  ADD CONSTRAINT `users_ibfk_3` FOREIGN KEY (`dept_id`) REFERENCES `department` (`dept_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
