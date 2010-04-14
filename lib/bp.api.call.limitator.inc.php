<?php


class XBackpackLimitException extends Exception
{
	public function __construct($sMsg)
	{
		parent::__construct($sMsg);
	}
}


/**
 *	100 calls per 5 seconds max
 */
class CBackpackAPICallLimitator
{
	public static $_iCounter = 0;
	public static $_iStartTime = 0;
	public static $_iElapsedTime = 0;

	const iSeconds = BACKPACK_API_CALLS_WITHIN_SECONDS;
	
	public function __construct()
	{
		$iCallLimit = BACKPACK_API_CALL_LIMIT;
		$iNow = time();
		
		if (self::$_iStartTime == 0)
		{
			self::$_iStartTime = time();
		}
		else if
		(
			(
				$iNow - self::$_iStartTime < $iCallLimit
				&&
				self::$_iCounter >= $iCallLimit
			)
			||
			self::$_iCounter >= $iCallLimit
		)
		{
			throw new XBackpackLimitException("Exceeded limit requests (".$iCallLimit." per 5 minutes)");
		}
		else if ($iNow - self::$_iStartTime > self::iSeconds)
		{
			self::$_iCounter = 0;
			self::$_iStartTime = time();
		}

		self::$_iCounter++;
		self::$_iElapsedTime = $iNow - self::$_iStartTime;
	}
	
	public function GetCounter()
	{
		return self::$_iCounter;
	}
	
	public function GetElapsedTime()
	{
		return self::$_iElapsedTime;
	}
}

?>