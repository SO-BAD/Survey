-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-27 01:14:08
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
  `permission` int(5) NOT NULL DEFAULT 0,
  `create_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `accounts`
--

INSERT INTO `accounts` (`id`, `account`, `password`, `name`, `gender`, `birthday`, `live`, `permission`, `create_time`) VALUES
(1, 'test', 'test', 'admin', 1, '1989-08-31', 'A', 3, '2021-11-24 21:07:35'),
(2, 'test1', 'test1', 'amy', 0, '2021-11-22', 'A', 0, '2021-11-29 21:23:38'),
(3, 'test1234', 'test1234', 'test1234', 1, '2021-11-02', 'A', 0, '2021-11-30 22:19:04'),
(4, 'qwe12345', 'qwe12345', 'qwe12345', 1, '2021-11-23', 'A', 0, '2021-11-30 22:36:35'),
(5, 'ttttttttttt', 'ttttttttttt', 'ttttttttttt', 1, '2021-11-02', 'A', 0, '2021-11-30 22:44:50'),
(6, 'test12345', 'test12345', 'test12345', 1, '2021-11-01', 'A', 0, '2021-11-30 22:52:31'),
(7, 'test123456', 'test123456', 'test123456', 1, '2021-11-08', 'A', 0, '2021-11-30 22:56:22'),
(8, 'moon1234', 'moon1234', 'moon', 0, '2021-12-04', 'F', 0, '2021-12-03 08:11:17'),
(9, 'testtest', 'testtest', 'testtest', 1, '2021-12-08', 'A', 0, '2021-12-06 13:07:26'),
(10, 'testtesttest', 'testtesttest', 'testtesttest', 1, '2021-12-07', 'A', 0, '2021-12-06 13:52:21'),
(11, 'admin1234', 'admin1234', 'admin1234', 0, '2021-12-23', 'A', 0, '2021-12-23 10:36:05'),
(12, 'admin12345', '1234', 'admin123', 1, '2021-12-25', 'A', 0, '2021-12-23 10:38:51');

-- --------------------------------------------------------

--
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `intro` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `src` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `orderNum` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `ad`
--

INSERT INTO `ad` (`id`, `name`, `status`, `intro`, `src`, `orderNum`) VALUES
(2, 'ad 的介紹2', 0, 'ad 的介紹2', './ad/img2.jpg', 1),
(3, '介紹3', 0, '介紹3333', './ad/img3.jpg', 9),
(11, 'sdsa', 0, 'sadsa', './ad/box.jpg', 0),
(12, 'sad', 0, 'sad', './ad/黎明願景.jpg', 0);

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
(5, 2, 0, 1, '炒飯', 0, 2),
(6, 2, 0, 2, '炒麵', 0, 1),
(7, 3, 0, 0, '問題1', 0, 0),
(8, 3, 0, 1, '1', 0, 3),
(9, 3, 0, 2, '2', 0, 0),
(10, 3, 0, 3, '5', 0, 1),
(11, 3, 1, 0, '問題2', 0, 0),
(12, 3, 1, 1, '5', 0, 3),
(13, 3, 1, 2, '4', 0, 1),
(18, 4, 0, 0, '鳥鳥品種', 0, 0),
(19, 4, 0, 1, '玄鳳', 0, 2),
(20, 4, 0, 2, '虎皮鸚哥', 0, 0),
(21, 4, 0, 3, '巴丹', 0, 0),
(22, 4, 0, 4, '金剛鸚鵡', 0, 1),
(23, 4, 0, 5, '和尚鸚鵡', 0, 0),
(24, 5, 0, 0, '0.0.', 0, 0),
(25, 5, 0, 1, '1.1.', 0, 1),
(26, 5, 0, 2, '1.1.', 0, 0),
(27, 5, 0, 3, '1.1.', 0, 0),
(28, 5, 0, 4, '2.3', 0, 1),
(29, 5, 0, 5, '23.5', 0, 0),
(31, 6, 0, 0, '一個男生洗澡5分鐘 一個女生洗澡15分鐘 請問一起洗會花幾分', 0, 0),
(32, 6, 0, 1, '5 分', 0, 0),
(33, 6, 0, 2, '15 分', 0, 0),
(34, 6, 0, 3, '20 分', 0, 0),
(35, 6, 0, 4, '60 分', 0, 1),
(36, 6, 0, 5, '120 分', 0, 1),
(39, 8, 0, 0, '鞋子買幾號', 0, 0),
(40, 8, 0, 1, '8號', 0, 0),
(41, 8, 0, 2, '9號', 0, 0),
(42, 8, 0, 3, '7號', 0, 1),
(43, 8, 1, 0, '清潔劑順便買', 0, 0),
(44, 8, 1, 1, '買', 0, 0),
(45, 8, 1, 2, '不買', 0, 1),
(46, 9, 0, 0, 'arafra', 0, 0),
(47, 9, 0, 1, 'sadsad', 0, 0),
(48, 10, 0, 0, '1111', 0, 0),
(49, 10, 0, 1, '11111', 0, 0),
(50, 11, 0, 0, 'sadas', 0, 0),
(51, 11, 0, 1, 'sadsa', 0, 0),
(52, 11, 0, 2, 'sda', 0, 1),
(53, 12, 0, 0, 'sadsad', 0, 0),
(54, 12, 0, 1, 'sadsadsaddsa', 0, 0),
(55, 13, 0, 0, 'dsasa', 0, 0),
(56, 13, 0, 1, 'dsadsada', 0, 0),
(57, 13, 0, 2, 'dsadsad', 0, 0),
(58, 13, 1, 0, 'dsa', 0, 0),
(59, 13, 1, 1, 'dsasadsda', 0, 0),
(60, 14, 0, 0, 'sadsa', 0, 0),
(61, 14, 0, 1, 'ddsadsad', 0, 0),
(62, 14, 0, 2, 'dsadsa', 0, 0),
(63, 15, 0, 0, 'sasadsad', 0, 0),
(64, 15, 0, 1, 'adasdsadsa', 0, 0),
(65, 16, 0, 0, 'sadsad', 0, 0),
(66, 16, 0, 1, 'dsadsad', 0, 0),
(67, 17, 0, 0, 'sadsad', 0, 0),
(68, 17, 0, 1, 'sadsad', 0, 0),
(69, 18, 0, 0, 'sadsa', 0, 0),
(70, 18, 0, 1, 'sadsadsa', 0, 0),
(71, 19, 0, 0, 'aa', 0, 0),
(72, 19, 0, 1, 'a', 0, 0),
(73, 19, 1, 0, 'aa', 0, 0),
(74, 19, 1, 1, '1', 0, 0),
(75, 20, 0, 0, 'aaa', 0, 0),
(76, 20, 0, 1, 'aa', 0, 0),
(77, 20, 1, 0, 'aaa', 0, 0),
(78, 20, 1, 1, '131', 0, 0),
(79, 21, 0, 0, 'aa', 0, 0),
(80, 21, 0, 1, 'a', 0, 0),
(81, 21, 0, 2, 'a', 0, 0),
(82, 21, 1, 0, 'aa', 0, 0),
(83, 21, 1, 1, '1', 0, 0),
(84, 22, 0, 0, 'asa', 0, 0),
(85, 22, 0, 1, 'aaa', 0, 0),
(86, 22, 1, 0, 'asa', 0, 0),
(87, 22, 1, 1, 'a', 0, 0),
(88, 23, 0, 0, 'aa', 0, 0),
(89, 23, 0, 1, 'aa', 0, 0),
(90, 23, 1, 0, 'aa', 0, 0),
(91, 24, 0, 0, 'aa', 0, 0),
(92, 24, 0, 1, 'aa', 0, 0),
(93, 24, 0, 2, 'aa', 0, 0),
(94, 24, 0, 3, 'aa', 0, 0),
(95, 24, 1, 0, 'aa', 0, 0),
(96, 25, 0, 0, 'aaa', 0, 0),
(97, 25, 0, 1, 'aaa', 0, 0),
(98, 25, 0, 2, 'aaa', 0, 0),
(99, 25, 1, 0, 'aaa', 0, 0),
(100, 26, 0, 0, 'sadsad', 0, 0),
(101, 26, 0, 1, 'sadsadsad', 0, 0),
(102, 26, 0, 2, '', 0, 0),
(103, 27, 0, 0, 'sadsad', 0, 0),
(104, 27, 0, 1, 'sadsad', 0, 0),
(105, 27, 0, 2, 'sad', 0, 0),
(106, 27, 0, 3, 'ad', 0, 0),
(107, 27, 1, 0, 'ad', 0, 0),
(108, 27, 1, 1, 'sad', 0, 0),
(109, 28, 0, 0, 'aaa', 0, 0),
(110, 28, 0, 1, 'aa', 0, 0),
(111, 28, 0, 2, 'b', 0, 0),
(112, 28, 1, 0, 'aa', 0, 0),
(113, 28, 1, 1, 'aa', 0, 0),
(114, 28, 1, 2, 'b', 0, 0);

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
(15, 4, 0, 4, 6),
(16, 4, 0, 1, 1),
(17, 2, 0, 1, 7),
(18, 3, 0, 1, 7),
(19, 3, 1, 1, 7),
(20, 5, 0, 1, 1),
(21, 6, 0, 4, 1),
(22, 6, 0, 5, 3),
(23, 5, 0, 4, 3),
(24, 8, 0, 3, 1),
(25, 8, 1, 2, 1),
(26, 11, 0, 2, 1);

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
(1, '寵物', 'han', '2021-12-02 13:54:08', '0000-00-00 00:00:00', '2021-12-01', 2, 2),
(2, '晚餐', 'han', '2021-12-02 14:12:05', '0000-00-00 00:00:00', '2021-12-09', 2, 3),
(3, '很多問題', 'han', '2021-12-02 15:25:40', '0000-00-00 00:00:00', '2021-12-22', 1, 4),
(4, '鳥鳥ˋˊ', 'moon', '2021-12-03 13:20:47', '0000-00-00 00:00:00', '2022-06-29', 1, 3),
(5, '.0.', 'hans', '2021-12-08 15:36:52', '0000-00-00 00:00:00', '2021-12-16', 2, 2),
(6, 'Math', 'hans', '2021-12-08 15:39:52', '0000-00-00 00:00:00', '2021-12-24', 0, 2),
(8, '買鞋子', 'hans', '2021-12-09 14:52:45', '0000-00-00 00:00:00', '2021-12-31', 0, 1),
(9, 'treta', 'admin', '2021-12-15 12:13:22', '0000-00-00 00:00:00', '2021-12-16', 2, 0),
(10, '12111', 'admin', '2021-12-15 12:24:27', '0000-00-00 00:00:00', '2021-12-16', 2, 0),
(11, 'sadsad', 'admin', '2021-12-15 14:39:55', '0000-00-00 00:00:00', '2021-12-21', 2, 1),
(12, 'sadsad', 'admin', '2021-12-16 11:54:23', '0000-00-00 00:00:00', '2021-12-17', 2, 0),
(13, 'dsadsad', 'admin', '2021-12-16 11:54:44', '0000-00-00 00:00:00', '2021-12-29', 0, 0),
(14, 'dffds', 'admin', '2021-12-16 14:11:10', '0000-00-00 00:00:00', '2021-12-23', 2, 0),
(15, 'sadsadsad', 'admin', '2021-12-16 14:11:15', '0000-00-00 00:00:00', '2021-12-29', 0, 0),
(16, 'dsadsa', 'admin', '2021-12-16 14:11:22', '0000-00-00 00:00:00', '2021-12-29', 0, 0),
(17, 'sadsadsa', 'admin', '2021-12-16 14:11:29', '0000-00-00 00:00:00', '2021-12-30', 0, 0),
(18, 'dsadsad', 'admin', '2021-12-16 14:11:35', '0000-00-00 00:00:00', '2022-01-06', 0, 0),
(19, 'dsadsad', 'admin', '2021-12-20 08:26:29', '0000-00-00 00:00:00', '2022-01-05', 0, 0),
(20, 'aaa', 'admin', '2021-12-20 08:28:38', '0000-00-00 00:00:00', '2021-12-29', 1, 0),
(21, 'aaaaa', 'admin', '2021-12-20 08:29:23', '0000-00-00 00:00:00', '2021-12-30', 0, 0),
(22, 'asadsa', 'admin', '2021-12-20 08:30:55', '0000-00-00 00:00:00', '2021-12-22', 1, 0),
(23, 'sadas', 'admin', '2021-12-20 08:33:30', '0000-00-00 00:00:00', '2021-12-29', 0, 0),
(24, 'aa', 'admin', '2021-12-20 08:33:51', '0000-00-00 00:00:00', '2021-12-21', 2, 0),
(25, 'aaa', 'admin', '2021-12-20 08:34:33', '0000-00-00 00:00:00', '2021-12-21', 2, 0),
(26, 'asdsad', 'admin', '2021-12-20 08:54:48', '0000-00-00 00:00:00', '0000-00-00', 2, 0),
(27, 'sadsad', 'admin', '2021-12-20 09:50:44', '0000-00-00 00:00:00', '2021-12-23', 1, 0),
(28, 'a', 'admin', '2021-12-21 13:39:27', '0000-00-00 00:00:00', '2021-12-29', 0, 0);

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
-- 資料表索引 `storys`
--
ALTER TABLE `storys`
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `opts`
--
ALTER TABLE `opts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `storys`
--
ALTER TABLE `storys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surveylog`
--
ALTER TABLE `surveylog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
