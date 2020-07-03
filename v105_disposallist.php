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
$v105_disposal_list = new v105_disposal_list();

// Run the page
$v105_disposal_list->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$v105_disposal_list->Page_Render();
?>
<?php include_once "header.php"; ?>
<?php if (!$v105_disposal_list->isExport()) { ?>
<script>
var fv105_disposallist, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "list";
	fv105_disposallist = currentForm = new ew.Form("fv105_disposallist", "list");
	fv105_disposallist.formKeyCountName = '<?php echo $v105_disposal_list->FormKeyCountName ?>';
	loadjs.done("fv105_disposallist");
});
var fv105_disposallistsrch;
loadjs.ready("head", function() {

	// Form object for search
	fv105_disposallistsrch = currentSearchForm = new ew.Form("fv105_disposallistsrch");

	// Dynamic selection lists
	// Filters

	fv105_disposallistsrch.filterList = <?php echo $v105_disposal_list->getFilterList() ?>;
	loadjs.done("fv105_disposallistsrch");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php } ?>
<?php if (!$v105_disposal_list->isExport()) { ?>
<div class="btn-toolbar ew-toolbar">
<?php if ($v105_disposal_list->TotalRecords > 0 && $v105_disposal_list->ExportOptions->visible()) { ?>
<?php $v105_disposal_list->ExportOptions->render("body") ?>
<?php } ?>
<?php if ($v105_disposal_list->ImportOptions->visible()) { ?>
<?php $v105_disposal_list->ImportOptions->render("body") ?>
<?php } ?>
<?php if ($v105_disposal_list->SearchOptions->visible()) { ?>
<?php $v105_disposal_list->SearchOptions->render("body") ?>
<?php } ?>
<?php if ($v105_disposal_list->FilterOptions->visible()) { ?>
<?php $v105_disposal_list->FilterOptions->render("body") ?>
<?php } ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php
$v105_disposal_list->renderOtherOptions();
?>
<?php if ($Security->CanSearch()) { ?>
<?php if (!$v105_disposal_list->isExport() && !$v105_disposal->CurrentAction) { ?>
<form name="fv105_disposallistsrch" id="fv105_disposallistsrch" class="form-inline ew-form ew-ext-search-form" action="<?php echo CurrentPageName() ?>">
<div id="fv105_disposallistsrch-search-panel" class="<?php echo $v105_disposal_list->SearchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<input type="hidden" name="t" value="v105_disposal">
	<div class="ew-extended-search">
<div id="xsr_<?php echo $v105_disposal_list->SearchRowCount + 1 ?>" class="ew-row d-sm-flex">
	<div class="ew-quick-search input-group">
		<input type="text" name="<?php echo Config("TABLE_BASIC_SEARCH") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH") ?>" class="form-control" value="<?php echo HtmlEncode($v105_disposal_list->BasicSearch->getKeyword()) ?>" placeholder="<?php echo HtmlEncode($Language->phrase("Search")) ?>">
		<input type="hidden" name="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" id="<?php echo Config("TABLE_BASIC_SEARCH_TYPE") ?>" value="<?php echo HtmlEncode($v105_disposal_list->BasicSearch->getType()) ?>">
		<div class="input-group-append">
			<button class="btn btn-primary" name="btn-submit" id="btn-submit" type="submit"><?php echo $Language->phrase("SearchBtn") ?></button>
			<button type="button" data-toggle="dropdown" class="btn btn-primary dropdown-toggle dropdown-toggle-split" aria-haspopup="true" aria-expanded="false"><span id="searchtype"><?php echo $v105_disposal_list->BasicSearch->getTypeNameShort() ?></span></button>
			<div class="dropdown-menu dropdown-menu-right">
				<a class="dropdown-item<?php if ($v105_disposal_list->BasicSearch->getType() == "") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this);"><?php echo $Language->phrase("QuickSearchAuto") ?></a>
				<a class="dropdown-item<?php if ($v105_disposal_list->BasicSearch->getType() == "=") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, '=');"><?php echo $Language->phrase("QuickSearchExact") ?></a>
				<a class="dropdown-item<?php if ($v105_disposal_list->BasicSearch->getType() == "AND") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'AND');"><?php echo $Language->phrase("QuickSearchAll") ?></a>
				<a class="dropdown-item<?php if ($v105_disposal_list->BasicSearch->getType() == "OR") { ?> active<?php } ?>" href="#" onclick="return ew.setSearchType(this, 'OR');"><?php echo $Language->phrase("QuickSearchAny") ?></a>
			</div>
		</div>
	</div>
</div>
	</div><!-- /.ew-extended-search -->
</div><!-- /.ew-search-panel -->
</form>
<?php } ?>
<?php } ?>
<?php $v105_disposal_list->showPageHeader(); ?>
<?php
$v105_disposal_list->showMessage();
?>
<?php if ($v105_disposal_list->TotalRecords > 0 || $v105_disposal->CurrentAction) { ?>
<div class="card ew-card ew-grid<?php if ($v105_disposal_list->isAddOrEdit()) { ?> ew-grid-add-edit<?php } ?> v105_disposal">
<form name="fv105_disposallist" id="fv105_disposallist" class="form-inline ew-form ew-list-form" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="v105_disposal">
<div id="gmp_v105_disposal" class="<?php echo ResponsiveTableClass() ?>card-body ew-grid-middle-panel">
<?php if ($v105_disposal_list->TotalRecords > 0 || $v105_disposal_list->isGridEdit()) { ?>
<table id="tbl_v105_disposallist" class="table ew-table"><!-- .ew-table -->
<thead>
	<tr class="ew-table-header">
<?php

// Header row
$v105_disposal->RowType = ROWTYPE_HEADER;

// Render list options
$v105_disposal_list->renderListOptions();

// Render list options (header, left)
$v105_disposal_list->ListOptions->render("header", "left");
?>
<?php if ($v105_disposal_list->id->Visible) { // id ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->id) == "") { ?>
		<th data-name="id" class="<?php echo $v105_disposal_list->id->headerCellClass() ?>"><div id="elh_v105_disposal_id" class="v105_disposal_id"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="id" class="<?php echo $v105_disposal_list->id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->id) ?>', 2);"><div id="elh_v105_disposal_id" class="v105_disposal_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->property_id->Visible) { // property_id ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->property_id) == "") { ?>
		<th data-name="property_id" class="<?php echo $v105_disposal_list->property_id->headerCellClass() ?>"><div id="elh_v105_disposal_property_id" class="v105_disposal_property_id"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->property_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property_id" class="<?php echo $v105_disposal_list->property_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->property_id) ?>', 2);"><div id="elh_v105_disposal_property_id" class="v105_disposal_property_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->property_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->property_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->property_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->property->Visible) { // property ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->property) == "") { ?>
		<th data-name="property" class="<?php echo $v105_disposal_list->property->headerCellClass() ?>"><div id="elh_v105_disposal_property" class="v105_disposal_property"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->property->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="property" class="<?php echo $v105_disposal_list->property->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->property) ?>', 2);"><div id="elh_v105_disposal_property" class="v105_disposal_property">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->property->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->property->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->property->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->templatefile2->Visible) { // templatefile2 ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->templatefile2) == "") { ?>
		<th data-name="templatefile2" class="<?php echo $v105_disposal_list->templatefile2->headerCellClass() ?>"><div id="elh_v105_disposal_templatefile2" class="v105_disposal_templatefile2"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->templatefile2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="templatefile2" class="<?php echo $v105_disposal_list->templatefile2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->templatefile2) ?>', 2);"><div id="elh_v105_disposal_templatefile2" class="v105_disposal_templatefile2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->templatefile2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->templatefile2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->templatefile2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->transactionno->Visible) { // transactionno ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->transactionno) == "") { ?>
		<th data-name="transactionno" class="<?php echo $v105_disposal_list->transactionno->headerCellClass() ?>"><div id="elh_v105_disposal_transactionno" class="v105_disposal_transactionno"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->transactionno->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transactionno" class="<?php echo $v105_disposal_list->transactionno->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->transactionno) ?>', 2);"><div id="elh_v105_disposal_transactionno" class="v105_disposal_transactionno">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->transactionno->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->transactionno->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->transactionno->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->transactiondate->Visible) { // transactiondate ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->transactiondate) == "") { ?>
		<th data-name="transactiondate" class="<?php echo $v105_disposal_list->transactiondate->headerCellClass() ?>"><div id="elh_v105_disposal_transactiondate" class="v105_disposal_transactiondate"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->transactiondate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="transactiondate" class="<?php echo $v105_disposal_list->transactiondate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->transactiondate) ?>', 2);"><div id="elh_v105_disposal_transactiondate" class="v105_disposal_transactiondate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->transactiondate->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->transactiondate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->transactiondate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->recommendedby->Visible) { // recommendedby ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->recommendedby) == "") { ?>
		<th data-name="recommendedby" class="<?php echo $v105_disposal_list->recommendedby->headerCellClass() ?>"><div id="elh_v105_disposal_recommendedby" class="v105_disposal_recommendedby"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->recommendedby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="recommendedby" class="<?php echo $v105_disposal_list->recommendedby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->recommendedby) ?>', 2);"><div id="elh_v105_disposal_recommendedby" class="v105_disposal_recommendedby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->recommendedby->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->recommendedby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->recommendedby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->signatureby->Visible) { // signatureby ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->signatureby) == "") { ?>
		<th data-name="signatureby" class="<?php echo $v105_disposal_list->signatureby->headerCellClass() ?>"><div id="elh_v105_disposal_signatureby" class="v105_disposal_signatureby"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->signatureby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signatureby" class="<?php echo $v105_disposal_list->signatureby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->signatureby) ?>', 2);"><div id="elh_v105_disposal_signatureby" class="v105_disposal_signatureby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->signatureby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->signatureby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->signatureby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->positionby->Visible) { // positionby ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->positionby) == "") { ?>
		<th data-name="positionby" class="<?php echo $v105_disposal_list->positionby->headerCellClass() ?>"><div id="elh_v105_disposal_positionby" class="v105_disposal_positionby"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->positionby->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="positionby" class="<?php echo $v105_disposal_list->positionby->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->positionby) ?>', 2);"><div id="elh_v105_disposal_positionby" class="v105_disposal_positionby">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->positionby->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->positionby->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->positionby->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->ce_id->Visible) { // ce_id ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->ce_id) == "") { ?>
		<th data-name="ce_id" class="<?php echo $v105_disposal_list->ce_id->headerCellClass() ?>"><div id="elh_v105_disposal_ce_id" class="v105_disposal_ce_id"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->ce_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="ce_id" class="<?php echo $v105_disposal_list->ce_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->ce_id) ?>', 2);"><div id="elh_v105_disposal_ce_id" class="v105_disposal_ce_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->ce_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->ce_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->ce_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->signaturece->Visible) { // signaturece ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->signaturece) == "") { ?>
		<th data-name="signaturece" class="<?php echo $v105_disposal_list->signaturece->headerCellClass() ?>"><div id="elh_v105_disposal_signaturece" class="v105_disposal_signaturece"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->signaturece->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signaturece" class="<?php echo $v105_disposal_list->signaturece->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->signaturece) ?>', 2);"><div id="elh_v105_disposal_signaturece" class="v105_disposal_signaturece">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->signaturece->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->signaturece->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->signaturece->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->itm_id->Visible) { // itm_id ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->itm_id) == "") { ?>
		<th data-name="itm_id" class="<?php echo $v105_disposal_list->itm_id->headerCellClass() ?>"><div id="elh_v105_disposal_itm_id" class="v105_disposal_itm_id"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->itm_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="itm_id" class="<?php echo $v105_disposal_list->itm_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->itm_id) ?>', 2);"><div id="elh_v105_disposal_itm_id" class="v105_disposal_itm_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->itm_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->itm_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->itm_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->signatureitm->Visible) { // signatureitm ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->signatureitm) == "") { ?>
		<th data-name="signatureitm" class="<?php echo $v105_disposal_list->signatureitm->headerCellClass() ?>"><div id="elh_v105_disposal_signatureitm" class="v105_disposal_signatureitm"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->signatureitm->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="signatureitm" class="<?php echo $v105_disposal_list->signatureitm->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->signatureitm) ?>', 2);"><div id="elh_v105_disposal_signatureitm" class="v105_disposal_signatureitm">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->signatureitm->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->signatureitm->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->signatureitm->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->sign1->Visible) { // sign1 ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->sign1) == "") { ?>
		<th data-name="sign1" class="<?php echo $v105_disposal_list->sign1->headerCellClass() ?>"><div id="elh_v105_disposal_sign1" class="v105_disposal_sign1"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->sign1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign1" class="<?php echo $v105_disposal_list->sign1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->sign1) ?>', 2);"><div id="elh_v105_disposal_sign1" class="v105_disposal_sign1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->sign1->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->sign1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->sign1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->jobt1->Visible) { // jobt1 ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->jobt1) == "") { ?>
		<th data-name="jobt1" class="<?php echo $v105_disposal_list->jobt1->headerCellClass() ?>"><div id="elh_v105_disposal_jobt1" class="v105_disposal_jobt1"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->jobt1->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobt1" class="<?php echo $v105_disposal_list->jobt1->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->jobt1) ?>', 2);"><div id="elh_v105_disposal_jobt1" class="v105_disposal_jobt1">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->jobt1->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->jobt1->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->jobt1->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->sign2->Visible) { // sign2 ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->sign2) == "") { ?>
		<th data-name="sign2" class="<?php echo $v105_disposal_list->sign2->headerCellClass() ?>"><div id="elh_v105_disposal_sign2" class="v105_disposal_sign2"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->sign2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign2" class="<?php echo $v105_disposal_list->sign2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->sign2) ?>', 2);"><div id="elh_v105_disposal_sign2" class="v105_disposal_sign2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->sign2->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->sign2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->sign2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->jobt2->Visible) { // jobt2 ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->jobt2) == "") { ?>
		<th data-name="jobt2" class="<?php echo $v105_disposal_list->jobt2->headerCellClass() ?>"><div id="elh_v105_disposal_jobt2" class="v105_disposal_jobt2"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->jobt2->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobt2" class="<?php echo $v105_disposal_list->jobt2->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->jobt2) ?>', 2);"><div id="elh_v105_disposal_jobt2" class="v105_disposal_jobt2">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->jobt2->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->jobt2->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->jobt2->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->sign3->Visible) { // sign3 ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->sign3) == "") { ?>
		<th data-name="sign3" class="<?php echo $v105_disposal_list->sign3->headerCellClass() ?>"><div id="elh_v105_disposal_sign3" class="v105_disposal_sign3"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->sign3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="sign3" class="<?php echo $v105_disposal_list->sign3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->sign3) ?>', 2);"><div id="elh_v105_disposal_sign3" class="v105_disposal_sign3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->sign3->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->sign3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->sign3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->jobt3->Visible) { // jobt3 ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->jobt3) == "") { ?>
		<th data-name="jobt3" class="<?php echo $v105_disposal_list->jobt3->headerCellClass() ?>"><div id="elh_v105_disposal_jobt3" class="v105_disposal_jobt3"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->jobt3->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="jobt3" class="<?php echo $v105_disposal_list->jobt3->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->jobt3) ?>', 2);"><div id="elh_v105_disposal_jobt3" class="v105_disposal_jobt3">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->jobt3->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->jobt3->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->jobt3->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->disposaldetail_id->Visible) { // disposaldetail_id ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->disposaldetail_id) == "") { ?>
		<th data-name="disposaldetail_id" class="<?php echo $v105_disposal_list->disposaldetail_id->headerCellClass() ?>"><div id="elh_v105_disposal_disposaldetail_id" class="v105_disposal_disposaldetail_id"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->disposaldetail_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="disposaldetail_id" class="<?php echo $v105_disposal_list->disposaldetail_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->disposaldetail_id) ?>', 2);"><div id="elh_v105_disposal_disposaldetail_id" class="v105_disposal_disposaldetail_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->disposaldetail_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->disposaldetail_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->disposaldetail_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->asset_id->Visible) { // asset_id ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->asset_id) == "") { ?>
		<th data-name="asset_id" class="<?php echo $v105_disposal_list->asset_id->headerCellClass() ?>"><div id="elh_v105_disposal_asset_id" class="v105_disposal_asset_id"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->asset_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_id" class="<?php echo $v105_disposal_list->asset_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->asset_id) ?>', 2);"><div id="elh_v105_disposal_asset_id" class="v105_disposal_asset_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->asset_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->asset_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->asset_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->code->Visible) { // code ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->code) == "") { ?>
		<th data-name="code" class="<?php echo $v105_disposal_list->code->headerCellClass() ?>"><div id="elh_v105_disposal_code" class="v105_disposal_code"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->code->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="code" class="<?php echo $v105_disposal_list->code->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->code) ?>', 2);"><div id="elh_v105_disposal_code" class="v105_disposal_code">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->code->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->code->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->code->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->description->Visible) { // description ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->description) == "") { ?>
		<th data-name="description" class="<?php echo $v105_disposal_list->description->headerCellClass() ?>"><div id="elh_v105_disposal_description" class="v105_disposal_description"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->description->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="description" class="<?php echo $v105_disposal_list->description->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->description) ?>', 2);"><div id="elh_v105_disposal_description" class="v105_disposal_description">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->description->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->description->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->description->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->department_id->Visible) { // department_id ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->department_id) == "") { ?>
		<th data-name="department_id" class="<?php echo $v105_disposal_list->department_id->headerCellClass() ?>"><div id="elh_v105_disposal_department_id" class="v105_disposal_department_id"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->department_id->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="department_id" class="<?php echo $v105_disposal_list->department_id->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->department_id) ?>', 2);"><div id="elh_v105_disposal_department_id" class="v105_disposal_department_id">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->department_id->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->department_id->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->department_id->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->asset_dept->Visible) { // asset_dept ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->asset_dept) == "") { ?>
		<th data-name="asset_dept" class="<?php echo $v105_disposal_list->asset_dept->headerCellClass() ?>"><div id="elh_v105_disposal_asset_dept" class="v105_disposal_asset_dept"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->asset_dept->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="asset_dept" class="<?php echo $v105_disposal_list->asset_dept->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->asset_dept) ?>', 2);"><div id="elh_v105_disposal_asset_dept" class="v105_disposal_asset_dept">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->asset_dept->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->asset_dept->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->asset_dept->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->procurementdate->Visible) { // procurementdate ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->procurementdate) == "") { ?>
		<th data-name="procurementdate" class="<?php echo $v105_disposal_list->procurementdate->headerCellClass() ?>"><div id="elh_v105_disposal_procurementdate" class="v105_disposal_procurementdate"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->procurementdate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="procurementdate" class="<?php echo $v105_disposal_list->procurementdate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->procurementdate) ?>', 2);"><div id="elh_v105_disposal_procurementdate" class="v105_disposal_procurementdate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->procurementdate->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->procurementdate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->procurementdate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->procurementcurrentcost->Visible) { // procurementcurrentcost ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->procurementcurrentcost) == "") { ?>
		<th data-name="procurementcurrentcost" class="<?php echo $v105_disposal_list->procurementcurrentcost->headerCellClass() ?>"><div id="elh_v105_disposal_procurementcurrentcost" class="v105_disposal_procurementcurrentcost"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->procurementcurrentcost->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="procurementcurrentcost" class="<?php echo $v105_disposal_list->procurementcurrentcost->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->procurementcurrentcost) ?>', 2);"><div id="elh_v105_disposal_procurementcurrentcost" class="v105_disposal_procurementcurrentcost">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->procurementcurrentcost->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->procurementcurrentcost->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->procurementcurrentcost->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->condstatus->Visible) { // condstatus ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->condstatus) == "") { ?>
		<th data-name="condstatus" class="<?php echo $v105_disposal_list->condstatus->headerCellClass() ?>"><div id="elh_v105_disposal_condstatus" class="v105_disposal_condstatus"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->condstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="condstatus" class="<?php echo $v105_disposal_list->condstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->condstatus) ?>', 2);"><div id="elh_v105_disposal_condstatus" class="v105_disposal_condstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->condstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->condstatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->condstatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->reasonstatus->Visible) { // reasonstatus ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->reasonstatus) == "") { ?>
		<th data-name="reasonstatus" class="<?php echo $v105_disposal_list->reasonstatus->headerCellClass() ?>"><div id="elh_v105_disposal_reasonstatus" class="v105_disposal_reasonstatus"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->reasonstatus->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="reasonstatus" class="<?php echo $v105_disposal_list->reasonstatus->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->reasonstatus) ?>', 2);"><div id="elh_v105_disposal_reasonstatus" class="v105_disposal_reasonstatus">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->reasonstatus->caption() ?><?php echo $Language->phrase("SrchLegend") ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->reasonstatus->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->reasonstatus->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php if ($v105_disposal_list->disposaldate->Visible) { // disposaldate ?>
	<?php if ($v105_disposal_list->SortUrl($v105_disposal_list->disposaldate) == "") { ?>
		<th data-name="disposaldate" class="<?php echo $v105_disposal_list->disposaldate->headerCellClass() ?>"><div id="elh_v105_disposal_disposaldate" class="v105_disposal_disposaldate"><div class="ew-table-header-caption"><?php echo $v105_disposal_list->disposaldate->caption() ?></div></div></th>
	<?php } else { ?>
		<th data-name="disposaldate" class="<?php echo $v105_disposal_list->disposaldate->headerCellClass() ?>"><div class="ew-pointer" onclick="ew.sort(event, '<?php echo $v105_disposal_list->SortUrl($v105_disposal_list->disposaldate) ?>', 2);"><div id="elh_v105_disposal_disposaldate" class="v105_disposal_disposaldate">
			<div class="ew-table-header-btn"><span class="ew-table-header-caption"><?php echo $v105_disposal_list->disposaldate->caption() ?></span><span class="ew-table-header-sort"><?php if ($v105_disposal_list->disposaldate->getSort() == "ASC") { ?><i class="fas fa-sort-up"></i><?php } elseif ($v105_disposal_list->disposaldate->getSort() == "DESC") { ?><i class="fas fa-sort-down"></i><?php } ?></span></div>
		</div></div></th>
	<?php } ?>
<?php } ?>
<?php

// Render list options (header, right)
$v105_disposal_list->ListOptions->render("header", "right");
?>
	</tr>
</thead>
<tbody>
<?php
if ($v105_disposal_list->ExportAll && $v105_disposal_list->isExport()) {
	$v105_disposal_list->StopRecord = $v105_disposal_list->TotalRecords;
} else {

	// Set the last record to display
	if ($v105_disposal_list->TotalRecords > $v105_disposal_list->StartRecord + $v105_disposal_list->DisplayRecords - 1)
		$v105_disposal_list->StopRecord = $v105_disposal_list->StartRecord + $v105_disposal_list->DisplayRecords - 1;
	else
		$v105_disposal_list->StopRecord = $v105_disposal_list->TotalRecords;
}
$v105_disposal_list->RecordCount = $v105_disposal_list->StartRecord - 1;
if ($v105_disposal_list->Recordset && !$v105_disposal_list->Recordset->EOF) {
	$v105_disposal_list->Recordset->moveFirst();
	$selectLimit = $v105_disposal_list->UseSelectLimit;
	if (!$selectLimit && $v105_disposal_list->StartRecord > 1)
		$v105_disposal_list->Recordset->move($v105_disposal_list->StartRecord - 1);
} elseif (!$v105_disposal->AllowAddDeleteRow && $v105_disposal_list->StopRecord == 0) {
	$v105_disposal_list->StopRecord = $v105_disposal->GridAddRowCount;
}

// Initialize aggregate
$v105_disposal->RowType = ROWTYPE_AGGREGATEINIT;
$v105_disposal->resetAttributes();
$v105_disposal_list->renderRow();
while ($v105_disposal_list->RecordCount < $v105_disposal_list->StopRecord) {
	$v105_disposal_list->RecordCount++;
	if ($v105_disposal_list->RecordCount >= $v105_disposal_list->StartRecord) {
		$v105_disposal_list->RowCount++;

		// Set up key count
		$v105_disposal_list->KeyCount = $v105_disposal_list->RowIndex;

		// Init row class and style
		$v105_disposal->resetAttributes();
		$v105_disposal->CssClass = "";
		if ($v105_disposal_list->isGridAdd()) {
		} else {
			$v105_disposal_list->loadRowValues($v105_disposal_list->Recordset); // Load row values
		}
		$v105_disposal->RowType = ROWTYPE_VIEW; // Render view

		// Set up row id / data-rowindex
		$v105_disposal->RowAttrs->merge(["data-rowindex" => $v105_disposal_list->RowCount, "id" => "r" . $v105_disposal_list->RowCount . "_v105_disposal", "data-rowtype" => $v105_disposal->RowType]);

		// Render row
		$v105_disposal_list->renderRow();

		// Render list options
		$v105_disposal_list->renderListOptions();
?>
	<tr <?php echo $v105_disposal->rowAttributes() ?>>
<?php

// Render list options (body, left)
$v105_disposal_list->ListOptions->render("body", "left", $v105_disposal_list->RowCount);
?>
	<?php if ($v105_disposal_list->id->Visible) { // id ?>
		<td data-name="id" <?php echo $v105_disposal_list->id->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_id">
<span<?php echo $v105_disposal_list->id->viewAttributes() ?>><?php echo $v105_disposal_list->id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->property_id->Visible) { // property_id ?>
		<td data-name="property_id" <?php echo $v105_disposal_list->property_id->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_property_id">
<span<?php echo $v105_disposal_list->property_id->viewAttributes() ?>><?php echo $v105_disposal_list->property_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->property->Visible) { // property ?>
		<td data-name="property" <?php echo $v105_disposal_list->property->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_property">
<span<?php echo $v105_disposal_list->property->viewAttributes() ?>><?php echo $v105_disposal_list->property->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->templatefile2->Visible) { // templatefile2 ?>
		<td data-name="templatefile2" <?php echo $v105_disposal_list->templatefile2->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_templatefile2">
<span<?php echo $v105_disposal_list->templatefile2->viewAttributes() ?>><?php echo $v105_disposal_list->templatefile2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->transactionno->Visible) { // transactionno ?>
		<td data-name="transactionno" <?php echo $v105_disposal_list->transactionno->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_transactionno">
<span<?php echo $v105_disposal_list->transactionno->viewAttributes() ?>><?php echo $v105_disposal_list->transactionno->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->transactiondate->Visible) { // transactiondate ?>
		<td data-name="transactiondate" <?php echo $v105_disposal_list->transactiondate->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_transactiondate">
<span<?php echo $v105_disposal_list->transactiondate->viewAttributes() ?>><?php echo $v105_disposal_list->transactiondate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->recommendedby->Visible) { // recommendedby ?>
		<td data-name="recommendedby" <?php echo $v105_disposal_list->recommendedby->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_recommendedby">
<span<?php echo $v105_disposal_list->recommendedby->viewAttributes() ?>><?php echo $v105_disposal_list->recommendedby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->signatureby->Visible) { // signatureby ?>
		<td data-name="signatureby" <?php echo $v105_disposal_list->signatureby->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_signatureby">
<span<?php echo $v105_disposal_list->signatureby->viewAttributes() ?>><?php echo $v105_disposal_list->signatureby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->positionby->Visible) { // positionby ?>
		<td data-name="positionby" <?php echo $v105_disposal_list->positionby->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_positionby">
<span<?php echo $v105_disposal_list->positionby->viewAttributes() ?>><?php echo $v105_disposal_list->positionby->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->ce_id->Visible) { // ce_id ?>
		<td data-name="ce_id" <?php echo $v105_disposal_list->ce_id->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_ce_id">
<span<?php echo $v105_disposal_list->ce_id->viewAttributes() ?>><?php echo $v105_disposal_list->ce_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->signaturece->Visible) { // signaturece ?>
		<td data-name="signaturece" <?php echo $v105_disposal_list->signaturece->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_signaturece">
<span<?php echo $v105_disposal_list->signaturece->viewAttributes() ?>><?php echo $v105_disposal_list->signaturece->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->itm_id->Visible) { // itm_id ?>
		<td data-name="itm_id" <?php echo $v105_disposal_list->itm_id->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_itm_id">
<span<?php echo $v105_disposal_list->itm_id->viewAttributes() ?>><?php echo $v105_disposal_list->itm_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->signatureitm->Visible) { // signatureitm ?>
		<td data-name="signatureitm" <?php echo $v105_disposal_list->signatureitm->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_signatureitm">
<span<?php echo $v105_disposal_list->signatureitm->viewAttributes() ?>><?php echo $v105_disposal_list->signatureitm->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->sign1->Visible) { // sign1 ?>
		<td data-name="sign1" <?php echo $v105_disposal_list->sign1->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_sign1">
<span<?php echo $v105_disposal_list->sign1->viewAttributes() ?>><?php echo $v105_disposal_list->sign1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->jobt1->Visible) { // jobt1 ?>
		<td data-name="jobt1" <?php echo $v105_disposal_list->jobt1->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_jobt1">
<span<?php echo $v105_disposal_list->jobt1->viewAttributes() ?>><?php echo $v105_disposal_list->jobt1->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->sign2->Visible) { // sign2 ?>
		<td data-name="sign2" <?php echo $v105_disposal_list->sign2->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_sign2">
<span<?php echo $v105_disposal_list->sign2->viewAttributes() ?>><?php echo $v105_disposal_list->sign2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->jobt2->Visible) { // jobt2 ?>
		<td data-name="jobt2" <?php echo $v105_disposal_list->jobt2->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_jobt2">
<span<?php echo $v105_disposal_list->jobt2->viewAttributes() ?>><?php echo $v105_disposal_list->jobt2->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->sign3->Visible) { // sign3 ?>
		<td data-name="sign3" <?php echo $v105_disposal_list->sign3->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_sign3">
<span<?php echo $v105_disposal_list->sign3->viewAttributes() ?>><?php echo $v105_disposal_list->sign3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->jobt3->Visible) { // jobt3 ?>
		<td data-name="jobt3" <?php echo $v105_disposal_list->jobt3->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_jobt3">
<span<?php echo $v105_disposal_list->jobt3->viewAttributes() ?>><?php echo $v105_disposal_list->jobt3->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->disposaldetail_id->Visible) { // disposaldetail_id ?>
		<td data-name="disposaldetail_id" <?php echo $v105_disposal_list->disposaldetail_id->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_disposaldetail_id">
<span<?php echo $v105_disposal_list->disposaldetail_id->viewAttributes() ?>><?php echo $v105_disposal_list->disposaldetail_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->asset_id->Visible) { // asset_id ?>
		<td data-name="asset_id" <?php echo $v105_disposal_list->asset_id->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_asset_id">
<span<?php echo $v105_disposal_list->asset_id->viewAttributes() ?>><?php echo $v105_disposal_list->asset_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->code->Visible) { // code ?>
		<td data-name="code" <?php echo $v105_disposal_list->code->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_code">
<span<?php echo $v105_disposal_list->code->viewAttributes() ?>><?php echo $v105_disposal_list->code->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->description->Visible) { // description ?>
		<td data-name="description" <?php echo $v105_disposal_list->description->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_description">
<span<?php echo $v105_disposal_list->description->viewAttributes() ?>><?php echo $v105_disposal_list->description->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->department_id->Visible) { // department_id ?>
		<td data-name="department_id" <?php echo $v105_disposal_list->department_id->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_department_id">
<span<?php echo $v105_disposal_list->department_id->viewAttributes() ?>><?php echo $v105_disposal_list->department_id->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->asset_dept->Visible) { // asset_dept ?>
		<td data-name="asset_dept" <?php echo $v105_disposal_list->asset_dept->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_asset_dept">
<span<?php echo $v105_disposal_list->asset_dept->viewAttributes() ?>><?php echo $v105_disposal_list->asset_dept->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->procurementdate->Visible) { // procurementdate ?>
		<td data-name="procurementdate" <?php echo $v105_disposal_list->procurementdate->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_procurementdate">
<span<?php echo $v105_disposal_list->procurementdate->viewAttributes() ?>><?php echo $v105_disposal_list->procurementdate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->procurementcurrentcost->Visible) { // procurementcurrentcost ?>
		<td data-name="procurementcurrentcost" <?php echo $v105_disposal_list->procurementcurrentcost->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_procurementcurrentcost">
<span<?php echo $v105_disposal_list->procurementcurrentcost->viewAttributes() ?>><?php echo $v105_disposal_list->procurementcurrentcost->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->condstatus->Visible) { // condstatus ?>
		<td data-name="condstatus" <?php echo $v105_disposal_list->condstatus->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_condstatus">
<span<?php echo $v105_disposal_list->condstatus->viewAttributes() ?>><?php echo $v105_disposal_list->condstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->reasonstatus->Visible) { // reasonstatus ?>
		<td data-name="reasonstatus" <?php echo $v105_disposal_list->reasonstatus->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_reasonstatus">
<span<?php echo $v105_disposal_list->reasonstatus->viewAttributes() ?>><?php echo $v105_disposal_list->reasonstatus->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
	<?php if ($v105_disposal_list->disposaldate->Visible) { // disposaldate ?>
		<td data-name="disposaldate" <?php echo $v105_disposal_list->disposaldate->cellAttributes() ?>>
<span id="el<?php echo $v105_disposal_list->RowCount ?>_v105_disposal_disposaldate">
<span<?php echo $v105_disposal_list->disposaldate->viewAttributes() ?>><?php echo $v105_disposal_list->disposaldate->getViewValue() ?></span>
</span>
</td>
	<?php } ?>
<?php

// Render list options (body, right)
$v105_disposal_list->ListOptions->render("body", "right", $v105_disposal_list->RowCount);
?>
	</tr>
<?php
	}
	if (!$v105_disposal_list->isGridAdd())
		$v105_disposal_list->Recordset->moveNext();
}
?>
</tbody>
</table><!-- /.ew-table -->
<?php } ?>
</div><!-- /.ew-grid-middle-panel -->
<?php if (!$v105_disposal->CurrentAction) { ?>
<input type="hidden" name="action" id="action" value="">
<?php } ?>
</form><!-- /.ew-list-form -->
<?php

// Close recordset
if ($v105_disposal_list->Recordset)
	$v105_disposal_list->Recordset->Close();
?>
<?php if (!$v105_disposal_list->isExport()) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php if (!$v105_disposal_list->isGridAdd()) { ?>
<form name="ew-pager-form" class="form-inline ew-form ew-pager-form" action="<?php echo CurrentPageName() ?>">
<?php echo $v105_disposal_list->Pager->render() ?>
</form>
<?php } ?>
<div class="ew-list-other-options">
<?php $v105_disposal_list->OtherOptions->render("body", "bottom") ?>
</div>
<div class="clearfix"></div>
</div>
<?php } ?>
</div><!-- /.ew-grid -->
<?php } ?>
<?php if ($v105_disposal_list->TotalRecords == 0 && !$v105_disposal->CurrentAction) { // Show other options ?>
<div class="ew-list-other-options">
<?php $v105_disposal_list->OtherOptions->render("body") ?>
</div>
<div class="clearfix"></div>
<?php } ?>
<?php
$v105_disposal_list->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<?php if (!$v105_disposal_list->isExport()) { ?>
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
$v105_disposal_list->terminate();
?>