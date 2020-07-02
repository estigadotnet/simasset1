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
$r001_asset_summary = new r001_asset_summary();

// Run the page
$r001_asset_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r001_asset_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
<script>
var fsummary, currentPageID;
loadjs.ready("head", function() {

	// Form object for search
	fsummary = currentForm = new ew.Form("fsummary", "summary");
	currentPageID = ew.PAGE_ID = "summary";

	// Validate function for search
	fsummary.validate = function(fobj) {
		if (!this.validateRequired)
			return true; // Ignore validation
		fobj = fobj || this._form;
		var infix = "";
		elm = this.getElements("x" + infix + "_property_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->property_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_group_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->group_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_brand_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->brand_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_type_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->type_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_signature_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->signature_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_department_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->department_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_location_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->location_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_cond_id");
		if (elm && !ew.checkInteger(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->cond_id->errorMessage()) ?>");
		elm = this.getElements("x" + infix + "_ProcurementDate");
		if (elm && !ew.checkEuroDate(elm.value))
			return this.onError(elm, "<?php echo JsEncode($r001_asset_summary->ProcurementDate->errorMessage()) ?>");

		// Call Form_CustomValidate event
		if (!this.Form_CustomValidate(fobj))
			return false;
		return true;
	}

	// Form_CustomValidate
	fsummary.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	fsummary.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	fsummary.lists["x_property_id"] = <?php echo $r001_asset_summary->property_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_property_id"].options = <?php echo JsonEncode($r001_asset_summary->property_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_property_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fsummary.lists["x_group_id"] = <?php echo $r001_asset_summary->group_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_group_id"].options = <?php echo JsonEncode($r001_asset_summary->group_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_group_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fsummary.lists["x_brand_id"] = <?php echo $r001_asset_summary->brand_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_brand_id"].options = <?php echo JsonEncode($r001_asset_summary->brand_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_brand_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fsummary.lists["x_type_id"] = <?php echo $r001_asset_summary->type_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_type_id"].options = <?php echo JsonEncode($r001_asset_summary->type_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_type_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fsummary.lists["x_signature_id"] = <?php echo $r001_asset_summary->signature_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_signature_id"].options = <?php echo JsonEncode($r001_asset_summary->signature_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_signature_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fsummary.lists["x_department_id"] = <?php echo $r001_asset_summary->department_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_department_id"].options = <?php echo JsonEncode($r001_asset_summary->department_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_department_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fsummary.lists["x_location_id"] = <?php echo $r001_asset_summary->location_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_location_id"].options = <?php echo JsonEncode($r001_asset_summary->location_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_location_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	fsummary.lists["x_cond_id"] = <?php echo $r001_asset_summary->cond_id->Lookup->toClientList($r001_asset_summary) ?>;
	fsummary.lists["x_cond_id"].options = <?php echo JsonEncode($r001_asset_summary->cond_id->lookupOptions()) ?>;
	fsummary.autoSuggests["x_cond_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;

	// Filters
	fsummary.filterList = <?php echo $r001_asset_summary->getFilterList() ?>;
	loadjs.done("fsummary");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<?php if ($r001_asset_summary->ShowCurrentFilter) { ?>
<?php $r001_asset_summary->showFilterList() ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r001_asset_summary->DrillDownInPanel) {
	$r001_asset_summary->ExportOptions->render("body");
	$r001_asset_summary->SearchOptions->render("body");
	$r001_asset_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r001_asset_summary->showPageHeader(); ?>
<?php
$r001_asset_summary->showMessage();
?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r001_asset_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$r001_asset_summary->isExport() && !$r001_asset->CurrentAction) { ?>
<form name="fsummary" id="fsummary" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fsummary-search-panel" class="<?php echo $r001_asset_summary->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="r001_asset">
	<div class="ew-extended-search">
<?php

// Render search row
$r001_asset->RowType = ROWTYPE_SEARCH;
$r001_asset->resetAttributes();
$r001_asset_summary->renderRow();
?>
<?php if ($r001_asset_summary->property_id->Visible) { // property_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_property_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->property_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_property_id" id="z_property_id" value="=">
</span>
		<span id="el_r001_asset_property_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->property_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->property_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_property_id">
	<input type="text" class="form-control" name="sv_x_property_id" id="sv_x_property_id" value="<?php echo RemoveHtml($r001_asset_summary->property_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->property_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->property_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->property_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_property_id" data-value-separator="<?php echo $r001_asset_summary->property_id->displayValueSeparatorAttribute() ?>" name="x_property_id" id="x_property_id" value="<?php echo HtmlEncode($r001_asset_summary->property_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_property_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->property_id->Lookup->getParamTag($r001_asset_summary, "p_x_property_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->group_id->Visible) { // group_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_group_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->group_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_group_id" id="z_group_id" value="=">
</span>
		<span id="el_r001_asset_group_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->group_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->group_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_group_id">
	<input type="text" class="form-control" name="sv_x_group_id" id="sv_x_group_id" value="<?php echo RemoveHtml($r001_asset_summary->group_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->group_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->group_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->group_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_group_id" data-value-separator="<?php echo $r001_asset_summary->group_id->displayValueSeparatorAttribute() ?>" name="x_group_id" id="x_group_id" value="<?php echo HtmlEncode($r001_asset_summary->group_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_group_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->group_id->Lookup->getParamTag($r001_asset_summary, "p_x_group_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Code->Visible) { // Code ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Code" class="ew-cell form-group">
		<label for="x_Code" class="ew-search-caption ew-label"><?php echo $r001_asset_summary->Code->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Code" id="z_Code" value="LIKE">
</span>
		<span id="el_r001_asset_Code" class="ew-search-field">
<input type="text" data-table="r001_asset" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($r001_asset_summary->Code->getPlaceHolder()) ?>" value="<?php echo $r001_asset_summary->Code->EditValue ?>"<?php echo $r001_asset_summary->Code->editAttributes() ?>>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Description->Visible) { // Description ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Description" class="ew-cell form-group">
		<label for="x_Description" class="ew-search-caption ew-label"><?php echo $r001_asset_summary->Description->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Description" id="z_Description" value="LIKE">
</span>
		<span id="el_r001_asset_Description" class="ew-search-field">
<input type="text" data-table="r001_asset" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($r001_asset_summary->Description->getPlaceHolder()) ?>" value="<?php echo $r001_asset_summary->Description->EditValue ?>"<?php echo $r001_asset_summary->Description->editAttributes() ?>>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->brand_id->Visible) { // brand_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_brand_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->brand_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_brand_id" id="z_brand_id" value="=">
</span>
		<span id="el_r001_asset_brand_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->brand_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->brand_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_brand_id">
	<input type="text" class="form-control" name="sv_x_brand_id" id="sv_x_brand_id" value="<?php echo RemoveHtml($r001_asset_summary->brand_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->brand_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->brand_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->brand_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_brand_id" data-value-separator="<?php echo $r001_asset_summary->brand_id->displayValueSeparatorAttribute() ?>" name="x_brand_id" id="x_brand_id" value="<?php echo HtmlEncode($r001_asset_summary->brand_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_brand_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->brand_id->Lookup->getParamTag($r001_asset_summary, "p_x_brand_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->type_id->Visible) { // type_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_type_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->type_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_type_id" id="z_type_id" value="=">
</span>
		<span id="el_r001_asset_type_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->type_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->type_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_type_id">
	<input type="text" class="form-control" name="sv_x_type_id" id="sv_x_type_id" value="<?php echo RemoveHtml($r001_asset_summary->type_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->type_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->type_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->type_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_type_id" data-value-separator="<?php echo $r001_asset_summary->type_id->displayValueSeparatorAttribute() ?>" name="x_type_id" id="x_type_id" value="<?php echo HtmlEncode($r001_asset_summary->type_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_type_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->type_id->Lookup->getParamTag($r001_asset_summary, "p_x_type_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->signature_id->Visible) { // signature_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_signature_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->signature_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_signature_id" id="z_signature_id" value="=">
</span>
		<span id="el_r001_asset_signature_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->signature_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->signature_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_signature_id">
	<input type="text" class="form-control" name="sv_x_signature_id" id="sv_x_signature_id" value="<?php echo RemoveHtml($r001_asset_summary->signature_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->signature_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->signature_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->signature_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_signature_id" data-value-separator="<?php echo $r001_asset_summary->signature_id->displayValueSeparatorAttribute() ?>" name="x_signature_id" id="x_signature_id" value="<?php echo HtmlEncode($r001_asset_summary->signature_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_signature_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->signature_id->Lookup->getParamTag($r001_asset_summary, "p_x_signature_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->department_id->Visible) { // department_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_department_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->department_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_department_id" id="z_department_id" value="=">
</span>
		<span id="el_r001_asset_department_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->department_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->department_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_department_id">
	<input type="text" class="form-control" name="sv_x_department_id" id="sv_x_department_id" value="<?php echo RemoveHtml($r001_asset_summary->department_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->department_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->department_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->department_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_department_id" data-value-separator="<?php echo $r001_asset_summary->department_id->displayValueSeparatorAttribute() ?>" name="x_department_id" id="x_department_id" value="<?php echo HtmlEncode($r001_asset_summary->department_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_department_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->department_id->Lookup->getParamTag($r001_asset_summary, "p_x_department_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->location_id->Visible) { // location_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_location_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->location_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_location_id" id="z_location_id" value="=">
</span>
		<span id="el_r001_asset_location_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->location_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->location_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_location_id">
	<input type="text" class="form-control" name="sv_x_location_id" id="sv_x_location_id" value="<?php echo RemoveHtml($r001_asset_summary->location_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->location_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->location_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->location_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_location_id" data-value-separator="<?php echo $r001_asset_summary->location_id->displayValueSeparatorAttribute() ?>" name="x_location_id" id="x_location_id" value="<?php echo HtmlEncode($r001_asset_summary->location_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_location_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->location_id->Lookup->getParamTag($r001_asset_summary, "p_x_location_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->cond_id->Visible) { // cond_id ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_cond_id" class="ew-cell form-group">
		<label class="ew-search-caption ew-label"><?php echo $r001_asset_summary->cond_id->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_cond_id" id="z_cond_id" value="=">
</span>
		<span id="el_r001_asset_cond_id" class="ew-search-field">
<?php
$onchange = $r001_asset_summary->cond_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$r001_asset_summary->cond_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_cond_id">
	<input type="text" class="form-control" name="sv_x_cond_id" id="sv_x_cond_id" value="<?php echo RemoveHtml($r001_asset_summary->cond_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($r001_asset_summary->cond_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($r001_asset_summary->cond_id->getPlaceHolder()) ?>"<?php echo $r001_asset_summary->cond_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="r001_asset" data-field="x_cond_id" data-value-separator="<?php echo $r001_asset_summary->cond_id->displayValueSeparatorAttribute() ?>" name="x_cond_id" id="x_cond_id" value="<?php echo HtmlEncode($r001_asset_summary->cond_id->AdvancedSearch->SearchValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["fsummary"], function() {
	fsummary.createAutoSuggest({"id":"x_cond_id","forceSelect":false});
});
</script>
<?php echo $r001_asset_summary->cond_id->Lookup->getParamTag($r001_asset_summary, "p_x_cond_id") ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Remarks->Visible) { // Remarks ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_Remarks" class="ew-cell form-group">
		<label for="x_Remarks" class="ew-search-caption ew-label"><?php echo $r001_asset_summary->Remarks->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("LIKE") ?>
<input type="hidden" name="z_Remarks" id="z_Remarks" value="LIKE">
</span>
		<span id="el_r001_asset_Remarks" class="ew-search-field">
<input type="text" data-table="r001_asset" data-field="x_Remarks" name="x_Remarks" id="x_Remarks" size="35" maxlength="65535" placeholder="<?php echo HtmlEncode($r001_asset_summary->Remarks->getPlaceHolder()) ?>" value="<?php echo $r001_asset_summary->Remarks->EditValue ?>"<?php echo $r001_asset_summary->Remarks->editAttributes() ?>>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementDate->Visible) { // ProcurementDate ?>
	<?php
		$r001_asset_summary->SearchColumnCount++;
		if (($r001_asset_summary->SearchColumnCount - 1) % $r001_asset_summary->SearchFieldsPerRow == 0) {
			$r001_asset_summary->SearchRowCount++;
	?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount ?>" class="ew-row d-sm-flex">
	<?php
		}
	 ?>
	<div id="xsc_ProcurementDate" class="ew-cell form-group">
		<label for="x_ProcurementDate" class="ew-search-caption ew-label"><?php echo $r001_asset_summary->ProcurementDate->caption() ?></label>
		<span class="ew-search-operator">
<?php echo $Language->phrase("=") ?>
<input type="hidden" name="z_ProcurementDate" id="z_ProcurementDate" value="=">
</span>
		<span id="el_r001_asset_ProcurementDate" class="ew-search-field">
<input type="text" data-table="r001_asset" data-field="x_ProcurementDate" data-format="7" name="x_ProcurementDate" id="x_ProcurementDate" maxlength="10" placeholder="<?php echo HtmlEncode($r001_asset_summary->ProcurementDate->getPlaceHolder()) ?>" value="<?php echo $r001_asset_summary->ProcurementDate->EditValue ?>"<?php echo $r001_asset_summary->ProcurementDate->editAttributes() ?>>
<?php if (!$r001_asset_summary->ProcurementDate->ReadOnly && !$r001_asset_summary->ProcurementDate->Disabled && !isset($r001_asset_summary->ProcurementDate->EditAttrs["readonly"]) && !isset($r001_asset_summary->ProcurementDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["fsummary", "datetimepicker"], function() {
	ew.createDateTimePicker("fsummary", "x_ProcurementDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
	</div>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow == 0) { ?>
</div>
	<?php } ?>
<?php } ?>
	<?php if ($r001_asset_summary->SearchColumnCount % $r001_asset_summary->SearchFieldsPerRow > 0) { ?>
</div>
	<?php } ?>
<div id="xsr_<?php echo $r001_asset_summary->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php } ?>
<?php
while ($r001_asset_summary->GroupCount <= count($r001_asset_summary->GroupRecords) && $r001_asset_summary->GroupCount <= $r001_asset_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r001_asset_summary->ShowHeader) {
?>
<?php if ($r001_asset_summary->GroupCount > 1) { ?>
</tbody>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r001_asset_summary->isExport() && !($r001_asset_summary->DrillDown && $r001_asset_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r001_asset_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php echo $r001_asset_summary->PageBreakContent ?>
<?php } ?>
<div class="<?php if (!$r001_asset_summary->isExport("word") && !$r001_asset_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r001_asset_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_r001_asset" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r001_asset_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r001_asset_summary->property_id->Visible) { ?>
	<?php if ($r001_asset_summary->property_id->ShowGroupHeaderAsRow) { ?>
	<th data-name="property_id">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->property_id) == "") { ?>
	<th data-name="property_id" class="<?php echo $r001_asset_summary->property_id->headerCellClass() ?>"><div class="r001_asset_property_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="property_id" class="<?php echo $r001_asset_summary->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->property_id) ?>', 2);"><div class="r001_asset_property_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->group_id->Visible) { ?>
	<?php if ($r001_asset_summary->group_id->ShowGroupHeaderAsRow) { ?>
	<th data-name="group_id">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->group_id) == "") { ?>
	<th data-name="group_id" class="<?php echo $r001_asset_summary->group_id->headerCellClass() ?>"><div class="r001_asset_group_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->group_id->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="group_id" class="<?php echo $r001_asset_summary->group_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->group_id) ?>', 2);"><div class="r001_asset_group_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->group_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->group_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->group_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->type_id->Visible) { ?>
	<?php if ($r001_asset_summary->type_id->ShowGroupHeaderAsRow) { ?>
	<th data-name="type_id">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->type_id) == "") { ?>
	<th data-name="type_id" class="<?php echo $r001_asset_summary->type_id->headerCellClass() ?>"><div class="r001_asset_type_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->type_id->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="type_id" class="<?php echo $r001_asset_summary->type_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->type_id) ?>', 2);"><div class="r001_asset_type_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->type_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->type_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->type_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Code->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Code) == "") { ?>
	<th data-name="Code" class="<?php echo $r001_asset_summary->Code->headerCellClass() ?>"><div class="r001_asset_Code"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Code->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Code" class="<?php echo $r001_asset_summary->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Code) ?>', 2);"><div class="r001_asset_Code">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Code->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Description->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Description) == "") { ?>
	<th data-name="Description" class="<?php echo $r001_asset_summary->Description->headerCellClass() ?>"><div class="r001_asset_Description"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Description->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Description" class="<?php echo $r001_asset_summary->Description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Description) ?>', 2);"><div class="r001_asset_Description">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Description->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->brand_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->brand_id) == "") { ?>
	<th data-name="brand_id" class="<?php echo $r001_asset_summary->brand_id->headerCellClass() ?>"><div class="r001_asset_brand_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->brand_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="brand_id" class="<?php echo $r001_asset_summary->brand_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->brand_id) ?>', 2);"><div class="r001_asset_brand_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->brand_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->brand_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->brand_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->signature_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->signature_id) == "") { ?>
	<th data-name="signature_id" class="<?php echo $r001_asset_summary->signature_id->headerCellClass() ?>"><div class="r001_asset_signature_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->signature_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="signature_id" class="<?php echo $r001_asset_summary->signature_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->signature_id) ?>', 2);"><div class="r001_asset_signature_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->signature_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->signature_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->signature_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->department_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->department_id) == "") { ?>
	<th data-name="department_id" class="<?php echo $r001_asset_summary->department_id->headerCellClass() ?>"><div class="r001_asset_department_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->department_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="department_id" class="<?php echo $r001_asset_summary->department_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->department_id) ?>', 2);"><div class="r001_asset_department_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->department_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->department_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->department_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->location_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->location_id) == "") { ?>
	<th data-name="location_id" class="<?php echo $r001_asset_summary->location_id->headerCellClass() ?>"><div class="r001_asset_location_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->location_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="location_id" class="<?php echo $r001_asset_summary->location_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->location_id) ?>', 2);"><div class="r001_asset_location_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->location_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->location_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->location_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Qty->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Qty) == "") { ?>
	<th data-name="Qty" class="<?php echo $r001_asset_summary->Qty->headerCellClass() ?>"><div class="r001_asset_Qty"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Qty->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Qty" class="<?php echo $r001_asset_summary->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Qty) ?>', 2);"><div class="r001_asset_Qty">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Variance->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Variance) == "") { ?>
	<th data-name="Variance" class="<?php echo $r001_asset_summary->Variance->headerCellClass() ?>"><div class="r001_asset_Variance"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Variance->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Variance" class="<?php echo $r001_asset_summary->Variance->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Variance) ?>', 2);"><div class="r001_asset_Variance">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Variance->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Variance->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Variance->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->cond_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->cond_id) == "") { ?>
	<th data-name="cond_id" class="<?php echo $r001_asset_summary->cond_id->headerCellClass() ?>"><div class="r001_asset_cond_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->cond_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="cond_id" class="<?php echo $r001_asset_summary->cond_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->cond_id) ?>', 2);"><div class="r001_asset_cond_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->cond_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->cond_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->cond_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Remarks->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Remarks) == "") { ?>
	<th data-name="Remarks" class="<?php echo $r001_asset_summary->Remarks->headerCellClass() ?>"><div class="r001_asset_Remarks"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Remarks" class="<?php echo $r001_asset_summary->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Remarks) ?>', 2);"><div class="r001_asset_Remarks">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementDate->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->ProcurementDate) == "") { ?>
	<th data-name="ProcurementDate" class="<?php echo $r001_asset_summary->ProcurementDate->headerCellClass() ?>"><div class="r001_asset_ProcurementDate"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementDate->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="ProcurementDate" class="<?php echo $r001_asset_summary->ProcurementDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->ProcurementDate) ?>', 2);"><div class="r001_asset_ProcurementDate">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->ProcurementDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->ProcurementDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementCurrentCost->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->ProcurementCurrentCost) == "") { ?>
	<th data-name="ProcurementCurrentCost" class="<?php echo $r001_asset_summary->ProcurementCurrentCost->headerCellClass() ?>"><div class="r001_asset_ProcurementCurrentCost"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementCurrentCost->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="ProcurementCurrentCost" class="<?php echo $r001_asset_summary->ProcurementCurrentCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->ProcurementCurrentCost) ?>', 2);"><div class="r001_asset_ProcurementCurrentCost">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementCurrentCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->ProcurementCurrentCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->ProcurementCurrentCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->PeriodBegin->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->PeriodBegin) == "") { ?>
	<th data-name="PeriodBegin" class="<?php echo $r001_asset_summary->PeriodBegin->headerCellClass() ?>"><div class="r001_asset_PeriodBegin"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->PeriodBegin->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="PeriodBegin" class="<?php echo $r001_asset_summary->PeriodBegin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->PeriodBegin) ?>', 2);"><div class="r001_asset_PeriodBegin">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->PeriodBegin->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->PeriodBegin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->PeriodBegin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->PeriodEnd->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->PeriodEnd) == "") { ?>
	<th data-name="PeriodEnd" class="<?php echo $r001_asset_summary->PeriodEnd->headerCellClass() ?>"><div class="r001_asset_PeriodEnd"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->PeriodEnd->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="PeriodEnd" class="<?php echo $r001_asset_summary->PeriodEnd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->PeriodEnd) ?>', 2);"><div class="r001_asset_PeriodEnd">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->PeriodEnd->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->PeriodEnd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->PeriodEnd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r001_asset_summary->TotalGroups == 0)
			break; // Show header only
		$r001_asset_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php

	// Build detail SQL
	$where = DetailFilterSql($r001_asset_summary->property_id, $r001_asset_summary->getSqlFirstGroupField(), $r001_asset_summary->property_id->groupValue(), $r001_asset_summary->Dbid);
	if ($r001_asset_summary->PageFirstGroupFilter != "") $r001_asset_summary->PageFirstGroupFilter .= " OR ";
	$r001_asset_summary->PageFirstGroupFilter .= $where;
	if ($r001_asset_summary->Filter != "")
		$where = "($r001_asset_summary->Filter) AND ($where)";
	$sql = BuildReportSql($r001_asset_summary->getSqlSelect(), $r001_asset_summary->getSqlWhere(), $r001_asset_summary->getSqlGroupBy(), $r001_asset_summary->getSqlHaving(), $r001_asset_summary->getSqlOrderBy(), $where, $r001_asset_summary->Sort);
	$rs = $r001_asset_summary->getRecordset($sql);
	$r001_asset_summary->DetailRecords = $rs ? $rs->getRows() : [];
	$r001_asset_summary->DetailRecordCount = count($r001_asset_summary->DetailRecords);

	// Load detail records
	$r001_asset_summary->property_id->Records = &$r001_asset_summary->DetailRecords;
	$r001_asset_summary->property_id->LevelBreak = TRUE; // Set field level break
		$r001_asset_summary->GroupCounter[1] = $r001_asset_summary->GroupCount;
		$r001_asset_summary->property_id->getCnt($r001_asset_summary->property_id->Records); // Get record count
