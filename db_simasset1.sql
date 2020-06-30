-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 30, 2020 at 06:48 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simasset1`
--

-- --------------------------------------------------------

--
-- Table structure for table `t001_property`
--

CREATE TABLE `t001_property` (
  `id` int(11) NOT NULL,
  `Property` varchar(100) NOT NULL,
  `TemplateFile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t001_property`
--

INSERT INTO `t001_property` (`id`, `Property`, `TemplateFile`) VALUES
(1, 'Aston Bojonegoro City Hotel', 'ASSET HANDOVER ABCH - FORM Revisi'),
(2, 'Favehotel Sudirman Bojonegoro', 'ASSET HANDOVER FSB - FORM Revisi'),
(3, 'Rumah Dinas General Manager', 'r');

-- --------------------------------------------------------

--
-- Table structure for table `t002_department`
--

CREATE TABLE `t002_department` (
  `id` int(11) NOT NULL,
  `Department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t002_department`
--

INSERT INTO `t002_department` (`id`, `Department`) VALUES
(1, 'A&amp;G'),
(2, 'FO'),
(3, 'HR'),
(4, 'S&amp;M'),
(5, 'PMC'),
(6, 'FB KITCHEN'),
(7, 'FB SERVICE'),
(8, 'HK');

-- --------------------------------------------------------

--
-- Table structure for table `t003_signature`
--

CREATE TABLE `t003_signature` (
  `id` int(11) NOT NULL,
  `Signature` varchar(100) NOT NULL,
  `JobTitle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t003_signature`
--

INSERT INTO `t003_signature` (`id`, `Signature`, `JobTitle`) VALUES
(1, 'Intan', 'Financial Controller'),
(2, 'Lonike', 'Human Resources Coordinator'),
(3, 'Cyntia', 'Sales &amp; Marketing Manager');

-- --------------------------------------------------------

--
-- Table structure for table `t004_asset`
--

CREATE TABLE `t004_asset` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `Code` varchar(25) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `signature_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `Qty` float(14,2) NOT NULL DEFAULT 0.00,
  `Remarks` text DEFAULT NULL,
  `ProcurementDate` date NOT NULL,
  `ProcurementCurrentCost` float(17,2) NOT NULL DEFAULT 0.00,
  `PeriodBegin` date NOT NULL,
  `PeriodEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t004_asset`
--

