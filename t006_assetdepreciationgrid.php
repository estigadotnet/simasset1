<?php
namespace PHPMaker2020\p_simasset1;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t006_assetdepreciation_grid))
	$t006_assetdepreciation_grid = new t006_assetdepreciation_grid();

// Run the page
$t006_assetdepreciation_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_assetdepreciation_grid->Page_Render();
?>
<?php if (!$t006_assetdepreciation_grid->isExport()) { ?>
<script>
var ft006_assetdepreciationgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft006_assetdepreciationgrid = new ew.Form("ft006_assetdepreciationgrid", "grid");
	ft006_assetdepreciationgrid.formKeyCountName = '<?php echo $t006_assetdepreciation_grid->FormKeyCountName ?>';

	// Validate form
	ft006_assetdepreciationgrid.validate = function() {
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
			<?php if ($t006_assetdepreciation_grid->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_grid->asset_id->caption(), $t006_assetdepreciation_grid->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_grid->asset_id->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_grid->ListOfYears->Required) { ?>
				elm = this.getElements("x" + infix + "_ListOfYears");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_grid->ListOfYears->caption(), $t006_assetdepreciation_grid->ListOfYears->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_ListOfYears");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_grid->ListOfYears->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_grid->NumberOfMonths->Required) { ?>
				elm = this.getElements("x" + infix + "_NumberOfMonths");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_grid->NumberOfMonths->caption(), $t006_assetdepreciation_grid->NumberOfMonths->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NumberOfMonths");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_grid->NumberOfMonths->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_grid->DepreciationAmount->Required) { ?>
				elm = this.getElements("x" + infix + "_DepreciationAmount");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_grid->DepreciationAmount->caption(), $t006_assetdepreciation_grid->DepreciationAmount->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DepreciationAmount");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_grid->DepreciationAmount->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_grid->DepreciationYtd->Required) { ?>
				elm = this.getElements("x" + infix + "_DepreciationYtd");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_grid->DepreciationYtd->caption(), $t006_assetdepreciation_grid->DepreciationYtd->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_DepreciationYtd");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_grid->DepreciationYtd->errorMessage()) ?>");
			<?php if ($t006_assetdepreciation_grid->NetBookValue->Required) { ?>
				elm = this.getElements("x" + infix + "_NetBookValue");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t006_assetdepreciation_grid->NetBookValue->caption(), $t006_assetdepreciation_grid->NetBookValue->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_NetBookValue");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t006_assetdepreciation_grid->NetBookValue->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft006_assetdepreciationgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "asset_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "ListOfYears", false)) return false;
		if (ew.valueChanged(fobj, infix, "NumberOfMonths", false)) return false;
		if (ew.valueChanged(fobj, infix, "DepreciationAmount", false)) return false;
		if (ew.valueChanged(fobj, infix, "DepreciationYtd", false)) return false;
		if (ew.valueChanged(fobj, infix, "NetBookValue", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft006_assetdepreciationgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft006_assetdepreciationgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft006_assetdepreciationgrid");
});
</script>
<?php } ?>
<?php
$t006_assetdepreciation_grid->renderOtherOptions();
?>
<?php if ($t006_assetdepreciation_grid->TotalRecords > 0 || $t006_assetdepreciation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t006_assetdepreciation_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t006_assetdepreciation">
<div id="ft006_assetdepreciationgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t006_assetdepreciation" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t006_assetdepreciationgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t006_assetdepreciation->RowType = ROWTYPE_HEADER;

// Render list options
$t006_assetdepreciation_grid->renderListOptions();

// Render list options (header, left)
$t006_assetdepreciation_grid->ListOptions->render("header", "left");
?>
<?php if ($t006_assetdepreciation_grid->asset_id->Visible) { // asset_id ?>
	<?php if ($t006_assetdepreciation_grid->SortUrl($t006_assetdepreciation_grid->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t006_assetdepreciation_grid->asset_id->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_asset_id" class="t006_assetdepreciation_asset_id"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t006_assetdepreciation_grid->asset_id->headerCellClass() ?>"><div><div id="elh_t006_assetdepreciation_asset_id" class="t006_assetdepreciation_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_grid->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_grid->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_grid->ListOfYears->Visible) { // ListOfYears ?>
	<?php if ($t006_assetdepreciation_grid->SortUrl($t006_assetdepreciation_grid->ListOfYears) == "") { ?>
		<th data-name="ListOfYears" class="<?php echo $t006_assetdepreciation_grid->ListOfYears->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_ListOfYears" class="t006_assetdepreciation_ListOfYears"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->ListOfYears->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ListOfYears" class="<?php echo $t006_assetdepreciation_grid->ListOfYears->headerCellClass() ?>"><div><div id="elh_t006_assetdepreciation_ListOfYears" class="t006_assetdepreciation_ListOfYears">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->ListOfYears->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_grid->ListOfYears->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_grid->ListOfYears->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_grid->NumberOfMonths->Visible) { // NumberOfMonths ?>
	<?php if ($t006_assetdepreciation_grid->SortUrl($t006_assetdepreciation_grid->NumberOfMonths) == "") { ?>
		<th data-name="NumberOfMonths" class="<?php echo $t006_assetdepreciation_grid->NumberOfMonths->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_NumberOfMonths" class="t006_assetdepreciation_NumberOfMonths"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->NumberOfMonths->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberOfMonths" class="<?php echo $t006_assetdepreciation_grid->NumberOfMonths->headerCellClass() ?>"><div><div id="elh_t006_assetdepreciation_NumberOfMonths" class="t006_assetdepreciation_NumberOfMonths">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->NumberOfMonths->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_grid->NumberOfMonths->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_grid->NumberOfMonths->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_grid->DepreciationAmount->Visible) { // DepreciationAmount ?>
	<?php if ($t006_assetdepreciation_grid->SortUrl($t006_assetdepreciation_grid->DepreciationAmount) == "") { ?>
		<th data-name="DepreciationAmount" class="<?php echo $t006_assetdepreciation_grid->DepreciationAmount->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_DepreciationAmount" class="t006_assetdepreciation_DepreciationAmount"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->DepreciationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepreciationAmount" class="<?php echo $t006_assetdepreciation_grid->DepreciationAmount->headerCellClass() ?>"><div><div id="elh_t006_assetdepreciation_DepreciationAmount" class="t006_assetdepreciation_DepreciationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->DepreciationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_grid->DepreciationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_grid->DepreciationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_grid->DepreciationYtd->Visible) { // DepreciationYtd ?>
	<?php if ($t006_assetdepreciation_grid->SortUrl($t006_assetdepreciation_grid->DepreciationYtd) == "") { ?>
		<th data-name="DepreciationYtd" class="<?php echo $t006_assetdepreciation_grid->DepreciationYtd->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_DepreciationYtd" class="t006_assetdepreciation_DepreciationYtd"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->DepreciationYtd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepreciationYtd" class="<?php echo $t006_assetdepreciation_grid->DepreciationYtd->headerCellClass() ?>"><div><div id="elh_t006_assetdepreciation_DepreciationYtd" class="t006_assetdepreciation_DepreciationYtd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->DepreciationYtd->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_grid->DepreciationYtd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_grid->DepreciationYtd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_grid->NetBookValue->Visible) { // NetBookValue ?>
	<?php if ($t006_assetdepreciation_grid->SortUrl($t006_assetdepreciation_grid->NetBookValue) == "") { ?>
		<th data-name="NetBookValue" class="<?php echo $t006_assetdepreciation_grid->NetBookValue->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_NetBookValue" class="t006_assetdepreciation_NetBookValue"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->NetBookValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NetBookValue" class="<?php echo $t006_assetdepreciation_grid->NetBookValue->headerCellClass() ?>"><div><div id="elh_t006_assetdepreciation_NetBookValue" class="t006_assetdepreciation_NetBookValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_grid->NetBookValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_grid->NetBookValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_grid->NetBookValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t006_assetdepreciation_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t006_assetdepreciation_grid->StartRecord = 1;
$t006_assetdepreciation_grid->StopRecord = $t006_assetdepreciation_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t006_assetdepreciation->isConfirm() || $t006_assetdepreciation_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t006_assetdepreciation_grid->FormKeyCountName) && ($t006_assetdepreciation_grid->isGridAdd() || $t006_assetdepreciation_grid->isGridEdit() || $t006_assetdepreciation->isConfirm())) {
		$t006_assetdepreciation_grid->KeyCount = $CurrentForm->getValue($t006_assetdepreciation_grid->FormKeyCountName);
		$t006_assetdepreciation_grid->StopRecord = $t006_assetdepreciation_grid->StartRecord + $t006_assetdepreciation_grid->KeyCount - 1;
	}
}
$t006_assetdepreciation_grid->RecordCount = $t006_assetdepreciation_grid->StartRecord - 1;
if ($t006_assetdepreciation_grid->Recordset && !$t006_assetdepreciation_grid->Recordset->EOF) {
	$t006_assetdepreciation_grid->Recordset->moveFirst();
	$selectLimit = $t006_assetdepreciation_grid->UseSelectLimit;
	if (!$selectLimit && $t006_assetdepreciation_grid->StartRecord > 1)
		$t006_assetdepreciation_grid->Recordset->move($t006_assetdepreciation_grid->StartRecord - 1);
} elseif (!$t006_assetdepreciation->AllowAddDeleteRow && $t006_assetdepreciation_grid->StopRecord == 0) {
	$t006_assetdepreciation_grid->StopRecord = $t006_assetdepreciation->GridAddRowCount;
}

// Initialize aggregate
$t006_assetdepreciation->RowType = ROWTYPE_AGGREGATEINIT;
$t006_assetdepreciation->resetAttributes();
$t006_assetdepreciation_grid->renderRow();
if ($t006_assetdepreciation_grid->isGridAdd())
	$t006_assetdepreciation_grid->RowIndex = 0;
if ($t006_assetdepreciation_grid->isGridEdit())
	$t006_assetdepreciation_grid->RowIndex = 0;
while ($t006_assetdepreciation_grid->RecordCount < $t006_assetdepreciation_grid->StopRecord) {
	$t006_assetdepreciation_grid->RecordCount++;
	if ($t006_assetdepreciation_grid->RecordCount >= $t006_assetdepreciation_grid->StartRecord) {
		$t006_assetdepreciation_grid->RowCount++;
		if ($t006_assetdepreciation_grid->isGridAdd() || $t006_assetdepreciation_grid->isGridEdit() || $t006_assetdepreciation->isConfirm()) {
			$t006_assetdepreciation_grid->RowIndex++;
			$CurrentForm->Index = $t006_assetdepreciation_grid->RowIndex;
			if ($CurrentForm->hasValue($t006_assetdepreciation_grid->FormActionName) && ($t006_assetdepreciation->isConfirm() || $t006_assetdepreciation_grid->EventCancelled))
				$t006_assetdepreciation_grid->RowAction = strval($CurrentForm->getValue($t006_assetdepreciation_grid->FormActionName));
			elseif ($t006_assetdepreciation_grid->isGridAdd())
				$t006_assetdepreciation_grid->RowAction = "insert";
			else
				$t006_assetdepreciation_grid->RowAction = "";
		}

		// Set up key count
		$t006_assetdepreciation_grid->KeyCount = $t006_assetdepreciation_grid->RowIndex;

		// Init row class and style
		$t006_assetdepreciation->resetAttributes();
		$t006_assetdepreciation->CssClass = "";
		if ($t006_assetdepreciation_grid->isGridAdd()) {
			if ($t006_assetdepreciation->CurrentMode == "copy") {
				$t006_assetdepreciation_grid->loadRowValues($t006_assetdepreciation_grid->Recordset); // Load row values
				$t006_assetdepreciation_grid->setRecordKey($t006_assetdepreciation_grid->RowOldKey, $t006_assetdepreciation_grid->Recordset); // Set old record key
			} else {
				$t006_assetdepreciation_grid->loadRowValues(); // Load default values
				$t006_assetdepreciation_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t006_assetdepreciation_grid->loadRowValues($t006_assetdepreciation_grid->Recordset); // Load row values
		}
		$t006_assetdepreciation->RowType = ROWTYPE_VIEW; // Render view
		if ($t006_assetdepreciation_grid->isGridAdd()) // Grid add
			$t006_assetdepreciation->RowType = ROWTYPE_ADD; // Render add
		if ($t006_assetdepreciation_grid->isGridAdd() && $t006_assetdepreciation->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t006_assetdepreciation_grid->restoreCurrentRowFormValues($t006_assetdepreciation_grid->RowIndex); // Restore form values
		if ($t006_assetdepreciation_grid->isGridEdit()) { // Grid edit
			if ($t006_assetdepreciation->EventCancelled)
				$t006_assetdepreciation_grid->restoreCurrentRowFormValues($t006_assetdepreciation_grid->RowIndex); // Restore form values
			if ($t006_assetdepreciation_grid->RowAction == "insert")
				$t006_assetdepreciation->RowType = ROWTYPE_ADD; // Render add
			else
				$t006_assetdepreciation->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t006_assetdepreciation_grid->isGridEdit() && ($t006_assetdepreciation->RowType == ROWTYPE_EDIT || $t006_assetdepreciation->RowType == ROWTYPE_ADD) && $t006_assetdepreciation->EventCancelled) // Update failed
			$t006_assetdepreciation_grid->restoreCurrentRowFormValues($t006_assetdepreciation_grid->RowIndex); // Restore form values
		if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT) // Edit row
			$t006_assetdepreciation_grid->EditRowCount++;
		if ($t006_assetdepreciation->isConfirm()) // Confirm row
			$t006_assetdepreciation_grid->restoreCurrentRowFormValues($t006_assetdepreciation_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t006_assetdepreciation->RowAttrs->merge(["data-rowindex" => $t006_assetdepreciation_grid->RowCount, "id" => "r" . $t006_assetdepreciation_grid->RowCount . "_t006_assetdepreciation", "data-rowtype" => $t006_assetdepreciation->RowType]);

		// Render row
		$t006_assetdepreciation_grid->renderRow();

		// Render list options
		$t006_assetdepreciation_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t006_assetdepreciation_grid->RowAction != "delete" && $t006_assetdepreciation_grid->RowAction != "insertdelete" && !($t006_assetdepreciation_grid->RowAction == "insert" && $t006_assetdepreciation->isConfirm() && $t006_assetdepreciation_grid->emptyRow())) {
?>
	<tr <?php echo $t006_assetdepreciation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_assetdepreciation_grid->ListOptions->render("body", "left", $t006_assetdepreciation_grid->RowCount);
?>
	<?php if ($t006_assetdepreciation_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t006_assetdepreciation_grid->asset_id->cellAttributes() ?>>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t006_assetdepreciation_grid->asset_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_asset_id" class="form-group">
<span<?php echo $t006_assetdepreciation_grid->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_asset_id" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->asset_id->EditValue ?>"<?php echo $t006_assetdepreciation_grid->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_asset_id" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t006_assetdepreciation_grid->asset_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_asset_id" class="form-group">
<span<?php echo $t006_assetdepreciation_grid->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_asset_id" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->asset_id->EditValue ?>"<?php echo $t006_assetdepreciation_grid->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_grid->asset_id->viewAttributes() ?>><?php echo $t006_assetdepreciation_grid->asset_id->getViewValue() ?></span>
</span>
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_asset_id" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_asset_id" name="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_asset_id" name="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_id" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_id" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_id" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT || $t006_assetdepreciation->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_id" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t006_assetdepreciation_grid->ListOfYears->Visible) { // ListOfYears ?>
		<td data-name="ListOfYears" <?php echo $t006_assetdepreciation_grid->ListOfYears->cellAttributes() ?>>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_ListOfYears" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->ListOfYears->EditValue ?>"<?php echo $t006_assetdepreciation_grid->ListOfYears->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->OldValue) ?>">
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_ListOfYears" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->ListOfYears->EditValue ?>"<?php echo $t006_assetdepreciation_grid->ListOfYears->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_ListOfYears">
<span<?php echo $t006_assetdepreciation_grid->ListOfYears->viewAttributes() ?>><?php echo $t006_assetdepreciation_grid->ListOfYears->getViewValue() ?></span>
</span>
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->NumberOfMonths->Visible) { // NumberOfMonths ?>
		<td data-name="NumberOfMonths" <?php echo $t006_assetdepreciation_grid->NumberOfMonths->cellAttributes() ?>>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_NumberOfMonths" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->NumberOfMonths->EditValue ?>"<?php echo $t006_assetdepreciation_grid->NumberOfMonths->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->OldValue) ?>">
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_NumberOfMonths" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->NumberOfMonths->EditValue ?>"<?php echo $t006_assetdepreciation_grid->NumberOfMonths->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_NumberOfMonths">
<span<?php echo $t006_assetdepreciation_grid->NumberOfMonths->viewAttributes() ?>><?php echo $t006_assetdepreciation_grid->NumberOfMonths->getViewValue() ?></span>
</span>
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->DepreciationAmount->Visible) { // DepreciationAmount ?>
		<td data-name="DepreciationAmount" <?php echo $t006_assetdepreciation_grid->DepreciationAmount->cellAttributes() ?>>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_DepreciationAmount" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->DepreciationAmount->EditValue ?>"<?php echo $t006_assetdepreciation_grid->DepreciationAmount->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->OldValue) ?>">
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_DepreciationAmount" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->DepreciationAmount->EditValue ?>"<?php echo $t006_assetdepreciation_grid->DepreciationAmount->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_DepreciationAmount">
<span<?php echo $t006_assetdepreciation_grid->DepreciationAmount->viewAttributes() ?>><?php echo $t006_assetdepreciation_grid->DepreciationAmount->getViewValue() ?></span>
</span>
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->DepreciationYtd->Visible) { // DepreciationYtd ?>
		<td data-name="DepreciationYtd" <?php echo $t006_assetdepreciation_grid->DepreciationYtd->cellAttributes() ?>>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_DepreciationYtd" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->DepreciationYtd->EditValue ?>"<?php echo $t006_assetdepreciation_grid->DepreciationYtd->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->OldValue) ?>">
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_DepreciationYtd" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->DepreciationYtd->EditValue ?>"<?php echo $t006_assetdepreciation_grid->DepreciationYtd->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_DepreciationYtd">
<span<?php echo $t006_assetdepreciation_grid->DepreciationYtd->viewAttributes() ?>><?php echo $t006_assetdepreciation_grid->DepreciationYtd->getViewValue() ?></span>
</span>
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->NetBookValue->Visible) { // NetBookValue ?>
		<td data-name="NetBookValue" <?php echo $t006_assetdepreciation_grid->NetBookValue->cellAttributes() ?>>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_NetBookValue" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->NetBookValue->EditValue ?>"<?php echo $t006_assetdepreciation_grid->NetBookValue->editAttributes() ?>>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->OldValue) ?>">
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_NetBookValue" class="form-group">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->NetBookValue->EditValue ?>"<?php echo $t006_assetdepreciation_grid->NetBookValue->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t006_assetdepreciation_grid->RowCount ?>_t006_assetdepreciation_NetBookValue">
<span<?php echo $t006_assetdepreciation_grid->NetBookValue->viewAttributes() ?>><?php echo $t006_assetdepreciation_grid->NetBookValue->getViewValue() ?></span>
</span>
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="ft006_assetdepreciationgrid$x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->FormValue) ?>">
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="ft006_assetdepreciationgrid$o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_assetdepreciation_grid->ListOptions->render("body", "right", $t006_assetdepreciation_grid->RowCount);
?>
	</tr>
<?php if ($t006_assetdepreciation->RowType == ROWTYPE_ADD || $t006_assetdepreciation->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft006_assetdepreciationgrid", "load"], function() {
	ft006_assetdepreciationgrid.updateLists(<?php echo $t006_assetdepreciation_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t006_assetdepreciation_grid->isGridAdd() || $t006_assetdepreciation->CurrentMode == "copy")
		if (!$t006_assetdepreciation_grid->Recordset->EOF)
			$t006_assetdepreciation_grid->Recordset->moveNext();
}
?>
<?php
	if ($t006_assetdepreciation->CurrentMode == "add" || $t006_assetdepreciation->CurrentMode == "copy" || $t006_assetdepreciation->CurrentMode == "edit") {
		$t006_assetdepreciation_grid->RowIndex = '$rowindex$';
		$t006_assetdepreciation_grid->loadRowValues();

		// Set row properties
		$t006_assetdepreciation->resetAttributes();
		$t006_assetdepreciation->RowAttrs->merge(["data-rowindex" => $t006_assetdepreciation_grid->RowIndex, "id" => "r0_t006_assetdepreciation", "data-rowtype" => ROWTYPE_ADD]);
		$t006_assetdepreciation->RowAttrs->appendClass("ew-template");
		$t006_assetdepreciation->RowType = ROWTYPE_ADD;

		// Render row
		$t006_assetdepreciation_grid->renderRow();

		// Render list options
		$t006_assetdepreciation_grid->renderListOptions();
		$t006_assetdepreciation_grid->StartRowCount = 0;
?>
	<tr <?php echo $t006_assetdepreciation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_assetdepreciation_grid->ListOptions->render("body", "left", $t006_assetdepreciation_grid->RowIndex);
?>
	<?php if ($t006_assetdepreciation_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<?php if ($t006_assetdepreciation_grid->asset_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t006_assetdepreciation_asset_id" class="form-group t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_grid->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t006_assetdepreciation_asset_id" class="form-group t006_assetdepreciation_asset_id">
<input type="text" data-table="t006_assetdepreciation" data-field="x_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->asset_id->EditValue ?>"<?php echo $t006_assetdepreciation_grid->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t006_assetdepreciation_asset_id" class="form-group t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_grid->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_asset_id" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_asset_id" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->asset_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->ListOfYears->Visible) { // ListOfYears ?>
		<td data-name="ListOfYears">
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<span id="el$rowindex$_t006_assetdepreciation_ListOfYears" class="form-group t006_assetdepreciation_ListOfYears">
<input type="text" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" size="30" maxlength="6" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->ListOfYears->EditValue ?>"<?php echo $t006_assetdepreciation_grid->ListOfYears->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t006_assetdepreciation_ListOfYears" class="form-group t006_assetdepreciation_ListOfYears">
<span<?php echo $t006_assetdepreciation_grid->ListOfYears->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->ListOfYears->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_ListOfYears" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_ListOfYears" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->ListOfYears->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->NumberOfMonths->Visible) { // NumberOfMonths ?>
		<td data-name="NumberOfMonths">
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<span id="el$rowindex$_t006_assetdepreciation_NumberOfMonths" class="form-group t006_assetdepreciation_NumberOfMonths">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" size="30" maxlength="4" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->NumberOfMonths->EditValue ?>"<?php echo $t006_assetdepreciation_grid->NumberOfMonths->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t006_assetdepreciation_NumberOfMonths" class="form-group t006_assetdepreciation_NumberOfMonths">
<span<?php echo $t006_assetdepreciation_grid->NumberOfMonths->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->NumberOfMonths->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NumberOfMonths" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NumberOfMonths" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NumberOfMonths->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->DepreciationAmount->Visible) { // DepreciationAmount ?>
		<td data-name="DepreciationAmount">
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<span id="el$rowindex$_t006_assetdepreciation_DepreciationAmount" class="form-group t006_assetdepreciation_DepreciationAmount">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->DepreciationAmount->EditValue ?>"<?php echo $t006_assetdepreciation_grid->DepreciationAmount->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t006_assetdepreciation_DepreciationAmount" class="form-group t006_assetdepreciation_DepreciationAmount">
<span<?php echo $t006_assetdepreciation_grid->DepreciationAmount->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->DepreciationAmount->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationAmount" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationAmount" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationAmount->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->DepreciationYtd->Visible) { // DepreciationYtd ?>
		<td data-name="DepreciationYtd">
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<span id="el$rowindex$_t006_assetdepreciation_DepreciationYtd" class="form-group t006_assetdepreciation_DepreciationYtd">
<input type="text" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->DepreciationYtd->EditValue ?>"<?php echo $t006_assetdepreciation_grid->DepreciationYtd->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t006_assetdepreciation_DepreciationYtd" class="form-group t006_assetdepreciation_DepreciationYtd">
<span<?php echo $t006_assetdepreciation_grid->DepreciationYtd->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->DepreciationYtd->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_DepreciationYtd" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_DepreciationYtd" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->DepreciationYtd->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_grid->NetBookValue->Visible) { // NetBookValue ?>
		<td data-name="NetBookValue">
<?php if (!$t006_assetdepreciation->isConfirm()) { ?>
<span id="el$rowindex$_t006_assetdepreciation_NetBookValue" class="form-group t006_assetdepreciation_NetBookValue">
<input type="text" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" size="30" maxlength="14" placeholder="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->getPlaceHolder()) ?>" value="<?php echo $t006_assetdepreciation_grid->NetBookValue->EditValue ?>"<?php echo $t006_assetdepreciation_grid->NetBookValue->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t006_assetdepreciation_NetBookValue" class="form-group t006_assetdepreciation_NetBookValue">
<span<?php echo $t006_assetdepreciation_grid->NetBookValue->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t006_assetdepreciation_grid->NetBookValue->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="x<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t006_assetdepreciation" data-field="x_NetBookValue" name="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" id="o<?php echo $t006_assetdepreciation_grid->RowIndex ?>_NetBookValue" value="<?php echo HtmlEncode($t006_assetdepreciation_grid->NetBookValue->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_assetdepreciation_grid->ListOptions->render("body", "right", $t006_assetdepreciation_grid->RowIndex);
?>
<script>
loadjs.ready(["ft006_assetdepreciationgrid", "load"], function() {
	ft006_assetdepreciationgrid.updateLists(<?php echo $t006_assetdepreciation_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t006_assetdepreciation->CurrentMode == "add" || $t006_assetdepreciation->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t006_assetdepreciation_grid->FormKeyCountName ?>" id="<?php echo $t006_assetdepreciation_grid->FormKeyCountName ?>" value="<?php echo $t006_assetdepreciation_grid->KeyCount ?>">
<?php echo $t006_assetdepreciation_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t006_assetdepreciation->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t006_assetdepreciation_grid->FormKeyCountName ?>" id="<?php echo $t006_assetdepreciation_grid->FormKeyCountName ?>" value="<?php echo $t006_assetdepreciation_grid->KeyCount ?>">
<?php echo $t006_assetdepreciation_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t006_assetdepreciation->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft006_assetdepreciationgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t006_assetdepreciation_grid->Recordset)
	$t006_assetdepreciation_grid->Recordset->Close();
?>
<?php if ($t006_assetdepreciation_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t006_assetdepreciation_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t006_assetdepreciation_grid->TotalRecords == 0 && !$t006_assetdepreciation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t006_assetdepreciation_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t006_assetdepreciation_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t006_assetdepreciation_grid->terminate();
?>