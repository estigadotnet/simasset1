<?php
namespace PHPMaker2020\p_simasset1;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t104_ho1_detail_grid))
	$t104_ho1_detail_grid = new t104_ho1_detail_grid();

// Run the page
$t104_ho1_detail_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t104_ho1_detail_grid->Page_Render();
?>
<?php if (!$t104_ho1_detail_grid->isExport()) { ?>
<script>
var ft104_ho1_detailgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft104_ho1_detailgrid = new ew.Form("ft104_ho1_detailgrid", "grid");
	ft104_ho1_detailgrid.formKeyCountName = '<?php echo $t104_ho1_detail_grid->FormKeyCountName ?>';

	// Validate form
	ft104_ho1_detailgrid.validate = function() {
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
			<?php if ($t104_ho1_detail_grid->id->Required) { ?>
				elm = this.getElements("x" + infix + "_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t104_ho1_detail_grid->id->caption(), $t104_ho1_detail_grid->id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t104_ho1_detail_grid->hohead_id->Required) { ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t104_ho1_detail_grid->hohead_id->caption(), $t104_ho1_detail_grid->hohead_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_hohead_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t104_ho1_detail_grid->hohead_id->errorMessage()) ?>");
			<?php if ($t104_ho1_detail_grid->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t104_ho1_detail_grid->asset_id->caption(), $t104_ho1_detail_grid->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t104_ho1_detail_grid->asset_id->errorMessage()) ?>");

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft104_ho1_detailgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "hohead_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "asset_id", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft104_ho1_detailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft104_ho1_detailgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft104_ho1_detailgrid");
});
</script>
<?php } ?>
<?php
$t104_ho1_detail_grid->renderOtherOptions();
?>
<?php if ($t104_ho1_detail_grid->TotalRecords > 0 || $t104_ho1_detail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t104_ho1_detail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t104_ho1_detail">
<div id="ft104_ho1_detailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t104_ho1_detail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t104_ho1_detailgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t104_ho1_detail->RowType = ROWTYPE_HEADER;

// Render list options
$t104_ho1_detail_grid->renderListOptions();

// Render list options (header, left)
$t104_ho1_detail_grid->ListOptions->render("header", "left");
?>
<?php if ($t104_ho1_detail_grid->id->Visible) { // id ?>
	<?php if ($t104_ho1_detail_grid->SortUrl($t104_ho1_detail_grid->id) == "") { ?>
		<th data-name="id" class="<?php echo $t104_ho1_detail_grid->id->headerCellClass() ?>"><div id="elh_t104_ho1_detail_id" class="t104_ho1_detail_id"><div class="ew-table-header-caption"><?php echo $t104_ho1_detail_grid->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t104_ho1_detail_grid->id->headerCellClass() ?>"><div><div id="elh_t104_ho1_detail_id" class="t104_ho1_detail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t104_ho1_detail_grid->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t104_ho1_detail_grid->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t104_ho1_detail_grid->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t104_ho1_detail_grid->hohead_id->Visible) { // hohead_id ?>
	<?php if ($t104_ho1_detail_grid->SortUrl($t104_ho1_detail_grid->hohead_id) == "") { ?>
		<th data-name="hohead_id" class="<?php echo $t104_ho1_detail_grid->hohead_id->headerCellClass() ?>"><div id="elh_t104_ho1_detail_hohead_id" class="t104_ho1_detail_hohead_id"><div class="ew-table-header-caption"><?php echo $t104_ho1_detail_grid->hohead_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hohead_id" class="<?php echo $t104_ho1_detail_grid->hohead_id->headerCellClass() ?>"><div><div id="elh_t104_ho1_detail_hohead_id" class="t104_ho1_detail_hohead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t104_ho1_detail_grid->hohead_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t104_ho1_detail_grid->hohead_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t104_ho1_detail_grid->hohead_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t104_ho1_detail_grid->asset_id->Visible) { // asset_id ?>
	<?php if ($t104_ho1_detail_grid->SortUrl($t104_ho1_detail_grid->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t104_ho1_detail_grid->asset_id->headerCellClass() ?>"><div id="elh_t104_ho1_detail_asset_id" class="t104_ho1_detail_asset_id"><div class="ew-table-header-caption"><?php echo $t104_ho1_detail_grid->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t104_ho1_detail_grid->asset_id->headerCellClass() ?>"><div><div id="elh_t104_ho1_detail_asset_id" class="t104_ho1_detail_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t104_ho1_detail_grid->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t104_ho1_detail_grid->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t104_ho1_detail_grid->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t104_ho1_detail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t104_ho1_detail_grid->StartRecord = 1;
$t104_ho1_detail_grid->StopRecord = $t104_ho1_detail_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t104_ho1_detail->isConfirm() || $t104_ho1_detail_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t104_ho1_detail_grid->FormKeyCountName) && ($t104_ho1_detail_grid->isGridAdd() || $t104_ho1_detail_grid->isGridEdit() || $t104_ho1_detail->isConfirm())) {
		$t104_ho1_detail_grid->KeyCount = $CurrentForm->getValue($t104_ho1_detail_grid->FormKeyCountName);
		$t104_ho1_detail_grid->StopRecord = $t104_ho1_detail_grid->StartRecord + $t104_ho1_detail_grid->KeyCount - 1;
	}
}
$t104_ho1_detail_grid->RecordCount = $t104_ho1_detail_grid->StartRecord - 1;
if ($t104_ho1_detail_grid->Recordset && !$t104_ho1_detail_grid->Recordset->EOF) {
	$t104_ho1_detail_grid->Recordset->moveFirst();
	$selectLimit = $t104_ho1_detail_grid->UseSelectLimit;
	if (!$selectLimit && $t104_ho1_detail_grid->StartRecord > 1)
		$t104_ho1_detail_grid->Recordset->move($t104_ho1_detail_grid->StartRecord - 1);
} elseif (!$t104_ho1_detail->AllowAddDeleteRow && $t104_ho1_detail_grid->StopRecord == 0) {
	$t104_ho1_detail_grid->StopRecord = $t104_ho1_detail->GridAddRowCount;
}

// Initialize aggregate
$t104_ho1_detail->RowType = ROWTYPE_AGGREGATEINIT;
$t104_ho1_detail->resetAttributes();
$t104_ho1_detail_grid->renderRow();
if ($t104_ho1_detail_grid->isGridAdd())
	$t104_ho1_detail_grid->RowIndex = 0;
if ($t104_ho1_detail_grid->isGridEdit())
	$t104_ho1_detail_grid->RowIndex = 0;
while ($t104_ho1_detail_grid->RecordCount < $t104_ho1_detail_grid->StopRecord) {
	$t104_ho1_detail_grid->RecordCount++;
	if ($t104_ho1_detail_grid->RecordCount >= $t104_ho1_detail_grid->StartRecord) {
		$t104_ho1_detail_grid->RowCount++;
		if ($t104_ho1_detail_grid->isGridAdd() || $t104_ho1_detail_grid->isGridEdit() || $t104_ho1_detail->isConfirm()) {
			$t104_ho1_detail_grid->RowIndex++;
			$CurrentForm->Index = $t104_ho1_detail_grid->RowIndex;
			if ($CurrentForm->hasValue($t104_ho1_detail_grid->FormActionName) && ($t104_ho1_detail->isConfirm() || $t104_ho1_detail_grid->EventCancelled))
				$t104_ho1_detail_grid->RowAction = strval($CurrentForm->getValue($t104_ho1_detail_grid->FormActionName));
			elseif ($t104_ho1_detail_grid->isGridAdd())
				$t104_ho1_detail_grid->RowAction = "insert";
			else
				$t104_ho1_detail_grid->RowAction = "";
		}

		// Set up key count
		$t104_ho1_detail_grid->KeyCount = $t104_ho1_detail_grid->RowIndex;

		// Init row class and style
		$t104_ho1_detail->resetAttributes();
		$t104_ho1_detail->CssClass = "";
		if ($t104_ho1_detail_grid->isGridAdd()) {
			if ($t104_ho1_detail->CurrentMode == "copy") {
				$t104_ho1_detail_grid->loadRowValues($t104_ho1_detail_grid->Recordset); // Load row values
				$t104_ho1_detail_grid->setRecordKey($t104_ho1_detail_grid->RowOldKey, $t104_ho1_detail_grid->Recordset); // Set old record key
			} else {
				$t104_ho1_detail_grid->loadRowValues(); // Load default values
				$t104_ho1_detail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t104_ho1_detail_grid->loadRowValues($t104_ho1_detail_grid->Recordset); // Load row values
		}
		$t104_ho1_detail->RowType = ROWTYPE_VIEW; // Render view
		if ($t104_ho1_detail_grid->isGridAdd()) // Grid add
			$t104_ho1_detail->RowType = ROWTYPE_ADD; // Render add
		if ($t104_ho1_detail_grid->isGridAdd() && $t104_ho1_detail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t104_ho1_detail_grid->restoreCurrentRowFormValues($t104_ho1_detail_grid->RowIndex); // Restore form values
		if ($t104_ho1_detail_grid->isGridEdit()) { // Grid edit
			if ($t104_ho1_detail->EventCancelled)
				$t104_ho1_detail_grid->restoreCurrentRowFormValues($t104_ho1_detail_grid->RowIndex); // Restore form values
			if ($t104_ho1_detail_grid->RowAction == "insert")
				$t104_ho1_detail->RowType = ROWTYPE_ADD; // Render add
			else
				$t104_ho1_detail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t104_ho1_detail_grid->isGridEdit() && ($t104_ho1_detail->RowType == ROWTYPE_EDIT || $t104_ho1_detail->RowType == ROWTYPE_ADD) && $t104_ho1_detail->EventCancelled) // Update failed
			$t104_ho1_detail_grid->restoreCurrentRowFormValues($t104_ho1_detail_grid->RowIndex); // Restore form values
		if ($t104_ho1_detail->RowType == ROWTYPE_EDIT) // Edit row
			$t104_ho1_detail_grid->EditRowCount++;
		if ($t104_ho1_detail->isConfirm()) // Confirm row
			$t104_ho1_detail_grid->restoreCurrentRowFormValues($t104_ho1_detail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t104_ho1_detail->RowAttrs->merge(["data-rowindex" => $t104_ho1_detail_grid->RowCount, "id" => "r" . $t104_ho1_detail_grid->RowCount . "_t104_ho1_detail", "data-rowtype" => $t104_ho1_detail->RowType]);

		// Render row
		$t104_ho1_detail_grid->renderRow();

		// Render list options
		$t104_ho1_detail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t104_ho1_detail_grid->RowAction != "delete" && $t104_ho1_detail_grid->RowAction != "insertdelete" && !($t104_ho1_detail_grid->RowAction == "insert" && $t104_ho1_detail->isConfirm() && $t104_ho1_detail_grid->emptyRow())) {
?>
	<tr <?php echo $t104_ho1_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t104_ho1_detail_grid->ListOptions->render("body", "left", $t104_ho1_detail_grid->RowCount);
?>
	<?php if ($t104_ho1_detail_grid->id->Visible) { // id ?>
		<td data-name="id" <?php echo $t104_ho1_detail_grid->id->cellAttributes() ?>>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_id" class="form-group"></span>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_id" class="form-group">
<span<?php echo $t104_ho1_detail_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_grid->id->EditValue)) ?>"></span>
</span>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->CurrentValue) ?>">
<?php } ?>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_id">
<span<?php echo $t104_ho1_detail_grid->id->viewAttributes() ?>><?php echo $t104_ho1_detail_grid->id->getViewValue() ?></span>
</span>
<?php if (!$t104_ho1_detail->isConfirm()) { ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->FormValue) ?>">
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="ft104_ho1_detailgrid$x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="ft104_ho1_detailgrid$x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->FormValue) ?>">
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="ft104_ho1_detailgrid$o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="ft104_ho1_detailgrid$o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t104_ho1_detail_grid->hohead_id->Visible) { // hohead_id ?>
		<td data-name="hohead_id" <?php echo $t104_ho1_detail_grid->hohead_id->cellAttributes() ?>>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t104_ho1_detail_grid->hohead_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_hohead_id" class="form-group">
<span<?php echo $t104_ho1_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_hohead_id" class="form-group">
<input type="text" data-table="t104_ho1_detail" data-field="x_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_grid->hohead_id->EditValue ?>"<?php echo $t104_ho1_detail_grid->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_hohead_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->OldValue) ?>">
<?php } ?>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t104_ho1_detail_grid->hohead_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_hohead_id" class="form-group">
<span<?php echo $t104_ho1_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_hohead_id" class="form-group">
<input type="text" data-table="t104_ho1_detail" data-field="x_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_grid->hohead_id->EditValue ?>"<?php echo $t104_ho1_detail_grid->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_hohead_id">
<span<?php echo $t104_ho1_detail_grid->hohead_id->viewAttributes() ?>><?php echo $t104_ho1_detail_grid->hohead_id->getViewValue() ?></span>
</span>
<?php if (!$t104_ho1_detail->isConfirm()) { ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->FormValue) ?>">
<input type="hidden" data-table="t104_ho1_detail" data-field="x_hohead_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_hohead_id" name="ft104_ho1_detailgrid$x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="ft104_ho1_detailgrid$x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->FormValue) ?>">
<input type="hidden" data-table="t104_ho1_detail" data-field="x_hohead_id" name="ft104_ho1_detailgrid$o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="ft104_ho1_detailgrid$o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t104_ho1_detail_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t104_ho1_detail_grid->asset_id->cellAttributes() ?>>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_asset_id" class="form-group">
<input type="text" data-table="t104_ho1_detail" data-field="x_asset_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_grid->asset_id->EditValue ?>"<?php echo $t104_ho1_detail_grid->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_asset_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_asset_id" class="form-group">
<input type="text" data-table="t104_ho1_detail" data-field="x_asset_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_grid->asset_id->EditValue ?>"<?php echo $t104_ho1_detail_grid->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t104_ho1_detail_grid->RowCount ?>_t104_ho1_detail_asset_id">
<span<?php echo $t104_ho1_detail_grid->asset_id->viewAttributes() ?>><?php echo $t104_ho1_detail_grid->asset_id->getViewValue() ?></span>
</span>
<?php if (!$t104_ho1_detail->isConfirm()) { ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_asset_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t104_ho1_detail" data-field="x_asset_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_asset_id" name="ft104_ho1_detailgrid$x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="ft104_ho1_detailgrid$x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t104_ho1_detail" data-field="x_asset_id" name="ft104_ho1_detailgrid$o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="ft104_ho1_detailgrid$o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t104_ho1_detail_grid->ListOptions->render("body", "right", $t104_ho1_detail_grid->RowCount);
?>
	</tr>
<?php if ($t104_ho1_detail->RowType == ROWTYPE_ADD || $t104_ho1_detail->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft104_ho1_detailgrid", "load"], function() {
	ft104_ho1_detailgrid.updateLists(<?php echo $t104_ho1_detail_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t104_ho1_detail_grid->isGridAdd() || $t104_ho1_detail->CurrentMode == "copy")
		if (!$t104_ho1_detail_grid->Recordset->EOF)
			$t104_ho1_detail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t104_ho1_detail->CurrentMode == "add" || $t104_ho1_detail->CurrentMode == "copy" || $t104_ho1_detail->CurrentMode == "edit") {
		$t104_ho1_detail_grid->RowIndex = '$rowindex$';
		$t104_ho1_detail_grid->loadRowValues();

		// Set row properties
		$t104_ho1_detail->resetAttributes();
		$t104_ho1_detail->RowAttrs->merge(["data-rowindex" => $t104_ho1_detail_grid->RowIndex, "id" => "r0_t104_ho1_detail", "data-rowtype" => ROWTYPE_ADD]);
		$t104_ho1_detail->RowAttrs->appendClass("ew-template");
		$t104_ho1_detail->RowType = ROWTYPE_ADD;

		// Render row
		$t104_ho1_detail_grid->renderRow();

		// Render list options
		$t104_ho1_detail_grid->renderListOptions();
		$t104_ho1_detail_grid->StartRowCount = 0;
?>
	<tr <?php echo $t104_ho1_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t104_ho1_detail_grid->ListOptions->render("body", "left", $t104_ho1_detail_grid->RowIndex);
?>
	<?php if ($t104_ho1_detail_grid->id->Visible) { // id ?>
		<td data-name="id">
<?php if (!$t104_ho1_detail->isConfirm()) { ?>
<span id="el$rowindex$_t104_ho1_detail_id" class="form-group t104_ho1_detail_id"></span>
<?php } else { ?>
<span id="el$rowindex$_t104_ho1_detail_id" class="form-group t104_ho1_detail_id">
<span<?php echo $t104_ho1_detail_grid->id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_grid->id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t104_ho1_detail_grid->hohead_id->Visible) { // hohead_id ?>
		<td data-name="hohead_id">
<?php if (!$t104_ho1_detail->isConfirm()) { ?>
<?php if ($t104_ho1_detail_grid->hohead_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t104_ho1_detail_hohead_id" class="form-group t104_ho1_detail_hohead_id">
<span<?php echo $t104_ho1_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t104_ho1_detail_hohead_id" class="form-group t104_ho1_detail_hohead_id">
<input type="text" data-table="t104_ho1_detail" data-field="x_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_grid->hohead_id->EditValue ?>"<?php echo $t104_ho1_detail_grid->hohead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t104_ho1_detail_hohead_id" class="form-group t104_ho1_detail_hohead_id">
<span<?php echo $t104_ho1_detail_grid->hohead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_grid->hohead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_hohead_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_hohead_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_hohead_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->hohead_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t104_ho1_detail_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<?php if (!$t104_ho1_detail->isConfirm()) { ?>
<span id="el$rowindex$_t104_ho1_detail_asset_id" class="form-group t104_ho1_detail_asset_id">
<input type="text" data-table="t104_ho1_detail" data-field="x_asset_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->getPlaceHolder()) ?>" value="<?php echo $t104_ho1_detail_grid->asset_id->EditValue ?>"<?php echo $t104_ho1_detail_grid->asset_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t104_ho1_detail_asset_id" class="form-group t104_ho1_detail_asset_id">
<span<?php echo $t104_ho1_detail_grid->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t104_ho1_detail_grid->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_asset_id" name="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="x<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t104_ho1_detail" data-field="x_asset_id" name="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" id="o<?php echo $t104_ho1_detail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t104_ho1_detail_grid->asset_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t104_ho1_detail_grid->ListOptions->render("body", "right", $t104_ho1_detail_grid->RowIndex);
?>
<script>
loadjs.ready(["ft104_ho1_detailgrid", "load"], function() {
	ft104_ho1_detailgrid.updateLists(<?php echo $t104_ho1_detail_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t104_ho1_detail->CurrentMode == "add" || $t104_ho1_detail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t104_ho1_detail_grid->FormKeyCountName ?>" id="<?php echo $t104_ho1_detail_grid->FormKeyCountName ?>" value="<?php echo $t104_ho1_detail_grid->KeyCount ?>">
<?php echo $t104_ho1_detail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t104_ho1_detail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t104_ho1_detail_grid->FormKeyCountName ?>" id="<?php echo $t104_ho1_detail_grid->FormKeyCountName ?>" value="<?php echo $t104_ho1_detail_grid->KeyCount ?>">
<?php echo $t104_ho1_detail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t104_ho1_detail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft104_ho1_detailgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t104_ho1_detail_grid->Recordset)
	$t104_ho1_detail_grid->Recordset->Close();
?>
<?php if ($t104_ho1_detail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t104_ho1_detail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t104_ho1_detail_grid->TotalRecords == 0 && !$t104_ho1_detail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t104_ho1_detail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t104_ho1_detail_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t104_ho1_detail_grid->terminate();
?>