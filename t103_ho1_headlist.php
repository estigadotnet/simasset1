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
$t103_ho1_head_list = new t103_ho1_head_list();

// Run the page
$t103_ho1_head_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t103_ho1_head_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t103_ho1_head_list->isExport()) { ?>
<script>
var ft103_ho1_headlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft103_ho1_headlist = currentForm = new ew.Form("ft103_ho1_headlist", "list");
	ft103_ho1_headlist.formKeyCountName = '<?php echo $t103_ho1_head_list->FormKeyCountName ?>';
	loadjs.done("ft103_ho1_headlist");
});
var ft103_ho1_headlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft103_ho1_headlistsrch = currentSearchForm = new ew.Form("ft103_ho1_headlistsrch");

	// Dynamic selection lists
	// Filters

	ft103_ho1_headlistsrch.filterList = <?php echo $t103_ho1_head_list->getFilterList() ?>;
	loadjs.done("ft103_ho1_headlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t103_ho1_head_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t103_ho1_head_list->TotalRecords > 0 && $t103_ho1_head_list->ExportOptions->visible()) { ?>
<?php $t103_ho1_head_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t103_ho1_head_list->ImportOptions->visible()) { ?>
<?php $t103_ho1_head_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t103_ho1_head_list->SearchOptions->visible()) { ?>
<?php $t103_ho1_head_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t103_ho1_head_list->FilterOptions->visible()) { ?>
<?php $t103_ho1_head_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t103_ho1_head_list->renderOtherOptions();
?>
<?php $t103_ho1_head_list->showPageHeader(); ?>
<?php
$t103_ho1_head_list->showMessage();
?>
<?php if ($t103_ho1_head_list->TotalRecords > 0 || $t103_ho1_head->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t103_ho1_head_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t103_ho1_head">
<form name="ft103_ho1_headlist" id="ft103_ho1_headlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t103_ho1_head">
<div id="gmp_t103_ho1_head" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t103_ho1_head_list->TotalRecords > 0 || $t103_ho1_head_list->isGridEdit()) { ?>
<table id="tbl_t103_ho1_headlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t103_ho1_head->RowType = ROWTYPE_HEADER;

// Render list options
$t103_ho1_head_list->renderListOptions();

// Render list options (header, left)
$t103_ho1_head_list->ListOptions->render("header", "left");
?>
<?php if ($t103_ho1_head_list->ho_head->Visible) { // ho_head ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->ho_head) == "") { ?>
		<th data-name="ho_head" class="<?php echo $t103_ho1_head_list->ho_head->headerCellClass() ?>"><div id="elh_t103_ho1_head_ho_head" class="t103_ho1_head_ho_head"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->ho_head->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ho_head" class="<?php echo $t103_ho1_head_list->ho_head->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->ho_head) ?>', 2);"><div id="elh_t103_ho1_head_ho_head" class="t103_ho1_head_ho_head">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->ho_head->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->ho_head->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->ho_head->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->TransactionNo->Visible) { // TransactionNo ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->TransactionNo) == "") { ?>
		<th data-name="TransactionNo" class="<?php echo $t103_ho1_head_list->TransactionNo->headerCellClass() ?>"><div id="elh_t103_ho1_head_TransactionNo" class="t103_ho1_head_TransactionNo"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->TransactionNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionNo" class="<?php echo $t103_ho1_head_list->TransactionNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->TransactionNo) ?>', 2);"><div id="elh_t103_ho1_head_TransactionNo" class="t103_ho1_head_TransactionNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->TransactionNo->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->TransactionNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->TransactionNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->TransactionDate->Visible) { // TransactionDate ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->TransactionDate) == "") { ?>
		<th data-name="TransactionDate" class="<?php echo $t103_ho1_head_list->TransactionDate->headerCellClass() ?>"><div id="elh_t103_ho1_head_TransactionDate" class="t103_ho1_head_TransactionDate"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->TransactionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionDate" class="<?php echo $t103_ho1_head_list->TransactionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->TransactionDate) ?>', 2);"><div id="elh_t103_ho1_head_TransactionDate" class="t103_ho1_head_TransactionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->TransactionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->TransactionDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->TransactionDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->TransactionType->Visible) { // TransactionType ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->TransactionType) == "") { ?>
		<th data-name="TransactionType" class="<?php echo $t103_ho1_head_list->TransactionType->headerCellClass() ?>"><div id="elh_t103_ho1_head_TransactionType" class="t103_ho1_head_TransactionType"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->TransactionType->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionType" class="<?php echo $t103_ho1_head_list->TransactionType->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->TransactionType) ?>', 2);"><div id="elh_t103_ho1_head_TransactionType" class="t103_ho1_head_TransactionType">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->TransactionType->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->TransactionType->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->TransactionType->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->HandedOverTo->Visible) { // HandedOverTo ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->HandedOverTo) == "") { ?>
		<th data-name="HandedOverTo" class="<?php echo $t103_ho1_head_list->HandedOverTo->headerCellClass() ?>"><div id="elh_t103_ho1_head_HandedOverTo" class="t103_ho1_head_HandedOverTo"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->HandedOverTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HandedOverTo" class="<?php echo $t103_ho1_head_list->HandedOverTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->HandedOverTo) ?>', 2);"><div id="elh_t103_ho1_head_HandedOverTo" class="t103_ho1_head_HandedOverTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->HandedOverTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->HandedOverTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->HandedOverTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->CodeNoTo->Visible) { // CodeNoTo ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->CodeNoTo) == "") { ?>
		<th data-name="CodeNoTo" class="<?php echo $t103_ho1_head_list->CodeNoTo->headerCellClass() ?>"><div id="elh_t103_ho1_head_CodeNoTo" class="t103_ho1_head_CodeNoTo"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->CodeNoTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="CodeNoTo" class="<?php echo $t103_ho1_head_list->CodeNoTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->CodeNoTo) ?>', 2);"><div id="elh_t103_ho1_head_CodeNoTo" class="t103_ho1_head_CodeNoTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->CodeNoTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->CodeNoTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->CodeNoTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->DepartmentTo->Visible) { // DepartmentTo ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->DepartmentTo) == "") { ?>
		<th data-name="DepartmentTo" class="<?php echo $t103_ho1_head_list->DepartmentTo->headerCellClass() ?>"><div id="elh_t103_ho1_head_DepartmentTo" class="t103_ho1_head_DepartmentTo"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->DepartmentTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepartmentTo" class="<?php echo $t103_ho1_head_list->DepartmentTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->DepartmentTo) ?>', 2);"><div id="elh_t103_ho1_head_DepartmentTo" class="t103_ho1_head_DepartmentTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->DepartmentTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->DepartmentTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->DepartmentTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->Sign1->Visible) { // Sign1 ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign1) == "") { ?>
		<th data-name="Sign1" class="<?php echo $t103_ho1_head_list->Sign1->headerCellClass() ?>"><div id="elh_t103_ho1_head_Sign1" class="t103_ho1_head_Sign1"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign1" class="<?php echo $t103_ho1_head_list->Sign1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign1) ?>', 2);"><div id="elh_t103_ho1_head_Sign1" class="t103_ho1_head_Sign1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign1->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->Sign1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->Sign1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->Sign2->Visible) { // Sign2 ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign2) == "") { ?>
		<th data-name="Sign2" class="<?php echo $t103_ho1_head_list->Sign2->headerCellClass() ?>"><div id="elh_t103_ho1_head_Sign2" class="t103_ho1_head_Sign2"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign2" class="<?php echo $t103_ho1_head_list->Sign2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign2) ?>', 2);"><div id="elh_t103_ho1_head_Sign2" class="t103_ho1_head_Sign2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign2->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->Sign2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->Sign2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->Sign3->Visible) { // Sign3 ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign3) == "") { ?>
		<th data-name="Sign3" class="<?php echo $t103_ho1_head_list->Sign3->headerCellClass() ?>"><div id="elh_t103_ho1_head_Sign3" class="t103_ho1_head_Sign3"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign3" class="<?php echo $t103_ho1_head_list->Sign3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign3) ?>', 2);"><div id="elh_t103_ho1_head_Sign3" class="t103_ho1_head_Sign3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign3->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->Sign3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->Sign3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t103_ho1_head_list->Sign4->Visible) { // Sign4 ?>
	<?php if ($t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign4) == "") { ?>
		<th data-name="Sign4" class="<?php echo $t103_ho1_head_list->Sign4->headerCellClass() ?>"><div id="elh_t103_ho1_head_Sign4" class="t103_ho1_head_Sign4"><div class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign4" class="<?php echo $t103_ho1_head_list->Sign4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t103_ho1_head_list->SortUrl($t103_ho1_head_list->Sign4) ?>', 2);"><div id="elh_t103_ho1_head_Sign4" class="t103_ho1_head_Sign4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t103_ho1_head_list->Sign4->caption() ?></span><span class="ew-table-header-sort"><?php if ($t103_ho1_head_list->Sign4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t103_ho1_head_list->Sign4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t103_ho1_head_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t103_ho1_head_list->ExportAll && $t103_ho1_head_list->isExport()) {
	$t103_ho1_head_list->StopRecord = $t103_ho1_head_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t103_ho1_head_list->TotalRecords > $t103_ho1_head_list->StartRecord + $t103_ho1_head_list->DisplayRecords - 1)
		$t103_ho1_head_list->StopRecord = $t103_ho1_head_list->StartRecord + $t103_ho1_head_list->DisplayRecords - 1;
	else
		$t103_ho1_head_list->StopRecord = $t103_ho1_head_list->TotalRecords;
}
$t103_ho1_head_list->RecordCount = $t103_ho1_head_list->StartRecord - 1;
if ($t103_ho1_head_list->Recordset && !$t103_ho1_head_list->Recordset->EOF) {
	$t103_ho1_head_list->Recordset->moveFirst();
	$selectLimit = $t103_ho1_head_list->UseSelectLimit;
	if (!$selectLimit && $t103_ho1_head_list->StartRecord > 1)
		$t103_ho1_head_list->Recordset->move($t103_ho1_head_list->StartRecord - 1);
} elseif (!$t103_ho1_head->AllowAddDeleteRow && $t103_ho1_head_list->StopRecord == 0) {
	$t103_ho1_head_list->StopRecord = $t103_ho1_head->GridAddRowCount;
}

