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
$t010_condition_delete = new t010_condition_delete();

// Run the page
$t010_condition_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t010_condition_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft010_conditiondelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft010_conditiondelete = currentForm = new ew.Form("ft010_conditiondelete", "delete");
	loadjs.done("ft010_conditiondelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t010_condition_delete->showPageHeader(); ?>
<?php
$t010_condition_delete->showMessage();
?>
<form name="ft010_conditiondelete" id="ft010_conditiondelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t010_condition">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t010_condition_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t010_condition_delete->Status->Visible) { // Status ?>
		<th class="<?php echo $t010_condition_delete->Status->headerCellClass() ?>"><span id="elh_t010_condition_Status" class="t010_condition_Status"><?php echo $t010_condition_delete->Status->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t010_condition_delete->RecordCount = 0;
$i = 0;
while (!$t010_condition_delete->Recordset->EOF) {
	$t010_condition_delete->RecordCount++;
	$t010_condition_delete->RowCount++;

	// Set row properties
	$t010_condition->resetAttributes();
	$t010_condition->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t010_condition_delete->loadRowValues($t010_condition_delete->Recordset);

	// Render row
	$t010_condition_delete->renderRow();
?>
	<tr <?php echo $t010_condition->rowAttributes() ?>>
<?php if ($t010_condition_delete->Status->Visible) { // Status ?>
		<td <?php echo $t010_condition_delete->Status->cellAttributes() ?>>
<span id="el<?php echo $t010_condition_delete->RowCount ?>_t010_condition_Status" class="t010_condition_Status">
<span<?php echo $t010_condition_delete->Status->viewAttributes() ?>><?php echo $t010_condition_delete->Status->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t010_condition_delete->Recordset->moveNext();
}
$t010_condition_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t010_condition_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t010_condition_delete->showPageFooter();
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
$t010_condition_delete->terminate();
?>