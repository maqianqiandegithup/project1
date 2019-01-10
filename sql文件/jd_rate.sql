-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 09 月 21 日 14:34
-- 服务器版本: 5.6.12-log
-- PHP 版本: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shopjd`
--

-- --------------------------------------------------------

--
-- 表的结构 `jd_rate`
--

CREATE TABLE IF NOT EXISTS `jd_rate` (
  `uid` int(255) NOT NULL,
  `p19` int(255) DEFAULT NULL,
  `p26` int(255) DEFAULT NULL,
  `p23` int(255) DEFAULT NULL,
  `p20` int(255) DEFAULT NULL,
  `p21` int(255) DEFAULT NULL,
  `p22` int(255) DEFAULT NULL,
  `p24` int(255) DEFAULT NULL,
  `p25` int(255) DEFAULT NULL,
  `p27` int(255) DEFAULT NULL,
  `p28` int(255) DEFAULT NULL,
  `p29` int(255) DEFAULT NULL,
  `p30` int(255) DEFAULT NULL,
  `p31` int(255) DEFAULT NULL,
  `p32` int(255) DEFAULT NULL,
  `p33` int(255) DEFAULT NULL,
  `p34` int(255) DEFAULT NULL,
  `p35` int(255) DEFAULT NULL,
  `p36` int(255) DEFAULT NULL,
  `p37` int(255) DEFAULT NULL,
  `p38` int(255) DEFAULT NULL,
  `p39` int(255) DEFAULT NULL,
  `p40` int(255) DEFAULT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `jd_rate`
--

INSERT INTO `jd_rate` (`uid`, `p19`, `p26`, `p23`, `p20`, `p21`, `p22`, `p24`, `p25`, `p27`, `p28`, `p29`, `p30`, `p31`, `p32`, `p33`, `p34`, `p35`, `p36`, `p37`, `p38`, `p39`, `p40`) VALUES
(1, 5, 4, 5, NULL, 4, 5, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, 5, 5, 5, 5, 3, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, 5, 4, 3, 5, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, 3, 4, 4, 5, 4, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
