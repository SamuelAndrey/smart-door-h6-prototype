-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2023 at 02:23 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_door_h6`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namalengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(6, 'admin', '202cb962ac59075b964b07152d234b70', 'admin ganteng');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_mhs` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` int(2) NOT NULL,
  `jam_keluar` int(2) NOT NULL,
  `ruangan` varchar(200) NOT NULL,
  `nim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_mhs`, `tanggal`, `jam_masuk`, `jam_keluar`, `ruangan`, `nim`) VALUES
(1, 1, '2023-06-07', 6, 24, 'Hall', ''),
(2, 2, '2023-06-07', 6, 24, 'Ruang 1', ''),
(3, 3, '2023-06-07', 6, 24, 'Hall', ''),
(4, 3, '2023-06-07', 6, 24, 'Hall', ''),
(5, 1, '2023-06-07', 6, 24, 'Ruang 1', ''),
(6, 2, '2023-06-07', 6, 24, 'Hall', ''),
(7, 2, '2023-06-07', 6, 24, 'Hall', ''),
(8, 3, '2023-06-07', 6, 24, 'Hall', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_akses`
--

CREATE TABLE `log_akses` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jadwal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_akses`
--

INSERT INTO `log_akses` (`id`, `kode`, `role`, `waktu`, `status`, `tanggal`, `jadwal`) VALUES
(1, '0686.11.2012.444', '', '2023-06-01 22:58:28', 'Check in', '2023-06-05', ''),
(2, 'A11.2021.13716', '', '2023-06-01 22:58:56', 'Check in', '2023-06-05', ''),
(3, '0686.11.2012.444', '', '2023-06-02 20:20:17', 'Check in', '2023-06-05', ''),
(4, '0686.11.2012.444', '', '2023-06-02 20:21:11', 'Check in', '2023-06-05', ''),
(5, '0686.11.2012.444', '', '2023-06-02 20:21:12', 'Check in', '2023-06-05', ''),
(6, '0686.11.2018.745', '', '2023-06-03 00:13:04', 'Check in', '2023-06-05', ''),
(7, '0686.11.2012.444', '', '2023-06-03 00:14:01', 'Check in', '2023-06-05', ''),
(8, '0686.11.2012.444', '', '2023-06-03 00:17:01', 'Check in', '2023-06-05', ''),
(9, '0686.11.2012.444', '', '2023-06-03 00:17:45', 'Check in', '2023-06-05', ''),
(10, '0686.11.2012.444', '', '2023-06-03 00:18:18', 'Check in', '2023-06-05', ''),
(11, '0686.11.2018.745', '', '2023-06-03 12:14:25', 'Check in', '2023-06-05', ''),
(12, 'A11.2021.13716', '', '2023-06-03 12:14:37', 'Check in', '2023-06-05', ''),
(13, 'A11.2021.13716', '', '2023-06-03 12:15:05', 'Check in', '2023-06-05', ''),
(14, 'A11.2021.13716', '', '2023-06-03 12:15:21', 'Check in', '2023-06-05', ''),
(15, 'A11.2021.13716', '', '2023-06-03 12:19:24', 'Check in', '2023-06-05', ''),
(16, '0686.11.2018.745', '', '2023-06-03 12:19:39', 'Check in', '2023-06-05', ''),
(17, '0686.11.2012.444', '', '2023-06-03 12:19:53', 'Check in', '2023-06-05', ''),
(18, '0686.11.2012.444', '', '2023-06-03 12:31:37', 'Check in', '2023-06-05', ''),
(19, 'A11.2021.13716', '', '2023-06-03 12:33:37', 'Check in', '2023-06-05', ''),
(20, 'A11.2021.13716', '', '2023-06-03 12:35:28', 'Check in', '2023-06-05', ''),
(21, 'A11.2021.13716', '', '2023-06-03 12:43:32', 'Check in', '2023-06-05', ''),
(22, '0686.11.2012.444', '', '2023-06-03 12:43:51', 'Check in', '2023-06-05', ''),
(23, '0686.11.2018.745', '', '2023-06-05 09:23:06', 'Check in', '2023-06-05', ''),
(24, 'A11.2021.13539', '', '2023-06-05 11:47:47', 'Check in', '2023-06-05', ''),
(25, 'A11.2021.13539', '', '2023-06-05 11:56:14', 'Check in', '2023-06-05', ''),
(26, 'A11.2021.13471', '', '2023-06-05 11:56:38', 'Check in', '2023-06-05', ''),
(27, 'A11.2021.13539', '', '2023-06-05 11:58:03', 'Check in', '2023-06-05', ''),
(28, '0686.11.2012.444', '', '2023-06-05 11:58:40', 'Check in', '2023-06-05', ''),
(29, '0686.11.2012.444', '', '2023-06-05 12:03:20', 'Check in', '2023-06-05', ''),
(30, '0686.11.2018.745', '', '2023-06-05 12:03:29', 'Check in', '2023-06-05', ''),
(31, 'A11.2021.13716', '', '2023-06-05 12:03:35', 'Check in', '2023-06-05', ''),
(32, 'A11.2021.13539', '', '2023-06-05 12:16:13', 'Check in', '2023-06-05', ''),
(33, '0686.11.2018.745', '', '2023-06-05 18:47:08', 'Check in', '2023-06-05', ''),
(34, 'A11.2021.13716', '', '2023-06-05 18:47:21', 'Check in', '2023-06-05', ''),
(35, '0686.11.2012.444', '', '2023-06-05 18:47:44', 'Check in', '2023-06-05', ''),
(36, '0686.11.2018.745', '', '2023-06-05 18:53:50', 'Check in', '2023-06-05', ''),
(37, 'A11.2021.13716', '', '2023-06-05 19:05:49', 'Check in', '2023-06-05', ''),
(38, 'A11.2021.13716', '', '2023-06-05 19:11:55', 'Check in', '2023-06-05', ''),
(39, 'A11.2021.13716', '', '2023-06-05 19:28:57', 'Check in', '2023-06-05', ''),
(40, 'A11.2021.13716', '', '2023-06-05 19:33:14', 'Check in', '2023-06-05', ''),
(41, 'A11.2021.13716', 'mahasiswa', '2023-06-05 22:35:29', 'check in', '2023-06-05', ''),
(42, '0686.11.2012.444', 'staf', '2023-06-05 22:38:34', 'check in', '2023-06-05', ''),
(43, 'A11.2021.13716', 'mahasiswa', '2023-06-05 22:50:32', 'check in', '2023-06-05', ''),
(44, 'A11.2021.13716', 'mahasiswa', '2023-06-05 22:53:05', 'check in', '2023-06-05', ''),
(45, '0686.11.2012.444', 'staf', '2023-06-05 22:56:34', 'check in', '2023-06-05', ''),
(46, '0686.11.2018.745', 'staf', '2023-06-05 22:59:16', 'check in', '2023-06-05', ''),
(47, '0686.11.2018.745', 'staf', '2023-06-05 23:19:54', 'check in', '2023-06-05', ''),
(48, 'A11.2021.13716', 'mahasiswa', '2023-06-05 23:20:03', 'check in', '2023-06-05', ''),
(49, 'A11.2021.13716', 'mahasiswa', '2023-06-05 23:20:09', 'check in', '2023-06-05', ''),
(50, 'A11.2021.13716', 'mahasiswa', '2023-06-05 23:38:00', 'check in', '2023-06-05', ''),
(51, 'A11.2021.13716', 'mahasiswa', '2023-06-06 23:23:47', 'check in', '2023-06-06', ''),
(52, 'A11.2021.13716', 'mahasiswa', '2023-06-06 23:28:08', 'check in', '2023-06-06', ''),
(53, 'A11.2021.13471', 'mahasiswa', '2023-06-07 09:37:21', 'check in', '2023-06-07', ''),
(54, '0686.11.2012.444', 'staf', '2023-06-07 09:38:07', 'check in', '2023-06-07', ''),
(55, 'A11.2021.13716', 'mahasiswa', '2023-06-07 09:41:09', 'check in', '2023-06-07', ''),
(56, '0686.11.2018.745', 'staf', '2023-06-07 09:41:17', 'check in', '2023-06-07', ''),
(57, 'A11.2021.13539', 'mahasiswa', '2023-06-07 09:48:08', 'check in', '2023-06-07', ''),
(58, 'A11.2021.13471', 'mahasiswa', '2023-06-07 09:51:42', 'check in', '2023-06-07', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `progdi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `angkatan`, `fakultas`, `progdi`) VALUES
('A11.2021.13471', 'Muhammad Roynaldi', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13539', 'Ayatullah Ma\'arif', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13716', 'Samuel Andrey Aji Prasetya', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `npp` varchar(50) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan_fungsional` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`npp`, `nidn`, `nama`, `jabatan_fungsional`) VALUES
('0686.11.2012.444', '0618038701', 'ADHITYA NUGRAHA S.Kom, M.CS', 'Lektor'),
('0686.11.2018.745', '0617019401', 'GALUH WILUJENG SARASWATI M.CS', 'Asisten Ahli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `log_akses`
--
ALTER TABLE `log_akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`npp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log_akses`
--
ALTER TABLE `log_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
