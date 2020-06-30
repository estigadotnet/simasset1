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
$v101_ho_2_list = new v101_ho_2_list();

// Run the page
$v101_ho_2_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v101_ho_2_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v101_ho_2_list->isExport()) { ?>
<script>
var fv101_ho_2list, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv101_ho_2list = currentForm = new ew.Form("fv101_ho_2list", "list");
	fv101_ho_2list.formKeyCountName = '<?php echo $v101_ho_2_list->FormKeyCountName ?>';
	loadjs.done("fv101_ho_2list");
});
var fv101_ho_2listsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv101_ho_2listsrch = currentSearchForm = new ew.Form("fv101_ho_2listsrch");

	// Dynamic selection lists
	// Filters

	fv101_ho_2listsrch.filterList = <?php echo $v101_ho_2_list->getFilterList() ?>;
	loadjs.done("fv101_ho_2listsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v101_ho_2_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v101_ho_2_list->TotalRecords > 0 && $v101_ho_2_list->ExportOptions->visible()) { ?>
<?php $v101_ho_2_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_ho_2_list->ImportOptions->visible()) { ?>
<?php $v101_ho_2_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v101_ho_2_list->SearchOptions->visible()) { ?>
<?php $v101_ho_2_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v101_ho_2_list->FilterOptions->visible()) { ?>
<?php $v101_ho_2_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v101_ho_2_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v101_ho_2_list->isExport() && !$v101_ho_2->CurrentAction) { ?>
<form name="fv101_ho_2listsrch" id="fv101_ho_2listsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv101_ho_2listsrch-search-panel" class="<?php echo $v101_ho_2_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v101_ho_2">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v101_ho_2_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v101_ho_2_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v101_ho_2_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v101_ho_2_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v101_ho_2_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v101_ho_2_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v101_ho_2_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v101_ho_2_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v101_ho_2_list->showPageHeader(); ?>
<?php
$v101_ho_2_list->showMessage();
?>
<?php if ($v101_ho_2_list->TotalRecords > 0 || $v101_ho_2->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v101_ho_2_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v101_ho_2">
<form name="fv101_ho_2list" id="fv101_ho_2list" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v101_ho_2">
<div id="gmp_v101_ho_2" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v101_ho_2_list->TotalRecords > 0 || $v101_ho_2_list->isGridEdit()) { ?>
<table id="tbl_v101_ho_2list" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v101_ho_2->RowType = ROWTYPE_HEADER;

// Render list options
$v101_ho_2_list->renderListOptions();

// Render list options (header, left)
$v101_ho_2_list->ListOptions->render("header", "left");
?>
<?php if ($v101_ho_2_list->id->Visible) { // id ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $v101_ho_2_list->id->headerCellClass() ?>"><div id="elh_v101_ho_2_id" class="v101_ho_2_id"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $v101_ho_2_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->id) ?>', 2);"><div id="elh_v101_ho_2_id" class="v101_ho_2_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->property_id->Visible) { // property_id ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->property_id) == "") { ?>
		<th data-name="property_id" class="<?php echo $v101_ho_2_list->property_id->headerCellClass() ?>"><div id="elh_v101_ho_2_property_id" class="v101_ho_2_property_id"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->property_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property_id" class="<?php echo $v101_ho_2_list->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->property_id) ?>', 2);"><div id="elh_v101_ho_2_property_id" class="v101_ho_2_property_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->property->Visible) { // property ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->property) == "") { ?>
		<th data-name="property" class="<?php echo $v101_ho_2_list->property->headerCellClass() ?>"><div id="elh_v101_ho_2_property" class="v101_ho_2_property"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->property->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property" class="<?php echo $v101_ho_2_list->property->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->property) ?>', 2);"><div id="elh_v101_ho_2_property" class="v101_ho_2_property">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->property->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->property->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->property->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->templatefile->Visible) { // templatefile ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->templatefile) == "") { ?>
		<th data-name="templatefile" class="<?php echo $v101_ho_2_list->templatefile->headerCellClass() ?>"><div id="elh_v101_ho_2_templatefile" class="v101_ho_2_templatefile"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->templatefile->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="templatefile" class="<?php echo $v101_ho_2_list->templatefile->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->templatefile) ?>', 2);"><div id="elh_v101_ho_2_templatefile" class="v101_ho_2_templatefile">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->templatefile->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->templatefile->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->templatefile->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->transactionno->Visible) { // transactionno ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->transactionno) == "") { ?>
		<th data-name="transactionno" class="<?php echo $v101_ho_2_list->transactionno->headerCellClass() ?>"><div id="elh_v101_ho_2_transactionno" class="v101_ho_2_transactionno"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->transactionno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transactionno" class="<?php echo $v101_ho_2_list->transactionno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->transactionno) ?>', 2);"><div id="elh_v101_ho_2_transactionno" class="v101_ho_2_transactionno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->transactionno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->transactionno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->transactionno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->transactiondate->Visible) { // transactiondate ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->transactiondate) == "") { ?>
		<th data-name="transactiondate" class="<?php echo $v101_ho_2_list->transactiondate->headerCellClass() ?>"><div id="elh_v101_ho_2_transactiondate" class="v101_ho_2_transactiondate"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->transactiondate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transactiondate" class="<?php echo $v101_ho_2_list->transactiondate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->transactiondate) ?>', 2);"><div id="elh_v101_ho_2_transactiondate" class="v101_ho_2_transactiondate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->transactiondate->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->transactiondate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->transactiondate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->handedoverto->Visible) { // handedoverto ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->handedoverto) == "") { ?>
		<th data-name="handedoverto" class="<?php echo $v101_ho_2_list->handedoverto->headerCellClass() ?>"><div id="elh_v101_ho_2_handedoverto" class="v101_ho_2_handedoverto"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->handedoverto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="handedoverto" class="<?php echo $v101_ho_2_list->handedoverto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->handedoverto) ?>', 2);"><div id="elh_v101_ho_2_handedoverto" class="v101_ho_2_handedoverto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->handedoverto->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->handedoverto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->handedoverto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->hoto->Visible) { // hoto ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->hoto) == "") { ?>
		<th data-name="hoto" class="<?php echo $v101_ho_2_list->hoto->headerCellClass() ?>"><div id="elh_v101_ho_2_hoto" class="v101_ho_2_hoto"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->hoto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoto" class="<?php echo $v101_ho_2_list->hoto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->hoto) ?>', 2);"><div id="elh_v101_ho_2_hoto" class="v101_ho_2_hoto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->hoto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->hoto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->hoto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->departmentto->Visible) { // departmentto ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->departmentto) == "") { ?>
		<th data-name="departmentto" class="<?php echo $v101_ho_2_list->departmentto->headerCellClass() ?>"><div id="elh_v101_ho_2_departmentto" class="v101_ho_2_departmentto"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->departmentto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="departmentto" class="<?php echo $v101_ho_2_list->departmentto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->departmentto) ?>', 2);"><div id="elh_v101_ho_2_departmentto" class="v101_ho_2_departmentto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->departmentto->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->departmentto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->departmentto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->deptto->Visible) { // deptto ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->deptto) == "") { ?>
		<th data-name="deptto" class="<?php echo $v101_ho_2_list->deptto->headerCellClass() ?>"><div id="elh_v101_ho_2_deptto" class="v101_ho_2_deptto"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->deptto->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="deptto" class="<?php echo $v101_ho_2_list->deptto->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->deptto) ?>', 2);"><div id="elh_v101_ho_2_deptto" class="v101_ho_2_deptto">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->deptto->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->deptto->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->deptto->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->handedoverby->Visible) { // handedoverby ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->handedoverby) == "") { ?>
		<th data-name="handedoverby" class="<?php echo $v101_ho_2_list->handedoverby->headerCellClass() ?>"><div id="elh_v101_ho_2_handedoverby" class="v101_ho_2_handedoverby"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->handedoverby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="handedoverby" class="<?php echo $v101_ho_2_list->handedoverby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->handedoverby) ?>', 2);"><div id="elh_v101_ho_2_handedoverby" class="v101_ho_2_handedoverby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->handedoverby->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->handedoverby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->handedoverby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->hoby->Visible) { // hoby ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->hoby) == "") { ?>
		<th data-name="hoby" class="<?php echo $v101_ho_2_list->hoby->headerCellClass() ?>"><div id="elh_v101_ho_2_hoby" class="v101_ho_2_hoby"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->hoby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hoby" class="<?php echo $v101_ho_2_list->hoby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->hoby) ?>', 2);"><div id="elh_v101_ho_2_hoby" class="v101_ho_2_hoby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->hoby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->hoby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->hoby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->departmentby->Visible) { // departmentby ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->departmentby) == "") { ?>
		<th data-name="departmentby" class="<?php echo $v101_ho_2_list->departmentby->headerCellClass() ?>"><div id="elh_v101_ho_2_departmentby" class="v101_ho_2_departmentby"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->departmentby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="departmentby" class="<?php echo $v101_ho_2_list->departmentby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->departmentby) ?>', 2);"><div id="elh_v101_ho_2_departmentby" class="v101_ho_2_departmentby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->departmentby->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->departmentby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->departmentby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->deptby->Visible) { // deptby ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->deptby) == "") { ?>
		<th data-name="deptby" class="<?php echo $v101_ho_2_list->deptby->headerCellClass() ?>"><div id="elh_v101_ho_2_deptby" class="v101_ho_2_deptby"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->deptby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="deptby" class="<?php echo $v101_ho_2_list->deptby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->deptby) ?>', 2);"><div id="elh_v101_ho_2_deptby" class="v101_ho_2_deptby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->deptby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->deptby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->deptby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->sign1->Visible) { // sign1 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->sign1) == "") { ?>
		<th data-name="sign1" class="<?php echo $v101_ho_2_list->sign1->headerCellClass() ?>"><div id="elh_v101_ho_2_sign1" class="v101_ho_2_sign1"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign1" class="<?php echo $v101_ho_2_list->sign1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->sign1) ?>', 2);"><div id="elh_v101_ho_2_sign1" class="v101_ho_2_sign1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign1->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->sign1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->sign1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->signa1->Visible) { // signa1 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->signa1) == "") { ?>
		<th data-name="signa1" class="<?php echo $v101_ho_2_list->signa1->headerCellClass() ?>"><div id="elh_v101_ho_2_signa1" class="v101_ho_2_signa1"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signa1" class="<?php echo $v101_ho_2_list->signa1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->signa1) ?>', 2);"><div id="elh_v101_ho_2_signa1" class="v101_ho_2_signa1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->signa1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->signa1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->jobt1->Visible) { // jobt1 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->jobt1) == "") { ?>
		<th data-name="jobt1" class="<?php echo $v101_ho_2_list->jobt1->headerCellClass() ?>"><div id="elh_v101_ho_2_jobt1" class="v101_ho_2_jobt1"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobt1" class="<?php echo $v101_ho_2_list->jobt1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->jobt1) ?>', 2);"><div id="elh_v101_ho_2_jobt1" class="v101_ho_2_jobt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->jobt1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->jobt1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->sign2->Visible) { // sign2 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->sign2) == "") { ?>
		<th data-name="sign2" class="<?php echo $v101_ho_2_list->sign2->headerCellClass() ?>"><div id="elh_v101_ho_2_sign2" class="v101_ho_2_sign2"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign2" class="<?php echo $v101_ho_2_list->sign2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->sign2) ?>', 2);"><div id="elh_v101_ho_2_sign2" class="v101_ho_2_sign2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign2->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->sign2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->sign2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->signa2->Visible) { // signa2 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->signa2) == "") { ?>
		<th data-name="signa2" class="<?php echo $v101_ho_2_list->signa2->headerCellClass() ?>"><div id="elh_v101_ho_2_signa2" class="v101_ho_2_signa2"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signa2" class="<?php echo $v101_ho_2_list->signa2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->signa2) ?>', 2);"><div id="elh_v101_ho_2_signa2" class="v101_ho_2_signa2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->signa2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->signa2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->jobt2->Visible) { // jobt2 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->jobt2) == "") { ?>
		<th data-name="jobt2" class="<?php echo $v101_ho_2_list->jobt2->headerCellClass() ?>"><div id="elh_v101_ho_2_jobt2" class="v101_ho_2_jobt2"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobt2" class="<?php echo $v101_ho_2_list->jobt2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->jobt2) ?>', 2);"><div id="elh_v101_ho_2_jobt2" class="v101_ho_2_jobt2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->jobt2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->jobt2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->sign3->Visible) { // sign3 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->sign3) == "") { ?>
		<th data-name="sign3" class="<?php echo $v101_ho_2_list->sign3->headerCellClass() ?>"><div id="elh_v101_ho_2_sign3" class="v101_ho_2_sign3"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign3" class="<?php echo $v101_ho_2_list->sign3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->sign3) ?>', 2);"><div id="elh_v101_ho_2_sign3" class="v101_ho_2_sign3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign3->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->sign3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->sign3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->signa3->Visible) { // signa3 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->signa3) == "") { ?>
		<th data-name="signa3" class="<?php echo $v101_ho_2_list->signa3->headerCellClass() ?>"><div id="elh_v101_ho_2_signa3" class="v101_ho_2_signa3"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signa3" class="<?php echo $v101_ho_2_list->signa3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->signa3) ?>', 2);"><div id="elh_v101_ho_2_signa3" class="v101_ho_2_signa3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->signa3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->signa3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->jobt3->Visible) { // jobt3 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->jobt3) == "") { ?>
		<th data-name="jobt3" class="<?php echo $v101_ho_2_list->jobt3->headerCellClass() ?>"><div id="elh_v101_ho_2_jobt3" class="v101_ho_2_jobt3"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobt3" class="<?php echo $v101_ho_2_list->jobt3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->jobt3) ?>', 2);"><div id="elh_v101_ho_2_jobt3" class="v101_ho_2_jobt3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->jobt3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->jobt3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->sign4->Visible) { // sign4 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->sign4) == "") { ?>
		<th data-name="sign4" class="<?php echo $v101_ho_2_list->sign4->headerCellClass() ?>"><div id="elh_v101_ho_2_sign4" class="v101_ho_2_sign4"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign4" class="<?php echo $v101_ho_2_list->sign4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->sign4) ?>', 2);"><div id="elh_v101_ho_2_sign4" class="v101_ho_2_sign4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->sign4->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->sign4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->sign4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->signa4->Visible) { // signa4 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->signa4) == "") { ?>
		<th data-name="signa4" class="<?php echo $v101_ho_2_list->signa4->headerCellClass() ?>"><div id="elh_v101_ho_2_signa4" class="v101_ho_2_signa4"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signa4" class="<?php echo $v101_ho_2_list->signa4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->signa4) ?>', 2);"><div id="elh_v101_ho_2_signa4" class="v101_ho_2_signa4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->signa4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->signa4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->signa4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->jobt4->Visible) { // jobt4 ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->jobt4) == "") { ?>
		<th data-name="jobt4" class="<?php echo $v101_ho_2_list->jobt4->headerCellClass() ?>"><div id="elh_v101_ho_2_jobt4" class="v101_ho_2_jobt4"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt4->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobt4" class="<?php echo $v101_ho_2_list->jobt4->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->jobt4) ?>', 2);"><div id="elh_v101_ho_2_jobt4" class="v101_ho_2_jobt4">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->jobt4->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->jobt4->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->jobt4->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->hodetail_id->Visible) { // hodetail_id ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->hodetail_id) == "") { ?>
		<th data-name="hodetail_id" class="<?php echo $v101_ho_2_list->hodetail_id->headerCellClass() ?>"><div id="elh_v101_ho_2_hodetail_id" class="v101_ho_2_hodetail_id"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->hodetail_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="hodetail_id" class="<?php echo $v101_ho_2_list->hodetail_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->hodetail_id) ?>', 2);"><div id="elh_v101_ho_2_hodetail_id" class="v101_ho_2_hodetail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->hodetail_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->hodetail_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->hodetail_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->asset_id->Visible) { // asset_id ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $v101_ho_2_list->asset_id->headerCellClass() ?>"><div id="elh_v101_ho_2_asset_id" class="v101_ho_2_asset_id"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $v101_ho_2_list->asset_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->asset_id) ?>', 2);"><div id="elh_v101_ho_2_asset_id" class="v101_ho_2_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->code->Visible) { // code ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->code) == "") { ?>
		<th data-name="code" class="<?php echo $v101_ho_2_list->code->headerCellClass() ?>"><div id="elh_v101_ho_2_code" class="v101_ho_2_code"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="code" class="<?php echo $v101_ho_2_list->code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->code) ?>', 2);"><div id="elh_v101_ho_2_code" class="v101_ho_2_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->description->Visible) { // description ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->description) == "") { ?>
		<th data-name="description" class="<?php echo $v101_ho_2_list->description->headerCellClass() ?>"><div id="elh_v101_ho_2_description" class="v101_ho_2_description"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $v101_ho_2_list->description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->description) ?>', 2);"><div id="elh_v101_ho_2_description" class="v101_ho_2_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->department_id->Visible) { // department_id ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->department_id) == "") { ?>
		<th data-name="department_id" class="<?php echo $v101_ho_2_list->department_id->headerCellClass() ?>"><div id="elh_v101_ho_2_department_id" class="v101_ho_2_department_id"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->department_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department_id" class="<?php echo $v101_ho_2_list->department_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->department_id) ?>', 2);"><div id="elh_v101_ho_2_department_id" class="v101_ho_2_department_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->department_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->department_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->department_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->asset_dept->Visible) { // asset_dept ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->asset_dept) == "") { ?>
		<th data-name="asset_dept" class="<?php echo $v101_ho_2_list->asset_dept->headerCellClass() ?>"><div id="elh_v101_ho_2_asset_dept" class="v101_ho_2_asset_dept"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->asset_dept->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_dept" class="<?php echo $v101_ho_2_list->asset_dept->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->asset_dept) ?>', 2);"><div id="elh_v101_ho_2_asset_dept" class="v101_ho_2_asset_dept">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->asset_dept->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->asset_dept->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->asset_dept->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->procurementdate->Visible) { // procurementdate ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->procurementdate) == "") { ?>
		<th data-name="procurementdate" class="<?php echo $v101_ho_2_list->procurementdate->headerCellClass() ?>"><div id="elh_v101_ho_2_procurementdate" class="v101_ho_2_procurementdate"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->procurementdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="procurementdate" class="<?php echo $v101_ho_2_list->procurementdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->procurementdate) ?>', 2);"><div id="elh_v101_ho_2_procurementdate" class="v101_ho_2_procurementdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->procurementdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->procurementdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->procurementdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v101_ho_2_list->procurementcurrentcost->Visible) { // procurementcurrentcost ?>
	<?php if ($v101_ho_2_list->SortUrl($v101_ho_2_list->procurementcurrentcost) == "") { ?>
		<th data-name="procurementcurrentcost" class="<?php echo $v101_ho_2_list->procurementcurrentcost->headerCellClass() ?>"><div id="elh_v101_ho_2_procurementcurrentcost" class="v101_ho_2_procurementcurrentcost"><div class="ew-table-header-caption"><?php echo $v101_ho_2_list->procurementcurrentcost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="procurementcurrentcost" class="<?php echo $v101_ho_2_list->procurementcurrentcost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v101_ho_2_list->SortUrl($v101_ho_2_list->procurementcurrentcost) ?>', 2);"><div id="elh_v101_ho_2_procurementcurrentcost" class="v101_ho_2_procurementcurrentcost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v101_ho_2_list->procurementcurrentcost->caption() ?></span><span class="ew-table-header-sort"><?php if ($v101_ho_2_list->procurementcurrentcost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v101_ho_2_list->procurementcurrentcost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v101_ho_2_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v101_ho_2_list->ExportAll && $v101_ho_2_list->isExport()) {
	$v101_ho_2_list->StopRecord = $v101_ho_2_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v101_ho_2_list->TotalRecords > $v101_ho_2_list->StartRecord + $v101_ho_2_list->DisplayRecords - 1)
		$v101_ho_2_list->StopRecord = $v101_ho_2_list->StartRecord + $v101_ho_2_list->DisplayRecords - 1;
	else
		$v101_ho_2_list->StopRecord = $v101_ho_2_list->TotalRecords;
}
$v101_ho_2_list->RecordCount = $v101_ho_2_list->StartRecord - 1;
if ($v101_ho_2_list->Recordset && !$v101_ho_2_list->Recordset->EOF) {
	$v101_ho_2_list->Recordset->moveFirst();
	$selectLimit = $v101_ho_2_list->UseSelectLimit;
	if (!$selectLimit && $v101_ho_2_list->StartRecord > 1)
		$v101_ho_2_list->Recordset->move($v101_ho_2_list->StartRecord - 1);
} elseif (!$v101_ho_2->AllowAddDeleteRow && $v101_ho_2_list->StopRecord == 0) {
	$v101_ho_2_list->StopRecord = $v101_ho_2->GridAddRowCount;
}

