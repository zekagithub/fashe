-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Hazırlanma Vaxtı: 31 Mar, 2019 saat 07:32
-- Server versiyası: 10.1.29-MariaDB
-- PHP Versiyası: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Verilənlər Bazası: `eticaret`
--

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `admin`
--

CREATE TABLE `admin` (
  `id` int(254) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `admin`
--

INSERT INTO `admin` (`id`, `name`, `mail`, `password`) VALUES
(3, 'zeka', 'zeka@mail.ru', '123456');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `category`
--

CREATE TABLE `category` (
  `id` int(255) NOT NULL,
  `topcategory` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `category`
--

INSERT INTO `category` (`id`, `topcategory`, `name`, `slug`) VALUES
(9, 1, 'salvarlar', 'salvarlar'),
(14, 1, 'T-shirt', 't-shirt'),
(15, 1, 'kurtka', 'kurtka'),
(16, 2, 'mayka', 'mayka'),
(17, 3, 'koynek', 'koynek'),
(18, 3, 'salvarlar.', 'salvarlar'),
(19, 1, 'kepka', 'kepka'),
(20, 1, 'telefon', 'telefon'),
(21, 2, 'electron', 'electron'),
(22, 3, 'mayka', 'mayka'),
(23, 2, 'parfumeriya', 'parfumeriya'),
(24, 2, 'paltarlar', 'paltarlar'),
(25, 2, 'salvarlar', 'salvarlar'),
(26, 2, 'ayaqqabilar', 'ayaqqabilar'),
(27, 2, 'koynekler', 'koynekler'),
(28, 2, 'ayaqqabilar', 'ayaqqabilar'),
(29, 3, 'salvarlar', 'salvarlar'),
(30, 3, 'ayaqqabilar', 'ayaqqabilar');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `config`
--

CREATE TABLE `config` (
  `id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(250) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `config`
--

INSERT INTO `config` (`id`, `title`, `logo`, `icon`, `facebook`, `instagram`, `twitter`, `youtube`, `info`, `mail`) VALUES
(7, 'E-ticaret', 'assets/upload/config/1545950_767794183259447_6514673887214375278_n.jpg', 'assets/upload/config/10420349_931565950243669_1339381259394512864_n.jpg', 'zdgbupdatemeytg', 'xfbupdateme', 'xfbupdateme', 'xfbupdatemeddvsd', 'Bakinin en boyuk e-ticaret magazasi', 'zekamemmedov18@gmail.com');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `master` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `images`
--

INSERT INTO `images` (`id`, `product`, `path`, `master`) VALUES
(72, 82, 'assets/upload/products/tisort82.png', 0),
(74, 82, 'assets/upload/products/tisort82.jpg', 0),
(75, 83, 'assets/upload/products/idman-turksiki83.png', 0),
(76, 84, 'assets/upload/products/cins-ssalvar84.jpg', 1),
(77, 82, 'assets/upload/products/tisort821.jpg', 1),
(78, 85, 'assets/upload/products/nike-kepka85.jpg', 1),
(79, 85, 'assets/upload/products/nike-kepka851.jpg', 0),
(80, 85, 'assets/upload/products/nike-kepka852.jpg', 0),
(81, 86, 'assets/upload/products/smasunq86.jpg', 0),
(82, 86, 'assets/upload/products/smasunq861.jpg', 1),
(83, 88, 'assets/upload/products/zara-maykasi88.jpg', 1),
(84, 89, 'assets/upload/products/maykaaa89.jpg', 0);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `options`
--

CREATE TABLE `options` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `options`
--

INSERT INTO `options` (`id`, `name`, `slug`) VALUES
(24, 'beden olculeri', 'beden olculeri'),
(25, 'rengler', 'rengler');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `category` int(25) NOT NULL,
  `subcategory` int(25) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `price` double DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `tag` varchar(255) NOT NULL,
  `seo` varchar(254) NOT NULL,
  `complete` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `qrcode` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `products`
--

INSERT INTO `products` (`id`, `category`, `subcategory`, `title`, `description`, `price`, `discount`, `tag`, `seo`, `complete`, `active`, `qrcode`, `date`) VALUES
(82, 2, 14, 'tisort', ' nm', 40, 15, ' m.', 'tisort', 1, 1, 'assets/upload/qrcode/mehsul82.png', '2019-01-02 02:34:40'),
(83, 2, 17, 'idman turksiki', 'edf', 25, 15, 'ed', 'idman-turksiki', 1, 0, 'assets/upload/qrcode/mehsul83.png', '2019-01-06 13:06:12'),
(84, 3, 9, 'cins ssalvar', 'wdwdwd', 25, 15, 'wwww', 'cins-ssalvar', 1, 1, 'assets/upload/qrcode/mehsul84.png', '2019-01-06 13:54:44'),
(85, 1, 19, 'nike kepka', 'yeni kepka cox qeseyndor', 15, 11, 'yeni kepka', 'nike-kepka', 1, 1, 'assets/upload/qrcode/mehsul85.png', '2019-01-06 18:41:45'),
(86, 1, 20, 'smasunq', 'dfdv', 25, 15, 'dcd', 'smasunq', 1, 1, 'assets/upload/qrcode/mehsul86.png', '2019-01-13 23:39:08'),
(87, 1, 9, '', '', 0, 0, '', '', 0, 0, 'assets/upload/qrcode/mehsul87.png', '2019-01-19 01:11:31'),
(88, 3, 16, 'zara maykasi', 'v ', 25, 15, 'ccv ', 'zara-maykasi', 1, 1, 'assets/upload/qrcode/mehsul88.png', '2019-01-24 01:40:27'),
(89, 3, 22, 'maykaaa', 'cvv', 12, 11, 'vb', 'maykaaa', 1, 0, 'assets/upload/qrcode/mehsul89.png', '2019-01-24 01:42:57'),
(90, 2, 14, 'Law Firm | Huquq Şirkəti', 'nb', 25, 10, 'kkj', 'law-firm-huquq-sirk-ti', 0, 0, 'assets/upload/qrcode/mehsul90.png', '2019-02-03 21:07:12'),
(91, 1, 9, '', '', 0, 0, '', '', 0, 0, 'assets/upload/qrcode/mehsul91.png', '2019-02-04 00:19:57'),
(92, 1, 9, '', '', 0, 0, '', '', 0, 0, 'assets/upload/qrcode/mehsul92.png', '2019-02-04 00:26:08'),
(93, 1, 9, '', '', 0, 0, '', '', 0, 0, 'assets/upload/qrcode/mehsul93.png', '2019-02-04 00:27:25'),
(94, 1, 9, '', '', 0, 0, '', '', 0, 0, 'assets/upload/qrcode/mehsul94.png', '2019-02-15 16:45:34');

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `stocks`
--

CREATE TABLE `stocks` (
  `id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `suboption1` int(255) NOT NULL,
  `suboption2` int(255) DEFAULT NULL,
  `stock` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `stocks`
--

INSERT INTO `stocks` (`id`, `product`, `suboption1`, `suboption2`, `stock`) VALUES
(46, 82, 59, NULL, 3),
(47, 83, 59, 57, 3),
(48, 84, 61, 57, 3),
(49, 84, 61, 56, 1),
(50, 84, 60, 56, 1),
(51, 85, 56, NULL, 1),
(52, 85, 57, NULL, 1),
(53, 85, 58, NULL, 1),
(54, 86, 57, NULL, 3),
(55, 86, 56, NULL, 2),
(56, 86, 58, NULL, 3),
(57, 85, 58, NULL, 1),
(58, 88, 60, 56, 3),
(59, 88, 59, 57, 5),
(60, 89, 60, NULL, 1),
(61, 90, 59, NULL, 1);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `stocktype`
--

CREATE TABLE `stocktype` (
  `id` int(255) NOT NULL,
  `product` int(255) NOT NULL,
  `option1` int(255) NOT NULL,
  `option2` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `stocktype`
--

INSERT INTO `stocktype` (`id`, `product`, `option1`, `option2`) VALUES
(51, 82, 24, NULL),
(52, 83, 24, 25),
(53, 84, 24, 25),
(54, 85, 25, NULL),
(55, 86, 25, NULL),
(56, 88, 24, 25),
(57, 89, 24, NULL),
(58, 90, 24, NULL);

-- --------------------------------------------------------

--
-- Cədvəl üçün cədvəl strukturu `suboptions`
--

CREATE TABLE `suboptions` (
  `id` int(255) NOT NULL,
  `option_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Sxemi çıxarılan cedvel `suboptions`
--

INSERT INTO `suboptions` (`id`, `option_id`, `name`) VALUES
(56, 25, 'qara'),
(57, 25, 'sari'),
(58, 25, 'boz'),
(59, 24, 'small'),
(60, 24, 'medium'),
(61, 24, 'large');

--
-- Indexes for dumped tables
--

--
-- Cədvəl üçün indekslər `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `stocktype`
--
ALTER TABLE `stocktype`
  ADD PRIMARY KEY (`id`);

--
-- Cədvəl üçün indekslər `suboptions`
--
ALTER TABLE `suboptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- Cədvəl üçün AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(254) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Cədvəl üçün AUTO_INCREMENT `category`
--
ALTER TABLE `category`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Cədvəl üçün AUTO_INCREMENT `config`
--
ALTER TABLE `config`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Cədvəl üçün AUTO_INCREMENT `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Cədvəl üçün AUTO_INCREMENT `options`
--
ALTER TABLE `options`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Cədvəl üçün AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Cədvəl üçün AUTO_INCREMENT `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Cədvəl üçün AUTO_INCREMENT `stocktype`
--
ALTER TABLE `stocktype`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Cədvəl üçün AUTO_INCREMENT `suboptions`
--
ALTER TABLE `suboptions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
