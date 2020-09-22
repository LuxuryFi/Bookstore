-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 07:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_bookstore`
--
DROP DATABASE IF EXISTS `project_bookstore`;
CREATE DATABASE IF NOT EXISTS `project_bookstore` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `project_bookstore`;

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `title`, `avatar`, `description`, `created_at`, `updated_at`, `status`) VALUES
(4, '312312', 'example.jpg', '<p>312312</p>\r\n', '2020-09-10 18:59:14', NULL, 0),
(5, '31231', 'example.jpg', '<p>1312312312</p>\r\n', '2020-09-11 16:08:05', NULL, 1),
(6, '312312', 'example.jpg', '<p>1312312</p>\r\n', '2020-09-11 16:08:15', NULL, 1),
(7, 'aaa', 'example.jpg', '<p>aa</p>\r\n', '2020-09-11 16:08:20', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'none.jpg',
  `parent_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `avatar`, `parent_id`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Light Novel', '1599389810-Light Novel.png', 0, '<p>A light novel is a style of Japanese young adult novel primarily targeting high school and middle school students. The term &quot;light novel&quot; is a wasei-eigo, or a Japanese term formed from words in the English language.&nbsp;</p>\r\n', '2020-09-06 10:56:50', NULL, 0),
(2, 'Manga', '1599390644-Manga.jpg', 0, '<p>Manga are comics or graphic novels originating from Japan. Most manga conform to a style developed in Japan in the late 19th century, though the art form has a long prehistory in earlier Japanese art. The term manga is used in Japan to refer to both comics and cartooning.&nbsp;</p>\r\n', '2020-09-06 11:10:44', NULL, 0),
(3, 'Historical ', '1599397111-Historical .jpg', 0, '<p><em>Historical fiction</em>&nbsp;is a literary genre in which the plot takes place in a setting located in the past. ... An essential element of&nbsp;<em>historical fiction</em>&nbsp;is that it is set in the past and pays attention to the manners, social conditions and other details of the depicted period.</p>\r\n', '2020-09-06 12:58:31', NULL, 0),
(4, 'Comic Book', '1599397157-Comic Book.jpg', 0, '<p>A comic book or comicbook, also called comic magazine or simply comic, is a publication that consists of comics art in the form of sequential juxtaposed panels that represent individual scenes.</p>\r\n', '2020-09-06 12:59:17', NULL, 0),
(5, 'Self-help', '1599409360-Self-help.jpg', 0, '<p>12312321</p>\r\n', '2020-09-06 12:59:45', '2020-09-06 23:22:44', 0),
(6, 'Literary Fiction', '1599397213-Literary Fiction.gif', 0, '', '2020-09-06 13:00:13', NULL, 0),
(7, 'Test', '1599406221-Test.jpg', 0, '<p>31231</p>\r\n', '2020-09-06 15:30:21', NULL, 0),
(8, 'Test2', '1599406308-Test2.jpg', 0, '<p>132312</p>\r\n', '2020-09-06 15:31:48', NULL, 1),
(9, 'Test3', '1599406336-Test3.jpg', 0, '<p>3123</p>\r\n', '2020-09-06 15:32:16', NULL, 1),
(10, '312', '1599409691-312.png', 0, '<p>13231</p>\r\n', '2020-09-06 15:35:35', '2020-09-06 23:28:11', 0),
(13, '31231', '', 0, '<p>312312</p>\r\n', '2020-09-09 16:00:45', NULL, 0),
(14, '31231', '1599759847-31231.jpg', 0, '<p>312312312</p>\r\n', '2020-09-10 17:44:07', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `avatar` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT 0,
  `description` text DEFAULT NULL,
  `content` text DEFAULT NULL COMMENT 'full description',
  `author_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `seo_title` varchar(255) DEFAULT NULL,
  `seo_description` varchar(255) DEFAULT NULL,
  `seo_keywords` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_author` (`author_id`),
  KEY `fk_product_publisher` (`publisher_id`),
  KEY `fk_product_supplier` (`supplier_id`),
  KEY `fk_product_type` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `avatar`, `price`, `amount`, `description`, `content`, `author_id`, `publisher_id`, `supplier_id`, `type_id`, `created_at`, `updated_at`, `status`, `seo_title`, `seo_description`, `seo_keywords`) VALUES
