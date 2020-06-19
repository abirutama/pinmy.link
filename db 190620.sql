-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2020 pada 13.08
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

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
  `appearance_ava` varchar(25) DEFAULT NULL,
  `appearance_cover` varchar(25) DEFAULT NULL,
  `appearance_accent` varchar(6) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `appearance`
--

INSERT INTO `appearance` (`appearance_id`, `appearance_ava`, `appearance_cover`, `appearance_accent`, `user_id`) VALUES
(1, 'interview_demian1.jpg', '0302_Figo__.jpg', NULL, 1),
(2, '', NULL, NULL, 2),
(3, NULL, NULL, NULL, 7),
(4, NULL, NULL, NULL, 8);

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
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `card`
--

INSERT INTO `card` (`card_id`, `card_title`, `card_slug`, `card_url`, `card_thumbnail`, `user_id`, `date_created`) VALUES
(34, 'Bootstrap Documentation', 'bootstrap-documentation-34', 'https://getbootstrap.com/docs/4.4/', '', 1, 1583930387),
(44, 'Ketua KPK Perintahkan Koruptor Dijerat Pasal Pencucian Uang', 'ketua-kpk-perintahkan-koruptor-dijerat-pasal-pencucian-uang-44', 'https://www.cnnindonesia.com/nasional/20200414153656-12-493470/ketua-kpk-perintahkan-koruptor-dijerat-pasal-pencucian-uang', '', 3, 1586892714),
(45, 'Virus Corona Hantui Si Miskin di Maroko', 'virus-corona-hantui-si-miskin-di-maroko-45', 'https://www.cnnindonesia.com/internasional/20200414080556-129-493262/foto-virus-corona-hantui-si-miskin-di-maroko', '', 3, 1586892728),
(46, 'PSBB, Pemprov DKI Kirim 78 Ribu Paket Bansos Hari Ini', 'psbb-pemprov-dki-kirim-78-ribu-paket-bansos-hari-ini-46', 'https://www.cnnindonesia.com/nasional/20200414204037-20-493589/psbb-pemprov-dki-kirim-78-ribu-paket-bansos-hari-ini', '', 3, 1586892874),
(47, 'DPR Persilakan Pemerintah Tarik Draf Omnibus Law Ciptaker', 'dpr-persilakan-pemerintah-tarik-draf-omnibus-law-ciptaker-47', 'https://www.cnnindonesia.com/nasional/20200414203113-32-493584/dpr-persilakan-pemerintah-tarik-draf-omnibus-law-ciptaker', '', 1, 1586892903),
(48, 'Pemprov Jatim Tunggu Hasil Kajian Sebelum Ajukan PSBB', 'pemprov-jatim-tunggu-hasil-kajian-48', 'https://www.cnnindonesia.com/nasional/20200414230532-20-493611/pemprov-jatim-tunggu-hasil-kajian-sebelum-ajukan-psbb', '', 1, 1586894094),
(49, 'KPK Minta Polemik LHKPN Deputi Penindakan Tak Diperpanjang', 'kpk-minta-polemik-lhkpn-deputi-49', 'https://www.cnnindonesia.com/nasional/20200414234103-12-493614/kpk-minta-polemik-lhkpn-deputi-penindakan-tak-diperpanjang', 'https://images.unsplash.com/photo-1587808061126-7a98c4e108df?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60', 1, 1586894115),
(50, 'Harga Minyak Anjlok, Harga BBM Dinilai Tak Perlu Buru-buru Turun Di Bulan Ini', 'harga-minyak-anjlok-harga-bbm-50', 'https://finance.detik.com/energi/d-4977280/harga-minyak-anjlok-harga-bbm-dinilai-tak-perlu-buru-buru-turun', 'https://images.unsplash.com/photo-1587783194913-bf9df49e1902?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80', 1, 1586894172),
(51, 'Test Baru', 'test-baru-51', 'http://google.com', NULL, 2, 1592558845);

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
(1, '34,50,null,null', 1),
(2, 'null,null,null,null', 2),
(3, 'null,null,null,null', 7),
(4, 'null,null,null,null', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'IT / Tech / Computer'),
(2, 'Traveling / Holiday'),
(3, 'Food / Beverage / Culinary'),
(4, 'Art / Design / Visual');

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
  `meta_description` varchar(160) DEFAULT 'Your Page''s Description',
  `meta_keyword` varchar(160) DEFAULT NULL,
  `meta_robot` tinyint(1) NOT NULL DEFAULT 1,
  `meta_rating` tinyint(1) NOT NULL DEFAULT 0,
  `gtag_id` varchar(18) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `seo`
