<?php 
	namespace Runes;
// ==================================================================================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Released under "Frejs Fria Licens 2019".
// ==================================================================================================
	
include "BlankModeUtility.php";
use \BlankModeUtility\BlankMode as BlankRuneSetMode;

class RuneSet {
			
			// Properies
			private $runeSet;
			private $drawnRunes = array();
			private $useNewStafRunes;
			private int $blankMode;

			function get_drawnRunes(){
				return $drawRunes;
			}
			
			function make_seed()
			{
				list($usec, $sec) = explode(' ', microtime());
				return $sec + $usec * 1000000;
			}

			function __construct($newStafRunes = false, $blankModeSetting = "UseOnlySigns") {
				$this->useNewStafRunes = $newStafRunes;
				$this->blankMode = BlankRuneSetMode::getValidConstantFromName($blankModeSetting);
				$this->resetRuneSet();
			}
						
			private function resetRuneSet() {
				$this->runeSet = $this->useNewStafRunes ?  array("ᚠ","ᚢ","ᚦ","ᚬ","ᚱ","ᚴ","ᚷ","ᚹ","ᚺ","ᚾ","ᛁ","ᛅ","ᛈ","ᛇ","ᛉ","ᛋ","ᛏ","ᛒ","ᛖ","ᛗ","ᛚ","ᛜ","ᛞ","ᛟ")
				: array("ᚠ","ᚢ","ᚦ","ᚬ","ᚱ","ᚲ","ᚷ","ᚹ","ᚺ","ᚾ","ᛁ","ᛃ","ᛈ","ᛇ","ᛉ","ᛋ","ᛏ","ᛒ","ᛖ","ᛗ","ᛚ","ᛜ","ᛞ","ᛟ");
				
				if($this->blankMode >= BlankRuneSetMode::UseBlank){
					array_push($this->runeSet,"Blank");
				}
				if($this->blankMode >= BlankRuneSetMode::UseEmpty){
					array_push($this->runeSet,"Empty");
				}
				if($this->blankMode == BlankRuneSetMode::UseNull){
					array_push($this->runeSet,"Null");
				}
			}
			
			public function drawRunes(int $runeNumberDrawn = 3) {
				if($runeNumberDrawn>count($this->runeSet)){
					throw new ArgumentOutOfRan("Argument out of max range of runes to draw.");
				}
				
				for($i = 1;  $i<= $runeNumberDrawn;  $i++){
					$this->drawOut();
				}
			}
			
			private function add(string $c){
				$nr = (int)count($this->drawnRunes)+1;
				$this->drawnRunes[$nr] = $c;
			}
			
			private function remove(int $runeNumber){
				unset($this->runeSet[(int)$runeNumber]);
				$this->runeSet = array_values($this->runeSet);
			}

			private function drawOut(){
				$runeNumber = random_int(0, (int)count($this->runeSet)-1);
				$ch = $this->runeSet[(int)$runeNumber];
				$this->add($ch);
				$this->remove((int)$runeNumber);
			}
			function get_divination() {
				return $this->drawnRunes;
			}
			
			function get_divination_text() {
				$text = "";
				foreach ($divinedRunes as $rune) {
					$text = $text +  " $rune";
				}		
				return text;
			}
			
		}
?>