(7, 'ab', '16004435143123120.jpg/16004435143123121.jpg/16004435143123122.jpg/16004435143123123.jpg16004435143123124.jpg/16004435143123125.jpg', 2, 42424, 'avas', 'abc', 4, 3, 2, 1, '2020-09-17 16:46:22', '0000-00-00 00:00:00', 0, 'abc', 'abc', 'abc'),
(8, 'Date A Live', '16004435143123120.jpg/16004435143123121.jpg/16004435143123122.jpg/16004435143123123.jpg16004435143123124.jpg/16004435143123125.jpg', 123123, 3123, '<p>avasasv</p>\r\n', '<p>&aacute;vasasv</p>\r\n', 4, 3, 2, 1, '2020-09-17 17:08:18', '0000-00-00 00:00:00', 1, 'datealive', '<p>avasasv</p>\r\n', 'datealive'),
(9, '312', '16004435143123120.jpg/16004435143123121.jpg/16004435143123122.jpg/16004435143123123.jpg16004435143123124.jpg/16004435143123125.jpg', 312, 312, '<p>adsdasd</p>\r\n', '<p>đấ</p>\r\n', 4, 3, 2, 1, '2020-09-17 17:10:46', NULL, 1, 'đâsd', '<p>adsdasd</p>\r\n', 'ádasd'),
(10, 'Date A Live 2', '16004435143123120.jpg/16004435143123121.jpg/16004435143123122.jpg/16004435143123123.jpg16004435143123124.jpg/16004435143123125.jpg', 1231231, 3123123, '<p>adasdasdas</p>\r\n', '<p>dấdasdas</p>\r\n', 4, 3, 2, 1, '2020-09-17 17:14:01', NULL, 1, 'dâdasd', '<p>adasdasdas</p>\r\n', 'sdasda'),
(11, '3123123', '16004435143123120.jpg/16004435143123121.jpg/16004435143123122.jpg/16004435143123123.jpg16004435143123124.jpg/16004435143123125.jpg', 312, 312, '<p>3123</p>\r\n', '<p>321312</p>\r\n', 4, 6, 2, 1, '2020-09-18 15:06:44', NULL, 1, '31', '<p>3123</p>\r\n', 'sad'),
(12, '312312', '16004435143123120.jpg/16004435143123121.jpg/16004435143123122.jpg/16004435143123123.jpg16004435143123124.jpg/16004435143123125.jpg/1599397111-Historical.jpg/1599390644-Manga.jpg/1598875494-product-3.jpg\r\n', 3123, 12312, '<p>312312</p>\r\n', '<p>321312</p>\r\n', 5, 3, 2, 1, '2020-09-18 15:38:34', NULL, 1, 'ádas', '<p>312312</p>\r\n', 'đấ'),
(13, 'Test1', '1600618852Test10.jpg/1600618852Test11.jpg/1600618852Test12.jpg/1600618852Test13.jpg/1600618852Test14.jpg/1600618852Test15.jpg/1600618852Test16.jpg/1600618852Test17.jpg/1600618852Test18.jpg', 123123, 312, '<p>&aacute;dasdasda</p>\r\n', '<p>dsadasdasda</p>\r\n', 4, 3, 2, 1, '2020-09-20 16:20:52', NULL, 1, 'đâsd', '<p>&aacute;dasdasda</p>\r\n', '312312');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`product_id`,`category_id`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`, `created_at`) VALUES
(8, 1, '2020-09-17 17:08:18'),
(8, 5, '2020-09-17 17:08:18'),
(8, 9, '2020-09-17 17:08:18'),
(9, 1, '2020-09-17 17:10:46'),
(9, 5, '2020-09-17 17:10:46'),
(9, 9, '2020-09-17 17:10:46'),
(10, 1, '2020-09-17 17:14:01'),
(10, 5, '2020-09-17 17:14:01'),
(10, 9, '2020-09-17 17:14:01'),
(11, 1, '2020-09-18 15:06:44'),
(11, 5, '2020-09-18 15:06:44'),
(11, 9, '2020-09-18 15:06:44'),
(12, 1, '2020-09-18 15:38:34'),
(12, 5, '2020-09-18 15:38:34'),
(12, 9, '2020-09-18 15:38:34'),
(13, 1, '2020-09-20 16:20:52'),
(13, 2, '2020-09-20 16:20:52'),
(13, 3, '2020-09-20 16:20:52'),
(13, 5, '2020-09-20 16:20:52'),
(13, 6, '2020-09-20 16:20:52'),
(13, 7, '2020-09-20 16:20:52'),
(13, 9, '2020-09-20 16:20:52'),
(13, 10, '2020-09-20 16:20:52'),
(13, 13, '2020-09-20 16:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

DROP TABLE IF EXISTS `product_tag`;
CREATE TABLE IF NOT EXISTS `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`product_id`,`tag_id`),
  KEY `fk_tag` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`, `created_at`) VALUES
(10, 1, '2020-09-17 17:14:01'),
(10, 7, '2020-09-17 17:14:01'),
(11, 1, '2020-09-18 15:06:44'),
(11, 7, '2020-09-18 15:06:44'),
(12, 1, '2020-09-18 15:38:34'),
(12, 7, '2020-09-18 15:38:34'),
(13, 1, '2020-09-20 16:20:52'),
(13, 2, '2020-09-20 16:20:52'),
(13, 3, '2020-09-20 16:20:52'),
(13, 7, '2020-09-20 16:20:52'),
(13, 8, '2020-09-20 16:20:52'),
(13, 9, '2020-09-20 16:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

DROP TABLE IF EXISTS `publishers`;
CREATE TABLE IF NOT EXISTS `publishers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `avatar` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `country` varchar(5) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `avatar`, `title`, `description`, `phone`, `country`, `address`, `email`, `created_at`, `updated_at`, `status`) VALUES
(3, 'example.jpg', 'Kim Đồng', '<p>1323123</p>\r\n', '0966141598', '+84', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-11 16:25:45', '2020-09-15 21:39:05', 1),
(6, 'example.jpg', '3123', '<p>31231231</p>\r\n', '0966141598', '+66', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-12 16:07:19', NULL, 1),
(7, 'example.jpg', '3123', '<p>123123</p>\r\n', '0966141598', '+84', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-18 14:33:24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `country` varchar(5) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `title`, `description`, `phone`, `country`, `address`, `email`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Thái Hà Book', '<p>abacascas</p>\r\n', '966141598', '+255', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-11 17:06:58', '2020-09-12 23:08:51', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `title`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Ecchi', '', '2020-09-09 16:15:09', NULL, 1),
(2, 'Action', '', '2020-09-09 16:41:44', NULL, 1),
(3, 'Adult', '', '2020-09-09 16:41:54', NULL, 1),
(4, 'Comedy', '<p>123123</p>\r\n', '2020-09-09 16:42:03', '2020-09-10 00:31:28', 1),
(7, 'Shoujo', '<p>312312322</p>\r\n', '2020-09-09 17:33:08', '2020-09-10 00:33:32', 1),
(8, 'Sports', '<p>3131</p>\r\n', '2020-09-09 17:33:21', NULL, 0),
(9, 'Sách báo', '<p>3123123</p>\r\n', '2020-09-11 17:13:11', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, '3123123', '<p>312312312sss</p>\r\n', '2020-09-11 17:14:34', '2020-09-12 00:14:57', 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_author` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `fk_product_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`),
  ADD CONSTRAINT `fk_product_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`),
  ADD CONSTRAINT `fk_product_type` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`);

--
-- Constraints for table `product_category`
--
ALTER TABLE `product_category`
  ADD CONSTRAINT `product_category_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `product_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `fk_tag` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
