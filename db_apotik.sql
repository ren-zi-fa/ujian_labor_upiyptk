-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2025 at 02:30 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_apotik`
--

-- --------------------------------------------------------

--
-- Table structure for table `apotik_obat`
--

CREATE TABLE `apotik_obat` (
  `kode_obat` varchar(20) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `jenis_obat` varchar(100) NOT NULL,
  `harga_obat` double NOT NULL,
  `stok_obat` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apotik_obat`
--

INSERT INTO `apotik_obat` (`kode_obat`, `nama_obat`, `jenis_obat`, `harga_obat`, `stok_obat`, `id`) VALUES
('Ipsa laboris incidi', 'Beatae deserunt aspe', 'obat sedang', 31, 72, 21),
('Voluptates nisi esse', 'Qui ipsum voluptatu', 'obat ringan', 99, 57, 22),
('Velit facilis id fu', 'Qui reiciendis aut q', 'obat sedang', 73, 46, 23),
('Nisi perspiciatis q', 'Odit sed autem velit', 'obat sedang', 82, 4, 24),
('Non est libero ex vo', 'Qui rerum non conseq', 'obat ringan', 31, 13, 30),
('Quis sit sit dolore', 'Dignissimos id minus', 'obat sedang', 49, 54, 31),
('Qui animi occaecat ', 'Enim voluptatum maxi', 'Obat Ringan', 5, 19, 33),
('Quisquam quam corrup', 'Et temporibus volupt', 'obat keras', 82, 324, 37),
('Ipsam cumque volupta', 'Maiores est voluptat', 'obat sedang', 39, 33, 39);

-- --------------------------------------------------------

--
-- Table structure for table `apotik_transaksi`
--

CREATE TABLE `apotik_transaksi` (
  `id_transaksi` varchar(100) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `kode_obat` varchar(100) NOT NULL,
  `jumlah_beli` int NOT NULL,
  `total` double NOT NULL,
  `diskon` double NOT NULL,
  `total_bayar` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `apotik_transaksi`
--

INSERT INTO `apotik_transaksi` (`id_transaksi`, `tgl_transaksi`, `kode_obat`, `jumlah_beli`, `total`, `diskon`, `total_bayar`) VALUES
('AC-23', '2025-08-14', 'AS12', 12, 324, 12, 20000000),
('Asas', '2025-08-14', 'asdsad ', 1212, 121, 234, 324),
('Nulla nostrud deseru', '2004-02-25', 'OBT003', 74, 2812, 562.4, 2249.6),
('Nulla nostrud deseru', '2004-02-25', 'OBT003', 74, 2812, 562.4, 2249.6),
('Mollit dolorem aute ', '1992-08-22', 'OBT002', 10, 910, 136.5, 773.5),
('Mollit dolorem aute ', '1992-08-22', 'OBT002', 10, 910, 136.5, 773.5),
('Unde quae dolores se', '1993-04-15', 'OBT001', 27, 52, 52, 51),
('Unde quae dolores se', '1993-04-15', 'OBT001', 27, 52, 52, 51),
('Qui nulla distinctio', '2009-07-10', 'OBT001', 1, 78, 7.8, 70.2),
('Qui nulla distinctio', '2009-07-10', 'OBT001', 1, 78, 7.8, 70.2),
('Quae consequatur cup', '2015-05-10', 'OBT003', 15, 37, 89, 100),
('Quae consequatur cup', '2015-05-10', 'OBT003', 15, 37, 89, 100),
('Qui nostrum officia ', '2019-12-23', 'OBT001', 93, 78, 35, 7),
('Qui nostrum officia ', '2019-12-23', 'OBT001', 93, 78, 35, 7),
('Quisquam rerum incid', '2006-02-17', 'OBT002', 69, 18, 26, 37),
('Quisquam rerum incid', '2006-02-17', 'OBT002', 69, 18, 26, 37),
('Repellendus Tempor ', '2013-05-04', 'OBT003', 80, 9, 81, 34),
('Repellendus Tempor ', '2013-05-04', 'OBT003', 80, 9, 81, 34),
('Id consequatur dele', '1986-12-16', 'OBT002', 26, 48, 62, 27),
('Id consequatur dele', '1986-12-16', 'OBT002', 26, 48, 62, 27),
('Consequatur dolor sa', '1980-06-11', 'OBT003', 7, 21, 4.2, 16.8),
('Consequatur dolor sa', '1980-06-11', 'OBT003', 7, 21, 4.2, 16.8),
('Officiis sed facilis', '2015-07-23', 'OBT003', 60, 1380, 276, 1104),
('Officiis sed facilis', '2015-07-23', 'OBT003', 60, 1380, 276, 1104),
('Eu est aut deleniti ', '1995-03-28', 'OBT002', 79, 27, 2, 42),
('Eu est aut deleniti ', '1995-03-28', 'OBT002', 79, 27, 2, 42),
('Commodo nostrud quis', '1994-08-24', 'OBT001', 61, 30, 57, 34),
('Commodo nostrud quis', '1994-08-24', 'OBT001', 61, 30, 57, 34),
('Voluptates modi even', '2014-11-28', 'OBT001', 48, 63, 23, 94),
('Voluptates modi even', '2014-11-28', 'OBT001', 48, 63, 23, 94),
('Quibusdam consequunt', '2017-12-14', 'OBT002', 26, 6, 49, 90),
('Quibusdam consequunt', '2017-12-14', 'OBT002', 26, 6, 49, 90),
('Accusamus dolorum la', '2006-02-03', 'OBT002', 94, 33, 57, 64),
('Accusamus dolorum la', '2006-02-03', 'OBT002', 94, 33, 57, 64),
('Aut natus ut expedit', '1994-12-03', 'OBT001', 8, 28, 2, 81),
('Rerum incidunt mole', '1976-01-08', 'OBT001', 55, 770, 77, 693),
('Exercitation archite', '2024-01-12', 'OBT001', 53, 742, 74.19999999999999, 667.8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apotik_obat`
--
ALTER TABLE `apotik_obat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apotik_obat`
--
ALTER TABLE `apotik_obat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
