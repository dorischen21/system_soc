-- phpMyAdmin SQL Dump
-- version 4.0.10.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 06, 2015 at 05:26 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `soc`
--
CREATE DATABASE IF NOT EXISTS `soc` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `soc`;

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `d_id` int(11) NOT NULL,
  `path` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`d_id`,`path`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` text COLLATE utf8_unicode_ci NOT NULL,
  `tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `code` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT 'G=政府, E=企業',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `mail`, `tw`, `code`) VALUES
(1, '', '漢昕科技', 'E'),
(2, 'ericyan@bccs.com.tw', '臺中市政府地方稅務局', 'G'),
(3, 'ericyan@bccs.com.tw', '內政部國土測繪中心', 'G');

-- --------------------------------------------------------

--
-- Table structure for table `company_type`
--

DROP TABLE IF EXISTS `company_type`;
CREATE TABLE IF NOT EXISTS `company_type` (
  `company_id` tinyint(4) NOT NULL,
  `type_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`company_id`,`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_type`
--

INSERT INTO `company_type` (`company_id`, `type_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 7),
(3, 9),
(3, 10),
(3, 11);

-- --------------------------------------------------------

--
-- Table structure for table `d`
--

DROP TABLE IF EXISTS `d`;
CREATE TABLE IF NOT EXISTS `d` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` tinyint(4) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `modify_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type_id` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `d_detail`
--

DROP TABLE IF EXISTS `d_detail`;
CREATE TABLE IF NOT EXISTS `d_detail` (
  `d_id` int(11) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `mail`) VALUES
(1, '');

-- --------------------------------------------------------

--
-- Table structure for table `m_service`
--

DROP TABLE IF EXISTS `m_service`;
CREATE TABLE IF NOT EXISTS `m_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `m_service`
--

INSERT INTO `m_service` (`id`, `name`, `email`) VALUES
(4, '漢朝', 'hanchiao@bccs.com.tw');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
CREATE TABLE IF NOT EXISTS `notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` tinyint(4) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `src_ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `src_port` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dst_ip` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `dst_port` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `count` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `advise` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `note` text COLLATE utf8_unicode_ci NOT NULL,
  `m_service_id` smallint(6) NOT NULL,
  `number` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `projectname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `bccs` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `src_ip2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `company_id`, `type`, `name`, `create_date`, `src_ip`, `src_port`, `dst_ip`, `dst_port`, `level`, `count`, `description`, `advise`, `note`, `m_service_id`, `number`, `email`, `projectname`, `end_date`, `bccs`, `customer_id`, `subject`, `src_ip2`) VALUES
