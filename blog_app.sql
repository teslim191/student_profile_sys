-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2022 at 02:07 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `details`
--

INSERT INTO `details` (`id`, `fullname`, `email`, `course`, `amount`, `duration`, `instructor`, `status`, `created_at`) VALUES
(7, 'Peter Mike', 'peter@gmail.com', 'Web Application Devlopment', '60000', '10 weeks', 'Yusuf', 'Current', '2022-10-04 12:24:05'),
(20, 'Teslim Jimoh', 'teslimjimoh191@gmail.com', 'Web Application Devlopment', '60000', '10 weeks', 'Bukola', 'Current', '2022-10-04 12:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `image_name`, `created_at`) VALUES
(1, 'Teslim Jimoh', 'teslimjimoh191@gmail.com', '3e05fe3c93f4254f5f0ef75d8cd654f64bedfb92', '20210713_184209.jpg', '2022-09-26 16:27:55'),
(2, 'Faatihat mohammed', 'fm@gmail.com', '472c97af3520e6a7d6e0394ec0d156cbeb963896', '20210713_184209.jpg', '2022-09-26 16:30:15'),
(3, 'Teslim Jimoh', 'teslim.jimoh@outlook.com', '3e05fe3c93f4254f5f0ef75d8cd654f64bedfb92', '20210713_184209.jpg', '2022-09-27 15:23:02'),
(4, 'Peter Mike', 'peter@gmail.com', '328854132bf61a37c6b4a64be7b23d03b74f8f83', 'big.webp', '2022-09-30 14:33:09'),
(5, 'Qasim Abdullahi', 'Qasim@gmail.com', '165c3002ad30ece950c72513d53ae39a88400099', 'profile_user.jpg', '2022-09-30 16:21:50'),
(6, 'john doe', 'john@gmail.com', '31f51faebeaafcb546721a7bd012db57b5434992', 'profile_user.jpg', '2022-10-04 12:29:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `details`
--
ALTER TABLE `details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
