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

//$sState = CGithubIssueStates::sOpen;
//$oTCH->RegisterMethodWithReturn("ListIssues", array($sUser, $sRepo, $sState));

//$iNumber = 1;
//$oTCH->RegisterMethodWithReturn("ViewIssue", array($sUser, $sRepo, $iNumber));

//$iNumber = 5;
//$oTCH->RegisterMethodWithReturn("ListCommentsByIssue", array($sUser, $sRepo, $iNumber));

//$iNumber = 8;
//$oTCH->RegisterMethodWithReturn("CloseIssue", array($sUser, $sRepo, $iNumber));

//$iNumber = 4;
//$oTCH->RegisterMethodWithReturn("ReOpenIssue", array($sUser, $sRepo, $iNumber));


//$oTCH->RegisterMethodWithReturn("ListLabels", array($sUser, $sRepo));

//$sLabel = "Label2";
//$iNumber = "2";
//$oTCH->RegisterMethodWithReturn("AddLabel", array($sUser, $sRepo, $sLabel, $iNumber));

//$sLabel = "Label1";
//$iNumber = "1";
//$oTCH->RegisterMethodWithReturn("RemoveLabel", array($sUser, $sRepo, $sLabel, $iNumber));


$oTCH->RunTestMap();


echo "Number of API requests: ".CBackpackAPICallLimitator::$_iCounter."<br />";
echo "Elapsed time since first request: ".CBackpackAPICallLimitator::$_iElapsedTime."<br />";


?>