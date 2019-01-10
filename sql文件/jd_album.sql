-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2018 年 09 月 21 日 14:33
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
-- 表的结构 `jd_album`
--

CREATE TABLE IF NOT EXISTS `jd_album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL,
  `albumPath` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=108 ;

--
-- 转存表中的数据 `jd_album`
--

INSERT INTO `jd_album` (`id`, `pid`, `albumPath`) VALUES
(1, 1, 'd9b12aa62deedd29390ccfa8ffc11705.jpg'),
(2, 2, '74de2a5ff3c18f5ef753eb3d7c2685fc.jpg'),
(3, 3, '7dede6af6e2a141c3ce88d993ba8d0b2.jpg'),
(4, 4, '0a0636d261502e4a4ea1caa6147f59f4.jpg'),
(5, 5, 'a17ae1ad719069ac582cc4c4fe8ddb70.jpg'),
(11, 12, '5941df8d8a7d52d6c67fffe6f2cf6d91.jpg'),
(12, 14, 'd929f6cfb0640eac7e05f2ee360de401.jpg'),
(13, 15, '68d2ade5d2dedab5744974d444e87503.jpg'),
(14, 16, '2e5204e4372cdf3e189a1c05899ad9cc.jpg'),
(15, 17, 'e297eae79751534a442c4d3c4849260d.jpg'),
(16, 17, 'cfbfad4650bbcef0ea10d6ebb48ab069.jpg'),
(17, 17, '741c0c9d4a68534cab5dbc1d002dcbf4.jpg'),
(18, 18, 'af1cf6a020de9539939db50acb8d6f3e.jpg'),
(19, 18, '2cf752f723eb0a68ce44a5e6fd48ea8e.jpg'),
(20, 19, '9227c4005db8930ea16468df960bb033.jpg'),
(21, 19, 'e8b6e1ebcf8f8bcdee10c9aaa25e9a7d.jpg'),
(22, 19, '73fe4c110b92353ac6e4248818da6165.jpg'),
(23, 19, 'e6f09e71d74f59e2fba9ebc733936c65.jpg'),
(24, 19, '7d4f5da0042059489c01951c5fc603da.jpg'),
(25, 20, '14ae3f9224c29d4ea93afd1ee79dafd8.jpg'),
(26, 21, 'aeb49f52ff3179a7ec9ce149f4a223aa.jpg'),
(27, 21, '09a43ea369f176993f7a0b5687f8d48a.jpg'),
(28, 21, '533797787f833b483ccc447ab6d11757.jpg'),
(29, 21, '4790f5f08612eaa337d04c852790d194.jpg'),
(30, 22, '4fb85f6389bf73ba80589bc00bc84214.jpg'),
(31, 22, '6d38408c934ff3be5997eac0c4de2fd3.jpg'),
(32, 22, 'fdf5b208c1f54b2eafa89bfd6f7d5175.jpg'),
(33, 22, 'c5693ecc619953225396f3d0a4cf005b.jpg'),
(34, 23, '044c37cf586db94a3455530e58926558.jpg'),
(35, 23, 'ee369829962c8b27d342cdc29c5fd1f2.jpg'),
(36, 23, '7b973c4ef60b50e5e57500cd701e1b60.jpg'),
(37, 23, 'db6d5a1db521e06eff35906e44896a76.jpg'),
(38, 24, 'd79a88e20d557635ee36a62359a25cf2.jpg'),
(39, 24, 'ab1e5e37d543df2b7482aa5553342044.jpg'),
(40, 24, '74db4906ea5d3dc5133a4c4364e13471.jpg'),
(41, 24, '46f3d19151977030b71dde93d0a1b7ee.jpg'),
(42, 24, 'fede8863c313f122fda2aee46fd46649.jpg'),
(43, 19, 'f808ffdd43dabde9313b9cfca1d869a0.jpg'),
(44, 25, '6a33aeefdea6b48001a2c5c04eb703e0.jpg'),
(45, 25, '38d79ef631d580dfb9d7cc59aafade18.jpg'),
(46, 25, 'd21bdd4e7c997760c0093e8f1e99129a.jpg'),
(47, 25, '00644a2ca646b76abe4dc45ccf630789.jpg'),
(48, 25, '649cdf7f0ab743c4678f92a66bcf4bbd.jpg'),
(49, 26, '89e249c8650af6131436ef11f55e1a67.jpg'),
(50, 26, 'a90814a0ab8249454e2f439cda6dd87e.jpg'),
(51, 26, 'ca281964d59aa199a249860554b4ce7e.jpg'),
(52, 26, 'a33de875c78052de4fc73677beb96f0b.jpg'),
(53, 27, 'ed4a47f21d2bd171ee3edc9099f6d9f7.jpg'),
(54, 27, '27ef83973a5e051d30c4dec101bab80c.jpg'),
(55, 27, '94b5289de245f4e534ddd4c642bd92ba.jpg'),
(56, 27, 'f7748499a16793daf5a53f0b4647de10.jpg'),
(57, 28, 'da31bfb77448f06a0cbbdda8f5b58cde.jpg'),
(58, 28, 'ae792b6f35a6983f91eb185d1755ff66.jpg'),
(59, 28, '9b40384adafd1f9ce8b0423276a5ed3b.jpg'),
(60, 28, 'ff7712d9ace445b01468f917b4c4131a.jpg'),
(61, 28, '3d7054e5571d56768f2ceb799af5d7f4.jpg'),
(66, 30, '1ca68fd8aad1d0af38f1f41cfc10a12f.jpg'),
(67, 30, '737a3439da1367825a3b4a6d1f85eddc.jpg'),
(68, 30, '617c5efbd729b89417cde36e73e0ce8c.jpg'),
(69, 30, '578d1203b7b3a3f0b6b643e43dbc3938.jpg'),
(70, 30, '1705a7362d554614cf0e5d0be455a4e6.jpg'),
(76, 32, '898ed0661462bf328775b4b49de80258.jpg'),
(77, 32, 'fe47ec40bb6544d188ed3dece2c6c143.jpg'),
(78, 32, '62091823c5fc15732a37b94dfc59f6a4.jpg'),
(79, 32, '3ee5662fbd736c831e44ef2c84523c82.jpg'),
(80, 32, '9b42f6665b48cf00d17dc380ecaa501d.jpg'),
(86, 34, '6145b18d7c9372325715f079b29695a7.jpg'),
(87, 34, 'a9f718991b0410c2ba0533211bfcf465.jpg'),
(88, 34, 'eae93abcc68f6e3384fdeecb1b504986.jpg'),
(89, 34, '5582d0ab4db83cad533cdb49b76c30c8.jpg'),
(94, 36, '47e994ebe928ac9480bf8a8804e06b79.jpg'),
(95, 36, '5ef1a837b2513270bf610c60009391be.jpg'),
(96, 36, '5481d4e106606aec9eb77b1270b9288e.jpg'),
(97, 36, 'af0c56a48f0c8cc6500cebf1b49cb95d.jpg'),
(98, 37, '6d74d65bcf981ad13210dd8179f29f9c.jpg'),
(99, 37, '09c439638e4bc17d12ec586aa594448e.jpg'),
(100, 37, '90a080a3fff7b38bb0f35e9db420e7f8.jpg'),
(101, 37, '924541b469b3f2ad0c7fee9904cfabb4.jpg'),
(102, 37, 'e1ddff5e0af4e6751523070c9e8ffe40.jpg'),
(103, 38, '51720c70201c7b46ff83393f475dac3d.jpg'),
(104, 38, 'a9744b9357029598e73b5794f57170ee.jpg'),
(105, 38, '4aa11b2d921a7c1c459a0270e7fbdef7.jpg'),
(106, 38, '25ab8e01a2ce418336cea1d70875d029.jpg'),
(107, 38, 'dfe1fed1046b6964e4b0453828ac7fc5.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
