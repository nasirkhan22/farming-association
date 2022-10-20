-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 08:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farmer_association`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` double NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_resets_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2021_12_18_141432_create_roles_table', 1),
(20, '2021_12_18_181750_create_product_categories_table', 1),
(21, '2021_12_18_182034_create_product_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_price` double NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `user_id`, `order_id`, `quantity`, `item_price`, `amount`, `created_at`, `updated_at`) VALUES
(10, 4, 4, 5, 1, 110, 110, '2022-03-21 13:17:22', '2022-03-21 13:17:22'),
(11, 5, 4, 6, 1, 123, 123, '2022-06-05 10:17:35', '2022-06-05 10:17:35'),
(12, 7, 1, 7, 2, 23, 46, '2022-06-06 13:41:06', '2022-06-06 13:41:06'),
(13, 7, 1, 9, 1, 23, 23, '2022-06-11 16:14:20', '2022-06-11 16:14:20'),
(14, 7, 1, 10, 1, 23, 23, '2022-06-11 16:22:30', '2022-06-11 16:22:30'),
(15, 5, 4, 11, 1, 123, 123, '2022-06-11 17:49:33', '2022-06-11 17:49:33'),
(16, 8, 4, 11, 1, 120, 120, '2022-06-11 17:49:33', '2022-06-11 17:49:33'),
(17, 5, 4, 12, 1, 123, 123, '2022-06-12 02:50:46', '2022-06-12 02:50:46'),
(18, 4, 5, 13, 1, 110, 110, '2022-06-12 03:58:51', '2022-06-12 03:58:51'),
(19, 5, 5, 13, 1, 123, 123, '2022-06-12 03:58:51', '2022-06-12 03:58:51'),
(20, 7, 5, 14, 1, 23, 23, '2022-06-12 04:37:21', '2022-06-12 04:37:21'),
(21, 7, 1, 15, 1, 23, 23, '2022-06-20 12:10:54', '2022-06-20 12:10:54'),
(22, 5, 4, 16, 1, 123, 123, '2022-06-20 12:29:33', '2022-06-20 12:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_t`
--

CREATE TABLE `order_t` (
  `id` int(11) NOT NULL,
  `retailor_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shippment_address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `fk_supplier_id` int(11) DEFAULT 0,
  `deliver_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remarks` varchar(200) DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_t`
--

INSERT INTO `order_t` (`id`, `retailor_id`, `full_name`, `email`, `shippment_address`, `phone`, `status`, `fk_supplier_id`, `deliver_at`, `created_at`, `updated_at`, `remarks`) VALUES
(5, 4, 'Mubashir USmani', 'mubashir@gmail.com', 'Aaaa', '03125911522', 'pending', 0, NULL, '2022-03-21 13:17:22', '2022-04-05 11:53:15', 'N/A'),
(6, 4, 'retailor buying', 'anyemail@gmail.com', 'kpk', '03100666768', 'completed', 11, NULL, '2022-06-05 10:17:35', '2022-06-12 08:28:34', 'N/A'),
(7, 1, 'farmer buying', 'farmer@gmail.com', 'sdfs', '123123', 'completed', 11, NULL, '2022-06-06 13:41:06', '2022-06-20 12:27:44', 'Your order has been delivered'),
(8, 1, 'farmer buying', 'muzamil@vaultspay.ae', 'kyukg,', '03100557175', 'pending', 0, NULL, '2022-06-11 16:13:45', '2022-06-11 16:13:45', 'N/A'),
(10, 1, 'farmer buying', 'admin@burency.com', 'khgj', '03100557175', 'pending', 0, NULL, '2022-06-11 16:22:30', '2022-06-11 16:22:30', 'N/A'),
(11, 4, 'retailor', 'muzamil@vaultspay.ae', 'sd', '03100557175', 'completed', 11, NULL, '2022-06-11 17:49:33', '2022-06-20 12:52:13', 'Your order has been delivered'),
(12, 4, 'farmer buying', 'admin@burency.com', 'sdf', '03100557175', 'pending', 0, NULL, '2022-06-12 02:50:46', '2022-06-12 02:51:31', 'N/A'),
(13, 5, 'sdf', 'wef', 'sdf', '12', 'pending', 0, NULL, '2022-06-12 03:58:51', '2022-06-12 03:58:51', 'N/A'),
(14, 5, 'sd', 'wfd', 'sfv', '123213', 'pending', 0, NULL, '2022-06-12 04:37:21', '2022-06-12 04:37:21', 'N/A'),
(15, 1, 'sdf', 'sd', 'dfg', '45', 'pending', 0, NULL, '2022-06-20 12:10:54', '2022-06-20 12:10:54', 'N/A'),
(16, 4, 'sd', 'qfd', 'd', '23', 'assigned', 11, NULL, '2022-06-20 12:29:33', '2022-06-20 12:31:23', 'Your order has accepted will deliver as soon as possible');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `fk_user_id`, `name`, `created_at`, `updated_at`, `isActive`) VALUES
(4, 1, 'Food', '2022-03-21 13:13:17', '2022-03-21 13:13:17', 1),
(5, 1, 'Fuel', '2022-03-21 13:13:31', '2022-03-21 13:13:31', 1),
(6, 1, 'Ziaullah', '2022-06-05 09:34:17', '2022-06-05 09:34:17', 1),
(7, 1, 'Ziaullah2', '2022-06-05 10:02:36', '2022-06-05 10:02:36', 1),
(8, 4, 'retailor category', '2022-06-06 10:10:05', '2022-06-20 12:03:00', 1),
(9, 1, 'VEGITABLES', '2022-06-07 10:03:11', '2022-06-20 12:05:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `fk_category_id`, `name`, `price`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(5, 4, 'Muzamil Sabir', 123, 21, '2847831c30b4c34c79728c5718fe95c2.jpg', '2022-04-05 12:08:12', '2022-04-05 12:08:12'),
(7, 8, 'sdf', 23, 32, 'b7acb9014888443b010cfe4cd28a5eaa.PNG', '2022-06-06 10:22:08', '2022-06-06 10:22:08');

-- --------------------------------------------------------

--
-- Table structure for table `retailor_products`
--

CREATE TABLE `retailor_products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `perceptions` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `retailor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `retailor_products`
--

INSERT INTO `retailor_products` (`id`, `name`, `price`, `perceptions`, `image`, `created_at`, `updated_at`, `retailor_id`) VALUES
(4, 'medicine', 120, 'Pain', '070ee50edc66deb274c9b19c1681cdd4.jpg', '2022-03-21 18:19:14', '2022-03-21 18:19:14', 4),
(5, 'Ziaullah', 21, 'ghj', '984aa39805c4120c29468af7a6e8a863.jpg', '2022-04-05 10:49:59', '2022-04-05 10:49:59', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'farmer', '2021-12-19 01:46:34', '2021-12-19 01:46:34'),
(2, 'retailor', '2021-12-19 01:46:34', '2021-12-19 01:46:34'),
(3, 'supplier', '2021-12-19 01:46:34', '2021-12-19 01:46:34'),
(4, 'customer', '2021-12-19 01:46:35', '2021-12-19 01:46:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fk_role_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fk_role_id`, `name`, `email`, `address`, `phone`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `lat`, `lng`) VALUES
(1, 1, 'Farmer', 'farmer@gmail.com', 'Abbottabad,Pakistan', '03100667656', NULL, '$2y$10$qhjWaSJXmXxbYv481s3qE.0HaKhbITHs3mNP4/RVSQMBxnn.bgsr6', NULL, '2021-12-19 01:46:34', '2021-12-19 01:46:34', 33.9946, 72.9106),
(4, 2, 'Retailor', 'retailor@gmail.com', 'Haripur', '03100557175', NULL, '$2y$10$oBpq9CsqqQFKAfKicHTUyuWEH3j408Mf29.Q6Nt6hwfdVIWxhvU3S', NULL, '2021-12-19 08:29:01', '2021-12-19 08:29:01', 34.1688, 73.2215),
(5, 4, 'Sanaullah Khan', 'customer@gmail.com', 'Abbottabad', '03125911522', NULL, '$2y$10$iHMCUje2M8aep.Pjg2opAeNu0t/g299dXKc0xW1byCUc176MO/rU.', NULL, '2022-03-21 15:11:24', '2022-03-21 15:11:24', NULL, NULL),
(6, 1, 'Mubashir USmani', 'farmer12@gmail.com', 'Aaaa', '03125911522', NULL, '$2y$10$kEjfrj0rYTbeliJUsFNoGegGVCgECH0lwzU8vCPYQV5EZDzw42A6q', NULL, '2022-04-05 12:53:11', '2022-04-05 12:53:11', NULL, NULL),
(7, 1, 'Mubashir USmani', 'anyemail@gmail.com', 'Aaaa', '03125911522', NULL, '$2y$10$AhYEQGPA0b/NqvDWUHN5IOW.Vzr/MS1QjLpn5ZEoVzG2e7Mwt/0aO', NULL, '2022-04-05 12:58:03', '2022-04-05 12:58:03', NULL, NULL),
(9, 4, 'Customer', 'customer1@gmail.com', 'ADDRESS', '03125911522', NULL, '$2y$10$CDubHyTYi8tPtohdihgMWe6Yrul5dxymt2kOmiOVyr97M18n6zqWO', NULL, '2022-04-05 13:26:00', '2022-04-05 13:26:00', NULL, NULL),
(11, 3, 'Supplier', 'supplier@gmail.com', 'Abbottabad', '03100557175', NULL, '$2y$10$g83x42b7VpZO80mQzVWgt.Yy32bUV2F.NhNb6QoZgUS3L.0f4GavW', NULL, '2022-06-07 14:06:36', '2022-06-07 14:06:36', NULL, NULL),
(12, 3, 'Test supp', 'testsupp@gmail.com', 'atd', '87687', NULL, '$2y$10$ng/D5lyPjl4aijyWRyL1HeW97Q0HcyY2OaRbXuNIYx3PUXmvuwegS', NULL, '2022-06-27 11:47:37', '2022-06-27 11:47:37', NULL, NULL),
(13, 3, 'test', 'ttt@gmail.com', 'sldkj', '9879', NULL, '$2y$10$sTwQFhG42/ZlNGKTgxDZEeCrn/LCFyr0I5cH7r.yXL.ib.iWuB/VK', NULL, '2022-06-27 11:48:39', '2022-06-27 11:48:39', NULL, NULL),
(14, 3, 'test', 'test@gmail.com', 'sdfsdf', '23423', NULL, '$2y$10$Iljd/3euYEUyGtIH0Mc.KeuNHYett61ZRVp63lROaMdFPzwIhWm/6', NULL, '2022-06-27 12:00:38', '2022-06-27 12:00:38', NULL, NULL),
(15, 3, 'any sup', 'supliertest@gmail.com', 'sdfs', '243', NULL, '$2y$10$PzOy6wRHejvtN27MX2sZcuG4bcO.yJhFYe.jH8YTG7Ji7nthm8XHW', NULL, '2022-06-27 13:29:46', '2022-06-27 13:29:46', 33.9946, 72.9106);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_t`
--
ALTER TABLE `order_t`
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
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `retailor_products`
--
ALTER TABLE `retailor_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_t`
--
ALTER TABLE `order_t`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `retailor_products`
--
ALTER TABLE `retailor_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
