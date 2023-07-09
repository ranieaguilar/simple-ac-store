-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 09, 2023 at 08:48 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ac`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_password` longtext COLLATE utf8mb4_general_ci,
  `admin_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_status` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `admin_profile_pic` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_created_at` datetime DEFAULT NULL,
  `admin_updated_at` datetime DEFAULT NULL,
  `admin_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`, `admin_type`, `admin_status`, `admin_profile_pic`, `admin_created_at`, `admin_updated_at`, `admin_deleted_at`) VALUES
(6, 'admin', '$2y$10$Zl7udSNJ/JSz1gtCGNGafeDLHs/K/wasNVVbkwXQJ3SDsdPGTycGC', 'super_admin', 'active', '1685604162_45bd34b1a1820f02c7db.jpg', '2023-05-29 08:43:23', '2023-06-09 03:43:03', NULL),
(8, 'patrick', '$2y$10$8stfeavEJ3mkHSo4QZtqe.XKi8Tzouf40PvUFYEG6sFh2sLmBtKO6', 'super_admin', 'active', '1686299127_dc0fae8a14ba9c4ba0c0.jpg', '2023-06-01 06:39:54', '2023-06-09 08:25:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
CREATE TABLE IF NOT EXISTS `chats` (
  `chat_id` int NOT NULL AUTO_INCREMENT,
  `chat_sender` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `chat_receiver` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `chat_message` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `chat_created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`chat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `chat_sender`, `chat_receiver`, `chat_message`, `chat_created_at`) VALUES
(49, 'admin', '4', 'hello kapatid klan ka mag babayad', '2023-06-09 08:39:00'),
(48, 'admin', '9', 'ok naman ako', '2023-06-09 03:47:13'),
(47, '9', 'admin', 'kamusta', '2023-06-09 03:46:58'),
(46, 'admin', '9', 'hello din naman', '2023-06-09 03:46:49'),
(45, '9', 'admin', 'hello admin', '2023-06-09 03:46:40'),
(44, 'admin', '4', 'saan naman', '2023-06-09 03:44:08'),
(43, '4', 'admin', 'oi punt ka dito', '2023-06-09 03:43:58'),
(42, 'admin', '5', 'hi', '2023-06-08 10:22:07'),
(41, '4', 'admin', 'hello din lalabs ko', '2023-06-08 10:20:32'),
(40, 'admin', '4', 'hello lalabs', '2023-06-08 10:20:08'),
(39, '4', 'admin', 'tawa ka naman jan', '2023-06-08 09:45:24'),
(38, '4', 'admin', 'ok naman kaibigan', '2023-06-08 09:45:09'),
(37, 'admin', '4', 'kamusta ang tulog', '2023-06-08 09:44:57'),
(36, 'admin', '4', 'ok ka lang ba?', '2023-06-08 09:44:47'),
(35, 'admin', '4', 'kamusta ka kaibigan', '2023-06-08 09:44:36'),
(34, '4', 'admin', 'hi naman po', '2023-06-08 09:44:24'),
(33, 'admin', '4', 'hello Ranie', '2023-06-08 09:44:13'),
(32, 'admin', '1', 'hello Ranie', '2023-06-08 09:43:57'),
(50, 'admin', '4', 'huy magbayad kana', '2023-06-09 08:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int NOT NULL AUTO_INCREMENT,
  `client_firstname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `client_lastname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `client_address` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `client_phonenumber` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `client_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `client_description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `client_appointment_date` datetime DEFAULT NULL,
  `client_password` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `client_created_at` datetime DEFAULT NULL,
  `client_updated_at` datetime DEFAULT NULL,
  `client_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_firstname`, `client_lastname`, `client_address`, `client_phonenumber`, `client_email`, `client_description`, `client_appointment_date`, `client_password`, `client_created_at`, `client_updated_at`, `client_deleted_at`) VALUES
(1, 'ranie b.', 'aguilar', 'Tacligan Sa Teodoro Oriental Mindoro', '09919105039', 'ranieaguilar2000@gmail.com', 'pogi', '2023-06-21 10:19:30', '$2y$10$Zl7udSNJ/JSz1gtCGNGafeDLHs/K/wasNVVbkwXQJ3SDsdPGTycGC', NULL, '2023-06-09 08:09:21', NULL),
(2, 'Jerick', 'santos', 'Manila', '09090909', 'jerick@mail.com', 'registered', NULL, '$2y$10$.kuFygWxDMyQLD.oCmWI4u/2NNYn4ReQ4FKk2CR/XE0CygTIxt37m', '2023-06-07 07:28:51', '2023-06-09 08:00:44', NULL),
(4, 'ranie', 'admin', 'admin', '12345', 'admin@admin.com', 'registered', NULL, '$2y$10$VSBhQ/I5Y.QWkvCSerMvMesCbhJ.ZA/7hPc01YNpvtFAlWO3.VF7e', '2023-06-07 07:35:26', '2023-06-07 08:31:18', NULL),
(5, 'patric', 'alegria', 'calapan', '09974379929', 'jay@mail.com', 'guest', NULL, '', '2023-06-07 08:51:20', '2023-06-07 08:51:20', NULL),
(9, 'ranie', 'aguilar', 'tacligan', '0991021548', 'ran@mail.com', 'registered', NULL, '$2y$10$vM3PP5/UUo/wriMtEzEwNeYufYOCyVGpeQcpoL9Qmym.23UJRbRTO', '2023-06-09 03:46:18', '2023-06-09 03:46:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `like_item`
--

DROP TABLE IF EXISTS `like_item`;
CREATE TABLE IF NOT EXISTS `like_item` (
  `like_item_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `client_id` int DEFAULT NULL,
  `li_created_at` datetime DEFAULT NULL,
  `li_updated_at` datetime DEFAULT NULL,
  `li_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`like_item_id`),
  KEY `product_id` (`product_id`),
  KEY `client_id` (`client_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `like_item`
