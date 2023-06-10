-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 01:53 AM
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
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_beli` double NOT NULL,
  `harga_jual` double NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `stok`, `harga_beli`, `harga_jual`) VALUES
(3, 'Barang 3', 222, 123942, 153740135.64),
(6, 'Barang 7', 111, 67655, 45839645.25),
(7, 'Barang 2', 101, 222222, 54231123),
(8, 'Barang 1', 155, 222222, 54231123);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_operasional`
--

CREATE TABLE `biaya_operasional` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biaya_operasional`
--

INSERT INTO `biaya_operasional` (`id`, `nama`, `harga`) VALUES
(1, 'eaafae', 2222),
(2, 'eaafae', 2222),
(3, 'eaafae', 2222),
(4, 'tes', 21),
(5, 'tes', 12321231);

-- --------------------------------------------------------

--
-- Table structure for table `datapemesanan`
--

CREATE TABLE `datapemesanan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tipe_pembayaran` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datapemesanan`
--

INSERT INTO `datapemesanan` (`id`, `nama_perusahaan`, `nama_barang`, `jumlah`, `tipe_pembayaran`, `alamat`) VALUES
(1, 'aegagae', 'Barang 3', 3, 'Kredit', 'Perum 1 kota tangerang'),
(2, 'ageagaegae', 'Barang 1', 33, 'Ansuran', 'Perum 1 kota tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama`) VALUES
(1, 'gudang'),
(2, 'direktur'),
(3, 'keuangan'),
(4, 'pajak'),
(5, 'sales');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `username`, `password`, `nama`, `id_role`) VALUES
(1, 'gudang1', 'gudang1', 'Admin Gudang', 1),
(2, 'direktur', 'direktur', 'maul', 2),
(3, 'pajak', 'pajak', 'orang pajak', 4),
(4, 'keuangan', 'keuangan', 'orang keuangan', 3),
(5, 'sales', 'sales', 'bocah sales', 5);

-- --------------------------------------------------------

--
-- Table structure for table `listpesanan`
--

