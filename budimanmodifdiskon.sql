-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 01. Februari 2019 jam 04:59
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `budiman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `hak_akses` enum('Super Admin') NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_admin`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'Admin Pusat', 'Super Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_keberangkatan`
--

CREATE TABLE IF NOT EXISTS `jadwal_keberangkatan` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_berangkat` date NOT NULL,
  `jam` varchar(40) NOT NULL,
  `tujuan` varchar(299) NOT NULL,
  `harga` varchar(299) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `jml_kursi` int(3) NOT NULL,
  `diskon` int(2) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_kendaraan` (`id_kendaraan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `jadwal_keberangkatan`
--

INSERT INTO `jadwal_keberangkatan` (`id_jadwal`, `tgl_berangkat`, `jam`, `tujuan`, `harga`, `id_kendaraan`, `jml_kursi`, `diskon`) VALUES
(6, '2019-02-02', '08:00', 'Tasikmalaya', '70000', 4, 44, 20),
(7, '2019-03-02', '10:00', 'Jakarta', '70000', 4, 48, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kendaraan`
--

CREATE TABLE IF NOT EXISTS `kendaraan` (
  `id_kendaraan` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_kendaraan` varchar(100) NOT NULL,
  `merek_kendaraan` varchar(50) NOT NULL,
  `kelas_kendaraan` varchar(50) NOT NULL,
  `harga_kelas` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kendaraan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nomor_kendaraan`, `merek_kendaraan`, `kelas_kendaraan`, `harga_kelas`) VALUES
(4, 'AB 1234 XD', 'Hino', 'Executive', '50000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `jk`, `tgl_lahir`, `no_ktp`, `no_telp`, `password`) VALUES
(9, 'Fazal Said Wicaksono', 'Jl. Janti, Gang Puntodewo No 194', 'Pria', '1996-04-16', '680579460002', '082233439041', '7af44e682bfcbb8072c24552579cd094');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(5) unsigned zerofill NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jml_penumpang` int(3) NOT NULL,
  `tgl_pesan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kendaraan` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  PRIMARY KEY (`id_pesan`),
  KEY `id_pelanggan` (`id_pelanggan`),
  KEY `id_kendaraan` (`id_kendaraan`),
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pelanggan`, `jml_penumpang`, `tgl_pesan`, `id_kendaraan`, `id_jadwal`) VALUES
(00001, 9, 4, '2019-01-31 15:25:57', 4, 6),
(00002, 9, 2, '2019-01-31 17:25:52', 4, 6),
(00003, 9, 2, '2019-01-31 17:36:19', 4, 7);

--
-- Trigger `pesan`
--
DROP TRIGGER IF EXISTS `hapus`;
DELIMITER //
CREATE TRIGGER `hapus` AFTER DELETE ON `pesan`
 FOR EACH ROW BEGIN
	UPDATE jadwal_keberangkatan SET jadwal_keberangkatan.jml_kursi = jadwal_keberangkatan.jml_kursi + old.jml_penumpang WHERE jadwal_keberangkatan.id_jadwal = id_jadwal;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sms`
--

CREATE TABLE IF NOT EXISTS `sms` (
  `id_sms` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(5) unsigned zerofill NOT NULL,
  `tgl_sms` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isi_sms` text NOT NULL,
  PRIMARY KEY (`id_sms`),
  KEY `id_transaksi` (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id_tiket`),
  KEY `id_transaksi` (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `id_pesan` int(5) unsigned zerofill NOT NULL,
  `foto` text NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_pesan` (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesan`, `foto`, `tgl_transaksi`) VALUES
(00001, 00001, '', '2019-01-31 17:08:27'),
(00002, 00002, '', '2019-01-31 17:35:18'),
(00003, 00003, '', '2019-01-31 17:44:49');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
