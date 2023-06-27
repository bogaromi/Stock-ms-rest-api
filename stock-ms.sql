-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 04:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock-ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `partner_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `description`, `partner_id`, `price`, `status`, `created`) VALUES
(1, 'Vonalzó', '30 cm-es vonalzó műanyag', 0, 456, 1, '2023-03-05 17:38:04'),
(2, 'Hajszárító', '3 fokozatú hajszárító', 0, 9650, 1, '2023-03-04 17:38:04'),
(4, 'Fakanál', 'lorem ipszum', 0, 655822, 1, '2023-03-08 18:49:39'),
(5, 'Kalapács', 'kis kalapács apróbb munkákhoz', 13, 2500, 1, '2023-06-12 00:08:28');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `contact`, `status`, `created`) VALUES
(1, 'Teszt Kft', 'test.kft@info.com', 1, '2023-03-05 18:14:59'),
(2, 'Új Partner Bt', 'new.p@info.com', 1, '2023-03-05 18:14:59'),
(4, 'Gyorsabb Bt', 'speed@info.hu', 1, '2023-03-09 21:47:34'),
(6, 'Aknilatak Kft', 'aknilatak_kft@info.hu', 1, '2023-03-09 22:04:31'),
(7, 'Teszt 11 Bt', 'teszt11bt@info.hu', 1, '2023-06-12 21:47:51'),
(8, 'Teszt 23 kft', 'teszt23kft@info.hu', 2, '2023-06-23 09:30:17');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `store` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `item_name`, `quantity`, `unit`, `price`, `store`, `status`, `created`, `updated`) VALUES
(3, 'Valamilyen termék', 22, ' kg', 999, 1, 0, '2023-03-01 22:13:04', '2023-03-09 22:14:04'),
(4, 'Termék kettő', 22, 'db', 0, 2, 0, '2023-06-10 00:00:00', '2023-06-10 23:59:35'),
(5, 'Termék Három', 333, 'm', 555, 2, 0, '2023-06-10 00:00:00', '2023-06-11 00:02:26'),
(6, 'Fényképező gép', 2, 'db', 125000, 3, 0, '2023-05-29 00:00:00', '2023-06-11 23:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'Admin', '1234', 1),
(3, 'Hidden user', 'hidden', 2),
(4, 'new guest', 'guest', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
