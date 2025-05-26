-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 26, 2025 at 02:08 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `obe_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `bk`
--

CREATE TABLE `bk` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_bahan_kajian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `referensi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk`
--

INSERT INTO `bk` (`id`, `kode`, `nama_bahan_kajian`, `deskripsi`, `referensi`, `created_at`, `updated_at`) VALUES
(11, 'BK-01', 'Foundation Of Information System', 'kemampuan untuk memahami dasar konsep Sistem Informasi (termasuk perangkat keras, perangkat lunak, dan akuisisi informasi), dukungan yang menyediakan proses bisnis transaksional, keputusan, serta kolaboratif. Kemampuan memahami pengumpulan, pemrosesan, penyimpanan, distribusi, dan nilai informasi dan dapat membuat rekomendasi mengenai Sistem Informasi yang mendukung dan memungkinkan individu dalam kesehariannya hidup, manajemen, pelanggan, dan pemasok perusahaan. Kompetensi ini mencakup kemampuan untuk melakukan analisis bisnis organisasi, dan menilai proses, dan sistem.', 'a', '2024-05-25 09:21:43', '2025-04-24 19:43:22'),
(12, 'BK-02', 'Data / Information Management', 'Kemampuan berfokus kepada manajemen data dalam organisasi untuk mendukung proses bisnis inti organisasi dan membentuk dasar untuk aplikasi bisnis dengan cara mengumpulkan, mengatur, mengkurasi, dan memproses data untuk membantu menjalankan organisasi atau mengekstrak informasi yang dapat ditindaklanjuti untuk meningkatkan efektivitas Kompetensi ini mencakup satu bidang yang diperlukan (Manajemen Data dan Informasi) dan dua bidang pilihan (Analisis Data dan Bisnis; Visualisasi Data dan Informasi).', 'a', '2024-05-25 09:22:08', '2025-04-24 19:43:49'),
(13, 'BK-03', 'IT Infrastructure', 'Kemampuan berfokus kepada aset Teknologi Informasi dalam organisasi, infrastruktur dan arsitekturnya untuk data, infrastruktur teknologi dan keamanan informasi, komunikasi, dan aplikasi.', 'a', '2024-05-25 09:22:22', '2025-04-24 19:44:08'),
(14, 'BK-04', 'Project Management', 'Kemampuan berfokus di area Pengembangan telah melibatkan aspek aplikasi atau sistem siklus hidup perkembangan. Kompetensi pengembangan sistem terdiri Analisis dan Desain Sistem; Pengembangan dan Pemrograman Aplikasi) dan empat area pilihan (Object Orientation, Web Programming, Mobile Programming, and User Interface Design).', 'a', '2024-05-25 09:22:43', '2025-04-24 19:44:30'),
(15, 'BK-05', 'System Analysis & Design', 'eknik, kegunaan dan dampaknya bagi masyarakat', 'a', '2024-05-30 00:46:07', '2025-04-24 19:45:00'),
(20, 'BK-06', 'IS Management and Strategy', NULL, 'a', '2025-04-24 19:52:20', '2025-04-24 19:52:20'),
(21, 'BK-07', 'Application Development / Programming', NULL, 'a', '2025-04-24 19:52:51', '2025-04-24 19:52:51'),
(22, 'BK-08', 'Secure Computing', NULL, 'a', '2025-04-24 19:53:43', '2025-04-24 19:53:43'),
(23, 'BK-09', 'Ethic, Use & Implication for Society', NULL, 'a', '2025-04-24 19:54:27', '2025-04-24 19:54:27'),
(24, 'BK-10', 'Practicum', NULL, 'a', '2025-04-24 19:55:28', '2025-04-24 19:55:28'),
(25, 'BK-11', 'Mathematics and Statistics', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit fugiat totam blanditiis delectus quaerat exercitationem. Sit aperiam voluptatem nesciunt tempore. Repudiandae maiores perspiciatis eveniet sed earum aliquid doloremque saepe ex.', 'a', '2025-04-24 19:56:08', '2025-04-26 00:44:45'),
(26, 'BK-12', 'Data / Business Analytics', NULL, 'a', '2025-04-24 19:56:43', '2025-04-24 19:56:43'),
(27, 'BK-13', 'Personality Development', NULL, 'a', '2025-04-24 19:57:05', '2025-04-24 19:57:05'),
(28, 'BK-14', 'Business Process Management', NULL, 'a', '2025-04-24 19:57:22', '2025-04-24 19:57:22'),
(29, 'BK-15', 'Enterprise Architecture', NULL, 'a', '2025-04-24 19:57:52', '2025-04-24 19:57:52'),
(30, 'BK-16', 'User Interface Design', NULL, 'a', '2025-04-24 19:58:10', '2025-04-24 19:58:10'),
(31, 'BK-17', 'Emerging Technologies', NULL, 'a', '2025-04-24 19:58:28', '2025-04-24 19:58:28'),
(32, 'BK-18', 'Digital Innovation', NULL, 'a', '2025-04-24 19:58:48', '2025-04-24 19:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `bk_mk`
--

CREATE TABLE `bk_mk` (
  `id` bigint UNSIGNED NOT NULL,
  `bk_id` bigint UNSIGNED NOT NULL,
  `mk_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bk_mk`
--

INSERT INTO `bk_mk` (`id`, `bk_id`, `mk_id`, `created_at`, `updated_at`) VALUES
(1, 25, 156, NULL, NULL),
(2, 25, 181, NULL, NULL),
(3, 25, 191, NULL, NULL),
(4, 25, 211, NULL, NULL),
(5, 25, 212, NULL, NULL),
(6, 25, 223, NULL, NULL),
(7, 21, 157, NULL, NULL),
(8, 21, 158, NULL, NULL),
(9, 21, 184, NULL, NULL),
(10, 21, 185, NULL, NULL),
(11, 21, 196, NULL, NULL),
(12, 21, 197, NULL, NULL),
(13, 21, 215, NULL, NULL),
(14, 21, 216, NULL, NULL),
(15, 21, 227, NULL, NULL),
(16, 21, 228, NULL, NULL),
(17, 13, 159, NULL, NULL),
(18, 13, 160, NULL, NULL),
(19, 13, 190, NULL, NULL),
(20, 13, 213, NULL, NULL),
(21, 13, 214, NULL, NULL),
(22, 12, 161, NULL, NULL),
(23, 12, 182, NULL, NULL),
(24, 12, 183, NULL, NULL),
(25, 12, 192, NULL, NULL),
(26, 20, 162, NULL, NULL),
(27, 20, 292, NULL, NULL),
(28, 23, 165, NULL, NULL),
(29, 23, 166, NULL, NULL),
(30, 23, 167, NULL, NULL),
(31, 23, 168, NULL, NULL),
(32, 23, 169, NULL, NULL),
(33, 23, 187, NULL, NULL),
(34, 23, 189, NULL, NULL),
(35, 23, 193, NULL, NULL),
(36, 23, 293, NULL, NULL),
(37, 11, 180, NULL, NULL),
(38, 11, 210, NULL, NULL),
(39, 15, 186, NULL, NULL),
(40, 15, 194, NULL, NULL),
(41, 15, 195, NULL, NULL),
(42, 15, 226, NULL, NULL),
(43, 15, 265, NULL, NULL),
(44, 14, 217, NULL, NULL),
(45, 14, 291, NULL, NULL),
(46, 24, 221, NULL, NULL),
(47, 24, 267, NULL, NULL),
(48, 24, 296, NULL, NULL),
(49, 22, 294, NULL, NULL),
(50, 22, 295, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bobot_penilaian`
--

