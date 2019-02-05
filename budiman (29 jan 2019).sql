-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 28 Jan 2019 pada 23.57
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `budiman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `hak_akses` enum('Super Admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'Admin Pusat', 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_keberangkatan`
--

CREATE TABLE `jadwal_keberangkatan` (
  `id_jadwal` int(11) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `jam` varchar(40) NOT NULL,
  `tujuan` varchar(299) NOT NULL,
  `harga` varchar(299) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `jml_kursi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_keberangkatan`
--

INSERT INTO `jadwal_keberangkatan` (`id_jadwal`, `tgl_berangkat`, `jam`, `tujuan`, `harga`, `id_kendaraan`, `jml_kursi`) VALUES
(1, '2018-11-30', '12:00', 'Bekasi', '25000', 1, 0),
(2, '2018-11-24', '17.00', 'Depok', '150000', 2, 74),
(3, '2019-01-23', '09:00', 'Tasikmalaya', '55000', 3, 74),
(4, '2019-01-22', '08:00', 'Tasikmalaya', '55000', 1, 74);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE `kendaraan` (
  `id_kendaraan` int(11) NOT NULL,
  `nomor_kendaraan` varchar(100) NOT NULL,
  `merek_kendaraan` varchar(50) NOT NULL,
  `kelas_kendaraan` varchar(50) NOT NULL,
  `harga_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nomor_kendaraan`, `merek_kendaraan`, `kelas_kendaraan`, `harga_kelas`) VALUES
(1, 'AB 1234 VA', 'Mercedez Benz', 'Executive', '50000'),
(2, 'AB 5678 AD', 'Scania', 'First Class', '45000'),
(3, 'AB123XD', 'Mercedes', 'First Class', '85000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `jk`, `tgl_lahir`, `no_ktp`, `no_telp`, `password`) VALUES
(5, 'Fazal Said Wicaksono', 'Jl. Janti, Gang Puntodewo No 194', 'Pria', '1996-04-16', '680579460002', '082233439041', '7af44e682bfcbb8072c24552579cd094'),
(6, 'Rizky Kurniawan', 'Kuwon', 'Pria', '2019-01-26', '13142525', '123', 'f202bcc8e19f4f054721f45ad97edecb'),
(7, 'Rizky Kurniawan', 'Kuwon', 'Pria', '2019-01-26', '13142525', '123', 'f202bcc8e19f4f054721f45ad97edecb'),
(8, 'Rizky Kurniawan', 'Kuwon', 'Pria', '2019-01-26', '13142525', '123', 'f202bcc8e19f4f054721f45ad97edecb');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(5) UNSIGNED ZEROFILL NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jml_penumpang` int(3) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kendaraan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `jml_penumpang`, `tgl_pesan`, `id_kendaraan`, `id_jadwal`) VALUES
(00001, 6, 30, '2019-01-28 22:53:08', 1, 1),
(00002, 6, 1, '2019-01-28 22:54:28', 1, 1);

--
-- Trigger `pesan`
--
DELIMITER $$
CREATE TRIGGER `hapus` AFTER DELETE ON `pesan` FOR EACH ROW BEGIN
	UPDATE jadwal_keberangkatan SET jadwal_keberangkatan.jml_kursi = jadwal_keberangkatan.jml_kursi + old.jml_penumpang WHERE jadwal_keberangkatan.id_jadwal = id_jadwal;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sms`
--

CREATE TABLE `sms` (
  `id_sms` int(11) NOT NULL,
  `id_transaksi` int(5) UNSIGNED ZEROFILL NOT NULL,
  `tgl_sms` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi_sms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `id_transaksi` int(5) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(5) UNSIGNED ZEROFILL NOT NULL,
  `id_pesan` int(5) UNSIGNED ZEROFILL NOT NULL,
  `foto` text NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesan`, `foto`, `tgl_transaksi`) VALUES
(00000, 00001, '', '2019-01-28 22:53:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_kendaraan` (`id_kendaraan`);

--
-- Indeks untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_kendaraan` (`id_kendaraan`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indeks untuk tabel `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id_sms`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesan` (`id_pesan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kendaraan`
--
ALTER TABLE `kendaraan`
  MODIFY `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `sms`
--
ALTER TABLE `sms`
  MODIFY `id_sms` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  ADD CONSTRAINT `jadwal_keberangkatan_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pesan_ibfk_2` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `pesan_ibfk_3` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_keberangkatan` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `tiket`
--
ALTER TABLE `tiket`
  ADD CONSTRAINT `tiket_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
