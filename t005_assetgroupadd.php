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
			<?php if ($t005_assetgroup_add->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_add->Code->caption(), $t005_assetgroup_add->Code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_add->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_add->Description->caption(), $t005_assetgroup_add->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_add->EstimatedLife->Required) { ?>
				elm = this.getElements("x" + infix + "_EstimatedLife");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_add->EstimatedLife->caption(), $t005_assetgroup_add->EstimatedLife->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EstimatedLife");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_add->EstimatedLife->errorMessage()) ?>");
			<?php if ($t005_assetgroup_add->SLN->Required) { ?>
				elm = this.getElements("x" + infix + "_SLN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_add->SLN->caption(), $t005_assetgroup_add->SLN->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SLN");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_add->SLN->errorMessage()) ?>");

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
<?php if ($t005_assetgroup_add->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label id="elh_t005_assetgroup_Code" for="x_Code" class="<?php echo $t005_assetgroup_add->LeftColumnClass ?>"><?php echo $t005_assetgroup_add->Code->caption() ?><?php echo $t005_assetgroup_add->Code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_add->RightColumnClass ?>"><div <?php echo $t005_assetgroup_add->Code->cellAttributes() ?>>
<span id="el_t005_assetgroup_Code">
<input type="text" data-table="t005_assetgroup" data-field="x_Code" name="x_Code" id="x_Code" size="2" maxlength="5" placeholder="<?php echo HtmlEncode($t005_assetgroup_add->Code->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_add->Code->EditValue ?>"<?php echo $t005_assetgroup_add->Code->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_add->Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
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
<?php if ($t005_assetgroup_add->EstimatedLife->Visible) { // EstimatedLife ?>
	<div id="r_EstimatedLife" class="form-group row">
		<label id="elh_t005_assetgroup_EstimatedLife" for="x_EstimatedLife" class="<?php echo $t005_assetgroup_add->LeftColumnClass ?>"><?php echo $t005_assetgroup_add->EstimatedLife->caption() ?><?php echo $t005_assetgroup_add->EstimatedLife->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_add->RightColumnClass ?>"><div <?php echo $t005_assetgroup_add->EstimatedLife->cellAttributes() ?>>
<span id="el_t005_assetgroup_EstimatedLife">
<input type="text" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="x_EstimatedLife" id="x_EstimatedLife" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_add->EstimatedLife->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_add->EstimatedLife->EditValue ?>"<?php echo $t005_assetgroup_add->EstimatedLife->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_add->EstimatedLife->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t005_assetgroup_add->SLN->Visible) { // SLN ?>
	<div id="r_SLN" class="form-group row">
		<label id="elh_t005_assetgroup_SLN" for="x_SLN" class="<?php echo $t005_assetgroup_add->LeftColumnClass ?>"><?php echo $t005_assetgroup_add->SLN->caption() ?><?php echo $t005_assetgroup_add->SLN->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t005_assetgroup_add->RightColumnClass ?>"><div <?php echo $t005_assetgroup_add->SLN->cellAttributes() ?>>
<span id="el_t005_assetgroup_SLN">
<input type="text" data-table="t005_assetgroup" data-field="x_SLN" name="x_SLN" id="x_SLN" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_add->SLN->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_add->SLN->EditValue ?>"<?php echo $t005_assetgroup_add->SLN->editAttributes() ?>>
</span>
<?php echo $t005_assetgroup_add->SLN->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php
	if (in_array("t007_assettype", explode(",", $t005_assetgroup->getCurrentDetailTable())) && $t007_assettype->DetailAdd) {
?>
<?php if ($t005_assetgroup->getCurrentDetailTable() != "") { ?>
<h4 class="ew-detail-caption"><?php echo $Language->tablePhrase("t007_assettype", "TblCaption") ?></h4>
<?php } ?>
<?php include_once "t007_assettypegrid.php" ?>
<?php } ?>
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