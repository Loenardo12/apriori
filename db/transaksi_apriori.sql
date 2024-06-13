-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 10, 2017 at 11:21 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_transaksi_apriori`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `kditem` varchar(5) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  PRIMARY KEY (`kditem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`kditem`, `merk`, `jenis`) VALUES
('01', 'Acer', 'Laptop'),
('02', 'Asus', 'Laptop'),
('03', 'HP', 'Laptop'),
('04', 'Samsung', 'Laptop'),
('05', 'Lenovo', 'Laptop'),
('06', 'Zyrex', 'Laptop'),
('07', 'Bioar', 'Laptop'),
('08', 'Apple', 'Laptop'),
('09', 'Toshiba', 'Laptop'),
('10', 'Hewpa', 'Laptop'),
('11', 'Dell', 'Laptop'),
('12', 'Axio', 'Laptop'),
('13', 'Compaq', 'Laptop');

-- --------------------------------------------------------

--
-- Table structure for table `itemc1`
--

CREATE TABLE IF NOT EXISTS `itemc1` (
  `kditem` varchar(5) NOT NULL,
  `support_count` int(11) NOT NULL,
  `persen_support` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemc1`
--

INSERT INTO `itemc1` (`kditem`, `support_count`, `persen_support`) VALUES
('01', 9, '75'),
('02', 6, '50'),
('03', 6, '50'),
('04', 8, '66.66'),
('09', 7, '58.33');

-- --------------------------------------------------------

--
-- Table structure for table `itemc2`
--

CREATE TABLE IF NOT EXISTS `itemc2` (
  `kditem1` varchar(5) NOT NULL,
  `kditem2` varchar(5) NOT NULL,
  `support_count` int(5) NOT NULL,
  `persen_support` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemc2`
--

INSERT INTO `itemc2` (`kditem1`, `kditem2`, `support_count`, `persen_support`) VALUES
('01', '02', 0, 0),
('01', '03', 0, 0),
('01', '04', 0, 0),
('01', '09', 0, 0),
('02', '03', 0, 0),
('02', '04', 0, 0),
('02', '09', 0, 0),
('03', '04', 0, 0),
('03', '09', 0, 0),
('04', '09', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `itemc3`
--

CREATE TABLE IF NOT EXISTS `itemc3` (
  `kditem1` varchar(5) NOT NULL,
  `kditem2` varchar(5) NOT NULL,
  `kditem3` varchar(5) NOT NULL,
  `support_count` int(5) NOT NULL,
  `persen_support` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `itemc3`
--

INSERT INTO `itemc3` (`kditem1`, `kditem2`, `kditem3`, `support_count`, `persen_support`) VALUES
('01', '02', '03', 1, 8.3333333333333),
('01', '02', '04', 1, 8.3333333333333),
('01', '02', '09', 2, 16.666666666667),
('02', '03', '04', 2, 16.666666666667),
('02', '03', '09', 0, 0),
('03', '04', '09', 1, 8.3333333333333);

-- --------------------------------------------------------

--
-- Table structure for table `rule`
--

CREATE TABLE IF NOT EXISTS `rule` (
  `kdrule` varchar(2) NOT NULL,
  `itemset` varchar(10) NOT NULL,
  `minsupport` double NOT NULL,
  PRIMARY KEY (`kdrule`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rule`
--

INSERT INTO `rule` (`kdrule`, `itemset`, `minsupport`) VALUES
('R1', 'itemset1', 30),
('R2', 'itemset2', 30),
('R3', 'itemset3', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_c2`
--

CREATE TABLE IF NOT EXISTS `tmp_c2` (
  `kditem` varchar(10) NOT NULL,
  `kdtransaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_c2`
--

INSERT INTO `tmp_c2` (`kditem`, `kdtransaksi`) VALUES
('01', ''),
('01', ''),
('01', ''),
('01', ''),
('01', ''),
('01', ''),
('01', ''),
('01', ''),
('02', ''),
('02', ''),
('02', ''),
('02', ''),
('02', ''),
('02', ''),
('03', ''),
('03', ''),
('03', ''),
('03', ''),
('04', ''),
('04', '');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_c3`
--

CREATE TABLE IF NOT EXISTS `tmp_c3` (
  `kditem1` varchar(5) NOT NULL,
  `kditem2` varchar(5) NOT NULL,
  `kdtransaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_trans`
--

CREATE TABLE IF NOT EXISTS `tmp_trans` (
  `kditem` varchar(10) NOT NULL,
  `kdtransaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_trans`
--

INSERT INTO `tmp_trans` (`kditem`, `kdtransaksi`) VALUES
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12'),
('01', '01'),
('04', '01'),
('09', '01'),
('09', '02'),
('02', '02'),
('01', '02'),
('03', '03'),
('04', '03'),
('09', '03'),
('04', '04'),
('02', '04'),
('01', '04'),
('01', '05'),
('04', '05'),
('09', '05'),
('01', '06'),
('03', '06'),
('09', '06'),
('09', '07'),
('02', '07'),
('01', '07'),
('01', '08'),
('02', '08'),
('03', '08'),
('02', '09'),
('03', '09'),
('04', '09'),
('04', '10'),
('03', '10'),
('01', '10'),
('01', '11'),
('04', '11'),
('09', '11'),
('02', '12'),
('03', '12'),
('04', '12');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `kdtransaksi` varchar(10) NOT NULL,
  `kditem` varchar(5) NOT NULL,
  `tgltransaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kdtransaksi`, `kditem`, `tgltransaksi`) VALUES
('01', '01', '0000-00-00'),
('01', '04', '0000-00-00'),
('01', '09', '0000-00-00'),
('02', '01', '0000-00-00'),
('02', '02', '0000-00-00'),
('02', '09', '0000-00-00'),
('03', '03', '0000-00-00'),
('03', '04', '0000-00-00'),
('03', '09', '0000-00-00'),
('04', '01', '0000-00-00'),
('04', '02', '0000-00-00'),
('04', '04', '0000-00-00'),
('05', '01', '0000-00-00'),
('05', '04', '0000-00-00'),
('05', '09', '0000-00-00'),
('06', '01', '0000-00-00'),
('06', '03', '0000-00-00'),
('06', '09', '0000-00-00'),
('07', '01', '0000-00-00'),
('07', '02', '0000-00-00'),
('07', '09', '0000-00-00'),
('08', '01', '0000-00-00'),
('08', '02', '0000-00-00'),
('08', '03', '0000-00-00'),
('09', '02', '0000-00-00'),
('09', '03', '0000-00-00'),
('09', '04', '0000-00-00'),
('10', '01', '0000-00-00'),
('10', '03', '0000-00-00'),
('10', '04', '0000-00-00'),
('11', '01', '0000-00-00'),
('11', '04', '0000-00-00'),
('11', '09', '0000-00-00'),
('12', '02', '0000-00-00'),
('12', '03', '0000-00-00'),
('12', '04', '0000-00-00'),
('13', '01', '0000-00-00'),
('13', '02', '0000-00-00'),
('13', '10', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
