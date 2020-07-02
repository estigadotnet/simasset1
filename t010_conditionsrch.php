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
$t010_condition_search = new t010_condition_search();

// Run the page
$t010_condition_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t010_condition_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft010_conditionsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t010_condition_search->IsModal) { ?>
	ft010_conditionsearch = currentAdvancedSearchForm = new ew.Form("ft010_conditionsearch", "search");
	<?php } else { ?>
	ft010_conditionsearch = currentForm = new ew.Form("ft010_conditionsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft010_conditionsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t010_condition_search->id->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft010_conditionsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft010_conditionsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft010_conditionsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t010_condition_search->showPageHeader(); ?>
<?php
$t010_condition_search->showMessage();
?>
<form name="ft010_conditionsearch" id="ft010_conditionsearch" class="<?php echo $t010_condition_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t010_condition">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t010_condition_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t010_condition_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t010_condition_search->LeftColumnClass ?>"><span id="elh_t010_condition_id"><?php echo $t010_condition_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t010_condition_search->RightColumnClass ?>"><div <?php echo $t010_condition_search->id->cellAttributes() ?>>
			<span id="el_t010_condition_id" class="ew-search-field">
<input type="text" data-table="t010_condition" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t010_condition_search->id->getPlaceHolder()) ?>" value="<?php echo $t010_condition_search->id->EditValue ?>"<?php echo $t010_condition_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t010_condition_search->Status->Visible) { // Status ?>
	<div id="r_Status" class="form-group row">
		<label for="x_Status" class="<?php echo $t010_condition_search->LeftColumnClass ?>"><span id="elh_t010_condition_Status"><?php echo $t010_condition_search->Status->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Status" id="z_Status" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t010_condition_search->RightColumnClass ?>"><div <?php echo $t010_condition_search->Status->cellAttributes() ?>>
			<span id="el_t010_condition_Status" class="ew-search-field">
<input type="text" data-table="t010_condition" data-field="x_Status" name="x_Status" id="x_Status" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t010_condition_search->Status->getPlaceHolder()) ?>" value="<?php echo $t010_condition_search->Status->EditValue ?>"<?php echo $t010_condition_search->Status->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t010_condition_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t010_condition_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t010_condition_search->showPageFooter();
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
$t010_condition_search->terminate();
?>