-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 02. Februari 2019 jam 16:02
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
  PRIMARY KEY (`id_jadwal`),
  KEY `id_kendaraan` (`id_kendaraan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `jadwal_keberangkatan`
--

INSERT INTO `jadwal_keberangkatan` (`id_jadwal`, `tgl_berangkat`, `jam`, `tujuan`, `harga`, `id_kendaraan`, `jml_kursi`) VALUES
(7, '2019-02-01', '06:00', 'Tasikmalaya', '55000', 4, 51),
(8, '2019-02-01', '09:00', 'Tasikmalaya', '55000', 5, 50),
(9, '2019-02-01', '15:00', 'Tasikmalaya', '55000', 6, 49),
(10, '2019-02-01', '21:00', 'Tasikmalaya', '55000', 7, 50);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nomor_kendaraan`, `merek_kendaraan`, `kelas_kendaraan`, `harga_kelas`) VALUES
(4, 'AB 123 XD', 'Scania', 'First Class', '65000'),
(5, 'AB 1234 XA', 'Hino', 'Executive', '75000'),
(6, 'AB 4567 BA', 'Mercedes', 'Executive', '80000'),
(7, 'AB 2345 AD', 'Volvo', 'First Class', '90000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `jk`, `tgl_lahir`, `no_ktp`, `no_telp`, `password`) VALUES
(12, 'Fazal Said Wicaksono', 'Janti, Gang Puntodewo, No 194', 'Pria', '1996-04-16', '579648530001', '082233439041', '7af44e682bfcbb8072c24552579cd094');

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
(00001, 12, 1, '2019-01-30 14:55:58', 6, 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `sms`
--

INSERT INTO `sms` (`id_sms`, `id_transaksi`, `tgl_sms`, `isi_sms`) VALUES
(7, 00008, '2019-02-02 09:02:00', 'Test saja Oy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id_tiket`),
  KEY `id_transaksi` (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_transaksi`) VALUES
(13, 00008);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesan`, `foto`, `tgl_transaksi`) VALUES
(00008, 00001, '121212.jpg', '2019-01-30 14:59:13');

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
  ADD CONSTRAINT `pesan_ibfk_9` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_keberangkatan` (`id_jadwal`),
  ADD CONSTRAINT `pesan_ibfk_7` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pesan_ibfk_8` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`);

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
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
