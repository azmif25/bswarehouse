-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2020 at 04:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bswarehouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'numbb', 'numbb', 'Fadillah');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'NIKE'),
(2, 'CONVERSE'),
(3, 'ADIDAS'),
(4, 'VANS'),
(5, 'FILA'),
(6, 'VENTELA'),
(7, 'COMPASS');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Banjarbaru', 12000),
(2, 'Kapuas', 750000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`, `alamat_pelanggan`) VALUES
(1, 'zimi9000@gmail.com', 'zimi9000', 'Azmi Fadillah bin M', '081251023805', ''),
(2, 'ayam@gmail.com', 'ayam', 'ayam', '900098882', ''),
(3, 'sukeman@gmail.com', 'sukeman', 'Swaee Lee', '089972318221', 'Jalan Jalan Ke Desa');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 4, 'AZMI FADILLAH', 'BRI', 726999, '2020-07-19', '2020071907120310-43-26-images.jpg'),
(2, 12, 'AZMI FADILLAH', 'BRI', 800750000, '2020-07-19', '20200719153826speed2 2011-08-29 03-41-37-25.jpg'),
(3, 7, 'AZMI FADILLAH', 'BRI', 2, '2020-07-23', '2020072310093910-15-12-87386.png'),
(4, 17, 'bambang', 'bni', 10000, '2020-07-24', '20200724121400am95-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat_pengiriman` text NOT NULL,
  `status_pembelian` varchar(50) NOT NULL DEFAULT 'Pending',
  `no_resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_ongkir`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat_pengiriman`, `status_pembelian`, `no_resi`) VALUES
(1, 1, 1, '2020-07-01', 35000000, '', 0, '', 'Pending', ''),
(4, 1, 2, '2020-07-18', 726999, '', 0, '', 'Barang telah Dikirim', 'JN3219932241'),
(5, 1, 2, '2020-07-18', 726999, '', 0, '', 'Pending', ''),
(6, 1, 2, '2020-07-18', 726999, '', 0, '', 'Pending', ''),
(7, 1, 1, '2020-07-18', 56012000, 'Banjarbaru', 12000, 'Jalan Kuin Utara Kode POS : 70127', 'Konfirmasi Pembayaran', ''),
(8, 1, 1, '2020-07-18', 56012000, 'Banjarbaru', 12000, 'Jalan Kuin Utara Kode POS : 70127', 'Pending', ''),
(9, 2, 1, '2020-07-18', 221750000, 'Kapuas', 750000, 'Lop', 'Pending', ''),
(10, 2, 1, '2020-07-18', 414750000, 'Kapuas', 750000, '43341', 'Pending', ''),
(11, 2, 1, '2020-07-19', 14750000, 'Kapuas', 750000, '112q', 'Pending', ''),
(12, 2, 2, '2020-07-19', 800750000, 'Kapuas', 750000, '22213', 'Konfirmasi Pembayaran', ''),
(13, 1, 2, '2020-07-19', 600012000, 'Banjarbaru', 12000, '131asewqqwe', 'Pending', ''),
(14, 1, 1, '2020-07-21', 238757000, 'Banjarbaru', 12000, 'ty', 'Pending', ''),
(15, 1, 1, '2020-07-23', 21012000, 'Banjarbaru', 12000, 'zxzx', 'Pending', ''),
(16, 1, 1, '2020-07-24', 15011999, 'Banjarbaru', 12000, 'jalan', 'Pending', ''),
(17, 2, 1, '2020-07-24', 751000, 'Kapuas', 750000, 'seroja', 'Konfirmasi Pembayaran', ''),
(18, 2, 1, '2020-07-25', 4495000, 'Kapuas', 750000, '', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 2, 2, '', 0, 0, 0, 0),
(2, 5, 2, 1, '', 0, 0, 0, 0),
(3, 6, 2, 1, '', 0, 0, 0, 0),
(4, 8, 3, 1, 'AIR JORDAN 1 RED CHICAGO', 14000000, 800, 800, 14000000),
(5, 8, 5, 2, 'AIR JORDAN 1 X TRAVIS SCOTT', 21000000, 800, 1600, 42000000),
(6, 9, 5, 1, 'AIR JORDAN 1 X TRAVIS SCOTT', 21000000, 800, 800, 21000000),
(7, 9, 6, 1, 'AIR JORDAN 1 X DIOR', 200000000, 800, 800, 200000000),
(8, 10, 3, 1, 'AIR JORDAN 1 RED CHICAGO', 14000000, 800, 800, 14000000),
(9, 10, 6, 2, 'AIR JORDAN 1 X DIOR', 200000000, 800, 1600, 400000000),
(10, 11, 3, 1, 'AIR JORDAN 1 RED CHICAGO', 14000000, 800, 800, 14000000),
(11, 12, 6, 4, 'AIR JORDAN 1 X DIOR', 200000000, 800, 3200, 800000000),
(12, 13, 6, 3, 'AIR JORDAN 1 X DIOR', 200000000, 800, 2400, 600000000),
(13, 14, 3, 1, 'AIR JORDAN 1 RED CHICAGO', 14000000, 800, 800, 14000000),
(14, 14, 5, 1, 'AIR JORDAN 1 X TRAVIS SCOTT', 21000000, 800, 800, 21000000),
(15, 14, 6, 1, 'AIR JORDAN 1 X DIOR', 200000000, 800, 800, 200000000),
(16, 14, 10, 1, 'CHUCK TAYLOR ALL STAR X FEAR OF GOD BLACK', 3745000, 740, 740, 3745000),
(17, 15, 5, 1, 'AIR JORDAN 1 X TRAVIS SCOTT', 21000000, 800, 800, 21000000),
(18, 16, 33, 1, 'sepatu', 999999, 800, 800, 999999),
(19, 16, 3, 1, 'AIR JORDAN 1 RED CHICAGO', 14000000, 800, 800, 14000000),
(20, 17, 32, 1, 'nomonomo', 1000, 23232, 23232, 1000),
(21, 18, 10, 1, 'CHUCK TAYLOR ALL STAR X FEAR OF GOD BLACK', 3745000, 740, 740, 3745000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL,
  `colorway` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`, `colorway`) VALUES
