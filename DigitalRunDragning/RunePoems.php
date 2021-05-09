<?php namespace DigitalRunDragning;

	use Runes as Runor;
	include "../Runes/RuneEnum.php";
	include "../Runes/RunePoemXmlDeserializer.php";
		
	$runesToExplain = $_GET['runes']?? "";
	$runesToExplain = explode("|", $runesToExplain,Runor\RuneEnum::getCount()+1);
	$fummel = false;

	$runesToExplainCleanedArray = [];
	foreach($runesToExplain as $rune){
		if(Runor\RuneEnum::isValidName($rune)){
			array_push($runesToExplainCleanedArray,$rune);
		}
		// Lets silently ignore any invalid runes in the querystring.
		// No point in complaining about them?
	}
	
	$warningMessage = "";
	if(count($runesToExplainCleanedArray) != count($runesToExplain)){
		$warningMessage = "The input contained some invalid runes";
		// If the programmers(creating bugs) 
		// or the user has caused invalid input to this page
		// lets threat this as a divine FUMMEL.
		$fummel = true;
	}
	
	if($fummel && !in_array("fummel",$runesToExplainCleanedArray)){
		array_push($runesToExplainCleanedArray,"fummel");
	}

	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width" />
	<head>
		<title>Rune Poems</title>
		<link rel="stylesheet" href="../css/freefontfaces.css">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/rune.css">
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
<div class = "rune-white">
<p class='rune-poem-collection'>

<?php

	$filename1= "../Runes/RunePoemThrideilurNorron.xml";
	$filename2= "../Runes/RunePoemFornEngelskRundikt.xml";
	$filename3= "../Runes/RunePoemNorsktRunaLjud.xml";
	$filename4= "../Runes/RunePoemIslandskt1500t.xml";

	DisplayRunePoem($filename1);
	DisplayRunePoem($filename3);
	DisplayRunePoem($filename4);
	DisplayRunePoem($filename2);

	function DisplayUri(string $name, string $uri){
		if($uri != ""){
				echo "<a href='$uri' target='new' relation='external'>Source on nätheim for  $name - $uri</a><br>";
			}
	}

	function DisplayRunePoem(string $filename)
	{

	global $runesToExplainCleanedArray;

	$xml = Runor\RunePoemXmlDeserializer::FromFile($filename);
	$runpoemcollection = $xml->runpoemcollection;
	
	
	$root = $xml->poemcollection;
	foreach ($root as $poemcollection){
			echo "Forn nordic name of runepoem: $poemcollection->fornname<br>";
			//echo "Source uri: $poemcollection->sourceuri<br>";
			DisplayUri( $poemcollection->fornname,$poemcollection->sourceur);
			echo "Languagei: $poemcollection->language<br>";
			echo "Date: $poemcollection->date<br>";
			echo "<div class='rune-poem-translation'>";
			foreach ($poemcollection->translation as $translation){
			
					echo "Forn nordic name of runepoem: $translation->name<br>";
					echo "Author: $translation->author<br>";
					//echo "Source uri: $translation->sourceuri<br>";
					if($translation->sourceuri != ""){
						echo "<a href='//$translation->sourceuri' target='new' relation='external'>Source on nätheim for  $translation->name - $translation->sourceuri</a><br>";
					}
					DisplayUri( $translation->fornname,$translation->sourceur);
					echo "Language: $translation->language<br>";
					echo "Date: $translation->date<br><br><br>";
			}
			echo "</div>";
	}

	echo "<div class='rune-poem-poems'>";
	$foundAnyMatches = false;
	foreach($runesToExplainCleanedArray as $searchedRune){
		// Note: "PHP will use anything within $lat_path as the variable name. It will not go into the object graph or obey the T_OBJECT_OPERATOR at all. It will simply look for a property"
		// https://stackoverflow.com/questions/7037240/dynamically-access-nested-object
		// Read 20210808 Lördag.
		$xmlRunePoems = Runor\RunePoemXmlDeserializer::RunePoemsFromFile($filename, $searchedRune);
		foreach($xmlRunePoems as $foundRunePoem)
		{
			$foundAnyMatches = true;
			$poem = $foundRunePoem['poem'];
			echo "<div><span class='runepoems-rune'> $searchedRune</span>&nbsp;&nbsp;";
			echo "<span class='runepoems-poem'>$poem</span></div><br>";
		}
	}	
	if(!$foundAnyMatches){
			echo "<div class='runepoems-rune'>No matching runes found i poem.<div><br>";
		}
	echo "</div>";
}
?>
</p>
</div>


<br>

	<!-- Länkar -->
    <div class="rune-white rune-align-center infotext-font" style="max-width: 600px;margin: auto;">
        <br>
        <a href="index.php" rel="internal"><strong>Digital run-dragare. Dra spå-runor digital på webbsidan. Startsida.</strong></a>
		<br>
        <a href="DivinationMethod_se.php" rel="internal"><strong>Vilka metoder används för att draga spå-runorna?</strong></a>
		<br>
		<a href="AdvancedRuneDivination_en.php" rel="internal"><strong>English version of this page.</strong></a>
    </div>


<br>
<?php
	include('../common/footer_partial.php');
?>
</body>
</html>
