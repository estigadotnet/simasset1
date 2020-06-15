<?php namespace PHPMaker2020\p_simasset1; ?>
<?php

/**
 * Table class for t101_ho_head
 */
class t101_ho_head extends DbTable
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

	// Audit trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Export
	public $ExportDoc;

	// Fields
	public $id;
	public $property_id;
	public $TransactionNo;
	public $TransactionDate;
	public $TransactionType;
	public $HandedOverTo;
	public $CodeNoTo;
	public $DepartmentTo;
	public $HandedOverBy;
	public $CodeNoBy;
	public $DepartmentBy;
	public $Sign1;
	public $Sign2;
	public $Sign3;
	public $Sign4;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 't101_ho_head';
		$this->TableName = 't101_ho_head';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t101_ho_head`";
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
		$this->id = new DbField('t101_ho_head', 't101_ho_head', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// property_id
		$this->property_id = new DbField('t101_ho_head', 't101_ho_head', 'x_property_id', 'property_id', '`property_id`', '`property_id`', 3, 11, -1, FALSE, '`property_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->property_id->Nullable = FALSE; // NOT NULL field
		$this->property_id->Required = TRUE; // Required field
		$this->property_id->Sortable = TRUE; // Allow sort
		$this->property_id->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->property_id->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->property_id->Lookup = new Lookup('property_id', 't001_property', FALSE, 'id', ["Property","","",""], [], [], [], [], [], [], '', '');
		$this->property_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['property_id'] = &$this->property_id;

		// TransactionNo
		$this->TransactionNo = new DbField('t101_ho_head', 't101_ho_head', 'x_TransactionNo', 'TransactionNo', '`TransactionNo`', '`TransactionNo`', 200, 25, -1, FALSE, '`TransactionNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransactionNo->Nullable = FALSE; // NOT NULL field
		$this->TransactionNo->Required = TRUE; // Required field
		$this->TransactionNo->Sortable = TRUE; // Allow sort
		$this->fields['TransactionNo'] = &$this->TransactionNo;

		// TransactionDate
		$this->TransactionDate = new DbField('t101_ho_head', 't101_ho_head', 'x_TransactionDate', 'TransactionDate', '`TransactionDate`', CastDateFieldForLike("`TransactionDate`", 7, "DB"), 133, 10, 7, FALSE, '`TransactionDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransactionDate->Nullable = FALSE; // NOT NULL field
		$this->TransactionDate->Required = TRUE; // Required field
		$this->TransactionDate->Sortable = TRUE; // Allow sort
		$this->TransactionDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['TransactionDate'] = &$this->TransactionDate;

		// TransactionType
		$this->TransactionType = new DbField('t101_ho_head', 't101_ho_head', 'x_TransactionType', 'TransactionType', '`TransactionType`', '`TransactionType`', 16, 4, -1, FALSE, '`TransactionType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TransactionType->Nullable = FALSE; // NOT NULL field
		$this->TransactionType->Required = TRUE; // Required field
		$this->TransactionType->Sortable = TRUE; // Allow sort
		$this->TransactionType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TransactionType->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TransactionType->Lookup = new Lookup('TransactionType', 't101_ho_head', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TransactionType->OptionCount = 4;
		$this->TransactionType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TransactionType'] = &$this->TransactionType;

		// HandedOverTo
		$this->HandedOverTo = new DbField('t101_ho_head', 't101_ho_head', 'x_HandedOverTo', 'HandedOverTo', '`HandedOverTo`', '`HandedOverTo`', 3, 11, -1, FALSE, '`HandedOverTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HandedOverTo->Nullable = FALSE; // NOT NULL field
		$this->HandedOverTo->Required = TRUE; // Required field
		$this->HandedOverTo->Sortable = TRUE; // Allow sort
		$this->HandedOverTo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HandedOverTo->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->HandedOverTo->Lookup = new Lookup('HandedOverTo', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->HandedOverTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HandedOverTo'] = &$this->HandedOverTo;

		// CodeNoTo
		$this->CodeNoTo = new DbField('t101_ho_head', 't101_ho_head', 'x_CodeNoTo', 'CodeNoTo', '`CodeNoTo`', '`CodeNoTo`', 200, 25, -1, FALSE, '`CodeNoTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CodeNoTo->Nullable = FALSE; // NOT NULL field
		$this->CodeNoTo->Required = TRUE; // Required field
		$this->CodeNoTo->Sortable = TRUE; // Allow sort
		$this->fields['CodeNoTo'] = &$this->CodeNoTo;

		// DepartmentTo
		$this->DepartmentTo = new DbField('t101_ho_head', 't101_ho_head', 'x_DepartmentTo', 'DepartmentTo', '`DepartmentTo`', '`DepartmentTo`', 3, 11, -1, FALSE, '`DepartmentTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DepartmentTo->Nullable = FALSE; // NOT NULL field
		$this->DepartmentTo->Required = TRUE; // Required field
		$this->DepartmentTo->Sortable = TRUE; // Allow sort
		$this->DepartmentTo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DepartmentTo->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DepartmentTo->Lookup = new Lookup('DepartmentTo', 't002_department', FALSE, 'id', ["Department","","",""], [], [], [], [], [], [], '', '');
		$this->DepartmentTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DepartmentTo'] = &$this->DepartmentTo;

		// HandedOverBy
		$this->HandedOverBy = new DbField('t101_ho_head', 't101_ho_head', 'x_HandedOverBy', 'HandedOverBy', '`HandedOverBy`', '`HandedOverBy`', 3, 11, -1, FALSE, '`EV__HandedOverBy`', TRUE, TRUE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HandedOverBy->Nullable = FALSE; // NOT NULL field
		$this->HandedOverBy->Required = TRUE; // Required field
		$this->HandedOverBy->Sortable = TRUE; // Allow sort
		$this->HandedOverBy->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HandedOverBy->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->HandedOverBy->Lookup = new Lookup('HandedOverBy', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->HandedOverBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HandedOverBy'] = &$this->HandedOverBy;

		// CodeNoBy
		$this->CodeNoBy = new DbField('t101_ho_head', 't101_ho_head', 'x_CodeNoBy', 'CodeNoBy', '`CodeNoBy`', '`CodeNoBy`', 200, 25, -1, FALSE, '`CodeNoBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CodeNoBy->Nullable = FALSE; // NOT NULL field
		$this->CodeNoBy->Required = TRUE; // Required field
		$this->CodeNoBy->Sortable = TRUE; // Allow sort
		$this->fields['CodeNoBy'] = &$this->CodeNoBy;

		// DepartmentBy
		$this->DepartmentBy = new DbField('t101_ho_head', 't101_ho_head', 'x_DepartmentBy', 'DepartmentBy', '`DepartmentBy`', '`DepartmentBy`', 3, 11, -1, FALSE, '`DepartmentBy`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DepartmentBy->Nullable = FALSE; // NOT NULL field
		$this->DepartmentBy->Required = TRUE; // Required field
		$this->DepartmentBy->Sortable = TRUE; // Allow sort
		$this->DepartmentBy->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DepartmentBy->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DepartmentBy->Lookup = new Lookup('DepartmentBy', 't002_department', FALSE, 'id', ["Department","","",""], [], [], [], [], [], [], '', '');
		$this->DepartmentBy->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DepartmentBy'] = &$this->DepartmentBy;

		// Sign1
		$this->Sign1 = new DbField('t101_ho_head', 't101_ho_head', 'x_Sign1', 'Sign1', '`Sign1`', '`Sign1`', 3, 11, -1, FALSE, '`Sign1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Sign1->Nullable = FALSE; // NOT NULL field
		$this->Sign1->Required = TRUE; // Required field
		$this->Sign1->Sortable = TRUE; // Allow sort
		$this->Sign1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Sign1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Sign1->Lookup = new Lookup('Sign1', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->Sign1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign1'] = &$this->Sign1;

		// Sign2
		$this->Sign2 = new DbField('t101_ho_head', 't101_ho_head', 'x_Sign2', 'Sign2', '`Sign2`', '`Sign2`', 3, 11, -1, FALSE, '`Sign2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Sign2->Nullable = FALSE; // NOT NULL field
		$this->Sign2->Required = TRUE; // Required field
		$this->Sign2->Sortable = TRUE; // Allow sort
		$this->Sign2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Sign2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Sign2->Lookup = new Lookup('Sign2', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->Sign2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign2'] = &$this->Sign2;

		// Sign3
		$this->Sign3 = new DbField('t101_ho_head', 't101_ho_head', 'x_Sign3', 'Sign3', '`Sign3`', '`Sign3`', 3, 11, -1, FALSE, '`Sign3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Sign3->Nullable = FALSE; // NOT NULL field
		$this->Sign3->Required = TRUE; // Required field
		$this->Sign3->Sortable = TRUE; // Allow sort
		$this->Sign3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Sign3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Sign3->Lookup = new Lookup('Sign3', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->Sign3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign3'] = &$this->Sign3;

		// Sign4
		$this->Sign4 = new DbField('t101_ho_head', 't101_ho_head', 'x_Sign4', 'Sign4', '`Sign4`', '`Sign4`', 3, 11, -1, FALSE, '`Sign4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Sign4->Nullable = FALSE; // NOT NULL field
		$this->Sign4->Required = TRUE; // Required field
		$this->Sign4->Sortable = TRUE; // Allow sort
		$this->Sign4->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Sign4->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Sign4->Lookup = new Lookup('Sign4', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->Sign4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign4'] = &$this->Sign4;
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
			$sortFieldList = ($fld->VirtualExpression != "") ? $fld->VirtualExpression : $sortField;
			if ($ctrl) {
				$orderByList = $this->getSessionOrderByList();
				if (ContainsString($orderByList, $sortFieldList . " " . $lastSort)) {
					$orderByList = str_replace($sortFieldList . " " . $lastSort, $sortFieldList . " " . $thisSort, $orderByList);
				} else {
					if ($orderByList != "") $orderByList .= ", ";
					$orderByList .= $sortFieldList . " " . $thisSort;
				}
				$this->setSessionOrderByList($orderByList); // Save to Session
			} else {
				$this->setSessionOrderByList($sortFieldList . " " . $thisSort); // Save to Session
			}
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
	}

	// Session ORDER BY for List page
	public function getSessionOrderByList()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")];
	}
	public function setSessionOrderByList($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_ORDER_BY_LIST")] = $v;
	}

	// Current detail table name
	public function getCurrentDetailTable()
	{
		return @$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")];
	}
	public function setCurrentDetailTable($v)
	{
		$_SESSION[PROJECT_NAME . "_" . $this->TableVar . "_" . Config("TABLE_DETAIL_TABLE")] = $v;
	}

	// Get detail url
	public function getDetailUrl()
	{

		// Detail url
		$detailUrl = "";
		if ($this->getCurrentDetailTable() == "t102_ho_detail") {
			$detailUrl = $GLOBALS["t102_ho_detail"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "t101_ho_headlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`t101_ho_head`";
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
	public function getSqlSelectList() // Select for List page
	{
		$select = "";
		$select = "SELECT * FROM (" .
			"SELECT *, (SELECT `Signature` FROM `t003_signature` `TMP_LOOKUPTABLE` WHERE `TMP_LOOKUPTABLE`.`id` = `t101_ho_head`.`HandedOverBy` LIMIT 1) AS `EV__HandedOverBy` FROM `t101_ho_head`" .
			") `TMP_TABLE`";
		return ($this->SqlSelectList != "") ? $this->SqlSelectList : $select;
	}
	public function sqlSelectList() // For backward compatibility
	{
		return $this->getSqlSelectList();
	}
	public function setSqlSelectList($v)
	{
		$this->SqlSelectList = $v;
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
		if ($this->useVirtualFields()) {
			$select = $this->getSqlSelectList();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		} else {
			$select = $this->getSqlSelect();
			$sort = $this->UseSessionForListSql ? $this->getSessionOrderBy() : "";
		}
		return BuildSelectSql($select, $this->getSqlWhere(), $this->getSqlGroupBy(),
			$this->getSqlHaving(), $this->getSqlOrderBy(), $filter, $sort);
	}

	// Get ORDER BY clause
	public function getOrderBy()
	{
		$sort = ($this->useVirtualFields()) ? $this->getSessionOrderByList() : $this->getSessionOrderBy();
		return BuildSelectSql("", "", "", "", $this->getSqlOrderBy(), "", $sort);
	}

	// Check if virtual fields is used in SQL
	protected function useVirtualFields()
	{
		$where = $this->UseSessionForListSql ? $this->getSessionWhere() : $this->CurrentFilter;
		$orderBy = $this->UseSessionForListSql ? $this->getSessionOrderByList() : "";
		if ($where != "")
			$where = " " . str_replace(["(", ")"], ["", ""], $where) . " ";
		if ($orderBy != "")
			$orderBy = " " . str_replace(["(", ")"], ["", ""], $orderBy) . " ";
		if (ContainsString($orderBy, " " . $this->HandedOverBy->VirtualExpression . " "))
			return TRUE;
		return FALSE;
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
		if ($this->useVirtualFields())
			$sql = BuildSelectSql($this->getSqlSelectList(), $this->getSqlWhere(), $groupBy, $having, "", $filter, "");
		else
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
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailOnAdd($rs);
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

		// Cascade Update detail table 't102_ho_detail'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'hohead_id'
			$cascadeUpdate = TRUE;
			$rscascade['hohead_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["t102_ho_detail"]))
				$GLOBALS["t102_ho_detail"] = new t102_ho_detail();
			$rswrk = $GLOBALS["t102_ho_detail"]->loadRs("`hohead_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["t102_ho_detail"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["t102_ho_detail"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["t102_ho_detail"]->Row_Updated($rsdtlold, $rsdtlnew);
				$rswrk->moveNext();
			}
		}
		$success = $conn->execute($this->updateSql($rs, $where, $curfilter));
		if ($success && $this->AuditTrailOnEdit && $rsold) {
			$rsaudit = $rs;
			$fldname = 'id';
			if (!array_key_exists($fldname, $rsaudit))
				$rsaudit[$fldname] = $rsold[$fldname];
			$this->writeAuditTrailOnEdit($rsold, $rsaudit);
		}
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

		// Cascade delete detail table 't102_ho_detail'
		if (!isset($GLOBALS["t102_ho_detail"]))
			$GLOBALS["t102_ho_detail"] = new t102_ho_detail();
		$rscascade = $GLOBALS["t102_ho_detail"]->loadRs("`hohead_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["t102_ho_detail"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["t102_ho_detail"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["t102_ho_detail"]->Row_Deleted($dtlrow);
		}
		if ($success)
			$success = $conn->execute($this->deleteSql($rs, $where, $curfilter));
		if ($success && $this->AuditTrailOnDelete)
			$this->writeAuditTrailOnDelete($rs);
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
		$this->TransactionType->DbValue = $row['TransactionType'];
		$this->HandedOverTo->DbValue = $row['HandedOverTo'];
		$this->CodeNoTo->DbValue = $row['CodeNoTo'];
		$this->DepartmentTo->DbValue = $row['DepartmentTo'];
		$this->HandedOverBy->DbValue = $row['HandedOverBy'];
		$this->CodeNoBy->DbValue = $row['CodeNoBy'];
		$this->DepartmentBy->DbValue = $row['DepartmentBy'];
		$this->Sign1->DbValue = $row['Sign1'];
		$this->Sign2->DbValue = $row['Sign2'];
		$this->Sign3->DbValue = $row['Sign3'];
		$this->Sign4->DbValue = $row['Sign4'];
	}

	// Delete uploaded files
	public function deleteUploadedFiles($row)
	{
		$this->loadDbValues($row);
	}

	// Record filter WHERE clause
	protected function sqlKeyFilter()
	{
		return "`id` = @id@";
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
			return "t101_ho_headlist.php";
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
		if ($pageName == "t101_ho_headview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t101_ho_headedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t101_ho_headadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t101_ho_headlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("t101_ho_headview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_ho_headview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "t101_ho_headadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t101_ho_headadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("t101_ho_headedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_ho_headedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		if ($parm != "")
			$url = $this->keyUrl("t101_ho_headadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t101_ho_headadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("t101_ho_headdelete.php", $this->getUrlParm());
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
		} else {
			if (Param("id") !== NULL)
				$arKeys[] = Param("id");
			elseif (IsApi() && Key(0) !== NULL)
				$arKeys[] = Key(0);
			elseif (IsApi() && Route(2) !== NULL)
				$arKeys[] = Route(2);
			else
				$arKeys = NULL; // Do not setup

			//return $arKeys; // Do not return yet, so the values will also be checked by the following code
		}

		// Check keys
		$ar = [];
		if (is_array($arKeys)) {
			foreach ($arKeys as $key) {
				if (!is_numeric($key))
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
				$this->id->CurrentValue = $key;
			else
				$this->id->OldValue = $key;
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
		$this->TransactionType->setDbValue($rs->fields('TransactionType'));
		$this->HandedOverTo->setDbValue($rs->fields('HandedOverTo'));
		$this->CodeNoTo->setDbValue($rs->fields('CodeNoTo'));
		$this->DepartmentTo->setDbValue($rs->fields('DepartmentTo'));
		$this->HandedOverBy->setDbValue($rs->fields('HandedOverBy'));
		$this->CodeNoBy->setDbValue($rs->fields('CodeNoBy'));
		$this->DepartmentBy->setDbValue($rs->fields('DepartmentBy'));
		$this->Sign1->setDbValue($rs->fields('Sign1'));
		$this->Sign2->setDbValue($rs->fields('Sign2'));
		$this->Sign3->setDbValue($rs->fields('Sign3'));
		$this->Sign4->setDbValue($rs->fields('Sign4'));
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
		// TransactionType
		// HandedOverTo
		// CodeNoTo
		// DepartmentTo
		// HandedOverBy
		// CodeNoBy
		// DepartmentBy
		// Sign1
		// Sign2
		// Sign3
		// Sign4
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// property_id
		$curVal = strval($this->property_id->CurrentValue);
		if ($curVal != "") {
			$this->property_id->ViewValue = $this->property_id->lookupCacheOption($curVal);
			if ($this->property_id->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->property_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->property_id->ViewValue = $this->property_id->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->property_id->ViewValue = $this->property_id->CurrentValue;
				}
			}
		} else {
			$this->property_id->ViewValue = NULL;
		}
		$this->property_id->ViewCustomAttributes = "";

		// TransactionNo
		$this->TransactionNo->ViewValue = $this->TransactionNo->CurrentValue;
		$this->TransactionNo->ViewCustomAttributes = "";

		// TransactionDate
		$this->TransactionDate->ViewValue = $this->TransactionDate->CurrentValue;
		$this->TransactionDate->ViewValue = FormatDateTime($this->TransactionDate->ViewValue, 7);
		$this->TransactionDate->ViewCustomAttributes = "";

		// TransactionType
		if (strval($this->TransactionType->CurrentValue) != "") {
			$this->TransactionType->ViewValue = $this->TransactionType->optionCaption($this->TransactionType->CurrentValue);
		} else {
			$this->TransactionType->ViewValue = NULL;
		}
		$this->TransactionType->ViewCustomAttributes = "";

		// HandedOverTo
		$curVal = strval($this->HandedOverTo->CurrentValue);
		if ($curVal != "") {
			$this->HandedOverTo->ViewValue = $this->HandedOverTo->lookupCacheOption($curVal);
			if ($this->HandedOverTo->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->HandedOverTo->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->HandedOverTo->ViewValue = $this->HandedOverTo->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->HandedOverTo->ViewValue = $this->HandedOverTo->CurrentValue;
				}
			}
		} else {
			$this->HandedOverTo->ViewValue = NULL;
		}
		$this->HandedOverTo->ViewCustomAttributes = "";

		// CodeNoTo
		$this->CodeNoTo->ViewValue = $this->CodeNoTo->CurrentValue;
		$this->CodeNoTo->ViewCustomAttributes = "";

		// DepartmentTo
		$curVal = strval($this->DepartmentTo->CurrentValue);
		if ($curVal != "") {
			$this->DepartmentTo->ViewValue = $this->DepartmentTo->lookupCacheOption($curVal);
			if ($this->DepartmentTo->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->DepartmentTo->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->DepartmentTo->ViewValue = $this->DepartmentTo->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DepartmentTo->ViewValue = $this->DepartmentTo->CurrentValue;
				}
			}
		} else {
			$this->DepartmentTo->ViewValue = NULL;
		}
		$this->DepartmentTo->ViewCustomAttributes = "";

		// HandedOverBy
		if ($this->HandedOverBy->VirtualValue != "") {
			$this->HandedOverBy->ViewValue = $this->HandedOverBy->VirtualValue;
		} else {
			$curVal = strval($this->HandedOverBy->CurrentValue);
			if ($curVal != "") {
				$this->HandedOverBy->ViewValue = $this->HandedOverBy->lookupCacheOption($curVal);
				if ($this->HandedOverBy->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->HandedOverBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->HandedOverBy->ViewValue = $this->HandedOverBy->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->HandedOverBy->ViewValue = $this->HandedOverBy->CurrentValue;
					}
				}
			} else {
				$this->HandedOverBy->ViewValue = NULL;
			}
		}
		$this->HandedOverBy->ViewCustomAttributes = "";

		// CodeNoBy
		$this->CodeNoBy->ViewValue = $this->CodeNoBy->CurrentValue;
		$this->CodeNoBy->ViewCustomAttributes = "";

		// DepartmentBy
		$curVal = strval($this->DepartmentBy->CurrentValue);
		if ($curVal != "") {
			$this->DepartmentBy->ViewValue = $this->DepartmentBy->lookupCacheOption($curVal);
			if ($this->DepartmentBy->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->DepartmentBy->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->DepartmentBy->ViewValue = $this->DepartmentBy->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->DepartmentBy->ViewValue = $this->DepartmentBy->CurrentValue;
				}
			}
		} else {
			$this->DepartmentBy->ViewValue = NULL;
		}
		$this->DepartmentBy->ViewCustomAttributes = "";

		// Sign1
		$curVal = strval($this->Sign1->CurrentValue);
		if ($curVal != "") {
			$this->Sign1->ViewValue = $this->Sign1->lookupCacheOption($curVal);
			if ($this->Sign1->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Sign1->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Sign1->ViewValue = $this->Sign1->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Sign1->ViewValue = $this->Sign1->CurrentValue;
				}
			}
		} else {
			$this->Sign1->ViewValue = NULL;
		}
		$this->Sign1->ViewCustomAttributes = "";

		// Sign2
		$curVal = strval($this->Sign2->CurrentValue);
		if ($curVal != "") {
			$this->Sign2->ViewValue = $this->Sign2->lookupCacheOption($curVal);
			if ($this->Sign2->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Sign2->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Sign2->ViewValue = $this->Sign2->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Sign2->ViewValue = $this->Sign2->CurrentValue;
				}
			}
		} else {
			$this->Sign2->ViewValue = NULL;
		}
		$this->Sign2->ViewCustomAttributes = "";

		// Sign3
		$curVal = strval($this->Sign3->CurrentValue);
		if ($curVal != "") {
			$this->Sign3->ViewValue = $this->Sign3->lookupCacheOption($curVal);
			if ($this->Sign3->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Sign3->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Sign3->ViewValue = $this->Sign3->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Sign3->ViewValue = $this->Sign3->CurrentValue;
				}
			}
		} else {
			$this->Sign3->ViewValue = NULL;
		}
		$this->Sign3->ViewCustomAttributes = "";

		// Sign4
		$curVal = strval($this->Sign4->CurrentValue);
		if ($curVal != "") {
			$this->Sign4->ViewValue = $this->Sign4->lookupCacheOption($curVal);
			if ($this->Sign4->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$sqlWrk = $this->Sign4->Lookup->getSql(FALSE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->Sign4->ViewValue = $this->Sign4->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->Sign4->ViewValue = $this->Sign4->CurrentValue;
				}
			}
		} else {
			$this->Sign4->ViewValue = NULL;
		}
		$this->Sign4->ViewCustomAttributes = "";

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

		// TransactionType
		$this->TransactionType->LinkCustomAttributes = "";
		$this->TransactionType->HrefValue = "";
		$this->TransactionType->TooltipValue = "";

		// HandedOverTo
		$this->HandedOverTo->LinkCustomAttributes = "";
		$this->HandedOverTo->HrefValue = "";
		$this->HandedOverTo->TooltipValue = "";

		// CodeNoTo
		$this->CodeNoTo->LinkCustomAttributes = "";
		$this->CodeNoTo->HrefValue = "";
		$this->CodeNoTo->TooltipValue = "";

		// DepartmentTo
		$this->DepartmentTo->LinkCustomAttributes = "";
		$this->DepartmentTo->HrefValue = "";
		$this->DepartmentTo->TooltipValue = "";

		// HandedOverBy
		$this->HandedOverBy->LinkCustomAttributes = "";
		$this->HandedOverBy->HrefValue = "";
		$this->HandedOverBy->TooltipValue = "";

		// CodeNoBy
		$this->CodeNoBy->LinkCustomAttributes = "";
		$this->CodeNoBy->HrefValue = "";
		$this->CodeNoBy->TooltipValue = "";

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
		$this->TransactionDate->EditValue = FormatDateTime($this->TransactionDate->CurrentValue, 7);
		$this->TransactionDate->PlaceHolder = RemoveHtml($this->TransactionDate->caption());

		// TransactionType
		$this->TransactionType->EditAttrs["class"] = "form-control";
		$this->TransactionType->EditCustomAttributes = "";
		$this->TransactionType->EditValue = $this->TransactionType->options(TRUE);

		// HandedOverTo
		$this->HandedOverTo->EditAttrs["class"] = "form-control";
		$this->HandedOverTo->EditCustomAttributes = "";

		// CodeNoTo
		$this->CodeNoTo->EditAttrs["class"] = "form-control";
		$this->CodeNoTo->EditCustomAttributes = "";
		if (!$this->CodeNoTo->Raw)
			$this->CodeNoTo->CurrentValue = HtmlDecode($this->CodeNoTo->CurrentValue);
		$this->CodeNoTo->EditValue = $this->CodeNoTo->CurrentValue;
		$this->CodeNoTo->PlaceHolder = RemoveHtml($this->CodeNoTo->caption());

		// DepartmentTo
		$this->DepartmentTo->EditAttrs["class"] = "form-control";
		$this->DepartmentTo->EditCustomAttributes = "";

		// HandedOverBy
		$this->HandedOverBy->EditAttrs["class"] = "form-control";
		$this->HandedOverBy->EditCustomAttributes = "";

		// CodeNoBy
		$this->CodeNoBy->EditAttrs["class"] = "form-control";
		$this->CodeNoBy->EditCustomAttributes = "";
		if (!$this->CodeNoBy->Raw)
			$this->CodeNoBy->CurrentValue = HtmlDecode($this->CodeNoBy->CurrentValue);
		$this->CodeNoBy->EditValue = $this->CodeNoBy->CurrentValue;
		$this->CodeNoBy->PlaceHolder = RemoveHtml($this->CodeNoBy->caption());

		// DepartmentBy
		$this->DepartmentBy->EditAttrs["class"] = "form-control";
		$this->DepartmentBy->EditCustomAttributes = "";

		// Sign1
		$this->Sign1->EditAttrs["class"] = "form-control";
		$this->Sign1->EditCustomAttributes = "";

		// Sign2
		$this->Sign2->EditAttrs["class"] = "form-control";
		$this->Sign2->EditCustomAttributes = "";

		// Sign3
		$this->Sign3->EditAttrs["class"] = "form-control";
		$this->Sign3->EditCustomAttributes = "";

		// Sign4
		$this->Sign4->EditAttrs["class"] = "form-control";
		$this->Sign4->EditCustomAttributes = "";

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
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->TransactionNo);
					$doc->exportCaption($this->TransactionDate);
					$doc->exportCaption($this->TransactionType);
					$doc->exportCaption($this->HandedOverTo);
					$doc->exportCaption($this->CodeNoTo);
					$doc->exportCaption($this->DepartmentTo);
					$doc->exportCaption($this->HandedOverBy);
					$doc->exportCaption($this->CodeNoBy);
					$doc->exportCaption($this->DepartmentBy);
					$doc->exportCaption($this->Sign1);
					$doc->exportCaption($this->Sign2);
					$doc->exportCaption($this->Sign3);
					$doc->exportCaption($this->Sign4);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->TransactionNo);
					$doc->exportCaption($this->TransactionDate);
					$doc->exportCaption($this->TransactionType);
					$doc->exportCaption($this->HandedOverTo);
					$doc->exportCaption($this->CodeNoTo);
					$doc->exportCaption($this->DepartmentTo);
					$doc->exportCaption($this->HandedOverBy);
					$doc->exportCaption($this->CodeNoBy);
					$doc->exportCaption($this->DepartmentBy);
					$doc->exportCaption($this->Sign1);
					$doc->exportCaption($this->Sign2);
					$doc->exportCaption($this->Sign3);
					$doc->exportCaption($this->Sign4);
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
						$doc->exportField($this->property_id);
						$doc->exportField($this->TransactionNo);
						$doc->exportField($this->TransactionDate);
						$doc->exportField($this->TransactionType);
						$doc->exportField($this->HandedOverTo);
						$doc->exportField($this->CodeNoTo);
						$doc->exportField($this->DepartmentTo);
						$doc->exportField($this->HandedOverBy);
						$doc->exportField($this->CodeNoBy);
						$doc->exportField($this->DepartmentBy);
						$doc->exportField($this->Sign1);
						$doc->exportField($this->Sign2);
						$doc->exportField($this->Sign3);
						$doc->exportField($this->Sign4);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->property_id);
						$doc->exportField($this->TransactionNo);
						$doc->exportField($this->TransactionDate);
						$doc->exportField($this->TransactionType);
						$doc->exportField($this->HandedOverTo);
						$doc->exportField($this->CodeNoTo);
						$doc->exportField($this->DepartmentTo);
						$doc->exportField($this->HandedOverBy);
						$doc->exportField($this->CodeNoBy);
						$doc->exportField($this->DepartmentBy);
						$doc->exportField($this->Sign1);
						$doc->exportField($this->Sign2);
						$doc->exportField($this->Sign3);
						$doc->exportField($this->Sign4);
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

	// Write Audit Trail start/end for grid update
	public function writeAuditTrailDummy($typ)
	{
		$table = 't101_ho_head';
		$usr = CurrentUserID();
		WriteAuditTrail("log", DbCurrentDateTime(), ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	public function writeAuditTrailOnAdd(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnAdd)
			return;
		$table = 't101_ho_head';

		// Get key value
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType != DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$newvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (Config("AUDIT_TRAIL_TO_DATABASE"))
						$newvalue = $rs[$fldname];
					else
						$newvalue = "[MEMO]"; // Memo Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$newvalue = "[XML]"; // XML Field
				} else {
					$newvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $usr, "A", $table, $fldname, $key, "", $newvalue);
			}
		}
	}

	// Write Audit Trail (edit page)
	public function writeAuditTrailOnEdit(&$rsold, &$rsnew)
	{
		global $Language;
		if (!$this->AuditTrailOnEdit)
			return;
		$table = 't101_ho_head';

		// Get key value
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rsold['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$usr = CurrentUserID();
		foreach (array_keys($rsnew) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && array_key_exists($fldname, $rsold) && $this->fields[$fldname]->DataType != DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->DataType == DATATYPE_DATE) { // DateTime field
					$modified = (FormatDateTime($rsold[$fldname], 0) != FormatDateTime($rsnew[$fldname], 0));
				} else {
					$modified = !CompareValue($rsold[$fldname], $rsnew[$fldname]);
				}
				if ($modified) {
					if ($this->fields[$fldname]->HtmlTag == "PASSWORD") { // Password Field
						$oldvalue = $Language->phrase("PasswordMask");
						$newvalue = $Language->phrase("PasswordMask");
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) { // Memo field
						if (Config("AUDIT_TRAIL_TO_DATABASE")) {
							$oldvalue = $rsold[$fldname];
							$newvalue = $rsnew[$fldname];
						} else {
							$oldvalue = "[MEMO]";
							$newvalue = "[MEMO]";
						}
					} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) { // XML field
						$oldvalue = "[XML]";
						$newvalue = "[XML]";
					} else {
						$oldvalue = $rsold[$fldname];
						$newvalue = $rsnew[$fldname];
					}
					WriteAuditTrail("log", $dt, $id, $usr, "U", $table, $fldname, $key, $oldvalue, $newvalue);
				}
			}
		}
	}

	// Write Audit Trail (delete page)
	public function writeAuditTrailOnDelete(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnDelete)
			return;
		$table = 't101_ho_head';

		// Get key value
		$key = "";
		if ($key != "")
			$key .= Config("COMPOSITE_KEY_SEPARATOR");
		$key .= $rs['id'];

		// Write Audit Trail
		$dt = DbCurrentDateTime();
		$id = ScriptName();
		$curUser = CurrentUserID();
		foreach (array_keys($rs) as $fldname) {
			if (array_key_exists($fldname, $this->fields) && $this->fields[$fldname]->DataType != DATATYPE_BLOB) { // Ignore BLOB fields
				if ($this->fields[$fldname]->HtmlTag == "PASSWORD") {
					$oldvalue = $Language->phrase("PasswordMask"); // Password Field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_MEMO) {
					if (Config("AUDIT_TRAIL_TO_DATABASE"))
						$oldvalue = $rs[$fldname];
					else
						$oldvalue = "[MEMO]"; // Memo field
				} elseif ($this->fields[$fldname]->DataType == DATATYPE_XML) {
					$oldvalue = "[XML]"; // XML field
				} else {
					$oldvalue = $rs[$fldname];
				}
				WriteAuditTrail("log", $dt, $id, $curUser, "D", $table, $fldname, $key, $oldvalue, "");
			}
		}
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