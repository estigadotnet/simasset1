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
$t008_brand_delete = new t008_brand_delete();

// Run the page
$t008_brand_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t008_brand_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft008_branddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft008_branddelete = currentForm = new ew.Form("ft008_branddelete", "delete");
	loadjs.done("ft008_branddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t008_brand_delete->showPageHeader(); ?>
<?php
$t008_brand_delete->showMessage();
?>
<form name="ft008_branddelete" id="ft008_branddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t008_brand">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t008_brand_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t008_brand_delete->Brand->Visible) { // Brand ?>
		<th class="<?php echo $t008_brand_delete->Brand->headerCellClass() ?>"><span id="elh_t008_brand_Brand" class="t008_brand_Brand"><?php echo $t008_brand_delete->Brand->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t008_brand_delete->RecordCount = 0;
$i = 0;
while (!$t008_brand_delete->Recordset->EOF) {
	$t008_brand_delete->RecordCount++;
	$t008_brand_delete->RowCount++;

	// Set row properties
	$t008_brand->resetAttributes();
	$t008_brand->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t008_brand_delete->loadRowValues($t008_brand_delete->Recordset);

	// Render row
	$t008_brand_delete->renderRow();
?>
	<tr <?php echo $t008_brand->rowAttributes() ?>>
<?php if ($t008_brand_delete->Brand->Visible) { // Brand ?>
		<td <?php echo $t008_brand_delete->Brand->cellAttributes() ?>>
<span id="el<?php echo $t008_brand_delete->RowCount ?>_t008_brand_Brand" class="t008_brand_Brand">
<span<?php echo $t008_brand_delete->Brand->viewAttributes() ?>><?php echo $t008_brand_delete->Brand->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t008_brand_delete->Recordset->moveNext();
}
$t008_brand_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t008_brand_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t008_brand_delete->showPageFooter();
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
$t008_brand_delete->terminate();
?>