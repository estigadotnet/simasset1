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
$t008_brand_view = new t008_brand_view();

// Run the page
$t008_brand_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t008_brand_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t008_brand_view->isExport()) { ?>
<script>
var ft008_brandview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft008_brandview = currentForm = new ew.Form("ft008_brandview", "view");
	loadjs.done("ft008_brandview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t008_brand_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t008_brand_view->ExportOptions->render("body") ?>
<?php $t008_brand_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t008_brand_view->showPageHeader(); ?>
<?php
$t008_brand_view->showMessage();
?>
<form name="ft008_brandview" id="ft008_brandview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t008_brand">
<input type="hidden" name="modal" value="<?php echo (int)$t008_brand_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t008_brand_view->Brand->Visible) { // Brand ?>
	<tr id="r_Brand">
		<td class="<?php echo $t008_brand_view->TableLeftColumnClass ?>"><span id="elh_t008_brand_Brand"><?php echo $t008_brand_view->Brand->caption() ?></span></td>
		<td data-name="Brand" <?php echo $t008_brand_view->Brand->cellAttributes() ?>>
<span id="el_t008_brand_Brand">
<span<?php echo $t008_brand_view->Brand->viewAttributes() ?>><?php echo $t008_brand_view->Brand->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t008_brand_view->IsModal) { ?>
<?php if (!$t008_brand_view->isExport()) { ?>
<?php echo $t008_brand_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t008_brand_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t008_brand_view->isExport()) { ?>
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
$t008_brand_view->terminate();
?>