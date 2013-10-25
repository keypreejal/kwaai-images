-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2013 at 10:34 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kwaai`
--
CREATE DATABASE `kwaai` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kwaai`;

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tbladmin`
--

CREATE TABLE IF NOT EXISTS `pxl_tbladmin` (
  `UserId` tinyint(4) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UserType` varchar(100) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserStatus` int(11) NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`UserId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pxl_tbladmin`
--

INSERT INTO `pxl_tbladmin` (`UserId`, `UserName`, `Password`, `UserType`, `UserEmail`, `UserStatus`, `Timestamp`) VALUES
(1, 'bob', 'ab4086ecd47c568d5ba5739d4078988f', 'super', 'admin@pixelheart.com', 1, '2013-10-21 17:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblcategory`
--

CREATE TABLE IF NOT EXISTS `pxl_tblcategory` (
  `CatId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`CatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pxl_tblcategory`
--

INSERT INTO `pxl_tblcategory` (`CatId`, `CategoryName`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(5, 'Images', 1, '2013-10-25 13:13:29', '2013-10-25 09:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblcategorychild`
--

CREATE TABLE IF NOT EXISTS `pxl_tblcategorychild` (
  `SCatId` int(11) NOT NULL AUTO_INCREMENT,
  `SCategoryName` varchar(255) NOT NULL,
  `CatId` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`SCatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pxl_tblcategorychild`
--

INSERT INTO `pxl_tblcategorychild` (`SCatId`, `SCategoryName`, `CatId`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(4, 'Mountain', 5, 1, '2013-10-25 09:28:11', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblorientation`
--

CREATE TABLE IF NOT EXISTS `pxl_tblorientation` (
  `OrId` int(11) NOT NULL AUTO_INCREMENT,
  `OrName` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`OrId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pxl_tblorientation`
--

INSERT INTO `pxl_tblorientation` (`OrId`, `OrName`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'LandScape', 1, '2013-10-25 07:24:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblpages`
--

CREATE TABLE IF NOT EXISTS `pxl_tblpages` (
  `PageId` int(11) NOT NULL AUTO_INCREMENT,
  `FeatureImage` varchar(255) DEFAULT NULL,
  `PageTitle` varchar(255) NOT NULL,
  `PageContent` text NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`PageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pxl_tblpages`
--

INSERT INTO `pxl_tblpages` (`PageId`, `FeatureImage`, `PageTitle`, `PageContent`, `Status`) VALUES
(2, '1382679645.', 'AboutUs', 'this is a <span style=\\"background-color:#a52a2a;\\">about us</span> page', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblslider`
--

CREATE TABLE IF NOT EXISTS `pxl_tblslider` (
  `SliderId` int(11) NOT NULL AUTO_INCREMENT,
  `ImageName` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`SliderId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pxl_tblslider`
--

INSERT INTO `pxl_tblslider` (`SliderId`, `ImageName`, `Title`, `Status`) VALUES
(3, '13826794190.jpeg', 'jelly fish', 1),
(4, '13826794270.jpeg', 'flowers', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblsociallinks`
--

CREATE TABLE IF NOT EXISTS `pxl_tblsociallinks` (
  `LinkId` int(11) NOT NULL AUTO_INCREMENT,
  `LinkTitle` varchar(255) DEFAULT NULL,
  `LinkUrl` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  PRIMARY KEY (`LinkId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `pxl_tblsociallinks`
--

INSERT INTO `pxl_tblsociallinks` (`LinkId`, `LinkTitle`, `LinkUrl`, `Status`) VALUES
(1, 'Facebook Link', 'http://facebook.com/Aishan.Shrestha', 1);
