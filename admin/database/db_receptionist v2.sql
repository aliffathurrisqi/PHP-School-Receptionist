-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 08 Nov 2022 pada 08.38
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
-- Database: `db_receptionist`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_komentar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_komentar` (
`pengunjung` varchar(255)
,`komentar` text
,`rating` int(11)
,`time` varchar(86)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_kunjungan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_kunjungan` (
`nama_pengunjung` varchar(255)
,`alamat` text
,`telp` varchar(15)
,`instansi` varchar(255)
,`tujuan` text
,`subject` varchar(255)
,`keterangan` text
,`time` varchar(86)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `data_tujuan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `data_tujuan` (
`id_tujuan` bigint(20)
,`tujuan` text
,`id_subject` bigint(20)
,`nama_subject` varchar(255)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` bigint(20) NOT NULL,
  `pengunjung` varchar(255) NOT NULL,
  `komentar` text NOT NULL,
  `rating` int(11) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `pengunjung`, `komentar`, `rating`, `time`) VALUES
(1, 'Aliffathur Risqi Hidayat', 'Sistem mempermudah pengisian buku tamu secara digital', 4, '2022-10-25 19:32:17'),
(2, 'Aliffathur Risqi Hidayat', 'T', 3, '2022-11-07 21:32:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kunjungan`
--

CREATE TABLE `kunjungan` (
  `id` bigint(20) NOT NULL,
  `nama_pengunjung` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(15) NOT NULL,
  `instansi` varchar(255) DEFAULT NULL,
  `tujuan` text NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `nama_pengunjung`, `alamat`, `telp`, `instansi`, `tujuan`, `subject`, `keterangan`, `time`) VALUES
(1, 'Aliffathur Risqi Hidayat', 'Bulusulur, RT 01/RW 02, Bulusulur, Kec. Wonogiri, Kab. Wonogiri', '08234923203', '', 'Meminta Surat Perizinan', 'Betharia Sonata Ambarita, S.Pd.', 'Dokumen ditinggal', '2022-10-25 19:31:50'),
(5, 'Aprilyani Sanjaya', 'afs', '08', 'Pribadi', 'Lainnya', 'Sri Emut, S.Pd.', '-', '2022-11-08 11:46:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subject`
--

CREATE TABLE `subject` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subject`
--

INSERT INTO `subject` (`id`, `nama`) VALUES
(1, 'Margono, S.Pd.'),
(2, 'Agung Asmara'),
(3, 'Hariyadi'),
(4, 'Sri Emut, S.Pd.'),
(5, 'Betharia Sonata Ambarita, S.Pd.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE `tujuan` (
  `id` bigint(20) NOT NULL,
  `tujuan` text NOT NULL,
  `id_subject` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id`, `tujuan`, `id_subject`) VALUES
(1, 'Bertemu Kepala Sekolah', 1),
(2, 'Meminta Legalisir Ijazah', 1),
(3, 'Meminta Surat Perizinan', 2),
(5, 'Membuat Surat Pindah', 1),
(6, 'Izin Kegiatan', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(25) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `nama`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');

-- --------------------------------------------------------

--
-- Struktur untuk view `data_komentar`
--
DROP TABLE IF EXISTS `data_komentar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_komentar`  AS SELECT `komentar`.`pengunjung` AS `pengunjung`, `komentar`.`komentar` AS `komentar`, `komentar`.`rating` AS `rating`, date_format(`komentar`.`time`,'%d %M %Y %H:%i:%s') AS `time` FROM `komentar` ORDER BY `komentar`.`id` AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `data_kunjungan`
--
DROP TABLE IF EXISTS `data_kunjungan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_kunjungan`  AS SELECT `kunjungan`.`nama_pengunjung` AS `nama_pengunjung`, `kunjungan`.`alamat` AS `alamat`, `kunjungan`.`telp` AS `telp`, `kunjungan`.`instansi` AS `instansi`, `kunjungan`.`tujuan` AS `tujuan`, `kunjungan`.`subject` AS `subject`, `kunjungan`.`keterangan` AS `keterangan`, date_format(`kunjungan`.`time`,'%d %M %Y %H:%i:%s') AS `time` FROM `kunjungan` ORDER BY `kunjungan`.`id` AS `DESCdesc` ASC  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `data_tujuan`
--
DROP TABLE IF EXISTS `data_tujuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `data_tujuan`  AS SELECT `tujuan`.`id` AS `id_tujuan`, `tujuan`.`tujuan` AS `tujuan`, `subject`.`id` AS `id_subject`, `subject`.`nama` AS `nama_subject` FROM (`tujuan` join `subject` on(`tujuan`.`id_subject` = `subject`.`id`))  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tujuan`
--
ALTER TABLE `tujuan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
