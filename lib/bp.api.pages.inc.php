<?php


/**
 *	@package [5]APIChild
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
include("bp.api.base.inc.php");


/**
 *
 */
class CBackpackAPIPages extends CBackpackAPI
{
	/**
	 *
	 */
	public function __construct($sAccountName, $sToken, $bHTTPS = true)
	{
		parent::_sAccountName = $sAccountName;
		parent::_sToken = $sToken;
		parent::_bHTTPS = $bHTTPS;
	}
	
	
	/**
	 *
	 */
	public function ListAll()
	{
		$iMethod = NHTTPMethods::iPost;
		$sRESTURL = "/ws/pages/all";
		
		$oXMLRequest = new CXOBpBaseRequest(parent::_sToken);
		
		parent::_Get($iMethod, $sRESTURL, $oXMLRequest);
		
		return parent::_Clean($sBpResponse);
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
