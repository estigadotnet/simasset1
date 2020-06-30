<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class t101_ho_head_search extends t101_ho_head
{

	// Page ID
	public $PageID = "search";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 't101_ho_head';

	// Page object name
	public $PageObjName = "t101_ho_head_search";

	// Audit Trail
	public $AuditTrailOnAdd = TRUE;
	public $AuditTrailOnEdit = TRUE;
	public $AuditTrailOnDelete = TRUE;
	public $AuditTrailOnView = FALSE;
	public $AuditTrailOnViewData = FALSE;
	public $AuditTrailOnSearch = FALSE;

	// Page headings
	public $Heading = "";
	public $Subheading = "";
	public $PageHeader;
	public $PageFooter;

	// Token
	public $Token = "";
	public $TokenTimeout = 0;
	public $CheckToken;

	// Page heading
	public function pageHeading()
	{
		global $Language;
		if ($this->Heading != "")
			return $this->Heading;
		if (method_exists($this, "tableCaption"))
			return $this->tableCaption();
		return "";
	}

	// Page subheading
	public function pageSubheading()
	{
		global $Language;
		if ($this->Subheading != "")
			return $this->Subheading;
		if ($this->TableName)
			return $Language->phrase($this->PageID);
		return "";
	}

	// Page name
	public function pageName()
	{
		return CurrentPageName();
	}

	// Page URL
	public function pageUrl()
	{
		$url = CurrentPageName() . "?";
		if ($this->UseTokenInUrl)
			$url .= "t=" . $this->TableVar . "&"; // Add page token
		return $url;
	}

	// Messages
	private $_message = "";
	private $_failureMessage = "";
	private $_successMessage = "";
	private $_warningMessage = "";

	// Get message
	public function getMessage()
	{
		return isset($_SESSION[SESSION_MESSAGE]) ? $_SESSION[SESSION_MESSAGE] : $this->_message;
	}

	// Set message
	public function setMessage($v)
	{
		AddMessage($this->_message, $v);
		$_SESSION[SESSION_MESSAGE] = $this->_message;
	}

	// Get failure message
	public function getFailureMessage()
	{
		return isset($_SESSION[SESSION_FAILURE_MESSAGE]) ? $_SESSION[SESSION_FAILURE_MESSAGE] : $this->_failureMessage;
	}

	// Set failure message
	public function setFailureMessage($v)
	{
		AddMessage($this->_failureMessage, $v);
		$_SESSION[SESSION_FAILURE_MESSAGE] = $this->_failureMessage;
	}

	// Get success message
	public function getSuccessMessage()
	{
		return isset($_SESSION[SESSION_SUCCESS_MESSAGE]) ? $_SESSION[SESSION_SUCCESS_MESSAGE] : $this->_successMessage;
	}

	// Set success message
	public function setSuccessMessage($v)
	{
		AddMessage($this->_successMessage, $v);
		$_SESSION[SESSION_SUCCESS_MESSAGE] = $this->_successMessage;
	}

	// Get warning message
	public function getWarningMessage()
	{
		return isset($_SESSION[SESSION_WARNING_MESSAGE]) ? $_SESSION[SESSION_WARNING_MESSAGE] : $this->_warningMessage;
	}

	// Set warning message
	public function setWarningMessage($v)
	{
		AddMessage($this->_warningMessage, $v);
		$_SESSION[SESSION_WARNING_MESSAGE] = $this->_warningMessage;
	}

	// Clear message
	public function clearMessage()
	{
		$this->_message = "";
		$_SESSION[SESSION_MESSAGE] = "";
	}

	// Clear failure message
	public function clearFailureMessage()
	{
		$this->_failureMessage = "";
		$_SESSION[SESSION_FAILURE_MESSAGE] = "";
	}

	// Clear success message
	public function clearSuccessMessage()
	{
		$this->_successMessage = "";
		$_SESSION[SESSION_SUCCESS_MESSAGE] = "";
	}

	// Clear warning message
	public function clearWarningMessage()
	{
		$this->_warningMessage = "";
		$_SESSION[SESSION_WARNING_MESSAGE] = "";
	}

	// Clear messages
	public function clearMessages()
	{
		$this->clearMessage();
		$this->clearFailureMessage();
		$this->clearSuccessMessage();
		$this->clearWarningMessage();
	}

	// Show message
	public function showMessage()
	{
		$hidden = TRUE;
		$html = "";

		// Message
		$message = $this->getMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($message, "");
		if ($message != "") { // Message in Session, display
			if (!$hidden)
				$message = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $message;
			$html .= '<div class="alert alert-info alert-dismissible ew-info"><i class="icon fas fa-info"></i>' . $message . '</div>';
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($warningMessage, "warning");
		if ($warningMessage != "") { // Message in Session, display
			if (!$hidden)
				$warningMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $warningMessage;
			$html .= '<div class="alert alert-warning alert-dismissible ew-warning"><i class="icon fas fa-exclamation"></i>' . $warningMessage . '</div>';
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($successMessage, "success");
		if ($successMessage != "") { // Message in Session, display
			if (!$hidden)
				$successMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $successMessage;
			$html .= '<div class="alert alert-success alert-dismissible ew-success"><i class="icon fas fa-check"></i>' . $successMessage . '</div>';
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$errorMessage = $this->getFailureMessage();
		if (method_exists($this, "Message_Showing"))
			$this->Message_Showing($errorMessage, "failure");
		if ($errorMessage != "") { // Message in Session, display
			if (!$hidden)
				$errorMessage = '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' . $errorMessage;
			$html .= '<div class="alert alert-danger alert-dismissible ew-error"><i class="icon fas fa-ban"></i>' . $errorMessage . '</div>';
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		echo '<div class="ew-message-dialog' . (($hidden) ? ' d-none' : "") . '">' . $html . '</div>';
	}

	// Get message as array
	public function getMessages()
	{
		$ar = [];

		// Message
		$message = $this->getMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($message, "");

		if ($message != "") { // Message in Session, display
			$ar["message"] = $message;
			$_SESSION[SESSION_MESSAGE] = ""; // Clear message in Session
		}

		// Warning message
		$warningMessage = $this->getWarningMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($warningMessage, "warning");

		if ($warningMessage != "") { // Message in Session, display
			$ar["warningMessage"] = $warningMessage;
			$_SESSION[SESSION_WARNING_MESSAGE] = ""; // Clear message in Session
		}

		// Success message
		$successMessage = $this->getSuccessMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($successMessage, "success");

		if ($successMessage != "") { // Message in Session, display
			$ar["successMessage"] = $successMessage;
			$_SESSION[SESSION_SUCCESS_MESSAGE] = ""; // Clear message in Session
		}

		// Failure message
		$failureMessage = $this->getFailureMessage();

		//if (method_exists($this, "Message_Showing"))
		//	$this->Message_Showing($failureMessage, "failure");

		if ($failureMessage != "") { // Message in Session, display
			$ar["failureMessage"] = $failureMessage;
			$_SESSION[SESSION_FAILURE_MESSAGE] = ""; // Clear message in Session
		}
		return $ar;
	}

	// Show Page Header
	public function showPageHeader()
	{
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		if ($header != "") { // Header exists, display
			echo '<p id="ew-page-header">' . $header . '</p>';
		}
	}

	// Show Page Footer
	public function showPageFooter()
	{
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		if ($footer != "") { // Footer exists, display
			echo '<p id="ew-page-footer">' . $footer . '</p>';
		}
	}

	// Validate page request
	protected function isPageRequest()
	{
		global $CurrentForm;
		if ($this->UseTokenInUrl) {
			if ($CurrentForm)
				return ($this->TableVar == $CurrentForm->getValue("t"));
			if (Get("t") !== NULL)
				return ($this->TableVar == Get("t"));
		}
		return TRUE;
	}

	// Valid Post
	protected function validPost()
	{
		if (!$this->CheckToken || !IsPost() || IsApi())
			return TRUE;
		if (Post(Config("TOKEN_NAME")) === NULL)
			return FALSE;
		$fn = Config("CHECK_TOKEN_FUNC");
		if (is_callable($fn))
			return $fn(Post(Config("TOKEN_NAME")), $this->TokenTimeout);
		return FALSE;
	}

	// Create Token
	public function createToken()
	{
		global $CurrentToken;
		$fn = Config("CREATE_TOKEN_FUNC"); // Always create token, required by API file/lookup request
		if ($this->Token == "" && is_callable($fn)) // Create token
			$this->Token = $fn();
		$CurrentToken = $this->Token; // Save to global variable
	}

	// Constructor
	public function __construct()
	{
		global $Language, $DashboardReport;
		global $UserTable;

		// Check token
		$this->CheckToken = Config("CHECK_TOKEN");

		// Initialize
		$GLOBALS["Page"] = &$this;
		$this->TokenTimeout = SessionTimeoutTime();

		// Language object
		if (!isset($Language))
			$Language = new Language();

		// Parent constuctor
		parent::__construct();

		// Table object (t101_ho_head)
		if (!isset($GLOBALS["t101_ho_head"]) || get_class($GLOBALS["t101_ho_head"]) == PROJECT_NAMESPACE . "t101_ho_head") {
			$GLOBALS["t101_ho_head"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t101_ho_head"];
		}

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'search');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't101_ho_head');

		// Start timer
		if (!isset($GLOBALS["DebugTimer"]))
			$GLOBALS["DebugTimer"] = new Timer();

		// Debug message
		LoadDebugMessage();

		// Open connection
		if (!isset($GLOBALS["Conn"]))
			$GLOBALS["Conn"] = $this->getConnection();

		// User table object (t201_users)
		$UserTable = $UserTable ?: new t201_users();
	}

	// Terminate page
	public function terminate($url = "")
	{
		global $ExportFileName, $TempImages, $DashboardReport;

		// Page Unload event
		$this->Page_Unload();

		// Global Page Unloaded event (in userfn*.php)
		Page_Unloaded();

		// Export
		global $t101_ho_head;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t101_ho_head);
				$doc->Text = @$content;
				if ($this->isExport("email"))
					echo $this->exportEmail($doc->Text);
				else
					$doc->export();
				DeleteTempImages(); // Delete temp images
				exit();
			}
		}
		if (!IsApi())
			$this->Page_Redirecting($url);

		// Close connection
		CloseConnections();

		// Return for API
		if (IsApi()) {
			$res = $url === TRUE;
			if (!$res) // Show error
				WriteJson(array_merge(["success" => FALSE], $this->getMessages()));
			return;
		}

		// Go to URL if specified
		if ($url != "") {
			if (!Config("DEBUG") && ob_get_length())
				ob_end_clean();

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t101_ho_headview.php")
						$row["view"] = "1";
				} else { // List page should not be shown as modal => error
					$row["error"] = $this->getFailureMessage();
					$this->clearFailureMessage();
				}
				WriteJson($row);
			} else {
				SaveDebugMessage();
				AddHeader("Location", $url);
			}
		}
		exit();
	}

	// Get records from recordset
	protected function getRecordsFromRecordset($rs, $current = FALSE)
	{
		$rows = [];
		if (is_object($rs)) { // Recordset
			while ($rs && !$rs->EOF) {
				$this->loadRowValues($rs); // Set up DbValue/CurrentValue
				$row = $this->getRecordFromArray($rs->fields);
				if ($current)
					return $row;
				else
					$rows[] = $row;
				$rs->moveNext();
			}
		} elseif (is_array($rs)) {
			foreach ($rs as $ar) {
				$row = $this->getRecordFromArray($ar);
				if ($current)
					return $row;
				else
					$rows[] = $row;
			}
		}
		return $rows;
	}

	// Get record from array
	protected function getRecordFromArray($ar)
	{
		$row = [];
		if (is_array($ar)) {
			foreach ($ar as $fldname => $val) {
				if (array_key_exists($fldname, $this->fields) && ($this->fields[$fldname]->Visible || $this->fields[$fldname]->IsPrimaryKey)) { // Primary key or Visible
					$fld = &$this->fields[$fldname];
					if ($fld->HtmlTag == "FILE") { // Upload field
						if (EmptyValue($val)) {
							$row[$fldname] = NULL;
						} else {
							if ($fld->DataType == DATATYPE_BLOB) {
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									Config("API_FIELD_NAME") . "=" . $fld->Param . "&" .
									Config("API_KEY_NAME") . "=" . rawurlencode($this->getRecordKeyValue($ar)))); //*** need to add this? API may not be in the same folder
								$row[$fldname] = ["type" => ContentType($val), "url" => $url, "name" => $fld->Param . ContentExtension($val)];
							} elseif (!$fld->UploadMultiple || !ContainsString($val, Config("MULTIPLE_UPLOAD_SEPARATOR"))) { // Single file
								$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
									Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
									"fn=" . Encrypt($fld->physicalUploadPath() . $val)));
								$row[$fldname] = ["type" => MimeContentType($val), "url" => $url, "name" => $val];
							} else { // Multiple files
								$files = explode(Config("MULTIPLE_UPLOAD_SEPARATOR"), $val);
								$ar = [];
								foreach ($files as $file) {
									$url = FullUrl(GetApiUrl(Config("API_FILE_ACTION"),
										Config("API_OBJECT_NAME") . "=" . $fld->TableVar . "&" .
										"fn=" . Encrypt($fld->physicalUploadPath() . $file)));
									if (!EmptyValue($file))
										$ar[] = ["type" => MimeContentType($file), "url" => $url, "name" => $file];
								}
								$row[$fldname] = $ar;
							}
						}
					} else {
						$row[$fldname] = $val;
					}
				}
			}
		}
		return $row;
	}

	// Get record key value from array
	protected function getRecordKeyValue($ar)
	{
		$key = "";
		if (is_array($ar)) {
			$key .= @$ar['id'];
		}
		return $key;
	}

	/**
	 * Hide fields for add/edit
	 *
	 * @return void
	 */
	protected function hideFieldsForAddEdit()
	{
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->id->Visible = FALSE;
	}

	// Lookup data
	public function lookup()
	{
		global $Language, $Security;
		if (!isset($Language))
			$Language = new Language(Config("LANGUAGE_FOLDER"), Post("language", ""));

		// Set up API request
		if (!ValidApiRequest())
			return FALSE;
		$this->setupApiSecurity();

		// Get lookup object
		$fieldName = Post("field");
		if (!array_key_exists($fieldName, $this->fields))
			return FALSE;
		$lookupField = $this->fields[$fieldName];
		$lookup = $lookupField->Lookup;
		if ($lookup === NULL)
			return FALSE;
		$tbl = $lookup->getTable();
		if (!$Security->allowLookup(Config("PROJECT_ID") . $tbl->TableName)) // Lookup permission
			return FALSE;

		// Get lookup parameters
		$lookupType = Post("ajax", "unknown");
		$pageSize = -1;
		$offset = -1;
		$searchValue = "";
		if (SameText($lookupType, "modal")) {
			$searchValue = Post("sv", "");
			$pageSize = Post("recperpage", 10);
			$offset = Post("start", 0);
		} elseif (SameText($lookupType, "autosuggest")) {
			$searchValue = Param("q", "");
			$pageSize = Param("n", -1);
			$pageSize = is_numeric($pageSize) ? (int)$pageSize : -1;
			if ($pageSize <= 0)
				$pageSize = Config("AUTO_SUGGEST_MAX_ENTRIES");
			$start = Param("start", -1);
			$start = is_numeric($start) ? (int)$start : -1;
			$page = Param("page", -1);
			$page = is_numeric($page) ? (int)$page : -1;
			$offset = $start >= 0 ? $start : ($page > 0 && $pageSize > 0 ? ($page - 1) * $pageSize : 0);
		}
		$userSelect = Decrypt(Post("s", ""));
		$userFilter = Decrypt(Post("f", ""));
		$userOrderBy = Decrypt(Post("o", ""));
		$keys = Post("keys");
		$lookup->LookupType = $lookupType; // Lookup type
		if ($keys !== NULL) { // Selected records from modal
			if (is_array($keys))
				$keys = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $keys);
			$lookup->FilterFields = []; // Skip parent fields if any
			$lookup->FilterValues[] = $keys; // Lookup values
			$pageSize = -1; // Show all records
		} else { // Lookup values
			$lookup->FilterValues[] = Post("v0", Post("lookupValue", ""));
		}
		$cnt = is_array($lookup->FilterFields) ? count($lookup->FilterFields) : 0;
		for ($i = 1; $i <= $cnt; $i++)
			$lookup->FilterValues[] = Post("v" . $i, "");
		$lookup->SearchValue = $searchValue;
		$lookup->PageSize = $pageSize;
		$lookup->Offset = $offset;
		if ($userSelect != "")
			$lookup->UserSelect = $userSelect;
		if ($userFilter != "")
			$lookup->UserFilter = $userFilter;
		if ($userOrderBy != "")
			$lookup->UserOrderBy = $userOrderBy;
		$lookup->toJson($this); // Use settings from current page
	}

	// Set up API security
	public function setupApiSecurity()
	{
		global $Security;

		// Setup security for API request
		if ($Security->isLoggedIn()) $Security->TablePermission_Loading();
		$Security->loadCurrentUserLevel(Config("PROJECT_ID") . $this->TableName);
		if ($Security->isLoggedIn()) $Security->TablePermission_Loaded();
		$Security->UserID_Loading();
		$Security->loadUserID();
		$Security->UserID_Loaded();
	}
	public $FormClassName = "ew-horizontal ew-form ew-search-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$SearchError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
		} else {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canSearch()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t101_ho_headlist.php"));
				else
					$this->terminate(GetUrl("login.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Create form object
		$CurrentForm = new HttpForm();
		$this->CurrentAction = Param("action"); // Set up current action
		$this->id->Visible = FALSE;
		$this->property_id->setVisibility();
		$this->TransactionNo->setVisibility();
		$this->TransactionDate->setVisibility();
		$this->HandedOverTo->setVisibility();
		$this->DepartmentTo->setVisibility();
		$this->HandedOverBy->setVisibility();
		$this->DepartmentBy->setVisibility();
		$this->Sign1->setVisibility();
		$this->Sign2->setVisibility();
		$this->Sign3->setVisibility();
		$this->Sign4->setVisibility();
		$this->hideFieldsForAddEdit();

		// Do not use lookup cache
		$this->setUseLookupCache(FALSE);

		// Global Page Loading event (in userfn*.php)
		Page_Loading();

		// Page Load event
		$this->Page_Load();

		// Check token
		if (!$this->validPost()) {
			Write($Language->phrase("InvalidPostRequest"));
			$this->terminate();
		}

		// Create Token
		$this->createToken();

		// Set up lookup cache
		$this->setupLookupOptions($this->property_id);
		$this->setupLookupOptions($this->HandedOverTo);
		$this->setupLookupOptions($this->DepartmentTo);
		$this->setupLookupOptions($this->HandedOverBy);
		$this->setupLookupOptions($this->DepartmentBy);
		$this->setupLookupOptions($this->Sign1);
		$this->setupLookupOptions($this->Sign2);
		$this->setupLookupOptions($this->Sign3);
		$this->setupLookupOptions($this->Sign4);

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		if ($this->isPageRequest()) { // Validate request

			// Get action
			$this->CurrentAction = Post("action");
			if ($this->isSearch()) {

				// Build search string for advanced search, remove blank field
				$this->loadSearchValues(); // Get search values
				if ($this->validateSearch()) {
					$srchStr = $this->buildAdvancedSearch();
				} else {
					$srchStr = "";
					$this->setFailureMessage($SearchError);
				}
				if ($srchStr != "") {
					$srchStr = $this->getUrlParm($srchStr);
					$srchStr = "t101_ho_headlist.php" . "?" . $srchStr;
					$this->terminate($srchStr); // Go to list page
				}
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

		// Render row for search
		$this->RowType = ROWTYPE_SEARCH;
		$this->resetAttributes();
		$this->renderRow();
	}

	// Build advanced search
	protected function buildAdvancedSearch()
	{
		$srchUrl = "";
		$this->buildSearchUrl($srchUrl, $this->property_id); // property_id
		$this->buildSearchUrl($srchUrl, $this->TransactionNo); // TransactionNo
		$this->buildSearchUrl($srchUrl, $this->TransactionDate); // TransactionDate
		$this->buildSearchUrl($srchUrl, $this->HandedOverTo); // HandedOverTo
		$this->buildSearchUrl($srchUrl, $this->DepartmentTo); // DepartmentTo
		$this->buildSearchUrl($srchUrl, $this->HandedOverBy); // HandedOverBy
		$this->buildSearchUrl($srchUrl, $this->DepartmentBy); // DepartmentBy
		$this->buildSearchUrl($srchUrl, $this->Sign1); // Sign1
		$this->buildSearchUrl($srchUrl, $this->Sign2); // Sign2
		$this->buildSearchUrl($srchUrl, $this->Sign3); // Sign3
		$this->buildSearchUrl($srchUrl, $this->Sign4); // Sign4
		if ($srchUrl != "")
			$srchUrl .= "&";
		$srchUrl .= "cmd=search";
		return $srchUrl;
	}

	// Build search URL
	protected function buildSearchUrl(&$url, &$fld, $oprOnly = FALSE)
	{
		global $CurrentForm;
		$wrk = "";
		$fldParm = $fld->Param;
		$fldVal = $CurrentForm->getValue("x_$fldParm");
		$fldOpr = $CurrentForm->getValue("z_$fldParm");
		$fldCond = $CurrentForm->getValue("v_$fldParm");
		$fldVal2 = $CurrentForm->getValue("y_$fldParm");
		$fldOpr2 = $CurrentForm->getValue("w_$fldParm");
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		$fldDataType = ($fld->IsVirtual) ? DATATYPE_STRING : $fld->DataType;
		if ($fldOpr == "BETWEEN") {
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal) && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal != "" && $fldVal2 != "" && $isValidValue) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			}
		} else {
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal));
			if ($fldVal != "" && $isValidValue && IsValidOperator($fldOpr, $fldDataType)) {
				$wrk = "x_" . $fldParm . "=" . urlencode($fldVal) .
					"&z_" . $fldParm . "=" . urlencode($fldOpr);
			} elseif ($fldOpr == "IS NULL" || $fldOpr == "IS NOT NULL" || ($fldOpr != "" && $oprOnly && IsValidOperator($fldOpr, $fldDataType))) {
				$wrk = "z_" . $fldParm . "=" . urlencode($fldOpr);
			}
			$isValidValue = ($fldDataType != DATATYPE_NUMBER) ||
				($fldDataType == DATATYPE_NUMBER && $this->searchValueIsNumeric($fld, $fldVal2));
			if ($fldVal2 != "" && $isValidValue && IsValidOperator($fldOpr2, $fldDataType)) {
				if ($wrk != "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "y_" . $fldParm . "=" . urlencode($fldVal2) .
					"&w_" . $fldParm . "=" . urlencode($fldOpr2);
			} elseif ($fldOpr2 == "IS NULL" || $fldOpr2 == "IS NOT NULL" || ($fldOpr2 != "" && $oprOnly && IsValidOperator($fldOpr2, $fldDataType))) {
				if ($wrk != "")
					$wrk .= "&v_" . $fldParm . "=" . urlencode($fldCond) . "&";
				$wrk .= "w_" . $fldParm . "=" . urlencode($fldOpr2);
			}
		}
		if ($wrk != "") {
			if ($url != "")
				$url .= "&";
			$url .= $wrk;
		}
	}
	protected function searchValueIsNumeric($fld, $value)
	{
		if (IsFloatFormat($fld->Type))
			$value = ConvertToFloatString($value);
		return is_numeric($value);
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;
		if ($this->property_id->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TransactionNo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->TransactionDate->AdvancedSearch->post())
			$got = TRUE;
		if ($this->HandedOverTo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DepartmentTo->AdvancedSearch->post())
			$got = TRUE;
		if ($this->HandedOverBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->DepartmentBy->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Sign1->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Sign2->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Sign3->AdvancedSearch->post())
			$got = TRUE;
		if ($this->Sign4->AdvancedSearch->post())
			$got = TRUE;
		return $got;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		// Call Row_Rendering event

		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		} elseif ($this->RowType == ROWTYPE_SEARCH) { // Search row

			// property_id
			$this->property_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->property_id->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->property_id->AdvancedSearch->ViewValue = $this->property_id->lookupCacheOption($curVal);
			else
				$this->property_id->AdvancedSearch->ViewValue = $this->property_id->Lookup !== NULL && is_array($this->property_id->Lookup->Options) ? $curVal : NULL;
			if ($this->property_id->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->property_id->EditValue = array_values($this->property_id->Lookup->Options);
				if ($this->property_id->AdvancedSearch->ViewValue == "")
					$this->property_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->property_id->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->property_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->property_id->AdvancedSearch->ViewValue = $this->property_id->displayValue($arwrk);
				} else {
					$this->property_id->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->property_id->EditValue = $arwrk;
			}

			// TransactionNo
			$this->TransactionNo->EditAttrs["class"] = "form-control";
			$this->TransactionNo->EditCustomAttributes = "";
			if (!$this->TransactionNo->Raw)
				$this->TransactionNo->AdvancedSearch->SearchValue = HtmlDecode($this->TransactionNo->AdvancedSearch->SearchValue);
			$this->TransactionNo->EditValue = HtmlEncode($this->TransactionNo->AdvancedSearch->SearchValue);
			$this->TransactionNo->PlaceHolder = RemoveHtml($this->TransactionNo->caption());

			// TransactionDate
			$this->TransactionDate->EditAttrs["class"] = "form-control";
			$this->TransactionDate->EditCustomAttributes = "";
			$this->TransactionDate->EditValue = HtmlEncode(FormatDateTime(UnFormatDateTime($this->TransactionDate->AdvancedSearch->SearchValue, 7), 7));
			$this->TransactionDate->PlaceHolder = RemoveHtml($this->TransactionDate->caption());

			// HandedOverTo
			$this->HandedOverTo->EditCustomAttributes = "";
			$curVal = trim(strval($this->HandedOverTo->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->HandedOverTo->AdvancedSearch->ViewValue = $this->HandedOverTo->lookupCacheOption($curVal);
			else
				$this->HandedOverTo->AdvancedSearch->ViewValue = $this->HandedOverTo->Lookup !== NULL && is_array($this->HandedOverTo->Lookup->Options) ? $curVal : NULL;
			if ($this->HandedOverTo->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->HandedOverTo->EditValue = array_values($this->HandedOverTo->Lookup->Options);
				if ($this->HandedOverTo->AdvancedSearch->ViewValue == "")
					$this->HandedOverTo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HandedOverTo->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HandedOverTo->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->HandedOverTo->AdvancedSearch->ViewValue = $this->HandedOverTo->displayValue($arwrk);
				} else {
					$this->HandedOverTo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->HandedOverTo->EditValue = $arwrk;
			}

			// DepartmentTo
			$this->DepartmentTo->EditCustomAttributes = "";
			$curVal = trim(strval($this->DepartmentTo->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->DepartmentTo->AdvancedSearch->ViewValue = $this->DepartmentTo->lookupCacheOption($curVal);
			else
				$this->DepartmentTo->AdvancedSearch->ViewValue = $this->DepartmentTo->Lookup !== NULL && is_array($this->DepartmentTo->Lookup->Options) ? $curVal : NULL;
			if ($this->DepartmentTo->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->DepartmentTo->EditValue = array_values($this->DepartmentTo->Lookup->Options);
				if ($this->DepartmentTo->AdvancedSearch->ViewValue == "")
					$this->DepartmentTo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->DepartmentTo->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->DepartmentTo->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DepartmentTo->AdvancedSearch->ViewValue = $this->DepartmentTo->displayValue($arwrk);
				} else {
					$this->DepartmentTo->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->DepartmentTo->EditValue = $arwrk;
			}

			// HandedOverBy
			$this->HandedOverBy->EditCustomAttributes = "";
			$curVal = trim(strval($this->HandedOverBy->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->HandedOverBy->AdvancedSearch->ViewValue = $this->HandedOverBy->lookupCacheOption($curVal);
			else
				$this->HandedOverBy->AdvancedSearch->ViewValue = $this->HandedOverBy->Lookup !== NULL && is_array($this->HandedOverBy->Lookup->Options) ? $curVal : NULL;
			if ($this->HandedOverBy->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->HandedOverBy->EditValue = array_values($this->HandedOverBy->Lookup->Options);
				if ($this->HandedOverBy->AdvancedSearch->ViewValue == "")
					$this->HandedOverBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HandedOverBy->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HandedOverBy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->HandedOverBy->AdvancedSearch->ViewValue = $this->HandedOverBy->displayValue($arwrk);
				} else {
					$this->HandedOverBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->HandedOverBy->EditValue = $arwrk;
			}

			// DepartmentBy
			$this->DepartmentBy->EditCustomAttributes = "";
			$curVal = trim(strval($this->DepartmentBy->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->DepartmentBy->AdvancedSearch->ViewValue = $this->DepartmentBy->lookupCacheOption($curVal);
			else
				$this->DepartmentBy->AdvancedSearch->ViewValue = $this->DepartmentBy->Lookup !== NULL && is_array($this->DepartmentBy->Lookup->Options) ? $curVal : NULL;
			if ($this->DepartmentBy->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->DepartmentBy->EditValue = array_values($this->DepartmentBy->Lookup->Options);
				if ($this->DepartmentBy->AdvancedSearch->ViewValue == "")
					$this->DepartmentBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->DepartmentBy->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->DepartmentBy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DepartmentBy->AdvancedSearch->ViewValue = $this->DepartmentBy->displayValue($arwrk);
				} else {
					$this->DepartmentBy->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->DepartmentBy->EditValue = $arwrk;
			}

			// Sign1
			$this->Sign1->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign1->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Sign1->AdvancedSearch->ViewValue = $this->Sign1->lookupCacheOption($curVal);
			else
				$this->Sign1->AdvancedSearch->ViewValue = $this->Sign1->Lookup !== NULL && is_array($this->Sign1->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign1->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Sign1->EditValue = array_values($this->Sign1->Lookup->Options);
				if ($this->Sign1->AdvancedSearch->ViewValue == "")
					$this->Sign1->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign1->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign1->AdvancedSearch->ViewValue = $this->Sign1->displayValue($arwrk);
				} else {
					$this->Sign1->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign1->EditValue = $arwrk;
			}

			// Sign2
			$this->Sign2->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign2->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Sign2->AdvancedSearch->ViewValue = $this->Sign2->lookupCacheOption($curVal);
			else
				$this->Sign2->AdvancedSearch->ViewValue = $this->Sign2->Lookup !== NULL && is_array($this->Sign2->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign2->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Sign2->EditValue = array_values($this->Sign2->Lookup->Options);
				if ($this->Sign2->AdvancedSearch->ViewValue == "")
					$this->Sign2->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign2->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign2->AdvancedSearch->ViewValue = $this->Sign2->displayValue($arwrk);
				} else {
					$this->Sign2->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign2->EditValue = $arwrk;
			}

			// Sign3
			$this->Sign3->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign3->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Sign3->AdvancedSearch->ViewValue = $this->Sign3->lookupCacheOption($curVal);
			else
				$this->Sign3->AdvancedSearch->ViewValue = $this->Sign3->Lookup !== NULL && is_array($this->Sign3->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign3->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Sign3->EditValue = array_values($this->Sign3->Lookup->Options);
				if ($this->Sign3->AdvancedSearch->ViewValue == "")
					$this->Sign3->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign3->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign3->AdvancedSearch->ViewValue = $this->Sign3->displayValue($arwrk);
				} else {
					$this->Sign3->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign3->EditValue = $arwrk;
			}

			// Sign4
			$this->Sign4->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign4->AdvancedSearch->SearchValue));
			if ($curVal != "")
				$this->Sign4->AdvancedSearch->ViewValue = $this->Sign4->lookupCacheOption($curVal);
			else
				$this->Sign4->AdvancedSearch->ViewValue = $this->Sign4->Lookup !== NULL && is_array($this->Sign4->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign4->AdvancedSearch->ViewValue !== NULL) { // Load from cache
				$this->Sign4->EditValue = array_values($this->Sign4->Lookup->Options);
				if ($this->Sign4->AdvancedSearch->ViewValue == "")
					$this->Sign4->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign4->AdvancedSearch->SearchValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign4->AdvancedSearch->ViewValue = $this->Sign4->displayValue($arwrk);
				} else {
					$this->Sign4->AdvancedSearch->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign4->EditValue = $arwrk;
			}
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Validate search
	protected function validateSearch()
	{
		global $SearchError;

		// Initialize
		$SearchError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return TRUE;
		if (!CheckEuroDate($this->TransactionDate->AdvancedSearch->SearchValue)) {
			AddMessage($SearchError, $this->TransactionDate->errorMessage());
		}

		// Return validate result
		$validateSearch = ($SearchError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateSearch = $validateSearch && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($SearchError, $formCustomError);
		}
		return $validateSearch;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->property_id->AdvancedSearch->load();
		$this->TransactionNo->AdvancedSearch->load();
		$this->TransactionDate->AdvancedSearch->load();
		$this->HandedOverTo->AdvancedSearch->load();
		$this->DepartmentTo->AdvancedSearch->load();
		$this->HandedOverBy->AdvancedSearch->load();
		$this->DepartmentBy->AdvancedSearch->load();
		$this->Sign1->AdvancedSearch->load();
		$this->Sign2->AdvancedSearch->load();
		$this->Sign3->AdvancedSearch->load();
		$this->Sign4->AdvancedSearch->load();
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_ho_headlist.php"), "", $this->TableVar, TRUE);
		$pageId = "search";
		$Breadcrumb->add("search", $pageId, $url);
	}

	// Setup lookup options
	public function setupLookupOptions($fld)
	{
		if ($fld->Lookup !== NULL && $fld->Lookup->Options === NULL) {

			// Get default connection and filter
			$conn = $this->getConnection();
			$lookupFilter = "";

			// No need to check any more
			$fld->Lookup->Options = [];

			// Set up lookup SQL and connection
			switch ($fld->FieldVar) {
				case "x_property_id":
					break;
				case "x_HandedOverTo":
					break;
				case "x_DepartmentTo":
					break;
				case "x_HandedOverBy":
					break;
				case "x_DepartmentBy":
					break;
				case "x_Sign1":
					break;
				case "x_Sign2":
					break;
				case "x_Sign3":
					break;
				case "x_Sign4":
					break;
				default:
					$lookupFilter = "";
					break;
			}

			// Always call to Lookup->getSql so that user can setup Lookup->Options in Lookup_Selecting server event
			$sql = $fld->Lookup->getSql(FALSE, "", $lookupFilter, $this);

			// Set up lookup cache
			if ($fld->UseLookupCache && $sql != "" && count($fld->Lookup->Options) == 0) {
				$totalCnt = $this->getRecordCount($sql, $conn);
				if ($totalCnt > $fld->LookupCacheCount) // Total count > cache count, do not cache
					return;
				$rs = $conn->execute($sql);
				$ar = [];
				while ($rs && !$rs->EOF) {
					$row = &$rs->fields;

					// Format the field values
					switch ($fld->FieldVar) {
						case "x_property_id":
							break;
						case "x_HandedOverTo":
							break;
						case "x_DepartmentTo":
							break;
						case "x_HandedOverBy":
							break;
						case "x_DepartmentBy":
							break;
						case "x_Sign1":
							break;
						case "x_Sign2":
							break;
						case "x_Sign3":
							break;
						case "x_Sign4":
							break;
					}
					$ar[strval($row[0])] = $row;
					$rs->moveNext();
				}
				if ($rs)
					$rs->close();
				$fld->Lookup->Options = $ar;
			}
		}
	}

	// Page Load event
	function Page_Load() {

		//echo "Page Load";
	}

	// Page Unload event
	function Page_Unload() {

		//echo "Page Unload";
	}

	// Page Redirecting event
	function Page_Redirecting(&$url) {

		// Example:
		//$url = "your URL";

	}

	// Message Showing event
	// $type = ''|'success'|'failure'|'warning'
	function Message_Showing(&$msg, $type) {
		if ($type == 'success') {

			//$msg = "your success message";
		} elseif ($type == 'failure') {

			//$msg = "your failure message";
		} elseif ($type == 'warning') {

			//$msg = "your warning message";
		} else {

			//$msg = "your message";
		}
	}

	// Page Render event
	function Page_Render() {

		//echo "Page Render";
	}

	// Page Data Rendering event
	function Page_DataRendering(&$header) {

		// Example:
		//$header = "your header";

	}

	// Page Data Rendered event
	function Page_DataRendered(&$footer) {

		// Example:
		//$footer = "your footer";

	}

	// Form Custom Validate event
	function Form_CustomValidate(&$customError) {

		// Return error message in CustomError
		return TRUE;
	}
} // End class
?>