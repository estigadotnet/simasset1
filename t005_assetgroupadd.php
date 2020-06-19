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
$t005_assetgroup_add = new t005_assetgroup_add();

// Run the page
$t005_assetgroup_add->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_assetgroup_add->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft005_assetgroupadd, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "add";
	ft005_assetgroupadd = currentForm = new ew.Form("ft005_assetgroupadd", "add");

	// Validate form
	ft005_assetgroupadd.validate = function() {
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
			<?php if ($t005_assetgroup_add->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_add->Description->caption(), $t005_assetgroup_add->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_add->EconomicalLifeTime->Required) { ?>
				elm = this.getElements("x" + infix + "_EconomicalLifeTime");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_add->EconomicalLifeTime->caption(), $t005_assetgroup_add->EconomicalLifeTime->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EconomicalLifeTime");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_add->EconomicalLifeTime->errorMessage()) ?>");

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
	ft005_assetgroupadd.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_assetgroupadd.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft005_assetgroupadd");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t005_assetgroup_add->showPageHeader(); ?>
<?php
$t005_assetgroup_add->showMessage();
?>
<form name="ft005_assetgroupadd" id="ft005_assetgroupadd" class="<?php echo $t005_assetgroup_add->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_assetgroup">
<input type="hidden" name="action" id="action" value="insert">
<input type="hidden" name="modal" value="<?php echo (int)$t005_assetgroup_add->IsModal ?>">
<div class="ew-add-div"><!-- page* -->
<?php if ($t005_assetgroup_add->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_t005_assetgroup_Description" for="x_Description" class="<?php echo $t005_assetgroup_add->LeftColumnClass ?>"><?php echo $t005_assetgroup_add->Description->caption() ?><?php echo $t005_assetgroup_add->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_add->RightColumnClass ?>"><div <?php echo $t005_assetgroup_add->Description->cellAttributes() ?>>
<span id="el_t005_assetgroup_Description">
<input type="text" data-table="t005_assetgroup" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t005_assetgroup_add->Description->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_add->Description->EditValue ?>"<?php echo $t005_assetgroup_add->Description->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_add->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_add->EconomicalLifeTime->Visible) { // EconomicalLifeTime ?>
	<div id="r_EconomicalLifeTime" class="form-group row">
		<label id="elh_t005_assetgroup_EconomicalLifeTime" for="x_EconomicalLifeTime" class="<?php echo $t005_assetgroup_add->LeftColumnClass ?>"><?php echo $t005_assetgroup_add->EconomicalLifeTime->caption() ?><?php echo $t005_assetgroup_add->EconomicalLifeTime->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_add->RightColumnClass ?>"><div <?php echo $t005_assetgroup_add->EconomicalLifeTime->cellAttributes() ?>>
<span id="el_t005_assetgroup_EconomicalLifeTime">
<input type="text" data-table="t005_assetgroup" data-field="x_EconomicalLifeTime" name="x_EconomicalLifeTime" id="x_EconomicalLifeTime" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_add->EconomicalLifeTime->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_add->EconomicalLifeTime->EditValue ?>"<?php echo $t005_assetgroup_add->EconomicalLifeTime->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_add->EconomicalLifeTime->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t005_assetgroup_add->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t005_assetgroup_add->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("AddBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t005_assetgroup_add->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t005_assetgroup_add->showPageFooter();
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
$t005_assetgroup_add->terminate();
?>