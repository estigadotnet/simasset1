<?php
namespace PHPMaker2020\p_simasset1;

// Write header
WriteHeader(FALSE);

// Create page object
if (!isset($t007_assettype_grid))
	$t007_assettype_grid = new t007_assettype_grid();

// Run the page
$t007_assettype_grid->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_assettype_grid->Page_Render();
?>
<?php if (!$t007_assettype_grid->isExport()) { ?>
<script>
var ft007_assettypegrid, currentPageID;
loadjs.ready("head", function() {

	// Form object
	ft007_assettypegrid = new ew.Form("ft007_assettypegrid", "grid");
	ft007_assettypegrid.formKeyCountName = '<?php echo $t007_assettype_grid->FormKeyCountName ?>';

	// Validate form
	ft007_assettypegrid.validate = function() {
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
			<?php if ($t007_assettype_grid->assetgroup_id->Required) { ?>
				elm = this.getElements("x" + infix + "_assetgroup_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_grid->assetgroup_id->caption(), $t007_assettype_grid->assetgroup_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_assetgroup_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_assettype_grid->assetgroup_id->errorMessage()) ?>");
			<?php if ($t007_assettype_grid->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_grid->Description->caption(), $t007_assettype_grid->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t007_assettype_grid->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_grid->Code->caption(), $t007_assettype_grid->Code->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
			} // End Grid Add checking
		}
		return true;
	}

	// Check empty row
	ft007_assettypegrid.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "assetgroup_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Description", false)) return false;
		if (ew.valueChanged(fobj, infix, "Code", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft007_assettypegrid.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_assettypegrid.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft007_assettypegrid.lists["x_assetgroup_id"] = <?php echo $t007_assettype_grid->assetgroup_id->Lookup->toClientList($t007_assettype_grid) ?>;
	ft007_assettypegrid.lists["x_assetgroup_id"].options = <?php echo JsonEncode($t007_assettype_grid->assetgroup_id->lookupOptions()) ?>;
	ft007_assettypegrid.autoSuggests["x_assetgroup_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("ft007_assettypegrid");
});
</script>
<?php } ?>
<?php
$t007_assettype_grid->renderOtherOptions();
?>
<?php if ($t007_assettype_grid->TotalRecords > 0 || $t007_assettype->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t007_assettype_grid->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t007_assettype">
<div id="ft007_assettypegrid" class="ew-form ew-list-form form-inline">
<div id="gmp_t007_assettype" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table id="tbl_t007_assettypegrid" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t007_assettype->RowType = ROWTYPE_HEADER;

// Render list options
$t007_assettype_grid->renderListOptions();

// Render list options (header, left)
$t007_assettype_grid->ListOptions->render("header", "left");
?>
<?php if ($t007_assettype_grid->assetgroup_id->Visible) { // assetgroup_id ?>
	<?php if ($t007_assettype_grid->SortUrl($t007_assettype_grid->assetgroup_id) == "") { ?>
		<th data-name="assetgroup_id" class="<?php echo $t007_assettype_grid->assetgroup_id->headerCellClass() ?>"><div id="elh_t007_assettype_assetgroup_id" class="t007_assettype_assetgroup_id"><div class="ew-table-header-caption"><?php echo $t007_assettype_grid->assetgroup_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="assetgroup_id" class="<?php echo $t007_assettype_grid->assetgroup_id->headerCellClass() ?>"><div><div id="elh_t007_assettype_assetgroup_id" class="t007_assettype_assetgroup_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_assettype_grid->assetgroup_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_assettype_grid->assetgroup_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_assettype_grid->assetgroup_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_assettype_grid->Description->Visible) { // Description ?>
	<?php if ($t007_assettype_grid->SortUrl($t007_assettype_grid->Description) == "") { ?>
		<th data-name="Description" class="<?php echo $t007_assettype_grid->Description->headerCellClass() ?>"><div id="elh_t007_assettype_Description" class="t007_assettype_Description"><div class="ew-table-header-caption"><?php echo $t007_assettype_grid->Description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Description" class="<?php echo $t007_assettype_grid->Description->headerCellClass() ?>"><div><div id="elh_t007_assettype_Description" class="t007_assettype_Description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_assettype_grid->Description->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_assettype_grid->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_assettype_grid->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_assettype_grid->Code->Visible) { // Code ?>
	<?php if ($t007_assettype_grid->SortUrl($t007_assettype_grid->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $t007_assettype_grid->Code->headerCellClass() ?>"><div id="elh_t007_assettype_Code" class="t007_assettype_Code"><div class="ew-table-header-caption"><?php echo $t007_assettype_grid->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $t007_assettype_grid->Code->headerCellClass() ?>"><div><div id="elh_t007_assettype_Code" class="t007_assettype_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_assettype_grid->Code->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_assettype_grid->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_assettype_grid->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t007_assettype_grid->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
$t007_assettype_grid->StartRecord = 1;
$t007_assettype_grid->StopRecord = $t007_assettype_grid->TotalRecords; // Show all records

// Restore number of post back records
if ($CurrentForm && ($t007_assettype->isConfirm() || $t007_assettype_grid->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t007_assettype_grid->FormKeyCountName) && ($t007_assettype_grid->isGridAdd() || $t007_assettype_grid->isGridEdit() || $t007_assettype->isConfirm())) {
		$t007_assettype_grid->KeyCount = $CurrentForm->getValue($t007_assettype_grid->FormKeyCountName);
		$t007_assettype_grid->StopRecord = $t007_assettype_grid->StartRecord + $t007_assettype_grid->KeyCount - 1;
	}
}
$t007_assettype_grid->RecordCount = $t007_assettype_grid->StartRecord - 1;
if ($t007_assettype_grid->Recordset && !$t007_assettype_grid->Recordset->EOF) {
	$t007_assettype_grid->Recordset->moveFirst();
	$selectLimit = $t007_assettype_grid->UseSelectLimit;
	if (!$selectLimit && $t007_assettype_grid->StartRecord > 1)
		$t007_assettype_grid->Recordset->move($t007_assettype_grid->StartRecord - 1);
} elseif (!$t007_assettype->AllowAddDeleteRow && $t007_assettype_grid->StopRecord == 0) {
	$t007_assettype_grid->StopRecord = $t007_assettype->GridAddRowCount;
}

// Initialize aggregate
$t007_assettype->RowType = ROWTYPE_AGGREGATEINIT;
$t007_assettype->resetAttributes();
$t007_assettype_grid->renderRow();
if ($t007_assettype_grid->isGridAdd())
	$t007_assettype_grid->RowIndex = 0;
if ($t007_assettype_grid->isGridEdit())
	$t007_assettype_grid->RowIndex = 0;
while ($t007_assettype_grid->RecordCount < $t007_assettype_grid->StopRecord) {
	$t007_assettype_grid->RecordCount++;
	if ($t007_assettype_grid->RecordCount >= $t007_assettype_grid->StartRecord) {
		$t007_assettype_grid->RowCount++;
		if ($t007_assettype_grid->isGridAdd() || $t007_assettype_grid->isGridEdit() || $t007_assettype->isConfirm()) {
			$t007_assettype_grid->RowIndex++;
			$CurrentForm->Index = $t007_assettype_grid->RowIndex;
			if ($CurrentForm->hasValue($t007_assettype_grid->FormActionName) && ($t007_assettype->isConfirm() || $t007_assettype_grid->EventCancelled))
				$t007_assettype_grid->RowAction = strval($CurrentForm->getValue($t007_assettype_grid->FormActionName));
			elseif ($t007_assettype_grid->isGridAdd())
				$t007_assettype_grid->RowAction = "insert";
			else
				$t007_assettype_grid->RowAction = "";
		}

		// Set up key count
		$t007_assettype_grid->KeyCount = $t007_assettype_grid->RowIndex;

		// Init row class and style
		$t007_assettype->resetAttributes();
		$t007_assettype->CssClass = "";
		if ($t007_assettype_grid->isGridAdd()) {
			if ($t007_assettype->CurrentMode == "copy") {
				$t007_assettype_grid->loadRowValues($t007_assettype_grid->Recordset); // Load row values
				$t007_assettype_grid->setRecordKey($t007_assettype_grid->RowOldKey, $t007_assettype_grid->Recordset); // Set old record key
			} else {
				$t007_assettype_grid->loadRowValues(); // Load default values
				$t007_assettype_grid->RowOldKey = ""; // Clear old key value
			}
		} else {
			$t007_assettype_grid->loadRowValues($t007_assettype_grid->Recordset); // Load row values
		}
		$t007_assettype->RowType = ROWTYPE_VIEW; // Render view
		if ($t007_assettype_grid->isGridAdd()) // Grid add
			$t007_assettype->RowType = ROWTYPE_ADD; // Render add
		if ($t007_assettype_grid->isGridAdd() && $t007_assettype->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t007_assettype_grid->restoreCurrentRowFormValues($t007_assettype_grid->RowIndex); // Restore form values
		if ($t007_assettype_grid->isGridEdit()) { // Grid edit
			if ($t007_assettype->EventCancelled)
				$t007_assettype_grid->restoreCurrentRowFormValues($t007_assettype_grid->RowIndex); // Restore form values
			if ($t007_assettype_grid->RowAction == "insert")
				$t007_assettype->RowType = ROWTYPE_ADD; // Render add
			else
				$t007_assettype->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t007_assettype_grid->isGridEdit() && ($t007_assettype->RowType == ROWTYPE_EDIT || $t007_assettype->RowType == ROWTYPE_ADD) && $t007_assettype->EventCancelled) // Update failed
			$t007_assettype_grid->restoreCurrentRowFormValues($t007_assettype_grid->RowIndex); // Restore form values
		if ($t007_assettype->RowType == ROWTYPE_EDIT) // Edit row
			$t007_assettype_grid->EditRowCount++;
		if ($t007_assettype->isConfirm()) // Confirm row
			$t007_assettype_grid->restoreCurrentRowFormValues($t007_assettype_grid->RowIndex); // Restore form values

		// Set up row id / data-rowindex
		$t007_assettype->RowAttrs->merge(["data-rowindex" => $t007_assettype_grid->RowCount, "id" => "r" . $t007_assettype_grid->RowCount . "_t007_assettype", "data-rowtype" => $t007_assettype->RowType]);

		// Render row
		$t007_assettype_grid->renderRow();

		// Render list options
		$t007_assettype_grid->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t007_assettype_grid->RowAction != "delete" && $t007_assettype_grid->RowAction != "insertdelete" && !($t007_assettype_grid->RowAction == "insert" && $t007_assettype->isConfirm() && $t007_assettype_grid->emptyRow())) {
?>
	<tr <?php echo $t007_assettype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_assettype_grid->ListOptions->render("body", "left", $t007_assettype_grid->RowCount);
?>
	<?php if ($t007_assettype_grid->assetgroup_id->Visible) { // assetgroup_id ?>
		<td data-name="assetgroup_id" <?php echo $t007_assettype_grid->assetgroup_id->cellAttributes() ?>>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t007_assettype_grid->assetgroup_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<span<?php echo $t007_assettype_grid->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_grid->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<?php
$onchange = $t007_assettype_grid->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_grid->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="sv_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_grid->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_grid->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_grid->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_grid->assetgroup_id->ReadOnly || $t007_assettype_grid->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_grid->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypegrid"], function() {
	ft007_assettypegrid.createAutoSuggest({"id":"x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_grid->assetgroup_id->Lookup->getParamTag($t007_assettype_grid, "p_x" . $t007_assettype_grid->RowIndex . "_assetgroup_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t007_assettype_grid->assetgroup_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<span<?php echo $t007_assettype_grid->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_grid->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<?php
$onchange = $t007_assettype_grid->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_grid->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="sv_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_grid->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_grid->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_grid->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_grid->assetgroup_id->ReadOnly || $t007_assettype_grid->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_grid->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypegrid"], function() {
	ft007_assettypegrid.createAutoSuggest({"id":"x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_grid->assetgroup_id->Lookup->getParamTag($t007_assettype_grid, "p_x" . $t007_assettype_grid->RowIndex . "_assetgroup_id") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_grid->assetgroup_id->viewAttributes() ?>><?php echo $t007_assettype_grid->assetgroup_id->getViewValue() ?></span>
</span>
<?php if (!$t007_assettype->isConfirm()) { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->FormValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="ft007_assettypegrid$x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="ft007_assettypegrid$x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->FormValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="ft007_assettypegrid$o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="ft007_assettypegrid$o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t007_assettype" data-field="x_id" name="x<?php echo $t007_assettype_grid->RowIndex ?>_id" id="x<?php echo $t007_assettype_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_assettype_grid->id->CurrentValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_id" name="o<?php echo $t007_assettype_grid->RowIndex ?>_id" id="o<?php echo $t007_assettype_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_assettype_grid->id->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT || $t007_assettype->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_id" name="x<?php echo $t007_assettype_grid->RowIndex ?>_id" id="x<?php echo $t007_assettype_grid->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_assettype_grid->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t007_assettype_grid->Description->Visible) { // Description ?>
		<td data-name="Description" <?php echo $t007_assettype_grid->Description->cellAttributes() ?>>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_Description" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_grid->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_grid->Description->EditValue ?>"<?php echo $t007_assettype_grid->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="o<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="o<?php echo $t007_assettype_grid->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_grid->Description->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_Description" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_grid->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_grid->Description->EditValue ?>"<?php echo $t007_assettype_grid->Description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_Description">
<span<?php echo $t007_assettype_grid->Description->viewAttributes() ?>><?php echo $t007_assettype_grid->Description->getViewValue() ?></span>
</span>
<?php if (!$t007_assettype->isConfirm()) { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_grid->Description->FormValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="o<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="o<?php echo $t007_assettype_grid->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_grid->Description->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="ft007_assettypegrid$x<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="ft007_assettypegrid$x<?php echo $t007_assettype_grid->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_grid->Description->FormValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="ft007_assettypegrid$o<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="ft007_assettypegrid$o<?php echo $t007_assettype_grid->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_grid->Description->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t007_assettype_grid->Code->Visible) { // Code ?>
		<td data-name="Code" <?php echo $t007_assettype_grid->Code->cellAttributes() ?>>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_Code" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_grid->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_grid->Code->EditValue ?>"<?php echo $t007_assettype_grid->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="o<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="o<?php echo $t007_assettype_grid->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_grid->Code->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_Code" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_grid->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_grid->Code->EditValue ?>"<?php echo $t007_assettype_grid->Code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_assettype_grid->RowCount ?>_t007_assettype_Code">
<span<?php echo $t007_assettype_grid->Code->viewAttributes() ?>><?php echo $t007_assettype_grid->Code->getViewValue() ?></span>
</span>
<?php if (!$t007_assettype->isConfirm()) { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_grid->Code->FormValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="o<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="o<?php echo $t007_assettype_grid->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_grid->Code->OldValue) ?>">
<?php } else { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="ft007_assettypegrid$x<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="ft007_assettypegrid$x<?php echo $t007_assettype_grid->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_grid->Code->FormValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="ft007_assettypegrid$o<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="ft007_assettypegrid$o<?php echo $t007_assettype_grid->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_grid->Code->OldValue) ?>">
<?php } ?>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_assettype_grid->ListOptions->render("body", "right", $t007_assettype_grid->RowCount);
?>
	</tr>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD || $t007_assettype->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft007_assettypegrid", "load"], function() {
	ft007_assettypegrid.updateLists(<?php echo $t007_assettype_grid->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t007_assettype_grid->isGridAdd() || $t007_assettype->CurrentMode == "copy")
		if (!$t007_assettype_grid->Recordset->EOF)
			$t007_assettype_grid->Recordset->moveNext();
}
?>
<?php
	if ($t007_assettype->CurrentMode == "add" || $t007_assettype->CurrentMode == "copy" || $t007_assettype->CurrentMode == "edit") {
		$t007_assettype_grid->RowIndex = '$rowindex$';
		$t007_assettype_grid->loadRowValues();

		// Set row properties
		$t007_assettype->resetAttributes();
		$t007_assettype->RowAttrs->merge(["data-rowindex" => $t007_assettype_grid->RowIndex, "id" => "r0_t007_assettype", "data-rowtype" => ROWTYPE_ADD]);
		$t007_assettype->RowAttrs->appendClass("ew-template");
		$t007_assettype->RowType = ROWTYPE_ADD;

		// Render row
		$t007_assettype_grid->renderRow();

		// Render list options
		$t007_assettype_grid->renderListOptions();
		$t007_assettype_grid->StartRowCount = 0;
?>
	<tr <?php echo $t007_assettype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_assettype_grid->ListOptions->render("body", "left", $t007_assettype_grid->RowIndex);
?>
	<?php if ($t007_assettype_grid->assetgroup_id->Visible) { // assetgroup_id ?>
		<td data-name="assetgroup_id">
<?php if (!$t007_assettype->isConfirm()) { ?>
<?php if ($t007_assettype_grid->assetgroup_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t007_assettype_assetgroup_id" class="form-group t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_grid->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_grid->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t007_assettype_assetgroup_id" class="form-group t007_assettype_assetgroup_id">
<?php
$onchange = $t007_assettype_grid->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_grid->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="sv_x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_grid->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_grid->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_grid->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_grid->assetgroup_id->ReadOnly || $t007_assettype_grid->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_grid->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypegrid"], function() {
	ft007_assettypegrid.createAutoSuggest({"id":"x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_grid->assetgroup_id->Lookup->getParamTag($t007_assettype_grid, "p_x" . $t007_assettype_grid->RowIndex . "_assetgroup_id") ?>
</span>
<?php } ?>
<?php } else { ?>
<span id="el$rowindex$_t007_assettype_assetgroup_id" class="form-group t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_grid->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_grid->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" id="o<?php echo $t007_assettype_grid->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_grid->assetgroup_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_assettype_grid->Description->Visible) { // Description ?>
		<td data-name="Description">
<?php if (!$t007_assettype->isConfirm()) { ?>
<span id="el$rowindex$_t007_assettype_Description" class="form-group t007_assettype_Description">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_grid->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_grid->Description->EditValue ?>"<?php echo $t007_assettype_grid->Description->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t007_assettype_Description" class="form-group t007_assettype_Description">
<span<?php echo $t007_assettype_grid->Description->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_grid->Description->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_grid->Description->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="o<?php echo $t007_assettype_grid->RowIndex ?>_Description" id="o<?php echo $t007_assettype_grid->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_grid->Description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_assettype_grid->Code->Visible) { // Code ?>
		<td data-name="Code">
<?php if (!$t007_assettype->isConfirm()) { ?>
<span id="el$rowindex$_t007_assettype_Code" class="form-group t007_assettype_Code">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_grid->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_grid->Code->EditValue ?>"<?php echo $t007_assettype_grid->Code->editAttributes() ?>>
</span>
<?php } else { ?>
<span id="el$rowindex$_t007_assettype_Code" class="form-group t007_assettype_Code">
<span<?php echo $t007_assettype_grid->Code->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_grid->Code->ViewValue)) ?>"></span>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="x<?php echo $t007_assettype_grid->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_grid->Code->FormValue) ?>">
<?php } ?>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="o<?php echo $t007_assettype_grid->RowIndex ?>_Code" id="o<?php echo $t007_assettype_grid->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_grid->Code->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_assettype_grid->ListOptions->render("body", "right", $t007_assettype_grid->RowIndex);
?>
<script>
loadjs.ready(["ft007_assettypegrid", "load"], function() {
	ft007_assettypegrid.updateLists(<?php echo $t007_assettype_grid->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
</tbody>
</table><!-- /.ew-table -->
</div><!-- /.ew-grid-middle-panel -->
<?php if ($t007_assettype->CurrentMode == "add" || $t007_assettype->CurrentMode == "copy") { ?>
<input type="hidden" name="<?php echo $t007_assettype_grid->FormKeyCountName ?>" id="<?php echo $t007_assettype_grid->FormKeyCountName ?>" value="<?php echo $t007_assettype_grid->KeyCount ?>">
<?php echo $t007_assettype_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t007_assettype->CurrentMode == "edit") { ?>
<input type="hidden" name="<?php echo $t007_assettype_grid->FormKeyCountName ?>" id="<?php echo $t007_assettype_grid->FormKeyCountName ?>" value="<?php echo $t007_assettype_grid->KeyCount ?>">
<?php echo $t007_assettype_grid->MultiSelectKey ?>
<?php } ?>
<?php if ($t007_assettype->CurrentMode == "") { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
<input type="hidden" name="detailpage" value="ft007_assettypegrid">
</div><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t007_assettype_grid->Recordset)
	$t007_assettype_grid->Recordset->Close();
?>
<?php if ($t007_assettype_grid->ShowOtherOptions) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php $t007_assettype_grid->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t007_assettype_grid->TotalRecords == 0 && !$t007_assettype->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t007_assettype_grid->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php if (!$t007_assettype_grid->isExport()) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php
$t007_assettype_grid->terminate();
?>