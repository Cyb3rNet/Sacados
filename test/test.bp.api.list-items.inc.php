<?php

// INCLUDED VIA bp.api.inc.php
//
//include("lib/bp.api.pages.inc.php");

$sTitle = "Test Backpack List Items API classes";
$sFileName = "lib/bp.api.list-items.inc.php";

_printTestFileHeader($sTitle, $sFileName);


$sAccountName = "";
$sToken = "";
$bHTTPS = true;


$oTCH = new CTestClassHelper("CBackpackAPIPages", array($sAccountName, $sToken, $bHTTPS));

$iPageId = "";
$iListId = "";

$oTCH->RegisterMethodWithReturn("List", array($iPageId, $iListId));


$oTCH->RunTestMap();


echo "Number of API requests: ".CBackpackAPICallLimitator::$_iCounter."<br />";
echo "Elapsed time since first request: ".CBackpackAPICallLimitator::$_iElapsedTime."<br />";


?>
