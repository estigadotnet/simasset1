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
$t104_ho1_detail_list = new t104_ho1_detail_list();

// Run the page
$t104_ho1_detail_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t104_ho1_detail_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$t104_ho1_detail_list->isExport()) { ?>
<script>
var ft104_ho1_detaillist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	ft104_ho1_detaillist = currentForm = new ew.Form("ft104_ho1_detaillist", "list");
	ft104_ho1_detaillist.formKeyCountName = '<?php echo $t104_ho1_detail_list->FormKeyCountName ?>';
	loadjs.done("ft104_ho1_detaillist");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$t104_ho1_detail_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($t104_ho1_detail_list->TotalRecords > 0 && $t104_ho1_detail_list->ExportOptions->visible()) { ?>
<?php $t104_ho1_detail_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($t104_ho1_detail_list->ImportOptions->visible()) { ?>
<?php $t104_ho1_detail_list->ImportOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if (!$t104_ho1_detail_list->isExport() || Config("EXPORT_MASTER_RECORD") && $t104_ho1_detail_list->isExport("print")) { ?>
<?php
if ($t104_ho1_detail_list->DbMasterFilter != "" && $t104_ho1_detail->getCurrentMasterTable() == "t103_ho1_head") {
	if ($t104_ho1_detail_list->MasterRecordExists) {
		include_once "t103_ho1_headmaster.php";
	}
}
?>
<?php } ?>
<?php
$t104_ho1_detail_list->renderOtherOptions();
?>
<?php $t104_ho1_detail_list->showPageHeader(); ?>
<?php
$t104_ho1_detail_list->showMessage();
?>
<?php if ($t104_ho1_detail_list->TotalRecords > 0 || $t104_ho1_detail->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($t104_ho1_detail_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> t104_ho1_detail">
<form name="ft104_ho1_detaillist" id="ft104_ho1_detaillist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t104_ho1_detail">
<?php if ($t104_ho1_detail->getCurrentMasterTable() == "t103_ho1_head" && $t104_ho1_detail->CurrentAction) { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t103_ho1_head">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t104_ho1_detail_list->hohead_id->getSessionValue()) ?>">
<?php } ?>
<div id="gmp_t104_ho1_detail" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($t104_ho1_detail_list->TotalRecords > 0 || $t104_ho1_detail_list->isGridEdit()) { ?>
<table id="tbl_t104_ho1_detaillist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$t104_ho1_detail->RowType = ROWTYPE_HEADER;

// Render list options
$t104_ho1_detail_list->renderListOptions();

// Render list options (header, left)
$t104_ho1_detail_list->ListOptions->render("header", "left");
?>
<?php if ($t104_ho1_detail_list->id->Visible) { // id ?>
	<?php if ($t104_ho1_detail_list->SortUrl($t104_ho1_detail_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $t104_ho1_detail_list->id->headerCellClass() ?>"><div id="elh_t104_ho1_detail_id" class="t104_ho1_detail_id"><div class="ew-table-header-caption"><?php echo $t104_ho1_detail_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $t104_ho1_detail_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t104_ho1_detail_list->SortUrl($t104_ho1_detail_list->id) ?>', 2);"><div id="elh_t104_ho1_detail_id" class="t104_ho1_detail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t104_ho1_detail_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t104_ho1_detail_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t104_ho1_detail_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t104_ho1_detail_list->hohead_id->Visible) { // hohead_id ?>
	<?php if ($t104_ho1_detail_list->SortUrl($t104_ho1_detail_list->hohead_id) == "") { ?>
		<th data-name="hohead_id" class="<?php echo $t104_ho1_detail_list->hohead_id->headerCellClass() ?>"><div id="elh_t104_ho1_detail_hohead_id" class="t104_ho1_detail_hohead_id"><div class="ew-table-header-caption"><?php echo $t104_ho1_detail_list->hohead_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hohead_id" class="<?php echo $t104_ho1_detail_list->hohead_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t104_ho1_detail_list->SortUrl($t104_ho1_detail_list->hohead_id) ?>', 2);"><div id="elh_t104_ho1_detail_hohead_id" class="t104_ho1_detail_hohead_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t104_ho1_detail_list->hohead_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t104_ho1_detail_list->hohead_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t104_ho1_detail_list->hohead_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($t104_ho1_detail_list->asset_id->Visible) { // asset_id ?>
	<?php if ($t104_ho1_detail_list->SortUrl($t104_ho1_detail_list->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $t104_ho1_detail_list->asset_id->headerCellClass() ?>"><div id="elh_t104_ho1_detail_asset_id" class="t104_ho1_detail_asset_id"><div class="ew-table-header-caption"><?php echo $t104_ho1_detail_list->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $t104_ho1_detail_list->asset_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $t104_ho1_detail_list->SortUrl($t104_ho1_detail_list->asset_id) ?>', 2);"><div id="elh_t104_ho1_detail_asset_id" class="t104_ho1_detail_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $t104_ho1_detail_list->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($t104_ho1_detail_list->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($t104_ho1_detail_list->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$t104_ho1_detail_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($t104_ho1_detail_list->ExportAll && $t104_ho1_detail_list->isExport()) {
	$t104_ho1_detail_list->StopRecord = $t104_ho1_detail_list->TotalRecords;
} else {

	// Set the last record to display
	if ($t104_ho1_detail_list->TotalRecords > $t104_ho1_detail_list->StartRecord + $t104_ho1_detail_list->DisplayRecords - 1)
		$t104_ho1_detail_list->StopRecord = $t104_ho1_detail_list->StartRecord + $t104_ho1_detail_list->DisplayRecords - 1;
	else
		$t104_ho1_detail_list->StopRecord = $t104_ho1_detail_list->TotalRecords;
}
$t104_ho1_detail_list->RecordCount = $t104_ho1_detail_list->StartRecord - 1;
if ($t104_ho1_detail_list->Recordset && !$t104_ho1_detail_list->Recordset->EOF) {
	$t104_ho1_detail_list->Recordset->moveFirst();
	$selectLimit = $t104_ho1_detail_list->UseSelectLimit;
	if (!$selectLimit && $t104_ho1_detail_list->StartRecord > 1)
		$t104_ho1_detail_list->Recordset->move($t104_ho1_detail_list->StartRecord - 1);
} elseif (!$t104_ho1_detail->AllowAddDeleteRow && $t104_ho1_detail_list->StopRecord == 0) {
	$t104_ho1_detail_list->StopRecord = $t104_ho1_detail->GridAddRowCount;
}

// Initialize aggregate
$t104_ho1_detail->RowType = ROWTYPE_AGGREGATEINIT;
$t104_ho1_detail->resetAttributes();
$t104_ho1_detail_list->renderRow();
while ($t104_ho1_detail_list->RecordCount < $t104_ho1_detail_list->StopRecord) {
	$t104_ho1_detail_list->RecordCount++;
	if ($t104_ho1_detail_list->RecordCount >= $t104_ho1_detail_list->StartRecord) {
		$t104_ho1_detail_list->RowCount++;

		// Set up key count
		$t104_ho1_detail_list->KeyCount = $t104_ho1_detail_list->RowIndex;

		// Init row class and style
		$t104_ho1_detail->resetAttributes();
		$t104_ho1_detail->CssClass = "";
		if ($t104_ho1_detail_list->isGridAdd()) {
		} else {
			$t104_ho1_detail_list->loadRowValues($t104_ho1_detail_list->Recordset); // Load row values
		}
		$t104_ho1_detail->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$t104_ho1_detail->RowAttrs->merge(["data-rowindex" => $t104_ho1_detail_list->RowCount, "id" => "r" . $t104_ho1_detail_list->RowCount . "_t104_ho1_detail", "data-rowtype" => $t104_ho1_detail->RowType]);

		// Render row
		$t104_ho1_detail_list->renderRow();

		// Render list options
		$t104_ho1_detail_list->renderListOptions();
?>
	<tr <?php echo $t104_ho1_detail->rowAttributes() ?>>
<?php

// Render list options (body, left)
$t104_ho1_detail_list->ListOptions->render("body", "left", $t104_ho1_detail_list->RowCount);
?>
	<?php if ($t104_ho1_detail_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $t104_ho1_detail_list->id->cellAttributes() ?>>
<span id="el<?php echo $t104_ho1_detail_list->RowCount ?>_t104_ho1_detail_id">
<span<?php echo $t104_ho1_detail_list->id->viewAttributes() ?>><?php echo $t104_ho1_detail_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t104_ho1_detail_list->hohead_id->Visible) { // hohead_id ?>
		<td data-name="hohead_id" <?php echo $t104_ho1_detail_list->hohead_id->cellAttributes() ?>>
<span id="el<?php echo $t104_ho1_detail_list->RowCount ?>_t104_ho1_detail_hohead_id">
<span<?php echo $t104_ho1_detail_list->hohead_id->viewAttributes() ?>><?php echo $t104_ho1_detail_list->hohead_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($t104_ho1_detail_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $t104_ho1_detail_list->asset_id->cellAttributes() ?>>
<span id="el<?php echo $t104_ho1_detail_list->RowCount ?>_t104_ho1_detail_asset_id">
<span<?php echo $t104_ho1_detail_list->asset_id->viewAttributes() ?>><?php echo $t104_ho1_detail_list->asset_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$t104_ho1_detail_list->ListOptions->render("body", "right", $t104_ho1_detail_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$t104_ho1_detail_list->isGridAdd())
		$t104_ho1_detail_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$t104_ho1_detail->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($t104_ho1_detail_list->Recordset)
	$t104_ho1_detail_list->Recordset->Close();
?>
<?php if (!$t104_ho1_detail_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$t104_ho1_detail_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $t104_ho1_detail_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $t104_ho1_detail_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($t104_ho1_detail_list->TotalRecords == 0 && !$t104_ho1_detail->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $t104_ho1_detail_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$t104_ho1_detail_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$t104_ho1_detail_list->isExport()) { ?>
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
$t104_ho1_detail_list->terminate();
?>