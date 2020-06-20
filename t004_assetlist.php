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
$t004_asset_list = new t004_asset_list();

// Run the page
$t004_asset_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t004_asset_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t004_asset_list->isExport()) { ?>
<script>
var ft004_assetlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft004_assetlist = currentForm = new ew.Form("ft004_assetlist", "list");
	ft004_assetlist.formKeyCountName = '<?php echo $t004_asset_list->FormKeyCountName ?>';
	loadjs.done("ft004_assetlist");
});
var ft004_assetlistsrch;
loadjs.ready("head", function() {

	// Form object for search
	ft004_assetlistsrch = currentSearchForm = new ew.Form("ft004_assetlistsrch");

	// Dynamic selection lists
	// Filters

	ft004_assetlistsrch.filterList = <?php echo $t004_asset_list->getFilterList() ?>;
	loadjs.done("ft004_assetlistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t004_asset_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t004_asset_list->TotalRecords > 0 && $t004_asset_list->ExportOptions->visible()) { ?>
<?php $t004_asset_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->ImportOptions->visible()) { ?>
<?php $t004_asset_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->SearchOptions->visible()) { ?>
<?php $t004_asset_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($t004_asset_list->FilterOptions->visible()) { ?>
<?php $t004_asset_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$t004_asset_list->renderOtherOptions();
?>
<?php $t004_asset_list->showPageHeader(); ?>
<?php
$t004_asset_list->showMessage();
?>
<?php if ($t004_asset_list->TotalRecords > 0 || $t004_asset->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t004_asset_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t004_asset">
<form name="ft004_assetlist" id="ft004_assetlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t004_asset">
<div id="gmp_t004_asset" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t004_asset_list->TotalRecords > 0 || $t004_asset_list->isGridEdit()) { ?>
<table id="tbl_t004_assetlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t004_asset->RowType = ROWTYPE_HEADER;

// Render list options
$t004_asset_list->renderListOptions();

// Render list options (header, left)
$t004_asset_list->ListOptions->render("header", "left");
?>
<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->property_id) == "") { ?>
		<th data-name="property_id" class="<?php echo $t004_asset_list->property_id->headerCellClass() ?>"><div id="elh_t004_asset_property_id" class="t004_asset_property_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->property_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property_id" class="<?php echo $t004_asset_list->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->property_id) ?>', 2);"><div id="elh_t004_asset_property_id" class="t004_asset_property_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->department_id->Visible) { // department_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->department_id) == "") { ?>
		<th data-name="department_id" class="<?php echo $t004_asset_list->department_id->headerCellClass() ?>"><div id="elh_t004_asset_department_id" class="t004_asset_department_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->department_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department_id" class="<?php echo $t004_asset_list->department_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->department_id) ?>', 2);"><div id="elh_t004_asset_department_id" class="t004_asset_department_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->department_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->department_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->department_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->signature_id) == "") { ?>
		<th data-name="signature_id" class="<?php echo $t004_asset_list->signature_id->headerCellClass() ?>"><div id="elh_t004_asset_signature_id" class="t004_asset_signature_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->signature_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signature_id" class="<?php echo $t004_asset_list->signature_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->signature_id) ?>', 2);"><div id="elh_t004_asset_signature_id" class="t004_asset_signature_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->signature_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->signature_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->signature_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Code->Visible) { // Code ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $t004_asset_list->Code->headerCellClass() ?>"><div id="elh_t004_asset_Code" class="t004_asset_Code"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $t004_asset_list->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Code) ?>', 2);"><div id="elh_t004_asset_Code" class="t004_asset_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Code->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Description->Visible) { // Description ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Description) == "") { ?>
		<th data-name="Description" class="<?php echo $t004_asset_list->Description->headerCellClass() ?>"><div id="elh_t004_asset_Description" class="t004_asset_Description"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Description" class="<?php echo $t004_asset_list->Description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Description) ?>', 2);"><div id="elh_t004_asset_Description" class="t004_asset_Description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Description->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->group_id->Visible) { // group_id ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->group_id) == "") { ?>
		<th data-name="group_id" class="<?php echo $t004_asset_list->group_id->headerCellClass() ?>"><div id="elh_t004_asset_group_id" class="t004_asset_group_id"><div class="ew-table-header-caption"><?php echo $t004_asset_list->group_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="group_id" class="<?php echo $t004_asset_list->group_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->group_id) ?>', 2);"><div id="elh_t004_asset_group_id" class="t004_asset_group_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->group_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->group_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->group_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->ProcurementDate->Visible) { // ProcurementDate ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->ProcurementDate) == "") { ?>
		<th data-name="ProcurementDate" class="<?php echo $t004_asset_list->ProcurementDate->headerCellClass() ?>"><div id="elh_t004_asset_ProcurementDate" class="t004_asset_ProcurementDate"><div class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcurementDate" class="<?php echo $t004_asset_list->ProcurementDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->ProcurementDate) ?>', 2);"><div id="elh_t004_asset_ProcurementDate" class="t004_asset_ProcurementDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->ProcurementDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->ProcurementDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->ProcurementCurrentCost) == "") { ?>
		<th data-name="ProcurementCurrentCost" class="<?php echo $t004_asset_list->ProcurementCurrentCost->headerCellClass() ?>"><div id="elh_t004_asset_ProcurementCurrentCost" class="t004_asset_ProcurementCurrentCost"><div class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementCurrentCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcurementCurrentCost" class="<?php echo $t004_asset_list->ProcurementCurrentCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->ProcurementCurrentCost) ?>', 2);"><div id="elh_t004_asset_ProcurementCurrentCost" class="t004_asset_ProcurementCurrentCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->ProcurementCurrentCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->ProcurementCurrentCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->ProcurementCurrentCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Salvage->Visible) { // Salvage ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Salvage) == "") { ?>
		<th data-name="Salvage" class="<?php echo $t004_asset_list->Salvage->headerCellClass() ?>"><div id="elh_t004_asset_Salvage" class="t004_asset_Salvage"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Salvage->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Salvage" class="<?php echo $t004_asset_list->Salvage->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Salvage) ?>', 2);"><div id="elh_t004_asset_Salvage" class="t004_asset_Salvage">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Salvage->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Salvage->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Salvage->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Qty) == "") { ?>
		<th data-name="Qty" class="<?php echo $t004_asset_list->Qty->headerCellClass() ?>"><div id="elh_t004_asset_Qty" class="t004_asset_Qty"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Qty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Qty" class="<?php echo $t004_asset_list->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Qty) ?>', 2);"><div id="elh_t004_asset_Qty" class="t004_asset_Qty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->Remarks->Visible) { // Remarks ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->Remarks) == "") { ?>
		<th data-name="Remarks" class="<?php echo $t004_asset_list->Remarks->headerCellClass() ?>"><div id="elh_t004_asset_Remarks" class="t004_asset_Remarks"><div class="ew-table-header-caption"><?php echo $t004_asset_list->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Remarks" class="<?php echo $t004_asset_list->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->Remarks) ?>', 2);"><div id="elh_t004_asset_Remarks" class="t004_asset_Remarks">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->PeriodBegin->Visible) { // PeriodBegin ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->PeriodBegin) == "") { ?>
		<th data-name="PeriodBegin" class="<?php echo $t004_asset_list->PeriodBegin->headerCellClass() ?>"><div id="elh_t004_asset_PeriodBegin" class="t004_asset_PeriodBegin"><div class="ew-table-header-caption"><?php echo $t004_asset_list->PeriodBegin->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PeriodBegin" class="<?php echo $t004_asset_list->PeriodBegin->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->PeriodBegin) ?>', 2);"><div id="elh_t004_asset_PeriodBegin" class="t004_asset_PeriodBegin">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->PeriodBegin->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->PeriodBegin->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->PeriodBegin->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t004_asset_list->PeriodEnd->Visible) { // PeriodEnd ?>
	<?php if ($t004_asset_list->SortUrl($t004_asset_list->PeriodEnd) == "") { ?>
		<th data-name="PeriodEnd" class="<?php echo $t004_asset_list->PeriodEnd->headerCellClass() ?>"><div id="elh_t004_asset_PeriodEnd" class="t004_asset_PeriodEnd"><div class="ew-table-header-caption"><?php echo $t004_asset_list->PeriodEnd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="PeriodEnd" class="<?php echo $t004_asset_list->PeriodEnd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t004_asset_list->SortUrl($t004_asset_list->PeriodEnd) ?>', 2);"><div id="elh_t004_asset_PeriodEnd" class="t004_asset_PeriodEnd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t004_asset_list->PeriodEnd->caption() ?></span><span class="ew-table-header-sort"><?php if ($t004_asset_list->PeriodEnd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t004_asset_list->PeriodEnd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t004_asset_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t004_asset_list->ExportAll && $t004_asset_list->isExport()) {
	$t004_asset_list->StopRecord = $t004_asset_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t004_asset_list->TotalRecords > $t004_asset_list->StartRecord + $t004_asset_list->DisplayRecords - 1)
		$t004_asset_list->StopRecord = $t004_asset_list->StartRecord + $t004_asset_list->DisplayRecords - 1;
	else
		$t004_asset_list->StopRecord = $t004_asset_list->TotalRecords;
}
$t004_asset_list->RecordCount = $t004_asset_list->StartRecord - 1;
if ($t004_asset_list->Recordset && !$t004_asset_list->Recordset->EOF) {
	$t004_asset_list->Recordset->moveFirst();
	$selectLimit = $t004_asset_list->UseSelectLimit;
	if (!$selectLimit && $t004_asset_list->StartRecord > 1)
		$t004_asset_list->Recordset->move($t004_asset_list->StartRecord - 1);
} elseif (!$t004_asset->AllowAddDeleteRow && $t004_asset_list->StopRecord == 0) {
	$t004_asset_list->StopRecord = $t004_asset->GridAddRowCount;
}

