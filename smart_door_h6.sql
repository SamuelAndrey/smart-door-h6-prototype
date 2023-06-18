-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jun 2023 pada 11.21
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

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
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `namalengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`idadmin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'admin gtg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` int(2) NOT NULL,
  `jam_keluar` int(2) NOT NULL,
  `ruangan` varchar(200) NOT NULL,
  `nim` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tanggal`, `jam_masuk`, `jam_keluar`, `ruangan`, `nim`) VALUES
(1, '2023-06-16', 0, 24, 'HALL', 'A11.2021.13716');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_akses`
--

CREATE TABLE `log_akses` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL,
  `tanggal` date NOT NULL DEFAULT current_timestamp(),
  `jadwal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_akses`
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
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `angkatan` varchar(10) NOT NULL,
  `fakultas` varchar(100) NOT NULL,
  `progdi` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `angkatan`, `fakultas`, `progdi`) VALUES
('A11.2021.13471', 'MUHAMMAD ROYNALDI', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13539', 'AYATULLAH MA\'ARIF', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA'),
('A11.2021.13716', 'SAMUEL ANDREY AJI PRASETYA', '2021', 'FAKULTAS ILMU KOMPUTER', 'TEKNIK INFORMATIKA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `staf`
--

CREATE TABLE `staf` (
  `npp` varchar(100) NOT NULL,
  `nidn` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jabatan_fungsional` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `log_akses`
--
ALTER TABLE `log_akses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode` (`kode`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `staf`
--
ALTER TABLE `staf`
  ADD PRIMARY KEY (`npp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `log_akses`
--
ALTER TABLE `log_akses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);

--
-- Ketidakleluasaan untuk tabel `log_akses`
--
ALTER TABLE `log_akses`
  ADD CONSTRAINT `log_akses_ibfk_1` FOREIGN KEY (`kode`) REFERENCES `mahasiswa` (`nim`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
