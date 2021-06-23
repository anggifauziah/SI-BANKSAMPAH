-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2021 at 11:56 PM
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

--
-- Dumping data for table `tb_angsuran`
--

INSERT INTO `tb_angsuran` (`id_angsur`, `id_petugas`, `id_nasabah`, `id_jenis`, `berat_angsur`, `total_angsur`, `tanggal_angsur`) VALUES
('AS001', 'PT004', '3522122741900016', 'JS006', 2, 20000, '2020-10-11'),
('AS002', 'PT002', '3522101632901562', 'JS002', 3, 9600, '2020-10-21'),
('AS003', 'PT002', '3522177188291376', 'JS010', 2, 5200, '2021-03-21'),
('AS004', 'PT002', '3522191274120003', 'JS001', 3, 8100, '2021-05-21'),
('AS005', 'PT002', '3522151074162847', 'JS001', 3, 8100, '2021-05-25'),
('AS006', 'PT002', '3522151903153628', 'JS006', 2, 20000, '2021-06-23');

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

--
-- Dumping data for table `tb_jenis_sampah`
--

INSERT INTO `tb_jenis_sampah` (`id_jenis`, `nama_jenis`, `harga_beli`, `harga_jual`) VALUES
('JS001', 'Kaset CD', 2700, 2400),
('JS002', 'Botol oli, dirigen, infus, dll', 3200, 3000),
('JS003', 'Gelas air mineral', 3000, 2500),
('JS004', 'Botol minuman bening', 1800, 1500),
('JS005', 'Botol minuman berwarna', 1300, 1100),
('JS006', 'Alumunium', 10000, 9000),
('JS007', 'Kaleng susu, roti, dll', 1300, 1000),
('JS008', 'Plastik campur', 500, 300),
('JS009', 'Karung bekas', 800, 600),
('JS010', 'Sandal, sepatu', 2600, 1400),
('JS011', 'Kemasan semen kumel', 2500, 2200);

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
(8, '171827609552001', 'hai', 2),
(9, '17899164219521', '17899164219521', 2),
(10, '172126435888953', '172126435888953', 2),
(11, '171466456954953', '171466456954953', 2),
(12, '171629394054953', '171629394054953', 2),
(13, '171305670735953', '171305670735953', 2),
(14, '171599666096953', '171599666096953', 2),
(15, '171393629159953', '171393629159953', 2),
(16, '171689701556953', '171689701556953', 2),
(17, '17735703252953', '17735703252953', 2),
(18, '171356260716953', '171356260716953', 2),
(19, '171623096691953', '171623096691953', 2),
(20, '172020394793953', '172020394793953', 2),
(21, '171084383587953', '171084383587953', 2),
(22, '172003694249953', '172003694249953', 2),
(23, '171901326913953', '171901326913953', 2),
(24, '17536494601953', '17536494601953', 2),
(25, '171681702733953', '171681702733953', 2);

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
  `tgl_daftar` date NOT NULL,
  `norek_nasabah` varchar(20) NOT NULL,
  `saldo_nasabah` int(11) NOT NULL,
  `pinjaman_nasabah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nasabah`
--

