<?php namespace DigitalRunDragning;

	use Runes as Runor;
	include "../Runes/RuneEnum.php";
	//include "../Runes/RunePoem.php";
	include "../Runes/RunePoemQuoteDAL.php";
			
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


	$filename1= "../Runes/RunePoemThrideilurNorron.xml";
	$filename2= "../Runes/RunePoemFornEngelskRundikt.xml";
	$filename3= "../Runes/RunePoemNorsktRunaLjud.xml";
	$filename4= "../Runes/RunePoemIslandskt1500t.xml";

	$filenames = [$filename1,$filename2,$filename3,$filename4];

	$quoteDal= new Runor\RunePoemDAL($filenames);

	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width" />
	<head>
		<title>Rune Poem Quotes</title>
		<link rel="stylesheet" href="../css/freefontfaces.css">
		<link rel="stylesheet" href="../css/common.css">
		<link rel="stylesheet" href="../css/rune.css">
		<link rel="stylesheet" href="RunePoemQuoter.css">
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
  Rune Poem Quotes
</header>

<!-- Runes -->
<div class = "rune-white">
<p class='rune-poem-collection'>
<?php
	global $runesToExplainCleanedArray;
	
	foreach($runesToExplainCleanedArray as $rune){
		echo "<span class='runepoemquoter-rune'>$rune</span><br>";	
		DisplayRuneQuotePoem($rune);
	}	
?>
</p>

<?php
	global $quoteDal;

	function DisplayPoem($rune, $poem, $sourcename, $sourceuri, $translationname, $translationuri ){

		echo "<a href='$translationuri' target='new' relation='external'>";
		echo "<span class='runepoemquoter-svava-trigger'>$poem";
		echo "<span class='runepoemquoter-svava-text'>";
		if(!IsNullOrEmptyString($sourcename)){
			echo "<br>Källatext '$sourcename' <br>";
		} 
		if(!IsNullOrEmptyString($sourceuri)){
			echo "<br>På nätheim: $sourceuri<br>";
		}
		if(!IsNullOrEmptyString($translationname)){
			echo "<br>Översättning '$translationname' <br>";
		} 
		if(!IsNullOrEmptyString($translationuri)){
			echo "<br>På nätheim: $translationuri<br>";
		}
		echo "<br></span></span>";
		echo "</a><br>";
	}

	function DisplayRuneQuotePoem(string $rune)
	{

		global $quoteDal;

		$runeQuotes = $quoteDal->getRunePoemQuotes($rune);
		foreach($runeQuotes as $runeQuote){
			$runeText = $runeQuote->Runepoem->Rune;
			$runePoem = $runeQuote->Runepoem->Poem;

			//echo "Runa: $runeText <br>";
			DisplayPoem($runeText,$runePoem,
				$runeQuote->SourceText->Fornname,$runeQuote->SourceText->Sourceuri,
				$runeQuote->Translation->Name,$runeQuote->Translation->Sourceuri);
		}
		if(count($runeQuotes)==0)
		{
			echo "<div>No rune poems to quote found.</div>";
		}
	}


	// https://stackoverflow.com/questions/381265/better-way-to-check-variable-for-null-or-empty-string
	// Function for basic field validation (present and neither empty nor only white space
	function IsNullOrEmptyString($str){
    		return (!isset($str) || trim($str) === '');
	}

?>

</div>

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
