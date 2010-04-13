<?php


/**
 *	@package Wrappers
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
include("bp.tools.inc.php");


class CBackpackAPI
{
	/**
	 *
	 */
	protected $_sAccountName;


	/**
	 *
	 */
	protected $_sToken;


	/**
	 *
	 */
	protected $_bHTTPS;


	/**
	 *
	 */
	public function __construct($sAccountName, $sToken, $bHTTPS)
	{
		$this->_sAccountName = $sAccountName;
		$this->_sToken = $sToken;
		$this->_bHTTPS = $bHTTPS;
	}
	
	
	/**
	 *
	 */
	protected function _Query($iHTTPMethod, $sRESTURL, $oXMLRequest)
	{
		$oRequester = new CBackpackRequestor($this->_sAccountName, $iHTTPMethod, $sRESTURL, $this->_bHTTPS);
		
		$sPostString = (string) $oXMLRequest;
		
		$oRequester->SetPostString($sPostString);
		
		$oRequester->PrepareOptions();
		
		return $oRequester->Query();
	}
	
	
	/**
	 *
	 */
	protected function _Distillate($sBpResponse)
	(
		$oDistiller = new CBackpackDistiller();
		
		return $oDistiller->Distillate($sBpResponse);
	)
}


?>