CREATE TABLE `bobot_penilaian` (
  `id` bigint UNSIGNED NOT NULL,
  `cpl_id` bigint UNSIGNED NOT NULL,
  `mk_id` bigint UNSIGNED NOT NULL,
  `cpmk_id` bigint UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `mbkm` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `partisipasi` int NOT NULL,
  `observasi` int NOT NULL,
  `untuk_kerja` int NOT NULL,
  `tes_tulis_UTS` int NOT NULL,
  `tes_tulis_UAS` int NOT NULL,
  `tes_lisan_Tugas_Kelompok` int NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bobot_penilaian`
--

INSERT INTO `bobot_penilaian` (`id`, `cpl_id`, `mk_id`, `cpmk_id`, `tahun_ajaran`, `semester`, `mbkm`, `partisipasi`, `observasi`, `untuk_kerja`, `tes_tulis_UTS`, `tes_tulis_UAS`, `tes_lisan_Tugas_Kelompok`, `total`, `created_at`, `updated_at`) VALUES
(3, 17, 162, 61, '2026/2027', 'Ganjil', 'dem', 12, 12, 12, 12, 12, 12, 72, NULL, NULL),
(4, 17, 166, 53, '2028/2029', 'Ganjil', '12', 12, 12, 12, 12, 12, 12, 72, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpl`
--

CREATE TABLE `cpl` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(28, 'CPL-13', 'Mampu mengimplementasikan wawasan keilmuan dan melibatkan diri dalam proses belajar terus-menerus sepanjang hidup di bidang sistem informasi manufaktur', 'penciri pendukung', '2024-05-30 06:41:36', '2025-02-19 04:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `cpl_bk`
--

CREATE TABLE `cpl_bk` (
  `id` bigint UNSIGNED NOT NULL,
  `cpl_id` bigint UNSIGNED NOT NULL,
  `bk_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cpl_bk_mk`
--

CREATE TABLE `cpl_bk_mk` (
  `id` bigint UNSIGNED NOT NULL,
  `cpl_id` bigint UNSIGNED NOT NULL,
  `bk_id` bigint UNSIGNED NOT NULL,
  `mk_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpl_bk_mk`
--

INSERT INTO `cpl_bk_mk` (`id`, `cpl_id`, `bk_id`, `mk_id`, `created_at`, `updated_at`) VALUES
(1, 16, 11, 165, '2025-02-19 05:03:30', '2025-02-19 05:03:30'),
(2, 17, 12, 166, '2025-02-19 05:03:30', '2025-02-19 05:03:30'),
(3, 18, 12, 168, '2025-02-19 05:03:30', '2025-02-19 05:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `cpl_mk`
--

CREATE TABLE `cpl_mk` (
  `id` bigint UNSIGNED NOT NULL,
  `cpl_id` bigint UNSIGNED NOT NULL,
  `mk_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpl_mk`
--

INSERT INTO `cpl_mk` (`id`, `cpl_id`, `mk_id`, `created_at`, `updated_at`) VALUES
(1, 17, 156, NULL, NULL),
(2, 17, 157, NULL, NULL),
(3, 17, 158, NULL, NULL),
(4, 17, 159, NULL, NULL),
(5, 17, 160, NULL, NULL),
(6, 17, 161, NULL, NULL),
(7, 17, 162, NULL, NULL),
(8, 17, 180, NULL, NULL),
(9, 17, 181, NULL, NULL),
(10, 17, 182, NULL, NULL),
(11, 17, 183, NULL, NULL),
(12, 17, 184, NULL, NULL),
(13, 17, 185, NULL, NULL),
(14, 17, 186, NULL, NULL),
(15, 17, 190, NULL, NULL),
(16, 17, 191, NULL, NULL),
(17, 17, 192, NULL, NULL),
(18, 17, 193, NULL, NULL),
(19, 17, 194, NULL, NULL),
(20, 17, 195, NULL, NULL),
(21, 17, 196, NULL, NULL),
(22, 17, 197, NULL, NULL),
(23, 17, 198, NULL, NULL),
(24, 17, 210, NULL, NULL),
(25, 17, 211, NULL, NULL),
(26, 17, 212, NULL, NULL),
(27, 17, 213, NULL, NULL),
(28, 17, 214, NULL, NULL),
(29, 17, 215, NULL, NULL),
(30, 17, 216, NULL, NULL),
(31, 17, 217, NULL, NULL),
(32, 17, 218, NULL, NULL),
(33, 17, 221, NULL, NULL),
(34, 17, 222, NULL, NULL),
(35, 17, 223, NULL, NULL),
(36, 17, 224, NULL, NULL),
(37, 17, 225, NULL, NULL),
(38, 17, 226, NULL, NULL),
(39, 17, 227, NULL, NULL),
(40, 17, 228, NULL, NULL),
(41, 17, 229, NULL, NULL),
(42, 17, 262, NULL, NULL),
(43, 17, 263, NULL, NULL),
(44, 17, 264, NULL, NULL),
(45, 17, 265, NULL, NULL),
(46, 17, 266, NULL, NULL),
(47, 17, 267, NULL, NULL),
(48, 19, 156, NULL, NULL),
(49, 19, 157, NULL, NULL),
(50, 19, 158, NULL, NULL),
(51, 19, 159, NULL, NULL),
(52, 19, 160, NULL, NULL),
(53, 19, 162, NULL, NULL),
(54, 19, 163, NULL, NULL),
(55, 19, 165, NULL, NULL),
(56, 19, 166, NULL, NULL),
(57, 19, 167, NULL, NULL),
(58, 19, 168, NULL, NULL),
(59, 19, 169, NULL, NULL),
(60, 19, 180, NULL, NULL),
(61, 19, 181, NULL, NULL),
(62, 19, 187, NULL, NULL),
(63, 19, 189, NULL, NULL),
(64, 19, 190, NULL, NULL),
(65, 19, 191, NULL, NULL),
(66, 19, 192, NULL, NULL),
(67, 19, 193, NULL, NULL),
(68, 19, 198, NULL, NULL),
(69, 19, 199, NULL, NULL),
(70, 19, 210, NULL, NULL),
(71, 19, 213, NULL, NULL),
(72, 19, 214, NULL, NULL),
(73, 19, 219, NULL, NULL),
(74, 19, 220, NULL, NULL),
(75, 19, 221, NULL, NULL),
(76, 19, 222, NULL, NULL),
(77, 19, 266, NULL, NULL),
(78, 23, 156, NULL, NULL),
(79, 23, 157, NULL, NULL),
(80, 23, 158, NULL, NULL),
(81, 23, 161, NULL, NULL),
(82, 23, 181, NULL, NULL),
(83, 23, 182, NULL, NULL),
(84, 23, 183, NULL, NULL),
(85, 23, 194, NULL, NULL),
(86, 23, 211, NULL, NULL),
(87, 23, 212, NULL, NULL),
(88, 23, 223, NULL, NULL),
(89, 23, 224, NULL, NULL),
(90, 23, 225, NULL, NULL),
(91, 23, 229, NULL, NULL),
(92, 23, 262, NULL, NULL),
(93, 23, 263, NULL, NULL),
(94, 23, 264, NULL, NULL),
(95, 27, 156, NULL, NULL),
(96, 27, 157, NULL, NULL),
(97, 27, 158, NULL, NULL),
(98, 27, 161, NULL, NULL),
(99, 27, 181, NULL, NULL),
(100, 27, 182, NULL, NULL),
(101, 27, 183, NULL, NULL),
(102, 27, 194, NULL, NULL),
(103, 27, 211, NULL, NULL),
(104, 27, 212, NULL, NULL),
(105, 27, 223, NULL, NULL),
(106, 27, 224, NULL, NULL),
(107, 27, 225, NULL, NULL),
(108, 27, 229, NULL, NULL),
(109, 27, 262, NULL, NULL),
(110, 27, 263, NULL, NULL),
(111, 27, 264, NULL, NULL),
(112, 22, 159, NULL, NULL),
(113, 22, 160, NULL, NULL),
(114, 22, 162, NULL, NULL),
(115, 22, 180, NULL, NULL),
(116, 22, 184, NULL, NULL),
(117, 22, 185, NULL, NULL),
(118, 22, 186, NULL, NULL),
(119, 22, 190, NULL, NULL),
(120, 22, 191, NULL, NULL),
(121, 22, 192, NULL, NULL),
(122, 22, 195, NULL, NULL),
(123, 22, 196, NULL, NULL),
(124, 22, 197, NULL, NULL),
(125, 22, 198, NULL, NULL),
(126, 22, 210, NULL, NULL),
(127, 22, 213, NULL, NULL),
(128, 22, 214, NULL, NULL),
(129, 22, 215, NULL, NULL),
(130, 22, 216, NULL, NULL),
(131, 22, 217, NULL, NULL),
(132, 22, 218, NULL, NULL),
(133, 22, 226, NULL, NULL),
(134, 22, 227, NULL, NULL),
(135, 22, 228, NULL, NULL),
(136, 22, 265, NULL, NULL),
(137, 22, 266, NULL, NULL),
(138, 22, 267, NULL, NULL),
(139, 26, 159, NULL, NULL),
(140, 26, 160, NULL, NULL),
(141, 26, 162, NULL, NULL),
(142, 26, 180, NULL, NULL),
(143, 26, 184, NULL, NULL),
(144, 26, 185, NULL, NULL),
(145, 26, 186, NULL, NULL),
(146, 26, 190, NULL, NULL),
(147, 26, 191, NULL, NULL),
(148, 26, 192, NULL, NULL),
(149, 26, 195, NULL, NULL),
(150, 26, 196, NULL, NULL),
(151, 26, 197, NULL, NULL),
(152, 26, 198, NULL, NULL),
(153, 26, 210, NULL, NULL),
(154, 26, 213, NULL, NULL),
(155, 26, 214, NULL, NULL),
(156, 26, 215, NULL, NULL),
(157, 26, 216, NULL, NULL),
(158, 26, 217, NULL, NULL),
(159, 26, 218, NULL, NULL),
(160, 26, 226, NULL, NULL),
(161, 26, 227, NULL, NULL),
(162, 26, 228, NULL, NULL),
(163, 26, 265, NULL, NULL),
(164, 26, 266, NULL, NULL),
(165, 26, 267, NULL, NULL),
(166, 20, 161, NULL, NULL),
(167, 20, 182, NULL, NULL),
(168, 20, 183, NULL, NULL),
(169, 20, 184, NULL, NULL),
(170, 20, 185, NULL, NULL),
(171, 20, 186, NULL, NULL),
(172, 20, 194, NULL, NULL),
(173, 20, 195, NULL, NULL),
(174, 20, 196, NULL, NULL),
(175, 20, 197, NULL, NULL),
(176, 20, 211, NULL, NULL),
(177, 20, 212, NULL, NULL),
(178, 20, 215, NULL, NULL),
(179, 20, 216, NULL, NULL),
(180, 20, 218, NULL, NULL),
(181, 20, 223, NULL, NULL),
(182, 20, 224, NULL, NULL),
(183, 20, 225, NULL, NULL),
(184, 20, 226, NULL, NULL),
(185, 20, 227, NULL, NULL),
(186, 20, 228, NULL, NULL),
(187, 20, 262, NULL, NULL),
(188, 20, 263, NULL, NULL),
(189, 20, 264, NULL, NULL),
(190, 20, 265, NULL, NULL),
(191, 16, 163, NULL, NULL),
(192, 16, 165, NULL, NULL),
(193, 16, 166, NULL, NULL),
(194, 16, 167, NULL, NULL),
(195, 16, 168, NULL, NULL),
(196, 16, 169, NULL, NULL),
(197, 16, 187, NULL, NULL),
(198, 16, 189, NULL, NULL),
(199, 16, 199, NULL, NULL),
(200, 16, 219, NULL, NULL),
(201, 16, 269, NULL, NULL),
(202, 24, 163, NULL, NULL),
(203, 24, 165, NULL, NULL),
(204, 24, 166, NULL, NULL),
(205, 24, 167, NULL, NULL),
(206, 24, 168, NULL, NULL),
(207, 24, 169, NULL, NULL),
(208, 24, 187, NULL, NULL),
(209, 24, 189, NULL, NULL),
(210, 24, 199, NULL, NULL),
(211, 24, 268, NULL, NULL),
(212, 28, 163, NULL, NULL),
(213, 28, 165, NULL, NULL),
(214, 28, 166, NULL, NULL),
(215, 28, 167, NULL, NULL),
(216, 28, 168, NULL, NULL),
(217, 28, 169, NULL, NULL),
(218, 28, 187, NULL, NULL),
(219, 28, 189, NULL, NULL),
(220, 28, 193, NULL, NULL),
(221, 28, 199, NULL, NULL),
(222, 28, 219, NULL, NULL),
(223, 28, 220, NULL, NULL),
(224, 28, 221, NULL, NULL),
(225, 28, 222, NULL, NULL),
(226, 25, 193, NULL, NULL),
(227, 25, 219, NULL, NULL),
(228, 25, 220, NULL, NULL),
(229, 25, 221, NULL, NULL),
(230, 25, 222, NULL, NULL),
(231, 21, 217, NULL, NULL),
(232, 21, 229, NULL, NULL),
(233, 21, 267, NULL, NULL),
(234, 18, 220, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cpmk`
--

CREATE TABLE `cpmk` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpl_id` bigint UNSIGNED NOT NULL,
  `mk_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_note` text COLLATE utf8mb4_unicode_ci,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpmk`
--

INSERT INTO `cpmk` (`id`, `code`, `description`, `cpl_id`, `mk_id`, `created_at`, `updated_at`, `validation_status`, `validation_note`, `tahun_ajaran`, `semester`) VALUES
(71, 'CPMK011', '[Buat MK MSI]', 17, 156, '2025-04-15 20:46:27', '2025-04-15 20:52:34', 'revisi', 'Benar, ubah deskripsi nanti', '2024/2025', 'ganjil'),
(72, 'CPMK012', '[Buat MK MSI]', 17, 156, '2025-04-15 21:24:11', '2025-04-15 21:25:11', 'revisi', 'Benar, cukup ubah deskripsi', '2024/2025', 'ganjil'),
(74, 'CPMK014', '[MK MSI CPL 04]', 19, 156, '2025-04-22 18:22:50', '2025-04-22 18:22:50', 'sedang diproses', NULL, '2024/2025', 'ganjil'),
(75, 'CPMK015', '[MK MSI CPL-04]', 19, 156, '2025-04-22 18:23:34', '2025-04-22 18:23:34', 'sedang diproses', NULL, '2024/2025', 'ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_fungsional` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikasi_dosen` tinyint(1) NOT NULL,
  `bidang_pengajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_sign` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `nama`, `nip`, `email`, `no_telp`, `alamat`, `jabatan_fungsional`, `sertifikasi_dosen`, `bidang_pengajaran`, `qr_sign`, `profil`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eka Yuni Astuty, S.Kom, MMSI', NULL, NULL, NULL, NULL, 'Lektor', 1, 'Pengolahan Data dan Informasi, Bisnis dan Manajemen Sistem Informasi', 'JxVJ5dfQ5TOYPIFr9tOxYj5j9Y4EDBN8zs6vzMXF.png', NULL, NULL, '2025-03-25 00:08:54', '2025-03-25 00:08:54'),
(2, 'Endang A. Susilawati, S.T., MMSI', NULL, NULL, NULL, NULL, 'Lektor', 1, 'Sistem Enterprise, Sistem Informasi', 'Mmsasywf8xXIM4pTd3vz6JQeE9NLlE3gurybheH0.png', NULL, NULL, '2025-03-25 00:23:38', '2025-03-25 00:23:38'),
(3, 'Nur Syamsiyah, S.T., MTI', NULL, NULL, NULL, NULL, 'Lektor', 1, 'Matematika dan Statistika, Rekayasa Perangkat Lunak, Sistem Informasi', 'B4Zb7OgUnIGIIFcw5BP2zOYgCzPA7zQk2FubBRxR.png', NULL, NULL, '2025-03-25 00:27:38', '2025-03-25 00:27:38'),
(4, 'Mira F. Sesunan, S.Kom., MCs', NULL, NULL, NULL, NULL, 'Lektor', 1, 'Algoritma dan Pemrograman, Bisnis dan Manajemen, Sistem Informasi', '5IWouOtzt4T7Iw2uUnw2NXHz9prikFnoUdaY73QT.png', NULL, NULL, '2025-03-25 00:30:09', '2025-03-25 00:30:09'),
(5, 'Eva Novianti, S.Kom., MMSI', NULL, NULL, NULL, NULL, 'Asisten Ahli', 1, 'Pengolahan Data dan Informasi, Sistem Informasi', 'LndxzNOBvoSk0egVZBd6BR6wpDZpdZwUeOSN3a1l.png', NULL, NULL, '2025-03-25 00:32:01', '2025-03-30 00:27:12'),
(6, 'Yahya, S.T., M.Kom', NULL, NULL, NULL, NULL, 'Asisten Ahli', 0, 'Algoritma dan Pemrograman', 'A19fmIqFYx91DTvwAJgGTm3ymbQyinL9aJeSoi54.png', NULL, NULL, '2025-03-25 00:33:13', '2025-03-25 00:33:13'),
(7, 'Dr. Ade Supriatna', NULL, NULL, NULL, NULL, 'Dekan FT', 1, 'Teknik Industri', 'g4KSmvIKqj8LNKOkQXiOPk7wT09ZjGTU84dbNUZo.png', NULL, NULL, '2025-04-15 19:11:20', '2025-04-15 19:11:20');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_rps`
--

CREATE TABLE `jadwal_rps` (
  `id` bigint UNSIGNED NOT NULL,
  `rps_id` bigint UNSIGNED NOT NULL,
  `minggu_ke` int NOT NULL,
  `sub_cpmk_id` bigint UNSIGNED NOT NULL,
  `indikator` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bentuk_pembelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pembelajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materi_pembelajaran` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_penilaian` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_rps`
--

INSERT INTO `jadwal_rps` (`id`, `rps_id`, `minggu_ke`, `sub_cpmk_id`, `indikator`, `bentuk_pembelajaran`, `metode_pembelajaran`, `materi_pembelajaran`, `bobot_penilaian`, `created_at`, `updated_at`) VALUES
(5, 10, 1, 56, 'Ketepatan menjelaskan spesifikasi bilangan dan persamaan, Ketepatan menghitung', '·  Kuliah:  ·  diskusi    [TM: 1x(2x50”)]', 'Tugas : Menjawab  pertanyaan   [PT+BM:(1+1)x(2x60”)]', 'Buku utama dan pendukung', 10, '2025-04-15 21:06:35', '2025-04-15 21:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_penilaians`
--

CREATE TABLE `jenis_penilaians` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_penilaians`
--

INSERT INTO `jenis_penilaians` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MBKM', NULL, NULL),
(2, 'Partisipasi (Kehadiran/Quiz)', NULL, NULL),
(3, 'Observasi (Praktik/Tugas)', NULL, NULL),
(4, 'Unjuk Kerja (Presentasi)', NULL, NULL),
(5, 'Tes Tulis (UTS)', NULL, NULL),
(6, 'Tes Tulis (UAS)', NULL, NULL),
(7, 'Tes Lisan (Tugas Kelompok)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_teknik_penilaians`
--

CREATE TABLE `jenis_teknik_penilaians` (
  `id` bigint UNSIGNED NOT NULL,
  `cpmk_id` bigint UNSIGNED NOT NULL,
  `jenis_penilaian_id` bigint UNSIGNED NOT NULL,
  `score` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_teknik_penilaians`
--

INSERT INTO `jenis_teknik_penilaians` (`id`, `cpmk_id`, `jenis_penilaian_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 71, 2, 5, '2025-04-25 23:26:48', '2025-04-25 23:26:48'),
(2, 75, 3, 5, '2025-04-25 23:26:48', '2025-04-25 23:26:48'),
(3, 74, 4, 10, '2025-04-25 23:26:48', '2025-04-25 23:26:48'),
(4, 71, 6, 15, '2025-04-25 23:26:48', '2025-04-25 23:26:48'),
(5, 72, 7, 10, '2025-04-25 23:26:48', '2025-04-25 23:26:48'),
(6, 74, 7, 10, '2025-04-25 23:26:48', '2025-04-25 23:26:48');

-- --------------------------------------------------------

--
-- Table structure for table `matrix_cpl_pl`
--

CREATE TABLE `matrix_cpl_pl` (
  `id` bigint UNSIGNED NOT NULL,
  `cpl_id` bigint UNSIGNED NOT NULL,
  `pl_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `matrix_cpl_pl`
--

INSERT INTO `matrix_cpl_pl` (`id`, `cpl_id`, `pl_id`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(2, 16, 2, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(3, 16, 12, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(4, 17, 2, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(5, 18, 3, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(6, 19, 2, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(7, 21, 1, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(8, 21, 2, '2025-03-08 21:31:42', '2025-03-08 21:31:42'),
(9, 21, 3, '2025-03-08 21:31:42', '2025-03-08 21:31:42');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
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
(71, '2024_09_10_015323_create_nilai_akhir_mk_table', 57),
(72, '2025_03_14_030356_create_rps_cpls_table', 58),
(74, '2025_03_24_031426_create_dosens_table', 59),
(77, '2025_03_26_140323_create_jadwal_rps_table', 60),
(78, '2025_03_26_140956_create_rubrik_rps_table', 61),
(79, '2025_04_23_022910_create_jenis_penilaians_table', 62),
(80, '2025_04_23_084158_create_teknik_penilaians_table', 63),
(83, '2025_04_24_040730_create_jenis_teknik_penilaians_table', 64);

-- --------------------------------------------------------

--
-- Table structure for table `mk`
--

CREATE TABLE `mk` (
  `id` bigint UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'MK-001',
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sks` int NOT NULL,
  `semester` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
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
(290, '24720381', 'Enterprise Resource Planning', 3, 'Semester 7', 'MK Wajib', NULL, '2025-04-24 06:27:23', '2025-04-24 06:33:45'),
(291, '24720391', 'Sistem Informasi Manufaktur', 3, 'Semester 7', 'MK Wajib', NULL, '2025-04-24 06:36:14', '2025-04-24 06:36:14'),
(292, '24720401', 'Tata Kelola SI', 3, 'Semester 7', 'MK Wajib', NULL, '2025-04-24 06:37:52', '2025-04-24 06:37:52'),
(293, '24720590', 'Etika Profesi TI', 2, 'Semester 7', 'MK Wajib', NULL, '2025-04-24 06:40:24', '2025-04-24 06:40:24'),
(294, '24740010', 'Audit Sistem Informasi', 3, 'Semester 7', 'MK Wajib', NULL, '2025-04-24 06:41:25', '2025-04-24 06:41:25'),
(295, '24720421', 'Pengendalian Audit SI', 2, 'Semester 7', 'MK Pilihan', NULL, '2025-04-24 06:42:10', '2025-04-24 06:42:10'),
(296, '24830019', 'Seminar Skripsi', 2, 'Semester 8', 'MK Wajib', NULL, '2025-04-24 06:44:40', '2025-04-28 00:06:25'),
(297, '24540059', 'Statistik Lanjut', 3, 'Semester 5', 'MK Pilihan', NULL, '2025-04-26 02:24:43', '2025-04-26 02:24:43'),
(298, '24540069', 'Bisnis Digital', 3, 'Semester 5', 'MK Pilihan', NULL, '2025-04-26 02:25:26', '2025-04-26 02:25:26'),
(299, '24540079', 'Human Resource Management System', 3, 'Semester 5', 'MK Pilihan', NULL, '2025-04-26 02:25:59', '2025-04-26 02:25:59'),
(300, '24540089', 'Manajemen Kelangsungan Bisnis', 3, 'Semester 5', 'MK Pilihan', NULL, '2025-04-26 02:26:48', '2025-04-26 02:26:48'),
(301, '24540099', 'Pemrograman Cerdas', 3, 'Semester 5', 'MK Pilihan', NULL, '2025-04-26 02:27:14', '2025-04-26 02:27:14'),
(302, '24720411', 'Sistem Informasi Geografis', 3, 'Semester 5', 'MK Pilihan', NULL, '2025-04-26 02:27:58', '2025-04-26 02:27:58'),
(303, '24720500', 'Sistem Informasi Perbankan', 2, 'Semester 5', 'MK Pilihan', NULL, '2025-04-26 02:28:30', '2025-04-26 02:28:30'),
(304, '24420261', 'Sistem Informasi Akuntansi', 3, 'Semester 6', 'MK Pilihan', NULL, '2025-04-26 02:30:14', '2025-04-26 02:30:14'),
(305, '2472550', 'Sistem Penunjang Keputusan', 3, 'Semester 6', 'MK Wajib', NULL, '2025-04-26 07:02:03', '2025-04-26 07:02:03'),
(306, '24640029', 'Machine Learning', 3, 'Semester 6', 'MK Pilihan', NULL, '2025-04-26 07:06:15', '2025-04-26 07:06:15'),
(307, '24640039', 'Manajemen Perubahan', 3, 'Semester 6', 'MK Pilihan', NULL, '2025-04-26 07:07:06', '2025-04-26 07:07:06'),
(308, '24640049', 'Teknologi Berbasi Mobile', 3, 'Semester 6', 'MK Pilihan', NULL, '2025-04-26 07:09:20', '2025-04-26 07:09:20'),
(309, '24720450', 'Analisis Spasial (GIS II)', 3, 'Semester 6', 'MK Pilihan', NULL, '2025-04-26 07:22:00', '2025-04-26 07:22:00'),
(310, '24720460', 'Database Spasial', 3, 'Semester 6', 'MK Pilihan', NULL, '2025-04-28 00:02:03', '2025-04-28 00:02:03'),
(311, '24720530', 'E-Commerce', 2, 'Semester 6', 'MK Pilihan', NULL, '2025-04-28 00:02:46', '2025-04-28 00:02:46'),
(312, '24720570', 'E-Learning', 3, 'Semester 6', 'MK Pilihan', NULL, '2025-04-28 00:03:27', '2025-04-28 00:03:27'),
(313, '24720470', 'Big Data', 3, 'Semester 7', 'MK Pilihan', NULL, '2025-04-28 00:05:05', '2025-04-28 00:05:05'),
(314, '24830029', 'Skripsi', 4, 'Semester 8', 'MK Wajib', NULL, '2025-04-28 00:07:07', '2025-04-28 00:07:07');

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(15, 'App\\Models\\Role', 12),
(16, 'App\\Models\\Role', 12),
(17, 'App\\Models\\Role', 12),
(18, 'App\\Models\\Role', 12),
(19, 'App\\Models\\Role', 12),
(20, 'App\\Models\\Role', 12),
(21, 'App\\Models\\Role', 12),
(22, 'App\\Models\\Role', 12),
(15, 'App\\Models\\Role', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(12, 'App\\Models\\User', 1),
(12, 'App\\Models\\User', 2),
(24, 'App\\Models\\User', 2),
(12, 'App\\Models\\User', 6),
(13, 'App\\Models\\User', 6),
(13, 'App\\Models\\User', 7),
(13, 'App\\Models\\User', 8),
(13, 'App\\Models\\User', 10),
(12, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `rubrik_id` bigint UNSIGNED NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor_min` int NOT NULL,
  `skor_max` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `nilai_akhir_mk`
--

CREATE TABLE `nilai_akhir_mk` (
  `id` bigint UNSIGNED NOT NULL,
  `mk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpmk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` int NOT NULL,
  `total` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` bigint UNSIGNED NOT NULL,
  `rps_id` bigint UNSIGNED NOT NULL,
  `clo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `assessment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`, `deskripsi`) VALUES
(15, 'pl.view', 'web', '2024-06-06 18:35:54', '2025-02-19 02:38:22', 'view untuk profile lulusa'),
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
(75, 'bk.delete', 'web', '2024-07-14 19:53:43', '2025-04-24 19:27:45', 'delete bahan kajian'),
(76, 'cpmk.validate', 'web', '2024-07-20 09:48:10', '2024-07-20 09:48:10', 'validate cpmk'),
(77, 'cpmk.revisi', 'web', '2024-07-20 10:06:36', '2024-07-20 10:06:36', 'revisi cpmk'),
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
(96, 'Rubrik.menu', 'web', '2024-09-06 12:58:38', '2025-02-20 21:05:24', 'menu rubrik'),
(99, 'presepsi.create', 'web', '2025-02-20 21:07:05', '2025-02-20 21:07:05', 'membuat data untuk rubix presepsi'),
(100, 'presepsi.edit', 'web', '2025-02-20 21:07:49', '2025-02-20 21:07:49', 'untuk mengubah edit'),
(101, 'presepsi.delete', 'web', '2025-02-20 21:08:22', '2025-02-20 21:08:22', 'menghapus data di tabel presepsi'),
(102, 'analitik.view', 'web', '2025-02-22 01:06:41', '2025-02-22 01:06:41', 'melihat tabel analitik'),
(103, 'analitik.edit', 'web', '2025-02-22 01:06:56', '2025-02-22 01:06:56', 'mengubah tabel analitik'),
(104, 'analitik.delet', 'web', '2025-02-22 01:07:07', '2025-02-22 01:07:07', 'menghapus tabel analitik'),
(105, 'holistik.view', 'web', '2025-02-22 01:45:43', '2025-02-22 01:45:43', 'menampilkan data rubrik holistik'),
(106, 'holistik.create', 'web', '2025-02-22 01:46:12', '2025-02-22 01:46:12', 'Menambahkan rubrik holistik baru'),
(107, 'holistik.edit', 'web', '2025-02-22 01:46:31', '2025-02-22 01:46:31', 'Mengedit rubrik yang ada'),
(108, 'holistik.delete', 'web', '2025-02-22 01:46:46', '2025-02-22 01:46:46', 'Menghapus rubrik'),
(109, 'penilaian.menu', 'web', '2025-02-24 05:26:29', '2025-02-24 05:26:29', 'menampilkan menu penilaian'),
(110, 'bobotpenilaian.create', 'web', '2025-02-24 05:49:31', '2025-02-24 05:49:31', 'menampikan tombol untuk membuat bobot penilaian'),
(111, 'bobotpenilaian.delete', 'web', '2025-02-24 05:50:59', '2025-02-24 05:50:59', 'menghapus data bobot penilaian'),
(112, 'bobotpenilaian.edit', 'web', '2025-02-24 05:51:13', '2025-02-24 05:51:13', 'mengubah data bobot penilaian'),
(113, 'rps.index', 'web', '2025-03-12 02:17:16', '2025-03-12 02:17:16', 'untuk melihat data rps'),
(114, 'rps.create', 'web', '2025-03-12 20:05:45', '2025-03-12 20:05:45', 'membuat rps baru'),
(115, 'rps.destroy', 'web', '2025-03-13 19:30:19', '2025-03-13 19:30:19', 'Menghapus rps'),
(116, 'rps.edit', 'web', '2025-03-13 19:30:40', '2025-03-13 19:30:40', NULL),
(117, 'dosen.index', 'web', '2025-03-24 20:27:40', '2025-03-24 20:27:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
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
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(12, 'kaprodi', 'web', '2024-06-06 18:50:37', '2024-06-06 18:50:37'),
(13, 'dosen', 'web', '2024-06-06 18:50:45', '2024-06-06 18:50:45'),
(24, 'admin', 'web', '2025-01-20 18:42:19', '2025-01-20 18:42:19'),
(25, 'demo', 'web', '2025-02-19 20:40:36', '2025-02-19 20:40:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(15, 12),
(16, 12),
(17, 12),
(18, 12),
(19, 12),
(20, 12),
(21, 12),
(22, 12),
(24, 12),
(25, 12),
(26, 12),
(27, 12),
(28, 12),
(29, 12),
(30, 12),
(31, 12),
(32, 12),
(33, 12),
(34, 12),
(35, 12),
(36, 12),
(37, 12),
(38, 12),
(39, 12),
(40, 12),
(41, 12),
(45, 12),
(46, 12),
(47, 12),
(48, 12),
(49, 12),
(50, 12),
(53, 12),
(61, 12),
(62, 12),
(63, 12),
(64, 12),
(65, 12),
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
(77, 12),
(79, 12),
(80, 12),
(81, 12),
(82, 12),
(83, 12),
(84, 12),
(85, 12),
(86, 12),
(87, 12),
(88, 12),
(89, 12),
(90, 12),
(91, 12),
(92, 12),
(93, 12),
(94, 12),
(95, 12),
(96, 12),
(99, 12),
(100, 12),
(101, 12),
(102, 12),
(103, 12),
(104, 12),
(105, 12),
(106, 12),
(107, 12),
(108, 12),
(109, 12),
(110, 12),
(111, 12),
(112, 12),
(113, 12),
(114, 12),
(115, 12),
(116, 12),
(117, 12),
(15, 13),
(21, 13),
(25, 13),
(26, 13),
(27, 13),
(28, 13),
(29, 13),
(30, 13),
(36, 13),
(37, 13),
(38, 13),
(39, 13),
(40, 13),
(41, 13),
(65, 13),
(77, 13),
(79, 13),
(80, 13),
(81, 13),
(82, 13),
(83, 13),
(84, 13),
(85, 13),
(86, 13),
(87, 13),
(88, 13),
(89, 13),
(90, 13),
(91, 13),
(92, 13),
(93, 13),
(94, 13),
(95, 13),
(96, 13),
(15, 24),
(16, 24),
(17, 24),
(18, 24),
(19, 24),
(20, 24),
(21, 24),
(22, 24),
(24, 24),
(25, 24),
(26, 24),
(27, 24),
(28, 24),
(29, 24),
(30, 24),
(31, 24),
(32, 24),
(33, 24),
(34, 24),
(35, 24),
(36, 24),
(37, 24),
(38, 24),
(39, 24),
(40, 24),
(41, 24),
(45, 24),
(46, 24),
(47, 24),
(48, 24),
(49, 24),
(50, 24),
(53, 24),
(61, 24),
(62, 24),
(63, 24),
(64, 24),
(65, 24),
(66, 24),
(67, 24),
(68, 24),
(69, 24),
(70, 24),
(71, 24),
(72, 24),
(73, 24),
(74, 24),
(75, 24),
(76, 24),
(77, 24),
(79, 24),
(80, 24),
(81, 24),
(82, 24),
(83, 24),
(84, 24),
(85, 24),
(86, 24),
(87, 24),
(88, 24),
(89, 24),
(90, 24),
(91, 24),
(92, 24),
(93, 24),
(94, 24),
(95, 24),
(96, 24),
(99, 24),
(100, 24),
(101, 24),
(102, 24),
(103, 24),
(104, 24),
(105, 24),
(106, 24),
(107, 24),
(108, 24),
(109, 24),
(110, 24),
(111, 24),
(112, 24),
(113, 24),
(114, 24),
(115, 24),
(116, 24),
(117, 24),
(15, 25),
(21, 25),
(24, 25),
(27, 25),
(28, 25),
(45, 25),
(65, 25),
(81, 25),
(82, 25),
(88, 25),
(91, 25),
(94, 25),
(113, 25);

-- --------------------------------------------------------

--
-- Table structure for table `rps`
--

CREATE TABLE `rps` (
  `id` bigint UNSIGNED NOT NULL,
  `kode_dokumen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mk_id` bigint UNSIGNED DEFAULT NULL,
  `dosen_pengembang` bigint UNSIGNED NOT NULL,
  `dekanft` bigint UNSIGNED NOT NULL,
  `pustaka_utama` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pustaka_pendukung` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dosen_pengampu` bigint UNSIGNED NOT NULL,
  `kaprodi` bigint UNSIGNED NOT NULL,
  `deskripsi_mk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester` enum('ganjil','genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `pra_mk_id` bigint UNSIGNED DEFAULT NULL,
  `tanggal_penyusunan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rps`
--

INSERT INTO `rps` (`id`, `kode_dokumen`, `mk_id`, `dosen_pengembang`, `dekanft`, `pustaka_utama`, `pustaka_pendukung`, `dosen_pengampu`, `kaprodi`, `deskripsi_mk`, `tahun_ajaran`, `semester`, `pra_mk_id`, `tanggal_penyusunan`, `created_at`, `updated_at`) VALUES
(10, 'RPS001', 156, 3, 7, 'utama', NULL, 3, 1, 'Singkat', '2024/2025', 'ganjil', NULL, '2024-10-17', '2025-04-15 21:03:54', '2025-04-15 21:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `rps_cpls`
--

CREATE TABLE `rps_cpls` (
  `id` bigint UNSIGNED NOT NULL,
  `rps_id` bigint UNSIGNED NOT NULL,
  `cpl_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rps_cpls`
--

INSERT INTO `rps_cpls` (`id`, `rps_id`, `cpl_id`, `created_at`, `updated_at`) VALUES
(38, 10, 17, '2025-04-15 21:03:54', '2025-04-15 21:03:54'),
(39, 10, 19, '2025-04-15 21:03:54', '2025-04-15 21:03:54'),
(40, 10, 23, '2025-04-15 21:03:54', '2025-04-15 21:03:54'),
(41, 10, 27, '2025-04-15 21:03:54', '2025-04-15 21:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `rubrik_analitik`
--

CREATE TABLE `rubrik_analitik` (
  `id` bigint UNSIGNED NOT NULL,
  `aspek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tambahan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rubrik_analitik`
--

INSERT INTO `rubrik_analitik` (`id`, `aspek`, `skor`, `grade`, `deskripsi_tambahan`, `created_at`, `updated_at`) VALUES
(1, 'Organisasi', '19', 'Sangat Kurang', 'Tidak ada organisasi yang jelas. Fakta tidak digunakan untuk mendukung pernyataan.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(2, 'Organisasi', '30', 'Kurang', 'Cukup fokus, namun bukti kurang mencukupi untuk digunakan dalam menarik kesimpulan.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(3, 'Organisasi', '50', 'Cukup', 'Presentasi mempunyai fokus dan menyajikan beberapa bukti yang mendukung kesimpulan.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(4, 'Organisasi', '70', 'Baik', 'Terorganisasi dengan baik dan menyajikan fakta yang meyakinkan untuk mendukung kesimpulan.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(5, 'Organisasi', '85', 'Sangat Baik', 'Terorganisasi dengan menyajikan fakta yang didukung oleh contoh yang telah dianalisis sesuai konsep.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(6, 'Isi', '15', 'Sangat Kurang', 'Isinya tidak akurat atau terlalu umum. Pendengar tidak belajar apapun atau kadang menyesatkan.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(7, 'Isi', '35', 'Kurang', 'Isinya kurang akurat, karena tidak ada data faktual, tidak menambah pemahaman pendengar.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(8, 'Isi', '55', 'Cukup', 'Isi secara umum akurat, tetapi tidak lengkap. Para pendengar bisa mempelajari beberapa fakta yang tersirat, tetapi mereka tidak menambah wawasan baru tentang topik tersebut.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(9, 'Isi', '75', 'Baik', 'Isi akurat dan lengkap. Para pendengar menambah wawasan baru tentang topik tersebut.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(10, 'Isi', '90', 'Sangat Baik', 'Isi mampu menggugah pendengar untuk mengembangkan pikiran.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(11, 'Gaya Presentasi', '10', 'Sangat Kurang', 'Pembicara cemas dan tidak nyaman, dan membaca berbagai catatan daripada berbicara. Pendengar diabaikan. Tidak terjadi kontak mata karena pembicara lebih banyak melihat ke papan tulis atau layar.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(12, 'Gaya Presentasi', '30', 'Kurang', 'Berpatokan pada catatan, tidak ada ide yang dikembangkan di luar catatan, suara monoton.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(13, 'Gaya Presentasi', '50', 'Cukup', 'Secara umum pembicara tenang, tetapi dengan nada yang datar dan cukup sering bergantung pada catatan. Kadang-kadang kontak mata dengan pendengar diabaikan.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(14, 'Gaya Presentasi', '70', 'Baik', 'Pembicara tenang dan menggunakan intonasi yang tepat, berbicara tanpa bergantung pada catatan, dan berinteraksi secara intensif dengan pendengar. Pembicara selalu kontak mata dengan pendengar.', '2025-02-21 08:34:28', '2025-02-21 08:34:28'),
(15, 'Gaya Presentasi', '90', 'Sangat Baik', 'Berbicara dengan semangat, menularkan semangat dan antusiasme pada pendengar.', '2025-02-21 08:34:28', '2025-02-21 08:34:28');

-- --------------------------------------------------------

--
-- Table structure for table `rubrik_holistik`
--

CREATE TABLE `rubrik_holistik` (
  `id` bigint UNSIGNED NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria_penilaian` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rubrik_holistik`
--

INSERT INTO `rubrik_holistik` (`id`, `grade`, `skor`, `kriteria_penilaian`, `created_at`, `updated_at`) VALUES
(1, 'sangat kurang', '<20', 'Rancangan yang disajikan tidak teratur dan tidak menyelesaikan \r\npermasalahan', '2025-02-22 01:30:59', '2025-02-22 01:30:59'),
(2, 'Kurang', '21 - 40', 'Rancangan yang disajikan teratur namun kurang menyelesaikan \r\npermasalahan.', '2025-02-22 01:31:50', '2025-02-22 01:31:50'),
(3, 'Cukup', '41 - 60', 'Rancangan yang disajikan tersistematis, menyelesaikan masalah, \r\nnamun kurang dapat diimplementasikan', '2025-02-22 01:32:19', '2025-02-22 01:32:19'),
(4, 'Baik', '61 - 80', 'Rancangan yang disajikan sistematis, menyelesaikan masalah, dapat \r\ndiimplementasikan, kurang inovatif', '2025-02-22 01:32:40', '2025-02-22 01:32:40'),
(5, 'Sangat Baik', '>81', 'Rancangan yang disajikan sistematis, menyelesaikan masalah dan \r\ndapat diimplementasikan dan inovatif', '2025-02-22 01:33:00', '2025-02-22 01:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `rubrik_rps`
--

CREATE TABLE `rubrik_rps` (
  `id` bigint UNSIGNED NOT NULL,
  `jadwalrps_id` bigint UNSIGNED NOT NULL,
  `jenis_rubrik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rubrik_rps`
--

INSERT INTO `rubrik_rps` (`id`, `jadwalrps_id`, `jenis_rubrik`, `created_at`, `updated_at`) VALUES
(4, 5, 'Rubrik Analitik', '2025-04-15 21:06:35', '2025-04-15 21:06:35');

-- --------------------------------------------------------

--
-- Table structure for table `rubrik_skala_presepsi`
--

CREATE TABLE `rubrik_skala_presepsi` (
  `id` bigint UNSIGNED NOT NULL,
  `aspek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_tambahan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rubrik_skala_presepsi`
--

INSERT INTO `rubrik_skala_presepsi` (`id`, `aspek`, `skor`, `grade`, `deskripsi_tambahan`, `created_at`, `updated_at`) VALUES
(4, 'Kemampuan Komunikasi', '<20', 'Sangat Kurang', 'Sulit dipahami, penggunaan kata tidak tepat, sering terputus-putus dan tidak percaya diri saat berbicara.', NULL, NULL),
(5, 'Kemampuan Komunikasi', '21-40', 'Kurang', 'Kurang jelas dalam menyampaikan ide, sering mengulang kata-kata, dan ada banyak jeda saat berbicara.', NULL, NULL),
(6, 'Kemampuan Komunikasi', '41-60', 'Cukup', 'Dapat menyampaikan ide dengan cukup baik, tetapi masih ada beberapa bagian yang kurang terstruktur dengan baik.', NULL, NULL),
(7, 'Kemampuan Komunikasi', '61-80', 'Baik', 'Komunikasi lancar dan jelas, dengan pemilihan kata yang baik serta mampu mempertahankan fokus pembahasan.', NULL, NULL),
(8, 'Kemampuan Komunikasi', '>80', 'Sangat Baik', 'Mampu berkomunikasi dengan sangat jelas dan meyakinkan, menggunakan bahasa yang efektif dan struktur yang terorganisir dengan baik.', NULL, NULL),
(9, 'Penguasaan Materi', '<20', 'Sangat Kurang', 'Sangat minim pemahaman terhadap materi, banyak kesalahan dalam menjelaskan konsep dasar.', NULL, NULL),
(10, 'Penguasaan Materi', '21-40', 'Kurang', 'Memahami sebagian kecil materi tetapi masih banyak kesalahan dan kebingungan dalam menjelaskan konsep penting.', NULL, NULL),
(11, 'Penguasaan Materi', '41-60', 'Cukup', 'Memiliki pemahaman yang cukup, tetapi masih mengalami kesulitan dalam menjelaskan detail tertentu.', NULL, NULL),
(12, 'Penguasaan Materi', '61-80', 'Baik', 'Menguasai materi dengan baik dan mampu menjelaskan sebagian besar konsep dengan benar.', NULL, NULL),
(13, 'Penguasaan Materi', '>80', 'Sangat Baik', 'Memiliki pemahaman yang mendalam terhadap materi, mampu menjelaskan dengan lancar dan memberikan contoh yang relevan.', NULL, NULL),
(14, 'Kemampuan Menghadapi Pertanyaan', '<20', 'Sangat Kurang', 'Tidak dapat menjawab pertanyaan dengan baik, sering diam atau menjawab dengan informasi yang tidak relevan.', NULL, NULL),
(15, 'Kemampuan Menghadapi Pertanyaan', '21-40', 'Kurang', 'Sering ragu-ragu dalam menjawab, membutuhkan banyak waktu untuk berpikir, dan jawabannya kurang tepat.', NULL, NULL),
(16, 'Kemampuan Menghadapi Pertanyaan', '41-60', 'Cukup', 'Mampu menjawab pertanyaan dengan cukup baik, meskipun masih terdapat beberapa jawaban yang kurang tepat.', NULL, NULL),
(17, 'Kemampuan Menghadapi Pertanyaan', '61-80', 'Baik', 'Dapat menjawab pertanyaan dengan lancar dan cukup tepat, serta mampu memberikan penjelasan tambahan jika diperlukan.', NULL, NULL),
(18, 'Kemampuan Menghadapi Pertanyaan', '>80', 'Sangat Baik', 'Mampu menjawab semua pertanyaan dengan sangat baik, memberikan jawaban yang jelas, logis, dan mendalam.', NULL, NULL),
(19, 'Ketepatan Menyelesaikan Masalah', '<20', 'Sangat Kurang', 'Tidak dapat menyelesaikan masalah atau solusinya sangat tidak relevan.', NULL, NULL),
(20, 'Ketepatan Menyelesaikan Masalah', '21-40', 'Kurang', 'Kesulitan dalam menemukan solusi, sering membuat kesalahan, dan butuh banyak bantuan untuk menyelesaikan masalah.', NULL, NULL),
(21, 'Ketepatan Menyelesaikan Masalah', '41-60', 'Cukup', 'Mampu menyelesaikan masalah, tetapi membutuhkan waktu lebih lama dan masih terdapat beberapa kekurangan dalam solusinya.', NULL, NULL),
(22, 'Ketepatan Menyelesaikan Masalah', '61-80', 'Baik', 'Dapat menyelesaikan masalah dengan cukup cepat dan tepat, meskipun ada beberapa aspek yang masih bisa diperbaiki.', NULL, NULL),
(23, 'Ketepatan Menyelesaikan Masalah', '>80', 'Sangat Baik', 'Mampu menyelesaikan masalah dengan sangat cepat dan akurat, menggunakan pendekatan yang efektif dan sistematis.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_cpmk`
--

CREATE TABLE `sub_cpmk` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `cpmk_id` bigint UNSIGNED NOT NULL,
  `mk_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_note` text COLLATE utf8mb4_unicode_ci,
  `tahun_ajaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `semester` enum('ganjil','genap') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_cpmk`
--

INSERT INTO `sub_cpmk` (`id`, `code`, `description`, `cpmk_id`, `mk_id`, `created_at`, `updated_at`, `validation_status`, `validation_note`, `tahun_ajaran`, `semester`) VALUES
(56, 'Sub-CPMK0111', 'Mampu Sistem bilangan, Persamaan Polinomial, dan Sistim koordinat kartesius', 71, 156, '2025-04-15 20:57:46', '2025-04-15 21:18:36', NULL, NULL, '2024/2025', 'ganjil');

-- --------------------------------------------------------

--
-- Table structure for table `teknik_penilaians`
--

CREATE TABLE `teknik_penilaians` (
  `id` bigint UNSIGNED NOT NULL,
  `cpmk_id` bigint UNSIGNED NOT NULL,
  `tahap_penilaian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instrumen` json NOT NULL,
  `kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teknik_penilaians`
--

INSERT INTO `teknik_penilaians` (`id`, `cpmk_id`, `tahap_penilaian`, `instrumen`, `kriteria`, `bobot`, `created_at`, `updated_at`) VALUES
(2, 71, 'Awal - Akhir Semester', '[\"Rubrik Skala Persepsi\", \"Rubrik Holistik\"]', 'apa aja dah', 20, '2025-04-25 18:42:48', '2025-04-25 23:27:03'),
(3, 72, 'Awal - Akhir Semester', '[\"Rubrik Analitik\"]', 'adadada', 10, '2025-04-25 20:23:42', '2025-04-25 20:23:42'),
(4, 74, 'Tengah - Akhir Semester', '[\"Rubrik Holistik\"]', 'dasda', 20, '2025-04-25 21:30:53', '2025-04-25 21:30:53'),
(6, 75, 'Awal - Tengah Semester', '[\"Rubrik Skala Persepsi\", \"Rubrik Holistik\"]', 'fads', 5, '2025-04-26 06:34:40', '2025-04-26 06:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_subcpmk`
--

CREATE TABLE `transaksi_subcpmk` (
  `id` bigint UNSIGNED NOT NULL,
  `mk_id` bigint UNSIGNED NOT NULL,
  `cpmk_id` bigint UNSIGNED NOT NULL,
  `subcpmk_id` bigint UNSIGNED NOT NULL,
  `bobot` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `validation_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `validation_note` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_subcpmk`
--

INSERT INTO `transaksi_subcpmk` (`id`, `mk_id`, `cpmk_id`, `subcpmk_id`, `bobot`, `created_at`, `updated_at`, `validation_status`, `validation_note`) VALUES
(1, 157, 19, 13, '1.00', '2024-07-08 17:51:39', '2024-07-08 18:45:49', 'reject', 'salah'),
(2, 165, 15, 11, '2.00', '2024-07-08 17:54:47', '2024-07-08 19:43:58', 'accept', 'oke'),
(3, 166, 16, 15, '1.00', '2024-07-08 19:18:12', '2024-07-08 19:44:13', 'hold', 'ganti'),
(4, 166, 16, 15, '1.00', '2024-07-08 19:18:38', '2024-07-08 19:18:38', NULL, NULL),
(5, 166, 16, 15, '1.00', '2024-07-08 19:19:29', '2024-07-08 19:19:29', NULL, NULL),
(6, 156, 18, 14, '1.00', '2024-07-08 19:37:40', '2024-07-08 19:37:40', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'adminadmin', 'demo@getcraftable.com', '$2y$12$dYVffo5brT91FxbBCAnHmOKq1fh/9Xf/p1BW9rqMl5i/yS9XkIGHi', NULL, '2024-05-18 18:15:30', '2025-03-11 20:31:20'),
(7, 'dosen', 'user1@mail.com', '$2y$12$BuBnO1O5rK6OXi9bnh2NbuaEQAjT3Uk5auPJfo2LAW8zVRpxna2k.', NULL, '2024-06-07 02:33:03', '2024-06-10 17:52:23'),
(10, 'dosen1', 'dosen1@gmail.com', '$2y$12$LnykJqJGMEsL0EFfCCtjK.w3OZebK6gIkQnbK5RynOnisreVuFU56', NULL, '2024-07-07 18:24:47', '2024-07-07 18:24:47'),
(12, 'Eka Yuni Astuty', 'eka.y.astuty@gmail.com', '$2y$12$3BxBB4HyxbkvnfPa0rogIuG16ACX1DA88nvrs6PzfPswFui.ZyCMa', NULL, '2025-02-19 18:09:30', '2025-02-19 18:09:30'),
(13, 'demo', 'emaildemo@gmai.com', '$2y$12$Z79LHTyV3zml/uonxkH.5OCUP6A.yHuuwxkdCxEvL4HstrYUtFICe', NULL, '2025-02-19 20:40:27', '2025-02-19 20:40:27');

--
-- Triggers `users`
--
DELIMITER $$
CREATE TRIGGER `prevent_admin_delete` BEFORE DELETE ON `users` FOR EACH ROW BEGIN  
    IF OLD.name = 'adminadmin' THEN  
        SIGNAL SQLSTATE '45000'  
        SET MESSAGE_TEXT = 'User adminadmin tidak boleh dihapus';  
    END IF;  
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `prevent_admin_update` BEFORE UPDATE ON `users` FOR EACH ROW BEGIN  
    IF OLD.name = 'adminadmin' AND NEW.name <> 'adminadmin' THEN  
        SIGNAL SQLSTATE '45000'  
        SET MESSAGE_TEXT = 'User adminadmin tidak boleh diubah namanya';  
    END IF;  
END
$$
DELIMITER ;

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bobot_penilaian_cpl` (`cpl_id`),
  ADD KEY `fk_bobot_penilaian_mk` (`mk_id`),
  ADD KEY `fk_bobot_penilaian_cpmk` (`cpmk_id`);

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
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dosens_email_unique` (`email`);

--
-- Indexes for table `jadwal_rps`
--
ALTER TABLE `jadwal_rps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_rps_rps_id_foreign` (`rps_id`),
  ADD KEY `jadwal_rps_sub_cpmk_id_foreign` (`sub_cpmk_id`);

--
-- Indexes for table `jenis_penilaians`
--
ALTER TABLE `jenis_penilaians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_teknik_penilaians`
--
ALTER TABLE `jenis_teknik_penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_teknik_penilaians_cpmk_id_foreign` (`cpmk_id`),
  ADD KEY `jenis_teknik_penilaians_jenis_penilaian_id_foreign` (`jenis_penilaian_id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_dokumen` (`kode_dokumen`),
  ADD KEY `mk_rps` (`mk_id`),
  ADD KEY `rps_kaprodi` (`kaprodi`),
  ADD KEY `rps_koor_bk` (`dekanft`),
  ADD KEY `rps_pngbg` (`dosen_pengembang`),
  ADD KEY `rps_dsn_pngmp` (`dosen_pengampu`),
  ADD KEY `pra_mk` (`pra_mk_id`);

--
-- Indexes for table `rps_cpls`
--
ALTER TABLE `rps_cpls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rps_cpls_rps_id_foreign` (`rps_id`),
  ADD KEY `rps_cpls_cpl_id_foreign` (`cpl_id`);

--
-- Indexes for table `rubrik_analitik`
--
ALTER TABLE `rubrik_analitik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubrik_holistik`
--
ALTER TABLE `rubrik_holistik`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rubrik_rps`
--
ALTER TABLE `rubrik_rps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rubrik_rps_jadwalrps_id_foreign` (`jadwalrps_id`);

--
-- Indexes for table `rubrik_skala_presepsi`
--
ALTER TABLE `rubrik_skala_presepsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_cpmk`
--
ALTER TABLE `sub_cpmk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teknik_penilaians`
--
ALTER TABLE `teknik_penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teknik_penilaians_cpmk_id_foreign` (`cpmk_id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `bk_mk`
--
ALTER TABLE `bk_mk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `bobot_penilaian`
--
ALTER TABLE `bobot_penilaian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cpl`
--
ALTER TABLE `cpl`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `cpl_bk`
--
ALTER TABLE `cpl_bk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpl_bk_mk`
--
ALTER TABLE `cpl_bk_mk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cpl_mk`
--
ALTER TABLE `cpl_mk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT for table `cpmk`
--
ALTER TABLE `cpmk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_rps`
--
ALTER TABLE `jadwal_rps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_penilaians`
--
ALTER TABLE `jenis_penilaians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jenis_teknik_penilaians`
--
ALTER TABLE `jenis_teknik_penilaians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `matrix_cpl_pl`
--
ALTER TABLE `matrix_cpl_pl`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `mk`
--
ALTER TABLE `mk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nilai_akhir_mk`
--
ALTER TABLE `nilai_akhir_mk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pl`
--
ALTER TABLE `pl`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `rps`
--
ALTER TABLE `rps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rps_cpls`
--
ALTER TABLE `rps_cpls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `rubrik_analitik`
--
ALTER TABLE `rubrik_analitik`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `rubrik_holistik`
--
ALTER TABLE `rubrik_holistik`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rubrik_rps`
--
ALTER TABLE `rubrik_rps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rubrik_skala_presepsi`
--
ALTER TABLE `rubrik_skala_presepsi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sub_cpmk`
--
ALTER TABLE `sub_cpmk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `teknik_penilaians`
--
ALTER TABLE `teknik_penilaians`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi_subcpmk`
--
ALTER TABLE `transaksi_subcpmk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- Constraints for table `jadwal_rps`
--
ALTER TABLE `jadwal_rps`
  ADD CONSTRAINT `jadwal_rps_rps_id_foreign` FOREIGN KEY (`rps_id`) REFERENCES `rps` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_rps_sub_cpmk_id_foreign` FOREIGN KEY (`sub_cpmk_id`) REFERENCES `sub_cpmk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jenis_teknik_penilaians`
--
ALTER TABLE `jenis_teknik_penilaians`
  ADD CONSTRAINT `jenis_teknik_penilaians_cpmk_id_foreign` FOREIGN KEY (`cpmk_id`) REFERENCES `cpmk` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jenis_teknik_penilaians_jenis_penilaian_id_foreign` FOREIGN KEY (`jenis_penilaian_id`) REFERENCES `jenis_penilaians` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `rps`
--
ALTER TABLE `rps`
  ADD CONSTRAINT `mk_rps` FOREIGN KEY (`mk_id`) REFERENCES `mk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pra_mk` FOREIGN KEY (`pra_mk_id`) REFERENCES `mk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rps_dsn_pngmp` FOREIGN KEY (`dosen_pengampu`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rps_kaprodi` FOREIGN KEY (`kaprodi`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rps_koor_bk` FOREIGN KEY (`dekanft`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rps_pngbg` FOREIGN KEY (`dosen_pengembang`) REFERENCES `dosens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rps_cpls`
--
ALTER TABLE `rps_cpls`
  ADD CONSTRAINT `rps_cpls_cpl_id_foreign` FOREIGN KEY (`cpl_id`) REFERENCES `cpl` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `rps_cpls_rps_id_foreign` FOREIGN KEY (`rps_id`) REFERENCES `rps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rubrik_rps`
--
ALTER TABLE `rubrik_rps`
  ADD CONSTRAINT `rubrik_rps_jadwalrps_id_foreign` FOREIGN KEY (`jadwalrps_id`) REFERENCES `jadwal_rps` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teknik_penilaians`
--
ALTER TABLE `teknik_penilaians`
  ADD CONSTRAINT `teknik_penilaians_cpmk_id_foreign` FOREIGN KEY (`cpmk_id`) REFERENCES `cpmk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
