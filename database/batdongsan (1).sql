-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 01, 2020 lúc 05:22 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `batdongsan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `email`, `name`, `password`, `created_at`, `updated_at`) VALUES
(1, 'lieu1@gmail.com', 'lieu', '$2y$10$W37PnWZ31nc0RrXcPp4gn.RA.WQDN16tBVYqVpkOxmMToOR/2ijS2', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_categorys` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name_categorys`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'nhà ở', 'nha-o', NULL, NULL, NULL),
(2, 'vila', 'vila', NULL, NULL, NULL),
(3, 'biệt thự', 'biet-thu', NULL, NULL, NULL),
(4, 'nhà thuê', 'nha-thue', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `errors`
--

CREATE TABLE `errors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_err` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `errors`
--

INSERT INTO `errors` (`id`, `name_err`, `desription`, `created_at`, `updated_at`) VALUES
(1, 'error-dien', 'lỗi mất điện', NULL, NULL),
(2, 'error-nuoc', 'lỗi mất nước', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_21_010922_create_table_categorys_table', 1),
(5, '2020_09_21_011018_create_table_type_products_table', 1),
(10, '2020_09_21_090216_create_table_products_table', 2),
(11, '2020_09_23_013431_create_table_admins_table', 3),
(12, '2014_10_12_000000_create_users_table', 4),
(13, '2020_09_23_081244_create_table_tokens_table', 5),
(14, '2020_09_23_093101_create_table_utilities_table', 6),
(16, '2020_09_23_093115_create_table_utilities_product_table', 7),
(17, '2020_09_30_014416_create_table_supports_table', 8),
(18, '2020_09_30_014506_create_table_errors_table', 8),
(19, '2020_09_30_014527_create_table_support_errors_table', 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summary` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `dientich` int(11) DEFAULT NULL,
  `like` int(11) DEFAULT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tp` int(11) DEFAULT NULL,
  `id_h` int(11) DEFAULT NULL,
  `id_type` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_product`, `image`, `content`, `summary`, `price`, `dientich`, `like`, `action`, `id_tp`, `id_h`, `id_type`, `created_at`, `updated_at`) VALUES
