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
$t006_assetdepreciation_list = new t006_assetdepreciation_list();

// Run the page
$t006_assetdepreciation_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t006_assetdepreciation_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t006_assetdepreciation_list->isExport()) { ?>
<script>
var ft006_assetdepreciationlist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft006_assetdepreciationlist = currentForm = new ew.Form("ft006_assetdepreciationlist", "list");
	ft006_assetdepreciationlist.formKeyCountName = '<?php echo $t006_assetdepreciation_list->FormKeyCountName ?>';
	loadjs.done("ft006_assetdepreciationlist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t006_assetdepreciation_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t006_assetdepreciation_list->TotalRecords > 0 && $t006_assetdepreciation_list->ExportOptions->visible()) { ?>
<?php $t006_assetdepreciation_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t006_assetdepreciation_list->ImportOptions->visible()) { ?>
<?php $t006_assetdepreciation_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t006_assetdepreciation_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t006_assetdepreciation_list->isExport("print")) { ?>
<?php
if ($t006_assetdepreciation_list->DbMasterFilter != "" && $t006_assetdepreciation->getCurrentMasterTable() == "t004_asset") {
	if ($t006_assetdepreciation_list->MasterRecordExists) {
		include_once "t004_assetmaster.php";
	}
}
?>
<?php } ?>
<?php
$t006_assetdepreciation_list->renderOtherOptions();
?>
<?php $t006_assetdepreciation_list->showPageHeader(); ?>
<?php
$t006_assetdepreciation_list->showMessage();
?>
<?php if ($t006_assetdepreciation_list->TotalRecords > 0 || $t006_assetdepreciation->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t006_assetdepreciation_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t006_assetdepreciation">
<form name="ft006_assetdepreciationlist" id="ft006_assetdepreciationlist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t006_assetdepreciation">
<?php if ($t006_assetdepreciation->getCurrentMasterTable() == "t004_asset" && $t006_assetdepreciation->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t004_asset">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t006_assetdepreciation_list->asset_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_t006_assetdepreciation" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t006_assetdepreciation_list->TotalRecords > 0 || $t006_assetdepreciation_list->isGridEdit()) { ?>
<table id="tbl_t006_assetdepreciationlist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t006_assetdepreciation->RowType = ROWTYPE_HEADER;

// Render list options
$t006_assetdepreciation_list->renderListOptions();

// Render list options (header, left)
$t006_assetdepreciation_list->ListOptions->render("header", "left");
?>
<?php if ($t006_assetdepreciation_list->asset_id->Visible) { // asset_id ?>
	<?php if ($t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t006_assetdepreciation_list->asset_id->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_asset_id" class="t006_assetdepreciation_asset_id"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t006_assetdepreciation_list->asset_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->asset_id) ?>', 2);"><div id="elh_t006_assetdepreciation_asset_id" class="t006_assetdepreciation_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_list->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_list->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_list->ListOfYears->Visible) { // ListOfYears ?>
	<?php if ($t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->ListOfYears) == "") { ?>
		<th data-name="ListOfYears" class="<?php echo $t006_assetdepreciation_list->ListOfYears->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_ListOfYears" class="t006_assetdepreciation_ListOfYears"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->ListOfYears->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ListOfYears" class="<?php echo $t006_assetdepreciation_list->ListOfYears->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->ListOfYears) ?>', 2);"><div id="elh_t006_assetdepreciation_ListOfYears" class="t006_assetdepreciation_ListOfYears">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->ListOfYears->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_list->ListOfYears->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_list->ListOfYears->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_list->NumberOfMonths->Visible) { // NumberOfMonths ?>
	<?php if ($t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->NumberOfMonths) == "") { ?>
		<th data-name="NumberOfMonths" class="<?php echo $t006_assetdepreciation_list->NumberOfMonths->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_NumberOfMonths" class="t006_assetdepreciation_NumberOfMonths"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->NumberOfMonths->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NumberOfMonths" class="<?php echo $t006_assetdepreciation_list->NumberOfMonths->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->NumberOfMonths) ?>', 2);"><div id="elh_t006_assetdepreciation_NumberOfMonths" class="t006_assetdepreciation_NumberOfMonths">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->NumberOfMonths->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_list->NumberOfMonths->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_list->NumberOfMonths->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_list->DepreciationAmount->Visible) { // DepreciationAmount ?>
	<?php if ($t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->DepreciationAmount) == "") { ?>
		<th data-name="DepreciationAmount" class="<?php echo $t006_assetdepreciation_list->DepreciationAmount->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_DepreciationAmount" class="t006_assetdepreciation_DepreciationAmount"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->DepreciationAmount->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepreciationAmount" class="<?php echo $t006_assetdepreciation_list->DepreciationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->DepreciationAmount) ?>', 2);"><div id="elh_t006_assetdepreciation_DepreciationAmount" class="t006_assetdepreciation_DepreciationAmount">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->DepreciationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_list->DepreciationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_list->DepreciationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_list->DepreciationYtd->Visible) { // DepreciationYtd ?>
	<?php if ($t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->DepreciationYtd) == "") { ?>
		<th data-name="DepreciationYtd" class="<?php echo $t006_assetdepreciation_list->DepreciationYtd->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_DepreciationYtd" class="t006_assetdepreciation_DepreciationYtd"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->DepreciationYtd->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepreciationYtd" class="<?php echo $t006_assetdepreciation_list->DepreciationYtd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->DepreciationYtd) ?>', 2);"><div id="elh_t006_assetdepreciation_DepreciationYtd" class="t006_assetdepreciation_DepreciationYtd">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->DepreciationYtd->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_list->DepreciationYtd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_list->DepreciationYtd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t006_assetdepreciation_list->NetBookValue->Visible) { // NetBookValue ?>
	<?php if ($t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->NetBookValue) == "") { ?>
		<th data-name="NetBookValue" class="<?php echo $t006_assetdepreciation_list->NetBookValue->headerCellClass() ?>"><div id="elh_t006_assetdepreciation_NetBookValue" class="t006_assetdepreciation_NetBookValue"><div class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->NetBookValue->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="NetBookValue" class="<?php echo $t006_assetdepreciation_list->NetBookValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t006_assetdepreciation_list->SortUrl($t006_assetdepreciation_list->NetBookValue) ?>', 2);"><div id="elh_t006_assetdepreciation_NetBookValue" class="t006_assetdepreciation_NetBookValue">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t006_assetdepreciation_list->NetBookValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($t006_assetdepreciation_list->NetBookValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t006_assetdepreciation_list->NetBookValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t006_assetdepreciation_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t006_assetdepreciation_list->ExportAll && $t006_assetdepreciation_list->isExport()) {
	$t006_assetdepreciation_list->StopRecord = $t006_assetdepreciation_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t006_assetdepreciation_list->TotalRecords > $t006_assetdepreciation_list->StartRecord + $t006_assetdepreciation_list->DisplayRecords - 1)
		$t006_assetdepreciation_list->StopRecord = $t006_assetdepreciation_list->StartRecord + $t006_assetdepreciation_list->DisplayRecords - 1;
	else
		$t006_assetdepreciation_list->StopRecord = $t006_assetdepreciation_list->TotalRecords;
}
$t006_assetdepreciation_list->RecordCount = $t006_assetdepreciation_list->StartRecord - 1;
if ($t006_assetdepreciation_list->Recordset && !$t006_assetdepreciation_list->Recordset->EOF) {
	$t006_assetdepreciation_list->Recordset->moveFirst();
	$selectLimit = $t006_assetdepreciation_list->UseSelectLimit;
	if (!$selectLimit && $t006_assetdepreciation_list->StartRecord > 1)
		$t006_assetdepreciation_list->Recordset->move($t006_assetdepreciation_list->StartRecord - 1);
} elseif (!$t006_assetdepreciation->AllowAddDeleteRow && $t006_assetdepreciation_list->StopRecord == 0) {
	$t006_assetdepreciation_list->StopRecord = $t006_assetdepreciation->GridAddRowCount;
}

