-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 01, 2019 lúc 10:21 AM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `fooflight`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `airline_org`
--

CREATE TABLE `airline_org` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `airline_org`
--

INSERT INTO `airline_org` (`id`, `name`, `code`) VALUES
(1, 'VietNam Airlines', 'VNAL'),
(2, 'Quatar Airlines', 'QAL'),
(3, 'Korean Airlines', 'KAL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Sài Gòn', 'SGN', NULL, NULL),
(2, 'Hà Nội', 'HN', NULL, NULL),
(3, 'Đã Nẵng', 'DNG', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight`
--

CREATE TABLE `flight` (
  `id` int(10) UNSIGNED NOT NULL,
  `org_id` int(10) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `flight_type` int(10) UNSIGNED NOT NULL,
  `economy_seat_num` int(11) NOT NULL,
  `economy_premium_seat_num` int(11) NOT NULL,
  `bussiness_seat_num` int(11) NOT NULL,
  `departure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `return` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `transit` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight`
--

INSERT INTO `flight` (`id`, `org_id`, `from`, `to`, `flight_type`, `economy_seat_num`, `economy_premium_seat_num`, `bussiness_seat_num`, `departure`, `return`, `duration`, `transit`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 2, 30, 20, 10, '2018-12-31 21:30:00', '2019-01-02 00:30:00', 8, 5, NULL, NULL),
(2, 2, 2, 3, 1, 30, 20, 10, '2018-12-31 18:30:00', '2019-01-02 01:30:00', 2, 4, NULL, NULL),
(3, 3, 1, 2, 1, 30, 20, 10, '2019-01-01 02:30:00', '2019-01-01 18:30:00', 44, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_booking`
--

CREATE TABLE `flight_booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `flight_id` int(10) UNSIGNED NOT NULL,
  `departure` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `flight_type` int(11) NOT NULL,
  `return` timestamp NULL DEFAULT NULL,
  `total_person` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `flight_class_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight_booking`
--

INSERT INTO `flight_booking` (`id`, `from`, `to`, `flight_id`, `departure`, `flight_type`, `return`, `total_person`, `user_id`, `flight_class_id`) VALUES
(1, 1, 2, 1, '2019-01-01 02:30:00', 1, '2019-01-02 02:30:00', 2, 1, 1),
(2, 1, 2, 1, '2019-01-01 02:30:00', 3, '2019-01-02 02:30:00', 4, 3, 3),
(3, 1, 2, 1, '2019-01-01 02:30:00', 1, '2019-01-02 02:30:00', 3, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_class`
--

CREATE TABLE `flight_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight_class`
--

INSERT INTO `flight_class` (`id`, `name`) VALUES
(1, 'Bussiness'),
(2, 'Economy'),
(3, 'Economy Premium');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_type`
--

CREATE TABLE `flight_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight_type`
--

INSERT INTO `flight_type` (`id`, `name`) VALUES
(1, 'One way'),
(2, 'Return');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(67, '2014_10_12_000000_create_users_table', 1),
(68, '2014_10_12_100000_create_password_resets_table', 1),
(69, '2019_02_08_085114_create_city_table', 1),
(70, '2019_02_09_150112_create_airline_org_table', 1),
(71, '2019_02_09_155848_create_flight_type_table', 1),
(72, '2019_02_10_153401_create_flight_class_table', 1),
(73, '2019_02_11_150418_create_flight_table', 1),
(74, '2019_02_20_074959_create_flight_booking_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_access` timestamp NULL DEFAULT NULL,
  `attempt` int(11) DEFAULT '0',
  `active` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `last_access`, `attempt`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Khach hang 1', 'kh1@gmail.com', 'kh1@gmail.com', '$2y$10$vTEVBokhNmm7dYuM/Ym3COCiXiLe/ew2d8LOFNDL2lGVQJ8oEK4O2', NULL, 0, 1, '', '2019-02-28 09:09:01', '2019-02-28 09:09:01'),
(2, 'Khach hang 2', 'kh2@gmail.com', 'kh2@gmail.com', '$2y$10$izDBrW6rCAgVDJO7CYiIau3J6KLpp2X3DEpxLBy0rWSYrzXSHnwXi', NULL, 0, 1, '', '2019-02-27 21:09:01', '2019-02-28 09:09:01'),
(3, 'Khach hang 3', 'kh3@gmail.com', 'kh3@gmail.com', '$2y$10$VGnK.J.AO7kY6mBqDvxsk.E7NyOInXFbussJnaZlqjm6cfpSK9ubq', NULL, 0, 1, '', '2019-02-27 21:09:02', '2019-02-28 09:09:02');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `airline_org`
--
ALTER TABLE `airline_org`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_org_id_foreign` (`org_id`),
  ADD KEY `flight_from_foreign` (`from`),
  ADD KEY `flight_to_foreign` (`to`);

--
-- Chỉ mục cho bảng `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flight_booking_user_id_foreign` (`user_id`),
  ADD KEY `flight_booking_flight_class_id_foreign` (`flight_class_id`),
  ADD KEY `flight_booking_flight_id_foreign` (`flight_id`);

--
-- Chỉ mục cho bảng `flight_class`
--
ALTER TABLE `flight_class`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `flight_type`
--
ALTER TABLE `flight_type`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `airline_org`
--
ALTER TABLE `airline_org`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `flight_class`
--
ALTER TABLE `flight_class`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `flight_type`
--
ALTER TABLE `flight_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `flight`
--
ALTER TABLE `flight`
  ADD CONSTRAINT `flight_from_foreign` FOREIGN KEY (`from`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `flight_org_id_foreign` FOREIGN KEY (`org_id`) REFERENCES `airline_org` (`id`),
  ADD CONSTRAINT `flight_to_foreign` FOREIGN KEY (`to`) REFERENCES `city` (`id`);

--
-- Các ràng buộc cho bảng `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD CONSTRAINT `flight_booking_flight_class_id_foreign` FOREIGN KEY (`flight_class_id`) REFERENCES `flight_class` (`id`),
  ADD CONSTRAINT `flight_booking_flight_id_foreign` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`id`),
  ADD CONSTRAINT `flight_booking_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
