-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 13 mrt 2016 om 14:30
-- Serverversie: 5.5.44
-- PHP-Versie: 5.4.45-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databank: `enecsys_testfinal`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cday`
--

CREATE TABLE IF NOT EXISTS `cday` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `wh` int(11) NOT NULL,
  `dcpower` int(11) NOT NULL,
  `dccurrent` float NOT NULL,
  `efficiency` float NOT NULL,
  `acfreq` int(11) NOT NULL,
  `acvolt` float NOT NULL,
  `temp` float NOT NULL,
  `state` int(11) NOT NULL,
  KEY `ts` (`ts`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cmonth`
--

CREATE TABLE IF NOT EXISTS `cmonth` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `wh` int(11) NOT NULL,
  `dcpower` int(11) NOT NULL,
  `dccurrent` float NOT NULL,
  `efficiency` float NOT NULL,
  `acfreq` int(11) NOT NULL,
  `acvolt` float NOT NULL,
  `temp` float NOT NULL,
  `state` int(11) NOT NULL,
  KEY `ts` (`ts`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `cyear`
--

CREATE TABLE IF NOT EXISTS `cyear` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `wh` int(11) NOT NULL,
  `dcpower` int(11) NOT NULL,
  `dccurrent` float NOT NULL,
  `efficiency` float NOT NULL,
  `acfreq` int(11) NOT NULL,
  `acvolt` float NOT NULL,
  `temp` float NOT NULL,
  `state` int(11) NOT NULL,
  KEY `ts` (`ts`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `enecsys`
--

CREATE TABLE IF NOT EXISTS `enecsys` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `wh` int(11) NOT NULL,
  `dcpower` int(11) NOT NULL,
  `dccurrent` float NOT NULL,
  `efficiency` float NOT NULL,
  `acfreq` int(11) NOT NULL,
  `acvolt` float NOT NULL,
  `temp` float NOT NULL,
  `state` int(11) NOT NULL,
  KEY `ts` (`ts`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `enecsys_day`
--

CREATE TABLE IF NOT EXISTS `enecsys_day` (
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL,
  `wh` int(11) NOT NULL,
  `dcpower` int(11) NOT NULL,
  `dccurrent` float NOT NULL,
  `efficiency` float NOT NULL,
  `acfreq` int(11) NOT NULL,
  `acvolt` float NOT NULL,
  `temp` float NOT NULL,
  `state` int(11) NOT NULL,
  KEY `ts` (`ts`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `inverters`
--

CREATE TABLE IF NOT EXISTS `inverters` (
  `data_id` int(11) NOT NULL AUTO_INCREMENT,
  `inverter_name` varchar(255) NOT NULL,
  `inverter_serial` varchar(30) NOT NULL,
  `inverter_type` varchar(30) NOT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `user_id` int(11) NOT NULL,
  `time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(128) NOT NULL,
  `salt` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
