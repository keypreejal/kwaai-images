-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2013 at 08:25 PM
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
(1, 'bob', '21232f297a57a5a743894a0e4a801fc3', 'super', 'admin@pixelheart.com', 1, '2013-10-21 17:40:34');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pxl_tblcategory`
--

INSERT INTO `pxl_tblcategory` (`CatId`, `CategoryName`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(5, 'Images', 1, '2013-10-29 07:40:44', '2013-10-27 07:37:47'),
(7, 'Sketches', 1, '2013-10-28 20:20:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblcategorychild`
--

CREATE TABLE IF NOT EXISTS `pxl_tblcategorychild` (
  `SCatId` int(11) NOT NULL AUTO_INCREMENT,
  `SCategoryName` varchar(255) NOT NULL,
  `CatId` int(11) NOT NULL,
  `IsFeatured` int(11) DEFAULT NULL,
  `FeatureImage` varchar(255) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`SCatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pxl_tblcategorychild`
--

INSERT INTO `pxl_tblcategorychild` (`SCatId`, `SCategoryName`, `CatId`, `IsFeatured`, `FeatureImage`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'People', 5, 1, NULL, 1, '2013-10-29 15:41:05', '0000-00-00 00:00:00'),
(2, 'Sports', 5, 1, NULL, 1, '2013-10-29 15:41:37', '0000-00-00 00:00:00'),
(3, 'Celebrity', 5, 1, NULL, 1, '2013-10-29 15:42:01', '0000-00-00 00:00:00'),
(4, 'Heritages', 7, 0, NULL, 1, '2013-10-29 15:42:36', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pxl_tblorientation`
--

INSERT INTO `pxl_tblorientation` (`OrId`, `OrName`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(2, 'LandScapes', 1, '2013-10-28 11:31:09', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblpagechild`
--

CREATE TABLE IF NOT EXISTS `pxl_tblpagechild` (
  `SPageId` int(11) NOT NULL AUTO_INCREMENT,
  `PageId` int(11) DEFAULT NULL,
  `SPageTitle` varchar(255) DEFAULT NULL,
  `SPageSlug` varchar(255) DEFAULT NULL,
  `SPageContent` varchar(255) DEFAULT NULL,
  `Status` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`SPageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pxl_tblpagechild`
--

INSERT INTO `pxl_tblpagechild` (`SPageId`, `PageId`, `SPageTitle`, `SPageSlug`, `SPageContent`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(5, 2, 'Our objectives', 'http://localhost/pixelci/about-us/our-objectives.html', 'our objective content here', 1, '2013-10-29 12:09:33', '0000-00-00 00:00:00'),
(6, 2, 'Our Team Members', 'http://localhost/pixelci/about-us/our-team-members.html', 'our team members', 1, '2013-10-29 12:10:01', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblpages`
--

CREATE TABLE IF NOT EXISTS `pxl_tblpages` (
  `PageId` int(11) NOT NULL AUTO_INCREMENT,
  `FeatureImage` varchar(255) DEFAULT NULL,
  `PageTitle` varchar(255) DEFAULT NULL,
  `PageContent` text,
  `PageSlug` varchar(255) DEFAULT NULL,
  `PageLocation` int(11) DEFAULT NULL,
  `HeaderPosition` int(11) NOT NULL,
  `FooterPosition` int(11) NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `HasSubPage` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`PageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pxl_tblpages`
--

INSERT INTO `pxl_tblpages` (`PageId`, `FeatureImage`, `PageTitle`, `PageContent`, `PageSlug`, `PageLocation`, `HeaderPosition`, `FooterPosition`, `Status`, `HasSubPage`) VALUES
(1, NULL, 'Home', '', 'http://localhost/pixelci/home.html', 0, 0, -1, 1, NULL),
(2, '1383073394.jpeg', 'About Us', '', 'http://localhost/pixelci/about-us.html', 2, 1, 1, 1, 1),
(3, NULL, 'Contact Us', '', 'http://localhost/pixelci/contact-us.html', 2, 2, 6, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pxl_tblslider`
--

INSERT INTO `pxl_tblslider` (`SliderId`, `ImageName`, `Title`, `Status`) VALUES
(1, '1382942020.jpeg', '', 1),
(2, '1382941939.jpeg', '', 1),
(3, '1382942029.jpeg', '', 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pxl_tblsociallinks`
--

INSERT INTO `pxl_tblsociallinks` (`LinkId`, `LinkTitle`, `LinkUrl`, `Status`) VALUES
(2, 'Facebook', 'http://facebook.com/Aishan.Shrestha', 1),
(3, 'Twitter\\"\\"', 'http://twitter.com/AishanStha\\"\\"', 1);
