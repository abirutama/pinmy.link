-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2020 pada 13.13
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rupakara_p1nyml1nk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `appearance`
--

CREATE TABLE `appearance` (
  `appearance_id` int(11) NOT NULL,
  `appearance_ava` varchar(120) DEFAULT NULL,
  `appearance_cover` varchar(120) DEFAULT NULL,
  `appearance_accent` varchar(6) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `appearance`
--

INSERT INTO `appearance` (`appearance_id`, `appearance_ava`, `appearance_cover`, `appearance_accent`, `user_id`) VALUES
(1, 'logo_pinmylink.jpg', 'abstract-colorful-flow-shapes-background_23-21482580921.jpg', NULL, 1),
(5, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `campaign`
--

CREATE TABLE `campaign` (
  `campaign_id` int(11) NOT NULL,
  `campaign_title` varchar(120) NOT NULL DEFAULT 'New Campaign',
  `campaign_image` text NOT NULL,
  `campaign_url` text,
  `campaign_category` tinyint(4) NOT NULL DEFAULT '1',
  `campaign_start` int(11) DEFAULT NULL,
  `campaign_end` int(11) DEFAULT NULL,
  `sponsor_id` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `campaign`
--

INSERT INTO `campaign` (`campaign_id`, `campaign_title`, `campaign_image`, `campaign_url`, `campaign_category`, `campaign_start`, `campaign_end`, `sponsor_id`) VALUES
(1, 'New Campaign Nike', 'nike-ad.jpg', 'https://pinmy.link/?p=test_campaign', 1, 1593129600, 1593388800, 1),
(2, 'New Campaign 2', 'adidas-ad.jpg', '#', 1, 1593216000, 1593388800, 1),
(3, 'New Campaign 3', 'nb-ad.jpg', 'https://pinmy.link/?p=test_campaign', 1, 1593194400, 1593388800, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `card`
--

CREATE TABLE `card` (
  `card_id` int(11) NOT NULL,
  `card_title` varchar(160) NOT NULL,
  `card_slug` varchar(325) NOT NULL,
  `card_url` varchar(256) NOT NULL,
  `card_thumbnail` varchar(256) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_highlighted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `card`
--

INSERT INTO `card` (`card_id`, `card_title`, `card_slug`, `card_url`, `card_thumbnail`, `user_id`, `date_created`, `is_highlighted`) VALUES
(44, 'Ketua KPK Perintahkan Koruptor Dijerat Pasal Pencucian Uang', 'ketua-kpk-perintahkan-koruptor-dijerat-pasal-pencucian-uang-44', 'https://www.cnnindonesia.com/nasional/20200414153656-12-493470/ketua-kpk-perintahkan-koruptor-dijerat-pasal-pencucian-uang', '', 1, 1586892714, 0),
(45, 'Virus Corona Hantui Si Miskin di Maroko', 'virus-corona-hantui-si-miskin-di-maroko-45', 'https://www.cnnindonesia.com/internasional/20200414080556-129-493262/foto-virus-corona-hantui-si-miskin-di-maroko', '', 1, 1586892728, 0),
(46, 'PSBB, Pemprov DKI Kirim 78 Ribu Paket Bansos Hari Ini', 'psbb-pemprov-dki-kirim-78-ribu-paket-bansos-hari-ini-46', 'https://www.cnnindonesia.com/nasional/20200414204037-20-493589/psbb-pemprov-dki-kirim-78-ribu-paket-bansos-hari-ini', '', 1, 1586892874, 0),
(47, 'DPR Persilakan Pemerintah Tarik Draf Omnibus Law Ciptaker', 'dpr-persilakan-pemerintah-tarik-draf-omnibus-law-ciptaker-47', 'https://www.cnnindonesia.com/nasional/20200414203113-32-493584/dpr-persilakan-pemerintah-tarik-draf-omnibus-law-ciptaker', '', 1, 1586892903, 0),
(48, 'Pemprov Jatim Tung', 'pemprov-jatim-tung-48', 'https://www.cnnindonesia.com/nasional/20200414230532-20-493611/pemprov-jatim-tunggu-hasil-kajian-sebelum-ajukan-psbb', NULL, 1, 1586894094, 0),
(49, 'KPK Minta Polemik LHKPN Deputi Penindakan Tak Diperpanjang', 'kpk-minta-polemik-lhkpn-deputi-49', 'https://www.cnnindonesia.com/nasional/20200414234103-12-493614/kpk-minta-polemik-lhkpn-deputi-penindakan-tak-diperpanjang', '', 1, 1586894115, 1),
(50, 'Harga Minyak Anjlok, Harga BBM Dinilai Tak Perlu Buru-buru Turun Di Bulan Ini', 'harga-minyak-anjlok-harga-bbm-50', 'https://finance.detik.com/energi/d-4977280/harga-minyak-anjlok-harga-bbm-dinilai-tak-perlu-buru-buru-turun', '', 1, 1586894172, 0),
(54, 'testhtt', 'testhtt-54', 'https://google.com', NULL, 1, 1593270121, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `card_pinned`
--

CREATE TABLE `card_pinned` (
  `pin_id` tinyint(4) NOT NULL,
  `pin_item` varchar(160) DEFAULT 'null,null,null,null',
  `user_id` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `card_pinned`
--

INSERT INTO `card_pinned` (`pin_id`, `pin_item`, `user_id`) VALUES
(1, '46,48,50,34', 1),
(2, 'null,null,null,null', 2),
(3, 'null,null,null,null', 7),
(4, 'null,null,null,null', 8),
(5, 'null,null,null,null', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `is_active`) VALUES
(1, 'IT / Tech / Computer', 1),
(2, 'Traveling / Holiday', 1),
(3, 'Food / Beverage / Culinary', 1),
(4, 'Art / Design / Visual', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(18) NOT NULL,
  `card_max` tinyint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `card_max`) VALUES
(1, 'admin', 12),
(2, 'user', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seo`
--

CREATE TABLE `seo` (
  `seo_id` int(11) NOT NULL,
  `meta_title` varchar(60) DEFAULT 'Your Page''s Title',
  `meta_description` varchar(160) DEFAULT NULL,
  `meta_keyword` varchar(160) DEFAULT NULL,
  `meta_robot` tinyint(1) NOT NULL DEFAULT '1',
  `meta_rating` tinyint(1) NOT NULL DEFAULT '0',
  `gtag_id` varchar(18) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seo`
--

INSERT INTO `seo` (`seo_id`, `meta_title`, `meta_description`, `meta_keyword`, `meta_robot`, `meta_rating`, `gtag_id`, `user_id`) VALUES
(1, '', '', '', 1, 0, '', 1),
(5, 'Welcome to My Page', 'Your Page\'s Description', NULL, 1, 0, NULL, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_twitter` tinytext,
  `social_facebook` tinytext,
  `social_instagram` tinytext,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `social`
--

INSERT INTO `social` (`social_id`, `social_twitter`, `social_facebook`, `social_instagram`, `user_id`) VALUES
(2, '', '', 'pinmy.link', 1),
(3, NULL, NULL, NULL, 3),
(4, NULL, NULL, NULL, 7),
(5, NULL, NULL, NULL, 8),
(6, NULL, NULL, NULL, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(18) NOT NULL,
  `user_email` varchar(128) NOT NULL,
  `user_pass` varchar(256) NOT NULL,
  `role_id` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `date_created` int(11) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` tinyint(2) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `role_id`, `is_active`, `date_created`, `is_premium`, `category_id`) VALUES
(1, 'pinmy.link', 'abirutama@gmail.com', '$2y$10$8R5jzJJ903Da9EZXK6rm8OwiH0VVnyaDZXR1GEuLuWxgimSZO3acW', 1, 1, 1583193600, 1, 1),
(9, 'abi.utama', 'abirutama12@gmail.com', '$2y$10$FLV9yimZSQPcRSY7ickhaeQ8quhqjQ2L2cwRsMthTs9pH81TNZszG', 2, 1, 1592706568, 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appearance`
--
ALTER TABLE `appearance`
  ADD PRIMARY KEY (`appearance_id`);

--
-- Indeks untuk tabel `campaign`
--
ALTER TABLE `campaign`
  ADD PRIMARY KEY (`campaign_id`);

--
-- Indeks untuk tabel `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`card_id`);

--
-- Indeks untuk tabel `card_pinned`
--
ALTER TABLE `card_pinned`
  ADD PRIMARY KEY (`pin_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indeks untuk tabel `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`seo_id`);

--
-- Indeks untuk tabel `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `appearance`
--
ALTER TABLE `appearance`
  MODIFY `appearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `campaign`
--
ALTER TABLE `campaign`
  MODIFY `campaign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `card_pinned`
--
ALTER TABLE `card_pinned`
  MODIFY `pin_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `seo`
--
ALTER TABLE `seo`
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
