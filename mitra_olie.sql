-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 06:18 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitra_olie`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `plat_nomor` varchar(20) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_servis` datetime DEFAULT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `name`, `username`, `password`, `alamat`, `no_telepon`, `plat_nomor`, `tanggal_daftar`, `tanggal_servis`, `user_level`) VALUES
(28, 'User', 'user', 'e10adc3949ba59abbe56e057f20f883e', 'candi', '123456', 'B 9900 P', '2021-12-28 17:33:14', '2021-12-28 17:33:14', 0),
(29, 'Mekanik', 'mekanik', 'e10adc3949ba59abbe56e057f20f883e', 'alamat mekanik', '01239812387', 'B 9879 LL', '2021-12-28 18:27:03', '2021-12-28 18:27:03', 3),
(30, 'Owner', 'owner', 'e10adc3949ba59abbe56e057f20f883e', 'owner alamat', '081239123111', 'B AJA', '2021-12-28 19:08:55', '2021-12-28 19:08:55', 2),
(31, 'Pelanggan', 'pelanggan', 'e10adc3949ba59abbe56e057f20f883e', 'jalan candi gang 2', '08123123124', 'N 1234 OO', '2022-01-23 17:19:35', '2022-01-23 17:19:35', 0),
(32, 'Pelanggan 2', 'pelanggan2', 'e10adc3949ba59abbe56e057f20f883e', 'candi', '08981238722', 'BABI', '2022-01-23 17:23:15', '2022-01-23 17:23:15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukkan`
--

CREATE TABLE `pemasukkan` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `jumlah_masuk` int(4) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_terpakai` tinyint(1) DEFAULT NULL,
  `sisa_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemasukkan`
--

INSERT INTO `pemasukkan` (`id`, `kode_transaksi`, `id_stok`, `jumlah_masuk`, `deskripsi`, `created_at`, `updated_at`, `status_terpakai`, `sisa_stok`) VALUES
(52, 'M00001', 138, 100, 'coba masuk 100', '2022-07-04 14:08:39', '2022-07-04 14:08:39', NULL, 100),
(53, 'M00002', 139, 200, 'coba masuk 200', '2022-07-04 14:09:04', '2022-07-04 14:09:04', NULL, 200),
(54, 'M00003', 146, 150, 'coba masuk 150', '2022-07-04 14:09:17', '2022-07-04 14:09:17', NULL, 150),
(55, 'M00004', 363, 250, 'coba masuk 250', '2022-07-04 14:09:28', '2022-07-04 14:09:28', NULL, 250);

--
-- Triggers `pemasukkan`
--
DELIMITER $$
CREATE TRIGGER `delete_pemasukkan` AFTER DELETE ON `pemasukkan` FOR EACH ROW BEGIN
UPDATE stok_barang SET jumlah_barang = jumlah_barang - OLD.jumlah_masuk WHERE id = OLD.id_stok;
UPDATE stok_barang SET total_transaksi_masuk = total_transaksi_masuk - 1 WHERE id = OLD.id_stok;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_pemasukkan` AFTER INSERT ON `pemasukkan` FOR EACH ROW BEGIN 
UPDATE stok_barang SET jumlah_barang = jumlah_barang + NEW.jumlah_masuk WHERE id = NEW.id_stok;
UPDATE stok_barang SET total_transaksi_masuk = total_transaksi_masuk + 1 WHERE id = NEW.id_stok;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_pemasukkan` AFTER UPDATE ON `pemasukkan` FOR EACH ROW BEGIN
UPDATE stok_barang SET jumlah_barang = jumlah_barang - OLD.jumlah_masuk + NEW.jumlah_masuk WHERE id = OLD.id_stok;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `jumlah_keluar` int(4) DEFAULT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `plat_nomor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `kode_transaksi`, `id_stok`, `jumlah_keluar`, `deskripsi`, `created_at`, `updated_at`, `username`, `status`, `plat_nomor`) VALUES
(44, 'K00001', 146, 2, 'coba', '2022-07-04 17:24:58', '2022-07-04 17:28:44', 'pelanggan', 'selesai', 'N 1234 OO'),
(45, 'K00002', 138, 3, 'coba 2', '2022-07-04 17:28:05', '2022-07-04 17:28:34', 'user', 'selesai', 'B 9900 P'),
(46, 'K00003', 139, 1, 'coba 3', '2022-07-04 17:29:10', '2022-07-13 04:45:35', 'pelanggan', 'selesai', 'N 1234 UU'),
(47, 'K00004', 363, 0, 'mari kita coba', '2022-07-13 04:48:54', '2022-07-13 04:48:54', 'user', 'baru', 'B 9900 PA'),
(48, 'K00005', 138, 1, 'ini coba dari admin lagi', '2022-07-13 05:10:58', '0000-00-00 00:00:00', 'admin', 'selesai', 'coba dari admin');

