-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 24, 2017 at 06:05 AM
-- Server version: 5.6.33
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `db_cms_pakem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `id_posts` int(11) NOT NULL,
  `comment` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `status` enum('header','footer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '999'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu_title`, `url`, `parent`, `status`, `sort`) VALUES
(1, 'Tentang Kami', '/about', 0, 'header', 0),
(2, 'Blog', '/blog', 0, 'header', 3),
(3, 'Syarat & Ketentuan', '/page/syarat-ketentuan', 0, 'header', 1),
(4, 'Biaya & Fasilitas', '/page/biaya-fasilitas', 0, 'header', 2),
(5, 'Teknik Pelaksanaan', '/page/teknik-pelaksanaan', 0, 'header', 999),
(6, 'Visi Misi', '#', 1, 'header', 999);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_04_18_022401_create_media_table', 1),
(4, '2017_04_18_022419_create_setting_table', 1),
(5, '2017_04_18_022437_create_menus_table', 1),
(6, '2017_04_18_023740_create_posts_table', 1),
(7, '2017_04_18_023748_create_pages_table', 1),
(8, '2017_04_18_023808_create_comments_table', 1),
(9, '2017_04_18_023808_create_messages_table', 1),
(10, '2017_05_01_043704_create_pages_slide_table', 1),
(11, '2017_05_01_043720_create_pages_about_table', 1),
(12, '2017_05_01_043733_create_pages_about_team_table', 1),
(13, '2017_05_01_043746_create_pages_work_table', 1),
(14, '2017_05_01_060754_create_visitors_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `id_user`, `slug`, `title`, `content`, `keyword`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'blog', 'Blog', '<p>Page Blog test</p>', 'test', '198838.jpg', '2017-07-07 00:19:39', '2017-07-07 00:19:39', NULL),
(2, 1, 'syarat-ketentuan', 'Syarat & Ketentuan', '<p>Syarat Dan Ketentuan</p><ul><li>Usia minimal 12 tahun dan maksimal 65 tahun</li><li>Surat Persetujuan orang tua, Suami atau Istri.</li><li>Surat Keterangan Penghasilan</li><li>Nasabah wajib membuka Rekening Tabungan</li></ul><p>Persyaratan Dokumen</p><table class="fr-dashed-borders fr-alternate-rows" style="width: 58%;"><thead><tr><th style="text-align: center; background-color: rgb(84, 172, 210); width: 62.5205%;">Dokumen Kelengkapan<br>Peserta<br></th><th style="text-align: center; background-color: rgb(84, 172, 210); width: 17.3486%;">Karyawan</th><th style="text-align: center; background-color: rgb(84, 172, 210); width: 19.9672%;">Non Karyawan</th></tr></thead><tbody><tr><td style="width: 62.5205%;">Aplikasi Umrah<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;">v</td></tr><tr><td style="width: 62.5205%;">Persetujuan Suami/Istri<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;">v</td></tr><tr><td style="width: 62.5205%;">Copy KTP Pemohon dan KTP Pasangan (bila telah menikah)<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;">v</td></tr><tr><td style="width: 62.5205%;">Copy Kartu Keluarga<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;">v</td></tr><tr><td style="width: 62.5205%;">Copy Surat Nikah<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;">v</td></tr><tr><td style="width: 62.5205%;">Copy NPWP Pribadi<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;">v</td></tr><tr><td style="width: 62.5205%;">Surat Keterangan Pekerjaan (asli) / Copy SK pengangkatan<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;"><br></td></tr><tr><td style="width: 62.5205%;">Surat Keterangan Penghasilan / Slip Gaji (asli)<br></td><td style="width: 17.3486%; text-align: center;">v</td><td style="width: 19.9672%; text-align: center;">v</td></tr><tr><td style="width: 62.5205%;"><br></td><td style="width: 17.3486%;"><br></td><td style="width: 19.9672%;"><br></td></tr></tbody></table><p><br></p>', 'syarat,ketentuan', '880126.jpg', '2017-07-18 11:11:32', '2017-07-18 11:11:32', NULL),
(3, 1, 'biaya-fasilitas', 'Biaya & Fasilitas', '<p><strong>BIAYA YANG TIDAK TERMASUK DALAM PAKET UMROH</strong></p><ol><li>Biaya pembuatan pasport</li><li>Biaya vaksin maningitis</li><li>Biaya kelebihan bagasi</li></ol><p><strong>FASILITAS PAKET UMROH</strong></p><ol><li>Paket Umrah 12 Hari (4 Hari Madinah, 6 Hari Mekkah, 2 hari Perjalanan PP)</li><li>Hotel Bintang Empat, Madinah 75 Meter, Mekkah &nbsp;200 meter dari masjidil haram</li><li>Handling di bandara Soekarno Hatta dan King Abdul Azis</li><li>Tiket Pesawat PP Sesuai Rute/program</li><li>Visa Umrah</li><li>Bus Ber AC selama Di arab Saudi</li><li>Makan dengan Menu Indonesia 3 (tiga kali sehari)</li><li>Pelaksanaan Ibadah Umrah 2 kali</li><li>Perlengkapan dan Handling</li><li>Air zam-zam 5 liter</li><li>Pembimbing, tour leader dan Mutawwif</li><li>Manasik Sebelum pemberangkatan</li><li>City Tour Madinah, Mekkah dan Jeddah</li></ol>', 'biaya,umroh,fasilitas', '474473.png', '2017-07-18 11:17:02', '2017-07-18 11:17:02', NULL),
(4, 1, 'teknik-pelaksanaan', 'Teknik Pelaksanaan', '<p><strong><span style="font-size: 24px;">TEKNIK PELAKSANAAN</span></strong></p><ol><li><span style="font-size: 14px;">Calon peserta mendaftarkan diri disetiap kantor cabang atau kantor perwakilan PT. PANDI KENCANA MURNI di seluruh wilayah REPUBLIK INDONESIA</span></li><li><span style="font-size: 14px;">Kantor Cabang dan Perwakilan akan membentuk kelompok peserta sesuai dengan jangka waktu pelaksanaan yg telah ditetapkan</span></li><li><span style="font-size: 14px;">Setelah kelompok peserta terbentuk, selanjutnya Kantor Pusat akan menurunkan TEAM SOSIALISASI &nbsp;dari TEAM TEKNIS PELAKSANA</span></li><li><span style="font-size: 14px;">Setelah kelompok terbentuk, maka peserta diwajibkan membuka rekening pd BANK yang bekerja sama dengan penyelenggara , dengan nilai setoran awal sesuai paket yang dipilih.</span></li><li>Sistem pemberangkatan dilaksanakan setiap tahun sebanyak 12 (dua belas) orang dengan memilih &nbsp;1 (satu) orang peserta setiap bulannya.</li><li>Sistem pemilihan peserta dengan cara pencabutan nomor urut antrian pemberangkatan yang dilaksanakan lewat media elektronic &nbsp;dan disaksikan oleh Notaris.</li><li>Peserta yang telah terpilih , tidak diwajibkan lagi menabung untuk bulan selanjutnya sampai masa pelaksanaan berakhir.</li><li>Peserta yang tersisa pada tahun terakhir pelaksanaan, akan diberangkatkan secara &nbsp;serentak.</li></ol>', 'teknik,howitwoks', '937608.png', '2017-07-20 17:42:13', '2017-07-20 17:44:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages_about`
--

CREATE TABLE `pages_about` (
  `about` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `founded` date NOT NULL,
  `industry` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vision` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `mission` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `maps` longtext COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages_about`
--

INSERT INTO `pages_about` (`about`, `founded`, `industry`, `vision`, `mission`, `maps`, `image`) VALUES
('<p>Setiap muslim pasti merindukan BAITULLAH, sempurnakan kerinduan Anda pada BAITULLAH dengan ibadah Umrah. Tabungan Umrah PT. PAKEM TRAVEL kini hadir membantu anda untuk menyempurnakan niat anda beribadah dan berziarah ke BAITULLAH. Dengan Program Tabungan Umroh Berjangka, Terjangkau dan Terbatas yang diselenggarakan oleh PT. PANDI KENCANA MURNI Travel.</p>', '2017-07-07', 'Jasa', 'Merealisasikan niat beribadah ke BAITULLAH melalui ibadah UMROH dengan cara menabung tanpa harus membayar angsuran setelah menunaikan ibadah UMROH. Merealisasikan niat beribadah ke BAITULLAH melalui ibadah UMROH dengan Tenang, Nyaman , Murah dan Berkah karena sesui sariah.', 'Berjangka\r\nJangka Waktu Pelaksanaan ada 2 ( dua ) pilihan sebagai berikut :\r\n1. Paket Tiga Tahun atau 36 ( tiga puluh enam ) bulan\r\n2. Paket Lima Tahun atau 60 ( enam puluh ) bulan\r\n\r\nTERJANGKAU\r\nNilai Tabungan setiap bulan disesuaikan dengan jangka waktu pelaksanaan sebagai berikut :\r\n1. Paket Pelaksanaan 36 ( tiga puluh enam ) bulan, sebesar Rp. 950.000-, perbulan\r\n2. Paket Pelaksanaan 60 ( enam puluh ) bulan, sebesar Rp. 670.000,- perbulan\r\n\r\nTERBATAS\r\nJumlah peserta untuk setiap kelompok sangat terbatas sebagai berikut :\r\n1. Paket Pelaksanaan 36 ( tiga puluh enam ) bulan, jumlah peserta 360 ( tiga ratus enam puluh ) orang.\r\n2. Paket Pelaksanaan 60 ( enam puluh ) bulan, jumlah peserta 500 ( lima ratus ) orang', NULL, '778049.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pages_about_team`
--

CREATE TABLE `pages_about_team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages_slide`
--

CREATE TABLE `pages_slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages_slide`
--

INSERT INTO `pages_slide` (`id`, `sort`, `title`, `desc`, `image`, `created_at`, `updated_at`) VALUES
(2, 3, 'Lebih Dari Sekedar Nikmatnya Ibadah', '<p>Lebih Dari Sekedar Nikmatnya Ibadah</p>', '633674.jpg', '2017-07-09 09:08:15', '2017-07-23 12:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `pages_work`
--

CREATE TABLE `pages_work` (
  `id` int(10) UNSIGNED NOT NULL,
  `sort` int(11) NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('publish','schedule','draft','hidden') COLLATE utf8mb4_unicode_ci NOT NULL,
  `published` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `id_user`, `slug`, `title`, `content`, `keyword`, `image`, `category`, `comment`, `status`, `published`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'test', 'test', '<p>testt&nbsp;</p>', 'asd', '988118.jpg', 'test', '1', 'publish', '2017-07-07 08:05:02', '2017-07-07 00:05:02', '2017-07-20 21:51:58', '2017-07-20 21:51:58');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `meta_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timezone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `og_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expired_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`meta_title`, `meta_description`, `meta_keyword`, `timezone`, `email`, `phone`, `address`, `maintenance`, `logo`, `favicon`, `og_image`, `facebook`, `twitter`, `google`, `linkedin`, `youtube`, `instagram`, `expired_at`) VALUES
('PaKeM Tour', 'Explain about this website', 'Travel,Umrah,Haji', 'Asia/Makassar', 'admin@mail.com', '343543546', 'Jln. Lorem Ipsum', '0', '163514.jpg', '', '116737.jpg', 'dfdasda', 'adasd', 'adasdas', 'adasd', 'adasd', 'adasd', '2018-07-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Super Admin','Admin','Customer Service','Writer','Guest') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `status`, `image`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'super_admin', 'Super Admin', 'superadmin@mail.com', 'Super Admin', '111111.png', '$2y$10$FYCSEmIhTxYbxgmIy3nHzeUUFvkwHiP9nfFseI9VFDSl8M/jU2rl2', NULL, '2017-07-07 05:25:22', '2017-07-07 05:25:22', NULL),
(2, 'oche97', 'Admin', 'admin@mail.com', 'Admin', '344455.jpg', '$2y$10$6SMc/UPUuQtp0.1iEOqtuuI0s.QNJCQuf1qMBoHt1B4xJl1yl39ii', NULL, '2017-07-07 05:25:22', '2017-07-07 00:36:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `browser` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hits` int(11) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_about_team`
--
ALTER TABLE `pages_about_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_slide`
--
ALTER TABLE `pages_slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages_work`
--
ALTER TABLE `pages_work`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `password_resets_email_unique` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pages_about_team`
--
ALTER TABLE `pages_about_team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pages_slide`
--
ALTER TABLE `pages_slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages_work`
--
ALTER TABLE `pages_work`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;