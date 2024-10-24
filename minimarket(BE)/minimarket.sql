-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2024 at 01:21 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minimarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adm-id` int(3) NOT NULL,
  `adm-name` varchar(255) NOT NULL,
  `adm-pass` varchar(255) NOT NULL,
  `adm-email` varchar(255) NOT NULL,
  `adm-status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`adm-id`, `adm-name`, `adm-pass`, `adm-email`, `adm-status`) VALUES
(1, 'Candra', '$2y$10$vTyy1f.MrnFkLjT1afLWdecUgAM20RPdsULz2CWKGtyaEGDsRAWVO', 'candrasetiadev@gmail.com', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat-id` int(3) NOT NULL,
  `cat-name` varchar(255) NOT NULL,
  `cat-icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat-id`, `cat-name`, `cat-icon`) VALUES
(1, 'Makanan', 'bi bi-egg-fried'),
(2, 'Minuman', 'bi bi-cup-straw'),
(3, 'Kesehatan', 'bi bi-prescription2');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ord-id` int(4) NOT NULL,
  `ord-title` varchar(255) NOT NULL,
  `ord-qty` int(3) NOT NULL,
  `ord-username` varchar(255) NOT NULL,
  `ord-adress` varchar(255) NOT NULL,
  `ord-price` int(255) NOT NULL,
  `ord-status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ord-id`, `ord-title`, `ord-qty`, `ord-username`, `ord-adress`, `ord-price`, `ord-status`) VALUES
