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
$t006_assetdepreciation_delete = new t006_assetdepreciation_delete();

// Run the page
$t006_assetdepreciation_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_assetdepreciation_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft006_assetdepreciationdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft006_assetdepreciationdelete = currentForm = new ew.Form("ft006_assetdepreciationdelete", "delete");
	loadjs.done("ft006_assetdepreciationdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t006_assetdepreciation_delete->showPageHeader(); ?>
<?php
$t006_assetdepreciation_delete->showMessage();
?>
<form name="ft006_assetdepreciationdelete" id="ft006_assetdepreciationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_assetdepreciation">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t006_assetdepreciation_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t006_assetdepreciation_delete->asset_id->Visible) { // asset_id ?>
		<th class="<?php echo $t006_assetdepreciation_delete->asset_id->headerCellClass() ?>"><span id="elh_t006_assetdepreciation_asset_id" class="t006_assetdepreciation_asset_id"><?php echo $t006_assetdepreciation_delete->asset_id->caption() ?></span></th>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->ListOfYears->Visible) { // ListOfYears ?>
		<th class="<?php echo $t006_assetdepreciation_delete->ListOfYears->headerCellClass() ?>"><span id="elh_t006_assetdepreciation_ListOfYears" class="t006_assetdepreciation_ListOfYears"><?php echo $t006_assetdepreciation_delete->ListOfYears->caption() ?></span></th>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->NumberOfMonths->Visible) { // NumberOfMonths ?>
		<th class="<?php echo $t006_assetdepreciation_delete->NumberOfMonths->headerCellClass() ?>"><span id="elh_t006_assetdepreciation_NumberOfMonths" class="t006_assetdepreciation_NumberOfMonths"><?php echo $t006_assetdepreciation_delete->NumberOfMonths->caption() ?></span></th>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->DepreciationAmount->Visible) { // DepreciationAmount ?>
		<th class="<?php echo $t006_assetdepreciation_delete->DepreciationAmount->headerCellClass() ?>"><span id="elh_t006_assetdepreciation_DepreciationAmount" class="t006_assetdepreciation_DepreciationAmount"><?php echo $t006_assetdepreciation_delete->DepreciationAmount->caption() ?></span></th>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->DepreciationYtd->Visible) { // DepreciationYtd ?>
		<th class="<?php echo $t006_assetdepreciation_delete->DepreciationYtd->headerCellClass() ?>"><span id="elh_t006_assetdepreciation_DepreciationYtd" class="t006_assetdepreciation_DepreciationYtd"><?php echo $t006_assetdepreciation_delete->DepreciationYtd->caption() ?></span></th>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->NetBookValue->Visible) { // NetBookValue ?>
		<th class="<?php echo $t006_assetdepreciation_delete->NetBookValue->headerCellClass() ?>"><span id="elh_t006_assetdepreciation_NetBookValue" class="t006_assetdepreciation_NetBookValue"><?php echo $t006_assetdepreciation_delete->NetBookValue->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t006_assetdepreciation_delete->RecordCount = 0;
$i = 0;
while (!$t006_assetdepreciation_delete->Recordset->EOF) {
	$t006_assetdepreciation_delete->RecordCount++;
	$t006_assetdepreciation_delete->RowCount++;

	// Set row properties
	$t006_assetdepreciation->resetAttributes();
	$t006_assetdepreciation->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t006_assetdepreciation_delete->loadRowValues($t006_assetdepreciation_delete->Recordset);

	// Render row
	$t006_assetdepreciation_delete->renderRow();
?>
	<tr <?php echo $t006_assetdepreciation->rowAttributes() ?>>
<?php if ($t006_assetdepreciation_delete->asset_id->Visible) { // asset_id ?>
		<td <?php echo $t006_assetdepreciation_delete->asset_id->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_delete->RowCount ?>_t006_assetdepreciation_asset_id" class="t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_delete->asset_id->viewAttributes() ?>><?php echo $t006_assetdepreciation_delete->asset_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->ListOfYears->Visible) { // ListOfYears ?>
		<td <?php echo $t006_assetdepreciation_delete->ListOfYears->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_delete->RowCount ?>_t006_assetdepreciation_ListOfYears" class="t006_assetdepreciation_ListOfYears">
<span<?php echo $t006_assetdepreciation_delete->ListOfYears->viewAttributes() ?>><?php echo $t006_assetdepreciation_delete->ListOfYears->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->NumberOfMonths->Visible) { // NumberOfMonths ?>
		<td <?php echo $t006_assetdepreciation_delete->NumberOfMonths->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_delete->RowCount ?>_t006_assetdepreciation_NumberOfMonths" class="t006_assetdepreciation_NumberOfMonths">
<span<?php echo $t006_assetdepreciation_delete->NumberOfMonths->viewAttributes() ?>><?php echo $t006_assetdepreciation_delete->NumberOfMonths->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->DepreciationAmount->Visible) { // DepreciationAmount ?>
		<td <?php echo $t006_assetdepreciation_delete->DepreciationAmount->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_delete->RowCount ?>_t006_assetdepreciation_DepreciationAmount" class="t006_assetdepreciation_DepreciationAmount">
<span<?php echo $t006_assetdepreciation_delete->DepreciationAmount->viewAttributes() ?>><?php echo $t006_assetdepreciation_delete->DepreciationAmount->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->DepreciationYtd->Visible) { // DepreciationYtd ?>
		<td <?php echo $t006_assetdepreciation_delete->DepreciationYtd->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_delete->RowCount ?>_t006_assetdepreciation_DepreciationYtd" class="t006_assetdepreciation_DepreciationYtd">
<span<?php echo $t006_assetdepreciation_delete->DepreciationYtd->viewAttributes() ?>><?php echo $t006_assetdepreciation_delete->DepreciationYtd->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t006_assetdepreciation_delete->NetBookValue->Visible) { // NetBookValue ?>
		<td <?php echo $t006_assetdepreciation_delete->NetBookValue->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_delete->RowCount ?>_t006_assetdepreciation_NetBookValue" class="t006_assetdepreciation_NetBookValue">
<span<?php echo $t006_assetdepreciation_delete->NetBookValue->viewAttributes() ?>><?php echo $t006_assetdepreciation_delete->NetBookValue->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t006_assetdepreciation_delete->Recordset->moveNext();
}
$t006_assetdepreciation_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_assetdepreciation_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t006_assetdepreciation_delete->showPageFooter();
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
$t006_assetdepreciation_delete->terminate();
?>