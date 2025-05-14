-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 07:18 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistem_informasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `bk`
--

CREATE TABLE `bk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_bahan_kajian` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk`
--

INSERT INTO `bk` (`id`, `kode`, `nama_bahan_kajian`, `deskripsi`, `created_at`, `updated_at`) VALUES
(11, 'BK-01', 'Fundamental Sistem Informasi', 'kemampuan untuk memahami dasar konsep Sistem Informasi (termasuk perangkat keras, perangkat lunak, dan akuisisi informasi), dukungan yang menyediakan proses bisnis transaksional, keputusan, serta kolaboratif. Kemampuan memahami pengumpulan, pemrosesan, penyimpanan, distribusi, dan nilai informasi dan dapat membuat rekomendasi mengenai Sistem Informasi yang mendukung dan memungkinkan individu dalam kesehariannya hidup, manajemen, pelanggan, dan pemasok perusahaan. Kompetensi ini mencakup kemampuan untuk melakukan analisis bisnis organisasi, dan menilai proses, dan sistem.', '2024-05-25 09:21:43', '2024-05-25 09:21:43'),
(12, 'BK-02', 'Data', 'Kemampuan berfokus kepada manajemen data dalam organisasi untuk mendukung proses bisnis inti organisasi dan membentuk dasar untuk aplikasi bisnis dengan cara mengumpulkan, mengatur, mengkurasi, dan memproses data untuk membantu menjalankan organisasi atau mengekstrak informasi yang dapat ditindaklanjuti untuk meningkatkan efektivitas Kompetensi ini mencakup satu bidang yang diperlukan (Manajemen Data dan Informasi) dan dua bidang pilihan (Analisis Data dan Bisnis; Visualisasi Data dan Informasi).', '2024-05-25 09:22:08', '2024-05-25 09:22:08'),
(13, 'BK-03', 'Teknologi', 'Kemampuan berfokus kepada aset Teknologi Informasi dalam organisasi, infrastruktur dan arsitekturnya untuk data, infrastruktur teknologi dan keamanan informasi, komunikasi, dan aplikasi.', '2024-05-25 09:22:22', '2024-05-25 09:22:22'),
(14, 'BK-04', 'PENGEMBANGAN', 'Kemampuan berfokus di area Pengembangan telah melibatkan aspek aplikasi atau sistem siklus hidup perkembangan. Kompetensi pengembangan sistem terdiri Analisis dan Desain Sistem; Pengembangan dan Pemrograman Aplikasi) dan empat area pilihan (Object Orientation, Web Programming, Mobile Programming, and User Interface Design).', '2024-05-25 09:22:43', '2024-05-25 09:22:43'),
(15, 'BK-05', 'organisasi', 'eknik, kegunaan dan dampaknya bagi masyarakat', '2024-05-30 00:46:07', '2024-05-30 04:22:33'),
(16, 'BK-06', 'integrasi', 'integrasi sistem manajemen projek dan integrasi sistem praktikum', '2024-05-30 00:46:27', '2024-05-30 04:23:46');

-- --------------------------------------------------------

--
-- Table structure for table `bk_mk`
--

CREATE TABLE `bk_mk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bk_id` bigint(20) UNSIGNED NOT NULL,
  `mk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk_mk`
--

INSERT INTO `bk_mk` (`id`, `bk_id`, `mk_id`, `created_at`, `updated_at`) VALUES
(1, 12, 156, NULL, NULL),
(2, 12, 158, NULL, NULL),
(3, 12, 159, NULL, NULL),
(4, 13, 157, NULL, NULL),
(5, 11, 160, NULL, NULL),
(6, 15, 160, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_penilaian`
--

