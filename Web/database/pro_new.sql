-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2023 at 09:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `status`) VALUES
('khanhag1', '46c9a651ec34e9118b64e72ae13b067f', 1),
('khanhag2', '46c9a651ec34e9118b64e72ae13b067f', 1),
('khanh11', '46c9a651ec34e9118b64e72ae13b067f', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `status`) VALUES
(1, 'Apple', 1),
(2, 'VSmart', 1),
(3, 'SamSung', 1),
(4, 'Oppo', 1),
(14, 'fake', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(25) NOT NULL,
  `phonenumber` varchar(12) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(25) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `username`, `password`, `fullname`, `phonenumber`, `address`, `email`, `status`) VALUES
(1, 'abc', '81dc9bdb52d04dc20036dbd8313ed055', 'VuNgocKhanh', '0123456789', 'abcd_efgh', 'a123@gmail.com', 1),
(2, 'khanh1', '46c9a651ec34e9118b64e72ae13b067f', 'khanh', '1234567890', 'no', 'no@gmail.com', 1),
(4, 'khanh', '202cb962ac59075b964b07152d234b70', 'Tương Đại', '13123123', '13', 'stormdragonempire@gmail.c', 1),
(5, 'khanh12', '46c9a651ec34e9118b64e72ae13b067f', 'khanhvu', '13123123', 'khanh', 'stormdragonempire@gmail.c', 0),
(6, 'khanh11', '46c9a651ec34e9118b64e72ae13b067f', 'khanh', '0987654321', 'khanh', 'stormdragonempire@gmail.c', 1),
(7, 'khanhag123', '46c9a651ec34e9118b64e72ae13b067f', 'khanh vu', '0325894681', 'Ha noi', 'khanhday1608@gmail.com', 0),
(8, 'khanh111', '46c9a651ec34e9118b64e72ae13b067f', 'khanh vu', '0325894681', 'Ha noi', 'khanhday1608@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `productid` int(11) NOT NULL,
  `orderid` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`productid`, `orderid`, `number`, `price`) VALUES
(1, 10, 5, 30000000),
(1, 14, 1, 30000000),
(2, 12, -1, 27000000),
(3, 14, 1, 7000000),
(4, 12, -3, 9000000),
(5, 10, 1, 26990169),
(5, 12, -3, 26990169),
(6, 12, -3, 19000000);

-- --------------------------------------------------------

--
-- Table structure for table `ordermethod`
--

CREATE TABLE `ordermethod` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ordermethod`
--

INSERT INTO `ordermethod` (`id`, `name`, `status`) VALUES
(1, 'Trực tiếp cho người giao hàng', 1),
(2, 'Chuyển khoản', 1),
(3, 'Thanh toán tại shop', 1),
(4, 'Paypal', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordermethodid` int(11) NOT NULL,
  `memberid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `name` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `note` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordermethodid`, `memberid`, `orderdate`, `status`, `name`, `address`, `phone`, `email`, `note`) VALUES
(10, 1, 2, '2023-06-29 16:03:18', 4, 'khanh1', 'no', '1234567890', 'no@gmail.com', 'qaa'),
(12, 1, 6, '2023-06-29 16:07:33', 3, 'khanh11', 'khanh', '0987654321', 'stormdragonempire@gmail.c', ''),
(14, 2, 2, '2023-07-19 16:57:55', 1, 'khanh1', 'no', '1234567890', 'no@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brandid`, `name`, `price`, `image`, `description`, `status`) VALUES
(1, 1, 'Iphone14', 30000000, '1689239379_ip14-removebg-preview.png', '<p>iphone 14 m&agrave;u x&aacute;m 164GB h&agrave;ng ch&iacute;nh h&atilde;ng apple</p>\r\n', 1),
(2, 1, 'Iphone14 Pro Max Gold', 27000000, 'ip14prm.png', 'Iphone14 Pro Max Gold 256GB hàng chính hãng apple', 1),
(3, 1, 'Iphone7Plus', 7000000, '1689157482_ip7pls-removebg-preview (Copy).png', '<p>Iphone7Plus m&agrave;u hồng 64GB h&agrave;ng ch&iacute;nh h&atilde;ng apple</p>\r\n', 1),
(4, 1, 'Iphone8', 9000000, '1689158061_ip8-removebg-preview (Copy).png', '<p>Iphone8 m&agrave;u đen 64GB h&agrave;ng ch&iacute;nh h&atilde;ng apple</p>\r\n', 1),
(5, 3, 'SamSungS23 Ultra', 26990169, '1689236188_1689063280_ssg23-removebg-preview (Copy).png', '<p>SamSung Galaxy S23 Ultra h&agrave;ng ch&iacute;nh h&atilde;ng samsung</p>\r\n', 1),
(6, 4, 'OPPO Find N2 Flip', 19000000, '1689063392_oppof2-removebg-preview.png', '<p>OPPO Find N2 Flip ch&iacute;nh h&atilde;ng OPPO</p>\r\n', 1),
(13, 2, 'Apple', 20000000, '1689165912_1689157482_ip7pls-removebg-preview (Copy).png', '<p>adsadsdsa</p>\r\n', 1),
(14, 2, 'adsadsa', 123123123, '1689165930_1689158061_ip8-removebg-preview (Copy).png', '<p>qưeqweqwe</p>\r\n', 1),
(15, 2, 'Apple1sadf', 20000000, '1689165954_1687877841_banner4.jpg', '<p>đ&acirc;sdsa</p>\r\n', 1),
(16, 3, 'no', 20000000, '1689239307_1687877841_banner4.jpg', '<p>ưqeqwe</p>\r\n', 1),
(17, 14, 'f1', 20000000, '1689239427_fake.jpg', '<p>&aacute;dsada</p>\r\n', 1),
(18, 14, 'f2', 20000000, '1689239442_1689239427_fake.jpg', '<p>&aacute;da</p>\r\n', 1),
(19, 14, 'f3', 20000000, '1689239466_fake.jpg', '<p>&aacute;dasds</p>\r\n', 1),
(20, 14, 'f4', 2000000, '1689240140_1689239466_fake.jpg', '<p>&aacute;d</p>\r\n', 1),
(21, 14, 'f5', 20000000, '1689240155_fake.jpg', '<p>&aacute;dsdasd</p>\r\n', 1),
(22, 14, 'f6', 20000000, '1689240174_1689240140_1689239466_fake.jpg', '<p>ssss</p>\r\n', 1),
(23, 14, 'f7', 20000000, '1689240194_1689239466_fake.jpg', '<p>dsfdsfd</p>\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`productid`,`orderid`);

--
-- Indexes for table `ordermethod`
--
ALTER TABLE `ordermethod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ordermethod`
--
ALTER TABLE `ordermethod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
