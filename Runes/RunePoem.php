<?php 
	namespace Runes;
// ==================================================================================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Released under "Frejs Fria Licens 2019".
// ==================================================================================================

class runepoem extends \SimpleXMLElement {
	public $rune;
	public $poem;
	public $pcid;
	public $trid;
}

class poems extends \SimpleXMLElement {
	public $runepoems;
}

class translation extends \SimpleXMLElement  {
	
	public $id;
	public $name;
	public $language;
	public $author;
	public $comment;
	public $date;
	public $sourceuri;
	
	public $poems;

	// Note: When deserializing all subclasses get the same class as main object.
	// So call to object doesn't work. Call statica class function instead.
	public static function getRuneTranslation($rune, $poems) {
		$found ="";
		foreach($poems	 as $poem){
			if($poem["rune"] == $rune){
				$found = $poem;
				break;
			}
			//echo "no match $poem  !=  $rune<br>";
		}
		return $found;
	} 
}

class poemcollection extends \SimpleXMLElement  {
 
	public $id;
	public $fornname;
	public $sourceuri;
	public $language;
	public $date;
		
	public $translation;

}		
	
class runpoemcollection extends \SimpleXMLElement {
		public $collection;
}
?>