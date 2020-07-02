-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 02, 2020 at 08:17 PM
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
-- Stand-in structure for view `v101_ho`
-- (See below for the actual view)
--
CREATE TABLE `v101_ho` (
`id` int(11)
,`property_id` int(11)
,`TransactionNo` varchar(25)
,`TransactionDate` date
,`HandedOverTo` int(11)
,`DepartmentTo` int(11)
,`HandedOverBy` int(11)
,`DepartmentBy` int(11)
,`Sign1` int(11)
,`Sign2` int(11)
,`Sign3` int(11)
,`Sign4` int(11)
,`hodetail_id` int(11)
,`asset_id` int(11)
,`Property` varchar(100)
,`TemplateFile` varchar(100)
,`hoDepartmentTo` varchar(100)
,`hoSignatureTo` varchar(100)
,`hoJobTitleTo` varchar(100)
,`hoDepartmentBy` varchar(100)
,`hoSignatureBy` varchar(100)
,`hoJobTitleBy` varchar(100)
,`Code` varchar(25)
,`Description` varchar(255)
,`Type` varchar(50)
,`Group` varchar(255)
,`ProcurementDate` date
,`ProcurementCurrentCost` float(17,2)
,`Estimated Life (in Year)` tinyint(4)
,`Qty` float(14,2)
,`Remarks` text
,`Sign1Signature` varchar(100)
,`Sign1JobTitle` varchar(100)
,`Sign2Signature` varchar(100)
,`Sign2JobTitle` varchar(100)
,`Sign3Signature` varchar(100)
,`Sign3JobTitle` varchar(100)
,`Sign4Signature` varchar(100)
,`Sign4JobTitle` varchar(100)
,`AssetDepartment` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v101_ho_2`
-- (See below for the actual view)
--
CREATE TABLE `v101_ho_2` (
`id` int(11)
,`property_id` int(11)
,`property` varchar(100)
,`templatefile` varchar(100)
,`transactionno` varchar(25)
,`transactiondate` date
,`handedoverto` int(11)
,`hoto` varchar(100)
,`departmentto` int(11)
,`deptto` varchar(100)
,`handedoverby` int(11)
,`hoby` varchar(100)
,`departmentby` int(11)
,`deptby` varchar(100)
,`sign1` int(11)
,`signa1` varchar(100)
,`jobt1` varchar(100)
,`sign2` int(11)
,`signa2` varchar(100)
,`jobt2` varchar(100)
,`sign3` int(11)
,`signa3` varchar(100)
,`jobt3` varchar(100)
,`sign4` int(11)
,`signa4` varchar(100)
,`jobt4` varchar(100)
,`hodetail_id` int(11)
,`asset_id` int(11)
,`code` varchar(25)
,`description` varchar(255)
,`department_id` int(11)
,`asset_dept` varchar(100)
,`procurementdate` date
,`procurementcurrentcost` float(17,2)
,`remarks` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v104_assetglobal`
-- (See below for the actual view)
--
CREATE TABLE `v104_assetglobal` (
`groupDescription` varchar(255)
,`typeDescription` varchar(50)
,`bookValue2Label` varchar(15)
,`bookValue2` bigint(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v101_ho`
--
DROP TABLE IF EXISTS `v101_ho`;

CREATE VIEW `v101_ho`  AS  select `a`.`id` AS `id`,`a`.`property_id` AS `property_id`,`a`.`TransactionNo` AS `TransactionNo`,`a`.`TransactionDate` AS `TransactionDate`,`a`.`HandedOverTo` AS `HandedOverTo`,`a`.`DepartmentTo` AS `DepartmentTo`,`a`.`HandedOverBy` AS `HandedOverBy`,`a`.`DepartmentBy` AS `DepartmentBy`,`a`.`Sign1` AS `Sign1`,`a`.`Sign2` AS `Sign2`,`a`.`Sign3` AS `Sign3`,`a`.`Sign4` AS `Sign4`,`b`.`id` AS `hodetail_id`,`b`.`asset_id` AS `asset_id`,`c`.`Property` AS `Property`,`c`.`TemplateFile` AS `TemplateFile`,`d`.`Department` AS `hoDepartmentTo`,`e`.`Signature` AS `hoSignatureTo`,`e`.`JobTitle` AS `hoJobTitleTo`,`f`.`Department` AS `hoDepartmentBy`,`g`.`Signature` AS `hoSignatureBy`,`g`.`JobTitle` AS `hoJobTitleBy`,`h`.`Code` AS `Code`,`h`.`Description` AS `Description`,`n`.`Description` AS `Type`,`o`.`Description` AS `Group`,`h`.`ProcurementDate` AS `ProcurementDate`,`h`.`ProcurementCurrentCost` AS `ProcurementCurrentCost`,`o`.`EstimatedLife` AS `Estimated Life (in Year)`,`h`.`Qty` AS `Qty`,`h`.`Remarks` AS `Remarks`,`i`.`Signature` AS `Sign1Signature`,`i`.`JobTitle` AS `Sign1JobTitle`,`j`.`Signature` AS `Sign2Signature`,`j`.`JobTitle` AS `Sign2JobTitle`,`k`.`Signature` AS `Sign3Signature`,`k`.`JobTitle` AS `Sign3JobTitle`,`l`.`Signature` AS `Sign4Signature`,`l`.`JobTitle` AS `Sign4JobTitle`,`m`.`Department` AS `AssetDepartment` from ((((((((((((((`t101_ho_head` `a` left join `t102_ho_detail` `b` on(`a`.`id` = `b`.`hohead_id`)) left join `t001_property` `c` on(`a`.`property_id` = `c`.`id`)) left join `t002_department` `d` on(`a`.`DepartmentTo` = `d`.`id`)) left join `t003_signature` `e` on(`a`.`HandedOverTo` = `e`.`id`)) left join `t002_department` `f` on(`a`.`DepartmentBy` = `f`.`id`)) left join `t003_signature` `g` on(`a`.`HandedOverBy` = `g`.`id`)) left join `t004_asset` `h` on(`b`.`asset_id` = `h`.`id`)) left join `t003_signature` `i` on(`a`.`Sign1` = `i`.`id`)) left join `t003_signature` `j` on(`a`.`Sign2` = `j`.`id`)) left join `t003_signature` `k` on(`a`.`Sign3` = `k`.`id`)) left join `t003_signature` `l` on(`a`.`Sign4` = `l`.`id`)) left join `t002_department` `m` on(`h`.`department_id` = `m`.`id`)) left join `t007_assettype` `n` on(`h`.`type_id` = `n`.`id`)) left join `t005_assetgroup` `o` on(`n`.`assetgroup_id` = `o`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v101_ho_2`
--
DROP TABLE IF EXISTS `v101_ho_2`;

CREATE VIEW `v101_ho_2`  AS  select `a`.`id` AS `id`,`a`.`property_id` AS `property_id`,`b`.`Property` AS `property`,`b`.`TemplateFile` AS `templatefile`,`a`.`TransactionNo` AS `transactionno`,`a`.`TransactionDate` AS `transactiondate`,`a`.`HandedOverTo` AS `handedoverto`,`c`.`Signature` AS `hoto`,`a`.`DepartmentTo` AS `departmentto`,`d`.`Department` AS `deptto`,`a`.`HandedOverBy` AS `handedoverby`,`e`.`Signature` AS `hoby`,`a`.`DepartmentBy` AS `departmentby`,`f`.`Department` AS `deptby`,`a`.`Sign1` AS `sign1`,`g`.`Signature` AS `signa1`,`g`.`JobTitle` AS `jobt1`,`a`.`Sign2` AS `sign2`,`h`.`Signature` AS `signa2`,`h`.`JobTitle` AS `jobt2`,`a`.`Sign3` AS `sign3`,`i`.`Signature` AS `signa3`,`i`.`JobTitle` AS `jobt3`,`a`.`Sign4` AS `sign4`,`j`.`Signature` AS `signa4`,`j`.`JobTitle` AS `jobt4`,`k`.`id` AS `hodetail_id`,`k`.`asset_id` AS `asset_id`,`l`.`Code` AS `code`,`l`.`Description` AS `description`,`l`.`department_id` AS `department_id`,`m`.`Department` AS `asset_dept`,`l`.`ProcurementDate` AS `procurementdate`,`l`.`ProcurementCurrentCost` AS `procurementcurrentcost`,`l`.`Remarks` AS `remarks` from ((((((((((((`t101_ho_head` `a` left join `t001_property` `b` on(`a`.`property_id` = `b`.`id`)) left join `t003_signature` `c` on(`a`.`HandedOverTo` = `c`.`id`)) left join `t002_department` `d` on(`a`.`DepartmentTo` = `d`.`id`)) left join `t003_signature` `e` on(`a`.`HandedOverBy` = `e`.`id`)) left join `t002_department` `f` on(`a`.`DepartmentBy` = `f`.`id`)) left join `t003_signature` `g` on(`a`.`Sign1` = `g`.`id`)) left join `t003_signature` `h` on(`a`.`Sign2` = `h`.`id`)) left join `t003_signature` `i` on(`a`.`Sign3` = `i`.`id`)) left join `t003_signature` `j` on(`a`.`Sign4` = `j`.`id`)) left join `t102_ho_detail` `k` on(`a`.`id` = `k`.`hohead_id`)) left join `t004_asset` `l` on(`k`.`asset_id` = `l`.`id`)) left join `t002_department` `m` on(`l`.`department_id` = `m`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v104_assetglobal`
--
DROP TABLE IF EXISTS `v104_assetglobal`;

CREATE VIEW `v104_assetglobal`  AS  select `a`.`Description` AS `groupDescription`,`b`.`Description` AS `typeDescription`,case when `b`.`Code` = 'TNH' then 'Tanah' when `b`.`Code` = 'BGN' then 'Bangunan' when `b`.`assetgroup_id` = 2 then 'Peralatan' when (`b`.`assetgroup_id` = 3 and `b`.`Code` <> '0V1' and `b`.`Code` <> '0V2') then 'Inventaris FF&E' when (`b`.`Code` = '0V1' or `b`.`Code` = '0V2') then 'Kendaraan' end AS `bookValue2Label`,case when `b`.`Code` = 'TNH' then 54216539197 when `b`.`Code` = 'BGN' then 2400000000 when `b`.`assetgroup_id` = 2 then 1183010327 when (`b`.`assetgroup_id` = 3 and `b`.`Code` <> '0V1' and `b`.`Code` <> '0V2') then 2256829315 when (`b`.`Code` = '0V1' or `b`.`Code` = '0V2') then 397272093 end AS `bookValue2` from (`t005_assetgroup` `a` left join `t007_assettype` `b` on(`a`.`id` = `b`.`assetgroup_id`)) where `b`.`Description` <> 'Kitchen Utensil' order by `a`.`id`,`b`.`id` ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
