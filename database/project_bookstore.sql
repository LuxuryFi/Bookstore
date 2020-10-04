-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2020 at 07:50 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `title`, `avatar`, `description`, `created_at`, `updated_at`, `status`) VALUES
(4, 'Kōshi Tachibana', 'example.jpg', '<p>312312</p>\r\n', '2020-09-10 18:59:14', '2020-09-28 22:04:49', 1),
(5, 'Ryo Shirakome', 'example.jpg', '<p>1312312312</p>\r\n', '2020-09-11 16:08:05', '2020-09-28 22:05:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT 'none.jpg',
  `parent_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 'Ngoại văn', '1599406336-Test3.jpg', 0, '<p>3123</p>\r\n', '2020-09-06 15:32:16', '2020-09-28 22:01:36', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
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
  `seo_keywords` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `avatar`, `price`, `amount`, `description`, `content`, `author_id`, `publisher_id`, `supplier_id`, `type_id`, `created_at`, `updated_at`, `status`, `seo_title`, `seo_description`, `seo_keywords`) VALUES
(23, '3123123', '160096374831231230.png/160096374831231231.jpg/160096374831231232.jpg/160096374831231233.jpg/1601050551-3123123.jpg/1601050551-3123123.jpg/1601050551-3123123.jpg/1601050551-3123123.jpg', 12312, 3312, '<p>đ&acirc;sdas</p>\r\n', '<p>d&aacute;</p>\r\n', 4, 3, 2, 1, '2020-09-24 16:09:08', NULL, NULL, '3123123', '<p>đ&acirc;sdas</p>\r\n', ''),
(26, '312312', '16009652253123120.png', 3123, 12312, '<p>c&aacute;dasdasd</p>\r\n', '<p>đ&acirc;sd</p>\r\n', 5, 3, 2, 1, '2020-09-24 16:33:45', NULL, NULL, '312312', '<p>c&aacute;dasdasd</p>\r\n', '231'),
(29, 'Test100', '1600965409Test1000.jpg', 321, 3123, '<p>adsdas</p>\r\n', '<p>đ&aacute;d&aacute;</p>\r\n', 4, 3, 2, 1, '2020-09-24 16:36:49', NULL, NULL, 'Test100', '<p>adsdas</p>\r\n', '31231'),
(30, 'Test101', '1600965442Test1010.jpg/1600965442Test1011.jpg/1600965442Test1012.jpg/1601053205-Test1010.jpg/1601053205-Test1011.jpg/1601053205-Test1012.jpg/1601053205-Test1013.png', 321, 3123, '<p>adsdas</p>\r\n', '<p>đ&aacute;d&aacute;</p>\r\n', 4, 3, 2, 1, '2020-09-24 16:37:22', NULL, NULL, 'Test101', '<p>adsdas</p>\r\n', '31231'),
(38, 'ddasd', '1601036695ddasd0.jpg/1601036695ddasd1.jpg/1601036695ddasd2.jpg', 3213, 312, '<p>321</p>\r\n', '<p>312</p>\r\n', 4, 6, 2, 1, '2020-09-25 12:24:55', NULL, 1, '3123', '<p>321</p>\r\n', '12312'),
(39, '321', '16010368643210.jpg', 312, 312, '<p>321</p>\r\n', '<p>321</p>\r\n', 4, 3, 2, 1, '2020-09-25 12:27:44', NULL, NULL, '321', '<p>321</p>\r\n', '123'),
(45, '312aaa', '1601037175312aaa0.jpg', 312, 312, '<p>312312</p>\r\n', '<p>312</p>\r\n', 4, 3, 2, 1, '2020-09-25 12:32:55', NULL, 1, '312', '<p>312312</p>\r\n', '312'),
(46, '312', '16010373253120.jpg', 312, 312, '<p>12312</p>\r\n', '<p>312</p>\r\n', 4, 3, 2, 1, '2020-09-25 12:35:25', NULL, 0, 'w2', '<p>12312</p>\r\n', '12312'),
(47, '312', '16010375823120.jpg', 312, 312, '<p>12312</p>\r\n', '<p>312</p>\r\n', 4, 3, 2, 1, '2020-09-25 12:39:42', NULL, 1, 'w2', '<p>12312</p>\r\n', '12312'),
(48, 'Kim Đồng', '1601050287Kim Đồng0.jpg/1601050287Kim Đồng1.jpg/1601050287Kim Đồng2.jpg', 3123, 12312, '<p>312312</p>\r\n', '<p>312312</p>\r\n', 5, 6, 2, 1, '2020-09-25 16:11:27', NULL, 1, '312', '<p>312312</p>\r\n', '12312'),
(49, 'Date A Live tập 1', '1601306629Date A Live tập 10.png/1601306629Date A Live tập 11.png/1601306629Date A Live tập 12.png/1601306629Date A Live tập 13.png/1601306629Date A Live tập 14.png', 250000, 312, '<p><strong>Tohka Dead End</strong>&nbsp;(十香デッドエンド,&nbsp;<em>Tōka Deddo Endo</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 1st&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date_A_Live\">Date A Live</a>&nbsp;series.The novel was released on March 19, 2011.</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<h2>Publisher&#39;s Summary</h2>\r\n\r\n<p>「You are ... ... 」「&hellip;&hellip;Name. I have no such thing.」On April 10th, Itsuka Shido encountered a girl who called herself a Spirit. A girl that is denied by the world, but I only wished to see her happy. A new age of boy meets girl!!</p>\r\n\r\n<h3>Fujimi Shobo&#39;s Summary</h3>\r\n\r\n<p>April 10th. Yesterday was the last day of spring vacation, so starting this morning it was a school day. After being woken up by his cute little sister, Itsuka Shido believed that it would be the start of another normal day. As for predicting the chance meeting with the girl who called herself a Spirit......</p>\r\n\r\n<p>Along with a sudden shockwave, the townscape vanished without a trace. In a corner of the street which had now become a crater, the girl was there.</p>\r\n\r\n<p>&quot;&mdash;You, have you come to kill me too?&quot;</p>\r\n\r\n<p>She is the disaster that will destroy humanity, a monster of unknown origin, and a being rejected by the world. There are only two ways to stop this girl: annihilation, and conversation. His little sister Kotori, wrapped in a military uniform, thus said to Shido: &quot;Since it&#39;s like this, just go date her, and make the Spirit fall for you!&quot; &quot;Wh.. whaaaaaaaat!?&quot; Enter a new age of boy meets girl!!</p>\r\n', 4, 3, 2, 2, '2020-09-28 15:23:49', NULL, 1, 'datealive', '<p><strong>Tohka Dead End</strong>&nbsp;(十香デッドエンド,&nbsp;<em>Tōka Deddo Endo</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 1st&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date', 'datealive'),
(50, 'Date A Live tập 3', '1601400814Date A Live tập 30.png/1601400814Date A Live tập 31.png/1601400814Date A Live tập 32.png/1601400814Date A Live tập 33.png/1601400814Date A Live tập 34.png', 123123, 312, '<p><strong>Kurumi Killer</strong>&nbsp;(狂三キラー,&nbsp;<em>Kurumi Kirā</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 3rd&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date_A_Live\">Date A Live</a>&nbsp;series.The novel was released on November 19, 2011.</p>\r\n', '<p>June 5th. Disaster came unexpectedly. &quot;I am a Spirit&rdquo;, a girl who has been transferred to a class in a classroom smiled and said that. The worst Spirit that kills people with her own hands - Kurumi. Also, a girl who claims to be Shido&rsquo;s real younger sister appeared!</p>\r\n\r\n<h3>Fujimi Shobo&#39;s Summary</h3>\r\n\r\n<p>June 5th. Disaster suddenly came to the high school that Shido attends. &ldquo;I am a Spirit&rdquo;, a shocking self-introduction by Kurumi, the transfer student. The girl gave a smile and asks to be shown around the school by Shido「I have a favor for Shido-san. Can you listen?」As if embodying a calamity killing this world, the worst Spirit that takes pleasure from killing people with clear murderous intent.「Spirits appear and there is nothing else to do but kill them」And the girl who hunts to kill the Spirit, Mana. A girl who kills people, and a girl who kills the Spirit. In order to break through the nightmare, go on a date and fall in love!?</p>\r\n', 4, 8, 3, 2, '2020-09-29 17:33:34', NULL, 1, 'datealive', '<p><strong>Kurumi Killer</strong>&nbsp;(狂三キラー,&nbsp;<em>Kurumi Kirā</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 3rd&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date_A_Live\"', 'datealive'),
(51, 'Date A Live tập 4', '1601400928Date A Live 40.png/1601400928Date A Live 43.png/1601400928Date A Live 42.png/1601400928Date A Live 41.png', 312, 312, '<p><strong>Itsuka Sister</strong>&nbsp;(五河シスター,&nbsp;<em>Itsuka Shisutā</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 4th&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date_A_Live\">Date A Live</a>&nbsp;series.The novel was released on March 17, 2012.</p>\r\n', '<p>「On your knees. It&rsquo;s time to start the punishment session of love.」The fourth Spirit, Itsuka Kotori appears before the worst Spirit, Kurumi. 「Kotori, what are you!? 」「Shido&rsquo;s cute little sister.」The beginning of everything occurred 5 years ago ――!?</p>\r\n\r\n<h3>Fujimi Shobo&#39;s Summary</h3>\r\n\r\n<p>Saving the worst Spirit Kurumi also meant saving Mana. In the end, Shido couldn&rsquo;t do anything. If Kotori had not appeared at that time, everything would have been over. 「Five years ago, I became a Spirit. Shido&rsquo;s recovery ability was originally my power.」She became a Spirit. The first Spirit sealed by Shido. The case arises of when Origami&rsquo;s parents were killed by a Spirit five years ago. 「Not today, but tomorrow I&rsquo;ll go on a date with Onii-chan.」The time limit is a single day. Be it the cute little sister or the confident Commander, to save her go on a date and fall in love!?―.</p>\r\n', 4, 9, 3, 2, '2020-09-29 17:35:28', NULL, 1, 'datealive', '<p><strong>Itsuka Sister</strong>&nbsp;(五河シスター,&nbsp;<em>Itsuka Shisutā</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 4th&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date_A_L', 'datealive'),
(52, 'Date A Live tập 6', '1601401020Date A Live tập 60.jpg/1601401020Date A Live tập 63.png/1601401020Date A Live tập 62.png/1601401020Date A Live tập 61.png/1601401020Date A Live tập 64.png', 123123, 312, '<p><strong>Miku Lily</strong>&nbsp;(美九リリィ,&nbsp;<em>Miku Rirī</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 6th&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date_A_Live\">Date A Live</a>&nbsp;series. The novel was released on December 20, 2012.</p>\r\n', '<p>During the preparations for Tenguu cultural festival held by ten schools, Shido encountered the sixth Spirit, Miku. At every attempt at a conversation, 「What are you talking about? Please stop, you&rsquo;re making me feel sick.」It seems like Miku hates men ――!?</p>\r\n\r\n<h3>Fujimi Shobo&#39;s Summary</h3>\r\n\r\n<p>September 8th, a cultural festival jointly organized by 10 high schools in Tenguu City - the Tenguu Festival is approaching. Itsuka Shido, while busy preparing as the executive committee leader, comes in contact with the sixth Spirit. 「This is ... a song ...?」The Spirit who wears a light dress on an uninhabited stage and makes a solo accompaniment, Miku. Without out delay, Shido tries to start a conversation &hellip;.「What are you talking about? Please stop, you&rsquo;re making me feel sick. Stop talking.」Everytime you speak, the affection level plummets. Go on a date and make the man-hating idol Spirit fall in love!?</p>\r\n', 4, 8, 3, 2, '2020-09-29 17:37:00', NULL, 1, 'datealive', '<p><strong>Miku Lily</strong>&nbsp;(美九リリィ,&nbsp;<em>Miku Rirī</em><a href=\"http://en.wikipedia.org/wiki/Help:Installing_Japanese_character_sets\">?</a>) is the 6th&nbsp;light novel of the&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Date_A_Live\">Date ', 'datealive'),
(53, 'Date A Live tập 7', '1601401156Date A Live tập 70.jpg/1601401156Date A Live tập 73.png/1601401156Date A Live tập 72.png/1601401156Date A Live tập 71.png', 312, 312, '<p>「I only wish to help&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Shido_Itsuka\">Shido-san</a>! 」The worst Spirit, Tokisaki Kurumi appeared before Shido, who is in a desperate situation. She offers her power to help rescue Tohka from DEM――!?</p>\r\n', '<p>Hey Shidō-san, don&rsquo;t you need help to rescue Tohka-san?」The sixth Spirit Miku used her angel to brainwash the citizens of Tenguu City, Yoshino, and the Yamai Sisters. With Tohka captured by DEM and unable to receive support from Ratatoskr, a girl appeared before Itsuka Shido -the worst Spirit that had once tried to kill him, Kurumi. Despite the risk of borrowing her power, Shido, determined to rescue Tohka, continues to fight. 「Let&rsquo;s begin our war.」To save the Spirit, Miku, who possess warped perceptions about humans, go once more on a date and make her fall in love!?</p>\r\n', 4, 8, 3, 2, '2020-09-29 17:39:16', NULL, 1, 'datealive', '<p>「I only wish to help&nbsp;<a href=\"https://date-a-live.fandom.com/wiki/Shido_Itsuka\">Shido-san</a>! 」The worst Spirit, Tokisaki Kurumi appeared before Shido, who is in a desperate situation. She offers her power to help rescue Tohka from DEM――!?</p>\r\n', 'datealive'),
(55, 'đâsdasda', '1601401577đâsdasda0.png/1601401577đâsdasda1.png/1601401577đâsdasda2.png/1601401577đâsdasda3.jpg', 312, 3123, '<p>3123123</p>\r\n', '<p>312</p>\r\n', 4, 7, 2, 1, '2020-09-29 17:46:17', NULL, 1, '1', '<p>3123123</p>\r\n', ''),
(56, 'a a a ', '1601401604a a a 0.png/1601401604a a a 1.png/1601401604a a a 2.png/1601401604a a a 3.jpg', 31231, 2312, '<p>312312</p>\r\n', '<p>312</p>\r\n', 4, 3, 2, 1, '2020-09-29 17:46:44', NULL, 1, '312', '<p>312312</p>\r\n', ''),
(57, 'Date A Live tập 19', '1601401718Date A Live tập 190.jpg/1601401718Date A Live tập 191.png/1601401718Date A Live tập 192.png/1601401718Date A Live tập 193.png', 3123, 12312, '<p>Now――Let&#39;s begin the war that will decide the world&#39;s fate.</p>\r\n\r\n<p>By Takamiya Mio, everything that have accumulated so far has been destroyed. In order to avoid the worst ending, Shido chose the final way to deal with Mio. Dating, and make her fall in love. Believing that&#39;s the way to stop a girl who kills the world.</p>\r\n', '<p>Reine-san. ―Would you like to go on a date with me tomorrow?&rdquo;</p>\r\n\r\n<p>At the moment of the worst end invited by Takamiya Mio, Shido used the Sixth Bullet and succeeded in returning to the day before the decisive battle. The Spirits collapsed without any means against the strongest Spirit. Shido recalls the desperate difference in power. The only way to neutralize the Spirit is through dialogue, not by force, the method they&rsquo;ve done so far―date and make her fall in love.</p>\r\n\r\n<p>&ldquo;With everyone lending their strength, our war will begin.&rdquo;</p>\r\n\r\n<p>With the support of all the Spirits, with the fate of the world at stake, date the Spirit of Origin and make her fall in love!?</p>\r\n', 4, 8, 3, 2, '2020-09-29 17:48:38', NULL, 1, '', '<p>Now――Let&#39;s begin the war that will decide the world&#39;s fate.</p>\r\n\r\n<p>By Takamiya Mio, everything that have accumulated so far has been destroyed. In order to avoid the worst ending, Shido chose the final way to deal with Mio. Dating, and make ', '');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`product_id`, `category_id`, `created_at`) VALUES
(23, 5, '2020-09-25 16:15:51'),
(23, 9, '2020-09-25 16:15:51'),
(26, 1, '2020-09-25 14:01:14'),
(26, 2, '2020-09-25 14:01:14'),
(26, 5, '2020-09-25 14:01:14'),
(26, 6, '2020-09-25 14:01:14'),
(26, 9, '2020-09-25 14:01:14'),
(29, 1, '2020-09-24 17:02:50'),
(29, 5, '2020-09-24 17:02:50'),
(29, 9, '2020-09-24 17:02:50'),
(30, 1, '2020-09-25 17:00:05'),
(30, 5, '2020-09-25 17:00:05'),
(30, 9, '2020-09-25 17:00:05'),
(38, 1, '2020-09-25 12:24:55'),
(38, 5, '2020-09-25 12:24:55'),
(38, 9, '2020-09-25 12:24:55'),
(39, 1, '2020-09-25 16:55:40'),
(39, 9, '2020-09-25 16:55:40'),
(45, 1, '2020-09-25 12:32:55'),
(45, 5, '2020-09-25 12:32:55'),
(45, 9, '2020-09-25 12:32:55'),
(46, 1, '2020-09-25 12:35:25'),
(46, 5, '2020-09-25 12:35:25'),
(46, 9, '2020-09-25 12:35:25'),
(47, 1, '2020-09-25 12:39:42'),
(47, 5, '2020-09-25 12:39:42'),
(47, 9, '2020-09-25 12:39:42'),
(48, 1, '2020-09-25 16:11:27'),
(48, 5, '2020-09-25 16:11:27'),
(48, 9, '2020-09-25 16:11:27'),
(49, 1, '2020-09-28 15:23:49'),
(50, 1, '2020-09-29 17:33:34'),
(51, 1, '2020-09-29 17:35:28'),
(52, 1, '2020-09-29 17:37:00'),
(53, 1, '2020-09-29 17:39:16'),
(55, 1, '2020-09-29 17:46:17'),
(56, 5, '2020-09-29 17:46:44'),
(57, 5, '2020-09-29 17:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `product_tag`
--

CREATE TABLE `product_tag` (
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tag`
--

INSERT INTO `product_tag` (`product_id`, `tag_id`, `created_at`) VALUES
(23, 1, '2020-09-25 16:15:51'),
(23, 7, '2020-09-25 16:15:51'),
(26, 1, '2020-09-25 14:01:14'),
(26, 7, '2020-09-25 14:01:14'),
(29, 1, '2020-09-24 17:02:50'),
(29, 7, '2020-09-24 17:02:50'),
(30, 1, '2020-09-25 17:00:05'),
(30, 7, '2020-09-25 17:00:05'),
(38, 1, '2020-09-25 12:24:55'),
(38, 7, '2020-09-25 12:24:55'),
(39, 1, '2020-09-25 16:55:40'),
(45, 1, '2020-09-25 12:32:55'),
(45, 7, '2020-09-25 12:32:55'),
(46, 1, '2020-09-25 12:35:25'),
(46, 7, '2020-09-25 12:35:25'),
(47, 1, '2020-09-25 12:39:42'),
(47, 7, '2020-09-25 12:39:42'),
(48, 1, '2020-09-25 16:11:27'),
(48, 7, '2020-09-25 16:11:27'),
(49, 1, '2020-09-28 15:23:49'),
(49, 2, '2020-09-28 15:23:49'),
(49, 3, '2020-09-28 15:23:49'),
(49, 8, '2020-09-28 15:23:49'),
(49, 9, '2020-09-28 15:23:49'),
(49, 11, '2020-09-28 15:23:49'),
(50, 1, '2020-09-29 17:33:34'),
(50, 2, '2020-09-29 17:33:34'),
(50, 8, '2020-09-29 17:33:34'),
(50, 9, '2020-09-29 17:33:34'),
(50, 13, '2020-09-29 17:33:34'),
(50, 15, '2020-09-29 17:33:34'),
(50, 23, '2020-09-29 17:33:34'),
(51, 1, '2020-09-29 17:35:28'),
(51, 2, '2020-09-29 17:35:28'),
(51, 7, '2020-09-29 17:35:28'),
(51, 8, '2020-09-29 17:35:28'),
(51, 16, '2020-09-29 17:35:28'),
(52, 1, '2020-09-29 17:37:00'),
(52, 2, '2020-09-29 17:37:00'),
(52, 7, '2020-09-29 17:37:00'),
(52, 16, '2020-09-29 17:37:00'),
(52, 47, '2020-09-29 17:37:00'),
(53, 1, '2020-09-29 17:39:16'),
(53, 2, '2020-09-29 17:39:16'),
(53, 11, '2020-09-29 17:39:16'),
(53, 18, '2020-09-29 17:39:16'),
(55, 7, '2020-09-29 17:46:17'),
(56, 11, '2020-09-29 17:46:44'),
(57, 1, '2020-09-29 17:48:38'),
(57, 2, '2020-09-29 17:48:38'),
(57, 7, '2020-09-29 17:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `country` varchar(5) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `avatar`, `title`, `description`, `phone`, `country`, `address`, `email`, `created_at`, `updated_at`, `status`) VALUES
(3, 'example.jpg', 'Kim Đồng', '<p>1323123</p>\r\n', '0966141598', '+84', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-11 16:25:45', '2020-09-15 21:39:05', 1),
(6, 'example.jpg', '3123', '<p>31231231</p>\r\n', '0966141598', '+66', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-12 16:07:19', NULL, 1),
(7, 'example.jpg', '3123', '<p>123123</p>\r\n', '0966141598', '+84', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-18 14:33:24', NULL, 1),
(8, 'example.jpg', 'KADOKAWA', '<p>3123123</p>\r\n', '2661415911', '+81', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-28 15:17:16', NULL, 1),
(9, 'example.jpg', 'KADOKAWA', '<p>đ&acirc;s</p>\r\n', '0966141598', '+81', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-28 15:17:42', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `country` varchar(5) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `title`, `description`, `phone`, `country`, `address`, `email`, `created_at`, `updated_at`, `status`) VALUES
(2, 'Thái Hà Book', '<p>abacascas</p>\r\n', '966141598', '+255', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-11 17:06:58', '2020-09-12 23:08:51', 1),
(3, 'Shoppe Mall', '', '0966141596', '+84', 'Số 27, ngõ 50,phố Chính Kinh,Nhân Chính', 'gaconbibenh@gmail.com', '2020-09-28 15:22:44', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(9, 'Sách báo', '<p>3123123</p>\r\n', '2020-09-11 17:13:11', NULL, 1),
(10, '3123', '<p>123123</p>\r\n', '2020-09-28 10:43:21', NULL, 0),
(11, 'Adventure', '', '2020-09-28 14:57:49', NULL, 1),
(12, 'Chinese Novel', '', '2020-09-28 14:57:49', NULL, 1),
(13, 'Cooking', '', '2020-09-28 14:57:49', NULL, 1),
(14, 'Drama', '', '2020-09-28 14:57:49', NULL, 1),
(15, 'English Novel', '', '2020-09-28 14:57:49', NULL, 1),
(16, 'Fantasy', '', '2020-09-28 14:57:49', NULL, 1),
(17, 'Gender Bender', '', '2020-09-28 14:57:49', NULL, 1),
(18, 'Harem', '', '2020-09-28 14:57:49', NULL, 1),
(19, 'Historical', '', '2020-09-28 14:57:49', NULL, 1),
(20, 'Horror', '', '2020-09-28 14:57:49', NULL, 1),
(21, 'Magic', '', '2020-09-28 14:57:49', NULL, 1),
(22, 'Korean Novel', '', '2020-09-28 14:57:49', NULL, 1),
(23, 'Mystery', '', '2020-09-28 14:57:49', NULL, 1),
(24, 'Military', '', '2020-09-28 14:57:49', NULL, 1),
(25, 'Mecha', '', '2020-09-28 14:57:49', NULL, 1),
(26, 'Game', '', '2020-09-28 14:57:49', NULL, 1),
(27, 'Martial Arts', '', '2020-09-28 14:57:49', NULL, 1),
(28, 'Josei', '', '2020-09-28 14:57:49', NULL, 1),
(29, 'Isekai', '', '2020-09-28 14:57:49', NULL, 1),
(30, 'Incest', '', '2020-09-28 14:57:49', NULL, 1),
(31, 'Mature', '', '2020-09-28 14:57:49', NULL, 1),
(32, 'Netorare', '', '2020-09-28 14:57:49', NULL, 1),
(33, 'One shot', '', '2020-09-28 14:57:49', NULL, 1),
(34, 'Otome Game', '', '2020-09-28 14:57:49', NULL, 1),
(35, 'Psychological', '', '2020-09-28 14:57:49', NULL, 1),
(36, 'Reverse Harem', '', '2020-09-28 14:57:49', NULL, 1),
(37, 'Romance', '', '2020-09-28 14:57:49', NULL, 1),
(38, 'School Life', '', '2020-09-28 14:57:49', NULL, 1),
(39, 'Shoujo', '', '2020-09-28 14:57:49', NULL, 1),
(40, 'Science Fiction', '', '2020-09-28 14:57:49', NULL, 1),
(41, 'Seinen', '', '2020-09-28 14:57:49', NULL, 1),
(42, 'Shoujo ai', '', '2020-09-28 14:57:49', NULL, 1),
(43, 'Shounen', '', '2020-09-28 14:57:49', NULL, 1),
(44, 'Shounen ai', '', '2020-09-28 14:57:49', NULL, 1),
(45, 'Slice of Life', '', '2020-09-28 14:57:49', NULL, 1),
(46, 'Sports', '', '2020-09-28 14:57:49', NULL, 1),
(47, 'Super Power', '', '2020-09-28 14:57:49', NULL, 1),
(48, 'Supernatural', '', '2020-09-28 14:57:49', NULL, 1),
(49, 'Suspense', '', '2020-09-28 14:57:49', NULL, 1),
(50, 'Tragedy', '', '2020-09-28 14:57:49', NULL, 1),
(51, 'Web Novel', '', '2020-09-28 14:57:49', NULL, 1),
(52, 'Yuri', '', '2020-09-28 14:57:49', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `title`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, '3123123', '<p>312312312sss</p>\r\n', '2020-09-11 17:14:34', '2020-09-12 00:14:57', 1),
(2, 'Sách', '', '2020-09-28 15:22:24', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` text DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_author` (`author_id`),
  ADD KEY `fk_product_publisher` (`publisher_id`),
  ADD KEY `fk_product_supplier` (`supplier_id`),
  ADD KEY `fk_product_type` (`type_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`product_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_tag`
--
ALTER TABLE `product_tag`
  ADD PRIMARY KEY (`product_id`,`tag_id`),
  ADD KEY `fk_tag` (`tag_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
