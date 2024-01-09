-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2024 at 05:25 PM
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
-- Database: `jci_bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `duel`
--

CREATE TABLE `duel` (
  `id_duel` int(11) NOT NULL,
  `jeux_duel` text DEFAULT NULL,
  `tirage_duel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `solo`
--

CREATE TABLE `solo` (
  `id_solo` int(11) NOT NULL,
  `jeux_solo` text NOT NULL,
  `tirage_solo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `duel`
--
ALTER TABLE `duel`
  ADD PRIMARY KEY (`id_duel`);

--
-- Indexes for table `solo`
--
ALTER TABLE `solo`
  ADD PRIMARY KEY (`id_solo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `duel`
--
ALTER TABLE `duel`
  MODIFY `id_duel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `solo`
--
ALTER TABLE `solo`
  MODIFY `id_solo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
