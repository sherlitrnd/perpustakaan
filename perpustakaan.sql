-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2019 pada 06.53
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kode_buku` int(50) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `stok` int(30) NOT NULL,
  `tgl_register` varchar(0) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `penulis`, `stok`, `tgl_register`, `image`) VALUES
(123, 'hujan', 'Tere Liye', 9, '', '123-353.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_pinjam` varchar(30) NOT NULL,
  `kode_buku` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_pinjam`, `kode_buku`, `stok`) VALUES
('994-970', '', 0),
('927-837', '', 0),
('927-837', '', 0),
('294-256', ' 089', 0),
('294-256', ' 099', 0),
('977-684', ' 089', 0),
('108-166', ' 089', 1),
('599-395', ' 090', 1),
('815-976', ' 089', 1),
('938-328', '123', 2),
('938-328', ' 089', 2),
('783-597', ' 089', 2),
('783-597', ' 090', 2),
('107-821', ' 090', 1),
('377-467', ' 089', 2),
('377-467', ' 090', 2),
('341-145', ' 089', 1),
('252-498', ' 090', 1),
('994-752', ' 090', 1),
('319-839', ' 090', 1),
('232-864', ' 099', 2),
('232-864', '123', 2),
('806-976', ' 090', 2),
('806-976', '123', 2),
('574-406', '123', 1),
('662-936', ' 099', 1),
('504-243', ' 090', 1),
('44-492', ' 090', 2),
('44-492', '123', 2),
('38-231', ' 090', 1),
('334-272', ' 090', 2),
('334-272', '123', 2);

--
-- Trigger `detail_pinjam`
--
DELIMITER $$
CREATE TRIGGER `update_buku` AFTER INSERT ON `detail_pinjam` FOR EACH ROW BEGIN
UPDATE buku SET stok=stok-NEW.stok
WHERE kode_buku=NEW.kode_buku;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(200) NOT NULL,
  `kode_buku` int(10) NOT NULL,
  `id_siswa` int(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_pustakawan` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `kode_buku`, `id_siswa`, `tgl_pinjam`, `tgl_kembali`, `id_pustakawan`) VALUES
(5, 0, 0, '2019-04-27', '0000-00-00', 0),
(38, 0, 0, '2019-04-29', '0000-00-00', 0),
(44, 0, 0, '2019-04-28', '0000-00-00', 0),
(107, 0, 0, '2019-04-28', '0000-00-00', 0),
(108, 0, 0, '2019-04-27', '0000-00-00', 0),
(217, 0, 0, '2019-04-27', '0000-00-00', 0),
(232, 0, 0, '2019-04-28', '0000-00-00', 0),
(252, 0, 0, '2019-04-28', '0000-00-00', 0),
(282, 0, 0, '2019-04-27', '0000-00-00', 0),
(294, 0, 0, '2019-03-12', '0000-00-00', 0),
(319, 0, 0, '2019-04-28', '0000-00-00', 0),
(334, 0, 0, '2019-04-29', '0000-00-00', 0),
(341, 0, 0, '2019-04-28', '0000-00-00', 0),
(356, 0, 0, '2019-04-27', '0000-00-00', 0),
(377, 0, 0, '2019-04-28', '0000-00-00', 0),
(401, 0, 0, '2019-04-27', '0000-00-00', 0),
(470, 0, 0, '2019-04-27', '0000-00-00', 0),
(504, 0, 0, '2019-04-28', '0000-00-00', 0),
(510, 0, 0, '2019-04-27', '0000-00-00', 0),
(573, 0, 0, '2019-04-27', '0000-00-00', 0),
(574, 0, 0, '2019-04-28', '0000-00-00', 0),
(599, 0, 0, '2019-04-27', '0000-00-00', 0),
(608, 0, 0, '2019-04-27', '0000-00-00', 0),
(662, 0, 0, '2019-04-28', '0000-00-00', 0),
(733, 0, 0, '2019-04-27', '0000-00-00', 0),
(783, 0, 0, '2019-04-28', '0000-00-00', 0),
(789, 0, 0, '2019-04-27', '0000-00-00', 0),
(806, 0, 0, '2019-04-28', '0000-00-00', 0),
(810, 0, 0, '2019-04-27', '0000-00-00', 0),
(815, 0, 0, '2019-04-27', '0000-00-00', 0),
(884, 0, 0, '2019-04-27', '0000-00-00', 0),
(938, 0, 0, '2019-04-28', '0000-00-00', 0),
(977, 0, 0, '2019-04-26', '0000-00-00', 0),
(982, 0, 0, '2019-04-27', '0000-00-00', 0),
(994, 0, 0, '2019-04-28', '0000-00-00', 0),
(2147483647, 0, 0, '2019-04-27', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pustakawan`
--

CREATE TABLE `pustakawan` (
  `id_pustakawan` int(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pustakawan`
--

INSERT INTO `pustakawan` (`id_pustakawan`, `nama`, `kontak`, `username`, `password`) VALUES
(0, 'wati', '085799332211', 'becca', '5678'),
(2, 'ahai', '23113', 'hai', 'hai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama`, `kelas`, `kontak`, `username`, `password`) VALUES
(212, 'feas', '2rpl', '34141421', 'ahai', 'ahai'),
(214, 'erwr', '72727', '24144329', 'sjsjk', '8289289'),
(2147483647, ' aardad', ' X RPL 3', ' 08123456789', '8765', '65555');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `level`) VALUES
(2, 'ade', 'ade', 'pembeli'),
(3, 'adel', 'adel', 'pembeli'),
(4, 'sifa', 'sifa', 'pembeli'),
(6, 'hai', 'hai', 'admin'),
(7, 'dear', '123', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `kode_barang` (`kode_buku`),
  ADD KEY `id_siswa` (`id_siswa`),
  ADD KEY `id_pustakawan` (`id_pustakawan`);

--
-- Indeks untuk tabel `pustakawan`
--
ALTER TABLE `pustakawan`
  ADD PRIMARY KEY (`id_pustakawan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
