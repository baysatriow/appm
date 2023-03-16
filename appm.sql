-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Mar 2023 pada 07.44
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `nik`, `nama`, `username`, `password`, `telp`) VALUES
(4, '1234', 'Admin', 'admin', '$2y$10$O9uEiWMxswII2dLIyJwM7.rQSpLDKNKECGjxr9mcJ5c9JBmWfLcHO', '1234'),
(5, '123123123', 'Bayu Satrio Wibowos', '2481', '$2y$10$O9uEiWMxswII2dLIyJwM7.rQSpLDKNKECGjxr9mcJ5c9JBmWfLcHO', '1213'),
(6, '11248124312312', 'Bayu Sudrajat', 'Bayu2481', '$2y$10$O9uEiWMxswII2dLIyJwM7.rQSpLDKNKECGjxr9mcJ5c9JBmWfLcHO', '081377754080'),
(7, '1231243', 'Asdasdd', '1234', '$2y$10$I.eqXe1CqRhEiMG4x/OWDeogAOC8mltKROStzu5McrE8PWgKQpBgK', '1234'),
(10, '', 'Abdillah', 'abdil', '$2y$10$3y2jlm3l365oB5DDq2BlwOR2VzDx/FGk/OO5s6ZDDOvGhoohdNpoy', '0821777574323');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `isi_laporan` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `tgl_pengaduan`, `nik`, `isi_laporan`, `foto`, `status`) VALUES
(1, '2023-03-15', '123123123', 'aasadsadasdasd', '20230315_1.jpg', '2'),
(2, '2023-03-15', '123123123', 'Halo Ngetes Pengaduan\r\n', '20230315_2.jpg', '2'),
(3, '2023-03-15', '123123123', 'Halo saday ingisn amdlsldlasdlasjkldjsaldjlasdjlasjdlasdsa', '20230315_3.jpg', '1'),
(4, '2023-03-15', '11248124312312', 'adsdasdasdas', '20230315_4.jpg', '2'),
(5, '2023-03-16', '123123123', 'Testing 2481', '20230316_5.jpg', '2'),
(6, '2023-03-16', '123123123', 'sdasdsaasdsadsdasds', '20230316_6.jpg', '1'),
(7, '2023-03-16', '123123123', 'baru', '20230316_7.jpg', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telp` varchar(13) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username`, `password`, `telp`, `level`) VALUES
(1, 'Admins', 'admin', '$2y$10$U8qWMAY9EZmR9xoyUDNOJu.xkIhuhDzI2eoJ/lB2rLmZIPqviN1CK', '123', 'admin'),
(10, 'Bayu Satrio Wibowos', 'baystriow', '$2y$10$N71nsaLnN8bfbgjK6vSNuuQa1e8QGnYZd7DB1BHHfBhVcRMPMdCI6', '12345', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan`
--

CREATE TABLE `tanggapan` (
  `id_tanggapan` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_tanggapan` date NOT NULL,
  `tanggapan` text NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tanggapan`
--

INSERT INTO `tanggapan` (`id_tanggapan`, `id_pengaduan`, `tgl_tanggapan`, `tanggapan`, `id_petugas`) VALUES
(1, 1, '2023-03-15', 'asdasdasd', 1),
(5, 4, '2023-03-15', 'Haloooooooo\r\n', 1),
(6, 5, '2023-03-16', 'tanggapan anda kami tangai', 1),
(7, 5, '2023-03-16', 'saya coba lagi', 1),
(8, 5, '2023-03-16', 'halo selamat malam', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`);

--
-- Indeks untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  ADD PRIMARY KEY (`id_tanggapan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tanggapan`
--
ALTER TABLE `tanggapan`
  MODIFY `id_tanggapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
