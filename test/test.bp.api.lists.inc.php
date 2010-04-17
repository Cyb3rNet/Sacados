<?php

// INCLUDED VIA bp.api.inc.php
//
//include("lib/bp.api.pages.inc.php");

$sTitle = "Test Backpack Lists API classes";
$sFileName = "lib/bp.api.lists.inc.php";

_printTestFileHeader($sTitle, $sFileName);


$sAccountName = "";
$sToken = "";
$bHTTPS = true;


$oTCH = new CTestClassHelper("CBackpackLists", array($sAccountName, $sToken, $bHTTPS));

$iPageId = "";

$oTCH->RegisterMethodWithReturn("List", array($iPageId));


$oTCH->RunTestMap();


echo "Number of API requests: ".CBackpackAPICallLimitator::$_iCounter."<br />";
echo "Elapsed time since first request: ".CBackpackAPICallLimitator::$_iElapsedTime."<br />";


?>