// Initialize aggregate
$t006_assetdepreciation->RowType = ROWTYPE_AGGREGATEINIT;
$t006_assetdepreciation->resetAttributes();
$t006_assetdepreciation_list->renderRow();
while ($t006_assetdepreciation_list->RecordCount < $t006_assetdepreciation_list->StopRecord) {
	$t006_assetdepreciation_list->RecordCount++;
	if ($t006_assetdepreciation_list->RecordCount >= $t006_assetdepreciation_list->StartRecord) {
		$t006_assetdepreciation_list->RowCount++;

		// Set up key count
		$t006_assetdepreciation_list->KeyCount = $t006_assetdepreciation_list->RowIndex;

		// Init row class and style
		$t006_assetdepreciation->resetAttributes();
		$t006_assetdepreciation->CssClass = "";
		if ($t006_assetdepreciation_list->isGridAdd()) {
		} else {
			$t006_assetdepreciation_list->loadRowValues($t006_assetdepreciation_list->Recordset); // Load row values
		}
		$t006_assetdepreciation->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t006_assetdepreciation->RowAttrs->merge(["data-rowindex" => $t006_assetdepreciation_list->RowCount, "id" => "r" . $t006_assetdepreciation_list->RowCount . "_t006_assetdepreciation", "data-rowtype" => $t006_assetdepreciation->RowType]);

		// Render row
		$t006_assetdepreciation_list->renderRow();

		// Render list options
		$t006_assetdepreciation_list->renderListOptions();
?>
	<tr <?php echo $t006_assetdepreciation->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t006_assetdepreciation_list->ListOptions->render("body", "left", $t006_assetdepreciation_list->RowCount);
?>
	<?php if ($t006_assetdepreciation_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t006_assetdepreciation_list->asset_id->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_list->RowCount ?>_t006_assetdepreciation_asset_id">
<span<?php echo $t006_assetdepreciation_list->asset_id->viewAttributes() ?>><?php echo $t006_assetdepreciation_list->asset_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_list->ListOfYears->Visible) { // ListOfYears ?>
		<td data-name="ListOfYears" <?php echo $t006_assetdepreciation_list->ListOfYears->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_list->RowCount ?>_t006_assetdepreciation_ListOfYears">
<span<?php echo $t006_assetdepreciation_list->ListOfYears->viewAttributes() ?>><?php echo $t006_assetdepreciation_list->ListOfYears->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_list->NumberOfMonths->Visible) { // NumberOfMonths ?>
		<td data-name="NumberOfMonths" <?php echo $t006_assetdepreciation_list->NumberOfMonths->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_list->RowCount ?>_t006_assetdepreciation_NumberOfMonths">
<span<?php echo $t006_assetdepreciation_list->NumberOfMonths->viewAttributes() ?>><?php echo $t006_assetdepreciation_list->NumberOfMonths->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_list->DepreciationAmount->Visible) { // DepreciationAmount ?>
		<td data-name="DepreciationAmount" <?php echo $t006_assetdepreciation_list->DepreciationAmount->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_list->RowCount ?>_t006_assetdepreciation_DepreciationAmount">
<span<?php echo $t006_assetdepreciation_list->DepreciationAmount->viewAttributes() ?>><?php echo $t006_assetdepreciation_list->DepreciationAmount->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_list->DepreciationYtd->Visible) { // DepreciationYtd ?>
		<td data-name="DepreciationYtd" <?php echo $t006_assetdepreciation_list->DepreciationYtd->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_list->RowCount ?>_t006_assetdepreciation_DepreciationYtd">
<span<?php echo $t006_assetdepreciation_list->DepreciationYtd->viewAttributes() ?>><?php echo $t006_assetdepreciation_list->DepreciationYtd->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t006_assetdepreciation_list->NetBookValue->Visible) { // NetBookValue ?>
		<td data-name="NetBookValue" <?php echo $t006_assetdepreciation_list->NetBookValue->cellAttributes() ?>>
<span id="el<?php echo $t006_assetdepreciation_list->RowCount ?>_t006_assetdepreciation_NetBookValue">
<span<?php echo $t006_assetdepreciation_list->NetBookValue->viewAttributes() ?>><?php echo $t006_assetdepreciation_list->NetBookValue->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t006_assetdepreciation_list->ListOptions->render("body", "right", $t006_assetdepreciation_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t006_assetdepreciation_list->isGridAdd())
		$t006_assetdepreciation_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t006_assetdepreciation->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t006_assetdepreciation_list->Recordset)
	$t006_assetdepreciation_list->Recordset->Close();
?>
<?php if (!$t006_assetdepreciation_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t006_assetdepreciation_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t006_assetdepreciation_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t006_assetdepreciation_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t006_assetdepreciation_list->TotalRecords == 0 && !$t006_assetdepreciation->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t006_assetdepreciation_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t006_assetdepreciation_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t006_assetdepreciation_list->isExport()) { ?>
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
$t006_assetdepreciation_list->terminate();
?>