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
$t102_ho_detail_view = new t102_ho_detail_view();

// Run the page
$t102_ho_detail_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t102_ho_detail_view->isExport()) { ?>
<script>
var ft102_ho_detailview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft102_ho_detailview = currentForm = new ew.Form("ft102_ho_detailview", "view");
	loadjs.done("ft102_ho_detailview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t102_ho_detail_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t102_ho_detail_view->ExportOptions->render("body") ?>
<?php $t102_ho_detail_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t102_ho_detail_view->showPageHeader(); ?>
<?php
$t102_ho_detail_view->showMessage();
?>
<form name="ft102_ho_detailview" id="ft102_ho_detailview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_ho_detail">
<input type="hidden" name="modal" value="<?php echo (int)$t102_ho_detail_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t102_ho_detail_view->asset_id->Visible) { // asset_id ?>
	<tr id="r_asset_id">
		<td class="<?php echo $t102_ho_detail_view->TableLeftColumnClass ?>"><span id="elh_t102_ho_detail_asset_id"><?php echo $t102_ho_detail_view->asset_id->caption() ?></span></td>
		<td data-name="asset_id" <?php echo $t102_ho_detail_view->asset_id->cellAttributes() ?>>
<span id="el_t102_ho_detail_asset_id">
<span<?php echo $t102_ho_detail_view->asset_id->viewAttributes() ?>><?php echo $t102_ho_detail_view->asset_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t102_ho_detail_view->IsModal) { ?>
<?php if (!$t102_ho_detail_view->isExport()) { ?>
<?php echo $t102_ho_detail_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t102_ho_detail_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t102_ho_detail_view->isExport()) { ?>
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
$t102_ho_detail_view->terminate();
?>