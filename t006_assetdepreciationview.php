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
$t006_assetdepreciation_view = new t006_assetdepreciation_view();

// Run the page
$t006_assetdepreciation_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_assetdepreciation_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t006_assetdepreciation_view->isExport()) { ?>
<script>
var ft006_assetdepreciationview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft006_assetdepreciationview = currentForm = new ew.Form("ft006_assetdepreciationview", "view");
	loadjs.done("ft006_assetdepreciationview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t006_assetdepreciation_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t006_assetdepreciation_view->ExportOptions->render("body") ?>
<?php $t006_assetdepreciation_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t006_assetdepreciation_view->showPageHeader(); ?>
<?php
$t006_assetdepreciation_view->showMessage();
?>
<form name="ft006_assetdepreciationview" id="ft006_assetdepreciationview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_assetdepreciation">
<input type="hidden" name="modal" value="<?php echo (int)$t006_assetdepreciation_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t006_assetdepreciation_view->asset_id->Visible) { // asset_id ?>
	<tr id="r_asset_id">
		<td class="<?php echo $t006_assetdepreciation_view->TableLeftColumnClass ?>"><span id="elh_t006_assetdepreciation_asset_id"><?php echo $t006_assetdepreciation_view->asset_id->caption() ?></span></td>
		<td data-name="asset_id" <?php echo $t006_assetdepreciation_view->asset_id->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_view->asset_id->viewAttributes() ?>><?php echo $t006_assetdepreciation_view->asset_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_assetdepreciation_view->ListOfYears->Visible) { // ListOfYears ?>
	<tr id="r_ListOfYears">
		<td class="<?php echo $t006_assetdepreciation_view->TableLeftColumnClass ?>"><span id="elh_t006_assetdepreciation_ListOfYears"><?php echo $t006_assetdepreciation_view->ListOfYears->caption() ?></span></td>
		<td data-name="ListOfYears" <?php echo $t006_assetdepreciation_view->ListOfYears->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_ListOfYears">
<span<?php echo $t006_assetdepreciation_view->ListOfYears->viewAttributes() ?>><?php echo $t006_assetdepreciation_view->ListOfYears->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_assetdepreciation_view->NumberOfMonths->Visible) { // NumberOfMonths ?>
	<tr id="r_NumberOfMonths">
		<td class="<?php echo $t006_assetdepreciation_view->TableLeftColumnClass ?>"><span id="elh_t006_assetdepreciation_NumberOfMonths"><?php echo $t006_assetdepreciation_view->NumberOfMonths->caption() ?></span></td>
		<td data-name="NumberOfMonths" <?php echo $t006_assetdepreciation_view->NumberOfMonths->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_NumberOfMonths">
<span<?php echo $t006_assetdepreciation_view->NumberOfMonths->viewAttributes() ?>><?php echo $t006_assetdepreciation_view->NumberOfMonths->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_assetdepreciation_view->DepreciationAmount->Visible) { // DepreciationAmount ?>
	<tr id="r_DepreciationAmount">
		<td class="<?php echo $t006_assetdepreciation_view->TableLeftColumnClass ?>"><span id="elh_t006_assetdepreciation_DepreciationAmount"><?php echo $t006_assetdepreciation_view->DepreciationAmount->caption() ?></span></td>
		<td data-name="DepreciationAmount" <?php echo $t006_assetdepreciation_view->DepreciationAmount->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_DepreciationAmount">
<span<?php echo $t006_assetdepreciation_view->DepreciationAmount->viewAttributes() ?>><?php echo $t006_assetdepreciation_view->DepreciationAmount->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_assetdepreciation_view->DepreciationYtd->Visible) { // DepreciationYtd ?>
	<tr id="r_DepreciationYtd">
		<td class="<?php echo $t006_assetdepreciation_view->TableLeftColumnClass ?>"><span id="elh_t006_assetdepreciation_DepreciationYtd"><?php echo $t006_assetdepreciation_view->DepreciationYtd->caption() ?></span></td>
		<td data-name="DepreciationYtd" <?php echo $t006_assetdepreciation_view->DepreciationYtd->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_DepreciationYtd">
<span<?php echo $t006_assetdepreciation_view->DepreciationYtd->viewAttributes() ?>><?php echo $t006_assetdepreciation_view->DepreciationYtd->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t006_assetdepreciation_view->NetBookValue->Visible) { // NetBookValue ?>
	<tr id="r_NetBookValue">
		<td class="<?php echo $t006_assetdepreciation_view->TableLeftColumnClass ?>"><span id="elh_t006_assetdepreciation_NetBookValue"><?php echo $t006_assetdepreciation_view->NetBookValue->caption() ?></span></td>
		<td data-name="NetBookValue" <?php echo $t006_assetdepreciation_view->NetBookValue->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_NetBookValue">
<span<?php echo $t006_assetdepreciation_view->NetBookValue->viewAttributes() ?>><?php echo $t006_assetdepreciation_view->NetBookValue->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t006_assetdepreciation_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t006_assetdepreciation_view->isExport()) { ?>
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
$t006_assetdepreciation_view->terminate();
?>