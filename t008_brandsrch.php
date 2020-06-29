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
$t008_brand_search = new t008_brand_search();

// Run the page
$t008_brand_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t008_brand_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft008_brandsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t008_brand_search->IsModal) { ?>
	ft008_brandsearch = currentAdvancedSearchForm = new ew.Form("ft008_brandsearch", "search");
	<?php } else { ?>
	ft008_brandsearch = currentForm = new ew.Form("ft008_brandsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft008_brandsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t008_brand_search->id->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft008_brandsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft008_brandsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft008_brandsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t008_brand_search->showPageHeader(); ?>
<?php
$t008_brand_search->showMessage();
?>
<form name="ft008_brandsearch" id="ft008_brandsearch" class="<?php echo $t008_brand_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t008_brand">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t008_brand_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t008_brand_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t008_brand_search->LeftColumnClass ?>"><span id="elh_t008_brand_id"><?php echo $t008_brand_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t008_brand_search->RightColumnClass ?>"><div <?php echo $t008_brand_search->id->cellAttributes() ?>>
			<span id="el_t008_brand_id" class="ew-search-field">
<input type="text" data-table="t008_brand" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t008_brand_search->id->getPlaceHolder()) ?>" value="<?php echo $t008_brand_search->id->EditValue ?>"<?php echo $t008_brand_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t008_brand_search->Brand->Visible) { // Brand ?>
	<div id="r_Brand" class="form-group row">
		<label for="x_Brand" class="<?php echo $t008_brand_search->LeftColumnClass ?>"><span id="elh_t008_brand_Brand"><?php echo $t008_brand_search->Brand->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Brand" id="z_Brand" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t008_brand_search->RightColumnClass ?>"><div <?php echo $t008_brand_search->Brand->cellAttributes() ?>>
			<span id="el_t008_brand_Brand" class="ew-search-field">
<input type="text" data-table="t008_brand" data-field="x_Brand" name="x_Brand" id="x_Brand" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t008_brand_search->Brand->getPlaceHolder()) ?>" value="<?php echo $t008_brand_search->Brand->EditValue ?>"<?php echo $t008_brand_search->Brand->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t008_brand_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t008_brand_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t008_brand_search->showPageFooter();
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
$t008_brand_search->terminate();
?>