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
$t007_assettype_search = new t007_assettype_search();

// Run the page
$t007_assettype_search->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_assettype_search->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_assettypesearch, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	<?php if ($t007_assettype_search->IsModal) { ?>
	ft007_assettypesearch = currentAdvancedSearchForm = new ew.Form("ft007_assettypesearch", "search");
	<?php } else { ?>
	ft007_assettypesearch = currentForm = new ew.Form("ft007_assettypesearch", "search");
	<?php } ?>
	currentPageID = ew.PAGE_ID = "search";

	// Validate function for search
	ft007_assettypesearch.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t007_assettype_search->id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_assetgroup_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($t007_assettype_search->assetgroup_id->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	ft007_assettypesearch.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_assettypesearch.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft007_assettypesearch.lists["x_assetgroup_id"] = <?php echo $t007_assettype_search->assetgroup_id->Lookup->toClientList($t007_assettype_search) ?>;
	ft007_assettypesearch.lists["x_assetgroup_id"].options = <?php echo JsonEncode($t007_assettype_search->assetgroup_id->lookupOptions()) ?>;
	ft007_assettypesearch.autoSuggests["x_assetgroup_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("ft007_assettypesearch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_assettype_search->showPageHeader(); ?>
<?php
$t007_assettype_search->showMessage();
?>
<form name="ft007_assettypesearch" id="ft007_assettypesearch" class="<?php echo $t007_assettype_search->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_assettype">
<input type="hidden" name="action" id="action" value="search">
<input type="hidden" name="modal" value="<?php echo (int)$t007_assettype_search->IsModal ?>">
<div class="ew-search-div"><!-- page* -->
<?php if ($t007_assettype_search->id->Visible) { // id ?>
	<div id="r_id" class="form-group row">
		<label for="x_id" class="<?php echo $t007_assettype_search->LeftColumnClass ?>"><span id="elh_t007_assettype_id"><?php echo $t007_assettype_search->id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_id" id="z_id" value="=">
</span>
		</label>
		<div class="<?php echo $t007_assettype_search->RightColumnClass ?>"><div <?php echo $t007_assettype_search->id->cellAttributes() ?>>
			<span id="el_t007_assettype_id" class="ew-search-field">
<input type="text" data-table="t007_assettype" data-field="x_id" name="x_id" id="x_id" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_search->id->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_search->id->EditValue ?>"<?php echo $t007_assettype_search->id->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t007_assettype_search->assetgroup_id->Visible) { // assetgroup_id ?>
	<div id="r_assetgroup_id" class="form-group row">
		<label class="<?php echo $t007_assettype_search->LeftColumnClass ?>"><span id="elh_t007_assettype_assetgroup_id"><?php echo $t007_assettype_search->assetgroup_id->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_assetgroup_id" id="z_assetgroup_id" value="=">
</span>
		</label>
		<div class="<?php echo $t007_assettype_search->RightColumnClass ?>"><div <?php echo $t007_assettype_search->assetgroup_id->cellAttributes() ?>>
			<span id="el_t007_assettype_assetgroup_id" class="ew-search-field">
<?php
$onchange = $t007_assettype_search->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_search->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_assetgroup_id" id="sv_x_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_search->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_search->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_search->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_search->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_search->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_search->assetgroup_id->ReadOnly || $t007_assettype_search->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_search->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x_assetgroup_id" id="x_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_search->assetgroup_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypesearch"], function() {
	ft007_assettypesearch.createAutoSuggest({"id":"x_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_search->assetgroup_id->Lookup->getParamTag($t007_assettype_search, "p_x_assetgroup_id") ?>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t007_assettype_search->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label for="x_Description" class="<?php echo $t007_assettype_search->LeftColumnClass ?>"><span id="elh_t007_assettype_Description"><?php echo $t007_assettype_search->Description->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Description" id="z_Description" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t007_assettype_search->RightColumnClass ?>"><div <?php echo $t007_assettype_search->Description->cellAttributes() ?>>
			<span id="el_t007_assettype_Description" class="ew-search-field">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_search->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_search->Description->EditValue ?>"<?php echo $t007_assettype_search->Description->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
<?php if ($t007_assettype_search->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label for="x_Code" class="<?php echo $t007_assettype_search->LeftColumnClass ?>"><span id="elh_t007_assettype_Code"><?php echo $t007_assettype_search->Code->caption() ?></span>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Code" id="z_Code" value="LIKE">
</span>
		</label>
		<div class="<?php echo $t007_assettype_search->RightColumnClass ?>"><div <?php echo $t007_assettype_search->Code->cellAttributes() ?>>
			<span id="el_t007_assettype_Code" class="ew-search-field">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_search->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_search->Code->EditValue ?>"<?php echo $t007_assettype_search->Code->editAttributes() ?>>
</span>
		</div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
<?php if (!$t007_assettype_search->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t007_assettype_search->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("Search") ?></button>
<button class="btn btn-default ew-btn" name="btn-reset" id="btn-reset" type="button" onclick="ew.clearForm(this.form);"><?php echo $Language->phrase("Reset") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t007_assettype_search->showPageFooter();
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
$t007_assettype_search->terminate();
?>