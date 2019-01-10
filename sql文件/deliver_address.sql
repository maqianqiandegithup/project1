-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 09 月 21 日 14:30
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
-- 表的结构 `deliver_address`
--

CREATE TABLE IF NOT EXISTS `deliver_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL,
  `province` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `district` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `receiver` varchar(20) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `deliver_address`
--

INSERT INTO `deliver_address` (`id`, `uid`, `province`, `city`, `district`, `address`, `receiver`, `phone`) VALUES
(2, 1, '北京', '北京', '昌平区', '中央财经大学', '马倩倩', '15810893608'),
(4, 2, '北京', '北京', '昌平区', '中央财经大学', '郝小仪', '15810893608'),
(7, 3, '北京', '北京', '昌平区', '中央财经大学', 'Tom', '13683332618'),
(8, 4, '北京', '北京', '昌平区', '中央财经大学', 'Mary', '13683332618'),
(9, 1, '北京', '北京', '昌平区', '中央财经大学', '马倩倩', '15810893608'),
(10, 0, '北京', '北京', '石景山区', '中央财经大学', '马倩倩', '15810893608');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
