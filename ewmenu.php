<?php
namespace PHPMaker2020\p_simasset1;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
	$MenuRelativePath = "";
	$MenuLanguage = &$Language;
} else { // Compat reports
	$LANGUAGE_FOLDER = "../lang/";
	$MenuRelativePath = "../";
	$MenuLanguage = new Language();
}

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
$topMenu->addMenuItem(14, "mi_d301_home", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "d301_homedsb.php", -1, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}d301_home'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(15, "mci_Setup", $MenuLanguage->MenuPhrase("15", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(1, "mi_t001_property", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_propertylist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t001_property'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(2, "mi_t002_department", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_departmentlist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t002_department'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(3, "mi_t003_signature", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t003_signaturelist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t003_signature'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(20, "mi_t005_assetgroup", $MenuLanguage->MenuPhrase("20", "MenuText"), $MenuRelativePath . "t005_assetgrouplist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t005_assetgroup'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(4, "mi_t004_asset", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t004_assetlist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t004_asset'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(16, "mci_Proses", $MenuLanguage->MenuPhrase("16", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(38, "mci_Handover", $MenuLanguage->MenuPhrase("38", "MenuText"), "", 16, "", TRUE, FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(5, "mi_t101_ho_head", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t101_ho_headlist.php", 38, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t101_ho_head'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(39, "mi_t103_ho1_head", $MenuLanguage->MenuPhrase("39", "MenuText"), $MenuRelativePath . "t103_ho1_headlist.php", 38, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t103_ho1_head'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(18, "mci_Report", $MenuLanguage->MenuPhrase("18", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(13, "mi_r001_asset", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "r001_assetsmry.php", 18, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}r001_asset'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(17, "mci_Utility", $MenuLanguage->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$topMenu->addMenuItem(8, "mi_t201_users", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "t201_userslist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t201_users'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(9, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(11, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
$topMenu->addMenuItem(12, "mi_t205_parameter", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "t205_parameterlist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t205_parameter'), FALSE, FALSE, "", "", TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(14, "mi_d301_home", $MenuLanguage->MenuPhrase("14", "MenuText"), $MenuRelativePath . "d301_homedsb.php", -1, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}d301_home'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(15, "mci_Setup", $MenuLanguage->MenuPhrase("15", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(1, "mi_t001_property", $MenuLanguage->MenuPhrase("1", "MenuText"), $MenuRelativePath . "t001_propertylist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t001_property'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(2, "mi_t002_department", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "t002_departmentlist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t002_department'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(3, "mi_t003_signature", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "t003_signaturelist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t003_signature'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(20, "mi_t005_assetgroup", $MenuLanguage->MenuPhrase("20", "MenuText"), $MenuRelativePath . "t005_assetgrouplist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t005_assetgroup'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(4, "mi_t004_asset", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "t004_assetlist.php", 15, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t004_asset'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(16, "mci_Proses", $MenuLanguage->MenuPhrase("16", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(38, "mci_Handover", $MenuLanguage->MenuPhrase("38", "MenuText"), "", 16, "", TRUE, FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(5, "mi_t101_ho_head", $MenuLanguage->MenuPhrase("5", "MenuText"), $MenuRelativePath . "t101_ho_headlist.php", 38, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t101_ho_head'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(39, "mi_t103_ho1_head", $MenuLanguage->MenuPhrase("39", "MenuText"), $MenuRelativePath . "t103_ho1_headlist.php", 38, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t103_ho1_head'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(18, "mci_Report", $MenuLanguage->MenuPhrase("18", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(13, "mi_r001_asset", $MenuLanguage->MenuPhrase("13", "MenuText"), $MenuRelativePath . "r001_assetsmry.php", 18, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}r001_asset'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(17, "mci_Utility", $MenuLanguage->MenuPhrase("17", "MenuText"), "", -1, "", IsLoggedIn(), FALSE, TRUE, "", "", TRUE);
$sideMenu->addMenuItem(8, "mi_t201_users", $MenuLanguage->MenuPhrase("8", "MenuText"), $MenuRelativePath . "t201_userslist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t201_users'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(9, "mi_t202_userlevels", $MenuLanguage->MenuPhrase("9", "MenuText"), $MenuRelativePath . "t202_userlevelslist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t202_userlevels'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(11, "mi_t204_audittrail", $MenuLanguage->MenuPhrase("11", "MenuText"), $MenuRelativePath . "t204_audittraillist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t204_audittrail'), FALSE, FALSE, "", "", TRUE);
$sideMenu->addMenuItem(12, "mi_t205_parameter", $MenuLanguage->MenuPhrase("12", "MenuText"), $MenuRelativePath . "t205_parameterlist.php", 17, "", AllowListMenu('{E1C6E322-15B9-474C-85CF-A99378A9BC2B}t205_parameter'), FALSE, FALSE, "", "", TRUE);
echo $sideMenu->toScript();
?>