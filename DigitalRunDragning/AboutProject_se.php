<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" charset="UTF-8" />
    <title>Digital run-dragning projektet</title>
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
        Digital run-dragning projektet
    </header>

    <!-- Main -->
    <div class="rune-white infotext-font" style="max-width:600px;margin:auto;">
        <div class="rune-white" style="max-width:600px;margin:auto;font-family:'Candara';">
            <p class="rune-align-center" style="font-family:'Liberation Sans';font-size: 130.0000%;font-weight: bold;">Digital run-dragning projektet</span></p>
            <p style="font-family:'Liberation Sans';margin:0px 0px 0px 0px;text-align: justify;">Projekt kring att drag spå runor digitalt.<br>
            <br>
            Inpsirationen och idéen till projektet började för min del med ett Discord inlägg från Örny söndagen den 25 april 2021.<br> 
            <br>
            <q>Jag fick en idé angående att spå-i-runor. Jag vet inte hur mycket jobb det är för den som kan, men idéen är att skapa en slumpgenerator så man kan dra dagens runor automatiskt genom att klicka på en knapp.</q><br>
            <br>
            Inlägget lades upp på Forn Norrön Sed Discord server. Projektet blev det första 
            <a href="NetDugnad_se.php" rel="internal">nät-dugnad</a>
            projektet som fötts ur samtalen på den discord-servern.<br>
            <br>
            Projektet började med utforkande kodning i c# med en consol-applikation som också fick en winform frontend. Sedan skrevs det om i php för att gå att driftsätta på en befintlig hostingplats jag hade.<br>
            Asterix hakade på projektet med frontend-utveckling i html och css.<br>
            Fler personer kom med återkopplingar ochn idéer. Bl.a. att ha med en förklaring om vad de dragna runorn kan betyda.<br>
            Projektet har släppt många små uppdateringar med nya versioner på webbsidan under midgardskultur.se/DigitalRunDragning.<br>
            Projektet växte till att innefatta sidor för FrejsFriaLicens vilket var den licens koden för sidorna släpptes under.<br>
            Ett sidoprojekt med ett Discord-bot Api frontend för run-dragningar påbörjades.
            <br>
            2021-05-10 Måndag<br>
            Arne Höder  <br>
            <br>
            <h2>Personer som deltagit i projektet</h2>
            <h3>Sprint ett 20210425 - 2021-05-__</h3>
            Arne Höder - fullstack utveckling<br>
            Asterix - frontend, html, css<br>
            <br>
            Återkopplingar om nät-dugnad i allämnhet och om projektet DigitalRunDragning kan skickas till epost kontot 'net-dugnad' hos 'midgardskultur.se'.<br>   
            <br>
            Projektet har ett repository hos GitHUb. 
            <a href="https://github.com/FrejsNetDugnad/RuneDivinationOnWeb" rel="external" target="new">DigitalRunDragning repository hos GitHub - https://github.com/FrejsNetDugnad/RuneDivinationOnWeb </a><br>
            </p>
            </div><br>
    </div><br>
    <br>

<!-- Buttons -->
<form method="post" class="rune-align-center rune-font" action="RuneDivination_se.php?runestodraw=1">
<input class="rune-button rune-grey" type="submit" value="Draw one divination rune" method="post">
</form>
    <br>
<br>

   <!-- Länkar -->
    <div class="rune-white rune-align-center infotext-font" style="max-width: 600px;margin: auto;">
        <br>
        <a href="NetDugnad_se.php" rel="internal">Vad är nät-dugnad? Ordet Nät-dugnad förklaras.</a>
    </div>

    <?php
        include('../common/footer_partial.php');
    ?>
    </body>
</html>