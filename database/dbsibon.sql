-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2016 at 03:36 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbsibon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbadmin`
--

CREATE TABLE IF NOT EXISTS `tbadmin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'Admin ', 'admin@gmail.com', '123'),
(3, 'deye', 'deye@gmail.com', '123'),
(6, 'Sutinah', 'sutinah@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbcustomer`
--

CREATE TABLE IF NOT EXISTS `tbcustomer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `tgl_input` date NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`id_customer`, `id_pegawai`, `nama`, `no_telp`, `alamat`, `email`, `password`, `tgl_input`, `bulan`, `tahun`) VALUES
(1, 1, 'Juniar Sandra P', '085730534127', 'Jl Darjo Surabaya', 'juniar@gmail.com', '123', '2016-04-09', 'januari', '2016'),
(3, 3, 'Noviagati Pramudia', '089679730967', 'Jl Bowongan Pacitan', 'noviku@gmail.com', '123', '2016-04-09', 'januari', '2016'),
(4, 1, 'Anik Sumiarsih', '081217806522', 'Jl Jetis Kulon Gang 6', 'anik@gmail.com', '123', '2016-04-10', 'januari', '2016'),
(6, 3, 'Nada Salalillah', '085730534127', 'Jl Bowongan Pacitan', 'nada@gmail.com', '123', '2016-04-16', 'januari', '2016'),
(7, 3, 'Nuraeni', '085730534127', 'Jl Lontar No 18', 'eni@gmail.com', '123', '2016-04-16', 'januari', '2016'),
(8, 3, 'Dimas Iqbal', '081217806522', 'Jl Mawar 12A', 'dimas@gmail.com', '123', '2016-04-16', 'januari', '2016'),
(9, 4, 'Luluk Arfiana', '081217806522', 'Jl Kemodo Mojoagung Jombang', 'luluk@gmail.com', '123', '2016-04-21', 'januari', '2016'),
(10, 4, 'Usi Suliswati', '085730534127', 'Jl Bowongan Arjowinangun Pacitan', 'usi@gmail.com', '123', '2016-04-21', 'januari', '2016'),
(11, 4, 'Ferry Eka Wahyuni', '081217807622', 'Jl Kemodo Mojoagung Jombang', 'feri@gmail.com', '123', '2016-04-21', 'januari', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbkedisiplinan`
--

CREATE TABLE IF NOT EXISTS `tbkedisiplinan` (
  `id_kedisiplinan` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_kedisiplinan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbkedisiplinan`
--

INSERT INTO `tbkedisiplinan` (`id_kedisiplinan`, `ket`, `nilai`) VALUES
(1, 'Sangat Baik', 5),
(2, 'Baik', 3),
(3, 'Cukup', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbkejujuran`
--

CREATE TABLE IF NOT EXISTS `tbkejujuran` (
  `id_kejujuran` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_kejujuran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbkejujuran`
--

INSERT INTO `tbkejujuran` (`id_kejujuran`, `ket`, `nilai`) VALUES
(1, 'Sangat Baik', 5),
(2, 'Baik', 4),
(3, 'Cukup', 3),
(4, 'Jelek', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbkinerja`
--

CREATE TABLE IF NOT EXISTS `tbkinerja` (
  `id_kinerja` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `jml_absensi` int(11) NOT NULL,
  `kejujuran` int(11) NOT NULL,
  `kualitas_kerja` int(11) NOT NULL,
  `cuti` int(11) NOT NULL,
  `kedisiplinan` int(11) NOT NULL,
  `sikap` int(11) NOT NULL,
  `target` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  PRIMARY KEY (`id_kinerja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbkinerja`
--

INSERT INTO `tbkinerja` (`id_kinerja`, `id_pegawai`, `jml_absensi`, `kejujuran`, `kualitas_kerja`, `cuti`, `kedisiplinan`, `sikap`, `target`, `bulan`, `tahun`) VALUES
(4, 1, 20, 2, 3, 1, 2, 2, 2, 'januari', '2016'),
(5, 3, 20, 1, 3, 0, 2, 2, 1, 'januari', '2016'),
(7, 4, 20, 2, 2, 1, 1, 2, 1, 'januari', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbkota`
--

CREATE TABLE IF NOT EXISTS `tbkota` (
  `id_kota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kota` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kota`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbkota`
--

INSERT INTO `tbkota` (`id_kota`, `nama_kota`) VALUES
(1, 'Bali'),
(2, 'Jogjakarta'),
(3, 'Lombok');

-- --------------------------------------------------------

--
-- Table structure for table `tbkualitaskerja`
--

CREATE TABLE IF NOT EXISTS `tbkualitaskerja` (
  `id_kualitaskerja` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_kualitaskerja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbkualitaskerja`
--

INSERT INTO `tbkualitaskerja` (`id_kualitaskerja`, `ket`, `nilai`) VALUES
(1, 'Jelek', 1),
(2, 'Cukup', 3),
(3, 'Baik', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbpegawai`
--

CREATE TABLE IF NOT EXISTS `tbpegawai` (
  `id_pegawai` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbpegawai`
--

INSERT INTO `tbpegawai` (`id_pegawai`, `nama`, `tgl_lahir`, `no_telp`, `alamat`, `tgl_masuk`, `email`, `password`) VALUES
(1, 'Sandy Setiawan', '1993-01-27', '081217806522', 'Jl Mawar 27 Surabaya', '2016-01-09', 'sandy@gmail.com', '123'),
(3, 'Amirul', '1993-03-23', '085730534127', 'Jl Ketintang Madya 14A', '2016-04-09', 'amirul@gmail.com', '123'),
(4, 'Satria Hernanda', '1993-04-21', '085730534127', 'Jl Manukan 23 A Surabaya', '2016-01-02', 'satria@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbreward`
--

CREATE TABLE IF NOT EXISTS `tbreward` (
  `id_reward` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `jumlah_nilai` int(11) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  PRIMARY KEY (`id_reward`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbreward`
--

INSERT INTO `tbreward` (`id_reward`, `id_pegawai`, `id_customer`, `jumlah_nilai`, `bulan`, `tahun`) VALUES
(1, 1, 1, 5, 'januari', '2016'),
(3, 1, 4, 3, 'januari', '2016'),
(4, 3, 8, 4, 'januari', '2016'),
(5, 3, 7, 3, 'januari', '2016'),
(6, 3, 6, 5, 'januari', '2016'),
(7, 3, 3, 4, 'januari', '2016'),
(8, 4, 9, 4, 'januari', '2016'),
(9, 4, 11, 3, 'januari', '2016'),
(10, 4, 10, 5, 'januari', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbsikap`
--

CREATE TABLE IF NOT EXISTS `tbsikap` (
  `id_sikap` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_sikap`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbsikap`
--

INSERT INTO `tbsikap` (`id_sikap`, `ket`, `nilai`) VALUES
(1, 'Sangat Baik', 5),
(2, 'Baik', 4),
(3, 'Cukup', 2),
(4, 'Tidak Baik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbtarget`
--

CREATE TABLE IF NOT EXISTS `tbtarget` (
  `id_target` int(11) NOT NULL AUTO_INCREMENT,
  `ket` varchar(50) NOT NULL,
  `nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_target`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbtarget`
--

INSERT INTO `tbtarget` (`id_target`, `ket`, `nilai`) VALUES
(1, 'Memenuhi', 5),
(2, 'Hampir Memenuhi', 2),
(3, 'Belum Memenuhi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbtrip`
--

CREATE TABLE IF NOT EXISTS `tbtrip` (
  `id_trip` int(11) NOT NULL AUTO_INCREMENT,
  `id_kota` int(11) NOT NULL,
  `nama_wisata` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id_trip`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `tbtrip`
--

INSERT INTO `tbtrip` (`id_trip`, `id_kota`, `nama_wisata`, `harga`) VALUES
(1, 1, 'Pantai Kuta', 0),
(2, 1, 'Pura Tanah Lot', 0),
(3, 1, 'Pantai Padang Padang', 0),
(4, 1, 'Danau Beratan Bedugul', 0),
(5, 1, 'Garuda Wisnu Kencana', 0),
(6, 1, 'Pantai Lovina', 0),
(7, 1, 'Pura Besakih', 0),
(8, 1, 'Pura Uluwatu', 0),
(9, 1, 'Pantai Jimbaran', 0),
(10, 1, 'Monkey Forest', 0),
(11, 1, 'Tanjung Benoa', 0),
(12, 1, 'Danau Batur Kintamani', 0),
(13, 2, 'Candi Prambanan', 0),
(14, 2, 'Pantai Parangtritis', 0),
(15, 2, 'Jalan Malioboro', 0),
(16, 2, 'Goa Jomblang', 0),
(17, 2, 'Arum Jeram Citra Elo', 0),
(18, 2, 'Keraton Yogyakarta', 0),
(19, 2, 'Kebun Binatang Gembira Loka', 0),
(20, 2, 'Gunung Merapi', 0),
(21, 2, 'Candi Borobudur', 0),
(22, 2, 'Istana Air Taman Sari', 0),
(23, 3, 'Batu Bolong', 0),
(24, 3, 'Batu Layar', 0),
(25, 3, 'Pulau Gili Lombok', 0),
(26, 3, 'Pantai Sekotong', 0),
(27, 3, 'Taman Narmada', 0),
(28, 3, 'Gili Nanggu', 14000);

-- --------------------------------------------------------

--
-- Table structure for table `tbwish`
--

CREATE TABLE IF NOT EXISTS `tbwish` (
  `id_wish` int(11) NOT NULL AUTO_INCREMENT,
  `id_kota` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `ket` text NOT NULL,
  `jml` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_wish`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbwish`
--

INSERT INTO `tbwish` (`id_wish`, `id_kota`, `id_customer`, `ket`, `jml`, `status`) VALUES
(1, 1, 1, 'Paket Wisata Bali Untuk Siswa', 40, 2),
(2, 2, 1, 'Paket Wisata Orang Tua Wali', 20, 3),
(3, 3, 1, 'Paket Wisata Lombok', 25, 2),
(5, 3, 4, 'Paket Manula Lombok', 30, 0),
(6, 1, 4, 'Bali Fun', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbwishlist`
--

CREATE TABLE IF NOT EXISTS `tbwishlist` (
  `id_wishlist` int(11) NOT NULL AUTO_INCREMENT,
  `id_wish` int(11) NOT NULL,
  `id_trip` int(11) NOT NULL,
  PRIMARY KEY (`id_wishlist`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbwishlist`
--

INSERT INTO `tbwishlist` (`id_wishlist`, `id_wish`, `id_trip`) VALUES
(18, 1, 4),
(19, 1, 5),
(20, 1, 6),
(21, 1, 3),
(29, 3, 25),
(30, 3, 24),
(31, 2, 13),
(32, 2, 21),
(33, 2, 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
