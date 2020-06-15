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
$t002_department_search = new t002_department_search();

// Run the page
$t002_department_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_department_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft002_departmentsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t002_department_search->IsModal) { ?>
	ft002_departmentsearch = currentAdvancedSearchForm = new ew.Form("ft002_departmentsearch", "search");
	<?php } else { ?>
	ft002_departmentsearch = currentForm = new ew.Form("ft002_departmentsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft002_departmentsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft002_departmentsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_departmentsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_departmentsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t002_department_search->showPageHeader(); ?>
<?php
$t002_department_search->showMessage();
?>
<form name="ft002_departmentsearch" id="ft002_departmentsearch" class="<?php echo $t002_department_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_department">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t002_department_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t002_department_search->Department->Visible) { // Department ?>
	<div id="r_Department" class="form-group row">
		<label for="x_Department" class="<?php echo $t002_department_search->LeftColumnClass ?>"><span id="elh_t002_department_Department"><?php echo $t002_department_search->Department->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Department" id="z_Department" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t002_department_search->RightColumnClass ?>"><div <?php echo $t002_department_search->Department->cellAttributes() ?>>
			<span id="el_t002_department_Department" class="ew-search-field">
<input type="text" data-table="t002_department" data-field="x_Department" name="x_Department" id="x_Department" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t002_department_search->Department->getPlaceHolder()) ?>" value="<?php echo $t002_department_search->Department->EditValue ?>"<?php echo $t002_department_search->Department->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t002_department_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t002_department_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t002_department_search->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$t002_department_search->terminate();
?>