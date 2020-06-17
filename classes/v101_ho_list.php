<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class v101_ho_list extends v101_ho
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 'v101_ho';

	// Page object name
	public $PageObjName = "v101_ho_list";

	// Grid form hidden field names
	public $FormName = "fv101_holist";
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

		// Table object (v101_ho)
		if (!isset($GLOBALS["v101_ho"]) || get_class($GLOBALS["v101_ho"]) == PROJECT_NAMESPACE . "v101_ho") {
			$GLOBALS["v101_ho"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["v101_ho"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "v101_hoadd.php";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "v101_hodelete.php";
		$this->MultiUpdateUrl = "v101_houpdate.php";

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 'v101_ho');

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
		$this->FilterOptions->TagClassName = "ew-filter-option fv101_holistsrch";

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
		global $v101_ho;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($v101_ho);
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
		$this->TransactionNo->setVisibility();
		$this->TransactionDate->setVisibility();
		$this->TransactionType->setVisibility();
		$this->HandedOverTo->setVisibility();
		$this->CodeNoTo->setVisibility();
		$this->DepartmentTo->setVisibility();
		$this->HandedOverBy->setVisibility();
		$this->CodeNoBy->setVisibility();
		$this->DepartmentBy->setVisibility();
		$this->Sign1->setVisibility();
		$this->Sign2->setVisibility();
		$this->Sign3->setVisibility();
		$this->Sign4->setVisibility();
		$this->hodetail_id->setVisibility();
		$this->asset_id->setVisibility();
		$this->Property->setVisibility();
		$this->TemplateFile->setVisibility();
		$this->hoDepartmentTo->setVisibility();
		$this->hoSignatureTo->setVisibility();
		$this->hoJobTitleTo->setVisibility();
		$this->hoDepartmentBy->setVisibility();
		$this->hoSignatureBy->setVisibility();
		$this->hoJobTitleBy->setVisibility();
		$this->Description->setVisibility();
		$this->ProcurementDate->setVisibility();
		$this->ProcurementCurrentCost->setVisibility();
		$this->DepreciationAmount->setVisibility();
		$this->DepreciationYtd->setVisibility();
		$this->NetBookValue->setVisibility();
		$this->Periode->setVisibility();
		$this->Qty->setVisibility();
		$this->Remarks->Visible = FALSE;
		$this->Sign1Signature->setVisibility();
		$this->Sign1JobTitle->setVisibility();
		$this->Sign2Signature->setVisibility();
		$this->Sign2JobTitle->setVisibility();
		$this->Sign3Signature->setVisibility();
		$this->Sign3JobTitle->setVisibility();
		$this->Sign4Signature->setVisibility();
		$this->Sign4JobTitle->setVisibility();
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
		$filterList = Concat($filterList, $this->TransactionNo->AdvancedSearch->toJson(), ","); // Field TransactionNo
		$filterList = Concat($filterList, $this->TransactionDate->AdvancedSearch->toJson(), ","); // Field TransactionDate
		$filterList = Concat($filterList, $this->TransactionType->AdvancedSearch->toJson(), ","); // Field TransactionType
		$filterList = Concat($filterList, $this->HandedOverTo->AdvancedSearch->toJson(), ","); // Field HandedOverTo
		$filterList = Concat($filterList, $this->CodeNoTo->AdvancedSearch->toJson(), ","); // Field CodeNoTo
		$filterList = Concat($filterList, $this->DepartmentTo->AdvancedSearch->toJson(), ","); // Field DepartmentTo
		$filterList = Concat($filterList, $this->HandedOverBy->AdvancedSearch->toJson(), ","); // Field HandedOverBy
		$filterList = Concat($filterList, $this->CodeNoBy->AdvancedSearch->toJson(), ","); // Field CodeNoBy
		$filterList = Concat($filterList, $this->DepartmentBy->AdvancedSearch->toJson(), ","); // Field DepartmentBy
		$filterList = Concat($filterList, $this->Sign1->AdvancedSearch->toJson(), ","); // Field Sign1
		$filterList = Concat($filterList, $this->Sign2->AdvancedSearch->toJson(), ","); // Field Sign2
		$filterList = Concat($filterList, $this->Sign3->AdvancedSearch->toJson(), ","); // Field Sign3
		$filterList = Concat($filterList, $this->Sign4->AdvancedSearch->toJson(), ","); // Field Sign4
		$filterList = Concat($filterList, $this->hodetail_id->AdvancedSearch->toJson(), ","); // Field hodetail_id
		$filterList = Concat($filterList, $this->asset_id->AdvancedSearch->toJson(), ","); // Field asset_id
		$filterList = Concat($filterList, $this->Property->AdvancedSearch->toJson(), ","); // Field Property
		$filterList = Concat($filterList, $this->TemplateFile->AdvancedSearch->toJson(), ","); // Field TemplateFile
		$filterList = Concat($filterList, $this->hoDepartmentTo->AdvancedSearch->toJson(), ","); // Field hoDepartmentTo
		$filterList = Concat($filterList, $this->hoSignatureTo->AdvancedSearch->toJson(), ","); // Field hoSignatureTo
		$filterList = Concat($filterList, $this->hoJobTitleTo->AdvancedSearch->toJson(), ","); // Field hoJobTitleTo
		$filterList = Concat($filterList, $this->hoDepartmentBy->AdvancedSearch->toJson(), ","); // Field hoDepartmentBy
		$filterList = Concat($filterList, $this->hoSignatureBy->AdvancedSearch->toJson(), ","); // Field hoSignatureBy
		$filterList = Concat($filterList, $this->hoJobTitleBy->AdvancedSearch->toJson(), ","); // Field hoJobTitleBy
		$filterList = Concat($filterList, $this->Description->AdvancedSearch->toJson(), ","); // Field Description
		$filterList = Concat($filterList, $this->ProcurementDate->AdvancedSearch->toJson(), ","); // Field ProcurementDate
		$filterList = Concat($filterList, $this->ProcurementCurrentCost->AdvancedSearch->toJson(), ","); // Field ProcurementCurrentCost
		$filterList = Concat($filterList, $this->DepreciationAmount->AdvancedSearch->toJson(), ","); // Field DepreciationAmount
		$filterList = Concat($filterList, $this->DepreciationYtd->AdvancedSearch->toJson(), ","); // Field DepreciationYtd
		$filterList = Concat($filterList, $this->NetBookValue->AdvancedSearch->toJson(), ","); // Field NetBookValue
		$filterList = Concat($filterList, $this->Periode->AdvancedSearch->toJson(), ","); // Field Periode
		$filterList = Concat($filterList, $this->Qty->AdvancedSearch->toJson(), ","); // Field Qty
		$filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks
		$filterList = Concat($filterList, $this->Sign1Signature->AdvancedSearch->toJson(), ","); // Field Sign1Signature
		$filterList = Concat($filterList, $this->Sign1JobTitle->AdvancedSearch->toJson(), ","); // Field Sign1JobTitle
		$filterList = Concat($filterList, $this->Sign2Signature->AdvancedSearch->toJson(), ","); // Field Sign2Signature
		$filterList = Concat($filterList, $this->Sign2JobTitle->AdvancedSearch->toJson(), ","); // Field Sign2JobTitle
		$filterList = Concat($filterList, $this->Sign3Signature->AdvancedSearch->toJson(), ","); // Field Sign3Signature
		$filterList = Concat($filterList, $this->Sign3JobTitle->AdvancedSearch->toJson(), ","); // Field Sign3JobTitle
		$filterList = Concat($filterList, $this->Sign4Signature->AdvancedSearch->toJson(), ","); // Field Sign4Signature
		$filterList = Concat($filterList, $this->Sign4JobTitle->AdvancedSearch->toJson(), ","); // Field Sign4JobTitle
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
			$UserProfile->setSearchFilters(CurrentUserName(), "fv101_holistsrch", $filters);
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

		// Field TransactionNo
		$this->TransactionNo->AdvancedSearch->SearchValue = @$filter["x_TransactionNo"];
		$this->TransactionNo->AdvancedSearch->SearchOperator = @$filter["z_TransactionNo"];
		$this->TransactionNo->AdvancedSearch->SearchCondition = @$filter["v_TransactionNo"];
		$this->TransactionNo->AdvancedSearch->SearchValue2 = @$filter["y_TransactionNo"];
		$this->TransactionNo->AdvancedSearch->SearchOperator2 = @$filter["w_TransactionNo"];
		$this->TransactionNo->AdvancedSearch->save();

		// Field TransactionDate
		$this->TransactionDate->AdvancedSearch->SearchValue = @$filter["x_TransactionDate"];
		$this->TransactionDate->AdvancedSearch->SearchOperator = @$filter["z_TransactionDate"];
		$this->TransactionDate->AdvancedSearch->SearchCondition = @$filter["v_TransactionDate"];
		$this->TransactionDate->AdvancedSearch->SearchValue2 = @$filter["y_TransactionDate"];
		$this->TransactionDate->AdvancedSearch->SearchOperator2 = @$filter["w_TransactionDate"];
		$this->TransactionDate->AdvancedSearch->save();

		// Field TransactionType
		$this->TransactionType->AdvancedSearch->SearchValue = @$filter["x_TransactionType"];
		$this->TransactionType->AdvancedSearch->SearchOperator = @$filter["z_TransactionType"];
		$this->TransactionType->AdvancedSearch->SearchCondition = @$filter["v_TransactionType"];
		$this->TransactionType->AdvancedSearch->SearchValue2 = @$filter["y_TransactionType"];
		$this->TransactionType->AdvancedSearch->SearchOperator2 = @$filter["w_TransactionType"];
		$this->TransactionType->AdvancedSearch->save();

		// Field HandedOverTo
		$this->HandedOverTo->AdvancedSearch->SearchValue = @$filter["x_HandedOverTo"];
		$this->HandedOverTo->AdvancedSearch->SearchOperator = @$filter["z_HandedOverTo"];
		$this->HandedOverTo->AdvancedSearch->SearchCondition = @$filter["v_HandedOverTo"];
		$this->HandedOverTo->AdvancedSearch->SearchValue2 = @$filter["y_HandedOverTo"];
		$this->HandedOverTo->AdvancedSearch->SearchOperator2 = @$filter["w_HandedOverTo"];
		$this->HandedOverTo->AdvancedSearch->save();

		// Field CodeNoTo
		$this->CodeNoTo->AdvancedSearch->SearchValue = @$filter["x_CodeNoTo"];
		$this->CodeNoTo->AdvancedSearch->SearchOperator = @$filter["z_CodeNoTo"];
		$this->CodeNoTo->AdvancedSearch->SearchCondition = @$filter["v_CodeNoTo"];
		$this->CodeNoTo->AdvancedSearch->SearchValue2 = @$filter["y_CodeNoTo"];
		$this->CodeNoTo->AdvancedSearch->SearchOperator2 = @$filter["w_CodeNoTo"];
		$this->CodeNoTo->AdvancedSearch->save();

		// Field DepartmentTo
		$this->DepartmentTo->AdvancedSearch->SearchValue = @$filter["x_DepartmentTo"];
		$this->DepartmentTo->AdvancedSearch->SearchOperator = @$filter["z_DepartmentTo"];
		$this->DepartmentTo->AdvancedSearch->SearchCondition = @$filter["v_DepartmentTo"];
		$this->DepartmentTo->AdvancedSearch->SearchValue2 = @$filter["y_DepartmentTo"];
		$this->DepartmentTo->AdvancedSearch->SearchOperator2 = @$filter["w_DepartmentTo"];
		$this->DepartmentTo->AdvancedSearch->save();

		// Field HandedOverBy
		$this->HandedOverBy->AdvancedSearch->SearchValue = @$filter["x_HandedOverBy"];
		$this->HandedOverBy->AdvancedSearch->SearchOperator = @$filter["z_HandedOverBy"];
		$this->HandedOverBy->AdvancedSearch->SearchCondition = @$filter["v_HandedOverBy"];
		$this->HandedOverBy->AdvancedSearch->SearchValue2 = @$filter["y_HandedOverBy"];
		$this->HandedOverBy->AdvancedSearch->SearchOperator2 = @$filter["w_HandedOverBy"];
		$this->HandedOverBy->AdvancedSearch->save();

		// Field CodeNoBy
		$this->CodeNoBy->AdvancedSearch->SearchValue = @$filter["x_CodeNoBy"];
		$this->CodeNoBy->AdvancedSearch->SearchOperator = @$filter["z_CodeNoBy"];
		$this->CodeNoBy->AdvancedSearch->SearchCondition = @$filter["v_CodeNoBy"];
		$this->CodeNoBy->AdvancedSearch->SearchValue2 = @$filter["y_CodeNoBy"];
		$this->CodeNoBy->AdvancedSearch->SearchOperator2 = @$filter["w_CodeNoBy"];
		$this->CodeNoBy->AdvancedSearch->save();

		// Field DepartmentBy
		$this->DepartmentBy->AdvancedSearch->SearchValue = @$filter["x_DepartmentBy"];
		$this->DepartmentBy->AdvancedSearch->SearchOperator = @$filter["z_DepartmentBy"];
		$this->DepartmentBy->AdvancedSearch->SearchCondition = @$filter["v_DepartmentBy"];
		$this->DepartmentBy->AdvancedSearch->SearchValue2 = @$filter["y_DepartmentBy"];
		$this->DepartmentBy->AdvancedSearch->SearchOperator2 = @$filter["w_DepartmentBy"];
		$this->DepartmentBy->AdvancedSearch->save();

		// Field Sign1
		$this->Sign1->AdvancedSearch->SearchValue = @$filter["x_Sign1"];
		$this->Sign1->AdvancedSearch->SearchOperator = @$filter["z_Sign1"];
		$this->Sign1->AdvancedSearch->SearchCondition = @$filter["v_Sign1"];
		$this->Sign1->AdvancedSearch->SearchValue2 = @$filter["y_Sign1"];
		$this->Sign1->AdvancedSearch->SearchOperator2 = @$filter["w_Sign1"];
		$this->Sign1->AdvancedSearch->save();

		// Field Sign2
		$this->Sign2->AdvancedSearch->SearchValue = @$filter["x_Sign2"];
		$this->Sign2->AdvancedSearch->SearchOperator = @$filter["z_Sign2"];
		$this->Sign2->AdvancedSearch->SearchCondition = @$filter["v_Sign2"];
		$this->Sign2->AdvancedSearch->SearchValue2 = @$filter["y_Sign2"];
		$this->Sign2->AdvancedSearch->SearchOperator2 = @$filter["w_Sign2"];
		$this->Sign2->AdvancedSearch->save();

		// Field Sign3
		$this->Sign3->AdvancedSearch->SearchValue = @$filter["x_Sign3"];
		$this->Sign3->AdvancedSearch->SearchOperator = @$filter["z_Sign3"];
		$this->Sign3->AdvancedSearch->SearchCondition = @$filter["v_Sign3"];
		$this->Sign3->AdvancedSearch->SearchValue2 = @$filter["y_Sign3"];
		$this->Sign3->AdvancedSearch->SearchOperator2 = @$filter["w_Sign3"];
		$this->Sign3->AdvancedSearch->save();

		// Field Sign4
		$this->Sign4->AdvancedSearch->SearchValue = @$filter["x_Sign4"];
		$this->Sign4->AdvancedSearch->SearchOperator = @$filter["z_Sign4"];
		$this->Sign4->AdvancedSearch->SearchCondition = @$filter["v_Sign4"];
		$this->Sign4->AdvancedSearch->SearchValue2 = @$filter["y_Sign4"];
		$this->Sign4->AdvancedSearch->SearchOperator2 = @$filter["w_Sign4"];
		$this->Sign4->AdvancedSearch->save();

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

		// Field Property
		$this->Property->AdvancedSearch->SearchValue = @$filter["x_Property"];
		$this->Property->AdvancedSearch->SearchOperator = @$filter["z_Property"];
		$this->Property->AdvancedSearch->SearchCondition = @$filter["v_Property"];
		$this->Property->AdvancedSearch->SearchValue2 = @$filter["y_Property"];
		$this->Property->AdvancedSearch->SearchOperator2 = @$filter["w_Property"];
		$this->Property->AdvancedSearch->save();

		// Field TemplateFile
		$this->TemplateFile->AdvancedSearch->SearchValue = @$filter["x_TemplateFile"];
		$this->TemplateFile->AdvancedSearch->SearchOperator = @$filter["z_TemplateFile"];
		$this->TemplateFile->AdvancedSearch->SearchCondition = @$filter["v_TemplateFile"];
		$this->TemplateFile->AdvancedSearch->SearchValue2 = @$filter["y_TemplateFile"];
		$this->TemplateFile->AdvancedSearch->SearchOperator2 = @$filter["w_TemplateFile"];
		$this->TemplateFile->AdvancedSearch->save();

		// Field hoDepartmentTo
		$this->hoDepartmentTo->AdvancedSearch->SearchValue = @$filter["x_hoDepartmentTo"];
		$this->hoDepartmentTo->AdvancedSearch->SearchOperator = @$filter["z_hoDepartmentTo"];
		$this->hoDepartmentTo->AdvancedSearch->SearchCondition = @$filter["v_hoDepartmentTo"];
		$this->hoDepartmentTo->AdvancedSearch->SearchValue2 = @$filter["y_hoDepartmentTo"];
		$this->hoDepartmentTo->AdvancedSearch->SearchOperator2 = @$filter["w_hoDepartmentTo"];
		$this->hoDepartmentTo->AdvancedSearch->save();

		// Field hoSignatureTo
		$this->hoSignatureTo->AdvancedSearch->SearchValue = @$filter["x_hoSignatureTo"];
		$this->hoSignatureTo->AdvancedSearch->SearchOperator = @$filter["z_hoSignatureTo"];
		$this->hoSignatureTo->AdvancedSearch->SearchCondition = @$filter["v_hoSignatureTo"];
		$this->hoSignatureTo->AdvancedSearch->SearchValue2 = @$filter["y_hoSignatureTo"];
		$this->hoSignatureTo->AdvancedSearch->SearchOperator2 = @$filter["w_hoSignatureTo"];
		$this->hoSignatureTo->AdvancedSearch->save();

		// Field hoJobTitleTo
		$this->hoJobTitleTo->AdvancedSearch->SearchValue = @$filter["x_hoJobTitleTo"];
		$this->hoJobTitleTo->AdvancedSearch->SearchOperator = @$filter["z_hoJobTitleTo"];
		$this->hoJobTitleTo->AdvancedSearch->SearchCondition = @$filter["v_hoJobTitleTo"];
		$this->hoJobTitleTo->AdvancedSearch->SearchValue2 = @$filter["y_hoJobTitleTo"];
		$this->hoJobTitleTo->AdvancedSearch->SearchOperator2 = @$filter["w_hoJobTitleTo"];
		$this->hoJobTitleTo->AdvancedSearch->save();

		// Field hoDepartmentBy
		$this->hoDepartmentBy->AdvancedSearch->SearchValue = @$filter["x_hoDepartmentBy"];
		$this->hoDepartmentBy->AdvancedSearch->SearchOperator = @$filter["z_hoDepartmentBy"];
		$this->hoDepartmentBy->AdvancedSearch->SearchCondition = @$filter["v_hoDepartmentBy"];
		$this->hoDepartmentBy->AdvancedSearch->SearchValue2 = @$filter["y_hoDepartmentBy"];
		$this->hoDepartmentBy->AdvancedSearch->SearchOperator2 = @$filter["w_hoDepartmentBy"];
		$this->hoDepartmentBy->AdvancedSearch->save();

		// Field hoSignatureBy
		$this->hoSignatureBy->AdvancedSearch->SearchValue = @$filter["x_hoSignatureBy"];
		$this->hoSignatureBy->AdvancedSearch->SearchOperator = @$filter["z_hoSignatureBy"];
		$this->hoSignatureBy->AdvancedSearch->SearchCondition = @$filter["v_hoSignatureBy"];
		$this->hoSignatureBy->AdvancedSearch->SearchValue2 = @$filter["y_hoSignatureBy"];
		$this->hoSignatureBy->AdvancedSearch->SearchOperator2 = @$filter["w_hoSignatureBy"];
		$this->hoSignatureBy->AdvancedSearch->save();

		// Field hoJobTitleBy
		$this->hoJobTitleBy->AdvancedSearch->SearchValue = @$filter["x_hoJobTitleBy"];
		$this->hoJobTitleBy->AdvancedSearch->SearchOperator = @$filter["z_hoJobTitleBy"];
		$this->hoJobTitleBy->AdvancedSearch->SearchCondition = @$filter["v_hoJobTitleBy"];
		$this->hoJobTitleBy->AdvancedSearch->SearchValue2 = @$filter["y_hoJobTitleBy"];
		$this->hoJobTitleBy->AdvancedSearch->SearchOperator2 = @$filter["w_hoJobTitleBy"];
		$this->hoJobTitleBy->AdvancedSearch->save();

		// Field Description
		$this->Description->AdvancedSearch->SearchValue = @$filter["x_Description"];
		$this->Description->AdvancedSearch->SearchOperator = @$filter["z_Description"];
		$this->Description->AdvancedSearch->SearchCondition = @$filter["v_Description"];
		$this->Description->AdvancedSearch->SearchValue2 = @$filter["y_Description"];
		$this->Description->AdvancedSearch->SearchOperator2 = @$filter["w_Description"];
		$this->Description->AdvancedSearch->save();

		// Field ProcurementDate
		$this->ProcurementDate->AdvancedSearch->SearchValue = @$filter["x_ProcurementDate"];
		$this->ProcurementDate->AdvancedSearch->SearchOperator = @$filter["z_ProcurementDate"];
		$this->ProcurementDate->AdvancedSearch->SearchCondition = @$filter["v_ProcurementDate"];
		$this->ProcurementDate->AdvancedSearch->SearchValue2 = @$filter["y_ProcurementDate"];
		$this->ProcurementDate->AdvancedSearch->SearchOperator2 = @$filter["w_ProcurementDate"];
		$this->ProcurementDate->AdvancedSearch->save();

		// Field ProcurementCurrentCost
		$this->ProcurementCurrentCost->AdvancedSearch->SearchValue = @$filter["x_ProcurementCurrentCost"];
		$this->ProcurementCurrentCost->AdvancedSearch->SearchOperator = @$filter["z_ProcurementCurrentCost"];
		$this->ProcurementCurrentCost->AdvancedSearch->SearchCondition = @$filter["v_ProcurementCurrentCost"];
		$this->ProcurementCurrentCost->AdvancedSearch->SearchValue2 = @$filter["y_ProcurementCurrentCost"];
		$this->ProcurementCurrentCost->AdvancedSearch->SearchOperator2 = @$filter["w_ProcurementCurrentCost"];
		$this->ProcurementCurrentCost->AdvancedSearch->save();

		// Field DepreciationAmount
		$this->DepreciationAmount->AdvancedSearch->SearchValue = @$filter["x_DepreciationAmount"];
		$this->DepreciationAmount->AdvancedSearch->SearchOperator = @$filter["z_DepreciationAmount"];
		$this->DepreciationAmount->AdvancedSearch->SearchCondition = @$filter["v_DepreciationAmount"];
		$this->DepreciationAmount->AdvancedSearch->SearchValue2 = @$filter["y_DepreciationAmount"];
		$this->DepreciationAmount->AdvancedSearch->SearchOperator2 = @$filter["w_DepreciationAmount"];
		$this->DepreciationAmount->AdvancedSearch->save();

		// Field DepreciationYtd
		$this->DepreciationYtd->AdvancedSearch->SearchValue = @$filter["x_DepreciationYtd"];
		$this->DepreciationYtd->AdvancedSearch->SearchOperator = @$filter["z_DepreciationYtd"];
		$this->DepreciationYtd->AdvancedSearch->SearchCondition = @$filter["v_DepreciationYtd"];
		$this->DepreciationYtd->AdvancedSearch->SearchValue2 = @$filter["y_DepreciationYtd"];
		$this->DepreciationYtd->AdvancedSearch->SearchOperator2 = @$filter["w_DepreciationYtd"];
		$this->DepreciationYtd->AdvancedSearch->save();

		// Field NetBookValue
		$this->NetBookValue->AdvancedSearch->SearchValue = @$filter["x_NetBookValue"];
		$this->NetBookValue->AdvancedSearch->SearchOperator = @$filter["z_NetBookValue"];
		$this->NetBookValue->AdvancedSearch->SearchCondition = @$filter["v_NetBookValue"];
		$this->NetBookValue->AdvancedSearch->SearchValue2 = @$filter["y_NetBookValue"];
		$this->NetBookValue->AdvancedSearch->SearchOperator2 = @$filter["w_NetBookValue"];
		$this->NetBookValue->AdvancedSearch->save();

		// Field Periode
		$this->Periode->AdvancedSearch->SearchValue = @$filter["x_Periode"];
		$this->Periode->AdvancedSearch->SearchOperator = @$filter["z_Periode"];
		$this->Periode->AdvancedSearch->SearchCondition = @$filter["v_Periode"];
		$this->Periode->AdvancedSearch->SearchValue2 = @$filter["y_Periode"];
		$this->Periode->AdvancedSearch->SearchOperator2 = @$filter["w_Periode"];
		$this->Periode->AdvancedSearch->save();

		// Field Qty
		$this->Qty->AdvancedSearch->SearchValue = @$filter["x_Qty"];
		$this->Qty->AdvancedSearch->SearchOperator = @$filter["z_Qty"];
		$this->Qty->AdvancedSearch->SearchCondition = @$filter["v_Qty"];
		$this->Qty->AdvancedSearch->SearchValue2 = @$filter["y_Qty"];
		$this->Qty->AdvancedSearch->SearchOperator2 = @$filter["w_Qty"];
		$this->Qty->AdvancedSearch->save();

		// Field Remarks
		$this->Remarks->AdvancedSearch->SearchValue = @$filter["x_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator = @$filter["z_Remarks"];
		$this->Remarks->AdvancedSearch->SearchCondition = @$filter["v_Remarks"];
		$this->Remarks->AdvancedSearch->SearchValue2 = @$filter["y_Remarks"];
		$this->Remarks->AdvancedSearch->SearchOperator2 = @$filter["w_Remarks"];
		$this->Remarks->AdvancedSearch->save();

		// Field Sign1Signature
		$this->Sign1Signature->AdvancedSearch->SearchValue = @$filter["x_Sign1Signature"];
		$this->Sign1Signature->AdvancedSearch->SearchOperator = @$filter["z_Sign1Signature"];
		$this->Sign1Signature->AdvancedSearch->SearchCondition = @$filter["v_Sign1Signature"];
		$this->Sign1Signature->AdvancedSearch->SearchValue2 = @$filter["y_Sign1Signature"];
		$this->Sign1Signature->AdvancedSearch->SearchOperator2 = @$filter["w_Sign1Signature"];
		$this->Sign1Signature->AdvancedSearch->save();

		// Field Sign1JobTitle
		$this->Sign1JobTitle->AdvancedSearch->SearchValue = @$filter["x_Sign1JobTitle"];
		$this->Sign1JobTitle->AdvancedSearch->SearchOperator = @$filter["z_Sign1JobTitle"];
		$this->Sign1JobTitle->AdvancedSearch->SearchCondition = @$filter["v_Sign1JobTitle"];
		$this->Sign1JobTitle->AdvancedSearch->SearchValue2 = @$filter["y_Sign1JobTitle"];
		$this->Sign1JobTitle->AdvancedSearch->SearchOperator2 = @$filter["w_Sign1JobTitle"];
		$this->Sign1JobTitle->AdvancedSearch->save();

		// Field Sign2Signature
		$this->Sign2Signature->AdvancedSearch->SearchValue = @$filter["x_Sign2Signature"];
		$this->Sign2Signature->AdvancedSearch->SearchOperator = @$filter["z_Sign2Signature"];
		$this->Sign2Signature->AdvancedSearch->SearchCondition = @$filter["v_Sign2Signature"];
		$this->Sign2Signature->AdvancedSearch->SearchValue2 = @$filter["y_Sign2Signature"];
		$this->Sign2Signature->AdvancedSearch->SearchOperator2 = @$filter["w_Sign2Signature"];
		$this->Sign2Signature->AdvancedSearch->save();

		// Field Sign2JobTitle
		$this->Sign2JobTitle->AdvancedSearch->SearchValue = @$filter["x_Sign2JobTitle"];
		$this->Sign2JobTitle->AdvancedSearch->SearchOperator = @$filter["z_Sign2JobTitle"];
		$this->Sign2JobTitle->AdvancedSearch->SearchCondition = @$filter["v_Sign2JobTitle"];
		$this->Sign2JobTitle->AdvancedSearch->SearchValue2 = @$filter["y_Sign2JobTitle"];
		$this->Sign2JobTitle->AdvancedSearch->SearchOperator2 = @$filter["w_Sign2JobTitle"];
		$this->Sign2JobTitle->AdvancedSearch->save();

		// Field Sign3Signature
		$this->Sign3Signature->AdvancedSearch->SearchValue = @$filter["x_Sign3Signature"];
		$this->Sign3Signature->AdvancedSearch->SearchOperator = @$filter["z_Sign3Signature"];
		$this->Sign3Signature->AdvancedSearch->SearchCondition = @$filter["v_Sign3Signature"];
		$this->Sign3Signature->AdvancedSearch->SearchValue2 = @$filter["y_Sign3Signature"];
		$this->Sign3Signature->AdvancedSearch->SearchOperator2 = @$filter["w_Sign3Signature"];
		$this->Sign3Signature->AdvancedSearch->save();

		// Field Sign3JobTitle
		$this->Sign3JobTitle->AdvancedSearch->SearchValue = @$filter["x_Sign3JobTitle"];
		$this->Sign3JobTitle->AdvancedSearch->SearchOperator = @$filter["z_Sign3JobTitle"];
		$this->Sign3JobTitle->AdvancedSearch->SearchCondition = @$filter["v_Sign3JobTitle"];
		$this->Sign3JobTitle->AdvancedSearch->SearchValue2 = @$filter["y_Sign3JobTitle"];
		$this->Sign3JobTitle->AdvancedSearch->SearchOperator2 = @$filter["w_Sign3JobTitle"];
		$this->Sign3JobTitle->AdvancedSearch->save();

		// Field Sign4Signature
		$this->Sign4Signature->AdvancedSearch->SearchValue = @$filter["x_Sign4Signature"];
		$this->Sign4Signature->AdvancedSearch->SearchOperator = @$filter["z_Sign4Signature"];
		$this->Sign4Signature->AdvancedSearch->SearchCondition = @$filter["v_Sign4Signature"];
		$this->Sign4Signature->AdvancedSearch->SearchValue2 = @$filter["y_Sign4Signature"];
		$this->Sign4Signature->AdvancedSearch->SearchOperator2 = @$filter["w_Sign4Signature"];
		$this->Sign4Signature->AdvancedSearch->save();

		// Field Sign4JobTitle
		$this->Sign4JobTitle->AdvancedSearch->SearchValue = @$filter["x_Sign4JobTitle"];
		$this->Sign4JobTitle->AdvancedSearch->SearchOperator = @$filter["z_Sign4JobTitle"];
		$this->Sign4JobTitle->AdvancedSearch->SearchCondition = @$filter["v_Sign4JobTitle"];
		$this->Sign4JobTitle->AdvancedSearch->SearchValue2 = @$filter["y_Sign4JobTitle"];
		$this->Sign4JobTitle->AdvancedSearch->SearchOperator2 = @$filter["w_Sign4JobTitle"];
		$this->Sign4JobTitle->AdvancedSearch->save();
		$this->BasicSearch->setKeyword(@$filter[Config("TABLE_BASIC_SEARCH")]);
		$this->BasicSearch->setType(@$filter[Config("TABLE_BASIC_SEARCH_TYPE")]);
	}

	// Return basic search SQL
	protected function basicSearchSql($arKeywords, $type)
	{
		$where = "";
		$this->buildBasicSearchSql($where, $this->TransactionNo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CodeNoTo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->CodeNoBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Property, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->TemplateFile, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoDepartmentTo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoSignatureTo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoJobTitleTo, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoDepartmentBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoSignatureBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->hoJobTitleBy, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Description, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Remarks, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign1Signature, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign1JobTitle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign2Signature, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign2JobTitle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign3Signature, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign3JobTitle, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign4Signature, $arKeywords, $type);
		$this->buildBasicSearchSql($where, $this->Sign4JobTitle, $arKeywords, $type);
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
			$this->updateSort($this->TransactionNo, $ctrl); // TransactionNo
			$this->updateSort($this->TransactionDate, $ctrl); // TransactionDate
			$this->updateSort($this->TransactionType, $ctrl); // TransactionType
			$this->updateSort($this->HandedOverTo, $ctrl); // HandedOverTo
			$this->updateSort($this->CodeNoTo, $ctrl); // CodeNoTo
			$this->updateSort($this->DepartmentTo, $ctrl); // DepartmentTo
			$this->updateSort($this->HandedOverBy, $ctrl); // HandedOverBy
			$this->updateSort($this->CodeNoBy, $ctrl); // CodeNoBy
			$this->updateSort($this->DepartmentBy, $ctrl); // DepartmentBy
			$this->updateSort($this->Sign1, $ctrl); // Sign1
			$this->updateSort($this->Sign2, $ctrl); // Sign2
			$this->updateSort($this->Sign3, $ctrl); // Sign3
			$this->updateSort($this->Sign4, $ctrl); // Sign4
			$this->updateSort($this->hodetail_id, $ctrl); // hodetail_id
			$this->updateSort($this->asset_id, $ctrl); // asset_id
			$this->updateSort($this->Property, $ctrl); // Property
			$this->updateSort($this->TemplateFile, $ctrl); // TemplateFile
			$this->updateSort($this->hoDepartmentTo, $ctrl); // hoDepartmentTo
			$this->updateSort($this->hoSignatureTo, $ctrl); // hoSignatureTo
			$this->updateSort($this->hoJobTitleTo, $ctrl); // hoJobTitleTo
			$this->updateSort($this->hoDepartmentBy, $ctrl); // hoDepartmentBy
			$this->updateSort($this->hoSignatureBy, $ctrl); // hoSignatureBy
			$this->updateSort($this->hoJobTitleBy, $ctrl); // hoJobTitleBy
			$this->updateSort($this->Description, $ctrl); // Description
			$this->updateSort($this->ProcurementDate, $ctrl); // ProcurementDate
			$this->updateSort($this->ProcurementCurrentCost, $ctrl); // ProcurementCurrentCost
			$this->updateSort($this->DepreciationAmount, $ctrl); // DepreciationAmount
			$this->updateSort($this->DepreciationYtd, $ctrl); // DepreciationYtd
			$this->updateSort($this->NetBookValue, $ctrl); // NetBookValue
			$this->updateSort($this->Periode, $ctrl); // Periode
			$this->updateSort($this->Qty, $ctrl); // Qty
			$this->updateSort($this->Sign1Signature, $ctrl); // Sign1Signature
			$this->updateSort($this->Sign1JobTitle, $ctrl); // Sign1JobTitle
			$this->updateSort($this->Sign2Signature, $ctrl); // Sign2Signature
			$this->updateSort($this->Sign2JobTitle, $ctrl); // Sign2JobTitle
			$this->updateSort($this->Sign3Signature, $ctrl); // Sign3Signature
			$this->updateSort($this->Sign3JobTitle, $ctrl); // Sign3JobTitle
			$this->updateSort($this->Sign4Signature, $ctrl); // Sign4Signature
			$this->updateSort($this->Sign4JobTitle, $ctrl); // Sign4JobTitle
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
				$this->TransactionNo->setSort("");
				$this->TransactionDate->setSort("");
				$this->TransactionType->setSort("");
				$this->HandedOverTo->setSort("");
				$this->CodeNoTo->setSort("");
				$this->DepartmentTo->setSort("");
				$this->HandedOverBy->setSort("");
				$this->CodeNoBy->setSort("");
				$this->DepartmentBy->setSort("");
				$this->Sign1->setSort("");
				$this->Sign2->setSort("");
				$this->Sign3->setSort("");
				$this->Sign4->setSort("");
				$this->hodetail_id->setSort("");
				$this->asset_id->setSort("");
				$this->Property->setSort("");
				$this->TemplateFile->setSort("");
				$this->hoDepartmentTo->setSort("");
				$this->hoSignatureTo->setSort("");
				$this->hoJobTitleTo->setSort("");
				$this->hoDepartmentBy->setSort("");
				$this->hoSignatureBy->setSort("");
				$this->hoJobTitleBy->setSort("");
				$this->Description->setSort("");
				$this->ProcurementDate->setSort("");
				$this->ProcurementCurrentCost->setSort("");
				$this->DepreciationAmount->setSort("");
				$this->DepreciationYtd->setSort("");
				$this->NetBookValue->setSort("");
				$this->Periode->setSort("");
				$this->Qty->setSort("");
				$this->Sign1Signature->setSort("");
				$this->Sign1JobTitle->setSort("");
				$this->Sign2Signature->setSort("");
				$this->Sign2JobTitle->setSort("");
				$this->Sign3Signature->setSort("");
				$this->Sign3JobTitle->setSort("");
				$this->Sign4Signature->setSort("");
				$this->Sign4JobTitle->setSort("");
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"fv101_holistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"fv101_holistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.fv101_holist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		$this->TransactionNo->setDbValue($row['TransactionNo']);
		$this->TransactionDate->setDbValue($row['TransactionDate']);
		$this->TransactionType->setDbValue($row['TransactionType']);
		$this->HandedOverTo->setDbValue($row['HandedOverTo']);
		$this->CodeNoTo->setDbValue($row['CodeNoTo']);
		$this->DepartmentTo->setDbValue($row['DepartmentTo']);
		$this->HandedOverBy->setDbValue($row['HandedOverBy']);
		$this->CodeNoBy->setDbValue($row['CodeNoBy']);
		$this->DepartmentBy->setDbValue($row['DepartmentBy']);
		$this->Sign1->setDbValue($row['Sign1']);
		$this->Sign2->setDbValue($row['Sign2']);
		$this->Sign3->setDbValue($row['Sign3']);
		$this->Sign4->setDbValue($row['Sign4']);
		$this->hodetail_id->setDbValue($row['hodetail_id']);
		$this->asset_id->setDbValue($row['asset_id']);
		$this->Property->setDbValue($row['Property']);
		$this->TemplateFile->setDbValue($row['TemplateFile']);
		$this->hoDepartmentTo->setDbValue($row['hoDepartmentTo']);
		$this->hoSignatureTo->setDbValue($row['hoSignatureTo']);
		$this->hoJobTitleTo->setDbValue($row['hoJobTitleTo']);
		$this->hoDepartmentBy->setDbValue($row['hoDepartmentBy']);
		$this->hoSignatureBy->setDbValue($row['hoSignatureBy']);
		$this->hoJobTitleBy->setDbValue($row['hoJobTitleBy']);
		$this->Description->setDbValue($row['Description']);
		$this->ProcurementDate->setDbValue($row['ProcurementDate']);
		$this->ProcurementCurrentCost->setDbValue($row['ProcurementCurrentCost']);
		$this->DepreciationAmount->setDbValue($row['DepreciationAmount']);
		$this->DepreciationYtd->setDbValue($row['DepreciationYtd']);
		$this->NetBookValue->setDbValue($row['NetBookValue']);
		$this->Periode->setDbValue($row['Periode']);
		$this->Qty->setDbValue($row['Qty']);
		$this->Remarks->setDbValue($row['Remarks']);
		$this->Sign1Signature->setDbValue($row['Sign1Signature']);
		$this->Sign1JobTitle->setDbValue($row['Sign1JobTitle']);
		$this->Sign2Signature->setDbValue($row['Sign2Signature']);
		$this->Sign2JobTitle->setDbValue($row['Sign2JobTitle']);
		$this->Sign3Signature->setDbValue($row['Sign3Signature']);
		$this->Sign3JobTitle->setDbValue($row['Sign3JobTitle']);
		$this->Sign4Signature->setDbValue($row['Sign4Signature']);
		$this->Sign4JobTitle->setDbValue($row['Sign4JobTitle']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['property_id'] = NULL;
		$row['TransactionNo'] = NULL;
		$row['TransactionDate'] = NULL;
		$row['TransactionType'] = NULL;
		$row['HandedOverTo'] = NULL;
		$row['CodeNoTo'] = NULL;
		$row['DepartmentTo'] = NULL;
		$row['HandedOverBy'] = NULL;
		$row['CodeNoBy'] = NULL;
		$row['DepartmentBy'] = NULL;
		$row['Sign1'] = NULL;
		$row['Sign2'] = NULL;
		$row['Sign3'] = NULL;
		$row['Sign4'] = NULL;
		$row['hodetail_id'] = NULL;
		$row['asset_id'] = NULL;
		$row['Property'] = NULL;
		$row['TemplateFile'] = NULL;
		$row['hoDepartmentTo'] = NULL;
		$row['hoSignatureTo'] = NULL;
		$row['hoJobTitleTo'] = NULL;
		$row['hoDepartmentBy'] = NULL;
		$row['hoSignatureBy'] = NULL;
		$row['hoJobTitleBy'] = NULL;
		$row['Description'] = NULL;
		$row['ProcurementDate'] = NULL;
		$row['ProcurementCurrentCost'] = NULL;
		$row['DepreciationAmount'] = NULL;
		$row['DepreciationYtd'] = NULL;
		$row['NetBookValue'] = NULL;
		$row['Periode'] = NULL;
		$row['Qty'] = NULL;
		$row['Remarks'] = NULL;
		$row['Sign1Signature'] = NULL;
		$row['Sign1JobTitle'] = NULL;
		$row['Sign2Signature'] = NULL;
		$row['Sign2JobTitle'] = NULL;
		$row['Sign3Signature'] = NULL;
		$row['Sign3JobTitle'] = NULL;
		$row['Sign4Signature'] = NULL;
		$row['Sign4JobTitle'] = NULL;
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
		if ($this->ProcurementCurrentCost->FormValue == $this->ProcurementCurrentCost->CurrentValue && is_numeric(ConvertToFloatString($this->ProcurementCurrentCost->CurrentValue)))
			$this->ProcurementCurrentCost->CurrentValue = ConvertToFloatString($this->ProcurementCurrentCost->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DepreciationAmount->FormValue == $this->DepreciationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DepreciationAmount->CurrentValue)))
			$this->DepreciationAmount->CurrentValue = ConvertToFloatString($this->DepreciationAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DepreciationYtd->FormValue == $this->DepreciationYtd->CurrentValue && is_numeric(ConvertToFloatString($this->DepreciationYtd->CurrentValue)))
			$this->DepreciationYtd->CurrentValue = ConvertToFloatString($this->DepreciationYtd->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NetBookValue->FormValue == $this->NetBookValue->CurrentValue && is_numeric(ConvertToFloatString($this->NetBookValue->CurrentValue)))
			$this->NetBookValue->CurrentValue = ConvertToFloatString($this->NetBookValue->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Qty->FormValue == $this->Qty->CurrentValue && is_numeric(ConvertToFloatString($this->Qty->CurrentValue)))
			$this->Qty->CurrentValue = ConvertToFloatString($this->Qty->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
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
		// Description
		// ProcurementDate
		// ProcurementCurrentCost
		// DepreciationAmount
		// DepreciationYtd
		// NetBookValue
		// Periode
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

		if ($this->RowType == ROWTYPE_VIEW) { // View row

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

			// TransactionType
			$this->TransactionType->ViewValue = $this->TransactionType->CurrentValue;
			$this->TransactionType->ViewValue = FormatNumber($this->TransactionType->ViewValue, 0, -2, -2, -2);
			$this->TransactionType->ViewCustomAttributes = "";

			// HandedOverTo
			$this->HandedOverTo->ViewValue = $this->HandedOverTo->CurrentValue;
			$this->HandedOverTo->ViewValue = FormatNumber($this->HandedOverTo->ViewValue, 0, -2, -2, -2);
			$this->HandedOverTo->ViewCustomAttributes = "";

			// CodeNoTo
			$this->CodeNoTo->ViewValue = $this->CodeNoTo->CurrentValue;
			$this->CodeNoTo->ViewCustomAttributes = "";

			// DepartmentTo
			$this->DepartmentTo->ViewValue = $this->DepartmentTo->CurrentValue;
			$this->DepartmentTo->ViewValue = FormatNumber($this->DepartmentTo->ViewValue, 0, -2, -2, -2);
			$this->DepartmentTo->ViewCustomAttributes = "";

			// HandedOverBy
			$this->HandedOverBy->ViewValue = $this->HandedOverBy->CurrentValue;
			$this->HandedOverBy->ViewValue = FormatNumber($this->HandedOverBy->ViewValue, 0, -2, -2, -2);
			$this->HandedOverBy->ViewCustomAttributes = "";

			// CodeNoBy
			$this->CodeNoBy->ViewValue = $this->CodeNoBy->CurrentValue;
			$this->CodeNoBy->ViewCustomAttributes = "";

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

			// Description
			$this->Description->ViewValue = $this->Description->CurrentValue;
			$this->Description->ViewCustomAttributes = "";

			// ProcurementDate
			$this->ProcurementDate->ViewValue = $this->ProcurementDate->CurrentValue;
			$this->ProcurementDate->ViewValue = FormatDateTime($this->ProcurementDate->ViewValue, 0);
			$this->ProcurementDate->ViewCustomAttributes = "";

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->ViewValue = $this->ProcurementCurrentCost->CurrentValue;
			$this->ProcurementCurrentCost->ViewValue = FormatNumber($this->ProcurementCurrentCost->ViewValue, 2, -2, -2, -2);
			$this->ProcurementCurrentCost->ViewCustomAttributes = "";

			// DepreciationAmount
			$this->DepreciationAmount->ViewValue = $this->DepreciationAmount->CurrentValue;
			$this->DepreciationAmount->ViewValue = FormatNumber($this->DepreciationAmount->ViewValue, 2, -2, -2, -2);
			$this->DepreciationAmount->ViewCustomAttributes = "";

			// DepreciationYtd
			$this->DepreciationYtd->ViewValue = $this->DepreciationYtd->CurrentValue;
			$this->DepreciationYtd->ViewValue = FormatNumber($this->DepreciationYtd->ViewValue, 2, -2, -2, -2);
			$this->DepreciationYtd->ViewCustomAttributes = "";

			// NetBookValue
			$this->NetBookValue->ViewValue = $this->NetBookValue->CurrentValue;
			$this->NetBookValue->ViewValue = FormatNumber($this->NetBookValue->ViewValue, 2, -2, -2, -2);
			$this->NetBookValue->ViewCustomAttributes = "";

			// Periode
			$this->Periode->ViewValue = $this->Periode->CurrentValue;
			$this->Periode->ViewValue = FormatDateTime($this->Periode->ViewValue, 0);
			$this->Periode->ViewCustomAttributes = "";

			// Qty
			$this->Qty->ViewValue = $this->Qty->CurrentValue;
			$this->Qty->ViewValue = FormatNumber($this->Qty->ViewValue, 2, -2, -2, -2);
			$this->Qty->ViewCustomAttributes = "";

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

			// Description
			$this->Description->LinkCustomAttributes = "";
			$this->Description->HrefValue = "";
			$this->Description->TooltipValue = "";

			// ProcurementDate
			$this->ProcurementDate->LinkCustomAttributes = "";
			$this->ProcurementDate->HrefValue = "";
			$this->ProcurementDate->TooltipValue = "";

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->LinkCustomAttributes = "";
			$this->ProcurementCurrentCost->HrefValue = "";
			$this->ProcurementCurrentCost->TooltipValue = "";

			// DepreciationAmount
			$this->DepreciationAmount->LinkCustomAttributes = "";
			$this->DepreciationAmount->HrefValue = "";
			$this->DepreciationAmount->TooltipValue = "";

			// DepreciationYtd
			$this->DepreciationYtd->LinkCustomAttributes = "";
			$this->DepreciationYtd->HrefValue = "";
			$this->DepreciationYtd->TooltipValue = "";

			// NetBookValue
			$this->NetBookValue->LinkCustomAttributes = "";
			$this->NetBookValue->HrefValue = "";
			$this->NetBookValue->TooltipValue = "";

			// Periode
			$this->Periode->LinkCustomAttributes = "";
			$this->Periode->HrefValue = "";
			$this->Periode->TooltipValue = "";

			// Qty
			$this->Qty->LinkCustomAttributes = "";
			$this->Qty->HrefValue = "";
			$this->Qty->TooltipValue = "";

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
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.fv101_holist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.fv101_holist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.fv101_holist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_v101_ho" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_v101_ho\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.fv101_holist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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
		$item->Body = "<a class=\"btn btn-default ew-search-toggle" . $searchToggleClass . "\" href=\"#\" role=\"button\" title=\"" . $Language->phrase("SearchPanel") . "\" data-caption=\"" . $Language->phrase("SearchPanel") . "\" data-toggle=\"button\" data-form=\"fv101_holistsrch\" aria-pressed=\"" . ($searchToggleClass == " active" ? "true" : "false") . "\">" . $Language->phrase("SearchLink") . "</a>";
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