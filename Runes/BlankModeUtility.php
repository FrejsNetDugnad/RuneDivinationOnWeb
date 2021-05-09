<?php namespace BlankModeUtility;
    
    include "../BorrowedCode/EnumUtility.php";
    use \BorrowedCode\EnumUtility as EnumBases;

abstract class BlankMode extends EnumBases\BasicEnum {
    const UseOnlySigns = 0;
    const UseBlank = 1;
    const UseEmpty = 2;
    const UseNull = 3;
}
?>