CREATE TABLE `bobot_penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpl` varchar(255) NOT NULL,
  `mk` varchar(255) NOT NULL,
  `cpmk` varchar(255) NOT NULL,
  `mbkm` varchar(255) DEFAULT NULL,
  `partisipasi` int(11) DEFAULT NULL,
  `observasi` int(11) DEFAULT NULL,
  `untuk_kerja` int(11) DEFAULT NULL,
  `tes_tulis_UTS` int(11) DEFAULT NULL,
  `tes_tulis_UAS` int(11) DEFAULT NULL,
  `tes_lisan_Tugas_Kelompok` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpl`
--

CREATE TABLE `cpl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpl`
--

INSERT INTO `cpl` (`id`, `code`, `deskripsi`, `kategori`, `created_at`, `updated_at`) VALUES
(16, 'CPL-01', 'Memiliki sikap religius, cinta tanah air, taat hukum, dan menghargai keberagaman.', 'penciri utama', '2024-05-30 06:17:18', '2024-05-30 06:17:18'),
(17, 'CPL-02', 'Memiliki etika dan sikap profesional.', 'penciri utama', '2024-05-30 06:17:41', '2024-05-30 06:18:42'),
(18, 'CPL-03', 'Memiliki kemandirian untuk berwirausaha.', 'penciri utama', '2024-05-30 06:18:27', '2024-05-30 06:18:27'),
(19, 'CPL-04', 'Memiliki kemampuan konsep dasar Sistem Informasi dan Teknologi Informasi.', 'penciri utama', '2024-05-30 06:18:52', '2024-05-30 06:18:52'),
(20, 'CPL-05', 'Memiliki kemampuan melakukan identifikasi masalah dan analisis sistem informasi.', 'penciri utama', '2024-05-30 06:18:59', '2024-05-30 06:18:59'),
(21, 'CPL-06', 'Memiliki kemampuan untuk menentukan solusi permasalahan sistem informasi.', 'penciri utama', '2024-05-30 06:19:09', '2024-05-30 06:19:09'),
(22, 'CPL-07', 'Memiliki kompetensi dan kualifikasi di bidang Sistem Informasi.', 'penciri utama', '2024-05-30 06:19:19', '2024-05-30 06:19:19'),
(23, 'CPL-08', 'Memiliki kemampuan berpikir kritis, sistematis, dan inovatif untuk menghasilkan solusi sistem informasi.', 'penciri utama', '2024-05-30 06:19:26', '2024-05-30 06:19:26'),
(24, 'CPL-09', 'Memiliki kemampuan untuk menentukan solusi permasalahan sistem informasi.', 'penciri utama', '2024-05-30 06:19:54', '2024-05-30 06:19:54'),
(25, 'CPL-10', 'Memiliki kemampuan pengambilan keputusan dan kerjasama dalam tim', 'penciri utama', '2024-05-30 06:27:36', '2024-05-30 06:27:36'),
(26, 'CPL-11', 'Memiliki kemampuan melakukan komunikasi secara lisan dan tertulis, serta mampu mempresentasikan hasil pemikiran.', 'penciri utama', '2024-05-30 06:27:51', '2024-05-30 06:27:51'),
(27, 'CPL-12', 'Mampu merancang solusi sistem informasi berbasis Teknologi Informasi untuk memecahkan permasalahan di industri.', 'penciri utama', '2024-05-30 06:41:13', '2024-05-30 06:41:13'),
(28, 'CPL-13', 'Mampu mengimplementasikan wawasan keilmuan dan melibatkan diri dalam proses belajar terus-menerus sepanjang hidup di bidang sistem informasi manufaktur', 'penciri utama', '2024-05-30 06:41:36', '2024-05-30 06:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `cpl_bk`
--

CREATE TABLE `cpl_bk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpl_id` bigint(20) UNSIGNED NOT NULL,
  `bk_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpl_bk`
--

INSERT INTO `cpl_bk` (`id`, `cpl_id`, `bk_id`) VALUES
(1, 16, 11);

-- --------------------------------------------------------

--
-- Table structure for table `cpl_bk_mk`
--

CREATE TABLE `cpl_bk_mk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpl_id` bigint(20) UNSIGNED NOT NULL,
  `bk_id` bigint(20) UNSIGNED NOT NULL,
  `mk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpl_bk_mk`
--

INSERT INTO `cpl_bk_mk` (`id`, `cpl_id`, `bk_id`, `mk_id`, `created_at`, `updated_at`) VALUES
(1, 16, 11, 165, '2024-08-22 04:28:36', '2024-08-22 04:28:36'),
(2, 17, 12, 166, '2024-08-22 04:28:36', '2024-08-22 04:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `cpl_mk`
--

CREATE TABLE `cpl_mk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpl_id` bigint(20) UNSIGNED NOT NULL,
  `mk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpl_mk`
--

INSERT INTO `cpl_mk` (`id`, `cpl_id`, `mk_id`, `created_at`, `updated_at`) VALUES
(1, 18, 156, NULL, NULL),
(2, 17, 157, NULL, NULL),
(3, 19, 158, NULL, NULL),
(4, 19, 266, NULL, NULL),
(5, 16, 159, NULL, NULL),
(6, 16, 160, NULL, NULL),
(7, 16, 162, NULL, NULL),
(8, 16, 269, NULL, NULL),
(9, 21, 159, NULL, NULL),
(10, 22, 227, NULL, NULL),
(11, 26, 229, NULL, NULL),
(12, 24, 268, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpmk`
--

