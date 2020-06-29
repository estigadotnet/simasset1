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
$t005_assetgroup_list = new t005_assetgroup_list();

// Run the page
$t005_assetgroup_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t005_assetgroup_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t005_assetgroup_list->isExport()) { ?>
<script>
var ft005_assetgrouplist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft005_assetgrouplist = currentForm = new ew.Form("ft005_assetgrouplist", "list");
	ft005_assetgrouplist.formKeyCountName = '<?php echo $t005_assetgroup_list->FormKeyCountName ?>';

	// Validate form
	ft005_assetgrouplist.validate = function() {
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
			<?php if ($t005_assetgroup_list->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_list->Code->caption(), $t005_assetgroup_list->Code->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_list->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_list->Description->caption(), $t005_assetgroup_list->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t005_assetgroup_list->EstimatedLife->Required) { ?>
				elm = this.getElements("x" + infix + "_EstimatedLife");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_list->EstimatedLife->caption(), $t005_assetgroup_list->EstimatedLife->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_EstimatedLife");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_list->EstimatedLife->errorMessage()) ?>");
			<?php if ($t005_assetgroup_list->SLN->Required) { ?>
				elm = this.getElements("x" + infix + "_SLN");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t005_assetgroup_list->SLN->caption(), $t005_assetgroup_list->SLN->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_SLN");
				if (elm && !ew.checkNumber(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t005_assetgroup_list->SLN->errorMessage()) ?>");

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
	ft005_assetgrouplist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Code", false)) return false;
		if (ew.valueChanged(fobj, infix, "Description", false)) return false;
		if (ew.valueChanged(fobj, infix, "EstimatedLife", false)) return false;
		if (ew.valueChanged(fobj, infix, "SLN", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft005_assetgrouplist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft005_assetgrouplist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft005_assetgrouplist");
});
var ft005_assetgrouplistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft005_assetgrouplistsrch = currentSearchForm = new ew.Form("ft005_assetgrouplistsrch");

	// Dynamic selection lists
	// Filters

	ft005_assetgrouplistsrch.filterList = <?php echo $t005_assetgroup_list->getFilterList() ?>;
	loadjs.done("ft005_assetgrouplistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t005_assetgroup_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t005_assetgroup_list->TotalRecords > 0 && $t005_assetgroup_list->ExportOptions->visible()) { ?>
<?php $t005_assetgroup_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t005_assetgroup_list->ImportOptions->visible()) { ?>
<?php $t005_assetgroup_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t005_assetgroup_list->SearchOptions->visible()) { ?>
<?php $t005_assetgroup_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t005_assetgroup_list->FilterOptions->visible()) { ?>
<?php $t005_assetgroup_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t005_assetgroup_list->renderOtherOptions();
?>
<?php $t005_assetgroup_list->showPageHeader(); ?>
<?php
$t005_assetgroup_list->showMessage();
?>
<?php if ($t005_assetgroup_list->TotalRecords > 0 || $t005_assetgroup->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t005_assetgroup_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t005_assetgroup">
<form name="ft005_assetgrouplist" id="ft005_assetgrouplist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t005_assetgroup">
<div id="gmp_t005_assetgroup" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t005_assetgroup_list->TotalRecords > 0 || $t005_assetgroup_list->isGridEdit()) { ?>
<table id="tbl_t005_assetgrouplist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t005_assetgroup->RowType = ROWTYPE_HEADER;

// Render list options
$t005_assetgroup_list->renderListOptions();

// Render list options (header, left)
$t005_assetgroup_list->ListOptions->render("header", "left");
?>
<?php if ($t005_assetgroup_list->Code->Visible) { // Code ?>
	<?php if ($t005_assetgroup_list->SortUrl($t005_assetgroup_list->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $t005_assetgroup_list->Code->headerCellClass() ?>"><div id="elh_t005_assetgroup_Code" class="t005_assetgroup_Code"><div class="ew-table-header-caption"><?php echo $t005_assetgroup_list->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $t005_assetgroup_list->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_assetgroup_list->SortUrl($t005_assetgroup_list->Code) ?>', 2);"><div id="elh_t005_assetgroup_Code" class="t005_assetgroup_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_assetgroup_list->Code->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_assetgroup_list->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_assetgroup_list->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_assetgroup_list->Description->Visible) { // Description ?>
	<?php if ($t005_assetgroup_list->SortUrl($t005_assetgroup_list->Description) == "") { ?>
		<th data-name="Description" class="<?php echo $t005_assetgroup_list->Description->headerCellClass() ?>"><div id="elh_t005_assetgroup_Description" class="t005_assetgroup_Description"><div class="ew-table-header-caption"><?php echo $t005_assetgroup_list->Description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Description" class="<?php echo $t005_assetgroup_list->Description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_assetgroup_list->SortUrl($t005_assetgroup_list->Description) ?>', 2);"><div id="elh_t005_assetgroup_Description" class="t005_assetgroup_Description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_assetgroup_list->Description->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_assetgroup_list->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_assetgroup_list->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_assetgroup_list->EstimatedLife->Visible) { // EstimatedLife ?>
	<?php if ($t005_assetgroup_list->SortUrl($t005_assetgroup_list->EstimatedLife) == "") { ?>
		<th data-name="EstimatedLife" class="<?php echo $t005_assetgroup_list->EstimatedLife->headerCellClass() ?>"><div id="elh_t005_assetgroup_EstimatedLife" class="t005_assetgroup_EstimatedLife"><div class="ew-table-header-caption"><?php echo $t005_assetgroup_list->EstimatedLife->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="EstimatedLife" class="<?php echo $t005_assetgroup_list->EstimatedLife->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_assetgroup_list->SortUrl($t005_assetgroup_list->EstimatedLife) ?>', 2);"><div id="elh_t005_assetgroup_EstimatedLife" class="t005_assetgroup_EstimatedLife">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_assetgroup_list->EstimatedLife->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_assetgroup_list->EstimatedLife->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_assetgroup_list->EstimatedLife->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t005_assetgroup_list->SLN->Visible) { // SLN ?>
	<?php if ($t005_assetgroup_list->SortUrl($t005_assetgroup_list->SLN) == "") { ?>
		<th data-name="SLN" class="<?php echo $t005_assetgroup_list->SLN->headerCellClass() ?>"><div id="elh_t005_assetgroup_SLN" class="t005_assetgroup_SLN"><div class="ew-table-header-caption"><?php echo $t005_assetgroup_list->SLN->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="SLN" class="<?php echo $t005_assetgroup_list->SLN->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t005_assetgroup_list->SortUrl($t005_assetgroup_list->SLN) ?>', 2);"><div id="elh_t005_assetgroup_SLN" class="t005_assetgroup_SLN">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t005_assetgroup_list->SLN->caption() ?></span><span class="ew-table-header-sort"><?php if ($t005_assetgroup_list->SLN->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t005_assetgroup_list->SLN->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t005_assetgroup_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t005_assetgroup_list->ExportAll && $t005_assetgroup_list->isExport()) {
	$t005_assetgroup_list->StopRecord = $t005_assetgroup_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t005_assetgroup_list->TotalRecords > $t005_assetgroup_list->StartRecord + $t005_assetgroup_list->DisplayRecords - 1)
		$t005_assetgroup_list->StopRecord = $t005_assetgroup_list->StartRecord + $t005_assetgroup_list->DisplayRecords - 1;
	else
		$t005_assetgroup_list->StopRecord = $t005_assetgroup_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t005_assetgroup->isConfirm() || $t005_assetgroup_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t005_assetgroup_list->FormKeyCountName) && ($t005_assetgroup_list->isGridAdd() || $t005_assetgroup_list->isGridEdit() || $t005_assetgroup->isConfirm())) {
		$t005_assetgroup_list->KeyCount = $CurrentForm->getValue($t005_assetgroup_list->FormKeyCountName);
		$t005_assetgroup_list->StopRecord = $t005_assetgroup_list->StartRecord + $t005_assetgroup_list->KeyCount - 1;
	}
}
$t005_assetgroup_list->RecordCount = $t005_assetgroup_list->StartRecord - 1;
if ($t005_assetgroup_list->Recordset && !$t005_assetgroup_list->Recordset->EOF) {
	$t005_assetgroup_list->Recordset->moveFirst();
	$selectLimit = $t005_assetgroup_list->UseSelectLimit;
	if (!$selectLimit && $t005_assetgroup_list->StartRecord > 1)
		$t005_assetgroup_list->Recordset->move($t005_assetgroup_list->StartRecord - 1);
} elseif (!$t005_assetgroup->AllowAddDeleteRow && $t005_assetgroup_list->StopRecord == 0) {
	$t005_assetgroup_list->StopRecord = $t005_assetgroup->GridAddRowCount;
}

// Initialize aggregate
$t005_assetgroup->RowType = ROWTYPE_AGGREGATEINIT;
$t005_assetgroup->resetAttributes();
$t005_assetgroup_list->renderRow();
if ($t005_assetgroup_list->isGridAdd())
	$t005_assetgroup_list->RowIndex = 0;
if ($t005_assetgroup_list->isGridEdit())
	$t005_assetgroup_list->RowIndex = 0;
while ($t005_assetgroup_list->RecordCount < $t005_assetgroup_list->StopRecord) {
	$t005_assetgroup_list->RecordCount++;
	if ($t005_assetgroup_list->RecordCount >= $t005_assetgroup_list->StartRecord) {
		$t005_assetgroup_list->RowCount++;
		if ($t005_assetgroup_list->isGridAdd() || $t005_assetgroup_list->isGridEdit() || $t005_assetgroup->isConfirm()) {
			$t005_assetgroup_list->RowIndex++;
			$CurrentForm->Index = $t005_assetgroup_list->RowIndex;
			if ($CurrentForm->hasValue($t005_assetgroup_list->FormActionName) && ($t005_assetgroup->isConfirm() || $t005_assetgroup_list->EventCancelled))
				$t005_assetgroup_list->RowAction = strval($CurrentForm->getValue($t005_assetgroup_list->FormActionName));
			elseif ($t005_assetgroup_list->isGridAdd())
				$t005_assetgroup_list->RowAction = "insert";
			else
				$t005_assetgroup_list->RowAction = "";
		}

		// Set up key count
		$t005_assetgroup_list->KeyCount = $t005_assetgroup_list->RowIndex;

		// Init row class and style
		$t005_assetgroup->resetAttributes();
		$t005_assetgroup->CssClass = "";
		if ($t005_assetgroup_list->isGridAdd()) {
			$t005_assetgroup_list->loadRowValues(); // Load default values
		} else {
			$t005_assetgroup_list->loadRowValues($t005_assetgroup_list->Recordset); // Load row values
		}
		$t005_assetgroup->RowType = ROWTYPE_VIEW; // Render view
		if ($t005_assetgroup_list->isGridAdd()) // Grid add
			$t005_assetgroup->RowType = ROWTYPE_ADD; // Render add
		if ($t005_assetgroup_list->isGridAdd() && $t005_assetgroup->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t005_assetgroup_list->restoreCurrentRowFormValues($t005_assetgroup_list->RowIndex); // Restore form values
		if ($t005_assetgroup_list->isGridEdit()) { // Grid edit
			if ($t005_assetgroup->EventCancelled)
				$t005_assetgroup_list->restoreCurrentRowFormValues($t005_assetgroup_list->RowIndex); // Restore form values
			if ($t005_assetgroup_list->RowAction == "insert")
				$t005_assetgroup->RowType = ROWTYPE_ADD; // Render add
			else
				$t005_assetgroup->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t005_assetgroup_list->isGridEdit() && ($t005_assetgroup->RowType == ROWTYPE_EDIT || $t005_assetgroup->RowType == ROWTYPE_ADD) && $t005_assetgroup->EventCancelled) // Update failed
			$t005_assetgroup_list->restoreCurrentRowFormValues($t005_assetgroup_list->RowIndex); // Restore form values
		if ($t005_assetgroup->RowType == ROWTYPE_EDIT) // Edit row
			$t005_assetgroup_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t005_assetgroup->RowAttrs->merge(["data-rowindex" => $t005_assetgroup_list->RowCount, "id" => "r" . $t005_assetgroup_list->RowCount . "_t005_assetgroup", "data-rowtype" => $t005_assetgroup->RowType]);

		// Render row
		$t005_assetgroup_list->renderRow();

		// Render list options
		$t005_assetgroup_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t005_assetgroup_list->RowAction != "delete" && $t005_assetgroup_list->RowAction != "insertdelete" && !($t005_assetgroup_list->RowAction == "insert" && $t005_assetgroup->isConfirm() && $t005_assetgroup_list->emptyRow())) {
?>
	<tr <?php echo $t005_assetgroup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_assetgroup_list->ListOptions->render("body", "left", $t005_assetgroup_list->RowCount);
?>
	<?php if ($t005_assetgroup_list->Code->Visible) { // Code ?>
		<td data-name="Code" <?php echo $t005_assetgroup_list->Code->cellAttributes() ?>>
<?php if ($t005_assetgroup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_Code" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_Code" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_Code" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_Code" size="2" maxlength="5" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->Code->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->Code->EditValue ?>"<?php echo $t005_assetgroup_list->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_Code" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_Code" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_Code" value="<?php echo HtmlEncode($t005_assetgroup_list->Code->OldValue) ?>">
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_Code" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_Code" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_Code" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_Code" size="2" maxlength="5" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->Code->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->Code->EditValue ?>"<?php echo $t005_assetgroup_list->Code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_Code">
<span<?php echo $t005_assetgroup_list->Code->viewAttributes() ?>><?php echo $t005_assetgroup_list->Code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t005_assetgroup" data-field="x_id" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_id" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_assetgroup_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t005_assetgroup" data-field="x_id" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_id" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_assetgroup_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_EDIT || $t005_assetgroup->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t005_assetgroup" data-field="x_id" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_id" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t005_assetgroup_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t005_assetgroup_list->Description->Visible) { // Description ?>
		<td data-name="Description" <?php echo $t005_assetgroup_list->Description->cellAttributes() ?>>
<?php if ($t005_assetgroup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_Description" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_Description" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_Description" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->Description->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->Description->EditValue ?>"<?php echo $t005_assetgroup_list->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_Description" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_Description" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_Description" value="<?php echo HtmlEncode($t005_assetgroup_list->Description->OldValue) ?>">
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_Description" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_Description" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_Description" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->Description->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->Description->EditValue ?>"<?php echo $t005_assetgroup_list->Description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_Description">
<span<?php echo $t005_assetgroup_list->Description->viewAttributes() ?>><?php echo $t005_assetgroup_list->Description->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_assetgroup_list->EstimatedLife->Visible) { // EstimatedLife ?>
		<td data-name="EstimatedLife" <?php echo $t005_assetgroup_list->EstimatedLife->cellAttributes() ?>>
<?php if ($t005_assetgroup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_EstimatedLife" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->EstimatedLife->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->EstimatedLife->EditValue ?>"<?php echo $t005_assetgroup_list->EstimatedLife->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" value="<?php echo HtmlEncode($t005_assetgroup_list->EstimatedLife->OldValue) ?>">
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_EstimatedLife" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->EstimatedLife->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->EstimatedLife->EditValue ?>"<?php echo $t005_assetgroup_list->EstimatedLife->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_EstimatedLife">
<span<?php echo $t005_assetgroup_list->EstimatedLife->viewAttributes() ?>><?php echo $t005_assetgroup_list->EstimatedLife->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t005_assetgroup_list->SLN->Visible) { // SLN ?>
		<td data-name="SLN" <?php echo $t005_assetgroup_list->SLN->cellAttributes() ?>>
<?php if ($t005_assetgroup->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_SLN" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_SLN" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->SLN->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->SLN->EditValue ?>"<?php echo $t005_assetgroup_list->SLN->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_SLN" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" value="<?php echo HtmlEncode($t005_assetgroup_list->SLN->OldValue) ?>">
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_SLN" class="form-group">
<input type="text" data-table="t005_assetgroup" data-field="x_SLN" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->SLN->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->SLN->EditValue ?>"<?php echo $t005_assetgroup_list->SLN->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t005_assetgroup->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t005_assetgroup_list->RowCount ?>_t005_assetgroup_SLN">
<span<?php echo $t005_assetgroup_list->SLN->viewAttributes() ?>><?php echo $t005_assetgroup_list->SLN->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_assetgroup_list->ListOptions->render("body", "right", $t005_assetgroup_list->RowCount);
?>
	</tr>
<?php if ($t005_assetgroup->RowType == ROWTYPE_ADD || $t005_assetgroup->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft005_assetgrouplist", "load"], function() {
	ft005_assetgrouplist.updateLists(<?php echo $t005_assetgroup_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t005_assetgroup_list->isGridAdd())
		if (!$t005_assetgroup_list->Recordset->EOF)
			$t005_assetgroup_list->Recordset->moveNext();
}
?>
<?php
	if ($t005_assetgroup_list->isGridAdd() || $t005_assetgroup_list->isGridEdit()) {
		$t005_assetgroup_list->RowIndex = '$rowindex$';
		$t005_assetgroup_list->loadRowValues();

		// Set row properties
		$t005_assetgroup->resetAttributes();
		$t005_assetgroup->RowAttrs->merge(["data-rowindex" => $t005_assetgroup_list->RowIndex, "id" => "r0_t005_assetgroup", "data-rowtype" => ROWTYPE_ADD]);
		$t005_assetgroup->RowAttrs->appendClass("ew-template");
		$t005_assetgroup->RowType = ROWTYPE_ADD;

		// Render row
		$t005_assetgroup_list->renderRow();

		// Render list options
		$t005_assetgroup_list->renderListOptions();
		$t005_assetgroup_list->StartRowCount = 0;
?>
	<tr <?php echo $t005_assetgroup->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t005_assetgroup_list->ListOptions->render("body", "left", $t005_assetgroup_list->RowIndex);
?>
	<?php if ($t005_assetgroup_list->Code->Visible) { // Code ?>
		<td data-name="Code">
<span id="el$rowindex$_t005_assetgroup_Code" class="form-group t005_assetgroup_Code">
<input type="text" data-table="t005_assetgroup" data-field="x_Code" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_Code" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_Code" size="2" maxlength="5" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->Code->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->Code->EditValue ?>"<?php echo $t005_assetgroup_list->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_Code" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_Code" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_Code" value="<?php echo HtmlEncode($t005_assetgroup_list->Code->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_assetgroup_list->Description->Visible) { // Description ?>
		<td data-name="Description">
<span id="el$rowindex$_t005_assetgroup_Description" class="form-group t005_assetgroup_Description">
<input type="text" data-table="t005_assetgroup" data-field="x_Description" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_Description" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_Description" size="30" maxlength="255" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->Description->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->Description->EditValue ?>"<?php echo $t005_assetgroup_list->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_Description" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_Description" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_Description" value="<?php echo HtmlEncode($t005_assetgroup_list->Description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_assetgroup_list->EstimatedLife->Visible) { // EstimatedLife ?>
		<td data-name="EstimatedLife">
<span id="el$rowindex$_t005_assetgroup_EstimatedLife" class="form-group t005_assetgroup_EstimatedLife">
<input type="text" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->EstimatedLife->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->EstimatedLife->EditValue ?>"<?php echo $t005_assetgroup_list->EstimatedLife->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_EstimatedLife" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_EstimatedLife" value="<?php echo HtmlEncode($t005_assetgroup_list->EstimatedLife->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t005_assetgroup_list->SLN->Visible) { // SLN ?>
		<td data-name="SLN">
<span id="el$rowindex$_t005_assetgroup_SLN" class="form-group t005_assetgroup_SLN">
<input type="text" data-table="t005_assetgroup" data-field="x_SLN" name="x<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" id="x<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" size="2" maxlength="4" placeholder="<?php echo HtmlEncode($t005_assetgroup_list->SLN->getPlaceHolder()) ?>" value="<?php echo $t005_assetgroup_list->SLN->EditValue ?>"<?php echo $t005_assetgroup_list->SLN->editAttributes() ?>>
</span>
<input type="hidden" data-table="t005_assetgroup" data-field="x_SLN" name="o<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" id="o<?php echo $t005_assetgroup_list->RowIndex ?>_SLN" value="<?php echo HtmlEncode($t005_assetgroup_list->SLN->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t005_assetgroup_list->ListOptions->render("body", "right", $t005_assetgroup_list->RowIndex);
?>
<script>
loadjs.ready(["ft005_assetgrouplist", "load"], function() {
	ft005_assetgrouplist.updateLists(<?php echo $t005_assetgroup_list->RowIndex ?>);
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
<?php if ($t005_assetgroup_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t005_assetgroup_list->FormKeyCountName ?>" id="<?php echo $t005_assetgroup_list->FormKeyCountName ?>" value="<?php echo $t005_assetgroup_list->KeyCount ?>">
<?php echo $t005_assetgroup_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t005_assetgroup_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t005_assetgroup_list->FormKeyCountName ?>" id="<?php echo $t005_assetgroup_list->FormKeyCountName ?>" value="<?php echo $t005_assetgroup_list->KeyCount ?>">
<?php echo $t005_assetgroup_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t005_assetgroup->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t005_assetgroup_list->Recordset)
	$t005_assetgroup_list->Recordset->Close();
?>
<?php if (!$t005_assetgroup_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t005_assetgroup_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t005_assetgroup_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t005_assetgroup_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t005_assetgroup_list->TotalRecords == 0 && !$t005_assetgroup->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t005_assetgroup_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t005_assetgroup_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t005_assetgroup_list->isExport()) { ?>
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
$t005_assetgroup_list->terminate();
?>