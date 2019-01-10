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
-- 表的结构 `shop_car`
--

CREATE TABLE IF NOT EXISTS `shop_car` (
  `carid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `bnum` int(10) NOT NULL,
  `pcolor` varchar(20) DEFAULT NULL,
  `psize` varchar(20) DEFAULT NULL,
  `totalfee` bigint(50) DEFAULT NULL,
  PRIMARY KEY (`carid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=18 ;

--
-- 转存表中的数据 `shop_car`
--

INSERT INTO `shop_car` (`carid`, `uid`, `pid`, `bnum`, `pcolor`, `psize`, `totalfee`) VALUES
(1, 1, 0, 2, '乳白', '均码', 32),
(2, 1, 0, 1, '毛衣均码＋ 衬衫均码+ 短裙均码', '均码', 32),
(4, 1, 22, 2, '驼色预定15天', '均码', 32),
(6, 1, 21, 2, '毛衣均码＋ 衬衫均码+ 短裙均码', '均码', 32),
(8, 1, 22, 0, '黑色预定15天', '均码', 32),
(9, 1, 22, 0, '驼色预定15天', '均码', 32),
(10, 1, 22, 0, '黑色预定15天', '均码', 32),
(11, 1, 21, 2, '毛衣均码＋ 衬衫均码+ 短裙均码', '均码', 32),
(12, 0, 34, 1, '现货 预定10天', '均码', 32),
(13, 1, 34, 1, '现货 预定10天', '均码', 32),
(14, 1, 27, 1, '自然色', '均码', 32),
(15, 0, 25, 2, '限量暗红', '均码', 32),
(16, 2, 25, 2, '限量暗红', '均码', 32),
(17, 2, 23, 2, '乳白', '均码', 32);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
