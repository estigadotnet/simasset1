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
$v101_ho_list = new v101_ho_list();

// Run the page
$v101_ho_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v101_ho_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v101_ho_list->isExport()) { ?>
<script>
var fv101_holist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv101_holist = currentForm = new ew.Form("fv101_holist", "list");
	fv101_holist.formKeyCountName = '<?php echo $v101_ho_list->FormKeyCountName ?>';
	loadjs.done("fv101_holist");
});
var fv101_holistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv101_holistsrch = currentSearchForm = new ew.Form("fv101_holistsrch");

	// Dynamic selection lists
	// Filters

	fv101_holistsrch.filterList = <?php echo $v101_ho_list->getFilterList() ?>;
	loadjs.done("fv101_holistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v101_ho_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v101_ho_list->TotalRecords > 0 && $v101_ho_list->ExportOptions->visible()) { ?>
<?php $v101_ho_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_ho_list->ImportOptions->visible()) { ?>
<?php $v101_ho_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_ho_list->SearchOptions->visible()) { ?>
<?php $v101_ho_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v101_ho_list->FilterOptions->visible()) { ?>
<?php $v101_ho_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v101_ho_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v101_ho_list->isExport() && !$v101_ho->CurrentAction) { ?>
<form name="fv101_holistsrch" id="fv101_holistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv101_holistsrch-search-panel" class="<?php echo $v101_ho_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v101_ho">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v101_ho_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v101_ho_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v101_ho_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v101_ho_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v101_ho_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v101_ho_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v101_ho_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v101_ho_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v101_ho_list->showPageHeader(); ?>
<?php
$v101_ho_list->showMessage();
?>
<?php if ($v101_ho_list->TotalRecords > 0 || $v101_ho->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v101_ho_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v101_ho">
<form name="fv101_holist" id="fv101_holist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v101_ho">
<div id="gmp_v101_ho" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v101_ho_list->TotalRecords > 0 || $v101_ho_list->isGridEdit()) { ?>
<table id="tbl_v101_holist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v101_ho->RowType = ROWTYPE_HEADER;

// Render list options
$v101_ho_list->renderListOptions();

// Render list options (header, left)
$v101_ho_list->ListOptions->render("header", "left");
?>
<?php if ($v101_ho_list->id->Visible) { // id ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $v101_ho_list->id->headerCellClass() ?>"><div id="elh_v101_ho_id" class="v101_ho_id"><div class="ew-table-header-caption"><?php echo $v101_ho_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $v101_ho_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->id) ?>', 2);"><div id="elh_v101_ho_id" class="v101_ho_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->property_id->Visible) { // property_id ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->property_id) == "") { ?>
		<th data-name="property_id" class="<?php echo $v101_ho_list->property_id->headerCellClass() ?>"><div id="elh_v101_ho_property_id" class="v101_ho_property_id"><div class="ew-table-header-caption"><?php echo $v101_ho_list->property_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property_id" class="<?php echo $v101_ho_list->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->property_id) ?>', 2);"><div id="elh_v101_ho_property_id" class="v101_ho_property_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->TransactionNo->Visible) { // TransactionNo ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->TransactionNo) == "") { ?>
		<th data-name="TransactionNo" class="<?php echo $v101_ho_list->TransactionNo->headerCellClass() ?>"><div id="elh_v101_ho_TransactionNo" class="v101_ho_TransactionNo"><div class="ew-table-header-caption"><?php echo $v101_ho_list->TransactionNo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionNo" class="<?php echo $v101_ho_list->TransactionNo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->TransactionNo) ?>', 2);"><div id="elh_v101_ho_TransactionNo" class="v101_ho_TransactionNo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->TransactionNo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->TransactionNo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->TransactionNo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->TransactionDate->Visible) { // TransactionDate ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->TransactionDate) == "") { ?>
		<th data-name="TransactionDate" class="<?php echo $v101_ho_list->TransactionDate->headerCellClass() ?>"><div id="elh_v101_ho_TransactionDate" class="v101_ho_TransactionDate"><div class="ew-table-header-caption"><?php echo $v101_ho_list->TransactionDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TransactionDate" class="<?php echo $v101_ho_list->TransactionDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->TransactionDate) ?>', 2);"><div id="elh_v101_ho_TransactionDate" class="v101_ho_TransactionDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->TransactionDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->TransactionDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->TransactionDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->HandedOverTo->Visible) { // HandedOverTo ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->HandedOverTo) == "") { ?>
		<th data-name="HandedOverTo" class="<?php echo $v101_ho_list->HandedOverTo->headerCellClass() ?>"><div id="elh_v101_ho_HandedOverTo" class="v101_ho_HandedOverTo"><div class="ew-table-header-caption"><?php echo $v101_ho_list->HandedOverTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HandedOverTo" class="<?php echo $v101_ho_list->HandedOverTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->HandedOverTo) ?>', 2);"><div id="elh_v101_ho_HandedOverTo" class="v101_ho_HandedOverTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->HandedOverTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->HandedOverTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->HandedOverTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->DepartmentTo->Visible) { // DepartmentTo ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->DepartmentTo) == "") { ?>
		<th data-name="DepartmentTo" class="<?php echo $v101_ho_list->DepartmentTo->headerCellClass() ?>"><div id="elh_v101_ho_DepartmentTo" class="v101_ho_DepartmentTo"><div class="ew-table-header-caption"><?php echo $v101_ho_list->DepartmentTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepartmentTo" class="<?php echo $v101_ho_list->DepartmentTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->DepartmentTo) ?>', 2);"><div id="elh_v101_ho_DepartmentTo" class="v101_ho_DepartmentTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->DepartmentTo->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->DepartmentTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->DepartmentTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->HandedOverBy->Visible) { // HandedOverBy ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->HandedOverBy) == "") { ?>
		<th data-name="HandedOverBy" class="<?php echo $v101_ho_list->HandedOverBy->headerCellClass() ?>"><div id="elh_v101_ho_HandedOverBy" class="v101_ho_HandedOverBy"><div class="ew-table-header-caption"><?php echo $v101_ho_list->HandedOverBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="HandedOverBy" class="<?php echo $v101_ho_list->HandedOverBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->HandedOverBy) ?>', 2);"><div id="elh_v101_ho_HandedOverBy" class="v101_ho_HandedOverBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->HandedOverBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->HandedOverBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->HandedOverBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->DepartmentBy->Visible) { // DepartmentBy ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->DepartmentBy) == "") { ?>
		<th data-name="DepartmentBy" class="<?php echo $v101_ho_list->DepartmentBy->headerCellClass() ?>"><div id="elh_v101_ho_DepartmentBy" class="v101_ho_DepartmentBy"><div class="ew-table-header-caption"><?php echo $v101_ho_list->DepartmentBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="DepartmentBy" class="<?php echo $v101_ho_list->DepartmentBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->DepartmentBy) ?>', 2);"><div id="elh_v101_ho_DepartmentBy" class="v101_ho_DepartmentBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->DepartmentBy->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->DepartmentBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->DepartmentBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign1->Visible) { // Sign1 ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign1) == "") { ?>
		<th data-name="Sign1" class="<?php echo $v101_ho_list->Sign1->headerCellClass() ?>"><div id="elh_v101_ho_Sign1" class="v101_ho_Sign1"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign1" class="<?php echo $v101_ho_list->Sign1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign1) ?>', 2);"><div id="elh_v101_ho_Sign1" class="v101_ho_Sign1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign1->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign2->Visible) { // Sign2 ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign2) == "") { ?>
		<th data-name="Sign2" class="<?php echo $v101_ho_list->Sign2->headerCellClass() ?>"><div id="elh_v101_ho_Sign2" class="v101_ho_Sign2"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign2" class="<?php echo $v101_ho_list->Sign2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign2) ?>', 2);"><div id="elh_v101_ho_Sign2" class="v101_ho_Sign2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign2->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign3->Visible) { // Sign3 ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign3) == "") { ?>
		<th data-name="Sign3" class="<?php echo $v101_ho_list->Sign3->headerCellClass() ?>"><div id="elh_v101_ho_Sign3" class="v101_ho_Sign3"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign3" class="<?php echo $v101_ho_list->Sign3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign3) ?>', 2);"><div id="elh_v101_ho_Sign3" class="v101_ho_Sign3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign3->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign4->Visible) { // Sign4 ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign4) == "") { ?>
		<th data-name="Sign4" class="<?php echo $v101_ho_list->Sign4->headerCellClass() ?>"><div id="elh_v101_ho_Sign4" class="v101_ho_Sign4"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign4" class="<?php echo $v101_ho_list->Sign4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign4) ?>', 2);"><div id="elh_v101_ho_Sign4" class="v101_ho_Sign4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign4->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->hodetail_id->Visible) { // hodetail_id ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->hodetail_id) == "") { ?>
		<th data-name="hodetail_id" class="<?php echo $v101_ho_list->hodetail_id->headerCellClass() ?>"><div id="elh_v101_ho_hodetail_id" class="v101_ho_hodetail_id"><div class="ew-table-header-caption"><?php echo $v101_ho_list->hodetail_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hodetail_id" class="<?php echo $v101_ho_list->hodetail_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->hodetail_id) ?>', 2);"><div id="elh_v101_ho_hodetail_id" class="v101_ho_hodetail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->hodetail_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->hodetail_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->hodetail_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->asset_id->Visible) { // asset_id ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $v101_ho_list->asset_id->headerCellClass() ?>"><div id="elh_v101_ho_asset_id" class="v101_ho_asset_id"><div class="ew-table-header-caption"><?php echo $v101_ho_list->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $v101_ho_list->asset_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->asset_id) ?>', 2);"><div id="elh_v101_ho_asset_id" class="v101_ho_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Property->Visible) { // Property ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Property) == "") { ?>
		<th data-name="Property" class="<?php echo $v101_ho_list->Property->headerCellClass() ?>"><div id="elh_v101_ho_Property" class="v101_ho_Property"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Property->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Property" class="<?php echo $v101_ho_list->Property->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Property) ?>', 2);"><div id="elh_v101_ho_Property" class="v101_ho_Property">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Property->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Property->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Property->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->TemplateFile->Visible) { // TemplateFile ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->TemplateFile) == "") { ?>
		<th data-name="TemplateFile" class="<?php echo $v101_ho_list->TemplateFile->headerCellClass() ?>"><div id="elh_v101_ho_TemplateFile" class="v101_ho_TemplateFile"><div class="ew-table-header-caption"><?php echo $v101_ho_list->TemplateFile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="TemplateFile" class="<?php echo $v101_ho_list->TemplateFile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->TemplateFile) ?>', 2);"><div id="elh_v101_ho_TemplateFile" class="v101_ho_TemplateFile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->TemplateFile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->TemplateFile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->TemplateFile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->hoDepartmentTo->Visible) { // hoDepartmentTo ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->hoDepartmentTo) == "") { ?>
		<th data-name="hoDepartmentTo" class="<?php echo $v101_ho_list->hoDepartmentTo->headerCellClass() ?>"><div id="elh_v101_ho_hoDepartmentTo" class="v101_ho_hoDepartmentTo"><div class="ew-table-header-caption"><?php echo $v101_ho_list->hoDepartmentTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoDepartmentTo" class="<?php echo $v101_ho_list->hoDepartmentTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->hoDepartmentTo) ?>', 2);"><div id="elh_v101_ho_hoDepartmentTo" class="v101_ho_hoDepartmentTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->hoDepartmentTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->hoDepartmentTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->hoDepartmentTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->hoSignatureTo->Visible) { // hoSignatureTo ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->hoSignatureTo) == "") { ?>
		<th data-name="hoSignatureTo" class="<?php echo $v101_ho_list->hoSignatureTo->headerCellClass() ?>"><div id="elh_v101_ho_hoSignatureTo" class="v101_ho_hoSignatureTo"><div class="ew-table-header-caption"><?php echo $v101_ho_list->hoSignatureTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoSignatureTo" class="<?php echo $v101_ho_list->hoSignatureTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->hoSignatureTo) ?>', 2);"><div id="elh_v101_ho_hoSignatureTo" class="v101_ho_hoSignatureTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->hoSignatureTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->hoSignatureTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->hoSignatureTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->hoJobTitleTo->Visible) { // hoJobTitleTo ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->hoJobTitleTo) == "") { ?>
		<th data-name="hoJobTitleTo" class="<?php echo $v101_ho_list->hoJobTitleTo->headerCellClass() ?>"><div id="elh_v101_ho_hoJobTitleTo" class="v101_ho_hoJobTitleTo"><div class="ew-table-header-caption"><?php echo $v101_ho_list->hoJobTitleTo->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoJobTitleTo" class="<?php echo $v101_ho_list->hoJobTitleTo->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->hoJobTitleTo) ?>', 2);"><div id="elh_v101_ho_hoJobTitleTo" class="v101_ho_hoJobTitleTo">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->hoJobTitleTo->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->hoJobTitleTo->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->hoJobTitleTo->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->hoDepartmentBy->Visible) { // hoDepartmentBy ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->hoDepartmentBy) == "") { ?>
		<th data-name="hoDepartmentBy" class="<?php echo $v101_ho_list->hoDepartmentBy->headerCellClass() ?>"><div id="elh_v101_ho_hoDepartmentBy" class="v101_ho_hoDepartmentBy"><div class="ew-table-header-caption"><?php echo $v101_ho_list->hoDepartmentBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoDepartmentBy" class="<?php echo $v101_ho_list->hoDepartmentBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->hoDepartmentBy) ?>', 2);"><div id="elh_v101_ho_hoDepartmentBy" class="v101_ho_hoDepartmentBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->hoDepartmentBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->hoDepartmentBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->hoDepartmentBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->hoSignatureBy->Visible) { // hoSignatureBy ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->hoSignatureBy) == "") { ?>
		<th data-name="hoSignatureBy" class="<?php echo $v101_ho_list->hoSignatureBy->headerCellClass() ?>"><div id="elh_v101_ho_hoSignatureBy" class="v101_ho_hoSignatureBy"><div class="ew-table-header-caption"><?php echo $v101_ho_list->hoSignatureBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoSignatureBy" class="<?php echo $v101_ho_list->hoSignatureBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->hoSignatureBy) ?>', 2);"><div id="elh_v101_ho_hoSignatureBy" class="v101_ho_hoSignatureBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->hoSignatureBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->hoSignatureBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->hoSignatureBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->hoJobTitleBy->Visible) { // hoJobTitleBy ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->hoJobTitleBy) == "") { ?>
		<th data-name="hoJobTitleBy" class="<?php echo $v101_ho_list->hoJobTitleBy->headerCellClass() ?>"><div id="elh_v101_ho_hoJobTitleBy" class="v101_ho_hoJobTitleBy"><div class="ew-table-header-caption"><?php echo $v101_ho_list->hoJobTitleBy->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoJobTitleBy" class="<?php echo $v101_ho_list->hoJobTitleBy->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->hoJobTitleBy) ?>', 2);"><div id="elh_v101_ho_hoJobTitleBy" class="v101_ho_hoJobTitleBy">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->hoJobTitleBy->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->hoJobTitleBy->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->hoJobTitleBy->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Code->Visible) { // Code ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Code) == "") { ?>
		<th data-name="Code" class="<?php echo $v101_ho_list->Code->headerCellClass() ?>"><div id="elh_v101_ho_Code" class="v101_ho_Code"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Code" class="<?php echo $v101_ho_list->Code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Code) ?>', 2);"><div id="elh_v101_ho_Code" class="v101_ho_Code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Description->Visible) { // Description ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Description) == "") { ?>
		<th data-name="Description" class="<?php echo $v101_ho_list->Description->headerCellClass() ?>"><div id="elh_v101_ho_Description" class="v101_ho_Description"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Description" class="<?php echo $v101_ho_list->Description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Description) ?>', 2);"><div id="elh_v101_ho_Description" class="v101_ho_Description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Type->Visible) { // Type ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Type) == "") { ?>
		<th data-name="Type" class="<?php echo $v101_ho_list->Type->headerCellClass() ?>"><div id="elh_v101_ho_Type" class="v101_ho_Type"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Type->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Type" class="<?php echo $v101_ho_list->Type->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Type) ?>', 2);"><div id="elh_v101_ho_Type" class="v101_ho_Type">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Type->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Type->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Type->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Group->Visible) { // Group ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Group) == "") { ?>
		<th data-name="Group" class="<?php echo $v101_ho_list->Group->headerCellClass() ?>"><div id="elh_v101_ho_Group" class="v101_ho_Group"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Group->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Group" class="<?php echo $v101_ho_list->Group->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Group) ?>', 2);"><div id="elh_v101_ho_Group" class="v101_ho_Group">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Group->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Group->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Group->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->ProcurementDate->Visible) { // ProcurementDate ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->ProcurementDate) == "") { ?>
		<th data-name="ProcurementDate" class="<?php echo $v101_ho_list->ProcurementDate->headerCellClass() ?>"><div id="elh_v101_ho_ProcurementDate" class="v101_ho_ProcurementDate"><div class="ew-table-header-caption"><?php echo $v101_ho_list->ProcurementDate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcurementDate" class="<?php echo $v101_ho_list->ProcurementDate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->ProcurementDate) ?>', 2);"><div id="elh_v101_ho_ProcurementDate" class="v101_ho_ProcurementDate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->ProcurementDate->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->ProcurementDate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->ProcurementDate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->ProcurementCurrentCost) == "") { ?>
		<th data-name="ProcurementCurrentCost" class="<?php echo $v101_ho_list->ProcurementCurrentCost->headerCellClass() ?>"><div id="elh_v101_ho_ProcurementCurrentCost" class="v101_ho_ProcurementCurrentCost"><div class="ew-table-header-caption"><?php echo $v101_ho_list->ProcurementCurrentCost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ProcurementCurrentCost" class="<?php echo $v101_ho_list->ProcurementCurrentCost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->ProcurementCurrentCost) ?>', 2);"><div id="elh_v101_ho_ProcurementCurrentCost" class="v101_ho_ProcurementCurrentCost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->ProcurementCurrentCost->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->ProcurementCurrentCost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->ProcurementCurrentCost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Estimated_Life_28in_Year29->Visible) { // Estimated Life (in Year) ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Estimated_Life_28in_Year29) == "") { ?>
		<th data-name="Estimated_Life_28in_Year29" class="<?php echo $v101_ho_list->Estimated_Life_28in_Year29->headerCellClass() ?>"><div id="elh_v101_ho_Estimated_Life_28in_Year29" class="v101_ho_Estimated_Life_28in_Year29"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Estimated_Life_28in_Year29->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Estimated_Life_28in_Year29" class="<?php echo $v101_ho_list->Estimated_Life_28in_Year29->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Estimated_Life_28in_Year29) ?>', 2);"><div id="elh_v101_ho_Estimated_Life_28in_Year29" class="v101_ho_Estimated_Life_28in_Year29">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Estimated_Life_28in_Year29->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Estimated_Life_28in_Year29->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Estimated_Life_28in_Year29->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Qty->Visible) { // Qty ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Qty) == "") { ?>
		<th data-name="Qty" class="<?php echo $v101_ho_list->Qty->headerCellClass() ?>"><div id="elh_v101_ho_Qty" class="v101_ho_Qty"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Qty->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Qty" class="<?php echo $v101_ho_list->Qty->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Qty) ?>', 2);"><div id="elh_v101_ho_Qty" class="v101_ho_Qty">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Qty->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Qty->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Qty->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign1Signature->Visible) { // Sign1Signature ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign1Signature) == "") { ?>
		<th data-name="Sign1Signature" class="<?php echo $v101_ho_list->Sign1Signature->headerCellClass() ?>"><div id="elh_v101_ho_Sign1Signature" class="v101_ho_Sign1Signature"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign1Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign1Signature" class="<?php echo $v101_ho_list->Sign1Signature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign1Signature) ?>', 2);"><div id="elh_v101_ho_Sign1Signature" class="v101_ho_Sign1Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign1Signature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign1Signature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign1Signature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign1JobTitle->Visible) { // Sign1JobTitle ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign1JobTitle) == "") { ?>
		<th data-name="Sign1JobTitle" class="<?php echo $v101_ho_list->Sign1JobTitle->headerCellClass() ?>"><div id="elh_v101_ho_Sign1JobTitle" class="v101_ho_Sign1JobTitle"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign1JobTitle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign1JobTitle" class="<?php echo $v101_ho_list->Sign1JobTitle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign1JobTitle) ?>', 2);"><div id="elh_v101_ho_Sign1JobTitle" class="v101_ho_Sign1JobTitle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign1JobTitle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign1JobTitle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign1JobTitle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign2Signature->Visible) { // Sign2Signature ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign2Signature) == "") { ?>
		<th data-name="Sign2Signature" class="<?php echo $v101_ho_list->Sign2Signature->headerCellClass() ?>"><div id="elh_v101_ho_Sign2Signature" class="v101_ho_Sign2Signature"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign2Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign2Signature" class="<?php echo $v101_ho_list->Sign2Signature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign2Signature) ?>', 2);"><div id="elh_v101_ho_Sign2Signature" class="v101_ho_Sign2Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign2Signature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign2Signature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign2Signature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign2JobTitle->Visible) { // Sign2JobTitle ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign2JobTitle) == "") { ?>
		<th data-name="Sign2JobTitle" class="<?php echo $v101_ho_list->Sign2JobTitle->headerCellClass() ?>"><div id="elh_v101_ho_Sign2JobTitle" class="v101_ho_Sign2JobTitle"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign2JobTitle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign2JobTitle" class="<?php echo $v101_ho_list->Sign2JobTitle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign2JobTitle) ?>', 2);"><div id="elh_v101_ho_Sign2JobTitle" class="v101_ho_Sign2JobTitle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign2JobTitle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign2JobTitle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign2JobTitle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign3Signature->Visible) { // Sign3Signature ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign3Signature) == "") { ?>
		<th data-name="Sign3Signature" class="<?php echo $v101_ho_list->Sign3Signature->headerCellClass() ?>"><div id="elh_v101_ho_Sign3Signature" class="v101_ho_Sign3Signature"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign3Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign3Signature" class="<?php echo $v101_ho_list->Sign3Signature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign3Signature) ?>', 2);"><div id="elh_v101_ho_Sign3Signature" class="v101_ho_Sign3Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign3Signature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign3Signature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign3Signature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign3JobTitle->Visible) { // Sign3JobTitle ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign3JobTitle) == "") { ?>
		<th data-name="Sign3JobTitle" class="<?php echo $v101_ho_list->Sign3JobTitle->headerCellClass() ?>"><div id="elh_v101_ho_Sign3JobTitle" class="v101_ho_Sign3JobTitle"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign3JobTitle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign3JobTitle" class="<?php echo $v101_ho_list->Sign3JobTitle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign3JobTitle) ?>', 2);"><div id="elh_v101_ho_Sign3JobTitle" class="v101_ho_Sign3JobTitle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign3JobTitle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign3JobTitle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign3JobTitle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign4Signature->Visible) { // Sign4Signature ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign4Signature) == "") { ?>
		<th data-name="Sign4Signature" class="<?php echo $v101_ho_list->Sign4Signature->headerCellClass() ?>"><div id="elh_v101_ho_Sign4Signature" class="v101_ho_Sign4Signature"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign4Signature->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign4Signature" class="<?php echo $v101_ho_list->Sign4Signature->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign4Signature) ?>', 2);"><div id="elh_v101_ho_Sign4Signature" class="v101_ho_Sign4Signature">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign4Signature->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign4Signature->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign4Signature->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->Sign4JobTitle->Visible) { // Sign4JobTitle ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->Sign4JobTitle) == "") { ?>
		<th data-name="Sign4JobTitle" class="<?php echo $v101_ho_list->Sign4JobTitle->headerCellClass() ?>"><div id="elh_v101_ho_Sign4JobTitle" class="v101_ho_Sign4JobTitle"><div class="ew-table-header-caption"><?php echo $v101_ho_list->Sign4JobTitle->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="Sign4JobTitle" class="<?php echo $v101_ho_list->Sign4JobTitle->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->Sign4JobTitle) ?>', 2);"><div id="elh_v101_ho_Sign4JobTitle" class="v101_ho_Sign4JobTitle">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->Sign4JobTitle->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->Sign4JobTitle->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->Sign4JobTitle->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_list->AssetDepartment->Visible) { // AssetDepartment ?>
	<?php if ($v101_ho_list->SortUrl($v101_ho_list->AssetDepartment) == "") { ?>
		<th data-name="AssetDepartment" class="<?php echo $v101_ho_list->AssetDepartment->headerCellClass() ?>"><div id="elh_v101_ho_AssetDepartment" class="v101_ho_AssetDepartment"><div class="ew-table-header-caption"><?php echo $v101_ho_list->AssetDepartment->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="AssetDepartment" class="<?php echo $v101_ho_list->AssetDepartment->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_list->SortUrl($v101_ho_list->AssetDepartment) ?>', 2);"><div id="elh_v101_ho_AssetDepartment" class="v101_ho_AssetDepartment">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_list->AssetDepartment->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_list->AssetDepartment->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_list->AssetDepartment->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v101_ho_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v101_ho_list->ExportAll && $v101_ho_list->isExport()) {
	$v101_ho_list->StopRecord = $v101_ho_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v101_ho_list->TotalRecords > $v101_ho_list->StartRecord + $v101_ho_list->DisplayRecords - 1)
		$v101_ho_list->StopRecord = $v101_ho_list->StartRecord + $v101_ho_list->DisplayRecords - 1;
	else
		$v101_ho_list->StopRecord = $v101_ho_list->TotalRecords;
}
$v101_ho_list->RecordCount = $v101_ho_list->StartRecord - 1;
if ($v101_ho_list->Recordset && !$v101_ho_list->Recordset->EOF) {
	$v101_ho_list->Recordset->moveFirst();
	$selectLimit = $v101_ho_list->UseSelectLimit;
	if (!$selectLimit && $v101_ho_list->StartRecord > 1)
		$v101_ho_list->Recordset->move($v101_ho_list->StartRecord - 1);
} elseif (!$v101_ho->AllowAddDeleteRow && $v101_ho_list->StopRecord == 0) {
	$v101_ho_list->StopRecord = $v101_ho->GridAddRowCount;
}

