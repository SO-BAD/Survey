-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-16 15:11:10
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `survey`
--

-- --------------------------------------------------------

--
-- 資料表結構 `story_pages`
--

CREATE TABLE `story_pages` (
  `id` int(11) UNSIGNED DEFAULT NULL,
  `s_id` int(11) UNSIGNED NOT NULL,
  `page_num` int(10) UNSIGNED NOT NULL,
  `src` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `zh-tw` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `en` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
