-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2024 at 02:51 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `properti`
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
(1, 'Dahyani', 'dahyani@email.com', '$2y$10$tjEkfXLiHAgvgAD.2uDb4uxgQD1xxS4a2y85C4hmeCOgO3NP.fewy', 'user.jpg', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `apartemens`
--

CREATE TABLE `apartemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `noOfRooms` int(11) NOT NULL,
  `noOfKitchen` int(11) NOT NULL,
  `noOfWashrooms` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `nearestSchool` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestRailway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestBusStop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorits`
--

CREATE TABLE `favorits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rumah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gedung_id` bigint(20) UNSIGNED DEFAULT NULL,
  `apartemen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gedungs`
--

CREATE TABLE `gedungs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `agreement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noOfFloors` int(11) NOT NULL,
  `lift` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carPark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `floorSize` int(11) NOT NULL,
  `nearestSchool` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestRailway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestBusStop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gudangs`
--

CREATE TABLE `gudangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `electricity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parkingArea` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentars`
--

CREATE TABLE `komentars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `artikel_id` int(11) NOT NULL,
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lahans`
--

CREATE TABLE `lahans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `electricity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tapwater` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `nearestSchool` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestRailway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestBusStop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(17, '2022_24_05_245921_create_favorits_table', 1);

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
  `latitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postalCode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `availability` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contatctEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `report_properties`
--

CREATE TABLE `report_properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `rumah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gedung_id` bigint(20) UNSIGNED DEFAULT NULL,
  `apartemen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reporterEmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Reason` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rumahs`
--

CREATE TABLE `rumahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `noOfRooms` int(11) NOT NULL,
  `noOfKitchen` int(11) NOT NULL,
  `noOfFloors` int(11) NOT NULL,
  `noOfWashrooms` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `swimmingPool` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `garden` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestSchool` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestRailway` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nearestBusStop` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `rumah_id` bigint(20) UNSIGNED DEFAULT NULL,
  `lahan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gedung_id` bigint(20) UNSIGNED DEFAULT NULL,
  `apartemen_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gudang_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offeredUser` bigint(20) UNSIGNED NOT NULL,
  `offerAmount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `user_emails`
--

CREATE TABLE `user_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `senderName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senderMail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneNo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `apartemens`
--
ALTER TABLE `apartemens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartemens_property_id_foreign` (`property_id`);

--
-- Indexes for table `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artikels_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `favorits`
--
ALTER TABLE `favorits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorits_property_id_foreign` (`property_id`),
  ADD KEY `favorits_user_id_foreign` (`user_id`),
  ADD KEY `favorits_rumah_id_foreign` (`rumah_id`),
  ADD KEY `favorits_lahan_id_foreign` (`lahan_id`),
  ADD KEY `favorits_gedung_id_foreign` (`gedung_id`),
  ADD KEY `favorits_apartemen_id_foreign` (`apartemen_id`),
  ADD KEY `favorits_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `gedungs`
--
ALTER TABLE `gedungs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gedungs_property_id_foreign` (`property_id`);

--
-- Indexes for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gudangs_property_id_foreign` (`property_id`);

--
-- Indexes for table `komentars`
--
ALTER TABLE `komentars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lahans`
--
ALTER TABLE `lahans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lahans_property_id_foreign` (`property_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `report_properties`
--
ALTER TABLE `report_properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_properties_property_id_foreign` (`property_id`),
  ADD KEY `report_properties_rumah_id_foreign` (`rumah_id`),
  ADD KEY `report_properties_lahan_id_foreign` (`lahan_id`),
  ADD KEY `report_properties_gedung_id_foreign` (`gedung_id`),
  ADD KEY `report_properties_apartemen_id_foreign` (`apartemen_id`),
  ADD KEY `report_properties_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `rumahs`
--
ALTER TABLE `rumahs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rumahs_property_id_foreign` (`property_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_property_id_foreign` (`property_id`),
  ADD KEY `transaksis_offereduser_foreign` (`offeredUser`),
  ADD KEY `transaksis_rumah_id_foreign` (`rumah_id`),
  ADD KEY `transaksis_lahan_id_foreign` (`lahan_id`),
  ADD KEY `transaksis_gedung_id_foreign` (`gedung_id`),
  ADD KEY `transaksis_apartemen_id_foreign` (`apartemen_id`),
  ADD KEY `transaksis_gudang_id_foreign` (`gudang_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_emails`
--
ALTER TABLE `user_emails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apartemens`
--
ALTER TABLE `apartemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorits`
--
ALTER TABLE `favorits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gedungs`
--
ALTER TABLE `gedungs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gudangs`
--
ALTER TABLE `gudangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komentars`
--
ALTER TABLE `komentars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lahans`
--
ALTER TABLE `lahans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_properties`
--
ALTER TABLE `report_properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rumahs`
--
ALTER TABLE `rumahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_emails`
--
ALTER TABLE `user_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartemens`
--
ALTER TABLE `apartemens`
  ADD CONSTRAINT `apartemens_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `favorits`
--
ALTER TABLE `favorits`
  ADD CONSTRAINT `favorits_apartemen_id_foreign` FOREIGN KEY (`apartemen_id`) REFERENCES `apartemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorits_gedung_id_foreign` FOREIGN KEY (`gedung_id`) REFERENCES `gedungs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorits_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorits_lahan_id_foreign` FOREIGN KEY (`lahan_id`) REFERENCES `lahans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorits_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorits_rumah_id_foreign` FOREIGN KEY (`rumah_id`) REFERENCES `rumahs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favorits_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gedungs`
--
ALTER TABLE `gedungs`
  ADD CONSTRAINT `gedungs_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gudangs`
--
ALTER TABLE `gudangs`
  ADD CONSTRAINT `gudangs_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lahans`
--
ALTER TABLE `lahans`
  ADD CONSTRAINT `lahans_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `report_properties`
--
ALTER TABLE `report_properties`
  ADD CONSTRAINT `report_properties_apartemen_id_foreign` FOREIGN KEY (`apartemen_id`) REFERENCES `apartemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_properties_gedung_id_foreign` FOREIGN KEY (`gedung_id`) REFERENCES `gedungs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_properties_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_properties_lahan_id_foreign` FOREIGN KEY (`lahan_id`) REFERENCES `lahans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_properties_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `report_properties_rumah_id_foreign` FOREIGN KEY (`rumah_id`) REFERENCES `rumahs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rumahs`
--
ALTER TABLE `rumahs`
  ADD CONSTRAINT `rumahs_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_apartemen_id_foreign` FOREIGN KEY (`apartemen_id`) REFERENCES `apartemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_gedung_id_foreign` FOREIGN KEY (`gedung_id`) REFERENCES `gedungs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_gudang_id_foreign` FOREIGN KEY (`gudang_id`) REFERENCES `gudangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_lahan_id_foreign` FOREIGN KEY (`lahan_id`) REFERENCES `lahans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_offereduser_foreign` FOREIGN KEY (`offeredUser`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transaksis_rumah_id_foreign` FOREIGN KEY (`rumah_id`) REFERENCES `rumahs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
