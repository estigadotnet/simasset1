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
$t007_assettype_list = new t007_assettype_list();

// Run the page
$t007_assettype_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_assettype_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t007_assettype_list->isExport()) { ?>
<script>
var ft007_assettypelist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft007_assettypelist = currentForm = new ew.Form("ft007_assettypelist", "list");
	ft007_assettypelist.formKeyCountName = '<?php echo $t007_assettype_list->FormKeyCountName ?>';

	// Validate form
	ft007_assettypelist.validate = function() {
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
			<?php if ($t007_assettype_list->assetgroup_id->Required) { ?>
				elm = this.getElements("x" + infix + "_assetgroup_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_list->assetgroup_id->caption(), $t007_assettype_list->assetgroup_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_assetgroup_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_assettype_list->assetgroup_id->errorMessage()) ?>");
			<?php if ($t007_assettype_list->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_list->Description->caption(), $t007_assettype_list->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t007_assettype_list->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_list->Code->caption(), $t007_assettype_list->Code->RequiredErrorMessage)) ?>");
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
	ft007_assettypelist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "assetgroup_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "Description", false)) return false;
		if (ew.valueChanged(fobj, infix, "Code", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft007_assettypelist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_assettypelist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft007_assettypelist.lists["x_assetgroup_id"] = <?php echo $t007_assettype_list->assetgroup_id->Lookup->toClientList($t007_assettype_list) ?>;
	ft007_assettypelist.lists["x_assetgroup_id"].options = <?php echo JsonEncode($t007_assettype_list->assetgroup_id->lookupOptions()) ?>;
	ft007_assettypelist.autoSuggests["x_assetgroup_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("ft007_assettypelist");
});
var ft007_assettypelistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft007_assettypelistsrch = currentSearchForm = new ew.Form("ft007_assettypelistsrch");

	// Dynamic selection lists
	// Filters

	ft007_assettypelistsrch.filterList = <?php echo $t007_assettype_list->getFilterList() ?>;
	loadjs.done("ft007_assettypelistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t007_assettype_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t007_assettype_list->TotalRecords > 0 && $t007_assettype_list->ExportOptions->visible()) { ?>
<?php $t007_assettype_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t007_assettype_list->ImportOptions->visible()) { ?>
<?php $t007_assettype_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t007_assettype_list->SearchOptions->visible()) { ?>
<?php $t007_assettype_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t007_assettype_list->FilterOptions->visible()) { ?>
<?php $t007_assettype_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t007_assettype_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t007_assettype_list->isExport("print")) { ?>
<?php
if ($t007_assettype_list->DbMasterFilter != "" && $t007_assettype->getCurrentMasterTable() == "t005_assetgroup") {
	if ($t007_assettype_list->MasterRecordExists) {
		include_once "t005_assetgroupmaster.php";
	}
}
?>
<?php } ?>
<?php
$t007_assettype_list->renderOtherOptions();
?>
<?php $t007_assettype_list->showPageHeader(); ?>
<?php
$t007_assettype_list->showMessage();
?>
<?php if ($t007_assettype_list->TotalRecords > 0 || $t007_assettype->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t007_assettype_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t007_assettype">
<form name="ft007_assettypelist" id="ft007_assettypelist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_assettype">
<?php if ($t007_assettype->getCurrentMasterTable() == "t005_assetgroup" && $t007_assettype->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t005_assetgroup">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_t007_assettype" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t007_assettype_list->TotalRecords > 0 || $t007_assettype_list->isAdd() || $t007_assettype_list->isCopy() || $t007_assettype_list->isGridEdit()) { ?>
<table id="tbl_t007_assettypelist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t007_assettype->RowType = ROWTYPE_HEADER;

// Render list options
$t007_assettype_list->renderListOptions();

// Render list options (header, left)
$t007_assettype_list->ListOptions->render("header", "left");
?>
<?php if ($t007_assettype_list->assetgroup_id->Visible) { // assetgroup_id ?>
	<?php if ($t007_assettype_list->SortUrl($t007_assettype_list->assetgroup_id) == "") { ?>
		<th data-name="assetgroup_id" class="<?php echo $t007_assettype_list->assetgroup_id->headerCellClass() ?>"><div id="elh_t007_assettype_assetgroup_id" class="t007_assettype_assetgroup_id"><div class="ew-table-header-caption"><?php echo $t007_assettype_list->assetgroup_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="assetgroup_id" class="<?php echo $t007_assettype_list->assetgroup_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_assettype_list->SortUrl($t007_assettype_list->assetgroup_id) ?>', 2);"><div id="elh_t007_assettype_assetgroup_id" class="t007_assettype_assetgroup_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_assettype_list->assetgroup_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_assettype_list->assetgroup_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_assettype_list->assetgroup_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_assettype_list->Description->Visible) { // Description ?>
	<?php if ($t007_assettype_list->SortUrl($t007_assettype_list->Description) == "") { ?>
		<th data-name="Description" class="<?php echo $t007_assettype_list->Description->headerCellClass() ?>"><div id="elh_t007_assettype_Description" class="t007_assettype_Description"><div class="ew-table-header-caption"><?php echo $t007_assettype_list->Description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Description" class="<?php echo $t007_assettype_list->Description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_assettype_list->SortUrl($t007_assettype_list->Description) ?>', 2);"><div id="elh_t007_assettype_Description" class="t007_assettype_Description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_assettype_list->Description->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_assettype_list->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_assettype_list->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t007_assettype_list->Code->Visible) { // Code ?>
	<?php if ($t007_assettype_list->SortUrl($t007_assettype_list->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $t007_assettype_list->Code->headerCellClass() ?>"><div id="elh_t007_assettype_Code" class="t007_assettype_Code"><div class="ew-table-header-caption"><?php echo $t007_assettype_list->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $t007_assettype_list->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t007_assettype_list->SortUrl($t007_assettype_list->Code) ?>', 2);"><div id="elh_t007_assettype_Code" class="t007_assettype_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t007_assettype_list->Code->caption() ?></span><span class="ew-table-header-sort"><?php if ($t007_assettype_list->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t007_assettype_list->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t007_assettype_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t007_assettype_list->isAdd() || $t007_assettype_list->isCopy()) {
		$t007_assettype_list->RowIndex = 0;
		$t007_assettype_list->KeyCount = $t007_assettype_list->RowIndex;
		if ($t007_assettype_list->isCopy() && !$t007_assettype_list->loadRow())
			$t007_assettype->CurrentAction = "add";
		if ($t007_assettype_list->isAdd())
			$t007_assettype_list->loadRowValues();
		if ($t007_assettype->EventCancelled) // Insert failed
			$t007_assettype_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t007_assettype->resetAttributes();
		$t007_assettype->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t007_assettype", "data-rowtype" => ROWTYPE_ADD]);
		$t007_assettype->RowType = ROWTYPE_ADD;

		// Render row
		$t007_assettype_list->renderRow();

		// Render list options
		$t007_assettype_list->renderListOptions();
		$t007_assettype_list->StartRowCount = 0;
?>
	<tr <?php echo $t007_assettype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_assettype_list->ListOptions->render("body", "left", $t007_assettype_list->RowCount);
?>
	<?php if ($t007_assettype_list->assetgroup_id->Visible) { // assetgroup_id ?>
		<td data-name="assetgroup_id">
<?php if ($t007_assettype_list->assetgroup_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_assetgroup_id" class="form-group t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_list->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_list->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_assetgroup_id" class="form-group t007_assettype_assetgroup_id">
<?php
$onchange = $t007_assettype_list->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_list->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_list->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_list->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_list->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_list->assetgroup_id->ReadOnly || $t007_assettype_list->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_list->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypelist"], function() {
	ft007_assettypelist.createAutoSuggest({"id":"x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_list->assetgroup_id->Lookup->getParamTag($t007_assettype_list, "p_x" . $t007_assettype_list->RowIndex . "_assetgroup_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="o<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="o<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_assettype_list->Description->Visible) { // Description ?>
		<td data-name="Description">
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Description" class="form-group t007_assettype_Description">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_list->RowIndex ?>_Description" id="x<?php echo $t007_assettype_list->RowIndex ?>_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_list->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Description->EditValue ?>"<?php echo $t007_assettype_list->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="o<?php echo $t007_assettype_list->RowIndex ?>_Description" id="o<?php echo $t007_assettype_list->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_list->Description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_assettype_list->Code->Visible) { // Code ?>
		<td data-name="Code">
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Code" class="form-group t007_assettype_Code">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_list->RowIndex ?>_Code" id="x<?php echo $t007_assettype_list->RowIndex ?>_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_list->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Code->EditValue ?>"<?php echo $t007_assettype_list->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="o<?php echo $t007_assettype_list->RowIndex ?>_Code" id="o<?php echo $t007_assettype_list->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_list->Code->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_assettype_list->ListOptions->render("body", "right", $t007_assettype_list->RowCount);
?>
<script>
loadjs.ready(["ft007_assettypelist", "load"], function() {
	ft007_assettypelist.updateLists(<?php echo $t007_assettype_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t007_assettype_list->ExportAll && $t007_assettype_list->isExport()) {
	$t007_assettype_list->StopRecord = $t007_assettype_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t007_assettype_list->TotalRecords > $t007_assettype_list->StartRecord + $t007_assettype_list->DisplayRecords - 1)
		$t007_assettype_list->StopRecord = $t007_assettype_list->StartRecord + $t007_assettype_list->DisplayRecords - 1;
	else
		$t007_assettype_list->StopRecord = $t007_assettype_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t007_assettype->isConfirm() || $t007_assettype_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t007_assettype_list->FormKeyCountName) && ($t007_assettype_list->isGridAdd() || $t007_assettype_list->isGridEdit() || $t007_assettype->isConfirm())) {
		$t007_assettype_list->KeyCount = $CurrentForm->getValue($t007_assettype_list->FormKeyCountName);
		$t007_assettype_list->StopRecord = $t007_assettype_list->StartRecord + $t007_assettype_list->KeyCount - 1;
	}
}
$t007_assettype_list->RecordCount = $t007_assettype_list->StartRecord - 1;
if ($t007_assettype_list->Recordset && !$t007_assettype_list->Recordset->EOF) {
	$t007_assettype_list->Recordset->moveFirst();
	$selectLimit = $t007_assettype_list->UseSelectLimit;
	if (!$selectLimit && $t007_assettype_list->StartRecord > 1)
		$t007_assettype_list->Recordset->move($t007_assettype_list->StartRecord - 1);
} elseif (!$t007_assettype->AllowAddDeleteRow && $t007_assettype_list->StopRecord == 0) {
	$t007_assettype_list->StopRecord = $t007_assettype->GridAddRowCount;
}

// Initialize aggregate
$t007_assettype->RowType = ROWTYPE_AGGREGATEINIT;
$t007_assettype->resetAttributes();
$t007_assettype_list->renderRow();
$t007_assettype_list->EditRowCount = 0;
if ($t007_assettype_list->isEdit())
	$t007_assettype_list->RowIndex = 1;
if ($t007_assettype_list->isGridAdd())
	$t007_assettype_list->RowIndex = 0;
if ($t007_assettype_list->isGridEdit())
	$t007_assettype_list->RowIndex = 0;
while ($t007_assettype_list->RecordCount < $t007_assettype_list->StopRecord) {
	$t007_assettype_list->RecordCount++;
	if ($t007_assettype_list->RecordCount >= $t007_assettype_list->StartRecord) {
		$t007_assettype_list->RowCount++;
		if ($t007_assettype_list->isGridAdd() || $t007_assettype_list->isGridEdit() || $t007_assettype->isConfirm()) {
			$t007_assettype_list->RowIndex++;
			$CurrentForm->Index = $t007_assettype_list->RowIndex;
			if ($CurrentForm->hasValue($t007_assettype_list->FormActionName) && ($t007_assettype->isConfirm() || $t007_assettype_list->EventCancelled))
				$t007_assettype_list->RowAction = strval($CurrentForm->getValue($t007_assettype_list->FormActionName));
			elseif ($t007_assettype_list->isGridAdd())
				$t007_assettype_list->RowAction = "insert";
			else
				$t007_assettype_list->RowAction = "";
		}

		// Set up key count
		$t007_assettype_list->KeyCount = $t007_assettype_list->RowIndex;

		// Init row class and style
		$t007_assettype->resetAttributes();
		$t007_assettype->CssClass = "";
		if ($t007_assettype_list->isGridAdd()) {
			$t007_assettype_list->loadRowValues(); // Load default values
		} else {
			$t007_assettype_list->loadRowValues($t007_assettype_list->Recordset); // Load row values
		}
		$t007_assettype->RowType = ROWTYPE_VIEW; // Render view
		if ($t007_assettype_list->isGridAdd()) // Grid add
			$t007_assettype->RowType = ROWTYPE_ADD; // Render add
		if ($t007_assettype_list->isGridAdd() && $t007_assettype->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t007_assettype_list->restoreCurrentRowFormValues($t007_assettype_list->RowIndex); // Restore form values
		if ($t007_assettype_list->isEdit()) {
			if ($t007_assettype_list->checkInlineEditKey() && $t007_assettype_list->EditRowCount == 0) { // Inline edit
				$t007_assettype->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t007_assettype_list->isGridEdit()) { // Grid edit
			if ($t007_assettype->EventCancelled)
				$t007_assettype_list->restoreCurrentRowFormValues($t007_assettype_list->RowIndex); // Restore form values
			if ($t007_assettype_list->RowAction == "insert")
				$t007_assettype->RowType = ROWTYPE_ADD; // Render add
			else
				$t007_assettype->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t007_assettype_list->isEdit() && $t007_assettype->RowType == ROWTYPE_EDIT && $t007_assettype->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t007_assettype_list->restoreFormValues(); // Restore form values
		}
		if ($t007_assettype_list->isGridEdit() && ($t007_assettype->RowType == ROWTYPE_EDIT || $t007_assettype->RowType == ROWTYPE_ADD) && $t007_assettype->EventCancelled) // Update failed
			$t007_assettype_list->restoreCurrentRowFormValues($t007_assettype_list->RowIndex); // Restore form values
		if ($t007_assettype->RowType == ROWTYPE_EDIT) // Edit row
			$t007_assettype_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t007_assettype->RowAttrs->merge(["data-rowindex" => $t007_assettype_list->RowCount, "id" => "r" . $t007_assettype_list->RowCount . "_t007_assettype", "data-rowtype" => $t007_assettype->RowType]);

		// Render row
		$t007_assettype_list->renderRow();

		// Render list options
		$t007_assettype_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t007_assettype_list->RowAction != "delete" && $t007_assettype_list->RowAction != "insertdelete" && !($t007_assettype_list->RowAction == "insert" && $t007_assettype->isConfirm() && $t007_assettype_list->emptyRow())) {
?>
	<tr <?php echo $t007_assettype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_assettype_list->ListOptions->render("body", "left", $t007_assettype_list->RowCount);
?>
	<?php if ($t007_assettype_list->assetgroup_id->Visible) { // assetgroup_id ?>
		<td data-name="assetgroup_id" <?php echo $t007_assettype_list->assetgroup_id->cellAttributes() ?>>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<?php if ($t007_assettype_list->assetgroup_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<span<?php echo $t007_assettype_list->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_list->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<?php
$onchange = $t007_assettype_list->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_list->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_list->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_list->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_list->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_list->assetgroup_id->ReadOnly || $t007_assettype_list->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_list->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypelist"], function() {
	ft007_assettypelist.createAutoSuggest({"id":"x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_list->assetgroup_id->Lookup->getParamTag($t007_assettype_list, "p_x" . $t007_assettype_list->RowIndex . "_assetgroup_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="o<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="o<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<?php if ($t007_assettype_list->assetgroup_id->getSessionValue() != "") { ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<span<?php echo $t007_assettype_list->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_list->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_assetgroup_id" class="form-group">
<?php
$onchange = $t007_assettype_list->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_list->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_list->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_list->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_list->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_list->assetgroup_id->ReadOnly || $t007_assettype_list->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_list->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypelist"], function() {
	ft007_assettypelist.createAutoSuggest({"id":"x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_list->assetgroup_id->Lookup->getParamTag($t007_assettype_list, "p_x" . $t007_assettype_list->RowIndex . "_assetgroup_id") ?>
</span>
<?php } ?>
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_list->assetgroup_id->viewAttributes() ?>><?php echo $t007_assettype_list->assetgroup_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t007_assettype" data-field="x_id" name="x<?php echo $t007_assettype_list->RowIndex ?>_id" id="x<?php echo $t007_assettype_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_assettype_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t007_assettype" data-field="x_id" name="o<?php echo $t007_assettype_list->RowIndex ?>_id" id="o<?php echo $t007_assettype_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_assettype_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT || $t007_assettype->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t007_assettype" data-field="x_id" name="x<?php echo $t007_assettype_list->RowIndex ?>_id" id="x<?php echo $t007_assettype_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t007_assettype_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t007_assettype_list->Description->Visible) { // Description ?>
		<td data-name="Description" <?php echo $t007_assettype_list->Description->cellAttributes() ?>>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Description" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_list->RowIndex ?>_Description" id="x<?php echo $t007_assettype_list->RowIndex ?>_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_list->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Description->EditValue ?>"<?php echo $t007_assettype_list->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="o<?php echo $t007_assettype_list->RowIndex ?>_Description" id="o<?php echo $t007_assettype_list->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_list->Description->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Description" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_list->RowIndex ?>_Description" id="x<?php echo $t007_assettype_list->RowIndex ?>_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_list->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Description->EditValue ?>"<?php echo $t007_assettype_list->Description->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Description">
<span<?php echo $t007_assettype_list->Description->viewAttributes() ?>><?php echo $t007_assettype_list->Description->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t007_assettype_list->Code->Visible) { // Code ?>
		<td data-name="Code" <?php echo $t007_assettype_list->Code->cellAttributes() ?>>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Code" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_list->RowIndex ?>_Code" id="x<?php echo $t007_assettype_list->RowIndex ?>_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_list->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Code->EditValue ?>"<?php echo $t007_assettype_list->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="o<?php echo $t007_assettype_list->RowIndex ?>_Code" id="o<?php echo $t007_assettype_list->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_list->Code->OldValue) ?>">
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Code" class="form-group">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_list->RowIndex ?>_Code" id="x<?php echo $t007_assettype_list->RowIndex ?>_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_list->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Code->EditValue ?>"<?php echo $t007_assettype_list->Code->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t007_assettype->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t007_assettype_list->RowCount ?>_t007_assettype_Code">
<span<?php echo $t007_assettype_list->Code->viewAttributes() ?>><?php echo $t007_assettype_list->Code->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_assettype_list->ListOptions->render("body", "right", $t007_assettype_list->RowCount);
?>
	</tr>
<?php if ($t007_assettype->RowType == ROWTYPE_ADD || $t007_assettype->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft007_assettypelist", "load"], function() {
	ft007_assettypelist.updateLists(<?php echo $t007_assettype_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t007_assettype_list->isGridAdd())
		if (!$t007_assettype_list->Recordset->EOF)
			$t007_assettype_list->Recordset->moveNext();
}
?>
<?php
	if ($t007_assettype_list->isGridAdd() || $t007_assettype_list->isGridEdit()) {
		$t007_assettype_list->RowIndex = '$rowindex$';
		$t007_assettype_list->loadRowValues();

		// Set row properties
		$t007_assettype->resetAttributes();
		$t007_assettype->RowAttrs->merge(["data-rowindex" => $t007_assettype_list->RowIndex, "id" => "r0_t007_assettype", "data-rowtype" => ROWTYPE_ADD]);
		$t007_assettype->RowAttrs->appendClass("ew-template");
		$t007_assettype->RowType = ROWTYPE_ADD;

		// Render row
		$t007_assettype_list->renderRow();

		// Render list options
		$t007_assettype_list->renderListOptions();
		$t007_assettype_list->StartRowCount = 0;
?>
	<tr <?php echo $t007_assettype->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t007_assettype_list->ListOptions->render("body", "left", $t007_assettype_list->RowIndex);
?>
	<?php if ($t007_assettype_list->assetgroup_id->Visible) { // assetgroup_id ?>
		<td data-name="assetgroup_id">
<?php if ($t007_assettype_list->assetgroup_id->getSessionValue() != "") { ?>
<span id="el$rowindex$_t007_assettype_assetgroup_id" class="form-group t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_list->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_list->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el$rowindex$_t007_assettype_assetgroup_id" class="form-group t007_assettype_assetgroup_id">
<?php
$onchange = $t007_assettype_list->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_list->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="sv_x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_list->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_list->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_list->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_list->assetgroup_id->ReadOnly || $t007_assettype_list->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_list->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypelist"], function() {
	ft007_assettypelist.createAutoSuggest({"id":"x<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_list->assetgroup_id->Lookup->getParamTag($t007_assettype_list, "p_x" . $t007_assettype_list->RowIndex . "_assetgroup_id") ?>
</span>
<?php } ?>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" name="o<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" id="o<?php echo $t007_assettype_list->RowIndex ?>_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_list->assetgroup_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_assettype_list->Description->Visible) { // Description ?>
		<td data-name="Description">
<span id="el$rowindex$_t007_assettype_Description" class="form-group t007_assettype_Description">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x<?php echo $t007_assettype_list->RowIndex ?>_Description" id="x<?php echo $t007_assettype_list->RowIndex ?>_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_list->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Description->EditValue ?>"<?php echo $t007_assettype_list->Description->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Description" name="o<?php echo $t007_assettype_list->RowIndex ?>_Description" id="o<?php echo $t007_assettype_list->RowIndex ?>_Description" value="<?php echo HtmlEncode($t007_assettype_list->Description->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t007_assettype_list->Code->Visible) { // Code ?>
		<td data-name="Code">
<span id="el$rowindex$_t007_assettype_Code" class="form-group t007_assettype_Code">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x<?php echo $t007_assettype_list->RowIndex ?>_Code" id="x<?php echo $t007_assettype_list->RowIndex ?>_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_list->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_list->Code->EditValue ?>"<?php echo $t007_assettype_list->Code->editAttributes() ?>>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_Code" name="o<?php echo $t007_assettype_list->RowIndex ?>_Code" id="o<?php echo $t007_assettype_list->RowIndex ?>_Code" value="<?php echo HtmlEncode($t007_assettype_list->Code->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t007_assettype_list->ListOptions->render("body", "right", $t007_assettype_list->RowIndex);
?>
<script>
loadjs.ready(["ft007_assettypelist", "load"], function() {
	ft007_assettypelist.updateLists(<?php echo $t007_assettype_list->RowIndex ?>);
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
<?php if ($t007_assettype_list->isAdd() || $t007_assettype_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t007_assettype_list->FormKeyCountName ?>" id="<?php echo $t007_assettype_list->FormKeyCountName ?>" value="<?php echo $t007_assettype_list->KeyCount ?>">
<?php } ?>
<?php if ($t007_assettype_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t007_assettype_list->FormKeyCountName ?>" id="<?php echo $t007_assettype_list->FormKeyCountName ?>" value="<?php echo $t007_assettype_list->KeyCount ?>">
<?php echo $t007_assettype_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t007_assettype_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t007_assettype_list->FormKeyCountName ?>" id="<?php echo $t007_assettype_list->FormKeyCountName ?>" value="<?php echo $t007_assettype_list->KeyCount ?>">
<?php } ?>
<?php if ($t007_assettype_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t007_assettype_list->FormKeyCountName ?>" id="<?php echo $t007_assettype_list->FormKeyCountName ?>" value="<?php echo $t007_assettype_list->KeyCount ?>">
<?php echo $t007_assettype_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t007_assettype->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t007_assettype_list->Recordset)
	$t007_assettype_list->Recordset->Close();
?>
<?php if (!$t007_assettype_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t007_assettype_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t007_assettype_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t007_assettype_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t007_assettype_list->TotalRecords == 0 && !$t007_assettype->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t007_assettype_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t007_assettype_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t007_assettype_list->isExport()) { ?>
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
$t007_assettype_list->terminate();
?>