CREATE TABLE `cpmk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cpl_id` bigint(20) UNSIGNED NOT NULL,
  `mk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_status` varchar(255) DEFAULT NULL,
  `validation_note` text DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpmk`
--

INSERT INTO `cpmk` (`id`, `code`, `description`, `cpl_id`, `mk_id`, `created_at`, `updated_at`, `validation_status`, `validation_note`, `tahun_ajaran`, `semester`) VALUES
(46, 'cpmk00001', 'deskripsi', 16, 156, '2024-08-13 06:07:17', '2025-01-20 21:59:29', 'ubah', 'OK', '2023/2024', 'ganjil'),
(53, 'cpmk001111', '1231', 16, 266, '2025-01-20 22:01:36', '2025-01-20 22:02:34', 'revisi', 'TEST1', '2024/2025', 'genap'),
(54, 'cpmk0011', 'hhhh', 16, 162, '2025-01-20 22:47:00', '2025-01-20 22:47:00', 'sedang diproses', NULL, '2024/2025', 'ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `matrix_cpl_pl`
--

CREATE TABLE `matrix_cpl_pl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cpl_id` bigint(20) UNSIGNED NOT NULL,
  `pl_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matrix_cpl_pl`
--

INSERT INTO `matrix_cpl_pl` (`id`, `cpl_id`, `pl_id`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(2, 16, 2, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(3, 16, 12, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(4, 17, 2, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(5, 18, 3, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(6, 19, 2, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(7, 21, 1, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(8, 21, 2, '2024-08-22 03:54:08', '2024-08-22 03:54:08'),
(9, 21, 3, '2024-08-22 03:54:08', '2024-08-22 03:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2024_04_30_144621_create_permission_tables', 2),
(13, '2014_10_12_000000_create_users_table', 3),
(14, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(15, '2014_10_12_100000_create_password_resets_table', 3),
(16, '2019_08_19_000000_create_failed_jobs_table', 3),
(17, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(18, '2024_05_07_084626_create_cpl_table', 4),
(19, '2024_05_19_014535_create_cpl_table', 5),
(20, '2024_05_18_235339_create_pl_table', 6),
(21, '2024_05_18_235336_create_bk_table', 7),
(22, '2024_05_18_133139_create_matrix_cpl_pl', 8),
(23, '2024_05_19_152352_create_bk_table', 9),
(24, '2024_05_19_152719_create_bk_table', 10),
(25, '2024_05_20_012310_create_matrix_cpl_pl_table', 11),
(26, '2024_05_20_103143_create_bk_mk_table', 12),
(27, '2024_05_21_132436_create_cpl_mk_table', 13),
(28, '2024_05_22_095652_create_cpl_bk_mk_table', 14),
(29, '2024_05_22_125304_create_cpl_bk_mk_table', 15),
(30, '2024_05_22_143743_create_cpl_bk_mk_table', 16),
(31, '2024_05_22_220333_create_cpl_bk_mk_table', 17),
(32, '2024_05_23_033656_create_omk_transactions_table', 18),
(33, '2024_05_23_041214_create_omk_transactions_table', 19),
(34, '2024_05_23_111829_create_omk_transactions_table', 20),
(35, '2024_05_23_122358_create_mk_table', 21),
(36, '2024_05_26_040747_create_cpl_cpmk_mk_table', 22),
(37, '2024_05_26_041247_create_cpl_cpmk_mk_table', 23),
(38, '2024_05_26_120020_create_cpmk_table', 24),
(39, '2024_05_26_124016_create_cpmk_table', 25),
(40, '2024_05_26_130354_create_cpmk_table', 26),
(41, '2024_05_30_122721_add_profesi_to_cpl', 27),
(42, '2024_06_01_004319_create_sub_cpmk_table', 28),
(43, '2024_06_01_012744_create_dashboard_data_table', 29),
(44, '2024_06_01_092200_create_posts_table', 30),
(45, '2024_06_02_003043_create_sub_cpmk_table', 31),
(46, '2024_06_10_052657_update_parent_id_nullable_in_mk_table', 32),
(47, '2024_06_10_080055_add_default_to_kode_column_in_mk_table', 33),
(48, '2024_07_08_010824_add_validation_status_to_sub_cpmk_table', 34),
(49, '2024_07_08_025021_add_nama_to_sub_cpmk_table', 35),
(50, '2024_07_08_025502_add_name_to_sub_cpmk_table', 36),
(51, '2024_07_08_223201_add_relationships_to_subcpmk_table', 37),
(52, '2024_07_08_223633_add_relationship_to_subcpmk_and_transaksisubcpmk', 38),
(53, '2024_07_09_011601_add_validation_fields_to_transaksi_subcpmk_table', 39),
(54, '2024_07_09_081658_modify_validation_status_in_sub_cpmk_table', 40),
(55, '2024_07_12_000138_add_tahun_ajaran_semester_to_subcpmk_table', 41),
(56, '2024_07_12_002427_add_semester_tahunajaran_to_subcpmk_table', 42),
(57, '2024_07_18_084006_add_nama_and_sumber_to_pl_table', 43),
(58, '2024_07_20_163209_add_validation_to_cpmk_table', 44),
(59, '2024_07_20_164952_add_tahun_ajaran_and_semester_to_cpmk_table', 45),
(60, '2024_07_20_220558_update_validation_status_in_cpmk_table', 46),
(61, '2024_08_07_112337_add_description_to_permissions_table', 47),
(62, '2024_09_07_034545_create_nilai_akhir_mk_table', 48),
(63, '2024_09_07_035922_create_rubrik_analitik_table', 49),
(64, '2024_09_07_040006_create_rubrik_holistik_table', 50),
(65, '2024_09_10_010551_create_rubrik_skala_presepsi_table', 51),
(66, '2024_09_10_014017_create_penilaian_table', 52),
(67, '2024_09_10_015012_create_rubrik_analitiks_table', 53),
(68, '2024_09_10_015041_create_rubrik_holistiks_table', 54),
(69, '2024_09_10_015106_create_rubrik_skala_presepsis_table', 55),
(70, '2024_09_10_015206_create_bobot_penilaian_table', 56),
(71, '2024_09_10_015323_create_nilai_akhir_mk_table', 57);

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE `mk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) NOT NULL DEFAULT 'MK-001',
  `nama` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mk`
--

INSERT INTO `mk` (`id`, `kode`, `nama`, `sks`, `semester`, `kategori`, `parent_id`, `created_at`, `updated_at`) VALUES
(156, '24120050', 'Matematika Sistem Informasi', 3, 'Semester 1', 'MK Wajib', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(157, '24120030', 'Algoritma & Struktur Data 1', 2, 'Semester 1', 'MK Wajib', NULL, '2024-06-10 09:12:28', '2024-08-02 03:23:41'),
(158, '24120070', 'Prak. Algoritma & Struktur Data', 1, 'Semester 1', 'MK Wajib', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(159, '24120060', 'Pengantar Teknologi Informasi', 2, 'Semester 1', 'MK Wajib', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(160, '24120010', 'Prak. Pengantar Teknologi Informasi', 1, 'Semester 1', 'MK Wajib', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(161, '24120040', 'Sistem Basis Data', 3, 'Semester 1', 'MK Wajib', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(162, '24120020', 'Bisnis dan Manajemen', 3, 'Semester 1', 'MK Wajib', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(163, '00110060', 'Bahasa Indonesia', 2, 'Semester 1', 'MK Wajib Umum', NULL, '2024-06-10 09:12:28', '2024-06-10 02:13:04'),
(165, '00110010', 'Pendidikan Agama Islam', 2, 'Semester 1', 'MK Wajib Umum', NULL, '2024-06-10 09:12:28', '2024-08-02 03:24:06'),
(166, '00110020', 'Pendidikan Agama Katholik', 2, 'Semester 1', 'MK Wajib Umum', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(167, '00110030', 'Pendidikan Agama Kristen Protestan', 2, 'Semester 1', 'MK Wajib Umum', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(168, '00110040', 'Pendidikan Agama Hindu', 2, 'Semester 1', 'MK Wajib Umum', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(169, '00110050', 'Pendidikan Agama Budha', 2, 'Semester 1', 'MK Wajib Umum', NULL, '2024-06-10 09:12:28', '2024-06-10 09:12:28'),
(180, '24220080', 'Konsep Sistem Informasi', 2, 'Semester 2', 'MK Wajib', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(181, '24220150', 'Logika dan Struktur Diskrit', 3, 'Semester 2', 'MK Wajib', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(182, '24220090', 'Perancangan Basis Data', 2, 'Semester 2', 'MK Wajib', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(183, '24220100', 'Prak. Perancangan Basis Data', 1, 'Semester 2', 'MK Wajib', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(184, '24240010', 'Pemrograman Berbasis Web', 2, 'Semester 2', 'MK Wajib', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(185, '24240020', 'Prak. Pemrograman Berbasis Web', 1, 'Semester 2', 'MK Wajib', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(186, '24220110', 'Analisa Sistem Informasi', 3, 'Semester 2', 'MK Wajib', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(187, '00210010', 'Pendidikan Pancasila', 2, 'Semester 2', 'MK Wajib Umum', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(189, '00210121', 'Pendidikan Kewarganegaraan', 2, 'Semester 2', 'MK Wajib Umum', NULL, '2024-06-11 01:07:41', '2024-06-11 01:07:41'),
(190, '24320171', 'Sistem Operasi', 3, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(191, '24320191', 'Dasar Akuntansi & Aplikasi', 2, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(192, '24320201', 'Prak. Aplikasi Akuntansi', 1, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(193, '20710010', 'Etika Rekayasa', 2, 'Semester 3', 'MK Wajib Umum', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(194, '24320211', 'Rekayasa Perangkat Lunak', 3, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(195, '24420241', 'Perancangan Sistem Informasi', 3, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(196, '24310030', 'Pemrograman Berbasis Objek', 2, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(197, '24310010', 'Prak. Pemrograman Berbasis Objek', 1, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(198, '24310040', 'Manajemen Proses Bisnis', 2, 'Semester 3', 'MK Wajib', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(199, '00110110', 'Bahasa Jepang I', 2, 'Semester 3', 'MK Wajib Umum', NULL, '2024-06-11 01:08:55', '2024-06-11 01:08:55'),
(210, '24420251', 'Sistem Informasi Manajemen', 3, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(211, '24410040', 'Statistik (Probabilitas)', 2, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(212, '24410050', 'Prak. Statistik (Probabilitas)', 1, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(213, '24420281', 'Jaringan Komputer', 2, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(214, '24420291', 'Prak. Jaringan Komputer', 1, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(215, '24420300', 'Pemrograman Berbasis Visual (dotnet)', 2, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(216, '24420310', 'Prak. Pemrograman Berbasis Visual (dotnet)', 1, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(217, '24540021', 'Manajemen Proyek SI', 3, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(218, '24410060', 'Interaksi Manusia dan Komputer', 3, 'Semester 4', 'MK Wajib', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(219, '00210071', 'Bahasa Jepang II', 2, 'Semester 4', 'MK Pilihan', NULL, '2024-06-11 01:14:27', '2024-06-11 01:14:27'),
(220, '00150010', 'Kewirausahaan', 2, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(221, '20440010', 'Metodologi Penelitian', 2, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(222, '00110080', 'Monozukuri', 2, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-08-02 03:38:24'),
(223, '24530031', 'Manajemen Sains', 2, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(224, '24540030', 'Kecerdasan Bisnis (OLAP)', 2, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(225, '24540040', 'Prak. Kecerdasan Bisnis (OLAP)', 1, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(226, '24620361', 'Rekayasa Kebutuhan SI', 3, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(227, '24520321', 'Pemrograman Berbasis Mobile', 2, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(228, '24520331', 'Prak. Pemograman Berbasis Mobile', 1, 'Semester 5', 'MK Wajib', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(229, '245xxxxx', 'Pilihan 1', 3, 'Semester 5', 'MK Pilihan', NULL, '2024-06-11 01:15:09', '2024-06-11 01:15:09'),
(262, '24620341', 'Data Mining', 2, 'Semester 6', 'MK Wajib', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(263, '24620351', 'Prak. Data Mining', 1, 'Semester 6', 'MK Wajib', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(264, '24720550', 'Sistem Pendukung Keputusan', 3, 'Semester 6', 'MK Wajib', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(265, '24640010', 'Testing dan Implementasi Sistem', 3, 'Semester 6', 'MK Wajib', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(266, '20610020', 'Interpersonal Skill', 2, 'Semester 6', 'MK Wajib', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(267, '24650019', 'Kerja Praktek', 2, 'Semester 6', 'MK Wajib', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(268, '02460002', 'Pilihan 2', 3, 'Semester 6', 'MK Pilihan', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(269, '02460003', 'Pilihan 3', 3, 'Semester 6', 'MK Pilihan', NULL, '2024-06-11 01:18:20', '2024-06-11 01:18:20'),
(283, '12313131', 'bahasa inggris', 1, 'Semester 1', 'MK Wajib', NULL, '2024-08-02 02:28:36', '2024-08-02 03:40:24'),
(284, 'mk-demo', 'pendidikan agama II', 1, 'Semester 1', 'MK Wajib', NULL, '2024-08-02 02:29:15', '2024-08-02 02:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(15, 'App\\Models\\Role', 12),
(15, 'App\\Models\\Role', 13),
(16, 'App\\Models\\Role', 12),
(17, 'App\\Models\\Role', 12),
(18, 'App\\Models\\Role', 12),
(19, 'App\\Models\\Role', 12),
(20, 'App\\Models\\Role', 12),
(21, 'App\\Models\\Role', 12),
(22, 'App\\Models\\Role', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 2),
(12, 'App\\Models\\User', 6),
(13, 'App\\Models\\User', 6),
(13, 'App\\Models\\User', 7),
(13, 'App\\Models\\User', 8),
(13, 'App\\Models\\User', 10);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rubrik_id` bigint(20) UNSIGNED NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `skor_min` int(11) NOT NULL,
  `skor_max` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir_mk`
--

CREATE TABLE `nilai_akhir_mk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mk` varchar(255) NOT NULL,
  `cpl` varchar(255) NOT NULL,
  `cpmk` varchar(255) NOT NULL,
  `skor` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rps_id` bigint(20) UNSIGNED NOT NULL,
  `clo` varchar(255) NOT NULL,
  `assessment_method` varchar(255) NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deskripsi`) VALUES
(15, 'pl.view', 'web', '2024-06-06 18:35:54', '2024-08-07 04:31:57', 'view untuk profile lulusan'),
(16, 'pl.edit', 'web', '2024-06-06 18:36:03', '2024-08-07 05:29:19', 'untuk profile lulusan edit'),
(17, 'pl.create', 'web', '2024-06-06 18:36:20', '2024-08-07 05:36:52', 'untuk menambah data profile lulusan'),
(18, 'pl.delet', 'web', '2024-06-06 18:36:31', '2024-08-07 05:37:06', 'menghapus data profile lulusan'),
(19, 'mk.create', 'web', '2024-06-06 18:36:39', '2024-08-08 02:37:14', 'membuat data mk'),
(20, 'mk.edit', 'web', '2024-06-06 18:36:47', '2024-08-12 07:07:31', 'merubah mata kuliah'),
(21, 'mk.read', 'web', '2024-06-06 18:37:34', '2024-08-12 07:10:35', 'untuk melihat tampilan mata kuliah'),
(22, 'mk.delete', 'web', '2024-06-06 18:37:51', '2024-08-12 07:10:55', 'menghapus mata kuliah'),
(24, 'admin.panel', 'web', '2024-06-06 22:56:56', '2024-08-12 07:11:56', 'menampilkan menu user'),
(25, 'menu_cpl-bk-pl.view', 'web', '2024-06-06 23:10:23', '2024-08-12 07:12:16', 'menu cpl bk pl'),
(26, 'mk.menu', 'web', '2024-06-06 23:11:28', '2024-08-07 05:21:35', 'menu mata kuliah'),
(27, 'omk.view', 'web', '2024-06-06 23:14:45', '2024-06-06 23:14:45', NULL),
(28, 'pemenuhan.view', 'web', '2024-06-06 23:15:18', '2024-06-06 23:15:18', NULL),
(29, 'pemetaan.menu', 'web', '2024-06-06 23:26:07', '2024-06-07 01:47:41', NULL),
(30, 'cpmk.menu', 'web', '2024-06-07 01:46:27', '2024-06-07 01:46:27', NULL),
(31, 'cplpl.edit', 'web', '2024-06-07 02:41:09', '2024-07-08 23:43:16', 'edit cplpl'),
(32, 'bkmk.edit', 'web', '2024-06-07 02:41:25', '2024-06-07 02:41:32', NULL),
(33, 'cplbk.edit', 'web', '2024-06-07 02:42:05', '2024-06-07 02:42:05', NULL),
(34, 'cplmk.edit', 'web', '2024-06-07 02:42:21', '2024-06-07 02:42:21', NULL),
(35, 'cplmkbk.edit', 'web', '2024-06-07 02:42:41', '2024-06-07 02:42:41', NULL),
(36, 'cpmk.edit', 'web', '2024-06-07 02:44:40', '2024-06-07 02:44:40', 'edit cpmk'),
(37, 'cpmk.create', 'web', '2024-06-07 02:46:09', '2024-06-07 02:46:09', 'create cpmk'),
(38, 'cpmk.delete', 'web', '2024-06-07 02:48:39', '2024-07-07 18:52:07', 'delete cpmk'),
(39, 'subcpmk.create', 'web', '2024-06-07 02:51:29', '2024-06-07 03:18:28', 'create subcpmk'),
(40, 'subcpmk.edit', 'web', '2024-06-07 03:19:34', '2024-07-08 23:43:25', 'edit subcpmk'),
(41, 'subcpmk.delete', 'web', '2024-06-07 03:20:08', '2024-07-07 19:07:45', 'delete subcpmk'),
(45, 'permission.view', 'web', '2024-06-10 17:02:15', '2024-06-10 17:02:15', 'view permission'),
(46, 'permission.edit', 'web', '2024-06-10 17:02:23', '2024-06-10 17:02:23', 'edit permission'),
(47, 'permission.create', 'web', '2024-06-10 17:02:31', '2024-06-10 17:02:31', 'create permission'),
(48, 'permission.delete', 'web', '2024-06-10 17:02:40', '2024-07-07 19:07:07', 'delete permission'),
(49, 'view.user', 'web', '2024-06-10 17:19:53', '2024-06-10 17:19:53', 'view user'),
(50, 'view.role', 'web', '2024-06-10 17:20:36', '2024-06-10 17:20:36', 'view role'),
(53, 'subcpmk.validate', 'web', '2024-07-07 18:12:53', '2024-07-07 18:12:53', 'validate subcpmk'),
(61, 'transaksisubcpmk.create', 'web', '2024-07-08 18:36:52', '2024-07-08 18:36:52', 'create transaksi subcpmk'),
(62, 'transaksisubcpmk.edit', 'web', '2024-07-08 18:37:00', '2024-07-08 18:37:00', 'edit transaksi subcpmk'),
(63, 'transaksisubcpmk.delete', 'web', '2024-07-08 18:37:06', '2024-07-08 18:37:06', 'delete transaksi subcpmk'),
(64, 'transaksisubcpmk.validate', 'web', '2024-07-08 18:37:12', '2024-07-08 18:42:17', 'validate transaksi subcpmk'),
(65, 'subcpmk.revisi', 'web', '2024-07-11 00:41:39', '2024-07-11 00:41:39', 'revisi subcpmk'),
(66, 'cplbkmk.update', 'web', '2024-07-13 20:05:41', '2024-07-13 20:05:41', 'update cplbkmk'),
(67, 'bk.create', 'web', '2024-07-14 00:26:52', '2024-07-14 00:26:52', 'create bahan kajian'),
(68, 'bk.edit', 'web', '2024-07-14 00:28:47', '2024-07-14 00:28:47', 'edit bahan kajian'),
(69, 'update.cpl-mk', 'web', '2024-07-14 00:33:40', '2024-07-14 00:33:40', 'update cpl-mk'),
(70, 'update.cpl-bk', 'web', '2024-07-14 00:35:55', '2024-12-08 03:25:47', 'update form capaian profile lulusan dan bahan kajian'),
(71, 'update.bk-mk', 'web', '2024-07-14 00:39:02', '2024-07-14 00:39:02', 'update bk-mk'),
(72, 'cpl.edit', 'web', '2024-07-14 19:17:53', '2024-07-14 19:17:53', 'edit cpl'),
(73, 'cpl.create', 'web', '2024-07-14 19:18:02', '2024-07-14 19:18:02', 'create cpl'),
(74, 'cpl.delet', 'web', '2024-07-14 19:18:09', '2024-07-14 19:18:09', 'delete cpl'),
(75, 'bk.delet', 'web', '2024-07-14 19:53:43', '2024-07-14 19:53:43', 'delete bahan kajian'),
(76, 'cpmk.validate', 'web', '2024-07-20 09:48:10', '2024-07-20 09:48:10', 'validate cpmk'),
(77, 'cpmk.revisi', 'web', '2024-07-20 10:06:36', '2024-07-20 10:06:36', 'revisi cpmk'),
(78, 'rubrik', 'web', '2024-09-06 05:26:35', '2024-09-06 05:26:35', 'melihat rubrik'),
(79, 'rubrik.edit', 'web', '2024-09-06 05:48:00', '2024-09-06 05:48:00', 'mengedit rubrik'),
(80, 'rubrik.create', 'web', '2024-09-06 05:54:00', '2024-09-06 05:54:00', 'membuat rubrik'),
(81, 'penilaian.view', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'melihat penilaian'),
(82, 'nilai_mahasiswa.view', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'melihat nilai mahasiswa'),
(83, 'nilai_mahasiswa.edit', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'mengedit nilai mahasiswa'),
(84, 'nilai_mahasiswa.create', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'membuat nilai mahasiswa'),
(85, 'bobot_penilaian.view', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'melihat bobot penilaian'),
(86, 'bobot_penilaian.edit', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'mengedit bobot penilaian'),
(87, 'bobot_penilaian.create', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'membuat bobot penilaian'),
(88, 'rumusan_nilai_akhir_mk.view', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'melihat rumusan nilai akhir mata kuliah'),
(89, 'rumusan_nilai_akhir_mk.edit', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'mengedit rumusan nilai akhir mata kuliah'),
(90, 'rumusan_nilai_akhir_mk.create', 'web', '2024-09-06 12:58:37', '2024-09-06 12:58:37', 'membuat rumusan nilai akhir mata kuliah'),
(91, 'rumusan_nilai_akhir_cpl.view', 'web', '2024-09-06 12:58:38', '2024-09-06 12:58:38', 'melihat rumusan nilai akhir capaian pembelajaran lulusan'),
(92, 'rumusan_nilai_akhir_cpl.edit', 'web', '2024-09-06 12:58:38', '2024-09-06 12:58:38', 'mengedit rumusan nilai akhir capaian pembelajaran lulusan'),
(93, 'rumusan_nilai_akhir_cpl.create', 'web', '2024-09-06 12:58:38', '2024-09-06 12:58:38', 'membuat rumusan nilai akhir capaian pembelajaran lulusan'),
(94, 'tambah_mata_kuliah.view', 'web', '2024-09-06 12:58:38', '2024-09-06 12:58:38', 'melihat tambah mata kuliah'),
(95, 'tambah_mata_kuliah.create', 'web', '2024-09-06 12:58:38', '2024-09-06 12:58:38', 'membuat tambah mata kuliah'),
(96, 'rubrik.menu', 'web', '2024-09-06 12:58:38', '2024-09-06 12:58:38', 'menu rubrik'),
(97, 'penilaian.menu', 'web', '2024-09-06 12:58:38', '2024-09-06 12:58:38', 'menu penilaian');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pl`
--

