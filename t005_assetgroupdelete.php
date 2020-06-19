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
$t005_assetgroup_delete = new t005_assetgroup_delete();

// Run the page
$t005_assetgroup_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_assetgroup_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_assetgroupdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft005_assetgroupdelete = currentForm = new ew.Form("ft005_assetgroupdelete", "delete");
	loadjs.done("ft005_assetgroupdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_assetgroup_delete->showPageHeader(); ?>
<?php
$t005_assetgroup_delete->showMessage();
?>
<form name="ft005_assetgroupdelete" id="ft005_assetgroupdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_assetgroup">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t005_assetgroup_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t005_assetgroup_delete->Description->Visible) { // Description ?>
		<th class="<?php echo $t005_assetgroup_delete->Description->headerCellClass() ?>"><span id="elh_t005_assetgroup_Description" class="t005_assetgroup_Description"><?php echo $t005_assetgroup_delete->Description->caption() ?></span></th>
<?php } ?>
<?php if ($t005_assetgroup_delete->EconomicalLifeTime->Visible) { // EconomicalLifeTime ?>
		<th class="<?php echo $t005_assetgroup_delete->EconomicalLifeTime->headerCellClass() ?>"><span id="elh_t005_assetgroup_EconomicalLifeTime" class="t005_assetgroup_EconomicalLifeTime"><?php echo $t005_assetgroup_delete->EconomicalLifeTime->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t005_assetgroup_delete->RecordCount = 0;
$i = 0;
while (!$t005_assetgroup_delete->Recordset->EOF) {
	$t005_assetgroup_delete->RecordCount++;
	$t005_assetgroup_delete->RowCount++;

	// Set row properties
	$t005_assetgroup->resetAttributes();
	$t005_assetgroup->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t005_assetgroup_delete->loadRowValues($t005_assetgroup_delete->Recordset);

	// Render row
	$t005_assetgroup_delete->renderRow();
?>
	<tr <?php echo $t005_assetgroup->rowAttributes() ?>>
<?php if ($t005_assetgroup_delete->Description->Visible) { // Description ?>
		<td <?php echo $t005_assetgroup_delete->Description->cellAttributes() ?>>
<span id="el<?php echo $t005_assetgroup_delete->RowCount ?>_t005_assetgroup_Description" class="t005_assetgroup_Description">
<span<?php echo $t005_assetgroup_delete->Description->viewAttributes() ?>><?php echo $t005_assetgroup_delete->Description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t005_assetgroup_delete->EconomicalLifeTime->Visible) { // EconomicalLifeTime ?>
		<td <?php echo $t005_assetgroup_delete->EconomicalLifeTime->cellAttributes() ?>>
<span id="el<?php echo $t005_assetgroup_delete->RowCount ?>_t005_assetgroup_EconomicalLifeTime" class="t005_assetgroup_EconomicalLifeTime">
<span<?php echo $t005_assetgroup_delete->EconomicalLifeTime->viewAttributes() ?>><?php echo $t005_assetgroup_delete->EconomicalLifeTime->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t005_assetgroup_delete->Recordset->moveNext();
}
$t005_assetgroup_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_assetgroup_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t005_assetgroup_delete->showPageFooter();
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
$t005_assetgroup_delete->terminate();
?>