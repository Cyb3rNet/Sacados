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
class CBackpackPages extends CBackpackProcessor
{
	private $_sLastRESTURL;


	/**
	 *
	 */
	public function __construct()
	{
		parent::__construct();

		$this->_sLastRESTURL = "";	
	}
	
	
	/**
	 *
	 */
	public function ListAll()
	{
		parent::SetMethod(CHTTPMethods::iPost);
		parent::SetRESTURL("/ws/pages/all");
		
		parent::Query()
		
		return;
	}
	
	
	/**
	 *
	 */
	public function Create()
	{
		$this->_sLastRESTURL = "";

		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
	
	
	/**
	 *
	 */
	public function ()
	{
		return;
	}
}
 
 
?>