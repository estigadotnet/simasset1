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
$t105_disposalhead_view = new t105_disposalhead_view();

// Run the page
$t105_disposalhead_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t105_disposalhead_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t105_disposalhead_view->isExport()) { ?>
<script>
var ft105_disposalheadview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft105_disposalheadview = currentForm = new ew.Form("ft105_disposalheadview", "view");
	loadjs.done("ft105_disposalheadview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t105_disposalhead_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t105_disposalhead_view->ExportOptions->render("body") ?>
<?php $t105_disposalhead_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t105_disposalhead_view->showPageHeader(); ?>
<?php
$t105_disposalhead_view->showMessage();
?>
<form name="ft105_disposalheadview" id="ft105_disposalheadview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t105_disposalhead">
<input type="hidden" name="modal" value="<?php echo (int)$t105_disposalhead_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t105_disposalhead_view->property_id->Visible) { // property_id ?>
	<tr id="r_property_id">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_property_id"><?php echo $t105_disposalhead_view->property_id->caption() ?></span></td>
		<td data-name="property_id" <?php echo $t105_disposalhead_view->property_id->cellAttributes() ?>>
<span id="el_t105_disposalhead_property_id">
<span<?php echo $t105_disposalhead_view->property_id->viewAttributes() ?>><?php echo $t105_disposalhead_view->property_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->TransactionNo->Visible) { // TransactionNo ?>
	<tr id="r_TransactionNo">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_TransactionNo"><?php echo $t105_disposalhead_view->TransactionNo->caption() ?></span></td>
		<td data-name="TransactionNo" <?php echo $t105_disposalhead_view->TransactionNo->cellAttributes() ?>>
<span id="el_t105_disposalhead_TransactionNo">
<span<?php echo $t105_disposalhead_view->TransactionNo->viewAttributes() ?>><?php echo $t105_disposalhead_view->TransactionNo->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->TransactionDate->Visible) { // TransactionDate ?>
	<tr id="r_TransactionDate">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_TransactionDate"><?php echo $t105_disposalhead_view->TransactionDate->caption() ?></span></td>
		<td data-name="TransactionDate" <?php echo $t105_disposalhead_view->TransactionDate->cellAttributes() ?>>
<span id="el_t105_disposalhead_TransactionDate">
<span<?php echo $t105_disposalhead_view->TransactionDate->viewAttributes() ?>><?php echo $t105_disposalhead_view->TransactionDate->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->RecommendedBy->Visible) { // RecommendedBy ?>
	<tr id="r_RecommendedBy">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_RecommendedBy"><?php echo $t105_disposalhead_view->RecommendedBy->caption() ?></span></td>
		<td data-name="RecommendedBy" <?php echo $t105_disposalhead_view->RecommendedBy->cellAttributes() ?>>
<span id="el_t105_disposalhead_RecommendedBy">
<span<?php echo $t105_disposalhead_view->RecommendedBy->viewAttributes() ?>><?php echo $t105_disposalhead_view->RecommendedBy->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->CE->Visible) { // CE ?>
	<tr id="r_CE">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_CE"><?php echo $t105_disposalhead_view->CE->caption() ?></span></td>
		<td data-name="CE" <?php echo $t105_disposalhead_view->CE->cellAttributes() ?>>
<span id="el_t105_disposalhead_CE">
<span<?php echo $t105_disposalhead_view->CE->viewAttributes() ?>><?php echo $t105_disposalhead_view->CE->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->ITM->Visible) { // ITM ?>
	<tr id="r_ITM">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_ITM"><?php echo $t105_disposalhead_view->ITM->caption() ?></span></td>
		<td data-name="ITM" <?php echo $t105_disposalhead_view->ITM->cellAttributes() ?>>
<span id="el_t105_disposalhead_ITM">
<span<?php echo $t105_disposalhead_view->ITM->viewAttributes() ?>><?php echo $t105_disposalhead_view->ITM->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->Sign1->Visible) { // Sign1 ?>
	<tr id="r_Sign1">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_Sign1"><?php echo $t105_disposalhead_view->Sign1->caption() ?></span></td>
		<td data-name="Sign1" <?php echo $t105_disposalhead_view->Sign1->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign1">
<span<?php echo $t105_disposalhead_view->Sign1->viewAttributes() ?>><?php echo $t105_disposalhead_view->Sign1->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->Sign2->Visible) { // Sign2 ?>
	<tr id="r_Sign2">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_Sign2"><?php echo $t105_disposalhead_view->Sign2->caption() ?></span></td>
		<td data-name="Sign2" <?php echo $t105_disposalhead_view->Sign2->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign2">
<span<?php echo $t105_disposalhead_view->Sign2->viewAttributes() ?>><?php echo $t105_disposalhead_view->Sign2->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t105_disposalhead_view->Sign3->Visible) { // Sign3 ?>
	<tr id="r_Sign3">
		<td class="<?php echo $t105_disposalhead_view->TableLeftColumnClass ?>"><span id="elh_t105_disposalhead_Sign3"><?php echo $t105_disposalhead_view->Sign3->caption() ?></span></td>
		<td data-name="Sign3" <?php echo $t105_disposalhead_view->Sign3->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign3">
<span<?php echo $t105_disposalhead_view->Sign3->viewAttributes() ?>><?php echo $t105_disposalhead_view->Sign3->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t105_disposalhead_view->IsModal) { ?>
<?php if (!$t105_disposalhead_view->isExport()) { ?>
<?php echo $t105_disposalhead_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
<?php
	if (in_array("t106_disposaldetail", explode(",", $t105_disposalhead->getCurrentDetailTable())) && $t106_disposaldetail->DetailView) {
?>
<?php if ($t105_disposalhead->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t106_disposaldetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t106_disposaldetailgrid.php" ?>
<?php } ?>
</form>
<?php
$t105_disposalhead_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t105_disposalhead_view->isExport()) { ?>
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
$t105_disposalhead_view->terminate();
?>