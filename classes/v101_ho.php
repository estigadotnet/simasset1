<?php namespace PHPMaker2020\p_simasset1; ?>
<?php

/**
 * Table class for v101_ho
 */
class v101_ho extends DbTable
{
	protected $SqlFrom = "";
	protected $SqlSelect = "";
	protected $SqlSelectList = "";
	protected $SqlWhere = "";
	protected $SqlGroupBy = "";
	protected $SqlHaving = "";
	protected $SqlOrderBy = "";
	public $UseSessionForListSql = TRUE;

	// Column CSS classes
	public $LeftColumnClass = "col-sm-2 col-form-label ew-label";
	public $RightColumnClass = "col-sm-10";
	public $OffsetColumnClass = "col-sm-10 offset-sm-2";
	public $TableLeftColumnClass = "w-col-2";

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $property_id;
	public $TransactionNo;
	public $TransactionDate;
	public $HandedOverTo;
	public $DepartmentTo;
	public $HandedOverBy;
	public $DepartmentBy;
	public $Sign1;
	public $Sign2;
	public $Sign3;
	public $Sign4;
	public $hodetail_id;
	public $asset_id;
	public $Property;
	public $TemplateFile;
	public $hoDepartmentTo;
	public $hoSignatureTo;
	public $hoJobTitleTo;
	public $hoDepartmentBy;
	public $hoSignatureBy;
	public $hoJobTitleBy;
	public $Code;
	public $Description;
	public $Type;
	public $Group;
	public $ProcurementDate;
	public $ProcurementCurrentCost;
	public $Estimated_Life_28in_Year29;
	public $Qty;
	public $Remarks;
	public $Sign1Signature;
	public $Sign1JobTitle;
	public $Sign2Signature;
	public $Sign2JobTitle;
	public $Sign3Signature;
	public $Sign3JobTitle;
	public $Sign4Signature;
	public $Sign4JobTitle;
	public $AssetDepartment;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v101_ho';
		$this->TableName = 'v101_ho';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v101_ho`";
		$this->Dbid = 'DB';
		$this->ExportAll = TRUE;
		$this->ExportPageBreakCount = 0; // Page break per every n record (PDF only)
		$this->ExportPageOrientation = "portrait"; // Page orientation (PDF only)
		$this->ExportPageSize = "a4"; // Page size (PDF only)
		$this->ExportExcelPageOrientation = ""; // Page orientation (PhpSpreadsheet only)
		$this->ExportExcelPageSize = ""; // Page size (PhpSpreadsheet only)
		$this->ExportWordPageOrientation = "portrait"; // Page orientation (PHPWord only)
		$this->ExportWordColumnWidth = NULL; // Cell width (PHPWord only)
		$this->DetailAdd = FALSE; // Allow detail add
		$this->DetailEdit = FALSE; // Allow detail edit
		$this->DetailView = FALSE; // Allow detail view
		$this->ShowMultipleDetails = FALSE; // Show multiple details
		$this->GridAddRowCount = 5;
		$this->AllowAddDeleteRow = TRUE; // Allow add/delete row
		$this->UserIDAllowSecurity = Config("DEFAULT_USER_ID_ALLOW_SECURITY"); // Default User ID allowed permissions
		$this->BasicSearch = new BasicSearch($this->TableVar);

		// id
		$this->id = new DbField('v101_ho', 'v101_ho', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// property_id
		$this->property_id = new DbField('v101_ho', 'v101_ho', 'x_property_id', 'property_id', '`property_id`', '`property_id`', 3, 11, -1, FALSE, '`property_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->property_id->Nullable = FALSE; // NOT NULL field
		$this->property_id->Required = TRUE; // Required field
		$this->property_id->Sortable = TRUE; // Allow sort
		$this->property_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['property_id'] = &$this->property_id;

