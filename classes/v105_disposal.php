<?php namespace PHPMaker2020\p_simasset1; ?>
<?php

/**
 * Table class for v105_disposal
 */
class v105_disposal extends DbTable
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
	public $property;
	public $templatefile2;
	public $transactionno;
	public $transactiondate;
	public $recommendedby;
	public $signatureby;
	public $positionby;
	public $ce_id;
	public $signaturece;
	public $itm_id;
	public $signatureitm;
	public $sign1;
	public $jobt1;
	public $sign2;
	public $jobt2;
	public $sign3;
	public $jobt3;
	public $disposaldetail_id;
	public $asset_id;
	public $code;
	public $description;
	public $department_id;
	public $asset_dept;
	public $procurementdate;
	public $procurementcurrentcost;
	public $remarks;
	public $condstatus;
	public $reasonstatus;
	public $disposaldate;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v105_disposal';
		$this->TableName = 'v105_disposal';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v105_disposal`";
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
		$this->id = new DbField('v105_disposal', 'v105_disposal', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// property_id
		$this->property_id = new DbField('v105_disposal', 'v105_disposal', 'x_property_id', 'property_id', '`property_id`', '`property_id`', 3, 11, -1, FALSE, '`property_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->property_id->Nullable = FALSE; // NOT NULL field
		$this->property_id->Required = TRUE; // Required field
		$this->property_id->Sortable = TRUE; // Allow sort
		$this->property_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['property_id'] = &$this->property_id;

		// property
		$this->property = new DbField('v105_disposal', 'v105_disposal', 'x_property', 'property', '`property`', '`property`', 200, 100, -1, FALSE, '`property`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->property->Sortable = TRUE; // Allow sort
		$this->fields['property'] = &$this->property;

		// templatefile2
		$this->templatefile2 = new DbField('v105_disposal', 'v105_disposal', 'x_templatefile2', 'templatefile2', '`templatefile2`', '`templatefile2`', 200, 100, -1, FALSE, '`templatefile2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->templatefile2->Sortable = TRUE; // Allow sort
		$this->fields['templatefile2'] = &$this->templatefile2;

		// transactionno
		$this->transactionno = new DbField('v105_disposal', 'v105_disposal', 'x_transactionno', 'transactionno', '`transactionno`', '`transactionno`', 200, 25, -1, FALSE, '`transactionno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->transactionno->Nullable = FALSE; // NOT NULL field
		$this->transactionno->Required = TRUE; // Required field
		$this->transactionno->Sortable = TRUE; // Allow sort
		$this->fields['transactionno'] = &$this->transactionno;

		// transactiondate
		$this->transactiondate = new DbField('v105_disposal', 'v105_disposal', 'x_transactiondate', 'transactiondate', '`transactiondate`', CastDateFieldForLike("`transactiondate`", 0, "DB"), 133, 10, 0, FALSE, '`transactiondate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->transactiondate->Nullable = FALSE; // NOT NULL field
		$this->transactiondate->Required = TRUE; // Required field
		$this->transactiondate->Sortable = TRUE; // Allow sort
		$this->transactiondate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['transactiondate'] = &$this->transactiondate;

		// recommendedby
		$this->recommendedby = new DbField('v105_disposal', 'v105_disposal', 'x_recommendedby', 'recommendedby', '`recommendedby`', '`recommendedby`', 3, 11, -1, FALSE, '`recommendedby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->recommendedby->Nullable = FALSE; // NOT NULL field
		$this->recommendedby->Required = TRUE; // Required field
		$this->recommendedby->Sortable = TRUE; // Allow sort
		$this->recommendedby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['recommendedby'] = &$this->recommendedby;

		// signatureby
		$this->signatureby = new DbField('v105_disposal', 'v105_disposal', 'x_signatureby', 'signatureby', '`signatureby`', '`signatureby`', 200, 100, -1, FALSE, '`signatureby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signatureby->Sortable = TRUE; // Allow sort
		$this->fields['signatureby'] = &$this->signatureby;

		// positionby
		$this->positionby = new DbField('v105_disposal', 'v105_disposal', 'x_positionby', 'positionby', '`positionby`', '`positionby`', 200, 100, -1, FALSE, '`positionby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->positionby->Sortable = TRUE; // Allow sort
		$this->fields['positionby'] = &$this->positionby;

		// ce_id
		$this->ce_id = new DbField('v105_disposal', 'v105_disposal', 'x_ce_id', 'ce_id', '`ce_id`', '`ce_id`', 3, 11, -1, FALSE, '`ce_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->ce_id->Nullable = FALSE; // NOT NULL field
		$this->ce_id->Required = TRUE; // Required field
		$this->ce_id->Sortable = TRUE; // Allow sort
		$this->ce_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ce_id'] = &$this->ce_id;

		// signaturece
		$this->signaturece = new DbField('v105_disposal', 'v105_disposal', 'x_signaturece', 'signaturece', '`signaturece`', '`signaturece`', 200, 100, -1, FALSE, '`signaturece`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signaturece->Sortable = TRUE; // Allow sort
		$this->fields['signaturece'] = &$this->signaturece;

		// itm_id
		$this->itm_id = new DbField('v105_disposal', 'v105_disposal', 'x_itm_id', 'itm_id', '`itm_id`', '`itm_id`', 3, 11, -1, FALSE, '`itm_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->itm_id->Nullable = FALSE; // NOT NULL field
		$this->itm_id->Required = TRUE; // Required field
		$this->itm_id->Sortable = TRUE; // Allow sort
		$this->itm_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['itm_id'] = &$this->itm_id;

		// signatureitm
		$this->signatureitm = new DbField('v105_disposal', 'v105_disposal', 'x_signatureitm', 'signatureitm', '`signatureitm`', '`signatureitm`', 200, 100, -1, FALSE, '`signatureitm`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signatureitm->Sortable = TRUE; // Allow sort
		$this->fields['signatureitm'] = &$this->signatureitm;

		// sign1
		$this->sign1 = new DbField('v105_disposal', 'v105_disposal', 'x_sign1', 'sign1', '`sign1`', '`sign1`', 3, 11, -1, FALSE, '`sign1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sign1->Nullable = FALSE; // NOT NULL field
		$this->sign1->Required = TRUE; // Required field
		$this->sign1->Sortable = TRUE; // Allow sort
		$this->sign1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign1'] = &$this->sign1;

		// jobt1
		$this->jobt1 = new DbField('v105_disposal', 'v105_disposal', 'x_jobt1', 'jobt1', '`jobt1`', '`jobt1`', 200, 100, -1, FALSE, '`jobt1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobt1->Sortable = TRUE; // Allow sort
		$this->fields['jobt1'] = &$this->jobt1;

		// sign2
		$this->sign2 = new DbField('v105_disposal', 'v105_disposal', 'x_sign2', 'sign2', '`sign2`', '`sign2`', 3, 11, -1, FALSE, '`sign2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sign2->Nullable = FALSE; // NOT NULL field
		$this->sign2->Required = TRUE; // Required field
		$this->sign2->Sortable = TRUE; // Allow sort
		$this->sign2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign2'] = &$this->sign2;

		// jobt2
		$this->jobt2 = new DbField('v105_disposal', 'v105_disposal', 'x_jobt2', 'jobt2', '`jobt2`', '`jobt2`', 200, 100, -1, FALSE, '`jobt2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobt2->Sortable = TRUE; // Allow sort
		$this->fields['jobt2'] = &$this->jobt2;

		// sign3
		$this->sign3 = new DbField('v105_disposal', 'v105_disposal', 'x_sign3', 'sign3', '`sign3`', '`sign3`', 3, 11, -1, FALSE, '`sign3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sign3->Nullable = FALSE; // NOT NULL field
		$this->sign3->Required = TRUE; // Required field
		$this->sign3->Sortable = TRUE; // Allow sort
		$this->sign3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign3'] = &$this->sign3;

		// jobt3
		$this->jobt3 = new DbField('v105_disposal', 'v105_disposal', 'x_jobt3', 'jobt3', '`jobt3`', '`jobt3`', 200, 100, -1, FALSE, '`jobt3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobt3->Sortable = TRUE; // Allow sort
		$this->fields['jobt3'] = &$this->jobt3;

		// disposaldetail_id
		$this->disposaldetail_id = new DbField('v105_disposal', 'v105_disposal', 'x_disposaldetail_id', 'disposaldetail_id', '`disposaldetail_id`', '`disposaldetail_id`', 3, 11, -1, FALSE, '`disposaldetail_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->disposaldetail_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->disposaldetail_id->IsPrimaryKey = TRUE; // Primary key field
		$this->disposaldetail_id->Sortable = TRUE; // Allow sort
		$this->disposaldetail_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['disposaldetail_id'] = &$this->disposaldetail_id;

		// asset_id
		$this->asset_id = new DbField('v105_disposal', 'v105_disposal', 'x_asset_id', 'asset_id', '`asset_id`', '`asset_id`', 3, 11, -1, FALSE, '`asset_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->asset_id->Sortable = TRUE; // Allow sort
		$this->asset_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['asset_id'] = &$this->asset_id;

		// code
		$this->code = new DbField('v105_disposal', 'v105_disposal', 'x_code', 'code', '`code`', '`code`', 200, 25, -1, FALSE, '`code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->code->Sortable = TRUE; // Allow sort
		$this->fields['code'] = &$this->code;

		// description
		$this->description = new DbField('v105_disposal', 'v105_disposal', 'x_description', 'description', '`description`', '`description`', 200, 255, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->description->Sortable = TRUE; // Allow sort
		$this->fields['description'] = &$this->description;

		// department_id
		$this->department_id = new DbField('v105_disposal', 'v105_disposal', 'x_department_id', 'department_id', '`department_id`', '`department_id`', 3, 11, -1, FALSE, '`department_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->department_id->Sortable = TRUE; // Allow sort
		$this->department_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['department_id'] = &$this->department_id;

		// asset_dept
		$this->asset_dept = new DbField('v105_disposal', 'v105_disposal', 'x_asset_dept', 'asset_dept', '`asset_dept`', '`asset_dept`', 200, 100, -1, FALSE, '`asset_dept`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->asset_dept->Sortable = TRUE; // Allow sort
		$this->fields['asset_dept'] = &$this->asset_dept;

		// procurementdate
		$this->procurementdate = new DbField('v105_disposal', 'v105_disposal', 'x_procurementdate', 'procurementdate', '`procurementdate`', CastDateFieldForLike("`procurementdate`", 0, "DB"), 133, 10, 0, FALSE, '`procurementdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->procurementdate->Sortable = TRUE; // Allow sort
		$this->procurementdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['procurementdate'] = &$this->procurementdate;

		// procurementcurrentcost
		$this->procurementcurrentcost = new DbField('v105_disposal', 'v105_disposal', 'x_procurementcurrentcost', 'procurementcurrentcost', '`procurementcurrentcost`', '`procurementcurrentcost`', 4, 17, -1, FALSE, '`procurementcurrentcost`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->procurementcurrentcost->Sortable = TRUE; // Allow sort
		$this->procurementcurrentcost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['procurementcurrentcost'] = &$this->procurementcurrentcost;

		// remarks
		$this->remarks = new DbField('v105_disposal', 'v105_disposal', 'x_remarks', 'remarks', '`remarks`', '`remarks`', 201, 65535, -1, FALSE, '`remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->remarks->Sortable = TRUE; // Allow sort
		$this->fields['remarks'] = &$this->remarks;

		// condstatus
		$this->condstatus = new DbField('v105_disposal', 'v105_disposal', 'x_condstatus', 'condstatus', '`condstatus`', '`condstatus`', 200, 50, -1, FALSE, '`condstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->condstatus->Sortable = TRUE; // Allow sort
		$this->fields['condstatus'] = &$this->condstatus;

		// reasonstatus
		$this->reasonstatus = new DbField('v105_disposal', 'v105_disposal', 'x_reasonstatus', 'reasonstatus', '`reasonstatus`', '`reasonstatus`', 200, 50, -1, FALSE, '`reasonstatus`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->reasonstatus->Sortable = TRUE; // Allow sort
		$this->fields['reasonstatus'] = &$this->reasonstatus;

		// disposaldate
		$this->disposaldate = new DbField('v105_disposal', 'v105_disposal', 'x_disposaldate', 'disposaldate', '`disposaldate`', CastDateFieldForLike("`disposaldate`", 0, "DB"), 133, 10, 0, FALSE, '`disposaldate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->disposaldate->Sortable = TRUE; // Allow sort
		$this->disposaldate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['disposaldate'] = &$this->disposaldate;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`v105_disposal`";
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
			$this->disposaldetail_id->setDbValue($conn->insert_ID());
			$rs['disposaldetail_id'] = $this->disposaldetail_id->DbValue;
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
			if (array_key_exists('disposaldetail_id', $rs))
				AddFilter($where, QuotedName('disposaldetail_id', $this->Dbid) . '=' . QuotedValue($rs['disposaldetail_id'], $this->disposaldetail_id->DataType, $this->Dbid));
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
		$this->property->DbValue = $row['property'];
		$this->templatefile2->DbValue = $row['templatefile2'];
		$this->transactionno->DbValue = $row['transactionno'];
		$this->transactiondate->DbValue = $row['transactiondate'];
		$this->recommendedby->DbValue = $row['recommendedby'];
		$this->signatureby->DbValue = $row['signatureby'];
		$this->positionby->DbValue = $row['positionby'];
		$this->ce_id->DbValue = $row['ce_id'];
		$this->signaturece->DbValue = $row['signaturece'];
		$this->itm_id->DbValue = $row['itm_id'];
		$this->signatureitm->DbValue = $row['signatureitm'];
		$this->sign1->DbValue = $row['sign1'];
		$this->jobt1->DbValue = $row['jobt1'];
		$this->sign2->DbValue = $row['sign2'];
		$this->jobt2->DbValue = $row['jobt2'];
		$this->sign3->DbValue = $row['sign3'];
		$this->jobt3->DbValue = $row['jobt3'];
		$this->disposaldetail_id->DbValue = $row['disposaldetail_id'];
		$this->asset_id->DbValue = $row['asset_id'];
		$this->code->DbValue = $row['code'];
		$this->description->DbValue = $row['description'];
		$this->department_id->DbValue = $row['department_id'];
		$this->asset_dept->DbValue = $row['asset_dept'];
		$this->procurementdate->DbValue = $row['procurementdate'];
		$this->procurementcurrentcost->DbValue = $row['procurementcurrentcost'];
		$this->remarks->DbValue = $row['remarks'];
		$this->condstatus->DbValue = $row['condstatus'];
		$this->reasonstatus->DbValue = $row['reasonstatus'];
		$this->disposaldate->DbValue = $row['disposaldate'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@ AND `disposaldetail_id` = @disposaldetail_id@";
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
			$val = array_key_exists('disposaldetail_id', $row) ? $row['disposaldetail_id'] : NULL;
		else
			$val = $this->disposaldetail_id->OldValue !== NULL ? $this->disposaldetail_id->OldValue : $this->disposaldetail_id->CurrentValue;
		if (!is_numeric($val))
			return "0=1"; // Invalid key
		if ($val == NULL)
			return "0=1"; // Invalid key
		else
			$keyFilter = str_replace("@disposaldetail_id@", AdjustSql($val, $this->Dbid), $keyFilter); // Replace key value
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
			return "v105_disposallist.php";
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
		if ($pageName == "v105_disposalview.php")
			return $Language->phrase("View");
		elseif ($pageName == "v105_disposaledit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v105_disposaladd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v105_disposallist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v105_disposalview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v105_disposalview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "v105_disposaladd.php?" . $this->getUrlParm($parm);
		else
			$url = "v105_disposaladd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v105_disposaledit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("v105_disposaladd.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("v105_disposaldelete.php", $this->getUrlParm());
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
		$json .= ",disposaldetail_id:" . JsonEncode($this->disposaldetail_id->CurrentValue, "number");
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
		if ($this->disposaldetail_id->CurrentValue != NULL) {
			$url .= "&disposaldetail_id=" . urlencode($this->disposaldetail_id->CurrentValue);
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
			if (Param("disposaldetail_id") !== NULL)
				$arKey[] = Param("disposaldetail_id");
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
				if (!is_numeric($key[1])) // disposaldetail_id
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
				$this->disposaldetail_id->CurrentValue = $key[1];
			else
				$this->disposaldetail_id->OldValue = $key[1];
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
		$this->property->setDbValue($rs->fields('property'));
		$this->templatefile2->setDbValue($rs->fields('templatefile2'));
		$this->transactionno->setDbValue($rs->fields('transactionno'));
		$this->transactiondate->setDbValue($rs->fields('transactiondate'));
		$this->recommendedby->setDbValue($rs->fields('recommendedby'));
		$this->signatureby->setDbValue($rs->fields('signatureby'));
		$this->positionby->setDbValue($rs->fields('positionby'));
		$this->ce_id->setDbValue($rs->fields('ce_id'));
		$this->signaturece->setDbValue($rs->fields('signaturece'));
		$this->itm_id->setDbValue($rs->fields('itm_id'));
		$this->signatureitm->setDbValue($rs->fields('signatureitm'));
		$this->sign1->setDbValue($rs->fields('sign1'));
		$this->jobt1->setDbValue($rs->fields('jobt1'));
		$this->sign2->setDbValue($rs->fields('sign2'));
		$this->jobt2->setDbValue($rs->fields('jobt2'));
		$this->sign3->setDbValue($rs->fields('sign3'));
		$this->jobt3->setDbValue($rs->fields('jobt3'));
		$this->disposaldetail_id->setDbValue($rs->fields('disposaldetail_id'));
		$this->asset_id->setDbValue($rs->fields('asset_id'));
		$this->code->setDbValue($rs->fields('code'));
		$this->description->setDbValue($rs->fields('description'));
		$this->department_id->setDbValue($rs->fields('department_id'));
		$this->asset_dept->setDbValue($rs->fields('asset_dept'));
		$this->procurementdate->setDbValue($rs->fields('procurementdate'));
		$this->procurementcurrentcost->setDbValue($rs->fields('procurementcurrentcost'));
		$this->remarks->setDbValue($rs->fields('remarks'));
		$this->condstatus->setDbValue($rs->fields('condstatus'));
		$this->reasonstatus->setDbValue($rs->fields('reasonstatus'));
		$this->disposaldate->setDbValue($rs->fields('disposaldate'));
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
		// property
		// templatefile2
		// transactionno
		// transactiondate
		// recommendedby
		// signatureby
		// positionby
		// ce_id
		// signaturece
		// itm_id
		// signatureitm
		// sign1
		// jobt1
		// sign2
		// jobt2
		// sign3
		// jobt3
		// disposaldetail_id
		// asset_id
		// code
		// description
		// department_id
		// asset_dept
		// procurementdate
		// procurementcurrentcost
		// remarks
		// condstatus
		// reasonstatus
		// disposaldate
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// property_id
		$this->property_id->ViewValue = $this->property_id->CurrentValue;
		$this->property_id->ViewValue = FormatNumber($this->property_id->ViewValue, 0, -2, -2, -2);
		$this->property_id->ViewCustomAttributes = "";

		// property
		$this->property->ViewValue = $this->property->CurrentValue;
		$this->property->ViewCustomAttributes = "";

		// templatefile2
		$this->templatefile2->ViewValue = $this->templatefile2->CurrentValue;
		$this->templatefile2->ViewCustomAttributes = "";

		// transactionno
		$this->transactionno->ViewValue = $this->transactionno->CurrentValue;
		$this->transactionno->ViewCustomAttributes = "";

		// transactiondate
		$this->transactiondate->ViewValue = $this->transactiondate->CurrentValue;
		$this->transactiondate->ViewValue = FormatDateTime($this->transactiondate->ViewValue, 0);
		$this->transactiondate->ViewCustomAttributes = "";

		// recommendedby
		$this->recommendedby->ViewValue = $this->recommendedby->CurrentValue;
		$this->recommendedby->ViewValue = FormatNumber($this->recommendedby->ViewValue, 0, -2, -2, -2);
		$this->recommendedby->ViewCustomAttributes = "";

		// signatureby
		$this->signatureby->ViewValue = $this->signatureby->CurrentValue;
		$this->signatureby->ViewCustomAttributes = "";

		// positionby
		$this->positionby->ViewValue = $this->positionby->CurrentValue;
		$this->positionby->ViewCustomAttributes = "";

		// ce_id
		$this->ce_id->ViewValue = $this->ce_id->CurrentValue;
		$this->ce_id->ViewValue = FormatNumber($this->ce_id->ViewValue, 0, -2, -2, -2);
		$this->ce_id->ViewCustomAttributes = "";

		// signaturece
		$this->signaturece->ViewValue = $this->signaturece->CurrentValue;
		$this->signaturece->ViewCustomAttributes = "";

		// itm_id
		$this->itm_id->ViewValue = $this->itm_id->CurrentValue;
		$this->itm_id->ViewValue = FormatNumber($this->itm_id->ViewValue, 0, -2, -2, -2);
		$this->itm_id->ViewCustomAttributes = "";

		// signatureitm
		$this->signatureitm->ViewValue = $this->signatureitm->CurrentValue;
		$this->signatureitm->ViewCustomAttributes = "";

		// sign1
		$this->sign1->ViewValue = $this->sign1->CurrentValue;
		$this->sign1->ViewValue = FormatNumber($this->sign1->ViewValue, 0, -2, -2, -2);
		$this->sign1->ViewCustomAttributes = "";

		// jobt1
		$this->jobt1->ViewValue = $this->jobt1->CurrentValue;
		$this->jobt1->ViewCustomAttributes = "";

		// sign2
		$this->sign2->ViewValue = $this->sign2->CurrentValue;
		$this->sign2->ViewValue = FormatNumber($this->sign2->ViewValue, 0, -2, -2, -2);
		$this->sign2->ViewCustomAttributes = "";

		// jobt2
		$this->jobt2->ViewValue = $this->jobt2->CurrentValue;
		$this->jobt2->ViewCustomAttributes = "";

		// sign3
		$this->sign3->ViewValue = $this->sign3->CurrentValue;
		$this->sign3->ViewValue = FormatNumber($this->sign3->ViewValue, 0, -2, -2, -2);
		$this->sign3->ViewCustomAttributes = "";

		// jobt3
		$this->jobt3->ViewValue = $this->jobt3->CurrentValue;
		$this->jobt3->ViewCustomAttributes = "";

		// disposaldetail_id
		$this->disposaldetail_id->ViewValue = $this->disposaldetail_id->CurrentValue;
		$this->disposaldetail_id->ViewCustomAttributes = "";

		// asset_id
		$this->asset_id->ViewValue = $this->asset_id->CurrentValue;
		$this->asset_id->ViewValue = FormatNumber($this->asset_id->ViewValue, 0, -2, -2, -2);
		$this->asset_id->ViewCustomAttributes = "";

		// code
		$this->code->ViewValue = $this->code->CurrentValue;
		$this->code->ViewCustomAttributes = "";

		// description
		$this->description->ViewValue = $this->description->CurrentValue;
		$this->description->ViewCustomAttributes = "";

		// department_id
		$this->department_id->ViewValue = $this->department_id->CurrentValue;
		$this->department_id->ViewValue = FormatNumber($this->department_id->ViewValue, 0, -2, -2, -2);
		$this->department_id->ViewCustomAttributes = "";

		// asset_dept
		$this->asset_dept->ViewValue = $this->asset_dept->CurrentValue;
		$this->asset_dept->ViewCustomAttributes = "";

		// procurementdate
		$this->procurementdate->ViewValue = $this->procurementdate->CurrentValue;
		$this->procurementdate->ViewValue = FormatDateTime($this->procurementdate->ViewValue, 0);
		$this->procurementdate->ViewCustomAttributes = "";

		// procurementcurrentcost
		$this->procurementcurrentcost->ViewValue = $this->procurementcurrentcost->CurrentValue;
		$this->procurementcurrentcost->ViewValue = FormatNumber($this->procurementcurrentcost->ViewValue, 2, -2, -2, -2);
		$this->procurementcurrentcost->ViewCustomAttributes = "";

		// remarks
		$this->remarks->ViewValue = $this->remarks->CurrentValue;
		$this->remarks->ViewCustomAttributes = "";

		// condstatus
		$this->condstatus->ViewValue = $this->condstatus->CurrentValue;
		$this->condstatus->ViewCustomAttributes = "";

		// reasonstatus
		$this->reasonstatus->ViewValue = $this->reasonstatus->CurrentValue;
		$this->reasonstatus->ViewCustomAttributes = "";

		// disposaldate
		$this->disposaldate->ViewValue = $this->disposaldate->CurrentValue;
		$this->disposaldate->ViewValue = FormatDateTime($this->disposaldate->ViewValue, 0);
		$this->disposaldate->ViewCustomAttributes = "";

		// id
		$this->id->LinkCustomAttributes = "";
		$this->id->HrefValue = "";
		$this->id->TooltipValue = "";

		// property_id
		$this->property_id->LinkCustomAttributes = "";
		$this->property_id->HrefValue = "";
		$this->property_id->TooltipValue = "";

		// property
		$this->property->LinkCustomAttributes = "";
		$this->property->HrefValue = "";
		$this->property->TooltipValue = "";

		// templatefile2
		$this->templatefile2->LinkCustomAttributes = "";
		$this->templatefile2->HrefValue = "";
		$this->templatefile2->TooltipValue = "";

		// transactionno
		$this->transactionno->LinkCustomAttributes = "";
		$this->transactionno->HrefValue = "";
		$this->transactionno->TooltipValue = "";

		// transactiondate
		$this->transactiondate->LinkCustomAttributes = "";
		$this->transactiondate->HrefValue = "";
		$this->transactiondate->TooltipValue = "";

		// recommendedby
		$this->recommendedby->LinkCustomAttributes = "";
		$this->recommendedby->HrefValue = "";
		$this->recommendedby->TooltipValue = "";

		// signatureby
		$this->signatureby->LinkCustomAttributes = "";
		$this->signatureby->HrefValue = "";
		$this->signatureby->TooltipValue = "";

		// positionby
		$this->positionby->LinkCustomAttributes = "";
		$this->positionby->HrefValue = "";
		$this->positionby->TooltipValue = "";

		// ce_id
		$this->ce_id->LinkCustomAttributes = "";
		$this->ce_id->HrefValue = "";
		$this->ce_id->TooltipValue = "";

		// signaturece
		$this->signaturece->LinkCustomAttributes = "";
		$this->signaturece->HrefValue = "";
		$this->signaturece->TooltipValue = "";

		// itm_id
		$this->itm_id->LinkCustomAttributes = "";
		$this->itm_id->HrefValue = "";
		$this->itm_id->TooltipValue = "";

		// signatureitm
		$this->signatureitm->LinkCustomAttributes = "";
		$this->signatureitm->HrefValue = "";
		$this->signatureitm->TooltipValue = "";

		// sign1
		$this->sign1->LinkCustomAttributes = "";
		$this->sign1->HrefValue = "";
		$this->sign1->TooltipValue = "";

		// jobt1
		$this->jobt1->LinkCustomAttributes = "";
		$this->jobt1->HrefValue = "";
		$this->jobt1->TooltipValue = "";

		// sign2
		$this->sign2->LinkCustomAttributes = "";
		$this->sign2->HrefValue = "";
		$this->sign2->TooltipValue = "";

		// jobt2
		$this->jobt2->LinkCustomAttributes = "";
		$this->jobt2->HrefValue = "";
		$this->jobt2->TooltipValue = "";

		// sign3
		$this->sign3->LinkCustomAttributes = "";
		$this->sign3->HrefValue = "";
		$this->sign3->TooltipValue = "";

		// jobt3
		$this->jobt3->LinkCustomAttributes = "";
		$this->jobt3->HrefValue = "";
		$this->jobt3->TooltipValue = "";

		// disposaldetail_id
		$this->disposaldetail_id->LinkCustomAttributes = "";
		$this->disposaldetail_id->HrefValue = "";
		$this->disposaldetail_id->TooltipValue = "";

		// asset_id
		$this->asset_id->LinkCustomAttributes = "";
		$this->asset_id->HrefValue = "";
		$this->asset_id->TooltipValue = "";

		// code
		$this->code->LinkCustomAttributes = "";
		$this->code->HrefValue = "";
		$this->code->TooltipValue = "";

		// description
		$this->description->LinkCustomAttributes = "";
		$this->description->HrefValue = "";
		$this->description->TooltipValue = "";

		// department_id
		$this->department_id->LinkCustomAttributes = "";
		$this->department_id->HrefValue = "";
		$this->department_id->TooltipValue = "";

		// asset_dept
		$this->asset_dept->LinkCustomAttributes = "";
		$this->asset_dept->HrefValue = "";
		$this->asset_dept->TooltipValue = "";

		// procurementdate
		$this->procurementdate->LinkCustomAttributes = "";
		$this->procurementdate->HrefValue = "";
		$this->procurementdate->TooltipValue = "";

		// procurementcurrentcost
		$this->procurementcurrentcost->LinkCustomAttributes = "";
		$this->procurementcurrentcost->HrefValue = "";
		$this->procurementcurrentcost->TooltipValue = "";

		// remarks
		$this->remarks->LinkCustomAttributes = "";
		$this->remarks->HrefValue = "";
		$this->remarks->TooltipValue = "";

		// condstatus
		$this->condstatus->LinkCustomAttributes = "";
		$this->condstatus->HrefValue = "";
		$this->condstatus->TooltipValue = "";

		// reasonstatus
		$this->reasonstatus->LinkCustomAttributes = "";
		$this->reasonstatus->HrefValue = "";
		$this->reasonstatus->TooltipValue = "";

		// disposaldate
		$this->disposaldate->LinkCustomAttributes = "";
		$this->disposaldate->HrefValue = "";
		$this->disposaldate->TooltipValue = "";

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

		// property
		$this->property->EditAttrs["class"] = "form-control";
		$this->property->EditCustomAttributes = "";
		if (!$this->property->Raw)
			$this->property->CurrentValue = HtmlDecode($this->property->CurrentValue);
		$this->property->EditValue = $this->property->CurrentValue;
		$this->property->PlaceHolder = RemoveHtml($this->property->caption());

		// templatefile2
		$this->templatefile2->EditAttrs["class"] = "form-control";
		$this->templatefile2->EditCustomAttributes = "";
		if (!$this->templatefile2->Raw)
			$this->templatefile2->CurrentValue = HtmlDecode($this->templatefile2->CurrentValue);
		$this->templatefile2->EditValue = $this->templatefile2->CurrentValue;
		$this->templatefile2->PlaceHolder = RemoveHtml($this->templatefile2->caption());

		// transactionno
		$this->transactionno->EditAttrs["class"] = "form-control";
		$this->transactionno->EditCustomAttributes = "";
		if (!$this->transactionno->Raw)
			$this->transactionno->CurrentValue = HtmlDecode($this->transactionno->CurrentValue);
		$this->transactionno->EditValue = $this->transactionno->CurrentValue;
		$this->transactionno->PlaceHolder = RemoveHtml($this->transactionno->caption());

		// transactiondate
		$this->transactiondate->EditAttrs["class"] = "form-control";
		$this->transactiondate->EditCustomAttributes = "";
		$this->transactiondate->EditValue = FormatDateTime($this->transactiondate->CurrentValue, 8);
		$this->transactiondate->PlaceHolder = RemoveHtml($this->transactiondate->caption());

		// recommendedby
		$this->recommendedby->EditAttrs["class"] = "form-control";
		$this->recommendedby->EditCustomAttributes = "";
		$this->recommendedby->EditValue = $this->recommendedby->CurrentValue;
		$this->recommendedby->PlaceHolder = RemoveHtml($this->recommendedby->caption());

		// signatureby
		$this->signatureby->EditAttrs["class"] = "form-control";
		$this->signatureby->EditCustomAttributes = "";
		if (!$this->signatureby->Raw)
			$this->signatureby->CurrentValue = HtmlDecode($this->signatureby->CurrentValue);
		$this->signatureby->EditValue = $this->signatureby->CurrentValue;
		$this->signatureby->PlaceHolder = RemoveHtml($this->signatureby->caption());

		// positionby
		$this->positionby->EditAttrs["class"] = "form-control";
		$this->positionby->EditCustomAttributes = "";
		if (!$this->positionby->Raw)
			$this->positionby->CurrentValue = HtmlDecode($this->positionby->CurrentValue);
		$this->positionby->EditValue = $this->positionby->CurrentValue;
		$this->positionby->PlaceHolder = RemoveHtml($this->positionby->caption());

		// ce_id
		$this->ce_id->EditAttrs["class"] = "form-control";
		$this->ce_id->EditCustomAttributes = "";
		$this->ce_id->EditValue = $this->ce_id->CurrentValue;
		$this->ce_id->PlaceHolder = RemoveHtml($this->ce_id->caption());

		// signaturece
		$this->signaturece->EditAttrs["class"] = "form-control";
		$this->signaturece->EditCustomAttributes = "";
		if (!$this->signaturece->Raw)
			$this->signaturece->CurrentValue = HtmlDecode($this->signaturece->CurrentValue);
		$this->signaturece->EditValue = $this->signaturece->CurrentValue;
		$this->signaturece->PlaceHolder = RemoveHtml($this->signaturece->caption());

		// itm_id
		$this->itm_id->EditAttrs["class"] = "form-control";
		$this->itm_id->EditCustomAttributes = "";
		$this->itm_id->EditValue = $this->itm_id->CurrentValue;
		$this->itm_id->PlaceHolder = RemoveHtml($this->itm_id->caption());

		// signatureitm
		$this->signatureitm->EditAttrs["class"] = "form-control";
		$this->signatureitm->EditCustomAttributes = "";
		if (!$this->signatureitm->Raw)
			$this->signatureitm->CurrentValue = HtmlDecode($this->signatureitm->CurrentValue);
		$this->signatureitm->EditValue = $this->signatureitm->CurrentValue;
		$this->signatureitm->PlaceHolder = RemoveHtml($this->signatureitm->caption());

		// sign1
		$this->sign1->EditAttrs["class"] = "form-control";
		$this->sign1->EditCustomAttributes = "";
		$this->sign1->EditValue = $this->sign1->CurrentValue;
		$this->sign1->PlaceHolder = RemoveHtml($this->sign1->caption());

		// jobt1
		$this->jobt1->EditAttrs["class"] = "form-control";
		$this->jobt1->EditCustomAttributes = "";
		if (!$this->jobt1->Raw)
			$this->jobt1->CurrentValue = HtmlDecode($this->jobt1->CurrentValue);
		$this->jobt1->EditValue = $this->jobt1->CurrentValue;
		$this->jobt1->PlaceHolder = RemoveHtml($this->jobt1->caption());

		// sign2
		$this->sign2->EditAttrs["class"] = "form-control";
		$this->sign2->EditCustomAttributes = "";
		$this->sign2->EditValue = $this->sign2->CurrentValue;
		$this->sign2->PlaceHolder = RemoveHtml($this->sign2->caption());

		// jobt2
		$this->jobt2->EditAttrs["class"] = "form-control";
		$this->jobt2->EditCustomAttributes = "";
		if (!$this->jobt2->Raw)
			$this->jobt2->CurrentValue = HtmlDecode($this->jobt2->CurrentValue);
		$this->jobt2->EditValue = $this->jobt2->CurrentValue;
		$this->jobt2->PlaceHolder = RemoveHtml($this->jobt2->caption());

		// sign3
		$this->sign3->EditAttrs["class"] = "form-control";
		$this->sign3->EditCustomAttributes = "";
		$this->sign3->EditValue = $this->sign3->CurrentValue;
		$this->sign3->PlaceHolder = RemoveHtml($this->sign3->caption());

		// jobt3
		$this->jobt3->EditAttrs["class"] = "form-control";
		$this->jobt3->EditCustomAttributes = "";
		if (!$this->jobt3->Raw)
			$this->jobt3->CurrentValue = HtmlDecode($this->jobt3->CurrentValue);
		$this->jobt3->EditValue = $this->jobt3->CurrentValue;
		$this->jobt3->PlaceHolder = RemoveHtml($this->jobt3->caption());

		// disposaldetail_id
		$this->disposaldetail_id->EditAttrs["class"] = "form-control";
		$this->disposaldetail_id->EditCustomAttributes = "";
		$this->disposaldetail_id->EditValue = $this->disposaldetail_id->CurrentValue;
		$this->disposaldetail_id->ViewCustomAttributes = "";

		// asset_id
		$this->asset_id->EditAttrs["class"] = "form-control";
		$this->asset_id->EditCustomAttributes = "";
		$this->asset_id->EditValue = $this->asset_id->CurrentValue;
		$this->asset_id->PlaceHolder = RemoveHtml($this->asset_id->caption());

		// code
		$this->code->EditAttrs["class"] = "form-control";
		$this->code->EditCustomAttributes = "";
		if (!$this->code->Raw)
			$this->code->CurrentValue = HtmlDecode($this->code->CurrentValue);
		$this->code->EditValue = $this->code->CurrentValue;
		$this->code->PlaceHolder = RemoveHtml($this->code->caption());

		// description
		$this->description->EditAttrs["class"] = "form-control";
		$this->description->EditCustomAttributes = "";
		if (!$this->description->Raw)
			$this->description->CurrentValue = HtmlDecode($this->description->CurrentValue);
		$this->description->EditValue = $this->description->CurrentValue;
		$this->description->PlaceHolder = RemoveHtml($this->description->caption());

		// department_id
		$this->department_id->EditAttrs["class"] = "form-control";
		$this->department_id->EditCustomAttributes = "";
		$this->department_id->EditValue = $this->department_id->CurrentValue;
		$this->department_id->PlaceHolder = RemoveHtml($this->department_id->caption());

		// asset_dept
		$this->asset_dept->EditAttrs["class"] = "form-control";
		$this->asset_dept->EditCustomAttributes = "";
		if (!$this->asset_dept->Raw)
			$this->asset_dept->CurrentValue = HtmlDecode($this->asset_dept->CurrentValue);
		$this->asset_dept->EditValue = $this->asset_dept->CurrentValue;
		$this->asset_dept->PlaceHolder = RemoveHtml($this->asset_dept->caption());

		// procurementdate
		$this->procurementdate->EditAttrs["class"] = "form-control";
		$this->procurementdate->EditCustomAttributes = "";
		$this->procurementdate->EditValue = FormatDateTime($this->procurementdate->CurrentValue, 8);
		$this->procurementdate->PlaceHolder = RemoveHtml($this->procurementdate->caption());

		// procurementcurrentcost
		$this->procurementcurrentcost->EditAttrs["class"] = "form-control";
		$this->procurementcurrentcost->EditCustomAttributes = "";
		$this->procurementcurrentcost->EditValue = $this->procurementcurrentcost->CurrentValue;
		$this->procurementcurrentcost->PlaceHolder = RemoveHtml($this->procurementcurrentcost->caption());
		if (strval($this->procurementcurrentcost->EditValue) != "" && is_numeric($this->procurementcurrentcost->EditValue))
			$this->procurementcurrentcost->EditValue = FormatNumber($this->procurementcurrentcost->EditValue, -2, -2, -2, -2);
		

		// remarks
		$this->remarks->EditAttrs["class"] = "form-control";
		$this->remarks->EditCustomAttributes = "";
		$this->remarks->EditValue = $this->remarks->CurrentValue;
		$this->remarks->PlaceHolder = RemoveHtml($this->remarks->caption());

		// condstatus
		$this->condstatus->EditAttrs["class"] = "form-control";
		$this->condstatus->EditCustomAttributes = "";
		if (!$this->condstatus->Raw)
			$this->condstatus->CurrentValue = HtmlDecode($this->condstatus->CurrentValue);
		$this->condstatus->EditValue = $this->condstatus->CurrentValue;
		$this->condstatus->PlaceHolder = RemoveHtml($this->condstatus->caption());

		// reasonstatus
		$this->reasonstatus->EditAttrs["class"] = "form-control";
		$this->reasonstatus->EditCustomAttributes = "";
		if (!$this->reasonstatus->Raw)
			$this->reasonstatus->CurrentValue = HtmlDecode($this->reasonstatus->CurrentValue);
		$this->reasonstatus->EditValue = $this->reasonstatus->CurrentValue;
		$this->reasonstatus->PlaceHolder = RemoveHtml($this->reasonstatus->caption());

		// disposaldate
		$this->disposaldate->EditAttrs["class"] = "form-control";
		$this->disposaldate->EditCustomAttributes = "";
		$this->disposaldate->EditValue = FormatDateTime($this->disposaldate->CurrentValue, 8);
		$this->disposaldate->PlaceHolder = RemoveHtml($this->disposaldate->caption());

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
					$doc->exportCaption($this->property);
					$doc->exportCaption($this->templatefile2);
					$doc->exportCaption($this->transactionno);
					$doc->exportCaption($this->transactiondate);
					$doc->exportCaption($this->recommendedby);
					$doc->exportCaption($this->signatureby);
					$doc->exportCaption($this->positionby);
					$doc->exportCaption($this->ce_id);
					$doc->exportCaption($this->signaturece);
					$doc->exportCaption($this->itm_id);
					$doc->exportCaption($this->signatureitm);
					$doc->exportCaption($this->sign1);
					$doc->exportCaption($this->jobt1);
					$doc->exportCaption($this->sign2);
					$doc->exportCaption($this->jobt2);
					$doc->exportCaption($this->sign3);
					$doc->exportCaption($this->jobt3);
					$doc->exportCaption($this->disposaldetail_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->code);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->department_id);
					$doc->exportCaption($this->asset_dept);
					$doc->exportCaption($this->procurementdate);
					$doc->exportCaption($this->procurementcurrentcost);
					$doc->exportCaption($this->remarks);
					$doc->exportCaption($this->condstatus);
					$doc->exportCaption($this->reasonstatus);
					$doc->exportCaption($this->disposaldate);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->property);
					$doc->exportCaption($this->templatefile2);
					$doc->exportCaption($this->transactionno);
					$doc->exportCaption($this->transactiondate);
					$doc->exportCaption($this->recommendedby);
					$doc->exportCaption($this->signatureby);
					$doc->exportCaption($this->positionby);
					$doc->exportCaption($this->ce_id);
					$doc->exportCaption($this->signaturece);
					$doc->exportCaption($this->itm_id);
					$doc->exportCaption($this->signatureitm);
					$doc->exportCaption($this->sign1);
					$doc->exportCaption($this->jobt1);
					$doc->exportCaption($this->sign2);
					$doc->exportCaption($this->jobt2);
					$doc->exportCaption($this->sign3);
					$doc->exportCaption($this->jobt3);
					$doc->exportCaption($this->disposaldetail_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->code);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->department_id);
					$doc->exportCaption($this->asset_dept);
					$doc->exportCaption($this->procurementdate);
					$doc->exportCaption($this->procurementcurrentcost);
					$doc->exportCaption($this->condstatus);
					$doc->exportCaption($this->reasonstatus);
					$doc->exportCaption($this->disposaldate);
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
						$doc->exportField($this->property);
						$doc->exportField($this->templatefile2);
						$doc->exportField($this->transactionno);
						$doc->exportField($this->transactiondate);
						$doc->exportField($this->recommendedby);
						$doc->exportField($this->signatureby);
						$doc->exportField($this->positionby);
						$doc->exportField($this->ce_id);
						$doc->exportField($this->signaturece);
						$doc->exportField($this->itm_id);
						$doc->exportField($this->signatureitm);
						$doc->exportField($this->sign1);
						$doc->exportField($this->jobt1);
						$doc->exportField($this->sign2);
						$doc->exportField($this->jobt2);
						$doc->exportField($this->sign3);
						$doc->exportField($this->jobt3);
						$doc->exportField($this->disposaldetail_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->code);
						$doc->exportField($this->description);
						$doc->exportField($this->department_id);
						$doc->exportField($this->asset_dept);
						$doc->exportField($this->procurementdate);
						$doc->exportField($this->procurementcurrentcost);
						$doc->exportField($this->remarks);
						$doc->exportField($this->condstatus);
						$doc->exportField($this->reasonstatus);
						$doc->exportField($this->disposaldate);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->property_id);
						$doc->exportField($this->property);
						$doc->exportField($this->templatefile2);
						$doc->exportField($this->transactionno);
						$doc->exportField($this->transactiondate);
						$doc->exportField($this->recommendedby);
						$doc->exportField($this->signatureby);
						$doc->exportField($this->positionby);
						$doc->exportField($this->ce_id);
						$doc->exportField($this->signaturece);
						$doc->exportField($this->itm_id);
						$doc->exportField($this->signatureitm);
						$doc->exportField($this->sign1);
						$doc->exportField($this->jobt1);
						$doc->exportField($this->sign2);
						$doc->exportField($this->jobt2);
						$doc->exportField($this->sign3);
						$doc->exportField($this->jobt3);
						$doc->exportField($this->disposaldetail_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->code);
						$doc->exportField($this->description);
						$doc->exportField($this->department_id);
						$doc->exportField($this->asset_dept);
						$doc->exportField($this->procurementdate);
						$doc->exportField($this->procurementcurrentcost);
						$doc->exportField($this->condstatus);
						$doc->exportField($this->reasonstatus);
						$doc->exportField($this->disposaldate);
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