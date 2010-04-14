<?php


/**
 *	@package [3]APIParent
 *	@version 1.0
 *	@license MIT License
 *
 *	@copyright Copyright (c) 2010 Serafim Junior Dos Santos Fagundes Cyb3r Network
 *	@author Serafim Junior Dos Santos Fagundes <serafim@cyb3r.ca>
 *	
 *	API Wrapper for 37Signals's Backpack Web Application API
 *
 *	This file offers the request methods for the ? API service as documented at http://developer.37signals.com.
 */

 
/**
 *	
 */
require_once("bp.api.objects.inc.php");


/**
 *	
 */
abstract class CBackpackAPI
{
	/**
	 *
	 */
	private $_sAccountName;


	/**
	 *
	 */
	private $_bHTTPS;


	/**
	 *
	 */
	public function __construct($sAccountName, $bHTTPS)
	{
		$this->_sAccountName = $sAccountName;
		$this->_bHTTPS = $bHTTPS;
	}
	
	
	/**
	 *
	 */
	protected function _Get($iHTTPMethod, $sRESTURL, $oXMLRequest)
	{
		$oRequester = new CBackpackRequestor($this->_sAccountName, $iHTTPMethod, $sRESTURL, $this->_bHTTPS);
		
		$sPostString = (string) $oXMLRequest;
		
		$oRequester->SetRequestObject($sPostString);
		
		return $oRequester->Query();
	}
	
	
	/**
	 *
	 */
	protected function _Clean($sBpResponse)
	{
		$oDistiller = new CBackpackDistiller();
		
		return $oDistiller->Distillate($sBpResponse);
	}
}


?>
