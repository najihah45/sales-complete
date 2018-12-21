-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2017 at 07:02 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderid` int(40) NOT NULL,
  `fullname` varchar(400) NOT NULL,
  `invoiceno` varchar(400) NOT NULL,
  `custname` varchar(300) NOT NULL,
  `compname` varchar(300) NOT NULL,
  `compaddress` text NOT NULL,
  `hpno` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `product` varchar(300) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` double NOT NULL,
  `userid` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderid`, `fullname`, `invoiceno`, `custname`, `compname`, `compaddress`, `hpno`, `email`, `product`, `quantity`, `price`, `userid`) VALUES
(1, 'Ali Udin', 'ABC123', 'Mr Abc Hijkl', '', '', '0122321454', '', 'Data 4', 120, 400.65, 8),
(8, 'Ali Udin', '66666', 'Faridah Mustafa', 'FM Sdn Bhd', '1235, Jalan dasd, dasdsa, dsadsa', '0182434673', 'fmm@gmail.com', 'Data 3', 120, 7428.55, 8),
(12, 'Ali Udin', '324134', 'Mimi Momo', '', '', '01242546623', '', 'Data 5', 15, 452.89, 8),
(13, 'Huda Ismail', 'CLL88888', 'Cindy Loi', '', '', '0183343356', '', 'Data 2', 88, 8888.88, 1),
(14, 'Huda Ismail', 'TTT4245', 'Rogayah Musa', '', '', '0187232322', '', ' Data 5 ', 100, 4324.65, 1),
(15, 'Huda Ismail', 'BRF6532', 'Brian Lee', '', '', '0123433552', '', ' Data 3 ', 300, 23334.22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productid` int(40) NOT NULL,
  `productname` varchar(400) NOT NULL,
  `price` double(65,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `productname`, `price`) VALUES
(1, 'Data 1', 34.56),
(2, 'Data 2', 534.65),
(3, 'Data 3', 100.54),
(4, 'Data 4', 12.70),
(5, 'Data 5', 545.12);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `roleid` int(40) NOT NULL,
  `rolename` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`roleid`, `rolename`) VALUES
(1, 'Admin'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(20) NOT NULL,
  `staffid` varchar(40) NOT NULL,
  `roleid` int(20) NOT NULL,
  `rolename` varchar(100) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `staffid`, `roleid`, `rolename`, `fullname`, `username`, `password`) VALUES
(1, 'SL111', 1, 'Admin', 'Huda Ismail', 'huda', '202cb962ac59075b964b07152d234b70'),
(2, 'SL222', 2, 'Staff', 'Mimi Momo', 'mimi', '202cb962ac59075b964b07152d234b70'),
(5, 'STF444', 2, 'Staff', 'Ah Sheng', 'sheng', '202cb962ac59075b964b07152d234b70'),
(6, 'STF678', 2, 'Staff', 'Maniam Kupusamy', 'maniam', '202cb962ac59075b964b07152d234b70'),
(7, 'STF12346', 2, 'Staff', 'Abu', 'abu', '202cb962ac59075b964b07152d234b70'),
(8, '9999', 1, 'Admin', 'Ali Udin', 'ali', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`orderid`),
  ADD KEY `fullname` (`fullname`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productname` (`product`),
  ADD KEY `productname_2` (`product`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD KEY `roleid` (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `orderid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `roleid` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
