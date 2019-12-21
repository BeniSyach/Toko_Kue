-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2019 at 04:00 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `username` varchar(32) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `message` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(64) DEFAULT NULL,
  `harga` varchar(9) DEFAULT NULL,
  `gambar` varchar(64) DEFAULT NULL,
  `deskripsi` varchar(100) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_produk`, `nama`, `harga`, `gambar`, `deskripsi`, `id_kategori`) VALUES
(12, 'kue kering coklat', '1200000', 'kue ultah 3.jpg', 'enak', 2),
(13, 'kue basah coklat', '150000', 'kue ultah 1.jpg', 'enak', 3),
(14, 'kue ultah coklat', '150000', 'kue ultah 5.jpg', 'enak', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(30) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `tarif` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'medan', '30000'),
(2, 'medan', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `email_pelanggan` varchar(30) NOT NULL,
  `password_pelanggan` varchar(30) NOT NULL,
  `telphone_pelanggan` varchar(30) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `alamat_pelanggan` varchar(30) NOT NULL,
  `id_pelanggan` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`email_pelanggan`, `password_pelanggan`, `telphone_pelanggan`, `nama_pelanggan`, `nama_kota`, `alamat_pelanggan`, `id_pelanggan`) VALUES
('benisyach32@gmail.com', '123456', '082277757717', 'beni', 'medan', 'jl.glang                      ', 1),
('admin@gmail.com', 'admin', '0822222222', 'admin', 'jakarta', 'medan             ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembelian` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 'hujbjk', 'bni', '40000', '2019-12-02', '2019120214121320181014135948tr'),
(4, '', '', '', '2019-12-11', '20191211174153'),
(9, '', '', '', '2019-12-12', '20191212035251');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `tanggal_pembelian` varchar(30) NOT NULL,
  `total_pembelian` varchar(30) NOT NULL,
  `id_pembelian` int(30) NOT NULL,
  `id_pelanggan` varchar(30) NOT NULL,
  `id_ongkir` varchar(30) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `tarif` varchar(30) NOT NULL,
  `alamat_pengiriman` varchar(30) NOT NULL,
  `status_pembelian` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`tanggal_pembelian`, `total_pembelian`, `id_pembelian`, `id_pelanggan`, `id_ongkir`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`) VALUES
('2019-12-02', '30100', 1, '', 'gojek', 'medan', '30000', 'jl.galang', ''),
('2019-12-11', '180000', 2, '4', '1', 'medan', '30000', 'medan', ''),
('2019-12-11', '180000', 3, '4', '1', 'medan', '30000', 'medan', ''),
('2019-12-11', '180000', 4, '1', '1', 'medan', '30000', 'medan', 'sudah kirim pembayaran'),
('2019-12-11', '165000', 5, '1', '2', 'medan', '15000', 'medan', ''),
('2019-12-11', '180000', 6, '1', '1', 'medan', '30000', 'medan', ''),
('2019-12-11', '480000', 7, '1', '1', 'medan', '30000', 'jakarta', ''),
('2019-12-12', '180000', 8, '1', '1', 'medan', '30000', 'mwedan', ''),
('2019-12-12', '180000', 9, '1', '1', 'medan', '30000', 'medan', 'sudah kirim pembayaran');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian` int(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `total_harga` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian`, `nama`, `harga`, `jumlah`, `id_produk`, `total_harga`) VALUES
(1, 'bolu roti', '100.000', '1', '', ''),
(2, 'kue ultah coklat', '150000', '1', '14', ''),
(3, 'kue ultah coklat', '150000', '1', '14', ''),
(4, 'kue ultah coklat', '150000', '1', '14', ''),
(5, 'kue ultah coklat', '150000', '1', '14', ''),
(6, 'kue ultah coklat', '150000', '1', '14', ''),
(7, 'kue ultah coklat', '150000', '3', '14', ''),
(8, 'kue ultah coklat', '150000', '1', '14', ''),
(9, 'kue ultah coklat', '150000', '1', '14', '180000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembelian` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
