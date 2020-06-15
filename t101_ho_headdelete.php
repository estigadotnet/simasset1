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
$t101_ho_head_delete = new t101_ho_head_delete();

// Run the page
$t101_ho_head_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_ho_headdelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft101_ho_headdelete = currentForm = new ew.Form("ft101_ho_headdelete", "delete");
	loadjs.done("ft101_ho_headdelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_ho_head_delete->showPageHeader(); ?>
<?php
$t101_ho_head_delete->showMessage();
?>
<form name="ft101_ho_headdelete" id="ft101_ho_headdelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t101_ho_head_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t101_ho_head_delete->TransactionNo->Visible) { // TransactionNo ?>
		<th class="<?php echo $t101_ho_head_delete->TransactionNo->headerCellClass() ?>"><span id="elh_t101_ho_head_TransactionNo" class="t101_ho_head_TransactionNo"><?php echo $t101_ho_head_delete->TransactionNo->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->TransactionDate->Visible) { // TransactionDate ?>
		<th class="<?php echo $t101_ho_head_delete->TransactionDate->headerCellClass() ?>"><span id="elh_t101_ho_head_TransactionDate" class="t101_ho_head_TransactionDate"><?php echo $t101_ho_head_delete->TransactionDate->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->TransactionType->Visible) { // TransactionType ?>
		<th class="<?php echo $t101_ho_head_delete->TransactionType->headerCellClass() ?>"><span id="elh_t101_ho_head_TransactionType" class="t101_ho_head_TransactionType"><?php echo $t101_ho_head_delete->TransactionType->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->HandedOverTo->Visible) { // HandedOverTo ?>
		<th class="<?php echo $t101_ho_head_delete->HandedOverTo->headerCellClass() ?>"><span id="elh_t101_ho_head_HandedOverTo" class="t101_ho_head_HandedOverTo"><?php echo $t101_ho_head_delete->HandedOverTo->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->CodeNoTo->Visible) { // CodeNoTo ?>
		<th class="<?php echo $t101_ho_head_delete->CodeNoTo->headerCellClass() ?>"><span id="elh_t101_ho_head_CodeNoTo" class="t101_ho_head_CodeNoTo"><?php echo $t101_ho_head_delete->CodeNoTo->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->DepartmentTo->Visible) { // DepartmentTo ?>
		<th class="<?php echo $t101_ho_head_delete->DepartmentTo->headerCellClass() ?>"><span id="elh_t101_ho_head_DepartmentTo" class="t101_ho_head_DepartmentTo"><?php echo $t101_ho_head_delete->DepartmentTo->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->HandedOverBy->Visible) { // HandedOverBy ?>
		<th class="<?php echo $t101_ho_head_delete->HandedOverBy->headerCellClass() ?>"><span id="elh_t101_ho_head_HandedOverBy" class="t101_ho_head_HandedOverBy"><?php echo $t101_ho_head_delete->HandedOverBy->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->CodeNoBy->Visible) { // CodeNoBy ?>
		<th class="<?php echo $t101_ho_head_delete->CodeNoBy->headerCellClass() ?>"><span id="elh_t101_ho_head_CodeNoBy" class="t101_ho_head_CodeNoBy"><?php echo $t101_ho_head_delete->CodeNoBy->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->DepartmentBy->Visible) { // DepartmentBy ?>
		<th class="<?php echo $t101_ho_head_delete->DepartmentBy->headerCellClass() ?>"><span id="elh_t101_ho_head_DepartmentBy" class="t101_ho_head_DepartmentBy"><?php echo $t101_ho_head_delete->DepartmentBy->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign1->Visible) { // Sign1 ?>
		<th class="<?php echo $t101_ho_head_delete->Sign1->headerCellClass() ?>"><span id="elh_t101_ho_head_Sign1" class="t101_ho_head_Sign1"><?php echo $t101_ho_head_delete->Sign1->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign2->Visible) { // Sign2 ?>
		<th class="<?php echo $t101_ho_head_delete->Sign2->headerCellClass() ?>"><span id="elh_t101_ho_head_Sign2" class="t101_ho_head_Sign2"><?php echo $t101_ho_head_delete->Sign2->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign3->Visible) { // Sign3 ?>
		<th class="<?php echo $t101_ho_head_delete->Sign3->headerCellClass() ?>"><span id="elh_t101_ho_head_Sign3" class="t101_ho_head_Sign3"><?php echo $t101_ho_head_delete->Sign3->caption() ?></span></th>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign4->Visible) { // Sign4 ?>
		<th class="<?php echo $t101_ho_head_delete->Sign4->headerCellClass() ?>"><span id="elh_t101_ho_head_Sign4" class="t101_ho_head_Sign4"><?php echo $t101_ho_head_delete->Sign4->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t101_ho_head_delete->RecordCount = 0;
$i = 0;
while (!$t101_ho_head_delete->Recordset->EOF) {
	$t101_ho_head_delete->RecordCount++;
	$t101_ho_head_delete->RowCount++;

	// Set row properties
	$t101_ho_head->resetAttributes();
	$t101_ho_head->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t101_ho_head_delete->loadRowValues($t101_ho_head_delete->Recordset);

	// Render row
	$t101_ho_head_delete->renderRow();
?>
	<tr <?php echo $t101_ho_head->rowAttributes() ?>>
<?php if ($t101_ho_head_delete->TransactionNo->Visible) { // TransactionNo ?>
		<td <?php echo $t101_ho_head_delete->TransactionNo->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_TransactionNo" class="t101_ho_head_TransactionNo">
<span<?php echo $t101_ho_head_delete->TransactionNo->viewAttributes() ?>><?php echo $t101_ho_head_delete->TransactionNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->TransactionDate->Visible) { // TransactionDate ?>
		<td <?php echo $t101_ho_head_delete->TransactionDate->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_TransactionDate" class="t101_ho_head_TransactionDate">
<span<?php echo $t101_ho_head_delete->TransactionDate->viewAttributes() ?>><?php echo $t101_ho_head_delete->TransactionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->TransactionType->Visible) { // TransactionType ?>
		<td <?php echo $t101_ho_head_delete->TransactionType->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_TransactionType" class="t101_ho_head_TransactionType">
<span<?php echo $t101_ho_head_delete->TransactionType->viewAttributes() ?>><?php echo $t101_ho_head_delete->TransactionType->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->HandedOverTo->Visible) { // HandedOverTo ?>
		<td <?php echo $t101_ho_head_delete->HandedOverTo->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_HandedOverTo" class="t101_ho_head_HandedOverTo">
<span<?php echo $t101_ho_head_delete->HandedOverTo->viewAttributes() ?>><?php echo $t101_ho_head_delete->HandedOverTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->CodeNoTo->Visible) { // CodeNoTo ?>
		<td <?php echo $t101_ho_head_delete->CodeNoTo->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_CodeNoTo" class="t101_ho_head_CodeNoTo">
<span<?php echo $t101_ho_head_delete->CodeNoTo->viewAttributes() ?>><?php echo $t101_ho_head_delete->CodeNoTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->DepartmentTo->Visible) { // DepartmentTo ?>
		<td <?php echo $t101_ho_head_delete->DepartmentTo->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_DepartmentTo" class="t101_ho_head_DepartmentTo">
<span<?php echo $t101_ho_head_delete->DepartmentTo->viewAttributes() ?>><?php echo $t101_ho_head_delete->DepartmentTo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->HandedOverBy->Visible) { // HandedOverBy ?>
		<td <?php echo $t101_ho_head_delete->HandedOverBy->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_HandedOverBy" class="t101_ho_head_HandedOverBy">
<span<?php echo $t101_ho_head_delete->HandedOverBy->viewAttributes() ?>><?php echo $t101_ho_head_delete->HandedOverBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->CodeNoBy->Visible) { // CodeNoBy ?>
		<td <?php echo $t101_ho_head_delete->CodeNoBy->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_CodeNoBy" class="t101_ho_head_CodeNoBy">
<span<?php echo $t101_ho_head_delete->CodeNoBy->viewAttributes() ?>><?php echo $t101_ho_head_delete->CodeNoBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->DepartmentBy->Visible) { // DepartmentBy ?>
		<td <?php echo $t101_ho_head_delete->DepartmentBy->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_DepartmentBy" class="t101_ho_head_DepartmentBy">
<span<?php echo $t101_ho_head_delete->DepartmentBy->viewAttributes() ?>><?php echo $t101_ho_head_delete->DepartmentBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign1->Visible) { // Sign1 ?>
		<td <?php echo $t101_ho_head_delete->Sign1->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_Sign1" class="t101_ho_head_Sign1">
<span<?php echo $t101_ho_head_delete->Sign1->viewAttributes() ?>><?php echo $t101_ho_head_delete->Sign1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign2->Visible) { // Sign2 ?>
		<td <?php echo $t101_ho_head_delete->Sign2->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_Sign2" class="t101_ho_head_Sign2">
<span<?php echo $t101_ho_head_delete->Sign2->viewAttributes() ?>><?php echo $t101_ho_head_delete->Sign2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign3->Visible) { // Sign3 ?>
		<td <?php echo $t101_ho_head_delete->Sign3->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_Sign3" class="t101_ho_head_Sign3">
<span<?php echo $t101_ho_head_delete->Sign3->viewAttributes() ?>><?php echo $t101_ho_head_delete->Sign3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t101_ho_head_delete->Sign4->Visible) { // Sign4 ?>
		<td <?php echo $t101_ho_head_delete->Sign4->cellAttributes() ?>>
<span id="el<?php echo $t101_ho_head_delete->RowCount ?>_t101_ho_head_Sign4" class="t101_ho_head_Sign4">
<span<?php echo $t101_ho_head_delete->Sign4->viewAttributes() ?>><?php echo $t101_ho_head_delete->Sign4->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t101_ho_head_delete->Recordset->moveNext();
}
$t101_ho_head_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_ho_head_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t101_ho_head_delete->showPageFooter();
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
$t101_ho_head_delete->terminate();
?>