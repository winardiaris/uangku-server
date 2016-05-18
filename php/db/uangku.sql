-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 20, 2015 at 12:11 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`did`, `uid`, `date`, `token`, `type`, `value`, `desc`, `status`, `c_at`, `u_at`) VALUES
(1, 1, '2015-11-19', 'xstrix', 'in', 4000000, 'gaji bulan november', 1, '2015-11-19 23:08:29', '0000-00-00 00:00:00'),
(2, 1, '2015-11-19', 'xstrix', 'out', 100000, 'pembelian pulsa XL', 1, '2015-11-19 23:10:51', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `realname`, `lastlogin`, `c_at`, `u_at`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 'Administrator', '2015-11-19 23:37:44', '2015-11-19 23:07:44', '2015-11-19 23:38:16');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
