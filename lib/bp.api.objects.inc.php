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
 *	@name BP_STREMPTY Defines the empty string constant for the Backpack objects
 */
define( 'BP_STREMPTY', '' );


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


// Holder Backpack objects
// -----------------------------------------------------------------------------


/**
 *	Creates a backpack Base object
 */
class BpObject
{
	private $_iId = 0;

	public function __construct( $iId )
	{
		$this->_iId = $iId;
	}
	
	public function GetId()
	{
		return $this->_iId;
	}
}


/**
 *	Creates a backpack Page object
 */
class CBpPage extends BpObject
{
	private $_sTitle = BP_STREMPTY;
	private $_sEmailAddress = BP_STREMPTY;
	
	private $_hoNotes = array();
	private $_hoLists = array();
	private $_hoGallery = array();
	private $_hoAttachments = array();
	private $_hoTags = array();
	
	
	public function __construct( $iId, $sTitle, $sEmailAddress = BP_STREMPTY )
	{
		parent::__construct( $iId );
		
		$this->_sTitle = $sTitle;
		$this->_sEmailAddress = $sEmailAddress;
	}
	
	public function GetTitle()
	{
		return $this->_sTitle;
	}
	
	public function GetEmailAddress()
	{
		return $this->_sEmailAddress;
	}
	
	
	public function AddNote( $iId, &$oNote )
	{
		$this->_hoNotes[$iId] =& $oNote;
	}
	
	public function &GetNoteById( $iId )
	{
		return $this->_hoNotes[$iId];
	}
	
	public function GetNotesIds()
	{
		return array_keys( $this->_hoNotes );
	}
	
	public function GetNotes()
	{
		return $this->_hoNotes;
	}

	
	public function AddList( $iId, &$oList )
	{
		$this->_hoLists[$iId] =& $oList;
	}
	
	public function &GetListById( $iId )
	{
		return $this->_hoLists[$iId];
	}
	
	public function GetListsIds()
	{
		return array_keys( $this->_hoLists );
	}
	
	public function GetLists()
	{
		return $this->_hoLists;
	}

	
	public function AddImage( $iId, &$oImage )
	{
		$this->_hoGallery[$iId] =& $oImage;
	}
	
	public function &GetImageById( $iId )
	{
		return $this->_hoGallery[$iId];
	}
	
	public function GetImagesIds()
	{
		return array_keys( $this->_hoGallery );
	}
	
	public function GetGallery()
	{
		return $this->_hoGallery;
	}

	
	public function AddAttachment( $iId, &$oAttachment )
	{
		$this->_hoAttachments[$iId] =& $oAttachment;
	}
	
	public function &GetAttachmentById( $iId )
	{
		return $this->_hoAttachments[$iId];
	}
	
	public function GetAttachmentsIds()
	{
		return array_keys( $this->_hoAttachments );
	}
	
	public function GetAttachments()
	{
		return $this->_hoAttachments;
	}

	
	public function AddTag( $iId, &$oTag )
	{
	
		$this->_hoTags[$iId] =& $oTag;
	}
	
	public function &GetTagById( $iId )
	{
		return $this->_hoTags[$iId];
	}
	
	public function GetTagsIds()
	{
		return array_keys( $this->_hoTags );
	}
	
	public function GetTags()
	{
		return $this->_hoTags;
	}
}


/**
 *	Creates a backpack List object
 */
class CBpList extends BpObject
{
	private $_sName;
	
	public function __construct( $iId, $sName )
	{
		parent::__construct( $iId );
		
		$this->_sName = $sName;
	}
	
	public function GetName()
	{
		return $this->_sName;
	}
}


/**
 *	Creates a backpack List Item object
 */
class CBpListItem extends BpObject
{
	private $_iListId = 0;
	private $_bCompleted = NULL;
	private $_sContent = BP_STREMPTY;
	
	public function __construct( $iId, $iListId, $bCompleted, $sContent )
	{
		parent::__construct( $iId );
		
		$this->_iListId = $iListId;
		$this->_bCompleted = $bCompleted;
		$this->_sContent = $sContent;
	}
	
	public function GetListId()
	{
		return $this->_iListId;
	}
	
	public function IsCompleted()
	{
		return $this->_bCompleted;
	}
	
	public function GetContent()
	{
		return $this->_sContent;
	}
}


/**
 *	Creates a backpack Note object
 */
class CBpNote extends BpObject
{
	private $_sTitle = BP_STREMPTY;
	private $_sCreatedAt = BP_STREMPTY;
	private $_sBody = BP_STREMPTY;

	public function __construct( $iId, $sTitle, $sCreatedAt, $sBody = BP_STREMPTY )
	{
		parent::__construct( $iId );
		
		$this->_sTitle = $sTitle;
		$this->_sCreatedAt = $sCreatedAt;
		$this->_sBody = $sBody;
	}
	
	public function GetTitle()
	{
		return $this->_sTitle;
	}
	
	public function GetCreateDate()
	{
		return $this->_sCreatedAt;
	}
	
	public function GetBody()
	{
		return $this->_sBody;
	}
}


/**
 *	Creates a backpack Separator object
 */
class CBpSeparator extends BpObject
{
	private $_sName = BP_STREMPTY;
	private $_iPageId = 0;
	
	public function __construct( $iId, $sName, $iPageId = NULL )
	{
		parent::__construct( $iId );
		
		$this->_sName = $sName;
		$this->_iPageId = $iPageId;
	}
	
	public function GetName()
	{
		return $this->_sName;
	}
	
	public function GetPageId()
	{
		return $this->_iPageId;
	}
}


/**
 *	Creates a backpack Tag object
 */
class CBpTag extends BpObject
{
	private $_sName = BP_STREMPTY;

	public function __construct( $iId, $sName )
	{
		parent::__construct( $iId );
		
		$this->_sName = $sName;
	}
	
	public function GetName()
	{
		return $this->_sName;
	}
}

?>
