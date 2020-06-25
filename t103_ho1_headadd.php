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
$t103_ho1_head_add = new t103_ho1_head_add();

// Run the page
$t103_ho1_head_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t103_ho1_head_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft103_ho1_headadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft103_ho1_headadd = currentForm = new ew.Form("ft103_ho1_headadd", "add");

	// Validate form
	ft103_ho1_headadd.validate = function() {
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
			<?php if ($t103_ho1_head_add->ho_head->Required) { ?>
				elm = this.getElements("x" + infix + "_ho_head");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->ho_head->caption(), $t103_ho1_head_add->ho_head->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->TransactionNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->TransactionNo->caption(), $t103_ho1_head_add->TransactionNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->TransactionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->TransactionDate->caption(), $t103_ho1_head_add->TransactionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t103_ho1_head_add->TransactionDate->errorMessage()) ?>");
			<?php if ($t103_ho1_head_add->TransactionType->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->TransactionType->caption(), $t103_ho1_head_add->TransactionType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->HandedOverTo->Required) { ?>
				elm = this.getElements("x" + infix + "_HandedOverTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->HandedOverTo->caption(), $t103_ho1_head_add->HandedOverTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->CodeNoTo->Required) { ?>
				elm = this.getElements("x" + infix + "_CodeNoTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->CodeNoTo->caption(), $t103_ho1_head_add->CodeNoTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->DepartmentTo->Required) { ?>
				elm = this.getElements("x" + infix + "_DepartmentTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->DepartmentTo->caption(), $t103_ho1_head_add->DepartmentTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->Sign1->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->Sign1->caption(), $t103_ho1_head_add->Sign1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->Sign2->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->Sign2->caption(), $t103_ho1_head_add->Sign2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->Sign3->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->Sign3->caption(), $t103_ho1_head_add->Sign3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t103_ho1_head_add->Sign4->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t103_ho1_head_add->Sign4->caption(), $t103_ho1_head_add->Sign4->RequiredErrorMessage)) ?>");
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
	ft103_ho1_headadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft103_ho1_headadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft103_ho1_headadd.lists["x_ho_head"] = <?php echo $t103_ho1_head_add->ho_head->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_ho_head"].options = <?php echo JsonEncode($t103_ho1_head_add->ho_head->lookupOptions()) ?>;
	ft103_ho1_headadd.lists["x_TransactionType"] = <?php echo $t103_ho1_head_add->TransactionType->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_TransactionType"].options = <?php echo JsonEncode($t103_ho1_head_add->TransactionType->options(FALSE, TRUE)) ?>;
	ft103_ho1_headadd.lists["x_HandedOverTo"] = <?php echo $t103_ho1_head_add->HandedOverTo->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_HandedOverTo"].options = <?php echo JsonEncode($t103_ho1_head_add->HandedOverTo->lookupOptions()) ?>;
	ft103_ho1_headadd.lists["x_DepartmentTo"] = <?php echo $t103_ho1_head_add->DepartmentTo->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_DepartmentTo"].options = <?php echo JsonEncode($t103_ho1_head_add->DepartmentTo->lookupOptions()) ?>;
	ft103_ho1_headadd.lists["x_Sign1"] = <?php echo $t103_ho1_head_add->Sign1->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_Sign1"].options = <?php echo JsonEncode($t103_ho1_head_add->Sign1->lookupOptions()) ?>;
	ft103_ho1_headadd.lists["x_Sign2"] = <?php echo $t103_ho1_head_add->Sign2->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_Sign2"].options = <?php echo JsonEncode($t103_ho1_head_add->Sign2->lookupOptions()) ?>;
	ft103_ho1_headadd.lists["x_Sign3"] = <?php echo $t103_ho1_head_add->Sign3->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_Sign3"].options = <?php echo JsonEncode($t103_ho1_head_add->Sign3->lookupOptions()) ?>;
	ft103_ho1_headadd.lists["x_Sign4"] = <?php echo $t103_ho1_head_add->Sign4->Lookup->toClientList($t103_ho1_head_add) ?>;
	ft103_ho1_headadd.lists["x_Sign4"].options = <?php echo JsonEncode($t103_ho1_head_add->Sign4->lookupOptions()) ?>;
	loadjs.done("ft103_ho1_headadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t103_ho1_head_add->showPageHeader(); ?>
<?php
$t103_ho1_head_add->showMessage();
?>
<form name="ft103_ho1_headadd" id="ft103_ho1_headadd" class="<?php echo $t103_ho1_head_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t103_ho1_head">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t103_ho1_head_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t103_ho1_head_add->ho_head->Visible) { // ho_head ?>
	<div id="r_ho_head" class="form-group row">
		<label id="elh_t103_ho1_head_ho_head" for="x_ho_head" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->ho_head->caption() ?><?php echo $t103_ho1_head_add->ho_head->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->ho_head->cellAttributes() ?>>
<span id="el_t103_ho1_head_ho_head">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_ho_head"><?php echo EmptyValue(strval($t103_ho1_head_add->ho_head->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_add->ho_head->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_add->ho_head->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_add->ho_head->ReadOnly || $t103_ho1_head_add->ho_head->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_ho_head',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_add->ho_head->Lookup->getParamTag($t103_ho1_head_add, "p_x_ho_head") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_ho_head" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_add->ho_head->displayValueSeparatorAttribute() ?>" name="x_ho_head" id="x_ho_head" value="<?php echo $t103_ho1_head_add->ho_head->CurrentValue ?>"<?php echo $t103_ho1_head_add->ho_head->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->ho_head->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->TransactionNo->Visible) { // TransactionNo ?>
	<div id="r_TransactionNo" class="form-group row">
		<label id="elh_t103_ho1_head_TransactionNo" for="x_TransactionNo" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->TransactionNo->caption() ?><?php echo $t103_ho1_head_add->TransactionNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->TransactionNo->cellAttributes() ?>>
<span id="el_t103_ho1_head_TransactionNo">
<input type="text" data-table="t103_ho1_head" data-field="x_TransactionNo" name="x_TransactionNo" id="x_TransactionNo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t103_ho1_head_add->TransactionNo->getPlaceHolder()) ?>" value="<?php echo $t103_ho1_head_add->TransactionNo->EditValue ?>"<?php echo $t103_ho1_head_add->TransactionNo->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->TransactionNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->TransactionDate->Visible) { // TransactionDate ?>
	<div id="r_TransactionDate" class="form-group row">
		<label id="elh_t103_ho1_head_TransactionDate" for="x_TransactionDate" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->TransactionDate->caption() ?><?php echo $t103_ho1_head_add->TransactionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->TransactionDate->cellAttributes() ?>>
<span id="el_t103_ho1_head_TransactionDate">
<input type="text" data-table="t103_ho1_head" data-field="x_TransactionDate" data-format="7" name="x_TransactionDate" id="x_TransactionDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t103_ho1_head_add->TransactionDate->getPlaceHolder()) ?>" value="<?php echo $t103_ho1_head_add->TransactionDate->EditValue ?>"<?php echo $t103_ho1_head_add->TransactionDate->editAttributes() ?>>
<?php if (!$t103_ho1_head_add->TransactionDate->ReadOnly && !$t103_ho1_head_add->TransactionDate->Disabled && !isset($t103_ho1_head_add->TransactionDate->EditAttrs["readonly"]) && !isset($t103_ho1_head_add->TransactionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft103_ho1_headadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft103_ho1_headadd", "x_TransactionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t103_ho1_head_add->TransactionDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->TransactionType->Visible) { // TransactionType ?>
	<div id="r_TransactionType" class="form-group row">
		<label id="elh_t103_ho1_head_TransactionType" for="x_TransactionType" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->TransactionType->caption() ?><?php echo $t103_ho1_head_add->TransactionType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->TransactionType->cellAttributes() ?>>
<span id="el_t103_ho1_head_TransactionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t103_ho1_head" data-field="x_TransactionType" data-value-separator="<?php echo $t103_ho1_head_add->TransactionType->displayValueSeparatorAttribute() ?>" id="x_TransactionType" name="x_TransactionType"<?php echo $t103_ho1_head_add->TransactionType->editAttributes() ?>>
			<?php echo $t103_ho1_head_add->TransactionType->selectOptionListHtml("x_TransactionType") ?>
		</select>
</div>
</span>
<?php echo $t103_ho1_head_add->TransactionType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->HandedOverTo->Visible) { // HandedOverTo ?>
	<div id="r_HandedOverTo" class="form-group row">
		<label id="elh_t103_ho1_head_HandedOverTo" for="x_HandedOverTo" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->HandedOverTo->caption() ?><?php echo $t103_ho1_head_add->HandedOverTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->HandedOverTo->cellAttributes() ?>>
<span id="el_t103_ho1_head_HandedOverTo">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HandedOverTo"><?php echo EmptyValue(strval($t103_ho1_head_add->HandedOverTo->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_add->HandedOverTo->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_add->HandedOverTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_add->HandedOverTo->ReadOnly || $t103_ho1_head_add->HandedOverTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HandedOverTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_add->HandedOverTo->Lookup->getParamTag($t103_ho1_head_add, "p_x_HandedOverTo") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_HandedOverTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_add->HandedOverTo->displayValueSeparatorAttribute() ?>" name="x_HandedOverTo" id="x_HandedOverTo" value="<?php echo $t103_ho1_head_add->HandedOverTo->CurrentValue ?>"<?php echo $t103_ho1_head_add->HandedOverTo->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->HandedOverTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->CodeNoTo->Visible) { // CodeNoTo ?>
	<div id="r_CodeNoTo" class="form-group row">
		<label id="elh_t103_ho1_head_CodeNoTo" for="x_CodeNoTo" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->CodeNoTo->caption() ?><?php echo $t103_ho1_head_add->CodeNoTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->CodeNoTo->cellAttributes() ?>>
<span id="el_t103_ho1_head_CodeNoTo">
<input type="text" data-table="t103_ho1_head" data-field="x_CodeNoTo" name="x_CodeNoTo" id="x_CodeNoTo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t103_ho1_head_add->CodeNoTo->getPlaceHolder()) ?>" value="<?php echo $t103_ho1_head_add->CodeNoTo->EditValue ?>"<?php echo $t103_ho1_head_add->CodeNoTo->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->CodeNoTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->DepartmentTo->Visible) { // DepartmentTo ?>
	<div id="r_DepartmentTo" class="form-group row">
		<label id="elh_t103_ho1_head_DepartmentTo" for="x_DepartmentTo" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->DepartmentTo->caption() ?><?php echo $t103_ho1_head_add->DepartmentTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->DepartmentTo->cellAttributes() ?>>
<span id="el_t103_ho1_head_DepartmentTo">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DepartmentTo"><?php echo EmptyValue(strval($t103_ho1_head_add->DepartmentTo->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_add->DepartmentTo->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_add->DepartmentTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_add->DepartmentTo->ReadOnly || $t103_ho1_head_add->DepartmentTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DepartmentTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t103_ho1_head_add->DepartmentTo->Lookup->getParamTag($t103_ho1_head_add, "p_x_DepartmentTo") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_DepartmentTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_add->DepartmentTo->displayValueSeparatorAttribute() ?>" name="x_DepartmentTo" id="x_DepartmentTo" value="<?php echo $t103_ho1_head_add->DepartmentTo->CurrentValue ?>"<?php echo $t103_ho1_head_add->DepartmentTo->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->DepartmentTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->Sign1->Visible) { // Sign1 ?>
	<div id="r_Sign1" class="form-group row">
		<label id="elh_t103_ho1_head_Sign1" for="x_Sign1" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->Sign1->caption() ?><?php echo $t103_ho1_head_add->Sign1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->Sign1->cellAttributes() ?>>
<span id="el_t103_ho1_head_Sign1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign1"><?php echo EmptyValue(strval($t103_ho1_head_add->Sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_add->Sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_add->Sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_add->Sign1->ReadOnly || $t103_ho1_head_add->Sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t103_ho1_head_add->Sign1->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Sign1" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t103_ho1_head_add->Sign1->caption() ?>" data-title="<?php echo $t103_ho1_head_add->Sign1->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Sign1',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t103_ho1_head_add->Sign1->Lookup->getParamTag($t103_ho1_head_add, "p_x_Sign1") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_add->Sign1->displayValueSeparatorAttribute() ?>" name="x_Sign1" id="x_Sign1" value="<?php echo $t103_ho1_head_add->Sign1->CurrentValue ?>"<?php echo $t103_ho1_head_add->Sign1->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->Sign1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->Sign2->Visible) { // Sign2 ?>
	<div id="r_Sign2" class="form-group row">
		<label id="elh_t103_ho1_head_Sign2" for="x_Sign2" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->Sign2->caption() ?><?php echo $t103_ho1_head_add->Sign2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->Sign2->cellAttributes() ?>>
<span id="el_t103_ho1_head_Sign2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign2"><?php echo EmptyValue(strval($t103_ho1_head_add->Sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_add->Sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_add->Sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_add->Sign2->ReadOnly || $t103_ho1_head_add->Sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t103_ho1_head_add->Sign2->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Sign2" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t103_ho1_head_add->Sign2->caption() ?>" data-title="<?php echo $t103_ho1_head_add->Sign2->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Sign2',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t103_ho1_head_add->Sign2->Lookup->getParamTag($t103_ho1_head_add, "p_x_Sign2") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_add->Sign2->displayValueSeparatorAttribute() ?>" name="x_Sign2" id="x_Sign2" value="<?php echo $t103_ho1_head_add->Sign2->CurrentValue ?>"<?php echo $t103_ho1_head_add->Sign2->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->Sign2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->Sign3->Visible) { // Sign3 ?>
	<div id="r_Sign3" class="form-group row">
		<label id="elh_t103_ho1_head_Sign3" for="x_Sign3" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->Sign3->caption() ?><?php echo $t103_ho1_head_add->Sign3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->Sign3->cellAttributes() ?>>
<span id="el_t103_ho1_head_Sign3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign3"><?php echo EmptyValue(strval($t103_ho1_head_add->Sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_add->Sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_add->Sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_add->Sign3->ReadOnly || $t103_ho1_head_add->Sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t103_ho1_head_add->Sign3->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Sign3" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t103_ho1_head_add->Sign3->caption() ?>" data-title="<?php echo $t103_ho1_head_add->Sign3->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Sign3',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t103_ho1_head_add->Sign3->Lookup->getParamTag($t103_ho1_head_add, "p_x_Sign3") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_add->Sign3->displayValueSeparatorAttribute() ?>" name="x_Sign3" id="x_Sign3" value="<?php echo $t103_ho1_head_add->Sign3->CurrentValue ?>"<?php echo $t103_ho1_head_add->Sign3->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->Sign3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t103_ho1_head_add->Sign4->Visible) { // Sign4 ?>
	<div id="r_Sign4" class="form-group row">
		<label id="elh_t103_ho1_head_Sign4" for="x_Sign4" class="<?php echo $t103_ho1_head_add->LeftColumnClass ?>"><?php echo $t103_ho1_head_add->Sign4->caption() ?><?php echo $t103_ho1_head_add->Sign4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t103_ho1_head_add->RightColumnClass ?>"><div <?php echo $t103_ho1_head_add->Sign4->cellAttributes() ?>>
<span id="el_t103_ho1_head_Sign4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign4"><?php echo EmptyValue(strval($t103_ho1_head_add->Sign4->ViewValue)) ? $Language->phrase("PleaseSelect") : $t103_ho1_head_add->Sign4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t103_ho1_head_add->Sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t103_ho1_head_add->Sign4->ReadOnly || $t103_ho1_head_add->Sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t103_ho1_head_add->Sign4->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_Sign4" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t103_ho1_head_add->Sign4->caption() ?>" data-title="<?php echo $t103_ho1_head_add->Sign4->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_Sign4',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t103_ho1_head_add->Sign4->Lookup->getParamTag($t103_ho1_head_add, "p_x_Sign4") ?>
<input type="hidden" data-table="t103_ho1_head" data-field="x_Sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t103_ho1_head_add->Sign4->displayValueSeparatorAttribute() ?>" name="x_Sign4" id="x_Sign4" value="<?php echo $t103_ho1_head_add->Sign4->CurrentValue ?>"<?php echo $t103_ho1_head_add->Sign4->editAttributes() ?>>
</span>
<?php echo $t103_ho1_head_add->Sign4->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t104_ho1_detail", explode(",", $t103_ho1_head->getCurrentDetailTable())) && $t104_ho1_detail->DetailAdd) {
?>
<?php if ($t103_ho1_head->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t104_ho1_detail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t104_ho1_detailgrid.php" ?>
<?php } ?>
<?php if (!$t103_ho1_head_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t103_ho1_head_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t103_ho1_head_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t103_ho1_head_add->showPageFooter();
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
$t103_ho1_head_add->terminate();
?>