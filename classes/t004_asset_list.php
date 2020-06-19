<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class t004_asset_list extends t004_asset
{

	// Page ID
	public $PageID = "list";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 't004_asset';

	// Page object name
	public $PageObjName = "t004_asset_list";

	// Grid form hidden field names
	public $FormName = "ft004_assetlist";
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

		// Table object (t004_asset)
		if (!isset($GLOBALS["t004_asset"]) || get_class($GLOBALS["t004_asset"]) == PROJECT_NAMESPACE . "t004_asset") {
			$GLOBALS["t004_asset"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t004_asset"];
		}

		// Initialize URLs
		$this->ExportPrintUrl = $this->pageUrl() . "export=print";
		$this->ExportExcelUrl = $this->pageUrl() . "export=excel";
		$this->ExportWordUrl = $this->pageUrl() . "export=word";
		$this->ExportPdfUrl = $this->pageUrl() . "export=pdf";
		$this->ExportHtmlUrl = $this->pageUrl() . "export=html";
		$this->ExportXmlUrl = $this->pageUrl() . "export=xml";
		$this->ExportCsvUrl = $this->pageUrl() . "export=csv";
		$this->AddUrl = "t004_assetadd.php?" . Config("TABLE_SHOW_DETAIL") . "=";
		$this->InlineAddUrl = $this->pageUrl() . "action=add";
		$this->GridAddUrl = $this->pageUrl() . "action=gridadd";
		$this->GridEditUrl = $this->pageUrl() . "action=gridedit";
		$this->MultiDeleteUrl = "t004_assetdelete.php";
		$this->MultiUpdateUrl = "t004_assetupdate.php";

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'list');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't004_asset');

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
		$this->FilterOptions->TagClassName = "ew-filter-option ft004_assetlistsrch";

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
		global $t004_asset;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t004_asset);
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

		// Create form object
		$CurrentForm = new HttpForm();

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
		$this->id->Visible = FALSE;
		$this->property_id->setVisibility();
		$this->department_id->setVisibility();
		$this->signature_id->setVisibility();
		$this->Code->setVisibility();
		$this->Description->setVisibility();
		$this->group_id->setVisibility();
		$this->ProcurementDate->setVisibility();
		$this->ProcurementCurrentCost->setVisibility();
		$this->Salvage->setVisibility();
		$this->Qty->setVisibility();
		$this->Remarks->setVisibility();
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
		$this->setupLookupOptions($this->property_id);
		$this->setupLookupOptions($this->department_id);
		$this->setupLookupOptions($this->signature_id);
		$this->setupLookupOptions($this->group_id);

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

			// Check QueryString parameters
			if (Get("action") !== NULL) {
				$this->CurrentAction = Get("action");

				// Clear inline mode
				if ($this->isCancel())
					$this->clearInlineMode();

				// Switch to grid edit mode
				if ($this->isGridEdit())
					$this->gridEditMode();

				// Switch to grid add mode
				if ($this->isGridAdd())
					$this->gridAddMode();
			} else {
				if (Post("action") !== NULL) {
					$this->CurrentAction = Post("action"); // Get action

					// Grid Update
					if (($this->isGridUpdate() || $this->isGridOverwrite()) && @$_SESSION[SESSION_INLINE_MODE] == "gridedit") {
						if ($this->validateGridForm()) {
							$gridUpdate = $this->gridUpdate();
						} else {
							$gridUpdate = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridUpdate) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridEditMode(); // Stay in Grid edit mode
						}
					}

					// Grid Insert
					if ($this->isGridInsert() && @$_SESSION[SESSION_INLINE_MODE] == "gridadd") {
						if ($this->validateGridForm()) {
							$gridInsert = $this->gridInsert();
						} else {
							$gridInsert = FALSE;
							$this->setFailureMessage($FormError);
						}
						if ($gridInsert) {
						} else {
							$this->EventCancelled = TRUE;
							$this->gridAddMode(); // Stay in Grid add mode
						}
					}
				} elseif (@$_SESSION[SESSION_INLINE_MODE] == "gridedit") { // Previously in grid edit mode
					if (Get(Config("TABLE_START_REC")) !== NULL || Get(Config("TABLE_PAGE_NO")) !== NULL) // Stay in grid edit mode if paging
						$this->gridEditMode();
					else // Reset grid edit
						$this->clearInlineMode();
				}
			}

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

			// Show grid delete link for grid add / grid edit
			if ($this->AllowAddDeleteRow) {
				if ($this->isGridAdd() || $this->isGridEdit()) {
					$item = $this->ListOptions["griddelete"];
					if ($item)
						$item->Visible = TRUE;
				}
			}

			// Get default search criteria
			AddFilter($this->DefaultSearchWhere, $this->advancedSearchWhere(TRUE));

			// Get and validate search values for advanced search
			$this->loadSearchValues(); // Get search values

			// Process filter list
			if ($this->processFilterList())
				$this->terminate();
			if (!$this->validateSearch())
				$this->setFailureMessage($SearchError);

			// Restore search parms from Session if not searching / reset / export
			if (($this->isExport() || $this->Command != "search" && $this->Command != "reset" && $this->Command != "resetall") && $this->Command != "json" && $this->checkSearchParms())
				$this->restoreSearchParms();

			// Call Recordset SearchValidated event
			$this->Recordset_SearchValidated();

			// Set up sorting order
			$this->setupSortOrder();

			// Get search criteria for advanced search
			if ($SearchError == "")
				$srchAdvanced = $this->advancedSearchWhere();
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

			// Load advanced search from default
			if ($this->loadAdvancedSearchDefault()) {
				$srchAdvanced = $this->advancedSearchWhere();
			}
		}

		// Restore search settings from Session
		if ($SearchError == "")
			$this->loadAdvancedSearch();

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

			// Audit trail on search
			if ($this->AuditTrailOnSearch && $this->Command == "search" && !$this->RestoreSearch) {
				$searchParm = ServerVar("QUERY_STRING");
				$searchSql = $this->getSessionWhere();
				$this->writeAuditTrailOnSearch($searchParm, $searchSql);
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

	// Exit inline mode
	protected function clearInlineMode()
	{
		$this->ProcurementCurrentCost->FormValue = ""; // Clear form value
		$this->Salvage->FormValue = ""; // Clear form value
		$this->Qty->FormValue = ""; // Clear form value
		$this->LastAction = $this->CurrentAction; // Save last action
		$this->CurrentAction = ""; // Clear action
		$_SESSION[SESSION_INLINE_MODE] = ""; // Clear inline mode
	}

	// Switch to Grid Add mode
	protected function gridAddMode()
	{
		$this->CurrentAction = "gridadd";
		$_SESSION[SESSION_INLINE_MODE] = "gridadd";
		$this->hideFieldsForAddEdit();
	}

	// Switch to Grid Edit mode
	protected function gridEditMode()
	{
		$this->CurrentAction = "gridedit";
		$_SESSION[SESSION_INLINE_MODE] = "gridedit";
		$this->hideFieldsForAddEdit();
	}

	// Perform update to grid
	public function gridUpdate()
	{
		global $Language, $CurrentForm, $FormError;
		$gridUpdate = TRUE;

		// Get old recordset
		$this->CurrentFilter = $this->buildKeyFilter();
		if ($this->CurrentFilter == "")
			$this->CurrentFilter = "0=1";
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		if ($rs = $conn->execute($sql)) {
			$rsold = $rs->getRows();
			$rs->close();
		}

		// Call Grid Updating event
		if (!$this->Grid_Updating($rsold)) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridEditCancelled")); // Set grid edit cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();
		if ($this->AuditTrailOnEdit)
			$this->writeAuditTrailDummy($Language->phrase("BatchUpdateBegin")); // Batch update begin
		$key = "";

		// Update row index and get row key
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Update all rows based on key
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {
			$CurrentForm->Index = $rowindex;
			$rowkey = strval($CurrentForm->getValue($this->FormKeyName));
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));

			// Load all values and keys
			if ($rowaction != "insertdelete") { // Skip insert then deleted rows
				$this->loadFormValues(); // Get form values
				if ($rowaction == "" || $rowaction == "edit" || $rowaction == "delete") {
					$gridUpdate = $this->setupKeyValues($rowkey); // Set up key values
				} else {
					$gridUpdate = TRUE;
				}

				// Skip empty row
				if ($rowaction == "insert" && $this->emptyRow()) {

					// No action required
				// Validate form and insert/update/delete record

				} elseif ($gridUpdate) {
					if ($rowaction == "delete") {
						$this->CurrentFilter = $this->getRecordFilter();
						$gridUpdate = $this->deleteRows(); // Delete this row
					} else if (!$this->validateForm()) {
						$gridUpdate = FALSE; // Form error, reset action
						$this->setFailureMessage($FormError);
					} else {
						if ($rowaction == "insert") {
							$gridUpdate = $this->addRow(); // Insert this row
						} else {
							if ($rowkey != "") {
								$this->SendEmail = FALSE; // Do not send email on update success
								$gridUpdate = $this->editRow(); // Update this row
							}
						} // End update
					}
				}
				if ($gridUpdate) {
					if ($key != "")
						$key .= ", ";
					$key .= $rowkey;
				} else {
					break;
				}
			}
		}
		if ($gridUpdate) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Updated event
			$this->Grid_Updated($rsold, $rsnew);
			if ($this->AuditTrailOnEdit)
				$this->writeAuditTrailDummy($Language->phrase("BatchUpdateSuccess")); // Batch update success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Set up update success message
			$this->clearInlineMode(); // Clear inline edit mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->AuditTrailOnEdit)
				$this->writeAuditTrailDummy($Language->phrase("BatchUpdateRollback")); // Batch update rollback
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("UpdateFailed")); // Set update failed message
		}
		return $gridUpdate;
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
		if (count($arKeyFlds) >= 1) {
			$this->id->setOldValue($arKeyFlds[0]);
			if (!is_numeric($this->id->OldValue))
				return FALSE;
		}
		return TRUE;
	}

	// Perform Grid Add
	public function gridInsert()
	{
		global $Language, $CurrentForm, $FormError;
		$rowindex = 1;
		$gridInsert = FALSE;
		$conn = $this->getConnection();

		// Call Grid Inserting event
		if (!$this->Grid_Inserting()) {
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("GridAddCancelled")); // Set grid add cancelled message
			return FALSE;
		}

		// Begin transaction
		$conn->beginTrans();

		// Init key filter
		$wrkfilter = "";
		$addcnt = 0;
		if ($this->AuditTrailOnAdd)
			$this->writeAuditTrailDummy($Language->phrase("BatchInsertBegin")); // Batch insert begin
		$key = "";

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Insert all rows
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "" && $rowaction != "insert")
				continue; // Skip
			$this->loadFormValues(); // Get form values
			if (!$this->emptyRow()) {
				$addcnt++;
				$this->SendEmail = FALSE; // Do not send email on insert success

				// Validate form
				if (!$this->validateForm()) {
					$gridInsert = FALSE; // Form error, reset action
					$this->setFailureMessage($FormError);
				} else {
					$gridInsert = $this->addRow($this->OldRecordset); // Insert this row
				}
				if ($gridInsert) {
					if ($key != "")
						$key .= Config("COMPOSITE_KEY_SEPARATOR");
					$key .= $this->id->CurrentValue;

					// Add filter for this record
					$filter = $this->getRecordFilter();
					if ($wrkfilter != "")
						$wrkfilter .= " OR ";
					$wrkfilter .= $filter;
				} else {
					break;
				}
			}
		}
		if ($addcnt == 0) { // No record inserted
			$this->setFailureMessage($Language->phrase("NoAddRecord"));
			$gridInsert = FALSE;
		}
		if ($gridInsert) {
			$conn->commitTrans(); // Commit transaction

			// Get new recordset
			$this->CurrentFilter = $wrkfilter;
			$sql = $this->getCurrentSql();
			if ($rs = $conn->execute($sql)) {
				$rsnew = $rs->getRows();
				$rs->close();
			}

			// Call Grid_Inserted event
			$this->Grid_Inserted($rsnew);
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailDummy($Language->phrase("BatchInsertSuccess")); // Batch insert success
			if ($this->getSuccessMessage() == "")
				$this->setSuccessMessage($Language->phrase("InsertSuccess")); // Set up insert success message
			$this->clearInlineMode(); // Clear grid add mode
		} else {
			$conn->rollbackTrans(); // Rollback transaction
			if ($this->AuditTrailOnAdd)
				$this->writeAuditTrailDummy($Language->phrase("BatchInsertRollback")); // Batch insert rollback
			if ($this->getFailureMessage() == "")
				$this->setFailureMessage($Language->phrase("InsertFailed")); // Set insert failed message
		}
		return $gridInsert;
	}

	// Check if empty row
	public function emptyRow()
	{
		global $CurrentForm;
		if ($CurrentForm->hasValue("x_property_id") && $CurrentForm->hasValue("o_property_id") && $this->property_id->CurrentValue != $this->property_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_department_id") && $CurrentForm->hasValue("o_department_id") && $this->department_id->CurrentValue != $this->department_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_signature_id") && $CurrentForm->hasValue("o_signature_id") && $this->signature_id->CurrentValue != $this->signature_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Code") && $CurrentForm->hasValue("o_Code") && $this->Code->CurrentValue != $this->Code->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Description") && $CurrentForm->hasValue("o_Description") && $this->Description->CurrentValue != $this->Description->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_group_id") && $CurrentForm->hasValue("o_group_id") && $this->group_id->CurrentValue != $this->group_id->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProcurementDate") && $CurrentForm->hasValue("o_ProcurementDate") && $this->ProcurementDate->CurrentValue != $this->ProcurementDate->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_ProcurementCurrentCost") && $CurrentForm->hasValue("o_ProcurementCurrentCost") && $this->ProcurementCurrentCost->CurrentValue != $this->ProcurementCurrentCost->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Salvage") && $CurrentForm->hasValue("o_Salvage") && $this->Salvage->CurrentValue != $this->Salvage->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Qty") && $CurrentForm->hasValue("o_Qty") && $this->Qty->CurrentValue != $this->Qty->OldValue)
			return FALSE;
		if ($CurrentForm->hasValue("x_Remarks") && $CurrentForm->hasValue("o_Remarks") && $this->Remarks->CurrentValue != $this->Remarks->OldValue)
			return FALSE;
		return TRUE;
	}

	// Validate grid form
	public function validateGridForm()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;

		// Validate all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else if (!$this->validateForm()) {
					return FALSE;
				}
			}
		}
		return TRUE;
	}

	// Get all form values of the grid
	public function getGridFormValues()
	{
		global $CurrentForm;

		// Get row count
		$CurrentForm->Index = -1;
		$rowcnt = strval($CurrentForm->getValue($this->FormKeyCountName));
		if ($rowcnt == "" || !is_numeric($rowcnt))
			$rowcnt = 0;
		$rows = [];

		// Loop through all records
		for ($rowindex = 1; $rowindex <= $rowcnt; $rowindex++) {

			// Load current row values
			$CurrentForm->Index = $rowindex;
			$rowaction = strval($CurrentForm->getValue($this->FormActionName));
			if ($rowaction != "delete" && $rowaction != "insertdelete") {
				$this->loadFormValues(); // Get form values
				if ($rowaction == "insert" && $this->emptyRow()) {

					// Ignore
				} else {
					$rows[] = $this->getFieldValues("FormValue"); // Return row as array
				}
			}
		}
		return $rows; // Return as array of array
	}

	// Restore form values for current row
	public function restoreCurrentRowFormValues($idx)
	{
		global $CurrentForm;

		// Get row based on current index
		$CurrentForm->Index = $idx;
		$this->loadFormValues(); // Load form values
	}

	// Get list of filters
	public function getFilterList()
	{
		global $UserProfile;

		// Initialize
		$filterList = "";
		$savedFilterList = "";
		$filterList = Concat($filterList, $this->property_id->AdvancedSearch->toJson(), ","); // Field property_id
		$filterList = Concat($filterList, $this->department_id->AdvancedSearch->toJson(), ","); // Field department_id
		$filterList = Concat($filterList, $this->signature_id->AdvancedSearch->toJson(), ","); // Field signature_id
		$filterList = Concat($filterList, $this->Code->AdvancedSearch->toJson(), ","); // Field Code
		$filterList = Concat($filterList, $this->Description->AdvancedSearch->toJson(), ","); // Field Description
		$filterList = Concat($filterList, $this->group_id->AdvancedSearch->toJson(), ","); // Field group_id
		$filterList = Concat($filterList, $this->ProcurementDate->AdvancedSearch->toJson(), ","); // Field ProcurementDate
		$filterList = Concat($filterList, $this->ProcurementCurrentCost->AdvancedSearch->toJson(), ","); // Field ProcurementCurrentCost
		$filterList = Concat($filterList, $this->Salvage->AdvancedSearch->toJson(), ","); // Field Salvage
		$filterList = Concat($filterList, $this->Qty->AdvancedSearch->toJson(), ","); // Field Qty
		$filterList = Concat($filterList, $this->Remarks->AdvancedSearch->toJson(), ","); // Field Remarks

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
			$UserProfile->setSearchFilters(CurrentUserName(), "ft004_assetlistsrch", $filters);
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

		// Field property_id
		$this->property_id->AdvancedSearch->SearchValue = @$filter["x_property_id"];
		$this->property_id->AdvancedSearch->SearchOperator = @$filter["z_property_id"];
		$this->property_id->AdvancedSearch->SearchCondition = @$filter["v_property_id"];
		$this->property_id->AdvancedSearch->SearchValue2 = @$filter["y_property_id"];
		$this->property_id->AdvancedSearch->SearchOperator2 = @$filter["w_property_id"];
		$this->property_id->AdvancedSearch->save();

		// Field department_id
		$this->department_id->AdvancedSearch->SearchValue = @$filter["x_department_id"];
		$this->department_id->AdvancedSearch->SearchOperator = @$filter["z_department_id"];
		$this->department_id->AdvancedSearch->SearchCondition = @$filter["v_department_id"];
		$this->department_id->AdvancedSearch->SearchValue2 = @$filter["y_department_id"];
		$this->department_id->AdvancedSearch->SearchOperator2 = @$filter["w_department_id"];
		$this->department_id->AdvancedSearch->save();

		// Field signature_id
		$this->signature_id->AdvancedSearch->SearchValue = @$filter["x_signature_id"];
		$this->signature_id->AdvancedSearch->SearchOperator = @$filter["z_signature_id"];
		$this->signature_id->AdvancedSearch->SearchCondition = @$filter["v_signature_id"];
		$this->signature_id->AdvancedSearch->SearchValue2 = @$filter["y_signature_id"];
		$this->signature_id->AdvancedSearch->SearchOperator2 = @$filter["w_signature_id"];
		$this->signature_id->AdvancedSearch->save();

		// Field Code
		$this->Code->AdvancedSearch->SearchValue = @$filter["x_Code"];
		$this->Code->AdvancedSearch->SearchOperator = @$filter["z_Code"];
		$this->Code->AdvancedSearch->SearchCondition = @$filter["v_Code"];
		$this->Code->AdvancedSearch->SearchValue2 = @$filter["y_Code"];
		$this->Code->AdvancedSearch->SearchOperator2 = @$filter["w_Code"];
		$this->Code->AdvancedSearch->save();

		// Field Description
		$this->Description->AdvancedSearch->SearchValue = @$filter["x_Description"];
		$this->Description->AdvancedSearch->SearchOperator = @$filter["z_Description"];
		$this->Description->AdvancedSearch->SearchCondition = @$filter["v_Description"];
		$this->Description->AdvancedSearch->SearchValue2 = @$filter["y_Description"];
		$this->Description->AdvancedSearch->SearchOperator2 = @$filter["w_Description"];
		$this->Description->AdvancedSearch->save();

		// Field group_id
		$this->group_id->AdvancedSearch->SearchValue = @$filter["x_group_id"];
		$this->group_id->AdvancedSearch->SearchOperator = @$filter["z_group_id"];
		$this->group_id->AdvancedSearch->SearchCondition = @$filter["v_group_id"];
		$this->group_id->AdvancedSearch->SearchValue2 = @$filter["y_group_id"];
		$this->group_id->AdvancedSearch->SearchOperator2 = @$filter["w_group_id"];
		$this->group_id->AdvancedSearch->save();

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

		// Field Salvage
		$this->Salvage->AdvancedSearch->SearchValue = @$filter["x_Salvage"];
		$this->Salvage->AdvancedSearch->SearchOperator = @$filter["z_Salvage"];
		$this->Salvage->AdvancedSearch->SearchCondition = @$filter["v_Salvage"];
		$this->Salvage->AdvancedSearch->SearchValue2 = @$filter["y_Salvage"];
		$this->Salvage->AdvancedSearch->SearchOperator2 = @$filter["w_Salvage"];
		$this->Salvage->AdvancedSearch->save();

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
	}

	// Advanced search WHERE clause based on QueryString
	protected function advancedSearchWhere($default = FALSE)
	{
		global $Security;
		$where = "";
		if (!$Security->canSearch())
			return "";
		$this->buildSearchSql($where, $this->property_id, $default, FALSE); // property_id
		$this->buildSearchSql($where, $this->department_id, $default, FALSE); // department_id
		$this->buildSearchSql($where, $this->signature_id, $default, FALSE); // signature_id
		$this->buildSearchSql($where, $this->Code, $default, FALSE); // Code
		$this->buildSearchSql($where, $this->Description, $default, FALSE); // Description
		$this->buildSearchSql($where, $this->group_id, $default, FALSE); // group_id
		$this->buildSearchSql($where, $this->ProcurementDate, $default, FALSE); // ProcurementDate
		$this->buildSearchSql($where, $this->ProcurementCurrentCost, $default, FALSE); // ProcurementCurrentCost
		$this->buildSearchSql($where, $this->Salvage, $default, FALSE); // Salvage
		$this->buildSearchSql($where, $this->Qty, $default, FALSE); // Qty
		$this->buildSearchSql($where, $this->Remarks, $default, FALSE); // Remarks

		// Set up search parm
		if (!$default && $where != "" && in_array($this->Command, ["", "reset", "resetall"])) {
			$this->Command = "search";
		}
		if (!$default && $this->Command == "search") {
			$this->property_id->AdvancedSearch->save(); // property_id
			$this->department_id->AdvancedSearch->save(); // department_id
			$this->signature_id->AdvancedSearch->save(); // signature_id
			$this->Code->AdvancedSearch->save(); // Code
			$this->Description->AdvancedSearch->save(); // Description
			$this->group_id->AdvancedSearch->save(); // group_id
			$this->ProcurementDate->AdvancedSearch->save(); // ProcurementDate
			$this->ProcurementCurrentCost->AdvancedSearch->save(); // ProcurementCurrentCost
			$this->Salvage->AdvancedSearch->save(); // Salvage
			$this->Qty->AdvancedSearch->save(); // Qty
			$this->Remarks->AdvancedSearch->save(); // Remarks
		}
		return $where;
	}

	// Build search SQL
	protected function buildSearchSql(&$where, &$fld, $default, $multiValue)
	{
		$fldParm = $fld->Param;
		$fldVal = ($default) ? $fld->AdvancedSearch->SearchValueDefault : $fld->AdvancedSearch->SearchValue;
		$fldOpr = ($default) ? $fld->AdvancedSearch->SearchOperatorDefault : $fld->AdvancedSearch->SearchOperator;
		$fldCond = ($default) ? $fld->AdvancedSearch->SearchConditionDefault : $fld->AdvancedSearch->SearchCondition;
		$fldVal2 = ($default) ? $fld->AdvancedSearch->SearchValue2Default : $fld->AdvancedSearch->SearchValue2;
		$fldOpr2 = ($default) ? $fld->AdvancedSearch->SearchOperator2Default : $fld->AdvancedSearch->SearchOperator2;
		$wrk = "";
		if (is_array($fldVal))
			$fldVal = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal);
		if (is_array($fldVal2))
			$fldVal2 = implode(Config("MULTIPLE_OPTION_SEPARATOR"), $fldVal2);
		$fldOpr = strtoupper(trim($fldOpr));
		if ($fldOpr == "")
			$fldOpr = "=";
		$fldOpr2 = strtoupper(trim($fldOpr2));
		if ($fldOpr2 == "")
			$fldOpr2 = "=";
		if (Config("SEARCH_MULTI_VALUE_OPTION") == 1 || !IsMultiSearchOperator($fldOpr))
			$multiValue = FALSE;
		if ($multiValue) {
			$wrk1 = ($fldVal != "") ? GetMultiSearchSql($fld, $fldOpr, $fldVal, $this->Dbid) : ""; // Field value 1
			$wrk2 = ($fldVal2 != "") ? GetMultiSearchSql($fld, $fldOpr2, $fldVal2, $this->Dbid) : ""; // Field value 2
			$wrk = $wrk1; // Build final SQL
			if ($wrk2 != "")
				$wrk = ($wrk != "") ? "($wrk) $fldCond ($wrk2)" : $wrk2;
		} else {
			$fldVal = $this->convertSearchValue($fld, $fldVal);
			$fldVal2 = $this->convertSearchValue($fld, $fldVal2);
			$wrk = GetSearchSql($fld, $fldVal, $fldOpr, $fldCond, $fldVal2, $fldOpr2, $this->Dbid);
		}
		AddFilter($where, $wrk);
	}

	// Convert search value
	protected function convertSearchValue(&$fld, $fldVal)
	{
		if ($fldVal == Config("NULL_VALUE") || $fldVal == Config("NOT_NULL_VALUE"))
			return $fldVal;
		$value = $fldVal;
		if ($fld->isBoolean()) {
			if ($fldVal != "")
				$value = (SameText($fldVal, "1") || SameText($fldVal, "y") || SameText($fldVal, "t")) ? $fld->TrueValue : $fld->FalseValue;
		} elseif ($fld->DataType == DATATYPE_DATE || $fld->DataType == DATATYPE_TIME) {
			if ($fldVal != "")
				$value = UnFormatDateTime($fldVal, $fld->DateTimeFormat);
		}
		return $value;
	}

	// Check if search parm exists
	protected function checkSearchParms()
	{
		if ($this->property_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->department_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->signature_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Code->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Description->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->group_id->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProcurementDate->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->ProcurementCurrentCost->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Salvage->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Qty->AdvancedSearch->issetSession())
			return TRUE;
		if ($this->Remarks->AdvancedSearch->issetSession())
			return TRUE;
		return FALSE;
	}

	// Clear all search parameters
	protected function resetSearchParms()
	{

		// Clear search WHERE clause
		$this->SearchWhere = "";
		$this->setSearchWhere($this->SearchWhere);

		// Clear advanced search parameters
		$this->resetAdvancedSearchParms();
	}

	// Load advanced search default values
	protected function loadAdvancedSearchDefault()
	{
		return FALSE;
	}

	// Clear all advanced search parameters
	protected function resetAdvancedSearchParms()
	{
		$this->property_id->AdvancedSearch->unsetSession();
		$this->department_id->AdvancedSearch->unsetSession();
		$this->signature_id->AdvancedSearch->unsetSession();
		$this->Code->AdvancedSearch->unsetSession();
		$this->Description->AdvancedSearch->unsetSession();
		$this->group_id->AdvancedSearch->unsetSession();
		$this->ProcurementDate->AdvancedSearch->unsetSession();
		$this->ProcurementCurrentCost->AdvancedSearch->unsetSession();
		$this->Salvage->AdvancedSearch->unsetSession();
		$this->Qty->AdvancedSearch->unsetSession();
		$this->Remarks->AdvancedSearch->unsetSession();
	}

	// Restore all search parameters
	protected function restoreSearchParms()
	{
		$this->RestoreSearch = TRUE;

		// Restore advanced search values
		$this->property_id->AdvancedSearch->load();
		$this->department_id->AdvancedSearch->load();
		$this->signature_id->AdvancedSearch->load();
		$this->Code->AdvancedSearch->load();
		$this->Description->AdvancedSearch->load();
		$this->group_id->AdvancedSearch->load();
		$this->ProcurementDate->AdvancedSearch->load();
		$this->ProcurementCurrentCost->AdvancedSearch->load();
		$this->Salvage->AdvancedSearch->load();
		$this->Qty->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
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
			$this->updateSort($this->property_id, $ctrl); // property_id
			$this->updateSort($this->department_id, $ctrl); // department_id
			$this->updateSort($this->signature_id, $ctrl); // signature_id
			$this->updateSort($this->Code, $ctrl); // Code
			$this->updateSort($this->Description, $ctrl); // Description
			$this->updateSort($this->group_id, $ctrl); // group_id
			$this->updateSort($this->ProcurementDate, $ctrl); // ProcurementDate
			$this->updateSort($this->ProcurementCurrentCost, $ctrl); // ProcurementCurrentCost
			$this->updateSort($this->Salvage, $ctrl); // Salvage
			$this->updateSort($this->Qty, $ctrl); // Qty
			$this->updateSort($this->Remarks, $ctrl); // Remarks
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
				$this->property_id->setSort("");
				$this->department_id->setSort("");
				$this->signature_id->setSort("");
				$this->Code->setSort("");
				$this->Description->setSort("");
				$this->group_id->setSort("");
				$this->ProcurementDate->setSort("");
				$this->ProcurementCurrentCost->setSort("");
				$this->Salvage->setSort("");
				$this->Qty->setSort("");
				$this->Remarks->setSort("");
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

		// "griddelete"
		if ($this->AllowAddDeleteRow) {
			$item = &$this->ListOptions->add("griddelete");
			$item->CssClass = "text-nowrap";
			$item->OnLeft = TRUE;
			$item->Visible = FALSE; // Default hidden
		}

		// Add group option item
		$item = &$this->ListOptions->add($this->ListOptions->GroupOptionName);
		$item->Body = "";
		$item->OnLeft = TRUE;
		$item->Visible = FALSE;

		// "edit"
		$item = &$this->ListOptions->add("edit");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canEdit();
		$item->OnLeft = TRUE;

		// "copy"
		$item = &$this->ListOptions->add("copy");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canAdd();
		$item->OnLeft = TRUE;

		// "delete"
		$item = &$this->ListOptions->add("delete");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->canDelete();
		$item->OnLeft = TRUE;

		// "detail_t006_assetdepreciation"
		$item = &$this->ListOptions->add("detail_t006_assetdepreciation");
		$item->CssClass = "text-nowrap";
		$item->Visible = $Security->allowList(CurrentProjectID() . 't006_assetdepreciation') && !$this->ShowMultipleDetails;
		$item->OnLeft = TRUE;
		$item->ShowInButtonGroup = FALSE;
		if (!isset($GLOBALS["t006_assetdepreciation_grid"]))
			$GLOBALS["t006_assetdepreciation_grid"] = new t006_assetdepreciation_grid();

		// Multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$this->ListOptions->add("details");
			$item->CssClass = "text-nowrap";
			$item->Visible = $this->ShowMultipleDetails;
			$item->OnLeft = TRUE;
			$item->ShowInButtonGroup = FALSE;
		}

		// Set up detail pages
		$pages = new SubPages();
		$pages->add("t006_assetdepreciation");
		$this->DetailPages = $pages;

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

		// "sequence"
		$item = &$this->ListOptions->add("sequence");
		$item->CssClass = "text-nowrap";
		$item->Visible = TRUE;
		$item->OnLeft = TRUE; // Always on left
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

		// Set up row action and key
		if (is_numeric($this->RowIndex) && $this->CurrentMode != "view") {
			$CurrentForm->Index = $this->RowIndex;
			$actionName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormActionName);
			$oldKeyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormOldKeyName);
			$keyName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormKeyName);
			$blankRowName = str_replace("k_", "k" . $this->RowIndex . "_", $this->FormBlankRowName);
			if ($this->RowAction != "")
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $actionName . "\" id=\"" . $actionName . "\" value=\"" . $this->RowAction . "\">";
			if ($this->RowAction == "delete") {
				$rowkey = $CurrentForm->getValue($this->FormKeyName);
				$this->setupKeyValues($rowkey);

				// Reload hidden key for delete
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . HtmlEncode($rowkey) . "\">";
			}
			if ($this->RowAction == "insert" && $this->isConfirm() && $this->emptyRow())
				$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $blankRowName . "\" id=\"" . $blankRowName . "\" value=\"1\">";
		}

		// "delete"
		if ($this->AllowAddDeleteRow) {
			if ($this->isGridAdd() || $this->isGridEdit()) {
				$options = &$this->ListOptions;
				$options->UseButtonGroup = TRUE; // Use button group for grid delete button
				$opt = $options["griddelete"];
				if (!$Security->canDelete() && is_numeric($this->RowIndex) && ($this->RowAction == "" || $this->RowAction == "edit")) { // Do not allow delete existing record
					$opt->Body = "&nbsp;";
				} else {
					$opt->Body = "<a class=\"ew-grid-link ew-grid-delete\" title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" onclick=\"return ew.deleteGridRow(this, " . $this->RowIndex . ");\">" . $Language->phrase("DeleteLink") . "</a>";
				}
			}
		}

		// "sequence"
		$opt = $this->ListOptions["sequence"];
		$opt->Body = FormatSequenceNumber($this->RecordCount);

		// "edit"
		$opt = $this->ListOptions["edit"];
		$editcaption = HtmlTitle($Language->phrase("EditLink"));
		if ($Security->canEdit()) {
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-caption=\"" . $editcaption . "\" href=\"" . HtmlEncode($this->EditUrl) . "\">" . $Language->phrase("EditLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-edit\" title=\"" . $editcaption . "\" data-table=\"t004_asset\" data-caption=\"" . $editcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SaveBtn',url:'" . HtmlEncode($this->EditUrl) . "'});\">" . $Language->phrase("EditLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "copy"
		$opt = $this->ListOptions["copy"];
		$copycaption = HtmlTitle($Language->phrase("CopyLink"));
		if ($Security->canAdd()) {
			if (IsMobile())
				$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-caption=\"" . $copycaption . "\" href=\"" . HtmlEncode($this->CopyUrl) . "\">" . $Language->phrase("CopyLink") . "</a>";
			else
				$opt->Body = "<a class=\"ew-row-link ew-copy\" title=\"" . $copycaption . "\" data-table=\"t004_asset\" data-caption=\"" . $copycaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->CopyUrl) . "'});\">" . $Language->phrase("CopyLink") . "</a>";
		} else {
			$opt->Body = "";
		}

		// "delete"
		$opt = $this->ListOptions["delete"];
		if ($Security->canDelete())
			$opt->Body = "<a class=\"ew-row-link ew-delete\"" . " onclick=\"return ew.confirmDelete(this);\"" . " title=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("DeleteLink")) . "\" href=\"" . HtmlEncode($this->DeleteUrl) . "\">" . $Language->phrase("DeleteLink") . "</a>";
		else
			$opt->Body = "";

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
		$detailViewTblVar = "";
		$detailCopyTblVar = "";
		$detailEditTblVar = "";

		// "detail_t006_assetdepreciation"
		$opt = $this->ListOptions["detail_t006_assetdepreciation"];
		if ($Security->allowList(CurrentProjectID() . 't006_assetdepreciation')) {
			$body = $Language->phrase("DetailLink") . $Language->TablePhrase("t006_assetdepreciation", "TblCaption");
			$body = "<a class=\"btn btn-default ew-row-link ew-detail\" data-action=\"list\" href=\"" . HtmlEncode("t006_assetdepreciationlist.php?" . Config("TABLE_SHOW_MASTER") . "=t004_asset&fk_id=" . urlencode(strval($this->id->CurrentValue)) . "") . "\">" . $body . "</a>";
			$links = "";
			if ($GLOBALS["t006_assetdepreciation_grid"]->DetailEdit && $Security->canEdit() && $Security->allowEdit(CurrentProjectID() . 't004_asset')) {
				$caption = $Language->phrase("MasterDetailEditLink");
				$url = $this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=t006_assetdepreciation");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailEditTblVar != "")
					$detailEditTblVar .= ",";
				$detailEditTblVar .= "t006_assetdepreciation";
			}
			if ($GLOBALS["t006_assetdepreciation_grid"]->DetailAdd && $Security->canAdd() && $Security->allowAdd(CurrentProjectID() . 't004_asset')) {
				$caption = $Language->phrase("MasterDetailCopyLink");
				$url = $this->getCopyUrl(Config("TABLE_SHOW_DETAIL") . "=t006_assetdepreciation");
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . HtmlImageAndText($caption) . "</a></li>";
				if ($detailCopyTblVar != "")
					$detailCopyTblVar .= ",";
				$detailCopyTblVar .= "t006_assetdepreciation";
			}
			if ($links != "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-detail\" data-toggle=\"dropdown\"></button>";
				$body .= "<ul class=\"dropdown-menu\">". $links . "</ul>";
			}
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">" . $body . "</div>";
			$opt->Body = $body;
			if ($this->ShowMultipleDetails)
				$opt->Visible = FALSE;
		}
		if ($this->ShowMultipleDetails) {
			$body = "<div class=\"btn-group btn-group-sm ew-btn-group\">";
			$links = "";
			if ($detailViewTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-view\" data-action=\"view\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailViewLink")) . "\" href=\"" . HtmlEncode($this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailViewTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailViewLink")) . "</a></li>";
			}
			if ($detailEditTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-edit\" data-action=\"edit\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailEditLink")) . "\" href=\"" . HtmlEncode($this->getEditUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailEditTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailEditLink")) . "</a></li>";
			}
			if ($detailCopyTblVar != "") {
				$links .= "<li><a class=\"dropdown-item ew-row-link ew-detail-copy\" data-action=\"add\" data-caption=\"" . HtmlTitle($Language->phrase("MasterDetailCopyLink")) . "\" href=\"" . HtmlEncode($this->GetCopyUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailCopyTblVar)) . "\">" . HtmlImageAndText($Language->phrase("MasterDetailCopyLink")) . "</a></li>";
			}
			if ($links != "") {
				$body .= "<button class=\"dropdown-toggle btn btn-default ew-master-detail\" title=\"" . HtmlTitle($Language->phrase("MultipleMasterDetails")) . "\" data-toggle=\"dropdown\">" . $Language->phrase("MultipleMasterDetails") . "</button>";
				$body .= "<ul class=\"dropdown-menu ew-menu\">". $links . "</ul>";
			}
			$body .= "</div>";

			// Multiple details
			$opt = $this->ListOptions["details"];
			$opt->Body = $body;
		}

		// "checkbox"
		$opt = $this->ListOptions["checkbox"];
		$opt->Body = "<div class=\"custom-control custom-checkbox d-inline-block\"><input type=\"checkbox\" id=\"key_m_" . $this->RowCount . "\" name=\"key_m[]\" class=\"custom-control-input ew-multi-select\" value=\"" . HtmlEncode($this->id->CurrentValue) . "\" onclick=\"ew.clickMultiCheckbox(event);\"><label class=\"custom-control-label\" for=\"key_m_" . $this->RowCount . "\"></label></div>";
		if ($this->isGridEdit() && is_numeric($this->RowIndex)) {
			$this->MultiSelectKey .= "<input type=\"hidden\" name=\"" . $keyName . "\" id=\"" . $keyName . "\" value=\"" . $this->id->CurrentValue . "\">";
		}
		$this->renderListOptionsExt();

		// Call ListOptions_Rendered event
		$this->ListOptions_Rendered();
	}

	// Set up other options
	protected function setupOtherOptions()
	{
		global $Language, $Security;
		$options = &$this->OtherOptions;
		$option = $options["addedit"];

		// Add
		$item = &$option->add("add");
		$addcaption = HtmlTitle($Language->phrase("AddLink"));
		if (IsMobile())
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-caption=\"" . $addcaption . "\" href=\"" . HtmlEncode($this->AddUrl) . "\">" . $Language->phrase("AddLink") . "</a>";
		else
			$item->Body = "<a class=\"ew-add-edit ew-add\" title=\"" . $addcaption . "\" data-table=\"t004_asset\" data-caption=\"" . $addcaption . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'AddBtn',url:'" . HtmlEncode($this->AddUrl) . "'});\">" . $Language->phrase("AddLink") . "</a>";
		$item->Visible = $this->AddUrl != "" && $Security->canAdd();
		$item = &$option->add("gridadd");
		$item->Body = "<a class=\"ew-add-edit ew-grid-add\" title=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridAddLink")) . "\" href=\"" . HtmlEncode($this->GridAddUrl) . "\">" . $Language->phrase("GridAddLink") . "</a>";
		$item->Visible = $this->GridAddUrl != "" && $Security->canAdd();
		$option = $options["detail"];
		$detailTableLink = "";
		$item = &$option->add("detailadd_t006_assetdepreciation");
		$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=t006_assetdepreciation");
		if (!isset($GLOBALS["t006_assetdepreciation"]))
			$GLOBALS["t006_assetdepreciation"] = new t006_assetdepreciation();
		$caption = $Language->phrase("Add") . "&nbsp;" . $this->tableCaption() . "/" . $GLOBALS["t006_assetdepreciation"]->tableCaption();
		$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
		$item->Visible = ($GLOBALS["t006_assetdepreciation"]->DetailAdd && $Security->allowAdd(CurrentProjectID() . 't004_asset') && $Security->canAdd());
		if ($item->Visible) {
			if ($detailTableLink != "")
				$detailTableLink .= ",";
			$detailTableLink .= "t006_assetdepreciation";
		}

		// Add multiple details
		if ($this->ShowMultipleDetails) {
			$item = &$option->add("detailsadd");
			$url = $this->getAddUrl(Config("TABLE_SHOW_DETAIL") . "=" . $detailTableLink);
			$caption = $Language->phrase("AddMasterDetailLink");
			$item->Body = "<a class=\"ew-detail-add-group ew-detail-add\" title=\"" . HtmlTitle($caption) . "\" data-caption=\"" . HtmlTitle($caption) . "\" href=\"" . HtmlEncode($url) . "\">" . $caption . "</a>";
			$item->Visible = $detailTableLink != "" && $Security->canAdd();

			// Hide single master/detail items
			$ar = explode(",", $detailTableLink);
			$cnt = count($ar);
			for ($i = 0; $i < $cnt; $i++) {
				if ($item = $option["detailadd_" . $ar[$i]])
					$item->Visible = FALSE;
			}
		}

		// Add grid edit
		$option = $options["addedit"];
		$item = &$option->add("gridedit");
		$item->Body = "<a class=\"ew-add-edit ew-grid-edit\" title=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridEditLink")) . "\" href=\"" . HtmlEncode($this->GridEditUrl) . "\">" . $Language->phrase("GridEditLink") . "</a>";
		$item->Visible = $this->GridEditUrl != "" && $Security->canEdit();
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
		$item->Body = "<a class=\"ew-save-filter\" data-form=\"ft004_assetlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("SaveCurrentFilter") . "</a>";
		$item->Visible = TRUE;
		$item = &$this->FilterOptions->add("deletefilter");
		$item->Body = "<a class=\"ew-delete-filter\" data-form=\"ft004_assetlistsrch\" href=\"#\" onclick=\"return false;\">" . $Language->phrase("DeleteFilter") . "</a>";
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
		if (!$this->isGridAdd() && !$this->isGridEdit()) { // Not grid add/edit mode
			$option = $options["action"];

			// Set up list action buttons
			foreach ($this->ListActions->Items as $listaction) {
				if ($listaction->Select == ACTION_MULTIPLE) {
					$item = &$option->add("custom_" . $listaction->Action);
					$caption = $listaction->Caption;
					$icon = ($listaction->Icon != "") ? "<i class=\"" . HtmlEncode($listaction->Icon) . "\" data-caption=\"" . HtmlEncode($caption) . "\"></i> " . $caption : $caption;
					$item->Body = "<a class=\"ew-action ew-list-action\" title=\"" . HtmlEncode($caption) . "\" data-caption=\"" . HtmlEncode($caption) . "\" href=\"#\" onclick=\"return ew.submitAction(event,jQuery.extend({f:document.ft004_assetlist}," . $listaction->toJson(TRUE) . "));\">" . $icon . "</a>";
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
		} else { // Grid add/edit mode

			// Hide all options first
			foreach ($options as $option)
				$option->hideAllOptions();

			// Grid-Add
			if ($this->isGridAdd()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = $options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = $Security->canAdd();
				}
				$option = $options["action"];
				$option->UseDropDownButton = FALSE;

				// Add grid insert
				$item = &$option->add("gridinsert");
				$item->Body = "<a class=\"ew-action ew-grid-insert\" title=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridInsertLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridInsertLink") . "</a>";

				// Add grid cancel
				$item = &$option->add("gridcancel");
				$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
				$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}

			// Grid-Edit
			if ($this->isGridEdit()) {
				if ($this->AllowAddDeleteRow) {

					// Add add blank row
					$option = $options["addedit"];
					$option->UseDropDownButton = FALSE;
					$item = &$option->add("addblankrow");
					$item->Body = "<a class=\"ew-add-edit ew-add-blank-row\" title=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("AddBlankRow")) . "\" href=\"#\" onclick=\"return ew.addGridRow(this);\">" . $Language->phrase("AddBlankRow") . "</a>";
					$item->Visible = $Security->canAdd();
				}
				$option = $options["action"];
				$option->UseDropDownButton = FALSE;
					$item = &$option->add("gridsave");
					$item->Body = "<a class=\"ew-action ew-grid-save\" title=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridSaveLink")) . "\" href=\"#\" onclick=\"return ew.forms(this).submit('" . $this->pageName() . "');\">" . $Language->phrase("GridSaveLink") . "</a>";
					$item = &$option->add("gridcancel");
					$cancelurl = $this->addMasterUrl($this->pageUrl() . "action=cancel");
					$item->Body = "<a class=\"ew-action ew-grid-cancel\" title=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" data-caption=\"" . HtmlTitle($Language->phrase("GridCancelLink")) . "\" href=\"" . $cancelurl . "\">" . $Language->phrase("GridCancelLink") . "</a>";
			}
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

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->property_id->CurrentValue = NULL;
		$this->property_id->OldValue = $this->property_id->CurrentValue;
		$this->department_id->CurrentValue = NULL;
		$this->department_id->OldValue = $this->department_id->CurrentValue;
		$this->signature_id->CurrentValue = NULL;
		$this->signature_id->OldValue = $this->signature_id->CurrentValue;
		$this->Code->CurrentValue = NULL;
		$this->Code->OldValue = $this->Code->CurrentValue;
		$this->Description->CurrentValue = NULL;
		$this->Description->OldValue = $this->Description->CurrentValue;
		$this->group_id->CurrentValue = NULL;
		$this->group_id->OldValue = $this->group_id->CurrentValue;
		$this->ProcurementDate->CurrentValue = NULL;
		$this->ProcurementDate->OldValue = $this->ProcurementDate->CurrentValue;
		$this->ProcurementCurrentCost->CurrentValue = 0.00;
		$this->ProcurementCurrentCost->OldValue = $this->ProcurementCurrentCost->CurrentValue;
		$this->Salvage->CurrentValue = 0.00;
		$this->Salvage->OldValue = $this->Salvage->CurrentValue;
		$this->Qty->CurrentValue = 0.00;
		$this->Qty->OldValue = $this->Qty->CurrentValue;
		$this->Remarks->CurrentValue = NULL;
		$this->Remarks->OldValue = $this->Remarks->CurrentValue;
	}

	// Load search values for validation
	protected function loadSearchValues()
	{

		// Load search values
		$got = FALSE;

		// property_id
		if (!$this->isAddOrEdit() && $this->property_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->property_id->AdvancedSearch->SearchValue != "" || $this->property_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// department_id
		if (!$this->isAddOrEdit() && $this->department_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->department_id->AdvancedSearch->SearchValue != "" || $this->department_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// signature_id
		if (!$this->isAddOrEdit() && $this->signature_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->signature_id->AdvancedSearch->SearchValue != "" || $this->signature_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Code
		if (!$this->isAddOrEdit() && $this->Code->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Code->AdvancedSearch->SearchValue != "" || $this->Code->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Description
		if (!$this->isAddOrEdit() && $this->Description->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Description->AdvancedSearch->SearchValue != "" || $this->Description->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// group_id
		if (!$this->isAddOrEdit() && $this->group_id->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->group_id->AdvancedSearch->SearchValue != "" || $this->group_id->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ProcurementDate
		if (!$this->isAddOrEdit() && $this->ProcurementDate->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ProcurementDate->AdvancedSearch->SearchValue != "" || $this->ProcurementDate->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// ProcurementCurrentCost
		if (!$this->isAddOrEdit() && $this->ProcurementCurrentCost->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->ProcurementCurrentCost->AdvancedSearch->SearchValue != "" || $this->ProcurementCurrentCost->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Salvage
		if (!$this->isAddOrEdit() && $this->Salvage->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Salvage->AdvancedSearch->SearchValue != "" || $this->Salvage->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Qty
		if (!$this->isAddOrEdit() && $this->Qty->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Qty->AdvancedSearch->SearchValue != "" || $this->Qty->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}

		// Remarks
		if (!$this->isAddOrEdit() && $this->Remarks->AdvancedSearch->get()) {
			$got = TRUE;
			if (($this->Remarks->AdvancedSearch->SearchValue != "" || $this->Remarks->AdvancedSearch->SearchValue2 != "") && $this->Command == "")
				$this->Command = "search";
		}
		return $got;
	}

	// Load form values
	protected function loadFormValues()
	{

		// Load from form
		global $CurrentForm;

		// Check field name 'property_id' first before field var 'x_property_id'
		$val = $CurrentForm->hasValue("property_id") ? $CurrentForm->getValue("property_id") : $CurrentForm->getValue("x_property_id");
		if (!$this->property_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->property_id->Visible = FALSE; // Disable update for API request
			else
				$this->property_id->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_property_id"))
			$this->property_id->setOldValue($CurrentForm->getValue("o_property_id"));

		// Check field name 'department_id' first before field var 'x_department_id'
		$val = $CurrentForm->hasValue("department_id") ? $CurrentForm->getValue("department_id") : $CurrentForm->getValue("x_department_id");
		if (!$this->department_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->department_id->Visible = FALSE; // Disable update for API request
			else
				$this->department_id->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_department_id"))
			$this->department_id->setOldValue($CurrentForm->getValue("o_department_id"));

		// Check field name 'signature_id' first before field var 'x_signature_id'
		$val = $CurrentForm->hasValue("signature_id") ? $CurrentForm->getValue("signature_id") : $CurrentForm->getValue("x_signature_id");
		if (!$this->signature_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->signature_id->Visible = FALSE; // Disable update for API request
			else
				$this->signature_id->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_signature_id"))
			$this->signature_id->setOldValue($CurrentForm->getValue("o_signature_id"));

		// Check field name 'Code' first before field var 'x_Code'
		$val = $CurrentForm->hasValue("Code") ? $CurrentForm->getValue("Code") : $CurrentForm->getValue("x_Code");
		if (!$this->Code->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code->Visible = FALSE; // Disable update for API request
			else
				$this->Code->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Code"))
			$this->Code->setOldValue($CurrentForm->getValue("o_Code"));

		// Check field name 'Description' first before field var 'x_Description'
		$val = $CurrentForm->hasValue("Description") ? $CurrentForm->getValue("Description") : $CurrentForm->getValue("x_Description");
		if (!$this->Description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Description->Visible = FALSE; // Disable update for API request
			else
				$this->Description->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Description"))
			$this->Description->setOldValue($CurrentForm->getValue("o_Description"));

		// Check field name 'group_id' first before field var 'x_group_id'
		$val = $CurrentForm->hasValue("group_id") ? $CurrentForm->getValue("group_id") : $CurrentForm->getValue("x_group_id");
		if (!$this->group_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->group_id->Visible = FALSE; // Disable update for API request
			else
				$this->group_id->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_group_id"))
			$this->group_id->setOldValue($CurrentForm->getValue("o_group_id"));

		// Check field name 'ProcurementDate' first before field var 'x_ProcurementDate'
		$val = $CurrentForm->hasValue("ProcurementDate") ? $CurrentForm->getValue("ProcurementDate") : $CurrentForm->getValue("x_ProcurementDate");
		if (!$this->ProcurementDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcurementDate->Visible = FALSE; // Disable update for API request
			else
				$this->ProcurementDate->setFormValue($val);
			$this->ProcurementDate->CurrentValue = UnFormatDateTime($this->ProcurementDate->CurrentValue, 7);
		}
		if ($CurrentForm->hasValue("o_ProcurementDate"))
			$this->ProcurementDate->setOldValue($CurrentForm->getValue("o_ProcurementDate"));

		// Check field name 'ProcurementCurrentCost' first before field var 'x_ProcurementCurrentCost'
		$val = $CurrentForm->hasValue("ProcurementCurrentCost") ? $CurrentForm->getValue("ProcurementCurrentCost") : $CurrentForm->getValue("x_ProcurementCurrentCost");
		if (!$this->ProcurementCurrentCost->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcurementCurrentCost->Visible = FALSE; // Disable update for API request
			else
				$this->ProcurementCurrentCost->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_ProcurementCurrentCost"))
			$this->ProcurementCurrentCost->setOldValue($CurrentForm->getValue("o_ProcurementCurrentCost"));

		// Check field name 'Salvage' first before field var 'x_Salvage'
		$val = $CurrentForm->hasValue("Salvage") ? $CurrentForm->getValue("Salvage") : $CurrentForm->getValue("x_Salvage");
		if (!$this->Salvage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Salvage->Visible = FALSE; // Disable update for API request
			else
				$this->Salvage->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Salvage"))
			$this->Salvage->setOldValue($CurrentForm->getValue("o_Salvage"));

		// Check field name 'Qty' first before field var 'x_Qty'
		$val = $CurrentForm->hasValue("Qty") ? $CurrentForm->getValue("Qty") : $CurrentForm->getValue("x_Qty");
		if (!$this->Qty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Qty->Visible = FALSE; // Disable update for API request
			else
				$this->Qty->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Qty"))
			$this->Qty->setOldValue($CurrentForm->getValue("o_Qty"));

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}
		if ($CurrentForm->hasValue("o_Remarks"))
			$this->Remarks->setOldValue($CurrentForm->getValue("o_Remarks"));

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey && !$this->isGridAdd() && !$this->isAdd())
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		if (!$this->isGridAdd() && !$this->isAdd())
			$this->id->CurrentValue = $this->id->FormValue;
		$this->property_id->CurrentValue = $this->property_id->FormValue;
		$this->department_id->CurrentValue = $this->department_id->FormValue;
		$this->signature_id->CurrentValue = $this->signature_id->FormValue;
		$this->Code->CurrentValue = $this->Code->FormValue;
		$this->Description->CurrentValue = $this->Description->FormValue;
		$this->group_id->CurrentValue = $this->group_id->FormValue;
		$this->ProcurementDate->CurrentValue = $this->ProcurementDate->FormValue;
		$this->ProcurementDate->CurrentValue = UnFormatDateTime($this->ProcurementDate->CurrentValue, 7);
		$this->ProcurementCurrentCost->CurrentValue = $this->ProcurementCurrentCost->FormValue;
		$this->Salvage->CurrentValue = $this->Salvage->FormValue;
		$this->Qty->CurrentValue = $this->Qty->FormValue;
		$this->Remarks->CurrentValue = $this->Remarks->FormValue;
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
			if (!$this->EventCancelled)
				$this->HashValue = $this->getRowHash($rs); // Get hash value for record
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
		$this->department_id->setDbValue($row['department_id']);
		$this->signature_id->setDbValue($row['signature_id']);
		$this->Code->setDbValue($row['Code']);
		$this->Description->setDbValue($row['Description']);
		$this->group_id->setDbValue($row['group_id']);
		$this->ProcurementDate->setDbValue($row['ProcurementDate']);
		$this->ProcurementCurrentCost->setDbValue($row['ProcurementCurrentCost']);
		$this->Salvage->setDbValue($row['Salvage']);
		$this->Qty->setDbValue($row['Qty']);
		$this->Remarks->setDbValue($row['Remarks']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['property_id'] = $this->property_id->CurrentValue;
		$row['department_id'] = $this->department_id->CurrentValue;
		$row['signature_id'] = $this->signature_id->CurrentValue;
		$row['Code'] = $this->Code->CurrentValue;
		$row['Description'] = $this->Description->CurrentValue;
		$row['group_id'] = $this->group_id->CurrentValue;
		$row['ProcurementDate'] = $this->ProcurementDate->CurrentValue;
		$row['ProcurementCurrentCost'] = $this->ProcurementCurrentCost->CurrentValue;
		$row['Salvage'] = $this->Salvage->CurrentValue;
		$row['Qty'] = $this->Qty->CurrentValue;
		$row['Remarks'] = $this->Remarks->CurrentValue;
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
		if ($this->Salvage->FormValue == $this->Salvage->CurrentValue && is_numeric(ConvertToFloatString($this->Salvage->CurrentValue)))
			$this->Salvage->CurrentValue = ConvertToFloatString($this->Salvage->CurrentValue);

		// Convert decimal values if posted back
		if ($this->Qty->FormValue == $this->Qty->CurrentValue && is_numeric(ConvertToFloatString($this->Qty->CurrentValue)))
			$this->Qty->CurrentValue = ConvertToFloatString($this->Qty->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// property_id
		// department_id
		// signature_id
		// Code
		// Description
		// group_id
		// ProcurementDate
		// ProcurementCurrentCost
		// Salvage
		// Qty
		// Remarks

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

			// department_id
			$curVal = strval($this->department_id->CurrentValue);
			if ($curVal != "") {
				$this->department_id->ViewValue = $this->department_id->lookupCacheOption($curVal);
				if ($this->department_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->department_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->department_id->ViewValue = $this->department_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->department_id->ViewValue = $this->department_id->CurrentValue;
					}
				}
			} else {
				$this->department_id->ViewValue = NULL;
			}
			$this->department_id->ViewCustomAttributes = "";

			// signature_id
			$curVal = strval($this->signature_id->CurrentValue);
			if ($curVal != "") {
				$this->signature_id->ViewValue = $this->signature_id->lookupCacheOption($curVal);
				if ($this->signature_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->signature_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$this->signature_id->ViewValue = $this->signature_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->signature_id->ViewValue = $this->signature_id->CurrentValue;
					}
				}
			} else {
				$this->signature_id->ViewValue = NULL;
			}
			$this->signature_id->ViewCustomAttributes = "";

			// Code
			$this->Code->ViewValue = $this->Code->CurrentValue;
			$this->Code->ViewCustomAttributes = "";

			// Description
			$this->Description->ViewValue = $this->Description->CurrentValue;
			$this->Description->ViewCustomAttributes = "";

			// group_id
			$curVal = strval($this->group_id->CurrentValue);
			if ($curVal != "") {
				$this->group_id->ViewValue = $this->group_id->lookupCacheOption($curVal);
				if ($this->group_id->ViewValue === NULL) { // Lookup from database
					$filterWrk = "`id`" . SearchString("=", $curVal, DATATYPE_NUMBER, "");
					$sqlWrk = $this->group_id->Lookup->getSql(FALSE, $filterWrk, '', $this);
					$rswrk = Conn()->execute($sqlWrk);
					if ($rswrk && !$rswrk->EOF) { // Lookup values found
						$arwrk = [];
						$arwrk[1] = $rswrk->fields('df');
						$arwrk[2] = FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2);
						$this->group_id->ViewValue = $this->group_id->displayValue($arwrk);
						$rswrk->Close();
					} else {
						$this->group_id->ViewValue = $this->group_id->CurrentValue;
					}
				}
			} else {
				$this->group_id->ViewValue = NULL;
			}
			$this->group_id->ViewCustomAttributes = "";

			// ProcurementDate
			$this->ProcurementDate->ViewValue = $this->ProcurementDate->CurrentValue;
			$this->ProcurementDate->ViewValue = FormatDateTime($this->ProcurementDate->ViewValue, 7);
			$this->ProcurementDate->ViewCustomAttributes = "";

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->ViewValue = $this->ProcurementCurrentCost->CurrentValue;
			$this->ProcurementCurrentCost->ViewValue = FormatNumber($this->ProcurementCurrentCost->ViewValue, 2, -2, -2, -2);
			$this->ProcurementCurrentCost->CellCssStyle .= "text-align: right;";
			$this->ProcurementCurrentCost->ViewCustomAttributes = "";

			// Salvage
			$this->Salvage->ViewValue = $this->Salvage->CurrentValue;
			$this->Salvage->ViewValue = FormatNumber($this->Salvage->ViewValue, 2, -2, -2, -2);
			$this->Salvage->CellCssStyle .= "text-align: right;";
			$this->Salvage->ViewCustomAttributes = "";

			// Qty
			$this->Qty->ViewValue = $this->Qty->CurrentValue;
			$this->Qty->ViewValue = FormatNumber($this->Qty->ViewValue, 2, -2, -2, -2);
			$this->Qty->CellCssStyle .= "text-align: right;";
			$this->Qty->ViewCustomAttributes = "";

			// Remarks
			$this->Remarks->ViewValue = $this->Remarks->CurrentValue;
			$this->Remarks->ViewCustomAttributes = "";

			// property_id
			$this->property_id->LinkCustomAttributes = "";
			$this->property_id->HrefValue = "";
			$this->property_id->TooltipValue = "";

			// department_id
			$this->department_id->LinkCustomAttributes = "";
			$this->department_id->HrefValue = "";
			$this->department_id->TooltipValue = "";

			// signature_id
			$this->signature_id->LinkCustomAttributes = "";
			$this->signature_id->HrefValue = "";
			$this->signature_id->TooltipValue = "";

			// Code
			$this->Code->LinkCustomAttributes = "";
			$this->Code->HrefValue = "";
			$this->Code->TooltipValue = "";

			// Description
			$this->Description->LinkCustomAttributes = "";
			$this->Description->HrefValue = "";
			$this->Description->TooltipValue = "";

			// group_id
			$this->group_id->LinkCustomAttributes = "";
			$this->group_id->HrefValue = "";
			$this->group_id->TooltipValue = "";

			// ProcurementDate
			$this->ProcurementDate->LinkCustomAttributes = "";
			$this->ProcurementDate->HrefValue = "";
			$this->ProcurementDate->TooltipValue = "";

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->LinkCustomAttributes = "";
			$this->ProcurementCurrentCost->HrefValue = "";
			$this->ProcurementCurrentCost->TooltipValue = "";

			// Salvage
			$this->Salvage->LinkCustomAttributes = "";
			$this->Salvage->HrefValue = "";
			$this->Salvage->TooltipValue = "";

			// Qty
			$this->Qty->LinkCustomAttributes = "";
			$this->Qty->HrefValue = "";
			$this->Qty->TooltipValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
			$this->Remarks->TooltipValue = "";
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// property_id
			$this->property_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->property_id->CurrentValue));
			if ($curVal != "")
				$this->property_id->ViewValue = $this->property_id->lookupCacheOption($curVal);
			else
				$this->property_id->ViewValue = $this->property_id->Lookup !== NULL && is_array($this->property_id->Lookup->Options) ? $curVal : NULL;
			if ($this->property_id->ViewValue !== NULL) { // Load from cache
				$this->property_id->EditValue = array_values($this->property_id->Lookup->Options);
				if ($this->property_id->ViewValue == "")
					$this->property_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->property_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->property_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->property_id->ViewValue = $this->property_id->displayValue($arwrk);
				} else {
					$this->property_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->property_id->EditValue = $arwrk;
			}

			// department_id
			$this->department_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->department_id->CurrentValue));
			if ($curVal != "")
				$this->department_id->ViewValue = $this->department_id->lookupCacheOption($curVal);
			else
				$this->department_id->ViewValue = $this->department_id->Lookup !== NULL && is_array($this->department_id->Lookup->Options) ? $curVal : NULL;
			if ($this->department_id->ViewValue !== NULL) { // Load from cache
				$this->department_id->EditValue = array_values($this->department_id->Lookup->Options);
				if ($this->department_id->ViewValue == "")
					$this->department_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->department_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->department_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->department_id->ViewValue = $this->department_id->displayValue($arwrk);
				} else {
					$this->department_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->department_id->EditValue = $arwrk;
			}

			// signature_id
			$this->signature_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->signature_id->CurrentValue));
			if ($curVal != "")
				$this->signature_id->ViewValue = $this->signature_id->lookupCacheOption($curVal);
			else
				$this->signature_id->ViewValue = $this->signature_id->Lookup !== NULL && is_array($this->signature_id->Lookup->Options) ? $curVal : NULL;
			if ($this->signature_id->ViewValue !== NULL) { // Load from cache
				$this->signature_id->EditValue = array_values($this->signature_id->Lookup->Options);
				if ($this->signature_id->ViewValue == "")
					$this->signature_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->signature_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->signature_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->signature_id->ViewValue = $this->signature_id->displayValue($arwrk);
				} else {
					$this->signature_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->signature_id->EditValue = $arwrk;
			}

			// Code
			$this->Code->EditAttrs["class"] = "form-control";
			$this->Code->EditCustomAttributes = "";
			if (!$this->Code->Raw)
				$this->Code->CurrentValue = HtmlDecode($this->Code->CurrentValue);
			$this->Code->EditValue = HtmlEncode($this->Code->CurrentValue);
			$this->Code->PlaceHolder = RemoveHtml($this->Code->caption());

			// Description
			$this->Description->EditAttrs["class"] = "form-control";
			$this->Description->EditCustomAttributes = "";
			if (!$this->Description->Raw)
				$this->Description->CurrentValue = HtmlDecode($this->Description->CurrentValue);
			$this->Description->EditValue = HtmlEncode($this->Description->CurrentValue);
			$this->Description->PlaceHolder = RemoveHtml($this->Description->caption());

			// group_id
			$this->group_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->group_id->CurrentValue));
			if ($curVal != "")
				$this->group_id->ViewValue = $this->group_id->lookupCacheOption($curVal);
			else
				$this->group_id->ViewValue = $this->group_id->Lookup !== NULL && is_array($this->group_id->Lookup->Options) ? $curVal : NULL;
			if ($this->group_id->ViewValue !== NULL) { // Load from cache
				$this->group_id->EditValue = array_values($this->group_id->Lookup->Options);
				if ($this->group_id->ViewValue == "")
					$this->group_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->group_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->group_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
					$this->group_id->ViewValue = $this->group_id->displayValue($arwrk);
				} else {
					$this->group_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$rowcnt = count($arwrk);
				for ($i = 0; $i < $rowcnt; $i++) {
					$arwrk[$i][2] = FormatNumber($arwrk[$i][2], 0, -2, -2, -2);
				}
				$this->group_id->EditValue = $arwrk;
			}

			// ProcurementDate
			$this->ProcurementDate->EditAttrs["class"] = "form-control";
			$this->ProcurementDate->EditCustomAttributes = "";
			$this->ProcurementDate->EditValue = HtmlEncode(FormatDateTime($this->ProcurementDate->CurrentValue, 7));
			$this->ProcurementDate->PlaceHolder = RemoveHtml($this->ProcurementDate->caption());

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->EditAttrs["class"] = "form-control";
			$this->ProcurementCurrentCost->EditCustomAttributes = "";
			$this->ProcurementCurrentCost->EditValue = HtmlEncode($this->ProcurementCurrentCost->CurrentValue);
			$this->ProcurementCurrentCost->PlaceHolder = RemoveHtml($this->ProcurementCurrentCost->caption());
			if (strval($this->ProcurementCurrentCost->EditValue) != "" && is_numeric($this->ProcurementCurrentCost->EditValue)) {
				$this->ProcurementCurrentCost->EditValue = FormatNumber($this->ProcurementCurrentCost->EditValue, -2, -2, -2, -2);
				$this->ProcurementCurrentCost->OldValue = $this->ProcurementCurrentCost->EditValue;
			}
			

			// Salvage
			$this->Salvage->EditAttrs["class"] = "form-control";
			$this->Salvage->EditCustomAttributes = "";
			$this->Salvage->EditValue = HtmlEncode($this->Salvage->CurrentValue);
			$this->Salvage->PlaceHolder = RemoveHtml($this->Salvage->caption());
			if (strval($this->Salvage->EditValue) != "" && is_numeric($this->Salvage->EditValue)) {
				$this->Salvage->EditValue = FormatNumber($this->Salvage->EditValue, -2, -2, -2, -2);
				$this->Salvage->OldValue = $this->Salvage->EditValue;
			}
			

			// Qty
			$this->Qty->EditAttrs["class"] = "form-control";
			$this->Qty->EditCustomAttributes = "";
			$this->Qty->EditValue = HtmlEncode($this->Qty->CurrentValue);
			$this->Qty->PlaceHolder = RemoveHtml($this->Qty->caption());
			if (strval($this->Qty->EditValue) != "" && is_numeric($this->Qty->EditValue)) {
				$this->Qty->EditValue = FormatNumber($this->Qty->EditValue, -2, -2, -2, -2);
				$this->Qty->OldValue = $this->Qty->EditValue;
			}
			

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// Add refer script
			// property_id

			$this->property_id->LinkCustomAttributes = "";
			$this->property_id->HrefValue = "";

			// department_id
			$this->department_id->LinkCustomAttributes = "";
			$this->department_id->HrefValue = "";

			// signature_id
			$this->signature_id->LinkCustomAttributes = "";
			$this->signature_id->HrefValue = "";

			// Code
			$this->Code->LinkCustomAttributes = "";
			$this->Code->HrefValue = "";

			// Description
			$this->Description->LinkCustomAttributes = "";
			$this->Description->HrefValue = "";

			// group_id
			$this->group_id->LinkCustomAttributes = "";
			$this->group_id->HrefValue = "";

			// ProcurementDate
			$this->ProcurementDate->LinkCustomAttributes = "";
			$this->ProcurementDate->HrefValue = "";

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->LinkCustomAttributes = "";
			$this->ProcurementCurrentCost->HrefValue = "";

			// Salvage
			$this->Salvage->LinkCustomAttributes = "";
			$this->Salvage->HrefValue = "";

			// Qty
			$this->Qty->LinkCustomAttributes = "";
			$this->Qty->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// property_id
			$this->property_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->property_id->CurrentValue));
			if ($curVal != "")
				$this->property_id->ViewValue = $this->property_id->lookupCacheOption($curVal);
			else
				$this->property_id->ViewValue = $this->property_id->Lookup !== NULL && is_array($this->property_id->Lookup->Options) ? $curVal : NULL;
			if ($this->property_id->ViewValue !== NULL) { // Load from cache
				$this->property_id->EditValue = array_values($this->property_id->Lookup->Options);
				if ($this->property_id->ViewValue == "")
					$this->property_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->property_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->property_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->property_id->ViewValue = $this->property_id->displayValue($arwrk);
				} else {
					$this->property_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->property_id->EditValue = $arwrk;
			}

			// department_id
			$this->department_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->department_id->CurrentValue));
			if ($curVal != "")
				$this->department_id->ViewValue = $this->department_id->lookupCacheOption($curVal);
			else
				$this->department_id->ViewValue = $this->department_id->Lookup !== NULL && is_array($this->department_id->Lookup->Options) ? $curVal : NULL;
			if ($this->department_id->ViewValue !== NULL) { // Load from cache
				$this->department_id->EditValue = array_values($this->department_id->Lookup->Options);
				if ($this->department_id->ViewValue == "")
					$this->department_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->department_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->department_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->department_id->ViewValue = $this->department_id->displayValue($arwrk);
				} else {
					$this->department_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->department_id->EditValue = $arwrk;
			}

			// signature_id
			$this->signature_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->signature_id->CurrentValue));
			if ($curVal != "")
				$this->signature_id->ViewValue = $this->signature_id->lookupCacheOption($curVal);
			else
				$this->signature_id->ViewValue = $this->signature_id->Lookup !== NULL && is_array($this->signature_id->Lookup->Options) ? $curVal : NULL;
			if ($this->signature_id->ViewValue !== NULL) { // Load from cache
				$this->signature_id->EditValue = array_values($this->signature_id->Lookup->Options);
				if ($this->signature_id->ViewValue == "")
					$this->signature_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->signature_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->signature_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->signature_id->ViewValue = $this->signature_id->displayValue($arwrk);
				} else {
					$this->signature_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->signature_id->EditValue = $arwrk;
			}

			// Code
			$this->Code->EditAttrs["class"] = "form-control";
			$this->Code->EditCustomAttributes = "";
			if (!$this->Code->Raw)
				$this->Code->CurrentValue = HtmlDecode($this->Code->CurrentValue);
			$this->Code->EditValue = HtmlEncode($this->Code->CurrentValue);
			$this->Code->PlaceHolder = RemoveHtml($this->Code->caption());

			// Description
			$this->Description->EditAttrs["class"] = "form-control";
			$this->Description->EditCustomAttributes = "";
			if (!$this->Description->Raw)
				$this->Description->CurrentValue = HtmlDecode($this->Description->CurrentValue);
			$this->Description->EditValue = HtmlEncode($this->Description->CurrentValue);
			$this->Description->PlaceHolder = RemoveHtml($this->Description->caption());

			// group_id
			$this->group_id->EditCustomAttributes = "";
			$curVal = trim(strval($this->group_id->CurrentValue));
			if ($curVal != "")
				$this->group_id->ViewValue = $this->group_id->lookupCacheOption($curVal);
			else
				$this->group_id->ViewValue = $this->group_id->Lookup !== NULL && is_array($this->group_id->Lookup->Options) ? $curVal : NULL;
			if ($this->group_id->ViewValue !== NULL) { // Load from cache
				$this->group_id->EditValue = array_values($this->group_id->Lookup->Options);
				if ($this->group_id->ViewValue == "")
					$this->group_id->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->group_id->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->group_id->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$arwrk[2] = HtmlEncode(FormatNumber($rswrk->fields('df2'), 0, -2, -2, -2));
					$this->group_id->ViewValue = $this->group_id->displayValue($arwrk);
				} else {
					$this->group_id->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$rowcnt = count($arwrk);
				for ($i = 0; $i < $rowcnt; $i++) {
					$arwrk[$i][2] = FormatNumber($arwrk[$i][2], 0, -2, -2, -2);
				}
				$this->group_id->EditValue = $arwrk;
			}

			// ProcurementDate
			$this->ProcurementDate->EditAttrs["class"] = "form-control";
			$this->ProcurementDate->EditCustomAttributes = "";
			$this->ProcurementDate->EditValue = HtmlEncode(FormatDateTime($this->ProcurementDate->CurrentValue, 7));
			$this->ProcurementDate->PlaceHolder = RemoveHtml($this->ProcurementDate->caption());

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->EditAttrs["class"] = "form-control";
			$this->ProcurementCurrentCost->EditCustomAttributes = "";
			$this->ProcurementCurrentCost->EditValue = HtmlEncode($this->ProcurementCurrentCost->CurrentValue);
			$this->ProcurementCurrentCost->PlaceHolder = RemoveHtml($this->ProcurementCurrentCost->caption());
			if (strval($this->ProcurementCurrentCost->EditValue) != "" && is_numeric($this->ProcurementCurrentCost->EditValue)) {
				$this->ProcurementCurrentCost->EditValue = FormatNumber($this->ProcurementCurrentCost->EditValue, -2, -2, -2, -2);
				$this->ProcurementCurrentCost->OldValue = $this->ProcurementCurrentCost->EditValue;
			}
			

			// Salvage
			$this->Salvage->EditAttrs["class"] = "form-control";
			$this->Salvage->EditCustomAttributes = "";
			$this->Salvage->EditValue = HtmlEncode($this->Salvage->CurrentValue);
			$this->Salvage->PlaceHolder = RemoveHtml($this->Salvage->caption());
			if (strval($this->Salvage->EditValue) != "" && is_numeric($this->Salvage->EditValue)) {
				$this->Salvage->EditValue = FormatNumber($this->Salvage->EditValue, -2, -2, -2, -2);
				$this->Salvage->OldValue = $this->Salvage->EditValue;
			}
			

			// Qty
			$this->Qty->EditAttrs["class"] = "form-control";
			$this->Qty->EditCustomAttributes = "";
			$this->Qty->EditValue = HtmlEncode($this->Qty->CurrentValue);
			$this->Qty->PlaceHolder = RemoveHtml($this->Qty->caption());
			if (strval($this->Qty->EditValue) != "" && is_numeric($this->Qty->EditValue)) {
				$this->Qty->EditValue = FormatNumber($this->Qty->EditValue, -2, -2, -2, -2);
				$this->Qty->OldValue = $this->Qty->EditValue;
			}
			

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// Edit refer script
			// property_id

			$this->property_id->LinkCustomAttributes = "";
			$this->property_id->HrefValue = "";

			// department_id
			$this->department_id->LinkCustomAttributes = "";
			$this->department_id->HrefValue = "";

			// signature_id
			$this->signature_id->LinkCustomAttributes = "";
			$this->signature_id->HrefValue = "";

			// Code
			$this->Code->LinkCustomAttributes = "";
			$this->Code->HrefValue = "";

			// Description
			$this->Description->LinkCustomAttributes = "";
			$this->Description->HrefValue = "";

			// group_id
			$this->group_id->LinkCustomAttributes = "";
			$this->group_id->HrefValue = "";

			// ProcurementDate
			$this->ProcurementDate->LinkCustomAttributes = "";
			$this->ProcurementDate->HrefValue = "";

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->LinkCustomAttributes = "";
			$this->ProcurementCurrentCost->HrefValue = "";

			// Salvage
			$this->Salvage->LinkCustomAttributes = "";
			$this->Salvage->HrefValue = "";

			// Qty
			$this->Qty->LinkCustomAttributes = "";
			$this->Qty->HrefValue = "";

			// Remarks
			$this->Remarks->LinkCustomAttributes = "";
			$this->Remarks->HrefValue = "";
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

	// Validate form
	protected function validateForm()
	{
		global $Language, $FormError;

		// Initialize form error message
		$FormError = "";

		// Check if validation required
		if (!Config("SERVER_VALIDATE"))
			return ($FormError == "");
		if ($this->property_id->Required) {
			if (!$this->property_id->IsDetailKey && $this->property_id->FormValue != NULL && $this->property_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->property_id->caption(), $this->property_id->RequiredErrorMessage));
			}
		}
		if ($this->department_id->Required) {
			if (!$this->department_id->IsDetailKey && $this->department_id->FormValue != NULL && $this->department_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->department_id->caption(), $this->department_id->RequiredErrorMessage));
			}
		}
		if ($this->signature_id->Required) {
			if (!$this->signature_id->IsDetailKey && $this->signature_id->FormValue != NULL && $this->signature_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->signature_id->caption(), $this->signature_id->RequiredErrorMessage));
			}
		}
		if ($this->Code->Required) {
			if (!$this->Code->IsDetailKey && $this->Code->FormValue != NULL && $this->Code->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Code->caption(), $this->Code->RequiredErrorMessage));
			}
		}
		if ($this->Description->Required) {
			if (!$this->Description->IsDetailKey && $this->Description->FormValue != NULL && $this->Description->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Description->caption(), $this->Description->RequiredErrorMessage));
			}
		}
		if ($this->group_id->Required) {
			if (!$this->group_id->IsDetailKey && $this->group_id->FormValue != NULL && $this->group_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->group_id->caption(), $this->group_id->RequiredErrorMessage));
			}
		}
		if ($this->ProcurementDate->Required) {
			if (!$this->ProcurementDate->IsDetailKey && $this->ProcurementDate->FormValue != NULL && $this->ProcurementDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcurementDate->caption(), $this->ProcurementDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->ProcurementDate->FormValue)) {
			AddMessage($FormError, $this->ProcurementDate->errorMessage());
		}
		if ($this->ProcurementCurrentCost->Required) {
			if (!$this->ProcurementCurrentCost->IsDetailKey && $this->ProcurementCurrentCost->FormValue != NULL && $this->ProcurementCurrentCost->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ProcurementCurrentCost->caption(), $this->ProcurementCurrentCost->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->ProcurementCurrentCost->FormValue)) {
			AddMessage($FormError, $this->ProcurementCurrentCost->errorMessage());
		}
		if ($this->Salvage->Required) {
			if (!$this->Salvage->IsDetailKey && $this->Salvage->FormValue != NULL && $this->Salvage->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Salvage->caption(), $this->Salvage->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Salvage->FormValue)) {
			AddMessage($FormError, $this->Salvage->errorMessage());
		}
		if ($this->Qty->Required) {
			if (!$this->Qty->IsDetailKey && $this->Qty->FormValue != NULL && $this->Qty->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Qty->caption(), $this->Qty->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->Qty->FormValue)) {
			AddMessage($FormError, $this->Qty->errorMessage());
		}
		if ($this->Remarks->Required) {
			if (!$this->Remarks->IsDetailKey && $this->Remarks->FormValue != NULL && $this->Remarks->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Remarks->caption(), $this->Remarks->RequiredErrorMessage));
			}
		}

		// Return validate result
		$validateForm = ($FormError == "");

		// Call Form_CustomValidate event
		$formCustomError = "";
		$validateForm = $validateForm && $this->Form_CustomValidate($formCustomError);
		if ($formCustomError != "") {
			AddMessage($FormError, $formCustomError);
		}
		return $validateForm;
	}

	// Delete records based on current filter
	protected function deleteRows()
	{
		global $Language, $Security;
		if (!$Security->canDelete()) {
			$this->setFailureMessage($Language->phrase("NoDeletePermission")); // No delete permission
			return FALSE;
		}
		$deleteRows = TRUE;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE) {
			return FALSE;
		} elseif ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
			$rs->close();
			return FALSE;
		}
		$rows = ($rs) ? $rs->getRows() : [];
		if ($this->AuditTrailOnDelete)
			$this->writeAuditTrailDummy($Language->phrase("BatchDeleteBegin")); // Batch delete begin

		// Clone old rows
		$rsold = $rows;
		if ($rs)
			$rs->close();

		// Call row deleting event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$deleteRows = $this->Row_Deleting($row);
				if (!$deleteRows)
					break;
			}
		}
		if ($deleteRows) {
			$key = "";
			foreach ($rsold as $row) {
				$thisKey = "";
				if ($thisKey != "")
					$thisKey .= Config("COMPOSITE_KEY_SEPARATOR");
				$thisKey .= $row['id'];
				if (Config("DELETE_UPLOADED_FILES")) // Delete old files
					$this->deleteUploadedFiles($row);
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				$deleteRows = $this->delete($row); // Delete
				$conn->raiseErrorFn = "";
				if ($deleteRows === FALSE)
					break;
				if ($key != "")
					$key .= ", ";
				$key .= $thisKey;
			}
		}
		if (!$deleteRows) {

			// Set up error message
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("DeleteCancelled"));
			}
		}

		// Call Row Deleted event
		if ($deleteRows) {
			foreach ($rsold as $row) {
				$this->Row_Deleted($row);
			}
		}

		// Write JSON for API request (Support single row only)
		if (IsApi() && $deleteRows) {
			$row = $this->getRecordsFromRecordset($rsold, TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $deleteRows;
	}

	// Update record based on key values
	protected function editRow()
	{
		global $Security, $Language;
		$oldKeyFilter = $this->getRecordFilter();
		$filter = $this->applyUserIDFilters($oldKeyFilter);
		$conn = $this->getConnection();
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn->raiseErrorFn = Config("ERROR_FUNC");
		$rs = $conn->execute($sql);
		$conn->raiseErrorFn = "";
		if ($rs === FALSE)
			return FALSE;
		if ($rs->EOF) {
			$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
			$editRow = FALSE; // Update Failed
		} else {

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// property_id
			$this->property_id->setDbValueDef($rsnew, $this->property_id->CurrentValue, 0, $this->property_id->ReadOnly);

			// department_id
			$this->department_id->setDbValueDef($rsnew, $this->department_id->CurrentValue, 0, $this->department_id->ReadOnly);

			// signature_id
			$this->signature_id->setDbValueDef($rsnew, $this->signature_id->CurrentValue, 0, $this->signature_id->ReadOnly);

			// Code
			$this->Code->setDbValueDef($rsnew, $this->Code->CurrentValue, "", $this->Code->ReadOnly);

			// Description
			$this->Description->setDbValueDef($rsnew, $this->Description->CurrentValue, "", $this->Description->ReadOnly);

			// group_id
			$this->group_id->setDbValueDef($rsnew, $this->group_id->CurrentValue, 0, $this->group_id->ReadOnly);

			// ProcurementDate
			$this->ProcurementDate->setDbValueDef($rsnew, UnFormatDateTime($this->ProcurementDate->CurrentValue, 7), CurrentDate(), $this->ProcurementDate->ReadOnly);

			// ProcurementCurrentCost
			$this->ProcurementCurrentCost->setDbValueDef($rsnew, $this->ProcurementCurrentCost->CurrentValue, 0, $this->ProcurementCurrentCost->ReadOnly);

			// Salvage
			$this->Salvage->setDbValueDef($rsnew, $this->Salvage->CurrentValue, 0, $this->Salvage->ReadOnly);

			// Qty
			$this->Qty->setDbValueDef($rsnew, $this->Qty->CurrentValue, 0, $this->Qty->ReadOnly);

			// Remarks
			$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, $this->Remarks->ReadOnly);

			// Call Row Updating event
			$updateRow = $this->Row_Updating($rsold, $rsnew);

			// Check for duplicate key when key changed
			if ($updateRow) {
				$newKeyFilter = $this->getRecordFilter($rsnew);
				if ($newKeyFilter != $oldKeyFilter) {
					$rsChk = $this->loadRs($newKeyFilter);
					if ($rsChk && !$rsChk->EOF) {
						$keyErrMsg = str_replace("%f", $newKeyFilter, $Language->phrase("DupKey"));
						$this->setFailureMessage($keyErrMsg);
						$rsChk->close();
						$updateRow = FALSE;
					}
				}
			}
			if ($updateRow) {
				$conn->raiseErrorFn = Config("ERROR_FUNC");
				if (count($rsnew) > 0)
					$editRow = $this->update($rsnew, "", $rsold);
				else
					$editRow = TRUE; // No field to update
				$conn->raiseErrorFn = "";
				if ($editRow) {
				}
			} else {
				if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

					// Use the message, do nothing
				} elseif ($this->CancelMessage != "") {
					$this->setFailureMessage($this->CancelMessage);
					$this->CancelMessage = "";
				} else {
					$this->setFailureMessage($Language->phrase("UpdateCancelled"));
				}
				$editRow = FALSE;
			}
		}

		// Call Row_Updated event
		if ($editRow)
			$this->Row_Updated($rsold, $rsnew);
		$rs->close();

		// Clean upload path if any
		if ($editRow) {
		}

		// Write JSON for API request
		if (IsApi() && $editRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $editRow;
	}

	// Load row hash
	protected function loadRowHash()
	{
		$filter = $this->getRecordFilter();

		// Load SQL based on filter
		$this->CurrentFilter = $filter;
		$sql = $this->getCurrentSql();
		$conn = $this->getConnection();
		$rsRow = $conn->Execute($sql);
		$this->HashValue = ($rsRow && !$rsRow->EOF) ? $this->getRowHash($rsRow) : ""; // Get hash value for record
		$rsRow->close();
	}

	// Get Row Hash
	public function getRowHash(&$rs)
	{
		if (!$rs)
			return "";
		$hash = "";
		$hash .= GetFieldHash($rs->fields('property_id')); // property_id
		$hash .= GetFieldHash($rs->fields('department_id')); // department_id
		$hash .= GetFieldHash($rs->fields('signature_id')); // signature_id
		$hash .= GetFieldHash($rs->fields('Code')); // Code
		$hash .= GetFieldHash($rs->fields('Description')); // Description
		$hash .= GetFieldHash($rs->fields('group_id')); // group_id
		$hash .= GetFieldHash($rs->fields('ProcurementDate')); // ProcurementDate
		$hash .= GetFieldHash($rs->fields('ProcurementCurrentCost')); // ProcurementCurrentCost
		$hash .= GetFieldHash($rs->fields('Salvage')); // Salvage
		$hash .= GetFieldHash($rs->fields('Qty')); // Qty
		$hash .= GetFieldHash($rs->fields('Remarks')); // Remarks
		return md5($hash);
	}

	// Add record
	protected function addRow($rsold = NULL)
	{
		global $Language, $Security;
		$conn = $this->getConnection();

		// Load db values from rsold
		$this->loadDbValues($rsold);
		if ($rsold) {
		}
		$rsnew = [];

		// property_id
		$this->property_id->setDbValueDef($rsnew, $this->property_id->CurrentValue, 0, FALSE);

		// department_id
		$this->department_id->setDbValueDef($rsnew, $this->department_id->CurrentValue, 0, FALSE);

		// signature_id
		$this->signature_id->setDbValueDef($rsnew, $this->signature_id->CurrentValue, 0, FALSE);

		// Code
		$this->Code->setDbValueDef($rsnew, $this->Code->CurrentValue, "", FALSE);

		// Description
		$this->Description->setDbValueDef($rsnew, $this->Description->CurrentValue, "", FALSE);

		// group_id
		$this->group_id->setDbValueDef($rsnew, $this->group_id->CurrentValue, 0, FALSE);

		// ProcurementDate
		$this->ProcurementDate->setDbValueDef($rsnew, UnFormatDateTime($this->ProcurementDate->CurrentValue, 7), CurrentDate(), FALSE);

		// ProcurementCurrentCost
		$this->ProcurementCurrentCost->setDbValueDef($rsnew, $this->ProcurementCurrentCost->CurrentValue, 0, strval($this->ProcurementCurrentCost->CurrentValue) == "");

		// Salvage
		$this->Salvage->setDbValueDef($rsnew, $this->Salvage->CurrentValue, 0, strval($this->Salvage->CurrentValue) == "");

		// Qty
		$this->Qty->setDbValueDef($rsnew, $this->Qty->CurrentValue, 0, strval($this->Qty->CurrentValue) == "");

		// Remarks
		$this->Remarks->setDbValueDef($rsnew, $this->Remarks->CurrentValue, NULL, FALSE);

		// Call Row Inserting event
		$rs = ($rsold) ? $rsold->fields : NULL;
		$insertRow = $this->Row_Inserting($rs, $rsnew);
		if ($insertRow) {
			$conn->raiseErrorFn = Config("ERROR_FUNC");
			$addRow = $this->insert($rsnew);
			$conn->raiseErrorFn = "";
			if ($addRow) {
			}
		} else {
			if ($this->getSuccessMessage() != "" || $this->getFailureMessage() != "") {

				// Use the message, do nothing
			} elseif ($this->CancelMessage != "") {
				$this->setFailureMessage($this->CancelMessage);
				$this->CancelMessage = "";
			} else {
				$this->setFailureMessage($Language->phrase("InsertCancelled"));
			}
			$addRow = FALSE;
		}
		if ($addRow) {

			// Call Row Inserted event
			$rs = ($rsold) ? $rsold->fields : NULL;
			$this->Row_Inserted($rs, $rsnew);
		}

		// Clean upload path if any
		if ($addRow) {
		}

		// Write JSON for API request
		if (IsApi() && $addRow) {
			$row = $this->getRecordsFromRecordset([$rsnew], TRUE);
			WriteJson(["success" => TRUE, $this->TableVar => $row]);
		}
		return $addRow;
	}

	// Load advanced search
	public function loadAdvancedSearch()
	{
		$this->property_id->AdvancedSearch->load();
		$this->department_id->AdvancedSearch->load();
		$this->signature_id->AdvancedSearch->load();
		$this->Code->AdvancedSearch->load();
		$this->Description->AdvancedSearch->load();
		$this->group_id->AdvancedSearch->load();
		$this->ProcurementDate->AdvancedSearch->load();
		$this->ProcurementCurrentCost->AdvancedSearch->load();
		$this->Salvage->AdvancedSearch->load();
		$this->Qty->AdvancedSearch->load();
		$this->Remarks->AdvancedSearch->load();
	}

	// Get export HTML tag
	protected function getExportTag($type, $custom = FALSE)
	{
		global $Language;
		if (SameText($type, "excel")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" onclick=\"return ew.export(document.ft004_assetlist, '" . $this->ExportExcelUrl . "', 'excel', true);\">" . $Language->phrase("ExportToExcel") . "</a>";
			else
				return "<a href=\"" . $this->ExportExcelUrl . "\" class=\"ew-export-link ew-excel\" title=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToExcelText")) . "\">" . $Language->phrase("ExportToExcel") . "</a>";
		} elseif (SameText($type, "word")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" onclick=\"return ew.export(document.ft004_assetlist, '" . $this->ExportWordUrl . "', 'word', true);\">" . $Language->phrase("ExportToWord") . "</a>";
			else
				return "<a href=\"" . $this->ExportWordUrl . "\" class=\"ew-export-link ew-word\" title=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToWordText")) . "\">" . $Language->phrase("ExportToWord") . "</a>";
		} elseif (SameText($type, "pdf")) {
			if ($custom)
				return "<a href=\"#\" class=\"ew-export-link ew-pdf\" title=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" data-caption=\"" . HtmlEncode($Language->phrase("ExportToPDFText")) . "\" onclick=\"return ew.export(document.ft004_assetlist, '" . $this->ExportPdfUrl . "', 'pdf', true);\">" . $Language->phrase("ExportToPDF") . "</a>";
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
			return '<button id="emf_t004_asset" class="ew-export-link ew-email" title="' . $Language->phrase("ExportToEmailText") . '" data-caption="' . $Language->phrase("ExportToEmailText") . '" onclick="ew.emailDialogShow({lnk:\'emf_t004_asset\', hdr:ew.language.phrase(\'ExportToEmailText\'), f:document.ft004_assetlist, sel:false' . $url . '});">' . $Language->phrase("ExportToEmail") . '</button>';
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

		// Show all button
		$item = &$this->SearchOptions->add("showall");
		$item->Body = "<a class=\"btn btn-default ew-show-all\" title=\"" . $Language->phrase("ShowAll") . "\" data-caption=\"" . $Language->phrase("ShowAll") . "\" href=\"" . $this->pageUrl() . "cmd=reset\">" . $Language->phrase("ShowAllBtn") . "</a>";
		$item->Visible = ($this->SearchWhere != $this->DefaultSearchWhere && $this->SearchWhere != "0=101");

		// Advanced search button
		$item = &$this->SearchOptions->add("advancedsearch");
		if (IsMobile())
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"t004_assetsrch.php\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		else
			$item->Body = "<a class=\"btn btn-default ew-advanced-search\" title=\"" . $Language->phrase("AdvancedSearch") . "\" data-table=\"t004_asset\" data-caption=\"" . $Language->phrase("AdvancedSearch") . "\" href=\"#\" onclick=\"return ew.modalDialogShow({lnk:this,btn:'SearchBtn',url:'t004_assetsrch.php'});\">" . $Language->phrase("AdvancedSearchBtn") . "</a>";
		$item->Visible = TRUE;

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
				case "x_property_id":
					break;
				case "x_department_id":
					break;
				case "x_signature_id":
					break;
				case "x_group_id":
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
						case "x_department_id":
							break;
						case "x_signature_id":
							break;
						case "x_group_id":
							$row[2] = FormatNumber($row[2], 0, -2, -2, -2);
							$row['df2'] = $row[2];
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