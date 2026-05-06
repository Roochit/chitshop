-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2026 at 09:56 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chitshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
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
(4, '2026_05_06_132144_create_log_models_table', 1);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `cart_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cart_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_items`
--

CREATE TABLE `tbl_items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` float(10,2) NOT NULL,
  `review` int(1) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `DateCreate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_items`
--

INSERT INTO `tbl_items` (`item_id`, `item_name`, `description`, `price`, `review`, `image_path`, `DateCreate`) VALUES
(2, 'test item 01', 'test item 01\r\n\r\nใช้เพื่อการทดสอบระบบ', 1000.75, 4, 'uploads/product/gSHzXqfYRGli5mBcWbBDIKtOAaxf7PxSQKkW8My6.png', '2026-04-26 06:06:35'),
(3, 'test item 02', 'test item 02', 1.00, 5, 'uploads/product/1S0tdxPZsBhtXt5NClWHGgfSA2SBY567O056vnDa.png', '2026-05-05 14:04:54'),
(4, 'แผนที่ TNI', 'test item 03 แผนที่ TNI', 20.00, 5, 'uploads/product/mOhXec11h8FtwopfcwVKOZ5KeoSj8zBQP0OIOjCf.png', '2026-05-05 14:05:41'),
(5, 'เกมที่ต้องแก้', 'test item 04\r\nเกมที่ต้องแก้', 3000.00, 2, 'uploads/product/LJU33FQtxl4Da21YdQoWfn9WL2N7U20kA1tAGx4r.png', '2026-05-05 14:09:21'),
(6, 'ดาต้าเบสตัวกวน', 'ดาต้าเบสตัวกวน สิ่งที่มักจะเป็นไม้เบื้อ ไม้เมากับผู้ทำเว็ปนี้เพราะเราอาจอะไรแปลกๆจากโลกฝั่งนั้นได้', 50.00, 3, 'uploads/product/ZkHral2qhBPPz8X5qQAqrefcrniBvYA56uYfRyBz.png', '2026-05-05 14:10:11'),
(7, 'หลังบ้านที่ User ไม่ควรเห็น', 'หลังบ้านที่ User ไม่ควรเห็น แต่พวกแกได้เห็นเเล้ว', 30.00, 5, 'uploads/product/JYZWy6De7Rju6ETYT9QyTDisQ9erSRuKbn2G5PU1.png', '2026-05-05 14:11:20'),
(8, 'T Temp Cut Scene', 'T Temp Cut Sceneใส่สำหรับทดสอบระบบคัดซีนในรูปที่ทีมวาดยังทำไม่เสร็จ', 20.00, 3, 'uploads/product/bGVa6UpFOwiZEOhBLeuGaEprbHgeAkSKc81Dn18f.jpg', '2026-05-05 14:13:05'),
(9, 'Dev ที่วิญญาณหลุดออกจากร่าง', 'เขาก็คือ Dev ที่วิญญาณหลุดออกจากร่างไง', 6000.00, 3, 'uploads/product/IUZzkLuqhIiwVqkM3hBQQGorG4Eyc83DfWxlICjO.jpg', '2026-05-05 14:14:15'),
(10, 'แมวส้มในตำนาน', 'แมวส้มในตำนาน มีเรื่องเล่าว่าเเมวตัวนี้เคยช่วยท่านชัชชาติสู้กับไดโนเสาร์\r\nจนสามารถทำให้มันสูญพันธ์ได้', 5000000.00, 5, 'uploads/product/BXdqnRd5vyAYxJWuOFXbO4v3uOKSpyW3eq60KKSO.jpg', '2026-05-05 14:20:56'),
(11, 'สีสันที่หายไป', 'เป็นเรื่องราวที่เมื่อกฎของโลกไม่สามารถแสดงให้เราเห็นบางสิ่งได้ สิ่งนั้นจะถูกย้อมเป็นสีชมพูเหมือนช่วงเวลาที่คุณตกหลุ่มรักใครเเล้วสิ่งต่างนั้นช่างดูสวยงามแต่เบื่องหลังเธอคนนั้นอาจทำความสะอาดห้องไม่เป็นเลยก็ได้ 5555', 300000.00, 2, 'uploads/product/AEjowCmQjAuYhIvrrsfyxJKMdzymOVwg2sEWclWI.jpg', '2026-05-05 14:24:35'),
(12, 'ชายขายเก้าอี้', 'ชายผู้นี้คือยอดนักขาย ไม่มีใครต้านทานเขาได้\r\nเหลาพนังงานหน้าโต๊ะคอมทั้งหลายจงสันเสรินเข้า \r\nชายผู้จะมาปลดปล่อยหลังของพวกเราจากความทุกข์ทรมาน', 5000000.00, 4, 'uploads/product/MlQEZKvwW3SggwiBCpzAqP3LcwW5aZYvVEq6Ozir.jpg', '2026-05-05 14:29:03'),
(13, 'minimal Map of TNI', 'แผนที่ที่ทำให้คุณอาจไม่หลงทางก็ได้', 1000000.00, 5, 'uploads/product/WoiB6mydWVTCv3Y2tQRe4J7RCUWxEmXkJdsUPbWW.png', '2026-05-05 14:31:37'),
(16, 'test02 10', 'test02 test02 test02 test02 test02 v', 199999.97, 3, 'uploads/product/1RhSVio5Au3kPSBl3nCnNxve2f6ZwzD5mcQDxQ3M.png', '2026-05-06 07:41:53'),
(17, 'test test test  test test', 'test test test  test test', 1000.00, 2, 'uploads/product/SY9Y97Q09uukwFy4ygMDvveeAtpIrv6xHgs2HFsZ.png', '2026-05-06 07:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `detail` text DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`log_id`, `user_id`, `action`, `detail`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 06:44:39', '2026-05-06 06:44:39'),
(2, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 06:45:50', '2026-05-06 06:45:50'),
(3, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 06:46:13', '2026-05-06 06:46:13'),
(4, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 06:56:39', '2026-05-06 06:56:39'),
(5, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 06:58:57', '2026-05-06 06:58:57'),
(6, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 06:59:14', '2026-05-06 06:59:14'),
(7, 4, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 06:59:25', '2026-05-06 06:59:25'),
(8, 4, 'Create Order', 'สร้างใบสั่งซื้อเลขที่ CHIT-20260506-69FAE7375D0B2', '127.0.0.1', '2026-05-06 07:01:11', '2026-05-06 07:01:11'),
(9, 4, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:01:52', '2026-05-06 07:01:52'),
(10, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:02:05', '2026-05-06 07:02:05'),
(11, 3, 'Add Product', 'เพิ่มสินค้าใหม่: 01tester', '127.0.0.1', '2026-05-06 07:05:37', '2026-05-06 07:05:37'),
(12, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:05:55', '2026-05-06 07:05:55'),
(13, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:13:40', '2026-05-06 07:13:40'),
(14, 3, 'Add Product', 'เพิ่มสินค้าใหม่: 10testet', '127.0.0.1', '2026-05-06 07:16:01', '2026-05-06 07:16:01'),
(15, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:18:55', '2026-05-06 07:18:55'),
(16, 19, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:19:50', '2026-05-06 07:19:50'),
(17, 19, 'Create Order', 'สร้างใบสั่งซื้อเลขที่ CHIT-20260506-69FAEC414AD5A', '127.0.0.1', '2026-05-06 07:22:41', '2026-05-06 07:22:41'),
(18, 19, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:23:03', '2026-05-06 07:23:03'),
(19, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:23:16', '2026-05-06 07:23:16'),
(20, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:24:20', '2026-05-06 07:24:20'),
(21, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:39:38', '2026-05-06 07:39:38'),
(22, 3, 'Add Product', 'เพิ่มสินค้าใหม่: test02', '127.0.0.1', '2026-05-06 07:41:53', '2026-05-06 07:41:53'),
(23, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:42:30', '2026-05-06 07:42:30'),
(24, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:43:47', '2026-05-06 07:43:47'),
(25, 3, 'Add Product', 'เพิ่มสินค้าใหม่: test test test  test test', '127.0.0.1', '2026-05-06 07:44:59', '2026-05-06 07:44:59'),
(26, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:48:04', '2026-05-06 07:48:04'),
(27, 4, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:48:16', '2026-05-06 07:48:16'),
(28, 4, 'Create Order', 'สร้างใบสั่งซื้อเลขที่ CHIT-20260506-69FAF2A502430', '127.0.0.1', '2026-05-06 07:49:57', '2026-05-06 07:49:57'),
(29, 4, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:50:31', '2026-05-06 07:50:31'),
(30, 3, 'Login', 'ผู้ใช้เข้าสู่ระบบ', '127.0.0.1', '2026-05-06 07:50:41', '2026-05-06 07:50:41'),
(31, 3, 'logout', 'ผู้ใช้ออกจากสู่ระบบ', '127.0.0.1', '2026-05-06 07:51:02', '2026-05-06 07:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(200) NOT NULL,
  `member_username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL,
  `dete_create` timestamp NULL DEFAULT current_timestamp(),
  `dete_edit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`member_id`, `member_name`, `member_username`, `password`, `role`, `dete_create`, `dete_edit`) VALUES
(3, 'admin01', 'admin01@test.com', '$2y$12$E2J3ezetx5xbd2Sj0QbUPe2rtqMECD4dzPjDG39ZPtnHVTQtxN35C', 'admin', '2026-04-21 10:04:23', '2026-04-21 10:04:23'),
(4, 'user01', 'user01@test.com', '$2y$12$EDz2B3LoXjzobPsyHKXkr.4USKTfnRP0EzyECADXSbOL9cR19oKby', 'user', '2026-04-21 10:05:06', '2026-04-22 03:33:12'),
(5, 'DevBanBan', 'DevBanBan@test.com', '$2y$12$yQ0sJbEO0jWvikuJDf883ON9/UaJURZ.RjSmEdGgWJU0FKeJgV2A6', 'admin', '2026-04-26 05:15:17', '2026-04-26 05:15:17'),
(13, '111111', '111111@111111', '$2y$12$qH83QBU916/R//qHO4gVi.82XcsWuYh.91AYru5XgdfWinbjA6Idy', 'admin', '2026-05-05 13:05:43', '2026-05-06 02:56:45'),
(14, '222222', '222222@222222', '$2y$12$.WwFGZd6a/aavnWpgE7/OOBcD2ThksTwyYrTDKy3SxKRSUbyvPZ3q', 'user', '2026-05-05 13:06:46', '2026-05-06 02:56:38'),
(20, 'roochit', 'roochit@test.com', '$2y$12$O.jxxSHlqxl4T7zfmurQHuuwCCaYTjMK.m7M1VCdXWoYOe9aYURlm', 'admin', '2026-05-06 07:45:58', '2026-05-06 07:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `total_price` decimal(11,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_number` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `member_id`, `total_price`, `status`, `created_at`, `order_number`, `updated_at`) VALUES
(3, 4, 5006000.00, 'pending', '2026-05-06 05:03:01', 'CHIT-20260506-69FACB8551415', '2026-05-06 05:03:01'),
(4, 4, 5000030.00, 'pending', '2026-05-06 07:01:11', 'CHIT-20260506-69FAE7375D0B2', '2026-05-06 07:01:11'),
(5, 19, 8070.00, 'pending', '2026-05-06 07:22:41', 'CHIT-20260506-69FAEC414AD5A', '2026-05-06 07:22:41'),
(6, 4, 6006030.00, 'pending', '2026-05-06 07:49:57', 'CHIT-20260506-69FAF2A502430', '2026-05-06 07:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`detail_id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(1, 3, 10, 1, 5000000.00),
(2, 3, 9, 1, 6000.00),
(3, 4, 10, 1, 5000000.00),
(4, 4, 7, 1, 30.00),
(5, 5, 8, 1, 20.00),
(6, 5, 9, 1, 6000.00),
(7, 5, 15, 1, 2000.00),
(8, 5, 6, 1, 50.00),
(9, 6, 9, 1, 6000.00),
(10, 6, 13, 1, 1000000.00),
(11, 6, 7, 1, 30.00),
(12, 6, 10, 1, 5000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_test`
--

CREATE TABLE `tbl_test` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name2` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_test`
--

INSERT INTO `tbl_test` (`id`, `name`, `name2`) VALUES
(3, 'Tester01', 'Tester01'),
(4, 'Tester02', 'Tester02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_username` (`member_username`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`detail_id`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
