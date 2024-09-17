-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-11 21:49:07
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `group_30`
--
CREATE DATABASE IF NOT EXISTS `group_30` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `group_30`;

-- --------------------------------------------------------

--
-- 資料表結構 `forum`
--
-- 建立時間： 2022-06-11 19:23:41
--

CREATE TABLE `forum` (
  `msn_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `msn_name` varchar(20) NOT NULL,
  `msn_title` text NOT NULL,
  `msn_content` text NOT NULL,
  `msn_belong` int(11) NOT NULL,
  `msn_date` date NOT NULL,
  `msn_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `forum`
--

INSERT INTO `forum` (`msn_id`, `member_id`, `msn_name`, `msn_title`, `msn_content`, `msn_belong`, `msn_date`, `msn_time`) VALUES
(1, 1, 'mass', 'aaaatt', '写HTML的时候，我们会想当然地认为自己加的空格，都会被浏览器显示出来，事实上并非如此。实际上，HTML的显示有一些规则：\r\n\r\n在HTML代码中所有连续的空格或空行（换行）都会被显示为一个空格，不管是在HTML要显示的内容还是HTML源代码的标签之间。\r\n当我们想让内容在同一行连续显示时，就让所有的HTML代码之间没有空格和换行。\r\n那我们想显示多个空格或换行怎么办呢？可以考虑用以下方法：\r\n\r\n1. 使用<pre>标签。\r\n\r\n<pre>标签就是为了显示文本的原始格式，你的空格和换行都会被保留。使用时，优先考虑使用这个方法。\r\n\r\nHTML\r\n<pre>\r\n第一行\r\n​\r\n第二行\r\n    第三行      结尾\r\n</pre>\r\n2. 用空格实体符&nbsp;代替空格，用换行标签<br/>代替空行。\r\n\r\nHTML\r\n<p>第一段&nbsp;&nbsp;&npsp;内容</p>\r\n<br/>\r\n<p>第二段                  内容</p>\r\n3. 用全角空格。全角空格被解释为汉字，所以不会被被解释为HTML分隔符，可以按照实际的空格数显示。\r\n\r\nHTML\r\n<p>第一段　　　　　　　　　　内容</p>\r\n　　　　\r\n<p>第二段　　　　　　　　　　内容</p>\r\n4. 用CSS的white-space: pre-wrap属性。这个属性声明如何处理元素内的空白符，这种方法也比较简洁。\r\n\r\nHTML\r\n<p style=\"white-space: pre-wrap;\">\r\n第一段                 内容\r\n​\r\n第二段                 内容\r\n</p>\r\n在使用过程中，优先推荐使用第1种和第4种方法。', 0, '2022-06-09', '20:25:22'),
(2, 1, 'mass', 'aaaatt', 'vcdefwefdvfrrf\r\nfwfev\r\nwfvfevevr\r\n\r\nvfreverev\r\nfwvvrvv', 1, '2022-06-09', '20:25:22'),
(3, 1, 'mass2', 'aaaatt', 'vcdefwefdvfrrf\r\nfwfev\r\nwfvfevevr\r\n\r\nvfreverev\r\nfwvvrvv', 1, '2022-06-09', '20:25:22'),
(4, 1, 'mass3', 'aaaatt', '写HTML的时候，我们会想当然地认为自己加的空格，都会被浏览器显示出来，事实上并非如此。实际上，HTML的显示有一些规则：\n\n在HTML代码中所有连续的空格或空行（换行）都会被显示为一个空格，不管是在HTML要显示的内容还是HTML源代码的标签之间。\n当我们想让内容在同一行连续显示时，就让所有的HTML代码之间没有空格和换行。\n那我们想显示多个空格或换行怎么办呢？可以考虑用以下方法：\n\n1. 使用<pre>标签。\n\n<pre>标签就是为了显示文本的原始格式，你的空格和换行都会被保留。使用时，优先考虑使用这个方法。\n\nHTML\n<pre>\n第一行\n​\n第二行\n    第三行      结尾\n</pre>\n2. 用空格实体符&nbsp;代替空格，用换行标签<br/>代替空行。\n\nHTML\n<p>第一段&nbsp;&nbsp;&npsp;内容</p>\n<br/>\n<p>第二段                  内容</p>\n3. 用全角空格。全角空格被解释为汉字，所以不会被被解释为HTML分隔符，可以按照实际的空格数显示。\n\nHTML\n<p>第一段　　　　　　　　　　内容</p>\n　　　　\n<p>第二段　　　　　　　　　　内容</p>\n4. 用CSS的white-space: pre-wrap属性。这个属性声明如何处理元素内的空白符，这种方法也比较简洁。\n\nHTML\n<p style=\"white-space: pre-wrap;\">\n第一段                 内容\n​\n第二段                 内容\n</p>\n在使用过程中，优先推荐使用第1种和第4种方法。', 0, '2022-06-09', '20:25:22'),
(5, 2, 'qqq', 'weqew', 'wewqwe\r\newew\r\newew\r\n\r\nwew', 0, '2022-06-10', '16:21:10'),
(6, 2, 'ww', 'ww', 'ww\r\nfewc', 0, '2022-06-10', '16:21:27'),
(7, 2, 'dwdw', 'wdw', 'wdw\r\nww', 0, '2022-06-10', '16:24:03'),
(8, 2, 'qqq', 'title', 'scsscss\r\ns\r\nsscscs', 0, '2022-06-10', '16:30:04'),
(9, 2, 'ww', 'title', 'csc\r\ncscs\r\nsc', 8, '2022-06-10', '16:30:52'),
(10, 2, 'ww', 'title', 'sacscs', 8, '2022-06-10', '16:32:30'),
(11, 0, 'DS', 'title', 'ASDASDSA', 8, '2022-06-11', '01:39:57');

-- --------------------------------------------------------

--
-- 資料表結構 `index_image`
--
-- 建立時間： 2022-06-11 19:23:41
-- 最後更新： 2022-06-11 19:44:25
--

CREATE TABLE `index_image` (
  `id` int(11) NOT NULL,
  `path` varchar(25) NOT NULL,
  `uptime` datetime NOT NULL,
  `state` int(5) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `index_image`
--

INSERT INTO `index_image` (`id`, `path`, `uptime`, `state`, `start`, `end`) VALUES
(1, 'i_1.jpg', '2022-06-11 14:01:29', 2, '2022-06-11 20:53:29', '2022-06-15 20:54:03'),
(2, 'i_2.jpg', '2022-06-11 14:01:29', 0, '2022-06-11 20:53:29', '2022-06-15 20:54:03'),
(3, 'i_3.jpg', '2022-06-12 03:39:07', 2, '2022-06-12 03:38:59', '2022-07-12 03:38:59');

-- --------------------------------------------------------

--
-- 資料表結構 `item_list`
--
-- 建立時間： 2022-06-11 19:23:41
-- 最後更新： 2022-06-11 19:48:51
--

CREATE TABLE `item_list` (
  `item_id` int(4) NOT NULL,
  `item_type` varchar(12) NOT NULL,
  `item_name` varchar(80) NOT NULL,
  `item_photo` varchar(40) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_discount` float NOT NULL,
  `item_state` int(5) NOT NULL,
  `item_title` varchar(80) NOT NULL,
  `item_inf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `item_list`
--

INSERT INTO `item_list` (`item_id`, `item_type`, `item_name`, `item_photo`, `item_price`, `item_discount`, `item_state`, `item_title`, `item_inf`) VALUES
(101, 'cpu', 'Intel Core i5-9600K', 'item_101.jpg', 7710, 0.9, 0, 'Intel Core i5-9600K 中央處理器 盒裝', '˙第9代 Intel 處理器˙\r\n◆ 腳位：1151\r\n◆ 時脈速度：3.70-4.60 GHz\r\n◆ 快取記憶體：9MB\r\n◆ 核心/執行緒：6 / 6\r\n◆ TDP：95 W'),
(102, 'cpu', 'Intel Core i5-11400', 'item_102.jpg', 5200, 0.9, 0, 'Intel Core i5-11400 中央處理器 盒裝', '◆ 腳位：1200\r\n◆ 時脈速度：2.60-4.40 GHz\r\n◆ 核心/執行緒：6 / 12\r\n◆ TDP：65 W'),
(103, 'cpu', 'Intel Core i5-11600KF', 'item_103.jpg', 8588, 0.9, 0, 'Intel Core i5-11600KF 中央處理器 盒裝', '◆ 腳位：1200\r\n◆ 時脈速度：3.90-4.90 GHz\r\n◆ 核心/執行緒：6 / 12\r\n◆ TDP：95 W'),
(104, 'cpu', 'Intel Core i5-12400', 'item_104.jpg', 5900, 0.9, 0, 'Intel Core i5-12400 中央處理器 盒裝', '◆ 腳位：LGA 1700\r\n◆ 時脈速度：2.50 GHz-4.40 GHz\r\n◆ 核心執行緒：6  12\r\n◆ Processor Base Power：65 W\r\n◆ Maximum Turbo Power：117 W'),
(105, 'cpu', 'Intel Core i7-9700KF', 'item_105.jpg', 10290, 0.9, 0, 'Intel Core i7-9700K 中央處理器 盒裝', '˙第九代 Intel 處理器˙\r\n◆ 腳位：1151\r\n◆ 基礎頻率：3.60 GHz\r\n◆ 快取記憶體：12 MB\r\n◆ 核心/執行緒：8 / 8\r\n◆ TDP：95 W'),
(106, 'cpu', 'Intel Core i7-10700KF', 'item_106.jpg', 9488, 0.9, 0, 'Intel Core i7-10700KF 處理器 16 MB 快取記憶體 原廠盒裝', '16 MB 快取記憶體，最高瞬間渦輪加速3.0可達 5.1 GHz (非持續)\r\n14 nm\r\n65W TDP'),
(107, 'cpu', 'Intel Core i7-12700K', 'item_107.jpg', 12500, 0.9, 0, 'Intel Core i7-12700K 中央處理器 盒裝', '◆ 腳位：FCLGA 1700\r\n◆ 時脈速度：3.60 GHz-5.00 GHz\r\n◆ Efficient-core Base Frequency：2.70 GHz\r\n◆ 核心/執行緒：12 / 20\r\n◆ Processor Base Power：125 W\r\n◆ Maximum Turbo Power：190 W'),
(108, 'cpu', 'Intel Core i9-10900F', 'item_108.jpg', 11590, 0.9, 0, 'Intel Core i9-10900F 中央處理器 盒裝', '◆ 腳位：1200\r\n◆ 時脈速度：2.80-5.20 GHz\r\n◆ 核心/執行緒：10 / 20\r\n◆ TDP：65 W'),
(111, 'cpu', 'Intel Core i9-12900KS', 'item_111.jpg', 22888, 0.9, 9, 'Intel Core i9-12900KS 中央處理器 盒裝', '◆ 腳位：LGA 1700\r\n◆ 時脈速度：3.40 GHz-5.50 GHz\r\n◆ Efficient-core Base Frequency：2.50 GHz\r\n◆ 核心/執行緒：16 / 24\r\n◆ Processor Base Power：150 W\r\n◆ Maximum Turbo Power：241 W'),
(112, 'cpu', 'intel Pentium® Gold G6405', 'item_112.jpg', 2150, 0.9, 0, 'INTEL Pentium® Gold G6405 處理器 盒裝', '◆ 腳位：1200\r\n◆ 時脈速度：1.05-4.00 GHz\r\n◆ 核心/執行緒：2 / 4\r\n◆ TDP：58 W'),
(113, 'cpu', 'AMD Ryzen 5-3600', 'item_113.jpg', 8888, 0.9, 0, 'AMD Ryzen 5-3600 3.6GHz六核心 中央處理器 盒裝', 'CPU 核心數: 6\r\n基本時脈速度: 3.6GHz\r\n最大渦輪核心速度: 3.6GHz'),
(114, 'cpu', 'AMD Ryzen 5-5600G', 'item_114.jpg', 6790, 0.9, 0, 'AMD Ryzen 5-5600G 3.9GHz 六核心 中央處理器(內附風扇) 盒裝', 'CPU 核心數: 6\r\n線程：12\r\n基本時脈速度: 3.9GHz\r\n最大渦輪核心速度: 4.4GHz\r\n預設 TDP/TDP: 65W\r\n顯示卡型號: Radeon™ Graphics\r\n顯示卡核心數量: 7\r\n顯示卡頻率: 1900 MHz'),
(115, 'cpu', 'AMD Ryzen 5-5600X', 'item_115.jpg', 6970, 0.9, 0, 'AMD Ryzen 5-5600X 3.7GHz 6核心 中央處理器 盒裝', 'CPU 核心數: 6\r\n基本時脈速度: 3.7GHz\r\n最大渦輪核心速度: 4.6GH'),
(116, 'cpu', 'AMD Ryzen 7-3800X', 'item_116.jpg', 8499, 0.9, 0, 'AMD Ryzen 7-3800X 3.9GHz八核心 中央處理器 盒裝', 'CPU 核心數: 8\r\n基本時脈速度: 3.9GHz\r\n最大渦輪核心速度: 4.5GHz'),
(117, 'cpu', 'AMD Ryzen 7-5700G', 'item_117.jpg', 9970, 0.9, 0, 'AMD Ryzen 7-5700G 3.8GHz 八核心 中央處理器(內附風扇) 盒裝', 'CPU 核心數: 8\r\n線程：16\r\n基本時脈速度: 3.8GHz\r\n最大渦輪核心速度: 4.6GHz\r\n預設 TDP/TDP: 65W\r\n顯示卡型號: Radeon™ Graphics\r\n顯示卡核心數量: 8\r\n顯示卡頻率: 2000 MHz'),
(118, 'cpu', 'AMD Ryzen 7-5800X', 'item_118.jpg', 8970, 0.9, 0, 'AMD Ryzen 7-5800X 3.8GHz 8核心 中央處理器 盒裝', 'CPU 核心數: 8\r\n基本時脈速度: 3.8GHz\r\n最大渦輪核心速度: 4.7GH'),
(119, 'cpu', 'AMD Ryzen 9 3900X', 'item_119.jpg', 14888, 0.9, 0, 'AMD Ryzen 9 3900X 12-core 4.6GHz, 24執行續 12核心 中央處理器 4.6GHz 盒裝', 'CPU 核心數:12\r\n執行緒數:24\r\n基本時脈:3.8GHz\r\n最大超頻時脈:最高 4.6GHz'),
(120, 'cpu', 'AMD Ryzen 9 5900X', 'item_120.jpg', 17200, 0.9, 0, 'AMD Ryzen 7-5800X 3.8GHz 8核心 中央處理器 盒裝', 'CPU 核心數: 8\r\n基本時脈速度: 3.8GHz\r\n最大渦輪核心速度: 4.7GH'),
(121, 'cpu', 'AMD Ryzen 9-5950X', 'item_121.jpg', 18970, 0.9, 0, 'AMD Ryzen 9-5950X 3.4GHz 16核心 中央處理器 盒裝', 'CPU 核心數: 16\r\n基本時脈速度: 3.4GHz\r\n最大渦輪核心速度: 4.9GH\r\n無風扇'),
(201, '主機板', '技嘉 Z590 AORUS PRO AX 主機板', 'item_201.jpg', 10990, 0.9, 0, '技嘉 Z590 AORUS PRO AX 主機板', '◆ 支援CPU ：1200腳位\r\n◆ 記憶體 ：4x DIMM / 128GB DDR4(max)\r\n◆ 擴充插槽：\r\n1個PCI Express x16插槽，支援x16運作規格(PCIEX16)\r\n*為發揮顯示卡最大效能，安裝一張顯示卡時務必安裝至PCIEX16插槽。\r\n* 由於PCI EX16插槽與M2B_CPU及M2C_CPU插槽共享頻寬，所以當M2B_CPU或M2C_CPU插座安裝SSD時，PCIEX16插槽最高以x8頻寬運作。\r\n(PCIEX16插槽支援PCI Express 4.0)*\r\n*只有第十一代處理器支援此功能。\r\n2個PCI Express x16插槽，支援x4運 作規格(PCIEX4_1/PCIEX4_2)\r\n(PCIEX4_1及PCIEX4_2插槽皆支援PCI Express 3.0)\r\n◆ USB插槽 ：\r\n內建於晶片組：\r\n1 x USB Type-C®連接埠在後方面板，支援USB 3.2 Gen 2x2\r\n1 x USB Type-C®連接埠，支援USB 3.2 Gen 2，需經由排線從主機板內USB插座接出\r\n4 x USB 3.2 Gen 2 Type-A 連接埠(紅色)在後方面板\r\n2 x USB 3.2 Gen 1 連接埠需經由排線從主機板內USB插座接出\r\n內建於晶片組+USB 3.2 Gen 1 Hub：\r\n4 x USB 3.2 Gen 1連接埠在後方面板\r\n內建於晶片組+2個USB 2.0 Hub：\r\n8個USB 2.0/1.1連接埠(4個在後方面板，4個需經由排線從主機板內USB插座接出\r\n◆ 主板尺寸：ATX\r\n◆ 體積(長x寬)：30.5 x 24.4 cm'),
(202, '主機板', '映泰B550MH主機板 V6.0', 'item_202.jpg', 2390, 0.9, 0, '映泰B550MH主機板 V6.0', '▲ 晶片: AMD B550\r\n▲ 支援CPU：AMD 3rd Ryzen™ (Matisse/ Renoir) 處理器\r\n▲ 記憶體：2-DIMM / DDR4-4400+(OC)\r\n▲ 顯示輸出：1x HDMI / 1 x VGA 連接埠\r\n▲ 擴充插槽：1 x PCIe 3.0/4.0 x16/ 2 x PCIe 3.0 x 1/PCIe M.2 4.0 (64Gb/s) 插槽\r\n▲ 儲存插槽： 4 x SATA III (6Gb/s)接頭\r\n▲ 網路連接：Realtek RTL8111H 10/ 100/ 1000 Mb/s/ Super LAN Surge Protection\r\n▲ USB插槽：8 x USB 3.2(Gen1)/6 x USB 2.0 連接埠\r\n▲ 主板尺寸：Micro-ATX\r\n▲ 體積(長x寬)：24.4cm x 20.8cm'),
(203, '主機板', '華碩 PRIME H410M K 主機板', 'item_203.jpg', 2490, 0.9, 0, '華碩 PRIME H410M K 主機板', '◆ 支援CPU ：1200腳位\r\n◆ 記憶體 ：2x DIMM / 64GB DDR4(max)\r\n◆ 擴充插槽：1 x PCIe 3.0 x16 / 2 x PCIe 3.0 x1\r\n◆ 儲存插槽：4x SATA\r\n◆ USB插槽 ：\r\nRear USB Port ( Total 6 )\r\n2 x USB 3.2 Gen 1 port(s)(2 x Type-A)\r\n4 x USB 2.0 port(s)(2 x Type-A)\r\nFront USB Port ( Total 4 )\r\n2 x USB 3.2 Gen 1 port(s)\r\n2 x USB 2.0 port(s)\r\n◆ 主板尺寸：Micro ATX\r\n◆ 體積(長x寬)：22.6 cm x 20.3 cm'),
(204, '主機板', '華碩 PRIME H510M-K 主機板', 'item_204.jpg', 2690, 0.9, 0, '華碩 PRIME H510M-K 主機板', '◆ 支援CPU ：1200腳位\r\n◆ 記憶體 ：\r\nMemory Channels:2DDR4 (Dual Channel)\r\nMax Memory Size:64GB\r\n◆ 儲存插槽：\r\nSupports 1 x M.2 slot and 4 x SATA 6Gb/s ports\r\n◆ USB插槽 ：\r\n◆ USB 連接埠\r\nRear USB:Total 6 ports\r\n2 x USB 3.2 Gen 1 ports (2 x Type-A)\r\n4 x USB 2.0 ports (4 x Type-A)\r\nFront USB:Total 4 ports\r\n1 x USB 3.2 Gen 1 header supports additional 2 USB 3.2 Gen 1 ports\r\n1 x USB 2.0 header supports additional 2 USB 2.0 ports\r\n◆ 主板尺寸：microATX\r\n22.6cm x 20.3cm'),
(205, '主機板', '華碩 PRIME H670-PLUS D4-CSM 主機板', 'item_205.jpg', 5790, 0.9, 0, '華碩 PRIME H670-PLUS D4-CSM 主機板', '◆ 支援CPU ：LGA 1700\r\n◆ 記憶體 ：2 x DIMMs, Max 32GB, DDR4\r\n◆ 擴充插槽：\r\nIntel® 12th Gen Processors\r\n1 x PCIe 4.0/3.0 x16 slot\r\nIntel® B660 Chipset\r\n2 x PCIe 3.0 x1 slots\r\n◆ 儲存插槽：Total supports 2 x M.2 slots and 4 x SATA 6Gb/s ports\r\n◆ USB插槽 ：\r\n4 x USB 3.2 Gen 1 ports (4 x Type-A)\r\n2 x USB 2.0 ports (2 x Type-A）\r\n1 x USB 3.2 Gen 1 header supports additional 2 USB 3.2 Gen 1 ports\r\n2 x USB 2.0 headers support additional 4 USB 2.0 ports\r\n◆ 主板尺寸：microATX\r\n24.4cm x 21.1cm'),
(206, '主機板', '華碩 PRIME-A320M-K 主機板(mATX)', 'item_206.jpg', 2490, 0.9, 0, '華碩 PRIME-A320M-K 主機板(mATX)', '◆ 支援CPU ：AM4腳位(AMD,MAX)\r\n◆ 記憶體 ：2x DIMM / 32GB DDR4(max)\r\n◆ 擴充插槽：2x PCIe 3.0x16 / 2x PCIe 2.0x1\r\n◆ 儲存插槽：2x M.2 / 4x SATA\r\n◆ USB插槽 ：6x USB 3.0 / 6x USB 2.0\r\n◆ 網路連接：Realtek RTL8111H\r\n◆ 主板尺寸：M-ATX\r\n◆ 體積(長x寬)：22.6 x 22.1 cm\r\n'),
(207, '主機板', '華碩 ROG CROSSHAIR VIII HERO WIFI 6 AX AMD 主機板', 'item_207.jpg', 13090, 0.9, 0, '華碩 ROG CROSSHAIR VIII HERO WIFI 6 AX AMD 主機板', '◆ 支援CPU ：AM4腳位(AMD)\r\n◆ 記憶體 ：4x DIMM / 128GB DDR4(max)\r\n◆ 擴充插槽：3x PCIe 4.0x16 / 1 x PCIe4.0x1 (3代 Ryzen處理器)\r\n◆ 儲存插槽：2x M.2 / 8x SATA (3代 Ryzen處理器)\r\n◆ USB插槽 ：6x USB 3.2 Gen2 / 4x USB 2.0\r\n◆ 主板尺寸：ATX 30.5 x 24.4 cm'),
(208, '主機板', '華碩 ROG MAXIMUS Z690 FORMULA 主機板', 'item_208.jpg', 20900, 0.9, 0, '華碩 ROG MAXIMUS Z690 FORMULA 主機板', '◆ 支援CPU ：LGA1700腳位\r\n◆ 儲存插槽：Supports 5 x M.2 slots and 6 x SATA 6Gb/s ports\r\n◆ USB插槽 ：\r\nRear USB:\r\nTotal 12 ports\r\nFront USB:\r\nTotal 9 ports\r\n◆ 主板尺寸：ATX\r\n30.5公分 x 24.4公分'),
(209, '主機板', '華碩 TUF GAMING B450M-PLUS II 主機板', 'item_209.jpg', 3190, 0.9, 0, '華碩 TUF GAMING B450M-PLUS II 主機板', '◆ 支援CPU ：AMD AM4 Socket for AMD Ryzen™\r\n◆ 記憶體 ：4 x DIMM(Max. 128GB, DDR4)\r\n◆ 顯示輸出：HDMI / DVI-D\r\n◆ USB插槽 ：\r\nRear USB Port ( Total 6 )\r\n1 x USB 3.2 Gen 2 port(s)(1 x Type-A)\r\n3 x USB 3.2 Gen 1 port(s)(2 x Type-A +1 x Type-C)\r\n2 x USB 2.0 port(s)(2 x Type-A)\r\nFront USB Port ( Total 6 )\r\n2 x USB 3.2 Gen 1 port(s)(2 x Type-A)\r\n4 x USB 2.0 port(s)(4 x Type-A)\r\n◆ 主板尺寸：mATX Form Factor\r\n9.6 inch x 9.6 inch ( 24.4 cm x 24.4 cm )'),
(210, '主機板', '華碩 TUF GAMING B660M-PLUS WIFI D4 主機板', 'item_210.jpg', 5390, 0.9, 0, '華碩 TUF GAMING B660M-PLUS WIFI D4 主機板', '◆ 支援CPU ：LGA1700腳位\r\n◆ Memory ：4 x DIMM, Max. 128GB, DDR4\r\n◆ 儲存插槽：supports 2 x M.2 slots and 4 x SATA 6Gb/s ports\r\n◆ USB插槽 ：\r\nRear USB (Total 8 ports)\r\n1 x USB 3.2 Gen 2x2 port (1 x USB Type-C®)\r\n4 x USB 3.2 Gen 2 ports (4 x Type-A)\r\n1 x USB 3.2 Gen 1 port (1 x Type-A)\r\n2 x USB 2.0 ports (2 x Type-A)\r\nFront USB (Total 7 ports)\r\n1 x USB 3.2 Gen 1 connector (supports USB Type-C®)\r\n1 x USB 3.2 Gen 1 header supports additional 2 USB 3.2 Gen 1 ports\r\n2 x USB 2.0 headers support additional 4 USB 2.0 ports\r\n\r\n◆ 主板尺寸：mATX Form Factor\r\n9.6inch x 9.6 inch ( 24.4 cm x 24.4 cm )\r\n'),
(211, '主機板', '華擎 ASRock A520M HDV AMD AM4 M-ATX 主機板', 'item_211.jpg', 2490, 0.9, 0, '華擎 ASRock A520M HDV AMD AM4 M-ATX 主機板', '● 支援第三代 AMD AM4 Ryzen™ / 將來的 AMD Ryzen™ 處理器\r\n● 支援 DDR4 4733+ (OC)\r\n● 7.1 聲道高傳真音效 (Realtek ALC887 音源編碼解碼器)\r\n● Realtek 千兆網卡\r\n● 1 x PCIe 3.0 x16、1 x PCIe 3.0 x1'),
(212, '主機板', '微星 H610M BOMBER DDR4 主機板', 'item_212.jpg', 2688, 0.9, 0, '微星 H610M BOMBER DDR4 主機板', '◆ 支援CPU ：LGA1700\r\n◆ 記憶體 ：2 x DIMM / 64GB 支援DDR4(max)\r\n◆ 擴充插槽：1xPCI-EX16 / 1xPCI-E X1\r\n◆ 儲存插槽： 1x M.2\r\n◆ USB插槽 ：6x USB 2.0 / 4x USB 3.2\r\n◆ 主板尺寸：Mirco-ATX'),
(301, '顯示卡', 'ASUS 華碩 DUAL GeForce RTX™3060 Ti O8G 顯示卡', 'item_301.jpg', 15090, 0.9, 0, 'ASUS 華碩 DUAL GeForce RTX™3060 Ti O8G 顯示卡', '◆顯示晶片 ：NVIDIA® GeForce RTX™ 3060 Ti\r\n◆記憶體 ：GDDR6 8GB\r\n◆ 記憶體介面：256-bit\r\n◆電源接口：1 x 8-pin\r\n◆輸出端子 ：3x DP / 2x HDMI\r\n◆顯卡長度：26.9 x 13.6 x 5.2cm'),
(302, '顯示卡', 'PNY GeForce RTX 3080 12G 顯示卡(LHR)', 'item_302.jpg', 32999, 0.9, 0, 'PNY GeForce RTX 3080 12G 顯示卡(LHR)', '◆ 顯示晶片 ：NVIDIA GeForce RTX 3080\r\n◆ 記憶體 ：12GB GDDR6\r\n◆ CUDA數 ：8960\r\n◆ 記憶體時脈：1260 MHz\r\n◆ 記憶體介面：384-bit\r\n◆ 輸出端子 ：3x DP / 1x HDMI\r\n◆ 體積(長x寬x高)：317 x115 x60 mm'),
(303, '顯示卡', 'ZOTAC GAMING GeForce RTX™ 3060 AMP White Edition 12G 顯示卡', 'item_303.jpg', 14990, 0.9, 0, 'ZOTAC GAMING GeForce RTX™ 3060 AMP White Edition 12G 顯示卡', '◆顯示晶片 ：NVIDIA® GeForce RTX™ 3060\r\n◆記憶體 ：GDDR6 12GB\r\n◆CUDA數 ：1867\r\n◆ 記憶體介面：192-bit\r\n◆電源接口：2 x 8-pin\r\n◆輸出端子 ：3x DP / 1x HDMI\r\n◆顯卡長度：23.19 x 14.13 x 4.15cm'),
(304, '顯示卡', '技嘉 AORUS Radeon™ RX 6800 MASTER 16G 顯示卡', 'item_304.jpg', 29790, 0.9, 0, '技嘉 AORUS Radeon™ RX 6800 MASTER 16G 顯示卡', '◆顯示晶片 ：Radeon™ RX 6800\r\n◆記憶體 ：GDDR6 1‎6 GB\r\n◆記憶體介面：2‎56-bit\r\n◆電源接口：2 x 8-pin\r\n◆輸出端子 ：2 x DP / 1 x HDMI\r\n◆顯卡長度：32.4 x 14.0 x 6.0 cm'),
(305, '顯示卡', '技嘉 GeForce RTX™ 3070 Ti GAMING OC 8G', 'item_305.jpg', 24090, 0.9, 0, '技嘉 GeForce RTX™ 3070 Ti GAMING OC 8G 顯示卡', '◆顯示晶片 ：GeForce RTX™ 3070 Ti\r\n◆記憶體 ：GDDR6X 8GB\r\n◆記憶體介面：256-bit\r\n◆電源接口：8‎ pin*2\r\n◆輸出端子 ：2x DP / 2xHDMI\r\n◆顯卡長度：32 x 12.9 x 5.5 cm'),
(306, '顯示卡', '技嘉 Radeon RX 6600 XT EAGLE 8G 顯示卡', 'item_306.jpg', 12490, 0.9, 0, '技嘉 Radeon RX 6600 XT EAGLE 8G 顯示卡', '◆ 顯示晶片 ：Radeon™ RX 6600 XT\r\n◆ 記憶體 ：8GB GDDR6\r\n◆ 多螢幕支援 : 4\r\n◆ 電源接口：1*8pin\r\n◆ 輸 出 ：DisplayPort 1.4a *2/HDMI 2.1 *2\r\n◆ 顯卡長度：28.2 x 11.3 x 4.1 cm'),
(307, '顯示卡', '技嘉AORUS Radeon RX 6900 XT XTREME WATERFORCE WB 16G 顯示卡', 'item_307.jpg', 54190, 0.9, 0, '技嘉AORUS Radeon RX 6900 XT XTREME WATERFORCE WB 16G 顯示卡', '◆ 顯示晶片 ：Radeon™ RX 6900 XT\r\n◆ 記憶體 ：16GB GDDR6\r\n◆ 多螢幕支援 : 4\r\n◆ 電源接口：3*8pin\r\n◆ 輸 出 ：DisplayPort 1.4a *2 HDMI 2.1 *2\r\n◆ 顯卡長度：28.2 x 14.6 x 2.8 cm\r\n'),
(308, '顯示卡', '索泰ZOTAC GAMING GeForce RTX 3090Ti AMP Extreme Holo', 'item_308.jpg', 64999, 0.9, 0, '【ZOTAC】索泰ZOTAC GAMING GeForce RTX 3090Ti AMP Extreme Holo', '全新旗艦 ZOTAC GAMING GeForce RTX 3090 Ti AMP Extreme Holo 結合終極性能與頂級技術，成就史上最強顯示卡。AMP Extreme Holo 採用獲獎的 HoloBlack 全息極光設計，並配備 ZOTAC GAMING 史上散熱能力最高的 IceStorm 2.0 冷卻系統，令顯示卡時刻發揮 GeForce 3090 Ti 的巔峰性能。'),
(309, '顯示卡', '華碩 ROG STRIX GeForce RTX 3080 Ti 12GB 顯示卡', 'item_309.jpg', 32900, 0.9, 0, '華碩 ROG STRIX GeForce RTX 3080 Ti 12GB 顯示卡', '◆ 顯示晶片 ：NVIDIA® GeForce RTX™ 3080 Ti\r\n◆ 記憶體 ：12GB GDDR6X\r\n◆ 核心時脈 ：\r\nOC mode : 1695 MHz (Boost Clock)\r\nGaming mode : 1665 MHz (Boost Clock)\r\n◆ 記憶體介面 : 384-bit\r\n◆ 電源接口：3 x 8 pin\r\n◆ 輸出端子 ：\r\nYes x 2 (Native HDMI 2.1)\r\nYes x 3 (Native DisplayPort 1.4a)\r\nHDCP Support Yes (2.3)\r\n◆ 顯卡長度：\r\n318.5 x 140.1 x 57.78 mm\r\n12.53 x 5.51 x 2.27 inch'),
(310, '顯示卡', '華碩 TUF Gaming GeForce® GTX 1660 Ti EVO OC Edition 6GB顯示卡', 'item_310.jpg', 8390, 0.9, 0, '華碩 TUF Gaming GeForce® GTX 1660 Ti EVO OC Edition 6GB顯示卡', '◆ 顯示晶片 ：NVIDIA® GeForce GTX 1660 Ti\r\n◆ 記憶體 ：6GB GDDR6\r\n◆ CUDA數 ：1536\r\n◆ 核心時脈 ：\r\nOC mode : 1845 MHz (Boost Clock)\r\nGaming mode : 1815 MHz (Boost Clock)\r\n◆ 記憶體介面：192-bit\r\n◆ 輸出端子 ：\r\nYes x 1 (Native DVI-D)\r\nYes x 2 (Native HDMI 2.0b)\r\nYes x 1 (Native DisplayPort 1.4a)\r\nHDCP Support Yes (2.2)\r\n◆ 體積(長x寬x高)：\r\n206 x 124 x 46 mm\r\n8.1 x 4.9 x 1.8 inch'),
(311, '顯示卡', '華碩ASUS Dual Radeon RX 6700 XT OC 12GB GDDR6顯示卡', 'item_311.jpg', 23090, 0.9, 0, '華碩ASUS Dual Radeon RX 6700 XT OC 12GB GDDR6顯示卡', '◆ 顯示晶片 ：AMD Radeon RX 6700 XT\r\n◆ 記憶體 ：12GB GDDR6\r\n◆ 多螢幕支援 : 4\r\n◆ 電源接口：1 x 6-pin, 1 x 8-pin\r\n◆ 輸 出 ：\r\nYes x 1 (Native HDMI 2.1)\r\nYes x 3 (Native DisplayPort 1.4a)\r\nHDCP Support Yes (2.3)\r\n◆ 顯卡長度：\r\n295 x 139 x 55 mm\r\n11.61 x 5.47 x 2.17 inches'),
(312, '顯示卡', '微星 GeForce RTX 3050 VENTUS 2X 8G OC 顯示卡+H510M-A PRO', 'item_312.jpg', 9990, 0.9, 0, '微星 GeForce RTX 3050 VENTUS 2X 8G OC 顯示卡+H510M-A PRO', '◆ 顯示晶片 ：NVIDIA® GeForce® RTX 3050\r\n◆ 記憶體 ：8GB GDDR6\r\n◆ Cores ：2560 Units\r\n◆ 記憶體介面：128-bit\r\n◆ 輸出端子 ：3x DP / HDMI\r\n◆ 電源連結器：8-pin x1\r\n◆ 體積(長x寬x高)：235 x 124 x 42 mm'),
(313, '顯示卡', '微星 GeForce RTX 3070 GAMING Z TRIO 8G LHR 顯示卡', 'item_313.jpg', 22000, 0.9, 0, '微星 GeForce RTX 3070 GAMING Z TRIO 8G LHR 顯示卡', '◆ 顯示晶片 ：NVIDIA GeForce RTX 3070\r\n◆ 核心時脈 ：Boost 1845 MHz\r\n◆ 記憶體介面：256-bit\r\n◆ 輸出端子 ：3x DP / HDMI\r\n◆ 電源連結器：2x 8-pin\r\n◆ 體積(長x寬x高)： 323 x 140 x 56mm'),
(314, '顯示卡', '微星 GeForce RTX 3090 GAMING X TRIO 24G 顯示卡', 'item_314.jpg', 58000, 0.9, 0, '微星 GeForce RTX 3090 GAMING X TRIO 24G 顯示卡', '◆ 顯示晶片 ：NVIDIA® GeForce® RTX 3090\r\n◆ 記憶體 ：24GB GDDR6X\r\n◆ Cores ：TBD\r\n◆ 記憶體介面：384-bit\r\n◆ 輸出端子 ：3x DP / HDMI\r\n◆ 電源連結器：8-pin x3\r\n◆ 體積(長x寬x高)：335 x 140 x 56 mm'),
(315, '顯示卡', '微星 Radeon RX 6500 XT MECH 2X 4G OC', 'item_315.jpg', 6590, 0.9, 0, '微星 Radeon RX 6500 XT MECH 2X 4G OC', '◆ 顯示晶片 ：AMD Radeon™ RX 6500 XT\r\n◆ 記憶體 ：4GB GDDR6\r\n◆ 核心時脈：TBD\r\n◆ 電源接口：6-pin x 1\r\n◆ 輸出端子 ：1x DP / 1x HDMI\r\n◆ 顯卡尺寸：172 x 112 x 42 mm'),
(316, '顯示卡', '微星 Radeon RX 6600 MECH 2X 8G 顯示卡', 'item_316.jpg', 12000, 0.9, 0, '微星 Radeon RX 6600 MECH 2X 8G 顯示卡', '◆ 顯示晶片 ：AMD Radeon™ RX 6600\r\n◆ 記憶體 ：8GB GDDR6\r\n◆ 核心時脈：Boost: Up to 2491 MHz\r\nGame: Up to 2044 MHz\r\n◆ 電源接口：8-pin x 1\r\n◆ 輸出端子 ：3x DP / 1x HDMI\r\n◆ 顯卡尺寸：235 x 125 x 46 mm'),
(317, '顯示卡', '微星 Radeon RX 6800 XT GAMING Z TRIO 16G 顯示卡', 'item_317.jpg', 34000, 0.9, 0, '微星 Radeon RX 6800 XT GAMING Z TRIO 16G 顯示卡', '◆ 顯示晶片 ：AMD Radeon RX 6800 XT\r\n◆ 記憶體 ：GDDR6 16GB\r\n◆ 核心時脈：Up to 2310 Mhz\r\n◆ 電源接口：3 x 8pin\r\n◆ 輸出端子 ：3 x DP / 1x HDMI\r\n◆ 顯卡長度：324 x 141 x 55 mm'),
(318, '顯示卡', '微星MSI RTX 2060 VENTUS 12G OC 顯示卡', 'item_318.jpg', 11990, 0.9, 0, '', '● Core/Memory\r\n核心/記憶體\r\n1680 MHz / 14 Gbps\r\n12GB GDDR6\r\nDisplayPort x 3(v1.4a)\r\nHDMI x 1(Supports 4K@60Hz as specified in HDMI 2.0b)\r\n\r\n● TORX Fan 2.0\r\n獨家引流扇葉: 特殊弧度與扇葉寬幅設計可引入更多的氣流。\r\n傳統扇葉: 提供穩定的氣流至下方散熱鰭片。\r\n\r\n● 簡單好用的微星Afterburner超頻軟體\r\nOC Scanner: 自動找到最高且穩定的超頻功能\r\nKombustor：支援最新的 DirectX 版本\r\nPredator：遊戲內影片錄製\r\n\r\n● NVIDIA G-SYNC™ and HDR\r\n提供流暢、無延遲的遊戲體驗，畫面更新率高達240 Hz，加上HDR等等。是電競遊戲玩家的首選武器。\r\n\r\n● GeForce RTX™ VR\r\nNVIDIA 獨特的功能確保您獲得顯卡性能、影像品質和低延遲需求，以確保您的VR體驗無與倫比。');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--
-- 建立時間： 2022-06-11 19:23:41
--

CREATE TABLE `member` (
  `member_id` int(5) NOT NULL,
  `member_level` int(2) NOT NULL,
  `member_account` varchar(20) NOT NULL,
  `member_ password` varchar(20) NOT NULL,
  `member_name` varchar(10) NOT NULL,
  `member_sex` int(5) NOT NULL,
  `member_birthday` date NOT NULL,
  `member_phone` varchar(20) NOT NULL,
  `member_home` varchar(30) NOT NULL,
  `member_email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`member_id`, `member_level`, `member_account`, `member_ password`, `member_name`, `member_sex`, `member_birthday`, `member_phone`, `member_home`, `member_email`) VALUES
(1, 2, 'member', 'member123456', '測試帳號', 1, '2022-01-01', '047232105', '50074彰化市師大路二號工學院EB211電腦教室', 'bob@cc.ncue.edu.tw'),
(2, 9, 'admin', 'admin123456', '管理帳號', 1, '2020-06-01', '047232105', '50007彰化市進德路一號', 'bob@cc.ncue.edu.tw'),
(3, 2, 'member2', 'member123456', '測試帳號', 1, '2022-01-01', '047232105', '50074彰化市師大路二號工學院EB211電腦教室', 'bob@cc.ncue.edu.tw'),
(4, 9, 'admin3', 'admin123456', '管理員3', 0, '0000-00-00', '', '', 'admin3@gm.ncue.edu.tw');

-- --------------------------------------------------------

--
-- 資料表結構 `order_content`
--
-- 建立時間： 2022-06-11 19:23:41
--

CREATE TABLE `order_content` (
  `number` int(11) NOT NULL,
  `order_num` varchar(15) NOT NULL,
  `item_id` int(5) NOT NULL,
  `item_ amount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `order_content`
--

INSERT INTO `order_content` (`number`, `order_num`, `item_id`, `item_ amount`) VALUES
(1, '11105311722', 101, 3),
(2, '11105311722', 203, 1),
(5, '11105311722', 203, 10),
(6, '11105311724', 203, 10),
(12, '20220607131357', 103, 1),
(13, '20220607131357', 104, 106),
(21, '20220607161451', 101, 1),
(22, '20220607183712', 102, 1),
(23, '20220607183729', 102, 1),
(24, '20220607183729', 103, 1),
(25, '20220607183729', 104, 5),
(26, '20220608164512', 102, 1),
(27, '20220608164512', 103, 1),
(28, '20220608164512', 108, 1),
(29, '20220608164512', 109, 1),
(34, '20220608180737', 102, 1),
(35, '20220608173544', 103, 1),
(36, '20220608173544', 105, 1),
(37, '20220608173544', 104, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `order_inf`
--
-- 建立時間： 2022-06-11 19:23:41
--

CREATE TABLE `order_inf` (
  `number` int(11) NOT NULL,
  `member_id` varchar(20) NOT NULL,
  `order_num` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `order_state` int(11) NOT NULL,
  `receiver_name` varchar(15) NOT NULL,
  `receiver_address` varchar(50) NOT NULL,
  `receiver_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='order_inf';

--
-- 傾印資料表的資料 `order_inf`
--

INSERT INTO `order_inf` (`number`, `member_id`, `order_num`, `order_date`, `order_time`, `order_state`, `receiver_name`, `receiver_address`, `receiver_phone`) VALUES
(1, '1', '11105311722', '2022-05-31', '00:00:00', 1, '', '', ''),
(2, '1', '11105311724', '2022-05-31', '00:00:00', -7, '', '', ''),
(3, '2', '20220607131357', '2022-06-07', '13:13:57', 5, '', '', ''),
(8, '2', '20220607161451', '2022-06-07', '16:14:51', 1, '', '', ''),
(10, '2', '20220607183712', '2022-06-07', '18:37:12', 1, '', '', ''),
(11, '2', '20220607183729', '2022-06-07', '18:37:29', 1, '', '', ''),
(12, '2', '20220608164512', '2022-06-08', '16:45:12', 1, '', '', ''),
(13, '2', '20220608172333', '2022-06-08', '17:23:33', 0, '', '', ''),
(14, '2', '20220608172347', '2022-06-08', '17:23:47', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(15, '2', '20220608172539', '2022-06-08', '17:25:39', 3, '管理帳號', '50007彰化市進德路一號', '047232105'),
(16, '2', '20220608172837', '2022-06-08', '17:28:37', 5, '管理帳號', '50007彰化市進德路一號', '047232105'),
(17, '2', '20220608173048', '2022-06-08', '17:30:48', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(18, '2', '20220608173207', '2022-06-08', '17:32:07', 3, '管理帳號', '50007彰化市進德路一號', '047232105'),
(22, '2', '20220608173544', '2022-06-08', '17:35:44', 0, '管理帳號', '50007彰化市進德路一號', '047232105'),
(23, '2', '20220608173839', '2022-06-08', '17:38:39', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(24, '2', '20220608173917', '2022-06-08', '17:39:17', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(25, '2', '20220608174402', '2022-06-08', '17:44:02', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(26, '2', '20220608174534', '2022-06-08', '17:45:34', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(27, '2', '20220608174623', '2022-06-08', '17:46:23', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(28, '2', '20220608175100', '2022-06-08', '17:51:00', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(29, '2', '20220608175121', '2022-06-08', '17:51:21', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(30, '2', '20220608175139', '2022-06-08', '17:51:39', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(31, '2', '20220608175232', '2022-06-08', '17:52:32', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(32, '2', '20220608175302', '2022-06-08', '17:53:02', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(33, '2', '20220608180732', '2022-06-08', '18:07:32', 1, '管理帳號', '50007彰化市進德路一號', '047232105'),
(34, '2', '20220608180737', '2022-06-08', '18:07:37', 5, '管理帳號', '50007彰化市進德路一號', '047232105');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`msn_id`);

--
-- 資料表索引 `index_image`
--
ALTER TABLE `index_image`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `item_list`
--
ALTER TABLE `item_list`
  ADD PRIMARY KEY (`item_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- 資料表索引 `order_content`
--
ALTER TABLE `order_content`
  ADD PRIMARY KEY (`number`);

--
-- 資料表索引 `order_inf`
--
ALTER TABLE `order_inf`
  ADD PRIMARY KEY (`number`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `forum`
--
ALTER TABLE `forum`
  MODIFY `msn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `index_image`
--
ALTER TABLE `index_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_content`
--
ALTER TABLE `order_content`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `order_inf`
--
ALTER TABLE `order_inf`
  MODIFY `number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
