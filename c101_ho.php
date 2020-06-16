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
$spreadsheet = $reader->load(__DIR__ . '/ASSET HANDOVER FORM - ABCH.xlsx');


$q = "select * from t101_ho_head";
$r = ExecuteRows($q);
$i = 1;
$no = 1;
$baseRow = 28;
foreach ($r as $rs) {
	$row = $baseRow + $i;
	$spreadsheet->getActiveSheet()->insertNewRowBefore($row, 1);
	
	$spreadsheet->getActiveSheet()->setCellValue('A' . $row, $no++)
		->setCellValue('B' . $row, $rs["property_id"])
		->setCellValue('C' . $row, $rs["TransactionNo"])
		->setCellValue('D' . $row, $rs["TransactionDate"]);
	$i++;
}
$spreadsheet->getActiveSheet()->removeRow($baseRow - 1, 1);
$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('write.xlsx');
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c101_ho->terminate();
?>