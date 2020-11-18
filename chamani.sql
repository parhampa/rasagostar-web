-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 03:17 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chamani`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `username` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `pass` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `active` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`username`, `pass`, `name`, `family`, `tel`, `email`, `active`) VALUES
('admin', '44332211', 'admin', 'admin', '9155554433', 'email@web.com', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `atn`
--

CREATE TABLE `atn` (
  `id` int(11) NOT NULL,
  `mob` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `token` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `atn`
--

INSERT INTO `atn` (`id`, `mob`, `token`) VALUES
(1, '09357732296', '1234'),
(3, '123123', '602975'),
(4, '09357732296', '140448'),
(5, '09357732296', '169385'),
(6, '09357732296', '660967'),
(7, '09357732296', '853875'),
(8, '09357732296', '602130'),
(9, '09357732296', '946687'),
(10, '09357732296', '853606'),
(11, '09357732296', '398308'),
(12, '09357732296', '675707');

-- --------------------------------------------------------

--
-- Table structure for table `dastmozd`
--

CREATE TABLE `dastmozd` (
  `id` int(11) NOT NULL,
  `file_plc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `dastmozd`
--

INSERT INTO `dastmozd` (`id`, `file_plc`) VALUES
(1, '../uploads/2238dca3e8143caf4241ff7c1b660fa2book-buy-help.pdf'),
(2, '../uploads/fffec27e63869505504c3d1690dd27b82019-10-04_135647.jpg'),
(3, '../uploads/0174cc80fd4f8232c2b5c2f6751493be2019-10-04_135647.jpg'),
(4, '../uploads/ba524edea9d23ba241ce03dbd0a1ffc42019-10-04_135647.jpg'),
(5, '../uploads/df463a190a1c3193cddff969ed67aca02019-10-04_135647.jpg'),
(6, '../uploads/82f0797657b46efeacb1fcf08c6c6c8a2019-10-04_135647.jpg'),
(7, '../uploads/185971ee8564e497d1787191b5ce7f2877384-Article Text - PDF Version-329896-1-10-20190915.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `moshavere`
--

CREATE TABLE `moshavere` (
  `id` int(11) NOT NULL,
  `usermob` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `txt` text COLLATE utf8_persian_ci NOT NULL,
  `ans_txt` text COLLATE utf8_persian_ci DEFAULT NULL,
  `vaz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `moshavere`
--

INSERT INTO `moshavere` (`id`, `usermob`, `txt`, `ans_txt`, `vaz`) VALUES
(1, '21312', 'یشسی', 'شسیشسی', 0);

-- --------------------------------------------------------

--
-- Table structure for table `msgtbl`
--

CREATE TABLE `msgtbl` (
  `id` int(11) NOT NULL,
  `mob` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `txt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `vaz` int(11) NOT NULL,
  `ty` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `msgtbl`
--

INSERT INTO `msgtbl` (`id`, `mob`, `txt`, `vaz`, `ty`) VALUES
(1, '09357732296', 'dfsdfdsfcvcxv', 1, 1),
(2, '09357732296', 'sadasd', 0, 0),
(3, '09357732296', 'sssss', 0, 0),
(4, '09357732296', 'asdsad', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `myfish`
--

CREATE TABLE `myfish` (
  `id` int(11) NOT NULL,
  `user` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci NOT NULL,
  `tarikh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `niro`
--

CREATE TABLE `niro` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `txt` text COLLATE utf8_persian_ci NOT NULL,
  `dastmozd` decimal(10,0) NOT NULL,
  `mazaya` text COLLATE utf8_persian_ci NOT NULL,
  `address` text COLLATE utf8_persian_ci NOT NULL,
  `usermob` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `vaz` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `niro`
--

INSERT INTO `niro` (`id`, `title`, `txt`, `dastmozd`, `mazaya`, `address`, `usermob`, `vaz`) VALUES
(1, 'sadsad', 'sdsfds', '0', '', 'sdfsdf', '324324', 0),
(2, 'asd', 'sdfsd', '1000', 'fgfdgd', 'dsfds', '23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `txt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `pic` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `videolink` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `title`, `txt`, `pic`, `videolink`) VALUES
(1, 1, 'vsdfds', 'این متن جهت تست می باشد.....', '../uploads/454734ae5c6484360825debebfdc5aefIMG_20190113_172735.jpg', 'https://aspb3.cdn.asset.aparat.com/aparat-video/3bc7195b78e3cb9cacd0c9711acea1b516654926-144p.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `post_cat`
--

CREATE TABLE `post_cat` (
  `id` int(11) NOT NULL,
  `title` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `post_cat`
--

INSERT INTO `post_cat` (`id`, `title`) VALUES
(1, 'مشاوره'),
(2, 'تبلیغات'),
(3, 'غیرممکن ها'),
(4, 'نوآوری');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `mob` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `req_type` int(11) NOT NULL,
  `txt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `vaz` int(11) NOT NULL DEFAULT 0,
  `req_price` decimal(10,0) NOT NULL DEFAULT 0,
  `file` text COLLATE utf8_persian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `mob`, `req_type`, `txt`, `vaz`, `req_price`, `file`) VALUES
(1, '09357732296', 1, 'sadds', 0, '100000', NULL),
(2, '09357732296', 1, 'zxckjnjas', 0, '0', NULL),
(3, '09357732296', 0, 'sdfsdfxcv', 0, '0', NULL),
(4, '09357732296', 0, 'sdfsdfxcv', 0, '0', '../uploads/ac9a5a9d2451ca90185c579497e5dca33522120352212003193124.png');

-- --------------------------------------------------------

--
-- Table structure for table `sabeghe_bime`
--

CREATE TABLE `sabeghe_bime` (
  `id` int(11) NOT NULL,
  `usermob` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `family` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `sh_sh` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `sal_b` int(11) NOT NULL,
  `mah_b` int(11) NOT NULL,
  `roz_b` int(11) NOT NULL,
  `sh_meli` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `mob` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `file` text COLLATE utf8_persian_ci DEFAULT NULL,
  `vaz` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `sabeghe_bime`
--

INSERT INTO `sabeghe_bime` (`id`, `usermob`, `name`, `family`, `sh_sh`, `sal_b`, `mah_b`, `roz_b`, `sh_meli`, `mob`, `file`, `vaz`) VALUES
(1, '213123', 'شسیشسی', 'شسیشسی', 'شسیشسی', 21321, 1, 1, 'شسیشسی', '132', NULL, 0),
(2, '09357732296', 'dgdfg', 'sdfdsf', 'sdfsd', 1373, 1, 1, 'cxvcxv', '9357732296', '../uploads/a605c0f7cf0178cfb2d0f5d4b40edc303522120352212003193124.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sharj`
--

CREATE TABLE `sharj` (
  `id` int(11) NOT NULL,
  `mobile` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `price` double NOT NULL,
  `txt` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `peygiri` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `vaz` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `sharj`
--

INSERT INTO `sharj` (`id`, `mobile`, `price`, `txt`, `peygiri`, `vaz`) VALUES
(1, '09357732296', 10000, 'شسیتاشسنیتشسی', '', 1),
(2, '09357732296', 22222, 'czxczxczxcxz', 'asdasdas', 1),
(3, '09357732296', 343234, 'dsdfdsfds', 'werefsd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vam`
--

CREATE TABLE `vam` (
  `id` int(11) NOT NULL,
  `usermob` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `title` varchar(500) COLLATE utf8_persian_ci NOT NULL,
  `ty` int(11) NOT NULL,
  `txt` text COLLATE utf8_persian_ci NOT NULL,
  `vaz` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `vam`
--

INSERT INTO `vam` (`id`, `usermob`, `title`, `ty`, `txt`, `vaz`) VALUES
(2, '32432', 'fffff', 0, 'dsfsdfd', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `atn`
--
ALTER TABLE `atn`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dastmozd`
--
ALTER TABLE `dastmozd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moshavere`
--
ALTER TABLE `moshavere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msgtbl`
--
ALTER TABLE `msgtbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myfish`
--
ALTER TABLE `myfish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `niro`
--
ALTER TABLE `niro`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_cat`
--
ALTER TABLE `post_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sabeghe_bime`
--
ALTER TABLE `sabeghe_bime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sharj`
--
ALTER TABLE `sharj`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vam`
--
ALTER TABLE `vam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atn`
--
ALTER TABLE `atn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dastmozd`
--
ALTER TABLE `dastmozd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `moshavere`
--
ALTER TABLE `moshavere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `msgtbl`
--
ALTER TABLE `msgtbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myfish`
--
ALTER TABLE `myfish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `niro`
--
ALTER TABLE `niro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_cat`
--
ALTER TABLE `post_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sabeghe_bime`
--
ALTER TABLE `sabeghe_bime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sharj`
--
ALTER TABLE `sharj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vam`
--
ALTER TABLE `vam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
