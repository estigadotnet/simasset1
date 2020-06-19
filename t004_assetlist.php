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
$t004_asset_list = new t004_asset_list();

// Run the page
$t004_asset_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_asset_list->isExport()) { ?>
<script>
var ft004_assetlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft004_assetlist = currentForm = new ew.Form("ft004_assetlist", "list");
	ft004_assetlist.formKeyCountName = '<?php echo $t004_asset_list->FormKeyCountName ?>';

	// Validate form
	ft004_assetlist.validate = function() {
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
			var checkrow = (gridinsert) ? !this.emptyRow(infix) : true;
			if (checkrow) {
				addcnt++;
			<?php if ($t004_asset_list->property_id->Required) { ?>
				elm = this.getElements("x" + infix + "_property_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->property_id->caption(), $t004_asset_list->property_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->department_id->Required) { ?>
				elm = this.getElements("x" + infix + "_department_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->department_id->caption(), $t004_asset_list->department_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->signature_id->Required) { ?>
				elm = this.getElements("x" + infix + "_signature_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->signature_id->caption(), $t004_asset_list->signature_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Code->caption(), $t004_asset_list->Code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Description->caption(), $t004_asset_list->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->group_id->Required) { ?>
				elm = this.getElements("x" + infix + "_group_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->group_id->caption(), $t004_asset_list->group_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t004_asset_list->ProcurementDate->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcurementDate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->ProcurementDate->caption(), $t004_asset_list->ProcurementDate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProcurementDate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_list->ProcurementDate->errorMessage()) ?>");
			<?php if ($t004_asset_list->ProcurementCurrentCost->Required) { ?>
				elm = this.getElements("x" + infix + "_ProcurementCurrentCost");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->ProcurementCurrentCost->caption(), $t004_asset_list->ProcurementCurrentCost->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ProcurementCurrentCost");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_list->ProcurementCurrentCost->errorMessage()) ?>");
			<?php if ($t004_asset_list->Salvage->Required) { ?>
				elm = this.getElements("x" + infix + "_Salvage");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Salvage->caption(), $t004_asset_list->Salvage->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Salvage");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_list->Salvage->errorMessage()) ?>");
			<?php if ($t004_asset_list->Qty->Required) { ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Qty->caption(), $t004_asset_list->Qty->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_Qty");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t004_asset_list->Qty->errorMessage()) ?>");
			<?php if ($t004_asset_list->Remarks->Required) { ?>
				elm = this.getElements("x" + infix + "_Remarks");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t004_asset_list->Remarks->caption(), $t004_asset_list->Remarks->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		if (gridinsert && addcnt == 0) { // No row added
			ew.alert(ew.language.phrase("NoAddRecord"));
			return false;
		}
		return true;
	}

	// Check empty row
	ft004_assetlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "property_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "department_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "signature_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Code", false)) return false;
		if (ew.valueChanged(fobj, infix, "Description", false)) return false;
		if (ew.valueChanged(fobj, infix, "group_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "ProcurementDate", false)) return false;
		if (ew.valueChanged(fobj, infix, "ProcurementCurrentCost", false)) return false;
		if (ew.valueChanged(fobj, infix, "Salvage", false)) return false;
		if (ew.valueChanged(fobj, infix, "Qty", false)) return false;
		if (ew.valueChanged(fobj, infix, "Remarks", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft004_assetlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft004_assetlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft004_assetlist.lists["x_property_id"] = <?php echo $t004_asset_list->property_id->Lookup->toClientList($t004_asset_list) ?>;
	ft004_assetlist.lists["x_property_id"].options = <?php echo JsonEncode($t004_asset_list->property_id->lookupOptions()) ?>;
	ft004_assetlist.lists["x_department_id"] = <?php echo $t004_asset_list->department_id->Lookup->toClientList($t004_asset_list) ?>;
	ft004_assetlist.lists["x_department_id"].options = <?php echo JsonEncode($t004_asset_list->department_id->lookupOptions()) ?>;
	ft004_assetlist.lists["x_signature_id"] = <?php echo $t004_asset_list->signature_id->Lookup->toClientList($t004_asset_list) ?>;
	ft004_assetlist.lists["x_signature_id"].options = <?php echo JsonEncode($t004_asset_list->signature_id->lookupOptions()) ?>;
	ft004_assetlist.lists["x_group_id"] = <?php echo $t004_asset_list->group_id->Lookup->toClientList($t004_asset_list) ?>;
	ft004_assetlist.lists["x_group_id"].options = <?php echo JsonEncode($t004_asset_list->group_id->lookupOptions()) ?>;
	loadjs.done("ft004_assetlist");
});
var ft004_assetlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft004_assetlistsrch = currentSearchForm = new ew.Form("ft004_assetlistsrch");

	// Dynamic selection lists
	// Filters

	ft004_assetlistsrch.filterList = <?php echo $t004_asset_list->getFilterList() ?>;
	loadjs.done("ft004_assetlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_asset_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t004_asset_list->TotalRecords > 0 && $t004_asset_list->ExportOptions->visible()) { ?>
<?php $t004_asset_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->ImportOptions->visible()) { ?>
<?php $t004_asset_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->SearchOptions->visible()) { ?>
<?php $t004_asset_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->FilterOptions->visible()) { ?>
<?php $t004_asset_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t004_asset_list->renderOtherOptions();
?>
<?php $t004_asset_list->showPageHeader(); ?>
<?php
$t004_asset_list->showMessage();
?>
<?php if ($t004_asset_list->TotalRecords > 0 || $t004_asset->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t004_asset_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t004_asset">
<form name="ft004_assetlist" id="ft004_assetlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<div id="gmp_t004_asset" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t004_asset_list->TotalRecords > 0 || $t004_asset_list->isGridEdit()) { ?>
<table id="tbl_t004_assetlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t004_asset->RowType = ROWTYPE_HEADER;

// Render list options
$t004_asset_list->renderListOptions();

// Render list options (header, left)
$t004_asset_list->ListOptions->render("header", "left");
?>
<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->property_id) == "") { ?>
		<th data-name="property_id" class="<?php echo $t004_asset_list->property_id->headerCellClass() ?>"><div id="elh_t004_asset_property_id" class="t004_asset_property_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->property_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property_id" class="<?php echo $t004_asset_list->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->property_id) ?>', 2);"><div id="elh_t004_asset_property_id" class="t004_asset_property_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->department_id->Visible) { // department_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->department_id) == "") { ?>
		<th data-name="department_id" class="<?php echo $t004_asset_list->department_id->headerCellClass() ?>"><div id="elh_t004_asset_department_id" class="t004_asset_department_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->department_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department_id" class="<?php echo $t004_asset_list->department_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->department_id) ?>', 2);"><div id="elh_t004_asset_department_id" class="t004_asset_department_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->department_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->department_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->department_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->signature_id) == "") { ?>
		<th data-name="signature_id" class="<?php echo $t004_asset_list->signature_id->headerCellClass() ?>"><div id="elh_t004_asset_signature_id" class="t004_asset_signature_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->signature_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signature_id" class="<?php echo $t004_asset_list->signature_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->signature_id) ?>', 2);"><div id="elh_t004_asset_signature_id" class="t004_asset_signature_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->signature_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->signature_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->signature_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Code->Visible) { // Code ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $t004_asset_list->Code->headerCellClass() ?>"><div id="elh_t004_asset_Code" class="t004_asset_Code"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $t004_asset_list->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Code) ?>', 2);"><div id="elh_t004_asset_Code" class="t004_asset_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Code->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Description->Visible) { // Description ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Description) == "") { ?>
		<th data-name="Description" class="<?php echo $t004_asset_list->Description->headerCellClass() ?>"><div id="elh_t004_asset_Description" class="t004_asset_Description"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Description" class="<?php echo $t004_asset_list->Description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Description) ?>', 2);"><div id="elh_t004_asset_Description" class="t004_asset_Description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Description->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->group_id->Visible) { // group_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->group_id) == "") { ?>
		<th data-name="group_id" class="<?php echo $t004_asset_list->group_id->headerCellClass() ?>"><div id="elh_t004_asset_group_id" class="t004_asset_group_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->group_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="group_id" class="<?php echo $t004_asset_list->group_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->group_id) ?>', 2);"><div id="elh_t004_asset_group_id" class="t004_asset_group_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->group_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->group_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->group_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->ProcurementDate->Visible) { // ProcurementDate ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->ProcurementDate) == "") { ?>
		<th data-name="ProcurementDate" class="<?php echo $t004_asset_list->ProcurementDate->headerCellClass() ?>"><div id="elh_t004_asset_ProcurementDate" class="t004_asset_ProcurementDate"><div class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcurementDate" class="<?php echo $t004_asset_list->ProcurementDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->ProcurementDate) ?>', 2);"><div id="elh_t004_asset_ProcurementDate" class="t004_asset_ProcurementDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->ProcurementDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->ProcurementDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->ProcurementCurrentCost) == "") { ?>
		<th data-name="ProcurementCurrentCost" class="<?php echo $t004_asset_list->ProcurementCurrentCost->headerCellClass() ?>"><div id="elh_t004_asset_ProcurementCurrentCost" class="t004_asset_ProcurementCurrentCost"><div class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementCurrentCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcurementCurrentCost" class="<?php echo $t004_asset_list->ProcurementCurrentCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->ProcurementCurrentCost) ?>', 2);"><div id="elh_t004_asset_ProcurementCurrentCost" class="t004_asset_ProcurementCurrentCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementCurrentCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->ProcurementCurrentCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->ProcurementCurrentCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Salvage->Visible) { // Salvage ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Salvage) == "") { ?>
		<th data-name="Salvage" class="<?php echo $t004_asset_list->Salvage->headerCellClass() ?>"><div id="elh_t004_asset_Salvage" class="t004_asset_Salvage"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Salvage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Salvage" class="<?php echo $t004_asset_list->Salvage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Salvage) ?>', 2);"><div id="elh_t004_asset_Salvage" class="t004_asset_Salvage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Salvage->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Salvage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Salvage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Qty) == "") { ?>
		<th data-name="Qty" class="<?php echo $t004_asset_list->Qty->headerCellClass() ?>"><div id="elh_t004_asset_Qty" class="t004_asset_Qty"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Qty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Qty" class="<?php echo $t004_asset_list->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Qty) ?>', 2);"><div id="elh_t004_asset_Qty" class="t004_asset_Qty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Remarks->Visible) { // Remarks ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $t004_asset_list->Remarks->headerCellClass() ?>"><div id="elh_t004_asset_Remarks" class="t004_asset_Remarks"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $t004_asset_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Remarks) ?>', 2);"><div id="elh_t004_asset_Remarks" class="t004_asset_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t004_asset_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t004_asset_list->ExportAll && $t004_asset_list->isExport()) {
	$t004_asset_list->StopRecord = $t004_asset_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t004_asset_list->TotalRecords > $t004_asset_list->StartRecord + $t004_asset_list->DisplayRecords - 1)
		$t004_asset_list->StopRecord = $t004_asset_list->StartRecord + $t004_asset_list->DisplayRecords - 1;
	else
		$t004_asset_list->StopRecord = $t004_asset_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t004_asset->isConfirm() || $t004_asset_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t004_asset_list->FormKeyCountName) && ($t004_asset_list->isGridAdd() || $t004_asset_list->isGridEdit() || $t004_asset->isConfirm())) {
		$t004_asset_list->KeyCount = $CurrentForm->getValue($t004_asset_list->FormKeyCountName);
		$t004_asset_list->StopRecord = $t004_asset_list->StartRecord + $t004_asset_list->KeyCount - 1;
	}
}
$t004_asset_list->RecordCount = $t004_asset_list->StartRecord - 1;
if ($t004_asset_list->Recordset && !$t004_asset_list->Recordset->EOF) {
	$t004_asset_list->Recordset->moveFirst();
	$selectLimit = $t004_asset_list->UseSelectLimit;
	if (!$selectLimit && $t004_asset_list->StartRecord > 1)
		$t004_asset_list->Recordset->move($t004_asset_list->StartRecord - 1);
} elseif (!$t004_asset->AllowAddDeleteRow && $t004_asset_list->StopRecord == 0) {
	$t004_asset_list->StopRecord = $t004_asset->GridAddRowCount;
}

