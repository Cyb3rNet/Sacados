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


require_once("bp.apiw.utils.inc.php");


/**
 *
 */
class CBpXOBaseRequest extends CXMLObject
{
	/**
	 *
	 */
	public function __construct($sToken)
	{
		parent::__construct("request");
	
		$oXToken = new CXMLObject("token");
		$oXToken->AppendContent($sToken);
		
		parent::AppendContent($oXToken);
	}
}


/**
 *
 */
class CBpXOListItemMove extends CBpXOBaseRequest
{
	/**
	 *
	 */
	const sMoveHigher = 'move_higher';


	/**
	 *
	 */
	const sMoveLower = 'move_lower';


	/**
	 *
	 */
	const sMoveToBottom = 'move_to_bottom';


	/**
	 *
	 */
	const sMoveToTop = 'move_to_top';
	

	/**
	 *
	 */
	public function __construct($sToken, $csMoveDirection)
	{
		parent::__construct($sToken);
		
		$oXDirection = new CXMLObject("direction");
		$oXDirection->AppendContent($csMoveDirection);
		
		parent::AppendContent($oXDirection);
	}
}


/**
 *
 */
class CBpXOPageSearch extends CBpXOBaseRequest
{
	/**
	 *
	 */
	public function __construct($sToken, $sNeedle)
	{
		parent::__construct($sToken);
		
		$oXDirection = new CXMLObject("term");
		$oXDirection->AppendContent($sNeedle);
		
		parent::AppendContent($oXDirection);
	}
}

?>
