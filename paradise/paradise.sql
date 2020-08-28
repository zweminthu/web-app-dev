-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 05:21 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paradise`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartId` int(11) NOT NULL,
  `ItemName` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Qty` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `Email` text COLLATE utf8_general_mysql500_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CatId` int(11) NOT NULL,
  `CatName` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CatId`, `CatName`, `UpdationDate`) VALUES
(3, 'Bathroom', '2018-12-24 02:52:06'),
(4, 'Bedroom', '2018-12-24 02:54:54'),
(5, 'Dining Room', '2018-12-24 02:56:56'),
(6, 'Kitchen', '2018-12-24 02:57:10'),
(7, 'Living Room', '2018-12-24 02:58:51'),
(8, 'Study (Room)', '2018-12-24 02:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `enquire`
--

CREATE TABLE `enquire` (
  `EnquireId` int(11) NOT NULL,
  `Name` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Email` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `MobileNo` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Subject` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Description` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Action` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `enquire`
--

INSERT INTO `enquire` (`EnquireId`, `Name`, `Email`, `MobileNo`, `Subject`, `Description`, `PostingDate`, `Action`) VALUES
(6, 'abc', 'abc@gmail.com', '0979777777', 'Refrigerator Warranty', 'The warranty...\r\n', '2018-12-25 09:17:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `ItemId` int(11) NOT NULL,
  `ItemName` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Price` double NOT NULL,
  `OnHandItem` int(11) NOT NULL,
  `BrandName` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `CatId` int(11) NOT NULL,
  `Img` varchar(100) COLLATE utf8_general_mysql500_ci NOT NULL,
  `UpdationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`ItemId`, `ItemName`, `Price`, `OnHandItem`, `BrandName`, `CatId`, `Img`, `UpdationDate`) VALUES
(2, 'Soap Holder', 350, 9, 'Sofamania', 2, 'i1c3.jpg', '2019-01-09 04:01:47'),
(3, 'Tooth Brush Holder', 37, 7, 'Dorf Enix', 3, 'i2c3.jpg', '2019-01-01 14:22:57'),
(5, 'Towel Bar Set', 23, 7, 'Luxury Rose', 3, 'i3c3.jpg', '2019-01-01 13:17:56'),
(6, 'Pillow 2x Pack', 22, 9, 'Utopia', 4, 'i1c4.jpg', '2019-01-01 14:24:03'),
(7, 'Bolster', 19, 7, 'My Pillow', 4, 'i3c4.jpg', '2019-01-01 13:27:24'),
(8, 'Plush Fuzzy Sherpa Throw Blanket', 20, 5, 'PAVILIA', 4, 'i2c4.jpg', '2019-01-09 04:01:47'),
(9, ' Black 3 Piece Dining Room Set', 304, 5, 'East West Furniture', 5, 'i1c5.jpg', '2019-01-01 13:48:27'),
(10, '5 Pcs Dining Table and Chairs Dining Table Set', 119, 5, 'Pine Wood', 5, 'i3c5.jpg', '2019-01-01 13:50:55'),
(11, 'White Dinner Plates Salad Plates Bowls And Cups', 85, 9, 'Lot Of Pottery', 5, 'i2c5.jpg', '2019-01-01 13:54:34'),
(12, 'Frost-Free Refrigerator', 733, 30, 'Summit', 6, 'i1c6.jpg', '2019-01-05 06:30:40'),
(13, 'Rice Cooker', 181, 9, 'Hitachi', 6, 'i2c6.jpg', '2019-01-01 13:59:38'),
(14, '40L Neo Microwave 1000W Stainless Steel', 105, 45, 'Samsung', 6, 'i3c6.jpg', '2019-01-05 06:29:36'),
(15, 'Modern Fabric Sofa 2-Seater Couch Wooden Frame', 122, 3, 'vidaXL', 7, 'i1c7.jpg', '2019-01-01 14:04:35'),
(16, 'Sofa Linen Fabric 3 Seater ', 249, 3, 'Uenjoy', 7, 'i2c7.jpg', '2019-01-01 14:06:27'),
(17, 'Linen Sofa XL 4 Seat', 449, 3, 'Sofamania', 7, 'i3c7.jpg', '2019-01-01 14:08:34'),
(18, 'Console Side Table Bookcase', 43, 7, 'universalwant', 8, 'i1c8.jpg', '2019-01-01 14:14:11'),
(19, 'Study Chair for Kid', 45, 20, 'Green Funiture', 8, 'i2c8.jpg', '2019-01-05 06:31:38'),
(20, 'Student Desk & Chair Set', 85, 7, 'Green Funiture', 8, 'i3c8.jpg', '2019-01-01 14:20:40');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `MId` int(11) NOT NULL,
  `Mname` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Email` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `MobilePh` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Message` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Action` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`MId`, `Mname`, `Email`, `MobilePh`, `Message`, `PostingDate`, `Action`) VALUES
