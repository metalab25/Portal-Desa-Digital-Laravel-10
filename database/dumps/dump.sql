-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 02, 2024 at 01:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portaldesadigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO `agamas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Islam', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Kristen', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Katholik', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Hindu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Budha', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'Khonghucu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'Kepercayaan Terhadap Tuhan YME / Lainnya', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `bantuans`
--

CREATE TABLE `bantuans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bantuan_sasaran_id` bigint UNSIGNED NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `mulai` date DEFAULT NULL,
  `akhir` date DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuans`
--

INSERT INTO `bantuans` (`id`, `nama`, `bantuan_sasaran_id`, `deskripsi`, `mulai`, `akhir`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Bantuan Langsung Tunai Dana Desa (BLT-DD)', 2, 'Bantuan tunai yang diberikan kepada keluarga penerima manfaat (KPM) di desa. Program ini bertujuan untuk membantu meningkatkan ekonomi masyarakat yang kurang mampu.', '2024-01-01', '2024-12-31', 1, '2024-10-30 14:33:38', '2024-10-31 04:12:58'),
(3, 'Bantuan Jaminan Kesehatan Nasional (JKN)', 1, 'Program bantuan sosial yang membantu masyarakat kurang mampu mendapatkan layanan jaminan kesehatan melalui BPJS Kesehatan', '2024-01-01', '2024-12-31', 1, '2024-10-31 02:25:12', '2024-10-31 02:25:12'),
(4, 'Bantuan  Rumah Tidak Layak Huni (RTLH)', 2, 'Bantuan  Rumah Tidak Layak Huni (RTLH) adalah program yang bertujuan untuk meningkatkan kualitas tempat tinggal keluarga miskin dengan memperbaiki atau merehabilitasi rumah mereka', '2024-01-01', '2024-12-31', 1, '2024-10-31 02:29:11', '2024-10-31 04:11:25'),
(5, 'Bantuan Modal Usaha', 3, 'Program ini diberikan untuk memfasilitasi masyarakat desa yang ingin membuka usaha atau meningkatkan usaha yang sudah ada.', '2024-01-01', '2024-12-31', 1, '2024-10-31 19:09:19', '2024-10-31 19:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_penerimas`
--

CREATE TABLE `bantuan_penerimas` (
  `id` bigint UNSIGNED NOT NULL,
  `bantuan_id` bigint UNSIGNED NOT NULL,
  `bantuan_sasaran_id` bigint UNSIGNED NOT NULL,
  `keluarga_id` bigint UNSIGNED DEFAULT NULL,
  `penduduk_id` bigint UNSIGNED DEFAULT NULL,
  `kelompok_id` bigint UNSIGNED DEFAULT NULL,
  `no_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_kartu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuan_penerimas`
--

INSERT INTO `bantuan_penerimas` (`id`, `bantuan_id`, `bantuan_sasaran_id`, `keluarga_id`, `penduduk_id`, `kelompok_id`, `no_kartu`, `nama_kartu`, `nik_kartu`, `tempat_lahir_kartu`, `tanggal_lahir_kartu`, `alamat_kartu`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, NULL, NULL, '1252351455', 'Happy Agung Pribadi', '5271052507820001', 'Jakarta', '1982-07-25', 'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan', 0, '2024-10-30 15:24:24', '2024-10-30 15:24:24'),
(2, 1, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-30 16:23:10', '2024-10-30 16:23:10'),
(3, 1, 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-30 16:31:23', '2024-10-30 16:31:23'),
(4, 3, 1, NULL, 1, NULL, '0002075306477', 'Happy Agung Pribadi', '5271052507820001', 'Jakarta', '1982-07-25', 'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan', 1, '2024-10-31 02:33:58', '2024-10-31 02:33:58'),
(6, 3, 1, NULL, 3, NULL, '0000146966286', 'Elis Nuwati', '1234567899582525', 'Kupang', '1979-03-21', 'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan', 1, '2024-10-31 02:47:52', '2024-10-31 02:47:52'),
(7, 3, 1, NULL, 10, NULL, '0003513924235', 'Arjuna Arya Sena Agung', NULL, 'Mataram', '2023-03-22', 'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan', 1, '2024-10-31 03:26:13', '2024-10-31 03:26:13'),
(8, 5, 3, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-31 19:10:48', '2024-10-31 19:10:48'),
(9, 5, 3, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-31 19:10:56', '2024-10-31 19:10:56'),
(10, 5, 3, NULL, NULL, 4, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-31 19:11:03', '2024-10-31 19:11:03'),
(11, 5, 3, NULL, NULL, 9, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-31 19:11:11', '2024-10-31 19:11:11');

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_sasarans`
--

CREATE TABLE `bantuan_sasarans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuan_sasarans`
--

INSERT INTO `bantuan_sasarans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Penduduk', NULL, NULL),
(2, 'Keluarga', NULL, NULL),
(3, 'Kelompok', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cacats`
--

CREATE TABLE `cacats` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cacats`
--

INSERT INTO `cacats` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Cacat Fisik', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Cacat Netra/Buta', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Cacat Rungu/Wicara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Cacat Mental/Jiwa', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Cacat Fisik dan Mental', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'Cacat Lainnya', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'Tidak Cacat', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `cara_kbs`
--

CREATE TABLE `cara_kbs` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_kelamin_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cara_kbs`
--

INSERT INTO `cara_kbs` (`id`, `jenis_kelamin_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kondom', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 1, 'Sterilisasi Pria', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 2, 'Pil', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 2, 'Iud', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 2, 'Suntik', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 2, 'Susuk KB', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 2, 'Sterilisasi Wanita', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 2, 'Lainnya', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(9, 2, 'Tidak KB', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kepala_camat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_kepala_camat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provinsi_id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zoom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` longtext COLLATE utf8mb4_unicode_ci,
  `alamat_kantor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kantor_desa` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `nama_desa`, `kode_desa`, `nama_kepala_desa`, `nip_kepala_desa`, `phone_kepala_desa`, `kode_pos`, `nama_kecamatan`, `kode_kecamatan`, `nama_kepala_camat`, `nip_kepala_camat`, `nama_kabupaten`, `kode_kabupaten`, `provinsi_id`, `logo`, `ttd`, `lat`, `lang`, `zoom`, `map_tipe`, `path`, `alamat_kantor`, `email_desa`, `telepon`, `website`, `kantor_desa`, `created_at`, `updated_at`) VALUES
(1, 'Ampenan Tengah', '1005', 'Bahrudin', '112 223 3344 555', NULL, '83112', 'Ampenan', '01', 'Suryadi', NULL, 'Mataram', '71', 52, 'logos/odrEL5ufGT38akhfGRzJfzSzYrnjWVCTrburGAzY.png', NULL, NULL, NULL, NULL, NULL, NULL, 'Jl. Rampai No.5', 'desasongkel@gmail.com', '0365023562', 'https://www.songkel.desa.id', NULL, '2024-10-26 16:32:06', '2024-11-02 08:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `dusuns`
--

CREATE TABLE `dusuns` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penduduk_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dusuns`
--

INSERT INTO `dusuns` (`id`, `nama`, `penduduk_id`, `created_at`, `updated_at`) VALUES
(1, 'Melayu Bangsal', 1, '2024-10-26 16:32:51', '2024-10-29 11:51:17'),
(2, 'Melayu Tengah', 4, '2024-10-27 10:02:07', '2024-10-29 11:51:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golongan_darahs`
--

CREATE TABLE `golongan_darahs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan_darahs`
--

INSERT INTO `golongan_darahs` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'A', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'B', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'AB', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'O', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'A+', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'A-', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'B+', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 'B-', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(9, 'AB+', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(10, 'AB-', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(11, 'O+', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(12, 'O-', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(13, 'Tidak Tahu', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `hubungan_keluargas`
--

CREATE TABLE `hubungan_keluargas` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hubungan_keluargas`
--

INSERT INTO `hubungan_keluargas` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Keluarga', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Suami', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Istri', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Anak', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Menantu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'Cucu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'Orang Tua', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 'Mertua', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(9, 'Famili', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(10, 'Pembantu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(11, 'Lainnya', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tupoksi` longtext COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama`, `excerpt`, `tupoksi`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kepala Desa', '', NULL, 1, '2024-10-29 06:47:01', '2024-10-29 06:47:01'),
(2, 'Sekretaris Desa', '', NULL, 1, '2024-10-29 06:48:09', '2024-10-29 06:48:09'),
(3, 'Kepala Urusan Pemerintahan', '', NULL, 1, '2024-10-29 06:48:21', '2024-10-29 06:48:21'),
(4, 'Kepala Urusan Keuangan', '', NULL, 1, '2024-10-29 06:48:32', '2024-10-29 06:48:32'),
(5, 'Kepala Urusan Pemberdayaan', '', NULL, 1, '2024-10-29 06:48:44', '2024-10-29 06:48:44'),
(7, 'Kepala Urusan Pelayanan', 'Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :Melaksanakan pen...', '<p>Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :</p><ol><li>Melaksanakan penyuluhan dan motivasi kepada masyarakat terkait hak dan kewajiban mereka&nbsp;</li><li>Meningkatkan partisipasi masyarakat&nbsp;</li><li>Melestarikan nilai sosial budaya, keagamaan, dan ketenagakerjaan masyarakat&nbsp;</li><li>Melakukan pekerjaan teknis pelayanan nikah, talak, cerai, dan rujuk</li><li>Melakukan pekerjaan teknis urusan kelahiran dan kematian</li><li>Membangun sarana dan prasarana perdesaan</li><li>Membangun bidang pendidikan</li><li>Membangun bidang kesehatan</li><li>Membantu Kepala Desa dalam melaksanakan tugas pelayanan sosial kemasyarakatan dan peningkatan kapasitas</li><li>Melaksanakan tugas-tugas kedinasan lain yang diberikan oleh atasan&nbsp;</li></ol>', 1, '2024-10-29 07:07:35', '2024-10-29 07:07:35'),
(8, 'Staf Urusan Pelayanan', 'Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :Melaksanakan pen...', '<p>Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :</p><ol><li>Melaksanakan penyuluhan dan motivasi kepada masyarakat terkait hak dan kewajiban mereka&nbsp;</li><li>Meningkatkan partisipasi masyarakat&nbsp;</li><li>Melestarikan nilai sosial budaya, keagamaan, dan ketenagakerjaan masyarakat&nbsp;</li><li>Melakukan pekerjaan teknis pelayanan nikah, talak, cerai, dan rujuk</li><li>Melakukan pekerjaan teknis urusan kelahiran dan kematian</li><li>Membangun sarana dan prasarana perdesaan</li><li>Membangun bidang pendidikan</li><li>Membangun bidang kesehatan</li><li>Membantu Kepala Desa dalam melaksanakan tugas pelayanan sosial kemasyarakatan dan peningkatan kapasitas</li><li>Melaksanakan tugas-tugas kedinasan lain yang diberikan oleh atasan&nbsp;</li></ol>', 1, '2024-10-29 07:09:28', '2024-10-29 07:09:28');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelahirans`
--

CREATE TABLE `jenis_kelahirans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kelahirans`
--

INSERT INTO `jenis_kelahirans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Tunggal', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Kembar 2', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Kembar 3', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Kembar 4', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamins`
--

CREATE TABLE `jenis_kelamins` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kelamins`
--

INSERT INTO `jenis_kelamins` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Laki-laki', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Perempuan', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `kehamilans`
--

CREATE TABLE `kehamilans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kehamilans`
--

INSERT INTO `kehamilans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Hamil', '2024-10-26 16:32:07', '2024-10-26 16:32:07'),
(2, 'Tidak Hamil', '2024-10-26 16:32:07', '2024-10-26 16:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `kelompoks`
--

CREATE TABLE `kelompoks` (
  `id` bigint UNSIGNED NOT NULL,
  `kelompok_kategori_id` bigint UNSIGNED NOT NULL,
  `penduduk_id` bigint UNSIGNED DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompoks`
--

INSERT INTO `kelompoks` (`id`, `kelompok_kategori_id`, `penduduk_id`, `nama`, `kode`, `deskripsi`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 'Pupuk Sari', '001', NULL, 1, '2024-10-28 00:36:50', '2024-10-28 00:36:50'),
(2, 2, 5, 'Sari Bumi', '002', NULL, 1, '2024-10-28 00:53:36', '2024-10-28 00:53:36'),
(3, 4, 4, 'Karya Bahari', '003', NULL, 1, '2024-10-28 00:54:10', '2024-10-28 00:54:10'),
(4, 1, 3, 'Sumber Rezeki', '004', NULL, 1, '2024-10-28 00:56:47', '2024-10-28 00:56:47'),
(5, 1, 3, 'Sumber Jaya', '005', NULL, 1, '2024-10-28 01:02:02', '2024-10-28 01:02:02'),
(6, 5, 1, 'Sadar Bahari', '006', NULL, 1, '2024-10-28 01:03:09', '2024-10-28 01:03:09'),
(7, 2, 2, 'Sumber Alam', '007', NULL, 1, '2024-10-28 01:05:01', '2024-10-28 01:05:01'),
(8, 5, 6, 'Sinar Pagi', '008', NULL, 1, '2024-10-28 01:05:26', '2024-10-28 01:05:26'),
(9, 5, 6, 'Pesona Alam', '009', NULL, 1, '2024-10-28 01:05:47', '2024-10-28 01:05:47');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_anggotas`
--

CREATE TABLE `kelompok_anggotas` (
  `id` bigint UNSIGNED NOT NULL,
  `kelompok_id` bigint UNSIGNED NOT NULL,
  `penduduk_id` bigint UNSIGNED NOT NULL,
  `kelompok_jabatan_id` bigint UNSIGNED NOT NULL,
  `nomor_anggota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_anggotas`
--

INSERT INTO `kelompok_anggotas` (`id`, `kelompok_id`, `penduduk_id`, `kelompok_jabatan_id`, `nomor_anggota`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 1, '001-20241028-0001', 1, '2024-10-28 02:00:48', '2024-10-28 02:00:48'),
(2, 3, 2, 2, '001-20241028-0002', 1, '2024-10-28 02:16:11', '2024-10-28 02:16:11'),
(3, 3, 1, 3, '001-20241028-0003', 1, '2024-10-28 02:16:30', '2024-10-28 02:16:30'),
(4, 3, 3, 4, '001-20241028-0004', 1, '2024-10-28 02:16:52', '2024-10-28 02:16:52');

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_jabatans`
--

CREATE TABLE `kelompok_jabatans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_jabatans`
--

INSERT INTO `kelompok_jabatans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Ketua', NULL, NULL),
(2, 'Wakil Ketua', NULL, NULL),
(3, 'Sekretaris', NULL, NULL),
(4, 'Bendahara', NULL, NULL),
(5, 'Anggota', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_kategoris`
--

CREATE TABLE `kelompok_kategoris` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_kategoris`
--

INSERT INTO `kelompok_kategoris` (`id`, `nama`, `deskripsi`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Kelompok UMKM', NULL, 1, '2024-10-28 00:03:11', '2024-10-28 00:03:11'),
(2, 'Kelompok Tani', NULL, 1, '2024-10-28 00:11:07', '2024-10-28 00:11:07'),
(3, 'Kelompok Ternak', NULL, 1, '2024-10-28 00:11:17', '2024-10-28 00:11:17'),
(4, 'Kelompok Nelayan', NULL, 1, '2024-10-28 00:53:50', '2024-10-28 00:53:50'),
(5, 'Kelompok Wisata', NULL, 1, '2024-10-28 01:02:42', '2024-10-28 01:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `keluargas`
--

CREATE TABLE `keluargas` (
  `id` bigint UNSIGNED NOT NULL,
  `no_kk` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penduduk_id` bigint UNSIGNED DEFAULT NULL,
  `dusun_id` bigint UNSIGNED DEFAULT NULL,
  `rw_id` bigint UNSIGNED DEFAULT NULL,
  `rt_id` bigint UNSIGNED DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `tanggal_cetak` datetime DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keluargas`
--

INSERT INTO `keluargas` (`id`, `no_kk`, `penduduk_id`, `dusun_id`, `rw_id`, `rt_id`, `alamat`, `tanggal_cetak`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '5271012508080009', 1, 1, 1, 1, 'Gang Kerapu No. 2', NULL, 1, '2024-10-26 16:33:42', '2024-10-27 09:58:33'),
(2, '5271012508080088', 2, 1, 1, 2, 'Jalan Gurita No 6', NULL, 1, '2024-10-26 18:29:25', '2024-10-27 09:58:25'),
(3, '5271012508080100', 4, 2, 2, 3, 'Blok O Griya No.15', NULL, 1, '2024-10-27 10:04:34', '2024-10-27 10:14:36'),
(5, '5271012508080007', 6, 1, 1, 1, 'Gang Kerapu No. 2', NULL, 1, '2024-10-27 10:21:20', '2024-10-27 10:23:30');

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
(1, '2014_10_12_000000_create_provinsis_table', 1),
(2, '2014_10_12_000001_create_pengaturans_table', 1),
(3, '2014_10_12_000002_create_configs_table', 1),
(4, '2014_10_12_000003_create_roles_table', 1),
(5, '2014_10_12_000004_create_users_table', 1),
(6, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(7, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_10_23_171115_create_dusuns_table', 1),
(10, '2024_10_23_171236_create_rws_table', 1),
(11, '2024_10_23_171330_create_rts_table', 1),
(12, '2024_10_23_171514_create_penduduks_table', 1),
(13, '2024_10_24_221945_create_keluargas_table', 1),
(14, '2024_10_24_234955_create_agamas_table', 1),
(15, '2024_10_24_235803_create_jenis_kelamins_table', 1),
(16, '2024_10_25_000457_create_hubungan_keluargas_table', 1),
(17, '2024_10_25_001116_create_status_kawins_table', 1),
(18, '2024_10_25_001444_create_warga_negaras_table', 1),
(19, '2024_10_25_001658_create_golongan_darahs_table', 1),
(20, '2024_10_25_002053_create_status_penduduks_table', 1),
(21, '2024_10_25_002428_create_status_dasars_table', 1),
(22, '2024_10_25_002702_create_status_ktps_table', 1),
(23, '2024_10_25_003259_create_status_rekam_ktps_table', 1),
(24, '2024_10_25_004122_create_cacats_table', 1),
(25, '2024_10_25_004506_create_sakit_menahuns_table', 1),
(26, '2024_10_25_004958_create_cara_kbs_table', 1),
(27, '2024_10_25_010127_create_pendidikan_kks_table', 1),
(28, '2024_10_25_010208_create_pendidikans_table', 1),
(29, '2024_10_25_010230_create_pekerjaans_table', 1),
(30, '2024_10_25_223030_create_jenis_kelahirans_table', 1),
(31, '2024_10_25_223230_create_tempat_kelahirans_table', 1),
(32, '2024_10_25_231822_create_penolong_kelahirans_table', 1),
(33, '2024_10_25_235719_create_jabatans_table', 1),
(34, '2024_10_25_235828_create_pamongs_table', 1),
(35, '2024_10_27_002841_create_kehamilans_table', 1),
(36, '2024_10_28_072614_create_kelompok_kategoris_table', 2),
(37, '2024_10_28_072739_create_kelompoks_table', 2),
(38, '2024_10_28_092917_create_kelompok_anggotas_table', 3),
(39, '2024_10_28_093752_create_kelompok_jabatans_table', 3),
(40, '2024_10_29_100115_create_jabatans_table', 4),
(41, '2024_10_30_211856_create_bantuan_sasarans_table', 5),
(42, '2024_10_30_212440_create_bantuans_table', 6),
(43, '2024_10_30_221653_create_bantuan_penerimas_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pamongs`
--

CREATE TABLE `pamongs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penduduk_id` bigint UNSIGNED DEFAULT NULL,
  `agama_id` bigint UNSIGNED DEFAULT NULL,
  `jenis_kelamin_id` bigint UNSIGNED DEFAULT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan_kk_id` bigint UNSIGNED DEFAULT NULL,
  `no_sk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_sk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `masa_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ttd` tinyint(1) NOT NULL DEFAULT '0',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pamongs`
--

INSERT INTO `pamongs` (`id`, `nama`, `nik`, `jabatan_id`, `nip`, `penduduk_id`, `agama_id`, `jenis_kelamin_id`, `tempat_lahir`, `tanggal_lahir`, `pendidikan_kk_id`, `no_sk`, `tgl_sk`, `masa_jabatan`, `ttd`, `foto`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 1, '123 254 254 0010', 6, NULL, NULL, NULL, NULL, NULL, '123 254 254 4525', '2022-07-15', '2022 s/d 2028', 0, 'pamongs/cJcNSEM2EsUWwAlqaqmkRWhiOPUnjuwlfDWbkWgt.jpg', 1, 1, '2024-10-27 11:15:15', '2024-10-29 01:42:04'),
(2, NULL, NULL, 2, '123 254 254 0525', 1, NULL, NULL, NULL, NULL, NULL, '123 254 254 4555', '2022-08-19', '2022 s/d 2028', 0, 'pamongs/XAnecMhwVrpL4TKBpjE8nqQrmEmacTUCP09G8FwB.webp', 1, 1, '2024-10-27 11:44:28', '2024-10-27 11:44:28');

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
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO `pekerjaans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Belum/Tidak Bekerja', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Mengurus Rumah Tangga', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Pelajar/Mahasiswa', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Pensiunan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Pegawai Negeri Sipil (PNS)', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'Tentara Nasional Indonesia (TNI)', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'Kepolisian (POLRI)', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 'Perdagangan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(9, 'Petani/Pekebun', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(10, 'Peternak', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(11, 'Nelayan/Peternakan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(12, 'Industri', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(13, 'Konstruksi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(14, 'Transportasi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(15, 'Karyawan Swasta', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(16, 'Karyawan BUMN', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(17, 'Karyawan BUMD', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(18, 'Karyawan Honorer', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(19, 'Buruh Harian Lepas', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(20, 'Buruh Tani/Perkebunan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(21, 'Buruh Nelayan/Perikanan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(22, 'Buruh Peternakan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(23, 'Pembantu Rumah Tangga', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(24, 'Tukang Cukur', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(25, 'Tukang Listrik', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(26, 'Tukang Batu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(27, 'Tukang Kayu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(28, 'Tukang Sol Sepatu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(29, 'Tukang Las/Pandai Besi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(30, 'Tukang Jahit', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(31, 'Tukang Gigi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(32, 'Penata Rias', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(33, 'Penata Busana', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(34, 'Penterjemah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(35, 'Imam Masjid', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(36, 'Pendeta', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(37, 'Pastor', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(38, 'Wartawan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(39, 'Uztadz/Mubaligh', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(40, 'Juru Masak', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(41, 'Promotor Acara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(42, 'Anggota DPR RI', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(43, 'Anggota DPD', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(44, 'Anggota BPK', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(45, 'Presiden', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(46, 'Wakil Presiden', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(47, 'Anggota Mahkamah Kostitusi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(48, 'Anggota Kabinet Kementerian', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(49, 'Duta Besar', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(50, 'Gubernur', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(51, 'Wakil Gubernur', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(52, 'Bupati', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(53, 'Wakil Bupati', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(54, 'Walikota', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(55, 'Wakil Walikota', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(56, 'Anggota DPRD Provinsi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(57, 'Anggota DPRD Kabupaten/Kota', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(58, 'Dosen', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(59, 'Guru', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(60, 'Pilot', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(61, 'Pengacara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(62, 'Notaris', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(63, 'Arsitek', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(64, 'Akuntan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(65, 'Konsultan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(66, 'Dokter', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(67, 'Bidan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(68, 'Perawat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(69, 'Apoteker', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(70, 'Psikiater/Psikolog', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(71, 'Penyiar Televisi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(72, 'Penyiar Radio', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(73, 'Pelaut', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(74, 'Peneliti', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(75, 'Sopir', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(76, 'Pialang', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(77, 'Paranormal', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(78, 'Pedagang', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(79, 'Perangkat Desa', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(80, 'Kepala Desa', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(81, 'Biarawati', '2024-10-26 16:32:07', '2024-10-26 16:32:07'),
(82, 'Wiraswasta', '2024-10-26 16:32:07', '2024-10-26 16:32:07'),
(83, 'Lainnya', '2024-10-26 16:32:07', '2024-10-26 16:32:07');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO `pendidikans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Belum Masuk TK/Kelompok Bermain', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Sedang TK/Kelompok Bermain', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Tidak Pernah Sekolah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Sedang SD/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Tidak Tamat SD/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'Sedang SLTP/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'Sedang SLTA/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 'Sedang D-I/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(9, 'Sedang D-II/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(10, 'Sedang D-III/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(11, 'Sedang S-I/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(12, 'Sedang S-II/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(13, 'Sedang S-III/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(14, 'Sedang SLB A/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(15, 'Sedang SLB B/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(16, 'Sedang SLB C/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(17, 'Tidak Dapat Membaca Dan Menulis Huruf Latin/Arab', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(18, 'Tidak Sekolah', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_kks`
--

CREATE TABLE `pendidikan_kks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan_kks`
--

INSERT INTO `pendidikan_kks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Tidak/Belum Sekolah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Belum Tamat SD/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Tamat SD/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'SLTP/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'SLTA/Sederajat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'Diploma I/II', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'Akademi/Diploma III/S. Muda', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 'Diploma IV/Strata I', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(9, 'Strata II', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(10, 'Strata III', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keluarga_id` bigint UNSIGNED NOT NULL,
  `hubungan_keluarga_id` bigint UNSIGNED NOT NULL,
  `jenis_kelamin_id` bigint UNSIGNED NOT NULL,
  `agama_id` bigint UNSIGNED NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `waktu_lahir` time DEFAULT NULL,
  `no_akta_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_ktp_id` bigint UNSIGNED DEFAULT NULL,
  `status_rekam_ktp_id` bigint UNSIGNED DEFAULT NULL,
  `pendidikan_kk_id` bigint UNSIGNED NOT NULL,
  `pendidikan_id` bigint UNSIGNED NOT NULL,
  `pekerjaan_id` bigint UNSIGNED NOT NULL,
  `status_kawin_id` bigint UNSIGNED NOT NULL,
  `warga_negara_id` bigint UNSIGNED NOT NULL,
  `no_paspor` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_akhir_paspor` date DEFAULT NULL,
  `no_kitas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_akhir_kitas` date DEFAULT NULL,
  `golongan_darah_id` bigint UNSIGNED NOT NULL,
  `status_penduduk_id` bigint UNSIGNED NOT NULL,
  `status_dasar_id` bigint UNSIGNED DEFAULT NULL,
  `cacat_id` bigint UNSIGNED DEFAULT NULL,
  `sakit_menahun_id` bigint UNSIGNED DEFAULT NULL,
  `cara_kb_id` bigint UNSIGNED DEFAULT NULL,
  `kehamilan_id` bigint UNSIGNED DEFAULT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_sekarang` text COLLATE utf8mb4_unicode_ci,
  `alamat_sebelumnya` text COLLATE utf8mb4_unicode_ci,
  `nik_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_kawin` date DEFAULT NULL,
  `no_akta_kawin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_cerai` date DEFAULT NULL,
  `no_akta_cerai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `panjang_lahir` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penolong_kelahiran_id` bigint UNSIGNED DEFAULT NULL,
  `tempat_kelahiran_id` bigint UNSIGNED DEFAULT NULL,
  `jenis_kelahiran_id` bigint UNSIGNED DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO `penduduks` (`id`, `nama`, `nik`, `keluarga_id`, `hubungan_keluarga_id`, `jenis_kelamin_id`, `agama_id`, `tempat_lahir`, `tanggal_lahir`, `waktu_lahir`, `no_akta_lahir`, `status_ktp_id`, `status_rekam_ktp_id`, `pendidikan_kk_id`, `pendidikan_id`, `pekerjaan_id`, `status_kawin_id`, `warga_negara_id`, `no_paspor`, `tanggal_akhir_paspor`, `no_kitas`, `tanggal_akhir_kitas`, `golongan_darah_id`, `status_penduduk_id`, `status_dasar_id`, `cacat_id`, `sakit_menahun_id`, `cara_kb_id`, `kehamilan_id`, `telepon`, `email`, `alamat_sekarang`, `alamat_sebelumnya`, `nik_ayah`, `nama_ayah`, `nik_ibu`, `nama_ibu`, `tanggal_kawin`, `no_akta_kawin`, `tanggal_cerai`, `no_akta_cerai`, `anak_ke`, `berat_lahir`, `panjang_lahir`, `penolong_kelahiran_id`, `tempat_kelahiran_id`, `jenis_kelahiran_id`, `foto`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Happy Agung Pribadi', '5271082507820001', 1, 1, 1, 1, 'Jakarta', '1982-07-25', NULL, NULL, 2, 6, 7, 18, 82, 2, 1, '526 254 5252 1252', '2034-07-27', NULL, NULL, 4, 1, NULL, 7, 14, NULL, NULL, '085239168707', 'metalabmetadata@gmail.com', NULL, NULL, NULL, 'Zainal Abidin', NULL, 'Ochi', '2015-12-04', NULL, NULL, NULL, '2', NULL, NULL, 1, 1, 1, 'penduduks/IUu5R2HNy3kQWfy8rskueUXx2FzAKET845oLeTLT.webp', 1, '2024-10-26 17:16:32', '2024-10-29 15:19:41'),
(2, 'Bahrudin', '1234567890123455', 2, 1, 1, 2, 'Sumedang', '1985-04-11', NULL, NULL, 2, 6, 5, 18, 16, 3, 1, NULL, NULL, NULL, NULL, 13, 1, NULL, 7, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, '2024-10-26 18:38:26', '2024-11-02 04:00:20'),
(3, 'Elis Nuwati', '1234567890122999', 1, 3, 2, 1, 'Kupang', '1989-05-21', NULL, NULL, 2, 6, 5, 18, 2, 2, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, 7, 14, 3, 2, NULL, NULL, NULL, NULL, NULL, 'Hidayat Sahuri', NULL, 'Suryawatun Dalimun', '2015-12-04', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, NULL, 1, '2024-10-26 18:48:27', '2024-11-02 06:44:02'),
(4, 'Wahidin', '1234567890120001', 3, 1, 1, 5, 'Mataram', '1977-07-01', NULL, NULL, 2, 8, 5, 12, 59, 2, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, 7, 14, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 1, NULL, 1, '2024-10-27 10:13:53', '2024-11-02 06:44:56'),
(5, 'Sujana', '1234567890120002', 3, 3, 2, 4, 'Lombok Tengah', '1980-05-06', NULL, NULL, 2, 8, 4, 11, 2, 2, 1, NULL, NULL, NULL, NULL, 5, 1, NULL, 7, 13, 9, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 3, 1, NULL, 1, '2024-10-27 10:16:49', '2024-11-02 06:45:11'),
(6, 'Sudira', '1234567890123654', 5, 1, 1, 1, 'Mataram', '1979-02-08', NULL, NULL, NULL, NULL, 8, 18, 80, 2, 1, NULL, NULL, NULL, NULL, 2, 1, NULL, 7, 14, NULL, NULL, '081245678952', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 'penduduks/ycEhSXATRCQIaS4W35pBj5vLWrOiKjX3sDufGGVD.jpg', 1, '2024-10-27 10:23:01', '2024-10-27 10:23:01'),
(7, 'Fauzan Julianto Pradana', '5271010207070001', 1, 4, 1, 1, 'Kupang', '2007-07-02', NULL, NULL, 2, 8, 5, 7, 3, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, 7, 14, NULL, NULL, NULL, NULL, NULL, NULL, '5271052507820001', 'Happy Agung Pribadi', '1234567890122565', 'Elis Nuwati', NULL, NULL, NULL, NULL, '1', NULL, NULL, 1, 1, 1, NULL, 1, '2024-10-29 11:33:00', '2024-10-29 11:38:33'),
(8, 'Bintang Rizky Agung', '5271052701170001', 1, 4, 1, 1, 'Mataram', '2017-01-27', NULL, NULL, NULL, NULL, 1, 4, 3, 1, 1, NULL, NULL, NULL, NULL, 4, 1, NULL, 7, 14, NULL, NULL, NULL, NULL, NULL, NULL, '5271052507820001', 'Happy Agung Pribadi', '1234567890122999', 'Elis Nuwati', NULL, NULL, NULL, NULL, '2', NULL, NULL, 1, 1, 1, NULL, 1, '2024-10-28 15:36:26', '2024-11-02 07:03:46'),
(10, 'Arjuna Arya Sena Agung', '5271012304220003', 1, 4, 1, 1, 'Mataram', '2022-04-23', NULL, NULL, NULL, NULL, 1, 18, 1, 1, 1, NULL, NULL, NULL, NULL, 1, 1, NULL, 7, 14, NULL, NULL, NULL, NULL, NULL, NULL, '5271052507820001', 'Happy Agung Pribadi', '1234567890122565', 'Elis Nuwati', NULL, NULL, NULL, NULL, '3', NULL, NULL, 2, 2, 1, NULL, 1, '2024-10-29 11:36:29', '2024-10-29 11:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturans`
--

CREATE TABLE `pengaturans` (
  `id` bigint UNSIGNED NOT NULL,
  `sebutan_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan_dusun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan_kepala_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan_camat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan_bupati` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sebutan_kepala_dusun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan_desa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan_kabupaten` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `singkatan_dusun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `format_nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zona_waktu` tinyint(1) NOT NULL DEFAULT '1',
  `title_web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturans`
--

INSERT INTO `pengaturans` (`id`, `sebutan_desa`, `sebutan_kecamatan`, `sebutan_kabupaten`, `sebutan_dusun`, `sebutan_kepala_desa`, `sebutan_camat`, `sebutan_bupati`, `sebutan_kepala_dusun`, `singkatan_desa`, `singkatan_kecamatan`, `singkatan_kabupaten`, `singkatan_dusun`, `format_nomor_surat`, `zona_waktu`, `title_web`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Kelurahan', 'Kecamatan', 'Kota', 'Lingkungan', 'Lurah', 'Camat', 'Bupati', 'Kepala Lingkungan', 'Kel.', 'Kec.', 'Kota', 'Ling.', '[kode_surat]/[nomor_surat, 3]/PEM/[tahun]', 3, 'Website Desa', 'icons/SZ3oaj5JFVYY54QX6apvebZ6h4AP8K5snYiqUOJs.png', '2024-10-26 16:32:06', '2024-10-29 11:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `penolong_kelahirans`
--

CREATE TABLE `penolong_kelahirans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penolong_kelahirans`
--

INSERT INTO `penolong_kelahirans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Dokter', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Bidan Perawat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Dukun', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Lainnya', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

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
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO `provinsis` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(11, 'Aceh', '2024-10-26 16:32:05', '2024-10-26 16:32:05'),
(12, 'Sumatera Utara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(13, 'Sumatera Barat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(14, 'Riau', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(15, 'Jambi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(16, 'Sumatera Selatan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(17, 'Bengkulu', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(18, 'Lampung', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(19, 'Kepulauan Bangka Belitung', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(21, 'Kepulauan Riau', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(26, 'Banten', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(31, 'DKI Jakarta', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(32, 'Jawa Barat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(33, 'Jawa Tengah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(34, 'DI Yogyakarta', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(35, 'Jawa Timur', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(51, 'Bali', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(52, 'Nusa Tenggara Barat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(53, 'Nusa Tenggara Timur', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(61, 'Kalimantan Barat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(62, 'Kalimantan Tengah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(63, 'Kalimantan Selatan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(64, 'Kalimantan Timur', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(65, 'Kalimantan Utara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(71, 'Sulawesi Utara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(72, 'Sulawesi Tengah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(73, 'Sulawesi Selatan', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(74, 'Sulawesi Tenggara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(75, 'Gorontalo', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(76, 'Sulawesi Barat', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(81, 'Maluku', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(82, 'Maluku Utara', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(91, 'Papua', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(92, 'Papua barat', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Operator', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Redaksi', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Kontributor', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `rts`
--

CREATE TABLE `rts` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusun_id` bigint UNSIGNED DEFAULT NULL,
  `rw_id` bigint UNSIGNED NOT NULL,
  `penduduk_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rts`
--

INSERT INTO `rts` (`id`, `nama`, `dusun_id`, `rw_id`, `penduduk_id`, `created_at`, `updated_at`) VALUES
(1, '001', 1, 1, NULL, '2024-10-26 16:33:13', '2024-10-26 16:33:13'),
(2, '002', 1, 1, NULL, '2024-10-26 16:33:24', '2024-10-26 16:33:24'),
(3, '003', 2, 2, NULL, '2024-10-27 10:03:47', '2024-10-27 10:03:47'),
(4, '004', 2, 2, NULL, '2024-10-27 10:03:55', '2024-10-27 10:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `rws`
--

CREATE TABLE `rws` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusun_id` bigint UNSIGNED DEFAULT NULL,
  `penduduk_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rws`
--

INSERT INTO `rws` (`id`, `nama`, `dusun_id`, `penduduk_id`, `created_at`, `updated_at`) VALUES
(1, '003', 1, NULL, '2024-10-26 16:33:03', '2024-10-26 16:33:03'),
(2, '003', 2, NULL, '2024-10-27 10:02:19', '2024-10-27 10:02:19');

-- --------------------------------------------------------

--
-- Table structure for table `sakit_menahuns`
--

CREATE TABLE `sakit_menahuns` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sakit_menahuns`
--

INSERT INTO `sakit_menahuns` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Jantung', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Lever', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Paru-paru', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Kanker', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Stroke', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 'Diabetes Melitus', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 'Ginjal', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 'Malaria', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(9, 'Lepra/Kusta', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(10, 'HIV/AIDS', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(11, 'Gila/Stress', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(12, 'TBC', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(13, 'Asthma', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(14, 'Tidak Ada/Tidak Sakit', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `status_dasars`
--

CREATE TABLE `status_dasars` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_dasars`
--

INSERT INTO `status_dasars` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Hidup', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Mati', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Pindah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Hilang', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Tidak Valid', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `status_kawins`
--

CREATE TABLE `status_kawins` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_kawins`
--

INSERT INTO `status_kawins` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Belum Kawin', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Kawin', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Cerai Hidup', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Cerai Mati', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `status_ktps`
--

CREATE TABLE `status_ktps` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_ktps`
--

INSERT INTO `status_ktps` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Belum', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'KTP-EL', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `status_penduduks`
--

CREATE TABLE `status_penduduks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_penduduks`
--

INSERT INTO `status_penduduks` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Tetap', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Tidak Tetap', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Pendatang', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `status_rekam_ktps`
--

CREATE TABLE `status_rekam_ktps` (
  `id` bigint UNSIGNED NOT NULL,
  `status_ktp_id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_rekam_ktps`
--

INSERT INTO `status_rekam_ktps` (`id`, `status_ktp_id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Belum Wajib', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 1, 'Belum Rekam', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 2, 'Sudah Rekam', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 2, 'Card Printed', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 2, 'Print Ready Record', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(6, 2, 'Card Shipped', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(7, 2, 'Sent For Card Printing', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(8, 2, 'Card Issued', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `tempat_kelahirans`
--

CREATE TABLE `tempat_kelahirans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tempat_kelahirans`
--

INSERT INTO `tempat_kelahirans` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'RS/RB', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'Puskesmas', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Polindes', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(4, 'Rumah', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(5, 'Lainnya', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `email_verified_at`, `password`, `phone`, `photo`, `role_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Happy Agung', 'metalab', 'metalabmetadata@gmail.com', NULL, '$2y$12$doW7zSymbRPMamo4i6uf7OZAe4tl8Ueq8BCUZspz1hTO2325sU1Sa', '08123456789', NULL, 1, 1, NULL, '2024-10-26 16:32:06', '2024-10-26 16:32:06');

-- --------------------------------------------------------

--
-- Table structure for table `warga_negaras`
--

CREATE TABLE `warga_negaras` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warga_negaras`
--

INSERT INTO `warga_negaras` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'WNI', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(2, 'WNA', '2024-10-26 16:32:06', '2024-10-26 16:32:06'),
(3, 'Dua Kewarganegaraan', '2024-10-26 16:32:06', '2024-10-26 16:32:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuans`
--
ALTER TABLE `bantuans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuan_penerimas`
--
ALTER TABLE `bantuan_penerimas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuan_sasarans`
--
ALTER TABLE `bantuan_sasarans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cacats`
--
ALTER TABLE `cacats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cara_kbs`
--
ALTER TABLE `cara_kbs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dusuns`
--
ALTER TABLE `dusuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hubungan_keluargas`
--
ALTER TABLE `hubungan_keluargas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelahirans`
--
ALTER TABLE `jenis_kelahirans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehamilans`
--
ALTER TABLE `kehamilans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompoks`
--
ALTER TABLE `kelompoks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_anggotas`
--
ALTER TABLE `kelompok_anggotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_jabatans`
--
ALTER TABLE `kelompok_jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_kategoris`
--
ALTER TABLE `kelompok_kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluargas`
--
ALTER TABLE `keluargas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `keluargas_no_kk_unique` (`no_kk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pamongs`
--
ALTER TABLE `pamongs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan_kks`
--
ALTER TABLE `pendidikan_kks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penduduks_nik_unique` (`nik`);

--
-- Indexes for table `pengaturans`
--
ALTER TABLE `pengaturans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penolong_kelahirans`
--
ALTER TABLE `penolong_kelahirans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rts`
--
ALTER TABLE `rts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rws`
--
ALTER TABLE `rws`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sakit_menahuns`
--
ALTER TABLE `sakit_menahuns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_dasars`
--
ALTER TABLE `status_dasars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_kawins`
--
ALTER TABLE `status_kawins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_ktps`
--
ALTER TABLE `status_ktps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_penduduks`
--
ALTER TABLE `status_penduduks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_rekam_ktps`
--
ALTER TABLE `status_rekam_ktps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_kelahirans`
--
ALTER TABLE `tempat_kelahirans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Indexes for table `warga_negaras`
--
ALTER TABLE `warga_negaras`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bantuans`
--
ALTER TABLE `bantuans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bantuan_penerimas`
--
ALTER TABLE `bantuan_penerimas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `bantuan_sasarans`
--
ALTER TABLE `bantuan_sasarans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cacats`
--
ALTER TABLE `cacats`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cara_kbs`
--
ALTER TABLE `cara_kbs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dusuns`
--
ALTER TABLE `dusuns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `hubungan_keluargas`
--
ALTER TABLE `hubungan_keluargas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jenis_kelahirans`
--
ALTER TABLE `jenis_kelahirans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kehamilans`
--
ALTER TABLE `kehamilans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelompoks`
--
ALTER TABLE `kelompoks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kelompok_anggotas`
--
ALTER TABLE `kelompok_anggotas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelompok_jabatans`
--
ALTER TABLE `kelompok_jabatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kelompok_kategoris`
--
ALTER TABLE `kelompok_kategoris`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `keluargas`
--
ALTER TABLE `keluargas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `pamongs`
--
ALTER TABLE `pamongs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pendidikan_kks`
--
ALTER TABLE `pendidikan_kks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengaturans`
--
ALTER TABLE `pengaturans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penolong_kelahirans`
--
ALTER TABLE `penolong_kelahirans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rts`
--
ALTER TABLE `rts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rws`
--
ALTER TABLE `rws`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sakit_menahuns`
--
ALTER TABLE `sakit_menahuns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `status_dasars`
--
ALTER TABLE `status_dasars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `status_kawins`
--
ALTER TABLE `status_kawins`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_ktps`
--
ALTER TABLE `status_ktps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_penduduks`
--
ALTER TABLE `status_penduduks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `status_rekam_ktps`
--
ALTER TABLE `status_rekam_ktps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tempat_kelahirans`
--
ALTER TABLE `tempat_kelahirans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warga_negaras`
--
ALTER TABLE `warga_negaras`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
