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
$t101_ho_head_view = new t101_ho_head_view();

// Run the page
$t101_ho_head_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t101_ho_head_view->isExport()) { ?>
<script>
var ft101_ho_headview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft101_ho_headview = currentForm = new ew.Form("ft101_ho_headview", "view");
	loadjs.done("ft101_ho_headview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t101_ho_head_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t101_ho_head_view->ExportOptions->render("body") ?>
<?php $t101_ho_head_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t101_ho_head_view->showPageHeader(); ?>
<?php
$t101_ho_head_view->showMessage();
?>
<form name="ft101_ho_headview" id="ft101_ho_headview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="modal" value="<?php echo (int)$t101_ho_head_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t101_ho_head_view->property_id->Visible) { // property_id ?>
	<tr id="r_property_id">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_property_id"><?php echo $t101_ho_head_view->property_id->caption() ?></span></td>
		<td data-name="property_id" <?php echo $t101_ho_head_view->property_id->cellAttributes() ?>>
<span id="el_t101_ho_head_property_id">
<span<?php echo $t101_ho_head_view->property_id->viewAttributes() ?>><?php echo $t101_ho_head_view->property_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->TransactionNo->Visible) { // TransactionNo ?>
	<tr id="r_TransactionNo">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_TransactionNo"><?php echo $t101_ho_head_view->TransactionNo->caption() ?></span></td>
		<td data-name="TransactionNo" <?php echo $t101_ho_head_view->TransactionNo->cellAttributes() ?>>
<span id="el_t101_ho_head_TransactionNo">
<span<?php echo $t101_ho_head_view->TransactionNo->viewAttributes() ?>><?php echo $t101_ho_head_view->TransactionNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->TransactionDate->Visible) { // TransactionDate ?>
	<tr id="r_TransactionDate">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_TransactionDate"><?php echo $t101_ho_head_view->TransactionDate->caption() ?></span></td>
		<td data-name="TransactionDate" <?php echo $t101_ho_head_view->TransactionDate->cellAttributes() ?>>
<span id="el_t101_ho_head_TransactionDate">
<span<?php echo $t101_ho_head_view->TransactionDate->viewAttributes() ?>><?php echo $t101_ho_head_view->TransactionDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->TransactionType->Visible) { // TransactionType ?>
	<tr id="r_TransactionType">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_TransactionType"><?php echo $t101_ho_head_view->TransactionType->caption() ?></span></td>
		<td data-name="TransactionType" <?php echo $t101_ho_head_view->TransactionType->cellAttributes() ?>>
<span id="el_t101_ho_head_TransactionType">
<span<?php echo $t101_ho_head_view->TransactionType->viewAttributes() ?>><?php echo $t101_ho_head_view->TransactionType->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->HandedOverTo->Visible) { // HandedOverTo ?>
	<tr id="r_HandedOverTo">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_HandedOverTo"><?php echo $t101_ho_head_view->HandedOverTo->caption() ?></span></td>
		<td data-name="HandedOverTo" <?php echo $t101_ho_head_view->HandedOverTo->cellAttributes() ?>>
<span id="el_t101_ho_head_HandedOverTo">
<span<?php echo $t101_ho_head_view->HandedOverTo->viewAttributes() ?>><?php echo $t101_ho_head_view->HandedOverTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->CodeNoTo->Visible) { // CodeNoTo ?>
	<tr id="r_CodeNoTo">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_CodeNoTo"><?php echo $t101_ho_head_view->CodeNoTo->caption() ?></span></td>
		<td data-name="CodeNoTo" <?php echo $t101_ho_head_view->CodeNoTo->cellAttributes() ?>>
<span id="el_t101_ho_head_CodeNoTo">
<span<?php echo $t101_ho_head_view->CodeNoTo->viewAttributes() ?>><?php echo $t101_ho_head_view->CodeNoTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->DepartmentTo->Visible) { // DepartmentTo ?>
	<tr id="r_DepartmentTo">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_DepartmentTo"><?php echo $t101_ho_head_view->DepartmentTo->caption() ?></span></td>
		<td data-name="DepartmentTo" <?php echo $t101_ho_head_view->DepartmentTo->cellAttributes() ?>>
<span id="el_t101_ho_head_DepartmentTo">
<span<?php echo $t101_ho_head_view->DepartmentTo->viewAttributes() ?>><?php echo $t101_ho_head_view->DepartmentTo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->HandedOverBy->Visible) { // HandedOverBy ?>
	<tr id="r_HandedOverBy">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_HandedOverBy"><?php echo $t101_ho_head_view->HandedOverBy->caption() ?></span></td>
		<td data-name="HandedOverBy" <?php echo $t101_ho_head_view->HandedOverBy->cellAttributes() ?>>
<span id="el_t101_ho_head_HandedOverBy">
<span<?php echo $t101_ho_head_view->HandedOverBy->viewAttributes() ?>><?php echo $t101_ho_head_view->HandedOverBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->CodeNoBy->Visible) { // CodeNoBy ?>
	<tr id="r_CodeNoBy">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_CodeNoBy"><?php echo $t101_ho_head_view->CodeNoBy->caption() ?></span></td>
		<td data-name="CodeNoBy" <?php echo $t101_ho_head_view->CodeNoBy->cellAttributes() ?>>
<span id="el_t101_ho_head_CodeNoBy">
<span<?php echo $t101_ho_head_view->CodeNoBy->viewAttributes() ?>><?php echo $t101_ho_head_view->CodeNoBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->DepartmentBy->Visible) { // DepartmentBy ?>
	<tr id="r_DepartmentBy">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_DepartmentBy"><?php echo $t101_ho_head_view->DepartmentBy->caption() ?></span></td>
		<td data-name="DepartmentBy" <?php echo $t101_ho_head_view->DepartmentBy->cellAttributes() ?>>
<span id="el_t101_ho_head_DepartmentBy">
<span<?php echo $t101_ho_head_view->DepartmentBy->viewAttributes() ?>><?php echo $t101_ho_head_view->DepartmentBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->Sign1->Visible) { // Sign1 ?>
	<tr id="r_Sign1">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_Sign1"><?php echo $t101_ho_head_view->Sign1->caption() ?></span></td>
		<td data-name="Sign1" <?php echo $t101_ho_head_view->Sign1->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign1">
<span<?php echo $t101_ho_head_view->Sign1->viewAttributes() ?>><?php echo $t101_ho_head_view->Sign1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->Sign2->Visible) { // Sign2 ?>
	<tr id="r_Sign2">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_Sign2"><?php echo $t101_ho_head_view->Sign2->caption() ?></span></td>
		<td data-name="Sign2" <?php echo $t101_ho_head_view->Sign2->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign2">
<span<?php echo $t101_ho_head_view->Sign2->viewAttributes() ?>><?php echo $t101_ho_head_view->Sign2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->Sign3->Visible) { // Sign3 ?>
	<tr id="r_Sign3">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_Sign3"><?php echo $t101_ho_head_view->Sign3->caption() ?></span></td>
		<td data-name="Sign3" <?php echo $t101_ho_head_view->Sign3->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign3">
<span<?php echo $t101_ho_head_view->Sign3->viewAttributes() ?>><?php echo $t101_ho_head_view->Sign3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t101_ho_head_view->Sign4->Visible) { // Sign4 ?>
	<tr id="r_Sign4">
		<td class="<?php echo $t101_ho_head_view->TableLeftColumnClass ?>"><span id="elh_t101_ho_head_Sign4"><?php echo $t101_ho_head_view->Sign4->caption() ?></span></td>
		<td data-name="Sign4" <?php echo $t101_ho_head_view->Sign4->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign4">
<span<?php echo $t101_ho_head_view->Sign4->viewAttributes() ?>><?php echo $t101_ho_head_view->Sign4->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t101_ho_head_view->IsModal) { ?>
<?php if (!$t101_ho_head_view->isExport()) { ?>
<?php echo $t101_ho_head_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
<?php
	if (in_array("t102_ho_detail", explode(",", $t101_ho_head->getCurrentDetailTable())) && $t102_ho_detail->DetailView) {
?>
<?php if ($t101_ho_head->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t102_ho_detail", "TblCaption") ?>&nbsp;<?php echo str_replace("%c", $t101_ho_head_view->t102_ho_detail_Count, $Language->phrase("DetailCount")) ?></h4>
<?php } ?>
<?php include_once "t102_ho_detailgrid.php" ?>
<?php } ?>
</form>
<?php
$t101_ho_head_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t101_ho_head_view->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t101_ho_head_view->terminate();
?>