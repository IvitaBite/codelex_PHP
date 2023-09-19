<?php
//Create variable that prints out an integer 10, float 10.10, string "hello world"

$string = "Hello World";
$wholeNumber = 10;
$decimalNumber = 10.10;

echo $string.  PHP_EOL;
echo $wholeNumber . PHP_EOL;
echo $decimalNumber . PHP_EOL;
echo number_format($decimalNumber, 2) . PHP_EOL;
