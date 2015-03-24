<?php
/**
 *@author nicolaas [at] sunnysideup.co.nz
 */
class QuickLinks extends Widget {

	private static $db = array();

	private static $has_one = array(
		"QuickLink1" => "SiteTree",
		"QuickLink2" => "SiteTree",
		"QuickLink3" => "SiteTree",
		"QuickLink4" => "SiteTree",
		"QuickLink5" => "SiteTree",
		"QuickLink6" => "SiteTree",
		"QuickLink7" => "SiteTree"
	);

	private static $has_many = array();

	private static $many_many = array();

	private static $belongs_many_many = array();

	private static $defaults = array();

	private static $title = 'Quick Links';

	private static $cmsTitle = 'Quick Links';

	private static $description = 'Adds a customisable list of links.';

	function getCMSFields() {
		$source = SiteTree::get()->sort("Sort");
		$optionArray = array(0 => "--- select page ---") + $source->map()->toArray();
		if($source) foreach( $source as $page ) {
			$optionArray[$page->ID] = $page->MenuTitle;
		}
		return new FieldList(
			new DropdownField("QuickLink1ID","First Link",$optionArray),
			new DropdownField("QuickLink2ID","Second Link",$optionArray),
			new DropdownField("QuickLink3ID","Third Link",$optionArray),
			new DropdownField("QuickLink4ID","Fourth Link",$optionArray),
			new DropdownField("QuickLink5ID","Fifth Link",$optionArray),
			new DropdownField("QuickLink6ID","Sixth Link",$optionArray),
			new DropdownField("QuickLink7ID","Seventh Link",$optionArray)
		);
	}

	function Links() {
		Requirements::themedCSS("widgets_quicklinks", "widgets_quicklinks");
		$dos = new ArrayList();
		for($i = 1; $i < 8; $i++) {
			$fieldname = "QuickLink".$i."ID";
			if($this->$fieldname > 0) {
				if($page = SiteTree::get()->byID($this->$fieldname - 0)) {
					$dos->push($page);
				}
			}
		}
		return $dos;
	}

}
