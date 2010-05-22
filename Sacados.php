<?php


include( 'bp.api.inc.php' );


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
	public function __construct( $aParams = array() )
	{
		$this->_init_validate_params( $aParams );
	
		parent::__construct( $sAccountName, $sToken, $bHTTPS );
	}
	
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
	
	private _err( $sErrMsg )
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

class BpApi
{
	public function __construct( $sAccountName, $sToken, $bHTTPS = TRUE )
	{
		$this->_sAccountName = $sAccountName;
		$this->_sToken = $sToken;
		$this->_bHTTPS = $bHTTPS;
	}
	

	public function &pages( $bHTTPS = FALSE )
	{
		return = new CBackpackAPIPages( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	}
	
	
	public function &notes( $bHTTPS = FALSE )
	{
		return = new CBackpackAPINotes( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	}
		
	
	public function &lists( $bHTTPS = FALSE )
	{
		return = new CBackpackAPILists( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	}
	
	
	public function &list_items( $bHTTPS = FALSE )
	{
		return = new CBackpackAPIListItems( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	}
	

	//public function separators( $bHTTPS = FALSE )
	//{
	//	return = new CBackpackAPISeparators( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	//}
	
	
	public function &tags( $bHTTPS = FALSE )
	{
		return = new CBackpackAPITags( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	}
	

	//public function &reminders( $bHTTPS = FALSE )
	//{
	//	return = new CBackpackAPIReminders( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	//}
	

	//public $emails;
	//public function &status( $bHTTPS = FALSE )
	//{
	//	return = new CBackpackAPIStatus( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	//}
	

	//public function &journal( $bHTTPS = FALSE )
	//{
	//	return = new CBackpackAPIJournal( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	//}
	

	//public function &users( $bHTTPS = FALSE )
	//{
	//	return = new CBackpackAPIUsers( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	//}
	

	//public function &bookmarks( $bHTTPS = FALSE )
	//{
	//	return = new CBackpackAPIPages( $this->_sAccountName, $this->_sToken, $bHTTPS || $this->_bHTTPS );
	//}
}

?>
