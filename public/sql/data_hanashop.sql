-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2023 at 07:06 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_hanashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_images`
--

CREATE TABLE `album_images` (
  `id` int(11) NOT NULL,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `code`, `image`, `description`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'quảng cáo sofa', 'quang-cao-sofa', 'portfolio-details-2.jpg', 'Những đồ nội thất dễ thương, tinh nghịch. Được thiết kế thanh lịch', 'Sản phẩm giá ưu đãi', 1, '2023-10-27 09:09:05', '2023-10-27 09:18:29'),
(2, 'Bếp quảng cáo', 'Bep-quang-cao', 'add-img-02.jpg', 'Sản phẩm thiết bị gia dụng nhà bếp', 'Chân ái của những tâm hồn yêu màu hồng', 1, '2023-10-27 09:11:04', '2023-10-27 09:59:30'),
(4, 'Nội thất', 'Noi-that', 'portfolio-5.jpg', 'Những món nội thất gỗ mang lại vẻ ấm cúng cho phòng khách', 'Sắc màu pastel vui nhộn trong Nội thất', 1, '2023-10-27 09:16:03', '2023-10-27 09:18:23'),
(5, 'Sử dụng đồ gỗ', 'Su-dung-do-go', 'all-bg-title.jpg', 'Sử dụng ít chất liệu gỗ trong phòng ngủ', 'Mẹo sử dụng chất liệu gỗ trong thiết kế nội thất', 0, '2023-10-27 09:18:05', '2023-11-28 08:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_cha` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `up` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `id_cha`, `created_at`, `updated_at`, `up`, `status`) VALUES
(1, 'Phòng khách', 'Phong-khach', 0, '2023-10-25 09:55:02', '2023-10-25 09:55:02', NULL, 0),
(2, 'Phòng ăn', 'Phong-an', 0, '2023-10-25 09:55:45', '2023-10-25 09:55:45', NULL, 0),
(3, 'Phòng ngủ', 'Phong-ngu', 0, '2023-10-25 09:55:58', '2023-10-25 09:55:58', NULL, 0),
(4, 'Sofa Vải', 'Sofa-Vai', 1, '2023-10-25 09:56:39', '2023-10-25 09:56:39', NULL, 0),
(5, 'Sofa Da', 'Sofa-Da', 1, '2023-10-25 09:57:01', '2023-10-25 09:57:01', NULL, 0),
(6, 'Bàn Ăn', 'Ban-An', 2, '2023-10-25 09:57:24', '2023-10-25 09:57:24', NULL, 1),
(7, 'Trang trí & Đồ da dụng', 'Trang-tri-&-Do-da-dung', 0, '2023-10-25 09:58:32', '2023-10-25 09:58:46', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customes`
--

CREATE TABLE `customes` (
  `id` int(11) NOT NULL,
  `name` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` longtext NOT NULL,
  `remember_token` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customes`
--

INSERT INTO `customes` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(119, 'demo', 'demo@gmail.com', '$2y$10$.gLmQpBHYMPTAieRshOGXebXdju.9wAKhi9zcEw98iSn.9i9KkFZO', NULL, '2023-11-24 09:06:41', '2023-11-24 09:06:41', 0),
(121, 'ruiBáo', 'rui@gmail.com', '$2y$10$JvzaVynIlNm8IbREWb8c5.A4ElPWfMb422Dafde0vauNzoEX2YZGq', NULL, '2023-11-28 07:53:05', '2023-11-28 09:35:02', 1),
(122, 'Ái bao', 'ai@gmail.com', '$2y$10$vKDoy/qs/ErvLbLgX1aEteC.KoibGemUjXl8AGlGBYr.4YXYx7r3u', NULL, '2023-11-28 07:53:48', '2023-11-28 09:28:17', 1),
(123, 'LêTong', 'le@gmail.com', '$2y$10$3aaRN0JqWf6vR0.iyBWSyuKEIzNoi2pRvS.wuOJy/eHmz.KN1rnWG', NULL, '2023-11-28 07:54:27', '2023-11-28 09:35:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `sale` float DEFAULT NULL,
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_images`
--
ALTER TABLE `album_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customes`
--
ALTER TABLE `customes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album_images`
--
ALTER TABLE `album_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customes`
--
ALTER TABLE `customes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
