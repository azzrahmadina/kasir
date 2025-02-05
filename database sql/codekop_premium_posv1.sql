-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2022 at 07:35 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codekop_premium_posv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `merk` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `satuan_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `tgl_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `id_barang`, `id_kategori`, `gambar`, `nama_barang`, `merk`, `harga_beli`, `harga_jual`, `satuan_barang`, `stok`, `tgl_input`, `tgl_update`) VALUES
(1, 'BR001', 1, '1632023904.png', 'Printer HP DJ2600', 'hp', 350000, 450000, 'PCS', 11, '2021-09-19', '2021-11-27'),
(2, 'BR002', 1, '1632024281.jpeg', 'Monitor HP 17 inchi', 'hp', 350000, 550000, 'PCS', 17, '2021-09-19', '2021-09-19'),
(3, 'BR003', 1, NULL, 'Pensil', 'Fabel Castel', 1500, 2000, 'PCS', 18, '2021-09-25', '2021-10-31'),
(4, '1640861768', 1, NULL, 'Indomie Goreng', 'Indomie', 2000, 3000, 'PCS', 28, '2021-12-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barang_kategori`
--

CREATE TABLE `barang_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_kategori`
--

INSERT INTO `barang_kategori` (`id`, `nama_kategori`, `tgl_input`) VALUES
(1, 'Uncategory', '2021-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `barang_satuan`
--

CREATE TABLE `barang_satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_satuan`
--

INSERT INTO `barang_satuan` (`id`, `satuan`) VALUES
(1, 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id` int(11) NOT NULL,
  `hak_akses` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id`, `hak_akses`) VALUES
(1, 'Admin'),
(5, 'Kasir'),
(6, 'Gudang');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `diskon` int(11) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `beli` int(11) NOT NULL,
  `jual` int(11) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_beli`
--

CREATE TABLE `keranjang_beli` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_member` int(11) NOT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) NOT NULL,
  `beli` int(11) NOT NULL,
  `jual` int(11) NOT NULL,
  `tanggal_input` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang_beli`
--

INSERT INTO `keranjang_beli` (`id`, `id_barang`, `id_member`, `nama_barang`, `jumlah`, `beli`, `jual`, `tanggal_input`) VALUES
(91, '4', 11, 'Indomie Goreng', '1', 2000, 3000, '2022-02-13');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode_pelanggan` varchar(255) DEFAULT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `alamat_pelanggan` text DEFAULT NULL,
  `telepon_pelanggan` varchar(25) DEFAULT NULL,
  `email_pelanggan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `telepon_pelanggan`, `email_pelanggan`, `created_at`, `deleted_at`) VALUES
(1, 'PL001', 'Fauzan Falah', 'Ujung Harapan Kav. Daruttaqwa', '089618173609', 'fauzancodekop@gmail.com', '2022-03-03 05:55:44', NULL),
(2, 'PL002', 'Muhammad Faiz', 'Bekasi', '081298669897', 'anangcodekop@gmail.com', '2022-03-03 06:19:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nm_supplier` varchar(255) DEFAULT NULL,
  `no_trx` varchar(255) DEFAULT NULL,
  `id_member` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `beli` int(11) DEFAULT NULL,
  `tanggal_input` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `nm_supplier`, `no_trx`, `id_member`, `jumlah`, `beli`, `tanggal_input`, `created_at`, `periode`) VALUES
(8, 'Others', 'OR001', 1, 15, 1765000, '2021-11-27', '2021-11-27 14:47:04', '2021-11'),
(9, 'Others', 'OR009', 11, 2, 700000, '2021-11-27', '2021-11-27 15:23:17', '2021-11'),
(10, 'Others', 'OR0010', 1, 4, 8000, '2022-01-20', '2022-01-20 12:47:06', '2022-01'),
(11, 'Others', 'OR0011', 1, 6, 10500, '2022-01-24', '2022-01-24 10:10:51', '2022-01');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_detail`
--

CREATE TABLE `pembelian_detail` (
  `id` int(11) NOT NULL,
  `no_trx` varchar(255) DEFAULT NULL,
  `id_barang` int(11) NOT NULL,
  `idb` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `beli` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `id_member` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_detail`
--