CREATE TABLE `pl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `sumber` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pl`
--

INSERT INTO `pl` (`id`, `code`, `nama`, `deskripsi`, `sumber`, `created_at`, `updated_at`) VALUES
(1, 'PL-01', 'System Analyst', 'Sarjana sistem informasi yang mampu menganalisa sistem yang akan diimplementasikan, mulai dari menganalisa sistem yang ada, tentang kelebihan dan kekurangannya dan desain sistem yang akan dikembangkan', 'AIS Job Index 2019', '2024-05-19 06:56:50', '2024-07-18 02:11:05'),
(2, 'PL-02', 'Data & Business Analyst', 'Menguasai konsep teoritis bidang pengetahuan sistem informasi secara umum, identifikasi masalah dan analisis sistem informasi, serta pengambilan keputusan yang tepat dalam penyelesaian masalah.', 'AIS Job Index 2019', '2024-05-19 08:05:37', '2024-07-18 02:11:33'),
(3, 'PL-03', 'Software Engineer / Application adeveloper', 'Sarjana sistem informasi yang mampu mendesain, membuat dan mengimplementasikan sistem informasi', 'AIS Job Index 2019', '2024-05-19 21:28:28', '2024-07-18 02:11:57'),
(12, 'PL-04', 'IS Project Manager', 'Sarjana sistem Informasi yang mampu memberikan masukan kepada klien bagaimana memanfaatkan teknologi informasi untuk memenuhi kebutuhan organisasinya', 'AIS Job Index 2019', '2024-07-18 02:12:18', '2024-07-18 02:12:18'),
(13, 'PL-05', 'IT Integration & Consultant', 'Sarjana sistem informasi yang mampu memberikan  konsultasi IT dan pembuatan IT Masterplan sesuai kebutuhan klien dengan mengintegrasikan sistem dan teknologi yang diperlukan untuk mengembangkan usaha dan pengelolaan suatu proses atau usaha', 'AIS Job Index 2019', '2024-07-18 02:12:35', '2024-07-18 02:12:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(12, 'kaprodi', 'web', '2024-06-06 18:50:37', '2024-06-06 18:50:37'),
(13, 'dosen', 'web', '2024-06-06 18:50:45', '2024-06-06 18:50:45'),
(24, 'admin', 'web', '2025-01-20 18:42:19', '2025-01-20 18:42:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(15, 12),
(15, 13),
(16, 12),
(17, 12),
(18, 12),
(19, 12),
(20, 12),
(21, 12),
(21, 13),
(22, 12),
(24, 12),
(25, 12),
(25, 13),
(26, 12),
(26, 13),
(27, 12),
(27, 13),
(28, 12),
(28, 13),
(29, 12),
(29, 13),
(30, 12),
(30, 13),
(31, 12),
(32, 12),
(33, 12),
(34, 12),
(35, 12),
(36, 13),
(37, 13),
(38, 13),
(39, 13),
(40, 12),
(40, 13),
(41, 13),
(45, 12),
(46, 12),
(47, 12),
(48, 12),
(49, 12),
(50, 12),
(53, 12),
(65, 13),
(66, 12),
(67, 12),
(68, 12),
(69, 12),
(70, 12),
(71, 12),
(72, 12),
(73, 12),
(74, 12),
(75, 12),
(76, 12),
(77, 13),
(78, 12),
(78, 13),
(79, 13),
(80, 13),
(81, 12),
(81, 13),
(82, 12),
(82, 13),
(83, 13),
(84, 13),
(85, 12),
(85, 13),
(86, 13),
(87, 13),
(88, 12),
(88, 13),
(89, 13),
(90, 13),
(91, 12),
(91, 13),
(92, 13),
(93, 13),
(94, 12),
(94, 13),
(95, 13),
(96, 12),
(96, 13),
(97, 12),
(97, 13);

-- --------------------------------------------------------

--
-- Table structure for table `rps`
--

CREATE TABLE `rps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mk_id` bigint(20) UNSIGNED NOT NULL,
  `deskripsi` text NOT NULL,
  `tujuan` text NOT NULL,
  `metode_pembelajaran` text NOT NULL,
  `penilaian` text NOT NULL,
  `rubric_id` bigint(20) UNSIGNED NOT NULL,
  `sumber_belajar` text NOT NULL,
  `tahun_ajaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rubrik_analitiks`
--

CREATE TABLE `rubrik_analitiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `aspek` varchar(255) NOT NULL,
  `sangat_kurang` int(11) NOT NULL,
  `kurang` int(11) NOT NULL,
  `cukup` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `sangat_baik` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rubrik_holistiks`
--

CREATE TABLE `rubrik_holistiks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `kriteria` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`kriteria`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rubrik_skala_presepsis`
--

CREATE TABLE `rubrik_skala_presepsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dimensi` varchar(255) NOT NULL,
  `sangat_kurang` int(11) NOT NULL,
  `kurang` int(11) NOT NULL,
  `cukup` int(11) NOT NULL,
  `baik` int(11) NOT NULL,
  `sangat_baik` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_cpmk`
--

CREATE TABLE `sub_cpmk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `cpmk_id` bigint(20) UNSIGNED NOT NULL,
  `mk_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_status` varchar(50) DEFAULT NULL,
  `validation_note` text DEFAULT NULL,
  `tahun_ajaran` varchar(255) DEFAULT NULL,
  `semester` enum('ganjil','genap') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_subcpmk`
--

CREATE TABLE `transaksi_subcpmk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mk_id` bigint(20) UNSIGNED NOT NULL,
  `cpmk_id` bigint(20) UNSIGNED NOT NULL,
  `subcpmk_id` bigint(20) UNSIGNED NOT NULL,
  `bobot` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_status` varchar(255) DEFAULT NULL,
  `validation_note` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_subcpmk`
--

INSERT INTO `transaksi_subcpmk` (`id`, `mk_id`, `cpmk_id`, `subcpmk_id`, `bobot`, `created_at`, `updated_at`, `validation_status`, `validation_note`) VALUES
(1, 157, 19, 13, 1.00, '2024-07-08 17:51:39', '2024-07-08 18:45:49', 'reject', 'salah'),
(2, 165, 15, 11, 2.00, '2024-07-08 17:54:47', '2024-07-08 19:43:58', 'accept', 'oke'),
(3, 166, 16, 15, 1.00, '2024-07-08 19:18:12', '2024-07-08 19:44:13', 'hold', 'ganti'),
(4, 166, 16, 15, 1.00, '2024-07-08 19:18:38', '2024-07-08 19:18:38', NULL, NULL),
(5, 166, 16, 15, 1.00, '2024-07-08 19:19:29', '2024-07-08 19:19:29', NULL, NULL),
(6, 156, 18, 14, 1.00, '2024-07-08 19:37:40', '2024-07-08 19:37:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'kaprodi', 'demo@getcraftable.com', '$2y$12$dYVffo5brT91FxbBCAnHmOKq1fh/9Xf/p1BW9rqMl5i/yS9XkIGHi', NULL, '2024-05-18 18:15:30', '2024-06-10 17:52:08'),
(7, 'dosen', 'user1@mail.com', '$2y$12$BuBnO1O5rK6OXi9bnh2NbuaEQAjT3Uk5auPJfo2LAW8zVRpxna2k.', NULL, '2024-06-07 02:33:03', '2024-06-10 17:52:23'),
(10, 'dosen1', 'dosen1@gmail.com', '$2y$12$LnykJqJGMEsL0EFfCCtjK.w3OZebK6gIkQnbK5RynOnisreVuFU56', NULL, '2024-07-07 18:24:47', '2024-07-07 18:24:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bk`
--
ALTER TABLE `bk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bk_kode_unique` (`kode`);

--
-- Indexes for table `bk_mk`
--
ALTER TABLE `bk_mk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bk_mk_bk_id_foreign` (`bk_id`),
  ADD KEY `bk_mk_mk_id_foreign` (`mk_id`);

--
-- Indexes for table `bobot_penilaian`
--
ALTER TABLE `bobot_penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpl`
--
ALTER TABLE `cpl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpl_code_unique` (`code`);

--
-- Indexes for table `cpl_bk`
--
ALTER TABLE `cpl_bk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpl_bk_mk`
--
ALTER TABLE `cpl_bk_mk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpl_bk_mk_cpl_id_foreign` (`cpl_id`),
  ADD KEY `cpl_bk_mk_bk_id_foreign` (`bk_id`),
  ADD KEY `cpl_bk_mk_mk_id_foreign` (`mk_id`);

--
-- Indexes for table `cpl_mk`
--
ALTER TABLE `cpl_mk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpl_mk_cpl_id_foreign` (`cpl_id`),
  ADD KEY `cpl_mk_mk_id_foreign` (`mk_id`);

--
-- Indexes for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cpmk_cpl_id_foreign` (`cpl_id`),
  ADD KEY `cpmk_mk_id_foreign` (`mk_id`);

--
-- Indexes for table `matrix_cpl_pl`
--
ALTER TABLE `matrix_cpl_pl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matrix_cpl_pl_cpl_id_foreign` (`cpl_id`),
  ADD KEY `matrix_cpl_pl_pl_id_foreign` (`pl_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mk`
--
ALTER TABLE `mk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mk_kode_unique` (`kode`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_akhir_mk`
--
ALTER TABLE `nilai_akhir_mk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_rps_id_foreign` (`rps_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pl`
--
ALTER TABLE `pl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pl_code_unique` (`code`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `rps`
--
ALTER TABLE `rps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubrik_analitiks`
--
ALTER TABLE `rubrik_analitiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubrik_holistiks`
--
ALTER TABLE `rubrik_holistiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubrik_skala_presepsis`
--
ALTER TABLE `rubrik_skala_presepsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cpmk`
--
ALTER TABLE `sub_cpmk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_subcpmk`
--
ALTER TABLE `transaksi_subcpmk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bk`
--
ALTER TABLE `bk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `bk_mk`
--
ALTER TABLE `bk_mk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bobot_penilaian`
--
ALTER TABLE `bobot_penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpl`
--
ALTER TABLE `cpl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cpl_bk`
--
ALTER TABLE `cpl_bk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cpl_bk_mk`
--
ALTER TABLE `cpl_bk_mk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cpl_mk`
--
ALTER TABLE `cpl_mk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cpmk`
--
ALTER TABLE `cpmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `matrix_cpl_pl`
--
ALTER TABLE `matrix_cpl_pl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `mk`
--
ALTER TABLE `mk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=288;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_akhir_mk`
--
ALTER TABLE `nilai_akhir_mk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pl`
--
ALTER TABLE `pl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `rps`
--
ALTER TABLE `rps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rubrik_analitiks`
--
ALTER TABLE `rubrik_analitiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rubrik_holistiks`
--
ALTER TABLE `rubrik_holistiks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rubrik_skala_presepsis`
--
ALTER TABLE `rubrik_skala_presepsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_cpmk`
--
ALTER TABLE `sub_cpmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `transaksi_subcpmk`
--
ALTER TABLE `transaksi_subcpmk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bk_mk`
--
ALTER TABLE `bk_mk`
  ADD CONSTRAINT `bk_mk_bk_id_foreign` FOREIGN KEY (`bk_id`) REFERENCES `bk` (`id`),
  ADD CONSTRAINT `bk_mk_mk_id_foreign` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`id`);

--
-- Constraints for table `cpl_bk_mk`
--
ALTER TABLE `cpl_bk_mk`
  ADD CONSTRAINT `cpl_bk_mk_bk_id_foreign` FOREIGN KEY (`bk_id`) REFERENCES `bk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cpl_bk_mk_cpl_id_foreign` FOREIGN KEY (`cpl_id`) REFERENCES `cpl` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cpl_bk_mk_mk_id_foreign` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cpl_mk`
--
ALTER TABLE `cpl_mk`
  ADD CONSTRAINT `cpl_mk_cpl_id_foreign` FOREIGN KEY (`cpl_id`) REFERENCES `cpl` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cpl_mk_mk_id_foreign` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cpmk`
--
ALTER TABLE `cpmk`
  ADD CONSTRAINT `cpmk_cpl_id_foreign` FOREIGN KEY (`cpl_id`) REFERENCES `cpl` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cpmk_mk_id_foreign` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `matrix_cpl_pl`
--
ALTER TABLE `matrix_cpl_pl`
  ADD CONSTRAINT `matrix_cpl_pl_cpl_id_foreign` FOREIGN KEY (`cpl_id`) REFERENCES `cpl` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matrix_cpl_pl_pl_id_foreign` FOREIGN KEY (`pl_id`) REFERENCES `pl` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `penilaian_rps_id_foreign` FOREIGN KEY (`rps_id`) REFERENCES `rps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
