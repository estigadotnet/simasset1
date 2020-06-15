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
$r001_asset_summary = new r001_asset_summary();

// Run the page
$r001_asset_summary->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$r001_asset_summary->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "header.php"; ?>
<?php } ?>
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
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
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-report" class="ew-report container-fluid">
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$r001_asset_summary->DrillDownInPanel) {
	$r001_asset_summary->ExportOptions->render("body");
	$r001_asset_summary->SearchOptions->render("body");
	$r001_asset_summary->FilterOptions->render("body");
}
?>
</div>
<?php $r001_asset_summary->showPageHeader(); ?>
<?php
$r001_asset_summary->showMessage();
?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
<!-- Center Container -->
<div id="ew-center" class="<?php echo $r001_asset_summary->CenterContentClass ?>">
<?php } ?>
<!-- Summary report (begin) -->
<div id="report_summary">
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
<?php } ?>
<?php
while ($r001_asset_summary->RecordCount < count($r001_asset_summary->DetailRecords) && $r001_asset_summary->RecordCount < $r001_asset_summary->DisplayGroups) {
?>
<?php

	// Show header
	if ($r001_asset_summary->ShowHeader) {
?>
<div class="<?php if (!$r001_asset_summary->isExport("word") && !$r001_asset_summary->isExport("excel")) { ?>card ew-card <?php } ?>ew-grid"<?php echo $r001_asset_summary->ReportTableStyle ?>>
<!-- Report grid (begin) -->
<div id="gmp_r001_asset" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<table class="<?php echo $r001_asset_summary->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($r001_asset_summary->property_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->property_id) == "") { ?>
	<th data-name="property_id" class="<?php echo $r001_asset_summary->property_id->headerCellClass() ?>"><div class="r001_asset_property_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="property_id" class="<?php echo $r001_asset_summary->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->property_id) ?>', 2);"><div class="r001_asset_property_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->department_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->department_id) == "") { ?>
	<th data-name="department_id" class="<?php echo $r001_asset_summary->department_id->headerCellClass() ?>"><div class="r001_asset_department_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->department_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="department_id" class="<?php echo $r001_asset_summary->department_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->department_id) ?>', 2);"><div class="r001_asset_department_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->department_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->department_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->department_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->signature_id->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->signature_id) == "") { ?>
	<th data-name="signature_id" class="<?php echo $r001_asset_summary->signature_id->headerCellClass() ?>"><div class="r001_asset_signature_id"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->signature_id->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="signature_id" class="<?php echo $r001_asset_summary->signature_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->signature_id) ?>', 2);"><div class="r001_asset_signature_id">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->signature_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->signature_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->signature_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Description->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Description) == "") { ?>
	<th data-name="Description" class="<?php echo $r001_asset_summary->Description->headerCellClass() ?>"><div class="r001_asset_Description"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Description->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Description" class="<?php echo $r001_asset_summary->Description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Description) ?>', 2);"><div class="r001_asset_Description">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Description->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementDate->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->ProcurementDate) == "") { ?>
	<th data-name="ProcurementDate" class="<?php echo $r001_asset_summary->ProcurementDate->headerCellClass() ?>"><div class="r001_asset_ProcurementDate"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementDate->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="ProcurementDate" class="<?php echo $r001_asset_summary->ProcurementDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->ProcurementDate) ?>', 2);"><div class="r001_asset_ProcurementDate">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->ProcurementDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->ProcurementDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementCurrentCost->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->ProcurementCurrentCost) == "") { ?>
	<th data-name="ProcurementCurrentCost" class="<?php echo $r001_asset_summary->ProcurementCurrentCost->headerCellClass() ?>"><div class="r001_asset_ProcurementCurrentCost"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementCurrentCost->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="ProcurementCurrentCost" class="<?php echo $r001_asset_summary->ProcurementCurrentCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->ProcurementCurrentCost) ?>', 2);"><div class="r001_asset_ProcurementCurrentCost">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->ProcurementCurrentCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->ProcurementCurrentCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->ProcurementCurrentCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->DepreciationAmount->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->DepreciationAmount) == "") { ?>
	<th data-name="DepreciationAmount" class="<?php echo $r001_asset_summary->DepreciationAmount->headerCellClass() ?>"><div class="r001_asset_DepreciationAmount"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->DepreciationAmount->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="DepreciationAmount" class="<?php echo $r001_asset_summary->DepreciationAmount->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->DepreciationAmount) ?>', 2);"><div class="r001_asset_DepreciationAmount">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->DepreciationAmount->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->DepreciationAmount->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->DepreciationAmount->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->DepreciationYtd->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->DepreciationYtd) == "") { ?>
	<th data-name="DepreciationYtd" class="<?php echo $r001_asset_summary->DepreciationYtd->headerCellClass() ?>"><div class="r001_asset_DepreciationYtd"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->DepreciationYtd->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="DepreciationYtd" class="<?php echo $r001_asset_summary->DepreciationYtd->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->DepreciationYtd) ?>', 2);"><div class="r001_asset_DepreciationYtd">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->DepreciationYtd->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->DepreciationYtd->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->DepreciationYtd->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->NetBookValue->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->NetBookValue) == "") { ?>
	<th data-name="NetBookValue" class="<?php echo $r001_asset_summary->NetBookValue->headerCellClass() ?>"><div class="r001_asset_NetBookValue"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->NetBookValue->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="NetBookValue" class="<?php echo $r001_asset_summary->NetBookValue->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->NetBookValue) ?>', 2);"><div class="r001_asset_NetBookValue">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->NetBookValue->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->NetBookValue->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->NetBookValue->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Periode->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Periode) == "") { ?>
	<th data-name="Periode" class="<?php echo $r001_asset_summary->Periode->headerCellClass() ?>"><div class="r001_asset_Periode"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Periode->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Periode" class="<?php echo $r001_asset_summary->Periode->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Periode) ?>', 2);"><div class="r001_asset_Periode">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Periode->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Periode->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Periode->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Qty->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Qty) == "") { ?>
	<th data-name="Qty" class="<?php echo $r001_asset_summary->Qty->headerCellClass() ?>"><div class="r001_asset_Qty"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Qty->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Qty" class="<?php echo $r001_asset_summary->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Qty) ?>', 2);"><div class="r001_asset_Qty">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($r001_asset_summary->Remarks->Visible) { ?>
	<?php if ($r001_asset_summary->sortUrl($r001_asset_summary->Remarks) == "") { ?>
	<th data-name="Remarks" class="<?php echo $r001_asset_summary->Remarks->headerCellClass() ?>"><div class="r001_asset_Remarks"><div class="ew-table-header-caption"><?php echo $r001_asset_summary->Remarks->caption() ?></div></div></th>
	<?php } else { ?>
	<th data-name="Remarks" class="<?php echo $r001_asset_summary->Remarks->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $r001_asset_summary->sortUrl($r001_asset_summary->Remarks) ?>', 2);"><div class="r001_asset_Remarks">
		<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $r001_asset_summary->Remarks->caption() ?></span><span class="ew-table-header-sort"><?php if ($r001_asset_summary->Remarks->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($r001_asset_summary->Remarks->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
	</div></div></th>
	<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($r001_asset_summary->TotalGroups == 0)
			break; // Show header only
		$r001_asset_summary->ShowHeader = FALSE;
	} // End show header
?>
<?php
	$r001_asset_summary->loadRowValues($r001_asset_summary->DetailRecords[$r001_asset_summary->RecordCount]);
	$r001_asset_summary->RecordCount++;
	$r001_asset_summary->RecordIndex++;
?>
<?php

		// Render detail row
		$r001_asset_summary->resetAttributes();
		$r001_asset_summary->RowType = ROWTYPE_DETAIL;
		$r001_asset_summary->renderRow();
?>
	<tr<?php echo $r001_asset_summary->rowAttributes(); ?>>
<?php if ($r001_asset_summary->property_id->Visible) { ?>
		<td data-field="property_id"<?php echo $r001_asset_summary->property_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->property_id->viewAttributes() ?>><?php echo $r001_asset_summary->property_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->department_id->Visible) { ?>
		<td data-field="department_id"<?php echo $r001_asset_summary->department_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->department_id->viewAttributes() ?>><?php echo $r001_asset_summary->department_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->signature_id->Visible) { ?>
		<td data-field="signature_id"<?php echo $r001_asset_summary->signature_id->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->signature_id->viewAttributes() ?>><?php echo $r001_asset_summary->signature_id->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Description->Visible) { ?>
		<td data-field="Description"<?php echo $r001_asset_summary->Description->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Description->viewAttributes() ?>><?php echo $r001_asset_summary->Description->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementDate->Visible) { ?>
		<td data-field="ProcurementDate"<?php echo $r001_asset_summary->ProcurementDate->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->ProcurementDate->viewAttributes() ?>><?php echo $r001_asset_summary->ProcurementDate->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->ProcurementCurrentCost->Visible) { ?>
		<td data-field="ProcurementCurrentCost"<?php echo $r001_asset_summary->ProcurementCurrentCost->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->ProcurementCurrentCost->viewAttributes() ?>><?php echo $r001_asset_summary->ProcurementCurrentCost->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->DepreciationAmount->Visible) { ?>
		<td data-field="DepreciationAmount"<?php echo $r001_asset_summary->DepreciationAmount->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->DepreciationAmount->viewAttributes() ?>><?php echo $r001_asset_summary->DepreciationAmount->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->DepreciationYtd->Visible) { ?>
		<td data-field="DepreciationYtd"<?php echo $r001_asset_summary->DepreciationYtd->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->DepreciationYtd->viewAttributes() ?>><?php echo $r001_asset_summary->DepreciationYtd->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->NetBookValue->Visible) { ?>
		<td data-field="NetBookValue"<?php echo $r001_asset_summary->NetBookValue->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->NetBookValue->viewAttributes() ?>><?php echo $r001_asset_summary->NetBookValue->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Periode->Visible) { ?>
		<td data-field="Periode"<?php echo $r001_asset_summary->Periode->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Periode->viewAttributes() ?>><?php echo $r001_asset_summary->Periode->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Qty->Visible) { ?>
		<td data-field="Qty"<?php echo $r001_asset_summary->Qty->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Qty->viewAttributes() ?>><?php echo $r001_asset_summary->Qty->getViewValue() ?></span>
</td>
<?php } ?>
<?php if ($r001_asset_summary->Remarks->Visible) { ?>
		<td data-field="Remarks"<?php echo $r001_asset_summary->Remarks->cellAttributes() ?>>
<span<?php echo $r001_asset_summary->Remarks->viewAttributes() ?>><?php echo $r001_asset_summary->Remarks->getViewValue() ?></span>
</td>
<?php } ?>
	</tr>
<?php
} // End while
?>
<?php if ($r001_asset_summary->TotalGroups > 0) { ?>
</tbody>
<tfoot>
</tfoot>
</table>
</div>
<!-- /.ew-grid-middle-panel -->
<!-- Report grid (end) -->
<?php if (!$r001_asset_summary->isExport() && !($r001_asset_summary->DrillDown && $r001_asset_summary->TotalGroups > 0)) { ?>
<!-- Bottom pager -->
<div class="card-footer ew-grid-lower-panel">
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $r001_asset_summary->Pager->render() ?>
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
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ((!$r001_asset_summary->isExport() || $r001_asset_summary->isExport("print")) && !$DashboardReport) { ?>
</div>
<!-- /.ew-report -->
<?php } ?>
<?php
$r001_asset_summary->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$r001_asset_summary->isExport() && !$r001_asset_summary->DrillDown && !$DashboardReport) { ?>
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
$r001_asset_summary->terminate();
?>