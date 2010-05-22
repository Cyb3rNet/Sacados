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
	
		parent::__construct( $this->_sAccountName, $this->_sToken, $this->_bHTTPS );
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
		if ( count( $aParams ) < 2 )
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
	 *	Identifies if a value leads the HTTPS protocol usage 
	 *
	 *	@param mixed $mHTTPS Indicates if HTTPS usage is explicitly asked
	 *
	 *	@access private
	 *	@return bool
	 */
	private function _get_HTTPS( $mHTTPS )
	{
		$bIsHTTPS = $mHTTPS;

		if ( is_null( $mHTTPS ) == TRUE )
		{
			$bIsHTTPS = $this->_bHTTPS;
		}
		
		return $bIsHTTPS;
	}
	
	
	/**
	 *	Garbage manager; Keeps class at minimum size; Returns a running service reference object
	 *
	 *	@param object $oNewAPIService Hols the new API Service to be used
	 *
	 *	@access protected
	 *	@return object
	 */
	protected function &_GarbMan( &$oService )
	{
		unset( $this->_oActualService );
		
		$this->_oActualService =& $oService;
		
		return $this->_oActualService;
	}
	

	/**
	 *	Returns the Backpack Pages API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &pages( $mHTTPS = NULL )
	{
		$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	
		$oService =& new CBackpackAPIPages( $this->_sAccountName, $this->_sToken, $bHTTPS );
		
		return $this->_GarbMan( $oService );
	}
	

	/**
	 *	Returns the Backpack Notes API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &notes( $mHTTPS = NULL )
	{
		$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	
		$oService =& new CBackpackAPINotes( $this->_sAccountName, $this->_sToken, $bHTTPS );
		
		return $this->_GarbMan( $oService );
	}
	

	/**
	 *	Returns the Backpack Lists API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &lists( $mHTTPS = NULL )
	{
		$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	
		$oService =& new CBackpackAPILists( $this->_sAccountName, $this->_sToken, $bHTTPS );
		
		return $this->_GarbMan( $oService );
	}
	

	/**
	 *	Returns the Backpack List Items API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &list_items( $mHTTPS = NULL )
	{
		$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	
		$oService =& new CBackpackAPIListItems( $this->_sAccountName, $this->_sToken, $bHTTPS );
		
		return $this->_GarbMan( $oService );
	}
	

	/**
	 *	Returns the Backpack Separators API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function separators( $mHTTPS = NULL )
	//{
	//	$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	//
	//	$oService =& new CBackpackAPISeparators( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//	
	//	return $this->_GarbMan( $oService );
	//}
	

	/**
	 *	Returns the Backpack Tags API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	public function &tags( $mHTTPS = NULL )
	{
		$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	
		$oService =& new CBackpackAPITags( $this->_sAccountName, $this->_sToken, $bHTTPS );
		
		return $this->_GarbMan( $oService );
	}
	

	/**
	 *	Returns the Backpack Reminders API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &reminders( $mHTTPS = NULL )
	//{
	//	$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	//
	//	$oService =& new CBackpackAPIReminders( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//	
	//	return $this->_GarbMan( $oService );
	//}
	

	/**
	 *	Returns the Backpack Emails API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &emails( $mHTTPS = NULL )
	//{
	//	$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	//
	//	$oService =& new CBackpackAPIStatus( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//	
	//	return $this->_GarbMan( $oService );
	//}



	/**
	 *	Returns the Backpack Status API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &status( $mHTTPS = NULL )
	//{
	//	$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	//
	//	$oService =& new CBackpackAPIStatus( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//	
	//	return $this->_GarbMan( $oService );
	//}
	

	/**
	 *	Returns the Backpack Journal API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &journal( $mHTTPS = NULL )
	//{
	//	$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	//
	//	$oService =& new CBackpackAPIJournal( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//	
	//	return $this->_GarbMan( $oService );
	//}
	

	/**
	 *	Returns the Backpack Users API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &users( $mHTTPS = NULL )
	//{
	//	$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	//
	//	$oService =& new CBackpackAPIUsers( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//	
	//	return $this->_GarbMan( $oService );
	//}
	

	/**
	 *	Returns the Backpack Bookmarks API object
	 *
	 *	@param bool $bHTTPS Indicates if this request object transacts in HTTPS
	 *
	 *	@access public
	 *	@return object
	 */
	//public function &bookmarks( $mHTTPS = NULL )
	//{
	//	$bHTTPS = $this->_get_HTTPS( $mHTTPS );
	//
	//	$oService =& new CBackpackAPIPages( $this->_sAccountName, $this->_sToken, $bHTTPS );
	//	
	//	return $this->_GarbMan( $oService );
	//}
}


?>