		// TransactionNo
		$this->TransactionNo = new DbField('v101_ho', 'v101_ho', 'x_TransactionNo', 'TransactionNo', '`TransactionNo`', '`TransactionNo`', 200, 25, -1, FALSE, '`TransactionNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransactionNo->Nullable = FALSE; // NOT NULL field
		$this->TransactionNo->Required = TRUE; // Required field
		$this->TransactionNo->Sortable = TRUE; // Allow sort
		$this->fields['TransactionNo'] = &$this->TransactionNo;

		// TransactionDate
		$this->TransactionDate = new DbField('v101_ho', 'v101_ho', 'x_TransactionDate', 'TransactionDate', '`TransactionDate`', CastDateFieldForLike("`TransactionDate`", 0, "DB"), 133, 10, 0, FALSE, '`TransactionDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransactionDate->Nullable = FALSE; // NOT NULL field
		$this->TransactionDate->Required = TRUE; // Required field
		$this->TransactionDate->Sortable = TRUE; // Allow sort
		$this->TransactionDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['TransactionDate'] = &$this->TransactionDate;

		// HandedOverTo
		$this->HandedOverTo = new DbField('v101_ho', 'v101_ho', 'x_HandedOverTo', 'HandedOverTo', '`HandedOverTo`', '`HandedOverTo`', 3, 11, -1, FALSE, '`HandedOverTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HandedOverTo->Nullable = FALSE; // NOT NULL field
		$this->HandedOverTo->Required = TRUE; // Required field
		$this->HandedOverTo->Sortable = TRUE; // Allow sort
		$this->HandedOverTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HandedOverTo'] = &$this->HandedOverTo;

		// DepartmentTo
		$this->DepartmentTo = new DbField('v101_ho', 'v101_ho', 'x_DepartmentTo', 'DepartmentTo', '`DepartmentTo`', '`DepartmentTo`', 3, 11, -1, FALSE, '`DepartmentTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DepartmentTo->Nullable = FALSE; // NOT NULL field
		$this->DepartmentTo->Required = TRUE; // Required field
		$this->DepartmentTo->Sortable = TRUE; // Allow sort
		$this->DepartmentTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DepartmentTo'] = &$this->DepartmentTo;

		// HandedOverBy
		$this->HandedOverBy = new DbField('v101_ho', 'v101_ho', 'x_HandedOverBy', 'HandedOverBy', '`HandedOverBy`', '`HandedOverBy`', 3, 11, -1, FALSE, '`HandedOverBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->HandedOverBy->Nullable = FALSE; // NOT NULL field
		$this->HandedOverBy->Required = TRUE; // Required field
		$this->HandedOverBy->Sortable = TRUE; // Allow sort
		$this->HandedOverBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HandedOverBy'] = &$this->HandedOverBy;

		// DepartmentBy
		$this->DepartmentBy = new DbField('v101_ho', 'v101_ho', 'x_DepartmentBy', 'DepartmentBy', '`DepartmentBy`', '`DepartmentBy`', 3, 11, -1, FALSE, '`DepartmentBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->DepartmentBy->Nullable = FALSE; // NOT NULL field
		$this->DepartmentBy->Required = TRUE; // Required field
		$this->DepartmentBy->Sortable = TRUE; // Allow sort
		$this->DepartmentBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DepartmentBy'] = &$this->DepartmentBy;

		// Sign1
		$this->Sign1 = new DbField('v101_ho', 'v101_ho', 'x_Sign1', 'Sign1', '`Sign1`', '`Sign1`', 3, 11, -1, FALSE, '`Sign1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign1->Nullable = FALSE; // NOT NULL field
		$this->Sign1->Required = TRUE; // Required field
		$this->Sign1->Sortable = TRUE; // Allow sort
		$this->Sign1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign1'] = &$this->Sign1;

		// Sign2
		$this->Sign2 = new DbField('v101_ho', 'v101_ho', 'x_Sign2', 'Sign2', '`Sign2`', '`Sign2`', 3, 11, -1, FALSE, '`Sign2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign2->Nullable = FALSE; // NOT NULL field
		$this->Sign2->Required = TRUE; // Required field
		$this->Sign2->Sortable = TRUE; // Allow sort
		$this->Sign2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign2'] = &$this->Sign2;

		// Sign3
		$this->Sign3 = new DbField('v101_ho', 'v101_ho', 'x_Sign3', 'Sign3', '`Sign3`', '`Sign3`', 3, 11, -1, FALSE, '`Sign3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign3->Nullable = FALSE; // NOT NULL field
		$this->Sign3->Required = TRUE; // Required field
		$this->Sign3->Sortable = TRUE; // Allow sort
		$this->Sign3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign3'] = &$this->Sign3;

		// Sign4
		$this->Sign4 = new DbField('v101_ho', 'v101_ho', 'x_Sign4', 'Sign4', '`Sign4`', '`Sign4`', 3, 11, -1, FALSE, '`Sign4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign4->Nullable = FALSE; // NOT NULL field
		$this->Sign4->Required = TRUE; // Required field
		$this->Sign4->Sortable = TRUE; // Allow sort
		$this->Sign4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign4'] = &$this->Sign4;

		// hodetail_id
		$this->hodetail_id = new DbField('v101_ho', 'v101_ho', 'x_hodetail_id', 'hodetail_id', '`hodetail_id`', '`hodetail_id`', 3, 11, -1, FALSE, '`hodetail_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->hodetail_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->hodetail_id->IsPrimaryKey = TRUE; // Primary key field
		$this->hodetail_id->Sortable = TRUE; // Allow sort
		$this->hodetail_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['hodetail_id'] = &$this->hodetail_id;

		// asset_id
		$this->asset_id = new DbField('v101_ho', 'v101_ho', 'x_asset_id', 'asset_id', '`asset_id`', '`asset_id`', 3, 11, -1, FALSE, '`asset_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->asset_id->Sortable = TRUE; // Allow sort
		$this->asset_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['asset_id'] = &$this->asset_id;

		// Property
		$this->Property = new DbField('v101_ho', 'v101_ho', 'x_Property', 'Property', '`Property`', '`Property`', 200, 100, -1, FALSE, '`Property`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Property->Sortable = TRUE; // Allow sort
		$this->fields['Property'] = &$this->Property;

		// TemplateFile
		$this->TemplateFile = new DbField('v101_ho', 'v101_ho', 'x_TemplateFile', 'TemplateFile', '`TemplateFile`', '`TemplateFile`', 200, 100, -1, FALSE, '`TemplateFile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TemplateFile->Sortable = TRUE; // Allow sort
		$this->fields['TemplateFile'] = &$this->TemplateFile;

		// hoDepartmentTo
		$this->hoDepartmentTo = new DbField('v101_ho', 'v101_ho', 'x_hoDepartmentTo', 'hoDepartmentTo', '`hoDepartmentTo`', '`hoDepartmentTo`', 200, 100, -1, FALSE, '`hoDepartmentTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoDepartmentTo->Sortable = TRUE; // Allow sort
		$this->fields['hoDepartmentTo'] = &$this->hoDepartmentTo;

		// hoSignatureTo
		$this->hoSignatureTo = new DbField('v101_ho', 'v101_ho', 'x_hoSignatureTo', 'hoSignatureTo', '`hoSignatureTo`', '`hoSignatureTo`', 200, 100, -1, FALSE, '`hoSignatureTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoSignatureTo->Sortable = TRUE; // Allow sort
		$this->fields['hoSignatureTo'] = &$this->hoSignatureTo;

		// hoJobTitleTo
		$this->hoJobTitleTo = new DbField('v101_ho', 'v101_ho', 'x_hoJobTitleTo', 'hoJobTitleTo', '`hoJobTitleTo`', '`hoJobTitleTo`', 200, 100, -1, FALSE, '`hoJobTitleTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoJobTitleTo->Sortable = TRUE; // Allow sort
		$this->fields['hoJobTitleTo'] = &$this->hoJobTitleTo;

		// hoDepartmentBy
		$this->hoDepartmentBy = new DbField('v101_ho', 'v101_ho', 'x_hoDepartmentBy', 'hoDepartmentBy', '`hoDepartmentBy`', '`hoDepartmentBy`', 200, 100, -1, FALSE, '`hoDepartmentBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoDepartmentBy->Sortable = TRUE; // Allow sort
		$this->fields['hoDepartmentBy'] = &$this->hoDepartmentBy;

		// hoSignatureBy
		$this->hoSignatureBy = new DbField('v101_ho', 'v101_ho', 'x_hoSignatureBy', 'hoSignatureBy', '`hoSignatureBy`', '`hoSignatureBy`', 200, 100, -1, FALSE, '`hoSignatureBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoSignatureBy->Sortable = TRUE; // Allow sort
		$this->fields['hoSignatureBy'] = &$this->hoSignatureBy;

		// hoJobTitleBy
		$this->hoJobTitleBy = new DbField('v101_ho', 'v101_ho', 'x_hoJobTitleBy', 'hoJobTitleBy', '`hoJobTitleBy`', '`hoJobTitleBy`', 200, 100, -1, FALSE, '`hoJobTitleBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoJobTitleBy->Sortable = TRUE; // Allow sort
		$this->fields['hoJobTitleBy'] = &$this->hoJobTitleBy;

		// Code
		$this->Code = new DbField('v101_ho', 'v101_ho', 'x_Code', 'Code', '`Code`', '`Code`', 200, 25, -1, FALSE, '`Code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Code->Sortable = TRUE; // Allow sort
		$this->fields['Code'] = &$this->Code;

		// Description
		$this->Description = new DbField('v101_ho', 'v101_ho', 'x_Description', 'Description', '`Description`', '`Description`', 200, 255, -1, FALSE, '`Description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Description->Sortable = TRUE; // Allow sort
		$this->fields['Description'] = &$this->Description;

		// Type
		$this->Type = new DbField('v101_ho', 'v101_ho', 'x_Type', 'Type', '`Type`', '`Type`', 200, 50, -1, FALSE, '`Type`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Type->Sortable = TRUE; // Allow sort
		$this->fields['Type'] = &$this->Type;

		// Group
		$this->Group = new DbField('v101_ho', 'v101_ho', 'x_Group', 'Group', '`Group`', '`Group`', 200, 255, -1, FALSE, '`Group`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Group->Sortable = TRUE; // Allow sort
		$this->fields['Group'] = &$this->Group;

		// ProcurementDate
		$this->ProcurementDate = new DbField('v101_ho', 'v101_ho', 'x_ProcurementDate', 'ProcurementDate', '`ProcurementDate`', CastDateFieldForLike("`ProcurementDate`", 0, "DB"), 133, 10, 0, FALSE, '`ProcurementDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcurementDate->Sortable = TRUE; // Allow sort
		$this->ProcurementDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['ProcurementDate'] = &$this->ProcurementDate;

		// ProcurementCurrentCost
		$this->ProcurementCurrentCost = new DbField('v101_ho', 'v101_ho', 'x_ProcurementCurrentCost', 'ProcurementCurrentCost', '`ProcurementCurrentCost`', '`ProcurementCurrentCost`', 4, 17, -1, FALSE, '`ProcurementCurrentCost`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ProcurementCurrentCost->Sortable = TRUE; // Allow sort
		$this->ProcurementCurrentCost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['ProcurementCurrentCost'] = &$this->ProcurementCurrentCost;

		// Estimated Life (in Year)
		$this->Estimated_Life_28in_Year29 = new DbField('v101_ho', 'v101_ho', 'x_Estimated_Life_28in_Year29', 'Estimated Life (in Year)', '`Estimated Life (in Year)`', '`Estimated Life (in Year)`', 16, 4, -1, FALSE, '`Estimated Life (in Year)`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Estimated_Life_28in_Year29->Sortable = TRUE; // Allow sort
		$this->Estimated_Life_28in_Year29->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Estimated Life (in Year)'] = &$this->Estimated_Life_28in_Year29;

		// Qty
		$this->Qty = new DbField('v101_ho', 'v101_ho', 'x_Qty', 'Qty', '`Qty`', '`Qty`', 4, 14, -1, FALSE, '`Qty`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Qty->Sortable = TRUE; // Allow sort
		$this->Qty->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['Qty'] = &$this->Qty;

		// Remarks
		$this->Remarks = new DbField('v101_ho', 'v101_ho', 'x_Remarks', 'Remarks', '`Remarks`', '`Remarks`', 201, 65535, -1, FALSE, '`Remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->Remarks->Sortable = TRUE; // Allow sort
		$this->fields['Remarks'] = &$this->Remarks;

		// Sign1Signature
		$this->Sign1Signature = new DbField('v101_ho', 'v101_ho', 'x_Sign1Signature', 'Sign1Signature', '`Sign1Signature`', '`Sign1Signature`', 200, 100, -1, FALSE, '`Sign1Signature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign1Signature->Sortable = TRUE; // Allow sort
		$this->fields['Sign1Signature'] = &$this->Sign1Signature;

		// Sign1JobTitle
		$this->Sign1JobTitle = new DbField('v101_ho', 'v101_ho', 'x_Sign1JobTitle', 'Sign1JobTitle', '`Sign1JobTitle`', '`Sign1JobTitle`', 200, 100, -1, FALSE, '`Sign1JobTitle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign1JobTitle->Sortable = TRUE; // Allow sort
		$this->fields['Sign1JobTitle'] = &$this->Sign1JobTitle;

		// Sign2Signature
		$this->Sign2Signature = new DbField('v101_ho', 'v101_ho', 'x_Sign2Signature', 'Sign2Signature', '`Sign2Signature`', '`Sign2Signature`', 200, 100, -1, FALSE, '`Sign2Signature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign2Signature->Sortable = TRUE; // Allow sort
		$this->fields['Sign2Signature'] = &$this->Sign2Signature;

		// Sign2JobTitle
		$this->Sign2JobTitle = new DbField('v101_ho', 'v101_ho', 'x_Sign2JobTitle', 'Sign2JobTitle', '`Sign2JobTitle`', '`Sign2JobTitle`', 200, 100, -1, FALSE, '`Sign2JobTitle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign2JobTitle->Sortable = TRUE; // Allow sort
		$this->fields['Sign2JobTitle'] = &$this->Sign2JobTitle;

		// Sign3Signature
		$this->Sign3Signature = new DbField('v101_ho', 'v101_ho', 'x_Sign3Signature', 'Sign3Signature', '`Sign3Signature`', '`Sign3Signature`', 200, 100, -1, FALSE, '`Sign3Signature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign3Signature->Sortable = TRUE; // Allow sort
		$this->fields['Sign3Signature'] = &$this->Sign3Signature;

		// Sign3JobTitle
		$this->Sign3JobTitle = new DbField('v101_ho', 'v101_ho', 'x_Sign3JobTitle', 'Sign3JobTitle', '`Sign3JobTitle`', '`Sign3JobTitle`', 200, 100, -1, FALSE, '`Sign3JobTitle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign3JobTitle->Sortable = TRUE; // Allow sort
		$this->fields['Sign3JobTitle'] = &$this->Sign3JobTitle;

		// Sign4Signature
		$this->Sign4Signature = new DbField('v101_ho', 'v101_ho', 'x_Sign4Signature', 'Sign4Signature', '`Sign4Signature`', '`Sign4Signature`', 200, 100, -1, FALSE, '`Sign4Signature`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign4Signature->Sortable = TRUE; // Allow sort
		$this->fields['Sign4Signature'] = &$this->Sign4Signature;

		// Sign4JobTitle
		$this->Sign4JobTitle = new DbField('v101_ho', 'v101_ho', 'x_Sign4JobTitle', 'Sign4JobTitle', '`Sign4JobTitle`', '`Sign4JobTitle`', 200, 100, -1, FALSE, '`Sign4JobTitle`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->Sign4JobTitle->Sortable = TRUE; // Allow sort
		$this->fields['Sign4JobTitle'] = &$this->Sign4JobTitle;

		// AssetDepartment
		$this->AssetDepartment = new DbField('v101_ho', 'v101_ho', 'x_AssetDepartment', 'AssetDepartment', '`AssetDepartment`', '`AssetDepartment`', 200, 100, -1, FALSE, '`AssetDepartment`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->AssetDepartment->Sortable = TRUE; // Allow sort
		$this->fields['AssetDepartment'] = &$this->AssetDepartment;
	}

	// Field Visibility
	public function getFieldVisibility($fldParm)
	{
		global $Security;
		return $this->$fldParm->Visible; // Returns original value
	}

	// Set left column class (must be predefined col-*-* classes of Bootstrap grid system)
	function setLeftColumnClass($class)
	{
		if (preg_match('/^col\-(\w+)\-(\d+)$/', $class, $match)) {
			$this->LeftColumnClass = $class . " col-form-label ew-label";
			$this->RightColumnClass = "col-" . $match[1] . "-" . strval(12 - (int)$match[2]);
			$this->OffsetColumnClass = $this->RightColumnClass . " " . str_replace("col-", "offset-", $class);
			$this->TableLeftColumnClass = preg_replace('/^col-\w+-(\d+)$/', "w-col-$1", $class); // Change to w-col-*
		}
	}

	// Multiple column sort
	public function updateSort(&$fld, $ctrl)
	{
		if ($this->CurrentOrder == $fld->Name) {
			$sortField = $fld->Expression;
			$lastSort = $fld->getSort();
			if ($this->CurrentOrderType == "ASC" || $this->CurrentOrderType == "DESC") {
				$thisSort = $this->CurrentOrderType;
			} else {
				$thisSort = ($lastSort == "ASC") ? "DESC" : "ASC";
			}
			$fld->setSort($thisSort);
			if ($ctrl) {
				$orderBy = $this->getSessionOrderBy();
				if (ContainsString($orderBy, $sortField . " " . $lastSort)) {
					$orderBy = str_replace($sortField . " " . $lastSort, $sortField . " " . $thisSort, $orderBy);
				} else {
					if ($orderBy != "")
						$orderBy .= ", ";
					$orderBy .= $sortField . " " . $thisSort;
				}
				$this->setSessionOrderBy($orderBy); // Save to Session
			} else {
				$this->setSessionOrderBy($sortField . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`v101_ho`";
	}
	public function sqlFrom() // For backward compatibility
	{
		return $this->getSqlFrom();
	}
	public function setSqlFrom($v)
	{
		$this->SqlFrom = $v;
	}
	public function getSqlSelect() // Select
	{
		return ($this->SqlSelect != "") ? $this->SqlSelect : "SELECT * FROM " . $this->getSqlFrom();
	}
	public function sqlSelect() // For backward compatibility
	{
		return $this->getSqlSelect();
	}
	public function setSqlSelect($v)
	{
		$this->SqlSelect = $v;
	}
	public function getSqlWhere() // Where
	{
		$where = ($this->SqlWhere != "") ? $this->SqlWhere : "";
		$this->TableFilter = "";
		AddFilter($where, $this->TableFilter);
		return $where;
	}
	public function sqlWhere() // For backward compatibility
	{
		return $this->getSqlWhere();
	}
	public function setSqlWhere($v)
	{
		$this->SqlWhere = $v;
	}
	public function getSqlGroupBy() // Group By
	{
		return ($this->SqlGroupBy != "") ? $this->SqlGroupBy : "";
	}
	public function sqlGroupBy() // For backward compatibility
	{
		return $this->getSqlGroupBy();
	}
	public function setSqlGroupBy($v)
	{
		$this->SqlGroupBy = $v;
	}
	public function getSqlHaving() // Having
	{
		return ($this->SqlHaving != "") ? $this->SqlHaving : "";
	}
	public function sqlHaving() // For backward compatibility
	{
		return $this->getSqlHaving();
	}
	public function setSqlHaving($v)
	{
		$this->SqlHaving = $v;
	}
	public function getSqlOrderBy() // Order By
	{
		return ($this->SqlOrderBy != "") ? $this->SqlOrderBy : "";
	}
	public function sqlOrderBy() // For backward compatibility
	{
		return $this->getSqlOrderBy();
	}
	public function setSqlOrderBy($v)
	{
		$this->SqlOrderBy = $v;
	}

	// Apply User ID filters
	public function applyUserIDFilters($filter, $id = "")
	{
		return $filter;
	}

	// Check if User ID security allows view all
	public function userIDAllow($id = "")
	{
		$allow = $this->UserIDAllowSecurity;
		switch ($id) {
			case "add":
			case "copy":
			case "gridadd":
			case "register":
			case "addopt":
				return (($allow & 1) == 1);
			case "edit":
			case "gridedit":
			case "update":
			case "changepwd":
			case "forgotpwd":
				return (($allow & 4) == 4);
			case "delete":
				return (($allow & 2) == 2);
			case "view":
				return (($allow & 32) == 32);
			case "search":
				return (($allow & 64) == 64);
			case "lookup":
				return (($allow & 256) == 256);
			default:
				return (($allow & 8) == 8);
		}
	}

	// Get recordset
	public function getRecordset($sql, $rowcnt = -1, $offset = -1)
	{
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->selectLimit($sql, $rowcnt, $offset);
		$conn->raiseErrorFn = "";
		return $rs;
	}

	// Get record count
	public function getRecordCount($sql, $c = NULL)
	{
		$cnt = -1;
		$rs = NULL;
		$sql = preg_replace('/\/\*BeginOrderBy\*\/[\s\S]+\/\*EndOrderBy\*\//', "", $sql); // Remove ORDER BY clause (MSSQL)
		$pattern = '/^SELECT\s([\s\S]+)\sFROM\s/i';

		// Skip Custom View / SubQuery / SELECT DISTINCT / ORDER BY
		if (($this->TableType == 'TABLE' || $this->TableType == 'VIEW' || $this->TableType == 'LINKTABLE') &&
			preg_match($pattern, $sql) && !preg_match('/\(\s*(SELECT[^)]+)\)/i', $sql) &&
			!preg_match('/^\s*select\s+distinct\s+/i', $sql) && !preg_match('/\s+order\s+by\s+/i', $sql)) {
			$sqlwrk = "SELECT COUNT(*) FROM " . preg_replace($pattern, "", $sql);
		} else {
			$sqlwrk = "SELECT COUNT(*) FROM (" . $sql . ") COUNT_TABLE";
		}
		$conn = $c ?: $this->getConnection();
		if ($rs = $conn->execute($sqlwrk)) {
			if (!$rs->EOF && $rs->FieldCount() > 0) {
				$cnt = $rs->fields[0];
				$rs->close();
			}
			return (int)$cnt;
		}

		// Unable to get count, get record count directly
		if ($rs = $conn->execute($sql)) {
			$cnt = $rs->RecordCount();
			$rs->close();
			return (int)$cnt;
		}
		return $cnt;
	}

	// Get SQL
	public function getSql($where, $orderBy = "")
	{
		return BuildSelectSql($this->getSqlSelect(), $this->getSqlWhere(),
			$this->getSqlGroupBy(), $this->getSqlHaving(), $this->getSqlOrderBy(),
			$where, $orderBy);
	}

	// Table SQL
	public function getCurrentSql()
	{
		$filter = $this->CurrentFilter;
		$filter = $this->applyUserIDFilters($filter);
		$sort = $this->getSessionOrderBy();
		return $this->getSql($filter, $sort);
	}

	// Table SQL with List page filter
	public function getListSql()
	{
		$filter = $this->UseSessionForListSql ? $this->getSessionWhere() : "";
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->getSqlSelect();
		$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Get record count based on filter (for detail record count in master table pages)
	public function loadRecordCount($filter)
	{
		$origFilter = $this->CurrentFilter;
		$this->CurrentFilter = $filter;
		$this->Recordset_Selecting($this->CurrentFilter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $this->CurrentFilter, "");
		$cnt = $this->getRecordCount($sql);
		$this->CurrentFilter = $origFilter;
		return $cnt;
	}

	// Get record count (for current List page)
	public function listRecordCount()
	{
		$filter = $this->getSessionWhere();
		AddFilter($filter, $this->CurrentFilter);
		$filter = $this->applyUserIDFilters($filter);
		$this->Recordset_Selecting($filter);
		$select = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlSelect() : "SELECT * FROM " . $this->getSqlFrom();
		$groupBy = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlGroupBy() : "";
		$having = $this->TableType == 'CUSTOMVIEW' ? $this->getSqlHaving() : "";
		$sql = BuildSelectSql($select, $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		$cnt = $this->getRecordCount($sql);
		return $cnt;
	}

	// INSERT statement
	protected function insertSql(&$rs)
	{
		$names = "";
		$values = "";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom)
				continue;
			$names .= $this->fields[$name]->Expression . ",";
			$values .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$names = preg_replace('/,+$/', "", $names);
		$values = preg_replace('/,+$/', "", $values);
		return "INSERT INTO " . $this->UpdateTable . " (" . $names . ") VALUES (" . $values . ")";
	}

	// Insert
	public function insert(&$rs)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->insertSql($rs));
		if ($success) {

			// Get insert id if necessary
			$this->id->setDbValue($conn->insert_ID());
			$rs['id'] = $this->id->DbValue;

			// Get insert id if necessary
			$this->hodetail_id->setDbValue($conn->insert_ID());
			$rs['hodetail_id'] = $this->hodetail_id->DbValue;
		}
		return $success;
	}

	// UPDATE statement
	protected function updateSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "UPDATE " . $this->UpdateTable . " SET ";
		foreach ($rs as $name => $value) {
			if (!isset($this->fields[$name]) || $this->fields[$name]->IsCustom || $this->fields[$name]->IsAutoIncrement)
				continue;
			$sql .= $this->fields[$name]->Expression . "=";
			$sql .= QuotedValue($value, $this->fields[$name]->DataType, $this->Dbid) . ",";
		}
		$sql = preg_replace('/,+$/', "", $sql);
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= " WHERE " . $filter;
		return $sql;
	}

	// Update
	public function update(&$rs, $where = "", $rsold = NULL, $curfilter = TRUE)
	{
		$conn = $this->getConnection();
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		return $success;
	}

	// DELETE statement
	protected function deleteSql(&$rs, $where = "", $curfilter = TRUE)
	{
		$sql = "DELETE FROM " . $this->UpdateTable . " WHERE ";
		if (is_array($where))
			$where = $this->arrayToFilter($where);
		if ($rs) {
			if (array_key_exists('id', $rs))
				AddFilter($where, QuotedName('id', $this->Dbid) . '=' . QuotedValue($rs['id'], $this->id->DataType, $this->Dbid));
			if (array_key_exists('hodetail_id', $rs))
				AddFilter($where, QuotedName('hodetail_id', $this->Dbid) . '=' . QuotedValue($rs['hodetail_id'], $this->hodetail_id->DataType, $this->Dbid));
		}
		$filter = ($curfilter) ? $this->CurrentFilter : "";
		AddFilter($filter, $where);
		if ($filter != "")
			$sql .= $filter;
		else
			$sql .= "0=1"; // Avoid delete
		return $sql;
	}

	// Delete
	public function delete(&$rs, $where = "", $curfilter = FALSE)
	{
		$success = TRUE;
		$conn = $this->getConnection();
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		return $success;
	}

	// Load DbValue from recordset or array
	protected function loadDbValues(&$rs)
	{
		if (!$rs || !is_array($rs) && $rs->EOF)
			return;
		$row = is_array($rs) ? $rs : $rs->fields;
		$this->id->DbValue = $row['id'];
		$this->property_id->DbValue = $row['property_id'];
		$this->TransactionNo->DbValue = $row['TransactionNo'];
		$this->TransactionDate->DbValue = $row['TransactionDate'];
		$this->HandedOverTo->DbValue = $row['HandedOverTo'];
		$this->DepartmentTo->DbValue = $row['DepartmentTo'];
		$this->HandedOverBy->DbValue = $row['HandedOverBy'];
		$this->DepartmentBy->DbValue = $row['DepartmentBy'];
		$this->Sign1->DbValue = $row['Sign1'];
		$this->Sign2->DbValue = $row['Sign2'];
		$this->Sign3->DbValue = $row['Sign3'];
		$this->Sign4->DbValue = $row['Sign4'];
		$this->hodetail_id->DbValue = $row['hodetail_id'];
		$this->asset_id->DbValue = $row['asset_id'];
		$this->Property->DbValue = $row['Property'];
		$this->TemplateFile->DbValue = $row['TemplateFile'];
		$this->hoDepartmentTo->DbValue = $row['hoDepartmentTo'];
		$this->hoSignatureTo->DbValue = $row['hoSignatureTo'];
		$this->hoJobTitleTo->DbValue = $row['hoJobTitleTo'];
		$this->hoDepartmentBy->DbValue = $row['hoDepartmentBy'];
		$this->hoSignatureBy->DbValue = $row['hoSignatureBy'];
		$this->hoJobTitleBy->DbValue = $row['hoJobTitleBy'];
		$this->Code->DbValue = $row['Code'];
		$this->Description->DbValue = $row['Description'];
		$this->Type->DbValue = $row['Type'];
		$this->Group->DbValue = $row['Group'];
		$this->ProcurementDate->DbValue = $row['ProcurementDate'];
		$this->ProcurementCurrentCost->DbValue = $row['ProcurementCurrentCost'];
		$this->Estimated_Life_28in_Year29->DbValue = $row['Estimated Life (in Year)'];
		$this->Qty->DbValue = $row['Qty'];
		$this->Remarks->DbValue = $row['Remarks'];
		$this->Sign1Signature->DbValue = $row['Sign1Signature'];
		$this->Sign1JobTitle->DbValue = $row['Sign1JobTitle'];
		$this->Sign2Signature->DbValue = $row['Sign2Signature'];
		$this->Sign2JobTitle->DbValue = $row['Sign2JobTitle'];
		$this->Sign3Signature->DbValue = $row['Sign3Signature'];
		$this->Sign3JobTitle->DbValue = $row['Sign3JobTitle'];
		$this->Sign4Signature->DbValue = $row['Sign4Signature'];
		$this->Sign4JobTitle->DbValue = $row['Sign4JobTitle'];
		$this->AssetDepartment->DbValue = $row['AssetDepartment'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@ AND `hodetail_id` = @hodetail_id@";
	}

	// Get record filter
	public function getRecordFilter($row = NULL)
	{
		$keyFilter = $this->sqlKeyFilter();
		if (is_array($row))
			$val = array_key_exists('id', $row) ? $row['id'] : NULL;
		else
			$val = $this->id->OldValue !== NULL ? $this->id->OldValue : $this->id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		if (is_array($row))
			$val = array_key_exists('hodetail_id', $row) ? $row['hodetail_id'] : NULL;
		else
			$val = $this->hodetail_id->OldValue !== NULL ? $this->hodetail_id->OldValue : $this->hodetail_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@hodetail_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
		return $keyFilter;
	}

	// Return page URL
	public function getReturnUrl()
	{
		$name = PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL");

		// Get referer URL automatically
		if (ServerVar("HTTP_REFERER") != "" && ReferPageName() != CurrentPageName() && ReferPageName() != "login.php") // Referer not same page or login page
			$_SESSION[$name] = ServerVar("HTTP_REFERER"); // Save to Session
		if (@$_SESSION[$name] != "") {
			return $_SESSION[$name];
		} else {
			return "v101_holist.php";
		}
	}
	public function setReturnUrl($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_RETURN_URL")] = $v;
	}

	// Get modal caption
	public function getModalCaption($pageName)
	{
		global $Language;
		if ($pageName == "v101_hoview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v101_hoedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v101_hoadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v101_holist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v101_hoview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v101_hoview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "v101_hoadd.php?" . $this->getUrlParm($parm);
		else
			$url = "v101_hoadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v101_hoedit.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline edit URL
	public function getInlineEditUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=edit"));
		return $this->addMasterUrl($url);
	}

	// Copy URL
	public function getCopyUrl($parm = "")
	{
		$url = $this->keyUrl("v101_hoadd.php", $this->getUrlParm($parm));
		return $this->addMasterUrl($url);
	}

	// Inline copy URL
	public function getInlineCopyUrl()
	{
		$url = $this->keyUrl(CurrentPageName(), $this->getUrlParm("action=copy"));
		return $this->addMasterUrl($url);
	}

	// Delete URL
	public function getDeleteUrl()
	{
		return $this->keyUrl("v101_hodelete.php", $this->getUrlParm());
	}

	// Add master url
	public function addMasterUrl($url)
	{
		return $url;
	}
	public function keyToJson($htmlEncode = FALSE)
	{
		$json = "";
		$json .= "id:" . JsonEncode($this->id->CurrentValue, "number");
		$json .= ",hodetail_id:" . JsonEncode($this->hodetail_id->CurrentValue, "number");
		$json = "{" . $json . "}";
		if ($htmlEncode)
			$json = HtmlEncode($json);
		return $json;
	}

	// Add key value to URL
	public function keyUrl($url, $parm = "")
	{
		$url = $url . "?";
		if ($parm != "")
			$url .= $parm . "&";
		if ($this->id->CurrentValue != NULL) {
			$url .= "id=" . urlencode($this->id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		if ($this->hodetail_id->CurrentValue != NULL) {
			$url .= "&hodetail_id=" . urlencode($this->hodetail_id->CurrentValue);
		} else {
			return "javascript:ew.alert(ew.language.phrase('InvalidRecord'));";
		}
		return $url;
	}

	// Sort URL
	public function sortUrl(&$fld)
	{
		if ($this->CurrentAction || $this->isExport() ||
			in_array($fld->Type, [128, 204, 205])) { // Unsortable data type
				return "";
		} elseif ($fld->Sortable) {
			$urlParm = $this->getUrlParm("order=" . urlencode($fld->Name) . "&amp;ordertype=" . $fld->reverseSort());
			return $this->addMasterUrl(CurrentPageName() . "?" . $urlParm);
		} else {
			return "";
		}
	}

	// Get record keys from Post/Get/Session
	public function getRecordKeys()
	{
		$arKeys = [];
		$arKey = [];
		if (Param("key_m") !== NULL) {
			$arKeys = Param("key_m");
			$cnt = count($arKeys);
			for ($i = 0; $i < $cnt; $i++)
				$arKeys[$i] = explode(Config("COMPOSITE_KEY_SEPARATOR"), $arKeys[$i]);
		} else {
			if (Param("id") !== NULL)
				$arKey[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKey[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKey[] = Route(2);
			else
				$arKeys = NULL; // Do not setup
			if (Param("hodetail_id") !== NULL)
				$arKey[] = Param("hodetail_id");
			elseif (IsApi() && Key(1) !== NULL)
				$arKey[] = Key(1);
			elseif (IsApi() && Route(3) !== NULL)
				$arKey[] = Route(3);
			else
				$arKeys = NULL; // Do not setup
			if (is_array($arKeys)) $arKeys[] = $arKey;

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_array($key) || count($key) != 2)
					continue; // Just skip so other keys will still work
				if (!is_numeric($key[0])) // id
					continue;
				if (!is_numeric($key[1])) // hodetail_id
					continue;
				$ar[] = $key;
			}
		}
		return $ar;
	}

	// Get filter from record keys
	public function getFilterFromRecordKeys($setCurrent = TRUE)
	{
		$arKeys = $this->getRecordKeys();
		$keyFilter = "";
		foreach ($arKeys as $key) {
			if ($keyFilter != "") $keyFilter .= " OR ";
			if ($setCurrent)
				$this->id->CurrentValue = $key[0];
			else
				$this->id->OldValue = $key[0];
			if ($setCurrent)
				$this->hodetail_id->CurrentValue = $key[1];
			else
				$this->hodetail_id->OldValue = $key[1];
			$keyFilter .= "(" . $this->getRecordFilter() . ")";
		}
		return $keyFilter;
	}

	// Load rows based on filter
	public function &loadRs($filter)
	{

		// Set up filter (WHERE Clause)
		$sql = $this->getSql($filter);
		$conn = $this->getConnection();
		$rs = $conn->execute($sql);
		return $rs;
	}

	// Load row values from recordset
	public function loadListRowValues(&$rs)
	{
		$this->id->setDbValue($rs->fields('id'));
		$this->property_id->setDbValue($rs->fields('property_id'));
		$this->TransactionNo->setDbValue($rs->fields('TransactionNo'));
		$this->TransactionDate->setDbValue($rs->fields('TransactionDate'));
		$this->HandedOverTo->setDbValue($rs->fields('HandedOverTo'));
		$this->DepartmentTo->setDbValue($rs->fields('DepartmentTo'));
		$this->HandedOverBy->setDbValue($rs->fields('HandedOverBy'));
		$this->DepartmentBy->setDbValue($rs->fields('DepartmentBy'));
		$this->Sign1->setDbValue($rs->fields('Sign1'));
		$this->Sign2->setDbValue($rs->fields('Sign2'));
		$this->Sign3->setDbValue($rs->fields('Sign3'));
		$this->Sign4->setDbValue($rs->fields('Sign4'));
		$this->hodetail_id->setDbValue($rs->fields('hodetail_id'));
		$this->asset_id->setDbValue($rs->fields('asset_id'));
		$this->Property->setDbValue($rs->fields('Property'));
		$this->TemplateFile->setDbValue($rs->fields('TemplateFile'));
		$this->hoDepartmentTo->setDbValue($rs->fields('hoDepartmentTo'));
		$this->hoSignatureTo->setDbValue($rs->fields('hoSignatureTo'));
		$this->hoJobTitleTo->setDbValue($rs->fields('hoJobTitleTo'));
		$this->hoDepartmentBy->setDbValue($rs->fields('hoDepartmentBy'));
		$this->hoSignatureBy->setDbValue($rs->fields('hoSignatureBy'));
		$this->hoJobTitleBy->setDbValue($rs->fields('hoJobTitleBy'));
		$this->Code->setDbValue($rs->fields('Code'));
		$this->Description->setDbValue($rs->fields('Description'));
		$this->Type->setDbValue($rs->fields('Type'));
		$this->Group->setDbValue($rs->fields('Group'));
		$this->ProcurementDate->setDbValue($rs->fields('ProcurementDate'));
		$this->ProcurementCurrentCost->setDbValue($rs->fields('ProcurementCurrentCost'));
		$this->Estimated_Life_28in_Year29->setDbValue($rs->fields('Estimated Life (in Year)'));
		$this->Qty->setDbValue($rs->fields('Qty'));
		$this->Remarks->setDbValue($rs->fields('Remarks'));
		$this->Sign1Signature->setDbValue($rs->fields('Sign1Signature'));
		$this->Sign1JobTitle->setDbValue($rs->fields('Sign1JobTitle'));
		$this->Sign2Signature->setDbValue($rs->fields('Sign2Signature'));
		$this->Sign2JobTitle->setDbValue($rs->fields('Sign2JobTitle'));
		$this->Sign3Signature->setDbValue($rs->fields('Sign3Signature'));
		$this->Sign3JobTitle->setDbValue($rs->fields('Sign3JobTitle'));
		$this->Sign4Signature->setDbValue($rs->fields('Sign4Signature'));
		$this->Sign4JobTitle->setDbValue($rs->fields('Sign4JobTitle'));
		$this->AssetDepartment->setDbValue($rs->fields('AssetDepartment'));
	}

	// Render list row values
	public function renderListRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// Common render codes
		// id
		// property_id
		// TransactionNo
		// TransactionDate
		// HandedOverTo
		// DepartmentTo
		// HandedOverBy
		// DepartmentBy
		// Sign1
		// Sign2
		// Sign3
		// Sign4
		// hodetail_id
		// asset_id
		// Property
		// TemplateFile
		// hoDepartmentTo
		// hoSignatureTo
		// hoJobTitleTo
		// hoDepartmentBy
		// hoSignatureBy
		// hoJobTitleBy
		// Code
		// Description
		// Type
		// Group
		// ProcurementDate
		// ProcurementCurrentCost
		// Estimated Life (in Year)
		// Qty
		// Remarks
		// Sign1Signature
		// Sign1JobTitle
		// Sign2Signature
		// Sign2JobTitle
		// Sign3Signature
		// Sign3JobTitle
		// Sign4Signature
		// Sign4JobTitle
		// AssetDepartment
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// property_id
		$this->property_id->ViewValue = $this->property_id->CurrentValue;
		$this->property_id->ViewValue = FormatNumber($this->property_id->ViewValue, 0, -2, -2, -2);
		$this->property_id->ViewCustomAttributes = "";

		// TransactionNo
		$this->TransactionNo->ViewValue = $this->TransactionNo->CurrentValue;
		$this->TransactionNo->ViewCustomAttributes = "";

		// TransactionDate
		$this->TransactionDate->ViewValue = $this->TransactionDate->CurrentValue;
		$this->TransactionDate->ViewValue = FormatDateTime($this->TransactionDate->ViewValue, 0);
		$this->TransactionDate->ViewCustomAttributes = "";

		// HandedOverTo
		$this->HandedOverTo->ViewValue = $this->HandedOverTo->CurrentValue;
		$this->HandedOverTo->ViewValue = FormatNumber($this->HandedOverTo->ViewValue, 0, -2, -2, -2);
		$this->HandedOverTo->ViewCustomAttributes = "";

		// DepartmentTo
		$this->DepartmentTo->ViewValue = $this->DepartmentTo->CurrentValue;
		$this->DepartmentTo->ViewValue = FormatNumber($this->DepartmentTo->ViewValue, 0, -2, -2, -2);
		$this->DepartmentTo->ViewCustomAttributes = "";

		// HandedOverBy
		$this->HandedOverBy->ViewValue = $this->HandedOverBy->CurrentValue;
		$this->HandedOverBy->ViewValue = FormatNumber($this->HandedOverBy->ViewValue, 0, -2, -2, -2);
		$this->HandedOverBy->ViewCustomAttributes = "";

		// DepartmentBy
		$this->DepartmentBy->ViewValue = $this->DepartmentBy->CurrentValue;
		$this->DepartmentBy->ViewValue = FormatNumber($this->DepartmentBy->ViewValue, 0, -2, -2, -2);
		$this->DepartmentBy->ViewCustomAttributes = "";

		// Sign1
		$this->Sign1->ViewValue = $this->Sign1->CurrentValue;
		$this->Sign1->ViewValue = FormatNumber($this->Sign1->ViewValue, 0, -2, -2, -2);
		$this->Sign1->ViewCustomAttributes = "";

		// Sign2
		$this->Sign2->ViewValue = $this->Sign2->CurrentValue;
		$this->Sign2->ViewValue = FormatNumber($this->Sign2->ViewValue, 0, -2, -2, -2);
		$this->Sign2->ViewCustomAttributes = "";

		// Sign3
		$this->Sign3->ViewValue = $this->Sign3->CurrentValue;
		$this->Sign3->ViewValue = FormatNumber($this->Sign3->ViewValue, 0, -2, -2, -2);
		$this->Sign3->ViewCustomAttributes = "";

		// Sign4
		$this->Sign4->ViewValue = $this->Sign4->CurrentValue;
		$this->Sign4->ViewValue = FormatNumber($this->Sign4->ViewValue, 0, -2, -2, -2);
		$this->Sign4->ViewCustomAttributes = "";

		// hodetail_id
		$this->hodetail_id->ViewValue = $this->hodetail_id->CurrentValue;
		$this->hodetail_id->ViewCustomAttributes = "";

		// asset_id
		$this->asset_id->ViewValue = $this->asset_id->CurrentValue;
		$this->asset_id->ViewValue = FormatNumber($this->asset_id->ViewValue, 0, -2, -2, -2);
		$this->asset_id->ViewCustomAttributes = "";

		// Property
		$this->Property->ViewValue = $this->Property->CurrentValue;
		$this->Property->ViewCustomAttributes = "";

		// TemplateFile
		$this->TemplateFile->ViewValue = $this->TemplateFile->CurrentValue;
		$this->TemplateFile->ViewCustomAttributes = "";

		// hoDepartmentTo
		$this->hoDepartmentTo->ViewValue = $this->hoDepartmentTo->CurrentValue;
		$this->hoDepartmentTo->ViewCustomAttributes = "";

		// hoSignatureTo
		$this->hoSignatureTo->ViewValue = $this->hoSignatureTo->CurrentValue;
		$this->hoSignatureTo->ViewCustomAttributes = "";

		// hoJobTitleTo
		$this->hoJobTitleTo->ViewValue = $this->hoJobTitleTo->CurrentValue;
		$this->hoJobTitleTo->ViewCustomAttributes = "";

		// hoDepartmentBy
		$this->hoDepartmentBy->ViewValue = $this->hoDepartmentBy->CurrentValue;
		$this->hoDepartmentBy->ViewCustomAttributes = "";

		// hoSignatureBy
		$this->hoSignatureBy->ViewValue = $this->hoSignatureBy->CurrentValue;
		$this->hoSignatureBy->ViewCustomAttributes = "";

		// hoJobTitleBy
		$this->hoJobTitleBy->ViewValue = $this->hoJobTitleBy->CurrentValue;
		$this->hoJobTitleBy->ViewCustomAttributes = "";

		// Code
		$this->Code->ViewValue = $this->Code->CurrentValue;
		$this->Code->ViewCustomAttributes = "";

		// Description
		$this->Description->ViewValue = $this->Description->CurrentValue;
		$this->Description->ViewCustomAttributes = "";

		// Type
		$this->Type->ViewValue = $this->Type->CurrentValue;
		$this->Type->ViewCustomAttributes = "";

		// Group
		$this->Group->ViewValue = $this->Group->CurrentValue;
		$this->Group->ViewCustomAttributes = "";

		// ProcurementDate
		$this->ProcurementDate->ViewValue = $this->ProcurementDate->CurrentValue;
		$this->ProcurementDate->ViewValue = FormatDateTime($this->ProcurementDate->ViewValue, 0);
		$this->ProcurementDate->ViewCustomAttributes = "";

		// ProcurementCurrentCost
		$this->ProcurementCurrentCost->ViewValue = $this->ProcurementCurrentCost->CurrentValue;
		$this->ProcurementCurrentCost->ViewValue = FormatNumber($this->ProcurementCurrentCost->ViewValue, 2, -2, -2, -2);
		$this->ProcurementCurrentCost->ViewCustomAttributes = "";

		// Estimated Life (in Year)
		$this->Estimated_Life_28in_Year29->ViewValue = $this->Estimated_Life_28in_Year29->CurrentValue;
		$this->Estimated_Life_28in_Year29->ViewValue = FormatNumber($this->Estimated_Life_28in_Year29->ViewValue, 0, -2, -2, -2);
		$this->Estimated_Life_28in_Year29->ViewCustomAttributes = "";

		// Qty
		$this->Qty->ViewValue = $this->Qty->CurrentValue;
		$this->Qty->ViewValue = FormatNumber($this->Qty->ViewValue, 2, -2, -2, -2);
		$this->Qty->ViewCustomAttributes = "";

		// Remarks
		$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
		$this->Remarks->ViewCustomAttributes = "";

		// Sign1Signature
		$this->Sign1Signature->ViewValue = $this->Sign1Signature->CurrentValue;
		$this->Sign1Signature->ViewCustomAttributes = "";

		// Sign1JobTitle
		$this->Sign1JobTitle->ViewValue = $this->Sign1JobTitle->CurrentValue;
		$this->Sign1JobTitle->ViewCustomAttributes = "";

		// Sign2Signature
		$this->Sign2Signature->ViewValue = $this->Sign2Signature->CurrentValue;
		$this->Sign2Signature->ViewCustomAttributes = "";

		// Sign2JobTitle
		$this->Sign2JobTitle->ViewValue = $this->Sign2JobTitle->CurrentValue;
		$this->Sign2JobTitle->ViewCustomAttributes = "";

		// Sign3Signature
		$this->Sign3Signature->ViewValue = $this->Sign3Signature->CurrentValue;
		$this->Sign3Signature->ViewCustomAttributes = "";

		// Sign3JobTitle
		$this->Sign3JobTitle->ViewValue = $this->Sign3JobTitle->CurrentValue;
		$this->Sign3JobTitle->ViewCustomAttributes = "";

		// Sign4Signature
		$this->Sign4Signature->ViewValue = $this->Sign4Signature->CurrentValue;
		$this->Sign4Signature->ViewCustomAttributes = "";

		// Sign4JobTitle
		$this->Sign4JobTitle->ViewValue = $this->Sign4JobTitle->CurrentValue;
		$this->Sign4JobTitle->ViewCustomAttributes = "";

		// AssetDepartment
		$this->AssetDepartment->ViewValue = $this->AssetDepartment->CurrentValue;
		$this->AssetDepartment->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// property_id
		$this->property_id->LinkCustomAttributes = "";
		$this->property_id->HrefValue = "";
		$this->property_id->TooltipValue = "";

		// TransactionNo
		$this->TransactionNo->LinkCustomAttributes = "";
		$this->TransactionNo->HrefValue = "";
		$this->TransactionNo->TooltipValue = "";

		// TransactionDate
		$this->TransactionDate->LinkCustomAttributes = "";
		$this->TransactionDate->HrefValue = "";
		$this->TransactionDate->TooltipValue = "";

		// HandedOverTo
		$this->HandedOverTo->LinkCustomAttributes = "";
		$this->HandedOverTo->HrefValue = "";
		$this->HandedOverTo->TooltipValue = "";

		// DepartmentTo
		$this->DepartmentTo->LinkCustomAttributes = "";
		$this->DepartmentTo->HrefValue = "";
		$this->DepartmentTo->TooltipValue = "";

		// HandedOverBy
		$this->HandedOverBy->LinkCustomAttributes = "";
		$this->HandedOverBy->HrefValue = "";
		$this->HandedOverBy->TooltipValue = "";

		// DepartmentBy
		$this->DepartmentBy->LinkCustomAttributes = "";
		$this->DepartmentBy->HrefValue = "";
		$this->DepartmentBy->TooltipValue = "";

		// Sign1
		$this->Sign1->LinkCustomAttributes = "";
		$this->Sign1->HrefValue = "";
		$this->Sign1->TooltipValue = "";

		// Sign2
		$this->Sign2->LinkCustomAttributes = "";
		$this->Sign2->HrefValue = "";
		$this->Sign2->TooltipValue = "";

		// Sign3
		$this->Sign3->LinkCustomAttributes = "";
		$this->Sign3->HrefValue = "";
		$this->Sign3->TooltipValue = "";

		// Sign4
		$this->Sign4->LinkCustomAttributes = "";
		$this->Sign4->HrefValue = "";
		$this->Sign4->TooltipValue = "";

		// hodetail_id
		$this->hodetail_id->LinkCustomAttributes = "";
		$this->hodetail_id->HrefValue = "";
		$this->hodetail_id->TooltipValue = "";

		// asset_id
		$this->asset_id->LinkCustomAttributes = "";
		$this->asset_id->HrefValue = "";
		$this->asset_id->TooltipValue = "";

		// Property
		$this->Property->LinkCustomAttributes = "";
		$this->Property->HrefValue = "";
		$this->Property->TooltipValue = "";

		// TemplateFile
		$this->TemplateFile->LinkCustomAttributes = "";
		$this->TemplateFile->HrefValue = "";
		$this->TemplateFile->TooltipValue = "";

		// hoDepartmentTo
		$this->hoDepartmentTo->LinkCustomAttributes = "";
		$this->hoDepartmentTo->HrefValue = "";
		$this->hoDepartmentTo->TooltipValue = "";

		// hoSignatureTo
		$this->hoSignatureTo->LinkCustomAttributes = "";
		$this->hoSignatureTo->HrefValue = "";
		$this->hoSignatureTo->TooltipValue = "";

		// hoJobTitleTo
		$this->hoJobTitleTo->LinkCustomAttributes = "";
		$this->hoJobTitleTo->HrefValue = "";
		$this->hoJobTitleTo->TooltipValue = "";

		// hoDepartmentBy
		$this->hoDepartmentBy->LinkCustomAttributes = "";
		$this->hoDepartmentBy->HrefValue = "";
		$this->hoDepartmentBy->TooltipValue = "";

		// hoSignatureBy
		$this->hoSignatureBy->LinkCustomAttributes = "";
		$this->hoSignatureBy->HrefValue = "";
		$this->hoSignatureBy->TooltipValue = "";

		// hoJobTitleBy
		$this->hoJobTitleBy->LinkCustomAttributes = "";
		$this->hoJobTitleBy->HrefValue = "";
		$this->hoJobTitleBy->TooltipValue = "";

		// Code
		$this->Code->LinkCustomAttributes = "";
		$this->Code->HrefValue = "";
		$this->Code->TooltipValue = "";

		// Description
		$this->Description->LinkCustomAttributes = "";
		$this->Description->HrefValue = "";
		$this->Description->TooltipValue = "";

		// Type
		$this->Type->LinkCustomAttributes = "";
		$this->Type->HrefValue = "";
		$this->Type->TooltipValue = "";

		// Group
		$this->Group->LinkCustomAttributes = "";
		$this->Group->HrefValue = "";
		$this->Group->TooltipValue = "";

		// ProcurementDate
		$this->ProcurementDate->LinkCustomAttributes = "";
		$this->ProcurementDate->HrefValue = "";
		$this->ProcurementDate->TooltipValue = "";

		// ProcurementCurrentCost
		$this->ProcurementCurrentCost->LinkCustomAttributes = "";
		$this->ProcurementCurrentCost->HrefValue = "";
		$this->ProcurementCurrentCost->TooltipValue = "";

		// Estimated Life (in Year)
		$this->Estimated_Life_28in_Year29->LinkCustomAttributes = "";
		$this->Estimated_Life_28in_Year29->HrefValue = "";
		$this->Estimated_Life_28in_Year29->TooltipValue = "";

		// Qty
		$this->Qty->LinkCustomAttributes = "";
		$this->Qty->HrefValue = "";
		$this->Qty->TooltipValue = "";

		// Remarks
		$this->Remarks->LinkCustomAttributes = "";
		$this->Remarks->HrefValue = "";
		$this->Remarks->TooltipValue = "";

		// Sign1Signature
		$this->Sign1Signature->LinkCustomAttributes = "";
		$this->Sign1Signature->HrefValue = "";
		$this->Sign1Signature->TooltipValue = "";

		// Sign1JobTitle
		$this->Sign1JobTitle->LinkCustomAttributes = "";
		$this->Sign1JobTitle->HrefValue = "";
		$this->Sign1JobTitle->TooltipValue = "";

		// Sign2Signature
		$this->Sign2Signature->LinkCustomAttributes = "";
		$this->Sign2Signature->HrefValue = "";
		$this->Sign2Signature->TooltipValue = "";

		// Sign2JobTitle
		$this->Sign2JobTitle->LinkCustomAttributes = "";
		$this->Sign2JobTitle->HrefValue = "";
		$this->Sign2JobTitle->TooltipValue = "";

		// Sign3Signature
		$this->Sign3Signature->LinkCustomAttributes = "";
		$this->Sign3Signature->HrefValue = "";
		$this->Sign3Signature->TooltipValue = "";

		// Sign3JobTitle
		$this->Sign3JobTitle->LinkCustomAttributes = "";
		$this->Sign3JobTitle->HrefValue = "";
		$this->Sign3JobTitle->TooltipValue = "";

		// Sign4Signature
		$this->Sign4Signature->LinkCustomAttributes = "";
		$this->Sign4Signature->HrefValue = "";
		$this->Sign4Signature->TooltipValue = "";

		// Sign4JobTitle
		$this->Sign4JobTitle->LinkCustomAttributes = "";
		$this->Sign4JobTitle->HrefValue = "";
		$this->Sign4JobTitle->TooltipValue = "";

		// AssetDepartment
		$this->AssetDepartment->LinkCustomAttributes = "";
		$this->AssetDepartment->HrefValue = "";
		$this->AssetDepartment->TooltipValue = "";

		// Call Row Rendered event
		$this->Row_Rendered();

		// Save data for Custom Template
		$this->Rows[] = $this->customTemplateFieldValues();
	}

	// Render edit row values
	public function renderEditRow()
	{
		global $Security, $CurrentLanguage, $Language;

		// Call Row Rendering event
		$this->Row_Rendering();

		// id
		$this->id->EditAttrs["class"] = "form-control";
		$this->id->EditCustomAttributes = "";
		$this->id->EditValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// property_id
		$this->property_id->EditAttrs["class"] = "form-control";
		$this->property_id->EditCustomAttributes = "";
		$this->property_id->EditValue = $this->property_id->CurrentValue;
		$this->property_id->PlaceHolder = RemoveHtml($this->property_id->caption());

		// TransactionNo
		$this->TransactionNo->EditAttrs["class"] = "form-control";
		$this->TransactionNo->EditCustomAttributes = "";
		if (!$this->TransactionNo->Raw)
			$this->TransactionNo->CurrentValue = HtmlDecode($this->TransactionNo->CurrentValue);
		$this->TransactionNo->EditValue = $this->TransactionNo->CurrentValue;
		$this->TransactionNo->PlaceHolder = RemoveHtml($this->TransactionNo->caption());

		// TransactionDate
		$this->TransactionDate->EditAttrs["class"] = "form-control";
		$this->TransactionDate->EditCustomAttributes = "";
		$this->TransactionDate->EditValue = FormatDateTime($this->TransactionDate->CurrentValue, 8);
		$this->TransactionDate->PlaceHolder = RemoveHtml($this->TransactionDate->caption());

		// HandedOverTo
		$this->HandedOverTo->EditAttrs["class"] = "form-control";
		$this->HandedOverTo->EditCustomAttributes = "";
		$this->HandedOverTo->EditValue = $this->HandedOverTo->CurrentValue;
		$this->HandedOverTo->PlaceHolder = RemoveHtml($this->HandedOverTo->caption());

		// DepartmentTo
		$this->DepartmentTo->EditAttrs["class"] = "form-control";
		$this->DepartmentTo->EditCustomAttributes = "";
		$this->DepartmentTo->EditValue = $this->DepartmentTo->CurrentValue;
		$this->DepartmentTo->PlaceHolder = RemoveHtml($this->DepartmentTo->caption());

		// HandedOverBy
		$this->HandedOverBy->EditAttrs["class"] = "form-control";
		$this->HandedOverBy->EditCustomAttributes = "";
		$this->HandedOverBy->EditValue = $this->HandedOverBy->CurrentValue;
		$this->HandedOverBy->PlaceHolder = RemoveHtml($this->HandedOverBy->caption());

		// DepartmentBy
		$this->DepartmentBy->EditAttrs["class"] = "form-control";
		$this->DepartmentBy->EditCustomAttributes = "";
		$this->DepartmentBy->EditValue = $this->DepartmentBy->CurrentValue;
		$this->DepartmentBy->PlaceHolder = RemoveHtml($this->DepartmentBy->caption());

		// Sign1
		$this->Sign1->EditAttrs["class"] = "form-control";
		$this->Sign1->EditCustomAttributes = "";
		$this->Sign1->EditValue = $this->Sign1->CurrentValue;
		$this->Sign1->PlaceHolder = RemoveHtml($this->Sign1->caption());

		// Sign2
		$this->Sign2->EditAttrs["class"] = "form-control";
		$this->Sign2->EditCustomAttributes = "";
		$this->Sign2->EditValue = $this->Sign2->CurrentValue;
		$this->Sign2->PlaceHolder = RemoveHtml($this->Sign2->caption());

		// Sign3
		$this->Sign3->EditAttrs["class"] = "form-control";
		$this->Sign3->EditCustomAttributes = "";
		$this->Sign3->EditValue = $this->Sign3->CurrentValue;
		$this->Sign3->PlaceHolder = RemoveHtml($this->Sign3->caption());

		// Sign4
		$this->Sign4->EditAttrs["class"] = "form-control";
		$this->Sign4->EditCustomAttributes = "";
		$this->Sign4->EditValue = $this->Sign4->CurrentValue;
		$this->Sign4->PlaceHolder = RemoveHtml($this->Sign4->caption());

		// hodetail_id
		$this->hodetail_id->EditAttrs["class"] = "form-control";
		$this->hodetail_id->EditCustomAttributes = "";
		$this->hodetail_id->EditValue = $this->hodetail_id->CurrentValue;
		$this->hodetail_id->ViewCustomAttributes = "";

		// asset_id
		$this->asset_id->EditAttrs["class"] = "form-control";
		$this->asset_id->EditCustomAttributes = "";
		$this->asset_id->EditValue = $this->asset_id->CurrentValue;
		$this->asset_id->PlaceHolder = RemoveHtml($this->asset_id->caption());

		// Property
		$this->Property->EditAttrs["class"] = "form-control";
		$this->Property->EditCustomAttributes = "";
		if (!$this->Property->Raw)
			$this->Property->CurrentValue = HtmlDecode($this->Property->CurrentValue);
		$this->Property->EditValue = $this->Property->CurrentValue;
		$this->Property->PlaceHolder = RemoveHtml($this->Property->caption());

		// TemplateFile
		$this->TemplateFile->EditAttrs["class"] = "form-control";
		$this->TemplateFile->EditCustomAttributes = "";
		if (!$this->TemplateFile->Raw)
			$this->TemplateFile->CurrentValue = HtmlDecode($this->TemplateFile->CurrentValue);
		$this->TemplateFile->EditValue = $this->TemplateFile->CurrentValue;
		$this->TemplateFile->PlaceHolder = RemoveHtml($this->TemplateFile->caption());

		// hoDepartmentTo
		$this->hoDepartmentTo->EditAttrs["class"] = "form-control";
		$this->hoDepartmentTo->EditCustomAttributes = "";
		if (!$this->hoDepartmentTo->Raw)
			$this->hoDepartmentTo->CurrentValue = HtmlDecode($this->hoDepartmentTo->CurrentValue);
		$this->hoDepartmentTo->EditValue = $this->hoDepartmentTo->CurrentValue;
		$this->hoDepartmentTo->PlaceHolder = RemoveHtml($this->hoDepartmentTo->caption());

		// hoSignatureTo
		$this->hoSignatureTo->EditAttrs["class"] = "form-control";
		$this->hoSignatureTo->EditCustomAttributes = "";
		if (!$this->hoSignatureTo->Raw)
			$this->hoSignatureTo->CurrentValue = HtmlDecode($this->hoSignatureTo->CurrentValue);
		$this->hoSignatureTo->EditValue = $this->hoSignatureTo->CurrentValue;
		$this->hoSignatureTo->PlaceHolder = RemoveHtml($this->hoSignatureTo->caption());

		// hoJobTitleTo
		$this->hoJobTitleTo->EditAttrs["class"] = "form-control";
		$this->hoJobTitleTo->EditCustomAttributes = "";
		if (!$this->hoJobTitleTo->Raw)
			$this->hoJobTitleTo->CurrentValue = HtmlDecode($this->hoJobTitleTo->CurrentValue);
		$this->hoJobTitleTo->EditValue = $this->hoJobTitleTo->CurrentValue;
		$this->hoJobTitleTo->PlaceHolder = RemoveHtml($this->hoJobTitleTo->caption());

		// hoDepartmentBy
		$this->hoDepartmentBy->EditAttrs["class"] = "form-control";
		$this->hoDepartmentBy->EditCustomAttributes = "";
		if (!$this->hoDepartmentBy->Raw)
			$this->hoDepartmentBy->CurrentValue = HtmlDecode($this->hoDepartmentBy->CurrentValue);
		$this->hoDepartmentBy->EditValue = $this->hoDepartmentBy->CurrentValue;
		$this->hoDepartmentBy->PlaceHolder = RemoveHtml($this->hoDepartmentBy->caption());

		// hoSignatureBy
		$this->hoSignatureBy->EditAttrs["class"] = "form-control";
		$this->hoSignatureBy->EditCustomAttributes = "";
		if (!$this->hoSignatureBy->Raw)
			$this->hoSignatureBy->CurrentValue = HtmlDecode($this->hoSignatureBy->CurrentValue);
		$this->hoSignatureBy->EditValue = $this->hoSignatureBy->CurrentValue;
		$this->hoSignatureBy->PlaceHolder = RemoveHtml($this->hoSignatureBy->caption());

		// hoJobTitleBy
		$this->hoJobTitleBy->EditAttrs["class"] = "form-control";
		$this->hoJobTitleBy->EditCustomAttributes = "";
		if (!$this->hoJobTitleBy->Raw)
			$this->hoJobTitleBy->CurrentValue = HtmlDecode($this->hoJobTitleBy->CurrentValue);
		$this->hoJobTitleBy->EditValue = $this->hoJobTitleBy->CurrentValue;
		$this->hoJobTitleBy->PlaceHolder = RemoveHtml($this->hoJobTitleBy->caption());

		// Code
		$this->Code->EditAttrs["class"] = "form-control";
		$this->Code->EditCustomAttributes = "";
		if (!$this->Code->Raw)
			$this->Code->CurrentValue = HtmlDecode($this->Code->CurrentValue);
		$this->Code->EditValue = $this->Code->CurrentValue;
		$this->Code->PlaceHolder = RemoveHtml($this->Code->caption());

		// Description
		$this->Description->EditAttrs["class"] = "form-control";
		$this->Description->EditCustomAttributes = "";
		if (!$this->Description->Raw)
			$this->Description->CurrentValue = HtmlDecode($this->Description->CurrentValue);
		$this->Description->EditValue = $this->Description->CurrentValue;
		$this->Description->PlaceHolder = RemoveHtml($this->Description->caption());

		// Type
		$this->Type->EditAttrs["class"] = "form-control";
		$this->Type->EditCustomAttributes = "";
		if (!$this->Type->Raw)
			$this->Type->CurrentValue = HtmlDecode($this->Type->CurrentValue);
		$this->Type->EditValue = $this->Type->CurrentValue;
		$this->Type->PlaceHolder = RemoveHtml($this->Type->caption());

		// Group
		$this->Group->EditAttrs["class"] = "form-control";
		$this->Group->EditCustomAttributes = "";
		if (!$this->Group->Raw)
			$this->Group->CurrentValue = HtmlDecode($this->Group->CurrentValue);
		$this->Group->EditValue = $this->Group->CurrentValue;
		$this->Group->PlaceHolder = RemoveHtml($this->Group->caption());

		// ProcurementDate
		$this->ProcurementDate->EditAttrs["class"] = "form-control";
		$this->ProcurementDate->EditCustomAttributes = "";
		$this->ProcurementDate->EditValue = FormatDateTime($this->ProcurementDate->CurrentValue, 8);
		$this->ProcurementDate->PlaceHolder = RemoveHtml($this->ProcurementDate->caption());

		// ProcurementCurrentCost
		$this->ProcurementCurrentCost->EditAttrs["class"] = "form-control";
		$this->ProcurementCurrentCost->EditCustomAttributes = "";
		$this->ProcurementCurrentCost->EditValue = $this->ProcurementCurrentCost->CurrentValue;
		$this->ProcurementCurrentCost->PlaceHolder = RemoveHtml($this->ProcurementCurrentCost->caption());
		if (strval($this->ProcurementCurrentCost->EditValue) != "" && is_numeric($this->ProcurementCurrentCost->EditValue))
			$this->ProcurementCurrentCost->EditValue = FormatNumber($this->ProcurementCurrentCost->EditValue, -2, -2, -2, -2);
		

		// Estimated Life (in Year)
		$this->Estimated_Life_28in_Year29->EditAttrs["class"] = "form-control";
		$this->Estimated_Life_28in_Year29->EditCustomAttributes = "";
		$this->Estimated_Life_28in_Year29->EditValue = $this->Estimated_Life_28in_Year29->CurrentValue;
		$this->Estimated_Life_28in_Year29->PlaceHolder = RemoveHtml($this->Estimated_Life_28in_Year29->caption());

		// Qty
		$this->Qty->EditAttrs["class"] = "form-control";
		$this->Qty->EditCustomAttributes = "";
		$this->Qty->EditValue = $this->Qty->CurrentValue;
		$this->Qty->PlaceHolder = RemoveHtml($this->Qty->caption());
		if (strval($this->Qty->EditValue) != "" && is_numeric($this->Qty->EditValue))
			$this->Qty->EditValue = FormatNumber($this->Qty->EditValue, -2, -2, -2, -2);
		

		// Remarks
		$this->Remarks->EditAttrs["class"] = "form-control";
		$this->Remarks->EditCustomAttributes = "";
		$this->Remarks->EditValue = $this->Remarks->CurrentValue;
		$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

		// Sign1Signature
		$this->Sign1Signature->EditAttrs["class"] = "form-control";
		$this->Sign1Signature->EditCustomAttributes = "";
		if (!$this->Sign1Signature->Raw)
			$this->Sign1Signature->CurrentValue = HtmlDecode($this->Sign1Signature->CurrentValue);
		$this->Sign1Signature->EditValue = $this->Sign1Signature->CurrentValue;
		$this->Sign1Signature->PlaceHolder = RemoveHtml($this->Sign1Signature->caption());

		// Sign1JobTitle
		$this->Sign1JobTitle->EditAttrs["class"] = "form-control";
		$this->Sign1JobTitle->EditCustomAttributes = "";
		if (!$this->Sign1JobTitle->Raw)
			$this->Sign1JobTitle->CurrentValue = HtmlDecode($this->Sign1JobTitle->CurrentValue);
		$this->Sign1JobTitle->EditValue = $this->Sign1JobTitle->CurrentValue;
		$this->Sign1JobTitle->PlaceHolder = RemoveHtml($this->Sign1JobTitle->caption());

		// Sign2Signature
		$this->Sign2Signature->EditAttrs["class"] = "form-control";
		$this->Sign2Signature->EditCustomAttributes = "";
		if (!$this->Sign2Signature->Raw)
			$this->Sign2Signature->CurrentValue = HtmlDecode($this->Sign2Signature->CurrentValue);
		$this->Sign2Signature->EditValue = $this->Sign2Signature->CurrentValue;
		$this->Sign2Signature->PlaceHolder = RemoveHtml($this->Sign2Signature->caption());

		// Sign2JobTitle
		$this->Sign2JobTitle->EditAttrs["class"] = "form-control";
		$this->Sign2JobTitle->EditCustomAttributes = "";
		if (!$this->Sign2JobTitle->Raw)
			$this->Sign2JobTitle->CurrentValue = HtmlDecode($this->Sign2JobTitle->CurrentValue);
		$this->Sign2JobTitle->EditValue = $this->Sign2JobTitle->CurrentValue;
		$this->Sign2JobTitle->PlaceHolder = RemoveHtml($this->Sign2JobTitle->caption());

		// Sign3Signature
		$this->Sign3Signature->EditAttrs["class"] = "form-control";
		$this->Sign3Signature->EditCustomAttributes = "";
		if (!$this->Sign3Signature->Raw)
			$this->Sign3Signature->CurrentValue = HtmlDecode($this->Sign3Signature->CurrentValue);
		$this->Sign3Signature->EditValue = $this->Sign3Signature->CurrentValue;
		$this->Sign3Signature->PlaceHolder = RemoveHtml($this->Sign3Signature->caption());

		// Sign3JobTitle
		$this->Sign3JobTitle->EditAttrs["class"] = "form-control";
		$this->Sign3JobTitle->EditCustomAttributes = "";
		if (!$this->Sign3JobTitle->Raw)
			$this->Sign3JobTitle->CurrentValue = HtmlDecode($this->Sign3JobTitle->CurrentValue);
		$this->Sign3JobTitle->EditValue = $this->Sign3JobTitle->CurrentValue;
		$this->Sign3JobTitle->PlaceHolder = RemoveHtml($this->Sign3JobTitle->caption());

		// Sign4Signature
		$this->Sign4Signature->EditAttrs["class"] = "form-control";
		$this->Sign4Signature->EditCustomAttributes = "";
		if (!$this->Sign4Signature->Raw)
			$this->Sign4Signature->CurrentValue = HtmlDecode($this->Sign4Signature->CurrentValue);
		$this->Sign4Signature->EditValue = $this->Sign4Signature->CurrentValue;
		$this->Sign4Signature->PlaceHolder = RemoveHtml($this->Sign4Signature->caption());

		// Sign4JobTitle
		$this->Sign4JobTitle->EditAttrs["class"] = "form-control";
		$this->Sign4JobTitle->EditCustomAttributes = "";
		if (!$this->Sign4JobTitle->Raw)
			$this->Sign4JobTitle->CurrentValue = HtmlDecode($this->Sign4JobTitle->CurrentValue);
		$this->Sign4JobTitle->EditValue = $this->Sign4JobTitle->CurrentValue;
		$this->Sign4JobTitle->PlaceHolder = RemoveHtml($this->Sign4JobTitle->caption());

		// AssetDepartment
		$this->AssetDepartment->EditAttrs["class"] = "form-control";
		$this->AssetDepartment->EditCustomAttributes = "";
		if (!$this->AssetDepartment->Raw)
			$this->AssetDepartment->CurrentValue = HtmlDecode($this->AssetDepartment->CurrentValue);
		$this->AssetDepartment->EditValue = $this->AssetDepartment->CurrentValue;
		$this->AssetDepartment->PlaceHolder = RemoveHtml($this->AssetDepartment->caption());

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Aggregate list row values
	public function aggregateListRowValues()
	{
	}

	// Aggregate list row (for rendering)
	public function aggregateListRow()
	{

		// Call Row Rendered event
		$this->Row_Rendered();
	}

	// Export data in HTML/CSV/Word/Excel/Email/PDF format
	public function exportDocument($doc, $recordset, $startRec = 1, $stopRec = 1, $exportPageType = "")
	{
		if (!$recordset || !$doc)
			return;
		if (!$doc->ExportCustom) {

			// Write header
			$doc->exportTableHeader();
			if ($doc->Horizontal) { // Horizontal format, write header
				$doc->beginExportRow();
				if ($exportPageType == "view") {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->TransactionNo);
					$doc->exportCaption($this->TransactionDate);
					$doc->exportCaption($this->HandedOverTo);
					$doc->exportCaption($this->DepartmentTo);
					$doc->exportCaption($this->HandedOverBy);
					$doc->exportCaption($this->DepartmentBy);
					$doc->exportCaption($this->Sign1);
					$doc->exportCaption($this->Sign2);
					$doc->exportCaption($this->Sign3);
					$doc->exportCaption($this->Sign4);
					$doc->exportCaption($this->hodetail_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->Property);
					$doc->exportCaption($this->TemplateFile);
					$doc->exportCaption($this->hoDepartmentTo);
					$doc->exportCaption($this->hoSignatureTo);
					$doc->exportCaption($this->hoJobTitleTo);
					$doc->exportCaption($this->hoDepartmentBy);
					$doc->exportCaption($this->hoSignatureBy);
					$doc->exportCaption($this->hoJobTitleBy);
					$doc->exportCaption($this->Code);
					$doc->exportCaption($this->Description);
					$doc->exportCaption($this->Type);
					$doc->exportCaption($this->Group);
					$doc->exportCaption($this->ProcurementDate);
					$doc->exportCaption($this->ProcurementCurrentCost);
					$doc->exportCaption($this->Estimated_Life_28in_Year29);
					$doc->exportCaption($this->Qty);
					$doc->exportCaption($this->Remarks);
					$doc->exportCaption($this->Sign1Signature);
					$doc->exportCaption($this->Sign1JobTitle);
					$doc->exportCaption($this->Sign2Signature);
					$doc->exportCaption($this->Sign2JobTitle);
					$doc->exportCaption($this->Sign3Signature);
					$doc->exportCaption($this->Sign3JobTitle);
					$doc->exportCaption($this->Sign4Signature);
					$doc->exportCaption($this->Sign4JobTitle);
					$doc->exportCaption($this->AssetDepartment);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->TransactionNo);
					$doc->exportCaption($this->TransactionDate);
					$doc->exportCaption($this->HandedOverTo);
					$doc->exportCaption($this->DepartmentTo);
					$doc->exportCaption($this->HandedOverBy);
					$doc->exportCaption($this->DepartmentBy);
					$doc->exportCaption($this->Sign1);
					$doc->exportCaption($this->Sign2);
					$doc->exportCaption($this->Sign3);
					$doc->exportCaption($this->Sign4);
					$doc->exportCaption($this->hodetail_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->Property);
					$doc->exportCaption($this->TemplateFile);
					$doc->exportCaption($this->hoDepartmentTo);
					$doc->exportCaption($this->hoSignatureTo);
					$doc->exportCaption($this->hoJobTitleTo);
					$doc->exportCaption($this->hoDepartmentBy);
					$doc->exportCaption($this->hoSignatureBy);
					$doc->exportCaption($this->hoJobTitleBy);
					$doc->exportCaption($this->Code);
					$doc->exportCaption($this->Description);
					$doc->exportCaption($this->Type);
					$doc->exportCaption($this->Group);
					$doc->exportCaption($this->ProcurementDate);
					$doc->exportCaption($this->ProcurementCurrentCost);
					$doc->exportCaption($this->Estimated_Life_28in_Year29);
					$doc->exportCaption($this->Qty);
					$doc->exportCaption($this->Sign1Signature);
					$doc->exportCaption($this->Sign1JobTitle);
					$doc->exportCaption($this->Sign2Signature);
					$doc->exportCaption($this->Sign2JobTitle);
					$doc->exportCaption($this->Sign3Signature);
					$doc->exportCaption($this->Sign3JobTitle);
					$doc->exportCaption($this->Sign4Signature);
					$doc->exportCaption($this->Sign4JobTitle);
					$doc->exportCaption($this->AssetDepartment);
				}
				$doc->endExportRow();
			}
		}

		// Move to first record
		$recCnt = $startRec - 1;
		if (!$recordset->EOF) {
			$recordset->moveFirst();
			if ($startRec > 1)
				$recordset->move($startRec - 1);
		}
		while (!$recordset->EOF && $recCnt < $stopRec) {
			$recCnt++;
			if ($recCnt >= $startRec) {
				$rowCnt = $recCnt - $startRec + 1;

				// Page break
				if ($this->ExportPageBreakCount > 0) {
					if ($rowCnt > 1 && ($rowCnt - 1) % $this->ExportPageBreakCount == 0)
						$doc->exportPageBreak();
				}
				$this->loadListRowValues($recordset);

				// Render row
				$this->RowType = ROWTYPE_VIEW; // Render view
				$this->resetAttributes();
				$this->renderListRow();
				if (!$doc->ExportCustom) {
					$doc->beginExportRow($rowCnt); // Allow CSS styles if enabled
					if ($exportPageType == "view") {
						$doc->exportField($this->id);
						$doc->exportField($this->property_id);
						$doc->exportField($this->TransactionNo);
						$doc->exportField($this->TransactionDate);
						$doc->exportField($this->HandedOverTo);
						$doc->exportField($this->DepartmentTo);
						$doc->exportField($this->HandedOverBy);
						$doc->exportField($this->DepartmentBy);
						$doc->exportField($this->Sign1);
						$doc->exportField($this->Sign2);
						$doc->exportField($this->Sign3);
						$doc->exportField($this->Sign4);
						$doc->exportField($this->hodetail_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->Property);
						$doc->exportField($this->TemplateFile);
						$doc->exportField($this->hoDepartmentTo);
						$doc->exportField($this->hoSignatureTo);
						$doc->exportField($this->hoJobTitleTo);
						$doc->exportField($this->hoDepartmentBy);
						$doc->exportField($this->hoSignatureBy);
						$doc->exportField($this->hoJobTitleBy);
						$doc->exportField($this->Code);
						$doc->exportField($this->Description);
						$doc->exportField($this->Type);
						$doc->exportField($this->Group);
						$doc->exportField($this->ProcurementDate);
						$doc->exportField($this->ProcurementCurrentCost);
						$doc->exportField($this->Estimated_Life_28in_Year29);
						$doc->exportField($this->Qty);
						$doc->exportField($this->Remarks);
						$doc->exportField($this->Sign1Signature);
						$doc->exportField($this->Sign1JobTitle);
						$doc->exportField($this->Sign2Signature);
						$doc->exportField($this->Sign2JobTitle);
						$doc->exportField($this->Sign3Signature);
						$doc->exportField($this->Sign3JobTitle);
						$doc->exportField($this->Sign4Signature);
						$doc->exportField($this->Sign4JobTitle);
						$doc->exportField($this->AssetDepartment);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->property_id);
						$doc->exportField($this->TransactionNo);
						$doc->exportField($this->TransactionDate);
						$doc->exportField($this->HandedOverTo);
						$doc->exportField($this->DepartmentTo);
						$doc->exportField($this->HandedOverBy);
						$doc->exportField($this->DepartmentBy);
						$doc->exportField($this->Sign1);
						$doc->exportField($this->Sign2);
						$doc->exportField($this->Sign3);
						$doc->exportField($this->Sign4);
						$doc->exportField($this->hodetail_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->Property);
						$doc->exportField($this->TemplateFile);
						$doc->exportField($this->hoDepartmentTo);
						$doc->exportField($this->hoSignatureTo);
						$doc->exportField($this->hoJobTitleTo);
						$doc->exportField($this->hoDepartmentBy);
						$doc->exportField($this->hoSignatureBy);
						$doc->exportField($this->hoJobTitleBy);
						$doc->exportField($this->Code);
						$doc->exportField($this->Description);
						$doc->exportField($this->Type);
						$doc->exportField($this->Group);
						$doc->exportField($this->ProcurementDate);
						$doc->exportField($this->ProcurementCurrentCost);
						$doc->exportField($this->Estimated_Life_28in_Year29);
						$doc->exportField($this->Qty);
						$doc->exportField($this->Sign1Signature);
						$doc->exportField($this->Sign1JobTitle);
						$doc->exportField($this->Sign2Signature);
						$doc->exportField($this->Sign2JobTitle);
						$doc->exportField($this->Sign3Signature);
						$doc->exportField($this->Sign3JobTitle);
						$doc->exportField($this->Sign4Signature);
						$doc->exportField($this->Sign4JobTitle);
						$doc->exportField($this->AssetDepartment);
					}
					$doc->endExportRow($rowCnt);
				}
			}

			// Call Row Export server event
			if ($doc->ExportCustom)
				$this->Row_Export($recordset->fields);
			$recordset->moveNext();
		}
		if (!$doc->ExportCustom) {
			$doc->exportTableFooter();
		}
	}

	// Get file data
	public function getFileData($fldparm, $key, $resize, $width = 0, $height = 0)
	{

		// No binary fields
		return FALSE;
	}

	// Table level events
	// Recordset Selecting event
	function Recordset_Selecting(&$filter) {

		// Enter your code here
	}

	// Recordset Selected event
	function Recordset_Selected(&$rs) {

		//echo "Recordset Selected";
	}

	// Recordset Search Validated event
	function Recordset_SearchValidated() {

		// Example:
		//$this->MyField1->AdvancedSearch->SearchValue = "your search criteria"; // Search value

	}

	// Recordset Searching event
	function Recordset_Searching(&$filter) {

		// Enter your code here
	}

	// Row_Selecting event
	function Row_Selecting(&$filter) {

		// Enter your code here
	}

	// Row Selected event
	function Row_Selected(&$rs) {

		//echo "Row Selected";
	}

	// Row Inserting event
	function Row_Inserting($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Inserted event
	function Row_Inserted($rsold, &$rsnew) {

		//echo "Row Inserted"
	}

	// Row Updating event
	function Row_Updating($rsold, &$rsnew) {

		// Enter your code here
		// To cancel, set return value to FALSE

		return TRUE;
	}

	// Row Updated event
	function Row_Updated($rsold, &$rsnew) {

		//echo "Row Updated";
	}

	// Row Update Conflict event
	function Row_UpdateConflict($rsold, &$rsnew) {

		// Enter your code here
		// To ignore conflict, set return value to FALSE

		return TRUE;
	}

	// Grid Inserting event
	function Grid_Inserting() {

		// Enter your code here
		// To reject grid insert, set return value to FALSE

		return TRUE;
	}

	// Grid Inserted event
	function Grid_Inserted($rsnew) {

		//echo "Grid Inserted";
	}

	// Grid Updating event
	function Grid_Updating($rsold) {

		// Enter your code here
		// To reject grid update, set return value to FALSE

		return TRUE;
	}

	// Grid Updated event
	function Grid_Updated($rsold, $rsnew) {

		//echo "Grid Updated";
	}

	// Row Deleting event
	function Row_Deleting(&$rs) {

		// Enter your code here
		// To cancel, set return value to False

		return TRUE;
	}

	// Row Deleted event
	function Row_Deleted(&$rs) {

		//echo "Row Deleted";
	}

	// Email Sending event
	function Email_Sending($email, &$args) {

		//var_dump($email); var_dump($args); exit();
		return TRUE;
	}

	// Lookup Selecting event
	function Lookup_Selecting($fld, &$filter) {

		//var_dump($fld->Name, $fld->Lookup, $filter); // Uncomment to view the filter
		// Enter your code here

	}

	// Row Rendering event
	function Row_Rendering() {

		// Enter your code here
	}

	// Row Rendered event
	function Row_Rendered() {

		// To view properties of field class, use:
		//var_dump($this-><FieldName>);

	}

	// User ID Filtering event
	function UserID_Filtering(&$filter) {

		// Enter your code here
	}
}
?>