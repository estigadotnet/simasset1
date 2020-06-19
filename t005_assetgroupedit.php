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
			<?php if ($t005_assetgroup_edit->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_edit->Description->caption(), $t005_assetgroup_edit->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_edit->EconomicalLifeTime->Required) { ?>
				elm = this.getElements("x" + infix + "_EconomicalLifeTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_edit->EconomicalLifeTime->caption(), $t005_assetgroup_edit->EconomicalLifeTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EconomicalLifeTime");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_edit->EconomicalLifeTime->errorMessage()) ?>");

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
<?php if ($t005_assetgroup_edit->EconomicalLifeTime->Visible) { // EconomicalLifeTime ?>
	<div id="r_EconomicalLifeTime" class="form-group row">
		<label id="elh_t005_assetgroup_EconomicalLifeTime" for="x_EconomicalLifeTime" class="<?php echo $t005_assetgroup_edit->LeftColumnClass ?>"><?php echo $t005_assetgroup_edit->EconomicalLifeTime->caption() ?><?php echo $t005_assetgroup_edit->EconomicalLifeTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_edit->RightColumnClass ?>"><div <?php echo $t005_assetgroup_edit->EconomicalLifeTime->cellAttributes() ?>>
<span id="el_t005_assetgroup_EconomicalLifeTime">
<input type="text" data-table="t005_assetgroup" data-field="x_EconomicalLifeTime" name="x_EconomicalLifeTime" id="x_EconomicalLifeTime" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_edit->EconomicalLifeTime->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_edit->EconomicalLifeTime->EditValue ?>"<?php echo $t005_assetgroup_edit->EconomicalLifeTime->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_edit->EconomicalLifeTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t005_assetgroup" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t005_assetgroup_edit->id->CurrentValue) ?>">
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