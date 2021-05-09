<?php namespace DigitalRunDragning;
	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
	<meta name="viewport" content="width=device-width" />
	<head>
		<title>Runesets - method used</title>
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
  Runesets - method used
</header>

    <!-- Main -->
    <div class="rune-white infotext-font" style="max-width:600px;margin:auto;">
        <p class="rune-align-center" style="font-size: 130.0000%;font-weight: bold;">Metod used to draw runes</p>
        <div class="rune-white" style="max-width:600px;margin:auto;font-family:'Candara';">
            <p class="rune-align-center" style="font-family:'Liberation Sans';font-size: 130.0000%;font-weight: bold;">What method is used by runeset to draw the runes?</p>
			<p style="font-family:'Liberation Sans';margin:0px 0px 0px 0px;text-align: justify;">A random number is generated for which of the remaining runes in the runeset should be drawn.<br>
			<br>
			random_int<br>
			<br>
			<code>$runeNumber = random_int(0, (int)count($this->runeSet)-1);</code>
			<br>
			<br>This webb-page is probably run in unix (one.com hosted).<br>
			The source code is realesd under Frejs Fria Licens 2019 and can be run on other platforms. It has been tested on Windows 10 professional.<br>
			<p style="font-family:'Liberation Sans';margin:0px 0px 0px 0px;text-align: justify;">
			<b>
			<blockquote cite="https://en.wikipedia.org/wiki//dev/random"> In Unix-like operating systems, /dev/random, /dev/urandom and /dev/arandom are special files that serve as pseudorandom number generators. They allow access to environmental noise collected from device drivers and other sources.[1] /dev/random typically blocks if there is less entropy available than requested; /dev/urandom typically never blocks, even if the pseudorandom number generator seed was not fully initialized with entropy since boot. /dev/arandom blocks after boot until the seed has been securely initialized with enough entropy, and then never blocks again. Not all operating systems implement the same methods for /dev/random and /dev/urandom and only a few provide /dev/arandom.</blockquote>
			<br>
			</p>
			<blockquote cite ="https://www.php.net/manual/en/function.random-bytes.php">On Windows, » CryptGenRandom() will always be used. As of PHP 7.2.0, the » CNG-API will always be used instead. On Linux, the » getrandom(2) syscall will be used if available.On other platforms, /dev/urandom will be used.</blockquote>
			<p style="font-family:'Liberation Sans';margin:0px 0px 0px 0px;text-align: justify;">
			<br>
			</p>
			<p>
			<a href="https://www.php.net/manual/en/function.random-int.php" target="_blank" rel="external">wikipedia about random - https://www.php.net/manual/en/function.random-int.php </a><br>
			<a href="https://man7.org/linux/man-pages/man2/getrandom.2.html" target="_blank" rel="external">About getrandom - https://man7.org/linux/man-pages/man2/getrandom.2.html </a><br>
			<a href="https://en.wikipedia.org/wiki//dev/random" target="_blank" rel="external"> wikipedia about dev/random - https://en.wikipedia.org/wiki//dev/random </a><br>
			<p style="font-family:'Liberation Sans';margin:0px 0px 0px 0px;text-align: justify;">
			<br>
			
        </div><br>
    </div><br>
    <br>

<!-- Button -->
<form method="post" class="rune-align-center rune-font" action="RuneDivination_en.php?runestodraw=1">
<input class="rune-button rune-grey" type="submit" value="Draw one divination rune" method="post">
</form>
<br>
<br>

    <!-- Länkar -->
    <div class="rune-white rune-align-center infotext-font" style="max-width: 600px;margin: auto;">
        <br>
        <a href="index.php" rel="internal"><strong>Digital run-divination. Draw digital divination-runes on webbsite.</strong></a>
		<br>
        <a href="DivinationMethod_se.php" rel="internal"><strong>Svensk version av den här sidan.</strong></a>
    </div>
	<br><br>
<?php
	include('../common/footer_partial.php');
?>
</body>
</html>
