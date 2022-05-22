-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2022 at 04:32 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.28

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gis-sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'News', 'news', '2021-07-22 09:54:33', '2021-07-22 09:54:33'),
(2, 'Tips and Tricks', 'tips-and-tricks', '2021-07-22 09:54:45', '2021-07-22 09:54:45'),
(3, 'Sport', 'sport', '2021-07-22 09:54:56', '2021-07-22 09:54:56'),
(4, 'Shopping', 'shopping', '2021-07-22 09:55:02', '2021-07-22 09:55:02'),
(5, 'Kambing', 'kambing', '2022-03-28 00:33:57', '2022-03-28 00:33:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_21_014539_create_posts_table', 2),
(6, '2021_07_22_032923_insert_slug_to_posts_table', 4),
(7, '2021_07_22_090746_insert_softdelete_to_posts_table', 5),
(8, '2021_07_21_015158_create_categories_table', 6),
(9, '2021_07_22_061939_create_tags_table', 6),
(10, '2021_07_22_062233_create_posts_tags_table', 6),
(11, '2021_07_22_134908_add_username_to_users_table', 6),
(12, '2022_04_17_193248_create_tbl_sekolah', 7),
(13, '2022_04_18_050000_create_tbl_sekolah', 8),
(14, '2022_04_25_141627_add_role_to_users_table', 9),
(15, '2022_04_26_130818_create_tbl_roles', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category_id`, `content`, `image`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(3, 'Category yang terbaik sekali', 3, 'Content of Category yang terbaik sekali', 'public/uploads/post/1626946533-ib-stego.jpg', '2021-07-22 05:35:33', '2021-07-22 05:58:09', 'category-yang-terbaik-sekali', NULL),
(4, 'Harga Emas', 1, 'COntent Harga Emas', 'public/uploads/post/1626949118-Borouge.png', '2021-07-22 06:18:38', '2021-07-22 06:18:38', 'harga-emas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts_tags`
--

CREATE TABLE `posts_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(191) NOT NULL,
  `tag_id` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_courses`
--

CREATE TABLE `tbl_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` int(11) NOT NULL,
  `category` varchar(20) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ;

--
-- Dumping data for table `tbl_courses`
--

INSERT INTO `tbl_courses` (`id`, `title`, `author`, `category`, `description`, `price`, `picture`, `created_at`, `updated_at`) VALUES
(1, 'Custom Product Design', 1, 'Design', 'One make creepeth man bearing their one firmament won\'t fowl meat over sea', 2.50, 'c1.jpg', '2022-05-22 06:00:00', '2022-05-22 07:10:11'),
(2, 'Social Media Network', 2, 'Mobile Apps', 'Asperiores omnis nihil, voluptatum dolorem impedit molestias.', 1.65, 'c2.jpg', '2022-05-22 06:00:00', '2022-05-22 07:10:11'),
(3, 'Custom Product Design', 3, 'Web Apps', 'One make creepeth man bearing their one firmament won\'t fowl meat over sea', 2.50, 'c3.jpg', '2022-05-22 06:00:00', '2022-05-22 07:10:11'),
(4, 'Social Media Network', 4, 'Programming', 'Asperiores omnis nihil, voluptatum dolorem impedit molestias.', 1.65, 'c2.jpg', '2022-05-22 06:00:00', '2022-05-22 07:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kecamatan`
--

CREATE TABLE `tbl_kecamatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `geojson` longtext NOT NULL,
  `warna` varchar(15) NOT NULL
) ;

--
-- Dumping data for table `tbl_kecamatan`
--

INSERT INTO `tbl_kecamatan` (`id`, `nama`, `geojson`, `warna`) VALUES
(1, 'Bekasi', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              106.04237794876099,\r\n              -6.016202558583684\r\n            ],\r\n            [\r\n              106.04716300964355,\r\n              -6.016202558583684\r\n            ],\r\n            [\r\n              106.04716300964355,\r\n              -6.013300380250709\r\n            ],\r\n            [\r\n              106.04237794876099,\r\n              -6.013300380250709\r\n            ],\r\n            [\r\n              106.04237794876099,\r\n              -6.016202558583684\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#6eeb34'),
(2, 'Cilegon', '{\r\n  \"type\": \"FeatureCollection\",\r\n  \"features\": [\r\n    {\r\n      \"type\": \"Feature\",\r\n      \"properties\": {},\r\n      \"geometry\": {\r\n        \"type\": \"Polygon\",\r\n        \"coordinates\": [\r\n          [\r\n            [\r\n              106.02965354919434,\r\n              -5.9911921022693\r\n            ],\r\n            [\r\n              106.04716300964355,\r\n              -5.9911921022693\r\n            ],\r\n            [\r\n              106.04716300964355,\r\n              -5.981204671336545\r\n            ],\r\n            [\r\n              106.02965354919434,\r\n              -5.981204671336545\r\n            ],\r\n            [\r\n              106.02965354919434,\r\n              -5.9911921022693\r\n            ]\r\n          ]\r\n        ]\r\n      }\r\n    }\r\n  ]\r\n}', '#6eeb34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_materi`
--

CREATE TABLE `tbl_materi` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `posted_dt` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `author` varchar(50) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ;

--
-- Dumping data for table `tbl_materi`
--

INSERT INTO `tbl_materi` (`id`, `title`, `posted_dt`, `category`, `tagline`, `content`, `author`, `slug`, `video_url`, `notes`, `status`, `picture`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Belajar Bootstrap Pemula', '2022-03-29', 'umum', 'Bootstrap, Belajar, PHP', 'Ini isi materi nya.', 'Abu Musa', 'belajar-bootstrap-pemula', 'https://www.youtube.com/watch?v=wP5MhIUVjuY', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Culpa quam est sequi sunt? Autem reiciendis, at voluptate repellendus ipsa soluta pariatur, laudantium. In odio enim laudantium? Commodi, nemo ratione voluptatibus suscipit cupiditate doloremque pe', 'published', '', '', '0000-00-00 00:00:00', 'admin', '2022-03-29 06:26:36'),
(4, 'Judul Materi 2', '2022-03-29', 'umum', NULL, 'Ini isi materi nya.', 'Abu Ahyar', 'judul-materi-2', 'youtube.com/judul-materi-2', NULL, 'published', NULL, 'admin', '2022-03-29 06:19:11', NULL, '2022-03-29 06:19:11'),
(5, 'Judul Materi ke-3', '2022-03-29', 'umum', NULL, 'Ini isi materi nya.', 'Abu Hamzah', 'judul-materi-ke-3', 'vimeo.com/uyas567sbd', NULL, 'published', NULL, 'admin', '2022-03-29 06:30:38', NULL, '2022-03-29 06:30:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(100) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`id`, `role`, `notes`) VALUES
(1, 'user', 'User biasa'),
(2, 'supervisor', 'Supervisor'),
(3, 'manager', 'Manager'),
(88, 'admin', 'Administrator'),
(99, 'webmaster', 'Webmaster');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sekolah`
--

CREATE TABLE `tbl_sekolah` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenjang_id` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ;

--
-- Dumping data for table `tbl_sekolah`
--

INSERT INTO `tbl_sekolah` (`id`, `nama`, `jenjang_id`, `status`, `kecamatan_id`, `alamat`, `posisi`, `notes`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'SMPN 12 Cilegon', 'SMP', '1', 2, 'Alamatnya di koordinat ini : -6.113715232806498,106.13696884944088', '-6.113715232806498, 106.13696884944088', 'test', '1651404822-Absensi-app-3-jarak.png', NULL, '2022-05-01 07:33:42'),
(2, 'SMP 2 Bekasi', 'SMP', '2', 1, 'Alamatnya di koordinat ini : -6.153312695388617,106.22621643649225', '-6.153312695388617, 106.22621643649225', 'Test', '1650464030-kambing-hitam.jpg', '2022-04-18 03:06:10', '2022-04-20 10:13:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_socmed`
--

CREATE TABLE `tbl_socmed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `tbl_socmed`
--

INSERT INTO `tbl_socmed` (`id`, `facebook`, `instagram`, `twitter`, `tiktok`, `whatsapp`) VALUES
(1, 'facebook.com/user1', 'User biasa', NULL, NULL, NULL),
(2, 'facebook.com/supervisor', 'Supervisor', NULL, NULL, NULL),
(3, 'facebook.com/manager', 'Manager', NULL, NULL, NULL),
(4, 'facebook.com/admin', 'Administrator', NULL, NULL, NULL),
(5, 'facebook.com/webmaster', 'Webmaster', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trainers`
--

CREATE TABLE `tbl_trainers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `expert` varchar(50) NOT NULL,
  `socmed_id` int(11) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT '1',
  `picture` varchar(255) DEFAULT NULL,
  `created_by` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` varchar(20) DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ;

--
-- Dumping data for table `tbl_trainers`
--

INSERT INTO `tbl_trainers` (`id`, `name`, `expert`, `socmed_id`, `notes`, `isActive`, `picture`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, 'Mated Nithan', 'Sr. Web Designer', NULL, 'If you are looking at blank cassettes on the web, you may be very confused at the.', 1, 'author1.png', NULL, NULL, NULL, '2022-05-22 08:32:25'),
(2, 'David Cameron', 'Sr. Web Application', NULL, 'test', 1, 'author2.png', NULL, NULL, NULL, '2022-05-22 08:32:31'),
(3, 'Jain Redmel', 'Sr. Web Designer', NULL, 'If you are looking at blank cassettes on the web, you may be very confused at the.', 1, 'author3.png', NULL, NULL, NULL, '2022-05-22 08:33:40'),
(4, 'Nathan Macken', 'Sr. Mobile Application', NULL, 'test 3', 1, 'author1.png', NULL, NULL, NULL, '2022-05-22 08:32:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `role` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `picture`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `role`, `status`) VALUES
(1, 'Admin One', 'maulahaz@gmail.com', 'avatar-driver1.png', NULL, '$2y$10$uone1iRs3qbauKFGirGa6OvKTVTjxnOrluMa84zr96KsedQwbesou', NULL, '2021-07-22 11:15:12', '2022-04-26 09:56:12', 'admin', 88, 1),
(2, 'Vendor One', 'name@gmail.com', '', NULL, '$2y$10$uone1iRs3qbauKFGirGa6OvKTVTjxnOrluMa84zr96KsedQwbesou', NULL, '2021-07-22 11:15:12', '2021-07-22 11:15:12', 'vendor1', 1, 1),
(3, 'Webmaster 409', 'webmaster@gmail.com', '', NULL, '$2y$10$uone1iRs3qbauKFGirGa6OvKTVTjxnOrluMa84zr96KsedQwbesou', NULL, '2021-07-22 11:15:12', '2021-07-22 11:15:12', 'webmaster', 99, 1),
(4, 'user one', 'user1@app.com', 'user.png', NULL, '$2y$10$rzyJLykDRSbAQm2L6RcuYOcLHXJfavgBqA2n0gT2uagKKXQt9wkAO', NULL, '2022-04-29 00:25:12', '2022-05-01 00:28:49', 'user1', 1, 1),
(5, 'User Two', 'user2@app.com', 'user.png', NULL, '$2y$10$z8SAaGlscLjg7VW0aoqTieiJA/aSX5PGuoXnYTWZpeM4fjba64J5u', NULL, '2022-04-29 01:06:01', '2022-04-29 01:06:01', 'user2', 1, 1),
(6, 'Author One', 'author1@apps.com', 'author1.png', NULL, '$2y$10$uone1iRs3qbauKFGirGa6OvKTVTjxnOrluMa84zr96KsedQwbesou', NULL, '2021-07-22 11:15:12', '2021-07-22 11:15:12', 'author1', 2, 1),
(7, 'Author Two', 'author2@apps.com', 'author2.png', NULL, '$2y$10$uone1iRs3qbauKFGirGa6OvKTVTjxnOrluMa84zr96KsedQwbesou', NULL, '2021-07-22 11:15:12', '2021-07-22 11:15:12', 'author2', 2, 1),
(8, 'Author THREE', 'author3@apps.com', 'author3.png', NULL, '$2y$10$uone1iRs3qbauKFGirGa6OvKTVTjxnOrluMa84zr96KsedQwbesou', NULL, '2021-07-22 11:15:12', '2021-07-22 11:15:12', 'author3', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_tags`
--
ALTER TABLE `posts_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_socmed`
--
ALTER TABLE `tbl_socmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts_tags`
--
ALTER TABLE `posts_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_courses`
--
ALTER TABLE `tbl_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kecamatan`
--
ALTER TABLE `tbl_kecamatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_materi`
--
ALTER TABLE `tbl_materi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sekolah`
--
ALTER TABLE `tbl_sekolah`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_socmed`
--
ALTER TABLE `tbl_socmed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_trainers`
--
ALTER TABLE `tbl_trainers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
