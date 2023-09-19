<?php declare(strict_types=1);

/* Create a non-associative array with 5 elements where 3 are integers, 1 float and 1 string.
Create a for loop that iterates non-associative array using php in-built function that determines
count of elements in the array. Create a function that doubles the integer number. Within the loop
using php in-built function print out the double of the number value (using your custom function). */

$array = [3, 7, 11, 3.14, "codelex"];

function doubleInteger($value) {
    if(is_int($value)) {
        return $value * 2;
    }
    return $value;
}

$arrayCount = count($array);

for ($i = 0; $i < $arrayCount; $i++) {
    $doubledValue = doubleInteger($array[$i]);
    echo "Element $i: $doubledValue" . PHP_EOL;
}
