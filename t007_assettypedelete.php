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
$t007_assettype_delete = new t007_assettype_delete();

// Run the page
$t007_assettype_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_assettype_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_assettypedelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft007_assettypedelete = currentForm = new ew.Form("ft007_assettypedelete", "delete");
	loadjs.done("ft007_assettypedelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_assettype_delete->showPageHeader(); ?>
<?php
$t007_assettype_delete->showMessage();
?>
<form name="ft007_assettypedelete" id="ft007_assettypedelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_assettype">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t007_assettype_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t007_assettype_delete->assetgroup_id->Visible) { // assetgroup_id ?>
		<th class="<?php echo $t007_assettype_delete->assetgroup_id->headerCellClass() ?>"><span id="elh_t007_assettype_assetgroup_id" class="t007_assettype_assetgroup_id"><?php echo $t007_assettype_delete->assetgroup_id->caption() ?></span></th>
<?php } ?>
<?php if ($t007_assettype_delete->Description->Visible) { // Description ?>
		<th class="<?php echo $t007_assettype_delete->Description->headerCellClass() ?>"><span id="elh_t007_assettype_Description" class="t007_assettype_Description"><?php echo $t007_assettype_delete->Description->caption() ?></span></th>
<?php } ?>
<?php if ($t007_assettype_delete->Code->Visible) { // Code ?>
		<th class="<?php echo $t007_assettype_delete->Code->headerCellClass() ?>"><span id="elh_t007_assettype_Code" class="t007_assettype_Code"><?php echo $t007_assettype_delete->Code->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t007_assettype_delete->RecordCount = 0;
$i = 0;
while (!$t007_assettype_delete->Recordset->EOF) {
	$t007_assettype_delete->RecordCount++;
	$t007_assettype_delete->RowCount++;

	// Set row properties
	$t007_assettype->resetAttributes();
	$t007_assettype->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t007_assettype_delete->loadRowValues($t007_assettype_delete->Recordset);

	// Render row
	$t007_assettype_delete->renderRow();
?>
	<tr <?php echo $t007_assettype->rowAttributes() ?>>
<?php if ($t007_assettype_delete->assetgroup_id->Visible) { // assetgroup_id ?>
		<td <?php echo $t007_assettype_delete->assetgroup_id->cellAttributes() ?>>
<span id="el<?php echo $t007_assettype_delete->RowCount ?>_t007_assettype_assetgroup_id" class="t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_delete->assetgroup_id->viewAttributes() ?>><?php echo $t007_assettype_delete->assetgroup_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t007_assettype_delete->Description->Visible) { // Description ?>
		<td <?php echo $t007_assettype_delete->Description->cellAttributes() ?>>
<span id="el<?php echo $t007_assettype_delete->RowCount ?>_t007_assettype_Description" class="t007_assettype_Description">
<span<?php echo $t007_assettype_delete->Description->viewAttributes() ?>><?php echo $t007_assettype_delete->Description->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t007_assettype_delete->Code->Visible) { // Code ?>
		<td <?php echo $t007_assettype_delete->Code->cellAttributes() ?>>
<span id="el<?php echo $t007_assettype_delete->RowCount ?>_t007_assettype_Code" class="t007_assettype_Code">
<span<?php echo $t007_assettype_delete->Code->viewAttributes() ?>><?php echo $t007_assettype_delete->Code->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t007_assettype_delete->Recordset->moveNext();
}
$t007_assettype_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t007_assettype_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t007_assettype_delete->showPageFooter();
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
$t007_assettype_delete->terminate();
?>