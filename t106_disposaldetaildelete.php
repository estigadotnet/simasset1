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
$t106_disposaldetail_delete = new t106_disposaldetail_delete();

// Run the page
$t106_disposaldetail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t106_disposaldetail_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft106_disposaldetaildelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft106_disposaldetaildelete = currentForm = new ew.Form("ft106_disposaldetaildelete", "delete");
	loadjs.done("ft106_disposaldetaildelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t106_disposaldetail_delete->showPageHeader(); ?>
<?php
$t106_disposaldetail_delete->showMessage();
?>
<form name="ft106_disposaldetaildelete" id="ft106_disposaldetaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t106_disposaldetail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t106_disposaldetail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t106_disposaldetail_delete->asset_id->Visible) { // asset_id ?>
		<th class="<?php echo $t106_disposaldetail_delete->asset_id->headerCellClass() ?>"><span id="elh_t106_disposaldetail_asset_id" class="t106_disposaldetail_asset_id"><?php echo $t106_disposaldetail_delete->asset_id->caption() ?></span></th>
<?php } ?>
<?php if ($t106_disposaldetail_delete->disposaldate->Visible) { // disposaldate ?>
		<th class="<?php echo $t106_disposaldetail_delete->disposaldate->headerCellClass() ?>"><span id="elh_t106_disposaldetail_disposaldate" class="t106_disposaldetail_disposaldate"><?php echo $t106_disposaldetail_delete->disposaldate->caption() ?></span></th>
<?php } ?>
<?php if ($t106_disposaldetail_delete->cond_id->Visible) { // cond_id ?>
		<th class="<?php echo $t106_disposaldetail_delete->cond_id->headerCellClass() ?>"><span id="elh_t106_disposaldetail_cond_id" class="t106_disposaldetail_cond_id"><?php echo $t106_disposaldetail_delete->cond_id->caption() ?></span></th>
<?php } ?>
<?php if ($t106_disposaldetail_delete->reason_id->Visible) { // reason_id ?>
		<th class="<?php echo $t106_disposaldetail_delete->reason_id->headerCellClass() ?>"><span id="elh_t106_disposaldetail_reason_id" class="t106_disposaldetail_reason_id"><?php echo $t106_disposaldetail_delete->reason_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t106_disposaldetail_delete->RecordCount = 0;
$i = 0;
while (!$t106_disposaldetail_delete->Recordset->EOF) {
	$t106_disposaldetail_delete->RecordCount++;
	$t106_disposaldetail_delete->RowCount++;

	// Set row properties
	$t106_disposaldetail->resetAttributes();
	$t106_disposaldetail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t106_disposaldetail_delete->loadRowValues($t106_disposaldetail_delete->Recordset);

	// Render row
	$t106_disposaldetail_delete->renderRow();
?>
	<tr <?php echo $t106_disposaldetail->rowAttributes() ?>>
<?php if ($t106_disposaldetail_delete->asset_id->Visible) { // asset_id ?>
		<td <?php echo $t106_disposaldetail_delete->asset_id->cellAttributes() ?>>
<span id="el<?php echo $t106_disposaldetail_delete->RowCount ?>_t106_disposaldetail_asset_id" class="t106_disposaldetail_asset_id">
<span<?php echo $t106_disposaldetail_delete->asset_id->viewAttributes() ?>><?php echo $t106_disposaldetail_delete->asset_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t106_disposaldetail_delete->disposaldate->Visible) { // disposaldate ?>
		<td <?php echo $t106_disposaldetail_delete->disposaldate->cellAttributes() ?>>
<span id="el<?php echo $t106_disposaldetail_delete->RowCount ?>_t106_disposaldetail_disposaldate" class="t106_disposaldetail_disposaldate">
<span<?php echo $t106_disposaldetail_delete->disposaldate->viewAttributes() ?>><?php echo $t106_disposaldetail_delete->disposaldate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t106_disposaldetail_delete->cond_id->Visible) { // cond_id ?>
		<td <?php echo $t106_disposaldetail_delete->cond_id->cellAttributes() ?>>
<span id="el<?php echo $t106_disposaldetail_delete->RowCount ?>_t106_disposaldetail_cond_id" class="t106_disposaldetail_cond_id">
<span<?php echo $t106_disposaldetail_delete->cond_id->viewAttributes() ?>><?php echo $t106_disposaldetail_delete->cond_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t106_disposaldetail_delete->reason_id->Visible) { // reason_id ?>
		<td <?php echo $t106_disposaldetail_delete->reason_id->cellAttributes() ?>>
<span id="el<?php echo $t106_disposaldetail_delete->RowCount ?>_t106_disposaldetail_reason_id" class="t106_disposaldetail_reason_id">
<span<?php echo $t106_disposaldetail_delete->reason_id->viewAttributes() ?>><?php echo $t106_disposaldetail_delete->reason_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t106_disposaldetail_delete->Recordset->moveNext();
}
$t106_disposaldetail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t106_disposaldetail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t106_disposaldetail_delete->showPageFooter();
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
$t106_disposaldetail_delete->terminate();
?>