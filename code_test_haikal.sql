-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Nov 2024 pada 12.47
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
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`id`, `company_name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Kovacek-Douglas', 'corwin.walker@example.com', '$2y$12$yri89oOrAQJ1qrYj31ZWWu4rfetkBxpngw.44WzdPsWLjLjFxe0RC', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(2, 'Wiegand-Nicolas', 'harber.elbert@example.net', '$2y$12$M3ME3/IdyzpoRoVwY.hwTu0ptC6xbmmjT/WU8YrqTAu1PM1GXvxQC', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(3, 'Heller, Block and Moore', 'titus.daniel@example.com', '$2y$12$kH4xZNlZLZJH6Hp5ZlPV2.NrrdBXbr/Odg2aEA04KAbQ1XLb4mgly', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(4, 'Wisozk-Russel', 'bertram75@example.org', '$2y$12$V6lyPsuE7PkwvIlHq3T71uTfmpd.wc6GQ4zbgviBSvoBK5g9CDvmq', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(5, 'Harris PLC', 'lavonne30@example.net', '$2y$12$ox3vV4uWlcZD/JWdFsIf7.gth5N5Iges4urNIJtqNbwy5PUHHqSki', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(6, 'Corkery LLC', 'rodriguez.destany@example.com', '$2y$12$Rf7.a6qM.mDN2z.LgiOQo.5e3dQb/BbMEXVwdxsbTraP0yL7RAFw6', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(7, 'Feest Group', 'koch.elfrieda@example.net', '$2y$12$M7afybP454cpsgOp77.CFekpQhclDAwOBBeIObsBnz32PFtyfLm4W', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(8, 'Rath-Batz', 'jany.harvey@example.net', '$2y$12$7bBN90g9xaT7Ldz0GIG0Qe.G2aEyq94UXRzGb6xry9pe/pWcBQAA6', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(9, 'Leannon Group', 'kellie52@example.org', '$2y$12$eAf3X3yYiIsQr1rwi6ur3.tXF10JCLYhjIs9jrmh6BMmoI1OsxmBy', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(10, 'Mayer-Grady', 'guadalupe80@example.com', '$2y$12$KJKu08lyl7SDl2VcdnC2Ke4T1EozyfQdIs3MmcOU3vSSQazwoa/Ti', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(11, 'Wilkinson-Mohr', 'zbins@example.com', '$2y$12$whShGXsuIF51Nd7aHyb8N.d/xPqkTpwe81iG5OZtvhE9rhidECtLi', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(12, 'Bauch-Kuhlman', 'gibson.teresa@example.com', '$2y$12$OTC7oh728o2iqCuXcjWQpO/I.WG68qpjfuDl8DxRYHIy0BTeK3cnK', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(13, 'Veum-Abernathy', 'bode.jasen@example.org', '$2y$12$ZeIuVpv5x4zJ7egg9SSl/uYn7qZ7HcUul06JEfCMMZZISLTicQo7G', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(14, 'Lakin, Mayer and Harber', 'kris.cleve@example.com', '$2y$12$HHsc63nFsxpSWwHXTUlE8eg0H8TzHTzzsewhQy9CV4yzBaHYlUzAC', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(15, 'Reynolds-Treutel', 'connelly.idella@example.org', '$2y$12$ZepqG23XHqvmbNnI7hacR.NnqDVzF89ViPlPj72i60N9590LA71Uq', '2024-11-12 04:10:47', '2024-11-12 04:10:47');

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
(1, 1, 'Nasi Goreng', 'Nasi goreng dengan bumbu yang pas.', '15000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44'),
(2, 1, 'Mie Goreng', 'Mie goreng dengan bumbu yang pas.', '15000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44'),
(3, 2, 'Nasi Ayam', 'Nasi ayam dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44'),
(4, 2, 'Mie Ayam', 'Mie ayam dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44'),
(5, 2, 'Nasi Uduk', 'Nasi uduk dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44'),
(6, 2, 'Mie Tektek', 'Mie uduk dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44'),
(7, 2, 'Nasi Kuning', 'Nasi kuning dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44'),
(8, 1, 'Kwetiau', 'Kwetiau dengan bumbu yang pas.', '20000.00', 'defaultFood.png', '2024-11-12 04:10:44', '2024-11-12 04:10:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `merchants`
--

CREATE TABLE `merchants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `merchants`
--

