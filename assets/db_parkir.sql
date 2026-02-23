-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 21, 2026 at 10:34 PM
-- Server version: 8.4.3
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_parkir`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_area`
--

CREATE TABLE `tb_area` (
  `id_area` int NOT NULL,
  `nama_area` varchar(50) NOT NULL,
  `kapasitas` int NOT NULL,
  `terisi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_area`
--

INSERT INTO `tb_area` (`id_area`, `nama_area`, `kapasitas`, `terisi`) VALUES
(1, 'Mis. Potatoo', 20, 0),
(3, 'Apart A', 50, 0),
(4, 'Apart B', 35, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` int NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  `jenis_kendaraan` varchar(20) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `pemilik` varchar(100) NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `plat_nomor`, `jenis_kendaraan`, `warna`, `pemilik`, `id_user`) VALUES
(13, 'KA 517 I', 'motor', 'hijau', 'kai', 2),
(15, 'BL 443 CK', 'motor', 'Navy', 'kyungso', 2),
(16, 'CK 765 MG', 'mobil', 'Black', 'Mingyu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_aktivitas`
--

CREATE TABLE `tb_log_aktivitas` (
  `id_log` int NOT NULL,
  `id_user` int NOT NULL,
  `aktivitas` varchar(100) NOT NULL,
  `waktu_aktivitas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_log_aktivitas`
--

INSERT INTO `tb_log_aktivitas` (`id_log`, `id_user`, `aktivitas`, `waktu_aktivitas`) VALUES
(4, 2, 'Login ke sistem', '2026-02-04 13:17:45'),
(5, 2, 'Login ke sistem', '2026-02-04 13:23:22'),
(6, 2, 'Menambahkan data kendaraan dengan plat nomor B 517 TS', '2026-02-04 13:29:16'),
(7, 2, 'Mengedit data kendaraan dengan B 517 TS', '2026-02-04 13:32:17'),
(8, 2, 'Login ke sistem', '2026-02-05 06:50:07'),
(9, 2, 'Login ke sistem', '2026-02-05 06:54:22'),
(10, 2, 'Menghapus data kendaraan plat nomor 10', '2026-02-05 06:55:18'),
(11, 2, 'Menambahkan data kendaraan dengan plat nomor B 517 TS', '2026-02-05 07:04:47'),
(12, 2, 'Menghapus data kendaraan plat nomor 2', '2026-02-05 07:10:35'),
(13, 2, 'Menghapus data kendaraan plat nomor ', '2026-02-05 07:11:48'),
(14, 2, 'Menambahkan data kendaraan dengan plat nomor B 517 TS', '2026-02-05 07:13:06'),
(15, 2, 'Logout dari sistem', '2026-02-05 07:31:56'),
(16, 2, 'Login ke sistem', '2026-02-05 07:32:15'),
(17, 2, 'Login ke sistem', '2026-02-05 08:53:58'),
(18, 2, 'Logout dari sistem', '2026-02-05 08:57:41'),
(19, 2, 'Login ke sistem', '2026-02-05 09:05:01'),
(22, 3, 'Login ke sistem', '2026-02-05 09:50:33'),
(23, 2, 'Login ke sistem', '2026-02-06 00:32:22'),
(24, 2, 'Logout dari sistem', '2026-02-06 00:33:35'),
(25, 2, 'Login ke sistem', '2026-02-06 00:33:40'),
(27, 3, 'Login ke sistem', '2026-02-06 00:45:11'),
(28, 2, 'Mengedit data kendaraan plat nomor B 517 TS', '2026-02-06 00:46:17'),
(29, 2, 'Logout dari sistem', '2026-02-06 00:51:55'),
(30, 2, 'Login ke sistem', '2026-02-06 00:52:03'),
(31, 3, 'Logout dari sistem', '2026-02-06 00:55:39'),
(34, 2, 'Logout dari sistem', '2026-02-06 00:57:35'),
(35, 3, 'Login ke sistem', '2026-02-06 00:58:00'),
(36, 2, 'Login ke sistem', '2026-02-06 00:58:33'),
(37, 2, 'Mengedit data kendaraan plat nomor B 517 TS', '2026-02-06 01:00:22'),
(38, 3, 'Logout dari sistem', '2026-02-06 01:00:41'),
(41, 2, 'Logout dari sistem', '2026-02-06 01:18:24'),
(43, 2, 'Logout dari sistem', '2026-02-06 01:20:50'),
(44, 2, 'Login ke sistem', '2026-02-06 01:20:57'),
(48, 2, 'Menambahkan data kendaraan dengan plat nomor KA 517 I', '2026-02-06 01:23:42'),
(49, 2, 'Menambahkan data kendaraan dengan plat nomor BL 876 CK', '2026-02-06 01:26:42'),
(50, 2, 'Logout dari sistem', '2026-02-06 01:28:13'),
(51, 2, 'Login ke sistem', '2026-02-06 01:28:19'),
(52, 2, 'Logout dari sistem', '2026-02-06 01:29:26'),
(53, 3, 'Login ke sistem', '2026-02-06 01:29:33'),
(54, 3, 'Logout dari sistem', '2026-02-06 01:30:10'),
(55, 2, 'Login ke sistem', '2026-02-06 01:30:16'),
(57, 2, 'Login ke sistem', '2026-02-06 01:34:26'),
(58, 2, 'Logout dari sistem', '2026-02-06 01:37:43'),
(59, 2, 'Login ke sistem', '2026-02-06 01:37:48'),
(60, 2, 'Mengedit data kendaraan plat nomor BL 876 CK', '2026-02-06 02:01:36'),
(61, 2, 'Menghapus data kendaraan plat nomor 14', '2026-02-06 03:10:05'),
(62, 2, 'Login ke sistem', '2026-02-07 09:05:00'),
(63, 3, 'Login ke sistem', '2026-02-07 09:05:27'),
(64, 2, 'Mengedit data kendaraan plat nomor B 517 TS', '2026-02-07 16:34:39'),
(65, 2, 'Mengedit data kendaraan plat nomor KA 517 I', '2026-02-07 17:47:37'),
(66, 2, 'Login ke sistem', '2026-02-08 17:00:43'),
(67, 3, 'Login ke sistem', '2026-02-08 17:04:21'),
(68, 2, 'Menambahkan data kendaraan dengan plat nomor BL 443 CK', '2026-02-08 18:02:40'),
(69, 2, 'Mengedit data kendaraan plat nomor B 517 TS', '2026-02-08 18:02:57'),
(70, 2, 'Mengedit data kendaraan plat nomor KA 517 I', '2026-02-08 18:03:09'),
(71, 2, 'Mengedit data kendaraan plat nomor BL 443 CKk', '2026-02-08 18:33:31'),
(72, 2, 'Mengedit data kendaraan plat nomor BL 443 CK', '2026-02-08 18:33:40'),
(73, 2, 'Login ke sistem', '2026-02-09 09:46:11'),
(76, 3, 'Login ke sistem', '2026-02-09 09:54:54'),
(77, 3, 'Logout dari sistem', '2026-02-09 10:20:32'),
(80, 3, 'Login ke sistem', '2026-02-09 10:30:47'),
(81, 3, 'Logout dari sistem', '2026-02-09 12:17:32'),
(82, 3, 'Login ke sistem', '2026-02-09 12:17:45'),
(83, 2, 'Login ke sistem', '2026-02-09 17:31:37'),
(84, 3, 'Login ke sistem', '2026-02-09 17:32:30'),
(85, 3, 'Logout dari sistem', '2026-02-09 18:35:34'),
(87, 2, 'Login ke sistem', '2026-02-10 07:36:07'),
(90, 3, 'Login ke sistem', '2026-02-10 07:37:06'),
(91, 3, 'Logout dari sistem', '2026-02-10 10:03:41'),
(92, 2, 'Login ke sistem', '2026-02-10 10:03:47'),
(93, 2, 'Login ke sistem', '2026-02-11 08:12:50'),
(94, 3, 'Login ke sistem', '2026-02-11 08:16:13'),
(95, 3, 'Logout dari sistem', '2026-02-11 08:34:21'),
(98, 3, 'Login ke sistem', '2026-02-11 08:39:51'),
(99, 3, 'Login ke sistem', '2026-02-13 10:47:20'),
(100, 2, 'Login ke sistem', '2026-02-13 11:00:01'),
(101, 2, 'Login ke sistem', '2026-02-14 11:53:41'),
(102, 3, 'Login ke sistem', '2026-02-14 11:54:31'),
(103, 2, 'Logout dari sistem', '2026-02-14 16:52:40'),
(104, 2, 'Login ke sistem', '2026-02-14 16:52:45'),
(105, 2, 'Mengedit data tarif dengan ID 4', '2026-02-14 16:53:53'),
(106, 2, 'Mengedit data tarif dengan ID 4', '2026-02-14 16:54:09'),
(107, 2, 'Mengedit data user dengan nama jisOo', '2026-02-14 16:55:09'),
(108, 2, 'Mengedit data area dengan ID 1', '2026-02-14 16:55:43'),
(109, 2, 'Login ke sistem', '2026-02-16 13:09:34'),
(110, 3, 'Login ke sistem', '2026-02-16 13:10:30'),
(111, 2, 'Logout dari sistem', '2026-02-16 13:15:26'),
(114, 3, 'Login ke sistem', '2026-02-16 13:20:18'),
(115, 3, 'Menambahkan data transaksi kendaraan dengan ID kendaraan 13', '2026-02-16 13:23:30'),
(116, 3, 'Logout dari sistem', '2026-02-16 13:23:45'),
(117, 2, 'Login ke sistem', '2026-02-16 13:23:50'),
(118, 3, 'Menghapus data transaksi dengan ID 19', '2026-02-16 13:24:02'),
(119, 2, 'Login ke sistem', '2026-02-16 18:46:41'),
(120, 3, 'Login ke sistem', '2026-02-16 18:47:22'),
(121, 3, 'Menambahkan data transaksi kendaraan dengan ID kendaraan 12', '2026-02-16 18:47:38'),
(122, 2, 'Logout dari sistem', '2026-02-16 19:21:53'),
(124, 3, 'Menambahkan data transaksi kendaraan dengan ID kendaraan 15', '2026-02-16 20:24:34'),
(125, 3, 'Logout dari sistem', '2026-02-16 20:35:27'),
(126, 2, 'Login ke sistem', '2026-02-16 20:35:35'),
(127, 2, 'Logout dari sistem', '2026-02-16 20:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` int NOT NULL,
  `jenis_kendaraan` enum('motor','mobil','lainnya') NOT NULL,
  `tarif_perjam` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `jenis_kendaraan`, `tarif_perjam`) VALUES
(4, 'motor', 3000),
(5, 'mobil', 5000),
(6, 'lainnya', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_parkir` int NOT NULL,
  `id_kendaraan` int NOT NULL,
  `waktu_masuk` datetime NOT NULL,
  `waktu_keluar` datetime DEFAULT NULL,
  `id_tarif` int NOT NULL,
  `durasi_jam` int NOT NULL,
  `biaya_total` decimal(10,0) NOT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `id_user` int NOT NULL,
  `id_area` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_parkir`, `id_kendaraan`, `waktu_masuk`, `waktu_keluar`, `id_tarif`, `durasi_jam`, `biaya_total`, `status`, `id_user`, `id_area`) VALUES
(20, 13, '2026-02-16 13:23:30', '2026-02-16 13:24:15', 4, 1, 3000, 'keluar', 3, 3),
(22, 15, '2026-02-16 20:24:34', '2026-02-18 11:38:21', 4, 40, 120000, 'keluar', 3, 3),
(23, 16, '2026-02-19 07:25:27', '2026-02-19 07:26:06', 4, 1, 3000, 'keluar', 3, 1),
(24, 16, '2026-02-20 09:00:14', '2026-02-21 14:53:02', 5, 30, 150000, 'keluar', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('admin','petugas','owner') NOT NULL,
  `status_aktif` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `username`, `password`, `role`, `status_aktif`) VALUES
(2, 'jisOo', 'jisoo', '321', 'admin', 1),
(3, 'nrul', 'nurul', '123', 'petugas', 1),
(7, 'gema', 'Gema', '1234', 'owner', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`id_area`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_parkir`),
  ADD KEY `id_kendaraan` (`id_kendaraan`,`id_tarif`,`id_user`,`id_area`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_tarif` (`id_tarif`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `id_area` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  MODIFY `id_kendaraan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_parkir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_log_aktivitas`
--
ALTER TABLE `tb_log_aktivitas`
  ADD CONSTRAINT `tb_log_aktivitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `tb_kendaraan` (`id_kendaraan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_area`) REFERENCES `tb_area` (`id_area`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_tarif`) REFERENCES `tb_tarif` (`id_tarif`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
