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
$t106_disposaldetail_edit = new t106_disposaldetail_edit();

// Run the page
$t106_disposaldetail_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t106_disposaldetail_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft106_disposaldetailedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft106_disposaldetailedit = currentForm = new ew.Form("ft106_disposaldetailedit", "edit");

	// Validate form
	ft106_disposaldetailedit.validate = function() {
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
			<?php if ($t106_disposaldetail_edit->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_edit->asset_id->caption(), $t106_disposaldetail_edit->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t106_disposaldetail_edit->disposaldate->Required) { ?>
				elm = this.getElements("x" + infix + "_disposaldate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_edit->disposaldate->caption(), $t106_disposaldetail_edit->disposaldate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_disposaldate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t106_disposaldetail_edit->disposaldate->errorMessage()) ?>");
			<?php if ($t106_disposaldetail_edit->cond_id->Required) { ?>
				elm = this.getElements("x" + infix + "_cond_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_edit->cond_id->caption(), $t106_disposaldetail_edit->cond_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t106_disposaldetail_edit->reason_id->Required) { ?>
				elm = this.getElements("x" + infix + "_reason_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_edit->reason_id->caption(), $t106_disposaldetail_edit->reason_id->RequiredErrorMessage)) ?>");
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
	ft106_disposaldetailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft106_disposaldetailedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft106_disposaldetailedit.lists["x_asset_id"] = <?php echo $t106_disposaldetail_edit->asset_id->Lookup->toClientList($t106_disposaldetail_edit) ?>;
	ft106_disposaldetailedit.lists["x_asset_id"].options = <?php echo JsonEncode($t106_disposaldetail_edit->asset_id->lookupOptions()) ?>;
	ft106_disposaldetailedit.lists["x_cond_id"] = <?php echo $t106_disposaldetail_edit->cond_id->Lookup->toClientList($t106_disposaldetail_edit) ?>;
	ft106_disposaldetailedit.lists["x_cond_id"].options = <?php echo JsonEncode($t106_disposaldetail_edit->cond_id->lookupOptions()) ?>;
	ft106_disposaldetailedit.lists["x_reason_id"] = <?php echo $t106_disposaldetail_edit->reason_id->Lookup->toClientList($t106_disposaldetail_edit) ?>;
	ft106_disposaldetailedit.lists["x_reason_id"].options = <?php echo JsonEncode($t106_disposaldetail_edit->reason_id->lookupOptions()) ?>;
	loadjs.done("ft106_disposaldetailedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t106_disposaldetail_edit->showPageHeader(); ?>
<?php
$t106_disposaldetail_edit->showMessage();
?>
<form name="ft106_disposaldetailedit" id="ft106_disposaldetailedit" class="<?php echo $t106_disposaldetail_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t106_disposaldetail">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t106_disposaldetail_edit->IsModal ?>">
<?php if ($t106_disposaldetail->getCurrentMasterTable() == "t105_disposalhead") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t105_disposalhead">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t106_disposaldetail_edit->disposalhead_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t106_disposaldetail_edit->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label id="elh_t106_disposaldetail_asset_id" for="x_asset_id" class="<?php echo $t106_disposaldetail_edit->LeftColumnClass ?>"><?php echo $t106_disposaldetail_edit->asset_id->caption() ?><?php echo $t106_disposaldetail_edit->asset_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t106_disposaldetail_edit->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_edit->asset_id->cellAttributes() ?>>
<span id="el_t106_disposaldetail_asset_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_edit->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_edit->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_edit->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_edit->asset_id->ReadOnly || $t106_disposaldetail_edit->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_edit->asset_id->Lookup->getParamTag($t106_disposaldetail_edit, "p_x_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_edit->asset_id->displayValueSeparatorAttribute() ?>" name="x_asset_id" id="x_asset_id" value="<?php echo $t106_disposaldetail_edit->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_edit->asset_id->editAttributes() ?>>
</span>
<?php echo $t106_disposaldetail_edit->asset_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_edit->disposaldate->Visible) { // disposaldate ?>
	<div id="r_disposaldate" class="form-group row">
		<label id="elh_t106_disposaldetail_disposaldate" for="x_disposaldate" class="<?php echo $t106_disposaldetail_edit->LeftColumnClass ?>"><?php echo $t106_disposaldetail_edit->disposaldate->caption() ?><?php echo $t106_disposaldetail_edit->disposaldate->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t106_disposaldetail_edit->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_edit->disposaldate->cellAttributes() ?>>
<span id="el_t106_disposaldetail_disposaldate">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposaldate" data-format="7" name="x_disposaldate" id="x_disposaldate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t106_disposaldetail_edit->disposaldate->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_edit->disposaldate->EditValue ?>"<?php echo $t106_disposaldetail_edit->disposaldate->editAttributes() ?>>
<?php if (!$t106_disposaldetail_edit->disposaldate->ReadOnly && !$t106_disposaldetail_edit->disposaldate->Disabled && !isset($t106_disposaldetail_edit->disposaldate->EditAttrs["readonly"]) && !isset($t106_disposaldetail_edit->disposaldate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft106_disposaldetailedit", "datetimepicker"], function() {
	ew.createDateTimePicker("ft106_disposaldetailedit", "x_disposaldate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php echo $t106_disposaldetail_edit->disposaldate->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_edit->cond_id->Visible) { // cond_id ?>
	<div id="r_cond_id" class="form-group row">
		<label id="elh_t106_disposaldetail_cond_id" for="x_cond_id" class="<?php echo $t106_disposaldetail_edit->LeftColumnClass ?>"><?php echo $t106_disposaldetail_edit->cond_id->caption() ?><?php echo $t106_disposaldetail_edit->cond_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t106_disposaldetail_edit->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_edit->cond_id->cellAttributes() ?>>
<span id="el_t106_disposaldetail_cond_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_edit->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_edit->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_edit->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_edit->cond_id->ReadOnly || $t106_disposaldetail_edit->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_edit->cond_id->Lookup->getParamTag($t106_disposaldetail_edit, "p_x_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_edit->cond_id->displayValueSeparatorAttribute() ?>" name="x_cond_id" id="x_cond_id" value="<?php echo $t106_disposaldetail_edit->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_edit->cond_id->editAttributes() ?>>
</span>
<?php echo $t106_disposaldetail_edit->cond_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t106_disposaldetail_edit->reason_id->Visible) { // reason_id ?>
	<div id="r_reason_id" class="form-group row">
		<label id="elh_t106_disposaldetail_reason_id" for="x_reason_id" class="<?php echo $t106_disposaldetail_edit->LeftColumnClass ?>"><?php echo $t106_disposaldetail_edit->reason_id->caption() ?><?php echo $t106_disposaldetail_edit->reason_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t106_disposaldetail_edit->RightColumnClass ?>"><div <?php echo $t106_disposaldetail_edit->reason_id->cellAttributes() ?>>
<span id="el_t106_disposaldetail_reason_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_edit->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_edit->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_edit->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_edit->reason_id->ReadOnly || $t106_disposaldetail_edit->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_edit->reason_id->Lookup->getParamTag($t106_disposaldetail_edit, "p_x_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_edit->reason_id->displayValueSeparatorAttribute() ?>" name="x_reason_id" id="x_reason_id" value="<?php echo $t106_disposaldetail_edit->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_edit->reason_id->editAttributes() ?>>
</span>
<?php echo $t106_disposaldetail_edit->reason_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t106_disposaldetail" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t106_disposaldetail_edit->id->CurrentValue) ?>">
<?php if (!$t106_disposaldetail_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t106_disposaldetail_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t106_disposaldetail_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t106_disposaldetail_edit->showPageFooter();
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
$t106_disposaldetail_edit->terminate();
?>