INSERT INTO `merchants` (`id`, `company_name`, `food_type`, `address`, `city`, `contact`, `description`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Katering Lezat', 'indonesian', 'Jl. Makanan No. 1, Jakarta', 'Jakarta', '081234567890', 'Katering dengan berbagai pilihan menu lezat.', 'lezzat@example.com', '$2y$12$n4Y4D9txJsFop5ctmOVZi.QSduJpW2O3hkx5eqjLqAi09ToEu97QK', '2024-11-12 04:10:44', '2024-11-12 04:12:05'),
(2, 'Katering Sehat', 'Sehat', 'Jl. Sehat No. 2, Jakarta', 'Bandung', '081234567891', 'Katering sehat untuk gaya hidup seimbang.', 'sehat@example.com', '$2y$12$eg7xK4acKe52T7/kfYSE5ezJZ6UcvQ4tAgKBa9UvfnSELhxYSIpzG', '2024-11-12 04:10:44', '2024-11-12 04:10:44');

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
(9, '2024_11_12_050203_create_order_items_table', 1);

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
  `payment_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `invoice` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `status_id`, `merchant_id`, `delivery_date`, `payment_proof`, `total_price`, `invoice`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2024-11-12', 'images/defaultFood.png', '15000.00', NULL, '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(2, 2, 2, 2, '2024-11-12', 'images/defaultFood.png', '20000.00', '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zMtfOFYHPFZ1vNeo6m2oP8z67Kh5FG1kSnOXby0ris3LI/aH0LS7qmw+4aUIeROwqco237SI4s2haavnUKPpt4QNOf4AAMATzAplbmRzdHJlYW0KZW5kb2JqCnhyZWYKMCAxNAowMDAwMDAwMDAwIDY1NTM1IGYgCjAwMDAwMDAwMDkgMDAwMDAgbiAKMDAwMDAwMDA3NCAwMDAwMCBuIAowMDAwMDAwMTIwIDAwMDAwIG4gCjAwMDAwMDAzMzMgMDAwMDAgbiAKMDAwMDAwMDM2MiAwMDAwMCBuIAowMDAwMDAwNTQzIDAwMDAwIG4gCjAwMDAwMDA2NDYgMDAwMDAgbiAKMDAwMDAwMTgxMyAwMDAwMCBuIAowMDAwMDAxOTIwIDAwMDAwIG4gCjAwMDAwMDIwMzIgMDAwMDAgbiAKMDAwMDAwMjA4OSAwMDAwMCBuIAowMDAwMDAyMTQ2IDAwMDAwIG4gCjAwMDAwMDIyNTEgMDAwMDAgbiAKdHJhaWxlcgo8PAovU2l6ZSAxNAovUm9vdCAxIDAgUgovSW5mbyA1IDAgUgovSURbPDIxYmI4ZDQ0YjQ2MDY3N2RiMmU0MzBkZTYxYmFjMzRmPjwyMWJiOGQ0NGI0NjA2NzdkYjJlNDMwZGU2MWJhYzM0Zj5dCj4+CnN0YXJ0eHJlZgoyNzkxCiUlRU9GCg==', '2024-11-12 04:10:47', '2024-11-12 05:41:32'),
(3, 2, 1, 1, '2024-11-12', NULL, NULL, NULL, '2024-11-12 05:22:55', '2024-11-12 05:37:24'),
(12, 2, 1, 1, '2024-11-12', NULL, '60000.00', NULL, '2024-11-12 05:31:41', '2024-11-12 05:31:41');

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
(1, 1, 1, 1, '15000.00', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(2, 1, 2, 2, '30000.00', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(3, 2, 3, 1, '20000.00', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(4, 2, 4, 2, '40000.00', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(7, 12, 1, 4, '15000.00', '2024-11-12 05:31:41', '2024-11-12 05:31:41');

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
(1, 'Dipesan', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(2, 'Diproses', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(3, 'Dikirim', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(4, 'Selesai', '2024-11-12 04:10:47', '2024-11-12 04:10:47'),
(5, 'Dibatalkan', '2024-11-12 04:10:47', '2024-11-12 04:10:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
('WVeoZIVZkThKQ3fs17qTwEyqFCCPShUlxTcAr9Kk', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQUFmbm9jV3oybEcwVmowSk5RVGxjTE9yTG5wY0dESTVOeFpCdk00OSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tZXJjaGFudC9vcmRlciI7fXM6NTU6ImxvZ2luX21lcmNoYW50XzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1731415659);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `order_statuses`
--
ALTER TABLE `order_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

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
