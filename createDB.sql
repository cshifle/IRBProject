-- phpMyAdmin SQL Dump
-- version 3.3.2deb1ubuntu1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2012 at 10:21 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.2-1ubuntu4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `S12-cpsc430G4`
--

-- --------------------------------------------------------

--
-- Table structure for table `default`
--

DROP TABLE IF EXISTS `default`;
CREATE TABLE IF NOT EXISTS `default` (
  `default` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exemptApp`
--

DROP TABLE IF EXISTS `exemptApp`;
CREATE TABLE IF NOT EXISTS `exemptApp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `title` varchar(80) NOT NULL,
  `sponsor` varchar(25) DEFAULT NULL,
  `sponsorEmail` varchar(25) NOT NULL,
  `department` varchar(20) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `student` varchar(25) NOT NULL,
  `studentEmail` varchar(25) DEFAULT NULL,
  `studentPhone` varchar(10) DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'P',
  `facultyStatus` varchar(20) NOT NULL DEFAULT 'P',
  `memberStatus` varchar(20) NOT NULL DEFAULT 'P',
  `memberAssigned` varchar(30) NOT NULL,
  `graduate` varchar(3) DEFAULT NULL,
  `dateSigned` varchar(10) DEFAULT NULL,
  `sponsored` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

-- --------------------------------------------------------

--
-- Table structure for table `expeditedApp`
--

DROP TABLE IF EXISTS `expeditedApp`;
CREATE TABLE IF NOT EXISTS `expeditedApp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(30) NOT NULL,
  `title` varchar(80) NOT NULL,
  `sponsor` varchar(25) NOT NULL,
  `sponsorEmail` varchar(25) DEFAULT NULL,
  `department` varchar(20) DEFAULT NULL,
  `extension` varchar(10) DEFAULT NULL,
  `student` varchar(25) NOT NULL,
  `studentEmail` varchar(25) DEFAULT NULL,
  `studentPhone` varchar(10) DEFAULT NULL,
  `graduate` varchar(3) DEFAULT NULL,
  `dateSigned` varchar(10) DEFAULT NULL,
  `abstract` varchar(255) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `facultyStatus` varchar(20) NOT NULL DEFAULT 'P',
  `memberStatus` varchar(20) NOT NULL DEFAULT 'P',
  `memberAssigned` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `permission` varchar(10) DEFAULT NULL,
  `assignedApps` int(11) NOT NULL,
  `hash` varchar(50) DEFAULT NULL,
  `active` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;
