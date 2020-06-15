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
$t102_ho_detail_search = new t102_ho_detail_search();

// Run the page
$t102_ho_detail_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft102_ho_detailsearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t102_ho_detail_search->IsModal) { ?>
	ft102_ho_detailsearch = currentAdvancedSearchForm = new ew.Form("ft102_ho_detailsearch", "search");
	<?php } else { ?>
	ft102_ho_detailsearch = currentForm = new ew.Form("ft102_ho_detailsearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft102_ho_detailsearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft102_ho_detailsearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_ho_detailsearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_ho_detailsearch.lists["x_asset_id"] = <?php echo $t102_ho_detail_search->asset_id->Lookup->toClientList($t102_ho_detail_search) ?>;
	ft102_ho_detailsearch.lists["x_asset_id"].options = <?php echo JsonEncode($t102_ho_detail_search->asset_id->lookupOptions()) ?>;
	loadjs.done("ft102_ho_detailsearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t102_ho_detail_search->showPageHeader(); ?>
<?php
$t102_ho_detail_search->showMessage();
?>
<form name="ft102_ho_detailsearch" id="ft102_ho_detailsearch" class="<?php echo $t102_ho_detail_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_ho_detail">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t102_ho_detail_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t102_ho_detail_search->asset_id->Visible) { // asset_id ?>
	<div id="r_asset_id" class="form-group row">
		<label for="x_asset_id" class="<?php echo $t102_ho_detail_search->LeftColumnClass ?>"><span id="elh_t102_ho_detail_asset_id"><?php echo $t102_ho_detail_search->asset_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_asset_id" id="z_asset_id" value="=">
</span>
		</label>
		<div class="<?php echo $t102_ho_detail_search->RightColumnClass ?>"><div <?php echo $t102_ho_detail_search->asset_id->cellAttributes() ?>>
			<span id="el_t102_ho_detail_asset_id" class="ew-search-field">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x_asset_id"><?php echo EmptyValue(strval($t102_ho_detail_search->asset_id->AdvancedSearch->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_ho_detail_search->asset_id->AdvancedSearch->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_ho_detail_search->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_ho_detail_search->asset_id->ReadOnly || $t102_ho_detail_search->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_ho_detail_search->asset_id->Lookup->getParamTag($t102_ho_detail_search, "p_x_asset_id") ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_ho_detail_search->asset_id->displayValueSeparatorAttribute() ?>" name="x_asset_id" id="x_asset_id" value="<?php echo $t102_ho_detail_search->asset_id->AdvancedSearch->SearchValue ?>"<?php echo $t102_ho_detail_search->asset_id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t102_ho_detail_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t102_ho_detail_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t102_ho_detail_search->showPageFooter();
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
$t102_ho_detail_search->terminate();
?>