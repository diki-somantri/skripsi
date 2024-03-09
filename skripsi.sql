-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2016 at 01:49 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ta`
--
CREATE DATABASE IF NOT EXISTS `ta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ta`;

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE IF NOT EXISTS `kas` (
  `idKas` int(11) NOT NULL AUTO_INCREMENT,
  `tglTransaksi` date NOT NULL,
  `transaksi` text NOT NULL,
  `idKegiatan` int(11) NOT NULL,
  `status` enum('Debit','Kredit','','') NOT NULL,
  `biaya` int(11) NOT NULL,
  `foto` text NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  PRIMARY KEY (`idKas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `kategoribelanja`
--

CREATE TABLE IF NOT EXISTS `kategoribelanja` (
  `idKategori` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `username` varchar(30) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idKategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kategoribelanja`
--

INSERT INTO `kategoribelanja` (`idKategori`, `deskripsi`, `username`, `tgl`) VALUES
(1, 'Belanja Pegawai', 'admin', '2016-03-27 00:26:21'),
(2, 'Belanja Barang dan Jasa', 'admin', '2016-03-27 00:27:11'),
(3, 'Belanja Modal', 'admin', '2016-03-27 00:33:56'),
(4, 'Lain-lain', 'admin', '2016-03-27 00:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatanbelanja`
--

CREATE TABLE IF NOT EXISTS `kegiatanbelanja` (
  `idKegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `deskripsi` text NOT NULL,
  `idKategori` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idKegiatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `kegiatanbelanja`
--

INSERT INTO `kegiatanbelanja` (`idKegiatan`, `deskripsi`, `idKategori`, `username`, `tgl`) VALUES
(1, 'Gaji Pegawai Non PNS', 1, 'admin', '2016-03-27 00:30:12'),
(2, 'Biaya makanan dan minuman  - rapat dinas, tamu kantor, lembur', 2, 'admin', '2016-03-27 00:34:45'),
(3, 'Biaya pengganaan administrasi kantor dan pengadaan barang jasa', 1, 'admin', '2016-03-27 00:35:00'),
(4, 'Lain-lain', 4, 'admin', '2016-03-27 00:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`) VALUES
('admin', '1d1fe016293618b55d7250a544078947', 'Diki Somantri');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