// Initialize aggregate
$v101_ho_2->RowType = ROWTYPE_AGGREGATEINIT;
$v101_ho_2->resetAttributes();
$v101_ho_2_list->renderRow();
while ($v101_ho_2_list->RecordCount < $v101_ho_2_list->StopRecord) {
	$v101_ho_2_list->RecordCount++;
	if ($v101_ho_2_list->RecordCount >= $v101_ho_2_list->StartRecord) {
		$v101_ho_2_list->RowCount++;

		// Set up key count
		$v101_ho_2_list->KeyCount = $v101_ho_2_list->RowIndex;

		// Init row class and style
		$v101_ho_2->resetAttributes();
		$v101_ho_2->CssClass = "";
		if ($v101_ho_2_list->isGridAdd()) {
		} else {
			$v101_ho_2_list->loadRowValues($v101_ho_2_list->Recordset); // Load row values
		}
		$v101_ho_2->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v101_ho_2->RowAttrs->merge(["data-rowindex" => $v101_ho_2_list->RowCount, "id" => "r" . $v101_ho_2_list->RowCount . "_v101_ho_2", "data-rowtype" => $v101_ho_2->RowType]);

		// Render row
		$v101_ho_2_list->renderRow();

		// Render list options
		$v101_ho_2_list->renderListOptions();
?>
	<tr <?php echo $v101_ho_2->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v101_ho_2_list->ListOptions->render("body", "left", $v101_ho_2_list->RowCount);
?>
	<?php if ($v101_ho_2_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $v101_ho_2_list->id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_id">
<span<?php echo $v101_ho_2_list->id->viewAttributes() ?>><?php echo $v101_ho_2_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id" <?php echo $v101_ho_2_list->property_id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_property_id">
<span<?php echo $v101_ho_2_list->property_id->viewAttributes() ?>><?php echo $v101_ho_2_list->property_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->property->Visible) { // property ?>
		<td data-name="property" <?php echo $v101_ho_2_list->property->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_property">
<span<?php echo $v101_ho_2_list->property->viewAttributes() ?>><?php echo $v101_ho_2_list->property->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->templatefile->Visible) { // templatefile ?>
		<td data-name="templatefile" <?php echo $v101_ho_2_list->templatefile->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_templatefile">
<span<?php echo $v101_ho_2_list->templatefile->viewAttributes() ?>><?php echo $v101_ho_2_list->templatefile->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->transactionno->Visible) { // transactionno ?>
		<td data-name="transactionno" <?php echo $v101_ho_2_list->transactionno->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_transactionno">
<span<?php echo $v101_ho_2_list->transactionno->viewAttributes() ?>><?php echo $v101_ho_2_list->transactionno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->transactiondate->Visible) { // transactiondate ?>
		<td data-name="transactiondate" <?php echo $v101_ho_2_list->transactiondate->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_transactiondate">
<span<?php echo $v101_ho_2_list->transactiondate->viewAttributes() ?>><?php echo $v101_ho_2_list->transactiondate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->handedoverto->Visible) { // handedoverto ?>
		<td data-name="handedoverto" <?php echo $v101_ho_2_list->handedoverto->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_handedoverto">
<span<?php echo $v101_ho_2_list->handedoverto->viewAttributes() ?>><?php echo $v101_ho_2_list->handedoverto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->hoto->Visible) { // hoto ?>
		<td data-name="hoto" <?php echo $v101_ho_2_list->hoto->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_hoto">
<span<?php echo $v101_ho_2_list->hoto->viewAttributes() ?>><?php echo $v101_ho_2_list->hoto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->departmentto->Visible) { // departmentto ?>
		<td data-name="departmentto" <?php echo $v101_ho_2_list->departmentto->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_departmentto">
<span<?php echo $v101_ho_2_list->departmentto->viewAttributes() ?>><?php echo $v101_ho_2_list->departmentto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->deptto->Visible) { // deptto ?>
		<td data-name="deptto" <?php echo $v101_ho_2_list->deptto->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_deptto">
<span<?php echo $v101_ho_2_list->deptto->viewAttributes() ?>><?php echo $v101_ho_2_list->deptto->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->handedoverby->Visible) { // handedoverby ?>
		<td data-name="handedoverby" <?php echo $v101_ho_2_list->handedoverby->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_handedoverby">
<span<?php echo $v101_ho_2_list->handedoverby->viewAttributes() ?>><?php echo $v101_ho_2_list->handedoverby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->hoby->Visible) { // hoby ?>
		<td data-name="hoby" <?php echo $v101_ho_2_list->hoby->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_hoby">
<span<?php echo $v101_ho_2_list->hoby->viewAttributes() ?>><?php echo $v101_ho_2_list->hoby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->departmentby->Visible) { // departmentby ?>
		<td data-name="departmentby" <?php echo $v101_ho_2_list->departmentby->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_departmentby">
<span<?php echo $v101_ho_2_list->departmentby->viewAttributes() ?>><?php echo $v101_ho_2_list->departmentby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->deptby->Visible) { // deptby ?>
		<td data-name="deptby" <?php echo $v101_ho_2_list->deptby->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_deptby">
<span<?php echo $v101_ho_2_list->deptby->viewAttributes() ?>><?php echo $v101_ho_2_list->deptby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->sign1->Visible) { // sign1 ?>
		<td data-name="sign1" <?php echo $v101_ho_2_list->sign1->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_sign1">
<span<?php echo $v101_ho_2_list->sign1->viewAttributes() ?>><?php echo $v101_ho_2_list->sign1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->signa1->Visible) { // signa1 ?>
		<td data-name="signa1" <?php echo $v101_ho_2_list->signa1->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_signa1">
<span<?php echo $v101_ho_2_list->signa1->viewAttributes() ?>><?php echo $v101_ho_2_list->signa1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->jobt1->Visible) { // jobt1 ?>
		<td data-name="jobt1" <?php echo $v101_ho_2_list->jobt1->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_jobt1">
<span<?php echo $v101_ho_2_list->jobt1->viewAttributes() ?>><?php echo $v101_ho_2_list->jobt1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->sign2->Visible) { // sign2 ?>
		<td data-name="sign2" <?php echo $v101_ho_2_list->sign2->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_sign2">
<span<?php echo $v101_ho_2_list->sign2->viewAttributes() ?>><?php echo $v101_ho_2_list->sign2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->signa2->Visible) { // signa2 ?>
		<td data-name="signa2" <?php echo $v101_ho_2_list->signa2->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_signa2">
<span<?php echo $v101_ho_2_list->signa2->viewAttributes() ?>><?php echo $v101_ho_2_list->signa2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->jobt2->Visible) { // jobt2 ?>
		<td data-name="jobt2" <?php echo $v101_ho_2_list->jobt2->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_jobt2">
<span<?php echo $v101_ho_2_list->jobt2->viewAttributes() ?>><?php echo $v101_ho_2_list->jobt2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->sign3->Visible) { // sign3 ?>
		<td data-name="sign3" <?php echo $v101_ho_2_list->sign3->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_sign3">
<span<?php echo $v101_ho_2_list->sign3->viewAttributes() ?>><?php echo $v101_ho_2_list->sign3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->signa3->Visible) { // signa3 ?>
		<td data-name="signa3" <?php echo $v101_ho_2_list->signa3->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_signa3">
<span<?php echo $v101_ho_2_list->signa3->viewAttributes() ?>><?php echo $v101_ho_2_list->signa3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->jobt3->Visible) { // jobt3 ?>
		<td data-name="jobt3" <?php echo $v101_ho_2_list->jobt3->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_jobt3">
<span<?php echo $v101_ho_2_list->jobt3->viewAttributes() ?>><?php echo $v101_ho_2_list->jobt3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->sign4->Visible) { // sign4 ?>
		<td data-name="sign4" <?php echo $v101_ho_2_list->sign4->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_sign4">
<span<?php echo $v101_ho_2_list->sign4->viewAttributes() ?>><?php echo $v101_ho_2_list->sign4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->signa4->Visible) { // signa4 ?>
		<td data-name="signa4" <?php echo $v101_ho_2_list->signa4->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_signa4">
<span<?php echo $v101_ho_2_list->signa4->viewAttributes() ?>><?php echo $v101_ho_2_list->signa4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->jobt4->Visible) { // jobt4 ?>
		<td data-name="jobt4" <?php echo $v101_ho_2_list->jobt4->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_jobt4">
<span<?php echo $v101_ho_2_list->jobt4->viewAttributes() ?>><?php echo $v101_ho_2_list->jobt4->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->hodetail_id->Visible) { // hodetail_id ?>
		<td data-name="hodetail_id" <?php echo $v101_ho_2_list->hodetail_id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_hodetail_id">
<span<?php echo $v101_ho_2_list->hodetail_id->viewAttributes() ?>><?php echo $v101_ho_2_list->hodetail_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $v101_ho_2_list->asset_id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_asset_id">
<span<?php echo $v101_ho_2_list->asset_id->viewAttributes() ?>><?php echo $v101_ho_2_list->asset_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->code->Visible) { // code ?>
		<td data-name="code" <?php echo $v101_ho_2_list->code->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_code">
<span<?php echo $v101_ho_2_list->code->viewAttributes() ?>><?php echo $v101_ho_2_list->code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->description->Visible) { // description ?>
		<td data-name="description" <?php echo $v101_ho_2_list->description->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_description">
<span<?php echo $v101_ho_2_list->description->viewAttributes() ?>><?php echo $v101_ho_2_list->description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->department_id->Visible) { // department_id ?>
		<td data-name="department_id" <?php echo $v101_ho_2_list->department_id->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_department_id">
<span<?php echo $v101_ho_2_list->department_id->viewAttributes() ?>><?php echo $v101_ho_2_list->department_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->asset_dept->Visible) { // asset_dept ?>
		<td data-name="asset_dept" <?php echo $v101_ho_2_list->asset_dept->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_asset_dept">
<span<?php echo $v101_ho_2_list->asset_dept->viewAttributes() ?>><?php echo $v101_ho_2_list->asset_dept->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->procurementdate->Visible) { // procurementdate ?>
		<td data-name="procurementdate" <?php echo $v101_ho_2_list->procurementdate->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_procurementdate">
<span<?php echo $v101_ho_2_list->procurementdate->viewAttributes() ?>><?php echo $v101_ho_2_list->procurementdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v101_ho_2_list->procurementcurrentcost->Visible) { // procurementcurrentcost ?>
		<td data-name="procurementcurrentcost" <?php echo $v101_ho_2_list->procurementcurrentcost->cellAttributes() ?>>
<span id="el<?php echo $v101_ho_2_list->RowCount ?>_v101_ho_2_procurementcurrentcost">
<span<?php echo $v101_ho_2_list->procurementcurrentcost->viewAttributes() ?>><?php echo $v101_ho_2_list->procurementcurrentcost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v101_ho_2_list->ListOptions->render("body", "right", $v101_ho_2_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v101_ho_2_list->isGridAdd())
		$v101_ho_2_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v101_ho_2->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v101_ho_2_list->Recordset)
	$v101_ho_2_list->Recordset->Close();
?>
<?php if (!$v101_ho_2_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v101_ho_2_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v101_ho_2_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v101_ho_2_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v101_ho_2_list->TotalRecords == 0 && !$v101_ho_2->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v101_ho_2_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v101_ho_2_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v101_ho_2_list->isExport()) { ?>
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
$v101_ho_2_list->terminate();
?>