-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2018 at 11:38 PM
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
-- Database: `inn`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL,
  `imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`, `disponibles`, `imagen`) VALUES
(1, 'Razer Blade ', 2, 'razerblade.jpg'),
(2, 'NVIDIA GTX 1080', 0, 'gtx1080.jpg'),
(3, 'AMD Radeon RX480', 2, 'rx480.jpg'),
(4, 'hp SPECTRE', 3, NULL),
(5, 'hp SPECTRE', 3, NULL),
(6, 'Lenovo thinkpad', 2, NULL),
(7, 'LG TV', 4, NULL),
(8, 'Amazon fire', 5, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
