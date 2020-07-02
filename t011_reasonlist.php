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
$t011_reason_list = new t011_reason_list();

// Run the page
$t011_reason_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t011_reason_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t011_reason_list->isExport()) { ?>
<script>
var ft011_reasonlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft011_reasonlist = currentForm = new ew.Form("ft011_reasonlist", "list");
	ft011_reasonlist.formKeyCountName = '<?php echo $t011_reason_list->FormKeyCountName ?>';

	// Validate form
	ft011_reasonlist.validate = function() {
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
			<?php if ($t011_reason_list->Status->Required) { ?>
				elm = this.getElements("x" + infix + "_Status");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t011_reason_list->Status->caption(), $t011_reason_list->Status->RequiredErrorMessage)) ?>");
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
	ft011_reasonlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Status", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft011_reasonlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft011_reasonlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft011_reasonlist");
});
var ft011_reasonlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft011_reasonlistsrch = currentSearchForm = new ew.Form("ft011_reasonlistsrch");

	// Dynamic selection lists
	// Filters

	ft011_reasonlistsrch.filterList = <?php echo $t011_reason_list->getFilterList() ?>;
	loadjs.done("ft011_reasonlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t011_reason_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t011_reason_list->TotalRecords > 0 && $t011_reason_list->ExportOptions->visible()) { ?>
<?php $t011_reason_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t011_reason_list->ImportOptions->visible()) { ?>
<?php $t011_reason_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t011_reason_list->SearchOptions->visible()) { ?>
<?php $t011_reason_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t011_reason_list->FilterOptions->visible()) { ?>
<?php $t011_reason_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t011_reason_list->renderOtherOptions();
?>
<?php $t011_reason_list->showPageHeader(); ?>
<?php
$t011_reason_list->showMessage();
?>
<?php if ($t011_reason_list->TotalRecords > 0 || $t011_reason->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t011_reason_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t011_reason">
<form name="ft011_reasonlist" id="ft011_reasonlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t011_reason">
<div id="gmp_t011_reason" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t011_reason_list->TotalRecords > 0 || $t011_reason_list->isGridEdit()) { ?>
<table id="tbl_t011_reasonlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t011_reason->RowType = ROWTYPE_HEADER;

// Render list options
$t011_reason_list->renderListOptions();

// Render list options (header, left)
$t011_reason_list->ListOptions->render("header", "left");
?>
<?php if ($t011_reason_list->Status->Visible) { // Status ?>
	<?php if ($t011_reason_list->SortUrl($t011_reason_list->Status) == "") { ?>
		<th data-name="Status" class="<?php echo $t011_reason_list->Status->headerCellClass() ?>"><div id="elh_t011_reason_Status" class="t011_reason_Status"><div class="ew-table-header-caption"><?php echo $t011_reason_list->Status->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Status" class="<?php echo $t011_reason_list->Status->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t011_reason_list->SortUrl($t011_reason_list->Status) ?>', 2);"><div id="elh_t011_reason_Status" class="t011_reason_Status">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t011_reason_list->Status->caption() ?></span><span class="ew-table-header-sort"><?php if ($t011_reason_list->Status->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t011_reason_list->Status->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t011_reason_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t011_reason_list->ExportAll && $t011_reason_list->isExport()) {
	$t011_reason_list->StopRecord = $t011_reason_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t011_reason_list->TotalRecords > $t011_reason_list->StartRecord + $t011_reason_list->DisplayRecords - 1)
		$t011_reason_list->StopRecord = $t011_reason_list->StartRecord + $t011_reason_list->DisplayRecords - 1;
	else
		$t011_reason_list->StopRecord = $t011_reason_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t011_reason->isConfirm() || $t011_reason_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t011_reason_list->FormKeyCountName) && ($t011_reason_list->isGridAdd() || $t011_reason_list->isGridEdit() || $t011_reason->isConfirm())) {
		$t011_reason_list->KeyCount = $CurrentForm->getValue($t011_reason_list->FormKeyCountName);
		$t011_reason_list->StopRecord = $t011_reason_list->StartRecord + $t011_reason_list->KeyCount - 1;
	}
}
$t011_reason_list->RecordCount = $t011_reason_list->StartRecord - 1;
if ($t011_reason_list->Recordset && !$t011_reason_list->Recordset->EOF) {
	$t011_reason_list->Recordset->moveFirst();
	$selectLimit = $t011_reason_list->UseSelectLimit;
	if (!$selectLimit && $t011_reason_list->StartRecord > 1)
		$t011_reason_list->Recordset->move($t011_reason_list->StartRecord - 1);
} elseif (!$t011_reason->AllowAddDeleteRow && $t011_reason_list->StopRecord == 0) {
	$t011_reason_list->StopRecord = $t011_reason->GridAddRowCount;
}

