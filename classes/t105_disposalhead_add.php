<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class t105_disposalhead_add extends t105_disposalhead
{

	// Page ID
	public $PageID = "add";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 't105_disposalhead';

	// Page object name
	public $PageObjName = "t105_disposalhead_add";

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

		// Table object (t105_disposalhead)
		if (!isset($GLOBALS["t105_disposalhead"]) || get_class($GLOBALS["t105_disposalhead"]) == PROJECT_NAMESPACE . "t105_disposalhead") {
			$GLOBALS["t105_disposalhead"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t105_disposalhead"];
		}

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'add');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't105_disposalhead');

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
		global $t105_disposalhead;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t105_disposalhead);
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
					if ($pageName == "t105_disposalheadview.php")
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
	public $FormClassName = "ew-horizontal ew-form ew-add-form";
	public $IsModal = FALSE;
	public $IsMobileOrModal = FALSE;
	public $DbMasterFilter = "";
	public $DbDetailFilter = "";
	public $StartRecord;
	public $Priv = 0;
	public $OldRecordset;
	public $CopyRecord;

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
			if (!$Security->canAdd()) {
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
			if (!$Security->canAdd()) {
				$Security->saveLastUrl();
				$this->setFailureMessage(DeniedMessage()); // Set no permission
				if ($Security->canList())
					$this->terminate(GetUrl("t105_disposalheadlist.php"));
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
		$this->RecommendedBy->setVisibility();
		$this->CE->setVisibility();
		$this->ITM->setVisibility();
		$this->Sign1->setVisibility();
		$this->Sign2->setVisibility();
		$this->Sign3->setVisibility();
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
		// Check permission

		if (!$Security->canAdd()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("t105_disposalheadlist.php");
			return;
		}

		// Check modal
		if ($this->IsModal)
			$SkipHeaderFooter = TRUE;
		$this->IsMobileOrModal = IsMobile() || $this->IsModal;
		$this->FormClassName = "ew-form ew-add-form ew-horizontal";
		$postBack = FALSE;

		// Set up current action
		if (IsApi()) {
			$this->CurrentAction = "insert"; // Add record directly
			$postBack = TRUE;
		} elseif (Post("action") !== NULL) {
			$this->CurrentAction = Post("action"); // Get form action
			$postBack = TRUE;
		} else { // Not post back

			// Load key values from QueryString
			$this->CopyRecord = TRUE;
			if (Get("id") !== NULL) {
				$this->id->setQueryStringValue(Get("id"));
				$this->setKey("id", $this->id->CurrentValue); // Set up key
			} else {
				$this->setKey("id", ""); // Clear key
				$this->CopyRecord = FALSE;
			}
			if ($this->CopyRecord) {
				$this->CurrentAction = "copy"; // Copy record
			} else {
				$this->CurrentAction = "show"; // Display blank record
			}
		}

		// Load old record / default values
		$loaded = $this->loadOldRecord();

		// Load form values
		if ($postBack) {
			$this->loadFormValues(); // Load form values
		}

		// Validate form if post back
		if ($postBack) {
			if (!$this->validateForm()) {
				$this->EventCancelled = TRUE; // Event cancelled
				$this->restoreFormValues(); // Restore form values
				$this->setFailureMessage($FormError);
				if (IsApi()) {
					$this->terminate();
					return;
				} else {
					$this->CurrentAction = "show"; // Form error, reset action
				}
			}
		}

		// Perform current action
		switch ($this->CurrentAction) {
			case "copy": // Copy an existing record
				if (!$loaded) { // Record not loaded
					if ($this->getFailureMessage() == "")
						$this->setFailureMessage($Language->phrase("NoRecord")); // No record found
					$this->terminate("t105_disposalheadlist.php"); // No matching record, return to list
				}
				break;
			case "insert": // Add new record
				$this->SendEmail = TRUE; // Send email on add success
				if ($this->addRow($this->OldRecordset)) { // Add successful
					if ($this->getSuccessMessage() == "")
						$this->setSuccessMessage($Language->phrase("AddSuccess")); // Set up success message
					$returnUrl = $this->getReturnUrl();
					if (GetPageName($returnUrl) == "t105_disposalheadlist.php")
						$returnUrl = $this->addMasterUrl($returnUrl); // List page, return to List page with correct master key if necessary
					elseif (GetPageName($returnUrl) == "t105_disposalheadview.php")
						$returnUrl = $this->getViewUrl(); // View page, return to View page with keyurl directly
					if (IsApi()) { // Return to caller
						$this->terminate(TRUE);
						return;
					} else {
						$this->terminate($returnUrl);
					}
				} elseif (IsApi()) { // API request, return
					$this->terminate();
					return;
				} else {
					$this->EventCancelled = TRUE; // Event cancelled
					$this->restoreFormValues(); // Add failed, restore form values
				}
		}

		// Set up Breadcrumb
		$this->setupBreadcrumb();

		// Render row based on row type
		$this->RowType = ROWTYPE_ADD; // Render add type

		// Render row
		$this->resetAttributes();
		$this->renderRow();
	}

	// Get upload files
	protected function getUploadFiles()
	{
		global $CurrentForm, $Language;
	}

	// Load default values
	protected function loadDefaultValues()
	{
		$this->id->CurrentValue = NULL;
		$this->id->OldValue = $this->id->CurrentValue;
		$this->property_id->CurrentValue = NULL;
		$this->property_id->OldValue = $this->property_id->CurrentValue;
		$this->TransactionNo->CurrentValue = NULL;
		$this->TransactionNo->OldValue = $this->TransactionNo->CurrentValue;
		$this->RecommendedBy->CurrentValue = NULL;
		$this->RecommendedBy->OldValue = $this->RecommendedBy->CurrentValue;
		$this->CE->CurrentValue = NULL;
		$this->CE->OldValue = $this->CE->CurrentValue;
		$this->ITM->CurrentValue = NULL;
		$this->ITM->OldValue = $this->ITM->CurrentValue;
		$this->Sign1->CurrentValue = NULL;
		$this->Sign1->OldValue = $this->Sign1->CurrentValue;
		$this->Sign2->CurrentValue = NULL;
		$this->Sign2->OldValue = $this->Sign2->CurrentValue;
		$this->Sign3->CurrentValue = NULL;
		$this->Sign3->OldValue = $this->Sign3->CurrentValue;
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

		// Check field name 'RecommendedBy' first before field var 'x_RecommendedBy'
		$val = $CurrentForm->hasValue("RecommendedBy") ? $CurrentForm->getValue("RecommendedBy") : $CurrentForm->getValue("x_RecommendedBy");
		if (!$this->RecommendedBy->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->RecommendedBy->Visible = FALSE; // Disable update for API request
			else
				$this->RecommendedBy->setFormValue($val);
		}

		// Check field name 'CE' first before field var 'x_CE'
		$val = $CurrentForm->hasValue("CE") ? $CurrentForm->getValue("CE") : $CurrentForm->getValue("x_CE");
		if (!$this->CE->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->CE->Visible = FALSE; // Disable update for API request
			else
				$this->CE->setFormValue($val);
		}

		// Check field name 'ITM' first before field var 'x_ITM'
		$val = $CurrentForm->hasValue("ITM") ? $CurrentForm->getValue("ITM") : $CurrentForm->getValue("x_ITM");
		if (!$this->ITM->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ITM->Visible = FALSE; // Disable update for API request
			else
				$this->ITM->setFormValue($val);
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

		// Check field name 'id' first before field var 'x_id'
		$val = $CurrentForm->hasValue("id") ? $CurrentForm->getValue("id") : $CurrentForm->getValue("x_id");
	}

	// Restore form values
	public function restoreFormValues()
	{
		global $CurrentForm;
		$this->property_id->CurrentValue = $this->property_id->FormValue;
		$this->TransactionNo->CurrentValue = $this->TransactionNo->FormValue;
		$this->RecommendedBy->CurrentValue = $this->RecommendedBy->FormValue;
		$this->CE->CurrentValue = $this->CE->FormValue;
		$this->ITM->CurrentValue = $this->ITM->FormValue;
		$this->Sign1->CurrentValue = $this->Sign1->FormValue;
		$this->Sign2->CurrentValue = $this->Sign2->FormValue;
		$this->Sign3->CurrentValue = $this->Sign3->FormValue;
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
		$this->RecommendedBy->setDbValue($row['RecommendedBy']);
		$this->CE->setDbValue($row['CE']);
		$this->ITM->setDbValue($row['ITM']);
		$this->Sign1->setDbValue($row['Sign1']);
		$this->Sign2->setDbValue($row['Sign2']);
		$this->Sign3->setDbValue($row['Sign3']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$this->loadDefaultValues();
		$row = [];
		$row['id'] = $this->id->CurrentValue;
		$row['property_id'] = $this->property_id->CurrentValue;
		$row['TransactionNo'] = $this->TransactionNo->CurrentValue;
		$row['RecommendedBy'] = $this->RecommendedBy->CurrentValue;
		$row['CE'] = $this->CE->CurrentValue;
		$row['ITM'] = $this->ITM->CurrentValue;
		$row['Sign1'] = $this->Sign1->CurrentValue;
		$row['Sign2'] = $this->Sign2->CurrentValue;
		$row['Sign3'] = $this->Sign3->CurrentValue;
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
		// RecommendedBy
		// CE
		// ITM
		// Sign1
		// Sign2
		// Sign3

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

			// RecommendedBy
			$this->RecommendedBy->ViewValue = $this->RecommendedBy->CurrentValue;
			$this->RecommendedBy->ViewValue = FormatNumber($this->RecommendedBy->ViewValue, 0, -2, -2, -2);
			$this->RecommendedBy->ViewCustomAttributes = "";

			// CE
			$this->CE->ViewValue = $this->CE->CurrentValue;
			$this->CE->ViewValue = FormatNumber($this->CE->ViewValue, 0, -2, -2, -2);
			$this->CE->ViewCustomAttributes = "";

			// ITM
			$this->ITM->ViewValue = $this->ITM->CurrentValue;
			$this->ITM->ViewValue = FormatNumber($this->ITM->ViewValue, 0, -2, -2, -2);
			$this->ITM->ViewCustomAttributes = "";

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

			// property_id
			$this->property_id->LinkCustomAttributes = "";
			$this->property_id->HrefValue = "";
			$this->property_id->TooltipValue = "";

			// TransactionNo
			$this->TransactionNo->LinkCustomAttributes = "";
			$this->TransactionNo->HrefValue = "";
			$this->TransactionNo->TooltipValue = "";

			// RecommendedBy
			$this->RecommendedBy->LinkCustomAttributes = "";
			$this->RecommendedBy->HrefValue = "";
			$this->RecommendedBy->TooltipValue = "";

			// CE
			$this->CE->LinkCustomAttributes = "";
			$this->CE->HrefValue = "";
			$this->CE->TooltipValue = "";

			// ITM
			$this->ITM->LinkCustomAttributes = "";
			$this->ITM->HrefValue = "";
			$this->ITM->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_ADD) { // Add row

			// property_id
			$this->property_id->EditAttrs["class"] = "form-control";
			$this->property_id->EditCustomAttributes = "";
			$this->property_id->EditValue = HtmlEncode($this->property_id->CurrentValue);
			$this->property_id->PlaceHolder = RemoveHtml($this->property_id->caption());

			// TransactionNo
			$this->TransactionNo->EditAttrs["class"] = "form-control";
			$this->TransactionNo->EditCustomAttributes = "";
			if (!$this->TransactionNo->Raw)
				$this->TransactionNo->CurrentValue = HtmlDecode($this->TransactionNo->CurrentValue);
			$this->TransactionNo->EditValue = HtmlEncode($this->TransactionNo->CurrentValue);
			$this->TransactionNo->PlaceHolder = RemoveHtml($this->TransactionNo->caption());

			// RecommendedBy
			$this->RecommendedBy->EditAttrs["class"] = "form-control";
			$this->RecommendedBy->EditCustomAttributes = "";
			$this->RecommendedBy->EditValue = HtmlEncode($this->RecommendedBy->CurrentValue);
			$this->RecommendedBy->PlaceHolder = RemoveHtml($this->RecommendedBy->caption());

			// CE
			$this->CE->EditAttrs["class"] = "form-control";
			$this->CE->EditCustomAttributes = "";
			$this->CE->EditValue = HtmlEncode($this->CE->CurrentValue);
			$this->CE->PlaceHolder = RemoveHtml($this->CE->caption());

			// ITM
			$this->ITM->EditAttrs["class"] = "form-control";
			$this->ITM->EditCustomAttributes = "";
			$this->ITM->EditValue = HtmlEncode($this->ITM->CurrentValue);
			$this->ITM->PlaceHolder = RemoveHtml($this->ITM->caption());

			// Sign1
			$this->Sign1->EditAttrs["class"] = "form-control";
			$this->Sign1->EditCustomAttributes = "";
			$this->Sign1->EditValue = HtmlEncode($this->Sign1->CurrentValue);
			$this->Sign1->PlaceHolder = RemoveHtml($this->Sign1->caption());

			// Sign2
			$this->Sign2->EditAttrs["class"] = "form-control";
			$this->Sign2->EditCustomAttributes = "";
			$this->Sign2->EditValue = HtmlEncode($this->Sign2->CurrentValue);
			$this->Sign2->PlaceHolder = RemoveHtml($this->Sign2->caption());

			// Sign3
			$this->Sign3->EditAttrs["class"] = "form-control";
			$this->Sign3->EditCustomAttributes = "";
			$this->Sign3->EditValue = HtmlEncode($this->Sign3->CurrentValue);
			$this->Sign3->PlaceHolder = RemoveHtml($this->Sign3->caption());

			// Add refer script
			// property_id

			$this->property_id->LinkCustomAttributes = "";
			$this->property_id->HrefValue = "";

			// TransactionNo
			$this->TransactionNo->LinkCustomAttributes = "";
			$this->TransactionNo->HrefValue = "";

			// RecommendedBy
			$this->RecommendedBy->LinkCustomAttributes = "";
			$this->RecommendedBy->HrefValue = "";

			// CE
			$this->CE->LinkCustomAttributes = "";
			$this->CE->HrefValue = "";

			// ITM
			$this->ITM->LinkCustomAttributes = "";
			$this->ITM->HrefValue = "";

			// Sign1
			$this->Sign1->LinkCustomAttributes = "";
			$this->Sign1->HrefValue = "";

			// Sign2
			$this->Sign2->LinkCustomAttributes = "";
			$this->Sign2->HrefValue = "";

			// Sign3
			$this->Sign3->LinkCustomAttributes = "";
			$this->Sign3->HrefValue = "";
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
		if (!CheckInteger($this->property_id->FormValue)) {
			AddMessage($FormError, $this->property_id->errorMessage());
		}
		if ($this->TransactionNo->Required) {
			if (!$this->TransactionNo->IsDetailKey && $this->TransactionNo->FormValue != NULL && $this->TransactionNo->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->TransactionNo->caption(), $this->TransactionNo->RequiredErrorMessage));
			}
		}
		if ($this->RecommendedBy->Required) {
			if (!$this->RecommendedBy->IsDetailKey && $this->RecommendedBy->FormValue != NULL && $this->RecommendedBy->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->RecommendedBy->caption(), $this->RecommendedBy->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->RecommendedBy->FormValue)) {
			AddMessage($FormError, $this->RecommendedBy->errorMessage());
		}
		if ($this->CE->Required) {
			if (!$this->CE->IsDetailKey && $this->CE->FormValue != NULL && $this->CE->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->CE->caption(), $this->CE->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->CE->FormValue)) {
			AddMessage($FormError, $this->CE->errorMessage());
		}
		if ($this->ITM->Required) {
			if (!$this->ITM->IsDetailKey && $this->ITM->FormValue != NULL && $this->ITM->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ITM->caption(), $this->ITM->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ITM->FormValue)) {
			AddMessage($FormError, $this->ITM->errorMessage());
		}
		if ($this->Sign1->Required) {
			if (!$this->Sign1->IsDetailKey && $this->Sign1->FormValue != NULL && $this->Sign1->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sign1->caption(), $this->Sign1->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Sign1->FormValue)) {
			AddMessage($FormError, $this->Sign1->errorMessage());
		}
		if ($this->Sign2->Required) {
			if (!$this->Sign2->IsDetailKey && $this->Sign2->FormValue != NULL && $this->Sign2->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sign2->caption(), $this->Sign2->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Sign2->FormValue)) {
			AddMessage($FormError, $this->Sign2->errorMessage());
		}
		if ($this->Sign3->Required) {
			if (!$this->Sign3->IsDetailKey && $this->Sign3->FormValue != NULL && $this->Sign3->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->Sign3->caption(), $this->Sign3->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->Sign3->FormValue)) {
			AddMessage($FormError, $this->Sign3->errorMessage());
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

		// TransactionNo
		$this->TransactionNo->setDbValueDef($rsnew, $this->TransactionNo->CurrentValue, "", FALSE);

		// RecommendedBy
		$this->RecommendedBy->setDbValueDef($rsnew, $this->RecommendedBy->CurrentValue, 0, FALSE);

		// CE
		$this->CE->setDbValueDef($rsnew, $this->CE->CurrentValue, 0, FALSE);

		// ITM
		$this->ITM->setDbValueDef($rsnew, $this->ITM->CurrentValue, 0, FALSE);

		// Sign1
		$this->Sign1->setDbValueDef($rsnew, $this->Sign1->CurrentValue, 0, FALSE);

		// Sign2
		$this->Sign2->setDbValueDef($rsnew, $this->Sign2->CurrentValue, 0, FALSE);

		// Sign3
		$this->Sign3->setDbValueDef($rsnew, $this->Sign3->CurrentValue, 0, FALSE);

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

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t105_disposalheadlist.php"), "", $this->TableVar, TRUE);
		$pageId = ($this->isCopy()) ? "Copy" : "Add";
		$Breadcrumb->add("add", $pageId, $url);
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