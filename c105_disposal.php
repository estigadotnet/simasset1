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
$c105_disposal = new c105_disposal();

// Run the page
$c105_disposal->run();

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
$q = "select * from v105_disposal where id = ".Get("id")."";
$r = ExecuteRows($q);
$namaFile = $r[0]["templatefile2"];

// ambil template file excel
$spreadsheet = $reader->load(__DIR__ . '/' . $namaFile.".xlsx");

// cetak disposal data head
$baserow = 8;
$row = $baserow   ; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["transactionno"]." / ".date_format(date_create($r[0]["transactiondate"]), "d-m-Y"));
$row = $baserow+ 2; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["signatureby"]);
$row = $baserow+ 3; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["positionby"]);

// cetak disposal data detail
$q = "select * from v105_disposal where id = ".Get("id")."";
$r = ExecuteRows($q);
$i = 1;
$no = 1;
$baseRow = 15;
$ITEq = "";
foreach ($r as $rs) {
	$row = $baseRow + $i;
	$spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);

	$ITEq = substr($rs["code"], 3, 3);
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
		->setCellValue('J' . $row, $rD["NetBookValue"])
		->setCellValue('K' . $row, date_format(date_create($rs["disposaldate"]), "d-m-Y"))
		->setCellValue('L' . $row, substr($rs["condstatus"], 0, 1))
		->setCellValue('M' . $row, substr($rs["reasonstatus"], 0, 1))
		
		;
	$i++;
}
$spreadsheet->getActiveSheet()->removeRow($baseRow, 1);

// ambil data untuk footer
$q = "select * from v105_disposal where id = ".Get("id")."";
$r = ExecuteRows($q);
$baseRow = $row + 2;
if ($ITEq == "011") {
	$row = $baseRow   ; //$spreadsheet->getActiveSheet()->setCellValue('G'.$row, $r[0]["signaturece"]);
	$row = $baseRow+ 2; $spreadsheet->getActiveSheet()->setCellValue('G'.$row, $r[0]["signatureitm"]);
}
else {
	$row = $baseRow   ; $spreadsheet->getActiveSheet()->setCellValue('G'.$row, $r[0]["signaturece"]);
	$row = $baseRow+ 2; //$spreadsheet->getActiveSheet()->setCellValue('G'.$row, $r[0]["signatureitm"]);
}
//$row = $baseRow   ; $spreadsheet->getActiveSheet()->setCellValue('G'.$row, $r[0]["signaturece"]);
//$row = $baseRow+ 2; $spreadsheet->getActiveSheet()->setCellValue('G'.$row, $r[0]["signatureitm"]);
$row = $baseRow+11; $spreadsheet->getActiveSheet()->setCellValue('B'.$row, "Approved by: ".$r[0]["jobt1"].", ".$r[0]["jobt2"].", ".$r[0]["jobt3"]);
$row = $baseRow+16; $spreadsheet->getActiveSheet()
						->setCellValue('B'.$row, $r[0]["jobt1"])
						->setCellValue('F'.$row, $r[0]["jobt2"])
						->setCellValue('I'.$row, $r[0]["jobt3"])
						;

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($namaFile." Result.xlsx");
header("location: ".$namaFile." Result.xlsx");
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c105_disposal->terminate();
?>