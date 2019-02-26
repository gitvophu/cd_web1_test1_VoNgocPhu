-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 26, 2019 at 11:33 AM
-- Server version: 5.7.23
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooflight`
--

-- --------------------------------------------------------

--
-- Table structure for table `airline_org`
--

DROP TABLE IF EXISTS `airline_org`;
CREATE TABLE IF NOT EXISTS `airline_org` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `airline_org`
--

INSERT INTO `airline_org` (`id`, `name`, `code`) VALUES
(1, 'VietNam Airlines', 'VNAL'),
(2, 'Quatar Airlines', 'QAL'),
(3, 'Korean Airlines', 'KAL');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Sài Gòn', 'SGN', NULL, NULL),
(2, 'Hà Nội', 'HN', NULL, NULL),
(3, 'Đã Nẵng', 'DNG', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

DROP TABLE IF EXISTS `flight`;
CREATE TABLE IF NOT EXISTS `flight` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `org_id` int(10) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `flight_type` int(10) UNSIGNED NOT NULL,
  `departure` timestamp NOT NULL,
  `return` timestamp NOT NULL,
  `duration` int(11) NOT NULL,
  `transit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `flight_org_id_foreign` (`org_id`),
  KEY `flight_from_foreign` (`from`),
  KEY `flight_to_foreign` (`to`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`id`, `org_id`, `from`, `to`, `flight_type`, `departure`, `return`, `duration`, `transit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, '2018-12-31 21:30:00', '2019-01-02 00:30:00', 8, 5, NULL, NULL),
(2, 2, 2, 3, 1, '2018-12-31 18:30:00', '2019-01-02 01:30:00', 2, 4, NULL, NULL),
(3, 3, 1, 2, 1, '2019-01-01 02:30:00', '2019-01-01 18:30:00', 44, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

DROP TABLE IF EXISTS `flight_booking`;
CREATE TABLE IF NOT EXISTS `flight_booking` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `departure` timestamp NOT NULL,
  `way_type` int(11) NOT NULL,
  `return` timestamp NOT NULL,
  `total_person` int(11) NOT NULL,
  `flight_class` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(82, '2014_10_12_000000_create_users_table', 1),
(83, '2014_10_12_100000_create_password_resets_table', 1),
(84, '2019_02_20_074959_create_flight_booking_table', 1),
(85, '2019_02_20_085114_create_city_table', 1),
(86, '2019_02_20_150112_create_airline_org_table', 1),
(87, '2019_02_20_150418_create_flight_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_access` timestamp NULL DEFAULT NULL,
  `attempt` int(11) DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `last_access`, `attempt`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khach hang 1', 'kh1@gmail.com', 'kh1@gmail.com', '$2y$10$yrnvDJD5bhgDLsmpflQVIeowNEgffkW5yhPLJKmA2d/sf/Ot2EDa2', NULL, 0, 1, '', '2019-02-26 04:31:26', '2019-02-26 04:31:26'),
(2, 'Khach hang 2', 'kh2@gmail.com', 'kh2@gmail.com', '$2y$10$KTCJp22vFZDu9UUTUBteZuv3so5I2ScsS7f6FKOrkhxawgbQL3Uay', NULL, 0, 1, '', '2019-02-26 04:31:26', '2019-02-26 04:31:26'),
(3, 'Khach hang 3', 'kh3@gmail.com', 'kh3@gmail.com', '$2y$10$eVm6RJNewRv1fHyxxohWaec2mBDWhvx4YZ0BHKA4C18kjOaONiE0q', NULL, 0, 1, '', '2019-02-26 04:31:26', '2019-02-26 04:31:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
