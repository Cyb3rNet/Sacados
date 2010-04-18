>> Sacados by Serafim Junior Dos Santos Fagundes Cyb3r Network
>>
>> Version 0.1
>>
>> An API Wrapper in PHP 5 for 37Signals's Backpack Web Application
>>
>> MIT License
>>
>> Uses PHP cURL Library

# Usage

Include the API wrapper file for the usage

	bp.api.inc.php
	
Create an instance of the class to be used submitting the required parameters

	// $sAccountName - the subdomain of the Backpack account
	// $sToken - the Backpack token
	// $bHTTPS - boolean value indicating if the account uses HTTPS
	
	$oBpPages = new CBackpackAPIPages($sAccountName, $sToken, $bHTTPS);
	
	$oBpPages->ListAll();

# Tests

Tests have been done to the current version indicated in this README.

Tests can be done with the test files in the test folder.