INSERT INTO `pembelian_detail` (`id`, `no_trx`, `id_barang`, `idb`, `nama_barang`, `beli`, `qty`, `total`, `tgl_input`, `periode`, `id_member`, `created_at`) VALUES
(7, 'OR001', 3, 'BR003', 'Pensil', 1500, 10, 15000, '2021-11-27', '2021-11', 1, '2021-11-27 14:47:04'),
(8, 'OR001', 2, 'BR002', 'Monitor HP 17 inchi', 350000, 5, 1750000, '2021-11-27', '2021-11', 1, '2021-11-27 14:47:04'),
(9, 'OR009', 2, 'BR002', 'Monitor HP 17 inchi', 350000, 2, 700000, '2021-11-27', '2021-11', 11, '2021-11-27 15:23:17'),
(10, 'OR0010', 4, '1640861768', 'Indomie Goreng', 2000, 4, 8000, '2022-01-20', '2022-01', 1, '2022-01-20 12:47:06'),
(11, 'OR0011', 4, '1640861768', 'Indomie Goreng', 2000, 3, 6000, '2022-01-24', '2022-01', 1, '2022-01-24 10:10:51'),
(12, 'OR0011', 3, 'BR003', 'Pensil', 1500, 3, 4500, '2022-01-24', '2022-01', 1, '2022-01-24 10:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `no_trx` varchar(255) DEFAULT NULL,
  `id_member` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `beli` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `tanggal_input` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id`, `no_trx`, `id_member`, `id_pelanggan`, `jumlah`, `beli`, `total`, `bayar`, `tanggal_input`, `created_at`, `periode`) VALUES
(13, 'TR001', 1, 0, 5, 704500, 1106000, 1110000, '2021-11-27', '2021-11-27 14:40:17', '2021-11'),
(14, 'TR0014', 1, 0, 6, 10500, 15000, 15000, '2022-01-24', '2022-01-24 10:11:33', '2022-01'),
(15, 'TR0015', 1, 0, 2, 4000, 6000, 6000, '2022-01-31', '2022-01-31 06:10:01', '2022-01'),
(17, 'TR0016', 1, 1, 2, 3500, 5000, 5000, '2022-03-03', '2022-03-03 06:28:10', '2022-03'),
(18, 'TR0018', 1, 0, 1, 350000, 550000, 550000, '2022-03-03', '2022-03-03 06:28:29', '2022-03');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_detail`
--

CREATE TABLE `penjualan_detail` (
  `id` int(11) NOT NULL,
  `no_trx` varchar(255) DEFAULT NULL,
  `id_barang` int(11) NOT NULL,
  `idb` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `beli` int(11) NOT NULL,
  `jual` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_input` date DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `id_member` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan_detail`
--

INSERT INTO `penjualan_detail` (`id`, `no_trx`, `id_barang`, `idb`, `nama_barang`, `beli`, `jual`, `qty`, `diskon`, `total`, `tgl_input`, `periode`, `id_member`, `created_at`) VALUES
(11, 'TR001', 3, 'BR003', 'Pensil', 1500, 2000, 3, 0, 6000, '2021-11-27', '2021-11', 1, '2021-11-27 14:40:17'),
(12, 'TR001', 2, 'BR002', 'Monitor HP 17 inchi', 350000, 550000, 2, 0, 1100000, '2021-11-27', '2021-11', 1, '2021-11-27 14:40:17'),
(13, 'TR0014', 4, '1640861768', 'Indomie Goreng', 2000, 3000, 3, 0, 9000, '2022-01-24', '2022-01', 1, '2022-01-24 10:11:33'),
(14, 'TR0014', 3, 'BR003', 'Pensil', 1500, 2000, 3, 0, 6000, '2022-01-24', '2022-01', 1, '2022-01-24 10:11:33'),
(15, 'TR0015', 4, '1640861768', 'Indomie Goreng', 2000, 3000, 2, 0, 6000, '2022-01-31', '2022-01', 1, '2022-01-31 06:10:01'),
(21, 'TR0016', 4, '1640861768', 'Indomie Goreng', 2000, 3000, 1, 0, 3000, '2022-03-03', '2022-03', 1, '2022-03-03 06:28:10'),
(22, 'TR0016', 3, 'BR003', 'Pensil', 1500, 2000, 1, 0, 2000, '2022-03-03', '2022-03', 1, '2022-03-03 06:28:10'),
(23, 'TR0018', 2, 'BR002', 'Monitor HP 17 inchi', 350000, 550000, 1, 0, 550000, '2022-03-03', '2022-03', 1, '2022-03-03 06:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `alamat_supplier` varchar(255) DEFAULT NULL,
  `telepon_supplier` varchar(25) DEFAULT NULL,
  `email_supplier` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama_supplier`, `alamat_supplier`, `telepon_supplier`, `email_supplier`, `created_at`) VALUES
(1, 'Others', '-', '-', '-', '2021-10-20 05:56:37');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id` int(11) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `alamat_toko` text NOT NULL,
  `tlp` varchar(255) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id`, `nama_toko`, `alamat_toko`, `tlp`, `nama_pemilik`, `logo`) VALUES
(1, 'FOTOCOPY', 'Ujung Harapan RT 05/14 No.102 Bahagia Bekasi', '089618173609', 'Fauzan', '1631053566.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `akses` varchar(11) DEFAULT NULL,
  `active` varchar(11) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `telepon`, `alamat`, `avatar`, `user`, `pass`, `akses`, `active`, `created_at`) VALUES
(1, 'administrator', '', '', '', 'avatar.jpg', 'adminkasir', '$2y$10$NEQgz9qCfOV70HiRWDYfXefswE7rU6/912FHqNUNVYRHYA8w6V8PO', '1', '1', '2022-02-14 09:30:20'),
(3, 'Fauzan Falah', 'fauzancodekop@gmail.com', '089618173609', 'Ujung Harapan Kav. Daruttaqwa RT 005/014 No. 102 Kel. Bahagia, Kec. Babelan, Kab. Bekasi', '1632023588.jpg', 'fauzan', '$2y$10$.kuMSR7yKV7cY1XWb.at/eh4lCFOlHKCQtJAPutdGsuhWpon8RFFq', '5', '1', '2021-11-27 22:22:34'),
(11, 'Anang', '', '', '', 'avatar.jpg', 'anang', '$2y$10$MP6dj1.jXCRRV5c8CLusAumbX9wO9bSztVh.ifBtPH/opcIl894jm', '6', '1', '2021-11-27 22:22:44'),
(12, 'Giyas', NULL, NULL, NULL, 'avatar.jpg', 'giyas', '$2y$10$KM/2HkQh7WNF1hhbihenpe9a42hBFIttXhI9FZDcwFYXrK7gw45T6', '6', '1', '2022-02-13 16:32:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_satuan`
--
ALTER TABLE `barang_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang_beli`
--
ALTER TABLE `keranjang_beli`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `barang_satuan`
--
ALTER TABLE `barang_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `keranjang_beli`
--
ALTER TABLE `keranjang_beli`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembelian_detail`
--
ALTER TABLE `pembelian_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penjualan_detail`
--
ALTER TABLE `penjualan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
