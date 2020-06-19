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
$t004_asset_edit = new t004_asset_edit();

// Run the page
$t004_asset_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft004_assetedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft004_assetedit = currentForm = new ew.Form("ft004_assetedit", "edit");

	// Validate form
	ft004_assetedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($t004_asset_edit->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->property_id->caption(), $t004_asset_edit->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->department_id->Required) { ?>
				elm = this.getElements("x" + infix + "_department_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->department_id->caption(), $t004_asset_edit->department_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->signature_id->Required) { ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->signature_id->caption(), $t004_asset_edit->signature_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Code->caption(), $t004_asset_edit->Code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Description->caption(), $t004_asset_edit->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->group_id->Required) { ?>
				elm = this.getElements("x" + infix + "_group_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->group_id->caption(), $t004_asset_edit->group_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_edit->ProcurementDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcurementDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->ProcurementDate->caption(), $t004_asset_edit->ProcurementDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProcurementDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_edit->ProcurementDate->errorMessage()) ?>");
			<?php if ($t004_asset_edit->ProcurementCurrentCost->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcurementCurrentCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->ProcurementCurrentCost->caption(), $t004_asset_edit->ProcurementCurrentCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProcurementCurrentCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_edit->ProcurementCurrentCost->errorMessage()) ?>");
			<?php if ($t004_asset_edit->Salvage->Required) { ?>
				elm = this.getElements("x" + infix + "_Salvage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Salvage->caption(), $t004_asset_edit->Salvage->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Salvage");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_edit->Salvage->errorMessage()) ?>");
			<?php if ($t004_asset_edit->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Qty->caption(), $t004_asset_edit->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_edit->Qty->errorMessage()) ?>");
			<?php if ($t004_asset_edit->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_edit->Remarks->caption(), $t004_asset_edit->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft004_assetedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft004_assetedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft004_assetedit.lists["x_property_id"] = <?php echo $t004_asset_edit->property_id->Lookup->toClientList($t004_asset_edit) ?>;
	ft004_assetedit.lists["x_property_id"].options = <?php echo JsonEncode($t004_asset_edit->property_id->lookupOptions()) ?>;
	ft004_assetedit.lists["x_department_id"] = <?php echo $t004_asset_edit->department_id->Lookup->toClientList($t004_asset_edit) ?>;
	ft004_assetedit.lists["x_department_id"].options = <?php echo JsonEncode($t004_asset_edit->department_id->lookupOptions()) ?>;
	ft004_assetedit.lists["x_signature_id"] = <?php echo $t004_asset_edit->signature_id->Lookup->toClientList($t004_asset_edit) ?>;
	ft004_assetedit.lists["x_signature_id"].options = <?php echo JsonEncode($t004_asset_edit->signature_id->lookupOptions()) ?>;
	ft004_assetedit.lists["x_group_id"] = <?php echo $t004_asset_edit->group_id->Lookup->toClientList($t004_asset_edit) ?>;
	ft004_assetedit.lists["x_group_id"].options = <?php echo JsonEncode($t004_asset_edit->group_id->lookupOptions()) ?>;
	loadjs.done("ft004_assetedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t004_asset_edit->showPageHeader(); ?>
<?php
$t004_asset_edit->showMessage();
?>
<form name="ft004_assetedit" id="ft004_assetedit" class="<?php echo $t004_asset_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t004_asset_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t004_asset_edit->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label id="elh_t004_asset_property_id" for="x_property_id" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->property_id->caption() ?><?php echo $t004_asset_edit->property_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->property_id->cellAttributes() ?>>
<span id="el_t004_asset_property_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_property_id"><?php echo EmptyValue(strval($t004_asset_edit->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_edit->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_edit->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_edit->property_id->ReadOnly || $t004_asset_edit->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_property") && !$t004_asset_edit->property_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_property_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_edit->property_id->caption() ?>" data-title="<?php echo $t004_asset_edit->property_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_property_id',url:'t001_propertyaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_edit->property_id->Lookup->getParamTag($t004_asset_edit, "p_x_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_edit->property_id->displayValueSeparatorAttribute() ?>" name="x_property_id" id="x_property_id" value="<?php echo $t004_asset_edit->property_id->CurrentValue ?>"<?php echo $t004_asset_edit->property_id->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->property_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->department_id->Visible) { // department_id ?>
	<div id="r_department_id" class="form-group row">
		<label id="elh_t004_asset_department_id" for="x_department_id" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->department_id->caption() ?><?php echo $t004_asset_edit->department_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->department_id->cellAttributes() ?>>
<span id="el_t004_asset_department_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_department_id"><?php echo EmptyValue(strval($t004_asset_edit->department_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_edit->department_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_edit->department_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_edit->department_id->ReadOnly || $t004_asset_edit->department_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_department_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_department") && !$t004_asset_edit->department_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_department_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_edit->department_id->caption() ?>" data-title="<?php echo $t004_asset_edit->department_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_department_id',url:'t002_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_edit->department_id->Lookup->getParamTag($t004_asset_edit, "p_x_department_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_department_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_edit->department_id->displayValueSeparatorAttribute() ?>" name="x_department_id" id="x_department_id" value="<?php echo $t004_asset_edit->department_id->CurrentValue ?>"<?php echo $t004_asset_edit->department_id->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->department_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->signature_id->Visible) { // signature_id ?>
	<div id="r_signature_id" class="form-group row">
		<label id="elh_t004_asset_signature_id" for="x_signature_id" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->signature_id->caption() ?><?php echo $t004_asset_edit->signature_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->signature_id->cellAttributes() ?>>
<span id="el_t004_asset_signature_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_signature_id"><?php echo EmptyValue(strval($t004_asset_edit->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_edit->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_edit->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_edit->signature_id->ReadOnly || $t004_asset_edit->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t004_asset_edit->signature_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_signature_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_edit->signature_id->caption() ?>" data-title="<?php echo $t004_asset_edit->signature_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_signature_id',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_edit->signature_id->Lookup->getParamTag($t004_asset_edit, "p_x_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_edit->signature_id->displayValueSeparatorAttribute() ?>" name="x_signature_id" id="x_signature_id" value="<?php echo $t004_asset_edit->signature_id->CurrentValue ?>"<?php echo $t004_asset_edit->signature_id->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->signature_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label id="elh_t004_asset_Code" for="x_Code" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Code->caption() ?><?php echo $t004_asset_edit->Code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Code->cellAttributes() ?>>
<span id="el_t004_asset_Code">
<input type="text" data-table="t004_asset" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t004_asset_edit->Code->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->Code->EditValue ?>"<?php echo $t004_asset_edit->Code->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_t004_asset_Description" for="x_Description" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Description->caption() ?><?php echo $t004_asset_edit->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Description->cellAttributes() ?>>
<span id="el_t004_asset_Description">
<input type="text" data-table="t004_asset" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_edit->Description->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->Description->EditValue ?>"<?php echo $t004_asset_edit->Description->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->group_id->Visible) { // group_id ?>
	<div id="r_group_id" class="form-group row">
		<label id="elh_t004_asset_group_id" for="x_group_id" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->group_id->caption() ?><?php echo $t004_asset_edit->group_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->group_id->cellAttributes() ?>>
<span id="el_t004_asset_group_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_group_id"><?php echo EmptyValue(strval($t004_asset_edit->group_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_edit->group_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_edit->group_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_edit->group_id->ReadOnly || $t004_asset_edit->group_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_group_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_edit->group_id->Lookup->getParamTag($t004_asset_edit, "p_x_group_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_group_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_edit->group_id->displayValueSeparatorAttribute() ?>" name="x_group_id" id="x_group_id" value="<?php echo $t004_asset_edit->group_id->CurrentValue ?>"<?php echo $t004_asset_edit->group_id->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->group_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->ProcurementDate->Visible) { // ProcurementDate ?>
	<div id="r_ProcurementDate" class="form-group row">
		<label id="elh_t004_asset_ProcurementDate" for="x_ProcurementDate" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->ProcurementDate->caption() ?><?php echo $t004_asset_edit->ProcurementDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->ProcurementDate->cellAttributes() ?>>
<span id="el_t004_asset_ProcurementDate">
<input type="text" data-table="t004_asset" data-field="x_ProcurementDate" data-format="7" name="x_ProcurementDate" id="x_ProcurementDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_edit->ProcurementDate->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->ProcurementDate->EditValue ?>"<?php echo $t004_asset_edit->ProcurementDate->editAttributes() ?>>
<?php if (!$t004_asset_edit->ProcurementDate->ReadOnly && !$t004_asset_edit->ProcurementDate->Disabled && !isset($t004_asset_edit->ProcurementDate->EditAttrs["readonly"]) && !isset($t004_asset_edit->ProcurementDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetedit", "x_ProcurementDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t004_asset_edit->ProcurementDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
	<div id="r_ProcurementCurrentCost" class="form-group row">
		<label id="elh_t004_asset_ProcurementCurrentCost" for="x_ProcurementCurrentCost" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->ProcurementCurrentCost->caption() ?><?php echo $t004_asset_edit->ProcurementCurrentCost->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->ProcurementCurrentCost->cellAttributes() ?>>
<span id="el_t004_asset_ProcurementCurrentCost">
<input type="text" data-table="t004_asset" data-field="x_ProcurementCurrentCost" name="x_ProcurementCurrentCost" id="x_ProcurementCurrentCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_edit->ProcurementCurrentCost->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->ProcurementCurrentCost->EditValue ?>"<?php echo $t004_asset_edit->ProcurementCurrentCost->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->ProcurementCurrentCost->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Salvage->Visible) { // Salvage ?>
	<div id="r_Salvage" class="form-group row">
		<label id="elh_t004_asset_Salvage" for="x_Salvage" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Salvage->caption() ?><?php echo $t004_asset_edit->Salvage->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Salvage->cellAttributes() ?>>
<span id="el_t004_asset_Salvage">
<input type="text" data-table="t004_asset" data-field="x_Salvage" name="x_Salvage" id="x_Salvage" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_edit->Salvage->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->Salvage->EditValue ?>"<?php echo $t004_asset_edit->Salvage->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->Salvage->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Qty->Visible) { // Qty ?>
	<div id="r_Qty" class="form-group row">
		<label id="elh_t004_asset_Qty" for="x_Qty" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Qty->caption() ?><?php echo $t004_asset_edit->Qty->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Qty->cellAttributes() ?>>
<span id="el_t004_asset_Qty">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x_Qty" id="x_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_edit->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_edit->Qty->EditValue ?>"<?php echo $t004_asset_edit->Qty->editAttributes() ?>>
</span>
<?php echo $t004_asset_edit->Qty->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t004_asset_edit->Remarks->Visible) { // Remarks ?>
	<div id="r_Remarks" class="form-group row">
		<label id="elh_t004_asset_Remarks" for="x_Remarks" class="<?php echo $t004_asset_edit->LeftColumnClass ?>"><?php echo $t004_asset_edit->Remarks->caption() ?><?php echo $t004_asset_edit->Remarks->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t004_asset_edit->RightColumnClass ?>"><div <?php echo $t004_asset_edit->Remarks->cellAttributes() ?>>
<span id="el_t004_asset_Remarks">
<textarea data-table="t004_asset" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" cols="15" rows="1" placeholder="<?php echo HtmlEncode($t004_asset_edit->Remarks->getPlaceHolder()) ?>"<?php echo $t004_asset_edit->Remarks->editAttributes() ?>><?php echo $t004_asset_edit->Remarks->EditValue ?></textarea>
</span>
<?php echo $t004_asset_edit->Remarks->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t004_asset" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t004_asset_edit->id->CurrentValue) ?>">
<?php
	if (in_array("t006_assetdepreciation", explode(",", $t004_asset->getCurrentDetailTable())) && $t006_assetdepreciation->DetailEdit) {
?>
<?php if ($t004_asset->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t006_assetdepreciation", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t006_assetdepreciationgrid.php" ?>
<?php } ?>
<?php if (!$t004_asset_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t004_asset_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t004_asset_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t004_asset_edit->showPageFooter();
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
$t004_asset_edit->terminate();
?>