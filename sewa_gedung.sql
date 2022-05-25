-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2022 pada 09.31
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewa_gedung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`, `level`) VALUES
('ADM001', 'admin sewa', 'admin', '12345', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gedung`
--

CREATE TABLE `gedung` (
  `id_gedung` varchar(11) NOT NULL,
  `nama_gedung` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto` text NOT NULL,
  `sts` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gedung`
--

INSERT INTO `gedung` (`id_gedung`, `nama_gedung`, `harga`, `foto`, `sts`) VALUES
('G001', 'gedung satu', 1000000, 'install-composer.jpg', 'free'),
('G002', 'gedung dua', 1500000, 'Screenshot (1).png', 'free'),
('G003', 'gedung tiga', 2000000, 'Screenshot (2).png', 'free'),
('G004', 'gedung empat', 2500000, 'Screenshot (3).png', 'free');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_sewa` varchar(11) NOT NULL,
  `id_gedung` varchar(11) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `durasi_sewa` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `id_user` varchar(11) NOT NULL,
  `tgl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_sewa`, `id_gedung`, `tgl_awal`, `tgl_akhir`, `durasi_sewa`, `total`, `status`, `bukti_bayar`, `id_user`, `tgl`) VALUES
('190122001', 'G001', '2022-01-08', '2022-01-09', 2, 2000000, 'dibayar', 'Screenshot (26).png', 'USR001', '2022-01-19'),
('190122002', 'G002', '2022-01-22', '2022-01-23', 2, 3000000, 'dibayar', 'Screenshot (27).png', 'USR001', '2022-01-19'),
('190122003', 'G004', '2022-01-22', '2022-01-24', 3, 7500000, 'dibayar', 'Screenshot (58).png', 'USR002', '2022-01-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `notelp` varchar(15) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` text NOT NULL,
  `level` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `notelp`, `username`, `password`, `level`) VALUES
('USR001', 'abu dzar hanif', '08123456789', 'abudzar', '12345', 'user'),
('USR002', 'yolanda', '08123456789', 'yolanda', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `gedung`
--
ALTER TABLE `gedung`
  ADD PRIMARY KEY (`id_gedung`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
