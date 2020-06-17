create view v101_ho as
SELECT
	a.id AS id
	, a.property_id AS property_id
	, a.TransactionNo AS TransactionNo
	, a.TransactionDate AS TransactionDate
	, a.TransactionType AS TransactionType
	, a.HandedOverTo AS HandedOverTo
	, a.CodeNoTo AS CodeNoTo
	, a.DepartmentTo AS DepartmentTo
	, a.HandedOverBy AS HandedOverBy
	, a.CodeNoBy AS CodeNoBy
	, a.DepartmentBy AS DepartmentBy
	, a.Sign1 AS Sign1
	, a.Sign2 AS Sign2
	, a.Sign3 AS Sign3
	, a.Sign4 AS Sign4
	, b.id AS hodetail_id
	, b.asset_id AS asset_id
	, c.Property AS Property
	, c.TemplateFile AS TemplateFile
	, d.Department AS hoDepartmentTo
	, e.Signature AS hoSignatureTo
	, e.JobTitle AS hoJobTitleTo
	, f.Department AS hoDepartmentBy
	, g.Signature AS hoSignatureBy
	, g.JobTitle AS hoJobTitleBy
	, h.Description AS Description
	, h.ProcurementDate AS ProcurementDate
	, h.ProcurementCurrentCost AS ProcurementCurrentCost
	, h.DepreciationAmount AS DepreciationAmount
	, h.DepreciationYtd AS DepreciationYtd
	, h.NetBookValue AS NetBookValue
	, h.Periode AS Periode
	, h.Qty AS Qty
	, h.Remarks AS Remarks
    , i.Signature as Sign1Signature
    , i.JobTitle as Sign1JobTitle
    , j.Signature as Sign2Signature
    , j.JobTitle as Sign2JobTitle
    , k.Signature as Sign3Signature
    , k.JobTitle as Sign3JobTitle
    , l.Signature as Sign4Signature
    , l.JobTitle as Sign4JobTitle
FROM
	t101_ho_head a
	LEFT JOIN t102_ho_detail b ON a.id = b.hohead_id
	LEFT JOIN t001_property c ON a.property_id = c.id
	LEFT JOIN t002_department d ON a.DepartmentTo = d.id
	LEFT JOIN t003_signature e ON a.HandedOverTo = e.id
	LEFT JOIN t002_department f ON a.DepartmentBy = f.id
	LEFT JOIN t003_signature g ON a.HandedOverBy = g.id
	LEFT JOIN t004_asset h ON b.asset_id = h.id
    left join t003_signature i on a.Sign1 = i.id
    left join t003_signature j on a.Sign2 = j.id
    left join t003_signature k on a.Sign3 = k.id
    left join t003_signature l on a.Sign4 = l.id