-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 22 Nov 2024 pada 07.22
-- Versi server: 5.7.33
-- Versi PHP: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_test_haikal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `status` enum('pending','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `merchant_id`, `customer_id`, `menu_id`, `quantity`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 2, 4, 60000, 'completed', '2024-11-22 00:17:18', '2024-11-22 00:17:36'),
(2, 1, 16, 8, 2, 40000, 'completed', '2024-11-22 00:17:22', '2024-11-22 00:17:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `company_name`, `email`, `password`, `phone`, `city`, `address`, `profile_photo`, `created_at`, `updated_at`) VALUES
(1, 'Parisian-Crona', 'conor90@example.net', '$2y$12$9ku.3ftshNiYVdQZeUdotuOdAOJyfVyUq60Ywb.zDuO4Fd.fvdk/C', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(2, 'Morar, Bailey and Fadel', 'mervin64@example.net', '$2y$12$Nb1WIzlQSvS/i0u3vvl3/eoHr8zgy/o1DWYPX4LNvErUIH0Wb//KW', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(3, 'Goldner-Bode', 'gerry.waters@example.org', '$2y$12$4fltX/u8S0RQiNxNs0LkLeypSLZR0JEGItXwAQ5X41gxfhIPC4vyC', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(4, 'Roberts Inc', 'leffler.chelsie@example.com', '$2y$12$789Mf4FdJThp85UipCOTwOcEQ.mZS.tTs29X/nWHyBQLnEzw1YISq', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(5, 'McGlynn, Nolan and Paucek', 'webster.lindgren@example.org', '$2y$12$3h7XrAmUSG8fnxqyzOpqWOza44i9wXiQUc5hg9k.TgAeZ1ZuCFII6', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(6, 'Powlowski, Hane and Runolfsdottir', 'wheller@example.org', '$2y$12$Z3tkbn9IIUtTIYijMPYIpuxpWOQwUWXkoX3bQc7RBuI5NvF4qn00m', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(7, 'VonRueden, Abbott and Mante', 'velda.zieme@example.com', '$2y$12$x74XnJ8XMWXzfu6unuFSWOGMcyPxywDUU0GYI31Tz4LZX5rQrsG6G', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(8, 'Stamm, Flatley and Rutherford', 'marcia71@example.com', '$2y$12$l8Bh9cK33I6TZKUhtuXzyO8W08VWOMoR/Q1n8ZHTngOnpgSqOfdX6', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(9, 'Mohr Inc', 'vance.kihn@example.net', '$2y$12$2jokeC2G2I2vW9QkW7gh4eoM./orFLpdBziUjUI9X91eLHS6qoC8.', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(10, 'Douglas Ltd', 'xrolfson@example.org', '$2y$12$30f./YUcxOJ8uTdkhsSd8ev4HSLklZeDPP990ZFYbpyMB4wuZ5lJ6', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(11, 'O\'Reilly and Sons', 'effie.schowalter@example.net', '$2y$12$4u489Xzcwf1en45HoVb0bO8R8t6EYNW8Dbc3f3pSBezltjy/v5/fW', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(12, 'Rau LLC', 'enrico.mraz@example.net', '$2y$12$MLYvnMczhgInLzqw3.WwU.NdTuR32jTebr6.7TXtoox4alo6m72pi', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(13, 'Tillman-Macejkovic', 'destinee06@example.com', '$2y$12$a5Ex/rr5OvFMFy958KJq0uyGTLSivQIuiaRAyHbV7X.6SGtwILA3W', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(14, 'Hill-Brekke', 'davis.brandon@example.com', '$2y$12$KDFJwicUH/wrS9sGgr1xc.tZNnGjUrmCf.yoU8w.AXk1iEgnz6CfK', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(15, 'Yundt, O\'Keefe and Dibbert', 'pagac.paula@example.net', '$2y$12$ikhu4lKQsYgwRGjlyGpsluoqTECKaIwNB86AcHapNnV5TQhGTJWke', NULL, NULL, NULL, NULL, '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(16, 'PT Trans', 'trans@gmail.com', '$2y$12$fpEQWD4Sf7vXJvFfGUbk9O7OHjUOIRmug5ADXBxJdsOES0Gd3Nk76', '082526556', 'Bandung', 'jl dago atas', '1732259578.png', '2024-11-22 00:12:34', '2024-11-22 00:12:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `merchant_id`, `name`, `description`, `price`, `photo`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nasi Goreng', 'Nasi goreng dengan bumbu yang pas.', '15000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(2, 1, 'Mie Goreng', 'Mie goreng dengan bumbu yang pas.', '15000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(3, 2, 'Nasi Ayam', 'Nasi ayam dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(4, 2, 'Mie Ayam', 'Mie ayam dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(5, 2, 'Nasi Uduk', 'Nasi uduk dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(6, 2, 'Mie Tektek', 'Mie uduk dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(7, 2, 'Nasi Kuning', 'Nasi kuning dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(8, 1, 'Kwetiau', 'Kwetiau dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(9, 3, 'Soto Betawi', 'Soto khas Betawi Yang gurih', '25000.00', '1732259458.png', '2024-11-22 00:10:58', '2024-11-22 00:11:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merchants`
--

INSERT INTO `merchants` (`id`, `company_name`, `food_type`, `address`, `city`, `contact`, `description`, `email`, `password`, `profile_photo`, `created_at`, `updated_at`) VALUES
(1, 'Katering Lezat', 'Indonesia', 'Jl. Makanan No. 1, Jakarta', 'Jakarta', '081234567890', 'Katering dengan berbagai pilihan menu lezat.', 'kat@gmail.com', '$2y$12$UEcqpg79CUvkIoX8vxYskO2avR/NQ1m4A/2j3rY7a6lyQP5rBjAWe', NULL, '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(2, 'Katering Sehat', 'Sehat', 'Jl. Sehat No. 2, Jakarta', 'Bandung', '081234567891', 'Katering sehat untuk gaya hidup seimbang.', 'sehat@gmail.com', '$2y$12$yF3QRG3tzjaCrstGxJeqieDlTratAX6enXa0GFabgg.v.5dSvEBEO', NULL, '2024-11-21 23:52:01', '2024-11-21 23:52:01'),
(3, 'Merchant 1', 'Indonesia', 'Jl Kebayoran 1', 'Jakarta', '0829192381919', 'Makanan Indonesia', 'merch1@gmail.com', '$2y$12$2MPsZecex6D6BDx/u2NiFuKCunhIcoQXzJ3stDowea//AhSvhjZxG', '1732259893.png', '2024-11-22 00:08:31', '2024-11-22 00:18:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_12_050121_create_merchants_table', 1),
(5, '2024_11_12_050140_create_customers_table', 1),
(6, '2024_11_12_050151_create_menus_table', 1),
(7, '2024_11_12_050152_create_order_statuses_table', 1),
(8, '2024_11_12_050202_create_orders_table', 1),
(9, '2024_11_12_050203_create_order_items_table', 1),
(10, '2024_11_21_102233_create_carts_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `invoice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `status_id`, `merchant_id`, `delivery_date`, `delivery_address`, `total_price`, `invoice`, `created_at`, `updated_at`) VALUES
(1, 16, 3, 1, '2024-11-25', 'jl dago atas', '100000.00', 'JVBERi0xLjcKMSAwIG9iago8PCAvVHlwZSAvQ2F0YWxvZwovT3V0bGluZXMgMiAwIFIKL1BhZ2VzIDMgMCBSID4+CmVuZG9iagoyIDAgb2JqCjw8IC9UeXBlIC9PdXRsaW5lcyAvQ291bnQgMCA+PgplbmRvYmoKMyAwIG9iago8PCAvVHlwZSAvUGFnZXMKL0tpZHMgWzYgMCBSCl0KL0NvdW50IDEKL1Jlc291cmNlcyA8PAovUHJvY1NldCA0IDAgUgovRm9udCA8PCAKL0YxIDggMCBSCi9GMiA5IDAgUgo+PgovRXh0R1N0YXRlIDw8IAovR1MxIDEwIDAgUgovR1MyIDExIDAgUgo+Pgo+PgovTWVkaWFCb3ggWzAuMDAwIDAuMDAwIDU5NS4yODAgODQxLjg5MF0KID4+CmVuZG9iago0IDAgb2JqClsvUERGIC9UZXh0IF0KZW5kb2JqCjUgMCBvYmoKPDwKL1Byb2R1Y2VyICj+/wBkAG8AbQBwAGQAZgAgADMALgAwAC4AMAAgACsAIABDAFAARABGKQovQ3JlYXRpb25EYXRlIChEOjIwMjQxMTIyMDcxNzM2KzAwJzAwJykKL01vZERhdGUgKEQ6MjAyNDExMjIwNzE3MzYrMDAnMDAnKQovVGl0bGUgKP7/AEkAbgB2AG8AaQBjAGUAIAAjADEpCj4+CmVuZG9iago2IDAgb2JqCjw8IC9UeXBlIC9QYWdlCi9NZWRpYUJveCBbMC4wMDAgMC4wMDAgNTk1LjI4MCA4NDEuODkwXQovUGFyZW50IDMgMCBSCi9Db250ZW50cyA3IDAgUgo+PgplbmRvYmoKNyAwIG9iago8PCAvRmlsdGVyIC9GbGF0ZURlY29kZQovTGVuZ3RoIDExMjYgPj4Kc3RyZWFtCnicjZdNc9s2EIbv+hXbyXQmmWkQfH/o1iaxJ+nETWK1PSQ5MBatqpXEhKKc8b/vQiIWoEVpfCHt9e7ieYEXMDjhzHsLnAXB41ML+Hg54cwZ+AEc3sIngC/4w3yiA1NBgHNMWw86WKZDACcM40pAW8P15PvEauasBWMxmXtYAwX8PrACozgzQo9GwsOIQ7p9JLWhwN+wQUoZIrRSCp8a44gu2BF5UcxNhCr7x8gK2T9MXlxeC1hs41vG93H7djH5bZZYnFbMqACzOby4kIDz4GF2C/Dp6bu6Wq2rrn72BWZv4fWsLBKCWasORQIEcvRFL7GgXW4WcF23d8ubXMyZcHGBpNg/vRxiWCuZxFVLGJ7xvuObq7/+ePPyddGI86gnP4eNpMdVF4Qmc6PNXYNEcLVbf63bKTwRI8pMcIhoRspfobIpSAlXzR1ILnVBdHaGjbSMS0XSJFOpZb1a3tXtPbyqu2q52k5HgKJD+ehUU/Wv83lbb7dT+HcF82rRQNVV27FW6FVtw7lWvUhU91yI59IUGgNW4tPv95ffa7QG/Yd9uWbSalRmmQ8alEZH2biXbieP3peJUQU0ikF3i6CYsJwi0d04oMAWMWQMj/uyD3C13wkx55TRnGI8wqLDrRPFapA/unp9Xi8hJcH45iivFCyCZFrwQohES4VgBkJilvOmUEKRR0iRnOP242e0fNhVm27Z3Z/XQ2RJj0CvKTfQE3OkNoUeLXCpkKXUE7Os5IUeijxCj+IGT2FzRs+fm2UH79vhgTKiiNhIkcY/yYGimMOVLBSlg7RUFLM0d4UiihSKYqXA0zNnUeQRurWU+99O6541XbUiyWmPYGvvQ7lH+ki5R/oZoD2icPdL6Xug8TO03yPK42Hmxw7Bd8saLpu23iwIigxPVNlWmSrbO2GlSMlVePs0Qz54yZs0dF7/PHR2Yho6RR4MnWx4euiP3+I/SJwvQiAzEQKZqUDI1kkIKVIiZOukrBR5AJp8cxbU8gFo753YyXJVeCdF9t7pk5RiSrgyqY8UBot1wfnCYEriAS8TZPKSxgkLYYTx9x91t6x2R0bKiMlIJSJlESNlFYyluQ6QFBlSkt1OYsoju2XAZLcSkLIIkLIKwNKCB0CKDAHJlCcBca0lHzVlBk2mLEEpi0ApqwAtjXoApUgBWhr1kEWRoRyy7jk5eigHy0Q8X6XFSULHCzVSdr372sXDcgpxk/KjDljo0drS4PXQubEGhwsrXNQ1fH4q+M+fn/W9jmBQg0cNUrp8Zx3eFdN9CpudaqIsmsKhLwX+Kd+/9fDsP1Q/WF/6QBHG4deMyx8oAuXFQP74GIu4o4hlVrv8gZID8QOlGIzj/Xc96BQjpz48tI4XYsNlfPp0LZbaMSE8qsLrKK5pP30hC/+n2vwH980Obps2vlto2nnd/jSYP493lXC4gzmnj7tcYG21uYfvu3rbLZvN9hf4tqqrbQ03zaarbjqIjW92265Z1y1sD8vP0hj/A2aTHwAKZW5kc3RyZWFtCmVuZG9iago4IDAgb2JqCjw8IC9UeXBlIC9Gb250Ci9TdWJ0eXBlIC9UeXBlMQovTmFtZSAvRjEKL0Jhc2VGb250IC9IZWx2ZXRpY2EKL0VuY29kaW5nIC9XaW5BbnNpRW5jb2RpbmcKPj4KZW5kb2JqCjkgMCBvYmoKPDwgL1R5cGUgL0ZvbnQKL1N1YnR5cGUgL1R5cGUxCi9OYW1lIC9GMgovQmFzZUZvbnQgL0hlbHZldGljYS1Cb2xkCi9FbmNvZGluZyAvV2luQW5zaUVuY29kaW5nCj4+CmVuZG9iagoxMCAwIG9iago8PCAvVHlwZSAvRXh0R1N0YXRlCi9CTSAvTm9ybWFsCi9DQSAxCj4+CmVuZG9iagoxMSAwIG9iago8PCAvVHlwZSAvRXh0R1N0YXRlCi9CTSAvTm9ybWFsCi9jYSAxCj4+CmVuZG9iagp4cmVmCjAgMTIKMDAwMDAwMDAwMCA2NTUzNSBmIAowMDAwMDAwMDA5IDAwMDAwIG4gCjAwMDAwMDAwNzQgMDAwMDAgbiAKMDAwMDAwMDEyMCAwMDAwMCBuIAowMDAwMDAwMzI2IDAwMDAwIG4gCjAwMDAwMDAzNTUgMDAwMDAgbiAKMDAwMDAwMDUzNiAwMDAwMCBuIAowMDAwMDAwNjM5IDAwMDAwIG4gCjAwMDAwMDE4MzggMDAwMDAgbiAKMDAwMDAwMTk0NSAwMDAwMCBuIAowMDAwMDAyMDU3IDAwMDAwIG4gCjAwMDAwMDIxMTQgMDAwMDAgbiAKdHJhaWxlcgo8PAovU2l6ZSAxMgovUm9vdCAxIDAgUgovSW5mbyA1IDAgUgovSURbPDE3ODI0MTcxMjE1Y2E0MWEzYzQ3OTU5YTM2ZTM3ODk1PjwxNzgyNDE3MTIxNWNhNDFhM2M0Nzk1OWEzNmUzNzg5NT5dCj4+CnN0YXJ0eHJlZgoyMTcxCiUlRU9GCg==', '2024-11-22 00:17:36', '2024-11-22 00:18:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `menu_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, '60000.00', '2024-11-22 00:17:36', '2024-11-22 00:17:36'),
(2, 1, 8, 2, '40000.00', '2024-11-22 00:17:36', '2024-11-22 00:17:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_statuses`
--

CREATE TABLE `order_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `order_statuses`
--

INSERT INTO `order_statuses` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dipesan', '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(2, 'Diproses', '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(3, 'Selesai', '2024-11-21 23:52:04', '2024-11-21 23:52:04'),
(4, 'Dibatalkan', '2024-11-21 23:52:04', '2024-11-21 23:52:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4HMJ6gUsGwsVbR6gmKv1tlXDNG9a72DxFeB8gnnv', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWUxUdEMzdGxCRXI4b3d4TkRMVkpqRkJyOEhST1VrbUEwWlBzbU1ybyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZXJjaGFudC9tZW51Ijt9czo1NToibG9naW5fbWVyY2hhbnRfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1732260113),
('eVB95yvaVUty72fIBHMPRDodF6SmczlIxN3bkMUM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVZ5cmw5dWtlN2NUNHQ0M2xWWHZQZW8wRFJxQTJNd2dxZlI4d2pFRiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9sb2dpbiI7fX0=', 1732259933);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_merchant_id_foreign` (`merchant_id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `carts_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_merchant_id_foreign` (`merchant_id`);

--
-- Indeks untuk tabel `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `merchants_email_unique` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`),
  ADD KEY `orders_status_id_foreign` (`status_id`),
  ADD KEY `orders_merchant_id_foreign` (`merchant_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_menu_id_foreign` (`menu_id`);

--
-- Indeks untuk tabel `order_statuses`
--
ALTER TABLE `order_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `merchants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_status_id_foreign` FOREIGN KEY (`status_id`) REFERENCES `order_statuses` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
