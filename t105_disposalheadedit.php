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
$t105_disposalhead_edit = new t105_disposalhead_edit();

// Run the page
$t105_disposalhead_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t105_disposalhead_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft105_disposalheadedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft105_disposalheadedit = currentForm = new ew.Form("ft105_disposalheadedit", "edit");

	// Validate form
	ft105_disposalheadedit.validate = function() {
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
			<?php if ($t105_disposalhead_edit->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->property_id->caption(), $t105_disposalhead_edit->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_edit->TransactionNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->TransactionNo->caption(), $t105_disposalhead_edit->TransactionNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_edit->TransactionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->TransactionDate->caption(), $t105_disposalhead_edit->TransactionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t105_disposalhead_edit->TransactionDate->errorMessage()) ?>");
			<?php if ($t105_disposalhead_edit->RecommendedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RecommendedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->RecommendedBy->caption(), $t105_disposalhead_edit->RecommendedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_edit->CE->Required) { ?>
				elm = this.getElements("x" + infix + "_CE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->CE->caption(), $t105_disposalhead_edit->CE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_edit->ITM->Required) { ?>
				elm = this.getElements("x" + infix + "_ITM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->ITM->caption(), $t105_disposalhead_edit->ITM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_edit->Sign1->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->Sign1->caption(), $t105_disposalhead_edit->Sign1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_edit->Sign2->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->Sign2->caption(), $t105_disposalhead_edit->Sign2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_edit->Sign3->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_edit->Sign3->caption(), $t105_disposalhead_edit->Sign3->RequiredErrorMessage)) ?>");
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
	ft105_disposalheadedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft105_disposalheadedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft105_disposalheadedit.lists["x_property_id"] = <?php echo $t105_disposalhead_edit->property_id->Lookup->toClientList($t105_disposalhead_edit) ?>;
	ft105_disposalheadedit.lists["x_property_id"].options = <?php echo JsonEncode($t105_disposalhead_edit->property_id->lookupOptions()) ?>;
	ft105_disposalheadedit.lists["x_RecommendedBy"] = <?php echo $t105_disposalhead_edit->RecommendedBy->Lookup->toClientList($t105_disposalhead_edit) ?>;
	ft105_disposalheadedit.lists["x_RecommendedBy"].options = <?php echo JsonEncode($t105_disposalhead_edit->RecommendedBy->lookupOptions()) ?>;
	ft105_disposalheadedit.lists["x_CE"] = <?php echo $t105_disposalhead_edit->CE->Lookup->toClientList($t105_disposalhead_edit) ?>;
	ft105_disposalheadedit.lists["x_CE"].options = <?php echo JsonEncode($t105_disposalhead_edit->CE->lookupOptions()) ?>;
	ft105_disposalheadedit.lists["x_ITM"] = <?php echo $t105_disposalhead_edit->ITM->Lookup->toClientList($t105_disposalhead_edit) ?>;
	ft105_disposalheadedit.lists["x_ITM"].options = <?php echo JsonEncode($t105_disposalhead_edit->ITM->lookupOptions()) ?>;
	ft105_disposalheadedit.lists["x_Sign1"] = <?php echo $t105_disposalhead_edit->Sign1->Lookup->toClientList($t105_disposalhead_edit) ?>;
	ft105_disposalheadedit.lists["x_Sign1"].options = <?php echo JsonEncode($t105_disposalhead_edit->Sign1->lookupOptions()) ?>;
	ft105_disposalheadedit.lists["x_Sign2"] = <?php echo $t105_disposalhead_edit->Sign2->Lookup->toClientList($t105_disposalhead_edit) ?>;
	ft105_disposalheadedit.lists["x_Sign2"].options = <?php echo JsonEncode($t105_disposalhead_edit->Sign2->lookupOptions()) ?>;
	ft105_disposalheadedit.lists["x_Sign3"] = <?php echo $t105_disposalhead_edit->Sign3->Lookup->toClientList($t105_disposalhead_edit) ?>;
	ft105_disposalheadedit.lists["x_Sign3"].options = <?php echo JsonEncode($t105_disposalhead_edit->Sign3->lookupOptions()) ?>;
	loadjs.done("ft105_disposalheadedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t105_disposalhead_edit->showPageHeader(); ?>
<?php
$t105_disposalhead_edit->showMessage();
?>
<form name="ft105_disposalheadedit" id="ft105_disposalheadedit" class="<?php echo $t105_disposalhead_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t105_disposalhead">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t105_disposalhead_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t105_disposalhead_edit->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label id="elh_t105_disposalhead_property_id" for="x_property_id" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->property_id->caption() ?><?php echo $t105_disposalhead_edit->property_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->property_id->cellAttributes() ?>>
<span id="el_t105_disposalhead_property_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_property_id"><?php echo EmptyValue(strval($t105_disposalhead_edit->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_edit->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_edit->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_edit->property_id->ReadOnly || $t105_disposalhead_edit->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_edit->property_id->Lookup->getParamTag($t105_disposalhead_edit, "p_x_property_id") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_edit->property_id->displayValueSeparatorAttribute() ?>" name="x_property_id" id="x_property_id" value="<?php echo $t105_disposalhead_edit->property_id->CurrentValue ?>"<?php echo $t105_disposalhead_edit->property_id->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->property_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->TransactionNo->Visible) { // TransactionNo ?>
	<div id="r_TransactionNo" class="form-group row">
		<label id="elh_t105_disposalhead_TransactionNo" for="x_TransactionNo" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->TransactionNo->caption() ?><?php echo $t105_disposalhead_edit->TransactionNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->TransactionNo->cellAttributes() ?>>
<span id="el_t105_disposalhead_TransactionNo">
<input type="text" data-table="t105_disposalhead" data-field="x_TransactionNo" name="x_TransactionNo" id="x_TransactionNo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t105_disposalhead_edit->TransactionNo->getPlaceHolder()) ?>" value="<?php echo $t105_disposalhead_edit->TransactionNo->EditValue ?>"<?php echo $t105_disposalhead_edit->TransactionNo->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->TransactionNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->TransactionDate->Visible) { // TransactionDate ?>
	<div id="r_TransactionDate" class="form-group row">
		<label id="elh_t105_disposalhead_TransactionDate" for="x_TransactionDate" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->TransactionDate->caption() ?><?php echo $t105_disposalhead_edit->TransactionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->TransactionDate->cellAttributes() ?>>
<span id="el_t105_disposalhead_TransactionDate">
<input type="text" data-table="t105_disposalhead" data-field="x_TransactionDate" data-format="7" name="x_TransactionDate" id="x_TransactionDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t105_disposalhead_edit->TransactionDate->getPlaceHolder()) ?>" value="<?php echo $t105_disposalhead_edit->TransactionDate->EditValue ?>"<?php echo $t105_disposalhead_edit->TransactionDate->editAttributes() ?>>
<?php if (!$t105_disposalhead_edit->TransactionDate->ReadOnly && !$t105_disposalhead_edit->TransactionDate->Disabled && !isset($t105_disposalhead_edit->TransactionDate->EditAttrs["readonly"]) && !isset($t105_disposalhead_edit->TransactionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft105_disposalheadedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft105_disposalheadedit", "x_TransactionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t105_disposalhead_edit->TransactionDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->RecommendedBy->Visible) { // RecommendedBy ?>
	<div id="r_RecommendedBy" class="form-group row">
		<label id="elh_t105_disposalhead_RecommendedBy" for="x_RecommendedBy" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->RecommendedBy->caption() ?><?php echo $t105_disposalhead_edit->RecommendedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->RecommendedBy->cellAttributes() ?>>
<span id="el_t105_disposalhead_RecommendedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RecommendedBy"><?php echo EmptyValue(strval($t105_disposalhead_edit->RecommendedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_edit->RecommendedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_edit->RecommendedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_edit->RecommendedBy->ReadOnly || $t105_disposalhead_edit->RecommendedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RecommendedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_edit->RecommendedBy->Lookup->getParamTag($t105_disposalhead_edit, "p_x_RecommendedBy") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_RecommendedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_edit->RecommendedBy->displayValueSeparatorAttribute() ?>" name="x_RecommendedBy" id="x_RecommendedBy" value="<?php echo $t105_disposalhead_edit->RecommendedBy->CurrentValue ?>"<?php echo $t105_disposalhead_edit->RecommendedBy->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->RecommendedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->CE->Visible) { // CE ?>
	<div id="r_CE" class="form-group row">
		<label id="elh_t105_disposalhead_CE" for="x_CE" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->CE->caption() ?><?php echo $t105_disposalhead_edit->CE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->CE->cellAttributes() ?>>
<span id="el_t105_disposalhead_CE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CE"><?php echo EmptyValue(strval($t105_disposalhead_edit->CE->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_edit->CE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_edit->CE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_edit->CE->ReadOnly || $t105_disposalhead_edit->CE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_edit->CE->Lookup->getParamTag($t105_disposalhead_edit, "p_x_CE") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_CE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_edit->CE->displayValueSeparatorAttribute() ?>" name="x_CE" id="x_CE" value="<?php echo $t105_disposalhead_edit->CE->CurrentValue ?>"<?php echo $t105_disposalhead_edit->CE->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->CE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->ITM->Visible) { // ITM ?>
	<div id="r_ITM" class="form-group row">
		<label id="elh_t105_disposalhead_ITM" for="x_ITM" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->ITM->caption() ?><?php echo $t105_disposalhead_edit->ITM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->ITM->cellAttributes() ?>>
<span id="el_t105_disposalhead_ITM">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ITM"><?php echo EmptyValue(strval($t105_disposalhead_edit->ITM->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_edit->ITM->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_edit->ITM->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_edit->ITM->ReadOnly || $t105_disposalhead_edit->ITM->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ITM',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_edit->ITM->Lookup->getParamTag($t105_disposalhead_edit, "p_x_ITM") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_ITM" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_edit->ITM->displayValueSeparatorAttribute() ?>" name="x_ITM" id="x_ITM" value="<?php echo $t105_disposalhead_edit->ITM->CurrentValue ?>"<?php echo $t105_disposalhead_edit->ITM->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->ITM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->Sign1->Visible) { // Sign1 ?>
	<div id="r_Sign1" class="form-group row">
		<label id="elh_t105_disposalhead_Sign1" for="x_Sign1" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->Sign1->caption() ?><?php echo $t105_disposalhead_edit->Sign1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->Sign1->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign1"><?php echo EmptyValue(strval($t105_disposalhead_edit->Sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_edit->Sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_edit->Sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_edit->Sign1->ReadOnly || $t105_disposalhead_edit->Sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_edit->Sign1->Lookup->getParamTag($t105_disposalhead_edit, "p_x_Sign1") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_Sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_edit->Sign1->displayValueSeparatorAttribute() ?>" name="x_Sign1" id="x_Sign1" value="<?php echo $t105_disposalhead_edit->Sign1->CurrentValue ?>"<?php echo $t105_disposalhead_edit->Sign1->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->Sign1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->Sign2->Visible) { // Sign2 ?>
	<div id="r_Sign2" class="form-group row">
		<label id="elh_t105_disposalhead_Sign2" for="x_Sign2" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->Sign2->caption() ?><?php echo $t105_disposalhead_edit->Sign2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->Sign2->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign2"><?php echo EmptyValue(strval($t105_disposalhead_edit->Sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_edit->Sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_edit->Sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_edit->Sign2->ReadOnly || $t105_disposalhead_edit->Sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_edit->Sign2->Lookup->getParamTag($t105_disposalhead_edit, "p_x_Sign2") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_Sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_edit->Sign2->displayValueSeparatorAttribute() ?>" name="x_Sign2" id="x_Sign2" value="<?php echo $t105_disposalhead_edit->Sign2->CurrentValue ?>"<?php echo $t105_disposalhead_edit->Sign2->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->Sign2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_edit->Sign3->Visible) { // Sign3 ?>
	<div id="r_Sign3" class="form-group row">
		<label id="elh_t105_disposalhead_Sign3" for="x_Sign3" class="<?php echo $t105_disposalhead_edit->LeftColumnClass ?>"><?php echo $t105_disposalhead_edit->Sign3->caption() ?><?php echo $t105_disposalhead_edit->Sign3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_edit->RightColumnClass ?>"><div <?php echo $t105_disposalhead_edit->Sign3->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign3"><?php echo EmptyValue(strval($t105_disposalhead_edit->Sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_edit->Sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_edit->Sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_edit->Sign3->ReadOnly || $t105_disposalhead_edit->Sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_edit->Sign3->Lookup->getParamTag($t105_disposalhead_edit, "p_x_Sign3") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_Sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_edit->Sign3->displayValueSeparatorAttribute() ?>" name="x_Sign3" id="x_Sign3" value="<?php echo $t105_disposalhead_edit->Sign3->CurrentValue ?>"<?php echo $t105_disposalhead_edit->Sign3->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_edit->Sign3->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t105_disposalhead" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t105_disposalhead_edit->id->CurrentValue) ?>">
<?php
	if (in_array("t106_disposaldetail", explode(",", $t105_disposalhead->getCurrentDetailTable())) && $t106_disposaldetail->DetailEdit) {
?>
<?php if ($t105_disposalhead->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t106_disposaldetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t106_disposaldetailgrid.php" ?>
<?php } ?>
<?php if (!$t105_disposalhead_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t105_disposalhead_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t105_disposalhead_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t105_disposalhead_edit->showPageFooter();
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
$t105_disposalhead_edit->terminate();
?>