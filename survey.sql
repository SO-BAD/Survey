-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-03 09:32:35
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

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
-- 資料表結構 `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) UNSIGNED NOT NULL,
  `account` varchar(22) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(22) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `birthday` date NOT NULL,
  `live` varchar(2) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `permission` int(5) UNSIGNED NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `password`, `name`, `gender`, `birthday`, `live`, `permission`, `create_time`) VALUES
(1, 'test', 'test', 'han', 1, '1989-09-23', 'S', 3, '2021-11-24 21:07:35'),
(2, 'test1', 'test1', 'amy', 0, '2021-11-22', 'A', 0, '2021-11-29 21:23:38'),
(3, 'test1234', 'test1234', 'test1234', 1, '2021-11-02', 'A', 0, '2021-11-30 22:19:04'),
(4, 'qwe12345', 'qwe12345', 'qwe12345', 1, '2021-11-23', 'A', 0, '2021-11-30 22:36:35'),
(5, 'ttttttttttt', 'ttttttttttt', 'ttttttttttt', 1, '2021-11-02', 'A', 0, '2021-11-30 22:44:50'),
(6, 'test12345', 'test12345', 'test12345', 1, '2021-11-01', 'A', 0, '2021-11-30 22:52:31'),
(7, 'test123456', 'test123456', 'test123456', 1, '2021-11-08', 'A', 0, '2021-11-30 22:56:22'),
(8, 'moon1234', 'moon1234', 'moon', 0, '2021-12-04', 'F', 0, '2021-12-03 08:11:17');

-- --------------------------------------------------------

--
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `sh` tinyint(1) NOT NULL,
  `intro` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `src` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `ad`
--

INSERT INTO `ad` (`id`, `name`, `sh`, `intro`, `src`) VALUES
(1, 'A02.jpg', 0, '45614613', './images/A02.jpg'),
(2, '9b3b068a-f7fa-4727-8cb5-20fd8d60549e.jpg', 0, '', './images/9b3b068a-f7fa-4727-8cb5-20fd8d60549e.jpg'),
(3, 'melon_PNG14382.png', 0, '', './images/melon_PNG14382.png'),
(4, '髮絲去背.jpg', 0, '13132', './images/髮絲去背.jpg'),
(5, 'index.php', 0, '', './images/index.php');

-- --------------------------------------------------------

--
-- 資料表結構 `opts`
--

CREATE TABLE `opts` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `opt_num` int(11) NOT NULL,
  `opt` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `opts`
--

INSERT INTO `opts` (`id`, `s_id`, `num`, `opt_num`, `opt`, `status`, `count`) VALUES
(1, 1, 0, 0, 'LIKE', 0, 0),
(2, 1, 0, 1, 'CAT', 0, 0),
(3, 1, 0, 2, 'DOG', 0, 2),
(4, 2, 0, 0, '吃甚麼', 0, 0),
(5, 2, 0, 1, '炒飯', 0, 1),
(6, 2, 0, 2, '炒麵', 0, 1),
(7, 3, 0, 0, '問題1', 0, 0),
(8, 3, 0, 1, '1', 0, 2),
(9, 3, 0, 2, '2', 0, 0),
(10, 3, 0, 3, '5', 0, 1),
(11, 3, 1, 0, '問題2', 0, 0),
(12, 3, 1, 1, '5', 0, 2),
(13, 3, 1, 2, '4', 0, 1),
(18, 4, 0, 0, '鳥鳥品種', 0, 0),
(19, 4, 0, 1, '玄鳳', 0, 1),
(20, 4, 0, 2, '虎皮鸚哥', 0, 0),
(21, 4, 0, 3, '巴丹', 0, 0),
(22, 4, 0, 4, '金剛鸚鵡', 0, 1),
(23, 4, 0, 5, '和尚鸚鵡', 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `surveylog`
--

CREATE TABLE `surveylog` (
  `id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `q_num` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `surveylog`
--

INSERT INTO `surveylog` (`id`, `s_id`, `q_num`, `answer`, `u_id`) VALUES
(4, 3, 0, 1, 1),
(5, 3, 1, 1, 1),
(6, 2, 0, 1, 1),
(7, 1, 0, 2, 1),
(8, 3, 0, 1, 2),
(9, 3, 1, 1, 2),
(10, 1, 0, 2, 8),
(11, 2, 0, 2, 8),
(12, 3, 0, 3, 8),
(13, 3, 1, 2, 8),
(14, 4, 0, 1, 8),
(15, 4, 0, 4, 6);

-- --------------------------------------------------------

--
-- 資料表結構 `surveys`
--

CREATE TABLE `surveys` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `author` varchar(30) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `create_time` datetime NOT NULL DEFAULT current_timestamp(),
  `edit_time` datetime NOT NULL,
  `end_time` date NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `count` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `surveys`
--

INSERT INTO `surveys` (`id`, `title`, `author`, `create_time`, `edit_time`, `end_time`, `status`, `count`) VALUES
(1, '寵物', 'han', '2021-12-02 13:54:08', '0000-00-00 00:00:00', '2021-12-09', 0, 2),
(2, '晚餐', 'han', '2021-12-02 14:12:05', '0000-00-00 00:00:00', '2021-12-09', 0, 2),
(3, '很多問題', 'han', '2021-12-02 15:25:40', '0000-00-00 00:00:00', '2021-12-22', 0, 3),
(4, '鳥鳥ˋˊ', 'moon', '2021-12-03 13:20:47', '0000-00-00 00:00:00', '2022-06-29', 0, 2);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `opts`
--
ALTER TABLE `opts`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `surveylog`
--
ALTER TABLE `surveylog`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `opts`
--
ALTER TABLE `opts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surveylog`
--
ALTER TABLE `surveylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
