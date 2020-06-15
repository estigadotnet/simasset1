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
$t002_department_list = new t002_department_list();

// Run the page
$t002_department_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t002_department_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t002_department_list->isExport()) { ?>
<script>
var ft002_departmentlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft002_departmentlist = currentForm = new ew.Form("ft002_departmentlist", "list");
	ft002_departmentlist.formKeyCountName = '<?php echo $t002_department_list->FormKeyCountName ?>';

	// Validate form
	ft002_departmentlist.validate = function() {
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
			<?php if ($t002_department_list->Department->Required) { ?>
				elm = this.getElements("x" + infix + "_Department");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t002_department_list->Department->caption(), $t002_department_list->Department->RequiredErrorMessage)) ?>");
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
	ft002_departmentlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Department", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft002_departmentlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft002_departmentlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft002_departmentlist");
});
var ft002_departmentlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft002_departmentlistsrch = currentSearchForm = new ew.Form("ft002_departmentlistsrch");

	// Dynamic selection lists
	// Filters

	ft002_departmentlistsrch.filterList = <?php echo $t002_department_list->getFilterList() ?>;
	loadjs.done("ft002_departmentlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t002_department_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t002_department_list->TotalRecords > 0 && $t002_department_list->ExportOptions->visible()) { ?>
<?php $t002_department_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_department_list->ImportOptions->visible()) { ?>
<?php $t002_department_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t002_department_list->SearchOptions->visible()) { ?>
<?php $t002_department_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t002_department_list->FilterOptions->visible()) { ?>
<?php $t002_department_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t002_department_list->renderOtherOptions();
?>
<?php $t002_department_list->showPageHeader(); ?>
<?php
$t002_department_list->showMessage();
?>
<?php if ($t002_department_list->TotalRecords > 0 || $t002_department->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t002_department_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t002_department">
<form name="ft002_departmentlist" id="ft002_departmentlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t002_department">
<div id="gmp_t002_department" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t002_department_list->TotalRecords > 0 || $t002_department_list->isGridEdit()) { ?>
<table id="tbl_t002_departmentlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t002_department->RowType = ROWTYPE_HEADER;

// Render list options
$t002_department_list->renderListOptions();

// Render list options (header, left)
$t002_department_list->ListOptions->render("header", "left");
?>
<?php if ($t002_department_list->Department->Visible) { // Department ?>
	<?php if ($t002_department_list->SortUrl($t002_department_list->Department) == "") { ?>
		<th data-name="Department" class="<?php echo $t002_department_list->Department->headerCellClass() ?>"><div id="elh_t002_department_Department" class="t002_department_Department"><div class="ew-table-header-caption"><?php echo $t002_department_list->Department->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Department" class="<?php echo $t002_department_list->Department->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t002_department_list->SortUrl($t002_department_list->Department) ?>', 2);"><div id="elh_t002_department_Department" class="t002_department_Department">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t002_department_list->Department->caption() ?></span><span class="ew-table-header-sort"><?php if ($t002_department_list->Department->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t002_department_list->Department->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t002_department_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t002_department_list->ExportAll && $t002_department_list->isExport()) {
	$t002_department_list->StopRecord = $t002_department_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t002_department_list->TotalRecords > $t002_department_list->StartRecord + $t002_department_list->DisplayRecords - 1)
		$t002_department_list->StopRecord = $t002_department_list->StartRecord + $t002_department_list->DisplayRecords - 1;
	else
		$t002_department_list->StopRecord = $t002_department_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t002_department->isConfirm() || $t002_department_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t002_department_list->FormKeyCountName) && ($t002_department_list->isGridAdd() || $t002_department_list->isGridEdit() || $t002_department->isConfirm())) {
		$t002_department_list->KeyCount = $CurrentForm->getValue($t002_department_list->FormKeyCountName);
		$t002_department_list->StopRecord = $t002_department_list->StartRecord + $t002_department_list->KeyCount - 1;
	}
}
$t002_department_list->RecordCount = $t002_department_list->StartRecord - 1;
if ($t002_department_list->Recordset && !$t002_department_list->Recordset->EOF) {
	$t002_department_list->Recordset->moveFirst();
	$selectLimit = $t002_department_list->UseSelectLimit;
	if (!$selectLimit && $t002_department_list->StartRecord > 1)
		$t002_department_list->Recordset->move($t002_department_list->StartRecord - 1);
} elseif (!$t002_department->AllowAddDeleteRow && $t002_department_list->StopRecord == 0) {
	$t002_department_list->StopRecord = $t002_department->GridAddRowCount;
}

