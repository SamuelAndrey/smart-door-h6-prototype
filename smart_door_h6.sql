-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 10:06 AM
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
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin gtg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` int(2) NOT NULL,
  `jam_keluar` int(2) NOT NULL,
  `ruangan` varchar(200) NOT NULL,
  `nim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `jam_masuk`, `jam_keluar`, `ruangan`, `nim`) VALUES
(1, '2023-06-16', 0, 24, 'HALL', 'A11.2021.13716');

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
(61, 'A11.2021.13471', 'mahasiswa', '2023-06-16 01:47:47', 'check in', '2023-06-16', 'tidak terjadwal'),
(62, 'A11.2021.13716', 'mahasiswa', '2023-06-16 01:48:19', 'check in', '2023-06-16', 'terjadwal'),
(63, 'A11.2021.13716', 'mahasiswa', '2023-06-16 01:55:10', 'check out', '2023-06-16', 'terjadwal'),
(64, 'A11.2021.13471', 'mahasiswa', '2023-06-16 01:55:22', 'check out', '2023-06-16', 'tidak terjadwal'),
(65, 'A11.2021.13716', 'mahasiswa', '2023-06-18 11:15:27', 'check in', '2023-06-18', 'tidak terjadwal'),
(66, 'A11.2021.13539', 'mahasiswa', '2023-06-18 11:15:40', 'check in', '2023-06-18', 'tidak terjadwal'),
(67, 'A11.2021.13471', 'mahasiswa', '2023-06-18 11:15:49', 'check in', '2023-06-18', 'tidak terjadwal'),
(68, 'A11.2021.13471', 'mahasiswa', '2023-06-18 11:16:26', 'check out', '2023-06-18', 'tidak terjadwal'),
(69, 'A11.2021.13716', 'mahasiswa', '2023-06-18 11:17:31', 'check out', '2023-06-18', 'tidak terjadwal'),
(70, 'A11.2021.13539', 'mahasiswa', '2023-06-18 11:17:45', 'check out', '2023-06-18', 'tidak terjadwal');

-- --------------------------------------------------------

--
-- Table structure for table `log_akses_staf`
--

CREATE TABLE `log_akses_staf` (
  `id` int(11) NOT NULL,
  `npp` varchar(100) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `progdi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `angkatan`, `fakultas`, `progdi`) VALUES
('A11.2021.13301', 'RAJENDRA NOHAN', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13304', 'RIZKY SYAH GUMELAR', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13329', 'MUHAMMAD RIZAL PRATAMA', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13370', 'MUHAMMAD HAFIZH DZAKI', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13439', 'GATA ANINDHITA ZALIANINGRUM', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13457', 'MAHSA RAHIMA YUNUS', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13471', 'MUHAMMAD ROYNALDI', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13477', 'FADLY SOFYANSYAH', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13480', 'ARIF SAPUTRA', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13488', 'ALAM MUHAMMAD HUDA', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13539', 'AYATULLAH MA\'ARIF', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13644', 'ALMAS NAJIIB IMAM M', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13716', 'SAMUEL ANDREY AJI PRASETYA', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13752', 'AZIZU AHMAD ROZAKI RIYANTO', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13872', 'RANGGA DWI SAPUTRA', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA');

-- --------------------------------------------------------

--
-- Table structure for table `staf`
--

CREATE TABLE `staf` (
  `npp` varchar(100) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan_fungsional` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staf`
--

INSERT INTO `staf` (`npp`, `nidn`, `nama`, `jabatan_fungsional`) VALUES
('0686.11.1990.001', '0616065501', 'Prof. Dr. Ir EDI NOERSASONGKO M.Kom', 'Guru Besar'),
('0686.11.1996.100', '0606126701', 'USMAN SUDIBYO SSi.,M.KOM', 'Lektor'),
('0686.11.1997.132', '0601066101', 'ERNA ZUNI ASTUTI M.Kom', 'Lektor Kepala'),
('0686.11.2000.253', '0615127404', 'AJIB SUSANTO M.Kom', 'Lektor Kepala'),
('0686.11.2001.267', '0609127601', 'IFAN RIZQA M.Kom', 'Lektor'),
('0686.11.2009.371', '0621118401', 'HANNY HARYANTO S.Kom, M.T', 'Lektor'),
('0686.11.2012.444', '0618038701', 'ADHITYA NUGRAHA S.Kom, M.CS', 'Lektor'),
('0686.11.2012.456', '0629038402', 'ABU SALAM M.Kom', 'Lektor'),
('0686.11.2012.460', '0625078504', 'ARDYTHA LUTHFIARTA M.Kom', 'Lektor'),
('0686.11.2013.532', '0606107401', 'YANI PARTI ASTUTI S.Si, M.Kom', 'Lektor'),
('0686.11.2013.536', '0613128502', 'DEFRI KURNIAWAN M.Kom', 'Lektor'),
('0686.11.2014.583', '0616088801', 'DANANG WAHYU UTOMO M.Kom', 'Lektor'),
('0686.11.2014.585', '0612029001', 'EGIA ROSI SUBHIYAKTO M.Kom', 'Lektor'),
('0686.11.2018.745', '0617019401', 'GALUH WILUJENG SARASWATI M.CS', 'Asisten Ahli'),
('0686.11.2018.747', '0625099401', 'NURUL ANISA SRI WINARSIH S.Kom, M.Cs', 'Asisten Ahli');

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
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `log_akses`
--
ALTER TABLE `log_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indexes for table `log_akses_staf`
--
ALTER TABLE `log_akses_staf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `npp` (`npp`);

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
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_akses`
--
ALTER TABLE `log_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `log_akses_staf`
--
ALTER TABLE `log_akses_staf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Constraints for table `log_akses`
--
ALTER TABLE `log_akses`
  ADD CONSTRAINT `log_akses_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_akses_staf`
--
ALTER TABLE `log_akses_staf`
  ADD CONSTRAINT `log_akses_staf_ibfk_1` FOREIGN KEY (`npp`) REFERENCES `staf` (`npp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
