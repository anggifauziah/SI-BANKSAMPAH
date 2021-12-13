-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2021 at 08:19 AM
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
  `id_angsur` int(11) NOT NULL,
  `kode_angsur` varchar(10) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `jenis_sampah_id` int(11) NOT NULL,
  `berat_angsur` int(11) NOT NULL,
  `total_angsur` int(11) NOT NULL,
  `tanggal_angsur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_config`
--

CREATE TABLE `tb_config` (
  `id_config` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_config`
--

INSERT INTO `tb_config` (`id_config`, `judul`, `isi`) VALUES
(1, 'Lokasi', '<p>Jl. Masjid No. 13 Sroyo</p>\r\n'),
(2, 'email', '<p>banksampahsroyo@gmail.com</p>\r\n'),
(3, 'Telepon', '<p>081357780664</p>\r\n'),
(4, 'Jam Operasional', '<p>Senin - Sabtu 9.00 - 17.00 WIB</p>\r\n'),
(5, 'Bank Sampah', '<p>Bank Sampah ini didirikan untuk membantu masyarakat dalam pengelolaan sampah agar tidak dibuang sembarangan. Selain itu, manfaat adanya Bank Sampah ini juga membantu menambah penghasilan bagi nasabah yang menabung di Bank Sampah. Sistem Bank Sampah yang dibuat ini dapat mempermudah pengelola dan nasabah Bank Sampah dalam hal catatan tabungan maupun pinjaman.</p>\r\n'),
(6, 'Alur Bank Sampah', '<p>Berikut penjelasan alur untuk sistem Bank Sampah.</p>\r\n\r\n<ol>\r\n	<li>Jika ingin menabung di Bank Sampah maka harus mendaftar terlebih dahulu di outlet Bank sampah;</li>\r\n	<li>Setelah mendaftar maka akan mendapatkan username dan password untuk masuk ke website Sistem Informasi Bank Sampah;</li>\r\n	<li>Jika ingin menabung maka harus datang ke outlet untuk menyetorkan sampah sesuai jenis yang diperbolehkan Bank Sampah;</li>\r\n	<li>Untuk penarikan uang tabungan dapat dilakukan jika uang yang diperoleh berjumlah lebih dari Rp50.000,00 (Lima Puluh Ribu Rupiah);</li>\r\n	<li>Jika ingin meminjam uang, maka harus datang ke outlet;</li>\r\n	<li>Untuk angsuran, dapat dilakukan seperti menabung sampah. Maka uang yang didapatkan akan otomatis mengurangi jumlah peminjaman, tidak akan masuk ke saldo nasabah;</li>\r\n</ol>\r\n'),
(7, 'Ketentuan dan Syarat Menabung dan Tarik', '<p>Bank Sampah ini berguna bagi masyarakat jika ingin menabung dengan sampah. Berikut ketentuan untuk menabung sampah di Bank Sampah :</p>\r\n\r\n<ol>\r\n	<li>Pastikan sudah terdaftar menjadi nasabah di Bank Sampah;</li>\r\n	<li>Membawa tanda pengenal (KTP) setiap akan menabung di Bank Sampah;</li>\r\n	<li>Membawa sampah yang ingin disetorkan ke Bank Sampah sesuai dengan jenis sampah yang diperbolehkan;</li>\r\n	<li>Uang yang diperoleh dari setor sampah akan ditabung di Bank Sampah;</li>\r\n	<li>Uang yang diperoleh dapat diambil jika jumlah uang lebih dari Rp50.000,00 (Lima Puluh Ribu Rupiah);</li>\r\n</ol>\r\n'),
(8, 'Ketentuan dan Syarat Pinjam dan Angsur', '<p>Bank Sampah juga melayani pinjaman bagi masyarakat. Angsuran dibayar dengan sampah seperti saat menabung. Berikut ketentuan untuk pinjam dan angsur di Bank Sampah :</p>\r\n\r\n<ol>\r\n	<li>Pastikan sudah terdaftar menjadi nasabah di Bank Sampah;</li>\r\n	<li>Membawa tanda pengenal (KTP) setiap akan meminjam di Bank Sampah;</li>\r\n	<li>Jika ingin mengangsur pinjaman, maka silahkan membawa sampah yang akan disetorkan seperti saat menabung;</li>\r\n	<li>Angsuran hanya dapat dilakukan dengan sampah bukan uang tunai;</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_sampah`
--

CREATE TABLE `tb_jenis_sampah` (
  `id_jenis_sampah` int(11) NOT NULL,
  `kode_jenis_sampah` varchar(10) NOT NULL,
  `nama_jenis` varchar(30) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_sampah`
--

INSERT INTO `tb_jenis_sampah` (`id_jenis_sampah`, `kode_jenis_sampah`, `nama_jenis`, `harga_beli`, `harga_jual`) VALUES
(1, 'JS001', 'Kaset CD', 2400, 2700),
(2, 'JS002', 'Botol oli, dirigen, infus, dll', 3000, 3200),
(3, 'JS003', 'Gelas air mineral', 2500, 3000),
(4, 'JS004', 'Botol minuman bening', 1500, 1800),
(5, 'JS005', 'Alumunium', 9000, 10000),
(6, 'JS006', 'Kaleng susu, roti, dll', 1000, 1300),
(7, 'JS007', 'Plastik campur', 300, 500),
(8, 'JS008', 'Karung bekas', 600, 800),
(9, 'JS009', 'Sandal, sepatu', 1500, 2500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_nasabah`
--

CREATE TABLE `tb_nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `kode_nasabah` varchar(100) NOT NULL,
  `users_id` int(11) NOT NULL,
  `pekerjaan` varchar(150) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nomor_rekening` varchar(32) NOT NULL,
  `saldo` int(11) NOT NULL,
  `pinjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengepul`
--

CREATE TABLE `tb_pengepul` (
  `id_pengepul` int(11) NOT NULL,
  `kode_pengepul` varchar(10) NOT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `id_jual` int(11) NOT NULL,
  `kode_jual` varchar(10) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `pengepul_id` int(11) NOT NULL,
  `jenis_sampah_id` int(11) NOT NULL,
  `berat_jual` int(11) NOT NULL,
  `total_jual` int(11) NOT NULL,
  `tanggal_jual` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `kode_petugas` varchar(10) NOT NULL,
  `users_id` int(11) NOT NULL,
  `jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `kode_petugas`, `users_id`, `jabatan`) VALUES
(1, 'PT001', 8, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjaman`
--

CREATE TABLE `tb_pinjaman` (
  `id_pinjam` int(11) NOT NULL,
  `kode_pinjam` varchar(10) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `id_tabung` int(11) NOT NULL,
  `kode_tabung` varchar(10) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `jenis_sampah_id` int(11) NOT NULL,
  `berat_tabung` int(11) NOT NULL,
  `total_tabung` int(11) NOT NULL,
  `tanggal_tabung` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tarik_tabungan`
--

CREATE TABLE `tb_tarik_tabungan` (
  `id_tarik_tabungan` int(11) NOT NULL,
  `kode_tarik_tabungan` varchar(10) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `jumlah_tarik` int(11) NOT NULL,
  `tanggal_tarik` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `telp` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `nama`, `jenis_kelamin`, `alamat`, `telp`, `username`, `password`, `level_user`) VALUES
(1, 'Tnlxb3BtT0trWHprUEg0NHlla21Udz09', 'Laki-laki', 'MUg3QnFyZUtKYU5CajhSMXd3cUZKdz09', 'Q291UE9DdkdxdWhwOEVpT0ZuQjlxUT09', 'a0w1bXhGK1d2Rzhsa2hVc2ZFNUowQT09', 'cU8ySFEyK3ZqVjlVZytGZmRTVStiZz09', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`id_angsur`),
  ADD UNIQUE KEY `kode_angsur` (`kode_angsur`) USING BTREE,
  ADD UNIQUE KEY `id_angsur` (`id_angsur`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `nasabah_id` (`nasabah_id`),
  ADD KEY `jenis_sampah_id` (`jenis_sampah_id`);

--
-- Indexes for table `tb_config`
--
ALTER TABLE `tb_config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indexes for table `tb_jenis_sampah`
--
ALTER TABLE `tb_jenis_sampah`
  ADD PRIMARY KEY (`id_jenis_sampah`),
  ADD UNIQUE KEY `id_jenis_sampah` (`id_jenis_sampah`) USING BTREE,
  ADD UNIQUE KEY `kode_jenis_sampah` (`kode_jenis_sampah`) USING BTREE;

--
-- Indexes for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD UNIQUE KEY `kode_nasabah` (`kode_nasabah`) USING BTREE,
  ADD UNIQUE KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_pengepul`
--
ALTER TABLE `tb_pengepul`
  ADD PRIMARY KEY (`id_pengepul`),
  ADD UNIQUE KEY `kode_pengepul` (`kode_pengepul`) USING BTREE,
  ADD UNIQUE KEY `id_pengepul` (`id_pengepul`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD UNIQUE KEY `kode_jual` (`kode_jual`) USING BTREE,
  ADD UNIQUE KEY `id_jual` (`id_jual`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `pengepul_id` (`pengepul_id`),
  ADD KEY `jenis_sampah_id` (`jenis_sampah_id`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD UNIQUE KEY `kode_petugas` (`kode_petugas`) USING BTREE,
  ADD UNIQUE KEY `id_petugas` (`id_petugas`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD UNIQUE KEY `kode_pinjam` (`kode_pinjam`) USING BTREE,
  ADD UNIQUE KEY `id_pinjam` (`id_pinjam`) USING BTREE,
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `nasabah_id` (`nasabah_id`);

--
-- Indexes for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id_tabung`),
  ADD UNIQUE KEY `kode_tabung` (`kode_tabung`) USING BTREE,
  ADD UNIQUE KEY `id_tabung` (`id_tabung`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `nasabah_id` (`nasabah_id`),
  ADD KEY `jenis_sampah_id` (`jenis_sampah_id`);

--
-- Indexes for table `tb_tarik_tabungan`
--
ALTER TABLE `tb_tarik_tabungan`
  ADD PRIMARY KEY (`id_tarik_tabungan`),
  ADD UNIQUE KEY `id_tarik` (`kode_tarik_tabungan`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `nasabah_id` (`nasabah_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  MODIFY `id_angsur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_config`
--
ALTER TABLE `tb_config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_jenis_sampah`
--
ALTER TABLE `tb_jenis_sampah`
  MODIFY `id_jenis_sampah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengepul`
--
ALTER TABLE `tb_pengepul`
  MODIFY `id_pengepul` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  MODIFY `id_jual` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  MODIFY `id_tabung` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_tarik_tabungan`
--
ALTER TABLE `tb_tarik_tabungan`
  MODIFY `id_tarik_tabungan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
