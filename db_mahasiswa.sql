-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 04:03 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Aktif'),
(2, 'Lulus'),
(3, 'Drop Out'),
(4, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `tb_fakultas`
--

CREATE TABLE `tb_fakultas` (
  `id` int(11) NOT NULL,
  `kode_fakultas` varchar(3) NOT NULL,
  `nama_fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_fakultas`
--

INSERT INTO `tb_fakultas` (`id`, `kode_fakultas`, `nama_fakultas`) VALUES
(1, 'A', 'FKIP'),
(2, 'B', 'FISIP'),
(3, 'C', 'FEB'),
(4, 'D', 'FH'),
(5, 'E', 'FAPERTA'),
(6, 'F', 'FATEK'),
(7, 'G', 'FMIPA'),
(8, 'L', 'FAHUT'),
(9, 'N', 'FK'),
(10, 'O', 'FAPETKAN'),
(11, 'P', 'FKM');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id` int(11) NOT NULL,
  `kode_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL,
  `fakultas_id` int(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id`, `kode_jurusan`, `nama_jurusan`, `fakultas_id`) VALUES
(1, 'A1', 'Pendidikan Bahasa', 1),
(2, 'A2', 'Pendidikan IPA', 1),
(3, 'A3', 'Pendidikan IPS', 1),
(4, 'A4', 'Pendidikan Guru', 1),
(5, 'A5', 'Bimbingan dan Konseling', 1),
(6, 'B1', 'Ilmu Administrasi Publik', 2),
(7, 'B2', 'Sosiologi', 2),
(8, 'B3', 'Antropologi', 2),
(9, 'B4', 'Ilmu Pemerintahan', 2),
(10, 'B5', 'Ilmu Komunikasi', 2),
(11, 'C1', 'Ekonomi dan Pembangunan', 3),
(12, 'C2', 'Manajemen Pemasaran', 3),
(13, 'C3', ' Akuntansi', 3),
(14, 'D1', 'Ilmu Hukum', 4),
(15, 'E2', 'Agroteknologi', 5),
(16, 'E3', 'Agribisnis', 5),
(17, 'F1', 'Teknik Sipil', 6),
(18, 'F2', 'Teknik Sipil', 6),
(19, 'F2', 'Arsitektur', 6),
(20, 'F3', 'Teknik Mesin', 6),
(21, 'F4', 'Teknik Elektro', 6),
(22, 'F5', 'TEKNIK INFORMATIKA', 6),
(23, 'G1', 'Fisika', 7),
(24, 'G2', 'Matematika', 7),
(25, 'G3', 'Kimia', 7),
(26, 'G4', 'Biologi', 7),
(27, 'G5', 'Statistika', 7),
(28, 'G7', 'Farmasi', 7),
(29, 'G8', 'Teknik Geofisika', 7),
(30, 'K2', 'Manajemen ( Kampus Kab. Morowali)', 3),
(31, 'K2', 'Agroteknologi(Kampus Kab. Morowali)', 5),
(32, 'K2', 'Teknik Sipil ( Kampus Kab. Morowali )', 6),
(33, 'K2', 'Manajemen Kampus Kab. Tojo Una-una', 3),
(34, 'K2', 'Agroteknologi Kampus Kab. Tojo Una-una', 5),
(35, 'K2', 'Teknik Sipil Kampus Kab. Tojo Una-una', 6),
(36, 'L1', 'Kehutanan', 8),
(37, 'N1', 'Kedokteran', 9),
(38, 'N1', 'Profesi Dokter', 9),
(39, 'N2', 'Keperawatan', 9),
(40, 'O1', 'Peternakan', 10),
(41, 'O2', 'Akuakultur', 10),
(42, 'P1', 'Kesehatan Masyarakat', 11),
(43, 'P2', 'Gizi', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id`, `kategori`, `nama_kegiatan`) VALUES
(1, 'INTERNATIONAL', ''),
(3, 'NASIONAL', ''),
(4, 'PROVINSI', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL,
  `prodi_id` int(11) DEFAULT NULL,
  `fakultas_id` int(5) DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `alamat`, `no_hp`, `jurusan_id`, `prodi_id`, `fakultas_id`, `status`) VALUES
(12, '5720109377', 'SLAMET DWI PUTRA', 'Tondo', '000', 22, 43, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id` int(11) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kegiatan_id` int(11) NOT NULL,
  `nama_kegiatan` varchar(120) NOT NULL,
  `jenis_pesert` varchar(10) NOT NULL,
  `peringkat` varchar(20) NOT NULL,
  `no_serti` varchar(40) NOT NULL,
  `no_sk` varchar(40) NOT NULL,
  `model_pelaksana` varchar(20) NOT NULL,
  `jml_negara` varchar(20) NOT NULL,
  `jml_pt` varchar(20) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `sertifikat` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `surat_tugas` varchar(255) NOT NULL,
  `nip` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_prestasi`
--

INSERT INTO `tb_prestasi` (`id`, `nim`, `kegiatan_id`, `nama_kegiatan`, `jenis_pesert`, `peringkat`, `no_serti`, `no_sk`, `model_pelaksana`, `jml_negara`, `jml_pt`, `tgl_mulai`, `tgl_selesai`, `sertifikat`, `link`, `foto`, `surat_tugas`, `nip`) VALUES
(4, '5720109377', 4, 'LKMM', 'indi', 'Juara 1', '111', '111', 'daring', '>= 5 Negara', '>=10 pt', '2025-06-10', '2025-07-20', 'file_1742052900.pdf', 'file_17420529001.jpg', 'file_1742052900.jpg', 'file_1742074665.pdf', '23232'),
(7, '5720109377', 4, 'LKMM', 'individu', 'j', 'kl', 'lkl', 'luring', '>= 5 Negara', '>=10 pt', '2025-12-31', '2025-12-31', 'file_1742147193.pdf', 'file_1742147193.jpg', 'file_1742147193.png', 'file_17421471931.pdf', 'kjjk'),
(8, '5720109377', 4, 'LKMM', 'individu', 'kjk', 'jkjk', 'kjk', 'daring', '>= 5 Negara', '>=10 pt', '2025-12-31', '2025-12-31', 'file_1742144299.pdf', 'file_17421442991.jpg', 'file_1742144299.jpg', 'file_17421442991.pdf', 'lkjlk'),
(9, '5720109377', 3, 'oiuoiu', 'individu', ',MM', ',M', 'MLKLJ', 'daring', '>= 5 Negara', '>=10 pt', '2025-12-31', '2025-12-31', '1742145781_2025-02-20-Surat_Tugas_LKMM.pdf', '1742145781_IMG-20250223-WA0079.jpg', '1742145781_WhatsApp_Image_2025-02-26_at_09_24_26_56c1be52.jpg', '1742145781_Monitoring_Potongan_SPM_(Satker_Pembayar)_(144_000_000).pdf', 'IUIO');

-- --------------------------------------------------------

--
-- Table structure for table `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id` int(11) NOT NULL,
  `kode_prodi` varchar(50) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `jurusan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tb_prodi`
--

INSERT INTO `tb_prodi` (`id`, `kode_prodi`, `nama_prodi`, `jurusan_id`) VALUES
(1, 'A111', 'Pendidikan Bahasa dan Sastra Indonesia', 1),
(2, 'A121', 'Pendidikan Bahasa Inggris', 1),
(3, 'A221', 'Pendidikan Biologi', 2),
(4, 'A231', 'Pendidikan Matematika', 2),
(5, 'A241', 'Pendidikan Fisika', 2),
(6, 'A251', 'Pendidikan Kimia', 2),
(7, 'A311', 'Pendidikan Sejarah', 3),
(8, 'A321', 'Pendidikan Pancasila & Kewarganegaraan', 3),
(9, 'A351', 'Pendidikan Geografi', 3),
(10, 'A401', 'Pendidikan Guru Sekolah Dasar', 4),
(11, 'A411', 'Pendidikan Guru Pendidikan Anak Usia Dini', 4),
(12, 'A421', 'Pendidikan Jasmani, Kesehatan dan Rekreasi', 4),
(13, 'A501', 'Bimbingan dan Konseling', 5),
(14, 'B101', 'Ilmu Administrasi Publik', 6),
(15, 'B201', 'Sosiologi', 7),
(16, 'B301', 'Antropologi', 8),
(17, 'B401', 'Ilmu Pemerintahan', 9),
(18, 'B501', 'Ilmu Komunikasi', 10),
(19, 'C101', 'Ekonomi dan Pembangunan', 11),
(20, 'C200', 'Manajemen Pemasaran', 12),
(21, 'C201', 'Manajemen', 12),
(22, 'C205', 'Manajemen Kampus Kab. Tojo Una-una', 12),
(23, 'C300', 'Akuntansi', 13),
(24, 'C301', ' Akuntansi', 13),
(25, 'C304', 'Akuntansi Sektor Publik', 13),
(26, 'D101', 'Ilmu Hukum', 14),
(27, 'E271', 'Budidaya Perairan', 15),
(28, 'E281', 'Agroteknologi', 15),
(29, 'E321', 'Agribisnis', 16),
(30, 'F111', 'Teknik Sipil', 17),
(31, 'F121', 'Teknik Geologi', 17),
(32, 'F131', 'Teknik Lingkungan', 17),
(33, 'F191', 'Teknik Sipil Kampus Kab. Tojo Una-una', 17),
(34, 'F210', 'D3 Teknik Sipil', 17),
(35, 'F221', 'Arsitektur', 19),
(36, 'F230', 'D3 Teknik Listrik', 19),
(37, 'F231', 'Perencanaan Wilayah dan Kota', 19),
(38, 'F240', 'D3 Teknik Mesin', 19),
(39, 'F331', 'Teknik Mesin', 20),
(40, 'F334', 'Teknologi Rekayasa Manufaktur', 20),
(41, 'F441', 'Teknik Elektro', 21),
(42, 'F444', 'Teknologi Rekayasa Instalasi Listrik', 21),
(43, 'F521', 'Sistem Informasi', 22),
(44, 'F551', 'TEKNIK INFORMATIKA', 22),
(45, 'G101', 'Fisika', 23),
(46, 'G201', 'Matematika', 24),
(47, 'G301', 'Kimia', 25),
(48, 'G401', 'Biologi', 26),
(49, 'G501', 'Statistika', 27),
(50, 'G701', 'Farmasi', 28),
(51, 'G811', 'Teknik Geofisika', 23),
(52, 'K2MC201', 'Manajemen ( Kampus Kab. Morowali)', 30),
(53, 'K2ME281', 'Agroteknologi(Kampus Kab. Morowali)', 31),
(54, 'K2MF111', 'Teknik Sipil ( Kampus Kab. Morowali )', 32),
(55, 'K2TC201', 'Manajemen Kampus Kab. Tojo Una-una', 33),
(56, 'K2TE281', 'Agroteknologi Kampus Kab. Tojo Una-una', 34),
(57, 'K2TF111', 'Teknik Sipil Kampus Kab. Tojo Una-una', 35),
(58, 'L131', 'Kehutanan', 36),
(59, 'N101', 'Kedokteran', 37),
(60, 'N111', 'Profesi Dokter', 37),
(61, 'N210', 'Keperawatan', 39),
(62, 'O121', 'Peternakan', 40),
(63, 'O271', 'Akuakultur', 41),
(64, 'P101', 'Kesehatan Masyarakat', 42),
(65, 'P201', 'Kesehatan Masyarakat', 42),
(66, 'P211', 'Gizi', 43);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jurusan_mahasiswa` (`jurusan_id`),
  ADD KEY `fk_prodi_mahasiswa` (`prodi_id`);

--
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jurusan_prodi` (`jurusan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_fakultas`
--
ALTER TABLE `tb_fakultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD CONSTRAINT `fk_jurusan_mahasiswa` FOREIGN KEY (`jurusan_id`) REFERENCES `tb_jurusan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_prodi_mahasiswa` FOREIGN KEY (`prodi_id`) REFERENCES `tb_prodi` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD CONSTRAINT `fk_jurusan_prodi` FOREIGN KEY (`jurusan_id`) REFERENCES `tb_jurusan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
