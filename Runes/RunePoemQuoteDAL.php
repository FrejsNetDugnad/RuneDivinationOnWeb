<?php 
	namespace Runes;
// ==================================================================================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Released under "Frejs Fria Licens 2019".
// ==================================================================================================
include "RunePoemXmlReader.php";
include "RunePoemQuote.php";
use Runes as Runor;

class RunePoemDAL {

	public $readers = [];

	function __construct($fileNames) {
		foreach($fileNames as $fileName){
			$reader = new Runor\RunePoemXmlReader($fileName);
			array_push($this->readers,$reader);
		}
	}

	function getRunePoemQuotesByRunes($runes){
		$runeQuotes = [];
		
		foreach($runes as $rune)
		{
			$poems = $this->getRunePoemQuotes($rune);
			if(count($poems)>0){
				array_push($runeQuotes, $poems);
			}
		}
		return $runeQuotes;
	}

	function CleanString($xmlIinput){
	   if(!isset($xmlIinput) ){
			  return (string)"";
	   }
	   return (string) (trim(trim(trim($xmlIinput,"'"),'"')));
	}

	function getRunePoemQuotes(string $rune){
		$quotes = [];



		foreach($this->readers as $reader){
			$runePoems = $reader->GetPoemsByRune($rune);
			$runePoemQuotes = [];
			foreach($runePoems as $runePoem){
				$runePoemQoute = new RunePoemQuote();
				$runePoemQoute->Runepoem = new RunePoemPoem();
				
				$runePoemQoute->Runepoem->Rune = $this->CleanString($runePoem["rune"]);
				$runePoemQoute->Runepoem->Poem = $this->CleanString($runePoem["poem"]);
				$runePoemQoute->Runepoem->PcId = $this->CleanString($runePoem["pcid"]);
				$runePoemQoute->Runepoem->TrId = $this->CleanString($runePoem["trid"]);
				
				$runePoemQoute->SourceText = new RunePoemSourceText();
				$runePoemCollection = $reader->GetPoemCollectionById($runePoemQoute->Runepoem->PcId);

				$runePoemQoute->SourceText->Id = $this->CleanString($runePoemCollection[0][0]["id"][0]);
				$runePoemQoute->SourceText->Fornname =  $this->CleanString($runePoemCollection[0][0]->fornname);
				$runePoemQoute->SourceText->Language =  $this->CleanString($runePoemCollection[0][0]->language);
				$runePoemQoute->SourceText->Author =  $this->CleanString($runePoemCollection[0][0]->author);
				$runePoemQoute->SourceText->Comment = $this->CleanString($runePoemCollection[0][0]->comment);
				$runePoemQoute->SourceText->Date =  $this->CleanString($runePoemCollection[0][0]->date);
				$runePoemQoute->SourceText->Sourceuri =  $this->CleanString($runePoemCollection[0][0]->sourceuri);
				
				$runePoemQoute->Translation = new RunePoemTranslation();
				$runeTranslation = $reader->GetPoemTranslationById($runePoemQoute->Runepoem->TrId);

				$runePoemQoute->Translation->Id =$this->CleanString(	$runeTranslation[0][0]["id"][0]);
				$runePoemQoute->Translation->Name = $this->CleanString($runeTranslation[0][0]->name);
				$runePoemQoute->Translation->Language = $this->CleanString($runeTranslation[0][0]->language);
				$runePoemQoute->Translation->Author = $this->CleanString($runeTranslation[0][0]->author);
				$runePoemQoute->Translation->Comment = $this->CleanString($runeTranslation[0][0]->comment);
				$runePoemQoute->Translation->Date = $this->CleanString($runeTranslation[0][0]->date);
				$runePoemQoute->Translation->Sourceuri = $this->CleanString($runeTranslation[0][0]->sourceuri);	

				array_push($quotes, $runePoemQoute);
			}
		}
		return $quotes;
	}
}
?>
