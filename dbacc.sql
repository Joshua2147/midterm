-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 04:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbacc`
--

-- --------------------------------------------------------

--
-- Table structure for table `code`
--

CREATE TABLE `code` (
  `code_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `code`
--

INSERT INTO `code` (`code_id`, `user_id`, `code`, `created_at`, `expiration`) VALUES
(1, 1, 338422, '2021-04-29 12:34:00', '2021-04-29 12:39:00'),
(2, 1, 278149, '2021-04-29 12:36:19', '2021-04-29 12:41:19'),
(3, 1, 551196, '2021-04-29 12:37:53', '2021-04-29 12:42:53'),
(4, 5, 474065, '2021-04-29 13:15:05', '2021-04-29 13:20:05'),
(5, 4, 904368, '2021-04-29 15:09:14', '2021-04-29 15:14:14'),
(6, 1, 108302, '2021-04-29 22:13:48', '2021-04-29 22:18:48'),
(7, 6, 773901, '2021-04-29 22:34:21', '2021-04-29 22:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `user_id`, `activity`, `time`) VALUES
(3, 1, 'Login', '2021-04-29 04:36:34'),
(4, 1, 'Logout', '2021-04-29 04:36:39'),
(5, 1, 'Login', '2021-04-29 04:37:56'),
(6, 5, 'Login', '2021-04-29 05:15:09'),
(7, 5, 'Logout', '2021-04-29 05:15:17'),
(8, 4, 'Login', '2021-04-29 07:09:18'),
(9, 4, 'Logout', '2021-04-29 07:09:26'),
(10, 1, 'Login', '2021-04-29 14:13:51'),
(11, 1, 'Logout', '2021-04-29 14:18:50'),
(12, 6, 'Login', '2021-04-29 14:34:26'),
(13, 6, 'Logout', '2021-04-29 14:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'ADMIN', 'ADMIN123', ''),
(3, 'joshua', 'Joshua123456!', 'crisostomojoshua199@gmail.com'),
(4, 'joshuaa', 'Glominie12345!', 'crisostomojoshua200@gmail.com'),
(5, 'joshuaaa', 'Joshua12345!', 'crisostomojoshua250@gmail.com'),
(6, 'ADMIN12345', 'Adminnew12345!', 'admin12345@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `code`
--
ALTER TABLE `code`
  ADD PRIMARY KEY (`code_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `code`
--
ALTER TABLE `code`
  MODIFY `code_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
