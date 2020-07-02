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
$t105_disposalhead_add = new t105_disposalhead_add();

// Run the page
$t105_disposalhead_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t105_disposalhead_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft105_disposalheadadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft105_disposalheadadd = currentForm = new ew.Form("ft105_disposalheadadd", "add");

	// Validate form
	ft105_disposalheadadd.validate = function() {
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
			<?php if ($t105_disposalhead_add->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->property_id->caption(), $t105_disposalhead_add->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_add->TransactionNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->TransactionNo->caption(), $t105_disposalhead_add->TransactionNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_add->TransactionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->TransactionDate->caption(), $t105_disposalhead_add->TransactionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t105_disposalhead_add->TransactionDate->errorMessage()) ?>");
			<?php if ($t105_disposalhead_add->RecommendedBy->Required) { ?>
				elm = this.getElements("x" + infix + "_RecommendedBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->RecommendedBy->caption(), $t105_disposalhead_add->RecommendedBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_add->CE->Required) { ?>
				elm = this.getElements("x" + infix + "_CE");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->CE->caption(), $t105_disposalhead_add->CE->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_add->ITM->Required) { ?>
				elm = this.getElements("x" + infix + "_ITM");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->ITM->caption(), $t105_disposalhead_add->ITM->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_add->Sign1->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->Sign1->caption(), $t105_disposalhead_add->Sign1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_add->Sign2->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->Sign2->caption(), $t105_disposalhead_add->Sign2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t105_disposalhead_add->Sign3->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t105_disposalhead_add->Sign3->caption(), $t105_disposalhead_add->Sign3->RequiredErrorMessage)) ?>");
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
	ft105_disposalheadadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft105_disposalheadadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft105_disposalheadadd.lists["x_property_id"] = <?php echo $t105_disposalhead_add->property_id->Lookup->toClientList($t105_disposalhead_add) ?>;
	ft105_disposalheadadd.lists["x_property_id"].options = <?php echo JsonEncode($t105_disposalhead_add->property_id->lookupOptions()) ?>;
	ft105_disposalheadadd.lists["x_RecommendedBy"] = <?php echo $t105_disposalhead_add->RecommendedBy->Lookup->toClientList($t105_disposalhead_add) ?>;
	ft105_disposalheadadd.lists["x_RecommendedBy"].options = <?php echo JsonEncode($t105_disposalhead_add->RecommendedBy->lookupOptions()) ?>;
	ft105_disposalheadadd.lists["x_CE"] = <?php echo $t105_disposalhead_add->CE->Lookup->toClientList($t105_disposalhead_add) ?>;
	ft105_disposalheadadd.lists["x_CE"].options = <?php echo JsonEncode($t105_disposalhead_add->CE->lookupOptions()) ?>;
	ft105_disposalheadadd.lists["x_ITM"] = <?php echo $t105_disposalhead_add->ITM->Lookup->toClientList($t105_disposalhead_add) ?>;
	ft105_disposalheadadd.lists["x_ITM"].options = <?php echo JsonEncode($t105_disposalhead_add->ITM->lookupOptions()) ?>;
	ft105_disposalheadadd.lists["x_Sign1"] = <?php echo $t105_disposalhead_add->Sign1->Lookup->toClientList($t105_disposalhead_add) ?>;
	ft105_disposalheadadd.lists["x_Sign1"].options = <?php echo JsonEncode($t105_disposalhead_add->Sign1->lookupOptions()) ?>;
	ft105_disposalheadadd.lists["x_Sign2"] = <?php echo $t105_disposalhead_add->Sign2->Lookup->toClientList($t105_disposalhead_add) ?>;
	ft105_disposalheadadd.lists["x_Sign2"].options = <?php echo JsonEncode($t105_disposalhead_add->Sign2->lookupOptions()) ?>;
	ft105_disposalheadadd.lists["x_Sign3"] = <?php echo $t105_disposalhead_add->Sign3->Lookup->toClientList($t105_disposalhead_add) ?>;
	ft105_disposalheadadd.lists["x_Sign3"].options = <?php echo JsonEncode($t105_disposalhead_add->Sign3->lookupOptions()) ?>;
	loadjs.done("ft105_disposalheadadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t105_disposalhead_add->showPageHeader(); ?>
<?php
$t105_disposalhead_add->showMessage();
?>
<form name="ft105_disposalheadadd" id="ft105_disposalheadadd" class="<?php echo $t105_disposalhead_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t105_disposalhead">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t105_disposalhead_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t105_disposalhead_add->property_id->Visible) { // property_id ?>
	<div id="r_property_id" class="form-group row">
		<label id="elh_t105_disposalhead_property_id" for="x_property_id" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->property_id->caption() ?><?php echo $t105_disposalhead_add->property_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->property_id->cellAttributes() ?>>
<span id="el_t105_disposalhead_property_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_property_id"><?php echo EmptyValue(strval($t105_disposalhead_add->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_add->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_add->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_add->property_id->ReadOnly || $t105_disposalhead_add->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_add->property_id->Lookup->getParamTag($t105_disposalhead_add, "p_x_property_id") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_add->property_id->displayValueSeparatorAttribute() ?>" name="x_property_id" id="x_property_id" value="<?php echo $t105_disposalhead_add->property_id->CurrentValue ?>"<?php echo $t105_disposalhead_add->property_id->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->property_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->TransactionNo->Visible) { // TransactionNo ?>
	<div id="r_TransactionNo" class="form-group row">
		<label id="elh_t105_disposalhead_TransactionNo" for="x_TransactionNo" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->TransactionNo->caption() ?><?php echo $t105_disposalhead_add->TransactionNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->TransactionNo->cellAttributes() ?>>
<span id="el_t105_disposalhead_TransactionNo">
<input type="text" data-table="t105_disposalhead" data-field="x_TransactionNo" name="x_TransactionNo" id="x_TransactionNo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t105_disposalhead_add->TransactionNo->getPlaceHolder()) ?>" value="<?php echo $t105_disposalhead_add->TransactionNo->EditValue ?>"<?php echo $t105_disposalhead_add->TransactionNo->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->TransactionNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->TransactionDate->Visible) { // TransactionDate ?>
	<div id="r_TransactionDate" class="form-group row">
		<label id="elh_t105_disposalhead_TransactionDate" for="x_TransactionDate" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->TransactionDate->caption() ?><?php echo $t105_disposalhead_add->TransactionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->TransactionDate->cellAttributes() ?>>
<span id="el_t105_disposalhead_TransactionDate">
<input type="text" data-table="t105_disposalhead" data-field="x_TransactionDate" data-format="7" name="x_TransactionDate" id="x_TransactionDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t105_disposalhead_add->TransactionDate->getPlaceHolder()) ?>" value="<?php echo $t105_disposalhead_add->TransactionDate->EditValue ?>"<?php echo $t105_disposalhead_add->TransactionDate->editAttributes() ?>>
<?php if (!$t105_disposalhead_add->TransactionDate->ReadOnly && !$t105_disposalhead_add->TransactionDate->Disabled && !isset($t105_disposalhead_add->TransactionDate->EditAttrs["readonly"]) && !isset($t105_disposalhead_add->TransactionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft105_disposalheadadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft105_disposalheadadd", "x_TransactionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t105_disposalhead_add->TransactionDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->RecommendedBy->Visible) { // RecommendedBy ?>
	<div id="r_RecommendedBy" class="form-group row">
		<label id="elh_t105_disposalhead_RecommendedBy" for="x_RecommendedBy" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->RecommendedBy->caption() ?><?php echo $t105_disposalhead_add->RecommendedBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->RecommendedBy->cellAttributes() ?>>
<span id="el_t105_disposalhead_RecommendedBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_RecommendedBy"><?php echo EmptyValue(strval($t105_disposalhead_add->RecommendedBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_add->RecommendedBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_add->RecommendedBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_add->RecommendedBy->ReadOnly || $t105_disposalhead_add->RecommendedBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_RecommendedBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_add->RecommendedBy->Lookup->getParamTag($t105_disposalhead_add, "p_x_RecommendedBy") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_RecommendedBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_add->RecommendedBy->displayValueSeparatorAttribute() ?>" name="x_RecommendedBy" id="x_RecommendedBy" value="<?php echo $t105_disposalhead_add->RecommendedBy->CurrentValue ?>"<?php echo $t105_disposalhead_add->RecommendedBy->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->RecommendedBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->CE->Visible) { // CE ?>
	<div id="r_CE" class="form-group row">
		<label id="elh_t105_disposalhead_CE" for="x_CE" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->CE->caption() ?><?php echo $t105_disposalhead_add->CE->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->CE->cellAttributes() ?>>
<span id="el_t105_disposalhead_CE">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_CE"><?php echo EmptyValue(strval($t105_disposalhead_add->CE->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_add->CE->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_add->CE->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_add->CE->ReadOnly || $t105_disposalhead_add->CE->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_CE',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_add->CE->Lookup->getParamTag($t105_disposalhead_add, "p_x_CE") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_CE" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_add->CE->displayValueSeparatorAttribute() ?>" name="x_CE" id="x_CE" value="<?php echo $t105_disposalhead_add->CE->CurrentValue ?>"<?php echo $t105_disposalhead_add->CE->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->CE->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->ITM->Visible) { // ITM ?>
	<div id="r_ITM" class="form-group row">
		<label id="elh_t105_disposalhead_ITM" for="x_ITM" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->ITM->caption() ?><?php echo $t105_disposalhead_add->ITM->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->ITM->cellAttributes() ?>>
<span id="el_t105_disposalhead_ITM">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ITM"><?php echo EmptyValue(strval($t105_disposalhead_add->ITM->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_add->ITM->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_add->ITM->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_add->ITM->ReadOnly || $t105_disposalhead_add->ITM->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ITM',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_add->ITM->Lookup->getParamTag($t105_disposalhead_add, "p_x_ITM") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_ITM" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_add->ITM->displayValueSeparatorAttribute() ?>" name="x_ITM" id="x_ITM" value="<?php echo $t105_disposalhead_add->ITM->CurrentValue ?>"<?php echo $t105_disposalhead_add->ITM->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->ITM->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->Sign1->Visible) { // Sign1 ?>
	<div id="r_Sign1" class="form-group row">
		<label id="elh_t105_disposalhead_Sign1" for="x_Sign1" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->Sign1->caption() ?><?php echo $t105_disposalhead_add->Sign1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->Sign1->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign1"><?php echo EmptyValue(strval($t105_disposalhead_add->Sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_add->Sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_add->Sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_add->Sign1->ReadOnly || $t105_disposalhead_add->Sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_add->Sign1->Lookup->getParamTag($t105_disposalhead_add, "p_x_Sign1") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_Sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_add->Sign1->displayValueSeparatorAttribute() ?>" name="x_Sign1" id="x_Sign1" value="<?php echo $t105_disposalhead_add->Sign1->CurrentValue ?>"<?php echo $t105_disposalhead_add->Sign1->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->Sign1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->Sign2->Visible) { // Sign2 ?>
	<div id="r_Sign2" class="form-group row">
		<label id="elh_t105_disposalhead_Sign2" for="x_Sign2" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->Sign2->caption() ?><?php echo $t105_disposalhead_add->Sign2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->Sign2->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign2"><?php echo EmptyValue(strval($t105_disposalhead_add->Sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_add->Sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_add->Sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_add->Sign2->ReadOnly || $t105_disposalhead_add->Sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_add->Sign2->Lookup->getParamTag($t105_disposalhead_add, "p_x_Sign2") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_Sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_add->Sign2->displayValueSeparatorAttribute() ?>" name="x_Sign2" id="x_Sign2" value="<?php echo $t105_disposalhead_add->Sign2->CurrentValue ?>"<?php echo $t105_disposalhead_add->Sign2->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->Sign2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t105_disposalhead_add->Sign3->Visible) { // Sign3 ?>
	<div id="r_Sign3" class="form-group row">
		<label id="elh_t105_disposalhead_Sign3" for="x_Sign3" class="<?php echo $t105_disposalhead_add->LeftColumnClass ?>"><?php echo $t105_disposalhead_add->Sign3->caption() ?><?php echo $t105_disposalhead_add->Sign3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t105_disposalhead_add->RightColumnClass ?>"><div <?php echo $t105_disposalhead_add->Sign3->cellAttributes() ?>>
<span id="el_t105_disposalhead_Sign3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign3"><?php echo EmptyValue(strval($t105_disposalhead_add->Sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t105_disposalhead_add->Sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t105_disposalhead_add->Sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t105_disposalhead_add->Sign3->ReadOnly || $t105_disposalhead_add->Sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t105_disposalhead_add->Sign3->Lookup->getParamTag($t105_disposalhead_add, "p_x_Sign3") ?>
<input type="hidden" data-table="t105_disposalhead" data-field="x_Sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t105_disposalhead_add->Sign3->displayValueSeparatorAttribute() ?>" name="x_Sign3" id="x_Sign3" value="<?php echo $t105_disposalhead_add->Sign3->CurrentValue ?>"<?php echo $t105_disposalhead_add->Sign3->editAttributes() ?>>
</span>
<?php echo $t105_disposalhead_add->Sign3->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t106_disposaldetail", explode(",", $t105_disposalhead->getCurrentDetailTable())) && $t106_disposaldetail->DetailAdd) {
?>
<?php if ($t105_disposalhead->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t106_disposaldetail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t106_disposaldetailgrid.php" ?>
<?php } ?>
<?php if (!$t105_disposalhead_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t105_disposalhead_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t105_disposalhead_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t105_disposalhead_add->showPageFooter();
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
$t105_disposalhead_add->terminate();
?>