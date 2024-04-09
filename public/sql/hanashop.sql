-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th4 09, 2024 lúc 05:15 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hanashop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `album_images`
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
-- Cấu trúc bảng cho bảng `banner`
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
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `code`, `image`, `description`, `link`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Bốn thứ không mua để tiếc kiệm nhiều hơn', 'bon-thu-khong-mua-de-tiec-kiem-nhieu-hon', 'portfolio-details-3.jpg', 'Bạn có thể thưởng thức cà phê thơm ngon mỗi ngày chỉ với một vài nghìn đồng.', 'Đừng mua cà phê đắt tiền', 1, '2024-01-02 07:21:55', '2024-03-04 09:24:04'),
(14, 'Quảng cáo tháng 2 tiếp', 'quang-cao-thang-2-tiep', 'all-bg-title.jpg', 'Giúp chị em hoàn thiện phong cách và chỉn chu vẻ ngoài.', 'Giày dép là vật \"bất ly thân\"', 1, '2024-01-03 03:51:04', '2024-03-01 08:03:39'),
(19, 'Quảng cáo tháng 2', 'quang-cao-thang-2', 'portfolio-details-1.jpg', 'Chi phí dư thừa', 'Để thể tiết kiệm được nhiều hơn.', 1, '2024-01-06 10:20:09', '2024-03-01 07:51:31'),
(21, 'Góc cảm hứng', 'goc-cam-hung', 'slide3.png', 'Góc cảm hứng', 'Không gian sống', 1, '2024-03-01 07:57:38', '2024-03-01 08:03:41'),
(22, 'Gó quảng cáo', 'go-quang-cao', 'portfolio-details-1.jpg', 'Thêm hoa lá và trang hoàng lại không gian phòng khách đón Tết đang đến cận kề.', 'Không gian bừng sắc xuân rộn ràng với sofa', 0, '2024-03-01 08:00:23', '2024-03-04 12:31:55'),
(23, 'Góc giới thiệu', 'goc-gioi-thieu', 'portfolio-details-1.jpg', 'Cho phòng khách trở nên thật nổi bật điểm tô thêm sắc màu cho bức tranh xuân trong phòng khách của bạn trở nên quý phái và cuốn hút.', 'Tết truyền thống nhưng lại đậm chất hiện đại.', 0, '2024-03-01 08:03:21', '2024-03-04 12:31:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `customes_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
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
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `code`, `id_cha`, `created_at`, `updated_at`, `status`) VALUES
(19, 'Phòng Khách', 'phong-khach', 0, '2024-01-04 07:31:07', '2024-02-06 04:07:54', 1),
(20, 'Phòng Ăn', 'phong-an', 0, '2024-01-04 07:31:25', '2024-02-06 04:08:02', 1),
(21, 'Phòng ngủ', 'phong-ngu', 0, '2024-01-04 07:31:37', '2024-02-06 04:08:10', 1),
(22, 'Đồ Da đa dụng', 'do-da-da-dung', 0, '2024-01-04 07:32:10', '2024-02-06 04:08:22', 1),
(23, 'Bàn Trà', 'ban-tra', 19, '2024-01-04 07:32:34', '2024-02-06 04:08:29', 1),
(27, 'Sofa Vải', 'sofa-vai', 19, '2024-01-08 07:59:04', '2024-02-06 04:08:35', 1),
(28, 'Sofa Góc', 'sofa-goc', 19, '2024-01-08 07:59:22', '2024-02-06 04:08:40', 1),
(29, 'Bàn ăn', 'ban-an', 20, '2024-02-21 06:14:11', '2024-02-21 06:14:43', 1),
(30, 'Ghế ăn', 'ghe-an', 20, '2024-02-21 06:14:40', '2024-02-21 06:14:40', 0),
(31, 'Trang trí phòng ngủ', 'trang-tri-phong-ngu', 21, '2024-02-21 06:27:11', '2024-02-21 06:27:11', 1),
(32, 'Trang trí Phòng ăn', 'trang-tri-phong-an', 20, '2024-02-21 06:27:44', '2024-02-21 06:27:44', 1),
(33, 'Trang trí phòng khách', 'trang-tri-phong-khach', 19, '2024-02-21 06:28:03', '2024-02-21 06:28:03', 1),
(34, 'Phòng ngủ trẻ em', 'phong-ngu-tre-em', 21, '2024-02-21 06:29:03', '2024-02-21 06:29:03', 1),
(35, 'Phòng ngủ người lớn', 'phong-ngu-nguoi-lon', 21, '2024-02-21 06:29:26', '2024-02-21 06:29:26', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `customes_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `reply_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customes`
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
-- Đang đổ dữ liệu cho bảng `customes`
--

INSERT INTO `customes` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(127, 'puBao', 'pu@gamil.com', '$2y$10$hjI2rSVcZyauKUjVVNGjBOZuCgIhc/azPCA0PBiqVnH9s0I2X8lxS', NULL, '2023-12-22 10:15:58', '2024-02-26 09:52:09', 0),
(133, 'Ái Bảo', 'bao@gmail.com', '$2y$10$DvUvsKbE8.9Kw65ifplW8eKfXY8tbVBW1uWbe6IRBb3cx.D6FdRiy', NULL, '2024-01-09 05:43:11', '2024-02-26 09:51:53', 1),
(134, 'LeTong', 'tong@gmail.com', '$2y$10$7mnxwmcVnweOk/Moh8HreuMnYTQR6v5wIsy58WYX1Ea0prUF3afo.', NULL, '2024-01-15 04:46:54', '2024-02-26 09:52:07', 0),
(136, 'Demo', 'demo@gmail.com', '$2y$10$xd/2ua.7xCcWOEzwYj9Jj.GkOhmvmEDW8jvFsa00Kzq7qyH586SEe', NULL, '2024-01-29 05:34:52', '2024-02-26 09:52:04', 1),
(139, 'songBao', 'song@gmail.com', '$2y$10$HrSsRz5.q6VSfcFQ9Qr/S.q/gSdKUeJH2TCkIF3GXK.hKX/92MY1i', NULL, '2024-03-08 04:57:32', '2024-03-08 04:57:32', 0),
(140, 'HuiBao', 'info.haianhh@gmail.com', '$2y$10$fLLmo6Od/TFigGS4BvrD0OD6TTh1jQltNqXyR1A9DSbaLqIyGTER.', NULL, '2024-03-29 03:56:42', '2024-03-29 03:56:42', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(100) NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_product` int(150) NOT NULL,
  `thanh_tien` double NOT NULL,
  `note` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customes_id` int(11) NOT NULL,
  `token` varchar(50) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `mobile`, `address`, `total_product`, `thanh_tien`, `note`, `customes_id`, `token`, `status`, `created_at`, `updated_at`) VALUES
(49, 'HuiBao', 'info.haianhh@gmail.com', '09876543', '15A Hàng cot', 6, 370000, 'Hàng cồng kềnh', 140, 'DUYWTA8VP7TDBHIXTTQN', 1, '2024-04-06 04:32:39', '2024-04-06 04:33:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orders_id` int(11) NOT NULL,
  `products_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `sale` double DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `name`, `orders_id`, `products_id`, `price`, `sale`, `quantity`, `created_at`, `updated_at`, `status`) VALUES
(77, 'Sofa Coastal góc trái vải', 49, 38, 123000, NULL, 2, '2024-04-06 04:32:39', '2024-04-06 04:32:39', 0),
(78, 'Sofa Bolero 3 chỗ + Đôn M3 vải', 49, 37, 8000, NULL, 2, '2024-04-06 04:32:39', '2024-04-06 04:32:39', 0),
(79, 'Bàn ăn Breeze mặt kính bronze/GM2', 49, 47, 8000, NULL, 1, '2024-04-06 04:32:39', '2024-04-06 04:32:39', 0),
(80, 'Bàn ăn gỗ Bridge 1m8', 49, 48, 100000, NULL, 1, '2024-04-06 04:32:40', '2024-04-06 04:32:40', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
  `quantity` varchar(50) DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `code`, `avatar`, `album_image`, `price`, `sale`, `description`, `product_details`, `category_id`, `created_at`, `updated_at`, `quantity`, `status`) VALUES
(37, 'Sofa Bolero 3 chỗ + Đôn M3 vải', 'sofa-bolero-3-cho-don-m3-vai', 'sofa-vai2.png', '[\"sofa-vai2.png\",\"sofa-vai1.png\",\"sofa-trangtri1.png\"]', 123000, 8000, 'Vật liêu: Bọc vải\r\nKích thước: D2900 - R850/1650 - C420/720 mm.\r\nMã: 3*111285.', '<p>Sofa Bolero g&acirc;y ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic &ndash; gần gũi với thi&ecirc;n nhi&ecirc;n m&agrave; vẫn hiện đại, thoải m&aacute;i. Điểm đặc biệt của BST lần n&agrave;y nằm ở sự tỉ mỉ của những người thợ thủ c&ocirc;ng l&agrave;nh nghề, họ đ&atilde; ho&agrave;n th&agrave;nh những đường may uốn lượn kh&ocirc;ng t&igrave; vết, mang đến một thiết kế chỉn chu, &quot;c&acirc;n&quot; mọi g&oacute;c nh&igrave;n. Cảm gi&aacute;c &ecirc;m &aacute;i v&agrave; thư th&aacute;i sẽ l&agrave; những t&iacute;nh từ đầu ti&ecirc;n được nhắc đến khi trải nghiệm sofa Bolero.</p>', 27, '2024-02-20 07:45:58', '2024-03-05 04:00:13', '2', 1),
(38, 'Sofa Coastal góc trái vải', 'sofa-coastal-goc-trai-vai', 'sofa-vai1.png', '[\"sofa-vai1.png\",\"sofa-trangtri1.png\",\"sofa-go.png\"]', 123000, 0, 'Vật liêu:\r\nKích thước:\r\nMã:', '<h3><strong>Sofa Coastal</strong></h3>\r\n\r\n<p>Sofa Coastal g&acirc;y ấn tượng bằng những đường cong bồng bềnh, theo xu hướng Modern Organic &ndash; gần gũi với thi&ecirc;n nhi&ecirc;n m&agrave; vẫn hiện đại, thoải m&aacute;i. Điểm đặc biệt của BST lần n&agrave;y nằm ở sự tỉ mỉ của những người thợ thủ c&ocirc;ng l&agrave;nh nghề, họ đ&atilde; ho&agrave;n th&agrave;nh những đường may uốn lượn kh&ocirc;ng t&igrave; vết, mang đến một thiết kế chỉn chu, &quot;c&acirc;n&quot; mọi g&oacute;c nh&igrave;n. Cảm gi&aacute;c &ecirc;m &aacute;i v&agrave; thư th&aacute;i sẽ l&agrave; những t&iacute;nh từ đầu ti&ecirc;n được nhắc đến khi trải nghiệm sofa Coastal.</p>', 28, '2024-02-20 07:50:50', '2024-03-05 04:00:06', '2', 1),
(39, 'Sofa Poppy M2 GP vải VACT', 'sofa-poppy-m2-gp-vai-vact', 'sofa-trangtri1.png', '[\"sofa-vai1.png\",\"sofa-trangtri1.png\",\"sofa-go.png\"]', 123000, NULL, 'Vật liêu:\r\nKích thước:\r\nMã SP:', '<h3><strong>Sofa Poppy M2 GP vải VACT 11303</strong></h3>\r\n\r\n<p>C&aacute;c sản phẩm nội thất tại Nh&agrave; Xinh đa số đều được sản xuất tại nh&agrave; m&aacute;y của c&ocirc;ng ty cổ phần x&acirc;y dựng kiến tr&uacute;c AA với đội ngũ nh&acirc;n vi&ecirc;n v&agrave; c&ocirc;ng nh&acirc;n ưu t&uacute; c&ugrave;ng cơ sở vật chất hiện đại&nbsp;<a href=\"http://www.aacorporation.com/\">(http://www.aacorporation.com/)</a>. Nh&agrave; Xinh đ&atilde; kiểm tra kỹ lưỡng từ nguồn nguy&ecirc;n liệu cho đến sản phẩm ho&agrave;n thiện cuối c&ugrave;ng.</p>', 27, '2024-02-20 08:17:00', '2024-02-23 00:44:19', '2', 1),
(46, 'Bàn ăn 6 chỗ Coastal', 'ban-an-6-cho-coastal', 'bo-ghe-an-2.png', 'bo-ghe-an-2.png', 10000, NULL, 'Bàn ăn 6 chỗ Coastal.\r\nVật liệu:\r\nKÍch thước:', '<h2><strong>B&agrave;n ăn 6 chỗ</strong></h2>\r\n\r\n<p>B&agrave;n ăn Coastal được l&agrave;m từ gỗ Ash, theo phong c&aacute;ch truyền thống v&agrave; mang kết cấu vững ch&atilde;i. Mặt b&agrave;n bằng phẳng với c&aacute;c đường v&acirc;n tự nhi&ecirc;n, bốn cạnh được bo tr&ograve;n mềm mại để tr&aacute;nh va chạm trong l&uacute;c sử dụng. Sản phẩm c&oacute; 2 k&iacute;ch thước l&agrave; 6 chỗ v&agrave; 8 chỗ cho người d&ugrave;ng những lựa chọn linh hoạt, ph&ugrave; hợp với nhiều kh&ocirc;ng gian v&agrave; nhu cầu sử dụng.</p>', 29, '2024-02-21 06:06:59', '2024-02-21 08:23:36', NULL, 1),
(47, 'Bàn ăn Breeze mặt kính bronze/GM2', 'ban-an-breeze-mat-kinh-bronzegm2', 'ban-an.png', 'ban-an.png', 10000, 8000, 'Bàn ăn Breeze mặt kính bronze/GM2\r\nVật liệu:\r\nKích thước:', '<h2>B&agrave;n ăn Breeze mặt k&iacute;nh bronze/GM2</h2>\r\n\r\n<p>C&aacute;c sản phẩm nội thất&nbsp; đều được sản xuất tại nh&agrave; m&aacute;y của c&ocirc;ng ty cổ phần x&acirc;y dựng kiến tr&uacute;c AA với đội ngũ nh&acirc;n vi&ecirc;n v&agrave; c&ocirc;ng nh&acirc;n ưu t&uacute; c&ugrave;ng cơ sở vật chất hiện đại v&agrave; đ&atilde; kiểm tra kỹ lưỡng từ nguồn nguy&ecirc;n liệu cho đến sản phẩm ho&agrave;n thiện cuối c&ugrave;ng.</p>', 29, '2024-02-21 06:11:18', '2024-02-21 08:23:34', '10', 1),
(48, 'Bàn ăn gỗ Bridge 1m8', 'ban-an-go-bridge-1m8', 'ban-an.png', 'ban-an.png', 123000, 100000, 'Bàn ăn gỗ Bridge 1m8.\r\nVật liệu:\r\nKích thước:', '<h2>B&agrave;n ăn gỗ Bridge 1m8</h2>\r\n\r\n<p>B&agrave;n ăn gỗ Bridge được thiết kế đặc biệt từ gỗ sồi đặc. Kiểu d&aacute;ng tối giản với những n&eacute;t cong mềm mại, được xử l&yacute; tinh xảo mang t&iacute;nh thủ c&ocirc;ng cao mang lại sự tinh tế, sang trọng cho kh&ocirc;ng gian. M&agrave;u sắc v&agrave; v&acirc;n gỗ của Bridge được chọn lựa kỹ lưỡng ch&iacute;nh l&agrave; điểm đặc sắc trong thiết kế b&agrave;n ăn Bridge n&oacute;i ri&ecirc;ng v&agrave; những thiết kế c&ugrave;ng BST n&oacute;i chung.</p>', 29, '2024-02-21 06:18:02', '2024-02-21 08:23:30', '10', 1),
(49, 'Ghế ăn Bolero ACC001 Da', 'ghe-an-bolero-acc001-da', 'sofa-3.png', '[\"sofa-3.png\",\"sofa-2.png\",\"sofa-1.png\"]', 123000, NULL, 'Ghế ăn Bolero ACC001 Da.\r\nVật liệu:\r\nKích thước:', '<h2>Ghế ăn Bolero ACC001 Da</h2>\r\n\r\n<p>&nbsp;bảo h&agrave;nh một năm cho c&aacute;c trường hợp c&oacute; lỗi về kỹ thuật trong qu&aacute; tr&igrave;nh sản xuất hay lắp đặt.</p>', 30, '2024-02-21 06:20:01', '2024-02-21 08:23:28', NULL, 1),
(50, 'Ghế ăn Bolero ACC001 Da AB1142', 'ghe-an-bolero-acc001-da-ab1142', 'sofa-2.png', '[\"sofa-3.png\",\"sofa-2.png\"]', 2000000, 100000, 'Ghế ăn Bolero ACC001 Da AB1142\r\nVật liệu:\r\nKích thước:', '<h2>Ghế ăn Bolero ACC001 Da AB1142</h2>\r\n\r\n<p>Sản phẩm được sử dụng kh&ocirc;ng đ&uacute;ng quy c&aacute;ch của sổ bảo h&agrave;nh (được trao gửi khi qu&yacute; kh&aacute;ch mua sản phẩm) g&acirc;y n&ecirc;n trầy xước, m&oacute;p, dơ bẩn hay mất m&agrave;u.</p>', 30, '2024-02-21 06:24:54', '2024-02-21 08:23:26', '10', 1),
(51, 'Bình Aila Turquoise', 'binh-aila-turquoise', 'trang-tri-1.png', 'trang-tri-1.png', 100000, NULL, 'Bình Aila Turquoise\r\nKích thước:\r\nChất liệu:', '<h2>B&igrave;nh Aila Turquoise</h2>\r\n\r\n<p>H&agrave;ng H&agrave;n quốc lu&ocirc;n c&oacute; sẵn nhiều mẫu m&atilde;.</p>', 33, '2024-02-21 06:34:21', '2024-02-21 08:23:23', '10', 1),
(52, 'Tủ áo Wabrobe 02', 'tu-ao-wabrobe-02', 'ghe-da-dung.png', '[\"ghe1.png\",\"ghe-da-dung.png\"]', 16000000, 15000000, 'Tủ áo Wabrobe 02\r\nChất liệu:\r\nKích thước', '<h2>Tủ &aacute;o Wabrobe 02</h2>\r\n\r\n<p>Giảm gi&aacute; đặc biệt</p>', 35, '2024-02-21 08:15:45', '2024-02-21 08:23:21', '2', 1),
(53, 'Tủ áo hiện đại', 'tu-ao-hien-dai', 'da-dung-2.png', '[\"da-dung-2.png\",\"da-dung-13.png\",\"da-dung-12.png\"]', 24000000, 22000000, 'Tủ áo hiện đại\r\nKích thước:\r\nVật liệu:', '<h2>Tủ &aacute;o hiện đại</h2>\r\n\r\n<p>Mẫu tủ &aacute;o hiện đại của Nh&agrave; Xinh với thiết kế giản đơn, tối đa tiện &iacute;ch bằng nhiều ngăn k&eacute;o v&agrave; khoảng trống để cất trữ quần &aacute;o v&agrave; đồ đạc.</p>', 35, '2024-02-21 08:17:48', '2024-02-21 08:23:18', '2', 1),
(54, 'Giường Le Marais 1m6', 'giuong-le-marais-1m6', 'guong-doi-1.png', '[\"guong-doi-1.png\",\"ghe1.png\"]', 1000000, NULL, 'Giường Le Marais 1m6 da brown L01\r\nChất liệu', '<h3>Giường Le Marais 1m6 da brown L01</h3>\r\n\r\n<p>Sau thời gian hết hạn bảo h&agrave;nh, nếu qu&yacute; kh&aacute;ch c&oacute; bất kỳ y&ecirc;u cầu hay thắc mắc th&igrave; vui l&ograve;ng li&ecirc;n hệ với Nh&agrave; Xinh để được hướng dẫn v&agrave; giải quyết c&aacute;c vấn đề gặp phải.</p>', 34, '2024-02-21 08:20:04', '2024-02-21 08:23:16', '2', 1),
(55, 'Giường xếp Ottoman', 'giuong-xep-ottoman', 'da-dung-5.png', '[\"da-dung-5.png\",\"da-dung-4.png\"]', 123000, NULL, 'Giường xếp Ottoman vải VACT7459\r\nChất liệu:\r\nKích thước', '<h3>Giường xếp Ottoman vải VACT7459</h3>\r\n\r\n<p>Sản phẩm bị biến dạng do m&ocirc;i trường b&ecirc;n ngo&agrave;i bất b&igrave;nh thường (qu&aacute; ẩm, qu&aacute; kh&ocirc;, mối hay do t&aacute;c động từ c&aacute;c thiết bị điện nước, c&aacute;c h&oacute;a chất hay dung m&ocirc;i kh&aacute;ch h&agrave;ng sử dụng kh&ocirc;ng ph&ugrave; hợp).</p>', 34, '2024-02-21 08:22:29', '2024-02-21 08:23:14', NULL, 1),
(56, 'Khung tranh Autumn', 'khung-tranh-autumn', 'da-dung-2.png', '[\"da-dung-8.png\",\"da-dung-3.png\"]', 37000, 20000, 'Khung tranh Autumn', '<p>Khung tranh Autumn l&agrave; d&ograve;ng tranh ti&ecirc;u &acirc;m mang đậm t&iacute;nh nghệ thuật. Tranh in kỹ thuật số với cường độ m&agrave;u ấn tượng gi&uacute;p cho chất lượng bức tranh đạt mức tối ưu nhất. Ngo&agrave;i việc n&acirc;ng cao t&iacute;nh thẩm mỹ cho kh&ocirc;ng gian, sản phẩm c&ograve;n hấp thụ &acirc;m vang, triệt ti&ecirc;u tạp &acirc;m v&agrave; cải thiện chất lượng &acirc;m thanh trong ph&ograve;ng nhờ chất liệu l&ocirc;ng cừu polyester. Sản phẩm hạn chế tối đa việc hấp thụ kh&oacute;i bụi v&agrave; t&igrave;nh trạng nấm mốc, v&igrave; thế ho&agrave;n to&agrave;n ph&ugrave; hợp với những người bị dị ứng. Khung tranh bằng nh&ocirc;m với h&igrave;nh ảnh thi&ecirc;n nhi&ecirc;n y&ecirc;n b&igrave;nh, mang đến trải nghiệm thư th&aacute;i trong từng khoảnh khắc.</p>', 22, '2024-02-21 08:26:01', '2024-02-21 08:32:42', '10', 1),
(57, 'Bình thủy tinh hoa Ranunculus', 'binh-thuy-tinh-hoa-ranunculus', 'da-dung-6.png', '[\"da-dung-8.png\",\"da-dung-6.png\"]', 123000, NULL, 'Bình thủy tinh hoa Ranunculus hồng / xanh lá cây nhỏ 12498', '<h2>B&igrave;nh thủy tinh hoa Ranunculus hồng / xanh l&aacute; c&acirc;y nhỏ 12498</h2>\r\n\r\n<p>Viết đ&aacute;nh gi&aacute; cho &quot;B&igrave;nh thủy tinh hoa Ranunculus hồng / xanh l&aacute; c&acirc;y nhỏ 12498&quot;&nbsp;</p>', 22, '2024-02-21 08:29:03', '2024-03-05 04:39:21', '10', 1),
(58, 'Tủ áo Wabrobe 01', 'tu-ao-wabrobe-01', 'trang-tri-1.png', '[\"sofa-3.png\",\"sofa-2.png\",\"sofa-1.png\"]', 123000, NULL, 'Tủ áo Wabrobe 02\r\nChất liệu:\r\nKích thước:', '<p>Điểm nhấn&nbsp;<a href=\"https://nhaxinh.com/danh-muc/phong-an/ban-an/\"><strong>b&agrave;n ăn</strong></a>&nbsp;v&agrave;&nbsp;<a href=\"https://nhaxinh.com/san-pham/ghe-an-khong-tay-elegance-mau-tu-nhien/\"><strong>ghế ăn Elegance</strong></a>&nbsp;m&agrave;u gỗ tự nhi&ecirc;n thanh lịch, kết hợp với chiếc&nbsp;<a href=\"https://nhaxinh.com/san-pham/bench-elegance-mau-tu-nhien-da-cognac/\"><strong>bench Elegance</strong></a>&nbsp;m&agrave;u tự nhi&ecirc;n da cognac mang sự gần gũi, nhẹ nh&agrave;ng cho kh&ocirc;ng gian. Kiểu d&aacute;ng khỏe khoắn nhưng thanh lịch sẽ l&agrave; lựa chọn l&acirc;u d&agrave;i v&agrave; ph&ugrave; hợp với nhiều kh&ocirc;ng gian ph&ograve;ng ăn. Sắc m&agrave;u s&aacute;ng của gỗ tự nhi&ecirc;n tr&ecirc;n nền hồng đậm, t&ocirc; th&ecirc;m sự nổi bật của những thiết kế đặc biệt của bộ b&agrave;n ăn.</p>', 34, '2024-02-23 00:41:35', '2024-02-23 00:44:26', NULL, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `product_id` int(11) NOT NULL,
  `customes_id` int(11) NOT NULL,
  `rating_star` float NOT NULL,
  `status` tinytext NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
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
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `role`, `created_at`, `updated_at`, `status`) VALUES
(2, 'admin', '[\"admin.bannerList\",\"admin.bannerAdd\",\"admin.bannerAdd_post\",\"admin.bannerEdit\",\"admin.bannerEdit_post\",\"admin.bannerDelete\",\"admin.banner_DeleteAll\",\"admin.activeBanner\",\"admin.not_activeBanner\",\"admin.categoryList\",\"admin.categoryAdd\",\"admin.categoryPost\",\"admin.categoryEdit\",\"admin.categoryEdit_post\",\"admin.categoryDelete\",\"admin.categoryDeleteAll\",\"admin.activeCategory\",\"admin.notActiveCategory\",\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productTabs\",\"admin.productTabs_put\",\"admin.productDelete\",\"admin.productsDelete\",\"admin.activeProduct\",\"admin.notActiveProduct\",\"admin.customeList\",\"admin.customeAdd\",\"admin.customeAdd_Post\",\"admin.customeEdit\",\"admin.customeUpdate\",\"admin.customeDelete\",\"admin.customeDestroy\",\"admin.customeQuyen\",\"admin.customeQuyenAdd\",\"admin.activeCustomes\",\"admin.notActiveCustomes\",\"admin.roleList\",\"admin.roleAdd\",\"admin.roleAdd_post\",\"admin.roleEdit\",\"admin.roleEditPut\",\"admin.roleDelete\",\"admin.roleDestroy\",\"admin.activeRole\",\"admin.notActiveRole\",\"admin.tabsList\",\"admin.tabsAdd\",\"admin.tabsAdd_post\",\"admin.tabsEdit\",\"admin.tabsEditPut\",\"admin.tabsDelete\",\"admin.tabsDestroy\",\"admin.activeTabs\",\"admin.notActiveTabs\",\"admin.filemanager\"]', NULL, '2024-02-29', 0),
(13, 'Thành viên', '[\"admin.bannerList\",\"admin.productList\"]', '2023-12-25', '2024-01-11', 0),
(14, 'Quản trị mạng', '[\"admin.categoryList\",\"admin.categoryAdd\",\"admin.categoryPost\",\"admin.categoryEdit\",\"admin.categoryEdit_post\",\"admin.categoryDelete\",\"admin.categoryDeleteAll\",\"admin.activeCategory\",\"admin.notActiveCategory\",\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productDelete\",\"admin.productsDelete\"]', '2023-12-25', '2024-01-11', 0),
(20, 'Quản lý thành viên', '[\"admin.customeList\",\"admin.customeAdd\",\"admin.customeAdd_Post\",\"admin.customeEdit\",\"admin.customeUpdate\",\"admin.customeDelete\",\"admin.customeDestroy\",\"admin.customeQuyen\",\"admin.customeQuyenAdd\",\"admin.activeCustomes\",\"admin.notActiveCustomes\"]', '2024-01-10', '2024-01-11', 1),
(21, 'Quản lý Bán hàng', '[\"admin.bannerList\",\"admin.bannerAdd\",\"admin.bannerAdd_post\",\"admin.bannerEdit\",\"admin.bannerEdit_post\",\"admin.bannerDelete\",\"admin.banner_DeleteAll\",\"admin.activeBanner\",\"admin.not_activeBanner\",\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productDelete\",\"admin.productsDelete\",\"admin.activeProduct\",\"admin.notActiveProduct\"]', '2024-01-10', '2024-01-11', 1),
(22, 'Quản lý bài viết', '[\"admin.productList\",\"admin.productAdd\",\"admin.productAdd_Post\",\"admin.productEdit\",\"admin.productUpdate\",\"admin.productDelete\",\"admin.productsDelete\",\"admin.activeProduct\",\"admin.notActiveProduct\"]', '2024-01-10', '2024-01-11', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles_customers`
--

CREATE TABLE `roles_customers` (
  `id` int(11) NOT NULL,
  `customes_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `roles_customers`
--

INSERT INTO `roles_customers` (`id`, `customes_id`, `roles_id`, `created_at`, `updated_at`) VALUES
(26, 127, 14, NULL, NULL),
(34, 133, 22, NULL, NULL),
(40, 134, 22, NULL, NULL),
(41, 136, 2, NULL, NULL),
(43, 133, 21, NULL, NULL),
(46, 133, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tabs`
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
-- Đang đổ dữ liệu cho bảng `tabs`
--

INSERT INTO `tabs` (`id`, `tabs_name`, `code`, `created_at`, `updated_at`, `status`) VALUES
(11, 'Sản Phẩm Nổi bật', 'san-pham-noi-bat', '2024-02-01 04:27:46', '2024-02-22 08:11:30', 1),
(12, 'Giá tốt', 'gia-tot', '2024-02-01 04:27:58', '2024-02-22 08:11:29', 1),
(16, 'Sản phẩm mới', 'san-pham-moi', '2024-02-21 08:31:14', '2024-02-22 08:11:28', 1),
(17, 'Bán chạy', 'ban-chay', '2024-02-21 08:32:04', '2024-02-22 08:11:26', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tabs_products`
--

CREATE TABLE `tabs_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `tabs_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tabs_products`
--

INSERT INTO `tabs_products` (`id`, `product_id`, `tabs_id`, `created_at`, `updated_at`) VALUES
(37, 57, 12, NULL, NULL),
(38, 56, 12, NULL, NULL),
(39, 56, 16, NULL, NULL),
(40, 54, 11, NULL, NULL),
(41, 54, 17, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `album_images`
--
ALTER TABLE `album_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customes_id` (`customes_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_comments_customes` (`customes_id`),
  ADD KEY `FK_comments_products` (`product_id`);

--
-- Chỉ mục cho bảng `customes`
--
ALTER TABLE `customes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customes_id` (`customes_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD KEY `customes_id` (`customes_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles_customers`
--
ALTER TABLE `roles_customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customes_id` (`customes_id`),
  ADD KEY `roleCus_roles` (`roles_id`);

--
-- Chỉ mục cho bảng `tabs`
--
ALTER TABLE `tabs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tabs_products`
--
ALTER TABLE `tabs_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `tabs_id` (`tabs_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `album_images`
--
ALTER TABLE `album_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customes`
--
ALTER TABLE `customes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `roles_customers`
--
ALTER TABLE `roles_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `tabs`
--
ALTER TABLE `tabs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tabs_products`
--
ALTER TABLE `tabs_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `Fk_cart_products` FOREIGN KEY (`product_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_comments_customes` FOREIGN KEY (`customes_id`) REFERENCES `customes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comments_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_orders_customes` FOREIGN KEY (`customes_id`) REFERENCES `customes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_orderDetails_orders` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_orderDetails_products` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `Fk_product_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_rating_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Fk_rating_custome` FOREIGN KEY (`customes_id`) REFERENCES `customes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `roles_customers`
--
ALTER TABLE `roles_customers`
  ADD CONSTRAINT `roleCus_customes` FOREIGN KEY (`customes_id`) REFERENCES `customes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `roleCus_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `tabs_products`
--
ALTER TABLE `tabs_products`
  ADD CONSTRAINT `FK_products_tabs-products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_tabs_tabs-product` FOREIGN KEY (`tabs_id`) REFERENCES `tabs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
