-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2015 at 09:33 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_awresto`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(100) NOT NULL AUTO_INCREMENT,
  `id_kategori` varchar(100) NOT NULL,
  `id_satuan` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `file` text NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `id_kategori`, `id_satuan`, `nama_barang`, `file`, `jenis_barang`, `harga_jual`, `status`) VALUES
(9, 'Makanan Ringan', 'Biji', 'Nanas', 'big-img-slide1.jpg', 'Bahan Baku', '10000', 'Promo'),
(13, 'Makanan Pedas', 'Biji', 'Qwe', 'dish6.jpg', 'Bahan Jadi', '12000', 'Promo'),
(15, 'Makanan Manis', 'Paket 3', 'Dev', 'dish10.jpg', 'Bahan Jadi', '10000', 'Promo'),
(16, 'Makanan Gurih', 'Paket 3', 'Cer', 'dish4.jpg', 'Bahan Jadi', '12000', 'Promo'),
(17, 'Minuman Hangat', 'Paket 3', 'Ver', 'c-back1.jpg', 'Bahan Jadi', '10000', 'Tidak'),
(18, 'Makanan Cepat Saji', 'Biji', 'Zer', 'dish8.jpg', 'Bahan Jadi', '20000', 'Promo'),
(19, 'Makanan Pedas', 'Paket', 'Xer', 'dish3.jpg', 'Bahan Jadi', '20000', 'Tidak'),
(20, 'Makanan Cepat Saji', 'Paket', 'Der', 'dish1.jpg', 'Bahan Jadi', '15000', 'Tidak'),
(21, 'Makanan Gurih', 'Paket', 'Ser', 'dish2.jpg', 'Bahan Jadi', '20000', 'Promo'),
(22, 'Makanan Ringan', 'Paket 2', 'io', '1466274_10152014754047631_536727033_n.png', 'Bahan Jadi', '20000', 'Tidak'),
(26, 'Minuman Panas', 'Paket 3', 'wqa', 'calvin-14786-1920x1200.jpg', 'Bahan Baku', '10000', 'Tidak'),
(27, 'Minuman Hangat', 'Paket', 'sdew', '1381308_10151921526457631_1019026968_n.jpg', 'Bahan Jadi', '11900', 'Tidak'),
(28, 'Makanan Manis', 'Paket 6', 'fer', 'fast-and-furious.jpg', 'Bahan Jadi', '20000', 'Tidak'),
(34, 'Makanan Manis', 'Paket 4', 'asw', '3d-ball-3D-inspirational-desktop-wallpaper.jpg', 'Bahan Jadi', '8000', 'Promo'),
(35, 'Makanan Gurih', 'Paket 3', 'bw', 'images (22).jpg', 'Bahan Baku', '8000', 'Promo'),
(36, 'Makanan Manis', 'Paket 9', 'cesr', 'images (17).jpg', 'Bahan Jadi', '70000', 'Tidak'),
(37, 'Makanan Pedas', 'Paket 8', 'Wes', 'images (25).jpg', 'Bahan Jadi', '20000', 'Tidak'),
(38, 'Minuman Dingin', 'Paket 7', 'wred', 'images (2).jpg', 'Bahan Jadi', '7000', 'Tidak'),
(39, 'Makanan Manis', 'Paket 6', 'ter', 'images (24).jpg', 'Bahan Jadi', '10000', 'Tidak'),
(40, 'Makanan Cepat Saji', 'Paket 8', 'Opi', 'download.jpg', 'Bahan Jadi', '20000', 'Tidak'),
(41, 'Makanan Cepat Saji', 'Paket 8', 'yu', 'images.jpg', 'Bahan Jadi', '15000', 'Tidak'),
(42, 'Makanan Ringan', 'Paket 9', 'que', 'images (27).jpg', 'Bahan Jadi', '14000', 'Tidak'),
(43, 'Minuman Soda', 'Paket 9', 'nui', 'images (4).jpg', 'Bahan Baku', '10000', 'Tidak'),
(44, 'Makanan Penutup', 'Biji', 'tui', 'Background-Images-Free4.jpg', 'Bahan Baku', '12000', 'Tidak');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int(100) NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(100) NOT NULL,
  `foto_karyawan` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama_karyawan`, `foto_karyawan`, `alamat`, `telepon`) VALUES
