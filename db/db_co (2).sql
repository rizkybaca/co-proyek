-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Bulan Mei 2021 pada 09.04
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
  `id_card` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `business_license` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `client`
--

INSERT INTO `client` (`id`, `username`, `password`, `name_c`, `address`, `phone_number`, `email`, `id_card`, `profile_picture`, `business_license`) VALUES
(32, 'mama', 'mama1', 'mama', 'segsdg', '436', 'xdgbsd@1', '827649583_bami.jpg', '243672154_MBAK.jpeg', '418684420_alip.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customer`
--

INSERT INTO `customer` (`id`, `username`, `password`, `name`, `join_date`, `email`, `phone_number`) VALUES
(16, 'lala', 'lala1', 'lala cuy', 'ini tanggal', 'lala@gmail.com', '43634634');

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
(34, 23, 12, 1, 'ini order'),
(35, 24, 12, 2, 'ini order');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `date_o` varchar(100) NOT NULL,
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
(23, 'ini tanggal', 12000, 16, 'bb', 0, 'rp'),
(24, 'ini tanggal', 24000, 16, 'cc', 0, 'rp');

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
(12, 'snacks', 'french fries', 12000, 0, '1098116265_frenchfrise@.jpg', 22, 'ready');

-- --------------------------------------------------------

--
-- Struktur dari tabel `servant`
--

CREATE TABLE `servant` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(8) NOT NULL,
  `name` varchar(50) NOT NULL,
  `join_date` varchar(100) NOT NULL,
  `role` enum('product_admin','cashier') NOT NULL,
  `id_store_v` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `servant`
--

INSERT INTO `servant` (`id`, `username`, `password`, `name`, `join_date`, `role`, `id_store_v`) VALUES
(6, 'fafa', 'fafa1', 'fafa aja lah', 'segsd', 'product_admin', 22),
(7, 'kaka', 'kaka1', 'kaka', 'drfhdrg', 'cashier', 22);

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
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `name`, `address`, `phone_number`, `status`, `id_client`, `image`) VALUES
(22, 'wang', 'fafa', '4634', 'active', 32, '1945494528_mcd@.jpg');

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
(1, 'rizky', 'rizky1!', 'rizky nur');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `servant`
--
ALTER TABLE `servant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
