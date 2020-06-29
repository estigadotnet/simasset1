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
$t007_assettype_view = new t007_assettype_view();

// Run the page
$t007_assettype_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_assettype_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t007_assettype_view->isExport()) { ?>
<script>
var ft007_assettypeview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft007_assettypeview = currentForm = new ew.Form("ft007_assettypeview", "view");
	loadjs.done("ft007_assettypeview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t007_assettype_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t007_assettype_view->ExportOptions->render("body") ?>
<?php $t007_assettype_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t007_assettype_view->showPageHeader(); ?>
<?php
$t007_assettype_view->showMessage();
?>
<form name="ft007_assettypeview" id="ft007_assettypeview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_assettype">
<input type="hidden" name="modal" value="<?php echo (int)$t007_assettype_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t007_assettype_view->assetgroup_id->Visible) { // assetgroup_id ?>
	<tr id="r_assetgroup_id">
		<td class="<?php echo $t007_assettype_view->TableLeftColumnClass ?>"><span id="elh_t007_assettype_assetgroup_id"><?php echo $t007_assettype_view->assetgroup_id->caption() ?></span></td>
		<td data-name="assetgroup_id" <?php echo $t007_assettype_view->assetgroup_id->cellAttributes() ?>>
<span id="el_t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_view->assetgroup_id->viewAttributes() ?>><?php echo $t007_assettype_view->assetgroup_id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t007_assettype_view->Description->Visible) { // Description ?>
	<tr id="r_Description">
		<td class="<?php echo $t007_assettype_view->TableLeftColumnClass ?>"><span id="elh_t007_assettype_Description"><?php echo $t007_assettype_view->Description->caption() ?></span></td>
		<td data-name="Description" <?php echo $t007_assettype_view->Description->cellAttributes() ?>>
<span id="el_t007_assettype_Description">
<span<?php echo $t007_assettype_view->Description->viewAttributes() ?>><?php echo $t007_assettype_view->Description->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t007_assettype_view->Code->Visible) { // Code ?>
	<tr id="r_Code">
		<td class="<?php echo $t007_assettype_view->TableLeftColumnClass ?>"><span id="elh_t007_assettype_Code"><?php echo $t007_assettype_view->Code->caption() ?></span></td>
		<td data-name="Code" <?php echo $t007_assettype_view->Code->cellAttributes() ?>>
<span id="el_t007_assettype_Code">
<span<?php echo $t007_assettype_view->Code->viewAttributes() ?>><?php echo $t007_assettype_view->Code->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t007_assettype_view->IsModal) { ?>
<?php if (!$t007_assettype_view->isExport()) { ?>
<?php echo $t007_assettype_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t007_assettype_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t007_assettype_view->isExport()) { ?>
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
$t007_assettype_view->terminate();
?>