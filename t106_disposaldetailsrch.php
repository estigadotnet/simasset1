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
$t106_disposaldetail_search = new t106_disposaldetail_search();

// Run the page
$t106_disposaldetail_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t106_disposaldetail_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft106_disposaldetailsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t106_disposaldetail_search->IsModal) { ?>
	ft106_disposaldetailsearch = currentAdvancedSearchForm = new ew.Form("ft106_disposaldetailsearch", "search");
	<?php } else { ?>
	ft106_disposaldetailsearch = currentForm = new ew.Form("ft106_disposaldetailsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft106_disposaldetailsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t106_disposaldetail_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_disposalhead_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t106_disposaldetail_search->disposalhead_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_depreciation_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t106_disposaldetail_search->depreciation_id->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft106_disposaldetailsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft106_disposaldetailsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft106_disposaldetailsearch.lists["x_asset_id"] = <?php echo $t106_disposaldetail_search->asset_id->Lookup->toClientList($t106_disposaldetail_search) ?>;
	ft106_disposaldetailsearch.lists["x_asset_id"].options = <?php echo JsonEncode($t106_disposaldetail_search->asset_id->lookupOptions()) ?>;
	ft106_disposaldetailsearch.lists["x_cond_id"] = <?php echo $t106_disposaldetail_search->cond_id->Lookup->toClientList($t106_disposaldetail_search) ?>;
	ft106_disposaldetailsearch.lists["x_cond_id"].options = <?php echo JsonEncode($t106_disposaldetail_search->cond_id->lookupOptions()) ?>;
	ft106_disposaldetailsearch.lists["x_reason_id"] = <?php echo $t106_disposaldetail_search->reason_id->Lookup->toClientList($t106_disposaldetail_search) ?>;
	ft106_disposaldetailsearch.lists["x_reason_id"].options = <?php echo JsonEncode($t106_disposaldetail_search->reason_id->lookupOptions()) ?>;
	loadjs.done("ft106_disposaldetailsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t106_disposaldetail_search->showPageHeader(); ?>
<?php
$t106_disposaldetail_search->showMessage();
?>
<form name="ft106_disposaldetailsearch" id="ft106_disposaldetailsearch" class="<?php echo $t106_disposaldetail_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t106_disposaldetail">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t106_disposaldetail_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t106_disposaldetail_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t106_disposaldetail_search->LeftColumnClass ?>"><span id="elh_t106_disposaldetail_id"><?php echo $t106_disposaldetail_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t106_disposaldetail_search->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_search->id->cellAttributes() ?>>
			<span id="el_t106_disposaldetail_id" class="ew-search-field">
<input type="text" data-table="t106_disposaldetail" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t106_disposaldetail_search->id->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_search->id->EditValue ?>"<?php echo $t106_disposaldetail_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_search->disposalhead_id->Visible) { // disposalhead_id ?>
	<div id="r_disposalhead_id" class="form-group row">
		<label for="x_disposalhead_id" class="<?php echo $t106_disposaldetail_search->LeftColumnClass ?>"><span id="elh_t106_disposaldetail_disposalhead_id"><?php echo $t106_disposaldetail_search->disposalhead_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_disposalhead_id" id="z_disposalhead_id" value="=">
</span>
		</label>
		<div class="<?php echo $t106_disposaldetail_search->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_search->disposalhead_id->cellAttributes() ?>>
			<span id="el_t106_disposaldetail_disposalhead_id" class="ew-search-field">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="x_disposalhead_id" id="x_disposalhead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t106_disposaldetail_search->disposalhead_id->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_search->disposalhead_id->EditValue ?>"<?php echo $t106_disposaldetail_search->disposalhead_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_search->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label for="x_asset_id" class="<?php echo $t106_disposaldetail_search->LeftColumnClass ?>"><span id="elh_t106_disposaldetail_asset_id"><?php echo $t106_disposaldetail_search->asset_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_asset_id" id="z_asset_id" value="=">
</span>
		</label>
		<div class="<?php echo $t106_disposaldetail_search->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_search->asset_id->cellAttributes() ?>>
			<span id="el_t106_disposaldetail_asset_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_search->asset_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_search->asset_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_search->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_search->asset_id->ReadOnly || $t106_disposaldetail_search->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_search->asset_id->Lookup->getParamTag($t106_disposaldetail_search, "p_x_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_search->asset_id->displayValueSeparatorAttribute() ?>" name="x_asset_id" id="x_asset_id" value="<?php echo $t106_disposaldetail_search->asset_id->AdvancedSearch->SearchValue ?>"<?php echo $t106_disposaldetail_search->asset_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_search->depreciation_id->Visible) { // depreciation_id ?>
	<div id="r_depreciation_id" class="form-group row">
		<label for="x_depreciation_id" class="<?php echo $t106_disposaldetail_search->LeftColumnClass ?>"><span id="elh_t106_disposaldetail_depreciation_id"><?php echo $t106_disposaldetail_search->depreciation_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_depreciation_id" id="z_depreciation_id" value="=">
</span>
		</label>
		<div class="<?php echo $t106_disposaldetail_search->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_search->depreciation_id->cellAttributes() ?>>
			<span id="el_t106_disposaldetail_depreciation_id" class="ew-search-field">
<input type="text" data-table="t106_disposaldetail" data-field="x_depreciation_id" name="x_depreciation_id" id="x_depreciation_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t106_disposaldetail_search->depreciation_id->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_search->depreciation_id->EditValue ?>"<?php echo $t106_disposaldetail_search->depreciation_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_search->cond_id->Visible) { // cond_id ?>
	<div id="r_cond_id" class="form-group row">
		<label for="x_cond_id" class="<?php echo $t106_disposaldetail_search->LeftColumnClass ?>"><span id="elh_t106_disposaldetail_cond_id"><?php echo $t106_disposaldetail_search->cond_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_cond_id" id="z_cond_id" value="=">
</span>
		</label>
		<div class="<?php echo $t106_disposaldetail_search->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_search->cond_id->cellAttributes() ?>>
			<span id="el_t106_disposaldetail_cond_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_search->cond_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_search->cond_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_search->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_search->cond_id->ReadOnly || $t106_disposaldetail_search->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_search->cond_id->Lookup->getParamTag($t106_disposaldetail_search, "p_x_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_search->cond_id->displayValueSeparatorAttribute() ?>" name="x_cond_id" id="x_cond_id" value="<?php echo $t106_disposaldetail_search->cond_id->AdvancedSearch->SearchValue ?>"<?php echo $t106_disposaldetail_search->cond_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_search->reason_id->Visible) { // reason_id ?>
	<div id="r_reason_id" class="form-group row">
		<label for="x_reason_id" class="<?php echo $t106_disposaldetail_search->LeftColumnClass ?>"><span id="elh_t106_disposaldetail_reason_id"><?php echo $t106_disposaldetail_search->reason_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_reason_id" id="z_reason_id" value="=">
</span>
		</label>
		<div class="<?php echo $t106_disposaldetail_search->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_search->reason_id->cellAttributes() ?>>
			<span id="el_t106_disposaldetail_reason_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_search->reason_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_search->reason_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_search->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_search->reason_id->ReadOnly || $t106_disposaldetail_search->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_search->reason_id->Lookup->getParamTag($t106_disposaldetail_search, "p_x_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_search->reason_id->displayValueSeparatorAttribute() ?>" name="x_reason_id" id="x_reason_id" value="<?php echo $t106_disposaldetail_search->reason_id->AdvancedSearch->SearchValue ?>"<?php echo $t106_disposaldetail_search->reason_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t106_disposaldetail_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t106_disposaldetail_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t106_disposaldetail_search->showPageFooter();
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
$t106_disposaldetail_search->terminate();
?>