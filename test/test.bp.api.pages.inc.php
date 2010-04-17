<?php

// INCLUDED VIA bp.api.inc.php
//
//include("lib/bp.api.pages.inc.php");

$sTitle = "Test Backpack Pages API classes";
$sFileName = "lib/bp.api.pages.inc.php";

_printTestFileHeader($sTitle, $sFileName);


$sAccountName = "";
$sToken = "";
$bHTTPS = true;


$oTCH = new CTestClassHelper("CBackpackAPIPages", array($sAccountName, $sToken, $bHTTPS));


$oTCH->RegisterMethodWithReturn("ListAll", array());


$oTCH->RunTestMap();


echo "Number of API requests: ".CBackpackAPICallLimitator::$_iCounter."<br />";
echo "Elapsed time since first request: ".CBackpackAPICallLimitator::$_iElapsedTime."<br />";


?>
