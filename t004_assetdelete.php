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
$t004_asset_delete = new t004_asset_delete();

// Run the page
$t004_asset_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_assetdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft004_assetdelete = currentForm = new ew.Form("ft004_assetdelete", "delete");
	loadjs.done("ft004_assetdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_asset_delete->showPageHeader(); ?>
<?php
$t004_asset_delete->showMessage();
?>
<form name="ft004_assetdelete" id="ft004_assetdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t004_asset_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t004_asset_delete->property_id->Visible) { // property_id ?>
		<th class="<?php echo $t004_asset_delete->property_id->headerCellClass() ?>"><span id="elh_t004_asset_property_id" class="t004_asset_property_id"><?php echo $t004_asset_delete->property_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->group_id->Visible) { // group_id ?>
		<th class="<?php echo $t004_asset_delete->group_id->headerCellClass() ?>"><span id="elh_t004_asset_group_id" class="t004_asset_group_id"><?php echo $t004_asset_delete->group_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->type_id->Visible) { // type_id ?>
		<th class="<?php echo $t004_asset_delete->type_id->headerCellClass() ?>"><span id="elh_t004_asset_type_id" class="t004_asset_type_id"><?php echo $t004_asset_delete->type_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Code->Visible) { // Code ?>
		<th class="<?php echo $t004_asset_delete->Code->headerCellClass() ?>"><span id="elh_t004_asset_Code" class="t004_asset_Code"><?php echo $t004_asset_delete->Code->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Description->Visible) { // Description ?>
		<th class="<?php echo $t004_asset_delete->Description->headerCellClass() ?>"><span id="elh_t004_asset_Description" class="t004_asset_Description"><?php echo $t004_asset_delete->Description->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->brand_id->Visible) { // brand_id ?>
		<th class="<?php echo $t004_asset_delete->brand_id->headerCellClass() ?>"><span id="elh_t004_asset_brand_id" class="t004_asset_brand_id"><?php echo $t004_asset_delete->brand_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->signature_id->Visible) { // signature_id ?>
		<th class="<?php echo $t004_asset_delete->signature_id->headerCellClass() ?>"><span id="elh_t004_asset_signature_id" class="t004_asset_signature_id"><?php echo $t004_asset_delete->signature_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->department_id->Visible) { // department_id ?>
		<th class="<?php echo $t004_asset_delete->department_id->headerCellClass() ?>"><span id="elh_t004_asset_department_id" class="t004_asset_department_id"><?php echo $t004_asset_delete->department_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->location_id->Visible) { // location_id ?>
		<th class="<?php echo $t004_asset_delete->location_id->headerCellClass() ?>"><span id="elh_t004_asset_location_id" class="t004_asset_location_id"><?php echo $t004_asset_delete->location_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Qty->Visible) { // Qty ?>
		<th class="<?php echo $t004_asset_delete->Qty->headerCellClass() ?>"><span id="elh_t004_asset_Qty" class="t004_asset_Qty"><?php echo $t004_asset_delete->Qty->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Variance->Visible) { // Variance ?>
		<th class="<?php echo $t004_asset_delete->Variance->headerCellClass() ?>"><span id="elh_t004_asset_Variance" class="t004_asset_Variance"><?php echo $t004_asset_delete->Variance->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->cond_id->Visible) { // cond_id ?>
		<th class="<?php echo $t004_asset_delete->cond_id->headerCellClass() ?>"><span id="elh_t004_asset_cond_id" class="t004_asset_cond_id"><?php echo $t004_asset_delete->cond_id->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->Remarks->Visible) { // Remarks ?>
		<th class="<?php echo $t004_asset_delete->Remarks->headerCellClass() ?>"><span id="elh_t004_asset_Remarks" class="t004_asset_Remarks"><?php echo $t004_asset_delete->Remarks->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->ProcurementDate->Visible) { // ProcurementDate ?>
		<th class="<?php echo $t004_asset_delete->ProcurementDate->headerCellClass() ?>"><span id="elh_t004_asset_ProcurementDate" class="t004_asset_ProcurementDate"><?php echo $t004_asset_delete->ProcurementDate->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
		<th class="<?php echo $t004_asset_delete->ProcurementCurrentCost->headerCellClass() ?>"><span id="elh_t004_asset_ProcurementCurrentCost" class="t004_asset_ProcurementCurrentCost"><?php echo $t004_asset_delete->ProcurementCurrentCost->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->PeriodBegin->Visible) { // PeriodBegin ?>
		<th class="<?php echo $t004_asset_delete->PeriodBegin->headerCellClass() ?>"><span id="elh_t004_asset_PeriodBegin" class="t004_asset_PeriodBegin"><?php echo $t004_asset_delete->PeriodBegin->caption() ?></span></th>
<?php } ?>
<?php if ($t004_asset_delete->PeriodEnd->Visible) { // PeriodEnd ?>
		<th class="<?php echo $t004_asset_delete->PeriodEnd->headerCellClass() ?>"><span id="elh_t004_asset_PeriodEnd" class="t004_asset_PeriodEnd"><?php echo $t004_asset_delete->PeriodEnd->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t004_asset_delete->RecordCount = 0;
$i = 0;
while (!$t004_asset_delete->Recordset->EOF) {
	$t004_asset_delete->RecordCount++;
	$t004_asset_delete->RowCount++;

	// Set row properties
	$t004_asset->resetAttributes();
	$t004_asset->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t004_asset_delete->loadRowValues($t004_asset_delete->Recordset);

	// Render row
	$t004_asset_delete->renderRow();
?>
	<tr <?php echo $t004_asset->rowAttributes() ?>>
<?php if ($t004_asset_delete->property_id->Visible) { // property_id ?>
		<td <?php echo $t004_asset_delete->property_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_property_id" class="t004_asset_property_id">
<span<?php echo $t004_asset_delete->property_id->viewAttributes() ?>><?php echo $t004_asset_delete->property_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->group_id->Visible) { // group_id ?>
		<td <?php echo $t004_asset_delete->group_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_group_id" class="t004_asset_group_id">
<span<?php echo $t004_asset_delete->group_id->viewAttributes() ?>><?php echo $t004_asset_delete->group_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->type_id->Visible) { // type_id ?>
		<td <?php echo $t004_asset_delete->type_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_type_id" class="t004_asset_type_id">
<span<?php echo $t004_asset_delete->type_id->viewAttributes() ?>><?php echo $t004_asset_delete->type_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Code->Visible) { // Code ?>
		<td <?php echo $t004_asset_delete->Code->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Code" class="t004_asset_Code">
<span<?php echo $t004_asset_delete->Code->viewAttributes() ?>><?php echo $t004_asset_delete->Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Description->Visible) { // Description ?>
		<td <?php echo $t004_asset_delete->Description->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Description" class="t004_asset_Description">
<span<?php echo $t004_asset_delete->Description->viewAttributes() ?>><?php echo $t004_asset_delete->Description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->brand_id->Visible) { // brand_id ?>
		<td <?php echo $t004_asset_delete->brand_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_brand_id" class="t004_asset_brand_id">
<span<?php echo $t004_asset_delete->brand_id->viewAttributes() ?>><?php echo $t004_asset_delete->brand_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->signature_id->Visible) { // signature_id ?>
		<td <?php echo $t004_asset_delete->signature_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_signature_id" class="t004_asset_signature_id">
<span<?php echo $t004_asset_delete->signature_id->viewAttributes() ?>><?php echo $t004_asset_delete->signature_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->department_id->Visible) { // department_id ?>
		<td <?php echo $t004_asset_delete->department_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_department_id" class="t004_asset_department_id">
<span<?php echo $t004_asset_delete->department_id->viewAttributes() ?>><?php echo $t004_asset_delete->department_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->location_id->Visible) { // location_id ?>
		<td <?php echo $t004_asset_delete->location_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_location_id" class="t004_asset_location_id">
<span<?php echo $t004_asset_delete->location_id->viewAttributes() ?>><?php echo $t004_asset_delete->location_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Qty->Visible) { // Qty ?>
		<td <?php echo $t004_asset_delete->Qty->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Qty" class="t004_asset_Qty">
<span<?php echo $t004_asset_delete->Qty->viewAttributes() ?>><?php echo $t004_asset_delete->Qty->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Variance->Visible) { // Variance ?>
		<td <?php echo $t004_asset_delete->Variance->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Variance" class="t004_asset_Variance">
<span<?php echo $t004_asset_delete->Variance->viewAttributes() ?>><?php echo $t004_asset_delete->Variance->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->cond_id->Visible) { // cond_id ?>
		<td <?php echo $t004_asset_delete->cond_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_cond_id" class="t004_asset_cond_id">
<span<?php echo $t004_asset_delete->cond_id->viewAttributes() ?>><?php echo $t004_asset_delete->cond_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->Remarks->Visible) { // Remarks ?>
		<td <?php echo $t004_asset_delete->Remarks->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_Remarks" class="t004_asset_Remarks">
<span<?php echo $t004_asset_delete->Remarks->viewAttributes() ?>><?php echo $t004_asset_delete->Remarks->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->ProcurementDate->Visible) { // ProcurementDate ?>
		<td <?php echo $t004_asset_delete->ProcurementDate->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_ProcurementDate" class="t004_asset_ProcurementDate">
<span<?php echo $t004_asset_delete->ProcurementDate->viewAttributes() ?>><?php echo $t004_asset_delete->ProcurementDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
		<td <?php echo $t004_asset_delete->ProcurementCurrentCost->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_ProcurementCurrentCost" class="t004_asset_ProcurementCurrentCost">
<span<?php echo $t004_asset_delete->ProcurementCurrentCost->viewAttributes() ?>><?php echo $t004_asset_delete->ProcurementCurrentCost->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->PeriodBegin->Visible) { // PeriodBegin ?>
		<td <?php echo $t004_asset_delete->PeriodBegin->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_PeriodBegin" class="t004_asset_PeriodBegin">
<span<?php echo $t004_asset_delete->PeriodBegin->viewAttributes() ?>><?php echo $t004_asset_delete->PeriodBegin->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t004_asset_delete->PeriodEnd->Visible) { // PeriodEnd ?>
		<td <?php echo $t004_asset_delete->PeriodEnd->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_delete->RowCount ?>_t004_asset_PeriodEnd" class="t004_asset_PeriodEnd">
<span<?php echo $t004_asset_delete->PeriodEnd->viewAttributes() ?>><?php echo $t004_asset_delete->PeriodEnd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t004_asset_delete->Recordset->moveNext();
}
$t004_asset_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_asset_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t004_asset_delete->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t004_asset_delete->terminate();
?>