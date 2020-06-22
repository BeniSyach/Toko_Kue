-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2020 at 04:17 AM
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
  `id_kategori` int(11) DEFAULT NULL,
  `stok_barang` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_produk`, `nama`, `harga`, `gambar`, `deskripsi`, `id_kategori`, `stok_barang`) VALUES
(16, 'kue ultah', '100000', 'kue ultah 4.jpg', 'Kue tart berbentuk hati dengan full cream', 1, '3'),
(17, 'kue black nastar', '100000', 'kue kering.jpg', '			 kue kering coklat	 yang dilapisi ditengahnya dengan selai nanas 	', 2, '5'),
(18, 'kue sus kering keju', '100000', 'kue kering 2.jpeg', '			 kue kering dengan full cream susu ditengahnya 		', 2, '5'),
(19, 'kue kering kelapa mentega', '100000', 'kue kering 3.jpg', '			 kue di dalam nya diisi dengan gula merah dan diatasnya ditaburi kelapa		', 2, '4'),
(20, 'kue ultah', '120000', 'kue ultah 2.jpg', 'kue tart dengan full cream', 1, '3'),
(21, 'kue ultah', '120000', 'kue ultah 5.jpg', 'kue tart ukuran 16 cm dilapisi selai blubery di tengahnya', 1, '4'),
(22, 'Kue putri ayu', '50000', 'kue basah.jpg', '			 kue rasa pandan yang di atasnya ditaburi dengan kelapa parut		', 3, '50'),
(23, 'kue darling', '50000', 'Kue-Basah1.jpg', 'kue pandan yang ditengahnya dilapisi dengan kelapa parut gula merah', 3, '50'),
(24, 'kue pukis', '20000', '-Kue-Pukis.jpg', 'kue pukis dengan rasa coklat', 3, '5');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(30) NOT NULL,
  `nama_kota` varchar(30) NOT NULL,
  `tarif` varchar(30) NOT NULL,
  `nm_pengirim` varchar(30) NOT NULL,
  `provinsi` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`, `nm_pengirim`, `provinsi`, `kecamatan`) VALUES
(1, 'medan', '30000', 'JNE', 'sumatera utara', 'medan area'),
(2, 'medan', '15000', 'TIKI', 'sumatera utara', 'deli serdang'),
(4, 'padang', '200000', 'pos', 'sumatera barat', 'gak tau');

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
  `id_pelanggan` int(30) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`email_pelanggan`, `password_pelanggan`, `telphone_pelanggan`, `nama_pelanggan`, `nama_kota`, `alamat_pelanggan`, `id_pelanggan`, `level`) VALUES
('benisyach32@gmail.com', '123456', '082277757717', 'beni', 'medan', 'Jln.Galang No.66 Lubuk Pakam  ', 1, 'costumer'),
('admin@gmail.com', 'admin', '081361357333', 'admin', 'medan', 'medan', 2, 'admin');

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
(15, '', '', '', '2020-01-07', '20200107054732'),
(16, '', '', '', '2020-01-07', '20200107055142'),
(20, '', '', '', '2020-01-14', '20200114051638');

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
  `status_pembelian` varchar(30) NOT NULL,
  `nama_pembeli` varchar(30) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `email_pembeli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`tanggal_pembelian`, `total_pembelian`, `id_pembelian`, `id_pelanggan`, `id_ongkir`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `nama_pembeli`, `no_telp`, `email_pembeli`) VALUES
('2020-01-07', '330000', 16, '1', '1', 'medan', '30000', '', 'sudah kirim pembayaran', '', '', ''),
('2020-01-08', '150000', 17, '1', '', '', '', '', '', '', '', ''),
('2020-01-08', '150000', 18, '1', '', '', '', 'medan', '', '', '', ''),
('2020-01-08', '165000', 19, '1', '2', 'medan', '15000', 'medan', '', '', '', ''),
('2020-01-14', '135000', 20, '1', '2', 'medan', '15000', 'gugugtuy', 'sudah kirim pembayaran', 'a', '123', 'jjj'),
('2020-01-15', '100000', 21, '1', '', '', '', 'defefe', 'Belum Bayar', 'a', '123', 'jjj'),
('2020-01-15', '125000', 22, '1', '', '2', '25000', 'sdkncsdknvskd', 'Belum Bayar', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `jumlah` varchar(30) NOT NULL,
  `id_produk` varchar(30) NOT NULL,
  `total_harga` varchar(30) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian`, `nama`, `harga`, `jumlah`, `id_produk`, `total_harga`, `id`) VALUES
