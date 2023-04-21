-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2023 at 11:29 AM
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
-- Database: `mutivendor_7`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `attributes_sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes_colour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attributes_price` double(9,2) DEFAULT NULL,
  `attributes_stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `product_id`, `attributes_sku`, `attributes_colour`, `attributes_size`, `attributes_price`, `attributes_stock`, `created_at`, `updated_at`) VALUES
(1, 2, '5421', 'Blue', '7', 250.00, 7, '2022-09-20 12:25:40', '2022-09-20 12:25:40');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_image`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', 'images/slider/8151-php7FD0.tmp.webp', '2022-09-05 07:41:21', '2023-03-10 17:12:39'),
(2, 'Banner 2', 'images/slider/6051-phpC333.tmp.webp', '2022-09-05 07:41:30', '2023-03-10 17:12:57'),
(3, 'Banner 3', 'images/slider/8265-phpF996.tmp.webp', '2022-09-05 07:41:56', '2023-03-10 17:13:11');

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billing_addresses`
--

INSERT INTO `billing_addresses` (`id`, `user_id`, `order_id`, `name`, `email`, `mobile`, `address`, `country`, `city`, `state`, `zip`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2022-09-20 09:53:04', '2022-09-20 09:53:04'),
(2, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(3, 1, 1, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(4, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', 'dasdasdsad', 'sgdgasiudgd', NULL, 'sdsad', 'bangladesh', 'dasdsa', '2022-11-25 14:21:03', '2022-11-25 14:21:03'),
(5, 1, 2, 'Alamin', 'alamin5230@yahoo.com.sg', 'dasdasdsad', 'sgdgasiudgd', NULL, 'sdsad', 'bangladesh', 'dasdsa', '2022-11-25 14:21:03', '2022-11-25 14:21:03'),
(6, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:32:37', '2023-01-06 12:32:37'),
(7, 1, 3, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:32:37', '2023-01-06 12:32:37'),
(8, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(9, 1, 4, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(10, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:34:56', '2023-01-06 12:34:56'),
(11, 1, 5, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:34:56', '2023-01-06 12:34:56'),
(12, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:40:05', '2023-01-06 12:40:05'),
(13, 1, 6, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:40:05', '2023-01-06 12:40:05'),
(14, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:47:56', '2023-01-06 12:47:56'),
(15, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:48:30', '2023-01-06 12:48:30'),
(16, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:49:06', '2023-01-06 12:49:06'),
(17, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:51:14', '2023-01-06 12:51:14'),
(18, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:52:12', '2023-01-06 12:52:12'),
(19, 3, 7, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka Bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:52:12', '2023-01-06 12:52:12'),
(20, 1, 0, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'sdsadsad', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-12 05:29:05', '2023-01-12 05:29:05'),
(21, 1, 8, 'Alamin', 'alamin5230@yahoo.com.sg', '+882147596', 'sdsadsad', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-12 05:29:05', '2023-01-12 05:29:05'),
(22, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:50:01', '2023-01-19 12:50:01'),
(23, 3, 9, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:50:01', '2023-01-19 12:50:01'),
(24, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:51:02', '2023-01-19 12:51:02'),
(25, 3, 10, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:51:02', '2023-01-19 12:51:02'),
(26, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:52:04', '2023-01-19 12:52:04'),
(27, 3, 11, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:52:04', '2023-01-19 12:52:04'),
(28, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:54:18', '2023-01-19 12:54:18'),
(29, 3, 12, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:54:18', '2023-01-19 12:54:18'),
(30, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 13:29:54', '2023-01-19 13:29:54'),
(31, 3, 13, 'karim', 'karim@gmail.com', '+9874561234', 'asdasd', NULL, 'Dhaka', 'bangladesh', '7845', '2023-01-19 13:29:55', '2023-01-19 13:29:55'),
(32, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'sdsadsad', NULL, 'Dhaka', 'bangladesh', 'sdsada', '2023-01-19 13:32:16', '2023-01-19 13:32:16'),
(33, 3, 14, 'karim', 'karim@gmail.com', '+9874561234', 'sdsadsad', NULL, 'Dhaka', 'bangladesh', 'sdsada', '2023-01-19 13:32:16', '2023-01-19 13:32:16'),
(34, 3, 0, 'karim', 'karim@gmail.comdas', '+9874561234', 'ytfy', NULL, 'sdasd', 'bangladesh', 'sdsad', '2023-01-19 14:45:37', '2023-01-19 14:45:37'),
(35, 3, 15, 'karim', 'karim@gmail.comdas', '+9874561234', 'ytfy', NULL, 'sdasd', 'bangladesh', 'sdsad', '2023-01-19 14:45:37', '2023-01-19 14:45:37'),
(36, 3, 0, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-19 23:08:11', '2023-01-19 23:08:11'),
(37, 3, 16, 'karim', 'karim@gmail.com', '+9874561234', 'Dhaka', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-19 23:08:11', '2023-01-19 23:08:11'),
(38, 3, 0, 'Hector Brown', 'hectortroybrown@gmail.com', '0817918771', '40 goodyear, Goodyear square', NULL, 'Nelspruit', 'bangladesh', '1200', '2023-02-07 01:15:58', '2023-02-07 01:15:58'),
(39, 3, 17, 'Hector Brown', 'hectortroybrown@gmail.com', '0817918771', '40 goodyear, Goodyear square', NULL, 'Nelspruit', 'bangladesh', '1200', '2023-02-07 01:15:58', '2023-02-07 01:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_thumbnail_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `brand_approval` enum('Approved','Unapproved') COLLATE utf8mb4_unicode_ci DEFAULT 'Unapproved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `user_id`, `brand_name`, `brand_phone`, `brand_address`, `brand_image`, `brand_thumbnail_image`, `top_brand`, `brand_status`, `brand_approval`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pran', '+880164785412', 'Dhaka Bangladesh', 'images/brands/387-php9E68.tmp.png', NULL, NULL, 'Active', 'Approved', '2022-09-04 13:15:21', '2022-09-04 13:15:21'),
(2, 2, 'Pampers', '+852136', 'Dhaka Bangladesh', 'images/brands/1816-phpD052.tmp.jpg', 'images/brands/2976-phpF7C0.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:08:25', '2022-09-05 09:26:08'),
(3, 2, 'Hitachi', '+8521361', 'Dhaka Bangladesh', 'images/brands/2496-php4E3E.tmp.jpg', 'images/brands/1332-php69D8.tmp.png', NULL, 'Active', 'Approved', '2022-09-05 08:08:57', '2022-09-05 09:23:21'),
(4, 2, 'Apple', '+85213612', 'Dhaka Bangladesh', 'images/brands/8083-php88D7.tmp.jpg', 'images/brands/2773-php1FF6.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:09:12', '2022-09-05 09:18:40'),
(5, 2, 'Huawei', '+852136125', 'Dhaka Bangladesh', 'images/brands/8649-phpF453.tmp.jpg', 'images/brands/3638-phpAA5D.tmp.webp', NULL, 'Active', 'Approved', '2022-09-05 08:09:39', '2022-09-05 09:23:37'),
(6, 2, 'Denim', '+8521361258', 'Dhaka Bangladesh', 'images/brands/8720-php7B47.tmp.jpg', 'images/brands/8029-phpA7C4.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:10:14', '2022-09-05 09:20:20'),
(7, 2, 'Nike', '+8521361257', 'Dhaka Bangladesh', 'images/brands/6108-phpAB51.tmp.jpg', 'images/brands/1235-php228B.tmp.jpeg', NULL, 'Active', 'Approved', '2022-09-05 08:10:26', '2022-09-05 09:25:13'),
(8, 2, 'One Plus', '+85213612577', 'Dhaka Bangladesh', 'images/brands/7870-phpDCE1.tmp.jpg', 'images/brands/1378-phpB47C.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:10:39', '2022-09-05 09:25:51'),
(9, 2, 'Axe', '+85213612573', 'Dhaka Bangladesh', 'images/brands/7123-php3265.tmp.jpg', 'images/brands/8970-phpB1C9.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:11:01', '2022-09-05 09:19:17'),
(10, 2, 'HTC', '+852136125730', 'Dhaka Bangladesh', 'images/brands/5848-php92F5.tmp.jpg', 'images/brands/4106-phpDDC.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:11:26', '2022-09-05 09:22:57'),
(11, 2, 'Addidas', '+8521361257302', 'Dhaka Bangladesh', 'images/brands/2875-phpEB66.tmp.jpg', 'images/brands/1046-phpDB4F.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:11:48', '2022-09-05 09:14:00'),
(12, 2, 'Honda', '+8521361257305', 'Dhaka Bangladesh', 'images/brands/4258-php2D72.tmp.jpg', 'images/brands/8447-phpF084.tmp.jpeg', NULL, 'Active', 'Approved', '2022-09-05 08:12:05', '2022-09-05 09:21:44'),
(13, 2, 'MAC', '+8521361257304', 'Dhaka Bangladesh', 'images/brands/877-phpC146.tmp.jpg', 'images/brands/9509-php78EB.tmp.webp', NULL, 'Active', 'Approved', '2022-09-05 08:12:43', '2022-09-05 09:24:30'),
(14, 2, 'Yamaha', '+8521361257306', 'Dhaka Bangladesh', 'images/brands/5846-php93.tmp.jpg', 'images/brands/2384-phpC3CD.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:12:59', '2022-09-05 09:28:06'),
(15, 2, 'Puma', '+8521361257309', 'Dhaka Bangladesh', 'images/brands/4901-php3E68.tmp.jpg', 'images/brands/4624-php5AF1.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:13:15', '2022-09-05 09:26:34'),
(16, 2, 'Philips', '+85213612573095', 'Dhaka Bangladesh', 'images/brands/3544-phpB4C2.tmp.jpg', 'images/brands/3117-php27CA.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:13:45', '2022-09-05 09:26:20'),
(17, 2, 'Suzuki', '+85213612573098', 'Dhaka Bangladesh', 'images/brands/8705-phpF8FF.tmp.jpg', 'images/brands/1013-php66F5.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:14:03', '2022-09-05 09:27:42'),
(18, 2, 'Mi', '+85213612573091', 'Dhaka Bangladesh', 'images/brands/7245-php308B.tmp.jpg', 'images/brands/8092-phpEAE0.tmp.webp', NULL, 'Active', 'Approved', '2022-09-05 08:14:17', '2022-09-05 09:24:59'),
(19, 2, 'Asus', '+85213612573092', 'Dhaka Bangladesh', 'images/brands/1993-php6596.tmp.jpg', 'images/brands/8360-php819F.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:14:31', '2022-09-05 09:19:04'),
(20, 2, 'Acer', '+85213612573093', 'Dhaka Bangladesh', 'images/brands/3234-php9D70.tmp.jpg', 'images/brands/6648-php8EBC.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:14:45', '2022-09-05 09:08:13'),
(21, 2, 'Sony', '+85213612573094', 'Dhaka Bangladesh', 'images/brands/6652-phpD6F0.tmp.jpg', 'images/brands/1169-phpFA6F.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:15:00', '2022-09-05 09:27:14'),
(22, 2, 'Loreal', '+897456', 'Dhaka Bangladesh', 'images/brands/1204-php8E7A.tmp.jpg', 'images/brands/9182-php3C10.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:15:47', '2022-09-05 09:24:14'),
(23, 2, 'Lenovo', '+8974561', 'Dhaka Bangladesh', 'images/brands/1593-phpC376.tmp.jpg', 'images/brands/524-phpF5BF.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:16:00', '2022-09-05 09:23:56'),
(24, 2, 'Nokia', '+89745612', 'Dhaka Bangladesh', 'images/brands/4174-phpFB01.tmp.jpg', 'images/brands/3463-php7530.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:16:14', '2022-09-05 09:25:35'),
(25, 2, 'Toyota', '+897456123', 'Dhaka Bangladesh', 'images/brands/3819-php2F03.tmp.jpg', 'images/brands/8087-php9549.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:16:28', '2022-09-05 09:27:54'),
(26, 2, 'Hp', '+8974561234', 'Dhaka Bangladesh', 'images/brands/3788-php798A.tmp.jpg', 'images/brands/5438-php1F36.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:16:47', '2022-09-05 09:21:56'),
(27, 2, 'Samsung', '+89745612345', 'Dhaka Bangladesh', 'images/brands/6057-phpAD3D.tmp.jpg', 'images/brands/2989-phpB6FC.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:17:00', '2022-09-05 09:26:57'),
(28, 2, 'Dell', '+8974561254', 'Dhaka Bangladesh', 'images/brands/5274-php10CC.tmp.jpg', 'images/brands/3082-php5FCD.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:17:25', '2022-09-05 09:20:01'),
(30, 2, 'Dove', '+789456123', 'Dhaka Bangladesh', 'images/brands/9643-php73BA.tmp.jpg', 'images/brands/2310-phpE839.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:18:56', '2022-09-05 09:20:37'),
(31, 2, 'Canon', '+7894561234', 'Dhaka Bangladesh', 'images/brands/1682-phpA4ED.tmp.jpg', 'images/brands/5464-php267D.tmp.jpg', NULL, 'Active', 'Approved', '2022-09-05 08:19:09', '2022-09-05 09:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `brand_commissions`
--

CREATE TABLE `brand_commissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_commissions`
--

INSERT INTO `brand_commissions` (`id`, `brand_id`, `vendor_id`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 12, 2, 5, '2022-09-16 18:42:02', '2022-09-16 18:42:02'),
(2, 11, 2, 10, '2023-01-14 09:18:16', '2023-01-14 09:18:16');

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE `campaigns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `title`, `start_date`, `end_date`, `image`, `status`, `discount`, `month`, `year`, `created_at`, `updated_at`) VALUES
(1, 'Super Sale', '09-10-2022', '09-30-2022', 'images/campaign/2221-php2DD1.tmp.jpg', 'Active', '50', 'September', '2022', '2022-09-09 14:26:18', '2022-09-09 14:26:18'),
(2, 'Flash Sale', '09-10-2022', '09-30-2022', 'images/campaign/6150-phpB5F4.tmp.jpg', 'Active', '50', 'September', '2022', '2022-09-09 14:29:03', '2022-09-09 14:29:03'),
(3, 'Mega Sale', '09-10-2022', '09-30-2022', 'images/campaign/7333-php81D0.tmp.jpg', 'Active', '70', 'September', '2022', '2022-09-09 14:29:56', '2022-09-09 14:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `campaign_products`
--

CREATE TABLE `campaign_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `campaign_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `campaign_products`
--

INSERT INTO `campaign_products` (`id`, `campaign_id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '2', '2022-09-09 14:49:46', '2022-09-09 14:49:46'),
(2, '1', '14', '2', '2022-09-09 14:50:01', '2022-09-09 14:50:01'),
(3, '1', '10', '2', '2022-09-09 14:50:16', '2022-09-09 14:50:16'),
(4, '1', '3', '2', '2022-09-09 14:50:29', '2022-09-09 14:50:29'),
(5, '3', '20', '2', '2022-09-09 14:53:01', '2022-09-09 14:53:01'),
(6, '1', '2', '2', '2023-01-06 14:44:02', '2023-01-06 14:44:02');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pro_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_colour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pro_price` double(9,2) DEFAULT NULL,
  `pro_quantity` int(11) NOT NULL DEFAULT 0,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `pro_id`, `brand_id`, `category_id`, `pro_name`, `pro_code`, `pro_colour`, `pro_size`, `pro_price`, `pro_quantity`, `user_email`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'Jp23ldNBOsbrFO3kFz40aXRqTqwSyviYFqcoYzvQ', NULL, NULL),
(2, 12, 6, 2, 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', '9658', NULL, NULL, 3000.00, 1, NULL, 'Jp23ldNBOsbrFO3kFz40aXRqTqwSyviYFqcoYzvQ', NULL, NULL),
(4, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'EAI4brIb4Yd54yilvlJIxfYu3ZfmPFgpJRY8brnt', NULL, '2022-09-17 17:11:56'),
(5, 12, 6, 2, 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', '9658', NULL, NULL, 3000.00, 1, NULL, 'EAI4brIb4Yd54yilvlJIxfYu3ZfmPFgpJRY8brnt', NULL, '2022-09-17 17:02:48'),
(6, 16, 11, 2, 'Adidas Women\'s Parma 16 Shorts', '7452', NULL, NULL, 1000.00, 1, NULL, 'EAI4brIb4Yd54yilvlJIxfYu3ZfmPFgpJRY8brnt', NULL, NULL),
(7, 14, 11, 2, 'Adidas Team Force Deodorant Body Spray For Men', '9854', NULL, NULL, 500.00, 1, NULL, 'EAI4brIb4Yd54yilvlJIxfYu3ZfmPFgpJRY8brnt', NULL, NULL),
(8, 19, 6, 2, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '78521', NULL, NULL, 5000.00, 1, NULL, 'EAI4brIb4Yd54yilvlJIxfYu3ZfmPFgpJRY8brnt', NULL, NULL),
(9, 17, 6, 2, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '7894', NULL, NULL, 2200.00, 1, NULL, 'EAI4brIb4Yd54yilvlJIxfYu3ZfmPFgpJRY8brnt', NULL, NULL),
(13, 18, 6, 2, 'Anne Klein Women\'s Classic V-Neck Faux Wrap Dress', '7845', NULL, NULL, 4000.00, 1, NULL, 'ybfAfP25M3svC52NF4vuzQuoH6sTILVN4LpT9AG4', NULL, NULL),
(14, 19, 6, 2, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '78521', NULL, NULL, 5000.00, 1, NULL, 'ybfAfP25M3svC52NF4vuzQuoH6sTILVN4LpT9AG4', NULL, NULL),
(15, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'ybfAfP25M3svC52NF4vuzQuoH6sTILVN4LpT9AG4', NULL, NULL),
(16, 15, 15, 6, 'Men\'s Running Shoes Non Slip Athletic Tennis Walking Blade Type Sneakers', '9632', NULL, NULL, 3000.00, 1, NULL, 'ybfAfP25M3svC52NF4vuzQuoH6sTILVN4LpT9AG4', NULL, NULL),
(17, 21, 15, 6, 'Under Armour Men\'s Charged Assert 9 Running Shoe', '8547', NULL, NULL, 2700.00, 1, NULL, 'ybfAfP25M3svC52NF4vuzQuoH6sTILVN4LpT9AG4', NULL, NULL),
(18, 6, 26, 7, 'HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display', '8521', NULL, NULL, 40000.00, 1, NULL, 'ybfAfP25M3svC52NF4vuzQuoH6sTILVN4LpT9AG4', NULL, NULL),
(19, 5, 4, 7, 'Apple Magic Keyboard', '7452', NULL, NULL, 3200.00, 1, NULL, 'ybfAfP25M3svC52NF4vuzQuoH6sTILVN4LpT9AG4', NULL, NULL),
(41, 20, 6, 2, 'Calvin Klein Men\'s Slim Fit Suit Separates', '8547', NULL, NULL, 7200.00, 4, NULL, 'kgt5XB2BW5F0bbapC3HOvmMHvyTnGs3tfM45DGOv', NULL, '2022-09-18 15:30:10'),
(45, 22, 2, 13, 'Winnie the Pooh Hooded Towel for Baby', '785412', NULL, NULL, 2000.00, 1, NULL, 'kgt5XB2BW5F0bbapC3HOvmMHvyTnGs3tfM45DGOv', NULL, NULL),
(46, 29, 8, 10, 'OnePlus 7 (128GB/256GB storage, no card slot)', '3654', NULL, NULL, 45000.00, 1, NULL, 'kgt5XB2BW5F0bbapC3HOvmMHvyTnGs3tfM45DGOv', NULL, NULL),
(47, 28, 8, 10, 'OnePlus 8 12GB RAM+256GB Storage', '32145', NULL, NULL, 57000.00, 1, NULL, 'kgt5XB2BW5F0bbapC3HOvmMHvyTnGs3tfM45DGOv', NULL, NULL),
(50, 20, 6, 2, 'Calvin Klein Men\'s Slim Fit Suit Separates', '8547', NULL, NULL, 7200.00, 1, NULL, 'icQGfTxKrHTEGfDtatAQy2EumtnFcgwBn1ITdCvK', NULL, NULL),
(51, 19, 6, 2, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '78521', NULL, NULL, 5000.00, 1, NULL, 'icQGfTxKrHTEGfDtatAQy2EumtnFcgwBn1ITdCvK', NULL, NULL),
(52, 17, 6, 2, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '7894', NULL, NULL, 2200.00, 1, NULL, 'icQGfTxKrHTEGfDtatAQy2EumtnFcgwBn1ITdCvK', NULL, NULL),
(56, 14, 11, 2, 'Adidas Team Force Deodorant Body Spray For Men', '9854', NULL, NULL, 500.00, 1, NULL, 'Ma6qYxlSwEeL6hEAxiGHktcXr9O1GIX7R0XgMBZb', NULL, NULL),
(64, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'WNBEsNY8WZsbdcfzD4PCSw97EkqYHG4uTwtCaiIA', NULL, NULL),
(68, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 2, NULL, 'mTfE0UtBoXXt6rTrddb1R1NcWylLZNeRdk7SqJKd', NULL, '2023-01-06 14:33:55'),
(69, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'Wy3S2oKwkGDEW6Q76aHADejpnetnkJvup8waCaM7', NULL, NULL),
(70, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'oeSl9gUz8PXN5Up1x8KkMGThgKLfzQ9I0LQPIyTz', NULL, NULL),
(71, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 2, NULL, 'Puh7r7W2hV1Q8y37mwxPRJSqZeWnnsyKhJcthYpI', NULL, '2023-01-19 12:51:33'),
(72, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'OHsGJCVI6uvkFKrA6Pc2wH6ixCjwRfO8G9bFOa16', NULL, NULL),
(73, 12, 6, 2, 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', '9658', NULL, NULL, 3000.00, 1, NULL, 'OHsGJCVI6uvkFKrA6Pc2wH6ixCjwRfO8G9bFOa16', NULL, NULL),
(74, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'oZEd6lVZWv63snY2jCuthjshpLsli8ehZQfBNnjq', NULL, NULL),
(75, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, 'oZEd6lVZWv63snY2jCuthjshpLsli8ehZQfBNnjq', NULL, NULL),
(76, 11, 28, 7, 'Dell Inspiron 15 3511 15.6 Inch Laptop, Full HD LED Non-Touch WVA Display - Intel Core i3-1115G4, 8GB DDR4 RAM, 256GB SSD', '4561', NULL, NULL, 28000.00, 1, NULL, 'oZEd6lVZWv63snY2jCuthjshpLsli8ehZQfBNnjq', NULL, NULL),
(77, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'oZEd6lVZWv63snY2jCuthjshpLsli8ehZQfBNnjq', NULL, NULL),
(78, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'qXvPkT8p6WZmrP5bpaeUmj8VRBQnt12mhP9vbda6', NULL, NULL),
(79, 19, 6, 2, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '78521', NULL, NULL, 5000.00, 1, NULL, 'vePYWIIjpOsNiT67VIatcIfVTToqefkn0sc3FXEj', NULL, '2023-01-19 14:47:46'),
(80, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'edx2cy1QkQklJODQ3azE1TbpMcNvLijauabwSg8l', NULL, NULL),
(81, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, 'edx2cy1QkQklJODQ3azE1TbpMcNvLijauabwSg8l', NULL, NULL),
(83, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'WQlWHzpPNxcMbLgHSmaujPSjvn3DiTy4p71PgrbK', NULL, NULL),
(84, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, 'kFl94JeWdAC6AZHHLlXUYaeVOmDZXxYPG1A37coT', NULL, NULL),
(85, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'kFl94JeWdAC6AZHHLlXUYaeVOmDZXxYPG1A37coT', NULL, NULL),
(86, 14, 11, 2, 'Adidas Team Force Deodorant Body Spray For Men', '9854', NULL, NULL, 500.00, 1, NULL, 'kFl94JeWdAC6AZHHLlXUYaeVOmDZXxYPG1A37coT', NULL, NULL),
(87, 16, 11, 2, 'Adidas Women\'s Parma 16 Shorts', '7452', NULL, NULL, 1000.00, 1, NULL, 'kFl94JeWdAC6AZHHLlXUYaeVOmDZXxYPG1A37coT', NULL, NULL),
(88, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, '3Yc8YGas7txgqaIcHhHrJKTPICV5Zec9ag5L3him', NULL, NULL),
(89, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, '3Yc8YGas7txgqaIcHhHrJKTPICV5Zec9ag5L3him', NULL, NULL),
(90, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'YPd0bcQFyv0LbaYbEu3QhMzSmfZlE7ibLEQeHUbo', NULL, NULL),
(91, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, 'YPd0bcQFyv0LbaYbEu3QhMzSmfZlE7ibLEQeHUbo', NULL, NULL),
(92, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, 'WQlWHzpPNxcMbLgHSmaujPSjvn3DiTy4p71PgrbK', NULL, NULL),
(93, 6, 26, 7, 'HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display', '8521', NULL, NULL, 40000.00, 1, NULL, 'WQlWHzpPNxcMbLgHSmaujPSjvn3DiTy4p71PgrbK', NULL, NULL),
(95, 19, 6, 2, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '78521', NULL, NULL, 5000.00, 2, NULL, 'w8AMU3YOFqab0YbStgpXyQ3qKPUkQ4Q9uA9KhQDe', NULL, '2023-01-19 23:06:26'),
(113, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'pzaJehJWbe6Msq4njfWeFGPU4VCCVqhIzgkkC4Nk', NULL, NULL),
(116, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, 'yzsqyZfA55tWSD15PpphJxm9VTbieT10i6oEf1eo', NULL, NULL),
(117, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'yzsqyZfA55tWSD15PpphJxm9VTbieT10i6oEf1eo', NULL, NULL),
(118, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'yzsqyZfA55tWSD15PpphJxm9VTbieT10i6oEf1eo', NULL, NULL),
(127, 10, 4, 5, 'Apple TV 4K', '7894', NULL, NULL, 40000.00, 1, NULL, 'yIvGwvonjKvqFjlA5x3omCxQJYlq0UvSqkd4SlLB', NULL, NULL),
(136, 9, 14, 9, 'Yamaha Thunderbird 350', '8520', NULL, NULL, 320000.00, 1, NULL, 'plahmreXNA0oZnUidbTKLvQyYHvNaqtVDs3pphQr', NULL, NULL),
(143, 8, 4, 7, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '78945', NULL, NULL, 95000.00, 1, NULL, 'jneZ3LokYHhdRBi4P9ximUjoS28eTIBg0Lo5eeyH', NULL, NULL),
(145, 3, 8, 10, 'OnePlus 8T 5G KB2000 128GB 8GB RAM International Version', '4564', NULL, NULL, 20000.00, 1, NULL, 'TbMesynkxlUSELP0EFEfqgpqhkSaFfGAEiDfMStZ', NULL, '2023-02-03 07:14:53'),
(150, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, '86Jmla1wI74bhj14meujBGCiR0pb7vLRZFOsfZWx', NULL, NULL),
(151, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'hKHx4BPOivtI9qA2voiaryVpmtcWJIpG8OJhXyIe', NULL, NULL),
(152, 4, 7, 6, 'Nike Men \'Mercurial Superfly 7 Elite Firm Ground Football Shoe', '9654', NULL, NULL, 4500.00, 1, NULL, 'l6t8G3DWNBjSc74FBAbAkRBTY19yl4c5TFi3HPEc', NULL, NULL),
(153, 9, 14, 9, 'Yamaha Thunderbird 350', '8520', NULL, NULL, 320000.00, 1, NULL, 'eUzXv50HO7ZXt6NxotP0maVCRZahzTKCpNAljdDJ', NULL, NULL),
(155, 11, 28, 7, 'Dell Inspiron 15 3511 15.6 Inch Laptop, Full HD LED Non-Touch WVA Display - Intel Core i3-1115G4, 8GB DDR4 RAM, 256GB SSD', '4561', NULL, NULL, 28000.00, 1, NULL, 'eyFXhXy2kmUNYFqQoyeRmzCYhl8NMPmN6K4K4pqE', NULL, NULL),
(157, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'nRKCySNEXVUOJsaRzrKYpa71Kd83CDwKGsvEp1zs', NULL, NULL),
(158, 12, 6, 2, 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', '9658', NULL, NULL, 3000.00, 1, NULL, 'nRKCySNEXVUOJsaRzrKYpa71Kd83CDwKGsvEp1zs', NULL, NULL),
(159, 14, 11, 2, 'Adidas Team Force Deodorant Body Spray For Men', '9854', NULL, NULL, 500.00, 1, NULL, 'nRKCySNEXVUOJsaRzrKYpa71Kd83CDwKGsvEp1zs', NULL, NULL),
(168, 7, 7, 2, 'Rb3030 Outdoorsman I Aviator Sunglasses', '78954', NULL, NULL, 500.00, 1, NULL, 'covMwBhI97eSrMQHsBoGOBnVsUzRhTQR7M4OgfPB', NULL, NULL),
(169, 12, 6, 2, 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', '9658', NULL, NULL, 3000.00, 1, NULL, 'covMwBhI97eSrMQHsBoGOBnVsUzRhTQR7M4OgfPB', NULL, NULL),
(170, 14, 11, 2, 'Adidas Team Force Deodorant Body Spray For Men', '9854', NULL, NULL, 500.00, 1, NULL, 'covMwBhI97eSrMQHsBoGOBnVsUzRhTQR7M4OgfPB', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display_homepage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`, `top_category`, `display_homepage`, `created_at`, `updated_at`) VALUES
(1, 'sports', 'images/category/5310-phpD2E1.tmp.jpg', '1', '0', '2022-09-04 13:14:31', '2022-09-05 06:54:09'),
(2, 'Fashion', 'images/category/1122-php63AB.tmp.jpg', '1', '1', '2022-09-05 06:53:40', '2022-09-05 06:53:40'),
(4, 'Furniture', 'images/category/4073-phpC03C.tmp.jpg', '1', '1', '2022-09-05 06:56:15', '2022-09-05 06:56:15'),
(5, 'Electronics', 'images/category/5460-phpB105.tmp.jpg', '1', '1', '2022-09-05 06:57:17', '2022-09-05 06:57:17'),
(6, 'Shoes', 'images/category/7-phpF790.tmp.jpg', '1', NULL, '2022-09-05 06:58:40', '2022-09-05 06:58:40'),
(7, 'Computer & Accessories', 'images/category/5696-phpDAFC.tmp.jpg', '1', NULL, '2022-09-05 06:59:38', '2022-09-05 06:59:38'),
(8, 'Beverages', NULL, NULL, NULL, '2022-09-05 07:05:08', '2022-09-05 07:05:08'),
(9, 'Automobile & Motorbike', NULL, NULL, NULL, '2022-09-05 07:05:45', '2022-09-05 07:05:45'),
(10, 'Smart Phones', NULL, NULL, NULL, '2022-09-05 07:17:39', '2022-09-05 07:17:39'),
(11, 'Camera & Photo', NULL, NULL, NULL, '2022-09-05 07:18:04', '2022-09-05 07:18:04'),
(12, 'Cooking', NULL, NULL, NULL, '2022-09-05 07:18:31', '2022-09-05 07:18:31'),
(13, 'Kids & Toy', NULL, NULL, NULL, '2022-09-05 07:20:28', '2022-09-05 07:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `product_id`, `session_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'zVCTZwqV1CboiyLcLTFEOFMsNpn9TG37uzpd8qqs', '1', '2022-09-04 16:30:40', '2022-09-04 16:30:40'),
(5, 7, 'xNgY92KO6qpkBYCa89LqHGyE4K99moTf5zgd9BeZ', '1', '2022-09-09 16:14:37', '2022-09-09 16:14:37'),
(6, 18, 'icQGfTxKrHTEGfDtatAQy2EumtnFcgwBn1ITdCvK', '1', '2022-09-20 09:43:57', '2022-09-20 09:43:57'),
(7, 8, 'WQlWHzpPNxcMbLgHSmaujPSjvn3DiTy4p71PgrbK', '1', '2023-01-19 14:50:26', '2023-01-19 14:50:26'),
(8, 6, 'zv80MEbDRt3ZmVhDRzVz7tAqMqtrddC7VSFsuLJ8', '1', '2023-01-19 15:22:15', '2023-01-19 15:22:15'),
(9, 10, '5ISYjkTTRRAlhHjrsCP2HJtlWePfn4gFblb7BiOv', '1', '2023-01-19 15:29:16', '2023-01-19 15:29:16'),
(10, 1, 'yzsqyZfA55tWSD15PpphJxm9VTbieT10i6oEf1eo', '1', '2023-01-20 01:11:21', '2023-01-20 01:11:21'),
(13, 3, 'MUVjt0rQRM3i2JvY8Lo8MZAglHwU4CSQn466Gvj0', '1', '2023-01-20 08:15:28', '2023-01-20 08:15:28'),
(14, 11, 'jneZ3LokYHhdRBi4P9ximUjoS28eTIBg0Lo5eeyH', '1', '2023-02-03 05:28:46', '2023-02-03 05:28:46'),
(15, 3, 'TbMesynkxlUSELP0EFEfqgpqhkSaFfGAEiDfMStZ', '1', '2023-02-03 07:14:28', '2023-02-03 07:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `cupons`
--

CREATE TABLE `cupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cupons`
--

INSERT INTO `cupons` (`id`, `coupon_code`, `amount`, `amount_type`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Summer 2022', 30, 'Percentage', '30-09-2022', 1, '2022-09-20 09:51:49', '2022-09-20 09:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_charges`
--

CREATE TABLE `delivery_charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `delivery_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_charges`
--

INSERT INTO `delivery_charges` (`id`, `delivery_location`, `delivery_amount`, `created_at`, `updated_at`) VALUES
(1, 'Inside Dhaka', 80, '2022-09-20 09:54:20', '2022-09-20 09:54:20'),
(2, 'Outside Dhaka', 150, '2022-09-20 09:54:37', '2022-09-20 09:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2021_09_20_224412_create_sliders_table', 1),
(5, '2021_09_23_201527_create_categories_table', 1),
(6, '2021_09_30_210635_create_brands_table', 1),
(7, '2021_10_21_110239_create_products_table', 1),
(8, '2021_10_22_212400_create_attributes_table', 1),
(9, '2021_12_04_200209_create_carts_table', 1),
(10, '2021_12_26_213557_create_cupons_table', 1),
(11, '2022_01_05_040655_create_ratings_table', 1),
(12, '2022_01_21_114803_create_wishlists_table', 1),
(13, '2022_01_27_204610_create_billing_addresses_table', 1),
(14, '2022_02_01_054542_create_shipping_addresses_table', 1),
(15, '2022_02_01_063018_create_delivery_charges_table', 1),
(16, '2022_02_06_203022_create_orders_table', 1),
(17, '2022_02_06_203052_create_order_details_table', 1),
(18, '2022_02_14_212723_create_brand_commissions_table', 1),
(19, '2022_03_03_202652_create_campaigns_table', 1),
(20, '2022_03_04_145358_create_campaign_products_table', 1),
(21, '2022_03_18_150142_create_vendor_contacts_table', 1),
(22, '2022_03_26_095944_create_gallery_images_table', 1),
(23, '2022_04_21_193852_create_compares_table', 1),
(24, '2022_05_14_125848_create_banners_table', 1),
(25, '2022_05_15_140335_create_subscribes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_charge` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(9,2) NOT NULL,
  `grand_total` double(9,2) NOT NULL,
  `payment_method` enum('card','cod') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Processing','Shipped','Canceled','Delivered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `brand_id`, `vendor_id`, `category_id`, `invoice_id`, `user_email`, `full_name`, `address`, `city`, `state`, `zip`, `country`, `phone`, `notes`, `coupon_code`, `coupon_amount`, `delivery_charge`, `product_price`, `grand_total`, `payment_method`, `status`, `order_date`, `order_month`, `order_year`, `created_at`, `updated_at`) VALUES
(1, 'O-1663689317', '1', '6', '2', '2', 1663689317, 'alamin5230@yahoo.com.sg', 'Alamin', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+882147596', 'Please fast delivery.', 'Summer 2022', '4320', '80', 2200.00, 10160.00, 'cod', 'Processing', '20/09/2022', 'September', '2022', '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(2, 'O-1669407663', '1', '11', '2', '2', 1669407663, 'alamin5230@yahoo.com.sg', 'Alamin', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+882147596', 'Please fast delivery.', 'Summer 2022', '150', '150', 500.00, 500.00, 'card', 'Delivered', '25/11/2022', 'November', '2022', '2022-11-25 14:21:03', '2023-01-12 05:26:58'),
(3, 'O-1673029957', '1', '6', '2', '2', 1673029957, 'alamin5230@yahoo.com.sg', 'Alamin', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+882147596', 'Please fast delivery.', 'Not Used', '0', '80', 1500.00, 641580.00, 'cod', 'Delivered', '06/01/2023', 'November', '2020', '2023-01-06 12:32:37', '2023-01-06 12:32:37'),
(4, 'O-1673030036', '1', '8', '2', '10', 1673030036, 'alamin5230@yahoo.com.sg', 'Alamin', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+882147596', 'Please fast delivery.', 'Not Used', '0', '150', 20000.00, 118350.00, 'cod', 'Processing', '06/01/2023', 'January', '2021', '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(5, 'O-1673030096', '1', '7', '2', '2', 1673030096, 'alamin5230@yahoo.com.sg', 'Alamin', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+882147596', 'Please fast delivery.', 'Not Used', '0', '150', 500.00, 650.00, 'cod', 'Shipped', '06/01/2023', 'January', '2020', '2023-01-06 12:34:56', '2023-01-06 12:34:56'),
(6, 'O-1673030405', '1', '7', '2', '2', 1673030405, 'alamin5230@yahoo.com.sg', 'Alamin', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+882147596', 'Please fast delivery.', 'Not Used', '0', '80', 500.00, 580.00, 'cod', 'Processing', '06/01/2023', 'January', '2023', '2023-01-06 12:40:05', '2023-01-06 12:40:05'),
(7, 'O-1673031132', '3', '6', '2', '2', 1673031132, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '150', 3000.00, 3650.00, 'cod', 'Processing', '06/01/2023', 'January', '2023', '2023-01-06 12:52:12', '2023-01-06 12:52:12'),
(8, 'O-1673522945', '1', '4', '2', '7', 1673522945, 'alamin5230@yahoo.com.sg', 'Alamin', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+882147596', 'Please fast delivery.', 'Summer 2022', '28500', '80', 95000.00, 66580.00, 'cod', 'Shipped', '12/01/2023', 'January', '2023', '2023-01-12 05:29:05', '2023-02-07 19:11:00'),
(9, 'O-1674154201', '3', '4', '2', '7', 1674154201, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '80', 95000.00, 95080.00, 'cod', 'Processing', '19/01/2023', 'January', '2023', '2023-01-19 12:50:01', '2023-01-19 12:50:01'),
(10, 'O-1674154262', '3', '4', '2', '7', 1674154262, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '80', 95000.00, 95080.00, 'cod', 'Processing', '19/01/2023', 'January', '2023', '2023-01-19 12:51:02', '2023-01-19 12:51:02'),
(11, 'O-1674154324', '3', '4', '2', '5', 1674154324, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '150', 80000.00, 80150.00, 'cod', 'Processing', '19/01/2023', 'January', '2023', '2023-01-19 12:52:04', '2023-01-19 12:52:04'),
(12, 'O-1674154458', '3', '6', '2', '2', 1674154458, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '80', 3000.00, 3580.00, 'cod', 'Processing', '19/01/2023', 'January', '2023', '2023-01-19 12:54:18', '2023-01-19 12:54:18'),
(13, 'O-1674156595', '3', '6', '2', '2', 1674156595, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '80', 3000.00, 3580.00, 'cod', 'Processing', '19/01/2023', 'January', '2023', '2023-01-19 13:29:55', '2023-01-19 13:29:55'),
(14, 'O-1674156736', '3', '6', '2', '2', 1674156736, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '80', 3000.00, 3580.00, 'cod', 'Processing', '19/01/2023', 'January', '2023', '2023-01-19 13:32:16', '2023-01-19 13:32:16'),
(15, 'O-1674161137', '3', '4', '2', '7', 1674161137, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '80', 95000.00, 95080.00, 'cod', 'Processing', '19/01/2023', 'January', '2023', '2023-01-19 14:45:37', '2023-01-19 14:45:37'),
(16, 'O-1674191291', '3', '6', '2', '2', 1674191291, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '150', 10000.00, 10150.00, 'cod', 'Processing', '20/01/2023', 'January', '2023', '2023-01-19 23:08:11', '2023-01-19 23:08:11'),
(17, 'O-1675754158', '3', '7', '2', '2', 1675754158, 'karim@gmail.com', 'karim', 'Dhaka Bangladesh', 'Dhaka', 'bangladesh', '1207', 'bangladesh', '+9874561234', NULL, 'Not Used', '0', '80', 500.00, 580.00, 'card', 'Pending', '07/02/2023', 'February', '2023', '2023-02-07 01:15:58', '2023-02-07 01:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` double(9,2) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `user_id`, `brand_id`, `category_id`, `product_id`, `product_code`, `product_name`, `product_color`, `product_size`, `product_price`, `product_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 6, 2, 20, '8547', 'Calvin Klein Men\'s Slim Fit Suit Separates', NULL, NULL, 7200.00, 1, '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(2, 1, 1, 6, 2, 19, '78521', 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', NULL, NULL, 5000.00, 1, '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(3, 1, 1, 6, 2, 17, '7894', 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', NULL, NULL, 2200.00, 1, '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(4, 2, 1, 11, 2, 14, '9854', 'Adidas Team Force Deodorant Body Spray For Men', NULL, NULL, 500.00, 1, '2022-11-25 14:21:03', '2022-11-25 14:21:03'),
(5, 3, 1, 14, 9, 9, '8520', 'Yamaha Thunderbird 350', NULL, NULL, 320000.00, 2, '2023-01-06 12:32:37', '2023-01-06 12:32:37'),
(6, 3, 1, 6, 2, 13, '8745', 'Women Fit and Flare Dress', NULL, NULL, 1500.00, 1, '2023-01-06 12:32:37', '2023-01-06 12:32:37'),
(7, 4, 1, 4, 7, 8, '78945', 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', NULL, NULL, 95000.00, 1, '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(8, 4, 1, 4, 7, 5, '7452', 'Apple Magic Keyboard', NULL, NULL, 3200.00, 1, '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(9, 4, 1, 8, 10, 3, '4564', 'OnePlus 8T 5G KB2000 128GB 8GB RAM International Version', NULL, NULL, 20000.00, 1, '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(10, 5, 1, 7, 2, 7, '78954', 'Rb3030 Outdoorsman I Aviator Sunglasses', NULL, NULL, 500.00, 1, '2023-01-06 12:34:56', '2023-01-06 12:34:56'),
(11, 6, 1, 7, 2, 7, '78954', 'Rb3030 Outdoorsman I Aviator Sunglasses', NULL, NULL, 500.00, 1, '2023-01-06 12:40:05', '2023-01-06 12:40:05'),
(12, 7, 3, 7, 2, 7, '78954', 'Rb3030 Outdoorsman I Aviator Sunglasses', NULL, NULL, 500.00, 1, '2023-01-06 12:52:12', '2023-01-06 12:52:12'),
(13, 7, 3, 6, 2, 12, '9658', 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', NULL, NULL, 3000.00, 1, '2023-01-06 12:52:12', '2023-01-06 12:52:12'),
(14, 8, 1, 4, 7, 8, '78945', 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', NULL, NULL, 95000.00, 1, '2023-01-12 05:29:05', '2023-01-12 05:29:05'),
(15, 9, 3, 4, 7, 8, '78945', 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', NULL, NULL, 95000.00, 1, '2023-01-19 12:50:01', '2023-01-19 12:50:01'),
(16, 10, 3, 4, 7, 8, '78945', 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', NULL, NULL, 95000.00, 1, '2023-01-19 12:51:02', '2023-01-19 12:51:02'),
(17, 11, 3, 4, 5, 10, '7894', 'Apple TV 4K', NULL, NULL, 40000.00, 2, '2023-01-19 12:52:04', '2023-01-19 12:52:04'),
(18, 12, 3, 7, 2, 7, '78954', 'Rb3030 Outdoorsman I Aviator Sunglasses', NULL, NULL, 500.00, 1, '2023-01-19 12:54:18', '2023-01-19 12:54:18'),
(19, 12, 3, 6, 2, 12, '9658', 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', NULL, NULL, 3000.00, 1, '2023-01-19 12:54:18', '2023-01-19 12:54:18'),
(20, 13, 3, 7, 2, 7, '78954', 'Rb3030 Outdoorsman I Aviator Sunglasses', NULL, NULL, 500.00, 1, '2023-01-19 13:29:55', '2023-01-19 13:29:55'),
(21, 13, 3, 6, 2, 12, '9658', 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', NULL, NULL, 3000.00, 1, '2023-01-19 13:29:55', '2023-01-19 13:29:55'),
(22, 14, 3, 7, 2, 7, '78954', 'Rb3030 Outdoorsman I Aviator Sunglasses', NULL, NULL, 500.00, 1, '2023-01-19 13:32:16', '2023-01-19 13:32:16'),
(23, 14, 3, 6, 2, 12, '9658', 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', NULL, NULL, 3000.00, 1, '2023-01-19 13:32:16', '2023-01-19 13:32:16'),
(24, 15, 3, 4, 7, 8, '78945', 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', NULL, NULL, 95000.00, 1, '2023-01-19 14:45:37', '2023-01-19 14:45:37'),
(25, 16, 3, 6, 2, 19, '78521', 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', NULL, NULL, 5000.00, 2, '2023-01-19 23:08:11', '2023-01-19 23:08:11'),
(26, 17, 3, 7, 2, 7, '78954', 'Rb3030 Outdoorsman I Aviator Sunglasses', NULL, NULL, 500.00, 1, '2023-02-07 01:15:58', '2023-02-07 01:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alamin5230@yahoo.com.sg', '$2y$10$Fzp4JAaY8MlhQrMqlPGXteXzgMp0qhANR1tAQbro8NX7HKGypR75e', '2023-01-20 03:04:15');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_colour` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_buying_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_thumbnail_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_regular_price` double(9,2) DEFAULT NULL,
  `product_discount_price` double(9,2) DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 0,
  `product_stock` int(11) DEFAULT NULL,
  `product_discount_percent` int(11) DEFAULT NULL,
  `product_discount_amount` int(11) DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `product_approval` enum('Approved','Unapproved') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unapproved',
  `featured_products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `best_selling_products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popular_products` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `user_id`, `brand_id`, `product_name`, `product_description`, `product_sku`, `product_code`, `product_colour`, `product_buying_date`, `product_image`, `product_thumbnail_image`, `video`, `product_regular_price`, `product_discount_price`, `product_quantity`, `product_stock`, `product_discount_percent`, `product_discount_amount`, `product_size`, `product_status`, `product_approval`, `featured_products`, `best_selling_products`, `popular_products`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'hgsadhgsad', 'sdasdsadasd', 'dasd', 'sdsad', 'null', '01-09-2022', '[\"431-16d.png\",\"1782-Cost-of-Mobile-App-Development-in-Singapore.jpg\",\"5510-download.jpg\"]', '3209-phpD648.tmp.png', NULL, 12454.00, 5546.00, 5, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-04 13:17:47', '2023-02-03 10:26:46'),
(2, 9, 2, 12, '2021 Honda R 1250 RS', 'Each tour is determined by two factors: time and distance. With the  BMW R 1250 RS you can get more out of every tour. The rich 105 lb-ft torque and 136 hp of the  boxer engine accelerate you quickly to your cruising speed. The innovative BMW ShiftCam technology offers you more torque over the entire speed range, so you can rocket to an impressive sprint in every riding situation. The redesigned front gives the full-LED headlight a fresh, sporty look and performs or rides aerodynamically into the wind. This way, you can ride quickly and comfortably at any time. One thing is certain - no matter how much road you ride, with the R 1250 RS your riding pleasure grows with every mile you ride.', '856', '456', 'null', '01-09-2022', '[\"7706-fo7itQ7FLl7xsMQhIhcZN637OdDDfDD4riiWQUIs.jpg\"]', '742-php68F7.tmp.jpg', NULL, 250000.00, 220000.00, 15, NULL, NULL, 30000, 'null', 'Active', 'Approved', NULL, '1', NULL, '2022-09-05 13:56:01', '2023-01-20 09:41:35'),
(3, 10, 2, 8, 'OnePlus 8T 5G KB2000 128GB 8GB RAM International Version', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '8561', '4564', 'null', '01-09-2022', '[\"4749-lYMyM0DmuSzEE34S463DdXs3fvjfZSCk89jJAVKt.png\"]', '6679-phpD7D1.tmp.png', NULL, 22000.00, 20000.00, 9, NULL, 5, NULL, 'null', 'Active', 'Approved', NULL, '1', '1', '2022-09-05 13:59:46', '2023-01-06 18:33:56'),
(4, 6, 2, 7, 'Nike Men \'Mercurial Superfly 7 Elite Firm Ground Football Shoe', 'Relive a classic design with the adidas World Cup football boots, a lightweight football boot with a durable kangaroo leather retaining it\'s retro style it\'s release in 1979. These adidas football boots provide a responsive feel allowing you to control the game, and the shaped, padded ankle gives you enough flexibility to make a fool of any opposition.\r\n\r\n> Junior football boots\r\n> Lace-up\r\n> Shaped ankle\r\n> adidas 3 stripes\r\n> Retro design\r\n> Removable studs for use on soft ground\r\n> Extended tongue with adidas branding\r\n> addias 3 stripes\r\n> Kangaroo leather upper, Textile and synthetic inner, Synthetic sole', '9632', '9654', 'null', '02-09-2022', '[\"9462-4fcyiIobng7qQmwblTTbag2n8GPR4rtxTWbQU3z4.jpg\",\"574-hw8zqbEVE660GnFScSNYQQOIhu9AvCpxmnErP76G.jpg\"]', '130-php639F.tmp.jpg', NULL, 5500.00, 4500.00, 16, NULL, NULL, 1000, 'null', 'Active', 'Approved', '1', NULL, NULL, '2022-09-05 14:02:33', '2022-11-25 20:11:13'),
(5, 7, 2, 4, 'Apple Magic Keyboard', 'Magic Keyboard with Numeric Keypad features an extended layout, with document navigation controls for quick scrolling and full-size arrow keys for gaming\r\nA scissor mechanism beneath each key allows for increased stability, while optimized key travel and a low profile provide a comfortable and precise typing experience.\r\nThe numeric keypad is also great for spreadsheets and finance applications.', '9632', '7452', 'null', '01-09-2022', '[\"3639-HdhdssOEFPXf22oaNjjFxQeJT0E9kenxkoShcxjA.jpg\",\"5552-j6zr5BJ2bvoy5Sl7YA0hmb3DzQ8GtPFgHur1iHRb.jpg\",\"6658-p7k1WJRoQznq5i09BE5y0L0SysscPzHDfwRqb0HP.jpg\"]', '2430-php926A.tmp.jpg', NULL, 3500.00, 3200.00, 13, NULL, NULL, 300, 'null', 'Active', 'Approved', NULL, '1', NULL, '2022-09-05 14:58:28', '2023-01-06 18:33:56'),
(6, 7, 2, 26, 'HP Stream 9VK97UA#ABA 14 inches HD(1366x768) Display', '14\" diagonal HD SVA BrightView micro-edge WLED-backlit (1366 x 768), Intel Celeron N4000 (1.1 GHz base frequency, up to 2.6 GHz burst frequency, 4 MB cache, 2 cores)\r\nIntel Integrated UHD Graphics 600, 64GB eMMC Hard Drive\r\n4GB DDR4-2400 SDRAM, 802.11 ac 2X2 Wi-Fi and Bluetooth\r\n2 USB 3.1 Gen 1; 1 USB 2.0; 1 HDMI 1.4; 1 headphone/microphone combo, Micro SD media card reader, DTS Studio Sound with dual speakers\r\nFull-size island-style keyboard, Front-facing Webcam with integrated digital microphone, Windows 10 Home, Only 3.39 Lbs', '7854', '8521', 'null', '01-09-2022', '[\"1156-VaOrUubUJHlkCZk8Y2AcZjYMRv8e9ZIrveExur9F.png\",\"805-vrQrFYX5Y59YqEQAFiEFIgcwB6vZkI98Qcw4gwWo.png\"]', '7133-php9562.tmp.png', NULL, 45000.00, 40000.00, 18, NULL, 5, NULL, 'null', 'Active', 'Approved', '1', NULL, '1', '2022-09-05 15:00:39', '2022-11-25 20:11:31'),
(7, 2, 2, 7, 'Rb3030 Outdoorsman I Aviator Sunglasses', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '8954', '78954', 'null', '06-09-2022', '[\"4522-tmVwqsgXnwkq2UXmMh34UNNOKac2XcJgr9hwB7I3.png\",\"4742-xHpxugV99A6ZvV7Aw68Pnk68j4iNPXI670i1ZuYK.png\"]', '8401-php71E1.tmp.png', NULL, 800.00, 500.00, 8, NULL, 15, NULL, 'null', 'Active', 'Approved', NULL, NULL, '1', '2022-09-05 15:03:47', '2023-02-07 07:15:58'),
(8, 7, 2, 4, 'Apple MacBook Pro (16-inch, Apple M1 Pro chip with 10‑core CPU and 16‑core GPU', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '7845', '78945', 'null', '01-09-2022', '[\"5771-kGR1bFwYPJDzQY8vTLz7cApg4gbGrbVpcgozaTH1.png\",\"3129-PHX3IePxWHsu2oPHU0vKN1Q9CA0NvVkoYtvTvmMC.png\"]', '4590-php6BA1.tmp.png', NULL, 105000.00, 95000.00, 20, NULL, 10, NULL, 'null', 'Active', 'Approved', '1', '1', NULL, '2022-09-05 15:20:08', '2023-01-19 20:45:37'),
(9, 9, 2, 14, 'Yamaha Thunderbird 350', 'Engine CC\r\n346 cc\r\nNo Of Cylinder\r\n1\r\nMax Power\r\n19.8 bhp @ 5250 rpm\r\nMax Torque\r\n28 Nm @ 4000 rpm\r\nValves Per Cylinder\r\n2\r\nFuel Delivery\r\n29mm, Constant Vacuum Carburettor\r\nCooling System\r\nAir Cooled\r\nStarting Mechanism\r\nSelf / Kick Start', '7845', '8520', 'null', '01-09-2022', '[\"7999-GXzWyLFKexEyUL1AGzL2E63weqfAPtx8yW0WBkuq.jpg\",\"4272-SQmULnsDtmQpFvXTWi5S9AYnCKhyQ915MOCSTQPb.jpg\"]', '7013-php64A1.tmp.jpg', NULL, 350000.00, 320000.00, 6, NULL, 5, NULL, 'null', 'Active', 'Approved', NULL, '1', NULL, '2022-09-05 15:23:23', '2023-01-06 18:32:37'),
(10, 5, 2, 4, 'Apple TV 4K', '4k high dynamic range (dolby vision and hdr10) for stunning picture quality\r\nDolby atmos for three-dimensional, room-filling sound\r\nA10x fusion chip for ultra-fast graphics and performance\r\nNavigate and search with the apple tv remote\r\nUse airplay to view photos and videos from your iPhone and iPad on your tv\r\nNetflix, Amazon prime video, Hot star, ALT balaji, Zee5, iTunes and thousands more apps in the App Store', '9632', '7894', 'null', '01-09-2022', '[\"6336-OSnUdTGc8iRyu27Oi1ciKWE30Qa3yvWWFEu664Si.jpg\",\"65-rp9w4tDyangJZLzQfHzGRwt7ynGv5JQ8dnNExSR7.jpg\"]', '9552-php9BE7.tmp.jpg', NULL, 42000.00, 40000.00, 14, NULL, NULL, 2000, 'null', 'Active', 'Approved', '1', NULL, '1', '2022-09-05 15:25:48', '2023-01-19 18:52:04'),
(11, 7, 2, 28, 'Dell Inspiron 15 3511 15.6 Inch Laptop, Full HD LED Non-Touch WVA Display - Intel Core i3-1115G4, 8GB DDR4 RAM, 256GB SSD', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '98745', '4561', 'null', '01-09-2022', '[\"3464-Le7a9Esadf7IFHsFAt35BrRFk6qeYELWuY3W5Xt0.png\",\"2189-mY3ZLFNmpOmEuKtQE0t7lkncxtaq6eXP38HOfXWm.png\"]', '1199-phpF3EC.tmp.png', NULL, 30000.00, 28000.00, 12, NULL, NULL, 2000, 'null', 'Active', 'Approved', '1', NULL, '1', '2022-09-05 15:37:06', '2022-11-25 20:11:53'),
(12, 2, 2, 6, 'Womens Summer Plus Size Lace Neckline Cold Shoulder Short Sleeve', 'Care Instructions: Gentle Wash, Do not Dry Clean, Do Not Bleach, Wash with like colors, Low Iron, , Line Dry in Shade,, Do not Iron on Lable and embroidery\r\nFit Type: Loose Fit\r\nFabric: Denim\r\nStyle: Joggers ;Pattern: Cartoon\r\nRise: Low Rise ;Closure: Drawstring ;Length: Ankle Length', '96325', '9658', 'null', '02-09-2022', '[\"2404-MaYsPjsgXmxlVj0RNCnygTtDVfLSA9WOmicsUpU9.png\"]', '289-phpAD52.tmp.png', NULL, 3500.00, 3000.00, 4, NULL, 7, NULL, 'null', 'Active', 'Approved', '1', NULL, '1', '2022-09-05 15:40:05', '2023-01-19 19:32:16'),
(13, 2, 2, 6, 'Women Fit and Flare Dress', '\"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?\"', '3654', '8745', 'null', '01-09-2022', '[\"5020-4Zyf6RB9RFuBuyl7pBEUVeQBDV78JMKGRKUb9xV9.png\",\"8338-5Te6s7kEoj0TWfp04bWyW3R9qY3BV7AehykcWnmM.png\"]', '2970-phpBD69.tmp.png', NULL, 1600.00, 1500.00, 14, NULL, NULL, 100, 'null', 'Active', 'Approved', NULL, '1', NULL, '2022-09-05 15:45:37', '2023-01-06 18:32:37'),
(14, 2, 2, 11, 'Adidas Team Force Deodorant Body Spray For Men', 'Quantity: 150ml; Item Form: Spray\r\nEnergetic and woody fragrance enhanced with orange extract; Notes of grapefruit, green pear and rich woods\r\nDelivers a boost of intensity for a team leader motivated by everyday challenges\r\nDermatologically tested and 0% aluminum salts formula that respects skin pH\r\nUsage: Give it a good hard shake first to make sure all the ingredients are mixed together before you spray it. You should hold the can approximately 15cm from your body or clothes as you spray it.\r\nTarget Audience: Men', '78546', '9854', 'null', '02-09-2022', '[\"123-Zqd3t0FwDpK4MVW6aTkCeXcF9Tk04CNtI1Q4v2OJ.png\"]', '1559-php4D2A.tmp.png', NULL, 550.00, 500.00, 11, NULL, NULL, 50, 'null', 'Active', 'Approved', '1', NULL, '1', '2022-09-06 13:49:50', '2022-11-25 20:21:03'),
(15, 6, 2, 15, 'Men\'s Running Shoes Non Slip Athletic Tennis Walking Blade Type Sneakers', 'Closure: Lace-Up\r\nShoe Width: Medium\r\nMaterial Type: Mesh\r\nLifestyle: Sports\r\nClosure Type: Lace-Up\r\nWarranty Type: Manufacturer\r\nProduct warranty against manufacturing defects: 90 days\r\nCare Instructions: Allow your pair of shoes to air and de-odorize at a regular basis, this also helps them retain their natural shape; use shoe bags to prevent any stains or mildew; dust any dry dirt from the surface using a clean cloth, do not use polish or shiner', '7854', '9632', 'null', '03-09-2022', '[\"7301-GysFC2OF9JXLUl0iYBlmVILT6rc0GQ4z07WiQWye.png\",\"4307-TSR3w40yO7OuE8pV8XMcwaK4eguwnCRl9BdjJQmP.png\"]', '41-php333D.tmp.png', NULL, 3500.00, 3000.00, 16, NULL, 5, NULL, 'null', 'Active', 'Approved', NULL, '1', NULL, '2022-09-06 13:53:00', '2022-11-25 20:12:14'),
(16, 2, 2, 11, 'Adidas Women\'s Parma 16 Shorts', 'Care Instructions: Machine Wash\r\nFit Type: Regular\r\nPattern : Solid print jogger set | Sleeves Type : Full Sleeves | Neck-Type- Round Neck|Color : Navy Blue\r\nFabric : Top and Bottom :100% cotton\r\nFit Type: Regular (Relaxed) Fit. Please refer Size Chart or perfect fit nightwear.\r\nPackage Contents : 1 Pair of Night Suit/Lounge wear set (1 Jogger, 1 Top)\r\nWash care instructions: Turn garments inside out before machine washing and Ironing. Do not Iron on Decoration. Wash Dark Colors Separately. Do not tumble dry. Line dry. Do not bleach.', '7451', '7452', 'null', '02-09-2022', '[\"1766-812J9JiqFRiG6GuYGGn1uWRGHe7oEvutR9uz2Rkw.png\",\"1644-yy3G584u1b9OwLjCUASXcGho6mnF4GqMBDinHkpc.png\"]', '4509-phpFF55.tmp.png', NULL, 1200.00, 1000.00, 18, NULL, NULL, 200, 'null', 'Active', 'Approved', '1', NULL, NULL, '2022-09-06 13:54:58', '2022-11-25 20:12:16'),
(17, 2, 2, 6, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '95% Viscose, 5% Elastane\r\nImported\r\nMachine Wash\r\nMade in Vietnam\r\nThis essential T-shirt dress features a high crewneck and a relaxed cut for an effortless look that\'s ready to style\r\nLuxe Jersey - Perfectly rich, smooth fabric that beautifully drapes\r\nStart every outfit with Daily Ritual\'s range of elevated basics\r\nModel is 5\'11\" and wearing a size Small', '456781', '7894', 'null', '02-09-2022', '[\"2936-6i5Oi7J0UkkiLtPW10s1Ve5CDpxv9gmAg3Cag8BL.jpg\",\"2072-0304OoVajoa5NmYLx7uCF6xnKSPzgJj0maVhWExm.jpg\"]', '1655-php5EC7.tmp.jpg', NULL, 2500.00, 2200.00, 19, NULL, NULL, 300, 'null', 'Active', 'Approved', NULL, NULL, '1', '2022-09-06 14:04:06', '2022-11-25 20:12:18'),
(18, 2, 2, 6, 'Anne Klein Women\'s Classic V-Neck Faux Wrap Dress', '94% Polyester, 6% Elastane\r\nImported\r\nPull On closure\r\nDry Clean Only\r\nV-neck\r\nThree-quarter sleeve', '9874', '7845', 'null', '02-09-2022', '[\"5405-egxmWhbCB9zZf64CwzSkQZAoXdeaJJhDxVb7yHQP.jpg\",\"2458-K3pI6KiTQPY7TeuRciWwOnVNsxR7s7x10BGuEPkm.jpg\",\"8531-KfQDQD0Kn9T5F79d8XnZk0uFHkOS4taX7CBde7GR.jpg\"]', '9379-phpB39C.tmp.jpg', NULL, 4500.00, 4000.00, 15, NULL, 5, NULL, 'null', 'Active', 'Approved', '1', NULL, NULL, '2022-09-06 14:30:41', '2023-02-03 10:27:05'),
(19, 2, 2, 6, 'Daily Ritual Women\'s Jersey Short-Sleeve Boxy Pocket T-Shirt Dress', '95% Viscose, 5% Elastane\r\nImported\r\nMachine Wash\r\nMade in Vietnam\r\nThis essential T-shirt dress features a high crewneck and a relaxed cut for an effortless look that\'s ready to style\r\nLuxe Jersey - Perfectly rich, smooth fabric that beautifully drapes\r\nStart every outfit with Daily Ritual\'s range of elevated basics\r\nModel is 5\'11\" and wearing a size Small', '8954', '78521', 'null', '02-09-2022', '[\"6172-3RRYU3rFbLAKDjATm7RqRoIAg67TK6TUWUsuqhYi (1).jpg\",\"9409-0304OoVajoa5NmYLx7uCF6xnKSPzgJj0maVhWExm (1).jpg\"]', '2836-phpC2AA.tmp.jpg', NULL, 5500.00, 5000.00, 15, NULL, 5, NULL, 'null', 'Active', 'Approved', NULL, '1', NULL, '2022-09-06 14:32:56', '2023-01-20 09:42:08'),
(20, 2, 2, 6, 'Calvin Klein Men\'s Slim Fit Suit Separates', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '85214', '8547', 'null', '02-09-2022', '[\"9598-jUyTkMZsoG6MywE2Xv4q8ti1KKZQMZM6TgH7Kp2S.jpg\",\"3381-MmqCvdi0UXGfDm5uA4AuQ68TM3gSspSRZTYdKul5.jpg\"]', '6438-phpFEA9.tmp.jpg', NULL, 8000.00, 7200.00, 14, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, '1', '2022-09-06 14:37:33', '2023-01-20 09:42:15'),
(21, 6, 2, 15, 'Under Armour Men\'s Charged Assert 9 Running Shoe', '\"On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.\"', '78541', '8547', 'null', '02-09-2022', '[\"9014-dCOYQHfKwLPuX6UptT374IAeSwVAhml2DIdlonWd.png\",\"1312-ThJJLI7nXDsYJZ56uWQuqHns38m7DaWAEy51AYMX.png\"]', '3725-php8610.tmp.png', NULL, 3000.00, 2700.00, 25, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-06 15:38:12', '2022-09-06 21:49:49'),
(22, 13, 2, 2, 'Winnie the Pooh Hooded Towel for Baby', 'Your little cub will be blissful at bathtime after a warm hug from Pooh when drying off. This Winnie the Pooh Hooded Towel has the silly ol\' bear\'s face on top and \'\'Pooh bear\'\' embroidered on the back.\r\n\r\nMagic in the details\r\n\r\nSoft velour and terry towel\r\nPlush Winnie the Pooh hood with embroidered features and 3D ears\r\nEmbroidered \'\'Pooh bear\'\' on back\r\n3D hands on two corners\r\nThe bare necessities\r\n\r\n100% cotton, exclusive of decoration\r\nImported', '9654', '785412', 'null', '02-09-2022', '[\"3466-pMmINApjXY8KBmhHAwu5bl1C8Qf7f5bjxHmq5fyL.jpg\"]', '5685-php2628.tmp.jpg', NULL, 2500.00, 2000.00, 12, NULL, NULL, 200, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-06 15:43:16', '2022-09-06 21:49:54'),
(23, 13, 2, 2, 'Pinovk Kid Toy Gun Classic Colt 1911 Toy Gun', 'There was the Hubley Ric-O-Shay, and the Mattel Fanner .45 with the Greenie Stick-Em Caps. There was a Thompson and an M3 Grease gun, the latter with hand crank for a realistic sound. The Man From Uncle Gun combined a Walther P.38 with a buttstock, long barrel and scope. There was a foot-long scale likeness of a Winchester Model 94 I glued together like an airplane model. Finally there was that matchless day when I received my first real gun, a bolt-action .410 shotgun, and toys were no more.\r\n\r\nAll that was, I guess, preparation for almost 39 years in the gun industry. And, like much else that was shown in those flickering images, anathema to right-thinking members of today\'s academia.', '8521', '9632', 'null', '02-09-2022', '[\"8152-v4ScnAuXgpHtmInabQVu64aq0G7pcCdXNlkcNRnl.jpg\",\"7643-VC8U9Ar7J7S9jFoHIzwxWDtAgdYxL9p4LHaJ1eMm.jpg\"]', '5617-php6F8E.tmp.jpg', NULL, 500.00, 450.00, 18, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-06 15:45:45', '2022-09-06 21:49:57'),
(24, 13, 2, 2, 'Electric Car For Baby or Kids Model Audi R8 Spyder', 'Suitable for kids of age 3 – 8 years.\r\n2 in 1. Children Self Drive and Parental RC Control.  You child can drive the car himself using the accelerator and the steering wheel. But if your child is very young and he cannot drive himself, then you can use the remote control to drive the car.\r\nSwing Function\r\nAccelerator/ Pedal\r\nGear Switch For Forward / Reverse\r\nHorn, Door open/close, Music Player, Lighting\r\nBattery: 2 x 6V batteries ( 12 Volt Battery )\r\nBattery Backup: 3 to 4 hours\r\nCharging Time: 2 hours\r\nAudi R8 Baby Car Dimensions :\r\nCar Weight : 22 Kgs', '85647', '8521', 'null', '02-09-2022', '[\"899-nV07eApyy7PDZix65HlMWkeAXwFZDhiOrnpEKDoo.jpg\",\"8064-TEoWdEQGxq6KKB3fsMfENgMTivE3adtZYssZiTlO.jpg\"]', '3781-phpCDEE.tmp.jpg', NULL, 1600.00, 1500.00, 8, NULL, NULL, 100, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-06 15:49:26', '2022-09-06 21:50:00'),
(25, 10, 2, 4, 'Apple - iPhone 12 Pro Max 5G 256GB', 'NETWORK	Technology	\r\nGSM / CDMA / HSPA / EVDO / LTE / 5G\r\nLAUNCH	Announced	2020, October 13\r\nStatus	Available. Released 2020, November 13\r\nBODY	Dimensions	160.8 x 78.1 x 7.4 mm (6.33 x 3.07 x 0.29 in)\r\nWeight	228 g (8.04 oz)\r\nBuild	Glass front (Gorilla Glass), glass back (Gorilla Glass), stainless steel frame\r\nSIM	Single SIM (Nano-SIM and/or eSIM) or Dual SIM (Nano-SIM, dual stand-by) - for China\r\n 	IP68 dust/water resistant (up to 6m for 30 mins)\r\nApple Pay (Visa, MasterCard, AMEX certified)\r\nDISPLAY	Type	Super Retina XDR OLED, HDR10, 800 nits (typ), 1200 nits (peak)\r\nSize	6.7 inches, 109.8 cm2 (~87.4% screen-to-body ratio)\r\nResolution	1284 x 2778 pixels, 19.5:9 ratio (~458 ppi density)\r\nProtection	Scratch-resistant ceramic glass, oleophobic coating\r\n 	Dolby Vision\r\nWide color gamut\r\nTrue-tone\r\nPLATFORM	OS	iOS 14.1, upgradable to iOS 14.4\r\nChipset	Apple A14 Bionic (5 nm)\r\nCPU	Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)\r\nGPU	Apple GPU (4-core graphics)\r\nMEMORY	Card slot	No\r\nInternal	128GB 6GB RAM, 256GB 6GB RAM, 512GB 6GB RAM\r\n 	NVMe\r\nMAIN CAMERA	Quad	12 MP, f/1.6, 26mm (wide), 1.7µm, dual pixel PDAF, sensor-shift stabilization (IBIS)\r\n12 MP, f/2.2, 65mm (telephoto), 1/3.4\", 1.0µm, PDAF, OIS, 2.5x optical zoom\r\n12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\"\r\nTOF 3D LiDAR scanner (depth)\r\nFeatures	Dual-LED dual-tone flash, HDR (photo/panorama)\r\nVideo	4K@24/30/60fps, 1080p@30/60/120/240fps, 10‑bit HDR, Dolby Vision HDR (up to 60fps), stereo sound rec.\r\nSELFIE CAMERA	Dual	12 MP, f/2.2, 23mm (wide), 1/3.6\"\r\nSL 3D, (depth/biometrics sensor)\r\nFeatures	HDR\r\nVideo	4K@24/30/60fps, 1080p@30/60/120fps, gyro-EIS\r\nSOUND	Loudspeaker	Yes, with stereo speakers\r\n3.5mm jack	No\r\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, hotspot\r\nBluetooth	5.0, A2DP, LE\r\nGPS	Yes, with A-GPS, GLONASS, GALILEO, QZSS\r\nNFC	Yes\r\nRadio	No\r\nUSB	Lightning, USB 2.0\r\nFEATURES	Sensors	Face ID, accelerometer, gyro, proximity, compass, barometer\r\n 	Siri natural language commands and dictation\r\nUltra Wideband (UWB) support\r\nBATTERY	Type	Li-Ion 3687 mAh, non-removable (14.13 Wh)\r\nCharging	Fast charging 20W, 50% in 30 min (advertised)\r\nUSB Power Delivery 2.0\r\nQi magnetic fast wireless charging 15W\r\nStand-by	Up to 20 h (multimedia)\r\nMusic play	Up to 80 h\r\nMISC	Colors	Silver, Graphite, Gold, Pacific Blue\r\nModels	A2411, A2342, A2410, A2412\r\nSAR EU	0.99 W/kg (head)     0.99 W/kg (body)    \r\nPrice	$ 1,099.00 / € 1,217.50 / £ 1,039.00 / ₹ 129,699\r\nTESTS	Performance	AnTuTu: 638584 (v8)\r\nGeekBench: 4240 (v5.1)\r\nGFXBench: 55fps (ES 3.1 onscreen)\r\nDisplay	Contrast ratio: Infinite (nominal)\r\nCamera	Photo / Video\r\nLoudspeaker	-23.8 LUFS (Very good)', '9654', '4521', 'null', '02-09-2022', '[\"2503-mXP9MsjuxgDYI3OpoSeH5jr3Y0nZTcVx2g1v5Dgm.jpg\",\"5715-ngyfjA3eJKNoOZDPYpUVDqdWAXrI09Oq8oj1J3jQ.jpg\",\"8449-VMzi72f3HHg9ccpYjn1JMi9yh2A2rBWiqH8BEUYR.jpg\"]', '7191-phpEB97.tmp.jpg', NULL, 105000.00, 95000.00, 16, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-07 09:02:04', '2022-09-07 15:22:58'),
(26, 10, 2, 24, 'Nokia 3310', 'LAUNCH	Announced	2017, February\r\nStatus	Available. Released 2017, May\r\nBODY	Dimensions	115.6 x 51 x 12.8 mm (4.55 x 2.01 x 0.50 in)\r\nWeight	85 g (3.00 oz)\r\nBuild	Glass front, plastic back, plastic frame\r\nSIM	Single SIM (Micro-SIM) or Dual SIM (Micro-SIM, dual stand-by)\r\n 	Flashlight\r\nDISPLAY	Type	TFT\r\nSize	2.4 inches, 17.8 cm2 (~30.3% screen-to-body ratio)\r\nResolution	240 x 320 pixels, 4:3 ratio (~167 ppi density)\r\nMEMORY	Card slot	microSDHC (dedicated slot)\r\nPhonebook	Yes\r\nCall records	Yes\r\nInternal	16MB\r\nMAIN CAMERA	Single	2 MP\r\nFeatures	LED flash\r\nVideo	240p@8fps\r\nSELFIE CAMERA	 	No\r\nSOUND	Loudspeaker	Yes\r\n3.5mm jack	Yes\r\nCOMMS	WLAN	No\r\nBluetooth	3.0, A2DP\r\nGPS	No\r\nNFC	No\r\nRadio	FM radio\r\nUSB	microUSB 2.0\r\nFEATURES	Sensors	\r\nMessaging	SMS\r\nGames	Yes\r\nJava	No\r\n 	Audio/Video player\r\nBATTERY	Type	Li-Ion 1200 mAh, removable\r\nStand-by	Up to 744 h\r\nTalk time	Up to 22 h\r\nMusic play	Up to 51 h\r\nType	Dual-SIM model\r\nStand-by	Up to 600 h\r\nTalk time	Up to 22 h\r\nMISC	Colors	Warm Red (Glossy), Dark Blue (Matte), Yellow (Glossy), Grey (Matte)\r\nSAR EU	0.71 W/kg (head)     1.49 W/kg (body)', '789454', '7854', 'null', '03-09-2022', '[\"1552-9FQYlXO9bMSCBBGtXeEtchxh9jtuqqUy0rBhkGNv.jpg\",\"1600-Q5Hk7AdJnAoSyp7lnWrWz5qQmsbZsK8IZH2tFYQT.jpg\"]', '1607-php80CD.tmp.jpg', NULL, 4000.00, 3600.00, 12, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-07 09:04:54', '2022-09-07 15:23:07'),
(27, 10, 2, 8, 'OnePlus 7 pro (128GB/256GB storage, no card slot)', 'LAUNCH	Announced	2019, May 14\r\nStatus	Available. Released 2019, May 16\r\nBODY	Dimensions	162.6 x 75.9 x 8.8 mm (6.40 x 2.99 x 0.35 in)\r\nWeight	206 g (7.27 oz)\r\nBuild	Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), aluminum frame\r\nSIM	Dual SIM (Nano-SIM, dual stand-by)\r\nDISPLAY	Type	Fluid AMOLED, 90Hz, HDR10+\r\nSize	6.67 inches, 108.8 cm2 (~88.1% screen-to-body ratio)\r\nResolution	1440 x 3120 pixels, 19.5:9 ratio (~516 ppi density)\r\nProtection	Corning Gorilla Glass 5\r\nPLATFORM	OS	Android 9.0 (Pie), OxygenOS 10.0.5\r\nChipset	Qualcomm SM8150 Snapdragon 855 (7 nm)\r\nCPU	Octa-core (1x2.84 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.78 GHz Kryo 485)\r\nGPU	Adreno 640\r\nMEMORY	Card slot	No\r\nInternal	128GB 6GB RAM, 256GB 8GB RAM, 256GB 12GB RAM\r\n 	UFS 3.0\r\nMAIN CAMERA	Triple	48 MP, f/1.6, (wide), 1/2.0\", 0.8µm, PDAF, Laser AF, OIS\r\n8 MP, f/2.4, 78mm (telephoto), 3x optical zoom, PDAF, OIS\r\n16 MP, f/2.2, 17mm (ultrawide), AF\r\nFeatures	Dual-LED flash, panorama, HDR\r\nVideo	4K@30/60fps, 1080p@30/60/240fps, 720p@480fps, Auto HDR, gyro-EIS, no video rec. with ultrawide camera\r\nSELFIE CAMERA	Single	Motorized pop-up 16 MP, f/2.0, 25mm (wide), 1/3.06\", 1.0µm\r\nFeatures	Auto-HDR\r\nVideo	1080p@30fps, gyro-EIS\r\nSOUND	Loudspeaker	Yes, with stereo speakers\r\n3.5mm jack	No\r\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot\r\nBluetooth	5.0, A2DP, LE, aptX HD\r\nGPS	Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, SBAS\r\nNFC	Yes\r\nRadio	No\r\nUSB	USB Type-C 3.1, USB On-The-Go\r\nFEATURES	Sensors	Fingerprint (under display, optical), accelerometer, gyro, proximity, compass\r\nBATTERY	Type	Li-Po 4000 mAh, non-removable\r\nCharging	Fast charging 30W\r\nWarp Charge\r\nMISC	Colors	Mirror Grey, Almond, Nebula Blue\r\nModels	GM1911, GM1913, GM1917, GM1910, GM1915\r\nPrice	$ 549.00 / € 655.90 / £ 519.00 / ₹ 49,999\r\nTESTS	Performance	AnTuTu: 364025 (v7)\r\nGeekBench: 10943 (v4.4), 2721 (v5.1)\r\nGFXBench: 19fps (ES 3.1 onscreen)\r\nCamera	Photo / Video\r\nLoudspeaker	-23.9 LUFS (Very good)\r\nAudio quality	Noise -93.0dB / Crosstalk -89.6dB\r\nBattery life	\r\nEndurance rating 85h', '8520', '96325', 'null', '02-09-2022', '[\"587-G7riuclpn5FB3ocxwqHvAYJsUyOHmOADCsxRv2nH.jpg\",\"9785-WY0kR08y4revbL3AVQwO6RAZr2DfggY5o0Qmlvbj.jpg\"]', '5928-php176E.tmp.jpg', NULL, 40000.00, 36000.00, 15, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-07 09:06:38', '2022-09-07 15:23:11'),
(28, 10, 2, 8, 'OnePlus 8 12GB RAM+256GB Storage', 'NETWORK	Technology	\r\nGSM / CDMA / HSPA / LTE / 5G\r\nLAUNCH	Announced	2020, April 14\r\nStatus	Available. Released 2020, April 21\r\nBODY	Dimensions	160.2 x 72.9 x 8 mm (6.31 x 2.87 x 0.31 in)\r\nWeight	180 g (6.35 oz)\r\nBuild	Glass front (Gorilla Glass 5), glass back (Gorilla Glass 5), aluminum frame\r\nSIM	Dual SIM (Nano-SIM, dual stand-by)\r\nDISPLAY	Type	Fluid AMOLED, 90Hz, HDR10+\r\nSize	6.55 inches, 103.6 cm2 (~88.7% screen-to-body ratio)\r\nResolution	1080 x 2400 pixels, 20:9 ratio (~402 ppi density)\r\nProtection	Corning Gorilla Glass 5\r\nPLATFORM	OS	Android 10, upgradable to Android 11, OxygenOS 11\r\nChipset	Qualcomm SM8250 Snapdragon 865 (7 nm+)\r\nCPU	Octa-core (1x2.84 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.8 GHz Kryo 585)\r\nGPU	Adreno 650\r\nMEMORY	Card slot	No\r\nInternal	128GB 8GB RAM, 256GB 12GB RAM\r\n 	UFS 3.0, 2-LANE\r\nMAIN CAMERA	Triple	48 MP, f/1.8, 26mm (wide), 1/2.0\", 0.8µm, PDAF, OIS\r\n16 MP, f/2.2, 14mm, 116˚ (ultrawide), 1/3.6\", 1.0µm\r\n2 MP, f/2.4, (macro)\r\nFeatures	Dual-LED flash, HDR, panorama\r\nVideo	4K@30/60fps, 1080p@30/60/240fps, Auto HDR, gyro-EIS\r\nSELFIE CAMERA	Single	16 MP, f/2.4, (wide), 1/3.06\", 1.0µm\r\nFeatures	Auto-HDR\r\nVideo	1080p@30fps, gyro-EIS\r\nSOUND	Loudspeaker	Yes, with stereo speakers\r\n3.5mm jack	No\r\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac/6, dual-band, Wi-Fi Direct, DLNA, hotspot\r\nBluetooth	5.1, A2DP, LE, aptX HD\r\nGPS	Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, SBAS\r\nNFC	Yes\r\nRadio	No\r\nUSB	USB Type-C 3.1, USB On-The-Go\r\nFEATURES	Sensors	Fingerprint (under display, optical), accelerometer, gyro, proximity, compass\r\nBATTERY	Type	Li-Po 4300 mAh, non-removable\r\nCharging	Fast charging 30W, 50% in 22 min (advertised)\r\nMISC	Colors	Onyx Black, Glacial Green, Interstellar Glow, Polar Silver\r\nModels	IN2013, IN2017\r\nPrice	$435.00 / € 599.00 / £ 520.00\r\nTESTS	Performance	AnTuTu: 564708 (v8)\r\nGeekBench: 13291 (v4.4), 3399 (v5.1)\r\nGFXBench: 46fps (ES 3.1 onscreen)\r\nDisplay	Contrast ratio: Infinite (nominal)\r\nCamera	Photo / Video\r\nLoudspeaker	-22.5 LUFS (Excellent)\r\nBattery life	\r\nEndurance rating 108h', '7451', '32145', 'null', '03-09-2022', '[\"4737-li153PeglehJ0RiqeZ0NADPD2dDXfKLSAvw2IWMQ.jpg\",\"9339-ujvrZtVH0uU2ZdacLoAgENhqOfZMwULMSfB7V4pa.jpg\"]', '3141-php45D5.tmp.jpg', NULL, 60000.00, 57000.00, 15, NULL, 5, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-07 09:10:06', '2022-09-07 15:23:15'),
(29, 10, 2, 8, 'OnePlus 7 (128GB/256GB storage, no card slot)', 'LAUNCH	Announced	2019, May 14\r\nStatus	Available. Released 2019, June 04\r\nBODY	Dimensions	157.7 x 74.8 x 8.2 mm (6.21 x 2.94 x 0.32 in)\r\nWeight	182 g (6.42 oz)\r\nBuild	Glass front (Gorilla Glass 6), glass back (Gorilla Glass 5), aluminum frame\r\nSIM	Dual SIM (Nano-SIM, dual stand-by)\r\nDISPLAY	Type	Optic AMOLED, HDR10\r\nSize	6.41 inches, 100.9 cm2 (~85.5% screen-to-body ratio)\r\nResolution	1080 x 2340 pixels, 19.5:9 ratio (~402 ppi density)\r\nProtection	Corning Gorilla Glass 6\r\nPLATFORM	OS	Android 9.0 (Pie), upgradable to Android 10, OxygenOS 10.0.5\r\nChipset	Qualcomm SM8150 Snapdragon 855 (7 nm)\r\nCPU	Octa-core (1x2.84 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.78 GHz Kryo 485)\r\nGPU	Adreno 640\r\nMEMORY	Card slot	No\r\nInternal	128GB 6GB RAM, 256GB 8GB RAM, 256GB 12GB RAM\r\n 	UFS 3.0\r\nMAIN CAMERA	Dual	48 MP, f/1.7, (wide), 1/2.0\", 0.8µm, PDAF, OIS\r\n5 MP, f/2.4, (depth)\r\nFeatures	Dual-LED flash, HDR, panorama\r\nVideo	4K@30/60fps, 1080p@30/60/240fps, 720p@480fps, Auto HDR, gyro-EIS\r\nSELFIE CAMERA	Single	16 MP, f/2.0, 25mm (wide), 1/3.06\", 1.0µm\r\nFeatures	Auto-HDR\r\nVideo	1080p@30fps, gyro-EIS\r\nSOUND	Loudspeaker	Yes, with stereo speakers\r\n3.5mm jack	No\r\nCOMMS	WLAN	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, DLNA, hotspot\r\nBluetooth	5.0, A2DP, LE, aptX HD\r\nGPS	Yes, with dual-band A-GPS, GLONASS, BDS, GALILEO, SBAS\r\nNFC	Yes\r\nRadio	No\r\nUSB	USB Type-C 3.1, USB On-The-Go\r\nFEATURES	Sensors	Fingerprint (under display, optical), accelerometer, gyro, proximity, compass\r\nBATTERY	Type	Li-Po 3700 mAh, non-removable\r\nCharging	Fast charging 20W\r\nMISC	Colors	Mirror Gray, Red, Mirror Blue\r\nModels	GM1901, GM1900, GM1905\r\nPrice	$ 466.09 / £ 522.40\r\nTESTS	Performance	AnTuTu: 367812 (v7)\r\nGeekBench: 11075 (v4.4)\r\nGFXBench: 36fps (ES 3.1 onscreen)\r\nDisplay	Contrast ratio: Infinite (nominal)\r\nCamera	Photo / Video\r\nLoudspeaker	Voice 68dB / Noise 73dB / Ring 82dB\r\nBattery life	\r\nEndurance rating 102h', '1245', '3654', 'null', '02-09-2022', '[\"7881-G7riuclpn5FB3ocxwqHvAYJsUyOHmOADCsxRv2nH.jpg\",\"3556-SzOkGbBzb6QYcUwV0KFZFImwwjHDrDScuSyXHhZY.jpg\"]', '5341-phpDA43.tmp.jpg', NULL, 50000.00, 45000.00, 17, NULL, 10, NULL, 'null', 'Active', 'Approved', NULL, NULL, NULL, '2022-09-07 09:11:50', '2022-09-07 15:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating_status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'Active',
  `rating_approval` enum('Approved','Unapproved') COLLATE utf8mb4_unicode_ci DEFAULT 'Unapproved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_addresses`
--

CREATE TABLE `shipping_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL DEFAULT 0,
  `shipping_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_addresses`
--

INSERT INTO `shipping_addresses` (`id`, `user_id`, `order_id`, `shipping_name`, `shipping_mobile`, `shipping_address`, `shipping_country`, `shipping_notes`, `shipping_city`, `shipping_state`, `shipping_zip`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', 'Please fast delivery.', 'Dhaka', 'bangladesh', '1207', '2022-09-20 09:53:04', '2022-09-20 09:53:04'),
(2, 1, 0, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', 'Please fast delivery.', 'Dhaka', 'bangladesh', '1207', '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(3, 1, 1, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', 'Please fast delivery.', 'Dhaka', 'bangladesh', '1207', '2022-09-20 09:55:17', '2022-09-20 09:55:17'),
(4, 1, 0, 'Alamin', 'dasdasdsad', 'sgdgasiudgd', 'bangladesh', NULL, 'sdsad', 'bangladesh', 'dasdsa', '2022-11-25 14:21:03', '2022-11-25 14:21:03'),
(5, 1, 2, 'Alamin', 'dasdasdsad', 'sgdgasiudgd', 'bangladesh', NULL, 'sdsad', 'bangladesh', 'dasdsa', '2022-11-25 14:21:03', '2022-11-25 14:21:03'),
(6, 1, 0, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:32:37', '2023-01-06 12:32:37'),
(7, 1, 3, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:32:37', '2023-01-06 12:32:37'),
(8, 1, 0, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(9, 1, 4, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:33:56', '2023-01-06 12:33:56'),
(10, 1, 0, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:34:56', '2023-01-06 12:34:56'),
(11, 1, 5, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:34:56', '2023-01-06 12:34:56'),
(12, 1, 0, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:40:05', '2023-01-06 12:40:05'),
(13, 1, 6, 'Alamin', '+882147596', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:40:05', '2023-01-06 12:40:05'),
(14, 3, 0, 'karim', '+9874561234', 'Dhaka Bangladesh', 'bangladesh', NULL, 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:47:56', '2023-01-06 12:47:56'),
(15, 3, 0, 'karim', '+9874561234', 'Dhaka Bangladesh', 'bangladesh', 'lorem ipsum', 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:48:30', '2023-01-06 12:48:30'),
(16, 3, 0, 'karim', '+9874561234', 'Dhaka Bangladesh', 'bangladesh', 'Lorem Ipsum', 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:49:06', '2023-01-06 12:49:06'),
(17, 3, 0, 'karim', '+9874561234', 'Dhaka Bangladesh', 'bangladesh', 'Lorem Ipsum', 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:51:14', '2023-01-06 12:51:14'),
(18, 3, 0, 'karim', '+9874561234', 'Dhaka Bangladesh', 'bangladesh', 'Lorem Ipsum', 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:52:12', '2023-01-06 12:52:12'),
(19, 3, 7, 'karim', '+9874561234', 'Dhaka Bangladesh', 'bangladesh', 'Lorem Ipsum', 'Dhaka', 'bangladesh', '1207', '2023-01-06 12:52:12', '2023-01-06 12:52:12'),
(20, 1, 0, 'Alamin', '+882147596', 'sdasda', 'bangladesh', 'sdsadsadasd', 'Dhaka', 'bangladesh', '1207', '2023-01-12 05:29:05', '2023-01-12 05:29:05'),
(21, 1, 8, 'Alamin', '+882147596', 'sdasda', 'bangladesh', 'sdsadsadasd', 'Dhaka', 'bangladesh', '1207', '2023-01-12 05:29:05', '2023-01-12 05:29:05'),
(22, 3, 0, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'fgfytydyfdj', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:50:01', '2023-01-19 12:50:01'),
(23, 3, 9, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'fgfytydyfdj', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:50:01', '2023-01-19 12:50:01'),
(24, 3, 0, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'fgfytydyfdj', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:51:02', '2023-01-19 12:51:02'),
(25, 3, 10, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'fgfytydyfdj', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:51:02', '2023-01-19 12:51:02'),
(26, 3, 0, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'dsadsad', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:52:04', '2023-01-19 12:52:04'),
(27, 3, 11, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'dsadsad', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:52:04', '2023-01-19 12:52:04'),
(28, 3, 0, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'sdadasdsad', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:54:18', '2023-01-19 12:54:18'),
(29, 3, 12, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'sdadasdsad', 'Dhaka', 'bangladesh', '7845', '2023-01-19 12:54:18', '2023-01-19 12:54:18'),
(30, 3, 0, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'sadsadad', 'Dhaka', 'bangladesh', '7845', '2023-01-19 13:29:54', '2023-01-19 13:29:54'),
(31, 3, 13, 'karim', '+9874561234', 'asdasd', 'bangladesh', 'sadsadad', 'Dhaka', 'bangladesh', '7845', '2023-01-19 13:29:55', '2023-01-19 13:29:55'),
(32, 3, 0, 'karim', '+9874561234', 'sdsadsad', 'bangladesh', 'sdasda', 'Dhaka', 'bangladesh', 'sdsada', '2023-01-19 13:32:16', '2023-01-19 13:32:16'),
(33, 3, 14, 'karim', '+9874561234', 'sdsadsad', 'bangladesh', 'sdasda', 'Dhaka', 'bangladesh', 'sdsada', '2023-01-19 13:32:16', '2023-01-19 13:32:16'),
(34, 3, 0, 'karim', '+9874561234', 'ytfy', 'bangladesh', 'hjhiuyi', 'sdasd', 'bangladesh', 'sdsad', '2023-01-19 14:45:37', '2023-01-19 14:45:37'),
(35, 3, 15, 'karim', '+9874561234', 'ytfy', 'bangladesh', 'hjhiuyi', 'sdasd', 'bangladesh', 'sdsad', '2023-01-19 14:45:37', '2023-01-19 14:45:37'),
(36, 3, 0, 'karim', '+9874561234', 'Dhaka', 'bangladesh', 'Hurry', 'Dhaka', 'bangladesh', '1207', '2023-01-19 23:08:11', '2023-01-19 23:08:11'),
(37, 3, 16, 'karim', '+9874561234', 'Dhaka', 'bangladesh', 'Hurry', 'Dhaka', 'bangladesh', '1207', '2023-01-19 23:08:11', '2023-01-19 23:08:11'),
(38, 3, 0, 'Hector Brown', '0817918771', '40 goodyear, Goodyear square', 'nepal', NULL, 'Nelspruit', 'bangladesh', '1200', '2023-02-07 01:15:58', '2023-02-07 01:15:58'),
(39, 3, 17, 'Hector Brown', '0817918771', '40 goodyear, Goodyear square', 'nepal', NULL, 'Nelspruit', 'bangladesh', '1200', '2023-02-07 01:15:58', '2023-02-07 01:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_title`, `slider_image`, `created_at`, `updated_at`) VALUES
(3, 'Slider 2', 'images/slider/9618-php7B9D.tmp.webp', '2022-09-05 07:37:25', '2023-03-10 17:11:33'),
(4, 'Slider 3', 'images/slider/585-phpBE16.tmp.webp', '2022-09-05 07:37:39', '2023-03-10 17:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes`
--

CREATE TABLE `subscribes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribes`
--

INSERT INTO `subscribes` (`id`, `email`, `status`, `date`, `created_at`, `updated_at`) VALUES
(1, 'sdasdasd@dsda', 'Active', '04/09/2022', '2022-09-04 13:34:02', '2022-09-04 13:34:02'),
(2, 'alamin.softdevloper@gmail.com', 'Active', '04/09/2022', '2022-09-04 13:34:24', '2022-09-04 13:34:24'),
(3, 'alamin5230@yahoo.com.sg', 'Active', '05/09/2022', '2022-09-05 16:45:32', '2022-09-05 16:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `demo_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Active','Inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'Inactive',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `provider_id`, `avatar`, `mobile`, `address`, `country`, `city`, `state`, `zip`, `role_as`, `nid`, `demo_id`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Alamin', 'alamin5230@yahoo.com.sg', NULL, '6418-php42EF.tmp.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'admin', NULL, '', 'Active', NULL, '$2y$10$Wmu0Xwpj1/JD981ICVondeWG/xkM4oyXEXVflQzs3GIMkcnkUWqgu', 'qNSfiSZsIFZBVAxKYo7KwT72TYqmBgSBJA7e8xvLi6Id4J7uK14F8GKsGYsP', '2022-09-01 12:03:21', '2022-09-11 16:22:36'),
(2, 'Rahim', 'rahim@gmail.com', NULL, '2453-phpAE96.tmp.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 'vendor', NULL, '1', 'Active', NULL, '$2y$10$cD5o.DveMZktapUxs86Q6OLU9t77BogVzE5EyozaoMNsRoVk0EMzi', NULL, '2022-09-05 07:50:17', '2022-09-20 10:12:42'),
(3, 'karim', 'karim@gmail.com', NULL, NULL, '+9874561234', NULL, NULL, NULL, NULL, NULL, 'customer', NULL, '1', 'Active', NULL, '$2y$10$qZHEaz8XLepqZo6usfaiRO4a.AAUBjrdI/OKkkquQzCkYGbWI7Rea', NULL, '2023-01-06 12:46:05', '2023-01-06 12:46:05'),
(4, 'Abdul', 'formulated4artulve@gmail.com', NULL, NULL, '0791785046', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', NULL, '$2y$10$VSbeacv60KGf02G46pU0w.Viwlciu5Tf35iW0ZW34WpQgZDWFtxEC', NULL, '2023-02-07 23:48:49', '2023-02-07 23:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_contacts`
--

CREATE TABLE `vendor_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_contacts`
--

INSERT INTO `vendor_contacts` (`id`, `customer_name`, `customer_email`, `customer_phone`, `subject`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Alamin', 'alamin.softdevloper@gmail.com', '+085214789', 'Problem', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-09-11 05:28:25', '2022-09-11 05:28:25');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `w_product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `w_product_id`, `created_at`, `updated_at`) VALUES
(8, 3, 14, '2023-01-06 12:47:33', '2023-01-06 12:47:33'),
(9, 3, 16, '2023-01-06 12:47:35', '2023-01-06 12:47:35'),
(10, 3, 17, '2023-01-06 12:47:37', '2023-01-06 12:47:37'),
(13, 1, 8, '2023-03-10 17:13:30', '2023-03-10 17:13:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attributes_product_id_foreign` (`product_id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_brand_phone_unique` (`brand_phone`),
  ADD KEY `brands_user_id_foreign` (`user_id`);

--
-- Indexes for table `brand_commissions`
--
ALTER TABLE `brand_commissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaigns`
--
ALTER TABLE `campaigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `campaign_products`
--
ALTER TABLE `campaign_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_pro_id_foreign` (`pro_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cupons`
--
ALTER TABLE `cupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes`
--
ALTER TABLE `subscribes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vendor_contacts`
--
ALTER TABLE `vendor_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `brand_commissions`
--
ALTER TABLE `brand_commissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `campaigns`
--
ALTER TABLE `campaigns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `campaign_products`
--
ALTER TABLE `campaign_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cupons`
--
ALTER TABLE `cupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `delivery_charges`
--
ALTER TABLE `delivery_charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shipping_addresses`
--
ALTER TABLE `shipping_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscribes`
--
ALTER TABLE `subscribes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vendor_contacts`
--
ALTER TABLE `vendor_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attributes`
--
ALTER TABLE `attributes`
  ADD CONSTRAINT `attributes_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
