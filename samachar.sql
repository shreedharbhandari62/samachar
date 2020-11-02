-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 04:45 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `samachar`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `admin_id` bigint(25) NOT NULL,
  `admin_fname` varchar(25) NOT NULL,
  `admin_lname` varchar(25) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_phone` varchar(50) NOT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `is_active`, `created_date`, `updated_date`) VALUES
(1, 'Super', 'Admin', 'superadmin', '827ccb0eea8a706c4c34a16891f84e7b', 'superadmin@gmail.com', '9843567890', 'active', '2020-04-03 13:28:44', NULL),
(2, 'Ram', 'Lama', 'ramlama', '827ccb0eea8a706c4c34a16891f84e7b', '', '9843567890', 'active', '2020-05-31 18:35:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbladvertisement`
--

CREATE TABLE `tbladvertisement` (
  `advertisement_id` bigint(25) NOT NULL,
  `advertisement_name` varchar(50) NOT NULL,
  `advertisement_category` varchar(20) NOT NULL,
  `advertisement_area` enum('header','front_page','category_page','subcategory_page','news_detailpage','search_resultpage') NOT NULL,
  `advertisement_specific_area` enum('first_top','second_top','first_banner','second_banner','third_banner','देश','राजनिती','अर्थतन्त्र','बिचार','कूटनीति','सुरक्षा','जलवायु तथा वातावरण','विज्ञान तथा प्रविधि','अन्तर्राष्ट्रिय','कानून तथा न्यायपालिका','अन्य','first_side','second_side','third_side','fourth_side','fifth_side','sixth_side','seventh_side','eighth_side','nineth_side','tenth_side','eleventh_side','twelveth_side','first_bottom','below_categoryTitleFirst','below_categoryTitleSecond','below_categoryNewsFirstSide','below_categoryNewsSecondSide','below_categoryNewsThirdSide','below_categoryNewsFourthSide','below_categoryNewsFifthSide','below_categoryNewsSixthSide','below_categoryNewsList','above_categoryFooter','below_subcategoryTitleFirst','below_subcategoryTitleSecond','below_subcategoryNewsFirstSide','below_subcategoryNewsSecondSide','below_subcategoryNewsThirdSide','below_subcategoryNewsFourthSide','below_subcategoryNewsFifthSide','below_subcategoryNewsSixthSide','below_subcategoryNewsList','above_subcategoryFooter','below_searchResultNavbarFirst','below_searchResultNavbarSecond','below_searchResultFirstSide','below_searchResultSecondSide','below_searchResultThirdSide','below_searchResultFourthSide','below_searchResultFifthSide','below_searchResultSixthSide','below_searchResultNewsList','above_searchResultFooter','below_newsTitle','below_newsPhoto','below_newsFirstSide','below_newsSecondSide','below_newsThirdSide','below_newsFourthSide','below_newsFifthSide','below_newsSixthSide','below_newsSeventhSide','below_newsFirstPara','below_newsLastPara','above_newsComment') DEFAULT NULL,
  `advertisement_image` varchar(255) NOT NULL,
  `advertisement_expiry_date` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `is_availilable` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbladvertisement`
--

INSERT INTO `tbladvertisement` (`advertisement_id`, `advertisement_name`, `advertisement_category`, `advertisement_area`, `advertisement_specific_area`, `advertisement_image`, `advertisement_expiry_date`, `status`, `is_availilable`) VALUES
(108, 'Advertisement 1', '', 'front_page', 'राजनिती', '5ebfba37b008c6.56744068.jpg', '2020-05-30', 'active', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `tblarchive`
--

CREATE TABLE `tblarchive` (
  `archive_id` bigint(25) NOT NULL,
  `news_id` bigint(25) NOT NULL,
  `news_writtenby` varchar(25) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `category_id` bigint(25) NOT NULL,
  `subcategory_id` bigint(25) NOT NULL,
  `is_bannerNews` varchar(10) NOT NULL,
  `news_deails` longtext NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_featuredimage` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` varchar(10) NOT NULL,
  `top_news` varchar(10) NOT NULL,
  `news_visit` varchar(255) NOT NULL,
  `news_video` varchar(255) NOT NULL,
  `news_writerImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblarticle`
--

CREATE TABLE `tblarticle` (
  `article_id` bigint(50) NOT NULL,
  `article_author` varchar(50) NOT NULL,
  `article_title` varchar(255) DEFAULT NULL,
  `article_details` longtext DEFAULT NULL,
  `article_featuredimage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` enum('active','inactive') DEFAULT NULL,
  `top_article` enum('yes','no') DEFAULT NULL,
  `article_views` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblarticlecomment`
--

CREATE TABLE `tblarticlecomment` (
  `comment_id` bigint(25) NOT NULL,
  `article_id` bigint(25) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `comment` longtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `category_id` bigint(25) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_descrption` longtext NOT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcategory`
--

INSERT INTO `tblcategory` (`category_id`, `category_name`, `category_descrption`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'देश', 'देश', 'active', '2020-04-23 07:01:32', '0000-00-00 00:00:00'),
(2, 'राजनिती ', 'राजनिती ', 'active', '2020-04-23 07:03:58', '0000-00-00 00:00:00'),
(3, 'अर्थतन्त्र ', 'अर्थतन्त्र ', 'active', '2020-04-23 07:04:32', '0000-00-00 00:00:00'),
(4, 'बिचार ', 'बिचार ', 'active', '2020-04-23 07:05:02', '0000-00-00 00:00:00'),
(5, 'कूटनीति', 'कूटनीति', 'active', '2020-04-23 07:05:43', '0000-00-00 00:00:00'),
(6, 'सुरक्षा', 'सुरक्षा', 'active', '2020-04-23 07:06:03', '0000-00-00 00:00:00'),
(14, 'कानून तथा न्यायपालिका', 'Related with law and judiciary', 'active', '2020-05-12 12:05:17', '0000-00-00 00:00:00'),
(15, 'जलवायु तथा वातावरण', 'Related to climate and environment', 'active', '2020-05-12 12:06:38', '0000-00-00 00:00:00'),
(16, 'विज्ञान तथा प्रविधि', 'Related to Science and Technology', 'active', '2020-05-12 12:07:10', '0000-00-00 00:00:00'),
(17, 'अन्तर्राष्ट्रिय', 'Related to International', 'active', '2020-05-12 12:08:53', '0000-00-00 00:00:00'),
(20, 'अन्य', 'Related to Additional', 'active', '2020-05-12 12:12:32', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tblcomment`
--

CREATE TABLE `tblcomment` (
  `comment_id` bigint(25) NOT NULL,
  `news_id` bigint(25) DEFAULT NULL,
  `name` varchar(25) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `comment` longtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_active` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `contact_id` bigint(25) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `message` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblcontact`
--

INSERT INTO `tblcontact` (`contact_id`, `name`, `email`, `website`, `message`) VALUES
(5, 'Shreedhar Bhandari', 'shreedharbhandari62@gmail.com', 'abc.com', 'Hello');

-- --------------------------------------------------------

--
-- Table structure for table `tblnews`
--

CREATE TABLE `tblnews` (
  `news_id` bigint(25) NOT NULL,
  `news_writtenby` varchar(50) NOT NULL,
  `news_title` varchar(200) DEFAULT NULL,
  `category_id` bigint(25) DEFAULT NULL,
  `subcategory_id` bigint(25) DEFAULT NULL,
  `is_bannerNews` enum('yes','no') NOT NULL DEFAULT 'no',
  `news_deails` longtext DEFAULT NULL,
  `news_url` varchar(255) DEFAULT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_featuredimage` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` enum('active','inactive') DEFAULT NULL,
  `featured_startdate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `featured_enddate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `top_news` enum('yes','no') DEFAULT NULL,
  `news_visit` varchar(255) NOT NULL,
  `news_video` varchar(100) NOT NULL,
  `news_writerImage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblnewstrash`
--

CREATE TABLE `tblnewstrash` (
  `trash_id` bigint(25) NOT NULL,
  `news_id` bigint(25) NOT NULL,
  `news_title` varchar(50) NOT NULL,
  `news_writtenby` varchar(50) NOT NULL,
  `category_id` bigint(25) NOT NULL,
  `subcategory_id` bigint(25) NOT NULL,
  `is_bannerNews` enum('yes','no') DEFAULT NULL,
  `news_deails` longtext NOT NULL,
  `news_url` varchar(255) NOT NULL,
  `news_image` varchar(255) NOT NULL,
  `news_featuredimage` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL,
  `updated_at` varchar(50) NOT NULL,
  `is_active` varchar(20) NOT NULL,
  `featured_startdate` varchar(50) NOT NULL,
  `featured_enddate` varchar(50) NOT NULL,
  `top_news` varchar(20) NOT NULL,
  `news_writerImage` varchar(100) NOT NULL,
  `news_video` varchar(100) NOT NULL,
  `news_visit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubcategory`
--

CREATE TABLE `tblsubcategory` (
  `subcategory_id` bigint(25) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` bigint(50) DEFAULT NULL,
  `subcategory_descrption` longtext DEFAULT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblsubcategory`
--

INSERT INTO `tblsubcategory` (`subcategory_id`, `subcategory_name`, `category_id`, `subcategory_descrption`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'संघीय', 1, 'संघीय', 'active', '2020-04-23 07:19:19', '0000-00-00 00:00:00'),
(2, 'प्रदेश', 1, 'प्रदेश', 'active', '2020-04-23 07:20:44', '0000-00-00 00:00:00'),
(3, 'स्थानीय तह', 1, 'स्थानीय तह', 'active', '2020-04-23 07:23:14', '0000-00-00 00:00:00'),
(4, 'प्रबास', 1, 'प्रबास', 'active', '2020-04-23 07:24:36', '0000-00-00 00:00:00'),
(5, 'सरकार', 2, 'सरकार', 'active', '2020-04-23 07:25:24', '0000-00-00 00:00:00'),
(6, 'राजनीतिक दलहरू', 2, 'राजनीतिक दलहरू', 'active', '2020-04-23 07:26:00', '0000-00-00 00:00:00'),
(7, ' बैंकिंग तथा वित्त', 3, 'बैंकिंग तथा वित्त', 'active', '2020-04-23 07:27:10', '0000-00-00 00:00:00'),
(8, 'बीमा', 3, 'बीमा', 'active', '2020-04-23 07:27:35', '0000-00-00 00:00:00'),
(9, 'कर्पोरेट', 3, 'कर्पोरेट', 'active', '2020-04-23 07:27:57', '0000-00-00 00:00:00'),
(10, 'पर्यटन', 3, 'पर्यटन ', 'active', '2020-04-23 07:28:40', '0000-00-00 00:00:00'),
(11, 'कृषि', 3, 'कृषि', 'active', '2020-04-23 07:29:09', '0000-00-00 00:00:00'),
(12, 'अटोमोबाइल', 3, 'अटोमोबाइल', 'active', '2020-04-23 07:30:03', '0000-00-00 00:00:00'),
(13, 'उद्योग', 3, 'उद्योग', 'active', '2020-04-23 07:30:24', '0000-00-00 00:00:00'),
(14, 'सम्पादकीय', 4, 'सम्पादकीय', 'active', '2020-04-23 07:31:59', '0000-00-00 00:00:00'),
(15, 'स्तम्भकार', 4, 'स्तम्भकार', 'active', '2020-04-23 07:33:26', '0000-00-00 00:00:00'),
(16, ' शीर्ष कुराकानी', 4, 'शीर्ष कुराकानी', 'active', '2020-04-23 07:34:02', '0000-00-00 00:00:00'),
(17, 'अन्तर्वार्ता', 4, 'अन्तर्वार्ता', 'active', '2020-04-23 07:34:35', '0000-00-00 00:00:00'),
(18, 'पुस्तक समीक्षा', 4, 'पुस्तक समीक्षा', 'active', '2020-04-23 07:35:02', '0000-00-00 00:00:00'),
(19, ' ब्लग', 4, 'ब्लग', 'active', '2020-04-23 07:35:24', '0000-00-00 00:00:00'),
(21, 'सेना', 6, 'सेना', 'active', '2020-04-23 07:36:48', '0000-00-00 00:00:00'),
(22, 'सशस्त्र बल', 6, '\r\nसशस्त्र बल', 'active', '2020-04-23 07:37:19', '0000-00-00 00:00:00'),
(23, 'प्रहरी', 6, 'प्रहरी', 'active', '2020-04-23 07:37:43', '0000-00-00 00:00:00'),
(44, 'छिमेकी चीन', 5, 'Related to China', 'active', '2020-05-12 12:17:43', '0000-00-00 00:00:00'),
(45, 'छिमेकी भारत', 5, 'Related to India', 'active', '2020-05-12 12:18:16', '0000-00-00 00:00:00'),
(46, 'ईन्डो-पेसिफिक', 5, 'Related to Indo-Pacific', 'active', '2020-05-12 12:18:55', '0000-00-00 00:00:00'),
(47, 'बेल्ट र रोड', 5, 'Related to Belt and Road', 'active', '2020-05-12 12:19:32', '0000-00-00 00:00:00'),
(48, 'सार्क', 5, 'Related to SAARC', 'active', '2020-05-12 12:20:49', '0000-00-00 00:00:00'),
(49, ' बिम्सटेक', 5, 'Related to BIMSTEC', 'active', '2020-05-12 12:21:25', '0000-00-00 00:00:00'),
(50, 'ACD/SCO', 5, 'Related to ACD/SCO', 'active', '2020-05-12 12:22:42', '0000-00-00 00:00:00'),
(51, 'अनुसन्धान', 6, 'Related to Intelligence and Research', 'active', '2020-05-12 12:24:57', '0000-00-00 00:00:00'),
(52, 'संसद', 14, 'Related to Parliament', 'active', '2020-05-12 12:41:32', '0000-00-00 00:00:00'),
(53, ' न्यायपालिका', 14, 'Related to Judiciary', 'active', '2020-05-12 12:42:02', '0000-00-00 00:00:00'),
(54, 'कानून मन्त्रालय', 14, 'Related to Law Ministry', 'active', '2020-05-12 12:42:35', '0000-00-00 00:00:00'),
(55, ' सरकारी वकिल', 14, 'Related to Attorney', 'active', '2020-05-12 12:43:59', '0000-00-00 00:00:00'),
(56, ' न्यायाधिकरण', 14, 'Related to Tribunals', 'active', '2020-05-12 12:44:29', '0000-00-00 00:00:00'),
(57, ' विज्ञान', 16, 'Related to Science', 'active', '2020-05-12 12:45:21', '0000-00-00 00:00:00'),
(58, 'सूचना प्रबिधि', 16, 'Related to IT', 'active', '2020-05-12 12:45:54', '0000-00-00 00:00:00'),
(59, ' अन्तरिक्ष', 16, 'Related to Air and Space', 'active', '2020-05-12 12:46:45', '0000-00-00 00:00:00'),
(61, 'आविष्कार', 16, 'Related to Discovery', 'active', '2020-05-12 12:47:47', '0000-00-00 00:00:00'),
(62, 'जलवायु परिवर्तन', 15, 'Related to Climate Change', 'active', '2020-05-12 12:49:16', '0000-00-00 00:00:00'),
(63, 'वातावरण', 15, 'Related to Environment', 'active', '2020-05-12 12:49:50', '0000-00-00 00:00:00'),
(64, ' एशिया', 17, 'Related to Asia', 'active', '2020-05-12 12:52:21', '0000-00-00 00:00:00'),
(65, 'अफ्रिका', 17, 'Related to Africa', 'active', '2020-05-12 12:52:55', '0000-00-00 00:00:00'),
(66, 'युरोप र अष्ट्रेलिया', 17, 'Related to Europe and Australia', 'active', '2020-05-12 12:53:30', '0000-00-00 00:00:00'),
(67, 'दक्षिण एशिया', 17, 'Related to South Asia', 'active', '2020-05-12 12:54:11', '0000-00-00 00:00:00'),
(68, 'अमेरिका', 17, 'Related to America', 'active', '2020-05-12 12:54:42', '0000-00-00 00:00:00'),
(69, ' खेलकुद', 20, 'Related to Sports', 'active', '2020-05-12 12:55:37', '0000-00-00 00:00:00'),
(70, 'चलचित्र', 20, 'Related to Movies', 'active', '2020-05-12 12:56:06', '0000-00-00 00:00:00'),
(71, 'जीवन शैली', 20, 'Related to Life Style', 'active', '2020-05-12 12:56:31', '0000-00-00 00:00:00'),
(72, ' कला र साहित्य', 20, 'Related to Arts and Literature', 'active', '2020-05-12 12:57:04', '0000-00-00 00:00:00'),
(73, 'योग / ध्यान', 20, 'Related to Yoga and Meditation', 'active', '2020-05-12 12:57:59', '0000-00-00 00:00:00'),
(74, 'स्वास्थ्य', 20, 'Related to Health', 'active', '2020-05-12 12:58:39', '0000-00-00 00:00:00'),
(75, 'पूर्वी संस्कृति', 20, 'Related to Eastern Culture', 'active', '2020-05-12 12:59:12', '0000-00-00 00:00:00'),
(76, 'फोटो-भिडियो', 20, 'Related to Photo and Video', 'active', '2020-05-12 12:59:57', '0000-00-00 00:00:00'),
(77, 'अनौंठो विश्व', 20, 'Related to Strange World', 'active', '2020-05-12 13:00:25', '0000-00-00 00:00:00'),
(78, 'HP- विशेष', 20, 'Related to HP-Special', 'active', '2020-05-12 13:00:55', '0000-00-00 00:00:00'),
(79, 'प्रशासन', 2, 'प्रशासन releated', 'active', '2020-05-13 11:40:38', '0000-00-00 00:00:00'),
(80, 'अपराध', 6, 'अपराध releated', 'active', '2020-05-13 11:42:49', '0000-00-00 00:00:00'),
(81, ' बार-बेन्च', 14, 'बार-बेन्च releated', 'active', '2020-05-13 11:47:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbltrending`
--

CREATE TABLE `tbltrending` (
  `trending_id` bigint(11) NOT NULL,
  `trending_topic` varchar(25) DEFAULT NULL,
  `trending_rank` int(10) DEFAULT NULL,
  `is_active` enum('active','inactive') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbltrending`
--

INSERT INTO `tbltrending` (`trending_id`, `trending_topic`, `trending_rank`, `is_active`) VALUES
(4, 'समाजवादी ', 6, 'active'),
(5, 'अमिताभ', 5, 'active'),
(6, 'लोकतन्त्र', 3, 'active'),
(7, 'ओली', 2, 'active'),
(8, 'प्रचण्ड', 4, 'active'),
(9, 'कोरोना', 1, 'active'),
(10, 'नेपाली', 2, 'active'),
(11, 'सङ्क्रमित ', 8, 'active'),
(12, 'विश्वव्यापी', 9, 'active'),
(13, 'अध्यादेश', 10, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbladvertisement`
--
ALTER TABLE `tbladvertisement`
  ADD PRIMARY KEY (`advertisement_id`);

--
-- Indexes for table `tblarchive`
--
ALTER TABLE `tblarchive`
  ADD PRIMARY KEY (`archive_id`);

--
-- Indexes for table `tblarticle`
--
ALTER TABLE `tblarticle`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `tblarticlecomment`
--
ALTER TABLE `tblarticlecomment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tblnews`
--
ALTER TABLE `tblnews`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `subcategory_id` (`subcategory_id`);

--
-- Indexes for table `tblnewstrash`
--
ALTER TABLE `tblnewstrash`
  ADD PRIMARY KEY (`trash_id`);

--
-- Indexes for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  ADD PRIMARY KEY (`subcategory_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tbltrending`
--
ALTER TABLE `tbltrending`
  ADD PRIMARY KEY (`trending_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `admin_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladvertisement`
--
ALTER TABLE `tbladvertisement`
  MODIFY `advertisement_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `tblarchive`
--
ALTER TABLE `tblarchive`
  MODIFY `archive_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tblarticle`
--
ALTER TABLE `tblarticle`
  MODIFY `article_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblarticlecomment`
--
ALTER TABLE `tblarticlecomment`
  MODIFY `comment_id` bigint(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `category_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tblcomment`
--
ALTER TABLE `tblcomment`
  MODIFY `comment_id` bigint(25) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `contact_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblnews`
--
ALTER TABLE `tblnews`
  MODIFY `news_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tblnewstrash`
--
ALTER TABLE `tblnewstrash`
  MODIFY `trash_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblsubcategory`
--
ALTER TABLE `tblsubcategory`
  MODIFY `subcategory_id` bigint(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbltrending`
--
ALTER TABLE `tbltrending`
  MODIFY `trending_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblarticlecomment`
--
ALTER TABLE `tblarticlecomment`
  ADD CONSTRAINT `tblarticlecomment_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `tblarticle` (`article_id`);

--
-- Constraints for table `tblcomment`
--
ALTER TABLE `tblcomment`
  ADD CONSTRAINT `tblcomment_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `tblnews` (`news_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
