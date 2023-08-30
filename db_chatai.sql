-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2023 at 03:33 PM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.3-4ubuntu2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chatai`
--

-- --------------------------------------------------------

--
-- Table structure for table `reqChat`
--

CREATE TABLE `reqChat` (
  `id` int(11) NOT NULL,
  `request_chat` longtext DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reqChat`
--

INSERT INTO `reqChat` (`id`, `request_chat`, `user_id`) VALUES
(39, 'apa itu metal slug', 6),
(40, 'apa itu makan', 6),
(41, 'apa itu bully', 6),
(42, 'siapa ibu luffy?', 6),
(43, 'siapa itu garp?', 6),
(44, 'garp adalah kakek dari monkey d luffy', 6),
(45, 'siapa itu garp?', 6),
(46, 'apakah ferdy sambo jadi meninggal?', 6),
(47, 'kamu menyediakan informasi sampai tahun berapa?', 6),
(48, 'siapa nama calon presiden dari pdip', 6),
(49, 'skandal tahun 2023', 6);

-- --------------------------------------------------------

--
-- Table structure for table `resChat`
--

CREATE TABLE `resChat` (
  `id` int(11) NOT NULL,
  `response_chat` longtext DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resChat`
--

INSERT INTO `resChat` (`id`, `response_chat`, `user_id`) VALUES
(45, 'Metal Slug adalah sebuah permainan video yang dikembangkan oleh SNK. Permainan ini adalah permainan tembak-menembak dengan gaya run and gun yang sangat populer. Pemain mengendalikan karakter prajurit yang harus melawan musuh dan menghindari serangan mereka. Metal Slug terkenal karena grafisnya yang indah, gameplay yang seru, dan tingkat kesulitannya yang tinggi. Permainan ini telah dirilis di berbagai platform, termasuk konsol dan arcade.', 6),
(46, 'Makan adalah tindakan mengonsumsi makanan untuk memenuhi kebutuhan nutrisi dan energi tubuh. Makan juga bisa menjadi kegiatan sosial yang dilakukan bersama keluarga atau teman-teman.', 6),
(47, 'Bully adalah tindakan atau perilaku yang dilakukan seseorang untuk menyakiti, mengintimidasi, atau merendahkan orang lain secara terus-menerus. Bully dapat terjadi dalam berbagai bentuk, seperti fisik, verbal, atau melalui media sosial. Tindakan bully sering dilakukan oleh seseorang yang memiliki kekuatan atau keunggulan tertentu untuk mendominasi atau mengendalikan orang lain yang lebih lemah. Bully dapat memiliki dampak negatif yang serius pada kesehatan mental dan emosional korban.', 6),
(48, 'Ibu Luffy adalah Monkey D. Dragon.', 6),
(49, 'Garp adalah seorang karakter dalam seri manga dan anime One Piece. Dia adalah seorang wakil admiral di Angkatan Laut Dunia Baru dan juga seorang paman dari Monkey D. Luffy, tokoh utama dalam cerita ini. Garp dikenal sebagai \"Garp Si Tinju\" karena keahliannya dalam pertarungan fisik. Dia memiliki hubungan yang kompleks dengan Luffy dan kelompok bajak laut Topi Jerami.', 6),
(50, 'Benar, Garp adalah kakek dari Monkey D. Luffy.', 6),
(51, 'Maaf, aku belum mengerti dengan pertanyaanmu. Bisa kamu menjelaskannya lagi?', 6),
(52, 'Maaf, saya tidak memiliki informasi tentang Ferdy Sambo. Saya sarankan Anda mencari informasi terbaru dari sumber yang terpercaya untuk mengetahui keadaan terkini tentang Ferdy Sambo.', 6),
(53, 'Saya menyediakan informasi sampai tahun 2023.', 6),
(54, 'Maaf, tetapi saya tidak memiliki akses ke informasi terbaru tentang calon presiden dari PDIP. Saya sarankan Anda mencari informasi terbaru dari sumber yang terpercaya atau menghubungi PDIP langsung untuk mendapatkan informasi yang lebih akurat.', 6),
(55, 'Maaf, tetapi saya tidak memiliki informasi tentang skandal tahun 2023. Apakah ada pertanyaan lain yang bisa saya bantu?', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'funnyclown', '$2y$10$yh262ekCJYPp2F/ez/HUoOBiHY3zaP7A3JCAAT/EJ4pHi2w0d2TSC'),
(5, '', '$2y$10$mvFlx5PXax9UyiVzaV1tHeMa9KO58LTmH6gkiLEADWJDfJq3NxUgS'),
(6, 'dummy', '$2y$10$DXHaoB4HEQUB5O5njsNgROtT0MGncixEBIAPlTF2UeHut9jVbfcQO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reqChat`
--
ALTER TABLE `reqChat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resChat`
--
ALTER TABLE `resChat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reqChat`
--
ALTER TABLE `reqChat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `resChat`
--
ALTER TABLE `resChat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
