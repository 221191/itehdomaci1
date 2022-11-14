-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2022 at 05:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pozoriste`
--
CREATE DATABASE IF NOT EXISTS `pozoriste` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pozoriste`;

-- --------------------------------------------------------

--
-- Table structure for table `glumac`
--

CREATE TABLE `glumac` (
  `id` int(10) NOT NULL,
  `ime` varchar(50) NOT NULL,
  `prezime` varchar(50) NOT NULL,
  `predstava_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `glumac`
--

INSERT INTO `glumac` (`id`, `ime`, `prezime`, `predstava_id`) VALUES
(1, 'Mika', 'Mikic', 2),
(2, 'Pera', 'Peric', 2),
(3, 'Zika', 'Zikic', 3);

-- --------------------------------------------------------

--
-- Table structure for table `predstava`
--

CREATE TABLE `predstava` (
  `id` int(11) NOT NULL,
  `naziv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `predstava`
--

INSERT INTO `predstava` (`id`, `naziv`) VALUES
(1, 'Otelo'),
(2, 'Cekaonica'),
(3, 'Zmajeubice');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `glumac`
--
ALTER TABLE `glumac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `glumac_predstava_foreign_key` (`predstava_id`);

--
-- Indexes for table `predstava`
--
ALTER TABLE `predstava`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `glumac`
--
ALTER TABLE `glumac`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `predstava`
--
ALTER TABLE `predstava`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `glumac`
--
ALTER TABLE `glumac`
  ADD CONSTRAINT `glumac_predstava_foreign_key` FOREIGN KEY (`predstava_id`) REFERENCES `predstava` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
