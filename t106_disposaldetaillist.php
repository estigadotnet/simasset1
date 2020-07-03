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
$t106_disposaldetail_list = new t106_disposaldetail_list();

// Run the page
$t106_disposaldetail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t106_disposaldetail_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t106_disposaldetail_list->isExport()) { ?>
<script>
var ft106_disposaldetaillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft106_disposaldetaillist = currentForm = new ew.Form("ft106_disposaldetaillist", "list");
	ft106_disposaldetaillist.formKeyCountName = '<?php echo $t106_disposaldetail_list->FormKeyCountName ?>';

	// Validate form
	ft106_disposaldetaillist.validate = function() {
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
			<?php if ($t106_disposaldetail_list->asset_id->Required) { ?>
				elm = this.getElements("x" + infix + "_asset_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_list->asset_id->caption(), $t106_disposaldetail_list->asset_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t106_disposaldetail_list->disposaldate->Required) { ?>
				elm = this.getElements("x" + infix + "_disposaldate");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_list->disposaldate->caption(), $t106_disposaldetail_list->disposaldate->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_disposaldate");
				if (elm && !ew.checkEuroDate(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t106_disposaldetail_list->disposaldate->errorMessage()) ?>");
			<?php if ($t106_disposaldetail_list->cond_id->Required) { ?>
				elm = this.getElements("x" + infix + "_cond_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_list->cond_id->caption(), $t106_disposaldetail_list->cond_id->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t106_disposaldetail_list->reason_id->Required) { ?>
				elm = this.getElements("x" + infix + "_reason_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t106_disposaldetail_list->reason_id->caption(), $t106_disposaldetail_list->reason_id->RequiredErrorMessage)) ?>");
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
	ft106_disposaldetaillist.emptyRow = function(infix) {
		var fobj = this._form;
		if (ew.valueChanged(fobj, infix, "asset_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "disposaldate", false)) return false;
		if (ew.valueChanged(fobj, infix, "cond_id", false)) return false;
		if (ew.valueChanged(fobj, infix, "reason_id", false)) return false;
		return true;
	}

	// Form_CustomValidate
	ft106_disposaldetaillist.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft106_disposaldetaillist.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft106_disposaldetaillist.lists["x_asset_id"] = <?php echo $t106_disposaldetail_list->asset_id->Lookup->toClientList($t106_disposaldetail_list) ?>;
	ft106_disposaldetaillist.lists["x_asset_id"].options = <?php echo JsonEncode($t106_disposaldetail_list->asset_id->lookupOptions()) ?>;
	ft106_disposaldetaillist.lists["x_cond_id"] = <?php echo $t106_disposaldetail_list->cond_id->Lookup->toClientList($t106_disposaldetail_list) ?>;
	ft106_disposaldetaillist.lists["x_cond_id"].options = <?php echo JsonEncode($t106_disposaldetail_list->cond_id->lookupOptions()) ?>;
	ft106_disposaldetaillist.lists["x_reason_id"] = <?php echo $t106_disposaldetail_list->reason_id->Lookup->toClientList($t106_disposaldetail_list) ?>;
	ft106_disposaldetaillist.lists["x_reason_id"].options = <?php echo JsonEncode($t106_disposaldetail_list->reason_id->lookupOptions()) ?>;
	loadjs.done("ft106_disposaldetaillist");
});
var ft106_disposaldetaillistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft106_disposaldetaillistsrch = currentSearchForm = new ew.Form("ft106_disposaldetaillistsrch");

	// Dynamic selection lists
	// Filters

	ft106_disposaldetaillistsrch.filterList = <?php echo $t106_disposaldetail_list->getFilterList() ?>;
	loadjs.done("ft106_disposaldetaillistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t106_disposaldetail_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t106_disposaldetail_list->TotalRecords > 0 && $t106_disposaldetail_list->ExportOptions->visible()) { ?>
<?php $t106_disposaldetail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t106_disposaldetail_list->ImportOptions->visible()) { ?>
<?php $t106_disposaldetail_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t106_disposaldetail_list->SearchOptions->visible()) { ?>
<?php $t106_disposaldetail_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t106_disposaldetail_list->FilterOptions->visible()) { ?>
<?php $t106_disposaldetail_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t106_disposaldetail_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t106_disposaldetail_list->isExport("print")) { ?>
<?php
if ($t106_disposaldetail_list->DbMasterFilter != "" && $t106_disposaldetail->getCurrentMasterTable() == "t105_disposalhead") {
	if ($t106_disposaldetail_list->MasterRecordExists) {
		include_once "t105_disposalheadmaster.php";
	}
}
?>
<?php } ?>
<?php
$t106_disposaldetail_list->renderOtherOptions();
?>
<?php $t106_disposaldetail_list->showPageHeader(); ?>
<?php
$t106_disposaldetail_list->showMessage();
?>
<?php if ($t106_disposaldetail_list->TotalRecords > 0 || $t106_disposaldetail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t106_disposaldetail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t106_disposaldetail">
<form name="ft106_disposaldetaillist" id="ft106_disposaldetaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t106_disposaldetail">
<?php if ($t106_disposaldetail->getCurrentMasterTable() == "t105_disposalhead" && $t106_disposaldetail->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t105_disposalhead">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->disposalhead_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_t106_disposaldetail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t106_disposaldetail_list->TotalRecords > 0 || $t106_disposaldetail_list->isAdd() || $t106_disposaldetail_list->isCopy() || $t106_disposaldetail_list->isGridEdit()) { ?>
<table id="tbl_t106_disposaldetaillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t106_disposaldetail->RowType = ROWTYPE_HEADER;

// Render list options
$t106_disposaldetail_list->renderListOptions();

// Render list options (header, left)
$t106_disposaldetail_list->ListOptions->render("header", "left");
?>
<?php if ($t106_disposaldetail_list->asset_id->Visible) { // asset_id ?>
	<?php if ($t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t106_disposaldetail_list->asset_id->headerCellClass() ?>"><div id="elh_t106_disposaldetail_asset_id" class="t106_disposaldetail_asset_id"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t106_disposaldetail_list->asset_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->asset_id) ?>', 2);"><div id="elh_t106_disposaldetail_asset_id" class="t106_disposaldetail_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_list->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_list->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t106_disposaldetail_list->disposaldate->Visible) { // disposaldate ?>
	<?php if ($t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->disposaldate) == "") { ?>
		<th data-name="disposaldate" class="<?php echo $t106_disposaldetail_list->disposaldate->headerCellClass() ?>"><div id="elh_t106_disposaldetail_disposaldate" class="t106_disposaldetail_disposaldate"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->disposaldate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="disposaldate" class="<?php echo $t106_disposaldetail_list->disposaldate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->disposaldate) ?>', 2);"><div id="elh_t106_disposaldetail_disposaldate" class="t106_disposaldetail_disposaldate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->disposaldate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_list->disposaldate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_list->disposaldate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t106_disposaldetail_list->cond_id->Visible) { // cond_id ?>
	<?php if ($t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->cond_id) == "") { ?>
		<th data-name="cond_id" class="<?php echo $t106_disposaldetail_list->cond_id->headerCellClass() ?>"><div id="elh_t106_disposaldetail_cond_id" class="t106_disposaldetail_cond_id"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->cond_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="cond_id" class="<?php echo $t106_disposaldetail_list->cond_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->cond_id) ?>', 2);"><div id="elh_t106_disposaldetail_cond_id" class="t106_disposaldetail_cond_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->cond_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_list->cond_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_list->cond_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t106_disposaldetail_list->reason_id->Visible) { // reason_id ?>
	<?php if ($t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->reason_id) == "") { ?>
		<th data-name="reason_id" class="<?php echo $t106_disposaldetail_list->reason_id->headerCellClass() ?>"><div id="elh_t106_disposaldetail_reason_id" class="t106_disposaldetail_reason_id"><div class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->reason_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reason_id" class="<?php echo $t106_disposaldetail_list->reason_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t106_disposaldetail_list->SortUrl($t106_disposaldetail_list->reason_id) ?>', 2);"><div id="elh_t106_disposaldetail_reason_id" class="t106_disposaldetail_reason_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t106_disposaldetail_list->reason_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t106_disposaldetail_list->reason_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t106_disposaldetail_list->reason_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t106_disposaldetail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
	if ($t106_disposaldetail_list->isAdd() || $t106_disposaldetail_list->isCopy()) {
		$t106_disposaldetail_list->RowIndex = 0;
		$t106_disposaldetail_list->KeyCount = $t106_disposaldetail_list->RowIndex;
		if ($t106_disposaldetail_list->isCopy() && !$t106_disposaldetail_list->loadRow())
			$t106_disposaldetail->CurrentAction = "add";
		if ($t106_disposaldetail_list->isAdd())
			$t106_disposaldetail_list->loadRowValues();
		if ($t106_disposaldetail->EventCancelled) // Insert failed
			$t106_disposaldetail_list->restoreFormValues(); // Restore form values

		// Set row properties
		$t106_disposaldetail->resetAttributes();
		$t106_disposaldetail->RowAttrs->merge(["data-rowindex" => 0, "id" => "r0_t106_disposaldetail", "data-rowtype" => ROWTYPE_ADD]);
		$t106_disposaldetail->RowType = ROWTYPE_ADD;

		// Render row
		$t106_disposaldetail_list->renderRow();

		// Render list options
		$t106_disposaldetail_list->renderListOptions();
		$t106_disposaldetail_list->StartRowCount = 0;
?>
	<tr <?php echo $t106_disposaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t106_disposaldetail_list->ListOptions->render("body", "left", $t106_disposaldetail_list->RowCount);
?>
	<?php if ($t106_disposaldetail_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_asset_id" class="form-group t106_disposaldetail_asset_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->asset_id->ReadOnly || $t106_disposaldetail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->asset_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" value="<?php echo $t106_disposaldetail_list->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->asset_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->disposaldate->Visible) { // disposaldate ?>
		<td data-name="disposaldate">
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_disposaldate" class="form-group t106_disposaldetail_disposaldate">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposaldate" data-format="7" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t106_disposaldetail_list->disposaldate->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_list->disposaldate->EditValue ?>"<?php echo $t106_disposaldetail_list->disposaldate->editAttributes() ?>>
<?php if (!$t106_disposaldetail_list->disposaldate->ReadOnly && !$t106_disposaldetail_list->disposaldate->Disabled && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["readonly"]) && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft106_disposaldetaillist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft106_disposaldetaillist", "x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposaldate" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" value="<?php echo HtmlEncode($t106_disposaldetail_list->disposaldate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->cond_id->Visible) { // cond_id ?>
		<td data-name="cond_id">
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_cond_id" class="form-group t106_disposaldetail_cond_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->cond_id->ReadOnly || $t106_disposaldetail_list->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->cond_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->cond_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" value="<?php echo $t106_disposaldetail_list->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->cond_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->cond_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->reason_id->Visible) { // reason_id ?>
		<td data-name="reason_id">
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_reason_id" class="form-group t106_disposaldetail_reason_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->reason_id->ReadOnly || $t106_disposaldetail_list->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->reason_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->reason_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" value="<?php echo $t106_disposaldetail_list->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->reason_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->reason_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t106_disposaldetail_list->ListOptions->render("body", "right", $t106_disposaldetail_list->RowCount);
?>
<script>
loadjs.ready(["ft106_disposaldetaillist", "load"], function() {
	ft106_disposaldetaillist.updateLists(<?php echo $t106_disposaldetail_list->RowIndex ?>);
});
</script>
	</tr>
<?php
	}
?>
<?php
if ($t106_disposaldetail_list->ExportAll && $t106_disposaldetail_list->isExport()) {
	$t106_disposaldetail_list->StopRecord = $t106_disposaldetail_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t106_disposaldetail_list->TotalRecords > $t106_disposaldetail_list->StartRecord + $t106_disposaldetail_list->DisplayRecords - 1)
		$t106_disposaldetail_list->StopRecord = $t106_disposaldetail_list->StartRecord + $t106_disposaldetail_list->DisplayRecords - 1;
	else
		$t106_disposaldetail_list->StopRecord = $t106_disposaldetail_list->TotalRecords;
}

// Restore number of post back records
if ($CurrentForm && ($t106_disposaldetail->isConfirm() || $t106_disposaldetail_list->EventCancelled)) {
	$CurrentForm->Index = -1;
	if ($CurrentForm->hasValue($t106_disposaldetail_list->FormKeyCountName) && ($t106_disposaldetail_list->isGridAdd() || $t106_disposaldetail_list->isGridEdit() || $t106_disposaldetail->isConfirm())) {
		$t106_disposaldetail_list->KeyCount = $CurrentForm->getValue($t106_disposaldetail_list->FormKeyCountName);
		$t106_disposaldetail_list->StopRecord = $t106_disposaldetail_list->StartRecord + $t106_disposaldetail_list->KeyCount - 1;
	}
}
$t106_disposaldetail_list->RecordCount = $t106_disposaldetail_list->StartRecord - 1;
if ($t106_disposaldetail_list->Recordset && !$t106_disposaldetail_list->Recordset->EOF) {
	$t106_disposaldetail_list->Recordset->moveFirst();
	$selectLimit = $t106_disposaldetail_list->UseSelectLimit;
	if (!$selectLimit && $t106_disposaldetail_list->StartRecord > 1)
		$t106_disposaldetail_list->Recordset->move($t106_disposaldetail_list->StartRecord - 1);
} elseif (!$t106_disposaldetail->AllowAddDeleteRow && $t106_disposaldetail_list->StopRecord == 0) {
	$t106_disposaldetail_list->StopRecord = $t106_disposaldetail->GridAddRowCount;
}

// Initialize aggregate
$t106_disposaldetail->RowType = ROWTYPE_AGGREGATEINIT;
$t106_disposaldetail->resetAttributes();
$t106_disposaldetail_list->renderRow();
$t106_disposaldetail_list->EditRowCount = 0;
if ($t106_disposaldetail_list->isEdit())
	$t106_disposaldetail_list->RowIndex = 1;
if ($t106_disposaldetail_list->isGridAdd())
	$t106_disposaldetail_list->RowIndex = 0;
if ($t106_disposaldetail_list->isGridEdit())
	$t106_disposaldetail_list->RowIndex = 0;
while ($t106_disposaldetail_list->RecordCount < $t106_disposaldetail_list->StopRecord) {
	$t106_disposaldetail_list->RecordCount++;
	if ($t106_disposaldetail_list->RecordCount >= $t106_disposaldetail_list->StartRecord) {
		$t106_disposaldetail_list->RowCount++;
		if ($t106_disposaldetail_list->isGridAdd() || $t106_disposaldetail_list->isGridEdit() || $t106_disposaldetail->isConfirm()) {
			$t106_disposaldetail_list->RowIndex++;
			$CurrentForm->Index = $t106_disposaldetail_list->RowIndex;
			if ($CurrentForm->hasValue($t106_disposaldetail_list->FormActionName) && ($t106_disposaldetail->isConfirm() || $t106_disposaldetail_list->EventCancelled))
				$t106_disposaldetail_list->RowAction = strval($CurrentForm->getValue($t106_disposaldetail_list->FormActionName));
			elseif ($t106_disposaldetail_list->isGridAdd())
				$t106_disposaldetail_list->RowAction = "insert";
			else
				$t106_disposaldetail_list->RowAction = "";
		}

		// Set up key count
		$t106_disposaldetail_list->KeyCount = $t106_disposaldetail_list->RowIndex;

		// Init row class and style
		$t106_disposaldetail->resetAttributes();
		$t106_disposaldetail->CssClass = "";
		if ($t106_disposaldetail_list->isGridAdd()) {
			$t106_disposaldetail_list->loadRowValues(); // Load default values
		} else {
			$t106_disposaldetail_list->loadRowValues($t106_disposaldetail_list->Recordset); // Load row values
		}
		$t106_disposaldetail->RowType = ROWTYPE_VIEW; // Render view
		if ($t106_disposaldetail_list->isGridAdd()) // Grid add
			$t106_disposaldetail->RowType = ROWTYPE_ADD; // Render add
		if ($t106_disposaldetail_list->isGridAdd() && $t106_disposaldetail->EventCancelled && !$CurrentForm->hasValue("k_blankrow")) // Insert failed
			$t106_disposaldetail_list->restoreCurrentRowFormValues($t106_disposaldetail_list->RowIndex); // Restore form values
		if ($t106_disposaldetail_list->isEdit()) {
			if ($t106_disposaldetail_list->checkInlineEditKey() && $t106_disposaldetail_list->EditRowCount == 0) { // Inline edit
				$t106_disposaldetail->RowType = ROWTYPE_EDIT; // Render edit
			}
		}
		if ($t106_disposaldetail_list->isGridEdit()) { // Grid edit
			if ($t106_disposaldetail->EventCancelled)
				$t106_disposaldetail_list->restoreCurrentRowFormValues($t106_disposaldetail_list->RowIndex); // Restore form values
			if ($t106_disposaldetail_list->RowAction == "insert")
				$t106_disposaldetail->RowType = ROWTYPE_ADD; // Render add
			else
				$t106_disposaldetail->RowType = ROWTYPE_EDIT; // Render edit
		}
		if ($t106_disposaldetail_list->isEdit() && $t106_disposaldetail->RowType == ROWTYPE_EDIT && $t106_disposaldetail->EventCancelled) { // Update failed
			$CurrentForm->Index = 1;
			$t106_disposaldetail_list->restoreFormValues(); // Restore form values
		}
		if ($t106_disposaldetail_list->isGridEdit() && ($t106_disposaldetail->RowType == ROWTYPE_EDIT || $t106_disposaldetail->RowType == ROWTYPE_ADD) && $t106_disposaldetail->EventCancelled) // Update failed
			$t106_disposaldetail_list->restoreCurrentRowFormValues($t106_disposaldetail_list->RowIndex); // Restore form values
		if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) // Edit row
			$t106_disposaldetail_list->EditRowCount++;

		// Set up row id / data-rowindex
		$t106_disposaldetail->RowAttrs->merge(["data-rowindex" => $t106_disposaldetail_list->RowCount, "id" => "r" . $t106_disposaldetail_list->RowCount . "_t106_disposaldetail", "data-rowtype" => $t106_disposaldetail->RowType]);

		// Render row
		$t106_disposaldetail_list->renderRow();

		// Render list options
		$t106_disposaldetail_list->renderListOptions();

		// Skip delete row / empty row for confirm page
		if ($t106_disposaldetail_list->RowAction != "delete" && $t106_disposaldetail_list->RowAction != "insertdelete" && !($t106_disposaldetail_list->RowAction == "insert" && $t106_disposaldetail->isConfirm() && $t106_disposaldetail_list->emptyRow())) {
?>
	<tr <?php echo $t106_disposaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t106_disposaldetail_list->ListOptions->render("body", "left", $t106_disposaldetail_list->RowCount);
?>
	<?php if ($t106_disposaldetail_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t106_disposaldetail_list->asset_id->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_asset_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->asset_id->ReadOnly || $t106_disposaldetail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->asset_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" value="<?php echo $t106_disposaldetail_list->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->asset_id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_asset_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->asset_id->ReadOnly || $t106_disposaldetail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->asset_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" value="<?php echo $t106_disposaldetail_list->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->asset_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_asset_id">
<span<?php echo $t106_disposaldetail_list->asset_id->viewAttributes() ?>><?php echo $t106_disposaldetail_list->asset_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_id" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->id->CurrentValue) ?>">
<input type="hidden" data-table="t106_disposaldetail" data-field="x_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT || $t106_disposaldetail->CurrentMode == "edit") { ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_id" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->id->CurrentValue) ?>">
<?php } ?>
	<?php if ($t106_disposaldetail_list->disposaldate->Visible) { // disposaldate ?>
		<td data-name="disposaldate" <?php echo $t106_disposaldetail_list->disposaldate->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_disposaldate" class="form-group">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposaldate" data-format="7" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t106_disposaldetail_list->disposaldate->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_list->disposaldate->EditValue ?>"<?php echo $t106_disposaldetail_list->disposaldate->editAttributes() ?>>
<?php if (!$t106_disposaldetail_list->disposaldate->ReadOnly && !$t106_disposaldetail_list->disposaldate->Disabled && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["readonly"]) && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft106_disposaldetaillist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft106_disposaldetaillist", "x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposaldate" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" value="<?php echo HtmlEncode($t106_disposaldetail_list->disposaldate->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_disposaldate" class="form-group">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposaldate" data-format="7" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t106_disposaldetail_list->disposaldate->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_list->disposaldate->EditValue ?>"<?php echo $t106_disposaldetail_list->disposaldate->editAttributes() ?>>
<?php if (!$t106_disposaldetail_list->disposaldate->ReadOnly && !$t106_disposaldetail_list->disposaldate->Disabled && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["readonly"]) && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft106_disposaldetaillist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft106_disposaldetaillist", "x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_disposaldate">
<span<?php echo $t106_disposaldetail_list->disposaldate->viewAttributes() ?>><?php echo $t106_disposaldetail_list->disposaldate->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->cond_id->Visible) { // cond_id ?>
		<td data-name="cond_id" <?php echo $t106_disposaldetail_list->cond_id->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_cond_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->cond_id->ReadOnly || $t106_disposaldetail_list->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->cond_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->cond_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" value="<?php echo $t106_disposaldetail_list->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->cond_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->cond_id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_cond_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->cond_id->ReadOnly || $t106_disposaldetail_list->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->cond_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->cond_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" value="<?php echo $t106_disposaldetail_list->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->cond_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_cond_id">
<span<?php echo $t106_disposaldetail_list->cond_id->viewAttributes() ?>><?php echo $t106_disposaldetail_list->cond_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->reason_id->Visible) { // reason_id ?>
		<td data-name="reason_id" <?php echo $t106_disposaldetail_list->reason_id->cellAttributes() ?>>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD) { // Add record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_reason_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->reason_id->ReadOnly || $t106_disposaldetail_list->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->reason_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->reason_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" value="<?php echo $t106_disposaldetail_list->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->reason_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->reason_id->OldValue) ?>">
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_EDIT) { // Edit record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_reason_id" class="form-group">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->reason_id->ReadOnly || $t106_disposaldetail_list->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->reason_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->reason_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" value="<?php echo $t106_disposaldetail_list->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->reason_id->editAttributes() ?>>
</span>
<?php } ?>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_VIEW) { // View record ?>
<span id="el<?php echo $t106_disposaldetail_list->RowCount ?>_t106_disposaldetail_reason_id">
<span<?php echo $t106_disposaldetail_list->reason_id->viewAttributes() ?>><?php echo $t106_disposaldetail_list->reason_id->getViewValue() ?></span>
</span>
<?php } ?>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t106_disposaldetail_list->ListOptions->render("body", "right", $t106_disposaldetail_list->RowCount);
?>
	</tr>
<?php if ($t106_disposaldetail->RowType == ROWTYPE_ADD || $t106_disposaldetail->RowType == ROWTYPE_EDIT) { ?>
<script>
loadjs.ready(["ft106_disposaldetaillist", "load"], function() {
	ft106_disposaldetaillist.updateLists(<?php echo $t106_disposaldetail_list->RowIndex ?>);
});
</script>
<?php } ?>
<?php
	}
	} // End delete row checking
	if (!$t106_disposaldetail_list->isGridAdd())
		if (!$t106_disposaldetail_list->Recordset->EOF)
			$t106_disposaldetail_list->Recordset->moveNext();
}
?>
<?php
	if ($t106_disposaldetail_list->isGridAdd() || $t106_disposaldetail_list->isGridEdit()) {
		$t106_disposaldetail_list->RowIndex = '$rowindex$';
		$t106_disposaldetail_list->loadRowValues();

		// Set row properties
		$t106_disposaldetail->resetAttributes();
		$t106_disposaldetail->RowAttrs->merge(["data-rowindex" => $t106_disposaldetail_list->RowIndex, "id" => "r0_t106_disposaldetail", "data-rowtype" => ROWTYPE_ADD]);
		$t106_disposaldetail->RowAttrs->appendClass("ew-template");
		$t106_disposaldetail->RowType = ROWTYPE_ADD;

		// Render row
		$t106_disposaldetail_list->renderRow();

		// Render list options
		$t106_disposaldetail_list->renderListOptions();
		$t106_disposaldetail_list->StartRowCount = 0;
?>
	<tr <?php echo $t106_disposaldetail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t106_disposaldetail_list->ListOptions->render("body", "left", $t106_disposaldetail_list->RowIndex);
?>
	<?php if ($t106_disposaldetail_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id">
<span id="el$rowindex$_t106_disposaldetail_asset_id" class="form-group t106_disposaldetail_asset_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->asset_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->asset_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->asset_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->asset_id->ReadOnly || $t106_disposaldetail_list->asset_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->asset_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_asset_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->asset_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" value="<?php echo $t106_disposaldetail_list->asset_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->asset_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_asset_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_asset_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->asset_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->disposaldate->Visible) { // disposaldate ?>
		<td data-name="disposaldate">
<span id="el$rowindex$_t106_disposaldetail_disposaldate" class="form-group t106_disposaldetail_disposaldate">
<input type="text" data-table="t106_disposaldetail" data-field="x_disposaldate" data-format="7" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" size="10" maxlength="10" placeholder="<?php echo HtmlEncode($t106_disposaldetail_list->disposaldate->getPlaceHolder()) ?>" value="<?php echo $t106_disposaldetail_list->disposaldate->EditValue ?>"<?php echo $t106_disposaldetail_list->disposaldate->editAttributes() ?>>
<?php if (!$t106_disposaldetail_list->disposaldate->ReadOnly && !$t106_disposaldetail_list->disposaldate->Disabled && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["readonly"]) && !isset($t106_disposaldetail_list->disposaldate->EditAttrs["disabled"])) { ?>
<script>
loadjs.ready(["ft106_disposaldetaillist", "datetimepicker"], function() {
	ew.createDateTimePicker("ft106_disposaldetaillist", "x<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate", {"ignoreReadonly":true,"useCurrent":false,"format":7});
});
</script>
<?php } ?>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_disposaldate" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_disposaldate" value="<?php echo HtmlEncode($t106_disposaldetail_list->disposaldate->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->cond_id->Visible) { // cond_id ?>
		<td data-name="cond_id">
<span id="el$rowindex$_t106_disposaldetail_cond_id" class="form-group t106_disposaldetail_cond_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->cond_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->cond_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->cond_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->cond_id->ReadOnly || $t106_disposaldetail_list->cond_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->cond_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_cond_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->cond_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" value="<?php echo $t106_disposaldetail_list->cond_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->cond_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_cond_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_cond_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->cond_id->OldValue) ?>">
</td>
	<?php } ?>
	<?php if ($t106_disposaldetail_list->reason_id->Visible) { // reason_id ?>
		<td data-name="reason_id">
<span id="el$rowindex$_t106_disposaldetail_reason_id" class="form-group t106_disposaldetail_reason_id">
<div class="input-group ew-lookup-list">
	<div class="form-control ew-lookup-text" tabindex="-1" id="lu_x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id"><?php echo EmptyValue(strval($t106_disposaldetail_list->reason_id->ViewValue)) ? $Language->phrase("PleaseSelect") : $t106_disposaldetail_list->reason_id->ViewValue ?></div>
	<div class="input-group-append">
		<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t106_disposaldetail_list->reason_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" class="ew-lookup-btn btn btn-default"<?php echo ($t106_disposaldetail_list->reason_id->ReadOnly || $t106_disposaldetail_list->reason_id->Disabled) ? " disabled" : "" ?> onclick="ew.modalLookupShow({lnk:this,el:'x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id',m:0,n:10});"><i class="fas fa-search ew-icon"></i></button>
	</div>
</div>
<?php echo $t106_disposaldetail_list->reason_id->Lookup->getParamTag($t106_disposaldetail_list, "p_x" . $t106_disposaldetail_list->RowIndex . "_reason_id") ?>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t106_disposaldetail_list->reason_id->displayValueSeparatorAttribute() ?>" name="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" id="x<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" value="<?php echo $t106_disposaldetail_list->reason_id->CurrentValue ?>"<?php echo $t106_disposaldetail_list->reason_id->editAttributes() ?>>
</span>
<input type="hidden" data-table="t106_disposaldetail" data-field="x_reason_id" name="o<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" id="o<?php echo $t106_disposaldetail_list->RowIndex ?>_reason_id" value="<?php echo HtmlEncode($t106_disposaldetail_list->reason_id->OldValue) ?>">
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t106_disposaldetail_list->ListOptions->render("body", "right", $t106_disposaldetail_list->RowIndex);
?>
<script>
loadjs.ready(["ft106_disposaldetaillist", "load"], function() {
	ft106_disposaldetaillist.updateLists(<?php echo $t106_disposaldetail_list->RowIndex ?>);
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
<?php if ($t106_disposaldetail_list->isAdd() || $t106_disposaldetail_list->isCopy()) { ?>
<input type="hidden" name="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" id="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" value="<?php echo $t106_disposaldetail_list->KeyCount ?>">
<?php } ?>
<?php if ($t106_disposaldetail_list->isGridAdd()) { ?>
<input type="hidden" name="action" id="action" value="gridinsert">
<input type="hidden" name="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" id="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" value="<?php echo $t106_disposaldetail_list->KeyCount ?>">
<?php echo $t106_disposaldetail_list->MultiSelectKey ?>
<?php } ?>
<?php if ($t106_disposaldetail_list->isEdit()) { ?>
<input type="hidden" name="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" id="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" value="<?php echo $t106_disposaldetail_list->KeyCount ?>">
<?php } ?>
<?php if ($t106_disposaldetail_list->isGridEdit()) { ?>
<input type="hidden" name="action" id="action" value="gridupdate">
<input type="hidden" name="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" id="<?php echo $t106_disposaldetail_list->FormKeyCountName ?>" value="<?php echo $t106_disposaldetail_list->KeyCount ?>">
<?php echo $t106_disposaldetail_list->MultiSelectKey ?>
<?php } ?>
<?php if (!$t106_disposaldetail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t106_disposaldetail_list->Recordset)
	$t106_disposaldetail_list->Recordset->Close();
?>
<?php if (!$t106_disposaldetail_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t106_disposaldetail_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t106_disposaldetail_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t106_disposaldetail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t106_disposaldetail_list->TotalRecords == 0 && !$t106_disposaldetail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t106_disposaldetail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t106_disposaldetail_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t106_disposaldetail_list->isExport()) { ?>
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
$t106_disposaldetail_list->terminate();
?>