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
$t005_assetgroup_search = new t005_assetgroup_search();

// Run the page
$t005_assetgroup_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_assetgroup_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_assetgroupsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t005_assetgroup_search->IsModal) { ?>
	ft005_assetgroupsearch = currentAdvancedSearchForm = new ew.Form("ft005_assetgroupsearch", "search");
	<?php } else { ?>
	ft005_assetgroupsearch = currentForm = new ew.Form("ft005_assetgroupsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft005_assetgroupsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_EstimatedLife");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_search->EstimatedLife->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_SLN");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_search->SLN->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft005_assetgroupsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_assetgroupsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft005_assetgroupsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_assetgroup_search->showPageHeader(); ?>
<?php
$t005_assetgroup_search->showMessage();
?>
<form name="ft005_assetgroupsearch" id="ft005_assetgroupsearch" class="<?php echo $t005_assetgroup_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_assetgroup">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t005_assetgroup_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t005_assetgroup_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t005_assetgroup_search->LeftColumnClass ?>"><span id="elh_t005_assetgroup_id"><?php echo $t005_assetgroup_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t005_assetgroup_search->RightColumnClass ?>"><div <?php echo $t005_assetgroup_search->id->cellAttributes() ?>>
			<span id="el_t005_assetgroup_id" class="ew-search-field">
<input type="text" data-table="t005_assetgroup" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t005_assetgroup_search->id->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_search->id->EditValue ?>"<?php echo $t005_assetgroup_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_search->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label for="x_Code" class="<?php echo $t005_assetgroup_search->LeftColumnClass ?>"><span id="elh_t005_assetgroup_Code"><?php echo $t005_assetgroup_search->Code->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Code" id="z_Code" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t005_assetgroup_search->RightColumnClass ?>"><div <?php echo $t005_assetgroup_search->Code->cellAttributes() ?>>
			<span id="el_t005_assetgroup_Code" class="ew-search-field">
<input type="text" data-table="t005_assetgroup" data-field="x_Code" name="x_Code" id="x_Code" size="2" maxlength="5" placeholder="<?php echo HtmlEncode($t005_assetgroup_search->Code->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_search->Code->EditValue ?>"<?php echo $t005_assetgroup_search->Code->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_search->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label for="x_Description" class="<?php echo $t005_assetgroup_search->LeftColumnClass ?>"><span id="elh_t005_assetgroup_Description"><?php echo $t005_assetgroup_search->Description->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Description" id="z_Description" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t005_assetgroup_search->RightColumnClass ?>"><div <?php echo $t005_assetgroup_search->Description->cellAttributes() ?>>
			<span id="el_t005_assetgroup_Description" class="ew-search-field">
<input type="text" data-table="t005_assetgroup" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t005_assetgroup_search->Description->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_search->Description->EditValue ?>"<?php echo $t005_assetgroup_search->Description->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_search->EstimatedLife->Visible) { // EstimatedLife ?>
	<div id="r_EstimatedLife" class="form-group row">
		<label for="x_EstimatedLife" class="<?php echo $t005_assetgroup_search->LeftColumnClass ?>"><span id="elh_t005_assetgroup_EstimatedLife"><?php echo $t005_assetgroup_search->EstimatedLife->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_EstimatedLife" id="z_EstimatedLife" value="=">
</span>
		</label>
		<div class="<?php echo $t005_assetgroup_search->RightColumnClass ?>"><div <?php echo $t005_assetgroup_search->EstimatedLife->cellAttributes() ?>>
			<span id="el_t005_assetgroup_EstimatedLife" class="ew-search-field">
<input type="text" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="x_EstimatedLife" id="x_EstimatedLife" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_search->EstimatedLife->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_search->EstimatedLife->EditValue ?>"<?php echo $t005_assetgroup_search->EstimatedLife->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_search->SLN->Visible) { // SLN ?>
	<div id="r_SLN" class="form-group row">
		<label for="x_SLN" class="<?php echo $t005_assetgroup_search->LeftColumnClass ?>"><span id="elh_t005_assetgroup_SLN"><?php echo $t005_assetgroup_search->SLN->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_SLN" id="z_SLN" value="=">
</span>
		</label>
		<div class="<?php echo $t005_assetgroup_search->RightColumnClass ?>"><div <?php echo $t005_assetgroup_search->SLN->cellAttributes() ?>>
			<span id="el_t005_assetgroup_SLN" class="ew-search-field">
<input type="text" data-table="t005_assetgroup" data-field="x_SLN" name="x_SLN" id="x_SLN" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_search->SLN->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_search->SLN->EditValue ?>"<?php echo $t005_assetgroup_search->SLN->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t005_assetgroup_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t005_assetgroup_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t005_assetgroup_search->showPageFooter();
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
$t005_assetgroup_search->terminate();
?>