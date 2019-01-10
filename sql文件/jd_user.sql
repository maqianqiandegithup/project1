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
-- 表的结构 `jd_user`
--

CREATE TABLE IF NOT EXISTS `jd_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `sex` enum('男','女','保密') NOT NULL,
  `regTime` int(10) unsigned NOT NULL,
  `shCartnum` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `jd_user`
--

INSERT INTO `jd_user` (`id`, `username`, `password`, `phone`, `sex`, `regTime`, `shCartnum`) VALUES
(2, '郝小仪', 'e10adc3949ba59abbe56e057f20f883e', '15810893608', '女', 1537000833, 0),
(3, 'Tom', 'e10adc3949ba59abbe56e057f20f883e', '13683332618', '男', 1537369432, 0),
(4, 'Mary', 'e10adc3949ba59abbe56e057f20f883e', '13683332618', '女', 1537370841, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
