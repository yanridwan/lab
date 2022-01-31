-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 08:05 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `analisis`
--

CREATE TABLE `analisis` (
  `analisis_id` int(11) NOT NULL,
  `development_id` int(11) NOT NULL,
  `analisis_tanggal_mulai` datetime(6) NOT NULL,
  `analisis_tanggal_selesai` datetime(6) NOT NULL,
  `analisis_analisa` varchar(255) NOT NULL,
  `analisis_hasil` varchar(255) NOT NULL,
  `analisis_research` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis`
--

INSERT INTO `analisis` (`analisis_id`, `development_id`, `analisis_tanggal_mulai`, `analisis_tanggal_selesai`, `analisis_analisa`, `analisis_hasil`, `analisis_research`) VALUES
(1, 1, '2022-01-27 00:00:00.000000', '2022-01-28 00:00:00.000000', '1', '2', ''),
(2, 1, '2022-01-27 00:00:00.000000', '2022-01-28 00:00:00.000000', '2', '2', ''),
(3, 1, '2022-01-27 00:00:00.000000', '2022-01-29 00:00:00.000000', '111', '222', ''),
(4, 11, '2022-01-27 00:00:00.000000', '2022-01-27 00:00:00.000000', 'di coba pada tangan', 'merah', ''),
(5, 11, '2022-01-28 00:00:00.000000', '2022-01-28 00:00:00.000000', 'di coba di muka', 'merah', ''),
(6, 1, '2022-01-27 00:00:00.000000', '2022-01-27 00:00:00.000000', '12', 'AA', 'Nagatech'),
(7, 1, '2022-01-27 00:00:00.000000', '2022-01-28 00:00:00.000000', '1', '12', 'Nagatech'),
(8, 1, '2022-01-27 00:00:00.000000', '2022-01-27 00:00:00.000000', '2', '2', 'Nagatech'),
(9, 12, '2022-01-06 00:00:00.000000', '2022-01-20 00:00:00.000000', '1', '1', 'Nagatech'),
(10, 1, '1970-01-01 07:00:00.000000', '0000-00-00 00:00:00.000000', '1', 'AA', 'Nagatech'),
(11, 1, '2022-01-27 00:00:00.000000', '2022-01-27 00:00:00.000000', '1', 'AA', 'Nagatech'),
(12, 1, '1970-01-01 07:00:00.000000', '0000-00-00 00:00:00.000000', '1', '1', 'Nagatech'),
(13, 1, '2022-01-06 00:00:00.000000', '2022-01-12 00:00:00.000000', '1', '1', 'Nagatech'),
(14, 12, '1970-01-01 07:00:00.000000', '0000-00-00 00:00:00.000000', '1', '1234', 'Nagatech'),
(15, 12, '2022-01-27 00:00:00.000000', '0000-00-00 00:00:00.000000', '1', '1234', 'Nagatech'),
(16, 12, '2022-01-05 00:00:00.000000', '0000-00-00 00:00:00.000000', '1', '1234', 'Nagatech'),
(17, 1, '2022-01-04 00:00:00.000000', '2022-01-20 00:00:00.000000', '1', '67854', 'Nagatech'),
(18, 1, '2021-12-29 00:00:00.000000', '0000-00-00 00:00:00.000000', '1', '1', 'Nagatech'),
(19, 1, '2022-01-27 00:00:00.000000', '0000-00-00 00:00:00.000000', 'ter', 'tre', 'Nagatech'),
(20, 1, '2022-01-27 00:00:00.000000', '2022-01-27 00:00:00.000000', '1', '1', 'Nagatech'),
(21, 1, '1970-01-01 00:00:00.000000', '2022-01-28 00:00:00.000000', '2', '2', 'Nagatech'),
(22, 1, '2022-01-27 00:00:00.000000', '2022-01-27 00:00:00.000000', 'ter', 'ter', 'Nagatech'),
(23, 1, '2022-01-28 00:00:00.000000', '2022-01-28 00:00:00.000000', '1', '12345', 'Nagatech'),
(24, 10, '2022-01-28 00:00:00.000000', '2022-01-28 00:00:00.000000', 'Tekstur', 'Mencair', 'Nagatech'),
(25, 1, '2022-01-28 00:00:00.000000', '2022-01-28 00:00:00.000000', '2', 'AAA', 'Nagatech'),
(26, 10, '2022-01-28 00:00:00.000000', '2022-01-28 00:00:00.000000', '111', '222', 'Nagatech');

-- --------------------------------------------------------

--
-- Table structure for table `analisis_dokumen`
--

CREATE TABLE `analisis_dokumen` (
  `analisis_dokumen_id` int(11) NOT NULL,
  `analisis_id` int(11) NOT NULL,
  `development_id` int(11) NOT NULL,
  `analisis_dokumen_dokumen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `analisis_dokumen`
--

INSERT INTO `analisis_dokumen` (`analisis_dokumen_id`, `analisis_id`, `development_id`, `analisis_dokumen_dokumen`) VALUES
(1, 25, 1, 'Laboratorium_Development_(1)14.pdf'),
(2, 26, 10, 'Laboratorium_Development_(1)15.pdf'),
(3, 26, 10, 'Laboratorium_Development_(1)16.pdf'),
(4, 26, 10, 'Laboratorium_Development_(1)17.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barang_nama` varchar(255) NOT NULL,
  `barang_supplier` varchar(255) NOT NULL,
  `barang_kode` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `barang_nama`, `barang_supplier`, `barang_kode`) VALUES
(1, 'Air', 'Djenggot', 'KI-102'),
(2, 'Air', 'RoseBrand', 'BSN - 101'),
(3, 'Air', 'KIKI', 'KI-102'),
(4, 'Sorbitol', 'AAA', 'Sor-111'),
(5, 'Air', 'Aqua', 'AR-1001'),
(6, 'Teh', 'Sosro', 'TH-1001'),
(7, 'Gula', 'Gulaku', 'GL-1001'),
(8, 'Teh', 'Kotak', 'TH-1002'),
(9, 'Sirup', 'ABC', 'SR-1001'),
(10, 'Kopi', 'Kapal tank', 'KP-1001');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `barang_keluar_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `revisi_id` int(11) NOT NULL,
  `development_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_keluar_qty` float NOT NULL,
  `barang_keluar_satuan` varchar(45) NOT NULL,
  `barang_keluar_tanggal` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`barang_keluar_id`, `form_id`, `revisi_id`, `development_id`, `barang_id`, `barang_keluar_qty`, `barang_keluar_satuan`, `barang_keluar_tanggal`) VALUES
(49, 0, 0, 6, 4, 2, 'gram', '2022-01-26 04:24:04.803613'),
(50, 0, 0, 6, 4, 5, 'gram', '2022-01-26 04:26:36.807936'),
(51, 0, 0, 7, 2, 2, 'gram', '2022-01-26 04:29:27.914958'),
(52, 0, 0, 7, 4, 5, 'gram', '2022-01-26 04:29:28.053525'),
(53, 0, 0, 8, 2, 2, 'gram', '2022-01-26 06:49:06.763169'),
(54, 0, 0, 1, 1, 2, 'gram', '2022-01-26 07:07:21.625524'),
(55, 0, 0, 3, 4, 2, 'gram', '2022-01-26 07:08:35.330074'),
(56, 0, 0, 5, 4, 2, 'gram', '2022-01-26 07:09:58.253397'),
(57, 0, 0, 9, 5, 5, 'gram', '2022-01-26 08:26:31.979465'),
(58, 34, 0, 0, 4, 2, 'gram', '2022-01-26 08:43:16.817312'),
(59, 34, 0, 0, 6, 2, 'gram', '2022-01-26 08:43:17.057190'),
(60, 36, 0, 0, 5, 100, 'gram', '2022-01-26 09:30:22.240797'),
(61, 36, 0, 0, 7, 10, 'gram', '2022-01-26 09:30:22.458387'),
(62, 36, 0, 0, 10, 10, 'gram', '2022-01-26 09:30:22.536732'),
(63, 36, 54, 0, 5, 100, 'gram', '2022-01-26 09:50:29.062867'),
(64, 36, 54, 0, 7, 50, 'gram', '2022-01-26 09:50:29.226582'),
(65, 36, 54, 0, 10, 10, 'gram', '2022-01-26 09:50:29.282354'),
(66, 0, 0, 10, 3, 2, 'gram', '2022-01-27 01:47:48.225627'),
(67, 0, 0, 11, 5, 100, 'ml', '2022-01-27 03:42:57.436999'),
(68, 0, 0, 11, 7, 50, 'ml', '2022-01-27 03:42:57.776148'),
(69, 0, 0, 11, 10, 50, 'gram', '2022-01-27 03:42:57.976289'),
(70, 37, 0, 0, 1, 10000, 'gram', '2022-01-27 04:08:15.357575'),
(71, 37, 0, 0, 2, 10000, 'gram', '2022-01-27 04:08:15.416663'),
(72, 37, 0, 0, 5, 10000, 'gram', '2022-01-27 04:08:15.460410'),
(73, 37, 55, 0, 1, 100000, 'gram', '2022-01-27 04:10:30.530561'),
(74, 37, 55, 0, 2, 100000, 'gram', '2022-01-27 04:10:30.639400'),
(75, 37, 55, 0, 5, 100000, 'gram', '2022-01-27 04:10:30.684539'),
(76, 0, 0, 12, 1, 8, 'gram', '2022-01-27 07:28:46.349424'),
(77, 0, 0, 12, 6, 8, 'gram', '2022-01-27 07:28:46.581977'),
(78, 0, 0, 12, 7, 8, 'gram', '2022-01-27 07:28:46.614543'),
(79, 38, 0, 0, 8, 9, 'gram', '2022-01-27 08:48:23.046021'),
(80, 38, 56, 0, 2, 8, 'gram', '2022-01-27 08:50:01.749388'),
(81, 39, 0, 0, 2, 8, 'gram', '2022-01-27 09:09:35.188418'),
(82, 39, 0, 0, 3, 8, 'gram', '2022-01-27 09:09:35.269191'),
(83, 39, 57, 0, 2, 9, 'gram', '2022-01-27 09:29:05.767191'),
(84, 39, 58, 0, 2, 8, 'gram', '2022-01-27 09:33:25.405575'),
(85, 39, 59, 0, 3, 9, 'gram', '2022-01-27 09:37:23.189839'),
(86, 39, 60, 0, 3, 8, 'gram', '2022-01-27 09:58:58.878898'),
(87, 0, 0, 17, 2, 2, 'gram', '2022-01-28 02:52:10.409974');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `detailKomposisi` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE detail_komposisi SET detail_komposisi_qty = detail_komposisi_qty+NEW.barang_keluar_qty
WHERE form_id = NEW.form_id AND barang_id = NEW.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `detailRevisi` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE revisi_komposisi SET revisi_komposisi_qty = revisi_komposisi_qty+NEW.barang_keluar_qty
WHERE revisi_id = NEW.revisi_id AND form_id = NEW.form_id AND barang_id = NEW.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `developmentKomposisi` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE development_komposisi SET development_komposisi_qty = development_komposisi_qty+NEW.barang_keluar_qty
WHERE development_id = NEW.development_id AND barang_id = NEW.barang_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `penguranganGudang` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
UPDATE gudang SET gudang_qty = gudang_qty-NEW.barang_keluar_qty
WHERE barang_id = NEW.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `barang_masuk_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_masuk_qty` float NOT NULL,
  `barang_masuk_satuan` varchar(45) NOT NULL,
  `barang_masuk_tanggal` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`barang_masuk_id`, `barang_id`, `barang_masuk_qty`, `barang_masuk_satuan`, `barang_masuk_tanggal`) VALUES
(1, 2, 100, 'gram', '2022-01-20 02:45:29.846417'),
(2, 2, 100, 'ml', '2022-01-20 02:45:40.042126'),
(3, 1, 100, 'ml', '2022-01-20 02:45:51.314780'),
(4, 4, 50000, 'gram', '2022-01-20 02:47:30.040582'),
(5, 5, 10000, 'ml', '2022-01-24 06:15:01.346577'),
(6, 7, 100000, 'gram', '2022-01-24 06:15:17.162296'),
(7, 6, 100000, 'gram', '2022-01-24 06:15:29.528819'),
(8, 8, 1000000, 'gram', '2022-01-24 06:15:41.918152'),
(9, 9, 100000, 'ml', '2022-01-24 06:23:45.463361'),
(10, 10, 10000, 'gram', '2022-01-26 09:12:57.839104');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barangMasuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
UPDATE gudang SET gudang_qty = gudang_qty+NEW.barang_masuk_qty
WHERE barang_id = NEW.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `detail_komposisi`
--

CREATE TABLE `detail_komposisi` (
  `detail_komposisi_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `detail_komposisi_qty` float NOT NULL,
  `detail_komposisi_satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_komposisi`
--

INSERT INTO `detail_komposisi` (`detail_komposisi_id`, `form_id`, `barang_id`, `detail_komposisi_qty`, `detail_komposisi_satuan`) VALUES
(28, 20, 4, 10, 'gram'),
(29, 21, 4, 8, 'gram'),
(30, 22, 1, 104, ''),
(31, 23, 2, 0, ''),
(32, 24, 4, 4, ''),
(33, 25, 5, 1650, 'gram'),
(34, 25, 6, 252, 'gram'),
(35, 25, 7, 252, 'gram'),
(36, 26, 5, 1450, 'ml'),
(37, 26, 9, 50, 'ml'),
(38, 27, 1, 104, 'gram'),
(39, 27, 6, 202, 'gram'),
(40, 27, 7, 202, 'gram'),
(41, 28, 5, 1250, 'gram'),
(42, 28, 6, 152, 'gram'),
(43, 28, 7, 152, 'gram'),
(44, 31, 5, 200, 'gram'),
(45, 31, 6, 102, 'gram'),
(46, 31, 7, 102, 'gram'),
(49, 33, 1, 4, 'gram'),
(50, 34, 4, 2, 'gram'),
(51, 34, 6, 2, 'gram'),
(52, 36, 5, 200, 'gram'),
(53, 36, 7, 60, 'gram'),
(54, 36, 10, 20, 'gram'),
(55, 36, 1, 0, ''),
(56, 36, 4, 0, ''),
(57, 36, 7, 0, ''),
(58, 37, 1, 110000, 'gram'),
(59, 37, 2, 110000, 'gram'),
(60, 37, 5, 110000, 'gram'),
(61, 37, 3, 0, ''),
(62, 37, 5, 0, ''),
(63, 38, 8, 9, 'gram'),
(64, 39, 2, 25, 'gram'),
(65, 39, 3, 25, 'gram');

-- --------------------------------------------------------

--
-- Table structure for table `development`
--

CREATE TABLE `development` (
  `development_id` int(11) NOT NULL,
  `development_tanggal_masuk` datetime(6) NOT NULL,
  `development_tanggal_jadi` datetime(6) NOT NULL,
  `development_jenis_sample` varchar(45) NOT NULL,
  `development_developer` varchar(45) NOT NULL,
  `development_warna` varchar(255) NOT NULL,
  `development_aroma` varchar(255) NOT NULL,
  `development_tekstur` varchar(255) NOT NULL,
  `development_dokumen` varchar(255) NOT NULL,
  `development_manfaat` varchar(255) NOT NULL,
  `development_metodologi` varchar(255) NOT NULL,
  `development_gramasi` varchar(11) NOT NULL,
  `development_keterangan` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `development`
--

INSERT INTO `development` (`development_id`, `development_tanggal_masuk`, `development_tanggal_jadi`, `development_jenis_sample`, `development_developer`, `development_warna`, `development_aroma`, `development_tekstur`, `development_dokumen`, `development_manfaat`, `development_metodologi`, `development_gramasi`, `development_keterangan`, `status_id`) VALUES
(1, '2022-01-26 09:13:24.000000', '0000-00-00 00:00:00.000000', 'AAA', 'AAA', 'Merah', 'wangi', '-', '', '-', '-', '50gr', '-', 2),
(2, '2022-01-26 09:13:24.000000', '0000-00-00 00:00:00.000000', 'AAA', 'AAA', 'Merah', 'wangi', '-', '', '-', '-', '50gr', '-', 1),
(3, '2022-01-26 09:14:07.000000', '0000-00-00 00:00:00.000000', 'BBB', 'BBB', 'Hitam', 'Lavender', '-', '', '-', '-', '50gr', '-', 9),
(4, '2022-01-26 09:14:07.000000', '0000-00-00 00:00:00.000000', 'BBB', 'BBB', 'Hitam', 'Lavender', '-', '', '-', '-', '50gr', '-', 1),
(9, '2022-01-26 15:26:18.000000', '0000-00-00 00:00:00.000000', 'BBB', 'BBB', 'Ungu', 'Lavender', '-', '', '-', '-', '50gr', '-', 8),
(10, '2022-01-27 08:47:32.000000', '0000-00-00 00:00:00.000000', 'BBB', 'BBB', 'Hitam', 'Lavender', '-', '', '-', '-', '50gr', '-', 2),
(11, '2022-01-27 10:42:20.000000', '0000-00-00 00:00:00.000000', 'night cream', 'saya', 'putih', 'mawar', 'cream', '', 'night cream yang lebih mantab', '-1\r\n-2\r\n-3\r\n-4\r\n-5', '50', '-', 2),
(12, '2022-01-27 14:28:32.000000', '0000-00-00 00:00:00.000000', 'jamu', 'gameloft', 'coklat', 'wangi', 'cair', '', 'menyehatkan', '1\r\n2\r\n3\r\n4\r\n5\r\n', '500', '-', 2),
(13, '2022-01-27 15:17:45.000000', '0000-00-00 00:00:00.000000', 'AAA', 'BBB', 'Merah', 'Lavender', '-', '', '-', '-', '50gr', '-', 1),
(14, '2022-01-27 15:42:07.000000', '0000-00-00 00:00:00.000000', 'aaa', 'gameloft', 'Warna', 'Warna', 'a', '', 'a', 'a', 'a', 'a', 1),
(15, '2022-01-27 15:44:54.000000', '0000-00-00 00:00:00.000000', '11', '11', '11', '11', '11', '', '11', '11', '11', '11', 1),
(16, '2022-01-27 15:47:35.000000', '0000-00-00 00:00:00.000000', 'a', 'a', 'a', 'a', 'a', '', 'a', 'a', '50gr', 'a', 1),
(17, '2022-01-27 17:01:49.000000', '0000-00-00 00:00:00.000000', '1111111111', '1111111111', '11111111111', '1111111111', '111111111111', '', '1111111111', '111111111111', '11111111111', '111111111111', 8);

-- --------------------------------------------------------

--
-- Table structure for table `development_komposisi`
--

CREATE TABLE `development_komposisi` (
  `development_komposisi_id` int(11) NOT NULL,
  `development_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `development_komposisi_qty` float NOT NULL,
  `development_komposisi_satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `development_komposisi`
--

INSERT INTO `development_komposisi` (`development_komposisi_id`, `development_id`, `barang_id`, `development_komposisi_qty`, `development_komposisi_satuan`) VALUES
(1, 1, 1, 2, 'gram'),
(2, 3, 4, 2, 'gram'),
(8, 9, 5, 5, 'gram'),
(9, 10, 3, 2, 'gram'),
(10, 11, 5, 100, 'gram'),
(11, 11, 7, 50, 'gram'),
(12, 11, 10, 50, 'gram'),
(13, 12, 1, 8, 'gram'),
(14, 12, 6, 8, 'gram'),
(15, 12, 7, 8, 'gram'),
(16, 13, 3, 0, ''),
(17, 14, 1, 0, ''),
(18, 14, 2, 0, ''),
(19, 15, 1, 0, ''),
(20, 15, 2, 0, ''),
(21, 15, 3, 0, ''),
(22, 15, 5, 0, ''),
(23, 16, 3, 0, ''),
(24, 17, 2, 2, 'gram');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `form_id` int(11) NOT NULL,
  `form_tanggal` datetime NOT NULL,
  `form_nama_customer` varchar(45) NOT NULL,
  `form_permintaan_sample` varchar(255) NOT NULL,
  `form_marketing` varchar(45) NOT NULL,
  `form_hasil_akhir` varchar(45) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`form_id`, `form_tanggal`, `form_nama_customer`, `form_permintaan_sample`, `form_marketing`, `form_hasil_akhir`, `status_id`) VALUES
(20, '2022-01-24 10:36:11', 'Rini', 'Sleeping Mask Gel', 'Mas Deni', '', 2),
(21, '2022-01-24 10:48:44', 'Rini', 'Sleeping Mask Gel', 'Mas Deni', '', 6),
(22, '2022-01-24 11:32:31', 'Rini', 'Sleeping Mask Gel', 'Mas Deni', '', 2),
(23, '2022-01-24 11:48:50', 'Rini', 'Sleeping Mask Gel', 'Mas Deni', '', 2),
(24, '2022-01-24 11:50:33', 'Rini', 'Sleeping Mask Gel', 'Mas Deni', '', 2),
(25, '2022-01-24 13:01:56', 'ranu', 'teh manis', 'Mas Deni', '', 6),
(26, '2022-01-24 13:24:39', 'AGUS', 'sirup manis', 'Mas Deni', '', 6),
(27, '2022-01-24 15:20:24', 'Dragon ball', 'teh manis', 'Mas Deni', '', 2),
(28, '2022-01-24 15:27:47', 'aaaaaa', 'aaa', 'Mas Deni', '', 6),
(29, '2022-01-24 16:02:00', 'om deni', 'teh manis', 'Mas Deni', '', 1),
(30, '2022-01-24 16:02:01', 'om deni', 'teh manis', 'Mas Deni', '', 1),
(31, '2022-01-24 16:02:41', 'Dragon ball', 'sirup manis', 'Mas Deni', '', 6),
(32, '2022-01-24 20:25:57', 'Rini', 'Sleeping Mask Gel', 'Mas Deni', '', 5),
(33, '2022-01-24 20:27:58', 'Rini', 'Treatment', 'Mas Deni', '', 5),
(34, '2022-01-26 15:42:46', 'Rini', 'Sleeping Mask Gel', 'Mas Deni', '', 5),
(35, '2022-01-26 15:45:42', 'AAA', 'Treatment', 'Mas Deni', '', 1),
(36, '2022-01-26 16:23:03', 'ranu', 'kopi', 'Marketing', '', 2),
(37, '2022-01-27 11:07:23', 'Dragon ball', 'dragon ball', 'Nagatech', '', 2),
(38, '2022-01-27 15:47:31', 'a1', 'a1', 'Nagatech', '', 5),
(39, '2022-01-27 15:48:50', 'Rini', 'Treatment', 'Nagatech', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gudang`
--

CREATE TABLE `gudang` (
  `gudang_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `gudang_qty` float NOT NULL,
  `gudang_satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gudang`
--

INSERT INTO `gudang` (`gudang_id`, `barang_id`, `gudang_qty`, `gudang_satuan`) VALUES
(1, 2, -109851, 'gram'),
(2, 1, -110028, 'ml'),
(3, 4, 49960, 'gram'),
(4, 5, -101855, 'ml'),
(5, 7, 99680, 'gram'),
(6, 6, 99788, 'gram'),
(7, 8, 999991, 'gram'),
(8, 9, 99950, 'ml'),
(9, 10, 9930, 'gram');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_nama`) VALUES
(1, 'SuperSaiyan'),
(2, 'Gudang'),
(3, 'Marketing'),
(4, 'RnD - Sampling'),
(5, 'RnD - Development'),
(6, 'Rnd - Research'),
(7, 'Kepala RnD - Sampling'),
(8, 'Kepala RnD - Development'),
(9, 'Kepala Rnd - Research');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `pengiriman_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `revisi_id` int(11) NOT NULL,
  `pengiriman_resi` varchar(45) NOT NULL,
  `pengiriman_tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengiriman`
--

INSERT INTO `pengiriman` (`pengiriman_id`, `form_id`, `revisi_id`, `pengiriman_resi`, `pengiriman_tanggal`) VALUES
(1, 4, 0, '', '2022-01-20 02:56:14'),
(2, 4, 16, '', '2022-01-20 03:03:21'),
(3, 20, 0, '', '2022-01-24 03:40:19'),
(4, 21, 0, '', '2022-01-24 03:50:41'),
(5, 21, 39, '', '2022-01-24 03:55:46'),
(6, 21, 39, '', '2022-01-24 04:02:38'),
(7, 25, 0, 'diambil', '2022-01-24 06:12:16'),
(8, 25, 41, '', '2022-01-24 06:21:31'),
(9, 26, 0, '', '2022-01-24 06:26:48'),
(10, 26, 43, '', '2022-01-24 08:18:42'),
(11, 27, 0, '', '2022-01-24 08:21:49'),
(12, 28, 0, '', '2022-01-24 08:29:03'),
(13, 31, 0, '', '2022-01-24 09:04:19'),
(14, 31, 50, '', '2022-01-24 09:10:03'),
(15, 33, 0, '', '2022-01-25 08:24:32'),
(16, 34, 0, '', '2022-01-26 08:43:40'),
(17, 36, 0, 'jne (100192876464585)', '2022-01-26 09:32:38'),
(18, 37, 0, 'jnt ( 199345536)', '2022-01-27 04:08:51'),
(19, 37, 55, 'jnt (1098773628)', '2022-01-27 04:11:13'),
(20, 38, 0, '', '2022-01-27 08:49:27'),
(21, 38, 56, '', '2022-01-27 08:50:15'),
(22, 39, 0, '', '2022-01-27 09:09:47'),
(23, 39, 57, '', '2022-01-27 09:29:16'),
(24, 39, 58, '', '2022-01-27 09:35:02'),
(25, 39, 59, '', '2022-01-27 09:39:11'),
(26, 39, 0, '', '2022-01-27 09:41:40'),
(27, 39, 59, '', '2022-01-27 09:42:12'),
(28, 39, 59, '', '2022-01-27 09:43:15'),
(29, 39, 59, '', '2022-01-27 09:43:36'),
(30, 39, 59, '', '2022-01-27 09:43:57'),
(31, 39, 59, '', '2022-01-27 09:44:29'),
(32, 39, 59, '', '2022-01-27 09:45:06'),
(33, 39, 60, '', '2022-01-27 09:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `permintaan`
--

CREATE TABLE `permintaan` (
  `permintaan_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `permintaan_tanggal_masuk` datetime DEFAULT NULL,
  `permintaan_tanggal_jadi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `permintaan_warna` varchar(255) NOT NULL,
  `permintaan_aroma` varchar(255) NOT NULL,
  `permintaan_tekstur` text NOT NULL,
  `permintaan_manfaat` text NOT NULL,
  `permintaan_gramasi` varchar(11) NOT NULL,
  `permintaan_keterangan` varchar(255) NOT NULL,
  `permintaan_metodologi` varchar(255) NOT NULL,
  `permintaan_penanggung_jawab` varchar(255) NOT NULL,
  `permintaan_dokumen` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permintaan`
--

INSERT INTO `permintaan` (`permintaan_id`, `form_id`, `permintaan_tanggal_masuk`, `permintaan_tanggal_jadi`, `permintaan_warna`, `permintaan_aroma`, `permintaan_tekstur`, `permintaan_manfaat`, `permintaan_gramasi`, `permintaan_keterangan`, `permintaan_metodologi`, `permintaan_penanggung_jawab`, `permintaan_dokumen`, `status_id`) VALUES
(39, 20, '2022-01-24 10:36:11', '2022-01-24 03:40:19', 'Ungu', 'Lavender', 'Tekstur', 'Keterangan', '50gr', 'Keterangan', '-', 'Winda', '', 4),
(40, 21, '2022-01-24 10:48:44', '2022-01-24 03:50:41', 'Hitam', 'Wagni', 'Manfaat', 'Manfaat', '50gr', 'Manfaat', '-', 'Winda', '', 4),
(41, 22, '2022-01-24 11:32:31', '2022-01-24 04:46:19', 'Hitam', 'Pekat', 'Tekstur', 'Tekstur', '100gr', 'Tekstur', '-', 'Winda', '', 1),
(42, 23, '2022-01-24 11:48:50', '2022-01-24 04:49:30', 'Hitam', 'Japanese Sakura', 'dokumen', 'dokumen', '50gr', 'dokumen', 'dokumen', 'Winda', '', 1),
(43, 24, '2022-01-24 11:50:33', '2022-01-24 04:51:09', 'Hitam', 'Wagni', ' enctype=\"multipart/form-data\"', ' enctype=\"multipart/form-data\"', '50gr', '-', '-', 'Winda', 'APLIKASI_BOOKING_SERVIS.docx', 1),
(44, 25, '2022-01-24 13:01:56', '2022-01-24 06:12:02', 'hitam', 'wangi', 'cair', 'menyegarkan', '50 gr', '-', '-  100 ml air di panaskan \r\n- di tambah teh 50 gr\r\n- di tambah gula 50 gr', 'saya,dia dan mereka', '', 4),
(45, 26, '2022-01-24 13:24:39', '2022-01-24 06:26:48', 'merah', 'wangi', 'CAIR', 'MENYEGARKAN', '100 ML', '-', '- 1\r\n- 2\r\n- 3\r\n- 4\r\n- 5\r\n- 6\r\n- 7\r\n- 8\r\n- 9\r\n- 10', 'saya,dia dan mereka', '', 4),
(46, 27, '2022-01-24 15:20:24', '2022-01-24 08:21:49', 'hitam ', 'wangi', 'cair', 'menyegarkan', '100 ml', '-', '-1\r\n-2\r\n-3\r\n-4\r\n-5\r\n-6\r\n', 'saya,dia dan mereka', '', 4),
(47, 28, '2022-01-24 15:27:48', '2022-01-24 08:29:03', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa\\\r\n', 'aa\r\naa\r\naaa\r\naa', 'saya,dia dan mereka', '', 4),
(48, 29, '2022-01-24 16:02:00', '2022-01-24 09:02:00', 'hitam', 'wangi', 'cair', 'menyegarkan', '100 ml', '-\r\n', '', '', '', 1),
(49, 30, '2022-01-24 16:02:01', '2022-01-24 09:02:01', 'hitam', 'wangi', 'cair', 'menyegarkan', '100 ml', '-\r\n', '', '', '', 1),
(50, 31, '2022-01-24 16:02:41', '2022-01-24 09:04:19', '-', '-', '-', '-', '-', '-', '1\r\n1\r\n1\r\n11\r\n1\r\n1', 'saya,dia dan mereka', '', 4),
(51, 32, '2022-01-24 20:25:57', '2022-01-24 13:26:57', 'Hitam', 'Lavender', 'Tekstur', 'Tekstur', '50gr', 'Tekstur', 'Tekstur', 'Winda', '', 1),
(52, 33, '2022-01-24 20:27:58', '2022-01-25 08:24:32', 'Ungu', 'Pekat', 'Tekstur', 'Tekstur', '50gr', 'Tekstur', '-', 'Winda', '', 4),
(53, 34, '2022-01-26 15:42:46', '2022-01-26 08:43:39', 'Hitam', 'Pekat', 'Lembut\r\nEnak\r\nBergixi', 'Menenangkan Kulit', '50gr', '-', '-', 'Winda', '', 4),
(54, 35, '2022-01-26 15:45:42', '2022-01-26 08:45:42', 'Ungu', 'Japanese Sakura', 'Tekstur', 'Tekstur', '50gr', 'Tekstur', '', '', '', 1),
(55, 36, '2022-01-26 16:23:03', '2022-01-27 04:06:27', 'hitam', 'wangi', 'cair', 'stamina', '150 gr', '-', '-1\r\n-2\r\n-3\r\n-4\r\n', 'saya,dia dan mereka', '', 1),
(56, 37, '2022-01-27 11:07:23', '2022-01-27 08:46:42', 'kuning', 'wangi', 'padat', 'mengabulkan permintaan', '1000 kg', '-\r\n11', '11', '11', '', 1),
(57, 38, '2022-01-27 15:47:31', '2022-01-27 08:49:27', 'a1', 'a1', 'a1', 'a1', 'a1', 'a1', 'a1\r\na1\r\na1\r\na1\r\na1', 'a1', '', 4),
(58, 39, '2022-01-27 15:48:50', '2022-01-27 09:41:40', 'Ungu', 'Lavender', '-', '-', '50gr', '-', '00', 'a1', 'Laboratorium_Permintaansample_(2).pdf', 4);

-- --------------------------------------------------------

--
-- Table structure for table `revisi`
--

CREATE TABLE `revisi` (
  `revisi_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `revisi_tanggal_masuk` datetime(6) NOT NULL,
  `revisi_tanggal_jadi` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `revisi_warna` varchar(255) NOT NULL,
  `revisi_aroma` varchar(255) NOT NULL,
  `revisi_tekstur` varchar(255) NOT NULL,
  `revisi_manfaat` varchar(255) NOT NULL,
  `revisi_gramasi` varchar(11) NOT NULL,
  `revisi_keterangan` varchar(255) NOT NULL,
  `revisi_metodologi` varchar(255) NOT NULL,
  `revisi_penanggung_jawab` varchar(255) NOT NULL,
  `revisi_dokumen` varchar(255) NOT NULL,
  `status_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisi`
--

INSERT INTO `revisi` (`revisi_id`, `form_id`, `revisi_tanggal_masuk`, `revisi_tanggal_jadi`, `revisi_warna`, `revisi_aroma`, `revisi_tekstur`, `revisi_manfaat`, `revisi_gramasi`, `revisi_keterangan`, `revisi_metodologi`, `revisi_penanggung_jawab`, `revisi_dokumen`, `status_id`) VALUES
(38, 20, '2022-01-24 10:41:09.000000', '2022-01-24 03:45:21.804814', 'Hitam', 'Japanese Sakura', 'Tekstur', 'Keterangan', '50gr', 'Keterangan', '-', 'Winda', '', 3),
(39, 21, '2022-01-24 10:50:56.000000', '2022-01-24 04:02:38.678922', 'Putih', 'Japanese Sakura', 'Manfaat', 'Manfaat', '50gr', 'Manfaat', '-', 'Winda', '', 4),
(40, 21, '2022-01-24 11:03:01.000000', '2022-01-24 04:03:01.957653', 'Putih Abu Abu', 'Wagni', 'Manfaat', 'Manfaat', '50gr', 'Manfaat', '', '', '', 1),
(41, 25, '2022-01-24 13:12:59.000000', '2022-01-24 06:21:31.020887', 'hitam', 'wangi', 'cair', 'menyegarkan', '50 gr', '- warna kurang hitam', '- 100 ml AIR di panaskan hingga 100 derajat\r\n- di tambah gula  50 gr\r\n- aduk hingga merata\r\n- campurkan 50 gr  teh\r\n- aduk hingga merata', 'saya,dia dan mereka', '', 4),
(42, 25, '2022-01-24 13:22:13.000000', '2022-01-24 06:22:13.741782', 'hitam', 'wangi', 'cair', 'menyegarkan', '50 gr', '-warna kurang hitam\r\n', '', '', '', 1),
(43, 26, '2022-01-24 13:27:15.000000', '2022-01-24 08:18:42.416727', 'merah', 'wangi', 'CAIR', 'MENYEGARKAN', '100 ML', '- kurang manis', '-1 \r\n-2\r\n-3\r\n-4\r\n-5\r\n-6\r\n-7\r\n-8\r\n-9\r\n-10', 'saya,dia dan mereka', '', 4),
(44, 26, '2022-01-24 15:19:15.000000', '2022-01-24 08:19:15.052042', 'merah', 'wangi', 'CAIR', 'MENYEGARKAN', '100 ML', '-kurang segar\r\n', '', '', '', 1),
(47, 27, '2022-01-24 15:25:22.000000', '2022-01-24 08:26:28.910877', 'hitam ', 'wangi', 'cair', 'menyegarkan', '100 ml', '-kurang hitam', '-1\r\n-2\r\n-3\r\n-4\r\n-5\r\n-6\r\n-7\r\n-8\r\n', 'saya,dia dan mereka', '', 1),
(48, 28, '2022-01-24 15:29:17.000000', '2022-01-24 08:39:05.185630', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa\\\r\naaaa\r\n', 'a\r\na\r\na\r\naa\r\n', 'saya,dia dan mereka', '', 3),
(49, 28, '2022-01-24 15:39:20.000000', '2022-01-24 08:39:20.414288', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa', 'aaa\\\r\naaaa\r\n', '', '', '', 1),
(50, 31, '2022-01-24 16:04:40.000000', '2022-01-24 09:10:03.261462', '-', '-', '-', '-', '-', '-kurang banyak', 'a\r\na\r\na\r\naa\r\na', 'saya,dia dan mereka', '', 4),
(51, 31, '2022-01-24 16:10:50.000000', '2022-01-24 09:10:50.530267', '-', '-', '-', '-', '-', '- kurang hitam', '', '', '', 1),
(52, 33, '2022-01-24 20:37:09.000000', '2022-01-24 14:50:50.652917', 'Hitam', 'Lavender', 'Tekstur', 'Tekstur', '50gr', 'Tekstur', '-', 'Winda', '', 3),
(53, 33, '2022-01-24 20:42:06.000000', '2022-01-24 14:51:15.121994', 'Coklat', 'Pekat', 'Tekstur', 'Tekstur', '50gr', 'Tekstur', '-', 'Winda', '', 3),
(54, 36, '2022-01-26 16:33:36.000000', '2022-01-26 09:58:40.832305', 'hitam', 'wangi', 'cair', 'stamina', '150 gr', 'kurang manis', '- air di panaskan\r\n- di tambahkan gula\r\n- di tambah kopi', 'saya', '', 3),
(55, 37, '2022-01-27 11:09:20.000000', '2022-01-27 04:10:58.029166', 'kuning', 'wangi', 'padat', 'mengabulkan permintaan', '1000 kg', 'kurang berat\r\n', '-1\r\n-2\r\n-3\r\n-4\r\n-5\r\n-6\r\n-7\r\n', 'saya,dia dan mereka', '', 4),
(56, 38, '2022-01-27 15:49:33.000000', '2022-01-27 08:50:15.895409', 'a1', 'a1', 'a1', 'a1', 'a1', 'a1', 'a1', 'a1', '', 4),
(57, 39, '2022-01-27 16:09:53.000000', '2022-01-27 09:29:16.903374', 'Ungu', 'Lavender', '-', '-', '50gr', '-', '-', 'Winda', '', 4),
(58, 39, '2022-01-27 16:29:29.000000', '2022-01-27 09:35:02.684445', 'Ungu', 'Lavender', '-', '-', '50gr', '-', '\r\n10', 'Warna', '', 4),
(59, 39, '2022-01-27 16:36:50.000000', '2022-01-27 09:45:06.136829', 'Ungu', 'Lavender', '-', '-', '50gr', '-', '--', 'a1', '', 4),
(60, 39, '2022-01-27 16:45:31.000000', '2022-01-27 09:59:31.624627', 'Ungu', 'Lavender', '-', '-', '50gr', '-', '-', '2', 'Laboratorium_Barang_(4).pdf', 4),
(61, 39, '2022-01-27 16:59:37.000000', '2022-01-27 10:00:00.536848', 'Ungu', 'Lavender', '-', '-', '50gr', '-', '3', 'a1', 'Laboratorium_Permintaansample_(2)1.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `revisi_komposisi`
--

CREATE TABLE `revisi_komposisi` (
  `revisi_komposisi_id` int(11) NOT NULL,
  `revisi_id` int(11) NOT NULL,
  `form_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `revisi_komposisi_qty` float NOT NULL,
  `revisi_komposisi_satuan` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `revisi_komposisi`
--

INSERT INTO `revisi_komposisi` (`revisi_komposisi_id`, `revisi_id`, `form_id`, `barang_id`, `revisi_komposisi_qty`, `revisi_komposisi_satuan`) VALUES
(33, 38, 20, 1, 2, 'gram'),
(34, 39, 21, 4, 2, 'gram'),
(35, 41, 25, 5, 100, 'ml'),
(36, 41, 25, 7, 0, 'ml'),
(37, 41, 25, 8, 0, 'ml'),
(38, 43, 26, 5, 100, 'ml'),
(39, 43, 26, 7, 0, 'ml'),
(40, 43, 26, 9, 0, 'ml'),
(41, 47, 27, 5, 0, ''),
(42, 47, 27, 6, 0, ''),
(43, 47, 27, 7, 0, ''),
(44, 48, 28, 5, 1000, 'gram'),
(45, 48, 28, 6, 0, 'gram'),
(46, 48, 28, 7, 0, 'gram'),
(47, 50, 31, 5, 100, 'gram'),
(48, 50, 31, 6, 50, 'gram'),
(49, 50, 31, 7, 50, 'gram'),
(51, 53, 33, 4, 2, 'gram'),
(52, 52, 33, 1, 2, 'gram'),
(53, 52, 33, 4, 2, 'gram'),
(54, 52, 33, 6, 2, 'gram'),
(55, 52, 33, 7, 2, 'gram'),
(56, 54, 36, 5, 100, 'gram'),
(57, 54, 36, 7, 50, 'gram'),
(58, 54, 36, 10, 10, 'gram'),
(59, 55, 37, 1, 100000, 'gram'),
(60, 55, 37, 2, 100000, 'gram'),
(61, 55, 37, 5, 100000, 'gram'),
(62, 56, 38, 2, 8, 'gram'),
(63, 57, 39, 2, 9, 'gram'),
(64, 58, 39, 2, 8, 'gram'),
(65, 59, 39, 3, 9, 'gram'),
(66, 60, 39, 3, 8, 'gram'),
(67, 61, 39, 2, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(11) NOT NULL,
  `status_nama` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`status_id`, `status_nama`) VALUES
(1, 'Received'),
(2, 'On Progress'),
(3, 'Finished'),
(4, 'Sent'),
(5, 'Done'),
(6, 'Revisi'),
(7, 'Analyze'),
(8, 'Success'),
(9, 'Failed');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(45) NOT NULL,
  `user_alamat` varchar(255) NOT NULL,
  `user_no_telp` int(20) NOT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_tempat_tanggal_lahir` varchar(45) NOT NULL,
  `user_foto` varchar(255) NOT NULL,
  `user_nip` varchar(45) NOT NULL,
  `user_password` varchar(45) NOT NULL,
  `level_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_alamat`, `user_no_telp`, `user_email`, `user_tempat_tanggal_lahir`, `user_foto`, `user_nip`, `user_password`, `level_id`) VALUES
(1, 'Nagatech', '', 0, '', '', '', 'Nagatech', 'stellaparfum', 1),
(2, 'Gudang', '', 0, '', '', '', 'Gudang', 'gudang', 2),
(3, 'Marketing', '', 0, '', '', '', 'Marketing', 'marketing', 3),
(4, 'RnD Sampling', '', 0, '', '', '', 'RnD Sampling', 'rnd', 4),
(5, 'Rnd Development', '', 0, '', '', '', 'RnD Development', 'rnd', 5),
(6, 'RnD Research', '', 0, '', '', '', 'RnD Research', 'rnd', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`analisis_id`),
  ADD KEY `development_id` (`development_id`);

--
-- Indexes for table `analisis_dokumen`
--
ALTER TABLE `analisis_dokumen`
  ADD PRIMARY KEY (`analisis_dokumen_id`),
  ADD KEY `analisis_dokumen_ibfk_1` (`analisis_id`),
  ADD KEY `development_id` (`development_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`barang_keluar_id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `revisi_id` (`revisi_id`),
  ADD KEY `development_id` (`development_id`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`barang_masuk_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `detail_komposisi`
--
ALTER TABLE `detail_komposisi`
  ADD PRIMARY KEY (`detail_komposisi_id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `development`
--
ALTER TABLE `development`
  ADD PRIMARY KEY (`development_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `development_komposisi`
--
ALTER TABLE `development_komposisi`
  ADD PRIMARY KEY (`development_komposisi_id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `development_id` (`development_id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`form_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `gudang`
--
ALTER TABLE `gudang`
  ADD PRIMARY KEY (`gudang_id`),
  ADD KEY `barang_id` (`barang_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`pengiriman_id`);

--
-- Indexes for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD PRIMARY KEY (`permintaan_id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `revisi`
--
ALTER TABLE `revisi`
  ADD PRIMARY KEY (`revisi_id`),
  ADD KEY `form_id` (`form_id`),
  ADD KEY `status_id` (`status_id`);

--
-- Indexes for table `revisi_komposisi`
--
ALTER TABLE `revisi_komposisi`
  ADD PRIMARY KEY (`revisi_komposisi_id`),
  ADD KEY `barang_id` (`barang_id`),
  ADD KEY `revisi_id` (`revisi_id`),
  ADD KEY `form_id` (`form_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `level_id` (`level_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analisis`
--
ALTER TABLE `analisis`
  MODIFY `analisis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `analisis_dokumen`
--
ALTER TABLE `analisis_dokumen`
  MODIFY `analisis_dokumen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `barang_keluar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `barang_masuk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detail_komposisi`
--
ALTER TABLE `detail_komposisi`
  MODIFY `detail_komposisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `development`
--
ALTER TABLE `development`
  MODIFY `development_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `development_komposisi`
--
ALTER TABLE `development_komposisi`
  MODIFY `development_komposisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `gudang`
--
ALTER TABLE `gudang`
  MODIFY `gudang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `pengiriman_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `permintaan`
--
ALTER TABLE `permintaan`
  MODIFY `permintaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `revisi`
--
ALTER TABLE `revisi`
  MODIFY `revisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `revisi_komposisi`
--
ALTER TABLE `revisi_komposisi`
  MODIFY `revisi_komposisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`development_id`) REFERENCES `development` (`development_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `analisis_dokumen`
--
ALTER TABLE `analisis_dokumen`
  ADD CONSTRAINT `analisis_dokumen_ibfk_1` FOREIGN KEY (`analisis_id`) REFERENCES `analisis` (`analisis_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `analisis_dokumen_ibfk_2` FOREIGN KEY (`development_id`) REFERENCES `development` (`development_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_komposisi`
--
ALTER TABLE `detail_komposisi`
  ADD CONSTRAINT `detail_komposisi_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_komposisi_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `development`
--
ALTER TABLE `development`
  ADD CONSTRAINT `development_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `development_komposisi`
--
ALTER TABLE `development_komposisi`
  ADD CONSTRAINT `development_komposisi_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `development_komposisi_ibfk_2` FOREIGN KEY (`development_id`) REFERENCES `development` (`development_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gudang`
--
ALTER TABLE `gudang`
  ADD CONSTRAINT `gudang_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permintaan`
--
ALTER TABLE `permintaan`
  ADD CONSTRAINT `permintaan_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permintaan_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revisi`
--
ALTER TABLE `revisi`
  ADD CONSTRAINT `revisi_ibfk_1` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `revisi_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`status_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `revisi_komposisi`
--
ALTER TABLE `revisi_komposisi`
  ADD CONSTRAINT `revisi_komposisi_ibfk_1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`barang_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `revisi_komposisi_ibfk_2` FOREIGN KEY (`revisi_id`) REFERENCES `revisi` (`revisi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `revisi_komposisi_ibfk_3` FOREIGN KEY (`form_id`) REFERENCES `form` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
