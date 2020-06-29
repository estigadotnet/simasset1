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
$t008_brand_addopt = new t008_brand_addopt();

// Run the page
$t008_brand_addopt->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t008_brand_addopt->Page_Render();
?>
<script>
var ft008_brandaddopt, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "addopt";
	ft008_brandaddopt = currentForm = new ew.Form("ft008_brandaddopt", "addopt");

	// Validate form
	ft008_brandaddopt.validate = function() {
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
			<?php if ($t008_brand_addopt->Brand->Required) { ?>
				elm = this.getElements("x" + infix + "_Brand");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t008_brand_addopt->Brand->caption(), $t008_brand_addopt->Brand->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft008_brandaddopt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft008_brandaddopt.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft008_brandaddopt");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t008_brand_addopt->showPageHeader(); ?>
<?php
$t008_brand_addopt->showMessage();
?>
<form name="ft008_brandaddopt" id="ft008_brandaddopt" class="ew-form ew-horizontal" action="<?php echo Config("API_URL") ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="<?php echo Config("API_ACTION_NAME") ?>" id="<?php echo Config("API_ACTION_NAME") ?>" value="<?php echo Config("API_ADD_ACTION") ?>">
<input type="hidden" name="<?php echo Config("API_OBJECT_NAME") ?>" id="<?php echo Config("API_OBJECT_NAME") ?>" value="<?php echo $t008_brand_addopt->TableVar ?>">
<input type="hidden" name="addopt" id="addopt" value="1">
<?php if ($t008_brand_addopt->Brand->Visible) { // Brand ?>
	<div class="form-group row">
		<label class="col-sm-2 col-form-label ew-label" for="x_Brand"><?php echo $t008_brand_addopt->Brand->caption() ?><?php echo $t008_brand_addopt->Brand->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="col-sm-10">
<input type="text" data-table="t008_brand" data-field="x_Brand" name="x_Brand" id="x_Brand" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t008_brand_addopt->Brand->getPlaceHolder()) ?>" value="<?php echo $t008_brand_addopt->Brand->EditValue ?>"<?php echo $t008_brand_addopt->Brand->editAttributes() ?>>
</div>
	</div>
<?php } ?>
</form>
<?php
$t008_brand_addopt->showPageFooter();
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
$t008_brand_addopt->terminate();
?>