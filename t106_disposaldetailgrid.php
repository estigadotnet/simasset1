<?php
namespace PHPMaker2020\p_simasset1;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t106_disposaldetail_grid))
	$t106_disposaldetail_grid = new t106_disposaldetail_grid();

// Run the page
$t106_disposaldetail_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t106_disposaldetail_grid->Page_Render();
?>
<?php if (!$t106_disposaldetail_grid->isExport()) { ?>
<script>
var ft106_disposaldetailgrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft106_disposaldetailgrid = new ew.Form("ft106_disposaldetailgrid", "grid");
	ft106_disposaldetailgrid.formKeyCountName = '<?php echo $t106_disposaldetail_grid->FormKeyCountName ?>';

	// Validate form
	ft106_disposaldetailgrid.validate = function() {
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
			<?php if ($t106_disposaldetail_grid->disposalhead_id->Required) { ?>
				elm = this.getElements("x" + infix + "_disposalhead_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_grid->disposalhead_id->caption(), $t106_disposaldetail_grid->disposalhead_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_disposalhead_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t106_disposaldetail_grid->disposalhead_id->errorMessage()) ?>");
			<?php if ($t106_disposaldetail_grid->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_grid->asset_id->caption(), $t106_disposaldetail_grid->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t106_disposaldetail_grid->cond_id->Required) { ?>
				elm = this.getElements("x" + infix + "_cond_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_grid->cond_id->caption(), $t106_disposaldetail_grid->cond_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t106_disposaldetail_grid->reason_id->Required) { ?>
				elm = this.getElements("x" + infix + "_reason_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_grid->reason_id->caption(), $t106_disposaldetail_grid->reason_id->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft106_disposaldetailgrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "disposalhead_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "asset_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "cond_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "reason_id", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft106_disposaldetailgrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft106_disposaldetailgrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft106_disposaldetailgrid.lists["x_asset_id"] = <?php echo $t106_disposaldetail_grid->asset_id->Lookup->toClientList($t106_disposaldetail_grid) ?>;
	ft106_disposaldetailgrid.lists["x_asset_id"].options = <?php echo JsonEncode($t106_disposaldetail_grid->asset_id->lookupOptions()) ?>;
	ft106_disposaldetailgrid.lists["x_cond_id"] = <?php echo $t106_disposaldetail_grid->cond_id->Lookup->toClientList($t106_disposaldetail_grid) ?>;
	ft106_disposaldetailgrid.lists["x_cond_id"].options = <?php echo JsonEncode($t106_disposaldetail_grid->cond_id->lookupOptions()) ?>;
	ft106_disposaldetailgrid.lists["x_reason_id"] = <?php echo $t106_disposaldetail_grid->reason_id->Lookup->toClientList($t106_disposaldetail_grid) ?>;
	ft106_disposaldetailgrid.lists["x_reason_id"].options = <?php echo JsonEncode($t106_disposaldetail_grid->reason_id->lookupOptions()) ?>;
	loadjs.done("ft106_disposaldetailgrid");
});
</script>
<?php } ?>
<?php
$t106_disposaldetail_grid->renderOtherOptions();
?>
<?php if ($t106_disposaldetail_grid->TotalRecords > 0 || $t106_disposaldetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t106_disposaldetail_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t106_disposaldetail">
<div id="ft106_disposaldetailgrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t106_disposaldetail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t106_disposaldetailgrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t106_disposaldetail->RowType = ROWTYPE_HEADER;

// Render list options
$t106_disposaldetail_grid->renderListOptions();

// Render list options (header, left)
$t106_disposaldetail_grid->ListOptions->render("header", "left");
?>
<?php if ($t106_disposaldetail_grid->disposalhead_id->Visible) { // disposalhead_id ?>
	<?php if ($t106_disposaldetail_grid->SortUrl($t106_disposaldetail_grid->disposalhead_id) == "") { ?>
		<th data-name="disposalhead_id" class="<?php echo $t106_disposaldetail_grid->disposalhead_id->headerCellClass() ?>"><div id="elh_t106_disposaldetail_disposalhead_id" class="t106_disposaldetail_disposalhead_id"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->disposalhead_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="disposalhead_id" class="<?php echo $t106_disposaldetail_grid->disposalhead_id->headerCellClass() ?>"><div><div id="elh_t106_disposaldetail_disposalhead_id" class="t106_disposaldetail_disposalhead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->disposalhead_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_grid->disposalhead_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_grid->disposalhead_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t106_disposaldetail_grid->asset_id->Visible) { // asset_id ?>
	<?php if ($t106_disposaldetail_grid->SortUrl($t106_disposaldetail_grid->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t106_disposaldetail_grid->asset_id->headerCellClass() ?>"><div id="elh_t106_disposaldetail_asset_id" class="t106_disposaldetail_asset_id"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t106_disposaldetail_grid->asset_id->headerCellClass() ?>"><div><div id="elh_t106_disposaldetail_asset_id" class="t106_disposaldetail_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_grid->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_grid->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t106_disposaldetail_grid->cond_id->Visible) { // cond_id ?>
	<?php if ($t106_disposaldetail_grid->SortUrl($t106_disposaldetail_grid->cond_id) == "") { ?>
		<th data-name="cond_id" class="<?php echo $t106_disposaldetail_grid->cond_id->headerCellClass() ?>"><div id="elh_t106_disposaldetail_cond_id" class="t106_disposaldetail_cond_id"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->cond_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cond_id" class="<?php echo $t106_disposaldetail_grid->cond_id->headerCellClass() ?>"><div><div id="elh_t106_disposaldetail_cond_id" class="t106_disposaldetail_cond_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->cond_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_grid->cond_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_grid->cond_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t106_disposaldetail_grid->reason_id->Visible) { // reason_id ?>
	<?php if ($t106_disposaldetail_grid->SortUrl($t106_disposaldetail_grid->reason_id) == "") { ?>
		<th data-name="reason_id" class="<?php echo $t106_disposaldetail_grid->reason_id->headerCellClass() ?>"><div id="elh_t106_disposaldetail_reason_id" class="t106_disposaldetail_reason_id"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->reason_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reason_id" class="<?php echo $t106_disposaldetail_grid->reason_id->headerCellClass() ?>"><div><div id="elh_t106_disposaldetail_reason_id" class="t106_disposaldetail_reason_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_grid->reason_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_grid->reason_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_grid->reason_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t106_disposaldetail_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t106_disposaldetail_grid->StartRecord = 1;
$t106_disposaldetail_grid->StopRecord = $t106_disposaldetail_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t106_disposaldetail->isConfirm() || $t106_disposaldetail_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t106_disposaldetail_grid->FormKeyCountName) && ($t106_disposaldetail_grid->isGridAdd() || $t106_disposaldetail_grid->isGridEdit() || $t106_disposaldetail->isConfirm())) {
		$t106_disposaldetail_grid->KeyCount = $CurrentForm->getValue($t106_disposaldetail_grid->FormKeyCountName);
		$t106_disposaldetail_grid->StopRecord = $t106_disposaldetail_grid->StartRecord + $t106_disposaldetail_grid->KeyCount - 1;
	}
}
$t106_disposaldetail_grid->RecordCount = $t106_disposaldetail_grid->StartRecord - 1;
if ($t106_disposaldetail_grid->Recordset && !$t106_disposaldetail_grid->Recordset->EOF) {
	$t106_disposaldetail_grid->Recordset->moveFirst();
	$selectLimit = $t106_disposaldetail_grid->UseSelectLimit;
	if (!$selectLimit && $t106_disposaldetail_grid->StartRecord > 1)
		$t106_disposaldetail_grid->Recordset->move($t106_disposaldetail_grid->StartRecord - 1);
} elseif (!$t106_disposaldetail->AllowAddDeleteRow && $t106_disposaldetail_grid->StopRecord == 0) {
	$t106_disposaldetail_grid->StopRecord = $t106_disposaldetail->GridAddRowCount;
}

// Initialize aggregate
$t106_disposaldetail->RowType = ROWTYPE_AGGREGATEINIT;
$t106_disposaldetail->resetAttributes();
$t106_disposaldetail_grid->renderRow();
if ($t106_disposaldetail_grid->isGridAdd())
	$t106_disposaldetail_grid->RowIndex = 0;
if ($t106_disposaldetail_grid->isGridEdit())
	$t106_disposaldetail_grid->RowIndex = 0;
while ($t106_disposaldetail_grid->RecordCount < $t106_disposaldetail_grid->StopRecord) {
	$t106_disposaldetail_grid->RecordCount++;
	if ($t106_disposaldetail_grid->RecordCount >= $t106_disposaldetail_grid->StartRecord) {
		$t106_disposaldetail_grid->RowCount++;
		if ($t106_disposaldetail_grid->isGridAdd() || $t106_disposaldetail_grid->isGridEdit() || $t106_disposaldetail->isConfirm()) {
			$t106_disposaldetail_grid->RowIndex++;
			$CurrentForm->Index = $t106_disposaldetail_grid->RowIndex;
			if ($CurrentForm->hasValue($t106_disposaldetail_grid->FormActionName) && ($t106_disposaldetail->isConfirm() || $t106_disposaldetail_grid->EventCancelled))
				$t106_disposaldetail_grid->RowAction = strval($CurrentForm->getValue($t106_disposaldetail_grid->FormActionName));
			elseif ($t106_disposaldetail_grid->isGridAdd())
				$t106_disposaldetail_grid->RowAction = "insert";
			else
				$t106_disposaldetail_grid->RowAction = "";
		}

		// Set up key count
		$t106_disposaldetail_grid->KeyCount = $t106_disposaldetail_grid->RowIndex;

		// Init row class and style
		$t106_disposaldetail->resetAttributes();
		$t106_disposaldetail->CssClass = "";
		if ($t106_disposaldetail_grid->isGridAdd()) {
			if ($t106_disposaldetail->CurrentMode == "copy") {
				$t106_disposaldetail_grid->loadRowValues($t106_disposaldetail_grid->Recordset); // Load row values
				$t106_disposaldetail_grid->setRecordKey($t106_disposaldetail_grid->RowOldKey, $t106_disposaldetail_grid->Recordset); // Set old record key
			} else {
				$t106_disposaldetail_grid->loadRowValues(); // Load default values
				$t106_disposaldetail_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t106_disposaldetail_grid->loadRowValues($t106_disposaldetail_grid->Recordset); // Load row values
		}
		$t106_disposaldetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t106_disposaldetail_grid->isGridAdd()) // Grid add
			$t106_disposaldetail->RowType = ROWTYPE_ADD; // Render add
		if ($t106_disposaldetail_grid->isGridAdd() && $t106_disposaldetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t106_disposaldetail_grid->restoreCurrentRowFormValues($t106_disposaldetail_grid->RowIndex); // Restore form values
		if ($t106_disposaldetail_grid->isGridEdit()) { // Grid edit
			if ($t106_disposaldetail->EventCancelled)
				$t106_disposaldetail_grid->restoreCurrentRowFormValues($t106_disposaldetail_grid->RowIndex); // Restore form values
			if ($t106_disposaldetail_grid->RowAction == "insert")
				$t106_disposaldetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t106_disposaldetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t106_disposaldetail_grid->isGridEdit() && ($t106_disposaldetail->RowType == ROWTYPE_EDIT || $t106_disposaldetail->RowType == ROWTYPE_ADD) && $t106_disposaldetail->EventCancelled) // Update failed
			$t106_disposaldetail_grid->restoreCurrentRowFormValues($t106_disposaldetail_grid->RowIndex); // Restore form values
		if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) // Edit row
			$t106_disposaldetail_grid->EditRowCount++;
		if ($t106_disposaldetail->isConfirm()) // Confirm row
			$t106_disposaldetail_grid->restoreCurrentRowFormValues($t106_disposaldetail_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t106_disposaldetail->RowAttrs->merge(["data-rowindex" => $t106_disposaldetail_grid->RowCount, "id" => "r" . $t106_disposaldetail_grid->RowCount . "_t106_disposaldetail", "data-rowtype" => $t106_disposaldetail->RowType]);

		// Render row
		$t106_disposaldetail_grid->renderRow();

		// Render list options
		$t106_disposaldetail_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t106_disposaldetail_grid->RowAction != "delete" && $t106_disposaldetail_grid->RowAction != "insertdelete" && !($t106_disposaldetail_grid->RowAction == "insert" && $t106_disposaldetail->isConfirm() && $t106_disposaldetail_grid->emptyRow())) {
?>
	<tr <?php echo $t106_disposaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t106_disposaldetail_grid->ListOptions->render("body", "left", $t106_disposaldetail_grid->RowCount);
?>
	<?php if ($t106_disposaldetail_grid->disposalhead_id->Visible) { // disposalhead_id ?>
		<td data-name="disposalhead_id" <?php echo $t106_disposaldetail_grid->disposalhead_id->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t106_disposaldetail_grid->disposalhead_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_disposalhead_id" class="form-group">
<span<?php echo $t106_disposaldetail_grid->disposalhead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t106_disposaldetail_grid->disposalhead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_disposalhead_id" class="form-group">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_grid->disposalhead_id->EditValue ?>"<?php echo $t106_disposaldetail_grid->disposalhead_id->editAttributes() ?>>
</span>
<?php } ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t106_disposaldetail_grid->disposalhead_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_disposalhead_id" class="form-group">
<span<?php echo $t106_disposaldetail_grid->disposalhead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t106_disposaldetail_grid->disposalhead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_disposalhead_id" class="form-group">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_grid->disposalhead_id->EditValue ?>"<?php echo $t106_disposaldetail_grid->disposalhead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_disposalhead_id">
<span<?php echo $t106_disposaldetail_grid->disposalhead_id->viewAttributes() ?>><?php echo $t106_disposaldetail_grid->disposalhead_id->getViewValue() ?></span>
</span>
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT || $t106_disposaldetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t106_disposaldetail_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t106_disposaldetail_grid->asset_id->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_asset_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->asset_id->ReadOnly || $t106_disposaldetail_grid->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->asset_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo $t106_disposaldetail_grid->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_asset_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->asset_id->ReadOnly || $t106_disposaldetail_grid->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->asset_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo $t106_disposaldetail_grid->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_asset_id">
<span<?php echo $t106_disposaldetail_grid->asset_id->viewAttributes() ?>><?php echo $t106_disposaldetail_grid->asset_id->getViewValue() ?></span>
</span>
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->asset_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->asset_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->asset_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_grid->cond_id->Visible) { // cond_id ?>
		<td data-name="cond_id" <?php echo $t106_disposaldetail_grid->cond_id->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_cond_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->cond_id->ReadOnly || $t106_disposaldetail_grid->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->cond_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->cond_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo $t106_disposaldetail_grid->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->cond_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->cond_id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_cond_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->cond_id->ReadOnly || $t106_disposaldetail_grid->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->cond_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->cond_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo $t106_disposaldetail_grid->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->cond_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_cond_id">
<span<?php echo $t106_disposaldetail_grid->cond_id->viewAttributes() ?>><?php echo $t106_disposaldetail_grid->cond_id->getViewValue() ?></span>
</span>
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->cond_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->cond_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->cond_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->cond_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_grid->reason_id->Visible) { // reason_id ?>
		<td data-name="reason_id" <?php echo $t106_disposaldetail_grid->reason_id->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_reason_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->reason_id->ReadOnly || $t106_disposaldetail_grid->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->reason_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->reason_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo $t106_disposaldetail_grid->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->reason_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->reason_id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_reason_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->reason_id->ReadOnly || $t106_disposaldetail_grid->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->reason_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->reason_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo $t106_disposaldetail_grid->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->reason_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_grid->RowCount ?>_t106_disposaldetail_reason_id">
<span<?php echo $t106_disposaldetail_grid->reason_id->viewAttributes() ?>><?php echo $t106_disposaldetail_grid->reason_id->getViewValue() ?></span>
</span>
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->reason_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->reason_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="ft106_disposaldetailgrid$x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->reason_id->FormValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="ft106_disposaldetailgrid$o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->reason_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t106_disposaldetail_grid->ListOptions->render("body", "right", $t106_disposaldetail_grid->RowCount);
?>
	</tr>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD || $t106_disposaldetail->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft106_disposaldetailgrid", "load"], function() {
	ft106_disposaldetailgrid.updateLists(<?php echo $t106_disposaldetail_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t106_disposaldetail_grid->isGridAdd() || $t106_disposaldetail->CurrentMode == "copy")
		if (!$t106_disposaldetail_grid->Recordset->EOF)
			$t106_disposaldetail_grid->Recordset->moveNext();
}
?>
<?php
	if ($t106_disposaldetail->CurrentMode == "add" || $t106_disposaldetail->CurrentMode == "copy" || $t106_disposaldetail->CurrentMode == "edit") {
		$t106_disposaldetail_grid->RowIndex = '$rowindex$';
		$t106_disposaldetail_grid->loadRowValues();

		// Set row properties
		$t106_disposaldetail->resetAttributes();
		$t106_disposaldetail->RowAttrs->merge(["data-rowindex" => $t106_disposaldetail_grid->RowIndex, "id" => "r0_t106_disposaldetail", "data-rowtype" => ROWTYPE_ADD]);
		$t106_disposaldetail->RowAttrs->appendClass("ew-template");
		$t106_disposaldetail->RowType = ROWTYPE_ADD;

		// Render row
		$t106_disposaldetail_grid->renderRow();

		// Render list options
		$t106_disposaldetail_grid->renderListOptions();
		$t106_disposaldetail_grid->StartRowCount = 0;
?>
	<tr <?php echo $t106_disposaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t106_disposaldetail_grid->ListOptions->render("body", "left", $t106_disposaldetail_grid->RowIndex);
?>
	<?php if ($t106_disposaldetail_grid->disposalhead_id->Visible) { // disposalhead_id ?>
		<td data-name="disposalhead_id">
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<?php if ($t106_disposaldetail_grid->disposalhead_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t106_disposaldetail_disposalhead_id" class="form-group t106_disposaldetail_disposalhead_id">
<span<?php echo $t106_disposaldetail_grid->disposalhead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t106_disposaldetail_grid->disposalhead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t106_disposaldetail_disposalhead_id" class="form-group t106_disposaldetail_disposalhead_id">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_grid->disposalhead_id->EditValue ?>"<?php echo $t106_disposaldetail_grid->disposalhead_id->editAttributes() ?>>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t106_disposaldetail_disposalhead_id" class="form-group t106_disposaldetail_disposalhead_id">
<span<?php echo $t106_disposaldetail_grid->disposalhead_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t106_disposaldetail_grid->disposalhead_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposalhead_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_disposalhead_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->disposalhead_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_grid->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t106_disposaldetail_asset_id" class="form-group t106_disposaldetail_asset_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->asset_id->ReadOnly || $t106_disposaldetail_grid->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->asset_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo $t106_disposaldetail_grid->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->asset_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t106_disposaldetail_asset_id" class="form-group t106_disposaldetail_asset_id">
<span<?php echo $t106_disposaldetail_grid->asset_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t106_disposaldetail_grid->asset_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->asset_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->asset_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_grid->cond_id->Visible) { // cond_id ?>
		<td data-name="cond_id">
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t106_disposaldetail_cond_id" class="form-group t106_disposaldetail_cond_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->cond_id->ReadOnly || $t106_disposaldetail_grid->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->cond_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->cond_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo $t106_disposaldetail_grid->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->cond_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t106_disposaldetail_cond_id" class="form-group t106_disposaldetail_cond_id">
<span<?php echo $t106_disposaldetail_grid->cond_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t106_disposaldetail_grid->cond_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->cond_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->cond_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_grid->reason_id->Visible) { // reason_id ?>
		<td data-name="reason_id">
<?php if (!$t106_disposaldetail->isConfirm()) { ?>
<span id="el$rowindex$_t106_disposaldetail_reason_id" class="form-group t106_disposaldetail_reason_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_grid->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_grid->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_grid->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_grid->reason_id->ReadOnly || $t106_disposaldetail_grid->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_grid->reason_id->Lookup->getParamTag($t106_disposaldetail_grid, "p_x" . $t106_disposaldetail_grid->RowIndex . "_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_grid->reason_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo $t106_disposaldetail_grid->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_grid->reason_id->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t106_disposaldetail_reason_id" class="form-group t106_disposaldetail_reason_id">
<span<?php echo $t106_disposaldetail_grid->reason_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t106_disposaldetail_grid->reason_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->reason_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" id="o<?php echo $t106_disposaldetail_grid->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_grid->reason_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t106_disposaldetail_grid->ListOptions->render("body", "right", $t106_disposaldetail_grid->RowIndex);
?>
<script>
loadjs.ready(["ft106_disposaldetailgrid", "load"], function() {
	ft106_disposaldetailgrid.updateLists(<?php echo $t106_disposaldetail_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t106_disposaldetail->CurrentMode == "add" || $t106_disposaldetail->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t106_disposaldetail_grid->FormKeyCountName ?>" id="<?php echo $t106_disposaldetail_grid->FormKeyCountName ?>" value="<?php echo $t106_disposaldetail_grid->KeyCount ?>">
<?php echo $t106_disposaldetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t106_disposaldetail->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t106_disposaldetail_grid->FormKeyCountName ?>" id="<?php echo $t106_disposaldetail_grid->FormKeyCountName ?>" value="<?php echo $t106_disposaldetail_grid->KeyCount ?>">
<?php echo $t106_disposaldetail_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t106_disposaldetail->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft106_disposaldetailgrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t106_disposaldetail_grid->Recordset)
	$t106_disposaldetail_grid->Recordset->Close();
?>
<?php if ($t106_disposaldetail_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t106_disposaldetail_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t106_disposaldetail_grid->TotalRecords == 0 && !$t106_disposaldetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t106_disposaldetail_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t106_disposaldetail_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t106_disposaldetail_grid->terminate();
?>