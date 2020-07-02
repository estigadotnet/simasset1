<?php
namespace PHPMaker2020\p_simasset1;

// Autoload
include_once "autoload.php";

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	\Delight\Cookie\Session::start(Config("COOKIE_SAMESITE")); // Init session data

// Output buffering
ob_start();
?>
<?php

// Write header
WriteHeader(FALSE);

// Create page object
$d301_home_dashboard = new d301_home_dashboard();

// Run the page
$d301_home_dashboard->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$d301_home_dashboard->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var fdashboard, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "dashboard";
	fdashboard = currentForm = new ew.Form("fdashboard", "dashboard");
	loadjs.done("fdashboard");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<!-- Content Container -->
<div id="ew-report" class="ew-report">
<div class="btn-toolbar ew-toolbar"></div>
<?php $d301_home_dashboard->showPageHeader(); ?>
<?php
$d301_home_dashboard->showMessage();
?>
<!-- Dashboard Container -->
<div id="ew-dashboard" class="container-fluid ew-dashboard ew-vertical">
<div id="accordion">
	<!-- asset -->
	<div class="card">
		<div class="card-header" id="headingOne">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Asset</button>
			</h5>
		</div>
		<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
			<div class="card-body">
<?php include_once "r004_assetglobalsmry.php"; ?>
</div>
		</div>
	</div>
	<!-- change log -->
	<div class="card">
		<div class="card-header" id="headingTwo">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Change Log</button>
			</h5>
		</div>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
			<div class="card-body">
				<pre><?php $lines = file('changelog.txt'); foreach ($lines as $line_num => $line) {echo $line; }?></pre>
			</div>
		</div>
	</div>
	<!-- todo -->
	<div class="card">
		<div class="card-header" id="headingThree">
			<h5 class="mb-0">
				<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">To Do</button>
			</h5>
		</div>
		<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
			<div class="card-body">
				<pre><?php $lines = file('todo.txt'); foreach ($lines as $line_num => $line) {echo $line; }?></pre>
			</div>
		</div>
	</div>
</div>
</div>
<!-- /.ew-dashboard -->
</div>
<!-- /.ew-report -->
<?php
$d301_home_dashboard->showPageFooter();
if (Config("DEBUG"))
	echo GetDebugMessage();
?>
<script>
loadjs.ready("load", function() {

	// Startup script
	// Write your table-specific startup script here
	// console.log("page loaded");

});
</script>
<?php include_once "footer.php"; ?>
<?php
$d301_home_dashboard->terminate();
?>