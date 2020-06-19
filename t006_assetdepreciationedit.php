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
$t006_assetdepreciation_edit = new t006_assetdepreciation_edit();

// Run the page
$t006_assetdepreciation_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_assetdepreciation_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft006_assetdepreciationedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft006_assetdepreciationedit = currentForm = new ew.Form("ft006_assetdepreciationedit", "edit");

	// Validate form
	ft006_assetdepreciationedit.validate = function() {
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
			<?php if ($t006_assetdepreciation_edit->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_edit->asset_id->caption(), $t006_assetdepreciation_edit->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_edit->asset_id->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_edit->ListOfYears->Required) { ?>
				elm = this.getElements("x" + infix + "_ListOfYears");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_edit->ListOfYears->caption(), $t006_assetdepreciation_edit->ListOfYears->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ListOfYears");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_edit->ListOfYears->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_edit->NumberOfMonths->Required) { ?>
				elm = this.getElements("x" + infix + "_NumberOfMonths");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_edit->NumberOfMonths->caption(), $t006_assetdepreciation_edit->NumberOfMonths->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NumberOfMonths");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_edit->NumberOfMonths->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_edit->DepreciationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DepreciationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_edit->DepreciationAmount->caption(), $t006_assetdepreciation_edit->DepreciationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DepreciationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_edit->DepreciationAmount->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_edit->DepreciationYtd->Required) { ?>
				elm = this.getElements("x" + infix + "_DepreciationYtd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_edit->DepreciationYtd->caption(), $t006_assetdepreciation_edit->DepreciationYtd->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DepreciationYtd");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_edit->DepreciationYtd->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_edit->NetBookValue->Required) { ?>
				elm = this.getElements("x" + infix + "_NetBookValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_edit->NetBookValue->caption(), $t006_assetdepreciation_edit->NetBookValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NetBookValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_edit->NetBookValue->errorMessage()) ?>");

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
	ft006_assetdepreciationedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft006_assetdepreciationedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft006_assetdepreciationedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t006_assetdepreciation_edit->showPageHeader(); ?>
<?php
$t006_assetdepreciation_edit->showMessage();
?>
<form name="ft006_assetdepreciationedit" id="ft006_assetdepreciationedit" class="<?php echo $t006_assetdepreciation_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_assetdepreciation">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t006_assetdepreciation_edit->IsModal ?>">
<?php if ($t006_assetdepreciation->getCurrentMasterTable() == "t004_asset") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t004_asset">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t006_assetdepreciation_edit->asset_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t006_assetdepreciation_edit->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label id="elh_t006_assetdepreciation_asset_id" for="x_asset_id" class="<?php echo $t006_assetdepreciation_edit->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_edit->asset_id->caption() ?><?php echo $t006_assetdepreciation_edit->asset_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_edit->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_edit->asset_id->cellAttributes() ?>>
<?php if ($t006_assetdepreciation_edit->asset_id->getSessionValue() != "") { ?>
<span id="el_t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_edit->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_edit->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_asset_id" name="x_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_edit->asset_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t006_assetdepreciation_asset_id">
<input type="text" data-table="t006_assetdepreciation" data-field="x_asset_id" name="x_asset_id" id="x_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_edit->asset_id->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_edit->asset_id->EditValue ?>"<?php echo $t006_assetdepreciation_edit->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $t006_assetdepreciation_edit->asset_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_edit->ListOfYears->Visible) { // ListOfYears ?>
	<div id="r_ListOfYears" class="form-group row">
		<label id="elh_t006_assetdepreciation_ListOfYears" for="x_ListOfYears" class="<?php echo $t006_assetdepreciation_edit->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_edit->ListOfYears->caption() ?><?php echo $t006_assetdepreciation_edit->ListOfYears->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_edit->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_edit->ListOfYears->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_ListOfYears">
<input type="text" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="x_ListOfYears" id="x_ListOfYears" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_edit->ListOfYears->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_edit->ListOfYears->EditValue ?>"<?php echo $t006_assetdepreciation_edit->ListOfYears->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_edit->ListOfYears->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_edit->NumberOfMonths->Visible) { // NumberOfMonths ?>
	<div id="r_NumberOfMonths" class="form-group row">
		<label id="elh_t006_assetdepreciation_NumberOfMonths" for="x_NumberOfMonths" class="<?php echo $t006_assetdepreciation_edit->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_edit->NumberOfMonths->caption() ?><?php echo $t006_assetdepreciation_edit->NumberOfMonths->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_edit->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_edit->NumberOfMonths->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_NumberOfMonths">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="x_NumberOfMonths" id="x_NumberOfMonths" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_edit->NumberOfMonths->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_edit->NumberOfMonths->EditValue ?>"<?php echo $t006_assetdepreciation_edit->NumberOfMonths->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_edit->NumberOfMonths->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_edit->DepreciationAmount->Visible) { // DepreciationAmount ?>
	<div id="r_DepreciationAmount" class="form-group row">
		<label id="elh_t006_assetdepreciation_DepreciationAmount" for="x_DepreciationAmount" class="<?php echo $t006_assetdepreciation_edit->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_edit->DepreciationAmount->caption() ?><?php echo $t006_assetdepreciation_edit->DepreciationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_edit->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_edit->DepreciationAmount->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_DepreciationAmount">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="x_DepreciationAmount" id="x_DepreciationAmount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_edit->DepreciationAmount->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_edit->DepreciationAmount->EditValue ?>"<?php echo $t006_assetdepreciation_edit->DepreciationAmount->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_edit->DepreciationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_edit->DepreciationYtd->Visible) { // DepreciationYtd ?>
	<div id="r_DepreciationYtd" class="form-group row">
		<label id="elh_t006_assetdepreciation_DepreciationYtd" for="x_DepreciationYtd" class="<?php echo $t006_assetdepreciation_edit->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_edit->DepreciationYtd->caption() ?><?php echo $t006_assetdepreciation_edit->DepreciationYtd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_edit->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_edit->DepreciationYtd->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_DepreciationYtd">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="x_DepreciationYtd" id="x_DepreciationYtd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_edit->DepreciationYtd->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_edit->DepreciationYtd->EditValue ?>"<?php echo $t006_assetdepreciation_edit->DepreciationYtd->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_edit->DepreciationYtd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_edit->NetBookValue->Visible) { // NetBookValue ?>
	<div id="r_NetBookValue" class="form-group row">
		<label id="elh_t006_assetdepreciation_NetBookValue" for="x_NetBookValue" class="<?php echo $t006_assetdepreciation_edit->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_edit->NetBookValue->caption() ?><?php echo $t006_assetdepreciation_edit->NetBookValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_edit->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_edit->NetBookValue->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_NetBookValue">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="x_NetBookValue" id="x_NetBookValue" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_edit->NetBookValue->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_edit->NetBookValue->EditValue ?>"<?php echo $t006_assetdepreciation_edit->NetBookValue->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_edit->NetBookValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t006_assetdepreciation" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t006_assetdepreciation_edit->id->CurrentValue) ?>">
<?php if (!$t006_assetdepreciation_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t006_assetdepreciation_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_assetdepreciation_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t006_assetdepreciation_edit->showPageFooter();
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
$t006_assetdepreciation_edit->terminate();
?>