--

INSERT INTO `like_item` (`like_item_id`, `product_id`, `client_id`, `li_created_at`, `li_updated_at`, `li_deleted_at`) VALUES
(10, 51, 1, '2023-06-07 06:39:57', '2023-06-07 06:39:57', NULL),
(9, 52, 1, '2023-06-07 06:39:52', '2023-06-07 06:39:52', NULL),
(15, 51, 4, '2023-06-08 07:18:50', '2023-06-08 07:18:50', NULL),
(11, 51, 2, '2023-06-07 07:29:04', '2023-06-07 07:29:04', NULL),
(12, 52, 2, '2023-06-07 07:29:12', '2023-06-07 07:29:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_brand` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `product_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_cooling_capacity` int NOT NULL,
  `product_power_consumption` decimal(5,2) DEFAULT NULL,
  `product_price` decimal(8,2) DEFAULT NULL,
  `product_stock_quantity` int NOT NULL,
  `product_description` longtext COLLATE utf8mb4_general_ci,
  `product_created_at` datetime NOT NULL,
  `product_updated_at` datetime NOT NULL,
  `product_deleted_at` datetime NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_brand`, `product_model`, `product_type`, `product_cooling_capacity`, `product_power_consumption`, `product_price`, `product_stock_quantity`, `product_description`, `product_created_at`, `product_updated_at`, `product_deleted_at`) VALUES
(50, 'aircon', 'samsung', 'sac123', 'window', 1, '1.30', '23423.00', 17, 'malamig na malamig', '2023-06-02 02:35:06', '2023-06-02 02:35:06', '0000-00-00 00:00:00'),
(51, 'electricfan', 'iwata', 'ifan1234', 'fan', 1, '1.00', '3423.00', 34, 'malakas ang hangin', '2023-06-02 07:35:36', '2023-06-02 07:35:36', '0000-00-00 00:00:00'),
(52, 'jghjghj', 'gfhjfghj', 'ghjfghj', 'fghjfghj', 54, '56.00', '5667.00', 4, 'ghjfghjfghj', '2023-06-05 04:51:31', '2023-06-05 04:51:31', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `product_image_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int DEFAULT NULL,
  `product_image_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pImage_created_at` datetime DEFAULT NULL,
  `pImage_updated_at` datetime DEFAULT NULL,
  `pImage_deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`product_image_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_image`
--

INSERT INTO `product_image` (`product_image_id`, `product_id`, `product_image_name`, `pImage_created_at`, `pImage_updated_at`, `pImage_deleted_at`) VALUES
(19, 47, '1685516824_50cd310a01e9bf5781cf.jpg', '2023-05-31 07:07:04', '2023-05-31 07:07:04', NULL),
(18, 46, '1685443756_253ddb2ddf36f98bac1b.jpg', '2023-05-30 10:49:16', '2023-05-30 10:49:16', NULL),
(17, 46, '1685443756_ca03eefe97fe533924c2.jpg', '2023-05-30 10:49:16', '2023-05-30 10:49:16', NULL),
(16, 45, '1685440411_918d92cc8d6720442ab3.jpg', '2023-05-30 09:53:31', '2023-05-30 09:53:31', NULL),
(15, 45, '1685440411_b8ea482c81014d4ac624.jpg', '2023-05-30 09:53:31', '2023-05-30 09:53:31', NULL),
(14, 45, '1685440411_358d9aa1d9534cec8d5c.jpg', '2023-05-30 09:53:31', '2023-05-30 09:53:31', NULL),
(20, 47, '1685516824_8dbf673d7015322a38b3.jpg', '2023-05-31 07:07:04', '2023-05-31 07:07:04', NULL),
(21, 47, '1685516824_4b43f61bc61df6499f5b.jpg', '2023-05-31 07:07:04', '2023-05-31 07:07:04', NULL),
(22, 48, '1685578496_637a6d93725e340f0fc0.jpg', '2023-06-01 00:14:56', '2023-06-01 00:14:56', NULL),
(23, 49, '1685673141_46bbbfbad4d432ef6077.jpg', '2023-06-02 02:32:21', '2023-06-02 02:32:21', NULL),
(24, 50, '1685673306_d2b21eb9103bb260d9c7.jpg', '2023-06-02 02:35:06', '2023-06-02 02:35:06', NULL),
(25, 50, '1685673306_9821ef24ce5cd4630222.jpg', '2023-06-02 02:35:06', '2023-06-02 02:35:06', NULL),
(28, 51, '1685691336_e6a2a346d01f844138cb.jpg', '2023-06-02 07:35:36', '2023-06-02 07:35:36', NULL),
(29, 52, '1685940691_6aaecd3b6516595fa836.jpeg', '2023-06-05 04:51:31', '2023-06-05 04:51:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE IF NOT EXISTS `system_settings` (
  `ss_id` int NOT NULL AUTO_INCREMENT,
  `ss_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ss_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ss_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`ss_id`, `ss_name`, `ss_image`) VALUES
(1, 'lalabs', '1685607420_0f04e33e691e91191b91.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
