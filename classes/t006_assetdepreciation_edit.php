<?php
namespace PHPMaker2020\p_simasset1;

/**
 * Page class
 */
class t006_assetdepreciation_edit extends t006_assetdepreciation
{

	// Page ID
	public $PageID = "edit";

	// Project ID
	public $ProjectID = "{E1C6E322-15B9-474C-85CF-A99378A9BC2B}";

	// Table name
	public $TableName = 't006_assetdepreciation';

	// Page object name
	public $PageObjName = "t006_assetdepreciation_edit";

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

		// Table object (t006_assetdepreciation)
		if (!isset($GLOBALS["t006_assetdepreciation"]) || get_class($GLOBALS["t006_assetdepreciation"]) == PROJECT_NAMESPACE . "t006_assetdepreciation") {
			$GLOBALS["t006_assetdepreciation"] = &$this;
			$GLOBALS["Table"] = &$GLOBALS["t006_assetdepreciation"];
		}

		// Table object (t004_asset)
		if (!isset($GLOBALS['t004_asset']))
			$GLOBALS['t004_asset'] = new t004_asset();

		// Table object (t201_users)
		if (!isset($GLOBALS['t201_users']))
			$GLOBALS['t201_users'] = new t201_users();

		// Page ID (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "PAGE_ID"))
			define(PROJECT_NAMESPACE . "PAGE_ID", 'edit');