(1, 'Roti Tawar', 2, 'candra', 'Jl. Cibaduyut Lama, GG Bapak Sarhawi, RT 01, RW 06', 90000, 'UNPAID'),
(4, 'Roti Tawar', 2, 'candra', 'Jl Cimanuk, Gang Bapak Sarhawi, RT 1, RW 06', 90000, 'PAID'),
(5, 'Indomaret Candy Gummy ', 4, 'candra', 'Jl. Cibaduyut Lama', 34000, 'PAID'),
(6, 'Indomaret Candy Gummy ', 4, 'candra', 'Jl. Cibaduyut Lama', 34000, 'PAID'),
(7, 'Paramex Obat Sakit ', 4, 'vika', 'Cibedug', 11200, 'PAID'),
(8, 'Minute Maid Juice', 5, 'vika', 'Cibedug', 71000, 'UNPAID');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(3) NOT NULL,
  `prd-nama` varchar(255) NOT NULL,
  `prd-harga` int(20) NOT NULL,
  `prd-kategori` varchar(255) NOT NULL,
  `prd-thumb` varchar(255) NOT NULL,
  `prd-details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `prd-nama`, `prd-harga`, `prd-kategori`, `prd-thumb`, `prd-details`) VALUES
(24, 'Indomie Mi Instan ', 3100, 'Makanan', '6658b29c87f0f.jpg', 'Mi goreng yang lezat dan nikmat, terbuat dari bahan berkualitas dan rempah rempah terbaik.'),
(25, 'Telur Ayam Omega 3', 2890, 'Makanan', '6658b73c270e6.jpg', 'Membantu perkembangan otak. Menjaga kesehatan jantung dan peredaran darah. Mencegah penyakit tua/pikun.'),
(26, 'Indomaret Instant Cup', 7900, 'Makanan', '6658b798b4e22.jpg', 'Indomaret mi instant ala jepang rasa ayam pedas, terbuat dari bahan berkualitas. Mudah dan praktis.'),
(27, 'Indomaret Emping Jagung ', 8500, 'Makanan', '6658b7cf0f60f.jpg', 'Cemilan tradisional emping jagung dengan bahan bahan pilihan.'),
(28, 'Roti Tawar Jumbo ', 18000, 'Makanan', '6658b8131c8d0.jpg', 'Roti Tawar Special dengan isi 15 slice diperkaya dengan Vitamin B1, B2,B12 &amp; Mineral Zn. '),
(29, 'Indomaret Candy Gummy ', 8500, 'Makanan', '6658b88e6499c.jpg', 'Permen lunak dengan rasa nano-nano. Manis asam segar alami.'),
(30, 'Indomaret Almond Milk ', 17500, 'Makanan', '6658b8f618e3a.jpg', 'Susu dengan rasa kacang almond segar. Cocok untuk menemani siangmu. Buat harimu lebih berwarna'),
(31, 'Lotte Choco Pie Marsmallow ', 8000, 'Makanan', '6658b91d2b8f8.jpg', 'Lotte choco pie, Soft cake dengan lapis coklat dan isi marshmallow'),
(32, 'Tango Drink Italian ', 6500, 'Minuman', '6658bced2656e.jpg', 'Minuman cokelat yang terbuat dari fresh milk dan memiliki kekentalan khas Italia yang dapat mengembalikan mood kamu dan berfungsi sebagai Liquid Snack.'),
(33, 'Frisian Flag Susu', 6500, 'Minuman', '6658bd201f55e.jpg', 'Minuman cokelat yang terbuat dari fresh milk dan memiliki kekentalan khas Italia yang dapat mengembalikan mood kamu dan berfungsi sebagai Liquid Snack.'),
(34, 'Ultra Mimi Susu', 3900, 'Minuman', '6658bd5c1170c.jpg', 'Ultra mimi dibuat dari susu cair segar berkualitas dengan berbagai pilihan rasa yang lezat dan istimewa. Ultra mimi mengandung kalsium susu dan fosfor'),
(35, 'Indomaret Air Minum ', 19900, 'Minuman', '6659a7e7711d4.jpg', 'Air mineral dengan kemurnian sangat terjaga.'),
(36, 'Cap Badak Larutan ', 8000, 'Minuman', '6659a85b465cd.jpg', 'Mengobati sariawan, panas dalam, sakit tenggorokan, susah buang air besar.'),
(37, 'Minute Maid Juice', 14200, 'Minuman', '6659a894bb6fd.jpg', 'Mengobati sariawan, panas dalam, sakit tenggorokan, susah buang air besar.'),
(38, 'Sangobion Obat ', 23300, 'Kesehatan', '6659a9217b335.jpg', 'Atasi Anemia penuh dengan semangat'),
(39, 'Sakatonik Abc ', 21600, 'Kesehatan', '6659ac85eff36.jpg', 'Multivitamin anak usia 4-12 tahun dgn kandungan vitamin dasar lengkap A, B kompleks, C, D dan E.'),
(41, 'Mylanta Obat Sakit ', 9700, 'Kesehatan', '6659ad10820b0.jpg', 'Kombinasi aluminium hidroksida dan magnesium hidroksida merupakan antasida yang bekerja menetralkan asam lambung.'),
(42, 'Kalpanax K Krim ', 19300, 'Kesehatan', '6659ad3eb2092.jpg', 'Dioleskan pada kulit yang terkena penyakit jamur, 2x sehari'),
(43, 'Sido Muncul Jamu ', 25000, 'Kesehatan', '6659ad640e0f3.jpg', 'Sido muncul obat herbal cair untuk mengatasi masuk angin bagi penderita diabetes.'),
(44, 'Paramex Obat Sakit ', 2800, 'Kesehatan', '6659adcedac4d.jpg', 'Paramex obat sakit kepala (4) strip');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`) VALUES
(6, 'candra', '$2y$10$Ycx9a5CakuW3yGr0oemHIO/qEPVQfg2/hKVu/UPEuASV5HfZONFIS', 'candrasetiadev@gmail.com'),
(7, 'fazli', '$2y$10$cWvvK8npTMzuuZb9HksVjOY4WnJsmgpLMox06A6g8xda2eS1V5gva', 'fazlidev@gmail.com'),
(8, 'vika', '$2y$10$kfjebCMFrDTQFmf9flCk6uIXaRKnaA8tBTIjNFATGNz.J5OJR2id.', 'vikadev@gmail.com'),
(9, 'adit', '$2y$10$csv1G35D6pSzM1rehVMfuuP0ya8DKgPAfHjOZEH9Fstgh5PmPTNmm', 'aditdev@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adm-id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat-id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ord-id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `adm-id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat-id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ord-id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
