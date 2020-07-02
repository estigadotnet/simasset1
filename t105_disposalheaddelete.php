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
$t105_disposalhead_delete = new t105_disposalhead_delete();

// Run the page
$t105_disposalhead_delete->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t105_disposalhead_delete->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft105_disposalheaddelete, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "delete";
	ft105_disposalheaddelete = currentForm = new ew.Form("ft105_disposalheaddelete", "delete");
	loadjs.done("ft105_disposalheaddelete");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t105_disposalhead_delete->showPageHeader(); ?>
<?php
$t105_disposalhead_delete->showMessage();
?>
<form name="ft105_disposalheaddelete" id="ft105_disposalheaddelete" class="form-inline ew-form ew-delete-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t105_disposalhead">
<input type="hidden" name="action" id="action" value="delete">
<?php foreach ($t105_disposalhead_delete->RecKeys as $key) { ?>
<?php $keyvalue = is_array($key) ? implode(Config("COMPOSITE_KEY_SEPARATOR"), $key) : $key; ?>
<input type="hidden" name="key_m[]" value="<?php echo HtmlEncode($keyvalue) ?>">
<?php } ?>
<div class="card ew-card ew-grid">
<div class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="table ew-table">
	<thead>
	<tr class="ew-table-header">
<?php if ($t105_disposalhead_delete->property_id->Visible) { // property_id ?>
		<th class="<?php echo $t105_disposalhead_delete->property_id->headerCellClass() ?>"><span id="elh_t105_disposalhead_property_id" class="t105_disposalhead_property_id"><?php echo $t105_disposalhead_delete->property_id->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->TransactionNo->Visible) { // TransactionNo ?>
		<th class="<?php echo $t105_disposalhead_delete->TransactionNo->headerCellClass() ?>"><span id="elh_t105_disposalhead_TransactionNo" class="t105_disposalhead_TransactionNo"><?php echo $t105_disposalhead_delete->TransactionNo->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->TransactionDate->Visible) { // TransactionDate ?>
		<th class="<?php echo $t105_disposalhead_delete->TransactionDate->headerCellClass() ?>"><span id="elh_t105_disposalhead_TransactionDate" class="t105_disposalhead_TransactionDate"><?php echo $t105_disposalhead_delete->TransactionDate->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->RecommendedBy->Visible) { // RecommendedBy ?>
		<th class="<?php echo $t105_disposalhead_delete->RecommendedBy->headerCellClass() ?>"><span id="elh_t105_disposalhead_RecommendedBy" class="t105_disposalhead_RecommendedBy"><?php echo $t105_disposalhead_delete->RecommendedBy->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->CE->Visible) { // CE ?>
		<th class="<?php echo $t105_disposalhead_delete->CE->headerCellClass() ?>"><span id="elh_t105_disposalhead_CE" class="t105_disposalhead_CE"><?php echo $t105_disposalhead_delete->CE->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->ITM->Visible) { // ITM ?>
		<th class="<?php echo $t105_disposalhead_delete->ITM->headerCellClass() ?>"><span id="elh_t105_disposalhead_ITM" class="t105_disposalhead_ITM"><?php echo $t105_disposalhead_delete->ITM->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->Sign1->Visible) { // Sign1 ?>
		<th class="<?php echo $t105_disposalhead_delete->Sign1->headerCellClass() ?>"><span id="elh_t105_disposalhead_Sign1" class="t105_disposalhead_Sign1"><?php echo $t105_disposalhead_delete->Sign1->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->Sign2->Visible) { // Sign2 ?>
		<th class="<?php echo $t105_disposalhead_delete->Sign2->headerCellClass() ?>"><span id="elh_t105_disposalhead_Sign2" class="t105_disposalhead_Sign2"><?php echo $t105_disposalhead_delete->Sign2->caption() ?></span></th>
<?php } ?>
<?php if ($t105_disposalhead_delete->Sign3->Visible) { // Sign3 ?>
		<th class="<?php echo $t105_disposalhead_delete->Sign3->headerCellClass() ?>"><span id="elh_t105_disposalhead_Sign3" class="t105_disposalhead_Sign3"><?php echo $t105_disposalhead_delete->Sign3->caption() ?></span></th>
<?php } ?>
	</tr>
	</thead>
	<tbody>