		// Table name (for backward compatibility only)
		if (!defined(PROJECT_NAMESPACE . "TABLE_NAME"))
			define(PROJECT_NAMESPACE . "TABLE_NAME", 't006_assetdepreciation');

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
		global $t006_assetdepreciation;
		if ($this->CustomExport && $this->CustomExport == $this->Export && array_key_exists($this->CustomExport, Config("EXPORT_CLASSES"))) {
				$content = ob_get_contents();
			if ($ExportFileName == "")
				$ExportFileName = $this->TableVar;
			$class = PROJECT_NAMESPACE . Config("EXPORT_CLASSES." . $this->CustomExport);
			if (class_exists($class)) {
				$doc = new $class($t006_assetdepreciation);
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
					if ($pageName == "t006_assetdepreciationview.php")
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
					$this->terminate(GetUrl("t006_assetdepreciationlist.php"));
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
		$this->asset_id->setVisibility();
		$this->ListOfYears->setVisibility();
		$this->NumberOfMonths->setVisibility();
		$this->DepreciationAmount->setVisibility();
		$this->DepreciationYtd->setVisibility();
		$this->NetBookValue->setVisibility();
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

		if (!$Security->canEdit()) {
			$this->setFailureMessage(DeniedMessage()); // No permission
			$this->terminate("t006_assetdepreciationlist.php");
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

			// Set up master detail parameters
			$this->setupMasterParms();

			// Load current record
			$loaded = $this->loadRow();
		}

		// Process form if post back
		if ($postBack) {
			$this->loadFormValues(); // Get form values
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
					$this->terminate("t006_assetdepreciationlist.php"); // No matching record, return to list
				}
				break;
			case "update": // Update
				$returnUrl = $this->getReturnUrl();
				if (GetPageName($returnUrl) == "t006_assetdepreciationlist.php")
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

		// Check field name 'asset_id' first before field var 'x_asset_id'
		$val = $CurrentForm->hasValue("asset_id") ? $CurrentForm->getValue("asset_id") : $CurrentForm->getValue("x_asset_id");
		if (!$this->asset_id->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->asset_id->Visible = FALSE; // Disable update for API request
			else
				$this->asset_id->setFormValue($val);
		}

		// Check field name 'ListOfYears' first before field var 'x_ListOfYears'
		$val = $CurrentForm->hasValue("ListOfYears") ? $CurrentForm->getValue("ListOfYears") : $CurrentForm->getValue("x_ListOfYears");
		if (!$this->ListOfYears->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->ListOfYears->Visible = FALSE; // Disable update for API request
			else
				$this->ListOfYears->setFormValue($val);
		}

		// Check field name 'NumberOfMonths' first before field var 'x_NumberOfMonths'
		$val = $CurrentForm->hasValue("NumberOfMonths") ? $CurrentForm->getValue("NumberOfMonths") : $CurrentForm->getValue("x_NumberOfMonths");
		if (!$this->NumberOfMonths->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NumberOfMonths->Visible = FALSE; // Disable update for API request
			else
				$this->NumberOfMonths->setFormValue($val);
		}

		// Check field name 'DepreciationAmount' first before field var 'x_DepreciationAmount'
		$val = $CurrentForm->hasValue("DepreciationAmount") ? $CurrentForm->getValue("DepreciationAmount") : $CurrentForm->getValue("x_DepreciationAmount");
		if (!$this->DepreciationAmount->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DepreciationAmount->Visible = FALSE; // Disable update for API request
			else
				$this->DepreciationAmount->setFormValue($val);
		}

		// Check field name 'DepreciationYtd' first before field var 'x_DepreciationYtd'
		$val = $CurrentForm->hasValue("DepreciationYtd") ? $CurrentForm->getValue("DepreciationYtd") : $CurrentForm->getValue("x_DepreciationYtd");
		if (!$this->DepreciationYtd->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->DepreciationYtd->Visible = FALSE; // Disable update for API request
			else
				$this->DepreciationYtd->setFormValue($val);
		}

		// Check field name 'NetBookValue' first before field var 'x_NetBookValue'
		$val = $CurrentForm->hasValue("NetBookValue") ? $CurrentForm->getValue("NetBookValue") : $CurrentForm->getValue("x_NetBookValue");
		if (!$this->NetBookValue->IsDetailKey) {
			if (IsApi() && $val == NULL)
				$this->NetBookValue->Visible = FALSE; // Disable update for API request
			else
				$this->NetBookValue->setFormValue($val);
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
		$this->asset_id->CurrentValue = $this->asset_id->FormValue;
		$this->ListOfYears->CurrentValue = $this->ListOfYears->FormValue;
		$this->NumberOfMonths->CurrentValue = $this->NumberOfMonths->FormValue;
		$this->DepreciationAmount->CurrentValue = $this->DepreciationAmount->FormValue;
		$this->DepreciationYtd->CurrentValue = $this->DepreciationYtd->FormValue;
		$this->NetBookValue->CurrentValue = $this->NetBookValue->FormValue;
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
		$this->asset_id->setDbValue($row['asset_id']);
		$this->ListOfYears->setDbValue($row['ListOfYears']);
		$this->NumberOfMonths->setDbValue($row['NumberOfMonths']);
		$this->DepreciationAmount->setDbValue($row['DepreciationAmount']);
		$this->DepreciationYtd->setDbValue($row['DepreciationYtd']);
		$this->NetBookValue->setDbValue($row['NetBookValue']);
	}

	// Return a row with default values
	protected function newRow()
	{
		$row = [];
		$row['id'] = NULL;
		$row['asset_id'] = NULL;
		$row['ListOfYears'] = NULL;
		$row['NumberOfMonths'] = NULL;
		$row['DepreciationAmount'] = NULL;
		$row['DepreciationYtd'] = NULL;
		$row['NetBookValue'] = NULL;
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

		if ($this->DepreciationAmount->FormValue == $this->DepreciationAmount->CurrentValue && is_numeric(ConvertToFloatString($this->DepreciationAmount->CurrentValue)))
			$this->DepreciationAmount->CurrentValue = ConvertToFloatString($this->DepreciationAmount->CurrentValue);

		// Convert decimal values if posted back
		if ($this->DepreciationYtd->FormValue == $this->DepreciationYtd->CurrentValue && is_numeric(ConvertToFloatString($this->DepreciationYtd->CurrentValue)))
			$this->DepreciationYtd->CurrentValue = ConvertToFloatString($this->DepreciationYtd->CurrentValue);

		// Convert decimal values if posted back
		if ($this->NetBookValue->FormValue == $this->NetBookValue->CurrentValue && is_numeric(ConvertToFloatString($this->NetBookValue->CurrentValue)))
			$this->NetBookValue->CurrentValue = ConvertToFloatString($this->NetBookValue->CurrentValue);

		// Call Row_Rendering event
		$this->Row_Rendering();

		// Common render codes for all row types
		// id
		// asset_id
		// ListOfYears
		// NumberOfMonths
		// DepreciationAmount
		// DepreciationYtd
		// NetBookValue

		if ($this->RowType == ROWTYPE_VIEW) { // View row

			// id
			$this->id->ViewValue = $this->id->CurrentValue;
			$this->id->ViewCustomAttributes = "";

			// asset_id
			$this->asset_id->ViewValue = $this->asset_id->CurrentValue;
			$this->asset_id->ViewValue = FormatNumber($this->asset_id->ViewValue, 0, -2, -2, -2);
			$this->asset_id->ViewCustomAttributes = "";

			// ListOfYears
			$this->ListOfYears->ViewValue = $this->ListOfYears->CurrentValue;
			$this->ListOfYears->ViewCustomAttributes = "";

			// NumberOfMonths
			$this->NumberOfMonths->ViewValue = $this->NumberOfMonths->CurrentValue;
			$this->NumberOfMonths->ViewValue = FormatNumber($this->NumberOfMonths->ViewValue, 0, -2, -2, -2);
			$this->NumberOfMonths->CellCssStyle .= "text-align: right;";
			$this->NumberOfMonths->ViewCustomAttributes = "";

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

			// asset_id
			$this->asset_id->LinkCustomAttributes = "";
			$this->asset_id->HrefValue = "";
			$this->asset_id->TooltipValue = "";

			// ListOfYears
			$this->ListOfYears->LinkCustomAttributes = "";
			$this->ListOfYears->HrefValue = "";
			$this->ListOfYears->TooltipValue = "";

			// NumberOfMonths
			$this->NumberOfMonths->LinkCustomAttributes = "";
			$this->NumberOfMonths->HrefValue = "";
			$this->NumberOfMonths->TooltipValue = "";

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
		} elseif ($this->RowType == ROWTYPE_EDIT) { // Edit row

			// asset_id
			$this->asset_id->EditAttrs["class"] = "form-control";
			$this->asset_id->EditCustomAttributes = "";
			if ($this->asset_id->getSessionValue() != "") {
				$this->asset_id->CurrentValue = $this->asset_id->getSessionValue();
				$this->asset_id->ViewValue = $this->asset_id->CurrentValue;
				$this->asset_id->ViewValue = FormatNumber($this->asset_id->ViewValue, 0, -2, -2, -2);
				$this->asset_id->ViewCustomAttributes = "";
			} else {
				$this->asset_id->EditValue = HtmlEncode($this->asset_id->CurrentValue);
				$this->asset_id->PlaceHolder = RemoveHtml($this->asset_id->caption());
			}

			// ListOfYears
			$this->ListOfYears->EditAttrs["class"] = "form-control";
			$this->ListOfYears->EditCustomAttributes = "";
			$this->ListOfYears->EditValue = HtmlEncode($this->ListOfYears->CurrentValue);
			$this->ListOfYears->PlaceHolder = RemoveHtml($this->ListOfYears->caption());

			// NumberOfMonths
			$this->NumberOfMonths->EditAttrs["class"] = "form-control";
			$this->NumberOfMonths->EditCustomAttributes = "";
			$this->NumberOfMonths->EditValue = HtmlEncode($this->NumberOfMonths->CurrentValue);
			$this->NumberOfMonths->PlaceHolder = RemoveHtml($this->NumberOfMonths->caption());

			// DepreciationAmount
			$this->DepreciationAmount->EditAttrs["class"] = "form-control";
			$this->DepreciationAmount->EditCustomAttributes = "";
			$this->DepreciationAmount->EditValue = HtmlEncode($this->DepreciationAmount->CurrentValue);
			$this->DepreciationAmount->PlaceHolder = RemoveHtml($this->DepreciationAmount->caption());
			if (strval($this->DepreciationAmount->EditValue) != "" && is_numeric($this->DepreciationAmount->EditValue))
				$this->DepreciationAmount->EditValue = FormatNumber($this->DepreciationAmount->EditValue, -2, -2, -2, -2);
			

			// DepreciationYtd
			$this->DepreciationYtd->EditAttrs["class"] = "form-control";
			$this->DepreciationYtd->EditCustomAttributes = "";
			$this->DepreciationYtd->EditValue = HtmlEncode($this->DepreciationYtd->CurrentValue);
			$this->DepreciationYtd->PlaceHolder = RemoveHtml($this->DepreciationYtd->caption());
			if (strval($this->DepreciationYtd->EditValue) != "" && is_numeric($this->DepreciationYtd->EditValue))
				$this->DepreciationYtd->EditValue = FormatNumber($this->DepreciationYtd->EditValue, -2, -2, -2, -2);
			

			// NetBookValue
			$this->NetBookValue->EditAttrs["class"] = "form-control";
			$this->NetBookValue->EditCustomAttributes = "";
			$this->NetBookValue->EditValue = HtmlEncode($this->NetBookValue->CurrentValue);
			$this->NetBookValue->PlaceHolder = RemoveHtml($this->NetBookValue->caption());
			if (strval($this->NetBookValue->EditValue) != "" && is_numeric($this->NetBookValue->EditValue))
				$this->NetBookValue->EditValue = FormatNumber($this->NetBookValue->EditValue, -2, -2, -2, -2);
			

			// Edit refer script
			// asset_id

			$this->asset_id->LinkCustomAttributes = "";
			$this->asset_id->HrefValue = "";

			// ListOfYears
			$this->ListOfYears->LinkCustomAttributes = "";
			$this->ListOfYears->HrefValue = "";

			// NumberOfMonths
			$this->NumberOfMonths->LinkCustomAttributes = "";
			$this->NumberOfMonths->HrefValue = "";

			// DepreciationAmount
			$this->DepreciationAmount->LinkCustomAttributes = "";
			$this->DepreciationAmount->HrefValue = "";

			// DepreciationYtd
			$this->DepreciationYtd->LinkCustomAttributes = "";
			$this->DepreciationYtd->HrefValue = "";

			// NetBookValue
			$this->NetBookValue->LinkCustomAttributes = "";
			$this->NetBookValue->HrefValue = "";
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
		if ($this->asset_id->Required) {
			if (!$this->asset_id->IsDetailKey && $this->asset_id->FormValue != NULL && $this->asset_id->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->asset_id->caption(), $this->asset_id->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->asset_id->FormValue)) {
			AddMessage($FormError, $this->asset_id->errorMessage());
		}
		if ($this->ListOfYears->Required) {
			if (!$this->ListOfYears->IsDetailKey && $this->ListOfYears->FormValue != NULL && $this->ListOfYears->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->ListOfYears->caption(), $this->ListOfYears->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->ListOfYears->FormValue)) {
			AddMessage($FormError, $this->ListOfYears->errorMessage());
		}
		if ($this->NumberOfMonths->Required) {
			if (!$this->NumberOfMonths->IsDetailKey && $this->NumberOfMonths->FormValue != NULL && $this->NumberOfMonths->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NumberOfMonths->caption(), $this->NumberOfMonths->RequiredErrorMessage));
			}
		}
		if (!CheckInteger($this->NumberOfMonths->FormValue)) {
			AddMessage($FormError, $this->NumberOfMonths->errorMessage());
		}
		if ($this->DepreciationAmount->Required) {
			if (!$this->DepreciationAmount->IsDetailKey && $this->DepreciationAmount->FormValue != NULL && $this->DepreciationAmount->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DepreciationAmount->caption(), $this->DepreciationAmount->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DepreciationAmount->FormValue)) {
			AddMessage($FormError, $this->DepreciationAmount->errorMessage());
		}
		if ($this->DepreciationYtd->Required) {
			if (!$this->DepreciationYtd->IsDetailKey && $this->DepreciationYtd->FormValue != NULL && $this->DepreciationYtd->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->DepreciationYtd->caption(), $this->DepreciationYtd->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->DepreciationYtd->FormValue)) {
			AddMessage($FormError, $this->DepreciationYtd->errorMessage());
		}
		if ($this->NetBookValue->Required) {
			if (!$this->NetBookValue->IsDetailKey && $this->NetBookValue->FormValue != NULL && $this->NetBookValue->FormValue == "") {
				AddMessage($FormError, str_replace("%s", $this->NetBookValue->caption(), $this->NetBookValue->RequiredErrorMessage));
			}
		}
		if (!CheckNumber($this->NetBookValue->FormValue)) {
			AddMessage($FormError, $this->NetBookValue->errorMessage());
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

			// Save old values
			$rsold = &$rs->fields;
			$this->loadDbValues($rsold);
			$rsnew = [];

			// asset_id
			$this->asset_id->setDbValueDef($rsnew, $this->asset_id->CurrentValue, 0, $this->asset_id->ReadOnly);

			// ListOfYears
			$this->ListOfYears->setDbValueDef($rsnew, $this->ListOfYears->CurrentValue, 0, $this->ListOfYears->ReadOnly);

			// NumberOfMonths
			$this->NumberOfMonths->setDbValueDef($rsnew, $this->NumberOfMonths->CurrentValue, 0, $this->NumberOfMonths->ReadOnly);

			// DepreciationAmount
			$this->DepreciationAmount->setDbValueDef($rsnew, $this->DepreciationAmount->CurrentValue, 0, $this->DepreciationAmount->ReadOnly);

			// DepreciationYtd
			$this->DepreciationYtd->setDbValueDef($rsnew, $this->DepreciationYtd->CurrentValue, 0, $this->DepreciationYtd->ReadOnly);

			// NetBookValue
			$this->NetBookValue->setDbValueDef($rsnew, $this->NetBookValue->CurrentValue, 0, $this->NetBookValue->ReadOnly);

			// Check referential integrity for master table 't004_asset'
			$validMasterRecord = TRUE;
			$masterFilter = $this->sqlMasterFilter_t004_asset();
			$keyValue = isset($rsnew['asset_id']) ? $rsnew['asset_id'] : $rsold['asset_id'];
			if (strval($keyValue) != "") {
				$masterFilter = str_replace("@id@", AdjustSql($keyValue), $masterFilter);
			} else {
				$validMasterRecord = FALSE;
			}
			if ($validMasterRecord) {
				if (!isset($GLOBALS["t004_asset"]))
					$GLOBALS["t004_asset"] = new t004_asset();
				$rsmaster = $GLOBALS["t004_asset"]->loadRs($masterFilter);
				$validMasterRecord = ($rsmaster && !$rsmaster->EOF);
				$rsmaster->close();
			}
			if (!$validMasterRecord) {
				$relatedRecordMsg = str_replace("%t", "t004_asset", $Language->phrase("RelatedRecordRequired"));
				$this->setFailureMessage($relatedRecordMsg);
				$rs->close();
				return FALSE;
			}

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

	// Set up master/detail based on QueryString
	protected function setupMasterParms()
	{
		$validMaster = FALSE;

		// Get the keys for master table
		if (($master = Get(Config("TABLE_SHOW_MASTER"), Get(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t004_asset") {
				$validMaster = TRUE;
				if (($parm = Get("fk_id", Get("asset_id"))) !== NULL) {
					$GLOBALS["t004_asset"]->id->setQueryStringValue($parm);
					$this->asset_id->setQueryStringValue($GLOBALS["t004_asset"]->id->QueryStringValue);
					$this->asset_id->setSessionValue($this->asset_id->QueryStringValue);
					if (!is_numeric($GLOBALS["t004_asset"]->id->QueryStringValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		} elseif (($master = Post(Config("TABLE_SHOW_MASTER"), Post(Config("TABLE_MASTER")))) !== NULL) {
			$masterTblVar = $master;
			if ($masterTblVar == "") {
				$validMaster = TRUE;
				$this->DbMasterFilter = "";
				$this->DbDetailFilter = "";
			}
			if ($masterTblVar == "t004_asset") {
				$validMaster = TRUE;
				if (($parm = Post("fk_id", Post("asset_id"))) !== NULL) {
					$GLOBALS["t004_asset"]->id->setFormValue($parm);
					$this->asset_id->setFormValue($GLOBALS["t004_asset"]->id->FormValue);
					$this->asset_id->setSessionValue($this->asset_id->FormValue);
					if (!is_numeric($GLOBALS["t004_asset"]->id->FormValue))
						$validMaster = FALSE;
				} else {
					$validMaster = FALSE;
				}
			}
		}
		if ($validMaster) {

			// Save current master table
			$this->setCurrentMasterTable($masterTblVar);
			$this->setSessionWhere($this->getDetailFilter());

			// Reset start record counter (new master key)
			if (!$this->isAddOrEdit()) {
				$this->StartRecord = 1;
				$this->setStartRecordNumber($this->StartRecord);
			}

			// Clear previous master key from Session
			if ($masterTblVar != "t004_asset") {
				if ($this->asset_id->CurrentValue == "")
					$this->asset_id->setSessionValue("");
			}
		}
		$this->DbMasterFilter = $this->getMasterFilter(); // Get master filter
		$this->DbDetailFilter = $this->getDetailFilter(); // Get detail filter
	}

	// Set up Breadcrumb
	protected function setupBreadcrumb()
	{
		global $Breadcrumb, $Language;
		$Breadcrumb = new Breadcrumb();
		$url = substr(CurrentUrl(), strrpos(CurrentUrl(), "/")+1);
		$Breadcrumb->add("list", $this->TableVar, $this->addMasterUrl("t006_assetdepreciationlist.php"), "", $this->TableVar, TRUE);
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
} // End class
?>