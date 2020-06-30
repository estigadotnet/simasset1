<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class t101_ho_head_edit extends t101_ho_head
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 't101_ho_head';

	// Page object name
	public $PageObjName = "t101_ho_head_edit";

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
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

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

		// Check permission
		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("t101_ho_headlist.php");
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
					$this->terminate("t101_ho_headlist.php"); // No matching record, return to list
				}

				// Set up detail parameters
				$this->setupDetailParms();
				break;
			case "update": // Update
				if ($this->getCurrentDetailTable() != "") // Master/detail edit
					$returnUrl = $this->getViewUrl(Config("TABLE_SHOW_DETAIL") . "=" . $this->getCurrentDetailTable()); // Master/Detail view page
				else
					$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t101_ho_headlist.php")
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

		// Check field name 'TransactionNo' first before field var 'x_TransactionNo'
		$val = $CurrentForm->hasValue("TransactionNo") ? $CurrentForm->getValue("TransactionNo") : $CurrentForm->getValue("x_TransactionNo");
		if (!$this->TransactionNo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TransactionNo->Visible = FALSE; // Disable update for API request
			else
				$this->TransactionNo->setFormValue($val);
		}

		// Check field name 'TransactionDate' first before field var 'x_TransactionDate'
		$val = $CurrentForm->hasValue("TransactionDate") ? $CurrentForm->getValue("TransactionDate") : $CurrentForm->getValue("x_TransactionDate");
		if (!$this->TransactionDate->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->TransactionDate->Visible = FALSE; // Disable update for API request
			else
				$this->TransactionDate->setFormValue($val);
			$this->TransactionDate->CurrentValue = UnFormatDateTime($this->TransactionDate->CurrentValue, 7);
		}

		// Check field name 'HandedOverTo' first before field var 'x_HandedOverTo'
		$val = $CurrentForm->hasValue("HandedOverTo") ? $CurrentForm->getValue("HandedOverTo") : $CurrentForm->getValue("x_HandedOverTo");
		if (!$this->HandedOverTo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HandedOverTo->Visible = FALSE; // Disable update for API request
			else
				$this->HandedOverTo->setFormValue($val);
		}

		// Check field name 'DepartmentTo' first before field var 'x_DepartmentTo'
		$val = $CurrentForm->hasValue("DepartmentTo") ? $CurrentForm->getValue("DepartmentTo") : $CurrentForm->getValue("x_DepartmentTo");
		if (!$this->DepartmentTo->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DepartmentTo->Visible = FALSE; // Disable update for API request
			else
				$this->DepartmentTo->setFormValue($val);
		}

		// Check field name 'HandedOverBy' first before field var 'x_HandedOverBy'
		$val = $CurrentForm->hasValue("HandedOverBy") ? $CurrentForm->getValue("HandedOverBy") : $CurrentForm->getValue("x_HandedOverBy");
		if (!$this->HandedOverBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->HandedOverBy->Visible = FALSE; // Disable update for API request
			else
				$this->HandedOverBy->setFormValue($val);
		}

		// Check field name 'DepartmentBy' first before field var 'x_DepartmentBy'
		$val = $CurrentForm->hasValue("DepartmentBy") ? $CurrentForm->getValue("DepartmentBy") : $CurrentForm->getValue("x_DepartmentBy");
		if (!$this->DepartmentBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DepartmentBy->Visible = FALSE; // Disable update for API request
			else
				$this->DepartmentBy->setFormValue($val);
		}

		// Check field name 'Sign1' first before field var 'x_Sign1'
		$val = $CurrentForm->hasValue("Sign1") ? $CurrentForm->getValue("Sign1") : $CurrentForm->getValue("x_Sign1");
		if (!$this->Sign1->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sign1->Visible = FALSE; // Disable update for API request
			else
				$this->Sign1->setFormValue($val);
		}

		// Check field name 'Sign2' first before field var 'x_Sign2'
		$val = $CurrentForm->hasValue("Sign2") ? $CurrentForm->getValue("Sign2") : $CurrentForm->getValue("x_Sign2");
		if (!$this->Sign2->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sign2->Visible = FALSE; // Disable update for API request
			else
				$this->Sign2->setFormValue($val);
		}

		// Check field name 'Sign3' first before field var 'x_Sign3'
		$val = $CurrentForm->hasValue("Sign3") ? $CurrentForm->getValue("Sign3") : $CurrentForm->getValue("x_Sign3");
		if (!$this->Sign3->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sign3->Visible = FALSE; // Disable update for API request
			else
				$this->Sign3->setFormValue($val);
		}

		// Check field name 'Sign4' first before field var 'x_Sign4'
		$val = $CurrentForm->hasValue("Sign4") ? $CurrentForm->getValue("Sign4") : $CurrentForm->getValue("x_Sign4");
		if (!$this->Sign4->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->Sign4->Visible = FALSE; // Disable update for API request
			else
				$this->Sign4->setFormValue($val);
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
		$this->TransactionNo->CurrentValue = $this->TransactionNo->FormValue;
		$this->TransactionDate->CurrentValue = $this->TransactionDate->FormValue;
		$this->TransactionDate->CurrentValue = UnFormatDateTime($this->TransactionDate->CurrentValue, 7);
		$this->HandedOverTo->CurrentValue = $this->HandedOverTo->FormValue;
		$this->DepartmentTo->CurrentValue = $this->DepartmentTo->FormValue;
		$this->HandedOverBy->CurrentValue = $this->HandedOverBy->FormValue;
		$this->DepartmentBy->CurrentValue = $this->DepartmentBy->FormValue;
		$this->Sign1->CurrentValue = $this->Sign1->FormValue;
		$this->Sign2->CurrentValue = $this->Sign2->FormValue;
		$this->Sign3->CurrentValue = $this->Sign3->FormValue;
		$this->Sign4->CurrentValue = $this->Sign4->FormValue;
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
		$this->HandedOverTo->setDbValue($row['HandedOverTo']);
		$this->DepartmentTo->setDbValue($row['DepartmentTo']);
		$this->HandedOverBy->setDbValue($row['HandedOverBy']);
		if (array_key_exists('EV__HandedOverBy', $rs->fields)) {
			$this->HandedOverBy->VirtualValue = $rs->fields('EV__HandedOverBy'); // Set up virtual field value
		} else {
			$this->HandedOverBy->VirtualValue = ""; // Clear value
		}
		$this->DepartmentBy->setDbValue($row['DepartmentBy']);
		$this->Sign1->setDbValue($row['Sign1']);
		$this->Sign2->setDbValue($row['Sign2']);
		$this->Sign3->setDbValue($row['Sign3']);
		$this->Sign4->setDbValue($row['Sign4']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['property_id'] = NULL;
		$row['TransactionNo'] = NULL;
		$row['TransactionDate'] = NULL;
		$row['HandedOverTo'] = NULL;
		$row['DepartmentTo'] = NULL;
		$row['HandedOverBy'] = NULL;
		$row['DepartmentBy'] = NULL;
		$row['Sign1'] = NULL;
		$row['Sign2'] = NULL;
		$row['Sign3'] = NULL;
		$row['Sign4'] = NULL;
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

			// TransactionNo
			$this->TransactionNo->EditAttrs["class"] = "form-control";
			$this->TransactionNo->EditCustomAttributes = "";
			if (!$this->TransactionNo->Raw)
				$this->TransactionNo->CurrentValue = HtmlDecode($this->TransactionNo->CurrentValue);
			$this->TransactionNo->EditValue = HtmlEncode($this->TransactionNo->CurrentValue);
			$this->TransactionNo->PlaceHolder = RemoveHtml($this->TransactionNo->caption());

			// TransactionDate
			$this->TransactionDate->EditAttrs["class"] = "form-control";
			$this->TransactionDate->EditCustomAttributes = "";
			$this->TransactionDate->EditValue = HtmlEncode(FormatDateTime($this->TransactionDate->CurrentValue, 7));
			$this->TransactionDate->PlaceHolder = RemoveHtml($this->TransactionDate->caption());

			// HandedOverTo
			$this->HandedOverTo->EditCustomAttributes = "";
			$curVal = trim(strval($this->HandedOverTo->CurrentValue));
			if ($curVal != "")
				$this->HandedOverTo->ViewValue = $this->HandedOverTo->lookupCacheOption($curVal);
			else
				$this->HandedOverTo->ViewValue = $this->HandedOverTo->Lookup !== NULL && is_array($this->HandedOverTo->Lookup->Options) ? $curVal : NULL;
			if ($this->HandedOverTo->ViewValue !== NULL) { // Load from cache
				$this->HandedOverTo->EditValue = array_values($this->HandedOverTo->Lookup->Options);
				if ($this->HandedOverTo->ViewValue == "")
					$this->HandedOverTo->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HandedOverTo->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HandedOverTo->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->HandedOverTo->ViewValue = $this->HandedOverTo->displayValue($arwrk);
				} else {
					$this->HandedOverTo->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->HandedOverTo->EditValue = $arwrk;
			}

			// DepartmentTo
			$this->DepartmentTo->EditCustomAttributes = "";
			$curVal = trim(strval($this->DepartmentTo->CurrentValue));
			if ($curVal != "")
				$this->DepartmentTo->ViewValue = $this->DepartmentTo->lookupCacheOption($curVal);
			else
				$this->DepartmentTo->ViewValue = $this->DepartmentTo->Lookup !== NULL && is_array($this->DepartmentTo->Lookup->Options) ? $curVal : NULL;
			if ($this->DepartmentTo->ViewValue !== NULL) { // Load from cache
				$this->DepartmentTo->EditValue = array_values($this->DepartmentTo->Lookup->Options);
				if ($this->DepartmentTo->ViewValue == "")
					$this->DepartmentTo->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->DepartmentTo->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->DepartmentTo->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DepartmentTo->ViewValue = $this->DepartmentTo->displayValue($arwrk);
				} else {
					$this->DepartmentTo->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->DepartmentTo->EditValue = $arwrk;
			}

			// HandedOverBy
			$this->HandedOverBy->EditCustomAttributes = "";
			$curVal = trim(strval($this->HandedOverBy->CurrentValue));
			if ($curVal != "")
				$this->HandedOverBy->ViewValue = $this->HandedOverBy->lookupCacheOption($curVal);
			else
				$this->HandedOverBy->ViewValue = $this->HandedOverBy->Lookup !== NULL && is_array($this->HandedOverBy->Lookup->Options) ? $curVal : NULL;
			if ($this->HandedOverBy->ViewValue !== NULL) { // Load from cache
				$this->HandedOverBy->EditValue = array_values($this->HandedOverBy->Lookup->Options);
				if ($this->HandedOverBy->ViewValue == "")
					$this->HandedOverBy->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->HandedOverBy->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->HandedOverBy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->HandedOverBy->ViewValue = $this->HandedOverBy->displayValue($arwrk);
				} else {
					$this->HandedOverBy->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->HandedOverBy->EditValue = $arwrk;
			}

			// DepartmentBy
			$this->DepartmentBy->EditCustomAttributes = "";
			$curVal = trim(strval($this->DepartmentBy->CurrentValue));
			if ($curVal != "")
				$this->DepartmentBy->ViewValue = $this->DepartmentBy->lookupCacheOption($curVal);
			else
				$this->DepartmentBy->ViewValue = $this->DepartmentBy->Lookup !== NULL && is_array($this->DepartmentBy->Lookup->Options) ? $curVal : NULL;
			if ($this->DepartmentBy->ViewValue !== NULL) { // Load from cache
				$this->DepartmentBy->EditValue = array_values($this->DepartmentBy->Lookup->Options);
				if ($this->DepartmentBy->ViewValue == "")
					$this->DepartmentBy->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->DepartmentBy->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->DepartmentBy->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->DepartmentBy->ViewValue = $this->DepartmentBy->displayValue($arwrk);
				} else {
					$this->DepartmentBy->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->DepartmentBy->EditValue = $arwrk;
			}

			// Sign1
			$this->Sign1->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign1->CurrentValue));
			if ($curVal != "")
				$this->Sign1->ViewValue = $this->Sign1->lookupCacheOption($curVal);
			else
				$this->Sign1->ViewValue = $this->Sign1->Lookup !== NULL && is_array($this->Sign1->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign1->ViewValue !== NULL) { // Load from cache
				$this->Sign1->EditValue = array_values($this->Sign1->Lookup->Options);
				if ($this->Sign1->ViewValue == "")
					$this->Sign1->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign1->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign1->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign1->ViewValue = $this->Sign1->displayValue($arwrk);
				} else {
					$this->Sign1->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign1->EditValue = $arwrk;
			}

			// Sign2
			$this->Sign2->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign2->CurrentValue));
			if ($curVal != "")
				$this->Sign2->ViewValue = $this->Sign2->lookupCacheOption($curVal);
			else
				$this->Sign2->ViewValue = $this->Sign2->Lookup !== NULL && is_array($this->Sign2->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign2->ViewValue !== NULL) { // Load from cache
				$this->Sign2->EditValue = array_values($this->Sign2->Lookup->Options);
				if ($this->Sign2->ViewValue == "")
					$this->Sign2->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign2->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign2->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign2->ViewValue = $this->Sign2->displayValue($arwrk);
				} else {
					$this->Sign2->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign2->EditValue = $arwrk;
			}

			// Sign3
			$this->Sign3->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign3->CurrentValue));
			if ($curVal != "")
				$this->Sign3->ViewValue = $this->Sign3->lookupCacheOption($curVal);
			else
				$this->Sign3->ViewValue = $this->Sign3->Lookup !== NULL && is_array($this->Sign3->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign3->ViewValue !== NULL) { // Load from cache
				$this->Sign3->EditValue = array_values($this->Sign3->Lookup->Options);
				if ($this->Sign3->ViewValue == "")
					$this->Sign3->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign3->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign3->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign3->ViewValue = $this->Sign3->displayValue($arwrk);
				} else {
					$this->Sign3->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign3->EditValue = $arwrk;
			}

			// Sign4
			$this->Sign4->EditCustomAttributes = "";
			$curVal = trim(strval($this->Sign4->CurrentValue));
			if ($curVal != "")
				$this->Sign4->ViewValue = $this->Sign4->lookupCacheOption($curVal);
			else
				$this->Sign4->ViewValue = $this->Sign4->Lookup !== NULL && is_array($this->Sign4->Lookup->Options) ? $curVal : NULL;
			if ($this->Sign4->ViewValue !== NULL) { // Load from cache
				$this->Sign4->EditValue = array_values($this->Sign4->Lookup->Options);
				if ($this->Sign4->ViewValue == "")
					$this->Sign4->ViewValue = $Language->phrase("PleaseSelect");
			} else { // Lookup from database
				if ($curVal == "") {
					$filterWrk = "0=1";
				} else {
					$filterWrk = "`id`" . SearchString("=", $this->Sign4->CurrentValue, DATATYPE_NUMBER, "");
				}
				$sqlWrk = $this->Sign4->Lookup->getSql(TRUE, $filterWrk, '', $this);
				$rswrk = Conn()->execute($sqlWrk);
				if ($rswrk && !$rswrk->EOF) { // Lookup values found
					$arwrk = [];
					$arwrk[1] = HtmlEncode($rswrk->fields('df'));
					$this->Sign4->ViewValue = $this->Sign4->displayValue($arwrk);
				} else {
					$this->Sign4->ViewValue = $Language->phrase("PleaseSelect");
				}
				$arwrk = $rswrk ? $rswrk->getRows() : [];
				if ($rswrk)
					$rswrk->close();
				$this->Sign4->EditValue = $arwrk;
			}

			// Edit refer script
			// property_id

			$this->property_id->LinkCustomAttributes = "";
			$this->property_id->HrefValue = "";

			// TransactionNo
			$this->TransactionNo->LinkCustomAttributes = "";
			$this->TransactionNo->HrefValue = "";

			// TransactionDate
			$this->TransactionDate->LinkCustomAttributes = "";
			$this->TransactionDate->HrefValue = "";

			// HandedOverTo
			$this->HandedOverTo->LinkCustomAttributes = "";
			$this->HandedOverTo->HrefValue = "";

			// DepartmentTo
			$this->DepartmentTo->LinkCustomAttributes = "";
			$this->DepartmentTo->HrefValue = "";

			// HandedOverBy
			$this->HandedOverBy->LinkCustomAttributes = "";
			$this->HandedOverBy->HrefValue = "";

			// DepartmentBy
			$this->DepartmentBy->LinkCustomAttributes = "";
			$this->DepartmentBy->HrefValue = "";

			// Sign1
			$this->Sign1->LinkCustomAttributes = "";
			$this->Sign1->HrefValue = "";

			// Sign2
			$this->Sign2->LinkCustomAttributes = "";
			$this->Sign2->HrefValue = "";

			// Sign3
			$this->Sign3->LinkCustomAttributes = "";
			$this->Sign3->HrefValue = "";

			// Sign4
			$this->Sign4->LinkCustomAttributes = "";
			$this->Sign4->HrefValue = "";
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
		if ($this->TransactionNo->Required) {
			if (!$this->TransactionNo->IsDetailKey && $this->TransactionNo->FormValue != NULL && $this->TransactionNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransactionNo->caption(), $this->TransactionNo->RequiredErrorMessage));
			}
		}
		if ($this->TransactionDate->Required) {
			if (!$this->TransactionDate->IsDetailKey && $this->TransactionDate->FormValue != NULL && $this->TransactionDate->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransactionDate->caption(), $this->TransactionDate->RequiredErrorMessage));
			}
		}
		if (!CheckEuroDate($this->TransactionDate->FormValue)) {
			AddMessage($FormError, $this->TransactionDate->errorMessage());
		}
		if ($this->HandedOverTo->Required) {
			if (!$this->HandedOverTo->IsDetailKey && $this->HandedOverTo->FormValue != NULL && $this->HandedOverTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HandedOverTo->caption(), $this->HandedOverTo->RequiredErrorMessage));
			}
		}
		if ($this->DepartmentTo->Required) {
			if (!$this->DepartmentTo->IsDetailKey && $this->DepartmentTo->FormValue != NULL && $this->DepartmentTo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DepartmentTo->caption(), $this->DepartmentTo->RequiredErrorMessage));
			}
		}
		if ($this->HandedOverBy->Required) {
			if (!$this->HandedOverBy->IsDetailKey && $this->HandedOverBy->FormValue != NULL && $this->HandedOverBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->HandedOverBy->caption(), $this->HandedOverBy->RequiredErrorMessage));
			}
		}
		if ($this->DepartmentBy->Required) {
			if (!$this->DepartmentBy->IsDetailKey && $this->DepartmentBy->FormValue != NULL && $this->DepartmentBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DepartmentBy->caption(), $this->DepartmentBy->RequiredErrorMessage));
			}
		}
		if ($this->Sign1->Required) {
			if (!$this->Sign1->IsDetailKey && $this->Sign1->FormValue != NULL && $this->Sign1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sign1->caption(), $this->Sign1->RequiredErrorMessage));
			}
		}
		if ($this->Sign2->Required) {
			if (!$this->Sign2->IsDetailKey && $this->Sign2->FormValue != NULL && $this->Sign2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sign2->caption(), $this->Sign2->RequiredErrorMessage));
			}
		}
		if ($this->Sign3->Required) {
			if (!$this->Sign3->IsDetailKey && $this->Sign3->FormValue != NULL && $this->Sign3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sign3->caption(), $this->Sign3->RequiredErrorMessage));
			}
		}
		if ($this->Sign4->Required) {
			if (!$this->Sign4->IsDetailKey && $this->Sign4->FormValue != NULL && $this->Sign4->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sign4->caption(), $this->Sign4->RequiredErrorMessage));
			}
		}

		// Validate detail grid
		$detailTblVar = explode(",", $this->getCurrentDetailTable());
		if (in_array("t102_ho_detail", $detailTblVar) && $GLOBALS["t102_ho_detail"]->DetailEdit) {
			if (!isset($GLOBALS["t102_ho_detail_grid"]))
				$GLOBALS["t102_ho_detail_grid"] = new t102_ho_detail_grid(); // Get detail page object
			$GLOBALS["t102_ho_detail_grid"]->validateGridForm();
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

			// TransactionNo
			$this->TransactionNo->setDbValueDef($rsnew, $this->TransactionNo->CurrentValue, "", $this->TransactionNo->ReadOnly);

			// TransactionDate
			$this->TransactionDate->setDbValueDef($rsnew, UnFormatDateTime($this->TransactionDate->CurrentValue, 7), CurrentDate(), $this->TransactionDate->ReadOnly);

			// HandedOverTo
			$this->HandedOverTo->setDbValueDef($rsnew, $this->HandedOverTo->CurrentValue, 0, $this->HandedOverTo->ReadOnly);

			// DepartmentTo
			$this->DepartmentTo->setDbValueDef($rsnew, $this->DepartmentTo->CurrentValue, 0, $this->DepartmentTo->ReadOnly);

			// HandedOverBy
			$this->HandedOverBy->setDbValueDef($rsnew, $this->HandedOverBy->CurrentValue, 0, $this->HandedOverBy->ReadOnly);

			// DepartmentBy
			$this->DepartmentBy->setDbValueDef($rsnew, $this->DepartmentBy->CurrentValue, 0, $this->DepartmentBy->ReadOnly);

			// Sign1
			$this->Sign1->setDbValueDef($rsnew, $this->Sign1->CurrentValue, 0, $this->Sign1->ReadOnly);

			// Sign2
			$this->Sign2->setDbValueDef($rsnew, $this->Sign2->CurrentValue, 0, $this->Sign2->ReadOnly);

			// Sign3
			$this->Sign3->setDbValueDef($rsnew, $this->Sign3->CurrentValue, 0, $this->Sign3->ReadOnly);

			// Sign4
			$this->Sign4->setDbValueDef($rsnew, $this->Sign4->CurrentValue, 0, $this->Sign4->ReadOnly);

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
					if (in_array("t102_ho_detail", $detailTblVar) && $GLOBALS["t102_ho_detail"]->DetailEdit) {
						if (!isset($GLOBALS["t102_ho_detail_grid"]))
							$GLOBALS["t102_ho_detail_grid"] = new t102_ho_detail_grid(); // Get detail page object
						$Security->loadCurrentUserLevel($this->ProjectID . "t102_ho_detail"); // Load user level of detail table
						$editRow = $GLOBALS["t102_ho_detail_grid"]->gridUpdate();
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
			if (in_array("t102_ho_detail", $detailTblVar)) {
				if (!isset($GLOBALS["t102_ho_detail_grid"]))
					$GLOBALS["t102_ho_detail_grid"] = new t102_ho_detail_grid();
				if ($GLOBALS["t102_ho_detail_grid"]->DetailEdit) {
					$GLOBALS["t102_ho_detail_grid"]->CurrentMode = "edit";
					$GLOBALS["t102_ho_detail_grid"]->CurrentAction = "gridedit";

					// Save current master table to detail table
					$GLOBALS["t102_ho_detail_grid"]->setCurrentMasterTable($this->TableVar);
					$GLOBALS["t102_ho_detail_grid"]->setStartRecordNumber(1);
					$GLOBALS["t102_ho_detail_grid"]->hohead_id->IsDetailKey = TRUE;
					$GLOBALS["t102_ho_detail_grid"]->hohead_id->CurrentValue = $this->id->CurrentValue;
					$GLOBALS["t102_ho_detail_grid"]->hohead_id->setSessionValue($GLOBALS["t102_ho_detail_grid"]->hohead_id->CurrentValue);
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
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t101_ho_headlist.php"), "", $this->TableVar, TRUE);
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