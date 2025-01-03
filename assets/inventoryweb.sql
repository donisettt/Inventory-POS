-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2025 at 05:49 PM
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
-- Database: `inventoryweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(60) DEFAULT NULL,
  `stok` varchar(4) DEFAULT NULL,
  `id_satuan` int(20) DEFAULT NULL,
  `id_jenis` int(20) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `id_satuan`, `id_jenis`, `foto`, `harga_beli`, `harga_jual`) VALUES
('MDN-BRG-0001', 'Teh Gelas 1 Dus', '10', 6, 1, 'R.jpg', 17000, 19000),
('MDN-BRG-0002', 'Rokok Gudang Garam Filter', '2', 5, 4, '1224c564-c026-47f8-a45a-ef3b278b4e23.jpg', 515000, 550000),
('MDN-BRG-0003', 'Aqua Air Mineral 600ml 1 Karton 24 Botol X 600 Ml', '0', 6, 1, '204e4e14-30a3-4eac-a099-f60848d3a623.jpg', 55000, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` varchar(30) NOT NULL,
  `id_customer` varchar(30) NOT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_keluar` varchar(5) DEFAULT NULL,
  `tgl_keluar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_customer`, `id_barang`, `id_user`, `jumlah_keluar`, `tgl_keluar`) VALUES
('MDN-BK-0001', 'MDN-CUS-0002', 'MDN-BRG-0002', 'USR-001', '3', '2025-01-03'),
('MDN-BK-0002', 'MDN-CUS-0001', 'MDN-BRG-0002', 'USR-001', '2', '2025-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` varchar(40) NOT NULL,
  `id_supplier` varchar(30) DEFAULT NULL,
  `id_barang` varchar(30) DEFAULT NULL,
  `id_user` varchar(30) DEFAULT NULL,
  `jumlah_masuk` int(10) DEFAULT NULL,
  `tgl_masuk` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_supplier`, `id_barang`, `id_user`, `jumlah_masuk`, `tgl_masuk`) VALUES
('MDN-BM-0001', 'MDN-SUP-0002', 'MDN-BRG-0002', 'USR-001', 10, '2025-01-03');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(15) NOT NULL,
  `nama_customer` varchar(60) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `notelp`, `alamat`) VALUES
('MDN-CUS-0001', 'CV. Mulia Sejahtera', '087865647832', 'Sukarandeg, Subang'),
('MDN-CUS-0002', 'CV. Alfin Maju Bersama', '085217208593', 'Sukajadi, Bandung 41287');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(20) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `ket`) VALUES
(1, 'Minuman', ''),
(3, 'Kemasan', ''),
(4, 'Filter', '');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(20) NOT NULL,
  `nama_satuan` varchar(60) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `ket`) VALUES
(1, 'Box', ''),
(2, 'Unit', ''),
(4, 'Pack', ''),
(5, 'Slop', ''),
(6, 'Dus', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(60) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `notelp`, `alamat`) VALUES
('MDN-SUP-0001', 'PT Wings', '026544352', 'Pagaden, Subang'),
('MDN-SUP-0002', 'PT Gudang Garam Tbk', '02675435241', 'Jababeka, CIkarang Utara');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `level` enum('gudang','admin','manajer') NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `notelp`, `level`, `password`, `foto`, `status`) VALUES
('USR-001', 'Admin Gudang', 'admin', 'admin@admin.com', '087856123445', 'admin', '0192023a7bbd73250516f069df18b500', 'doni.jpg', 'Aktif'),
('USR-002', 'Staff Gudang', 'gudang', 'gudang@gmail.com', '087817379229', 'gudang', '202446dd1d6028084426867365b0c7a1', 'user.png', 'Aktif'),
('USR-003', 'Manajer Ariyan', 'manajer', 'manajer@gmail.com', '089291889228', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'WhatsApp_Image_2024-07-05_at_07_43_37_8327c91d.jpg', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
