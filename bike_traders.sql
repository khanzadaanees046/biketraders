-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 10:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_traders`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bike_name` varchar(255) DEFAULT NULL,
  `capacity` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `engine_no` varchar(255) DEFAULT NULL,
  `chassis_no` varchar(255) DEFAULT NULL,
  `purchase_price` varchar(255) DEFAULT NULL,
  `sale_price` int(20) DEFAULT NULL,
  `purchase_date` varchar(55) DEFAULT NULL,
  `sale_date` varchar(55) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `bike_name`, `capacity`, `model`, `year`, `colour`, `engine_no`, `chassis_no`, `purchase_price`, `sale_price`, `purchase_date`, `sale_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Yamaha', '125 c', 'YBR125', '2023', 'Black', '1HP1XB123', '4TZ1DB743', '270000', 280000, NULL, NULL, '1', '2023-03-19 15:34:28', '2023-05-08 07:55:44'),
(2, 'Honda', '125 c', 'CD 70', '2022', 'Red', '9KH1SD329', '8YZ1TA843', '220000', NULL, NULL, NULL, '0', '2023-03-19 15:38:36', '2023-05-09 08:59:38'),
(3, 'Yamaha', '100 c', 'YBR100', '2023', 'Golden', '1YP1OS843', '4KZ1FD092', '190000', 200000, NULL, NULL, '1', '2023-03-19 15:48:19', '2023-03-22 15:15:24'),
(4, 'United', '70cc', 'US 70', '2023', 'Black', '5SK1LS892', '8YZ1TA893', '81500', 85000, NULL, NULL, '1', '2023-03-19 16:23:13', '2023-03-27 19:16:45'),
(5, 'Honda', '70cc', 'CD 70', '2023', 'Black', '5HS34KQ264', '4GZ7SG5489', '210000', NULL, NULL, NULL, '0', '2023-03-21 14:22:33', '2023-03-21 14:28:30'),
(6, 'Super Star', '70cc', 'Euro 2', '2023', 'Black', '5DP1SD874', '6DZ1DB983', '105000', NULL, NULL, NULL, '0', '2023-03-21 14:26:01', '2023-03-21 14:55:53'),
(11, 'Yamaha', '100 c', 'YBR100', '2023', 'Black', '1HP1FH123', '4JA1FD092', '230000', NULL, NULL, NULL, '0', '2023-05-09 01:16:07', '2023-05-09 01:16:07'),
(12, 'Yamaha', '100 c', 'US 70', '2023', 'Black', '1HP1XB16', '4KZ1FD05', '130000', 150000, '2023-05-09', '2023-05-09', '1', '2023-05-09 05:52:26', '2023-05-09 06:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `bike_repairs`
--

CREATE TABLE `bike_repairs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `bike_chase_no` varchar(255) NOT NULL,
  `bike_no` varchar(255) NOT NULL,
  `receiving_date` date DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bike_repairs`
--

INSERT INTO `bike_repairs` (`id`, `customer_name`, `bike_chase_no`, `bike_no`, `receiving_date`, `delivery_date`, `status`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Hadi Khan', '34F34RF54', '4532', '2023-06-23', NULL, 1, 'Moblile, Engine Service,', '2023-06-23 08:14:23', '2023-06-23 08:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `bike_sales`
--

CREATE TABLE `bike_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bike_id` int(255) UNSIGNED DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `father_name` varchar(255) DEFAULT NULL,
  `cnic` bigint(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `payment_method` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bike_sales`
--

INSERT INTO `bike_sales` (`id`, `bike_id`, `name`, `father_name`, `cnic`, `address`, `payment_method`, `created_at`, `updated_at`) VALUES
(5, 3, 'Hadi', 'Khan', 489737974987, 'Pakistan', 'installment', '2023-03-22 15:15:24', '2023-03-22 15:15:24'),
(6, 4, 'Mustaqeem', 'Haider', 77342312764124, 'Awan Town', 'paid', '2023-03-27 19:16:45', '2023-03-27 19:16:45'),
(7, 1, 'Hadi', 'Awan', 77342312732, 'Karachi', 'paid', '2023-05-08 07:55:44', '2023-05-08 07:55:44'),
(8, 12, 'Hadi', 'Khan', 489737974987, 'Lahore', 'paid', '2023-05-09 06:05:49', '2023-05-09 06:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_name` varchar(255) DEFAULT NULL,
  `total_expense` int(96) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `expense_name`, `total_expense`, `created_at`, `updated_at`) VALUES
