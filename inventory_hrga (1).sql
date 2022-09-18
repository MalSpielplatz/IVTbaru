-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 08:09 AM
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
-- Database: `inventory_hrga`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(10) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `kategori` int(50) NOT NULL,
  `tgl_produksi` date NOT NULL,
  `bahan` varchar(225) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `harga` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `jenis_barang`, `kategori`, `tgl_produksi`, `bahan`, `qty`, `satuan`, `harga`) VALUES
('0123ds', 'Besi bakar', 'langka', 1, '2022-09-18', 'BS1', '5', 'kg', ''),
('12312124', '12124124', '124124', 1, '2022-09-18', 'P31412', '5', 'ton', ''),
('a1', 'prdk-1', 'jns-1', 0, '0000-00-00', 'a1', '-6', 'ton', '1000'),
('a2', 'a2', '2', 2, '2022-09-18', 'a1', '0', 'ds', ''),
('a3', 'a3', 'a3', 3, '2022-09-18', 'a1', '-8', 'sa', ''),
('a4', 'a2 x 2 = a4', 'a', 2, '2022-09-19', 'a2', '1', 'fd', ''),
('awok', 'polong', 'besi', 0, '2022-09-18', 'a3', '0', 'TON', ''),
('besiprotot', 'awok', 'logam', 0, '2022-09-18', 'a1', '0', 'TON', ''),
('BS1', '2wqe', 'aduh', 0, '0000-00-00', 'BS1', '5', 'kg', '8000000'),
('BS3', 'besi mentah', 'besi', 0, '0000-00-00', 'BS3', '0', 'ton', '200000000'),
('BS4', 'baja mentah', 'besi', 0, '0000-00-00', 'BS4', '6', 'ton', '210000000'),
('P123124', 'itulah pokonya', 'wikwok', 1, '2022-09-18', 'BS1', '5', 'kg', ''),
('P31412', 'Tepung', 'awok', 0, '2022-09-18', 'BS3', '0', 'ton', ''),
('waokwo', 'kiawok', 'besi', 0, '0000-00-00', 'waokwo', '5', '2', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `rack_no` varchar(50) NOT NULL,
  `id_produk` varchar(50) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `qty` varchar(10) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `status` varchar(5) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `note` varchar(255) NOT NULL,
  `entry` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `rack_no`, `id_produk`, `nama_produk`, `qty`, `satuan`, `status`, `pic`, `note`, `entry`) VALUES
(9, '2022-09-17', '2', 'a1', 'PRODUK-01', '5', 'pcs', 'OUT', 's', 's', 'erika takagawa'),
(10, '2022-09-18', '123', 'besiprotot', 'awok', '10', 'TON', 'OUT', '', '', 'Administrator'),
(11, '2022-09-18', '', 'awok', 'polong', '9', 'TON', 'OUT', '', '', 'Administrator'),
(12, '2022-09-18', '', '12309239', 'BESI NYOKEM', '9', 'TON', 'IN', '', '', 'Administrator'),
(13, '2022-09-18', '', 'fktyu', 'pakyu a5', '10', 'kg', 'OUT', '', '', 'Administrator'),
(14, '2022-09-18', '', '12312', 'aszx', '1', '8', 'OUT', '', '', 'Administrator'),
(15, '2022-09-18', '', '12312', 'aszx', '1', '8', 'OUT', '', '', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fullname`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Administrator', 'admin'),
(2, 'erika', '8cb2237d0679ca88db6464eac60da96345513964', 'erika takagawa', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
