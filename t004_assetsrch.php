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
$t004_asset_search = new t004_asset_search();

// Run the page
$t004_asset_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_assetsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t004_asset_search->IsModal) { ?>
	ft004_assetsearch = currentAdvancedSearchForm = new ew.Form("ft004_assetsearch", "search");
	<?php } else { ?>
	ft004_assetsearch = currentForm = new ew.Form("ft004_assetsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft004_assetsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_group_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t004_asset_search->group_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Qty");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t004_asset_search->Qty->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_Variance");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t004_asset_search->Variance->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ProcurementDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t004_asset_search->ProcurementDate->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ProcurementCurrentCost");
		if (elm && !ew.checkNumber(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t004_asset_search->ProcurementCurrentCost->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PeriodBegin");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t004_asset_search->PeriodBegin->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_PeriodEnd");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t004_asset_search->PeriodEnd->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft004_assetsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft004_assetsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft004_assetsearch.lists["x_property_id"] = <?php echo $t004_asset_search->property_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_property_id"].options = <?php echo JsonEncode($t004_asset_search->property_id->lookupOptions()) ?>;
	ft004_assetsearch.lists["x_group_id"] = <?php echo $t004_asset_search->group_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_group_id"].options = <?php echo JsonEncode($t004_asset_search->group_id->lookupOptions()) ?>;
	ft004_assetsearch.autoSuggests["x_group_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	ft004_assetsearch.lists["x_type_id"] = <?php echo $t004_asset_search->type_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_type_id"].options = <?php echo JsonEncode($t004_asset_search->type_id->lookupOptions()) ?>;
	ft004_assetsearch.lists["x_brand_id"] = <?php echo $t004_asset_search->brand_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_brand_id"].options = <?php echo JsonEncode($t004_asset_search->brand_id->lookupOptions()) ?>;
	ft004_assetsearch.lists["x_signature_id"] = <?php echo $t004_asset_search->signature_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_signature_id"].options = <?php echo JsonEncode($t004_asset_search->signature_id->lookupOptions()) ?>;
	ft004_assetsearch.lists["x_department_id"] = <?php echo $t004_asset_search->department_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_department_id"].options = <?php echo JsonEncode($t004_asset_search->department_id->lookupOptions()) ?>;
	ft004_assetsearch.lists["x_location_id"] = <?php echo $t004_asset_search->location_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_location_id"].options = <?php echo JsonEncode($t004_asset_search->location_id->lookupOptions()) ?>;
	ft004_assetsearch.lists["x_cond_id"] = <?php echo $t004_asset_search->cond_id->Lookup->toClientList($t004_asset_search) ?>;
	ft004_assetsearch.lists["x_cond_id"].options = <?php echo JsonEncode($t004_asset_search->cond_id->lookupOptions()) ?>;
	loadjs.done("ft004_assetsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_asset_search->showPageHeader(); ?>
<?php
$t004_asset_search->showMessage();
?>
<form name="ft004_assetsearch" id="ft004_assetsearch" class="<?php echo $t004_asset_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t004_asset_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t004_asset_search->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label for="x_property_id" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_property_id"><?php echo $t004_asset_search->property_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_property_id" id="z_property_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->property_id->cellAttributes() ?>>
			<span id="el_t004_asset_property_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_property_id"><?php echo EmptyValue(strval($t004_asset_search->property_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_search->property_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_search->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_search->property_id->ReadOnly || $t004_asset_search->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_search->property_id->Lookup->getParamTag($t004_asset_search, "p_x_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_search->property_id->displayValueSeparatorAttribute() ?>" name="x_property_id" id="x_property_id" value="<?php echo $t004_asset_search->property_id->AdvancedSearch->SearchValue ?>"<?php echo $t004_asset_search->property_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->group_id->Visible) { // group_id ?>
	<div id="r_group_id" class="form-group row">
		<label class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_group_id"><?php echo $t004_asset_search->group_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_group_id" id="z_group_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->group_id->cellAttributes() ?>>
			<span id="el_t004_asset_group_id" class="ew-search-field">
<?php
$onchange = $t004_asset_search->group_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t004_asset_search->group_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_group_id">
	<input type="text" class="form-control" name="sv_x_group_id" id="sv_x_group_id" value="<?php echo RemoveHtml($t004_asset_search->group_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t004_asset_search->group_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t004_asset_search->group_id->getPlaceHolder()) ?>"<?php echo $t004_asset_search->group_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_group_id" data-value-separator="<?php echo $t004_asset_search->group_id->displayValueSeparatorAttribute() ?>" name="x_group_id" id="x_group_id" value="<?php echo HtmlEncode($t004_asset_search->group_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft004_assetsearch"], function() {
	ft004_assetsearch.createAutoSuggest({"id":"x_group_id","forceSelect":false});
});
</script>
<?php echo $t004_asset_search->group_id->Lookup->getParamTag($t004_asset_search, "p_x_group_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->type_id->Visible) { // type_id ?>
	<div id="r_type_id" class="form-group row">
		<label for="x_type_id" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_type_id"><?php echo $t004_asset_search->type_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_type_id" id="z_type_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->type_id->cellAttributes() ?>>
			<span id="el_t004_asset_type_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_type_id"><?php echo EmptyValue(strval($t004_asset_search->type_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_search->type_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_search->type_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_search->type_id->ReadOnly || $t004_asset_search->type_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_type_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_search->type_id->Lookup->getParamTag($t004_asset_search, "p_x_type_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_type_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_search->type_id->displayValueSeparatorAttribute() ?>" name="x_type_id" id="x_type_id" value="<?php echo $t004_asset_search->type_id->AdvancedSearch->SearchValue ?>"<?php echo $t004_asset_search->type_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label for="x_Code" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_Code"><?php echo $t004_asset_search->Code->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Code" id="z_Code" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->Code->cellAttributes() ?>>
			<span id="el_t004_asset_Code" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t004_asset_search->Code->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->Code->EditValue ?>"<?php echo $t004_asset_search->Code->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label for="x_Description" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_Description"><?php echo $t004_asset_search->Description->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Description" id="z_Description" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->Description->cellAttributes() ?>>
			<span id="el_t004_asset_Description" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_search->Description->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->Description->EditValue ?>"<?php echo $t004_asset_search->Description->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->brand_id->Visible) { // brand_id ?>
	<div id="r_brand_id" class="form-group row">
		<label for="x_brand_id" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_brand_id"><?php echo $t004_asset_search->brand_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_brand_id" id="z_brand_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->brand_id->cellAttributes() ?>>
			<span id="el_t004_asset_brand_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_brand_id"><?php echo EmptyValue(strval($t004_asset_search->brand_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_search->brand_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_search->brand_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_search->brand_id->ReadOnly || $t004_asset_search->brand_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_brand_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_search->brand_id->Lookup->getParamTag($t004_asset_search, "p_x_brand_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_brand_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_search->brand_id->displayValueSeparatorAttribute() ?>" name="x_brand_id" id="x_brand_id" value="<?php echo $t004_asset_search->brand_id->AdvancedSearch->SearchValue ?>"<?php echo $t004_asset_search->brand_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->signature_id->Visible) { // signature_id ?>
	<div id="r_signature_id" class="form-group row">
		<label for="x_signature_id" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_signature_id"><?php echo $t004_asset_search->signature_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_signature_id" id="z_signature_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->signature_id->cellAttributes() ?>>
			<span id="el_t004_asset_signature_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_signature_id"><?php echo EmptyValue(strval($t004_asset_search->signature_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_search->signature_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_search->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_search->signature_id->ReadOnly || $t004_asset_search->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_search->signature_id->Lookup->getParamTag($t004_asset_search, "p_x_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_search->signature_id->displayValueSeparatorAttribute() ?>" name="x_signature_id" id="x_signature_id" value="<?php echo $t004_asset_search->signature_id->AdvancedSearch->SearchValue ?>"<?php echo $t004_asset_search->signature_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->department_id->Visible) { // department_id ?>
	<div id="r_department_id" class="form-group row">
		<label for="x_department_id" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_department_id"><?php echo $t004_asset_search->department_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_department_id" id="z_department_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->department_id->cellAttributes() ?>>
			<span id="el_t004_asset_department_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_department_id"><?php echo EmptyValue(strval($t004_asset_search->department_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_search->department_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_search->department_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_search->department_id->ReadOnly || $t004_asset_search->department_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_department_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_search->department_id->Lookup->getParamTag($t004_asset_search, "p_x_department_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_department_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_search->department_id->displayValueSeparatorAttribute() ?>" name="x_department_id" id="x_department_id" value="<?php echo $t004_asset_search->department_id->AdvancedSearch->SearchValue ?>"<?php echo $t004_asset_search->department_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->location_id->Visible) { // location_id ?>
	<div id="r_location_id" class="form-group row">
		<label for="x_location_id" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_location_id"><?php echo $t004_asset_search->location_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_location_id" id="z_location_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->location_id->cellAttributes() ?>>
			<span id="el_t004_asset_location_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_location_id"><?php echo EmptyValue(strval($t004_asset_search->location_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_search->location_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_search->location_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_search->location_id->ReadOnly || $t004_asset_search->location_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_location_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_search->location_id->Lookup->getParamTag($t004_asset_search, "p_x_location_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_location_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_search->location_id->displayValueSeparatorAttribute() ?>" name="x_location_id" id="x_location_id" value="<?php echo $t004_asset_search->location_id->AdvancedSearch->SearchValue ?>"<?php echo $t004_asset_search->location_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->Qty->Visible) { // Qty ?>
	<div id="r_Qty" class="form-group row">
		<label for="x_Qty" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_Qty"><?php echo $t004_asset_search->Qty->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Qty" id="z_Qty" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->Qty->cellAttributes() ?>>
			<span id="el_t004_asset_Qty" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x_Qty" id="x_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_search->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->Qty->EditValue ?>"<?php echo $t004_asset_search->Qty->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->Variance->Visible) { // Variance ?>
	<div id="r_Variance" class="form-group row">
		<label for="x_Variance" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_Variance"><?php echo $t004_asset_search->Variance->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Variance" id="z_Variance" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->Variance->cellAttributes() ?>>
			<span id="el_t004_asset_Variance" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_Variance" name="x_Variance" id="x_Variance" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_search->Variance->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->Variance->EditValue ?>"<?php echo $t004_asset_search->Variance->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->cond_id->Visible) { // cond_id ?>
	<div id="r_cond_id" class="form-group row">
		<label for="x_cond_id" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_cond_id"><?php echo $t004_asset_search->cond_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_cond_id" id="z_cond_id" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->cond_id->cellAttributes() ?>>
			<span id="el_t004_asset_cond_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_cond_id"><?php echo EmptyValue(strval($t004_asset_search->cond_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_search->cond_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_search->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_search->cond_id->ReadOnly || $t004_asset_search->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_search->cond_id->Lookup->getParamTag($t004_asset_search, "p_x_cond_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_search->cond_id->displayValueSeparatorAttribute() ?>" name="x_cond_id" id="x_cond_id" value="<?php echo $t004_asset_search->cond_id->AdvancedSearch->SearchValue ?>"<?php echo $t004_asset_search->cond_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label for="x_Remarks" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_Remarks"><?php echo $t004_asset_search->Remarks->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->Remarks->cellAttributes() ?>>
			<span id="el_t004_asset_Remarks" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="15" maxlength="65535" placeholder="<?php echo HtmlEncode($t004_asset_search->Remarks->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->Remarks->EditValue ?>"<?php echo $t004_asset_search->Remarks->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->ProcurementDate->Visible) { // ProcurementDate ?>
	<div id="r_ProcurementDate" class="form-group row">
		<label for="x_ProcurementDate" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_ProcurementDate"><?php echo $t004_asset_search->ProcurementDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ProcurementDate" id="z_ProcurementDate" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->ProcurementDate->cellAttributes() ?>>
			<span id="el_t004_asset_ProcurementDate" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_ProcurementDate" data-format="7" name="x_ProcurementDate" id="x_ProcurementDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_search->ProcurementDate->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->ProcurementDate->EditValue ?>"<?php echo $t004_asset_search->ProcurementDate->editAttributes() ?>>
<?php if (!$t004_asset_search->ProcurementDate->ReadOnly && !$t004_asset_search->ProcurementDate->Disabled && !isset($t004_asset_search->ProcurementDate->EditAttrs["readonly"]) && !isset($t004_asset_search->ProcurementDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetsearch", "x_ProcurementDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
	<div id="r_ProcurementCurrentCost" class="form-group row">
		<label for="x_ProcurementCurrentCost" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_ProcurementCurrentCost"><?php echo $t004_asset_search->ProcurementCurrentCost->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ProcurementCurrentCost" id="z_ProcurementCurrentCost" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->ProcurementCurrentCost->cellAttributes() ?>>
			<span id="el_t004_asset_ProcurementCurrentCost" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_ProcurementCurrentCost" name="x_ProcurementCurrentCost" id="x_ProcurementCurrentCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_search->ProcurementCurrentCost->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->ProcurementCurrentCost->EditValue ?>"<?php echo $t004_asset_search->ProcurementCurrentCost->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->PeriodBegin->Visible) { // PeriodBegin ?>
	<div id="r_PeriodBegin" class="form-group row">
		<label for="x_PeriodBegin" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_PeriodBegin"><?php echo $t004_asset_search->PeriodBegin->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PeriodBegin" id="z_PeriodBegin" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->PeriodBegin->cellAttributes() ?>>
			<span id="el_t004_asset_PeriodBegin" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_PeriodBegin" data-format="7" name="x_PeriodBegin" id="x_PeriodBegin" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_search->PeriodBegin->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->PeriodBegin->EditValue ?>"<?php echo $t004_asset_search->PeriodBegin->editAttributes() ?>>
<?php if (!$t004_asset_search->PeriodBegin->ReadOnly && !$t004_asset_search->PeriodBegin->Disabled && !isset($t004_asset_search->PeriodBegin->EditAttrs["readonly"]) && !isset($t004_asset_search->PeriodBegin->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetsearch", "x_PeriodBegin", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_search->PeriodEnd->Visible) { // PeriodEnd ?>
	<div id="r_PeriodEnd" class="form-group row">
		<label for="x_PeriodEnd" class="<?php echo $t004_asset_search->LeftColumnClass ?>"><span id="elh_t004_asset_PeriodEnd"><?php echo $t004_asset_search->PeriodEnd->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_PeriodEnd" id="z_PeriodEnd" value="=">
</span>
		</label>
		<div class="<?php echo $t004_asset_search->RightColumnClass ?>"><div <?php echo $t004_asset_search->PeriodEnd->cellAttributes() ?>>
			<span id="el_t004_asset_PeriodEnd" class="ew-search-field">
<input type="text" data-table="t004_asset" data-field="x_PeriodEnd" data-format="7" name="x_PeriodEnd" id="x_PeriodEnd" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_search->PeriodEnd->getPlaceHolder()) ?>" value="<?php echo $t004_asset_search->PeriodEnd->EditValue ?>"<?php echo $t004_asset_search->PeriodEnd->editAttributes() ?>>
<?php if (!$t004_asset_search->PeriodEnd->ReadOnly && !$t004_asset_search->PeriodEnd->Disabled && !isset($t004_asset_search->PeriodEnd->EditAttrs["readonly"]) && !isset($t004_asset_search->PeriodEnd->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetsearch", "x_PeriodEnd", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t004_asset_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t004_asset_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t004_asset_search->showPageFooter();
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
$t004_asset_search->terminate();
?>