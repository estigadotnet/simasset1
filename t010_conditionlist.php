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
$t010_condition_list = new t010_condition_list();

// Run the page
$t010_condition_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t010_condition_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t010_condition_list->isExport()) { ?>
<script>
var ft010_conditionlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft010_conditionlist = currentForm = new ew.Form("ft010_conditionlist", "list");
	ft010_conditionlist.formKeyCountName = '<?php echo $t010_condition_list->FormKeyCountName ?>';

	// Validate form
	ft010_conditionlist.validate = function() {
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
			<?php if ($t010_condition_list->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t010_condition_list->Status->caption(), $t010_condition_list->Status->RequiredErrorMessage)) ?>");
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
	ft010_conditionlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft010_conditionlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft010_conditionlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft010_conditionlist");
});
var ft010_conditionlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft010_conditionlistsrch = currentSearchForm = new ew.Form("ft010_conditionlistsrch");

	// Dynamic selection lists
	// Filters

	ft010_conditionlistsrch.filterList = <?php echo $t010_condition_list->getFilterList() ?>;
	loadjs.done("ft010_conditionlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t010_condition_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t010_condition_list->TotalRecords > 0 && $t010_condition_list->ExportOptions->visible()) { ?>
<?php $t010_condition_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t010_condition_list->ImportOptions->visible()) { ?>
<?php $t010_condition_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t010_condition_list->SearchOptions->visible()) { ?>
<?php $t010_condition_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t010_condition_list->FilterOptions->visible()) { ?>
<?php $t010_condition_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t010_condition_list->renderOtherOptions();
?>
<?php $t010_condition_list->showPageHeader(); ?>
<?php
$t010_condition_list->showMessage();
?>
<?php if ($t010_condition_list->TotalRecords > 0 || $t010_condition->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t010_condition_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t010_condition">
<form name="ft010_conditionlist" id="ft010_conditionlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t010_condition">
<div id="gmp_t010_condition" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t010_condition_list->TotalRecords > 0 || $t010_condition_list->isGridEdit()) { ?>
<table id="tbl_t010_conditionlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t010_condition->RowType = ROWTYPE_HEADER;

// Render list options
$t010_condition_list->renderListOptions();

// Render list options (header, left)
$t010_condition_list->ListOptions->render("header", "left");
?>
<?php if ($t010_condition_list->Status->Visible) { // Status ?>
	<?php if ($t010_condition_list->SortUrl($t010_condition_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $t010_condition_list->Status->headerCellClass() ?>"><div id="elh_t010_condition_Status" class="t010_condition_Status"><div class="ew-table-header-caption"><?php echo $t010_condition_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $t010_condition_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t010_condition_list->SortUrl($t010_condition_list->Status) ?>', 2);"><div id="elh_t010_condition_Status" class="t010_condition_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t010_condition_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($t010_condition_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t010_condition_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t010_condition_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t010_condition_list->ExportAll && $t010_condition_list->isExport()) {
	$t010_condition_list->StopRecord = $t010_condition_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t010_condition_list->TotalRecords > $t010_condition_list->StartRecord + $t010_condition_list->DisplayRecords - 1)
		$t010_condition_list->StopRecord = $t010_condition_list->StartRecord + $t010_condition_list->DisplayRecords - 1;
	else
		$t010_condition_list->StopRecord = $t010_condition_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t010_condition->isConfirm() || $t010_condition_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t010_condition_list->FormKeyCountName) && ($t010_condition_list->isGridAdd() || $t010_condition_list->isGridEdit() || $t010_condition->isConfirm())) {
		$t010_condition_list->KeyCount = $CurrentForm->getValue($t010_condition_list->FormKeyCountName);
		$t010_condition_list->StopRecord = $t010_condition_list->StartRecord + $t010_condition_list->KeyCount - 1;
	}
}
$t010_condition_list->RecordCount = $t010_condition_list->StartRecord - 1;
if ($t010_condition_list->Recordset && !$t010_condition_list->Recordset->EOF) {
	$t010_condition_list->Recordset->moveFirst();
	$selectLimit = $t010_condition_list->UseSelectLimit;
	if (!$selectLimit && $t010_condition_list->StartRecord > 1)
		$t010_condition_list->Recordset->move($t010_condition_list->StartRecord - 1);
} elseif (!$t010_condition->AllowAddDeleteRow && $t010_condition_list->StopRecord == 0) {
	$t010_condition_list->StopRecord = $t010_condition->GridAddRowCount;
}

// Initialize aggregate
$t010_condition->RowType = ROWTYPE_AGGREGATEINIT;
$t010_condition->resetAttributes();
$t010_condition_list->renderRow();
if ($t010_condition_list->isGridAdd())
	$t010_condition_list->RowIndex = 0;
if ($t010_condition_list->isGridEdit())
	$t010_condition_list->RowIndex = 0;
while ($t010_condition_list->RecordCount < $t010_condition_list->StopRecord) {
	$t010_condition_list->RecordCount++;
	if ($t010_condition_list->RecordCount >= $t010_condition_list->StartRecord) {
		$t010_condition_list->RowCount++;
		if ($t010_condition_list->isGridAdd() || $t010_condition_list->isGridEdit() || $t010_condition->isConfirm()) {
			$t010_condition_list->RowIndex++;
			$CurrentForm->Index = $t010_condition_list->RowIndex;
			if ($CurrentForm->hasValue($t010_condition_list->FormActionName) && ($t010_condition->isConfirm() || $t010_condition_list->EventCancelled))
				$t010_condition_list->RowAction = strval($CurrentForm->getValue($t010_condition_list->FormActionName));
			elseif ($t010_condition_list->isGridAdd())
				$t010_condition_list->RowAction = "insert";
			else
				$t010_condition_list->RowAction = "";
		}

		// Set up key count
		$t010_condition_list->KeyCount = $t010_condition_list->RowIndex;

		// Init row class and style
		$t010_condition->resetAttributes();
		$t010_condition->CssClass = "";
		if ($t010_condition_list->isGridAdd()) {
			$t010_condition_list->loadRowValues(); // Load default values
		} else {
			$t010_condition_list->loadRowValues($t010_condition_list->Recordset); // Load row values
		}
		$t010_condition->RowType = ROWTYPE_VIEW; // Render view
		if ($t010_condition_list->isGridAdd()) // Grid add
			$t010_condition->RowType = ROWTYPE_ADD; // Render add
		if ($t010_condition_list->isGridAdd() && $t010_condition->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t010_condition_list->restoreCurrentRowFormValues($t010_condition_list->RowIndex); // Restore form values
		if ($t010_condition_list->isGridEdit()) { // Grid edit
			if ($t010_condition->EventCancelled)
				$t010_condition_list->restoreCurrentRowFormValues($t010_condition_list->RowIndex); // Restore form values
			if ($t010_condition_list->RowAction == "insert")
				$t010_condition->RowType = ROWTYPE_ADD; // Render add
			else
				$t010_condition->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t010_condition_list->isGridEdit() && ($t010_condition->RowType == ROWTYPE_EDIT || $t010_condition->RowType == ROWTYPE_ADD) && $t010_condition->EventCancelled) // Update failed
			$t010_condition_list->restoreCurrentRowFormValues($t010_condition_list->RowIndex); // Restore form values
		if ($t010_condition->RowType == ROWTYPE_EDIT) // Edit row
			$t010_condition_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t010_condition->RowAttrs->merge(["data-rowindex" => $t010_condition_list->RowCount, "id" => "r" . $t010_condition_list->RowCount . "_t010_condition", "data-rowtype" => $t010_condition->RowType]);

		// Render row
		$t010_condition_list->renderRow();

		// Render list options
		$t010_condition_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t010_condition_list->RowAction != "delete" && $t010_condition_list->RowAction != "insertdelete" && !($t010_condition_list->RowAction == "insert" && $t010_condition->isConfirm() && $t010_condition_list->emptyRow())) {
?>
	<tr <?php echo $t010_condition->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t010_condition_list->ListOptions->render("body", "left", $t010_condition_list->RowCount);
?>
	<?php if ($t010_condition_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $t010_condition_list->Status->cellAttributes() ?>>
<?php if ($t010_condition->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t010_condition_list->RowCount ?>_t010_condition_Status" class="form-group">
<input type="text" data-table="t010_condition" data-field="x_Status" name="x<?php echo $t010_condition_list->RowIndex ?>_Status" id="x<?php echo $t010_condition_list->RowIndex ?>_Status" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t010_condition_list->Status->getPlaceHolder()) ?>" value="<?php echo $t010_condition_list->Status->EditValue ?>"<?php echo $t010_condition_list->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="t010_condition" data-field="x_Status" name="o<?php echo $t010_condition_list->RowIndex ?>_Status" id="o<?php echo $t010_condition_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($t010_condition_list->Status->OldValue) ?>">
<?php } ?>
<?php if ($t010_condition->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t010_condition_list->RowCount ?>_t010_condition_Status" class="form-group">
<input type="text" data-table="t010_condition" data-field="x_Status" name="x<?php echo $t010_condition_list->RowIndex ?>_Status" id="x<?php echo $t010_condition_list->RowIndex ?>_Status" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t010_condition_list->Status->getPlaceHolder()) ?>" value="<?php echo $t010_condition_list->Status->EditValue ?>"<?php echo $t010_condition_list->Status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t010_condition->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t010_condition_list->RowCount ?>_t010_condition_Status">
<span<?php echo $t010_condition_list->Status->viewAttributes() ?>><?php echo $t010_condition_list->Status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t010_condition->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t010_condition" data-field="x_id" name="x<?php echo $t010_condition_list->RowIndex ?>_id" id="x<?php echo $t010_condition_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t010_condition_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t010_condition" data-field="x_id" name="o<?php echo $t010_condition_list->RowIndex ?>_id" id="o<?php echo $t010_condition_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t010_condition_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t010_condition->RowType == ROWTYPE_EDIT || $t010_condition->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t010_condition" data-field="x_id" name="x<?php echo $t010_condition_list->RowIndex ?>_id" id="x<?php echo $t010_condition_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t010_condition_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t010_condition_list->ListOptions->render("body", "right", $t010_condition_list->RowCount);
?>
	</tr>
<?php if ($t010_condition->RowType == ROWTYPE_ADD || $t010_condition->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft010_conditionlist", "load"], function() {
	ft010_conditionlist.updateLists(<?php echo $t010_condition_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t010_condition_list->isGridAdd())
		if (!$t010_condition_list->Recordset->EOF)
			$t010_condition_list->Recordset->moveNext();
}
?>
<?php
	if ($t010_condition_list->isGridAdd() || $t010_condition_list->isGridEdit()) {
		$t010_condition_list->RowIndex = '$rowindex$';
		$t010_condition_list->loadRowValues();

		// Set row properties
		$t010_condition->resetAttributes();
		$t010_condition->RowAttrs->merge(["data-rowindex" => $t010_condition_list->RowIndex, "id" => "r0_t010_condition", "data-rowtype" => ROWTYPE_ADD]);
		$t010_condition->RowAttrs->appendClass("ew-template");
		$t010_condition->RowType = ROWTYPE_ADD;

		// Render row
		$t010_condition_list->renderRow();

		// Render list options
		$t010_condition_list->renderListOptions();
		$t010_condition_list->StartRowCount = 0;
?>
	<tr <?php echo $t010_condition->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t010_condition_list->ListOptions->render("body", "left", $t010_condition_list->RowIndex);
?>
	<?php if ($t010_condition_list->Status->Visible) { // Status ?>
		<td data-name="Status">
<span id="el$rowindex$_t010_condition_Status" class="form-group t010_condition_Status">
<input type="text" data-table="t010_condition" data-field="x_Status" name="x<?php echo $t010_condition_list->RowIndex ?>_Status" id="x<?php echo $t010_condition_list->RowIndex ?>_Status" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t010_condition_list->Status->getPlaceHolder()) ?>" value="<?php echo $t010_condition_list->Status->EditValue ?>"<?php echo $t010_condition_list->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="t010_condition" data-field="x_Status" name="o<?php echo $t010_condition_list->RowIndex ?>_Status" id="o<?php echo $t010_condition_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($t010_condition_list->Status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t010_condition_list->ListOptions->render("body", "right", $t010_condition_list->RowIndex);
?>
<script>
loadjs.ready(["ft010_conditionlist", "load"], function() {
	ft010_conditionlist.updateLists(<?php echo $t010_condition_list->RowIndex ?>);
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
<?php if ($t010_condition_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t010_condition_list->FormKeyCountName ?>" id="<?php echo $t010_condition_list->FormKeyCountName ?>" value="<?php echo $t010_condition_list->KeyCount ?>">
<?php echo $t010_condition_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t010_condition_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t010_condition_list->FormKeyCountName ?>" id="<?php echo $t010_condition_list->FormKeyCountName ?>" value="<?php echo $t010_condition_list->KeyCount ?>">
<?php echo $t010_condition_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t010_condition->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t010_condition_list->Recordset)
	$t010_condition_list->Recordset->Close();
?>
<?php if (!$t010_condition_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t010_condition_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t010_condition_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t010_condition_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t010_condition_list->TotalRecords == 0 && !$t010_condition->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t010_condition_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t010_condition_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t010_condition_list->isExport()) { ?>
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
$t010_condition_list->terminate();
?>