-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 17, 2016 at 02:41 PM
-- Server version: 10.0.20-MariaDB-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `archisdi_orphouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `img` varchar(10) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `fullname`, `contact`, `img`) VALUES
(1, 'archie', 'ara', 'Archie Isdiningrat', '081242480700', 'archie.jpg'),
(2, 'sarandianti', 'asa', 'Sarah Andianti', '089641495504', 'sarah.jpg'),
(4, 'tikhanovesy', 'novesy95', 'Atikha Novesy', '082118768340', 'tikha.jpg'),
(5, 'bungadwipa', 'bungdwip', 'Bunga Dwipa', '081xxxxxxxx', 'bunga.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `anak`
--

CREATE TABLE IF NOT EXISTS `anak` (
  `id_anak` int(11) NOT NULL AUTO_INCREMENT,
  `id_panti` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `sekolah` varchar(30) NOT NULL,
  `lahir` varchar(20) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `hobi` varchar(100) NOT NULL DEFAULT '-',
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_anak`),
  KEY `id_panti` (`id_panti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `anak`
--

INSERT INTO `anak` (`id_anak`, `id_panti`, `nama`, `sekolah`, `lahir`, `jk`, `hobi`, `img`) VALUES
(1, 1, 'Noah Abdul Hakim', 'TK Miftahulfath, Tk A', '05/02/2010', 'L', '-', 'profile.jpg'),
(2, 1, 'Johan Akhirudin', 'TK Miftahulfath, Tk A', '30/01/2009', 'L', '-', 'profile.jpg'),
(3, 1, 'Janu Awaludin', 'SDIT Akhsanul Fikri', '06/10/2006', 'L', '-', 'profile.jpg'),
(7, 1, 'Huba Ar Rabbi', 'SDIT Akhsanul Fikri', '23/11/2006', 'L', '-', 'profile.jpg'),
(38, 1, 'Erik Abdul Hakim', 'SDN Sekelimus', '30/11/2004', 'L', '-', 'profile.jpg'),
(39, 1, 'Ari Alpareja', 'SDN Sekelimus', '12/02/2004', 'L', '-', 'profile.jpg'),
(40, 1, 'Irsal', 'SDN Sekelimus', '03/05/2004', 'L', '-', 'profile.jpg'),
(41, 1, 'Akbar Maulana', 'SDN Sekelimus', '05/05/2004', 'L', '-', 'profile.jpg'),
(42, 1, 'Adi Purnama', 'SDN Sekelimus', '23/05/2003', 'L', '-', 'profile.jpg'),
(43, 1, 'Aldi Hadi Fatah', 'SDN Sekelimus', '28/05/2005', 'L', '-', 'profile.jpg'),
(44, 1, 'Yogi Mukarom', 'SDN Sekelimus', '17/03/2003', 'L', '-', 'profile.jpg'),
(45, 1, 'Rijal', 'SD Akhsanul fikri', '20/04/2003', 'L', '-', 'profile.jpg'),
(46, 1, 'Muhamad Rijal', 'SMP Al Aitam', '12/08/2002', 'L', '-', 'profile.jpg'),
(47, 1, 'Depi Fatwa Mutakin', 'SMP Al Aitam', '04/07/2002', 'L', '-', 'profile.jpg'),
(48, 1, 'Wilman', 'SMP Al Aitam', '01/12/2001', 'L', '-', 'profile.jpg'),
(49, 1, 'Rijal Saeful Hayat', 'SMP Al Aitam', '27/04/2001', 'L', '-', 'profile.jpg'),
(50, 1, 'Hanif Muslim', 'SMP Baiturahman', '10/04/2000', 'L', '-', 'profile.jpg'),
(51, 1, 'Budi Adi Suyudi', 'SMP Al Aitam', '21/03/1999', 'L', '-', 'profile.jpg'),
(52, 1, 'Abdul Kohar', 'SMP Al Aitam', '07/12/1998', 'L', '-', 'profile.jpg'),
(53, 1, 'Yudi Sumantri', 'SMP Al Aitam', '04/04/1998', 'L', '-', 'profile.jpg'),
(54, 1, 'Nurdiawan', 'SMP Al Aitam', '12/12/1999', 'L', '-', 'profile.jpg'),
(55, 1, 'Faiz Fatah', 'SD Akhsanul fikri', '05/03/2005', 'L', '-', 'profile.jpg'),
(56, 1, 'Ikbal Ramdani', 'SMP Al Aitam', '22/12/1999', 'L', '-', 'profile.jpg'),
(57, 1, 'Ismail', 'SMA Baiturahman', '05/05/2004', 'L', '-', 'profile.jpg'),
(58, 1, 'Aldi Herdiansyah', 'STM Mady', '19/04/1998', 'L', '-', 'profile.jpg'),
(59, 1, 'Ali Yusuf', 'SMAN 1 Dayeuh Kolot', '01/06/1997', 'L', '-', 'profile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `panti`
--

CREATE TABLE IF NOT EXISTS `panti` (
  `id_panti` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `jumlah_anak` int(5) DEFAULT '0',
  `img` varchar(100) NOT NULL DEFAULT 'orph.jpg',
  `maps` varchar(50) NOT NULL,
  PRIMARY KEY (`id_panti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `panti`
--

INSERT INTO `panti` (`id_panti`, `nama`, `alamat`, `kontak`, `jumlah_anak`, `img`, `maps`) VALUES
(1, 'Amanah', 'Jln.Batununggal No. 63A, Jawa Barat 40266', '0227564370', 26, 'amanah.jpg', '-6.956382, 107.637590'),
(3, 'Al-Fien', 'Jln. Sariasih I No.12, Sukasari', '(022) 201-6428', 0, 'fien.jpg', '-6.875238, 107.577695'),
(4, 'Al-Hayat', 'Jln.Cibatu Raya No.64, Antapani', '(022) 710-2890', 0, 'hayat.jpg', '-6.917032, 107.663823'),
(17, 'Harapan Muhammadiyah', 'Jln. Nilem No.9', '(022) 7307-8700', 0, 'harapan.jpg', '-6.935766, 107.620282');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anak`
--
ALTER TABLE `anak`
  ADD CONSTRAINT `ss` FOREIGN KEY (`id_panti`) REFERENCES `panti` (`id_panti`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
