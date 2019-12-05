-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost:8889
-- 生成日時: 2019 年 12 月 05 日 08:08
-- サーバのバージョン： 5.7.26
-- PHP のバージョン: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_inquiry`
--

CREATE TABLE `dat_inquiry` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `inquiry` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_member`
--

CREATE TABLE `dat_member` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(32) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postal1` varchar(3) NOT NULL,
  `postal2` varchar(4) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel1` varchar(5) NOT NULL,
  `tel2` varchar(5) NOT NULL,
  `tel3` varchar(5) NOT NULL,
  `danjo` int(11) NOT NULL,
  `born` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales`
--

CREATE TABLE `dat_sales` (
  `code` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `code_member` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `postal1` varchar(3) NOT NULL,
  `postal2` varchar(4) NOT NULL,
  `address` varchar(50) NOT NULL,
  `tel1` varchar(5) NOT NULL,
  `tel2` varchar(5) NOT NULL,
  `tel3` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dat_sales`
--

INSERT INTO `dat_sales` (`code`, `date`, `code_member`, `name`, `email`, `postal1`, `postal2`, `address`, `tel1`, `tel2`, `tel3`) VALUES
(1, '2019-10-06 02:37:31', 0, '山田　太郎', 'kkkk@yahoo.co.jp', '123', '1234', '岩手県盛岡市', '123', '1234', '1234'),
(2, '2019-10-06 03:07:15', 0, '牛タン食いたい', 'gyuutan@yahoo.co.jp', '222', '3333', '宮城県仙台市', '222', '333', '444'),
(3, '2019-10-06 03:12:28', 0, '埼玉　一郎', 'saitama@yahoo.co.jp', '123', '1234', '埼玉県さいたま市', '111', '2222', '5555'),
(4, '2019-10-06 03:15:06', 0, '納豆久美子', 'nattou@yahoo.co.jp', '094', '1234', '納豆県ネギ市', '090', '2223', '3333'),
(5, '2019-10-06 03:34:09', 0, '伊藤おく', 'yayaya@yahoo.co.jp', '098', '9876', '宮崎県宮崎市', '090', '2222', '2222'),
(6, '2019-10-06 03:41:20', 0, 'じゃがいも', 'imoimo@yahoo.co.jp', '123', '1234', '宮城県宮市', '123', '222', '333'),
(7, '2019-10-06 03:45:34', 0, 'なす', 'tatata@tatta', '124', '2345', 'nanananasusususu', '123', '123', '123'),
(8, '2019-10-06 03:56:29', 0, '佐藤佐藤男', 'tatatan@yahoo.co.jp', '000', '2222', '岩手県岩手市', '222', '2222', '4444'),
(9, '2019-10-06 03:59:42', 0, '伊藤伊藤男', 'mamamakokoko@yahoo.co.jp', '122', '2233', '岩手県むす村', '090', '0987', '3456'),
(10, '2019-10-08 04:39:45', 0, '伊藤太郎', 'itoutyan@yahoo.co.jp', '020', '1192', '東京都田舎市', '232', '1234', '3141'),
(18, '2019-10-08 04:57:01', 0, '伊藤', 'uuuu@yyy.ooo.o0', '111', '1111', '11111', '1111', '1111', '1111'),
(19, '2019-10-08 05:57:31', 0, '伊藤さま', 'iyou@yooo.vo.kp', '123', '2222', 'いなか', '111', '1111', '1111'),
(20, '2019-10-08 07:35:05', 0, '鈴木', 'sasasa@hoo.jp', '123', '2121', 'いいい', '123', '1222', '2222'),
(21, '2019-10-08 09:05:45', 0, 'まいこ', 'wawawa@yahoo.ci.jp', '122', '3344', 'kakaka', '222', '3333', '4444'),
(22, '2019-10-08 09:15:39', 0, 'まいこ', 'wawawa@yahoo.ci.jp', '122', '3344', 'kakaka', '222', '3333', '4444'),
(23, '2019-10-08 09:36:20', 0, 'ぼん', 'wawawa@yahoo.ci.jp', '122', '3344', 'kakaka', '222', '3333', '4444'),
(24, '2019-10-08 09:42:37', 1, 'ひま', 'wawawa@yahoo.ci.jp', '122', '3344', 'kakaka', '222', '3333', '4444'),
(25, '2019-10-08 13:11:00', 2, 'さんた', 'wawaww@yahoo.ci.jp', '122', '3322', 'kakaka', '222', '3322', '4444'),
(26, '2019-10-08 13:19:47', 3, 'さんた', 'wawaww@yahoo.ci.jp', '122', '3322', 'kakaka', '222', '3322', '4444'),
(27, '2019-10-08 14:17:09', 2, 'さんた', 'wawaww@yahoo.ci.jp', '122', '3322', 'kakaka', '222', '3322', '4444'),
(28, '2019-11-07 13:45:49', 4, 'まいおりー', '1111@1111.jp', '111', '3333', '岩手県岩手市', '111', '1111', '1111'),
(29, '2019-11-11 07:52:46', 4, 'まいおりー', '1111@1111.jp', '111', '3333', '岩手県岩手市', '111', '1111', '1111'),
(30, '2019-11-11 07:53:46', 4, 'まいおりー', '1111@1111.jp', '111', '3333', '岩手県岩手市', '111', '1111', '1111'),
(31, '2019-11-12 03:22:37', 4, 'まいおりー', '1111@1111.jp', '111', '3333', '岩手県岩手市', '111', '1111', '1111'),
(32, '2019-11-12 03:23:35', 0, 'みお', '1212@1212.jp', '111', '2222', 'まおまおまお', '222', '2222', '2222'),
(33, '2019-11-12 03:24:31', 0, 'ssss', 'ssssss@111', '111', '1111', '1111', '1111', '111', '1111'),
(34, '2019-11-13 02:21:07', 0, 'まいこ', '2222@2222', '111', '1111', '22222', '333', '3333', '3333'),
(35, '2019-11-13 02:36:48', 4, 'まいおりー', '1111@1111.jp', '111', '3333', '岩手県岩手市', '111', '1111', '1111'),
(36, '2019-11-13 03:28:22', 0, 'papapa', '2222@2222.ko', '111', '1111', 'fdfdfdfd', '111', '1111', '1111'),
(37, '2019-11-13 03:49:59', 0, 'ssss', 'qqqq@qqqqq.qq', '111', '1111', 'kokoko', '000', '1111', '2222'),
(38, '2019-11-13 03:50:56', 0, 'ssss', 'qqqq@qqqqq.qq', '111', '1111', 'kokoko', '000', '1111', '2222');