(1, 'zmt', 'zmt@gmail.com', '0977777777', 'hello...', '2018-12-25 11:22:27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderId` int(11) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserId` int(11) NOT NULL,
  `TotalAmount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderId`, `OrderDate`, `UserId`, `TotalAmount`) VALUES
(1, '2019-01-05 05:42:36', 2, 3755),
(2, '2019-01-05 05:50:25', 2, 3755),
(3, '2019-01-05 05:51:45', 2, 615),
(4, '2019-01-05 05:53:38', 2, 615),
(5, '2019-01-05 05:56:55', 2, 615),
(6, '2019-01-05 05:57:26', 2, 615),
(7, '2019-01-05 05:57:50', 2, 615),
(8, '2019-01-05 05:59:34', 2, 615),
(9, '2019-01-05 06:00:09', 2, 615),
(10, '2019-01-05 06:12:14', 2, 615),
(11, '2019-01-07 10:08:24', 3, 1400),
(12, '2019-01-09 04:01:47', 2, 740);

-- --------------------------------------------------------

--
-- Table structure for table `orderdetail`
--

CREATE TABLE `orderdetail` (
  `DetailId` int(11) NOT NULL,
  `OrderId` int(11) NOT NULL,
  `ItemId` int(11) NOT NULL,
  `Qty` double NOT NULL,
  `TotalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `orderdetail`
--

INSERT INTO `orderdetail` (`DetailId`, `OrderId`, `ItemId`, `Qty`, `TotalPrice`) VALUES
(1, 8, 14, 5, 525),
(2, 8, 19, 2, 90),
(3, 9, 14, 5, 525),
(4, 9, 19, 2, 90),
(5, 10, 14, 5, 525),
(6, 10, 19, 2, 90),
(7, 11, 2, 4, 1400),
(8, 12, 2, 2, 700),
(9, 12, 8, 2, 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserId` int(11) NOT NULL,
  `UserName` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Email` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `Pwd` text COLLATE utf8_general_mysql500_ci NOT NULL,
  `RegistrationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `Email`, `Pwd`, `RegistrationDate`) VALUES
(1, 'zmt', 'zmt@gmail.com', 'a39647c14dc8a1dacbeaa5360ce05350', '2019-01-01 23:16:38'),
(2, 'zweminthu', 'zweminthu8@gmail.com', 'a39647c14dc8a1dacbeaa5360ce05350', '2019-01-01 09:21:06'),
(3, 'abc', 'abc@gmail.com', 'ab56b4d92b40713acc5af89985d4b786', '2019-01-07 10:06:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartId`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CatId`);

--
-- Indexes for table `enquire`
--
ALTER TABLE `enquire`
  ADD PRIMARY KEY (`EnquireId`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ItemId`),
  ADD KEY `CatId` (`CatId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`MId`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`DetailId`),
  ADD KEY `OrderId` (`OrderId`,`ItemId`),
  ADD KEY `ItemId` (`ItemId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `enquire`
--
ALTER TABLE `enquire`
  MODIFY `EnquireId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `ItemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `MId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `DetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `item` (`ItemId`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

--
-- Constraints for table `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`ItemId`) REFERENCES `item` (`ItemId`),
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`OrderId`) REFERENCES `order` (`OrderId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
