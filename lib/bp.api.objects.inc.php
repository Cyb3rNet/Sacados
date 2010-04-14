<?php


/**
 *	@package [2]APIObjects
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


include("bp.apiw.utils.inc.php");


class CBpXOBaseRequest extends CXMLObject
{
	public function __construct($sToken)
	{
		if (strlen($sToken))
			self::_Create($sToken);
	}
	
	
	protected function _Create($sToken)
	{
		parent::__construct("request");
	
		$oXToken = new CXMLObject("token");
		$oXToken->AppendContent($sToken);
		
		parent::AppendContent($oXToken);
	}
}


?>