--

INSERT INTO `seo` (`seo_id`, `meta_title`, `meta_description`, `meta_keyword`, `meta_robot`, `meta_rating`, `gtag_id`, `user_id`) VALUES
(1, '@abirutama\'s Page', 'Cara jitu belajar jadi pengusaha yang sukses dari para pakar dan pengusaha senior', 'usaha, bisnis, enterpreneur, pengusaha, sukses, ahli', 1, 0, 'UA-90789114-6', 1),
(2, 'Welcome to My Page', NULL, NULL, 1, 0, NULL, 3),
(3, 'Welcome to My Page', 'Your Page\'s Description', NULL, 1, 0, NULL, 7),
(4, 'Welcome to My Page', 'Your Page\'s Description', NULL, 1, 0, NULL, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_twitter` tinytext DEFAULT NULL,
  `social_facebook` tinytext DEFAULT NULL,
  `social_instagram` tinytext DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `social`
--

INSERT INTO `social` (`social_id`, `social_twitter`, `social_facebook`, `social_instagram`, `user_id`) VALUES
(2, 'abirutama12', 'abirutama12', 'abirutama12', 1),
(3, NULL, NULL, NULL, 3),
(4, NULL, NULL, NULL, 7),
(5, NULL, NULL, NULL, 8);

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
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_pass`, `role_id`, `is_active`, `date_created`, `is_verified`, `category_id`) VALUES
(1, 'abirutama', 'abirutama@gmail.com', '$2y$10$8R5jzJJ903Da9EZXK6rm8OwiH0VVnyaDZXR1GEuLuWxgimSZO3acW', 2, 1, 1583193600, 1, 1),
(2, 'abirutama12', 'abirutama12@gmail.com', '$2y$10$dF2Ax.CUSOqrDGKgkAHmA.VfGpFMbV69F7qQlPYxJVD744t4CbDwe', 2, 0, 1583193600, 0, 2),
(3, 'abirutama13', 'abirutama13@gmail.com', '$2y$10$52apuCYsTUp1hwjLtcPqm.q0h0ZDPWxoD/vT1rdKYcitM1e2ejqDi', 2, 0, 1583193600, 0, 1),
(4, 'abirutama55', 'abirutama55@gmail.com', '$2y$10$x2nUB82Rc.FbWwUceDGVwuC.w0H0LPhz9gmuuJDZrspVMHIEcccRK', 2, 1, 1583193600, 0, 2),
(5, 'abirutama56', 'abirutama56@gmail.com', '$2y$10$j4/qChZvtD/NXeNBsmkYG.PimB0ZyGP3HFDEdKGqqBV0APH/J6oIO', 2, 1, 1587081600, 0, 3),
(6, 'abirutama57', 'abirutama57@gmail.com', '$2y$10$zLATWc/foMYvbdb/v3liROOU9sJxsgvnz3DmLWC7pVnanox2Pwl/m', 2, 1, 1588291200, 0, 4),
(7, 'abirutama100', 'abirutama100@gmail.com', '$2y$10$zW3dQ9MmkLD.rVfWdyaVVunPGcNVNeTNdi8ZDqupdkOCk8LSZVjOa', 2, 1, 1588291200, 0, 3),
(8, 'abirutama101', 'abirutama101@gmail.com', '$2y$10$lbzJ4/hn5yAPWUf3Z3takeXr/tWMsYN0R.laGZON0kkeEq3r0dPw.', 2, 1, 1591401600, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `appearance`
--
ALTER TABLE `appearance`
  ADD PRIMARY KEY (`appearance_id`);

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
  MODIFY `appearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `card`
--
ALTER TABLE `card`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `card_pinned`
--
ALTER TABLE `card_pinned`
  MODIFY `pin_id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `seo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
