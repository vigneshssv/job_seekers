-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2022 at 02:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_seekers`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `upadted_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `uuid`, `name`, `status`, `created_by`, `upadted_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '9f3505ec-72e6-11ed-a48a-3024a99ebe53', 'Vellore', 'active', NULL, NULL, NULL, '2022-12-03 03:13:55', '2022-12-03 03:13:55', NULL),
(2, '9f43032c-72e6-11ed-9315-3024a99ebe53', 'Vaniyambadi', 'active', NULL, NULL, NULL, '2022-12-03 03:13:55', '2022-12-03 03:13:55', NULL),
(3, '9f47f5bc-72e6-11ed-82b2-3024a99ebe53', 'Udhagamandalam', 'active', NULL, NULL, NULL, '2022-12-03 03:13:55', '2022-12-03 03:13:55', NULL),
(4, '9f4f7846-72e6-11ed-9352-3024a99ebe53', 'Tiruvannamalai', 'active', NULL, NULL, NULL, '2022-12-03 03:13:55', '2022-12-03 03:13:55', NULL),
(5, '9f57048a-72e6-11ed-90d0-3024a99ebe53', 'Tiruppur', 'active', NULL, NULL, NULL, '2022-12-03 03:13:55', '2022-12-03 03:13:55', NULL),
(6, '9f5e38e0-72e6-11ed-8fab-3024a99ebe53', 'Tirunelveli', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(7, '9f6a6a7a-72e6-11ed-ac9a-3024a99ebe53', 'Tiruchirappalli', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(8, '9f6fe2c0-72e6-11ed-92d4-3024a99ebe53', 'Thoothukkudi', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(9, '9f755c00-72e6-11ed-a557-3024a99ebe53', 'Thanjavur', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(10, '9f7ac690-72e6-11ed-9010-3024a99ebe53', 'Sivakasi', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(11, '9f803c88-72e6-11ed-b9d0-3024a99ebe53', 'Salem', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(12, '9f875ca2-72e6-11ed-8d23-3024a99ebe53', 'Ranipet', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(13, '9f8ce398-72e6-11ed-aadd-3024a99ebe53', 'Rajapalayam', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(14, '9f9402fe-72e6-11ed-9d2b-3024a99ebe53', 'Pudukkottai', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(15, '9f9cd50a-72e6-11ed-a5a7-3024a99ebe53', 'Pollachi', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(16, '9fa5aeaa-72e6-11ed-acea-3024a99ebe53', 'Neyveli', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(17, '9fbb378e-72e6-11ed-90f3-3024a99ebe53', 'Nagercoil', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(18, '9fe80ee4-72e6-11ed-ae32-3024a99ebe53', 'Nagapattinam', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(19, '9ff0e078-72e6-11ed-acfb-3024a99ebe53', 'Madurai', 'active', NULL, NULL, NULL, '2022-12-03 03:13:56', '2022-12-03 03:13:56', NULL),
(20, 'a005e176-72e6-11ed-8ffa-3024a99ebe53', 'Kumbakonam', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(21, 'a0109f76-72e6-11ed-a245-3024a99ebe53', 'Kumarapalayam', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(22, 'a01e966c-72e6-11ed-88a1-3024a99ebe53', 'Karur', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(23, 'a0304358-72e6-11ed-8b67-3024a99ebe53', 'Karaikkudi', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(24, 'a0415c60-72e6-11ed-adfd-3024a99ebe53', 'Kanchipuram', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(25, 'a04d773e-72e6-11ed-abdf-3024a99ebe53', 'Hosur', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(26, 'a057f6e6-72e6-11ed-877a-3024a99ebe53', 'Gudiyatham', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(27, 'a0626d2e-72e6-11ed-bfa1-3024a99ebe53', 'Erode', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(28, 'a06eb4b2-72e6-11ed-aa15-3024a99ebe53', 'Dindigul', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(29, 'a07959bc-72e6-11ed-a7f6-3024a99ebe53', 'Cuddalore', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(30, 'a0858dc2-72e6-11ed-9752-3024a99ebe53', 'Coimbatore', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(31, 'a08cb5b6-72e6-11ed-a0a5-3024a99ebe53', 'Chennai', 'active', NULL, NULL, NULL, '2022-12-03 03:13:57', '2022-12-03 03:13:57', NULL),
(32, 'a0957f02-72e6-11ed-8614-3024a99ebe53', 'Ambur', 'active', NULL, NULL, NULL, '2022-12-03 03:13:58', '2022-12-03 03:13:58', NULL),
(33, '97da8b18-72e7-11ed-aeda-3024a99ebe53', 'Vellore', 'active', 1, NULL, NULL, '2022-12-03 03:20:52', '2022-12-03 03:20:52', NULL),
(34, '97f31b6a-72e7-11ed-90ca-3024a99ebe53', 'Vaniyambadi', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(35, '97fbce5e-72e7-11ed-b5f1-3024a99ebe53', 'Udhagamandalam', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(36, '9802f472-72e7-11ed-b416-3024a99ebe53', 'Tiruvannamalai', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(37, '980bd15a-72e7-11ed-9fcc-3024a99ebe53', 'Tiruppur', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(38, '9812ef4e-72e7-11ed-bf3c-3024a99ebe53', 'Tirunelveli', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(39, '981dd634-72e7-11ed-8346-3024a99ebe53', 'Tiruchirappalli', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(40, '9827173a-72e7-11ed-8202-3024a99ebe53', 'Thoothukkudi', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(41, '982e44ba-72e7-11ed-ad2b-3024a99ebe53', 'Thanjavur', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(42, '983cdffc-72e7-11ed-a331-3024a99ebe53', 'Sivakasi', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(43, '985688bc-72e7-11ed-9b26-3024a99ebe53', 'Salem', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(44, '985dafca-72e7-11ed-94c9-3024a99ebe53', 'Ranipet', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(45, '98683c60-72e7-11ed-b92b-3024a99ebe53', 'Rajapalayam', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(46, '9872bbb8-72e7-11ed-ba7e-3024a99ebe53', 'Pudukkottai', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(47, '987d46dc-72e7-11ed-a779-3024a99ebe53', 'Pollachi', 'active', 1, NULL, NULL, '2022-12-03 03:20:53', '2022-12-03 03:20:53', NULL),
(48, '98883876-72e7-11ed-9ebc-3024a99ebe53', 'Neyveli', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(49, '98a0a53c-72e7-11ed-92d3-3024a99ebe53', 'Nagercoil', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(50, '98a7cbc8-72e7-11ed-87cb-3024a99ebe53', 'Nagapattinam', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(51, '98b0b74c-72e7-11ed-9da1-3024a99ebe53', 'Madurai', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(52, '98bb3f64-72e7-11ed-b57b-3024a99ebe53', 'Kumbakonam', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(53, '98c2529a-72e7-11ed-9656-3024a99ebe53', 'Kumarapalayam', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(54, '98c97048-72e7-11ed-ba76-3024a99ebe53', 'Karur', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(55, '98d84028-72e7-11ed-9038-3024a99ebe53', 'Karaikkudi', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(56, '98dd889e-72e7-11ed-8778-3024a99ebe53', 'Kanchipuram', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(57, '98e309ea-72e7-11ed-aac3-3024a99ebe53', 'Hosur', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(58, '98ea3102-72e7-11ed-8640-3024a99ebe53', 'Gudiyatham', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(59, '98f156e4-72e7-11ed-a3fc-3024a99ebe53', 'Erode', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(60, '98ff54b0-72e7-11ed-a3fc-3024a99ebe53', 'Dindigul', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(61, '9909de4e-72e7-11ed-8e6a-3024a99ebe53', 'Cuddalore', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(62, '99110598-72e7-11ed-8fab-3024a99ebe53', 'Coimbatore', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(63, '991828aa-72e7-11ed-a364-3024a99ebe53', 'Chennai', 'active', 1, NULL, NULL, '2022-12-03 03:20:54', '2022-12-03 03:20:54', NULL),
(64, '991f376c-72e7-11ed-a858-3024a99ebe53', 'Ambur', 'active', 1, NULL, NULL, '2022-12-03 03:20:55', '2022-12-03 03:20:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_seekers`
--

