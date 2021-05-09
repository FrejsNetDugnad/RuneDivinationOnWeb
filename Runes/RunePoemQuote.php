<?php 
	namespace Runes;
// ==================================================================================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Released under "Frejs Fria Licens 2019".
// ==================================================================================================

//DTOs

class RunePoemPoem {
	public $PcId;
	public $TrId;
	public $Rune;
	public $Poem;
}

class RunePoemTranslation {
	public string $Id;
	public string $Name;
	public string $Language;
	public string $Author;
	public string $Comment;
	public string $Date;
	public string $Sourceuri;
}

class RunePoemSourceText {
	public string $Id;
	public string $Fornname;
	public string $Language;
	public string $Author;
	public string $Comment;
	public string $Date;
	public string $Sourceuri;
}

class RunePoemQuote  {
	public RunePoemPoem $Runepoem;
	public RunePoemTranslation $Translation;
	public RunePoemSourceText $SourceText;
}

?>