CREATE TABLE `listpesanan` (
  `id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `nama_pembeli` varchar(200) NOT NULL,
  `kontak_pembeli` varchar(200) NOT NULL,
  `no_hp_pembeli` varchar(20) NOT NULL,
  `alamat_pembeli` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `listpesanan`
--

INSERT INTO `listpesanan` (`id`, `status`, `nama_barang`, `stok`, `nama_pembeli`, `kontak_pembeli`, `no_hp_pembeli`, `alamat_pembeli`) VALUES
(3, 'Selesai', 'Barang 1', 10, 'John Doe', 'john@example.com', '08123456789', 'Jl. Contoh No. 123'),
(5, 'Selesai', 'Barang 1', 98, 'Pembeli 1', 'Kontak 1', 'No. HP 1', 'Alamat 1'),
(6, 'Dibatalkan', 'Barang 1', 44, 'Pembeli 2', 'Kontak 2', 'No. HP 2', 'Alamat 2'),
(7, 'Dibatalkan', 'Barang 1', 9, 'Pembeli 3', 'Kontak 3', 'No. HP 3', 'Alamat 3'),
(8, 'Selesai', 'Barang 1', 46, 'Pembeli 4', 'Kontak 4', 'No. HP 4', 'Alamat 4'),
(9, 'Proses Pengiriman', 'Barang 1', 74, 'Pembeli 5', 'Kontak 5', 'No. HP 5', 'Alamat 5'),
(10, 'Menunggu Konfirmasi ', 'Barang 1', 36, 'Pembeli 6', 'Kontak 6', 'No. HP 6', 'Alamat 6'),
(11, 'Proses Pengiriman', 'Barang 1', 72, 'Pembeli 7', 'Kontak 7', 'No. HP 7', 'Alamat 7'),
(12, 'Menunggu Konfirmasi ', 'Barang 1', 99, 'Pembeli 8', 'Kontak 8', 'No. HP 8', 'Alamat 8'),
(13, 'Menunggu Konfirmasi ', 'Barang 1', 64, 'Pembeli 9', 'Kontak 9', 'No. HP 9', 'Alamat 9'),
(14, 'Menunggu Konfirmasi ', 'Barang 1', 93, 'Pembeli 10', 'Kontak 10', 'No. HP 10', 'Alamat 10'),
(15, 'Menunggu Konfirmasi ', 'Barang 1', 37, 'Pembeli 11', 'Kontak 11', 'No. HP 11', 'Alamat 11'),
(16, 'Menunggu Konfirmasi ', 'Barang 1', 77, 'Pembeli 12', 'Kontak 12', 'No. HP 12', 'Alamat 12'),
(17, 'Menunggu Konfirmasi ', 'Barang 1', 99, 'Pembeli 13', 'Kontak 13', 'No. HP 13', 'Alamat 13'),
(18, 'Menunggu Konfirmasi ', 'Barang 1', 83, 'Pembeli 14', 'Kontak 14', 'No. HP 14', 'Alamat 14'),
(19, 'Menunggu Konfirmasi ', 'Barang 1', 2, 'Pembeli 15', 'Kontak 15', 'No. HP 15', 'Alamat 15'),
(20, 'Menunggu Konfirmasi ', 'Barang 1', 83, 'Pembeli 16', 'Kontak 16', 'No. HP 16', 'Alamat 16'),
(21, 'Menunggu Konfirmasi ', 'Barang 1', 45, 'Pembeli 17', 'Kontak 17', 'No. HP 17', 'Alamat 17'),
(22, 'Menunggu Konfirmasi ', 'Barang 1', 84, 'Pembeli 18', 'Kontak 18', 'No. HP 18', 'Alamat 18'),
(23, 'Menunggu Konfirmasi ', 'Barang 1', 35, 'Pembeli 19', 'Kontak 19', 'No. HP 19', 'Alamat 19'),
(24, 'Menunggu Konfirmasi ', 'Barang 1', 100, 'Pembeli 20', 'Kontak 20', 'No. HP 20', 'Alamat 20'),
(25, 'Menunggu Konfirmasi ', 'Barang 1', 25, 'Pembeli 1', 'Kontak 1', 'No. HP 1', 'Alamat 1'),
(26, 'Menunggu Konfirmasi ', 'Barang 1', 80, 'Pembeli 2', 'Kontak 2', 'No. HP 2', 'Alamat 2'),
(27, 'Menunggu Konfirmasi ', 'Barang 1', 36, 'Pembeli 3', 'Kontak 3', 'No. HP 3', 'Alamat 3'),
(28, 'Menunggu Konfirmasi ', 'Barang 1', 6, 'Pembeli 4', 'Kontak 4', 'No. HP 4', 'Alamat 4'),
(29, 'Menunggu Konfirmasi ', 'Barang 1', 57, 'Pembeli 5', 'Kontak 5', 'No. HP 5', 'Alamat 5'),
(30, 'Menunggu Konfirmasi ', 'Barang 1', 16, 'Pembeli 6', 'Kontak 6', 'No. HP 6', 'Alamat 6'),
(31, 'Menunggu Konfirmasi ', 'Barang 1', 98, 'Pembeli 7', 'Kontak 7', 'No. HP 7', 'Alamat 7'),
(32, 'Menunggu Konfirmasi ', 'Barang 1', 37, 'Pembeli 8', 'Kontak 8', 'No. HP 8', 'Alamat 8'),
(33, 'Menunggu Konfirmasi ', 'Barang 1', 46, 'Pembeli 9', 'Kontak 9', 'No. HP 9', 'Alamat 9'),
(34, 'Menunggu Konfirmasi ', 'Barang 1', 72, 'Pembeli 10', 'Kontak 10', 'No. HP 10', 'Alamat 10'),
(35, 'Menunggu Konfirmasi ', 'Barang 1', 31, 'Pembeli 11', 'Kontak 11', 'No. HP 11', 'Alamat 11'),
(36, 'Menunggu Konfirmasi ', 'Barang 1', 6, 'Pembeli 12', 'Kontak 12', 'No. HP 12', 'Alamat 12'),
(37, 'Menunggu Konfirmasi ', 'Barang 1', 69, 'Pembeli 13', 'Kontak 13', 'No. HP 13', 'Alamat 13'),
(38, 'Menunggu Konfirmasi ', 'Barang 1', 66, 'Pembeli 14', 'Kontak 14', 'No. HP 14', 'Alamat 14'),
(39, 'Menunggu Konfirmasi ', 'Barang 1', 58, 'Pembeli 15', 'Kontak 15', 'No. HP 15', 'Alamat 15'),
(40, 'Menunggu Konfirmasi ', 'Barang 1', 19, 'Pembeli 16', 'Kontak 16', 'No. HP 16', 'Alamat 16'),
(41, 'Menunggu Konfirmasi ', 'Barang 1', 69, 'Pembeli 17', 'Kontak 17', 'No. HP 17', 'Alamat 17'),
(42, 'Menunggu Konfirmasi ', 'Barang 1', 43, 'Pembeli 18', 'Kontak 18', 'No. HP 18', 'Alamat 18'),
(43, 'Menunggu Konfirmasi ', 'Barang 1', 35, 'Pembeli 19', 'Kontak 19', 'No. HP 19', 'Alamat 19'),
(44, 'Menunggu Konfirmasi ', 'Barang 1', 63, 'Pembeli 20', 'Kontak 20', 'No. HP 20', 'Alamat 20'),
(45, 'Menunggu Konfirmasi', 'Barang 1', 33, 'ageagaegae', 'ageagaegae', 'ageagaegae', 'Perum 1 kota tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `pembelianbarang`
--

CREATE TABLE `pembelianbarang` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelianbarang`
--

INSERT INTO `pembelianbarang` (`id`, `id_barang`, `jumlah`, `total_harga`) VALUES
(1, 8, 100, 22222200),
(2, 8, 100, 22222200),
(3, 7, 100, 22222200),
(7, 7, 3, 63),
(8, 8, 100, 22222200),
(9, 8, 100, 22222200),
(10, 7, 1, 1000),
(11, 7, 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `permintaanbeli`
--

CREATE TABLE `permintaanbeli` (
  `id` int(11) NOT NULL,
  `idKaryawan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL DEFAULT 'lusin',
  `banyak` int(11) NOT NULL DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `biaya_operasional`
--
ALTER TABLE `biaya_operasional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `datapemesanan`
--
ALTER TABLE `datapemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `listpesanan`
--
ALTER TABLE `listpesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelianbarang`
--
ALTER TABLE `pembelianbarang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permintaanbeli`
--
ALTER TABLE `permintaanbeli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `biaya_operasional`
--
ALTER TABLE `biaya_operasional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `datapemesanan`
--
ALTER TABLE `datapemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `listpesanan`
--
ALTER TABLE `listpesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pembelianbarang`
--
ALTER TABLE `pembelianbarang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permintaanbeli`
--
ALTER TABLE `permintaanbeli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `jabatan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
