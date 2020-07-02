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
$v104_assetglobal_list = new v104_assetglobal_list();

// Run the page
$v104_assetglobal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v104_assetglobal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v104_assetglobal_list->isExport()) { ?>
<script>
var fv104_assetgloballist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv104_assetgloballist = currentForm = new ew.Form("fv104_assetgloballist", "list");
	fv104_assetgloballist.formKeyCountName = '<?php echo $v104_assetglobal_list->FormKeyCountName ?>';
	loadjs.done("fv104_assetgloballist");
});
var fv104_assetgloballistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv104_assetgloballistsrch = currentSearchForm = new ew.Form("fv104_assetgloballistsrch");

	// Dynamic selection lists
	// Filters

	fv104_assetgloballistsrch.filterList = <?php echo $v104_assetglobal_list->getFilterList() ?>;
	loadjs.done("fv104_assetgloballistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v104_assetglobal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v104_assetglobal_list->TotalRecords > 0 && $v104_assetglobal_list->ExportOptions->visible()) { ?>
<?php $v104_assetglobal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v104_assetglobal_list->ImportOptions->visible()) { ?>
<?php $v104_assetglobal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v104_assetglobal_list->SearchOptions->visible()) { ?>
<?php $v104_assetglobal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v104_assetglobal_list->FilterOptions->visible()) { ?>
<?php $v104_assetglobal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v104_assetglobal_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v104_assetglobal_list->isExport() && !$v104_assetglobal->CurrentAction) { ?>
<form name="fv104_assetgloballistsrch" id="fv104_assetgloballistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv104_assetgloballistsrch-search-panel" class="<?php echo $v104_assetglobal_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v104_assetglobal">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v104_assetglobal_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v104_assetglobal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v104_assetglobal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v104_assetglobal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v104_assetglobal_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v104_assetglobal_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v104_assetglobal_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v104_assetglobal_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v104_assetglobal_list->showPageHeader(); ?>
<?php
$v104_assetglobal_list->showMessage();
?>
<?php if ($v104_assetglobal_list->TotalRecords > 0 || $v104_assetglobal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v104_assetglobal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v104_assetglobal">
<form name="fv104_assetgloballist" id="fv104_assetgloballist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v104_assetglobal">
<div id="gmp_v104_assetglobal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v104_assetglobal_list->TotalRecords > 0 || $v104_assetglobal_list->isGridEdit()) { ?>
<table id="tbl_v104_assetgloballist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v104_assetglobal->RowType = ROWTYPE_HEADER;

// Render list options
$v104_assetglobal_list->renderListOptions();

// Render list options (header, left)
$v104_assetglobal_list->ListOptions->render("header", "left");
?>
<?php if ($v104_assetglobal_list->groupDescription->Visible) { // groupDescription ?>
	<?php if ($v104_assetglobal_list->SortUrl($v104_assetglobal_list->groupDescription) == "") { ?>
		<th data-name="groupDescription" class="<?php echo $v104_assetglobal_list->groupDescription->headerCellClass() ?>"><div id="elh_v104_assetglobal_groupDescription" class="v104_assetglobal_groupDescription"><div class="ew-table-header-caption"><?php echo $v104_assetglobal_list->groupDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="groupDescription" class="<?php echo $v104_assetglobal_list->groupDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v104_assetglobal_list->SortUrl($v104_assetglobal_list->groupDescription) ?>', 2);"><div id="elh_v104_assetglobal_groupDescription" class="v104_assetglobal_groupDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v104_assetglobal_list->groupDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v104_assetglobal_list->groupDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v104_assetglobal_list->groupDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v104_assetglobal_list->typeDescription->Visible) { // typeDescription ?>
	<?php if ($v104_assetglobal_list->SortUrl($v104_assetglobal_list->typeDescription) == "") { ?>
		<th data-name="typeDescription" class="<?php echo $v104_assetglobal_list->typeDescription->headerCellClass() ?>"><div id="elh_v104_assetglobal_typeDescription" class="v104_assetglobal_typeDescription"><div class="ew-table-header-caption"><?php echo $v104_assetglobal_list->typeDescription->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="typeDescription" class="<?php echo $v104_assetglobal_list->typeDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v104_assetglobal_list->SortUrl($v104_assetglobal_list->typeDescription) ?>', 2);"><div id="elh_v104_assetglobal_typeDescription" class="v104_assetglobal_typeDescription">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v104_assetglobal_list->typeDescription->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v104_assetglobal_list->typeDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v104_assetglobal_list->typeDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v104_assetglobal_list->bookValue2Label->Visible) { // bookValue2Label ?>
	<?php if ($v104_assetglobal_list->SortUrl($v104_assetglobal_list->bookValue2Label) == "") { ?>
		<th data-name="bookValue2Label" class="<?php echo $v104_assetglobal_list->bookValue2Label->headerCellClass() ?>"><div id="elh_v104_assetglobal_bookValue2Label" class="v104_assetglobal_bookValue2Label"><div class="ew-table-header-caption"><?php echo $v104_assetglobal_list->bookValue2Label->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bookValue2Label" class="<?php echo $v104_assetglobal_list->bookValue2Label->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v104_assetglobal_list->SortUrl($v104_assetglobal_list->bookValue2Label) ?>', 2);"><div id="elh_v104_assetglobal_bookValue2Label" class="v104_assetglobal_bookValue2Label">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v104_assetglobal_list->bookValue2Label->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v104_assetglobal_list->bookValue2Label->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v104_assetglobal_list->bookValue2Label->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v104_assetglobal_list->bookValue2->Visible) { // bookValue2 ?>
	<?php if ($v104_assetglobal_list->SortUrl($v104_assetglobal_list->bookValue2) == "") { ?>
		<th data-name="bookValue2" class="<?php echo $v104_assetglobal_list->bookValue2->headerCellClass() ?>"><div id="elh_v104_assetglobal_bookValue2" class="v104_assetglobal_bookValue2"><div class="ew-table-header-caption"><?php echo $v104_assetglobal_list->bookValue2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="bookValue2" class="<?php echo $v104_assetglobal_list->bookValue2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v104_assetglobal_list->SortUrl($v104_assetglobal_list->bookValue2) ?>', 2);"><div id="elh_v104_assetglobal_bookValue2" class="v104_assetglobal_bookValue2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v104_assetglobal_list->bookValue2->caption() ?></span><span class="ew-table-header-sort"><?php if ($v104_assetglobal_list->bookValue2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v104_assetglobal_list->bookValue2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v104_assetglobal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v104_assetglobal_list->ExportAll && $v104_assetglobal_list->isExport()) {
	$v104_assetglobal_list->StopRecord = $v104_assetglobal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v104_assetglobal_list->TotalRecords > $v104_assetglobal_list->StartRecord + $v104_assetglobal_list->DisplayRecords - 1)
		$v104_assetglobal_list->StopRecord = $v104_assetglobal_list->StartRecord + $v104_assetglobal_list->DisplayRecords - 1;
	else
		$v104_assetglobal_list->StopRecord = $v104_assetglobal_list->TotalRecords;
}
$v104_assetglobal_list->RecordCount = $v104_assetglobal_list->StartRecord - 1;
if ($v104_assetglobal_list->Recordset && !$v104_assetglobal_list->Recordset->EOF) {
	$v104_assetglobal_list->Recordset->moveFirst();
	$selectLimit = $v104_assetglobal_list->UseSelectLimit;
	if (!$selectLimit && $v104_assetglobal_list->StartRecord > 1)
		$v104_assetglobal_list->Recordset->move($v104_assetglobal_list->StartRecord - 1);
} elseif (!$v104_assetglobal->AllowAddDeleteRow && $v104_assetglobal_list->StopRecord == 0) {
	$v104_assetglobal_list->StopRecord = $v104_assetglobal->GridAddRowCount;
}

// Initialize aggregate
$v104_assetglobal->RowType = ROWTYPE_AGGREGATEINIT;
$v104_assetglobal->resetAttributes();
$v104_assetglobal_list->renderRow();
while ($v104_assetglobal_list->RecordCount < $v104_assetglobal_list->StopRecord) {
	$v104_assetglobal_list->RecordCount++;
	if ($v104_assetglobal_list->RecordCount >= $v104_assetglobal_list->StartRecord) {
		$v104_assetglobal_list->RowCount++;

		// Set up key count
		$v104_assetglobal_list->KeyCount = $v104_assetglobal_list->RowIndex;

		// Init row class and style
		$v104_assetglobal->resetAttributes();
		$v104_assetglobal->CssClass = "";
		if ($v104_assetglobal_list->isGridAdd()) {
		} else {
			$v104_assetglobal_list->loadRowValues($v104_assetglobal_list->Recordset); // Load row values
		}
		$v104_assetglobal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v104_assetglobal->RowAttrs->merge(["data-rowindex" => $v104_assetglobal_list->RowCount, "id" => "r" . $v104_assetglobal_list->RowCount . "_v104_assetglobal", "data-rowtype" => $v104_assetglobal->RowType]);

		// Render row
		$v104_assetglobal_list->renderRow();

		// Render list options
		$v104_assetglobal_list->renderListOptions();
?>
	<tr <?php echo $v104_assetglobal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v104_assetglobal_list->ListOptions->render("body", "left", $v104_assetglobal_list->RowCount);
?>
	<?php if ($v104_assetglobal_list->groupDescription->Visible) { // groupDescription ?>
		<td data-name="groupDescription" <?php echo $v104_assetglobal_list->groupDescription->cellAttributes() ?>>
<span id="el<?php echo $v104_assetglobal_list->RowCount ?>_v104_assetglobal_groupDescription">
<span<?php echo $v104_assetglobal_list->groupDescription->viewAttributes() ?>><?php echo $v104_assetglobal_list->groupDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v104_assetglobal_list->typeDescription->Visible) { // typeDescription ?>
		<td data-name="typeDescription" <?php echo $v104_assetglobal_list->typeDescription->cellAttributes() ?>>
<span id="el<?php echo $v104_assetglobal_list->RowCount ?>_v104_assetglobal_typeDescription">
<span<?php echo $v104_assetglobal_list->typeDescription->viewAttributes() ?>><?php echo $v104_assetglobal_list->typeDescription->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v104_assetglobal_list->bookValue2Label->Visible) { // bookValue2Label ?>
		<td data-name="bookValue2Label" <?php echo $v104_assetglobal_list->bookValue2Label->cellAttributes() ?>>
<span id="el<?php echo $v104_assetglobal_list->RowCount ?>_v104_assetglobal_bookValue2Label">
<span<?php echo $v104_assetglobal_list->bookValue2Label->viewAttributes() ?>><?php echo $v104_assetglobal_list->bookValue2Label->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v104_assetglobal_list->bookValue2->Visible) { // bookValue2 ?>
		<td data-name="bookValue2" <?php echo $v104_assetglobal_list->bookValue2->cellAttributes() ?>>
<span id="el<?php echo $v104_assetglobal_list->RowCount ?>_v104_assetglobal_bookValue2">
<span<?php echo $v104_assetglobal_list->bookValue2->viewAttributes() ?>><?php echo $v104_assetglobal_list->bookValue2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v104_assetglobal_list->ListOptions->render("body", "right", $v104_assetglobal_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v104_assetglobal_list->isGridAdd())
		$v104_assetglobal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v104_assetglobal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v104_assetglobal_list->Recordset)
	$v104_assetglobal_list->Recordset->Close();
?>
<?php if (!$v104_assetglobal_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v104_assetglobal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v104_assetglobal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v104_assetglobal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v104_assetglobal_list->TotalRecords == 0 && !$v104_assetglobal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v104_assetglobal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v104_assetglobal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v104_assetglobal_list->isExport()) { ?>
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
$v104_assetglobal_list->terminate();
?>