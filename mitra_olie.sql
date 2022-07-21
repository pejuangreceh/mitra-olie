-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2022 at 06:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
(1, 'M00001', 138, 100, 'Stok Olie Samping Bulan Agustus', '2021-08-01 19:09:16', '2021-08-01 19:09:16', NULL, 100),
(2, 'M00002', 139, 150, 'Stok Olie Gardan Bulan Agustus', '2021-08-01 19:09:16', '2021-08-01 19:09:16', NULL, 150),
(3, 'M00003', 146, 200, 'Stok Olie Mesin Bulan Agustus', '2021-08-01 19:09:16', '2021-08-01 19:09:16', NULL, 200),
(4, 'M00004', 138, 135, 'Stok Olie Samping Bulan September', '2021-09-01 19:09:16', '2021-09-01 19:09:16', NULL, 135),
(5, 'M00005', 139, 200, 'Stok Olie Gardan Bulan September', '2021-09-01 19:09:16', '2021-09-01 19:09:16', NULL, 200),
(6, 'M00006', 146, 150, 'Stok Olie Mesin Bulan September', '2021-09-01 19:09:16', '2021-09-01 19:09:16', NULL, 150),
(7, 'M00007', 138, 125, 'Stok Olie Samping Bulan Oktober', '2021-10-01 19:09:16', '2021-10-01 19:09:16', NULL, 125),
(8, 'M00008', 139, 225, 'Stok Olie Gardan Bulan Oktober', '2021-10-01 19:09:16', '2021-10-01 19:09:16', NULL, 225),
(9, 'M00009', 146, 100, 'Stok Olie Mesin Bulan Oktober', '2021-10-01 19:09:16', '2021-10-01 19:09:16', NULL, 100),
(10, 'M00010', 138, 250, 'Stok Olie Samping Bulan November', '2021-11-01 19:09:16', '2021-11-01 19:09:16', NULL, 250),
(11, 'M00011', 139, 175, 'Stok Olie Gardan Bulan November', '2021-11-01 19:09:16', '2021-11-01 19:09:16', NULL, 175),
(12, 'M00012', 146, 300, 'Stok Olie Mesin Bulan November', '2021-11-01 19:09:16', '2021-11-01 19:09:16', NULL, 300),
(13, 'M00013', 138, 320, 'Stok Olie Samping Bulan Desember', '2021-12-01 19:09:16', '2021-12-01 19:09:16', NULL, 320),
(14, 'M00014', 139, 175, 'Stok Olie Gardan Bulan Desember', '2021-12-01 19:09:16', '2021-12-01 19:09:16', NULL, 175),
(15, 'M00015', 146, 250, 'Stok Olie Mesin Bulan Desember', '2021-12-01 19:09:16', '2021-12-01 19:09:16', NULL, 250),
(16, 'M00016', 138, 225, 'Stok Olie Samping Bulan Januari', '2022-01-01 19:09:16', '2022-01-01 19:09:16', NULL, 225),
(17, 'M00017', 139, 200, 'Stok Olie Gardan Bulan Januari', '2022-01-01 19:09:16', '2022-01-01 19:09:16', NULL, 200),
(18, 'M00018', 146, 265, 'Stok Olie Mesin Bulan Januari', '2022-01-01 19:09:16', '2022-01-01 19:09:16', NULL, 265),
(19, 'M00019', 138, 200, 'Stok Olie Samping Bulan Februari', '2022-02-01 19:09:16', '2022-02-01 19:09:16', NULL, 200),
(20, 'M00020', 139, 150, 'Stok Olie Gardan Bulan Februari', '2022-02-01 19:09:16', '2022-02-01 19:09:16', NULL, 150),
(21, 'M00021', 146, 100, 'Stok Olie Mesin Bulan Februari', '2022-02-01 19:09:16', '2022-02-01 19:09:16', NULL, 100),
(22, 'M00022', 138, 100, 'Stok Olie Samping Bulan Maret', '2022-03-01 19:09:16', '2022-03-01 19:09:16', NULL, 100),
(23, 'M00023', 139, 150, 'Stok Olie Gardan Bulan Maret', '2022-03-01 19:09:16', '2021-03-01 19:09:16', NULL, 150),
(24, 'M00024', 146, 150, 'Stok Olie Mesin Bulan Maret', '2022-03-01 19:09:16', '2022-03-01 19:09:16', NULL, 150),
(25, 'M00025', 138, 150, 'Stok Olie Samping Bulan April', '2022-04-01 19:09:16', '2022-04-01 19:09:16', NULL, 150),
(26, 'M00026', 139, 225, 'Stok Olie Gardan Bulan April', '2022-04-01 19:09:16', '2022-04-01 19:09:16', NULL, 225),
(27, 'M00027', 146, 180, 'Stok Olie Mesin Bulan April', '2022-04-01 19:09:16', '2022-04-01 19:09:16', NULL, 180),
(28, 'M00028', 138, 200, 'Stok Olie Samping Bulan Mei', '2022-05-01 19:09:16', '2022-05-01 19:09:16', NULL, 200),
(29, 'M00029', 139, 300, 'Stok Olie Gardan Bulan Mei', '2022-05-01 19:09:16', '2021-05-01 19:09:16', NULL, 300),
(30, 'M00030', 146, 150, 'Stok Olie Mesin Bulan Mei', '2022-05-01 19:09:16', '2022-05-01 19:09:16', NULL, 150),
(31, 'M00031', 138, 250, 'Stok Olie Samping Bulan Juni', '2022-06-01 19:09:16', '2022-06-01 19:09:16', NULL, 250),
(32, 'M00032', 139, 150, 'Stok Olie Gardan Bulan Juni', '2022-06-01 19:09:16', '2021-06-01 19:09:16', NULL, 150),
(33, 'M00033', 146, 230, 'Stok Olie Mesin Bulan Juni', '2022-06-01 19:09:16', '2022-06-01 19:09:16', NULL, 230),
(40, 'M00034', 146, 200, 'pemasukkan oli Mesin bulan Juli', '2022-07-21 05:30:30', '2022-07-21 05:30:30', NULL, 200),
(41, 'M00035', 139, 250, 'pemasukkan oli Gardan bulan Juli', '2022-07-21 05:32:26', '2022-07-21 05:32:26', NULL, 250),
(42, 'M00036', 138, 150, 'pemasukkan oli samping bulan Juli', '2022-07-21 05:42:14', '2022-07-21 05:42:14', NULL, 150);

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
-- Table structure for table `peramalan`
--

