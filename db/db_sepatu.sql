-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2018 at 02:07 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` char(5) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `model` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nm_barang`, `model`, `harga`) VALUES
('00001', 'CMT', '013', 210000),
('00002', 'CMT', '023 SLIP ON', 200000),
('00003', 'CMT', '016', 290000),
('00004', 'CMT', '026', 280000),
('00005', 'CMT', 'EX', 350000),
('00006', 'CMT', '032 WOMEN', 190000),
('00007', 'CMT', '035 WOMEN', 170000),
('00008', 'CMT', '063 3/4', 330000),
('00009', 'CMT', '076', 320000),
('00010', 'CMT', '075', 330000),
('00011', 'CMT', 'PDH', 280000),
('00012', 'CMT', 'PDL', 200000);

-- --------------------------------------------------------

--
-- Table structure for table `detil_po`
--

CREATE TABLE IF NOT EXISTS `detil_po` (
  `no_po` char(8) NOT NULL,
  `id_barang` char(5) NOT NULL,
  `jumlah_pesan` int(4) NOT NULL,
  `ukuran` varchar(2) NOT NULL,
  `warna` text NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_po`
--

INSERT INTO `detil_po` (`no_po`, `id_barang`, `jumlah_pesan`, `ukuran`, `warna`, `sub_total`) VALUES
('18090101', '00001', 2, '38', 'Hitam', 420000),
('18090101', '00003', 3, '38', 'Biru', 870000),
('18090102', '00001', 2, '38', 'Hitam', 420000),
('18090102', '00001', 2, '41', 'Biru', 420000),
('18090103', '00006', 22, '40', 'Biru', 4180000),
('18090103', '00001', 12, '42', 'Navy', 2520000);

-- --------------------------------------------------------

--
-- Table structure for table `do`
--

CREATE TABLE IF NOT EXISTS `do` (
  `no_do` char(13) NOT NULL,
  `no_po` char(8) NOT NULL,
  `tgl_do` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `do`
--

INSERT INTO `do` (`no_do`, `no_po`, `tgl_do`, `total_harga`, `denda`) VALUES
('1405441809300', '18090102', '2018-09-30', 840000, 42000),
('1405541809302', '18090103', '2018-09-30', 6700000, 335000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `id_pegawai` char(3) NOT NULL,
  `nm_pegawai` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `bagian` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('0','1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nm_pegawai`, `alamat`, `no_telp`, `bagian`, `password`, `level`) VALUES
('P00', 'Arch', 'Tangerang', '081800001111', 'Manager', 'test', '0'),
('P01', 'Jane', 'Jakarta', '081800001122', 'Planning', 'test', '1'),
('P02', 'Gau', 'Jakarta', '081800002222', 'Produksi', 'test', '2');

-- --------------------------------------------------------

--
-- Table structure for table `salinan_po`
--

CREATE TABLE IF NOT EXISTS `salinan_po` (
  `no_po` char(8) NOT NULL,
  `nm_customer` varchar(50) NOT NULL,
  `tgl_po` date NOT NULL,
  `tgl_pengiriman` date NOT NULL,
  `id_pegawai` char(3) NOT NULL,
  `status` enum('0','1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salinan_po`
--

INSERT INTO `salinan_po` (`no_po`, `nm_customer`, `tgl_po`, `tgl_pengiriman`, `id_pegawai`, `status`) VALUES
('18090101', 'wee', '2018-09-01', '2018-09-02', 'p02', '3'),
('18090102', 'ss', '2018-09-01', '2018-09-15', 'p02', '3'),
('18090103', 'aa', '2018-09-01', '2018-09-20', 'p02', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `detil_po`
--
ALTER TABLE `detil_po`
  ADD KEY `no_po` (`no_po`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `do`
--
ALTER TABLE `do`
  ADD PRIMARY KEY (`no_do`),
  ADD KEY `no_po` (`no_po`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `salinan_po`
--
ALTER TABLE `salinan_po`
  ADD PRIMARY KEY (`no_po`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_po`
--
ALTER TABLE `detil_po`
  ADD CONSTRAINT `detil_po_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detil_po_ibfk_3` FOREIGN KEY (`no_po`) REFERENCES `salinan_po` (`no_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `do`
--
ALTER TABLE `do`
  ADD CONSTRAINT `do_ibfk_1` FOREIGN KEY (`no_po`) REFERENCES `salinan_po` (`no_po`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salinan_po`
--
ALTER TABLE `salinan_po`
  ADD CONSTRAINT `salinan_po_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
