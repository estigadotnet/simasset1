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
$t105_disposalhead_list = new t105_disposalhead_list();

// Run the page
$t105_disposalhead_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t105_disposalhead_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t105_disposalhead_list->isExport()) { ?>
<script>
var ft105_disposalheadlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft105_disposalheadlist = currentForm = new ew.Form("ft105_disposalheadlist", "list");
	ft105_disposalheadlist.formKeyCountName = '<?php echo $t105_disposalhead_list->FormKeyCountName ?>';
	loadjs.done("ft105_disposalheadlist");
});
var ft105_disposalheadlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft105_disposalheadlistsrch = currentSearchForm = new ew.Form("ft105_disposalheadlistsrch");

	// Dynamic selection lists
	// Filters

	ft105_disposalheadlistsrch.filterList = <?php echo $t105_disposalhead_list->getFilterList() ?>;
	loadjs.done("ft105_disposalheadlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t105_disposalhead_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t105_disposalhead_list->TotalRecords > 0 && $t105_disposalhead_list->ExportOptions->visible()) { ?>
<?php $t105_disposalhead_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t105_disposalhead_list->ImportOptions->visible()) { ?>
<?php $t105_disposalhead_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t105_disposalhead_list->SearchOptions->visible()) { ?>
<?php $t105_disposalhead_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t105_disposalhead_list->FilterOptions->visible()) { ?>
<?php $t105_disposalhead_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t105_disposalhead_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$t105_disposalhead_list->isExport() && !$t105_disposalhead->CurrentAction) { ?>
<form name="ft105_disposalheadlistsrch" id="ft105_disposalheadlistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="ft105_disposalheadlistsrch-search-panel" class="<?php echo $t105_disposalhead_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="t105_disposalhead">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $t105_disposalhead_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($t105_disposalhead_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($t105_disposalhead_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $t105_disposalhead_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($t105_disposalhead_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($t105_disposalhead_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($t105_disposalhead_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($t105_disposalhead_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $t105_disposalhead_list->showPageHeader(); ?>
<?php
$t105_disposalhead_list->showMessage();
?>
<?php if ($t105_disposalhead_list->TotalRecords > 0 || $t105_disposalhead->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t105_disposalhead_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t105_disposalhead">
<form name="ft105_disposalheadlist" id="ft105_disposalheadlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t105_disposalhead">
<div id="gmp_t105_disposalhead" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t105_disposalhead_list->TotalRecords > 0 || $t105_disposalhead_list->isGridEdit()) { ?>
<table id="tbl_t105_disposalheadlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t105_disposalhead->RowType = ROWTYPE_HEADER;

// Render list options
$t105_disposalhead_list->renderListOptions();

// Render list options (header, left)
$t105_disposalhead_list->ListOptions->render("header", "left");
?>
<?php if ($t105_disposalhead_list->id->Visible) { // id ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $t105_disposalhead_list->id->headerCellClass() ?>"><div id="elh_t105_disposalhead_id" class="t105_disposalhead_id"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t105_disposalhead_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->id) ?>', 2);"><div id="elh_t105_disposalhead_id" class="t105_disposalhead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->property_id->Visible) { // property_id ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->property_id) == "") { ?>
		<th data-name="property_id" class="<?php echo $t105_disposalhead_list->property_id->headerCellClass() ?>"><div id="elh_t105_disposalhead_property_id" class="t105_disposalhead_property_id"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->property_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property_id" class="<?php echo $t105_disposalhead_list->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->property_id) ?>', 2);"><div id="elh_t105_disposalhead_property_id" class="t105_disposalhead_property_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->TransactionNo->Visible) { // TransactionNo ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->TransactionNo) == "") { ?>
		<th data-name="TransactionNo" class="<?php echo $t105_disposalhead_list->TransactionNo->headerCellClass() ?>"><div id="elh_t105_disposalhead_TransactionNo" class="t105_disposalhead_TransactionNo"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->TransactionNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionNo" class="<?php echo $t105_disposalhead_list->TransactionNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->TransactionNo) ?>', 2);"><div id="elh_t105_disposalhead_TransactionNo" class="t105_disposalhead_TransactionNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->TransactionNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->TransactionNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->TransactionNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->RecommendedBy->Visible) { // RecommendedBy ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->RecommendedBy) == "") { ?>
		<th data-name="RecommendedBy" class="<?php echo $t105_disposalhead_list->RecommendedBy->headerCellClass() ?>"><div id="elh_t105_disposalhead_RecommendedBy" class="t105_disposalhead_RecommendedBy"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->RecommendedBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="RecommendedBy" class="<?php echo $t105_disposalhead_list->RecommendedBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->RecommendedBy) ?>', 2);"><div id="elh_t105_disposalhead_RecommendedBy" class="t105_disposalhead_RecommendedBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->RecommendedBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->RecommendedBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->RecommendedBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->CE->Visible) { // CE ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->CE) == "") { ?>
		<th data-name="CE" class="<?php echo $t105_disposalhead_list->CE->headerCellClass() ?>"><div id="elh_t105_disposalhead_CE" class="t105_disposalhead_CE"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->CE->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CE" class="<?php echo $t105_disposalhead_list->CE->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->CE) ?>', 2);"><div id="elh_t105_disposalhead_CE" class="t105_disposalhead_CE">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->CE->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->CE->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->CE->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->ITM->Visible) { // ITM ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->ITM) == "") { ?>
		<th data-name="ITM" class="<?php echo $t105_disposalhead_list->ITM->headerCellClass() ?>"><div id="elh_t105_disposalhead_ITM" class="t105_disposalhead_ITM"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->ITM->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ITM" class="<?php echo $t105_disposalhead_list->ITM->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->ITM) ?>', 2);"><div id="elh_t105_disposalhead_ITM" class="t105_disposalhead_ITM">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->ITM->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->ITM->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->ITM->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->Sign1->Visible) { // Sign1 ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->Sign1) == "") { ?>
		<th data-name="Sign1" class="<?php echo $t105_disposalhead_list->Sign1->headerCellClass() ?>"><div id="elh_t105_disposalhead_Sign1" class="t105_disposalhead_Sign1"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->Sign1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign1" class="<?php echo $t105_disposalhead_list->Sign1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->Sign1) ?>', 2);"><div id="elh_t105_disposalhead_Sign1" class="t105_disposalhead_Sign1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->Sign1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->Sign1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->Sign1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->Sign2->Visible) { // Sign2 ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->Sign2) == "") { ?>
		<th data-name="Sign2" class="<?php echo $t105_disposalhead_list->Sign2->headerCellClass() ?>"><div id="elh_t105_disposalhead_Sign2" class="t105_disposalhead_Sign2"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->Sign2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign2" class="<?php echo $t105_disposalhead_list->Sign2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->Sign2) ?>', 2);"><div id="elh_t105_disposalhead_Sign2" class="t105_disposalhead_Sign2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->Sign2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->Sign2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->Sign2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t105_disposalhead_list->Sign3->Visible) { // Sign3 ?>
	<?php if ($t105_disposalhead_list->SortUrl($t105_disposalhead_list->Sign3) == "") { ?>
		<th data-name="Sign3" class="<?php echo $t105_disposalhead_list->Sign3->headerCellClass() ?>"><div id="elh_t105_disposalhead_Sign3" class="t105_disposalhead_Sign3"><div class="ew-table-header-caption"><?php echo $t105_disposalhead_list->Sign3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign3" class="<?php echo $t105_disposalhead_list->Sign3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t105_disposalhead_list->SortUrl($t105_disposalhead_list->Sign3) ?>', 2);"><div id="elh_t105_disposalhead_Sign3" class="t105_disposalhead_Sign3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t105_disposalhead_list->Sign3->caption() ?></span><span class="ew-table-header-sort"><?php if ($t105_disposalhead_list->Sign3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t105_disposalhead_list->Sign3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t105_disposalhead_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t105_disposalhead_list->ExportAll && $t105_disposalhead_list->isExport()) {
	$t105_disposalhead_list->StopRecord = $t105_disposalhead_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t105_disposalhead_list->TotalRecords > $t105_disposalhead_list->StartRecord + $t105_disposalhead_list->DisplayRecords - 1)
		$t105_disposalhead_list->StopRecord = $t105_disposalhead_list->StartRecord + $t105_disposalhead_list->DisplayRecords - 1;
	else
		$t105_disposalhead_list->StopRecord = $t105_disposalhead_list->TotalRecords;
}
$t105_disposalhead_list->RecordCount = $t105_disposalhead_list->StartRecord - 1;
if ($t105_disposalhead_list->Recordset && !$t105_disposalhead_list->Recordset->EOF) {
	$t105_disposalhead_list->Recordset->moveFirst();
	$selectLimit = $t105_disposalhead_list->UseSelectLimit;
	if (!$selectLimit && $t105_disposalhead_list->StartRecord > 1)
		$t105_disposalhead_list->Recordset->move($t105_disposalhead_list->StartRecord - 1);
} elseif (!$t105_disposalhead->AllowAddDeleteRow && $t105_disposalhead_list->StopRecord == 0) {
	$t105_disposalhead_list->StopRecord = $t105_disposalhead->GridAddRowCount;
}

// Initialize aggregate
$t105_disposalhead->RowType = ROWTYPE_AGGREGATEINIT;
$t105_disposalhead->resetAttributes();
$t105_disposalhead_list->renderRow();
while ($t105_disposalhead_list->RecordCount < $t105_disposalhead_list->StopRecord) {
	$t105_disposalhead_list->RecordCount++;
	if ($t105_disposalhead_list->RecordCount >= $t105_disposalhead_list->StartRecord) {
		$t105_disposalhead_list->RowCount++;

		// Set up key count
		$t105_disposalhead_list->KeyCount = $t105_disposalhead_list->RowIndex;

		// Init row class and style
		$t105_disposalhead->resetAttributes();
		$t105_disposalhead->CssClass = "";
		if ($t105_disposalhead_list->isGridAdd()) {
		} else {
			$t105_disposalhead_list->loadRowValues($t105_disposalhead_list->Recordset); // Load row values
		}
		$t105_disposalhead->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t105_disposalhead->RowAttrs->merge(["data-rowindex" => $t105_disposalhead_list->RowCount, "id" => "r" . $t105_disposalhead_list->RowCount . "_t105_disposalhead", "data-rowtype" => $t105_disposalhead->RowType]);

		// Render row
		$t105_disposalhead_list->renderRow();

		// Render list options
		$t105_disposalhead_list->renderListOptions();
?>
	<tr <?php echo $t105_disposalhead->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t105_disposalhead_list->ListOptions->render("body", "left", $t105_disposalhead_list->RowCount);
?>
	<?php if ($t105_disposalhead_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $t105_disposalhead_list->id->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_id">
<span<?php echo $t105_disposalhead_list->id->viewAttributes() ?>><?php echo $t105_disposalhead_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id" <?php echo $t105_disposalhead_list->property_id->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_property_id">
<span<?php echo $t105_disposalhead_list->property_id->viewAttributes() ?>><?php echo $t105_disposalhead_list->property_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->TransactionNo->Visible) { // TransactionNo ?>
		<td data-name="TransactionNo" <?php echo $t105_disposalhead_list->TransactionNo->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_TransactionNo">
<span<?php echo $t105_disposalhead_list->TransactionNo->viewAttributes() ?>><?php echo $t105_disposalhead_list->TransactionNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->RecommendedBy->Visible) { // RecommendedBy ?>
		<td data-name="RecommendedBy" <?php echo $t105_disposalhead_list->RecommendedBy->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_RecommendedBy">
<span<?php echo $t105_disposalhead_list->RecommendedBy->viewAttributes() ?>><?php echo $t105_disposalhead_list->RecommendedBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->CE->Visible) { // CE ?>
		<td data-name="CE" <?php echo $t105_disposalhead_list->CE->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_CE">
<span<?php echo $t105_disposalhead_list->CE->viewAttributes() ?>><?php echo $t105_disposalhead_list->CE->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->ITM->Visible) { // ITM ?>
		<td data-name="ITM" <?php echo $t105_disposalhead_list->ITM->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_ITM">
<span<?php echo $t105_disposalhead_list->ITM->viewAttributes() ?>><?php echo $t105_disposalhead_list->ITM->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->Sign1->Visible) { // Sign1 ?>
		<td data-name="Sign1" <?php echo $t105_disposalhead_list->Sign1->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_Sign1">
<span<?php echo $t105_disposalhead_list->Sign1->viewAttributes() ?>><?php echo $t105_disposalhead_list->Sign1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->Sign2->Visible) { // Sign2 ?>
		<td data-name="Sign2" <?php echo $t105_disposalhead_list->Sign2->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_Sign2">
<span<?php echo $t105_disposalhead_list->Sign2->viewAttributes() ?>><?php echo $t105_disposalhead_list->Sign2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t105_disposalhead_list->Sign3->Visible) { // Sign3 ?>
		<td data-name="Sign3" <?php echo $t105_disposalhead_list->Sign3->cellAttributes() ?>>
<span id="el<?php echo $t105_disposalhead_list->RowCount ?>_t105_disposalhead_Sign3">
<span<?php echo $t105_disposalhead_list->Sign3->viewAttributes() ?>><?php echo $t105_disposalhead_list->Sign3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t105_disposalhead_list->ListOptions->render("body", "right", $t105_disposalhead_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t105_disposalhead_list->isGridAdd())
		$t105_disposalhead_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t105_disposalhead->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t105_disposalhead_list->Recordset)
	$t105_disposalhead_list->Recordset->Close();
?>
<?php if (!$t105_disposalhead_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t105_disposalhead_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t105_disposalhead_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t105_disposalhead_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t105_disposalhead_list->TotalRecords == 0 && !$t105_disposalhead->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t105_disposalhead_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t105_disposalhead_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t105_disposalhead_list->isExport()) { ?>
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
$t105_disposalhead_list->terminate();
?>