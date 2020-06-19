-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 19, 2020 at 05:15 AM
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
  `Remarks` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `t004_asset`
--

INSERT INTO `t004_asset` (`id`, `property_id`, `department_id`, `signature_id`, `Code`, `group_id`, `Description`, `ProcurementDate`, `ProcurementCurrentCost`, `Salvage`, `Qty`, `Remarks`) VALUES
(2, 4, 8, 9, '0101', 2, 'Cold Room Freezer w/ Rack', '2020-05-17', 0.00, 0.00, 1.00, NULL),
(3, 4, 15, 9, '0102', 2, 'Cold Room Chiller w/ Rack', '2020-06-17', 0.00, 0.00, 1.00, NULL);

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
(2, 'Kitchen Equipment', 10);

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
(191, '2020-06-19 10:09:49', '/simasset1/t004_assetlist.php', '4', '*** Batch update successful ***', 't004_asset', '', '', '', '');

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

-- --------------------------------------------------------

--
-- Stand-in structure for view `v101_ho`
-- (See below for the actual view)
--
CREATE TABLE `v101_ho` (
);

-- --------------------------------------------------------

--
-- Structure for view `v101_ho`
--
DROP TABLE IF EXISTS `v101_ho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v101_ho`  AS  select `a`.`id` AS `id`,`a`.`property_id` AS `property_id`,`a`.`TransactionNo` AS `TransactionNo`,`a`.`TransactionDate` AS `TransactionDate`,`a`.`TransactionType` AS `TransactionType`,`a`.`HandedOverTo` AS `HandedOverTo`,`a`.`CodeNoTo` AS `CodeNoTo`,`a`.`DepartmentTo` AS `DepartmentTo`,`a`.`HandedOverBy` AS `HandedOverBy`,`a`.`CodeNoBy` AS `CodeNoBy`,`a`.`DepartmentBy` AS `DepartmentBy`,`a`.`Sign1` AS `Sign1`,`a`.`Sign2` AS `Sign2`,`a`.`Sign3` AS `Sign3`,`a`.`Sign4` AS `Sign4`,`b`.`id` AS `hodetail_id`,`b`.`asset_id` AS `asset_id`,`c`.`Property` AS `Property`,`c`.`TemplateFile` AS `TemplateFile`,`d`.`Department` AS `hoDepartmentTo`,`e`.`Signature` AS `hoSignatureTo`,`e`.`JobTitle` AS `hoJobTitleTo`,`f`.`Department` AS `hoDepartmentBy`,`g`.`Signature` AS `hoSignatureBy`,`g`.`JobTitle` AS `hoJobTitleBy`,`h`.`Description` AS `Description`,`h`.`ProcurementDate` AS `ProcurementDate`,`h`.`ProcurementCurrentCost` AS `ProcurementCurrentCost`,`h`.`DepreciationAmount` AS `DepreciationAmount`,`h`.`DepreciationYtd` AS `DepreciationYtd`,`h`.`NetBookValue` AS `NetBookValue`,`h`.`Periode` AS `Periode`,`h`.`Qty` AS `Qty`,`h`.`Remarks` AS `Remarks`,`i`.`Signature` AS `Sign1Signature`,`i`.`JobTitle` AS `Sign1JobTitle`,`j`.`Signature` AS `Sign2Signature`,`j`.`JobTitle` AS `Sign2JobTitle`,`k`.`Signature` AS `Sign3Signature`,`k`.`JobTitle` AS `Sign3JobTitle`,`l`.`Signature` AS `Sign4Signature`,`l`.`JobTitle` AS `Sign4JobTitle`,`m`.`Department` AS `AssetDepartment` from ((((((((((((`t101_ho_head` `a` left join `t102_ho_detail` `b` on(`a`.`id` = `b`.`hohead_id`)) left join `t001_property` `c` on(`a`.`property_id` = `c`.`id`)) left join `t002_department` `d` on(`a`.`DepartmentTo` = `d`.`id`)) left join `t003_signature` `e` on(`a`.`HandedOverTo` = `e`.`id`)) left join `t002_department` `f` on(`a`.`DepartmentBy` = `f`.`id`)) left join `t003_signature` `g` on(`a`.`HandedOverBy` = `g`.`id`)) left join `t004_asset` `h` on(`b`.`asset_id` = `h`.`id`)) left join `t003_signature` `i` on(`a`.`Sign1` = `i`.`id`)) left join `t003_signature` `j` on(`a`.`Sign2` = `j`.`id`)) left join `t003_signature` `k` on(`a`.`Sign3` = `k`.`id`)) left join `t003_signature` `l` on(`a`.`Sign4` = `l`.`id`)) left join `t002_department` `m` on(`h`.`department_id` = `m`.`id`)) ;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t005_assetgroup`
--
ALTER TABLE `t005_assetgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `t205_parameter`
--
ALTER TABLE `t205_parameter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