-- --------------------------------------------------------

--
-- テーブルの構造 `dat_sales_product`
--

CREATE TABLE `dat_sales_product` (
  `code` int(11) NOT NULL,
  `code_sales` int(11) NOT NULL,
  `code_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `dat_sales_product`
--

INSERT INTO `dat_sales_product` (`code`, `code_sales`, `code_product`, `price`, `quantity`) VALUES
(1, 1, 1, 100, 3),
(2, 1, 11, 100, 1),
(3, 2, 11, 100, 2),
(4, 2, 12, 120, 2),
(5, 7, 11, 100, 1),
(6, 8, 1, 100, 3),
(7, 20, 1, 100, 1),
(8, 21, 1, 100, 1),
(9, 22, 1, 100, 1),
(10, 23, 1, 100, 1),
(11, 24, 1, 100, 1),
(12, 25, 1, 100, 1),
(13, 26, 1, 100, 1),
(14, 27, 14, 150, 1),
(15, 28, 1, 100, 1),
(16, 29, 1, 100, 1),
(17, 29, 6, 90, 1),
(18, 30, 1, 100, 1),
(19, 30, 6, 90, 1),
(20, 31, 15, 2000, 1),
(21, 31, 31, 30000, 4),
(22, 31, 29, 15000, 1),
(23, 32, 6, 90, 1),
(24, 32, 1, 100, 1),
(25, 33, 6, 90, 1),
(26, 33, 1, 100, 1),
(27, 34, 17, 2500, 2),
(28, 34, 11, 100, 1),
(29, 35, 11, 100, 5),
(30, 36, 11, 100, 5),
(31, 36, 1, 100, 7),
(32, 37, 11, 100, 1),
(33, 38, 11, 100, 1);

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_product`
--

CREATE TABLE `mst_product` (
  `code` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `gazou` varchar(30) NOT NULL,
  `kubun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `mst_product`
--

INSERT INTO `mst_product` (`code`, `name`, `price`, `gazou`, `kubun`) VALUES
(1, 'にんじん', 100, 'ninjin.jpg', 'yasai'),
(6, 'じゃがいも', 90, 'jaga.jpg', 'yasai'),
(11, 'なす', 100, 'nasu.jpg', 'yasai'),
(12, 'きゅうり', 120, 'kyuri.jpg', 'yasai'),
(14, 'かぼちゃ', 150, 'kabocha.jpg', 'yasai'),
(15, '前沢牛', 2000, 'yjimage.jpg', 'niku'),
(16, 'マグロ食べ比べセット', 1500, 'maguro.jpg', 'sakana'),
(17, '特選牛肉　お寿司セット', 2500, 'nikuniku.jpg', 'niku'),
(18, '特選　トラフグてっさ', 2500, 'fugu.jpg', 'sakana'),
(20, 'よく落ちる洗剤セットSP', 1500, 'よく落ちる洗剤セット.jpg', 'nitiyou'),
(21, '特選　PS4', 39800, 'PS4.png', 'other'),
(22, '数の子', 650, 'kazunoko.jpg', 'sakana'),
(23, 'かわいい猫猫写真集', 1500000, 'nekoneko.jpg', 'other'),
(24, '焼売', 1000, 'syuumai.jpg', 'niku'),
(25, 'ねこトイレ', 100, 'nekotoire.jpg', 'other'),
(26, '特選　明太子', 1500, 'mentaiko.jpg', 'sakana'),
(27, '牛ステーキ　ブロック', 3500, 'nikuburokku.jpg', 'niku'),
(28, 'よく吸う掃除機', 20000, 'soujiki.jpg', 'other'),
(29, 'アイロン　おまけ付き', 15000, 'aironn.jpg', 'nitiyou'),
(30, 'スルメイカ', 300, 'ika.jpg', 'sakana'),
(31, '任天堂 スイッチ', 30000, 'nintendo.jpg', 'other'),
(32, 'ぎょうざ', 500, 'gyouza.jpg', 'niku'),
(33, '犬の首輪', 150, 'kubiwa.jpg', 'other'),
(34, '肉弁当', 1000, 'nikubento.jpg', 'niku'),
(35, '冷凍 ZIP まとめ', 3500, 'reitou.jpg', 'nitiyou'),
(36, '電動ドライバー', 3000, 'dendora.jpg', 'nitiyou'),
(37, 'サバ', 600, 'saba.jpg', 'sakana'),
(38, '特選　ソーセージ', 400, 'so-se-ji.jpg', 'niku'),
(39, '和牛　焼肉セット', 3000, 'yakiniku.jpg', 'niku'),
(40, '中性洗剤　セット', 1500, 'tyuuseisenzai.jpg', 'nitiyou'),
(41, 'マグロ　セット', 8000, 'magurosetto.jpg', 'sakana'),
(42, 'セガサターン', 28000, 'sega.jpg', 'other');

-- --------------------------------------------------------

--
-- テーブルの構造 `mst_staff`
--

CREATE TABLE `mst_staff` (
  `code` int(11) NOT NULL,
  `name` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `mst_staff`
--

INSERT INTO `mst_staff` (`code`, `name`, `password`) VALUES
(11, 'ろくまる', '1234567890'),
(12, 'ぼん', 'e807f1fcf82d132f9bb018ca6738a19f');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `dat_inquiry`
--
ALTER TABLE `dat_inquiry`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `dat_member`
--
ALTER TABLE `dat_member`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `dat_sales`
--
ALTER TABLE `dat_sales`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `mst_product`
--
ALTER TABLE `mst_product`
  ADD PRIMARY KEY (`code`);

--
-- テーブルのインデックス `mst_staff`
--
ALTER TABLE `mst_staff`
  ADD PRIMARY KEY (`code`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `dat_inquiry`
--
ALTER TABLE `dat_inquiry`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `dat_member`
--
ALTER TABLE `dat_member`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `dat_sales`
--
ALTER TABLE `dat_sales`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- テーブルのAUTO_INCREMENT `dat_sales_product`
--
ALTER TABLE `dat_sales_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- テーブルのAUTO_INCREMENT `mst_product`
--
ALTER TABLE `mst_product`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- テーブルのAUTO_INCREMENT `mst_staff`
--
ALTER TABLE `mst_staff`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
