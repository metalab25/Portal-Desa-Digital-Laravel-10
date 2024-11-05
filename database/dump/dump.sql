-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2024 at 04:47 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `portaldesadigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `agamas`
--

CREATE TABLE `agamas` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `agamas`
--

INSERT INTO
    `agamas` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Islam',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Kristen',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Katholik',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Hindu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Budha',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'Khonghucu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'Kepercayaan Terhadap Tuhan YME / Lainnya',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `bantuans`
--

CREATE TABLE `bantuans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `bantuan_sasaran_id` bigint UNSIGNED NOT NULL,
    `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `mulai` date DEFAULT NULL,
    `akhir` date DEFAULT NULL,
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuans`
--

INSERT INTO
    `bantuans` (
        `id`,
        `nama`,
        `bantuan_sasaran_id`,
        `deskripsi`,
        `mulai`,
        `akhir`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Bantuan Langsung Tunai Dana Desa (BLT-DD)',
        2,
        'Bantuan tunai yang diberikan kepada keluarga penerima manfaat (KPM) di desa. Program ini bertujuan untuk membantu meningkatkan ekonomi masyarakat yang kurang mampu.',
        '2024-01-01',
        '2024-12-31',
        1,
        '2024-10-30 14:33:38',
        '2024-10-31 04:12:58'
    ),
    (
        3,
        'Bantuan Jaminan Kesehatan Nasional (JKN)',
        1,
        'Program bantuan sosial yang membantu masyarakat kurang mampu mendapatkan layanan jaminan kesehatan melalui BPJS Kesehatan',
        '2024-01-01',
        '2024-12-31',
        1,
        '2024-10-31 02:25:12',
        '2024-10-31 02:25:12'
    ),
    (
        5,
        'Bantuan Modal Usaha',
        3,
        'Program ini diberikan untuk memfasilitasi masyarakat desa yang ingin membuka usaha atau meningkatkan usaha yang sudah ada.',
        '2024-01-01',
        '2024-12-31',
        1,
        '2024-10-31 19:09:19',
        '2024-10-31 19:14:58'
    ),
    (
        6,
        'Bantuan Rumah Tidak Layak Huni (RTLH)',
        2,
        NULL,
        '2024-01-01',
        '2024-12-31',
        1,
        '2024-11-03 04:00:33',
        '2024-11-03 04:00:33'
    );

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
    `no_kartu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nama_kartu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nik_kartu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tempat_lahir_kartu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tanggal_lahir_kartu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `alamat_kartu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuan_penerimas`
--

INSERT INTO
    `bantuan_penerimas` (
        `id`,
        `bantuan_id`,
        `bantuan_sasaran_id`,
        `keluarga_id`,
        `penduduk_id`,
        `kelompok_id`,
        `no_kartu`,
        `nama_kartu`,
        `nik_kartu`,
        `tempat_lahir_kartu`,
        `tanggal_lahir_kartu`,
        `alamat_kartu`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        1,
        2,
        1,
        NULL,
        NULL,
        '1252351455',
        'Happy Agung Pribadi',
        '5271052507820001',
        'Jakarta',
        '1982-07-25',
        'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan',
        0,
        '2024-10-30 15:24:24',
        '2024-10-30 15:24:24'
    ),
    (
        2,
        1,
        2,
        2,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        '2024-10-30 16:23:10',
        '2024-10-30 16:23:10'
    ),
    (
        3,
        1,
        2,
        5,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        '2024-10-30 16:31:23',
        '2024-10-30 16:31:23'
    ),
    (
        4,
        3,
        1,
        NULL,
        1,
        NULL,
        '0002075306477',
        'Happy Agung Pribadi',
        '5271052507820001',
        'Jakarta',
        '1982-07-25',
        'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan',
        1,
        '2024-10-31 02:33:58',
        '2024-10-31 02:33:58'
    ),
    (
        6,
        3,
        1,
        NULL,
        3,
        NULL,
        '0000146966286',
        'Elis Nuwati',
        '1234567899582525',
        'Kupang',
        '1979-03-21',
        'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan',
        1,
        '2024-10-31 02:47:52',
        '2024-10-31 02:47:52'
    ),
    (
        7,
        3,
        1,
        NULL,
        10,
        NULL,
        '0003513924235',
        'Arjuna Arya Sena Agung',
        NULL,
        'Mataram',
        '2023-03-22',
        'Jalan ABG, Kampung Melayu Bangsal Gang Kerapu No. 2. Ampenan Tengah\r\nKecamatan Ampenan',
        1,
        '2024-10-31 03:26:13',
        '2024-10-31 03:26:13'
    ),
    (
        8,
        5,
        3,
        NULL,
        NULL,
        2,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        '2024-10-31 19:10:48',
        '2024-10-31 19:10:48'
    ),
    (
        9,
        5,
        3,
        NULL,
        NULL,
        5,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        '2024-10-31 19:10:56',
        '2024-10-31 19:10:56'
    ),
    (
        10,
        5,
        3,
        NULL,
        NULL,
        4,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        '2024-10-31 19:11:03',
        '2024-10-31 19:11:03'
    ),
    (
        11,
        5,
        3,
        NULL,
        NULL,
        9,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        '2024-10-31 19:11:11',
        '2024-10-31 19:11:11'
    );

-- --------------------------------------------------------

--
-- Table structure for table `bantuan_sasarans`
--

CREATE TABLE `bantuan_sasarans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `bantuan_sasarans`
--

INSERT INTO
    `bantuan_sasarans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (1, 'Penduduk', NULL, NULL),
    (2, 'Keluarga', NULL, NULL),
    (3, 'Kelompok', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cacats`
--

CREATE TABLE `cacats` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `cacats`
--

INSERT INTO
    `cacats` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Cacat Fisik',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Cacat Netra/Buta',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Cacat Rungu/Wicara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Cacat Mental/Jiwa',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Cacat Fisik dan Mental',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'Cacat Lainnya',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'Tidak Cacat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `cara_kbs`
--

CREATE TABLE `cara_kbs` (
    `id` bigint UNSIGNED NOT NULL,
    `jenis_kelamin_id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `cara_kbs`
--

INSERT INTO
    `cara_kbs` (
        `id`,
        `jenis_kelamin_id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        1,
        'Kondom',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        1,
        'Sterilisasi Pria',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        2,
        'Pil',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        2,
        'Iud',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        2,
        'Suntik',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        2,
        'Susuk KB',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        2,
        'Sterilisasi Wanita',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        2,
        'Lainnya',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        9,
        2,
        'Tidak KB',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
    `id` bigint UNSIGNED NOT NULL,
    `nama_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `kode_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nama_kepala_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nip_kepala_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `phone_kepala_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `kode_pos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nama_kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `kode_kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nama_kepala_camat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nip_kepala_camat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nama_kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `kode_kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `provinsi_id` bigint UNSIGNED NOT NULL,
    `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `ttd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `lat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `zoom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `map_tipe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `path` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `alamat_kantor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `website` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `kantor_desa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO
    `configs` (
        `id`,
        `nama_desa`,
        `kode_desa`,
        `nama_kepala_desa`,
        `nip_kepala_desa`,
        `phone_kepala_desa`,
        `kode_pos`,
        `nama_kecamatan`,
        `kode_kecamatan`,
        `nama_kepala_camat`,
        `nip_kepala_camat`,
        `nama_kabupaten`,
        `kode_kabupaten`,
        `provinsi_id`,
        `logo`,
        `ttd`,
        `lat`,
        `lang`,
        `zoom`,
        `map_tipe`,
        `path`,
        `alamat_kantor`,
        `email_desa`,
        `telepon`,
        `website`,
        `kantor_desa`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Ampenan Tengah',
        '1005',
        'Bahrudin',
        '112 223 3344 555',
        '081234657866',
        '83112',
        'Ampenan',
        '01',
        'Suryadi',
        '19790819 200701 2 016',
        'Mataram',
        '71',
        52,
        'logos/odrEL5ufGT38akhfGRzJfzSzYrnjWVCTrburGAzY.png',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        'Jl. Rampai No.5',
        'desasongkel@gmail.com',
        '0365023562',
        'https://www.songkel.desa.id',
        NULL,
        '2024-10-26 16:32:06',
        '2024-11-03 03:44:37'
    );

-- --------------------------------------------------------

--
-- Table structure for table `dusuns`
--

CREATE TABLE `dusuns` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `penduduk_id` bigint UNSIGNED DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `dusuns`
--

INSERT INTO
    `dusuns` (
        `id`,
        `nama`,
        `penduduk_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Melayu Bangsal',
        1,
        '2024-10-26 16:32:51',
        '2024-10-29 11:51:17'
    ),
    (
        2,
        'Melayu Tengah',
        4,
        '2024-10-27 10:02:07',
        '2024-10-29 11:51:28'
    );

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
    `id` bigint UNSIGNED NOT NULL,
    `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `golongan_darahs`
--

CREATE TABLE `golongan_darahs` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `golongan_darahs`
--

INSERT INTO
    `golongan_darahs` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'A',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'B',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'AB',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'O',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'A+',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'A-',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'B+',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        'B-',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        9,
        'AB+',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        10,
        'AB-',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        11,
        'O+',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        12,
        'O-',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        13,
        'Tidak Tahu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `hubungan_keluargas`
--

CREATE TABLE `hubungan_keluargas` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `hubungan_keluargas`
--

INSERT INTO
    `hubungan_keluargas` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Kepala Keluarga',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Suami',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Istri',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Anak',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Menantu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'Cucu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'Orang Tua',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        'Mertua',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        9,
        'Famili',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        10,
        'Pembantu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        11,
        'Lainnya',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `excerpt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tupoksi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO
    `jabatans` (
        `id`,
        `nama`,
        `excerpt`,
        `tupoksi`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Kepala Desa',
        '',
        NULL,
        1,
        '2024-10-29 06:47:01',
        '2024-10-29 06:47:01'
    ),
    (
        2,
        'Sekretaris Desa',
        '',
        NULL,
        1,
        '2024-10-29 06:48:09',
        '2024-10-29 06:48:09'
    ),
    (
        3,
        'Kepala Urusan Pemerintahan',
        '',
        NULL,
        1,
        '2024-10-29 06:48:21',
        '2024-10-29 06:48:21'
    ),
    (
        4,
        'Kepala Urusan Keuangan',
        '',
        NULL,
        1,
        '2024-10-29 06:48:32',
        '2024-10-29 06:48:32'
    ),
    (
        5,
        'Kepala Urusan Pemberdayaan',
        '',
        NULL,
        1,
        '2024-10-29 06:48:44',
        '2024-10-29 06:48:44'
    ),
    (
        7,
        'Kepala Urusan Pelayanan',
        'Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :Melaksanakan pen...',
        '<p>Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :</p><ol><li>Melaksanakan penyuluhan dan motivasi kepada masyarakat terkait hak dan kewajiban mereka&nbsp;</li><li>Meningkatkan partisipasi masyarakat&nbsp;</li><li>Melestarikan nilai sosial budaya, keagamaan, dan ketenagakerjaan masyarakat&nbsp;</li><li>Melakukan pekerjaan teknis pelayanan nikah, talak, cerai, dan rujuk</li><li>Melakukan pekerjaan teknis urusan kelahiran dan kematian</li><li>Membangun sarana dan prasarana perdesaan</li><li>Membangun bidang pendidikan</li><li>Membangun bidang kesehatan</li><li>Membantu Kepala Desa dalam melaksanakan tugas pelayanan sosial kemasyarakatan dan peningkatan kapasitas</li><li>Melaksanakan tugas-tugas kedinasan lain yang diberikan oleh atasan&nbsp;</li></ol>',
        1,
        '2024-10-29 07:07:35',
        '2024-10-29 07:07:35'
    ),
    (
        8,
        'Staf Urusan Pelayanan',
        'Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :Melaksanakan pen...',
        '<p>Tugas Pokok dan Fungsi (TUPOKSI) Kepala Seksi (Kasi) Pelayanan di desa antara lain :</p><ol><li>Melaksanakan penyuluhan dan motivasi kepada masyarakat terkait hak dan kewajiban mereka&nbsp;</li><li>Meningkatkan partisipasi masyarakat&nbsp;</li><li>Melestarikan nilai sosial budaya, keagamaan, dan ketenagakerjaan masyarakat&nbsp;</li><li>Melakukan pekerjaan teknis pelayanan nikah, talak, cerai, dan rujuk</li><li>Melakukan pekerjaan teknis urusan kelahiran dan kematian</li><li>Membangun sarana dan prasarana perdesaan</li><li>Membangun bidang pendidikan</li><li>Membangun bidang kesehatan</li><li>Membantu Kepala Desa dalam melaksanakan tugas pelayanan sosial kemasyarakatan dan peningkatan kapasitas</li><li>Melaksanakan tugas-tugas kedinasan lain yang diberikan oleh atasan&nbsp;</li></ol>',
        1,
        '2024-10-29 07:09:28',
        '2024-10-29 07:09:28'
    );

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelahirans`
--

CREATE TABLE `jenis_kelahirans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kelahirans`
--

INSERT INTO
    `jenis_kelahirans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Tunggal',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Kembar 2',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Kembar 3',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Kembar 4',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamins`
--

CREATE TABLE `jenis_kelamins` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_kelamins`
--

INSERT INTO
    `jenis_kelamins` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Laki-laki',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Perempuan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `kehamilans`
--

CREATE TABLE `kehamilans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `kehamilans`
--

INSERT INTO
    `kehamilans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Hamil',
        '2024-10-26 16:32:07',
        '2024-10-26 16:32:07'
    ),
    (
        2,
        'Tidak Hamil',
        '2024-10-26 16:32:07',
        '2024-10-26 16:32:07'
    );

-- --------------------------------------------------------

--
-- Table structure for table `kelompoks`
--

