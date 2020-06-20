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
$t205_parameter_view = new t205_parameter_view();

// Run the page
$t205_parameter_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t205_parameter_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t205_parameter_view->isExport()) { ?>
<script>
var ft205_parameterview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft205_parameterview = currentForm = new ew.Form("ft205_parameterview", "view");
	loadjs.done("ft205_parameterview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t205_parameter_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t205_parameter_view->ExportOptions->render("body") ?>
<?php $t205_parameter_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t205_parameter_view->showPageHeader(); ?>
<?php
$t205_parameter_view->showMessage();
?>
<form name="ft205_parameterview" id="ft205_parameterview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t205_parameter">
<input type="hidden" name="modal" value="<?php echo (int)$t205_parameter_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t205_parameter_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t205_parameter_view->TableLeftColumnClass ?>"><span id="elh_t205_parameter_id"><?php echo $t205_parameter_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t205_parameter_view->id->cellAttributes() ?>>
<span id="el_t205_parameter_id">
<span<?php echo $t205_parameter_view->id->viewAttributes() ?>><?php echo $t205_parameter_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t205_parameter_view->Category->Visible) { // Category ?>
	<tr id="r_Category">
		<td class="<?php echo $t205_parameter_view->TableLeftColumnClass ?>"><span id="elh_t205_parameter_Category"><?php echo $t205_parameter_view->Category->caption() ?></span></td>
		<td data-name="Category" <?php echo $t205_parameter_view->Category->cellAttributes() ?>>
<span id="el_t205_parameter_Category">
<span<?php echo $t205_parameter_view->Category->viewAttributes() ?>><?php echo $t205_parameter_view->Category->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t205_parameter_view->Parameter->Visible) { // Parameter ?>
	<tr id="r_Parameter">
		<td class="<?php echo $t205_parameter_view->TableLeftColumnClass ?>"><span id="elh_t205_parameter_Parameter"><?php echo $t205_parameter_view->Parameter->caption() ?></span></td>
		<td data-name="Parameter" <?php echo $t205_parameter_view->Parameter->cellAttributes() ?>>
<span id="el_t205_parameter_Parameter">
<span<?php echo $t205_parameter_view->Parameter->viewAttributes() ?>><?php echo $t205_parameter_view->Parameter->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t205_parameter_view->Nilai->Visible) { // Nilai ?>
	<tr id="r_Nilai">
		<td class="<?php echo $t205_parameter_view->TableLeftColumnClass ?>"><span id="elh_t205_parameter_Nilai"><?php echo $t205_parameter_view->Nilai->caption() ?></span></td>
		<td data-name="Nilai" <?php echo $t205_parameter_view->Nilai->cellAttributes() ?>>
<span id="el_t205_parameter_Nilai">
<span<?php echo $t205_parameter_view->Nilai->viewAttributes() ?>><?php echo $t205_parameter_view->Nilai->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
<?php if (!$t205_parameter_view->IsModal) { ?>
<?php if (!$t205_parameter_view->isExport()) { ?>
<?php echo $t205_parameter_view->Pager->render() ?>
<div class="clearfix"></div>
<?php } ?>
<?php } ?>
</form>
<?php
$t205_parameter_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t205_parameter_view->isExport()) { ?>
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
$t205_parameter_view->terminate();
?>