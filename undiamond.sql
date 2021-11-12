-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2012 at 10:15 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `undiamond`
--

-- --------------------------------------------------------

--
-- Table structure for table `authme`
--

CREATE TABLE IF NOT EXISTS `authme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `lastlogin` bigint(20) DEFAULT NULL,
  `x` smallint(6) DEFAULT '0',
  `y` smallint(6) DEFAULT '0',
  `z` smallint(6) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Table structure for table `title`
--

CREATE TABLE IF NOT EXISTS `title` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`) VALUES
(1, 'Playground-MC');

-- --------------------------------------------------------

--
-- Table structure for table `wait_whitelist`
--

CREATE TABLE IF NOT EXISTS `wait_whitelist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_unicode_ci NOT NULL,
  `passwordhash` text COLLATE utf8_unicode_ci NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `welcome`
--

CREATE TABLE IF NOT EXISTS `welcome` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `welcome`
--

INSERT INTO `welcome` (`id`, `text`) VALUES
(1, 'ยินดีต้อนรับเข้าสู่เว็บ Playground-MC ดาวน์โหลดตัวเกมของเซิฟเวอร์ได้ที่เมนูด้านข้างเลยครับ | สามารถขอไวท์ลิสต์ได้ทางเมนูด้านข้างเลยนะครับ | สามารถเข้าเว็บบอร์ดได้ผ่านทางหน้าสมาชิกเลยครับ');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
