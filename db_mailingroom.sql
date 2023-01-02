-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Sep 2021 pada 23.30
-- Versi Server: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mailingroom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_departemen`
--

CREATE TABLE `m_departemen` (
  `kd_departemen` int(5) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_departemen`
--

INSERT INTO `m_departemen` (`kd_departemen`, `nama_departemen`) VALUES
(1, 'Finance Test'),
(2, 'HR & GA'),
(3, 'Testing'),
(4, 'Testing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kota`
--

CREATE TABLE `m_kota` (
  `kd_kota` int(5) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kota`
--

INSERT INTO `m_kota` (`kd_kota`, `nama_kota`) VALUES
(1, 'Jakarta Timur'),
(2, 'Jakarta Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_leveldoc`
--

CREATE TABLE `m_leveldoc` (
  `kd_leveldoc` int(5) NOT NULL,
  `nama_leveldoc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_leveldoc`
--

INSERT INTO `m_leveldoc` (`kd_leveldoc`, `nama_leveldoc`) VALUES
(1, 'Document 1'),
(3, 'Document 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_logistik`
--

CREATE TABLE `m_logistik` (
  `kd_logistik` int(5) NOT NULL,
  `nama_logistik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_logistik`
--

INSERT INTO `m_logistik` (`kd_logistik`, `nama_logistik`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_penerima`
--

CREATE TABLE `m_penerima` (
  `nik` varchar(10) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `kd_departemen` int(5) NOT NULL,
  `status` varchar(1) NOT NULL COMMENT '0 = tidak aktif, 1 = aktif'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_penerima`
--

INSERT INTO `m_penerima` (`nik`, `nama_penerima`, `kd_departemen`, `status`) VALUES
('12345678', 'Jhones', 2, '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pic`
--

CREATE TABLE `m_pic` (
  `kd_pic` int(5) NOT NULL,
  `nama_pic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_pic`
--

INSERT INTO `m_pic` (`kd_pic`, `nama_pic`) VALUES
(1, 'Dwi Prasetya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_in`
--

CREATE TABLE `transaksi_in` (
  `transaksiin_id` int(5) NOT NULL,
  `mail_id` varchar(25) NOT NULL,
  `date_mail` date NOT NULL,
  `kd_pic` int(5) NOT NULL,
  `kd_logistik` int(5) NOT NULL,
  `airwaybill` varchar(25) NOT NULL,
  `shipperName` varchar(50) NOT NULL,
  `kd_kota` int(5) NOT NULL,
  `recipientName` varchar(25) NOT NULL,
  `kd_departemen` int(5) NOT NULL,
  `additional_Info` varchar(50) NOT NULL,
  `received_by` varchar(25) NOT NULL,
  `received_date` date NOT NULL,
  `kd_leveldoc` int(5) NOT NULL,
  `status` int(1) NOT NULL,
  `urut` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `last_login` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`, `email`, `level`, `blokir`, `last_login`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', 'admin', 'N', '2021-09-17 19:43:51'),
(4, 'alie', '7bc057347da97da2683c2eac60939956', 'Ali Nurdiansah', 'alie@yahoo.com', 'user', 'Y', '2021-09-17 22:13:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_departemen`
--
ALTER TABLE `m_departemen`
  ADD PRIMARY KEY (`kd_departemen`);

--
-- Indexes for table `m_kota`
--
ALTER TABLE `m_kota`
  ADD PRIMARY KEY (`kd_kota`);

--
-- Indexes for table `m_leveldoc`
--
ALTER TABLE `m_leveldoc`
  ADD PRIMARY KEY (`kd_leveldoc`);

--
-- Indexes for table `m_logistik`
--
ALTER TABLE `m_logistik`
  ADD PRIMARY KEY (`kd_logistik`);

--
-- Indexes for table `m_penerima`
--
ALTER TABLE `m_penerima`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `m_pic`
--
ALTER TABLE `m_pic`
  ADD PRIMARY KEY (`kd_pic`);

--
-- Indexes for table `transaksi_in`
--
ALTER TABLE `transaksi_in`
  ADD PRIMARY KEY (`transaksiin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_departemen`
--
ALTER TABLE `m_departemen`
  MODIFY `kd_departemen` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_kota`
--
ALTER TABLE `m_kota`
  MODIFY `kd_kota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_leveldoc`
--
ALTER TABLE `m_leveldoc`
  MODIFY `kd_leveldoc` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_logistik`
--
ALTER TABLE `m_logistik`
  MODIFY `kd_logistik` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_pic`
--
ALTER TABLE `m_pic`
  MODIFY `kd_pic` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi_in`
--
ALTER TABLE `transaksi_in`
  MODIFY `transaksiin_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