INSERT INTO `t004_asset` (`id`, `property_id`, `group_id`, `type_id`, `Code`, `Description`, `brand_id`, `signature_id`, `department_id`, `location_id`, `Qty`, `Remarks`, `ProcurementDate`, `ProcurementCurrentCost`, `PeriodBegin`, `PeriodEnd`) VALUES
(1, 1, 2, 3, 'AK101118000001', 'Printer Inkjet', 1, 1, 1, 1, 1.00, NULL, '2018-12-05', 1000000.00, '2018-12-31', '2022-11-30'),
(2, 1, 1, 1, 'AB1TNH13000002', 'Table GM', 2, 1, 1, 1, 1.00, NULL, '2013-12-05', 3000000.00, '2013-12-31', '2033-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `t005_assetgroup`
--

CREATE TABLE `t005_assetgroup` (
  `id` int(11) NOT NULL,
  `Code` varchar(5) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EstimatedLife` tinyint(4) NOT NULL DEFAULT 5,
  `SLN` float(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t005_assetgroup`
--

INSERT INTO `t005_assetgroup` (`id`, `Code`, `Description`, `EstimatedLife`, `SLN`) VALUES
(1, 'B1', 'Bangunan', 20, 5.00),
(2, 'K1', 'Kelompok I', 4, 25.00),
(3, 'K2', 'Kelompok II', 8, 12.50);

-- --------------------------------------------------------

--
-- Table structure for table `t006_assetdepreciation`
--

CREATE TABLE `t006_assetdepreciation` (
  `id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `ListOfYears` smallint(6) NOT NULL,
  `NumberOfMonths` tinyint(4) NOT NULL,
  `DepreciationAmount` float(14,2) NOT NULL,
  `DepreciationYtd` float(14,2) NOT NULL,
  `NetBookValue` float(14,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t006_assetdepreciation`
--

INSERT INTO `t006_assetdepreciation` (`id`, `asset_id`, `ListOfYears`, `NumberOfMonths`, `DepreciationAmount`, `DepreciationYtd`, `NetBookValue`) VALUES
(85, 1, 2018, 1, 20833.33, 20833.33, 979166.69),
(86, 1, 2019, 12, 250000.00, 270833.34, 729166.69),
(87, 1, 2020, 12, 250000.00, 520833.34, 479166.66),
(88, 1, 2021, 12, 250000.00, 770833.31, 229166.67),
(89, 1, 2022, 11, 229166.67, 1000000.00, 0.00),
(90, 2, 2013, 1, 12500.00, 12500.00, 2987500.00),
(91, 2, 2014, 12, 150000.00, 162500.00, 2837500.00),
(92, 2, 2015, 12, 150000.00, 312500.00, 2687500.00),
(93, 2, 2016, 12, 150000.00, 462500.00, 2537500.00),
(94, 2, 2017, 12, 150000.00, 612500.00, 2387500.00),
(95, 2, 2018, 12, 150000.00, 762500.00, 2237500.00),
(96, 2, 2019, 12, 150000.00, 912500.00, 2087500.00),
(97, 2, 2020, 12, 150000.00, 1062500.00, 1937500.00),
(98, 2, 2021, 12, 150000.00, 1212500.00, 1787500.00),
(99, 2, 2022, 12, 150000.00, 1362500.00, 1637500.00),
(100, 2, 2023, 12, 150000.00, 1512500.00, 1487500.00),
(101, 2, 2024, 12, 150000.00, 1662500.00, 1337500.00),
(102, 2, 2025, 12, 150000.00, 1812500.00, 1187500.00),
(103, 2, 2026, 12, 150000.00, 1962500.00, 1037500.00),
(104, 2, 2027, 12, 150000.00, 2112500.00, 887500.00),
(105, 2, 2028, 12, 150000.00, 2262500.00, 737500.00),
(106, 2, 2029, 12, 150000.00, 2412500.00, 587500.00),
(107, 2, 2030, 12, 150000.00, 2562500.00, 437500.00),
(108, 2, 2031, 12, 150000.00, 2712500.00, 287500.00),
(109, 2, 2032, 12, 150000.00, 2862500.00, 137500.00),
(110, 2, 2033, 11, 137500.00, 3000000.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `t007_assettype`
--

CREATE TABLE `t007_assettype` (
  `id` int(11) NOT NULL,
  `assetgroup_id` int(11) NOT NULL,
  `Description` varchar(50) NOT NULL,
  `Code` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t007_assettype`
--

INSERT INTO `t007_assettype` (`id`, `assetgroup_id`, `Description`, `Code`) VALUES
(1, 1, 'Tanah', 'TNH'),
(2, 1, 'Bangunan', 'BGN'),
(3, 2, 'IT', '011'),
(4, 2, 'Furniture 1', '021'),
(5, 2, 'Electronic 1', '031'),
(6, 2, 'Kitchen Equipment 1', '041'),
(7, 2, 'Tableware', '051'),
(8, 2, 'Banquet', '061'),
(9, 2, 'Other Equipment 1', '071'),
(10, 3, 'Furniture 2', '022'),
(11, 3, 'Electronic 2', '032'),
(12, 3, 'Kitchen Equipment 2', '042'),
(13, 3, 'Other Equipment 2', '072'),
(14, 3, 'Vehicle 1', '0V1'),
(15, 3, 'Vehicle 2', '0V2');

-- --------------------------------------------------------

--
-- Table structure for table `t008_brand`
--

CREATE TABLE `t008_brand` (
  `id` int(11) NOT NULL,
  `Brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t008_brand`
--

INSERT INTO `t008_brand` (`id`, `Brand`) VALUES
(1, 'Canon'),
(2, 'High Point');

-- --------------------------------------------------------

--
-- Table structure for table `t009_location`
--

CREATE TABLE `t009_location` (
  `id` int(11) NOT NULL,
  `Location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t009_location`
--

INSERT INTO `t009_location` (`id`, `Location`) VALUES
(1, 'A&amp;G'),
(2, 'FO'),
(3, 'HR'),
(4, 'S&amp;M'),
(5, 'PMC'),
(6, 'FB KITCHEN'),
(7, 'FB SERVICE'),
(8, 'HK');

-- --------------------------------------------------------

--
-- Table structure for table `t101_ho_head`
--

CREATE TABLE `t101_ho_head` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `TransactionNo` varchar(25) NOT NULL,
  `TransactionDate` date NOT NULL,
  `HandedOverTo` int(11) NOT NULL,
  `DepartmentTo` int(11) NOT NULL,
  `HandedOverBy` int(11) NOT NULL,
  `DepartmentBy` int(11) NOT NULL,
  `Sign1` int(11) NOT NULL,
  `Sign2` int(11) NOT NULL,
  `Sign3` int(11) NOT NULL,
  `Sign4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t101_ho_head`
--

INSERT INTO `t101_ho_head` (`id`, `property_id`, `TransactionNo`, `TransactionDate`, `HandedOverTo`, `DepartmentTo`, `HandedOverBy`, `DepartmentBy`, `Sign1`, `Sign2`, `Sign3`, `Sign4`) VALUES
(1, 1, '0001', '2020-06-30', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t102_ho_detail`
--

CREATE TABLE `t102_ho_detail` (
  `id` int(11) NOT NULL,
  `hohead_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t102_ho_detail`
--

INSERT INTO `t102_ho_detail` (`id`, `hohead_id`, `asset_id`) VALUES
(1, 1, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t103_ho1_head`
--

CREATE TABLE `t103_ho1_head` (
  `id` int(11) NOT NULL,
  `ho_head` int(11) NOT NULL,
  `TransactionNo` varchar(25) NOT NULL,
  `TransactionDate` date NOT NULL,
  `TransactionType` tinyint(4) NOT NULL,
  `HandedOverTo` int(11) NOT NULL,
  `CodeNoTo` varchar(25) NOT NULL COMMENT 'code number to',
  `DepartmentTo` int(11) NOT NULL,
  `Sign1` int(11) NOT NULL,
  `Sign2` int(11) NOT NULL,
  `Sign3` int(11) NOT NULL,
  `Sign4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t104_ho1_detail`
--

CREATE TABLE `t104_ho1_detail` (
  `id` int(11) NOT NULL,
  `hohead_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t201_users`
--

CREATE TABLE `t201_users` (
  `EmployeeID` int(11) NOT NULL,
  `LastName` varchar(20) DEFAULT NULL,
  `FirstName` varchar(10) DEFAULT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `TitleOfCourtesy` varchar(25) DEFAULT NULL,
  `BirthDate` datetime DEFAULT NULL,
  `HireDate` datetime DEFAULT NULL,
  `Address` varchar(60) DEFAULT NULL,
  `City` varchar(15) DEFAULT NULL,
  `Region` varchar(15) DEFAULT NULL,
  `PostalCode` varchar(10) DEFAULT NULL,
  `Country` varchar(15) DEFAULT NULL,
  `HomePhone` varchar(24) DEFAULT NULL,
  `Extension` varchar(4) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Notes` longtext DEFAULT NULL,
  `ReportsTo` int(11) DEFAULT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '',
  `UserLevel` int(11) DEFAULT NULL,
  `Username` varchar(20) NOT NULL DEFAULT '',
  `Activated` enum('Y','N') NOT NULL DEFAULT 'N',
  `Profile` longtext DEFAULT NULL,
  `sekolah_id` int(11) DEFAULT NULL,
  `tahunajaran_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `semester_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t201_users`
--

INSERT INTO `t201_users` (`EmployeeID`, `LastName`, `FirstName`, `Title`, `TitleOfCourtesy`, `BirthDate`, `HireDate`, `Address`, `City`, `Region`, `PostalCode`, `Country`, `HomePhone`, `Extension`, `Email`, `Photo`, `Notes`, `ReportsTo`, `Password`, `UserLevel`, `Username`, `Activated`, `Profile`, `sekolah_id`, `tahunajaran_id`, `kelas_id`, `semester_id`) VALUES
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21232f297a57a5a743894a0e4a801fc3', -1, 'admin', 'Y', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t202_userlevels`
--

CREATE TABLE `t202_userlevels` (
  `userlevelid` int(11) NOT NULL,
  `userlevelname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t202_userlevels`
--

INSERT INTO `t202_userlevels` (`userlevelid`, `userlevelname`) VALUES
(-2, 'Anonymous'),
(-1, 'Administrator'),
(0, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `t203_userlevelpermissions`
--

CREATE TABLE `t203_userlevelpermissions` (
  `userlevelid` int(11) NOT NULL,
  `tablename` varchar(255) NOT NULL,
  `permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `t203_userlevelpermissions`
--

INSERT INTO `t203_userlevelpermissions` (`userlevelid`, `tablename`, `permission`) VALUES
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}d301_home', 72),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}Dashboard1', 72),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}r001_asset', 72),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t001_property', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t002_department', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t003_signature', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t004_asset', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t101_ho_head', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t102_ho_detail', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t103_opname', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t201_users', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t202_userlevels', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t203_userlevelpermissions', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t204_audittrail', 0),
(-2, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t205_parameter', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}d301_home', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}Dashboard1', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}r001_asset', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t001_property', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t002_department', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t003_signature', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t004_asset', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t101_ho_head', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t102_ho_detail', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t103_opname', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t201_users', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t202_userlevels', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t203_userlevelpermissions', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t204_audittrail', 0),
(0, '{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t205_parameter', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t204_audittrail`
--

CREATE TABLE `t204_audittrail` (
  `id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `script` varchar(80) DEFAULT NULL,
  `user` varchar(80) DEFAULT NULL,
  `action` varchar(80) DEFAULT NULL,
  `table` varchar(80) DEFAULT NULL,
  `field` varchar(80) DEFAULT NULL,
  `keyvalue` longtext DEFAULT NULL,
  `oldvalue` longtext DEFAULT NULL,
  `newvalue` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t204_audittrail`
--

INSERT INTO `t204_audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(1, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', '*** Batch insert begin ***', 't001_property', '', '', '', ''),
(2, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'Property', '1', '', 'Aston Bojonegoro City Hotel'),
(3, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'TemplateFile', '1', '', 'a'),
(4, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'id', '1', '', '1'),
(5, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'Property', '2', '', 'Favehotel Sudirman Bojonegoro'),
(6, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'TemplateFile', '2', '', 'f'),
(7, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'id', '2', '', '2'),
(8, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'Property', '3', '', 'Rumah Dinas General Manager'),
(9, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'TemplateFile', '3', '', 'r'),
(10, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'id', '3', '', '3'),
(11, '2020-06-29 21:12:18', '/simasset1/t001_propertylist.php', '4', '*** Batch insert successful ***', 't001_property', '', '', '', ''),
(12, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Code', '1', '', 'B1'),
(13, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Description', '1', '', 'Bangunan'),
(14, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'EstimatedLife', '1', '', '20'),
(15, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'SLN', '1', '', '5'),
(16, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'id', '1', '', '1'),
(17, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', '*** Batch insert begin ***', 't007_assettype', '', '', '', ''),
(18, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '1', '', '1'),
(19, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '1', '', 'Tanah'),
(20, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '1', '', 'TNH'),
(21, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '1', '', '1'),
(22, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '2', '', '1'),
(23, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '2', '', 'Bangunan'),
(24, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '2', '', 'BGN'),
(25, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '2', '', '2'),
(26, '2020-06-29 21:15:58', '/simasset1/t005_assetgroupadd.php', '4', '*** Batch insert successful ***', 't007_assettype', '', '', '', ''),
(27, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Code', '2', '', 'K1'),
(28, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Description', '2', '', 'Kelompok I'),
(29, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'EstimatedLife', '2', '', '4'),
(30, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'SLN', '2', '', '25'),
(31, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'id', '2', '', '2'),
(32, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', '*** Batch insert begin ***', 't007_assettype', '', '', '', ''),
(33, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '3', '', '2'),
(34, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '3', '', 'IT'),
(35, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '3', '', '011'),
(36, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '3', '', '3'),
(37, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '4', '', '2'),
(38, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '4', '', 'Furniture 1'),
(39, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '4', '', '021'),
(40, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '4', '', '4'),
(41, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '5', '', '2'),
(42, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '5', '', 'Electronic 1'),
(43, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '5', '', '031'),
(44, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '5', '', '5'),
(45, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '6', '', '2'),
(46, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '6', '', 'Kitchen Equipment 1'),
(47, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '6', '', '041'),
(48, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '6', '', '6'),
(49, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '7', '', '2'),
(50, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '7', '', 'Tableware'),
(51, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '7', '', '051'),
(52, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '7', '', '7'),
(53, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '8', '', '2'),
(54, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '8', '', 'Banquet'),
(55, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '8', '', '061'),
(56, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '8', '', '8'),
(57, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '9', '', '2'),
(58, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '9', '', 'Other Equipment 1'),
(59, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '9', '', '071'),
(60, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '9', '', '9'),
(61, '2020-06-29 21:18:12', '/simasset1/t005_assetgroupadd.php', '4', '*** Batch insert successful ***', 't007_assettype', '', '', '', ''),
(62, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Code', '3', '', 'K2'),
(63, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Description', '3', '', 'Kelompok II'),
(64, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'EstimatedLife', '3', '', '8'),
(65, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'SLN', '3', '', '12.5'),
(66, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'id', '3', '', '3'),
(67, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', '*** Batch insert begin ***', 't007_assettype', '', '', '', ''),
(68, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '10', '', '3'),
(69, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '10', '', 'Furniture 2'),
(70, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '10', '', '022'),
(71, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '10', '', '10'),
(72, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '11', '', '3'),
(73, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '11', '', 'Electronic 2'),
(74, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '11', '', '032'),
(75, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '11', '', '11'),
(76, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '12', '', '3'),
(77, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '12', '', 'Kitchen Equipment 2'),
(78, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '12', '', '042'),
(79, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '12', '', '12'),
(80, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '13', '', '3'),
(81, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '13', '', 'Other Equipment 2'),
(82, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '13', '', '072'),
(83, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '13', '', '13'),
(84, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '14', '', '3'),
(85, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '14', '', 'Vehicle 1'),
(86, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '14', '', '0V1'),
(87, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '14', '', '14'),
(88, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'assetgroup_id', '15', '', '3'),
(89, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Description', '15', '', 'Vehicle 2'),
(90, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'Code', '15', '', '0V2'),
(91, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't007_assettype', 'id', '15', '', '15'),
(92, '2020-06-29 21:20:01', '/simasset1/t005_assetgroupadd.php', '4', '*** Batch insert successful ***', 't007_assettype', '', '', '', ''),
(93, '2020-06-29 21:29:02', '/simasset1/t008_brandlist.php', '4', '*** Batch insert begin ***', 't008_brand', '', '', '', ''),
(94, '2020-06-29 21:29:02', '/simasset1/t008_brandlist.php', '4', 'A', 't008_brand', 'Brand', '1', '', 'Canon'),
(95, '2020-06-29 21:29:02', '/simasset1/t008_brandlist.php', '4', 'A', 't008_brand', 'id', '1', '', '1'),
(96, '2020-06-29 21:29:02', '/simasset1/t008_brandlist.php', '4', 'A', 't008_brand', 'Brand', '2', '', 'High Point'),
(97, '2020-06-29 21:29:02', '/simasset1/t008_brandlist.php', '4', 'A', 't008_brand', 'id', '2', '', '2'),
(98, '2020-06-29 21:29:02', '/simasset1/t008_brandlist.php', '4', '*** Batch insert successful ***', 't008_brand', '', '', '', ''),
(99, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', '*** Batch insert begin ***', 't003_signature', '', '', '', ''),
(100, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '1', '', 'Intan'),
(101, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'JobTitle', '1', '', 'Financial Controller'),
(102, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '1', '', '1'),
(103, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '2', '', 'Lonike'),
(104, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'JobTitle', '2', '', 'Human Resources Coordinator'),
(105, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '2', '', '2'),
(106, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '3', '', 'Cyntia'),
(107, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'JobTitle', '3', '', 'Sales &amp; Marketing Manager'),
(108, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '3', '', '3'),
(109, '2020-06-29 21:39:34', '/simasset1/t003_signaturelist.php', '4', '*** Batch insert successful ***', 't003_signature', '', '', '', ''),
(110, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', '*** Batch insert begin ***', 't002_department', '', '', '', ''),
(111, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '1', '', 'A&amp;G'),
(112, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '1', '', '1'),
(113, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '2', '', 'FO'),
(114, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '2', '', '2'),
(115, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '3', '', 'HR'),
(116, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '3', '', '3'),
(117, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '4', '', 'S&amp;M'),
(118, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '4', '', '4'),
(119, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '5', '', 'PMC'),
(120, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '5', '', '5'),
(121, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '6', '', 'FB KITCHEN'),
(122, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '6', '', '6'),
(123, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '7', '', 'FB SERVICE'),
(124, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '7', '', '7'),
(125, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '8', '', 'HK'),
(126, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '8', '', '8'),
(127, '2020-06-29 21:42:07', '/simasset1/t002_departmentlist.php', '4', '*** Batch insert successful ***', 't002_department', '', '', '', ''),
(128, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', '*** Batch insert begin ***', 't009_location', '', '', '', ''),
(129, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '1', '', 'A&amp;G'),
(130, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '1', '', '1'),
(131, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '2', '', 'FO'),
(132, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '2', '', '2'),
(133, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '3', '', 'HR'),
(134, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '3', '', '3'),
(135, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '4', '', 'S&amp;M'),
(136, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '4', '', '4'),
(137, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '5', '', 'PMC'),
(138, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '5', '', '5'),
(139, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '6', '', 'FB KITCHEN'),
(140, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '6', '', '6'),
(141, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '7', '', 'FB SERVICE'),
(142, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '7', '', '7'),
(143, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'Location', '8', '', 'HK'),
(144, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', 'A', 't009_location', 'id', '8', '', '8'),
(145, '2020-06-29 21:49:16', '/simasset1/t009_locationlist.php', '4', '*** Batch insert successful ***', 't009_location', '', '', '', ''),
(146, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '1', '', '1'),
(147, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'type_id', '1', '', '3'),
(148, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '1', '', 'Printer Inkjet'),
(149, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'brand_id', '1', '', '1'),
(150, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '1', '', '1'),
(151, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '1', '', '1'),
(152, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'location_id', '1', '', '1'),
(153, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '1', '', '1'),
(154, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '1', '', NULL),
(155, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '1', '', '2020-06-29'),
(156, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '1', '', '2000000'),
(157, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '1', '', '2020-06-30'),
(158, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '1', '', '2020-05-30'),
(159, '2020-06-29 23:49:58', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '1', '', '1'),
(160, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '1', '', '1'),
(161, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'type_id', '1', '', '3'),
(162, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '1', '', 'Printer Inkjet'),
(163, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'brand_id', '1', '', '1'),
(164, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '1', '', '1'),
(165, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '1', '', '1'),
(166, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'location_id', '1', '', '1'),
(167, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '1', '', '1'),
(168, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '1', '', NULL),
(169, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '1', '', '2013-12-05'),
(170, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '1', '', '2500000'),
(171, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '1', '', '2'),
(172, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '1', '', '2013-12-31'),
(173, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '1', '', '2013-11-30'),
(174, '2020-06-30 00:04:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '1', '', '1'),
(175, '2020-06-30 00:14:46', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '1', '2500000.00', '100000'),
(176, '2020-06-30 00:17:12', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '1', '100000.00', '1000000'),
(177, '2020-06-30 00:18:43', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '1', '1000000.00', '1000001'),
(178, '2020-06-30 00:18:43', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'PeriodEnd', '1', '2013-11-30', '2017-11-30'),
(179, '2020-06-30 00:19:13', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '1', '1000001.00', '1000000'),
(180, '2020-06-30 01:02:13', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '1', '1000000.00', '1000001'),
(181, '2020-06-30 01:02:13', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '1', '', 'AK101113000001'),
(182, '2020-06-30 01:02:43', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '1', '3', '4'),
(183, '2020-06-30 01:02:43', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '1', 'AK101113000001', 'AK102113000001'),
(184, '2020-06-30 01:03:30', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'property_id', '1', '1', '2'),
(185, '2020-06-30 01:03:30', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '1', 'AK102113000001', 'FK102113000001'),
(186, '2020-06-30 01:04:46', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'property_id', '1', '2', '1'),
(187, '2020-06-30 01:04:46', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '1', '4', '3'),
(188, '2020-06-30 01:04:46', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '1', '1000001.00', '1000000'),
(189, '2020-06-30 01:04:46', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '1', 'FK102113000001', 'AK101113000001'),
(190, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '2', '', '1'),
(191, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'type_id', '2', '', '4'),
(192, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '2', '', 'Table GM'),
(193, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'brand_id', '2', '', '2'),
(194, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '2', '', '1'),
(195, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '2', '', '1'),
(196, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'location_id', '2', '', '1'),
(197, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '2', '', '1'),
(198, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '2', '', NULL),
(199, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '2', '', '2013-12-05'),
(200, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '2', '', '3000000'),
(201, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '2', '', '2'),
(202, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '2', '', 'AK102113000001'),
(203, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '2', '', '2013-12-31'),
(204, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '2', '', '2017-11-30'),
(205, '2020-06-30 01:06:39', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '2', '', '2'),
(206, '2020-06-30 01:08:42', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '2', '4', '3'),
(207, '2020-06-30 01:08:42', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '2', 'AK102113000001', 'AK101113000002'),
(208, '2020-06-30 01:10:00', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '2', '3', '4'),
(209, '2020-06-30 01:10:00', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '2', 'AK101113000002', 'AK102113000003'),
(210, '2020-06-30 01:17:57', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '2', '4', '3'),
(211, '2020-06-30 01:17:57', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '2', 'AK102113000002', 'AK101113000002'),
(212, '2020-06-30 01:18:15', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '2', '3', '4'),
(213, '2020-06-30 01:18:15', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '2', 'AK101113000002', 'AK102113000002'),
(214, '2020-06-30 01:18:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '2', '4', '1'),
(215, '2020-06-30 01:18:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'group_id', '2', '2', '1'),
(216, '2020-06-30 01:18:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '2', 'AK102113000002', 'AB1TNH13000002'),
(217, '2020-06-30 01:18:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'PeriodEnd', '2', '2017-11-30', '2033-11-30'),
(218, '2020-06-30 01:20:02', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '2', '1', '4'),
(219, '2020-06-30 01:20:02', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'group_id', '2', '1', '2'),
(220, '2020-06-30 01:20:02', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '2', 'AB1TNH13000002', 'AK102113000002'),
(221, '2020-06-30 01:20:02', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'PeriodEnd', '2', '2033-11-30', '2017-11-30'),
(222, '2020-06-30 07:43:44', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(223, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'property_id', '1', '', '1'),
(224, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionNo', '1', '', '0001'),
(225, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionDate', '1', '', '2020-06-30'),
(226, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'HandedOverTo', '1', '', '1'),
(227, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'DepartmentTo', '1', '', '1'),
(228, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'HandedOverBy', '1', '', '1'),
(229, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'DepartmentBy', '1', '', '1'),
(230, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign1', '1', '', '1'),
(231, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign2', '1', '', '1'),
(232, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign3', '1', '', '1'),
(233, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign4', '1', '', '1'),
(234, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'id', '1', '', '1'),
(235, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', '*** Batch insert begin ***', 't102_ho_detail', '', '', '', ''),
(236, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'asset_id', '1', '', '1'),
(237, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'hohead_id', '1', '', '1'),
(238, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'id', '1', '', '1'),
(239, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'asset_id', '2', '', '2'),
(240, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'hohead_id', '2', '', '1'),
(241, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'id', '2', '', '2'),
(242, '2020-06-30 08:02:53', '/simasset1/t101_ho_headadd.php', '4', '*** Batch insert successful ***', 't102_ho_detail', '', '', '', ''),
(243, '2020-06-30 08:21:07', '/simasset1/t001_propertylist.php', '4', '*** Batch update begin ***', 't001_property', '', '', '', ''),
(244, '2020-06-30 08:21:07', '/simasset1/t001_propertylist.php', '4', 'U', 't001_property', 'TemplateFile', '1', 'a', 'ASSET HANDOVER ABCH - FORM Revisi'),
(245, '2020-06-30 08:21:07', '/simasset1/t001_propertylist.php', '4', 'U', 't001_property', 'TemplateFile', '2', 'f', 'ASSET HANDOVER FSB - FORM Revisi'),
(246, '2020-06-30 08:21:07', '/simasset1/t001_propertylist.php', '4', '*** Batch update successful ***', 't001_property', '', '', '', ''),
(247, '2020-06-30 09:36:34', '/simasset1/t002_departmentedit.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;G', 'A&amp;G'),
(248, '2020-06-30 09:41:06', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(249, '2020-06-30 09:41:06', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(250, '2020-06-30 09:42:53', '/simasset1/t002_departmentedit.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;G', 'A &amp; G'),
(251, '2020-06-30 09:43:26', '/simasset1/t002_departmentedit.php', '4', 'U', 't002_department', 'Department', '1', 'A &amp; G', 'A&amp;G'),
(252, '2020-06-30 09:53:14', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(253, '2020-06-30 09:53:14', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(254, '2020-06-30 09:53:40', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(255, '2020-06-30 09:53:40', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;G', 'A &amp; G'),
(256, '2020-06-30 09:53:40', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '4', 'S&amp;M', 'S &amp; M'),
(257, '2020-06-30 09:53:40', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(258, '2020-06-30 09:54:42', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(259, '2020-06-30 09:54:42', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A &amp; G', 'A &amp; Gx'),
(260, '2020-06-30 09:54:42', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '4', 'S &amp; M', 'S &amp; Mx'),
(261, '2020-06-30 09:54:42', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(262, '2020-06-30 09:55:09', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(263, '2020-06-30 09:55:09', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A &amp; Gx', 'A &amp; G'),
(264, '2020-06-30 09:55:09', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(265, '2020-06-30 10:04:24', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(266, '2020-06-30 10:04:24', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;G', 'A&amp;G'),
(267, '2020-06-30 10:04:24', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(268, '2020-06-30 10:35:24', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(269, '2020-06-30 10:35:24', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '4', 'S &amp; Mx', 'S&amp;M'),
(270, '2020-06-30 10:35:24', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(271, '2020-06-30 10:36:55', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(272, '2020-06-30 10:36:55', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;G', 'A&amp;Gx'),
(273, '2020-06-30 10:36:55', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '4', 'S&amp;M', 'S&amp;Mx'),
(274, '2020-06-30 10:36:55', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(275, '2020-06-30 10:37:28', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(276, '2020-06-30 10:37:28', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;Gx', 'A&amp;Gx'),
(277, '2020-06-30 10:37:28', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(278, '2020-06-30 10:38:39', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(279, '2020-06-30 10:38:39', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;Gx', 'A&amp;G'),
(280, '2020-06-30 10:38:39', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(281, '2020-06-30 10:39:47', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(282, '2020-06-30 10:39:47', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '1', 'A&amp;G', 'A&amp;G'),
(283, '2020-06-30 10:39:47', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(284, '2020-06-30 10:40:09', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(285, '2020-06-30 10:40:09', '/simasset1/t002_departmentlist.php', '4', 'U', 't002_department', 'Department', '4', 'S&amp;Mx', 'S&amp;M'),
(286, '2020-06-30 10:40:09', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(287, '2020-06-30 10:47:37', '/simasset1/t002_departmentlist.php', '4', '*** Batch update begin ***', 't002_department', '', '', '', ''),
(288, '2020-06-30 10:47:37', '/simasset1/t002_departmentlist.php', '4', '*** Batch update successful ***', 't002_department', '', '', '', ''),
(289, '2020-06-30 11:34:17', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementDate', '1', '2013-12-05', '2018-12-05'),
(290, '2020-06-30 11:34:17', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '1', 'AK101113000001', 'AK101118000001'),
(291, '2020-06-30 11:34:17', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'PeriodBegin', '1', '2013-12-31', '2018-12-31'),
(292, '2020-06-30 11:34:17', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'PeriodEnd', '1', '2017-11-30', '2022-11-30'),
(293, '2020-06-30 11:44:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'type_id', '2', '4', '1'),
(294, '2020-06-30 11:44:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'group_id', '2', '2', '1'),
(295, '2020-06-30 11:44:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Code', '2', 'AK102113000002', 'AB1TNH13000002'),
(296, '2020-06-30 11:44:40', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'PeriodEnd', '2', '2017-11-30', '2033-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `t205_parameter`
--

CREATE TABLE `t205_parameter` (
  `id` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `Parameter` varchar(100) NOT NULL,
  `Nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t001_property`
--
ALTER TABLE `t001_property`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t002_department`
--
ALTER TABLE `t002_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t003_signature`
--
ALTER TABLE `t003_signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t004_asset`
--
ALTER TABLE `t004_asset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t005_assetgroup`
--
ALTER TABLE `t005_assetgroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t006_assetdepreciation`
--
ALTER TABLE `t006_assetdepreciation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t007_assettype`
--
ALTER TABLE `t007_assettype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t008_brand`
--
ALTER TABLE `t008_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t009_location`
--
ALTER TABLE `t009_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t101_ho_head`
--
ALTER TABLE `t101_ho_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t102_ho_detail`
--
ALTER TABLE `t102_ho_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t103_ho1_head`
--
ALTER TABLE `t103_ho1_head`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t104_ho1_detail`
--
ALTER TABLE `t104_ho1_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t201_users`
--
ALTER TABLE `t201_users`
  ADD PRIMARY KEY (`EmployeeID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `t202_userlevels`
--
ALTER TABLE `t202_userlevels`
  ADD PRIMARY KEY (`userlevelid`);

--
-- Indexes for table `t203_userlevelpermissions`
--
ALTER TABLE `t203_userlevelpermissions`
  ADD PRIMARY KEY (`userlevelid`,`tablename`);

--
-- Indexes for table `t204_audittrail`
--
ALTER TABLE `t204_audittrail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t205_parameter`
--
ALTER TABLE `t205_parameter`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t001_property`
--
ALTER TABLE `t001_property`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t002_department`
--
ALTER TABLE `t002_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t003_signature`
--
ALTER TABLE `t003_signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t004_asset`
--
ALTER TABLE `t004_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t005_assetgroup`
--
ALTER TABLE `t005_assetgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t006_assetdepreciation`
--
ALTER TABLE `t006_assetdepreciation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `t007_assettype`
--
ALTER TABLE `t007_assettype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `t008_brand`
--
ALTER TABLE `t008_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t009_location`
--
ALTER TABLE `t009_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `t101_ho_head`
--
ALTER TABLE `t101_ho_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `t102_ho_detail`
--
ALTER TABLE `t102_ho_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t103_ho1_head`
--
ALTER TABLE `t103_ho1_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t104_ho1_detail`
--
ALTER TABLE `t104_ho1_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `t201_users`
--
ALTER TABLE `t201_users`
  MODIFY `EmployeeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t204_audittrail`
--
ALTER TABLE `t204_audittrail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `t205_parameter`
--
ALTER TABLE `t205_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
