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
$c101_ho = new c101_ho();

// Run the page
$c101_ho->run();

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
$q = "select * from v101_ho where id = ".Get("id")."";
$r = ExecuteRows($q);

// ambil template file excel
$spreadsheet = $reader->load(__DIR__ . '/' . $r[0]["TemplateFile"]);

// cetak handover data head
$baserow = 8;
$row = $baserow   ; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["TransactionNo"]);
$row = $baserow+ 3; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["hoSignatureTo"]);
$row = $baserow+ 4; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["CodeNoTo"]);
$row = $baserow+ 5; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["hoDepartmentTo"]);
$row = $baserow+ 9; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["hoSignatureBy"]);
$row = $baserow+10; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["CodeNoBy"]);
$row = $baserow+11; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, $r[0]["hoDepartmentBy"]);
$row = $baserow+12; $spreadsheet->getActiveSheet()->setCellValue('D'.$row, date_format(date_create($r[0]["TransactionDate"]), "d-m-Y"));


// cetak handover data detail
$q = "select * from v101_ho where id = ".Get("id")."";
$r = ExecuteRows($q);
$i = 1;
$no = 1;
$baseRow = 28;
foreach ($r as $rs) {
	$row = $baseRow + $i;
	$spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);

	$rD = fCariDepreciationAmountYtd($rs["asset_id"], date_format(date_create($rs["TransactionDate"]), "Y"));
	
	$spreadsheet->getActiveSheet()->setCellValue('A' . $row, $no++)
		->setCellValue('B' . $row, $rs["Code"])
		->setCellValue('C' . $row, $rs["Description"])
		->setCellValue('D' . $row, $rs["AssetDepartment"])
		->setCellValue('E' . $row, date_format(date_create($rs["ProcurementDate"]), "d-m-Y"))
		->setCellValue('F' . $row, $rs["ProcurementCurrentCost"])
		->setCellValue('G' . $row, $rD["DepreciationAmount"])
		->setCellValue('H' . $row, $rD["DepreciationYtd"])
		->setCellValue('I' . $row, $rD["NetBookValue"])
		
		;
	$i++;
}
$spreadsheet->getActiveSheet()->removeRow($baseRow, 1);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('write.xlsx');
header("location: write.xlsx");
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c101_ho->terminate();
?>