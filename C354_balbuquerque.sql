-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2019 at 08:52 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `C354_balbuquerque`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `Max` int(100) NOT NULL,
  `Assignment_name` varchar(255) NOT NULL,
  `class_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`id`, `Max`, `Assignment_name`, `class_id`) VALUES
(57, 50, 'Oracle Assignment 1', 2),
(58, 60, 'Oracle Assignment 2', 2),
(59, 75, 'Oracle Assignment 3', 2),
(60, 40, 'CISCO Assignment 1', 3),
(61, 80, 'CISCO Assignment 2', 3),
(62, 100, 'Microsoft Assignment 1', 4),
(63, 100, 'Microsoft Assignment 2', 4),
(64, 150, 'Microsoft Assignment 3', 4),
(65, 150, 'AWS Assignment 1', 5),
(66, 50, 'AWS Assignment 2', 5),
(67, 15, 'CS showcase', 2);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`) VALUES
(2, 'Oracle class'),
(3, 'CISCO class'),
(4, 'Microsoft class'),
(5, 'AWS class');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `assignment_id` int(10) NOT NULL,
  `grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `user_id`, `assignment_id`, `grade`) VALUES
(63, 38, 57, 12),
(64, 38, 58, 30),
(65, 38, 59, 46),
(66, 39, 57, 22),
(67, 39, 58, 45),
(68, 40, 57, 45),
(69, 40, 58, 45),
(70, 40, 59, 59),
(71, 41, 60, 15),
(72, 41, 61, 22),
(73, 42, 60, 34),
(75, 42, 61, 38),
(76, 43, 62, 80),
(77, 43, 63, 78),
(78, 43, 64, 98),
(79, 44, 62, 34),
(80, 44, 63, 55),
(81, 45, 65, 55),
(82, 45, 66, 40),
(83, 46, 65, 30),
(84, 46, 66, 50),
(85, 47, 65, 53);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `Username` varchar(32) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Full_name` varchar(64) NOT NULL,
  `class_id` int(10) NOT NULL,
  `user_type` int(2) NOT NULL,
  `Date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `Username`, `Password`, `Full_name`, `class_id`, `user_type`, `Date`) VALUES
(38, 'Oracle Student 1', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Oracle Student 1', 2, 0, 20190405),
(39, 'Oracle Student 2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Oracle Student 2', 2, 0, 20190405),
(40, 'Oracle Student 3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Oracle Student 3', 2, 0, 20190405),
(41, 'CISCO Student 1', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'CISCO Student 1', 3, 0, 20190405),
(42, 'CISCO Student 2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'CISCO Student 2', 3, 0, 20190405),
(43, 'Microsoft Student 1', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Microsoft Student 1', 4, 0, 20190405),
(44, 'Microsoft Student 2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Microsoft Student 2', 4, 0, 20190405),
(45, 'AWS Student 1', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'AWS Student 1', 5, 0, 20190405),
(46, 'AWS Student 2', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'AWS Student 2', 5, 0, 20190405),
(47, 'AWS Student 3', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'AWS Student 3', 5, 0, 20190405),
(49, 'Teacher', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'Teacher', 0, 1, 20190405);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
