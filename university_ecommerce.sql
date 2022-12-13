-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3309
-- Thời gian đã tạo: Th12 13, 2022 lúc 12:45 PM
-- Phiên bản máy phục vụ: 8.0.27
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `university_ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int NOT NULL,
  `employee_id` int NOT NULL,
  `title` text,
  `avatar_path` text,
  `short_description` text,
  `content` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_path` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `avatar_path`, `description`, `created_at`, `updated_at`) VALUES
(102, 'Đồng hồ nam', '/storage/v1/admin-page/images/categories/dong-ho-nam/avatar/c9YpPsoWSYqI7zbKj35O.webp', 'Mô tả', '2022-10-29 14:31:35', '2022-12-11 02:13:06'),
(103, 'Đồng hồ nữ', '/storage/v1/admin-page/images/categories/dong-ho-nu/avatar/QF9kdhqAefVZ1pwziM9I.webp', 'add', '2022-12-07 16:29:41', '2022-12-11 02:13:38'),
(104, 'Đồng hồ mạ vàng', '/storage/v1/admin-page/images/categories/dong-ho-ma-vang/avatar/wHWkshZQtgHc8LNseg7p.webp', 'ádads', '2022-12-08 13:11:50', '2022-12-11 02:14:30'),
(105, 'Đồng hồ cao cấp', '/storage/v1/admin-page/images/categories/dong-ho-cao-cap/avatar/qdJD6w6nWRgPR9zbbT1O.webp', NULL, '2022-12-11 02:13:58', '2022-12-11 02:13:58'),
(106, 'Đồng hồ trẻ em', '/storage/v1/admin-page/images/categories/dong-ho-tre-em/avatar/f5gL68YlnQzQ7ajWBlP2.webp', 'Mô tả', '2022-12-11 02:15:00', '2022-12-11 02:15:00'),
(107, 'Đồng hồ đôi', '/storage/v1/admin-page/images/categories/dong-ho-doi/avatar/62EFJDdAQRS3IZNDDU1R.webp', 'Mô tả danh mục', '2022-12-11 02:16:00', '2022-12-11 02:16:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `employee_id` int DEFAULT NULL,
  `receiver_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `total` double DEFAULT NULL,
  `status` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `employee_id`, `receiver_name`, `receiver_phone`, `receiver_email`, `receiver_address`, `note`, `total`, `status`, `created_at`, `updated_at`) VALUES
(21, 53, 0, 'Lân Khách', '0123888999', 'khach2@gmail.com', 'Hà Nội PTIT', 'Ship nhanh', 14125, '1', '2022-12-11 03:09:25', '2022-12-11 03:09:25'),
(22, 51, 0, 'Trung Khách 3', '0259788589', 'khach3@gmail.com', 'Hà Nội, Việt Nam', 'Ship hộ mình 5h', 49310, '1', '2022-12-11 03:10:33', '2022-12-11 03:10:33'),
(23, 54, 0, 'Giang Khách', '0992625456', 'khach4@gmail.com', 'Hà Nội, Việt Nam', NULL, 40325, '1', '2022-12-11 03:11:57', '2022-12-11 03:11:57'),
(24, 55, 0, 'Luân Khách', '0845884847', 'khach5@gmail.com', 'PTIT Hà Nội', 'Ship cho mình vào chủ nhật', 29555, '1', '2022-12-11 03:13:11', '2022-12-11 03:13:11'),
(25, 50, 0, 'Khách 1', '0968655178', 'khach1@gmail.com', 'PTIT Hà Nội Việt Na,', 'Ship cho mình nhanh nhất ạ', 25125, '1', '2022-12-11 03:16:36', '2022-12-11 03:16:36'),
(26, 50, 0, 'Khách 1', '0968655178', 'khach1@gmail.com', 'ádasd', NULL, 8000, '1', '2022-12-11 03:52:36', '2022-12-11 03:52:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `total` double DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `price`, `quantity`, `total`, `created_at`, `updated_at`) VALUES
(30, 21, 45, 1000, 1, 1000, '2022-12-11 03:09:25', '2022-12-11 03:09:25'),
(31, 21, 46, 8000, 1, 8000, '2022-12-11 03:09:25', '2022-12-11 03:09:25'),
(32, 21, 49, 5125, 1, 5125, '2022-12-11 03:09:25', '2022-12-11 03:09:25'),
(33, 22, 54, 26200, 1, 26200, '2022-12-11 03:10:33', '2022-12-11 03:10:33'),
(34, 22, 55, 9555, 2, 19110, '2022-12-11 03:10:33', '2022-12-11 03:10:33'),
(35, 22, 56, 4000, 1, 4000, '2022-12-11 03:10:33', '2022-12-11 03:10:33'),
(36, 23, 52, 9000, 1, 9000, '2022-12-11 03:11:57', '2022-12-11 03:11:57'),
(37, 23, 49, 5125, 1, 5125, '2022-12-11 03:11:57', '2022-12-11 03:11:57'),
(38, 23, 54, 26200, 1, 26200, '2022-12-11 03:11:57', '2022-12-11 03:11:57'),
(39, 24, 56, 4000, 1, 4000, '2022-12-11 03:13:11', '2022-12-11 03:13:11'),
(40, 24, 55, 9555, 1, 9555, '2022-12-11 03:13:11', '2022-12-11 03:13:11'),
(41, 24, 46, 8000, 2, 16000, '2022-12-11 03:13:11', '2022-12-11 03:13:11'),
(42, 25, 49, 5125, 1, 5125, '2022-12-11 03:16:36', '2022-12-11 03:16:36'),
(43, 25, 50, 10000, 2, 20000, '2022-12-11 03:16:36', '2022-12-11 03:16:36'),
(44, 26, 56, 4000, 2, 8000, '2022-12-11 03:52:36', '2022-12-11 03:52:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `sku` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `stock` int DEFAULT NULL,
  `product_company_id` int DEFAULT NULL,
  `feature_image_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_description` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_recommended` tinyint DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `sku`, `name`, `price`, `stock`, `product_company_id`, `feature_image_path`, `short_description`, `long_description`, `is_recommended`, `created_at`, `updated_at`, `deleted_at`) VALUES
