-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2024 at 09:18 AM
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
-- Database: `rpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `bioskop`
--

CREATE TABLE `bioskop` (
  `transactionNumber` varchar(50) NOT NULL,
  `movie` varchar(100) NOT NULL,
  `seats` int(100) NOT NULL,
  `totalPrice` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bioskop`
--

INSERT INTO `bioskop` (`transactionNumber`, `movie`, `seats`, `totalPrice`) VALUES
('TRX194', 'Joker', 10, 450000),
('TRX199', 'Titanic', 1, 50000),
('TRX211', 'Jurassic Park', 1, 60000),
('TRX240', 'Toy Story', 2, 80000),
('TRX313', 'Jurassic Park', 2, 120000),
('TRX356', 'The Lion King', 1, 55000),
('TRX404', 'Spider-Man: Far From Home', 3, 180000),
('TRX474', 'Jurassic Park', 1, 60000),
('TRX492', 'Avengers: Endgame', 8, 400000),
('TRX546', 'Toy Story', 5, 200000),
('TRX579', 'Avatar', 2, 90000),
('TRX607', 'Avatar', 4, 180000),
('TRX679', 'Finding Nemo', 4, 180000),
('TRX691', 'Joker', 10, 450000),
('TRX717', 'Spider-Man: Far From Home', 3, 180000),
('TRX766', 'Black Panther', 3, 165000),
('TRX813', 'Black Panther', 1, 55000),
('TRX838', 'Jurassic Park', 1, 60000),
('TRX854', 'Titanic', 6, 300000),
('TRX857', 'Titanic', 2, 100000),
('TRX886', 'Titanic', 2, 100000),
('TRX9', 'Black Panther', 8, 440000),
('TRX908', 'Avatar', 3, 135000),
('TRX991', 'Jurassic Park', 1, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id_nama` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id_nama`, `username`, `password`) VALUES
(0, 'fiby', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bioskop`
--
ALTER TABLE `bioskop`
  ADD PRIMARY KEY (`transactionNumber`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
