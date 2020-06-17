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
$t001_property_addopt = new t001_property_addopt();

// Run the page
$t001_property_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t001_property_addopt->Page_Render();
?>
<script>
var ft001_propertyaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	ft001_propertyaddopt = currentForm = new ew.Form("ft001_propertyaddopt", "addopt");

	// Validate form
	ft001_propertyaddopt.validate = function() {
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
			<?php if ($t001_property_addopt->Property->Required) { ?>
				elm = this.getElements("x" + infix + "_Property");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_property_addopt->Property->caption(), $t001_property_addopt->Property->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t001_property_addopt->TemplateFile->Required) { ?>
				elm = this.getElements("x" + infix + "_TemplateFile");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t001_property_addopt->TemplateFile->caption(), $t001_property_addopt->TemplateFile->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft001_propertyaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft001_propertyaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft001_propertyaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t001_property_addopt->showPageHeader(); ?>
<?php
$t001_property_addopt->showMessage();
?>
<form name="ft001_propertyaddopt" id="ft001_propertyaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $t001_property_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($t001_property_addopt->Property->Visible) { // Property ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Property"><?php echo $t001_property_addopt->Property->caption() ?><?php echo $t001_property_addopt->Property->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_property" data-field="x_Property" name="x_Property" id="x_Property" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_property_addopt->Property->getPlaceHolder()) ?>" value="<?php echo $t001_property_addopt->Property->EditValue ?>"<?php echo $t001_property_addopt->Property->editAttributes() ?>>
</div>
	</div>
<?php } ?>
<?php if ($t001_property_addopt->TemplateFile->Visible) { // TemplateFile ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_TemplateFile"><?php echo $t001_property_addopt->TemplateFile->caption() ?><?php echo $t001_property_addopt->TemplateFile->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t001_property" data-field="x_TemplateFile" name="x_TemplateFile" id="x_TemplateFile" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t001_property_addopt->TemplateFile->getPlaceHolder()) ?>" value="<?php echo $t001_property_addopt->TemplateFile->EditValue ?>"<?php echo $t001_property_addopt->TemplateFile->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$t001_property_addopt->showPageFooter();
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
<?php
$t001_property_addopt->terminate();
?>