CREATE TABLE `peramalan` (
  `id` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `kode_transaksi` varchar(20) NOT NULL,
  `ramal_1` int(11) NOT NULL,
  `ramal_2` int(4) NOT NULL,
  `ramal_3` int(4) NOT NULL,
  `ramal_4` int(4) NOT NULL,
  `ramal_5` int(4) NOT NULL,
  `ramal_6` int(4) NOT NULL,
  `ramal_7` int(4) NOT NULL,
  `ramal_8` int(4) NOT NULL,
  `ramal_9` int(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peramalan`
--

INSERT INTO `peramalan` (`id`, `id_stok`, `periode`, `kode_transaksi`, `ramal_1`, `ramal_2`, `ramal_3`, `ramal_4`, `ramal_5`, `ramal_6`, `ramal_7`, `ramal_8`, `ramal_9`, `created_at`, `updated_at`) VALUES
(4, 138, 'Agustus 2021', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-08-01 23:16:01', '2021-08-01 23:16:01'),
(5, 139, 'Agustus 2021', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-08-01 23:16:01', '2021-08-01 23:16:01'),
(6, 146, 'Agustus 2021', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-08-01 23:16:01', '2021-08-01 23:16:01'),
(7, 138, 'September 2021', 'M00001', 100, 100, 100, 100, 100, 100, 100, 100, 100, '2021-09-01 23:16:01', '2021-09-01 23:16:01'),
(8, 139, 'September 2021', 'M00002', 150, 150, 150, 150, 150, 150, 150, 150, 150, '2021-09-01 23:16:01', '2021-09-01 23:16:01'),
(9, 146, 'September 2021', 'M00003', 200, 200, 200, 200, 200, 200, 200, 200, 200, '2021-09-01 23:16:01', '2021-09-01 23:16:01'),
(10, 138, 'Oktober 2021', 'M00004', 104, 107, 111, 115, 118, 121, 124, 128, 132, '2021-10-01 23:16:01', '2021-10-01 23:16:01'),
(11, 139, 'Oktober 2021', 'M00005', 155, 160, 165, 170, 175, 180, 185, 190, 195, '2021-10-01 23:16:01', '2021-10-01 23:16:01'),
(12, 146, 'Oktober 2021', 'M00006', 195, 190, 185, 180, 175, 170, 165, 160, 155, '2021-10-01 23:16:01', '2021-10-01 23:16:01'),
(13, 138, 'November 2021', 'M00007', 106, 111, 115, 118, 121, 123, 125, 126, 126, '2021-11-01 23:16:01', '2021-11-01 23:16:01'),
(14, 139, 'November 2021', 'M00008', 162, 173, 183, 192, 200, 207, 213, 218, 222, '2021-11-01 23:16:01', '2021-11-01 23:16:01'),
(15, 146, 'November 2021', 'M00009', 186, 172, 160, 148, 138, 128, 120, 112, 106, '2021-11-01 23:16:01', '2021-11-01 23:16:01'),
(16, 138, 'December 2021', 'M00012', 120, 138, 155, 171, 186, 199, 212, 225, 238, '2021-12-01 23:16:01', '2021-12-01 23:16:01'),
(17, 139, 'December 2021', 'M00011', 163, 173, 181, 186, 188, 188, 186, 184, 180, '2021-12-01 23:16:01', '2021-12-01 23:16:01'),
(18, 146, 'December 2021', 'M00010', 197, 198, 202, 209, 219, 231, 246, 262, 281, '2021-12-01 23:16:01', '2021-12-01 23:16:01'),
(19, 138, 'January 2022', 'M00013', 140, 175, 205, 231, 253, 272, 288, 301, 312, '2022-01-01 23:16:01', '2022-01-01 23:16:01'),
(20, 139, 'January 2022', 'M00014', 164, 174, 179, 181, 181, 180, 178, 177, 175, '2022-01-01 23:16:01', '2022-01-01 23:16:01'),
(21, 146, 'January 2022', 'M00015', 202, 208, 216, 225, 234, 242, 249, 252, 253, '2022-01-01 23:16:01', '2022-01-01 23:16:01'),
(22, 138, 'February 2022', 'M00016', 149, 185, 211, 228, 239, 244, 244, 240, 234, '2022-02-01 23:16:01', '2022-02-01 23:16:01'),
(23, 139, 'February 2022', 'M00017', 168, 179, 185, 189, 191, 192, 194, 195, 198, '2022-02-01 23:16:01', '2022-02-01 23:16:01'),
(24, 146, 'February 2022', 'M00018', 202, 208, 216, 225, 234, 242, 249, 252, 264, '2022-02-01 23:16:01', '2021-02-01 23:16:01'),
(25, 138, 'March 2022', 'M00019', 154, 188, 208, 217, 219, 217, 213, 208, 203, '2022-03-01 23:16:01', '2022-03-01 23:16:01'),
(26, 139, 'March 2022', 'M00020', 166, 173, 175, 173, 170, 167, 163, 159, 155, '2022-03-01 23:16:01', '2022-03-01 23:16:01'),
(27, 146, 'March 2022', 'M00021', 198, 196, 192, 185, 175, 162, 148, 132, 116, '2022-03-01 23:16:01', '2022-03-01 23:16:01'),
(28, 138, 'April 2022', 'M00022', 148, 170, 175, 170, 160, 147, 134, 122, 110, '2022-04-01 23:53:47', '2022-04-01 23:53:47'),
(29, 139, 'April 2022', 'M00023', 165, 169, 167, 164, 160, 157, 154, 152, 150, '2022-04-01 23:53:47', '2022-04-01 23:53:47'),
(30, 146, 'April 2022', 'M00024', 193, 186, 179, 171, 162, 155, 149, 146, 147, '2022-04-01 23:53:47', '2022-04-01 23:53:47'),
(31, 138, 'May 2022', 'M00025', 149, 166, 168, 162, 155, 149, 145, 144, 146, '2022-05-01 23:53:47', '2022-05-01 23:53:47'),
(32, 139, 'May 2022', 'M00026', 171, 180, 185, 188, 193, 198, 204, 210, 218, '2022-05-01 23:53:47', '2022-05-01 23:53:47'),
(33, 146, 'May 2022', 'M00027', 192, 185, 179, 174, 171, 170, 171, 173, 177, '2022-05-01 23:53:47', '2022-05-01 23:53:47'),
(34, 138, 'June 2022', 'M00030', 154, 173, 177, 177, 177, 180, 184, 189, 195, '2022-06-01 23:53:47', '2022-06-01 23:53:47'),
(35, 139, 'June 2022', 'M00029', 184, 204, 219, 233, 246, 259, 272, 282, 292, '2022-06-01 23:53:47', '2022-06-01 23:53:47'),
(36, 146, 'June 2022', 'M00028', 187, 178, 171, 165, 161, 158, 156, 155, 153, '2022-06-01 23:53:47', '2022-06-01 23:53:47'),
(37, 138, 'July 2022', 'M00031', 163, 188, 199, 206, 214, 222, 230, 238, 244, '2022-06-30 00:04:33', '2022-06-30 00:04:33'),
(38, 139, 'July 2022', 'M00032', 180, 193, 198, 200, 198, 194, 186, 176, 164, '2022-06-30 00:04:33', '2022-06-30 00:04:33'),
(39, 146, 'July 2022', 'M00033', 192, 189, 188, 191, 195, 201, 208, 215, 222, '2022-06-30 00:04:33', '2022-06-30 00:04:33'),
(44, 146, 'August 2022', 'M00034', 193, 191, 192, 195, 198, 196, 196, 198, 202, '2022-07-21 05:30:30', '2022-07-21 05:30:30'),
(45, 139, 'August 2022', 'M00035', 187, 204, 214, 220, 224, 230, 234, 239, 241, '2022-07-21 05:32:26', '2022-07-21 05:32:26'),
(46, 138, 'August 2022', 'M00036', 162, 180, 184, 184, 182, 172, 165, 158, 159, '2022-07-21 05:42:14', '2022-07-21 05:42:14');

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
(138, 'Oli Samping', 2301, '75000', 'Ini adalah Oli Samping edited', '2021-12-01 11:13:37', '0000-00-00 00:00:00', 13),
(139, 'Oli Gardan', 2549, '75000', 'Oli Garda pertama', '2021-12-06 11:13:35', '0000-00-00 00:00:00', 13),
(146, 'Oli Mesin', 2423, '75000', 'Oli mesin nih', '2021-12-09 11:13:28', '2021-12-15 05:13:07', 13);

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
(27, 'Pelanggan 2', 'pelanggan2', 'e10adc3949ba59abbe56e057f20f883e', 'candi', '08981238722', 'B ASD', '2022-01-23 17:23:15', '2022-01-23 17:23:15', 0);

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
  ADD UNIQUE KEY `no_transaksi` (`kode_transaksi`),
  ADD KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_stok` (`id_stok`);

--
-- Indexes for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stok` (`id_stok`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `peramalan`
--
ALTER TABLE `peramalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemasukkan`
--
ALTER TABLE `pemasukkan`
  ADD CONSTRAINT `pemasukkan_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `stok_barang` (`id`);

--
-- Constraints for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `pengeluaran_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `stok_barang` (`id`);

--
-- Constraints for table `peramalan`
--
ALTER TABLE `peramalan`
  ADD CONSTRAINT `peramalan_ibfk_1` FOREIGN KEY (`id_stok`) REFERENCES `stok_barang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
