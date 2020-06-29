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
$t008_brand_list = new t008_brand_list();

// Run the page
$t008_brand_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t008_brand_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t008_brand_list->isExport()) { ?>
<script>
var ft008_brandlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft008_brandlist = currentForm = new ew.Form("ft008_brandlist", "list");
	ft008_brandlist.formKeyCountName = '<?php echo $t008_brand_list->FormKeyCountName ?>';

	// Validate form
	ft008_brandlist.validate = function() {
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
			<?php if ($t008_brand_list->Brand->Required) { ?>
				elm = this.getElements("x" + infix + "_Brand");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t008_brand_list->Brand->caption(), $t008_brand_list->Brand->RequiredErrorMessage)) ?>");
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
	ft008_brandlist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "Brand", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft008_brandlist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft008_brandlist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	loadjs.done("ft008_brandlist");
});
var ft008_brandlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft008_brandlistsrch = currentSearchForm = new ew.Form("ft008_brandlistsrch");

	// Dynamic selection lists
	// Filters

	ft008_brandlistsrch.filterList = <?php echo $t008_brand_list->getFilterList() ?>;
	loadjs.done("ft008_brandlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t008_brand_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t008_brand_list->TotalRecords > 0 && $t008_brand_list->ExportOptions->visible()) { ?>
<?php $t008_brand_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t008_brand_list->ImportOptions->visible()) { ?>
<?php $t008_brand_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t008_brand_list->SearchOptions->visible()) { ?>
<?php $t008_brand_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t008_brand_list->FilterOptions->visible()) { ?>
<?php $t008_brand_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t008_brand_list->renderOtherOptions();
?>
<?php $t008_brand_list->showPageHeader(); ?>
<?php
$t008_brand_list->showMessage();
?>
<?php if ($t008_brand_list->TotalRecords > 0 || $t008_brand->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t008_brand_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t008_brand">
<form name="ft008_brandlist" id="ft008_brandlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t008_brand">
<div id="gmp_t008_brand" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t008_brand_list->TotalRecords > 0 || $t008_brand_list->isGridEdit()) { ?>
<table id="tbl_t008_brandlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t008_brand->RowType = ROWTYPE_HEADER;

// Render list options
$t008_brand_list->renderListOptions();

// Render list options (header, left)
$t008_brand_list->ListOptions->render("header", "left");
?>
<?php if ($t008_brand_list->Brand->Visible) { // Brand ?>
	<?php if ($t008_brand_list->SortUrl($t008_brand_list->Brand) == "") { ?>
		<th data-name="Brand" class="<?php echo $t008_brand_list->Brand->headerCellClass() ?>"><div id="elh_t008_brand_Brand" class="t008_brand_Brand"><div class="ew-table-header-caption"><?php echo $t008_brand_list->Brand->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Brand" class="<?php echo $t008_brand_list->Brand->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t008_brand_list->SortUrl($t008_brand_list->Brand) ?>', 2);"><div id="elh_t008_brand_Brand" class="t008_brand_Brand">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t008_brand_list->Brand->caption() ?></span><span class="ew-table-header-sort"><?php if ($t008_brand_list->Brand->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t008_brand_list->Brand->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t008_brand_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t008_brand_list->ExportAll && $t008_brand_list->isExport()) {
	$t008_brand_list->StopRecord = $t008_brand_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t008_brand_list->TotalRecords > $t008_brand_list->StartRecord + $t008_brand_list->DisplayRecords - 1)
		$t008_brand_list->StopRecord = $t008_brand_list->StartRecord + $t008_brand_list->DisplayRecords - 1;
	else
		$t008_brand_list->StopRecord = $t008_brand_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t008_brand->isConfirm() || $t008_brand_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t008_brand_list->FormKeyCountName) && ($t008_brand_list->isGridAdd() || $t008_brand_list->isGridEdit() || $t008_brand->isConfirm())) {
		$t008_brand_list->KeyCount = $CurrentForm->getValue($t008_brand_list->FormKeyCountName);
		$t008_brand_list->StopRecord = $t008_brand_list->StartRecord + $t008_brand_list->KeyCount - 1;
	}
}
$t008_brand_list->RecordCount = $t008_brand_list->StartRecord - 1;
if ($t008_brand_list->Recordset && !$t008_brand_list->Recordset->EOF) {
	$t008_brand_list->Recordset->moveFirst();
	$selectLimit = $t008_brand_list->UseSelectLimit;
	if (!$selectLimit && $t008_brand_list->StartRecord > 1)
		$t008_brand_list->Recordset->move($t008_brand_list->StartRecord - 1);
} elseif (!$t008_brand->AllowAddDeleteRow && $t008_brand_list->StopRecord == 0) {
	$t008_brand_list->StopRecord = $t008_brand->GridAddRowCount;
}

