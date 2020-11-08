-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2020 at 09:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tirtamanik_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(3) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `judul_gambar` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(30) DEFAULT NULL,
  `rekening_pelanggan` varchar(30) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(3) DEFAULT NULL,
  `tanggal_bayar` varchar(20) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(17, 11, 'Eza Ananda P', 'admin@gmail.com', '6283892514825', 'Jl. H. Mali Rt 10/01 No. 12 Kel. Duri Kosambi Kec. Cengkareng Jakarta Barat', '2QXMAJ', '2020-08-11 00:00:00', 800000, 'Konfirmasi', 800000, '1213769869', 'Qika Dhania', '2_kategori_pelanggan.png', 5, '11-08-2020', 'BANK BCA', '2020-08-11 12:07:01', '2020-08-11 10:07:01'),
(42, 11, 'Eza Ananda P', 'admin@gmail.com', '6283892514825', 'Jl. H. Mali Rt 10/01 No. 12 Kel. Duri Kosambi Kec. Cengkareng Jakarta Barat', 'TXIDQU', '2020-08-12 00:00:00', 400000, 'Konfirmasi', 400000, '56456345355', 'Eza Ananda Putra', 'bukti_transfer_1496258168_34e5d4c410.jpg', 2, '13-08-2020', 'BANK BCA', '2020-08-12 23:58:15', '2020-08-12 21:58:15'),
(44, 11, 'Eza Ananda P', 'admin@gmail.com', '6283892514825', 'Jl. H. Mali Rt 10/01 No. 12 Kel. Duri Kosambi Kec. Cengkareng Jakarta Barat', 'HBJ7K1', '2020-08-13 00:00:00', 200000, 'Menunggu Konfirmasi', 200000, '6543536543', 'Eza Ananda Putra', 'bukti_transfer_1496258168_34e5d4c48.jpg', 3, '20-08-2020', 'BANK MANDIRI', '2020-08-13 00:15:21', '2020-08-12 22:15:21'),
(50, 11, 'Eza Ananda P', 'admin@gmail.com', '6283892514825', 'Jl. H. Mali Rt 10/01 No. 12 Kel. Duri Kosambi Kec. Cengkareng Jakarta Barat', 'YFGAEJ', '2020-08-20 00:00:00', 185000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-08-20 15:09:13', '2020-08-20 13:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `urutan` int(3) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `gambar`, `tanggal_update`) VALUES
(9, 'atasan', 'Atasan', 3, 'atasan.png', '2020-07-10 02:29:37'),
(10, 'tunik', 'Tunik', 2, 'tunik.png', '2020-07-09 22:15:00'),
(11, 'gamis', 'Gamis', 1, 'gamis.png', '2020-07-10 02:29:20');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 4, 'Tirta Manik', 'Batik and Muslim Fashion', 'tirtamanik.id@gmail.com', 'http://tirtamanik.id', 'ok', 'ok', '62895627787865', 'Jl. M. H. Mas Mansyur, Thamrin City, 2nd Floor, Block E31 No. 3 Tanah Abang, Jakarta Pusat. 10240', 'https://www.facebook.com/Tirta-manik-1040926910249', 'https://instagram.com/tirtamanik.id', 'ok', 'pngnih2.png', 'iconnih.png', '2020-08-07 13:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(11, 'Pending', 'Eza Ananda P', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '62838925148251', 'Jl. H. Mali Rt 10/01 No. 12 Kel. Duri Kosambi Kec. Cengkareng Jakarta Barat', '2020-07-15 13:37:44', '2020-07-15 11:37:44'),
(12, 'Pending', 'Meydina Rahmawati', 'admin2@gmail.com', '315f166c5aca63a157f7d41007675cb44a948b33', '6283892514825', 'Jl. Anggrek Cakra RT 04 / RW 06 Sukabumi Utara Kebon Jeruk Jakarta Barat', '2020-08-12 20:37:55', '2020-08-12 18:37:55'),
(13, 'Pending', 'tester  jjjj', 'tester@gmail.com', 'ab4d8d2a5f480a137067da17100271cd176607a1', '6282221628291', 'aaa', '2020-09-09 06:39:34', '2020-09-09 04:39:34'),
(14, 'Pending', 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '6282221628291', '', '2020-09-09 07:13:40', '2020-09-09 05:13:40');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(3) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(23, 4, 11, 'GAM-REN-NA-M', 'Gamis Renda Navy', 'gamis-renda-navy-gam-ren-na-m', '<p>Bahan&nbsp; &nbsp; &nbsp;: Toyobo<br />\r\nUkuran&nbsp; &nbsp; : M ( 96 ) , L ( 100 )<br />\r\nPanjang&nbsp; : 137 - 140 cm</p>\r\n', 'Gamis', 200000, 5, '70.jpg', 'M', 'Publish', '2020-07-10 00:20:42', '2020-07-10 04:49:03'),
(24, 4, 11, 'GAM-REN-LM-S', 'Gamis Renda Lime', 'gamis-renda-lime-gam-ren-lm-s', '<p>Bahan&nbsp; &nbsp; &nbsp;: Toyobo<br />\r\nUkuran&nbsp; &nbsp; : M ( 96 ) , L ( 100 )<br />\r\nPanjang&nbsp; : 137 - 140 cm</p>\r\n', 'Gamis', 200000, 2, '69.jpg', 'S', 'Publish', '2020-07-10 00:23:50', '2020-07-10 12:51:57'),
(25, 4, 11, 'GAM-THA-AR-L', 'Gamis Thalia List Dua Army', 'gamis-thalia-list-dua-army-gam-tha-ar-l', '<p>Bahan&nbsp; &nbsp; : Toyobo<br />\r\nUkuran&nbsp; &nbsp;: M ( 96 ) , L ( 100 ) , XL ( 104 ), XXL ( 108 )<br />\r\nPanjang&nbsp; : 137 - 140 cm</p>\r\n', 'Gamis', 200000, 1, '68.jpg', 'L', 'Publish', '2020-07-10 00:27:10', '2020-07-10 04:49:34'),
(26, 4, 11, 'GAM-THA-GD-S', 'Gamis Thalia List Dua Gold', 'gamis-thalia-list-dua-gold-gam-tha-gd-s', '<p>Bahan&nbsp; &nbsp;: Toyobo<br />\r\nUkuran&nbsp; : M ( 96 ) , L ( 100 ) , XL ( 104 ), XXL ( 108 )<br />\r\nPanjang : 137 - 140 cm</p>\r\n', 'Gamis', 200000, 0, '67.jpg', 'S', 'Publish', '2020-07-10 00:29:45', '2020-07-13 16:40:17'),
(27, 4, 9, 'ATS-FIT-01-XL', 'Atasan Batik Slim Fit 01', 'atasan-batik-slim-fit-01-ats-fit-01-xl', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: S, M, L, XL , XXL&nbsp;</p>\r\n', 'Atasan Wanita', 185000, 0, '66.jpg', 'XL', 'Publish', '2020-07-10 04:42:11', '2020-07-10 04:46:53'),
(28, 4, 9, 'ATS-FIT-02-L', 'Atasan Batik Slim Fit 02', 'atasan-batik-slim-fit-02-ats-fit-02-l', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Atasan Wanita', 185000, 5, '65.jpg', 'L', 'Publish', '2020-07-10 05:33:21', '2020-07-10 04:47:05'),
(29, 4, 9, 'ATS-FIT-03-M', 'Atasan Batik Slim Fit 03', 'atasan-batik-slim-fit-03-ats-fit-03-m', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Atasan Wanita', 185000, 0, '64.jpg', 'M', 'Publish', '2020-07-10 05:35:18', '2020-07-13 17:57:18'),
(30, 4, 9, 'ATS-FIT-01-S', 'Atasan Batik Slim Fit 04', 'atasan-batik-slim-fit-04-ats-fit-01-s', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Atasan Wanita', 185000, 0, '63.jpg', 'S', 'Publish', '2020-07-10 05:36:34', '2020-07-13 16:32:52'),
(31, 4, 10, 'TUN-MBO-01-M', 'Tunik Batik Mbo Jamu 01', 'tunik-batik-mbo-jamu-01-tun-mbo-01-m', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Tunik', 200000, 0, '62.jpg', 'M', 'Publish', '2020-07-10 05:41:31', '2020-07-10 04:48:04'),
(32, 4, 10, 'TUN-MBO-02-S', 'Tunik Batik Mbo Jamu 02', 'tunik-batik-mbo-jamu-02-tun-mbo-02-s', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Tunik', 200000, 0, '61.jpg', 'S', 'Publish', '2020-07-10 05:43:46', '2020-07-10 04:47:57'),
(33, 4, 10, 'TUN-MBO-03-L', 'Tunik Batik Mbo Jamu 03', 'tunik-batik-mbo-jamu-03-tun-mbo-03-l', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Tunik', 200000, 5, '60.jpg', 'L', 'Publish', '2020-07-10 05:44:59', '2020-07-10 04:47:50'),
(34, 4, 10, 'TUN-MBO-04-XL', 'Tunik Batik Mbo Jamu 04', 'tunik-batik-mbo-jamu-04-tun-mbo-04-xl', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Tunik', 200000, 12, '59.jpg', 'XL', 'Publish', '2020-07-10 05:46:43', '2020-07-15 11:38:03'),
(35, 4, 10, 'TUN-MBO-05-M', 'Tunik Batik Mbo Jamu 05', 'tunik-batik-mbo-jamu-05-tun-mbo-05-m', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Tunik', 200000, 7, '58.jpg', 'M', 'Publish', '2020-07-10 05:50:35', '2020-08-06 16:02:30'),
(36, 4, 10, 'TUN-MBO-06-XXL', 'Tunik Batik Mbo Jamu 06', 'tunik-batik-mbo-jamu-06-tun-mbo-06-xxl', '<p>Bahan&nbsp; &nbsp; &nbsp; &nbsp; : Katun Prima<br />\r\nJenis Batik : Cap<br />\r\nUkuran&nbsp; &nbsp; &nbsp; &nbsp;: M, L, XL , XXL</p>\r\n', 'Tunik', 200000, 10, '57.jpg', 'XXL', 'Publish', '2020-07-10 05:53:18', '2020-07-10 13:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_user`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(2, 0, 'BANK BCA', '534324344523', 'Qika Dhania Putri', NULL, '2020-06-27 06:16:52'),
(3, 0, 'BANK MANDIRI', '23243546464', 'Arjun Sumarna', NULL, '2020-06-27 06:17:54'),
(4, 4, 'BANK CNIB', '6546754765476', 'Andre', NULL, '2020-08-06 18:49:13'),
(5, 4, 'BANK KE', '4543456763', 'wert', NULL, '2020-08-06 18:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(26, 11, '2QXMAJ', 35, 200000, 4, 800000, '2020-08-11 00:00:00', '2020-08-11 10:07:02'),
(58, 11, 'TXIDQU', 26, 200000, 1, 200000, '2020-08-12 00:00:00', '2020-08-12 21:58:15'),
(59, 11, 'TXIDQU', 24, 200000, 1, 200000, '2020-08-12 00:00:00', '2020-08-12 21:58:15'),
(61, 11, 'HBJ7K1', 26, 200000, 1, 200000, '2020-08-13 00:00:00', '2020-08-12 22:15:21'),
(68, 11, 'YFGAEJ', 29, 185000, 1, 185000, '2020-08-20 00:00:00', '2020-08-20 13:09:13');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(4, 'Eza Ananda Putra', 'eza.a.putra@gmail.com', 'eza.a.putra', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Admin', '2020-07-10 06:33:17'),
(13, 'admin', 'admin@gmail.com', 'admin1', '6c7ca345f63f835cb353ff15bd6c5e052ec08e7a', 'Admin', '2020-08-07 14:02:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD CONSTRAINT `header_transaksi_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `header_transaksi_ibfk_4` FOREIGN KEY (`id_rekening`) REFERENCES `rekening` (`id_rekening`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD CONSTRAINT `konfigurasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kode_transaksi`) REFERENCES `header_transaksi` (`kode_transaksi`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
