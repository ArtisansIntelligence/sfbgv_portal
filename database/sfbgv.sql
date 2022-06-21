-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 03:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfbgv`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_ref_id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `sf_ref_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doj` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_unit` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `passport_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pancard_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aadharcard_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates_address`
--

CREATE TABLE `candidates_address` (
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_city` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_state` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_pincode` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates_case`
--

CREATE TABLE `candidates_case` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `app_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `initial_date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `report_type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interim_rep_upload_date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interim_rep_upload_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_rep_upload_date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `final_rep_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supp_rep_upload_date` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supp_rep_color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `candidates_case`
--

INSERT INTO `candidates_case` (`id`, `candidate_id`, `app_no`, `initial_date`, `report_type`, `interim_rep_upload_date`, `interim_rep_upload_color`, `final_rep_upload_date`, `final_rep_color`, `supp_rep_upload_date`, `supp_rep_color`, `remarks`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) VALUES
(1, 10014, '34', '03/12/1979', 'Ut facilis omnis rec', '07/10/2019', 'Commodo ut ea proide', '06/07/2009', 'Sit molestiae repre', '09/03/1998', 'Voluptatem modi dis', NULL, '2022-06-20 23:04:09', 10014, '2022-06-20 23:04:09', 10014);

-- --------------------------------------------------------

--
-- Table structure for table `candidates_documents`
--

CREATE TABLE `candidates_documents` (
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `doc_type` int(11) NOT NULL,
  `doc_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_file` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates_education`
--

CREATE TABLE `candidates_education` (
  `education_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `qual_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `college` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `university` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_of_passing` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_reg_enroll_pin_hall_no` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `candidates_employment`
--

CREATE TABLE `candidates_employment` (
  `employment_id` bigint(20) UNSIGNED NOT NULL,
  `candidate_id` bigint(20) UNSIGNED NOT NULL,
  `employer_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empl_no` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doj` date DEFAULT NULL,
  `dol` date DEFAULT NULL,
  `grade` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_of_leaving` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_no` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `client_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_unit` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hr_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_expiry` bigint(20) NOT NULL DEFAULT 3 COMMENT 'in Days',
  `token_regenerate` tinyint(4) NOT NULL DEFAULT 0,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `business_unit`, `zone`, `location`, `hr_name`, `token_expiry`, `token_regenerate`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) VALUES
(1, 'India Blankenship', 'Deserunt occaecat id', 'West', 'Nisi iure veritatis ', 'Lucas Tucker', 3, 0, '2022-06-07 06:38:14', 0, '2022-06-07 06:38:14', 0),
(2, 'Constance Bray', 'Veniam accusamus es', 'North', 'Doloremque illo enim', 'Isaac Reid', 3, 0, '2022-06-07 06:38:29', 0, '2022-06-07 06:38:29', 0),
(3, 'Calvin Park', 'Nemo voluptatum eum ', 'North', 'Laborum Doloribus e', 'Adrian Vazquez', 3, 0, '2022-06-08 03:45:41', 0, '2022-06-08 03:45:41', 0),
(4, 'Eugenia Cotton', 'Debitis rem voluptas', 'South', 'Quam modi laborum A', 'Sacha Rollins', 3, 0, '2022-06-08 03:45:58', 0, '2022-06-08 03:45:58', 0),
(5, 'Stephen Harris', 'Possimus proident ', 'East', 'Ad veniam itaque po', 'Barclay Nicholson', 3, 0, '2022-06-08 03:46:12', 0, '2022-06-08 03:46:12', 0),
(6, 'Wipro', 'IT', 'North', 'Navi Mumbai', 'Tanvi', 3, 0, '2022-06-08 04:43:30', 0, '2022-06-08 04:43:30', 0);

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
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`id`, `name`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) VALUES
(1, 'Assistant Manager', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(2, 'Assistant Vice President', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(3, 'Associate Vice President', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(4, 'Chief Manager', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(5, 'CXO', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(6, 'Deputy Manager', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(7, 'Executive Secretary', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(8, 'Graduate Trainee', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(9, 'Management Trainee', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(10, 'Manager', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(11, 'Manager Director & CEO', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(12, 'Officer', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(13, 'Retainer', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(14, 'Senior Manager', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(15, 'Senior Officer', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(16, 'Senior Vice President', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1),
(17, 'Vice President', '2022-06-06 07:16:51', 1, '2022-06-06 07:16:51', 1);

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
(1, '2014_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_06_01_074117_create_sessions_table', 1),
(7, '2022_06_01_083956_create_clients_table', 1),
(8, '2022_06_01_090529_create_user_client_mappings_table', 1),
(9, '2022_06_01_093853_create_candidates_table', 1),
(10, '2022_06_01_094725_create_candidates_address_table', 1),
(11, '2022_06_01_094746_create_candidates_documents_table', 1),
(12, '2022_06_01_094757_create_candidates_education_table', 1),
(13, '2022_06_01_094813_create_candidates_employment_table', 1),
(14, '2022_06_01_094835_create_grade_table', 1),
(15, '2022_06_03_052659_create_candidates_case_table', 1);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `is_active`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) VALUES
(1, 'Super Admin', 1, '2022-05-22 00:56:15', 1, '2022-05-22 00:56:15', 0),
(2, 'Spoc Person', 1, '2022-05-22 00:56:15', 1, '2022-05-22 00:56:15', 0),
(3, 'Client Admin', 1, '2022-05-22 01:15:13', 1, '2022-05-22 01:15:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `username`, `role_id`, `email_verified_at`, `password`, `remember_token`, `created_dt`, `created_by`, `updated_dt`, `updated_by`) VALUES
(2, 'Admin', 'admin@screenfacts.com', 'admin@screenfacts.com', 1, NULL, '$2y$10$WFMEQypyWEmTNPqEPWc0P.UV0EJb4IC6hKttEkrH4oMDAdeHgdDoe', 'Fh2HbB1iPoxZtoa8i193RK5l9FCzYeR05j9ek2bx48FDLqBHUUfplww2jDxJ', NULL, 0, NULL, 0),
(3, 'Spoc Persion', 'spoc@client.com', 'spoc@client.com', 2, NULL, '$2y$10$WFMEQypyWEmTNPqEPWc0P.UV0EJb4IC6hKttEkrH4oMDAdeHgdDoe', 'RRPC8OWwqCiA9toHhYbnLS4iocHTjDK76qz2qzel1Rp74RkO3LyXisRGY57E', NULL, 0, NULL, 0),
(4, 'Spoc Persion', 'admin@client.com', 'admin@client.com', 3, NULL, '$2y$10$WFMEQypyWEmTNPqEPWc0P.UV0EJb4IC6hKttEkrH4oMDAdeHgdDoe', 'MYwxbsyyOwqYaQhp4VhktqKi2Fv58lplMnpg2qKo15KLPelWIVXxyxZFMW9y', NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_client_mappings`
--

CREATE TABLE `user_client_mappings` (
  `mapping_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_dt` timestamp NULL DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL,
  `updated_dt` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates_address`
--
ALTER TABLE `candidates_address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `candidates_case`
--
ALTER TABLE `candidates_case`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates_documents`
--
ALTER TABLE `candidates_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `candidates_education`
--
ALTER TABLE `candidates_education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `candidates_employment`
--
ALTER TABLE `candidates_employment`
  ADD PRIMARY KEY (`employment_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grade_name_unique` (`name`);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_client_mappings`
--
ALTER TABLE `user_client_mappings`
  ADD PRIMARY KEY (`mapping_id`),
  ADD KEY `user_client_mappings_user_id_foreign` (`user_id`),
  ADD KEY `user_client_mappings_client_id_foreign` (`client_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates_address`
--
ALTER TABLE `candidates_address`
  MODIFY `address_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates_case`
--
ALTER TABLE `candidates_case`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates_documents`
--
ALTER TABLE `candidates_documents`
  MODIFY `document_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates_education`
--
ALTER TABLE `candidates_education`
  MODIFY `education_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidates_employment`
--
ALTER TABLE `candidates_employment`
  MODIFY `employment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_client_mappings`
--
ALTER TABLE `user_client_mappings`
  MODIFY `mapping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_client_mappings`
--
ALTER TABLE `user_client_mappings`
  ADD CONSTRAINT `user_client_mappings_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`client_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_client_mappings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
