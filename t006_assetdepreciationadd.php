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
$t006_assetdepreciation_add = new t006_assetdepreciation_add();

// Run the page
$t006_assetdepreciation_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_assetdepreciation_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft006_assetdepreciationadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft006_assetdepreciationadd = currentForm = new ew.Form("ft006_assetdepreciationadd", "add");

	// Validate form
	ft006_assetdepreciationadd.validate = function() {
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
			<?php if ($t006_assetdepreciation_add->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_add->asset_id->caption(), $t006_assetdepreciation_add->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_add->asset_id->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_add->ListOfYears->Required) { ?>
				elm = this.getElements("x" + infix + "_ListOfYears");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_add->ListOfYears->caption(), $t006_assetdepreciation_add->ListOfYears->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ListOfYears");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_add->ListOfYears->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_add->NumberOfMonths->Required) { ?>
				elm = this.getElements("x" + infix + "_NumberOfMonths");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_add->NumberOfMonths->caption(), $t006_assetdepreciation_add->NumberOfMonths->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NumberOfMonths");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_add->NumberOfMonths->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_add->DepreciationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DepreciationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_add->DepreciationAmount->caption(), $t006_assetdepreciation_add->DepreciationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DepreciationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_add->DepreciationAmount->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_add->DepreciationYtd->Required) { ?>
				elm = this.getElements("x" + infix + "_DepreciationYtd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_add->DepreciationYtd->caption(), $t006_assetdepreciation_add->DepreciationYtd->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DepreciationYtd");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_add->DepreciationYtd->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_add->NetBookValue->Required) { ?>
				elm = this.getElements("x" + infix + "_NetBookValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_add->NetBookValue->caption(), $t006_assetdepreciation_add->NetBookValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NetBookValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_add->NetBookValue->errorMessage()) ?>");

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
	ft006_assetdepreciationadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft006_assetdepreciationadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft006_assetdepreciationadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t006_assetdepreciation_add->showPageHeader(); ?>
<?php
$t006_assetdepreciation_add->showMessage();
?>
<form name="ft006_assetdepreciationadd" id="ft006_assetdepreciationadd" class="<?php echo $t006_assetdepreciation_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_assetdepreciation">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t006_assetdepreciation_add->IsModal ?>">
<?php if ($t006_assetdepreciation->getCurrentMasterTable() == "t004_asset") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t004_asset">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t006_assetdepreciation_add->asset_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-add-div"><!-- page* -->
<?php if ($t006_assetdepreciation_add->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label id="elh_t006_assetdepreciation_asset_id" for="x_asset_id" class="<?php echo $t006_assetdepreciation_add->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_add->asset_id->caption() ?><?php echo $t006_assetdepreciation_add->asset_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_add->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_add->asset_id->cellAttributes() ?>>
<?php if ($t006_assetdepreciation_add->asset_id->getSessionValue() != "") { ?>
<span id="el_t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_add->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_add->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_asset_id" name="x_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_add->asset_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t006_assetdepreciation_asset_id">
<input type="text" data-table="t006_assetdepreciation" data-field="x_asset_id" name="x_asset_id" id="x_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_add->asset_id->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_add->asset_id->EditValue ?>"<?php echo $t006_assetdepreciation_add->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $t006_assetdepreciation_add->asset_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_add->ListOfYears->Visible) { // ListOfYears ?>
	<div id="r_ListOfYears" class="form-group row">
		<label id="elh_t006_assetdepreciation_ListOfYears" for="x_ListOfYears" class="<?php echo $t006_assetdepreciation_add->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_add->ListOfYears->caption() ?><?php echo $t006_assetdepreciation_add->ListOfYears->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_add->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_add->ListOfYears->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_ListOfYears">
<input type="text" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="x_ListOfYears" id="x_ListOfYears" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_add->ListOfYears->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_add->ListOfYears->EditValue ?>"<?php echo $t006_assetdepreciation_add->ListOfYears->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_add->ListOfYears->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_add->NumberOfMonths->Visible) { // NumberOfMonths ?>
	<div id="r_NumberOfMonths" class="form-group row">
		<label id="elh_t006_assetdepreciation_NumberOfMonths" for="x_NumberOfMonths" class="<?php echo $t006_assetdepreciation_add->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_add->NumberOfMonths->caption() ?><?php echo $t006_assetdepreciation_add->NumberOfMonths->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_add->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_add->NumberOfMonths->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_NumberOfMonths">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="x_NumberOfMonths" id="x_NumberOfMonths" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_add->NumberOfMonths->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_add->NumberOfMonths->EditValue ?>"<?php echo $t006_assetdepreciation_add->NumberOfMonths->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_add->NumberOfMonths->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_add->DepreciationAmount->Visible) { // DepreciationAmount ?>
	<div id="r_DepreciationAmount" class="form-group row">
		<label id="elh_t006_assetdepreciation_DepreciationAmount" for="x_DepreciationAmount" class="<?php echo $t006_assetdepreciation_add->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_add->DepreciationAmount->caption() ?><?php echo $t006_assetdepreciation_add->DepreciationAmount->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_add->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_add->DepreciationAmount->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_DepreciationAmount">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="x_DepreciationAmount" id="x_DepreciationAmount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_add->DepreciationAmount->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_add->DepreciationAmount->EditValue ?>"<?php echo $t006_assetdepreciation_add->DepreciationAmount->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_add->DepreciationAmount->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_add->DepreciationYtd->Visible) { // DepreciationYtd ?>
	<div id="r_DepreciationYtd" class="form-group row">
		<label id="elh_t006_assetdepreciation_DepreciationYtd" for="x_DepreciationYtd" class="<?php echo $t006_assetdepreciation_add->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_add->DepreciationYtd->caption() ?><?php echo $t006_assetdepreciation_add->DepreciationYtd->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_add->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_add->DepreciationYtd->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_DepreciationYtd">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="x_DepreciationYtd" id="x_DepreciationYtd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_add->DepreciationYtd->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_add->DepreciationYtd->EditValue ?>"<?php echo $t006_assetdepreciation_add->DepreciationYtd->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_add->DepreciationYtd->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t006_assetdepreciation_add->NetBookValue->Visible) { // NetBookValue ?>
	<div id="r_NetBookValue" class="form-group row">
		<label id="elh_t006_assetdepreciation_NetBookValue" for="x_NetBookValue" class="<?php echo $t006_assetdepreciation_add->LeftColumnClass ?>"><?php echo $t006_assetdepreciation_add->NetBookValue->caption() ?><?php echo $t006_assetdepreciation_add->NetBookValue->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t006_assetdepreciation_add->RightColumnClass ?>"><div <?php echo $t006_assetdepreciation_add->NetBookValue->cellAttributes() ?>>
<span id="el_t006_assetdepreciation_NetBookValue">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="x_NetBookValue" id="x_NetBookValue" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_add->NetBookValue->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_add->NetBookValue->EditValue ?>"<?php echo $t006_assetdepreciation_add->NetBookValue->editAttributes() ?>>
</span>
<?php echo $t006_assetdepreciation_add->NetBookValue->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t006_assetdepreciation_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t006_assetdepreciation_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t006_assetdepreciation_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t006_assetdepreciation_add->showPageFooter();
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
$t006_assetdepreciation_add->terminate();
?>