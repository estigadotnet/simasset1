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
$t002_department_delete = new t002_department_delete();

// Run the page
$t002_department_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_department_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_departmentdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft002_departmentdelete = currentForm = new ew.Form("ft002_departmentdelete", "delete");
	loadjs.done("ft002_departmentdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_department_delete->showPageHeader(); ?>
<?php
$t002_department_delete->showMessage();
?>
<form name="ft002_departmentdelete" id="ft002_departmentdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_department">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t002_department_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t002_department_delete->Department->Visible) { // Department ?>
		<th class="<?php echo $t002_department_delete->Department->headerCellClass() ?>"><span id="elh_t002_department_Department" class="t002_department_Department"><?php echo $t002_department_delete->Department->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t002_department_delete->RecordCount = 0;
$i = 0;
while (!$t002_department_delete->Recordset->EOF) {
	$t002_department_delete->RecordCount++;
	$t002_department_delete->RowCount++;

	// Set row properties
	$t002_department->resetAttributes();
	$t002_department->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t002_department_delete->loadRowValues($t002_department_delete->Recordset);

	// Render row
	$t002_department_delete->renderRow();
?>
	<tr <?php echo $t002_department->rowAttributes() ?>>
<?php if ($t002_department_delete->Department->Visible) { // Department ?>
		<td <?php echo $t002_department_delete->Department->cellAttributes() ?>>
<span id="el<?php echo $t002_department_delete->RowCount ?>_t002_department_Department" class="t002_department_Department">
<span<?php echo $t002_department_delete->Department->viewAttributes() ?>><?php echo $t002_department_delete->Department->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t002_department_delete->Recordset->moveNext();
}
$t002_department_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t002_department_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t002_department_delete->showPageFooter();
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
$t002_department_delete->terminate();
?>