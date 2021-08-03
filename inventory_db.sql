-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2021 pada 15.09
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory_db`
--

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_keluar`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_keluar` (
`kd_barang` varchar(10)
,`nama_barang` varchar(50)
,`merk` varchar(20)
,`harga` int(11)
,`stok` int(11)
,`no_barangkeluar` varchar(10)
,`tgl_keluar` date
,`jumlah` int(11)
,`approve` enum('0','1')
,`kd_sales` varchar(10)
,`nama_sales` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `barang_masuk`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `barang_masuk` (
`kd_barang` varchar(10)
,`nama_barang` varchar(50)
,`merk` varchar(20)
,`harga` int(11)
,`stok` int(11)
,`kd_supplier` varchar(15)
,`nama_supplier` varchar(50)
,`no_telp` varchar(15)
,`alamat` text
,`no_barangmasuk` varchar(10)
,`tgl_masuk` date
,`jumlah` int(11)
,`approve` enum('0','1')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `nama_barang`, `merk`, `harga`, `stok`) VALUES
('0000001', 'Kartu Angsuran', 'Cetakan', 1000, 598);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangkeluar`
--

CREATE TABLE `tb_barangkeluar` (
  `no_barangkeluar` varchar(10) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kd_sales` varchar(15) NOT NULL,
  `approve` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_barangkeluar`
--

INSERT INTO `tb_barangkeluar` (`no_barangkeluar`, `tgl_keluar`, `kd_barang`, `jumlah`, `kd_sales`, `approve`) VALUES
('000001', '2021-08-04', '0000001', 2, '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barangmasuk`
--

CREATE TABLE `tb_barangmasuk` (
  `no_barangmasuk` varchar(10) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kd_barang` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kd_supplier` varchar(15) NOT NULL,
  `approve` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_barangmasuk`
--

INSERT INTO `tb_barangmasuk` (`no_barangmasuk`, `tgl_masuk`, `kd_barang`, `jumlah`, `kd_supplier`, `approve`) VALUES
('000001', '2021-07-05', '0000001', 600, 'S001', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sales`
--

CREATE TABLE `tb_sales` (
  `kd_sales` varchar(10) NOT NULL,
  `nama_sales` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `keypass` varchar(50) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_sales`
--

INSERT INTO `tb_sales` (`kd_sales`, `nama_sales`, `no_telp`, `email`, `password`, `keypass`, `foto`) VALUES
('1', 'afif', '62', '@gmail.com', '0', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `kd_supplier` varchar(15) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tb_supplier`
--

INSERT INTO `tb_supplier` (`kd_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
('S001', 'KSPPS BAIK', '7798965786', 'jl.bogor');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` enum('Gudang','Sales','Pimpinan') NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`nama`, `username`, `password`, `level`, `foto`) VALUES
('Arip Budiman', 'arip', 'a265fbe311f3bb21e969ca9398c1268e', 'Pimpinan', ''),
('arip21', 'aripgudang', 'a265fbe311f3bb21e969ca9398c1268e', 'Gudang', 'boruto-ep11.png'),
('mega', 'mega', 'a265fbe311f3bb21e969ca9398c1268e', 'Sales', ''),
('SELLA', 'sella', '202cb962ac59075b964b07152d234b70', 'Gudang', 'boruto-ep1.png');

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_keluar`
--
DROP TABLE IF EXISTS `barang_keluar`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_keluar`  AS SELECT `tb_barang`.`kd_barang` AS `kd_barang`, `tb_barang`.`nama_barang` AS `nama_barang`, `tb_barang`.`merk` AS `merk`, `tb_barang`.`harga` AS `harga`, `tb_barang`.`stok` AS `stok`, `tb_barangkeluar`.`no_barangkeluar` AS `no_barangkeluar`, `tb_barangkeluar`.`tgl_keluar` AS `tgl_keluar`, `tb_barangkeluar`.`jumlah` AS `jumlah`, `tb_barangkeluar`.`approve` AS `approve`, `tb_sales`.`kd_sales` AS `kd_sales`, `tb_sales`.`nama_sales` AS `nama_sales` FROM ((`tb_barang` join `tb_barangkeluar`) join `tb_sales`) WHERE `tb_barang`.`kd_barang` = `tb_barangkeluar`.`kd_barang` AND `tb_sales`.`kd_sales` = `tb_barangkeluar`.`kd_sales` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `barang_masuk`
--
DROP TABLE IF EXISTS `barang_masuk`;

CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `barang_masuk`  AS SELECT `tb_barang`.`kd_barang` AS `kd_barang`, `tb_barang`.`nama_barang` AS `nama_barang`, `tb_barang`.`merk` AS `merk`, `tb_barang`.`harga` AS `harga`, `tb_barang`.`stok` AS `stok`, `tb_supplier`.`kd_supplier` AS `kd_supplier`, `tb_supplier`.`nama_supplier` AS `nama_supplier`, `tb_supplier`.`no_telp` AS `no_telp`, `tb_supplier`.`alamat` AS `alamat`, `tb_barangmasuk`.`no_barangmasuk` AS `no_barangmasuk`, `tb_barangmasuk`.`tgl_masuk` AS `tgl_masuk`, `tb_barangmasuk`.`jumlah` AS `jumlah`, `tb_barangmasuk`.`approve` AS `approve` FROM ((`tb_barang` join `tb_barangmasuk`) join `tb_supplier`) WHERE `tb_barang`.`kd_barang` = `tb_barangmasuk`.`kd_barang` AND `tb_supplier`.`kd_supplier` = `tb_barangmasuk`.`kd_supplier` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indeks untuk tabel `tb_barangkeluar`
--
ALTER TABLE `tb_barangkeluar`
  ADD PRIMARY KEY (`no_barangkeluar`);

--
-- Indeks untuk tabel `tb_barangmasuk`
--
ALTER TABLE `tb_barangmasuk`
  ADD PRIMARY KEY (`no_barangmasuk`);

--
-- Indeks untuk tabel `tb_sales`
--
ALTER TABLE `tb_sales`
  ADD PRIMARY KEY (`kd_sales`),
  ADD UNIQUE KEY `username` (`email`);

--
-- Indeks untuk tabel `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`kd_supplier`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
