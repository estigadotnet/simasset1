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
$t002_department_view = new t002_department_view();

// Run the page
$t002_department_view->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_department_view->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_department_view->isExport()) { ?>
<script>
var ft002_departmentview, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "view";
	ft002_departmentview = currentForm = new ew.Form("ft002_departmentview", "view");
	loadjs.done("ft002_departmentview");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_department_view->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php $t002_department_view->ExportOptions->render("body") ?>
<?php $t002_department_view->OtherOptions->render("body") ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php $t002_department_view->showPageHeader(); ?>
<?php
$t002_department_view->showMessage();
?>
<form name="ft002_departmentview" id="ft002_departmentview" class="form-inline ew-form ew-view-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_department">
<input type="hidden" name="modal" value="<?php echo (int)$t002_department_view->IsModal ?>">
<table class="table table-striped table-sm ew-view-table">
<?php if ($t002_department_view->id->Visible) { // id ?>
	<tr id="r_id">
		<td class="<?php echo $t002_department_view->TableLeftColumnClass ?>"><span id="elh_t002_department_id"><?php echo $t002_department_view->id->caption() ?></span></td>
		<td data-name="id" <?php echo $t002_department_view->id->cellAttributes() ?>>
<span id="el_t002_department_id">
<span<?php echo $t002_department_view->id->viewAttributes() ?>><?php echo $t002_department_view->id->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
<?php if ($t002_department_view->Department->Visible) { // Department ?>
	<tr id="r_Department">
		<td class="<?php echo $t002_department_view->TableLeftColumnClass ?>"><span id="elh_t002_department_Department"><?php echo $t002_department_view->Department->caption() ?></span></td>
		<td data-name="Department" <?php echo $t002_department_view->Department->cellAttributes() ?>>
<span id="el_t002_department_Department">
<span<?php echo $t002_department_view->Department->viewAttributes() ?>><?php echo $t002_department_view->Department->getViewValue() ?></span>
</span>
</td>
	</tr>
<?php } ?>
</table>
</form>
<?php
$t002_department_view->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_department_view->isExport()) { ?>
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
$t002_department_view->terminate();
?>