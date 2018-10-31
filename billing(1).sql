-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2018 at 07:43 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `billing`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` bigint(20) NOT NULL,
  `image_name` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `image_name`, `date`, `user_id`) VALUES
(20000, 'b1_-_Copy_-_Copy2.jpg', '2018-01-03 11:32:11', 10000),
(20001, 'bill_-_Copy_-_Copy_(2)2.jpg', '2018-07-03 11:32:12', 10000),
(20002, 'b1_-_Copy_-_Copy3.jpg', '2018-03-04 07:46:27', 10000),
(20003, 'bill_-_Copy_-_Copy_(2)3.jpg', '2018-07-04 07:46:27', 10000),
(20004, '1.jpg', '2018-07-05 08:43:14', 10000),
(20005, 'bill_-_Copy_-_Copy_(2)4.jpg', '2018-07-05 08:43:14', 10000),
(20006, '11.jpg', '2018-07-05 08:44:21', 10000),
(20007, 'bill_-_Copy_-_Copy_(2)5.jpg', '2018-07-05 08:44:21', 10000),
(20008, 'bill_-_Copy_-_Copy_(2)6.jpg', '2018-07-05 08:48:34', 10000),
(20009, 'bill_-_Copy_-_Copy_(2)7.jpg', '2018-07-05 08:50:19', 10000),
(20010, 'bill_-_Copy_-_Copy_(2)8.jpg', '2018-07-05 08:50:45', 10000),
(20011, 'bill_-_Copy_-_Copy_(2)9.jpg', '2018-07-05 08:51:01', 10000),
(20012, 'bill_-_Copy_-_Copy_(2)10.jpg', '2018-07-05 08:51:47', 10000),
(20013, 'bill_-_Copy_-_Copy_(2)11.jpg', '2018-07-05 08:52:41', 10000),
(20014, 'bill_-_Copy_-_Copy_(2)12.jpg', '2018-07-05 08:55:17', 10000),
(20015, 'bill_-_Copy_-_Copy_(2)13.jpg', '2018-07-05 08:57:10', 10000),
(20016, 'bill_-_Copy_-_Copy_(2)14.jpg', '2018-07-05 08:59:31', 10000),
(20017, 'bill_-_Copy_-_Copy_(2)15.jpg', '2018-07-05 09:07:05', 10000),
(20018, 'bill_-_Copy_-_Copy_(2)16.jpg', '2018-07-05 09:15:38', 10000),
(20019, 'bill_-_Copy_-_Copy_(2)17.jpg', '2018-07-05 09:20:07', 10000),
(20020, 'bill_-_Copy_-_Copy_(2)18.jpg', '2018-07-05 09:24:42', 10000),
(20021, 'bill_-_Copy_-_Copy_(2)19.jpg', '2018-07-05 09:27:22', 10000),
(20022, 'bill_-_Copy_-_Copy_(2)20.jpg', '2018-07-05 09:33:14', 10000),
(20023, 'bill_-_Copy_-_Copy_(2)21.jpg', '2018-07-05 09:34:41', 10000),
(20024, 'bill_-_Copy_-_Copy_(2)22.jpg', '2018-07-05 09:43:51', 10000),
(20025, '12.jpg', '2018-07-05 09:45:04', 10000),
(20026, 'bill_-_Copy_-_Copy_(2)23.jpg', '2018-07-05 09:45:04', 10000),
(20027, '13.jpg', '2018-07-09 12:44:58', 10000),
(20028, 'bill_-_Copy_-_Copy_(2)24.jpg', '2018-07-09 12:44:59', 10000),
(20029, '14.jpg', '2018-07-09 12:46:30', 10000),
(20030, 'bill_-_Copy_-_Copy_(2)25.jpg', '2018-07-09 12:46:30', 10000),
(20031, '15.jpg', '2018-07-09 12:56:50', 10000),
(20032, 'bill_-_Copy_-_Copy_(2)26.jpg', '2018-07-09 12:56:50', 10000),
(20033, '16.jpg', '2018-07-09 13:03:05', 10000),
(20034, 'bill_-_Copy_-_Copy_(2)27.jpg', '2018-07-09 13:03:05', 10000),
(20035, '17.jpg', '2018-07-09 13:04:54', 10000),
(20036, 'bill_-_Copy_-_Copy_(2)28.jpg', '2018-07-09 13:04:55', 10000),
(20037, 'bill_-_Copy_-_Copy_(2)29.jpg', '2018-07-09 13:28:44', 10000),
(20038, 'bill_-_Copy_-_Copy_(2)30.jpg', '2018-07-09 13:29:56', 10000),
(20039, 'bill_-_Copy_-_Copy_(2)31.jpg', '2018-07-09 13:32:00', 10000),
(20040, 'bill_-_Copy_-_Copy_(2)32.jpg', '2018-07-09 13:33:31', 10000),
(20041, 'bill_-_Copy_-_Copy_(2)33.jpg', '2018-07-09 13:35:36', 10000),
(20042, 'bill_-_Copy_-_Copy_(2)34.jpg', '2018-07-09 13:36:43', 10000),
(20043, 'bill_-_Copy_-_Copy_(2)35.jpg', '2018-07-09 13:39:31', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` bigint(11) NOT NULL,
  `templateName` varchar(500) NOT NULL,
  `src` varchar(2000) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `templateName`, `src`, `userId`, `date`) VALUES
(1, 'fukri', '11.jpg', 10000, '2018-07-09 12:56:04'),
(2, 'maya', 'bill_-_Copy_-_Copy_(2)1.jpg', 10000, '2018-07-09 12:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(300) NOT NULL,
  `password` varchar(200) NOT NULL,
  `name` varchar(500) NOT NULL,
  `id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `name`, `id`) VALUES
('amaldevastvm@gmail.com', 'amaldev', 'Amal Dev', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20044;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
