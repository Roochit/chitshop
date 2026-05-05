-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2026 at 04:41 PM
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
(7, 'หลังบ้านที่ User ควรเห็น', 'หลังบ้านที่ User ควรเห็น แต่พวกแกได้เห็นเเล้ว', 30.00, 5, 'uploads/product/JYZWy6De7Rju6ETYT9QyTDisQ9erSRuKbn2G5PU1.png', '2026-05-05 14:11:20'),
(8, 'T Temp Cut Scene', 'T Temp Cut Sceneใส่สำหรับทดสอบระบบคัดซีนในรูปที่ทีมวาดยังทำไม่เสร็จ', 20.00, 3, 'uploads/product/bGVa6UpFOwiZEOhBLeuGaEprbHgeAkSKc81Dn18f.jpg', '2026-05-05 14:13:05'),
(9, 'Dev ที่วิญญาณหลุดออกจากร่าง', 'เขาก็คือ Dev ที่วิญญาณหลุดออกจากร่างไง', 6000.00, 3, 'uploads/product/IUZzkLuqhIiwVqkM3hBQQGorG4Eyc83DfWxlICjO.jpg', '2026-05-05 14:14:15'),
(10, 'แมวส้มในตำนาน', 'แมวส้มในตำนาน มีเรื่องเล่าว่าเเมวตัวนี้เคยช่วยท่านชัชชาติสู้กับไดโนเสาร์\r\nจนสามารถทำให้มันสูญพันธ์ได้', 5000000.00, 5, 'uploads/product/BXdqnRd5vyAYxJWuOFXbO4v3uOKSpyW3eq60KKSO.jpg', '2026-05-05 14:20:56'),
(11, 'สีสันที่หายไป', 'เป็นเรื่องราวที่เมื่อกฎของโลกไม่สามารถแสดงให้เราเห็นบางสิ่งได้ สิ่งนั้นจะถูกย้อมเป็นสีชมพูเหมือนช่วงเวลาที่คุณตกหลุ่มรักใครเเล้วสิ่งต่างนั้นช่างดูสวยงามแต่เบื่องหลังเธอคนนั้นอาจทำความสะอาดห้องไม่เป็นเลยก็ได้ 5555', 300000.00, 2, 'uploads/product/AEjowCmQjAuYhIvrrsfyxJKMdzymOVwg2sEWclWI.jpg', '2026-05-05 14:24:35'),
(12, 'ชายขายเก้าอี้', 'ชายผู้นี้คือยอดนักขาย ไม่มีใครต้านทานเขาได้\r\nเหลาพนังงานหน้าโต๊ะคอมทั้งหลายจงสันเสรินเข้า \r\nชายผู้จะมาปลดปล่อยหลังของพวกเราจากความทุกข์ทรมาน', 5000000.00, 4, 'uploads/product/MlQEZKvwW3SggwiBCpzAqP3LcwW5aZYvVEq6Ozir.jpg', '2026-05-05 14:29:03'),
(13, 'minimal Map of TNI', 'แผนที่ที่ทำให้คุณอาจไม่หลงทางก็ได้', 1000000.00, 5, 'uploads/product/WoiB6mydWVTCv3Y2tQRe4J7RCUWxEmXkJdsUPbWW.png', '2026-05-05 14:31:37');

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
(13, '111111', '111111@111111', '$2y$12$wA/ZdgXaeyVBRj8AO1YzquN2Pdoec0/pMvDcKcdQt93vWIrYiVNKi', 'admin', '2026-05-05 13:05:43', '2026-05-05 13:06:05'),
(14, '222222', '222222@222222', '$2y$12$bsorFvWKI3XFsGCinBwN2eTRVuatgAuj9c8kzX6qubU2fj6Y2If1C', 'user', '2026-05-05 13:06:46', '2026-05-05 13:06:46');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_items`
--
ALTER TABLE `tbl_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `member_username` (`member_username`);

--
-- Indexes for table `tbl_test`
--
ALTER TABLE `tbl_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_items`
--
ALTER TABLE `tbl_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_test`
--
ALTER TABLE `tbl_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
