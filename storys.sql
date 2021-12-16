-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-16 15:11:02
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
-- 資料表結構 `storys`
--

CREATE TABLE `storys` (
  `id` int(11) NOT NULL,
  `title` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `title_en` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `intro_en` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `author_id` int(11) UNSIGNED NOT NULL,
  `src` varchar(30) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `create_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `storys`
--

INSERT INTO `storys` (`id`, `title`, `title_en`, `intro`, `intro_en`, `author_id`, `src`, `create_time`) VALUES
(1, '網站介紹', 'Site Introduction ', '網站介紹', 'Site Introduction ', 1, './img_story/google.jpg', '2021-12-16 13:26:17');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `storys`
--
ALTER TABLE `storys`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `storys`
--
ALTER TABLE `storys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