// Initialize aggregate
$t103_ho1_head->RowType = ROWTYPE_AGGREGATEINIT;
$t103_ho1_head->resetAttributes();
$t103_ho1_head_list->renderRow();
while ($t103_ho1_head_list->RecordCount < $t103_ho1_head_list->StopRecord) {
	$t103_ho1_head_list->RecordCount++;
	if ($t103_ho1_head_list->RecordCount >= $t103_ho1_head_list->StartRecord) {
		$t103_ho1_head_list->RowCount++;

		// Set up key count
		$t103_ho1_head_list->KeyCount = $t103_ho1_head_list->RowIndex;

		// Init row class and style
		$t103_ho1_head->resetAttributes();
		$t103_ho1_head->CssClass = "";
		if ($t103_ho1_head_list->isGridAdd()) {
		} else {
			$t103_ho1_head_list->loadRowValues($t103_ho1_head_list->Recordset); // Load row values
		}
		$t103_ho1_head->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t103_ho1_head->RowAttrs->merge(["data-rowindex" => $t103_ho1_head_list->RowCount, "id" => "r" . $t103_ho1_head_list->RowCount . "_t103_ho1_head", "data-rowtype" => $t103_ho1_head->RowType]);

		// Render row
		$t103_ho1_head_list->renderRow();

		// Render list options
		$t103_ho1_head_list->renderListOptions();
?>
	<tr <?php echo $t103_ho1_head->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t103_ho1_head_list->ListOptions->render("body", "left", $t103_ho1_head_list->RowCount);
?>
	<?php if ($t103_ho1_head_list->ho_head->Visible) { // ho_head ?>
		<td data-name="ho_head" <?php echo $t103_ho1_head_list->ho_head->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_ho_head">
<span<?php echo $t103_ho1_head_list->ho_head->viewAttributes() ?>><?php echo $t103_ho1_head_list->ho_head->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->TransactionNo->Visible) { // TransactionNo ?>
		<td data-name="TransactionNo" <?php echo $t103_ho1_head_list->TransactionNo->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_TransactionNo">
<span<?php echo $t103_ho1_head_list->TransactionNo->viewAttributes() ?>><?php echo $t103_ho1_head_list->TransactionNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->TransactionDate->Visible) { // TransactionDate ?>
		<td data-name="TransactionDate" <?php echo $t103_ho1_head_list->TransactionDate->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_TransactionDate">
<span<?php echo $t103_ho1_head_list->TransactionDate->viewAttributes() ?>><?php echo $t103_ho1_head_list->TransactionDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->TransactionType->Visible) { // TransactionType ?>
		<td data-name="TransactionType" <?php echo $t103_ho1_head_list->TransactionType->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_TransactionType">
<span<?php echo $t103_ho1_head_list->TransactionType->viewAttributes() ?>><?php echo $t103_ho1_head_list->TransactionType->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->HandedOverTo->Visible) { // HandedOverTo ?>
		<td data-name="HandedOverTo" <?php echo $t103_ho1_head_list->HandedOverTo->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_HandedOverTo">
<span<?php echo $t103_ho1_head_list->HandedOverTo->viewAttributes() ?>><?php echo $t103_ho1_head_list->HandedOverTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->CodeNoTo->Visible) { // CodeNoTo ?>
		<td data-name="CodeNoTo" <?php echo $t103_ho1_head_list->CodeNoTo->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_CodeNoTo">
<span<?php echo $t103_ho1_head_list->CodeNoTo->viewAttributes() ?>><?php echo $t103_ho1_head_list->CodeNoTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->DepartmentTo->Visible) { // DepartmentTo ?>
		<td data-name="DepartmentTo" <?php echo $t103_ho1_head_list->DepartmentTo->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_DepartmentTo">
<span<?php echo $t103_ho1_head_list->DepartmentTo->viewAttributes() ?>><?php echo $t103_ho1_head_list->DepartmentTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->Sign1->Visible) { // Sign1 ?>
		<td data-name="Sign1" <?php echo $t103_ho1_head_list->Sign1->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_Sign1">
<span<?php echo $t103_ho1_head_list->Sign1->viewAttributes() ?>><?php echo $t103_ho1_head_list->Sign1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->Sign2->Visible) { // Sign2 ?>
		<td data-name="Sign2" <?php echo $t103_ho1_head_list->Sign2->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_Sign2">
<span<?php echo $t103_ho1_head_list->Sign2->viewAttributes() ?>><?php echo $t103_ho1_head_list->Sign2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->Sign3->Visible) { // Sign3 ?>
		<td data-name="Sign3" <?php echo $t103_ho1_head_list->Sign3->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_Sign3">
<span<?php echo $t103_ho1_head_list->Sign3->viewAttributes() ?>><?php echo $t103_ho1_head_list->Sign3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t103_ho1_head_list->Sign4->Visible) { // Sign4 ?>
		<td data-name="Sign4" <?php echo $t103_ho1_head_list->Sign4->cellAttributes() ?>>
<span id="el<?php echo $t103_ho1_head_list->RowCount ?>_t103_ho1_head_Sign4">
<span<?php echo $t103_ho1_head_list->Sign4->viewAttributes() ?>><?php echo $t103_ho1_head_list->Sign4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t103_ho1_head_list->ListOptions->render("body", "right", $t103_ho1_head_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t103_ho1_head_list->isGridAdd())
		$t103_ho1_head_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t103_ho1_head->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t103_ho1_head_list->Recordset)
	$t103_ho1_head_list->Recordset->Close();
?>
<?php if (!$t103_ho1_head_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t103_ho1_head_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t103_ho1_head_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t103_ho1_head_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t103_ho1_head_list->TotalRecords == 0 && !$t103_ho1_head->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t103_ho1_head_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t103_ho1_head_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t103_ho1_head_list->isExport()) { ?>
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
$t103_ho1_head_list->terminate();
?>