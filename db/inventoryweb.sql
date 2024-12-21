-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Des 2024 pada 06.19
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

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
-- Struktur dari tabel `barang`
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
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `id_satuan`, `id_jenis`, `foto`, `harga_beli`, `harga_jual`) VALUES
('MDN-BRG-0001', 'Teh Gelas 1 Dus', '10', 6, 1, 'R.jpg', 17000, 19000),
('MDN-BRG-0002', 'Rokok Gudang Garam Filter', '0', 5, 4, '1224c564-c026-47f8-a45a-ef3b278b4e23.jpg', 515000, 550000),
('MDN-BRG-0003', 'Aqua Air Mineral 600ml 1 Karton 24 Botol X 600 Ml', '0', 6, 1, '204e4e14-30a3-4eac-a099-f60848d3a623.jpg', 55000, 60000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_keluar`
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
-- Dumping data untuk tabel `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `id_customer`, `id_barang`, `id_user`, `jumlah_keluar`, `tgl_keluar`) VALUES
('MDN-BK-0001', 'MDN-CUS001', 'MDN-BRG-0002', 'USR-001', '2', '2024-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
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
-- Dumping data untuk tabel `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `id_supplier`, `id_barang`, `id_user`, `jumlah_masuk`, `tgl_masuk`) VALUES
('MDN-BM-0001', 'MDN-SUP001', 'MDN-BRG-0002', 'USR-001', 10, '2024-12-21'),
('MDN-BM-0002', 'MDN-SUP001', 'MDN-BRG-0001', 'USR-001', 10, '2024-12-21'),
('MDN-BM-0003', 'MDN-SUP001', 'MDN-BRG-0003', 'USR-002', 10, '2024-12-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id_customer` varchar(10) NOT NULL,
  `nama_customer` varchar(60) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `notelp`, `alamat`) VALUES
('MDN-CUS001', 'CV Babon Sejati', '0877657898', 'Kp Sukarandeg Pagaden Subang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(20) NOT NULL,
  `nama_jenis` varchar(20) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `ket`) VALUES
(1, 'Minuman', ''),
(3, 'Kemasan', ''),
(4, 'Filter', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(20) NOT NULL,
  `nama_satuan` varchar(60) DEFAULT NULL,
  `ket` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `ket`) VALUES
(1, 'Box', ''),
(2, 'Unit', ''),
(4, 'Pack', ''),
(5, 'Slop', ''),
(6, 'Dus', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(60) DEFAULT NULL,
  `notelp` varchar(15) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `notelp`, `alamat`) VALUES
('MDN-SUP001', 'PT Gudang Garam Tbk', '02657748', 'Jl. Jenderal Ahmad Yani, 79, Daerah Khusus Ibukota Jakarta, ID');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
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
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `notelp`, `level`, `password`, `foto`, `status`) VALUES
('USR-001', 'Admin Gudang', 'admin', 'admin@admin.com', '087856123445', 'admin', '0192023a7bbd73250516f069df18b500', 'doni.jpg', 'Aktif'),
('USR-002', 'Staff Gudang', 'gudang', 'gudang@gmail.com', '087817379229', 'gudang', '202446dd1d6028084426867365b0c7a1', 'user.png', 'Aktif'),
('USR-003', 'Manajer', 'manajer', 'manajer@gmail.com', '089291889228', 'manajer', '69b731ea8f289cf16a192ce78a37b4f0', 'user.png', 'Aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
