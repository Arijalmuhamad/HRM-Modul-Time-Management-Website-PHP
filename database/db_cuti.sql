-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2021 at 12:50 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_adm` int(11) NOT NULL,
  `nama_adm` varchar(50) NOT NULL,
  `telp_adm` varchar(15) NOT NULL,
  `user_adm` varchar(50) NOT NULL,
  `pass_adm` varchar(100) NOT NULL,
  `foto_adm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_adm`, `nama_adm`, `telp_adm`, `user_adm`, `pass_adm`, `foto_adm`) VALUES
(1, 'Administrator', '08962878534', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id_bln` int(10) NOT NULL,
  `nama_bln` varchar(25) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id_bln`, `nama_bln`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'November'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id_cat` int(10) NOT NULL,
  `nip` int(10) NOT NULL,
  `id_bln` int(10) NOT NULL,
  `id_hri` int(10) NOT NULL,
  `id_tgl` int(10) NOT NULL,
  `isi_cat` longtext NOT NULL,
  `status_cat` enum('Menunggu','Dikonfirmasi','Ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `no_cuti` varchar(30) NOT NULL,
  `npp` varchar(20) NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `leader` varchar(20) NOT NULL,
  `manager` varchar(30) NOT NULL,
  `spv` varchar(20) NOT NULL,
  `stt_cuti` varchar(50) NOT NULL,
  `ket_reject` text NOT NULL,
  `hrd_app` int(2) NOT NULL,
  `lead_app` int(2) NOT NULL,
  `spv_app` int(2) NOT NULL,
  `mng_app` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`no_cuti`, `npp`, `tgl_pengajuan`, `tgl_awal`, `tgl_akhir`, `durasi`, `keterangan`, `leader`, `manager`, `spv`, `stt_cuti`, `ket_reject`, `hrd_app`, `lead_app`, `spv_app`, `mng_app`) VALUES
