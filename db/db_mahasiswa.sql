-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2025 at 04:59 AM
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
-- Table structure for table `tb_bem`
--

CREATE TABLE `tb_bem` (
  `nim` varchar(20) NOT NULL,
  `jabatan` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bem`
--

INSERT INTO `tb_bem` (`nim`, `jabatan`, `foto`) VALUES
('P21124059', 'kjkj', '1744355562_about-img.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `tgl` date NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `keterangan`, `tag`, `tgl`, `foto`) VALUES
(4, '', '', '0000-00-00', '[\"1744660384_0_WhatsApp_Image_2025-03-18_at_12_46_24_5ecc19c6.jpg\"]');

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
  `password` varchar(255) NOT NULL,
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

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `password`, `alamat`, `no_hp`, `jurusan_id`, `prodi_id`, `fakultas_id`, `status`) VALUES
(1, 'A23124080', 'Aril Thandy Angka', '', 'null', '82189108366', 2, 4, 1, 1),
(2, 'A23124124', 'Wina Safira', '', 'null', '85337179018', 2, 2, 1, 1),
(3, 'A23124145', 'Kaytatsa Sera Angellie', '', 'null', '82291918551', 2, 2, 1, 1),
(4, 'A31124074', 'Rizki Dwi Afaniar', '', 'null', '82214518066', 3, 2, 1, 1),
(5, 'A40124192', 'Muhammad Rafly Aprianto', '', 'null', '82290511057', 4, 2, 1, 1),
(6, 'A40124195', 'Elfina', '', 'null', '82293049058', 4, 2, 1, 1),
(7, 'A41124103', 'Salsabila', '', 'null', '83832817780', 4, 2, 1, 1),
(8, 'A42124071', 'Moh. Agus Yuzan Riadi', '', 'null', '85314215906', 4, 2, 1, 1),
(9, 'A50124089', 'Sulaiman', '', 'null', '85823164490', 5, 2, 1, 1),
(10, 'B10124059', 'Monica Alexandria Ndede', '', 'null', '82296694871', 6, 2, 2, 1),
(11, 'B10124092', 'Ahmad Fauzan', '', 'null', '85319180131', 6, 2, 2, 1),
(12, 'B20124069', 'Aldo', '', 'null', '82297405210', 7, 2, 2, 1),
(13, 'B30124013', 'Dwi Zazkia', '', 'null', '83852314505', 8, 2, 2, 1),
(14, 'B30124022', 'Agisapitri', '', 'null', '85210145114', 8, 2, 2, 1),
(15, 'B30124085', 'Dappe Panca Putra', '', 'null', '85796982336', 8, 2, 2, 1),
(16, 'B40124006', 'Prayogi Potaka ', '', 'null', '85216017692', 9, 2, 2, 1),
(17, 'B40124110', 'rajab hidayat', '', 'null', '85604061061', 9, 2, 2, 1),
(18, 'B50124038', 'Najwa Zahiyah Amanda Putri ', '', 'null', '85342821766', 10, 2, 2, 1),
(19, 'C10124009', 'Lutvia Mahda', '', 'null', '81345244220', 11, 2, 3, 1),
(20, 'C10124104', 'Nurul Fatima Khairunnisa ', '', 'null', '81997547828', 11, 2, 3, 1),
(21, 'C20124114', 'Angga ', '', 'null', '81245158215', 12, 2, 3, 1),
(22, 'C20124174', 'Farhan Ramdani', '', 'null', '85141362870', 12, 2, 3, 1),
(23, 'C30124067', 'Rifka Fadila', '', 'null', '83111131543', 13, 2, 3, 1),
(24, 'C30124125', 'Okto Genarius Basilea Wu\'On ', '', 'null', '81347542924', 13, 2, 3, 1),
(25, 'C30124138', 'Dendra Krisna Juniarta', '', 'null', '81216660350', 13, 2, 3, 1),
(26, 'C30424064', 'Ariny Nurhidaya Syam', '', 'null', '82348265923', 13, 2, 3, 1),
(27, 'C30424072', 'Abdullah Hasan Amudi ', '', 'null', '83870246688', 13, 2, 3, 1),
(28, 'D10122211', 'Putri Firdasari Rachmad', '', 'null', '0', 14, 2, 4, 1),
(29, 'D10124150 ', 'Muhammad Adryan Rohim', '', 'null', '0', 14, 2, 4, 1),
(30, 'D10124162', 'Abd Gafur ', '', 'null', '0', 14, 2, 4, 1),
(31, 'D10124192', 'Syahrulhidayah ', '', 'null', '8,95371E+11', 14, 2, 4, 1),
(32, 'D10124210', 'Asti Reski Amalia ', '', 'null', '0', 14, 2, 4, 1),
(33, 'D10124227 ', 'Fadila Mooduto', '', 'null', '82259139542', 14, 2, 4, 1),
(34, 'D10124247', 'Atna Hairul Atia', '', 'null', '82272126326', 14, 2, 4, 1),
(35, 'D10124271', 'Arif ', '', 'null', '82299058578', 14, 2, 4, 1),
(36, 'D10124307', 'Moh. Gifari Madja ', '', 'null', '83152921279', 14, 2, 4, 1),
(37, 'D10124426', 'Wilbert Anugrah Sampeliling ', '', 'null', '85824276001', 14, 2, 4, 1),
(38, 'D10124487', 'Munawwarah ', '', 'null', '85756975897', 14, 2, 4, 1),
(39, 'D10124509', 'Sutan Rasya Reksadimedjo ', '', 'null', '85825219476', 14, 2, 4, 1),
(40, 'D10124535', 'Arwendi Sahay ', '', 'null', '82213084557', 14, 2, 4, 1),
(41, 'E28121020', 'Faohesa Lagahu', '', 'null', '82291567483', 15, 2, 5, 1),
(42, 'E28121194', 'Moh. Fajar', '', 'null', '81215118913', 15, 2, 5, 1),
(43, 'E28124026', 'Adelia', '', 'null', '0', 15, 2, 5, 1),
(44, 'E28124036', 'Saddang Hidayah', '', 'null', '0', 15, 2, 5, 1),
(45, 'E28124045', 'Muh Haikal', '', 'null', '0', 15, 2, 5, 1),
(46, 'E28124064', 'Safriansa', '', 'null', '0', 15, 2, 5, 1),
(47, 'E28124161', 'Widya Ym', '', 'null', '0', 15, 2, 5, 1),
(48, 'E32124030', 'Aristi Windi Ayu Lapangga', '', 'null', '0', 16, 2, 5, 1),
(49, 'E32124085', 'Alvian', '', 'null', '0', 16, 2, 5, 1),
(50, 'E32124088', 'Habiba', '', 'null', '0', 16, 2, 5, 1),
(51, 'E32124091', 'Ni Komang Sutiari', '', 'null', '0', 16, 2, 5, 1),
(52, 'E32124092', 'Indri Aktavian', '', 'null', '0', 16, 2, 5, 1),
(53, 'E32124094', 'Kristina Isabel Lungan', '', 'null', '0', 16, 2, 5, 1),
(54, 'F11124143 ', 'Andi Batara', '', 'null', '0', 17, 2, 6, 1),
(55, 'F12124060', 'Muh. Fajar M.G. ', '', 'null', '0', 17, 2, 6, 1),
(56, 'F13124099', 'Moh. Arifat Labinta ', '', 'null', '0', 17, 2, 6, 1),
(57, 'F22124065', 'Muh. Abdillah ', '', 'null', '0', 18, 2, 6, 1),
(58, 'F23124092 ', 'Siti Mutiya Rachma Ali Baba ', '', 'null', '0', 18, 2, 6, 1),
(59, 'F33124033 ', 'Siti Nur Aulia ', '', 'null', '0', 19, 2, 6, 1),
(60, 'F44124022', 'Kevin Leo M', '', 'null', '0', 21, 2, 6, 1),
(61, 'F52124029 ', 'Nabil Mujahid Raja', '', 'null', '0', 22, 2, 6, 1),
(62, 'F52124050', 'Muh. Ikram ', '', 'null', '0', 22, 2, 6, 1),
(63, 'G10124003', 'Natia Aeni', '', 'null', '0', 23, 2, 7, 1),
(64, 'G10124003', 'Moh Fathir', '', 'null', '0', 23, 2, 7, 1),
(65, 'G20124006', 'Nurdiana', '', 'null', '82259694208', 24, 2, 7, 1),
(66, 'G20124008', 'Mutia', '', 'null', '83134086956', 24, 2, 7, 1),
(67, 'G50124005', 'Diah Estuning Wilujeng', '', 'null', '82291797266', 27, 2, 7, 1),
(68, 'G50124018', 'Annisa Denta Revita', '', 'null', '82288121325', 27, 2, 7, 1),
(69, 'G70124048', 'Nyoman Ayu Devana A. P', '', 'null', '82271615389', 28, 2, 7, 1),
(70, 'G70124073', 'Janri Pratama N. Samaya', '', 'null', '82259033979', 28, 2, 7, 1),
(71, 'G81124010', 'Fahriansyah Albar', '', 'null', '87756007762', 29, 2, 7, 1),
(72, 'L13124061', 'Lusiana', '', 'null', '82259113645', 26, 2, 8, 1),
(73, 'L13124063', 'Fauzan Pratama Putra ', '', 'null', '85932602945', 26, 2, 8, 1),
(74, 'L13124095', 'Andi Moh Rassya Huzaifi', '', 'null', '0', 26, 2, 8, 1),
(75, 'L13124096', 'Aswinda', '', 'null', '0', 26, 2, 8, 1),
(76, 'L13124113', 'Saipul Pahri', '', 'null', '0', 26, 2, 8, 1),
(77, 'L13124117', 'Fani Yurika Pratiwi', '', 'null', '0', 26, 2, 8, 1),
(78, 'L13124128', 'Moh Rafli Adhyaksa', '', 'null', '0', 26, 2, 8, 1),
(79, 'L13124161', 'Mohamad Avril ', '', 'null', '0', 26, 2, 8, 1),
(80, 'L13124170', 'M. Radja Faruq Haq ', '', 'null', '0', 26, 2, 8, 1),
(81, 'L13124261', 'Muh. Ikfal', '', 'null', '0', 26, 2, 8, 1),
(82, 'L13124265', 'Ayekson Yesriel', '', 'null', '0', 26, 2, 8, 1),
(83, 'N10124033', 'Yudhistira M. Pahlevi', '', 'null', '0', 37, 2, 9, 1),
(84, 'N10124061', 'Ahmad Fathin', '', 'null', '0', 37, 2, 9, 1),
(85, 'N10124063', 'Muh. Fadhil Nur Khayat', '', 'null', '0', 37, 2, 9, 1),
(86, 'N10124081', 'Rifai Nur Rahmat', '', 'null', '8,22253E+11', 37, 2, 9, 1),
(87, 'N10124094', 'Gusryadi', '', 'null', '89515572354', 37, 2, 9, 1),
(88, 'N10124129', 'Faturrohman Alfatih', '', 'null', '82195045209', 37, 2, 9, 1),
(89, 'N10124130', 'Gading ?Zaky Alwahabi', '', 'null', '82346731013', 37, 2, 9, 1),
(90, 'O12124004', 'Dwi Ramadani Pratiwi', '', 'null', '82349719075', 40, 2, 10, 1),
(91, 'O12124110', 'Fatimah Zahra', '', 'null', '85236527135', 40, 2, 10, 1),
(92, 'O13124042', 'Mikdol', '', 'null', '82271601257', 40, 2, 10, 1),
(93, 'O13124075', 'Afif', '', 'null', '82193361625', 40, 2, 10, 1),
(94, 'O27124027', 'Abiel Musofah', '', 'null', '85938388817', 41, 2, 10, 1),
(95, 'O27124083', 'Eva Indawati', '', 'null', '85796617198', 41, 2, 10, 1),
(96, 'O27124096', 'Andi Eppil Saputra', '', 'null', '82298871910', 41, 63, 10, 1),
(97, 'O28124038', 'Virgiawan Listanto', '', 'null', '81248484103', 41, 68, 10, 1),
(98, 'O28124040', 'Raodhatul Jannah', '', 'null', '82249466391', 41, 68, 10, 1),
(99, 'O29124008', 'Fitra Harry Utama', '', 'null', '85656617548', 41, 67, 10, 1),
(100, 'P10122181', 'Nur Asikin M. Ahmad', '', 'null', '81240106688', 42, 64, 11, 1),
(101, 'P10122211', 'Desi Dwi Delasari', '', 'null', '82328764606', 42, 64, 11, 1),
(102, 'P10124004', 'Najwa Faradhillah Haj', '', 'null', '0', 42, 64, 11, 1),
(103, 'P10124027', 'Intan Wahyuni Pratiwi', '', 'null', '0', 42, 64, 11, 1),
(104, 'P10124111', 'Sintia Nur Ramadhani Panende', '', 'null', '0', 42, 64, 11, 1),
(105, 'P10124116', 'Nadia Tau', '', 'null', '0', 42, 64, 11, 1),
(106, 'P10124126', 'Humairah', '', 'null', '0', 42, 64, 11, 1),
(107, 'P10124211', 'Aulia Khumairah', '', 'null', '0', 42, 64, 11, 1),
(108, 'P10124221', '?Khaerani', '', 'null', '0', 42, 64, 11, 1),
(109, 'P10124241', 'Moh. Abid T. Akase', '', 'null', '0', 42, 64, 11, 1),
(110, 'P10124245', 'Dewi Rahmawati Rumoning ', '', 'null', '0', 42, 64, 11, 1),
(111, 'P21124059', 'Putra Dekrisye Iroth', '$2y$10$4vy8WwDnwKBtNwPutReqcu3wsEmKH./6ptu3QM7ztIVYFJhHIZKF6', 'null', '0', 43, 66, 11, 1);

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
(20, 'P10124245', 4, 'lkmm', 'individu', '1', 'uiuiui', 'oioio', 'luring', 'Null', '< 10 pt', '2025-04-15', '2025-04-16', '1744658554_formulir_pengukuhan.pdf', '1744658554_WhatsApp_Image_2025-03-18_at_12_46_24_febdfdb3.jpg', '1744658554_WhatsApp_Image_2025-03-18_at_12_46_24_5ecc19c6.jpg', '1744658554_SK_AHU.pdf', 'oioipo');

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
(66, 'P211', 'Gizi', 43),
(67, 'O291', 'Ilmu Kelautan', 41),
(68, 'O281', 'Sumber daya akuatik', 41);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '2025-03-26 03:12:22'),
(2, 'admin123', '$2y$10$YocjKE2921fqsrceX66J3uy78RcEGVC0t/OHtKwFrccXP/gNBvMJS', '1', '2025-03-26 03:12:22'),
(3, 'yakuza', '$2y$10$kMCzcYjZ1amSBGx1pJOByubsBVN1Z24Hv6TCvaougBV9cHBjvUgPK', '2', '2025-03-26 13:08:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bem`
--
ALTER TABLE `tb_bem`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
