-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 17. September 2012 jam 14:57
-- Versi Server: 5.1.37
-- Versi PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rits2mysql`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbladmin`
--

CREATE TABLE IF NOT EXISTS `tbladmin` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbladmin`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tblregister`
--

CREATE TABLE IF NOT EXISTS `tblregister` (
  `register_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `register_real_name` varchar(50) DEFAULT NULL,
  `register_address` varchar(50) DEFAULT NULL,
  `register_city` varchar(50) DEFAULT NULL,
  `register_state` varchar(50) DEFAULT NULL,
  `register_post_code` varchar(5) DEFAULT NULL,
  `register_contact` varchar(50) DEFAULT NULL,
  `register_contact_type` varchar(25) DEFAULT NULL,
  `register_phone0` varchar(50) DEFAULT NULL,
  `register_phone_type0` varchar(25) DEFAULT NULL,
  `register_phone1` varchar(50) DEFAULT NULL,
  `register_phone_type1` varchar(25) DEFAULT NULL,
  `register_phone2` varchar(50) DEFAULT NULL,
  `register_phone_type2` varchar(25) DEFAULT NULL,
  `register_trading_name` varchar(50) DEFAULT NULL,
  `register_password` varchar(25) DEFAULT NULL,
  `register_email` varchar(50) DEFAULT NULL,
  `register_status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`register_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data untuk tabel `tblregister`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
