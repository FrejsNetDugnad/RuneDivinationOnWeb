<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" charset="UTF-8" />
    <title>Digital run-dragning</title>
    <!--
    // ==============================================
    // Copyright Arne Höder, Midgårdskultur AB, 2021.
    // Copyright Asteríx Lindmark, 2021
    // Released under "Frejs Fria Licens 2019".
    // ==============================================
    -->
    <link href="../css/freefontfaces.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/rune.css">
</head>
<body>

    <!-- Header -->
    <header class="rune-container rune-shadow rune-theme rune-align-center rune-font" style="font-size:30px!important">
        Digital run-dragning
    </header>

    <!-- Main -->
    <div class="rune-white infotext-font" style="max-width:600px;margin:auto;">
        <div class="rune-white" style="max-width:600px;margin:auto;font-family:'Candara';">
            <p class="rune-align-center" style="font-family:'Liberation Sans';font-size: 130.0000%;font-weight: bold;">Digital run-dragning</span></p>
            <p style="font-family:'Liberation Sans';margin:0px 0px 0px 0px;text-align: justify;">Drag spå runor digitalt!</p>
            <br>
            <a href="DivinationMethod_se.php" rel="internal">Vilken metod använder programmet för att draga spå-runorna digitalt?</a>&nbsp;&nbsp;<a href="DivinationMethod_se.php" rel="internal">svenkska</a>&nbsp;&nbsp;<a href="DivinationMethod_en.php" rel="internal">english</a><br>
            <a href="../FrejsFriaLicens/index.php" rel="internal">Vad är Frejs Fria Licens?</a>&nbsp;&nbsp;<a href="../FrejsFriaLicens/index.php" rel="internal">svenska</a><br>
            <br>
            <br>
            <a href="ExternalResources.php" rel="internal">Vilka externa resurser använder sidorna? Vem har gjort fonterna?</a>&nbsp;&nbsp;<a href="ExternalResources_se.php" rel="internal">svenska</a>&nbsp;&nbsp;<a href="ExternalResources_en.php" rel="internal">english</a><<br>
            <br>
            <br>
            <a href="AdvancedRuneDivination_se.php" rel="internal"><strong>Avancerad digital run-dragare. Välj inställningar.</strong></a>
            &nbsp;&nbsp;<a href="AdvancedRuneDivination_se.php" rel="internal"><strong>svenska</strong></a>
            &nbsp;&nbsp;<a href="AdvancedRuneDivination_en.php" rel="internal"><strong>english</strong></a>
        </div><br>
    </div><br>
    <br>

<!-- Buttons -->
<form method="post" class="rune-align-center rune-font" action="RuneDivination_se.php?runestodraw=1">
<input class="rune-button rune-grey" type="submit" value="Draw one divination rune" method="post">
</form>
    <br>
<form method="post" class="rune-align-center rune-font" action="RuneDivination_se.php?runestodraw=3">
<input class="rune-button rune-grey" type="submit" value="Draw three divination runes" method="post" />
</form>
<br>
<br>
<br>
    <!-- Länkar -->
    <div class="rune-white rune-align-center infotext-font" style="max-width: 600px;margin: auto;">
        <br>
        <a href="index_en.php" rel="internal"><strong>English version of this page.</strong></a>
    </div>

    <?php
        include('../common/footer_partial.php');
    ?>
    </body>
</html>