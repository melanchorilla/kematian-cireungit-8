-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2022 at 05:01 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kematian-cireungit-8`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_17_140300_create_transactions_table', 2);

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
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `penerimaan` bigint(20) NOT NULL,
  `pengeluaran` bigint(20) NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `penerimaan`, `pengeluaran`, `keterangan`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 138000, 0, 'Pemindahan Buku Uang Kas', 1, '1998-12-28 07:51:55', '2021-05-09 07:51:55'),
(2, 19225, 0, 'Pendapatan dari pendaftaran KTP', 1, '1998-12-30 07:51:55', '2021-05-16 13:41:57'),
(3, 0, 24225, 'Membeli alat tulis, buku dan fotocopy', 1, '1998-12-30 13:44:53', '2021-05-16 13:44:53'),
(4, 15500, 0, 'Pendapatan dari infak', 1, '1999-01-16 07:51:55', '2021-05-16 13:47:55'),
(5, 0, 10000, 'THR Pak Endang (penyetor)', 1, '1999-01-16 07:51:55', '2021-05-16 13:49:20'),
(6, 9000, 0, 'Sumbangan kematian', 1, '1999-02-11 07:51:55', '2021-05-16 13:51:50'),
(7, 8000, 0, 'Sumbangan Kematian', 1, '1999-03-10 07:51:55', '2021-05-16 13:54:41'),
(8, 11000, 0, 'Sumbangan kematian', 1, '1999-04-08 07:51:55', '2021-05-16 13:56:29'),
(9, 6000, 0, 'Sumbangan kematian', 1, '1999-05-09 07:51:55', '2021-05-16 14:00:04'),
(10, 8000, 0, 'Sumbangan kematian', 1, '1999-06-12 07:51:55', '2021-05-16 14:00:52'),
(11, 10000, 0, 'Sumbangan kematian', 1, '1999-08-08 07:51:55', '2021-05-16 14:01:35'),
(12, 0, 30000, 'Dipinjam Pak Dodo', 1, '1999-08-30 07:51:55', '2021-05-16 13:51:50'),
(13, 30000, 0, 'Pak Dodo bayar', 1, '1999-09-07 07:51:55', '2021-05-16 14:05:05'),
(14, 10000, 0, 'Sumbangan kematian', 1, '1999-09-10 07:51:55', '2021-05-16 14:06:47'),
(15, 8000, 0, 'Sumbangan kematian', 1, '1999-10-10 07:51:55', '2021-05-16 14:19:07'),
(16, 14000, 0, 'Sumbangan kematian', 1, '1999-11-08 07:51:55', '2021-05-16 14:20:14'),
(17, 0, 147050, 'Belanja kain, sabun, minyak, kamper, kapas (dan keperlian mengurus mayat)', 1, '1999-11-16 07:51:55', '2021-05-16 14:31:15'),
(18, 17000, 0, 'Sumbangan kematian', 1, '2000-01-06 07:51:55', '2021-05-16 14:38:55'),
(19, 0, 10000, 'THR Pak Endang (penyetor)', 1, '2000-01-07 07:51:55', '2021-05-16 14:46:56'),
(20, 7000, 0, 'Sumbangan kematian', 1, '2000-02-07 07:51:55', '2021-05-16 15:02:48'),
(21, 11000, 0, 'Sumbangan kematian', 1, '2000-03-08 07:51:55', '2021-05-17 06:04:09'),
(22, 8000, 0, 'Sumbangan kematian', 1, '2000-05-15 07:51:55', '2021-05-17 06:09:15'),
(23, 9000, 0, 'Sumbangan kematian', 1, '2000-06-12 07:51:55', '2021-05-17 06:10:31'),
(24, 10000, 0, 'Sumbangan kematian', 1, '2000-07-08 07:51:55', '2021-05-17 06:13:02'),
(25, 0, 25000, 'Menyumbang untuk HUT RI', 1, '2000-07-08 07:51:55', '2021-05-17 06:15:53'),
(26, 9000, 0, 'Sumbangan kematian', 1, '2000-09-14 07:51:55', '2021-05-17 06:43:37'),
(27, 10000, 0, 'Sumbangan kematian', 1, '2000-10-10 07:51:55', '2021-05-17 06:44:24'),
(28, 11000, 0, 'Sumbangan kematian', 1, '2000-11-20 07:51:55', '2021-05-17 06:45:11'),
(29, 0, 20000, 'THR Pak Endang (penyetor)', 1, '2000-12-26 07:51:55', '2021-05-17 06:46:12'),
(30, 12450, 0, 'Sumbangan kematian', 1, '2001-01-12 06:48:18', '2021-05-17 06:48:18'),
(31, 14000, 0, 'Sumbangan kematian', 1, '2001-02-20 06:48:18', '2021-05-17 06:49:27'),
(32, 0, 3000, 'Photocopy rapat qurban', 1, '2001-02-20 06:48:18', '2021-05-17 06:50:21'),
(33, 14000, 0, 'Sumbangan kematian', 1, '2001-04-23 06:48:18', '2021-05-17 08:45:49'),
(34, 15000, 0, 'Sumbangan kematian', 1, '2001-05-15 06:48:18', '2021-05-17 08:47:07'),
(35, 12000, 0, 'Sumbangan kematian', 1, '2001-06-15 06:48:18', '2021-05-17 08:48:39'),
(36, 8000, 0, 'Sumbangan kematian', 1, '2001-07-15 06:48:18', '2021-05-17 08:49:41'),
(37, 13000, 0, 'Sumbangan kematian', 1, '2001-08-12 06:48:18', '2021-05-17 08:50:41'),
(38, 16000, 0, 'Sumbangan kematian', 1, '2001-10-06 06:48:18', '2021-05-18 07:53:53'),
(39, 50000, 0, 'Donatur / infaq', 1, '2001-10-24 06:48:18', '2021-05-18 07:54:54'),
(40, 19000, 0, 'Sumbangan kematian', 1, '2001-11-13 06:48:18', '2021-05-18 07:55:52'),
(41, 0, 20000, 'THR Pak Endang (penyetor)', 1, '2001-12-12 06:48:18', '2021-05-18 07:58:18'),
(42, 16000, 0, 'Sumbangan kematian', 1, '2001-12-14 06:48:18', '2021-05-18 08:01:54'),
(43, 0, 7500, 'Photocopy', 1, '2001-12-28 06:48:18', '2021-05-18 08:04:13'),
(44, 0, 17400, 'Kebutuhan rapat', 1, '2001-12-29 06:48:18', '2021-05-18 08:06:41'),
(45, 18000, 0, 'Sumbangan kematian', 1, '2002-02-05 06:48:18', '2021-05-18 08:21:08'),
(46, 23000, 0, 'Sumbangan kematian', 1, '2002-04-17 06:48:18', '2021-05-18 08:22:08'),
(47, 25000, 0, 'Sumbangan kematian', 1, '2002-09-17 06:48:18', '2021-05-18 08:22:44'),
(48, 17000, 0, 'Sumbangan kematian', 1, '2002-10-17 06:48:18', '2021-05-18 08:40:29'),
(49, 37000, 0, 'Sumbangan kematian', 1, '2002-11-17 06:48:18', '2021-05-18 08:41:22'),
(50, 0, 20000, 'THR Pak Endang (penyetor)', 1, '2002-11-17 06:48:18', '2021-05-18 08:41:55'),
(51, 15000, 0, 'Sumbangan kematian', 1, '2003-01-20 06:48:18', '2021-05-18 22:44:24'),
(52, 34000, 0, 'Sumbangan kematian', 1, '2003-04-12 06:48:18', '2021-05-18 22:45:05'),
(53, 7600, 0, 'Sumbangan kematian', 1, '2003-05-15 06:48:18', '2021-05-18 22:45:59'),
(54, 31000, 0, 'Sumbangan kematian', 1, '2003-06-17 06:48:18', '2021-05-18 22:46:41'),
(55, 40000, 0, 'Sumbangan kematian', 1, '2003-08-07 06:48:18', '2021-05-18 22:47:24'),
(56, 31500, 0, 'Sumbangan kematian', 1, '2003-10-08 06:48:18', '2021-05-18 22:48:09'),
(57, 17000, 0, 'Sumbangan kematian', 1, '2003-11-11 06:48:18', '2021-05-18 22:49:04'),
(58, 0, 25000, 'Sumbangan kematian', 1, '2003-11-14 06:48:18', '2021-05-18 22:49:41'),
(59, 21000, 0, 'Sumbangan kematian', 1, '2004-01-07 06:48:18', '2021-05-18 22:50:59'),
(60, 50000, 0, 'Sumbangan kematian', 1, '2004-03-29 06:48:18', '2021-05-18 22:51:40'),
(61, 44000, 0, 'Sumbangan kematian', 1, '2004-04-14 06:48:18', '2021-05-18 22:52:18'),
(62, 0, 310500, 'Belanja kain kafan, kayu, sabun, kamper, minyak, dan kapas', 1, '2004-04-24 06:48:18', '2021-05-18 22:52:57'),
(63, 0, 11000, 'Parkir dan ongkos', 1, '2004-04-24 06:48:18', '2021-05-18 22:54:09'),
(64, 0, 10000, 'Photocopy karcis kematian (sumbangan)', 1, '2004-04-25 06:48:18', '2021-05-18 23:34:48'),
(65, 34900, 0, 'Sumbangan kematian', 1, '2004-05-07 06:48:18', '2021-05-18 23:37:41'),
(66, 0, 1500, 'Beli Ballpoint', 1, '2004-05-07 06:48:18', '2021-05-18 23:38:33'),
(67, 5000, 0, 'Pak Endang bayar', 1, '2004-05-17 06:48:18', '2021-05-18 23:40:19'),
(68, 27000, 0, 'Sumbangan kematian', 1, '2004-06-05 06:48:18', '2021-05-18 23:42:39'),
(69, 35500, 15000, 'Sumbangan kematian + Bayar biaya pungutan Pak Ujang', 1, '2004-07-05 06:48:18', '2021-05-18 23:43:17'),
(70, 62000, 0, 'Sumbangan kematian', 1, '2004-10-31 06:48:18', '2021-05-18 23:45:06'),
(71, 23500, 0, 'Sumbangan kematian', 1, '2004-11-10 06:48:18', '2021-05-18 23:46:23'),
(72, 30000, 15000, 'Sumbangan kematian + Bayar biaya pungutan Pak Ujang', 1, '2004-12-06 06:48:18', '2021-05-18 23:47:17'),
(73, 50000, 10000, 'Sumbangan kematian + Bayar biaya pungutan Pak Ujang', 1, '2005-03-08 06:48:18', '2021-05-18 23:49:03'),
(74, 100000, 0, 'Sumbangan dari keluarga Ibu Ujah', 1, '2005-12-07 06:48:18', '2021-05-18 23:51:49'),
(75, 44500, 15000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-01-14 06:48:18', '2021-05-19 00:43:07'),
(76, 50000, 0, 'Sumbangan dari keluarga Bu Emin', 1, '2006-01-21 06:48:18', '2021-05-19 00:44:41'),
(77, 23500, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-02-05 06:48:18', '2021-05-19 00:46:47'),
(78, 25000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-03-05 06:48:18', '2021-05-19 00:48:09'),
(79, 25500, 6000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-04-05 06:48:18', '2021-05-19 00:50:27'),
(80, 40500, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-05-05 06:48:18', '2021-05-19 00:51:14'),
(81, 16000, 4000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-06-06 06:48:18', '2021-05-19 00:52:02'),
(82, 27000, 4000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-07-05 06:48:18', '2021-05-19 00:52:59'),
(83, 22500, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-08-05 06:48:18', '2021-05-19 00:53:53'),
(84, 26000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-09-06 06:48:18', '2021-05-19 00:56:32'),
(85, 25500, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-10-05 06:48:18', '2021-05-19 00:57:05'),
(86, 27000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-11-05 06:48:18', '2021-05-19 00:58:24'),
(87, 16000, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2006-12-05 06:48:18', '2021-05-19 00:59:10'),
(88, 37000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2007-01-05 06:48:18', '2021-05-19 01:00:08'),
(89, 17500, 2500, 'Sumbangan kematian + upah untuk penagih', 1, '2007-02-05 06:48:18', '2021-05-20 06:40:32'),
(90, 29000, 3500, 'Sumbangan kematian + upah untuk penagih', 1, '2007-03-05 06:48:18', '2021-05-20 06:41:56'),
(91, 32500, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2007-04-08 06:48:18', '2021-05-20 06:42:39'),
(92, 19000, 2500, 'Sumbangan kematian + upah untuk penagih', 1, '2007-05-06 06:48:18', '2021-05-20 06:44:04'),
(93, 21000, 2500, 'Sumbangan kematian + upah untuk penagih', 1, '2007-06-07 06:48:18', '2021-05-20 06:44:58'),
(94, 16500, 1500, 'Sumbangan kematian + upah untuk penagih', 1, '2007-07-05 06:48:18', '2021-05-20 06:54:48'),
(95, 18000, 2000, 'Sumbangan kematian + upah untuk penagih', 1, '2007-08-06 06:48:18', '2021-05-20 06:55:18'),
(96, 21000, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2007-09-06 06:48:18', '2021-05-20 07:33:29'),
(97, 0, 551500, 'Beli kain kafan dan alat-alat mayat lainnya', 1, '2007-10-04 06:48:18', '2021-05-20 07:34:21'),
(98, 30800, 2800, 'Sumbangan kematian + upah untuk penagih', 1, '2007-10-06 06:48:18', '2021-05-20 07:38:06'),
(99, 10000, 2000, 'Sumbangan kematian + upah untuk penagih', 1, '2007-12-06 06:48:18', '2021-05-20 07:39:44'),
(100, 70000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2008-01-05 06:48:18', '2021-05-20 07:40:58'),
(101, 47000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2008-03-05 06:48:18', '2021-05-20 07:42:11'),
(102, 76000, 6000, 'Sumbangan kematian + upah untuk penagih', 1, '2008-07-09 06:48:18', '2021-05-20 07:42:55'),
(103, 94000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-01-06 06:48:18', '2021-05-20 07:43:58'),
(104, 33500, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-02-06 06:48:18', '2021-05-20 07:44:35'),
(105, 42500, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-03-03 06:48:18', '2021-05-20 07:47:49'),
(106, 36500, 4000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-04-03 06:48:18', '2021-05-20 07:48:33'),
(107, 53000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-05-03 06:48:18', '2021-05-20 07:51:54'),
(108, 44500, 4000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-06-07 06:48:18', '2021-05-20 07:53:30'),
(109, 30000, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-07-06 06:48:18', '2021-05-21 13:39:24'),
(110, 56000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-08-06 06:48:18', '2021-05-21 13:44:04'),
(111, 45000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-10-06 06:48:18', '2021-05-21 13:50:04'),
(112, 47000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-11-07 06:48:18', '2021-05-21 13:53:20'),
(113, 25000, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2009-12-08 06:48:18', '2021-05-21 13:56:00'),
(114, 103000, 10000, 'Sumbangan kematian + upah untuk penagih', 1, '2010-01-19 06:48:18', '2021-05-21 13:59:29'),
(115, 96000, 8000, 'Sumbangan kematian + upah untuk penagih', 1, '2010-04-04 06:48:18', '2021-05-21 14:00:31'),
(116, 34000, 6000, 'Sumbangan kematian + upah untuk penagih', 1, '2010-05-15 06:48:18', '2021-05-21 14:08:07'),
(117, 0, 678000, 'Beli kain kafan, kapas, minyak melati, dan alat-alat kematian', 1, '2010-05-24 06:48:18', '2021-05-21 14:08:52'),
(118, 44000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2010-06-10 06:48:18', '2021-05-21 14:14:33'),
(119, 52000, 10000, 'Sumbangan kematian + upah untuk penagih', 1, '2010-07-09 06:48:18', '2021-05-21 14:15:42'),
(120, 1000, 0, 'Sumbangan kematian', 1, '2010-07-30 06:48:18', '2021-05-21 14:16:28'),
(121, 25000, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2010-08-05 06:48:18', '2021-05-21 14:17:03'),
(122, 85000, 8000, 'Sumbangan kematian + upah untuk penagih', 1, '2010-12-11 06:48:18', '2021-05-21 14:18:31'),
(123, 5000, 0, 'Sumbangan kematian', 1, '2010-12-12 06:48:18', '2021-05-21 14:20:35'),
(124, 83000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2011-01-09 06:48:18', '2021-05-21 14:22:36'),
(125, 34000, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2011-02-20 06:48:18', '2021-05-21 14:28:05'),
(126, 10000, 0, 'Sumbangan kematian', 1, '2011-03-07 06:48:18', '2021-05-21 14:31:04'),
(127, 98000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2011-06-05 06:48:18', '2021-05-21 14:47:34'),
(128, 163000, 0, 'Sumbangan kematian', 1, '2011-10-07 06:48:18', '2021-05-21 14:49:23'),
(129, 2000, 0, 'Sumbangan kematian', 1, '2011-10-11 06:48:18', '2021-05-21 14:51:44'),
(130, 1000, 0, 'Sumbangan kematian', 1, '2011-11-29 06:48:18', '2021-05-21 14:54:58'),
(131, 195000, 0, 'Sumbangan kematian', 1, '2012-03-12 06:48:18', '2021-05-21 14:57:02'),
(132, 33000, 0, 'Sumbangan kematian', 1, '2012-03-13 06:48:18', '2021-05-21 15:01:01'),
(133, 0, 332000, 'Beli kafan 2 lusin (Rp.130.000) minyak 20 (Rp.100.000) 2 gayung (Rp.7.500 * 2 = Rp.15.000) 2 ember (Rp.43.500 * 2 = Rp.87.000)', 1, '2012-03-13 06:48:18', '2021-05-21 15:03:21'),
(134, 17000, 0, 'Sumbangan kematian', 1, '2012-03-14 06:48:12', '2021-05-21 15:06:22'),
(135, 0, 50000, 'Beli kamper', 1, '2012-03-14 06:48:12', '2021-05-21 15:18:21'),
(136, 12000, 0, 'Sumbangan kematian', 1, '2012-03-17 06:48:18', '2021-05-21 15:45:34'),
(137, 50000, 0, 'Sumbangan kematian', 1, '2012-10-04 06:48:18', '2021-05-21 15:46:14'),
(138, 167000, 0, 'Sumbangan kematian', 1, '2012-10-17 06:48:18', '2021-05-21 15:48:51'),
(139, 88000, 0, 'Sumbangan kematian', 1, '2012-11-17 06:48:18', '2021-05-21 15:54:20'),
(140, 78000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2012-12-02 06:48:18', '2021-05-21 15:56:15'),
(141, 52000, 6000, 'Sumbangan kematian + upah untuk penagih', 1, '2012-12-16 06:48:18', '2021-05-21 15:58:36'),
(142, 17000, 0, 'Sumbangan kematian', 1, '2013-01-07 06:48:18', '2021-05-21 16:03:15'),
(143, 117000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-01-13 06:48:18', '2021-05-21 16:04:13'),
(144, 132000, 15000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-02-28 06:48:18', '2021-05-21 16:05:19'),
(145, 32000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-03-20 06:48:18', '2021-05-21 16:06:56'),
(146, 111000, 15000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-06-13 06:48:18', '2021-05-21 16:07:38'),
(147, 96000, 8000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-10-05 06:48:18', '2021-05-21 16:08:22'),
(148, 113000, 13000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-11-09 06:48:18', '2021-05-21 16:09:22'),
(149, 22000, 4000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-12-14 06:48:18', '2021-05-22 13:40:41'),
(150, 159000, 9000, 'Sumbangan kematian + upah untuk penagih', 1, '2013-01-07 06:48:18', '2021-05-22 13:52:49'),
(151, 0, 260000, 'Beli kapas 2 lusin Rp.240.000 ongkos Rp.20.000', 1, '2014-01-13 06:48:18', '2021-05-22 13:55:54'),
(152, 129000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2014-02-09 06:48:18', '2021-05-22 14:00:11'),
(153, 100000, 0, 'Dari keluarga H. Ai', 1, '2014-02-26 06:48:18', '2021-05-22 15:46:21'),
(154, 55000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2014-03-14 06:48:18', '2021-05-22 16:07:18'),
(155, 34000, 4000, 'Sumbangan kematian + upah untuk penagih', 1, '2014-04-24 06:48:18', '2021-05-22 16:17:09'),
(156, 30000, 3000, 'Sumbangan kematian + upah untuk penagih', 1, '2014-05-25 06:48:18', '2021-05-22 16:19:26'),
(157, 0, 48750, 'Beli kamper', 1, '2014-08-06 06:48:18', '2021-05-22 16:20:58'),
(158, 0, 1042000, 'Beli kafan dan ongkos', 1, '2014-06-27 06:48:18', '2021-05-22 16:25:59'),
(159, 147000, 7000, 'Sumbangan kematian + upah untuk penagih', 1, '2014-11-04 06:48:18', '2021-05-22 16:30:11'),
(160, 79000, 5000, 'Sumbangan kematian + upah untuk penagih', 1, '2014-12-15 06:48:18', '2021-05-22 16:33:40'),
(161, 302000, 12000, 'Sumbangan kematian + upah untuk penagih', 1, '2015-01-16 06:48:18', '2021-05-23 01:09:36'),
(162, 0, 135000, 'Beli teko', 1, '2015-03-15 06:48:18', '2021-05-23 01:10:59'),
(163, 270000, 0, 'Sumbangan kematian', 1, '2015-05-13 06:48:18', '2021-05-23 01:12:11'),
(164, 0, 128000, 'Beli minyak wangi dan parfum', 1, '2015-05-17 06:48:18', '2021-05-23 01:14:37'),
(165, 271000, 20000, 'Sumbangan kematian + upah untuk penagih', 1, '2015-05-20 06:48:18', '2021-05-23 01:16:48'),
(166, 341000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2015-09-16 06:48:18', '2021-05-23 01:17:39'),
(167, 0, 186000, 'Beli kapas 2 lusin', 1, '2015-09-21 06:48:18', '2021-05-23 01:18:37'),
(168, 100000, 0, 'Sumbangan kematian', 1, '2015-10-16 06:48:18', '2021-05-23 01:19:50'),
(169, 197000, 20000, 'Sumbangan kematian + upah untuk penagih', 1, '2015-10-20 06:48:18', '2021-05-23 01:22:56'),
(170, 218000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2015-11-14 06:48:18', '2021-05-23 01:24:02'),
(171, 0, 1420000, 'Beli kain kafan', 1, '2016-01-08 06:48:18', '2021-05-23 01:24:54'),
(172, 474000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2016-02-28 06:48:18', '2021-05-23 01:27:27'),
(173, 321000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2016-06-09 06:48:18', '2021-05-23 01:30:08'),
(174, 50000, 0, 'Sumbangan kematian', 1, '2016-07-31 06:48:18', '2021-05-23 01:30:59'),
(175, 0, 363400, 'Beli kapas, kamper, sabun dan minyak wangi', 1, '2016-08-08 06:48:18', '2021-05-23 01:31:30'),
(176, 250000, 0, 'Sumbangan kematian', 1, '2016-08-22 06:48:18', '2021-05-23 01:33:32'),
(177, 350000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2016-09-08 06:48:18', '2021-05-23 01:34:37'),
(178, 140000, 20000, 'Sumbangan kematian + upah untuk penagih', 1, '2016-10-17 06:48:18', '2021-05-23 01:36:25'),
(179, 118000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2016-11-14 06:48:18', '2021-05-23 01:37:01'),
(180, 50000, 15000, 'Sumbangan kematian + upah untuk penagih', 1, '2016-12-11 06:48:18', '2021-05-23 01:38:14'),
(181, 390000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-01-14 06:48:18', '2021-05-23 07:05:45'),
(182, 353000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-02-13 06:48:18', '2021-05-23 07:07:07'),
(183, 400000, 0, 'Sumbangan kematian', 1, '2017-02-25 06:48:18', '2021-05-23 07:09:24'),
(184, 287000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-03-09 06:48:18', '2021-05-23 07:12:03'),
(185, 460000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-05-09 06:48:18', '2021-05-23 07:14:25'),
(186, 366000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-06-07 06:48:18', '2021-05-23 07:15:12'),
(187, 355000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-07-18 06:48:18', '2021-05-23 07:16:16'),
(188, 229000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-08-10 06:48:18', '2021-05-23 07:16:57'),
(189, 295000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-09-06 06:48:18', '2021-05-23 07:17:47'),
(190, 283000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-10-08 06:48:18', '2021-05-23 07:18:32'),
(191, 257000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-11-11 06:48:18', '2021-05-23 07:20:28'),
(192, 224000, 20000, 'Sumbangan kematian + upah untuk penagih', 1, '2017-12-08 06:48:18', '2021-05-23 07:21:58'),
(193, 396000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-01-07 06:48:18', '2021-05-23 07:23:15'),
(194, 240500, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-02-17 06:48:18', '2021-05-23 07:24:30'),
(195, 350000, 0, 'Sumbangan kematian', 1, '2018-02-20 06:48:18', '2021-05-23 07:28:16'),
(196, 325000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-03-12 06:48:18', '2021-05-23 07:30:22'),
(197, 269000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-04-09 06:48:18', '2021-05-23 07:31:51'),
(198, 337000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-05-13 06:48:18', '2021-05-23 07:32:54'),
(199, 250000, 0, 'Sumbangan kematian', 1, '2018-06-02 06:48:18', '2021-05-23 07:33:31'),
(200, 303000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-06-08 06:48:18', '2021-05-23 07:34:38'),
(201, 322000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-07-09 06:48:18', '2021-05-23 07:35:16'),
(202, 546000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-05-13 06:48:18', '2021-05-23 07:36:58'),
(203, 0, 240000, 'Beli kapas 2 lusin', 1, '2018-10-05 06:48:18', '2021-05-23 07:58:48'),
(204, 252000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-10-25 06:48:18', '2021-05-23 07:59:52'),
(205, 562000, 45000, 'Sumbangan kematian + upah untuk penagih', 1, '2018-12-09 06:48:18', '2021-05-23 08:04:19'),
(206, 200000, 0, 'Sumbangan kematian + upah untuk penagih', 1, '2018-12-21 06:48:18', '2021-05-23 08:06:07'),
(207, 0, 300000, 'Beli samak', 1, '2018-12-24 06:48:18', '2021-05-23 08:06:44'),
(208, 475000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-02-27 06:48:18', '2021-05-23 10:02:14'),
(209, 0, 165000, 'Beli minyak wangi', 1, '2019-03-12 06:48:18', '2021-05-23 10:04:01'),
(210, 360000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-03-12 06:48:18', '2021-05-23 10:07:11'),
(211, 338000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-04-08 06:48:18', '2021-05-23 10:08:33'),
(212, 401000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-05-09 06:48:18', '2021-05-23 10:09:35'),
(213, 256000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-06-19 06:48:18', '2021-05-23 10:11:18'),
(214, 292000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-07-07 06:48:18', '2021-05-23 10:11:58'),
(215, 492000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-09-08 06:48:18', '2021-05-23 10:13:27'),
(216, 343000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-10-08 06:48:18', '2021-05-23 10:14:31'),
(217, 201000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-11-07 06:48:18', '2021-05-23 10:16:09'),
(218, 228000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2019-12-08 06:48:18', '2021-05-23 10:17:07'),
(219, 413000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-01-09 06:48:18', '2021-05-23 10:18:19'),
(220, 271000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-02-07 06:48:18', '2021-05-23 10:18:59'),
(221, 270000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-03-07 06:48:18', '2021-05-23 10:20:42'),
(222, 306000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-04-08 06:48:18', '2021-05-23 10:21:26'),
(223, 535000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-05-08 06:48:18', '2021-05-23 10:22:09'),
(224, 410000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-06-08 06:48:18', '2021-05-23 10:22:52'),
(225, 256000, 20000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-08-08 06:48:18', '2021-05-23 10:24:45'),
(226, 333000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-09-08 06:48:18', '2021-05-23 10:25:32'),
(227, 298000, 20000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-10-08 06:48:18', '2021-05-23 10:26:47'),
(228, 323000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-11-08 06:48:18', '2021-05-23 10:27:30'),
(229, 268000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2020-12-08 06:48:18', '2021-05-23 10:28:14'),
(230, 370000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2021-01-07 06:48:18', '2021-05-23 10:28:53'),
(231, 265000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2021-02-10 06:48:18', '2021-05-23 10:30:42'),
(232, 0, 1050000, 'Beli kain kafan', 1, '2021-02-13 06:48:18', '2021-05-23 10:31:48'),
(233, 0, 746000, 'Beli kapas, samak, kamper, gunting peniti', 1, '2021-02-16 06:48:18', '2021-05-23 10:32:58'),
(234, 390000, 40000, 'Sumbangan kematian + upah untuk penagih', 1, '2021-03-10 06:48:18', '2021-05-23 10:34:02'),
(235, 240000, 30000, 'Sumbangan kematian + upah untuk penagih', 1, '2021-04-08 10:34:57', '2021-05-23 10:34:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dicky Kamaludin Bashar', 'dickykamaludin08@gmail.com', NULL, '$2y$10$zUUDCc1iSRBnU3RHdwtgH.k1UR7BNA.KAu2pYW0E.IdOREK5NYdmy', 1, NULL, '2022-01-17 04:49:56', '2022-01-25 04:21:05');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
