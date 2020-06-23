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
$t103_ho1_head_search = new t103_ho1_head_search();

// Run the page
$t103_ho1_head_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t103_ho1_head_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft103_ho1_headsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t103_ho1_head_search->IsModal) { ?>
	ft103_ho1_headsearch = currentAdvancedSearchForm = new ew.Form("ft103_ho1_headsearch", "search");
	<?php } else { ?>
	ft103_ho1_headsearch = currentForm = new ew.Form("ft103_ho1_headsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft103_ho1_headsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t103_ho1_head_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_TransactionDate");
		if (elm && !ew.checkDateDef(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t103_ho1_head_search->TransactionDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft103_ho1_headsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft103_ho1_headsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft103_ho1_headsearch.lists["x_ho_head"] = <?php echo $t103_ho1_head_search->ho_head->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_ho_head"].options = <?php echo JsonEncode($t103_ho1_head_search->ho_head->lookupOptions()) ?>;
	ft103_ho1_headsearch.lists["x_TransactionType"] = <?php echo $t103_ho1_head_search->TransactionType->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_TransactionType"].options = <?php echo JsonEncode($t103_ho1_head_search->TransactionType->options(FALSE, TRUE)) ?>;
	ft103_ho1_headsearch.lists["x_HandedOverTo"] = <?php echo $t103_ho1_head_search->HandedOverTo->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_HandedOverTo"].options = <?php echo JsonEncode($t103_ho1_head_search->HandedOverTo->lookupOptions()) ?>;
	ft103_ho1_headsearch.lists["x_DepartmentTo"] = <?php echo $t103_ho1_head_search->DepartmentTo->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_DepartmentTo"].options = <?php echo JsonEncode($t103_ho1_head_search->DepartmentTo->lookupOptions()) ?>;
	ft103_ho1_headsearch.lists["x_Sign1"] = <?php echo $t103_ho1_head_search->Sign1->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_Sign1"].options = <?php echo JsonEncode($t103_ho1_head_search->Sign1->lookupOptions()) ?>;
	ft103_ho1_headsearch.lists["x_Sign2"] = <?php echo $t103_ho1_head_search->Sign2->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_Sign2"].options = <?php echo JsonEncode($t103_ho1_head_search->Sign2->lookupOptions()) ?>;
	ft103_ho1_headsearch.lists["x_Sign3"] = <?php echo $t103_ho1_head_search->Sign3->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_Sign3"].options = <?php echo JsonEncode($t103_ho1_head_search->Sign3->lookupOptions()) ?>;
	ft103_ho1_headsearch.lists["x_Sign4"] = <?php echo $t103_ho1_head_search->Sign4->Lookup->toClientList($t103_ho1_head_search) ?>;
	ft103_ho1_headsearch.lists["x_Sign4"].options = <?php echo JsonEncode($t103_ho1_head_search->Sign4->lookupOptions()) ?>;
	loadjs.done("ft103_ho1_headsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t103_ho1_head_search->showPageHeader(); ?>
<?php
$t103_ho1_head_search->showMessage();
?>
<form name="ft103_ho1_headsearch" id="ft103_ho1_headsearch" class="<?php echo $t103_ho1_head_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t103_ho1_head">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t103_ho1_head_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t103_ho1_head_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_id"><?php echo $t103_ho1_head_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->id->cellAttributes() ?>>
			<span id="el_t103_ho1_head_id" class="ew-search-field">
<input type="text" data-table="t103_ho1_head" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t103_ho1_head_search->id->getPlaceHolder()) ?>" value="<?php echo $t103_ho1_head_search->id->EditValue ?>"<?php echo $t103_ho1_head_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->ho_head->Visible) { // ho_head ?>
	<div id="r_ho_head" class="form-group row">
		<label for="x_ho_head" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_ho_head"><?php echo $t103_ho1_head_search->ho_head->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ho_head" id="z_ho_head" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->ho_head->cellAttributes() ?>>
			<span id="el_t103_ho1_head_ho_head" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ho_head"><?php echo EmptyValue(strval($t103_ho1_head_search->ho_head->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_search->ho_head->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_search->ho_head->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_search->ho_head->ReadOnly || $t103_ho1_head_search->ho_head->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ho_head',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_search->ho_head->Lookup->getParamTag($t103_ho1_head_search, "p_x_ho_head") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_ho_head" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_search->ho_head->displayValueSeparatorAttribute() ?>" name="x_ho_head" id="x_ho_head" value="<?php echo $t103_ho1_head_search->ho_head->AdvancedSearch->SearchValue ?>"<?php echo $t103_ho1_head_search->ho_head->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->TransactionNo->Visible) { // TransactionNo ?>
	<div id="r_TransactionNo" class="form-group row">
		<label for="x_TransactionNo" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_TransactionNo"><?php echo $t103_ho1_head_search->TransactionNo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_TransactionNo" id="z_TransactionNo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->TransactionNo->cellAttributes() ?>>
			<span id="el_t103_ho1_head_TransactionNo" class="ew-search-field">
<input type="text" data-table="t103_ho1_head" data-field="x_TransactionNo" name="x_TransactionNo" id="x_TransactionNo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t103_ho1_head_search->TransactionNo->getPlaceHolder()) ?>" value="<?php echo $t103_ho1_head_search->TransactionNo->EditValue ?>"<?php echo $t103_ho1_head_search->TransactionNo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->TransactionDate->Visible) { // TransactionDate ?>
	<div id="r_TransactionDate" class="form-group row">
		<label for="x_TransactionDate" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_TransactionDate"><?php echo $t103_ho1_head_search->TransactionDate->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TransactionDate" id="z_TransactionDate" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->TransactionDate->cellAttributes() ?>>
			<span id="el_t103_ho1_head_TransactionDate" class="ew-search-field">
<input type="text" data-table="t103_ho1_head" data-field="x_TransactionDate" name="x_TransactionDate" id="x_TransactionDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t103_ho1_head_search->TransactionDate->getPlaceHolder()) ?>" value="<?php echo $t103_ho1_head_search->TransactionDate->EditValue ?>"<?php echo $t103_ho1_head_search->TransactionDate->editAttributes() ?>>
<?php if (!$t103_ho1_head_search->TransactionDate->ReadOnly && !$t103_ho1_head_search->TransactionDate->Disabled && !isset($t103_ho1_head_search->TransactionDate->EditAttrs["readonly"]) && !isset($t103_ho1_head_search->TransactionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft103_ho1_headsearch", "datetimepicker"], function() {
	ew.createDateTimePicker("ft103_ho1_headsearch", "x_TransactionDate", {"ignoreReadonly":true,"useCurrent":false,"format":0});
});
</script>
<?php } ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->TransactionType->Visible) { // TransactionType ?>
	<div id="r_TransactionType" class="form-group row">
		<label for="x_TransactionType" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_TransactionType"><?php echo $t103_ho1_head_search->TransactionType->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_TransactionType" id="z_TransactionType" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->TransactionType->cellAttributes() ?>>
			<span id="el_t103_ho1_head_TransactionType" class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t103_ho1_head" data-field="x_TransactionType" data-value-separator="<?php echo $t103_ho1_head_search->TransactionType->displayValueSeparatorAttribute() ?>" id="x_TransactionType" name="x_TransactionType"<?php echo $t103_ho1_head_search->TransactionType->editAttributes() ?>>
			<?php echo $t103_ho1_head_search->TransactionType->selectOptionListHtml("x_TransactionType") ?>
		</select>
</div>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->HandedOverTo->Visible) { // HandedOverTo ?>
	<div id="r_HandedOverTo" class="form-group row">
		<label for="x_HandedOverTo" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_HandedOverTo"><?php echo $t103_ho1_head_search->HandedOverTo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_HandedOverTo" id="z_HandedOverTo" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->HandedOverTo->cellAttributes() ?>>
			<span id="el_t103_ho1_head_HandedOverTo" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HandedOverTo"><?php echo EmptyValue(strval($t103_ho1_head_search->HandedOverTo->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_search->HandedOverTo->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_search->HandedOverTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_search->HandedOverTo->ReadOnly || $t103_ho1_head_search->HandedOverTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HandedOverTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_search->HandedOverTo->Lookup->getParamTag($t103_ho1_head_search, "p_x_HandedOverTo") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_HandedOverTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_search->HandedOverTo->displayValueSeparatorAttribute() ?>" name="x_HandedOverTo" id="x_HandedOverTo" value="<?php echo $t103_ho1_head_search->HandedOverTo->AdvancedSearch->SearchValue ?>"<?php echo $t103_ho1_head_search->HandedOverTo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->CodeNoTo->Visible) { // CodeNoTo ?>
	<div id="r_CodeNoTo" class="form-group row">
		<label for="x_CodeNoTo" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_CodeNoTo"><?php echo $t103_ho1_head_search->CodeNoTo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_CodeNoTo" id="z_CodeNoTo" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->CodeNoTo->cellAttributes() ?>>
			<span id="el_t103_ho1_head_CodeNoTo" class="ew-search-field">
<input type="text" data-table="t103_ho1_head" data-field="x_CodeNoTo" name="x_CodeNoTo" id="x_CodeNoTo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t103_ho1_head_search->CodeNoTo->getPlaceHolder()) ?>" value="<?php echo $t103_ho1_head_search->CodeNoTo->EditValue ?>"<?php echo $t103_ho1_head_search->CodeNoTo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->DepartmentTo->Visible) { // DepartmentTo ?>
	<div id="r_DepartmentTo" class="form-group row">
		<label for="x_DepartmentTo" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_DepartmentTo"><?php echo $t103_ho1_head_search->DepartmentTo->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_DepartmentTo" id="z_DepartmentTo" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->DepartmentTo->cellAttributes() ?>>
			<span id="el_t103_ho1_head_DepartmentTo" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DepartmentTo"><?php echo EmptyValue(strval($t103_ho1_head_search->DepartmentTo->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_search->DepartmentTo->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_search->DepartmentTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_search->DepartmentTo->ReadOnly || $t103_ho1_head_search->DepartmentTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DepartmentTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_search->DepartmentTo->Lookup->getParamTag($t103_ho1_head_search, "p_x_DepartmentTo") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_DepartmentTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_search->DepartmentTo->displayValueSeparatorAttribute() ?>" name="x_DepartmentTo" id="x_DepartmentTo" value="<?php echo $t103_ho1_head_search->DepartmentTo->AdvancedSearch->SearchValue ?>"<?php echo $t103_ho1_head_search->DepartmentTo->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->Sign1->Visible) { // Sign1 ?>
	<div id="r_Sign1" class="form-group row">
		<label for="x_Sign1" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_Sign1"><?php echo $t103_ho1_head_search->Sign1->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign1" id="z_Sign1" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->Sign1->cellAttributes() ?>>
			<span id="el_t103_ho1_head_Sign1" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign1"><?php echo EmptyValue(strval($t103_ho1_head_search->Sign1->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_search->Sign1->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_search->Sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_search->Sign1->ReadOnly || $t103_ho1_head_search->Sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_search->Sign1->Lookup->getParamTag($t103_ho1_head_search, "p_x_Sign1") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_search->Sign1->displayValueSeparatorAttribute() ?>" name="x_Sign1" id="x_Sign1" value="<?php echo $t103_ho1_head_search->Sign1->AdvancedSearch->SearchValue ?>"<?php echo $t103_ho1_head_search->Sign1->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->Sign2->Visible) { // Sign2 ?>
	<div id="r_Sign2" class="form-group row">
		<label for="x_Sign2" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_Sign2"><?php echo $t103_ho1_head_search->Sign2->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign2" id="z_Sign2" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->Sign2->cellAttributes() ?>>
			<span id="el_t103_ho1_head_Sign2" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign2"><?php echo EmptyValue(strval($t103_ho1_head_search->Sign2->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_search->Sign2->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_search->Sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_search->Sign2->ReadOnly || $t103_ho1_head_search->Sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_search->Sign2->Lookup->getParamTag($t103_ho1_head_search, "p_x_Sign2") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_search->Sign2->displayValueSeparatorAttribute() ?>" name="x_Sign2" id="x_Sign2" value="<?php echo $t103_ho1_head_search->Sign2->AdvancedSearch->SearchValue ?>"<?php echo $t103_ho1_head_search->Sign2->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->Sign3->Visible) { // Sign3 ?>
	<div id="r_Sign3" class="form-group row">
		<label for="x_Sign3" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_Sign3"><?php echo $t103_ho1_head_search->Sign3->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign3" id="z_Sign3" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->Sign3->cellAttributes() ?>>
			<span id="el_t103_ho1_head_Sign3" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign3"><?php echo EmptyValue(strval($t103_ho1_head_search->Sign3->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_search->Sign3->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_search->Sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_search->Sign3->ReadOnly || $t103_ho1_head_search->Sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_search->Sign3->Lookup->getParamTag($t103_ho1_head_search, "p_x_Sign3") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_search->Sign3->displayValueSeparatorAttribute() ?>" name="x_Sign3" id="x_Sign3" value="<?php echo $t103_ho1_head_search->Sign3->AdvancedSearch->SearchValue ?>"<?php echo $t103_ho1_head_search->Sign3->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_search->Sign4->Visible) { // Sign4 ?>
	<div id="r_Sign4" class="form-group row">
		<label for="x_Sign4" class="<?php echo $t103_ho1_head_search->LeftColumnClass ?>"><span id="elh_t103_ho1_head_Sign4"><?php echo $t103_ho1_head_search->Sign4->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_Sign4" id="z_Sign4" value="=">
</span>
		</label>
		<div class="<?php echo $t103_ho1_head_search->RightColumnClass ?>"><div <?php echo $t103_ho1_head_search->Sign4->cellAttributes() ?>>
			<span id="el_t103_ho1_head_Sign4" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign4"><?php echo EmptyValue(strval($t103_ho1_head_search->Sign4->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_search->Sign4->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_search->Sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_search->Sign4->ReadOnly || $t103_ho1_head_search->Sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_search->Sign4->Lookup->getParamTag($t103_ho1_head_search, "p_x_Sign4") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_search->Sign4->displayValueSeparatorAttribute() ?>" name="x_Sign4" id="x_Sign4" value="<?php echo $t103_ho1_head_search->Sign4->AdvancedSearch->SearchValue ?>"<?php echo $t103_ho1_head_search->Sign4->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t103_ho1_head_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t103_ho1_head_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t103_ho1_head_search->showPageFooter();
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
$t103_ho1_head_search->terminate();
?>