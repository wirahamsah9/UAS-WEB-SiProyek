-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2024 at 03:52 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management3`
--

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `description` text,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `description`, `start_date`, `end_date`, `created_at`) VALUES
(1, 'Project Alpha x1', 'Description for Project Alpha x1', '2023-01-07', '2023-06-23', '2024-07-10 07:19:58'),
(2, 'Project Beta', 'Description for Project Beta', '2023-02-01', '2023-07-01', '2024-07-10 07:19:58'),
(4, 'Project web management proyek', 'ini adalah proyek SI berbasis web ', '2024-07-13', '2026-11-26', '2024-07-10 07:06:34'),
(5, 'Project Alpha', 'Description for Project Alpha', '2023-01-01', '2023-06-01', '2024-07-10 07:12:03'),
(6, 'Project Beta 2.0', 'Description for Project Beta', '2023-02-01', '2023-07-01', '2024-07-10 07:12:03'),
(7, 'Project Alpha', 'Description for Project Alpha', '2023-01-01', '2023-06-01', '2024-07-10 07:14:00'),
(8, 'Project Beta', 'Description for Project Beta', '2023-02-01', '2023-07-01', '2024-07-10 07:14:00'),
(10, 'software build', 'no describe --', '2024-07-13', '2024-07-13', '2024-07-10 18:40:47'),
(14, 'Project UAS', 'project UAS pemrograman web 2024', '2024-05-01', '2024-07-11', '2024-07-11 02:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `resource_name` varchar(100) NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `project_id`, `resource_name`, `quantity`, `created_at`) VALUES
(2, 1, 'Resource A2223', 214, '2024-07-10 07:19:58'),
(3, 2, 'Resource B1 x', 61, '2024-07-10 07:19:58'),
(4, 2, 'Resource B2', 6, '2024-07-10 07:19:58'),
(5, 1, 'Resource Q21', 4555, '2024-07-10 17:29:53'),
(8, 2, '123 ', 5, '2024-07-10 18:22:51'),
(10, 1, 'Resource A222214', -321, '2024-07-10 19:34:25'),
(11, 1, 'Resource Q21q', 432, '2024-07-10 19:37:51'),
(12, 1, 'Resource B1 xy', 98, '2024-07-10 20:26:02'),
(17, 1, 'Resource Q21', -20, '2024-07-11 00:27:52'),
(18, 10, 'Resource Q4554', 313, '2024-07-11 00:34:23'),
(19, 4, 'Resource Q4554', 132, '2024-07-11 02:48:57'),
(20, 1, 'Resource Q21999', 4564, '2024-07-11 03:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int NOT NULL,
  `project_id` int NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `project_id`, `task_name`, `start_date`, `end_date`, `created_at`) VALUES
(9, 1, 'Task A1', '2023-01-01', '2023-01-15', '2024-07-10 07:19:58'),
(10, 1, 'Task A2', '2023-01-16', '2023-02-01', '2024-07-10 07:19:58'),
(11, 2, 'Task B1', '2023-02-01', '2023-02-15', '2024-07-10 07:19:58'),
(12, 2, 'Task B2', '2023-02-16', '2023-03-01', '2024-07-10 07:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'me', '123', 'me@gmail.com', '2024-07-08 10:45:05'),
(2, 'root', '$2y$10$cL8khfARf2n/KEFRQVBmS.tasmBMyRxanAUnDztTJFr/svvSFdnXq', 'root@mail.com', '2024-07-10 05:06:52'),
(3, 'root2', '$2y$10$IOpjUVO5XJH4unGKQUkUGOTzfo9Vl5m1nQt8/9J4qgFxAA6X5K8AO', 'root2@mail.com', '2024-07-10 08:12:15'),
(4, 'yana', '$2y$10$9VjfbFcVIOaKNCFcLhab4OS8b88rwNJsQjQwAcvaoTEBWTvybqeGu', 'yana@mail.com', '2024-07-10 08:19:21'),
(5, 'sayasaya', '$2y$10$4VzxXKCkv22nRXYFvLSoyu3xgWEw215fwgsCyGP7MY1FLLVpeSUgi', 'saya@mail.com', '2024-07-10 08:51:18'),
(6, 'me12345', '$2y$10$LeaSCLKZblqNhxMgA6w1aOGgXm.hXTRMkFInpDIhDiNYqOxJUWynq', 'me2@gmail.com', '2024-07-10 08:52:33'),
(7, 'tahu12345', '$2y$10$mmPUD9vuD./Cd9YUPH3AnuHp6NsiLq7PE3iEfeEDGAMLWJAHiOUa2', 'tahu@mail.com', '2024-07-10 18:39:52'),
(8, '1234567', '$2y$10$a/lcNvnwICzipPoi.LgFxe6JmyB72CpbNFYPiPjGZtvzNzxLtDvBG', '1234567@gmai.com', '2024-07-10 22:43:25'),
(9, 'sho0000', '$2y$10$Du5aub97EzoDAnq5RHjWQeGKkbTlahKh6NyeDgGzMJJdCzm1GYFmG', 'dikin@mail.com', '2024-07-11 03:28:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `resources`
--
ALTER TABLE `resources`
  ADD CONSTRAINT `resources_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
