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
$r004_assetglobal_summary = new r004_assetglobal_summary();

// Run the page
$r004_assetglobal_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r004_assetglobal_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r004_assetglobal_summary->isExport() && !$r004_assetglobal_summary->DrillDown && !$DashboardReport) { ?>
<script>
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<a id="top"></a>
<?php if ((!$r004_assetglobal_summary->isExport() || $r004_assetglobal_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r004_assetglobal_summary->DrillDownInPanel) {
	$r004_assetglobal_summary->ExportOptions->render("body");
	$r004_assetglobal_summary->SearchOptions->render("body");
	$r004_assetglobal_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r004_assetglobal_summary->showPageHeader(); ?>
<?php
$r004_assetglobal_summary->showMessage();
?>
<?php if ((!$r004_assetglobal_summary->isExport() || $r004_assetglobal_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r004_assetglobal_summary->isExport() || $r004_assetglobal_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r004_assetglobal_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r004_assetglobal_summary->isExport() && !$r004_assetglobal_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php
while ($r004_assetglobal_summary->GroupCount <= count($r004_assetglobal_summary->GroupRecords) && $r004_assetglobal_summary->GroupCount <= $r004_assetglobal_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r004_assetglobal_summary->ShowHeader) {
?>
<?php if ($r004_assetglobal_summary->GroupCount > 1) { ?>
</tbody>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r004_assetglobal_summary->isExport() && !($r004_assetglobal_summary->DrillDown && $r004_assetglobal_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r004_assetglobal_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php echo $r004_assetglobal_summary->PageBreakContent ?>
<?php } ?>
<div class="<?php if (!$r004_assetglobal_summary->isExport("word") && !$r004_assetglobal_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r004_assetglobal_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_r004_assetglobal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r004_assetglobal_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r004_assetglobal_summary->groupDescription->Visible) { ?>
	<?php if ($r004_assetglobal_summary->groupDescription->ShowGroupHeaderAsRow) { ?>
	<th data-name="groupDescription">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->groupDescription) == "") { ?>
	<th data-name="groupDescription" class="<?php echo $r004_assetglobal_summary->groupDescription->headerCellClass() ?>"><div class="r004_assetglobal_groupDescription"><div class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->groupDescription->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="groupDescription" class="<?php echo $r004_assetglobal_summary->groupDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->groupDescription) ?>', 2);"><div class="r004_assetglobal_groupDescription">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->groupDescription->caption() ?></span><span class="ew-table-header-sort"><?php if ($r004_assetglobal_summary->groupDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r004_assetglobal_summary->groupDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r004_assetglobal_summary->bookValue2Label->Visible) { ?>
	<?php if ($r004_assetglobal_summary->bookValue2Label->ShowGroupHeaderAsRow) { ?>
	<th data-name="bookValue2Label">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2Label) == "") { ?>
	<th data-name="bookValue2Label" class="<?php echo $r004_assetglobal_summary->bookValue2Label->headerCellClass() ?>"><div class="r004_assetglobal_bookValue2Label"><div class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2Label->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="bookValue2Label" class="<?php echo $r004_assetglobal_summary->bookValue2Label->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2Label) ?>', 2);"><div class="r004_assetglobal_bookValue2Label">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2Label->caption() ?></span><span class="ew-table-header-sort"><?php if ($r004_assetglobal_summary->bookValue2Label->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r004_assetglobal_summary->bookValue2Label->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r004_assetglobal_summary->bookValue2->Visible) { ?>
	<?php if ($r004_assetglobal_summary->bookValue2->ShowGroupHeaderAsRow) { ?>
	<th data-name="bookValue2">&nbsp;</th>
	<?php } else { ?>
		<?php if ($r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2) == "") { ?>
	<th data-name="bookValue2" class="<?php echo $r004_assetglobal_summary->bookValue2->headerCellClass() ?>"><div class="r004_assetglobal_bookValue2"><div class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2->caption() ?></div></div></th>
		<?php } else { ?>
	<th data-name="bookValue2" class="<?php echo $r004_assetglobal_summary->bookValue2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2) ?>', 2);"><div class="r004_assetglobal_bookValue2">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2->caption() ?></span><span class="ew-table-header-sort"><?php if ($r004_assetglobal_summary->bookValue2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r004_assetglobal_summary->bookValue2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if ($r004_assetglobal_summary->typeDescription->Visible) { ?>
	<?php if ($r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->typeDescription) == "") { ?>
	<th data-name="typeDescription" class="<?php echo $r004_assetglobal_summary->typeDescription->headerCellClass() ?>"><div class="r004_assetglobal_typeDescription"><div class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->typeDescription->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="typeDescription" class="<?php echo $r004_assetglobal_summary->typeDescription->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->typeDescription) ?>', 2);"><div class="r004_assetglobal_typeDescription">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->typeDescription->caption() ?></span><span class="ew-table-header-sort"><?php if ($r004_assetglobal_summary->typeDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r004_assetglobal_summary->typeDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r004_assetglobal_summary->TotalGroups == 0)
			break; // Show header only
		$r004_assetglobal_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php

	// Build detail SQL
	$where = DetailFilterSql($r004_assetglobal_summary->groupDescription, $r004_assetglobal_summary->getSqlFirstGroupField(), $r004_assetglobal_summary->groupDescription->groupValue(), $r004_assetglobal_summary->Dbid);
	if ($r004_assetglobal_summary->PageFirstGroupFilter != "") $r004_assetglobal_summary->PageFirstGroupFilter .= " OR ";
	$r004_assetglobal_summary->PageFirstGroupFilter .= $where;
	if ($r004_assetglobal_summary->Filter != "")
		$where = "($r004_assetglobal_summary->Filter) AND ($where)";
	$sql = BuildReportSql($r004_assetglobal_summary->getSqlSelect(), $r004_assetglobal_summary->getSqlWhere(), $r004_assetglobal_summary->getSqlGroupBy(), $r004_assetglobal_summary->getSqlHaving(), $r004_assetglobal_summary->getSqlOrderBy(), $where, $r004_assetglobal_summary->Sort);
	$rs = $r004_assetglobal_summary->getRecordset($sql);
	$r004_assetglobal_summary->DetailRecords = $rs ? $rs->getRows() : [];
	$r004_assetglobal_summary->DetailRecordCount = count($r004_assetglobal_summary->DetailRecords);

	// Load detail records
	$r004_assetglobal_summary->groupDescription->Records = &$r004_assetglobal_summary->DetailRecords;
	$r004_assetglobal_summary->groupDescription->LevelBreak = TRUE; // Set field level break
		$r004_assetglobal_summary->GroupCounter[1] = $r004_assetglobal_summary->GroupCount;
		$r004_assetglobal_summary->groupDescription->getCnt($r004_assetglobal_summary->groupDescription->Records); // Get record count
?>
<?php if ($r004_assetglobal_summary->groupDescription->Visible && $r004_assetglobal_summary->groupDescription->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r004_assetglobal_summary->resetAttributes();
		$r004_assetglobal_summary->RowType = ROWTYPE_TOTAL;
		$r004_assetglobal_summary->RowTotalType = ROWTOTAL_GROUP;
		$r004_assetglobal_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r004_assetglobal_summary->RowGroupLevel = 1;
		$r004_assetglobal_summary->renderRow();
?>
	<tr<?php echo $r004_assetglobal_summary->rowAttributes(); ?>>
<?php if ($r004_assetglobal_summary->groupDescription->Visible) { ?>
		<td data-field="groupDescription"<?php echo $r004_assetglobal_summary->groupDescription->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="groupDescription" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 1) ?>"<?php echo $r004_assetglobal_summary->groupDescription->cellAttributes() ?>>
<?php if ($r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->groupDescription) == "") { ?>
		<span class="ew-summary-caption r004_assetglobal_groupDescription"><span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->groupDescription->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r004_assetglobal_groupDescription" onclick="ew.sort(event, '<?php echo $r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->groupDescription) ?>', 2);">
			<span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->groupDescription->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r004_assetglobal_summary->groupDescription->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r004_assetglobal_summary->groupDescription->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r004_assetglobal_summary->groupDescription->viewAttributes() ?>><?php echo $r004_assetglobal_summary->groupDescription->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r004_assetglobal_summary->groupDescription->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r004_assetglobal_summary->bookValue2Label->getDistinctValues($r004_assetglobal_summary->groupDescription->Records);
	$r004_assetglobal_summary->setGroupCount(count($r004_assetglobal_summary->bookValue2Label->DistinctValues), $r004_assetglobal_summary->GroupCounter[1]);
	$r004_assetglobal_summary->GroupCounter[2] = 0; // Init group count index
	foreach ($r004_assetglobal_summary->bookValue2Label->DistinctValues as $bookValue2Label) { // Load records for this distinct value
		$r004_assetglobal_summary->bookValue2Label->setGroupValue($bookValue2Label); // Set group value
		$r004_assetglobal_summary->bookValue2Label->getDistinctRecords($r004_assetglobal_summary->groupDescription->Records, $r004_assetglobal_summary->bookValue2Label->groupValue());
		$r004_assetglobal_summary->bookValue2Label->LevelBreak = TRUE; // Set field level break
		$r004_assetglobal_summary->GroupCounter[2]++;
		$r004_assetglobal_summary->bookValue2Label->getCnt($r004_assetglobal_summary->bookValue2Label->Records); // Get record count
?>
<?php if ($r004_assetglobal_summary->bookValue2Label->Visible && $r004_assetglobal_summary->bookValue2Label->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r004_assetglobal_summary->bookValue2Label->setDbValue($bookValue2Label); // Set current value for bookValue2Label
		$r004_assetglobal_summary->resetAttributes();
		$r004_assetglobal_summary->RowType = ROWTYPE_TOTAL;
		$r004_assetglobal_summary->RowTotalType = ROWTOTAL_GROUP;
		$r004_assetglobal_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r004_assetglobal_summary->RowGroupLevel = 2;
		$r004_assetglobal_summary->renderRow();
?>
	<tr<?php echo $r004_assetglobal_summary->rowAttributes(); ?>>
<?php if ($r004_assetglobal_summary->groupDescription->Visible) { ?>
		<td data-field="groupDescription"<?php echo $r004_assetglobal_summary->groupDescription->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($r004_assetglobal_summary->bookValue2Label->Visible) { ?>
		<td data-field="bookValue2Label"<?php echo $r004_assetglobal_summary->bookValue2Label->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="bookValue2Label" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 2) ?>"<?php echo $r004_assetglobal_summary->bookValue2Label->cellAttributes() ?>>
<?php if ($r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2Label) == "") { ?>
		<span class="ew-summary-caption r004_assetglobal_bookValue2Label"><span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2Label->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r004_assetglobal_bookValue2Label" onclick="ew.sort(event, '<?php echo $r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2Label) ?>', 2);">
			<span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2Label->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r004_assetglobal_summary->bookValue2Label->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r004_assetglobal_summary->bookValue2Label->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r004_assetglobal_summary->bookValue2Label->viewAttributes() ?>><?php echo $r004_assetglobal_summary->bookValue2Label->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r004_assetglobal_summary->bookValue2Label->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r004_assetglobal_summary->bookValue2->getDistinctValues($r004_assetglobal_summary->bookValue2Label->Records);
	$r004_assetglobal_summary->setGroupCount(count($r004_assetglobal_summary->bookValue2->DistinctValues), $r004_assetglobal_summary->GroupCounter[1], $r004_assetglobal_summary->GroupCounter[2]);
	$r004_assetglobal_summary->GroupCounter[3] = 0; // Init group count index
	foreach ($r004_assetglobal_summary->bookValue2->DistinctValues as $bookValue2) { // Load records for this distinct value
		$r004_assetglobal_summary->bookValue2->setGroupValue($bookValue2); // Set group value
		$r004_assetglobal_summary->bookValue2->getDistinctRecords($r004_assetglobal_summary->bookValue2Label->Records, $r004_assetglobal_summary->bookValue2->groupValue());
		$r004_assetglobal_summary->bookValue2->LevelBreak = TRUE; // Set field level break
		$r004_assetglobal_summary->GroupCounter[3]++;
		$r004_assetglobal_summary->bookValue2->getCnt($r004_assetglobal_summary->bookValue2->Records); // Get record count
		$r004_assetglobal_summary->setGroupCount($r004_assetglobal_summary->bookValue2->Count, $r004_assetglobal_summary->GroupCounter[1], $r004_assetglobal_summary->GroupCounter[2], $r004_assetglobal_summary->GroupCounter[3]);
?>
<?php if ($r004_assetglobal_summary->bookValue2->Visible && $r004_assetglobal_summary->bookValue2->ShowGroupHeaderAsRow) { ?>
<?php

		// Render header row
		$r004_assetglobal_summary->bookValue2->setDbValue($bookValue2); // Set current value for bookValue2
		$r004_assetglobal_summary->resetAttributes();
		$r004_assetglobal_summary->RowType = ROWTYPE_TOTAL;
		$r004_assetglobal_summary->RowTotalType = ROWTOTAL_GROUP;
		$r004_assetglobal_summary->RowTotalSubType = ROWTOTAL_HEADER;
		$r004_assetglobal_summary->RowGroupLevel = 3;
		$r004_assetglobal_summary->renderRow();
?>
	<tr<?php echo $r004_assetglobal_summary->rowAttributes(); ?>>
<?php if ($r004_assetglobal_summary->groupDescription->Visible) { ?>
		<td data-field="groupDescription"<?php echo $r004_assetglobal_summary->groupDescription->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($r004_assetglobal_summary->bookValue2Label->Visible) { ?>
		<td data-field="bookValue2Label"<?php echo $r004_assetglobal_summary->bookValue2Label->cellAttributes(); ?>></td>
<?php } ?>
<?php if ($r004_assetglobal_summary->bookValue2->Visible) { ?>
		<td data-field="bookValue2"<?php echo $r004_assetglobal_summary->bookValue2->cellAttributes(); ?>><span class="ew-group-toggle icon-collapse"></span></td>
<?php } ?>
		<td data-field="bookValue2" colspan="<?php echo ($Page->GroupColumnCount + $Page->DetailColumnCount - 3) ?>"<?php echo $r004_assetglobal_summary->bookValue2->cellAttributes() ?>>
<?php if ($r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2) == "") { ?>
		<span class="ew-summary-caption r004_assetglobal_bookValue2"><span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2->caption() ?></span></span>
<?php } else { ?>
		<span class="ew-table-header-btn ew-pointer ew-summary-caption r004_assetglobal_bookValue2" onclick="ew.sort(event, '<?php echo $r004_assetglobal_summary->sortUrl($r004_assetglobal_summary->bookValue2) ?>', 2);">
			<span class="ew-table-header-caption"><?php echo $r004_assetglobal_summary->bookValue2->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($r004_assetglobal_summary->bookValue2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r004_assetglobal_summary->bookValue2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span>
		</span>
<?php } ?>
		<?php echo $Language->phrase("SummaryColon") ?><span<?php echo $r004_assetglobal_summary->bookValue2->viewAttributes() ?>><?php echo $r004_assetglobal_summary->bookValue2->GroupViewValue ?></span>
		<span class="ew-summary-count">(<span class="ew-aggregate-caption"><?php echo $Language->phrase("RptCnt") ?></span><?php echo $Language->phrase("AggregateEqual") ?><span class="ew-aggregate-value"><?php echo FormatNumber($r004_assetglobal_summary->bookValue2->Count, 0); ?></span>)</span>
		</td>
	</tr>
<?php } ?>
<?php
	$r004_assetglobal_summary->RecordCount = 0; // Reset record count
	foreach ($r004_assetglobal_summary->bookValue2->Records as $record) {
		$r004_assetglobal_summary->RecordCount++;
		$r004_assetglobal_summary->RecordIndex++;
		$r004_assetglobal_summary->loadRowValues($record);
?>
<?php

		// Render detail row
		$r004_assetglobal_summary->resetAttributes();
		$r004_assetglobal_summary->RowType = ROWTYPE_DETAIL;
		$r004_assetglobal_summary->renderRow();
?>
	<tr<?php echo $r004_assetglobal_summary->rowAttributes(); ?>>
<?php if ($r004_assetglobal_summary->groupDescription->Visible) { ?>
	<?php if ($r004_assetglobal_summary->groupDescription->ShowGroupHeaderAsRow) { ?>
		<td data-field="groupDescription"<?php echo $r004_assetglobal_summary->groupDescription->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="groupDescription"<?php echo $r004_assetglobal_summary->groupDescription->cellAttributes(); ?>><span<?php echo $r004_assetglobal_summary->groupDescription->viewAttributes() ?>><?php echo $r004_assetglobal_summary->groupDescription->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r004_assetglobal_summary->bookValue2Label->Visible) { ?>
	<?php if ($r004_assetglobal_summary->bookValue2Label->ShowGroupHeaderAsRow) { ?>
		<td data-field="bookValue2Label"<?php echo $r004_assetglobal_summary->bookValue2Label->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="bookValue2Label"<?php echo $r004_assetglobal_summary->bookValue2Label->cellAttributes(); ?>><span<?php echo $r004_assetglobal_summary->bookValue2Label->viewAttributes() ?>><?php echo $r004_assetglobal_summary->bookValue2Label->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r004_assetglobal_summary->bookValue2->Visible) { ?>
	<?php if ($r004_assetglobal_summary->bookValue2->ShowGroupHeaderAsRow) { ?>
		<td data-field="bookValue2"<?php echo $r004_assetglobal_summary->bookValue2->cellAttributes(); ?>>&nbsp;</td>
	<?php } else { ?>
		<td data-field="bookValue2"<?php echo $r004_assetglobal_summary->bookValue2->cellAttributes(); ?>><span<?php echo $r004_assetglobal_summary->bookValue2->viewAttributes() ?>><?php echo $r004_assetglobal_summary->bookValue2->GroupViewValue ?></span></td>
	<?php } ?>
<?php } ?>
<?php if ($r004_assetglobal_summary->typeDescription->Visible) { ?>
		<td data-field="typeDescription"<?php echo $r004_assetglobal_summary->typeDescription->cellAttributes() ?>>
<span<?php echo $r004_assetglobal_summary->typeDescription->viewAttributes() ?>><?php echo $r004_assetglobal_summary->typeDescription->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
	}
	} // End group level 2
	} // End group level 1
?>
<?php

	// Next group
	$r004_assetglobal_summary->loadGroupRowValues();

	// Show header if page break
	if ($r004_assetglobal_summary->isExport())
		$r004_assetglobal_summary->ShowHeader = ($r004_assetglobal_summary->ExportPageBreakCount == 0) ? FALSE : ($r004_assetglobal_summary->GroupCount % $r004_assetglobal_summary->ExportPageBreakCount == 0);

	// Page_Breaking server event
	if ($r004_assetglobal_summary->ShowHeader)
		$r004_assetglobal_summary->Page_Breaking($r004_assetglobal_summary->ShowHeader, $r004_assetglobal_summary->PageBreakContent);
	$r004_assetglobal_summary->GroupCount++;
} // End while
?>
<?php if ($r004_assetglobal_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r004_assetglobal_summary->isExport() && !($r004_assetglobal_summary->DrillDown && $r004_assetglobal_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r004_assetglobal_summary->Pager->render() ?>
</form>
<div class="clearfix"></div>
</div>
<?php } ?>
</div>
<!-- /.ew-grid -->
<?php } ?>
</div>
<!-- /#report-summary -->
<!-- Summary report (end) -->
<?php if ((!$r004_assetglobal_summary->isExport() || $r004_assetglobal_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r004_assetglobal_summary->isExport() || $r004_assetglobal_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r004_assetglobal_summary->isExport() || $r004_assetglobal_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r004_assetglobal_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r004_assetglobal_summary->isExport() && !$r004_assetglobal_summary->DrillDown && !$DashboardReport) { ?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "footer.php"; ?>
<?php } ?>
<?php
$r004_assetglobal_summary->terminate();
?>