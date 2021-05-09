<?php namespace Runes;
// ==================================================================================================
// Copyright Arne Höder, Midgårdskultur AB, 2021.
// Released under "Frejs Fria Licens 2019".
// ==================================================================================================
include "../BorrowedCode/EnumUtility.php";
use \BorrowedCode\EnumUtility as EnumBases;

abstract class RuneEnum extends EnumBases\BasicEnum {
    const ᚠ = 1;
    const ᚢ = 2;
    const ᚦ = 3;
    const ᚬ = 4;
    const ᚱ = 5;
    const ᚲ = 6;
    const ᚷ = 7;
    const ᚹ = 8;
    
    const ᚺ = 9;
    const ᚾ = 10;
    const ᛁ = 11;
    const ᛃ = 12;
    const ᛈ = 13;
    const ᛇ = 14;
    const ᛉ = 15;
    const ᛋ = 16;

    const ᛏ = 17;
    const ᛒ = 18;
    const ᛖ = 19;
    const ᛗ = 20;
    const ᛚ = 21;
    const ᛜ = 22;
    const ᛞ = 23;
    const ᛟ = 24;

    // Add the blank rune some modern pagans use and some don't use.
    // A runetile without any rune on it.
    const Blank = 25;

    // Add the new Empty result. 
    // Representing an empty hand emerging from the pouch contaioning the runes.
    const Empty = 26;

    // Add the new Null result. 
    // Representing no hand at all has emerging from the pouch contaioning the runes.
    const Null = 27;

    // Add the new Fummel result inspired from role play. 
    // Representing that the user has ben clumsy and failed in some (spectacular) way.
    const Fummel = 28;
}
?>