(45, 'SP01', 'Guess Legacy Mens Watch with Black Silicone Strap W1048G2', 1000, 52, 23, '/storage/v1/admin-page/images/products/guess-legacy-mens-watch-with-black-silicone-strap-w1048g2/feature/6djzY9RlJ2AfBqpCrGQi.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-06 13:43:50', '2022-12-11 02:46:24', NULL),
(46, 'SP02', 'Mens Accurist Watch with White Dial and Black Leather Strap 7287', 8000, 119, 22, '/storage/v1/admin-page/images/products/mens-accurist-watch-with-white-dial-and-black-leather-strap-7287/feature/ResJGYuzfc4fmMoPdeVU.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-06 13:44:25', '2022-12-11 02:24:50', NULL),
(47, 'SP03', 'SAGA 53442-RGBNRG-2A – NỮ – QUARTZ (PIN)', 9000, 15, 24, '/storage/v1/admin-page/images/products/adasd/feature/UOWweabJiR5LmVixVP8F.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-06 13:45:55', '2022-12-11 02:57:50', NULL),
(48, 'SP04', 'Swatch Black Rubber Strap Once Again Watch GB743', 2545, 51, 23, '/storage/v1/admin-page/images/products/swatch-black-rubber-strap-once-again-watch-gb743/feature/QkTC6iXHsDheVb704e5b.jpg', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 0, '2022-12-06 13:48:46', '2022-12-11 02:26:43', NULL),
(49, 'SP06', 'DANIEL WELLINGTON DW00100319', 5125, 13, 20, '/storage/v1/admin-page/images/products/sp-moi/feature/vNFDpVbdMEbEJG8gNzrX.jpg', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-06 13:50:12', '2022-12-11 03:05:55', NULL),
(50, 'SP07', 'TESLAR MEN_S WATCH TW-035', 10000, 16, 25, '/storage/v1/admin-page/images/products/teslar-men-s-watch-tw-035/feature/0aFhHDOaXRj1eW6ZCaHW.jpg', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-11 02:29:29', '2022-12-11 02:29:29', NULL),
(51, 'SP09', 'G-Shock Classics Layered Bezel Yellow Watch GA-2110SU-9AER', 9000, 50, 26, '/storage/v1/admin-page/images/products/g-shock-classics-layered-bezel-yellow-watch-ga-2110su-9aer/feature/MvXLuVBkMDq4IZWZuHWw.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 0, '2022-12-11 02:32:13', '2022-12-11 02:32:13', NULL),
(52, 'SP10', 'Ben Sherman Mens Watch with Blue Dial and Blue Leather Strap WB045U', 9000, 15, 26, '/storage/v1/admin-page/images/products/ben-sherman-mens-watch-with-blue-dial-and-blue-leather-strap-wb045u/feature/XRkuUN4kZc36kJr4QbBg.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-11 02:35:21', '2022-12-11 02:35:21', NULL),
(53, 'SP20', 'TISSOT T094.210.11.111.00 – NỮ – KÍNH SAPPHIRE – QUARTZ (PIN', 20999, 16, 26, '/storage/v1/admin-page/images/products/tissot-t0942101111100-nu-kinh-sapphire-quartz-pin/feature/zwyTl1NbVDnCCMJrwXxG.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 0, '2022-12-11 02:37:43', '2022-12-11 02:37:43', NULL),
(54, 'SP21', 'Rotary Vintage Mens', 26200, 15, 24, '/storage/v1/admin-page/images/products/rotary-vintage-mens/feature/19yYfPehuOLtOFI0K4Yf.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 0, '2022-12-11 02:39:56', '2022-12-11 02:39:56', NULL),
(55, 'SP26', 'FOUETTÉ OR-FAIRY I – NỮ – KÍNH SAPPHIRE', 9555, 266, 25, '/storage/v1/admin-page/images/products/fouette-or-fairy-i-nu-kinh-sapphire/feature/3S45aKlU49BxEW2WjIIx.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-11 02:41:03', '2022-12-11 02:42:06', NULL),
(56, 'SP27', 'TISSOT T103.310.36.111.01 – NỮ – KÍNH SAPPHIRE', 4000, 60, 23, '/storage/v1/admin-page/images/products/tissot-t1033103611101-nu-kinh-sapphire/feature/7MzlZuH2V6ANCf44CgBU.webp', 'Mô tả ngắn', '<p style=\"text-align: center;\"><strong>Đ&acirc;y l&agrave; đồng hồ đẹp</strong></p>\n<p style=\"text-align: center;\"><strong><img src=\"/storage/photos/1/21-43-299_1.jpg\" alt=\"\" width=\"200\" height=\"200\" /></strong></p>', 1, '2022-12-11 02:44:27', '2022-12-11 02:44:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_category`
--

CREATE TABLE `product_category` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `product_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `product_category`
--

INSERT INTO `product_category` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(30, 102, 45, NULL, NULL),
(31, 102, 46, NULL, NULL),
(33, 102, 48, NULL, NULL),
(35, 104, 45, NULL, NULL),
(36, 105, 45, NULL, NULL),
(37, 105, 46, NULL, NULL),
(38, 107, 46, NULL, NULL),
(39, 105, 47, NULL, NULL),
(40, 106, 47, NULL, NULL),
(41, 104, 49, NULL, NULL),
(42, 106, 49, NULL, NULL),
(43, 107, 49, NULL, NULL),
(44, 104, 50, NULL, NULL),
(45, 105, 50, NULL, NULL),
(46, 107, 50, NULL, NULL),
(47, 102, 51, NULL, NULL),
(48, 103, 51, NULL, NULL),
(49, 105, 51, NULL, NULL),
(50, 103, 52, NULL, NULL),
(51, 105, 52, NULL, NULL),
(52, 103, 53, NULL, NULL),
(53, 105, 53, NULL, NULL),
(54, 107, 53, NULL, NULL),
(55, 103, 54, NULL, NULL),
(56, 106, 54, NULL, NULL),
(57, 103, 55, NULL, NULL),
(58, 103, 56, NULL, NULL),
(59, 105, 56, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_company`
--

CREATE TABLE `product_company` (
  `id` int NOT NULL,
  `company_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_short_name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_path` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_company`
--

INSERT INTO `product_company` (`id`, `company_name`, `company_short_name`, `avatar_path`, `description`, `created_at`, `updated_at`) VALUES
(20, 'Casio', 'Casio', '/storage/v1/admin-page/images/product-companies/casio/avatar/88VLbSraa08e3jWyQqru.webp', 'Mô tả hãng', '2022-10-09 10:13:27', '2022-12-11 02:16:48'),
(22, 'Citizen', 'Citizen', '/storage/v1/admin-page/images/product-companies/citizen/avatar/2ZUUVW2MD6yO9F1ocO2J.webp', 'Mô tả hãng', '2022-10-24 16:24:29', '2022-12-11 02:17:35'),
(23, 'G-Shock', 'G-Shock', '/storage/v1/admin-page/images/product-companies/g-shock/avatar/5BlyNR3jAzoVPT1tckWg.webp', 'G shork mo ta', '2022-10-29 14:22:47', '2022-12-11 02:18:19'),
(24, 'Seiko', 'Seiko', '/storage/v1/admin-page/images/product-companies/seiko/avatar/F8tsvkqjsIWhnEL2iANM.webp', 'Seiko mô tả', '2022-10-29 14:26:16', '2022-12-11 02:18:47'),
(25, 'Cadino', 'Cadino', '/storage/v1/admin-page/images/product-companies/cadino/avatar/xWHpbLvy0fu6KLxIocqO.webp', 'Cadino mô tả', '2022-10-29 14:28:12', '2022-12-11 02:19:13'),
(26, 'Orient', 'Orient', '/storage/v1/admin-page/images/product-companies/orient/avatar/kNJxfqY0cTt3jF2i3CJV.webp', 'Orient mô tả', '2022-12-11 02:19:44', '2022-12-11 02:19:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `image_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_image`
--

INSERT INTO `product_image` (`id`, `image_path`, `product_id`, `created_at`, `updated_at`) VALUES
(86, '/storage/photos/products/sda/detail/Q4wl2TpGT72t3SxkmQex.jpg', 34, '2022-10-24 14:18:40', '2022-10-24 14:18:40'),
(87, '/storage/photos/products/sda/detail/zZyRHoNE0QeVroSOc19L.jpg', 34, '2022-10-24 14:18:40', '2022-10-24 14:18:40'),
(88, '/storage/v1/admin-page/images/products/ádasd/detail/x4cmm37EnbC6HeMZ95mU.jpg', 35, '2022-10-24 14:26:34', '2022-10-24 14:26:34'),
(89, '/storage/v1/admin-page/images/products/ádasd/detail/UOS6SNS6rKq5AYmhNcB8.jpg', 35, '2022-10-24 14:26:34', '2022-10-24 14:26:34'),
(90, '/storage/v1/admin-page/images/products/ádasd/detail/QOUA4XViPqlH9V8bGvIT.jpg', 35, '2022-10-24 14:26:34', '2022-10-24 14:26:34'),
(91, '/storage/v1/admin-page/images/products/la-teasst/detail/eTunfyRLnGgTomBMcKao.jpg', 37, '2022-10-24 14:35:36', '2022-10-24 14:35:36'),
(92, '/storage/v1/admin-page/images/products/ten-test/detail/ZRlLcm6jobCKZQEhFWdj.jpg', 38, '2022-10-24 14:49:26', '2022-10-24 14:49:26'),
(93, '/storage/v1/admin-page/images/products/ten-test/detail/le44zBBRIHbLvKPqOpRH.jpg', 38, '2022-10-24 14:49:26', '2022-10-24 14:49:26'),
(94, '/storage/v1/admin-page/images/products/sp-test-01/detail/kasNJ9A6TahIdK2bGWRD.jpg', 39, '2022-10-24 16:09:34', '2022-10-24 16:09:34'),
(95, '/storage/v1/admin-page/images/products/sp-test-01/detail/nrFd8QOab1ql8MZ7iL10.jpg', 39, '2022-10-24 16:09:34', '2022-10-24 16:09:34'),
(96, '/storage/v1/admin-page/images/products/sp-test-01/detail/A9qQAv658bUOdxE3wUvz.png', 39, '2022-10-24 16:09:34', '2022-10-24 16:09:34'),
(97, '/storage/v1/admin-page/images/products/sp-test-01/detail/g2rKL6At3GyNsxDQ2gqu.jpg', 39, '2022-10-24 16:09:34', '2022-10-24 16:09:34'),
(98, '/storage/v1/admin-page/images/products/adasd/detail/41PgeB6awI2f5UcZ18Q0.jpg', 43, '2022-10-29 13:18:35', '2022-10-29 13:18:35'),
(105, '/storage/v1/admin-page/images/products/lan-chua-sua/detail/rrGLDnhNsKAQRG3x99tg.png', 33, '2022-10-29 13:57:29', '2022-10-29 13:57:29'),
(120, '/storage/v1/admin-page/images/products/mens-accurist-watch-with-white-dial-and-black-leather-strap-7287/detail/xWu04Jy4MEzuJ9JIbZmP.webp', 46, '2022-12-11 02:24:50', '2022-12-11 02:24:50'),
(121, '/storage/v1/admin-page/images/products/mens-accurist-watch-with-white-dial-and-black-leather-strap-7287/detail/700UJEzeQasNuBeDC0Ba.webp', 46, '2022-12-11 02:24:50', '2022-12-11 02:24:50'),
(122, '/storage/v1/admin-page/images/products/mens-accurist-watch-with-white-dial-and-black-leather-strap-7287/detail/xWvv41HD8s964l8pLLfN.webp', 46, '2022-12-11 02:24:50', '2022-12-11 02:24:50'),
(123, '/storage/v1/admin-page/images/products/mens-accurist-watch-with-white-dial-and-black-leather-strap-7287/detail/13z4BRIi1v8570La0sA2.webp', 46, '2022-12-11 02:24:50', '2022-12-11 02:24:50'),
(124, '/storage/v1/admin-page/images/products/adasd/detail/3dDH3k5ziXiSHJHEVhXW.webp', 47, '2022-12-11 02:25:45', '2022-12-11 02:25:45'),
(125, '/storage/v1/admin-page/images/products/adasd/detail/if50fXOYucc72PEodSiG.webp', 47, '2022-12-11 02:25:45', '2022-12-11 02:25:45'),
(126, '/storage/v1/admin-page/images/products/adasd/detail/E0y3d4YA4Jb2jVDConZG.webp', 47, '2022-12-11 02:25:45', '2022-12-11 02:25:45'),
(127, '/storage/v1/admin-page/images/products/swatch-black-rubber-strap-once-again-watch-gb743/detail/T5eVCPW7H9ba2OUyxSH4.jpg', 48, '2022-12-11 02:26:43', '2022-12-11 02:26:43'),
(128, '/storage/v1/admin-page/images/products/swatch-black-rubber-strap-once-again-watch-gb743/detail/P7eAsIY8Tfh3vpxylZJe.jpg', 48, '2022-12-11 02:26:43', '2022-12-11 02:26:43'),
(129, '/storage/v1/admin-page/images/products/swatch-black-rubber-strap-once-again-watch-gb743/detail/4fVgev0nSCaiyVVIEVHX.jpg', 48, '2022-12-11 02:26:43', '2022-12-11 02:26:43'),
(130, '/storage/v1/admin-page/images/products/sp-moi/detail/Tz0O1pseCYow3ndQnELm.jpg', 49, '2022-12-11 02:27:35', '2022-12-11 02:27:35'),
(131, '/storage/v1/admin-page/images/products/sp-moi/detail/HyoOA0GCj6D9VHhSQULK.jpg', 49, '2022-12-11 02:27:35', '2022-12-11 02:27:35'),
(132, '/storage/v1/admin-page/images/products/sp-moi/detail/3mYNHOrGoBv2bIpLsY09.jpg', 49, '2022-12-11 02:27:35', '2022-12-11 02:27:35'),
(133, '/storage/v1/admin-page/images/products/teslar-men-s-watch-tw-035/detail/rhVYIuQCROi1BZa2RHix.jpg', 50, '2022-12-11 02:29:29', '2022-12-11 02:29:29'),
(134, '/storage/v1/admin-page/images/products/teslar-men-s-watch-tw-035/detail/aXpbByha3SfyHdeOY24w.jpg', 50, '2022-12-11 02:29:29', '2022-12-11 02:29:29'),
(135, '/storage/v1/admin-page/images/products/teslar-men-s-watch-tw-035/detail/nG4shPEEHUkUmTJCmKzy.jpg', 50, '2022-12-11 02:29:29', '2022-12-11 02:29:29'),
(136, '/storage/v1/admin-page/images/products/g-shock-classics-layered-bezel-yellow-watch-ga-2110su-9aer/detail/oauTHiws4SWNYxuYr4Hs.webp', 51, '2022-12-11 02:32:13', '2022-12-11 02:32:13'),
(137, '/storage/v1/admin-page/images/products/g-shock-classics-layered-bezel-yellow-watch-ga-2110su-9aer/detail/BGyzI3fnUsb9tKhXpNb8.webp', 51, '2022-12-11 02:32:13', '2022-12-11 02:32:13'),
(138, '/storage/v1/admin-page/images/products/g-shock-classics-layered-bezel-yellow-watch-ga-2110su-9aer/detail/NuAgcardHMHpT2RYxy9Z.webp', 51, '2022-12-11 02:32:13', '2022-12-11 02:32:13'),
(139, '/storage/v1/admin-page/images/products/g-shock-classics-layered-bezel-yellow-watch-ga-2110su-9aer/detail/DOEqFgluOBoqqeP6jDAI.webp', 51, '2022-12-11 02:32:13', '2022-12-11 02:32:13'),
(140, '/storage/v1/admin-page/images/products/ben-sherman-mens-watch-with-blue-dial-and-blue-leather-strap-wb045u/detail/noQRtRzGQYJjzPWsXTdU.webp', 52, '2022-12-11 02:35:21', '2022-12-11 02:35:21'),
(141, '/storage/v1/admin-page/images/products/ben-sherman-mens-watch-with-blue-dial-and-blue-leather-strap-wb045u/detail/CJRLGnzfDaYjSOqNJOVJ.webp', 52, '2022-12-11 02:35:21', '2022-12-11 02:35:21'),
(142, '/storage/v1/admin-page/images/products/ben-sherman-mens-watch-with-blue-dial-and-blue-leather-strap-wb045u/detail/99KHZ79MdTCklLLLwV5Y.webp', 52, '2022-12-11 02:35:21', '2022-12-11 02:35:21'),
(143, '/storage/v1/admin-page/images/products/ben-sherman-mens-watch-with-blue-dial-and-blue-leather-strap-wb045u/detail/wSvRm86n9dnlxzIhNXAk.webp', 52, '2022-12-11 02:35:21', '2022-12-11 02:35:21'),
(144, '/storage/v1/admin-page/images/products/tissot-t0942101111100-nu-kinh-sapphire-quartz-pin/detail/Dr8dWGn3C338cibwC4Y4.webp', 53, '2022-12-11 02:37:43', '2022-12-11 02:37:43'),
(145, '/storage/v1/admin-page/images/products/tissot-t0942101111100-nu-kinh-sapphire-quartz-pin/detail/PGw3B7rQJzCic8tSB2Nm.webp', 53, '2022-12-11 02:37:43', '2022-12-11 02:37:43'),
(146, '/storage/v1/admin-page/images/products/tissot-t0942101111100-nu-kinh-sapphire-quartz-pin/detail/ZvLpfHVrO5Q1XpxYcXZM.webp', 53, '2022-12-11 02:37:43', '2022-12-11 02:37:43'),
(147, '/storage/v1/admin-page/images/products/rotary-vintage-mens/detail/jcLpNW7VdnvxUInbJBC7.webp', 54, '2022-12-11 02:39:56', '2022-12-11 02:39:56'),
(148, '/storage/v1/admin-page/images/products/rotary-vintage-mens/detail/AbhbahFTcjRUk0HwoAEr.webp', 54, '2022-12-11 02:39:56', '2022-12-11 02:39:56'),
(149, '/storage/v1/admin-page/images/products/rotary-vintage-mens/detail/TijOBrRT9drr7tAggJql.webp', 54, '2022-12-11 02:39:56', '2022-12-11 02:39:56'),
(150, '/storage/v1/admin-page/images/products/fouette-or-fairy-i-nu-kinh-sapphire/detail/gIdJUjvT5ds7IqLRy7J6.webp', 55, '2022-12-11 02:42:06', '2022-12-11 02:42:06'),
(151, '/storage/v1/admin-page/images/products/fouette-or-fairy-i-nu-kinh-sapphire/detail/O91DLcruStZhwC8BGYQD.webp', 55, '2022-12-11 02:42:06', '2022-12-11 02:42:06'),
(152, '/storage/v1/admin-page/images/products/fouette-or-fairy-i-nu-kinh-sapphire/detail/nALagzbDDM15PqAXPjA6.webp', 55, '2022-12-11 02:42:06', '2022-12-11 02:42:06'),
(153, '/storage/v1/admin-page/images/products/tissot-t1033103611101-nu-kinh-sapphire/detail/9YEa3V8jN9PhdvoPJekE.webp', 56, '2022-12-11 02:44:27', '2022-12-11 02:44:27'),
(154, '/storage/v1/admin-page/images/products/tissot-t1033103611101-nu-kinh-sapphire/detail/yLAqm9jbM8hcSlPFZOMu.webp', 56, '2022-12-11 02:44:27', '2022-12-11 02:44:27'),
(155, '/storage/v1/admin-page/images/products/tissot-t1033103611101-nu-kinh-sapphire/detail/jrweHN3eNfIVBxeB7DsO.webp', 56, '2022-12-11 02:44:27', '2022-12-11 02:44:27'),
(156, '/storage/v1/admin-page/images/products/guess-legacy-mens-watch-with-black-silicone-strap-w1048g2/detail/QNYDgfwbI2kWAGDxIIgg.webp', 45, '2022-12-11 02:46:24', '2022-12-11 02:46:24'),
(157, '/storage/v1/admin-page/images/products/guess-legacy-mens-watch-with-black-silicone-strap-w1048g2/detail/RnigsG24X8sM3NrPiOi3.webp', 45, '2022-12-11 02:46:24', '2022-12-11 02:46:24'),
(158, '/storage/v1/admin-page/images/products/guess-legacy-mens-watch-with-black-silicone-strap-w1048g2/detail/QdHX8ZEaIrnXCbx3Yroa.webp', 45, '2022-12-11 02:46:24', '2022-12-11 02:46:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'Quản trị cấp cao', 'QT cap cao', '2022-08-03 07:13:53', '2022-08-21 12:48:20'),
(2, 'admin', 'Quản trị viên', 'Quan tri vienco quyen sau qt cao cap', '2022-08-03 07:13:53', '2022-08-03 07:13:53'),
(3, 'content', 'Người chỉnh sửa nội dung', NULL, '2022-08-03 07:14:37', '2022-08-03 07:14:37'),
(4, 'designer', 'Nhà thiết kế', NULL, '2022-08-03 07:14:37', '2022-08-03 07:14:37'),
(5, 'VIP_customer', 'Khách hàng VIP', NULL, '2022-12-01 13:31:26', '2022-12-01 13:31:26'),
(6, 'customer', 'Khách hàng thường', NULL, '2022-12-01 13:32:38', '2022-12-01 13:32:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int NOT NULL,
  `employee_id` int NOT NULL,
  `title` text,
  `avatar_path` text,
  `short_description` text,
  `link` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `employee_id`, `title`, `avatar_path`, `short_description`, `link`, `created_at`, `updated_at`) VALUES
(2, 1, 'Swatch Black Rubber Strap Once Again Watch GB743', '/storage/v1/admin-page/images/sliders/swatch-black-rubber-strap-once-again-watch-gb743/avatar/af5ZEPMupnx6vta99ils.jpg', 'Sản phẩm cao cấp đến từ châu Âu', 'https://university-ecommerce.dev/products/detail/48', '2022-12-10 03:05:04', '2022-12-11 02:49:20'),
(3, 1, 'Siêu phẩm TESLAR MEN_S WATCH TW-035', '/storage/v1/admin-page/images/sliders/sieu-pham-teslar-men-s-watch-tw-035/avatar/1eO7siCkam8gyyNfqg79.webp', 'Đồng hồ mạ vàng cao cấp', 'https://university-ecommerce.dev/products/detail/50', '2022-12-10 03:27:18', '2022-12-11 02:50:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar_path` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_name` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `salary` int DEFAULT NULL,
  `active` int DEFAULT NULL,
  `id_card_front` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `id_card_back` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role_id`, `phone`, `avatar_path`, `display_name`, `gender`, `dob`, `address`, `salary`, `active`, `id_card_front`, `id_card_back`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Chưa xác định', '123456', 1, 'Chưa xác định', NULL, 'Chưa xác định', 0, '2022-12-14', 'Chưa xác định', 0, 0, NULL, NULL, '2022-12-07 15:23:15', '2022-12-07 15:23:15', NULL),
(1, 'superadmin@gmail.com', '$2y$10$JHK.2MTc9ORMmmlqoF.gg.SwDLnevVSj1oreHParu5PvcPEDOWqe6', 1, '0123456789', 'https://image.thanhnien.vn/w1024/Uploaded/2022/ifyiy/2022_01_04/a5ee06311886d2d88b97-981.jpg', 'Võ Ngọc Lân', 0, '2022-08-10', 'Số 10 tổ 36 Trung Kính, Cầu Giấy, Hà Nội', 0, 1, 'https://minhnguyenhn.com/wp-content/uploads/2017/01/tao-anh-cmtnn-2.png', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-08-23 01:05:46', '2022-12-09 10:49:41', NULL),
(48, 'admin@gmail.com', '$2y$10$h7.2s6K9Ii7f3pmDt582xuXbEWOGm4OJEB/Z.vM896rSKV2VnTO8C', 2, '01296987', 'https://blogcaodep.com/wp-content/uploads/2020/04/Side-Part-cho-khuon-mat-dai-mat-vuong-mat-trai-xoan.jpg', 'Đăng Nhân Viên', 0, '2022-12-16', 'Hà Nội, Việt Nam', 90000, 1, 'https://minhnguyenhn.com/wp-content/uploads/2017/01/tao-anh-cmtnn-2.png', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-06 17:08:46', '2022-12-11 02:52:00', NULL),
(50, 'khach1@gmail.com', '$2y$10$Fv5grCHfo2Uhv2XsdGzmieXienxbhv6B/g1sp37oKAxuPOQwk3/mK', 5, '0968655178', 'https://tocgiacaocap.com/upload/images/63c70f0264ac9cf2c5bd-3216(3).jpg', 'Khách 1', 1, '2022-12-02', 'ádasd', NULL, 1, 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-06 17:23:04', '2022-12-06 17:23:04', NULL),
(51, 'khach3@gmail.com', '$2y$10$Fv5grCHfo2Uhv2XsdGzmieXienxbhv6B/g1sp37oKAxuPOQwk3/mK', 6, '0259788589', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTm9YTjaQQ_dZnmodc5KP_TvaTqukQ2_Iq3HXGOOz4ci3MRg2NZIt7nNAoXrsZFfu_v_YQ&usqp=CAU', 'Trung Khách 3', 1, '2022-12-09', 'Hà Nội, Việt Nam', 0, 1, 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-06 17:27:33', '2022-12-11 02:56:58', NULL),
(53, 'khach2@gmail.com', '$2y$10$7q1dSiu.yM2Po01L0.FNoOtLRhO5MKglEaxa7rAXjvzL6xzD4kgBS', 6, '0123888999', 'https://mate.vn/images/cp_blog_post/12/goi-y-nhung-kieu-toc-dep-cho-mat-vuong-nang-khong-can-dung-dao-keo-mat-van-hoa-v-line.jpg', 'Lân Khách', 1, '2022-12-21', 'abc', 0, 1, 'https://minhnguyenhn.com/wp-content/uploads/2017/01/tao-anh-cmtnn-2.png', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-10 04:42:49', '2022-12-10 16:05:32', NULL),
(54, 'khach4@gmail.com', '$2y$10$Bz5..kx.pi2n06yceyqlf.BJkXwaH29RE4FCwdmZgigxwU0AwvRHm', 6, '09926254', 'https://lacongaithattuyet.vn/wp-content/uploads/2017/12/toc-ngan-xoan-don-song.jpg', 'Giang Khách', 1, '2022-12-15', 'Hà Nội, Việt Nam', 0, 1, 'https://minhnguyenhn.com/wp-content/uploads/2017/01/tao-anh-cmtnn-2.png', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-11 03:01:19', '2022-12-11 03:01:19', NULL),
(55, 'khach5@gmail.com', '$2y$10$Rx4DQygOBVPBYHrZgwj0UObEozQBoW6XXGDg2dijB9ZbcloCw8N1K', 6, '08458848', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY7r9GJc2YqNTTDhAdv1bP4sg0TjfQn1zzXmM-dCO-o9ogK_lR647pjZpulk71ApgVoh8&usqp=CAU', 'Luân Khách', 0, '2022-12-22', 'PTIT Hà Nội', 0, 1, 'https://minhnguyenhn.com/wp-content/uploads/2017/01/tao-anh-cmtnn-2.png', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-11 03:01:59', '2022-12-11 03:01:59', NULL),
(56, 'khach6@gmail.com', '$2y$10$4.19me/Fp1YIWT4ypdDIyeNxnFFyxHYQ.C5TzFyDPZEyE3Jp5Yhqy', 5, '0564595', 'https://www.tripnow.vn/wp-content/uploads/2017/10/kieu-toc-bob-xoan-mai-thua.jpg', 'Đạt Khách 6', 1, '2022-12-14', 'Văn phòng nhà A1', 0, 1, 'https://minhnguyenhn.com/wp-content/uploads/2017/01/tao-anh-cmtnn-2.png', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-11 03:02:57', '2022-12-11 03:02:57', NULL),
(57, 'admin2@gmail.com', '$2y$10$Tn4qWSpaVikIDze.IGnWKeyc/RjvNv6rpBrUOR/LbJnOgHeBSKKPC', 2, '05156484844', 'https://image-us.eva.vn/upload/2-2021/images/2021-04-10/my-nhan-nhat-khoe-anh-mat-hinh-vuong-nghe-ly-do-vua-thuong-vua-buon-cuoi-ruriko-kojima_7-1618047982-298-width660height660.jpg', 'Cường Admin', 0, '2022-12-14', 'Hà Nội, Việt Nam', 26556, 1, 'https://minhnguyenhn.com/wp-content/uploads/2017/01/tao-anh-cmtnn-2.png', 'https://cms.luatvietnam.vn/uploaded/Images/Original/2019/10/25/tay-not-ruoi-xoa-seo-co-phai-lam-lai-chung-minh-nhan-dan_2510140542.jpg', '2022-12-11 03:25:42', '2022-12-11 03:25:42', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_customers` (`customer_id`),
  ADD KEY `fk_order_emps` (`employee_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_odetail_prd` (`product_id`),
  ADD KEY `fk_odetail_order` (`order_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prd_prdcomp` (`product_company_id`);

--
-- Chỉ mục cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category_to_category` (`category_id`),
  ADD KEY `fk_product_category_to_product` (`product_id`);

--
-- Chỉ mục cho bảng `product_company`
--
ALTER TABLE `product_company`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prdimg_prd` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_role` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT cho bảng `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT cho bảng `product_company`
--
ALTER TABLE `product_company`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD CONSTRAINT `blogs_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_order_emps` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_orders_customers` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `fk_odetail_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_odetail_prd` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_prd_prdcomp` FOREIGN KEY (`product_company_id`) REFERENCES `product_company` (`id`);

--
-- Các ràng buộc cho bảng `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `fk_product_category_to_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `fk_product_category_to_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `product_image`
--
ALTER TABLE `product_image`
  ADD CONSTRAINT `fk_prdimg_prd` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
