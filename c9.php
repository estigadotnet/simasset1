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
$c9 = new c9();

// Run the page
$c9->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();
?>
<?php include_once "header.php"; ?>
<?php
//$dateStamp = \PhpOffice\PhpSpreadsheet\Calculation\DateTime::EDATE("2013-12-31", 23);
//$dateObj = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($dateStamp);
//echo $dateObj->format("Y-m-d");

//echo \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(\PhpOffice\PhpSpreadsheet\Calculation\DateTime::EDATE("2013-12-31", 23))->format("Y-m-d");

//fEdate();

//fCreatePenyusutan(array(
//	"id" => 13,
//	"group_id" => 3,
//	"ProcurementDate" => "2013-12-05"
//	));
?>

<?php if (Config("DEBUG")) echo GetDebugMessage(); ?>
<?php include_once "footer.php"; ?>
<?php
$c9->terminate();
?>