// Initialize aggregate
$t004_asset->RowType = ROWTYPE_AGGREGATEINIT;
$t004_asset->resetAttributes();
$t004_asset_list->renderRow();
while ($t004_asset_list->RecordCount < $t004_asset_list->StopRecord) {
	$t004_asset_list->RecordCount++;
	if ($t004_asset_list->RecordCount >= $t004_asset_list->StartRecord) {
		$t004_asset_list->RowCount++;

		// Set up key count
		$t004_asset_list->KeyCount = $t004_asset_list->RowIndex;

		// Init row class and style
		$t004_asset->resetAttributes();
		$t004_asset->CssClass = "";
		if ($t004_asset_list->isGridAdd()) {
		} else {
			$t004_asset_list->loadRowValues($t004_asset_list->Recordset); // Load row values
		}
		$t004_asset->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t004_asset->RowAttrs->merge(["data-rowindex" => $t004_asset_list->RowCount, "id" => "r" . $t004_asset_list->RowCount . "_t004_asset", "data-rowtype" => $t004_asset->RowType]);

		// Render row
		$t004_asset_list->renderRow();

		// Render list options
		$t004_asset_list->renderListOptions();
?>
	<tr <?php echo $t004_asset->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t004_asset_list->ListOptions->render("body", "left", $t004_asset_list->RowCount);
?>
	<?php if ($t004_asset_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id" <?php echo $t004_asset_list->property_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_property_id">
<span<?php echo $t004_asset_list->property_id->viewAttributes() ?>><?php echo $t004_asset_list->property_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->department_id->Visible) { // department_id ?>
		<td data-name="department_id" <?php echo $t004_asset_list->department_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_department_id">
<span<?php echo $t004_asset_list->department_id->viewAttributes() ?>><?php echo $t004_asset_list->department_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->signature_id->Visible) { // signature_id ?>
		<td data-name="signature_id" <?php echo $t004_asset_list->signature_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_signature_id">
<span<?php echo $t004_asset_list->signature_id->viewAttributes() ?>><?php echo $t004_asset_list->signature_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Code->Visible) { // Code ?>
		<td data-name="Code" <?php echo $t004_asset_list->Code->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Code">
<span<?php echo $t004_asset_list->Code->viewAttributes() ?>><?php echo $t004_asset_list->Code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Description->Visible) { // Description ?>
		<td data-name="Description" <?php echo $t004_asset_list->Description->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Description">
<span<?php echo $t004_asset_list->Description->viewAttributes() ?>><?php echo $t004_asset_list->Description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->group_id->Visible) { // group_id ?>
		<td data-name="group_id" <?php echo $t004_asset_list->group_id->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_group_id">
<span<?php echo $t004_asset_list->group_id->viewAttributes() ?>><?php echo $t004_asset_list->group_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->ProcurementDate->Visible) { // ProcurementDate ?>
		<td data-name="ProcurementDate" <?php echo $t004_asset_list->ProcurementDate->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementDate">
<span<?php echo $t004_asset_list->ProcurementDate->viewAttributes() ?>><?php echo $t004_asset_list->ProcurementDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
		<td data-name="ProcurementCurrentCost" <?php echo $t004_asset_list->ProcurementCurrentCost->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_ProcurementCurrentCost">
<span<?php echo $t004_asset_list->ProcurementCurrentCost->viewAttributes() ?>><?php echo $t004_asset_list->ProcurementCurrentCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Salvage->Visible) { // Salvage ?>
		<td data-name="Salvage" <?php echo $t004_asset_list->Salvage->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Salvage">
<span<?php echo $t004_asset_list->Salvage->viewAttributes() ?>><?php echo $t004_asset_list->Salvage->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty" <?php echo $t004_asset_list->Qty->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Qty">
<span<?php echo $t004_asset_list->Qty->viewAttributes() ?>><?php echo $t004_asset_list->Qty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->Remarks->Visible) { // Remarks ?>
		<td data-name="Remarks" <?php echo $t004_asset_list->Remarks->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_Remarks">
<span<?php echo $t004_asset_list->Remarks->viewAttributes() ?>><?php echo $t004_asset_list->Remarks->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->PeriodBegin->Visible) { // PeriodBegin ?>
		<td data-name="PeriodBegin" <?php echo $t004_asset_list->PeriodBegin->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_PeriodBegin">
<span<?php echo $t004_asset_list->PeriodBegin->viewAttributes() ?>><?php echo $t004_asset_list->PeriodBegin->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t004_asset_list->PeriodEnd->Visible) { // PeriodEnd ?>
		<td data-name="PeriodEnd" <?php echo $t004_asset_list->PeriodEnd->cellAttributes() ?>>
<span id="el<?php echo $t004_asset_list->RowCount ?>_t004_asset_PeriodEnd">
<span<?php echo $t004_asset_list->PeriodEnd->viewAttributes() ?>><?php echo $t004_asset_list->PeriodEnd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t004_asset_list->ListOptions->render("body", "right", $t004_asset_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t004_asset_list->isGridAdd())
		$t004_asset_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t004_asset->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t004_asset_list->Recordset)
	$t004_asset_list->Recordset->Close();
?>
<?php if (!$t004_asset_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t004_asset_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t004_asset_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t004_asset_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t004_asset_list->TotalRecords == 0 && !$t004_asset->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t004_asset_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t004_asset_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t004_asset_list->isExport()) { ?>
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
$t004_asset_list->terminate();
?>