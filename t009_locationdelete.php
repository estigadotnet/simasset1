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
$t009_location_delete = new t009_location_delete();

// Run the page
$t009_location_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t009_location_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft009_locationdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft009_locationdelete = currentForm = new ew.Form("ft009_locationdelete", "delete");
	loadjs.done("ft009_locationdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t009_location_delete->showPageHeader(); ?>
<?php
$t009_location_delete->showMessage();
?>
<form name="ft009_locationdelete" id="ft009_locationdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t009_location">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t009_location_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t009_location_delete->Location->Visible) { // Location ?>
		<th class="<?php echo $t009_location_delete->Location->headerCellClass() ?>"><span id="elh_t009_location_Location" class="t009_location_Location"><?php echo $t009_location_delete->Location->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t009_location_delete->RecordCount = 0;
$i = 0;
while (!$t009_location_delete->Recordset->EOF) {
	$t009_location_delete->RecordCount++;
	$t009_location_delete->RowCount++;

	// Set row properties
	$t009_location->resetAttributes();
	$t009_location->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t009_location_delete->loadRowValues($t009_location_delete->Recordset);

	// Render row
	$t009_location_delete->renderRow();
?>
	<tr <?php echo $t009_location->rowAttributes() ?>>
<?php if ($t009_location_delete->Location->Visible) { // Location ?>
		<td <?php echo $t009_location_delete->Location->cellAttributes() ?>>
<span id="el<?php echo $t009_location_delete->RowCount ?>_t009_location_Location" class="t009_location_Location">
<span<?php echo $t009_location_delete->Location->viewAttributes() ?>><?php echo $t009_location_delete->Location->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t009_location_delete->Recordset->moveNext();
}
$t009_location_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t009_location_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t009_location_delete->showPageFooter();
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
$t009_location_delete->terminate();
?>