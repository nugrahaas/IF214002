-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 03:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id_gaji` int(11) NOT NULL,
  `jumlah_gaji` int(11) NOT NULL,
  `jumlah_tambahan` int(11) NOT NULL,
  `jenis_tambahan` enum('THR','Jarak','Lembur') NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_tempat_tinggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `historis_gaji`
--

CREATE TABLE `historis_gaji` (
  `id_historis_gaji` int(11) NOT NULL,
  `jumlah_gaji_total` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `id_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `historis_jabatan`
--

CREATE TABLE `historis_jabatan` (
  `id_historis_jabatan` int(11) NOT NULL,
  `mantan_divisi` varchar(30) NOT NULL,
  `mantan_level` varchar(30) NOT NULL,
  `mantan_nama_jabatan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `historis_tempat_tinggal`
--

CREATE TABLE `historis_tempat_tinggal` (
  `id_historis_tempat_tinggal` int(11) NOT NULL,
  `alamat_sebelumnya` varchar(40) NOT NULL,
  `jarak` int(11) NOT NULL,
  `kategori` enum('Jauh','Sedang','Dekat') NOT NULL,
  `tanggal` date NOT NULL,
  `id_tempat_tinggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `divisi` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `no_hp_karyawan` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Pria','Wanita') NOT NULL,
  `umur` int(11) NOT NULL,
  `lama_bekerja` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_tempat_tinggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_tinggal`
--

CREATE TABLE `tempat_tinggal` (
  `id_tempat_tinggal` int(11) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `jarak` int(11) NOT NULL,
  `kategori` enum('Jauh','Sedang','Dekat') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `historis_gaji`
--
ALTER TABLE `historis_gaji`
  ADD PRIMARY KEY (`id_historis_gaji`);

--
-- Indexes for table `historis_jabatan`
--
ALTER TABLE `historis_jabatan`
  ADD PRIMARY KEY (`id_historis_jabatan`);

--
-- Indexes for table `historis_tempat_tinggal`
--
ALTER TABLE `historis_tempat_tinggal`
  ADD PRIMARY KEY (`id_historis_tempat_tinggal`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tempat_tinggal`
--
ALTER TABLE `tempat_tinggal`
  ADD PRIMARY KEY (`id_tempat_tinggal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