(1, 'Khana', 200, '2023-05-11 05:21:41', '2023-05-11 06:03:26'),
(2, 'Tea', 320, '2023-05-11 05:36:45', '2023-05-11 06:03:51'),
(4, 'Dummy', 400, '2023-07-10 01:43:15', '2023-07-10 01:43:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_03_17_090259_create_bikes_table', 1),
(14, '2023_03_17_090738_create_bike_sales_table', 1),
(15, '2023_03_19_130523_create_payments_table', 2),
(16, '2023_03_21_093755_create_transactions_table', 3),
(17, '2023_05_09_083837_create_profit_losses_table', 4),
(18, '2023_05_09_084336_create_expenses_table', 5),
(19, '2023_06_23_091607_create_bike_repairs_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(20) UNSIGNED DEFAULT NULL,
  `advance_payment` varchar(255) DEFAULT NULL,
  `paid_amount` varchar(255) DEFAULT NULL,
  `total_price` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `sale_id`, `advance_payment`, `paid_amount`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(6, 5, '20000', '20000', '190000', '0', '2023-03-22 15:15:24', '2023-03-27 18:33:13'),
(7, 6, NULL, '85000', '85000', '1', '2023-03-27 19:16:45', '2023-03-27 19:16:45'),
(8, 7, NULL, '270000', '280000', '1', '2023-05-08 07:55:44', '2023-05-08 07:55:44'),
(9, 8, NULL, '150000', '150000', '1', '2023-05-09 06:05:49', '2023-05-09 06:05:49');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profit_losses`
--

CREATE TABLE `profit_losses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_prof_loss` int(96) DEFAULT NULL,
  `total_expenses` int(96) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profit_losses`
--

INSERT INTO `profit_losses` (`id`, `total_prof_loss`, `total_expenses`, `created_at`, `updated_at`) VALUES
(5, 20000, NULL, '2023-05-09 05:56:31', '2023-05-09 06:06:13');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `installment_count` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `paid_date` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sale_id`, `payment_id`, `installment_count`, `amount`, `paid_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 6, 1, 34000, '2023-05-22 07:00:00', NULL, '2023-03-22 15:15:24', '2023-03-27 18:16:18'),
(2, 5, 6, 2, 34000, '2023-07-22 07:00:00', NULL, '2023-03-22 15:15:24', '2023-03-27 18:16:35'),
(3, 5, 6, 3, 34000, '2023-09-22 07:00:00', NULL, '2023-03-22 15:15:24', '2023-03-22 15:15:24'),
(4, 5, 6, 4, 34000, '2023-11-22 08:00:00', NULL, '2023-03-22 15:15:24', '2023-03-22 15:15:24'),
(5, 5, 6, 5, 34000, '2024-01-22 08:00:00', NULL, '2023-03-22 15:15:24', '2023-03-22 15:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$dS4Pj0eGsW8/6vbdgHC33uFAZm3r8pRluQ/EaCB1JOBocpt6MlpiG', 'Zm8ginJNvnC5G5A3YN6upq7Z6fFOnERKpQmgkjavakc6tDXWNoHGgUIpOEHr', '2023-03-19 15:33:59', '2023-03-19 15:33:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_repairs`
--
ALTER TABLE `bike_repairs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bike_sales`
--
ALTER TABLE `bike_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profit_losses`
--
ALTER TABLE `profit_losses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
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
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `bike_repairs`
--
ALTER TABLE `bike_repairs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bike_sales`
--
ALTER TABLE `bike_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profit_losses`
--
ALTER TABLE `profit_losses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
