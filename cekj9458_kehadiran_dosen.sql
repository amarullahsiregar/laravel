-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2024 at 08:51 PM
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
-- Database: `cekj9458_kehadiran_dosen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` char(255) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin 1', 'sambilansada@gmail.com', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, '2024-04-25 13:46:54', '2024-04-25 20:46:54'),
(2, 'Rahman Amarullah', 'ra72garbp@gmail.com', NULL, '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, '2024-05-08 17:55:20', '2024-05-09 00:55:20');

-- --------------------------------------------------------

--
-- Table structure for table `antrianbimbingan`
--

CREATE TABLE `antrianbimbingan` (
  `id_antrian` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama_mahasiswa` varchar(50) NOT NULL,
  `topik_ta` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL COMMENT 'Email Dosen bersangkutan',
  `waktu_pengajuan` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Menunggu','Proses','Selesai') NOT NULL DEFAULT 'Menunggu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `antrianbimbingan`
--

INSERT INTO `antrianbimbingan` (`id_antrian`, `nim`, `nama_mahasiswa`, `topik_ta`, `email`, `waktu_pengajuan`, `status`) VALUES
(28, '14117135', 'Rahman Amarullah Siregar', 'APLIKASI INFORMASI KEHADIRAN DOSEN DAN PENJADWALAN BIMBINGAN TUGAS AKHIR TEKNIK INFORMATIKA ITERA MENGGUNAKAN Personal Extreme Programming', 'aidil.afriansyah@if.itera.ac.id', '2024-04-29 04:28:51', 'Proses'),
(29, '14117135', 'Rahman Amarullah Siregar', 'APLIKASI INFORMASI KEHADIRAN DOSEN DAN PENJADWALAN BIMBINGAN TUGAS AKHIR TEKNIK INFORMATIKA ITERA MENGGUNAKAN Personal Extreme Programming', 'firman.ashari@if.itera.ac.id', '2024-04-29 04:29:03', 'Menunggu'),
(31, '14117015', 'Andika Haris Pratama', 'Rancang Bangun Sistem Informasi Donasi Online Bahagia Bersama Anak Yatim', 'andika.setiawan@if.itera.ac.id', '2024-04-29 05:01:20', 'Menunggu'),
(33, '14117015', 'Andika Haris Pratama', 'Rancang Bangun Sistem Informasi Donasi Online Bahagia Bersama Anak Yatim', 'aidil.afriansyah@if.itera.ac.id', '2024-04-29 07:30:09', 'Menunggu'),
(34, '14117015', 'Andika Haris Pratama', 'Rancang Bangun Sistem Informasi Donasi Online Bahagia Bersama Anak Yatim', 'andika.setiawan@if.itera.ac.id', '2024-04-29 07:30:30', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dosens`
--

CREATE TABLE `dosens` (
  `id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `password` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inisial_dosen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status_kehadiran` enum('Hadir','Tidak Hadir','Mengajar') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Tidak Hadir',
  `kesediaan_bimbingan` enum('Bersedia','Tidak') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Tidak',
  `slot_bimbingan` int(5) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dosens`
--

INSERT INTO `dosens` (`id`, `email`, `email_verified_at`, `nama`, `password`, `remember_token`, `inisial_dosen`, `status_kehadiran`, `kesediaan_bimbingan`, `slot_bimbingan`, `created_at`, `updated_at`) VALUES
(1, 'aidil.afriansyah@if.itera.ac.id', NULL, 'Aidil Afriansyah, S.Kom., M.Kom.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'AAF', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:50:53', '2024-04-28 12:33:29'),
(2, 'andika.setiawan@if.itera.ac.id', NULL, 'Andika Setiawan S.Kom., M.Cs.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'ANS', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:51:51', '2024-04-28 12:33:35'),
(3, 'andre.febrianto@if.itera.ac.id', NULL, 'Andre Febrianto S.Kom., M.Eng', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'AFO', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:52:57', '2024-04-28 12:33:45'),
(4, 'cahyo.untoro@if.itera.ac.id', NULL, 'Meida Cahyo Untoro, S.Kom., M.Kom.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'MCU', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:55:34', '2024-04-28 12:33:50'),
(5, 'eko.nugroho@if.itera.ac.id', NULL, 'Eko Dwi Nugroho, S.Kom., M.Cs.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'EDN', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:56:06', '2024-04-28 12:33:53'),
(6, 'firman.ashari@if.itera.ac.id', NULL, 'Ilham Firman Ashari, S.Kom., M.T.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'IFA', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:56:37', '2024-04-28 12:33:56'),
(7, 'miranti.verdiana@if.itera.ac.id', NULL, 'Miranti Verdiana, M.Si.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'MIV', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:57:31', '2024-04-28 12:34:00'),
(8, 'mugi.praseptiawan@if.itera.ac.id', NULL, 'Ir. Mugi Praseptiawan, S.T., M.Kom.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'MPS', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:58:03', '2024-04-28 12:34:04'),
(9, 'muhammad.algifari@if.itera.ac.id', NULL, 'Muhammad Habib Algifari, S.Kom., M.T.I.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'MHA', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 13:59:04', '2024-04-28 12:34:08'),
(10, 'radhinka.bagaskara@if.itera.ac.id', NULL, 'Radhinka Bagaskara, S.Si.Kom., M.Si., M.Sc.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'RDB', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 14:29:37', '2024-04-28 12:34:11'),
(11, 'sarwono.sutikno@if.itera.ac.id', NULL, 'Sarwono Sutikno, Dr.Eng.,CSX-F,IIAP,CC', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'SAS', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 14:53:20', '2024-04-28 12:34:15'),
(12, 'winda.yulita@if.itera.ac.id', NULL, 'Winda Yulita, M.Cs.', '$2y$12$neiDl43PjvCQXlLdqAli5u9ha1uVWfgbicqIRRgqichdELoQzzRxW', NULL, 'WIY', 'Tidak Hadir', 'Tidak', 0, '2024-04-23 14:53:55', '2024-04-28 12:34:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jam_bimbingan`
--

CREATE TABLE `jam_bimbingan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `nim` int(11) NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` char(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topik_ta` varchar(255) NOT NULL,
  `dosbing1` varchar(50) NOT NULL,
  `dosbing2` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Table Data Mahasiswa';

--
-- Dumping data for table `mahasiswas`
--

INSERT INTO `mahasiswas` (`nim`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `topik_ta`, `dosbing1`, `dosbing2`, `created_at`, `updated_at`) VALUES
(14117001, 'Tasya Karinda', 'tasya.14117001@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Sistem Pendukung Keputusan untuk Seleksi Calon Konsumen KPR Menggunakan Metode Analytic Hierrarchy Process (Studi Kasus: PT. XYZ)', 'andika.setiawan@if.itera.ac.id', 'cahyo.untoro@if.itera.ac.id', '2024-04-24 09:20:02', '2024-04-26 11:08:57'),
(14117015, 'Andika Haris', 'andika.14117015@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Sistem Informasi Donasi Online Bahagia Bersama Anak Yatim', 'aidil.afriansyah@if.itera.ac.id', 'andika.setiawan@if.itera.ac.id', '2024-04-15 05:01:00', '2024-04-29 14:31:29'),
(14117018, 'Jeans Prima Simaremare', 'jeans.14117018@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'EKSTRAKSI DAN KLASIFIKASI KATA DASAR DARI DOKUMEN BERBAHASA BATAK TOBA DENGAN ALGORITMA PORTER STEMMER DAN LIKELIHOOD', 'aidil.afriansyah@if.itera.ac.id', 'radhinka.bagaskara@if.itera.ac.id', '2024-04-28 23:23:37', '2024-04-29 06:23:37'),
(14117033, 'Dewa Ayu Putu Widiasari', 'dewa.14117033@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'PERBANDINGAN METODE MAXIMUM MARGINAL RELEVANCE (MMR) DENGAN METODE TEXTRANK PADA PERINGKASAN TEKS BERITA OTOMATIS', 'winda.yulita@if.itera.ac.id', 'cahyo.untoro@if.itera.ac.id', '2024-04-28 23:41:46', '2024-04-29 06:41:46'),
(14117039, 'Liga Septian', 'satu.empatpuluh@gmail.com', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'PERBANDINGAN METODE UNDERSAMPING DAN OVERSAMPLING DALAM MENENTUKAN ALGORITMA REBALANCE', 'cahyo.untoro@if.itera.ac.id', NULL, '2024-04-21 22:41:47', '2024-04-22 05:41:47'),
(14117047, 'Adila Gita Risnanda', 'adila.14117047@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Penerapan Augmented Reality Pada Pengenalan Katalog Produk Ekspor Dengan Metode Marker Based Tracking (Studi Kasus: PT. Rollindo Rabbani Makmur) ', 'eko.nugroho@if.itera.ac.id', 'aidil.afriansyah@if.itera.ac.id', '2024-04-28 23:47:39', '2024-04-29 06:47:39'),
(14117053, 'Hendri Tri Putra', 'hendri.14117053@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'SISTEM INFORMASI SURAT MENYURAT BERBASIS WEB MENGGUNAKAN API WHATSAPP DAN VALIDASI QR CODE DENGAN METODE WATERFALL (STUDI KASUS: BANK LAMPUNG)', 'mugi.praseptiawan@if.itera.ac.id', 'miranti.verdiana@if.itera.ac.id', '2024-04-28 23:16:48', '2024-04-29 06:16:48'),
(14117055, 'Aldi Indrawan', 'aldi.14117055@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'RANCANG BANGUN SISTEM INFORMASI TUGAS AKHIR DENGAN METODE AGILE SOFTWARE DEVELOPMENT STUDI KASUS: TEKNIK INFORMATIKA INSTITUT TEKNOLOGI SUMATERA', 'firman.ashari@if.itera.ac.id', 'andika.setiawan@if.itera.ac.id', '2024-04-28 23:41:46', '2024-04-29 06:41:46'),
(14117089, 'Anggara Maulana Mafdivia', 'anggara.14117089@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'IMPLEMENTASI PEMODELAN CNN PADA SPEECH EMOTION RECOGNITION UNTUK DETEKSI EMOSI PADA REKAMAN SUARA MENGGUNAKAN  BAHASA INDONESIA', 'andika.setiawan@if.itera.ac.id', 'winda.yulita@if.itera.ac.id', '2024-04-28 23:31:33', '2024-04-29 06:31:33'),
(14117098, 'Riwandy', 'riwandy.14117098@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Rancang Bangun Sistem Informasi Pengelolaan Asisten Praktikum Lab. Teknik Informatika ITERA', 'aidil.afriansyah@if.itera.ac.id', 'andika.setiawan@if.itera.ac.id', '2024-04-28 23:51:03', '2024-04-29 15:23:01'),
(14117100, 'Hamba Allah', 'hamba.allah@gmail.com', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Analisis Metode ABCDEFG Terhadap Objek XYZ', 'andika.setiawan@if.itera.ac.id', 'amirul.iqbal@if.itera.ac.id', '2024-04-13 06:47:49', '2024-04-15 11:27:53'),
(14117101, 'Robby Legitra Kurniawan', 'robby.14117101@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'PENERAPAN TEKNOLOGI AUGMENTED REALITY PADA KOTAK OBAT LANSIA DENGAN MENGGUNAKAN METODE MARKER BASED', 'aidil.afriansyah@if.itera.ac.id', 'mugi.praseptiawan@if.itera.ac.id', '2024-04-28 23:16:48', '2024-04-29 06:16:48'),
(14117109, 'Steven Hermadoni', 'steven.14117109@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Rancang bangun sistem informasi dashboard berbasis website menggunakan metode RAD ( Rapid Application Development).\r\nStudi kasus : Prosus Inten.', 'muhammad.algifari@if.itera.ac.id', 'andika.setiawan@if.itera.ac.id', '2024-04-28 23:31:33', '2024-04-29 06:31:33'),
(14117112, 'M. Yafi Fahmi', 'muhammad.14117112@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'RANCANG BANGUN SISTEM INFORMASI LABORATORIUM PROGRAM STUDI TEKNIK INFORMATIKA INSTITUT TEKNOLOGI SUMATERA DENGAN METODE PERSONAL EXTREME PROGRAMMING', 'angga.wijaya@if.itera.ac.id', 'firman.ashari@if.itera.ac.id', '2024-04-28 23:23:37', '2024-04-29 06:23:37'),
(14117117, 'M Rizki Ramadhan', 'm.14117117@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'SISTEM MONITORING DAN PENYIRAMAN OTOMATIS TANAMAN TOMAT BERBASIS INTERNET OF THINGS MENGGUNAKAN METODE FUZZY SUGENO', 'cahyo.untoro@if.itera.ac.id', 'aidil.afriansyah@if.itera.ac.id', '2024-04-13 06:58:36', '2024-04-13 13:58:36'),
(14117126, 'Said Rizky Abizard ', 'said.14117126@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Deteksi Berita Hoax Menggunakan Metode Support Vector Machine Pada Berita Online di Provinsi Lampung', 'meida.cahyo@if.itera.ac.id', NULL, '2024-04-15 04:31:40', '2024-04-15 11:31:40'),
(14117135, 'Rahman Amarullah Siregar', 'rahman.14117135@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'ANALISIS SENTIMEN PUBLIK TERHADAP CALON PRESIDEN REPUBLIK INDONESIA PADA PEMILU 2024 MENGGUNAKAN METODE IndoBERT', 'aidil.afriansyah@if.itera.ac.id', 'firman.ashari@if.itera.ac.id', '2024-04-28 13:32:23', '2024-04-29 12:07:31'),
(14117142, 'Deniesh Nathanael Virginiel', 'deniesh.14117142@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'MODEL SISTEM REKOMENDASI INDEKOS ITERA MENGGUNAKAN CONTENT-BASED FILTERING DAN COLLABORATIVE FILTERING', 'cahyo.untoro@if.itera.ac.id', NULL, '2024-04-28 05:31:17', '2024-04-28 12:31:17'),
(14117145, 'Muhammad Telaga Nur Handi Nindita', 'muhammad.14117145@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'SISTEM INFORMASI ELECTRONIC DOCUMENT INTEGRATION (EDI) BERBASIS WEBSITE DAN MOBILE MENGGUNAKAN METODE RAD\n( STUDI KASUS : CV. TGEXPRESS)', 'andre.febrianto@if.itera.ac.id 	', 'muhammad.algifari@if.itera.ac.id', '2024-04-10 20:33:03', '2024-04-15 05:33:12'),
(14117148, 'Ratu Mega Aprillia', 'ratu.14117148@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Klasifikasi Ulasan Palsu pada produk kosmetik menggunakan XGBoost', 'andika.setiawan@if.itera.ac.id', 'miranti.verdiana@if.itera.ac.id', '2024-04-28 23:47:39', '2024-04-29 06:47:39'),
(14117153, 'Christio Danny Gratia Ambarita', 'christio.14117153@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'PERBANDINGAN JARAK EUCLIDEAN DENGAN MANHATTAN PADA DATASET STEAM DENGAN MULTI-CLASS CONFUSION MATRIX', 'cahyo.untoro@if.itera.ac.id', 'firman.ashari@if.itera.ac.id', '2024-04-28 23:31:33', '2024-04-29 06:31:33'),
(14117166, 'Rozi Alqomar', 'rozi.14117166@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Perancangan sistem pemesanan makanan dan minuman berbasis web mobile ( Studi Kasus : Caffe Putti Roofspace)', 'andre.febrianto@if.itera.ac.id', 'andika.setiawan@if.itera.ac.id', '2024-04-22 17:34:35', '2024-04-23 00:34:35'),
(14117170, 'Gusti Nugroho', 'gusti.14117170@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'PURWARUPA SISTEM PERINGATAN DINI PADA BANJIR BERBASIS INTERNET OF THINGS UNTUK MENANGANI BANJIR', 'mugi.praseptiawan@if.itera.ac.id', 'eko.nugroho@if.itera.ac.id', '2024-04-28 23:47:39', '2024-04-29 06:47:39'),
(14117179, 'CIKAL ARVI YULIAWAN', 'cikal.14117179@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, '\"ANALISIS PERBANDINGAN DISTANCE MEASURE PADA ALGORITMA K-MEANS CLUSTERING DALAM TINGKAT KRIMINALITAS MENGGUNAKAN METODE EVALUASI SILHOUETTE COEFFICIENT (STUDI KASUS : WILAYAH BANDAR LAMPUNG)\"', 'andika.setiawan@if.itera.ac.id', '', '2024-04-28 23:41:46', '2024-04-29 06:41:46'),
(118140148, 'Ramadhanu Britan Linardi', 'ramadhanu.118140148@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'SISTEM PAKAR REKOMENDASI PEMILIHAN ALAT CAMPING MENGGUNAKAN METODE FORWARD CHAINING', 'andika..setiawan@if.itera.ac.id', 'miranti.verdiana@if.itera.ac.id', '2024-04-29 08:02:09', '2024-04-29 15:02:09'),
(119140023, 'Dodi Devrian Andrianto', 'dodi.119140023@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Rancang Bangun Sistem Informasi Kursus Online Praktikum Berbasis Website Menggunakan Metode Extreme Programming (Studi Kasus : Laboratorium Teknik Informatika ITERA)', 'andika.setiawan@if.itera.ac.id', 'aidil.afriansyah@if.itera.ac.id', '2024-04-29 00:00:52', '2024-04-29 07:00:52'),
(119140079, 'Ahmad Adriansyah Hasibuan', 'ahmad.119140079@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'Perbandingan Metode Support Vector Machine Dan K-Nearest Neighbor Dalam Klasifikasi Gangguan Tidur', 'winda.yulita@if.itera.ac.id', 'miranti.verdiana@if.itera.ac.id', '2024-04-29 00:00:52', '2024-04-29 07:00:52'),
(119140162, 'Rendy Noor Darmawan', 'rendy.119140162@student.itera.ac.id', NULL, '$2y$12$ZY0WUGzLoPffJGek.zkh7uFmoOXCvTH4IOX6hvScB7lCx6Nw1/44G', NULL, 'RANCANG BANGUN SISTEM INVENTORY BARANG BERBASIS WEBSITE MENGGUNAKAN METODE RAPID APPLICATION DEVELOPMENT (Studi Kasus : CV. Panca Manunggal Abadi )', 'aidil.afriansyah@if.itera.ac.id', 'mugi.praseptiawan@if.itera.ac.id', '2024-04-29 00:00:52', '2024-04-29 07:49:44');

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
(1, '2024_04_08_053240_coba_migrasi', 1),
(2, '2024_04_08_053240_tambah_keahlian_dosen', 2),
(3, '0001_01_01_000001_create_cache_table', 3),
(4, '0001_01_01_000002_create_jobs_table', 3),
(5, '2024_04_25_231029_create_jam_bimbingan_table', 4);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` char(40) NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('28vVbS03dSPb7yHuJ2lWMsbGPHeG2qaOoxZjgYfX', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYWVoQjc2cE51aFV5THZGOUR6VzA0THZBaFRqME5tTFcxRVcwMmwxMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO047czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3dlbGNvbWUiO319', 1715191822),
('2KvxCWNkNshAikmhHqHat9paLpMbEVY1wyZGozWQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiM2lQQnJjUTZyczdTb0h3Zm1FT2N6NUpFQlpwZDZkVEhJZkZncXVmSiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3dlbGNvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7Tjt9', 1715191867),
('7w0nJITFidEEt87NE9E2XGyoFBV50lHh1fx2BOzA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTmJFTGZNRFBFYzN3R2tST3lpM0dxb3dPSFRQaDVQREQ0R2lFRW9hWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluLWRhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjIxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjU2OiJsb2dpbl9tYWhhc2lzd2FfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDExNzEzNTt9', 1715194274),
('b9LzT404S45qLvSoZDEbn65arspoBP45LGrgM5dw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNDNWNTJqV3hYa1BMVlBjNnRKcFhJemtUMURxOXFMc05qTXNiQjFSRiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluLWRhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO30=', 1715192246),
('EKxdCWf2Zxy1YkcLW4xF9WbY9fG9XtXBZiFqT10r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRWpFZHY0eWt6cnhwOEJtWHdRdFdhWFFBbWs0MG5HWVZtN1NzaEpzeiI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3dlbGNvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7Tjt9', 1715192196),
('eRDfrMLb2xD3cAV36S4rVKsrSF9QVyixuYxnfdcw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoicHdHT1VQYnp5ZmVwSnRSSHhCcVY2dFdUbzhJNGFaNFpLR1BmSzRmdyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC93ZWxjb21lIjt9czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7Tjt9', 1715191926),
('Lc5yc8EX8O8mmYdt2WdKoULYlB3WLcqNZGnEM2kQ', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiNDk3Z3FBNWNpenloTGQ0R1hzeWVrRXhLNFUwakNSWkx0WmdwaFRzRSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1kYXNoYm9hcmQiO31zOjU2OiJsb2dpbl9tYWhhc2lzd2FfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxNDExNzEzNTtzOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO30=', 1715192341),
('mGpuzGwL7Xcl96EwtvYqQ0KdRK78REBp6X5Bxp6T', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic25QaE1vSVJtSGdFNThGMjIxRzc5Z3RNdXN6T0ZSYUgzdW0zcnBRZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3dlbGNvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1NjoibG9naW5fbWFoYXNpc3dhXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTQxMTcxMzU7czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7Tjt9', 1715191995),
('N3Ku6ZSEkiUtekEAUeDLZnXnKftTiscQ7mlidrS1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVnh6OU9tMkh3M0JLYzVrVE5kZUtRWDYxYlVGUWhjdnp6QlJMVHllbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi1kYXNoYm9hcmQiO31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO30=', 1715194149),
('U9li4tuegY3aR1FfGSUu8uFEP2AU1wEmfXCTaNlK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibXZPWHBpZXZvb09CVjdxNk1mR1p1Y1VQdU5BNmJnYTBXTEVDUjdrSyI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyOToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3dlbGNvbWUiO31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MjoibG9naW5fYWRtaW5fNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7Tjt9', 1715191835),
('Uea5LY966yGpWhUHHWCQaFaVysfjOrSXHjUUHQCW', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:126.0) Gecko/20100101 Firefox/126.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiZXV2WGJFWDRDRTFLbnlGSnJTSDBGbEpvQXQzQzlUc3hYdGVFdmdPUCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FkbWluLWRhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbG9naW4iO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtOO30=', 1715192354);

-- --------------------------------------------------------

--
-- Table structure for table `statushadirdosen`
--

CREATE TABLE `statushadirdosen` (
  `id_status` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status_kehadiran` enum('Hadir','Tidak Hadir','Mengajar') NOT NULL,
  `kesediaan_bimbingan` enum('Bersedia','Tidak') DEFAULT NULL,
  `slot_bimbingan` int(5) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statushadirdosen`
--

INSERT INTO `statushadirdosen` (`id_status`, `email`, `tanggal`, `status_kehadiran`, `kesediaan_bimbingan`, `slot_bimbingan`, `keterangan`, `updated_at`) VALUES
(1, 'aidil.afriansyah@if.itera.ac.id', '2024-04-18', 'Hadir', 'Bersedia', 5, 'di kantor prodi', '2024-04-28 02:51:02'),
(2, 'andika.setiawan@if.itera.ac.id', '2024-04-18', 'Hadir', 'Bersedia', 5, 'kelas drpl', '2024-04-28 02:09:08'),
(3, 'eko.nugroho@if.itera.ac.id', '2024-04-18', 'Mengajar', 'Bersedia', NULL, 'Di ruang prodi', '2024-04-26 08:15:05'),
(4, 'muhammad.algifari@if.itera.ac.id', '2024-04-18', 'Mengajar', 'Bersedia', NULL, NULL, '2024-04-26 08:15:05'),
(5, 'cahyo.untoro@if.itera.ac.id', '2024-04-18', 'Tidak Hadir', 'Tidak', NULL, 'Di Kantor Prodi\r\n', '2024-04-29 07:33:23'),
(6, 'firman.ashari@if.itera.ac.id', '2024-04-18', 'Mengajar', 'Tidak', 5, 'Di Kantor Prodi\r\n', '2024-04-28 21:52:33'),
(7, 'radhinka.bagaskara@if.itera.ac.id', '2024-04-18', 'Hadir', 'Bersedia', NULL, 'Di Kantor Prodi\r\n', '2024-04-26 08:15:05'),
(8, 'mugi.praseptiawan@if.itera.ac.id', '2024-04-18', 'Hadir', 'Bersedia', NULL, NULL, '2024-04-26 08:15:05'),
(9, 'andre.febrianto@if.itera.ac.id', '2024-04-18', 'Hadir', 'Bersedia', NULL, NULL, '2024-04-26 08:15:05'),
(10, 'winda.yulita@if.itera.ac.id', '2024-04-18', 'Hadir', 'Bersedia', 5, NULL, '2024-04-28 15:56:02'),
(13, 'sarwono.sutikno@if.itera.ac.id', '2024-04-24', 'Hadir', 'Tidak', NULL, NULL, '2024-04-26 08:15:05'),
(14, 'miranti.verdiana@if.itera.ac.id', '2024-04-24', 'Hadir', 'Bersedia', NULL, NULL, '2024-04-26 08:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(0, 'Rahman Amarullah Siregar', 'rahman.14117135@student.itera.ac.id', '2024-04-27 13:30:44', '$2y$12$Gisow6MrXhj.Nv/bpdt3b.7m3eiehB3FPJR.t2E1B2Z8BHvgBd4Ey', NULL, '2024-04-27 13:30:54', '2024-04-27 13:32:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id_admin` (`id_admin`);

--
-- Indexes for table `antrianbimbingan`
--
ALTER TABLE `antrianbimbingan`
  ADD PRIMARY KEY (`id_antrian`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `dosens`
--
ALTER TABLE `dosens`
  ADD PRIMARY KEY (`email`),
  ADD KEY `email` (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jam_bimbingan`
--
ALTER TABLE `jam_bimbingan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_activity` (`last_activity`);

--
-- Indexes for table `statushadirdosen`
--
ALTER TABLE `statushadirdosen`
  ADD PRIMARY KEY (`id_status`),
  ADD UNIQUE KEY `email` (`email`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `antrianbimbingan`
--
ALTER TABLE `antrianbimbingan`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `dosens`
--
ALTER TABLE `dosens`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jam_bimbingan`
--
ALTER TABLE `jam_bimbingan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `statushadirdosen`
--
ALTER TABLE `statushadirdosen`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
