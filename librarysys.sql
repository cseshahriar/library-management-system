-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 06:30 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

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
(1, 1, 'Md. Shahriar Hosen', 'Male', 'admin', 'admin@lms.com', '21232f297a57a5a743894a0e4a801fc3', '01710835453', 'user.png', 'Dhaka', '2017-12-15 08:36:10', 1),
(12, 1, 'shahriar murol', 'Male', 'sm', 'shahriarmurol@gmail.com', 'ed79acb0cd3d7f8320c53c7798335ef0', '12345678', 'admin-151350531257583.png', 'Mirpur-Dhaka', '2017-12-17 10:08:32', 0),
(13, 1, '', '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', 'admin-151357631136731.', '', '2017-12-18 05:51:51', 0);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `edition` varchar(20) NOT NULL,
  `price` float NOT NULL,
  `pages` int(11) NOT NULL,
  `year` varchar(6) NOT NULL,
  `publisher` varchar(50) NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `cat_id`, `isbn`, `title`, `author`, `quantity`, `purchase_date`, `edition`, `price`, `pages`, `year`, `publisher`, `bill_no`, `active`) VALUES
(1, 1, '978-0596006302', 'Head First PHP and MySQLi', 'Michael Morriso', 2, '2017-10-31 00:00:00', 'Second Edition', 1843, 778, '2012', 'OREILL', '234567893', 1),
(2, 21, '34567890456789', 'Murachs PHP and MySQL', 'Ray Harris &amp;amp; Anne Boehm', 1, '2017-12-19 11:01:00', 'First Edition', 1500, 606, '2015', 'OREILLY', '4356789345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `issue_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `submit_date` datetime NOT NULL COMMENT '7 days from issue date',
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `user_id`, `book_id`, `issue_date`, `submit_date`, `active`) VALUES
(1, 10, 1, '2017-12-18 20:00:00', '2017-12-25 00:00:00', 1),
(2, 11, 2, '2017-12-18 19:00:00', '2017-12-25 00:00:00', 1),
(3, 11, 2, '2017-12-19 04:27:32', '2017-12-25 00:00:00', 0);

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

--
-- Dumping data for table `book_type`
--

INSERT INTO `book_type` (`cat_id`, `cat_name`, `active`) VALUES
(1, 'Science fiction', 1),
(2, 'Drama', 1),
(3, 'Action and Adventure', 1),
(4, 'Romance', 1),
(5, 'Mystery', 1),
(6, 'Horror', 1),
(7, 'Health', 1),
(8, 'Travel', 1),
(9, 'Children\'s', 1),
(10, 'Religion', 1),
(11, 'Science', 1),
(12, 'History', 1),
(13, 'Math', 1),
(14, 'Poetry', 1),
(15, 'Art', 1),
(16, 'Journals', 1),
(17, 'Biographies', 1),
(18, 'Autobiographies', 1),
(19, 'Fantasy', 1),
(20, 'Computer', 1),
(21, 'Programming', 1),
(22, 'Bangla', 1),
(23, 'English', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `class_name`, `active`) VALUES
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
  `id` int(11) NOT NULL,
  `dept_name` varchar(100) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `active`) VALUES
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
  `class_id` int(11) DEFAULT NULL,
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
(10, 1, 'Teacher2', 'Male', '23456787', 'teacher', 'teacher2@mail.com', '8d788385431273d11e8b43bb78f3aa41', NULL, 1, 0, '', 'Mirpur-Dhaka', 'admin-151340956920748.png', '2017-12-16 07:32:49', 1),
(11, 2, 'Teacher2', 'Male', '23456787', 'student', 'teacher2@mail.com', 'cd73502828457d15655bbd7a63fb0bc8', 5, 1, 0, '', 'Mirpur-Dhaka', 'admin-151340968362100.png', '2017-12-16 07:34:43', 1),
(19, 1, 'Teacher2', 'Male', '23456787', 'teacher1', 'teacher2@mail.com', '', 8, 0, 0, '', 'Mirpur-Dhaka', 'admin-151350619690353.png', '2017-12-17 10:23:16', 0);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `book_return`
--
ALTER TABLE `book_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book_type`
--
ALTER TABLE `book_type`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `book_type` (`cat_id`);

--
-- Constraints for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD CONSTRAINT `book_issue_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_issue_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `book_return`
--
ALTER TABLE `book_return`
  ADD CONSTRAINT `book_return_ibfk_1` FOREIGN KEY (`issue_id`) REFERENCES `book_issue` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
