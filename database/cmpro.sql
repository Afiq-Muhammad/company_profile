-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 23, 2025 at 08:30 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int NOT NULL,
  `judul` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sinopsis` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(30) NOT NULL,
  `tanggal_terbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `sinopsis`, `deskripsi`, `foto`, `tanggal_terbit`) VALUES
(9, 'Tren Transformasi Digital 2025', 'Gambaran perkembangan teknologi dan peluang bisnis di era digital.', 'Tahun 2025 menandai babak baru dalam transformasi digital: adopsi AI kian masif, edge computing meluas, dan arsitektur multi-cloud menjadi norma. Di AfiqNet, kami merangkum insight dari praktik terbaik global dan menerjemahkannya ke dalam strategi implementasi infrastruktur yang siap mendukung pertumbuhan bisnis Anda.', '680870db390522.36810171.jpg', 'Rabu, 23 April 2025'),
(10, 'Meningkatkan Keamanan Siber di Jaringan Perusahaan', 'Langkah-langkah praktis untuk melindungi aset digital Anda.', 'Serangan siber terus berkembang, mulai dari malware canggih hingga serangan DDoS terkoordinasi. Artikel ini mengupas framework 5-layer security AfiqNet—pembatasan akses berbasis zero-trust, enkripsi end-to-end, hingga sistem deteksi anomali real-time—agar data perusahaan Anda selalu terlindungi.', '68086f3116ce19.28524798.jpg', 'Rabu, 23 April 2025'),
(11, 'Solusi Cloud Skalabel AfiqNet', 'Cara mudah scale up/down infrastruktur tanpa downtime.', 'Bisnis digital butuh fleksibilitas tinggi. Melalui platform cloud native kami, AfiqNet menawarkan auto-scaling server, container orchestration, dan load-balancer pintar. Pelajari bagaimana klien kami memanfaatkan arsitektur Kubernetes dan layanan managed database untuk menjaga performa saat trafik melonjak.', '680870e3b32cc5.68813826.jpg', 'Rabu, 23 April 2025');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` int NOT NULL,
  `judul` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sinopsis` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `sinopsis`, `deskripsi`, `foto`) VALUES
(10, 'Infrastruktur Jaringan Unggul', 'Fondasi konektivitas cepat dan stabil untuk bisnis Anda.', 'Di AfiqNet, kami membangun jaringan dengan arsitektur tier‑1, dilengkapi perangkat terkini dan didukung monitoring 24/7. Hasilnya, Anda menikmati latency rendah, throughput tinggi, dan uptime hingga 99,99%—siap mendukung segala skala operasional digital.', '68086ff641da51.55427417.jpg'),
(11, 'Dashboard Layanan Terintegrasi', 'Kelola semua solusi AfiqNet dalam satu tampilan.', 'Gallery ini menampilkan antarmuka dashboard AfiqNet—satu portal untuk memantau performa jaringan, analitik trafik, pengaturan keamanan, dan laporan penggunaan. Desain intuitif memudahkan tim Anda mengambil keputusan real‑time berdasarkan data komprehensif.', '6808704a4d9e91.60438602.jpg'),
(12, 'Tim Ahli Digital AfiqNet', 'Profesional berpengalaman di balik setiap solusi.', 'Foto ini memperlihatkan kolaborasi tim teknis dan developer AfiqNet dalam workshop internal. Keahlian di bidang network engineering, cloud computing, dan cybersecurity bersinergi untuk menciptakan layanan custom yang tepat sasaran bagi setiap klien kami.', '6808708a9619d5.54719579.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `nama`, `email`, `subjek`, `pesan`) VALUES
(6, 'Opik', 'opik@gmail.com', 'Ingin membeli paket internet', 'Saya ingin membeli paket internet tetapi ada sebuah kendala'),
(7, 'Tes 1', 'chaosfoxai@gmail.com', 'Tes 1', 'Tes tes tes 1');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int NOT NULL,
  `nama` varchar(30) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fitur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `fitur`) VALUES
(1, 'Standar Plan', 'Memilik jaringan 1 Mbps', '50.000', 'Mencakup 2 user, Memiliki jaringan 1Gbps, Mendukung TV + Phone'),
(4, 'Premium Plans', 'Kiw kiw', '100.000', 'Mencakup 5 pengguna, Kecepatan 8 Mbps per detik'),
(6, 'Center Plan', 'Paket menengah nengah', '12.000', 'Memiliki jaringan 2Gbps, Mencakup 2 User'),
(7, 'Top Plan', 'Paket internet cepat dan tinggi', '45.000', 'Unlimited User, Kecepatan stabil di rata rata 100 Mbps/s');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `nama_perusahaan` varchar(30) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `nama_ceo` varchar(100) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `cover` varchar(30) NOT NULL,
  `foto_ceo` varchar(30) NOT NULL,
  `email_perusahaan` varchar(50) NOT NULL,
  `alamat_perusahaan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `nama_perusahaan`, `logo`, `slogan`, `deskripsi`, `nama_ceo`, `telp`, `cover`, `foto_ceo`, `email_perusahaan`, `alamat_perusahaan`) VALUES
(1, 'PT Koneksi Anda', '680889fb39e483.36016564.png', 'Layanan Internet Terpercaya untuk Bisnis', 'Koneksi anda adalah penyedia layanan internet terkemuka yang berkomitmen untuk memberikan konektivitas cepat dan andal kepada pelanggan kami. Dengan lebih dari 15 tahun pengalaman di industri, kami memahami kebutuhan Anda dan berusaha untuk memberikan solusi terbaik yang sesuai dengan kebutuhan digital Anda.', 'Sapuk', '089512390638', '680864030bf7d2.93226077.jpg', '680864032a03a6.16835462.jpg', 'sukamaju@gmail.com', 'Jl. Raya Mahkota No. 88 F Kota Bogor 16153');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_produk` int NOT NULL,
  `jumlah` int NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `metode` enum('transfer','ewallet','cod') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama`, `id_produk`, `jumlah`, `total`, `metode`) VALUES
(1, 'Tes 1', 6, 2, 24.000, 'ewallet'),
(2, 'Tes 1', 6, 2, 24.000, 'ewallet'),
(3, 'Afiq', 4, 2, 200.000, 'transfer'),
(4, 'Afiq', 4, 2, 200.000, 'ewallet'),
(5, 'Tes1', 1, 2, 100.000, 'ewallet'),
(6, 'Tes2', 1, 2, 100.000, 'ewallet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nip` char(5) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nip`, `username`, `email`, `password`, `foto`) VALUES
('12345', 'Afiq', 'afiq@sc.id', 'db12e6d76d4ea8089be3c7ba943b1aec', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
