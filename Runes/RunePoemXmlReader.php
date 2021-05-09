<?php 
	namespace Runes;
// ==================================================================================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Released under "Frejs Fria Licens 2019".
// ==================================================================================================
include "RunePoemXmlDeserializer.php";

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

class RunePoemXmlReader {

	public $cachedfile;
	public $cacheRunPoemExmlElement;
		
	function __construct(string $fileName) {
		$this->cachedfile= file_get_contents($fileName);
		$this->cachedRunPoemExmlElement = new \SimpleXMLElement($this->cachedfile);
	}

	function GetPoemsByRune(string $rune){
		$path ="//runepoem[contains(@rune,'$rune')]";
		$result = $this->cachedRunPoemExmlElement->xpath($path);
		return $result;
	}

	function GetPoemCollectionById(string $id){
		$path = "//poemcollection[@id = '$id']";
		$result = $this->cachedRunPoemExmlElement->xpath($path);
		
		return $result;
	}

	function GetPoemTranslationById(string $id){
		$path = "//translation[@id = '$id']	";
		$result = $this->cachedRunPoemExmlElement->xpath($path);
		
		return $result;
	}
}		
?>
