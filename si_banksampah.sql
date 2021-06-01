-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 03:33 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_banksampah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_angsuran`
--

CREATE TABLE `tb_angsuran` (
  `id_angsur` varchar(10) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `id_nasabah` varchar(20) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `berat_angsur` int(11) NOT NULL,
  `total_angsur` int(11) NOT NULL,
  `tanggal_angsur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_sampah`
--

CREATE TABLE `tb_jenis_sampah` (
  `id_jenis` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id_login`, `username`, `password`, `level_user`) VALUES
(1, 'admin', '123', 1),
(2, 'aku', 'aku', 2),
(3, '171146265223001', '171146265223001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nasabah`
--

CREATE TABLE `tb_nasabah` (
  `id_nasabah` varchar(20) NOT NULL,
  `nama_nasabah` varchar(50) NOT NULL,
  `jk_nasabah` varchar(10) NOT NULL,
  `alamat_nasabah` varchar(50) NOT NULL,
  `telp_nasabah` varchar(15) NOT NULL,
  `pekerjaan_nasabah` varchar(15) NOT NULL,
  `norek_nasabah` varchar(20) NOT NULL,
  `saldo_nasabah` int(11) NOT NULL,
  `pinjaman_nasabah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nasabah`
--

INSERT INTO `tb_nasabah` (`id_nasabah`, `nama_nasabah`, `jk_nasabah`, `alamat_nasabah`, `telp_nasabah`, `pekerjaan_nasabah`, `norek_nasabah`, `saldo_nasabah`, `pinjaman_nasabah`) VALUES
('0123', 'Anisa', 'Perempuan', 'Jl. Nangka', '085178235601', 'Karyawan', '171146265223001', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengepul`
--

CREATE TABLE `tb_pengepul` (
  `id_pengepul` varchar(10) NOT NULL,
  `nama_pengepul` varchar(50) NOT NULL,
  `jk_pengepul` varchar(10) NOT NULL,
  `alamat_pengepul` varchar(50) NOT NULL,
  `telp_pengepul` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_jual` varchar(10) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `id_pengepul` varchar(10) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `berat_jual` int(11) NOT NULL,
  `total_jual` int(11) NOT NULL,
  `tanggal_jual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` varchar(10) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `jk_petugas` varchar(10) NOT NULL,
  `alamat_petugas` varchar(50) NOT NULL,
  `telp_petugas` varchar(15) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `nama_petugas`, `jk_petugas`, `alamat_petugas`, `telp_petugas`, `jabatan`) VALUES
('PT001', 'Anggi', 'Perempuan', 'Jl. Mawar', '087125932671', 'Kasir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjam` varchar(10) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `id_nasabah` varchar(20) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `id_tabung` varchar(10) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `id_nasabah` varchar(20) NOT NULL,
  `id_jenis` varchar(10) NOT NULL,
  `berat_tabung` int(11) NOT NULL,
  `total_tabung` int(11) NOT NULL,
  `tanggal_tabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarik_tabungan`
--

CREATE TABLE `tb_tarik_tabungan` (
  `id_tarik` varchar(10) NOT NULL,
  `id_petugas` varchar(10) NOT NULL,
  `id_nasabah` varchar(20) NOT NULL,
  `jumlah_tarik` int(11) NOT NULL,
  `tanggal_tarik` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`id_angsur`),
  ADD UNIQUE KEY `id_angsur` (`id_angsur`);

--
-- Indexes for table `tb_jenis_sampah`
--
ALTER TABLE `tb_jenis_sampah`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `id_jenis` (`id_jenis`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `id_login` (`id_login`);

--
-- Indexes for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD UNIQUE KEY `id_nasabah` (`id_nasabah`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD UNIQUE KEY `id_jual` (`id_jual`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id_tabung`),
  ADD UNIQUE KEY `id_tabung` (`id_tabung`);

--
-- Indexes for table `tb_tarik_tabungan`
--
ALTER TABLE `tb_tarik_tabungan`
  ADD PRIMARY KEY (`id_tarik`),
  ADD UNIQUE KEY `id_tarik` (`id_tarik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
