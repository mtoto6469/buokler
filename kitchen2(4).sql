-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 01:20 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitchen2`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '380', 1520510670);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1507986116, 1507986116),
('collsge', 1, NULL, NULL, NULL, 1507986117, 1507986117),
('costumer', 1, NULL, NULL, NULL, 1507986117, 1507986117),
('student', 1, NULL, NULL, NULL, 1507986117, 1507986117),
('teacher', 1, NULL, NULL, NULL, 1507986117, 1507986117),
('user', 1, NULL, NULL, NULL, 1507986117, 1507986117);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cat_pro`
--

CREATE TABLE `cat_pro` (
  `id` int(11) NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_pro` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `cat_pro`
--

INSERT INTO `cat_pro` (`id`, `id_cat`, `id_pro`) VALUES
(1, 2, '41,41,41,41');

-- --------------------------------------------------------

--
-- Table structure for table `code_off`
--

CREATE TABLE `code_off` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` varchar(300) COLLATE utf8mb4_persian_ci DEFAULT '0',
  `enabel_view` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `code_off`
--

INSERT INTO `code_off` (`id`, `code`, `price`, `enabel_view`) VALUES
(15, 2, '0', 1),
(16, 3, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faceexist`
--

CREATE TABLE `faceexist` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `exist` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `faceexist`
--

INSERT INTO `faceexist` (`id`, `id_pro`, `exist`) VALUES
(90, 41, 0),
(91, 42, 0),
(92, 43, 27);

-- --------------------------------------------------------

--
-- Table structure for table `facesize`
--

CREATE TABLE `facesize` (
  `id` int(11) NOT NULL,
  `id_size` int(11) DEFAULT NULL,
  `size` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `facesize`
--

INSERT INTO `facesize` (`id`, `id_size`, `size`) VALUES
(43, 21, 'gh'),
(44, 22, 'swq'),
(45, 23, 'sad'),
(46, 24, 'ندارد');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_app`
--

CREATE TABLE `gallery_app` (
  `id` int(11) NOT NULL,
  `img` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL,
  `alt` varchar(300) COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `gallery_app`
--

INSERT INTO `gallery_app` (`id`, `img`, `alt`) VALUES
(1, '57fe55c1cd7e51.jpg', 'vcxvczx');

-- --------------------------------------------------------

--
-- Table structure for table `main_app`
--

CREATE TABLE `main_app` (
  `id` int(11) NOT NULL,
  `type` varchar(300) COLLATE utf8mb4_polish_ci NOT NULL,
  `m_d_f` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `id_m_d_f` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `urlimg` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `img1` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `img2` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `img3` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `img4` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `id1` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `id2` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `id3` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `id4` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `headrtype` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `footertype` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `text1` text COLLATE utf8mb4_polish_ci,
  `text2` text COLLATE utf8mb4_polish_ci,
  `text3` text COLLATE utf8mb4_polish_ci,
  `position` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `main_app`
--

INSERT INTO `main_app` (`id`, `type`, `m_d_f`, `id_m_d_f`, `urlimg`, `img1`, `img2`, `img3`, `img4`, `id1`, `id2`, `id3`, `id4`, `headrtype`, `footertype`, `text1`, `text2`, `text3`, `position`) VALUES
(22, 'oneImage', 'd', '3', 'http://localhost/upload/15.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(23, 'fourImage', NULL, NULL, NULL, 'http://localhost/upload/57fe55c1cd7e51.jpg', 'http://localhost/upload/268903_515528685151134_963719900_n.jpg', 'http://localhost/upload/15.png', 'http://localhost/upload/7.jpg', 'd-1', 'd-3', 'm-36', 'm-40', 'ffs', 'sfsafaffa', NULL, NULL, NULL, 2),
(24, 'oneText', 'd', '3', 'http://localhost/upload/57fe55c1cd7e51.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sfdsf', NULL, NULL, NULL, NULL, 3),
(25, 'towText', 'm', '36', 'http://localhost/upload/15.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfsasf', 'fdf fdafdaf', NULL, NULL, NULL, 4),
(26, 'oneText', 'm', '37', 'http://localhost/upload/57fe55c1cd7e51.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sfsfs', NULL, NULL, NULL, NULL, 5),
(27, 'treeImage', NULL, NULL, NULL, 'http://localhost/upload/2017-summer-new-sexy-slash-neck-fashion-women.jpg', 'http://localhost/upload/268903_515528685151134_963719900_n.jpg', 'http://localhost/upload/15.png', NULL, 'm-40', 'm-38', 'd-2', NULL, 'fsd ', 'ffdfadf', 'afdasf', 'fdsafd', 'fadsfa', 6),
(36, 'sllider', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7),
(37, 'towText', 'm', '38', 'http://localhost/upload/2017-summer-new-sexy-slash-neck-fashion-women.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'hfghh', 'hg uhgjh', NULL, NULL, NULL, 8);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1505819197),
('m130524_201442_init', 1505819203),
('m140506_102106_rbac_init', 1506338470),
('m160622_085710_create_ImageManager_table', 1506247435),
('m170223_113221_addBlameableBehavior', 1506247436);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `img` varchar(300) COLLATE utf8mb4_polish_ci NOT NULL,
  `alt` varchar(20) COLLATE utf8mb4_polish_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `enabel` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `img`, `alt`, `description`, `enabel`) VALUES
(6, '1.jpeg', 'یل', 'یبل', 1),
(7, 'ash.jpg', 'لیلی', 'یلبی', 1),
(8, 'Lucas-Allen-tatler-10feb14_pr_b_639x426.jpg', 'یبل', 'یبل', 1),
(9, 'landscape-1466708405-beach-dream-7.jpg', 'بیلیب', 'لیبل', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliderapp`
--

CREATE TABLE `sliderapp` (
  `id` int(11) NOT NULL,
  `id_main` int(11) NOT NULL,
  `img` varchar(300) COLLATE utf8mb4_polish_ci NOT NULL,
  `text` text COLLATE utf8mb4_polish_ci NOT NULL,
  `id_m_d_f` varchar(300) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `id_cat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Dumping data for table `sliderapp`
--

INSERT INTO `sliderapp` (`id`, `id_main`, `img`, `text`, `id_m_d_f`, `id_cat`) VALUES
(4, 36, 'http://localhost/upload/188.jpg', 'hhfdsffgv', 'm-40', 0),
(6, 36, 'http://localhost/upload/2017-new-women-europe-and-the-united-states.jpg', 'cgfgfhgfgh uhuu', 'd-3', 5),
(7, 36, 'http://localhost/upload/2017-summer-new-sexy-slash-neck-fashion-women.jpg', 'bnvbnvnbvbfaff', 'd-1', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbladdres_phon`
--

CREATE TABLE `tbladdres_phon` (
  `id` int(11) NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbladdres_phon`
--

INSERT INTO `tbladdres_phon` (`id`, `address`, `tel`) VALUES
(1, 'tehran--', '34556788');

-- --------------------------------------------------------

--
-- Table structure for table `tblallpost`
--

CREATE TABLE `tblallpost` (
  `id` int(11) NOT NULL,
  `address` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `price_post` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `name_post` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `costomer` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `tel` int(12) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `down_buy` int(11) DEFAULT '0',
  `id_fac` int(11) DEFAULT NULL,
  `id_fader` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblallpost`
--

INSERT INTO `tblallpost` (`id`, `address`, `price_post`, `category`, `name_post`, `costomer`, `tel`, `price`, `id_user`, `down_buy`, `id_fac`, `id_fader`) VALUES
(4, 'wrewrwe', 12000, 1, 'post', 'sfd', 3123, 12045, 372, 1, 1, 0),
(5, 'ukjh', NULL, 1, NULL, '', NULL, NULL, 374, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblbag`
--

CREATE TABLE `tblbag` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `date` date NOT NULL,
  `date_ir` varchar(300) CHARACTER SET latin1 NOT NULL,
  `id_fac` int(11) DEFAULT '0',
  `enabel` int(11) DEFAULT '1',
  `enable_view` int(11) DEFAULT '1',
  `down_buy` int(11) DEFAULT '0',
  `size` int(11) DEFAULT NULL,
  `color` varchar(300) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `id_all_post` varchar(300) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `price` int(30) NOT NULL,
  `id_discount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `tblbag`
--

INSERT INTO `tblbag` (`id`, `id_user`, `id_pro`, `count`, `date`, `date_ir`, `id_fac`, `enabel`, `enable_view`, `down_buy`, `size`, `color`, `id_all_post`, `price`, `id_discount`) VALUES
(23, 375, 43, 1, '2018-02-17', '??/??/??', 0, 1, 1, 0, NULL, NULL, NULL, 22187878, NULL),
(27, 375, 43, 1, '2018-02-18', '??/??/??', 0, 1, 1, 0, NULL, NULL, NULL, 22187878, NULL),
(29, 375, 42, 1, '2018-02-18', '??/??/??', 0, 1, 1, 0, NULL, NULL, NULL, 10, NULL),
(30, 375, 42, 1, '2018-03-08', '??/??/??', 0, 1, 1, 0, NULL, NULL, NULL, 10, NULL),
(31, 375, 44, 1, '2018-03-08', '??/??/??', 0, 1, 1, 0, NULL, NULL, NULL, 15000, NULL),
(32, 375, 44, 6, '2018-03-08', '??/??/??', 0, 1, 1, 0, NULL, NULL, NULL, 90000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblbag_replace`
--

CREATE TABLE `tblbag_replace` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT '1',
  `id_fac` int(11) DEFAULT '0',
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1',
  `down_buy` int(11) DEFAULT '0',
  `size` int(11) NOT NULL,
  `color` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `id_all_post` int(11) DEFAULT NULL,
  `price` int(30) NOT NULL,
  `id_replace` int(11) NOT NULL,
  `id_bag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `id` int(11) NOT NULL,
  `brand` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` text COLLATE utf8_persian_ci,
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblbrand`
--

INSERT INTO `tblbrand` (`id`, `brand`, `description`, `enabel`, `enabel_view`) VALUES
(1, 'fff', 'ds', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory`
--

CREATE TABLE `tblcategory` (
  `id_category` int(11) NOT NULL,
  `title_category` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `description_category` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `enable_category` int(11) NOT NULL,
  `enabel_view_category` int(11) DEFAULT '1',
  `id_parent` int(11) DEFAULT NULL,
  `group_category` int(11) NOT NULL DEFAULT '1',
  `menu_foter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcategory_product`
--

CREATE TABLE `tblcategory_product` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `id_parent` int(11) DEFAULT NULL,
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblcategory_product`
--

INSERT INTO `tblcategory_product` (`id`, `name`, `description`, `id_parent`, `enabel`, `enabel_view`) VALUES
(1, 'دسته 1', '', 0, 1, 1),
(2, 'دسته 2', '', 0, 1, 1),
(3, 'دسته 3', '', 0, 1, 1),
(4, 'دسته 4', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcolor`
--

CREATE TABLE `tblcolor` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1',
  `color` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `img` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblcolor`
--

INSERT INTO `tblcolor` (`id`, `id_pro`, `enabel`, `enabel_view`, `color`, `img`) VALUES
(7, 30, 1, 1, 'fhgf', '57fe55c1cd7e51.jpg'),
(8, 34, 1, 1, 'hgjh', '16077.png'),
(9, 35, 1, 1, 'sa', '188.jpg'),
(10, 36, 1, 1, 'h', '16077.png'),
(11, 36, 1, 1, 'jmj', '16077.png'),
(12, 37, 1, 1, 'xsa', '7b3a351c5f846f184dc969c729e9ec29.jpeg'),
(13, 37, 1, 1, 'sdsd', 'AAEAAQAAAAAAAAe1AAAAJDMwZGQ0ZjJkLTVjMDMtNDM0ZS1iOTQwLWZmMzA5YjUyNGQ1Nw.jpg'),
(14, 38, 1, 1, 'h', 'hhh.jpg'),
(15, 40, 1, 1, 'g', 'bigstock-Delicious-birthday-cake-on-tab-78718583.jpg'),
(16, 39, 1, 1, 'نتنا', '7b3a351c5f846f184dc969c729e9ec29.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbldeliverprice`
--

CREATE TABLE `tbldeliverprice` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbldeliverprice`
--

INSERT INTO `tbldeliverprice` (`id`, `name`, `price`) VALUES
(1, 'تیپاکس', 15000),
(2, 'پست', 12000),
(3, 'پیک موتوری', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tbldiscount`
--

CREATE TABLE `tbldiscount` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `all_pro` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1',
  `price_namayande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbldiscount`
--

INSERT INTO `tbldiscount` (`id`, `name`, `description`, `all_pro`, `price`, `enabel`, `enabel_view`, `price_namayande`) VALUES
(1, 'jjj', 'dsf', 0, 10, 1, 1, NULL),
(2, 'g', 'gh', 0, 10, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbldis_pro`
--

CREATE TABLE `tbldis_pro` (
  `id` int(11) NOT NULL,
  `id_cat_pro` int(11) NOT NULL,
  `id_dis` int(11) NOT NULL,
  `enabel_view` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldis_pro`
--

INSERT INTO `tbldis_pro` (`id`, `id_cat_pro`, `id_dis`, `enabel_view`) VALUES
(1, 36, 1, 1),
(2, 38, 1, 1),
(3, 37, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblexist`
--

CREATE TABLE `tblexist` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `enabel_view` int(11) NOT NULL DEFAULT '1',
  `exist` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblexist`
--

INSERT INTO `tblexist` (`id`, `id_pro`, `size`, `color`, `enabel_view`, `exist`) VALUES
(3, 36, 21, 'h', 1, 56),
(4, 37, 23, 'sdsd', 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tblgallery`
--

CREATE TABLE `tblgallery` (
  `id` int(11) NOT NULL,
  `title` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `alert` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `and_web` int(11) NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `enable` int(11) NOT NULL,
  `enable_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblgallery`
--

INSERT INTO `tblgallery` (`id`, `title`, `address`, `alert`, `and_web`, `description`, `enable`, `enable_view`) VALUES
(1, 'dfds', '15.png', 'dafda', 1, 'afafdfa', 1, 1),
(2, 'dfds', '57fe55c1cd7e51.jpg', 'dafda', 1, 'afafdfa', 1, 1),
(3, 'dfds', '185.jpg', 'dafda', 1, 'afafdfa', 1, 1),
(4, 'dfds', '2017-summer-new-sexy-slash-neck-fashion-women.jpg', 'dafda', 1, 'afafdfa', 1, 1),
(5, 'dfds', '268903_515528685151134_963719900_n.jpg', 'dafda', 1, 'afafdfa', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenu`
--

CREATE TABLE `tblmenu` (
  `id_menu` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `enable` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `title` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `text` text COLLATE utf8_persian_ci NOT NULL,
  `tell` int(11) DEFAULT NULL,
  `id_post` int(11) DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `date` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `date_ir` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`id`, `id_user`, `title`, `text`, `tell`, `id_post`, `email`, `date`, `date_ir`) VALUES
(1, NULL, 'hhghgh', 'ghgvhgf345445', 8888, NULL, 'ghcgcg', NULL, '۹۶/۰۸/۲۶');

-- --------------------------------------------------------

--
-- Table structure for table `tblpardakht`
--

CREATE TABLE `tblpardakht` (
  `id` int(11) NOT NULL,
  `id_fac` int(11) NOT NULL,
  `end_number` int(4) NOT NULL,
  `price` int(20) NOT NULL,
  `date` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `peygiri` int(11) NOT NULL,
  `admin_description` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `enabel_view` int(11) DEFAULT '1',
  `approve` int(11) DEFAULT '0',
  `date_u` varchar(100) COLLATE utf8_persian_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE `tblpost` (
  `id` int(11) NOT NULL,
  `id_group` int(11) DEFAULT NULL,
  `title` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `text_web` text COLLATE utf8_persian_ci,
  `id_img_mob` int(11) DEFAULT NULL,
  `id_img_web` int(11) DEFAULT NULL,
  `id_category_post` int(11) DEFAULT NULL,
  `enable` int(11) NOT NULL,
  `enable_view` int(11) DEFAULT '1',
  `tag` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `keyword` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `link` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `type` int(11) NOT NULL,
  `time` date NOT NULL,
  `time_ir` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_position` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` text COLLATE utf8_persian_ci,
  `status` varchar(300) COLLATE utf8_persian_ci DEFAULT 'publish'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`id`, `id_group`, `title`, `text_web`, `id_img_mob`, `id_img_web`, `id_category_post`, `enable`, `enable_view`, `tag`, `keyword`, `link`, `type`, `time`, `time_ir`, `user_id`, `id_position`, `description`, `status`) VALUES
(1, NULL, 'jhjkhjk', 'jjkhk', NULL, 2, NULL, 1, 1, NULL, 'jgj', 'jhgjh', 1, '2018-03-08', '۹۶/۱۲/۱۷', 375, NULL, 'jkhjk', 'publish'),
(2, NULL, 'درباره ما', 'درباره فروشگاه لوازم خانگی', NULL, NULL, NULL, 1, 1, NULL, 'یشسب', 'یشسب', 1, '2018-03-08', '۹۶/۱۲/۱۷', 375, NULL, 'یبشسیب', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `tblpostproduct`
--

CREATE TABLE `tblpostproduct` (
  `id` int(11) NOT NULL,
  `city` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblpost_page`
--

CREATE TABLE `tblpost_page` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_psge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_type` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `img` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1',
  `time` date NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `time_ir` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `pak` int(11) DEFAULT NULL,
  `tag_meta` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `title_meta` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `text_meta` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `key_meta` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `price` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `exist` int(11) NOT NULL,
  `prposal` int(11) DEFAULT '0',
  `takhfif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `id_category`, `id_type`, `id_brand`, `img`, `description`, `enabel`, `enabel_view`, `time`, `name`, `time_ir`, `pak`, `tag_meta`, `title_meta`, `text_meta`, `key_meta`, `price`, `exist`, `prposal`, `takhfif`) VALUES
(41, 2, 2, 1, '188.jpg', 'fadsfs', 1, 1, '0000-00-00', 'dsafda', '11/11/1396', NULL, 'adsads', 'dasd', 'fasdfasd', 'dadsa', '3342', 0, 0, NULL),
(42, 3, 2, 1, '7.jpg', 'vsdfvds', 1, 1, '2018-02-05', 'ggg', '1396/11/16', NULL, 'sdfsfs', 'efd', 'efwfrefw', 'dsf,dsfds', '222222', 0, 1, 10),
(43, 1, 1, NULL, '16077.png', 'dsdsdsa', 1, 1, '2018-01-31', 'dsfdf', '1396/11/11', NULL, 'jkhjhjhg', 'hjh', 'eerere eww', 'jhhjjh', '22187878', 27, 1, NULL),
(44, 2, 2, 1, '16077.png', 'gf', 1, 1, '0000-00-00', 'hh', '14/12/1396', NULL, 'df', 'fg', 'fg', 'dg', '20000', 209, 1, 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tblprofile`
--

CREATE TABLE `tblprofile` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `lastname` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `tel` int(12) NOT NULL,
  `address` text COLLATE utf8_persian_ci,
  `enable_view` int(11) DEFAULT '1',
  `credit` int(11) DEFAULT NULL,
  `date_credit` date DEFAULT NULL,
  `mande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblprofile`
--

INSERT INTO `tblprofile` (`id`, `name`, `lastname`, `user_id`, `role`, `tel`, `address`, `enable_view`, `credit`, `date_credit`, `mande`) VALUES
(100, 'sdasa', 'ds', 380, 'user', 4324, '24324', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblproposal`
--

CREATE TABLE `tblproposal` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) NOT NULL,
  `color` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `enabel_view` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblproposal`
--

INSERT INTO `tblproposal` (`id`, `id_pro`, `color`, `size`, `enabel_view`) VALUES
(1, 36, 11, 21, 1),
(2, 37, 12, 22, 1),
(3, 38, 14, 24, 1),
(4, 36, 10, 21, 1),
(5, 37, 13, 23, 1),
(6, 37, 12, 22, 1),
(7, 36, 11, 21, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblreplace`
--

CREATE TABLE `tblreplace` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `id_fac` int(11) DEFAULT NULL,
  `text_user` text COLLATE utf8_persian_ci,
  `category` int(11) DEFAULT NULL,
  `confirm` int(11) DEFAULT '0',
  `text_admin` text COLLATE utf8_persian_ci,
  `post_price` int(11) NOT NULL DEFAULT '0',
  `enabel_view` int(11) NOT NULL DEFAULT '1',
  `id_bag` int(11) DEFAULT NULL,
  `new_size` int(11) DEFAULT NULL,
  `new_count` int(11) DEFAULT NULL,
  `price_cr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblsize`
--

CREATE TABLE `tblsize` (
  `id` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `size` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `price` int(11) NOT NULL,
  `price_namayande` int(11) DEFAULT NULL,
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tblsize`
--

INSERT INTO `tblsize` (`id`, `id_pro`, `size`, `price`, `price_namayande`, `enabel`, `enabel_view`) VALUES
(21, 36, 'gh', 54, 45, 1, 1),
(22, 37, 'swq', 32, 322, 1, 1),
(23, 37, 'sad', 3123, 3131, 1, 1),
(24, 38, 'ندارد', 15600, 5646, 1, 1),
(25, 39, 'ندارد', 2424, 42432, 1, 1),
(26, 40, 'sad', 4546, 7678, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbltype_product`
--

CREATE TABLE `tbltype_product` (
  `id` int(11) NOT NULL,
  `type` varchar(300) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci,
  `id_parent` int(11) DEFAULT NULL,
  `enabel` int(11) DEFAULT '1',
  `enabel_view` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbltype_product`
--

INSERT INTO `tbltype_product` (`id`, `type`, `description`, `id_parent`, `enabel`, `enabel_view`) VALUES
(1, 'جنس 1', '', 0, 1, 1),
(2, 'جنس 2', '', 0, 1, 1),
(3, 'جنس 3', '', 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sodor_factor`
--

CREATE TABLE `tbl_sodor_factor` (
  `id` int(11) NOT NULL,
  `id_ref` int(20) DEFAULT NULL,
  `price` int(30) DEFAULT NULL,
  `description` varchar(500) COLLATE utf8_persian_ci DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `data_ir` varchar(300) COLLATE utf8_persian_ci DEFAULT NULL,
  `resive` int(11) DEFAULT '0',
  `visibel` int(11) DEFAULT '0',
  `adress` text COLLATE utf8_persian_ci,
  `print` int(11) DEFAULT '0',
  `code_off` int(11) DEFAULT NULL,
  `date_deliver` date DEFAULT NULL,
  `confirm` int(11) DEFAULT '0',
  `id_type_post` int(11) NOT NULL,
  `user_tel` int(12) NOT NULL,
  `user_name` varchar(300) COLLATE utf8_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `tbl_sodor_factor`
--

INSERT INTO `tbl_sodor_factor` (`id`, `id_ref`, `price`, `description`, `id_user`, `data`, `data_ir`, `resive`, `visibel`, `adress`, `print`, `code_off`, `date_deliver`, `confirm`, `id_type_post`, `user_tel`, `user_name`) VALUES
(12, NULL, 22202878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, 'wfewrew', 0, 0, NULL, 0, 3, 2434, '32'),
(13, NULL, 22202878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, 'gsfdg', 0, 0, NULL, 0, 1, 232321, '234'),
(14, NULL, 22202878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, '432', 0, 0, NULL, 0, 3, 44, '34'),
(15, NULL, 22202878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, '24342', 0, 0, NULL, 0, 1, 424, 'wrw'),
(16, NULL, 22199878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, '345354', 0, 0, NULL, 0, 2, 54, '453'),
(17, NULL, 22202878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, 'vvxcbcv', 0, 0, NULL, 0, 1, 435, 'vbc'),
(18, NULL, 22199878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, '42342', 0, 0, NULL, 0, 2, 24, '4234'),
(19, NULL, 22199878, NULL, 375, '2018-02-17', '۱۳۹۶/۱۱/۲۸', 0, 0, '42342', 0, 0, NULL, 0, 2, 423, '4234'),
(20, NULL, 22212904, NULL, 375, '2018-02-18', '۱۳۹۶/۱۱/۲۹', 0, 0, 'hhjjjkhj', 0, 0, NULL, 0, 3, 665, 'jhj'),
(21, NULL, 44390756, NULL, 375, '2018-02-18', '۱۳۹۶/۱۱/۲۹', 0, 0, 'hhjkkl', 0, 0, NULL, 0, 3, 767, 'jhjh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `status`, `created_at`, `updated_at`) VALUES
(380, 'hale23', 'LTGFlIjqZjtZzJGKRD4uZBiav1P4pbQU', '$2y$13$J8Vh.RM343h4pn1K6IDYj.p0Ytl8MQDPXM6gAG4ytFNRN5CshPq0K', NULL, 10, 1520510670, 1520510670);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `cat_pro`
--
ALTER TABLE `cat_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_off`
--
ALTER TABLE `code_off`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faceexist`
--
ALTER TABLE `faceexist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facesize`
--
ALTER TABLE `facesize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_app`
--
ALTER TABLE `gallery_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_app`
--
ALTER TABLE `main_app`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliderapp`
--
ALTER TABLE `sliderapp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladdres_phon`
--
ALTER TABLE `tbladdres_phon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblallpost`
--
ALTER TABLE `tblallpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbag`
--
ALTER TABLE `tblbag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbag_replace`
--
ALTER TABLE `tblbag_replace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcategory`
--
ALTER TABLE `tblcategory`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tblcategory_product`
--
ALTER TABLE `tblcategory_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcolor`
--
ALTER TABLE `tblcolor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldeliverprice`
--
ALTER TABLE `tbldeliverprice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldiscount`
--
ALTER TABLE `tbldiscount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldis_pro`
--
ALTER TABLE `tbldis_pro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblexist`
--
ALTER TABLE `tblexist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblgallery`
--
ALTER TABLE `tblgallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpardakht`
--
ALTER TABLE `tblpardakht`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpost`
--
ALTER TABLE `tblpost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpostproduct`
--
ALTER TABLE `tblpostproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpost_page`
--
ALTER TABLE `tblpost_page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblprofile`
--
ALTER TABLE `tblprofile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblproposal`
--
ALTER TABLE `tblproposal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblreplace`
--
ALTER TABLE `tblreplace`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsize`
--
ALTER TABLE `tblsize`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbltype_product`
--
ALTER TABLE `tbltype_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sodor_factor`
--
ALTER TABLE `tbl_sodor_factor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cat_pro`
--
ALTER TABLE `cat_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `code_off`
--
ALTER TABLE `code_off`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `faceexist`
--
ALTER TABLE `faceexist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `facesize`
--
ALTER TABLE `facesize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `gallery_app`
--
ALTER TABLE `gallery_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `main_app`
--
ALTER TABLE `main_app`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sliderapp`
--
ALTER TABLE `sliderapp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblallpost`
--
ALTER TABLE `tblallpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblbag`
--
ALTER TABLE `tblbag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tblbag_replace`
--
ALTER TABLE `tblbag_replace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcategory`
--
ALTER TABLE `tblcategory`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcategory_product`
--
ALTER TABLE `tblcategory_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblcolor`
--
ALTER TABLE `tblcolor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbldeliverprice`
--
ALTER TABLE `tbldeliverprice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbldiscount`
--
ALTER TABLE `tbldiscount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbldis_pro`
--
ALTER TABLE `tbldis_pro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblexist`
--
ALTER TABLE `tblexist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblgallery`
--
ALTER TABLE `tblgallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblpardakht`
--
ALTER TABLE `tblpardakht`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpost`
--
ALTER TABLE `tblpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblpostproduct`
--
ALTER TABLE `tblpostproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblpost_page`
--
ALTER TABLE `tblpost_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tblprofile`
--
ALTER TABLE `tblprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tblproposal`
--
ALTER TABLE `tblproposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblreplace`
--
ALTER TABLE `tblreplace`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsize`
--
ALTER TABLE `tblsize`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbltype_product`
--
ALTER TABLE `tbltype_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sodor_factor`
--
ALTER TABLE `tbl_sodor_factor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=381;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