(5, 'AA', '../../assets/img/foto/4.jpg', 'AA', '027493273'),
(7, 'CC', '../../assets/img/foto/18.jpg', 'CC', '02374023475'),
(8, 'Ahmad Suryono', '../../assets/img/foto/1.jpg', 'Jl. Panjaitan', '078473985734'),
(9, 'Ahmad Sholichun', '../../assets/img/foto/2.jpg', 'Jl. Pattimura', '048638534'),
(10, 'Dwi Andika', '../../assets/img/foto/12.jpg', 'Jl. Madyopuro', '093453875'),
(11, 'Imam Supono', '../../assets/img/foto/6.jpg', 'Jl. Sulawesi', '034294873284'),
(12, 'Pratama Yuda', '../../assets/img/foto/3.jpg', 'Jl. Ciputra', '03579485654'),
(13, 'Yanto Prayogo', '../../assets/img/foto/16.jpg', 'Jl. Warukandang', '079675434578'),
(14, 'Syamsul Hadi', '../../assets/img/foto/5.jpg', 'Jl. Airlanggan', '023543574'),
(15, 'Pradita Wahyu Putra', '../../assets/img/foto/20.jpg', 'Jl. Tlogowaru', '078975545643');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id_kategori` int(100) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2213 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2201, 'Makanan Cepat Saji'),
(2204, 'Makanan Penutup'),
(2205, 'Makanan Ringan'),
(2206, 'Makanan Pedas'),
(2207, 'Makanan Manis'),
(2208, 'Makanan Gurih'),
(2209, 'Minuman Dingin'),
(2210, 'Minuman Hangat'),
(2211, 'Minuman Soda'),
(2212, 'Minuman Panas');

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE IF NOT EXISTS `meja` (
  `id_meja` int(100) NOT NULL AUTO_INCREMENT,
  `no_meja` int(100) NOT NULL,
  `ket` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11110 ;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`id_meja`, `no_meja`, `ket`, `status`) VALUES
(11101, 1, 'Class VIP', 'kosong'),
(11102, 2, 'Class VVIP', 'kosong'),
(11103, 3, 'Class Ekonomi 1', 'kosong'),
(11104, 4, 'Level 1', 'kosong'),
(11105, 5, 'Level 2', 'kosong'),
(11107, 7, 'Level 4', 'kosong'),
(11108, 8, 'Level 5', 'kosong'),
(11109, 9, 'Level 6', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(100) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100111 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `telepon`) VALUES
(100101, 'Edi Supono', 'Nganjuk', '089725273'),
(100102, 'Erick Putra S', 'Bekasi', '08938497398'),
(100103, 'Endi Hermawan', 'Jl. Panjaitan 2', '035879735'),
(100104, 'Andi Suprapto', 'Jl. Mekarsari 5', '056846465'),
(100105, 'Dedik Mulyono', 'Jl. Kalimantan', '0347594653'),
(100106, 'Ferinando', 'Jl. Casablanka 2', '034858976'),
(100107, 'Dwi Praditya', 'Jl. Kalpataru', '07656878767'),
(100108, 'Dewi Putri', 'Jl. Melati', '0275346584'),
(100109, 'Siti Bunga Pratiwi', 'Jl. Mawar', '08978565678'),
(100110, 'Putri Ningsih', 'Jl. Panjaitan 3', '075843758832');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
  `id_pembelian` int(100) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(100) NOT NULL,
  `id_supplier` int(100) NOT NULL,
  `no_nota` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `tgl_pembelian` date NOT NULL,
  PRIMARY KEY (`id_pembelian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_karyawan`, `id_supplier`, `no_nota`, `total`, `tgl_pembelian`) VALUES
(4, 0, 0, 'undefined', 0, '2015-07-11'),
(5, 8, 880807, 'undefined', 0, '2015-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE IF NOT EXISTS `penjualan` (
  `id_penjualan` int(100) NOT NULL,
  `id_barang` int(100) NOT NULL,
  `id_karyawan` int(100) NOT NULL,
  `id_pelanggan` int(100) NOT NULL,
  `no_meja` varchar(100) NOT NULL,
  `jumlah_jual` float NOT NULL,
  `harga_jual` float NOT NULL,
  `diskon` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `subtotal` float NOT NULL,
  `tgl_penjualan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_barang`, `id_karyawan`, `id_pelanggan`, `no_meja`, `jumlah_jual`, `harga_jual`, `diskon`, `status`, `total`, `nama_barang`, `subtotal`, `tgl_penjualan`) VALUES
(0, 13, 0, 0, '', 1, 12000, 10, '', 0, 'Qwe', 11990, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE IF NOT EXISTS `satuan` (
  `id_satuan` int(100) NOT NULL AUTO_INCREMENT,
  `nama_satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_satuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9911 ;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`) VALUES
(9901, 'Biji'),
(9902, 'Paket'),
(9903, 'Paket 2'),
(9904, 'Paket 3'),
(9905, 'Paket 4'),
(9906, 'Paket 5'),
(9907, 'Paket 6'),
(9908, 'Paket 7'),
(9909, 'Paket 8'),
(9910, 'Paket 9');

-- --------------------------------------------------------

--
-- Table structure for table `sementara2`
--

CREATE TABLE IF NOT EXISTS `sementara2` (
  `id_barang` varchar(100) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_beli` varchar(100) NOT NULL,
  `harga_jual` varchar(100) NOT NULL,
  `diskon` varchar(100) NOT NULL,
  `subtotal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `id_supplier` int(100) NOT NULL AUTO_INCREMENT,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telepon` varchar(100) NOT NULL,
  PRIMARY KEY (`id_supplier`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=880811 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `alamat`, `telepon`) VALUES
(880801, 'Tono Handono P', 'Blitar', '09348098'),
(880802, 'Tini Handini', 'Trenggalek', '09845875'),
(880803, 'Eduard L', 'Jombang', '083927483'),
(880804, 'Yohandika', 'Kediri', '0234587345'),
(880805, 'Mery', 'Malang', '0953747583'),
(880806, 'Ahmad Suhandika', 'Surabaya', '0358385639'),
(880807, 'Andik Yoga Pratama', 'Tulung Agung', '04896948654'),
(880808, 'Erna Safira', 'Pare', '038943763456'),
(880809, 'Hengky Putra', 'Batu', '0392587656'),
(880810, 'Andrik Kurniawan', 'Banyuwangi', '03745683745');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user`, `password`) VALUES
('awresto', '90173c2f3e448ddee4e323c3b89d6cc7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
