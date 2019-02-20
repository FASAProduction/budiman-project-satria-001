-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 20. Februari 2019 jam 10:32
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
  `id_tujuan` int(11) NOT NULL,
  `id_kendaraan` int(11) NOT NULL,
  `jml_kursi` int(3) NOT NULL,
  `diskon` int(2) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_kendaraan` (`id_kendaraan`),
  KEY `id_tujuan` (`id_tujuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `jadwal_keberangkatan`
--

INSERT INTO `jadwal_keberangkatan` (`id_jadwal`, `tgl_berangkat`, `jam`, `id_tujuan`, `id_kendaraan`, `jml_kursi`, `diskon`) VALUES
(5, '2019-02-15', '06:45', 2, 1, 50, 0),
(6, '2019-02-15', '07:30', 2, 1, 50, 0),
(7, '2019-02-15', '15:30', 2, 2, 48, 0),
(8, '2019-02-15', '15:45', 2, 2, 50, 0),
(9, '2019-02-15', '16:00', 2, 1, 50, 0),
(10, '2019-02-15', '16:30', 2, 1, 50, 0),
(11, '2019-02-15', '05:30', 1, 1, 50, 0),
(12, '2019-02-15', '06:00', 1, 1, 50, 0),
(13, '2019-02-15', '07:00', 1, 1, 50, 0),
(14, '2019-02-15', '09:00', 1, 1, 50, 0),
(15, '2019-02-15', '15:00', 1, 1, 50, 0),
(16, '2019-02-15', '17:30', 1, 1, 50, 0),
(17, '2019-02-15', '18:30', 1, 1, 50, 0),
(18, '2019-02-15', '19:30', 1, 1, 50, 0),
(19, '2019-02-15', '07:00', 3, 1, 50, 0),
(20, '2019-02-15', '18:00', 3, 1, 50, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `kendaraan`
--

INSERT INTO `kendaraan` (`id_kendaraan`, `nomor_kendaraan`, `merek_kendaraan`, `kelas_kendaraan`, `harga_kelas`) VALUES
(1, 'AB 4567 DA', 'Scania', 'Bisnis', '60000'),
(2, 'AD 8765 AB', 'Hino', 'Executive', '50000');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `jk`, `tgl_lahir`, `no_ktp`, `no_telp`, `password`) VALUES
(9, 'Fazal Said Wicaksono', 'Jl. Janti, Gang Puntodewo No 194', 'Pria', '1996-04-16', '680577460005', '082233439041', '7af44e682bfcbb8072c24552579cd094');

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
(00001, 9, 2, '2019-02-20 02:11:09', 2, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `sms`
--

INSERT INTO `sms` (`id_sms`, `id_transaksi`, `tgl_sms`, `isi_sms`) VALUES
(13, 00001, '2019-02-20 03:05:09', 'Sugar, yes please');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id_tiket`),
  KEY `id_transaksi` (`id_transaksi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `id_transaksi`) VALUES
(12, 00001);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` int(5) unsigned zerofill NOT NULL,
  `id_pesan` int(5) unsigned zerofill NOT NULL,
  `foto` text NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_transaksi`),
  KEY `id_pesan` (`id_pesan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pesan`, `foto`, `tgl_transaksi`) VALUES
(00001, 00001, '7680850ea97eb9d5d95392d362ab6f07.jpg', '2019-02-20 02:11:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tujuan`
--

CREATE TABLE IF NOT EXISTS `tujuan` (
  `id_tujuan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tujuan` varchar(299) NOT NULL,
  `harga` varchar(299) NOT NULL,
  PRIMARY KEY (`id_tujuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `tujuan`
--

INSERT INTO `tujuan` (`id_tujuan`, `nama_tujuan`, `harga`) VALUES
(1, 'Tasikmalaya', '50000'),
(2, 'Cimahi, Bandung', '55000'),
(3, 'Pangandaran', '50000');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  ADD CONSTRAINT `jadwal_keberangkatan_ibfk_1` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`),
  ADD CONSTRAINT `jadwal_keberangkatan_ibfk_2` FOREIGN KEY (`id_tujuan`) REFERENCES `tujuan` (`id_tujuan`);

--
-- Ketidakleluasaan untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_4` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pesan_ibfk_5` FOREIGN KEY (`id_kendaraan`) REFERENCES `kendaraan` (`id_kendaraan`) ON DELETE NO ACTION,
  ADD CONSTRAINT `pesan_ibfk_6` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_keberangkatan` (`id_jadwal`) ON DELETE NO ACTION;

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
