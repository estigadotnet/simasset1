<?php
namespace PHPMaker2020\p_simasset1;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$c101_ho_2 = new c101_ho_2();

// Run the page
$c101_ho_2->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
$reader = IOFactory::createReader('Xlsx');

// ambil data
$q = "select * from v101_ho_2 where id = ".Get("id")."";
$r = ExecuteRows($q);
$namaFile = $r[0]["templatefile"];

// ambil template file excel
$spreadsheet = $reader->load(__DIR__ . '/' . $namaFile.".xlsx");

// cetak handover data head
$baserow = 8;
$row = $baserow   ; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["transactionno"]);
$row = $baserow+ 3; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["hoto"]);
$row = $baserow+ 4; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, html_entity_decode($r[0]["deptto"]));
$row = $baserow+ 8; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["hoby"]);
$row = $baserow+ 9; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, html_entity_decode($r[0]["deptby"]));
$row = $baserow+10; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, date_format(date_create($r[0]["transactiondate"]), "d-m-Y"));


// cetak handover data detail
$q = "select * from v101_ho_2 where id = ".Get("id")."";
$r = ExecuteRows($q);
$i = 1;
$no = 1;
$baseRow = 26;
foreach ($r as $rs) {
	$row = $baseRow + $i;
	$spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);

	$rD = fCariDepreciationAmountYtd($rs["asset_id"], date_format(date_create($rs["transactiondate"]), "Y"));
	
	$spreadsheet->getActiveSheet()
		->setCellValue('B' . $row, $rs["code"])
		->setCellValue('C' . $row, $rs["description"])
		->setCellValue('D' . $row, html_entity_decode($rs["asset_dept"]))
		->setCellValue('E' . $row, date_format(date_create($rs["procurementdate"]), "d-m-Y"))
		->setCellValue('F' . $row, $rs["procurementcurrentcost"])
		->setCellValue('G' . $row, $rD["DepreciationAmount"])
		->setCellValue('H' . $row, $rD["DepreciationYtd"])
		->setCellValue('I' . $row, $rD["NetBookValue"])
		
		;
	$i++;
}
$spreadsheet->getActiveSheet()->removeRow($baseRow, 1);

// ambil data untuk footer
$q = "select * from v101_ho_2 where id = ".Get("id")."";
$r = ExecuteRows($q);
$baseRow = $row + 1;
$row = $baseRow   ; $spreadsheet->getActiveSheet()->setCellValue('B'.$row, "Approved by: ".$r[0]["jobt1"].", ".$r[0]["jobt2"].", ".$r[0]["jobt3"]);
$row = $baseRow+ 4; $spreadsheet->getActiveSheet()
						->setCellValue('B'.$row, $r[0]["signa1"])
						->setCellValue('F'.$row, $r[0]["signa2"])
						->setCellValue('I'.$row, $r[0]["signa3"])
						;
$row = $baseRow+14; $spreadsheet->getActiveSheet()->setCellValue('I'.$row, $r[0]["signa4"]);

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($namaFile." Result.xlsx");
header("location: ".$namaFile." Result.xlsx");
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c101_ho_2->terminate();
?>