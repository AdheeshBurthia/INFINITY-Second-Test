-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220824.5acfb45262
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Aug 25, 2022 at 09:42 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwatch`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cartid`, `userid`, `productid`, `quantity`, `created_at`) VALUES
(259, 34, 8, 4, '2022-08-23 09:59:02'),
(271, 34, 10, 2, '2022-08-24 07:28:30'),
(274, 34, 12, 2, '2022-08-25 06:42:51'),
(275, 34, 11, 2, '2022-08-25 06:45:32');

-- --------------------------------------------------------

--
-- Table structure for table `tblmessage`
--

CREATE TABLE `tblmessage` (
  `messageid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblmessage`
--

INSERT INTO `tblmessage` (`messageid`, `firstname`, `lastname`, `email`, `mobile`, `message`, `date_created`) VALUES
(1, 'Test', 'Testing', 'test@gmail.com', 57959260, 'This is a test...', '2022-08-24 08:39:48'),
(2, 'Test2', 'Testing2', 'test2@gmail.com', 57959260, 'This is testing 2...', '2022-08-24 08:42:34'),
(6, 'Test', 'Testing', 'test@gmail.com', 57817548, 'This is a test', '2022-08-25 06:20:47');

-- --------------------------------------------------------

--
-- Table structure for table `tblproducts`
--

CREATE TABLE `tblproducts` (
  `productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `dateview` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproducts`
--

INSERT INTO `tblproducts` (`productid`, `productname`, `description`, `price`, `photo`, `dateview`) VALUES
(1, 'JAZZMASTER', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '48000.00', 'featured1.png', '23 August 2022, 01:58pm'),
(2, 'INGERSOLL', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '11500.00', 'featured2.png', '20 August 2022, 01:21pm'),
(3, 'ROSE GOLD', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '40500.00', 'featured3.png', '23 August 2022, 01:59pm'),
(4, 'SPIRIT ROSE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '68300.00', 'product1.png', '23 August 2022, 03:40pm'),
(5, 'KHAKI PILOT', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '61500.00', 'product2.png', '23 August 2022, 03:40pm'),
(6, 'JUBILEE BLACK', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '39600.00', 'product3.png', '23 August 2022, 03:40pm'),
(7, 'FOSIL ME3', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '29600.00', 'product4.png', '18 August 2022, 10:50pm'),
(8, 'DUCHEN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '43300.00', 'product5.png', '23 August 2022, 01:59pm'),
(9, 'Longines rose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '44600.00', 'new1.png', '23 August 2022, 01:54pm'),
(10, 'Jazzmaster', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '52350.00', 'new2.png', '23 August 2022, 03:40pm'),
(11, 'Dreyfuss gold', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '34200.00', 'new3.png', '25 August 2022, 10:45am'),
(12, 'Portuguese rose', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent orci felis, eleifend non faucibus ac, feugiat nec mi. Mauris vulputate laoreet luctus.', '72400.00', 'new4.png', '25 August 2022, 10:52am');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userid` int(11) NOT NULL,
  `userimage` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(50) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `usertype` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userid`, `userimage`, `username`, `useremail`, `userpass`, `usertype`, `date_created`) VALUES
(34, '1661247724_testimonial1.jpg', 'Burthia', 'perf3ctstaradheesh@gmail.com', '$2y$10$DPrT2bAjMV6rhg4KqoL5cO6J2ihloDRzZpQu3cnZWrCoQD4s49EaS', 0, '2022-08-23 09:42:04'),
(38, '1661267395_testimonial3.jpg', 'admin', 'admin@admin.com', '$2y$10$i8/R4pj.s0xQPPM8Z7nqRuE2iXrgTQYbKeLrSFHaXe53Qwm3Nuzw6', 1, '2022-08-23 15:09:55'),
(46, '1661408270_testimonial3.jpg', 'AdheeshB', 'oneearthnoreply@gmail.com', '$2y$10$BFkkVfJF53A0LEF0Pg8GSOQ.Ew3d.F8EUrI5UsvNi1fV7Muthek..', 0, '2022-08-25 06:17:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cartid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `productid` (`productid`);

--
-- Indexes for table `tblmessage`
--
ALTER TABLE `tblmessage`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `tblproducts`
--
ALTER TABLE `tblproducts`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `tblmessage`
--
ALTER TABLE `tblmessage`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblproducts`
--
ALTER TABLE `tblproducts`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD CONSTRAINT `tblcart_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `tbluser` (`userid`),
  ADD CONSTRAINT `tblcart_ibfk_2` FOREIGN KEY (`productid`) REFERENCES `tblproducts` (`productid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
