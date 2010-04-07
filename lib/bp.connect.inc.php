<?php


/**
 *	@package Connexions
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
include("http.base.inc.php");


/**
 *	
 */
class CBackpackRequestor extends CHTTPBasePost
{
	/**
	 *	
	 */
	private $_sProtocol;
	

	/**
	 *	
	 */
	private $_sURL;


	/**
	 *	
	 */
	protected $_sRESTURL;


	/**
	 *	
	 */
	protected $_sAccountName;


	/**
	 *	
	 */
	public function __construct($sAccountName, $sRESTURL, $bHTTPS = true)
	{
		$sBpDomain = "backpackit.com";
		
		$this->_sAccountName = $sAccountName;
		$this->_sRESTURL = $sRESTURL;
		
		if ($bHTTPS)
			$this->_sProtocol = "https";
		else
			$this->_sProtocol = "http";
		
		$this->_sURL = $this->_sProtocol."://".$this->_sAccountName.".".$sBpDomain.$this->_sRESTURL;
	}
	

	/**
	 *	
	 */
	public function Query()
	{
		parent::__construct($this->_sURL);

		parent::PrepareOptions();
		
		curl_setopt($this->_ch, CURLOPT_HTTPHEADER, array('Content-type: application/xml'));
		
		$sResponse = parent::Execute();
		
		parent::__destroy();
		
		return $sResponse;
	}

	
	/**
	 *	
	 */
	public function GetURL()
	{
		return $this->_sURL;
	}

	 
	/**
	 *	
	 */
	public function GetProtocol()
	{
		return $this->_sProtocol;
	}
	
	
	/**
	 *
	 */
	public function GetAccountName()
	{
		return $this->_sAccountName;
	}
}


?>