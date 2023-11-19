-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 19, 2023 at 04:42 PM
-- Server version: 8.0.31
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_vjezba`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `image`) VALUES
(2, 'Dijelovi za automobile', 'download.jpg'),
(3, 'Lov i ribolov', 'loviribolov.png'),
(24, 'Biznis,I,industrija', 'biznis.jpg'),
(27, 'Moj,dom', 'mojdom.jpg'),
(28, 'Nakit,I,satovi', 'nakitisatovi.jpg'),
(29, 'Tehnika', 'tehnika.png'),
(30, 'Sportska,oprema', 'sportskaoprema.jpg'),
(31, 'Mobilni,uredjaji', 'mobilniuredjaji.jpg'),
(32, 'Ljepota,I,zdravlje', 'ljepotaizdravlje.jpg'),
(33, 'Odjeca,I,obuca', 'odjecaiobuca.jpeg'),
(34, 'Kolekcionarstvo', 'biznis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` bigint UNSIGNED NOT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL DEFAULT '1.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(14, 'SEK', 11.51, '2023-11-16 16:14:10', '2023-11-16 16:14:10');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` bigint UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `message`, `user_id`, `created_at`, `updated_at`, `product_id`) VALUES
(1, 'fffffffffff', 1, '2023-10-23 19:16:50', '2023-10-23 19:16:50', 8),
(2, 'Da li je pumpa nova?', 1, '2023-10-23 19:18:26', '2023-10-23 19:18:26', 8),
(3, 'Koliko je kilovata?', 2, '2023-10-23 19:34:18', '2023-10-23 19:34:18', 8),
(4, 'POzzz', 2, '2023-10-23 19:37:22', '2023-10-23 19:37:22', 4),
(5, 'zxcc', 1, '2023-10-26 12:31:50', '2023-10-26 12:31:50', 8),
(6, 'Da li je nov?', 1, '2023-11-06 17:00:08', '2023-11-06 17:00:08', 9);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

CREATE TABLE `order` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `total_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(35, 2, 'Poslano', '1000', 'leo@gmail.com', '2023-11-06 17:04:47', '2023-11-10 16:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `created_at`, `updated_at`) VALUES
(23, 4, 26, '2023-10-15 18:06:49', '2023-10-15 18:06:49'),
(24, 4, 27, '2023-10-15 18:07:39', '2023-10-15 18:07:39'),
(25, 8, 28, '2023-10-15 18:08:34', '2023-10-15 18:08:34'),
(26, 4, 29, '2023-10-15 18:20:58', '2023-10-15 18:20:58'),
(28, 4, 30, '2023-10-23 14:25:03', '2023-10-23 14:25:03'),
(29, 8, 31, '2023-10-23 15:12:23', '2023-10-23 15:12:23'),
(30, 8, 32, '2023-10-23 15:13:13', '2023-10-23 15:13:13'),
(31, 9, 32, '2023-10-23 15:13:13', '2023-10-23 15:13:13'),
(32, 4, 32, '2023-10-23 15:13:13', '2023-10-23 15:13:13'),
(33, 9, 33, '2023-10-26 12:38:01', '2023-10-26 12:38:01'),
(34, 9, 34, '2023-10-26 13:54:42', '2023-10-26 13:54:42'),
(35, 18, 35, '2023-11-06 17:04:47', '2023-11-06 17:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `amount` int NOT NULL DEFAULT '10',
  `views` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_image`, `price`, `category_id`, `subcategory_id`, `created_at`, `updated_at`, `product_image2`, `product_image3`, `product_image4`, `product_image5`, `product_image6`, `description`, `amount`, `views`) VALUES
(4, 'Retrovizor za toyotu', '16968652751.jpg', 100, 2, 1, NULL, '2023-11-05 18:40:07', '', '', '', '', '', NULL, 10, 97),
(8, 'pumpa za bazen', '16968392301.jpg', 175, 30, 5, '2023-10-09 06:13:50', '2023-10-26 12:33:59', NULL, NULL, NULL, NULL, NULL, NULL, 10, 95),
(9, 'Samsung galaxy s4', '16968721111.jpg', 500, 31, NULL, '2023-10-09 15:21:51', '2023-11-06 17:00:08', '16991960792.jpg', '16992131703.jpg', NULL, NULL, NULL, NULL, 10, 18),
(10, 'Kosarkaska lopta', '16968741141.jpg', 55, 30, 6, '2023-10-09 15:55:14', '2023-11-05 18:40:13', NULL, NULL, NULL, NULL, NULL, NULL, 10, 5),
(17, 'Karabin za lov', '16991955211.jpg', 789, 3, 3, '2023-11-05 13:04:47', '2023-11-05 18:39:53', '16991955212.jpg', '16991955213.jpg', NULL, NULL, NULL, NULL, 10, 2),
(18, 'Bazen za kupanje', '16992937821.jpg', 1000, 30, NULL, '2023-11-06 17:03:02', '2023-11-06 17:04:41', '16992937822.jpg', '16992938243.jpg', NULL, NULL, NULL, NULL, 10, 2),
(19, 'prekrivac za bazen', '17001550221.png', 25, 30, 5, '2023-11-16 16:17:02', '2023-11-16 16:17:02', NULL, NULL, NULL, NULL, NULL, NULL, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(7, 'Samsung', 31);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_items`
--

CREATE TABLE `subscription_items` (
  `id` bigint UNSIGNED NOT NULL,
  `subscription_id` bigint UNSIGNED NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_product` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pm_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `stripe_id`, `pm_type`, `pm_last_four`, `trial_ends_at`) VALUES
(1, 'Sinisa', '112kuzmanovic@gmail.com', NULL, '$2y$10$m5bm2ftFDrWpd4oRNSb9dO9p9naYz.gPfZaqJCPjIbU2VQ8Qx/MTi', NULL, '2023-10-01 06:13:17', '2023-10-01 06:13:17', NULL, NULL, NULL, NULL),
(2, 'Leonardo', 'leo@gmail.com', NULL, '$2y$10$bkmDMCPIQ0Fo0wOoFvcYz.8Cm/17vLnaPtcJL./jAKD9Bc4HnlOLK', NULL, '2023-10-01 15:21:28', '2023-10-01 15:21:28', NULL, NULL, NULL, NULL),
(3, 'Admin', 'admin@gmail.com', NULL, '$2y$10$bf7NKVs439HFmK.B04wJnuFz1/TQQ9Xdv9/jntPvujreTo/pnK2tm', NULL, '2023-10-04 12:35:58', '2023-10-04 12:35:58', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_product_id_foreign` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

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
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcategories_category_id_foreign` (`category_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_stripe_id_unique` (`stripe_id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`);

--
-- Indexes for table `subscription_items`
--
ALTER TABLE `subscription_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscription_items_subscription_id_stripe_price_unique` (`subscription_id`,`stripe_price`),
  ADD UNIQUE KEY `subscription_items_stripe_id_unique` (`stripe_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_stripe_id_index` (`stripe_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_items`
--
ALTER TABLE `subscription_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

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
