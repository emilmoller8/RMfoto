-- phpMyAdmin SQL Dump
-- version 5.2.3-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Host: mysql11.wannafind.dk
-- Generation Time: Oct 06, 2026 at 08:24 PM
-- Server version: 8.0.46-37
-- PHP Version: 8.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rmfoto_dk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `billeder`
--

CREATE TABLE `billeder` (
  `id` int NOT NULL,
  `by_id` int NOT NULL,
  `billede_txt` varchar(256) NOT NULL,
  `billede_txt_en` text NOT NULL,
  `billede_txt_de` text NOT NULL,
  `billede_txt_gr` text NOT NULL,
  `billede_sti_l` varchar(256) NOT NULL,
  `billede_sti_m` varchar(256) NOT NULL,
  `billede_sti_s` varchar(256) NOT NULL,
  `keyword` varchar(1024) NOT NULL,
  `synlig` int NOT NULL,
  `pris` decimal(64,0) NOT NULL,
  `oprettede` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billeder`
--

INSERT INTO `billeder` (`id`, `by_id`, `billede_txt`, `billede_txt_en`, `billede_txt_de`, `billede_txt_gr`, `billede_sti_l`, `billede_sti_m`, `billede_sti_s`, `keyword`, `synlig`, `pris`, `oprettede`) VALUES
(52, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726887_Kangerlussuaq_2003.-1.jpg', '', 'billeder/uploadede_billeder/13/1188726887_Kangerlussuaq_2003.-1.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(53, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726961_Kang_11.jpg', '', 'billeder/uploadede_billeder/13/1188726961_Kang_11.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(54, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726984_Kang_12.jpg', '', 'billeder/uploadede_billeder/13/1188726984_Kang_12.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(55, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188727013_Kang_13.jpg', '', 'billeder/uploadede_billeder/13/1188727013_Kang_13.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(56, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188727047_Kang_15.jpg', '', 'billeder/uploadede_billeder/13/1188727047_Kang_15.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(57, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188727082_Kang_17.jpg', '', 'billeder/uploadede_billeder/13/1188727082_Kang_17.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(200, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743790_Aasiaat_15.jpg', '', 'billeder/uploadede_billeder/14/1188743790_Aasiaat_15.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(199, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743761_Aasiaat_16.jpg', '', 'billeder/uploadede_billeder/14/1188743761_Aasiaat_16.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(51, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726851_Kang_01.jpg', '', 'billeder/uploadede_billeder/13/1188726851_Kang_01.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(50, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726812_Kang_03.jpg', '', 'billeder/uploadede_billeder/13/1188726812_Kang_03.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(29, 8, '', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568425_K_42.jpg', '', 'billeder/uploadede_billeder/8/1188568425_K_42.jpg', 'Grønland,Kullorsuaq, by', 0, 0, '2008-08-10 20:39:31'),
(30, 8, 'Sarpik Ittuk', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568456_K_39.jpg', '', 'billeder/uploadede_billeder/8/1188568456_K_39.jpg', 'Grønland,Kullorsuaq, sarpik Ittuk, skib, vand', 0, 0, '2008-08-10 20:39:31'),
(28, 8, '', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568361_K_38.jpg', '', 'billeder/uploadede_billeder/8/1188568361_K_38.jpg', 'Grønland,Kullorsuaq, by', 0, 0, '2008-08-10 20:39:31'),
(27, 8, '', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568337_K_37.jpg', '', 'billeder/uploadede_billeder/8/1188568337_K_37.jpg', 'Grønland,Kullorsuaq,by', 0, 0, '2008-08-10 20:39:31'),
(26, 8, 'Båd', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568281_K_50.jpg', '', 'billeder/uploadede_billeder/8/1188568281_K_50.jpg', 'Grønland,Kullorsuaq, båd, vand', 0, 0, '2008-08-10 20:39:31'),
(24, 8, 'Sarpik Ittuk', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568154_K_12.jpg', '', 'billeder/uploadede_billeder/8/1188568154_K_12.jpg', 'Grønland,Kullorsuaq, vand, Sarpik Ittuk, skib', 0, 0, '2008-08-10 20:39:31'),
(301, 3, '', '', '', '', 'billeder/uploadede_billeder/3/trump_1358273291__T1Q1015a.jpg', 'billeder/uploadede_billeder/3/medium_1358273291__T1Q1015a.jpg', 'billeder/uploadede_billeder/3/1358273291__T1Q1015a.jpg', 'Grønland,', 0, 0, '2013-01-15 18:08:13'),
(198, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743744_Aasiaat_17.jpg', '', 'billeder/uploadede_billeder/14/1188743744_Aasiaat_17.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(197, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743713_Aasiaat_18.jpg', '', 'billeder/uploadede_billeder/14/1188743713_Aasiaat_18.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(196, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743702_Aasiaat_19.jpg', '', 'billeder/uploadede_billeder/14/1188743702_Aasiaat_19.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(195, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743633_Aasiaat_20.jpg', '', 'billeder/uploadede_billeder/14/1188743633_Aasiaat_20.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(194, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743604_Aasiaat_21.jpg', '', 'billeder/uploadede_billeder/14/1188743604_Aasiaat_21.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(193, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743592_Aasiaat_22.jpg', '', 'billeder/uploadede_billeder/14/1188743592_Aasiaat_22.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(47, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726591_Kang_07.jpg', '', 'billeder/uploadede_billeder/13/1188726591_Kang_07.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(48, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726681_Kang_10.jpg', '', 'billeder/uploadede_billeder/13/1188726681_Kang_10.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(49, 13, 'Viking Polaris', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726761_Viking_Polaris.jpg', '', 'billeder/uploadede_billeder/13/1188726761_Viking_Polaris.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(46, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726542_Kang_09.jpg', '', 'billeder/uploadede_billeder/13/1188726542_Kang_09.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(45, 13, 'Kangerlussuaq', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726490_Kang_06.jpg', '', 'billeder/uploadede_billeder/13/1188726490_Kang_06.jpg', 'Grønland,Kangerlussuaq', 0, 0, '2008-08-10 20:39:31'),
(44, 13, 'Lufthavn', '', '', '', 'billeder/uploadede_billeder/13/trump_1188726401_Kang_05.jpg', '', 'billeder/uploadede_billeder/13/1188726401_Kang_05.jpg', 'Grønland,Kangerlussuaq, lufthavn, ', 0, 0, '2008-08-10 20:39:31'),
(43, 12, 'Isbjørn', '', '', '', 'billeder/uploadede_billeder/12/trump_1188633591_Sisimiut_07.jpg', '', 'billeder/uploadede_billeder/12/1188633591_Sisimiut_07.jpg', 'Grønland,Isbjørn, Sisimiut, iskiosk', 0, 0, '2008-08-10 20:39:31'),
(42, 12, 'Kirke', '', '', '', 'billeder/uploadede_billeder/12/trump_1188571582_Sisimiut_21.jpg', '', 'billeder/uploadede_billeder/12/1188571582_Sisimiut_21.jpg', 'Grønland,Sisimiut, kirke', 0, 0, '2008-08-10 20:39:31'),
(25, 8, 'Båd', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568247_K_48.jpg', '', 'billeder/uploadede_billeder/8/1188568247_K_48.jpg', 'Grønland,Kullorsuaq, båd, vand, ', 0, 0, '2008-08-10 20:39:31'),
(20, 3, 'Grønlandsk familie', '', '', '', 'billeder/uploadede_billeder/3/trump_1188567933_Qaanaaq_09.jpg', '', 'billeder/uploadede_billeder/3/1188567933_Qaanaaq_09.jpg', 'Grønland,Rolf Müller,Qaarnaaq, familie', 0, 0, '2008-08-10 20:39:31'),
(19, 3, 'Isbjerg', '', '', '', 'billeder/uploadede_billeder/3/trump_1188567875_Qaanaaq_07.jpg', '', 'billeder/uploadede_billeder/3/1188567875_Qaanaaq_07.jpg', 'Grønland,Rolf Müller,Qaarnaaq,isbjerg,is,vand', 0, 0, '2008-08-10 20:39:31'),
(18, 3, 'Isbjerg', '', '', '', 'billeder/uploadede_billeder/3/trump_1188567834_Qaanaaq_19.jpg', '', 'billeder/uploadede_billeder/3/1188567834_Qaanaaq_19.jpg', 'Grønland,Rolf Müller,Qaarnaaq,isbjerg,is,vand', 0, 0, '2008-08-10 20:39:31'),
(17, 3, 'Qaarnaaq i tåge', '', '', '', 'billeder/uploadede_billeder/3/trump_1188567759_Qaanaaq_05.jpg', '', 'billeder/uploadede_billeder/3/1188567759_Qaanaaq_05.jpg', 'Grønland,Rolf Müller,Qaarnaaq,tåge,vand', 0, 0, '2008-08-10 20:39:31'),
(16, 3, 'Skib i tåge', '', '', '', 'billeder/uploadede_billeder/3/trump_1188567652_Qaanaaq_08.jpg', '', 'billeder/uploadede_billeder/3/1188567652_Qaanaaq_08.jpg', 'Grønland,Rolf Müller,Qaarnaaq, skib, tåge, vand', 0, 0, '2008-08-11 10:37:56'),
(6, 9, 'Upernavik', '', '', '', 'billeder/uploadede_billeder/9/trump_1188566582_Up09.jpg', '', 'billeder/uploadede_billeder/9/1188566582_Up09.jpg', 'Grønland,Upernavik, kirke', 0, 0, '2008-08-10 20:39:31'),
(7, 9, 'Upernavik', '', '', '', 'billeder/uploadede_billeder/9/trump_1188566664_Up_11.jpg', '', 'billeder/uploadede_billeder/9/1188566664_Up_11.jpg', 'Grønland,Upernavik, kirke', 0, 0, '2008-08-10 20:39:31'),
(8, 9, 'Upernavik', '', '', '', 'billeder/uploadede_billeder/9/trump_1188566694_Up_06.jpg', '', 'billeder/uploadede_billeder/9/1188566694_Up_06.jpg', 'Grønland, Upernavik, is', 0, 0, '2008-08-10 20:39:31'),
(9, 9, 'Upernavik', '', '', '', 'billeder/uploadede_billeder/9/trump_1188566823_Up_15.jpg', '', 'billeder/uploadede_billeder/9/1188566823_Up_15.jpg', 'Grønland,Upernavik, museum, kirkegård', 0, 0, '2008-08-10 20:39:31'),
(10, 9, 'Upernavik', '', '', '', 'billeder/uploadede_billeder/9/trump_1188567060_UP_33.jpg', '', 'billeder/uploadede_billeder/9/1188567060_UP_33.jpg', 'Grønland,Upernavik, is', 0, 0, '2008-08-10 20:39:31'),
(11, 9, 'Upernavik', '', '', '', 'billeder/uploadede_billeder/9/trump_1188567086_UP_31.jpg', '', 'billeder/uploadede_billeder/9/1188567086_UP_31.jpg', 'Grønland,Upernavik, is', 0, 0, '2008-08-10 20:39:31'),
(12, 9, 'Upernavik', '', '', '', 'billeder/uploadede_billeder/9/trump_1188567108_UP_32.jpg', '', 'billeder/uploadede_billeder/9/1188567108_UP_32.jpg', 'Grønland,Upernavik, is', 0, 0, '2008-08-10 20:39:31'),
(13, 9, 'Fanger', '', '', '', 'billeder/uploadede_billeder/9/trump_1188567162_Up_19.jpg', '', 'billeder/uploadede_billeder/9/1188567162_Up_19.jpg', 'Grønland,Upernavik, fanger', 0, 0, '2008-08-10 20:39:31'),
(14, 9, 'Fanger ved brættet', '', '', '', 'billeder/uploadede_billeder/9/trump_1188567219_Up_21.jpg', '', 'billeder/uploadede_billeder/9/1188567219_Up_21.jpg', 'Grønland,Upernavik, Fanger, brættet', 0, 0, '2008-08-10 20:39:31'),
(15, 9, 'Hospital', '', '', '', 'billeder/uploadede_billeder/9/trump_1188567264_UP_34.jpg', '', 'billeder/uploadede_billeder/9/1188567264_UP_34.jpg', 'Grønland,Upernavik, Hospital, hus', 0, 0, '2008-08-10 20:39:31'),
(31, 8, 'Grønlandsk hjem', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568536_K16.jpg', '', 'billeder/uploadede_billeder/8/1188568536_K16.jpg', 'Grønland,Kullorsuaq, grønlandsk hjem', 0, 0, '2008-08-10 20:39:31'),
(32, 8, 'Aftensol', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568602_K_19.jpg', '', 'billeder/uploadede_billeder/8/1188568602_K_19.jpg', 'Grønland,Kullorsuaq, is, aftensol, vand', 0, 0, '2008-08-10 20:39:31'),
(33, 8, 'aftensol', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568638_K_20.jpg', '', 'billeder/uploadede_billeder/8/1188568638_K_20.jpg', 'Grønland,Kullorsuaq, is, aftensol, vand', 0, 0, '2008-08-10 20:39:31'),
(34, 8, 'aftensol', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568663_K_23.jpg', '', 'billeder/uploadede_billeder/8/1188568663_K_23.jpg', 'Grønland,Kullorsuaq, is, aftensol, vand', 0, 0, '2008-08-10 20:39:31'),
(35, 8, 'Is', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568707_K_28.jpg', '', 'billeder/uploadede_billeder/8/1188568707_K_28.jpg', 'Grønland,Kullorsuaq, is, vand', 0, 0, '2008-08-10 20:39:31'),
(36, 8, 'Grøndlændervending ', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568897_K_02.jpg', '', 'billeder/uploadede_billeder/8/1188568897_K_02.jpg', 'Grønland,Kullorsuaq, vand, Kajak ', 0, 0, '2008-08-10 20:39:31'),
(37, 8, 'Grøndlændervending ', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568923_K01.jpg', '', 'billeder/uploadede_billeder/8/1188568923_K01.jpg', 'Grønland,Kullorsuaq, vand, Kajak ', 0, 0, '2008-08-10 20:39:31'),
(38, 8, 'Grøndlændervending ', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568939_K_06.jpg', '', 'billeder/uploadede_billeder/8/1188568939_K_06.jpg', 'Grønland,Kullorsuaq, vand, Kajak ', 0, 0, '2008-08-10 20:39:31'),
(39, 8, 'Is', '', '', '', 'billeder/uploadede_billeder/8/trump_1188568966_K_29.jpg', '', 'billeder/uploadede_billeder/8/1188568966_K_29.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:31'),
(41, 8, 'Djævlens tommelfinger', '', '', '', 'billeder/uploadede_billeder/8/trump_1188569074_K_30.jpg', '', 'billeder/uploadede_billeder/8/1188569074_K_30.jpg', 'Grønland,Kullorsuaq,vand,fleld ', 0, 0, '2008-08-10 20:39:31'),
(192, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743567_Aasiaat_23.jpg', '', 'billeder/uploadede_billeder/14/1188743567_Aasiaat_23.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(203, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744175_Aasiaat_12.jpg', '', 'billeder/uploadede_billeder/14/1188744175_Aasiaat_12.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(190, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188742840_Ang.jpg', '', 'billeder/uploadede_billeder/15/1188742840_Ang.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(191, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188742869_GK_juni_2004.jpg', '', 'billeder/uploadede_billeder/15/1188742869_GK_juni_2004.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(189, 7, '', '', '', '', 'billeder/uploadede_billeder/7/trump_1188742746_Kvinde_fra_Tasiusaq.jpg', '', 'billeder/uploadede_billeder/7/1188742746_Kvinde_fra_Tasiusaq.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(188, 7, '', '', '', '', 'billeder/uploadede_billeder/7/trump_1188742734_Mand_fra_Tasiusaq.jpg', '', 'billeder/uploadede_billeder/7/1188742734_Mand_fra_Tasiusaq.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(81, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188737955_Uummannaq_99-2.jpg', '', 'billeder/uploadede_billeder/6/1188737955_Uummannaq_99-2.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(82, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188737980_Uummannaq_05-2.jpg', '', 'billeder/uploadede_billeder/6/1188737980_Uummannaq_05-2.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(83, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188737993_Uummannaq_99-1.jpg', '', 'billeder/uploadede_billeder/6/1188737993_Uummannaq_99-1.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(84, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738023_Uummannaq_32.jpg', '', 'billeder/uploadede_billeder/6/1188738023_Uummannaq_32.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(85, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738041_Uummannaq_31.jpg', '', 'billeder/uploadede_billeder/6/1188738041_Uummannaq_31.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(86, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738061_Uummannaq_31_tif.jpg', '', 'billeder/uploadede_billeder/6/1188738061_Uummannaq_31_tif.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(87, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738081_Uummannaq_27.jpg', '', 'billeder/uploadede_billeder/6/1188738081_Uummannaq_27.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(88, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738124_Uummannaq_26.jpg', '', 'billeder/uploadede_billeder/6/1188738124_Uummannaq_26.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(90, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738221_Uummannaq_22.jpg', '', 'billeder/uploadede_billeder/6/1188738221_Uummannaq_22.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(89, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738189_Uummannaq_23.jpg', '', 'billeder/uploadede_billeder/6/1188738189_Uummannaq_23.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(91, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738239_Uummannaq_21.jpg', '', 'billeder/uploadede_billeder/6/1188738239_Uummannaq_21.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(92, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738257_Uummannaq_20.jpg', '', 'billeder/uploadede_billeder/6/1188738257_Uummannaq_20.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(93, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738295_Uummannaq_19.jpg', '', 'billeder/uploadede_billeder/6/1188738295_Uummannaq_19.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(94, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738332_Uummannaq_16.jpg', '', 'billeder/uploadede_billeder/6/1188738332_Uummannaq_16.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(95, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738349_Uummannaq_15.jpg', '', 'billeder/uploadede_billeder/6/1188738349_Uummannaq_15.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(96, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738424_Uummannaq_14.jpg', '', 'billeder/uploadede_billeder/6/1188738424_Uummannaq_14.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(97, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738455_Uummannaq_13.jpg', '', 'billeder/uploadede_billeder/6/1188738455_Uummannaq_13.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(98, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738476_Uummannaq_12.jpg', '', 'billeder/uploadede_billeder/6/1188738476_Uummannaq_12.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(99, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738580_Uummannaq_11.jpg', '', 'billeder/uploadede_billeder/6/1188738580_Uummannaq_11.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(100, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738596_Uummannaq_09.jpg', '', 'billeder/uploadede_billeder/6/1188738596_Uummannaq_09.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(101, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738675_Uummannaq_07.jpg', '', 'billeder/uploadede_billeder/6/1188738675_Uummannaq_07.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(102, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738694_Uummannaq_06.jpg', '', 'billeder/uploadede_billeder/6/1188738694_Uummannaq_06.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(103, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738738_Uummannaq_03.jpg', '', 'billeder/uploadede_billeder/6/1188738738_Uummannaq_03.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(104, 6, '', '', '', '', 'billeder/uploadede_billeder/6/trump_1188738757_Uummannaq_01.jpg', '', 'billeder/uploadede_billeder/6/1188738757_Uummannaq_01.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(105, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738863_Maage.jpg', '', 'billeder/uploadede_billeder/1/1188738863_Maage.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(106, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738876_Ilulissat_08.jpg', '', 'billeder/uploadede_billeder/1/1188738876_Ilulissat_08.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(107, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738907_Ilu65.jpg', '', 'billeder/uploadede_billeder/1/1188738907_Ilu65.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(108, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738922_Ilu_Hotel_Arctic_49.jpg', '', 'billeder/uploadede_billeder/1/1188738922_Ilu_Hotel_Arctic_49.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(109, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738937_Ilu_66.jpg', '', 'billeder/uploadede_billeder/1/1188738937_Ilu_66.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(110, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738953_Ilu_63.jpg', '', 'billeder/uploadede_billeder/1/1188738953_Ilu_63.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(111, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738968_Ilu_62.jpg', '', 'billeder/uploadede_billeder/1/1188738968_Ilu_62.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(112, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188738994_Ilu_61.jpg', '', 'billeder/uploadede_billeder/1/1188738994_Ilu_61.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(113, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739025_Ilu_59.jpg', '', 'billeder/uploadede_billeder/1/1188739025_Ilu_59.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(114, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739056_Ilu_58.jpg', '', 'billeder/uploadede_billeder/1/1188739056_Ilu_58.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(115, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739080_Ilu_55.jpg', '', 'billeder/uploadede_billeder/1/1188739080_Ilu_55.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(116, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739113_Ilu_54.jpg', '', 'billeder/uploadede_billeder/1/1188739113_Ilu_54.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(117, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739135_Ilu_53.jpg', '', 'billeder/uploadede_billeder/1/1188739135_Ilu_53.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(118, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739153_Ilu_52.jpg', '', 'billeder/uploadede_billeder/1/1188739153_Ilu_52.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(119, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739170_Ilu_51.jpg', '', 'billeder/uploadede_billeder/1/1188739170_Ilu_51.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(120, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739187_Ilu_49.jpg', '', 'billeder/uploadede_billeder/1/1188739187_Ilu_49.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(121, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739226_Ilu_48.jpg', '', 'billeder/uploadede_billeder/1/1188739226_Ilu_48.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(122, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739243_Ilu_46.jpg', '', 'billeder/uploadede_billeder/1/1188739243_Ilu_46.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(123, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739301_Ilu_43.jpg', '', 'billeder/uploadede_billeder/1/1188739301_Ilu_43.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(124, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739324_Ilu_42-.jpg', '', 'billeder/uploadede_billeder/1/1188739324_Ilu_42-.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(125, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739351_Ilu_41.jpg', '', 'billeder/uploadede_billeder/1/1188739351_Ilu_41.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(126, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739383_Ilu_40-.jpg', '', 'billeder/uploadede_billeder/1/1188739383_Ilu_40-.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(127, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739397_Ilu_39.jpg', '', 'billeder/uploadede_billeder/1/1188739397_Ilu_39.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(128, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739409_Ilu_38.jpg', '', 'billeder/uploadede_billeder/1/1188739409_Ilu_38.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(129, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739422_Ilu_37.jpg', '', 'billeder/uploadede_billeder/1/1188739422_Ilu_37.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(130, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739437_Ilu_36.jpg', '', 'billeder/uploadede_billeder/1/1188739437_Ilu_36.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(131, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739479_Ilu_34.jpg', '', 'billeder/uploadede_billeder/1/1188739479_Ilu_34.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(132, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739500_Ilu_35.jpg', '', 'billeder/uploadede_billeder/1/1188739500_Ilu_35.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(133, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739537_Ilu_33.jpg', '', 'billeder/uploadede_billeder/1/1188739537_Ilu_33.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(134, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739556_Ilu_32.jpg', '', 'billeder/uploadede_billeder/1/1188739556_Ilu_32.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(135, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739571_Ilu_31.jpg', '', 'billeder/uploadede_billeder/1/1188739571_Ilu_31.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(136, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739581_Ilu_30.jpg', '', 'billeder/uploadede_billeder/1/1188739581_Ilu_30.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(137, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739592_Ilu_29.jpg', '', 'billeder/uploadede_billeder/1/1188739592_Ilu_29.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(138, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739604_Ilu_28.jpg', '', 'billeder/uploadede_billeder/1/1188739604_Ilu_28.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(144, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739740_Ilu_22.jpg', '', 'billeder/uploadede_billeder/1/1188739740_Ilu_22.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(139, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739625_Ilu_27.jpg', '', 'billeder/uploadede_billeder/1/1188739625_Ilu_27.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(140, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739637_Ilu_26.jpg', '', 'billeder/uploadede_billeder/1/1188739637_Ilu_26.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(141, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739650_Ilu_25.jpg', '', 'billeder/uploadede_billeder/1/1188739650_Ilu_25.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(142, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739661_ilu_24.jpg', '', 'billeder/uploadede_billeder/1/1188739661_ilu_24.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(143, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739670_Ilu_23-.jpg', '', 'billeder/uploadede_billeder/1/1188739670_Ilu_23-.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(145, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739753_Ilu_21.jpg', '', 'billeder/uploadede_billeder/1/1188739753_Ilu_21.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(146, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739766_Ilu_20.jpg', '', 'billeder/uploadede_billeder/1/1188739766_Ilu_20.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(147, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739776_Ilu_19.jpg', '', 'billeder/uploadede_billeder/1/1188739776_Ilu_19.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(148, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739790_Ilu_18.jpg', '', 'billeder/uploadede_billeder/1/1188739790_Ilu_18.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(149, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739811_Ilu_17.jpg', '', 'billeder/uploadede_billeder/1/1188739811_Ilu_17.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(151, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739876_Ilu_15.jpg', '', 'billeder/uploadede_billeder/1/1188739876_Ilu_15.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(150, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739849_Ilu_16.jpg', '', 'billeder/uploadede_billeder/1/1188739849_Ilu_16.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(152, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739892_Ilu_14.jpg', '', 'billeder/uploadede_billeder/1/1188739892_Ilu_14.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(153, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739904_Ilu_13.jpg', '', 'billeder/uploadede_billeder/1/1188739904_Ilu_13.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(154, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739930_Ilu_12.jpg', '', 'billeder/uploadede_billeder/1/1188739930_Ilu_12.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(155, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739966_Ilu_11.jpg', '', 'billeder/uploadede_billeder/1/1188739966_Ilu_11.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(156, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188739985_ilu_10.jpg', '', 'billeder/uploadede_billeder/1/1188739985_ilu_10.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(157, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740017_Ilu_09.jpg', '', 'billeder/uploadede_billeder/1/1188740017_Ilu_09.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(158, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740031_Ilu_08.jpg', '', 'billeder/uploadede_billeder/1/1188740031_Ilu_08.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(159, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740043_Ilu_07.jpg', '', 'billeder/uploadede_billeder/1/1188740043_Ilu_07.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(160, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740055_Ilu_06.jpg', '', 'billeder/uploadede_billeder/1/1188740055_Ilu_06.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(161, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740538_Us7.jpg', '', 'billeder/uploadede_billeder/1/1188740538_Us7.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(162, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740555_Hs9.jpg', '', 'billeder/uploadede_billeder/1/1188740555_Hs9.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(163, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740568_Hs8.jpg', '', 'billeder/uploadede_billeder/1/1188740568_Hs8.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(164, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740587_Hs6.jpg', '', 'billeder/uploadede_billeder/1/1188740587_Hs6.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(165, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740599_Hs5.jpg', '', 'billeder/uploadede_billeder/1/1188740599_Hs5.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(166, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740617_Hs4.jpg', '', 'billeder/uploadede_billeder/1/1188740617_Hs4.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(167, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740641_Hs3.jpg', '', 'billeder/uploadede_billeder/1/1188740641_Hs3.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(168, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740657_Hs2.jpg', '', 'billeder/uploadede_billeder/1/1188740657_Hs2.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(169, 1, '', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740669_Hs12.jpg', '', 'billeder/uploadede_billeder/1/1188740669_Hs12.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(170, 1, 'hund', '', '', '', 'billeder/uploadede_billeder/1/trump_1188740682_Hs10.jpg', '', 'billeder/uploadede_billeder/1/1188740682_Hs10.jpg', 'Grønland,', 0, 0, '2013-01-14 19:08:12'),
(172, 16, '', '', '', '', 'billeder/uploadede_billeder/16/trump_1188741081_Ritenbenk_08.jpg', '', 'billeder/uploadede_billeder/16/1188741081_Ritenbenk_08.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(253, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764038_Sisimiut_03.jpg', '', 'billeder/uploadede_billeder/12/1188764038_Sisimiut_03.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(173, 16, '', '', '', '', 'billeder/uploadede_billeder/16/trump_1188741097_Ritenbenk_06.jpg', '', 'billeder/uploadede_billeder/16/1188741097_Ritenbenk_06.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(174, 16, '', '', '', '', 'billeder/uploadede_billeder/16/trump_1188741107_Ritenbenk_05.jpg', '', 'billeder/uploadede_billeder/16/1188741107_Ritenbenk_05.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(175, 16, '', '', '', '', 'billeder/uploadede_billeder/16/trump_1188741116_Ritenbenk_04.jpg', '', 'billeder/uploadede_billeder/16/1188741116_Ritenbenk_04.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(176, 16, '', '', '', '', 'billeder/uploadede_billeder/16/trump_1188741128_Ritenbenk_03.jpg', '', 'billeder/uploadede_billeder/16/1188741128_Ritenbenk_03.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(177, 16, '', '', '', '', 'billeder/uploadede_billeder/16/trump_1188741140_Ritenbenk_02.jpg', '', 'billeder/uploadede_billeder/16/1188741140_Ritenbenk_02.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(178, 16, '', '', '', '', 'billeder/uploadede_billeder/16/trump_1188741157_Ritenbenk_01.jpg', '', 'billeder/uploadede_billeder/16/1188741157_Ritenbenk_01.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(201, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743805_Aasiaat_14.jpg', '', 'billeder/uploadede_billeder/14/1188743805_Aasiaat_14.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(202, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188743820_Aasiaat_13.jpg', '', 'billeder/uploadede_billeder/14/1188743820_Aasiaat_13.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(204, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744205_Aasiaat_11.jpg', '', 'billeder/uploadede_billeder/14/1188744205_Aasiaat_11.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(205, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744221_Aasiaat_10.jpg', '', 'billeder/uploadede_billeder/14/1188744221_Aasiaat_10.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(206, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744238_Aasiaat_9.jpg', '', 'billeder/uploadede_billeder/14/1188744238_Aasiaat_9.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(207, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744261_Aasiaat_8.jpg', '', 'billeder/uploadede_billeder/14/1188744261_Aasiaat_8.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(208, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744282_Aasiaat_7.jpg', '', 'billeder/uploadede_billeder/14/1188744282_Aasiaat_7.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(209, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744295_Aasiaat_6.jpg', '', 'billeder/uploadede_billeder/14/1188744295_Aasiaat_6.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(210, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744312_Aasiaat_3.jpg', '', 'billeder/uploadede_billeder/14/1188744312_Aasiaat_3.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(211, 14, '', '', '', '', 'billeder/uploadede_billeder/14/trump_1188744348_Aasiaat_2.jpg', '', 'billeder/uploadede_billeder/14/1188744348_Aasiaat_2.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(227, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746617_0001.jpg', '', 'billeder/uploadede_billeder/15/1188746617_0001.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(226, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188746493_Qasi.07.jpg', '', 'billeder/uploadede_billeder/10/1188746493_Qasi.07.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(225, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188746465_Qasi.09.jpg', '', 'billeder/uploadede_billeder/10/1188746465_Qasi.09.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(224, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188746419_Qasi.05.jpg', '', 'billeder/uploadede_billeder/10/1188746419_Qasi.05.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(223, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188746254_Qasi.03.jpg', '', 'billeder/uploadede_billeder/10/1188746254_Qasi.03.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(212, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188744905_Qasi.61.jpg', '', 'billeder/uploadede_billeder/10/1188744905_Qasi.61.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(213, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745055_Qasi.60.jpg', '', 'billeder/uploadede_billeder/10/1188745055_Qasi.60.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(214, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745075_Qasi.59.jpg', '', 'billeder/uploadede_billeder/10/1188745075_Qasi.59.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(215, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745101_Qasi.58.jpg', '', 'billeder/uploadede_billeder/10/1188745101_Qasi.58.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(216, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745296_Qasi.57.jpg', '', 'billeder/uploadede_billeder/10/1188745296_Qasi.57.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(217, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745328_Qasi.56.jpg', '', 'billeder/uploadede_billeder/10/1188745328_Qasi.56.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(218, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745422_Qasi.55.jpg', '', 'billeder/uploadede_billeder/10/1188745422_Qasi.55.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(219, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745453_Qasi.54.jpg', '', 'billeder/uploadede_billeder/10/1188745453_Qasi.54.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(220, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745488_Qasi.53.jpg', '', 'billeder/uploadede_billeder/10/1188745488_Qasi.53.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(221, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745514_Qasi.00.jpg', '', 'billeder/uploadede_billeder/10/1188745514_Qasi.00.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(222, 10, '', '', '', '', 'billeder/uploadede_billeder/10/trump_1188745737_Qasi.1.jpg', '', 'billeder/uploadede_billeder/10/1188745737_Qasi.1.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(228, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746642_0002.jpg', '', 'billeder/uploadede_billeder/15/1188746642_0002.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(229, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746652_0005.jpg', '', 'billeder/uploadede_billeder/15/1188746652_0005.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(230, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746661_0006.jpg', '', 'billeder/uploadede_billeder/15/1188746661_0006.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(231, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746669_0007.jpg', '', 'billeder/uploadede_billeder/15/1188746669_0007.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(232, 15, 'Slædehunde', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746685_0008.jpg', '', 'billeder/uploadede_billeder/15/1188746685_0008.jpg', 'Grønland,Rolf Müller, Slædehunde, Tasiilaq', 0, 0, '2008-08-10 20:39:32'),
(233, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746694_0009.jpg', '', 'billeder/uploadede_billeder/15/1188746694_0009.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(234, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746706_0010.jpg', '', 'billeder/uploadede_billeder/15/1188746706_0010.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(235, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746715_0011.jpg', '', 'billeder/uploadede_billeder/15/1188746715_0011.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(236, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746739_0012.jpg', '', 'billeder/uploadede_billeder/15/1188746739_0012.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(237, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746752_0013.jpg', '', 'billeder/uploadede_billeder/15/1188746752_0013.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(242, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746828_0020.jpg', '', 'billeder/uploadede_billeder/15/1188746828_0020.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(238, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746778_0015.jpg', '', 'billeder/uploadede_billeder/15/1188746778_0015.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(239, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746786_0016.jpg', '', 'billeder/uploadede_billeder/15/1188746786_0016.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(240, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746794_0017.jpg', '', 'billeder/uploadede_billeder/15/1188746794_0017.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(241, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746803_0018.jpg', '', 'billeder/uploadede_billeder/15/1188746803_0018.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(243, 15, 'Isbjerg', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746837_0019.jpg', '', 'billeder/uploadede_billeder/15/1188746837_0019.jpg', 'Grønland,Rolf Müller,Tasiilaq,Isbjeg, ', 0, 0, '2008-08-10 20:39:32'),
(244, 15, 'Slædehunde i høj sne', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746897_0003.jpg', '', 'billeder/uploadede_billeder/15/1188746897_0003.jpg', 'Grønland,Tasiilaq,hunde,sne, ', 0, 0, '2008-08-10 20:39:32'),
(245, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1188746906_0004.jpg', '', 'billeder/uploadede_billeder/15/1188746906_0004.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(246, 7, '', '', '', '', 'billeder/uploadede_billeder/7/trump_1188763366_Forside_Nan.2.jpg', '', 'billeder/uploadede_billeder/7/1188763366_Forside_Nan.2.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(247, 7, 'Aviaaja i festdragt', '', '', '', 'billeder/uploadede_billeder/7/trump_1188763405_Nanortalik_1.jpg', '', 'billeder/uploadede_billeder/7/1188763405_Nanortalik_1.jpg', 'Grønland,Nanortalik,festdragt,pige', 0, 0, '2008-08-10 20:39:32'),
(248, 7, '', '', '', '', 'billeder/uploadede_billeder/7/trump_1188763431_Nanortalik_set_fra_nord.jpg', '', 'billeder/uploadede_billeder/7/1188763431_Nanortalik_set_fra_nord.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(249, 7, '', '', '', '', 'billeder/uploadede_billeder/7/trump_1188763456_Nanortalik_kolonihavn_a.jpg', '', 'billeder/uploadede_billeder/7/1188763456_Nanortalik_kolonihavn_a.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(250, 7, 'Nanortalik i sne', '', '', '', 'billeder/uploadede_billeder/7/trump_1188763485_Nan.jpg', '', 'billeder/uploadede_billeder/7/1188763485_Nan.jpg', 'Grønland,Nanortalik, by, sne', 0, 0, '2008-08-10 20:39:32'),
(251, 7, 'Fanger i kajak', '', '', '', 'billeder/uploadede_billeder/7/trump_1188763523_Kajak_nanortalik.jpg', '', 'billeder/uploadede_billeder/7/1188763523_Kajak_nanortalik.jpg', 'Grønland,Nanortalik,fanger,kajak,isbjerg', 0, 0, '2008-08-10 20:39:32'),
(252, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188763961_Sisimiut_02.jpg', '', 'billeder/uploadede_billeder/12/1188763961_Sisimiut_02.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(254, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764066_Sisimiut_06.jpg', '', 'billeder/uploadede_billeder/12/1188764066_Sisimiut_06.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(255, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764094_Sisimiut_09.jpg', '', 'billeder/uploadede_billeder/12/1188764094_Sisimiut_09.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(256, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764158_Sisimiut_10.jpg', '', 'billeder/uploadede_billeder/12/1188764158_Sisimiut_10.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(257, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764187_Sisimiut_11.jpg', '', 'billeder/uploadede_billeder/12/1188764187_Sisimiut_11.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(258, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764209_Sisimiut_15.jpg', '', 'billeder/uploadede_billeder/12/1188764209_Sisimiut_15.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(259, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764232_Sisimiut_12.jpg', '', 'billeder/uploadede_billeder/12/1188764232_Sisimiut_12.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(260, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764258_Sisimiut_18.jpg', '', 'billeder/uploadede_billeder/12/1188764258_Sisimiut_18.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(261, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764285_Sisimiut_20.jpg', '', 'billeder/uploadede_billeder/12/1188764285_Sisimiut_20.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(262, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764364_Sisimiut_22.jpg', '', 'billeder/uploadede_billeder/12/1188764364_Sisimiut_22.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(263, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764391_Sisimiut_23.jpg', '', 'billeder/uploadede_billeder/12/1188764391_Sisimiut_23.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(264, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764412_Sisimiut_28.jpg', '', 'billeder/uploadede_billeder/12/1188764412_Sisimiut_28.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(265, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764434_Sisimiut_29.jpg', '', 'billeder/uploadede_billeder/12/1188764434_Sisimiut_29.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(266, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764460_Sisimiut_30.jpg', '', 'billeder/uploadede_billeder/12/1188764460_Sisimiut_30.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(267, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764479_Sisimiut_31.jpg', '', 'billeder/uploadede_billeder/12/1188764479_Sisimiut_31.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(268, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764504_Sisimiut_33.jpg', '', 'billeder/uploadede_billeder/12/1188764504_Sisimiut_33.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(269, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764526_Sisimiut_34.jpg', '', 'billeder/uploadede_billeder/12/1188764526_Sisimiut_34.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(270, 12, '', '', '', '', 'billeder/uploadede_billeder/12/trump_1188764550_Sisimiut_35.jpg', '', 'billeder/uploadede_billeder/12/1188764550_Sisimiut_35.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(271, 13, '', '', '', '', 'billeder/uploadede_billeder/13/trump_1188764694_Ishotel_Kang..jpg', '', 'billeder/uploadede_billeder/13/1188764694_Ishotel_Kang..jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(272, 13, '', '', '', '', 'billeder/uploadede_billeder/13/trump_1188764750_Itilleq_syd_Kang__06.jpg', '', 'billeder/uploadede_billeder/13/1188764750_Itilleq_syd_Kang__06.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(273, 13, '', '', '', '', 'billeder/uploadede_billeder/13/trump_1188764813_Itilleq_syd_Kang_01.jpg', '', 'billeder/uploadede_billeder/13/1188764813_Itilleq_syd_Kang_01.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(274, 13, '', '', '', '', 'billeder/uploadede_billeder/13/trump_1188764857_Itilleq_syd_Kang_08.jpg', '', 'billeder/uploadede_billeder/13/1188764857_Itilleq_syd_Kang_08.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(275, 13, '', '', '', '', 'billeder/uploadede_billeder/13/trump_1188764883_Kang_02.jpg', '', 'billeder/uploadede_billeder/13/1188764883_Kang_02.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(276, 13, '', '', '', '', 'billeder/uploadede_billeder/13/trump_1188764971_Kang_09.jpg', '', 'billeder/uploadede_billeder/13/1188764971_Kang_09.jpg', 'Grønland,', 0, 0, '2008-08-10 20:39:32'),
(278, 20, 'Hans Egedes hus', '', '', '', 'billeder/uploadede_billeder/20/trump_1190445932_Hans_Egedes_hus.jpg', '', 'billeder/uploadede_billeder/20/1190445932_Hans_Egedes_hus.jpg', 'Grønland,Nuuk, Hans Egedes hus', 0, 0, '2008-08-10 20:39:32'),
(277, 20, 'Hjortetakken', '', '', '', 'billeder/uploadede_billeder/20/trump_1190445861_Hjortetakken.jpg', '', 'billeder/uploadede_billeder/20/1190445861_Hjortetakken.jpg', 'Grønland,Nuuk,Hjortetakken, ', 0, 0, '2008-08-10 20:39:32'),
(279, 20, 'Præstefjorden', '', '', '', 'billeder/uploadede_billeder/20/trump_1190458338_Praestefjorden.jpg', '', 'billeder/uploadede_billeder/20/1190458338_Praestefjorden.jpg', 'Grønland, Nuuk, Præstefjorden', 0, 0, '2008-08-10 20:39:32'),
(280, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271280_ZQ2S0081.jpg', 'billeder/uploadede_billeder/15/medium_1358271280_ZQ2S0081.jpg', 'billeder/uploadede_billeder/15/1358271280_ZQ2S0081.jpg', 'Grønland,', 0, 0, '2013-01-15 17:34:41'),
(281, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271512_ZQ2S0076.jpg', 'billeder/uploadede_billeder/15/medium_1358271512_ZQ2S0076.jpg', 'billeder/uploadede_billeder/15/1358271512_ZQ2S0076.jpg', 'Grønland,', 0, 0, '2013-01-15 17:38:33'),
(282, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271545_ZQ2S0072.jpg', 'billeder/uploadede_billeder/15/medium_1358271545_ZQ2S0072.jpg', 'billeder/uploadede_billeder/15/1358271545_ZQ2S0072.jpg', 'Grønland,', 0, 0, '2013-01-15 17:39:06'),
(283, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271568_ZQ2S0069.jpg', 'billeder/uploadede_billeder/15/medium_1358271568_ZQ2S0069.jpg', 'billeder/uploadede_billeder/15/1358271568_ZQ2S0069.jpg', 'Grønland,', 0, 0, '2013-01-15 17:39:30'),
(284, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271603_ZQ2S0068.jpg', 'billeder/uploadede_billeder/15/medium_1358271603_ZQ2S0068.jpg', 'billeder/uploadede_billeder/15/1358271603_ZQ2S0068.jpg', 'Grønland,', 0, 0, '2013-01-15 17:40:05'),
(285, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271651_ZQ2S0070.jpg', 'billeder/uploadede_billeder/15/medium_1358271651_ZQ2S0070.jpg', 'billeder/uploadede_billeder/15/1358271651_ZQ2S0070.jpg', 'Grønland,', 0, 0, '2013-01-15 17:40:52'),
(286, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271741_ZQ2S0012a.jpg', 'billeder/uploadede_billeder/15/medium_1358271741_ZQ2S0012a.jpg', 'billeder/uploadede_billeder/15/1358271741_ZQ2S0012a.jpg', 'Grønland,', 0, 0, '2013-01-15 17:42:22'),
(287, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271765_ZQ2S0078.jpg', 'billeder/uploadede_billeder/15/medium_1358271765_ZQ2S0078.jpg', 'billeder/uploadede_billeder/15/1358271765_ZQ2S0078.jpg', 'Grønland,', 0, 0, '2013-01-15 17:42:46'),
(288, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271804_ZQ2S0079.jpg', 'billeder/uploadede_billeder/15/medium_1358271804_ZQ2S0079.jpg', 'billeder/uploadede_billeder/15/1358271804_ZQ2S0079.jpg', 'Grønland,', 0, 0, '2013-01-15 17:43:25');
INSERT INTO `billeder` (`id`, `by_id`, `billede_txt`, `billede_txt_en`, `billede_txt_de`, `billede_txt_gr`, `billede_sti_l`, `billede_sti_m`, `billede_sti_s`, `keyword`, `synlig`, `pris`, `oprettede`) VALUES
(289, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271837_ZQ2S0063.jpg', 'billeder/uploadede_billeder/15/medium_1358271837_ZQ2S0063.jpg', 'billeder/uploadede_billeder/15/1358271837_ZQ2S0063.jpg', 'Grønland,', 0, 0, '2013-01-15 17:43:59'),
(290, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271881_ZQ2S0058.jpg', 'billeder/uploadede_billeder/15/medium_1358271881_ZQ2S0058.jpg', 'billeder/uploadede_billeder/15/1358271881_ZQ2S0058.jpg', 'Grønland,', 0, 0, '2013-01-15 17:44:42'),
(291, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271904_ZQ2S0056.jpg', 'billeder/uploadede_billeder/15/medium_1358271904_ZQ2S0056.jpg', 'billeder/uploadede_billeder/15/1358271904_ZQ2S0056.jpg', 'Grønland,', 0, 0, '2013-01-15 17:45:05'),
(292, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271930_ZQ2S0041.jpg', 'billeder/uploadede_billeder/15/medium_1358271930_ZQ2S0041.jpg', 'billeder/uploadede_billeder/15/1358271930_ZQ2S0041.jpg', 'Grønland,', 0, 0, '2013-01-15 17:45:31'),
(293, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271948_ZQ2S0040.jpg', 'billeder/uploadede_billeder/15/medium_1358271948_ZQ2S0040.jpg', 'billeder/uploadede_billeder/15/1358271948_ZQ2S0040.jpg', 'Grønland,', 0, 0, '2013-01-15 17:45:50'),
(294, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271973_ZQ2S0038.jpg', 'billeder/uploadede_billeder/15/medium_1358271973_ZQ2S0038.jpg', 'billeder/uploadede_billeder/15/1358271973_ZQ2S0038.jpg', 'Grønland,', 0, 0, '2013-01-15 17:46:14'),
(295, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358271994_ZQ2S0033.jpg', 'billeder/uploadede_billeder/15/medium_1358271994_ZQ2S0033.jpg', 'billeder/uploadede_billeder/15/1358271994_ZQ2S0033.jpg', 'Grønland,', 0, 0, '2013-01-15 17:46:36'),
(296, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358272013_ZQ2S0031.jpg', 'billeder/uploadede_billeder/15/medium_1358272013_ZQ2S0031.jpg', 'billeder/uploadede_billeder/15/1358272013_ZQ2S0031.jpg', 'Grønland,', 0, 0, '2013-01-15 17:46:55'),
(297, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358272037_ZQ2S0046.jpg', 'billeder/uploadede_billeder/15/medium_1358272037_ZQ2S0046.jpg', 'billeder/uploadede_billeder/15/1358272037_ZQ2S0046.jpg', 'Grønland,', 0, 0, '2013-01-15 17:47:19'),
(298, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358272058_ZQ2S0060.jpg', 'billeder/uploadede_billeder/15/medium_1358272058_ZQ2S0060.jpg', 'billeder/uploadede_billeder/15/1358272058_ZQ2S0060.jpg', 'Grønland,', 0, 0, '2013-01-15 17:47:39'),
(299, 15, '', '', '', '', 'billeder/uploadede_billeder/15/trump_1358272081_ZQ2S0054.jpg', 'billeder/uploadede_billeder/15/medium_1358272081_ZQ2S0054.jpg', 'billeder/uploadede_billeder/15/1358272081_ZQ2S0054.jpg', 'Grønland,', 0, 0, '2013-01-15 17:48:03'),
(300, 3, '', '', '', '', 'billeder/uploadede_billeder/3/trump_1358273249__T1Q1011a.jpg', 'billeder/uploadede_billeder/3/medium_1358273249__T1Q1011a.jpg', 'billeder/uploadede_billeder/3/1358273249__T1Q1011a.jpg', 'Grønland,', 0, 0, '2013-01-15 18:07:30'),
(302, 3, '', '', '', '', 'billeder/uploadede_billeder/3/trump_1358273434__T1Q1021a.jpg', 'billeder/uploadede_billeder/3/medium_1358273434__T1Q1021a.jpg', 'billeder/uploadede_billeder/3/1358273434__T1Q1021a.jpg', 'Grønland,', 0, 0, '2013-01-15 18:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `byer`
--

CREATE TABLE `byer` (
  `by_id` int NOT NULL,
  `by_navn` text NOT NULL,
  `x_pos` int NOT NULL,
  `y_pos` int NOT NULL,
  `hv` varchar(8) NOT NULL,
  `key` varchar(256) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `byer`
--

INSERT INTO `byer` (`by_id`, `by_navn`, `x_pos`, `y_pos`, `hv`, `key`) VALUES
(6, 'Uummannaq', 128, 269, 'h', ''),
(1, 'Ilulissat', 131, 291, 'h', ''),
(10, 'Qasigiannguit', 127, 303, 'h', ''),
(3, 'Qaanaaq', 91, 116, 'h', ''),
(9, 'Upernavik', 119, 234, 'h', ''),
(8, 'Kullorsuaq', 121, 199, 'h', ''),
(7, 'Nanortalik', 156, 481, 'v', ''),
(12, 'Sisimiut', 105, 331, 'v', ''),
(13, 'Kangerlussuaq', 121, 326, 'h', ''),
(14, 'Aasiaat', 111, 310, 'v', ''),
(15, 'Tasiilaq', 224, 379, 'h', ''),
(16, 'Ritenbenk', 123, 281, 'v', ''),
(20, 'Nuuk', 109, 386, 'h', '');

-- --------------------------------------------------------

--
-- Table structure for table `opsatning`
--

CREATE TABLE `opsatning` (
  `navn` varchar(64) NOT NULL,
  `variabel` varchar(999) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `opsatning`
--

INSERT INTO `opsatning` (`navn`, `variabel`) VALUES
('skift', '5');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
