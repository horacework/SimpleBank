-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-06-16 00:28:42
-- 服务器版本： 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `banksystem`
--

-- --------------------------------------------------------

--
-- 表的结构 `moneylog`
--

CREATE TABLE IF NOT EXISTS `moneylog` (
`no` int(10) NOT NULL,
  `cardNum` varchar(8) NOT NULL,
  `changeMoney` decimal(9,2) NOT NULL,
  `keep` decimal(9,2) NOT NULL,
  `postTime` datetime NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- 转存表中的数据 `moneylog`
--

INSERT INTO `moneylog` (`no`, `cardNum`, `changeMoney`, `keep`, `postTime`) VALUES
(1, '12345678', '3200.00', '3200.00', '2015-06-13 10:28:27'),
(2, '12345678', '3600.00', '6800.00', '2015-06-15 03:10:45'),
(3, '12345678', '3201.00', '10001.00', '2015-06-15 03:20:58'),
(4, '12345678', '-1000.00', '9001.00', '2015-06-15 04:08:22'),
(5, '12345678', '1000.00', '10001.00', '2015-06-15 05:17:15'),
(6, '12345678', '-3000.00', '7001.00', '2015-06-15 05:18:05'),
(7, '12345678', '-3000.00', '4001.00', '2015-06-15 05:18:19'),
(8, '12345678', '6000.00', '10001.00', '2015-06-15 05:18:32'),
(9, '12345678', '3900.00', '13901.00', '2015-06-15 11:24:14'),
(10, '12345678', '6355.09', '20256.09', '2015-06-15 11:32:19'),
(11, '12345678', '-800.00', '19456.09', '2015-06-15 11:32:25'),
(12, '12345678', '-1000.00', '18456.09', '2015-06-16 12:13:01'),
(13, '12345678', '60.00', '18516.09', '2015-06-16 12:13:06');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `cardNum` varchar(8) CHARACTER SET utf8 NOT NULL,
  `password` varchar(6) CHARACTER SET utf8 NOT NULL,
  `username` varchar(10) CHARACTER SET utf8 NOT NULL,
  `isDel` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`cardNum`, `password`, `username`, `isDel`) VALUES
('12345678', '123456', '陈厚仁', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moneylog`
--
ALTER TABLE `moneylog`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`cardNum`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moneylog`
--
ALTER TABLE `moneylog`
MODIFY `no` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