CREATE TABLE `job_seekers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` bigint(20) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_from` year(4) DEFAULT NULL,
  `experience_to` year(4) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `notice_period` int(11) DEFAULT NULL,
  `skills` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `upadted_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_seekers`
--

INSERT INTO `job_seekers` (`id`, `uuid`, `name`, `email`, `mobile_number`, `password`, `experience_from`, `experience_to`, `experience`, `notice_period`, `skills`, `city`, `resume_url`, `photo_url`, `status`, `created_by`, `upadted_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, '3e17d136-7304-11ed-9fe9-3024a99ebe53', 'asf', 'svignesh.svsr@gmail.com', 7352353245, '$2y$10$x6B1S/MmRbcSc6ih9PfYhOJIYwbJrQfPN13ovAXugwFA9PxOzIsfG', 2019, 2021, 2, 2, 'php,mysql', NULL, '1670069757_bio-data.pdf', '1670069758_bio-data.jpg', 'active', NULL, NULL, NULL, '2022-12-03 06:45:57', '2022-12-03 11:51:56', '2022-12-03 11:51:56'),
(6, '6f9a64c4-7306-11ed-8901-3024a99ebe53', 'vijay', 'vijay@g.com', 9124124214, '$2y$10$t3at1kTcdR.RwqqeYrpmteoH5bDd4FK41nPKHuKWejLk12uTox8EW', 2020, 2021, 1, 2, 'sf', NULL, '1670070699_bio-data.jpg', '1670070700_acenture.png', 'active', NULL, NULL, NULL, '2022-12-03 07:01:39', '2022-12-03 11:51:01', '2022-12-03 11:51:01'),
(7, 'ff284f10-732f-11ed-bae8-3024a99ebe53', 'vijay', 'sv@g.coms', 6464164564, '$2y$10$0NdNmj28hUycwHj0yEVbv.qO39PN5diN2i213sBs9nfZkfENeE2O2', 2025, 2028, 3, 2, 'php,mysql', '2', '1670088550_Resume.doc', '1670172879_aaadhar.jpg', 'active', NULL, NULL, NULL, '2022-12-03 11:59:09', '2022-12-04 11:26:46', NULL),
(8, 'c687dbf6-73f4-11ed-b36a-3024a99ebe53', 'jobn', 'john@g.com', 8465121621, '$2y$10$JoDLtjZcgJOkMIPOi2yiiepcyHcVdi4cWkBy.XfKSCyKsmkdIWtYW', 2020, 2021, 1, 2, 'ph', '1', '1670173065_Resume.doc', '1670173066_acenture.png', 'active', NULL, NULL, NULL, '2022-12-04 11:27:45', '2022-12-04 11:31:13', NULL);

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
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2022_12_03_071155_create_job_seekers_table', 1),
(24, '2022_12_03_080713_create_cities_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` bigint(20) DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `upadted_by` int(11) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `user_name`, `email`, `mobile_number`, `address`, `email_verified_at`, `password`, `status`, `remember_token`, `created_by`, `upadted_by`, `deleted_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '6bdf3532-730e-11ed-a937-3024a99ebe53', 'admin', 'vignesh@g.com', 9124214214, NULL, NULL, '$2y$10$btl3sTIU.283OSU7RbLkEegYBjvOBBBsbDoXsAElnl7QAPAtPV9pS', 'active', NULL, NULL, NULL, NULL, '2022-12-03 07:58:49', '2022-12-03 07:58:49', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_seekers`
--
ALTER TABLE `job_seekers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_seekers_email_unique` (`email`),
  ADD UNIQUE KEY `job_seekers_mobile_number_unique` (`mobile_number`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_number_unique` (`mobile_number`),
  ADD KEY `users_user_name_email_mobile_number_password_index` (`user_name`,`email`,`mobile_number`,`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_seekers`
--
ALTER TABLE `job_seekers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
