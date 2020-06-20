<?php
namespace PHPMaker2020\p_simasset1;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

// Filter for 'Last Month' (example)
function GetLastMonthFilter($FldExpression, $dbid = 0) {
	$today = getdate();
	$lastmonth = mktime(0, 0, 0, $today['mon']-1, 1, $today['year']);
	$val = date("Y|m", $lastmonth);
	$wrk = $FldExpression . " BETWEEN " .
		QuotedValue(DateValue("month", $val, 1, $dbid), DATATYPE_DATE, $dbid) .
		" AND " .
		QuotedValue(DateValue("month", $val, 2, $dbid), DATATYPE_DATE, $dbid);
	return $wrk;
}

// Filter for 'Starts With A' (example)
function GetStartsWithAFilter($FldExpression, $dbid = 0) {
	return $FldExpression . Like("'A%'", $dbid);
}

// Global user functions
// Database Connecting event
function Database_Connecting(&$info) {

	// Example:
	//var_dump($info);
	//if ($info["id"] == "DB" && CurrentUserIP() == "127.0.0.1") { // Testing on local PC
	//	$info["host"] = "locahost";
	//	$info["user"] = "root";
	//	$info["pass"] = "";
	//}

	if (CurrentHost() == "simasset1.aimpglobal.com") { // not connecting to local PC

		// connect to the production database 
		$info["host"] = "mysql.hostinger.co.id";
		$info["user"] = "u197022578_simasset1";
		$info["pass"] = "PresarioCQ43";
		$info["db"] = "u197022578_simasset1";
		$info["port"] = "3306";
	}
}

// Database Connected event
function Database_Connected(&$conn) {

	// Example:
	//if ($conn->info["id"] == "DB")
	//	$conn->Execute("Your SQL");

}

function MenuItem_Adding($item) {

	//var_dump($item);
	// Return FALSE if menu item not allowed
	//return TRUE;

	return IsLoggedIn();
}

function Menu_Rendering($menu) {

	// Change menu items here
}

function Menu_Rendered($menu) {

	// Clean up here
}

// Page Loading event
function Page_Loading() {

	//echo "Page Loading";
}

// Page Rendering event
function Page_Rendering() {

	//echo "Page Rendering";
}

// Page Unloaded event
function Page_Unloaded() {

	//echo "Page Unloaded";
}

// AuditTrail Inserting event
function AuditTrail_Inserting(&$rsnew) {

	//var_dump($rsnew);
	return TRUE;
}

// Personal Data Downloading event
function PersonalData_Downloading(&$row) {

	//echo "PersonalData Downloading";
}

// Personal Data Deleted event
function PersonalData_Deleted($row) {

	//echo "PersonalData Deleted";
}

function fDeletePenyusutan($id) {

	// delete data penyusutan berdasarkan asset_id = $id
	$q = "delete from t006_assetdepreciation where asset_id = ".$id."";
	Execute($q);
}

function fCreatePenyusutan($rsnew) {

	// ambil nilai economical life time
	// untuk acuan looping list of year

	$q = "select EconomicalLifeTime from t005_assetgroup where id = ".$rsnew["group_id"]."";
	$economicalLifeTime = ExecuteScalar($q);

	// mencari acuan looping
	list($awalPeriode, $akhirPeriode) = fCariAwalAkhirPeriode($rsnew["group_id"], $rsnew["ProcurementDate"]);
	$tahunAwal = date_format(date_create($rsnew["ProcurementDate"]), "Y");
	$tahunAkhir = date_format(date_create($akhirPeriode), "Y");

	//for ($record = 1; $record <= $economicalLifeTime; $record++) {
	for ($record = $tahunAwal; $record <= $tahunAkhir; $record++) {

		// ListOfYears
		if ($record == $tahunAwal) {
			$listOfYears = $tahunAwal;
		}
		else {
			$listOfYears++;
		}

		// NumberOfMonths
		if ($listOfYears == date_format(date_create($awalPeriode), "Y")) {
			$numberOfMonths = 12 - date_format(date_create($awalPeriode), "m") + 1;
		}
		else if ($listOfYears < $tahunAkhir) {
			$numberOfMonths = 12;
		}
		else if ($listOfYears == $tahunAkhir) {
			$numberOfMonths = date_format(date_create($akhirPeriode), "m");
		}

		// DepreciationAmount
		$depreciationAmount = \PhpOffice\PhpSpreadsheet\Calculation\Financial::SLN(
		$rsnew["ProcurementCurrentCost"], $rsnew["Salvage"], $economicalLifeTime) / 12 * $numberOfMonths;

		// DepreciationYtd
		$depreciationYtd += $depreciationAmount;

		// NetBookValue
		$netBookValue = $rsnew["ProcurementCurrentCost"] - $depreciationYtd;

		// create data penyusutan
		$q = "insert into t006_assetdepreciation (
			asset_id,
			ListOfYears,
			NumberOfMonths,
			DepreciationAmount,
			DepreciationYtd,
			NetBookValue
			) values (".
			$rsnew["id"].", ".
			$listOfYears.", ".
			$numberOfMonths.", ".
			$depreciationAmount.", ".
			$depreciationYtd.", ".
			$netBookValue.")";
		Execute($q);
	}
}

function fCariAwalAkhirPeriode($group_id, $ProcurementDate) {

	// ambil nilai economical life time
	$q = "select EconomicalLifeTime from t005_assetgroup where id = ".$group_id."";
	$economicalLifeTime = ExecuteScalar($q);

	// ambil nilai awal periode
	$date = date_create($ProcurementDate);
	$awalPeriode = date_format($date, "Y-m-t");

	// ambil nilai akhir periode
	$akhirPeriode = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(\PhpOffice\PhpSpreadsheet\Calculation\DateTime::EDATE($awalPeriode, ($economicalLifeTime*12)-1))->format("Y-m-d");
	return array($awalPeriode, $akhirPeriode);
}
?>