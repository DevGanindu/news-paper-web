-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2024 at 06:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newspaper`
--

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(6) NOT NULL,
  `head` varchar(40) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



--
-- Table structure for table `entertainment`
--

CREATE TABLE `entertainment` (
  `id` int(6) NOT NULL,
  `head` varchar(40) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Table structure for table `journalist`
--

CREATE TABLE `journalist` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `journalist`
--

INSERT INTO `journalist` (`id`, `f_name`, `l_name`, `email`, `pass`) VALUES
(1, 'Ganindu', 'Methsara', 'afafafaf@sds.com', 'ganindu1234'),
(2, 'Rumal', 'Methsan', 'rumal200243@gmail.com', 'rumal1234'),
(3, 'Himash', 'Heshan', 'himash23452@gmail.com', 'himash1234');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(6) NOT NULL,
  `head` varchar(500) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--
-- Table structure for table `politics`
--

CREATE TABLE `politics` (
  `id` int(6) NOT NULL,
  `head` varchar(40) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--


--
-- Table structure for table `sport`
--

CREATE TABLE `sport` (
  `id` int(6) NOT NULL,
  `head` varchar(40) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sport`
--



--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `id` int(6) NOT NULL,
  `head` varchar(40) NOT NULL,
  `content` varchar(3000) NOT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `j_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--

-- Indexes for dumped tables
--

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head` (`head`);

--
-- Indexes for table `entertainment`
--
ALTER TABLE `entertainment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head` (`head`);

--
-- Indexes for table `journalist`
--
ALTER TABLE `journalist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head` (`head`);

--
-- Indexes for table `politics`
--
ALTER TABLE `politics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head` (`head`);

--
-- Indexes for table `sport`
--
ALTER TABLE `sport`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head` (`head`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `head` (`head`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entertainment`
--
ALTER TABLE `entertainment`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `journalist`
--
ALTER TABLE `journalist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `politics`
--
ALTER TABLE `politics`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sport`
--
ALTER TABLE `sport`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `travel`
--
ALTER TABLE `travel`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
