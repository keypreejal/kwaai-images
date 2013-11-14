-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 13, 2013 at 07:57 AM
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
