-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 04:40 PM
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
-- Database: `sneakers`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `telepon` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `jenis` varchar(200) NOT NULL,
  `ukuran` varchar(200) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `nama`, `email`, `telepon`, `foto`, `jenis`, `ukuran`, `alamat`) VALUES
(16, 'neymar jr', 'neyymar@gmail.com', '089626033902', '64313ae199072.jpg', 'red hawk', '41', 'prigi lama rt.004/002 kel.prigi lama kec.pondok aren tangerang selatan'),
(18, 'sandi', 'wdad', 'dwadwa', '6431705bf02d6.jpg', 'ddwa', 'dwadwa', 'dwadwa');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'herlandi', 'herlandi619@gmail.com', '$2y$10$k3yrJAueq.ouSCvCfwqLf.yip.sZyCvB.yudJXUNQPqyvfGpzZ2Pq'),
(9, 'muklis', 'muklis@gmail.com', '$2y$10$Utzr2eVxMFpfjgaDkYoevOKnY2Da6ZUe7/YNDmE30uJ7OGMdceSie'),
(10, 'admin', 'admin', '$2y$10$iYNJTNkBA.s2B0GY0X.f3OnMee71HKImAq888xqauMU9HexuDuzYW'),
(11, 'vava', 'vava', '$2y$10$iSzMfz/ANHF439d6i7fBCe0aBE15Ri43YhVTwz1aqS4NppoRE5rG.'),
(12, 'red', 'red', '$2y$10$RzNDrMdYFMf1aS8x9SnM3.mcHAVM8Gc95mzp57n1fAjl5Evqrj4Ii'),
(13, 'sandi', 'sandi', '$2y$10$8E2dzdtKK.U2ffi7VSy/7.4FNpUOury12YdMeJFR8W5Am4rRPUPTG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