// Initialize aggregate
$t002_department->RowType = ROWTYPE_AGGREGATEINIT;
$t002_department->resetAttributes();
$t002_department_list->renderRow();
if ($t002_department_list->isGridAdd())
	$t002_department_list->RowIndex = 0;
if ($t002_department_list->isGridEdit())
	$t002_department_list->RowIndex = 0;
while ($t002_department_list->RecordCount < $t002_department_list->StopRecord) {
	$t002_department_list->RecordCount++;
	if ($t002_department_list->RecordCount >= $t002_department_list->StartRecord) {
		$t002_department_list->RowCount++;
		if ($t002_department_list->isGridAdd() || $t002_department_list->isGridEdit() || $t002_department->isConfirm()) {
			$t002_department_list->RowIndex++;
			$CurrentForm->Index = $t002_department_list->RowIndex;
			if ($CurrentForm->hasValue($t002_department_list->FormActionName) && ($t002_department->isConfirm() || $t002_department_list->EventCancelled))
				$t002_department_list->RowAction = strval($CurrentForm->getValue($t002_department_list->FormActionName));
			elseif ($t002_department_list->isGridAdd())
				$t002_department_list->RowAction = "insert";
			else
				$t002_department_list->RowAction = "";
		}

		// Set up key count
		$t002_department_list->KeyCount = $t002_department_list->RowIndex;

		// Init row class and style
		$t002_department->resetAttributes();
		$t002_department->CssClass = "";
		if ($t002_department_list->isGridAdd()) {
			$t002_department_list->loadRowValues(); // Load default values
		} else {
			$t002_department_list->loadRowValues($t002_department_list->Recordset); // Load row values
		}
		$t002_department->RowType = ROWTYPE_VIEW; // Render view
		if ($t002_department_list->isGridAdd()) // Grid add
			$t002_department->RowType = ROWTYPE_ADD; // Render add
		if ($t002_department_list->isGridAdd() && $t002_department->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t002_department_list->restoreCurrentRowFormValues($t002_department_list->RowIndex); // Restore form values
		if ($t002_department_list->isGridEdit()) { // Grid edit
			if ($t002_department->EventCancelled)
				$t002_department_list->restoreCurrentRowFormValues($t002_department_list->RowIndex); // Restore form values
			if ($t002_department_list->RowAction == "insert")
				$t002_department->RowType = ROWTYPE_ADD; // Render add
			else
				$t002_department->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t002_department_list->isGridEdit() && ($t002_department->RowType == ROWTYPE_EDIT || $t002_department->RowType == ROWTYPE_ADD) && $t002_department->EventCancelled) // Update failed
			$t002_department_list->restoreCurrentRowFormValues($t002_department_list->RowIndex); // Restore form values
		if ($t002_department->RowType == ROWTYPE_EDIT) // Edit row
			$t002_department_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t002_department->RowAttrs->merge(["data-rowindex" => $t002_department_list->RowCount, "id" => "r" . $t002_department_list->RowCount . "_t002_department", "data-rowtype" => $t002_department->RowType]);

		// Render row
		$t002_department_list->renderRow();

		// Render list options
		$t002_department_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t002_department_list->RowAction != "delete" && $t002_department_list->RowAction != "insertdelete" && !($t002_department_list->RowAction == "insert" && $t002_department->isConfirm() && $t002_department_list->emptyRow())) {
?>
	<tr <?php echo $t002_department->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_department_list->ListOptions->render("body", "left", $t002_department_list->RowCount);
?>
	<?php if ($t002_department_list->Department->Visible) { // Department ?>
		<td data-name="Department" <?php echo $t002_department_list->Department->cellAttributes() ?>>
<?php if ($t002_department->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t002_department_list->RowCount ?>_t002_department_Department" class="form-group">
<input type="text" data-table="t002_department" data-field="x_Department" name="x<?php echo $t002_department_list->RowIndex ?>_Department" id="x<?php echo $t002_department_list->RowIndex ?>_Department" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t002_department_list->Department->getPlaceHolder()) ?>" value="<?php echo $t002_department_list->Department->EditValue ?>"<?php echo $t002_department_list->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_department" data-field="x_Department" name="o<?php echo $t002_department_list->RowIndex ?>_Department" id="o<?php echo $t002_department_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($t002_department_list->Department->OldValue) ?>">
<?php } ?>
<?php if ($t002_department->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t002_department_list->RowCount ?>_t002_department_Department" class="form-group">
<input type="text" data-table="t002_department" data-field="x_Department" name="x<?php echo $t002_department_list->RowIndex ?>_Department" id="x<?php echo $t002_department_list->RowIndex ?>_Department" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t002_department_list->Department->getPlaceHolder()) ?>" value="<?php echo $t002_department_list->Department->EditValue ?>"<?php echo $t002_department_list->Department->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t002_department->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t002_department_list->RowCount ?>_t002_department_Department">
<span<?php echo $t002_department_list->Department->viewAttributes() ?>><?php echo $t002_department_list->Department->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t002_department->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t002_department" data-field="x_id" name="x<?php echo $t002_department_list->RowIndex ?>_id" id="x<?php echo $t002_department_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_department_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t002_department" data-field="x_id" name="o<?php echo $t002_department_list->RowIndex ?>_id" id="o<?php echo $t002_department_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_department_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t002_department->RowType == ROWTYPE_EDIT || $t002_department->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t002_department" data-field="x_id" name="x<?php echo $t002_department_list->RowIndex ?>_id" id="x<?php echo $t002_department_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t002_department_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t002_department_list->ListOptions->render("body", "right", $t002_department_list->RowCount);
?>
	</tr>
<?php if ($t002_department->RowType == ROWTYPE_ADD || $t002_department->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft002_departmentlist", "load"], function() {
	ft002_departmentlist.updateLists(<?php echo $t002_department_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t002_department_list->isGridAdd())
		if (!$t002_department_list->Recordset->EOF)
			$t002_department_list->Recordset->moveNext();
}
?>
<?php
	if ($t002_department_list->isGridAdd() || $t002_department_list->isGridEdit()) {
		$t002_department_list->RowIndex = '$rowindex$';
		$t002_department_list->loadRowValues();

		// Set row properties
		$t002_department->resetAttributes();
		$t002_department->RowAttrs->merge(["data-rowindex" => $t002_department_list->RowIndex, "id" => "r0_t002_department", "data-rowtype" => ROWTYPE_ADD]);
		$t002_department->RowAttrs->appendClass("ew-template");
		$t002_department->RowType = ROWTYPE_ADD;

		// Render row
		$t002_department_list->renderRow();

		// Render list options
		$t002_department_list->renderListOptions();
		$t002_department_list->StartRowCount = 0;
?>
	<tr <?php echo $t002_department->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t002_department_list->ListOptions->render("body", "left", $t002_department_list->RowIndex);
?>
	<?php if ($t002_department_list->Department->Visible) { // Department ?>
		<td data-name="Department">
<span id="el$rowindex$_t002_department_Department" class="form-group t002_department_Department">
<input type="text" data-table="t002_department" data-field="x_Department" name="x<?php echo $t002_department_list->RowIndex ?>_Department" id="x<?php echo $t002_department_list->RowIndex ?>_Department" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t002_department_list->Department->getPlaceHolder()) ?>" value="<?php echo $t002_department_list->Department->EditValue ?>"<?php echo $t002_department_list->Department->editAttributes() ?>>
</span>
<input type="hidden" data-table="t002_department" data-field="x_Department" name="o<?php echo $t002_department_list->RowIndex ?>_Department" id="o<?php echo $t002_department_list->RowIndex ?>_Department" value="<?php echo HtmlEncode($t002_department_list->Department->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t002_department_list->ListOptions->render("body", "right", $t002_department_list->RowIndex);
?>
<script>
loadjs.ready(["ft002_departmentlist", "load"], function() {
	ft002_departmentlist.updateLists(<?php echo $t002_department_list->RowIndex ?>);
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
<?php if ($t002_department_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t002_department_list->FormKeyCountName ?>" id="<?php echo $t002_department_list->FormKeyCountName ?>" value="<?php echo $t002_department_list->KeyCount ?>">
<?php echo $t002_department_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t002_department_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t002_department_list->FormKeyCountName ?>" id="<?php echo $t002_department_list->FormKeyCountName ?>" value="<?php echo $t002_department_list->KeyCount ?>">
<?php echo $t002_department_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t002_department->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t002_department_list->Recordset)
	$t002_department_list->Recordset->Close();
?>
<?php if (!$t002_department_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t002_department_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t002_department_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t002_department_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t002_department_list->TotalRecords == 0 && !$t002_department->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t002_department_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t002_department_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t002_department_list->isExport()) { ?>
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
$t002_department_list->terminate();
?>