INSERT INTO `tb_nasabah` (`id_nasabah`, `nama_nasabah`, `jk_nasabah`, `alamat_nasabah`, `telp_nasabah`, `pekerjaan_nasabah`, `tgl_daftar`, `norek_nasabah`, `saldo_nasabah`, `pinjaman_nasabah`) VALUES
('3522100013821937', 'Ningsih', 'Perempuan', 'Jl. Nangka', '089738246327', 'IRT', '2021-04-05', '17536494601953', 10800, 0),
('3522101381209384', 'Buwono', 'Laki-laki', 'Jl. Melati', '085728324634', 'Petani', '2021-05-13', '171084383587953', 7600, 0),
('3522101632901562', 'Siti', 'Perempuan', 'Jl. Nangka', '087147901092', 'Swasta', '2019-06-22', '171466456954953', 40200, 90400),
('3522110382193829', 'Prasetyo Aji', 'Laki-laki', 'Jl. Mawar', '081256753789', 'Karyawan', '2021-02-14', '172003694249953', 21400, 0),
('3522110832103823', 'Indah Putri', 'Perempuan', 'Jl. Salak', '083834328493', 'Mahasiswa', '2021-04-23', '171901326913953', 18400, 0),
('3522116671652890', 'Kaswati', 'Perempuan', 'Jl. Salak', '087145267142', 'IRT', '2021-05-21', '171689701556953', 13500, 0),
('3522121973243002', 'Bambang', 'Laki-laki', 'Jl. Nangka', '087135617824', 'Swasta', '2020-08-04', '171599666096953', 50500, 100000),
('3522121983712863', 'Yuwana', 'Perempuan', 'Jl. Nangka', '081837432973', 'Swasta', '2021-05-10', '171356260716953', 15300, 0),
('3522122741900016', 'Maisaroh', 'Perempuan', 'Jl. Markisa', '081631452678', 'Swasta', '2019-06-29', '171629394054953', 46000, 30000),
('3522126910627815', 'Edi Kusuma', 'Laki-laki', 'Jl. Mawar', '089156241893', 'Swasta', '2019-03-22', '17899164219521', 54800, 0),
('3522128947120801', 'Yuli', 'Perempuan', 'Jl. Kenanga', '089726342746', 'Belum Bekerja', '2021-03-27', '171623096691953', 13000, 0),
('3522151074162847', 'Jono', 'Laki-laki', 'Jl. Melati', '085145672651', 'Swasta', '2019-04-10', '172126435888953', 30800, 141900),
('3522151903153628', 'Samsul Aji', 'Laki-laki', 'Jl. Melati', '087137256179', 'Swasta', '2019-05-01', '171827609552001', 47700, 30000),
('3522177188291376', 'Sulaiman', 'Laki-laki', 'Jl. Kenanga', '089198126379', 'Swasta', '2020-03-17', '171305670735953', 55500, 94800),
('3522181115620001', 'Laila', 'Perempuan', 'Jl. Nangka', '087145261892', 'Belum Bekerja', '2021-06-23', '171681702733953', 0, 0),
('3522191274120003', 'Endang', 'Perempuan', 'Jl. Salak', '081627190021', 'Swasta', '2020-11-27', '171393629159953', 44700, 41900),
('3522191274321893', 'Saipudin', 'Laki-laki', 'Jl. Markisa', '081783643294', 'Swasta', '2021-03-18', '172020394793953', 13700, 0),
('3522198123218900', 'Jatmiko', 'Laki-laki', 'Jl. Markisa', '085167255261', 'Swasta', '2021-04-29', '17735703252953', 17400, 0);

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

--
-- Dumping data for table `tb_pengepul`
--

INSERT INTO `tb_pengepul` (`id_pengepul`, `nama_pengepul`, `jk_pengepul`, `alamat_pengepul`, `telp_pengepul`) VALUES
('PP001', 'Fitri Aisyah', 'Perempuan', 'Jl. Salak', '085179025617'),
('PP002', 'Kusumo', 'Laki-laki', 'Jl. Nangka', '085145626678'),
('PP003', 'Agus Saputra', 'Laki-laki', 'Jl. Nangka', '085167725517'),
('PP004', 'Ali', 'Laki-laki', 'Jl. Markisa', '087415627719'),
('PP005', 'Nurul', 'Perempuan', 'Jl. Kenanga', '081567241156');

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

--
-- Dumping data for table `tb_penjualan`
--

