-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2019 pada 05.04
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk_assunah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `kode_akun` int(3) NOT NULL,
  `header_akun` varchar(20) DEFAULT NULL,
  `nama_akun` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`kode_akun`, `header_akun`, `nama_akun`) VALUES
(110, '1', 'Kas'),
(120, '1', 'Peralatan Kantor'),
(130, '1', 'Perlengkapan Kantor'),
(210, '2', 'Piutang'),
(211, '1', 'utang'),
(310, '3', 'Modal'),
(320, '3', 'Prive'),
(410, '4', 'Pendapatan SPP'),
(420, '4', 'Pendapatan Pendaftaran'),
(510, '5', 'Beban ATK'),
(520, '5', 'Beban Konsumsi'),
(530, '5', 'Beban Kas PKG, IGTKI, GGS'),
(540, '5', 'Beban Listrik'),
(550, '5', 'Beban Seminar'),
(560, '5', 'Beban Perbaikan (Service)\r\n'),
(570, '5', 'Beban Lain-lain');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggaran`
--

CREATE TABLE `anggaran` (
  `no_anggaran` varchar(3) NOT NULL,
  `total` int(100) DEFAULT NULL,
  `periode` date NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggaran`
--

INSERT INTO `anggaran` (`no_anggaran`, `total`, `periode`, `ket`) VALUES
('1', 300000, '2018-12-19', 'Selesai'),
('2', 850000, '2018-12-20', 'Selesai'),
('3', 150000, '2018-12-22', 'Selesai'),
('4', 0, '0000-00-00', 'Penginputan Data Belum Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datasiswa`
--

CREATE TABLE `datasiswa` (
  `nis` varchar(5) NOT NULL,
  `nama_siswa` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `nama_ortu` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datasiswa`
--

INSERT INTO `datasiswa` (`nis`, `nama_siswa`, `tempat_lahir`, `tgl_lahir`, `gender`, `nama_ortu`) VALUES
('323', 'ABHINAYA BASUPATI H.', 'BATAM', '2013-12-25', 'Laki-Laki', 'PRIYANTO'),
('324', 'AFIQAH NUR SAFITRI', 'BATAM', '2012-08-29', 'Perempuan', 'WALYADIN'),
('397', 'ASGHAD ATHALA B.B.S', 'BATAM', '2013-09-23', 'Laki-Laki', 'AKHMAD MUSADDAQ'),
('398', 'ADHIPATI RASYID A', 'BATAM', '2013-07-16', 'Laki-Laki', 'SRI YADIN'),
('400', 'DEAR JELITA A', 'BATAM', '2013-10-21', 'Perempuan', 'JAN RUDI OMPUSUNGGU'),
('401', 'JUSTIN WIJAYA', 'BATAM', '2015-04-06', 'Laki-Laki', 'HERMANTO WIJAYA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_anggaran`
--

CREATE TABLE `detail_anggaran` (
  `no_anggaran` varchar(3) NOT NULL,
  `periode` date NOT NULL,
  `kode_akun` int(3) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_anggaran`
--

INSERT INTO `detail_anggaran` (`no_anggaran`, `periode`, `kode_akun`, `total`) VALUES
('1', '2018-12-19', 510, 100000),
('1', '2018-12-19', 520, 200000),
('2', '2018-12-20', 510, 500000),
('2', '2018-12-20', 520, 200000),
('2', '2018-12-20', 530, 150000),
('3', '2018-12-22', 520, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_rincian`
--

CREATE TABLE `detail_rincian` (
  `no_rincian` varchar(3) NOT NULL,
  `nama_rincian` varchar(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_spp`
--

CREATE TABLE `detail_spp` (
  `no_spp` varchar(3) NOT NULL,
  `nis` varchar(5) DEFAULT NULL,
  `bulan` date DEFAULT NULL,
  `jumlah_byr` int(100) DEFAULT NULL,
  `ket` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transbeban`
--

CREATE TABLE `detail_transbeban` (
  `no_trans` int(10) NOT NULL,
  `tgl_trans` date NOT NULL,
  `kode_akun` int(3) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_transbeban`
--

INSERT INTO `detail_transbeban` (`no_trans`, `tgl_trans`, `kode_akun`, `total`) VALUES
(1, '0000-00-00', 520, 90000),
(1, '0000-00-00', 560, 10000),
(2, '0000-00-00', 550, 125000),
(2, '0000-00-00', 520, 100000),
(2, '0000-00-00', 560, 400000),
(3, '0000-00-00', 510, 100000),
(3, '0000-00-00', 540, 100000),
(4, '0000-00-00', 530, 150000),
(4, '0000-00-00', 510, 125000),
(5, '0000-00-00', 530, 150000),
(5, '0000-00-00', 520, 150000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal`
--

CREATE TABLE `jurnal` (
  `id_jurnal` varchar(10) NOT NULL,
  `nama_jurnal` varchar(100) DEFAULT NULL,
  `kode_akun` int(3) DEFAULT NULL,
  `no_trans` int(10) DEFAULT NULL,
  `jumlah` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` varchar(8) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `total` int(100) NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian`
--

CREATE TABLE `rincian` (
  `no_rincian` varchar(3) NOT NULL,
  `jenis_rincian` varchar(100) DEFAULT NULL,
  `nama_rincian` varchar(100) DEFAULT NULL,
  `total` int(100) DEFAULT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `no_spp` varchar(3) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `jumlah` int(100) DEFAULT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`no_spp`, `nama_siswa`, `jumlah`, `status`) VALUES
('101', 'ASGHAD ATHALA B.B.S', 400000, 'Sudah Lunas'),
('102', 'JUSTIN WIJAYA', 400000, 'Sudah Lunas'),
('103', 'DEAR JELITA A', 400000, 'Sudah Lunas'),
('104', 'AFIQAH NUR SAFITRI', 400000, 'Sudah Lunas'),
('105', 'ABHINAYA BASUPATI H.', 400000, 'Sudah Lunas'),
('106', 'ASGHAD ATHALA B.B.S', 400000, 'Sudah Lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transbeban`
--

CREATE TABLE `transbeban` (
  `no_trans` int(10) NOT NULL,
  `tgl_trans` date DEFAULT NULL,
  `total` int(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transbeban`
--

INSERT INTO `transbeban` (`no_trans`, `tgl_trans`, `total`, `keterangan`) VALUES
(1, '2018-12-18', 100000, 'selesai'),
(2, '2018-12-18', 625000, 'Selesai'),
(3, '2018-12-18', 200000, 'Selesai'),
(4, '2018-12-18', 275000, 'Selesai'),
(5, '2018-12-20', 300000, 'Selesai'),
(6, '0000-00-00', 0, 'Penginputan Data Belum Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `pass` varchar(5) DEFAULT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `pass`, `level`) VALUES
('administrasi', '12345', 'administrasi'),
('keuangan', '12345', 'keuangan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`kode_akun`);

--
-- Indeks untuk tabel `anggaran`
--
ALTER TABLE `anggaran`
  ADD PRIMARY KEY (`no_anggaran`);

--
-- Indeks untuk tabel `datasiswa`
--
ALTER TABLE `datasiswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `detail_anggaran`
--
ALTER TABLE `detail_anggaran`
  ADD KEY `no_anggaran` (`no_anggaran`);

--
-- Indeks untuk tabel `detail_rincian`
--
ALTER TABLE `detail_rincian`
  ADD KEY `no_rincian` (`no_rincian`);

--
-- Indeks untuk tabel `detail_spp`
--
ALTER TABLE `detail_spp`
  ADD KEY `nis` (`nis`),
  ADD KEY `no_spp` (`no_spp`);

--
-- Indeks untuk tabel `detail_transbeban`
--
ALTER TABLE `detail_transbeban`
  ADD KEY `no_trans` (`no_trans`);

--
-- Indeks untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id_jurnal`),
  ADD KEY `kode_akun` (`kode_akun`),
  ADD KEY `no_trans` (`no_trans`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`);

--
-- Indeks untuk tabel `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`no_rincian`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`no_spp`);

--
-- Indeks untuk tabel `transbeban`
--
ALTER TABLE `transbeban`
  ADD PRIMARY KEY (`no_trans`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_anggaran`
--
ALTER TABLE `detail_anggaran`
  ADD CONSTRAINT `detail_anggaran_ibfk_1` FOREIGN KEY (`no_anggaran`) REFERENCES `anggaran` (`no_anggaran`);

--
-- Ketidakleluasaan untuk tabel `detail_rincian`
--
ALTER TABLE `detail_rincian`
  ADD CONSTRAINT `detail_rincian_ibfk_1` FOREIGN KEY (`no_rincian`) REFERENCES `rincian` (`no_rincian`);

--
-- Ketidakleluasaan untuk tabel `detail_spp`
--
ALTER TABLE `detail_spp`
  ADD CONSTRAINT `detail_spp_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `datasiswa` (`nis`),
  ADD CONSTRAINT `detail_spp_ibfk_2` FOREIGN KEY (`no_spp`) REFERENCES `spp` (`no_spp`);

--
-- Ketidakleluasaan untuk tabel `detail_transbeban`
--
ALTER TABLE `detail_transbeban`
  ADD CONSTRAINT `detail_transbeban_ibfk_1` FOREIGN KEY (`no_trans`) REFERENCES `transbeban` (`no_trans`);

--
-- Ketidakleluasaan untuk tabel `jurnal`
--
ALTER TABLE `jurnal`
  ADD CONSTRAINT `jurnal_ibfk_1` FOREIGN KEY (`kode_akun`) REFERENCES `akun` (`kode_akun`),
  ADD CONSTRAINT `jurnal_ibfk_3` FOREIGN KEY (`no_trans`) REFERENCES `transbeban` (`no_trans`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
