<?php 
	namespace BorrowedCode\EnumUtility;

// Code from 
// https://stackoverflow.com/questions/254514/enumerations-on-php
// Read 20210505On
//
// Light modification
// Modified. Added method getValidNumberFromNumberOrName. 

abstract class BasicEnum {
    private static $constCacheArray = NULL;

    private static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value, $strict = true) {
        $values = array_values(self::getConstants());
        return in_array($value, $values, $strict);
    }

    // Additions 20210506To
    public static function getValidNumberFromNumberOrName($numberOrName){
        $constants = self::getConstants();
        if(self::isValidName($numberOrName)){
            return $constants[$numberOrName];
        }
        if(self::isValidValue($numberOrName)){
            return $numberOrName;
        }

        throw new \Exception("Not a valid name or number for the enum.");
    }

    public static function getValidConstantFromName(string $name){
        $constants = self::getConstants();
        if(self::isValidName($name, true)){
            return $constants[$name];
        }
        
        throw new \Exception("Not a valid name for the enum.");
    }

    // Additions 20210508L�
    public static function getCount(){
        $constants = self::getConstants();
        return count($constants);
    }
}
?>