INSERT INTO `tb_penjualan` (`id_jual`, `id_petugas`, `id_pengepul`, `id_jenis`, `berat_jual`, `total_jual`, `tanggal_jual`) VALUES
('JL001', 'PT004', 'PP002', 'JS003', 10, 25000, '2021-03-23'),
('JL002', 'PT002', 'PP005', 'JS007', 5, 5000, '2021-04-23'),
('JL003', 'PT002', 'PP003', 'JS001', 5, 12000, '2021-05-23'),
('JL004', 'PT002', 'PP001', 'JS004', 5, 7500, '2021-06-23');

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
('PT001', 'Joko', 'Laki-laki', 'Jl. Kenanga', '085127826156', 'Petugas'),
('PT002', 'Beni', 'Laki-laki', 'Jl. Mawar', '085279415673', 'Kasir'),
('PT003', 'Budi', 'Laki-laki', 'Jl. Kenanga', '085742341874', 'Petugas'),
('PT004', 'Putri', 'Perempuan', 'Jl. Mawar', '085178145139', 'Kasir');

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

--
-- Dumping data for table `tb_pinjaman`
--

INSERT INTO `tb_pinjaman` (`id_pinjam`, `id_petugas`, `id_nasabah`, `jumlah_pinjam`, `tanggal_pinjam`) VALUES
('PJ001', 'PT004', '3522101632901562', 100000, '2020-06-18'),
('PJ002', 'PT002', '3522122741900016', 50000, '2020-06-20'),
('PJ003', 'PT002', '3522151074162847', 150000, '2020-07-21'),
('PJ004', 'PT002', '3522177188291376', 100000, '2021-01-18'),
('PJ005', 'PT002', '3522121973243002', 100000, '2021-02-18'),
('PJ006', 'PT004', '3522191274120003', 50000, '2021-04-18'),
('PJ007', 'PT004', '3522151903153628', 50000, '2021-06-23');

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

