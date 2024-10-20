-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2024 at 06:00 AM
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
-- Database: `baler_db2`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `name`, `price`) VALUES
(1, 'gasul', 300),
(2, 'karaoke', 500);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `reference_no` int(11) NOT NULL,
  `rooms` varchar(255) NOT NULL,
  `room_pax` varchar(255) NOT NULL,
  `amenities` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `additional_pax` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `reference_no`, `rooms`, `room_pax`, `amenities`, `price`, `check_in`, `check_out`, `first_name`, `last_name`, `email`, `address`, `contact`, `additional_pax`, `total`, `balance`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 4219975, '1,2,3', '1:2,2:3,3:4', '1,2', 0, '2024-10-05', '2024-10-12', 'Kamotenggg', 'Kahoyya', 'broken data', 'full street address', 'me@mydomain.com', 350, 68350, 0, 0, '2024-10-04 10:26:51', NULL, NULL),
(28, 9688670, '', '', '', 0, '2024-10-17', '2024-10-21', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 0, 5600, 0, 0, '2024-10-16 10:50:14', NULL, NULL),
(29, 2119390, '', '', '', 0, '2024-10-17', '2024-10-21', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 0, 5600, 0, 0, '2024-10-16 10:50:37', NULL, NULL),
(30, 4404759, '', '', '', 0, '2024-10-17', '2024-10-19', 'Ako ', 'Lang ', 'TO', '1333', '093131', 0, 3600, 0, 0, '2024-10-16 11:05:27', NULL, NULL),
(31, 1828662, '3,4,5,6', '6:2,6:1', '', 0, '2024-10-17', '2024-10-19', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 1050, 23050, 0, 0, '2024-10-16 15:27:23', NULL, NULL),
(32, 4147982, '1,2,5,6,8', '5:1,6:2,8:0,', '', 0, '2024-10-17', '2024-10-26', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 0, 116250, 0, 0, '2024-10-16 15:39:10', NULL, NULL),
(33, 9072604, '1,4,7,10,13', '7:2,10:0,13:1,', '', 0, '2024-10-17', '2024-10-19', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 0, 33850, 0, 0, '2024-10-16 15:40:08', NULL, NULL),
(34, 3736920, '1,2,6,8,14', '6:2,8:1,14:1,', '1,2', 0, '2024-10-17', '2024-10-26', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 0, 130900, 0, 0, '2024-10-16 15:49:25', NULL, NULL),
(35, 5702542, '2,3', '', '1', 0, '2024-10-19', '2024-10-21', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 0, 8100, 0, 0, '2024-10-18 16:43:26', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penalty`
--

CREATE TABLE `penalty` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `pax` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `inclusions` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_id`, `pax`, `price`, `image`, `description`, `type`, `inclusions`) VALUES
(1, 20, 'Good for 2', 1400, '../../../IMAGES/Room/2/1.jpg', 'lorem', '1', ''),
(2, 22, 'Good for 2', 1400, '../../../IMAGES/Room/2/1.jpg', 'Lorem Ipsum', '1', ''),
(3, 2, 'Good for 4', 2500, '../../../IMAGES/Room/4/2.jpg', '', '1', ''),
(4, 4, 'Good for 4', 2500, '../../../IMAGES/Room/4/2.jpg', 'Lorem Ipsum', '1', ''),
(5, 9, 'Good for 5', 3000, '../../../IMAGES/Room/5/5.jpg', 'Lorem', '2', ''),
(6, 10, 'Good for 5', 3000, '../../../IMAGES/Room/5/5.jpg', 'Lorem Ipsum', '2', ''),
(7, 6, 'Good for 6', 3500, '../../../IMAGES/Room/4/2.jpg', 'Lorem ipsum', '2', ''),
(8, 19, 'Good for 8', 4000, '../../../IMAGES/Room/8-9/2.jpg', 'Lorem Ipsum', '2', ''),
(9, 23, 'Good for 8', 4000, '../../../IMAGES/Room//8-9/2.jpg', 'Loremm', '2', ''),
(10, 1, 'Good for 10', 4500, '../../../IMAGES/Room/10/7.jpg', 'Lorem', '3', ''),
(11, 12, 'Good for 10', 4500, '../../../IMAGES/Room/10/5.jpg', 'Lorem', '3', ''),
(12, 14, 'Good for 10', 4500, '../../../IMAGES/Room/10/7.jpg', 'Lorem', '3', ''),
(13, 15, 'Good for 10', 4500, '../../../IMAGES/Room/10/1.jpg', 'lorem', '3', ''),
(14, 16, 'Good for 10', 4500, '../../../IMAGES/Room/10/4.jpg', 'lorem', '3', ''),
(15, 17, 'Good for 10', 4500, '../../../IMAGES/Room/10/5.jpg', 'lorem', '3', ''),
(16, 18, 'Good for 10', 4500, '../../../IMAGES/Room/10/7.jpg', 'lorem', '3', ''),
(17, 21, 'Good for 12', 5000, '../../../IMAGES/Room/12-14/6.jpg', 'lorem', '3', ''),
(18, 0, 'Good for 14', 6000, '../../../IMAGES/Room/14/5.jpg', '', '3', ''),
(19, 3, 'Good for 14', 6000, '../../../IMAGES/Room/14/2.jpg', '', '3', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `amount`, `date`) VALUES
(1, 25000, '2024-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`) VALUES
(1, 'akasha32@gmail.com', '12345', 'akasha32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penalty`
--
ALTER TABLE `penalty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
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
-- AUTO_INCREMENT for table `amenities`
--
ALTER TABLE `amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penalty`
--
ALTER TABLE `penalty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
