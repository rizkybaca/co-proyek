-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2021 pada 14.05
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_co`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `name_c` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_card` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `business_license` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id`, `username`, `password`, `name_c`, `address`, `phone_number`, `email`, `join_date`, `id_card`, `profile_picture`, `business_license`) VALUES
(35, 'wawa', 'wawa1', 'Wang Yanti', 'Jl. Gejayan', '342134124', 'srgs@a', '2021-05-26 22:50:58', '491564446_MBAK.jpeg', '1860528316_MBAK.jpeg', '283404967_MBAK.jpeg'),
(36, 'sasa', 'sasa1', 'Sasa bukan Bumbu', 'Jl. Magelang', '0984420', 'akunsasa@yahoo.co.id', '2021-05-26 22:53:14', '546427925_alip.jpg', '1959501154_alip.jpg', '982498480_alip.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `email` varchar(20) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `join_date`, `email`, `phone_number`) VALUES
(17, 'nana', 'nana1', 'Fatonah', '2021-05-26 23:01:07', 'nana@yahoo.ac.id', '1324934');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `cont` int(11) NOT NULL,
  `notes` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id`, `id_order`, `id_product`, `cont`, `notes`) VALUES
(112, 100, 13, 11, 'ini order'),
(113, 100, 14, 5, 'ini order'),
(114, 101, 16, 1, 'ini order'),
(115, 102, 13, 1, 'ini order'),
(116, 103, 13, 1, 'ini order'),
(117, 104, 15, 1, 'ini order'),
(118, 105, 15, 1, 'ini order'),
(119, 107, 15, 1, 'ini order'),
(120, 108, 13, 50, 'ini order'),
(121, 109, 13, 4, 'ini order'),
(122, 109, 15, 8, 'ini order'),
(123, 110, 13, 5, 'ini order'),
(124, 110, 14, 7, 'ini order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_o` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `total` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `status` enum('bb','sb','ex','cc') NOT NULL,
  `id_cashier` int(11) NOT NULL,
  `req` enum('pd','rp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `date_o`, `total`, `id_customer`, `status`, `id_cashier`, `req`) VALUES
(100, '2021-05-26 23:44:46', 170000, 17, 'cc', 0, 'rp'),
(101, '2021-05-27 00:30:55', 15000, 17, 'ex', 9, 'rp'),
(102, '2021-05-28 14:15:34', 10000, 17, 'cc', 0, 'rp'),
(103, '2021-06-01 02:16:48', 10000, 17, 'sb', 9, 'rp'),
(104, '2021-06-01 00:56:54', 8000, 17, 'cc', 0, 'rp'),
(105, '2021-06-01 01:19:10', 8000, 17, 'cc', 0, 'rp'),
(106, '2021-06-01 01:24:49', 0, 17, 'cc', 0, 'rp'),
(107, '2021-06-01 02:16:54', 8000, 17, 'sb', 9, 'rp'),
(108, '2021-06-01 02:17:00', 500000, 17, 'sb', 9, 'rp'),
(109, '2021-06-01 11:47:40', 104000, 17, 'bb', 0, 'rp'),
(110, '2021-06-01 13:06:37', 134000, 17, 'cc', 0, 'rp');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id_p` int(11) NOT NULL,
  `types` enum('foods','drinks','snacks') NOT NULL,
  `name_p` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `stocks` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `id_store` int(11) NOT NULL,
  `status` enum('ready','empty') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id_p`, `types`, `name_p`, `price`, `stocks`, `image`, `id_store`, `status`) VALUES
(13, 'foods', 'Nasi Uduk', 10000, 14, '1149205618_nasiuduk@.jpg', 23, 'ready'),
(14, 'foods', 'Pamer 7', 12000, 85, '1190199591_pamer7@.jpg', 23, 'ready'),
(15, 'foods', 'Panas 1', 8000, 89, '1773246860_panas1@.jpg', 23, 'ready'),
(16, 'foods', 'Panas Spesial Medium', 15000, 99, '1157864661_panasspesialmedium@.jpg', 23, 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servant`
--

CREATE TABLE `servant` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role` enum('product_admin','cashier') NOT NULL,
  `id_store_v` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servant`
--

INSERT INTO `servant` (`id`, `username`, `password`, `name`, `join_date`, `role`, `id_store_v`) VALUES
(8, 'fafa', 'fafa1', 'Farah anaknya pak mail', '2021-05-26 22:56:23', 'product_admin', 23),
(9, 'kaka', 'kaka1', 'Kiko bin kaka', '2021-05-26 22:57:11', 'cashier', 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone_number` varchar(13) NOT NULL,
  `status` enum('active','deactive') NOT NULL,
  `id_client` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date_c` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `phone_number`, `status`, `id_client`, `image`, `date_c`) VALUES
(23, 'Mc Donalds', 'Jl. Prof. Soepomo', '12241124', 'active', 35, '575210651_mcd@.jpg', '2021-05-26 22:51:50'),
(24, 'Kentucky Fried Chicken', 'Jl. Glagahsari', '46342341', 'active', 35, '427553699_kfc@.jpg', '2021-05-26 22:54:38'),
(25, 'Starbucks', 'Jl. Veteran', '6567475411', 'active', 36, '1414398155_starbucks@.jpg', '2021-05-26 22:55:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `super_user`
--

CREATE TABLE `super_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(12) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `super_user`
--

INSERT INTO `super_user` (`id`, `username`, `password`, `name`) VALUES
(1, 'rizky', 'rizky1!', 'Rizky Nur nih');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cashier` (`id_cashier`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `id_store` (`id_store`);

--
-- Indeks untuk tabel `servant`
--
ALTER TABLE `servant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_store_v` (`id_store_v`);

--
-- Indeks untuk tabel `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Indeks untuk tabel `super_user`
--
ALTER TABLE `super_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `servant`
--
ALTER TABLE `servant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `super_user`
--
ALTER TABLE `super_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `detail_order_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id_p`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `detail_order_ibfk_3` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_store`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `servant`
--
ALTER TABLE `servant`
  ADD CONSTRAINT `servant_ibfk_1` FOREIGN KEY (`id_store_v`) REFERENCES `store` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `store`
--
ALTER TABLE `store`
  ADD CONSTRAINT `store_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
