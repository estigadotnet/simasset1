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
$t101_ho_head_add = new t101_ho_head_add();

// Run the page
$t101_ho_head_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t101_ho_head_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft101_ho_headadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft101_ho_headadd = currentForm = new ew.Form("ft101_ho_headadd", "add");

	// Validate form
	ft101_ho_headadd.validate = function() {
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
			<?php if ($t101_ho_head_add->TransactionNo->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionNo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->TransactionNo->caption(), $t101_ho_head_add->TransactionNo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->TransactionDate->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->TransactionDate->caption(), $t101_ho_head_add->TransactionDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_TransactionDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t101_ho_head_add->TransactionDate->errorMessage()) ?>");
			<?php if ($t101_ho_head_add->TransactionType->Required) { ?>
				elm = this.getElements("x" + infix + "_TransactionType");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->TransactionType->caption(), $t101_ho_head_add->TransactionType->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->HandedOverTo->Required) { ?>
				elm = this.getElements("x" + infix + "_HandedOverTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->HandedOverTo->caption(), $t101_ho_head_add->HandedOverTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->CodeNoTo->Required) { ?>
				elm = this.getElements("x" + infix + "_CodeNoTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->CodeNoTo->caption(), $t101_ho_head_add->CodeNoTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->DepartmentTo->Required) { ?>
				elm = this.getElements("x" + infix + "_DepartmentTo");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->DepartmentTo->caption(), $t101_ho_head_add->DepartmentTo->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->HandedOverBy->Required) { ?>
				elm = this.getElements("x" + infix + "_HandedOverBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->HandedOverBy->caption(), $t101_ho_head_add->HandedOverBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->CodeNoBy->Required) { ?>
				elm = this.getElements("x" + infix + "_CodeNoBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->CodeNoBy->caption(), $t101_ho_head_add->CodeNoBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->DepartmentBy->Required) { ?>
				elm = this.getElements("x" + infix + "_DepartmentBy");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->DepartmentBy->caption(), $t101_ho_head_add->DepartmentBy->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->Sign1->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign1");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->Sign1->caption(), $t101_ho_head_add->Sign1->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->Sign2->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign2");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->Sign2->caption(), $t101_ho_head_add->Sign2->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->Sign3->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign3");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->Sign3->caption(), $t101_ho_head_add->Sign3->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t101_ho_head_add->Sign4->Required) { ?>
				elm = this.getElements("x" + infix + "_Sign4");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t101_ho_head_add->Sign4->caption(), $t101_ho_head_add->Sign4->RequiredErrorMessage)) ?>");
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
	ft101_ho_headadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft101_ho_headadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft101_ho_headadd.lists["x_TransactionType"] = <?php echo $t101_ho_head_add->TransactionType->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_TransactionType"].options = <?php echo JsonEncode($t101_ho_head_add->TransactionType->options(FALSE, TRUE)) ?>;
	ft101_ho_headadd.lists["x_HandedOverTo"] = <?php echo $t101_ho_head_add->HandedOverTo->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_HandedOverTo"].options = <?php echo JsonEncode($t101_ho_head_add->HandedOverTo->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_DepartmentTo"] = <?php echo $t101_ho_head_add->DepartmentTo->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_DepartmentTo"].options = <?php echo JsonEncode($t101_ho_head_add->DepartmentTo->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_HandedOverBy"] = <?php echo $t101_ho_head_add->HandedOverBy->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_HandedOverBy"].options = <?php echo JsonEncode($t101_ho_head_add->HandedOverBy->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_DepartmentBy"] = <?php echo $t101_ho_head_add->DepartmentBy->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_DepartmentBy"].options = <?php echo JsonEncode($t101_ho_head_add->DepartmentBy->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_Sign1"] = <?php echo $t101_ho_head_add->Sign1->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_Sign1"].options = <?php echo JsonEncode($t101_ho_head_add->Sign1->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_Sign2"] = <?php echo $t101_ho_head_add->Sign2->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_Sign2"].options = <?php echo JsonEncode($t101_ho_head_add->Sign2->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_Sign3"] = <?php echo $t101_ho_head_add->Sign3->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_Sign3"].options = <?php echo JsonEncode($t101_ho_head_add->Sign3->lookupOptions()) ?>;
	ft101_ho_headadd.lists["x_Sign4"] = <?php echo $t101_ho_head_add->Sign4->Lookup->toClientList($t101_ho_head_add) ?>;
	ft101_ho_headadd.lists["x_Sign4"].options = <?php echo JsonEncode($t101_ho_head_add->Sign4->lookupOptions()) ?>;
	loadjs.done("ft101_ho_headadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t101_ho_head_add->showPageHeader(); ?>
<?php
$t101_ho_head_add->showMessage();
?>
<form name="ft101_ho_headadd" id="ft101_ho_headadd" class="<?php echo $t101_ho_head_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t101_ho_head">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t101_ho_head_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t101_ho_head_add->TransactionNo->Visible) { // TransactionNo ?>
	<div id="r_TransactionNo" class="form-group row">
		<label id="elh_t101_ho_head_TransactionNo" for="x_TransactionNo" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->TransactionNo->caption() ?><?php echo $t101_ho_head_add->TransactionNo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->TransactionNo->cellAttributes() ?>>
<span id="el_t101_ho_head_TransactionNo">
<input type="text" data-table="t101_ho_head" data-field="x_TransactionNo" name="x_TransactionNo" id="x_TransactionNo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_add->TransactionNo->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->TransactionNo->EditValue ?>"<?php echo $t101_ho_head_add->TransactionNo->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->TransactionNo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->TransactionDate->Visible) { // TransactionDate ?>
	<div id="r_TransactionDate" class="form-group row">
		<label id="elh_t101_ho_head_TransactionDate" for="x_TransactionDate" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->TransactionDate->caption() ?><?php echo $t101_ho_head_add->TransactionDate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->TransactionDate->cellAttributes() ?>>
<span id="el_t101_ho_head_TransactionDate">
<input type="text" data-table="t101_ho_head" data-field="x_TransactionDate" data-format="7" name="x_TransactionDate" id="x_TransactionDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t101_ho_head_add->TransactionDate->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->TransactionDate->EditValue ?>"<?php echo $t101_ho_head_add->TransactionDate->editAttributes() ?>>
<?php if (!$t101_ho_head_add->TransactionDate->ReadOnly && !$t101_ho_head_add->TransactionDate->Disabled && !isset($t101_ho_head_add->TransactionDate->EditAttrs["readonly"]) && !isset($t101_ho_head_add->TransactionDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft101_ho_headadd", "datetimepicker"], function() {
	ew.createDateTimePicker("ft101_ho_headadd", "x_TransactionDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t101_ho_head_add->TransactionDate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->TransactionType->Visible) { // TransactionType ?>
	<div id="r_TransactionType" class="form-group row">
		<label id="elh_t101_ho_head_TransactionType" for="x_TransactionType" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->TransactionType->caption() ?><?php echo $t101_ho_head_add->TransactionType->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->TransactionType->cellAttributes() ?>>
<span id="el_t101_ho_head_TransactionType">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="t101_ho_head" data-field="x_TransactionType" data-value-separator="<?php echo $t101_ho_head_add->TransactionType->displayValueSeparatorAttribute() ?>" id="x_TransactionType" name="x_TransactionType"<?php echo $t101_ho_head_add->TransactionType->editAttributes() ?>>
			<?php echo $t101_ho_head_add->TransactionType->selectOptionListHtml("x_TransactionType") ?>
		</select>
</div>
</span>
<?php echo $t101_ho_head_add->TransactionType->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->HandedOverTo->Visible) { // HandedOverTo ?>
	<div id="r_HandedOverTo" class="form-group row">
		<label id="elh_t101_ho_head_HandedOverTo" for="x_HandedOverTo" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->HandedOverTo->caption() ?><?php echo $t101_ho_head_add->HandedOverTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->HandedOverTo->cellAttributes() ?>>
<span id="el_t101_ho_head_HandedOverTo">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HandedOverTo"><?php echo EmptyValue(strval($t101_ho_head_add->HandedOverTo->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->HandedOverTo->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->HandedOverTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->HandedOverTo->ReadOnly || $t101_ho_head_add->HandedOverTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HandedOverTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t101_ho_head_add->HandedOverTo->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_HandedOverTo" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_ho_head_add->HandedOverTo->caption() ?>" data-title="<?php echo $t101_ho_head_add->HandedOverTo->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_HandedOverTo',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t101_ho_head_add->HandedOverTo->Lookup->getParamTag($t101_ho_head_add, "p_x_HandedOverTo") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_HandedOverTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->HandedOverTo->displayValueSeparatorAttribute() ?>" name="x_HandedOverTo" id="x_HandedOverTo" value="<?php echo $t101_ho_head_add->HandedOverTo->CurrentValue ?>"<?php echo $t101_ho_head_add->HandedOverTo->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->HandedOverTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->CodeNoTo->Visible) { // CodeNoTo ?>
	<div id="r_CodeNoTo" class="form-group row">
		<label id="elh_t101_ho_head_CodeNoTo" for="x_CodeNoTo" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->CodeNoTo->caption() ?><?php echo $t101_ho_head_add->CodeNoTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->CodeNoTo->cellAttributes() ?>>
<span id="el_t101_ho_head_CodeNoTo">
<input type="text" data-table="t101_ho_head" data-field="x_CodeNoTo" name="x_CodeNoTo" id="x_CodeNoTo" size="10" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_add->CodeNoTo->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->CodeNoTo->EditValue ?>"<?php echo $t101_ho_head_add->CodeNoTo->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->CodeNoTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->DepartmentTo->Visible) { // DepartmentTo ?>
	<div id="r_DepartmentTo" class="form-group row">
		<label id="elh_t101_ho_head_DepartmentTo" for="x_DepartmentTo" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->DepartmentTo->caption() ?><?php echo $t101_ho_head_add->DepartmentTo->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->DepartmentTo->cellAttributes() ?>>
<span id="el_t101_ho_head_DepartmentTo">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DepartmentTo"><?php echo EmptyValue(strval($t101_ho_head_add->DepartmentTo->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->DepartmentTo->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->DepartmentTo->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->DepartmentTo->ReadOnly || $t101_ho_head_add->DepartmentTo->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DepartmentTo',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_department") && !$t101_ho_head_add->DepartmentTo->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DepartmentTo" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_ho_head_add->DepartmentTo->caption() ?>" data-title="<?php echo $t101_ho_head_add->DepartmentTo->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DepartmentTo',url:'t002_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t101_ho_head_add->DepartmentTo->Lookup->getParamTag($t101_ho_head_add, "p_x_DepartmentTo") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_DepartmentTo" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->DepartmentTo->displayValueSeparatorAttribute() ?>" name="x_DepartmentTo" id="x_DepartmentTo" value="<?php echo $t101_ho_head_add->DepartmentTo->CurrentValue ?>"<?php echo $t101_ho_head_add->DepartmentTo->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->DepartmentTo->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->HandedOverBy->Visible) { // HandedOverBy ?>
	<div id="r_HandedOverBy" class="form-group row">
		<label id="elh_t101_ho_head_HandedOverBy" for="x_HandedOverBy" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->HandedOverBy->caption() ?><?php echo $t101_ho_head_add->HandedOverBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->HandedOverBy->cellAttributes() ?>>
<span id="el_t101_ho_head_HandedOverBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_HandedOverBy"><?php echo EmptyValue(strval($t101_ho_head_add->HandedOverBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->HandedOverBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->HandedOverBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->HandedOverBy->ReadOnly || $t101_ho_head_add->HandedOverBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_HandedOverBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t101_ho_head_add->HandedOverBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_HandedOverBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_ho_head_add->HandedOverBy->caption() ?>" data-title="<?php echo $t101_ho_head_add->HandedOverBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_HandedOverBy',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t101_ho_head_add->HandedOverBy->Lookup->getParamTag($t101_ho_head_add, "p_x_HandedOverBy") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_HandedOverBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->HandedOverBy->displayValueSeparatorAttribute() ?>" name="x_HandedOverBy" id="x_HandedOverBy" value="<?php echo $t101_ho_head_add->HandedOverBy->CurrentValue ?>"<?php echo $t101_ho_head_add->HandedOverBy->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->HandedOverBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->CodeNoBy->Visible) { // CodeNoBy ?>
	<div id="r_CodeNoBy" class="form-group row">
		<label id="elh_t101_ho_head_CodeNoBy" for="x_CodeNoBy" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->CodeNoBy->caption() ?><?php echo $t101_ho_head_add->CodeNoBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->CodeNoBy->cellAttributes() ?>>
<span id="el_t101_ho_head_CodeNoBy">
<input type="text" data-table="t101_ho_head" data-field="x_CodeNoBy" name="x_CodeNoBy" id="x_CodeNoBy" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t101_ho_head_add->CodeNoBy->getPlaceHolder()) ?>" value="<?php echo $t101_ho_head_add->CodeNoBy->EditValue ?>"<?php echo $t101_ho_head_add->CodeNoBy->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->CodeNoBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->DepartmentBy->Visible) { // DepartmentBy ?>
	<div id="r_DepartmentBy" class="form-group row">
		<label id="elh_t101_ho_head_DepartmentBy" for="x_DepartmentBy" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->DepartmentBy->caption() ?><?php echo $t101_ho_head_add->DepartmentBy->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->DepartmentBy->cellAttributes() ?>>
<span id="el_t101_ho_head_DepartmentBy">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_DepartmentBy"><?php echo EmptyValue(strval($t101_ho_head_add->DepartmentBy->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->DepartmentBy->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->DepartmentBy->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->DepartmentBy->ReadOnly || $t101_ho_head_add->DepartmentBy->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_DepartmentBy',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_department") && !$t101_ho_head_add->DepartmentBy->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x_DepartmentBy" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t101_ho_head_add->DepartmentBy->caption() ?>" data-title="<?php echo $t101_ho_head_add->DepartmentBy->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x_DepartmentBy',url:'t002_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t101_ho_head_add->DepartmentBy->Lookup->getParamTag($t101_ho_head_add, "p_x_DepartmentBy") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_DepartmentBy" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->DepartmentBy->displayValueSeparatorAttribute() ?>" name="x_DepartmentBy" id="x_DepartmentBy" value="<?php echo $t101_ho_head_add->DepartmentBy->CurrentValue ?>"<?php echo $t101_ho_head_add->DepartmentBy->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->DepartmentBy->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->Sign1->Visible) { // Sign1 ?>
	<div id="r_Sign1" class="form-group row">
		<label id="elh_t101_ho_head_Sign1" for="x_Sign1" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->Sign1->caption() ?><?php echo $t101_ho_head_add->Sign1->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->Sign1->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign1">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign1"><?php echo EmptyValue(strval($t101_ho_head_add->Sign1->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->Sign1->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->Sign1->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->Sign1->ReadOnly || $t101_ho_head_add->Sign1->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign1',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->Sign1->Lookup->getParamTag($t101_ho_head_add, "p_x_Sign1") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign1" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->Sign1->displayValueSeparatorAttribute() ?>" name="x_Sign1" id="x_Sign1" value="<?php echo $t101_ho_head_add->Sign1->CurrentValue ?>"<?php echo $t101_ho_head_add->Sign1->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->Sign1->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->Sign2->Visible) { // Sign2 ?>
	<div id="r_Sign2" class="form-group row">
		<label id="elh_t101_ho_head_Sign2" for="x_Sign2" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->Sign2->caption() ?><?php echo $t101_ho_head_add->Sign2->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->Sign2->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign2">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign2"><?php echo EmptyValue(strval($t101_ho_head_add->Sign2->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->Sign2->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->Sign2->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->Sign2->ReadOnly || $t101_ho_head_add->Sign2->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign2',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->Sign2->Lookup->getParamTag($t101_ho_head_add, "p_x_Sign2") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign2" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->Sign2->displayValueSeparatorAttribute() ?>" name="x_Sign2" id="x_Sign2" value="<?php echo $t101_ho_head_add->Sign2->CurrentValue ?>"<?php echo $t101_ho_head_add->Sign2->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->Sign2->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->Sign3->Visible) { // Sign3 ?>
	<div id="r_Sign3" class="form-group row">
		<label id="elh_t101_ho_head_Sign3" for="x_Sign3" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->Sign3->caption() ?><?php echo $t101_ho_head_add->Sign3->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->Sign3->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign3">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign3"><?php echo EmptyValue(strval($t101_ho_head_add->Sign3->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->Sign3->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->Sign3->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->Sign3->ReadOnly || $t101_ho_head_add->Sign3->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign3',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->Sign3->Lookup->getParamTag($t101_ho_head_add, "p_x_Sign3") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign3" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->Sign3->displayValueSeparatorAttribute() ?>" name="x_Sign3" id="x_Sign3" value="<?php echo $t101_ho_head_add->Sign3->CurrentValue ?>"<?php echo $t101_ho_head_add->Sign3->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->Sign3->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t101_ho_head_add->Sign4->Visible) { // Sign4 ?>
	<div id="r_Sign4" class="form-group row">
		<label id="elh_t101_ho_head_Sign4" for="x_Sign4" class="<?php echo $t101_ho_head_add->LeftColumnClass ?>"><?php echo $t101_ho_head_add->Sign4->caption() ?><?php echo $t101_ho_head_add->Sign4->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t101_ho_head_add->RightColumnClass ?>"><div <?php echo $t101_ho_head_add->Sign4->cellAttributes() ?>>
<span id="el_t101_ho_head_Sign4">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_Sign4"><?php echo EmptyValue(strval($t101_ho_head_add->Sign4->ViewValue)) ? $Language->phrase("PleaseSelect") : $t101_ho_head_add->Sign4->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t101_ho_head_add->Sign4->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t101_ho_head_add->Sign4->ReadOnly || $t101_ho_head_add->Sign4->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_Sign4',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t101_ho_head_add->Sign4->Lookup->getParamTag($t101_ho_head_add, "p_x_Sign4") ?>
<input type="hidden" data-table="t101_ho_head" data-field="x_Sign4" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t101_ho_head_add->Sign4->displayValueSeparatorAttribute() ?>" name="x_Sign4" id="x_Sign4" value="<?php echo $t101_ho_head_add->Sign4->CurrentValue ?>"<?php echo $t101_ho_head_add->Sign4->editAttributes() ?>>
</span>
<?php echo $t101_ho_head_add->Sign4->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t102_ho_detail", explode(",", $t101_ho_head->getCurrentDetailTable())) && $t102_ho_detail->DetailAdd) {
?>
<?php if ($t101_ho_head->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t102_ho_detail", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t102_ho_detailgrid.php" ?>
<?php } ?>
<?php if (!$t101_ho_head_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t101_ho_head_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t101_ho_head_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t101_ho_head_add->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	$(document).ready(function(){$("#elh_t101_ho_head_HandedOverTo").css("color","blue"),$("#elh_t101_ho_head_CodeNoTo").css("color","blue"),$("#elh_t101_ho_head_DepartmentTo").css("color","blue"),$("#elh_t101_ho_head_HandedOverBy").css("color","green"),$("#elh_t101_ho_head_CodeNoBy").css("color","green"),$("#elh_t101_ho_head_DepartmentBy").css("color","green")});
});
</script>
<?php include_once "footer.php"; ?>
<?php
$t101_ho_head_add->terminate();
?>