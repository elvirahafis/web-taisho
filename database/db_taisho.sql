-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2023 at 05:03 PM
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
-- Database: `db_taisho`
--

-- --------------------------------------------------------

--
-- Table structure for table `outlet`
--

CREATE TABLE `outlet` (
  `Kode_Outlet` varchar(100) NOT NULL,
  `Nama_outlet` varchar(500) NOT NULL,
  `NPWP` varchar(255) NOT NULL,
  `Alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `outlet`
--

INSERT INTO `outlet` (`Kode_Outlet`, `Nama_outlet`, `NPWP`, `Alamat`) VALUES
('OUTLET0000123', 'Apotek Alam Sehat 18', '011/2.25/31.73.06/-1.779.3/XI/201665', 'Jl. Peta Selatan Blok D No. 1, Kel. Kalideres, Kec. Kalideresss'),
('OUTLET00002', 'Apotek Alip', '014/2.25/31.73.06/-1.779.3/XII/2016', 'Jl. Mirinda Dalam Blok C4 No. 06, Kel. Tegal Alur, Kec. Kalideres'),
('OUTLET00003', 'Apotek Aneka Farma', '007/2.30.1/31.73.06/1.779.3/IX/2015', 'Citra 3b Ext, Kel. Pegadungan, Kec. Kalideres');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `Kode_Barang` varchar(100) NOT NULL,
  `Nama_Barang` varchar(500) NOT NULL,
  `Klasifikasi` varchar(100) NOT NULL,
  `UOM` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`Kode_Barang`, `Nama_Barang`, `Klasifikasi`, `UOM`) VALUES
('PROD001', 'COUNTERPAIN PIROXICAM 25 GR', 'OTC', 'TUB'),
('PROD002', 'COUNTERPAIN COOL 30 GR', 'COUNTERPAIN COOL 30 GR', 'TUB'),
('PROD003', 'COUNTERPAIN COOL 60 GR', 'OTC', 'TUB'),
('PROD004', 'COUNTERPAIN CREAM 30 GR', 'OTC', 'TUB'),
('PROD005', 'COUNTERPAIN CREAM 60 GR', 'OTC', 'TUB'),
('PROD006', 'KENALOG IN ORABASE 5 GR', 'ETH', 'TUB'),
('PROD008', 'MYCOSTATIN OS 12 ML', 'ETH', 'TUB'),
('PROD009', 'MYCOSTATIN OS 30 ML', 'ETH', 'TUB'),
('PROD010', 'TEMPRA FORTE 60 ML ORANGE', 'OTC', 'BOT'),
('PROD011', 'TEMPRA SYRUP 30 ML', 'OTC', 'BOT'),
('PROD012', 'TEMPRA SYRUP 100 ML', 'OTC', 'BOT'),
('PROD013', 'TEMPRA SYRUP 60 ML', 'OTC', 'BOT'),
('PROD014', 'TEMPRA DROPS 15 ML', 'OTC', 'BOT'),
('PROD015', 'MYCO-Z OINTMENT 10 GR', 'ETH', 'TUB'),
('PROD016', 'DRAMAMINE TAB 50 MG 100', 'ETH', 'TAB'),
('PROD017', 'ENGRAN FOOD 25X4 S', 'ETH', 'TAB'),
('PROD018', 'KENACORT TAB 4 MG 100', 'ETH', 'TUB'),
('PROD019', 'THERAGRAN-M 100S', 'Vitamin', 'TUB');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `No_dokumen_masuk` varchar(100) NOT NULL,
  `Tanggal_transaksi` date NOT NULL,
  `Nomor_PO` varchar(100) NOT NULL,
  `Kode_barang` varchar(200) NOT NULL,
  `Nama_barang` varchar(200) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`No_dokumen_masuk`, `Tanggal_transaksi`, `Nomor_PO`, `Kode_barang`, `Nama_barang`, `Qty`, `Harga_beli`) VALUES
('P0OA123', '2023-12-09', 'P9IE', 'AB0001', 'AB0001', 100, 12000000),
('POSFIERG', '2023-12-20', 'SGERG', 'SSR', 'Amfetamin', 123, 1200000),
('reer', '2023-12-27', 'dfgdf', 'ddf', 'df', 3, 12333),
('WER3F', '2023-12-20', 'WEFWE', 'WEFWE', 'WEFWER', 34, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `No_dokumen_keluar` varchar(11) NOT NULL,
  `No_dokumen_masuk` varchar(100) NOT NULL,
  `Tanggal_transaksi` date NOT NULL,
  `Kode_barang` varchar(100) NOT NULL,
  `Nama_barang` varchar(100) NOT NULL,
  `Kode_outlet` varchar(100) NOT NULL,
  `Nama_outlet` varchar(100) NOT NULL,
  `Qty` int(11) NOT NULL,
  `Harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`No_dokumen_keluar`, `No_dokumen_masuk`, `Tanggal_transaksi`, `Kode_barang`, `Nama_barang`, `Kode_outlet`, `Nama_outlet`, `Qty`, `Harga_jual`) VALUES
('dsdf', 'POSFIERG', '2023-12-23', 'asdas', 'dasd', 'asdas', 'asdas', 3, 0),
('SFGRGT', 'P0OA123', '2023-12-21', 'WE', 'WEW', 'WE', 'WE', 34, 123),
('SFR', 'WER3F', '2023-12-15', 'DWED', 'WEDEW', 'WEDE', 'WED', 12, 12000),
('SVF', 'POSFIERG', '2023-12-13', 'DC', 'DSCD', 'DC', 'SDC', 340, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_Id` int(50) NOT NULL,
  `Fullname` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_Id`, `Fullname`, `password`) VALUES
(4, 'admin@admin.com', 'admin@cishopp'),
(5, 'admin1@admin.com', 'admin@cishop'),
(6, 'member@member.com', 'member@cishop'),
(7, 'Jaemin NCT', 'Jaemin NCT'),
(8, 'Hechan NCT', 'Hechan NCT'),
(9, 'elvirahafis', 'elvirahafis'),
(10, 'Elvira Hafis', 'sdfsd'),
(11, 'Budi', 'Budi'),
(13, 'Elvira123', 'elvira123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`Kode_Outlet`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`Kode_Barang`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`No_dokumen_masuk`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`No_dokumen_keluar`),
  ADD KEY `sales_fk2` (`No_dokumen_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_Id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_fk2` FOREIGN KEY (`No_dokumen_masuk`) REFERENCES `purchase` (`No_dokumen_masuk`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
