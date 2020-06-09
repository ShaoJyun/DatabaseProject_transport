-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 
-- 伺服器版本： 10.4.10-MariaDB
-- PHP 版本： 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `transport`
--

-- --------------------------------------------------------

--
-- 資料表結構 `delivery_man`
--

CREATE TABLE `delivery_man` (
  `d_ssn` varchar(10) NOT NULL,
  `d_no` int(10) NOT NULL,
  `area_no` varchar(10) NOT NULL,
  `worktime` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `delivery_man`
--

INSERT INTO `delivery_man` (`d_ssn`, `d_no`, `area_no`, `worktime`) VALUES
('A121245456', 111, 'T01', 'WED FRI SAT 09:00-15:00'),
('B225012345', 789, 'D03', 'TUE THU FRI SAT 09:00-15:00'),
('C198756432', 321, 'D04', 'TUE WED FRI SAT 13:00-18:00'),
('D222333222', 10, 'D05', 'MON THU FRI SUN 13:00-18:00'),
('E223344556', 222, 'T02', 'TUE WED SUN 09:00-15:00'),
('F121212121', 333, 'T03', 'MON THU SAT 13:00-18:00'),
('G234567890', 444, 'T04', 'THU SUN 09:00-15:00'),
('S123123456', 123, 'D01', 'MON TUE WED SUN 09:00-15:00'),
('S123456789', 456, 'D02', 'MON WED THU SAT 13:00-18:00'),
('W124789456', 555, 'T05', 'FRI SAT SUN 13:00-18:00');

-- --------------------------------------------------------

--
-- 資料表結構 `package`
--

CREATE TABLE `package` (
  `p_no` int(10) NOT NULL,
  `depot_no` int(10) DEFAULT NULL,
  `return_time` datetime DEFAULT NULL,
  `s_name` varchar(25) NOT NULL,
  `r_name` varchar(25) NOT NULL,
  `s_store` varchar(30) NOT NULL,
  `r_store` varchar(30) NOT NULL,
  `s_time` datetime NOT NULL,
  `fragile` varchar(1) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `weight` float DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `shipping_status` varchar(10) NOT NULL DEFAULT '已寄件',
  `t_no` int(10) DEFAULT NULL,
  `arrival_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `package`
--

INSERT INTO `package` (`p_no`, `depot_no`, `return_time`, `s_name`, `r_name`, `s_store`, `r_store`, `s_time`, `fragile`, `size`, `weight`, `type`, `shipping_status`, `t_no`, `arrival_time`) VALUES
(1231, 12345, '2020-02-06 13:03:05', 'Wen Yi Wang', 'test', 'YUAN SHENG', 'REN YI', '2020-02-04 21:09:55', '否', '100', 550, '書', '貨車運送中', 3, '0000-00-00 00:00:00'),
(1234, 13579, NULL, 'Nian Ci Li', 'Angel Lee', 'LU WEI', 'ZHEN AN', '2020-03-11 22:34:01', 'T', '5*5*2', 1.8, 'book', '已寄件', 1, '0000-00-00 00:00:00'),
(12719, 6, '2020-06-19 04:12:05', '李先生', 'test', 'test', 'test', '2020-06-05 04:12:05', '否', '100', 100, '滑鼠', '已寄件', 30, '0000-00-00 00:00:00'),
(36548, 4, '2020-06-19 23:53:38', 'Wen Yi Wang', 'test', 'test', 'test', '2020-06-05 23:53:38', '否', '100', 550, '書', '已寄件', 7, '0000-00-00 00:00:00'),
(43210, 24680, NULL, 'Huang ren ji', 'You Zhen Wu', 'DA QIAN', 'ER SHUI', '2020-01-20 10:20:22', 'F', '10*2*2', 5, 'clothes', '物流中心已收', 2, '0000-00-00 00:00:00'),
(45645, 11111, NULL, 'Andy Chen', 'Zhi Hao Li ', 'NIU XU', 'CHU LU', '2019-12-04 20:55:20', 'F', '30*30*12', 8, 'book', '貨車運送中', 4, '0000-00-00 00:00:00'),
(62929, 10, '2020-06-19 04:08:17', '王先生', 'test', '10', 'test', '2020-06-05 04:08:17', '否', NULL, 100, '書', '已寄件', 30, '0000-00-00 00:00:00'),
(63198, 10, '2020-06-19 04:21:00', '鄭先生', 'test', 'test', 'test', '2020-06-05 04:21:00', '否', '100', 550, '書', '已寄件', 29, '0000-00-00 00:00:00'),
(75766, 7, '2020-06-20 00:33:18', '', '', '', '', '2020-06-06 00:33:18', NULL, NULL, NULL, NULL, '已寄件', 15, '0000-00-00 00:00:00'),
(78978, 22222, NULL, 'A ming Peng', 'Pin Yu Huang', 'CUN DONG', 'AN ZHAO', '2020-05-15 16:49:13', 'T', '10*10*12', 2.6, 'clothes', '已到門市', 5, '0000-00-00 00:00:00'),
(84192, 10, '2020-06-19 03:47:31', '暄宸彭', 'test', 'test', 'test', '2020-06-05 03:47:31', '否', '100', 550, '書', '已寄件', 30, '0000-00-00 00:00:00'),
(90804, 4, '2020-06-20 00:37:19', '暄宸彭', '暄宸彭', '高雄市', '高雄市', '2020-06-06 00:37:19', '否', '100', 550, '書', '已寄件', 44, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `recipient`
--

CREATE TABLE `recipient` (
  `r_name` varchar(25) NOT NULL,
  `r_phone` int(10) NOT NULL,
  `r_email` varchar(30) DEFAULT NULL,
  `r_store` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `recipient`
--

INSERT INTO `recipient` (`r_name`, `r_phone`, `r_email`, `r_store`) VALUES
('Pin Yu Huang', 900320022, 'pinyu@yahoo.com.tw', 'AN ZHAO'),
('Yu Tong Guo', 911274759, 'yutong@yahoo.com.tw', 'REN YI'),
('Angel Lee', 923940323, 'angellee@gmail.com', 'ZHEN AN'),
('Zhi Hao Li', 987773212, 'zhihao@gmail.com', 'CHU LU'),
('You Zhen Wu', 988734983, 'youzhen@fcu.edu.tw ', 'ER SHUI');

-- --------------------------------------------------------

--
-- 資料表結構 `sender`
--

CREATE TABLE `sender` (
  `s_name` varchar(25) NOT NULL,
  `s_phone` int(10) NOT NULL,
  `s_email` varchar(30) DEFAULT NULL,
  `s_store` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `sender`
--

INSERT INTO `sender` (`s_name`, `s_phone`, `s_email`, `s_store`) VALUES
('A ming Peng', 911567890, 'aming@gmail.com', 'CUN DONG'),
('Huang ren ji', 912349922, 'renji@gmail.com', 'DA QIAN'),
('Nian Ci Li', 972112340, 'cili@yahoo.com.tw', 'LU WEI'),
('Wen Yi Wang', 985123456, 'yiwang@gmail.com', 'YUAN SHENG'),
('Andy Chen', 988168888, 'andy@yahoo.com.tw', 'NIU XU');

-- --------------------------------------------------------

--
-- 資料表結構 `truck`
--

CREATE TABLE `truck` (
  `t_no` int(10) NOT NULL,
  `d_no` int(10) NOT NULL,
  `r_store` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `truck`
--

INSERT INTO `truck` (`t_no`, `d_no`, `r_store`) VALUES
(1, 111, 'ZHEN AN'),
(2, 222, 'ER SHUI'),
(3, 333, 'REN YI'),
(4, 444, 'CHU LU'),
(5, 555, 'AN ZHAO');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `delivery_man`
--
ALTER TABLE `delivery_man`
  ADD PRIMARY KEY (`d_ssn`);

--
-- 資料表索引 `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`p_no`);

--
-- 資料表索引 `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`r_phone`);

--
-- 資料表索引 `sender`
--
ALTER TABLE `sender`
  ADD PRIMARY KEY (`s_phone`);

--
-- 資料表索引 `truck`
--
ALTER TABLE `truck`
  ADD PRIMARY KEY (`t_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