<?php
$t105_disposalhead_delete->RecordCount = 0;
$i = 0;
while (!$t105_disposalhead_delete->Recordset->EOF) {
	$t105_disposalhead_delete->RecordCount++;
	$t105_disposalhead_delete->RowCount++;

	// Set row properties
	$t105_disposalhead->resetAttributes();
	$t105_disposalhead->RowType = ROWTYPE_VIEW; // View

	// Get the field contents
	$t105_disposalhead_delete->loadRowValues($t105_disposalhead_delete->Recordset);

	// Render row
	$t105_disposalhead_delete->renderRow();
?>
	<tr <?php echo $t105_disposalhead->rowAttributes() ?>>
<?php if ($t105_disposalhead_delete->property_id->Visible) { // property_id ?>
		<td <?php echo $t105_disposalhead_delete->property_id->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_property_id" class="t105_disposalhead_property_id">
<span<?php echo $t105_disposalhead_delete->property_id->viewAttributes() ?>><?php echo $t105_disposalhead_delete->property_id->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->TransactionNo->Visible) { // TransactionNo ?>
		<td <?php echo $t105_disposalhead_delete->TransactionNo->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_TransactionNo" class="t105_disposalhead_TransactionNo">
<span<?php echo $t105_disposalhead_delete->TransactionNo->viewAttributes() ?>><?php echo $t105_disposalhead_delete->TransactionNo->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->TransactionDate->Visible) { // TransactionDate ?>
		<td <?php echo $t105_disposalhead_delete->TransactionDate->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_TransactionDate" class="t105_disposalhead_TransactionDate">
<span<?php echo $t105_disposalhead_delete->TransactionDate->viewAttributes() ?>><?php echo $t105_disposalhead_delete->TransactionDate->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->RecommendedBy->Visible) { // RecommendedBy ?>
		<td <?php echo $t105_disposalhead_delete->RecommendedBy->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_RecommendedBy" class="t105_disposalhead_RecommendedBy">
<span<?php echo $t105_disposalhead_delete->RecommendedBy->viewAttributes() ?>><?php echo $t105_disposalhead_delete->RecommendedBy->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->CE->Visible) { // CE ?>
		<td <?php echo $t105_disposalhead_delete->CE->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_CE" class="t105_disposalhead_CE">
<span<?php echo $t105_disposalhead_delete->CE->viewAttributes() ?>><?php echo $t105_disposalhead_delete->CE->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->ITM->Visible) { // ITM ?>
		<td <?php echo $t105_disposalhead_delete->ITM->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_ITM" class="t105_disposalhead_ITM">
<span<?php echo $t105_disposalhead_delete->ITM->viewAttributes() ?>><?php echo $t105_disposalhead_delete->ITM->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->Sign1->Visible) { // Sign1 ?>
		<td <?php echo $t105_disposalhead_delete->Sign1->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_Sign1" class="t105_disposalhead_Sign1">
<span<?php echo $t105_disposalhead_delete->Sign1->viewAttributes() ?>><?php echo $t105_disposalhead_delete->Sign1->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->Sign2->Visible) { // Sign2 ?>
		<td <?php echo $t105_disposalhead_delete->Sign2->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_Sign2" class="t105_disposalhead_Sign2">
<span<?php echo $t105_disposalhead_delete->Sign2->viewAttributes() ?>><?php echo $t105_disposalhead_delete->Sign2->getViewValue() ?></span>
</span>
</td>
<?php } ?>
<?php if ($t105_disposalhead_delete->Sign3->Visible) { // Sign3 ?>
		<td <?php echo $t105_disposalhead_delete->Sign3->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_delete->RowCount ?>_t105_disposalhead_Sign3" class="t105_disposalhead_Sign3">
<span<?php echo $t105_disposalhead_delete->Sign3->viewAttributes() ?>><?php echo $t105_disposalhead_delete->Sign3->getViewValue() ?></span>
</span>
</td>
<?php } ?>
	</tr>
<?php
	$t105_disposalhead_delete->Recordset->moveNext();
}
$t105_disposalhead_delete->Recordset->close();
?>
</tbody>
</table>
</div>
</div>
<div>
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("DeleteBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t105_disposalhead_delete->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
</div>
</form>
<?php
$t105_disposalhead_delete->showPageFooter();
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
$t105_disposalhead_delete->terminate();
?>