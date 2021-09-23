-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-01-13 20:27:51
-- 伺服器版本： 10.4.17-MariaDB
-- PHP 版本： 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `a`
--

-- --------------------------------------------------------

--
-- 資料表結構 `classroom`
--
-- 建立時間： 2021-01-12 11:50:58
-- 最後更新： 2021-01-13 16:20:04
--

CREATE TABLE `classroom` (
  `classroom_id` varchar(20) NOT NULL,
  `classroom_seat` int(10) NOT NULL DEFAULT 50,
  `classroom_spec` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `classroom`:
--

--
-- 傾印資料表的資料 `classroom`
--

INSERT INTO `classroom` (`classroom_id`, `classroom_seat`, `classroom_spec`) VALUES
('1001', 50, '投影機,黑板'),
('101', 50, '投影機,黑板'),
('102', 50, '黑板'),
('103', 50, '黑板');

-- --------------------------------------------------------

--
-- 資料表結構 `course`
--
-- 建立時間： 2021-01-12 13:16:00
-- 最後更新： 2021-01-13 19:24:27
--

CREATE TABLE `course` (
  `course_id` int(20) NOT NULL,
  `course_name` varchar(30) NOT NULL,
  `course_teacher` int(20) NOT NULL,
  `classroom_id` varchar(20) NOT NULL,
  `course_max` int(10) NOT NULL,
  `course_people` int(10) NOT NULL,
  `course_credit` int(10) NOT NULL,
  `course_time` varchar(30) NOT NULL,
  `course_required` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `course`:
--   `course_teacher`
--       `user` -> `id`
--   `classroom_id`
--       `classroom` -> `classroom_id`
--

--
-- 傾印資料表的資料 `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_teacher`, `classroom_id`, `course_max`, `course_people`, `course_credit`, `course_time`, `course_required`) VALUES
(1, '資料庫系統', 2, '101', 50, 1, 3, 'R6R7R8', '必修'),
(2, '演算法', 8, '101', 50, 1, 3, 'WaWbWc', '必修'),
(3, '資訊管理系統', 3, '102', 50, 4, 3, 'W2W3W4', '選修'),
(4, '電腦動畫', 3, '101', 50, 1, 3, 'F6F7F8', '必修'),
(5, '網頁程式設計', 8, '101', 50, 1, 3, 'T2T3T4', '必修'),
(6, '數位學習教材設計', 6, '101', 50, 0, 3, 'M6M7M8', '必修'),
(7, '數位學習策略', 7, '101', 50, 0, 3, 'F6F7F8', '必修'),
(8, '數位遊戲設計與製作', 4, '101', 50, 1, 3, 'T6T7T8', '必修'),
(9, '資料結構', 3, '101', 50, 0, 3, 'T2T3T4', '必修'),
(10, '物件導向程式設計', 8, '101', 50, 0, 3, 'M6M7M8', '必修');

-- --------------------------------------------------------

--
-- 資料表結構 `enrollment`
--
-- 建立時間： 2021-01-12 07:29:43
-- 最後更新： 2021-01-13 18:57:06
--

CREATE TABLE `enrollment` (
  `id` int(20) NOT NULL,
  `course_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `enrollment`:
--   `id`
--       `user` -> `id`
--   `course_id`
--       `course` -> `course_id`
--

--
-- 傾印資料表的資料 `enrollment`
--

INSERT INTO `enrollment` (`id`, `course_id`) VALUES
(2, 1),
(3, 3),
(3, 4),
(4, 8),
(6, 6),
(7, 7),
(8, 5),
(9, 2),
(101, 1),
(101, 2),
(101, 3),
(101, 4),
(101, 5),
(101, 8),
(102, 3),
(103, 3),
(104, 3);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--
-- 建立時間： 2021-01-13 18:02:20
-- 最後更新： 2021-01-13 18:49:57
--

CREATE TABLE `user` (
  `id` int(20) NOT NULL,
  `account` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `admin` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 資料表的關聯 `user`:
--

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `admin`, `name`) VALUES
(1, 'admin', '123456', 'admin', '至高無上管理員'),
(2, 'teacher1', '123456', 'teacher', '李建億'),
(3, 'teacher2', '123456', 'teacher', '林信志'),
(4, 'teacher3', '123456', 'teacher', '莊宗嚴'),
(5, 'teacher4', '123456', 'teacher', '張智凱'),
(6, 'teacher5', '123456', 'teacher', '黃意雯'),
(7, 'teacher6', '123456', 'teacher', '伍柏翰'),
(8, 'teacher7', '123456', 'teacher', '林奇賢'),
(9, 'teacher9', '123456', 'teacher', '鄭培宇'),
(101, 'student1', '123456', 'student', '狗'),
(102, 'student2', '123456', 'student', '貓'),
(103, 'student3', '123456', 'student', '豬'),
(104, 'student4', '123456', 'student', '羊'),
(105, 'student5', '123456', 'student', '牛'),
(106, 'student6', '123456', 'student', '蛇'),
(107, 'student7', '123456', 'student', '鼠');

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `帳號_學生`
-- (請參考以下實際畫面)
--
CREATE TABLE `帳號_學生` (
`id` int(20)
,`account` varchar(30)
,`password` varchar(30)
,`admin` varchar(10)
,`name` varchar(30)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `帳號_教師`
-- (請參考以下實際畫面)
--
CREATE TABLE `帳號_教師` (
`id` int(20)
,`account` varchar(30)
,`password` varchar(30)
,`admin` varchar(10)
,`name` varchar(30)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `課程和使用者`
-- (請參考以下實際畫面)
--
CREATE TABLE `課程和使用者` (
`course_id` int(20)
,`course_name` varchar(30)
,`course_time` varchar(30)
,`course_max` int(10)
,`course_people` int(10)
,`admin` varchar(10)
,`id` int(20)
,`name` varchar(30)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `課表_學生`
-- (請參考以下實際畫面)
--
CREATE TABLE `課表_學生` (
`id` int(20)
,`name` varchar(30)
,`course_id` int(20)
,`course_name` varchar(30)
,`course_time` varchar(30)
,`course_max` int(10)
,`course_people` int(10)
,`course_credit` int(10)
,`classroom_id` varchar(20)
,`course_required` varchar(20)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `課表_教師`
-- (請參考以下實際畫面)
--
CREATE TABLE `課表_教師` (
`id` int(20)
,`name` varchar(30)
,`course_id` int(20)
,`course_name` varchar(30)
,`course_time` varchar(30)
,`course_max` int(10)
,`course_people` int(10)
,`course_credit` int(10)
,`classroom_id` varchar(20)
,`course_required` varchar(20)
);

-- --------------------------------------------------------

--
-- 替換檢視表以便查看 `點名單`
-- (請參考以下實際畫面)
--
CREATE TABLE `點名單` (
`course_id` int(20)
,`course_name` varchar(30)
,`course_people` int(10)
,`id` int(20)
,`name` varchar(30)
);

-- --------------------------------------------------------

--
-- 檢視表結構 `帳號_學生`
--
DROP TABLE IF EXISTS `帳號_學生`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `帳號_學生`  AS SELECT `u`.`id` AS `id`, `u`.`account` AS `account`, `u`.`password` AS `password`, `u`.`admin` AS `admin`, `u`.`name` AS `name` FROM `user` AS `u` WHERE `u`.`admin` = 'student' ;

-- --------------------------------------------------------

--
-- 檢視表結構 `帳號_教師`
--
DROP TABLE IF EXISTS `帳號_教師`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `帳號_教師`  AS SELECT `u`.`id` AS `id`, `u`.`account` AS `account`, `u`.`password` AS `password`, `u`.`admin` AS `admin`, `u`.`name` AS `name` FROM `user` AS `u` WHERE `u`.`admin` = 'teacher' ;

-- --------------------------------------------------------

--
-- 檢視表結構 `課程和使用者`
--
DROP TABLE IF EXISTS `課程和使用者`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `課程和使用者`  AS SELECT `e`.`course_id` AS `course_id`, `c`.`course_name` AS `course_name`, `c`.`course_time` AS `course_time`, `c`.`course_max` AS `course_max`, `c`.`course_people` AS `course_people`, `u`.`admin` AS `admin`, `e`.`id` AS `id`, `u`.`name` AS `name` FROM ((`enrollment` `e` join `course` `c` on(`e`.`course_id` = `c`.`course_id`)) join `user` `u` on(`e`.`id` = `u`.`id`)) ORDER BY `e`.`course_id` ASC ;

-- --------------------------------------------------------

--
-- 檢視表結構 `課表_學生`
--
DROP TABLE IF EXISTS `課表_學生`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `課表_學生`  AS SELECT `e`.`id` AS `id`, `u`.`name` AS `name`, `e`.`course_id` AS `course_id`, `c`.`course_name` AS `course_name`, `c`.`course_time` AS `course_time`, `c`.`course_max` AS `course_max`, `c`.`course_people` AS `course_people`, `c`.`course_credit` AS `course_credit`, `c`.`classroom_id` AS `classroom_id`, `c`.`course_required` AS `course_required` FROM ((`enrollment` `e` join `course` `c` on(`e`.`course_id` = `c`.`course_id`)) join `user` `u` on(`e`.`id` = `u`.`id`)) WHERE `u`.`admin` = 'student' ORDER BY `e`.`id` ASC ;

-- --------------------------------------------------------

--
-- 檢視表結構 `課表_教師`
--
DROP TABLE IF EXISTS `課表_教師`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `課表_教師`  AS SELECT `e`.`id` AS `id`, `u`.`name` AS `name`, `e`.`course_id` AS `course_id`, `c`.`course_name` AS `course_name`, `c`.`course_time` AS `course_time`, `c`.`course_max` AS `course_max`, `c`.`course_people` AS `course_people`, `c`.`course_credit` AS `course_credit`, `c`.`classroom_id` AS `classroom_id`, `c`.`course_required` AS `course_required` FROM ((`enrollment` `e` join `course` `c` on(`e`.`course_id` = `c`.`course_id`)) join `user` `u` on(`e`.`id` = `u`.`id`)) WHERE `u`.`admin` = 'teacher' ORDER BY `e`.`id` ASC ;

-- --------------------------------------------------------

--
-- 檢視表結構 `點名單`
--
DROP TABLE IF EXISTS `點名單`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `點名單`  AS SELECT `e`.`course_id` AS `course_id`, `c`.`course_name` AS `course_name`, `c`.`course_people` AS `course_people`, `e`.`id` AS `id`, `u`.`name` AS `name` FROM ((`enrollment` `e` join `course` `c` on(`e`.`course_id` = `c`.`course_id`)) join `user` `u` on(`e`.`id` = `u`.`id`)) WHERE `u`.`admin` = 'student' ORDER BY `e`.`course_id` ASC ;

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `classroom`
--
ALTER TABLE `classroom`
  ADD PRIMARY KEY (`classroom_id`);

--
-- 資料表索引 `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_teacher` (`course_teacher`),
  ADD KEY `classroom_id` (`classroom_id`);

--
-- 資料表索引 `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`id`,`course_id`),
  ADD KEY `course_id` (`course_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100106;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`course_teacher`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`classroom_id`) REFERENCES `classroom` (`classroom_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `enrollment`
--
ALTER TABLE `enrollment`
  ADD CONSTRAINT `enrollment_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enrollment_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
