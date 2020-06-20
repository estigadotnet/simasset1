-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 20, 2020 at 06:32 PM
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
(4, 'Aston Bojonegoro City Hotel', 'ASSET HANDOVER FORM - ABCH.xlsx'),
(5, 'Favehotel Sudirman Bojonegoro', 'ASSET HANDOVER FORM - FSB.xlsx'),
(6, 'Rumah Dinas General Manager', '-');

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
(8, 'Owner'),
(9, 'Computer Equipment'),
(10, 'Engineering'),
(11, 'Fire Extinguisher'),
(12, 'Fitness'),
(13, 'Food &amp; Beverage'),
(14, 'Furniture of EDR/Banquet/Equipment &amp; Others'),
(15, 'Kitchen Utilities'),
(16, 'Finance');

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
(9, 'Owner', 'Owner'),
(10, 'Chef Sinyo', 'Chef'),
(11, 'Hartono', 'Financial Controller'),
(12, 'Nurhadi', 'F &amp; B Manager'),
(13, 'Ricky', 'Front Office Manager'),
(14, 'Roga', 'Chief Engineering'),
(15, 'Ronald', 'Director of Sales'),
(16, 'Intan Noor Azizah', 'Financial Controller');

-- --------------------------------------------------------

--
-- Table structure for table `t004_asset`
--

CREATE TABLE `t004_asset` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `signature_id` int(11) NOT NULL,
  `Code` varchar(25) NOT NULL,
  `group_id` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `ProcurementDate` date NOT NULL,
  `ProcurementCurrentCost` float(14,2) NOT NULL DEFAULT 0.00,
  `Salvage` float(14,2) NOT NULL DEFAULT 0.00,
  `Qty` float(14,2) NOT NULL DEFAULT 0.00,
  `Remarks` text DEFAULT NULL,
  `PeriodBegin` date NOT NULL,
  `PeriodEnd` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t004_asset`
--

INSERT INTO `t004_asset` (`id`, `property_id`, `department_id`, `signature_id`, `Code`, `group_id`, `Description`, `ProcurementDate`, `ProcurementCurrentCost`, `Salvage`, `Qty`, `Remarks`, `PeriodBegin`, `PeriodEnd`) VALUES
(2, 4, 8, 9, '0101', 2, 'Cold Room Freezer w/ Rack', '2020-05-17', 0.00, 0.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(3, 4, 8, 9, '0102', 2, 'Cold Room Chiller w/ Rack', '2020-06-17', 0.00, 0.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(4, 4, 8, 9, '0103', 2, 'Rack Shelf 4 Level Solid', '2013-06-19', 1500000.00, 500000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(5, 4, 8, 9, '0104', 2, 'Exhaust Hood w/ Filter + Lamp', '2013-06-19', 2000000.00, 250000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(6, 4, 8, 9, '0105', 2, 'Gas 1 Deck Oven w/ Profer', '2013-06-19', 2500000.00, 350000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(7, 4, 8, 9, '0106', 2, 'Work Table w/ Low Shelf', '2013-06-20', 2600000.00, 600000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(8, 4, 8, 9, '0107', 2, 'Wall Shelf 1 Deck', '2013-06-20', 2700000.00, 700000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(9, 4, 8, 9, '0108', 2, 'Table w/ Marble', '2013-06-20', 2800000.00, 800000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(10, 4, 8, 9, '0109', 2, 'Sink 1 Bowl w/ Faucet H&amp;C', '2013-06-20', 2900000.00, 900000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(11, 4, 8, 9, '0110', 3, 'Dough Mixer (Cap. 20 Liter)', '2013-12-05', 3100000.00, 310000.00, 1.00, NULL, '0000-00-00', '0000-00-00'),
(13, 4, 8, 9, '0112', 3, 'Mixer Portable (Cap. 5 liter)', '2013-12-05', 3300000.00, 330000.00, 1.00, NULL, '2013-12-31', '2015-11-30'),
(15, 4, 8, 9, '0114', 3, 'Wall Shelf 1 Deck', '2013-12-05', 1750000.00, 17500.00, 1.00, NULL, '2013-12-31', '2015-11-30'),
(16, 4, 8, 9, '0115', 3, 'Sink 1 Bowl w/ Faucet H&amp;C', '2013-12-05', 1850000.00, 18500.00, 1.00, NULL, '2013-12-31', '2015-11-30'),
(17, 4, 8, 9, '0116', 3, 'Work Table w/ Low Shelf', '2013-12-05', 1950000.00, 195000.00, 1.00, NULL, '2013-12-31', '2015-11-30'),
(18, 4, 8, 9, '0117', 3, 'Sink 1 Bowl w/ Faucet H&amp;C', '2013-12-05', 2150000.00, 215000.00, 1.00, NULL, '2013-12-31', '2015-11-30'),
(19, 4, 8, 9, '0118', 3, 'Under Counter Chiller 3 Doors', '2013-12-05', 2250000.00, 225000.00, 1.00, NULL, '2013-12-31', '2015-11-30'),
(20, 4, 8, 9, '0119', 3, 'Insect Killer', '2013-12-05', 25000000.00, 7000000.00, 1.00, NULL, '2013-12-31', '2015-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `t005_assetgroup`
--

CREATE TABLE `t005_assetgroup` (
  `id` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `EconomicalLifeTime` tinyint(4) NOT NULL DEFAULT 5
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t005_assetgroup`
--

