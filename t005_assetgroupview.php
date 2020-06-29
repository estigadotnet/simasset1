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
$t005_assetgroup_view = new t005_assetgroup_view();

// Run the page
$t005_assetgroup_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_assetgroup_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t005_assetgroup_view->isExport()) { ?>
<script>
var ft005_assetgroupview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft005_assetgroupview = currentForm = new ew.Form("ft005_assetgroupview", "view");
	loadjs.done("ft005_assetgroupview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t005_assetgroup_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t005_assetgroup_view->ExportOptions->render("body") ?>
<?php $t005_assetgroup_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t005_assetgroup_view->showPageHeader(); ?>
<?php
$t005_assetgroup_view->showMessage();
?>
<form name="ft005_assetgroupview" id="ft005_assetgroupview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_assetgroup">
<input type="hidden" name="modal" value="<?php echo (int)$t005_assetgroup_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t005_assetgroup_view->Code->Visible) { // Code ?>
	<tr id="r_Code">
		<td class="<?php echo $t005_assetgroup_view->TableLeftColumnClass ?>"><span id="elh_t005_assetgroup_Code"><?php echo $t005_assetgroup_view->Code->caption() ?></span></td>
		<td data-name="Code" <?php echo $t005_assetgroup_view->Code->cellAttributes() ?>>
<span id="el_t005_assetgroup_Code">
<span<?php echo $t005_assetgroup_view->Code->viewAttributes() ?>><?php echo $t005_assetgroup_view->Code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t005_assetgroup_view->Description->Visible) { // Description ?>
	<tr id="r_Description">
		<td class="<?php echo $t005_assetgroup_view->TableLeftColumnClass ?>"><span id="elh_t005_assetgroup_Description"><?php echo $t005_assetgroup_view->Description->caption() ?></span></td>
		<td data-name="Description" <?php echo $t005_assetgroup_view->Description->cellAttributes() ?>>
<span id="el_t005_assetgroup_Description">
<span<?php echo $t005_assetgroup_view->Description->viewAttributes() ?>><?php echo $t005_assetgroup_view->Description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t005_assetgroup_view->EstimatedLife->Visible) { // EstimatedLife ?>
	<tr id="r_EstimatedLife">
		<td class="<?php echo $t005_assetgroup_view->TableLeftColumnClass ?>"><span id="elh_t005_assetgroup_EstimatedLife"><?php echo $t005_assetgroup_view->EstimatedLife->caption() ?></span></td>
		<td data-name="EstimatedLife" <?php echo $t005_assetgroup_view->EstimatedLife->cellAttributes() ?>>
<span id="el_t005_assetgroup_EstimatedLife">
<span<?php echo $t005_assetgroup_view->EstimatedLife->viewAttributes() ?>><?php echo $t005_assetgroup_view->EstimatedLife->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t005_assetgroup_view->SLN->Visible) { // SLN ?>
	<tr id="r_SLN">
		<td class="<?php echo $t005_assetgroup_view->TableLeftColumnClass ?>"><span id="elh_t005_assetgroup_SLN"><?php echo $t005_assetgroup_view->SLN->caption() ?></span></td>
		<td data-name="SLN" <?php echo $t005_assetgroup_view->SLN->cellAttributes() ?>>
<span id="el_t005_assetgroup_SLN">
<span<?php echo $t005_assetgroup_view->SLN->viewAttributes() ?>><?php echo $t005_assetgroup_view->SLN->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t005_assetgroup_view->IsModal) { ?>
<?php if (!$t005_assetgroup_view->isExport()) { ?>
<?php echo $t005_assetgroup_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
<?php
	if (in_array("t007_assettype", explode(",", $t005_assetgroup->getCurrentDetailTable())) && $t007_assettype->DetailView) {
?>
<?php if ($t005_assetgroup->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t007_assettype", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t007_assettypegrid.php" ?>
<?php } ?>
</form>
<?php
$t005_assetgroup_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t005_assetgroup_view->isExport()) { ?>
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
$t005_assetgroup_view->terminate();
?>