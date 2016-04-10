-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2016 at 04:12 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'Admin ', 'admin@gmail.com', '123'),
(3, 'deye', 'deye@gmail.com', '123'),
(6, 'Sutinah', 'sutinah@gmail.com', '123'),
(7, ' Mokhamad Ariadi', 'mokhamad27@gmail.com', '123');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbcustomer`
--

INSERT INTO `tbcustomer` (`id_customer`, `id_pegawai`, `nama`, `no_telp`, `alamat`, `email`, `password`, `tgl_input`, `bulan`, `tahun`) VALUES
(1, 1, 'Juniar Sandra P', '085730534127', 'Jl Darjo Surabaya', 'juniar@gmail.com', '123', '2016-04-09', 'januari', '2016'),
(3, 3, 'Noviagati Pramudia', '089679730967', 'Jl Bowongan Pacitan', 'noviku@gmail.com', '123', '2016-04-09', 'januari', '2016'),
(4, 1, 'Anik Sumiarsih', '081217806522', 'Jl Jetis Kulon Gang 6', 'anik@gmail.com', '123', '2016-04-10', 'januari', '2016');

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
  `bulan` varchar(2) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  PRIMARY KEY (`id_kinerja`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbpegawai`
--

INSERT INTO `tbpegawai` (`id_pegawai`, `nama`, `tgl_lahir`, `no_telp`, `alamat`, `tgl_masuk`, `email`, `password`) VALUES
(1, 'Sandy S', '1993-01-27', '081217806522', 'Jl Mawar 27 Surabaya', '2016-04-09', 'sandy@gmail.com', '123'),
(3, 'Amirul', '1993-03-23', '085730534127', 'Jl Ketintang Madya 14A', '2016-04-09', 'amirul@gmail.com', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tbreward`
--

CREATE TABLE IF NOT EXISTS `tbreward` (
  `id_reward` int(11) NOT NULL AUTO_INCREMENT,
  `id_pegawai` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `jumlah_nilai` int(11) NOT NULL,
  PRIMARY KEY (`id_reward`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