--
-- Dumping data for table `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id_tabung`, `id_petugas`, `id_nasabah`, `id_jenis`, `berat_tabung`, `total_tabung`, `tanggal_tabung`) VALUES
('TBG001', 'PT002', '3522126910627815', 'JS002', 3, 9600, '2019-04-07'),
('TBG002', 'PT004', '3522126910627815', 'JS003', 5, 15000, '2019-04-20'),
('TBG003', 'PT004', '3522126910627815', 'JS010', 2, 5200, '2019-05-10'),
('TBG004', 'PT002', '3522151074162847', 'JS007', 3, 3900, '2019-05-15'),
('TBG005', 'PT002', '3522126910627815', 'JS011', 2, 5000, '2019-06-01'),
('TBG006', 'PT004', '3522151074162847', 'JS004', 3, 5400, '2019-06-10'),
('TBG007', 'PT004', '3522151903153628', 'JS006', 2, 20000, '2019-06-15'),
('TBG008', 'PT002', '3522151074162847', 'JS001', 2, 5400, '2019-06-20'),
('TBG009', 'PT002', '3522151903153628', 'JS005', 3, 3900, '2019-06-20'),
('TBG010', 'PT004', '3522126910627815', 'JS009', 1, 800, '2019-06-27'),
('TBG011', 'PT002', '3522151074162847', 'JS008', 2, 1000, '2019-07-01'),
('TBG012', 'PT004', '3522151903153628', 'JS011', 2, 5000, '2019-07-10'),
('TBG013', 'PT004', '3522122741900016', 'JS003', 2, 6000, '2019-07-10'),
('TBG014', 'PT004', '3522101632901562', 'JS006', 1, 10000, '2019-07-15'),
('TBG015', 'PT004', '3522126910627815', 'JS004', 3, 5400, '2019-07-16'),
('TBG016', 'PT002', '3522101632901562', 'JS005', 2, 2600, '2019-07-20'),
('TBG017', 'PT002', '3522122741900016', 'JS001', 2, 5400, '2019-07-29'),
('TBG018', 'PT004', '3522151903153628', 'JS003', 5, 15000, '2019-08-01'),
('TBG019', 'PT004', '3522101632901562', 'JS004', 3, 5400, '2019-08-10'),
('TBG020', 'PT004', '3522151074162847', 'JS002', 1, 3200, '2019-08-16'),
('TBG021', 'PT002', '3522122741900016', 'JS002', 2, 6400, '2019-08-20'),
('TBG022', 'PT004', '3522151074162847', 'JS007', 3, 3900, '2019-08-27'),
('TBG023', 'PT002', '3522101632901562', 'JS008', 2, 1000, '2019-09-01'),
('TBG024', 'PT002', '3522122741900016', 'JS002', 2, 6400, '2019-09-01'),
('TBG025', 'PT004', '3522122741900016', 'JS005', 3, 3900, '2019-09-11'),
('TBG026', 'PT002', '3522151903153628', 'JS008', 2, 1000, '2019-09-16'),
('TBG027', 'PT002', '3522101632901562', 'JS004', 2, 3600, '2019-09-16'),
('TBG028', 'PT004', '3522151903153628', 'JS003', 2, 6000, '2019-09-27'),
('TBG029', 'PT004', '3522101632901562', 'JS006', 1, 10000, '2019-09-27'),
('TBG030', 'PT002', '3522122741900016', 'JS001', 2, 5400, '2019-11-16'),
('TBG031', 'PT002', '3522151903153628', 'JS003', 1, 3000, '2020-01-07'),
('TBG032', 'PT004', '3522101632901562', 'JS010', 2, 5200, '2020-02-07'),
('TBG033', 'PT002', '3522151074162847', 'JS002', 2, 6400, '2020-03-07'),
('TBG034', 'PT004', '3522126910627815', 'JS003', 2, 6000, '2020-04-07'),
('TBG035', 'PT004', '3522177188291376', 'JS006', 2, 20000, '2020-04-15'),
('TBG036', 'PT002', '3522122741900016', 'JS011', 2, 5000, '2020-05-07'),
('TBG037', 'PT004', '3522151074162847', 'JS009', 2, 1600, '2020-05-18'),
('TBG038', 'PT004', '3522177188291376', 'JS008', 3, 1500, '2020-05-20'),
('TBG039', 'PT002', '3522177188291376', 'JS011', 3, 7500, '2020-06-10'),
('TBG040', 'PT004', '3522177188291376', 'JS003', 2, 6000, '2020-07-01'),
('TBG041', 'PT002', '3522126910627815', 'JS007', 3, 3900, '2020-07-18'),
('TBG042', 'PT002', '3522177188291376', 'JS005', 3, 3900, '2020-08-27'),
('TBG043', 'PT002', '3522121973243002', 'JS006', 2, 20000, '2020-09-07'),
('TBG044', 'PT002', '3522177188291376', 'JS002', 3, 9600, '2020-09-16'),
('TBG045', 'PT004', '3522151903153628', 'JS009', 2, 1600, '2020-09-18'),
('TBG046', 'PT004', '3522121973243002', 'JS001', 2, 5400, '2020-09-20'),
('TBG047', 'PT004', '3522126910627815', 'JS008', 3, 1500, '2020-09-21'),
('TBG048', 'PT002', '3522177188291376', 'JS003', 2, 6000, '2020-10-07'),
('TBG049', 'PT002', '3522121973243002', 'JS010', 2, 5200, '2020-10-10'),
('TBG050', 'PT002', '3522151903153628', 'JS004', 1, 1800, '2020-10-21'),
('TBG051', 'PT004', '3522121973243002', 'JS008', 2, 1000, '2020-11-01'),
('TBG052', 'PT004', '3522121973243002', 'JS002', 2, 6400, '2020-11-27'),
('TBG053', 'PT004', '3522191274120003', 'JS007', 3, 3900, '2020-12-15'),
('TBG054', 'PT002', '3522121973243002', 'JS009', 3, 2400, '2020-11-16'),
('TBG055', 'PT004', '3522191274120003', 'JS004', 3, 5400, '2020-12-20'),
('TBG056', 'PT004', '3522121973243002', 'JS008', 3, 1500, '2020-12-27'),
('TBG057', 'PT002', '3522191274120003', 'JS005', 3, 3900, '2021-01-10'),
('TBG058', 'PT002', '3522191274120003', 'JS007', 3, 3900, '2021-02-01'),
('TBG059', 'PT002', '3522191274120003', 'JS010', 3, 7800, '2021-02-27'),
('TBG060', 'PT004', '3522191274120003', 'JS001', 2, 5400, '2021-03-16'),
('TBG061', 'PT002', '3522110382193829', 'JS004', 4, 7200, '2021-03-18'),
('TBG062', 'PT004', '3522191274120003', 'JS009', 3, 2400, '2021-04-07'),
('TBG063', 'PT004', '3522191274321893', 'JS002', 3, 9600, '2021-04-18'),
('TBG064', 'PT004', '3522128947120801', 'JS003', 2, 6000, '2021-04-18'),
('TBG065', 'PT002', '3522100013821937', 'JS004', 3, 5400, '2021-04-20'),
('TBG066', 'PT004', '3522151903153628', 'JS007', 3, 3900, '2021-04-21'),
('TBG067', 'PT004', '3522101632901562', 'JS009', 3, 2400, '2021-04-21'),
('TBG068', 'PT004', '3522121973243002', 'JS003', 2, 6000, '2021-04-21'),
('TBG069', 'PT004', '3522110382193829', 'JS005', 4, 5200, '2021-04-21'),
('TBG070', 'PT004', '3522128947120801', 'JS008', 4, 2000, '2021-04-21'),
('TBG071', 'PT002', '3522126910627815', 'JS009', 3, 2400, '2021-05-03'),
('TBG072', 'PT002', '3522121973243002', 'JS005', 2, 2600, '2021-05-03'),
('TBG073', 'PT004', '3522122741900016', 'JS011', 3, 7500, '2021-05-06'),
('TBG074', 'PT002', '3522100013821937', 'JS008', 3, 1500, '2021-05-11'),
('TBG075', 'PT002', '3522110832103823', 'JS009', 3, 2400, '2021-05-18'),
('TBG076', 'PT002', '3522198123218900', 'JS002', 3, 9600, '2021-05-18'),
('TBG077', 'PT004', '3522121983712863', 'JS010', 3, 7800, '2021-05-20'),
('TBG078', 'PT002', '3522191274321893', 'JS005', 2, 2600, '2021-05-21'),
('TBG079', 'PT002', '3522128947120801', 'JS011', 2, 5000, '2021-05-21'),
('TBG080', 'PT002', '3522110832103823', 'JS003', 2, 6000, '2021-05-21'),
('TBG081', 'PT004', '3522198123218900', 'JS004', 3, 5400, '2021-05-23'),
('TBG082', 'PT004', '3522116671652890', 'JS005', 3, 3900, '2021-05-23'),
('TBG083', 'PT002', '3522177188291376', 'JS008', 2, 1000, '2021-05-25'),
('TBG084', 'PT002', '3522110382193829', 'JS003', 3, 9000, '2021-05-25'),
('TBG085', 'PT004', '3522101381209384', 'JS010', 2, 5200, '2021-05-27'),
('TBG086', 'PT002', '3522191274321893', 'JS008', 3, 1500, '2021-06-03'),
('TBG087', 'PT004', '3522198123218900', 'JS009', 3, 2400, '2021-06-05'),
('TBG088', 'PT002', '3522100013821937', 'JS005', 3, 3900, '2021-06-06'),
('TBG089', 'PT004', '3522191274120003', 'JS007', 3, 3900, '2021-06-10'),
('TBG090', 'PT002', '3522116671652890', 'JS002', 3, 9600, '2021-06-15'),
('TBG091', 'PT004', '3522101381209384', 'JS009', 3, 2400, '2021-06-19'),
('TBG092', 'PT002', '3522110832103823', 'JS006', 1, 10000, '2021-06-21'),
('TBG093', 'PT002', '3522121983712863', 'JS011', 3, 7500, '2021-06-21'),
('TBG094', 'PT002', '3522151903153628', 'JS007', 5, 6500, '2021-06-23');

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
-- Dumping data for table `tb_tarik_tabungan`
--

