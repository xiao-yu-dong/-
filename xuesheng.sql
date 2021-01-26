-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-12-06 17:30:22
-- 服务器版本： 10.1.38-MariaDB
-- PHP 版本： 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `xuesheng`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminuser` varchar(50) NOT NULL,
  `adminpass` varchar(32) NOT NULL,
  `regtime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `adminuser`, `adminpass`, `regtime`) VALUES
(1, '123', '123', '2019-11-13 00:00:00'),
(2, '123123', '123', '2019-12-06 15:50:24'),
(3, '333', '33', '2019-12-06 15:50:50');

-- --------------------------------------------------------

--
-- 表的结构 `chengji`
--

CREATE TABLE `chengji` (
  `id` int(11) NOT NULL,
  `xuehao` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `js` int(11) DEFAULT NULL,
  `php` int(11) DEFAULT NULL,
  `mysql` int(11) DEFAULT NULL,
  `cloud` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `chengji`
--

INSERT INTO `chengji` (`id`, `xuehao`, `name`, `js`, `php`, `mysql`, `cloud`) VALUES
(1, '1801050601', '王六', 95, 89, 85, 100),
(2, '1801050602', '张三', 87, 79, 96, 88),
(3, '1801050603', '赵二', 88, 94, 89, 78),
(4, '1801050604', '孙四', 78, 98, 87, 76),
(5, '1801050605', '王五', 89, 97, 87, 90),
(6, '1801050606', '小明', 89, 98, 78, 87),
(8, '1801050607', '孙兵', 98, 78, 89, 87),
(9, '1801050609', '李四', 0, 0, 0, 0),
(10, '1801050610', '邓旗', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `xuehao` varchar(50) NOT NULL,
  `riqi` date NOT NULL,
  `nianling` int(11) NOT NULL,
  `xueke` varchar(50) NOT NULL,
  `xingzuo` varchar(50) NOT NULL,
  `xingbie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `data`
--

INSERT INTO `data` (`id`, `name`, `xuehao`, `riqi`, `nianling`, `xueke`, `xingzuo`, `xingbie`) VALUES
(5, '王六', '1801050601', '2000-08-07', 19, 'PHP', '狮子座', '男'),
(6, '张三', '1801050602', '1999-12-23', 20, 'PHP', '魔蝎座', '男'),
(7, '赵二', '1801050603', '1999-01-09', 20, 'PHP', '魔羯座 ', '男'),
(8, '孙四', '1801050604', '2000-05-04', 19, 'PHP', '双子座', '男'),
(9, '王五', '1801050605', '2000-06-21', 19, 'PHP', '金牛座 ', '男'),
(10, '小明', '1801050606', '1999-09-07', 20, 'PHP', '巨蟹座 ', '男'),
(11, '孙冰', '1801050607', '2000-07-25', 19, 'PHP', '双子座', '男'),
(17, '李四', '1801050609', '2000-06-16', 20, 'PHP', '双子座', '男'),
(18, '邓旗', '1801050610', '2000-06-11', 20, 'PHP', '双子座', '男');

-- --------------------------------------------------------

--
-- 表的结构 `ly`
--

CREATE TABLE `ly` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `ly`
--

INSERT INTO `ly` (`id`, `title`, `content`, `update_time`) VALUES
(7, 'asdsad', '<p>dsadasd</p>', '2019-12-06 16:24:55');

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `chengji`
--
ALTER TABLE `chengji`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `ly`
--
ALTER TABLE `ly`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `chengji`
--
ALTER TABLE `chengji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用表AUTO_INCREMENT `ly`
--
ALTER TABLE `ly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