('15', 'kue ultah coklat', '150000', '1', '14', '180000', 15),
('16', 'kue ultah coklat', '150000', '2', '14', '330000', 16),
('17', 'kue ultah coklat', '150000', '1', '14', '150000', 17),
('18', 'kue ultah coklat', '150000', '1', '14', '150000', 18),
('19', 'kue ultah coklat', '150000', '1', '14', '165000', 19),
('20', 'kue ultah coklat', '150000', '1', '14', '165000', 20),
('20', 'kue ultah', '120000', '1', '20', '135000', 21),
('21', 'kue ultah', '100000', '1', '16', '100000', 22),
('22', 'kue ultah', '100000', '1', '16', '125000', 23);

-- --------------------------------------------------------

--
-- Table structure for table `peng_kota`
--

CREATE TABLE `peng_kota` (
  `kota_id` int(11) NOT NULL,
  `kota_nama` varchar(255) NOT NULL,
  `prov_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peng_kota`
--

INSERT INTO `peng_kota` (`kota_id`, `kota_nama`, `prov_id_fk`) VALUES
(1, 'Banda Aceh', 1),
(2, 'Medan', 2),
(3, 'Makasar', 4),
(4, 'Jakarta', 3),
(5, 'Banjarmasin', 5),
(6, 'Merauke', 6);

-- --------------------------------------------------------

--
-- Table structure for table `peng_kurir`
--

CREATE TABLE `peng_kurir` (
  `kurir_id` int(11) NOT NULL,
  `kurir_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peng_kurir`
--

INSERT INTO `peng_kurir` (`kurir_id`, `kurir_nama`) VALUES
(1, 'JNE'),
(2, 'TIKI'),
(3, 'POS Indonesia');

-- --------------------------------------------------------

--
-- Table structure for table `peng_provinsi`
--

CREATE TABLE `peng_provinsi` (
  `prov_id` int(11) NOT NULL,
  `prov_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peng_provinsi`
--

INSERT INTO `peng_provinsi` (`prov_id`, `prov_nama`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'DKI Jakarta'),
(4, 'Sulawesi Selatan'),
(5, 'Kalimantan Selatan'),
(6, 'Papua');

-- --------------------------------------------------------

--
-- Table structure for table `peng_tarif`
--

CREATE TABLE `peng_tarif` (
  `tarif_id` int(11) NOT NULL,
  `tarif` int(10) NOT NULL,
  `kurir_id_fk` int(11) NOT NULL,
  `kota_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peng_tarif`
--

INSERT INTO `peng_tarif` (`tarif_id`, `tarif`, `kurir_id_fk`, `kota_id_fk`) VALUES
(1, 20000, 2, 1),
(2, 30000, 2, 4),
(3, 35000, 3, 3),
(6, 28000, 1, 5),
(7, 33000, 2, 6),
(8, 25000, 2, 2);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peng_kota`
--
ALTER TABLE `peng_kota`
  ADD PRIMARY KEY (`kota_id`),
  ADD KEY `prov_id_fk` (`prov_id_fk`);

--
-- Indexes for table `peng_kurir`
--
ALTER TABLE `peng_kurir`
  ADD PRIMARY KEY (`kurir_id`);

--
-- Indexes for table `peng_provinsi`
--
ALTER TABLE `peng_provinsi`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indexes for table `peng_tarif`
--
ALTER TABLE `peng_tarif`
  ADD PRIMARY KEY (`tarif_id`),
  ADD KEY `kota_id_fk` (`kota_id_fk`),
  ADD KEY `kurir_id_fk` (`kurir_id_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembelian` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `peng_kota`
--
ALTER TABLE `peng_kota`
  MODIFY `kota_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peng_kurir`
--
ALTER TABLE `peng_kurir`
  MODIFY `kurir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peng_provinsi`
--
ALTER TABLE `peng_provinsi`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peng_tarif`
--
ALTER TABLE `peng_tarif`
  MODIFY `tarif_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peng_kota`
--
ALTER TABLE `peng_kota`
  ADD CONSTRAINT `peng_kota_ibfk_1` FOREIGN KEY (`prov_id_fk`) REFERENCES `peng_provinsi` (`prov_id`);

--
-- Constraints for table `peng_tarif`
--
ALTER TABLE `peng_tarif`
  ADD CONSTRAINT `peng_tarif_ibfk_1` FOREIGN KEY (`kota_id_fk`) REFERENCES `peng_kota` (`kota_id`),
  ADD CONSTRAINT `peng_tarif_ibfk_2` FOREIGN KEY (`kurir_id_fk`) REFERENCES `peng_kurir` (`kurir_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
