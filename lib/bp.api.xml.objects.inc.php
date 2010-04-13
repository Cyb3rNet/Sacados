<?php


/**
 *	
 */
class CXMLObject
{
	/**
	 *	
	 */
	private $_sStartNode;


	/**
	 *	
	 */
	private $_sEndNode;


	/**
	 *	
	 */
	private $_sContent;


	/**
	 *	
	 */
	private $_aAttrs;
	

	/**
	 *	
	 */
	public function __construct($sTagName)
	{
		$this->_sTagName = $sTagName;
	
		$this->_sStartNode = "";
		$this->_sEndNode = "";
		
		$this->_sContent = "";
		
		$this->_aAttrs = array();
	}
	

	/**
	 *	
	 */
	public function AddAttr($sName, $sValue)
	{
		$this->_aAttrs[$sName] = $sValue;
	}
	

	/**
	 *	
	 */
	public function AppendContent($sContent)
	{
		$this->_sContent .= $sContent;
	}
	

	/**
	 *	
	 */
	public function ReplaceContent($sContent)
	{
		$this->_sContent = $sContent;
	}
	

	/**
	 *	
	 */
	private function _ComposeStartNode()
	{
		$sAttrs = "";
	
		foreach ($this->_aAttrs as $k => $v)
		{
			$sAttrs .= $k.'="'.$v.'" ';
		}
	
		return "<".$this->_sTagName." ".$sAttrs.">";
	}
	

	/**
	 *	
	 */
	public function __toString()
	{
		$this->_sStartNode = $this->_ComposeStartNode();
		$this->_sEndNode = "</".$this->_sTagName.">";
	
		return $this->_sStartNode.$this->_sContent.$this->_sEndNode;
	}
}


class CBpBaseRequest extends CXMLObject
{
	public function __construct($sToken)
	{
		parent::__construct("request");
	
		$oToken = CXMLObject("token")
		$oToken->AppendContent($sToken);
		
		parent::AppendContent($oToken);
	}
	
	
	
}

?>