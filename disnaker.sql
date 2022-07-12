-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 12 Jul 2022 pada 07.44
-- Versi server: 5.7.34
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `disnaker`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `nama_desa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `nama_desa`) VALUES
(1, 'Keladan'),
(2, 'Margasari'),
(3, 'Cempaka'),
(4, 'Harapan Masa'),
(5, 'Hatiwin'),
(6, 'Lawahan'),
(7, 'Rumintin'),
(8, 'Sawang'),
(9, 'Suato Tatakan'),
(10, 'Tandui');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(255) NOT NULL,
  `info_instansi` varchar(255) NOT NULL,
  `alamat_instansi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `info_instansi`, `alamat_instansi`) VALUES
(1, 'Hasnur Centre', 'Lowongan : \r\n- Admin, Operator, Driver\r\n- Semua Jurusan\r\n- Usia Maksimal 25 Tahun\r\n- Belum Menikah \r\n- Memiliki SIM A khusus Driver\r\n', 'Jl. Berangas Timur No.95 A Alalak\r\nKalimantan Selatan 70582');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat`
--

CREATE TABLE `masyarakat` (
  `id_masyarakat` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_masyarakat` varchar(255) DEFAULT NULL,
  `nik` varchar(150) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jk` varchar(11) DEFAULT NULL,
  `alamat` text,
  `pekerjaan` varchar(150) DEFAULT NULL,
  `no_wa` varchar(25) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `masyarakat`
--

INSERT INTO `masyarakat` (`id_masyarakat`, `id_user`, `nama_masyarakat`, `nik`, `email`, `jk`, `alamat`, `pekerjaan`, `no_wa`, `status`) VALUES
(1, 2, 'Helda Wati', '637123993299910', 'helda@gmail.com', 'Perempuan', 'Rantau Kiwa, Tapin Utara, Tapin Regency, South Kalimantan 71152', 'Belum Bekerja', '089579238888', 'Aktif'),
(2, 3, 'Husain Al Athos', '61238213888830', 'husain@gmail.com', 'Laki - Laki', '-', 'Belum Bekerja', '081203812038', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencarian_kerja`
--

CREATE TABLE `pencarian_kerja` (
  `id_pencarian_kerja` int(11) NOT NULL,
  `id_masyarakat` int(11) NOT NULL,
  `id_instansi` int(11) NOT NULL,
  `id_desa` int(11) NOT NULL,
  `surat_lamaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pencarian_kerja`
--

INSERT INTO `pencarian_kerja` (`id_pencarian_kerja`, `id_masyarakat`, `id_instansi`, `id_desa`, `surat_lamaran`) VALUES
(1, 1, 1, 3, '24352.pdf'),
(2, 2, 1, 2, '95225.png'),
(3, 2, 1, 2, '61528.png'),
(4, 2, 1, 5, '7266.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id_pendaftaran` int(11) NOT NULL,
  `nomor_antrian` varchar(5) DEFAULT NULL,
  `ktp` varchar(255) DEFAULT NULL,
  `kk` varchar(255) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `tgl_pendaftaran` date DEFAULT NULL,
  `tgl_buat` date DEFAULT NULL,
  `tgl_ambil` date DEFAULT NULL,
  `ket` text,
  `status_pendaftaran` varchar(100) DEFAULT NULL,
  `id_masyarakat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id_pendaftaran`, `nomor_antrian`, `ktp`, `kk`, `foto`, `tgl_pendaftaran`, `tgl_buat`, `tgl_ambil`, `ket`, `status_pendaftaran`, `id_masyarakat`) VALUES
(12, '001', '9313.jpeg', '27407.jpeg', '88951.png', '2022-07-12', '2022-07-12', '2022-07-13', 'Pengajuan Baru', 'Selesai', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator'),
(2, 'helda', '827ccb0eea8a706c4c34a16891f84e7b', 'Masyarakat'),
(3, 'husain', '827ccb0eea8a706c4c34a16891f84e7b', 'Masyarakat');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indeks untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD PRIMARY KEY (`id_masyarakat`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pencarian_kerja`
--
ALTER TABLE `pencarian_kerja`
  ADD PRIMARY KEY (`id_pencarian_kerja`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`),
  ADD KEY `id_pelanggan` (`id_masyarakat`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  MODIFY `id_masyarakat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pencarian_kerja`
--
ALTER TABLE `pencarian_kerja`
  MODIFY `id_pencarian_kerja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `masyarakat`
--
ALTER TABLE `masyarakat`
  ADD CONSTRAINT `masyarakat_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
