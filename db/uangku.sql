-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2015 at 11:30 AM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uangku`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `did` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `date` date NOT NULL,
  `token` varchar(100) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `value` double NOT NULL,
  `desc` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `c_at` datetime NOT NULL,
  `u_at` datetime NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`did`, `uid`, `date`, `token`, `type`, `value`, `desc`, `status`, `c_at`, `u_at`) VALUES
(8, 21, '2015-11-14', 'xstrix', 'out', 420000, 'pembayaran uang kaos GNOME raglan biru', 1, '2015-11-14 15:16:50', '0000-00-00 00:00:00'),
(9, 21, '2015-11-14', 'xstrix', 'in', 120000, 'Pembayaran kais GNOME raglan biru dari moko', 1, '2015-11-14 15:20:07', '0000-00-00 00:00:00'),
(10, 21, '2015-10-01', 'xstrix', 'in', 4500000, 'Gaji bulan  September', 1, '2015-11-14 15:24:39', '0000-00-00 00:00:00'),
(11, 21, '2015-11-16', 'udah diganti', 'out', 17000, '', 1, '2015-11-16 22:12:19', '2015-11-17 18:48:24'),
(12, 21, '2015-11-17', 'xstrix', 'out', 12000, 'beli basko', 1, '2015-11-17 20:13:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `realname` varchar(100) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `c_at` datetime NOT NULL,
  `u_at` datetime NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `realname`, `lastlogin`, `c_at`, `u_at`) VALUES
(21, 'ars', 'dd96d8fb5cbf74ac0f1575ae610b3ad5', 'Aris Winardi', '2015-11-17 20:13:56', '2015-11-14 15:16:15', '2015-11-17 20:13:56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
