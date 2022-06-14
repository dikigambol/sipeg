-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2022 at 07:56 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun_karyawan`
--

CREATE TABLE `akun_karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun_karyawan`
--

INSERT INTO `akun_karyawan` (`id_karyawan`, `nama`, `username`, `password`) VALUES
(26, 'Mahendra Widodo', 'hrd', 'adminhrd'),
(27, 'Diki Akbar', 'diki.gambol', 'diki.gambol'),
(29, 'Alfat Akbar', 'alfat123', 'alfat123');

-- --------------------------------------------------------

--
-- Table structure for table `detail_karyawan`
--

CREATE TABLE `detail_karyawan` (
  `id_detail` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `no_ktp` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `pendidikan` int(10) DEFAULT NULL,
  `status_pernikahan` varchar(100) DEFAULT NULL,
  `alamat_ktp` text,
  `divisi` int(10) DEFAULT NULL,
  `tanggal_masuk` varchar(100) DEFAULT NULL,
  `tanggal_keluar` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_karyawan`
--

INSERT INTO `detail_karyawan` (`id_detail`, `id_pegawai`, `no_ktp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pendidikan`, `status_pernikahan`, `alamat_ktp`, `divisi`, `tanggal_masuk`, `tanggal_keluar`, `no_telepon`) VALUES
(15, 26, '123456', 'Sidoarjo', '1999-11-27', 'Laki-Laki', 3, 'Menikah', 'Jalan Kemuning', 2, '2022-06-14', '', '08974680033'),
(16, 27, '1234', 'Sidoarjo', '2022-06-15', 'Laki-Laki', 7, 'Single', 'Jalan Insecure', 1, '2022-06-15', '', '08974680033'),
(17, 29, '12345', 'Sidoarjo', '2022-06-15', 'Laki-Laki', 1, 'Single', 'Jalan Insecure', 1, '2022-06-15', NULL, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(10) NOT NULL,
  `nama_divisi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Informasi Teknologi'),
(2, 'HRD');

-- --------------------------------------------------------

--
-- Table structure for table `izin_karyawan`
--

CREATE TABLE `izin_karyawan` (
  `id_izin` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `jenis_izin` varchar(100) NOT NULL,
  `tgl_izin` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `izin_karyawan`
--

INSERT INTO `izin_karyawan` (`id_izin`, `id_pegawai`, `jenis_izin`, `tgl_izin`, `keterangan`, `status`) VALUES
(4, 27, 'Sakit/Keperluan', '2022-06-15', 'Perlu Makan', 'Disetujui'),
(5, 29, 'Sakit/Keperluan', '2022-06-15', 'Perlu Makan', 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Sekretaris'),
(2, 'Kepala Produksi'),
(3, 'Manajer Divisi'),
(4, 'Kepala Divisi'),
(5, 'Staff IT');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_karyawan`
--

CREATE TABLE `jadwal_karyawan` (
  `id_jadwal` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_masuk` varchar(100) NOT NULL,
  `jam_keluar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal_karyawan`
--

INSERT INTO `jadwal_karyawan` (`id_jadwal`, `id_pegawai`, `hari`, `jam_masuk`, `jam_keluar`) VALUES
(6, 27, 'Senin', '08:00', '16:00'),
(7, 27, 'Selasa', '08:00', '16:00'),
(8, 29, 'Senin', '08:00', '16:00');

-- --------------------------------------------------------

--
-- Table structure for table `list_atasan`
--

CREATE TABLE `list_atasan` (
  `id_atasan` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `divisi` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `list_atasan`
--

INSERT INTO `list_atasan` (`id_atasan`, `id_pegawai`, `divisi`, `keterangan`) VALUES
(9, 26, 'HRD', 'Kepala HRD'),
(11, 29, 'Informasi Teknologi', 'Kepala IT');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(10) NOT NULL,
  `nama_pendidikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'SD'),
(2, 'SMP'),
(3, 'SMA/SMK'),
(4, 'D1'),
(5, 'D2'),
(6, 'D3'),
(7, 'D4/S1'),
(8, 'S2'),
(9, 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `jenis_prestasi` varchar(100) NOT NULL,
  `ket_prestasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `id_pegawai`, `jenis_prestasi`, `ket_prestasi`) VALUES
(3, 27, 'Prestasi Individu', 'Prestasi dalam meraih penghasilan tertinggi');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `id_riwayat_jabatan` int(10) NOT NULL,
  `id_pegawai` int(10) NOT NULL,
  `id_divisi` int(10) DEFAULT NULL,
  `id_jabatan` int(10) DEFAULT NULL,
  `periode_awal` varchar(100) DEFAULT NULL,
  `periode_akhir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_jabatan`
--

INSERT INTO `riwayat_jabatan` (`id_riwayat_jabatan`, `id_pegawai`, `id_divisi`, `id_jabatan`, `periode_awal`, `periode_akhir`) VALUES
(3, 27, 2, 4, 'Desember 2020', 'Sekarang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun_karyawan`
--
ALTER TABLE `akun_karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  ADD PRIMARY KEY (`id_detail`),
  ADD UNIQUE KEY `no_ktp` (`no_ktp`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `pendidikan` (`pendidikan`),
  ADD KEY `divisi` (`divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `izin_karyawan`
--
ALTER TABLE `izin_karyawan`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jadwal_karyawan`
--
ALTER TABLE `jadwal_karyawan`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `list_atasan`
--
ALTER TABLE `list_atasan`
  ADD PRIMARY KEY (`id_atasan`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`id_riwayat_jabatan`),
  ADD KEY `id_pegawai` (`id_pegawai`),
  ADD KEY `id_divisi` (`id_divisi`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun_karyawan`
--
ALTER TABLE `akun_karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  MODIFY `id_detail` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `izin_karyawan`
--
ALTER TABLE `izin_karyawan`
  MODIFY `id_izin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jadwal_karyawan`
--
ALTER TABLE `jadwal_karyawan`
  MODIFY `id_jadwal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `list_atasan`
--
ALTER TABLE `list_atasan`
  MODIFY `id_atasan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `id_riwayat_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_karyawan`
--
ALTER TABLE `detail_karyawan`
  ADD CONSTRAINT `relasi_divisi` FOREIGN KEY (`divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `relasi_karyawan` FOREIGN KEY (`id_pegawai`) REFERENCES `akun_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relasi_pendidikan` FOREIGN KEY (`pendidikan`) REFERENCES `pendidikan` (`id_pendidikan`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `izin_karyawan`
--
ALTER TABLE `izin_karyawan`
  ADD CONSTRAINT `relasi_karyawan_3` FOREIGN KEY (`id_pegawai`) REFERENCES `akun_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_karyawan`
--
ALTER TABLE `jadwal_karyawan`
  ADD CONSTRAINT `relasi_karyawan_2` FOREIGN KEY (`id_pegawai`) REFERENCES `akun_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `list_atasan`
--
ALTER TABLE `list_atasan`
  ADD CONSTRAINT `relasi_karyawan_4` FOREIGN KEY (`id_pegawai`) REFERENCES `akun_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD CONSTRAINT `relation_karyawan_2` FOREIGN KEY (`id_pegawai`) REFERENCES `akun_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `relation_divisi` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `relation_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `relation_karyawan_3` FOREIGN KEY (`id_pegawai`) REFERENCES `akun_karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
