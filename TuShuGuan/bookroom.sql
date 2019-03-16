-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2019-01-03 11:06:32
-- 服务器版本： 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookroom`
--

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

CREATE TABLE `book` (
  `book_id` int(30) NOT NULL,
  `book_name` varchar(300) NOT NULL,
  `book_writer` varchar(200) NOT NULL,
  `num` int(12) NOT NULL,
  `borrow_num` int(12) NOT NULL DEFAULT '0',
  `addtime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `book_writer`, `num`, `borrow_num`, `addtime`) VALUES
(2, '朝花夕拾3', '三少', 5, 1, '2018-10-11'),
(3, '朝花夕拾', '鲁迅', 7, 1, '1970-01-01'),
(4, '一只叶子', '风声', 0, 1, '1970-01-01');

-- --------------------------------------------------------

--
-- 表的结构 `borrow`
--

CREATE TABLE `borrow` (
  `student_number` char(15) NOT NULL,
  `borrowBook` char(15) NOT NULL,
  `formTime` date NOT NULL,
  `toTime` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `borrow`
--

INSERT INTO `borrow` (`student_number`, `borrowBook`, `formTime`, `toTime`) VALUES
('316040300123', '一只叶子', '2018-11-06', '2018-12-06');

-- --------------------------------------------------------

--
-- 表的结构 `history`
--

CREATE TABLE `history` (
  `history_id` int(20) NOT NULL,
  `student_number` char(15) NOT NULL,
  `borrowBook` char(15) NOT NULL,
  `formTime` date NOT NULL,
  `action` char(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `history`
--

INSERT INTO `history` (`history_id`, `student_number`, `borrowBook`, `formTime`, `action`) VALUES
(1, '316040300124', '新世界', '2018-11-06', '借阅'),
(2, '316040300124', '新世界', '2018-11-06', '续借120天'),
(3, '316040300124', '新世界', '2018-11-06', '还书'),
(4, '316040300124', '斗罗大陆', '2018-11-06', '借阅'),
(5, '316040300124', '朝花夕拾', '2018-11-06', '借阅'),
(6, '316040300124', '一只叶子', '2018-11-06', '借阅'),
(7, '316040300124', '一只叶子', '2018-11-06', '还书'),
(8, '316040300124', '一只叶子', '2018-11-06', '借阅'),
(9, '316040300124', '一只叶子', '2018-11-06', '还书'),
(10, '316040300124', '一只叶子', '2018-11-06', '借阅'),
(11, '316040300123', '一只叶子', '2018-11-06', '借阅'),
(12, '316040300123', '一只叶子', '2018-11-06', '借阅');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `student_number` char(15) NOT NULL,
  `student_name` char(15) NOT NULL,
  `sex` char(15) NOT NULL,
  `sdept` char(15) NOT NULL,
  `class` char(15) NOT NULL,
  `borrowNumber` int(2) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`student_number`, `student_name`, `sex`, `sdept`, `class`, `borrowNumber`) VALUES
('316040300124', '徐贝', '男', '工程系', '16计科1班', 3),
('316040300123', '徐饶懿', '男', '工程系', '16计科1班', 2);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `username` char(15) NOT NULL,
  `password` char(100) NOT NULL,
  `phone` char(15) NOT NULL,
  `salt` char(30) NOT NULL,
  `user_statu` int(3) NOT NULL DEFAULT '0',
  `off_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `phone`, `salt`, `user_statu`, `off_time`) VALUES
(1, 'xubei', '28b320d5dd522673fefd29bb27a3b657', '18579250335', 'g(^j&a&&', 0, '2018-11-11 12:28:29'),
(2, 'admin', '46cf59cb5332edc830625ca6fa117ae2', '15279865685', '(af(jd*&', 0, '2018-11-11 12:28:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
