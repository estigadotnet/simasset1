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
$t102_ho_detail_list = new t102_ho_detail_list();

// Run the page
$t102_ho_detail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t102_ho_detail_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t102_ho_detail_list->isExport()) { ?>
<script>
var ft102_ho_detaillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft102_ho_detaillist = currentForm = new ew.Form("ft102_ho_detaillist", "list");
	ft102_ho_detaillist.formKeyCountName = '<?php echo $t102_ho_detail_list->FormKeyCountName ?>';

	// Validate form
	ft102_ho_detaillist.validate = function() {
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
			<?php if ($t102_ho_detail_list->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t102_ho_detail_list->asset_id->caption(), $t102_ho_detail_list->asset_id->RequiredErrorMessage)) ?>");
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
	ft102_ho_detaillist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "asset_id", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft102_ho_detaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft102_ho_detaillist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft102_ho_detaillist.lists["x_asset_id"] = <?php echo $t102_ho_detail_list->asset_id->Lookup->toClientList($t102_ho_detail_list) ?>;
	ft102_ho_detaillist.lists["x_asset_id"].options = <?php echo JsonEncode($t102_ho_detail_list->asset_id->lookupOptions()) ?>;
	loadjs.done("ft102_ho_detaillist");
});
var ft102_ho_detaillistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft102_ho_detaillistsrch = currentSearchForm = new ew.Form("ft102_ho_detaillistsrch");

	// Dynamic selection lists
	// Filters

	ft102_ho_detaillistsrch.filterList = <?php echo $t102_ho_detail_list->getFilterList() ?>;
	loadjs.done("ft102_ho_detaillistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t102_ho_detail_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t102_ho_detail_list->TotalRecords > 0 && $t102_ho_detail_list->ExportOptions->visible()) { ?>
<?php $t102_ho_detail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_ho_detail_list->ImportOptions->visible()) { ?>
<?php $t102_ho_detail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t102_ho_detail_list->SearchOptions->visible()) { ?>
<?php $t102_ho_detail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t102_ho_detail_list->FilterOptions->visible()) { ?>
<?php $t102_ho_detail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t102_ho_detail_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t102_ho_detail_list->isExport("print")) { ?>
<?php
if ($t102_ho_detail_list->DbMasterFilter != "" && $t102_ho_detail->getCurrentMasterTable() == "t101_ho_head") {
	if ($t102_ho_detail_list->MasterRecordExists) {
		include_once "t101_ho_headmaster.php";
	}
}
?>
<?php } ?>
<?php
$t102_ho_detail_list->renderOtherOptions();
?>
<?php $t102_ho_detail_list->showPageHeader(); ?>
<?php
$t102_ho_detail_list->showMessage();
?>
<?php if ($t102_ho_detail_list->TotalRecords > 0 || $t102_ho_detail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t102_ho_detail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t102_ho_detail">
<form name="ft102_ho_detaillist" id="ft102_ho_detaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t102_ho_detail">
<?php if ($t102_ho_detail->getCurrentMasterTable() == "t101_ho_head" && $t102_ho_detail->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t101_ho_head">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t102_ho_detail_list->hohead_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_t102_ho_detail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t102_ho_detail_list->TotalRecords > 0 || $t102_ho_detail_list->isAdd() || $t102_ho_detail_list->isCopy() || $t102_ho_detail_list->isGridEdit()) { ?>
<table id="tbl_t102_ho_detaillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t102_ho_detail->RowType = ROWTYPE_HEADER;

// Render list options
$t102_ho_detail_list->renderListOptions();

// Render list options (header, left)
$t102_ho_detail_list->ListOptions->render("header", "left");
?>
<?php if ($t102_ho_detail_list->asset_id->Visible) { // asset_id ?>
	<?php if ($t102_ho_detail_list->SortUrl($t102_ho_detail_list->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t102_ho_detail_list->asset_id->headerCellClass() ?>"><div id="elh_t102_ho_detail_asset_id" class="t102_ho_detail_asset_id"><div class="ew-table-header-caption"><?php echo $t102_ho_detail_list->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t102_ho_detail_list->asset_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t102_ho_detail_list->SortUrl($t102_ho_detail_list->asset_id) ?>', 2);"><div id="elh_t102_ho_detail_asset_id" class="t102_ho_detail_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t102_ho_detail_list->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t102_ho_detail_list->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t102_ho_detail_list->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t102_ho_detail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t102_ho_detail_list->isAdd() || $t102_ho_detail_list->isCopy()) {
		$t102_ho_detail_list->RowIndex = 0;
		$t102_ho_detail_list->KeyCount = $t102_ho_detail_list->RowIndex;
		if ($t102_ho_detail_list->isCopy() && !$t102_ho_detail_list->loadRow())
			$t102_ho_detail->CurrentAction = "add";
		if ($t102_ho_detail_list->isAdd())
			$t102_ho_detail_list->loadRowValues();
		if ($t102_ho_detail->EventCancelled) // Insert failed
			$t102_ho_detail_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t102_ho_detail->resetAttributes();
		$t102_ho_detail->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t102_ho_detail", "data-rowtype" => ROWTYPE_ADD]);
		$t102_ho_detail->RowType = ROWTYPE_ADD;

		// Render row
		$t102_ho_detail_list->renderRow();

		// Render list options
		$t102_ho_detail_list->renderListOptions();
		$t102_ho_detail_list->StartRowCount = 0;
?>
	<tr <?php echo $t102_ho_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_ho_detail_list->ListOptions->render("body", "left", $t102_ho_detail_list->RowCount);
?>
	<?php if ($t102_ho_detail_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<span id="el<?php echo $t102_ho_detail_list->RowCount ?>_t102_ho_detail_asset_id" class="form-group t102_ho_detail_asset_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t102_ho_detail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_ho_detail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_ho_detail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_ho_detail_list->asset_id->ReadOnly || $t102_ho_detail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_ho_detail_list->asset_id->Lookup->getParamTag($t102_ho_detail_list, "p_x" . $t102_ho_detail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_ho_detail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" value="<?php echo $t102_ho_detail_list->asset_id->CurrentValue ?>"<?php echo $t102_ho_detail_list->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="o<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" id="o<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_list->asset_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_ho_detail_list->ListOptions->render("body", "right", $t102_ho_detail_list->RowCount);
?>
<script>
loadjs.ready(["ft102_ho_detaillist", "load"], function() {
	ft102_ho_detaillist.updateLists(<?php echo $t102_ho_detail_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t102_ho_detail_list->ExportAll && $t102_ho_detail_list->isExport()) {
	$t102_ho_detail_list->StopRecord = $t102_ho_detail_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t102_ho_detail_list->TotalRecords > $t102_ho_detail_list->StartRecord + $t102_ho_detail_list->DisplayRecords - 1)
		$t102_ho_detail_list->StopRecord = $t102_ho_detail_list->StartRecord + $t102_ho_detail_list->DisplayRecords - 1;
	else
		$t102_ho_detail_list->StopRecord = $t102_ho_detail_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t102_ho_detail->isConfirm() || $t102_ho_detail_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t102_ho_detail_list->FormKeyCountName) && ($t102_ho_detail_list->isGridAdd() || $t102_ho_detail_list->isGridEdit() || $t102_ho_detail->isConfirm())) {
		$t102_ho_detail_list->KeyCount = $CurrentForm->getValue($t102_ho_detail_list->FormKeyCountName);
		$t102_ho_detail_list->StopRecord = $t102_ho_detail_list->StartRecord + $t102_ho_detail_list->KeyCount - 1;
	}
}
$t102_ho_detail_list->RecordCount = $t102_ho_detail_list->StartRecord - 1;
if ($t102_ho_detail_list->Recordset && !$t102_ho_detail_list->Recordset->EOF) {
	$t102_ho_detail_list->Recordset->moveFirst();
	$selectLimit = $t102_ho_detail_list->UseSelectLimit;
	if (!$selectLimit && $t102_ho_detail_list->StartRecord > 1)
		$t102_ho_detail_list->Recordset->move($t102_ho_detail_list->StartRecord - 1);
} elseif (!$t102_ho_detail->AllowAddDeleteRow && $t102_ho_detail_list->StopRecord == 0) {
	$t102_ho_detail_list->StopRecord = $t102_ho_detail->GridAddRowCount;
}

// Initialize aggregate
$t102_ho_detail->RowType = ROWTYPE_AGGREGATEINIT;
$t102_ho_detail->resetAttributes();
$t102_ho_detail_list->renderRow();
$t102_ho_detail_list->EditRowCount = 0;
if ($t102_ho_detail_list->isEdit())
	$t102_ho_detail_list->RowIndex = 1;
if ($t102_ho_detail_list->isGridAdd())
	$t102_ho_detail_list->RowIndex = 0;
if ($t102_ho_detail_list->isGridEdit())
	$t102_ho_detail_list->RowIndex = 0;
while ($t102_ho_detail_list->RecordCount < $t102_ho_detail_list->StopRecord) {
	$t102_ho_detail_list->RecordCount++;
	if ($t102_ho_detail_list->RecordCount >= $t102_ho_detail_list->StartRecord) {
		$t102_ho_detail_list->RowCount++;
		if ($t102_ho_detail_list->isGridAdd() || $t102_ho_detail_list->isGridEdit() || $t102_ho_detail->isConfirm()) {
			$t102_ho_detail_list->RowIndex++;
			$CurrentForm->Index = $t102_ho_detail_list->RowIndex;
			if ($CurrentForm->hasValue($t102_ho_detail_list->FormActionName) && ($t102_ho_detail->isConfirm() || $t102_ho_detail_list->EventCancelled))
				$t102_ho_detail_list->RowAction = strval($CurrentForm->getValue($t102_ho_detail_list->FormActionName));
			elseif ($t102_ho_detail_list->isGridAdd())
				$t102_ho_detail_list->RowAction = "insert";
			else
				$t102_ho_detail_list->RowAction = "";
		}

		// Set up key count
		$t102_ho_detail_list->KeyCount = $t102_ho_detail_list->RowIndex;

		// Init row class and style
		$t102_ho_detail->resetAttributes();
		$t102_ho_detail->CssClass = "";
		if ($t102_ho_detail_list->isGridAdd()) {
			$t102_ho_detail_list->loadRowValues(); // Load default values
		} else {
			$t102_ho_detail_list->loadRowValues($t102_ho_detail_list->Recordset); // Load row values
		}
		$t102_ho_detail->RowType = ROWTYPE_VIEW; // Render view
		if ($t102_ho_detail_list->isGridAdd()) // Grid add
			$t102_ho_detail->RowType = ROWTYPE_ADD; // Render add
		if ($t102_ho_detail_list->isGridAdd() && $t102_ho_detail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t102_ho_detail_list->restoreCurrentRowFormValues($t102_ho_detail_list->RowIndex); // Restore form values
		if ($t102_ho_detail_list->isEdit()) {
			if ($t102_ho_detail_list->checkInlineEditKey() && $t102_ho_detail_list->EditRowCount == 0) { // Inline edit
				$t102_ho_detail->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t102_ho_detail_list->isGridEdit()) { // Grid edit
			if ($t102_ho_detail->EventCancelled)
				$t102_ho_detail_list->restoreCurrentRowFormValues($t102_ho_detail_list->RowIndex); // Restore form values
			if ($t102_ho_detail_list->RowAction == "insert")
				$t102_ho_detail->RowType = ROWTYPE_ADD; // Render add
			else
				$t102_ho_detail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t102_ho_detail_list->isEdit() && $t102_ho_detail->RowType == ROWTYPE_EDIT && $t102_ho_detail->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t102_ho_detail_list->restoreFormValues(); // Restore form values
		}
		if ($t102_ho_detail_list->isGridEdit() && ($t102_ho_detail->RowType == ROWTYPE_EDIT || $t102_ho_detail->RowType == ROWTYPE_ADD) && $t102_ho_detail->EventCancelled) // Update failed
			$t102_ho_detail_list->restoreCurrentRowFormValues($t102_ho_detail_list->RowIndex); // Restore form values
		if ($t102_ho_detail->RowType == ROWTYPE_EDIT) // Edit row
			$t102_ho_detail_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t102_ho_detail->RowAttrs->merge(["data-rowindex" => $t102_ho_detail_list->RowCount, "id" => "r" . $t102_ho_detail_list->RowCount . "_t102_ho_detail", "data-rowtype" => $t102_ho_detail->RowType]);

		// Render row
		$t102_ho_detail_list->renderRow();

		// Render list options
		$t102_ho_detail_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t102_ho_detail_list->RowAction != "delete" && $t102_ho_detail_list->RowAction != "insertdelete" && !($t102_ho_detail_list->RowAction == "insert" && $t102_ho_detail->isConfirm() && $t102_ho_detail_list->emptyRow())) {
?>
	<tr <?php echo $t102_ho_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_ho_detail_list->ListOptions->render("body", "left", $t102_ho_detail_list->RowCount);
?>
	<?php if ($t102_ho_detail_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t102_ho_detail_list->asset_id->cellAttributes() ?>>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t102_ho_detail_list->RowCount ?>_t102_ho_detail_asset_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t102_ho_detail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_ho_detail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_ho_detail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_ho_detail_list->asset_id->ReadOnly || $t102_ho_detail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_ho_detail_list->asset_id->Lookup->getParamTag($t102_ho_detail_list, "p_x" . $t102_ho_detail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_ho_detail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" value="<?php echo $t102_ho_detail_list->asset_id->CurrentValue ?>"<?php echo $t102_ho_detail_list->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="o<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" id="o<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_list->asset_id->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t102_ho_detail_list->RowCount ?>_t102_ho_detail_asset_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t102_ho_detail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_ho_detail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_ho_detail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_ho_detail_list->asset_id->ReadOnly || $t102_ho_detail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_ho_detail_list->asset_id->Lookup->getParamTag($t102_ho_detail_list, "p_x" . $t102_ho_detail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_ho_detail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" value="<?php echo $t102_ho_detail_list->asset_id->CurrentValue ?>"<?php echo $t102_ho_detail_list->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t102_ho_detail_list->RowCount ?>_t102_ho_detail_asset_id">
<span<?php echo $t102_ho_detail_list->asset_id->viewAttributes() ?>><?php echo $t102_ho_detail_list->asset_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_id" name="x<?php echo $t102_ho_detail_list->RowIndex ?>_id" id="x<?php echo $t102_ho_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_ho_detail_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t102_ho_detail" data-field="x_id" name="o<?php echo $t102_ho_detail_list->RowIndex ?>_id" id="o<?php echo $t102_ho_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_ho_detail_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t102_ho_detail->RowType == ROWTYPE_EDIT || $t102_ho_detail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_id" name="x<?php echo $t102_ho_detail_list->RowIndex ?>_id" id="x<?php echo $t102_ho_detail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t102_ho_detail_list->id->CurrentValue) ?>">
<?php } ?>
<?php

// Render list options (body, right)
$t102_ho_detail_list->ListOptions->render("body", "right", $t102_ho_detail_list->RowCount);
?>
	</tr>
<?php if ($t102_ho_detail->RowType == ROWTYPE_ADD || $t102_ho_detail->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft102_ho_detaillist", "load"], function() {
	ft102_ho_detaillist.updateLists(<?php echo $t102_ho_detail_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t102_ho_detail_list->isGridAdd())
		if (!$t102_ho_detail_list->Recordset->EOF)
			$t102_ho_detail_list->Recordset->moveNext();
}
?>
<?php
	if ($t102_ho_detail_list->isGridAdd() || $t102_ho_detail_list->isGridEdit()) {
		$t102_ho_detail_list->RowIndex = '$rowindex$';
		$t102_ho_detail_list->loadRowValues();

		// Set row properties
		$t102_ho_detail->resetAttributes();
		$t102_ho_detail->RowAttrs->merge(["data-rowindex" => $t102_ho_detail_list->RowIndex, "id" => "r0_t102_ho_detail", "data-rowtype" => ROWTYPE_ADD]);
		$t102_ho_detail->RowAttrs->appendClass("ew-template");
		$t102_ho_detail->RowType = ROWTYPE_ADD;

		// Render row
		$t102_ho_detail_list->renderRow();

		// Render list options
		$t102_ho_detail_list->renderListOptions();
		$t102_ho_detail_list->StartRowCount = 0;
?>
	<tr <?php echo $t102_ho_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t102_ho_detail_list->ListOptions->render("body", "left", $t102_ho_detail_list->RowIndex);
?>
	<?php if ($t102_ho_detail_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<span id="el$rowindex$_t102_ho_detail_asset_id" class="form-group t102_ho_detail_asset_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t102_ho_detail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t102_ho_detail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t102_ho_detail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t102_ho_detail_list->asset_id->ReadOnly || $t102_ho_detail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t102_ho_detail_list->asset_id->Lookup->getParamTag($t102_ho_detail_list, "p_x" . $t102_ho_detail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t102_ho_detail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" id="x<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" value="<?php echo $t102_ho_detail_list->asset_id->CurrentValue ?>"<?php echo $t102_ho_detail_list->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t102_ho_detail" data-field="x_asset_id" name="o<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" id="o<?php echo $t102_ho_detail_list->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t102_ho_detail_list->asset_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t102_ho_detail_list->ListOptions->render("body", "right", $t102_ho_detail_list->RowIndex);
?>
<script>
loadjs.ready(["ft102_ho_detaillist", "load"], function() {
	ft102_ho_detaillist.updateLists(<?php echo $t102_ho_detail_list->RowIndex ?>);
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
<?php if ($t102_ho_detail_list->isAdd() || $t102_ho_detail_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" id="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" value="<?php echo $t102_ho_detail_list->KeyCount ?>">
<?php } ?>
<?php if ($t102_ho_detail_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" id="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" value="<?php echo $t102_ho_detail_list->KeyCount ?>">
<?php echo $t102_ho_detail_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t102_ho_detail_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" id="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" value="<?php echo $t102_ho_detail_list->KeyCount ?>">
<?php } ?>
<?php if ($t102_ho_detail_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" id="<?php echo $t102_ho_detail_list->FormKeyCountName ?>" value="<?php echo $t102_ho_detail_list->KeyCount ?>">
<?php echo $t102_ho_detail_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t102_ho_detail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t102_ho_detail_list->Recordset)
	$t102_ho_detail_list->Recordset->Close();
?>
<?php if (!$t102_ho_detail_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t102_ho_detail_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t102_ho_detail_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t102_ho_detail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t102_ho_detail_list->TotalRecords == 0 && !$t102_ho_detail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t102_ho_detail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t102_ho_detail_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t102_ho_detail_list->isExport()) { ?>
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
$t102_ho_detail_list->terminate();
?>