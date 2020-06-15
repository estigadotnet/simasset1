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
$t101_ho_head_search = new t101_ho_head_search();

// Run the page
$t101_ho_head_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_ho_headsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t101_ho_head_search->IsModal) { ?>
	ft101_ho_headsearch = currentAdvancedSearchForm = new ew.Form("ft101_ho_headsearch", "search");
	<?php } else { ?>
	ft101_ho_headsearch = currentForm = new ew.Form("ft101_ho_headsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft101_ho_headsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_TransactionDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t101_ho_head_search->TransactionDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft101_ho_headsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_ho_headsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_ho_headsearch.lists["x_property_id"] = <?php echo $t101_ho_head_search->property_id->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_property_id"].options = <?php echo JsonEncode($t101_ho_head_search->property_id->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_TransactionType"] = <?php echo $t101_ho_head_search->TransactionType->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_TransactionType"].options = <?php echo JsonEncode($t101_ho_head_search->TransactionType->options(FALSE, TRUE)) ?>;
	ft101_ho_headsearch.lists["x_HandedOverTo"] = <?php echo $t101_ho_head_search->HandedOverTo->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_HandedOverTo"].options = <?php echo JsonEncode($t101_ho_head_search->HandedOverTo->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_DepartmentTo"] = <?php echo $t101_ho_head_search->DepartmentTo->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_DepartmentTo"].options = <?php echo JsonEncode($t101_ho_head_search->DepartmentTo->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_HandedOverBy"] = <?php echo $t101_ho_head_search->HandedOverBy->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_HandedOverBy"].options = <?php echo JsonEncode($t101_ho_head_search->HandedOverBy->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_DepartmentBy"] = <?php echo $t101_ho_head_search->DepartmentBy->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_DepartmentBy"].options = <?php echo JsonEncode($t101_ho_head_search->DepartmentBy->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_Sign1"] = <?php echo $t101_ho_head_search->Sign1->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_Sign1"].options = <?php echo JsonEncode($t101_ho_head_search->Sign1->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_Sign2"] = <?php echo $t101_ho_head_search->Sign2->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_Sign2"].options = <?php echo JsonEncode($t101_ho_head_search->Sign2->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_Sign3"] = <?php echo $t101_ho_head_search->Sign3->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_Sign3"].options = <?php echo JsonEncode($t101_ho_head_search->Sign3->lookupOptions()) ?>;
	ft101_ho_headsearch.lists["x_Sign4"] = <?php echo $t101_ho_head_search->Sign4->Lookup->toClientList($t101_ho_head_search) ?>;
	ft101_ho_headsearch.lists["x_Sign4"].options = <?php echo JsonEncode($t101_ho_head_search->Sign4->lookupOptions()) ?>;
	loadjs.done("ft101_ho_headsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_ho_head_search->showPageHeader(); ?>
<?php
$t101_ho_head_search->showMessage();
?>
<form name="ft101_ho_headsearch" id="ft101_ho_headsearch" class="<?php echo $t101_ho_head_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t101_ho_head_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t101_ho_head_search->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label for="x_property_id" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_property_id"><?php echo $t101_ho_head_search->property_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_property_id" id="z_property_id" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->property_id->cellAttributes() ?>>
			<span id="el_t101_ho_head_property_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_property_id"><?php echo EmptyValue(strval($t101_ho_head_search->property_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->property_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->property_id->ReadOnly || $t101_ho_head_search->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->property_id->Lookup->getParamTag($t101_ho_head_search, "p_x_property_id") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->property_id->displayValueSeparatorAttribute() ?>" name="x_property_id" id="x_property_id" value="<?php echo $t101_ho_head_search->property_id->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->property_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->TransactionNo->Visible) { // TransactionNo ?>
	<div id="r_TransactionNo" class="form-group row">
		<label for="x_TransactionNo" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_TransactionNo"><?php echo $t101_ho_head_search->TransactionNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TransactionNo" id="z_TransactionNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->TransactionNo->cellAttributes() ?>>
			<span id="el_t101_ho_head_TransactionNo" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_TransactionNo" name="x_TransactionNo" id="x_TransactionNo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_search->TransactionNo->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->TransactionNo->EditValue ?>"<?php echo $t101_ho_head_search->TransactionNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->TransactionDate->Visible) { // TransactionDate ?>
	<div id="r_TransactionDate" class="form-group row">
		<label for="x_TransactionDate" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_TransactionDate"><?php echo $t101_ho_head_search->TransactionDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TransactionDate" id="z_TransactionDate" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->TransactionDate->cellAttributes() ?>>
			<span id="el_t101_ho_head_TransactionDate" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_TransactionDate" data-format="7" name="x_TransactionDate" id="x_TransactionDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_search->TransactionDate->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->TransactionDate->EditValue ?>"<?php echo $t101_ho_head_search->TransactionDate->editAttributes() ?>>
<?php if (!$t101_ho_head_search->TransactionDate->ReadOnly && !$t101_ho_head_search->TransactionDate->Disabled && !isset($t101_ho_head_search->TransactionDate->EditAttrs["readonly"]) && !isset($t101_ho_head_search->TransactionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headsearch", "x_TransactionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->TransactionType->Visible) { // TransactionType ?>
	<div id="r_TransactionType" class="form-group row">
		<label for="x_TransactionType" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_TransactionType"><?php echo $t101_ho_head_search->TransactionType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TransactionType" id="z_TransactionType" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->TransactionType->cellAttributes() ?>>
			<span id="el_t101_ho_head_TransactionType" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_ho_head" data-field="x_TransactionType" data-value-separator="<?php echo $t101_ho_head_search->TransactionType->displayValueSeparatorAttribute() ?>" id="x_TransactionType" name="x_TransactionType"<?php echo $t101_ho_head_search->TransactionType->editAttributes() ?>>
			<?php echo $t101_ho_head_search->TransactionType->selectOptionListHtml("x_TransactionType") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->HandedOverTo->Visible) { // HandedOverTo ?>
	<div id="r_HandedOverTo" class="form-group row">
		<label for="x_HandedOverTo" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_HandedOverTo"><?php echo $t101_ho_head_search->HandedOverTo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HandedOverTo" id="z_HandedOverTo" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->HandedOverTo->cellAttributes() ?>>
			<span id="el_t101_ho_head_HandedOverTo" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HandedOverTo"><?php echo EmptyValue(strval($t101_ho_head_search->HandedOverTo->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->HandedOverTo->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->HandedOverTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->HandedOverTo->ReadOnly || $t101_ho_head_search->HandedOverTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HandedOverTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->HandedOverTo->Lookup->getParamTag($t101_ho_head_search, "p_x_HandedOverTo") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_HandedOverTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->HandedOverTo->displayValueSeparatorAttribute() ?>" name="x_HandedOverTo" id="x_HandedOverTo" value="<?php echo $t101_ho_head_search->HandedOverTo->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->HandedOverTo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->CodeNoTo->Visible) { // CodeNoTo ?>
	<div id="r_CodeNoTo" class="form-group row">
		<label for="x_CodeNoTo" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_CodeNoTo"><?php echo $t101_ho_head_search->CodeNoTo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CodeNoTo" id="z_CodeNoTo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->CodeNoTo->cellAttributes() ?>>
			<span id="el_t101_ho_head_CodeNoTo" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_CodeNoTo" name="x_CodeNoTo" id="x_CodeNoTo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_search->CodeNoTo->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->CodeNoTo->EditValue ?>"<?php echo $t101_ho_head_search->CodeNoTo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->DepartmentTo->Visible) { // DepartmentTo ?>
	<div id="r_DepartmentTo" class="form-group row">
		<label for="x_DepartmentTo" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_DepartmentTo"><?php echo $t101_ho_head_search->DepartmentTo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DepartmentTo" id="z_DepartmentTo" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->DepartmentTo->cellAttributes() ?>>
			<span id="el_t101_ho_head_DepartmentTo" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DepartmentTo"><?php echo EmptyValue(strval($t101_ho_head_search->DepartmentTo->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->DepartmentTo->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->DepartmentTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->DepartmentTo->ReadOnly || $t101_ho_head_search->DepartmentTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DepartmentTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->DepartmentTo->Lookup->getParamTag($t101_ho_head_search, "p_x_DepartmentTo") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_DepartmentTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->DepartmentTo->displayValueSeparatorAttribute() ?>" name="x_DepartmentTo" id="x_DepartmentTo" value="<?php echo $t101_ho_head_search->DepartmentTo->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->DepartmentTo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->HandedOverBy->Visible) { // HandedOverBy ?>
	<div id="r_HandedOverBy" class="form-group row">
		<label for="x_HandedOverBy" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_HandedOverBy"><?php echo $t101_ho_head_search->HandedOverBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HandedOverBy" id="z_HandedOverBy" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->HandedOverBy->cellAttributes() ?>>
			<span id="el_t101_ho_head_HandedOverBy" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HandedOverBy"><?php echo EmptyValue(strval($t101_ho_head_search->HandedOverBy->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->HandedOverBy->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->HandedOverBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->HandedOverBy->ReadOnly || $t101_ho_head_search->HandedOverBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HandedOverBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->HandedOverBy->Lookup->getParamTag($t101_ho_head_search, "p_x_HandedOverBy") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_HandedOverBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->HandedOverBy->displayValueSeparatorAttribute() ?>" name="x_HandedOverBy" id="x_HandedOverBy" value="<?php echo $t101_ho_head_search->HandedOverBy->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->HandedOverBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->CodeNoBy->Visible) { // CodeNoBy ?>
	<div id="r_CodeNoBy" class="form-group row">
		<label for="x_CodeNoBy" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_CodeNoBy"><?php echo $t101_ho_head_search->CodeNoBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CodeNoBy" id="z_CodeNoBy" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->CodeNoBy->cellAttributes() ?>>
			<span id="el_t101_ho_head_CodeNoBy" class="ew-search-field">
<input type="text" data-table="t101_ho_head" data-field="x_CodeNoBy" name="x_CodeNoBy" id="x_CodeNoBy" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_search->CodeNoBy->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_search->CodeNoBy->EditValue ?>"<?php echo $t101_ho_head_search->CodeNoBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->DepartmentBy->Visible) { // DepartmentBy ?>
	<div id="r_DepartmentBy" class="form-group row">
		<label for="x_DepartmentBy" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_DepartmentBy"><?php echo $t101_ho_head_search->DepartmentBy->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DepartmentBy" id="z_DepartmentBy" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->DepartmentBy->cellAttributes() ?>>
			<span id="el_t101_ho_head_DepartmentBy" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DepartmentBy"><?php echo EmptyValue(strval($t101_ho_head_search->DepartmentBy->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->DepartmentBy->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->DepartmentBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->DepartmentBy->ReadOnly || $t101_ho_head_search->DepartmentBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DepartmentBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->DepartmentBy->Lookup->getParamTag($t101_ho_head_search, "p_x_DepartmentBy") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_DepartmentBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->DepartmentBy->displayValueSeparatorAttribute() ?>" name="x_DepartmentBy" id="x_DepartmentBy" value="<?php echo $t101_ho_head_search->DepartmentBy->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->DepartmentBy->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->Sign1->Visible) { // Sign1 ?>
	<div id="r_Sign1" class="form-group row">
		<label for="x_Sign1" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_Sign1"><?php echo $t101_ho_head_search->Sign1->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign1" id="z_Sign1" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->Sign1->cellAttributes() ?>>
			<span id="el_t101_ho_head_Sign1" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign1"><?php echo EmptyValue(strval($t101_ho_head_search->Sign1->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->Sign1->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->Sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->Sign1->ReadOnly || $t101_ho_head_search->Sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->Sign1->Lookup->getParamTag($t101_ho_head_search, "p_x_Sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->Sign1->displayValueSeparatorAttribute() ?>" name="x_Sign1" id="x_Sign1" value="<?php echo $t101_ho_head_search->Sign1->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->Sign1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->Sign2->Visible) { // Sign2 ?>
	<div id="r_Sign2" class="form-group row">
		<label for="x_Sign2" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_Sign2"><?php echo $t101_ho_head_search->Sign2->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign2" id="z_Sign2" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->Sign2->cellAttributes() ?>>
			<span id="el_t101_ho_head_Sign2" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign2"><?php echo EmptyValue(strval($t101_ho_head_search->Sign2->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->Sign2->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->Sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->Sign2->ReadOnly || $t101_ho_head_search->Sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->Sign2->Lookup->getParamTag($t101_ho_head_search, "p_x_Sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->Sign2->displayValueSeparatorAttribute() ?>" name="x_Sign2" id="x_Sign2" value="<?php echo $t101_ho_head_search->Sign2->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->Sign2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->Sign3->Visible) { // Sign3 ?>
	<div id="r_Sign3" class="form-group row">
		<label for="x_Sign3" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_Sign3"><?php echo $t101_ho_head_search->Sign3->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign3" id="z_Sign3" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->Sign3->cellAttributes() ?>>
			<span id="el_t101_ho_head_Sign3" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign3"><?php echo EmptyValue(strval($t101_ho_head_search->Sign3->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->Sign3->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->Sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->Sign3->ReadOnly || $t101_ho_head_search->Sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->Sign3->Lookup->getParamTag($t101_ho_head_search, "p_x_Sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->Sign3->displayValueSeparatorAttribute() ?>" name="x_Sign3" id="x_Sign3" value="<?php echo $t101_ho_head_search->Sign3->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->Sign3->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_search->Sign4->Visible) { // Sign4 ?>
	<div id="r_Sign4" class="form-group row">
		<label for="x_Sign4" class="<?php echo $t101_ho_head_search->LeftColumnClass ?>"><span id="elh_t101_ho_head_Sign4"><?php echo $t101_ho_head_search->Sign4->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign4" id="z_Sign4" value="=">
</span>
		</label>
		<div class="<?php echo $t101_ho_head_search->RightColumnClass ?>"><div <?php echo $t101_ho_head_search->Sign4->cellAttributes() ?>>
			<span id="el_t101_ho_head_Sign4" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign4"><?php echo EmptyValue(strval($t101_ho_head_search->Sign4->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_search->Sign4->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_search->Sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_search->Sign4->ReadOnly || $t101_ho_head_search->Sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_search->Sign4->Lookup->getParamTag($t101_ho_head_search, "p_x_Sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_search->Sign4->displayValueSeparatorAttribute() ?>" name="x_Sign4" id="x_Sign4" value="<?php echo $t101_ho_head_search->Sign4->AdvancedSearch->SearchValue ?>"<?php echo $t101_ho_head_search->Sign4->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t101_ho_head_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_ho_head_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_ho_head_search->showPageFooter();
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
$t101_ho_head_search->terminate();
?>