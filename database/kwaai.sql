-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2013 at 07:59 AM
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
-- Table structure for table `pxl_languagetypes`
--

CREATE TABLE IF NOT EXISTS `pxl_languagetypes` (
  `LangId` int(11) NOT NULL AUTO_INCREMENT,
  `LangName` varchar(255) NOT NULL,
  `LangCode` varchar(255) NOT NULL,
  `LangIcon` varchar(255) NOT NULL COMMENT 'this is country flag.',
  `LangCurrencyName` varchar(255) NOT NULL,
  `LangCurrencySymbol` varchar(255) NOT NULL,
  `LangStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`LangId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pxl_languagetypes`
--

INSERT INTO `pxl_languagetypes` (`LangId`, `LangName`, `LangCode`, `LangIcon`, `LangCurrencyName`, `LangCurrencySymbol`, `LangStatus`) VALUES
(1, 'English', 'en', '', 'pound', '&pound;', 1),
(2, 'Dutch', 'nl', '', 'Euro', '&euro;', 1),
(3, 'Chinese', 'zh', '', 'Yen', '&yen;', 1);

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
  `CatLangId` int(11) DEFAULT NULL,
  `CategoryName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`CatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `pxl_tblcategory`
--

INSERT INTO `pxl_tblcategory` (`CatId`, `CatLangId`, `CategoryName`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 1, 'Images', 1, '2013-11-11 08:20:07', '2013-11-12 11:50:56'),
(2, 2, 'afbeeldingen', 1, '2013-11-11 08:20:07', '2013-11-12 11:50:56'),
(3, 3, '圖片', 1, '2013-11-11 08:20:07', '2013-11-12 11:50:56'),
(7, 1, 'Sketches', 1, '2013-11-11 09:30:58', '2013-11-12 11:53:15'),
(8, 2, 'Sketches', 1, '2013-11-11 09:30:58', '2013-11-12 11:53:15'),
(9, 3, '素描', 1, '2013-11-11 09:30:58', '2013-11-12 11:53:15');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblcategorychild`
--

CREATE TABLE IF NOT EXISTS `pxl_tblcategorychild` (
  `SCatId` int(11) NOT NULL AUTO_INCREMENT,
  `SCatLangId` int(11) DEFAULT NULL,
  `SCategoryName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `CatId` int(11) NOT NULL,
  `IsFeatured` int(11) DEFAULT NULL,
  `FeatureImage` varchar(255) DEFAULT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`SCatId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `pxl_tblcategorychild`
--

INSERT INTO `pxl_tblcategorychild` (`SCatId`, `SCatLangId`, `SCategoryName`, `CatId`, `IsFeatured`, `FeatureImage`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 1, 'People', 7, 0, '1384157957.jpeg', 1, '2013-11-11 09:01:13', '2013-11-13 06:29:53'),
(2, 2, 'mensen', 7, 0, '1384157957.jpeg', 1, '2013-11-11 09:01:13', '2013-11-13 06:29:53'),
(3, 3, '人', 7, 0, '1384157957.jpeg', 1, '2013-11-11 09:01:13', '2013-11-13 06:29:53'),
(7, 1, 'Celebrity', 1, 1, '1384158697.jpeg', 1, '2013-11-11 09:31:31', '2013-11-13 06:12:27'),
(8, 2, 'beroemdheid', 1, 1, '1384158697.jpeg', 1, '2013-11-11 09:31:31', '2013-11-13 06:12:27'),
(9, 3, '名人', 1, 1, '1384158697.jpeg', 1, '2013-11-11 09:31:31', '2013-11-13 06:12:27'),
(10, 1, 'Food', 7, 0, '1384239488.jpeg', 1, '2013-11-12 07:57:56', '2013-11-13 06:01:16'),
(11, 2, 'voedsel', 7, 0, '1384239488.jpeg', 1, '2013-11-12 07:57:56', '2013-11-13 06:01:16'),
(12, 3, '食物', 7, 0, '1384239488.jpeg', 1, '2013-11-12 07:57:56', '2013-11-13 06:01:16'),
(13, 1, 'Culture', 1, 1, '1384239538.jpeg', 1, '2013-11-12 07:58:52', '2013-11-13 06:00:25'),
(14, 2, 'cultuur', 1, 1, '1384239538.jpeg', 1, '2013-11-12 07:58:52', '2013-11-13 06:00:25'),
(15, 3, '文化', 1, 1, '1384239538.jpeg', 1, '2013-11-12 07:58:52', '2013-11-13 06:00:25'),
(16, 1, 'Transportation', 1, 1, '1384239582.jpeg', 1, '2013-11-12 07:59:35', '2013-11-13 06:04:41'),
(17, 2, 'vervoer', 1, 1, '1384239582.jpeg', 1, '2013-11-12 07:59:35', '2013-11-13 06:04:41'),
(18, 3, '運輸', 1, 1, '1384239582.jpeg', 1, '2013-11-12 07:59:35', '2013-11-13 06:04:41'),
(19, 1, 'Architecture', 7, 1, '1384239713.jpeg', 1, '2013-11-12 08:00:15', '2013-11-13 06:48:55'),
(20, 2, 'architectuur', 7, 1, '1384239713.jpeg', 1, '2013-11-12 08:00:15', '2013-11-13 06:48:55'),
(21, 3, '建築', 7, 1, '1384239713.jpeg', 1, '2013-11-12 08:00:15', '2013-11-13 06:48:55');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblconstantsvalue`
--

CREATE TABLE IF NOT EXISTS `pxl_tblconstantsvalue` (
  `KeywordId` int(11) NOT NULL AUTO_INCREMENT,
  `ConstantCode` varchar(255) NOT NULL,
  `KeywordLangId` int(11) NOT NULL,
  `KeywordValue` text CHARACTER SET utf8 NOT NULL,
  `KeywordStatus` tinyint(4) NOT NULL,
  PRIMARY KEY (`KeywordId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `pxl_tblconstantsvalue`
--

INSERT INTO `pxl_tblconstantsvalue` (`KeywordId`, `ConstantCode`, `KeywordLangId`, `KeywordValue`, `KeywordStatus`) VALUES
(1, 'sign_in', 1, 'Sign In', 1),
(2, 'sign_in', 2, 'Aanmelden', 1),
(3, 'sign_in', 3, '登錄', 1),
(4, 'register', 1, 'Register', 1),
(5, 'register', 2, 'registreren', 1),
(6, 'register', 3, '註冊', 1),
(7, 'shopping_baskets', 1, 'Shopping Baskets', 1),
(8, 'shopping_baskets', 2, 'winkelmandjes\r\n', 1),
(9, 'shopping_baskets', 3, '購物籃', 1),
(10, 'search_for_images', 1, 'Search For Images', 1),
(11, 'search_for_images', 2, 'Search For afbeeldingen\r\n', 1),
(12, 'search_for_images', 3, '圖像搜索\r\n\r\n\r\n', 1),
(13, 'search_btn', 1, 'Search ', 1),
(14, 'search_btn', 2, 'zoeken', 1),
(15, 'search_btn', 3, '搜索', 1),
(16, 'category_search', 1, 'Category Search', 1),
(17, 'category_search', 2, 'Categorie zoeken', 1),
(18, 'category_search', 3, '分類搜索', 1),
(19, 'browse_by_category', 1, 'Browse By Category', 1),
(20, 'browse_by_category', 2, 'Blader door Categorie', 1),
(21, 'browse_by_category', 3, '按類別瀏覽', 1),
(22, 'make_money', 1, '', 1),
(23, 'make_money', 2, '', 1),
(24, 'make_money', 3, '', 1),
(25, 'most_popular_pictures', 1, 'MOST POPULAR PICTURES', 1),
(26, 'most_popular_pictures', 2, 'POPULAIRSTE PICTURES', 1),
(27, 'most_popular_pictures', 3, '最受歡迎的照片', 1),
(28, 'subscription_options', 1, '<h4>Subscription Options</h4>\r\n<p>Flexible image subscription plans you can tailor to your needs.</p>', 1),
(29, 'subscription_options', 2, '<h4>Abonnementsopties</h4>\r\n<p>Flexibele afbeelding abonnementen kunt u op maat van uw behoeften.</p>', 1),
(30, 'subscription_options', 3, '<h4>認購期權</h4>\r\n<p>靈活的圖像套餐，您可以根據您的需求。</p>', 1),
(31, 'sign_up_for_free', 1, '<h4>Sign up for FREE</h4>\r\n<p>Sign up for a Corbis account to receive special offers, news, and more.</p>', 1),
(32, 'sign_up_for_free', 2, '<h4>Teken</h4>\r\n<p>Aanmelden voor een Corbis account om speciale aanbiedingen, nieuws en meer te ontvangen.</p>', 1),
(33, 'sign_up_for_free', 3, '<h4>註冊免費</h4>\r\n<p>Corbis的帳戶收取特別優惠，新聞和更多。</p>', 1),
(34, 'search_tips', 1, 'Search tips\r\nFind the right image quickly and easily with our search tips guide.', 1),
(35, 'search_tips', 2, '<h4>zoektips</h4>\r\n<p>Vind de juiste afbeelding snel en gemakkelijk met onze zoektips gids..</p>', 1),
(36, 'search_tips', 3, '<h4>搜索提示</h4>\r\n<p>我們的搜索技巧指南快速，輕鬆地找到合適的圖像。</p>', 1),
(40, 'subscription_options_gstarted', 1, 'Get Started', 1),
(41, 'subscription_options_gstarted', 2, 'Aan de slag', 1),
(42, 'subscription_options_gstarted', 3, '開始', 1),
(43, 'sign_up_for_free_dregister', 1, 'Register', 1),
(44, 'sign_up_for_free_dregister', 2, 'registreren', 1),
(45, 'sign_up_for_free_dregister', 3, '註冊', 1),
(46, 'search_tips_dguide', 1, 'See the guide', 1),
(47, 'search_tips_dguide', 2, 'Zie de gids', 1),
(48, 'search_tips_dguide', 3, '請參閱指南', 1),
(49, 'my_account_head', 1, 'My Account', 1),
(50, 'my_account_head', 2, 'Mijn account', 1),
(51, 'my_account_head', 3, '我的帳戶', 1),
(52, 'my_account_sign_up_free', 1, 'Sign up for free', 1),
(53, 'my_account_sign_up_free', 2, 'Meld je gratis aan', 1),
(54, 'my_account_sign_up_free', 3, '免費註冊', 1),
(55, 'need_help', 1, 'Need Help?', 1),
(56, 'need_help', 2, 'Hulp nodig?', 1),
(57, 'need_help', 3, '是否需要幫助？', 1),
(58, 'need_help_search_tips', 1, 'Search tips &amp; tricks', 1),
(59, 'need_help_search_tips', 2, 'Zoek tips & tricks', 1),
(60, 'need_help_search_tips', 3, '搜索提示和技巧', 1),
(61, 'need_help_contact_us', 1, 'Contact Us', 1),
(62, 'need_help_contact_us', 2, 'Contacteer ons', 1),
(63, 'need_help_contact_us', 3, '聯繫我們', 1),
(64, 'need_help_site_map', 1, 'Site map', 1),
(65, 'need_help_site_map', 2, 'Sitemap', 1),
(66, 'need_help_site_map', 3, '網站地圖', 1),
(67, 'follow_us', 1, 'Follow us:', 1),
(68, 'follow_us', 2, 'Volg ons op:', 1),
(69, 'follow_us', 3, '跟隨我們：', 1),
(70, 'all_right_reserve', 1, 'All contents &copy; copyright 2013 Kwaai Images, Inc. All rights reserved.', 1),
(71, 'all_right_reserve', 2, 'Alle content © copyright 2013 Kwaai Images, Inc Alle rechten voorbehouden.', 1),
(72, 'all_right_reserve', 3, '的所有內容©版權所有2013 Kwaai的圖片，公司保留所有權利。', 1),
(73, 'site_title', 1, 'Kwaai-Images.com | is a photo stock company for professionals and amateurs', 1),
(74, 'site_title', 2, '\r\nKwaai-Images.com | is een foto stock onderneming voor professionals en amateurs', 1),
(75, 'site_title', 3, 'Kwaai Images.com |是一個照片的股份公司，為專業人士和業餘愛好者', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblorientation`
--

CREATE TABLE IF NOT EXISTS `pxl_tblorientation` (
  `OrId` int(11) NOT NULL AUTO_INCREMENT,
  `OrLangId` int(11) NOT NULL,
  `OrName` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`OrId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pxl_tblorientation`
--

INSERT INTO `pxl_tblorientation` (`OrId`, `OrLangId`, `OrName`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 1, 'Landscape', 1, '2013-11-11 11:27:17', '2013-11-11 11:27:43'),
(2, 2, 'Landscape D', 1, '2013-11-11 11:27:17', '2013-11-11 11:27:43'),
(3, 3, 'Landscape C', 1, '2013-11-11 11:27:17', '2013-11-11 11:27:43'),
(4, 1, 'Portrait', 1, '2013-11-11 11:29:51', '0000-00-00 00:00:00'),
(5, 2, 'Portrait D', 1, '2013-11-11 11:29:51', '0000-00-00 00:00:00'),
(6, 3, 'Portrait C', 1, '2013-11-11 11:29:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblpagechild`
--

CREATE TABLE IF NOT EXISTS `pxl_tblpagechild` (
  `SPageId` int(11) NOT NULL AUTO_INCREMENT,
  `SPageLangId` int(11) NOT NULL,
  `PageId` int(11) DEFAULT NULL,
  `SPageTitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `SPageSlug` varchar(255) DEFAULT NULL,
  `SPageContent` text CHARACTER SET utf8,
  `Status` int(11) DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`SPageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `pxl_tblpagechild`
--

INSERT INTO `pxl_tblpagechild` (`SPageId`, `SPageLangId`, `PageId`, `SPageTitle`, `SPageSlug`, `SPageContent`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(9, 1, 1, 'Our Objectives', 'http://localhost/pixelci/about-us/our-objectives.html', 'Our Objectives content ..\r\n<ol>\r\n	<li>\r\n		&nbsp;Our Objectives in English</li>\r\n	<li>\r\n		Our Objectives in English</li>\r\n	<li>\r\n		Our Objectives in English</li>\r\n	<li>\r\n		Our Objectives in English</li>\r\n</ol>\r\n', 0, '2013-11-13 11:30:29', '0000-00-00 00:00:00'),
(10, 2, 1, 'onze Doelstellingen', 'http://localhost/pixelci/about-us/our-objectives.html', 'Our Objectives content ..\r\n<ol>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n</ol>\r\n', 0, '2013-11-13 11:30:29', '0000-00-00 00:00:00'),
(11, 3, 1, '我們的目標', 'http://localhost/pixelci/about-us/our-objectives.html', 'Our Objectives content ..\r\n<ol>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n</ol>\r\n', 0, '2013-11-13 11:30:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblpages`
--

CREATE TABLE IF NOT EXISTS `pxl_tblpages` (
  `PageId` int(11) NOT NULL AUTO_INCREMENT,
  `PageLangId` int(11) NOT NULL,
  `FeatureImage` varchar(255) DEFAULT NULL,
  `PageTitle` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `PageContent` text CHARACTER SET utf8,
  `PageSlug` varchar(255) DEFAULT NULL,
  `PageLocation` int(11) DEFAULT NULL,
  `HeaderPosition` int(11) NOT NULL,
  `FooterPosition` int(11) NOT NULL,
  `Status` int(11) DEFAULT NULL,
  `HasSubPage` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`PageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `pxl_tblpages`
--

INSERT INTO `pxl_tblpages` (`PageId`, `PageLangId`, `FeatureImage`, `PageTitle`, `PageContent`, `PageSlug`, `PageLocation`, `HeaderPosition`, `FooterPosition`, `Status`, `HasSubPage`) VALUES
(1, 1, '1384168164.png', 'About Us', '<span style="color:#800000;">About Us</span> Content here...\r\n<ol>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n</ol>\r\n', 'http://localhost/pixelci/about-us.html', 2, 0, 0, 1, 1),
(2, 2, '1384168164.png', 'over ons', '<span class="short_text" id="result_box" lang="nl"><span style="color:#800000;"><span class="hps">Over ons</span></span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span> <span class="hps">...</span></span>\r\n<ol>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span> </span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n</ol>\r\n', 'http://localhost/pixelci/about-us.html', 2, 0, 0, 1, 1),
(3, 3, '1384168164.png', '關於我們', '<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡......</span></span>\r\n<ol>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡.</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n</ol>\r\n', 'http://localhost/pixelci/about-us.html', 2, 0, 0, 1, 1),
(4, 1, NULL, 'Website terms', '<span style="color:#800000;">Website terms</span> content\r\n<ol>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n</ol>\r\n', 'http://localhost/pixelci/website-terms.html', 1, -1, 1, 1, 0),
(5, 2, NULL, 'website termen', '<span style="color:#800000;">Website terms</span> content\r\n<ol>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n</ol>\r\n', 'http://localhost/pixelci/website-terms.html', 1, -1, 1, 1, 0),
(6, 3, NULL, '網站條款', '<span style="color:#800000;">Website terms</span> content\r\n<ol>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n</ol>\r\n', 'http://localhost/pixelci/website-terms.html', 1, -1, 1, 1, 0),
(7, 1, NULL, 'Privacy', '<span style="color:#800000;">Privacy in English Content Here...</span>\r\n<ol>\r\n	<li>\r\n		english content</li>\r\n	<li>\r\n		english content</li>\r\n	<li>\r\n		english content</li>\r\n	<li>\r\n		english content</li>\r\n</ol>\r\n', 'http://localhost/pixelci/privacy.html', 1, -1, 6, 1, NULL),
(8, 2, NULL, 'Privacy in Dutch', '<span style="color:#800000;">Privacy in Dutch Content Here...</span>\r\n<ol>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n</ol>\r\n', 'http://localhost/pixelci/privacy.html', 1, -1, 6, 1, NULL),
(9, 3, NULL, '隱私', '<span style="color:#800000;">Privacy in Chinese Content Here...</span>\r\n<ol>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n</ol>\r\n', 'http://localhost/pixelci/privacy.html', 1, -1, 6, 1, 1),
(10, 1, NULL, 'License information', '<span style="color:#ffd700;">License information</span> content here\r\n<ol>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n</ol>\r\n', 'http://localhost/pixelci/license-information.html', 1, -1, 2, 1, 0),
(11, 2, NULL, 'Licentie-informatie', '<span style="color:#ffd700;">License information</span> content here\r\n<ol>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n</ol>\r\n', 'http://localhost/pixelci/license-information.html', 1, -1, 2, 1, 0),
(12, 3, NULL, '許可信息', '<span style="color:#ffd700;">License information</span> content here\r\n<ol>\r\n	<li>\r\n		License information in Chinese</li>\r\n	<li>\r\n		License information in Chinese</li>\r\n	<li>\r\n		License information in Chinese</li>\r\n	<li>\r\n		License information in Chinese</li>\r\n</ol>\r\n', 'http://localhost/pixelci/license-information.html', 1, -1, 2, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblsitesettings`
--

CREATE TABLE IF NOT EXISTS `pxl_tblsitesettings` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  `Value` varchar(255) DEFAULT NULL,
  `Others` text,
  `Status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pxl_tblsitesettings`
--

INSERT INTO `pxl_tblsitesettings` (`Id`, `Name`, `Value`, `Others`, `Status`) VALUES
(1, 'facebook-link', 'http://facebook.com/isn.shrestha', NULL, 1),
(2, 'twitter-link', 'http://twitter.com/AishanStha', NULL, 1),
(3, 'google-plus', 'http://gmail.com/abc', NULL, 1),
(4, 'contact-email', 'aishans@gmail.com', '<h5>\r\n	ADDITIONAL INFORMATION</h5>\r\n<strong>Phone:</strong>&nbsp;(123) 456-7890<br />\r\n<p>\r\n	<strong>Fax:</strong>&nbsp;+04 (123) 456-7890<br />\r\n	<strong>Email:</strong><a href="mailto:vietcuong_it@yahoo.com">&nbsp;vietcuong_it@yahoo.com</a></p>\r\nSECONDARY OFFICE IN VIETNAMrn\r\n<p>\r\n	<strong>Phone:</strong>&nbsp;(113) 023-1125<br />\r\n	<strong>Fax:</strong>&nbsp;+04 (113) 023-1145<br />\r\n	<strong>Email:</strong><a href="mailto: vietcuong_it@yahoo.com">&nbsp;</a><a>vietcuong_it@yahoo.com</a></p>\r\n', 1);

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
