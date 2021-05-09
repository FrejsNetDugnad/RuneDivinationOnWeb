<?php 
	namespace Runes;
// ==================================================================================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Released under "Frejs Fria Licens 2019".
// ==================================================================================================
include "RunePoem.php";

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;

abstract class RunePoemXmlDeserializer {
	static function FromFile(string $fileName){
		$xml = "";
		if (file_exists($fileName)) {
		    $xml = simplexml_load_file($fileName,"Runes\\runpoemcollection");
		}
		return $xml;
	}
	static function RunePoemsFromFile(string $fileName, $rune){
		$result = "";
		if (file_exists($fileName)) {
		    $xml = simplexml_load_file($fileName,"Runes\\poems");
			$result = $xml->xpath("//runepoem[@rune='$rune']");
		} 
		return $result;
	}

	static function RuneTranslationsPoemsByRuneFromFile(string $fileName, $rune){
		$result = "";
		if (file_exists($fileName)) {
		    $xml = simplexml_load_file($fileName,"Runes\\translation");
			$result = $xml->xpath("//translation[contains@rune='$rune']");
		} 
		return $result;
	}
	static function RunePoemCollectionsByRuneFromFile(string $fileName, $rune){
		$result = "";
		if (file_exists($fileName)) {
		    $xml = simplexml_load_file($fileName,"Runes\\poemcollection");
			$result = $xml->xpath("//poemcollection[contains@rune='$rune']");
		} 
		return $result;
	}
}		
?>
