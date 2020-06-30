<?php namespace PHPMaker2020\p_simasset1; ?>
<?php

/**
 * Table class for v101_ho_2
 */
class v101_ho_2 extends DbTable
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
	public $templatefile;
	public $transactionno;
	public $transactiondate;
	public $handedoverto;
	public $hoto;
	public $departmentto;
	public $deptto;
	public $handedoverby;
	public $hoby;
	public $departmentby;
	public $deptby;
	public $sign1;
	public $signa1;
	public $jobt1;
	public $sign2;
	public $signa2;
	public $jobt2;
	public $sign3;
	public $signa3;
	public $jobt3;
	public $sign4;
	public $signa4;
	public $jobt4;
	public $hodetail_id;
	public $asset_id;
	public $code;
	public $description;
	public $department_id;
	public $asset_dept;
	public $procurementdate;
	public $procurementcurrentcost;
	public $remarks;

	// Constructor
	public function __construct()
	{
		global $Language, $CurrentLanguage;
		parent::__construct();

		// Language object
		if (!isset($Language))
			$Language = new Language();
		$this->TableVar = 'v101_ho_2';
		$this->TableName = 'v101_ho_2';
		$this->TableType = 'VIEW';

		// Update Table
		$this->UpdateTable = "`v101_ho_2`";
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
		$this->id = new DbField('v101_ho_2', 'v101_ho_2', 'x_id', 'id', '`id`', '`id`', 3, 11, -1, FALSE, '`id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->id->IsPrimaryKey = TRUE; // Primary key field
		$this->id->Sortable = TRUE; // Allow sort
		$this->id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['id'] = &$this->id;

		// property_id
		$this->property_id = new DbField('v101_ho_2', 'v101_ho_2', 'x_property_id', 'property_id', '`property_id`', '`property_id`', 3, 11, -1, FALSE, '`property_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->property_id->Nullable = FALSE; // NOT NULL field
		$this->property_id->Required = TRUE; // Required field
		$this->property_id->Sortable = TRUE; // Allow sort
		$this->property_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['property_id'] = &$this->property_id;

		// property
		$this->property = new DbField('v101_ho_2', 'v101_ho_2', 'x_property', 'property', '`property`', '`property`', 200, 100, -1, FALSE, '`property`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->property->Sortable = TRUE; // Allow sort
		$this->fields['property'] = &$this->property;

		// templatefile
		$this->templatefile = new DbField('v101_ho_2', 'v101_ho_2', 'x_templatefile', 'templatefile', '`templatefile`', '`templatefile`', 200, 100, -1, FALSE, '`templatefile`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->templatefile->Sortable = TRUE; // Allow sort
		$this->fields['templatefile'] = &$this->templatefile;

		// transactionno
		$this->transactionno = new DbField('v101_ho_2', 'v101_ho_2', 'x_transactionno', 'transactionno', '`transactionno`', '`transactionno`', 200, 25, -1, FALSE, '`transactionno`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->transactionno->Nullable = FALSE; // NOT NULL field
		$this->transactionno->Required = TRUE; // Required field
		$this->transactionno->Sortable = TRUE; // Allow sort
		$this->fields['transactionno'] = &$this->transactionno;

		// transactiondate
		$this->transactiondate = new DbField('v101_ho_2', 'v101_ho_2', 'x_transactiondate', 'transactiondate', '`transactiondate`', CastDateFieldForLike("`transactiondate`", 0, "DB"), 133, 10, 0, FALSE, '`transactiondate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->transactiondate->Nullable = FALSE; // NOT NULL field
		$this->transactiondate->Required = TRUE; // Required field
		$this->transactiondate->Sortable = TRUE; // Allow sort
		$this->transactiondate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['transactiondate'] = &$this->transactiondate;

		// handedoverto
		$this->handedoverto = new DbField('v101_ho_2', 'v101_ho_2', 'x_handedoverto', 'handedoverto', '`handedoverto`', '`handedoverto`', 3, 11, -1, FALSE, '`handedoverto`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->handedoverto->Nullable = FALSE; // NOT NULL field
		$this->handedoverto->Required = TRUE; // Required field
		$this->handedoverto->Sortable = TRUE; // Allow sort
		$this->handedoverto->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['handedoverto'] = &$this->handedoverto;

		// hoto
		$this->hoto = new DbField('v101_ho_2', 'v101_ho_2', 'x_hoto', 'hoto', '`hoto`', '`hoto`', 200, 100, -1, FALSE, '`hoto`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoto->Sortable = TRUE; // Allow sort
		$this->fields['hoto'] = &$this->hoto;

		// departmentto
		$this->departmentto = new DbField('v101_ho_2', 'v101_ho_2', 'x_departmentto', 'departmentto', '`departmentto`', '`departmentto`', 3, 11, -1, FALSE, '`departmentto`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->departmentto->Nullable = FALSE; // NOT NULL field
		$this->departmentto->Required = TRUE; // Required field
		$this->departmentto->Sortable = TRUE; // Allow sort
		$this->departmentto->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['departmentto'] = &$this->departmentto;

		// deptto
		$this->deptto = new DbField('v101_ho_2', 'v101_ho_2', 'x_deptto', 'deptto', '`deptto`', '`deptto`', 200, 100, -1, FALSE, '`deptto`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->deptto->Sortable = TRUE; // Allow sort
		$this->fields['deptto'] = &$this->deptto;

		// handedoverby
		$this->handedoverby = new DbField('v101_ho_2', 'v101_ho_2', 'x_handedoverby', 'handedoverby', '`handedoverby`', '`handedoverby`', 3, 11, -1, FALSE, '`handedoverby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->handedoverby->Nullable = FALSE; // NOT NULL field
		$this->handedoverby->Required = TRUE; // Required field
		$this->handedoverby->Sortable = TRUE; // Allow sort
		$this->handedoverby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['handedoverby'] = &$this->handedoverby;

		// hoby
		$this->hoby = new DbField('v101_ho_2', 'v101_ho_2', 'x_hoby', 'hoby', '`hoby`', '`hoby`', 200, 100, -1, FALSE, '`hoby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->hoby->Sortable = TRUE; // Allow sort
		$this->fields['hoby'] = &$this->hoby;

		// departmentby
		$this->departmentby = new DbField('v101_ho_2', 'v101_ho_2', 'x_departmentby', 'departmentby', '`departmentby`', '`departmentby`', 3, 11, -1, FALSE, '`departmentby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->departmentby->Nullable = FALSE; // NOT NULL field
		$this->departmentby->Required = TRUE; // Required field
		$this->departmentby->Sortable = TRUE; // Allow sort
		$this->departmentby->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['departmentby'] = &$this->departmentby;

		// deptby
		$this->deptby = new DbField('v101_ho_2', 'v101_ho_2', 'x_deptby', 'deptby', '`deptby`', '`deptby`', 200, 100, -1, FALSE, '`deptby`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->deptby->Sortable = TRUE; // Allow sort
		$this->fields['deptby'] = &$this->deptby;

		// sign1
		$this->sign1 = new DbField('v101_ho_2', 'v101_ho_2', 'x_sign1', 'sign1', '`sign1`', '`sign1`', 3, 11, -1, FALSE, '`sign1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sign1->Nullable = FALSE; // NOT NULL field
		$this->sign1->Required = TRUE; // Required field
		$this->sign1->Sortable = TRUE; // Allow sort
		$this->sign1->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign1'] = &$this->sign1;

		// signa1
		$this->signa1 = new DbField('v101_ho_2', 'v101_ho_2', 'x_signa1', 'signa1', '`signa1`', '`signa1`', 200, 100, -1, FALSE, '`signa1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signa1->Sortable = TRUE; // Allow sort
		$this->fields['signa1'] = &$this->signa1;

		// jobt1
		$this->jobt1 = new DbField('v101_ho_2', 'v101_ho_2', 'x_jobt1', 'jobt1', '`jobt1`', '`jobt1`', 200, 100, -1, FALSE, '`jobt1`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobt1->Sortable = TRUE; // Allow sort
		$this->fields['jobt1'] = &$this->jobt1;

		// sign2
		$this->sign2 = new DbField('v101_ho_2', 'v101_ho_2', 'x_sign2', 'sign2', '`sign2`', '`sign2`', 3, 11, -1, FALSE, '`sign2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sign2->Nullable = FALSE; // NOT NULL field
		$this->sign2->Required = TRUE; // Required field
		$this->sign2->Sortable = TRUE; // Allow sort
		$this->sign2->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign2'] = &$this->sign2;

		// signa2
		$this->signa2 = new DbField('v101_ho_2', 'v101_ho_2', 'x_signa2', 'signa2', '`signa2`', '`signa2`', 200, 100, -1, FALSE, '`signa2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signa2->Sortable = TRUE; // Allow sort
		$this->fields['signa2'] = &$this->signa2;

		// jobt2
		$this->jobt2 = new DbField('v101_ho_2', 'v101_ho_2', 'x_jobt2', 'jobt2', '`jobt2`', '`jobt2`', 200, 100, -1, FALSE, '`jobt2`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobt2->Sortable = TRUE; // Allow sort
		$this->fields['jobt2'] = &$this->jobt2;

		// sign3
		$this->sign3 = new DbField('v101_ho_2', 'v101_ho_2', 'x_sign3', 'sign3', '`sign3`', '`sign3`', 3, 11, -1, FALSE, '`sign3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sign3->Nullable = FALSE; // NOT NULL field
		$this->sign3->Required = TRUE; // Required field
		$this->sign3->Sortable = TRUE; // Allow sort
		$this->sign3->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign3'] = &$this->sign3;

		// signa3
		$this->signa3 = new DbField('v101_ho_2', 'v101_ho_2', 'x_signa3', 'signa3', '`signa3`', '`signa3`', 200, 100, -1, FALSE, '`signa3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signa3->Sortable = TRUE; // Allow sort
		$this->fields['signa3'] = &$this->signa3;

		// jobt3
		$this->jobt3 = new DbField('v101_ho_2', 'v101_ho_2', 'x_jobt3', 'jobt3', '`jobt3`', '`jobt3`', 200, 100, -1, FALSE, '`jobt3`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobt3->Sortable = TRUE; // Allow sort
		$this->fields['jobt3'] = &$this->jobt3;

		// sign4
		$this->sign4 = new DbField('v101_ho_2', 'v101_ho_2', 'x_sign4', 'sign4', '`sign4`', '`sign4`', 3, 11, -1, FALSE, '`sign4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->sign4->Nullable = FALSE; // NOT NULL field
		$this->sign4->Required = TRUE; // Required field
		$this->sign4->Sortable = TRUE; // Allow sort
		$this->sign4->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['sign4'] = &$this->sign4;

		// signa4
		$this->signa4 = new DbField('v101_ho_2', 'v101_ho_2', 'x_signa4', 'signa4', '`signa4`', '`signa4`', 200, 100, -1, FALSE, '`signa4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->signa4->Sortable = TRUE; // Allow sort
		$this->fields['signa4'] = &$this->signa4;

		// jobt4
		$this->jobt4 = new DbField('v101_ho_2', 'v101_ho_2', 'x_jobt4', 'jobt4', '`jobt4`', '`jobt4`', 200, 100, -1, FALSE, '`jobt4`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->jobt4->Sortable = TRUE; // Allow sort
		$this->fields['jobt4'] = &$this->jobt4;

		// hodetail_id
		$this->hodetail_id = new DbField('v101_ho_2', 'v101_ho_2', 'x_hodetail_id', 'hodetail_id', '`hodetail_id`', '`hodetail_id`', 3, 11, -1, FALSE, '`hodetail_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'NO');
		$this->hodetail_id->IsAutoIncrement = TRUE; // Autoincrement field
		$this->hodetail_id->IsPrimaryKey = TRUE; // Primary key field
		$this->hodetail_id->Sortable = TRUE; // Allow sort
		$this->hodetail_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['hodetail_id'] = &$this->hodetail_id;

		// asset_id
		$this->asset_id = new DbField('v101_ho_2', 'v101_ho_2', 'x_asset_id', 'asset_id', '`asset_id`', '`asset_id`', 3, 11, -1, FALSE, '`asset_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->asset_id->Sortable = TRUE; // Allow sort
		$this->asset_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['asset_id'] = &$this->asset_id;

		// code
		$this->code = new DbField('v101_ho_2', 'v101_ho_2', 'x_code', 'code', '`code`', '`code`', 200, 25, -1, FALSE, '`code`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->code->Sortable = TRUE; // Allow sort
		$this->fields['code'] = &$this->code;

		// description
		$this->description = new DbField('v101_ho_2', 'v101_ho_2', 'x_description', 'description', '`description`', '`description`', 200, 255, -1, FALSE, '`description`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->description->Sortable = TRUE; // Allow sort
		$this->fields['description'] = &$this->description;

		// department_id
		$this->department_id = new DbField('v101_ho_2', 'v101_ho_2', 'x_department_id', 'department_id', '`department_id`', '`department_id`', 3, 11, -1, FALSE, '`department_id`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->department_id->Sortable = TRUE; // Allow sort
		$this->department_id->DefaultErrorMessage = $Language->phrase("IncorrectInteger");
		$this->fields['department_id'] = &$this->department_id;

		// asset_dept
		$this->asset_dept = new DbField('v101_ho_2', 'v101_ho_2', 'x_asset_dept', 'asset_dept', '`asset_dept`', '`asset_dept`', 200, 100, -1, FALSE, '`asset_dept`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->asset_dept->Sortable = TRUE; // Allow sort
		$this->fields['asset_dept'] = &$this->asset_dept;

		// procurementdate
		$this->procurementdate = new DbField('v101_ho_2', 'v101_ho_2', 'x_procurementdate', 'procurementdate', '`procurementdate`', CastDateFieldForLike("`procurementdate`", 0, "DB"), 133, 10, 0, FALSE, '`procurementdate`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->procurementdate->Sortable = TRUE; // Allow sort
		$this->procurementdate->DefaultErrorMessage = str_replace("%s", $GLOBALS["DATE_FORMAT"], $Language->phrase("IncorrectDate"));
		$this->fields['procurementdate'] = &$this->procurementdate;

		// procurementcurrentcost
		$this->procurementcurrentcost = new DbField('v101_ho_2', 'v101_ho_2', 'x_procurementcurrentcost', 'procurementcurrentcost', '`procurementcurrentcost`', '`procurementcurrentcost`', 4, 17, -1, FALSE, '`procurementcurrentcost`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXT');
		$this->procurementcurrentcost->Sortable = TRUE; // Allow sort
		$this->procurementcurrentcost->DefaultErrorMessage = $Language->phrase("IncorrectFloat");
		$this->fields['procurementcurrentcost'] = &$this->procurementcurrentcost;

		// remarks
		$this->remarks = new DbField('v101_ho_2', 'v101_ho_2', 'x_remarks', 'remarks', '`remarks`', '`remarks`', 201, 65535, -1, FALSE, '`remarks`', FALSE, FALSE, FALSE, 'FORMATTED TEXT', 'TEXTAREA');
		$this->remarks->Sortable = TRUE; // Allow sort
		$this->fields['remarks'] = &$this->remarks;
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
		return ($this->SqlFrom != "") ? $this->SqlFrom : "`v101_ho_2`";
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
		$this->property->DbValue = $row['property'];
		$this->templatefile->DbValue = $row['templatefile'];
		$this->transactionno->DbValue = $row['transactionno'];
		$this->transactiondate->DbValue = $row['transactiondate'];
		$this->handedoverto->DbValue = $row['handedoverto'];
		$this->hoto->DbValue = $row['hoto'];
		$this->departmentto->DbValue = $row['departmentto'];
		$this->deptto->DbValue = $row['deptto'];
		$this->handedoverby->DbValue = $row['handedoverby'];
		$this->hoby->DbValue = $row['hoby'];
		$this->departmentby->DbValue = $row['departmentby'];
		$this->deptby->DbValue = $row['deptby'];
		$this->sign1->DbValue = $row['sign1'];
		$this->signa1->DbValue = $row['signa1'];
		$this->jobt1->DbValue = $row['jobt1'];
		$this->sign2->DbValue = $row['sign2'];
		$this->signa2->DbValue = $row['signa2'];
		$this->jobt2->DbValue = $row['jobt2'];
		$this->sign3->DbValue = $row['sign3'];
		$this->signa3->DbValue = $row['signa3'];
		$this->jobt3->DbValue = $row['jobt3'];
		$this->sign4->DbValue = $row['sign4'];
		$this->signa4->DbValue = $row['signa4'];
		$this->jobt4->DbValue = $row['jobt4'];
		$this->hodetail_id->DbValue = $row['hodetail_id'];
		$this->asset_id->DbValue = $row['asset_id'];
		$this->code->DbValue = $row['code'];
		$this->description->DbValue = $row['description'];
		$this->department_id->DbValue = $row['department_id'];
		$this->asset_dept->DbValue = $row['asset_dept'];
		$this->procurementdate->DbValue = $row['procurementdate'];
		$this->procurementcurrentcost->DbValue = $row['procurementcurrentcost'];
		$this->remarks->DbValue = $row['remarks'];
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
			return "v101_ho_2list.php";
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
		if ($pageName == "v101_ho_2view.php")
			return $Language->phrase("View");
		elseif ($pageName == "v101_ho_2edit.php")
			return $Language->phrase("Edit");
		elseif ($pageName == "v101_ho_2add.php")
			return $Language->phrase("Add");
		else
			return "";
	}

	// List URL
	public function getListUrl()
	{
		return "v101_ho_2list.php";
	}

	// View URL
	public function getViewUrl($parm = "")
	{
		if ($parm != "")
			$url = $this->keyUrl("v101_ho_2view.php", $this->getUrlParm($parm));
		else
			$url = $this->keyUrl("v101_ho_2view.php", $this->getUrlParm(Config("TABLE_SHOW_DETAIL") . "="));
		return $this->addMasterUrl($url);
	}

	// Add URL
	public function getAddUrl($parm = "")
	{
		if ($parm != "")
			$url = "v101_ho_2add.php?" . $this->getUrlParm($parm);
		else
			$url = "v101_ho_2add.php";
		return $this->addMasterUrl($url);
	}

	// Edit URL
	public function getEditUrl($parm = "")
	{
		$url = $this->keyUrl("v101_ho_2edit.php", $this->getUrlParm($parm));
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
		$url = $this->keyUrl("v101_ho_2add.php", $this->getUrlParm($parm));
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
		return $this->keyUrl("v101_ho_2delete.php", $this->getUrlParm());
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
		$this->property->setDbValue($rs->fields('property'));
		$this->templatefile->setDbValue($rs->fields('templatefile'));
		$this->transactionno->setDbValue($rs->fields('transactionno'));
		$this->transactiondate->setDbValue($rs->fields('transactiondate'));
		$this->handedoverto->setDbValue($rs->fields('handedoverto'));
		$this->hoto->setDbValue($rs->fields('hoto'));
		$this->departmentto->setDbValue($rs->fields('departmentto'));
		$this->deptto->setDbValue($rs->fields('deptto'));
		$this->handedoverby->setDbValue($rs->fields('handedoverby'));
		$this->hoby->setDbValue($rs->fields('hoby'));
		$this->departmentby->setDbValue($rs->fields('departmentby'));
		$this->deptby->setDbValue($rs->fields('deptby'));
		$this->sign1->setDbValue($rs->fields('sign1'));
		$this->signa1->setDbValue($rs->fields('signa1'));
		$this->jobt1->setDbValue($rs->fields('jobt1'));
		$this->sign2->setDbValue($rs->fields('sign2'));
		$this->signa2->setDbValue($rs->fields('signa2'));
		$this->jobt2->setDbValue($rs->fields('jobt2'));
		$this->sign3->setDbValue($rs->fields('sign3'));
		$this->signa3->setDbValue($rs->fields('signa3'));
		$this->jobt3->setDbValue($rs->fields('jobt3'));
		$this->sign4->setDbValue($rs->fields('sign4'));
		$this->signa4->setDbValue($rs->fields('signa4'));
		$this->jobt4->setDbValue($rs->fields('jobt4'));
		$this->hodetail_id->setDbValue($rs->fields('hodetail_id'));
		$this->asset_id->setDbValue($rs->fields('asset_id'));
		$this->code->setDbValue($rs->fields('code'));
		$this->description->setDbValue($rs->fields('description'));
		$this->department_id->setDbValue($rs->fields('department_id'));
		$this->asset_dept->setDbValue($rs->fields('asset_dept'));
		$this->procurementdate->setDbValue($rs->fields('procurementdate'));
		$this->procurementcurrentcost->setDbValue($rs->fields('procurementcurrentcost'));
		$this->remarks->setDbValue($rs->fields('remarks'));
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
		// templatefile
		// transactionno
		// transactiondate
		// handedoverto
		// hoto
		// departmentto
		// deptto
		// handedoverby
		// hoby
		// departmentby
		// deptby
		// sign1
		// signa1
		// jobt1
		// sign2
		// signa2
		// jobt2
		// sign3
		// signa3
		// jobt3
		// sign4
		// signa4
		// jobt4
		// hodetail_id
		// asset_id
		// code
		// description
		// department_id
		// asset_dept
		// procurementdate
		// procurementcurrentcost
		// remarks
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

		// templatefile
		$this->templatefile->ViewValue = $this->templatefile->CurrentValue;
		$this->templatefile->ViewCustomAttributes = "";

		// transactionno
		$this->transactionno->ViewValue = $this->transactionno->CurrentValue;
		$this->transactionno->ViewCustomAttributes = "";

		// transactiondate
		$this->transactiondate->ViewValue = $this->transactiondate->CurrentValue;
		$this->transactiondate->ViewValue = FormatDateTime($this->transactiondate->ViewValue, 0);
		$this->transactiondate->ViewCustomAttributes = "";

		// handedoverto
		$this->handedoverto->ViewValue = $this->handedoverto->CurrentValue;
		$this->handedoverto->ViewValue = FormatNumber($this->handedoverto->ViewValue, 0, -2, -2, -2);
		$this->handedoverto->ViewCustomAttributes = "";

		// hoto
		$this->hoto->ViewValue = $this->hoto->CurrentValue;
		$this->hoto->ViewCustomAttributes = "";

		// departmentto
		$this->departmentto->ViewValue = $this->departmentto->CurrentValue;
		$this->departmentto->ViewValue = FormatNumber($this->departmentto->ViewValue, 0, -2, -2, -2);
		$this->departmentto->ViewCustomAttributes = "";

		// deptto
		$this->deptto->ViewValue = $this->deptto->CurrentValue;
		$this->deptto->ViewCustomAttributes = "";

		// handedoverby
		$this->handedoverby->ViewValue = $this->handedoverby->CurrentValue;
		$this->handedoverby->ViewValue = FormatNumber($this->handedoverby->ViewValue, 0, -2, -2, -2);
		$this->handedoverby->ViewCustomAttributes = "";

		// hoby
		$this->hoby->ViewValue = $this->hoby->CurrentValue;
		$this->hoby->ViewCustomAttributes = "";

		// departmentby
		$this->departmentby->ViewValue = $this->departmentby->CurrentValue;
		$this->departmentby->ViewValue = FormatNumber($this->departmentby->ViewValue, 0, -2, -2, -2);
		$this->departmentby->ViewCustomAttributes = "";

		// deptby
		$this->deptby->ViewValue = $this->deptby->CurrentValue;
		$this->deptby->ViewCustomAttributes = "";

		// sign1
		$this->sign1->ViewValue = $this->sign1->CurrentValue;
		$this->sign1->ViewValue = FormatNumber($this->sign1->ViewValue, 0, -2, -2, -2);
		$this->sign1->ViewCustomAttributes = "";

		// signa1
		$this->signa1->ViewValue = $this->signa1->CurrentValue;
		$this->signa1->ViewCustomAttributes = "";

		// jobt1
		$this->jobt1->ViewValue = $this->jobt1->CurrentValue;
		$this->jobt1->ViewCustomAttributes = "";

		// sign2
		$this->sign2->ViewValue = $this->sign2->CurrentValue;
		$this->sign2->ViewValue = FormatNumber($this->sign2->ViewValue, 0, -2, -2, -2);
		$this->sign2->ViewCustomAttributes = "";

		// signa2
		$this->signa2->ViewValue = $this->signa2->CurrentValue;
		$this->signa2->ViewCustomAttributes = "";

		// jobt2
		$this->jobt2->ViewValue = $this->jobt2->CurrentValue;
		$this->jobt2->ViewCustomAttributes = "";

		// sign3
		$this->sign3->ViewValue = $this->sign3->CurrentValue;
		$this->sign3->ViewValue = FormatNumber($this->sign3->ViewValue, 0, -2, -2, -2);
		$this->sign3->ViewCustomAttributes = "";

		// signa3
		$this->signa3->ViewValue = $this->signa3->CurrentValue;
		$this->signa3->ViewCustomAttributes = "";

		// jobt3
		$this->jobt3->ViewValue = $this->jobt3->CurrentValue;
		$this->jobt3->ViewCustomAttributes = "";

		// sign4
		$this->sign4->ViewValue = $this->sign4->CurrentValue;
		$this->sign4->ViewValue = FormatNumber($this->sign4->ViewValue, 0, -2, -2, -2);
		$this->sign4->ViewCustomAttributes = "";

		// signa4
		$this->signa4->ViewValue = $this->signa4->CurrentValue;
		$this->signa4->ViewCustomAttributes = "";

		// jobt4
		$this->jobt4->ViewValue = $this->jobt4->CurrentValue;
		$this->jobt4->ViewCustomAttributes = "";

		// hodetail_id
		$this->hodetail_id->ViewValue = $this->hodetail_id->CurrentValue;
		$this->hodetail_id->ViewCustomAttributes = "";

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

		// templatefile
		$this->templatefile->LinkCustomAttributes = "";
		$this->templatefile->HrefValue = "";
		$this->templatefile->TooltipValue = "";

		// transactionno
		$this->transactionno->LinkCustomAttributes = "";
		$this->transactionno->HrefValue = "";
		$this->transactionno->TooltipValue = "";

		// transactiondate
		$this->transactiondate->LinkCustomAttributes = "";
		$this->transactiondate->HrefValue = "";
		$this->transactiondate->TooltipValue = "";

		// handedoverto
		$this->handedoverto->LinkCustomAttributes = "";
		$this->handedoverto->HrefValue = "";
		$this->handedoverto->TooltipValue = "";

		// hoto
		$this->hoto->LinkCustomAttributes = "";
		$this->hoto->HrefValue = "";
		$this->hoto->TooltipValue = "";

		// departmentto
		$this->departmentto->LinkCustomAttributes = "";
		$this->departmentto->HrefValue = "";
		$this->departmentto->TooltipValue = "";

		// deptto
		$this->deptto->LinkCustomAttributes = "";
		$this->deptto->HrefValue = "";
		$this->deptto->TooltipValue = "";

		// handedoverby
		$this->handedoverby->LinkCustomAttributes = "";
		$this->handedoverby->HrefValue = "";
		$this->handedoverby->TooltipValue = "";

		// hoby
		$this->hoby->LinkCustomAttributes = "";
		$this->hoby->HrefValue = "";
		$this->hoby->TooltipValue = "";

		// departmentby
		$this->departmentby->LinkCustomAttributes = "";
		$this->departmentby->HrefValue = "";
		$this->departmentby->TooltipValue = "";

		// deptby
		$this->deptby->LinkCustomAttributes = "";
		$this->deptby->HrefValue = "";
		$this->deptby->TooltipValue = "";

		// sign1
		$this->sign1->LinkCustomAttributes = "";
		$this->sign1->HrefValue = "";
		$this->sign1->TooltipValue = "";

		// signa1
		$this->signa1->LinkCustomAttributes = "";
		$this->signa1->HrefValue = "";
		$this->signa1->TooltipValue = "";

		// jobt1
		$this->jobt1->LinkCustomAttributes = "";
		$this->jobt1->HrefValue = "";
		$this->jobt1->TooltipValue = "";

		// sign2
		$this->sign2->LinkCustomAttributes = "";
		$this->sign2->HrefValue = "";
		$this->sign2->TooltipValue = "";

		// signa2
		$this->signa2->LinkCustomAttributes = "";
		$this->signa2->HrefValue = "";
		$this->signa2->TooltipValue = "";

		// jobt2
		$this->jobt2->LinkCustomAttributes = "";
		$this->jobt2->HrefValue = "";
		$this->jobt2->TooltipValue = "";

		// sign3
		$this->sign3->LinkCustomAttributes = "";
		$this->sign3->HrefValue = "";
		$this->sign3->TooltipValue = "";

		// signa3
		$this->signa3->LinkCustomAttributes = "";
		$this->signa3->HrefValue = "";
		$this->signa3->TooltipValue = "";

		// jobt3
		$this->jobt3->LinkCustomAttributes = "";
		$this->jobt3->HrefValue = "";
		$this->jobt3->TooltipValue = "";

		// sign4
		$this->sign4->LinkCustomAttributes = "";
		$this->sign4->HrefValue = "";
		$this->sign4->TooltipValue = "";

		// signa4
		$this->signa4->LinkCustomAttributes = "";
		$this->signa4->HrefValue = "";
		$this->signa4->TooltipValue = "";

		// jobt4
		$this->jobt4->LinkCustomAttributes = "";
		$this->jobt4->HrefValue = "";
		$this->jobt4->TooltipValue = "";

		// hodetail_id
		$this->hodetail_id->LinkCustomAttributes = "";
		$this->hodetail_id->HrefValue = "";
		$this->hodetail_id->TooltipValue = "";

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

		// templatefile
		$this->templatefile->EditAttrs["class"] = "form-control";
		$this->templatefile->EditCustomAttributes = "";
		if (!$this->templatefile->Raw)
			$this->templatefile->CurrentValue = HtmlDecode($this->templatefile->CurrentValue);
		$this->templatefile->EditValue = $this->templatefile->CurrentValue;
		$this->templatefile->PlaceHolder = RemoveHtml($this->templatefile->caption());

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

		// handedoverto
		$this->handedoverto->EditAttrs["class"] = "form-control";
		$this->handedoverto->EditCustomAttributes = "";
		$this->handedoverto->EditValue = $this->handedoverto->CurrentValue;
		$this->handedoverto->PlaceHolder = RemoveHtml($this->handedoverto->caption());

		// hoto
		$this->hoto->EditAttrs["class"] = "form-control";
		$this->hoto->EditCustomAttributes = "";
		if (!$this->hoto->Raw)
			$this->hoto->CurrentValue = HtmlDecode($this->hoto->CurrentValue);
		$this->hoto->EditValue = $this->hoto->CurrentValue;
		$this->hoto->PlaceHolder = RemoveHtml($this->hoto->caption());

		// departmentto
		$this->departmentto->EditAttrs["class"] = "form-control";
		$this->departmentto->EditCustomAttributes = "";
		$this->departmentto->EditValue = $this->departmentto->CurrentValue;
		$this->departmentto->PlaceHolder = RemoveHtml($this->departmentto->caption());

		// deptto
		$this->deptto->EditAttrs["class"] = "form-control";
		$this->deptto->EditCustomAttributes = "";
		if (!$this->deptto->Raw)
			$this->deptto->CurrentValue = HtmlDecode($this->deptto->CurrentValue);
		$this->deptto->EditValue = $this->deptto->CurrentValue;
		$this->deptto->PlaceHolder = RemoveHtml($this->deptto->caption());

		// handedoverby
		$this->handedoverby->EditAttrs["class"] = "form-control";
		$this->handedoverby->EditCustomAttributes = "";
		$this->handedoverby->EditValue = $this->handedoverby->CurrentValue;
		$this->handedoverby->PlaceHolder = RemoveHtml($this->handedoverby->caption());

		// hoby
		$this->hoby->EditAttrs["class"] = "form-control";
		$this->hoby->EditCustomAttributes = "";
		if (!$this->hoby->Raw)
			$this->hoby->CurrentValue = HtmlDecode($this->hoby->CurrentValue);
		$this->hoby->EditValue = $this->hoby->CurrentValue;
		$this->hoby->PlaceHolder = RemoveHtml($this->hoby->caption());

		// departmentby
		$this->departmentby->EditAttrs["class"] = "form-control";
		$this->departmentby->EditCustomAttributes = "";
		$this->departmentby->EditValue = $this->departmentby->CurrentValue;
		$this->departmentby->PlaceHolder = RemoveHtml($this->departmentby->caption());

		// deptby
		$this->deptby->EditAttrs["class"] = "form-control";
		$this->deptby->EditCustomAttributes = "";
		if (!$this->deptby->Raw)
			$this->deptby->CurrentValue = HtmlDecode($this->deptby->CurrentValue);
		$this->deptby->EditValue = $this->deptby->CurrentValue;
		$this->deptby->PlaceHolder = RemoveHtml($this->deptby->caption());

		// sign1
		$this->sign1->EditAttrs["class"] = "form-control";
		$this->sign1->EditCustomAttributes = "";
		$this->sign1->EditValue = $this->sign1->CurrentValue;
		$this->sign1->PlaceHolder = RemoveHtml($this->sign1->caption());

		// signa1
		$this->signa1->EditAttrs["class"] = "form-control";
		$this->signa1->EditCustomAttributes = "";
		if (!$this->signa1->Raw)
			$this->signa1->CurrentValue = HtmlDecode($this->signa1->CurrentValue);
		$this->signa1->EditValue = $this->signa1->CurrentValue;
		$this->signa1->PlaceHolder = RemoveHtml($this->signa1->caption());

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

		// signa2
		$this->signa2->EditAttrs["class"] = "form-control";
		$this->signa2->EditCustomAttributes = "";
		if (!$this->signa2->Raw)
			$this->signa2->CurrentValue = HtmlDecode($this->signa2->CurrentValue);
		$this->signa2->EditValue = $this->signa2->CurrentValue;
		$this->signa2->PlaceHolder = RemoveHtml($this->signa2->caption());

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

		// signa3
		$this->signa3->EditAttrs["class"] = "form-control";
		$this->signa3->EditCustomAttributes = "";
		if (!$this->signa3->Raw)
			$this->signa3->CurrentValue = HtmlDecode($this->signa3->CurrentValue);
		$this->signa3->EditValue = $this->signa3->CurrentValue;
		$this->signa3->PlaceHolder = RemoveHtml($this->signa3->caption());

		// jobt3
		$this->jobt3->EditAttrs["class"] = "form-control";
		$this->jobt3->EditCustomAttributes = "";
		if (!$this->jobt3->Raw)
			$this->jobt3->CurrentValue = HtmlDecode($this->jobt3->CurrentValue);
		$this->jobt3->EditValue = $this->jobt3->CurrentValue;
		$this->jobt3->PlaceHolder = RemoveHtml($this->jobt3->caption());

		// sign4
		$this->sign4->EditAttrs["class"] = "form-control";
		$this->sign4->EditCustomAttributes = "";
		$this->sign4->EditValue = $this->sign4->CurrentValue;
		$this->sign4->PlaceHolder = RemoveHtml($this->sign4->caption());

		// signa4
		$this->signa4->EditAttrs["class"] = "form-control";
		$this->signa4->EditCustomAttributes = "";
		if (!$this->signa4->Raw)
			$this->signa4->CurrentValue = HtmlDecode($this->signa4->CurrentValue);
		$this->signa4->EditValue = $this->signa4->CurrentValue;
		$this->signa4->PlaceHolder = RemoveHtml($this->signa4->caption());

		// jobt4
		$this->jobt4->EditAttrs["class"] = "form-control";
		$this->jobt4->EditCustomAttributes = "";
		if (!$this->jobt4->Raw)
			$this->jobt4->CurrentValue = HtmlDecode($this->jobt4->CurrentValue);
		$this->jobt4->EditValue = $this->jobt4->CurrentValue;
		$this->jobt4->PlaceHolder = RemoveHtml($this->jobt4->caption());

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
					$doc->exportCaption($this->templatefile);
					$doc->exportCaption($this->transactionno);
					$doc->exportCaption($this->transactiondate);
					$doc->exportCaption($this->handedoverto);
					$doc->exportCaption($this->hoto);
					$doc->exportCaption($this->departmentto);
					$doc->exportCaption($this->deptto);
					$doc->exportCaption($this->handedoverby);
					$doc->exportCaption($this->hoby);
					$doc->exportCaption($this->departmentby);
					$doc->exportCaption($this->deptby);
					$doc->exportCaption($this->sign1);
					$doc->exportCaption($this->signa1);
					$doc->exportCaption($this->jobt1);
					$doc->exportCaption($this->sign2);
					$doc->exportCaption($this->signa2);
					$doc->exportCaption($this->jobt2);
					$doc->exportCaption($this->sign3);
					$doc->exportCaption($this->signa3);
					$doc->exportCaption($this->jobt3);
					$doc->exportCaption($this->sign4);
					$doc->exportCaption($this->signa4);
					$doc->exportCaption($this->jobt4);
					$doc->exportCaption($this->hodetail_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->code);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->department_id);
					$doc->exportCaption($this->asset_dept);
					$doc->exportCaption($this->procurementdate);
					$doc->exportCaption($this->procurementcurrentcost);
					$doc->exportCaption($this->remarks);
				} else {
					$doc->exportCaption($this->id);
					$doc->exportCaption($this->property_id);
					$doc->exportCaption($this->property);
					$doc->exportCaption($this->templatefile);
					$doc->exportCaption($this->transactionno);
					$doc->exportCaption($this->transactiondate);
					$doc->exportCaption($this->handedoverto);
					$doc->exportCaption($this->hoto);
					$doc->exportCaption($this->departmentto);
					$doc->exportCaption($this->deptto);
					$doc->exportCaption($this->handedoverby);
					$doc->exportCaption($this->hoby);
					$doc->exportCaption($this->departmentby);
					$doc->exportCaption($this->deptby);
					$doc->exportCaption($this->sign1);
					$doc->exportCaption($this->signa1);
					$doc->exportCaption($this->jobt1);
					$doc->exportCaption($this->sign2);
					$doc->exportCaption($this->signa2);
					$doc->exportCaption($this->jobt2);
					$doc->exportCaption($this->sign3);
					$doc->exportCaption($this->signa3);
					$doc->exportCaption($this->jobt3);
					$doc->exportCaption($this->sign4);
					$doc->exportCaption($this->signa4);
					$doc->exportCaption($this->jobt4);
					$doc->exportCaption($this->hodetail_id);
					$doc->exportCaption($this->asset_id);
					$doc->exportCaption($this->code);
					$doc->exportCaption($this->description);
					$doc->exportCaption($this->department_id);
					$doc->exportCaption($this->asset_dept);
					$doc->exportCaption($this->procurementdate);
					$doc->exportCaption($this->procurementcurrentcost);
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
						$doc->exportField($this->templatefile);
						$doc->exportField($this->transactionno);
						$doc->exportField($this->transactiondate);
						$doc->exportField($this->handedoverto);
						$doc->exportField($this->hoto);
						$doc->exportField($this->departmentto);
						$doc->exportField($this->deptto);
						$doc->exportField($this->handedoverby);
						$doc->exportField($this->hoby);
						$doc->exportField($this->departmentby);
						$doc->exportField($this->deptby);
						$doc->exportField($this->sign1);
						$doc->exportField($this->signa1);
						$doc->exportField($this->jobt1);
						$doc->exportField($this->sign2);
						$doc->exportField($this->signa2);
						$doc->exportField($this->jobt2);
						$doc->exportField($this->sign3);
						$doc->exportField($this->signa3);
						$doc->exportField($this->jobt3);
						$doc->exportField($this->sign4);
						$doc->exportField($this->signa4);
						$doc->exportField($this->jobt4);
						$doc->exportField($this->hodetail_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->code);
						$doc->exportField($this->description);
						$doc->exportField($this->department_id);
						$doc->exportField($this->asset_dept);
						$doc->exportField($this->procurementdate);
						$doc->exportField($this->procurementcurrentcost);
						$doc->exportField($this->remarks);
					} else {
						$doc->exportField($this->id);
						$doc->exportField($this->property_id);
						$doc->exportField($this->property);
						$doc->exportField($this->templatefile);
						$doc->exportField($this->transactionno);
						$doc->exportField($this->transactiondate);
						$doc->exportField($this->handedoverto);
						$doc->exportField($this->hoto);
						$doc->exportField($this->departmentto);
						$doc->exportField($this->deptto);
						$doc->exportField($this->handedoverby);
						$doc->exportField($this->hoby);
						$doc->exportField($this->departmentby);
						$doc->exportField($this->deptby);
						$doc->exportField($this->sign1);
						$doc->exportField($this->signa1);
						$doc->exportField($this->jobt1);
						$doc->exportField($this->sign2);
						$doc->exportField($this->signa2);
						$doc->exportField($this->jobt2);
						$doc->exportField($this->sign3);
						$doc->exportField($this->signa3);
						$doc->exportField($this->jobt3);
						$doc->exportField($this->sign4);
						$doc->exportField($this->signa4);
						$doc->exportField($this->jobt4);
						$doc->exportField($this->hodetail_id);
						$doc->exportField($this->asset_id);
						$doc->exportField($this->code);
						$doc->exportField($this->description);
						$doc->exportField($this->department_id);
						$doc->exportField($this->asset_dept);
						$doc->exportField($this->procurementdate);
						$doc->exportField($this->procurementcurrentcost);
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