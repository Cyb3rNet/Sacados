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
class CBackpackPages
{
	/**
	 *
	 */
	public function __construct($sAccountName, $sToken, $bHTTPS = true)
	{
		$this->_sAccountName = $sAccountName;
		$this->_sToken = $sToken;
		$this->_bHTTPS = $bHTTPS;
	}
	
	
	/**
	 *
	 */
	private function _query($iHTTPMethod, $sRESTURL, $sPostString = "")
	{
		$oRequester = new CBackpackRequestor($this->_sAccountName, $iHTTPMethod, $sRESTURL, $this->_bHTTPS);
		
		if (strlen($sPostString))
			$oRequester->SetPostString($sPostString);
		
		$oRequester->PrepareOptions();
		
		return $oRequester->Query();
	}
	
	
	private function _distillate($sBpResponse)
	(
		$oDistiller = new CBackpackDistiller();
		
		return $oDistiller->Distillate($sBpResponse);
	)
	
	
	/**
	 *
	 */
	public function ListAll()
	{
		$iMethod = CHTTPMethods::iPost;
		$sRESTURL = "/ws/pages/all";
		
		// Create Token
		
		$sBpResponse->_query($iMethod, $sRESTURL, $sPostString);
		
		return $this->_distillate($sBpResponse);
	}
	
	
/*
	public function Create()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
	
	
	public function ()
	{
		return;
	}
*/
}
 
 
?>