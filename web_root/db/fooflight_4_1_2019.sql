-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 01, 2019 lúc 05:57 PM
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
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `airline_org`
--

INSERT INTO `airline_org` (`id`, `name`, `code`, `nation_id`) VALUES
(1, 'VietNam Airlines', 'VNAL', 1),
(2, 'Vietject', 'QAL', 1),
(3, 'Jetstars', 'KAL', 1),
(4, 'Jetstars 2', 'KAL', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `airport`
--

CREATE TABLE `airport` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `airport`
--

INSERT INTO `airport` (`id`, `name`, `code`, `city_id`) VALUES
(1, 'Tân Sơn Nhất', 'TSN', 1),
(2, 'Nội Bài', 'NBA', 2),
(3, 'Da Nang airport', 'DNA', 3),
(4, 'Da Nang airport', 'DNA', 3),
(5, 'Los Angeles Airport', 'LOS', 4),
(6, 'Tokyo Airport', 'TOKA', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `city`
--

CREATE TABLE `city` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `city`
--

INSERT INTO `city` (`id`, `name`, `code`, `nation_id`) VALUES
(1, 'Sài Gòn', 'SGN', 1),
(2, 'Hà Nội', 'HN', 1),
(3, 'Đã Nẵng', 'DNG', 1),
(4, 'Los Angeles', 'LAG', 2),
(5, 'Tokyo', 'TOK', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight`
--

CREATE TABLE `flight` (
  `id` int(10) UNSIGNED NOT NULL,
  `org_id` int(10) UNSIGNED NOT NULL,
  `unit_cost` double(8,2) NOT NULL,
  `from` int(10) UNSIGNED NOT NULL,
  `to` int(10) UNSIGNED NOT NULL,
  `flight_type` int(10) UNSIGNED NOT NULL,
  `economy_seat_num` int(11) NOT NULL,
  `economy_premium_seat_num` int(11) NOT NULL,
  `bussiness_seat_num` int(11) NOT NULL,
  `total_seat_booked` int(11) NOT NULL,
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

INSERT INTO `flight` (`id`, `org_id`, `unit_cost`, `from`, `to`, `flight_type`, `economy_seat_num`, `economy_premium_seat_num`, `bussiness_seat_num`, `total_seat_booked`, `departure`, `return`, `duration`, `transit`, `created_at`, `updated_at`) VALUES
(1, 1, 350.00, 1, 2, 2, 30, 20, 10, 200, '2018-12-31 21:30:00', '2019-01-02 00:30:00', 8, 5, NULL, NULL),
(2, 2, 150.00, 2, 3, 1, 30, 20, 10, 400, '2018-12-31 18:30:00', '2019-01-02 01:30:00', 2, 4, NULL, NULL),
(3, 3, 220.50, 1, 2, 1, 30, 20, 10, 500, '2019-01-01 02:30:00', '2019-01-01 18:30:00', 44, 11, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_booking`
--

CREATE TABLE `flight_booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `flight_id` int(10) UNSIGNED NOT NULL,
  `flight_type` int(11) NOT NULL,
  `total_person` int(11) NOT NULL,
  `total_price` double(8,2) NOT NULL,
  `booking_date` date NOT NULL DEFAULT '2019-04-01',
  `user_id` int(10) UNSIGNED NOT NULL,
  `flight_class_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight_booking`
--

INSERT INTO `flight_booking` (`id`, `flight_id`, `flight_type`, `total_person`, `total_price`, `booking_date`, `user_id`, `flight_class_id`) VALUES
(1, 1, 1, 2, 700.00, '2019-04-01', 1, 1),
(2, 1, 3, 4, 1600.00, '2019-04-01', 3, 3),
(3, 1, 1, 3, 1700.00, '2019-04-01', 2, 2),
(4, 1, 1, 3, 3937.50, '2019-04-01', 8, 1),
(5, 1, 1, 3, 3937.50, '2019-04-01', 10, 1),
(6, 1, 1, 3, 3937.50, '2019-04-01', 12, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_class`
--

CREATE TABLE `flight_class` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_percent` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `flight_class`
--

INSERT INTO `flight_class` (`id`, `name`, `cost_percent`) VALUES
(1, 'Bussiness', 2.50),
(2, 'Economy', 1.00),
(3, 'Economy Premium', 1.50);

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
(311, '2014_10_12_000000_create_users_table', 1),
(312, '2014_10_12_100000_create_password_resets_table', 1),
(313, '2019_02_01_135545_create_nation_table2', 1),
(314, '2019_02_08_085114_create_city_table', 1),
(315, '2019_02_09_135524_create_airport_table2', 1),
(316, '2019_02_09_150112_create_airline_org_table', 1),
(317, '2019_02_09_155848_create_flight_type_table', 1),
(318, '2019_02_10_153401_create_flight_class_table', 1),
(319, '2019_02_11_150418_create_flight_table', 1),
(320, '2019_02_20_074959_create_flight_booking_table', 1),
(321, '2019_03_05_152552_create_transit_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nation`
--

CREATE TABLE `nation` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nations_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nation`
--

INSERT INTO `nation` (`id`, `name`, `code`, `nations_id`) VALUES
(1, 'Việt Nam', 'VN', '1::3'),
(2, 'Mỹ', 'KR', '2::3'),
(3, 'Nhật', 'QT', '1::2::3');

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
-- Cấu trúc bảng cho bảng `transit`
--

CREATE TABLE `transit` (
  `id` int(10) UNSIGNED NOT NULL,
  `transit_city_from_id` int(10) UNSIGNED NOT NULL,
  `transit_city_to_id` int(10) UNSIGNED NOT NULL,
  `transit_departure_date` timestamp NULL DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `transit_fl_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transit`
--

INSERT INTO `transit` (`id`, `transit_city_from_id`, `transit_city_to_id`, `transit_departure_date`, `duration`, `transit_fl_id`) VALUES
(1, 1, 3, '2019-01-02 03:05:00', 7, 1);

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
(1, 'Khach hang 1', 'kh1@gmail.com', 'kh1@gmail.com', '$2y$10$u.iKwMxBzYUI7eo82F3K1ej30T8XyGEQFmN6P7iJngkisA3Uywcbe', NULL, 0, 1, '', '2019-03-19 09:52:33', '2019-03-19 09:52:33'),
(2, 'Khach hang 2', 'kh2@gmail.com', 'kh2@gmail.com', '$2y$10$.ho79pOKfHkiCKg/a1dUVuefM6Rxmxiz1OJa4eg3JI.DmJLhuv9MG', NULL, 0, 1, '', '2019-03-18 21:52:33', '2019-03-19 09:52:33'),
(3, 'Khach hang 3', 'kh3@gmail.com', 'kh3@gmail.com', '$2y$10$M5ekx1rka3aBCr/w1l2mtOcbP26Ek7bVeKU1FmxLRpELkTKKXKW1i', NULL, 0, 1, '', '2019-03-18 21:52:33', '2019-03-19 09:52:33'),
(4, '1', 'kh23@gmail.com', '111', '$2y$10$HXZu8wAbI6tPPB3ecgIYQeIs0fQ9oip7mU2TqTJYORGChtQYky91a', NULL, 0, 1, NULL, '2019-03-19 12:09:49', '2019-03-19 12:09:49'),
(5, '1', 'kh24@gmail.com', '111', '$2y$10$EG7GMYJiQdRbPV4KoV82veCZoxHRgTv.zXHAbSw3ZeGTNJBWQ9Xs2', NULL, 0, 1, NULL, '2019-03-19 12:10:36', '2019-03-19 12:10:36'),
(7, '1', 'kh244@gmail.com', '111', '$2y$10$achR20cnJrNBepJsjumrGuuqTSqgqNFcOEcYRzXdHBJR6HSDaSCpC', NULL, 0, 1, NULL, '2019-03-19 12:11:51', '2019-03-19 12:11:51'),
(8, '1', 'kh222@gmail.com', '3', '$2y$10$GZ0lpxc8YDcPeHOxFlqvjecRObLe0GNqG0R7qBISnznWX6LvXKgBG', NULL, 0, 1, NULL, '2019-03-19 12:25:34', '2019-03-19 12:25:34'),
(10, '1', 'kh223@gmail.com', '3', '$2y$10$KuvNwZhgVlVE0nNceLApr.JGwFkwvVcpQLQ3HNCBWgl9.d/OrJygi', NULL, 0, 1, NULL, '2019-03-19 12:29:16', '2019-03-19 12:29:16'),
(12, '1', 'kh2243@gmail.com', '3', '$2y$10$J88DpfnTYgi7crU0FAVZ..mq2PI2bodDFD7mFH8o3JP1faSL2Qiiq', NULL, 0, 1, NULL, '2019-03-19 12:30:29', '2019-03-19 12:30:29');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `airline_org`
--
ALTER TABLE `airline_org`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airline_org_nation_id_foreign` (`nation_id`);

--
-- Chỉ mục cho bảng `airport`
--
ALTER TABLE `airport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `airport_city_id_foreign` (`city_id`);

--
-- Chỉ mục cho bảng `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_nation_id_foreign` (`nation_id`);

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
-- Chỉ mục cho bảng `nation`
--
ALTER TABLE `nation`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `transit`
--
ALTER TABLE `transit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transit_transit_fl_id_foreign` (`transit_fl_id`),
  ADD KEY `transit_transit_city_from_id_foreign` (`transit_city_from_id`),
  ADD KEY `transit_transit_city_to_id_foreign` (`transit_city_to_id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `airport`
--
ALTER TABLE `airport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `city`
--
ALTER TABLE `city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `flight`
--
ALTER TABLE `flight`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `flight_booking`
--
ALTER TABLE `flight_booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT cho bảng `nation`
--
ALTER TABLE `nation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `transit`
--
ALTER TABLE `transit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `airline_org`
--
ALTER TABLE `airline_org`
  ADD CONSTRAINT `airline_org_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nation` (`id`);

--
-- Các ràng buộc cho bảng `airport`
--
ALTER TABLE `airport`
  ADD CONSTRAINT `airport_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`);

--
-- Các ràng buộc cho bảng `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_nation_id_foreign` FOREIGN KEY (`nation_id`) REFERENCES `nation` (`id`);

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

--
-- Các ràng buộc cho bảng `transit`
--
ALTER TABLE `transit`
  ADD CONSTRAINT `transit_transit_city_from_id_foreign` FOREIGN KEY (`transit_city_from_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `transit_transit_city_to_id_foreign` FOREIGN KEY (`transit_city_to_id`) REFERENCES `city` (`id`),
  ADD CONSTRAINT `transit_transit_fl_id_foreign` FOREIGN KEY (`transit_fl_id`) REFERENCES `flight` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
