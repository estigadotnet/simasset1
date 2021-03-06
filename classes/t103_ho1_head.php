<?php namespace PHPMaker2020\p_simasset1; ?>
<?php

/**
 * Table class for t103_ho1_head
 */
class t103_ho1_head extends DbTable
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
	public $ho_head;
	public $TransactionNo;
	public $TransactionDate;
	public $TransactionType;
	public $HandedOverTo;
	public $CodeNoTo;
	public $DepartmentTo;
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
		$this->TableVar = 't103_ho1_head';
		$this->TableName = 't103_ho1_head';
		$this->TableType = 'TABLE';

		// Update Table
		$this->UpdateTable = "`t103_ho1_head`";
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
		$this->id = new DbField('t103_ho1_head', 't103_ho1_head', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->IsForeignKey = TRUE; // Foreign key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// ho_head
		$this->ho_head = new DbField('t103_ho1_head', 't103_ho1_head', 'x_ho_head', 'ho_head', '`ho_head`', '`ho_head`', 3, 11, -1, FALSE, '`ho_head`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->ho_head->Nullable = FALSE; // NOT NULL field
		$this->ho_head->Required = TRUE; // Required field
		$this->ho_head->Sortable = TRUE; // Allow sort
		$this->ho_head->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->ho_head->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->ho_head->Lookup = new Lookup('ho_head', 't101_ho_head', FALSE, 'id', ["TransactionNo","","",""], [], [], [], [], [], [], '', '');
		$this->ho_head->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['ho_head'] = &$this->ho_head;

		// TransactionNo
		$this->TransactionNo = new DbField('t103_ho1_head', 't103_ho1_head', 'x_TransactionNo', 'TransactionNo', '`TransactionNo`', '`TransactionNo`', 200, 25, -1, FALSE, '`TransactionNo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransactionNo->Nullable = FALSE; // NOT NULL field
		$this->TransactionNo->Required = TRUE; // Required field
		$this->TransactionNo->Sortable = TRUE; // Allow sort
		$this->fields['TransactionNo'] = &$this->TransactionNo;

		// TransactionDate
		$this->TransactionDate = new DbField('t103_ho1_head', 't103_ho1_head', 'x_TransactionDate', 'TransactionDate', '`TransactionDate`', CastDateFieldForLike("`TransactionDate`", 7, "DB"), 133, 10, 7, FALSE, '`TransactionDate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->TransactionDate->Nullable = FALSE; // NOT NULL field
		$this->TransactionDate->Required = TRUE; // Required field
		$this->TransactionDate->Sortable = TRUE; // Allow sort
		$this->TransactionDate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_SEPARATOR"], $Language->phrase("IncorrectDateDMY"));
		$this->fields['TransactionDate'] = &$this->TransactionDate;

		// TransactionType
		$this->TransactionType = new DbField('t103_ho1_head', 't103_ho1_head', 'x_TransactionType', 'TransactionType', '`TransactionType`', '`TransactionType`', 16, 4, -1, FALSE, '`TransactionType`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->TransactionType->Nullable = FALSE; // NOT NULL field
		$this->TransactionType->Required = TRUE; // Required field
		$this->TransactionType->Sortable = TRUE; // Allow sort
		$this->TransactionType->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->TransactionType->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->TransactionType->Lookup = new Lookup('TransactionType', 't103_ho1_head', FALSE, '', ["","","",""], [], [], [], [], [], [], '', '');
		$this->TransactionType->OptionCount = 1;
		$this->TransactionType->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['TransactionType'] = &$this->TransactionType;

		// HandedOverTo
		$this->HandedOverTo = new DbField('t103_ho1_head', 't103_ho1_head', 'x_HandedOverTo', 'HandedOverTo', '`HandedOverTo`', '`HandedOverTo`', 3, 11, -1, FALSE, '`HandedOverTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->HandedOverTo->Nullable = FALSE; // NOT NULL field
		$this->HandedOverTo->Required = TRUE; // Required field
		$this->HandedOverTo->Sortable = TRUE; // Allow sort
		$this->HandedOverTo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->HandedOverTo->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->HandedOverTo->Lookup = new Lookup('HandedOverTo', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->HandedOverTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['HandedOverTo'] = &$this->HandedOverTo;

		// CodeNoTo
		$this->CodeNoTo = new DbField('t103_ho1_head', 't103_ho1_head', 'x_CodeNoTo', 'CodeNoTo', '`CodeNoTo`', '`CodeNoTo`', 200, 25, -1, FALSE, '`CodeNoTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->CodeNoTo->Nullable = FALSE; // NOT NULL field
		$this->CodeNoTo->Required = TRUE; // Required field
		$this->CodeNoTo->Sortable = TRUE; // Allow sort
		$this->fields['CodeNoTo'] = &$this->CodeNoTo;

		// DepartmentTo
		$this->DepartmentTo = new DbField('t103_ho1_head', 't103_ho1_head', 'x_DepartmentTo', 'DepartmentTo', '`DepartmentTo`', '`DepartmentTo`', 3, 11, -1, FALSE, '`DepartmentTo`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->DepartmentTo->Nullable = FALSE; // NOT NULL field
		$this->DepartmentTo->Required = TRUE; // Required field
		$this->DepartmentTo->Sortable = TRUE; // Allow sort
		$this->DepartmentTo->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->DepartmentTo->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->DepartmentTo->Lookup = new Lookup('DepartmentTo', 't002_department', FALSE, 'id', ["Department","","",""], [], [], [], [], [], [], '', '');
		$this->DepartmentTo->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['DepartmentTo'] = &$this->DepartmentTo;

		// Sign1
		$this->Sign1 = new DbField('t103_ho1_head', 't103_ho1_head', 'x_Sign1', 'Sign1', '`Sign1`', '`Sign1`', 3, 11, -1, FALSE, '`Sign1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Sign1->Nullable = FALSE; // NOT NULL field
		$this->Sign1->Required = TRUE; // Required field
		$this->Sign1->Sortable = TRUE; // Allow sort
		$this->Sign1->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Sign1->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Sign1->Lookup = new Lookup('Sign1', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->Sign1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign1'] = &$this->Sign1;

		// Sign2
		$this->Sign2 = new DbField('t103_ho1_head', 't103_ho1_head', 'x_Sign2', 'Sign2', '`Sign2`', '`Sign2`', 3, 11, -1, FALSE, '`Sign2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Sign2->Nullable = FALSE; // NOT NULL field
		$this->Sign2->Required = TRUE; // Required field
		$this->Sign2->Sortable = TRUE; // Allow sort
		$this->Sign2->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Sign2->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Sign2->Lookup = new Lookup('Sign2', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->Sign2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign2'] = &$this->Sign2;

		// Sign3
		$this->Sign3 = new DbField('t103_ho1_head', 't103_ho1_head', 'x_Sign3', 'Sign3', '`Sign3`', '`Sign3`', 3, 11, -1, FALSE, '`Sign3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
		$this->Sign3->Nullable = FALSE; // NOT NULL field
		$this->Sign3->Required = TRUE; // Required field
		$this->Sign3->Sortable = TRUE; // Allow sort
		$this->Sign3->UsePleaseSelect = TRUE; // Use PleaseSelect by default
		$this->Sign3->PleaseSelectText = $Language->phrase("PleaseSelect"); // "PleaseSelect" text
		$this->Sign3->Lookup = new Lookup('Sign3', 't003_signature', FALSE, 'id', ["Signature","","",""], [], [], [], [], [], [], '', '');
		$this->Sign3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['Sign3'] = &$this->Sign3;

		// Sign4
		$this->Sign4 = new DbField('t103_ho1_head', 't103_ho1_head', 'x_Sign4', 'Sign4', '`Sign4`', '`Sign4`', 3, 11, -1, FALSE, '`Sign4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'SELECT');
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
		} else {
			if (!$ctrl)
				$fld->setSort("");
		}
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
		if ($this->getCurrentDetailTable() == "t104_ho1_detail") {
			$detailUrl = $GLOBALS["t104_ho1_detail"]->getListUrl() . "?" . Config("TABLE_SHOW_MASTER") . "=" . $this->TableVar;
			$detailUrl .= "&fk_id=" . urlencode($this->id->CurrentValue);
		}
		if ($detailUrl == "")
			$detailUrl = "t103_ho1_headlist.php";
		return $detailUrl;
	}

	// Table level SQL
	public function getSqlFrom() // From
	{
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`t103_ho1_head`";
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

		// Cascade Update detail table 't104_ho1_detail'
		$cascadeUpdate = FALSE;
		$rscascade = [];
		if ($rsold && (isset($rs['id']) && $rsold['id'] != $rs['id'])) { // Update detail field 'hohead_id'
			$cascadeUpdate = TRUE;
			$rscascade['hohead_id'] = $rs['id'];
		}
		if ($cascadeUpdate) {
			if (!isset($GLOBALS["t104_ho1_detail"]))
				$GLOBALS["t104_ho1_detail"] = new t104_ho1_detail();
			$rswrk = $GLOBALS["t104_ho1_detail"]->loadRs("`hohead_id` = " . QuotedValue($rsold['id'], DATATYPE_NUMBER, 'DB'));
			while ($rswrk && !$rswrk->EOF) {
				$rskey = [];
				$fldname = 'id';
				$rskey[$fldname] = $rswrk->fields[$fldname];
				$rsdtlold = &$rswrk->fields;
				$rsdtlnew = array_merge($rsdtlold, $rscascade);

				// Call Row_Updating event
				$success = $GLOBALS["t104_ho1_detail"]->Row_Updating($rsdtlold, $rsdtlnew);
				if ($success)
					$success = $GLOBALS["t104_ho1_detail"]->update($rscascade, $rskey, $rswrk->fields);
				if (!$success)
					return FALSE;

				// Call Row_Updated event
				$GLOBALS["t104_ho1_detail"]->Row_Updated($rsdtlold, $rsdtlnew);
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

		// Cascade delete detail table 't104_ho1_detail'
		if (!isset($GLOBALS["t104_ho1_detail"]))
			$GLOBALS["t104_ho1_detail"] = new t104_ho1_detail();
		$rscascade = $GLOBALS["t104_ho1_detail"]->loadRs("`hohead_id` = " . QuotedValue($rs['id'], DATATYPE_NUMBER, "DB"));
		$dtlrows = ($rscascade) ? $rscascade->getRows() : [];

		// Call Row Deleting event
		foreach ($dtlrows as $dtlrow) {
			$success = $GLOBALS["t104_ho1_detail"]->Row_Deleting($dtlrow);
			if (!$success)
				break;
		}
		if ($success) {
			foreach ($dtlrows as $dtlrow) {
				$success = $GLOBALS["t104_ho1_detail"]->delete($dtlrow); // Delete
				if (!$success)
					break;
			}
		}

		// Call Row Deleted event
		if ($success) {
			foreach ($dtlrows as $dtlrow)
				$GLOBALS["t104_ho1_detail"]->Row_Deleted($dtlrow);
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
		$this->ho_head->DbValue = $row['ho_head'];
		$this->TransactionNo->DbValue = $row['TransactionNo'];
		$this->TransactionDate->DbValue = $row['TransactionDate'];
		$this->TransactionType->DbValue = $row['TransactionType'];
		$this->HandedOverTo->DbValue = $row['HandedOverTo'];
		$this->CodeNoTo->DbValue = $row['CodeNoTo'];
		$this->DepartmentTo->DbValue = $row['DepartmentTo'];
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
			return "t103_ho1_headlist.php";
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
		if ($pageName == "t103_ho1_headview.php")
			return $Language->phrase("View");
		elseif ($pageName == "t103_ho1_headedit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "t103_ho1_headadd.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "t103_ho1_headlist.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("t103_ho1_headview.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t103_ho1_headview.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "t103_ho1_headadd.php?" . $this->getUrlParm($parm);
		else
			$url = "t103_ho1_headadd.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("t103_ho1_headedit.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t103_ho1_headedit.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
			$url = $this->keyUrl("t103_ho1_headadd.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("t103_ho1_headadd.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
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
		return $this->keyUrl("t103_ho1_headdelete.php", $this->getUrlParm());
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
		$this->ho_head->setDbValue($rs->fields('ho_head'));
		$this->TransactionNo->setDbValue($rs->fields('TransactionNo'));
		$this->TransactionDate->setDbValue($rs->fields('TransactionDate'));
		$this->TransactionType->setDbValue($rs->fields('TransactionType'));
		$this->HandedOverTo->setDbValue($rs->fields('HandedOverTo'));
		$this->CodeNoTo->setDbValue($rs->fields('CodeNoTo'));
		$this->DepartmentTo->setDbValue($rs->fields('DepartmentTo'));
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
		// ho_head
		// TransactionNo
		// TransactionDate
		// TransactionType
		// HandedOverTo
		// CodeNoTo
		// DepartmentTo
		// Sign1
		// Sign2
		// Sign3
		// Sign4
		// id

		$this->id->ViewValue = $this->id->CurrentValue;
		$this->id->ViewCustomAttributes = "";

		// ho_head
		$curVal = strval($this->ho_head->CurrentValue);
		if ($curVal != "") {
			$this->ho_head->ViewValue = $this->ho_head->lookupCacheOption($curVal);
			if ($this->ho_head->ViewValue === NULL) { // Lookup from database
				$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
				$lookupFilter = function() {
					return "`id` not in (select ho_head from t103_ho1_head)";
				};
				$lookupFilter = $lookupFilter->bindTo($this);
				$sqlWrk = $this->ho_head->Lookup->getSql(FALSE, $filterWrk, $lookupFilter, $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = $rswrk->fields('df');
					$this->ho_head->ViewValue = $this->ho_head->displayValue($arwrk);
					$rswrk->Close();
				} else {
					$this->ho_head->ViewValue = $this->ho_head->CurrentValue;
				}
			}
		} else {
			$this->ho_head->ViewValue = NULL;
		}
		$this->ho_head->ViewCustomAttributes = "";

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

		// ho_head
		$this->ho_head->LinkCustomAttributes = "";
		$this->ho_head->HrefValue = "";
		$this->ho_head->TooltipValue = "";

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

		// ho_head
		$this->ho_head->EditAttrs["class"] = "form-control";
		$this->ho_head->EditCustomAttributes = "";

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
		if (strval($this->TransactionType->CurrentValue) != "") {
			$this->TransactionType->EditValue = $this->TransactionType->optionCaption($this->TransactionType->CurrentValue);
		} else {
			$this->TransactionType->EditValue = NULL;
		}
		$this->TransactionType->ViewCustomAttributes = "";

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
					$doc->exportCaption($this->ho_head);
					$doc->exportCaption($this->TransactionNo);
					$doc->exportCaption($this->TransactionDate);
					$doc->exportCaption($this->TransactionType);
					$doc->exportCaption($this->HandedOverTo);
					$doc->exportCaption($this->CodeNoTo);
					$doc->exportCaption($this->DepartmentTo);
					$doc->exportCaption($this->Sign1);
					$doc->exportCaption($this->Sign2);
					$doc->exportCaption($this->Sign3);
					$doc->exportCaption($this->Sign4);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->ho_head);
					$doc->exportCaption($this->TransactionNo);
					$doc->exportCaption($this->TransactionDate);
					$doc->exportCaption($this->TransactionType);
					$doc->exportCaption($this->HandedOverTo);
					$doc->exportCaption($this->CodeNoTo);
					$doc->exportCaption($this->DepartmentTo);
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
						$doc->exportField($this->ho_head);
						$doc->exportField($this->TransactionNo);
						$doc->exportField($this->TransactionDate);
						$doc->exportField($this->TransactionType);
						$doc->exportField($this->HandedOverTo);
						$doc->exportField($this->CodeNoTo);
						$doc->exportField($this->DepartmentTo);
						$doc->exportField($this->Sign1);
						$doc->exportField($this->Sign2);
						$doc->exportField($this->Sign3);
						$doc->exportField($this->Sign4);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->ho_head);
						$doc->exportField($this->TransactionNo);
						$doc->exportField($this->TransactionDate);
						$doc->exportField($this->TransactionType);
						$doc->exportField($this->HandedOverTo);
						$doc->exportField($this->CodeNoTo);
						$doc->exportField($this->DepartmentTo);
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
		$table = 't103_ho1_head';
		$usr = CurrentUserID();
		WriteAuditTrail("log", DbCurrentDateTime(), ScriptName(), $usr, $typ, $table, "", "", "", "");
	}

	// Write Audit Trail (add page)
	public function writeAuditTrailOnAdd(&$rs)
	{
		global $Language;
		if (!$this->AuditTrailOnAdd)
			return;
		$table = 't103_ho1_head';

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
		$table = 't103_ho1_head';

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
		$table = 't103_ho1_head';

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