('19062021131855', '19052000', '2021-06-19', '2021-06-21', '2021-06-23', 3, 'Menghabiskan Sisa Cuti', '', '', '', 'Approved', '', 1, 0, 0, 0),
('19062021131957', '19051999', '2021-06-19', '2021-06-22', '2021-06-24', 3, 'Menjenguk Orang tua', '', '19052000', '19052001', 'Approved', '', 1, 0, 1, 1),
('19062021132045', '19051999', '2021-06-19', '2021-06-28', '2021-06-30', 3, 'Coba cuti', '', '19052000', '19052001', 'Approved', '', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `data_absen`
--

CREATE TABLE `data_absen` (
  `id_absen` int(11) NOT NULL,
  `npp` varchar(20) CHARACTER SET latin1 NOT NULL,
  `id_bln` int(10) NOT NULL,
  `id_hri` int(10) NOT NULL,
  `id_tgl` int(10) NOT NULL,
  `jam_msk` varchar(10) CHARACTER SET latin1 NOT NULL,
  `st_jam_msk` enum('Menunggu','Dikonfirmasi','Ditolak') CHARACTER SET latin1 NOT NULL,
  `jam_klr` varchar(50) CHARACTER SET latin1 NOT NULL,
  `st_jam_klr` enum('Belum Absen','Menunggu','Dikonfirmasi','Ditolak') CHARACTER SET latin1 NOT NULL,
  `isi_cat` longtext CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_absen`
--

INSERT INTO `data_absen` (`id_absen`, `npp`, `id_bln`, `id_hri`, `id_tgl`, `jam_msk`, `st_jam_msk`, `jam_klr`, `st_jam_klr`, `isi_cat`) VALUES
(174, '1111', 6, 4, 24, '21.36 WIB', 'Menunggu', '04.09 WIB', 'Menunggu', ''),
(175, '1111', 6, 5, 25, '03.01 WIB', 'Menunggu', '04.09 WIB', 'Menunggu', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pb`
--

CREATE TABLE `detail_pb` (
  `npp` varchar(20) CHARACTER SET latin1 NOT NULL,
  `nama_emp` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `npp` varchar(20) NOT NULL,
  `nama_emp` varchar(100) NOT NULL,
  `jk_emp` varchar(20) NOT NULL,
  `telp_emp` varchar(20) NOT NULL,
  `divisi` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hak_akses` varchar(20) NOT NULL,
  `jml_cuti` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_emp` text NOT NULL,
  `active` varchar(20) NOT NULL,
  `id_adm` int(11) NOT NULL,
  `sisa_cuti` int(11) NOT NULL,
  `wfh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`npp`, `nama_emp`, `jk_emp`, `telp_emp`, `divisi`, `jabatan`, `alamat`, `hak_akses`, `jml_cuti`, `password`, `foto_emp`, `active`, `id_adm`, `sisa_cuti`, `wfh`) VALUES
('1111', 'Arijal', 'Laki-Laki', '12345678', 'IT', 'Staff', 'sukabumi', 'Pegawai', 40, '1111', 'foto1111n.jpg', 'Aktif', 1, 0, 'Kamis'),
('12345', 'Miftah Mulya K', 'Laki-Laki', '081212121212', 'IT', 'Pegawai', 'Jati Asih ', 'Pegawai', 30, '12345', 'foto123451.jpg', 'Aktif', 1, 0, ''),
('19051999', 'Andri Hidayat', 'Laki-Laki', '081123455431', 'QC', 'Pegawai', 'Bekasi', 'Pegawai', 10, 'rahasia', 'foto190519991.jpg', 'Aktif', 1, 0, 'Jumat'),
('19052000', 'Ariyani', 'Perempuan', '081210933355', 'QC', 'Manager', 'Jakarta', 'Manager', 20, '19052000', 'foto190520002.png', 'Aktif', 1, 0, 'Senin'),
('19052001', 'Aripin', 'Laki-Laki', '08567572940', 'QC', 'Super Visior', 'Sukabumi', 'Supervisor', 13, '19052001', 'foto190520011.jpg', 'Aktif', 1, 0, 'Kamis');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hri` int(10) NOT NULL,
  `nama_hri` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hri`, `nama_hri`) VALUES
(1, 'Senin'),
(2, 'Selasa'),
(3, 'Rabu'),
(4, 'Kamis'),
(5, 'Jumat'),
(6, 'Sabtu'),
(7, 'Minggu');

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `no_izin` varchar(30) CHARACTER SET latin1 NOT NULL,
  `npp` varchar(20) CHARACTER SET latin1 NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `durasi` int(11) NOT NULL,
  `tujuan` varchar(30) CHARACTER SET latin1 NOT NULL,
  `keterangan` text CHARACTER SET latin1 NOT NULL,
  `leader` varchar(20) CHARACTER SET latin1 NOT NULL,
  `manager` varchar(20) CHARACTER SET latin1 NOT NULL,
  `spv` varchar(20) CHARACTER SET latin1 NOT NULL,
  `stt_izin` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ket_reject` text CHARACTER SET latin1 NOT NULL,
  `hrd_app` int(2) NOT NULL,
  `lead_app` int(2) NOT NULL,
  `spv_app` int(2) NOT NULL,
  `mng_app` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`no_izin`, `npp`, `tgl_pengajuan`, `tgl_mulai`, `tgl_selesai`, `durasi`, `tujuan`, `keterangan`, `leader`, `manager`, `spv`, `stt_izin`, `ket_reject`, `hrd_app`, `lead_app`, `spv_app`, `mng_app`) VALUES
('19062021163342', '19051999', '2021-06-19', '2021-06-19', '2021-06-21', 3, 'Perkebunan Kelapa Sawit', 'Survei Lapangan Untuk Meningka', '', '19052000', '19052001', 'Approved', '', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lembur`
--

CREATE TABLE `lembur` (
  `no_lembur` varchar(30) CHARACTER SET latin1 NOT NULL,
  `npp` varchar(30) CHARACTER SET latin1 NOT NULL,
  `tgl_pengajuan` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `durasi` int(11) NOT NULL,
  `keterangan` text CHARACTER SET latin1 NOT NULL,
  `leader` varchar(30) CHARACTER SET latin1 NOT NULL,
  `manager` varchar(30) CHARACTER SET latin1 NOT NULL,
  `spv` varchar(30) CHARACTER SET latin1 NOT NULL,
  `stt_lembur` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ket_reject` text CHARACTER SET latin1 NOT NULL,
  `hrd_app` int(2) NOT NULL,
  `lead_app` int(2) NOT NULL,
  `spv_app` int(2) NOT NULL,
  `mng_app` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lembur`
--

INSERT INTO `lembur` (`no_lembur`, `npp`, `tgl_pengajuan`, `jam_mulai`, `jam_selesai`, `durasi`, `keterangan`, `leader`, `manager`, `spv`, `stt_lembur`, `ket_reject`, `hrd_app`, `lead_app`, `spv_app`, `mng_app`) VALUES
('19062021163017', '19051999', '2021-06-19', '16:29:00', '17:29:00', 1, 'Mengerjakan Laporan Pendataan Barang', '', '19052000', '19052001', 'Approved', '', 1, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `latitude`, `longitude`) VALUES
(1, 'Jakarta', '-6.208760', '106.845599'),
(2, 'Makassar', '-5.147696', '119.432593'),
(3, 'Padang', '-0.947110', '100.414603'),
(4, 'Pontianak', '-0.027842', '109.344250'),
(5, 'Manokwari', '-0.861277', '134.062422'),
(6, 'Nabire', '-3.371565', '135.501464'),
(7, 'Yogyakarta', '-7.795766', '110.369866'),
(8, 'Bali', '-8.344295', '115.101547'),
(9, 'Palangkaraya', '-2.216392', '113.921577'),
(10, 'Palembang', '-2.976224', '104.773948');

-- --------------------------------------------------------

--
-- Table structure for table `tanggal`
--

CREATE TABLE `tanggal` (
  `id_tgl` int(10) NOT NULL,
  `nama_tgl` varchar(20) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id_bln`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`no_cuti`);

--
-- Indexes for table `data_absen`
--
ALTER TABLE `data_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `detail_pb`
--
ALTER TABLE `detail_pb`
  ADD PRIMARY KEY (`npp`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`npp`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hri`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`no_izin`);

--
-- Indexes for table `lembur`
--
ALTER TABLE `lembur`
  ADD PRIMARY KEY (`no_lembur`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanggal`
--
ALTER TABLE `tanggal`
  ADD PRIMARY KEY (`id_tgl`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_adm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id_bln` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id_cat` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_absen`
--
ALTER TABLE `data_absen`
  MODIFY `id_absen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hri` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tanggal`
--
ALTER TABLE `tanggal`
  MODIFY `id_tgl` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
