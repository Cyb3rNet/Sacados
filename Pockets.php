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
require_once( APPPATH.'libraries/Sacados/bp.api.inc.php' );


class Pockets
{
	private $_hoPages = array();
	
	public function __construct()
	{
		$this->_oCI =& get_instance();
	}
	
	private function _getAttr( $xml, $sAttr )
	{
		if ( isset( $xml[$sAttr] ) )
			return (string) $xml[$sAttr];
	}
	
	public function HasPage( $sXML )
	{
		$xp = new XP( $sXML );
		
		return isset( $xp->q()->pages->page ) || isset( $xp->q()->page );
	}
	
	public function GetPages( $sAPIResponse )
	{
		$xp = new XP( $sAPIResponse );
		
		foreach( $xp->q()->pages->page as $oPage )
		{
			$hAttr = $oPage->attributes();
				
			$iId = $hAttr['id'];
			$sTitle = $hAttr['title'];
		
			$oBpPage = new CBpPage( $iId, $sTitle );
		
			$this->FillPage( $oBpPage );
			 
			$this->_hoPages["$iId"] = $oBpPage;
		}
	
		return $this->_hoPages;
	}
	
	public function &GetPageObject( $sXML )
	{
		$xp = new XP( $sXML );
		
		if ( isset( $xp->q()->pages ) )
		{
			$iId = $xp->q()->pages->page['id'];
			$sTitle = $xp->q()->pages->page['title'];
		}
		else if ( isset( $xp->q()->page ) )
		{
			$iId = $xp->q()->page['id'];
			$sTitle = $xp->q()->page['title'];
		}
		
		$oPage =& new CBpPage( $iId, $sTitle );
		
		$this->FillPage( $oPage );
		
		return $oPage;
	}
	
	public function FillPage( &$oPage )
	{
		$sXML = $this->_oCI->sacados->pages()->Show( $oPage->GetId() );
		
		foreach ( $this->GetNotes( $sXML ) as $iId => $oNote )
		{
			$oPage->AddNote( $iId, $oNote );
		}
		
		foreach ( $this->GetLists( $sXML ) as $iId => $oList )
		{
			$oPage->AddList( $iId, $oList );
		}
		
		foreach ( $this->GetImages( $sXML ) as $iId => $oImage )
		{
			$oPage->AddImage( $iId, $oImage );
		}
		
		foreach ( $this->GetAttachments( $sXML ) as $iId => $oAttachment )
		{
			$oPage->AddAttachment( $iId, $oAttachment );
		}
		
		foreach ( $this->GetTags( $sXML ) as $iId => $oTag )
		{
			$oPage->AddTag( $iId, $oTag );
		}
	}
	
	public function GetNotes( $sXML )
	{
		$aNotes = array();
	
		$oXML = new XP( $sXML );
		
		if ( isset( $oXML->q()->page->notes->note ) )
		{
			foreach ( $oXML->q()->page->notes->note as $oNote )
			{
				$hAttr = $oNote->attributes();
			
				$iId = $this->_getAttr( $hAttr, 'id' );
				$sTitle = $this->_getAttr( $hAttr, 'title' );
				$sCreatedAt = $this->_getAttr( $hAttr, 'created_at' );
			
				$sBody = (string) $oNote;
			
				$oBpNote =& new CBpNote( $iId, $sTitle, $sCreatedAt, $sBody );
			
				$aNotes["$iId"] =& $oBpNote;
			}
		}
		
		return $aNotes;
	}
	
	public function GetLists( $sXML )
	{
		$aLists = array();
		
		/*
		$oXML = new XP( $sXML );

		if ( isset( $oXML->q()->page->lists->list ) )
		{
			foreach ( $oXML->q()->page->lists->list as $oList )
			{
				$hAttr = $oList->attributes();
			
				$iId = $this->_getAttr( $hAttr, 'id' );
				$sName = $this->_getAttr( $hAttr, 'name' );
			
				$oBpList =& new CBpList( $iId, $sName );
			
				$aLists["$iId"] =& $oBpList;
			}
		}
		*/
		
		return $aLists;
	}
	
	public function GetImages( $sXML )
	{
		$aImages = array();
		
		// NOT IMPLEMENTED
		
		return $aImages;
	}
	
	public function GetAttachments( $sXML )
	{
		$aAttachements = array();
		
		// NOT IMPLEMENTED
		
		return $aAttachements;
	}
	
	public function GetTags( $sXML )
	{
		$aTags = array();
		
		$xp = new XP( $sXML );
		
		if ( isset( $xp->q()->page->tags->tag ) )
		{
			foreach ( $xp->q()->page->tags->tag as $oTag )
			{
				$iId = $oTag['id'];
				$sName = $oTag['name'];
			
				$oBpTag = new CBpTag( $iId, $sName );
				
				$aTags["$iId"] =& $oBpTag;
			}
		}
		
		return $aTags;
	}
	
	private function _a( $mVar )
	{
		show_error( '<pre>'.print_r( $mVar , TRUE ).'</pre>' );
	}
	
	private function _e( $sErrMsg )
	{
		show_error( $sErrMsg );
	}
}


class XP
{
	private $_oSXE = NULL;

	public function __construct( $sData )
	{
		 $this->_oSXE = new SimpleXMLElement( $sData );
	}
	
	public function x( $sXPath )
	{
		return $this->_oSXE->xpath( $sXPath );
	}
	
	public function &q()
	{
		return $this->_oSXE;
	}
}


?>
