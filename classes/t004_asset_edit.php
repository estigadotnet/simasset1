<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class t004_asset_edit extends t004_asset
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 't004_asset';

	// Page object name
	public $PageObjName = "t004_asset_edit";

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

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

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

			// Handle modal response
			if ($this->IsModal) { // Show as modal
				$row = ["url" => $url, "modal" => "1"];
				$pageName = GetPageName($url);
				if ($pageName != $this->getListUrl()) { // Not List page
					$row["caption"] = $this->getModalCaption($pageName);
					if ($pageName == "t004_assetview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-edit-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter;
	public $DbDetailFilter;

	//
	// Page run
	//

	public function run()
	{
		global $ExportType, $CustomExportType, $ExportFileName, $UserProfile, $Language, $Security, $CurrentForm,
			$FormError, $SkipHeaderFooter;

		// Is modal
		$this->IsModal = (Param("modal") == "1");

		// User profile
		$UserProfile = new UserProfile();

		// Security
		if (ValidApiRequest()) { // API request
			$this->setupApiSecurity(); // Set up API Security
			if (!$Security->canEdit()) {
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
			if (!$Security->canEdit()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t004_assetlist.php"));
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
		$this->PeriodBegin->setVisibility();
		$this->PeriodEnd->setVisibility();
		$this->hideFieldsForAddEdit();
		$this->PeriodBegin->Required = FALSE;
		$this->PeriodEnd->Required = FALSE;

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
		$this->setupLookupOptions($this->department_id);
		$this->setupLookupOptions($this->signature_id);
		$this->setupLookupOptions($this->group_id);

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("t004_assetlist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-edit-form ew-horizontal";
		$loaded = FALSE;
		$postBack = FALSE;

		// Set up current action and primary key
		if (IsApi()) {

			// Load key values
			$loaded = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->id->setOldValue($this->id->QueryStringValue);
			} elseif (Key(0) !== NULL) {
				$this->id->setQueryStringValue(Key(0));
				$this->id->setOldValue($this->id->QueryStringValue);
			} elseif (Post("id") !== NULL) {
				$this->id->setFormValue(Post("id"));
				$this->id->setOldValue($this->id->FormValue);
			} elseif (Route(2) !== NULL) {
				$this->id->setQueryStringValue(Route(2));
				$this->id->setOldValue($this->id->QueryStringValue);
			} else {
				$loaded = FALSE; // Unable to load key
			}

			// Load record
			if ($loaded)
				$loaded = $this->loadRow();
			if (!$loaded) {
				$this->setFailureMessage($Language->phrase("NoRecord")); // Set no record message
				$this->terminate();
				return;
			}
			$this->CurrentAction = "update"; // Update record directly
			$postBack = TRUE;
		} else {
			if (Post("action") !== NULL) {
				$this->CurrentAction = Post("action"); // Get action code
				if (!$this->isShow()) // Not reload record, handle as postback
					$postBack = TRUE;

				// Load key from Form
				if ($CurrentForm->hasValue("x_id")) {
					$this->id->setFormValue($CurrentForm->getValue("x_id"));
				}
			} else {
				$this->CurrentAction = "show"; // Default action is display

				// Load key from QueryString / Route
				$loadByQuery = FALSE;
				if (Get("id") !== NULL) {
					$this->id->setQueryStringValue(Get("id"));
					$loadByQuery = TRUE;
				} elseif (Route(2) !== NULL) {
					$this->id->setQueryStringValue(Route(2));
					$loadByQuery = TRUE;
				} else {
					$this->id->CurrentValue = NULL;
				}
			}

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values

			// Set up detail parameters
			$this->setupDetailParms();
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->setFailureMessage($FormError);
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues();
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = ""; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "show": // Get a record to display
				if (!$loaded) { // Load record based on key
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t004_assetlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() != "") // Master/detail edit
					$returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t004_assetlist.php")
					$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
				$this->SendEmail = TRUE; // Send email on update success
				if ($this->editRow()) { // Update record based on key
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("UpdateSuccess")); // Update success
					if (IsApi()) {
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl); // Return to caller
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} elseif ($this->getFailureMessage() == $Language->phrase("NoRecord")) {
					$this->terminate($returnUrl); // Return to caller
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Restore form values if update failed

					// Set up detail parameters
					$this->setupDetailParms();
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render the record
		$this->RowType = ROWTYPE_EDIT; // Render as Edit
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
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

		// Check field name 'department_id' first before field var 'x_department_id'
		$val = $CurrentForm->hasValue("department_id") ? $CurrentForm->getValue("department_id") : $CurrentForm->getValue("x_department_id");
		if (!$this->department_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->department_id->Visible = FALSE; // Disable update for API request
			else
				$this->department_id->setFormValue($val);
		}

		// Check field name 'signature_id' first before field var 'x_signature_id'
		$val = $CurrentForm->hasValue("signature_id") ? $CurrentForm->getValue("signature_id") : $CurrentForm->getValue("x_signature_id");
		if (!$this->signature_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->signature_id->Visible = FALSE; // Disable update for API request
			else
				$this->signature_id->setFormValue($val);
		}

		// Check field name 'Code' first before field var 'x_Code'
		$val = $CurrentForm->hasValue("Code") ? $CurrentForm->getValue("Code") : $CurrentForm->getValue("x_Code");
		if (!$this->Code->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Code->Visible = FALSE; // Disable update for API request
			else
				$this->Code->setFormValue($val);
		}

		// Check field name 'Description' first before field var 'x_Description'
		$val = $CurrentForm->hasValue("Description") ? $CurrentForm->getValue("Description") : $CurrentForm->getValue("x_Description");
		if (!$this->Description->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Description->Visible = FALSE; // Disable update for API request
			else
				$this->Description->setFormValue($val);
		}

		// Check field name 'group_id' first before field var 'x_group_id'
		$val = $CurrentForm->hasValue("group_id") ? $CurrentForm->getValue("group_id") : $CurrentForm->getValue("x_group_id");
		if (!$this->group_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->group_id->Visible = FALSE; // Disable update for API request
			else
				$this->group_id->setFormValue($val);
		}

		// Check field name 'ProcurementDate' first before field var 'x_ProcurementDate'
		$val = $CurrentForm->hasValue("ProcurementDate") ? $CurrentForm->getValue("ProcurementDate") : $CurrentForm->getValue("x_ProcurementDate");
		if (!$this->ProcurementDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcurementDate->Visible = FALSE; // Disable update for API request
			else
				$this->ProcurementDate->setFormValue($val);
			$this->ProcurementDate->CurrentValue = UnFormatDateTime($this->ProcurementDate->CurrentValue, 7);
		}

		// Check field name 'ProcurementCurrentCost' first before field var 'x_ProcurementCurrentCost'
		$val = $CurrentForm->hasValue("ProcurementCurrentCost") ? $CurrentForm->getValue("ProcurementCurrentCost") : $CurrentForm->getValue("x_ProcurementCurrentCost");
		if (!$this->ProcurementCurrentCost->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ProcurementCurrentCost->Visible = FALSE; // Disable update for API request
			else
				$this->ProcurementCurrentCost->setFormValue($val);
		}

		// Check field name 'Salvage' first before field var 'x_Salvage'
		$val = $CurrentForm->hasValue("Salvage") ? $CurrentForm->getValue("Salvage") : $CurrentForm->getValue("x_Salvage");
		if (!$this->Salvage->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Salvage->Visible = FALSE; // Disable update for API request
			else
				$this->Salvage->setFormValue($val);
		}

		// Check field name 'Qty' first before field var 'x_Qty'
		$val = $CurrentForm->hasValue("Qty") ? $CurrentForm->getValue("Qty") : $CurrentForm->getValue("x_Qty");
		if (!$this->Qty->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Qty->Visible = FALSE; // Disable update for API request
			else
				$this->Qty->setFormValue($val);
		}

		// Check field name 'Remarks' first before field var 'x_Remarks'
		$val = $CurrentForm->hasValue("Remarks") ? $CurrentForm->getValue("Remarks") : $CurrentForm->getValue("x_Remarks");
		if (!$this->Remarks->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Remarks->Visible = FALSE; // Disable update for API request
			else
				$this->Remarks->setFormValue($val);
		}

		// Check field name 'PeriodBegin' first before field var 'x_PeriodBegin'
		$val = $CurrentForm->hasValue("PeriodBegin") ? $CurrentForm->getValue("PeriodBegin") : $CurrentForm->getValue("x_PeriodBegin");
		if (!$this->PeriodBegin->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PeriodBegin->Visible = FALSE; // Disable update for API request
			else
				$this->PeriodBegin->setFormValue($val);
			$this->PeriodBegin->CurrentValue = UnFormatDateTime($this->PeriodBegin->CurrentValue, 7);
		}

		// Check field name 'PeriodEnd' first before field var 'x_PeriodEnd'
		$val = $CurrentForm->hasValue("PeriodEnd") ? $CurrentForm->getValue("PeriodEnd") : $CurrentForm->getValue("x_PeriodEnd");
		if (!$this->PeriodEnd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->PeriodEnd->Visible = FALSE; // Disable update for API request
			else
				$this->PeriodEnd->setFormValue($val);
			$this->PeriodEnd->CurrentValue = UnFormatDateTime($this->PeriodEnd->CurrentValue, 7);
		}

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
		if (!$this->id->IsDetailKey)
			$this->id->setFormValue($val);
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
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
		$this->PeriodBegin->CurrentValue = $this->PeriodBegin->FormValue;
		$this->PeriodBegin->CurrentValue = UnFormatDateTime($this->PeriodBegin->CurrentValue, 7);
		$this->PeriodEnd->CurrentValue = $this->PeriodEnd->FormValue;
		$this->PeriodEnd->CurrentValue = UnFormatDateTime($this->PeriodEnd->CurrentValue, 7);
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
		$this->PeriodBegin->setDbValue($row['PeriodBegin']);
		$this->PeriodEnd->setDbValue($row['PeriodEnd']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['property_id'] = NULL;
		$row['department_id'] = NULL;
		$row['signature_id'] = NULL;
		$row['Code'] = NULL;
		$row['Description'] = NULL;
		$row['group_id'] = NULL;
		$row['ProcurementDate'] = NULL;
		$row['ProcurementCurrentCost'] = NULL;
		$row['Salvage'] = NULL;
		$row['Qty'] = NULL;
		$row['Remarks'] = NULL;
		$row['PeriodBegin'] = NULL;
		$row['PeriodEnd'] = NULL;
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
		// PeriodBegin
		// PeriodEnd

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

			// PeriodBegin
			$this->PeriodBegin->ViewValue = $this->PeriodBegin->CurrentValue;
			$this->PeriodBegin->ViewValue = FormatDateTime($this->PeriodBegin->ViewValue, 7);
			$this->PeriodBegin->ViewCustomAttributes = "";

			// PeriodEnd
			$this->PeriodEnd->ViewValue = $this->PeriodEnd->CurrentValue;
			$this->PeriodEnd->ViewValue = FormatDateTime($this->PeriodEnd->ViewValue, 7);
			$this->PeriodEnd->ViewCustomAttributes = "";

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

			// PeriodBegin
			$this->PeriodBegin->LinkCustomAttributes = "";
			$this->PeriodBegin->HrefValue = "";
			$this->PeriodBegin->TooltipValue = "";

			// PeriodEnd
			$this->PeriodEnd->LinkCustomAttributes = "";
			$this->PeriodEnd->HrefValue = "";
			$this->PeriodEnd->TooltipValue = "";
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
			if (strval($this->ProcurementCurrentCost->EditValue) != "" && is_numeric($this->ProcurementCurrentCost->EditValue))
				$this->ProcurementCurrentCost->EditValue = FormatNumber($this->ProcurementCurrentCost->EditValue, -2, -2, -2, -2);
			

			// Salvage
			$this->Salvage->EditAttrs["class"] = "form-control";
			$this->Salvage->EditCustomAttributes = "";
			$this->Salvage->EditValue = HtmlEncode($this->Salvage->CurrentValue);
			$this->Salvage->PlaceHolder = RemoveHtml($this->Salvage->caption());
			if (strval($this->Salvage->EditValue) != "" && is_numeric($this->Salvage->EditValue))
				$this->Salvage->EditValue = FormatNumber($this->Salvage->EditValue, -2, -2, -2, -2);
			

			// Qty
			$this->Qty->EditAttrs["class"] = "form-control";
			$this->Qty->EditCustomAttributes = "";
			$this->Qty->EditValue = HtmlEncode($this->Qty->CurrentValue);
			$this->Qty->PlaceHolder = RemoveHtml($this->Qty->caption());
			if (strval($this->Qty->EditValue) != "" && is_numeric($this->Qty->EditValue))
				$this->Qty->EditValue = FormatNumber($this->Qty->EditValue, -2, -2, -2, -2);
			

			// Remarks
			$this->Remarks->EditAttrs["class"] = "form-control";
			$this->Remarks->EditCustomAttributes = "";
			$this->Remarks->EditValue = HtmlEncode($this->Remarks->CurrentValue);
			$this->Remarks->PlaceHolder = RemoveHtml($this->Remarks->caption());

			// PeriodBegin
			$this->PeriodBegin->EditAttrs["class"] = "form-control";
			$this->PeriodBegin->EditCustomAttributes = "";
			$this->PeriodBegin->EditValue = $this->PeriodBegin->CurrentValue;
			$this->PeriodBegin->EditValue = FormatDateTime($this->PeriodBegin->EditValue, 7);
			$this->PeriodBegin->ViewCustomAttributes = "";

			// PeriodEnd
			$this->PeriodEnd->EditAttrs["class"] = "form-control";
			$this->PeriodEnd->EditCustomAttributes = "";
			$this->PeriodEnd->EditValue = $this->PeriodEnd->CurrentValue;
			$this->PeriodEnd->EditValue = FormatDateTime($this->PeriodEnd->EditValue, 7);
			$this->PeriodEnd->ViewCustomAttributes = "";

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

			// PeriodBegin
			$this->PeriodBegin->LinkCustomAttributes = "";
			$this->PeriodBegin->HrefValue = "";
			$this->PeriodBegin->TooltipValue = "";

			// PeriodEnd
			$this->PeriodEnd->LinkCustomAttributes = "";
			$this->PeriodEnd->HrefValue = "";
			$this->PeriodEnd->TooltipValue = "";
		}
		if ($this->RowType == ROWTYPE_ADD || $this->RowType == ROWTYPE_EDIT || $this->RowType == ROWTYPE_SEARCH) // Add/Edit/Search row
			$this->setupFieldTitles();

		// Call Row Rendered event
		if ($this->RowType != ROWTYPE_AGGREGATEINIT)
			$this->Row_Rendered();
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
		if ($this->PeriodBegin->Required) {
			if (!$this->PeriodBegin->IsDetailKey && $this->PeriodBegin->FormValue != NULL && $this->PeriodBegin->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PeriodBegin->caption(), $this->PeriodBegin->RequiredErrorMessage));
			}
		}
		if ($this->PeriodEnd->Required) {
			if (!$this->PeriodEnd->IsDetailKey && $this->PeriodEnd->FormValue != NULL && $this->PeriodEnd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->PeriodEnd->caption(), $this->PeriodEnd->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("t006_assetdepreciation", $detailTblVar) && $GLOBALS["t006_assetdepreciation"]->DetailEdit) {
			if (!isset($GLOBALS["t006_assetdepreciation_grid"]))
				$GLOBALS["t006_assetdepreciation_grid"] = new t006_assetdepreciation_grid(); // Get detail page object
			$GLOBALS["t006_assetdepreciation_grid"]->validateGridForm();
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

			// Begin transaction
			if ($this->getCurrentDetailTable() != "")
				$conn->beginTrans();

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

				// Update detail records
				$detailTblVar = explode(",", $this->getCurrentDetailTable());
				if ($editRow) {
					if (in_array("t006_assetdepreciation", $detailTblVar) && $GLOBALS["t006_assetdepreciation"]->DetailEdit) {
						if (!isset($GLOBALS["t006_assetdepreciation_grid"]))
							$GLOBALS["t006_assetdepreciation_grid"] = new t006_assetdepreciation_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "t006_assetdepreciation"); // Load user level of detail table
						$editRow = $GLOBALS["t006_assetdepreciation_grid"]->gridUpdate();
						$Security->loadCurrentUserLevel($this->ProjectID . $this->TableName); // Restore user level of master table
					}
				}

				// Commit/Rollback transaction
				if ($this->getCurrentDetailTable() != "") {
					if ($editRow) {
						$conn->commitTrans(); // Commit transaction
					} else {
						$conn->rollbackTrans(); // Rollback transaction
					}
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

	// Set up detail parms based on QueryString
	protected function setupDetailParms()
	{

		// Get the keys for master table
		$detailTblVar = Get(Config("TABLE_SHOW_DETAIL"));
		if ($detailTblVar !== NULL) {
			$this->setCurrentDetailTable($detailTblVar);
		} else {
			$detailTblVar = $this->getCurrentDetailTable();
		}
		if ($detailTblVar != "") {
			$detailTblVar = explode(",", $detailTblVar);
			if (in_array("t006_assetdepreciation", $detailTblVar)) {
				if (!isset($GLOBALS["t006_assetdepreciation_grid"]))
					$GLOBALS["t006_assetdepreciation_grid"] = new t006_assetdepreciation_grid();
				if ($GLOBALS["t006_assetdepreciation_grid"]->DetailEdit) {
					$GLOBALS["t006_assetdepreciation_grid"]->CurrentMode = "edit";
					$GLOBALS["t006_assetdepreciation_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["t006_assetdepreciation_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["t006_assetdepreciation_grid"]->setStartRecordNumber(1);
					$GLOBALS["t006_assetdepreciation_grid"]->asset_id->IsDetailKey = TRUE;
					$GLOBALS["t006_assetdepreciation_grid"]->asset_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["t006_assetdepreciation_grid"]->asset_id->setSessionValue($GLOBALS["t006_assetdepreciation_grid"]->asset_id->CurrentValue);
				}
			}
		}
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t004_assetlist.php"), "", $this->TableVar, TRUE);
		$pageId = "edit";
		$Breadcrumb->add("edit", $pageId, $url);
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
} // End class
?>