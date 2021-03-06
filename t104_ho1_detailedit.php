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
$t104_ho1_detail_edit = new t104_ho1_detail_edit();

// Run the page
$t104_ho1_detail_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t104_ho1_detail_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft104_ho1_detailedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft104_ho1_detailedit = currentForm = new ew.Form("ft104_ho1_detailedit", "edit");

	// Validate form
	ft104_ho1_detailedit.validate = function() {
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
			<?php if ($t104_ho1_detail_edit->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t104_ho1_detail_edit->id->caption(), $t104_ho1_detail_edit->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t104_ho1_detail_edit->hohead_id->Required) { ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t104_ho1_detail_edit->hohead_id->caption(), $t104_ho1_detail_edit->hohead_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t104_ho1_detail_edit->hohead_id->errorMessage()) ?>");
			<?php if ($t104_ho1_detail_edit->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t104_ho1_detail_edit->asset_id->caption(), $t104_ho1_detail_edit->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t104_ho1_detail_edit->asset_id->errorMessage()) ?>");

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
	ft104_ho1_detailedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft104_ho1_detailedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft104_ho1_detailedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t104_ho1_detail_edit->showPageHeader(); ?>
<?php
$t104_ho1_detail_edit->showMessage();
?>
<form name="ft104_ho1_detailedit" id="ft104_ho1_detailedit" class="<?php echo $t104_ho1_detail_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t104_ho1_detail">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t104_ho1_detail_edit->IsModal ?>">
<?php if ($t104_ho1_detail->getCurrentMasterTable() == "t103_ho1_head") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t103_ho1_head">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t104_ho1_detail_edit->hohead_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t104_ho1_detail_edit->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label id="elh_t104_ho1_detail_id" class="<?php echo $t104_ho1_detail_edit->LeftColumnClass ?>"><?php echo $t104_ho1_detail_edit->id->caption() ?><?php echo $t104_ho1_detail_edit->id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t104_ho1_detail_edit->RightColumnClass ?>"><div <?php echo $t104_ho1_detail_edit->id->cellAttributes() ?>>
<span id="el_t104_ho1_detail_id">
<span<?php echo $t104_ho1_detail_edit->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_edit->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t104_ho1_detail_edit->id->CurrentValue) ?>">
<?php echo $t104_ho1_detail_edit->id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t104_ho1_detail_edit->hohead_id->Visible) { // hohead_id ?>
	<div id="r_hohead_id" class="form-group row">
		<label id="elh_t104_ho1_detail_hohead_id" for="x_hohead_id" class="<?php echo $t104_ho1_detail_edit->LeftColumnClass ?>"><?php echo $t104_ho1_detail_edit->hohead_id->caption() ?><?php echo $t104_ho1_detail_edit->hohead_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t104_ho1_detail_edit->RightColumnClass ?>"><div <?php echo $t104_ho1_detail_edit->hohead_id->cellAttributes() ?>>
<?php if ($t104_ho1_detail_edit->hohead_id->getSessionValue() != "") { ?>
<span id="el_t104_ho1_detail_hohead_id">
<span<?php echo $t104_ho1_detail_edit->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_edit->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_hohead_id" name="x_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_edit->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t104_ho1_detail_hohead_id">
<input type="text" data-table="t104_ho1_detail" data-field="x_hohead_id" name="x_hohead_id" id="x_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_edit->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_edit->hohead_id->EditValue ?>"<?php echo $t104_ho1_detail_edit->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php echo $t104_ho1_detail_edit->hohead_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t104_ho1_detail_edit->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label id="elh_t104_ho1_detail_asset_id" for="x_asset_id" class="<?php echo $t104_ho1_detail_edit->LeftColumnClass ?>"><?php echo $t104_ho1_detail_edit->asset_id->caption() ?><?php echo $t104_ho1_detail_edit->asset_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t104_ho1_detail_edit->RightColumnClass ?>"><div <?php echo $t104_ho1_detail_edit->asset_id->cellAttributes() ?>>
<span id="el_t104_ho1_detail_asset_id">
<input type="text" data-table="t104_ho1_detail" data-field="x_asset_id" name="x_asset_id" id="x_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_edit->asset_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_edit->asset_id->EditValue ?>"<?php echo $t104_ho1_detail_edit->asset_id->editAttributes() ?>>
</span>
<?php echo $t104_ho1_detail_edit->asset_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t104_ho1_detail_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t104_ho1_detail_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t104_ho1_detail_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t104_ho1_detail_edit->showPageFooter();
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
$t104_ho1_detail_edit->terminate();
?>