CREATE 
    -- ALGORITHM = UNDEFINED 
    -- DEFINER = `root`@`localhost` 
    -- SQL SECURITY DEFINER
VIEW `v101_ho` AS
    SELECT 
        `a`.`id` AS `id`,
        `a`.`property_id` AS `property_id`,
        `a`.`TransactionNo` AS `TransactionNo`,
        `a`.`TransactionDate` AS `TransactionDate`,
        `a`.`TransactionType` AS `TransactionType`,
        `a`.`HandedOverTo` AS `HandedOverTo`,
        `a`.`CodeNoTo` AS `CodeNoTo`,
        `a`.`DepartmentTo` AS `DepartmentTo`,
        `a`.`HandedOverBy` AS `HandedOverBy`,
        `a`.`CodeNoBy` AS `CodeNoBy`,
        `a`.`DepartmentBy` AS `DepartmentBy`,
        `a`.`Sign1` AS `Sign1`,
        `a`.`Sign2` AS `Sign2`,
        `a`.`Sign3` AS `Sign3`,
        `a`.`Sign4` AS `Sign4`,
        `b`.`id` AS `hodetail_id`,
        `b`.`asset_id` AS `asset_id`,
        `c`.`Property` AS `Property`,
        `c`.`TemplateFile` AS `TemplateFile`,
        `d`.`Department` AS `hoDepartmentTo`,
        `e`.`Signature` AS `hoSignatureTo`,
        `e`.`JobTitle` AS `hoJobTitleTo`,
        `f`.`Department` AS `hoDepartmentBy`,
        `g`.`Signature` AS `hoSignatureBy`,
        `g`.`JobTitle` AS `hoJobTitleBy`,
        `h`.`Code` AS `Code`,
        `h`.`Description` AS `Description`,
        `n`.`Description` AS `Type`,
        `o`.`Description` AS `Group`,
        `h`.`ProcurementDate` AS `ProcurementDate`,
        `h`.`ProcurementCurrentCost` AS `ProcurementCurrentCost`,
        `o`.`EstimatedLife` AS `Estimated Life (in Year)`,
        `h`.`Qty` AS `Qty`,
        `h`.`Remarks` AS `Remarks`,
        `i`.`Signature` AS `Sign1Signature`,
        `i`.`JobTitle` AS `Sign1JobTitle`,
        `j`.`Signature` AS `Sign2Signature`,
        `j`.`JobTitle` AS `Sign2JobTitle`,
        `k`.`Signature` AS `Sign3Signature`,
        `k`.`JobTitle` AS `Sign3JobTitle`,
        `l`.`Signature` AS `Sign4Signature`,
        `l`.`JobTitle` AS `Sign4JobTitle`,
        `m`.`Department` AS `AssetDepartment`
    FROM
        ((((((((((((((`t101_ho_head` `a`
        LEFT JOIN `t102_ho_detail` `b` ON (`a`.`id` = `b`.`hohead_id`))
        LEFT JOIN `t001_property` `c` ON (`a`.`property_id` = `c`.`id`))
        LEFT JOIN `t002_department` `d` ON (`a`.`DepartmentTo` = `d`.`id`))
        LEFT JOIN `t003_signature` `e` ON (`a`.`HandedOverTo` = `e`.`id`))
        LEFT JOIN `t002_department` `f` ON (`a`.`DepartmentBy` = `f`.`id`))
        LEFT JOIN `t003_signature` `g` ON (`a`.`HandedOverBy` = `g`.`id`))
        LEFT JOIN `t004_asset` `h` ON (`b`.`asset_id` = `h`.`id`))
        LEFT JOIN `t003_signature` `i` ON (`a`.`Sign1` = `i`.`id`))
        LEFT JOIN `t003_signature` `j` ON (`a`.`Sign2` = `j`.`id`))
        LEFT JOIN `t003_signature` `k` ON (`a`.`Sign3` = `k`.`id`))
        LEFT JOIN `t003_signature` `l` ON (`a`.`Sign4` = `l`.`id`))
        LEFT JOIN `t002_department` `m` ON (`h`.`department_id` = `m`.`id`))
        LEFT JOIN `t007_assettype` `n` ON (`h`.`type_id` = `n`.`id`))
        LEFT JOIN `t005_assetgroup` `o` ON (`n`.`assetgroup_id` = `o`.`id`))