// Initialize aggregate
$t004_asset->RowType = ROWTYPE_AGGREGATEINIT;
$t004_asset->resetAttributes();
$t004_asset_list->renderRow();
if ($t004_asset_list->isGridAdd())
	$t004_asset_list->RowIndex = 0;
if ($t004_asset_list->isGridEdit())
	$t004_asset_list->RowIndex = 0;
while ($t004_asset_list->RecordCount < $t004_asset_list->StopRecord) {
	$t004_asset_list->RecordCount++;
	if ($t004_asset_list->RecordCount >= $t004_asset_list->StartRecord) {
		$t004_asset_list->RowCount++;
		if ($t004_asset_list->isGridAdd() || $t004_asset_list->isGridEdit() || $t004_asset->isConfirm()) {
			$t004_asset_list->RowIndex++;
			$CurrentForm->Index = $t004_asset_list->RowIndex;
			if ($CurrentForm->hasValue($t004_asset_list->FormActionName) && ($t004_asset->isConfirm() || $t004_asset_list->EventCancelled))
				$t004_asset_list->RowAction = strval($CurrentForm->getValue($t004_asset_list->FormActionName));
			elseif ($t004_asset_list->isGridAdd())
				$t004_asset_list->RowAction = "insert";
			else
				$t004_asset_list->RowAction = "";
		}

		// Set up key count
		$t004_asset_list->KeyCount = $t004_asset_list->RowIndex;

		// Init row class and style
		$t004_asset->resetAttributes();
		$t004_asset->CssClass = "";
		if ($t004_asset_list->isGridAdd()) {
			$t004_asset_list->loadRowValues(); // Load default values
		} else {
			$t004_asset_list->loadRowValues($t004_asset_list->Recordset); // Load row values
		}
		$t004_asset->RowType = ROWTYPE_VIEW; // Render view
		if ($t004_asset_list->isGridAdd()) // Grid add
			$t004_asset->RowType = ROWTYPE_ADD; // Render add
		if ($t004_asset_list->isGridAdd() && $t004_asset->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t004_asset_list->restoreCurrentRowFormValues($t004_asset_list->RowIndex); // Restore form values
		if ($t004_asset_list->isGridEdit()) { // Grid edit
			if ($t004_asset->EventCancelled)
				$t004_asset_list->restoreCurrentRowFormValues($t004_asset_list->RowIndex); // Restore form values
			if ($t004_asset_list->RowAction == "insert")
				$t004_asset->RowType = ROWTYPE_ADD; // Render add
			else
				$t004_asset->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t004_asset_list->isGridEdit() && ($t004_asset->RowType == ROWTYPE_EDIT || $t004_asset->RowType == ROWTYPE_ADD) && $t004_asset->EventCancelled) // Update failed
			$t004_asset_list->restoreCurrentRowFormValues($t004_asset_list->RowIndex); // Restore form values
		if ($t004_asset->RowType == ROWTYPE_EDIT) // Edit row
			$t004_asset_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t004_asset->RowAttrs->merge(["data-rowindex" => $t004_asset_list->RowCount, "id" => "r" . $t004_asset_list->RowCount . "_t004_asset", "data-rowtype" => $t004_asset->RowType]);

		// Render row
		$t004_asset_list->renderRow();

		// Render list options
		$t004_asset_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t004_asset_list->RowAction != "delete" && $t004_asset_list->RowAction != "insertdelete" && !($t004_asset_list->RowAction == "insert" && $t004_asset->isConfirm() && $t004_asset_list->emptyRow())) {
?>
	<tr <?php echo $t004_asset->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_asset_list->ListOptions->render("body", "left", $t004_asset_list->RowCount);
?>
	<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id" <?php echo $t004_asset_list->property_id->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_property_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_property_id"><?php echo EmptyValue(strval($t004_asset_list->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->property_id->ReadOnly || $t004_asset_list->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_property") && !$t004_asset_list->property_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_property_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->property_id->caption() ?>" data-title="<?php echo $t004_asset_list->property_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',url:'t001_propertyaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->property_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->property_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_property_id" id="x<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo $t004_asset_list->property_id->CurrentValue ?>"<?php echo $t004_asset_list->property_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" name="o<?php echo $t004_asset_list->RowIndex ?>_property_id" id="o<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo HtmlEncode($t004_asset_list->property_id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_property_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_property_id"><?php echo EmptyValue(strval($t004_asset_list->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->property_id->ReadOnly || $t004_asset_list->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_property") && !$t004_asset_list->property_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_property_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->property_id->caption() ?>" data-title="<?php echo $t004_asset_list->property_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',url:'t001_propertyaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->property_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->property_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_property_id" id="x<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo $t004_asset_list->property_id->CurrentValue ?>"<?php echo $t004_asset_list->property_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_property_id">
<span<?php echo $t004_asset_list->property_id->viewAttributes() ?>><?php echo $t004_asset_list->property_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t004_asset" data-field="x_id" name="x<?php echo $t004_asset_list->RowIndex ?>_id" id="x<?php echo $t004_asset_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t004_asset_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t004_asset" data-field="x_id" name="o<?php echo $t004_asset_list->RowIndex ?>_id" id="o<?php echo $t004_asset_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t004_asset_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT || $t004_asset->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t004_asset" data-field="x_id" name="x<?php echo $t004_asset_list->RowIndex ?>_id" id="x<?php echo $t004_asset_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t004_asset_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t004_asset_list->department_id->Visible) { // department_id ?>
		<td data-name="department_id" <?php echo $t004_asset_list->department_id->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_department_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_department_id"><?php echo EmptyValue(strval($t004_asset_list->department_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->department_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->department_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->department_id->ReadOnly || $t004_asset_list->department_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_department_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_department") && !$t004_asset_list->department_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_department_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->department_id->caption() ?>" data-title="<?php echo $t004_asset_list->department_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_department_id',url:'t002_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->department_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_department_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_department_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->department_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_department_id" id="x<?php echo $t004_asset_list->RowIndex ?>_department_id" value="<?php echo $t004_asset_list->department_id->CurrentValue ?>"<?php echo $t004_asset_list->department_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_department_id" name="o<?php echo $t004_asset_list->RowIndex ?>_department_id" id="o<?php echo $t004_asset_list->RowIndex ?>_department_id" value="<?php echo HtmlEncode($t004_asset_list->department_id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_department_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_department_id"><?php echo EmptyValue(strval($t004_asset_list->department_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->department_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->department_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->department_id->ReadOnly || $t004_asset_list->department_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_department_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_department") && !$t004_asset_list->department_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_department_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->department_id->caption() ?>" data-title="<?php echo $t004_asset_list->department_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_department_id',url:'t002_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->department_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_department_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_department_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->department_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_department_id" id="x<?php echo $t004_asset_list->RowIndex ?>_department_id" value="<?php echo $t004_asset_list->department_id->CurrentValue ?>"<?php echo $t004_asset_list->department_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_department_id">
<span<?php echo $t004_asset_list->department_id->viewAttributes() ?>><?php echo $t004_asset_list->department_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
		<td data-name="signature_id" <?php echo $t004_asset_list->signature_id->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_signature_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_signature_id"><?php echo EmptyValue(strval($t004_asset_list->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->signature_id->ReadOnly || $t004_asset_list->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t004_asset_list->signature_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_signature_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->signature_id->caption() ?>" data-title="<?php echo $t004_asset_list->signature_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->signature_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->signature_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo $t004_asset_list->signature_id->CurrentValue ?>"<?php echo $t004_asset_list->signature_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" name="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo HtmlEncode($t004_asset_list->signature_id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_signature_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_signature_id"><?php echo EmptyValue(strval($t004_asset_list->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->signature_id->ReadOnly || $t004_asset_list->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t004_asset_list->signature_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_signature_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->signature_id->caption() ?>" data-title="<?php echo $t004_asset_list->signature_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->signature_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->signature_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo $t004_asset_list->signature_id->CurrentValue ?>"<?php echo $t004_asset_list->signature_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_signature_id">
<span<?php echo $t004_asset_list->signature_id->viewAttributes() ?>><?php echo $t004_asset_list->signature_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Code->Visible) { // Code ?>
		<td data-name="Code" <?php echo $t004_asset_list->Code->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Code" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Code" name="x<?php echo $t004_asset_list->RowIndex ?>_Code" id="x<?php echo $t004_asset_list->RowIndex ?>_Code" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t004_asset_list->Code->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Code->EditValue ?>"<?php echo $t004_asset_list->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Code" name="o<?php echo $t004_asset_list->RowIndex ?>_Code" id="o<?php echo $t004_asset_list->RowIndex ?>_Code" value="<?php echo HtmlEncode($t004_asset_list->Code->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Code" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Code" name="x<?php echo $t004_asset_list->RowIndex ?>_Code" id="x<?php echo $t004_asset_list->RowIndex ?>_Code" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t004_asset_list->Code->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Code->EditValue ?>"<?php echo $t004_asset_list->Code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Code">
<span<?php echo $t004_asset_list->Code->viewAttributes() ?>><?php echo $t004_asset_list->Code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Description->Visible) { // Description ?>
		<td data-name="Description" <?php echo $t004_asset_list->Description->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Description" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Description" name="x<?php echo $t004_asset_list->RowIndex ?>_Description" id="x<?php echo $t004_asset_list->RowIndex ?>_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_list->Description->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Description->EditValue ?>"<?php echo $t004_asset_list->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Description" name="o<?php echo $t004_asset_list->RowIndex ?>_Description" id="o<?php echo $t004_asset_list->RowIndex ?>_Description" value="<?php echo HtmlEncode($t004_asset_list->Description->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Description" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Description" name="x<?php echo $t004_asset_list->RowIndex ?>_Description" id="x<?php echo $t004_asset_list->RowIndex ?>_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_list->Description->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Description->EditValue ?>"<?php echo $t004_asset_list->Description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Description">
<span<?php echo $t004_asset_list->Description->viewAttributes() ?>><?php echo $t004_asset_list->Description->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->group_id->Visible) { // group_id ?>
		<td data-name="group_id" <?php echo $t004_asset_list->group_id->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_group_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_group_id"><?php echo EmptyValue(strval($t004_asset_list->group_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->group_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->group_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->group_id->ReadOnly || $t004_asset_list->group_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_group_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->group_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_group_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_group_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->group_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_group_id" id="x<?php echo $t004_asset_list->RowIndex ?>_group_id" value="<?php echo $t004_asset_list->group_id->CurrentValue ?>"<?php echo $t004_asset_list->group_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_group_id" name="o<?php echo $t004_asset_list->RowIndex ?>_group_id" id="o<?php echo $t004_asset_list->RowIndex ?>_group_id" value="<?php echo HtmlEncode($t004_asset_list->group_id->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_group_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_group_id"><?php echo EmptyValue(strval($t004_asset_list->group_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->group_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->group_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->group_id->ReadOnly || $t004_asset_list->group_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_group_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->group_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_group_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_group_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->group_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_group_id" id="x<?php echo $t004_asset_list->RowIndex ?>_group_id" value="<?php echo $t004_asset_list->group_id->CurrentValue ?>"<?php echo $t004_asset_list->group_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_group_id">
<span<?php echo $t004_asset_list->group_id->viewAttributes() ?>><?php echo $t004_asset_list->group_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->ProcurementDate->Visible) { // ProcurementDate ?>
		<td data-name="ProcurementDate" <?php echo $t004_asset_list->ProcurementDate->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementDate" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_ProcurementDate" data-format="7" name="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" id="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_list->ProcurementDate->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->ProcurementDate->EditValue ?>"<?php echo $t004_asset_list->ProcurementDate->editAttributes() ?>>
<?php if (!$t004_asset_list->ProcurementDate->ReadOnly && !$t004_asset_list->ProcurementDate->Disabled && !isset($t004_asset_list->ProcurementDate->EditAttrs["readonly"]) && !isset($t004_asset_list->ProcurementDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetlist", "x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_ProcurementDate" name="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" id="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" value="<?php echo HtmlEncode($t004_asset_list->ProcurementDate->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementDate" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_ProcurementDate" data-format="7" name="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" id="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_list->ProcurementDate->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->ProcurementDate->EditValue ?>"<?php echo $t004_asset_list->ProcurementDate->editAttributes() ?>>
<?php if (!$t004_asset_list->ProcurementDate->ReadOnly && !$t004_asset_list->ProcurementDate->Disabled && !isset($t004_asset_list->ProcurementDate->EditAttrs["readonly"]) && !isset($t004_asset_list->ProcurementDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetlist", "x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementDate">
<span<?php echo $t004_asset_list->ProcurementDate->viewAttributes() ?>><?php echo $t004_asset_list->ProcurementDate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
		<td data-name="ProcurementCurrentCost" <?php echo $t004_asset_list->ProcurementCurrentCost->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementCurrentCost" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_ProcurementCurrentCost" name="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" id="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->ProcurementCurrentCost->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->ProcurementCurrentCost->EditValue ?>"<?php echo $t004_asset_list->ProcurementCurrentCost->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_ProcurementCurrentCost" name="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" id="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" value="<?php echo HtmlEncode($t004_asset_list->ProcurementCurrentCost->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementCurrentCost" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_ProcurementCurrentCost" name="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" id="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->ProcurementCurrentCost->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->ProcurementCurrentCost->EditValue ?>"<?php echo $t004_asset_list->ProcurementCurrentCost->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementCurrentCost">
<span<?php echo $t004_asset_list->ProcurementCurrentCost->viewAttributes() ?>><?php echo $t004_asset_list->ProcurementCurrentCost->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Salvage->Visible) { // Salvage ?>
		<td data-name="Salvage" <?php echo $t004_asset_list->Salvage->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Salvage" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Salvage" name="x<?php echo $t004_asset_list->RowIndex ?>_Salvage" id="x<?php echo $t004_asset_list->RowIndex ?>_Salvage" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Salvage->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Salvage->EditValue ?>"<?php echo $t004_asset_list->Salvage->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Salvage" name="o<?php echo $t004_asset_list->RowIndex ?>_Salvage" id="o<?php echo $t004_asset_list->RowIndex ?>_Salvage" value="<?php echo HtmlEncode($t004_asset_list->Salvage->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Salvage" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Salvage" name="x<?php echo $t004_asset_list->RowIndex ?>_Salvage" id="x<?php echo $t004_asset_list->RowIndex ?>_Salvage" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Salvage->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Salvage->EditValue ?>"<?php echo $t004_asset_list->Salvage->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Salvage">
<span<?php echo $t004_asset_list->Salvage->viewAttributes() ?>><?php echo $t004_asset_list->Salvage->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty" <?php echo $t004_asset_list->Qty->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Qty" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x<?php echo $t004_asset_list->RowIndex ?>_Qty" id="x<?php echo $t004_asset_list->RowIndex ?>_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Qty->EditValue ?>"<?php echo $t004_asset_list->Qty->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Qty" name="o<?php echo $t004_asset_list->RowIndex ?>_Qty" id="o<?php echo $t004_asset_list->RowIndex ?>_Qty" value="<?php echo HtmlEncode($t004_asset_list->Qty->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Qty" class="form-group">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x<?php echo $t004_asset_list->RowIndex ?>_Qty" id="x<?php echo $t004_asset_list->RowIndex ?>_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Qty->EditValue ?>"<?php echo $t004_asset_list->Qty->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Qty">
<span<?php echo $t004_asset_list->Qty->viewAttributes() ?>><?php echo $t004_asset_list->Qty->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $t004_asset_list->Remarks->cellAttributes() ?>>
<?php if ($t004_asset->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Remarks" class="form-group">
<textarea data-table="t004_asset" data-field="x_Remarks" name="x<?php echo $t004_asset_list->RowIndex ?>_Remarks" id="x<?php echo $t004_asset_list->RowIndex ?>_Remarks" cols="15" rows="1" placeholder="<?php echo HtmlEncode($t004_asset_list->Remarks->getPlaceHolder()) ?>"<?php echo $t004_asset_list->Remarks->editAttributes() ?>><?php echo $t004_asset_list->Remarks->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Remarks" name="o<?php echo $t004_asset_list->RowIndex ?>_Remarks" id="o<?php echo $t004_asset_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($t004_asset_list->Remarks->OldValue) ?>">
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Remarks" class="form-group">
<textarea data-table="t004_asset" data-field="x_Remarks" name="x<?php echo $t004_asset_list->RowIndex ?>_Remarks" id="x<?php echo $t004_asset_list->RowIndex ?>_Remarks" cols="15" rows="1" placeholder="<?php echo HtmlEncode($t004_asset_list->Remarks->getPlaceHolder()) ?>"<?php echo $t004_asset_list->Remarks->editAttributes() ?>><?php echo $t004_asset_list->Remarks->EditValue ?></textarea>
</span>
<?php } ?>
<?php if ($t004_asset->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Remarks">
<span<?php echo $t004_asset_list->Remarks->viewAttributes() ?>><?php echo $t004_asset_list->Remarks->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_asset_list->ListOptions->render("body", "right", $t004_asset_list->RowCount);
?>
	</tr>
<?php if ($t004_asset->RowType == ROWTYPE_ADD || $t004_asset->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft004_assetlist", "load"], function() {
	ft004_assetlist.updateLists(<?php echo $t004_asset_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t004_asset_list->isGridAdd())
		if (!$t004_asset_list->Recordset->EOF)
			$t004_asset_list->Recordset->moveNext();
}
?>
<?php
	if ($t004_asset_list->isGridAdd() || $t004_asset_list->isGridEdit()) {
		$t004_asset_list->RowIndex = '$rowindex$';
		$t004_asset_list->loadRowValues();

		// Set row properties
		$t004_asset->resetAttributes();
		$t004_asset->RowAttrs->merge(["data-rowindex" => $t004_asset_list->RowIndex, "id" => "r0_t004_asset", "data-rowtype" => ROWTYPE_ADD]);
		$t004_asset->RowAttrs->appendClass("ew-template");
		$t004_asset->RowType = ROWTYPE_ADD;

		// Render row
		$t004_asset_list->renderRow();

		// Render list options
		$t004_asset_list->renderListOptions();
		$t004_asset_list->StartRowCount = 0;
?>
	<tr <?php echo $t004_asset->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_asset_list->ListOptions->render("body", "left", $t004_asset_list->RowIndex);
?>
	<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id">
<span id="el$rowindex$_t004_asset_property_id" class="form-group t004_asset_property_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_property_id"><?php echo EmptyValue(strval($t004_asset_list->property_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->property_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->property_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->property_id->ReadOnly || $t004_asset_list->property_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t001_property") && !$t004_asset_list->property_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_property_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->property_id->caption() ?>" data-title="<?php echo $t004_asset_list->property_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_property_id',url:'t001_propertyaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->property_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_property_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->property_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_property_id" id="x<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo $t004_asset_list->property_id->CurrentValue ?>"<?php echo $t004_asset_list->property_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_property_id" name="o<?php echo $t004_asset_list->RowIndex ?>_property_id" id="o<?php echo $t004_asset_list->RowIndex ?>_property_id" value="<?php echo HtmlEncode($t004_asset_list->property_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->department_id->Visible) { // department_id ?>
		<td data-name="department_id">
<span id="el$rowindex$_t004_asset_department_id" class="form-group t004_asset_department_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_department_id"><?php echo EmptyValue(strval($t004_asset_list->department_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->department_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->department_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->department_id->ReadOnly || $t004_asset_list->department_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_department_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t002_department") && !$t004_asset_list->department_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_department_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->department_id->caption() ?>" data-title="<?php echo $t004_asset_list->department_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_department_id',url:'t002_departmentaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->department_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_department_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_department_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->department_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_department_id" id="x<?php echo $t004_asset_list->RowIndex ?>_department_id" value="<?php echo $t004_asset_list->department_id->CurrentValue ?>"<?php echo $t004_asset_list->department_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_department_id" name="o<?php echo $t004_asset_list->RowIndex ?>_department_id" id="o<?php echo $t004_asset_list->RowIndex ?>_department_id" value="<?php echo HtmlEncode($t004_asset_list->department_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
		<td data-name="signature_id">
<span id="el$rowindex$_t004_asset_signature_id" class="form-group t004_asset_signature_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_signature_id"><?php echo EmptyValue(strval($t004_asset_list->signature_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->signature_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->signature_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->signature_id->ReadOnly || $t004_asset_list->signature_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
		<?php if (AllowAdd(CurrentProjectID() . "t003_signature") && !$t004_asset_list->signature_id->ReadOnly) { ?>
		<button type="button" class="btn btn-default ew-add-opt-btn" id="aol_x<?php echo $t004_asset_list->RowIndex ?>_signature_id" title="<?php echo HtmlTitle($Language->phrase("AddLink")) . "&nbsp;" . $t004_asset_list->signature_id->caption() ?>" data-title="<?php echo $t004_asset_list->signature_id->caption() ?>" onclick="ew.addOptionDialogShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_signature_id',url:'t003_signatureaddopt.php'});"><i class="fas fa-plus ew-icon"></i></button>
		<?php } ?>
	</div>
</div>
<?php echo $t004_asset_list->signature_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_signature_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->signature_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="x<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo $t004_asset_list->signature_id->CurrentValue ?>"<?php echo $t004_asset_list->signature_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_signature_id" name="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" id="o<?php echo $t004_asset_list->RowIndex ?>_signature_id" value="<?php echo HtmlEncode($t004_asset_list->signature_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Code->Visible) { // Code ?>
		<td data-name="Code">
<span id="el$rowindex$_t004_asset_Code" class="form-group t004_asset_Code">
<input type="text" data-table="t004_asset" data-field="x_Code" name="x<?php echo $t004_asset_list->RowIndex ?>_Code" id="x<?php echo $t004_asset_list->RowIndex ?>_Code" size="30" maxlength="25" placeholder="<?php echo HtmlEncode($t004_asset_list->Code->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Code->EditValue ?>"<?php echo $t004_asset_list->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Code" name="o<?php echo $t004_asset_list->RowIndex ?>_Code" id="o<?php echo $t004_asset_list->RowIndex ?>_Code" value="<?php echo HtmlEncode($t004_asset_list->Code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Description->Visible) { // Description ?>
		<td data-name="Description">
<span id="el$rowindex$_t004_asset_Description" class="form-group t004_asset_Description">
<input type="text" data-table="t004_asset" data-field="x_Description" name="x<?php echo $t004_asset_list->RowIndex ?>_Description" id="x<?php echo $t004_asset_list->RowIndex ?>_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t004_asset_list->Description->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Description->EditValue ?>"<?php echo $t004_asset_list->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Description" name="o<?php echo $t004_asset_list->RowIndex ?>_Description" id="o<?php echo $t004_asset_list->RowIndex ?>_Description" value="<?php echo HtmlEncode($t004_asset_list->Description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->group_id->Visible) { // group_id ?>
		<td data-name="group_id">
<span id="el$rowindex$_t004_asset_group_id" class="form-group t004_asset_group_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t004_asset_list->RowIndex ?>_group_id"><?php echo EmptyValue(strval($t004_asset_list->group_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t004_asset_list->group_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t004_asset_list->group_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t004_asset_list->group_id->ReadOnly || $t004_asset_list->group_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t004_asset_list->RowIndex ?>_group_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t004_asset_list->group_id->Lookup->getParamTag($t004_asset_list, "p_x" . $t004_asset_list->RowIndex . "_group_id") ?>
<input type="hidden" data-table="t004_asset" data-field="x_group_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t004_asset_list->group_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t004_asset_list->RowIndex ?>_group_id" id="x<?php echo $t004_asset_list->RowIndex ?>_group_id" value="<?php echo $t004_asset_list->group_id->CurrentValue ?>"<?php echo $t004_asset_list->group_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_group_id" name="o<?php echo $t004_asset_list->RowIndex ?>_group_id" id="o<?php echo $t004_asset_list->RowIndex ?>_group_id" value="<?php echo HtmlEncode($t004_asset_list->group_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->ProcurementDate->Visible) { // ProcurementDate ?>
		<td data-name="ProcurementDate">
<span id="el$rowindex$_t004_asset_ProcurementDate" class="form-group t004_asset_ProcurementDate">
<input type="text" data-table="t004_asset" data-field="x_ProcurementDate" data-format="7" name="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" id="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t004_asset_list->ProcurementDate->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->ProcurementDate->EditValue ?>"<?php echo $t004_asset_list->ProcurementDate->editAttributes() ?>>
<?php if (!$t004_asset_list->ProcurementDate->ReadOnly && !$t004_asset_list->ProcurementDate->Disabled && !isset($t004_asset_list->ProcurementDate->EditAttrs["readonly"]) && !isset($t004_asset_list->ProcurementDate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft004_assetlist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft004_assetlist", "x<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_ProcurementDate" name="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" id="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementDate" value="<?php echo HtmlEncode($t004_asset_list->ProcurementDate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
		<td data-name="ProcurementCurrentCost">
<span id="el$rowindex$_t004_asset_ProcurementCurrentCost" class="form-group t004_asset_ProcurementCurrentCost">
<input type="text" data-table="t004_asset" data-field="x_ProcurementCurrentCost" name="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" id="x<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->ProcurementCurrentCost->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->ProcurementCurrentCost->EditValue ?>"<?php echo $t004_asset_list->ProcurementCurrentCost->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_ProcurementCurrentCost" name="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" id="o<?php echo $t004_asset_list->RowIndex ?>_ProcurementCurrentCost" value="<?php echo HtmlEncode($t004_asset_list->ProcurementCurrentCost->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Salvage->Visible) { // Salvage ?>
		<td data-name="Salvage">
<span id="el$rowindex$_t004_asset_Salvage" class="form-group t004_asset_Salvage">
<input type="text" data-table="t004_asset" data-field="x_Salvage" name="x<?php echo $t004_asset_list->RowIndex ?>_Salvage" id="x<?php echo $t004_asset_list->RowIndex ?>_Salvage" size="10" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Salvage->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Salvage->EditValue ?>"<?php echo $t004_asset_list->Salvage->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Salvage" name="o<?php echo $t004_asset_list->RowIndex ?>_Salvage" id="o<?php echo $t004_asset_list->RowIndex ?>_Salvage" value="<?php echo HtmlEncode($t004_asset_list->Salvage->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty">
<span id="el$rowindex$_t004_asset_Qty" class="form-group t004_asset_Qty">
<input type="text" data-table="t004_asset" data-field="x_Qty" name="x<?php echo $t004_asset_list->RowIndex ?>_Qty" id="x<?php echo $t004_asset_list->RowIndex ?>_Qty" size="5" maxlength="14" placeholder="<?php echo HtmlEncode($t004_asset_list->Qty->getPlaceHolder()) ?>" value="<?php echo $t004_asset_list->Qty->EditValue ?>"<?php echo $t004_asset_list->Qty->editAttributes() ?>>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Qty" name="o<?php echo $t004_asset_list->RowIndex ?>_Qty" id="o<?php echo $t004_asset_list->RowIndex ?>_Qty" value="<?php echo HtmlEncode($t004_asset_list->Qty->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks">
<span id="el$rowindex$_t004_asset_Remarks" class="form-group t004_asset_Remarks">
<textarea data-table="t004_asset" data-field="x_Remarks" name="x<?php echo $t004_asset_list->RowIndex ?>_Remarks" id="x<?php echo $t004_asset_list->RowIndex ?>_Remarks" cols="15" rows="1" placeholder="<?php echo HtmlEncode($t004_asset_list->Remarks->getPlaceHolder()) ?>"<?php echo $t004_asset_list->Remarks->editAttributes() ?>><?php echo $t004_asset_list->Remarks->EditValue ?></textarea>
</span>
<input type="hidden" data-table="t004_asset" data-field="x_Remarks" name="o<?php echo $t004_asset_list->RowIndex ?>_Remarks" id="o<?php echo $t004_asset_list->RowIndex ?>_Remarks" value="<?php echo HtmlEncode($t004_asset_list->Remarks->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_asset_list->ListOptions->render("body", "right", $t004_asset_list->RowIndex);
?>
<script>
loadjs.ready(["ft004_assetlist", "load"], function() {
	ft004_assetlist.updateLists(<?php echo $t004_asset_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t004_asset_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t004_asset_list->FormKeyCountName ?>" id="<?php echo $t004_asset_list->FormKeyCountName ?>" value="<?php echo $t004_asset_list->KeyCount ?>">
<?php echo $t004_asset_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t004_asset_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t004_asset_list->FormKeyCountName ?>" id="<?php echo $t004_asset_list->FormKeyCountName ?>" value="<?php echo $t004_asset_list->KeyCount ?>">
<?php echo $t004_asset_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t004_asset->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t004_asset_list->Recordset)
	$t004_asset_list->Recordset->Close();
?>
<?php if (!$t004_asset_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t004_asset_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t004_asset_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t004_asset_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t004_asset_list->TotalRecords == 0 && !$t004_asset->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t004_asset_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t004_asset_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_asset_list->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php include_once "footer.php"; ?>
<?php
$t004_asset_list->terminate();
?>