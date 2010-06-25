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
require_once( "bp.api.base.inc.php" );


/**
 *
 */
class CBackpackAPIPages extends CBackpackAPI
{
	/**
	 *
	 */
	private $_sToken;


	/**
	 *
	 */
	public function __construct( $sAccountName, $sToken, $bHTTPS = true )
	{
		parent::__construct( $sAccountName, $bHTTPS );
		
		$this->_sToken = $sToken;
	}
	
	
	/**
	 *
	 */
	public function ListAll()
	{
		$iMethod = NHTTPMethods::iPost;
		$sRESTURL = "/ws/pages/all";
		
		$oXMLRequest = new CBpXOBaseRequest( $this->_sToken );
		
		$sBpResponse = parent::_Get( $iMethod, $sRESTURL, $oXMLRequest );
		
		return parent::_Clean( $sBpResponse );
	}
	
	
	/**
	 *
	 */
	public function Search( $sNeedle )
	{
		$iMethod = NHTTPMethods::iPost;
		$sRESTURL = "/ws/pages/search";
		
		$oXMLRequest = new CBpXOPageSearch( $this->_sToken, $sNeedle );
		
		$sBpResponse = parent::_Get( $iMethod, $sRESTURL, $oXMLRequest );
		
		return parent::_Clean( $sBpResponse );
	}
	
	
	/**
	 *
	 */
	public function Show( $iId )
	{
		$iMethod = NHTTPMethods::iPost;
		$sRESTURL = "/ws/page/".$iId;
		
		$oXMLRequest = new CBpXOBaseRequest( $this->_sToken );
		
		$sBpResponse = parent::_Get( $iMethod, $sRESTURL, $oXMLRequest );
		
		return parent::_Clean( $sBpResponse );
	}
}
 
 
?>
