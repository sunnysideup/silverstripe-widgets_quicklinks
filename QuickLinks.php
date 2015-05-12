<?php
/**
 *@author nicolaas [at] sunnysideup.co.nz
 */
class QuickLinks extends Widget {

	private static $excluded_pages = array("ErrorPage");

	private static $has_one = array(
		"QuickLink1" => "SiteTree",
		"QuickLink2" => "SiteTree",
		"QuickLink3" => "SiteTree",
		"QuickLink4" => "SiteTree",
		"QuickLink5" => "SiteTree",
		"QuickLink6" => "SiteTree",
		"QuickLink7" => "SiteTree"
	);

	private static $title = 'Quick Links';

	private static $cmsTitle = 'Quick Links';

	private static $description = 'Adds a customisable list of links.';

	function getCMSFields() {
		$fieldList = new FieldList();
		$map = SiteTree::get()->exclude(array("ClassName" => Config::inst()->get("Quicklinks", "excluded_pages")))->map("ID", "MenuTitle")->toArray();
		for($i = 1; $i < 8; $i++) {
			$fieldList->push(new DropdownField("QuickLink".$i."ID","Link $i", array(0 => "-- please select --") + $map));
		}
		return $fieldList;
	}

	public function WidgetQuickLinksData() {
		Requirements::themedCSS("widgets_quicklinks", "widgets_quicklinks");
		$al = new ArrayList();
		for($i = 1; $i < 8; $i++) {
			$fieldname = "QuickLink".$i."ID";
			if($this->$fieldname > 0) {
				if($page = SiteTree::get()->byID($this->$fieldname - 0)) {
					$al->push($page);
				}
			}
		}
		return $al;
	}

}