INSERT INTO `tb_tarik_tabungan` (`id_tarik`, `id_petugas`, `id_nasabah`, `jumlah_tarik`, `tanggal_tarik`) VALUES
('TR001', 'PT002', '3522151903153628', 20000, '2021-06-23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD PRIMARY KEY (`id_angsur`),
  ADD UNIQUE KEY `id_angsur` (`id_angsur`),
  ADD KEY `id_petugas` (`id_petugas`,`id_nasabah`,`id_jenis`),
  ADD KEY `id_nasabah` (`id_nasabah`),
  ADD KEY `id_jenis` (`id_jenis`);

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
-- Indexes for table `tb_pengepul`
--
ALTER TABLE `tb_pengepul`
  ADD PRIMARY KEY (`id_pengepul`),
  ADD UNIQUE KEY `id_pengepul` (`id_pengepul`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`id_jual`),
  ADD UNIQUE KEY `id_jual` (`id_jual`),
  ADD KEY `id_petugas` (`id_petugas`,`id_pengepul`,`id_jenis`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_pengepul` (`id_pengepul`);

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
  ADD UNIQUE KEY `id_pinjam` (`id_pinjam`),
  ADD KEY `id_petugas` (`id_petugas`,`id_nasabah`),
  ADD KEY `id_nasabah` (`id_nasabah`);

--
-- Indexes for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id_tabung`),
  ADD UNIQUE KEY `id_tabung` (`id_tabung`),
  ADD KEY `id_petugas` (`id_petugas`,`id_nasabah`,`id_jenis`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_nasabah` (`id_nasabah`);

--
-- Indexes for table `tb_tarik_tabungan`
--
ALTER TABLE `tb_tarik_tabungan`
  ADD PRIMARY KEY (`id_tarik`),
  ADD UNIQUE KEY `id_tarik` (`id_tarik`),
  ADD KEY `id_petugas` (`id_petugas`,`id_nasabah`),
  ADD KEY `id_nasabah` (`id_nasabah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_angsuran`
--
ALTER TABLE `tb_angsuran`
  ADD CONSTRAINT `tb_angsuran_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`),
  ADD CONSTRAINT `tb_angsuran_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`),
  ADD CONSTRAINT `tb_angsuran_ibfk_3` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_sampah` (`id_jenis`);

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_sampah` (`id_jenis`),
  ADD CONSTRAINT `tb_penjualan_ibfk_2` FOREIGN KEY (`id_pengepul`) REFERENCES `tb_pengepul` (`id_pengepul`),
  ADD CONSTRAINT `tb_penjualan_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Constraints for table `tb_pinjaman`
--
ALTER TABLE `tb_pinjaman`
  ADD CONSTRAINT `tb_pinjaman_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`),
  ADD CONSTRAINT `tb_pinjaman_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Constraints for table `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD CONSTRAINT `tb_tabungan_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `tb_jenis_sampah` (`id_jenis`),
  ADD CONSTRAINT `tb_tabungan_ibfk_2` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`),
  ADD CONSTRAINT `tb_tabungan_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);

--
-- Constraints for table `tb_tarik_tabungan`
--
ALTER TABLE `tb_tarik_tabungan`
  ADD CONSTRAINT `tb_tarik_tabungan_ibfk_1` FOREIGN KEY (`id_nasabah`) REFERENCES `tb_nasabah` (`id_nasabah`),
  ADD CONSTRAINT `tb_tarik_tabungan_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `tb_petugas` (`id_petugas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
