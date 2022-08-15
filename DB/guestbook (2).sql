-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 08:58 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city_name`, `status`, `created`, `modified`) VALUES
(1, 'Mumbai', 'active', '2022-08-05 14:50:12', '2022-08-05 14:50:12'),
(2, 'pune', 'active', '2022-08-05 14:50:29', '2022-08-05 14:50:29'),
(3, 'palghar', 'active', '2022-08-08 15:37:27', '2022-08-08 15:37:27');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `status`, `created`, `modified`) VALUES
(1, 'Maharasthra', 'active', '2022-08-05 14:35:44', '2022-08-05 14:35:44'),
(2, 'Gujrat', 'active', '2022-08-05 14:36:03', '2022-08-05 14:36:03'),
(3, 'UP', 'active', '2022-08-05 14:36:18', '2022-08-05 14:36:18'),
(4, 'Rajasthan', 'active', '2022-08-05 14:36:30', '2022-08-05 14:36:30'),
(5, 'Delhi', 'active', '2022-08-05 14:37:52', '2022-08-05 14:37:52'),
(6, 'Manipur', 'active', '2022-08-05 14:38:07', '2022-08-05 14:38:07'),
(7, 'Sikkim', 'active', '2022-08-05 14:37:36', '2022-08-05 14:37:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_admin` enum('1','0') NOT NULL DEFAULT '0',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT NULL,
  `gender` enum('female','male','other') DEFAULT NULL,
  `hobbies` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `zip` int(10) NOT NULL,
  `user_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `is_admin`, `email`, `password`, `status`, `gender`, `hobbies`, `created`, `is_delete`, `modified`, `address`, `city_id`, `state_id`, `zip`, `user_img`) VALUES
(1, 'xxdfe', '0', 'sapna1222@gmail.comc', 'e10adc3949ba59abbe56e057f20f883e', 'inactive', NULL, '', '2022-07-18 13:38:49', '1', '2022-07-26 19:15:55', 'xcvcv', 0, 0, 0, 'Screenshot_(1)17.png'),
(2, 'priansh mishra', '1', 'mishra@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', NULL, '', '2022-08-01 20:02:35', '0', '2022-08-08 10:59:40', 'achole talav gate bo.2  sidhivinaa road , near parla station saki naka mmbai maharastra ', 0, 0, 0, 'Screenshot_(3)1.png'),
(3, 'risi mishra', '0', 'rishi@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'inactive', NULL, '', '2022-08-06 23:51:29', '1', '0000-00-00 00:00:00', '', 0, 0, 0, ''),
(4, 'giraf animal', '0', 'giraf@gmail.com', 'f8ad38d35df6008782317eb10de68251', 'active', NULL, '', '2022-08-08 16:39:46', '1', '2022-08-09 12:30:00', '', 0, 0, 0, ''),
(5, 'kakakaka miswws', '0', 'aurya1994@gmail.com', '', 'inactive', 'other', 'option2', '2022-08-08 15:00:58', '1', '0000-00-00 00:00:00', '										 \r\nsadfgjhgfds fhtrresdvcvbcv								', NULL, NULL, 0, 'default.png'),
(6, 'rita padney', '0', 'dafsdfdsds@gmail.comc', '', 'inactive', 'other', 'option5', '2022-08-08 15:11:40', '1', '0000-00-00 00:00:00', 'frdsddscdfv fvdsesfgvdfsvfcxv			 \r\n								', NULL, NULL, 123456, 'Screenshot_(4).png'),
(7, 'ss ss', '0', '11sapna@22.com', '', 'inactive', 'other', 'option4', '2022-08-08 16:18:56', '1', '0000-00-00 00:00:00', '	ssss									 \r\n								', NULL, NULL, 123456, 'default.png'),
(8, 'kakakaka mishra', '0', 'sap@gmail.com', '', 'active', 'female', 'singing,dance,cricketer', '2022-08-08 16:33:35', '1', '0000-00-00 00:00:00', '		adawdsd								 \r\n								', NULL, NULL, 343423, 'default.png'),
(9, 'krpa papapa', '0', 'pa@gmail.com', '', 'active', 'female', 'reading,singing,dance,cricketer', '2022-08-08 16:49:48', '1', '0000-00-00 00:00:00', 'sdsdsdsds										 \r\n								', 2, 2, 466231, 'default.png'),
(10, 'abhay mishra', '0', 'abha@gmail.com', '', 'active', 'male', 'reading,singing,dance,cricketer', '2022-08-08 20:10:38', '1', '0000-00-00 00:00:00', 'c-003, vinaak apartment achole road , vasai east mmbai.									 \r\n								', 3, 5, 401209, 'Screenshot_(4)1.png'),
(11, 'pikach 111sss', '0', 'pik@gmail.com', '', 'active', 'male', 'reading,cricketer', '2022-08-09 09:02:25', '1', '0000-00-00 00:00:00', 'pikk pada  ddasdddd										 \r\n								', 2, 1, 401209, 'Screenshot_(3)10.png'),
(12, 'ssss llll', '0', 'ssa@gmail.coms', '', 'active', 'male', 'dance,cricketer', '2022-08-09 09:07:36', '1', '0000-00-00 00:00:00', '	dddd									 \r\n								', 2, 6, 111111, 'Screenshot_(1)1.png'),
(13, 'jigasa pathak', '0', 'pathak@gmail.com', '', 'inactive', 'female', 'dance', '2022-08-09 10:41:02', '1', '0000-00-00 00:00:00', 'padsdsddddsdsdsd										 \r\n								', 2, 4, 2312321, 'Screenshot_(3)11.png'),
(14, 'sapna ppp', '0', 'sapp@2gmail.comsd', '', 'active', 'other', 'singing,dance', '2022-08-13 21:22:24', '1', '0000-00-00 00:00:00', ' fdsdsddddddddddd\r\n																		 \r\n								', 2, 4, 443332, 'Screenshot_(2).png'),
(15, 'fdsdsz xczc', '0', 'as@gmail.com', '', 'active', 'female', 'reading,singing,cricketer', '2022-08-13 21:30:26', '1', '0000-00-00 00:00:00', ' 										 \r\n		sdsds						', 1, 2, 254145, 'Screenshot_(7).png'),
(16, 'xcsx xcxz', '0', 'asa@gmail.com', '', 'active', 'female', 'reading,singing,dance', '2022-08-13 21:38:01', '0', '0000-00-00 00:00:00', ' xcxz 										 \r\n																		 \r\n								', 3, 2, 545555, 'Screenshot_(8).png'),
(17, 'dipka padkor', '0', 'dipika2@gmail.com', '', 'active', 'female', 'singing,dance,cricketer', '2022-08-14 11:35:57', '0', '0000-00-00 00:00:00', '   										 \r\nasasaa																		 \r\n																		 \r\n								', 1, 1, 0, 'default.png'),
(18, 'jira phorrr', '0', 'jiraA@fmail.com', '', 'active', 'female', 'reading,singing,dance,cricketer,doctor', '2022-08-15 17:17:44', '0', '0000-00-00 00:00:00', ' 	jira madala vadala east mmbai									 \r\n								', 1, 1, 444444, 'Screenshot_(4)2.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
