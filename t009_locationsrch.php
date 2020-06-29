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
$t009_location_search = new t009_location_search();

// Run the page
$t009_location_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t009_location_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft009_locationsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t009_location_search->IsModal) { ?>
	ft009_locationsearch = currentAdvancedSearchForm = new ew.Form("ft009_locationsearch", "search");
	<?php } else { ?>
	ft009_locationsearch = currentForm = new ew.Form("ft009_locationsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft009_locationsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t009_location_search->id->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft009_locationsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft009_locationsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft009_locationsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t009_location_search->showPageHeader(); ?>
<?php
$t009_location_search->showMessage();
?>
<form name="ft009_locationsearch" id="ft009_locationsearch" class="<?php echo $t009_location_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t009_location">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t009_location_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t009_location_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t009_location_search->LeftColumnClass ?>"><span id="elh_t009_location_id"><?php echo $t009_location_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t009_location_search->RightColumnClass ?>"><div <?php echo $t009_location_search->id->cellAttributes() ?>>
			<span id="el_t009_location_id" class="ew-search-field">
<input type="text" data-table="t009_location" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t009_location_search->id->getPlaceHolder()) ?>" value="<?php echo $t009_location_search->id->EditValue ?>"<?php echo $t009_location_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t009_location_search->Location->Visible) { // Location ?>
	<div id="r_Location" class="form-group row">
		<label for="x_Location" class="<?php echo $t009_location_search->LeftColumnClass ?>"><span id="elh_t009_location_Location"><?php echo $t009_location_search->Location->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Location" id="z_Location" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t009_location_search->RightColumnClass ?>"><div <?php echo $t009_location_search->Location->cellAttributes() ?>>
			<span id="el_t009_location_Location" class="ew-search-field">
<input type="text" data-table="t009_location" data-field="x_Location" name="x_Location" id="x_Location" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t009_location_search->Location->getPlaceHolder()) ?>" value="<?php echo $t009_location_search->Location->EditValue ?>"<?php echo $t009_location_search->Location->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t009_location_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t009_location_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t009_location_search->showPageFooter();
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
$t009_location_search->terminate();
?>