// Initialize aggregate
$t008_brand->RowType = ROWTYPE_AGGREGATEINIT;
$t008_brand->resetAttributes();
$t008_brand_list->renderRow();
if ($t008_brand_list->isGridAdd())
	$t008_brand_list->RowIndex = 0;
if ($t008_brand_list->isGridEdit())
	$t008_brand_list->RowIndex = 0;
while ($t008_brand_list->RecordCount < $t008_brand_list->StopRecord) {
	$t008_brand_list->RecordCount++;
	if ($t008_brand_list->RecordCount >= $t008_brand_list->StartRecord) {
		$t008_brand_list->RowCount++;
		if ($t008_brand_list->isGridAdd() || $t008_brand_list->isGridEdit() || $t008_brand->isConfirm()) {
			$t008_brand_list->RowIndex++;
			$CurrentForm->Index = $t008_brand_list->RowIndex;
			if ($CurrentForm->hasValue($t008_brand_list->FormActionName) && ($t008_brand->isConfirm() || $t008_brand_list->EventCancelled))
				$t008_brand_list->RowAction = strval($CurrentForm->getValue($t008_brand_list->FormActionName));
			elseif ($t008_brand_list->isGridAdd())
				$t008_brand_list->RowAction = "insert";
			else
				$t008_brand_list->RowAction = "";
		}

		// Set up key count
		$t008_brand_list->KeyCount = $t008_brand_list->RowIndex;

		// Init row class and style
		$t008_brand->resetAttributes();
		$t008_brand->CssClass = "";
		if ($t008_brand_list->isGridAdd()) {
			$t008_brand_list->loadRowValues(); // Load default values
		} else {
			$t008_brand_list->loadRowValues($t008_brand_list->Recordset); // Load row values
		}
		$t008_brand->RowType = ROWTYPE_VIEW; // Render view
		if ($t008_brand_list->isGridAdd()) // Grid add
			$t008_brand->RowType = ROWTYPE_ADD; // Render add
		if ($t008_brand_list->isGridAdd() && $t008_brand->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t008_brand_list->restoreCurrentRowFormValues($t008_brand_list->RowIndex); // Restore form values
		if ($t008_brand_list->isGridEdit()) { // Grid edit
			if ($t008_brand->EventCancelled)
				$t008_brand_list->restoreCurrentRowFormValues($t008_brand_list->RowIndex); // Restore form values
			if ($t008_brand_list->RowAction == "insert")
				$t008_brand->RowType = ROWTYPE_ADD; // Render add
			else
				$t008_brand->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t008_brand_list->isGridEdit() && ($t008_brand->RowType == ROWTYPE_EDIT || $t008_brand->RowType == ROWTYPE_ADD) && $t008_brand->EventCancelled) // Update failed
			$t008_brand_list->restoreCurrentRowFormValues($t008_brand_list->RowIndex); // Restore form values
		if ($t008_brand->RowType == ROWTYPE_EDIT) // Edit row
			$t008_brand_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t008_brand->RowAttrs->merge(["data-rowindex" => $t008_brand_list->RowCount, "id" => "r" . $t008_brand_list->RowCount . "_t008_brand", "data-rowtype" => $t008_brand->RowType]);

		// Render row
		$t008_brand_list->renderRow();

		// Render list options
		$t008_brand_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t008_brand_list->RowAction != "delete" && $t008_brand_list->RowAction != "insertdelete" && !($t008_brand_list->RowAction == "insert" && $t008_brand->isConfirm() && $t008_brand_list->emptyRow())) {
?>
	<tr <?php echo $t008_brand->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t008_brand_list->ListOptions->render("body", "left", $t008_brand_list->RowCount);
?>
	<?php if ($t008_brand_list->Brand->Visible) { // Brand ?>
		<td data-name="Brand" <?php echo $t008_brand_list->Brand->cellAttributes() ?>>
<?php if ($t008_brand->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t008_brand_list->RowCount ?>_t008_brand_Brand" class="form-group">
<input type="text" data-table="t008_brand" data-field="x_Brand" name="x<?php echo $t008_brand_list->RowIndex ?>_Brand" id="x<?php echo $t008_brand_list->RowIndex ?>_Brand" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t008_brand_list->Brand->getPlaceHolder()) ?>" value="<?php echo $t008_brand_list->Brand->EditValue ?>"<?php echo $t008_brand_list->Brand->editAttributes() ?>>
</span>
<input type="hidden" data-table="t008_brand" data-field="x_Brand" name="o<?php echo $t008_brand_list->RowIndex ?>_Brand" id="o<?php echo $t008_brand_list->RowIndex ?>_Brand" value="<?php echo HtmlEncode($t008_brand_list->Brand->OldValue) ?>">
<?php } ?>
<?php if ($t008_brand->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t008_brand_list->RowCount ?>_t008_brand_Brand" class="form-group">
<input type="text" data-table="t008_brand" data-field="x_Brand" name="x<?php echo $t008_brand_list->RowIndex ?>_Brand" id="x<?php echo $t008_brand_list->RowIndex ?>_Brand" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t008_brand_list->Brand->getPlaceHolder()) ?>" value="<?php echo $t008_brand_list->Brand->EditValue ?>"<?php echo $t008_brand_list->Brand->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t008_brand->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t008_brand_list->RowCount ?>_t008_brand_Brand">
<span<?php echo $t008_brand_list->Brand->viewAttributes() ?>><?php echo $t008_brand_list->Brand->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t008_brand->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t008_brand" data-field="x_id" name="x<?php echo $t008_brand_list->RowIndex ?>_id" id="x<?php echo $t008_brand_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t008_brand_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t008_brand" data-field="x_id" name="o<?php echo $t008_brand_list->RowIndex ?>_id" id="o<?php echo $t008_brand_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t008_brand_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t008_brand->RowType == ROWTYPE_EDIT || $t008_brand->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t008_brand" data-field="x_id" name="x<?php echo $t008_brand_list->RowIndex ?>_id" id="x<?php echo $t008_brand_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t008_brand_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t008_brand_list->ListOptions->render("body", "right", $t008_brand_list->RowCount);
?>
	</tr>
<?php if ($t008_brand->RowType == ROWTYPE_ADD || $t008_brand->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft008_brandlist", "load"], function() {
	ft008_brandlist.updateLists(<?php echo $t008_brand_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t008_brand_list->isGridAdd())
		if (!$t008_brand_list->Recordset->EOF)
			$t008_brand_list->Recordset->moveNext();
}
?>
<?php
	if ($t008_brand_list->isGridAdd() || $t008_brand_list->isGridEdit()) {
		$t008_brand_list->RowIndex = '$rowindex$';
		$t008_brand_list->loadRowValues();

		// Set row properties
		$t008_brand->resetAttributes();
		$t008_brand->RowAttrs->merge(["data-rowindex" => $t008_brand_list->RowIndex, "id" => "r0_t008_brand", "data-rowtype" => ROWTYPE_ADD]);
		$t008_brand->RowAttrs->appendClass("ew-template");
		$t008_brand->RowType = ROWTYPE_ADD;

		// Render row
		$t008_brand_list->renderRow();

		// Render list options
		$t008_brand_list->renderListOptions();
		$t008_brand_list->StartRowCount = 0;
?>
	<tr <?php echo $t008_brand->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t008_brand_list->ListOptions->render("body", "left", $t008_brand_list->RowIndex);
?>
	<?php if ($t008_brand_list->Brand->Visible) { // Brand ?>
		<td data-name="Brand">
<span id="el$rowindex$_t008_brand_Brand" class="form-group t008_brand_Brand">
<input type="text" data-table="t008_brand" data-field="x_Brand" name="x<?php echo $t008_brand_list->RowIndex ?>_Brand" id="x<?php echo $t008_brand_list->RowIndex ?>_Brand" size="30" maxlength="100" placeholder="<?php echo HtmlEncode($t008_brand_list->Brand->getPlaceHolder()) ?>" value="<?php echo $t008_brand_list->Brand->EditValue ?>"<?php echo $t008_brand_list->Brand->editAttributes() ?>>
</span>
<input type="hidden" data-table="t008_brand" data-field="x_Brand" name="o<?php echo $t008_brand_list->RowIndex ?>_Brand" id="o<?php echo $t008_brand_list->RowIndex ?>_Brand" value="<?php echo HtmlEncode($t008_brand_list->Brand->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t008_brand_list->ListOptions->render("body", "right", $t008_brand_list->RowIndex);
?>
<script>
loadjs.ready(["ft008_brandlist", "load"], function() {
	ft008_brandlist.updateLists(<?php echo $t008_brand_list->RowIndex ?>);
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
<?php if ($t008_brand_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t008_brand_list->FormKeyCountName ?>" id="<?php echo $t008_brand_list->FormKeyCountName ?>" value="<?php echo $t008_brand_list->KeyCount ?>">
<?php echo $t008_brand_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t008_brand_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t008_brand_list->FormKeyCountName ?>" id="<?php echo $t008_brand_list->FormKeyCountName ?>" value="<?php echo $t008_brand_list->KeyCount ?>">
<?php echo $t008_brand_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t008_brand->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t008_brand_list->Recordset)
	$t008_brand_list->Recordset->Close();
?>
<?php if (!$t008_brand_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t008_brand_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t008_brand_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t008_brand_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t008_brand_list->TotalRecords == 0 && !$t008_brand->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t008_brand_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t008_brand_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t008_brand_list->isExport()) { ?>
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
$t008_brand_list->terminate();
?>