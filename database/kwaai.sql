-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2013 at 06:10 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=199 ;

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
(12, 'search_for_images', 3, '圖像搜索', 1),
(13, 'search_btn', 1, 'Search ', 1),
(14, 'search_btn', 2, 'zoeken', 1),
(15, 'search_btn', 3, '搜索', 1),
(16, 'category_search', 1, 'Category Search', 1),
(17, 'category_search', 2, 'Categorie zoeken', 1),
(18, 'category_search', 3, '分類搜索', 1),
(19, 'browse_by_category', 1, 'Browse By Category', 1),
(20, 'browse_by_category', 2, 'Blader door Categorie', 1),
(21, 'browse_by_category', 3, '按類別瀏覽', 1),
(22, 'make_money', 1, '<h2>Make money from your images</h2>\r\n<p>Sell your stock images and get 100% from each sale you make. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches.</p>', 1),
(23, 'make_money', 2, '<h2>Maak geld van uw afbeeldingen</h2>\r\n<p>Verkoop uw beelden en ontvang 100% van elke verkoop die je maakt. Dit platform is gebouwd voor professionals en amateurs, te uploaden, verkoop en wederverkoop foto''s en schetsen.</p>', 1),
(24, 'make_money', 3, '<h2>賺錢從圖像</h2>\r\n<p>出售你的圖片，並在每次你做銷售的100％。此平台打造為專業人士和業餘愛好者，上傳，銷售和轉售圖片和草圖。</p>', 1),
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
(58, 'need_help_faqs', 1, 'FAQ''s', 1),
(59, 'need_help_faqs', 2, 'Veelgestelde vragen', 1),
(60, 'need_help_faqs', 3, '常見問題解答', 1),
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
(75, 'site_title', 3, 'Kwaai Images.com |是一個照片的股份公司，為專業人士和業餘愛好者', 1),
(76, 'sidebar_search_fliter_title', 1, 'Filter search results', 1),
(77, 'sidebar_search_fliter_title', 2, 'Filter de zoekresultaten', 1),
(78, 'sidebar_search_fliter_title', 3, '篩選搜索結果', 1),
(79, 'sidebar_search_fliter_image_type', 1, 'Image Type', 1),
(80, 'sidebar_search_fliter_image_type', 2, 'Beeldtypen', 1),
(81, 'sidebar_search_fliter_image_type', 3, '圖像類型', 1),
(82, 'sidebar_search_fliter_category', 1, 'Category', 1),
(83, 'sidebar_search_fliter_category', 2, 'categorie', 1),
(84, 'sidebar_search_fliter_category', 3, '類別', 1),
(85, 'sidebar_search_fliter_orientation', 1, 'Orientation', 1),
(86, 'sidebar_search_fliter_orientation', 2, 'oriëntering', 1),
(87, 'sidebar_search_fliter_orientation', 3, '方向', 1),
(88, 'register_left_ftitle', 1, 'Register Form', 1),
(89, 'register_left_ftitle', 2, 'Registreer Form', 1),
(90, 'register_left_ftitle', 3, '登記表格', 1),
(91, 'register_left_amsignin', 1, 'Already a member? Sign in...', 1),
(92, 'register_left_amsignin', 2, 'Bent u al lid? Log dan in ..', 1),
(93, 'register_left_amsignin', 3, '已經是會員？註冊...', 1),
(94, 'name', 1, 'Full Name', 1),
(95, 'name', 2, 'volledige Naam', 1),
(96, 'name', 3, '全名', 1),
(97, 'register_left_companyname', 1, 'Company Name', 1),
(98, 'register_left_companyname', 2, 'Bedrijfsnaam', 1),
(99, 'register_left_companyname', 3, '公司名稱', 1),
(100, 'phone', 1, 'Phone', 1),
(101, 'phone', 2, 'telefoon', 1),
(102, 'phone', 3, '電話', 1),
(103, 'email_address', 1, 'Email Address', 1),
(104, 'email_address', 2, 'e-mail adres', 1),
(105, 'email_address', 3, '電子郵件地址', 1),
(106, 'password', 1, 'Password', 1),
(107, 'password', 2, 'wachtwoord', 1),
(108, 'password', 3, '密碼', 1),
(109, 'cpassword', 1, 'Confirm Password', 1),
(110, 'cpassword', 2, 'Wachtwoord bevestigen', 1),
(111, 'cpassword', 3, '確認密碼', 1),
(112, 'required', 1, '(* required field...)', 1),
(113, 'required', 2, '(* Verplicht veld ...)', 1),
(114, 'required', 3, '（*為必填項）', 1),
(115, 'agree', 1, 'I agree to the', 1),
(116, 'agree', 2, 'Ik ga akkoord met de', 1),
(117, 'agree', 3, '我同意', 1),
(118, 'register_left_terms_of_service', 1, 'Terms of Service', 1),
(119, 'register_left_terms_of_service', 2, 'Gebruiksvoorwaarden', 1),
(120, 'register_left_terms_of_service', 3, '服務條款', 1),
(121, 'register_left_create_account', 1, 'Create Account', 1),
(122, 'register_left_create_account', 2, 'Account aanmaken', 1),
(123, 'register_left_create_account', 3, '創建帳戶', 1),
(124, 'register_right_thanku', 1, '<h2 class="titles"><span class="text">Thanks for choosing Kwaai Images</span></h2><p><strong>Everything you need</strong></p><p>Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches. Particular for photographers and artist. You can upload and give the pictures a smile or more (rating) and give a short messages (what say people of this Image or Sketch) to the picture or sketch.</p>', 1),
(125, 'register_right_thanku', 2, '<h2 class="titles"><span class="text">\r\nBedankt voor het kiezen Kwaai Images</span></h2><p><strong>\r\nAlles wat je nodig hebt</strong></p><p>Kwaai-Beelden is een in Amsterdam gevestigd Microstock fotografie bedrijf (laag geprijsde en inclusieve stock photography) voor afbeeldingen, schetsen en schilderijen. Dit platform is gebouwd voor professionals en amateurs, te uploaden, verkoop en wederverkoop foto''s en schetsen. Vooral voor fotografen en kunstenaar. U kunt uploaden en geven de foto''s een glimlach of meer (rating) en geef een korte berichten (wat zeggen de mensen van Beeld of Sketch) om de foto of schets.</p>', 1),
(126, 'register_right_thanku', 3, '<h2 class="titles"><span class="text">\r\n感謝選擇Kwaai圖像</span></h2><p><strong>你需要的一切</strong></p><p>Kwaai圖片是總部設在阿姆斯特丹的微利攝影公司（低價和包容性的攝影）的圖像，素描和繪畫。此平台打造為專業人士和業餘愛好者，上傳，銷售和轉售圖片和草圖。特別為攝影師和藝術家。您可以上傳給圖片一個微笑或以上（額定），並給一個簡短的消息（本圖片或素描的人還有什麼好說的）的照片或草圖。</p>', 1),
(127, 'register_user_tell_us', 1, 'Tell us about yourself', 1),
(128, 'register_user_tell_us', 2, 'Vertel iets over uzelf', 1),
(129, 'register_user_tell_us', 3, '談談你自己吧', 1),
(130, 'register_user_purpose', 1, 'You are primarily purchasing content for?', 1),
(131, 'register_user_purpose', 2, 'U bent de eerste aankoop van content voor?', 1),
(132, 'register_user_purpose', 3, '您主要購買的內容嗎？', 1),
(133, 'register_user_client', 1, 'I&acute;m signing up to become Your Client', 1),
(134, 'register_user_client', 2, 'Ik ben het aanmelden om uw klant te worden', 1),
(135, 'register_user_client', 3, '我簽署了成為你的客戶', 1),
(136, 'register_user_contributor', 1, 'I&acute;m signing up to become Kwaai Images Contributor', 1),
(137, 'register_user_contributor', 2, 'Ik ben het intekenen op Kwaai Images bijdrager geworden', 1),
(138, 'register_user_contributor', 3, '我簽署了成為所有Kwaai圖片貢獻者', 1),
(139, 'register_user_join', 1, 'Join', 1),
(140, 'register_user_join', 2, 'toetreden tot', 1),
(141, 'register_user_join', 3, '加入', 1),
(142, 'client_dashboard_ohistory', 1, 'Order History', 1),
(143, 'client_dashboard_ohistory', 2, 'Bestel Geschiedenis', 1),
(144, 'client_dashboard_ohistory', 3, '訂單歷史', 1),
(145, 'client_dashboard_eprofile', 1, 'Edit Profile', 1),
(146, 'client_dashboard_eprofile', 2, 'Profiel bewerken', 1),
(147, 'client_dashboard_eprofile', 3, '編輯個人資料', 1),
(148, 'client_dashboard_cpassword', 1, 'Change Password', 1),
(149, 'client_dashboard_cpassword', 2, 'Wachtwoord wijzigen', 1),
(150, 'client_dashboard_cpassword', 3, '更改密碼', 1),
(151, 'client_dashboard_mrpurchase', 1, 'My Recent Purchases', 1),
(152, 'client_dashboard_mrpurchase', 2, 'Mijn recent Aankopen', 1),
(153, 'client_dashboard_mrpurchase', 3, '我的最新採購', 1),
(154, 'client_dashboard_date', 1, 'Date', 1),
(155, 'client_dashboard_date', 2, 'datum', 1),
(156, 'client_dashboard_date', 3, '日', 1),
(157, 'client_dashboard_ithumbnail', 1, 'Image Thumbnail', 1),
(158, 'client_dashboard_ithumbnail', 2, 'Thumbnail image', 1),
(159, 'client_dashboard_ithumbnail', 3, '圖片縮略圖', 1),
(160, 'client_dashboard_imgid', 1, 'Image ID', 1),
(161, 'client_dashboard_imgid', 2, 'afbeelding ID', 1),
(162, 'client_dashboard_imgid', 3, '圖片ID', 1),
(163, 'client_dashboard_price', 1, 'Price', 1),
(164, 'client_dashboard_price', 2, 'prijs', 1),
(165, 'client_dashboard_price', 3, '價格', 1),
(166, 'client_dashboard_status', 1, 'Status', 1),
(167, 'client_dashboard_status', 2, 'toestand', 1),
(168, 'client_dashboard_status', 3, '狀態', 1),
(169, 'register_user_subscription', 1, 'Subscriptions', 1),
(170, 'register_user_subscription', 2, 'abonnementen', 1),
(171, 'register_user_subscription', 3, '訂閱', 1),
(172, 'register_user_subscription_plan', 1, 'Build your own Subscription plans', 1),
(173, 'register_user_subscription_plan', 2, 'Bouw je eigen Abonnementen', 1),
(174, 'register_user_subscription_plan', 3, '構建自己的套餐', 1),
(175, 'register_user_subscription_tlbpackage', 1, 'Package', 1),
(176, 'register_user_subscription_tlbpackage', 2, 'verpakking', 1),
(177, 'register_user_subscription_tlbpackage', 3, '包', 1),
(178, 'register_user_subscription_tlbsize', 1, 'Size', 1),
(179, 'register_user_subscription_tlbsize', 2, 'maat', 1),
(180, 'register_user_subscription_tlbsize', 3, '大小', 1),
(181, 'register_user_subscription_tlbyear', 1, 'Year', 1),
(182, 'register_user_subscription_tlbyear', 2, 'jaar', 1),
(183, 'register_user_subscription_tlbyear', 3, '年', 1),
(184, 'save_btn', 1, 'Save', 1),
(185, 'save_btn', 2, 'sparen', 1),
(186, 'save_btn', 3, '節省', 1),
(187, 'client_dashboard_pinformation', 1, 'Enter your new password information:', 1),
(188, 'client_dashboard_pinformation', 2, 'Voer uw nieuwe wachtwoord informatie:', 1),
(189, 'client_dashboard_pinformation', 3, '請輸入您的新密碼信息：', 1),
(190, 'old', 1, 'Old', 1),
(191, 'old', 2, 'oud', 1),
(192, 'old', 3, '老', 1),
(193, 'new', 1, 'New', 1),
(194, 'new', 2, 'nieuw', 1),
(195, 'new', 3, '新', 1),
(196, 'retype', 1, 'Retype', 1),
(197, 'retype', 2, 'overgetypt', 1),
(198, 'retype', 3, '重新輸入', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblcountries`
--

CREATE TABLE IF NOT EXISTS `pxl_tblcountries` (
  `CountryId` int(11) NOT NULL AUTO_INCREMENT,
  `CountryCode` varchar(255) NOT NULL,
  `CountryName` varchar(255) NOT NULL,
  `Status` tinyint(4) NOT NULL,
  PRIMARY KEY (`CountryId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `pxl_tblcountries`
--

INSERT INTO `pxl_tblcountries` (`CountryId`, `CountryCode`, `CountryName`, `Status`) VALUES
(1, 'US', 'United States', 1),
(2, 'CA', 'Canada', 1),
(3, 'AF', 'Afghanistan', 1),
(4, 'AL', 'Albania', 1),
(5, 'DZ', 'Algeria', 1),
(6, 'DS', 'American Samoa', 1),
(7, 'AD', 'Andorra', 1),
(8, 'AO', 'Angola', 1),
(9, 'AI', 'Anguilla', 1),
(10, 'AQ', 'Antarctica', 1),
(11, 'AG', 'Antigua and/or Barbuda', 1),
(12, 'AR', 'Argentina', 1),
(13, 'AM', 'Armenia', 1),
(14, 'AW', 'Aruba', 1),
(15, 'AU', 'Australia', 1),
(16, 'AT', 'Austria', 1),
(17, 'AZ', 'Azerbaijan', 1),
(18, 'BS', 'Bahamas', 1),
(19, 'BH', 'Bahrain', 1),
(20, 'BD', 'Bangladesh', 1),
(21, 'BB', 'Barbados', 1),
(22, 'BY', 'Belarus', 1),
(23, 'BE', 'Belgium', 1),
(24, 'BZ', 'Belize', 1),
(25, 'BJ', 'Benin', 1),
(26, 'BM', 'Bermuda', 1),
(27, 'BT', 'Bhutan', 1),
(28, 'BO', 'Bolivia', 1),
(29, 'BA', 'Bosnia and Herzegovina', 1),
(30, 'BW', 'Botswana', 1),
(31, 'BV', 'Bouvet Island', 1),
(32, 'BR', 'Brazil', 1),
(33, 'IO', 'British lndian Ocean Territory', 1),
(34, 'BN', 'Brunei Darussalam', 1),
(35, 'BG', 'Bulgaria', 1),
(36, 'BF', 'Burkina Faso', 1),
(37, 'BI', 'Burundi', 1),
(38, 'KH', 'Cambodia', 1),
(39, 'CM', 'Cameroon', 1),
(40, 'CV', 'Cape Verde', 1),
(41, 'KY', 'Cayman Islands', 1),
(42, 'CF', 'Central African Republic', 1),
(43, 'TD', 'Chad', 1),
(44, 'CL', 'Chile', 1),
(45, 'CN', 'China', 1),
(46, 'CX', 'Christmas Island', 1),
(47, 'CC', 'Cocos (Keeling) Islands', 1),
(48, 'CO', 'Colombia', 1),
(49, 'KM', 'Comoros', 1),
(50, 'CG', 'Congo', 1),
(51, 'CK', 'Cook Islands', 1),
(52, 'CR', 'Costa Rica', 1),
(53, 'HR', 'Croatia (Hrvatska)', 1),
(54, 'CU', 'Cuba', 1),
(55, 'CY', 'Cyprus', 1),
(56, 'CZ', 'Czech Republic', 1),
(57, 'DK', 'Denmark', 1),
(58, 'DJ', 'Djibouti', 1),
(59, 'DM', 'Dominica', 1),
(60, 'DO', 'Dominican Republic', 1),
(61, 'TP', 'East Timor', 1),
(62, 'EC', 'Ecudaor', 1),
(63, 'EG', 'Egypt', 1),
(64, 'SV', 'El Salvador', 1),
(65, 'GQ', 'Equatorial Guinea', 1),
(66, 'ER', 'Eritrea', 1),
(67, 'EE', 'Estonia', 1),
(68, 'ET', 'Ethiopia', 1),
(69, 'FK', 'Falkland Islands (Malvinas)', 1),
(70, 'FO', 'Faroe Islands', 1),
(71, 'FJ', 'Fiji', 1),
(72, 'FI', 'Finland', 1),
(73, 'FR', 'France', 1),
(74, 'FX', 'France, Metropolitan', 1),
(75, 'GF', 'French Guiana', 1),
(76, 'PF', 'French Polynesia', 1),
(77, 'TF', 'French Southern Territories', 1),
(78, 'GA', 'Gabon', 1),
(79, 'GM', 'Gambia', 1),
(80, 'GE', 'Georgia', 1),
(81, 'DE', 'Germany', 1),
(82, 'GH', 'Ghana', 1),
(83, 'GI', 'Gibraltar', 1),
(84, 'GR', 'Greece', 1),
(85, 'GL', 'Greenland', 1),
(86, 'GD', 'Grenada', 1),
(87, 'GP', 'Guadeloupe', 1),
(88, 'GU', 'Guam', 1),
(89, 'GT', 'Guatemala', 1),
(90, 'GN', 'Guinea', 1),
(91, 'GW', 'Guinea-Bissau', 1),
(92, 'GY', 'Guyana', 1),
(93, 'HT', 'Haiti', 1),
(94, 'HM', 'Heard and Mc Donald Islands', 1),
(95, 'HN', 'Honduras', 1),
(96, 'HK', 'Hong Kong', 1),
(97, 'HU', 'Hungary', 1),
(98, 'IS', 'Iceland', 1),
(99, 'IN', 'India', 1),
(100, 'ID', 'Indonesia', 1),
(101, 'IR', 'Iran (Islamic Republic of)', 1),
(102, 'IQ', 'Iraq', 1),
(103, 'IE', 'Ireland', 1),
(104, 'IL', 'Israel', 1),
(105, 'IT', 'Italy', 1),
(106, 'CI', 'Ivory Coast', 1),
(107, 'JM', 'Jamaica', 1),
(108, 'JP', 'Japan', 1),
(109, 'JO', 'Jordan', 1),
(110, 'KZ', 'Kazakhstan', 1),
(111, 'KE', 'Kenya', 1),
(112, 'KI', 'Kiribati', 1),
(113, 'KP', 'Korea, Democratic People''s Republic of', 1),
(114, 'KR', 'Korea, Republic of', 1),
(115, 'KW', 'Kuwait', 1),
(116, 'KG', 'Kyrgyzstan', 1),
(117, 'LA', 'Lao People''s Democratic Republic', 1),
(118, 'LV', 'Latvia', 1),
(119, 'LB', 'Lebanon', 1),
(120, 'LS', 'Lesotho', 1),
(121, 'LR', 'Liberia', 1),
(122, 'LY', 'Libyan Arab Jamahiriya', 1),
(123, 'LI', 'Liechtenstein', 1),
(124, 'LT', 'Lithuania', 1),
(125, 'LU', 'Luxembourg', 1),
(126, 'MO', 'Macau', 1),
(127, 'MK', 'Macedonia', 1),
(128, 'MG', 'Madagascar', 1),
(129, 'MW', 'Malawi', 1),
(130, 'MY', 'Malaysia', 1),
(131, 'MV', 'Maldives', 1),
(132, 'ML', 'Mali', 1),
(133, 'MT', 'Malta', 1),
(134, 'MH', 'Marshall Islands', 1),
(135, 'MQ', 'Martinique', 1),
(136, 'MR', 'Mauritania', 1),
(137, 'MU', 'Mauritius', 1),
(138, 'TY', 'Mayotte', 1),
(139, 'MX', 'Mexico', 1),
(140, 'FM', 'Micronesia, Federated States of', 1),
(141, 'MD', 'Moldova, Republic of', 1),
(142, 'MC', 'Monaco', 1),
(143, 'MN', 'Mongolia', 1),
(144, 'MS', 'Montserrat', 1),
(145, 'MA', 'Morocco', 1),
(146, 'MZ', 'Mozambique', 1),
(147, 'MM', 'Myanmar', 1),
(148, 'NA', 'Namibia', 1),
(149, 'NR', 'Nauru', 1),
(150, 'NP', 'Nepal', 1),
(151, 'NL', 'Netherlands', 1),
(152, 'AN', 'Netherlands Antilles', 1),
(153, 'NC', 'New Caledonia', 1),
(154, 'NZ', 'New Zealand', 1),
(155, 'NI', 'Nicaragua', 1),
(156, 'NE', 'Niger', 1),
(157, 'NG', 'Nigeria', 1),
(158, 'NU', 'Niue', 1),
(159, 'NF', 'Norfork Island', 1),
(160, 'MP', 'Northern Mariana Islands', 1),
(161, 'NO', 'Norway', 1),
(162, 'OM', 'Oman', 1),
(163, 'PK', 'Pakistan', 1),
(164, 'PW', 'Palau', 1),
(165, 'PA', 'Panama', 1),
(166, 'PG', 'Papua New Guinea', 1),
(167, 'PY', 'Paraguay', 1),
(168, 'PE', 'Peru', 1),
(169, 'PH', 'Philippines', 1),
(170, 'PN', 'Pitcairn', 1),
(171, 'PL', 'Poland', 1),
(172, 'PT', 'Portugal', 1),
(173, 'PR', 'Puerto Rico', 1),
(174, 'QA', 'Qatar', 1),
(175, 'RE', 'Reunion', 1),
(176, 'RO', 'Romania', 1),
(177, 'RU', 'Russian Federation', 1),
(178, 'RW', 'Rwanda', 1),
(179, 'KN', 'Saint Kitts and Nevis', 1),
(180, 'LC', 'Saint Lucia', 1),
(181, 'VC', 'Saint Vincent and the Grenadines', 1),
(182, 'WS', 'Samoa', 1),
(183, 'SM', 'San Marino', 1),
(184, 'ST', 'Sao Tome and Principe', 1),
(185, 'SA', 'Saudi Arabia', 1),
(186, 'SN', 'Senegal', 1),
(187, 'SC', 'Seychelles', 1),
(188, 'SL', 'Sierra Leone', 1),
(189, 'SG', 'Singapore', 1),
(190, 'SK', 'Slovakia', 1),
(191, 'SI', 'Slovenia', 1),
(192, 'SB', 'Solomon Islands', 1),
(193, 'SO', 'Somalia', 1),
(194, 'ZA', 'South Africa', 1),
(195, 'GS', 'South Georgia South Sandwich Islands', 1),
(196, 'ES', 'Spain', 1),
(197, 'LK', 'Sri Lanka', 1),
(198, 'SH', 'St. Helena', 1),
(199, 'PM', 'St. Pierre and Miquelon', 1),
(200, 'SD', 'Sudan', 1),
(201, 'SR', 'Suriname', 1),
(202, 'SJ', 'Svalbarn and Jan Mayen Islands', 1),
(203, 'SZ', 'Swaziland', 1),
(204, 'SE', 'Sweden', 1),
(205, 'CH', 'Switzerland', 1),
(206, 'SY', 'Syrian Arab Republic', 1),
(207, 'TW', 'Taiwan', 1),
(208, 'TJ', 'Tajikistan', 1),
(209, 'TZ', 'Tanzania, United Republic of', 1),
(210, 'TH', 'Thailand', 1),
(211, 'TG', 'Togo', 1),
(212, 'TK', 'Tokelau', 1),
(213, 'TO', 'Tonga', 1),
(214, 'TT', 'Trinidad and Tobago', 1),
(215, 'TN', 'Tunisia', 1),
(216, 'TR', 'Turkey', 1),
(217, 'TM', 'Turkmenistan', 1),
(218, 'TC', 'Turks and Caicos Islands', 1),
(219, 'TV', 'Tuvalu', 1),
(220, 'UG', 'Uganda', 1),
(221, 'UA', 'Ukraine', 1),
(222, 'AE', 'United Arab Emirates', 1),
(223, 'GB', 'United Kingdom', 1),
(224, 'UM', 'United States minor outlying islands', 1),
(225, 'UY', 'Uruguay', 1),
(226, 'UZ', 'Uzbekistan', 1),
(227, 'VU', 'Vanuatu', 1),
(228, 'VA', 'Vatican City State', 1),
(229, 'VE', 'Venezuela', 1),
(230, 'VN', 'Vietnam', 1),
(231, 'VG', 'Virigan Islands (British)', 1),
(232, 'VI', 'Virgin Islands (U.S.)', 1),
(233, 'WF', 'Wallis and Futuna Islands', 1),
(234, 'EH', 'Western Sahara', 1),
(235, 'YE', 'Yemen', 1),
(236, 'YU', 'Yugoslavia', 1),
(237, 'ZR', 'Zaire', 1),
(238, 'ZM', 'Zambia', 1),
(239, 'ZW', 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblgroup`
--

CREATE TABLE IF NOT EXISTS `pxl_tblgroup` (
  `GroupId` int(11) NOT NULL AUTO_INCREMENT,
  `GroupName` varchar(255) NOT NULL,
  `GroupStatus` enum('0','1') NOT NULL COMMENT '0:disable;1:enable',
  PRIMARY KEY (`GroupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pxl_tblgroup`
--

INSERT INTO `pxl_tblgroup` (`GroupId`, `GroupName`, `GroupStatus`) VALUES
(1, 'Client', '1'),
(2, 'Contributor', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tbllanguagetypes`
--

CREATE TABLE IF NOT EXISTS `pxl_tbllanguagetypes` (
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
-- Dumping data for table `pxl_tbllanguagetypes`
--

INSERT INTO `pxl_tbllanguagetypes` (`LangId`, `LangName`, `LangCode`, `LangIcon`, `LangCurrencyName`, `LangCurrencySymbol`, `LangStatus`) VALUES
(1, 'English', 'en', '', 'pound', '&pound;', 1),
(2, 'Dutch', 'nl', '', 'Euro', '&euro;', 1),
(3, 'Chinese', 'zh', '', 'Yen', '&yen;', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblorientation`
--

CREATE TABLE IF NOT EXISTS `pxl_tblorientation` (
  `OrId` int(11) NOT NULL AUTO_INCREMENT,
  `OrLangId` int(11) NOT NULL,
  `OrName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `Status` tinyint(4) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`OrId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pxl_tblorientation`
--

INSERT INTO `pxl_tblorientation` (`OrId`, `OrLangId`, `OrName`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 1, 'Landscape', 1, '2013-11-11 11:27:17', '2013-11-17 09:15:34'),
(2, 2, 'landschap', 1, '2013-11-11 11:27:17', '2013-11-17 09:15:34'),
(3, 3, '景觀', 1, '2013-11-11 11:27:17', '2013-11-17 09:15:34'),
(4, 1, 'Portrait', 1, '2013-11-11 11:29:51', '2013-11-17 09:16:07'),
(5, 2, 'portret', 1, '2013-11-11 11:29:51', '2013-11-17 09:16:07'),
(6, 3, '肖像', 1, '2013-11-11 11:29:51', '2013-11-17 09:16:07');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblpackage`
--

CREATE TABLE IF NOT EXISTS `pxl_tblpackage` (
  `PackageId` int(11) NOT NULL AUTO_INCREMENT,
  `PackageName` varchar(255) NOT NULL,
  `PackageCode` varchar(255) NOT NULL,
  `Size` int(11) NOT NULL COMMENT 'In G.B',
  `Price` int(11) NOT NULL,
  `PackageStatus` enum('1','0') NOT NULL COMMENT '0:disable;1:enable',
  PRIMARY KEY (`PackageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pxl_tblpackage`
--

INSERT INTO `pxl_tblpackage` (`PackageId`, `PackageName`, `PackageCode`, `Size`, `Price`, `PackageStatus`) VALUES
(1, 'Silver', 'silver', 1, 100, '1'),
(2, 'Gold', 'gold', 3, 250, '1'),
(3, 'Platinum', 'platinum', 5, 400, '1');

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
  `CreatedAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedAt` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`SPageId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `pxl_tblpagechild`
--

INSERT INTO `pxl_tblpagechild` (`SPageId`, `SPageLangId`, `PageId`, `SPageTitle`, `SPageSlug`, `SPageContent`, `Status`, `CreatedAt`, `UpdatedAt`) VALUES
(9, 1, 1, 'Our Objectives', 'http://localhost/pixelci/about-us/our-objectives.html', 'Our Objectives content ..<br />\r\nAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.\r\n<ol>\r\n	<li>\r\n		&nbsp;Our Objectives in English</li>\r\n	<li>\r\n		Our Objectives in English</li>\r\n	<li>\r\n		Our Objectives in English</li>\r\n	<li>\r\n		Our Objectives in English</li>\r\n</ol>\r\n', 1, '2013-11-15 14:37:17', '0000-00-00 00:00:00'),
(10, 2, 1, 'onze Doelstellingen', 'http://localhost/pixelci/about-us/our-objectives.html', 'Our Objectives content In Dutch..<br />\r\n<br />\r\nAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.\r\n<ol>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n	<li>\r\n		Our Objectives in Dutch</li>\r\n</ol>\r\n', 1, '2013-11-15 14:37:17', '0000-00-00 00:00:00'),
(11, 3, 1, '我們的目標', 'http://localhost/pixelci/about-us/our-objectives.html', 'Our Objectives content in chinese ..<br />\r\n<br />\r\nAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.\r\n<ol>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n	<li>\r\n		Our Objectives in chinese</li>\r\n</ol>\r\n', 1, '2013-11-15 14:37:17', '0000-00-00 00:00:00'),
(12, 1, 1, 'Our members', 'http://localhost/pixelci/about-us/our-members.html', 'Our members in English content<br />\r\n<br />\r\nAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.', 1, '2013-11-15 14:37:50', '0000-00-00 00:00:00'),
(13, 2, 1, 'onze leden', 'http://localhost/pixelci/about-us/our-members.html', 'Our members in Dutch content here<br />\r\nAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.', 1, '2013-11-15 14:37:50', '0000-00-00 00:00:00'),
(14, 3, 1, '我們的會員', 'http://localhost/pixelci/about-us/our-members.html', 'Our members in chinese content herer<br />\r\nAnim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven&#39;t heard of them accusamus labore sustainable VHS.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.<br />\r\n<br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam elementum varius dapibus. Sed hendrerit porta felis at sollicitudin. Sed at nunc ac neque semper fermentum. Proin diam sem, semper fermentum eleifend nec, viverra ac est. Sed ultricies, lectus et vehicula imperdiet, felis tortor vehicula turpis, non fermentum enim est et sapien. Nam justo mi, dignissim a euismod ut, pretium sed leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In viverra porta est, consequat elementum metus tristique a. Mauris tempus tellus a metus dapibus faucibus egestas lectus consectetur. Integer libero dolor, luctus non congue vitae, tempus ut neque. Nunc eleifend lorem quis diam pharetra sagittis. Aliquam ut dolor dui. Fusce dictum facilisis ipsum eu porttitor. In ultricies rhoncus tortor vitae tincidunt.', 1, '2013-11-15 14:37:50', '0000-00-00 00:00:00'),
(15, 1, 16, 'how to be a contributor', 'http://localhost/pixelci/faqs/how-to-be-a-contributor.html', 'how to be a contributor in English content\r\n<ol>\r\n	<li>\r\n		how to be a contributor in English content</li>\r\n	<li>\r\n		how to be a contributor in English content</li>\r\n	<li>\r\n		how to be a contributor in English content</li>\r\n</ol>\r\n', 1, '2013-11-17 12:36:24', '0000-00-00 00:00:00'),
(16, 2, 16, 'hoe je een bijdrage worden', 'http://localhost/pixelci/faqs/how-to-be-a-contributor.html', 'hoe je een bijdrage worden\r\n<ol>\r\n	<li>\r\n		hoe je een bijdrage worden</li>\r\n	<li>\r\n		hoe je een bijdrage worden</li>\r\n	<li>\r\n		hoe je een bijdrage worden</li>\r\n	<li>\r\n		hoe je een bijdrage worden</li>\r\n</ol>\r\n', 1, '2013-11-17 12:36:24', '0000-00-00 00:00:00'),
(17, 3, 16, '如何成為一個貢獻者', 'http://localhost/pixelci/faqs/how-to-be-a-contributor.html', '<span class="short_text" id="result_box" lang="zh-TW"><span>如何成為一個</span><span>貢獻者</span></span>\r\n<ol>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span>如何成為一個</span><span>貢獻者</span></span></span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span>如何成為一個</span><span>貢獻者</span></span></span></span></span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span>如何成為一個</span><span>貢獻者</span></span></span></span></span></span></span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span>如何成為一個</span><span>貢獻者</span></span></span></span></span></span></span></span></span></span></li>\r\n</ol>\r\n', 1, '2013-11-17 12:36:24', '0000-00-00 00:00:00'),
(18, 1, 16, 'Terms of Service', 'http://localhost/pixelci/faqs/terms-of-service.html', 'Terms of Service English content\r\n<ol>\r\n	<li>\r\n		Terms of Service English content</li>\r\n	<li>\r\n		Terms of Service English content</li>\r\n	<li>\r\n		Terms of Service English content</li>\r\n	<li>\r\n		Terms of Service English content</li>\r\n</ol>\r\n', 1, '2013-11-17 12:38:56', '0000-00-00 00:00:00'),
(19, 2, 16, 'Gebruiksvoorwaarden', 'http://localhost/pixelci/faqs/terms-of-service.html', 'Gebruiksvoorwaarden\r\n<ol>\r\n	<li>\r\n		Gebruiksvoorwaarden</li>\r\n	<li>\r\n		Gebruiksvoorwaarden Gebruiksvoorwaarden</li>\r\n	<li>\r\n		Gebruiksvoorwaarden</li>\r\n</ol>\r\n', 1, '2013-11-17 12:38:56', '0000-00-00 00:00:00'),
(20, 3, 16, '服務條款', 'http://localhost/pixelci/faqs/terms-of-service.html', '<span class="short_text" id="result_box" lang="zh-TW"><span>服務條款</span></span>\r\n<ol>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span>服務條款</span></span></span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span>服務條款</span></span></span></span></span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span><span class="short_text" lang="zh-TW"><span>服務條款</span></span></span></span></span></span></span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span><span class="short_text" id="result_box" lang="zh-TW"><span>服務條款</span></span></span></span></span></span></span></span></span></span></li>\r\n</ol>\r\n', 1, '2013-11-17 12:38:56', '0000-00-00 00:00:00');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pxl_tblpages`
--

INSERT INTO `pxl_tblpages` (`PageId`, `PageLangId`, `FeatureImage`, `PageTitle`, `PageContent`, `PageSlug`, `PageLocation`, `HeaderPosition`, `FooterPosition`, `Status`, `HasSubPage`) VALUES
(1, 1, '1384168164.png', 'About Us', '<span style="color:#800000;">About Us</span> Content here...\r\n<ol>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n	<li>\r\n		about us in english</li>\r\n</ol>\r\n', 'http://localhost/pixelci/about-us.html', 2, 0, 0, 1, 1),
(2, 2, '1384168164.png', 'over ons', '<span class="short_text" id="result_box" lang="nl"><span style="color:#800000;"><span class="hps">Over ons</span></span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span> <span class="hps">...</span></span>\r\n<ol>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span> </span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="nl"><span class="hps">Over ons</span> <span class="hps">Content</span> <span class="hps">in het Nederlands</span> <span class="hps">hier</span></span></li>\r\n</ol>\r\n', 'http://localhost/pixelci/about-us.html', 2, 0, 0, 1, 1),
(3, 3, '1384168164.png', '關於我們', '<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡......</span></span>\r\n<ol>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡.</span></span></li>\r\n	<li>\r\n		<span class="short_text" id="result_box" lang="zh-TW"><span>關於我們</span><span>在</span><span>中國</span><span>的</span><span>內容</span><span>在這裡</span></span></li>\r\n</ol>\r\n', 'http://localhost/pixelci/about-us.html', 2, 0, 0, 1, 1),
(4, 1, NULL, 'Terms of use', '<span style="color:#800000;">Website terms</span> content\r\n<ol>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n	<li>\r\n		Website terms in English</li>\r\n</ol>\r\n', 'http://localhost/pixelci/terms-of-use.html', 1, -1, 4, 1, 0),
(5, 2, NULL, 'Voorwaarden voor gebruik', '<span style="color:#800000;">Website terms</span> content\r\n<ol>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n	<li>\r\n		Website terms in Dutch</li>\r\n</ol>\r\n', 'http://localhost/pixelci/terms-of-use.html', 1, -1, 4, 1, 0),
(6, 3, NULL, '使用條款', '<span style="color:#800000;">Website terms</span> content\r\n<ol>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n	<li>\r\n		Website terms in Chinese</li>\r\n</ol>\r\n', 'http://localhost/pixelci/terms-of-use.html', 1, -1, 4, 1, 0),
(7, 1, NULL, 'Privacy Policy', '<span style="color:#800000;">Privacy in English Content Here...</span>\r\n<ol>\r\n	<li>\r\n		english content</li>\r\n	<li>\r\n		english content</li>\r\n	<li>\r\n		english content</li>\r\n	<li>\r\n		english content</li>\r\n</ol>\r\n', 'http://localhost/pixelci/privacy-policy.html', 1, -1, 2, 1, NULL),
(8, 2, NULL, 'Privacybeleid', '<span style="color:#800000;">Privacy in Dutch Content Here...</span>\r\n<ol>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Dutch </span>content</li>\r\n</ol>\r\n', 'http://localhost/pixelci/privacy-policy.html', 1, -1, 2, 1, NULL),
(9, 3, NULL, '隱私政策', '<span style="color:#800000;"><span class="short_text" id="result_box" lang="zh-TW"><span>隱私政策 content </span></span>Here...</span>\r\n<ol>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n	<li>\r\n		<span style="color:#800000;">Chinese </span>content</li>\r\n</ol>\r\n', 'http://localhost/pixelci/privacy-policy.html', 1, -1, 2, 1, 1),
(10, 1, NULL, 'License information', '<span style="color:#ffd700;">License information</span> content here\r\n<ol>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n</ol>\r\n', 'http://localhost/pixelci/license-information.html', 1, -1, 3, 1, 0),
(11, 2, NULL, 'Licentie-informatie', '<span style="color:#ffd700;">License information</span> content here\r\n<ol>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n	<li>\r\n		License information in English</li>\r\n</ol>\r\n', 'http://localhost/pixelci/license-information.html', 1, -1, 3, 1, 0),
(12, 3, NULL, '許可信息', '<span style="color:#ffd700;">License information</span> content here\r\n<ol>\r\n	<li>\r\n		License information in Chinese</li>\r\n	<li>\r\n		License information in Chinese</li>\r\n	<li>\r\n		License information in Chinese</li>\r\n	<li>\r\n		License information in Chinese</li>\r\n</ol>\r\n', 'http://localhost/pixelci/license-information.html', 1, -1, 3, 1, 0),
(13, 1, NULL, 'Sell pictures', '<p>\r\n	Kwaai-Images is an Amsterdam based Microstock photography company (Low priced and inclusive stock photography) for images, sketches and paintings. This platform is build for professionals and amateurs, to upload, sale and resale pictures and sketches. Particular for photographers and artist. You can upload and give the pictures a smile or more (rating) and give a short messages (what say people of this Image or Sketch) to the picture or sketch.</p>\r\n<hr />\r\n<h3>\r\n	How to Sell Stock in Three Easy Steps</h3>\r\n<div class="steps">\r\n	<h3>\r\n		Sign Up</h3>\r\n	<p>\r\n		You need to be an iStock member before you can contribute your stock. But don&#39;t worry &ndash; joining only takes a minute and it doesn&rsquo;t cost a thing.</p>\r\n	<a href="#login">Join</a></div>\r\n<div class="steps">\r\n	<h3>\r\n		Upload Your Images</h3>\r\n	<p>\r\n		Our review team will inspect your images and, if necessary, your model and property releases. If we can use your images, we&#39;ll add them to the Kwaai Images collection. You always keep the copyrights to your work.</p>\r\n</div>\r\n<div class="steps">\r\n	<h3><i class="icon-money color"></i>\r\n		Grow Your Income</h3>\r\n	<p>\r\n		Improve your earnings by submitting your creative work.</p>\r\n</div>\r\n', 'http://localhost/pixelci/sell-pictures.html', 1, -1, 1, 1, NULL),
(14, 2, NULL, 'verkopen foto', '<p>\r\n	<span id="result_box" lang="nl"><span class="hps">Kwaai</span><span class="atn">-</span><span>Beelden is</span> <span class="hps">een in Amsterdam gevestigd</span> <span class="hps">Microstock</span> <span class="hps">fotografie bedrijf</span> <span class="hps atn">(</span><span>laag</span> <span class="hps">geprijsde</span> <span class="hps">en</span> <span class="hps">inclusieve</span> <span class="hps">stock photography</span><span>)</span> <span class="hps">voor afbeeldingen</span><span>,</span> <span class="hps">schetsen en</span> <span class="hps">schilderijen</span><span>.</span> <span class="hps">Dit platform</span> <span class="hps">is gebouwd</span> <span class="hps">voor professionals</span> <span class="hps">en</span> <span class="hps">amateurs</span><span>,</span> <span class="hps">te uploaden</span><span>,</span> <span class="hps">verkoop en wederverkoop</span> <span class="hps">foto&#39;s</span> <span class="hps">en schetsen</span><span>.</span> <span class="hps">Vooral</span> <span class="hps">voor fotografen en</span> <span class="hps">kunstenaar</span><span>.</span> <span class="hps">U</span> <span class="hps">kunt uploaden</span> <span class="hps">en geven de</span> <span class="hps">foto&#39;s</span> <span class="hps">een glimlach of</span> <span class="hps">meer</span> <span class="hps">(rating</span><span>)</span> <span class="hps">en geef</span> <span class="hps">een</span> <span class="hps">korte berichten</span> <span class="hps atn">(</span><span>wat</span> <span class="hps">zeggen de mensen</span> <span class="hps">van</span> <span class="hps">Beeld</span> <span class="hps">of</span> <span class="hps">Sketch</span><span>)</span> <span class="hps">om de foto of</span> <span class="hps">schets</span><span>.</span></span></p>\r\n<hr />\r\n<h3>\r\n	Hoe te Stock verkopen in drie eenvoudige stappen</h3>\r\n<div class="steps">\r\n	<h3>\r\n		Aanmelden</h3>\r\n	<p>\r\n		You need to be an iStock member before you can contribute your stock. But don&#39;t worry &ndash; joining only takes a minute and it doesn&rsquo;t cost a thing.</p>\r\n	<a href="#login">Join</a></div>\r\n<!--/steps-->\r\n<div class="steps">\r\n	<h3>\r\n		Upload uw afbeeldingen</h3>\r\n	<p>\r\n		Our review team will inspect your images and, if necessary, your model and property releases. If we can use your images, we&#39;ll add them to the Kwaai Images collection. You always keep the copyrights to your work.</p>\r\n</div>\r\n<!--/steps-->\r\n<div class="steps">\r\n	<h3>\r\n		Kweek uw inkomen</h3>\r\n	<p>\r\n		Improve your earnings by submitting your creative work.</p>\r\n</div>\r\n', 'http://localhost/pixelci/sell-pictures.html', 1, -1, 1, 1, NULL),
(15, 3, NULL, '賣圖片', '<p>\r\n	<span id="result_box" lang="zh-TW"><span>Kwaai</span><span>圖片</span><span>是</span><span>總部</span><span>設</span><span>在阿姆斯特丹</span><span>的</span><span>微利</span><span>攝影公司</span><span>（</span><span>低價</span><span>和包容性</span><span>的</span><span>攝影</span><span>）</span><span>的圖像</span><span>，素描</span><span>和繪畫</span><span>。</span><span>此平台</span><span>打造為</span><span>專業</span><span>人士</span><span>和業餘愛好者</span><span>，</span><span>上傳，</span><span>銷售和</span><span>轉售</span><span>圖片和</span><span>草圖</span><span>。</span><span>特別</span><span>為攝影師</span><span>和</span><span>藝術家</span><span>。</span><span>您可以上傳</span><span>給</span><span>圖片</span><span>一個微笑或</span><span>以上</span><span>（額定</span><span>）</span><span>，</span><span>並</span><span>給一個簡短的</span><span>消息</span><span>（</span><span>本圖片</span><span>或</span><span>素描</span><span>的</span><span>人</span><span>還有什麼好說的</span><span>）</span><span>的照片或</span><span>草圖</span><span>。</span></span></p>\r\n<hr />\r\n<h3>\r\n	三個簡單的步驟如何銷售圖片</h3>\r\n<div class="steps">\r\n	<h3>\r\n		報名</h3>\r\n	<p>\r\n		You need to be an iStock member before you can contribute your stock. But don&#39;t worry &ndash; joining only takes a minute and it doesn&rsquo;t cost a thing.</p>\r\n	<a href="#login">Join</a></div>\r\n<div class="steps">\r\n	<h3>\r\n		上傳你的圖片</h3>\r\n	<p>\r\n		Our review team will inspect your images and, if necessary, your model and property releases. If we can use your images, we&#39;ll add them to the Kwaai Images collection. You always keep the copyrights to your work.</p>\r\n</div>\r\n<div class="steps">\r\n	<h3>\r\n		拓展你的收入</h3>\r\n	<p>\r\n		Improve your earnings by submitting your creative work.</p>\r\n</div>\r\n', 'http://localhost/pixelci/sell-pictures.html', 1, -1, 1, 1, NULL),
(16, 1, NULL, 'FAQs', 'FAQ&#39;s content here.. in engliseh', 'http://localhost/pixelci/faqs.html', 1, -1, 1000, 1, 1),
(17, 2, NULL, 'Veelgestelde vragen', '<span class="short_text" id="result_box" lang="nl"><span class="hps">Veelgestelde vragen</span> <span class="hps">in het Nederlands</span> <span class="hps">inhoud</span> <span class="hps">....</span></span>', 'http://localhost/pixelci/faqs.html', 1, -1, 1000, 1, 1),
(18, 3, NULL, '常見問題', '常見問題\r\n<ul>\r\n	<li>\r\n		常見問題</li>\r\n	<li>\r\n		常見問題</li>\r\n	<li>\r\n		常見問題</li>\r\n	<li>\r\n		常見問題</li>\r\n	<li>\r\n		常見問題</li>\r\n	<li>\r\n		常見問題</li>\r\n</ul>\r\n', 'http://localhost/pixelci/faqs.html', 1, -1, 1000, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblproducts`
--

CREATE TABLE IF NOT EXISTS `pxl_tblproducts` (
  `ProductId` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryId` int(11) NOT NULL,
  `SCategoryId` int(11) NOT NULL,
  `OrId` int(11) NOT NULL,
  `ProfileId` int(11) NOT NULL,
  `ProductCode` varchar(255) NOT NULL,
  `ProductName` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ProductDescription` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ProductPrice` varchar(255) NOT NULL,
  `OtherThumb` tinyint(4) NOT NULL COMMENT '1=yes,0=no',
  `TotalLike` varchar(255) NOT NULL,
  `TotalDownload` varchar(255) NOT NULL,
  `TotalViews` varchar(255) NOT NULL,
  `Rating` int(11) NOT NULL,
  `TotalSize` varchar(255) NOT NULL COMMENT 'MB',
  `CreatedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ProductId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pxl_tblproducts`
--

INSERT INTO `pxl_tblproducts` (`ProductId`, `CategoryId`, `SCategoryId`, `OrId`, `ProfileId`, `ProductCode`, `ProductName`, `ProductDescription`, `ProductPrice`, `OtherThumb`, `TotalLike`, `TotalDownload`, `TotalViews`, `Rating`, `TotalSize`, `CreatedAt`, `UpdateAt`) VALUES
(1, 1, 7, 1, 1, 'DZE406', 'Pyramid of Foods', 'Pyramid of Foods content here...', '', 0, '', '', '', 0, '0.31', '2013-12-02 11:52:56', '2013-12-02 11:06:03'),
(2, 1, 13, 1, 1, 'OHM824', 'Jungle', 'Jungly road adventure', '', 0, '', '', '', 0, '3.47', '2013-12-02 11:54:31', '2013-12-02 11:06:26'),
(3, 1, 13, 1, 1, 'KED429', 'Pashupatinath', 'Pashupatinath le sabbai ko rakchaya garun', '500', 1, '', '', '', 0, '0.32', '2013-12-02 15:52:08', '0000-00-00 00:00:00'),
(4, 1, 13, 4, 1, 'CHI739', 'Brain wash', 'brain wash enlightment', '', 0, '', '', '', 0, '0.1', '2013-12-02 15:52:50', '0000-00-00 00:00:00'),
(5, 1, 7, 1, 1, 'NJZ463', 'Desert', 'desert', '', 0, '', '', '', 0, '0.84', '2013-12-02 16:02:09', '0000-00-00 00:00:00'),
(6, 1, 7, 1, 1, 'ZAJ961', 'Red flower', 'Red Flower', '', 0, '', '', '', 0, '0.88', '2013-12-02 16:02:29', '0000-00-00 00:00:00'),
(7, 7, 19, 1, 1, 'SVJ961', 'home architechture', 'home description', '', 0, '', '', '', 0, '0.08', '2013-12-02 16:03:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblproductvariations`
--

CREATE TABLE IF NOT EXISTS `pxl_tblproductvariations` (
  `VariationId` int(11) NOT NULL AUTO_INCREMENT,
  `ProductCode` varchar(255) NOT NULL,
  `ProductSize` varchar(255) NOT NULL COMMENT 'KB',
  `ImageName` varchar(255) NOT NULL,
  `ProductDimensionName` varchar(255) NOT NULL,
  `ProductDimensions` varchar(255) NOT NULL,
  PRIMARY KEY (`VariationId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `pxl_tblproductvariations`
--

INSERT INTO `pxl_tblproductvariations` (`VariationId`, `ProductCode`, `ProductSize`, `ImageName`, `ProductDimensionName`, `ProductDimensions`) VALUES
(1, 'DZE406', '0.01', '1385964474.jpg', 'listing', '180x108'),
(2, 'DZE406', '0.03', '1385964474.jpg', 'detail', '440x269'),
(3, 'DZE406', '278.8', '1385964474.jpg', 'actual', '2581x1936'),
(4, 'OHM824', '0.01', '1385964568.jpg', 'listing', '180x108'),
(5, 'OHM824', '0.04', '1385964568.jpg', 'detail', '440x269'),
(6, 'OHM824', '3494.57', '1385964568.jpg', 'actual', '3840x2160'),
(7, 'KED429', '0.01', '1385978826.jpg', 'listing', '180x108'),
(8, 'KED429', '0.03', '1385978826.jpg', 'detail', '440x269'),
(9, 'KED429', '79.13', '1385978826.jpg', 'actual', '1024x748'),
(10, 'KED429', '0.09', '1385978826.jpg', 'large', '820x820'),
(11, 'KED429', '0.06', '1385978826.jpg', 'medium', '615x615'),
(12, 'KED429', '0.04', '1385978826.jpg', 'small', '410x410'),
(13, 'KED429', '0.01', '1385978826.jpg', 'xsmall', '205x205'),
(14, 'CHI739', '0', '1385978870.jpg', 'listing', '180x108'),
(15, 'CHI739', '0.01', '1385978870.jpg', 'detail', '440x269'),
(16, 'CHI739', '87.4', '1385978870.jpg', 'actual', '606x808'),
(17, 'NJZ463', '0.01', '1385979428.jpg', 'listing', '180x108'),
(18, 'NJZ463', '0.03', '1385979428.jpg', 'detail', '440x269'),
(19, 'NJZ463', '826.11', '1385979428.jpg', 'actual', '1024x768'),
(20, 'ZAJ961', '0.01', '1385979448.jpg', 'listing', '180x108'),
(21, 'ZAJ961', '0.04', '1385979448.jpg', 'detail', '440x269'),
(22, 'ZAJ961', '858.78', '1385979448.jpg', 'actual', '1024x768'),
(23, 'SVJ961', '0.01', '1385979502.jpg', 'listing', '180x108'),
(24, 'SVJ961', '0.02', '1385979502.jpg', 'detail', '440x269'),
(25, 'SVJ961', '50.41', '1385979502.jpg', 'actual', '1024x705');

-- --------------------------------------------------------

--
-- Table structure for table `pxl_tblprofile`
--

CREATE TABLE IF NOT EXISTS `pxl_tblprofile` (
  `ProfileId` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` int(11) NOT NULL,
  `PackageId` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `CompanyName` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`ProfileId`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `pxl_tblprofile`
--


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
