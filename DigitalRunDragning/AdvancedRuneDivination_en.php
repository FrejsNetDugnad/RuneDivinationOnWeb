<?php namespace DigitalRunDragning;

	include "../Runes/RuneSet.php";
	use Runes as Runor;

	//include "../Runes/BlankModeUtility.php";
	use \BlankModeUtility as BlankRuneSetMode;
	
	const blankQueryName = 'BlankMode';
	$blankSetting = $_GET[blankQueryName]?? "UseOnlySigns";
	if(!BlankRuneSetMode\BlankMode::isValidName($blankSetting)){
		$blankSetting ="UseOnlySigns";
	}
	$blankMode = BlankRuneSetMode\BlankMode::getValidNumberFromNumberOrName($blankSetting);
	$runeCount = 24 + $blankMode;

	$runestodraw = $_GET['runestodraw']?? "3";
	$int_runestodraw = (int)$runestodraw;
	if($int_runestodraw<1 || $int_runestodraw>$runeCount){
		$int_runestodraw  = 1;
	}	
		
	$runeDrawer = new Runor\RuneSet(false, $blankSetting);
	$runeDrawer->drawRunes($int_runestodraw);

	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width" />
	<head>
		<title>Runesets</title>
		<link rel="stylesheet" href="../css/freefontfaces.css">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/rune.css">
		<link rel="stylesheet" href="RuneDivination.css">
	</head>
<style>
body {background-color:#17202A; padding-bottom:60px;}
</style>

<!--
// ==============================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Copyright Asteríx Lindmark, 2021
// Released under "Frejs Fria Licens 2019".
// ==============================================
-->

<body>

<!-- Header -->
<header class="rune-container rune-shadow rune-theme rune-align-center rune-font" style="font-size:30px!important">
  Runesets
</header>

<!-- Runes -->
<div class = "rune-align-center rune-white rune-pulled" style="font-size: 
<?php 
	global $int_runestodraw;
	$runeFontSize = 18;
	if($int_runestodraw>6){
		$runeFontSize = 14;
	}
	if($int_runestodraw>12){
		$runeFontSize = 12;
	}
	if($int_runestodraw>16){
		$runeFontSize = 11;
	}
	if($int_runestodraw>18){
		$runeFontSize = 10;
	}
	if($int_runestodraw>20){
		$runeFontSize = 9;
	}
	$runeFontvw = (string)$runeFontSize . "vw";
	
	echo $runeFontvw;
?>

;">

<?php
	global $runeDrawer;
	 $divinedRunes = $runeDrawer->get_divination();
	foreach ($divinedRunes as $rune) {
			echo " $rune";
	}
?>
	
</div>



<?php
// Todo: Limit the max number for number of runes to draw after selection of set to use.
// Disable 'Draw rune(s)' button if invalid selections in form. and display validation text. 
// Ex. Analet runor som kall dragas måste stämma överns med valet av set av runor.
// Du har valt {x} antal runor att draga men ett runset med 24+{blank} + {empty}+{null} innehåller bara {y} antal runor.
// Enable  'Draw rune(s)' button when valid selection is done. Remove validation tex.
//
// Alternative is to with javascript reduce teh number to max allowed number. (better soluition for users I think) 
// + display notice that is has been done?
?>

<!-- Button -->
<form method="get" id="DrawRunesForm" class="rune-align-center rune-font" action="AdvancedRuneDivination_en.php">
	<div  class="rune-white">Number to draw &nbsp;
	<select id="runestodraw" name="runestodraw">
	<?php
		function buildNumberOption(int $nr){
			global $int_runestodraw;
			$selected = (($nr==$int_runestodraw) ? "selected" : "");	
			echo "<option value='$nr' $selected>$nr</option>";
		}

		for ($r = 1; $r<=27; $r++){
			buildNumberOption($r);
		}
	?>
	</select></div>
	<br>
	<div class="rune-white">Used rune set &nbsp;
	<select id="BlankMode" name="BlankMode">
	<?php
		function buildModeOption(string $mode, string $description){
			global $blankSetting;
			$selected = (($mode==$blankSetting) ? "selected" : "");	
			echo "<option value='$mode' $selected>$description.</option>";
		}
		
		buildModeOption("UseOnlySigns","Standard older 24 futharken.");
		buildModeOption("UseBlank","One extra blank");
		buildModeOption("UseEmpty","Extra blank and empty.");
		buildModeOption("UseNull","Extra blank, empty and null.");
	?>
	</select></div>
	<br>
	<input class="rune-button rune-grey" type="submit" value="Draw rune(s)" method="get">
</form>
<br>

	    <!-- Länkar -->
    <div class="rune-white rune-align-center infotext-font" style="max-width: 600px;margin: auto;">
        <br>
        <a href="index.php" rel="internal"><strong>Digital run-divination. Draw digital divination-runes on webbsite. Startpage.</strong></a>
		<br>
		<a href="DivinationMethod_en.php" rel="internal"><strong>What methods does this site use to select divination runes?</strong></a>
		<br>
        <a href="AdvancedRuneDivination_se.php" rel="internal"><strong>Svensk version av den här sidan.</strong></a>
    </div>
	

<br>
<?php
	include('../common/footer_partial.php');
?>
</body>
</html>