(3, 1, 'AIR JORDAN 1 RED CHICAGO', 14000000, 800, 'Air-Jordan-1-Retro-Chicago-2015-Product.jpg', 'CHIGAGO ERA', 3, 'BLACK RED'),
(5, 1, 'AIR JORDAN 1 X TRAVIS SCOTT', 21000000, 800, 'img01.jpg', 'TRAVIS SCOTT MAKE SWOOSH FORWARD', 3, ''),
(6, 1, 'AIR JORDAN 1 X DIOR', 200000000, 800, 'Air-Jordan-1-Retro-High-Dior.jpg', 'AWESOME DIOR MAKE THIS SHOE HYPE', 1, ''),
(10, 2, 'CHUCK TAYLOR ALL STAR X FEAR OF GOD BLACK', 3745000, 740, 'Converse-Chuck-Taylor-All-Star-70s-Hi-Fear-of-God-Black-Product.jpg', 'FOG X CONVERSE', 8, ''),
(11, 3, 'YEEZY 700 WAVE', 8480000, 690, 'Adidas-Yeezy-Wave-Runner-700-Solid-Grey-Product.jpg', 'Kanye make this with love', 4, ''),
(12, 1, 'SB DUNK X TRAVIS SCOTT', 18700000, 830, 'Nike-SB-Dunk-Low-Travis-Scott-Product.jpg', 'Best sneakers ever see', 11, ''),
(22, 4, 'VANS', 1000, 800, 'fog1.jpg', 'lklklkl', 12, ''),
(33, 1, 'sepatu', 999999, 800, 'am95-3.jpg', 'ini sepatu', 9, '');

-- --------------------------------------------------------

--
-- Table structure for table `produk_foto`
--

CREATE TABLE `produk_foto` (
  `id_produk_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_produk_foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk_foto`
--

INSERT INTO `produk_foto` (`id_produk_foto`, `id_produk`, `nama_produk_foto`) VALUES
(1, 12, 'Nike-SB-Dunk-Low-Travis-Scott-Product.jpg'),
(3, 13, '1.jpg'),
(8, 14, '1.jpg'),
(18, 14, '10-42-55-images.jpg'),
(19, 14, 'E020318079.jpg'),
(28, 20, 'speed2 2011-08-29 03-40-23-50.jpg'),
(29, 20, 'speed2 2011-08-29 03-41-37-25.jpg'),
(31, 22, 'fog1.jpg'),
(32, 22, 'fog3.jpg'),
(33, 23, 'ip2.jpg'),
(34, 23, 'ip3.jpg'),
(35, 24, 'am95-1.jpg'),
(36, 24, 'bt2.jpg'),
(37, 25, 'af1.jpg'),
(38, 25, 'af2.jpg'),
(39, 26, 'fog02.jpg'),
(40, 26, 'jl22.jpg'),
(41, 27, 'vt.jpg'),
(42, 27, 'ip3.jpg'),
(43, 28, 'jl22.jpg'),
(44, 28, 'vt1.jpg'),
(45, 29, 'fd20.jpg'),
(46, 29, 'bt2.jpg'),
(47, 29, 'af2.jpg'),
(48, 30, 'bt2.jpg'),
(49, 30, 'bt1.jpg'),
(50, 31, 'sk3.jpg'),
(51, 32, 'osk3.jpg'),
(52, 32, 'osk1.jpg'),
(53, 33, 'am95-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id_size`, `id_produk`, `size`, `stok`) VALUES
(2, 11, 41, 12),
(3, 11, 42, 11),
(4, 11, 43, 13),
(5, 11, 38, 2),
(6, 11, 39, 4),
(7, 23, 1, 0),
(8, 23, 2, 0),
(9, 23, 3, 0),
(10, 24, 42, 0),
(11, 24, 41, 0),
(12, 0, 0, 0),
(13, 0, 0, 0),
(14, 25, 41, 0),
(15, 25, 42, 0),
(16, 26, 41, 0),
(17, 26, 42, 0),
(22, 29, 41, 0),
(23, 29, 42, 0),
(24, 30, 31, 0),
(25, 30, 322, 0),
(26, 31, 41, 0),
(27, 31, 442, 0),
(28, 32, 44, 0),
(29, 32, 43, 0),
(30, 33, 41, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

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
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `produk_foto`
--
ALTER TABLE `produk_foto`
  ADD PRIMARY KEY (`id_produk_foto`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `produk_foto`
--
ALTER TABLE `produk_foto`
  MODIFY `id_produk_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