(89, 'nha 3', 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/batdongsan/1601363445img-20200821-221503jpg.jpg', 'nhà 1 lầu', 'nhà 1 lầu đẹp', 13000000, 300, 2, 'chờ kiểm duyệt', 2, 2, 2, NULL, '2020-09-29 01:14:22'),
(90, 'nha 1', 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/batdongsan/1601365879img-20200821-221503jpg.jpg', 'nhà 1 lầu', 'nhà 1 lầu đẹp', 13000000, 300, 1, 'chờ kiểm duyệt', 2, 2, 2, NULL, NULL),
(91, 'nha 1', 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/batdongsan/1601365889img-20200821-221503jpg.jpg', 'nhà 1 lầu', 'nhà 2 lầu đẹp', 13000000, 200, 1, 'chờ kiểm duyệt', 2, 2, 2, NULL, NULL),
(92, 'nha 23', 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/batdongsan/1601365898img-20200821-221503jpg.jpg', 'nhà 1 lầu', 'nhà 2 lầu đẹp', 11000000, 200, 1, 'chờ kiểm duyệt', 2, 2, 2, NULL, NULL),
(93, 'nha 23', 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/batdongsan/1601450297img-20200821-221503jpg.jpg', 'nhà 1 lầu', 'nhà 2 lầu đẹp', 11000000, 200, 1, 'chờ kiểm duyệt', 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supports`
--

CREATE TABLE `supports` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_spp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_admin` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supports`
--

INSERT INTO `supports` (`id`, `content_spp`, `image`, `note`, `id_user`, `id_admin`, `created_at`, `updated_at`) VALUES
(3, 'nước bị hư', 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/batdongsan/1601457086batdongsandanacom-1png.png', 'Chờ Xử Lý', 4, NULL, NULL, NULL),
(4, 'điên bị hư', 'https://agreedict-reading.s3-ap-southeast-1.amazonaws.com/batdongsan/1601457114batdongsandanacom-1png.png', 'Chờ Xử Lý', 4, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `support_errors`
--

CREATE TABLE `support_errors` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_support` int(10) UNSIGNED NOT NULL,
  `id_error` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `support_errors`
--

INSERT INTO `support_errors` (`id`, `id_support`, `id_error`, `created_at`, `updated_at`) VALUES
(3, 3, 2, NULL, NULL),
(4, 4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokens`
--

CREATE TABLE `tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tokens`
--

INSERT INTO `tokens` (`id`, `token`, `id_user`, `created_at`, `updated_at`) VALUES
(36, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2JhdGRvbmdzYW5cL3B1YmxpY1wvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYwMTQ1NzAwMCwiZXhwIjoxNjAyMTQ4MjAwLCJuYmYiOjE2MDE0NTcwMDAsImp0aSI6ImU5NDJFZDRRU1NiOFpzWEciLCJzdWIiOjQsInBydiI6Ijg3ZTBhZjFlZjlmZDE1ODEyZmRlYzk3MTUzYTE0ZTBiMDQ3NTQ2YWEifQ.VWWERrbAeLP1pvT9MJcgxkPQEYMLP2kCiL-Gg-xETMo', 4, '2020-09-30 02:10:00', '2020-09-30 02:10:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_category` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name_type`, `slug`, `image`, `id_category`, `created_at`, `updated_at`) VALUES
(1, 'nhà 1', 'nha-1', NULL, 1, NULL, NULL),
(2, 'nhà 2', 'nha-2', NULL, 1, NULL, NULL),
(3, 'vila 1', 'vila-1', NULL, 2, NULL, NULL),
(4, 'vila 2', 'vila-2', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'lieu', 'lieu@gmail.com', NULL, '$2y$10$QsOVSRklWFUT1bHQRQphpu2Et1Ro3epZmKWmxREUhsLlI6FX/HvBK', NULL, '2020-09-22 19:50:45', '2020-09-23 00:23:43'),
(3, 'lieu1', 'lieu1@gmail.com', NULL, '$2y$10$Zw64ReWyPg2OmeQ6YC7bU..QyaOoPdZn3hgbyqs/zNEBhdoHLuBZ2', NULL, '2020-09-22 20:08:01', '2020-09-23 00:28:46'),
(4, 'lieu2', 'lieu2@gmail.com', NULL, '$2y$10$7N738SwLXrdZLdZTp28QzuqbbdJ8FAj/kyUTdb140G4xv1y4TwDiO', NULL, '2020-09-22 20:48:41', '2020-09-23 00:28:38'),
(5, 'lieu3', 'lieu3@gmail.com', NULL, '$2y$10$ndCsqRAtjlwtXYdF1qlvQ.xbKldSnyN89hBYywRWxo0C02hEbDZfG', NULL, '2020-09-22 20:52:58', '2020-09-23 00:28:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `utilities`
--

CREATE TABLE `utilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_uitilie` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `utilities`
--

INSERT INTO `utilities` (`id`, `name_uitilie`, `image`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Swimming pool', NULL, 'Swimming pool', NULL, NULL),
(2, 'Parking', NULL, 'Parking', NULL, NULL),
(3, 'Pet friendly', NULL, 'Pet friendly', NULL, NULL),
(4, 'Non-smoking rooms', NULL, 'Non-smoking rooms', NULL, NULL),
(5, 'Wifi', NULL, 'Wifi', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `utilities_product`
--

CREATE TABLE `utilities_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `id_utilitie` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `utilities_product`
--

INSERT INTO `utilities_product` (`id`, `id_product`, `id_utilitie`, `created_at`, `updated_at`) VALUES
(35, 89, 2, NULL, NULL),
(44, 90, 2, NULL, NULL),
(45, 91, 3, NULL, NULL),
(46, 92, 4, NULL, NULL),
(47, 93, 4, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `errors`
--
ALTER TABLE `errors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `supports`
--
ALTER TABLE `supports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supports_id_user_foreign` (`id_user`),
  ADD KEY `supports_id_admin_foreign` (`id_admin`);

--
-- Chỉ mục cho bảng `support_errors`
--
ALTER TABLE `support_errors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `support_errors_id_support_foreign` (`id_support`),
  ADD KEY `support_errors_id_error_foreign` (`id_error`);

--
-- Chỉ mục cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tokens_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_products_id_category_foreign` (`id_category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `utilities`
--
ALTER TABLE `utilities`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `utilities_product`
--
ALTER TABLE `utilities_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `utilities_product_id_product_foreign` (`id_product`),
  ADD KEY `utilities_product_id_utilitie_foreign` (`id_utilitie`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `errors`
--
ALTER TABLE `errors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `supports`
--
ALTER TABLE `supports`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `support_errors`
--
ALTER TABLE `support_errors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `utilities`
--
ALTER TABLE `utilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `utilities_product`
--
ALTER TABLE `utilities_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `supports`
--
ALTER TABLE `supports`
  ADD CONSTRAINT `supports_id_admin_foreign` FOREIGN KEY (`id_admin`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `supports_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `support_errors`
--
ALTER TABLE `support_errors`
  ADD CONSTRAINT `support_errors_id_error_foreign` FOREIGN KEY (`id_error`) REFERENCES `errors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `support_errors_id_support_foreign` FOREIGN KEY (`id_support`) REFERENCES `supports` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `tokens_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD CONSTRAINT `type_products_id_category_foreign` FOREIGN KEY (`id_category`) REFERENCES `categorys` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `utilities_product`
--
ALTER TABLE `utilities_product`
  ADD CONSTRAINT `utilities_product_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `utilities_product_id_utilitie_foreign` FOREIGN KEY (`id_utilitie`) REFERENCES `utilities` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