--
-- Triggers `pengeluaran`
--
DELIMITER $$
CREATE TRIGGER `delete_sisa_stok_ketika_edit_pengeluaran` AFTER DELETE ON `pengeluaran` FOR EACH ROW BEGIN
UPDATE stok_barang SET jumlah_barang = jumlah_barang + OLD.jumlah_keluar WHERE id = OLD.id_stok; 
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_stok_ketika_edit_pengeluaran` AFTER UPDATE ON `pengeluaran` FOR EACH ROW BEGIN
UPDATE stok_barang SET jumlah_barang = jumlah_barang + OLD.jumlah_keluar - NEW.jumlah_keluar WHERE id = OLD.id_stok;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `stok_barang`
--

CREATE TABLE `stok_barang` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(20) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `total_transaksi_masuk` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stok_barang`
--

INSERT INTO `stok_barang` (`id`, `nama_barang`, `jumlah_barang`, `harga`, `deskripsi`, `created_at`, `updated_at`, `total_transaksi_masuk`) VALUES
(138, 'Oli Samping', 96, '75000', 'Ini adalah Oli Samping edited', '2021-12-01 11:13:37', '0000-00-00 00:00:00', 1),
(139, 'Oli Gardan', 199, '75000', 'Oli Garda pertama', '2021-12-06 11:13:35', '0000-00-00 00:00:00', 1),
(146, 'Oli Mesin', 148, '75000', 'Oli mesin nih', '2021-12-09 11:13:28', '2021-12-15 05:13:07', 1),
(363, 'Oli percobaan', 250, '35000', 'ini coba coba', '2022-06-13 17:08:12', '2022-06-13 17:08:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `id_mobil` varchar(5) NOT NULL,
  `no_plat` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `no_plat`, `nama`) VALUES
('00001', 'asd', 'yabes');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(12) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  `tanggal_daftar` datetime DEFAULT NULL,
  `tanggal_servis` datetime DEFAULT NULL,
  `user_level` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `alamat`, `no_telepon`, `plat_nomor`, `tanggal_daftar`, `tanggal_servis`, `user_level`) VALUES
(1, 'Elloy Yabest', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', NULL, NULL, 1),
(23, 'User', 'user', 'e10adc3949ba59abbe56e057f20f883e', 'candi', '123456', 'B 9900 P', '2021-12-28 17:33:14', '2021-12-28 17:33:14', 0),
(24, 'Mekanik', 'mekanik', 'e10adc3949ba59abbe56e057f20f883e', 'alamat mekanik', '01239812387', 'B 9879 LL', '2021-12-28 18:27:03', '2021-12-28 18:27:03', 3),
(25, 'Owner', 'owner', 'e10adc3949ba59abbe56e057f20f883e', 'owner alamat', '081239123111', 'B AJA', '2021-12-28 19:08:55', '2021-12-28 19:08:55', 2),
(26, 'Pelanggan', 'pelanggan', 'e10adc3949ba59abbe56e057f20f883e', 'jalan candi gang 2', '08123123124', 'N 1234 OO', '2022-01-23 17:19:35', '2022-01-23 17:19:35', 0),
(27, 'Pelanggan 2', 'pelanggan2', 'e10adc3949ba59abbe56e057f20f883e', 'candi', '08981238722', 'BABI', '2022-01-23 17:23:15', '2022-01-23 17:23:15', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_transaksi` (`kode_transaksi`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `stok_barang`
--
ALTER TABLE `stok_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `stok_barang`
--
ALTER TABLE `stok_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=364;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
