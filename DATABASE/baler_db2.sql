-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2024 at 03:26 PM
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
  `price` int(11) NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
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

INSERT INTO `bookings` (`id`, `reference_no`, `price`, `check_in`, `check_out`, `first_name`, `last_name`, `email`, `address`, `contact`, `additional_pax`, `total`, `balance`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(15, 4219975, 0, '2024-10-05 13:00:00', '2024-10-12 00:00:00', 'Kamotenggg', 'Kahoyya', 'broken data', 'full street address', 'me@mydomain.com', 350, 68350, 0, 0, '2024-10-04 10:26:51', NULL, NULL),
(16, 7558201, 0, '2024-10-05 00:00:00', '2024-10-12 00:00:00', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 350, 68350, 0, 0, '2024-10-04 10:29:14', NULL, NULL),
(17, 9007144, 0, '2024-10-05 00:00:00', '2024-10-07 00:00:00', 'Michael', 'Adriane', 'kasd', 'kasd', 'kasd', 700, 65300, 0, 0, '2024-10-04 10:31:41', NULL, NULL),
(18, 5993422, 0, '2024-10-05 00:00:00', '2024-10-07 00:00:00', 'kasd', 'kasd', 'kasd', 'kasd', 'kasd', 700, 65300, 0, 0, '2024-10-04 10:31:58', NULL, NULL),
(19, 9151262, 0, '2024-10-05 00:00:00', '2024-10-12 00:00:00', 'Michael', 'Nabong', 'nabongmichaeladriane@gmail.com', '150 Balut', '+639677163126', 0, 40000, 0, 0, '2024-10-04 10:41:36', NULL, NULL),
(21, 6670896, 0, '2024-10-12 00:00:00', '2024-10-19 00:00:00', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 350, 35350, 0, 0, '2024-10-11 14:57:02', NULL, NULL),
(22, 4257591, 0, '2024-10-14 00:00:00', '2024-10-16 00:00:00', 'my first name', 'my last name', 'me@mydomain.com', 'full street address', 'me@mydomain.com', 350, 5350, 0, 0, '2024-10-13 06:49:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_amenities`
--

CREATE TABLE `booking_amenities` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_discounts`
--

CREATE TABLE `booking_discounts` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `id_number` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `booking_rooms`
--

CREATE TABLE `booking_rooms` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `pax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `price`, `image`, `description`, `type`, `pax`) VALUES
(1, 'Good for 2', 1400, '../../../IMAGES/nab.jpg', 'Lorem Ipsum', '1', 2),
(2, 'Good for 4', 2500, '../../../IMAGES/hao.jpg', 'Loremm', '1', 8),
(3, 'Good for 5', 5000, '../../../IMAGES/jeff.jpg', 'Lorem Ipsum', '2', 14),
(4, 'Good for 6', 3500, '../../../IMAGES/shayne.jpeg', 'Lorem Ipsum', '2', 6),
(5, 'Good for 8', 4000, '../../../IMAGES/prec.jpg', 'Lorem ipsum', '2', 8),
(6, 'Good for 10', 4500, '../../../IMAGES/room.jpg', 'Lorem', '3', 10),
(7, 'Good for 12 ', 5000, '../../../IMAGES/new.png', 'Lorem', '3', 12),
(8, 'Good for 14', 6000, '../../../IMAGES/sgag.png', 'Lorem', '3', 14);

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
-- Indexes for table `booking_amenities`
--
ALTER TABLE `booking_amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_rooms`
--
ALTER TABLE `booking_rooms`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `booking_amenities`
--
ALTER TABLE `booking_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_rooms`
--
ALTER TABLE `booking_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
