-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2016 at 06:42 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reklamebaru1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idadmin` int(10) NOT NULL,
  `nmadmin` varchar(25) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(25) NOT NULL,
  `foto` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `nmadmin`, `username`, `password`, `telpon`, `alamat`, `email`, `foto`) VALUES
(1, 'admin', 'admin', 'admin', '021873745634', 'Surakarta', 'admin@reklame.id', 'foto1');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

CREATE TABLE IF NOT EXISTS `area` (
  `idarea` int(10) NOT NULL,
  `nmarea` varchar(25) NOT NULL,
  `hrgarea` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`idarea`, `nmarea`, `hrgarea`) VALUES
(1, 'Banjarsari', 400000),
(2, 'Jebres', 300000),
(3, 'Pasar Kliwon', 200000),
(4, 'Serengan', 200000),
(5, 'Laweyan', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE IF NOT EXISTS `detail` (
  `iddetail` int(10) NOT NULL,
  `kodepemesanan` varchar(10) NOT NULL,
  `reklame` int(10) NOT NULL,
  `jangkawaktu` int(25) NOT NULL,
  `tglpasang` date NOT NULL,
  `tgllepas` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`iddetail`, `kodepemesanan`, `reklame`, `jangkawaktu`, `tglpasang`, `tgllepas`) VALUES
(44, 'P0003D0001', 8, 3, '2016-06-03', '2016-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
  `idjenis` int(10) NOT NULL,
  `nmjenis` varchar(25) NOT NULL,
  `hrgjenis` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`idjenis`, `nmjenis`, `hrgjenis`) VALUES
(1, 'Baliho', 100000),
(2, 'Megatron', 500000),
(3, 'Billboard', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE IF NOT EXISTS `pemesan` (
  `idpemesan` int(10) NOT NULL,
  `nmpemesan` varchar(25) NOT NULL,
  `telpon` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`idpemesan`, `nmpemesan`, `telpon`, `alamat`, `email`) VALUES
(1, 'Andesta Putra', '08978787878', 'Jl. Bogor', 'ddesta@gmail.com'),
(2, 'Afifah Tri Wardani', '02176473937', 'Jl. Karanganyar', 'afifah@yahoo.co.id'),
(3, 'Google Inc.', '73819273', 'Dsn. Silicon Valley', 'mimin@gmail.com'),
(4, 'Afif Zidan Nurrizqi', '08229816767', 'Jl. Solo', 'afifzidan1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE IF NOT EXISTS `pemesanan` (
  `idpemesanan` int(10) NOT NULL,
  `kodepemesanan` varchar(10) NOT NULL,
  `tglpemesanan` date NOT NULL,
  `pemesan` int(10) NOT NULL,
  `totalbayar` int(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`idpemesanan`, `kodepemesanan`, `tglpemesanan`, `pemesan`, `totalbayar`) VALUES
(5, 'P0001', '2016-06-22', 3, 5000),
(6, 'P0002', '2016-06-22', 2, 900);

-- --------------------------------------------------------

--
-- Table structure for table `reklame`
--

CREATE TABLE IF NOT EXISTS `reklame` (
  `idreklame` int(10) NOT NULL,
  `jenis` int(10) NOT NULL,
  `area` int(10) NOT NULL,
  `ukuran` int(10) NOT NULL,
  `hrg` int(25) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reklame`
--

INSERT INTO `reklame` (`idreklame`, `jenis`, `area`, `ukuran`, `hrg`, `status`) VALUES
(3, 1, 4, 4, 500000, 'Tersedia'),
(4, 3, 1, 2, 1000000, 'Tersedia'),
(5, 1, 5, 1, 900000, 'Tersedia'),
(6, 2, 1, 1, 1400000, 'Tersedia'),
(7, 2, 4, 3, 1000000, 'Tersedia'),
(8, 3, 3, 3, 700000, 'Disewa');

-- --------------------------------------------------------

--
-- Table structure for table `ukuran`
--

CREATE TABLE IF NOT EXISTS `ukuran` (
  `idukuran` int(10) NOT NULL,
  `nmukuran` varchar(25) NOT NULL,
  `hrgukuran` int(25) NOT NULL,
  `detailukuran` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ukuran`
--

INSERT INTO `ukuran` (`idukuran`, `nmukuran`, `hrgukuran`, `detailukuran`) VALUES
(1, 'Xtra Big', 500000, '5x6'),
(2, 'Big', 400000, '4x5'),
(3, 'Medium', 300000, '3x4'),
(4, 'Small', 200000, '2x3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idarea`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`idjenis`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`idpemesan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpemesanan`);

--
-- Indexes for table `reklame`
--
ALTER TABLE `reklame`
  ADD PRIMARY KEY (`idreklame`);

--
-- Indexes for table `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`idukuran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `area`
--
ALTER TABLE `area`
  MODIFY `idarea` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `detail`
--
ALTER TABLE `detail`
  MODIFY `iddetail` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `idjenis` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `idpemesan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpemesanan` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `reklame`
--
ALTER TABLE `reklame`
  MODIFY `idreklame` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `idukuran` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
