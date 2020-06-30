<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class v101_ho_2_list extends v101_ho_2
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 'v101_ho_2';

	// Page object name
	public $PageObjName = "v101_ho_2_list";

	// Grid form hidden field names
	public $FormName = "fv101_ho_2list";
	public $FormActionName = "k_action";
	public $FormKeyName = "k_key";
	public $FormOldKeyName = "k_oldkey";
	public $FormBlankRowName = "k_blankrow";
	public $FormKeyCountName = "key_count";

	// Page URLs
	public $AddUrl;
	public $EditUrl;
	public $CopyUrl;
	public $DeleteUrl;
	public $ViewUrl;
	public $ListUrl;

	// Export URLs
	public $ExportPrintUrl;
	public $ExportHtmlUrl;
	public $ExportExcelUrl;
	public $ExportWordUrl;
	public $ExportXmlUrl;
	public $ExportCsvUrl;
	public $ExportPdfUrl;

	// Custom export
	public $ExportExcelCustom = FALSE;
	public $ExportWordCustom = FALSE;
	public $ExportPdfCustom = FALSE;
	public $ExportEmailCustom = FALSE;

	// Update URLs
	public $InlineAddUrl;
	public $InlineCopyUrl;
	public $InlineEditUrl;
	public $GridAddUrl;
	public $GridEditUrl;
	public $MultiDeleteUrl;
	public $MultiUpdateUrl;

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

		// Table object (v101_ho_2)
		if (!isset($GLOBALS["v101_ho_2"]) || get_class($GLOBALS["v101_ho_2"]) == PROJECT_NAMESPACE . "v101_ho_2") {
			$GLOBALS["v101_ho_2"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["v101_ho_2"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "v101_ho_2add.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "v101_ho_2delete.php";
		$this->MultiUpdateUrl = "v101_ho_2update.php";

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'v101_ho_2');

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

		// List options
		$this->ListOptions = new ListOptions();
		$this->ListOptions->TableVar = $this->TableVar;

		// Export options
		$this->ExportOptions = new ListOptions("div");
		$this->ExportOptions->TagClassName = "ew-export-option";

		// Import options
		$this->ImportOptions = new ListOptions("div");
		$this->ImportOptions->TagClassName = "ew-import-option";

		// Other options
		if (!$this->OtherOptions)
			$this->OtherOptions = new ListOptionsArray();
		$this->OtherOptions["addedit"] = new ListOptions("div");
		$this->OtherOptions["addedit"]->TagClassName = "ew-add-edit-option";
		$this->OtherOptions["detail"] = new ListOptions("div");
		$this->OtherOptions["detail"]->TagClassName = "ew-detail-option";
		$this->OtherOptions["action"] = new ListOptions("div");
		$this->OtherOptions["action"]->TagClassName = "ew-action-option";

		// Filter options
		$this->FilterOptions = new ListOptions("div");
		$this->FilterOptions->TagClassName = "ew-filter-option fv101_ho_2listsrch";

		// List actions
		$this->ListActions = new ListActions();
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
		global $v101_ho_2;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($v101_ho_2);
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
			SaveDebugMessage();
			AddHeader("Location", $url);
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
						if ($fld->DataType == DATATYPE_MEMO && $fld->MemoMaxLength > 0)
							$val = TruncateMemo($val, $fld->MemoMaxLength, $fld->TruncateMemoRemoveHtml);
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
			$key .= @$ar['id'] . Config("COMPOSITE_KEY_SEPARATOR");
			$key .= @$ar['hodetail_id'];
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
		if ($this->isAdd() || $this->isCopy() || $this->isGridAdd())
			$this->hodetail_id->Visible = FALSE;
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

	// Class variables
	public $ListOptions; // List options
	public $ExportOptions; // Export options
	public $SearchOptions; // Search options
	public $OtherOptions; // Other options
	public $FilterOptions; // Filter options
	public $ImportOptions; // Import options
	public $ListActions; // List actions
	public $SelectedCount = 0;
	public $SelectedIndex = 0;
	public $DisplayRecords = 20;
	public $StartRecord;
	public $StopRecord;
	public $TotalRecords = 0;
	public $RecordRange = 10;
	public $PageSizes = "10,20,50,-1"; // Page sizes (comma separated)
	public $DefaultSearchWhere = ""; // Default search WHERE clause
	public $SearchWhere = ""; // Search WHERE clause
	public $SearchPanelClass = "ew-search-panel collapse show"; // Search Panel class
	public $SearchRowCount = 0; // For extended search
	public $SearchColumnCount = 0; // For extended search
	public $SearchFieldsPerRow = 1; // For extended search
	public $RecordCount = 0; // Record count
	public $EditRowCount;
	public $StartRowCount = 1;
	public $RowCount = 0;
	public $Attrs = []; // Row attributes and cell attributes
	public $RowIndex = 0; // Row index
	public $KeyCount = 0; // Key count
	public $RowAction = ""; // Row action
	public $RowOldKey = ""; // Row old key (for copy)
	public $MultiColumnClass = "col-sm";
	public $MultiColumnEditClass = "w-100";
	public $DbMasterFilter = ""; // Master filter
	public $DbDetailFilter = ""; // Detail filter
	public $MasterRecordExists;
	public $MultiSelectKey;
	public $Command;
	public $RestoreSearch = FALSE;
	public $DetailPages;
	public $OldRecordset;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SearchError;

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canList()) {
				SetStatus(401); // Unauthorized
				return;
			}
		} else {
			$Security = new AdvancedSecurity();
			if (!$Security->isLoggedIn())
				$Security->autoLogin();
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loading();
			$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName);
			if ($Security->isLoggedIn())
				$Security->TablePermission_Loaded();
			if (!$Security->canList()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				$this->terminate(GetUrl("index.php"));
				return;
			}
			if ($Security->isLoggedIn()) {
				$Security->UserID_Loading();
				$Security->loadUserID();
				$Security->UserID_Loaded();
			}
		}

		// Get export parameters
		$custom = "";
		if (Param("export") !== NULL) {
			$this->Export = Param("export");
			$custom = Param("custom", "");
		} elseif (IsPost()) {
			if (Post("exporttype") !== NULL)
				$this->Export = Post("exporttype");
			$custom = Post("custom", "");
		} elseif (Get("cmd") == "json") {
			$this->Export = Get("cmd");
		} else {
			$this->setExportReturnUrl(CurrentUrl());
		}
		$ExportFileName = $this->TableVar; // Get export file, used in header

		// Get custom export parameters
		if ($this->isExport() && $custom != "") {
			$this->CustomExport = $this->Export;
			$this->Export = "print";
		}
		$CustomExportType = $this->CustomExport;
		$ExportType = $this->Export; // Get export parameter, used in header

		// Update Export URLs
		if (Config("USE_PHPEXCEL"))
			$this->ExportExcelCustom = FALSE;
		if ($this->ExportExcelCustom)
			$this->ExportExcelUrl .= "&amp;custom=1";
		if (Config("USE_PHPWORD"))
			$this->ExportWordCustom = FALSE;
		if ($this->ExportWordCustom)
			$this->ExportWordUrl .= "&amp;custom=1";
		if ($this->ExportPdfCustom)
			$this->ExportPdfUrl .= "&amp;custom=1";
		$this->CurrentAction = Param("action"); // Set up current action

		// Get grid add count
		$gridaddcnt = Get(Config("TABLE_GRID_ADD_ROW_COUNT"), "");
		if (is_numeric($gridaddcnt) && $gridaddcnt > 0)
			$this->GridAddRowCount = $gridaddcnt;

		// Set up list options
		$this->setupListOptions();

		// Setup export options
		$this->setupExportOptions();
		$this->id->setVisibility();
		$this->property_id->setVisibility();
		$this->property->setVisibility();
		$this->templatefile->setVisibility();
		$this->transactionno->setVisibility();
		$this->transactiondate->setVisibility();
		$this->handedoverto->setVisibility();
		$this->hoto->setVisibility();
		$this->departmentto->setVisibility();
		$this->deptto->setVisibility();
		$this->handedoverby->setVisibility();
		$this->hoby->setVisibility();
		$this->departmentby->setVisibility();
		$this->deptby->setVisibility();
		$this->sign1->setVisibility();
		$this->signa1->setVisibility();
		$this->jobt1->setVisibility();
		$this->sign2->setVisibility();
		$this->signa2->setVisibility();
		$this->jobt2->setVisibility();
		$this->sign3->setVisibility();
		$this->signa3->setVisibility();
		$this->jobt3->setVisibility();
		$this->sign4->setVisibility();
		$this->signa4->setVisibility();
		$this->jobt4->setVisibility();
		$this->hodetail_id->setVisibility();
		$this->asset_id->setVisibility();
		$this->code->setVisibility();
		$this->description->setVisibility();
		$this->department_id->setVisibility();
		$this->asset_dept->setVisibility();
		$this->procurementdate->setVisibility();
		$this->procurementcurrentcost->setVisibility();
		$this->remarks->Visible = FALSE;
		$this->hideFieldsForAddEdit();

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

		// Setup other options
		$this->setupOtherOptions();

		// Set up custom action (compatible with old version)
		foreach ($this->CustomActions as $name => $action)
			$this->ListActions->add($name, $action);

		// Show checkbox column if multiple action
		foreach ($this->ListActions->Items as $listaction) {
			if ($listaction->Select == ACTION_MULTIPLE && $listaction->Allow) {
				$this->ListOptions["checkbox"]->Visible = TRUE;
				break;
			}
		}

		// Set up lookup cache
		// Search filters

		$srchAdvanced = ""; // Advanced search filter
		$srchBasic = ""; // Basic search filter
		$filter = "";

		// Get command
		$this->Command = strtolower(Get("cmd"));
		if ($this->isPageRequest()) { // Validate request

			// Process list action first
			if ($this->processListAction()) // Ajax request
				$this->terminate();

			// Set up records per page
			$this->setupDisplayRecords();

			// Handle reset command
			$this->resetCmd();

			// Set up Breadcrumb
			if (!$this->isExport())
				$this->setupBreadcrumb();

			// Hide list options
			if ($this->isExport()) {
				$this->ListOptions->hideAllOptions(["sequence"]);
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			} elseif ($this->isGridAdd() || $this->isGridEdit()) {
				$this->ListOptions->hideAllOptions();
				$this->ListOptions->UseDropDownButton = FALSE; // Disable drop down button
				$this->ListOptions->UseButtonGroup = FALSE; // Disable button group
			}

			// Hide options
			if ($this->isExport() || $this->CurrentAction) {
				$this->ExportOptions->hideAllOptions();
				$this->FilterOptions->hideAllOptions();
				$this->ImportOptions->hideAllOptions();
			}

			// Hide other options
			if ($this->isExport())
				$this->OtherOptions->hideAllOptions();

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->basicSearchWhere(TRUE));

			// Get basic search values
			$this->loadBasicSearchValues();

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get basic search criteria
			if ($SearchError == "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Restore display records
		if ($this->Command != "json" && $this->getRecordsPerPage() != "") {
			$this->DisplayRecords = $this->getRecordsPerPage(); // Restore from Session
		} else {
			$this->DisplayRecords = 20; // Load default
			$this->setRecordsPerPage($this->DisplayRecords); // Save default to Session
		}

		// Load Sorting Order
		if ($this->Command != "json")
			$this->loadSortOrder();

		// Load search default if no existing search criteria
		if (!$this->checkSearchParms()) {

			// Load basic search from default
			$this->BasicSearch->loadDefault();
			if ($this->BasicSearch->Keyword != "")
				$srchBasic = $this->basicSearchWhere();
		}

		// Build search criteria
		AddFilter($this->SearchWhere, $srchAdvanced);
		AddFilter($this->SearchWhere, $srchBasic);

		// Call Recordset_Searching event
		$this->Recordset_Searching($this->SearchWhere);

		// Save search criteria
		if ($this->Command == "search" && !$this->RestoreSearch) {
			$this->setSearchWhere($this->SearchWhere); // Save to Session
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->Command != "json") {
			$this->SearchWhere = $this->getSearchWhere();
		}

		// Build filter
		$filter = "";
		if (!$Security->canList())
			$filter = "(0=1)"; // Filter all records
		AddFilter($filter, $this->DbDetailFilter);
		AddFilter($filter, $this->SearchWhere);

		// Set up filter
		if ($this->Command == "json") {
			$this->UseSessionForListSql = FALSE; // Do not use session for ListSQL
			$this->CurrentFilter = $filter;
		} else {
			$this->setSessionWhere($filter);
			$this->CurrentFilter = "";
		}

		// Export data only
		if (!$this->CustomExport && in_array($this->Export, array_keys(Config("EXPORT_CLASSES")))) {
			$this->exportData();
			$this->terminate();
		}
		if ($this->isGridAdd()) {
			$this->CurrentFilter = "0=1";
			$this->StartRecord = 1;
			$this->DisplayRecords = $this->GridAddRowCount;
			$this->TotalRecords = $this->DisplayRecords;
			$this->StopRecord = $this->DisplayRecords;
		} else {
			$selectLimit = $this->UseSelectLimit;
			if ($selectLimit) {
				$this->TotalRecords = $this->listRecordCount();
			} else {
				if ($this->Recordset = $this->loadRecordset())
					$this->TotalRecords = $this->Recordset->RecordCount();
			}
			$this->StartRecord = 1;
			if ($this->DisplayRecords <= 0 || ($this->isExport() && $this->ExportAll)) // Display all records
				$this->DisplayRecords = $this->TotalRecords;
			if (!($this->isExport() && $this->ExportAll)) // Set up start record position
				$this->setupStartRecord();
			if ($selectLimit)
				$this->Recordset = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords);

			// Set no record found message
			if (!$this->CurrentAction && $this->TotalRecords == 0) {
				if (!$Security->canList())
					$this->setWarningMessage(DeniedMessage());
				if ($this->SearchWhere == "0=101")
					$this->setWarningMessage($Language->phrase("EnterSearchCriteria"));
				else
					$this->setWarningMessage($Language->phrase("NoRecord"));
			}
		}

		// Search options
		$this->setupSearchOptions();

		// Set up search panel class
		if ($this->SearchWhere != "")
			AppendClass($this->SearchPanelClass, "show");

		// Normal return
		if (IsApi()) {
			$rows = $this->getRecordsFromRecordset($this->Recordset);
			$this->Recordset->close();
			WriteJson(["success" => TRUE, $this->TableVar => $rows, "totalRecordCount" => $this->TotalRecords]);
			$this->terminate(TRUE);
		}

		// Set up pager
		$this->Pager = new PrevNextPager($this->StartRecord, $this->getRecordsPerPage(), $this->TotalRecords, $this->PageSizes, $this->RecordRange, $this->AutoHidePager, $this->AutoHidePageSizeSelector);
	}

	// Set up number of records displayed per page
	protected function setupDisplayRecords()
	{
		$wrk = Get(Config("TABLE_REC_PER_PAGE"), "");
		if ($wrk != "") {
			if (is_numeric($wrk)) {
				$this->DisplayRecords = (int)$wrk;
			} else {
				if (SameText($wrk, "all")) { // Display all records
					$this->DisplayRecords = -1;
				} else {
					$this->DisplayRecords = 20; // Non-numeric, load default
				}
			}
			$this->setRecordsPerPage($this->DisplayRecords); // Save to Session

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Build filter for all keys
	protected function buildKeyFilter()
	{
		global $CurrentForm;
		$wrkFilter = "";

		// Update row index and get row key
		$rowindex = 1;
		$CurrentForm->Index = $rowindex;
		$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		while ($thisKey != "") {
			if ($this->setupKeyValues($thisKey)) {
				$filter = $this->getRecordFilter();
				if ($wrkFilter != "")
					$wrkFilter .= " OR ";
				$wrkFilter .= $filter;
			} else {
				$wrkFilter = "0=1";
				break;
			}

			// Update row index and get row key
			$rowindex++; // Next row
			$CurrentForm->Index = $rowindex;
			$thisKey = strval($CurrentForm->getValue($this->FormKeyName));
		}
		return $wrkFilter;
	}

	// Set up key values
	protected function setupKeyValues($key)
	{
		$arKeyFlds = explode(Config("COMPOSITE_KEY_SEPARATOR"), $key);
		if (count($arKeyFlds) >= 2) {
			$this->id->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id->OldValue))
				return FALSE;
			$this->hodetail_id->setOldValue($arKeyFlds[1]);
			if (!is_numeric($this->hodetail_id->OldValue))
				return FALSE;
		}
		return TRUE;
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->id->AdvancedSearch->toJson(), ","); // Field id
		$filterList = Concat($filterList, $this->property_id->AdvancedSearch->toJson(), ","); // Field property_id
		$filterList = Concat($filterList, $this->property->AdvancedSearch->toJson(), ","); // Field property
		$filterList = Concat($filterList, $this->templatefile->AdvancedSearch->toJson(), ","); // Field templatefile
		$filterList = Concat($filterList, $this->transactionno->AdvancedSearch->toJson(), ","); // Field transactionno
		$filterList = Concat($filterList, $this->transactiondate->AdvancedSearch->toJson(), ","); // Field transactiondate
		$filterList = Concat($filterList, $this->handedoverto->AdvancedSearch->toJson(), ","); // Field handedoverto
		$filterList = Concat($filterList, $this->hoto->AdvancedSearch->toJson(), ","); // Field hoto
		$filterList = Concat($filterList, $this->departmentto->AdvancedSearch->toJson(), ","); // Field departmentto
		$filterList = Concat($filterList, $this->deptto->AdvancedSearch->toJson(), ","); // Field deptto
		$filterList = Concat($filterList, $this->handedoverby->AdvancedSearch->toJson(), ","); // Field handedoverby
		$filterList = Concat($filterList, $this->hoby->AdvancedSearch->toJson(), ","); // Field hoby
		$filterList = Concat($filterList, $this->departmentby->AdvancedSearch->toJson(), ","); // Field departmentby
		$filterList = Concat($filterList, $this->deptby->AdvancedSearch->toJson(), ","); // Field deptby
		$filterList = Concat($filterList, $this->sign1->AdvancedSearch->toJson(), ","); // Field sign1
		$filterList = Concat($filterList, $this->signa1->AdvancedSearch->toJson(), ","); // Field signa1
		$filterList = Concat($filterList, $this->jobt1->AdvancedSearch->toJson(), ","); // Field jobt1
		$filterList = Concat($filterList, $this->sign2->AdvancedSearch->toJson(), ","); // Field sign2
		$filterList = Concat($filterList, $this->signa2->AdvancedSearch->toJson(), ","); // Field signa2
		$filterList = Concat($filterList, $this->jobt2->AdvancedSearch->toJson(), ","); // Field jobt2
		$filterList = Concat($filterList, $this->sign3->AdvancedSearch->toJson(), ","); // Field sign3
		$filterList = Concat($filterList, $this->signa3->AdvancedSearch->toJson(), ","); // Field signa3
		$filterList = Concat($filterList, $this->jobt3->AdvancedSearch->toJson(), ","); // Field jobt3
		$filterList = Concat($filterList, $this->sign4->AdvancedSearch->toJson(), ","); // Field sign4
		$filterList = Concat($filterList, $this->signa4->AdvancedSearch->toJson(), ","); // Field signa4
		$filterList = Concat($filterList, $this->jobt4->AdvancedSearch->toJson(), ","); // Field jobt4
		$filterList = Concat($filterList, $this->hodetail_id->AdvancedSearch->toJson(), ","); // Field hodetail_id
		$filterList = Concat($filterList, $this->asset_id->AdvancedSearch->toJson(), ","); // Field asset_id
		$filterList = Concat($filterList, $this->code->AdvancedSearch->toJson(), ","); // Field code
		$filterList = Concat($filterList, $this->description->AdvancedSearch->toJson(), ","); // Field description
		$filterList = Concat($filterList, $this->department_id->AdvancedSearch->toJson(), ","); // Field department_id
		$filterList = Concat($filterList, $this->asset_dept->AdvancedSearch->toJson(), ","); // Field asset_dept
		$filterList = Concat($filterList, $this->procurementdate->AdvancedSearch->toJson(), ","); // Field procurementdate
		$filterList = Concat($filterList, $this->procurementcurrentcost->AdvancedSearch->toJson(), ","); // Field procurementcurrentcost
		$filterList = Concat($filterList, $this->remarks->AdvancedSearch->toJson(), ","); // Field remarks
		if ($this->BasicSearch->Keyword != "") {
			$wrk = "\"" . Config("TABLE_BASIC_SEARCH") . "\":\"" . JsEncode($this->BasicSearch->Keyword) . "\",\"" . Config("TABLE_BASIC_SEARCH_TYPE") . "\":\"" . JsEncode($this->BasicSearch->Type) . "\"";
			$filterList = Concat($filterList, $wrk, ",");
		}

		// Return filter list in JSON
		if ($filterList != "")
			$filterList = "\"data\":{" . $filterList . "}";
		if ($savedFilterList != "")
			$filterList = Concat($filterList, "\"filters\":" . $savedFilterList, ",");
		return ($filterList != "") ? "{" . $filterList . "}" : "null";
	}

	// Process filter list
	protected function processFilterList()
	{
		global $UserProfile;
		if (Post("ajax") == "savefilters") { // Save filter request (Ajax)
			$filters = Post("filters");
			$UserProfile->setSearchFilters(CurrentUserName(), "fv101_ho_2listsrch", $filters);
			WriteJson([["success" => TRUE]]); // Success
			return TRUE;
		} elseif (Post("cmd") == "resetfilter") {
			$this->restoreFilterList();
		}
		return FALSE;
	}

	// Restore list of filters
	protected function restoreFilterList()
	{

		// Return if not reset filter
		if (Post("cmd") !== "resetfilter")
			return FALSE;
		$filter = json_decode(Post("filter"), TRUE);
		$this->Command = "search";

		// Field id
		$this->id->AdvancedSearch->SearchValue = @$filter["x_id"];
		$this->id->AdvancedSearch->SearchOperator = @$filter["z_id"];
		$this->id->AdvancedSearch->SearchCondition = @$filter["v_id"];
		$this->id->AdvancedSearch->SearchValue2 = @$filter["y_id"];
		$this->id->AdvancedSearch->SearchOperator2 = @$filter["w_id"];
		$this->id->AdvancedSearch->save();

		// Field property_id
		$this->property_id->AdvancedSearch->SearchValue = @$filter["x_property_id"];
		$this->property_id->AdvancedSearch->SearchOperator = @$filter["z_property_id"];
		$this->property_id->AdvancedSearch->SearchCondition = @$filter["v_property_id"];
		$this->property_id->AdvancedSearch->SearchValue2 = @$filter["y_property_id"];
		$this->property_id->AdvancedSearch->SearchOperator2 = @$filter["w_property_id"];
		$this->property_id->AdvancedSearch->save();

		// Field property
		$this->property->AdvancedSearch->SearchValue = @$filter["x_property"];
		$this->property->AdvancedSearch->SearchOperator = @$filter["z_property"];
		$this->property->AdvancedSearch->SearchCondition = @$filter["v_property"];
		$this->property->AdvancedSearch->SearchValue2 = @$filter["y_property"];
		$this->property->AdvancedSearch->SearchOperator2 = @$filter["w_property"];
		$this->property->AdvancedSearch->save();

		// Field templatefile
		$this->templatefile->AdvancedSearch->SearchValue = @$filter["x_templatefile"];
		$this->templatefile->AdvancedSearch->SearchOperator = @$filter["z_templatefile"];
		$this->templatefile->AdvancedSearch->SearchCondition = @$filter["v_templatefile"];
		$this->templatefile->AdvancedSearch->SearchValue2 = @$filter["y_templatefile"];
		$this->templatefile->AdvancedSearch->SearchOperator2 = @$filter["w_templatefile"];
		$this->templatefile->AdvancedSearch->save();

		// Field transactionno
		$this->transactionno->AdvancedSearch->SearchValue = @$filter["x_transactionno"];
		$this->transactionno->AdvancedSearch->SearchOperator = @$filter["z_transactionno"];
		$this->transactionno->AdvancedSearch->SearchCondition = @$filter["v_transactionno"];
		$this->transactionno->AdvancedSearch->SearchValue2 = @$filter["y_transactionno"];
		$this->transactionno->AdvancedSearch->SearchOperator2 = @$filter["w_transactionno"];
		$this->transactionno->AdvancedSearch->save();

		// Field transactiondate
		$this->transactiondate->AdvancedSearch->SearchValue = @$filter["x_transactiondate"];
		$this->transactiondate->AdvancedSearch->SearchOperator = @$filter["z_transactiondate"];
		$this->transactiondate->AdvancedSearch->SearchCondition = @$filter["v_transactiondate"];
		$this->transactiondate->AdvancedSearch->SearchValue2 = @$filter["y_transactiondate"];
		$this->transactiondate->AdvancedSearch->SearchOperator2 = @$filter["w_transactiondate"];
		$this->transactiondate->AdvancedSearch->save();

		// Field handedoverto
		$this->handedoverto->AdvancedSearch->SearchValue = @$filter["x_handedoverto"];
		$this->handedoverto->AdvancedSearch->SearchOperator = @$filter["z_handedoverto"];
		$this->handedoverto->AdvancedSearch->SearchCondition = @$filter["v_handedoverto"];
		$this->handedoverto->AdvancedSearch->SearchValue2 = @$filter["y_handedoverto"];
		$this->handedoverto->AdvancedSearch->SearchOperator2 = @$filter["w_handedoverto"];
		$this->handedoverto->AdvancedSearch->save();

		// Field hoto
		$this->hoto->AdvancedSearch->SearchValue = @$filter["x_hoto"];
		$this->hoto->AdvancedSearch->SearchOperator = @$filter["z_hoto"];
		$this->hoto->AdvancedSearch->SearchCondition = @$filter["v_hoto"];
		$this->hoto->AdvancedSearch->SearchValue2 = @$filter["y_hoto"];
		$this->hoto->AdvancedSearch->SearchOperator2 = @$filter["w_hoto"];
		$this->hoto->AdvancedSearch->save();

		// Field departmentto
		$this->departmentto->AdvancedSearch->SearchValue = @$filter["x_departmentto"];
		$this->departmentto->AdvancedSearch->SearchOperator = @$filter["z_departmentto"];
		$this->departmentto->AdvancedSearch->SearchCondition = @$filter["v_departmentto"];
		$this->departmentto->AdvancedSearch->SearchValue2 = @$filter["y_departmentto"];
		$this->departmentto->AdvancedSearch->SearchOperator2 = @$filter["w_departmentto"];
		$this->departmentto->AdvancedSearch->save();

		// Field deptto
		$this->deptto->AdvancedSearch->SearchValue = @$filter["x_deptto"];
		$this->deptto->AdvancedSearch->SearchOperator = @$filter["z_deptto"];
		$this->deptto->AdvancedSearch->SearchCondition = @$filter["v_deptto"];
		$this->deptto->AdvancedSearch->SearchValue2 = @$filter["y_deptto"];
		$this->deptto->AdvancedSearch->SearchOperator2 = @$filter["w_deptto"];
		$this->deptto->AdvancedSearch->save();

		// Field handedoverby
		$this->handedoverby->AdvancedSearch->SearchValue = @$filter["x_handedoverby"];
		$this->handedoverby->AdvancedSearch->SearchOperator = @$filter["z_handedoverby"];
		$this->handedoverby->AdvancedSearch->SearchCondition = @$filter["v_handedoverby"];
		$this->handedoverby->AdvancedSearch->SearchValue2 = @$filter["y_handedoverby"];
		$this->handedoverby->AdvancedSearch->SearchOperator2 = @$filter["w_handedoverby"];
		$this->handedoverby->AdvancedSearch->save();

		// Field hoby
		$this->hoby->AdvancedSearch->SearchValue = @$filter["x_hoby"];
		$this->hoby->AdvancedSearch->SearchOperator = @$filter["z_hoby"];
		$this->hoby->AdvancedSearch->SearchCondition = @$filter["v_hoby"];
		$this->hoby->AdvancedSearch->SearchValue2 = @$filter["y_hoby"];
		$this->hoby->AdvancedSearch->SearchOperator2 = @$filter["w_hoby"];
		$this->hoby->AdvancedSearch->save();

		// Field departmentby
		$this->departmentby->AdvancedSearch->SearchValue = @$filter["x_departmentby"];
		$this->departmentby->AdvancedSearch->SearchOperator = @$filter["z_departmentby"];
		$this->departmentby->AdvancedSearch->SearchCondition = @$filter["v_departmentby"];
		$this->departmentby->AdvancedSearch->SearchValue2 = @$filter["y_departmentby"];
		$this->departmentby->AdvancedSearch->SearchOperator2 = @$filter["w_departmentby"];
		$this->departmentby->AdvancedSearch->save();

		// Field deptby
		$this->deptby->AdvancedSearch->SearchValue = @$filter["x_deptby"];
		$this->deptby->AdvancedSearch->SearchOperator = @$filter["z_deptby"];
		$this->deptby->AdvancedSearch->SearchCondition = @$filter["v_deptby"];
		$this->deptby->AdvancedSearch->SearchValue2 = @$filter["y_deptby"];
		$this->deptby->AdvancedSearch->SearchOperator2 = @$filter["w_deptby"];
		$this->deptby->AdvancedSearch->save();

		// Field sign1
		$this->sign1->AdvancedSearch->SearchValue = @$filter["x_sign1"];
		$this->sign1->AdvancedSearch->SearchOperator = @$filter["z_sign1"];
		$this->sign1->AdvancedSearch->SearchCondition = @$filter["v_sign1"];
		$this->sign1->AdvancedSearch->SearchValue2 = @$filter["y_sign1"];
		$this->sign1->AdvancedSearch->SearchOperator2 = @$filter["w_sign1"];
		$this->sign1->AdvancedSearch->save();

		// Field signa1
		$this->signa1->AdvancedSearch->SearchValue = @$filter["x_signa1"];
		$this->signa1->AdvancedSearch->SearchOperator = @$filter["z_signa1"];
		$this->signa1->AdvancedSearch->SearchCondition = @$filter["v_signa1"];
		$this->signa1->AdvancedSearch->SearchValue2 = @$filter["y_signa1"];
		$this->signa1->AdvancedSearch->SearchOperator2 = @$filter["w_signa1"];
		$this->signa1->AdvancedSearch->save();

		// Field jobt1
		$this->jobt1->AdvancedSearch->SearchValue = @$filter["x_jobt1"];
		$this->jobt1->AdvancedSearch->SearchOperator = @$filter["z_jobt1"];
		$this->jobt1->AdvancedSearch->SearchCondition = @$filter["v_jobt1"];
		$this->jobt1->AdvancedSearch->SearchValue2 = @$filter["y_jobt1"];
		$this->jobt1->AdvancedSearch->SearchOperator2 = @$filter["w_jobt1"];
		$this->jobt1->AdvancedSearch->save();

		// Field sign2
		$this->sign2->AdvancedSearch->SearchValue = @$filter["x_sign2"];
		$this->sign2->AdvancedSearch->SearchOperator = @$filter["z_sign2"];
		$this->sign2->AdvancedSearch->SearchCondition = @$filter["v_sign2"];
		$this->sign2->AdvancedSearch->SearchValue2 = @$filter["y_sign2"];
		$this->sign2->AdvancedSearch->SearchOperator2 = @$filter["w_sign2"];
		$this->sign2->AdvancedSearch->save();

		// Field signa2
		$this->signa2->AdvancedSearch->SearchValue = @$filter["x_signa2"];
		$this->signa2->AdvancedSearch->SearchOperator = @$filter["z_signa2"];
		$this->signa2->AdvancedSearch->SearchCondition = @$filter["v_signa2"];
		$this->signa2->AdvancedSearch->SearchValue2 = @$filter["y_signa2"];
		$this->signa2->AdvancedSearch->SearchOperator2 = @$filter["w_signa2"];
		$this->signa2->AdvancedSearch->save();

		// Field jobt2
		$this->jobt2->AdvancedSearch->SearchValue = @$filter["x_jobt2"];
		$this->jobt2->AdvancedSearch->SearchOperator = @$filter["z_jobt2"];
		$this->jobt2->AdvancedSearch->SearchCondition = @$filter["v_jobt2"];
		$this->jobt2->AdvancedSearch->SearchValue2 = @$filter["y_jobt2"];
		$this->jobt2->AdvancedSearch->SearchOperator2 = @$filter["w_jobt2"];
		$this->jobt2->AdvancedSearch->save();

		// Field sign3
		$this->sign3->AdvancedSearch->SearchValue = @$filter["x_sign3"];
		$this->sign3->AdvancedSearch->SearchOperator = @$filter["z_sign3"];
		$this->sign3->AdvancedSearch->SearchCondition = @$filter["v_sign3"];
		$this->sign3->AdvancedSearch->SearchValue2 = @$filter["y_sign3"];
		$this->sign3->AdvancedSearch->SearchOperator2 = @$filter["w_sign3"];
		$this->sign3->AdvancedSearch->save();

		// Field signa3
		$this->signa3->AdvancedSearch->SearchValue = @$filter["x_signa3"];
		$this->signa3->AdvancedSearch->SearchOperator = @$filter["z_signa3"];
		$this->signa3->AdvancedSearch->SearchCondition = @$filter["v_signa3"];
		$this->signa3->AdvancedSearch->SearchValue2 = @$filter["y_signa3"];
		$this->signa3->AdvancedSearch->SearchOperator2 = @$filter["w_signa3"];
		$this->signa3->AdvancedSearch->save();

		// Field jobt3
		$this->jobt3->AdvancedSearch->SearchValue = @$filter["x_jobt3"];
		$this->jobt3->AdvancedSearch->SearchOperator = @$filter["z_jobt3"];
		$this->jobt3->AdvancedSearch->SearchCondition = @$filter["v_jobt3"];
		$this->jobt3->AdvancedSearch->SearchValue2 = @$filter["y_jobt3"];
		$this->jobt3->AdvancedSearch->SearchOperator2 = @$filter["w_jobt3"];
		$this->jobt3->AdvancedSearch->save();

		// Field sign4
		$this->sign4->AdvancedSearch->SearchValue = @$filter["x_sign4"];
		$this->sign4->AdvancedSearch->SearchOperator = @$filter["z_sign4"];
		$this->sign4->AdvancedSearch->SearchCondition = @$filter["v_sign4"];
		$this->sign4->AdvancedSearch->SearchValue2 = @$filter["y_sign4"];
		$this->sign4->AdvancedSearch->SearchOperator2 = @$filter["w_sign4"];
		$this->sign4->AdvancedSearch->save();

		// Field signa4
		$this->signa4->AdvancedSearch->SearchValue = @$filter["x_signa4"];
		$this->signa4->AdvancedSearch->SearchOperator = @$filter["z_signa4"];
		$this->signa4->AdvancedSearch->SearchCondition = @$filter["v_signa4"];
		$this->signa4->AdvancedSearch->SearchValue2 = @$filter["y_signa4"];
		$this->signa4->AdvancedSearch->SearchOperator2 = @$filter["w_signa4"];
		$this->signa4->AdvancedSearch->save();

		// Field jobt4
		$this->jobt4->AdvancedSearch->SearchValue = @$filter["x_jobt4"];
		$this->jobt4->AdvancedSearch->SearchOperator = @$filter["z_jobt4"];
		$this->jobt4->AdvancedSearch->SearchCondition = @$filter["v_jobt4"];
		$this->jobt4->AdvancedSearch->SearchValue2 = @$filter["y_jobt4"];
		$this->jobt4->AdvancedSearch->SearchOperator2 = @$filter["w_jobt4"];
		$this->jobt4->AdvancedSearch->save();

		// Field hodetail_id
		$this->hodetail_id->AdvancedSearch->SearchValue = @$filter["x_hodetail_id"];
		$this->hodetail_id->AdvancedSearch->SearchOperator = @$filter["z_hodetail_id"];
		$this->hodetail_id->AdvancedSearch->SearchCondition = @$filter["v_hodetail_id"];
		$this->hodetail_id->AdvancedSearch->SearchValue2 = @$filter["y_hodetail_id"];
		$this->hodetail_id->AdvancedSearch->SearchOperator2 = @$filter["w_hodetail_id"];
		$this->hodetail_id->AdvancedSearch->save();

		// Field asset_id
		$this->asset_id->AdvancedSearch->SearchValue = @$filter["x_asset_id"];
		$this->asset_id->AdvancedSearch->SearchOperator = @$filter["z_asset_id"];
		$this->asset_id->AdvancedSearch->SearchCondition = @$filter["v_asset_id"];
		$this->asset_id->AdvancedSearch->SearchValue2 = @$filter["y_asset_id"];
		$this->asset_id->AdvancedSearch->SearchOperator2 = @$filter["w_asset_id"];
		$this->asset_id->AdvancedSearch->save();

		// Field code
		$this->code->AdvancedSearch->SearchValue = @$filter["x_code"];
		$this->code->AdvancedSearch->SearchOperator = @$filter["z_code"];
		$this->code->AdvancedSearch->SearchCondition = @$filter["v_code"];
		$this->code->AdvancedSearch->SearchValue2 = @$filter["y_code"];
		$this->code->AdvancedSearch->SearchOperator2 = @$filter["w_code"];
		$this->code->AdvancedSearch->save();

		// Field description
		$this->description->AdvancedSearch->SearchValue = @$filter["x_description"];
		$this->description->AdvancedSearch->SearchOperator = @$filter["z_description"];
		$this->description->AdvancedSearch->SearchCondition = @$filter["v_description"];
		$this->description->AdvancedSearch->SearchValue2 = @$filter["y_description"];
		$this->description->AdvancedSearch->SearchOperator2 = @$filter["w_description"];
		$this->description->AdvancedSearch->save();

		// Field department_id
		$this->department_id->AdvancedSearch->SearchValue = @$filter["x_department_id"];
		$this->department_id->AdvancedSearch->SearchOperator = @$filter["z_department_id"];
		$this->department_id->AdvancedSearch->SearchCondition = @$filter["v_department_id"];
		$this->department_id->AdvancedSearch->SearchValue2 = @$filter["y_department_id"];
		$this->department_id->AdvancedSearch->SearchOperator2 = @$filter["w_department_id"];
		$this->department_id->AdvancedSearch->save();

		// Field asset_dept
		$this->asset_dept->AdvancedSearch->SearchValue = @$filter["x_asset_dept"];
		$this->asset_dept->AdvancedSearch->SearchOperator = @$filter["z_asset_dept"];
		$this->asset_dept->AdvancedSearch->SearchCondition = @$filter["v_asset_dept"];
		$this->asset_dept->AdvancedSearch->SearchValue2 = @$filter["y_asset_dept"];
		$this->asset_dept->AdvancedSearch->SearchOperator2 = @$filter["w_asset_dept"];
		$this->asset_dept->AdvancedSearch->save();

		// Field procurementdate
		$this->procurementdate->AdvancedSearch->SearchValue = @$filter["x_procurementdate"];
		$this->procurementdate->AdvancedSearch->SearchOperator = @$filter["z_procurementdate"];
		$this->procurementdate->AdvancedSearch->SearchCondition = @$filter["v_procurementdate"];
		$this->procurementdate->AdvancedSearch->SearchValue2 = @$filter["y_procurementdate"];
		$this->procurementdate->AdvancedSearch->SearchOperator2 = @$filter["w_procurementdate"];
		$this->procurementdate->AdvancedSearch->save();

		// Field procurementcurrentcost
		$this->procurementcurrentcost->AdvancedSearch->SearchValue = @$filter["x_procurementcurrentcost"];
		$this->procurementcurrentcost->AdvancedSearch->SearchOperator = @$filter["z_procurementcurrentcost"];
		$this->procurementcurrentcost->AdvancedSearch->SearchCondition = @$filter["v_procurementcurrentcost"];
		$this->procurementcurrentcost->AdvancedSearch->SearchValue2 = @$filter["y_procurementcurrentcost"];
		$this->procurementcurrentcost->AdvancedSearch->SearchOperator2 = @$filter["w_procurementcurrentcost"];
		$this->procurementcurrentcost->AdvancedSearch->save();

		// Field remarks
		$this->remarks->AdvancedSearch->SearchValue = @$filter["x_remarks"];
		$this->remarks->AdvancedSearch->SearchOperator = @$filter["z_remarks"];
		$this->remarks->AdvancedSearch->SearchCondition = @$filter["v_remarks"];
		$this->remarks->AdvancedSearch->SearchValue2 = @$filter["y_remarks"];
		$this->remarks->AdvancedSearch->SearchOperator2 = @$filter["w_remarks"];
		$this->remarks->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->property, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->templatefile, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->transactionno, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoto, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->deptto, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->deptby, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->signa1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->jobt1, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->signa2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->jobt2, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->signa3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->jobt3, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->signa4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->jobt4, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->code, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->description, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->asset_dept, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->remarks, $arKeywords, $type);
		return $where;
	}

	// Build basic search SQL
	protected function buildBasicSearchSql(&$where, &$fld, $arKeywords, $type)
	{
		$defCond = ($type == "OR") ? "OR" : "AND";
		$arSql = []; // Array for SQL parts
		$arCond = []; // Array for search conditions
		$cnt = count($arKeywords);
		$j = 0; // Number of SQL parts
		for ($i = 0; $i < $cnt; $i++) {
			$keyword = $arKeywords[$i];
			$keyword = trim($keyword);
			if (Config("BASIC_SEARCH_IGNORE_PATTERN") != "") {
				$keyword = preg_replace(Config("BASIC_SEARCH_IGNORE_PATTERN"), "\\", $keyword);
				$ar = explode("\\", $keyword);
			} else {
				$ar = [$keyword];
			}
			foreach ($ar as $keyword) {
				if ($keyword != "") {
					$wrk = "";
					if ($keyword == "OR" && $type == "") {
						if ($j > 0)
							$arCond[$j - 1] = "OR";
					} elseif ($keyword == Config("NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NULL";
					} elseif ($keyword == Config("NOT_NULL_VALUE")) {
						$wrk = $fld->Expression . " IS NOT NULL";
					} elseif ($fld->IsVirtual) {
						$wrk = $fld->VirtualExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					} elseif ($fld->DataType != DATATYPE_NUMBER || is_numeric($keyword)) {
						$wrk = $fld->BasicSearchExpression . Like(QuotedValue("%" . $keyword . "%", DATATYPE_STRING, $this->Dbid), $this->Dbid);
					}
					if ($wrk != "") {
						$arSql[$j] = $wrk;
						$arCond[$j] = $defCond;
						$j += 1;
					}
				}
			}
		}
		$cnt = count($arSql);
		$quoted = FALSE;
		$sql = "";
		if ($cnt > 0) {
			for ($i = 0; $i < $cnt - 1; $i++) {
				if ($arCond[$i] == "OR") {
					if (!$quoted)
						$sql .= "(";
					$quoted = TRUE;
				}
				$sql .= $arSql[$i];
				if ($quoted && $arCond[$i] != "OR") {
					$sql .= ")";
					$quoted = FALSE;
				}
				$sql .= " " . $arCond[$i] . " ";
			}
			$sql .= $arSql[$cnt - 1];
			if ($quoted)
				$sql .= ")";
		}
		if ($sql != "") {
			if ($where != "")
				$where .= " OR ";
			$where .= "(" . $sql . ")";
		}
	}

	// Return basic search WHERE clause based on search keyword and type
	protected function basicSearchWhere($default = FALSE)
	{
		global $Security;
		$searchStr = "";
		if (!$Security->canSearch())
			return "";
		$searchKeyword = ($default) ? $this->BasicSearch->KeywordDefault : $this->BasicSearch->Keyword;
		$searchType = ($default) ? $this->BasicSearch->TypeDefault : $this->BasicSearch->Type;

		// Get search SQL
		if ($searchKeyword != "") {
			$ar = $this->BasicSearch->keywordList($default);

			// Search keyword in any fields
			if (($searchType == "OR" || $searchType == "AND") && $this->BasicSearch->BasicSearchAnyFields) {
				foreach ($ar as $keyword) {
					if ($keyword != "") {
						if ($searchStr != "")
							$searchStr .= " " . $searchType . " ";
						$searchStr .= "(" . $this->basicSearchSql([$keyword], $searchType) . ")";
					}
				}
			} else {
				$searchStr = $this->basicSearchSql($ar, $searchType);
			}
			if (!$default && in_array($this->Command, ["", "reset", "resetall"]))
				$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->BasicSearch->setKeyword($searchKeyword);
			$this->BasicSearch->setType($searchType);
		}
		return $searchStr;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{

		// Check basic search
		if ($this->BasicSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear basic search parameters
		$this->resetBasicSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all basic search parameters
	protected function resetBasicSearchParms()
	{
		$this->BasicSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore basic search values
		$this->BasicSearch->load();
	}

	// Set up sort parameters
	protected function setupSortOrder()
	{

		// Check for Ctrl pressed
		$ctrl = Get("ctrl") !== NULL;

		// Check for "order" parameter
		if (Get("order") !== NULL) {
			$this->CurrentOrder = Get("order");
			$this->CurrentOrderType = Get("ordertype", "");
			$this->updateSort($this->id, $ctrl); // id
			$this->updateSort($this->property_id, $ctrl); // property_id
			$this->updateSort($this->property, $ctrl); // property
			$this->updateSort($this->templatefile, $ctrl); // templatefile
			$this->updateSort($this->transactionno, $ctrl); // transactionno
			$this->updateSort($this->transactiondate, $ctrl); // transactiondate
			$this->updateSort($this->handedoverto, $ctrl); // handedoverto
			$this->updateSort($this->hoto, $ctrl); // hoto
			$this->updateSort($this->departmentto, $ctrl); // departmentto
			$this->updateSort($this->deptto, $ctrl); // deptto
			$this->updateSort($this->handedoverby, $ctrl); // handedoverby
			$this->updateSort($this->hoby, $ctrl); // hoby
			$this->updateSort($this->departmentby, $ctrl); // departmentby
			$this->updateSort($this->deptby, $ctrl); // deptby
			$this->updateSort($this->sign1, $ctrl); // sign1
			$this->updateSort($this->signa1, $ctrl); // signa1
			$this->updateSort($this->jobt1, $ctrl); // jobt1
			$this->updateSort($this->sign2, $ctrl); // sign2
			$this->updateSort($this->signa2, $ctrl); // signa2
			$this->updateSort($this->jobt2, $ctrl); // jobt2
			$this->updateSort($this->sign3, $ctrl); // sign3
			$this->updateSort($this->signa3, $ctrl); // signa3
			$this->updateSort($this->jobt3, $ctrl); // jobt3
			$this->updateSort($this->sign4, $ctrl); // sign4
			$this->updateSort($this->signa4, $ctrl); // signa4
			$this->updateSort($this->jobt4, $ctrl); // jobt4
			$this->updateSort($this->hodetail_id, $ctrl); // hodetail_id
			$this->updateSort($this->asset_id, $ctrl); // asset_id
			$this->updateSort($this->code, $ctrl); // code
			$this->updateSort($this->description, $ctrl); // description
			$this->updateSort($this->department_id, $ctrl); // department_id
			$this->updateSort($this->asset_dept, $ctrl); // asset_dept
			$this->updateSort($this->procurementdate, $ctrl); // procurementdate
			$this->updateSort($this->procurementcurrentcost, $ctrl); // procurementcurrentcost
			$this->setStartRecordNumber(1); // Reset start position
		}
	}

	// Load sort order parameters
	protected function loadSortOrder()
	{
		$orderBy = $this->getSessionOrderBy(); // Get ORDER BY from Session
		if ($orderBy == "") {
			if ($this->getSqlOrderBy() != "") {
				$orderBy = $this->getSqlOrderBy();
				$this->setSessionOrderBy($orderBy);
			}
		}
	}

	// Reset command
	// - cmd=reset (Reset search parameters)
	// - cmd=resetall (Reset search and master/detail parameters)
	// - cmd=resetsort (Reset sort parameters)

	protected function resetCmd()
	{

		// Check if reset command
		if (StartsString("reset", $this->Command)) {

			// Reset search criteria
			if ($this->Command == "reset" || $this->Command == "resetall")
				$this->resetSearchParms();

			// Reset sorting order
			if ($this->Command == "resetsort") {
				$orderBy = "";
				$this->setSessionOrderBy($orderBy);
				$this->id->setSort("");
				$this->property_id->setSort("");
				$this->property->setSort("");
				$this->templatefile->setSort("");
				$this->transactionno->setSort("");
				$this->transactiondate->setSort("");
				$this->handedoverto->setSort("");
				$this->hoto->setSort("");
				$this->departmentto->setSort("");
				$this->deptto->setSort("");
				$this->handedoverby->setSort("");
				$this->hoby->setSort("");
				$this->departmentby->setSort("");
				$this->deptby->setSort("");
				$this->sign1->setSort("");
				$this->signa1->setSort("");
				$this->jobt1->setSort("");
				$this->sign2->setSort("");
				$this->signa2->setSort("");
				$this->jobt2->setSort("");
				$this->sign3->setSort("");
				$this->signa3->setSort("");
				$this->jobt3->setSort("");
				$this->sign4->setSort("");
				$this->signa4->setSort("");
				$this->jobt4->setSort("");
				$this->hodetail_id->setSort("");
				$this->asset_id->setSort("");
				$this->code->setSort("");
				$this->description->setSort("");
				$this->department_id->setSort("");
				$this->asset_dept->setSort("");
				$this->procurementdate->setSort("");
				$this->procurementcurrentcost->setSort("");
			}

			// Reset start position
			$this->StartRecord = 1;
			$this->setStartRecordNumber($this->StartRecord);
		}
	}

	// Set up list options
	protected function setupListOptions()
	{
		global $Security, $Language;

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// List actions
		$item = &$this->ListOptions->add("listactions");
		$item->CssClass = "text-nowrap";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;
		$item->ShowInButtonGroup = FALSE;
		$item->ShowInDropDown = FALSE;

		// "checkbox"
		$item = &$this->ListOptions->add("checkbox");
		$item->Visible = FALSE;
		$item->OnLeft = TRUE;
		$item->Header = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" name=\"key\" id=\"key\" class=\"custom-control-input\" onclick=\"ew.selectAllKey(this);\"><label class=\"custom-control-label\" for=\"key\"></label></div>";
		$item->moveTo(0);
		$item->ShowInDropDown = FALSE;
		$item->ShowInButtonGroup = FALSE;

		// Drop down button for ListOptions
		$this->ListOptions->UseDropDownButton = FALSE;
		$this->ListOptions->DropDownButtonPhrase = $Language->phrase("ButtonListOptions");
		$this->ListOptions->UseButtonGroup = FALSE;
		if ($this->ListOptions->UseButtonGroup && IsMobile())
			$this->ListOptions->UseDropDownButton = TRUE;

		//$this->ListOptions->ButtonClass = ""; // Class for button group
		// Call ListOptions_Load event

		$this->ListOptions_Load();
		$this->setupListOptionsExt();
		$item = $this->ListOptions[$this->ListOptions->GroupOptionName];
		$item->Visible = $this->ListOptions->groupOptionVisible();
	}

	// Render list options
	public function renderListOptions()
	{
		global $Security, $Language, $CurrentForm;
		$this->ListOptions->loadDefault();

		// Call ListOptions_Rendering event
		$this->ListOptions_Rendering();

		// Set up list action buttons
		$opt = $this->ListOptions["listactions"];
		if ($opt && !$this->isExport() && !$this->CurrentAction) {
			$body = "";
			$links = [];
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_SINGLE && $listaction->Allow) {
					$action = $listaction->Action;
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode(str_replace(" ew-icon", "", $listaction->Icon)) . "\" data-caption=\"" . HtmlTitle($caption) . "\"></i> " : "";
					$links[] = "<li><a class=\"dropdown-item ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a></li>";
					if (count($links) == 1) // Single button
						$body = "<a class=\"ew-action ew-list-action\" data-action=\"" . HtmlEncode($action) . "\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({key:" . $this->keyToJson(TRUE) . "}," . $listaction->toJson(TRUE) . "));\">" . $icon . $listaction->Caption . "</a>";
				}
			}
			if (count($links) > 1) { // More than one buttons, use dropdown
				$body = "<button class=\"dropdown-toggle btn btn-default ew-actions\" title=\"" . HtmlTitle($Language->phrase("ListActionButton")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("ListActionButton") . "</button>";
				$content = "";
				foreach ($links as $link)
					$content .= "<li>" . $link . "</li>";
				$body .= "<ul class=\"dropdown-menu" . ($opt->OnLeft ? "" : " dropdown-menu-right") . "\">". $content . "</ul>";
				$body = "<div class=\"btn-group btn-group-sm\">" . $body . "</div>";
			}
			if (count($links) > 0) {
				$opt->Body = $body;
				$opt->Visible = TRUE;
			}
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue . Config("COMPOSITE_KEY_SEPARATOR") . $this->hodetail_id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["action"];

		// Set up options default
		foreach ($options as $option) {
			$option->UseDropDownButton = FALSE;
			$option->UseButtonGroup = TRUE;

			//$option->ButtonClass = ""; // Class for button group
			$item = &$option->add($option->GroupOptionName);
			$item->Body = "";
			$item->Visible = FALSE;
		}
		$options["addedit"]->DropDownButtonPhrase = $Language->phrase("ButtonAddEdit");
		$options["detail"]->DropDownButtonPhrase = $Language->phrase("ButtonDetails");
		$options["action"]->DropDownButtonPhrase = $Language->phrase("ButtonActions");

		// Filter button
		$item = &$this->FilterOptions->add("savecurrentfilter");
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fv101_ho_2listsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fv101_ho_2listsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
		$item->Visible = TRUE;
		$this->FilterOptions->UseDropDownButton = TRUE;
		$this->FilterOptions->UseButtonGroup = !$this->FilterOptions->UseDropDownButton;
		$this->FilterOptions->DropDownButtonPhrase = $Language->phrase("Filters");

		// Add group option item
		$item = &$this->FilterOptions->add($this->FilterOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Render other options
	public function renderOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fv101_ho_2list}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
					$item->Visible = $listaction->Allow;
				}
			}

			// Hide grid edit and other options
			if ($this->TotalRecords <= 0) {
				$option = $options["addedit"];
				$item = $option["gridedit"];
				if ($item)
					$item->Visible = FALSE;
				$option = $options["action"];
				$option->hideAllOptions();
			}
	}

	// Process list action
	protected function processListAction()
	{
		global $Language, $Security;
		$userlist = "";
		$user = "";
		$filter = $this->getFilterFromRecordKeys();
		$userAction = Post("useraction", "");
		if ($filter != "" && $userAction != "") {

			// Check permission first
			$actionCaption = $userAction;
			if (array_key_exists($userAction, $this->ListActions->Items)) {
				$actionCaption = $this->ListActions[$userAction]->Caption;
				if (!$this->ListActions[$userAction]->Allow) {
					$errmsg = str_replace('%s', $actionCaption, $Language->phrase("CustomActionNotAllowed"));
					if (Post("ajax") == $userAction) // Ajax
						echo "<p class=\"text-danger\">" . $errmsg . "</p>";
					else
						$this->setFailureMessage($errmsg);
					return FALSE;
				}
			}
			$this->CurrentFilter = $filter;
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$rs = $conn->execute($sql);
			$conn->raiseErrorFn = "";
			$this->CurrentAction = $userAction;

			// Call row action event
			if ($rs && !$rs->EOF) {
				$conn->beginTrans();
				$this->SelectedCount = $rs->RecordCount();
				$this->SelectedIndex = 0;
				while (!$rs->EOF) {
					$this->SelectedIndex++;
					$row = $rs->fields;
					$processed = $this->Row_CustomAction($userAction, $row);
					if (!$processed)
						break;
					$rs->moveNext();
				}
				if ($processed) {
					$conn->commitTrans(); // Commit the changes
					if ($this->getSuccessMessage() == "" && !ob_get_length()) // No output
						$this->setSuccessMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionCompleted"))); // Set up success message
				} else {
					$conn->rollbackTrans(); // Rollback changes

					// Set up error message
					if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

						// Use the message, do nothing
					} elseif ($this->CancelMessage != "") {
						$this->setFailureMessage($this->CancelMessage);
						$this->CancelMessage = "";
					} else {
						$this->setFailureMessage(str_replace('%s', $actionCaption, $Language->phrase("CustomActionFailed")));
					}
				}
			}
			if ($rs)
				$rs->close();
			$this->CurrentAction = ""; // Clear action
			if (Post("ajax") == $userAction) { // Ajax
				if ($this->getSuccessMessage() != "") {
					echo "<p class=\"text-success\">" . $this->getSuccessMessage() . "</p>";
					$this->clearSuccessMessage(); // Clear message
				}
				if ($this->getFailureMessage() != "") {
					echo "<p class=\"text-danger\">" . $this->getFailureMessage() . "</p>";
					$this->clearFailureMessage(); // Clear message
				}
				return TRUE;
			}
		}
		return FALSE; // Not ajax request
	}

	// Set up list options (extended codes)
	protected function setupListOptionsExt()
	{
	}

	// Render list options (extended codes)
	protected function renderListOptionsExt()
	{
	}

	// Load basic search values
	protected function loadBasicSearchValues()
	{
		$this->BasicSearch->setKeyword(Get(Config("TABLE_BASIC_SEARCH"), ""), FALSE);
		if ($this->BasicSearch->Keyword != "" && $this->Command == "")
			$this->Command = "search";
		$this->BasicSearch->setType(Get(Config("TABLE_BASIC_SEARCH_TYPE"), ""), FALSE);
	}

	// Load recordset
	public function loadRecordset($offset = -1, $rowcnt = -1)
	{

		// Load List page SQL
		$sql = $this->getListSql();
		$conn = $this->getConnection();

		// Load recordset
		$dbtype = GetConnectionType($this->Dbid);
		if ($this->UseSelectLimit) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			if ($dbtype == "MSSQL") {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset, ["_hasOrderBy" => trim($this->getOrderBy()) || trim($this->getSessionOrderBy())]);
			} else {
				$rs = $conn->selectLimit($sql, $rowcnt, $offset);
			}
			$conn->raiseErrorFn = "";
		} else {
			$rs = LoadRecordset($sql, $conn);
		}

		// Call Recordset Selected event
		$this->Recordset_Selected($rs);
		return $rs;
	}

	// Load row based on key values
	public function loadRow()
	{
		global $Security, $Language;
		$filter = $this->getRecordFilter();

		// Call Row Selecting event
		$this->Row_Selecting($filter);

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$res = FALSE;
		$rs = LoadRecordset($sql, $conn);
		if ($rs && !$rs->EOF) {
			$res = TRUE;
			$this->loadRowValues($rs); // Load row values
			$rs->close();
		}
		return $res;
	}

	// Load row values from recordset
	public function loadRowValues($rs = NULL)
	{
		if ($rs && !$rs->EOF)
			$row = $rs->fields;
		else
			$row = $this->newRow();

		// Call Row Selected event
		$this->Row_Selected($row);
		if (!$rs || $rs->EOF)
			return;
		$this->id->setDbValue($row['id']);
		$this->property_id->setDbValue($row['property_id']);
		$this->property->setDbValue($row['property']);
		$this->templatefile->setDbValue($row['templatefile']);
		$this->transactionno->setDbValue($row['transactionno']);
		$this->transactiondate->setDbValue($row['transactiondate']);
		$this->handedoverto->setDbValue($row['handedoverto']);
		$this->hoto->setDbValue($row['hoto']);
		$this->departmentto->setDbValue($row['departmentto']);
		$this->deptto->setDbValue($row['deptto']);
		$this->handedoverby->setDbValue($row['handedoverby']);
		$this->hoby->setDbValue($row['hoby']);
		$this->departmentby->setDbValue($row['departmentby']);
		$this->deptby->setDbValue($row['deptby']);
		$this->sign1->setDbValue($row['sign1']);
		$this->signa1->setDbValue($row['signa1']);
		$this->jobt1->setDbValue($row['jobt1']);
		$this->sign2->setDbValue($row['sign2']);
		$this->signa2->setDbValue($row['signa2']);
		$this->jobt2->setDbValue($row['jobt2']);
		$this->sign3->setDbValue($row['sign3']);
		$this->signa3->setDbValue($row['signa3']);
		$this->jobt3->setDbValue($row['jobt3']);
		$this->sign4->setDbValue($row['sign4']);
		$this->signa4->setDbValue($row['signa4']);
		$this->jobt4->setDbValue($row['jobt4']);
		$this->hodetail_id->setDbValue($row['hodetail_id']);
		$this->asset_id->setDbValue($row['asset_id']);
		$this->code->setDbValue($row['code']);
		$this->description->setDbValue($row['description']);
		$this->department_id->setDbValue($row['department_id']);
		$this->asset_dept->setDbValue($row['asset_dept']);
		$this->procurementdate->setDbValue($row['procurementdate']);
		$this->procurementcurrentcost->setDbValue($row['procurementcurrentcost']);
		$this->remarks->setDbValue($row['remarks']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['property_id'] = NULL;
		$row['property'] = NULL;
		$row['templatefile'] = NULL;
		$row['transactionno'] = NULL;
		$row['transactiondate'] = NULL;
		$row['handedoverto'] = NULL;
		$row['hoto'] = NULL;
		$row['departmentto'] = NULL;
		$row['deptto'] = NULL;
		$row['handedoverby'] = NULL;
		$row['hoby'] = NULL;
		$row['departmentby'] = NULL;
		$row['deptby'] = NULL;
		$row['sign1'] = NULL;
		$row['signa1'] = NULL;
		$row['jobt1'] = NULL;
		$row['sign2'] = NULL;
		$row['signa2'] = NULL;
		$row['jobt2'] = NULL;
		$row['sign3'] = NULL;
		$row['signa3'] = NULL;
		$row['jobt3'] = NULL;
		$row['sign4'] = NULL;
		$row['signa4'] = NULL;
		$row['jobt4'] = NULL;
		$row['hodetail_id'] = NULL;
		$row['asset_id'] = NULL;
		$row['code'] = NULL;
		$row['description'] = NULL;
		$row['department_id'] = NULL;
		$row['asset_dept'] = NULL;
		$row['procurementdate'] = NULL;
		$row['procurementcurrentcost'] = NULL;
		$row['remarks'] = NULL;
		return $row;
	}

	// Load old record
	protected function loadOldRecord()
	{

		// Load key values from Session
		$validKey = TRUE;
		if (strval($this->getKey("id")) != "")
			$this->id->OldValue = $this->getKey("id"); // id
		else
			$validKey = FALSE;
		if (strval($this->getKey("hodetail_id")) != "")
			$this->hodetail_id->OldValue = $this->getKey("hodetail_id"); // hodetail_id
		else
			$validKey = FALSE;

		// Load old record
		$this->OldRecordset = NULL;
		if ($validKey) {
			$this->CurrentFilter = $this->getRecordFilter();
			$sql = $this->getCurrentSql();
			$conn = $this->getConnection();
			$this->OldRecordset = LoadRecordset($sql, $conn);
		}
		$this->loadRowValues($this->OldRecordset); // Load row values
		return $validKey;
	}

	// Render row values based on field settings
	public function renderRow()
	{
		global $Security, $Language, $CurrentLanguage;

		// Initialize URLs
		$this->ViewUrl = $this->getViewUrl();
		$this->EditUrl = $this->getEditUrl();
		$this->InlineEditUrl = $this->getInlineEditUrl();
		$this->CopyUrl = $this->getCopyUrl();
		$this->InlineCopyUrl = $this->getInlineCopyUrl();
		$this->DeleteUrl = $this->getDeleteUrl();

		// Convert decimal values if posted back
		if ($this->procurementcurrentcost->FormValue == $this->procurementcurrentcost->CurrentValue && is_numeric(ConvertToFloatString($this->procurementcurrentcost->CurrentValue)))
			$this->procurementcurrentcost->CurrentValue = ConvertToFloatString($this->procurementcurrentcost->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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
		}

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fv101_ho_2list, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fv101_ho_2list, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fv101_ho_2list, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
			else
				return "<a href=\"" . $this->ExportPdfUrl . "\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\">" . $Language->phrase("ExportToPDF") . "</a>";
		} elseif (SameText($type, "html")) {
			return "<a href=\"" . $this->ExportHtmlUrl . "\" class=\"ew-export-link ew-html\" title=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToHtmlText")) . "\">" . $Language->phrase("ExportToHtml") . "</a>";
		} elseif (SameText($type, "xml")) {
			return "<a href=\"" . $this->ExportXmlUrl . "\" class=\"ew-export-link ew-xml\" title=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToXmlText")) . "\">" . $Language->phrase("ExportToXml") . "</a>";
		} elseif (SameText($type, "csv")) {
			return "<a href=\"" . $this->ExportCsvUrl . "\" class=\"ew-export-link ew-csv\" title=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToCsvText")) . "\">" . $Language->phrase("ExportToCsv") . "</a>";
		} elseif (SameText($type, "email")) {
			$url = $custom ? ",url:'" . $this->pageUrl() . "export=email&amp;custom=1'" : "";
			return '<button id="emf_v101_ho_2" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_v101_ho_2\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fv101_ho_2list, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
		} elseif (SameText($type, "print")) {
			return "<a href=\"" . $this->ExportPrintUrl . "\" class=\"ew-export-link ew-print\" title=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("PrinterFriendlyText")) . "\">" . $Language->phrase("PrinterFriendly") . "</a>";
		}
	}

	// Set up export options
	protected function setupExportOptions()
	{
		global $Language;

		// Printer friendly
		$item = &$this->ExportOptions->add("print");
		$item->Body = $this->getExportTag("print");
		$item->Visible = FALSE;

		// Export to Excel
		$item = &$this->ExportOptions->add("excel");
		$item->Body = $this->getExportTag("excel");
		$item->Visible = TRUE;

		// Export to Word
		$item = &$this->ExportOptions->add("word");
		$item->Body = $this->getExportTag("word");
		$item->Visible = FALSE;

		// Export to Html
		$item = &$this->ExportOptions->add("html");
		$item->Body = $this->getExportTag("html");
		$item->Visible = FALSE;

		// Export to Xml
		$item = &$this->ExportOptions->add("xml");
		$item->Body = $this->getExportTag("xml");
		$item->Visible = FALSE;

		// Export to Csv
		$item = &$this->ExportOptions->add("csv");
		$item->Body = $this->getExportTag("csv");
		$item->Visible = FALSE;

		// Export to Pdf
		$item = &$this->ExportOptions->add("pdf");
		$item->Body = $this->getExportTag("pdf");
		$item->Visible = FALSE;

		// Export to Email
		$item = &$this->ExportOptions->add("email");
		$item->Body = $this->getExportTag("email");
		$item->Visible = FALSE;

		// Drop down button for export
		$this->ExportOptions->UseButtonGroup = TRUE;
		$this->ExportOptions->UseDropDownButton = FALSE;
		if ($this->ExportOptions->UseButtonGroup && IsMobile())
			$this->ExportOptions->UseDropDownButton = TRUE;
		$this->ExportOptions->DropDownButtonPhrase = $Language->phrase("ButtonExport");

		// Add group option item
		$item = &$this->ExportOptions->add($this->ExportOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;
	}

	// Set up search options
	protected function setupSearchOptions()
	{
		global $Language;
		$this->SearchOptions = new ListOptions("div");
		$this->SearchOptions->TagClassName = "ew-search-option";

		// Search button
		$item = &$this->SearchOptions->add("searchtoggle");
		$searchToggleClass = ($this->SearchWhere != "") ? " active" : " active";
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fv101_ho_2listsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
		$item->Visible = TRUE;

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Button group for search
		$this->SearchOptions->UseDropDownButton = FALSE;
		$this->SearchOptions->UseButtonGroup = TRUE;
		$this->SearchOptions->DropDownButtonPhrase = $Language->phrase("ButtonSearch");

		// Add group option item
		$item = &$this->SearchOptions->add($this->SearchOptions->GroupOptionName);
		$item->Body = "";
		$item->Visible = FALSE;

		// Hide search options
		if ($this->isExport() || $this->CurrentAction)
			$this->SearchOptions->hideAllOptions();
		global $Security;
		if (!$Security->canSearch()) {
			$this->SearchOptions->hideAllOptions();
			$this->FilterOptions->hideAllOptions();
		}
	}

	/**
	 * Export data in HTML/CSV/Word/Excel/XML/Email/PDF format
	 *
	 * @param boolean $return Return the data rather than output it
	 * @return mixed
	 */
	public function exportData($return = FALSE)
	{
		global $Language;
		$utf8 = SameText(Config("PROJECT_CHARSET"), "utf-8");
		$selectLimit = $this->UseSelectLimit;

		// Load recordset
		if ($selectLimit) {
			$this->TotalRecords = $this->listRecordCount();
		} else {
			if (!$this->Recordset)
				$this->Recordset = $this->loadRecordset();
			$rs = &$this->Recordset;
			if ($rs)
				$this->TotalRecords = $rs->RecordCount();
		}
		$this->StartRecord = 1;

		// Export all
		if ($this->ExportAll) {
			set_time_limit(Config("EXPORT_ALL_TIME_LIMIT"));
			$this->DisplayRecords = $this->TotalRecords;
			$this->StopRecord = $this->TotalRecords;
		} else { // Export one page only
			$this->setupStartRecord(); // Set up start record position

			// Set the last record to display
			if ($this->DisplayRecords <= 0) {
				$this->StopRecord = $this->TotalRecords;
			} else {
				$this->StopRecord = $this->StartRecord + $this->DisplayRecords - 1;
			}
		}
		if ($selectLimit)
			$rs = $this->loadRecordset($this->StartRecord - 1, $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords);
		$this->ExportDoc = GetExportDocument($this, "h");
		$doc = &$this->ExportDoc;
		if (!$doc)
			$this->setFailureMessage($Language->phrase("ExportClassNotFound")); // Export class not found
		if (!$rs || !$doc) {
			RemoveHeader("Content-Type"); // Remove header
			RemoveHeader("Content-Disposition");
			$this->showMessage();
			return;
		}
		if ($selectLimit) {
			$this->StartRecord = 1;
			$this->StopRecord = $this->DisplayRecords <= 0 ? $this->TotalRecords : $this->DisplayRecords;
		}

		// Call Page Exporting server event
		$this->ExportDoc->ExportCustom = !$this->Page_Exporting();
		$header = $this->PageHeader;
		$this->Page_DataRendering($header);
		$doc->Text .= $header;
		$this->exportDocument($doc, $rs, $this->StartRecord, $this->StopRecord, "");
		$footer = $this->PageFooter;
		$this->Page_DataRendered($footer);
		$doc->Text .= $footer;

		// Close recordset
		$rs->close();

		// Call Page Exported server event
		$this->Page_Exported();

		// Export header and footer
		$doc->exportHeaderAndFooter();

		// Clean output buffer (without destroying output buffer)
		$buffer = ob_get_contents(); // Save the output buffer
		if (!Config("DEBUG") && $buffer)
			ob_clean();

		// Write debug message if enabled
		if (Config("DEBUG") && !$this->isExport("pdf"))
			echo GetDebugMessage();

		// Output data
		if ($this->isExport("email")) {

			// Export-to-email disabled
		} else {
			$doc->export();
			if ($return) {
				RemoveHeader("Content-Type"); // Remove header
				RemoveHeader("Content-Disposition");
				$content = ob_get_contents();
				if ($content)
					ob_clean();
				if ($buffer)
					echo $buffer; // Resume the output buffer
				return $content;
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$url = preg_replace('/\?cmd=reset(all){0,1}$/i', '', $url); // Remove cmd=reset / cmd=resetall
		$Breadcrumb->add("list", $this->TableVar, $url, "", $this->TableVar, TRUE);
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

	// Set up starting record parameters
	public function setupStartRecord()
	{
		if ($this->DisplayRecords == 0)
			return;
		if ($this->isPageRequest()) { // Validate request
			$startRec = Get(Config("TABLE_START_REC"));
			$pageNo = Get(Config("TABLE_PAGE_NO"));
			if ($pageNo !== NULL) { // Check for "pageno" parameter first
				if (is_numeric($pageNo)) {
					$this->StartRecord = ($pageNo - 1) * $this->DisplayRecords + 1;
					if ($this->StartRecord <= 0) {
						$this->StartRecord = 1;
					} elseif ($this->StartRecord >= (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1) {
						$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1;
					}
					$this->setStartRecordNumber($this->StartRecord);
				}
			} elseif ($startRec !== NULL) { // Check for "start" parameter
				$this->StartRecord = $startRec;
				$this->setStartRecordNumber($this->StartRecord);
			}
		}
		$this->StartRecord = $this->getStartRecordNumber();

		// Check if correct start record counter
		if (!is_numeric($this->StartRecord) || $this->StartRecord == "") { // Avoid invalid start record counter
			$this->StartRecord = 1; // Reset start record counter
			$this->setStartRecordNumber($this->StartRecord);
		} elseif ($this->StartRecord > $this->TotalRecords) { // Avoid starting record > total records
			$this->StartRecord = (int)(($this->TotalRecords - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to last page first record
			$this->setStartRecordNumber($this->StartRecord);
		} elseif (($this->StartRecord - 1) % $this->DisplayRecords != 0) {
			$this->StartRecord = (int)(($this->StartRecord - 1)/$this->DisplayRecords) * $this->DisplayRecords + 1; // Point to page boundary
			$this->setStartRecordNumber($this->StartRecord);
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

	// ListOptions Load event
	function ListOptions_Load() {

		// Example:
		//$opt = &$this->ListOptions->Add("new");
		//$opt->Header = "xxx";
		//$opt->OnLeft = TRUE; // Link on left
		//$opt->MoveTo(0); // Move to first column

	}

	// ListOptions Rendering event
	function ListOptions_Rendering() {

		//$GLOBALS["xxx_grid"]->DetailAdd = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailEdit = (...condition...); // Set to TRUE or FALSE conditionally
		//$GLOBALS["xxx_grid"]->DetailView = (...condition...); // Set to TRUE or FALSE conditionally

	}

	// ListOptions Rendered event
	function ListOptions_Rendered() {

		// Example:
		//$this->ListOptions["new"]->Body = "xxx";

	}

	// Row Custom Action event
	function Row_CustomAction($action, $row) {

		// Return FALSE to abort
		return TRUE;
	}

	// Page Exporting event
	// $this->ExportDoc = export document object
	function Page_Exporting() {

		//$this->ExportDoc->Text = "my header"; // Export header
		//return FALSE; // Return FALSE to skip default export and use Row_Export event

		return TRUE; // Return TRUE to use default export and skip Row_Export event
	}

	// Row Export event
	// $this->ExportDoc = export document object
	function Row_Export($rs) {

		//$this->ExportDoc->Text .= "my content"; // Build HTML with field value: $rs["MyField"] or $this->MyField->ViewValue
	}

	// Page Exported event
	// $this->ExportDoc = export document object
	function Page_Exported() {

		//$this->ExportDoc->Text .= "my footer"; // Export footer
		//echo $this->ExportDoc->Text;

	}

	// Page Importing event
	function Page_Importing($reader, &$options) {

		//var_dump($reader); // Import data reader
		//var_dump($options); // Show all options for importing
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Row Import event
	function Row_Import(&$row, $cnt) {

		//echo $cnt; // Import record count
		//var_dump($row); // Import row
		//return FALSE; // Return FALSE to skip import

		return TRUE;
	}

	// Page Imported event
	function Page_Imported($reader, $results) {

		//var_dump($reader); // Import data reader
		//var_dump($results); // Import results

	}
} // End class
?>