create view v101_ho_2 as
select
	a.id
    , a.property_id
    , b.property
    , b.templatefile
    , a.transactionno
    , a.transactiondate
    , a.handedoverto
    , c.signature as hoto
    , a.departmentto
    , d.department as deptto
    , a.handedoverby
    , e.signature as hoby
    , a.departmentby
    , f.department as deptby
    , a.sign1
    , g.signature as signa1
    , g.jobtitle as jobt1
    , a.sign2
    , h.signature as signa2
    , h.jobtitle as jobt2
    , a.sign3
    , i.signature as signa3
    , i.jobtitle as jobt3
    , a.sign4
    , j.signature as signa4
    , j.jobtitle as jobt4
    , k.id as hodetail_id
    , k.asset_id
    , l.code
    , l.description
    , l.department_id
    , m.department as asset_dept
    , l.procurementdate
    , l.procurementcurrentcost
    , l.remarks
from
	t101_ho_head a
    left join t001_property b on a.property_id = b.id
    left join t003_signature c on a.handedoverto = c.id
    left join t002_department d on a.departmentto = d.id
    left join t003_signature e on a.handedoverby = e.id
    left join t002_department f on a.departmentby = f.id
    left join t003_signature g on a.sign1 = g.id
    left join t003_signature h on a.sign2 = h.id
    left join t003_signature i on a.sign3 = i.id
    left join t003_signature j on a.sign4 = j.id
    left join t102_ho_detail k on a.id = k.hohead_id
    left join t004_asset l on k.asset_id = l.id
    left join t002_department m on l.department_id = m.id