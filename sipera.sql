-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2022 pada 06.40
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

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
-- Struktur dari tabel `activities`
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
-- Dumping data untuk tabel `activities`
--

INSERT INTO `activities` (`event_id`, `event_name`, `room_id`, `date`, `start`, `end`, `user_id`, `status`, `approver`, `notes`, `with_internet`, `created_at`, `updated_at`) VALUES
(5, 'Kegiatan MPLS', 3, '2022-06-27', '08:00:00', '15:00:00', 5, 'approved', 'Deni Muliana, S.Pd.', 'Pinjam Ruangan untuk MPLS', 0, NULL, NULL),
(6, 'Contoh', 10, '2022-06-27', '00:53:00', '01:53:00', 5, 'rejected', 'Ahmad Hakim Makarim', NULL, 1, '2022-06-26 17:53:35', '2022-06-26 17:53:35'),
(7, 'tes', 2, '2022-06-27', '01:17:00', '02:17:00', 6, 'rejected', 'Ahmad Hakim Makarim', NULL, 0, '2022-06-26 18:17:15', '2022-06-26 18:17:15'),
(8, 'fafafsd', 4, '2022-06-27', '01:22:00', '02:22:00', 6, 'approved', 'Cahya Ramdan Syah', NULL, 1, '2022-06-26 18:22:35', '2022-06-26 18:22:35'),
(9, 'Contoh', 1, '2022-06-27', '08:07:00', '09:07:00', 5, 'pending', '', NULL, 1, '2022-06-27 01:07:36', '2022-06-27 01:07:36'),
(10, 'Contoh', 1, '2022-06-27', '08:18:00', '08:18:00', 5, 'pending', '', NULL, 1, '2022-06-27 01:18:30', '2022-06-27 01:18:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `activity_products`
--

CREATE TABLE `activity_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount_of_products` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `activity_products`
--

INSERT INTO `activity_products` (`id`, `activity_id`, `product_id`, `amount_of_products`, `created_at`, `updated_at`) VALUES
(15, 7, 5, 0, '2022-06-26 19:43:06', '2022-06-26 19:43:06'),
(16, 7, 1, 0, '2022-06-26 19:43:58', '2022-06-26 19:43:58'),
(19, 10, 5, 1, '2022-06-27 04:31:10', '2022-06-27 04:31:10'),
(20, 5, 1, 2, '2022-06-27 04:31:54', '2022-06-27 04:31:54'),
(21, 5, 5, 1, '2022-06-27 04:34:13', '2022-06-27 04:34:13'),
(22, 5, 8, 2, '2022-06-27 04:34:19', '2022-06-27 04:34:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `product_name`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'Laptop', 20, '2022-06-23 07:23:33', '2022-06-23 07:23:33'),
(5, 'Proyektor', 10, '2022-06-24 19:48:10', '2022-06-24 19:48:10'),
(8, 'Screen Proyektor', 10, '2022-06-25 09:03:41', '2022-06-25 09:03:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
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
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `photo`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Room 11223', '', '74 User', '2022-06-23 07:23:33', '2022-06-23 07:23:33'),
(2, 'Room 2', NULL, '194 rooms', '2022-06-23 07:23:33', '2022-06-23 07:23:33'),
(3, 'Room 3', NULL, '155 rooms', '2022-06-23 07:23:33', '2022-06-23 07:23:33'),
(4, 'Room 4', NULL, '163 rooms', '2022-06-23 07:23:33', '2022-06-23 07:23:33'),
(5, 'Room 5', NULL, '125 rooms', '2022-06-23 07:23:33', '2022-06-23 07:23:33'),
(10, 'Multimedia', '', 'Kapasitas 60 Orang\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `position`, `role`, `created_at`, `updated_at`) VALUES
(5, 'Cahya Ramdan Syah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Staff MRC', 'admin', '2022-06-24 03:17:01', '2022-06-23 17:00:00'),
(6, 'Ahmad Hakim Makarim', 'hakim', 'ee11cbb19052e40b07aac0ca060c23ee', 'Staff MRC', 'operator', '2022-06-24 03:52:54', '2022-06-24 03:52:54'),
(7, 'Deni Muliana, S.Pd.', 'wakasek', 'B0E01A6DB48522D0672ABC66C07965F6', 'Wakasek', 'officer', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `activities_room_id_foreign` (`room_id`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `activity_products`
--
ALTER TABLE `activity_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_products_activity_id_foreign` (`activity_id`),
  ADD KEY `activity_products_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `activities`
--
ALTER TABLE `activities`
  MODIFY `event_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `activity_products`
--
ALTER TABLE `activity_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `activity_products`
--
ALTER TABLE `activity_products`
  ADD CONSTRAINT `activity_products_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
