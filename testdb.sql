-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 04:44 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

CREATE TABLE `bid` (
  `propertyid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `time` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bid`
--

INSERT INTO `bid` (`propertyid`, `userid`, `price`, `time`) VALUES
(17, 1, 24000, '2018-05-29 01:12:27'),
(17, 3, 30000, '2018-05-29 01:13:20'),
(17, 4, 25000, '2018-05-29 01:29:32'),
(28, 2, 10000000, '2018-05-29 03:31:39'),
(17, 12, 5000000, '2018-05-29 03:53:35');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `id` int(11) NOT NULL,
  `name` varchar(90) DEFAULT NULL,
  `description` varchar(120) DEFAULT NULL,
  `user` varchar(120) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `price` int(11) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `author` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`id`, `name`, `description`, `user`, `date`, `price`, `phone`, `author`) VALUES
(39, 'Java The complete ref.', 'i have used this book 2 years.', 'rafi@gmail.com', '2018-09-03 13:17:10', 230, '01681409560', 'schildt'),
(40, 'AI', 'New book', 'rafi@gmail.com', '2018-09-03 14:35:57', 300, '01681409560', 'Russell'),
(41, 'Number theory', 'New book', 'rafi@gmail.com', '2018-09-03 14:36:59', 150, '01681409560', 'Telang'),
(42, 'Math', 'Used only 6 months', 'sumaia@gmail.com', '2018-09-03 14:41:57', 200, '01681409560', 'rahim'),
(43, 'ail', 'New book', 'b@gmail.com', '2018-09-18 06:49:30', 256, '01681409560', 'Telang');

-- --------------------------------------------------------

--
-- Table structure for table `property1`
--

CREATE TABLE `property1` (
  `user` varchar(12) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property1`
--

INSERT INTO `property1` (`user`, `value`) VALUES
('rafi', 1200000),
('ahmed', 130000),
('promit', 14000),
('nafees', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `property4`
--

CREATE TABLE `property4` (
  `user` varchar(12) DEFAULT NULL,
  `value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `propertyphoto`
--

CREATE TABLE `propertyphoto` (
  `photoid` int(11) NOT NULL,
  `id` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `propertyphoto`
--

INSERT INTO `propertyphoto` (`photoid`, `id`, `date`) VALUES
(10007, 39, '2018-09-03 13:17:10'),
(10008, 40, '2018-09-03 14:35:57'),
(10009, 41, '2018-09-03 14:36:59'),
(10010, 42, '2018-09-03 14:41:57'),
(10012, 44, '2018-09-04 06:23:25'),
(10013, 43, '2018-09-18 06:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `photoid` int(11) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `phone`, `photoid`, `password`) VALUES
(13, 'rafi@gmail.com', 'rafi', '01681409560', 0, '12345'),
(14, 'sumaia@gmail.com', 'sumaia', '01681409580', 0, '12345'),
(15, 'b@gmail.com', 'bayzid', '01681409560', 0, '12345'),
(16, 'mila@gmail.com', 'mila', '016814090111', 0, '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `propertyphoto`
--
ALTER TABLE `propertyphoto`
  ADD PRIMARY KEY (`photoid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `propertyphoto`
--
ALTER TABLE `propertyphoto`
  MODIFY `photoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10014;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `propertyphoto`
--
ALTER TABLE `propertyphoto`
  ADD CONSTRAINT `propertyphoto_ibfk_1` FOREIGN KEY (`id`) REFERENCES `property` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
