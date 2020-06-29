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
$t007_assettype_edit = new t007_assettype_edit();

// Run the page
$t007_assettype_edit->run();

// Setup login status
SetupLoginStatus();
SetClientVar("login", LoginStatus());

// Global Page Rendering event (in userfn*.php)
Page_Rendering();

// Page Rendering event
$t007_assettype_edit->Page_Render();
?>
<?php include_once "header.php"; ?>
<script>
var ft007_assettypeedit, currentPageID;
loadjs.ready("head", function() {

	// Form object
	currentPageID = ew.PAGE_ID = "edit";
	ft007_assettypeedit = currentForm = new ew.Form("ft007_assettypeedit", "edit");

	// Validate form
	ft007_assettypeedit.validate = function() {
		if (!this.validateRequired)
			return true; // Ignore validation
		var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj);
		if ($fobj.find("#confirm").val() == "confirm")
			return true;
		var elm, felm, uelm, addcnt = 0;
		var $k = $fobj.find("#" + this.formKeyCountName); // Get key_count
		var rowcnt = ($k[0]) ? parseInt($k.val(), 10) : 1;
		var startcnt = (rowcnt == 0) ? 0 : 1; // Check rowcnt == 0 => Inline-Add
		var gridinsert = ["insert", "gridinsert"].includes($fobj.find("#action").val()) && $k[0];
		for (var i = startcnt; i <= rowcnt; i++) {
			var infix = ($k[0]) ? String(i) : "";
			$fobj.data("rowindex", infix);
			<?php if ($t007_assettype_edit->assetgroup_id->Required) { ?>
				elm = this.getElements("x" + infix + "_assetgroup_id");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_edit->assetgroup_id->caption(), $t007_assettype_edit->assetgroup_id->RequiredErrorMessage)) ?>");
			<?php } ?>
				elm = this.getElements("x" + infix + "_assetgroup_id");
				if (elm && !ew.checkInteger(elm.value))
					return this.onError(elm, "<?php echo JsEncode($t007_assettype_edit->assetgroup_id->errorMessage()) ?>");
			<?php if ($t007_assettype_edit->Description->Required) { ?>
				elm = this.getElements("x" + infix + "_Description");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_edit->Description->caption(), $t007_assettype_edit->Description->RequiredErrorMessage)) ?>");
			<?php } ?>
			<?php if ($t007_assettype_edit->Code->Required) { ?>
				elm = this.getElements("x" + infix + "_Code");
				if (elm && !ew.isHidden(elm) && !ew.hasValue(elm))
					return this.onError(elm, "<?php echo JsEncode(str_replace("%s", $t007_assettype_edit->Code->caption(), $t007_assettype_edit->Code->RequiredErrorMessage)) ?>");
			<?php } ?>

				// Call Form_CustomValidate event
				if (!this.Form_CustomValidate(fobj))
					return false;
		}

		// Process detail forms
		var dfs = $fobj.find("input[name='detailpage']").get();
		for (var i = 0; i < dfs.length; i++) {
			var df = dfs[i], val = df.value;
			if (val && ew.forms[val])
				if (!ew.forms[val].validate())
					return false;
		}
		return true;
	}

	// Form_CustomValidate
	ft007_assettypeedit.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

		// Your custom validation code here, return false if invalid.
		return true;
	}

	// Use JavaScript validation or not
	ft007_assettypeedit.validateRequired = <?php echo Config("CLIENT_VALIDATE") ? "true" : "false" ?>;

	// Dynamic selection lists
	ft007_assettypeedit.lists["x_assetgroup_id"] = <?php echo $t007_assettype_edit->assetgroup_id->Lookup->toClientList($t007_assettype_edit) ?>;
	ft007_assettypeedit.lists["x_assetgroup_id"].options = <?php echo JsonEncode($t007_assettype_edit->assetgroup_id->lookupOptions()) ?>;
	ft007_assettypeedit.autoSuggests["x_assetgroup_id"] = <?php echo json_encode(["data" => "ajax=autosuggest"]) ?>;
	loadjs.done("ft007_assettypeedit");
});
</script>
<script>
loadjs.ready("head", function() {

	// Client script
	// Write your client script here, no need to add script tags.

});
</script>
<?php $t007_assettype_edit->showPageHeader(); ?>
<?php
$t007_assettype_edit->showMessage();
?>
<form name="ft007_assettypeedit" id="ft007_assettypeedit" class="<?php echo $t007_assettype_edit->FormClassName ?>" action="<?php echo CurrentPageName() ?>" method="post">
<?php if ($Page->CheckToken) { ?>
<input type="hidden" name="<?php echo Config("TOKEN_NAME") ?>" value="<?php echo $Page->Token ?>">
<?php } ?>
<input type="hidden" name="t" value="t007_assettype">
<input type="hidden" name="action" id="action" value="update">
<input type="hidden" name="modal" value="<?php echo (int)$t007_assettype_edit->IsModal ?>">
<?php if ($t007_assettype->getCurrentMasterTable() == "t005_assetgroup") { ?>
<input type="hidden" name="<?php echo Config("TABLE_SHOW_MASTER") ?>" value="t005_assetgroup">
<input type="hidden" name="fk_id" value="<?php echo HtmlEncode($t007_assettype_edit->assetgroup_id->getSessionValue()) ?>">
<?php } ?>
<div class="ew-edit-div"><!-- page* -->
<?php if ($t007_assettype_edit->assetgroup_id->Visible) { // assetgroup_id ?>
	<div id="r_assetgroup_id" class="form-group row">
		<label id="elh_t007_assettype_assetgroup_id" class="<?php echo $t007_assettype_edit->LeftColumnClass ?>"><?php echo $t007_assettype_edit->assetgroup_id->caption() ?><?php echo $t007_assettype_edit->assetgroup_id->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_assettype_edit->RightColumnClass ?>"><div <?php echo $t007_assettype_edit->assetgroup_id->cellAttributes() ?>>
<?php if ($t007_assettype_edit->assetgroup_id->getSessionValue() != "") { ?>
<span id="el_t007_assettype_assetgroup_id">
<span<?php echo $t007_assettype_edit->assetgroup_id->viewAttributes() ?>><input type="text" readonly class="form-control-plaintext" value="<?php echo HtmlEncode(RemoveHtml($t007_assettype_edit->assetgroup_id->ViewValue)) ?>"></span>
</span>
<input type="hidden" id="x_assetgroup_id" name="x_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_edit->assetgroup_id->CurrentValue) ?>">
<?php } else { ?>
<span id="el_t007_assettype_assetgroup_id">
<?php
$onchange = $t007_assettype_edit->assetgroup_id->EditAttrs->prepend("onchange", "");
$onchange = ($onchange) ? ' onchange="' . JsEncode($onchange) . '"' : '';
$t007_assettype_edit->assetgroup_id->EditAttrs["onchange"] = "";
?>
<span id="as_x_assetgroup_id">
	<div class="input-group">
		<input type="text" class="form-control" name="sv_x_assetgroup_id" id="sv_x_assetgroup_id" value="<?php echo RemoveHtml($t007_assettype_edit->assetgroup_id->EditValue) ?>" size="30" maxlength="11" placeholder="<?php echo HtmlEncode($t007_assettype_edit->assetgroup_id->getPlaceHolder()) ?>" data-placeholder="<?php echo HtmlEncode($t007_assettype_edit->assetgroup_id->getPlaceHolder()) ?>"<?php echo $t007_assettype_edit->assetgroup_id->editAttributes() ?>>
		<div class="input-group-append">
			<button type="button" title="<?php echo HtmlEncode(str_replace("%s", RemoveHtml($t007_assettype_edit->assetgroup_id->caption()), $Language->phrase("LookupLink", TRUE))) ?>" onclick="ew.modalLookupShow({lnk:this,el:'x_assetgroup_id',m:0,n:10,srch:true});" class="ew-lookup-btn btn btn-default"<?php echo ($t007_assettype_edit->assetgroup_id->ReadOnly || $t007_assettype_edit->assetgroup_id->Disabled) ? " disabled" : "" ?>><i class="fas fa-search ew-icon"></i></button>
		</div>
	</div>
</span>
<input type="hidden" data-table="t007_assettype" data-field="x_assetgroup_id" data-multiple="0" data-lookup="1" data-value-separator="<?php echo $t007_assettype_edit->assetgroup_id->displayValueSeparatorAttribute() ?>" name="x_assetgroup_id" id="x_assetgroup_id" value="<?php echo HtmlEncode($t007_assettype_edit->assetgroup_id->CurrentValue) ?>"<?php echo $onchange ?>>
<script>
loadjs.ready(["ft007_assettypeedit"], function() {
	ft007_assettypeedit.createAutoSuggest({"id":"x_assetgroup_id","forceSelect":false});
});
</script>
<?php echo $t007_assettype_edit->assetgroup_id->Lookup->getParamTag($t007_assettype_edit, "p_x_assetgroup_id") ?>
</span>
<?php } ?>
<?php echo $t007_assettype_edit->assetgroup_id->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_assettype_edit->Description->Visible) { // Description ?>
	<div id="r_Description" class="form-group row">
		<label id="elh_t007_assettype_Description" for="x_Description" class="<?php echo $t007_assettype_edit->LeftColumnClass ?>"><?php echo $t007_assettype_edit->Description->caption() ?><?php echo $t007_assettype_edit->Description->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_assettype_edit->RightColumnClass ?>"><div <?php echo $t007_assettype_edit->Description->cellAttributes() ?>>
<span id="el_t007_assettype_Description">
<input type="text" data-table="t007_assettype" data-field="x_Description" name="x_Description" id="x_Description" size="30" maxlength="50" placeholder="<?php echo HtmlEncode($t007_assettype_edit->Description->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_edit->Description->EditValue ?>"<?php echo $t007_assettype_edit->Description->editAttributes() ?>>
</span>
<?php echo $t007_assettype_edit->Description->CustomMsg ?></div></div>
	</div>
<?php } ?>
<?php if ($t007_assettype_edit->Code->Visible) { // Code ?>
	<div id="r_Code" class="form-group row">
		<label id="elh_t007_assettype_Code" for="x_Code" class="<?php echo $t007_assettype_edit->LeftColumnClass ?>"><?php echo $t007_assettype_edit->Code->caption() ?><?php echo $t007_assettype_edit->Code->Required ? $Language->phrase("FieldRequiredIndicator") : "" ?></label>
		<div class="<?php echo $t007_assettype_edit->RightColumnClass ?>"><div <?php echo $t007_assettype_edit->Code->cellAttributes() ?>>
<span id="el_t007_assettype_Code">
<input type="text" data-table="t007_assettype" data-field="x_Code" name="x_Code" id="x_Code" size="30" maxlength="3" placeholder="<?php echo HtmlEncode($t007_assettype_edit->Code->getPlaceHolder()) ?>" value="<?php echo $t007_assettype_edit->Code->EditValue ?>"<?php echo $t007_assettype_edit->Code->editAttributes() ?>>
</span>
<?php echo $t007_assettype_edit->Code->CustomMsg ?></div></div>
	</div>
<?php } ?>
</div><!-- /page* -->
	<input type="hidden" data-table="t007_assettype" data-field="x_id" name="x_id" id="x_id" value="<?php echo HtmlEncode($t007_assettype_edit->id->CurrentValue) ?>">
<?php if (!$t007_assettype_edit->IsModal) { ?>
<div class="form-group row"><!-- buttons .form-group -->
	<div class="<?php echo $t007_assettype_edit->OffsetColumnClass ?>"><!-- buttons offset -->
<button class="btn btn-primary ew-btn" name="btn-action" id="btn-action" type="submit"><?php echo $Language->phrase("SaveBtn") ?></button>
<button class="btn btn-default ew-btn" name="btn-cancel" id="btn-cancel" type="button" data-href="<?php echo $t007_assettype_edit->getReturnUrl() ?>"><?php echo $Language->phrase("CancelBtn") ?></button>
	</div><!-- /buttons offset -->
</div><!-- /buttons .form-group -->
<?php } ?>
</form>
<?php
$t007_assettype_edit->showPageFooter();
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
$t007_assettype_edit->terminate();
?>