-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2022 at 04:43 PM
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
(2, 'pune', 'active', '2022-08-05 14:50:29', '2022-08-05 14:50:29');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `status`, `is_delete`, `created`, `modified`) VALUES
(1, 'Maharasthra', 'active', '0', '2022-08-05 14:35:44', '2022-08-05 14:35:44'),
(2, 'Gujrat', 'active', '0', '2022-08-05 14:36:03', '2022-08-05 14:36:03'),
(3, 'UP', 'active', '0', '2022-08-05 14:36:18', '2022-08-05 14:36:18'),
(4, 'Rajasthan', 'active', '0', '2022-08-05 14:36:30', '2022-08-05 14:36:30'),
(5, 'Delhi', 'active', '0', '2022-08-05 14:37:52', '2022-08-05 14:37:52'),
(6, 'Manipur', 'active', '0', '2022-08-05 14:38:07', '2022-08-05 14:38:07'),
(7, 'Sikkim', 'active', '0', '2022-08-05 14:37:36', '2022-08-05 14:37:36');

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
  `user_img` varchar(255) NOT NULL DEFAULT 'default.png',
  `state_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `hobbies` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `is_delete` enum('1','0') NOT NULL DEFAULT '0',
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `is_admin`, `email`, `password`, `status`, `user_img`, `state_id`, `city_id`, `zip`, `gender`, `hobbies`, `address`, `created`, `is_delete`, `modified`) VALUES
(1, 'sapriz panday', '0', 'sapna123@gmail.com', '0f3d1ff7fe53fa572e455d4275e02f4b', 'active', '', 0, 0, '', NULL, '', 'vinayaka ', '2022-07-19 10:17:02', '0', '2022-07-27 16:29:30'),
(13, 'George Bluth', '0', 'geo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'inactive', '', 0, 0, '', NULL, '', '', '2022-07-22 15:46:03', '0', '0000-00-00 00:00:00'),
(14, 'riya pandey', '0', 'riya@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'pic22.jpg', 0, 0, '', NULL, '', 'mira road mumbai', '2022-07-27 12:25:06', '0', '2022-08-03 11:25:12'),
(15, 'megha kamble', '0', 'megha@gmail.com', 'fa517d19f430bb8c74a9805cfe9e927a', 'inactive', 'megha1.png', 0, 0, '', NULL, '', 'andheri', '2022-07-27 12:26:45', '0', '2022-07-28 14:19:30'),
(16, 'chandu sukla', '0', 'chnduu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'megha7.png', 0, 0, '486542', 'male', 'reading,singing,dance', '  borivalia villey pada goregoan mumbai east.								 \r\n																		 \r\n								', '2022-07-29 12:28:11', '0', '2022-08-17 12:56:21'),
(17, 'George mishs', '0', 'rahul@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'inactive', 'default.png', 0, 0, '', NULL, '', '', '2022-07-29 12:49:30', '0', '0000-00-00 00:00:00'),
(18, 'George Weaver', '0', 'sapna@gg.com', '', NULL, 'default.png', 3, 2, '1232344', 'female', 'option2', '										 \r\n		ddd						', '2022-08-05 11:32:10', '0', '0000-00-00 00:00:00'),
(19, 'kaaaka saka', '0', 'ks@gmail.com', '', NULL, 'default.png', 1, 0, '', 'female', NULL, '	kaappa pada saul roal near petro jiss									 \r\n								', '2022-08-05 11:35:11', '1', '0000-00-00 00:00:00'),
(20, 'George Weaver', '0', 'george.bluth@reqres.in', '', 'active', 'system.PNG', 1, 2, '3434343', 'female', 'option2', '			iiiii							 \r\n								', '2022-08-05 11:46:56', '1', '0000-00-00 00:00:00'),
(21, 'xc cxc', '0', 'cxc@gmail.com', '', 'active', 'system1.PNG', 2, 4, '1232344', 'male', 'option3', '	sapna pada divsmauy raoa  , sibsm park 									 \r\n								', '2022-08-05 11:50:32', '1', '0000-00-00 00:00:00'),
(22, 'xc cxc', '0', 'cxxxc@gmail.com', '', 'active', 'default.png', 0, 0, '', 'male', NULL, '										 \r\n								', '2022-08-05 11:55:04', '0', '0000-00-00 00:00:00'),
(23, 'xchghg cxcghgh', '0', 'cxghgxxc@gmail.com', '', 'active', 'system2.PNG', 3, 1, 'hh', 'female', 'option4', '										 \r\n			ghhhhgh					', '2022-08-05 12:02:09', '1', '0000-00-00 00:00:00'),
(24, 'Janet mishra', '0', 'raggul@gmail.com', '', 'active', 'system3.PNG', 3, 1, '455555', 'female', 'option3', '		ewwwdf								 \r\n								', '2022-08-05 12:16:00', '1', '0000-00-00 00:00:00'),
(25, 'cc cc', '0', 'cc@gmail.com', '', 'active', 'pic223.jpg', 1, 1, '215445', 'other', 'reading,singing,dance,cricketer', ' 										 \r\n			ddd					', '2022-08-16 10:03:34', '1', '0000-00-00 00:00:00'),
(26, 'chandrashekhar shukla', '0', 'chndu12366@gmail.com', '', 'active', 'megha7.png', 6, 2, '486542', 'male', 'reading,singing,dance,doctor', ' \r\n										  goregaon  borivalia villey pada goregoan mumbai east.								 \r\n																		 \r\n																		 \r\n																		 \r\n																		 \r\n																		 \r\n								', '2022-08-17 10:06:30', '0', '2022-08-18 09:36:48'),
(27, 'sonal singh', '0', 'son@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'active', 'system5.PNG', 1, 1, '444444', 'male', 'reading,cricketer', ' \r\n										   \r\n										    asdsdsdsdsdsdsd aDKLDSD									 \r\n																		 \r\n																		 \r\n																		 \r\n								', '2022-08-17 13:24:13', '0', '2022-08-18 12:00:17');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
