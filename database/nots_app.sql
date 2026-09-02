-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2026 at 04:57 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nots_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Personal', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(2, 'Work', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(3, 'Study', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(4, 'Ideas', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(5, 'To-Do', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(6, 'Finance', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(7, 'Health', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(8, 'Travel', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(9, 'Recipes', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(10, 'Projects', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(11, 'Meetings', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(12, 'Reminders', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(13, 'Quotes', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(14, 'Goals', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(15, 'Journal', '2026-09-02 21:17:31', '2026-09-02 21:17:31'),
(16, 'Personal', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(17, 'Work', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(18, 'Study', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(19, 'Ideas', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(20, 'To-Do', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(21, 'Finance', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(22, 'Health', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(23, 'Travel', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(24, 'Recipes', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(25, 'Projects', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(26, 'Meetings', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(27, 'Reminders', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(28, 'Quotes', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(29, 'Goals', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(30, 'Journal', '2026-09-02 21:26:56', '2026-09-02 21:26:56'),
(31, 'Personal', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(32, 'Work', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(33, 'Study', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(34, 'Ideas', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(35, 'To-Do', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(36, 'Finance', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(37, 'Health', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(38, 'Travel', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(39, 'Recipes', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(40, 'Projects', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(41, 'Meetings', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(42, 'Reminders', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(43, 'Quotes', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(44, 'Goals', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(45, 'Journal', '2026-09-02 21:27:47', '2026-09-02 21:27:47'),
(46, 'Personal', '2026-09-02 21:33:04', '2026-09-02 21:33:04'),
(47, 'Work', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(48, 'Study', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(49, 'Ideas', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(50, 'To-Do', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(51, 'Finance', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(52, 'Health', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(53, 'Travel', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(54, 'Recipes', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(55, 'Projects', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(56, 'Meetings', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(57, 'Reminders', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(58, 'Quotes', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(59, 'Goals', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(60, 'Journal', '2026-09-02 21:33:05', '2026-09-02 21:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` varchar(255) NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` smallint(5) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_07_28_232306_create_categories_table', 1),
(5, '2026_07_29_042220_create_notes_table', 1),
(6, '2026_09_01_150546_create_otps_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `favourate` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `category_id`, `user_id`, `content`, `favourate`, `created_at`, `updated_at`) VALUES
(2, 'Grocery list for the week', 1, 1, 'Milk, eggs, bread, spinach, chicken, rice, and olive oil. Don\'t forget the birthday candles for Saturday.', 'star', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(3, 'Laravel migration notes', 10, 1, 'Remember to use foreignId()->constrained() for relationships instead of manually defining foreign keys.', NULL, '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(4, 'Morning routine ideas', 7, 1, 'Wake up at 6am, 10 minutes of stretching, journal for 5 minutes, then a light breakfast before starting work.', 'star', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(5, 'Client meeting follow-up', 11, 1, 'Client wants the dashboard redesign completed by next Friday. Need to send a revised timeline by tomorrow.', NULL, '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(6, 'Book recommendations', 4, 1, 'Atomic Habits, Deep Work, and The Pragmatic Programmer were suggested by Ahmed during our call.', 'star', '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(7, 'Budget for next month', 6, 1, 'Rent 25000, groceries 10000, savings 15000, subscriptions 3000. Try to cut down on food delivery.', NULL, '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(8, 'Trip to Skardu', 8, 1, 'Plan for 5 days in July. Need to book hotel in advance and check weather conditions before packing.', NULL, '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(9, 'React hooks quick notes', 3, 1, 'useEffect runs after render, dependency array controls when it re-runs. Empty array means run once on mount.', NULL, '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(10, 'Chicken karahi recipe', 9, 1, '1kg chicken, 4 tomatoes, ginger garlic paste, green chilies, and a pinch of garam masala at the end.', NULL, '2026-09-02 21:33:05', '2026-09-02 21:33:05'),
(11, 'Task manager project plan', 10, 1, 'Start with auth, then dashboard, then task CRUD. Add categories and profile pages after core features work.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(12, 'Doctor appointment reminder', 12, 1, 'Dental checkup scheduled for next Tuesday at 4pm. Bring the old prescription along.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(13, 'Favorite quote today', 13, 1, 'Discipline is choosing between what you want now and what you want most.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(14, 'Yearly learning goals', 14, 1, 'Finish Livewire, Sanctum, and Queues. Build 5 small projects and one portfolio-level project by December.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(15, 'Random thought before sleep', 15, 1, 'Should reorganize the folder structure of the notes app before adding the tagging feature.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(16, 'Work standup summary', 2, 1, 'Finished the login and signup pages. Blocked on email verification since SMTP config needs testing.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(17, 'New investment idea', 6, 1, 'Look into mutual funds vs fixed deposits. Ask a financial advisor before committing any amount.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(18, 'Workout plan', 7, 1, 'Monday chest and triceps, Wednesday back and biceps, Friday legs. 30 minutes cardio twice a week.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(19, 'App feature brainstorm', 4, 1, 'Add dark mode, note pinning, and a search bar with category filters for the notes dashboard.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(20, 'Packing checklist', 8, 1, 'Passport, charger, power bank, medicines, and a light jacket for the evenings.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06'),
(21, 'PHP validation rules cheat sheet', 10, 1, 'required, email, unique:table,column, confirmed, min:8 — combine with pipe symbol or array syntax.', NULL, '2026-09-02 21:33:06', '2026-09-02 21:33:06');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `expires_at` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'viewer',
  `status` varchar(255) NOT NULL DEFAULT 'inactive',
  `profile` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `status`, `profile`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Ali Raza Mujahid', 'alirazamujahid102@gmail.com', '$2y$12$nY/XzYbbzu9257C7p193WukTCLsppMGbGex8AkdrbbhxWop7vZlZK', 'admin', 'active', '1788361019.JPG', '+923007994674', '2026-09-02 21:06:07', '2026-09-02 21:06:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_category_id_foreign` (`category_id`),
  ADD KEY `notes_user_id_foreign` (`user_id`);

--
-- Indexes for table `otps`
--
ALTER TABLE `otps`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