?>
<?php if ($r001_asset_summary->property_id->Visible && $r001_asset_summary->property_id->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r001_asset_summary->resetAttributes();
		$r001_asset_summary->RowType = ROWTYPE_TOTAL;
		$r001_asset_summary->RowTotalType = ROWTOTAL_GROUP;
		$r001_asset_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r001_asset_summary->RowGroupLevel = 1;
		$r001_asset_summary->renderRow();
?>
	<tr<?php echo $r001_asset_summary->rowAttributes(); ?>>
<?php if ($r001_asset_summary->property_id->Visible) { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="property_id" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $r001_asset_summary->property_id->cellAttributes() ?>>
<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->property_id) == "") { ?>
		<span class="ew-summary-caption r001_asset_property_id"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r001_asset_property_id" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->property_id) ?>', 2);">
			<span class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r001_asset_summary->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r001_asset_summary->property_id->viewAttributes() ?>><?php echo $r001_asset_summary->property_id->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r001_asset_summary->property_id->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r001_asset_summary->group_id->getDistinctValues($r001_asset_summary->property_id->Records);
	$r001_asset_summary->setGroupCount(count($r001_asset_summary->group_id->DistinctValues), $r001_asset_summary->GroupCounter[1]);
	$r001_asset_summary->GroupCounter[2] = 0; // Init group count index
	foreach ($r001_asset_summary->group_id->DistinctValues as $group_id) { // Load records for this distinct value
		$r001_asset_summary->group_id->setGroupValue($group_id); // Set group value
		$r001_asset_summary->group_id->getDistinctRecords($r001_asset_summary->property_id->Records, $r001_asset_summary->group_id->groupValue());
		$r001_asset_summary->group_id->LevelBreak = TRUE; // Set field level break
		$r001_asset_summary->GroupCounter[2]++;
		$r001_asset_summary->group_id->getCnt($r001_asset_summary->group_id->Records); // Get record count
?>
<?php if ($r001_asset_summary->group_id->Visible && $r001_asset_summary->group_id->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r001_asset_summary->group_id->setDbValue($group_id); // Set current value for group_id
		$r001_asset_summary->resetAttributes();
		$r001_asset_summary->RowType = ROWTYPE_TOTAL;
		$r001_asset_summary->RowTotalType = ROWTOTAL_GROUP;
		$r001_asset_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r001_asset_summary->RowGroupLevel = 2;
		$r001_asset_summary->renderRow();
?>
	<tr<?php echo $r001_asset_summary->rowAttributes(); ?>>
<?php if ($r001_asset_summary->property_id->Visible) { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($r001_asset_summary->group_id->Visible) { ?>
		<td data-field="group_id"<?php echo $r001_asset_summary->group_id->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="group_id" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 2) ?>"<?php echo $r001_asset_summary->group_id->cellAttributes() ?>>
<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->group_id) == "") { ?>
		<span class="ew-summary-caption r001_asset_group_id"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->group_id->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r001_asset_group_id" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->group_id) ?>', 2);">
			<span class="ew-table-header-caption"><?php echo $r001_asset_summary->group_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r001_asset_summary->group_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->group_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r001_asset_summary->group_id->viewAttributes() ?>><?php echo $r001_asset_summary->group_id->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r001_asset_summary->group_id->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r001_asset_summary->type_id->getDistinctValues($r001_asset_summary->group_id->Records);
	$r001_asset_summary->setGroupCount(count($r001_asset_summary->type_id->DistinctValues), $r001_asset_summary->GroupCounter[1], $r001_asset_summary->GroupCounter[2]);
	$r001_asset_summary->GroupCounter[3] = 0; // Init group count index
	foreach ($r001_asset_summary->type_id->DistinctValues as $type_id) { // Load records for this distinct value
		$r001_asset_summary->type_id->setGroupValue($type_id); // Set group value
		$r001_asset_summary->type_id->getDistinctRecords($r001_asset_summary->group_id->Records, $r001_asset_summary->type_id->groupValue());
		$r001_asset_summary->type_id->LevelBreak = TRUE; // Set field level break
		$r001_asset_summary->GroupCounter[3]++;
		$r001_asset_summary->type_id->getCnt($r001_asset_summary->type_id->Records); // Get record count
		$r001_asset_summary->setGroupCount($r001_asset_summary->type_id->Count, $r001_asset_summary->GroupCounter[1], $r001_asset_summary->GroupCounter[2], $r001_asset_summary->GroupCounter[3]);
?>
<?php if ($r001_asset_summary->type_id->Visible && $r001_asset_summary->type_id->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r001_asset_summary->type_id->setDbValue($type_id); // Set current value for type_id
		$r001_asset_summary->resetAttributes();
		$r001_asset_summary->RowType = ROWTYPE_TOTAL;
		$r001_asset_summary->RowTotalType = ROWTOTAL_GROUP;
		$r001_asset_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r001_asset_summary->RowGroupLevel = 3;
		$r001_asset_summary->renderRow();
?>
	<tr<?php echo $r001_asset_summary->rowAttributes(); ?>>
<?php if ($r001_asset_summary->property_id->Visible) { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($r001_asset_summary->group_id->Visible) { ?>
		<td data-field="group_id"<?php echo $r001_asset_summary->group_id->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($r001_asset_summary->type_id->Visible) { ?>
		<td data-field="type_id"<?php echo $r001_asset_summary->type_id->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="type_id" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 3) ?>"<?php echo $r001_asset_summary->type_id->cellAttributes() ?>>
<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->type_id) == "") { ?>
		<span class="ew-summary-caption r001_asset_type_id"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->type_id->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r001_asset_type_id" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->type_id) ?>', 2);">
			<span class="ew-table-header-caption"><?php echo $r001_asset_summary->type_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r001_asset_summary->type_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->type_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r001_asset_summary->type_id->viewAttributes() ?>><?php echo $r001_asset_summary->type_id->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r001_asset_summary->type_id->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r001_asset_summary->RecordCount = 0; // Reset record count
	foreach ($r001_asset_summary->type_id->Records as $record) {
		$r001_asset_summary->RecordCount++;
		$r001_asset_summary->RecordIndex++;
		$r001_asset_summary->loadRowValues($record);
?>
<?php

		// Render detail row
		$r001_asset_summary->resetAttributes();
		$r001_asset_summary->RowType = ROWTYPE_DETAIL;
		$r001_asset_summary->renderRow();
?>
	<tr<?php echo $r001_asset_summary->rowAttributes(); ?>>
<?php if ($r001_asset_summary->property_id->Visible) { ?>
	<?php if ($r001_asset_summary->property_id->ShowGroupHeaderAsRow) { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes(); ?>><span<?php echo $r001_asset_summary->property_id->viewAttributes() ?>><?php echo $r001_asset_summary->property_id->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->group_id->Visible) { ?>
	<?php if ($r001_asset_summary->group_id->ShowGroupHeaderAsRow) { ?>
		<td data-field="group_id"<?php echo $r001_asset_summary->group_id->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="group_id"<?php echo $r001_asset_summary->group_id->cellAttributes(); ?>><span<?php echo $r001_asset_summary->group_id->viewAttributes() ?>><?php echo $r001_asset_summary->group_id->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->type_id->Visible) { ?>
	<?php if ($r001_asset_summary->type_id->ShowGroupHeaderAsRow) { ?>
		<td data-field="type_id"<?php echo $r001_asset_summary->type_id->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="type_id"<?php echo $r001_asset_summary->type_id->cellAttributes(); ?>><span<?php echo $r001_asset_summary->type_id->viewAttributes() ?>><?php echo $r001_asset_summary->type_id->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Code->Visible) { ?>
		<td data-field="Code"<?php echo $r001_asset_summary->Code->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Code->viewAttributes() ?>><?php echo $r001_asset_summary->Code->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Description->Visible) { ?>
		<td data-field="Description"<?php echo $r001_asset_summary->Description->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Description->viewAttributes() ?>><?php echo $r001_asset_summary->Description->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->brand_id->Visible) { ?>
		<td data-field="brand_id"<?php echo $r001_asset_summary->brand_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->brand_id->viewAttributes() ?>><?php echo $r001_asset_summary->brand_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->signature_id->Visible) { ?>
		<td data-field="signature_id"<?php echo $r001_asset_summary->signature_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->signature_id->viewAttributes() ?>><?php echo $r001_asset_summary->signature_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->department_id->Visible) { ?>
		<td data-field="department_id"<?php echo $r001_asset_summary->department_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->department_id->viewAttributes() ?>><?php echo $r001_asset_summary->department_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->location_id->Visible) { ?>
		<td data-field="location_id"<?php echo $r001_asset_summary->location_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->location_id->viewAttributes() ?>><?php echo $r001_asset_summary->location_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Qty->Visible) { ?>
		<td data-field="Qty"<?php echo $r001_asset_summary->Qty->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Qty->viewAttributes() ?>><?php echo $r001_asset_summary->Qty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Variance->Visible) { ?>
		<td data-field="Variance"<?php echo $r001_asset_summary->Variance->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Variance->viewAttributes() ?>><?php echo $r001_asset_summary->Variance->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->cond_id->Visible) { ?>
		<td data-field="cond_id"<?php echo $r001_asset_summary->cond_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->cond_id->viewAttributes() ?>><?php echo $r001_asset_summary->cond_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Remarks->Visible) { ?>
		<td data-field="Remarks"<?php echo $r001_asset_summary->Remarks->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Remarks->viewAttributes() ?>><?php echo $r001_asset_summary->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementDate->Visible) { ?>
		<td data-field="ProcurementDate"<?php echo $r001_asset_summary->ProcurementDate->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->ProcurementDate->viewAttributes() ?>><?php echo $r001_asset_summary->ProcurementDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementCurrentCost->Visible) { ?>
		<td data-field="ProcurementCurrentCost"<?php echo $r001_asset_summary->ProcurementCurrentCost->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->ProcurementCurrentCost->viewAttributes() ?>><?php echo $r001_asset_summary->ProcurementCurrentCost->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->PeriodBegin->Visible) { ?>
		<td data-field="PeriodBegin"<?php echo $r001_asset_summary->PeriodBegin->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->PeriodBegin->viewAttributes() ?>><?php echo $r001_asset_summary->PeriodBegin->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->PeriodEnd->Visible) { ?>
		<td data-field="PeriodEnd"<?php echo $r001_asset_summary->PeriodEnd->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->PeriodEnd->viewAttributes() ?>><?php echo $r001_asset_summary->PeriodEnd->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
	}
	} // End group level 2
	} // End group level 1
?>
<?php

	// Next group
	$r001_asset_summary->loadGroupRowValues();

	// Show header if page break
	if ($r001_asset_summary->isExport())
		$r001_asset_summary->ShowHeader = ($r001_asset_summary->ExportPageBreakCount == 0) ? FALSE : ($r001_asset_summary->GroupCount % $r001_asset_summary->ExportPageBreakCount == 0);

	// Page_Breaking server event
	if ($r001_asset_summary->ShowHeader)
		$r001_asset_summary->Page_Breaking($r001_asset_summary->ShowHeader, $r001_asset_summary->PageBreakContent);
	$r001_asset_summary->GroupCount++;
} // End while
?>
<?php if ($r001_asset_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r001_asset_summary->isExport() && !($r001_asset_summary->DrillDown && $r001_asset_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r001_asset_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php } ?>
</div>
<!-- /#report-summary -->
<!-- Summary report (end) -->
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r001_asset_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$r001_asset_summary->terminate();
?>