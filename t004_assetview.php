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
$t004_asset_view = new t004_asset_view();

// Run the page
$t004_asset_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_asset_view->isExport()) { ?>
<script>
var ft004_assetview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft004_assetview = currentForm = new ew.Form("ft004_assetview", "view");
	loadjs.done("ft004_assetview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_asset_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t004_asset_view->ExportOptions->render("body") ?>
<?php $t004_asset_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t004_asset_view->showPageHeader(); ?>
<?php
$t004_asset_view->showMessage();
?>
<form name="ft004_assetview" id="ft004_assetview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<input type="hidden" name="modal" value="<?php echo (int)$t004_asset_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t004_asset_view->property_id->Visible) { // property_id ?>
	<tr id="r_property_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_property_id"><?php echo $t004_asset_view->property_id->caption() ?></span></td>
		<td data-name="property_id" <?php echo $t004_asset_view->property_id->cellAttributes() ?>>
<span id="el_t004_asset_property_id">
<span<?php echo $t004_asset_view->property_id->viewAttributes() ?>><?php echo $t004_asset_view->property_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->department_id->Visible) { // department_id ?>
	<tr id="r_department_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_department_id"><?php echo $t004_asset_view->department_id->caption() ?></span></td>
		<td data-name="department_id" <?php echo $t004_asset_view->department_id->cellAttributes() ?>>
<span id="el_t004_asset_department_id">
<span<?php echo $t004_asset_view->department_id->viewAttributes() ?>><?php echo $t004_asset_view->department_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->signature_id->Visible) { // signature_id ?>
	<tr id="r_signature_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_signature_id"><?php echo $t004_asset_view->signature_id->caption() ?></span></td>
		<td data-name="signature_id" <?php echo $t004_asset_view->signature_id->cellAttributes() ?>>
<span id="el_t004_asset_signature_id">
<span<?php echo $t004_asset_view->signature_id->viewAttributes() ?>><?php echo $t004_asset_view->signature_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->Code->Visible) { // Code ?>
	<tr id="r_Code">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_Code"><?php echo $t004_asset_view->Code->caption() ?></span></td>
		<td data-name="Code" <?php echo $t004_asset_view->Code->cellAttributes() ?>>
<span id="el_t004_asset_Code">
<span<?php echo $t004_asset_view->Code->viewAttributes() ?>><?php echo $t004_asset_view->Code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->Description->Visible) { // Description ?>
	<tr id="r_Description">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_Description"><?php echo $t004_asset_view->Description->caption() ?></span></td>
		<td data-name="Description" <?php echo $t004_asset_view->Description->cellAttributes() ?>>
<span id="el_t004_asset_Description">
<span<?php echo $t004_asset_view->Description->viewAttributes() ?>><?php echo $t004_asset_view->Description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->group_id->Visible) { // group_id ?>
	<tr id="r_group_id">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_group_id"><?php echo $t004_asset_view->group_id->caption() ?></span></td>
		<td data-name="group_id" <?php echo $t004_asset_view->group_id->cellAttributes() ?>>
<span id="el_t004_asset_group_id">
<span<?php echo $t004_asset_view->group_id->viewAttributes() ?>><?php echo $t004_asset_view->group_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->ProcurementDate->Visible) { // ProcurementDate ?>
	<tr id="r_ProcurementDate">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_ProcurementDate"><?php echo $t004_asset_view->ProcurementDate->caption() ?></span></td>
		<td data-name="ProcurementDate" <?php echo $t004_asset_view->ProcurementDate->cellAttributes() ?>>
<span id="el_t004_asset_ProcurementDate">
<span<?php echo $t004_asset_view->ProcurementDate->viewAttributes() ?>><?php echo $t004_asset_view->ProcurementDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
	<tr id="r_ProcurementCurrentCost">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_ProcurementCurrentCost"><?php echo $t004_asset_view->ProcurementCurrentCost->caption() ?></span></td>
		<td data-name="ProcurementCurrentCost" <?php echo $t004_asset_view->ProcurementCurrentCost->cellAttributes() ?>>
<span id="el_t004_asset_ProcurementCurrentCost">
<span<?php echo $t004_asset_view->ProcurementCurrentCost->viewAttributes() ?>><?php echo $t004_asset_view->ProcurementCurrentCost->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->Salvage->Visible) { // Salvage ?>
	<tr id="r_Salvage">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_Salvage"><?php echo $t004_asset_view->Salvage->caption() ?></span></td>
		<td data-name="Salvage" <?php echo $t004_asset_view->Salvage->cellAttributes() ?>>
<span id="el_t004_asset_Salvage">
<span<?php echo $t004_asset_view->Salvage->viewAttributes() ?>><?php echo $t004_asset_view->Salvage->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->Qty->Visible) { // Qty ?>
	<tr id="r_Qty">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_Qty"><?php echo $t004_asset_view->Qty->caption() ?></span></td>
		<td data-name="Qty" <?php echo $t004_asset_view->Qty->cellAttributes() ?>>
<span id="el_t004_asset_Qty">
<span<?php echo $t004_asset_view->Qty->viewAttributes() ?>><?php echo $t004_asset_view->Qty->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->Remarks->Visible) { // Remarks ?>
	<tr id="r_Remarks">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_Remarks"><?php echo $t004_asset_view->Remarks->caption() ?></span></td>
		<td data-name="Remarks" <?php echo $t004_asset_view->Remarks->cellAttributes() ?>>
<span id="el_t004_asset_Remarks">
<span<?php echo $t004_asset_view->Remarks->viewAttributes() ?>><?php echo $t004_asset_view->Remarks->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->PeriodBegin->Visible) { // PeriodBegin ?>
	<tr id="r_PeriodBegin">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_PeriodBegin"><?php echo $t004_asset_view->PeriodBegin->caption() ?></span></td>
		<td data-name="PeriodBegin" <?php echo $t004_asset_view->PeriodBegin->cellAttributes() ?>>
<span id="el_t004_asset_PeriodBegin">
<span<?php echo $t004_asset_view->PeriodBegin->viewAttributes() ?>><?php echo $t004_asset_view->PeriodBegin->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t004_asset_view->PeriodEnd->Visible) { // PeriodEnd ?>
	<tr id="r_PeriodEnd">
		<td class="<?php echo $t004_asset_view->TableLeftColumnClass ?>"><span id="elh_t004_asset_PeriodEnd"><?php echo $t004_asset_view->PeriodEnd->caption() ?></span></td>
		<td data-name="PeriodEnd" <?php echo $t004_asset_view->PeriodEnd->cellAttributes() ?>>
<span id="el_t004_asset_PeriodEnd">
<span<?php echo $t004_asset_view->PeriodEnd->viewAttributes() ?>><?php echo $t004_asset_view->PeriodEnd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php
	if (in_array("t006_assetdepreciation", explode(",", $t004_asset->getCurrentDetailTable())) && $t006_assetdepreciation->DetailView) {
?>
<?php if ($t004_asset->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t006_assetdepreciation", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t006_assetdepreciationgrid.php" ?>
<?php } ?>
</form>
<?php
$t004_asset_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_asset_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t004_asset_view->terminate();
?>