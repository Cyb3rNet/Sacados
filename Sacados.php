<?php


/**
 *	@package CI-Sacados
 *	@version 1.0
 *	@license MIT License
 *
 *	@copyright Copyright (c) 2010 Serafim Junior Dos Santos Fagundes Cyb3r Network
 *	@author Serafim Junior Dos Santos Fagundes <serafim@cyb3r.ca>
 *	
 *	CodeIgniter library file of the API Wrapper for 37Signals's Backpack Web Application API
 */


/**
 *	Indicates the path of the Sacados library
 */
include( APPPATH.'libraries/Sacados/bp.api.inc.php' );


/**
 *	@name BP_ACCOUNT Holds the Backpack subdomain account name; mandatory
 */
define( 'BP_ACCOUNT', 'account' );


/**
 *	@name BP_TOKEN Holds the Backpack token for login; mandatory
 */
define( 'BP_TOKEN', 'token' );


/**
 *	@name BP_ISHTTPS Indicates if TRUE HTTPS protocol by default else HTTP; non mandatory
 */
define( 'BP_ISHTTPS', 'is_https' );


class Sacados extends BpAPI
{
	/**
	 *	@param array $aParams Class instatiation parameters
	 *
	 *	@access public
	 */
	public function __construct( $aParams = array() )
	{
		$this->_init_validate_params( $aParams );
	
		parent::__construct( $sAccountName, $sToken, $bHTTPS );
	}
	
	
	/**
	 *	Initiates class instiation variables
	 *
	 *	@param array $aParams Class instatiation parameters
	 *
	 *	@access private
	 */
	private function _init_validate_params( $aParams )
	{
		if ( count( $aParams ) != 2 )
		{
			$sErrMsg = 'The Sacados instatiation parameters are not of the minimal count of 2.';
		
			$this->_err( $sErrMsg );
		}
		else
		{
			$sErrMsg = '<big>Sacados Error</big>';
			$iInitStrLen = strlen( $sErrMsg );
		
			if ( ! array_key_exists( BP_ACCOUNT, $aParams ) )
			{
				$sErrMsg .= ' | No Account parameter.';
			}
			else
			{
				$this->_sAccountName = $aParams[BP_ACCOUNT];
			}

			if ( ! array_key_exists( BP_TOKEN, $aParams ) )
			{
				$sErrMsg .= ' | No Token parameter.';
			}
			else
			{
				$this->_sToken = $aParams[BP_TOKEN];
			}
			
			if ( ! array_key_exists( BP_ISHTTPS, $aParams ) )
			{
				$this->_bHTTPS = FALSE;
			}
			else
			{
				$this->_bHTTPS = $aParams[BP_ISHTTPS];
			}
			
			if ( strlen( $sErrMsg ) > $iInitStrLen )
			{
				$this->_err( $sErrMsg );
			}
		}
	}
	
	
	/**
	 *	Ouputs an error message
	 *
	 *	@param string $sErrMsg The error message
	 *
	 *	@access private
	 */
	private function _err( $sErrMsg )
	{
		if ( defined( 'CI_VERSION' ) )
		{
			show_error( $sErrMsg );
		}
		else
		{
			throw new Exception( $sErrMsg );
		}	
	}
}


/**
 *
 */
class BpApi
{
	/**
	 *	@param string $sAccountName
	 *	@param string $sToken
	 *	@param bool $bHTTPS Indicates the default usage of the HTTPS protocol; FALSE by default
	 *
	 *	@access public
	 */
	public function __construct( $sAccountName, $sToken, $bHTTPS = FALSE )
	{
		$this->_sAccountName = $sAccountName;
		$this->_sToken = $sToken;
		$this->_bHTTPS = $bHTTPS;
	}
	

	/**
	 *	Returns the Backpack Pages API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &pages( $bHTTPS = $this->_bHTTPS )
	{
		return = new CBackpackAPIPages( $this->_sAccountName, $this->_sToken, $bHTTPS );
	}
	

	/**
	 *	Returns the Backpack Notes API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &notes( $bHTTPS = $this->_bHTTPS )
	{
		return = new CBackpackAPINotes( $this->_sAccountName, $this->_sToken, $bHTTPS );
	}
	

	/**
	 *	Returns the Backpack Lists API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &lists( $bHTTPS = $this->_bHTTPS )
	{
		return = new CBackpackAPILists( $this->_sAccountName, $this->_sToken, $bHTTPS );
	}
	

	/**
	 *	Returns the Backpack List Items API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &list_items( $bHTTPS = $this->_bHTTPS )
	{
		return = new CBackpackAPIListItems( $this->_sAccountName, $this->_sToken, $bHTTPS );
	}
	

	/**
	 *	Returns the Backpack Separators API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function separators( $bHTTPS = $this->_bHTTPS )
	//{
	//	return = new CBackpackAPISeparators( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//}
	

	/**
	 *	Returns the Backpack Tags API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &tags( $bHTTPS = $this->_bHTTPS )
	{
		return = new CBackpackAPITags( $this->_sAccountName, $this->_sToken, $bHTTPS );
	}
	

	/**
	 *	Returns the Backpack Reminders API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &reminders( $bHTTPS = $this->_bHTTPS )
	//{
	//	return = new CBackpackAPIReminders( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//}
	

	/**
	 *	Returns the Backpack Status API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public $emails;
	//public function &status( $bHTTPS = $this->_bHTTPS )
	//{
	//	return = new CBackpackAPIStatus( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//}
	

	/**
	 *	Returns the Backpack Journal API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &journal( $bHTTPS = $this->_bHTTPS )
	//{
	//	return = new CBackpackAPIJournal( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//}
	

	/**
	 *	Returns the Backpack Users API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &users( $bHTTPS = $this->_bHTTPS )
	//{
	//	return = new CBackpackAPIUsers( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//}
	

	/**
	 *	Returns the Backpack Bookmarks API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &bookmarks( $bHTTPS = $this->_bHTTPS )
	//{
	//	return = new CBackpackAPIPages( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//}
}


?>
