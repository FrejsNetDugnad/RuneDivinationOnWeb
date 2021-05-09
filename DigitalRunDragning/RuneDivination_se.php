<?php namespace DigitalRunDragning;

	include "../Runes/RuneSet.php";
	use Runes as Runor;

	//include "../Runes/BlankModeUtility.php";
	use \BlankModeUtility as BlankRuneSetMode;
	
	const blankQueryName = 'BlankMode';
	$blankSetting= $_GET[blankQueryName]?? "UseOnlySigns";
	if(!BlankRuneSetMode\BlankMode::isValidName($blankSetting)){
		$blankSetting ="UseOnlySigns";
	}
	$blankMode = BlankRuneSetMode\BlankMode::getValidNumberFromNumberOrName($blankSetting);
	$runeCount = 24 + $blankMode;

	$runestodraw = $_GET['runestodraw']?? "3";
	$int_runestodraw = (int)$runestodraw;
	// There is an advanced page for drawing other numbers
	if($int_runestodraw!=1 && $int_runestodraw !=3){
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
<div class="rune-align-center rune-white rune-pulled">
 <?php 
	 $divinedRunes = $runeDrawer->get_divination();
		foreach ($divinedRunes as $rune) {
			echo " $rune";
		}
	?>
</div>

<!-- Button -->
<form method="post" class="rune-align-center rune-font" action="RuneDivination_se.php?runestodraw=1">
<input class="rune-button rune-grey" type="submit" value="Drag en spå-runa" method="post">
</form>
    <br>
<form method="post" class="rune-align-center rune-font" action="RuneDivination_se.php?runestodraw=3">
<input class="rune-button rune-grey" type="submit" value="Drag tre spå-runor" method="post" />
</form>
<br>
<br>
<br>
	<!-- Länkar -->
    <div class="rune-white rune-align-center infotext-font" style="max-width: 600px;margin: auto;">
		<br>
		<a href="AdvancedRuneDivination_se.php" rel="internal"><strong>Avancerad dragning av digitala spå-runor .Väj inställningar.</strong></a>
        <br>
        <a href="DivinationMethod_se.php" rel="internal"><strong>Vilka metoder används för att draga spå-runorna?</strong></a>
		<br>
        <a href="RuneDivination_en.php" rel="internal"><strong>English version of this page.</strong></a>
    </div>

<br>
<?php
	include('../common/footer_partial.php');
?>
</body>
</html>
