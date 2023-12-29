-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 05:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uas_cust`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jp` int(6) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jp`, `nama_jurusan`, `nama_prodi`) VALUES
(1, 'Administrasi Niaga', 'Akuntansi'),
(3, 'Teknologi Informasi', 'Manajemen Informatika'),
(15, 'adf', 'asd'),
(17, 'qwerty', 'zxcv'),
(19, 'fdf', 'fdf');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `nim`, `nama`, `jurusan`, `prodi`, `no_telp`) VALUES
(1, '2131710038', 'Yusufa Haidar', 'Teknologi Informasi', 'Manajemen Informatika', '085850672915'),
(5, '2131710092', 'lala', 'Teknologi Informasi', 'Manajemen Informatika', '1236589'),
(6, '2131710038', 'test', 'Administrasi Niaga', 'rer', 're'),
(7, '123', 'sas', 'Teknologi Informasi', 'fdf', 'dffd');

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `pengaduan` text NOT NULL,
  `tanggapan` text NOT NULL,
  `kondisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `nim`, `nama`, `jurusan`, `prodi`, `pengaduan`, `tanggapan`, `kondisi`) VALUES
(12, '2131710099', 'Muhammad Rayhan Gibran', 'Teknologi Informasi', 'Manajemen Informatika', 'abc', '', 'Belum Ditanggapi'),
(13, '2131710093', 'sasa', 'Administrasi Niaga', 'dsds', 'sds', 'sds', 'Selesai Ditanggapi'),
(14, '2131710092', 'yufa', 'Teknologi Informasi', 'Manajemen Informatika', 'df', 'fdfd', 'Selesai Ditanggapi'),
(15, 'fdf', 'fdf', 'Teknologi Informasi', 'fdf', 'dfd', '', 'Belum Ditanggapi'),
(16, 'test', 'test', 'Administrasi Niaga', 'test', 'test', '', 'Belum Ditanggapi'),
(17, 'test', 'test', 'Administrasi Niaga', 'test', 'test', '', 'Belum Ditanggapi');

-- --------------------------------------------------------

--
-- Table structure for table `username_mhs`
--

CREATE TABLE `username_mhs` (
  `nim` varchar(25) DEFAULT NULL,
  `pass` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `username_mhs`
--

INSERT INTO `username_mhs` (`nim`, `pass`) VALUES
('2131710099', '123456'),
('2131710098', '123457'),
('2131710038', '123456'),
('2131710092', '258963'),
('2131710092', '258963');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `user` varchar(25) DEFAULT NULL,
  `pass` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`user`, `pass`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jp`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jp` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
