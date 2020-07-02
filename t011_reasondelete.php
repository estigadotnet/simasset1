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
$t011_reason_delete = new t011_reason_delete();

// Run the page
$t011_reason_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t011_reason_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft011_reasondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft011_reasondelete = currentForm = new ew.Form("ft011_reasondelete", "delete");
	loadjs.done("ft011_reasondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t011_reason_delete->showPageHeader(); ?>
<?php
$t011_reason_delete->showMessage();
?>
<form name="ft011_reasondelete" id="ft011_reasondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t011_reason">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t011_reason_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t011_reason_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $t011_reason_delete->Status->headerCellClass() ?>"><span id="elh_t011_reason_Status" class="t011_reason_Status"><?php echo $t011_reason_delete->Status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t011_reason_delete->RecordCount = 0;
$i = 0;
while (!$t011_reason_delete->Recordset->EOF) {
	$t011_reason_delete->RecordCount++;
	$t011_reason_delete->RowCount++;

	// Set row properties
	$t011_reason->resetAttributes();
	$t011_reason->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t011_reason_delete->loadRowValues($t011_reason_delete->Recordset);

	// Render row
	$t011_reason_delete->renderRow();
?>
	<tr <?php echo $t011_reason->rowAttributes() ?>>
<?php if ($t011_reason_delete->Status->Visible) { // Status ?>
		<td <?php echo $t011_reason_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $t011_reason_delete->RowCount ?>_t011_reason_Status" class="t011_reason_Status">
<span<?php echo $t011_reason_delete->Status->viewAttributes() ?>><?php echo $t011_reason_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t011_reason_delete->Recordset->moveNext();
}
$t011_reason_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t011_reason_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t011_reason_delete->showPageFooter();
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
$t011_reason_delete->terminate();
?>