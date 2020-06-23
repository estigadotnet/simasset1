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
$t104_ho1_detail_delete = new t104_ho1_detail_delete();

// Run the page
$t104_ho1_detail_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t104_ho1_detail_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft104_ho1_detaildelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft104_ho1_detaildelete = currentForm = new ew.Form("ft104_ho1_detaildelete", "delete");
	loadjs.done("ft104_ho1_detaildelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t104_ho1_detail_delete->showPageHeader(); ?>
<?php
$t104_ho1_detail_delete->showMessage();
?>
<form name="ft104_ho1_detaildelete" id="ft104_ho1_detaildelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t104_ho1_detail">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t104_ho1_detail_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t104_ho1_detail_delete->id->Visible) { // id ?>
		<th class="<?php echo $t104_ho1_detail_delete->id->headerCellClass() ?>"><span id="elh_t104_ho1_detail_id" class="t104_ho1_detail_id"><?php echo $t104_ho1_detail_delete->id->caption() ?></span></th>
<?php } ?>
<?php if ($t104_ho1_detail_delete->hohead_id->Visible) { // hohead_id ?>
		<th class="<?php echo $t104_ho1_detail_delete->hohead_id->headerCellClass() ?>"><span id="elh_t104_ho1_detail_hohead_id" class="t104_ho1_detail_hohead_id"><?php echo $t104_ho1_detail_delete->hohead_id->caption() ?></span></th>
<?php } ?>
<?php if ($t104_ho1_detail_delete->asset_id->Visible) { // asset_id ?>
		<th class="<?php echo $t104_ho1_detail_delete->asset_id->headerCellClass() ?>"><span id="elh_t104_ho1_detail_asset_id" class="t104_ho1_detail_asset_id"><?php echo $t104_ho1_detail_delete->asset_id->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t104_ho1_detail_delete->RecordCount = 0;
$i = 0;
while (!$t104_ho1_detail_delete->Recordset->EOF) {
	$t104_ho1_detail_delete->RecordCount++;
	$t104_ho1_detail_delete->RowCount++;

	// Set row properties
	$t104_ho1_detail->resetAttributes();
	$t104_ho1_detail->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t104_ho1_detail_delete->loadRowValues($t104_ho1_detail_delete->Recordset);

	// Render row
	$t104_ho1_detail_delete->renderRow();
?>
	<tr <?php echo $t104_ho1_detail->rowAttributes() ?>>
<?php if ($t104_ho1_detail_delete->id->Visible) { // id ?>
		<td <?php echo $t104_ho1_detail_delete->id->cellAttributes() ?>>
<span id="el<?php echo $t104_ho1_detail_delete->RowCount ?>_t104_ho1_detail_id" class="t104_ho1_detail_id">
<span<?php echo $t104_ho1_detail_delete->id->viewAttributes() ?>><?php echo $t104_ho1_detail_delete->id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t104_ho1_detail_delete->hohead_id->Visible) { // hohead_id ?>
		<td <?php echo $t104_ho1_detail_delete->hohead_id->cellAttributes() ?>>
<span id="el<?php echo $t104_ho1_detail_delete->RowCount ?>_t104_ho1_detail_hohead_id" class="t104_ho1_detail_hohead_id">
<span<?php echo $t104_ho1_detail_delete->hohead_id->viewAttributes() ?>><?php echo $t104_ho1_detail_delete->hohead_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t104_ho1_detail_delete->asset_id->Visible) { // asset_id ?>
		<td <?php echo $t104_ho1_detail_delete->asset_id->cellAttributes() ?>>
<span id="el<?php echo $t104_ho1_detail_delete->RowCount ?>_t104_ho1_detail_asset_id" class="t104_ho1_detail_asset_id">
<span<?php echo $t104_ho1_detail_delete->asset_id->viewAttributes() ?>><?php echo $t104_ho1_detail_delete->asset_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t104_ho1_detail_delete->Recordset->moveNext();
}
$t104_ho1_detail_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t104_ho1_detail_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t104_ho1_detail_delete->showPageFooter();
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
$t104_ho1_detail_delete->terminate();
?>