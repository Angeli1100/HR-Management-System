-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2023 at 06:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hr_manage_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usersID` bigint(20) UNSIGNED NOT NULL,
  `employeeName` varchar(255) NOT NULL,
  `dob_employee` varchar(200) NOT NULL,
  `NRIC_employee` varchar(255) NOT NULL,
  `gender_employee` varchar(255) NOT NULL,
  `nationality_employee` varchar(255) NOT NULL,
  `race_employee` varchar(255) NOT NULL,
  `marital_employee` varchar(255) NOT NULL,
  `children_employee` varchar(255) NOT NULL,
  `position_employee` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `acc_number` varchar(255) NOT NULL,
  `crime_employee` varchar(255) NOT NULL,
  `medical_employee` varchar(255) NOT NULL,
  `emergency_employee` varchar(255) NOT NULL,
  `emergency_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `usersID`, `employeeName`, `dob_employee`, `NRIC_employee`, `gender_employee`, `nationality_employee`, `race_employee`, `marital_employee`, `children_employee`, `position_employee`, `date`, `bank_name`, `acc_number`, `crime_employee`, `medical_employee`, `emergency_employee`, `emergency_name`, `address`, `city`, `postcode`, `state`, `country`, `remarks`, `created_at`, `updated_at`) VALUES
(9, 8, 'lol', '2023-05-10', '176236255323', 'male', 'fewfwe', 'ewffewfew', 'cwfwewfew', 'fwqfwfw', 'vefqfefre', '2023-05-10', 'feqfew', '3823723626', 'nkjdkqqbve', 'dkwlqndkwndj', '09183728372', 'njewqnifewbfew', 'vniwquiqvywque', 'vniqviqew', '732626', 'cdknwq', 'vndkqnjqk', 'cmdniwe', '2023-05-09 18:42:56', '2023-05-09 18:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT '3',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Admin', 'admin@mail.com', NULL, '$2y$10$0ib/jNzA.xm/YaFJVTTBh.PPe5xfwcuBSmrSuqvkz.qnQisCzhVmu', '1', NULL, '2023-05-09 17:26:16', '2023-05-09 17:26:16'),
(8, 'lol', 'lol@mail.com', NULL, '$2y$10$WjT/kTNqdbxdT58MkM2Rf.Pc0fQsj63mTtRYcq8SIGYpYNr4Rlmia', '3', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usersID` (`usersID`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_usersID` FOREIGN KEY (`usersID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
