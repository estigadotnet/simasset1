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
$t106_disposaldetail_view = new t106_disposaldetail_view();

// Run the page
$t106_disposaldetail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t106_disposaldetail_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t106_disposaldetail_view->isExport()) { ?>
<script>
var ft106_disposaldetailview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft106_disposaldetailview = currentForm = new ew.Form("ft106_disposaldetailview", "view");
	loadjs.done("ft106_disposaldetailview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t106_disposaldetail_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t106_disposaldetail_view->ExportOptions->render("body") ?>
<?php $t106_disposaldetail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t106_disposaldetail_view->showPageHeader(); ?>
<?php
$t106_disposaldetail_view->showMessage();
?>
<form name="ft106_disposaldetailview" id="ft106_disposaldetailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t106_disposaldetail">
<input type="hidden" name="modal" value="<?php echo (int)$t106_disposaldetail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t106_disposaldetail_view->disposalhead_id->Visible) { // disposalhead_id ?>
	<tr id="r_disposalhead_id">
		<td class="<?php echo $t106_disposaldetail_view->TableLeftColumnClass ?>"><span id="elh_t106_disposaldetail_disposalhead_id"><?php echo $t106_disposaldetail_view->disposalhead_id->caption() ?></span></td>
		<td data-name="disposalhead_id" <?php echo $t106_disposaldetail_view->disposalhead_id->cellAttributes() ?>>
<span id="el_t106_disposaldetail_disposalhead_id">
<span<?php echo $t106_disposaldetail_view->disposalhead_id->viewAttributes() ?>><?php echo $t106_disposaldetail_view->disposalhead_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t106_disposaldetail_view->asset_id->Visible) { // asset_id ?>
	<tr id="r_asset_id">
		<td class="<?php echo $t106_disposaldetail_view->TableLeftColumnClass ?>"><span id="elh_t106_disposaldetail_asset_id"><?php echo $t106_disposaldetail_view->asset_id->caption() ?></span></td>
		<td data-name="asset_id" <?php echo $t106_disposaldetail_view->asset_id->cellAttributes() ?>>
<span id="el_t106_disposaldetail_asset_id">
<span<?php echo $t106_disposaldetail_view->asset_id->viewAttributes() ?>><?php echo $t106_disposaldetail_view->asset_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t106_disposaldetail_view->cond_id->Visible) { // cond_id ?>
	<tr id="r_cond_id">
		<td class="<?php echo $t106_disposaldetail_view->TableLeftColumnClass ?>"><span id="elh_t106_disposaldetail_cond_id"><?php echo $t106_disposaldetail_view->cond_id->caption() ?></span></td>
		<td data-name="cond_id" <?php echo $t106_disposaldetail_view->cond_id->cellAttributes() ?>>
<span id="el_t106_disposaldetail_cond_id">
<span<?php echo $t106_disposaldetail_view->cond_id->viewAttributes() ?>><?php echo $t106_disposaldetail_view->cond_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t106_disposaldetail_view->reason_id->Visible) { // reason_id ?>
	<tr id="r_reason_id">
		<td class="<?php echo $t106_disposaldetail_view->TableLeftColumnClass ?>"><span id="elh_t106_disposaldetail_reason_id"><?php echo $t106_disposaldetail_view->reason_id->caption() ?></span></td>
		<td data-name="reason_id" <?php echo $t106_disposaldetail_view->reason_id->cellAttributes() ?>>
<span id="el_t106_disposaldetail_reason_id">
<span<?php echo $t106_disposaldetail_view->reason_id->viewAttributes() ?>><?php echo $t106_disposaldetail_view->reason_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t106_disposaldetail_view->IsModal) { ?>
<?php if (!$t106_disposaldetail_view->isExport()) { ?>
<?php echo $t106_disposaldetail_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t106_disposaldetail_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t106_disposaldetail_view->isExport()) { ?>
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
$t106_disposaldetail_view->terminate();
?>