INSERT INTO `t005_assetgroup` (`id`, `Description`, `EconomicalLifeTime`) VALUES
(1, 'Office Equipment', 5),
(2, 'Kitchen Equipment', 10),
(3, 'Data Test', 2);

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
(2, 13, 2, 0, 0.00, 0.00, 0.00),
(3, 13, 2, 0, 0.00, 0.00, 0.00),
(4, 13, 2, 0, 0.00, 0.00, 0.00),
(6, 16, 2014, 12, 0.00, 0.00, 0.00),
(7, 17, 2013, 1, 0.00, 0.00, 0.00),
(8, 17, 2014, 12, 0.00, 0.00, 0.00),
(9, 19, 2013, 1, 0.00, 0.00, 0.00),
(10, 19, 2014, 12, 0.00, 0.00, 0.00),
(11, 19, 2015, 11, 0.00, 0.00, 0.00),
(27, 20, 2013, 1, 750000.00, 750000.00, 24250000.00),
(28, 20, 2014, 12, 9000000.00, 9750000.00, 15250000.00),
(29, 20, 2015, 11, 8250000.00, 18000000.00, 7000000.00);

-- --------------------------------------------------------

--
-- Table structure for table `t101_ho_head`
--

CREATE TABLE `t101_ho_head` (
  `id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `TransactionNo` varchar(25) NOT NULL,
  `TransactionDate` date NOT NULL,
  `TransactionType` tinyint(4) NOT NULL,
  `HandedOverTo` int(11) NOT NULL,
  `CodeNoTo` varchar(25) NOT NULL COMMENT 'code number to',
  `DepartmentTo` int(11) NOT NULL,
  `HandedOverBy` int(11) NOT NULL,
  `CodeNoBy` varchar(25) NOT NULL COMMENT 'code number by',
  `DepartmentBy` int(11) NOT NULL,
  `Sign1` int(11) NOT NULL,
  `Sign2` int(11) NOT NULL,
  `Sign3` int(11) NOT NULL,
  `Sign4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t101_ho_head`
--

INSERT INTO `t101_ho_head` (`id`, `property_id`, `TransactionNo`, `TransactionDate`, `TransactionType`, `HandedOverTo`, `CodeNoTo`, `DepartmentTo`, `HandedOverBy`, `CodeNoBy`, `DepartmentBy`, `Sign1`, `Sign2`, `Sign3`, `Sign4`) VALUES
(1, 4, '0001', '2020-05-23', 0, 16, '0001', 16, 9, '0001', 8, 9, 16, 9, 16),
(2, 4, '0002', '2020-06-17', 0, 16, '0002', 16, 9, '0002', 8, 9, 16, 9, 9);

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
(1, 1, 2),
(2, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t103_opname`
--

CREATE TABLE `t103_opname` (
  `id` int(11) NOT NULL,
  `OpnameDate` date NOT NULL,
  `property_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `asset_id` int(11) NOT NULL,
  `signature_id` int(11) NOT NULL,
  `Actual` float(14,2) NOT NULL DEFAULT 0.00,
  `OpnameQty` float(14,2) NOT NULL DEFAULT 0.00,
  `Diff` float(14,2) NOT NULL DEFAULT 0.00,
  `Remarks` text DEFAULT NULL
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
(1, '2020-05-17 21:14:45', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(2, '2020-05-17 21:14:47', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(3, '2020-05-17 21:18:44', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(4, '2020-05-17 21:18:47', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(5, '2020-05-17 21:21:30', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(6, '2020-05-17 21:23:12', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(7, '2020-05-17 21:23:33', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(8, '2020-05-17 21:23:45', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(9, '2020-05-17 21:24:55', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(10, '2020-05-17 21:25:10', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(11, '2020-05-17 21:26:18', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(12, '2020-05-17 21:26:56', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(13, '2020-05-17 21:27:20', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(14, '2020-05-17 21:29:49', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(15, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', '*** Batch insert begin ***', 't001_property', '', '', '', ''),
(16, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'Property', '4', '', 'Aston Bojonegoro City Hotel'),
(17, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'id', '4', '', '4'),
(18, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'Property', '5', '', 'Favehotel Sudirman Bojonegoro'),
(19, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'id', '5', '', '5'),
(20, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'Property', '6', '', 'Rumah Dinas General Manager'),
(21, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', 'A', 't001_property', 'id', '6', '', '6'),
(22, '2020-05-17 21:32:06', '/simasset1/t001_propertylist.php', '4', '*** Batch insert successful ***', 't001_property', '', '', '', ''),
(23, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', '*** Batch insert begin ***', 't002_department', '', '', '', ''),
(24, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '8', '', 'Owner'),
(25, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '8', '', '8'),
(26, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '9', '', 'Computer Equipment'),
(27, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '9', '', '9'),
(28, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '10', '', 'Engineering'),
(29, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '10', '', '10'),
(30, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '11', '', 'Fire Extinguisher'),
(31, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '11', '', '11'),
(32, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '12', '', 'Fitness'),
(33, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '12', '', '12'),
(34, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '13', '', 'Food &amp; Beverage'),
(35, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '13', '', '13'),
(36, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'Department', '14', '', 'Furniture of EDR/Banquet/Equipment &amp; Others'),
(37, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', 'A', 't002_department', 'id', '14', '', '14'),
(38, '2020-05-17 21:45:40', '/simasset1/t002_departmentlist.php', '4', '*** Batch insert successful ***', 't002_department', '', '', '', ''),
(39, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', '*** Batch insert begin ***', 't003_signature', '', '', '', ''),
(40, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '9', '', 'Owner'),
(41, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '9', '', '9'),
(42, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '10', '', 'Chef Sinyo'),
(43, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '10', '', '10'),
(44, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '11', '', 'Hartono'),
(45, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '11', '', '11'),
(46, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '12', '', 'Nurhadi'),
(47, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '12', '', '12'),
(48, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '13', '', 'Ricky'),
(49, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '13', '', '13'),
(50, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '14', '', 'Roga'),
(51, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '14', '', '14'),
(52, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'Signature', '15', '', 'Ronald'),
(53, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', 'A', 't003_signature', 'id', '15', '', '15'),
(54, '2020-05-17 21:49:15', '/simasset1/t003_signaturelist.php', '4', '*** Batch insert successful ***', 't003_signature', '', '', '', ''),
(55, '2020-05-17 22:10:29', '/simasset1/api/index.php', '4', 'A', 't002_department', 'Department', '15', '', 'Kitchen Utilities'),
(56, '2020-05-17 22:10:29', '/simasset1/api/index.php', '4', 'A', 't002_department', 'id', '15', '', '15'),
(57, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', '*** Batch insert begin ***', 't004_asset', '', '', '', ''),
(58, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'property_id', '2', '', '4'),
(59, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'department_id', '2', '', '8'),
(60, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'signature_id', '2', '', '9'),
(61, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Description', '2', '', 'Cold Room Freezer w/ Rack'),
(62, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'ProcurementDate', '2', '', '2020-05-17'),
(63, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '2', '', '0'),
(64, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'DepreciationAmount', '2', '', '0'),
(65, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'DepreciationYtd', '2', '', '0'),
(66, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'NetBookValue', '2', '', '0'),
(67, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Periode', '2', '', '2020-05-17'),
(68, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Qty', '2', '', '1'),
(69, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Remarks', '2', '', NULL),
(70, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'id', '2', '', '2'),
(71, '2020-05-17 22:14:26', '/simasset1/t004_assetlist.php', '4', '*** Batch insert successful ***', 't004_asset', '', '', '', ''),
(72, '2020-05-17 22:14:52', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(73, '2020-05-17 22:20:46', '/simasset1/login.php', 'admin', 'login', '192.168.100.2', '', '', '', ''),
(74, '2020-05-17 22:23:47', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(75, '2020-05-18 11:47:39', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(76, '2020-05-20 13:44:13', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(77, '2020-05-20 13:45:23', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(78, '2020-05-21 10:18:55', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(79, '2020-05-21 12:55:39', '/simasset1/api/index.php', '4', 'A', 't003_signature', 'Signature', '16', '', 'Intan Noor Azizah'),
(80, '2020-05-21 12:55:39', '/simasset1/api/index.php', '4', 'A', 't003_signature', 'id', '16', '', '16'),
(81, '2020-05-23 10:48:51', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(82, '2020-05-23 12:26:05', '/simasset1/api/index.php', '4', 'A', 't002_department', 'Department', '16', '', 'Finance'),
(83, '2020-05-23 12:26:05', '/simasset1/api/index.php', '4', 'A', 't002_department', 'id', '16', '', '16'),
(84, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionNo', '1', '', '0001'),
(85, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionDate', '1', '', '2020-05-23'),
(86, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionType', '1', '', '0'),
(87, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'HandedOverTo', '1', '', '16'),
(88, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'CodeNoTo', '1', '', '0001'),
(89, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'DepartmentTo', '1', '', '16'),
(90, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'HandedOverBy', '1', '', '9'),
(91, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'CodeNoBy', '1', '', '1'),
(92, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'DepartmentBy', '1', '', '8'),
(93, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign1', '1', '', '9'),
(94, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign2', '1', '', '16'),
(95, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign3', '1', '', '9'),
(96, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign4', '1', '', '16'),
(97, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'id', '1', '', '1'),
(98, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', '*** Batch insert begin ***', 't102_ho_detail', '', '', '', ''),
(99, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'asset_id', '1', '', '2'),
(100, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'hohead_id', '1', '', '1'),
(101, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'id', '1', '', '1'),
(102, '2020-05-23 12:29:32', '/simasset1/t101_ho_headadd.php', '4', '*** Batch insert successful ***', 't102_ho_detail', '', '', '', ''),
(103, '2020-05-26 10:14:47', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(104, '2020-05-30 06:20:11', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(105, '2020-05-30 09:39:56', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(106, '2020-05-30 09:40:06', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(107, '2020-05-31 01:35:38', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(108, '2020-05-31 01:43:35', '/simasset1/t101_ho_headedit.php', '4', 'U', 't101_ho_head', 'property_id', '1', '0', '4'),
(109, '2020-05-31 01:43:35', '/simasset1/t101_ho_headedit.php', '4', '*** Batch update begin ***', 't102_ho_detail', '', '', '', ''),
(110, '2020-05-31 01:43:35', '/simasset1/t101_ho_headedit.php', '4', '*** Batch update successful ***', 't102_ho_detail', '', '', '', ''),
(111, '2020-06-08 22:56:46', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(112, '2020-06-15 07:53:53', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(113, '2020-06-15 07:54:07', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(114, '2020-06-15 08:03:17', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(115, '2020-06-16 16:33:21', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(116, '2020-06-16 17:46:16', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(117, '2020-06-16 17:48:17', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(118, '2020-06-16 21:35:35', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(119, '2020-06-16 21:35:43', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(120, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', '*** Batch insert begin ***', 't004_asset', '', '', '', ''),
(121, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'property_id', '3', '', '4'),
(122, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'department_id', '3', '', '15'),
(123, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'signature_id', '3', '', '9'),
(124, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Description', '3', '', 'Cold Room Chiller w/ Rack'),
(125, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'ProcurementDate', '3', '', '2020-06-17'),
(126, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '3', '', '0'),
(127, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'DepreciationAmount', '3', '', '0'),
(128, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'DepreciationYtd', '3', '', '0'),
(129, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'NetBookValue', '3', '', '0'),
(130, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Periode', '3', '', '2020-06-17'),
(131, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Qty', '3', '', '1'),
(132, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'Remarks', '3', '', NULL),
(133, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', 'A', 't004_asset', 'id', '3', '', '3'),
(134, '2020-06-17 05:46:02', '/simasset1/t004_assetlist.php', '4', '*** Batch insert successful ***', 't004_asset', '', '', '', ''),
(135, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'property_id', '2', '', '4'),
(136, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionNo', '2', '', '0002'),
(137, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionDate', '2', '', '2020-06-17'),
(138, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'TransactionType', '2', '', '0'),
(139, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'HandedOverTo', '2', '', '16'),
(140, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'CodeNoTo', '2', '', '0002'),
(141, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'DepartmentTo', '2', '', '16'),
(142, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'HandedOverBy', '2', '', '9'),
(143, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'CodeNoBy', '2', '', '0002'),
(144, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'DepartmentBy', '2', '', '8'),
(145, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign1', '2', '', '9'),
(146, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign2', '2', '', '16'),
(147, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign3', '2', '', '9'),
(148, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'Sign4', '2', '', '9'),
(149, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't101_ho_head', 'id', '2', '', '2'),
(150, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', '*** Batch insert begin ***', 't102_ho_detail', '', '', '', ''),
(151, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'asset_id', '2', '', '3'),
(152, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'hohead_id', '2', '', '2'),
(153, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', 'A', 't102_ho_detail', 'id', '2', '', '2'),
(154, '2020-06-17 05:49:20', '/simasset1/t101_ho_headadd.php', '4', '*** Batch insert successful ***', 't102_ho_detail', '', '', '', ''),
(155, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', '*** Batch update begin ***', 't003_signature', '', '', '', ''),
(156, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '9', '', 'Owner'),
(157, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '10', '', 'Chef'),
(158, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '11', '', 'Financial Controller'),
(159, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '12', '', 'F &amp; B Manager'),
(160, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '13', '', 'Front Office Manager'),
(161, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '14', '', 'Chief Engineering'),
(162, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '15', '', 'Director of Sales'),
(163, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', 'U', 't003_signature', 'JobTitle', '16', '', 'Financial Controller'),
(164, '2020-06-17 06:10:02', '/simasset1/t003_signaturelist.php', '4', '*** Batch update successful ***', 't003_signature', '', '', '', ''),
(165, '2020-06-17 08:00:04', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(166, '2020-06-17 09:07:12', '/simasset1/t001_propertylist.php', '4', '*** Batch update begin ***', 't001_property', '', '', '', ''),
(167, '2020-06-17 09:07:12', '/simasset1/t001_propertylist.php', '4', 'U', 't001_property', 'TemplateFile', '4', '', 'ASSET HANDOVER FORM - ABCH.xlsx'),
(168, '2020-06-17 09:07:12', '/simasset1/t001_propertylist.php', '4', 'U', 't001_property', 'TemplateFile', '5', '', 'ASSET HANDOVER FORM - FSB.xlsx'),
(169, '2020-06-17 09:07:12', '/simasset1/t001_propertylist.php', '4', 'U', 't001_property', 'TemplateFile', '6', '', '-'),
(170, '2020-06-17 09:07:12', '/simasset1/t001_propertylist.php', '4', '*** Batch update successful ***', 't001_property', '', '', '', ''),
(171, '2020-06-19 08:13:39', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(172, '2020-06-19 09:55:09', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(173, '2020-06-19 09:56:49', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Description', '1', '', 'Office Equipment'),
(174, '2020-06-19 09:56:49', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'id', '1', '', '1'),
(175, '2020-06-19 09:57:02', '/simasset1/t005_assetgroupedit.php', '4', 'U', 't005_assetgroup', 'EconomicalLifeTime', '1', '5', '0'),
(176, '2020-06-19 09:57:13', '/simasset1/t005_assetgrouplist.php', '4', '*** Batch update begin ***', 't005_assetgroup', '', '', '', ''),
(177, '2020-06-19 09:57:13', '/simasset1/t005_assetgrouplist.php', '4', 'U', 't005_assetgroup', 'EconomicalLifeTime', '1', '0', '5'),
(178, '2020-06-19 09:57:13', '/simasset1/t005_assetgrouplist.php', '4', '*** Batch update successful ***', 't005_assetgroup', '', '', '', ''),
(179, '2020-06-19 09:57:30', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Description', '2', '', 'Kitchen Equipment'),
(180, '2020-06-19 09:57:30', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'EconomicalLifeTime', '2', '', '10'),
(181, '2020-06-19 09:57:30', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'id', '2', '', '2'),
(182, '2020-06-19 10:06:52', '/simasset1/t004_assetlist.php', '4', '*** Batch update begin ***', 't004_asset', '', '', '', ''),
(183, '2020-06-19 10:06:52', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'Code', '2', '', '0101'),
(184, '2020-06-19 10:06:52', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'group_id', '2', '0', '1'),
(185, '2020-06-19 10:06:52', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'Code', '3', '', '0102'),
(186, '2020-06-19 10:06:52', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'group_id', '3', '0', '1'),
(187, '2020-06-19 10:06:52', '/simasset1/t004_assetlist.php', '4', '*** Batch update successful ***', 't004_asset', '', '', '', ''),
(188, '2020-06-19 10:09:49', '/simasset1/t004_assetlist.php', '4', '*** Batch update begin ***', 't004_asset', '', '', '', ''),
(189, '2020-06-19 10:09:49', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'group_id', '2', '1', '2'),
(190, '2020-06-19 10:09:49', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'group_id', '3', '1', '2'),
(191, '2020-06-19 10:09:49', '/simasset1/t004_assetlist.php', '4', '*** Batch update successful ***', 't004_asset', '', '', '', ''),
(192, '2020-06-19 13:19:07', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(193, '2020-06-19 13:19:15', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(194, '2020-06-19 13:21:06', '/simasset1/logout.php', 'admin', 'logout', '::1', '', '', '', ''),
(195, '2020-06-19 13:21:11', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(196, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '4', '', '4'),
(197, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '4', '', '15'),
(198, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '4', '', '9'),
(199, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '4', '', '0103'),
(200, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '4', '', 'Rack Shelf 4 Level Solid'),
(201, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '4', '', '2'),
(202, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '4', '', '2013-06-19'),
(203, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '4', '', '1500000'),
(204, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '4', '', '500000'),
(205, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '4', '', '1'),
(206, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '4', '', NULL),
(207, '2020-06-19 13:22:29', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '4', '', '4'),
(208, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '5', '', '4'),
(209, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '5', '', '15'),
(210, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '5', '', '9'),
(211, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '5', '', '0104'),
(212, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '5', '', 'Exhaust Hood w/ Filter + Lamp'),
(213, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '5', '', '2'),
(214, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '5', '', '2013-06-19'),
(215, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '5', '', '2000000'),
(216, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '5', '', '250000'),
(217, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '5', '', '1'),
(218, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '5', '', NULL),
(219, '2020-06-19 13:29:19', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '5', '', '5'),
(220, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '6', '', '4'),
(221, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '6', '', '15'),
(222, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '6', '', '9'),
(223, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '6', '', '0105'),
(224, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '6', '', 'Gas 1 Deck Oven w/ Profer'),
(225, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '6', '', '2'),
(226, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '6', '', '2013-06-19'),
(227, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '6', '', '2500000'),
(228, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '6', '', '350000'),
(229, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '6', '', '1'),
(230, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '6', '', NULL),
(231, '2020-06-19 13:32:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '6', '', '6'),
(232, '2020-06-20 07:39:09', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(233, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '7', '', '4'),
(234, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '7', '', '15'),
(235, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '7', '', '9'),
(236, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '7', '', '0106'),
(237, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '7', '', 'Work Table w/ Low Shelf'),
(238, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '7', '', '2'),
(239, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '7', '', '2013-06-20'),
(240, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '7', '', '2600000'),
(241, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '7', '', '600000'),
(242, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '7', '', '1'),
(243, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '7', '', NULL),
(244, '2020-06-20 07:41:21', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '7', '', '7'),
(245, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '8', '', '4'),
(246, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '8', '', '15'),
(247, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '8', '', '9'),
(248, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '8', '', '0107'),
(249, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '8', '', 'Wall Shelf 1 Deck'),
(250, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '8', '', '2'),
(251, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '8', '', '2013-06-20'),
(252, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '8', '', '2700000'),
(253, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '8', '', '700000'),
(254, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '8', '', '1'),
(255, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '8', '', NULL),
(256, '2020-06-20 07:44:33', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '8', '', '8'),
(257, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '9', '', '4'),
(258, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '9', '', '15'),
(259, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '9', '', '9'),
(260, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '9', '', '0108'),
(261, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '9', '', 'Table w/ Marble'),
(262, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '9', '', '2'),
(263, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '9', '', '2013-06-20'),
(264, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '9', '', '2800000'),
(265, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '9', '', '800000'),
(266, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '9', '', '1'),
(267, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '9', '', NULL),
(268, '2020-06-20 07:48:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '9', '', '9'),
(269, '2020-06-20 07:58:47', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(270, '2020-06-20 13:53:13', '/simasset1/login.php', 'admin', 'login', '::1', '', '', '', ''),
(271, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '10', '', '4'),
(272, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '10', '', '8'),
(273, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '10', '', '9'),
(274, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '10', '', '0109'),
(275, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '10', '', 'Sink 1 Bowl w/ Faucet H&amp;C'),
(276, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '10', '', '2'),
(277, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '10', '', '2013-06-20'),
(278, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '10', '', '2900000'),
(279, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '10', '', '900000'),
(280, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '10', '', '1'),
(281, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '10', '', NULL),
(282, '2020-06-20 15:27:43', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '10', '', '10'),
(283, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', '*** Batch update begin ***', 't004_asset', '', '', '', ''),
(284, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'department_id', '3', '15', '8'),
(285, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'department_id', '4', '15', '8'),
(286, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'department_id', '5', '15', '8'),
(287, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'department_id', '6', '15', '8'),
(288, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'department_id', '7', '15', '8'),
(289, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'department_id', '8', '15', '8'),
(290, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', 'U', 't004_asset', 'department_id', '9', '15', '8'),
(291, '2020-06-20 15:29:10', '/simasset1/t004_assetlist.php', '4', '*** Batch update successful ***', 't004_asset', '', '', '', ''),
(292, '2020-06-20 18:36:54', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'Description', '3', '', 'Data Test'),
(293, '2020-06-20 18:36:54', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'EconomicalLifeTime', '3', '', '2'),
(294, '2020-06-20 18:36:54', '/simasset1/t005_assetgroupadd.php', '4', 'A', 't005_assetgroup', 'id', '3', '', '3'),
(295, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '11', '', '4'),
(296, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '11', '', '8'),
(297, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '11', '', '9'),
(298, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '11', '', '0110'),
(299, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '11', '', 'Dough Mixer (Cap. 20 Liter)'),
(300, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '11', '', '3'),
(301, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '11', '', '2013-12-05'),
(302, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '11', '', '3100000'),
(303, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '11', '', '310000'),
(304, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '11', '', '1'),
(305, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '11', '', NULL),
(306, '2020-06-20 18:37:32', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '11', '', '11'),
(307, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '12', '', '4'),
(308, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '12', '', '8'),
(309, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '12', '', '9'),
(310, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '12', '', '0111'),
(311, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '12', '', 'Up Right Chiller 2 Doors'),
(312, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '12', '', '3'),
(313, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '12', '', '2013-12-05'),
(314, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '12', '', '3200000'),
(315, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '12', '', '200000'),
(316, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '12', '', '1'),
(317, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '12', '', NULL),
(318, '2020-06-20 18:57:08', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '12', '', '12'),
(319, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '13', '', '4'),
(320, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '13', '', '8'),
(321, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '13', '', '9'),
(322, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '13', '', '0112'),
(323, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '13', '', 'Mixer Portable (Cap. 5 liter)'),
(324, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '13', '', '3'),
(325, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '13', '', '2013-12-05'),
(326, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '13', '', '3300000'),
(327, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '13', '', '330000'),
(328, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '13', '', '1'),
(329, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '13', '', NULL),
(330, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '13', '', '2013-12-31'),
(331, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '13', '', '2015-11-30'),
(332, '2020-06-20 19:24:53', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '13', '', '13'),
(333, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '14', '', '4'),
(334, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '14', '', '8'),
(335, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '14', '', '9'),
(336, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '14', '', '0113'),
(337, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '14', '', 'Work Table w/ Low Shelf'),
(338, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '14', '', '3'),
(339, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '14', '', '2013-12-05'),
(340, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '14', '', '3400000'),
(341, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '14', '', '400000'),
(342, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '14', '', '1'),
(343, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '14', '', NULL),
(344, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '14', '', '2013-12-31'),
(345, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '14', '', '2015-11-30'),
(346, '2020-06-20 20:10:51', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '14', '', '14'),
(347, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', '*** Batch delete begin ***', 't004_asset', '', '', '', ''),
(348, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'id', '14', '14', ''),
(349, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'property_id', '14', '4', ''),
(350, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'department_id', '14', '8', ''),
(351, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'signature_id', '14', '9', ''),
(352, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Code', '14', '0113', ''),
(353, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'group_id', '14', '3', ''),
(354, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Description', '14', 'Work Table w/ Low Shelf', ''),
(355, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'ProcurementDate', '14', '2013-12-05', ''),
(356, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'ProcurementCurrentCost', '14', '3400000.00', ''),
(357, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Salvage', '14', '400000.00', ''),
(358, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Qty', '14', '1.00', ''),
(359, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Remarks', '14', NULL, ''),
(360, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'PeriodBegin', '14', '2013-12-31', ''),
(361, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'PeriodEnd', '14', '2015-11-30', ''),
(362, '2020-06-20 20:35:48', '/simasset1/t004_assetdelete.php', '4', '*** Batch delete successful ***', 't004_asset', '', '', '', ''),
(363, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', '*** Batch delete begin ***', 't004_asset', '', '', '', ''),
(364, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'id', '12', '12', ''),
(365, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'property_id', '12', '4', ''),
(366, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'department_id', '12', '8', ''),
(367, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'signature_id', '12', '9', ''),
(368, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Code', '12', '0111', ''),
(369, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'group_id', '12', '3', ''),
(370, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Description', '12', 'Up Right Chiller 2 Doors', ''),
(371, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'ProcurementDate', '12', '2013-12-05', ''),
(372, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'ProcurementCurrentCost', '12', '3200000.00', ''),
(373, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Salvage', '12', '200000.00', ''),
(374, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Qty', '12', '1.00', ''),
(375, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'Remarks', '12', NULL, ''),
(376, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'PeriodBegin', '12', '0000-00-00', ''),
(377, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', 'D', 't004_asset', 'PeriodEnd', '12', '0000-00-00', ''),
(378, '2020-06-20 20:36:16', '/simasset1/t004_assetdelete.php', '4', '*** Batch delete successful ***', 't004_asset', '', '', '', ''),
(379, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '15', '', '4'),
(380, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '15', '', '8'),
(381, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '15', '', '9'),
(382, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '15', '', '0114'),
(383, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '15', '', 'Wall Shelf 1 Deck'),
(384, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '15', '', '3'),
(385, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '15', '', '2013-12-05'),
(386, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '15', '', '1750000'),
(387, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '15', '', '17500'),
(388, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '15', '', '1'),
(389, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '15', '', NULL),
(390, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '15', '', '2013-12-31'),
(391, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '15', '', '2015-11-30'),
(392, '2020-06-20 22:27:45', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '15', '', '15'),
(393, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '16', '', '4'),
(394, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '16', '', '8'),
(395, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '16', '', '9'),
(396, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '16', '', '0115'),
(397, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '16', '', 'Sink 1 Bowl w/ Faucet H&amp;C'),
(398, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '16', '', '3'),
(399, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '16', '', '2013-12-05'),
(400, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '16', '', '1850000'),
(401, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '16', '', '18500'),
(402, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '16', '', '1'),
(403, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '16', '', NULL),
(404, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '16', '', '2013-12-31'),
(405, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '16', '', '2015-11-30'),
(406, '2020-06-20 22:30:30', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '16', '', '16'),
(407, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '17', '', '4'),
(408, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '17', '', '8'),
(409, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '17', '', '9'),
(410, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '17', '', '0116'),
(411, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '17', '', 'Work Table w/ Low Shelf'),
(412, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '17', '', '3'),
(413, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '17', '', '2013-12-05'),
(414, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '17', '', '1950000'),
(415, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '17', '', '195000'),
(416, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '17', '', '1'),
(417, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '17', '', NULL),
(418, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '17', '', '2013-12-31'),
(419, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '17', '', '2015-11-30'),
(420, '2020-06-20 22:33:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '17', '', '17'),
(421, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '18', '', '4'),
(422, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '18', '', '8'),
(423, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '18', '', '9'),
(424, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '18', '', '0117'),
(425, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '18', '', 'Sink 1 Bowl w/ Faucet H&amp;C'),
(426, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '18', '', '3');
INSERT INTO `t204_audittrail` (`id`, `datetime`, `script`, `user`, `action`, `table`, `field`, `keyvalue`, `oldvalue`, `newvalue`) VALUES
(427, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '18', '', '2013-12-05'),
(428, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '18', '', '2150000'),
(429, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '18', '', '215000'),
(430, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '18', '', '1'),
(431, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '18', '', NULL),
(432, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '18', '', '2013-12-31'),
(433, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '18', '', '2015-11-30'),
(434, '2020-06-20 22:44:34', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '18', '', '18'),
(435, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '19', '', '4'),
(436, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '19', '', '8'),
(437, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '19', '', '9'),
(438, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '19', '', '0118'),
(439, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '19', '', 'Under Counter Chiller 3 Doors'),
(440, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '19', '', '3'),
(441, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '19', '', '2013-12-05'),
(442, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '19', '', '2250000'),
(443, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '19', '', '225000'),
(444, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '19', '', '1'),
(445, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '19', '', NULL),
(446, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '19', '', '2013-12-31'),
(447, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '19', '', '2015-11-30'),
(448, '2020-06-20 22:47:44', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '19', '', '19'),
(449, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'property_id', '20', '', '4'),
(450, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'department_id', '20', '', '8'),
(451, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'signature_id', '20', '', '9'),
(452, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Code', '20', '', '0119'),
(453, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Description', '20', '', 'Insect Killer'),
(454, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'group_id', '20', '', '3'),
(455, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementDate', '20', '', '2013-12-05'),
(456, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'ProcurementCurrentCost', '20', '', '2350000'),
(457, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Salvage', '20', '', '235000'),
(458, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Qty', '20', '', '1'),
(459, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'Remarks', '20', '', NULL),
(460, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodBegin', '20', '', '2013-12-31'),
(461, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'PeriodEnd', '20', '', '2015-11-30'),
(462, '2020-06-20 23:05:37', '/simasset1/t004_assetadd.php', '4', 'A', 't004_asset', 'id', '20', '', '20'),
(463, '2020-06-20 23:18:52', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '20', '2350000.00', '25000000'),
(464, '2020-06-20 23:18:52', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Salvage', '20', '235000.00', '7000000'),
(465, '2020-06-20 23:21:07', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '20', '25000000.00', '26000000'),
(466, '2020-06-20 23:26:15', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '20', '26000000.00', '25000000'),
(467, '2020-06-20 23:27:01', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '20', '25000000.00', '26000000'),
(468, '2020-06-20 23:27:17', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'ProcurementCurrentCost', '20', '26000000.00', '25000000'),
(469, '2020-06-20 23:30:25', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Salvage', '20', '7000000.00', '8000000'),
(470, '2020-06-20 23:30:54', '/simasset1/t004_assetedit.php', '4', 'U', 't004_asset', 'Salvage', '20', '8000000.00', '7000000');

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
-- Indexes for table `t103_opname`
--
ALTER TABLE `t103_opname`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `t002_department`
--
ALTER TABLE `t002_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t003_signature`
--
ALTER TABLE `t003_signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `t004_asset`
--
ALTER TABLE `t004_asset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `t005_assetgroup`
--
ALTER TABLE `t005_assetgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t006_assetdepreciation`
--
ALTER TABLE `t006_assetdepreciation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `t101_ho_head`
--
ALTER TABLE `t101_ho_head`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t102_ho_detail`
--
ALTER TABLE `t102_ho_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t103_opname`
--
ALTER TABLE `t103_opname`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=471;

--
-- AUTO_INCREMENT for table `t205_parameter`
--
ALTER TABLE `t205_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
