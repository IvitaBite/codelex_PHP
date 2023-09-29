<?php
//todo print the largest number

$numberOne = (int)readline("Input the 1st number: ");

$numberTwo = (int)readline("Input the 2nd number: ");

$numberThree = (int)readline("Input the 3rd number: ");


// Using array
// An array for the three input numbers.
$numbers = [$numberOne, $numberTwo, $numberThree];

// Sort the array in ascending order and with end() get largest number.
sort($numbers);
$largest = end($numbers);

echo "The largest number is: $largest\n";

/*
// Using if statements
if ($numberOne >= $numberTwo && $numberOne >= $numberThree) {
    $largest = $numberOne;
} elseif ($numberTwo >= $numberOne && $numberTwo >= $numberThree) {
    $largest = $numberTwo;
} else {
    $largest = $numberThree;
}

echo "The largest number is: $largest\n";
*/