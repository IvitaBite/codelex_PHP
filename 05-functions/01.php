<?php declare(strict_types=1);

// Create a function that accepts any string and returns the same value with added "codelex" by the end of it.
// Print this value out.


function addCodelex(string $inputStr): string {
    $resultStr = $inputStr . "codelex";
    return $resultStr;
}

// Example:

$input = "Hello, ";
$output = addCodelex($input);
echo $output . PHP_EOL;