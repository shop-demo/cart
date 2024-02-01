-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2024 at 09:14 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hanashop`
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
(8, 'Bốn thứ không mua để tiếc kiệm nhiều hơn', 'Bon-thu-khong-mua-de-tiec-kiem-nhieu-hon', 'portfolio-details-3.jpg', 'Mua một máy pha cà phê và một túi hạt cà phê chất lượng cao, bạn có thể thưởng thức cà phê thơm ngon mỗi ngày chỉ với một vài nghìn đồng.', 'Đừng mua cà phê đắt tiền', 1, '2024-01-02 07:21:55', '2024-01-06 10:20:21'),
(14, 'Thời trang năm 2024', 'Thoi-trang-nam-2024', 'all-bg-title.jpg', 'Giày dép là vật \"bất ly thân\" vì chúng là những món đồ giúp chị em hoàn thiện phong cách và chỉn chu vẻ ngoài.', 'Giày dép là vật \"bất ly thân\"', 0, '2024-01-03 03:51:04', '2024-01-06 10:20:30'),
(19, 'Chi phí dư thừa', 'Chi-phi-du-thua', 'portfolio-details-1.jpg', 'Chi phí dư thừa', 'Để thể tiết kiệm được nhiều hơn.', 1, '2024-01-06 10:20:09', '2024-01-15 12:04:10');

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
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `id_cha`, `created_at`, `updated_at`, `status`) VALUES
(19, 'Phòng Khách', 'Phong-Khach', 0, '2024-01-04 07:31:07', '2024-01-26 05:46:31', 1),
(20, 'Phòng Ăn', 'Phong-An', 0, '2024-01-04 07:31:25', '2024-01-08 07:41:43', 1),
(21, 'Phòng ngủ', 'Phong-ngu', 0, '2024-01-04 07:31:37', '2024-01-09 05:43:38', 1),
(22, 'Đồ Da đa dụng', 'Do-Da-da-dung', 0, '2024-01-04 07:32:10', '2024-01-26 05:46:33', 1),
(23, 'Bàn Trà', 'Ban-Tra', 19, '2024-01-04 07:32:34', '2024-01-04 08:21:38', 1),
(27, 'Sofa Vải', 'Sofa-Vai', 19, '2024-01-08 07:59:04', '2024-01-26 05:46:35', 1),
(28, 'Sofa Góc', 'Sofa-Goc', 19, '2024-01-08 07:59:22', '2024-01-26 05:46:38', 1);

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
(124, 'LeTong', 'le@gmail.com', '$2y$10$5ow2k2l1kCacOSnwFpsvVOQBTmVtpprTU1fOnDxOWf6PWa/tfIFaK', NULL, '2023-12-21 04:32:29', '2023-12-21 04:32:29', 0),
(126, 'HuiBao', 'hui@gmail.com', '$2y$10$5ry6AkMvLBEbbiZ2Q2dK8eGvzlxglSde9hNkxqMBmqRxnKixFKWdi', NULL, '2023-12-22 10:15:20', '2024-01-09 05:21:56', 0),
(127, 'puBao', 'pu@gamil.com', '$2y$10$hjI2rSVcZyauKUjVVNGjBOZuCgIhc/azPCA0PBiqVnH9s0I2X8lxS', NULL, '2023-12-22 10:15:58', '2024-01-11 07:43:54', 1),
(133, 'Ái Bảo', 'bao@gmail.com', '$2y$10$DvUvsKbE8.9Kw65ifplW8eKfXY8tbVBW1uWbe6IRBb3cx.D6FdRiy', NULL, '2024-01-09 05:43:11', '2024-01-11 09:57:30', 0),
(134, 'LeTong', 'tong@gmail.com', '$2y$10$7mnxwmcVnweOk/Moh8HreuMnYTQR6v5wIsy58WYX1Ea0prUF3afo.', NULL, '2024-01-15 04:46:54', '2024-01-15 04:46:54', 0),
(136, 'Demo', 'demo@gmail.com', '$2y$10$xd/2ua.7xCcWOEzwYj9Jj.GkOhmvmEDW8jvFsa00Kzq7qyH586SEe', NULL, '2024-01-29 05:34:52', '2024-01-29 05:34:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` float DEFAULT NULL,
  `sale` float DEFAULT NULL,
  `description` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_details` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `quantity` tinyint(2) DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `avatar`, `album_image`, `price`, `sale`, `description`, `product_details`, `category_id`, `created_at`, `updated_at`, `quantity`, `status`) VALUES
(29, 'Bàn trang điểm', 'Ban-trang-diem', 'sofa7.png', '[\"sofa8.png\",\"sofa7.png\"]', 123000, 120000, 'Bàn trang điểm', '<p>B&agrave;n trang điểm</p>', 21, '2024-01-31 07:24:26', '2024-02-01 06:38:19', 2, 1),
(30, 'Ghế Sofa Da Cao Cấp', 'Ghe-Sofa-Da-Cao-Cap', 'sofa5.png', '[\"sofa5.png\",\"sofa4.png\"]', 10000, 8000, 'Ghế Sofa Da Cao Cấp', '<p>Ghế Sofa Da Cao Cấp</p>', 19, '2024-01-31 08:24:34', '2024-02-01 06:38:17', 2, 1),
(33, 'Giường xếp Ottoman vải VACT10096', 'Giuong-xep-Ottoman-vai-VACT10096', 'sofa8.png', '[\"sofa8.png\",\"sofa7.png\"]', 9282000, 8282000, 'Giường xếp Ottoman vải VACT10096', '<h1>Giường xếp Ottoman vải VACT10096</h1>\r\n\r\n<p><strong>Vật liệu&nbsp;</strong>Khung sắt sơn - Bọc vải cao cấp</p>\r\n\r\n<p><strong>K&iacute;ch thước&nbsp;</strong>D980 - R700 - C400/ D980 - R1880 - C400 mm</p>\r\n\r\n<p>H&agrave;ng c&oacute; sẵn -&nbsp;<a href=\"javascript:void(0)\">Xem cửa h&agrave;ng trưng b&agrave;y</a></p>\r\n\r\n<p>M&atilde;:&nbsp;3*111361</p>\r\n\r\n<p>Danh mục:&nbsp;<a href=\"https://nhaxinh.com/danh-muc/phong-khach/\">Ph&ograve;ng kh&aacute;ch</a>,&nbsp;<a href=\"https://nhaxinh.com/danh-muc/phong-khach/sofa/\">Sofa</a></p>', 27, '2024-02-01 06:18:25', '2024-02-01 06:38:14', 2, 1),
(34, 'Sofa Bolero 3 chỗ + Đôn M3 vải MB 40-15', 'Sofa-Bolero-3-cho-+-Don-M3-vai-MB-40-15', 'sofa2.png', '[\"sofa1.png\",\"product-1.png\"]', 24550000, 20550000, 'Sofa Bolero 3 chỗ + Đôn M3 vải MB 40-15', '<h2><strong>Sofa Bolero 3 chỗ + Đ&ocirc;n M3 vải MB 40-15</strong></h2>\r\n\r\n<p><strong>K&iacute;ch thước</strong>Sofa: D2250 - R900 - C790, Đ&ocirc;n: D720 - R720 - C420</p>\r\n\r\n<p><strong>Vật liệu</strong>Ch&acirc;n kim loại sơn đen, bọc vải cao cấp, bao gồm sofa băng d&agrave;i &amp; đ&ocirc;n</p>\r\n\r\n<p>H&agrave;ng c&oacute; sẵn -&nbsp;<a href=\"javascript:void(0)\">Xem cửa h&agrave;ng trưng b&agrave;y</a></p>\r\n\r\n<p>M&atilde;:&nbsp;3*112858Danh mục:&nbsp;<a href=\"https://nhaxinh.com/danh-muc/phong-khach/\">Ph&ograve;ng kh&aacute;ch</a>,&nbsp;<a href=\"https://nhaxinh.com/danh-muc/phong-khach/sofa/\">Sofa</a></p>', 27, '2024-02-01 06:21:17', '2024-02-01 06:38:12', 2, 1),
(35, 'Bàn nước Dura', 'Ban-nuoc-Dura', 'item-03.jpg', '[\"sofa1.png\",\"product-1.png\"]', 1900000, 1800000, 'Bàn nước Dura', '<h1>B&agrave;n nước Dura</h1>\r\n\r\n<p>14,900,001₫</p>\r\n\r\n<p><strong>Vật liệu</strong>Gỗ Oak - k&iacute;nh</p>\r\n\r\n<p><strong>K&iacute;ch thước</strong>D1100 - R620 - C370 mm</p>\r\n\r\n<p>H&agrave;ng c&oacute; sẵn -&nbsp;<a href=\"javascript:void(0)\">Xem cửa h&agrave;ng trưng b&agrave;y</a></p>\r\n\r\n<p>M&atilde;:&nbsp;3*111439Danh mục:&nbsp;<a href=\"https://nhaxinh.com/danh-muc/phong-khach/ban-nuoc/\">B&agrave;n nước</a>,&nbsp;<a href=\"https://nhaxinh.com/danh-muc/phong-khach/\">Ph&ograve;ng kh&aacute;</a></p>', 23, '2024-02-01 06:29:34', '2024-02-01 06:38:10', 1, 1),
(36, 'Bàn nước Layered', 'Ban-nuoc-Layered', 'sofa5.png', '[\"product-02.jpg\",\"product-01.jpg\"]', 1900000, 1800000, 'Bàn nước Layered', '<h1>B&agrave;n nước Layered</h1>\r\n\r\n<p><strong>Vật liệu:&nbsp;</strong>Ch&acirc;n kim loại - mặt đ&aacute;/ gỗ c&ocirc;ng nghiệp</p>\r\n\r\n<p><strong>K&iacute;ch thước:&nbsp;</strong>D1300 - R550 - C450 mm</p>\r\n\r\n<p>H&agrave;ng c&oacute; sẵn -&nbsp;<a href=\"javascript:void(0)\">Xem cửa h&agrave;ng trưng b&agrave;y</a></p>\r\n\r\n<p>M&atilde;:&nbsp;3*111690</p>', 23, '2024-02-01 06:31:18', '2024-02-01 06:38:08', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `status` int(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`, `created_at`, `updated_at`, `status`) VALUES
(2, 'admin', '[\"admin.bannerList\",\"admin.bannerAdd\",\"admin.bannerAdd_post\",\"admin.bannerEdit\",\"admin.bannerEdit_post\",\"admin.bannerDelete\",\"admin.banner_DeleteAll\",\"admin.activeBanner\",\"admin.not_activeBanner\",\"admin.categoryList\",\"admin.categoryAdd\",\"admin.categoryPost\",\"admin.categoryEdit\",\"admin.categoryEdit_post\",\"admin.categoryDelete\",\"admin.categoryDeleteAll\",\"admin.activeCategory\",\"admin.notActiveCategory\",\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productDelete\",\"admin.productsDelete\",\"admin.activeProduct\",\"admin.notActiveProduct\",\"admin.customeList\",\"admin.customeAdd\",\"admin.customeAdd_Post\",\"admin.customeEdit\",\"admin.customeUpdate\",\"admin.customeDelete\",\"admin.customeDestroy\",\"admin.customeQuyen\",\"admin.customeQuyenAdd\",\"admin.activeCustomes\",\"admin.notActiveCustomes\",\"admin.roleList\",\"admin.roleAdd\",\"admin.roleAdd_post\",\"admin.roleEdit\",\"admin.roleEditPut\",\"admin.roleDelete\",\"admin.roleDestroy\",\"admin.activeRole\",\"admin.notActiveRole\",\"admin.tabsList\",\"admin.tabsAdd\",\"admin.tabsAdd_post\",\"admin.tabstEdit\",\"admin.tabsEditPut\",\"admin.tabstDelete\",\"admin.filemanager\"]', NULL, '2024-01-31', 0),
(13, 'Thành viên', '[\"admin.bannerList\",\"admin.productList\"]', '2023-12-25', '2024-01-11', 0),
(14, 'Quản trị mạng', '[\"admin.categoryList\",\"admin.categoryAdd\",\"admin.categoryPost\",\"admin.categoryEdit\",\"admin.categoryEdit_post\",\"admin.categoryDelete\",\"admin.categoryDeleteAll\",\"admin.activeCategory\",\"admin.notActiveCategory\",\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productDelete\",\"admin.productsDelete\"]', '2023-12-25', '2024-01-11', 0),
(20, 'Quản lý thành viên', '[\"admin.customeList\",\"admin.customeAdd\",\"admin.customeAdd_Post\",\"admin.customeEdit\",\"admin.customeUpdate\",\"admin.customeDelete\",\"admin.customeDestroy\",\"admin.customeQuyen\",\"admin.customeQuyenAdd\",\"admin.activeCustomes\",\"admin.notActiveCustomes\"]', '2024-01-10', '2024-01-11', 1),
(21, 'Quản lý Bán hàng', '[\"admin.bannerList\",\"admin.bannerAdd\",\"admin.bannerAdd_post\",\"admin.bannerEdit\",\"admin.bannerEdit_post\",\"admin.bannerDelete\",\"admin.banner_DeleteAll\",\"admin.activeBanner\",\"admin.not_activeBanner\",\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productDelete\",\"admin.productsDelete\",\"admin.activeProduct\",\"admin.notActiveProduct\"]', '2024-01-10', '2024-01-11', 1),
(22, 'Quản lý bài viết', '[\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productDelete\",\"admin.productsDelete\",\"admin.activeProduct\",\"admin.notActiveProduct\"]', '2024-01-10', '2024-01-11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles_customers`
--

CREATE TABLE `roles_customers` (
  `id` int(11) NOT NULL,
  `customes_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles_customers`
--

INSERT INTO `roles_customers` (`id`, `customes_id`, `roles_id`, `created_at`, `updated_at`) VALUES
(26, 127, 14, NULL, NULL),
(31, 126, 13, NULL, NULL),
(34, 133, 22, NULL, NULL),
(39, 124, 14, NULL, NULL),
(40, 134, 22, NULL, NULL),
(41, 136, 2, NULL, NULL),
(42, 134, 21, NULL, NULL),
(43, 133, 21, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tabs`
--

CREATE TABLE `tabs` (
  `id` int(11) NOT NULL,
  `tabs_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(150) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabs`
--

INSERT INTO `tabs` (`id`, `tabs_name`, `code`, `created_at`, `updated_at`, `status`) VALUES
(11, 'Sản Phẩm Nổi bật', 'San-Pham-Noi-bat', '2024-02-01 04:27:46', '2024-02-01 04:49:44', 1),
(12, 'Giá tốt', 'Gia-tot', '2024-02-01 04:27:58', '2024-02-01 06:34:08', 1),
(13, 'Giá mới', 'Gia-moi', '2024-02-01 04:28:08', '2024-02-01 04:49:38', 1),
(14, 'Hàng Xuất Khẩu', 'Hang-Xuat-Khau', '2024-02-01 04:28:42', '2024-02-01 06:34:06', 1),
(15, 'Hàng bán chạy', 'Hang-ban-chay', '2024-02-01 06:34:04', '2024-02-01 06:34:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tabs_products`
--

CREATE TABLE `tabs_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tabs_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tabs_products`
--

INSERT INTO `tabs_products` (`id`, `product_id`, `tabs_id`, `created_at`, `updated_at`) VALUES
(21, 30, 11, NULL, NULL),
(22, 30, 12, NULL, NULL),
(23, 29, 13, NULL, NULL),
(24, 29, 14, NULL, NULL),
(25, 36, 11, NULL, NULL),
(26, 36, 12, NULL, NULL),
(27, 35, 12, NULL, NULL),
(28, 35, 13, NULL, NULL),
(29, 34, 11, NULL, NULL),
(30, 34, 13, NULL, NULL),
(31, 34, 14, NULL, NULL),
(32, 33, 13, NULL, NULL),
(33, 33, 14, NULL, NULL);

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
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_customers`
--
ALTER TABLE `roles_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customes_id` (`customes_id`),
  ADD KEY `roleCus_roles` (`roles_id`);

--
-- Indexes for table `tabs`
--
ALTER TABLE `tabs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tabs_products`
--
ALTER TABLE `tabs_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `tabs_id` (`tabs_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customes`
--
ALTER TABLE `customes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `roles_customers`
--
ALTER TABLE `roles_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tabs`
--
ALTER TABLE `tabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tabs_products`
--
ALTER TABLE `tabs_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles_customers`
--
ALTER TABLE `roles_customers`
  ADD CONSTRAINT `roleCus_customes` FOREIGN KEY (`customes_id`) REFERENCES `customes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roleCus_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tabs_products`
--
ALTER TABLE `tabs_products`
  ADD CONSTRAINT `FK_products_tabs-products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tabs_tabs-product` FOREIGN KEY (`tabs_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