(1, 2, '預警通知', '主機惡意連線行為', '2015-01-29 00:20:01', '192.168.71.57, 192.168.71.136', '-', '80', '80', 1, '24', '現象描述:防火牆log設備查得，來\n                源 IP[192.168.71.57]等六台主機 \n                連往46.51.219.184等23台主機。\n分析結果:主機疑似感染木馬病毒。\n可能影響:駭客可透過木馬軟體與中毒主機進行\n                連線，連線後可以進一步蒐集內網情\n                資以及竊取主機內的資料。\n', '1. 請立即隔離此主機，以免駭客透過以主機為\n    跳板，攻擊該區網內的其他主機。\n2. 請備份該主機中重要資料後，將系統重新安裝\n    或將防毒軟體更新後，進行全機完整掃描。\n3. 若您有任何疑問，歡迎您隨時與 漢昕SOCK\n    監控中心 聯絡，或是來信詢問，謝謝您。', '', 1, 'DS-G02-WA-151006001', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-01-29 00:50:24', '1', '387260000D', '主機惡意連線行為', ''),
(2, 2, '預警通知', '主機惡意連線行為', '2015-02-02 00:00:00', '192.168.4.34 , 192.168.5.6 ', '-', '80', '80', 1, '1389', '現象描述:防火牆log設備查得，來源 \n                IP [192.168.4.34]等150台主機 \n                連往46.51.219.184等23台主機。\n分析結果:主機疑似感染木馬病毒。\n可能影響:駭客可透過木馬軟體與中毒主機進行\n               連線，連線後可以進一步蒐集內網情\n               資以及竊取主機內的資料。\n', '1. 請立即隔離此主機，以免駭客透過以主機為\n    跳板，攻擊該區網內的其他主機。\n2. 請備份該主機中重要資料後，將系統重新安\n    裝或將防毒軟體更新後，進行全機完整掃描。\n3. 若您有任何疑問，歡迎您隨時與 漢昕SOCK\n    監控中心 聯絡，或是來信詢問，謝謝您。', '', 1, 'DS-G02-WA-151006002', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-02-02 00:30:33', '1', '387260000D', '主機惡意連線行為', ''),
(3, 2, '預警通知', '疑似主機內廣告軟體對外發出HTTP封包請求行為', '2015-03-25 08:50:00', '192.168.22.182, 192.168.24.90', '-', '80', '80', 3, '22', '現象描述:防火牆log設備查得，來源 \n                IP [192.168.22.182]等七台主機連\n                往106.186.17.79, 174.36.215.20等\n                兩台主機。\n分析結果:主機疑似安裝廣告軟體。\n可能影響:廣告軟體會向網際網路發出HTTP請求\n                封包，若數量一多，容易造成網路塞。\n', '1. 請檢查來源主機是否有安裝不明軟體，如發現\n    不明軟體，或瀏覽器上含有不明的外掛軟體，\n    請盡快移除。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOCK\n    監控中心 聯絡，或是來信詢問，謝謝您', '', 1, 'DS-G02-WA-151006003', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-03-25 09:20:30', '1', '387260000D', '疑似主機內廣告軟體對外發出HTTP封包請求行為', ''),
(4, 3, '預警通知', 'Web攻擊', '2015-10-02 03:02:51', '61.219.126.42', '-', '80', '80', 4, '23', '現象描述:防火牆log設備查得，\n               來源IP[61.219.126.421]   \n               持續往本地主機192.168.10.10之\n               80 Port 傳送惡意的Http 封包。\n分析結果:主機疑似Web攻擊。\n', '1. 請在防火牆政策內封鎖此IP，\n    避免相關事件發生。\n2. 若您有任何疑問，歡迎您隨時與漢昕\n     SOC監控中心聯絡\n    ，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151013001', 'tedwing@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-10-02 03:30:37', '1', '301000100G', 'Web攻擊', ''),
(6, 2, '預警通知', '公開性的DNS伺服器已被植入惡意程式，貴單位流量中，有與該伺服器進行DNS查詢的軌跡', '2015-10-14 08:33:40', '172.21.1.5', '-', '53', '53', 4, '1', '現象描述	防火牆log設備查得，來源 \n                IP[172.21.1.5] 連往目標主\n                機128.8.10.90。\n                (註:經VIRUSTOTAL查詢此IP\n                為可疑的惡意IP)\n分析結果	公開性的DNS伺服器已被植入\n                惡意程式。\n', '1. 請在防火牆政策內封鎖此IP，避免相關事件\n    發生。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOC\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G02-WA-151029002', '', '104年機房中央監控系統之監控作業', '2015-10-14 09:00:54', '1', '387260000D', '公開性的DNS伺服器已被植入惡意程式，貴單位流量中，有與該伺服器進行DNS查詢的軌跡', '-'),
(7, 3, '預警通知', '疑似主機內廣告軟體對外發出HTTP封包請求行為', '2015-04-07 00:21:45', '192.168.0.26, 192.168.0.23', '-', '192.168.30.1,192.168.56.1,27.118.171.202', '139, 445,137', 3, '約320萬', '現象描述	防火牆log設備查得，來源\n                IP [192.168.22.182]等七台主機 \n                連往106.186.17.79, 174.36.215.20\n                等兩台主機。\n分析結果	主機疑似安裝廣告軟體。\n可能影響	廣告軟體會向網際網路發出\n                 HTTP請求封包，若數量一多，\n                容易造成網路擁塞。\n', '1. 請檢查來源主機是否有安裝不明軟體，如發現\n    不明軟體，或瀏覽器上含有不明的外掛軟體，\n    請盡快移除。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOCK\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151029001', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-04-07 00:50:53', '1', '301000100G', '疑似主機內廣告軟體對外發出HTTP封包請求行為', '-'),
(8, 3, '預警通知', 'C and C 連線通知', '2015-06-22 05:50:15', '192.168.170.34', '59212', '184.105.178.85', '80', 1, '3次', '現象描述	防火牆log設備查得，來源\n                IP [192.168.170.34] 連往\n                遠端主機184.105.178.85。\n                (註:經VIRUSTOTAL查詢此IP\n                為可疑的惡意IP)\n分析結果	主機疑似開啟C&C網站。\n', '1. 請在防火牆政策內封鎖此IP，避免相關事件\n    發生。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOCK\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151029002', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-06-22 06:10:39', '1', '301000100G', 'C and C 連線通知', '-'),
(9, 3, '預警通知', 'C and C 連線通知', '2015-07-15 07:00:10', '46.151.52.61', '-', '-', '-', 4, '1次', '現象描述	防火牆log設備查得，來源 \n                IP [46.151.52.61] 連往本地\n                主機192.168.10.9。\n                (註:經VIRUSTOTAL查詢此\n                IP為可疑的惡意IP)\n分析結果	主機疑似開啟C&C網站。\n', '1. 請在防火牆政策內封鎖此IP，避免相關事件\n    發生。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOCK\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151029003', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-07-15 07:30:14', '1', '301000100G', 'C and C 連線通知', '-'),
(10, 3, '預警通知', 'Web攻擊', '2015-10-02 09:01:35', '61.219.126.42', '-', '192.168.10.10', '80', 4, '23', '現象描述	防火牆log設備查得，來源 \n                IP [61.219.126.421]持續往\n                本地主機192.168.10.10之\n                80 Port 傳送惡意的Http 封包。\n分析結果	主機疑似Web攻擊。\n', '1. 請在防火牆政策內封鎖此IP，避免相關事件\n    發生。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOC\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151029004', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-10-02 09:30:44', '1', '301000100G', 'Web攻擊', '-'),
(11, 3, '預警通知', '公開性的DNS伺服器已被植入惡意程式，貴單位流量中，有與該伺服器進行DNS查詢的軌跡', '2015-10-14 05:04:50', '192.168.0.23、192.168.0.26', '-', '128.8.10.90', '53', 4, '1次', '現象描述	防火牆log設備查得，來源 \n                IP [192.168.0.23、192.168.0.26] \n                連往目標主機128.8.10.90。\n                (註:經VIRUSTOTAL查詢此IP為\n                可疑的惡意IP)\n分析結果	公開性的DNS伺服器已被植入惡意\n                程式。\n', '1. 請在防火牆政策內封鎖此IP，避免相關事件\n    發生。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOC\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151029005', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-10-14 05:30:02', '1', '301000100G', '公開性的DNS伺服器已被植入惡意程式，貴單位流量中，有與該伺服器進行DNS查詢的軌跡', '-'),
(13, 3, '預警通知', '公開性的DNS伺服器已被植入惡意程式，貴單位流量中，有與該伺服器進行DNS查詢的軌跡', '2015-10-14 08:19:09', '192.168.0.23、192.168.0.26', '-', ' 208.84.2.53', '53', 4, '1次', '現象描述	防火牆log設備查得，來源 \n                IP [192.168.0.23、192.168.0.26] \n                連往目標主機208.84.2.53。\n               (註:經VIRUSTOTAL查詢此IP為可疑的\n                惡意IP)\n分析結果	公開性的DNS伺服器已被植入惡意\n                程式。\n', '1. 請在防火牆政策內封鎖此IP，避免相關事件\n    發生。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOC\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151029006', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-10-14 08:50:19', '1', '301000100G', '公開性的DNS伺服器已被植入惡意程式，貴單位流量中，有與該伺服器進行DNS查詢的軌跡', '-'),
(14, 3, '預警通知', 'Botnet連線', '2015-10-22 06:22:46', '192.168.130.4', '隨機', '209.244.0.4、114.114.115.115、209.244.0.3', '53', 1, '1617次', '現象描述	防火牆log設備查得，來源 \n                IP [192.168.130.4] 疑似向\n                目標主機209.244.0.3\n                、114.114.115.115、209.244.0.4\n                進行DNS查詢。\n               (註:經VIRUSTOTAL查詢此IP為可疑\n                的惡意IP)\n分析結果	內部主機疑似被安裝Botnet軟體。\n', '1. 請在防火牆政策內封鎖此IP，避免相關事件\n    發生。\n2. 若您有任何疑問，歡迎您隨時與 漢昕SOC\n    監控中心 聯絡，或是來信詢問，謝謝您。\n', '', 3, 'DS-G03-WA-151029007', 'ericyan@bccs.com.tw', '104年機房中央監控系統之監控作業', '2015-10-22 07:45:56', '1', '301000100G', 'Botnet連線', '-');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tw` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_global` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `tw`, `is_global`) VALUES
(1, '原廠發布修正程式', 1),
(2, '病毒資訊與病毒碼', 1),
(3, '安全漏洞與補救措施', 1),
(4, '安全事件紀錄/報導', 1),
(5, '資訊安全監控服務報告書', 0),
(6, '內網威脅事件報表', 0),
(7, '內網資安日誌收集分析報表', 0),
(8, '內外網機時統計報表', 0),
(9, '主機弱點掃描服務報告', 0),
(10, '網頁弱點掃描服務報告', 0),
(11, '滲透測試服務報告', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` tinyint(4) NOT NULL,
  `account` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `company_id`, `account`, `password`, `email`, `role`, `date`) VALUES
(1, 1, 'admin', 'fuckbccs', 'admin@admin', 3, '9999-12-31'),
(2, 1, 'ericyan@bccs.com.tw', 'eric780622', 'ericyan@bccs.com.tw', 3, '9999-12-31'),
(3, 1, 'tedwing@bccs.com.tw', '123456', 'tedwing@bccs.com.tw', 3, '9999-12-31'),
(5, 1, 'allen@bccs.com.tw', 'allen123456', 'allen@bccs.com.tw', 3, '2030-12-31'),
(9, 1, 'hanchiao@bccs.com.tw', 'hanchiao@112358', 'hanchiao@bccs.com.tw', 2, '2030-12-31'),
(11, 1, 'york@bccs.com.tw', '123456', 'york@bccs.com.tw', 2, '2030-12-31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
