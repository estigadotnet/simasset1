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
$t005_assetgroup_edit = new t005_assetgroup_edit();

// Run the page
$t005_assetgroup_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_assetgroup_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_assetgroupedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft005_assetgroupedit = currentForm = new ew.Form("ft005_assetgroupedit", "edit");

	// Validate form
	ft005_assetgroupedit.validate = function() {
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
			<?php if ($t005_assetgroup_edit->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_edit->Code->caption(), $t005_assetgroup_edit->Code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_edit->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_edit->Description->caption(), $t005_assetgroup_edit->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_edit->EstimatedLife->Required) { ?>
				elm = this.getElements("x" + infix + "_EstimatedLife");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_edit->EstimatedLife->caption(), $t005_assetgroup_edit->EstimatedLife->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EstimatedLife");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_edit->EstimatedLife->errorMessage()) ?>");
			<?php if ($t005_assetgroup_edit->SLN->Required) { ?>
				elm = this.getElements("x" + infix + "_SLN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_edit->SLN->caption(), $t005_assetgroup_edit->SLN->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SLN");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_edit->SLN->errorMessage()) ?>");

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
	ft005_assetgroupedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_assetgroupedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft005_assetgroupedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_assetgroup_edit->showPageHeader(); ?>
<?php
$t005_assetgroup_edit->showMessage();
?>
<form name="ft005_assetgroupedit" id="ft005_assetgroupedit" class="<?php echo $t005_assetgroup_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_assetgroup">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t005_assetgroup_edit->IsModal ?>">
<div class="ew-edit-div"><!-- page* -->
<?php if ($t005_assetgroup_edit->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label id="elh_t005_assetgroup_Code" for="x_Code" class="<?php echo $t005_assetgroup_edit->LeftColumnClass ?>"><?php echo $t005_assetgroup_edit->Code->caption() ?><?php echo $t005_assetgroup_edit->Code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_edit->RightColumnClass ?>"><div <?php echo $t005_assetgroup_edit->Code->cellAttributes() ?>>
<span id="el_t005_assetgroup_Code">
<input type="text" data-table="t005_assetgroup" data-field="x_Code" name="x_Code" id="x_Code" size="2" maxlength="5" placeholder="<?php echo HtmlEncode($t005_assetgroup_edit->Code->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_edit->Code->EditValue ?>"<?php echo $t005_assetgroup_edit->Code->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_edit->Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_edit->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_t005_assetgroup_Description" for="x_Description" class="<?php echo $t005_assetgroup_edit->LeftColumnClass ?>"><?php echo $t005_assetgroup_edit->Description->caption() ?><?php echo $t005_assetgroup_edit->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_edit->RightColumnClass ?>"><div <?php echo $t005_assetgroup_edit->Description->cellAttributes() ?>>
<span id="el_t005_assetgroup_Description">
<input type="text" data-table="t005_assetgroup" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t005_assetgroup_edit->Description->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_edit->Description->EditValue ?>"<?php echo $t005_assetgroup_edit->Description->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_edit->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_edit->EstimatedLife->Visible) { // EstimatedLife ?>
	<div id="r_EstimatedLife" class="form-group row">
		<label id="elh_t005_assetgroup_EstimatedLife" for="x_EstimatedLife" class="<?php echo $t005_assetgroup_edit->LeftColumnClass ?>"><?php echo $t005_assetgroup_edit->EstimatedLife->caption() ?><?php echo $t005_assetgroup_edit->EstimatedLife->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_edit->RightColumnClass ?>"><div <?php echo $t005_assetgroup_edit->EstimatedLife->cellAttributes() ?>>
<span id="el_t005_assetgroup_EstimatedLife">
<input type="text" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="x_EstimatedLife" id="x_EstimatedLife" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_edit->EstimatedLife->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_edit->EstimatedLife->EditValue ?>"<?php echo $t005_assetgroup_edit->EstimatedLife->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_edit->EstimatedLife->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_edit->SLN->Visible) { // SLN ?>
	<div id="r_SLN" class="form-group row">
		<label id="elh_t005_assetgroup_SLN" for="x_SLN" class="<?php echo $t005_assetgroup_edit->LeftColumnClass ?>"><?php echo $t005_assetgroup_edit->SLN->caption() ?><?php echo $t005_assetgroup_edit->SLN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_edit->RightColumnClass ?>"><div <?php echo $t005_assetgroup_edit->SLN->cellAttributes() ?>>
<span id="el_t005_assetgroup_SLN">
<input type="text" data-table="t005_assetgroup" data-field="x_SLN" name="x_SLN" id="x_SLN" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_edit->SLN->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_edit->SLN->EditValue ?>"<?php echo $t005_assetgroup_edit->SLN->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_edit->SLN->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t005_assetgroup" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t005_assetgroup_edit->id->CurrentValue) ?>">
<?php
	if (in_array("t007_assettype", explode(",", $t005_assetgroup->getCurrentDetailTable())) && $t007_assettype->DetailEdit) {
?>
<?php if ($t005_assetgroup->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t007_assettype", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t007_assettypegrid.php" ?>
<?php } ?>
<?php if (!$t005_assetgroup_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t005_assetgroup_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_assetgroup_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t005_assetgroup_edit->showPageFooter();
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
$t005_assetgroup_edit->terminate();
?>