// Initialize aggregate
$t011_reason->RowType = ROWTYPE_AGGREGATEINIT;
$t011_reason->resetAttributes();
$t011_reason_list->renderRow();
if ($t011_reason_list->isGridAdd())
	$t011_reason_list->RowIndex = 0;
if ($t011_reason_list->isGridEdit())
	$t011_reason_list->RowIndex = 0;
while ($t011_reason_list->RecordCount < $t011_reason_list->StopRecord) {
	$t011_reason_list->RecordCount++;
	if ($t011_reason_list->RecordCount >= $t011_reason_list->StartRecord) {
		$t011_reason_list->RowCount++;
		if ($t011_reason_list->isGridAdd() || $t011_reason_list->isGridEdit() || $t011_reason->isConfirm()) {
			$t011_reason_list->RowIndex++;
			$CurrentForm->Index = $t011_reason_list->RowIndex;
			if ($CurrentForm->hasValue($t011_reason_list->FormActionName) && ($t011_reason->isConfirm() || $t011_reason_list->EventCancelled))
				$t011_reason_list->RowAction = strval($CurrentForm->getValue($t011_reason_list->FormActionName));
			elseif ($t011_reason_list->isGridAdd())
				$t011_reason_list->RowAction = "insert";
			else
				$t011_reason_list->RowAction = "";
		}

		// Set up key count
		$t011_reason_list->KeyCount = $t011_reason_list->RowIndex;

		// Init row class and style
		$t011_reason->resetAttributes();
		$t011_reason->CssClass = "";
		if ($t011_reason_list->isGridAdd()) {
			$t011_reason_list->loadRowValues(); // Load default values
		} else {
			$t011_reason_list->loadRowValues($t011_reason_list->Recordset); // Load row values
		}
		$t011_reason->RowType = ROWTYPE_VIEW; // Render view
		if ($t011_reason_list->isGridAdd()) // Grid add
			$t011_reason->RowType = ROWTYPE_ADD; // Render add
		if ($t011_reason_list->isGridAdd() && $t011_reason->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t011_reason_list->restoreCurrentRowFormValues($t011_reason_list->RowIndex); // Restore form values
		if ($t011_reason_list->isGridEdit()) { // Grid edit
			if ($t011_reason->EventCancelled)
				$t011_reason_list->restoreCurrentRowFormValues($t011_reason_list->RowIndex); // Restore form values
			if ($t011_reason_list->RowAction == "insert")
				$t011_reason->RowType = ROWTYPE_ADD; // Render add
			else
				$t011_reason->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t011_reason_list->isGridEdit() && ($t011_reason->RowType == ROWTYPE_EDIT || $t011_reason->RowType == ROWTYPE_ADD) && $t011_reason->EventCancelled) // Update failed
			$t011_reason_list->restoreCurrentRowFormValues($t011_reason_list->RowIndex); // Restore form values
		if ($t011_reason->RowType == ROWTYPE_EDIT) // Edit row
			$t011_reason_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t011_reason->RowAttrs->merge(["data-rowindex" => $t011_reason_list->RowCount, "id" => "r" . $t011_reason_list->RowCount . "_t011_reason", "data-rowtype" => $t011_reason->RowType]);

		// Render row
		$t011_reason_list->renderRow();

		// Render list options
		$t011_reason_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t011_reason_list->RowAction != "delete" && $t011_reason_list->RowAction != "insertdelete" && !($t011_reason_list->RowAction == "insert" && $t011_reason->isConfirm() && $t011_reason_list->emptyRow())) {
?>
	<tr <?php echo $t011_reason->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t011_reason_list->ListOptions->render("body", "left", $t011_reason_list->RowCount);
?>
	<?php if ($t011_reason_list->Status->Visible) { // Status ?>
		<td data-name="Status" <?php echo $t011_reason_list->Status->cellAttributes() ?>>
<?php if ($t011_reason->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t011_reason_list->RowCount ?>_t011_reason_Status" class="form-group">
<input type="text" data-table="t011_reason" data-field="x_Status" name="x<?php echo $t011_reason_list->RowIndex ?>_Status" id="x<?php echo $t011_reason_list->RowIndex ?>_Status" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t011_reason_list->Status->getPlaceHolder()) ?>" value="<?php echo $t011_reason_list->Status->EditValue ?>"<?php echo $t011_reason_list->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="t011_reason" data-field="x_Status" name="o<?php echo $t011_reason_list->RowIndex ?>_Status" id="o<?php echo $t011_reason_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($t011_reason_list->Status->OldValue) ?>">
<?php } ?>
<?php if ($t011_reason->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t011_reason_list->RowCount ?>_t011_reason_Status" class="form-group">
<input type="text" data-table="t011_reason" data-field="x_Status" name="x<?php echo $t011_reason_list->RowIndex ?>_Status" id="x<?php echo $t011_reason_list->RowIndex ?>_Status" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t011_reason_list->Status->getPlaceHolder()) ?>" value="<?php echo $t011_reason_list->Status->EditValue ?>"<?php echo $t011_reason_list->Status->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t011_reason->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t011_reason_list->RowCount ?>_t011_reason_Status">
<span<?php echo $t011_reason_list->Status->viewAttributes() ?>><?php echo $t011_reason_list->Status->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t011_reason->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t011_reason" data-field="x_id" name="x<?php echo $t011_reason_list->RowIndex ?>_id" id="x<?php echo $t011_reason_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t011_reason_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t011_reason" data-field="x_id" name="o<?php echo $t011_reason_list->RowIndex ?>_id" id="o<?php echo $t011_reason_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t011_reason_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t011_reason->RowType == ROWTYPE_EDIT || $t011_reason->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t011_reason" data-field="x_id" name="x<?php echo $t011_reason_list->RowIndex ?>_id" id="x<?php echo $t011_reason_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t011_reason_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t011_reason_list->ListOptions->render("body", "right", $t011_reason_list->RowCount);
?>
	</tr>
<?php if ($t011_reason->RowType == ROWTYPE_ADD || $t011_reason->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft011_reasonlist", "load"], function() {
	ft011_reasonlist.updateLists(<?php echo $t011_reason_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t011_reason_list->isGridAdd())
		if (!$t011_reason_list->Recordset->EOF)
			$t011_reason_list->Recordset->moveNext();
}
?>
<?php
	if ($t011_reason_list->isGridAdd() || $t011_reason_list->isGridEdit()) {
		$t011_reason_list->RowIndex = '$rowindex$';
		$t011_reason_list->loadRowValues();

		// Set row properties
		$t011_reason->resetAttributes();
		$t011_reason->RowAttrs->merge(["data-rowindex" => $t011_reason_list->RowIndex, "id" => "r0_t011_reason", "data-rowtype" => ROWTYPE_ADD]);
		$t011_reason->RowAttrs->appendClass("ew-template");
		$t011_reason->RowType = ROWTYPE_ADD;

		// Render row
		$t011_reason_list->renderRow();

		// Render list options
		$t011_reason_list->renderListOptions();
		$t011_reason_list->StartRowCount = 0;
?>
	<tr <?php echo $t011_reason->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t011_reason_list->ListOptions->render("body", "left", $t011_reason_list->RowIndex);
?>
	<?php if ($t011_reason_list->Status->Visible) { // Status ?>
		<td data-name="Status">
<span id="el$rowindex$_t011_reason_Status" class="form-group t011_reason_Status">
<input type="text" data-table="t011_reason" data-field="x_Status" name="x<?php echo $t011_reason_list->RowIndex ?>_Status" id="x<?php echo $t011_reason_list->RowIndex ?>_Status" size="10" maxlength="50" placeholder="<?php echo HtmlEncode($t011_reason_list->Status->getPlaceHolder()) ?>" value="<?php echo $t011_reason_list->Status->EditValue ?>"<?php echo $t011_reason_list->Status->editAttributes() ?>>
</span>
<input type="hidden" data-table="t011_reason" data-field="x_Status" name="o<?php echo $t011_reason_list->RowIndex ?>_Status" id="o<?php echo $t011_reason_list->RowIndex ?>_Status" value="<?php echo HtmlEncode($t011_reason_list->Status->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t011_reason_list->ListOptions->render("body", "right", $t011_reason_list->RowIndex);
?>
<script>
loadjs.ready(["ft011_reasonlist", "load"], function() {
	ft011_reasonlist.updateLists(<?php echo $t011_reason_list->RowIndex ?>);
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
<?php if ($t011_reason_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t011_reason_list->FormKeyCountName ?>" id="<?php echo $t011_reason_list->FormKeyCountName ?>" value="<?php echo $t011_reason_list->KeyCount ?>">
<?php echo $t011_reason_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t011_reason_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t011_reason_list->FormKeyCountName ?>" id="<?php echo $t011_reason_list->FormKeyCountName ?>" value="<?php echo $t011_reason_list->KeyCount ?>">
<?php echo $t011_reason_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t011_reason->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t011_reason_list->Recordset)
	$t011_reason_list->Recordset->Close();
?>
<?php if (!$t011_reason_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t011_reason_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t011_reason_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t011_reason_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t011_reason_list->TotalRecords == 0 && !$t011_reason->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t011_reason_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t011_reason_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t011_reason_list->isExport()) { ?>
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
$t011_reason_list->terminate();
?>