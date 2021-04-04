-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2021 pada 12.47
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp-mp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakaryawan`
--

CREATE TABLE `datakaryawan` (
  `id` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datakaryawan`
--

INSERT INTO `datakaryawan` (`id`, `kode`, `nama`, `alamat`, `telp`) VALUES
(1, 'dasd', 'asdas', 'asdsa', 'assadas'),
(2, 'asdgsd', 'gdds', 'fsdfsd', 'dfasda'),
(3, 'asgasf', 'dsadsa', 'dasdsa', 'dsadsa'),
(4, 'safasf', 'asdsac', 'ascsac', '213213');

--
-- Trigger `datakaryawan`
--
DELIMITER $$
CREATE TRIGGER `updateid` AFTER INSERT ON `datakaryawan` FOR EACH ROW UPDATE nilaikaryawan,datakaryawan,perangkingan SET nilaikaryawan.ida = datakaryawan.id, perangkingan.ida = datakaryawan.id WHERE datakaryawan.kode = nilaikaryawan.kodea AND datakaryawan.kode = perangkingan.kodea
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kode`, `nama`) VALUES
(1, 'C1', 'MFT'),
(8, 'C2', 'Triple Hop'),
(9, 'C3', 'Shuttle Run'),
(10, 'C4', 'Tendangan Sabit'),
(13, 'C5', 'Back Up'),
(21, 'C6', 'IQ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(15) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `username`, `nama_lengkap`, `jabatan`, `password`) VALUES
(7, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaikaryawan`
--

CREATE TABLE `nilaikaryawan` (
  `id` int(11) NOT NULL,
  `kodek` varchar(255) NOT NULL,
  `ida` int(25) NOT NULL,
  `kodea` varchar(255) NOT NULL,
  `nilai` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaikaryawan`
--

INSERT INTO `nilaikaryawan` (`id`, `kodek`, `ida`, `kodea`, `nilai`) VALUES
(1, 'C1', 1, 'dasd', 5),
(2, 'C2', 1, 'dasd', 5),
(3, 'C3', 1, 'dasd', 5),
(4, 'C4', 1, 'dasd', 5),
(5, 'C5', 1, 'dasd', 5),
(6, 'C6', 1, 'dasd', 5),
(7, 'C1', 2, 'asdgsd', 4),
(8, 'C2', 2, 'asdgsd', 5),
(9, 'C3', 2, 'asdgsd', 5),
(10, 'C4', 2, 'asdgsd', 4),
(11, 'C5', 2, 'asdgsd', 4),
(12, 'C6', 2, 'asdgsd', 5),
(13, 'C1', 3, 'asgasf', 5),
(14, 'C2', 3, 'asgasf', 5),
(15, 'C3', 3, 'asgasf', 5),
(16, 'C4', 3, 'asgasf', 5),
(17, 'C5', 3, 'asgasf', 5),
(18, 'C6', 3, 'asgasf', 4),
(19, 'C1', 4, 'safasf', 4),
(20, 'C2', 4, 'safasf', 5),
(21, 'C3', 4, 'safasf', 5),
(22, 'C4', 4, 'safasf', 4),
(23, 'C5', 4, 'safasf', 5),
(24, 'C6', 4, 'safasf', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilaikriteria`
--

CREATE TABLE `nilaikriteria` (
  `id` int(255) NOT NULL,
  `kriteria1` int(255) NOT NULL,
  `nilai` int(255) NOT NULL,
  `kriteria2` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilaikriteria`
--

INSERT INTO `nilaikriteria` (`id`, `kriteria1`, `nilai`, `kriteria2`) VALUES
(1, 1, 1, 8),
(2, 1, 1, 9),
(3, 1, 1, 10),
(4, 1, 1, 13),
(5, 1, 9, 21),
(6, 8, 1, 9),
(7, 8, 1, 10),
(8, 8, 1, 13),
(9, 8, 9, 21),
(10, 9, 1, 10),
(11, 9, 1, 13),
(12, 9, 9, 21),
(13, 10, 1, 13),
(14, 10, 9, 21),
(15, 13, 9, 21);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perangkingan`
--

CREATE TABLE `perangkingan` (
  `id` int(30) NOT NULL,
  `ida` int(30) NOT NULL,
  `kodea` varchar(255) NOT NULL,
  `nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `perangkingan`
--

INSERT INTO `perangkingan` (`id`, `ida`, `kodea`, `nilai`) VALUES
(1, 1, 'dasd', 6),
(2, 2, 'asdgsd', 5.5),
(3, 3, 'asgasf', 5.8333),
(4, 4, 'safasf', 5.6667);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datakaryawan`
--
ALTER TABLE `datakaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilaikaryawan`
--
ALTER TABLE `nilaikaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilaikriteria`
--
ALTER TABLE `nilaikriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perangkingan`
--
ALTER TABLE `perangkingan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `datakaryawan`
--
ALTER TABLE `datakaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `nilaikaryawan`
--
ALTER TABLE `nilaikaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `nilaikriteria`
--
ALTER TABLE `nilaikriteria`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `perangkingan`
--
ALTER TABLE `perangkingan`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