CREATE TABLE `kelompoks` (
    `id` bigint UNSIGNED NOT NULL,
    `kelompok_kategori_id` bigint UNSIGNED NOT NULL,
    `penduduk_id` bigint UNSIGNED DEFAULT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompoks`
--

INSERT INTO
    `kelompoks` (
        `id`,
        `kelompok_kategori_id`,
        `penduduk_id`,
        `nama`,
        `kode`,
        `deskripsi`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        2,
        2,
        'Pupuk Sari',
        '001',
        NULL,
        1,
        '2024-10-28 00:36:50',
        '2024-10-28 00:36:50'
    ),
    (
        2,
        2,
        5,
        'Sari Bumi',
        '002',
        NULL,
        1,
        '2024-10-28 00:53:36',
        '2024-10-28 00:53:36'
    ),
    (
        3,
        4,
        4,
        'Karya Bahari',
        '003',
        NULL,
        1,
        '2024-10-28 00:54:10',
        '2024-10-28 00:54:10'
    ),
    (
        6,
        5,
        1,
        'Sadar Bahari',
        '006',
        NULL,
        1,
        '2024-10-28 01:03:09',
        '2024-10-28 01:03:09'
    ),
    (
        7,
        2,
        2,
        'Sumber Alam',
        '007',
        NULL,
        1,
        '2024-10-28 01:05:01',
        '2024-10-28 01:05:01'
    ),
    (
        8,
        5,
        6,
        'Sinar Pagi',
        '008',
        NULL,
        1,
        '2024-10-28 01:05:26',
        '2024-10-28 01:05:26'
    ),
    (
        9,
        5,
        6,
        'Pesona Alam',
        '009',
        NULL,
        1,
        '2024-10-28 01:05:47',
        '2024-10-28 01:05:47'
    );

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_anggotas`
--

CREATE TABLE `kelompok_anggotas` (
    `id` bigint UNSIGNED NOT NULL,
    `kelompok_id` bigint UNSIGNED NOT NULL,
    `penduduk_id` bigint UNSIGNED NOT NULL,
    `kelompok_jabatan_id` bigint UNSIGNED NOT NULL,
    `nomor_anggota` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_anggotas`
--

INSERT INTO
    `kelompok_anggotas` (
        `id`,
        `kelompok_id`,
        `penduduk_id`,
        `kelompok_jabatan_id`,
        `nomor_anggota`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        3,
        4,
        1,
        '001-20241028-0001',
        1,
        '2024-10-28 02:00:48',
        '2024-10-28 02:00:48'
    ),
    (
        2,
        3,
        2,
        2,
        '001-20241028-0002',
        1,
        '2024-10-28 02:16:11',
        '2024-10-28 02:16:11'
    ),
    (
        3,
        3,
        1,
        3,
        '001-20241028-0003',
        1,
        '2024-10-28 02:16:30',
        '2024-10-28 02:16:30'
    ),
    (
        4,
        3,
        3,
        4,
        '001-20241028-0004',
        1,
        '2024-10-28 02:16:52',
        '2024-10-28 02:16:52'
    );

-- --------------------------------------------------------

--
-- Table structure for table `kelompok_jabatans`
--

CREATE TABLE `kelompok_jabatans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_jabatans`
--

INSERT INTO
    `kelompok_jabatans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (1, 'Ketua', NULL, NULL),
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
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `kelompok_kategoris`
--

INSERT INTO
    `kelompok_kategoris` (
        `id`,
        `nama`,
        `deskripsi`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Kelompok UMKM',
        NULL,
        1,
        '2024-10-28 00:03:11',
        '2024-10-28 00:03:11'
    ),
    (
        2,
        'Kelompok Tani',
        NULL,
        1,
        '2024-10-28 00:11:07',
        '2024-10-28 00:11:07'
    ),
    (
        3,
        'Kelompok Ternak',
        NULL,
        1,
        '2024-10-28 00:11:17',
        '2024-10-28 00:11:17'
    ),
    (
        4,
        'Kelompok Nelayan',
        NULL,
        1,
        '2024-10-28 00:53:50',
        '2024-10-28 00:53:50'
    ),
    (
        5,
        'Kelompok Wisata',
        NULL,
        1,
        '2024-10-28 01:02:42',
        '2024-10-28 01:02:42'
    );

-- --------------------------------------------------------

--
-- Table structure for table `keluargas`
--

CREATE TABLE `keluargas` (
    `id` bigint UNSIGNED NOT NULL,
    `no_kk` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `penduduk_id` bigint UNSIGNED DEFAULT NULL,
    `dusun_id` bigint UNSIGNED DEFAULT NULL,
    `rw_id` bigint UNSIGNED DEFAULT NULL,
    `rt_id` bigint UNSIGNED DEFAULT NULL,
    `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `tanggal_cetak` datetime DEFAULT NULL,
    `user_id` bigint UNSIGNED DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `keluargas`
--

INSERT INTO
    `keluargas` (
        `id`,
        `no_kk`,
        `penduduk_id`,
        `dusun_id`,
        `rw_id`,
        `rt_id`,
        `alamat`,
        `tanggal_cetak`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '5271012508080009',
        1,
        1,
        1,
        1,
        'Gang Kerapu No. 2',
        NULL,
        1,
        '2024-10-26 16:33:42',
        '2024-10-27 09:58:33'
    ),
    (
        2,
        '5271012508080088',
        2,
        1,
        1,
        2,
        'Jalan Gurita No 6',
        NULL,
        1,
        '2024-10-26 18:29:25',
        '2024-10-27 09:58:25'
    ),
    (
        3,
        '5271012508080100',
        4,
        2,
        2,
        3,
        'Blok O Griya No.15',
        NULL,
        1,
        '2024-10-27 10:04:34',
        '2024-10-27 10:14:36'
    ),
    (
        5,
        '5271012508080007',
        6,
        1,
        1,
        1,
        'Gang Kerapu No. 2',
        NULL,
        1,
        '2024-10-27 10:21:20',
        '2024-10-27 10:23:30'
    );

-- --------------------------------------------------------

--
-- Table structure for table `klasifikasi_surats`
--

CREATE TABLE `klasifikasi_surats` (
    `id` bigint UNSIGNED NOT NULL,
    `kode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `status` tinyint(1) NOT NULL DEFAULT '1',
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `klasifikasi_surats`
--

INSERT INTO
    `klasifikasi_surats` (
        `id`,
        `kode`,
        `nama`,
        `deskripsi`,
        `status`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '000',
        'UMUM',
        'Klasifikasi Umum',
        1,
        NULL,
        '2024-11-03 09:36:50'
    ),
    (
        2,
        '001',
        'Lambang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        3,
        '001.1',
        'Garuda',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        4,
        '001.2',
        'Bendera Kebangsaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        5,
        '001.3',
        'Lagu Kebangsaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        6,
        '001.4',
        'Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        7,
        '001.31',
        'Provinsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        8,
        '001.32',
        'Kabupaten/Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        9,
        '002',
        'Tanda Kehormatan/Penghargaan untuk pegawai ',
        'lihat 861.1',
        1,
        NULL,
        NULL
    ),
    (
        10,
        '002.1',
        'Bintang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        11,
        '002.2',
        'Satyalencana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        12,
        '002.3',
        'Samkarya Nugraha',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        13,
        '002.4',
        'Monumen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        14,
        '002.5',
        'Penghargaan Secara Adat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        15,
        '002.6',
        'Penghargaan lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        16,
        '003',
        'Hari Raya/Besar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        17,
        '003.1',
        'Nasional 17 Agustus, Hari Pahlawan, dan sebagainya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        18,
        '003.2',
        'Hari Raya Keagamaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        19,
        '003.3',
        'Hari Ulang Tahun',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        20,
        '003.4',
        'Hari-hari Besar Internasional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        21,
        '004',
        'Ucapan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        22,
        '004.1',
        'Ucapan Terima Kasih',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        23,
        '004.2',
        'Ucapan Selamat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        24,
        '004.3',
        'Ucapan Belasungkawa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        25,
        '004.4',
        'Ucapan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        26,
        '005',
        'Undangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        27,
        '006',
        'Tanda Jabatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        28,
        '006.1',
        'Pamong Praja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        29,
        '006.2',
        'Tanda Pengenal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        30,
        '006.3',
        'Pejabat lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        31,
        '007',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        32,
        '008',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        33,
        '009',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        34,
        '010',
        'URUSAN DALAM ',
        'Gedung Kantor/Termasuk Instalasi Prasarana Fisik Pamong',
        1,
        NULL,
        NULL
    ),
    (
        35,
        '011',
        'Kantor Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        36,
        '012',
        'Rumah Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        37,
        '012.1',
        'Tanah Untuk Rumah Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        38,
        '012.2',
        'Perabot Rumah Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        39,
        '012.3',
        'Rumah Dinas Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        40,
        '012.4',
        'Rumah Dinas Golongan 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        41,
        '012.5',
        'Rumah Dinas Golongan 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        42,
        '012.6',
        'Rumah/Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        43,
        '012.7',
        'Rumah Pejabat Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        44,
        '013',
        'Mess/Guest House',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        45,
        '014',
        'Rumah Susun/Apartemen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        46,
        '015',
        'Penerangan Listrik/Jasa Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        47,
        '016',
        'Telepon/Faximile/Internet',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        48,
        '017',
        'Keamanan/Ketertiban Kantor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        49,
        '018',
        'Kebersihan Kantor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        50,
        '019',
        'Protokol',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        51,
        '019.1',
        'Upacara Bendera',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        52,
        '019.2',
        'Tata Tempat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        53,
        '019.21',
        'Pemasangan Gambar Presiden/Wakil Presiden',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        54,
        '019.3',
        'Audiensi / Menghadap Pimpinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        55,
        '019.4',
        'Alamat-Alamat Kantor Pejabat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        56,
        '019.5',
        'Bandir/Umbul-Umbul/Spanduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        57,
        '020',
        'PERALATAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        58,
        '020.1',
        'Penawaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        59,
        '021',
        'Alat Tulis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        60,
        '022',
        'Mesin Kantor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        61,
        '023',
        'Perabot Kantor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        62,
        '024',
        'Alat Angkutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        63,
        '025',
        'Pakaian Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        64,
        '026',
        'Senjata',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        65,
        '027',
        'Pengadaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        66,
        '028',
        'Inventaris',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        67,
        '029',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        68,
        '030',
        'KEKAYAAN DAERAH',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        69,
        '031',
        'Sumber Daya Alam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        70,
        '032',
        'Asset Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        71,
        '033',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        72,
        '034',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        73,
        '035',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        74,
        '036',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        75,
        '040',
        'PERPUSTAKAAN DOKUMENTASI / KEARSIPAN / SANDI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        76,
        '041',
        'Perpustakaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        77,
        '041.1',
        'Umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        78,
        '041.2',
        'Khusus',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        79,
        '041.3',
        'Perguruan Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        80,
        '041.4',
        'Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        81,
        '041.5',
        'Keliling',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        82,
        '042',
        'Dokumentasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        83,
        '043',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        84,
        '044',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        85,
        '045',
        'Kearsipan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        86,
        '045.1',
        'Pola Klasifikasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        87,
        '045.2',
        'Penataan Berkas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        88,
        '045.3',
        'Penyusutan Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        89,
        '045.31',
        'Jadwal Retensi Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        90,
        '045.32',
        'Pemindahan Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        91,
        '045.33',
        'Penilaian Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        92,
        '045.34',
        'Pemusnahan Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        93,
        '045.35',
        'Penyerahan Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        94,
        '045.36',
        'Berita Acara Penyusutan Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        95,
        '045.37',
        'Daftar Pencarian Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        96,
        '045.4',
        'Pembinaan Kearsipan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        97,
        '045.41',
        'Bimbingan Teknis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        98,
        '045.5',
        'Pemeliharaan /Perawatan Arsip',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        99,
        '045.6',
        'Pengawetan/Fumigasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        100,
        '046',
        'Sandi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        101,
        '047',
        'Website',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        102,
        '048',
        'Pengelolaan Data',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        103,
        '049',
        'Jaringan Komunikasi Data',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        104,
        '050',
        'PERENCANAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        105,
        '050.1',
        'Repelita/8 Sukses',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        106,
        '050.11',
        'Pelita Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        107,
        '050.12',
        'Bantuan Pembangunan Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        108,
        '050.13',
        'Bappeda',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        109,
        '051',
        'Proyek Bidang Pemerintahan, ',
        'Klasifikasikan Disini : Proyek Prasaran Fisik Pemerintahan, Tambahkan Perincian 100 Pada 051 Contoh: Proyek Kepenjaraan 051.86',
        1,
        NULL,
        NULL
    ),
    (
        110,
        '052',
        'Bidang Politik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        111,
        '053',
        'Bidang Keamanan Dan Ketertiban',
        'Tambahkan Perincian 300 Pada 053 Contoh: Proyek Ketataprajaan 053.311 ',
        1,
        NULL,
        NULL
    ),
    (
        112,
        '054',
        'Bidang Kesejahteraan Rakyat ',
        'Tambahkan Peincian 400 pada 054 Contoh: Proyek Resettlement Desa 054.671',
        1,
        NULL,
        NULL
    ),
    (
        113,
        '055',
        'Bidang Perekonomian ',
        'Tambahkan Perincian 500 Pada 055 Contoh: Proyek Pasar 055.112',
        1,
        NULL,
        NULL
    ),
    (
        114,
        '056',
        'Bidang Pekerjaan Umum ',
        'Tambahkan Perincian 600 pada 056 Contoh: Proyek Jembatan 056.3',
        1,
        NULL,
        NULL
    ),
    (
        115,
        '057',
        'Bidang Pengawasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        116,
        '058',
        'Bidang Kepegawaian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        117,
        '059',
        'Bidang Keuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        118,
        '060',
        'ORGANISASI / KETATALAKSANAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        119,
        '060.1',
        'Program Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        120,
        '061',
        'Organisasi Instansi Pemerintah (struktur organisasi)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        121,
        '061.1',
        'Susunan dan Tata Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        122,
        '061.2',
        'Tata Tertib Kantor, Jam Kerja di Bulan Puasa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        123,
        '062',
        'Organisasi Badan Non Pemerintah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        124,
        '063',
        'Organisasi Badan Internasional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        125,
        '064',
        'Organisasi Semi Pemerintah, BKS-AKSI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        126,
        '065',
        'Ketatalaksanaan / Tata Naskah / Sistem',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        127,
        '066',
        'Stempel Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        128,
        '067',
        'Pelayanan Umum / Pelayanan Publik / Analisis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        129,
        '068',
        'Komputerisasi / Siskomdagri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        130,
        '069',
        'Standar Pelayanan Minimal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        131,
        '070',
        'PENELITIAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        132,
        '071',
        'Riset',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        133,
        '072',
        'Survey',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        134,
        '073',
        'Kajian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        135,
        '074',
        'Kerjasama Penelitian Dengan Perguruan Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        136,
        '075',
        'Kementerian Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        137,
        '076',
        'Non Kementerian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        138,
        '077',
        'Provinsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        139,
        '078',
        'Kabupaten/Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        140,
        '079',
        'Kecamatan /Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        141,
        '080',
        'KONFERENSI / RAPAT / SEMINAR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        142,
        '081',
        'Gubernur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        143,
        '082',
        'Bupati / Walikota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        144,
        '083',
        'Komponen, Eselon Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        145,
        '084',
        'Instansi Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        146,
        '085',
        'Internasional Di Dalam Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        147,
        '086',
        'Internasional Di Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        148,
        '087',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        149,
        '088',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        150,
        '089',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        151,
        '090',
        'PERJALANAN DINAS',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        152,
        '091',
        'Perjalanan Presiden/Wakil Presiden Ke Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        153,
        '092',
        'Perjalanan Menteri Ke Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        154,
        '093',
        'Perjalanan Pejabat Tinggi (Pejabat Eselon 1)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        155,
        '094',
        'Perjalanan Pegawai Termasuk Pemanggilan Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        156,
        '095',
        'Perjalanan Tamu Asing Ke Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        157,
        '096',
        'Perjalanan Presiden/Wakil Presiden Ke Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        158,
        '097',
        'Perjalanan Menteri Ke Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        159,
        '098',
        'Perjalanan Pejabat Tinggi Ke Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        160,
        '099',
        'Perjalanan Pegawai ke Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        161,
        '100',
        'PEMERINTAHAN',
        'Meliputi: Tata Praja, Legislatif, Yudikatif, Hubungan luar',
        1,
        NULL,
        NULL
    ),
    (
        162,
        '101',
        'negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        163,
        '102',
        'GDN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        164,
        '103',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        165,
        '104',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        166,
        '105',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        167,
        '110',
        'PEMERINTAHAN PUSAT',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        168,
        '111',
        'Presiden',
        'Meliputi: pencalonan, pengangkatan, pelantikan, sumpah, dan serah jabatan',
        1,
        NULL,
        NULL
    ),
    (
        169,
        '111.1',
        'Pertanggung jawaban presiden kpd MPR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        170,
        '111.2',
        'Amanat Presiden/Amanat Kenegaraan/Pidato',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        171,
        '112',
        'Wakil Presiden',
        'Meliputi: pencalonan, pengangkatan, pelantikan, sumpah, dan serah jabatan',
        1,
        NULL,
        NULL
    ),
    (
        172,
        '112.1',
        'Pertanggung jawaban wakil presiden kepada MPR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        173,
        '112.2',
        'Amanat Wakil Presiden/Amanat Kenegaraan/Pidato',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        174,
        '113',
        'Susunan Kabinet',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        175,
        '113.1',
        'Reshuffle',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        176,
        '113.2',
        'Penunjukan Menteri ad interim',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        177,
        '113.3',
        'Sidang Kabinet',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        178,
        '114',
        'Kementerian Dalam Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        179,
        '114.1',
        'Amanat Menteri Dalam Negeri/Sambutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        180,
        '115',
        'Kementerian lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        181,
        '116',
        'Lembaga Tinggi Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        182,
        '117',
        'Lembaga Non Kementerian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        183,
        '118',
        'Otonomi/Desentralisasi/Dekonsentrasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        184,
        '119',
        'Kerjasama Antar Kementerian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        185,
        '120',
        'PEMERINTAH PROVINSI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        186,
        '120.04',
        'Laporan daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        187,
        '120.42',
        'Monografi tambahkan kode wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        188,
        '120.1',
        'Koordinasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        189,
        '120.2',
        'Instansi Tingkat Provinsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        190,
        '120.21',
        'Dinas Otonomi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        191,
        '120.22',
        'Instansi Vertikal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        192,
        '120.23',
        'Kerjasama antar Provinsi/Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        193,
        '121',
        'Gubernur tambahkan kode wilayah, ',
        'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.',
        1,
        NULL,
        NULL
    ),
    (
        194,
        '122',
        'Wakil Gubernur tambahkan kode wilayah, ',
        'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan  dan sebagainya.',
        1,
        NULL,
        NULL
    ),
    (
        195,
        '123',
        'Sekretaris Wilayah tambahkan kode wilayah, ',
        'Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan, Pemberhentian, Serah Terima Jabatan dan sebagainya.',
        1,
        NULL,
        NULL
    ),
    (
        196,
        '124',
        'Pembentukan/Pemekaran Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        197,
        '124.1',
        'Pembinaan/Perubahan Nama kepada: Daerah, Kota,Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas laut, dan sebagainya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        198,
        '124.2',
        'Pemekaran  Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        199,
        '124.3',
        'Forum Koordinasi lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        200,
        '125',
        'Pembentukan Pemekaran Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        201,
        '125.1',
        'Pembinaan/Perubahan Nama Kepada: Daerah, Kota, Benda, Geografis, Gunung, Sungai, Pulau, Selat, Batas Laut, dan sebagainya.',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        202,
        '125.2',
        'Pembentukan Wialayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        203,
        '125.3',
        'Pemindahan Ibukota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        204,
        '125.4',
        'Perubahan batas Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        205,
        '125.5',
        'Pemekaran Wialayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        206,
        '126',
        'Pembagian Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        207,
        '127',
        'Penyerahan Urusan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        208,
        '128',
        'Swaparaja/Penataan Wilayah/Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        209,
        '129',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        210,
        '130',
        'PEMERINTAH KABUPATEN / KOTA',
        'Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan,Pengangkatan, Meninggal, Pelantikan,',
        1,
        NULL,
        NULL
    ),
    (
        211,
        '131',
        'Pemberhentian, Serah Terima Jabatan, dsb',
        'Sambutan / Pengarahan / Amanat Wakil Bupati /Walikota, Tambahkan Kode Wilayah, Meliputi: Pencalonan, Pengangkatan, Meninggal, Pelantikan,',
        1,
        NULL,
        NULL
    ),
    (
        212,
        '132',
        'Pemberhentian, Serah Terima Jabatan, Sekretaris Daerah Kabupaten/Kota, Tambahkan Kode Wilayah, ',
        'Meliputi: Pencalonan, Pengangkatan, Meninggal,',
        1,
        NULL,
        NULL
    ),
    (
        213,
        '133',
        'Pelantikan, Pemberhentian, Serah Terima Jabatan,.',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        214,
        '134',
        'Forum Koordinasi Pemerintah Di Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        215,
        '134.1',
        'Muspida',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        216,
        '134.2',
        'Forum PAN (Panitian Anggaran Nasional)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        217,
        '134.3',
        'Forum Koordinasi Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        218,
        '134.4',
        'Kerjasama antar Kabupaten/Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        219,
        '135',
        'Pembentukan / Pemekaran Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        220,
        '135.1',
        'Pemindahan Ibukota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        221,
        '135.2',
        'Pembentukan Wilayah Pembantu Bupati/Walikota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        222,
        '135.3',
        'Pemabagian Wilayah Kabupaten/Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        223,
        '135.4',
        'Perubahan Batas Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        224,
        '135.5',
        'Pemekaran Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        225,
        '135.6',
        'Permasalahan Batas Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        226,
        '135.7',
        'Pembentukan Ibukota Kabupaten/Kota Pemberian dan Penggantian Nama Kabupaten/Kota, Daerah,',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        227,
        '135.8',
        'Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        228,
        '136',
        'Pembagian Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        229,
        '137',
        'Penyerahan Urusan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        230,
        '138',
        'Pemerintah Wilayah Kecamatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        231,
        '138.1',
        'Sambutan / Pengarahan / Amanat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        232,
        '138.2',
        'Pembentukan Kecamatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        233,
        '138.3',
        'Pemekaran Kecamatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        234,
        '138.4',
        'Perluasan/Perubahan Batas Wilayah Kecamatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        235,
        '138.5',
        'Pembentukan Perwakilan Kecamatan/Kemantren',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        236,
        '138.6',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        237,
        '138.7',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        238,
        '139',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        239,
        '140',
        'PEMERINTAHAN DESA / KELURAHAN',
        'Pamong Desa, Meliputi: Pencalonan, Pemilihan, Meninggal,',
        1,
        NULL,
        NULL
    ),
    (
        240,
        '141',
        'Pengangkatan, Pemberhenian, dan sebagainya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        241,
        '142',
        'Penghasilan Pamong Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        242,
        '143',
        'Kekayaan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        243,
        '144',
        'Dewan Tingkat Desa, Dewan Marga, Rembug Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        244,
        '145',
        'Administrasi Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        245,
        '146',
        'Kewilayahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        246,
        '146.1',
        'Pembentukan Desa/Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        247,
        '146.2',
        'Pemekaran Desa/Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        248,
        '146.3',
        'Perubahan Batas Wilayah / Perluasan Desa / Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        249,
        '146.4',
        'Perubahan Nama Desa / Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        250,
        '146.5',
        'Kerjasama Antar Desa / Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        251,
        '147',
        'Lembaga-lembaga Tingkat Desa',
        'Jangan Klasifikasikan Disini, Lihat 410 Dengan Perinciannya',
        1,
        NULL,
        NULL
    ),
    (
        252,
        '148',
        'Perangkat Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        253,
        '148.1',
        'Kepala Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        254,
        '148.2',
        'Sekretaris Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        255,
        '148.3',
        'Staf Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        256,
        '149.1',
        'Dewan Kelurahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        257,
        '149.2',
        'Rukun Tetangga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        258,
        '149.3',
        'Rukun Warga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        259,
        '149.4',
        'Rukun Kampung',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        260,
        '150',
        'LEGISLATIF MPR / DPR / DPD',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        261,
        '151',
        'Keanggotaan MPR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        262,
        '151.1',
        'Pencalonan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        263,
        '151.2',
        'Pemberhentian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        264,
        '151.3',
        'Recall',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        265,
        '151.4',
        'Pelanggaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        266,
        '152',
        'Persidangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        267,
        '153',
        'Kesejahteraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        268,
        '153.1',
        'Keuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        269,
        '153.2',
        'Penghargaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        270,
        '154',
        'Hak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        271,
        '155',
        'Keanggotaan DPR ',
        'Pencalonan Pengangkatan Persidangan Sidang Pleno Dengar Pendapat/Rapat Komisi',
        1,
        NULL,
        NULL
    ),
    (
        272,
        '156',
        'Reses',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        273,
        '157',
        'Kesejahteraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        274,
        '157.1',
        'Keuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        275,
        '157.2',
        'Penghargaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        276,
        '158',
        'Jawaban Pemerintah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        277,
        '159',
        'Hak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        278,
        '160',
        'DPRD PROVINSI TAMBAHKAN KODE WILAYAH',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        279,
        '161',
        'Keanggotaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        280,
        '161.1',
        'Pencalonan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        281,
        '161.2',
        'Pengangkatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        282,
        '161.3',
        'Pemberhentian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        283,
        '161.4',
        'Recall',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        284,
        '161.5',
        'Meninggal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        285,
        '161.6',
        'Pelanggaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        286,
        '162',
        'Persidangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        287,
        '162.1',
        'Reses',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        288,
        '163',
        'Kesejahteraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        289,
        '163.1',
        'Keuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        290,
        '163.2',
        'Penghargaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        291,
        '164',
        'Hak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        292,
        '165',
        'Sekretaris DPRD Provinsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        293,
        '166',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        294,
        '167',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        295,
        '168',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        296,
        '169',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        297,
        '170',
        'DPRD KABUPATEN TAMBAHKAN KODE WILAYAH',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        298,
        '171',
        'Keanggotaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        299,
        '171.1',
        'Pencalonan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        300,
        '171.2',
        'Pengangkatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        301,
        '171.3',
        'Pemberhentian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        302,
        '171.4',
        'Recall',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        303,
        '171.5',
        'Pelanggaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        304,
        '172',
        'Persidangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        305,
        '173',
        'Kesejahteraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        306,
        '173.1',
        'Keuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        307,
        '173.2',
        'Penghargaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        308,
        '174',
        'Hak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        309,
        '175',
        'Sekretaris DPRD Kabupaten/Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        310,
        '176',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        311,
        '177',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        312,
        '178',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        313,
        '180',
        'HUKUM',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        314,
        '180.1',
        'Kontitusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        315,
        '180.11',
        'Dasar Hukum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        316,
        '180.12',
        'Undang-Undang Dasar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        317,
        '180.2',
        'GBHN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        318,
        '180.3',
        'Amnesti, Abolisi dan Grasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        319,
        '181',
        'Perdata',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        320,
        '181.1',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        321,
        '181.2',
        'Rumah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        322,
        '181.3',
        'Utang/Piutang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        323,
        '181.31',
        'Gadai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        324,
        '181.32',
        'Hipotik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        325,
        '181.4',
        'Notariat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        326,
        '182',
        'Pidana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        327,
        '182.1',
        'Penyidik Pegawai Negeri Sipil (PPNS)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        328,
        '183',
        'Peradilan',
        'Peradilan Agama Islam 451.6, Peradilan Perkara Tanah 593.71',
        1,
        NULL,
        NULL
    ),
    (
        329,
        '183.1',
        'Bantuan Hukum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        330,
        '184',
        'Hukum Internasional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        331,
        '185',
        'Imigrasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        332,
        '185.1',
        'Visa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        333,
        '185.2',
        'Pasport',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        334,
        '185.3',
        'Exit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        335,
        '185.4',
        'Reentry',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        336,
        '185.5',
        'Lintas Batas/Batas Antar Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        337,
        '186',
        'Kepenjaraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        338,
        '187',
        'Kejaksaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        339,
        '188',
        'Peraturan Perundang-Undangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        340,
        '188.1',
        'TAP MPR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        341,
        '188.2',
        'Undang-Undang Dasar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        342,
        '188.3',
        'Peraturan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        343,
        '188.31',
        'Peraturan Pemerintah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        344,
        '188.32',
        'Peraturan Menteri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        345,
        '188.33',
        'Peraturan Lembaga Non Departemen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        346,
        '188.34',
        'Peraturan Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        347,
        '188.341',
        'Peraturan Provinsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        348,
        '188.342',
        'Peraturan Kabupaten/Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        349,
        '188.4',
        'Keputusan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        350,
        '188.41',
        'Presiden',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        351,
        '188.42',
        'Menteri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        352,
        '188.43',
        'Lembaga Non Departemen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        353,
        '188.44',
        'Gubernur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        354,
        '188.45',
        'Bupati/Walikota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        355,
        '188.5',
        'Instruksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        356,
        '188.51',
        'Presiden',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        357,
        '188.52',
        'Menteri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        358,
        '188.53',
        'Lembaga Non Departemen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        359,
        '188.54',
        'Gubernur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        360,
        '188.55',
        'Bupati/Walikota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        361,
        '189',
        'Hukum Adat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        362,
        '189.1',
        'Tokoh Adat/Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        363,
        '190',
        'HUBUNGAN LUAR NEGERI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        364,
        '191',
        'Perwakilan Asing',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        365,
        '192',
        'Tamu Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        366,
        '193',
        'Kerjasama Dengan Negara Asing',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        367,
        '193.1',
        'Asean',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        368,
        '193.2',
        'Bantuan Luar Negeri/Hibah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        369,
        '194',
        'Perwakilan RI Di Luar Negeri/Hibah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        370,
        '195',
        'PBB',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        371,
        '196',
        'Laporan Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        372,
        '197',
        'Hutang Luar Negeri PHLN/LOAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        373,
        '198',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        374,
        '199',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        375,
        '200',
        'POLITIK',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        376,
        '201',
        'Kebijaksanaan umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        377,
        '202',
        'Orde baru',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        378,
        '203',
        'Reformasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        379,
        '204',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        380,
        '205',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        381,
        '206',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        382,
        '210',
        'KEPARTAIAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        383,
        '211',
        'Lambang partai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        384,
        '212',
        'Kartu tanda anggota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        385,
        '213',
        'Bantuan keuangan parpol',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        386,
        '214',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        387,
        '215',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        388,
        '216',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        389,
        '220',
        'ORGANISASI KEMASYARAKATAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        390,
        '221',
        'Berdasarkan perjuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        391,
        '221.1',
        'Perintis kemerdekaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        392,
        '221.2',
        'angkatan 45',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        393,
        '221.3',
        'Veteran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        394,
        '222',
        'Berdasarkan Kekaryaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        395,
        '222.1',
        'PEPABRI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        396,
        '222.2',
        'Wredatama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        397,
        '223',
        'Berdasarkan kerohanian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        398,
        '224',
        'Lembaga adat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        399,
        '225',
        'Lembaga Swadaya Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        400,
        '226',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        401,
        '230',
        'ORGANISASI PROFESI DAN FUNGSIONAL',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        402,
        '231',
        'Ikatan Dokter Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        403,
        '232',
        'Persatuan Guru Republik Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        404,
        '233',
        'PERSATUAN SARJANA HUKUM INDONESIA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        405,
        '234',
        'Persatuan Advokat Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        406,
        '235',
        'Lembaga Bantuan Hukum Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        407,
        '236',
        'Korps Pegawai Republik Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        408,
        '237',
        'Persatuan Wartawan Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        409,
        '238',
        'Ikatan Cendikiawan Muslim Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        410,
        '239',
        'Organisasi Profesi Dan Fungsional Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        411,
        '240',
        'ORGANISASI PEMUDA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        412,
        '241',
        'Komite Nasional Pemuda Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        413,
        '242',
        'Organisasi Mahasiswa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        414,
        '243',
        'Organisasi Pelajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        415,
        '244',
        'Gerakan Pemuda Ansor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        416,
        '245',
        'Gerakan Pemuda Islam Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        417,
        '246',
        'Gerakan Pemuda Marhaenis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        418,
        '247',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        419,
        '248',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        420,
        '250',
        'ORGANISASI BURUH, TANI, NELAYAN DAN ANGKUTAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        421,
        '251',
        'Federasi Buruh Seluruh Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        422,
        '252',
        'Organisasi Buruh Internasional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        423,
        '253',
        'Himpunan Kerukunan Tani',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        424,
        '254',
        'Himpunan Nelayan Seluruh Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        425,
        '255',
        'Keluarga Sopir Proporsional Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        426,
        '256',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        427,
        '257',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        428,
        '258',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        429,
        '260',
        'ORGANISASI WANITA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        430,
        '261',
        'Dharma Wanita',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        431,
        '262',
        'Persatuan Wanita Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        432,
        '263',
        'Pemberdayaan Perempuan (wanita)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        433,
        '264',
        'Kongres Wanita',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        434,
        '265',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        435,
        '266',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        436,
        '267',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        437,
        '268',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        438,
        '269',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        439,
        '270',
        'PEMILIHAN UMUM',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        440,
        '271',
        'Pencalonan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        441,
        '272',
        'Nomor Urut Partai / Tanda Gambar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        442,
        '273',
        'Kampanye',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        443,
        '274',
        'Petugas Pemilu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        444,
        '275',
        'Pemilih / Daftar Pemilih',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        445,
        '276',
        'Sarana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        446,
        '276.1',
        'TPS',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        447,
        '276.2',
        'Kendaraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        448,
        '276.3',
        'Surat Suara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        449,
        '276.4',
        'Kotak Suara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        450,
        '276.5',
        'Dana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        451,
        '277',
        'Pemungutan Suara / Perhitungan Suara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        452,
        '278',
        'Penetapan Hasil Pemilu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        453,
        '279',
        'Penetapan Perolehan Jumlah Kursi Dan Calon Terpilih',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        454,
        '280',
        'Pengucapan Sumpah Janji MPR,DPR,DPD',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        455,
        '281',
        '',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        456,
        '282',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        457,
        '283',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        458,
        '284',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        459,
        '300',
        'KEAMANAN / KETERTIBAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        460,
        '301',
        'Keamanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        461,
        '302',
        'Ketertiban',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        462,
        '303',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        463,
        '310',
        'PERTAHANAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        464,
        '311',
        'Darat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        465,
        '312',
        'Laut',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        466,
        '313',
        'Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        467,
        '314',
        'Perbatasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        468,
        '315',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        469,
        '316',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        470,
        '317',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        471,
        '320',
        'KEMILITERAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        472,
        '321',
        'Latihan Militer',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        473,
        '322',
        'Wajib Militer',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        474,
        '323',
        'Operasi Militer',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        475,
        '324',
        'Kekaryaan TNI Pejabat Sipil dari TNI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        476,
        '324.1',
        'TMD',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        477,
        '325',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        478,
        '326',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        479,
        '327',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        480,
        '328',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        481,
        '330',
        'KEAMANAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        482,
        '331',
        'Kepolisian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        483,
        '331.1',
        'Polisi Pamong Praja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        484,
        '331.2',
        'Kamra',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        485,
        '331.3',
        'Kamling',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        486,
        '331.4',
        'Jaga Wana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        487,
        '332',
        'Huru-Hara / Demonstrasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        488,
        '333',
        'Senjata Api Tajam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        489,
        '334',
        'Bahan Peledak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        490,
        '335',
        'Perjudian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        491,
        '336',
        'Surat-Surat Kaleng',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        492,
        '337',
        'Pengaduan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        493,
        '338',
        'Himbauan / Larangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        494,
        '339',
        'Teroris',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        495,
        '340',
        'PERTAHANAN SIPIL',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        496,
        '341',
        'Perlindungan Sipil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        497,
        '342',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        498,
        '343',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        499,
        '344',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        500,
        '350',
        'KEJAHATAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        501,
        '351',
        'Makar / Pemberontak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        502,
        '352',
        'Pembunuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        503,
        '353',
        'Penganiayaan, Pencurian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        504,
        '354',
        'Subversi / Penyelundupan / Narkotika',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        505,
        '355',
        'Pemalsuan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        506,
        '356',
        'Korupsi / Penyelewengan / Penyalahgunaan Jabatan / KKN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        507,
        '357',
        'Pemerkosaan / Perbuatan Cabul',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        508,
        '358',
        'Kenakalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        509,
        '359',
        'Kejahatan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        510,
        '360',
        'BENCANA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        511,
        '361',
        'Gunung Berapi / Gempa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        512,
        '362',
        'Banjir / Tanah Longsor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        513,
        '363',
        'Angin Topan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        514,
        '364',
        'Kebakaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        515,
        '364.1',
        'Pemadam Kebakaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        516,
        '365',
        'Kekeringan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        517,
        '366',
        'Tsunami',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        518,
        '367',
        'Covid-19',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        519,
        '368',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        520,
        '370',
        'KECELAKAAN / SAR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        521,
        '371',
        'Darat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        522,
        '372',
        'Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        523,
        '373',
        'Laut',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        524,
        '374',
        'Sungai / Danau',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        525,
        '375',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        526,
        '376',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        527,
        '377',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        528,
        '380',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        529,
        '381',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        530,
        '382',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        531,
        '383',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        532,
        '390',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        533,
        '391',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        534,
        '392',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        535,
        '393',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        536,
        '400',
        'KESEJAHTERAAN RAKYAT',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        537,
        '401',
        'Keluarga Miskin',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        538,
        '402',
        'PNPM Mandiri Pedesaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        539,
        '403',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        540,
        '404',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        541,
        '410',
        'PEMBANGUNAN DESA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        542,
        '411',
        'Pembinaan Usaha Gotong Royong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        543,
        '411.1',
        'Swadaya Gotong Royong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        544,
        '411.11',
        'Penataan Gotong Royong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        545,
        '411.12',
        'Gotong Royong Dinamis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        546,
        '411.13',
        'Gotong Royong Statis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        547,
        '411.14',
        'Pungutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        548,
        '411.2',
        'Lembaga Sosial Desa (LSD)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        549,
        '411.21',
        'Pembinaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        550,
        '411.22',
        'Klasifikasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        551,
        '411.23',
        'Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        552,
        '411.24',
        'Musyawarah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        553,
        '411.3',
        'Latihan Kerja Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        554,
        '411.31',
        'Kader Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        555,
        '411.32',
        'Kuliah Kerja Nyata (KKN)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        556,
        '411.33',
        'Pusat Latihan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        557,
        '411.34',
        'Kursus-Kursus',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        558,
        '411.35',
        'Kurikulum / Sylabus',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        559,
        '411.36',
        'Ketrampilan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        560,
        '411.37',
        'Pramuka',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        561,
        '411.4',
        'Pembinaan Kesejahteraan Keluarga (PKK)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        562,
        '411.41',
        'Program',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        563,
        '411.42',
        'Pembinaan Organisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        564,
        '411.43',
        'Kegiatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        565,
        '411.5',
        'Penyuluhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        566,
        '411.51',
        'Publikasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        567,
        '411.52',
        'Peragaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        568,
        '411.53',
        'Sosio Drama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        569,
        '411.54',
        'Siaran Pedesaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        570,
        '411.55',
        'Penyuluhan Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        571,
        '411.6',
        'Kelembagaan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        572,
        '411.61',
        'Kelompok Tani',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        573,
        '411.62',
        'Rukun Tani',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        574,
        '411.63',
        'Subak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        575,
        '411.64',
        'Dharma Tirta',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        576,
        '412',
        'Perekonomian Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        577,
        '412.1',
        'Produksi Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        578,
        '412.11',
        'Pengolahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        579,
        '412.12',
        'Pemasaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        580,
        '412.2',
        'Keuangan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        581,
        '412.21',
        'Perkreditan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        582,
        '412.22',
        'Inventarisasi Data',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        583,
        '412.23',
        'Perkembangan / Pelaksanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        584,
        '412.24',
        'Bantuan / Stimulans',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        585,
        '412.25',
        'Petunjuk / Pembinaan Pelaksanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        586,
        '412.3',
        'Koperasi Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        587,
        '412.31',
        'Badan Usaha Milik Desa (BUMDes)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        588,
        '412.32',
        'Koperasi Usaha Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        589,
        '412.4',
        'Penataan Bantuan Pembangunan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        590,
        '412.41',
        'Jumlah Desa Yang Diberi Bantuan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        591,
        '412.42',
        'Pengarahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        592,
        '412.43',
        'Pusat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        593,
        '412.44',
        'Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        594,
        '412.5',
        'Alokasi Bantuan Pembangunan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        595,
        '412.51',
        'Pusat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        596,
        '412.52',
        'Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        597,
        '412.6',
        'Pelaksanaan Bantuan Pembangunan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        598,
        '412.61',
        'Bantuan Langsung',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        599,
        '412.62',
        'Bantuan Keserasian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        600,
        '412.63',
        'Bantuan Juara Lomba Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        601,
        '413',
        'Prasarana Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        602,
        '413.1',
        'Prasarana Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        603,
        '413.11',
        'Pembinaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        604,
        '413.12',
        'Bimbingan Teknis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        605,
        '413.2',
        'Pemukiman Kembali Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        606,
        '413.21',
        'Lokasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        607,
        '413.22',
        'Diskusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        608,
        '413.23',
        'Pelaksanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        609,
        '413.3',
        'Masyarakat Pradesa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        610,
        '413.31',
        'Pembinaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        611,
        '413.32',
        'Penyuluhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        612,
        '413.4',
        'Pemugaran Perumahan Dan Lingkungan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        613,
        '413.41',
        'Rumah Sehat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        614,
        '413.42',
        'Proyek Perintis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        615,
        '413.43',
        'Pelaksanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        616,
        '413.44',
        'Pengembangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        617,
        '413.45',
        'Perbaikan Kampung',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        618,
        '414',
        'Pengembangan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        619,
        '414.1',
        'Tingkat Perkembangan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        620,
        '414.11',
        'Jumlah Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        621,
        '414.12',
        'Pemekaran Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        622,
        '414.13',
        'Pembentukan Desa Baru',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        623,
        '414.14',
        'Evaluasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        624,
        '414.15',
        'Bagan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        625,
        '414.2',
        'Unit Desa Kerja Pembangunan (UDKP)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        626,
        '414.21',
        'Penyuluhan Program',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        627,
        '414.22',
        'Lokasi UDKP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        628,
        '414.23',
        'Pelaksanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        629,
        '414.24',
        'Bimbingan/Pembinaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        630,
        '414.25',
        'Evaluasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        631,
        '414.3',
        'Tata Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        632,
        '414.31',
        'Inventarisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        633,
        '414.32',
        'Penyusunan Pola Tata Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        634,
        '414.33',
        'Aplikasi Tata Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        635,
        '414.34',
        'Pemetaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        636,
        '414.35',
        'Pedoman Pelaksanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        637,
        '414.36',
        'Evaluasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        638,
        '414.4',
        'Perlombaan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        639,
        '414.41',
        'Pedoman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        640,
        '414.42',
        'Penilaian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        641,
        '414.43',
        'Kejuaraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        642,
        '414.44',
        'Piagam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        643,
        '415',
        'Koordinasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        644,
        '415.1',
        'Sektor Khusus',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        645,
        '415.2',
        'Rapat Koordinasi Horizontal (RKH)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        646,
        '415.3',
        'Tim Koordinasi Pusat (TKP)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        647,
        '415.4',
        'Kerjasama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        648,
        '415.41',
        'Luar Negeri (UNICEF)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        649,
        '415.42',
        'Perguruan Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        650,
        '415.43',
        'Kementerian / Lembaga Non Kementerian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        651,
        '416',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        652,
        '417',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        653,
        '418',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        654,
        '420',
        'PENDIDIKAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        655,
        '420.1',
        'Pendidikan Khusus Klasifikasi Disini Pendidikan Putra/I Irja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        656,
        '421',
        'Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        657,
        '421.1',
        'Pra Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        658,
        '421.2',
        'Sekolah Dasar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        659,
        '421.3',
        'Sekolah Menengah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        660,
        '421.4',
        'Sekolah Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        661,
        '421.5',
        'Sekolah Kejuruan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        662,
        '421.6',
        'Kegiatan Sekolah, Dies Natalis Lustrum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        663,
        '421.7',
        'Kegiatan Pelajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        664,
        '421.71',
        'Reuni Darmawisata',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        665,
        '421.72',
        'Pelajar Teladan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        666,
        '421.73',
        'Resimen Mahasiswa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        667,
        '421.8',
        'Sekolah Pendidikan Luar Biasa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        668,
        '421.9',
        'Pendidikan Luar Sekolah / Pemberantasan Buta Huruf',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        669,
        '422',
        'Administrasi Sekolah',
        'Persyaratan Masuk Sekolah, Testing, Ujian, Pendaftaran,',
        1,
        NULL,
        NULL
    ),
    (
        670,
        '422.1',
        'Mapras, Perpeloncoan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        671,
        '422.2',
        'Tahun Pelajaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        672,
        '422.3',
        'Hari Libur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        673,
        '422.4',
        'Uang Sekolah, Klasifikasi Disini SPP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        674,
        '422.5',
        'Beasiswa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        675,
        '423',
        'Metode Belajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        676,
        '423.1',
        'Kuliah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        677,
        '423.2',
        'Ceramah, Simposium',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        678,
        '423.3',
        'Diskusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        679,
        '423.4',
        'Kuliah Lapangan, Widyawisata, KKN, Studi Tur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        680,
        '423.5',
        'Kurikulum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        681,
        '423.6',
        'Karya Tulis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        682,
        '423.7',
        'Ujian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        683,
        '424',
        'Tenaga Pengajar, Guru, Dosen, Dekan, Rektor',
        'Klasifikasi Disini: Guru Teladan',
        1,
        NULL,
        NULL
    ),
    (
        684,
        '425',
        'Sarana Pendidikan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        685,
        '425.1',
        'Gedung',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        686,
        '425.11',
        'Gedung Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        687,
        '425.12',
        'Kampus',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        688,
        '425.13',
        'Pusat Kegiatan Mahasiswa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        689,
        '425.2',
        'Buku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        690,
        '425.3',
        'Perlengkapan Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        691,
        '426',
        'Keolahragaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        692,
        '426.1',
        'Cabang Olah Raga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        693,
        '426.2',
        'Sarana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        694,
        '426.21',
        'Gedung Olah Raga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        695,
        '426.22',
        'Stadion',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        696,
        '426.23',
        'Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        697,
        '426.24',
        'Kolam renang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        698,
        '426.3',
        'Pesta Olah Raga, ',
        'Klasifikasi Disini: PON, Porsade, Olimpiade, dsb',
        1,
        NULL,
        NULL
    ),
    (
        699,
        '426.4',
        'KONI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        700,
        '427',
        'Kepramukaan Meliputi: Organisasi Dan Kegiatan Remaja',
        'Klasifikasi Disini: Gelanggang Remaja',
        1,
        NULL,
        NULL
    ),
    (
        701,
        '428',
        'Kepramukaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        702,
        '429',
        'Pendidikan  Kedinasan Untuk Depdagri, Lihat 890',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        703,
        '430',
        'KEBUDAYAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        704,
        '431',
        'Kesenian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        705,
        '431.1',
        'Cabang Kesenian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        706,
        '431.2',
        'Sarana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        707,
        '431.21',
        'Gedung Kesenian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        708,
        '432',
        'Kepurbakalaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        709,
        '432.1',
        'Museum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        710,
        '432.2',
        'Peninggalan Kuno',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        711,
        '432.21',
        'Candi Termasuk Pemugaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        712,
        '432.22',
        'Benda',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        713,
        '433',
        'Sejarah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        714,
        '434',
        'Bahasa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        715,
        '435',
        'Usaha Pertunjukan, Hiburan, Kesenangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        716,
        '436',
        'Kepercayaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        717,
        '437',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        718,
        '438',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        719,
        '439',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        720,
        '440',
        'KESEHATAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        721,
        '441',
        'Pembinaan Kesehatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        722,
        '441.1',
        'Gizi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        723,
        '441.2',
        'Mata',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        724,
        '441.3',
        'Jiwa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        725,
        '441.4',
        'Kanker',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        726,
        '441.5',
        'Usaha Kegiatan Sekolah (UKS)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        727,
        '441.6',
        'Perawatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        728,
        '441.7',
        'Penyuluhan Kesehatan Masyarakat (PKM)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        729,
        '441.8',
        'Pekan Imunisasi Nasional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        730,
        '442',
        'Obat-obatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        731,
        '442.1',
        'Pengadaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        732,
        '442.2',
        'Penyimpanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        733,
        '443',
        'Penyakit Menular',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        734,
        '443.1',
        'Pencegahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        735,
        '443.2',
        'Pemberantasan dan Pencegahan Penyakit Menular Langsung (P2ML)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        736,
        '443.21',
        'Kusta',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        737,
        '443.22',
        'Kelamin',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        738,
        '443.23',
        'Frambosia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        739,
        '443.24',
        'TBC / AIDS / HIV',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        740,
        '443.3',
        'Epidemiologi dan Karantina (Epidka)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        741,
        '443.31',
        'Kholera',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        742,
        '443.32',
        'Imunisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        743,
        '443.33',
        'Survailense',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        744,
        '443.34',
        'Rabies (Anjing Gila) Antraks',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        745,
        '443.4',
        'Pemberantasan & Pencegahan Penyakit Menular Sumber Binatang (P2B)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        746,
        '443.41',
        'Malaria',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        747,
        '443.42',
        'Dengue Faemorrhagic Fever (Demam Berdarah HDF)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        748,
        '443.43',
        'Filaria',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        749,
        '443.44',
        'Serangga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        750,
        '443.5',
        'Hygiene Sanitasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        751,
        '443.51',
        'Tempat-tempat Pembuatan Dan Penjualan Makanan dan Minuman (TPPMM)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        752,
        '443.52',
        'Sarana Air Minum Dan Jamban Keluarga (Samijaga)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        753,
        '443.53',
        'Pestisida',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        754,
        '444',
        'Gizi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        755,
        '444.1',
        ' Kekurangan Makanan Bahaya Kelaparan, Busung Lapar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        756,
        '444.2',
        'Keracunan Makanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        757,
        '444.3',
        'Menu Makanan Rakyat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        758,
        '444.4',
        'Badan Perbaikan Gizi Daerah (BPGD)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        759,
        '444.5',
        'Program Makanan Tambahn Anak Sekolah (PMT-AS)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        760,
        '445',
        'Rumah Sakit, Balai Kesehatan, PUSKESMAS, PUSKESMAS, Keliling, Poliklinik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        761,
        '446',
        'Tenaga Medis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        762,
        '448',
        'Pengobatan Tadisional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        763,
        '448.1',
        'Pijat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        764,
        '448.2',
        'Tusuk Jarum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        765,
        '448.3',
        'Jamu Tradisional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        766,
        '448.4',
        'Dukun / Paranormal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        767,
        '450',
        'AGAMA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        768,
        '451',
        'Islam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        769,
        '451.1',
        'Peribadatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        770,
        '451.11',
        'Sholat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        771,
        '451.12',
        'Zakat Fitrah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        772,
        '451.13',
        'Puasa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        773,
        '451.14',
        'MTQ',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        774,
        '451.2',
        'Rumah Ibadah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        775,
        '451.3',
        'Tokoh Agama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        776,
        '451.4',
        'Pendidikan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        777,
        '451.41',
        'Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        778,
        '451.42',
        'Menengah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        779,
        '451.43',
        'Dasar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        780,
        '451.44',
        'Pondok Pesantren',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        781,
        '451.45',
        'Gedung Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        782,
        '451.46',
        'Tenaga Pengajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        783,
        '451.47',
        'Buku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        784,
        '451.48',
        'Dakwah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        785,
        '451.49',
        'Organisasi / Lembaga Pendidikan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        786,
        '451.5',
        'Harta Agama Wakaf, Baitulmal, dsb',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        787,
        '451.6',
        'Peradilan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        788,
        '451.7',
        'Organisasi Keagamaan Bukan Politik Majelis Ulama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        789,
        '451.8',
        'Mazhab',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        790,
        '452',
        'Protestan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        791,
        '452.1',
        'Peribadatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        792,
        '452.2',
        'Rumah Ibadah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        793,
        '452.3',
        'Tokoh Agama, Rohaniawan, Pendeta, Domine',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        794,
        '452.4',
        'Mazhab',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        795,
        '452.5',
        'Organisasi Gerejani',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        796,
        '453',
        'Katolik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        797,
        '453.1',
        'Peribadatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        798,
        '453.2',
        'Rumah Ibadah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        799,
        '453.3',
        'Tokoh Agama, Rohaniawan, Pendeta, Pastor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        800,
        '453.4',
        'Mazhab',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        801,
        '453.5',
        'Organisasi Gerejani',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        802,
        '454',
        'Hindu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        803,
        '454.1',
        'Peribadatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        804,
        '454.2',
        'Rumah Ibadah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        805,
        '454.3',
        'Tokoh Agama, Rohaniawan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        806,
        '454.4',
        'Mazhab',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        807,
        '454.5',
        'Organisasi Keagamaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        808,
        '455',
        'Budha',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        809,
        '455.1',
        'Peribadatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        810,
        '455.2',
        'Rumah Ibadah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        811,
        '455.3',
        'Tokoh Agama, Rohaniawan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        812,
        '455.4',
        'Mazhab',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        813,
        '455.5',
        'Organisasi Keagamaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        814,
        '456',
        'Urusan Haji',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        815,
        '456.1',
        'ONH',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        816,
        '456.2',
        'Manasik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        817,
        '457',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        818,
        '458',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        819,
        '458',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        820,
        '460',
        'SOSIAL',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        821,
        '461',
        'Rehabilitasi Penderita Cacat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        822,
        '461.1',
        'Cacat Maat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        823,
        '461.2',
        'Cacat Tubuh',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        824,
        '461.3',
        'Cacat Mental',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        825,
        '461.4',
        'Bisul/Tuli',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        826,
        '462',
        'Tuna Sosial',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        827,
        '462.1',
        'Gelandangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        828,
        '462.2',
        'Pengemis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        829,
        '462.3',
        'Tuna Susila',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        830,
        '462.4',
        'Anak Nakal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        831,
        '463',
        'Kesejahteraan Anak / Keluarga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        832,
        '463.1',
        'Anak Putus Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        833,
        '463.2',
        'Ibu Teladan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        834,
        '463.3',
        'Anak Asuh',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        835,
        '464',
        'Pembinaan Pahlawan',
        'Pahlawan Meliputi: Penghargaan Kepada Pahlawan,',
        1,
        NULL,
        NULL
    ),
    (
        836,
        '464.1',
        'Tunjangan Kepada Pahlawan Dan Jandanya',
        'Perintis Kemerdekaan Meliputi: Pembinaan, Penghargaan',
        1,
        NULL,
        NULL
    ),
    (
        837,
        '464.2',
        'Dan Tunjangan Kepada Perintis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        838,
        '464.3',
        'Cacat Veteran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        839,
        '465',
        'Kesejahteraan Sosial',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        840,
        '465.1',
        'Lanjut Usia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        841,
        '465.2',
        'Korban Kekacauan, Pengungsi, Repatriasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        842,
        '466',
        'Sumbangan Sosial',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        843,
        '466.1',
        'Korban Bencana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        844,
        '466.2',
        'Pencarian Dana Untuk Sumbangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        845,
        '466.3',
        'Meliputi: Penyelenggaraan Undian, Ketangkasan, Bazar, dsb',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        846,
        '466.4',
        'Panti Asuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        847,
        '466.5',
        'Panti Jompo',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        848,
        '467',
        ' Bimbingan Sosial',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        849,
        '467.1',
        'Masyarakat Suku Terasing Meliputi: Bimbingan, Pendidikan, Kesehatan, Pemukiman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        850,
        '468',
        'PMI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        851,
        '469',
        'Makam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        852,
        '469.1',
        'Umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        853,
        '469.2',
        'Pahlawan Meliputi: Penghargaan Kepada Pahlawan, Tunjangan Kpd Pahlawan Dan Jandanya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        854,
        '469.3',
        'Khusus Keluarga Raja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        855,
        '469.4',
        'Krematorium',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        856,
        '470',
        'KEPENDUDUKAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        857,
        '471',
        'Pendaftaran Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        858,
        '471.1',
        'Identitas Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        859,
        '471.11',
        'Biodata',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        860,
        '471.12',
        'Nomor Induk Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        861,
        '471.13',
        'Kartu Tanda Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        862,
        '471.14',
        'Kartu Keluarga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        863,
        '471.15',
        'Advokasi Indentitas Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        864,
        '471.2',
        'Perpindahan Penduduk Dalam Wilayah Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        865,
        '471.21',
        'Perpindahan Penduduk WNI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        866,
        '471.22',
        'Perpindahan Penduduk WNA Dalam Wilayah Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        867,
        '471.23',
        'Perpindahan Penduduk WNA dan WNI Tinggal Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        868,
        '471.24',
        'Daerah Terbelakan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        869,
        '471.25',
        'Bedol Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        870,
        '471.3',
        'Perpindahan Penduduk Antar Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        871,
        '471.31',
        'Penduduk Indonesia Ke Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        872,
        '471.32',
        'Orang Asing Tinggal Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        873,
        '471.33',
        'Orang Asing Tinggal Tetap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        874,
        '471.34',
        'Perpindahan Penduduk Antar Negara Di Wilayah Pembatasan Antar Negara (Pelintas Batas Tradisional)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        875,
        '471.4',
        'Pendaftaran Pengungsi Dan Penduduk Rentan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        876,
        '471.41',
        'Akibat Bencana Alam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        877,
        '471.42',
        'Akibat Kerusuhan Sosial',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        878,
        '471.43',
        'Pendaftaran Penduduk Daerah Terbelakang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        879,
        '471.44',
        'Pendaftaran Penduduk Rentan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        880,
        '472',
        'Pencatatan Sipil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        881,
        '472.1',
        'Kelahiran, Kematian Dan Advokasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        882,
        '472.11',
        'Kelahiran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        883,
        '472.12',
        'Kematian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        884,
        '472.13',
        'Advokasi Kelahiran Dan Kematian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        885,
        '472.2',
        'Perkawinan, Peceraian Dan Advokasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        886,
        '472.3',
        'Perkawinan Agama Islam',
        '-',
        1,
        NULL,
        NULL
    );

INSERT INTO
    `klasifikasi_surats` (
        `id`,
        `kode`,
        `nama`,
        `deskripsi`,
        `status`,
        `created_at`,
        `updated_at`
    )
VALUES (
        887,
        '472.4',
        'Perkawinan Agama Non Islam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        888,
        '472.5',
        'Perceraian Agama Islam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        889,
        '472.6',
        'Perceraian Agama Non Islam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        890,
        '472.7',
        'Advokasi Perkawinan Dan Perceraian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        891,
        '472.3',
        'Pengangkatan, Pengakuan, Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta Dan Advokasi Pengangkatan Anak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        892,
        '472.31',
        'Pengangkatan Anak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        893,
        '472.32',
        'Pengakuan Anak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        894,
        '472.33',
        'Pengesahan Anak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        895,
        '472.34',
        'Perubahan Anak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        896,
        '472.35',
        'Pembatalan Anak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        897,
        '472.36',
        'Advokasi Pengurusan Pengangkatan, Pengakuan Dan Pengesahan Anak Serta Perubahan Dan Pembatalan Akta',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        898,
        '472.4',
        'Pencatatan Kewarganegaraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        899,
        '472.41',
        'Akibat Perkawinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        900,
        '472.42',
        'Akibat Kelahiran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        901,
        '472.43',
        'Non Perkawinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        902,
        '472.44',
        'Non Kelahiran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        903,
        '472.45',
        'Perubahan WNI ke WNA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        904,
        '473',
        'Informasi Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        905,
        '473.1',
        'Teknologi Informasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        906,
        '473.11',
        'Perangkat Keras',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        907,
        '473.12',
        'Perangkat Lunak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        908,
        '473.13',
        'Jaringan Komunikasi Data',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        909,
        '473.2',
        'Kelembagaan Dan Sumber Daya Informasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        910,
        '473.21',
        'Daerah Maju',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        911,
        '473.22',
        'Daerah Berkembang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        912,
        '473.23',
        'Daerah Terbelakang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        913,
        '473.3',
        'Pengolahan Data Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        914,
        '473.31',
        'Pendaftaran Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        915,
        '473.32',
        'Kejadian Vital Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        916,
        '473.33',
        'Penduduk Non Registrasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        917,
        '473.4',
        'Pelayanan Informasi Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        918,
        '473.41',
        'Media Elektronik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        919,
        '473.42',
        'Media Cetak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        920,
        '473.43',
        'Outlet',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        921,
        '474',
        'Perkembangan Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        922,
        '474.1',
        'Pengarahan Kuantitas Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        923,
        '474.11',
        'Struktur Jumlah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        924,
        '474.12',
        'Komposisi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        925,
        '474.13',
        'Fertilitas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        926,
        '474.14',
        'Kesehatan Reproduksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        927,
        '474.15',
        'Morbiditas Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        928,
        '474.16',
        'Mortalitas Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        929,
        '474.2',
        'Pengembangan Kuantitas Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        930,
        '474.21',
        'Anak dan Remaja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        931,
        '474.22',
        'Penduduk Usia Produktif',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        932,
        '474.23',
        'Penduduk Lanjut Usia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        933,
        '474.24',
        'Gender',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        934,
        '474.3',
        'Penataan Persebaran Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        935,
        '474.31',
        'Migrasi Antar Wilayah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        936,
        '474.32',
        'Migrasi Internasional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        937,
        '474.33',
        'Urbanisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        938,
        '474.34',
        'Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        939,
        '474.35',
        'Migrasi Non Permanen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        940,
        '474.4',
        'Perlindungan Pemberdayaan Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        941,
        '474.41',
        'Pengembangan Sistem Pelindungan Penduduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        942,
        '474.42',
        'Pelayanan Kelembagaan Ekonomi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        943,
        '474.43',
        'Pelayanan Kelembagaan Sosial Budaya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        944,
        '474.44',
        'Partisipasi Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        945,
        '474.5',
        'Pengembangan Wawasan Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        946,
        '474.51',
        'Pendidikan Jalur Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        947,
        '474.52',
        'Pendidikan Jalur Luar Sekolah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        948,
        '474.53',
        'Pendidikan Jalur Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        949,
        '474.54',
        'Pembangunan Berwawasan Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        950,
        '475',
        'Proyeksi Dan Penyerasian Kebijakan Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        951,
        '475.1',
        'Indikator Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        952,
        '475.11',
        'Perumusan Penetapan Dan Pengembangan Indikator Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        953,
        '475.12',
        'Pemanfaatan Indikator Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        954,
        '475.13',
        'Sosialisasi Indikator Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        955,
        '475.2',
        'Proyeksi Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        956,
        '475.21',
        'Penyusunan Dan Pengembangan Proyeksi Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        957,
        '475.22',
        'Pemanfaatan Proyeksi Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        958,
        '475.3',
        'Analisis Dampak Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        959,
        '475.31',
        'Penyusunan Dan Pengembangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        960,
        '475.32',
        'Pemanfaatan Analisis Dampak Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        961,
        '475.4',
        'Penyerasian Kebijakan Lembaga Non Pemerintah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        962,
        '475.41',
        'Lembaga Internasioanal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        963,
        '475.42',
        'Lembaga Masyarakat Dan Nirlaba',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        964,
        '475.43',
        'Lembaga Usaha Swasta',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        965,
        '475.5',
        'Penyerasian Kebijakan Lembaga Pemerintah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        966,
        '475.51',
        'Lembaga Pemerintah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        967,
        '475.52',
        'Pemerintah Provinsidan Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        968,
        '475.53',
        'Pemerintah Kabupaten',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        969,
        '475.6',
        'Analisis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        970,
        '476',
        'Monitoring',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        971,
        '477',
        'Evaluasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        972,
        '478',
        'Dokumentasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        973,
        '479',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        974,
        '480',
        'MEDIA MASSA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        975,
        '481',
        'Penerbitan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        976,
        '481.1',
        'Surat Kabar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        977,
        '481.2',
        'Majalah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        978,
        '481.3',
        'Buku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        979,
        '481.4',
        'Penerjemahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        980,
        '482',
        'Radio',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        981,
        '482.1',
        'RRI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        982,
        '482.11',
        'Siaran Pedesaan Jgn Diklasifikasikan Disini',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        983,
        '482.2',
        'Non RRI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        984,
        '482.3',
        'Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        985,
        '483',
        'Televisi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        986,
        '484',
        'Film',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        987,
        '485',
        'Pers',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        988,
        '485.1',
        'Kewartawanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        989,
        '485.2',
        'Wawancara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        990,
        '485.3',
        'Informasi Nasional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        991,
        '486',
        'Grafika',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        992,
        '487',
        'Penerangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        993,
        '487.1',
        'Pameran Non Komersil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        994,
        '488',
        'Operation Room',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        995,
        '489',
        'Hubungan Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        996,
        '490',
        'Pengaduan Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        997,
        '491',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        998,
        '492',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        999,
        '500',
        'PEREKONOMIAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1000,
        '500.1',
        'Dewan Stabilisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1001,
        '501',
        'Pengadaan Pangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1002,
        '502',
        'Pengadaan Sandang Perizinan Pada Umumnya Untuk Perizinan Suatu Bidang,',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1003,
        '503',
        'Kalsifikasikan Masalahnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1004,
        '504',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1005,
        '505',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1006,
        '506',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1007,
        '510',
        'PERDAGANGAN',
        'Klasifikasikan Disini: Tata Niaga',
        1,
        NULL,
        NULL
    ),
    (
        1008,
        '510.1',
        'Promosi Perdagangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1009,
        '510.11',
        'Pekan Raya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1010,
        '510.12',
        'Iklan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1011,
        '510.13',
        'Pameran Non Komersil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1012,
        '510.2',
        'Pelelangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1013,
        '510.3',
        'Tera',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1014,
        '511',
        'Pemasaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1015,
        '511.1',
        'Sembilan Bahan Pokok, Tambahkan Kode Wilayah : Beras, Garam, Tanah, Minyak Goreng',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1016,
        '511.2',
        'Pasar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1017,
        '511.3',
        'Pertokoan, Kaki Lima, Kios',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1018,
        '512',
        'Ekspor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1019,
        '513',
        'Impor',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1020,
        '514',
        'Perdagangan Antar Pulau',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1021,
        '515',
        'Perdagangan Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1022,
        '516',
        'Pergudangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1023,
        '517',
        'Aneka Usaha Perdagangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1024,
        '518',
        'Koperasi untuk BUUD, KUD lihat ( 412.31-412.32)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1025,
        '519',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1026,
        '520',
        'PERTANIAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1027,
        '521',
        'Tanaman Pangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1028,
        '521.1',
        'Program',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1029,
        '521.11',
        'Bimas / Inmas Termasuk Kredit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1030,
        '521.12',
        'Penyuluhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1031,
        '521.2',
        'Produksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1032,
        '521.21',
        'Padi / Panen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1033,
        '521.22',
        'Palawija',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1034,
        '521.23',
        'Jagung',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1035,
        '521.24',
        'Ketela Pohon / Ubi-Ubian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1036,
        '521.25',
        'Hortikultura',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1037,
        '521.26',
        'Sayuran / Buah-Buahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1038,
        '521.27',
        'Tanaman Hias',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1039,
        '521.28',
        'Pembudidayaan Rumput Laut',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1040,
        '521.3',
        'Saran Usaha Pertanian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1041,
        '521.31',
        'Peralatan Meliputi: Traktor Dan Peralatan Lainya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1042,
        '521.32',
        'Pembibitan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1043,
        '521.33',
        'Pupuk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1044,
        '521.4',
        'Perlindungan Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1045,
        '521.41',
        'Penyakit, Penyakit Daun, Penyakit Batang Hama, Serangga, Wereng, Walang Sangit, Tungru, Tikus Dan Sejenisnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1046,
        '521.42',
        'Pemberantasan Hama Meliputi: Penyemprotan, Penyiangan, Geropyokan, Sparayer,',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1047,
        '521.43',
        'Pemberantasan Melalui Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1048,
        '521.44',
        'Pestisida',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1049,
        '521.5',
        'Tanah Pertanian Pangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1050,
        '521.51',
        'Persawahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1051,
        '521.52',
        'Perladangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1052,
        '521.53',
        'Kebun',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1053,
        '521.54',
        'Rumpun Ikan Laut',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1054,
        '521.55',
        'KTA/Lahan Kritis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1055,
        '521.6',
        'Pengusaha Petani',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1056,
        '521.7',
        'Bina Usaha',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1057,
        '521.71',
        'Pasca Panen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1058,
        '521.72',
        'Pemasaran Hasil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1059,
        '522',
        'Kehutanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1060,
        '522.1',
        'Program',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1061,
        '522.11',
        'Hak Pengusahaan Hutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1062,
        '522.12',
        'Tata Guna Hutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1063,
        '522.13',
        'Perpetaan Hutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1064,
        '522.14',
        'Tumpangsari',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1065,
        '522.2',
        'Produksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1066,
        '522.21',
        'Kayu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1067,
        '522.22',
        'Non Kayu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1068,
        '522.3',
        'Sarana  Usaha  Kehutanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1069,
        '522.4',
        'Penghijauan, Reboisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1070,
        '522.5',
        'Kelestarian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1071,
        '522.51',
        'Cagar Alam, Marga Satwa, Suaka Marga Satwa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1072,
        '522.52',
        'Berburu Meliputi Larangan Dan Ijin Berburu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1073,
        '522.53',
        'Kebun Binatang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1074,
        '522.54',
        'Konservasi Lahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1075,
        '522.6',
        'Penyakit/Hama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1076,
        '522.7',
        'Jenis-jenis Hutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1077,
        '522.71',
        'Hutan Hidup',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1078,
        '522.72',
        'Hutan Wisata',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1079,
        '522.73',
        'Hutan Produksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1080,
        '522.74',
        'Hutan Lindung',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1081,
        '523',
        'Perikanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1082,
        '523.1',
        'Program',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1083,
        '523.11',
        'Penyuluhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1084,
        '523.12',
        'Teknologi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1085,
        '523.2',
        'Produksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1086,
        '523.21',
        'Pelelangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1087,
        '523.3',
        'Usaha Perikanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1088,
        '523.31',
        'Pembibitan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1089,
        '523.32',
        'Daerah Penagkapan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1090,
        '523.33',
        'Pertambakan Meliputi: ( Tambak Ikan Air Deras, Tambak Udang dll )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1091,
        '523.34',
        'Jaring Terapung',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1092,
        '523.4',
        'Sarana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1093,
        '523.41',
        'Peralatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1094,
        '523.42',
        'Kapal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1095,
        '523.43',
        'Pelabuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1096,
        '523.5',
        'Pengusaha',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1097,
        '523.6',
        'Nelayan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1098,
        '524',
        'Peternakan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1099,
        '524.1',
        'Produksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1100,
        '524.11',
        'Susu Ternak Rakyat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1101,
        '524.12',
        'Telur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1102,
        '524.13',
        'Daging',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1103,
        '524.14',
        'Kulit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1104,
        '524.2',
        'Sarana Usaha Ternak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1105,
        '524.21',
        'Pembibitan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1106,
        '524.22',
        'Kandang Ternak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1107,
        '524.3',
        'Kesehatan Hewan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1108,
        '524.31',
        'Penyakit Hewan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1109,
        '524.32',
        'Pos Kesehatan Hewan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1110,
        '524.33',
        'Tesi Pullorum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1111,
        '524.34',
        'Karantina',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1112,
        '524.35',
        'Pemberantasan Penyakit Hewan Termasuk Usaha Pencegahannya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1113,
        '524.4',
        'Perunggasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1114,
        '524.5',
        'Pengembangan Ternak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1115,
        '524.51',
        'Inseminasi Buatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1116,
        '524.52',
        'Pembibitan / Bibit Unggul',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1117,
        '524.53',
        'Penyebaran Ternak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1118,
        '524.6',
        'Makanan Ternak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1119,
        '524.7',
        'Tempat Pemotongan Hewan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1120,
        '524.8',
        'Data Peternakan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1121,
        '525',
        'Perkebunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1122,
        '525.1',
        'Program',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1123,
        '525.2',
        'Produksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1124,
        '525.21',
        'Karet',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1125,
        '525.22',
        'The',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1126,
        '525.23',
        'Tembakau',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1127,
        '525.24',
        'Tebu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1128,
        '525.25',
        'Cengkeh',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1129,
        '525.26',
        'Kopra',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1130,
        '525.27',
        'Kopi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1131,
        '525.28',
        'Coklat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1132,
        '525.29',
        'Aneka Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1133,
        '526',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1134,
        '527',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1135,
        '528',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1136,
        '530',
        'PERINDUSTRIAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1137,
        '530.08',
        'Undang-Undang Gangguan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1138,
        '531',
        'Industri Logam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1139,
        '532',
        'Industri Mesin/Elektronik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1140,
        '533',
        'Industri Kimia/Farmasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1141,
        '534',
        'Industri Tekstil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1142,
        '535',
        'Industri Makanan / Minuman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1143,
        '536',
        'Aneka Industri / Perusahaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1144,
        '537',
        'Aneka Kerajinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1145,
        '538',
        'Usaha Negara / BUMN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1146,
        '538.1',
        'Perjan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1147,
        '538.2',
        'Perum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1148,
        '538.3',
        'Persero / PT, CV',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1149,
        '539',
        'Perusahaan Daerah / BUMD/BULD',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1150,
        '540',
        'PERTAMBANGAN / KESAMUDRAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1151,
        '541',
        'Minyak Bumi / Bensin',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1152,
        '541.1',
        'Pengusahaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1153,
        '542',
        'Gas bumi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1154,
        '542.1',
        'Eksploitasi / Pengeboran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1155,
        '542.11',
        'Kontrak Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1156,
        '542.2',
        'Penogolahan,',
        'Meliputi :Tangki, Pompa, Tanker',
        1,
        NULL,
        NULL
    ),
    (
        1157,
        '543',
        'Aneka Tambang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1158,
        '543.1',
        'Timah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1159,
        '543.2',
        'Alumunium, Boxit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1160,
        '543.3',
        'Besi Termasuk Besi Tua',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1161,
        '543.4',
        'Tembaga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1162,
        '543.5',
        'Batu Bara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1163,
        '544',
        'Logam Mulia,Emas,Intan,Perak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1164,
        '545',
        'Logam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1165,
        '546',
        'Geologi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1166,
        '546.1',
        'Vulkanologi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1167,
        '546.11',
        'Pengawasan Gunung Berapi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1168,
        '546.2',
        'Sumur Artesis, Air Bawah Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1169,
        '547',
        'Hidrologi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1170,
        '548',
        'Kesamudraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1171,
        '549',
        'Pesisir Pantai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1172,
        '550',
        'PERHUBUNGAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1173,
        '551',
        'Perhubungan Darat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1174,
        '551.1',
        'Lalu Lintas Jalan Raya, Sungai, Danau',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1175,
        '551.11',
        'Keamanan Lalu Lintas, Rambu-Rambu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1176,
        '551.2',
        'Angkutan Jalan Raya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1177,
        '551.21',
        'Perizinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1178,
        '551.22',
        'Terminal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1179,
        '551.23',
        'Alat Angkutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1180,
        '551.3',
        'Angkutan Sungai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1181,
        '551.31',
        'Perizinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1182,
        '551.32',
        'Terminal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1183,
        '551.33',
        'Pelabuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1184,
        '551.4',
        'Angkutan Danau',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1185,
        '551.41',
        'Perizinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1186,
        '551.42',
        'Terminal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1187,
        '551.43',
        'Pelabuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1188,
        '551.5',
        'Feri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1189,
        '551.51',
        'Perizinan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1190,
        '551.52',
        'Terminal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1191,
        '551.53',
        'Pelabuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1192,
        '551.6',
        'Perkereta-Apian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1193,
        '552',
        'Perhubungan Laut',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1194,
        '552.1',
        'Lalu Lintas Angkutan Laut, Pelayanan Umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1195,
        '552.11',
        'Keamanan Lalu Lintas, Rambu-Rambu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1196,
        '552.12',
        'Pelayaran Dalam Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1197,
        '552.13',
        'Pelayaran Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1198,
        '552.2',
        'Perkapalan Alat Angkutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1199,
        '552.3',
        'Pelabuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1200,
        '552.4',
        'Pengerukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1201,
        '552.5',
        'Penjagaan Pantai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1202,
        '553',
        'Perhubungan Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1203,
        '553.1',
        'Lalu Lintas Udara / Keamanan Lalu Lintas Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1204,
        '553.2',
        'Pelabuhan Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1205,
        '553.3',
        'Alat Angkutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1206,
        '554',
        'Pos',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1207,
        '555',
        'Telekomunikasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1208,
        '555.1',
        'Telepon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1209,
        '555.2',
        'Telegram',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1210,
        '555.3',
        'Telex / SSB, Faximile',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1211,
        '555.4',
        'Satelit, Internet',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1212,
        '555.5',
        'Stasiun Bumi, Parabola',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1213,
        '556',
        'Pariwisata dan Rekreasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1214,
        '556.1',
        'Obyek Kepariwisataan Taman Mini Indonesia Indah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1215,
        '556.2',
        'Perhotelan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1216,
        '556.3',
        'Travel service',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1217,
        '556.4',
        'Tempat Rekreasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1218,
        '557',
        'Meteorologi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1219,
        '557.1',
        'Ramalan Cuaca',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1220,
        '557.2',
        'Curah Hujan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1221,
        '557.3',
        'Kemarau Panjang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1222,
        '558',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1223,
        '559',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1224,
        '560',
        'TENAGA KERJA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1225,
        '560.1',
        'Pengangguran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1226,
        '561',
        'Upah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1227,
        '562',
        'Penempatan Tenaga Kerja, TKI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1228,
        '563',
        'Latihan Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1229,
        '564',
        'Tenaga Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1230,
        '564.1',
        'Butsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1231,
        '564.2',
        'Padat Karya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1232,
        '565',
        'Perselisihan Perburuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1233,
        '566',
        'Keselamatan Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1234,
        '567',
        'Pemutusan Hubungan Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1235,
        '568',
        'kesejahteraan Buruh',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1236,
        '569',
        'Tenaga Orang Asing',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1237,
        '570',
        'PERMODALAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1238,
        '571',
        'Modal Domestik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1239,
        '572',
        'Modal Asing',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1240,
        '573',
        'Modal Patungan (Joint Venture) / Penyertaan Modal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1241,
        '574',
        'Pasar Uang Dan Modal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1242,
        '575',
        'Saham',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1243,
        '576',
        'Belanja Modal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1244,
        '577',
        'Modal Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1245,
        '580',
        'PERBANKAN / MONETER',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1246,
        '581',
        'Kredit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1247,
        '582',
        'Investasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1248,
        '583',
        'Pembukaan ,Perubahan,Penutupan Rekening, Deposito',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1249,
        '584',
        'Bank Pembangunan Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1250,
        '585',
        'Asuransi Dana Kecelakaan Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1251,
        '586',
        'Alat Pembayaran, Cek, Giro, Wesel, Transfer',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1252,
        '587',
        'Fiskal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1253,
        '588',
        'Hutang Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1254,
        '589',
        'Moneter',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1255,
        '590',
        'AGRARIA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1256,
        '591',
        'Tataguna Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1257,
        '591.1',
        'Pemetaan dan Pengukuran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1258,
        '591.2',
        'Perpetaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1259,
        '591.3',
        'penyediaan Data',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1260,
        '591.4',
        'Fatwa Tata Guna Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1261,
        '591.5',
        'Tanah Kritis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1262,
        '592',
        'Landreform',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1263,
        '592.1',
        'Redistribusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1264,
        '592.11',
        'Pendaftaran Pemilikan Dan Pengurusan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1265,
        '592.12',
        'Penentuan Tanah Obyek Landreform',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1266,
        '592.13',
        'Pembagian Tanah Obyek Landreform',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1267,
        '592.14',
        'Sengketa Redistribusi Tanah Obyek Landreform',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1268,
        '592.2',
        'Ganti Rugi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1269,
        '592.21',
        'Ganti Rugi Tanah Kelebihan',
        'Meliputi : Sengketa Ganti Rugi Tanah Kelebihan Tanah',
        1,
        NULL,
        NULL
    ),
    (
        1270,
        '592.22',
        'Ganti Rugi Tanah Absentee',
        'Meliputi : Sengketa Ganti Rugi Tanah Absentee',
        1,
        NULL,
        NULL
    ),
    (
        1271,
        '592.23',
        'Ganti Rugi Tanah Partikelir',
        'Meliputi : Sengketa Ganti Rugi Tanah Partikelir',
        1,
        NULL,
        NULL
    ),
    (
        1272,
        '592.3',
        'Bagi Hasil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1273,
        '592.31',
        'Penetapan Imbangan Bagi Hasil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1274,
        '592.32',
        'Pelaksanaan Perjanjian Bagi Hasil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1275,
        '592.33',
        'Sengketa Perjanjian Bagi Hasil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1276,
        '592.4',
        'Gadai Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1277,
        '592.41',
        'Pendaftaran Pemilikan Dan Pengurusan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1278,
        '592.42',
        'Pelaksanaan Gadai Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1279,
        '592.43',
        'Sengketa Gadai Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1280,
        '592.5',
        'Bimbingan dan Penyuluhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1281,
        '592.6',
        'Pengembangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1282,
        '592.7',
        'Yayasan Dana Landreform',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1283,
        '593',
        'Pengurusan Hak-Hak Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1284,
        '593.01',
        'Penyusunan Program Dan Bimbingan Teknis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1285,
        '593.1',
        'Sewa Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1286,
        '593.11',
        'Sewa Tanah Untuk Tanaman Tertentu, Tebu, Tembakau, Rosela, Chorcorus',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1287,
        '593.2',
        'Hak Milik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1288,
        '593.21',
        'Perorangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1289,
        '593.22',
        'Badan Hukum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1290,
        '593.3',
        'Hak Pakai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1291,
        '593.31',
        'Perorangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1292,
        '593.311',
        'Warga Negara Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1293,
        '593.312',
        'Warga Negara Asing',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1294,
        '593.32',
        'Badan Hukum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1295,
        '593.321',
        'Badan Hukum Indonesia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1296,
        '593.322',
        'Badan Hukum Asing, Kedutaan, Konsulat Kantor Dagang Asing',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1297,
        '593.33',
        'Tanah Gedung-Gedung Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1298,
        '593.4',
        'Guna Usaha',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1299,
        '593.41',
        'Perkebunan Besar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1300,
        '593.42',
        'Perkebunan Rakyat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1301,
        '593.43',
        'Peternakan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1302,
        '593.44',
        'Perikanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1303,
        '593.45',
        'Kehutanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1304,
        '593.5',
        'Hak Guna Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1305,
        '593.51',
        'Perorangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1306,
        '593.52',
        'Badan Hukum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1307,
        '593.53',
        'P3MB (Panitia Pelaksana Penguasaan Milik Belanda)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1308,
        '593.54',
        'Badan Hukum Asing Belanda-Prrk No 5165',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1309,
        '593.55',
        'Pemulihan Hak (Pen Pres 4/1960)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1310,
        '593.6',
        'Hak Pengelolaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1311,
        '593.61',
        'PN Perumnas, Bonded Ware House, Industrial Estate, Real Estate',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1312,
        '593.62',
        'Perusahaan Daerah Pembangunan Perumahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1313,
        '593.7',
        'Sengketa Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1314,
        '593.71',
        'Peradilan Perkara Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1315,
        '593.8',
        'Pencabutan dan Pembebasan Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1316,
        '593.81',
        'Pencabutan Hak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1317,
        '593.82',
        'Pembebasan Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1318,
        '593.83',
        'Ganti Rugi Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1319,
        '594',
        'Pendaftaran Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1320,
        '594.1',
        'Pengukuran / Pemetaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1321,
        '594.11',
        'Fotogrametri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1322,
        '594.12',
        'Terristris',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1323,
        '594.13',
        'Triangulasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1324,
        '594.14',
        'Peralatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1325,
        '594.2',
        'Dana Pengukuran (Permen Agraria No. 61/1965)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1326,
        '594.3',
        'Sertifikat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1327,
        '594.4',
        'Pejabat Pembuat Akta Tanah (PPAT)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1328,
        '595',
        'Lahan Transmigrasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1329,
        '595.1',
        'Tataguna Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1330,
        '595.2',
        'Landreform',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1331,
        '595.3',
        'Pengurusan Hak-Hak Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1332,
        '595.4',
        'Pendaftaran Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1333,
        '596',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1334,
        '597',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1335,
        '598',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1336,
        '599',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1337,
        '600',
        'PEKERJAAN UMUM DAN KETENAGAKERJAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1338,
        '601',
        'Tata Bangunan Konstruksi Dan Industri Konstruksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1339,
        '602',
        'Kontraktor Pemborong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1340,
        '602.1',
        'Tender',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1341,
        '602.2',
        'Pennunjukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1342,
        '602.3',
        'Prakualifikasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1343,
        '602.31',
        'Daftar Rekanan Mampu (DRM)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1344,
        '602.32',
        'Tanda Daftar Rekanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1345,
        '603',
        'Arsitektur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1346,
        '604',
        'Bahan Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1347,
        '604.1',
        'Tanah Dan Batu Seperti: Batu Belah, Steen Slaag, Split dsb',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1348,
        '604.2',
        'Aspal, Aspal Buatan, Aspal Alam (butas)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1349,
        '604.3',
        'Besi Dan Logam Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1350,
        '604.31',
        'Besi Beton',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1351,
        '604.32',
        'Besi Profil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1352,
        '604.33',
        'Paku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1353,
        '604.34',
        'Alumunium, Profil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1354,
        '604.4',
        'Bahan-Bahan Pelindung Dan Pengawet ',
        '(Cat, Tech Til, Pengawet Kayu)',
        1,
        NULL,
        NULL
    ),
    (
        1355,
        '604.5',
        'Semen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1356,
        '604.6',
        'Kayu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1357,
        '604.7',
        'Bahan Penutup Atap ',
        '(Genting, Asbes Gelombang, Seng Dan Sebagainya)',
        1,
        NULL,
        NULL
    ),
    (
        1358,
        '604.8',
        'Alat-Alat Penggantung Dan Pengunci',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1359,
        '604.9',
        'Bahan-Bahan Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1360,
        '605',
        'Instalasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1361,
        '605.1',
        'Instalasi Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1362,
        '605.2',
        'Instalasi Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1363,
        '605.3',
        'Instalasi Air Sanitasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1364,
        '605.4',
        'Instalasi Pengatur Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1365,
        '605.5',
        'Instalasi Akustik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1366,
        '605.6',
        'Instalasi Cahaya / Penerangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1367,
        '606',
        'Konstruksi Pencegahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1368,
        '606.1',
        'Konstruksi Pencegahan Terhadap Kebakaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1369,
        '606.2',
        'Konstruksi Pencegahan Terhadap Gempa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1370,
        '606.3',
        'Konstruksi Penegahan Terhadap Angin Udara/Panas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1371,
        '606.4',
        'Konstruksi Pencegahan Terhadap Kegaduhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1372,
        '606.5',
        'Konstruksi Pencegahan Terhadap Gas/Explosive',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1373,
        '606.6',
        'Konstruksi Pencegahan Terhadap Serangga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1374,
        '606.7',
        'Konstruksi Pencegahan Terhadap Radiasi Atom',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1375,
        '607',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1376,
        '608',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1377,
        '609',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1378,
        '610',
        'PENGAIRAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1379,
        '611',
        'Irigasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1380,
        '611.1',
        'Bangunan Waduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1381,
        '611.11',
        'Bendungan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1382,
        '611.12',
        'Tanggul',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1383,
        '611.13',
        'Pelimpahan Banjir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1384,
        '611.14',
        'Menara Pengambilan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1385,
        '611.2',
        'Bangunan Pengambilan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1386,
        '611.21',
        'Bendungan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1387,
        '611.22',
        'Bendungan Dengan Pintu Bilas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1388,
        '611.23',
        'Bendungan Dengan Pompa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1389,
        '611.24',
        'Pengambilan Bebas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1390,
        '611.25',
        'Pengambilan Bebas Dengan Pompa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1391,
        '611.26',
        'Sumur Dengan Pompa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1392,
        '611.27',
        'Kantung Lumpur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1393,
        '611.28',
        'Slit Ekstrator',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1394,
        '611.29',
        'Escope Channel',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1395,
        '611.3',
        'Bangunan Pembawa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1396,
        '611.31',
        'Saluran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1397,
        '611.311',
        'Saluran Induk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1398,
        '611.312',
        'Saluran Sekunder',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1399,
        '611.313',
        'Suplesi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1400,
        '611.314',
        'Tersier',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1401,
        '611.315',
        'Saluran Kwarter',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1402,
        '611.316',
        'Saluran Pasangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1403,
        '611.317',
        'Saluran Tertutup / Terowongan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1404,
        '611.32',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1405,
        '611.321',
        'Bangunan Bagi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1406,
        '611.322',
        'Bangunan Bagi Dan Sadap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1407,
        '611.323',
        'Bangunan Sadap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1408,
        '611.324',
        'Bangunan Check',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1409,
        '611.325',
        'Bangunan Terjun',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1410,
        '611.33',
        'Box Tersier',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1411,
        '611.34',
        'Got Miring',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1412,
        '611.35',
        'Talang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1413,
        '611.36',
        'Syphon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1414,
        '611.37',
        'Gorong-Gorong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1415,
        '611.38',
        'Pelimpah Samping',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1416,
        '611.4',
        'Bangunan Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1417,
        '611.41',
        'Saluran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1418,
        '611.411',
        'Saluran Pembuang Induk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1419,
        '611.412',
        'Saluran Pembuang Sekunder',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1420,
        '611.413',
        'Saluran Tersier',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1421,
        '611.42',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1422,
        '611.421',
        'Bangunan Outlet',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1423,
        '611.422',
        'Bangunan Terjun',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1424,
        '611.423',
        'Bangunan Penahan Banjir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1425,
        '611.43',
        'Gorong-Gorong Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1426,
        '611.44',
        'Talang Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1427,
        '611.45',
        'Syphon Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1428,
        '611.5',
        'Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1429,
        '611.51',
        'Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1430,
        '611.511',
        'Jalan Inspeksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1431,
        '611.512',
        'Jalan Logistik Waduk Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1432,
        '611.52',
        'Jembatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1433,
        '611.521',
        'Jembatan Inspeksi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1434,
        '611.522',
        'Jembatan Hewan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1435,
        '611.53',
        'Tangga Cuci',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1436,
        '611.54',
        'Kubangan Kerbau',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1437,
        '611.55',
        'Waduk Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1438,
        '611.56',
        'Bangunan Penunjang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1439,
        '611.57',
        'Jaringan Telepon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1440,
        '611.58',
        'Stasiun Agro',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1441,
        '612',
        'Folder',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1442,
        '612.1',
        'Tanggul Keliling',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1443,
        '612.11',
        'Tanggul',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1444,
        '612.12',
        'Bangunan Penutup Sungai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1445,
        '612.13',
        'Jembatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1446,
        '612.2',
        'Bangunan Pembawa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1447,
        '612.21',
        'Saluran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1448,
        '612.211',
        'Saluran Muka',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1449,
        '612.212',
        'Saluran Pembawa Waduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1450,
        '612.213',
        'Saluran Pembawa Sekunder',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1451,
        '612.22',
        'Stasiun Pompa Pemasukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1452,
        '612.23',
        'Bangunan Bagi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1453,
        '612.24',
        'Gorong-Gorong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1454,
        '612.25',
        'Syphon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1455,
        '612.3',
        'Bangunan Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1456,
        '612.31',
        'Stasiun Pompa Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1457,
        '612.32',
        'Saluran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1458,
        '612.321',
        'Saluran Pembuang Induk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1459,
        '612.322',
        'Saluran Pembuang Sekunder',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1460,
        '612.33',
        'Pintu Air Pembuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1461,
        '612.34',
        'Gorong-Gorong Pembuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1462,
        '612.35',
        'Syphon Pembuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1463,
        '612.4',
        'Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1464,
        '612.41',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1465,
        '612.411',
        'Bangunan Pengukur Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1466,
        '612.412',
        'Bangunan Pengukur Curah Hujan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1467,
        '612.413',
        'Bangunan Gudang Stasiun Pompa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1468,
        '612.414',
        'Bangunan Listrik Stasiun Pompa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1469,
        '612.42',
        'Rumah Petugas Aksploitasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1470,
        '613',
        'Pasang Surut',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1471,
        '613.1',
        'Bangunan Pembawa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1472,
        '613.11',
        'Saluran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1473,
        '613.111',
        'Saluran Pembawa Induk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1474,
        '613.112',
        'Saluran Pembawa Sekunder',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1475,
        '613.113',
        'Saluran Pembawa Tersier',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1476,
        '613.114',
        'Saluran penyimpanan air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1477,
        '613.12',
        'Bangunan Pintu Pemasukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1478,
        '613.2',
        'Bangunan Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1479,
        '613.21',
        'Saluran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1480,
        '613.211',
        'Saluran Pembuang Induk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1481,
        '613.212',
        'Saluran Pembuang Sekunder',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1482,
        '613.213',
        'Saluran Pembuang Tersier',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1483,
        '613.214',
        'Saluran Pengumpul Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1484,
        '613.22',
        'Bangunan Pintu Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1485,
        '613.3',
        'Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1486,
        '613.31',
        'Kolam Pasang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1487,
        '613.32',
        'Saluran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1488,
        '613.321',
        'Saluran Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1489,
        '613.322',
        'Saluran Muka',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1490,
        '613.33',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1491,
        '613.331',
        'Bangunan Penangkis Kotoran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1492,
        '613.332',
        'Bangunan Pengukur Muka Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1493,
        '613.333',
        'Bangunan Pengukur Curah Hujan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1494,
        '613.34',
        'Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1495,
        '613.35',
        'Jembatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1496,
        '614',
        'Pengendalian Sungai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1497,
        '614.1',
        'Bangunan Pengaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1498,
        '614.11',
        'Tanggul Banjir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1499,
        '614.12',
        'Pintu Pengatur Banjir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1500,
        '614.13',
        'Klep Pengatur Banjir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1501,
        '614.14',
        'Tembok Pengaman Talud',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1502,
        '614.15',
        'Krib',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1503,
        '614.16',
        'Kantung Lumpur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1504,
        '614.17',
        'Check-Dam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1505,
        '614.18',
        'Syphon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1506,
        '614.2',
        'Saluran Pengaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1507,
        '614.21',
        'Saluran Banjir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1508,
        '614.22',
        'Saluran Drainage',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1509,
        '614.23',
        'Corepure',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1510,
        '614.3',
        'Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1511,
        '614.31',
        'Warning System',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1512,
        '614.32',
        'Stasiun',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1513,
        '614.321',
        'Stasiun Pengukur Curah Hujan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1514,
        '614.322',
        'Stasiun Pengukur Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1515,
        '614.323',
        'Stasiun Pengukur Cuaca',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1516,
        '614.324',
        'Stasiun Pos Penjagaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1517,
        '615',
        'Pengamanan Pantai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1518,
        '615.1',
        'Tanggul',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1519,
        '615.2',
        'Krib',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1520,
        '615.3',
        'Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1521,
        '616',
        'Air Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1522,
        '616.1',
        'Stasiun Pompa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1523,
        '616.2',
        'Bangunan Pembawa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1524,
        '616.3',
        'Bangunan Pembuang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1525,
        '616.4',
        'Bangunan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1526,
        '617',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1527,
        '618',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1528,
        '619',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1529,
        '620',
        'JALAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1530,
        '621',
        'Jalan Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1531,
        '621.1',
        'Daerah Penguasaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1532,
        '621.11',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1533,
        '621.12',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1534,
        '621.13',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1535,
        '621.2',
        'Bangunan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1536,
        '621.21',
        'Jalan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1537,
        '621.22',
        'Jembatan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1538,
        '621.23',
        'Kantor Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1539,
        '621.24',
        'Gedung Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1540,
        '621.25',
        'Barak Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1541,
        '621.26',
        'Laboratorium Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1542,
        '621.27',
        'Rumah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1543,
        '621.3',
        'Badan Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1544,
        '621.31',
        'Pekerjaan Tanah (Earth Work)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1545,
        '621.32',
        'Stabilisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1546,
        '621.4',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1547,
        '621.41',
        'Lapis Pondasi Bawah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1548,
        '621.42',
        'Lapis Pondasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1549,
        '621.43',
        'Lapis Permukaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1550,
        '621.5',
        'Drainage',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1551,
        '621.51',
        'Parit Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1552,
        '621.52',
        'Gorong-Gorong (Culvert)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1553,
        '621.6',
        'Buku Trotuir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1554,
        '621.61',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1555,
        '621.62',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1556,
        '621.63',
        'Pasangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1557,
        '621.7',
        'Median',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1558,
        '621.71',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1559,
        '621.72',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1560,
        '621.73',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1561,
        '621.74',
        'Pasangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1562,
        '621.8',
        'Daerah Samping',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1563,
        '621.81',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1564,
        '621.82',
        'Pagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1565,
        '621.9',
        'Bangunan Pelengkap Dan Pengamanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1566,
        '621.91',
        'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1567,
        '621.92',
        'Lampu Penerangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1568,
        '621.93',
        'Lampu Pengatur Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1569,
        '621.94',
        'Patok-Patok KM',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1570,
        '621.95',
        'Patok-Patok ROW (Sempadan)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1571,
        '621.96',
        'Rel Pengamanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1572,
        '621.97',
        'Pagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1573,
        '621.98',
        'Turap Penahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1574,
        '621.99',
        'Bronjong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1575,
        '622',
        'Jalan Luar Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1576,
        '622.1',
        'Daerah Penguasaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1577,
        '622.11',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1578,
        '622.12',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1579,
        '622.13',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1580,
        '622.2',
        'Bangunan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1581,
        '622.21',
        'Jalan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1582,
        '622.22',
        'Jembatan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1583,
        '622.23',
        'Kantor Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1584,
        '622.24',
        'Gudang Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1585,
        '622.25',
        'Barak Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1586,
        '622.26',
        'Laboratorium Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1587,
        '622.27',
        'Rumah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1588,
        '622.3',
        'Badan Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1589,
        '622.31',
        'Pekerjaan Tanah (Earth Work)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1590,
        '622.32',
        'Stabilisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1591,
        '622.4',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1592,
        '622.41',
        'Lapis Pondasi Bawah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1593,
        '622.42',
        'Lapis Pondasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1594,
        '622.43',
        'Lapis Permukaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1595,
        '622.5',
        'Drainage',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1596,
        '622.51',
        'Parit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1597,
        '622.52',
        'Gorong-Gorong (Culvert)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1598,
        '622.53',
        'Sub Drainage',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1599,
        '622.6',
        'Trotoar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1600,
        '622.61',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1601,
        '622.62',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1602,
        '622.7',
        'Median',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1603,
        '622.71',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1604,
        '622.72',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1605,
        '622.73',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1606,
        '622.74',
        'Pasangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1607,
        '622.8',
        'Daerah Samping',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1608,
        '622.81',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1609,
        '622.82',
        'Pagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1610,
        '622.9',
        'Bangunan Pelengkap Dan Pengamanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1611,
        '622.91',
        'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1612,
        '622.92',
        'Lampu Penerangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1613,
        '622.93',
        'Lampu Pengatur Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1614,
        '622.94',
        'Patok-Patok KM',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1615,
        '622.95',
        'Patok-Patok ROW (Sempadan)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1616,
        '622.96',
        'Rel Pengamanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1617,
        '622.97',
        'Pagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1618,
        '622.98',
        'Turap Penahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1619,
        '622.99',
        'Bronjong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1620,
        '623',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1621,
        '623',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1622,
        '623',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1623,
        '630',
        'JEMBATAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1624,
        '631',
        'Jembatan Pada Jalan Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1625,
        '631.1',
        'Daerah Penguasaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1626,
        '631.11',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1627,
        '631.12',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1628,
        '631.13',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1629,
        '631.2',
        'Bangunan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1630,
        '631.21',
        'Jalan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1631,
        '631.22',
        'Jembatan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1632,
        '631.23',
        'Kantor Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1633,
        '631.24',
        'Gudang Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1634,
        '631.25',
        'Barak Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1635,
        '631.26',
        'Laboratorium Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1636,
        '631.27',
        'Rumah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1637,
        '631.3',
        'Pekerjaan Tanah (Earth Work)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1638,
        '631.31',
        'Galian Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1639,
        '631.32',
        'Timbunan Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1640,
        '631.4',
        'Pondasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1641,
        '631.41',
        'Pondasi Kepala Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1642,
        '631.42',
        'Pondasi Pilar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1643,
        '631.43',
        'Angker',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1644,
        '631.5',
        'Bangunan Bawah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1645,
        '631.51',
        'Kepala Jembatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1646,
        '631.52',
        'Pilar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1647,
        '631.53',
        'Piloon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1648,
        '631.54',
        'Landasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1649,
        '631.6',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1650,
        '631.61',
        'Gelagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1651,
        '631.62',
        'Lantai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1652,
        '631.63',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1653,
        '631.64',
        'Jalan Orang / Trotoar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1654,
        '631.65',
        'Sandaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1655,
        '631.66',
        'Talang air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1656,
        '631.7',
        'Bangunan / Pengaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1657,
        '631.71',
        'Turap Penahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1658,
        '631.72',
        'Bronjong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1659,
        '631.73',
        '',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1660,
        '631.74',
        'Kist Dam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1661,
        '631.75',
        'Corepure',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1662,
        '631.76',
        'Krib',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1663,
        '631.8',
        'Bangunan Pelengkap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1664,
        '631.81',
        'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1665,
        '631.82',
        'Lampu Penerangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1666,
        '631.83',
        'Lampu Pengatur Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1667,
        '631.84',
        'Patok Pengaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1668,
        '631.85',
        'Patok ROW (Sempadan)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1669,
        '631.86',
        'Pagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1670,
        '631.9',
        'Oprit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1671,
        '631.91',
        'Badan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1672,
        '631.92',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1673,
        '631.93',
        'Drainage',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1674,
        '631.94',
        'Baku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1675,
        '631.95',
        'Median',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1676,
        '632',
        'Jembatan Pada Jalan Luar Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1677,
        '632.1',
        'Daerah Penguasaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1678,
        '632.11',
        'Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1679,
        '632.12',
        'Tanaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1680,
        '632.13',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1681,
        '632.2',
        'Bangunan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1682,
        '632.21',
        'Jalan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1683,
        '632.22',
        'Jembatan Sementara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1684,
        '632.23',
        'Kantor Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1685,
        '632.24',
        'Gudang Proyek',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1686,
        '632.25',
        'Barak Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1687,
        '632.26',
        'Laboratorium Lapangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1688,
        '632.27',
        'Rumah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1689,
        '632.3',
        'Pekerjaan Tanah (Earth Work)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1690,
        '632.31',
        'Galian Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1691,
        '632.32',
        'Timnunan Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1692,
        '632.4',
        'Pondasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1693,
        '632.41',
        'Pondasi Kepala Jembatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1694,
        '632.42',
        'Pondasi Pilar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1695,
        '632.43',
        'Pondasi Angker',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1696,
        '632.5',
        'Bangunan Bawah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1697,
        '632.51',
        'Kepala Jembatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1698,
        '632.52',
        'Pilar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1699,
        '632.53',
        'Piloon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1700,
        '632.54',
        'Landasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1701,
        '632.6',
        'Bangunan Atas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1702,
        '632.61',
        'Gelagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1703,
        '632.62',
        'Lantai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1704,
        '632.63',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1705,
        '632.64',
        'Jalan Orang / Trotoar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1706,
        '632.65',
        'Sandaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1707,
        '632.66',
        'Talang Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1708,
        '632.7',
        'Bangunan Pengaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1709,
        '632.71',
        'Turap / Penahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1710,
        '632.72',
        'Bronjong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1711,
        '632.73',
        'Stek Dam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1712,
        '632.74',
        'Kist Dam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1713,
        '632.75',
        'Corepure',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1714,
        '632.76',
        'Krib',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1715,
        '632.8',
        'Bangunan Pelengkap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1716,
        '632.81',
        'Rambu-Rambu/Tanda-Tanda Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1717,
        '632.82',
        'Lampu Penerangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1718,
        '632.83',
        'Lampu Pengatur Lalu Lintas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1719,
        '632.84',
        'Patok Pengaman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1720,
        '632.85',
        'Patok ROW (Sempadan)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1721,
        '632.86',
        'Pagar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1722,
        '632.9',
        'Oprit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1723,
        '632.91',
        'Badan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1724,
        '632.92',
        'Perkerasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1725,
        '632.93',
        'Drainage',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1726,
        '632.94',
        'Baku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1727,
        '632.95',
        'Median',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1728,
        '633',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1729,
        '634',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1730,
        '635',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1731,
        '640',
        'BANGUNAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1732,
        '640.1',
        'Gedung Pengadilan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1733,
        '640.2',
        'Rumah Pejabat Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1734,
        '640.3',
        'Gedung DPR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1735,
        '640.4',
        'Gedung Balai Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1736,
        '640.5',
        'Penjara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1737,
        '640.6',
        'Perkantoran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1738,
        '642',
        'Bangunan Pendidikan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1739,
        '642.1',
        'Taman Kanak-Kanak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1740,
        '642.2',
        'SD & SEKOLAH MENENGAH',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1741,
        '642.3',
        'Perguruan Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1742,
        '643',
        'Bangunan Rekreasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1743,
        '643.1',
        'BANGUNAN OLAH RAGA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1744,
        '643.2',
        'Gedung Kesenian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1745,
        '643.3',
        'Gedung Pemancar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1746,
        '644',
        'Bangunan Perdagangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1747,
        '644.1',
        'Pusat Perbelanjaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1748,
        '644.2',
        'Gedung Perdagangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1749,
        '644.3',
        'Bank',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1750,
        '644.4',
        'Pekantoran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1751,
        '645',
        'Bangunan Pelayanan Umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1752,
        '645.1',
        'MCK',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1753,
        '645.2',
        'Gedung Parkir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1754,
        '645.3',
        'Rumah Sakit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1755,
        '645.4',
        'Gedung Telkom',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1756,
        '645.5',
        'Terminal Angkutan udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1757,
        '645.6',
        'Terminal Angkutan udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1758,
        '645.7',
        'Terminal Angkutan Darat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1759,
        '645.8',
        'Bangunan Keagamaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1760,
        '646',
        'Bangunan Peninggalan Sejarah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1761,
        '646.1',
        'Monumen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1762,
        '646.2',
        'Candi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1763,
        '646.3',
        'Keraton',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1764,
        '646.4',
        'Rumah Tradisional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1765,
        '647',
        'Bangunan Industri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1766,
        '648',
        'Bangunan Tempat Tinggal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1767,
        '648.1',
        'Rumah Perkotaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1768,
        '648.11',
        'Inti / Sederhana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1769,
        '648.12',
        'Sedang / Mewah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1770,
        '648.2',
        'Rumah Pedesaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1771,
        '648.21',
        'Rumah Contoh',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1772,
        '648.3',
        'Real Estate',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1773,
        '648.4',
        'Bapetarum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1774,
        '649',
        'Elemen Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1775,
        '649.1',
        'Pondasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1776,
        '649.11',
        'Di Atas Tiang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1777,
        '649.2',
        'Dinding',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1778,
        '649.21',
        'Penahan Beban',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1779,
        '649.22',
        'Tidak Menahan Beban',
        '-',
        1,
        NULL,
        NULL
    );

INSERT INTO
    `klasifikasi_surats` (
        `id`,
        `kode`,
        `nama`,
        `deskripsi`,
        `status`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1780,
        '649.3',
        'Atap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1781,
        '649.4',
        'Lantai / Langit-Langit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1782,
        '649.41',
        'Supended',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1783,
        '649.42',
        'Solit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1784,
        '649.5',
        'Pintu / Jendela',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1785,
        '649.51',
        'Pintu Harmonik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1786,
        '649.52',
        'Pintu Biasa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1787,
        '649.53',
        'Pintu Sorong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1788,
        '649.54',
        'Pintu Kayu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1789,
        '649.55',
        'Jendela Sorong',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1790,
        '649.56',
        'Jendela Vertikal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1791,
        '650',
        'TATA KOTA',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1792,
        '651',
        'Daerah Perdagangan / Pelabuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1793,
        '651.1',
        'Daerah Pusat Perbelanjaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1794,
        '651.2',
        'Daerah Perkotaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1795,
        '652',
        'Daerah Pemerintah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1796,
        '653',
        'Daerah Perumahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1797,
        '653.1',
        'Kepadatan Rendah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1798,
        '653.2',
        'Kepadatan Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1799,
        '654',
        'Daerah Industri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1800,
        '654.1',
        'Industri Berat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1801,
        '654.2',
        'Industri Ringan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1802,
        '654.3',
        'Industri Ringan (Home Industry)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1803,
        '655',
        'Daerah Rekreasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1804,
        '655.1',
        'Public Garden',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1805,
        '655.2',
        'Sport & Playing Fields',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1806,
        '655.3',
        'Open Space',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1807,
        '656',
        'Transportasi (Tata Letak)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1808,
        '656.1',
        'Jaringan Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1809,
        '656.11',
        'Penerangan Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1810,
        '656.2',
        'Jaringan Kereta Api',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1811,
        '656.3',
        'Jaringan Sungai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1812,
        '657',
        'Assaineering',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1813,
        '657.1',
        'Saluran Pengumpulan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1814,
        '657.2',
        'Instalasi Pengolahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1815,
        '657.21',
        'Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1816,
        '657.211',
        'Bangunan Penyaringan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1817,
        '657.212',
        'Bangunan Penghancur Kotoran / Sampah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1818,
        '657.213',
        'Bangunan Pengendap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1819,
        '657.214',
        'Bangunan Pengering Lumpur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1820,
        '657.22',
        'Unit Densifektan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1821,
        '657.23',
        'Unit Perpompaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1822,
        '658',
        'Kesehatan Lingkungan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1823,
        '658.1',
        'Persampahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1824,
        '658.11',
        'Bangunan Pengumpul',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1825,
        '658.12',
        'Bangunan Pemusnahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1826,
        '658.2',
        'Pengotoran Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1827,
        '658.3',
        'pengotoran Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1828,
        '658.31',
        'Air Buangan Industri Limbah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1829,
        '658.4',
        'Kegaduhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1830,
        '658.5',
        'Kebersihan Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1831,
        '659',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1832,
        '660',
        'TATA LINGKUNGAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1833,
        '660.1',
        'Persampahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1834,
        '660.2',
        'Kebersihan Lingkungan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1835,
        '660.3',
        'Pencemaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1836,
        '660.31',
        'Pecemaran Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1837,
        '660.32',
        'Pencemaran Udara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1838,
        '661',
        'Daerah Hutan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1839,
        '662',
        'Daerah Pertanian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1840,
        '663',
        'Daerah Pemikiman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1841,
        '664',
        'Pusat Pertumbuhan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1842,
        '665',
        'Transportasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1843,
        '665.1',
        'Jaringan Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1844,
        '665.2',
        'Jaringan Kereta Api',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1845,
        '665.3',
        'Jaringan Sungai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1846,
        '666',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1847,
        '667',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1848,
        '668',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1849,
        '670',
        'KETENAGAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1850,
        '671',
        'Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1851,
        '671.1',
        'Kelistrikan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1852,
        '671.11',
        'Kelisrikan PLN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1853,
        '671.12',
        'Kelistrikan Non PLN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1854,
        '671.2',
        'Pembangkit Tenaga Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1855,
        '671.21',
        'PLTA  ( Pembangkit  Listrik Tenaga Air )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1856,
        '671.22',
        'PLTD  ( Pembangkit Listrik Tenaga Diesel )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1857,
        '671.23',
        'PLTG P ( Pembangkit Listrik Tenaga Gas )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1858,
        '671.24',
        'PLTM ( Pembangkit  Listrik Tenaga Matahari )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1859,
        '671.25',
        'PLTN ( Pembangkit Listrik Tenaga Nuklir )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1860,
        '671.26',
        'PLTPB ( Pembangkit Listrik Tenaga Uap )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1861,
        '671.3',
        'Transmisi Tenaga Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1862,
        '671.31',
        'Gardu Induk/Gardu Penghubung/Gardu Trafo',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1863,
        '671.32',
        'Saluran Udara Tegangan Tinggi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1864,
        '671.33',
        'Kabel Bawah Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1865,
        '671.4',
        'Distribusi Tenaga Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1866,
        '671.41',
        'Gardu Distribusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1867,
        '671.42',
        'Tegangan Rendah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1868,
        '671.43',
        'Tegangan Menengah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1869,
        '671.44',
        'Jaringan Bawah Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1870,
        '671.5',
        'Pengusahaan Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1871,
        '671.51',
        'Sambungan Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1872,
        '671.52',
        'Penjualan Tenaga Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1873,
        '671.53',
        'Tarif Listrik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1874,
        '672',
        'Tenaga Air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1875,
        '673',
        'Tenaga Minyak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1876,
        '674',
        'Tenaga Gas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1877,
        '675',
        'Tenaga Matahari',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1878,
        '676',
        'Tenaga Nuklir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1879,
        '677',
        'Tenaga Panas Bumi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1880,
        '678',
        'Tenaga Uap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1881,
        '679',
        'Tenaga Lainya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1882,
        '680',
        'PERALATAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1883,
        '681',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1884,
        '682',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1885,
        '683',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1886,
        '690',
        'AIR MINUM',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1887,
        '691',
        'Intake',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1888,
        '691.1',
        'Broncaptering',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1889,
        '691.2',
        'Sumur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1890,
        '691.3',
        'Bendungan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1891,
        '691.4',
        'Saringan (screen)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1892,
        '691.5',
        'Pintu air',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1893,
        '691.6',
        'Saluran Pembawa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1894,
        '691.7',
        'Alat Ukur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1895,
        '691.8',
        'Perpompaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1896,
        '692',
        'Transmisi Air Baku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1897,
        '692.1',
        'Perpipaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1898,
        '692.2',
        'Katup Udara (Air Relief)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1899,
        '692.3',
        'Katup Penguras (Blow Off)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1900,
        '692.4',
        'Bak Pelepas Tekanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1901,
        '692.5',
        'Jembatan Pipa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1902,
        '692.6',
        'Syphon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1903,
        '693',
        'Instalasi Pengelolaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1904,
        '693.1',
        'Bangunan Ukur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1905,
        '693.2',
        'Bangunan Aerasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1906,
        '693.3',
        'Bangunan Pengendapan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1907,
        '693.4',
        'Bangunan Pembubuh Bahan Kimia',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1908,
        '693.5',
        'Bangunan Pengaduk',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1909,
        '693.6',
        'Bangunan Saringan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1910,
        '693.7',
        'Perpompaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1911,
        '693.8',
        'Clear Hell',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1912,
        '694',
        'Distribusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1913,
        '694.1',
        'Reservoir Menara Bawah Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1914,
        '694.11',
        'Menara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1915,
        '694.12',
        'reservoir di Bawah Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1916,
        '694.2',
        'Perpipaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1917,
        '694.3',
        'Perpompaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1918,
        '694.4',
        'Jembatan Pipa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1919,
        '694.5',
        'Syphon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1920,
        '694.6',
        'Hydran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1921,
        '694.61',
        'Hydran Umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1922,
        '694.62',
        'Hydran Kebakaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1923,
        '694.7',
        'Katup',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1924,
        '694.71',
        'Katup Udara (Air Relief)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1925,
        '694.72',
        'Katup Pelepas (Blow Off)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1926,
        '694.8',
        'Bak Pelepas Tekanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1927,
        '695',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1928,
        '696',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1929,
        '697',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1930,
        '698',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1931,
        '699',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1932,
        '700',
        'PENGAWASAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1933,
        '701',
        'Bidang Urusan Dalam',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1934,
        '702',
        'Bidang Peralatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1935,
        '703',
        'Bidang Kekayaan Daerah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1936,
        '704',
        'Bidang Perpustakaan / Dokumentasi / Kearsipan Sandi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1937,
        '705',
        'Bidang Perencanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1938,
        '706',
        'Bidang Organisasi / Ketatalaksanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1939,
        '707',
        'Bidang Penelitian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1940,
        '708',
        'Bidang Konferensi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1941,
        '709',
        'Bidang Perjalanan Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1942,
        '710',
        'BIDANG PEMERINTAHAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1943,
        '711',
        'Bidang Pemerintahan Pusat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1944,
        '712',
        'Bidang Pemerintahan Provinsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1945,
        '713',
        'Bidang Pemerintahan Kabupaten / Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1946,
        '714',
        'Bidang Pemerintahan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1947,
        '715',
        'Bidang MPR / DPR',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1948,
        '716',
        'Bidang DPRD Provinsi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1949,
        '717',
        'Bidang DPRD Kabupaten / Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1950,
        '718',
        'Bidang Hukum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1951,
        '719',
        'Bidang Hubungan Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1952,
        '720',
        'BIDANG POLITIK',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1953,
        '721',
        'Bidang Kepartaian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1954,
        '722',
        'Bidang Organisasi Kemasyarakatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1955,
        '723',
        'Bidang Organisasi Profesi Dan Fungsional',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1956,
        '724',
        'Bidang Organisasi Pemuda',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1957,
        '725',
        'Bidang Organisasi Buruh, Tani, Dan Nelayan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1958,
        '726',
        'Bidang Organisasi Wanita',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1959,
        '727',
        'Bidang Pemilihan Umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1960,
        '730',
        'BIDANG KEAMANAN/KETERTIBAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1961,
        '731',
        'Bidang Pertahanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1962,
        '732',
        'Bidang Kemiliteran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1963,
        '733',
        'Bidang Perlindungan Masyarakat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1964,
        '734',
        'Bidang Kemanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1965,
        '735',
        'bidang Kejahatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1966,
        '736',
        'Bidang Bencana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1967,
        '737',
        'Bidang Kecelakaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1968,
        '738',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1969,
        '739',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1970,
        '740',
        'BIDANG KESEJAHTERAAN RAKYAT',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1971,
        '741',
        'Bidang Pembagunan Desa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1972,
        '742',
        'Bidang Pendidikan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1973,
        '743',
        'Bidang Kebudayaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1974,
        '744',
        'Bidang Kesehatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1975,
        '745',
        'Bidang Agama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1976,
        '746',
        'Bidang Sosial',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1977,
        '747',
        'Bidang Kependudukan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1978,
        '748',
        'Bidang Media Massa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1979,
        '749',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1980,
        '750',
        'BIDANG PEREKONOMIAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1981,
        '751',
        'Bidang Perdagangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1982,
        '752',
        'Bidang Pertanian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1983,
        '753',
        'Bidang Perindustrian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1984,
        '754',
        'Bidang Pertambangan / Kesamudraan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1985,
        '755',
        'Bidang Perhubungan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1986,
        '756',
        'Bidang Tenaga Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1987,
        '757',
        'Bidang Permodalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1988,
        '758',
        'Bidang Perbankan / Moneter',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1989,
        '759',
        'Bidang Agraria',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1990,
        '760',
        'BIDANG PEKERJAAN UMUM',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1991,
        '761',
        'Bidang Pengairan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1992,
        '762',
        'Bidang Jalan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1993,
        '763',
        'Bidang Jembatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1994,
        '764',
        'Bidang Bangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1995,
        '765',
        'Bidang Tata Kota',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1996,
        '766',
        'Bidang Lingkungan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1997,
        '767',
        'Bidang Ketenagaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1998,
        '768',
        'Bidang Peralatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        1999,
        '769',
        'Bidang Air Minum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2000,
        '770',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2001,
        '771',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2002,
        '772',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2003,
        '780',
        'BIDANG KEPEGAWAIAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2004,
        '781',
        'Bidang Pengadaan Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2005,
        '782',
        'Bidang Mutasi Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2006,
        '783',
        'Bidang Kedudukan Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2007,
        '784',
        'Bidang Kesejahteran Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2008,
        '785',
        'Bidang Cuti',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2009,
        '786',
        'Bidang Penilaian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2010,
        '787',
        'Bidang Tata Usaha Kepegawaian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2011,
        '788',
        'Bidang Pemberhentian Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2012,
        '789',
        'Bidang Pendidikan Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2013,
        '790',
        'BIDANG KEUANGAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2014,
        '791',
        'Bidang Anggaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2015,
        '792',
        'Bidang Otorisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2016,
        '793',
        'Bidang Verifikasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2017,
        '794',
        'Bidang Pembukuan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2018,
        '795',
        'Bidang Perbendaharaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2019,
        '796',
        'Bidang Pembina Kebendaharaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2020,
        '797',
        'Bidang Pendapatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2021,
        '798',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2022,
        '799',
        'Bidang Bendaharaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2023,
        '800',
        'KEPEGAWAIAN',
        'Klasifikasi Disini: Kebijaksanaan Kepegawaian',
        1,
        NULL,
        NULL
    ),
    (
        2024,
        '800.1',
        'Perencanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2025,
        '800.2',
        'Penelitian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2026,
        '800.043',
        'Pengaduan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2027,
        '800.05',
        'Tim',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2028,
        '800.07',
        'Statistik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2029,
        '800.08',
        'Peraturan Perundang-Undangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2030,
        '810',
        'PENGADAAN',
        'Meliputi: Lamaran, Pengujian Kesehatan, Dan Pengangkatan Calon Pegawai',
        1,
        NULL,
        NULL
    ),
    (
        2031,
        '811',
        'Lamaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2032,
        '811.1',
        'Testing',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2033,
        '811.2',
        'Screening',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2034,
        '811.3',
        'Panggilan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2035,
        '812',
        'Pengujian Kesehatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2036,
        '813',
        'Pengangkatan Calon Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2037,
        '813.1',
        'Pengangkatan Calon Pegawai Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2038,
        '813.2',
        'Pengangkatan Calon Pegawai Golongan II',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2039,
        '813.3',
        'Pengangkatan Calon Pegawai Golongan III',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2040,
        '813.4',
        'Pengangkatan Calon Pegawai Golongan IV',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2041,
        '813.5',
        'Pengangkatan Calon Guru Inpres',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2042,
        '814',
        'Pengangkatan Tenaga Lepas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2043,
        '814.1',
        'Pengangkatan Tenaga Bulanan / Tenaga Kontrak',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2044,
        '814.2',
        'Pengangkatan Tenaga Harian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2045,
        '814.3',
        'Pengangkatan Tenaga Pensiunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2046,
        '815',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2047,
        '816',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2048,
        '817',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2049,
        '820',
        'MUTASI',
        'Meliputi: Pengangkatan, Kenaikan Gaji Berkala, Kenaikan Pangkat, Pemindahan, Pelimpahan Datasering, Tugas Belajar Dan Wajib Militer',
        1,
        NULL,
        NULL
    ),
    (
        2050,
        '821',
        'Pengangkatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2051,
        '821.1',
        'Pengangkatan Menjadi Pegawai Negeri Tetap',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2052,
        '821.11',
        'Pengangkatan Menjadi Pegawai Negeri Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2053,
        '821.12',
        'Pengangkatan Menjadi Pegawai Negeri Golongan 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2054,
        '821.13',
        'Pengangkatan Menjadi Pegawai Negeri Golongan 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2055,
        '821.14',
        'Pengangkatan Menjadi Pegawai Negeri Golongan 4',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2056,
        '821.15',
        'Pengangkatan Menjadi Pegawai Negeri Sipil Yang Cuti Di Luar Tanggungan Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2057,
        '821.2',
        'Pengangkatan Dalam Jabatan, Pembebasan Dari Jabatan, Berita Acara Serah Terima Jabatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2058,
        '821.21',
        'Sekjen/Dirjen/Irjen/Kabag',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2059,
        '821.22',
        'Kepala Biro/Direktur/Inspektur/Kepala Pusat/Sekretaris/Kepala Dinas/Asisten Sekwilda',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2060,
        '821.23',
        'Kepala Bagian/Kepala Sub Direktorat/Kepala Bidang/Inspektur Pembantu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2061,
        '821.24',
        'Kepala Subbagian/Kepala Seksi/Kepala Sub Bidang/Pemeriksa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2062,
        '821.25',
        'Residen/Pembantu Gubernur',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2063,
        '821.26',
        'Wedana/Pembantu Bupati',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2064,
        '821.27',
        'Camat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2065,
        '821.28',
        'Lurah Administratif (Lurah Desa)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2066,
        '821.29',
        'Jabatan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2067,
        '822',
        'Kenaikan Gaji Berkala',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2068,
        '822.1',
        'Pegawai Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2069,
        '822.2',
        'Pegawai Golongan 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2070,
        '822.3',
        'Pegawai Golongan 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2071,
        '822.4',
        'Pegawai Golongan 4',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2072,
        '823',
        'Kenaikan Pangkat / Pengangkatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2073,
        '823.1',
        'Pegawai Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2074,
        '823.2',
        'Pegawai Golongan 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2075,
        '823.3',
        'Pegawai Golongan 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2076,
        '823.4',
        'Pegawai Golongan 4',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2077,
        '824',
        'Pemindahan / Pelimpahan / Perbantuan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2078,
        '824.1',
        'Pegawai Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2079,
        '824.2',
        'Pegawai Golongan 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2080,
        '824.3',
        'Pegawai Golongan 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2081,
        '824.4',
        'Pegawai Golongan 4',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2082,
        '824.5',
        'Lolos Butuh',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2083,
        '824.6',
        'Kurikulum dan Silabi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2084,
        '824.7',
        'Proposal (TOR)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2085,
        '825',
        'Datasering dan Penempatan Kembali',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2086,
        '826',
        'Penunjukan Tugas Belajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2087,
        '826.1',
        'Dalam Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2088,
        '826.2',
        'Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2089,
        '826.3',
        'Tunjangan Belajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2090,
        '826.4',
        'Penempatan Kembali',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2091,
        '827',
        'Wajib Militer',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2092,
        '828',
        'Mutasi Dengan Instansi Lain',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2093,
        '829',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2094,
        '830',
        'KEDUDUKAN',
        'Meliputi: Perhitungan Masa Kerja, Penyesuaian Pangkat/Gaji, Penghargaan Ijasah, Dan Jenjang Pangkat',
        1,
        NULL,
        NULL
    ),
    (
        2095,
        '831',
        'Perhitungan Masa Kerja',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2096,
        '832',
        'Penyesuaian Pangkat / Gaji',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2097,
        '832.1',
        'Pegawai Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2098,
        '832.2',
        'Pegawai Golongan 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2099,
        '832.3',
        'Pegawai Golongan 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2100,
        '832.4',
        'Pegawai Golongan 4',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2101,
        '833',
        'Penghargaan Ijazah / Penyesuaian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2102,
        '834',
        'Jenjang Pangkat / Eselonering',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2103,
        '835',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2104,
        '836',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2105,
        '837',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2106,
        '840',
        'KESEJAHTERAAN PEGAWAI',
        'Meliputi: Tunjangan, Dana, Perawatan Kesehatan, Koperasi, Distribusi, Permahan/Tanah, Bantuan Sosial, Rekreasi Dan Dispensasi.',
        1,
        NULL,
        NULL
    ),
    (
        2107,
        '841',
        'Tunjangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2108,
        '841.1',
        'Jabatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2109,
        '841.2',
        'Kehormatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2110,
        '841.3',
        'Kematian/Uang Duka',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2111,
        '841.4',
        'Tunjangan Hari Raya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2112,
        '841.5',
        'Perjalanan Dinas Tetap/Cuti/Pindah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2113,
        '841.6',
        'Keluarga',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2114,
        '841.7',
        'Sandang, Pangan, Papan (Bapertarum)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2115,
        '842',
        'Dana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2116,
        '842.1',
        'Taspen',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2117,
        '842.2',
        'Kesehatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2118,
        '842.3',
        'Asuransi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2119,
        '843',
        'Perawatan Kesehatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2120,
        '843.1',
        'Poliklinik',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2121,
        '843.2',
        'Perawatan Dokter',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2122,
        '843.3',
        'Obat-Obatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2123,
        '843.4',
        'Keluarga Berencana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2124,
        '844',
        'Koperasi / Distribusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2125,
        '844.1',
        'Distribusi Pangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2126,
        '844.2',
        'Distribusi Sandang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2127,
        '844.3',
        'Distribusi Papan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2128,
        '845',
        'Perumahan/Tanah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2129,
        '845.1',
        'Perumahan Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2130,
        '845.2',
        'Tanah Kapling',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2131,
        '845.3',
        'Losmen/Hotel',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2132,
        '846',
        'Bantuan Sosial',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2133,
        '846.1',
        'Bantuan Kebakaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2134,
        '846.2',
        'Bantuan Kebanjiran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2135,
        '847',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2136,
        '848',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2137,
        '849',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2138,
        '850',
        'CUTI ',
        'Meliputi Cuti Tahunan, Cuti Besar, Cuti Sakit, Cuti Hamil, Cuti Naik Haji, Cuti Diluar Tanggungan Negara Dan Cuti Alasan Lain',
        1,
        NULL,
        NULL
    ),
    (
        2139,
        '851',
        'Cuti Tahunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2140,
        '852',
        'Cuti Besar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2141,
        '853',
        'Cuti Sakit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2142,
        '854',
        'Cuti Hamil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2143,
        '855',
        'Cuti Naik Haji/Umroh',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2144,
        '856',
        'Cuti Di Luar Tangungan Neagara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2145,
        '857',
        'Cuti Alasan Lain/Alasan Penting',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2146,
        '858',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2147,
        '859',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2148,
        '860',
        'PENILAIAN',
        'Meliputi: Penghargaan, Hukuman, Konduite, Ujian Dinas,Penilaian Kakayaan Pribadi Dan Rehabilitasi',
        1,
        NULL,
        NULL
    ),
    (
        2149,
        '861',
        'Penghargaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2150,
        '861.1',
        'Bintang/Satyalencana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2151,
        '861.2',
        'Kenaikan Pangkat Anumerta',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2152,
        '861.3',
        'Kenaikan Gaji Istimewa',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2153,
        '861.4',
        'Hadiah Berupa Uang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2154,
        '861.5',
        'Pegawai Teladan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2155,
        '862',
        'Hukuman',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2156,
        '862.1',
        'Teguran Peringatan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2157,
        '862.2',
        'Penundaan Kenaikan Gaji',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2158,
        '862.3',
        'Penurunan Pangkat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2159,
        '862.4',
        'Pemindahan',
        'Catatan: Pemberhentian Untuk Sementara Waktu Dan Pemberhentian Tidak Dengan Hormat Lihat 887 Dan 888',
        1,
        NULL,
        NULL
    ),
    (
        2160,
        '863',
        'Konduite, DP3, Disiplin Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2161,
        '864',
        'Ujian Dinas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2162,
        '864.1',
        'Tingkat 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2163,
        '864.2',
        'Tingkat 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2164,
        '864.3',
        'Tingkat 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2165,
        '865',
        'Penilaian Kehidupan Pegawai Negeri',
        'Meliputi: Petunjuk Pelaksanaan Hidup Sederhana, Penilaian Kekayaan Pribadi ( LP2P )',
        1,
        NULL,
        NULL
    ),
    (
        2166,
        '866',
        'Rehabilitasi / Pengaktifan Kembali',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2167,
        '867',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2168,
        '868',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2169,
        '869',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2170,
        '870',
        'TATA USAHA KEPEGAWAIAN',
        'Meliputi: Formasi, Bezetting, Registrasi,Daftar, Riwayat Hidup, Hak, Penggajian, Sumpah,/Janji Dan Korps Pegawai',
        1,
        NULL,
        NULL
    ),
    (
        2171,
        '871',
        'Formasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2172,
        '872',
        'Bezetting/Daftar Urut Kepegawaian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2173,
        '873',
        'Registrasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2174,
        '873.1',
        'NIP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2175,
        '873.2',
        'KARPEG',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2176,
        '873.3',
        'Legitiminasi/Tanda Pengenal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2177,
        '873.4',
        'Daftar Keluarga, Perkawinan, Perceraian, Karis, Karsu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2178,
        '874',
        'Daftar Riwayat Pekerjaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2179,
        '874.1',
        'Tanggal Lahir',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2180,
        '874.2',
        'Penggantian Nama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2181,
        '874.3',
        'Izin kepartaian Organisasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2182,
        '875',
        'Kewenangan Mutasi Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2183,
        '875.1',
        'Pelimpahan Wewenang',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2184,
        '875.2',
        'Specimen Tanda Tangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2185,
        '876',
        'Penggajian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2186,
        '876.1',
        'SKPP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2187,
        '877',
        'Sumpah/Janji',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2188,
        '878',
        'Korps Pegawai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2189,
        '879',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2190,
        '880',
        'PEMBERHENTIAN PEGAWAI',
        'Meliputi Atas  Pemberhentian,Permintaan Sendiri, Dengan Hak Pensiun, Karena Meninggal Dunia, Alasan Lain, Dengan Diberi Uang Pesangon, Uang Tnggu Untuk Sementara Waktu Dan Pemberhentian Tidak Dengan  Hormat',
        1,
        NULL,
        NULL
    ),
    (
        2191,
        '881',
        'Permintaan Sendiri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2192,
        '882',
        'Dengan Hak Pensiun',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2193,
        '882.1',
        'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 1',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2194,
        '882.2',
        'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 2',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2195,
        '882.3',
        'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 3',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2196,
        '882.4',
        'Pemberhentian Dengan Hak Pensiun Pegawai Negeri Golongan 4',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2197,
        '882.5',
        'Pensiun Janda / Duda',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2198,
        '882.6',
        'Pensiun Yatim Piatu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2199,
        '882.7',
        'Uang Muka Pensiun',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2200,
        '883',
        'Karena Meninggal',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2201,
        '883.1',
        'Karena Meninggal Dalam Tugas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2202,
        '884',
        'Alasan Lain',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2203,
        '885',
        'Uang Pesangon',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2204,
        '886',
        'Uang Tunggu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2205,
        '887',
        'Untuk Sementara Waktu',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2206,
        '888',
        'Tidak Dengan Hormat',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2207,
        '889',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2208,
        '890',
        'PENDIDIKAN PEGAWAI',
        'Meliputi: Perencanaan, Pendidikan Reguler, Pendidikan Non-Reguler, Pendidikan Ke Luar Negeri, Metode, Tenaga Pengajar, Administrasi Pendidikan, Fasilitas Sarana Pendidikan',
        1,
        NULL,
        NULL
    ),
    (
        2209,
        '891',
        'Perencanaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2210,
        '891.1',
        'Program',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2211,
        '891.2',
        'Kurikulum dan Silabi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2212,
        '891.3',
        'Proposal ( TOR )',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2213,
        '892',
        'Pendidikan _Egular / Kader',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2214,
        '892.1',
        'IPDN / APDN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2215,
        '892.2',
        'Kursus-Kursus Reguler',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2216,
        '893',
        'Pendidikan dan Pelatihan / Non Reguler',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2217,
        '893.1',
        'LEMHANAS',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2218,
        '893.2',
        'Pendidikan dan Pelatihan Struktural, SPATI, SPAMEN, SPAMA, ADUMLA, ADUM',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2219,
        '893.3',
        'Kursus-Kursus / Penataran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2220,
        '893.4',
        'Diklat Tehnik, Fungsional Dan Manajemen Pemerintahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2221,
        '893.5',
        'Diklat Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2222,
        '894',
        'Pendidikan Luar Negeri',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2223,
        '894.1',
        'Berkesinambungan / Berkala / Bergelar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2224,
        '894.2',
        'Non Gelar / Diploma',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2225,
        '895',
        'Metode',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2226,
        '895.1',
        'Kuliah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2227,
        '895.2',
        'Ceramah, Simposium',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2228,
        '895.3',
        'Diskusi, Raker, Seminar, Lokakarya, Orientasi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2229,
        '895.4',
        'Studi Lapangan, Kkn, Widyawisata',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2230,
        '895.5',
        'Tanya Jawab / Sylabi / Modul / Kursil',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2231,
        '895.7',
        'Penugasan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2232,
        '895.8',
        'Gladi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2233,
        '896',
        'Tenaga Pengajar / Widyaiswara/Narasumber',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2234,
        '896.1',
        'Moderator',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2235,
        '897',
        'Administrasi Pendidikan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2236,
        '897.1',
        'Tahun Pelajaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2237,
        '897.2',
        'Persyaratan, Pendaftaran, Testing, Ujian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2238,
        '897.3',
        'STTP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2239,
        '897.4',
        'Penilaian Angka Kredit',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2240,
        '897.5',
        'Laporan Pendidikan Dan Pelatihan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2241,
        '898',
        'Fasilitas Belajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2242,
        '898.1',
        'Tunjangan Belajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2243,
        '898.2',
        'Asrama',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2244,
        '898.3',
        'Uang Makan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2245,
        '898.4',
        'Uang Transport',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2246,
        '898.5',
        'Uang Buku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2247,
        '898.6',
        'Uang Ujian',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2248,
        '898.7',
        'Uang Semester / Uang Kuliah',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2249,
        '898.8',
        'Uang Saku',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2250,
        '899',
        'Sarana',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2251,
        '899.1',
        'Bantuan Sarana Belajar',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2252,
        '899.2',
        'Bantuan Alat-Alat Tulis',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2253,
        '899.3',
        'Bantuan Sarana Belajar Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2254,
        '900',
        'KEUANGAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2255,
        '901',
        'Nota Keuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2256,
        '902',
        'APBN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2257,
        '903',
        'APBD',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2258,
        '904',
        'APBN-P',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2259,
        '905',
        'Dana Alokasi Umum',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2260,
        '906',
        'Dana Alokasi Khusus',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2261,
        '907',
        'Dekonsentrasi (Pelimpahan Dana Dari Pusat Ke Daerah)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2262,
        '907',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2263,
        '908',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2264,
        '910',
        'ANGGARAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2265,
        '911',
        'Rutin',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2266,
        '912',
        'Pembangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2267,
        '913',
        'Anggaran Belanja Tambahan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2268,
        '914',
        'Daftar Isian Kegiatan (DIK)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2269,
        '914.1',
        'Daftar Usulan Kegiatan (DUK)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2270,
        '915',
        'Daftar Isian Poyek (DIP)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2271,
        '915.1',
        'Daftar Usulan Proyek (DUP)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2272,
        '915.2',
        'Daftar Isian Pengguna Anggaran (DIPA)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2273,
        '916',
        'Revisi Anggaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2274,
        '917',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2275,
        '918',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2276,
        '920',
        'OTORISASI / SKO',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2277,
        '921',
        'Rutin',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2278,
        '922',
        'Pembangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2279,
        '923',
        'SIAP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2280,
        '924',
        'Ralat SKO',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2281,
        '925',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2282,
        '926',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2283,
        '927',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2284,
        '930',
        'VERIFIKASI',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2285,
        '931',
        'SPM Rutin (daftar p8)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2286,
        '932',
        'SPM Pembangunan (daftar p8)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2287,
        '933',
        'Penerimaan (daftar p6. p7)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2288,
        '934',
        'SPJ Rutin',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2289,
        '935',
        'SPJ Pembangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2290,
        '936',
        'Nota Pemeriksaan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2291,
        '937',
        'SP Pemindahan Pembukuan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2292,
        '938',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2293,
        '939',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2294,
        '940',
        'PEMBUKUAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2295,
        '941',
        'Penyusunan Perhitungan Anggaran',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2296,
        '942',
        'Permintaan  Data Anggaran Laporan Fisik Pembangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2297,
        '943',
        'Laporan Fisik Pembangunan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2298,
        '944',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2299,
        '945',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2300,
        '950',
        'PERBENDAHARAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2301,
        '951',
        'Tuntutan Ganti Rugi (ICW Pasal 74)',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2302,
        '952',
        'Tuntutan Bendaharawan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2303,
        '953',
        'Penghapusan Kekayaan Negara',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2304,
        '954',
        'Pengangkatan/Penggantian Pemimpin Proyak Dan Pengangkatan/Pemberhentian Bendaharawan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2305,
        '955',
        'Spesimen Tanda Tangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2306,
        '956',
        'Surat Tagihan Piutang, Ikhtisar Bulanan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2307,
        '957',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2308,
        '958',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2309,
        '959',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2310,
        '960',
        'PEMBINAAN KEBENDAHARAAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2311,
        '961',
        'Pemeriksaan Kas Dan Hasil Pemeriksaan Kas',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2312,
        '962',
        'Pemeriksaan Administrasi Bendaharawan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2313,
        '963',
        'Laporan Keuangan Bendaharawan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2314,
        '964',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2315,
        '965',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2316,
        '966',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2317,
        '970',
        'PENDAPATAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2318,
        '971',
        'Perimbangan Keuangan',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2319,
        '972',
        'Subsidi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2320,
        '973',
        'Pajak,Ipeda, IHH,IHPH',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2321,
        '974',
        'Retribusi',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2322,
        '975',
        'Bea',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2323,
        '976',
        'Cukai',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2324,
        '977',
        'Pungutan / PNBP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2325,
        '978',
        'Bantuan Presiden, Menteri Dan Bantuan Lainnya',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2326,
        '979',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2327,
        '980',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2328,
        '981',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2329,
        '990',
        'BENDAHARAWAN',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2330,
        '991',
        'SKPP / SPP',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2331,
        '992',
        'Teguran SPJ',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2332,
        '993',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2333,
        '994',
        '-',
        '-',
        1,
        NULL,
        NULL
    ),
    (
        2334,
        '995',
        '-',
        '-',
        1,
        NULL,
        NULL
    );

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
    `id` int UNSIGNED NOT NULL,
    `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch` int NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO
    `migrations` (`id`, `migration`, `batch`)
VALUES (
        1,
        '2014_10_12_000000_create_provinsis_table',
        1
    ),
    (
        2,
        '2014_10_12_000001_create_pengaturans_table',
        1
    ),
    (
        3,
        '2014_10_12_000002_create_configs_table',
        1
    ),
    (
        4,
        '2014_10_12_000003_create_roles_table',
        1
    ),
    (
        5,
        '2014_10_12_000004_create_users_table',
        1
    ),
    (
        6,
        '2014_10_12_100000_create_password_reset_tokens_table',
        1
    ),
    (
        7,
        '2019_08_19_000000_create_failed_jobs_table',
        1
    ),
    (
        8,
        '2019_12_14_000001_create_personal_access_tokens_table',
        1
    ),
    (
        9,
        '2024_10_23_171115_create_dusuns_table',
        1
    ),
    (
        10,
        '2024_10_23_171236_create_rws_table',
        1
    ),
    (
        11,
        '2024_10_23_171330_create_rts_table',
        1
    ),
    (
        12,
        '2024_10_23_171514_create_penduduks_table',
        1
    ),
    (
        13,
        '2024_10_24_221945_create_keluargas_table',
        1
    ),
    (
        14,
        '2024_10_24_234955_create_agamas_table',
        1
    ),
    (
        15,
        '2024_10_24_235803_create_jenis_kelamins_table',
        1
    ),
    (
        16,
        '2024_10_25_000457_create_hubungan_keluargas_table',
        1
    ),
    (
        17,
        '2024_10_25_001116_create_status_kawins_table',
        1
    ),
    (
        18,
        '2024_10_25_001444_create_warga_negaras_table',
        1
    ),
    (
        19,
        '2024_10_25_001658_create_golongan_darahs_table',
        1
    ),
    (
        20,
        '2024_10_25_002053_create_status_penduduks_table',
        1
    ),
    (
        21,
        '2024_10_25_002428_create_status_dasars_table',
        1
    ),
    (
        22,
        '2024_10_25_002702_create_status_ktps_table',
        1
    ),
    (
        23,
        '2024_10_25_003259_create_status_rekam_ktps_table',
        1
    ),
    (
        24,
        '2024_10_25_004122_create_cacats_table',
        1
    ),
    (
        25,
        '2024_10_25_004506_create_sakit_menahuns_table',
        1
    ),
    (
        26,
        '2024_10_25_004958_create_cara_kbs_table',
        1
    ),
    (
        27,
        '2024_10_25_010127_create_pendidikan_kks_table',
        1
    ),
    (
        28,
        '2024_10_25_010208_create_pendidikans_table',
        1
    ),
    (
        29,
        '2024_10_25_010230_create_pekerjaans_table',
        1
    ),
    (
        30,
        '2024_10_25_223030_create_jenis_kelahirans_table',
        1
    ),
    (
        31,
        '2024_10_25_223230_create_tempat_kelahirans_table',
        1
    ),
    (
        32,
        '2024_10_25_231822_create_penolong_kelahirans_table',
        1
    ),
    (
        33,
        '2024_10_25_235719_create_jabatans_table',
        1
    ),
    (
        34,
        '2024_10_25_235828_create_pamongs_table',
        1
    ),
    (
        35,
        '2024_10_27_002841_create_kehamilans_table',
        1
    ),
    (
        36,
        '2024_10_28_072614_create_kelompok_kategoris_table',
        2
    ),
    (
        37,
        '2024_10_28_072739_create_kelompoks_table',
        2
    ),
    (
        38,
        '2024_10_28_092917_create_kelompok_anggotas_table',
        3
    ),
    (
        39,
        '2024_10_28_093752_create_kelompok_jabatans_table',
        3
    ),
    (
        40,
        '2024_10_29_100115_create_jabatans_table',
        4
    ),
    (
        41,
        '2024_10_30_211856_create_bantuan_sasarans_table',
        5
    ),
    (
        42,
        '2024_10_30_212440_create_bantuans_table',
        6
    ),
    (
        43,
        '2024_10_30_221653_create_bantuan_penerimas_table',
        7
    ),
    (
        44,
        '2024_11_03_145806_create_klasifikasi_surats_table',
        8
    ),
    (
        45,
        '2024_11_03_200014_create_surat_keluars_table',
        9
    ),
    (
        46,
        '2024_11_03_203117_create_surat_masuks_table',
        10
    );

-- --------------------------------------------------------

--
-- Table structure for table `pamongs`
--

CREATE TABLE `pamongs` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `jabatan_id` bigint UNSIGNED NOT NULL,
    `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `penduduk_id` bigint UNSIGNED DEFAULT NULL,
    `agama_id` bigint UNSIGNED DEFAULT NULL,
    `jenis_kelamin_id` bigint UNSIGNED DEFAULT NULL,
    `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tanggal_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `pendidikan_kk_id` bigint UNSIGNED DEFAULT NULL,
    `no_sk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tgl_sk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `masa_jabatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `ttd` tinyint(1) NOT NULL DEFAULT '0',
    `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status` tinyint(1) NOT NULL DEFAULT '1',
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `pamongs`
--

INSERT INTO
    `pamongs` (
        `id`,
        `nama`,
        `nik`,
        `jabatan_id`,
        `nip`,
        `penduduk_id`,
        `agama_id`,
        `jenis_kelamin_id`,
        `tempat_lahir`,
        `tanggal_lahir`,
        `pendidikan_kk_id`,
        `no_sk`,
        `tgl_sk`,
        `masa_jabatan`,
        `ttd`,
        `foto`,
        `status`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        NULL,
        NULL,
        1,
        '123 254 254 0010',
        6,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '123 254 254 4525',
        '2022-07-15',
        '2022 s/d 2028',
        0,
        'pamongs/cJcNSEM2EsUWwAlqaqmkRWhiOPUnjuwlfDWbkWgt.jpg',
        1,
        1,
        '2024-10-27 11:15:15',
        '2024-10-29 01:42:04'
    ),
    (
        2,
        NULL,
        NULL,
        2,
        '123 254 254 0525',
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '123 254 254 4555',
        '2022-08-19',
        '2022 s/d 2028',
        0,
        'pamongs/XAnecMhwVrpL4TKBpjE8nqQrmEmacTUCP09G8FwB.webp',
        1,
        1,
        '2024-10-27 11:44:28',
        '2024-10-27 11:44:28'
    );

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
    `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaans`
--

CREATE TABLE `pekerjaans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `pekerjaans`
--

INSERT INTO
    `pekerjaans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Belum/Tidak Bekerja',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Mengurus Rumah Tangga',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Pelajar/Mahasiswa',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Pensiunan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Pegawai Negeri Sipil (PNS)',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'Tentara Nasional Indonesia (TNI)',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'Kepolisian (POLRI)',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        'Perdagangan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        9,
        'Petani/Pekebun',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        10,
        'Peternak',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        11,
        'Nelayan/Peternakan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        12,
        'Industri',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        13,
        'Konstruksi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        14,
        'Transportasi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        15,
        'Karyawan Swasta',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        16,
        'Karyawan BUMN',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        17,
        'Karyawan BUMD',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        18,
        'Karyawan Honorer',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        19,
        'Buruh Harian Lepas',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        20,
        'Buruh Tani/Perkebunan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        21,
        'Buruh Nelayan/Perikanan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        22,
        'Buruh Peternakan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        23,
        'Pembantu Rumah Tangga',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        24,
        'Tukang Cukur',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        25,
        'Tukang Listrik',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        26,
        'Tukang Batu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        27,
        'Tukang Kayu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        28,
        'Tukang Sol Sepatu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        29,
        'Tukang Las/Pandai Besi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        30,
        'Tukang Jahit',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        31,
        'Tukang Gigi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        32,
        'Penata Rias',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        33,
        'Penata Busana',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        34,
        'Penterjemah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        35,
        'Imam Masjid',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        36,
        'Pendeta',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        37,
        'Pastor',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        38,
        'Wartawan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        39,
        'Uztadz/Mubaligh',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        40,
        'Juru Masak',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        41,
        'Promotor Acara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        42,
        'Anggota DPR RI',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        43,
        'Anggota DPD',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        44,
        'Anggota BPK',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        45,
        'Presiden',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        46,
        'Wakil Presiden',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        47,
        'Anggota Mahkamah Kostitusi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        48,
        'Anggota Kabinet Kementerian',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        49,
        'Duta Besar',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        50,
        'Gubernur',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        51,
        'Wakil Gubernur',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        52,
        'Bupati',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        53,
        'Wakil Bupati',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        54,
        'Walikota',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        55,
        'Wakil Walikota',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        56,
        'Anggota DPRD Provinsi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        57,
        'Anggota DPRD Kabupaten/Kota',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        58,
        'Dosen',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        59,
        'Guru',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        60,
        'Pilot',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        61,
        'Pengacara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        62,
        'Notaris',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        63,
        'Arsitek',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        64,
        'Akuntan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        65,
        'Konsultan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        66,
        'Dokter',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        67,
        'Bidan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        68,
        'Perawat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        69,
        'Apoteker',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        70,
        'Psikiater/Psikolog',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        71,
        'Penyiar Televisi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        72,
        'Penyiar Radio',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        73,
        'Pelaut',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        74,
        'Peneliti',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        75,
        'Sopir',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        76,
        'Pialang',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        77,
        'Paranormal',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        78,
        'Pedagang',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        79,
        'Perangkat Desa',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        80,
        'Kepala Desa',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        81,
        'Biarawati',
        '2024-10-26 16:32:07',
        '2024-10-26 16:32:07'
    ),
    (
        82,
        'Wiraswasta',
        '2024-10-26 16:32:07',
        '2024-10-26 16:32:07'
    ),
    (
        83,
        'Lainnya',
        '2024-10-26 16:32:07',
        '2024-10-26 16:32:07'
    );

-- --------------------------------------------------------

--
-- Table structure for table `pendidikans`
--

CREATE TABLE `pendidikans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikans`
--

INSERT INTO
    `pendidikans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Belum Masuk TK/Kelompok Bermain',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Sedang TK/Kelompok Bermain',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Tidak Pernah Sekolah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Sedang SD/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Tidak Tamat SD/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'Sedang SLTP/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'Sedang SLTA/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        'Sedang D-I/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        9,
        'Sedang D-II/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        10,
        'Sedang D-III/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        11,
        'Sedang S-I/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        12,
        'Sedang S-II/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        13,
        'Sedang S-III/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        14,
        'Sedang SLB A/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        15,
        'Sedang SLB B/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        16,
        'Sedang SLB C/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        17,
        'Tidak Dapat Membaca Dan Menulis Huruf Latin/Arab',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        18,
        'Tidak Sekolah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan_kks`
--

CREATE TABLE `pendidikan_kks` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `pendidikan_kks`
--

INSERT INTO
    `pendidikan_kks` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Tidak/Belum Sekolah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Belum Tamat SD/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Tamat SD/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'SLTP/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'SLTA/Sederajat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'Diploma I/II',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'Akademi/Diploma III/S. Muda',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        'Diploma IV/Strata I',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        9,
        'Strata II',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        10,
        'Strata III',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `penduduks`
--

CREATE TABLE `penduduks` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `keluarga_id` bigint UNSIGNED NOT NULL,
    `hubungan_keluarga_id` bigint UNSIGNED NOT NULL,
    `jenis_kelamin_id` bigint UNSIGNED NOT NULL,
    `agama_id` bigint UNSIGNED NOT NULL,
    `tempat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `tanggal_lahir` date NOT NULL,
    `waktu_lahir` time DEFAULT NULL,
    `no_akta_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `status_ktp_id` bigint UNSIGNED DEFAULT NULL,
    `status_rekam_ktp_id` bigint UNSIGNED DEFAULT NULL,
    `pendidikan_kk_id` bigint UNSIGNED NOT NULL,
    `pendidikan_id` bigint UNSIGNED NOT NULL,
    `pekerjaan_id` bigint UNSIGNED NOT NULL,
    `status_kawin_id` bigint UNSIGNED NOT NULL,
    `warga_negara_id` bigint UNSIGNED NOT NULL,
    `no_paspor` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tanggal_akhir_paspor` date DEFAULT NULL,
    `no_kitas` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tanggal_akhir_kitas` date DEFAULT NULL,
    `golongan_darah_id` bigint UNSIGNED NOT NULL,
    `status_penduduk_id` bigint UNSIGNED NOT NULL,
    `status_dasar_id` bigint UNSIGNED DEFAULT NULL,
    `cacat_id` bigint UNSIGNED DEFAULT NULL,
    `sakit_menahun_id` bigint UNSIGNED DEFAULT NULL,
    `cara_kb_id` bigint UNSIGNED DEFAULT NULL,
    `kehamilan_id` bigint UNSIGNED DEFAULT NULL,
    `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `alamat_sekarang` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `alamat_sebelumnya` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `nik_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nama_ayah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nik_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nama_ibu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tanggal_kawin` date DEFAULT NULL,
    `no_akta_kawin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `tanggal_cerai` date DEFAULT NULL,
    `no_akta_cerai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `anak_ke` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `berat_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `panjang_lahir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `penolong_kelahiran_id` bigint UNSIGNED DEFAULT NULL,
    `tempat_kelahiran_id` bigint UNSIGNED DEFAULT NULL,
    `jenis_kelahiran_id` bigint UNSIGNED DEFAULT NULL,
    `foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `user_id` bigint UNSIGNED NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `penduduks`
--

INSERT INTO
    `penduduks` (
        `id`,
        `nama`,
        `nik`,
        `keluarga_id`,
        `hubungan_keluarga_id`,
        `jenis_kelamin_id`,
        `agama_id`,
        `tempat_lahir`,
        `tanggal_lahir`,
        `waktu_lahir`,
        `no_akta_lahir`,
        `status_ktp_id`,
        `status_rekam_ktp_id`,
        `pendidikan_kk_id`,
        `pendidikan_id`,
        `pekerjaan_id`,
        `status_kawin_id`,
        `warga_negara_id`,
        `no_paspor`,
        `tanggal_akhir_paspor`,
        `no_kitas`,
        `tanggal_akhir_kitas`,
        `golongan_darah_id`,
        `status_penduduk_id`,
        `status_dasar_id`,
        `cacat_id`,
        `sakit_menahun_id`,
        `cara_kb_id`,
        `kehamilan_id`,
        `telepon`,
        `email`,
        `alamat_sekarang`,
        `alamat_sebelumnya`,
        `nik_ayah`,
        `nama_ayah`,
        `nik_ibu`,
        `nama_ibu`,
        `tanggal_kawin`,
        `no_akta_kawin`,
        `tanggal_cerai`,
        `no_akta_cerai`,
        `anak_ke`,
        `berat_lahir`,
        `panjang_lahir`,
        `penolong_kelahiran_id`,
        `tempat_kelahiran_id`,
        `jenis_kelahiran_id`,
        `foto`,
        `user_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Happy Agung Pribadi',
        '5271082507820001',
        1,
        1,
        1,
        1,
        'Jakarta',
        '1982-07-25',
        NULL,
        NULL,
        2,
        6,
        7,
        18,
        82,
        2,
        1,
        '526 254 5252 1252',
        '2034-07-27',
        NULL,
        NULL,
        4,
        1,
        NULL,
        7,
        14,
        NULL,
        NULL,
        '085239168707',
        'metalabmetadata@gmail.com',
        NULL,
        NULL,
        NULL,
        'Zainal Abidin',
        NULL,
        'Ochi',
        '2015-12-04',
        NULL,
        NULL,
        NULL,
        '2',
        NULL,
        NULL,
        1,
        1,
        1,
        'penduduks/IUu5R2HNy3kQWfy8rskueUXx2FzAKET845oLeTLT.webp',
        1,
        '2024-10-26 17:16:32',
        '2024-10-29 15:19:41'
    ),
    (
        2,
        'Bahrudin',
        '1234567890123455',
        2,
        1,
        1,
        2,
        'Sumedang',
        '1985-04-11',
        NULL,
        NULL,
        2,
        6,
        5,
        18,
        16,
        3,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        13,
        1,
        NULL,
        7,
        14,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        1,
        1,
        NULL,
        1,
        '2024-10-26 18:38:26',
        '2024-11-02 04:00:20'
    ),
    (
        3,
        'Elis Nuwati',
        '1234567890122999',
        1,
        3,
        2,
        1,
        'Kupang',
        '1989-05-21',
        NULL,
        NULL,
        2,
        6,
        5,
        18,
        2,
        2,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        1,
        NULL,
        7,
        14,
        3,
        2,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        'Hidayat Sahuri',
        NULL,
        'Suryawatun Dalimun',
        '2015-12-04',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        1,
        1,
        NULL,
        1,
        '2024-10-26 18:48:27',
        '2024-11-02 06:44:02'
    ),
    (
        4,
        'Wahidin',
        '1234567890120001',
        3,
        1,
        1,
        5,
        'Mataram',
        '1977-07-01',
        NULL,
        NULL,
        2,
        8,
        5,
        12,
        59,
        2,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        1,
        NULL,
        7,
        14,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        2,
        1,
        NULL,
        1,
        '2024-10-27 10:13:53',
        '2024-11-02 06:44:56'
    ),
    (
        5,
        'Sujana',
        '1234567890120002',
        3,
        3,
        2,
        4,
        'Lombok Tengah',
        '1980-05-06',
        NULL,
        NULL,
        2,
        8,
        4,
        11,
        2,
        2,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        5,
        1,
        NULL,
        7,
        13,
        9,
        2,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        2,
        3,
        1,
        NULL,
        1,
        '2024-10-27 10:16:49',
        '2024-11-02 06:45:11'
    ),
    (
        6,
        'Sudira',
        '1234567890123654',
        5,
        1,
        1,
        1,
        'Mataram',
        '1979-02-08',
        NULL,
        NULL,
        NULL,
        NULL,
        8,
        18,
        80,
        2,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        2,
        1,
        NULL,
        7,
        14,
        NULL,
        NULL,
        '081245678952',
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        1,
        1,
        'penduduks/ycEhSXATRCQIaS4W35pBj5vLWrOiKjX3sDufGGVD.jpg',
        1,
        '2024-10-27 10:23:01',
        '2024-10-27 10:23:01'
    ),
    (
        7,
        'Fauzan Julianto Pradana',
        '5271010207070001',
        1,
        4,
        1,
        1,
        'Kupang',
        '2007-07-02',
        NULL,
        NULL,
        2,
        8,
        5,
        7,
        3,
        1,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        1,
        NULL,
        7,
        14,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '5271052507820001',
        'Happy Agung Pribadi',
        '1234567890122565',
        'Elis Nuwati',
        NULL,
        NULL,
        NULL,
        NULL,
        '1',
        NULL,
        NULL,
        1,
        1,
        1,
        NULL,
        1,
        '2024-10-29 11:33:00',
        '2024-10-29 11:38:33'
    ),
    (
        8,
        'Bintang Rizky Agung',
        '5271052701170001',
        1,
        4,
        1,
        1,
        'Mataram',
        '2017-01-27',
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        4,
        3,
        1,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        4,
        1,
        NULL,
        7,
        14,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '5271052507820001',
        'Happy Agung Pribadi',
        '1234567890122999',
        'Elis Nuwati',
        NULL,
        NULL,
        NULL,
        NULL,
        '2',
        NULL,
        NULL,
        1,
        1,
        1,
        NULL,
        1,
        '2024-10-28 15:36:26',
        '2024-11-02 07:03:46'
    ),
    (
        10,
        'Arjuna Arya Sena Agung',
        '5271012304220003',
        1,
        4,
        1,
        1,
        'Mataram',
        '2022-04-23',
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        18,
        1,
        1,
        1,
        NULL,
        NULL,
        NULL,
        NULL,
        1,
        1,
        NULL,
        7,
        14,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        NULL,
        '5271052507820001',
        'Happy Agung Pribadi',
        '1234567890122565',
        'Elis Nuwati',
        NULL,
        NULL,
        NULL,
        NULL,
        '3',
        NULL,
        NULL,
        2,
        2,
        1,
        NULL,
        1,
        '2024-10-29 11:36:29',
        '2024-10-29 11:36:29'
    );

-- --------------------------------------------------------

--
-- Table structure for table `pengaturans`
--

CREATE TABLE `pengaturans` (
    `id` bigint UNSIGNED NOT NULL,
    `sebutan_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sebutan_kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sebutan_kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sebutan_dusun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sebutan_kepala_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sebutan_camat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sebutan_bupati` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `sebutan_kepala_dusun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `singkatan_desa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `singkatan_kecamatan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `singkatan_kabupaten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `singkatan_dusun` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `format_nomor_surat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `zona_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title_web` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturans`
--

INSERT INTO
    `pengaturans` (
        `id`,
        `sebutan_desa`,
        `sebutan_kecamatan`,
        `sebutan_kabupaten`,
        `sebutan_dusun`,
        `sebutan_kepala_desa`,
        `sebutan_camat`,
        `sebutan_bupati`,
        `sebutan_kepala_dusun`,
        `singkatan_desa`,
        `singkatan_kecamatan`,
        `singkatan_kabupaten`,
        `singkatan_dusun`,
        `format_nomor_surat`,
        `zona_waktu`,
        `title_web`,
        `icon`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Kelurahan',
        'Kecamatan',
        'Kota',
        'Lingkungan',
        'Lurah',
        'Camat',
        'Bupati',
        'Kepala Lingkungan',
        'Kel.',
        'Kec.',
        'Kota',
        'Ling.',
        '[kode_surat]/[nomor_surat, 3]/PEM/[tahun]',
        'Asia/Pontianak',
        'Website Desa',
        'icons/SZ3oaj5JFVYY54QX6apvebZ6h4AP8K5snYiqUOJs.png',
        '2024-10-26 16:32:06',
        '2024-11-05 04:44:23'
    );

-- --------------------------------------------------------

--
-- Table structure for table `penolong_kelahirans`
--

CREATE TABLE `penolong_kelahirans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `penolong_kelahirans`
--

INSERT INTO
    `penolong_kelahirans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Dokter',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Bidan Perawat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Dukun',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Lainnya',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
    `id` bigint UNSIGNED NOT NULL,
    `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id` bigint UNSIGNED NOT NULL,
    `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
    `last_used_at` timestamp NULL DEFAULT NULL,
    `expires_at` timestamp NULL DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinsis`
--

CREATE TABLE `provinsis` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsis`
--

INSERT INTO
    `provinsis` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        11,
        'Aceh',
        '2024-10-26 16:32:05',
        '2024-10-26 16:32:05'
    ),
    (
        12,
        'Sumatera Utara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        13,
        'Sumatera Barat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        14,
        'Riau',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        15,
        'Jambi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        16,
        'Sumatera Selatan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        17,
        'Bengkulu',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        18,
        'Lampung',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        19,
        'Kepulauan Bangka Belitung',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        21,
        'Kepulauan Riau',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        26,
        'Banten',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        31,
        'DKI Jakarta',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        32,
        'Jawa Barat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        33,
        'Jawa Tengah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        34,
        'DI Yogyakarta',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        35,
        'Jawa Timur',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        51,
        'Bali',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        52,
        'Nusa Tenggara Barat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        53,
        'Nusa Tenggara Timur',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        61,
        'Kalimantan Barat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        62,
        'Kalimantan Tengah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        63,
        'Kalimantan Selatan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        64,
        'Kalimantan Timur',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        65,
        'Kalimantan Utara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        71,
        'Sulawesi Utara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        72,
        'Sulawesi Tengah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        73,
        'Sulawesi Selatan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        74,
        'Sulawesi Tenggara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        75,
        'Gorontalo',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        76,
        'Sulawesi Barat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        81,
        'Maluku',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        82,
        'Maluku Utara',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        91,
        'Papua',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        92,
        'Papua barat',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO
    `roles` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Administrator',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Operator',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Redaksi',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Kontributor',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `rts`
--

CREATE TABLE `rts` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `dusun_id` bigint UNSIGNED DEFAULT NULL,
    `rw_id` bigint UNSIGNED NOT NULL,
    `penduduk_id` bigint UNSIGNED DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `rts`
--

INSERT INTO
    `rts` (
        `id`,
        `nama`,
        `dusun_id`,
        `rw_id`,
        `penduduk_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '001',
        1,
        1,
        NULL,
        '2024-10-26 16:33:13',
        '2024-10-26 16:33:13'
    ),
    (
        2,
        '002',
        1,
        1,
        NULL,
        '2024-10-26 16:33:24',
        '2024-10-26 16:33:24'
    ),
    (
        3,
        '003',
        2,
        2,
        NULL,
        '2024-10-27 10:03:47',
        '2024-10-27 10:03:47'
    ),
    (
        4,
        '004',
        2,
        2,
        NULL,
        '2024-10-27 10:03:55',
        '2024-10-27 10:03:55'
    );

-- --------------------------------------------------------

--
-- Table structure for table `rws`
--

CREATE TABLE `rws` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `dusun_id` bigint UNSIGNED DEFAULT NULL,
    `penduduk_id` bigint UNSIGNED DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `rws`
--

INSERT INTO
    `rws` (
        `id`,
        `nama`,
        `dusun_id`,
        `penduduk_id`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        '003',
        1,
        NULL,
        '2024-10-26 16:33:03',
        '2024-10-26 16:33:03'
    ),
    (
        2,
        '003',
        2,
        NULL,
        '2024-10-27 10:02:19',
        '2024-10-27 10:02:19'
    );

-- --------------------------------------------------------

--
-- Table structure for table `sakit_menahuns`
--

CREATE TABLE `sakit_menahuns` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `sakit_menahuns`
--

INSERT INTO
    `sakit_menahuns` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Jantung',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Lever',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Paru-paru',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Kanker',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Stroke',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        'Diabetes Melitus',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        'Ginjal',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        'Malaria',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        9,
        'Lepra/Kusta',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        10,
        'HIV/AIDS',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        11,
        'Gila/Stress',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        12,
        'TBC',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        13,
        'Asthma',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        14,
        'Tidak Ada/Tidak Sakit',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `status_dasars`
--

CREATE TABLE `status_dasars` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `status_dasars`
--

INSERT INTO
    `status_dasars` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Hidup',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Mati',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Pindah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Hilang',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Tidak Valid',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `status_kawins`
--

CREATE TABLE `status_kawins` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `status_kawins`
--

INSERT INTO
    `status_kawins` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Belum Kawin',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Kawin',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Cerai Hidup',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Cerai Mati',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `status_ktps`
--

CREATE TABLE `status_ktps` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `status_ktps`
--

INSERT INTO
    `status_ktps` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Belum',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'KTP-EL',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `status_penduduks`
--

CREATE TABLE `status_penduduks` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `status_penduduks`
--

INSERT INTO
    `status_penduduks` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Tetap',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Tidak Tetap',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Pendatang',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `status_rekam_ktps`
--

CREATE TABLE `status_rekam_ktps` (
    `id` bigint UNSIGNED NOT NULL,
    `status_ktp_id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `status_rekam_ktps`
--

INSERT INTO
    `status_rekam_ktps` (
        `id`,
        `status_ktp_id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        1,
        'Belum Wajib',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        1,
        'Belum Rekam',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        2,
        'Sudah Rekam',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        2,
        'Card Printed',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        2,
        'Print Ready Record',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        6,
        2,
        'Card Shipped',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        7,
        2,
        'Sent For Card Printing',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        8,
        2,
        'Card Issued',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluars`
--

CREATE TABLE `surat_keluars` (
    `id` bigint UNSIGNED NOT NULL,
    `nomor_urut` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `klasifikasi_surat_id` bigint UNSIGNED DEFAULT NULL,
    `tanggal_surat` date NOT NULL,
    `tujuan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `perihal` text COLLATE utf8mb4_unicode_ci,
    `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_keluars`
--

INSERT INTO
    `surat_keluars` (
        `id`,
        `nomor_urut`,
        `nomor_surat`,
        `klasifikasi_surat_id`,
        `tanggal_surat`,
        `tujuan`,
        `perihal`,
        `dokumen`,
        `created_at`,
        `updated_at`
    )
VALUES (
        4,
        '001/2024',
        '090/138/DKUKMP.1',
        1,
        '2024-11-01',
        'Dinas Kependudukan Dan Pencatatan Sipil',
        'Permohonan Data',
        'dokumens/7GK5YvReOoo5wEEPNowro6xrtLy2TSsfS6MMH3PA.pdf',
        '2024-11-04 16:27:14',
        '2024-11-04 16:27:14'
    );

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuks`
--

CREATE TABLE `surat_masuks` (
    `id` bigint UNSIGNED NOT NULL,
    `nomor_urut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `klasifikasi_surat_id` bigint UNSIGNED DEFAULT NULL,
    `tanggal_surat` date NOT NULL,
    `tanggal_catat` timestamp NOT NULL,
    `pengirim` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `perihal` text COLLATE utf8mb4_unicode_ci,
    `pamong_id` json DEFAULT NULL,
    `isi_disposisi` text COLLATE utf8mb4_unicode_ci,
    `dokumen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `surat_masuks`
--

INSERT INTO
    `surat_masuks` (
        `id`,
        `nomor_urut`,
        `nomor_surat`,
        `klasifikasi_surat_id`,
        `tanggal_surat`,
        `tanggal_catat`,
        `pengirim`,
        `perihal`,
        `pamong_id`,
        `isi_disposisi`,
        `dokumen`,
        `created_at`,
        `updated_at`
    )
VALUES (
        3,
        '001/2024',
        'S1/37/VII/2023-UNIT INTELKOM',
        1,
        '2024-11-05',
        '2024-11-05 04:27:00',
        'Polda NTB',
        'Permohonan Data',
        '[\"1\", \"2\"]',
        'Proses data segera',
        'dokumens/se9MJE8E0jdpwWeqWxEgFX5gD0P8XsyqoQAM860K.pdf',
        '2024-11-04 16:27:53',
        '2024-11-04 16:27:53'
    );

-- --------------------------------------------------------

--
-- Table structure for table `tempat_kelahirans`
--

CREATE TABLE `tempat_kelahirans` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `tempat_kelahirans`
--

INSERT INTO
    `tempat_kelahirans` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'RS/RB',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'Puskesmas',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Polindes',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        4,
        'Rumah',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        5,
        'Lainnya',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp NULL DEFAULT NULL,
    `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `photo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `role_id` bigint UNSIGNED NOT NULL,
    `status` tinyint NOT NULL DEFAULT '0',
    `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO
    `users` (
        `id`,
        `nama`,
        `username`,
        `email`,
        `email_verified_at`,
        `password`,
        `phone`,
        `photo`,
        `role_id`,
        `status`,
        `remember_token`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'Happy Agung',
        'metalab',
        'metalabmetadata@gmail.com',
        NULL,
        '$2y$12$doW7zSymbRPMamo4i6uf7OZAe4tl8Ueq8BCUZspz1hTO2325sU1Sa',
        '08123456789',
        NULL,
        1,
        1,
        NULL,
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

-- --------------------------------------------------------

--
-- Table structure for table `warga_negaras`
--

CREATE TABLE `warga_negaras` (
    `id` bigint UNSIGNED NOT NULL,
    `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp NULL DEFAULT NULL,
    `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;

--
-- Dumping data for table `warga_negaras`
--

INSERT INTO
    `warga_negaras` (
        `id`,
        `nama`,
        `created_at`,
        `updated_at`
    )
VALUES (
        1,
        'WNI',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        2,
        'WNA',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    ),
    (
        3,
        'Dua Kewarganegaraan',
        '2024-10-26 16:32:06',
        '2024-10-26 16:32:06'
    );

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agamas`
--
ALTER TABLE `agamas` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuans`
--
ALTER TABLE `bantuans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuan_penerimas`
--
ALTER TABLE `bantuan_penerimas` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bantuan_sasarans`
--
ALTER TABLE `bantuan_sasarans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cacats`
--
ALTER TABLE `cacats` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cara_kbs`
--
ALTER TABLE `cara_kbs` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dusuns`
--
ALTER TABLE `dusuns` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hubungan_keluargas`
--
ALTER TABLE `hubungan_keluargas` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelahirans`
--
ALTER TABLE `jenis_kelahirans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kehamilans`
--
ALTER TABLE `kehamilans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompoks`
--
ALTER TABLE `kelompoks` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_anggotas`
--
ALTER TABLE `kelompok_anggotas` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_jabatans`
--
ALTER TABLE `kelompok_jabatans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelompok_kategoris`
--
ALTER TABLE `kelompok_kategoris` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluargas`
--
ALTER TABLE `keluargas`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `keluargas_no_kk_unique` (`no_kk`);

--
-- Indexes for table `klasifikasi_surats`
--
ALTER TABLE `klasifikasi_surats` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pamongs`
--
ALTER TABLE `pamongs` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens` ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pekerjaans`
--
ALTER TABLE `pekerjaans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikans`
--
ALTER TABLE `pendidikans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendidikan_kks`
--
ALTER TABLE `pendidikan_kks` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penduduks`
--
ALTER TABLE `penduduks`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `penduduks_nik_unique` (`nik`);

--
-- Indexes for table `pengaturans`
--
ALTER TABLE `pengaturans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penolong_kelahirans`
--
ALTER TABLE `penolong_kelahirans` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
ADD PRIMARY KEY (`id`),
ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (
    `tokenable_type`,
    `tokenable_id`
);

--
-- Indexes for table `provinsis`
--
ALTER TABLE `provinsis` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rts`
--
ALTER TABLE `rts` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rws`
--
ALTER TABLE `rws` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sakit_menahuns`
--
ALTER TABLE `sakit_menahuns` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_dasars`
--
ALTER TABLE `status_dasars` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_kawins`
--
ALTER TABLE `status_kawins` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_ktps`
--
ALTER TABLE `status_ktps` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_penduduks`
--
ALTER TABLE `status_penduduks` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_rekam_ktps`
--
ALTER TABLE `status_rekam_ktps` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_keluars`
--
ALTER TABLE `surat_keluars` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_masuks`
--
ALTER TABLE `surat_masuks` ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempat_kelahirans`
--
ALTER TABLE `tempat_kelahirans` ADD PRIMARY KEY (`id`);

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
ALTER TABLE `warga_negaras` ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agamas`
--
ALTER TABLE `agamas`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `bantuans`
--
ALTER TABLE `bantuans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 7;

--
-- AUTO_INCREMENT for table `bantuan_penerimas`
--
ALTER TABLE `bantuan_penerimas`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `bantuan_sasarans`
--
ALTER TABLE `bantuan_sasarans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `cacats`
--
ALTER TABLE `cacats`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 8;

--
-- AUTO_INCREMENT for table `cara_kbs`
--
ALTER TABLE `cara_kbs`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `dusuns`
--
ALTER TABLE `dusuns`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `golongan_darahs`
--
ALTER TABLE `golongan_darahs`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 14;

--
-- AUTO_INCREMENT for table `hubungan_keluargas`
--
ALTER TABLE `hubungan_keluargas`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 12;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT for table `jenis_kelahirans`
--
ALTER TABLE `jenis_kelahirans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `jenis_kelamins`
--
ALTER TABLE `jenis_kelamins`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `kehamilans`
--
ALTER TABLE `kehamilans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `kelompoks`
--
ALTER TABLE `kelompoks`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 10;

--
-- AUTO_INCREMENT for table `kelompok_anggotas`
--
ALTER TABLE `kelompok_anggotas`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `kelompok_jabatans`
--
ALTER TABLE `kelompok_jabatans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `kelompok_kategoris`
--
ALTER TABLE `kelompok_kategoris`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `keluargas`
--
ALTER TABLE `keluargas`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `klasifikasi_surats`
--
ALTER TABLE `klasifikasi_surats`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2336;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 47;

--
-- AUTO_INCREMENT for table `pamongs`
--
ALTER TABLE `pamongs`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `pekerjaans`
--
ALTER TABLE `pekerjaans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 84;

--
-- AUTO_INCREMENT for table `pendidikans`
--
ALTER TABLE `pendidikans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 19;

--
-- AUTO_INCREMENT for table `pendidikan_kks`
--
ALTER TABLE `pendidikan_kks`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 11;

--
-- AUTO_INCREMENT for table `penduduks`
--
ALTER TABLE `penduduks`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 11;

--
-- AUTO_INCREMENT for table `pengaturans`
--
ALTER TABLE `pengaturans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `penolong_kelahirans`
--
ALTER TABLE `penolong_kelahirans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinsis`
--
ALTER TABLE `provinsis`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 93;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `rts`
--
ALTER TABLE `rts`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `rws`
--
ALTER TABLE `rws`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `sakit_menahuns`
--
ALTER TABLE `sakit_menahuns`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 15;

--
-- AUTO_INCREMENT for table `status_dasars`
--
ALTER TABLE `status_dasars`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `status_kawins`
--
ALTER TABLE `status_kawins`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `status_ktps`
--
ALTER TABLE `status_ktps`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 3;

--
-- AUTO_INCREMENT for table `status_penduduks`
--
ALTER TABLE `status_penduduks`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `status_rekam_ktps`
--
ALTER TABLE `status_rekam_ktps`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT for table `surat_keluars`
--
ALTER TABLE `surat_keluars`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `surat_masuks`
--
ALTER TABLE `surat_masuks`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `tempat_kelahirans`
--
ALTER TABLE `tempat_kelahirans`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT for table `warga_negaras`
--
ALTER TABLE `warga_negaras`
MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
AUTO_INCREMENT = 4;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;