-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 08, 2023 at 01:16 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`) VALUES
(2, 'Dijelovi za automobile', 'download.jpg'),
(3, 'Lov i ribolov', 'loviribolov.jpg'),
(24, 'Biznis i industrija', 'biznis.jpg'),
(27, 'Moj dom', 'mojdom.jpg'),
(28, 'Nakit i satovi', 'nakitisatovi.jpg'),
(29, 'Tehnika', 'tehnika.jpg'),
(30, 'Sportska oprema', 'sportskaoprema.jpg'),
(31, 'Mobilni uredjaji', 'mobilniuredjaji.jpg'),
(32, 'Ljepota i zdravlje', 'ljepotaizdravlje.jpg'),
(33, 'Odjeca i obuca', 'odjecaiobuca.jpg'),
(34, 'Kolekcionarstvo', 'biznis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

DROP TABLE IF EXISTS `currency`;
CREATE TABLE IF NOT EXISTS `currency` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `currency` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL DEFAULT '1.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `currency`, `value`, `created_at`, `updated_at`) VALUES
(1, 'BAM', 1.96, '2023-11-10 17:05:04', '2023-11-10 17:05:04'),
(2, 'EUR', 1.00, '2023-11-10 17:05:04', '2023-11-10 17:05:04'),
(3, 'CHF', 0.96, '2023-11-10 17:05:04', '2023-11-10 17:05:04'),
(4, 'AUD', 1.68, '2023-11-10 17:05:04', '2023-11-10 17:05:04'),
(5, 'USD', 1.07, '2023-11-10 17:05:04', '2023-11-10 17:05:04'),
(6, 'RSD', 117.18, '2023-11-10 17:05:04', '2023-11-10 17:05:04'),
(7, 'SEK', 11.66, '2023-11-10 17:05:04', '2023-11-10 17:05:04'),
(8, 'BAM', 1.96, '2023-11-16 16:14:10', '2023-11-16 16:14:10'),
(9, 'EUR', 1.00, '2023-11-16 16:14:10', '2023-11-16 16:14:10'),
(10, 'CHF', 0.96, '2023-11-16 16:14:10', '2023-11-16 16:14:10'),
(11, 'AUD', 1.68, '2023-11-16 16:14:10', '2023-11-16 16:14:10'),
(12, 'USD', 1.09, '2023-11-16 16:14:10', '2023-11-16 16:14:10'),
(13, 'RSD', 117.29, '2023-11-16 16:14:10', '2023-11-16 16:14:10'),
(14, 'SEK', 11.51, '2023-11-16 16:14:10', '2023-11-16 16:14:10'),
(15, 'BAM', 1.95, '2023-12-04 21:28:00', '2023-12-04 21:28:00'),
(16, 'EUR', 1.00, '2023-12-04 21:28:00', '2023-12-04 21:28:00'),
(17, 'CHF', 0.95, '2023-12-04 21:28:00', '2023-12-04 21:28:00'),
(18, 'AUD', 1.64, '2023-12-04 21:28:00', '2023-12-04 21:28:00'),
(19, 'USD', 1.08, '2023-12-04 21:28:00', '2023-12-04 21:28:00'),
(20, 'RSD', 117.28, '2023-12-04 21:28:00', '2023-12-04 21:28:00'),
(21, 'SEK', 11.30, '2023-12-04 21:28:00', '2023-12-04 21:28:00'),
(22, 'BAM', 1.96, '2023-12-06 13:06:25', '2023-12-06 13:06:25'),
(23, 'EUR', 1.00, '2023-12-06 13:06:25', '2023-12-06 13:06:25'),
(24, 'CHF', 0.94, '2023-12-06 13:06:25', '2023-12-06 13:06:25'),
(25, 'AUD', 1.64, '2023-12-06 13:06:25', '2023-12-06 13:06:25'),
(26, 'USD', 1.08, '2023-12-06 13:06:25', '2023-12-06 13:06:25'),
(27, 'RSD', 117.49, '2023-12-06 13:06:25', '2023-12-06 13:06:25'),
(28, 'SEK', 11.30, '2023-12-06 13:06:25', '2023-12-06 13:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `message_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `user_id`, `created_at`, `updated_at`, `product_id`) VALUES
(7, 'Koja je cijena?', 1, '2023-12-06 11:13:22', '2023-12-06 11:13:22', 27),
(8, '@sinisa', 1, '2023-12-06 11:13:37', '2023-12-06 11:13:37', 27);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_01_081416_create_categories_table', 2),
(6, '2023_10_01_081820_create_subcategories_table', 3),
(7, '2023_10_01_092916_add_image_to_categories', 4),
(9, '2023_10_01_105205_create_product_table', 5),
(10, '2023_10_01_163837_create_order_table', 6),
(12, '2023_10_01_173005_create_order_items_table', 7),
(13, '2023_10_07_075941_change_price_column_type_in_product_table', 8),
(14, '2023_10_07_080308_change_product_image_column_in_product_table', 8),
(16, '2023_10_07_170627_add_image2_to_product', 9),
(17, '2023_10_15_123043_add_amount_to_product', 10),
(18, '2023_10_15_193459_ad_views_to_product', 11),
(19, '2023_10_23_205623_create_message_table', 12),
(20, '2023_10_23_210918_add_porduct_id_to_message', 13),
(21, '2023_11_10_172721_create_currency_table', 14),
(22, '2019_05_03_000001_create_customer_columns', 15),
(23, '2019_05_03_000002_create_subscriptions_table', 15),
(24, '2019_05_03_000003_create_subscription_items_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
CREATE TABLE IF NOT EXISTS `order` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `total_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `user_id`, `status`, `total_amount`, `shipping_address`, `created_at`, `updated_at`) VALUES
(24, 1, 'Poslano', '12', '112kuzmanovic@gmail.com', '2023-10-09 15:19:00', '2023-10-09 16:22:43'),
(25, 1, 'Poslano', '12', '112kuzmanovic@gmail.com', '2023-10-15 07:01:50', '2023-10-15 07:02:23'),
(26, 1, 'Poslano', '56', '112kuzmanovic@gmail.com', '2023-10-15 18:06:49', '2023-10-15 18:21:24'),
(27, 1, 'Poslano', '56', '112kuzmanovic@gmail.com', '2023-10-15 18:07:39', '2023-10-23 13:39:28'),
(28, 1, 'Poslano', '175', '112kuzmanovic@gmail.com', '2023-10-15 18:08:34', '2023-10-15 18:21:31'),
(29, 1, 'Poslano', '68', '112kuzmanovic@gmail.com', '2023-10-15 18:20:58', '2023-10-23 13:39:42'),
(30, 1, 'Poslano', '56', '112kuzmanovic@gmail.com', '2023-10-23 14:25:03', '2023-10-23 15:13:42'),
(31, 1, 'Poslano', '175', '112kuzmanovic@gmail.com', '2023-10-23 15:12:23', '2023-10-23 15:14:28'),
(32, 1, 'Poslano', '731', '112kuzmanovic@gmail.com', '2023-10-23 15:13:13', '2023-10-23 15:13:53'),
(33, 1, 'Poslano', '500', '112kuzmanovic@gmail.com', '2023-10-26 12:38:01', '2023-10-26 13:54:27'),
(34, 1, 'Poslano', '500', '112kuzmanovic@gmail.com', '2023-10-26 13:54:42', '2023-11-05 12:45:52'),
(35, 2, 'Poslano', '1000', 'leo@gmail.com', '2023-11-06 17:04:47', '2023-11-10 16:10:03'),
(36, 1, 'Poslano', '220', '112kuzmanovic@gmail.com', '2023-12-06 10:48:34', '2023-12-07 10:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `order_items_order_id_foreign` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(36, 32, 36, '2023-12-06 10:48:34', '2023-12-06 10:48:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('112kuzmanovic@gmail.com', '$2y$10$plPZZIWorH02qdvvpm7xeu5ZtRVkGQAJ4PO8buOJQ25.jyUxRb4Mq', '2023-10-19 13:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `subcategory_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_image2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image4` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image5` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image6` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `amount` int NOT NULL DEFAULT '10',
  `views` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_category_id_foreign` (`category_id`),
  KEY `product_subcategory_id_foreign` (`subcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_image`, `price`, `category_id`, `subcategory_id`, `created_at`, `updated_at`, `product_image2`, `product_image3`, `product_image4`, `product_image5`, `product_image6`, `description`, `amount`, `views`) VALUES
(23, 'Kosarkaska lopta', 'lopta.jpg', 35, 30, 6, '0000-00-00 00:00:00', '2023-12-05 16:04:57', '', '', '', '', '', 'spalding', 25, 1),
(24, 'Pumpa za bazen', 'pumpa.jpg', 89, 30, 5, '0000-00-00 00:00:00', '2023-12-08 12:09:54', '', '', '', '', '', 'Intex pumpa', 25, 3),
(27, 'Rucica mjenjaca', 'mjenjac.jpg', 15, 2, 1, '0000-00-00 00:00:00', '2023-12-06 11:13:37', 'mjenjac2.jpg', '', '', '', '', 'Univerzalna rucica mjenjaca', 70, 3),
(28, 'Lovacka puska', 'puska.jpg', 780, 3, 8, '0000-00-00 00:00:00', '2023-12-06 13:06:42', 'puska2.jpg', 'puska3.jpg', '', '', '', 'Lovacka puska,nova,sa optikom', 1, 1),
(29, 'Rucni sat', 'sat.jpg', 290, 28, 9, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', 'Muski sat', 2, 0),
(30, 'Samsung galaxy s4', 'galaxys4.jpg', 400, 31, 7, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'galaxys42.jpg', '', '', '', '', 'Nov', 1, 0),
(31, 'Skije', 'skije.jpg', 150, 30, 10, '0000-00-00 00:00:00', '2023-12-06 10:38:05', 'skije2.jpg', 'skije3.jpg', '', '', '', 'Elan skije,polovne', 1, 1),
(32, 'Skije', 'elan.jpg', 220, 30, 10, NULL, '2023-12-06 10:48:19', 'elan2.jpg', 'elan3.jpg', 'elan4.jpg', 'elan5.jpg', 'elan6.jpg', 'Skije elan,174 cm,radius 17', 1, 2),
(33, 'Kamere za video nadzor', '17019546241.png', 100, 29, NULL, '2023-12-07 12:10:24', '2023-12-07 12:10:24', '17019546242.jpg', '17019546243.png', '17019546244.jpg', NULL, NULL, NULL, 10, 0),
(34, 'Alat za vrt', '17019553491.jpg', 30, 27, NULL, '2023-12-07 12:22:29', '2023-12-07 12:22:54', '17019553742.jpg', '17019553743.png', '17019553744.jpg', NULL, NULL, NULL, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subcategory_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subcategories_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcategory_name`, `category_id`) VALUES
(1, 'Rucice mjenjaca', 2),
(2, 'Stop svjetla', 2),
(3, 'Stapovi za ribolov', 3),
(4, 'Ratkape', 2),
(5, 'Oprema za bazene', 30),
(6, 'Sportovi sa loptom', 30),
(7, 'Samsung', 31),
(8, 'Lovacke puske', 3),
(9, 'Muski satovi', 28),
(10, 'Zimski sportovi', 30);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

DROP TABLE IF EXISTS `subscription_items`;
CREATE TABLE IF NOT EXISTS `subscription_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subscription_id` bigint UNSIGNED NOT NULL,
  `stripe_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_stripe_id_index` (`stripe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Sinisa', '112kuzmanovic@gmail.com', NULL, '$2y$10$m5bm2ftFDrWpd4oRNSb9dO9p9naYz.gPfZaqJCPjIbU2VQ8Qx/MTi', NULL, '2023-10-01 06:13:17', '2023-10-01 06:13:17', NULL, NULL, NULL, NULL),
(2, 'Leonardo', 'leo@gmail.com', NULL, '$2y$10$bkmDMCPIQ0Fo0wOoFvcYz.8Cm/17vLnaPtcJL./jAKD9Bc4HnlOLK', NULL, '2023-10-01 15:21:28', '2023-10-01 15:21:28', NULL, NULL, NULL, NULL),
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$bf7NKVs439HFmK.B04wJnuFz1/TQQ9Xdv9/jntPvujreTo/pnK2tm', NULL, '2023-10-04 12:35:58', '2023-10-04 12:35:58', NULL, NULL, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `product_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
