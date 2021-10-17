-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 04:29 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_wpspp`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_bayar`
--

CREATE TABLE `jenis_bayar` (
  `th_pelajaran` char(9) NOT NULL,
  `tingkat` varchar(3) NOT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jenis_bayar`
--

INSERT INTO `jenis_bayar` (`th_pelajaran`, `tingkat`, `jumlah`) VALUES
('2021/2022', 'X', 150000),
('2021/2022', 'XI', 150000),
('2021/2022', 'XII', 150000);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `idjurusan` varchar(4) NOT NULL,
  `jurusan` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`idjurusan`, `jurusan`) VALUES
('010', 'Teknik Sepeda Motor'),
('020', 'Teknik Kendaraan Ringan'),
('050', 'Teknik Komputer Jaringan'),
('060', 'Elektronika Industri'),
('070', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `kelas` varchar(8) NOT NULL DEFAULT '',
  `th_pelajaran` char(9) NOT NULL DEFAULT '',
  `nis` char(10) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`kelas`, `th_pelajaran`, `nis`) VALUES
('X', '2021/2022', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `kelas` varchar(8) NOT NULL,
  `nis` char(10) NOT NULL,
  `bulan` varchar(45) NOT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `jumlah` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`kelas`, `nis`, `bulan`, `tgl_bayar`, `jumlah`) VALUES
('X', '12345678', 'January', '2021-07-13', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `idprodi` varchar(4) NOT NULL,
  `prodi` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(10) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `idjurusan` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `idjurusan`) VALUES
('12345678', 'Andi Bahtiar', '010'),
('21345678', 'Citra Andini', '050'),
('43215678', 'Dania Rahayu', '060'),
('78123456', 'Endang Kurnia', '070'),
('87654321', 'Budi Hariyono', '020');

-- --------------------------------------------------------

--
-- Table structure for table `tapel`
--

CREATE TABLE `tapel` (
  `id` int(11) NOT NULL,
  `tapel` char(9) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tapel`
--

INSERT INTO `tapel` (`id`, `tapel`) VALUES
(1, '2021/2022'),
(2, '2020/2021'),
(3, '2014/2015'),
(4, '2015/2016'),
(5, '2016/2017'),
(6, '2017/2018'),
(7, '2018/2019'),
(8, '2019/2020');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `admin` tinyint(1) DEFAULT NULL,
  `fullname` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `username`, `password`, `admin`, `fullname`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrator'),
(2, 'kasir', 'c7911af3adbd12a035b289556d96470a', 0, 'Kasir'),
(5, 'sisil', '9492043746af16e844987c40c3811b42', 0, 'Sisilia '),
(6, 'mimin', '03f7f7198958ffbda01db956d15f134a', 1, 'Miminho');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_bayar`
--
ALTER TABLE `jenis_bayar`
  ADD PRIMARY KEY (`th_pelajaran`,`tingkat`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`idjurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kelas`,`th_pelajaran`,`nis`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`kelas`,`nis`,`bulan`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`idprodi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tapel`
--
ALTER TABLE `tapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tapel`
--
ALTER TABLE `tapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