// Initialize aggregate
$v101_ho->RowType = ROWTYPE_AGGREGATEINIT;
$v101_ho->resetAttributes();
$v101_ho_list->renderRow();
while ($v101_ho_list->RecordCount < $v101_ho_list->StopRecord) {
	$v101_ho_list->RecordCount++;
	if ($v101_ho_list->RecordCount >= $v101_ho_list->StartRecord) {
		$v101_ho_list->RowCount++;

		// Set up key count
		$v101_ho_list->KeyCount = $v101_ho_list->RowIndex;

		// Init row class and style
		$v101_ho->resetAttributes();
		$v101_ho->CssClass = "";
		if ($v101_ho_list->isGridAdd()) {
		} else {
			$v101_ho_list->loadRowValues($v101_ho_list->Recordset); // Load row values
		}
		$v101_ho->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v101_ho->RowAttrs->merge(["data-rowindex" => $v101_ho_list->RowCount, "id" => "r" . $v101_ho_list->RowCount . "_v101_ho", "data-rowtype" => $v101_ho->RowType]);

		// Render row
		$v101_ho_list->renderRow();

		// Render list options
		$v101_ho_list->renderListOptions();
?>
	<tr <?php echo $v101_ho->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v101_ho_list->ListOptions->render("body", "left", $v101_ho_list->RowCount);
?>
	<?php if ($v101_ho_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $v101_ho_list->id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_id">
<span<?php echo $v101_ho_list->id->viewAttributes() ?>><?php echo $v101_ho_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id" <?php echo $v101_ho_list->property_id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_property_id">
<span<?php echo $v101_ho_list->property_id->viewAttributes() ?>><?php echo $v101_ho_list->property_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->TransactionNo->Visible) { // TransactionNo ?>
		<td data-name="TransactionNo" <?php echo $v101_ho_list->TransactionNo->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_TransactionNo">
<span<?php echo $v101_ho_list->TransactionNo->viewAttributes() ?>><?php echo $v101_ho_list->TransactionNo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->TransactionDate->Visible) { // TransactionDate ?>
		<td data-name="TransactionDate" <?php echo $v101_ho_list->TransactionDate->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_TransactionDate">
<span<?php echo $v101_ho_list->TransactionDate->viewAttributes() ?>><?php echo $v101_ho_list->TransactionDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->HandedOverTo->Visible) { // HandedOverTo ?>
		<td data-name="HandedOverTo" <?php echo $v101_ho_list->HandedOverTo->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_HandedOverTo">
<span<?php echo $v101_ho_list->HandedOverTo->viewAttributes() ?>><?php echo $v101_ho_list->HandedOverTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->DepartmentTo->Visible) { // DepartmentTo ?>
		<td data-name="DepartmentTo" <?php echo $v101_ho_list->DepartmentTo->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_DepartmentTo">
<span<?php echo $v101_ho_list->DepartmentTo->viewAttributes() ?>><?php echo $v101_ho_list->DepartmentTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->HandedOverBy->Visible) { // HandedOverBy ?>
		<td data-name="HandedOverBy" <?php echo $v101_ho_list->HandedOverBy->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_HandedOverBy">
<span<?php echo $v101_ho_list->HandedOverBy->viewAttributes() ?>><?php echo $v101_ho_list->HandedOverBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->DepartmentBy->Visible) { // DepartmentBy ?>
		<td data-name="DepartmentBy" <?php echo $v101_ho_list->DepartmentBy->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_DepartmentBy">
<span<?php echo $v101_ho_list->DepartmentBy->viewAttributes() ?>><?php echo $v101_ho_list->DepartmentBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign1->Visible) { // Sign1 ?>
		<td data-name="Sign1" <?php echo $v101_ho_list->Sign1->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign1">
<span<?php echo $v101_ho_list->Sign1->viewAttributes() ?>><?php echo $v101_ho_list->Sign1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign2->Visible) { // Sign2 ?>
		<td data-name="Sign2" <?php echo $v101_ho_list->Sign2->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign2">
<span<?php echo $v101_ho_list->Sign2->viewAttributes() ?>><?php echo $v101_ho_list->Sign2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign3->Visible) { // Sign3 ?>
		<td data-name="Sign3" <?php echo $v101_ho_list->Sign3->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign3">
<span<?php echo $v101_ho_list->Sign3->viewAttributes() ?>><?php echo $v101_ho_list->Sign3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign4->Visible) { // Sign4 ?>
		<td data-name="Sign4" <?php echo $v101_ho_list->Sign4->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign4">
<span<?php echo $v101_ho_list->Sign4->viewAttributes() ?>><?php echo $v101_ho_list->Sign4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->hodetail_id->Visible) { // hodetail_id ?>
		<td data-name="hodetail_id" <?php echo $v101_ho_list->hodetail_id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_hodetail_id">
<span<?php echo $v101_ho_list->hodetail_id->viewAttributes() ?>><?php echo $v101_ho_list->hodetail_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $v101_ho_list->asset_id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_asset_id">
<span<?php echo $v101_ho_list->asset_id->viewAttributes() ?>><?php echo $v101_ho_list->asset_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Property->Visible) { // Property ?>
		<td data-name="Property" <?php echo $v101_ho_list->Property->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Property">
<span<?php echo $v101_ho_list->Property->viewAttributes() ?>><?php echo $v101_ho_list->Property->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->TemplateFile->Visible) { // TemplateFile ?>
		<td data-name="TemplateFile" <?php echo $v101_ho_list->TemplateFile->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_TemplateFile">
<span<?php echo $v101_ho_list->TemplateFile->viewAttributes() ?>><?php echo $v101_ho_list->TemplateFile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->hoDepartmentTo->Visible) { // hoDepartmentTo ?>
		<td data-name="hoDepartmentTo" <?php echo $v101_ho_list->hoDepartmentTo->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_hoDepartmentTo">
<span<?php echo $v101_ho_list->hoDepartmentTo->viewAttributes() ?>><?php echo $v101_ho_list->hoDepartmentTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->hoSignatureTo->Visible) { // hoSignatureTo ?>
		<td data-name="hoSignatureTo" <?php echo $v101_ho_list->hoSignatureTo->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_hoSignatureTo">
<span<?php echo $v101_ho_list->hoSignatureTo->viewAttributes() ?>><?php echo $v101_ho_list->hoSignatureTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->hoJobTitleTo->Visible) { // hoJobTitleTo ?>
		<td data-name="hoJobTitleTo" <?php echo $v101_ho_list->hoJobTitleTo->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_hoJobTitleTo">
<span<?php echo $v101_ho_list->hoJobTitleTo->viewAttributes() ?>><?php echo $v101_ho_list->hoJobTitleTo->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->hoDepartmentBy->Visible) { // hoDepartmentBy ?>
		<td data-name="hoDepartmentBy" <?php echo $v101_ho_list->hoDepartmentBy->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_hoDepartmentBy">
<span<?php echo $v101_ho_list->hoDepartmentBy->viewAttributes() ?>><?php echo $v101_ho_list->hoDepartmentBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->hoSignatureBy->Visible) { // hoSignatureBy ?>
		<td data-name="hoSignatureBy" <?php echo $v101_ho_list->hoSignatureBy->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_hoSignatureBy">
<span<?php echo $v101_ho_list->hoSignatureBy->viewAttributes() ?>><?php echo $v101_ho_list->hoSignatureBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->hoJobTitleBy->Visible) { // hoJobTitleBy ?>
		<td data-name="hoJobTitleBy" <?php echo $v101_ho_list->hoJobTitleBy->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_hoJobTitleBy">
<span<?php echo $v101_ho_list->hoJobTitleBy->viewAttributes() ?>><?php echo $v101_ho_list->hoJobTitleBy->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Code->Visible) { // Code ?>
		<td data-name="Code" <?php echo $v101_ho_list->Code->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Code">
<span<?php echo $v101_ho_list->Code->viewAttributes() ?>><?php echo $v101_ho_list->Code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Description->Visible) { // Description ?>
		<td data-name="Description" <?php echo $v101_ho_list->Description->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Description">
<span<?php echo $v101_ho_list->Description->viewAttributes() ?>><?php echo $v101_ho_list->Description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Type->Visible) { // Type ?>
		<td data-name="Type" <?php echo $v101_ho_list->Type->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Type">
<span<?php echo $v101_ho_list->Type->viewAttributes() ?>><?php echo $v101_ho_list->Type->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Group->Visible) { // Group ?>
		<td data-name="Group" <?php echo $v101_ho_list->Group->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Group">
<span<?php echo $v101_ho_list->Group->viewAttributes() ?>><?php echo $v101_ho_list->Group->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->ProcurementDate->Visible) { // ProcurementDate ?>
		<td data-name="ProcurementDate" <?php echo $v101_ho_list->ProcurementDate->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_ProcurementDate">
<span<?php echo $v101_ho_list->ProcurementDate->viewAttributes() ?>><?php echo $v101_ho_list->ProcurementDate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->ProcurementCurrentCost->Visible) { // ProcurementCurrentCost ?>
		<td data-name="ProcurementCurrentCost" <?php echo $v101_ho_list->ProcurementCurrentCost->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_ProcurementCurrentCost">
<span<?php echo $v101_ho_list->ProcurementCurrentCost->viewAttributes() ?>><?php echo $v101_ho_list->ProcurementCurrentCost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Estimated_Life_28in_Year29->Visible) { // Estimated Life (in Year) ?>
		<td data-name="Estimated_Life_28in_Year29" <?php echo $v101_ho_list->Estimated_Life_28in_Year29->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Estimated_Life_28in_Year29">
<span<?php echo $v101_ho_list->Estimated_Life_28in_Year29->viewAttributes() ?>><?php echo $v101_ho_list->Estimated_Life_28in_Year29->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Qty->Visible) { // Qty ?>
		<td data-name="Qty" <?php echo $v101_ho_list->Qty->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Qty">
<span<?php echo $v101_ho_list->Qty->viewAttributes() ?>><?php echo $v101_ho_list->Qty->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign1Signature->Visible) { // Sign1Signature ?>
		<td data-name="Sign1Signature" <?php echo $v101_ho_list->Sign1Signature->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign1Signature">
<span<?php echo $v101_ho_list->Sign1Signature->viewAttributes() ?>><?php echo $v101_ho_list->Sign1Signature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign1JobTitle->Visible) { // Sign1JobTitle ?>
		<td data-name="Sign1JobTitle" <?php echo $v101_ho_list->Sign1JobTitle->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign1JobTitle">
<span<?php echo $v101_ho_list->Sign1JobTitle->viewAttributes() ?>><?php echo $v101_ho_list->Sign1JobTitle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign2Signature->Visible) { // Sign2Signature ?>
		<td data-name="Sign2Signature" <?php echo $v101_ho_list->Sign2Signature->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign2Signature">
<span<?php echo $v101_ho_list->Sign2Signature->viewAttributes() ?>><?php echo $v101_ho_list->Sign2Signature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign2JobTitle->Visible) { // Sign2JobTitle ?>
		<td data-name="Sign2JobTitle" <?php echo $v101_ho_list->Sign2JobTitle->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign2JobTitle">
<span<?php echo $v101_ho_list->Sign2JobTitle->viewAttributes() ?>><?php echo $v101_ho_list->Sign2JobTitle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign3Signature->Visible) { // Sign3Signature ?>
		<td data-name="Sign3Signature" <?php echo $v101_ho_list->Sign3Signature->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign3Signature">
<span<?php echo $v101_ho_list->Sign3Signature->viewAttributes() ?>><?php echo $v101_ho_list->Sign3Signature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign3JobTitle->Visible) { // Sign3JobTitle ?>
		<td data-name="Sign3JobTitle" <?php echo $v101_ho_list->Sign3JobTitle->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign3JobTitle">
<span<?php echo $v101_ho_list->Sign3JobTitle->viewAttributes() ?>><?php echo $v101_ho_list->Sign3JobTitle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign4Signature->Visible) { // Sign4Signature ?>
		<td data-name="Sign4Signature" <?php echo $v101_ho_list->Sign4Signature->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign4Signature">
<span<?php echo $v101_ho_list->Sign4Signature->viewAttributes() ?>><?php echo $v101_ho_list->Sign4Signature->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->Sign4JobTitle->Visible) { // Sign4JobTitle ?>
		<td data-name="Sign4JobTitle" <?php echo $v101_ho_list->Sign4JobTitle->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_Sign4JobTitle">
<span<?php echo $v101_ho_list->Sign4JobTitle->viewAttributes() ?>><?php echo $v101_ho_list->Sign4JobTitle->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_list->AssetDepartment->Visible) { // AssetDepartment ?>
		<td data-name="AssetDepartment" <?php echo $v101_ho_list->AssetDepartment->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_list->RowCount ?>_v101_ho_AssetDepartment">
<span<?php echo $v101_ho_list->AssetDepartment->viewAttributes() ?>><?php echo $v101_ho_list->AssetDepartment->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v101_ho_list->ListOptions->render("body", "right", $v101_ho_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v101_ho_list->isGridAdd())
		$v101_ho_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v101_ho->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v101_ho_list->Recordset)
	$v101_ho_list->Recordset->Close();
?>
<?php if (!$v101_ho_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v101_ho_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v101_ho_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v101_ho_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v101_ho_list->TotalRecords == 0 && !$v101_ho->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v101_ho_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v101_ho_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v101_ho_list->isExport()) { ?>
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
$v101_ho_list->terminate();
?>