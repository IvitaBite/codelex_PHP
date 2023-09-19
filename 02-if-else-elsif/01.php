<?php

// Given variables (int) 10, string "10" determine if they both are the same.

$intVar = 10;
$strVar = "10";

// Loose Comparison: checks for equality without considering data type
if ($intVar == $strVar) {
    echo "Loose Comparison: They are equal!" . PHP_EOL;
} else {
    echo "Loose Comparison: They are not equal!" . PHP_EOL;
}

// Strict Comparison: checks for equality and data type

if ($intVar === $strVar) {
    echo "Strict Comparison: They are equal!" . PHP_EOL;
} else {
    echo "Strict Comparison: They are not equal!" . PHP_EOL;
}