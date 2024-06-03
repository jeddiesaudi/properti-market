-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 15, 2024 at 08:49 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proprent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `issuper` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `avatar`, `issuper`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dahyani', 'dahyani@example.com', '$2y$10$JHK.2MTc9ORMmmlqoF.gg.SwDLnevVSj1oreHParu5PvcPEDOWqe6', '1714371908.jpg', 1, NULL, NULL, '2024-04-29 07:25:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000004_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_09_103124_create_contactmessages_table', 1),
(4, '2019_04_05_100815_create_admins_table', 1),
(5, '2019_05_04_125148_create_user_emails_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_24_05_155443_create_komentars_table', 1),
(8, '2022_24_05_155549_create_artikels_table', 1),
(9, '2022_24_05_160000_create_properties_table', 1),
(10, '2022_24_05_160040_create_lahans_table', 1),
(11, '2022_24_05_160053_create_gudangs_table', 1),
(12, '2022_24_05_160109_create_gedungs_table', 1),
(13, '2022_24_05_160126_create_apartemens_table', 1),
(14, '2022_24_05_160133_create_rumahs_table', 1),
(15, '2022_24_05_230409_create_report_properties_table', 1),
(16, '2022_24_05_245806_create_transaksis_table', 1),
(17, '2022_24_05_245921_create_favorits_table', 1),
(18, '2024_04_24_142105_update_properties_table', 2),
(19, '2024_04_24_142741_update_rumahs_table', 3),
(20, '2024_04_24_143604_update_properties_table', 4),
(21, '2024_04_24_144115_update_rumahs_table', 5),
(22, '2024_05_07_095350_create_transactions_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wilayah` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `periode` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `name`, `type`, `wilayah`, `amount`, `city`, `periode`, `description`, `images`, `created_at`, `updated_at`) VALUES
(3, 1, 'PERUM DESA NANGGERANG', 'Rumah', 'JABODETABEK', 3620000, 'Bogor', 3, 'FASILITAS BLABLA BLA | LOKASI TERDEKAT BLABLABLA', '[\"real_662f1378d9cb8.png\",\"real_662f1379ef6ee.png\",\"real_662f137abdcfc.png\",\"real_662f137b974af.png\"]', '2024-04-29 04:26:52', '2024-04-29 04:26:52'),
(4, 1, 'RUKO SUSUKAN ALAM', 'Ruko', 'JABODETABEK', 24500000, 'Bogor', 12, 'FASILITAS A, B, C, D | LOKASI TERDEKAT E, F, G', '[\"real_662f13a97a083.png\",\"real_662f13aa31be2.png\",\"real_662f13ab0b98b.png\",\"real_662f13abc4cbd.png\"]', '2024-04-29 04:27:40', '2024-04-29 04:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `rumahs`
--

CREATE TABLE `rumahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rumahs`
--

INSERT INTO `rumahs` (`id`, `property_id`, `stok`, `created_at`, `updated_at`) VALUES
(3, 3, 15, '2024-04-29 04:26:52', '2024-05-15 09:48:18'),
(4, 4, 7, '2024-04-29 04:27:40', '2024-04-29 04:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `renter_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renter_contact` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renter_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rent_start` date NOT NULL,
  `rent_end` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `property_id`, `renter_name`, `renter_contact`, `renter_address`, `rent_start`, `rent_end`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 'Jeddie', '081231238', 'Serang, Banten', '2024-05-01', '2024-08-31', 'Rented', '2024-05-07 07:07:14', '2024-05-07 07:07:14'),
(3, 3, 'Otih', '081231231', 'Serang', '2024-06-01', '2024-08-31', 'Rented', '2024-05-15 09:48:18', '2024-05-15 09:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.jpg',
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `NIC` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `phoneNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `description`, `NIC`, `address`, `city`, `gender`, `birthday`, `phoneNo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dahyani Staf Properti', 'dahyani@example.com', '2024-03-25 12:54:11', '$2y$10$JHK.2MTc9ORMmmlqoF.gg.SwDLnevVSj1oreHParu5PvcPEDOWqe6', '1714371933.jpg', 'Admin Staf Properti', '123123123123', 'Bogor', 'Bogor', 'Laki-Laki', '1999-01-28', '0812312313', NULL, NULL, '2024-04-29 07:25:33'),
(6, 'jedday', 'jedday@example.com', NULL, '$2y$10$THBT15xUKDwjk0TQIpGmXOlk8k/ca4OyGl1RCepoTTezQVNwVkbEC', 'user.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-05-03 04:21:00', '2024-05-03 04:21:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rumahs`
--
ALTER TABLE `rumahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rumahs_property_id_foreign` (`property_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_property_id_foreign` (`property_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rumahs`
--
ALTER TABLE `rumahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rumahs`
--
ALTER TABLE `rumahs`
  ADD CONSTRAINT `rumahs_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
