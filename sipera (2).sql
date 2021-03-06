-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2022 at 03:42 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipera`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `event_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `with_internet` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`event_id`, `event_name`, `room_id`, `date`, `start`, `end`, `user_id`, `status`, `approver`, `notes`, `with_internet`, `created_at`, `updated_at`) VALUES
(11, 'Administrasi MR', 11, '2022-06-29', '13:00:00', '15:00:00', 5, 'rejected', 'Deni Muliana, S.Pd.', NULL, 1, '2022-06-29 04:19:32', '2022-06-29 04:19:32'),
(12, 'Tes', 11, '2022-06-29', '14:09:00', '15:10:00', 5, 'approved', 'Deni Muliana, S.Pd.', NULL, 0, '2022-06-29 07:09:54', '2022-06-29 07:09:54'),
(13, '', 11, '2022-06-29', '15:35:00', '17:35:00', 5, 'rejected', 'Deni Muliana, S.Pd.', NULL, 1, '2022-06-29 08:35:14', '2022-06-29 08:35:14'),
(14, 'gdgrvds', 11, '2022-06-29', '15:48:00', '16:49:00', 8, 'approved', 'Deni Muliana, S.Pd.', NULL, 0, '2022-06-29 08:48:54', '2022-06-29 08:48:54'),
(15, '', 11, '0000-00-00', '00:00:00', '00:00:00', 8, 'approved', 'Deni Muliana, S.Pd.', NULL, 1, '2022-06-29 09:42:56', '2022-06-29 09:42:56'),
(16, 'ddd', 11, '2022-06-29', '16:48:00', '17:48:00', 8, 'approved', 'Deni Muliana, S.Pd.', NULL, 1, '2022-06-29 09:48:46', '2022-06-29 09:48:46'),
(17, 'sdfghjkghfds', 11, '2022-06-29', '17:10:00', '20:11:00', 5, 'rejected', 'Cahya Ramdan Syah', NULL, 1, '2022-06-29 10:10:02', '2022-06-29 10:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `activity_products`
--

CREATE TABLE `activity_products` (
  `id_ap` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount_of_products` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_products`
--

INSERT INTO `activity_products` (`id_ap`, `activity_id`, `product_id`, `amount_of_products`, `created_at`, `updated_at`) VALUES
(31, 11, 1, 3, '2022-06-29 06:53:44', '2022-06-29 06:53:44'),
(32, 11, 5, 2, '2022-06-29 06:53:50', '2022-06-29 06:53:50'),
(34, 13, 1, 1, '2022-06-29 08:36:57', '2022-06-29 08:36:57'),
(35, 14, 1, 1, '2022-06-29 08:51:47', '2022-06-29 08:51:47'),
(38, 16, 5, 2, '2022-06-29 09:49:09', '2022-06-29 09:49:09'),
(39, 16, 1, 2, '2022-06-29 09:49:18', '2022-06-29 09:49:18'),
(41, 17, 5, 1, '2022-06-29 10:10:55', '2022-06-29 10:10:55'),
(42, 17, 8, 1, '2022-06-29 10:11:05', '2022-06-29 10:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 20, '2022-06-23 07:23:33', '2022-06-23 07:23:33'),
(5, 'Proyektor', 10, '2022-06-24 19:48:10', '2022-06-24 19:48:10'),
(8, 'Screen Proyektor', 10, '2022-06-25 09:03:41', '2022-06-25 09:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `photo`, `description`, `created_at`, `updated_at`) VALUES
(11, 'Multimedia', 'pict.jpg', '50 Orang', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','operator','officer','teacher') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `position`, `role`, `created_at`, `updated_at`) VALUES
(5, 'Cahya Ramdan Syah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Staff MRC', 'admin', '2022-06-24 03:17:01', '2022-06-23 17:00:00'),
(6, 'Ahmad Hakim Makarim', 'hakim', 'ee11cbb19052e40b07aac0ca060c23ee', 'Staff MRC', 'operator', '2022-06-24 03:52:54', '2022-06-24 03:52:54'),
(7, 'Deni Muliana, S.Pd.', 'wakasek', 'B0E01A6DB48522D0672ABC66C07965F6', 'Wakasek', 'officer', NULL, NULL),
(8, 'Iin Solihin, M.Pd.', 'iinsolihin', 'ee11cbb19052e40b07aac0ca060c23ee', 'Guru', 'teacher', '2022-06-29 08:44:27', '2022-06-29 08:44:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `activities_room_id_foreign` (`room_id`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `activity_products`
--
ALTER TABLE `activity_products`
  ADD PRIMARY KEY (`id_ap`),
  ADD KEY `activity_products_activity_id_foreign` (`activity_id`),
  ADD KEY `activity_products_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `activity_products`
--
ALTER TABLE `activity_products`
  MODIFY `id_ap` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `activity_products`
--
ALTER TABLE `activity_products`
  ADD CONSTRAINT `activity_products_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
