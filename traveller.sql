-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 6 月 10 日 15:20
-- サーバのバージョン： 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Homework`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `traveller`
--

CREATE TABLE `traveller` (
  `id` int(3) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(1) CHARACTER SET utf8 NOT NULL,
  `age` int(3) NOT NULL,
  `bloodType` varchar(2) CHARACTER SET utf8 NOT NULL,
  `profession` varchar(30) CHARACTER SET utf8 NOT NULL,
  `birthplace` varchar(10) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `traveller`
--

INSERT INTO `traveller` (`id`, `name`, `gender`, `age`, `bloodType`, `profession`, `birthplace`, `comment`) VALUES
(1, 'ウェディング', '男', 23, 'A', 'ウェディングプランナー', '兵庫県', '結婚相手を見つけてマイウェディングを！'),
(2, 'ハト胸', '男', 27, 'B', 'スポーツ関連営業', '大阪府', 'アウトドア大好きのムードメーカー'),
(3, 'たか', '男', 25, 'O', '公務員', '福井県', '世のため人のため！2週間限定で参加'),
(4, '裕ちゃん', '男', 27, 'A', 'どら焼き職人', '長野県', '彼女いない歴　10年'),
(5, 'ゆめちん', '女', 23, 'O', '元アパレル店員', '三重県', '2年半恋をしていない元ミス松阪'),
(6, 'でっぱりん', '女', 21, 'O', '就活中', '福岡県', '博多弁バリバリの元気娘'),
(7, 'アスカ', '女', 23, 'O', '飲食店アルバイト', '鹿児島県', 'フィリピン人とのハーフでモデルの卵'),
(8, 'シャイボーイ', '男', 28, 'O', 'ラジオクリエイター', '神奈川県', '夢はラジオスター！世にも奇妙な男'),
(9, 'かすが', '女', 26, 'A', '受付嬢', '京都府', '身長170cmの京都女どすえ'),
(10, 'あきら', '男', 25, 'AB', '美大生', '東京都', 'マダガスカル人とハーフの美大生'),
(11, 'かにゃ', '女', 25, 'O', '元美容部員', '千葉県', 'ここ4年間彼氏なし'),
(12, 'トム', '男', 22, 'A', 'パティシエ見習い', '長野県', '中国系クォーター'),
(13, 'ユウちゃん', '女', 21, 'A', 'ペットショップ店員', '岐阜県', '散歩が趣味のペットショップ店員'),
(14, '社長', '男', 27, 'A', 'コンサルタント', '広島県', '社長就任予定のバブル男');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `traveller`
--
ALTER TABLE `traveller`
  ADD PRIMARY KEY (`id`,`name`,`gender`,`age`,`bloodType`,`profession`,`birthplace`,`comment`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `traveller`
--
ALTER TABLE `traveller`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
